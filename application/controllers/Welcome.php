<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Welcome_model');
        //$this->load->helper('custom_helper');
    }

    public function index() {
        if ($this->session->userdata('user_type') == 'SA') {
            $where = array('tm.isactive' => 1);
            $limit = 4;
            $data['trippost_list'] = $this->Welcome_model->get_trip_list($where, $limit);
            $limit = 10;
            $data['trip_popular_list'] = $this->Welcome_model->get_trippopular_list($where, $limit);
            $limit = 8;
            $where = array('cm.isactive' => 1);
            $data['tripcategory_list'] = $this->Welcome_model->get_tripcategory_list($where, $limit);
            $this->load->view('welcome_b2a', $data);
        } else if ($this->session->userdata('user_type') == 'VA') {
            $this->load->model('Tripshared_model');
            $loginuserid = $this->session->userdata('user_id');
            $data["loginuserid"] = $loginuserid;
            $where = array('tm.isactive' => 1, 'tm.user_id' => $loginuserid);
            $limit = 8;
            $data['trippost_list'] = $this->Welcome_model->get_trip_list($where, $limit);
            $limit = 10;
            $data['trip_popular_list'] = $this->Welcome_model->get_trippopular_list($where, $limit);
            $where = array('tm.isactive' => 1, 'tp.status' => 2, 'tm.user_id' => $loginuserid);
            $limit = 2;
            $data['new_booking_list'] = $this->Welcome_model->get_tripbooking_list($where, $limit);
            $where = array('tm.isactive' => 1, 'tm.user_id' => $loginuserid);
            $limit = 2;
            $data['all_booking_list'] = $this->Welcome_model->get_tripbooking_list($where, $limit);
            $whereData = array('loginuserid' => $loginuserid, 'isactive' => 1);
            $data["sharedtriplist"] = $this->Tripshared_model->trip_list($whereData, 5, 0);
            //$data['trip_list']=$this->Welcome_model->get_list($where);
            $this->load->view('welcome_b2b', $data);
        } else {
            $where = array('tm.isactive' => 1);
            $limit = 4;
            $data['trippost_list'] = $this->Welcome_model->get_trip_list($where, $limit);
            $limit = 10;
            $data['trip_popular_list'] = $this->Welcome_model->get_trippopular_list($where, $limit);
            $limit = 8;
            $where = array('cm.isactive' => 1);
            $data['tripcategory_list'] = $this->Welcome_model->get_tripcategory_list($where, $limit);
            $this->load->view('welcome_b2c', $data);
        }
    }

    public function about_us() {
        $this->load->view('about_us');
    }

    public function contact_us() {
        $this->load->view('contact_us');
    }

    public function faq_list() {
        //if ($this->session->userdata('user_id') == '') { redirect('login'); }		
        $data['faqlist'] = $this->Welcome_model->faq_list();
        $this->load->view('faq', $data);
    }

    public function faq_add() {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
        if ($_POST) {
            $question = trim($this->input->post('question'));
            $answer = trim($this->input->post('answer'));

            $this->form_validation->set_rules('question', 'Name', 'trim|required|max_length[150]');
            $this->form_validation->set_rules('answer', 'answer', 'trim|required');

            if (!$this->form_validation->run()) {
                $error = $this->session->set_userdata('err', validation_errors());
            } else if ($this->form_validation->run() == TRUE) {
                $data = array('question' => $question, 'answer' => $answer, 'isactive' => 1);
                $id = $this->Welcome_model->faq_insert($data);
                if ($id > 0) {
                    $error = $this->session->set_userdata('suc', 'Successfullly Added');
                }
            }
            redirect(base_url() . 'faq');
        }
        $data['faqdetail'] = array('id' => '', 'question' => '', 'answer' => '');
        $data['title'] = 'Add';
        $data['btnname'] = 'Add';
        $data['url'] = 'faq/add';
        $this->load->view('faq-add', $data);
    }

    //Function-3 : edit user type 
    public function faq_edit($id) {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
        if ($_POST) {
            $question = trim($this->input->post('question'));
            $answer = trim($this->input->post('answer'));

            $this->form_validation->set_rules('question', 'question', 'trim|required|max_length[150]');
            $this->form_validation->set_rules('answer', 'answer', 'trim|required');

            if (!$this->form_validation->run()) {
                $error = $this->session->set_userdata('err', validation_errors());
            } else if ($this->form_validation->run() == TRUE) {
                $data = array('question' => $question, 'answer' => $answer);
                $this->Welcome_model->faq_update($data, $id);
                if ($id > 0) {
                    $error = $this->session->set_userdata('suc', 'Successfullly Updated');
                }
                redirect(base_url() . 'faq');
            }
        }
        $data['faqdetail'] = $this->Welcome_model->faq_detail($id);
        $data['title'] = 'Edit';
        $data['btnname'] = 'Update';
        $data['url'] = 'faq/edit/' . $id;
        $this->load->view('faq-add', $data);
    }

    //Function-4 : delete user type 
    public function faq_delete($id) {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        $data = array('isactive' => 0);
        $this->Welcome_model->faq_update($data, $id);
        redirect(base_url() . 'faq');
    }

    public function contact_add() {
        if ($_POST) {
            $name = trim($this->input->post('name'));
            $email = trim($this->input->post('email'));
            $subject = trim($this->input->post('subject'));
            $message = trim($this->input->post('message'));

            $this->form_validation->set_rules('name', 'name', 'trim|required|max_length[100]');
            $this->form_validation->set_rules('email', 'email', 'trim|required');
            $this->form_validation->set_rules('subject', 'subject', 'trim|required|max_length[150]');
            $this->form_validation->set_rules('message', 'message', 'trim|required');

            if (!$this->form_validation->run()) {
                $error = $this->session->set_userdata('err', validation_errors());
            } else if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'id' => $this->input->post('id'),
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'phone_number' => $this->input->post('phone_number'),
                    'subject' => $this->input->post('subject'),
                    'message' => $this->input->post('message'),
                );
                $id = $this->Welcome_model->contact_insert($data);
                if ($id > 0) {
                    //$toemail='anjaneyavadivel@gmail.com';
                    $toemail = admin_email;
                    $subject = $this->input->post('subject') . ' from contact us/' . site_title;
                    $message = 'Name: ' . $this->input->post('name') . '<br>' . 'Email: ' . $this->input->post('email') . '<br><br>' . $this->input->post('message');
                    $mailData = array(
                        'fromemail' => $this->input->post('email'),
                        'toemail' => $toemail,
                        'subject' => $subject,
                        'message' => $message,
                            //'othermsg' => ''
                    );

                    sendemail_personalmail($mailData);
                    $error = $this->session->set_userdata('suc', 'Successfullly send mail, Our representative will contact you shortly...');
                    return TRUE;
                }
            }
            $error = $this->session->set_userdata('suc', 'Successfullly send mail, Our representative will contact you shortly...');
            return FALSE;
        }
    }

    public function checkTripCompleted() {
        $cur_date = date('Y-m-d', strtotime(' +10 day')); //date('Y-m-d', strtotime(' -1 day'));

        $whereData = array('tpd.isactive' => 1, 'b2b_payment_status !=' => 1, 'tpd.payment_status' => 1, 'tpd.date_of_trip_to <' => $cur_date);
        $joins = array(
            array(
                'table' => 'trip_master AS tm',
                'condition' => 'tm.id = tpd.trip_id',
                'jointype' => 'INNER'
            ),
            array(
                'table' => 'user_master AS tmum',
                'condition' => 'tm.user_id = tmum.id',
                'jointype' => 'INNER'
            ),
            array(
                'table' => 'user_master AS bum',
                'condition' => 'tpd.user_id = bum.id',
                'jointype' => 'INNER'
            ),
            array(
                'table' => 'coupon_code_master_history AS ccmhd',
                'condition' => 'tpd.coupon_history_id = ccmhd.id',
                'jointype' => 'LEFT'
            ),
        );
        $columns = 'tpd.*,'
                . 'tm.id AS trip_id,tm.trip_name,tm.trip_code,tm.how_many_days,tm.how_many_nights,tm.total_days,tm.how_many_hours,'
                . 'tm.brief_description,tm.other_inclusions,tm.exclusions,tm.languages,tm.meal,tm.cancellation_policy,tm.confirmation_policy,tm.refund_policy,'
                . 'bum.id AS bookedbyid,bum.user_fullname AS bookedby,bum.phone AS bookedby_contactno,bum.email AS bookedby_contactemail,'
                . 'tmum.id AS trip_postbyid,tmum.user_fullname AS trip_postby,tmum.phone AS trip_contactno,tmum.email AS trip_contactemail,tm.trip_name,'
                . '(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.coupon_code END) AS coupon_code,(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.offer_type END) AS offer_type,'
                . '(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.percentage_amount END) AS percentage_amount';
        $tableData = get_joins('trip_book_pay AS tpd', $columns, $joins, $whereData, $orWhereData = array(), $group = array(), $order = 'tpd.id ASC');
        if ($tableData->num_rows() > 0) {
            $book_pay = $tableData->result();
            foreach ($book_pay as $book_pay) {

                $inWhereData = array('tpd.status', array(2, 4));
                $where_pay_details = array('tpd.isactive' => 1, 'b2b_payment_status !=' => 1, 'tpd.payment_status' => 1, 'pnr_no' => $book_pay->pnr_no);
                $joins = array(
                    array(
                        'table' => 'trip_master AS tm',
                        'condition' => 'tm.id = tpd.trip_id',
                        'jointype' => 'INNER'
                    ),
                    array(
                        'table' => 'user_master AS tmum',
                        'condition' => 'tm.user_id = tmum.id',
                        'jointype' => 'INNER'
                    ),
                    array(
                        'table' => 'user_master AS bum',
                        'condition' => 'tpd.from_user_id = bum.id',
                        'jointype' => 'INNER'
                    ),
                    array(
                        'table' => 'coupon_code_master_history AS ccmhd',
                        'condition' => 'tpd.coupon_history_id = ccmhd.id',
                        'jointype' => 'LEFT'
                    ),
                );
                $columns = 'tpd.*,'
                        . 'tm.id AS trip_id,tm.trip_name,tm.trip_code,tm.how_many_days,tm.how_many_nights,tm.total_days,tm.how_many_hours,'
                        . 'tm.brief_description,tm.other_inclusions,tm.exclusions,tm.languages,tm.meal,tm.cancellation_policy,tm.confirmation_policy,tm.refund_policy,'
                        . 'bum.id AS bookedbyid,bum.user_fullname AS bookedby,bum.phone AS bookedby_contactno,bum.email AS bookedby_contactemail,'
                        . 'tmum.id AS trip_postbyid,tmum.user_fullname AS trip_postby,tmum.phone AS trip_contactno,tmum.email AS trip_contactemail,tm.trip_name,'
                        . '(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.coupon_code END) AS coupon_code,(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.offer_type END) AS offer_type,'
                        . '(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.percentage_amount END) AS percentage_amount';
                $tableData = get_joins('trip_book_pay_details AS tpd', $columns, $joins, $where_pay_details, $orWhereData = array(), $group = array(), $order = 'tpd.id ASC', $having = '', $limit = array(), $result_way = 'all', $echo = 0, $inWhereData);
                if ($tableData->num_rows() > 0) {
                    $pay_details = $tableData->result();
                    foreach ($pay_details as $pay) {
                        if ($pay->user_id != 0) {
                            $transaction_notes = 'Trip has been booked ' . $pay->pnr_no . ' / ' . $pay->trip_code . ' / ' . $pay->trip_name . '.';
                            if ($pay->servicecharge_amt > 0 || $pay->gst_amt > 0) {
                                $transaction_notes .=' Include GST and Service Charge.';
                            }
                            $paymentdata = array(
                                'userid' => $pay->user_id, // b2b
                                'transaction_notes' => $transaction_notes,
                                'book_pay_id' => $pay->book_pay_id,
                                'book_pay_details_id' => $pay->id,
                                'pnr_no' => $pay->pnr_no,
                                'from_userid' => 0, // default -1  //admin / b2b
                                'trip_id' => $pay->trip_id,
                                'deposits' => $pay->your_final_amt,
                                'status' => 2);
                            $paymentid =  make_mypayment($paymentdata);
                            if($paymentid){
                                $whereData22 = array('id' => $pay->id);
                                $updatedata22 = array('my_transaction_id' => $paymentid,'status' => 5, 'b2b_payment_status' => 1, 'b2b_payment_on' => date('Y-m-d'));
                                $result = updateTable('trip_book_pay_details', $whereData22, $updatedata22);
                                $whereData = array('id' => $pay->trip_id);
                                $trip_list = selectTable('trip_master', $whereData);
                                if ($trip_list->num_rows() >0) {
                                    
                                    $triprow = $trip_list->row();
                                    
                                    $subject='You are received Amount for '.$pay->pnr_no;
                                    $message='You are received Amount for '.$pay->pnr_no.' / '.$triprow->trip_code.' / '.$triprow->trip_name. ' from '.site_title.'. '
                                            . '<a href="'.base_url().'my-transaction-reports">View Website</a>';
                                    $mailData = array(
                                    //'fromuserid' => $pnrinfo['trip_postbyid'],
                                    'ccemail' => admin_email.','.email_bottem_email.','.'anjaneyavadivel@gmail.com,',
                                    //'bccemail' => admin_email.','.email_bottem_email.','.$pnrinfo['bookedby_contactemail'],
                                    'touserid' => $pay->user_id,
                                    //'toemail' => 'anjaneyavadivel@gmail.com',
                                    'subject' => $subject,
                                    'message' => $message,
                                    //'othermsg' => $othermsg
                                    );

                                    sendemail_personalmail($mailData);
                                }
                            }
                        }
                    }
                }
                $inWhereData = array('status', array(2, 4));
                $whereData = array('isactive' => 1, 'payment_status' => 1,'id' => $book_pay->id);
                $trip_list = selectTable('trip_book_pay_details', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = '', $having = '', $limit = array(), $result_way = 'all', $echo = 0,$inWhereData,$notInWhereData = array());
                if ($trip_list->num_rows() < 1) {
                    $whereData22 = array('id' => $book_pay->id);
                    $updatedata22 = array('status' => 5, 'b2b_payment_status' => 1, 'b2b_payment_on' => date('Y-m-d'));
                    $result = updateTable('trip_book_pay', $whereData22, $updatedata22);
                }
            }
        }
        return FALSE;
    }

}
