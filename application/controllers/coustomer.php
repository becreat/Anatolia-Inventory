<?php

class coustomer extends CI_Controller
{
	
	function __construct()
	{
		
		parent::__construct();

		if(!$this->session->userdata('coustomer_name'))
		{
			redirect('auth/coustomer');
		}
		
	}

	function index()
	{
		$this->load->view('user/header');
		$this->load->view('user/index');
		$this->load->view('user/footer');
	}

	function dashboard()
	{
		$this->load->view('user/dashboard');
	}

	function newOrder()
	{
		$this->load->view('user/newOrder');
	}

	function createOrder()
	{
		echo 'od';
	}

	function viewOrders()
	{
		$this->load->view('user/viewOrders');
	}

	function viewOrder()
	{
		$this->load->view('user/viewOrder');
	}

	function viewSuppliers()
	{
		$this->load->view('user/viewSuppliers');
	}

	function viewSupplier()
	{
		$this->load->view('user/viewSupplier');
	}

	function viewProducts()
	{
		$this->load->view('user/viewProducts');
	}

	function viewProductsBySupplier()
	{
		$this->load->view('user/viewProductsBySupplier');
	}

	function viewProduct()
	{
		$this->load->view('user/viewProduct');
	}

	function sendEmail()
	{
		$this->load->view('user/sendEmail');
	}

	function howToUse()
	{
		$this->load->view('user/howToUse');
	}



	function profile()
	{
		$this->load->view('user/profile');
	}

	

	



	function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/coustomer');
	}
	
}