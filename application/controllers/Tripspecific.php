<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tripspecific extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Tripspecific_model');
    }

    public function trip_list($trip_search = '', $offer_type = '') {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        $tripsearch = trim($this->input->post('trip_search'));
        $offertype = trim($this->input->post('offer_type'));
        $type = trim($this->input->get('type'));
        if ($offertype != '') {
            $offer_type = $offertype;
        }
        if ($tripsearch != '') {
            $trip_search = $tripsearch;
        }
        if ($type != '') {
            $offer_type = $type;
        }
        $trip_search = $this->security->xss_clean($trip_search);
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . "trip-shared/" . $trip_search . "?type=" . $offer_type;
        $config["total_rows"] = $this->Tripspecific_model->trip_count($trip_search, $offer_type);
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
        $data["triplist"] = $this->Tripspecific_model->trip_list($config["per_page"], $page, $trip_search, $offer_type);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data["trip_search"] = $trip_search;
        $data["offer_type"] = $offer_type;
        $this->load->view('trip-specific/trip-specific-list', $data);
    }
    
    public function loadmodal($action = 'new') { 
        if ($this->session->userdata('user_id') == '' || 
            ($this->session->userdata('user_type') != 'SA' && $this->session->userdata('user_type') !='VA' )) {
            return FALSE;
        }
        
        $whereData = array('isactive' => 1);        
        if ($this->session->userdata('user_type') == 'VA') {
            $whereData['user_id'] = $this->session->userdata('user_id');
        }        
        $data['trip_list'] = selectTable('trip_master', $whereData,['*'],[],[],'','',[],'result_array');
        
        if($action != 'new'){
            $whereData2 = array('id' => $action,'isactive' => 1); 
            $data['details'] = selectTable('trip_specific_day', $whereData2,['*'],[],[],'','',[],'row_array'); 
            $this->load->view("trip-specific/tripspl-edit", $data);
        }else{
            $this->load->view("trip-specific/tripspl-add", $data);
        }
    }
    
    //code
    public function tripSpecificAction() {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
        $err = 'yes';
        if ($_POST) {
            $this->form_validation->set_rules('trip_id', 'Select a Trip', 'trim|required');
            $this->form_validation->set_rules('trip_type', 'Trip Type', 'trim|required');
            $this->form_validation->set_rules('title', 'Trip Title', 'trim|required');
            $this->form_validation->set_rules('fromdate', 'Category Name', 'trim|required');
            $this->form_validation->set_rules('todate', 'Category Name', 'trim|required');
           
            if ($this->form_validation->run($this) != FALSE) {                
                extract($this->input->post());
                $data = array(
                    'trip_id'                 => $trip_id,
                    'type'                    => $trip_type,
                    'title'                   => $title,                   
                    'from_date'               => date("Y-m-d", strtotime($fromdate)),
                    'to_date'                 => date("Y-m-d", strtotime($todate)),
                    'no_of_traveller'         => isset($no_of_traveller)&&!empty($no_of_traveller)?$no_of_traveller:0,
                    'no_of_min_booktraveller' => isset($no_of_min_booktraveller)&&!empty($no_of_min_booktraveller)?$no_of_min_booktraveller:0,
                    'no_of_max_booktraveller' => isset($no_of_max_booktraveller)&&!empty($no_of_max_booktraveller)?$no_of_max_booktraveller:0,
                    'offer_type'              => isset($offer_type)&&!empty($offer_type)?$offer_type:0,                    
                    'price_to_adult'          => isset($price_to_adult)&&!empty($price_to_adult)?$price_to_adult:0,
                    'price_to_child'          => isset($price_to_child)&&!empty($price_to_child)?$price_to_child:0,
                    'price_to_infan'          => isset($price_to_infan)&&!empty($price_to_infan)?$price_to_infan:0,
                    );
                
                if($this->input->post('action') == 'new'){
                     $trip_specific_day = insertTable('trip_specific_day', $data);
                     $err = '';
                }else if($this->input->post('action') == 'edit' && !empty($this->input->post('trip_spec_id'))){
                    $upQry = updateTable('trip_specific_day',array('id' => $this->input->post('trip_spec_id')),$data);
                    $err = '';
                }
                
            }
        }
        
        if($err != ''){
            echo 'Sorry! Try again...';
            return FALSE;
        }
    }
    
    public function delete($id) {
        if ($this->session->userdata('user_id') == '' || ($this->session->userdata('user_type') != 'SA' && $this->session->userdata('user_type') != 'VA')) {
            redirect('login');
        }
        $data = array('isactive' => 0);
        $upQry = updateTable('trip_specific_day',array('id' => $id),$data);
        redirect('trip-specific');
    }

    public function active($id) {
        if ($this->session->userdata('user_id') == '' || ($this->session->userdata('user_type') != 'SA' && $this->session->userdata('user_type') != 'VA')) {
            redirect('login');
        }
        
        $data = array('isactive' => 1);
        $upQry = updateTable('trip_specific_day',array('id' => $id),$data);
        redirect('trip-specific');
    }
    
    public function getTripDetails(){
        $returnedData['data'] = [];
        if ($_POST) 
        {
            $trip_id  = $this->input->post('trip_id');
            
            if(!empty($trip_id)){
                $whereData        = array('isactive' => 1,'id' => $trip_id);
                $returnedData['data'] = selectTable('trip_master', $whereData,['*'],[],[],'','',[],'row_array'); 
            }
        }
        echo json_encode($returnedData);exit;
    }

    
}

   