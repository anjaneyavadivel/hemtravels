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
            $this->load->model('Report_model');
            $whereData = array('from' => date('Y-m-d'), 'to' => date('Y-m-d'), 'groupby' => 'pnr_no');
            $data["total_totday_booking"] = $this->Report_model->booking_count($whereData);
            $whereData = array('groupby' => 'pnr_no');
            $data["total_booking"] = $this->Report_model->booking_count($whereData);
            $whereData = array('title' => '');
            $data["total_trip"] = $this->Report_model->trip_list($whereData, 10, 0, 'yes');

            $whereData = array('groupby' => 'pnr_no');
            $data["bookinglist"] = $this->Report_model->booking_list($whereData, 10, 0, 'no');
            $whereData = array('groupby' => 'pnr_no');
            $data["cancellist"] = $this->Report_model->cancellation_list($whereData, 10, 0, 'no');
            $whereData = array('title' => '');
            $data["triplist"] = $this->Report_model->trip_list($whereData, 10, 0, 'no');
            $whereData = array('title' => '');
            $data["b2c_reports"] = $this->Report_model->payment_from_b2c($whereData, 10, 0, 'no');
            $whereData = array('title' => '');
            $data["b2b_from_reports"] = $this->Report_model->payment_from_b2b($whereData, 10, 0, 'no');
            $whereData = array('title' => '');
            $data["b2b_to_reports"] = $this->Report_model->payment_to_b2b($whereData, 10, 0, 'no');
            $whereData = array('title' => '');
            $data["transaction_reports"] = $this->Report_model->transaction_reports($whereData, 10, 0, 'no');
            $whereData = array('title' => '');
            $data["transaction_reports"] = $this->Report_model->transaction_reports($whereData, 10, 0, 'no');
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
//            $limit = 2;
//            $data['new_booking_list'] = $this->Welcome_model->get_tripbooking_list($where, $limit);
//            $where = array('tm.isactive' => 1, 'tm.user_id' => $loginuserid);
//            $limit = 2;
//            $data['all_booking_list'] = $this->Welcome_model->get_tripbooking_list($where, $limit);
            $whereData = array('loginuserid' => $loginuserid, 'isactive' => 1);
            $data["sharedtriplist"] = $this->Tripshared_model->trip_list($whereData, 5, 0);
            //$data['trip_list']=$this->Welcome_model->get_list($where);
            $this->load->model('Report_model');
            $whereData = array('from' => date('Y-m-d'), 'to' => date('Y-m-d'), 'tbpd.user_id' => $loginuserid);
            $data["total_totday_booking"] = $this->Report_model->booking_count($whereData);
            $whereData = array('tbpd.user_id' => $loginuserid);
            $data["total_booking"] = $this->Report_model->booking_count($whereData);
            $whereData = array('title' => '');
            $data["total_trip"] = $this->Report_model->trip_list($whereData, 10, 0, 'yes');


            $whereData = array('status' => 2, 'tbpd.user_id' => $loginuserid);
            $data["newbookinglist"] = $this->Report_model->booking_list($whereData, 10, 0, 'no');
            $whereData = array('tbpd.user_id' => $loginuserid);
            $data["bookinglist"] = $this->Report_model->booking_list($whereData, 10, 0, 'no');
            $whereData = array('groupby' => 'pnr_no');
            $data["cancellist"] = $this->Report_model->cancellation_list($whereData, 10, 0, 'no');
            $whereData = array('title' => '');
            $data["triplist"] = $this->Report_model->trip_list($whereData, 10, 0, 'no');
            $whereData = array('title' => '');
            $data["b2c_reports"] = $this->Report_model->payment_from_b2c($whereData, 10, 0, 'no');
            $whereData = array('title' => '');
            $data["b2b_from_reports"] = $this->Report_model->payment_from_b2b($whereData, 10, 0, 'no');
            $whereData = array('title' => '');
            $data["b2b_to_reports"] = $this->Report_model->payment_to_b2b($whereData, 10, 0, 'no');
            $whereData = array('title' => '');
            $data["transaction_reports"] = $this->Report_model->transaction_reports($whereData, 10, 0, 'no');
            $whereData = array('title' => '');
            $data["transaction_reports"] = $this->Report_model->transaction_reports($whereData, 10, 0, 'no');
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
                    //$toemail='anjaneya.developer@gmail.com';
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
        $cur_date = date('Y-m-d', strtotime(' -1 day'));
//$cur_date = date('Y-m-d');
//$whereData = array('tpd.isactive' => 1, 'b2b_payment_status !=' => 1, 'tpd.payment_status' => 1, 'tpd.date_of_trip_to' => $cur_date);
        
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
                            $transaction_notes = 'Trip booking amount for PNR No ' . $pay->pnr_no . ' (' . $pay->trip_code . ' / ' . $pay->trip_name . ').';
                            if ($pay->servicecharge_amt > 0 || $pay->gst_amt > 0) {
                                $transaction_notes .=' Include GST and Service Charge.';
                            }
                            if ($pay->servicecharge_amt > 0) {
                                $transaction_notes2 = 'Trip booking servicecharge amount for PNR No ' . $pay->pnr_no . ' (' . $pay->trip_code . ' / ' . $pay->trip_name . ').';
                                
                                $paymentdata2 = array(
                                'userid' => $pay->user_id, // b2b
                                'transaction_notes' => $transaction_notes2,
                                'book_pay_id' => $pay->book_pay_id,
                                'book_pay_details_id' => $pay->id,
                                'pnr_no' => $pay->pnr_no,
                                'from_userid' => 0, // default -1  //admin / b2b
                                'trip_id' => $pay->trip_id,
                                'deposits' => $pay->servicecharge_amt,
                                'status' => 2);
                                $paymentid2 = make_mypayment($paymentdata2,0,$isacceptnactive=1);
                                
                                $paymentdata2 = array(
                                'userid' => 0, // b2b
                                'transaction_notes' => $transaction_notes2,
                                'book_pay_id' => $pay->book_pay_id,
                                'book_pay_details_id' => $pay->id,
                                'pnr_no' => $pay->pnr_no,
                                'from_userid' => $pay->user_id, // default -1  //admin / b2b
                                'trip_id' => $pay->trip_id,
                                'deposits' => $pay->servicecharge_amt,
                                'status' => 2);
                                $paymentid2 = make_mypayment($paymentdata2,0,$isacceptnactive=1);
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
                            //print_r($paymentdata);echo "<br><br>";
                            $paymentid = make_mypayment($paymentdata,0,$isacceptnactive=1);
                            if ($paymentid) {
                                $whereData22 = array('id' => $pay->id);
                                $updatedata22 = array('my_transaction_id' => $paymentid, 'status' => 5, 'b2b_payment_status' => 1, 'b2b_payment_on' => date('Y-m-d'));
                                $result = updateTable('trip_book_pay_details', $whereData22, $updatedata22);
                                $whereData = array('id' => $pay->trip_id);
                                $trip_list = selectTable('trip_master', $whereData);
                                if ($trip_list->num_rows() > 0) {

                                    $triprow = $trip_list->row();

                                    $subject = 'You have received payment from Book Your Trip for PNR No: ' . $pay->pnr_no;
                                    $message = 'You have received payment from Book Your Trip for PNR No: '  . $pay->pnr_no . ' (' . $triprow->trip_code . ' / ' . $triprow->trip_name . ') from ' . site_title . '. '
                                            . '<a href="' . base_url() . 'my-transaction-reports">View Website</a>';
                                    $mailData = array(
                                        //'fromuserid' => $pnrinfo['trip_postbyid'],
                                        'bccemail' => admin_email. ',' . 'anjaneya.developer@gmail.com,',
                                        //'ccemail' => admin_email.','.email_bottem_email,
                                        'touserid' => $pay->user_id,
                                        //'toemail' => 'anjaneya.developer@gmail.com',
                                        'subject' => $subject,
                                        'message' => $message,
                                            //'othermsg' => $othermsg
                                    );

                                    sendemail_personalmail($mailData);
                                }
                            }
                            
//                            echo $pay->book_pay_id;
//                            exit();
                        }
                    }
                }
                $inWhereData = array('status', array(2, 4));
                $whereData = array('isactive' => 1, 'payment_status' => 1,'b2b_payment_status' => 0, 'id' => $book_pay->id);
                $trip_list = selectTable('trip_book_pay_details', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = '', $having = '', $limit = array(), $result_way = 'all', $echo = 0, $inWhereData, $notInWhereData = array());
                if ($trip_list->num_rows() < 1) {
                    $whereData22 = array('id' => $book_pay->id);
                    $updatedata22 = array('status' => 5, 'b2b_payment_status' => 1, 'b2b_payment_on' => date('Y-m-d'));
                    $result = updateTable('trip_book_pay', $whereData22, $updatedata22);
                }
            }
        }
        return FALSE;
    }

    public function reminderToCustomer() {
        $reminder_date7 = date('Y-m-d', strtotime(' +7 day'));
        //$reminder_date3 = date('Y-m-d', strtotime(' +3 day'));
        $reminder_date1 = date('Y-m-d', strtotime(' +1 day'));

        // reminder 7days b4
        $inWhereData = array('tpd.status', array(2, 4));
        $whereData = array('tm.isactive' => 1,'tpd.isactive' => 1, 'payment_status' => 1, 'tpd.date_of_trip_to' => $reminder_date7);
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
        $tableData = get_joins('trip_book_pay AS tpd', $columns, $joins, $whereData, $orWhereData = array(), $group = array(), $order = 'tpd.id ASC', $having = '', $limit = array(), $result_way = 'all', $echo = 0, $inWhereData);
        if ($tableData->num_rows() > 0) {
            $book_pay = $tableData->result();
            foreach ($book_pay as $row) {
                $book_pay_id = $row->id;
                $user_id = $row->user_id;
                $trip_id = $row->trip_id;
                $net_price = $row->net_price;
                $status = $row->status;
                $payment_status = $row->payment_status;
                $number_of_persons = $row->number_of_persons;
                $pnr_no = $row->pnr_no;
                
                $whereData = array('id' => $trip_id);
                $trip_list = selectTable('trip_master', $whereData);
                if ($trip_list->num_rows() < 1) {
                    return FALSE;
                }
                $row = $trip_list->row();
                $trip_code = $row->trip_code;
                $trip_name = $row->trip_name;
                $total_booking = $row->total_booking;

                $pnrinfo = getpnrinfo($pnr_no, '', 1);
                // TODO: need to send mail for pay sucess

                $subtotal_trip_price = $pnrinfo['subtotal_trip_price'] . ' ( ';
                if ($pnrinfo['no_of_adult'] > 0) {
                    $subtotal_trip_price .= $pnrinfo['no_of_adult'] . '*' . $pnrinfo['price_to_adult'];
                }
                if ($pnrinfo['no_of_child'] > 0) {
                    $subtotal_trip_price .= ', ' . $pnrinfo['no_of_child'] . '*' . $pnrinfo['price_to_child'];
                }
                if ($pnrinfo['no_of_infan'] > 0) {
                    $subtotal_trip_price .= ', ' . $pnrinfo['no_of_infan'] . '*' . $pnrinfo['price_to_infan'];
                }
                $subtotal_trip_price .= ')';
                $othermsg = '<tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">PNR Number :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['pnr_no'] . ' </p></div>
                                </td>
                            </tr><tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Trip Code / Name :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['trip_code'] . ' / ' . $pnrinfo['trip_name'] . ' </p></div>
                                </td>
                            </tr><tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">No Of Traveller :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['number_of_persons'] . ' </p></div>
                                </td>
                            </tr><tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Amount :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $subtotal_trip_price . ' </p></div>
                                </td>
                            </tr>';
                if ($pnrinfo['offer_amt'] != 0.00) {
                    $coupon_code = '';
                    if ($pnrinfo['coupon_code'] != '') {
                        $offer_type = '';
                        if (strpos($pnrinfo['percentage_amount'], '.00') !== false) {
                            $pnrinfo['percentage_amount'] = round($pnrinfo['percentage_amount']);
                        }
                        if ($pnrinfo['offer_type'] == 2) {
                            $offer_type = '%';
                        }
                        $specific_coupon_code = '';
                        if ($pnrinfo['specific_coupon_code'] != '' && $pnrinfo['coupon_code'] != $pnrinfo['specific_coupon_code']) {
                            $specific_coupon_code = $pnrinfo['specific_coupon_code'] . ', ';
                        }
                        $coupon_code = '(' . $specific_coupon_code . $pnrinfo['coupon_code'] . ')';
                        //$coupon_code = '<br>' . $pnrinfo['coupon_code'] . ' (' . $pnrinfo['percentage_amount'] . $offer_type . ' OFF)';
                    }
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Offer Amount :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['offer_amt'] . ' ' . $coupon_code . ' </p></div>
                                    </td>
                                </tr>';
                }
                if ($pnrinfo['gst_amt'] > 0) {
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">GST Amount (' . $pnrinfo['gst_percentage'] . '%) :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['gst_amt'] . ' </p></div>
                                    </td>
                                </tr>';
                }
                if ($pnrinfo['round_off'] != 0) {
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Round Off :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['round_off'] . ' </p></div>
                                    </td>
                                </tr>';
                }
                if ($pnrinfo['net_price'] != 0.00) {
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Paid Amount :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['net_price'] . ' </p></div>
                                    </td>
                                </tr>';
                }
                $othermsg .= '<tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Date of Trip :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['date_of_trip'] . ' ' . $pnrinfo['time_of_trip'] . ' </p></div>
                                </td>
                            </tr><tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Pick up location,<br>landmark :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['pick_up_location'] . ', ' . $pnrinfo['pick_up_location_landmark'] . ' </p></div>
                                </td>
                            </tr><tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Date of Trip End :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['date_of_trip_to'] . ' </p></div>
                                </td>
                            </tr>';
                if ($pnrinfo['total_days'] > 0) {
                    $how_many_nights = '';
                    if ($pnrinfo['how_many_nights'] > 0) {
                        $how_many_nights = $pnrinfo['how_many_nights'] . 'night(s)';
                    }
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Total Days :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['how_many_days'] . ' day(s), ' . $how_many_nights . '</p></div>
                                    </td>
                                </tr>';
                }
                if ($pnrinfo['how_many_hours'] > 0) {
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Total Hours :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['how_many_hours'] . ' </p></div>
                                    </td>
                                </tr>';
                }
                if ($pnrinfo['languages'] > 0) {
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Languages :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['languages'] . ' </p></div>
                                    </td>
                                </tr>';
                }
                if ($pnrinfo['meal'] > 0) {
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Meals :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['meal'] . ' </p></div>
                                    </td>
                                </tr>';
                }
                $othermsg .= '<tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Customer Name :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['booked_to'] . ' </p></div>
                                </td>
                            </tr><tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Contact Email :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['booked_email'] . ' </p></div>
                                </td>
                            </tr><tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Phone Number :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['booked_phone_no'] . ' </p></div>
                                </td>
                            </tr><tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Booked on :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['booked_on'] . ' </p></div>
                                </td>
                            </tr>';
                            if($pnrinfo['booked_comment']!=''){
                                $othermsg .='<tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Customer Comment :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['booked_comment'] . ' </p></div>
                                </td>
                            </tr>';
                            }
                if ($pnrinfo['brief_description'] != '') {
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;padding-top:0px;">
                                        <div class="f_img_div" style="width:100%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 22px;">Brief Description</p></div>

                                    </td>
                                </tr> 
                                <tr style=" line-height: 1.6; color: #333; font-size: 15px;">
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <p>' . html_entity_decode($pnrinfo['brief_description']) . '</p>

                                    </td>
                                </tr>';
                }
                if ($pnrinfo['confirmation_policy'] != '') {
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;padding-top:0px;">
                                        <div class="f_img_div" style="width:100%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 22px;">Confirmation Policy</p></div>

                                    </td>
                                </tr> 
                                <tr style=" line-height: 1.6; color: #333; font-size: 15px;">
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <p>' . html_entity_decode($pnrinfo['confirmation_policy']) . '</p>

                                    </td>
                                </tr>';
                }
                if ($pnrinfo['cancellation_policy'] != '') {
                    $cancellation_policylink = '';
                    if (isset($updatedata['status']) && isset($updatedata['payment_status']) && $updatedata['payment_status'] == 1 && $updatedata['status'] == 2) {
                        $cancellation_policylink = '<p><a href="' . base_url() . 'trip-cancel/' . $pnr_no . '/3" style="color:#00adef" target="_new">Click here to cancel the trip</a></p>';
                    }
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;padding-top:0px;">
                                        <div class="f_img_div" style="width:100%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 22px;">Cancellation Policy</p></div>

                                    </td>
                                </tr> 
                                <tr style=" line-height: 1.6; color: #333; font-size: 15px;">
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <p>' . html_entity_decode($pnrinfo['cancellation_policy']) . '</p>' . $cancellation_policylink . '

                                    </td>
                                </tr>';
                }
                if ($pnrinfo['refund_policy'] != '') {
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;padding-top:0px;">
                                        <div class="f_img_div" style="width:100%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 22px;">Refund Policy</p></div>

                                    </td>
                                </tr> 
                                <tr style=" line-height: 1.6; color: #333; font-size: 15px;">
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <p>' . html_entity_decode($pnrinfo['refund_policy']) . '</p>

                                    </td>
                                </tr>';
                }
                $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;padding-top:0px;">
                                        <div class="f_img_div" style="width:100%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 22px;">NEED BOOKING HELP?</p></div>

                                    </td>
                                </tr> 
                                <tr style=" line-height: 1.6; color: #333; font-size: 15px;">
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <p style="font-weight:600;">Email:' . $pnrinfo['trip_contactemail'] . '</p>
                                        <p style="font-weight:600;">Hotline: ' . $pnrinfo['trip_contactno'] . '</p>

                                    </td>
                                </tr>';
                $subject = 'Reminder about your PNR No ' . $pnr_no;
                $message = 'This automated message is a reminder to help you! Your trip <a href="' . base_url() . 'PNR-status/' . $pnr_no . '/1" style="color:#00adef" target="_new"><b>PNR No: ' . $pnr_no . '</b> ( Trip Code/Name: ' . $trip_code . ' / ' . $trip_name . ' )</a> at ' . site_title . '.';
                $mailData = array(
                    //'fromuserid' => $pnrinfo['trip_postbyid'],
                    'ccemail' => $pnrinfo['bookedby_contactemail'],
                    'bccemail' => admin_email . ',' . 'anjaneya.developer@gmail.com',
                    //'touserid' => $touserid,
                    'toemail' => $pnrinfo['booked_email'],
                    'subject' => $subject,
                    'message' => $message,
                    'othermsg' => $othermsg
                );
                sendemail_personalmail($mailData);
            }
        }
        
        
        // reminder 1days b4
        $inWhereData = array('tpd.status', array(2, 4));
        $whereData = array('tm.isactive' => 1,'tpd.isactive' => 1, 'payment_status' => 1, 'tpd.date_of_trip_to' => $reminder_date1);
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
        $tableData = get_joins('trip_book_pay AS tpd', $columns, $joins, $whereData, $orWhereData = array(), $group = array(), $order = 'tpd.id ASC', $having = '', $limit = array(), $result_way = 'all', $echo = 0, $inWhereData);
        if ($tableData->num_rows() > 0) {
            $book_pay = $tableData->result();
            foreach ($book_pay as $row) {
                $book_pay_id = $row->id;
                $user_id = $row->user_id;
                $trip_id = $row->trip_id;
                $net_price = $row->net_price;
                $status = $row->status;
                $payment_status = $row->payment_status;
                $number_of_persons = $row->number_of_persons;
                $pnr_no = $row->pnr_no;
                
                $whereData = array('id' => $trip_id);
                $trip_list = selectTable('trip_master', $whereData);
                if ($trip_list->num_rows() < 1) {
                    return FALSE;
                }
                $row = $trip_list->row();
                $trip_code = $row->trip_code;
                $trip_name = $row->trip_name;
                $total_booking = $row->total_booking;

                $pnrinfo = getpnrinfo($pnr_no, '', 1);
                // TODO: need to send mail for pay sucess

                $subtotal_trip_price = $pnrinfo['subtotal_trip_price'] . ' ( ';
                if ($pnrinfo['no_of_adult'] > 0) {
                    $subtotal_trip_price .= $pnrinfo['no_of_adult'] . '*' . $pnrinfo['price_to_adult'];
                }
                if ($pnrinfo['no_of_child'] > 0) {
                    $subtotal_trip_price .= ', ' . $pnrinfo['no_of_child'] . '*' . $pnrinfo['price_to_child'];
                }
                if ($pnrinfo['no_of_infan'] > 0) {
                    $subtotal_trip_price .= ', ' . $pnrinfo['no_of_infan'] . '*' . $pnrinfo['price_to_infan'];
                }
                $subtotal_trip_price .= ')';
                $othermsg = '<tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">PNR Number :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['pnr_no'] . ' </p></div>
                                </td>
                            </tr><tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Trip Code / Name :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['trip_code'] . ' / ' . $pnrinfo['trip_name'] . ' </p></div>
                                </td>
                            </tr><tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">No Of Traveller :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['number_of_persons'] . ' </p></div>
                                </td>
                            </tr><tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Amount :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $subtotal_trip_price . ' </p></div>
                                </td>
                            </tr>';
                if ($pnrinfo['offer_amt'] != 0.00) {
                    $coupon_code = '';
                    if ($pnrinfo['coupon_code'] != '') {
                        $offer_type = '';
                        if (strpos($pnrinfo['percentage_amount'], '.00') !== false) {
                            $pnrinfo['percentage_amount'] = round($pnrinfo['percentage_amount']);
                        }
                        if ($pnrinfo['offer_type'] == 2) {
                            $offer_type = '%';
                        }
                        $specific_coupon_code = '';
                        if ($pnrinfo['specific_coupon_code'] != '' && $pnrinfo['coupon_code'] != $pnrinfo['specific_coupon_code']) {
                            $specific_coupon_code = $pnrinfo['specific_coupon_code'] . ', ';
                        }
                        $coupon_code = '(' . $specific_coupon_code . $pnrinfo['coupon_code'] . ')';
                        //$coupon_code = '<br>' . $pnrinfo['coupon_code'] . ' (' . $pnrinfo['percentage_amount'] . $offer_type . ' OFF)';
                    }
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Offer Amount :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['offer_amt'] . ' ' . $coupon_code . ' </p></div>
                                    </td>
                                </tr>';
                }
                if ($pnrinfo['gst_amt'] > 0) {
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">GST Amount (' . $pnrinfo['gst_percentage'] . '%) :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['gst_amt'] . ' </p></div>
                                    </td>
                                </tr>';
                }
                if ($pnrinfo['round_off'] != 0) {
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Round Off :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['round_off'] . ' </p></div>
                                    </td>
                                </tr>';
                }
                if ($pnrinfo['net_price'] != 0.00) {
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Paid Amount :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['net_price'] . ' </p></div>
                                    </td>
                                </tr>';
                }
                $othermsg .= '<tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Date of Trip :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['date_of_trip'] . ' ' . $pnrinfo['time_of_trip'] . ' </p></div>
                                </td>
                            </tr><tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Pick up location,<br>landmark :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['pick_up_location'] . ', ' . $pnrinfo['pick_up_location_landmark'] . ' </p></div>
                                </td>
                            </tr><tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Date of Trip End :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['date_of_trip_to'] . ' </p></div>
                                </td>
                            </tr>';
                if ($pnrinfo['total_days'] > 0) {
                    $how_many_nights = '';
                    if ($pnrinfo['how_many_nights'] > 0) {
                        $how_many_nights = $pnrinfo['how_many_nights'] . 'night(s)';
                    }
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Total Days :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['how_many_days'] . ' day(s), ' . $how_many_nights . '</p></div>
                                    </td>
                                </tr>';
                }
                if ($pnrinfo['how_many_hours'] > 0) {
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Total Hours :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['how_many_hours'] . ' </p></div>
                                    </td>
                                </tr>';
                }
                if ($pnrinfo['languages'] > 0) {
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Languages :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['languages'] . ' </p></div>
                                    </td>
                                </tr>';
                }
                if ($pnrinfo['meal'] > 0) {
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Meals :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['meal'] . ' </p></div>
                                    </td>
                                </tr>';
                }
                $othermsg .= '<tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Customer Name :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['booked_to'] . ' </p></div>
                                </td>
                            </tr><tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Contact Email :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['booked_email'] . ' </p></div>
                                </td>
                            </tr><tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Phone Number :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['booked_phone_no'] . ' </p></div>
                                </td>
                            </tr><tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Booked on :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['booked_on'] . ' </p></div>
                                </td>
                            </tr>';
                            if($pnrinfo['booked_comment']!=''){
                                $othermsg .='<tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Customer Comment :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['booked_comment'] . ' </p></div>
                                </td>
                            </tr>';
                            }
                if ($pnrinfo['brief_description'] != '') {
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;padding-top:0px;">
                                        <div class="f_img_div" style="width:100%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 22px;">Brief Description</p></div>

                                    </td>
                                </tr> 
                                <tr style=" line-height: 1.6; color: #333; font-size: 15px;">
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <p>' . html_entity_decode($pnrinfo['brief_description']) . '</p>

                                    </td>
                                </tr>';
                }
                if ($pnrinfo['confirmation_policy'] != '') {
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;padding-top:0px;">
                                        <div class="f_img_div" style="width:100%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 22px;">Confirmation Policy</p></div>

                                    </td>
                                </tr> 
                                <tr style=" line-height: 1.6; color: #333; font-size: 15px;">
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <p>' . html_entity_decode($pnrinfo['confirmation_policy']) . '</p>

                                    </td>
                                </tr>';
                }
                if ($pnrinfo['cancellation_policy'] != '') {
                    $cancellation_policylink = '';
                    if (isset($updatedata['status']) && isset($updatedata['payment_status']) && $updatedata['payment_status'] == 1 && $updatedata['status'] == 2) {
                        $cancellation_policylink = '<p><a href="' . base_url() . 'trip-cancel/' . $pnr_no . '/3" style="color:#00adef" target="_new">Click here to cancel the trip</a></p>';
                    }
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;padding-top:0px;">
                                        <div class="f_img_div" style="width:100%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 22px;">Cancellation Policy</p></div>

                                    </td>
                                </tr> 
                                <tr style=" line-height: 1.6; color: #333; font-size: 15px;">
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <p>' . html_entity_decode($pnrinfo['cancellation_policy']) . '</p>' . $cancellation_policylink . '

                                    </td>
                                </tr>';
                }
                if ($pnrinfo['refund_policy'] != '') {
                    $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;padding-top:0px;">
                                        <div class="f_img_div" style="width:100%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 22px;">Refund Policy</p></div>

                                    </td>
                                </tr> 
                                <tr style=" line-height: 1.6; color: #333; font-size: 15px;">
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <p>' . html_entity_decode($pnrinfo['refund_policy']) . '</p>

                                    </td>
                                </tr>';
                }
                $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;padding-top:0px;">
                                        <div class="f_img_div" style="width:100%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 22px;">NEED BOOKING HELP?</p></div>

                                    </td>
                                </tr> 
                                <tr style=" line-height: 1.6; color: #333; font-size: 15px;">
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <p style="font-weight:600;">Email:' . $pnrinfo['trip_contactemail'] . '</p>
                                        <p style="font-weight:600;">Hotline: ' . $pnrinfo['trip_contactno'] . '</p>

                                    </td>
                                </tr>';
                $subject = 'Reminder about your PNR No ' . $pnr_no;
                $message = 'This automated message is a reminder to help you! Your trip <a href="' . base_url() . 'PNR-status/' . $pnr_no . '/1" style="color:#00adef" target="_new"><b>PNR No: ' . $pnr_no . '</b> ( Trip Code/Name: ' . $trip_code . ' / ' . $trip_name . ' )</a> at ' . site_title . '.';
                $mailData = array(
                    //'fromuserid' => $pnrinfo['trip_postbyid'],
                    'ccemail' => $pnrinfo['bookedby_contactemail'],
                    'bccemail' => admin_email . ',' . 'anjaneya.developer@gmail.com',
                    //'touserid' => $touserid,
                    'toemail' => $pnrinfo['booked_email'],
                    'subject' => $subject,
                    'message' => $message,
                    'othermsg' => $othermsg
                );
                sendemail_personalmail($mailData);
            }
        }
        return FALSE;
    }

    public function searchAutoSuggestion() {
        $result = [];

        $query = $this->input->post('query', true);

        if (!empty($query)) {
            $this->db->select('location')->from('pick_up_location_map')
                    ->where(array('isactive' => 1))
                    ->like('location', $query)->group_by("location");
            $query = $this->db->get();
            $re = $query->result_array();

            if (count($re) > 0) {
                $result = array_column($re, 'location');
            }
        }
        echo json_encode($result);
        exit;
    }

}
