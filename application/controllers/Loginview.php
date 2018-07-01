<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginview extends CI_Controller {

	function __construct() {

		parent::__construct();
		$this->session->set_userdata('user_id',1);		
	}
	function login_verfy($id=0)
	{
		if($id==0)
		{
			$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
			$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
			$this->output->set_header('Pragma: no-cache');
			$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");  
			if($this->session->userdata('user_id') == '')
			{
				$this->session->set_userdata('err','Please, Login to Access!!');
				redirect('login');
			}
		}
		else
		{
			return false;
		}
	}
	public function profile()
	{
		$this->login_verfy();
		$this->load->view('user/profile');
	}
	public function update_profile()
	{
		$this->login_verfy();
		$this->load->view('user/update_profile');
	}
	public function change_password()
	{
		$this->login_verfy();
		$this->load->view('user/change_password');
	}
	public function account_details()
	{
		$this->login_verfy();
		$this->load->view('user/account_details');
	}
	public function my_post()
	{
		$this->login_verfy();
		$this->load->view('user/my_post');
	}
	public function booking_history()
	{
		$this->login_verfy();
		$this->load->view('user/book_history');
	}
	public function my_wish_list()
	{
		$this->login_verfy();
		$this->load->view('user/my_wish_list');
	}
	public function logout()
	{
		$this->session->unset_userdata('user_id','');
		$this->session->unset_userdata('uname','');
		$this->session->sess_destroy();
		$this->session->set_userdata('suc',' Loggedout Successfully ..!');
		redirect();
	}
}
