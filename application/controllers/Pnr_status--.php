<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pnr_status extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function pnr_status_check($pnr = '', $pnrshow = 0) {
        $this->load->helper('custom_helper');
        $data['isform'] = true;
        $pnrinfo = array();
        if ($pnr != '') {
            $data['isform'] = false;
        }
        if ($_POST && $pnr == '') {
            $this->form_validation->set_rules('pnr_number', 'PNR Number', 'trim|required');
            $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
            if ($this->form_validation->run($this) == FALSE) {
                $data['message'] = 'Enter the PNR number and Phone number'; //validation_errors();
            }
            $pnrinfo = getpnrinfo($this->input->post('pnr_number', true), $this->input->post('phone_number', true));
            if (!isset($pnrinfo['pnr_no']) || count($pnrinfo) < 2) {
                $data['message'] = 'Sorry! Please enter valid PNR number and Phone number';
            }$pnrinfo = $pnrinfo;
        } else if ($pnr != '') {
            $data['isform'] = FALSE;
            $pnrinfo = getpnrinfo($pnr);
            if (!isset($pnrinfo['pnr_no']) || count($pnrinfo) < 2) {
                $data['message'] = 'Sorry! Please enter valid PNR number and Phone number';
            }$pnrinfo = $pnrinfo;
        }$data['pnrinfo'] = $pnrinfo;
        $data['pnrshow'] = $pnrshow; //0 - booking time, 1 - vendor view, 2 - customer view ,3-cancel trip
        $this->load->view('PNR-status-check', $data);
    }

    public function getPNRDetails() {
        if ($_POST) {
            $this->form_validation->set_rules('pnr_number', 'PNR Number', 'trim|required');
            $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');

            if ($this->form_validation->run($this) == FALSE) {
                $returnedData['status'] = false;
                $returnedData['message'] = 'Enter the PNR number and Phone number'; //validation_errors();
            } else {
                $this->load->helper('custom_helper');
                $returnedData['status'] = true;
                $returnedData['data'] = getpnrinfo($this->input->post('pnr_number', true), $this->input->post('phone_number', true));
//                print_r($returnedData['data']);
//                echo $returnedData['data'][0]['pnr_no'];
//                echo count($returnedData['data']);
                if (!isset($returnedData['data'][0]['pnr_no'])) {
                    $returnedData['status'] = false;
                    $returnedData['message'] = 'Sorry! Please enter valid PNR number and Phone number';
                }
            }
        }
        $this->load->view('PNR-status-check', $returnedData);
        //echo json_encode($returnedData);exit;
    }
    
    public function pnr_status_report($pnr = '') {
        $this->load->helper('custom_helper');
        $pnrinfo = array();
        if ($pnr == '') {
            redirect('login');
        }
        $pnrinfo = getpnrinfo($pnr);
        if (!isset($pnrinfo['pnr_no']) || count($pnrinfo) < 2) {
            $data['message'] = 'Sorry! Please enter valid PNR number and Phone number';
        }
        $data['pnrinfo'] = $pnrinfo;
        
        $this->load->view('PNR-status-report', $data);
    }
    
    public function cancel_trip(){
        $succ = '';
        if ($_POST) 
        {
            $pnr_no = $this->input->post('pnr_no');
            
            if(!empty($pnr_no)){
                $this->load->helper('custom_helper');
                $updatedata = array(
                'payment_type' => 0, // 1 - Pendding, 2- booked, 3 - cancelled
                'payment_status' => 0, // 1 - net, 2 - credit, 3 - debit
                'status' =>  3); //0 - Pendding,1 - sucess,2 - failed

                if(trip_book_status_update($updatedata,$pnr_no)){
                    $this->session->set_userdata('suc', 'Trip has been successfully cancelled.');
                    $succ = 'success';
                }
            }
        }
        
        if($succ == ''){
            $this->session->set_userdata('err', 'Trip not cancelled');            
        }
        echo $succ;exit;
        
    }

}