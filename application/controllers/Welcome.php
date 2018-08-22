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
  //      public function faq()
	//{
	//	if ($this->session->userdata('user_id') == '') {
           // redirect('login');
     //   }
		
     //   $data['faqlist']=$this->Welcome_model->get_faq_list();
     //   $this->load->view('faq', $data);
	//}
	
	    public function faq_list($faq_search = '') {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . "faq/" . $faq_search; //?search=".$tag_search
        $config["total_rows"] = $this->Welcome_model->faq_count($faq_search);
        $config["per_page"] = 20;
        $config["uri_segment"] = 2;

        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['use_page_numbers'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['cur_tag_open'] = '&nbsp;<a class="active">';
        $config['cur_tag_close'] = '</a>';

        $config['next_link'] = '&NestedGreaterGreater;';
        $config['prev_link'] = '&NestedLessLess;';
        $this->pagination->initialize($config);
        $page = ($this->input->get('page')) ? ( ( $this->input->get('page') - 1 ) * $config["per_page"] ) : 0;
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["faqlist"] = $this->Welcome_model->faq_list($config["per_page"], $page, $faq_search);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data["faq_search"] = $faq_search;
        $this->load->view('faq', $data);
    }

    public function loadmodal($view) {
        if ($view != "") {
            $data = array();
            if (isset($_POST)) {
                foreach ($_POST as $key => $value) {
                    $data[$key] = $value;
                }
            }
            $this->load->view("faq/$view", $data);
        } else {
            echo "Error";
        }
    }

    public function faq_add() {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
        if ($_POST) {
            $this->form_validation->set_rules('question', 'question Name', 'trim|required');
            $this->form_validation->set_rules('answer', 'answer Name', 'trim|required');
			if ($this->form_validation->run($this) != FALSE) {
                $id = trim($this->input->post('id'));
				$answer = ucwords(trim($this->input->post('answer')));
                $question = ucwords(trim($this->input->post('question')));
                $whereData = array('isactive' => 1, 'question' => $question,'answer' => $answer);
                $faq_list = selectTable('faq_master', $whereData);
                if ($faq_list->num_rows() > 0) {
                    echo 'Sorry! All ready exist this name.';
                    return FALSE;
                }
                $data = array(
                    'id' => $id,
					'question' => $question,
                    'answer' => $answer,
                    'isactive' => 1);
                $faq_id = $this->Welcome_model->faq_insert($data);
                if ($faq_id) {
                    return TRUE;
                }
            }
        }
        echo 'Sorry! Try again...';
        return FALSE;
    }

    public function faq_edit() {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        if ($_POST) {
            $id = trim($this->input->post('id'));

            $data = array('id' => $id);
            $data['faqdetail'] = $this->Welcome_model->faq_detail($data);
            //$this->Tag_model->category_update($data,$id);
            $this->load->view('faq/faq-edit', $data);
        }
    }

    public function faq_save_edit() {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
        if ($_POST) {
            $id = trim($this->input->post('faq_id'));
            $answer = trim($this->input->post('faq_answer'));
            $question = trim($this->input->post('faq_question'));
            $where = array('id' => $id);
            $data = array('answer' => $answer,'question' => $question);
            $result = $this->Welcome_model->faq_update($data, $where);
            if ($result) {
                return TRUE;
            }
        }
        echo 'Sorry! Try again...';
        return FALSE;
    }
}
