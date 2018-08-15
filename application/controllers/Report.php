<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    function __construct() {
        parent::__construct();

    }
	public function booking_wise_reports()
	{
      $this->load->view('report/booking-reports.php');      
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