<?php

class coustomerservices extends CI_Controller
{
	

	function __construct()
	{
		
		parent::__construct();

		if(!$this->session->userdata('coustomer_name'))
		{
			header('WWW-Authenticate: Negotiate');
		}
		
	}
	

	function getCoustomerInfo($id=null)
	{
		

		if(!isset($id)){$id=$this->session->userdata('coustomer_id');}
		$coustomer = $this->db->where('coustomer_id',$id)->get('coustomer')->first_row('array');
		$coustomer_info = ['coustomer'=>$coustomer,'suppliers'=>$this->getSupplier(null,true)];
		echo json_encode($coustomer_info);



	}



	function getSupplier($id=null,$return=null)
	{
		if(isset($id))
		{
			$supplier = $this->db->where('supplier_id', $id)->where('coustomer_id',$this->session->userdata('coustomer_id'))->join('supplier', 'supplier_id = crws_supplier_id')->get('crws')->first_row('array');
		}
		else
		{	
			$supplier = $this->db->where('coustomer_id',$this->session->userdata('coustomer_id'))->join('supplier', 'supplier_id = crws_supplier_id')->get('crws')->result_array();
			
		}
		
		if($return==null){
			echo json_encode($supplier);
		}else{
			return $supplier;
		}
	}

	function getCategory()
	{

		
		$categorys = $this->db->get('product_category')->result_array();
		echo json_encode($categorys);

	}


	function getProducts($supplier_id=null,$cat_id=null)
	{

		if(isset($supplier_id))
		{
			$this->db->or_where('product_supplier_id', $supplier_id);
		}

		

		else 
		{
			$suppliers =  $this->getSupplier(null,true);
			foreach ($suppliers as $supplier) 
			{
				$this->db->or_where('product_supplier_id', $supplier['supplier_id']); 
			}

		}

		$this->db->select
					('  *, 
						product_regular_unit_price AS product_default_unit_price,
						product_regular_unit_price_rate AS product_default_unit_price_rate,
						c_product_unit_price AS product_regular_unit_price,
						product_max_qt AS  default_max_qt,
						product_min_qt AS default_min_qt,
						c_product_product_max_qt AS product_max_qt,
						c_product_product_min_qt AS product_min_qt'
					)
					->where('c_product_coustomer_id',$coustomer_id)
					->join('product', 'product_id = c_product_product_id')
					->get('c_product')
					->result_array();

		$this->db->join('product_category', 'product_cat_id = product_category_id');
		$products = $this->db->where('product_status', 1)->get('product')->result_array();

		echo json_encode($products);

	}

	function getProductsByCat($pid,$sid)
	{


		$products =$this->db->where('product_category_id',$pid)->where('product_supplier_id',$sid)->join('product_category', 'product_cat_id = product_category_id')->get('product')->result_array();
		echo json_encode($products);

	}

	function getProduct2($id)
	{
		
		$this->db->or_where('product_id', $id);
		$this->db->join('product_category', 'product_cat_id = product_category_id');
		$this->db->join('unit', 'unit_id = product_unit_id','left');
		$this->db->join('supplier', 'supplier_id = product_supplier_id');


		$products = $this->db->get('product')->first_row('array');

		echo json_encode($products);
	}

	
	function getRecentOrders($status)
	{
		$orders = $this->db->where('order_coustomer_id',$this->session->userdata('coustomer_id'))->where('order_status',$status)->join('supplier', 'supplier_id = order_supplier_id')->limit(20)->get('order')->result_array();
		echo json_encode($orders);
	}


	function getOrders()
	{
		
		$this->db->where('order_coustomer_id', $this->session->userdata('coustomer_id'));
		$this->db->join('supplier', 'supplier_id = order_supplier_id');
		$orders = $this->db->order_by('order_id','desc')->get('order')->result_array();

		echo json_encode($orders);
	}

	

	function getOrder($id)
	{
		$order = $this->db->where('order_id', $id)->join('supplier', 'supplier_id = order_supplier_id')->get('order')->first_row('array');
		$items = $this->db->where('item_order_id',$id)
			->join('product', 'product_id = item_product_id')
			->join('unit', 'unit_id = product_unit_id','left')
			->join('tax', 'tax_id = product_tax_id','left')
			->get('orderd_item')
			->result_array();

		$order = ['order_details'=>$order,'order_items'=>$items];
		echo json_encode($order);

		
	}


	function genNewOrderID()
	{
		$temp = $this->db->order_by('order_id','desc')->limit(1)->get('order')->first_row('array');
		echo ($temp['order_id']);
	}


	function removeItem($id)
	{
		$this->db->where('item_id',$id)->delete('orderd_item');
	}

	function saveOrder()
	{
		

		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
		    $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}

		



		$order = $_POST['order_details'];

		/*insert order*/

		
		$row = [
			'order_coustomer_id'=>$order['order_coustomer_id']
			,'order_supplier_id'=>$order['order_supplier_id']
			,'order_status'=>$order['order_status']
			,'order_notes'=>$order['order_notes']
			,'order_date'=>$order['order_date']
			,'order_required_delivery_date'=>$order['order_required_delivery_date']
			,'order_total_price'=>$order['order_total_price']

		];

		$checkrow = $this->db->where('order_id',$order['order_id'])->limit(1)->get('order')->first_row('array');

		if(count($checkrow) == 0){
			$this->db->insert('order',$row);
		}else{
			$this->db->where('order_id',$order['order_id'])->update('order',$row);
		}
	}


	function addOrderItem()
	{

		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
		    $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}


		 $row = [
		 		'item_order_id'=>$_POST['order_item']['order_id']
		 		,'item_product_id'=>$_POST['order_item']['product_id']
		 		,'item_quantity'=>$_POST['order_item']['item_quantity']

		 ];

		$this->db->insert('orderd_item',$row);
		echo $this->db->insert_id();

		
	}


	function updateQuantity($id,$qyt)
	{
		echo $id.' '.$qyt;
		$this->db->where('item_id',$id)->update('orderd_item',['item_quantity'=>$qyt]);
	}

	function acceptOrder($id)
	{
		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
		    $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}

		$items = $_POST['order_items'];

		$this->db->where('order_id',$id)->update('order',['order_status'=>'accepted']);


		foreach ($items as $item) {
			$row = [
				'item_recived_quantity'=>$item['item_recived_quantity']
			];
			$this->db->where('item_id',$item['item_id'])->update('orderd_item',$row);
		}
	}

	
	function deleteOrder($id)
	{
		$this->db->where('order_id',$id)->delete('order');
	}








	
}
