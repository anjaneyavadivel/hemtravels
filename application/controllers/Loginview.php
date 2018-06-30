<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginview extends CI_Controller {

	public function index()
	{
		$this->load->view('user/dashboard');
	}
	public function profile()
	{
		$this->load->view('user/profile');
	}
}
