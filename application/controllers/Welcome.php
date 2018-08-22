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
		$data['trip_popular_list']=$this->Welcome_model->get_trippopular_list($where,$limit);
                $where =array('tm.isactive' => 1, 'tp.status' => 2,'tm.user_id'=>$loginuserid);
                $limit = 2;
		$data['new_booking_list']=$this->Welcome_model->get_tripbooking_list($where,$limit);
                $where =array('tm.isactive' => 1,'tm.user_id'=>$loginuserid);
                $limit = 2;
		$data['all_booking_list']=$this->Welcome_model->get_tripbooking_list($where,$limit);
		//$data['trip_list']=$this->Welcome_model->get_list($where);
		$this->load->view('welcome_b2b',$data);
            }else{
                $where =array('tm.isactive'=>1);
                $limit = 4;
		$data['trippost_list']=$this->Welcome_model->get_trip_list($where,$limit);
                $limit = 10;
		$data['trip_popular_list']=$this->Welcome_model->get_trippopular_list($where,$limit);
                $limit = '';
		$where =array('cm.isactive'=>1);
		$data['tripcategory_list']=$this->Welcome_model->get_tripcategory_list($where,$limit);
		$this->load->view('welcome_b2c',$data);
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
     
	public function faq_list()
	{
		if ($this->session->userdata('user_id') == '') { redirect('login'); }		
		$data['faqlist']=$this->Welcome_model->faq_list();
        $this->load->view('faq', $data);
	}
	
	public function faq_add()
	{
		if ($this->session->userdata('user_id') == '') {  return FALSE; }		
		if($_POST)
		{
			$question=trim($this->input->post('question'));
			$answer=trim($this->input->post('answer'));	
			
			$this->form_validation->set_rules('question', 'Name', 'trim|required|max_length[150]');
			$this->form_validation->set_rules('answer', 'answer', 'trim|required');
			
			if (!$this->form_validation->run()){$error=$this->session->set_userdata('err',validation_errors());}			
			else if ($this->form_validation->run() == TRUE)
			{
				$data = array('question' => $question,'answer' => $answer,'isactive' => 1);
				$id=$this->Welcome_model->faq_insert($data);
				if($id>0){$error=$this->session->set_userdata('suc','Successfullly Added');}
			}
			redirect(base_url().'faq');
		}
		$data['faqdetail']=array('id'=>'','question'=>'','answer'=>'');
		$data['title']='Add';
		$data['url']='faq/add';
		$this->load->view('faq-add',$data);
	}
	
	//Function-3 : edit user type 
	public function faq_edit($id)
	{
		if ($this->session->userdata('user_id') == '') { redirect('login'); }		
		if($_POST)
		{
			$question=trim($this->input->post('question'));
			$answer=trim($this->input->post('answer'));	
			
			$this->form_validation->set_rules('question', 'question', 'trim|required|max_length[150]');
			$this->form_validation->set_rules('answer', 'answer', 'trim|required');
			
			if (!$this->form_validation->run()){$error=$this->session->set_userdata('err',validation_errors());}			
			else if ($this->form_validation->run() == TRUE)
			{
				$data = array('question' => $question,'answer' => $answer);
				$this->Welcome_model->usertype_update($data,$id);
				if($id>0){$error=$this->session->set_userdata('suc','Successfullly Added');}
			}
			redirect(base_url().'faq');
		}
		$data['faqdetail']=$this->Welcome_model->faq_detail($id);
		$data['title']='Edit';
		$data['url']='faq/edit/'.$id;
		$this->load->view('faq-add',$data);	
	}
	
	//Function-4 : delete user type 
	public function faq_delete($id)
	{
		if ($this->session->userdata('user_id') == '') { redirect('login'); }		
		$data = array('isactive' => 0);
		$this->Welcome_model->faq_update($data,$id);
		redirect(base_url().'faq');	
	}
}
	

