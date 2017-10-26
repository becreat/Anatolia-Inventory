<?php

class auth extends CI_Controller
{
	

	function __construct()
	{
		
		parent::__construct();

	


		
	}

	function admin()
	{
		if(isset($_POST['submit']))
		{
			$row_return = $this->db->where('admin_username',$_POST['uname'])->where('admin_password',$_POST['pass'])->get('admin')->first_row('array');

			
			

			if(count($row_return)>1){

				$this->session->set_userdata($row_return);
				redirect('admin/index');

			}else{
				$data['error'] = true;
				$this->load->view('admin/login',$data);

			}
		
		}else{
			$this->load->view('admin/login');
		}
	}

	

	function coustomer()
	{
		if(isset($_POST['submit']))
		{
			
			
			
			$row_return = $this->db->where('coustomer_active',1)->where('coustomer_user',$_POST['uname'])->where('coustomer_pass',$_POST['pass'])->get('coustomer')->first_row('array');

			if(count($row_return)>1){

				$this->session->set_userdata($row_return);
				redirect('coustomer/index');

			}else{
				$data['error'] = true;
				$this->load->view('user/login',$data);

			}
		
		}else{
			$this->load->view('user/login');
		}
		
	}

	


	
}