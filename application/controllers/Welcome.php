<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

function __construct()
	{
		parent::__construct();
		$this->load->model('Welcomeb2b_model');	
		$this->load->helper('custom_helper');	
	}
	
	public function index()
	{
            if($this->session->userdata('user_type')=='SA'){
		$this->load->view('welcome_b2a');
            }else if($this->session->userdata('user_type')=='VA'){
		$data['trippost_list']=$this->Welcomeb2b_model->get_trip_list();
		$this->load->view('welcome_b2b',$data);
            }else{
		$this->load->view('welcome_b2c');
            }
	}
        public function about_us()
	{
		$this->load->view('about_us');
	}
        public function contact_us()
	{
		$this->load->view('contact_us');
	}
        public function faq()
	{
		$this->load->view('faq');
	}
}
