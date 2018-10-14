<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tripshared extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Tripshared_model');	
		$this->load->library('form_validation');		
	}

    public function trip_list() {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        $url = $this->uri->segment(1);
        if ($url != 'trip-shared') {
            redirect('login');
        }
        $loginuserid = $this->session->userdata('user_id');
        $title = trim($this->input->get('title'));
        $status = trim($this->input->get('status'));
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . $url . "?title=" . $title . "&status=" . $status;
        $whereData = array('loginuserid' => $loginuserid,'title' => $title, 'status' => $status);
        $config["total_rows"] = $this->Tripshared_model->trip_count($whereData);
        $config["per_page"] = 20;
        //$config["uri_segment"] = 2;

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
        //$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["triplist"] = $this->Tripshared_model->trip_list($whereData, $config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data["status"] = $status;
        $data["title"] = $title;
        $data["url"] = $url;
        $data["loginuserid"] = $loginuserid;
            $this->load->view('tripshared/tripshared-list', $data);
    }
     public function cancel_shared($sharedid = 0) { 
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        $whereData = array('id' => $sharedid);
        $updatedata = array('status' => 3);
        $result = updateTable('trip_shared', $whereData, $updatedata);
        redirect('trip-shared');
     }

//    public function loadmodal($view) {
//        if ($view != "") {
//            $data = array();
//            if (isset($_POST)) {
//                foreach ($_POST as $key => $value) {
//                    $data[$key] = $value;
//                }
//            }
//            $this->load->view("tripshared/tripshared-list/$view", $data);
//        } else {
//            echo "Error";
//        }
//    }

    

}
