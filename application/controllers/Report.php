<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Report extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Report_model');
        //require_once APPPATH . 'third_party/PHPExcel.php';
        require_once APPPATH . 'third_party/phpspreadsheet/vendor/autoload.php';
       // $this->excel = new PHPExcel();
    }

    public function booking_wise_reports() {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        $url = $this->uri->segment(1);
        if ($url != 'booking-list' && $url != 'booking-wise-reports') {
            redirect('login');
        }
//        $bookingsearch = trim($this->input->post('booking_search'));
//        if ($bookingsearch != '') {
//            $booking_search = $bookingsearch;
//        }
        $loginuserid = $this->session->userdata('user_id');
        $title = trim($this->input->get('title'));
        $from = trim($this->input->get('from'));
        $to = trim($this->input->get('to'));
        $bookedOnFrom = trim($this->input->get('bookedonfrom'));
        $bookedOnTo = trim($this->input->get('bookedonto'));
        $status = trim($this->input->get('status'));
        $bookfrom = trim($this->input->get('bookfrom'));
        $download = trim($this->input->get('download'));
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . $url . "?title=" . $title . "&from=" . $from . "&to=" . $to."&bookedonfrom=" . $bookedOnFrom . "&bookedonto=" . $bookedOnTo . "&status=" . $status . "&bookfrom=" . $bookfrom;
        $whereData = array('title' => $title, 'from' => $from, 'to' => $to,'bookedonfrom' => $bookedOnFrom,'bookedonto' => $bookedOnTo,  'status' => $status, 'bookfrom' => $bookfrom);
        if ($this->session->userdata('user_type') == 'VA') {
            $whereData['tbpd.user_id'] = $loginuserid;
        }
        if ($this->session->userdata('user_type') == 'SA') {
            $whereData['groupby'] = 'pnr_no';
        }

        $config["total_rows"] = $this->Report_model->booking_count($whereData);
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
        $data["bookinglist"] = $this->Report_model->booking_list($whereData, $config["per_page"], $page,'no');//echo "<pre>";print_r($data["bookinglist"]);exit;
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data["from"] = $from;
        $data["to"] = $to;
        $data["bookedOnFrom"] = $bookedOnFrom;
        $data["bookedOnTo"] = $bookedOnTo;
        $data["status"] = $status;
        $data["bookfrom"] = $bookfrom;
        $data["title"] = $title;
        $data["url"] = $url;
        
        if($download == 1 && isset($data["bookinglist"]) && count($data["bookinglist"]) > 0){
        $data["bookinglist"] = $this->Report_model->booking_list($whereData, $config["per_page"], $page,'download');
            
            $downloadData = $data["bookinglist"];
            
            $this->bookingExport($downloadData);
            
        }else{
            $this->load->view('report/booking-reports', $data);
        }
    }

    public function loadmodal($view) {
        if ($view != "") {
            $data = array();
            if (isset($_POST)) {
                foreach ($_POST as $key => $value) {
                    $data[$key] = $value;
                }
            }
            $this->load->view("report/booking-reports/$view", $data);
        } else {
            echo "Error";
        }
    }

    public function cancellation_reports() {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        $url = $this->uri->segment(1);
        if ($url != 'cancellation-list' && $url != 'cancellation-reports') {
            redirect('login');
        }
        $loginuserid = $this->session->userdata('user_id');
        $title = trim($this->input->get('title'));
        $from = trim($this->input->get('from'));
        $to = trim($this->input->get('to'));
        $status = trim($this->input->get('status'));
        $bookfrom = trim($this->input->get('bookfrom'));
        $download = $this->input->get('download');  
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . $url . "?title=" . $title . "&from=" . $from . "&to=" . $to . "&return_paid_status=" . $status . "&bookfrom=" . $bookfrom;
        $whereData = array('title' => $title, 'from' => $from, 'to' => $to, 'return_paid_status' => $status, 'bookfrom' => $bookfrom);
        if ($this->session->userdata('user_type') == 'VA') {
            $whereData['tbpd.user_id'] = $loginuserid;
        }
        if ($this->session->userdata('user_type') == 'SA') {
            $whereData['groupby'] = 'pnr_no';
        }

        $config["total_rows"] = $this->Report_model->cancellation_count($whereData);
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
        $data["cancellist"] = $this->Report_model->cancellation_list($whereData, $config["per_page"], $page,'no');
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data["from"] = $from;
        $data["to"] = $to;
        $data["status"] = $status;
        $data["bookfrom"] = $bookfrom;
        $data["title"] = $title;
        $data["url"] = $url;
        
         if($download == 1){
            $data["cancellist"] = $this->Report_model->cancellation_list($whereData, $config["per_page"], $page,'download');     
        
            $downloadData = $data["cancellist"];
            
            $this->cancelBookingExport($downloadData);
            
        }else{
            $this->load->view('report/cancellation-reports', $data);
        }
    }

    public function Trip_wise_reports() {
        
        if ($this->session->userdata('user_id') == '' || ($this->session->userdata('user_type') != 'SA' && $this->session->userdata('user_type') != 'VA')) {
            redirect('login');
        }        
        
        $title    = trim($this->input->get('title'));
        $from     = trim($this->input->get('from'));
        $to       = trim($this->input->get('to'));
        $status   = trim($this->input->get('status'));        
        $download = $this->input->get('download');        
        
        $url = $this->uri->segment(1);
        
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . $url . "?title=" . $title . "&from=" . $from . "&to=" . $to . "&status=" . $status;
        $whereData = array('title' => $title, 'from' => $from, 'to' => $to, 'status' => $status,'download' => $download);
                
        $config["per_page"] = 20;
        //$config["uri_segment"] = 2;

        $config['enable_query_strings'] = TRUE;
        $config['page_query_string']    = TRUE;
        $config['use_page_numbers']     = TRUE;
        $config['query_string_segment'] = 'page';
        $config['cur_tag_open']         = '&nbsp;<a class="active">';
        $config['cur_tag_close']        = '</a>';

        $config['next_link'] = '&NestedGreaterGreater;';
        $config['prev_link'] = '&NestedLessLess;';
        $page = ($this->input->get('page')) ? ( ( $this->input->get('page') - 1 ) * $config["per_page"] ) : 0;
        $config["total_rows"]  = $this->Report_model->trip_list($whereData, $config["per_page"], $page,'yes');
        $this->pagination->initialize($config);
        
        $data["triplist"] = $this->Report_model->trip_list($whereData, $config["per_page"], $page,'no');        
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links); //echo "<pre>";print_r($str_links);exit;
        $data["from"] = $from;
        $data["to"] = $to;
        $data["status"] = $status;
        $data["title"] = $title;
        $data["url"] = $url;
        
        if($download == 1 && isset($data["triplist"]) && count($data["triplist"]) > 0){
            $data["triplist"] = $this->Report_model->trip_list($whereData, $config["per_page"], $page,'download');        
        
            $downloadData = $data["triplist"];
            
            $this->exportData($downloadData);
            
        }else{
            $this->load->view('report/Trip-reports.php', $data);
        }
    }

    public function payment_from_B2C_reports() {
        if ($this->session->userdata('user_id') == '' || ($this->session->userdata('user_type') != 'SA' && $this->session->userdata('user_type') != 'VA')) {
            redirect('login');
        }        
        
        $title    = trim($this->input->get('title'));
        $from     = trim($this->input->get('from'));
        $to       = trim($this->input->get('to'));
        $status   = trim($this->input->get('status'));        
        $download = $this->input->get('download');        
        
        $url = $this->uri->segment(1);
        
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . $url . "?title=" . $title . "&from=" . $from . "&to=" . $to . "&status=" . $status;
        $whereData = array('title' => $title, 'from' => $from, 'to' => $to, 'status' => $status,'download' => $download);
                
        $config["per_page"] = 20;
        //$config["uri_segment"] = 2;

        $config['enable_query_strings'] = TRUE;
        $config['page_query_string']    = TRUE;
        $config['use_page_numbers']     = TRUE;
        $config['query_string_segment'] = 'page';
        $config['cur_tag_open']         = '&nbsp;<a class="active">';
        $config['cur_tag_close']        = '</a>';

        $config['next_link'] = '&NestedGreaterGreater;';
        $config['prev_link'] = '&NestedLessLess;';
        $page = ($this->input->get('page')) ? ( ( $this->input->get('page') - 1 ) * $config["per_page"] ) : 0;
        $config["total_rows"]  = $this->Report_model->payment_from_b2c($whereData, $config["per_page"], $page,'yes');
        $this->pagination->initialize($config);
        
        $data["b2c_reports"] = $this->Report_model->payment_from_b2c($whereData, $config["per_page"], $page,'no');        
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links); //echo "<pre>";print_r($str_links);exit;
        $data["from"] = $from;
        $data["to"] = $to;
        $data["status"] = $status;
        $data["title"] = $title;
        $data["url"] = $url; //echo "<pre>";print_r($data);exit;
        
        if($download == 1 && isset($data["b2c_reports"]) && count($data["b2c_reports"]) > 0){
            $data["b2c_reports"] = $this->Report_model->payment_from_b2c($whereData, $config["per_page"], $page,'download');        
        
            $downloadData = $data["b2c_reports"];
            
            $this->paymentB2CExportData($downloadData);
            
        }else{
           $this->load->view('report/payment-from-B2C-reports.php',$data);
        }
        
    }

    public function payment_from_B2B_reports() {
        
        if ($this->session->userdata('user_id') == '' || ($this->session->userdata('user_type') != 'SA' && $this->session->userdata('user_type') != 'VA')) {
            redirect('login');
        }        
        
        $title    = trim($this->input->get('title'));
        $from     = trim($this->input->get('from'));
        $to       = trim($this->input->get('to'));
        $status   = trim($this->input->get('status'));        
        $download = $this->input->get('download');        
        
        $url = $this->uri->segment(1);
        
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . $url . "?title=" . $title . "&from=" . $from . "&to=" . $to . "&status=" . $status;
        $whereData = array('title' => $title, 'from' => $from, 'to' => $to, 'status' => $status,'download' => $download);
                
        $config["per_page"] = 20;
        //$config["uri_segment"] = 2;

        $config['enable_query_strings'] = TRUE;
        $config['page_query_string']    = TRUE;
        $config['use_page_numbers']     = TRUE;
        $config['query_string_segment'] = 'page';
        $config['cur_tag_open']         = '&nbsp;<a class="active">';
        $config['cur_tag_close']        = '</a>';

        $config['next_link'] = '&NestedGreaterGreater;';
        $config['prev_link'] = '&NestedLessLess;';
        $page = ($this->input->get('page')) ? ( ( $this->input->get('page') - 1 ) * $config["per_page"] ) : 0;
        $config["total_rows"]  = $this->Report_model->payment_from_b2b($whereData, $config["per_page"], $page,'yes');
        $this->pagination->initialize($config);
        
        $data["b2b_from_reports"] = $this->Report_model->payment_from_b2b($whereData, $config["per_page"], $page,'no');        
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links); //echo "<pre>";print_r($str_links);exit;
        $data["from"] = $from;
        $data["to"] = $to;
        $data["status"] = $status;
        $data["title"] = $title;
        $data["url"] = $url; //echo "<pre>";print_r($data);exit;
        
        if($download == 1 && isset($data["b2b_from_reports"]) && count($data["b2b_from_reports"]) > 0){
        $data["b2b_from_reports"] = $this->Report_model->payment_from_b2b($whereData, $config["per_page"], $page,'download'); 
            
            $downloadData = $data["b2b_from_reports"];
            
            $this->paymentB2BFromExportData($downloadData);
            
        }else{
           $this->load->view('report/payment-from-B2B-reports.php',$data);
        }        
        
    }

    public function payment_to_B2B_reports() {
        
         if ($this->session->userdata('user_id') == '' || ($this->session->userdata('user_type') != 'SA' && $this->session->userdata('user_type') != 'VA')) {
            redirect('login');
        }        
        
        $title    = trim($this->input->get('title'));
        $from     = trim($this->input->get('from'));
        $to       = trim($this->input->get('to'));
        $status   = trim($this->input->get('status'));        
        $download = $this->input->get('download');        
        
        $url = $this->uri->segment(1);
        
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . $url . "?title=" . $title . "&from=" . $from . "&to=" . $to . "&status=" . $status;
        $whereData = array('title' => $title, 'from' => $from, 'to' => $to, 'status' => $status,'download' => $download);
                
        $config["per_page"] = 20;
        //$config["uri_segment"] = 2;

        $config['enable_query_strings'] = TRUE;
        $config['page_query_string']    = TRUE;
        $config['use_page_numbers']     = TRUE;
        $config['query_string_segment'] = 'page';
        $config['cur_tag_open']         = '&nbsp;<a class="active">';
        $config['cur_tag_close']        = '</a>';

        $config['next_link'] = '&NestedGreaterGreater;';
        $config['prev_link'] = '&NestedLessLess;';
        $page = ($this->input->get('page')) ? ( ( $this->input->get('page') - 1 ) * $config["per_page"] ) : 0;
        $config["total_rows"]  = $this->Report_model->payment_to_b2b($whereData, $config["per_page"], $page,'yes');
        $this->pagination->initialize($config);
        
        $data["b2b_to_reports"] = $this->Report_model->payment_to_b2b($whereData, $config["per_page"], $page,'no');        
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links); //echo "<pre>";print_r($str_links);exit;
        $data["from"] = $from;
        $data["to"] = $to;
        $data["status"] = $status;
        $data["title"] = $title;
        $data["url"] = $url; //echo "<pre>";print_r($data);exit;
        
        if($download == 1 && isset($data["b2b_to_reports"]) && count($data["b2b_to_reports"]) > 0){
        $data["b2b_to_reports"] = $this->Report_model->payment_to_b2b($whereData, $config["per_page"], $page,'download');    
            
            $downloadData = $data["b2b_to_reports"];
            
            $this->paymentB2BToExportData($downloadData);
            
        }else{
           $this->load->view('report/payment-to-B2B-reports.php',$data);
        }        
    }

//	public function cancellation_reports()
//	{
//        $this->load->view('report/cancellation-reports.php');      
//	}
    public function my_transaction_reports() {
        //$this->load->view('report/my-transaction-reports.php');
        
        if ($this->session->userdata('user_id') == '' || ($this->session->userdata('user_type') != 'SA' && $this->session->userdata('user_type') != 'VA')) {
            redirect('login');
        }        
        //$this->load->helper('custom_helper');
        $title    = trim($this->input->get('title'));
        $from     = trim($this->input->get('from'));
        $to       = trim($this->input->get('to'));
        $status   = trim($this->input->get('status'));        
        $download = $this->input->get('download');        
        
        $url = $this->uri->segment(1);
        
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . $url . "?title=" . $title . "&from=" . $from . "&to=" . $to . "&status=" . $status;
        $whereData = array('title' => $title, 'from' => $from, 'to' => $to, 'status' => $status,'download' => $download);
                
        $config["per_page"] = 20;
        //$config["uri_segment"] = 2;

        $config['enable_query_strings'] = TRUE;
        $config['page_query_string']    = TRUE;
        $config['use_page_numbers']     = TRUE;
        $config['query_string_segment'] = 'page';
        $config['cur_tag_open']         = '&nbsp;<a class="active">';
        $config['cur_tag_close']        = '</a>';

        $config['next_link'] = '&NestedGreaterGreater;';
        $config['prev_link'] = '&NestedLessLess;';
        $page = ($this->input->get('page')) ? ( ( $this->input->get('page') - 1 ) * $config["per_page"] ) : 0;
        $config["total_rows"]  = $this->Report_model->transaction_reports($whereData, $config["per_page"], $page,'yes');
        $this->pagination->initialize($config);
        
        $data["transaction_reports"] = $this->Report_model->transaction_reports($whereData, $config["per_page"], $page,'no');        
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links); //echo "<pre>";print_r($str_links);exit;
        $data["from"] = $from;
        $data["to"] = $to;
        $data["status"] = $status;
        $data["title"] = $title;
        $data["url"] = $url; //echo "<pre>";print_r($data);exit;
        if($this->session->userdata('user_type') == 'SA'){            
            $data["loginuser_id"] =0;
        }else{        
            $data["loginuser_id"] =$this->session->userdata('user_id');
         }
         
        if($download == 1 && isset($data["transaction_reports"]) && count($data["transaction_reports"]) > 0){
        $data["transaction_reports"] = $this->Report_model->transaction_reports($whereData, $config["per_page"], $page,'download');        
            
            $downloadData = $data["transaction_reports"];
            
            $this->transactionToExportData($downloadData);
            
        }else{
           $this->load->view('report/my-transaction-reports.php',$data);
        }   
        
    }
    
    
    public function tomorrow_trip_wise_reports() {
        if ($this->session->userdata('user_id') == '' && $this->session->userdata('user_type') != 'VA') {
            redirect('login');
        }
        $url = $this->uri->segment(1);

        $loginuserid = $this->session->userdata('user_id');
        $title = trim($this->input->get('title'));
        $from = trim($this->input->get('from'));
        $to = trim($this->input->get('to'));
        $status = trim($this->input->get('status'));
        $bookfrom = trim($this->input->get('bookfrom'));
        $download = trim($this->input->get('download'));
        
//        if(empty($from)){
//            $toDate = date('M d,Y', strtotime('+1 day'));
//            $from = $toDate;
//            $to   = $toDate;
//        }
        
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . $url . "?title=" . $title . "&from=" . $from . "&to=" . $to;
        $whereData = array('title' => $title, 'from' => $from, 'to' => $to);
       
        $whereData['tbpd.user_id'] = $loginuserid;       

        //$config["total_rows"] = $this->Report_model->booking_count($whereData,'tt');
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
        //$data["bookinglist"] = $this->Report_model->booking_list($whereData, $config["per_page"], $page,'no','tt');	
        $config["total_rows"] = $this->Report_model->tomorrow_list($whereData, $config["per_page"], $page,'yes');		
        $data["bookinglist"] = $this->Report_model->tomorrow_list($whereData, $config["per_page"], $page,'no');
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data["from"] = $from;
        $data["to"] = $to;
        $data["status"] = $status;
        $data["bookfrom"] = $bookfrom;
        $data["title"] = $title;
        $data["url"] = $url;
        
        if($download == 1 && isset($data["bookinglist"]) && count($data["bookinglist"]) > 0){
        //$data["bookinglist"] = $this->Report_model->booking_list($whereData, $config["per_page"], $page,'download');
          $data["bookinglist"] = $this->Report_model->booking_list($whereData, $config["per_page"], $page,'download');
            
            $downloadData = $data["bookinglist"];
            
            $this->tomorrowTripsExport($downloadData);
            
        }else{ //echo "<pre>";print_r($this->session->userdata('name'));exit;
            $this->load->view('report/tomorrow-trip-reports', $data);
        }
    }
    
    public function user_reports() {
        
        if ($this->session->userdata('user_id') == '' || ($this->session->userdata('user_type') != 'SA')) {
            redirect('login');
        }   
       
        $from     = trim($this->input->get('from'));
        $to       = trim($this->input->get('to'));
        $title    = trim($this->input->get('title'));
        $type     = trim($this->input->get('type'));        
        $download = $this->input->get('download');        
        
        $url = $this->uri->segment(1);
        
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . $url ."?title=".$title."&from=" . $from . "&to=" . $to . "&type=" . $type;
        $whereData = array('title' => $title,'from' => $from, 'to' => $to, 'type' => $type,'download' => $download);
                
        $config["per_page"] = 20;
        //$config["uri_segment"] = 2;

        $config['enable_query_strings'] = TRUE;
        $config['page_query_string']    = TRUE;
        $config['use_page_numbers']     = TRUE;
        $config['query_string_segment'] = 'page';
        $config['cur_tag_open']         = '&nbsp;<a class="active">';
        $config['cur_tag_close']        = '</a>';

        $config['next_link'] = '&NestedGreaterGreater;';
        $config['prev_link'] = '&NestedLessLess;';
        $page = ($this->input->get('page')) ? ( ( $this->input->get('page') - 1 ) * $config["per_page"] ) : 0;
        $config["total_rows"]  = $this->Report_model->user_list($whereData, $config["per_page"], $page,'yes');
        $this->pagination->initialize($config);
        
        $data["userlist"] = $this->Report_model->user_list($whereData, $config["per_page"], $page,'no');        
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links); //echo "<pre>";print_r($str_links);exit;
        $data["from"] = $from;
        $data["to"] = $to;
        $data["type"] = $type;        
        $data["title"] = $title;        
        $data["url"] = $url;
        
        if($download == 1 && isset($data["userlist"]) && count($data["userlist"]) > 0){
            $data["userlist"] = $this->Report_model->user_list($whereData, $config["per_page"], $page,'download');        
        
            $downloadData = $data["userlist"];
            
            $this->userExport($downloadData);
            
        }else{
            $this->load->view('report/user-reports.php', $data);
        }
    }
    
    public function trip_shared_reports() {
        
        if ($this->session->userdata('user_id') == '' || ($this->session->userdata('user_type') != 'SA')) {
            redirect('login');
        }   
       
        $title    = trim($this->input->get('title'));
        $status   = trim($this->input->get('status'));        
        $download = $this->input->get('download');        
        
        $url = $this->uri->segment(1);
        
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . $url ."?title=".$title."&status=" . $status;
        $whereData = array('title' => $title,'status' => $status,'download' => $download);
                
        $config["per_page"] = 20;
        //$config["uri_segment"] = 2;

        $config['enable_query_strings'] = TRUE;
        $config['page_query_string']    = TRUE;
        $config['use_page_numbers']     = TRUE;
        $config['query_string_segment'] = 'page';
        $config['cur_tag_open']         = '&nbsp;<a class="active">';
        $config['cur_tag_close']        = '</a>';

        $config['next_link'] = '&NestedGreaterGreater;';
        $config['prev_link'] = '&NestedLessLess;';
        $page = ($this->input->get('page')) ? ( ( $this->input->get('page') - 1 ) * $config["per_page"] ) : 0;
        $config["total_rows"]  = $this->Report_model->trip_shared_list($whereData, $config["per_page"], $page,'yes');
        $this->pagination->initialize($config);
        
        $data["tripSharedlist"] = $this->Report_model->trip_shared_list($whereData, $config["per_page"], $page,'no');        
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links); //echo "<pre>";print_r($str_links);exit;
       
        $data["status"] = $status;        
        $data["title"]  = $title;        
        $data["url"]    = $url;
        
        if($download == 1 && isset($data["tripSharedlist"]) && count($data["tripSharedlist"]) > 0){
            $data["tripSharedlist"] = $this->Report_model->trip_shared_list($whereData, $config["per_page"], $page,'download');        
        
            $downloadData = $data["tripSharedlist"];
            
            $this->tripSharedExport($downloadData);
            
        }else{
            $this->load->view('report/trip_shared_reports.php', $data);
        }
    }

    public function pay_history_reports($title='') {
        
        if ($this->session->userdata('user_id') == '' || ($this->session->userdata('user_type') != 'SA' && $this->session->userdata('user_type') != 'VA')) {
            redirect('login');
        }        
         
        if($this->input->get('title')!= true){
            redirect('/');
        }
        $title    = trim($this->input->get('title'));       
        $download = $this->input->get('download');       
        $url = $this->uri->segment(1);
        
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . $url . "?title=" . $title;
        $whereData = array('title' => $title, 'download' => $download);
                
        $config["per_page"] = 20;
        //$config["uri_segment"] = 2;

        $config['enable_query_strings'] = TRUE;
        $config['page_query_string']    = TRUE;
        $config['use_page_numbers']     = TRUE;
        $config['query_string_segment'] = 'page';
        $config['cur_tag_open']         = '&nbsp;<a class="active">';
        $config['cur_tag_close']        = '</a>';

        $config['next_link'] = '&NestedGreaterGreater;';
        $config['prev_link'] = '&NestedLessLess;';
        $page = ($this->input->get('page')) ? ( ( $this->input->get('page') - 1 ) * $config["per_page"] ) : 0;
        $config["total_rows"]  = $this->Report_model->pay_history_reports($whereData, $config["per_page"], $page,'yes');
        $this->pagination->initialize($config);
        
        $data["pay_history_reports"] = $this->Report_model->pay_history_reports($whereData, $config["per_page"], $page,'no');        
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links); //echo "<pre>";print_r($str_links);exit;
        $data["title"] = $title;
        $data["url"] = $url; 
        if($this->session->userdata('user_type') == 'SA'){            
            $data["loginuser_id"] =0;
        }else{        
            $data["loginuser_id"] =$this->session->userdata('user_id');
         }
         
        if($download == 1 && isset($data["pay_history_reports"]) && count($data["pay_history_reports"]) > 0){
            
            $data["pay_history_reports"] = $this->Report_model->pay_history_reports($whereData, $config["per_page"], $page,'download');        
            
            $downloadData = $data["pay_history_reports"];
            
            $this->payHistoryToExportData($downloadData);
            
        }else{
           $this->load->view('report/pay-history-reports.php',$data);
        }   
        
    }

    public function exportXLfile() {
        
        $tamplate = "demo.xlt";
        $objReader = PHPExcel_IOFactory::createReader('Excel5');
        $exportdimond = $this->Userlist_Model->ExportDiamond();
        $objPHPExcel = $objReader->load("assets/file_template/" . $tamplate);

        $row = 2;
        foreach ($exportdimond as $value) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $value->id);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $value->C_Shape);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $value->C_Weight);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $value->C_Color);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $value->C_Clarity);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $value->C_Cut);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $value->C_Polish);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $value->C_Symmetry);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $value->C_Fluorescence);
            $row++;
        }
        $filename = "demo" . date("Y-m-d-H-i-s") . ".csv";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
        $objWriter->save('php://output');
    }
    
    public function bookingExport($data){ 
        $spreadsheet = new Spreadsheet();
        $sheet       = $spreadsheet->getActiveSheet();
        
        //SET HEADER
        $sheet->setCellValue('A1', 'BOOKED ON');
        $sheet->setCellValue('B1', 'PNR NO');       
        $sheet->setCellValue('C1', 'BOOKED FROM');
        $sheet->setCellValue('D1', 'TRIP TILE');
        $sheet->setCellValue('E1', 'DATE OF TRIP');
        $sheet->setCellValue('F1', 'PICKUP LOCATIONS');
        $sheet->setCellValue('G1', 'NO OF TRAVELLERS');
        $sheet->setCellValue('H1', 'PRICE TO ADULT');
        $sheet->setCellValue('I1', 'PRICE TO CHILDREN');
        $sheet->setCellValue('J1', 'PRICE TO INFAN');
        $sheet->setCellValue('K1', 'NO OF ADULT');
        $sheet->setCellValue('L1', 'NO OF CHILDREN');
        $sheet->setCellValue('M1', 'NO OF INFAN');
        $sheet->setCellValue('N1', 'DISCOUNT PERCENTAGE');
        $sheet->setCellValue('O1', 'DISCOUNT PRICE');
        $sheet->setCellValue('P1', 'OFFER AMOUNT');
        $sheet->setCellValue('Q1', 'GST PERCENTAGE');
        $sheet->setCellValue('R1', 'GST AMOUNT');
        $sheet->setCellValue('S1', 'TOTAL');
        $sheet->setCellValue('T1', 'STATUS');
        
        $row = 2;
        
        $status_val = array('New', 'Pending', 'Booked', 'Cancelled', 'Confirmed', 'Completed');
        $user_type_val = array('CU'=>'B2C Booking','GU'=>'B2C Booking','VA'=>'Office Booking');
        
        foreach ($data as $value) {           
            $user_type = $value['user_type'];
            $status    = $value['status'];
            
            $sheet->setCellValue('A' . $row, date("M d, Y h:i A", strtotime($value['booked_on'])));
            $sheet->setCellValue('B' . $row, $value['pnr_no']);            
            $sheet->setCellValue('C' . $row, $user_type_val[$user_type]);
            $sheet->setCellValue('D' . $row, $value['trip_name']);
            $sheet->setCellValue('E' . $row, date("M d, Y", strtotime($value['date_of_trip'])));
            $sheet->setCellValue('F' . $row, $value['pick_up_location']);           
            $sheet->setCellValue('G' . $row, $value['number_of_persons']);
            $sheet->setCellValue('H' . $row, $value['price_to_adult'] );
            $sheet->setCellValue('I' . $row, $value['price_to_child'] );           
            $sheet->setCellValue('J'. $row, $value['price_to_infan']);
            $sheet->setCellValue('K'. $row, $value['no_of_adult']);
            $sheet->setCellValue('L'. $row, $value['no_of_child']);
            $sheet->setCellValue('M'. $row, $value['no_of_infan']);
            $sheet->setCellValue('N' . $row,$value['discount_percentage']); 
            $sheet->setCellValue('O'. $row, $value['discount_price']);
            $sheet->setCellValue('P'. $row, $value['offer_amt']);
            $sheet->setCellValue('Q'. $row, $value['gst_percentage']);
            $sheet->setCellValue('R'. $row, $value['gst_amt']);
            $sheet->setCellValue('S'. $row, $value['total_trip_price']);
            $sheet->setCellValue('T'. $row, $status_val[$status]);          
            $row++;
        }
        
        $writer = new Xlsx($spreadsheet);
 
        $filename = 'BOOKING-REPORT-'.date('d-m-Y');
 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output'); // download file 
    }
    
    public function exportData($data){ 
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $this->load->model('Trip_model');
        
        //SET HEADER
        $sheet->setCellValue('A1', 'CODE');
        $sheet->setCellValue('B1', 'TRIP NAME');       
        $sheet->setCellValue('C1', 'CATEGORY');
        $sheet->setCellValue('D1', 'STATE');
        $sheet->setCellValue('E1', 'CITY');
        $sheet->setCellValue('F1', 'PRICE TO ADULT');
        $sheet->setCellValue('G1', 'PRICE TO CHILDREN');
        $sheet->setCellValue('H1', 'PRICE TO INFAN');
        $sheet->setCellValue('I1', 'TRIP DURATION');
        $sheet->setCellValue('J1', 'HOW MANY DAYS');
        $sheet->setCellValue('K1', 'HOW MANY NIGHTS');
        $sheet->setCellValue('L1', 'HOW MANY TIME');
        $sheet->setCellValue('M1', 'HOW MANY HOURS');
        $sheet->setCellValue('N1', 'MEETING POINT');
        $sheet->setCellValue('O1', 'OTHER PICKUP LOCATION');
        $sheet->setCellValue('P1', 'NO OF TRAVELLER');
        $sheet->setCellValue('Q1', 'NO OF MIN BOOK TRAVELLER');
        $sheet->setCellValue('R1', 'NO OF MAX BOOK TRAVELLER');
        $sheet->setCellValue('S1', 'IS SAHARED');
        $sheet->setCellValue('T1', 'BOOKING CUT OF TIME TYPE');
        $sheet->setCellValue('U1', 'BOOKING CUT OF DAY');
        $sheet->setCellValue('V1', 'BOOKING CUT OF TIME');
        $sheet->setCellValue('W1', 'BOOKING MAX CUT OFF MONTH');
        $sheet->setCellValue('X1', 'VIEW TO');
        $sheet->setCellValue('y1', 'POSTED BY');
        $sheet->setCellValue('Z1', 'POSTED ON');
        $sheet->setCellValue('AA1', 'STATUS');
        
        $row = 2;
        
        foreach ($data as $value) {
            $isactive                 = $value['isactive'] == 1 ?'Active':'Inactive';
            $trip_duration            = $value['trip_duration'] == 1 ?'Hours/minutes':'Day/hours';
            $booking_cut_of_time_type = $value['booking_cut_of_time_type'] == 1 ?'Days':'Hours';
            
            $other_pickup_locations  = '';
            
            if(isset($value['id'])){
                $otherLocations = $this->Trip_model->getPickupLocations($value['id']);
                
                if(count($otherLocations) > 0){
                    foreach($otherLocations as $k=>$v){
                        if($k != 0){
                            $other_pickup_locations .= $v['location'].' at '.date("H:i A", strtotime($v['time'])).' / '; 
                        }
                    }
                }
            }
            
            $other_pickup_locations = trim($other_pickup_locations,' / ');
            
            $sheet->setCellValue('A' . $row, $value['trip_code']);
            $sheet->setCellValue('B' . $row, $value['trip_name']);            
            $sheet->setCellValue('C' . $row, $value['category']);
            $sheet->setCellValue('D' . $row, $value['state']);
            $sheet->setCellValue('E' . $row, $value['city']);           
            $sheet->setCellValue('F' . $row, $value['price_to_adult']);
            $sheet->setCellValue('G' . $row, $value['price_to_child']);
            $sheet->setCellValue('H' . $row, $value['price_to_infan']);
            $sheet->setCellValue('I' . $row, $trip_duration);
            $sheet->setCellValue('J'. $row, $value['how_many_days']);
            $sheet->setCellValue('K'. $row, $value['how_many_nights']);
            $sheet->setCellValue('L'. $row, $value['how_many_time']);
            $sheet->setCellValue('M'. $row, $value['how_many_hours']);
            $sheet->setCellValue('N' . $row, $value['meeting_point'].' at '.date("H:i A", strtotime($value['meeting_time']))); 
            $sheet->setCellValue('O'. $row, $other_pickup_locations);
            $sheet->setCellValue('P'. $row, $value['no_of_traveller']);
            $sheet->setCellValue('Q'. $row, $value['no_of_min_booktraveller']);
            $sheet->setCellValue('R'. $row, $value['no_of_max_booktraveller']);
            $sheet->setCellValue('S'. $row, $value['is_shared'] == 1 ? 'Yes':'No');
            $sheet->setCellValue('T'. $row, $booking_cut_of_time_type);
            $sheet->setCellValue('U'. $row, $value['booking_cut_of_day']);
            $sheet->setCellValue('V'. $row, $value['booking_cut_of_time']);
            $sheet->setCellValue('W'. $row, $value['booking_max_cut_of_month']);
            $sheet->setCellValue('X'. $row,  $value['view_to'] == 2 ?'Vendor':'Customer & Vendor');
            $sheet->setCellValue('y' . $row, $value['user_fullname']);
            $sheet->setCellValue('Z' . $row, date("M d, Y h:i A", strtotime($row['created_on'])));
            $sheet->setCellValue('AA' . $row, $isactive);
           
            $row++;
        }
        
        $writer = new Xlsx($spreadsheet);
 
        $filename = 'TRIP-REPORT-'.date('d-m-Y');
 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output'); // download file 
    }
    public function paymentB2CExportData($data){ 
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $this->load->model('Trip_model');
        
        //SET HEADER
        $sheet->setCellValue('A1', 'BOOKED ON');
        $sheet->setCellValue('B1', 'PNR NO');       
        $sheet->setCellValue('C1', 'PARENT TRIP TITLE');      
        $sheet->setCellValue('D1', 'PARENT TRIP USER NAME');    
        $sheet->setCellValue('E1', 'PARENT TRIP USER EMAIL');
        $sheet->setCellValue('F1', 'TRIP TITLE');
        $sheet->setCellValue('G1', 'NUMBER OF PERSONS');
        $sheet->setCellValue('H1', 'TOTAL TRIP PRICE');
        $sheet->setCellValue('I1', 'PRICE TO ADULT');
        $sheet->setCellValue('J1', 'PRICE TO CHILD');
        $sheet->setCellValue('K1', 'PRICE TO INFAN');
        $sheet->setCellValue('L1', 'NO OF ADULT');
        $sheet->setCellValue('M1', 'NO OF CHILD');
        $sheet->setCellValue('N1', 'NO OF INFAN');
        $sheet->setCellValue('O1', 'TOTAL ADULT PRICE');
        $sheet->setCellValue('P1', 'TOTAL CHILD PRICE');
        $sheet->setCellValue('Q1', 'TOTAL INFAN PRICE');
        $sheet->setCellValue('R1', 'AMOUNT SENT to PARENT TRIP/VENDOR');
        $sheet->setCellValue('S1', 'OFFER AMOUNT');
        $sheet->setCellValue('T1', 'SERVICE CHARGE');
        $sheet->setCellValue('U1', 'GST AMOUNT'); 
        $sheet->setCellValue('V1', 'YOUR FINAL AMOUNT');
        $sheet->setCellValue('W1', 'STATUS');       
        
        $row = 2;
        
        foreach ($data as $value) {
            
            $status = $value['tra_status'];                                                
            $status_val = array('New', 'InProgress', 'Executed', 'Sent');
            
            $sheet->setCellValue('A' . $row, date("M d, Y h:i A", strtotime($value['booked_on'])));
            $sheet->setCellValue('B' . $row, $value['pnr_no']);            
            $sheet->setCellValue('C' . $row, $value['parent_trip_code'].'-'.$value['parent_trip_name']);
            $sheet->setCellValue('D' . $row, $value['parent_trip_user_name']);
            $sheet->setCellValue('E' . $row, $value['parent_trip_user_email']);
            $sheet->setCellValue('F' . $row, $value['trip_code'].'-'.$value['trip_name']);
            $sheet->setCellValue('G' . $row, $value['number_of_persons']);
            $sheet->setCellValue('H' . $row, $value['subtotal_trip_price']);           
            $sheet->setCellValue('I' . $row, $value['price_to_adult']);           
            $sheet->setCellValue('J' . $row, $value['price_to_child']);           
            $sheet->setCellValue('K' . $row, $value['price_to_infan']); 
            $sheet->setCellValue('L' . $row, $value['no_of_adult']);           
            $sheet->setCellValue('M' . $row, $value['no_of_child']);           
            $sheet->setCellValue('N' . $row, $value['no_of_infan']);           
            $sheet->setCellValue('O' . $row, $value['total_adult_price']);           
            $sheet->setCellValue('P' . $row, $value['total_child_price']);           
            $sheet->setCellValue('Q' . $row, $value['total_infan_price']); 
            $sheet->setCellValue('R' . $row, $value['vendor_amt']);          
            $sheet->setCellValue('S' . $row, $value['offer_amt']);
            $sheet->setCellValue('T' . $row, $value['servicecharge_amt']);
            $sheet->setCellValue('U' . $row, $value['gst_amt']);
            $sheet->setCellValue('V' . $row, $value['your_final_amt']);
            $sheet->setCellValue('W'. $row, $status_val[$status]);
            
           
            $row++;
        }
        
        $writer = new Xlsx($spreadsheet);
 
        $filename = 'PAYMENT FROM B2C '.date('d-m-Y');
 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output'); // download file 
    }
    public function paymentB2BFromExportData($data){ 
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $this->load->model('Trip_model');
        
        //SET HEADER
        $sheet->setCellValue('A1', 'BOOKED ON');
        $sheet->setCellValue('B1', 'PNR NO');       
        $sheet->setCellValue('C1', 'PARENT TRIP TITLE');      
        $sheet->setCellValue('D1', 'PARENT TRIP USER NAME');    
        $sheet->setCellValue('E1', 'PARENT TRIP USER EMAIL');
        $sheet->setCellValue('F1', 'TRIP TITLE');
        $sheet->setCellValue('G1', 'NUMBER OF PERSONS');
        $sheet->setCellValue('H1', 'TOTAL TRIP PRICE');
        $sheet->setCellValue('I1', 'PRICE TO ADULT');
        $sheet->setCellValue('J1', 'PRICE TO CHILD');
        $sheet->setCellValue('K1', 'PRICE TO INFAN');
        $sheet->setCellValue('L1', 'NO OF ADULT');
        $sheet->setCellValue('M1', 'NO OF CHILD');
        $sheet->setCellValue('N1', 'NO OF INFAN');
        $sheet->setCellValue('O1', 'TOTAL ADULT PRICE');
        $sheet->setCellValue('P1', 'TOTAL CHILD PRICE');
        $sheet->setCellValue('Q1', 'TOTAL INFAN PRICE');
        $sheet->setCellValue('R1', 'AMOUNT SENT to PARENT TRIP/VENDOR');
        $sheet->setCellValue('S1', 'OFFER AMOUNT');
        $sheet->setCellValue('T1', 'SERVICE CHARGE');
        $sheet->setCellValue('U1', 'GST AMOUNT'); 
        $sheet->setCellValue('V1', 'YOUR FINAL AMOUNT');
        $sheet->setCellValue('W1', 'STATUS');        
        
        $row = 2;
        
        foreach ($data as $value) {
            
            $status = $value['tra_status'];                                                
            $status_val = array('New', 'InProgress', 'Executed', 'Sent');
            
            $sheet->setCellValue('A' . $row, date("M d, Y h:i A", strtotime($value['booked_on'])));
            $sheet->setCellValue('B' . $row, $value['pnr_no']);            
            $sheet->setCellValue('C' . $row, $value['parent_trip_code'].'-'.$value['parent_trip_name']);
            $sheet->setCellValue('D' . $row, $value['parent_trip_user_name']);
            $sheet->setCellValue('E' . $row, $value['parent_trip_user_email']);
            $sheet->setCellValue('F' . $row, $value['trip_code'].'-'.$value['trip_name']);
            $sheet->setCellValue('G' . $row, $value['number_of_persons']);
            $sheet->setCellValue('H' . $row, $value['subtotal_trip_price']); 
            $sheet->setCellValue('I' . $row, $value['price_to_adult']);           
            $sheet->setCellValue('J' . $row, $value['price_to_child']);           
            $sheet->setCellValue('K' . $row, $value['price_to_infan']); 
            $sheet->setCellValue('L' . $row, $value['no_of_adult']);           
            $sheet->setCellValue('M' . $row, $value['no_of_child']);           
            $sheet->setCellValue('N' . $row, $value['no_of_infan']);           
            $sheet->setCellValue('O' . $row, $value['total_adult_price']);           
            $sheet->setCellValue('P' . $row, $value['total_child_price']);           
            $sheet->setCellValue('Q' . $row, $value['total_infan_price']); 
            $sheet->setCellValue('R' . $row, $value['vendor_amt']);          
            $sheet->setCellValue('S' . $row, $value['offer_amt']);
            $sheet->setCellValue('T' . $row, $value['servicecharge_amt']);
            $sheet->setCellValue('U' . $row, $value['gst_amt']);
            $sheet->setCellValue('V' . $row, $value['your_final_amt']);
            $sheet->setCellValue('W'. $row, $status_val[$status]);
            
            
            
           
            $row++;
        }
//        print_r($spreadsheet);
//                exit();
        $writer = new Xlsx($spreadsheet);
 
        $filename = 'PAYMENT FROM B2B '.date('d-m-Y');
 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output'); // download file 
    }
    public function paymentB2BToExportData($data){ 
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $this->load->model('Trip_model');
        
        //SET HEADER
        $sheet->setCellValue('A1', 'BOOKED ON');
        $sheet->setCellValue('B1', 'PNR NO');       
        $sheet->setCellValue('C1', 'PARENT TRIP TITLE');      
        $sheet->setCellValue('D1', 'PARENT TRIP USER NAME');    
        $sheet->setCellValue('E1', 'PARENT TRIP USER EMAIL');
        $sheet->setCellValue('F1', 'TRIP TITLE');
        $sheet->setCellValue('G1', 'NUMBER OF PERSONS');
        $sheet->setCellValue('H1', 'TOTAL TRIP PRICE');
        $sheet->setCellValue('I1', 'PRICE TO ADULT');
        $sheet->setCellValue('J1', 'PRICE TO CHILD');
        $sheet->setCellValue('K1', 'PRICE TO INFAN');
        $sheet->setCellValue('L1', 'NO OF ADULT');
        $sheet->setCellValue('M1', 'NO OF CHILD');
        $sheet->setCellValue('N1', 'NO OF INFAN');
        $sheet->setCellValue('O1', 'TOTAL ADULT PRICE');
        $sheet->setCellValue('P1', 'TOTAL CHILD PRICE');
        $sheet->setCellValue('Q1', 'TOTAL INFAN PRICE');
        $sheet->setCellValue('R1', 'TOTAL VENDOR TRIP PRICE');
        $sheet->setCellValue('S1', 'TOTAL VENDOR DISCOUNT PERCENTAGE/ FIXED PRICE');
        $sheet->setCellValue('T1', 'TOTAL VENDOR DISCOUNT AMOUNT');
        $sheet->setCellValue('U1', 'AMOUNT SENT to PARENT TRIP/VENDOR');
        $sheet->setCellValue('V1', 'OFFER AMOUNT');
        $sheet->setCellValue('W1', 'SERVICE CHARGE');
        $sheet->setCellValue('X1', 'GST AMOUNT'); 
        $sheet->setCellValue('Y1', 'YOUR FINAL AMOUNT');
        $sheet->setCellValue('Z1', 'STATUS');       
        
        $row = 2;
        
        foreach ($data as $value) {
            
            $status = $value['tra_status'];                                                
            $status_val = array('New', 'InProgress', 'Executed', 'Sent');
            
            $sheet->setCellValue('A' . $row, date("M d, Y h:i A", strtotime($value['booked_on'])));
            $sheet->setCellValue('B' . $row, $value['pnr_no']);            
            $sheet->setCellValue('C' . $row, $value['parent_trip_code'].'-'.$value['parent_trip_name']);
            $sheet->setCellValue('D' . $row, $value['parent_trip_user_name']);
            $sheet->setCellValue('E' . $row, $value['parent_trip_user_email']);
            $sheet->setCellValue('F' . $row, $value['trip_code'].'-'.$value['trip_name']);
            $sheet->setCellValue('G' . $row, $value['number_of_persons']);
            $sheet->setCellValue('H' . $row, $value['subtotal_trip_price']);
            $sheet->setCellValue('I' . $row, $value['price_to_adult']);           
            $sheet->setCellValue('J' . $row, $value['price_to_child']);           
            $sheet->setCellValue('K' . $row, $value['price_to_infan']); 
            $sheet->setCellValue('L' . $row, $value['no_of_adult']);           
            $sheet->setCellValue('M' . $row, $value['no_of_child']);           
            $sheet->setCellValue('N' . $row, $value['no_of_infan']);           
            $sheet->setCellValue('O' . $row, $value['total_adult_price']);           
            $sheet->setCellValue('P' . $row, $value['total_child_price']);           
            $sheet->setCellValue('Q' . $row, $value['total_infan_price']);
            $sheet->setCellValue('R' . $row, $value['parent_subtotal_trip_price']);
            $discount_percentage ='';
            if($value['parent_discount_percentage']!='0.00'){
                $discount_percentage = $row['parent_discount_percentage'];
                if (strpos($discount_percentage, '.00') !== false) {
                    $discount_percentage = round($discount_percentage);
                }
                $discount_percentage = $discount_percentage.' %';}else{
                $discount_percentage = 'Rs:'.$value['parent_discount_price'];
            }
            $sheet->setCellValue('S' . $row, $discount_percentage);         
            $sheet->setCellValue('T' . $row, $value['parent_offer_amt']);         
            $sheet->setCellValue('U' . $row, $value['vendor_amt']);         
            $sheet->setCellValue('V' . $row, $value['offer_amt']);
            $sheet->setCellValue('W' . $row, $value['servicecharge_amt']);
            $sheet->setCellValue('X' . $row, $value['gst_amt']);
            $sheet->setCellValue('Y' . $row, $value['your_final_amt']);
            $sheet->setCellValue('Z'. $row, $status_val[$status]);
            
           
            $row++;
        }
        
        $writer = new Xlsx($spreadsheet);
 
        $filename = 'PAYMENT TO B2B '.date('d-m-Y');
 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output'); // download file 
    }
    public function transactionToExportData($data){ 
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();        
        
        //SET HEADER
        $sheet->setCellValue('A1', 'PNR NO');
        $sheet->setCellValue('B1', 'FROM USER');       
        $sheet->setCellValue('C1', 'TO USER');
        $sheet->setCellValue('D1', 'TRIP TITLE');
        $sheet->setCellValue('E1', 'DATE TIME');
        $sheet->setCellValue('F1', 'TRANSACTION NOTES');       
        $sheet->setCellValue('G1', 'WITHDRAWALS');       
        $sheet->setCellValue('H1', 'DEPOSITS');
        $sheet->setCellValue('I1', 'BALANCE');
        $sheet->setCellValue('J1', 'STATUS');       
        
        $row = 2;
        
        foreach ($data as $value) {
            
            $status     = $value['status'];                                                
            $status_val = array('New', 'InProgress', 'Executed', 'Sent');            
            
            $sheet->setCellValue('A' . $row, $value['pnr_no']);            
            $sheet->setCellValue('B' . $row, $value['fromuser']);            
            $sheet->setCellValue('C' . $row, $value['touser']);                        
            $sheet->setCellValue('D' . $row, $value['trip_name']);
            $sheet->setCellValue('E' . $row, date("M d, Y h:i A", strtotime($value['date_time'])));
            $sheet->setCellValue('F' . $row, $value['transaction_notes']); 
            $sheet->setCellValue('G' . $row, $value['withdrawals']);            
            $sheet->setCellValue('H' . $row, $value['deposits']);
            $sheet->setCellValue('I' . $row, $value['balance']);
            $sheet->setCellValue('J'. $row, $status_val[$status]);
            
           
            $row++;
        }
        
        $writer = new Xlsx($spreadsheet);
 
        $filename = 'MY TRANSACTION '.date('d-m-Y');
 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output'); // download file 
    }
    
    public function tomorrowTripsExport($data){ 
        $spreadsheet = new Spreadsheet();
        $sheet       = $spreadsheet->getActiveSheet();
        
        //SET HEADER        
        $sheet->setCellValue('A1', 'PNR NO');       
        $sheet->setCellValue('B1', 'DATE OF BOOKING');  
        $sheet->setCellValue('C1', 'NAME OF PERSON');
        $sheet->setCellValue('D1', 'MOBILE NUMBER');   
        $sheet->setCellValue('E1', 'NUMBER OF PERSONS');
        $sheet->setCellValue('F1', 'PICKUP POINT');
        $sheet->setCellValue('G1', 'PICKUP TIME');
        $sheet->setCellValue('H1', 'TRIP NAME');         
        $sheet->setCellValue('I1', 'VENDOR NAME');        
        
        $row = 2;
        $vendorName = $this->session->userdata('name');
        foreach ($data as $value) {   
            $time = date("H:i A", strtotime($value['time_of_trip']));
            
            $sheet->setCellValue('A' . $row, $value['pnr_no']);            
            $sheet->setCellValue('B' . $row, date("M d, Y", strtotime($value['date_of_trip'])));
            $sheet->setCellValue('C' . $row, $value['booked_to'] );           
            $sheet->setCellValue('D'. $row, $value['booked_phone_no']);   
            $sheet->setCellValue('E' . $row, $value['number_of_persons']);           
            $sheet->setCellValue('F' . $row, $value['pick_up_location']);                      
            $sheet->setCellValue('G' . $row, $time );           
            $sheet->setCellValue('H'. $row, $value['trip_code'].'-'.$value['trip_name']);            
            $sheet->setCellValue('I' . $row, $vendorName);                 
            $row++;
        }
        
        $writer = new Xlsx($spreadsheet);
 
        $filename = 'TOMORROW-REPORT-'.date('d-m-Y');
 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output'); // download file 
    }
    public function userExport($data){ 
        $spreadsheet = new Spreadsheet();
        $sheet       = $spreadsheet->getActiveSheet();
        
        //SET HEADER        
        $sheet->setCellValue('A1', 'USER TYPE');       
        $sheet->setCellValue('B1', 'NAME');       
        $sheet->setCellValue('C1', 'EMAIL');        
        $sheet->setCellValue('D1', 'PHONE');
        $sheet->setCellValue('E1', 'ALTERNATE PHONE');
        $sheet->setCellValue('F1', 'GENDER');
        $sheet->setCellValue('G1', 'DOB');
        $sheet->setCellValue('H1', 'EMERGENCY CONTACT PERSON');
        $sheet->setCellValue('I1', 'EMERGENCY CONTACT NO'); 
        $sheet->setCellValue('J1', 'BALANCE AMOUNT');      
        $sheet->setCellValue('K1', 'UNCLEAR AMOUNT');      
        $sheet->setCellValue('L1', 'CREATED ON');      
        $sheet->setCellValue('M1', 'STATUS');      
        
        $row = 2;
        $vendorName = $this->session->userdata('name');
        foreach ($data as $value) {    
            
            $isactive  = 'Not Activate';
            if($value['isactive'] == 1){
                $isactive = 'Active';
            }else if($value['isactive'] == 0){
                $isactive = 'Inactive';
            }                               

            $userTypes = array('VA' => 'Vendor','GU' =>'Guest','CU'=>'Customer');
            $type      =  $userTypes[$value['user_type']];
            $gender = '';
                    
            if($value['gender'] == 1){
               $gender = 'Male';
            }else if($value['gender'] == 2){
               $gender = 'Female';
            }
            
            $dob = '';
            if(!empty($value['dob'])){
              $dob =  date("M d, Y", strtotime($value['dob']));
            }
            
            $sheet->setCellValue('A' . $row, $type);            
            $sheet->setCellValue('B' . $row, $value['user_fullname']); 
            $sheet->setCellValue('C' . $row, $value['email']);
            $sheet->setCellValue('D' . $row, $value['phone']);           
            $sheet->setCellValue('E' . $row, $value['alt_phone']);                      
            $sheet->setCellValue('F' . $row, $gender );
            $sheet->setCellValue('G' . $row, $dob );
            $sheet->setCellValue('H' . $row, $value['emergency_contact_person'] );           
            $sheet->setCellValue('I'. $row, $value['emergency_contact_no']);            
            $sheet->setCellValue('J'. $row, $value['balance_amt']);                   
            $sheet->setCellValue('K'. $row, $value['unclear_amt']);                   
            $sheet->setCellValue('L'. $row, date("M d, Y h:i A", strtotime($value['created_on'])));                   
            $sheet->setCellValue('M'. $row, $isactive);                   
            $row++;
        }
        
        $writer = new Xlsx($spreadsheet);
 
        $filename = 'USER-REPORT-'.date('d-m-Y');
 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output'); // download file 
    }
    public function tripSharedExport($data){ 
        $spreadsheet = new Spreadsheet();
        $sheet       = $spreadsheet->getActiveSheet();
        
        //SET HEADER        
        $sheet->setCellValue('A1', 'CODE');       
        $sheet->setCellValue('B1', 'TRIP NAME');      
        $sheet->setCellValue('C1', 'TRIP URL');       
        $sheet->setCellValue('D1', 'SHARED BY');        
        $sheet->setCellValue('E1', 'SHARED BY USER EMAIL');        
        $sheet->setCellValue('F1', 'SHARED TO');
        $sheet->setCellValue('G1', 'SHARED TO USER EMAIL');
        $sheet->setCellValue('H1', 'COUPON CODE NAME');            
        $sheet->setCellValue('I1', 'MAKED TRIP NAME');              
        $sheet->setCellValue('J1', 'MAKED TRIP URL');            
        $sheet->setCellValue('K1', 'STATUS');            
        
        $row = 2;        
        foreach ($data as $value) {      

            $id = $value['id'];
            $code = $value['code'];
            $trip_name = $value['trip_name'];
            $sharedusername = $value['sharedusername'];
            $tousername = $value['tousername'];
            $email = $value['email'];
            if($email==''){$email = $value['to_user_mail'];}
            $fromuseremail = $value['fromuseremail'];
            $coupon_name = $value['coupon_name'];
            if($coupon_name!=''){
                if($value['offer_type']==1){$coupon_name .= ' - Rs:'.$value['percentage_amount'];}
                else{$coupon_name .= ' - '.$value['percentage_amount'].'%';}
            }
            $status = $value['status'];
            $status_active = array('', 'New', 'Maked Trip', 'Cancelled');   
            $trip_code_url= '';  
            $maked_trip_code_url= '';
            $trip_code= $value['trip_code'];
            $maked_trip_code= $value['maked_trip_code'];
            if($trip_code!=''){
                $trip_code_url= base_url().'trip-view/'.$value['trip_code'];
            }
            if($maked_trip_code!=''){
                $maked_trip_code_url= base_url().'trip-view/'.$value['maked_trip_code'];
            }
            $sheet->setCellValue('A' . $row, $code);  
            $sheet->setCellValue('B' . $row, $trip_name);  
            $sheet->setCellValue('C' . $row, $trip_code_url);  
            $sheet->setCellValue('D' . $row, $sharedusername);  
            $sheet->setCellValue('E' . $row, $fromuseremail);            
            $sheet->setCellValue('F' . $row, $tousername); 
            $sheet->setCellValue('G' . $row, $email);
            $sheet->setCellValue('H' . $row, $coupon_name);           
            $sheet->setCellValue('I' . $row, $value['maked_trip_name']);                      
            $sheet->setCellValue('J' . $row, $maked_trip_code_url);                          
            $sheet->setCellValue('K' . $row, $status_active[$status] );                             
            $row++;
        }
        
        $writer = new Xlsx($spreadsheet);
        $filename = 'TRIP-SHARED-REPORT-'.date('d-m-Y');
 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output'); // download file 
    }
    
    //CANCEL REPORT
    public function addRefundmodal($id) { 
        if ($this->session->userdata('user_id') == '' || 
            ($this->session->userdata('user_type') != 'SA' && $this->session->userdata('user_type') !='VA' )) {
            return FALSE;
        }
        if($this->session->userdata('user_type') != 'SA'){
            
        }else{
            $this->db->select('tbp.*,tm.trip_name,tm.trip_code,tm.cancellation_policy,tm.refund_policy,ai.bank_name,ai.account_holder_name,ai.account_number,ai.ifsc_code,ai.branch,ai.address');
            $this->db->from('trip_book_pay AS tbp');
            $this->db->join('trip_book_pay_details AS tbpd', 'tbpd.book_pay_id = tbp.id','INNER');
            $this->db->join('trip_master AS tm', 'tm.id = tbp.trip_id','INNER'); 
            $this->db->join('account_info AS ai', 'ai.id = tbp.account_info_id','LEFT');  
            $this->db->where('tbp.isactive', 1);
            $this->db->where_in('tbp.status', 3);
            $this->db->where('tbp.return_paid_status !=', 3);
            $this->db->where('tbpd.id', $id);
            $query = $this->db->get();
        }
        $data['details'] = $query->row_array();
        
        //echo "<pre>";print_r($data['details']);exit;
        
        $this->load->view("add_refund", $data);
        
    }
    
    public function addRefundAction() {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
        $err = 'yes';
        if ($_POST) {
            $this->form_validation->set_rules('pnr_no', 'PNR No', 'trim|required');
            $this->form_validation->set_rules('ret_per', 'Refund Percentage', 'trim|required');
            $this->form_validation->set_rules('notes', 'Notes', 'trim|required');
            
           
            if ($this->form_validation->run($this) != FALSE) { 
                $this->load->helper('custom_helper');
                extract($this->input->post());
                $pnrinfo = array(
                    'pnr_no' => $pnr_no,  
                    'refund_date' =>  date('Y-m-d'),
                    'return_notes' =>  !empty($notes)?$notes:'',
                    'refund_percentage' => $ret_per); 
                $result = cancelled_trip_refund_amount($pnrinfo);
                
                if($result['status'] == 1){
                    $err = '';
                    $this->session->set_userdata('suc', $result['message']);
                }
                
            }
        }
        
        if($err != ''){
            $this->session->set_userdata('err', 'Sorry! Try again...');
            
            return FALSE;
        }
    }
    
    public function cancelBookingExport($data){ 
        $spreadsheet = new Spreadsheet();
        $sheet       = $spreadsheet->getActiveSheet();
        
        //SET HEADER
        $sheet->setCellValue('A1', 'BOOKED ON');
        $sheet->setCellValue('B1', 'PNR NO');       
        $sheet->setCellValue('C1', 'BOOKED FROM');
        $sheet->setCellValue('D1', 'TRIP TILE');
        $sheet->setCellValue('E1', 'DATE OF TRIP');
        $sheet->setCellValue('F1', 'PICKUP LOCATIONS');
        $sheet->setCellValue('G1', 'NO OF TRAVELLERS');
        $sheet->setCellValue('H1', 'PRICE TO ADULT');
        $sheet->setCellValue('I1', 'PRICE TO CHILDREN');
        $sheet->setCellValue('J1', 'PRICE TO INFAN');
        $sheet->setCellValue('K1', 'NO OF ADULT');
        $sheet->setCellValue('L1', 'NO OF CHILDREN');
        $sheet->setCellValue('M1', 'NO OF INFAN');
        $sheet->setCellValue('N1', 'DISCOUNT PERCENTAGE');
        $sheet->setCellValue('O1', 'DISCOUNT PRICE');
        $sheet->setCellValue('P1', 'OFFER AMOUNT');
        $sheet->setCellValue('Q1', 'GST PERCENTAGE');
        $sheet->setCellValue('R1', 'GST AMOUNT');
        $sheet->setCellValue('S1', 'TOTAL');
        $sheet->setCellValue('T1', 'STATUS');
        $sheet->setCellValue('U1', 'CANCELLED ON');
        $sheet->setCellValue('V1', 'REFUND PERCENTAGE');
        $sheet->setCellValue('W1', 'RETURN PAID AMOUNT');
        $sheet->setCellValue('X1', 'RETURN NOTES');
        $sheet->setCellValue('Y1', 'RETURN ON');
        $sheet->setCellValue('Z1', 'RETURN PAID STATUS');
        
        $row = 2;
        
        $status_val = array('New', 'Pending', 'Booked', 'Cancelled', 'Confirmed', 'Completed');
        $user_type_val = array('CU'=>'B2C Booking','GU'=>'B2C Booking','VA'=>'Office Booking');
        $can_status_val = array('1'=>'New', '2'=>'InProgress', '3'=>'Paid');
        
        foreach ($data as $value) {           
            $user_type = $value['user_type'];
            $status    = $value['status'];
            
            $sheet->setCellValue('A' . $row, date("M d, Y h:i A", strtotime($value['booked_on'])));
            $sheet->setCellValue('B' . $row, $value['pnr_no']);            
            $sheet->setCellValue('C' . $row, $user_type_val[$user_type]);
            $sheet->setCellValue('D' . $row, $value['trip_name']);
            $sheet->setCellValue('E' . $row, date("M d, Y", strtotime($value['date_of_trip'])));
            $sheet->setCellValue('F' . $row, $value['pick_up_location']);           
            $sheet->setCellValue('G' . $row, $value['number_of_persons']);
            $sheet->setCellValue('H' . $row, $value['price_to_adult'] );
            $sheet->setCellValue('I' . $row, $value['price_to_child'] );           
            $sheet->setCellValue('J'. $row, $value['price_to_infan']);
            $sheet->setCellValue('K'. $row, $value['no_of_adult']);
            $sheet->setCellValue('L'. $row, $value['no_of_child']);
            $sheet->setCellValue('M'. $row, $value['no_of_infan']);
            $sheet->setCellValue('N' . $row,$value['discount_percentage']); 
            $sheet->setCellValue('O'. $row, $value['discount_price']);
            $sheet->setCellValue('P'. $row, $value['offer_amt']);
            $sheet->setCellValue('Q'. $row, $value['gst_percentage']);
            $sheet->setCellValue('R'. $row, $value['gst_amt']);
            $sheet->setCellValue('S'. $row, $value['total_trip_price']);
            $sheet->setCellValue('T'. $row, $status_val[$status]);  
            $sheet->setCellValue('U' . $row, date("M d, Y h:i A", strtotime($value['cancelled_on'])));
            $sheet->setCellValue('V'. $row, $value['refund_percentage']);
            $sheet->setCellValue('W'. $row, $value['return_paid_amt']);
            $sheet->setCellValue('X'. $row, $value['return_notes']);
            $sheet->setCellValue('Y' . $row, date("M d, Y h:i A", strtotime($value['return_on'])));
            $sheet->setCellValue('Z'. $row, $can_status_val[$value['return_paid_status']]);
            $row++;
        }
        
        $writer = new Xlsx($spreadsheet);
 
        $filename = 'CANCEL-BOOKING-REPORT-'.date('d-m-Y');
 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output'); // download file 
    }

    public function payHistoryToExportData($data){ 
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();        
        
        //SET HEADER
        $sheet->setCellValue('A1', 'PNR NO');
        $sheet->setCellValue('B1', 'FROM USER');       
        $sheet->setCellValue('C1', 'TO USER');
        $sheet->setCellValue('D1', 'USER');
        $sheet->setCellValue('E1', 'TRIP TITLE');
        $sheet->setCellValue('F1', 'DATE TIME');
        $sheet->setCellValue('G1', 'TRANSACTION NOTES');       
        $sheet->setCellValue('H1', 'WITHDRAWALS');       
        $sheet->setCellValue('I1', 'DEPOSITS');             
        
        $row = 2;
        
        foreach ($data as $value) {
            
            $sheet->setCellValue('A' . $row, $value['pnr_no']);            
            $sheet->setCellValue('B' . $row, $value['fromuser']);            
            $sheet->setCellValue('C' . $row, $value['touser']);                        
            $sheet->setCellValue('D' . $row, $value['recordusername']);                        
            $sheet->setCellValue('E' . $row, $value['trip_name']);
            $sheet->setCellValue('F' . $row, date("M d, Y h:i A", strtotime($value['date_time'])));
            $sheet->setCellValue('G' . $row, $value['transaction_notes']); 
            $sheet->setCellValue('H' . $row, $value['withdrawals']);            
            $sheet->setCellValue('I' . $row, $value['deposits']);
            
           
            $row++;
        }
        
        $writer = new Xlsx($spreadsheet);
 
        $filename = 'PAY HISTORY '.date('d-m-Y');
 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output'); // download file 
    }
}
