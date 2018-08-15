<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

function __construct()
	{
		parent::__construct();
		$this->load->model('Welcome_model');	
		$this->load->helper('custom_helper');	
	}
	
	public function index()
	{
            if($this->session->userdata('user_type')=='SA'){
		$this->load->view('welcome_b2a');
            }else if($this->session->userdata('user_type')=='VA'){
                $loginuserid = $this->session->userdata('user_id');
                $where =array('tm.isactive'=>1,'tm.user_id'=>$loginuserid);
                $limit = 8;
		$data['trippost_list']=$this->Welcome_model->get_trip_list($where,$limit);
                $limit = 10;
		$data['trip_popular_list']=$this->Welcome_model->get_trippopular_list($where);
                $where =array('tm.isactive' => 1, 'tp.status' => 2,'tm.user_id'=>$loginuserid);
                $limit = 2;
		$data['new_booking_list']=$this->Welcome_model->get_tripbooking_list($where,$limit);
                $where =array('tm.isactive' => 1,'tm.user_id'=>$loginuserid);
                $limit = 2;
		$data['all_booking_list']=$this->Welcome_model->get_tripbooking_list($where,$limit);
		//$data['trip_list']=$this->Welcome_model->get_list($where);
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
