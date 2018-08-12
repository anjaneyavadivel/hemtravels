<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pnr_status extends CI_Controller {

    function __construct() {
        parent::__construct();
    }
	public function pnr_status_check()
	{
      $this->load->view('PNR-status-check.php');      
	}
	
}