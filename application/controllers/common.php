<?php

class common extends CI_Controller
{
	
	



	function exportOrder($id)
	{

		
		$data['order'] = $this->db->where('order_id', $id)->join('supplier', 'supplier_id = order_supplier_id')->get('order')->first_row('array');
		$data['items'] = $this->db->where('item_order_id',$id)
			->join('product', 'product_id = item_product_id')
			->join('unit', 'unit_id = product_unit_id','left')
			->get('orderd_item')
			->result_array();
		
	


		$data['totalQuantityOrdered'] = 0;
		$data['totalQuantityReceived'] = 0;
		$data['crws_code'] = $this->getCrwsCode($data['order']['order_coustomer_id'],$data['order']['order_supplier_id'],true);
 
		foreach ($data['items'] as $item) {
			$data['totalQuantityOrdered'] += $item['item_quantity'];
		}
		foreach ($data['items'] as $item) {
			$data['totalQuantityReceived'] += $item['item_recived_quantity'];
		}
		
		$html = $this->load->view('user/orderhtml',$data,true);



		require('application/third_party/dompdf/dompdf_config.inc.php');
		
		$pdf = new DOMPDF();
		$pdf->load_html($html);
		$pdf->render();
		$pdf->stream('order_details_'.$id);
		$pdf->Output();
	
	}

	function getCrwsCode($cid,$sid,$return=null)
	{
		$row = $this->db->where('coustomer_id',$cid)->where('crws_supplier_id',$sid)->get('crws')->first_row('array');
		if($return==true)
		{
			return $row['ci'];
		}else{
			echo $row['ci'];
		}

	}
	
}