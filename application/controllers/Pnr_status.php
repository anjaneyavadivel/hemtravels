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
    
    public function getPNRDetails(){
        $returnedData['status'] = false;
        if ($_POST) 
        {
            $this->form_validation->set_rules('pnr_number', 'PNR Number', 'trim|required');
            $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');               
                
            if ($this->form_validation->run($this) == FALSE) {
                $returnedData['message'] = 'Enter the PNR number and Phone number';//validation_errors();
            }else{
                $this->load->helper('custom_helper');
                
                $returnedData['status'] = true;
                $returnedData['data'] = getpnrinfo($this->input->post('pnr_number',true),$this->input->post('phone_number',true));
                
                
            }
        }
        echo json_encode($returnedData);exit;
    }
	
}