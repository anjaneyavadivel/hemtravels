<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class State extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('State_model');	
		$this->load->library('form_validation');		
		
	}
        public function state_list()
	{
        if ($this->session->userdata('user_id') == '') {redirect('login');}
		$data['statelist']=$this->State_model->state_list();
		$this->load->view('master/state/state-list',$data);
	}
        
		public function state_delete($id)
	{
        if ($this->session->userdata('user_id') == '') {redirect('login');}
		$data = array('isactive' => 0);
		$this->State_model->state_update($data,$id);
		redirect('state-master');	
	}
	public function state_active($id)
	{
        if ($this->session->userdata('user_id') == '') {redirect('login');}
		$data = array('isactive' => 1);
		$this->State_model->state_update($data,$id);
		redirect('state-master');	
	}
}
