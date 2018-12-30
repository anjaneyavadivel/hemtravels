<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function withdrawals_request() {
        if ($this->session->userdata('user_id') == '' || ($this->session->userdata('user_type') != 'SA' && $this->session->userdata('user_type') != 'VA')) {
            redirect('login');
        } $this->load->model('Report_model');
        //$this->load->helper('custom_helper');
        $title = trim($this->input->get('title'));
        $from = trim($this->input->get('from'));
        $to = trim($this->input->get('to'));
        $status = trim($this->input->get('status'));
        $download = $this->input->get('download');

        $url = $this->uri->segment(1);

        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . $url . "?title=" . $title . "&from=" . $from . "&to=" . $to . "&status=" . $status;
        $whereData = array('title' => $title, 'from' => $from, 'to' => $to, 'status' => $status, 'download' => $download);
        $whereData['statusin'] = array(0, 3);
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
        $page = ($this->input->get('page')) ? ( ( $this->input->get('page') - 1 ) * $config["per_page"] ) : 0;
        $config["total_rows"] = $this->Report_model->transaction_reports($whereData, $config["per_page"], $page, 'yes');
        $this->pagination->initialize($config);

        $data["transaction_reports"] = $this->Report_model->transaction_reports($whereData, $config["per_page"], $page, 'no');
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links); //echo "<pre>";print_r($str_links);exit;
        $data["from"] = $from;
        $data["to"] = $to;
        $data["status"] = $status;
        $data["title"] = $title;
        $data["url"] = $url; //echo "<pre>";print_r($data);exit;
        if ($this->session->userdata('user_type') == 'SA') {
            $data["loginuser_id"] = 0;
        } else {
            $data["loginuser_id"] = $this->session->userdata('user_id');
        }

        $this->load->view('withdrawal', $data);
    }

    public function withdraw_request_add() {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        //$loginuserid = $this->session->userdata('user_id');
        if ($this->session->userdata('user_type') == 'SA') {
            $loginuserid = 0;
        } else {
            $loginuserid = $this->session->userdata('user_id');
        }
        $whereData = array('isactive' => 1, 'user_id' => $loginuserid);
        $data['account_info_list'] = selectTable('account_info', $whereData, ['*'], [], [], '', '', [], 'result_array');
        $data["loginuserid"] = $loginuserid;
        $this->load->view('withdrawal-request', $data);
    }

    public function withdraw_request_save() {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
        $err = 'yes';
        if ($_POST) {
            $this->form_validation->set_rules('account', 'Select an Account', 'trim|required');
            $this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required');
            $this->form_validation->set_rules('account_holder_name', 'Account Holder Name', 'trim|required');
            $this->form_validation->set_rules('account_number', 'Account Number', 'trim|numeric|required');
            $this->form_validation->set_rules('ifsc_code', 'IFSC Code', 'trim|required');
            $this->form_validation->set_rules('branch', 'Branch', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('withdrawalamount', 'Withdrawal Amount', 'trim|numeric|required');
            if ($this->form_validation->run($this) != FALSE) {
                extract($this->input->post());
                if ($this->session->userdata('user_type') == 'SA') {
                    $loginuserid = 0;
                } else {
                    $loginuserid = $this->session->userdata('user_id');
                }
                // check balance avilable
                $balanceamt = checkbal_mypayment($loginuserid, 2);
                if (MIN_WITHDRAWAL <= $withdrawalamount && $balanceamt >= $withdrawalamount) {

                    $data = array(
                        'user_id' => $loginuserid,
                        'bank_name' => $bank_name,
                        'account_holder_name' => $account_holder_name,
                        'account_number' => $account_number,
                        'ifsc_code' => $ifsc_code,
                        'branch' => $branch,
                        'address' => $address,
                        'is_primary' => isset($is_primary) && $is_primary == 'on' ? 1 : 0
                    );
                    $account_info_id = 0;
                    if ($this->input->post('account') == 'new') {
                        $account_info_id = insertTable('account_info', $data);

                        //UPDATE UNSET PRIMARY
                        if ($is_primary == 'on') {
                            $up_data = array('is_primary' => 0);
                            updateTable('account_info', array('user_id' => $loginuserid, 'isactive' => 1, 'id!=' => $account_info_id, 'is_primary' => 1), $up_data);
                        }
                    } else if (!empty($this->input->post('account'))) {
                        $upQry = updateTable('account_info', array('id' => $this->input->post('account')), $data);
                        $account_info_id = $this->input->post('account');
                    }

                    // withdrawal Request
                    $paymentdata = array(
                        'userid' => $loginuserid,
                        'transaction_notes' => 'Cash Withdrawal Request',
                        'withdrawal_request_amt' => $withdrawalamount,
                        'b2b_pay_account_info' => $account_info_id,
                        'status' => 0);
                    //$status = 1 withdrawal Request, 2 withdrawal
                    make_mypayment($paymentdata, 1);
                    // mail send to admin
                    $subject = 'You have received withdrawal request';
                    $message = 'You have received withdrawal request amount Rs: ' . $withdrawalamount;
                    $mailData = array(
                        //'fromuserid' => $pnrinfo['trip_postbyid'],
                        //'ccemail' => admin_email . ',' . email_bottem_email . ',' . 'anjaneya.developer@gmail.com,',
                        //'bccemail' => admin_email.','.email_bottem_email.','.$pnrinfo['bookedby_contactemail'],
                        'touserid' => admin_email . ',' . email_bottem_email . ',' . 'anjaneya.developer@gmail.com,',
                        //'toemail' => 'anjaneya.developer@gmail.com',
                        'subject' => $subject,
                        'message' => $message,
                            //'othermsg' => $othermsg
                    );
                    sendemail_personalmail($mailData);
                    //maill sent to customer
                    
                    $subject = 'You are send withdrawal request';
                    $message = 'You are send withdrawal request successfully! Our executive person check your account and transfer amount Rs: ' . $withdrawalamount.' to following account within 7 days<br><br>';
                    $message .= 'Bank Name: ' . $bank_name.'<br>';
                    $message .= 'Account Holder Name: ' . $account_holder_name.'<br>';
                    $message .= 'Account Number: ' . substr($account_number, 0, 4) . str_repeat($maskingCharacter, strlen($account_number) - 8) . substr($account_number, -4).'<br>';
                    $message .= 'IFSC Code: ' . $ifsc_code.'<br>';
                    $message .= 'Branch Name: ' . $branch.'<br>';
                    $message .= 'Bank Address: ' . $address.'<br>';
                    $mailData = array(
                        //'fromuserid' => $pnrinfo['trip_postbyid'],
                        'ccemail' => admin_email . ',' . email_bottem_email . ',' . 'anjaneya.developer@gmail.com,',
                        //'bccemail' => admin_email.','.email_bottem_email.','.$pnrinfo['bookedby_contactemail'],
                        'touserid' => $loginuserid,
                        //'toemail' => 'anjaneya.developer@gmail.com',
                        'subject' => $subject,
                        'message' => $message,
                            //'othermsg' => $othermsg
                    );
                    sendemail_personalmail($mailData);
                    $this->session->set_userdata('suc', 'Withdrawal Request has been successfully send');
                    echo 'Withdrawal Request has been successfully send';
                    exit;
                }
            }
        }
        echo $err;
        exit;
    }

    public function withdraw_request_pay() {
        if ($this->session->userdata('user_id') == '' || $this->session->userdata('user_type') != 'SA') {
            return FALSE;
        }
        //$loginuserid = $this->session->userdata('user_id');
        if ($this->session->userdata('user_type') == 'SA') {
            $loginuserid = 0;
        } else {
            $loginuserid = $this->session->userdata('user_id');
        }
        if ($_POST) {
            $this->form_validation->set_rules('requestid', 'requestid', 'trim|numeric|required');
            if ($this->form_validation->run($this) != FALSE) {
                extract($this->input->post());

                $this->load->model('Report_model');
                $whereData = array('id' => $requestid);
                $whereData['statusin'] = array(0, 3);
                $data["transaction_view"] = $this->Report_model->transaction_view($whereData);
                $data["loginuserid"] = $loginuserid;
                $this->load->view('withdrawal-request-pay', $data);
            }
        }
    }

    public function withdraw_request_paid() {
        if ($this->session->userdata('user_id') == '' || $this->session->userdata('user_type') != 'SA') {
            return FALSE;
        }
        $err = 'yes';
        if ($_POST) {
            $this->form_validation->set_rules('payamount', 'pay amount', 'trim|numeric|required');
            $this->form_validation->set_rules('paynotes', 'pay notes', 'trim|required');
            if ($this->form_validation->run($this) != FALSE) {
                extract($this->input->post());
                if ($this->session->userdata('user_type') == 'SA') {
                    $loginuserid = 0;
                } else {
                    $loginuserid = $this->session->userdata('user_id');
                }
                // check balance avilable
//                $balanceamt = checkbal_mypayment($loginuserid, 2);
//                if (MIN_WITHDRAWAL <= $withdrawalamount && $balanceamt >= $withdrawalamount) {
                $this->load->model('Report_model');
                $whereData = array('id' => $requestid);
                $whereData['statusin'] = array(0, 3);
                $transaction_view = $this->Report_model->transaction_view($whereData);

                if ($transaction_view->num_rows() < 1) {
                    echo $err;
                    exit;
                } else {
                    $transaction = $transaction_view->row();
                    $paymentdata = array(
                    'userid' => $transaction->userid, // b2b
                    'transaction_notes' => 'Amount for withdrawal request, '.$paynotes,
                    'withdrawals' => $payamount,
                    'withdrawal_notes' => $paynotes,
                    'withdrawal_paid_on' => date('Y-m-d'),
                    'b2b_pay_account_info' => $transaction->b2b_pay_account_info,
                    'my_transaction_id' => $transaction->id,
                    'status' => 2); // withdrawal_request_id - id in my_transaction table
                    //$status = 1 withdrawal Request, 2 withdrawal
                    make_mypayment($paymentdata, 2);
                    
                                
                    $subject = 'You have received withdrawal request amount';
                    $message = site_title.' has been transferred successfully, You will be received withdrawal request amount Rs: ' . $payamount. ' with in 48hr.<br><br>' . $paynotes;
                    $mailData = array(
                        //'fromuserid' => $pnrinfo['trip_postbyid'],
                        'ccemail' => admin_email . ',' . email_bottem_email . ',' . 'anjaneya.developer@gmail.com,',
                        //'bccemail' => admin_email.','.email_bottem_email.','.$pnrinfo['bookedby_contactemail'],
                        'touserid' => $transaction->userid,
                        //'toemail' => 'anjaneya.developer@gmail.com',
                        'subject' => $subject,
                        'message' => $message,
                            //'othermsg' => $othermsg
                    );

                    sendemail_personalmail($mailData);
                
                    $this->session->set_userdata('suc', 'Withdrawal request amount has been successfully paid');
                    echo 'Withdrawal Request has been successfully send';
                    exit;
                    // }
                }
            }
        }
        echo $err;
        exit;
    }

}
