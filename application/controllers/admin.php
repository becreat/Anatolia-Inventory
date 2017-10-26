<?php

class admin extends CI_Controller
{
	
	function __construct()
	{
		
		parent::__construct();

		if(!$this->session->userdata('admin_id'))
		{
			redirect('auth/admin');
		}
		
	}


	function index(){
		$this->load->view('admin/header');
		$this->load->view('admin/index');
		$this->load->view('admin/footer');
	}
	function viewOrders(){$this->load->view('admin/viewOrders');}
	function viewOrder(){$this->load->view('admin/viewOrder');}
	function addProduct(){$this->load->view('admin/addProduct');}
	function viewProducts(){$this->load->view('admin/viewProducts');}
	function productManager(){$this->load->view('admin/productManager');}
	function editProduct(){$this->load->view('admin/editProduct');}
	function manageCategory(){$this->load->view('admin/manageCategory');}
	function createSupplier(){$this->load->view('admin/createSupplier');}
	function manageSuppliers(){$this->load->view('admin/manageSuppliers');}
	function editSupplier(){$this->load->view('admin/editSupplier');}
	function createCustomer(){$this->load->view('admin/createCustomer');}
	function manageCustomers(){$this->load->view('admin/manageCustomers');}
	function editCustomer(){$this->load->view('admin/editCustomer');}
	function changeAccess(){$this->load->view('admin/changeAccess');}
	function unitManager(){$this->load->view('admin/unitManager');}
	function taxManager(){$this->load->view('admin/taxManager');}


	function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/admin');
	}
	
}