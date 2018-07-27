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
		$data['categorylist']=$this->Master_model->category_list();
		$this->load->view('master/category/category-list',$data);
	}
        public function category_add()
	{
		if ($_POST) 
		{
			$id=trim($this->input->post('id'));
			$name=trim($this->input->post('name'));
			$data = array(
			'id' => $id,
			'name' => $name,
			'isactive'=>1);
			$this->Master_model->category_insert($data);
			redirect('category-master');
		}
	}
        
		public function category_edit($id)
		{ 			
				
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
		$data = array('isactive' => 0);
		$this->Master_model->category_update($data,$id);
		redirect('category-master');	
	}
}
