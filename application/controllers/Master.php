<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Master_model');		
	}
        public function category_list()
	{
            if ($this->session->userdata('user_id') == '') {redirect('login');}
		$data['categorylist']=$this->Master_model->category_list();
		$this->load->view('master/category/category-list',$data);
	}
        public function category_add()
	{
            if ($this->session->userdata('user_id') == '') {redirect('login');}
		if ($_POST) 
		{
                    $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');
                     if ($this->form_validation->run($this) != FALSE) {
			$id=trim($this->input->post('id'));
			$name=trim($this->input->post('category_name'));
			$data = array(
			'id' => $id,
			'name' => $name,
			'isactive'=>1);
			$this->Master_model->category_insert($data);
			redirect('category-master');
                     }
		}
                return FALSE;
	}
        
		public function category_edit($id)
		{ 			
		if ($this->session->userdata('user_id') == '') {redirect('login');}		
		if($_POST)
		{
			$id=trim($this->input->post('id'));
			$name=trim($this->input->post('name'));
			
			$data = array('id' => $id,'name' => $name);
			$data['categorydetail']=$this->Master_model->category_detail($id);
				$this->Master_model->category_update($data,$id);
			}
			redirect('category-master');
		}
		
		public function category_delete($id)
	{
                    if ($this->session->userdata('user_id') == '') {redirect('login');}
		$data = array('isactive' => 0);
		$this->Master_model->category_update($data,$id);
		redirect('category-master');	
	}
}
