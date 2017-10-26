<?php

class adminservices extends CI_Controller
{
	

	function __construct()
	{
		
		parent::__construct();

		if(!$this->session->userdata('admin_id'))
		{
			header('WWW-Authenticate: Negotiate');
		}
		
	}

	function getOrders($id=null)
	{
		if(isset($id))
		{
			$order_details = $this->db->where('order_id',$id)->join('supplier', 'supplier_id = order_supplier_id')->join('coustomer', 'coustomer_id = order_coustomer_id')->get('order')->first_row('array');
			$items = $this->db->where('item_order_id',$id)
				->join('product', 'product_id = item_product_id')
				->join('unit', 'unit_id = product_unit_id')
				->join('tax', 'tax_id = product_tax_id')
				->get('orderd_item')
				->result_array();
			$order = ['order_details'=>$order_details,'order_items'=>$items];
			echo json_encode($order);
		


		}else{
			echo json_encode($this->db->where_not_in('order_status',['draft'])->join('supplier', 'supplier_id = order_supplier_id')->join('coustomer', 'coustomer_id = order_coustomer_id')->limit(1000)->order_by('order_id','desc')->get('order')->result_array());
		}

		
	}


	function updateOrder($id){
		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
		    $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}

		$this->db->where('order_id',$id)->update('order',$_POST['order_details']);
	}



	

	function getProducts(){
		$products = $this->db->join('product_category', 'product_cat_id = product_category_id')->order_by('product_id','desc')->get('product')->result_array();
		echo json_encode($products);
	}

	

	function getAvailableProductsByCoustomer($coustomer_id)
	{

		$suppliers = $this->db->select('supplier_id')->where('coustomer_id',$coustomer_id)->join('supplier', 'supplier_id = crws_supplier_id')->get('crws')->result_array();
		$selected_product = $this->getSelectedProductsByCoustomer($coustomer_id);

		if(!empty($suppliers))
		{

			$where_stmt = "WHERE (";

			foreach ($suppliers as $supplier) {
				$where_stmt.="`supplier_id`=".$supplier['supplier_id']." or ";
			}

			$where_stmt = substr($where_stmt, 0 ,-4).") AND (";

			if(!empty($selected_product))
			{
				foreach ($selected_product as $product) {
					$where_stmt .= "product_id !=" . $product['c_product_product_id']." and ";
				}
			}

			$where_stmt = substr($where_stmt, 0 ,-4).")";
			
			$query = "SELECT * FROM (`product`) JOIN `product_category` ON `product_cat_id` = `product_category_id` JOIN `supplier` ON `product_supplier_id` = `supplier_id` ".$where_stmt." ORDER BY `product_id` desc";
			$products = $this->db->query($query)->result_array();

			echo json_encode([
				"products"=>$products
				,"selectedProducts"=>$selected_product
			]);


		}
		

		
		
	}


	function getSelectedProductsByCoustomer($coustomer_id)
	{
		$products = $this->db->select
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
		
		return $products;
	}

	function createProductInCoustomer()
	{
		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
		    $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}

		$this->db->insert('c_product',$_POST);
		echo $this->db->insert_id();
	}

	function updateProductInCoustomerList($id)
	{	
		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
		    $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}

		var_dump($_POST);
		$this->db->where('c_product_id',$id)->update('c_product',$_POST);
		
	}

	function removeProductFrmCoustomerList($coustomer_id)
	{
		$this->db
			->where('c_product_id',$coustomer_id)
			->delete('c_product');
	}

	



	function updatePriceList($coustomer_id,$product_id,$price)
	{	
		$list = $this->db
				->where('price_list_coustomer_id',$coustomer_id)
				->where('price_list_product_id',$product_id)
				->get('price_list')
				->first_row('array');

		if(!empty($list))
		{
			$this->db
			->where('price_list_coustomer_id',$coustomer_id)
			->where('price_list_product_id',$product_id)
			->update('price_list',array('price_list_price'=>$price));
		}

		else{
			$this->db->insert('price_list',array(
				'price_list_coustomer_id'=>$coustomer_id
				,'price_list_product_id'=>$product_id
				,'price_list_price'=>$price
			));
		}


	}

	function deletePriceList($coustomer_id,$product_id)
	{	
		$list = $this->db
				->where('price_list_coustomer_id',$coustomer_id)
				->where('price_list_product_id',$product_id)
				->delete('price_list');

		

	}

	function updateProductStatus($id,$key)
	{
		$this->db->where('product_id',$id)->update('product',['product_status'=>$key]);
	
	}

	

	function getProduct($id){
		$product = $this->db->where('product_id', $id)->get('product')->first_row('array');
		echo json_encode($product);
	}

	function getSuppliers($id=null)
	{
		if(isset($id)){
			echo json_encode($this->db->where('supplier_id',$id)->get('supplier')->first_row('array'));
		}else{
			echo json_encode($this->db->order_by('supplier_id','desc')->get('supplier')->result_array());
		}
	}

	function getSuppliersByCustomer($id)
	{
		echo json_encode($this->db->where('coustomer_id',$id)->join('supplier', 'supplier_id = crws_supplier_id')->get('crws')->result_array());
	}

	function getCustomers($id=null)
	{
		if(isset($id)){
			echo json_encode($this->db->where('coustomer_id',$id)->get('coustomer')->first_row('array'));
		}else{
			echo json_encode($this->db->order_by('coustomer_id','desc')->get('coustomer')->result_array());
		}
	}

	function getCategorys()
	{	
		$categorys = $this->db->order_by('product_cat_id','desc')->get('product_category')->result_array();
		echo json_encode($categorys);
	}

	function getUnits()
	{	
		$units = $this->db->order_by('unit_name','asc')->get('unit')->result_array();
		echo json_encode($units);
	}

	function getTaxs()
	{	
		$units = $this->db->order_by('tax_name','asc')->get('tax')->result_array();
		echo json_encode($units);
	}

	function addTax()
	{
		
		$this->db->insert('tax',array('tax_name'=>'new'));
		echo $this->db->insert_id();
	}

	function updateTax($id)
	{
		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
		    $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}

		$this->db->where('tax_id',$id)->update('tax',$_POST['tax_details']);
	}

	function deleteTax($id)
	{
		$this->db->where('tax_id',$id)->delete('tax');
	}



	function addProduct()
	{
		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
		    $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}
		$this->db->insert('product',$_POST['product_details']);
		echo $this->db->insert_id();
	}

	function addCategory()
	{
		
		$this->db->insert('product_category',['product_cat_title'=>'']);
		echo $this->db->insert_id();
	}

	function addUnit()
	{
		
		$this->db->insert('unit',array('unit_name'=>'new'));
		echo $this->db->insert_id();
	}

	function updateCategory($id)
	{
		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
		    $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}

		$this->db->where('product_cat_id',$id)->update('product_category',$_POST['category_details']);
	}

	function updateUnit($id)
	{
		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
		    $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}

		$this->db->where('unit_id',$id)->update('unit',$_POST['unit_details']);
	}

	function deleteProduct($id)
	{
		$this->db->where('product_id',$id)->delete('product');
	}

	function deleteCat($id)
	{
		$this->db->where('product_cat_id',$id)->delete('product_category');
	}

	function deleteUnit($id)
	{
		$this->db->where('unit_id',$id)->delete('unit');
	}


	function updateProduct($id)
	{
		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
		    $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}
		$this->db->where('product_id',$id)->update('product',$_POST['product_details']);
	}

	function addSupplier()
	{
		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
		    $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}
		$this->db->insert('supplier',$_POST['supplier_details']);
		echo $this->db->insert_id();
	}


	function updateSupplier($id)
	{
		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
		    $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}
		$this->db->where('supplier_id',$id)->update('supplier',$_POST['supplier_details']);
	}

	function addCustomer()
	{
		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
		    $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}
		$this->db->insert('coustomer',$_POST['customer_details']);
		echo $this->db->insert_id();
	}

	function updateCustomer($id)
	{
		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
		    $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}
		$this->db->where('coustomer_id',$id)->update('coustomer',$_POST['customer_details']);
	}


	function updateCustomerAccess($id,$key)
	{
		$this->db->where('coustomer_id',$id)->update('coustomer',['coustomer_active'=>$key]);
	}

	

	function addCrws()
	{
		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
		    $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}
		$this->db->insert('crws',$_POST['crws_details']);
		echo $this->db->insert_id();
	}

	function removeCrws($id)
	{
		$this->db->where('crws_id',$id)->delete('crws');
		
	}

	function updateCrws($id,$code)
	{
		$this->db->where('crws_id',$id)->update('crws',['ci'=>$code]);
		
	}

	function getAdminSetting()
	{
		echo json_encode($this->db->get('admin')->first_row('array'));

	}

	function updateSetting()
	{
		if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
		    $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}
		$this->db->where('admin_id',1)->update('admin',$_POST['setting']);
		
	}




	
}
