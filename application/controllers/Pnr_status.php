<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pnr_status extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function pnr_status_check($pnr = '', $pnrshow = 0) {
        //$this->load->helper('custom_helper');
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
            }//$pnrinfo = $pnrinfo;
        } else if ($pnr != '') {
            $data['isform'] = FALSE;
            $pnrinfo = getpnrinfo($pnr);
            if (!isset($pnrinfo['pnr_no']) || count($pnrinfo) < 2) {
                $data['message'] = 'Sorry! Please enter valid PNR number and Phone number';
            }//$pnrinfo = $pnrinfo;
        }
        if($pnrshow==66){
            $this->session->set_userdata('bk_pnr_no', $pnrinfo['pnr_no']);
            $pnrshow=6;
        }
        if ($this->session->userdata('user_type') == 'VA') {
            $this->load->model('Report_model');
            $whereData = array('pnr_no' => $pnrinfo['pnr_no'],'tbpd.parent_trip_id' => $pnrinfo['trip_id']);
            $data["childinfo"] = $this->Report_model->booking_childinfo($whereData);
        }
//        print_r($pnrinfo); print_r($data["childinfo"]);
//                exit();
        $data['pnrinfo'] = $pnrinfo;
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
                //$this->load->helper('custom_helper');
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
        //$this->load->helper('custom_helper');
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
            $accountid = $this->input->post('accountid');
            
            if(!empty($pnr_no)){
                //$this->load->helper('custom_helper');
                
                $updatedata = array('status' =>  3,'account_info_id' =>  $accountid); 
                if(trip_book_paid_sucess($updatedata,$pnr_no)){
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
    
    public function addAccountmodal($pnr) { 
        
        $whereData = array('isactive' => 1,'payment_status' => 1,'pnr_no' => $pnr);
        $trip_book_pay = selectTable('trip_book_pay', $whereData,['*'],[],[],'','',[],'result_array', $echo = 0,array('status',array(2,4)),$notInWhereData = array());
        $data['pnr'] = $pnr;
        
        $whereData = array('isactive' => 1,'user_id' => $trip_book_pay[0]['user_id']);
        $data['account_info_list'] = selectTable('account_info', $whereData,['*'],[],[],'','',[],'result_array');
        $this->load->library('encryption');
        $config['encryption_key'] = 'Sfw45@13F5Jm)5';
        $ciphertext = $this->encryption->encrypt($trip_book_pay[0]['user_id']);
        $data['yhkey'] = $ciphertext;
        
        $this->load->view("account_info", $data);
        
    }
    
    public function addEditAccountAction() {
//        if ($this->session->userdata('user_id') == '') {
//            return FALSE;
//        }
        $err = 'yes';
        if ($_POST) {
            $this->form_validation->set_rules('account', 'Select an Account', 'trim|required');
            $this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required');
            $this->form_validation->set_rules('account_holder_name', 'Account Holder Name', 'trim|required');
            $this->form_validation->set_rules('account_number', 'Account Number', 'trim|numeric|required');
            $this->form_validation->set_rules('ifsc_code', 'IFSC Code', 'trim|required');
            $this->form_validation->set_rules('branch', 'Branch', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('yhkey', 'key', 'trim|required');
           
            if ($this->form_validation->run($this) != FALSE) {                
                extract($this->input->post());
                $this->load->library('encryption');
                $config['encryption_key'] = 'Sfw45@13F5Jm)5';
                $user_id = $this->encryption->decrypt($yhkey);
                $data = array(
                    'user_id'                 => $user_id,
                    'bank_name'               => $bank_name,
                    'account_holder_name'     => $account_holder_name,
                    'account_number'          => $account_number,                   
                    'ifsc_code'               => $ifsc_code,                   
                    'branch'                  => $branch,                   
                    'address'                 => $address,
                    'is_primary'              => isset($is_primary) && $is_primary == 'on'?1:0
                    );//echo "<pre>";print_r($data);exit;
                
                if($this->input->post('account') == 'new'){
                    $account_info_id = insertTable('account_info', $data);
                    
                    //UPDATE UNSET PRIMARY
                    if($is_primary == 'on'){
                        $up_data = array('is_primary'=>0);
                        updateTable('account_info',array('user_id' => $user_id,'isactive'=>1,'id!=' => $account_info_id,'is_primary' => 1),$up_data);
                    }
                    echo $account_info_id;
                    return FALSE;
                }else if(!empty($this->input->post('account'))){
                    $upQry = updateTable('account_info',array('id' => $user_id),$data);
                    echo $this->input->post('account');
                    return FALSE;
                }
                
            }
        }
        
        if($err != ''){
            echo 'Sorry! Try again...';
            return FALSE;
        }
    }
    
    public function getAccountDetails(){
        $returnedData = [];
        if ($_POST) 
        {
            $id  = $this->input->post('id');
            
            if(!empty($id)){
                $whereData        = array('isactive' => 1,'id' => $id);
                $returnedData = selectTable('account_info', $whereData,['*'],[],[],'','',[],'row_array'); 
            }
        }
        echo json_encode($returnedData);exit;
    }

}
