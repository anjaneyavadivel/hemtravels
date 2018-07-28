<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Tag_model');	
		$this->load->library('form_validation');		
		
	}
        public function Tag_list()
	{
        if ($this->session->userdata('user_id') == '') {redirect('login');}
		$data['taglist']=$this->Tag_model->tag_list();
		$this->load->view('master/tag/Tag-list',$data);
	}
        
		public function Tag_delete($id)
	{
        if ($this->session->userdata('user_id') == '') {redirect('login');}
		$data = array('isactive' => 0);
		$this->Tag_model->tag_update($data,$id);
		redirect('tag-master');	
	}
	public function Tag_active($id)
	{
        if ($this->session->userdata('user_id') == '') {redirect('login');}
		$data = array('isactive' => 1);
		$this->Tag_model->tag_update($data,$id);
		redirect('tag-master');	
	}
}
