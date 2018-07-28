<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tripinclusions extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Tripinclusions_model');	
		$this->load->library('form_validation');		
		
	}
        public function trip_list()
	{
        if ($this->session->userdata('user_id') == '') {redirect('login');}
		$data['triplist']=$this->Tripinclusions_model->trip_list();
		$this->load->view('master/trip/trip-list',$data);
	}
        
		public function trip_delete($id)
	{
        if ($this->session->userdata('user_id') == '') {redirect('login');}
		$data = array('isactive' => 0);
		$this->Tripinclusions_model->trip_update($data,$id);
		redirect('trip-inclusions-master');	
	}
	public function trip_active($id)
	{
        if ($this->session->userdata('user_id') == '') {redirect('login');}
		$data = array('isactive' => 1);
		$this->Tripinclusions_model->trip_update($data,$id);
		redirect('trip-inclusions-master');	
	}
}
