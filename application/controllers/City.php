<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('City_model');	
		$this->load->library('form_validation');		
		
	}
        public function city_list()
	{
        if ($this->session->userdata('user_id') == '') {redirect('login');}
		$data['citylist']=$this->City_model->city_list();
		$this->load->view('master/city/city-list',$data);
	}
        
		public function city_delete($id)
	{
        if ($this->session->userdata('user_id') == '') {redirect('login');}
		$data = array('isactive' => 0);
		$this->City_model->city_update($data,$id);
		redirect('city-master');	
	}
	public function city_active($id)
	{
        if ($this->session->userdata('user_id') == '') {redirect('login');}
		$data = array('isactive' => 1);
		$this->City_model->city_update($data,$id);
		redirect('city-master');	
	}
}
