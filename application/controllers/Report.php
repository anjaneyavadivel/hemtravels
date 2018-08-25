<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('Report_model');	

    }
	public function booking_wise_reports($booking_search = '') {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        $url=$this->uri->segment(1);
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
        $status = trim($this->input->get('status'));
        $bookfrom = trim($this->input->get('bookfrom'));
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . $url."?title=".$title."&from=".$from."&to=".$to."&status=".$status."&bookfrom=".$bookfrom;
        $whereData = array('title'=>$title,'from'=>$from,'to'=>$to,'status'=>$status,'bookfrom'=>$bookfrom);
        if($this->session->userdata('user_type') == 'VA'){$whereData['tbpd.user_id']=$loginuserid;}
        if($this->session->userdata('user_type') == 'SA'){$whereData['groupby']='pnr_no';}
        
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
        $data["bookinglist"] = $this->Report_model->booking_list($whereData,$config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data["from"] = $from;
        $data["to"] = $to;
        $data["status"] = $status;
        $data["bookfrom"] = $bookfrom;
        $data["title"] = $title;
        $data["url"] = $url;
        $this->load->view('report/booking-reports', $data);
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

	
	
	public function Trip_wise_reports()
	{
      $this->load->view('report/Trip-reports.php');      
	}
	public function payment_from_B2C_reports()
	{
      $this->load->view('report/payment-from-B2C-reports.php');      
	}
	public function payment_from_B2B_reports()
	{
      $this->load->view('report/payment-from-B2B-reports.php');      
	}
	public function payment_to_B2B_reports()
	{
      $this->load->view('report/payment-to-B2B-reports.php');      
	}
	public function cancellation_reports()
	{
      $this->load->view('report/cancellation-reports.php');      
	}
	public function my_transaction_reports()
	{
      $this->load->view('report/my-transaction-reports.php');      
	}

}