<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Master_model');
    }

    public function category_list($category_search = '') {
        if ($this->session->userdata('user_id') == '' || $this->session->userdata('user_type') != 'SA') {
            redirect('login');
        }
        $categorysearch = trim($this->input->post('category_search'));
        if ($categorysearch != '') {
            $category_search = $categorysearch;
        }
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . "category-master/" . $category_search; //?search=".$category_search
        $config["total_rows"] = $this->Master_model->category_count($category_search);
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
        $data["categorylist"] = $this->Master_model->category_list($config["per_page"], $page, $category_search);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data["category_search"] = $category_search;
        $this->load->view('master/category/category-list', $data);
    }

    public function loadmodal($view) {
        if ($this->session->userdata('user_id') == '' || $this->session->userdata('user_type') != 'SA') {
            return FALSE;
        }
        if ($view != "") {
            $data = array();
            if (isset($_POST)) {
                foreach ($_POST as $key => $value) {
                    $data[$key] = $value;
                }
            }
            $this->load->view("master/category/$view", $data);
        } else {
            echo "Error";
        }
    }

    public function category_add() {
        if ($this->session->userdata('user_id') == '' || $this->session->userdata('user_type') != 'SA') {
            return FALSE;
        }
        if ($_POST) {
            $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');
            if ($this->form_validation->run($this) != FALSE) {
                $id = trim($this->input->post('id'));
                $name = ucwords(trim($this->input->post('category_name')));
                $whereData = array('isactive' => 1, 'name' => $name);
                $trip_category_list = selectTable('trip_category', $whereData);
                if ($trip_category_list->num_rows() > 0) {
                    echo 'Sorry! All ready exist this name.';
                    return FALSE;
                }
                $data = array(
                    'id' => $id,
                    'name' => $name,
                    'isactive' => 1);
                $category_id = $this->Master_model->category_insert($data);
                if ($category_id) {
                    return TRUE;
                }
            }
        }
        echo 'Sorry! Try again...';
        return FALSE;
    }

    public function category_edit() {
        if ($this->session->userdata('user_id') == '' || $this->session->userdata('user_type') != 'SA') {
            redirect('login');
        }
        if ($_POST) {
            $id = trim($this->input->post('id'));

            $data = array('id' => $id);
            $data['categorydetail'] = $this->Master_model->category_detail($data);
            //$this->Master_model->category_update($data,$id);
            $this->load->view('master/category/category-edit', $data);
        }
    }

    public function category_save_edit() {
        if ($this->session->userdata('user_id') == '' || $this->session->userdata('user_type') != 'SA') {
            return FALSE;
        }
        if ($_POST) {
            $id = trim($this->input->post('category_id'));
            $name = trim($this->input->post('category_name'));

            $where = array('id' => $id);
            $data = array('name' => $name);
            $result = $this->Master_model->category_update($data, $where);
            if ($result) {
                return TRUE;
            }
        }
        echo 'Sorry! Try again...';
        return FALSE;
    }

    public function category_delete($id) {
        if ($this->session->userdata('user_id') == '' || $this->session->userdata('user_type') != 'SA') {
            redirect('login');
        }
        $where = array('id' => $id);
        $data = array('isactive' => 0);
        $this->Master_model->category_update($data, $where);
        redirect('category-master');
    }

    public function category_active($id) {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        $where = array('id' => $id);
        $data = array('isactive' => 1);
        $this->Master_model->category_update($data, $where);
        redirect('category-master');
    }

    public function coupon_code_list($coupon_code_search = '', $offer_type = '') {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        $couponcodesearch = trim($this->input->post('coupon_code_search'));
        $offertype = trim($this->input->post('offer_type'));
        $type = trim($this->input->get('type'));
        if ($offertype != '') {
            $offer_type = $offertype;
        }
        if ($couponcodesearch != '') {
            $coupon_code_search = $couponcodesearch;
        }
        if ($type != '') {
            $offer_type = $type;
        }
        $coupon_code_search = $this->security->xss_clean($coupon_code_search);
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . "coupon-code-master/" . $coupon_code_search . "?type=" . $offer_type;
        $config["total_rows"] = $this->Master_model->coupon_code_count($coupon_code_search, $offer_type);
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
        $data["couponcodelist"] = $this->Master_model->coupon_code_list($config["per_page"], $page, $coupon_code_search, $offer_type);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data["coupon_code_search"] = $coupon_code_search;
        $data["offer_type"] = $offer_type;
        $this->load->view('master/coupon-code/coupon-code-list', $data);
    }

    public function couponcodeaddmaster() {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
        $loginuserid = $this->session->userdata('user_id');
        $whereData = array('isactive' => 1, 'user_id' => $loginuserid);
        $data['trip_list'] = selectTable('trip_master', $whereData);
        if ($this->session->userdata('user_type') == 'SA') {
            $whereData = array('isactive' => 1);
            $data['category_list'] = selectTable('trip_category', $whereData);
        }

        $this->load->view("master/coupon-code/coupon-code-add", $data);
    }

    public function couponcode_vaildation() {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
        $couponcode = trim($this->input->post('couponcode'));
        $check = $this->Master_model->category_count($couponcode);
        if ($check == 0) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public function gettripinfo() {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
        if ($_POST) {
            $this->form_validation->set_rules('tripid', 'tripid', 'trim|required');
            if ($this->form_validation->run($this) != FALSE) {
                $loginuserid = $this->session->userdata('user_id');
                extract($this->input->post());
                $whereData = array('isactive' => 1, 'id' => $tripid, 'user_id' => $loginuserid);
                $trip_info = selectTable('trip_master', $whereData);
                $data['pnrinfo'] = $trip_info->row();
                $this->load->view("master/coupon-code/gettripinfo", $data);
            }
        }
    }

    //code
    public function coupon_code_add() {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
        if ($_POST) {
            $this->form_validation->set_rules('couponcode', 'Category Name', 'trim|required');
            $this->form_validation->set_rules('couponname', 'Category Name', 'trim|required');
            $this->form_validation->set_rules('fromdate', 'Category Name', 'trim|required');
            $this->form_validation->set_rules('todate', 'Category Name', 'trim|required');
            $this->form_validation->set_rules('coupontype', 'Category Name', 'trim|required');
            $this->form_validation->set_rules('offertype', 'Category Name', 'trim|required');
            $this->form_validation->set_rules('offeramount', 'Category Name', 'trim|required');
            if ($this->form_validation->run($this) != FALSE) {
                $user_id = $this->session->userdata('user_id');
                extract($this->input->post());
                $data = array(
                    'coupon_code' => strtoupper($couponcode),
                    'coupon_name' => ucfirst($couponname),
                    'comment' => ucfirst($comment),
                    'category_id' => isset($category_id) ? $category_id : 0,
                    'validity_from' => date("Y-m-d", strtotime($fromdate)),
                    'validity_to' => date("Y-m-d", strtotime($todate)),
                    'type' => $coupontype,
                    'offer_type' => $offertype,
                    'percentage_amount' => $offertype == 2 ? round($offeramount) : $offeramount,
                    'trip_id' => isset($tripname) ? $tripname : 0,
                    'price_to_adult' => $price_to_adult,
                    'price_to_child' => $price_to_child,
                    'price_to_infan' => $price_to_infan,
                    'user_id' => $user_id,
                    'isactive' => 1);
                $coupon_code_id = insertTable('coupon_code_master', $data);
                if ($coupon_code_id) {
                    $data['coupon_code_id'] = $coupon_code_id;
                    $couponcodehistory_id = insertTable('coupon_code_master_history', $data);
                    return TRUE;
                }
            }
        }
        echo 'Sorry! Try again...';
        return FALSE;
    }

    public function coupon_code_edit() {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
        if ($_POST) {
            $loginuserid = $this->session->userdata('user_id');
            $id = trim($this->input->post('id'));

            $data = array('id' => $id);
            $data['coupondetail'] = $this->Master_model->coupon_code_detail($data);
            $whereData = array('isactive' => 1, 'user_id' => $loginuserid);
            $trip_list = selectTable('trip_master', $whereData);
            if ($trip_list->num_rows() > 0) {
                $whereData = array('isactive' => 1, 'id' => $data['coupondetail']['trip_id'], 'user_id' => $loginuserid);
                $trip_info = selectTable('trip_master', $whereData);
                $data['pnrinfo'] = $trip_info->row();
            }
            $data['trip_list'] = $trip_list;
            if ($this->session->userdata('user_type') == 'SA') {
                $whereData = array('isactive' => 1);
                $data['category_list'] = selectTable('trip_category', $whereData);
            }
            $this->load->view('master/coupon-code/coupon-code-edit', $data);
        }
    }

    public function coupon_code_save_edit() {
        if ($this->session->userdata('user_id') == '') {
            return FALSE;
        }
        if ($_POST) {
            $this->form_validation->set_rules('coupon_id', 'coupon id', 'trim|required');
            $this->form_validation->set_rules('couponcode', 'Category Name', 'trim|required');
            $this->form_validation->set_rules('couponname', 'Category Name', 'trim|required');
            $this->form_validation->set_rules('fromdate', 'Category Name', 'trim|required');
            $this->form_validation->set_rules('todate', 'Category Name', 'trim|required');
            $this->form_validation->set_rules('coupontype', 'Category Name', 'trim|required');
            $this->form_validation->set_rules('offertype', 'Category Name', 'trim|required');
            $this->form_validation->set_rules('offeramount', 'Category Name', 'trim|required');
            if ($this->form_validation->run($this) != FALSE) {
                $user_id = $this->session->userdata('user_id');
                extract($this->input->post());

                $where = array('id' => $coupon_id, 'user_id' => $user_id);
                $data = array(
                    'coupon_code' => strtoupper($couponcode),
                    'coupon_name' => ucfirst($couponname),
                    'comment' => ucfirst($comment),
                    'category_id' => isset($category_id) ? $category_id : 0,
                    'validity_from' => date("Y-m-d", strtotime($fromdate)),
                    'validity_to' => date("Y-m-d", strtotime($todate)),
                    'type' => $coupontype,
                    'offer_type' => $offertype,
                    'percentage_amount' => $offertype == 2 ? round($offeramount) : $offeramount,
                    'trip_id' => isset($tripname) ? $tripname : 0,
                    'price_to_adult' => $price_to_adult,
                    'price_to_child' => $price_to_child,
                    'price_to_infan' => $price_to_infan);
                $result = $this->Master_model->coupon_code_update($data, $where);
                $data['coupon_code_id'] = $coupon_id;
                $data['user_id'] = $user_id;
                $data['isactive'] = 1;
                $couponcodehistory_id = insertTable('coupon_code_master_history', $data);

                if ($result) {
                    return TRUE;
                }
            }
        }
        echo 'Sorry! Try again...';
        return FALSE;
    }

    public function coupon_code_delete($id) {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        $where = array('id' => $id);
        $data = array('isactive' => 0);
        $this->Master_model->coupon_code_update($data, $where);
        $where = array('coupon_code_id' => $id);
        $this->Master_model->coupon_code_history_update($data, $where);
        redirect('coupon-code-master');
    }

    public function coupon_code_active($id) {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        $where = array('id' => $id);
        $data = array('isactive' => 1);
        $this->Master_model->coupon_code_update($data, $where);
        $where = array('coupon_code_id' => $id);
        $this->Master_model->coupon_code_history_update($data, $where);
        redirect('coupon-code-master');
    }

    public function checkhelper() {
        $this->load->helper('custom_helper');
//        $pnrinfo = array(
//                    'pnr_no' => 'PNR100VCNHF',  
//                    'refund_date' =>  '13-10-2018',
//                    'return_notes' =>  'Paid to your bank in NEFT',
//                    'refund_percentage' =>  50); 
//       $result = cancelled_trip_refund_amount($pnrinfo);
//       print_r($result);exit();
       //echo $totalbookedpersons = checktripavailable(6,'30-09-2018');
//       $totalbookedpersons = checktripavailable(6,'30-09-2018');
//         print_r($totalbookedpersons);exit();
        //$parent_arr=getallparenttrip(7);
        //$child_arr=getallchildtrip(7);
//        $child_arr=getparentchildtrip(6);
//        print_r($child_arr);exit();
//        $updatedata = array(
//                                    'payment_type' => 1,  // 1 - net, 2 - credit, 3 - debit
//                                    'payment_status' =>  1,
//                                    'status' =>  2); 
//
//                            trip_book_paid_sucess($updatedata,'PNR92GYHW21');
//                            exit();
//        $toemail='anjaneya.developer@gmail.com';
//        $subject='Welcome to trip';
//        $message='This is test msg';
//        $mailData = array(
//        //'fromuserid' => 1,
//        //'touserid' => 10,  use touserid or toemail
//        'toemail' => $toemail,
//        'subject' => $subject,
//        'message' => $message,
//        //'othermsg' => ''
//        );
//        
//        sendemail_personalmail($mailData);
//        exit();
//        $tripid=3;
//        $result = getallparenttrip($tripid);
//        print_r($result);
//        exit();
//        
//           $pnr_no='PNR100VCNHF';$phoneno='9688079118';
//           $result =  getpnrinfo($pnr_no,'', 1);
//            print_r($result);
//        
//        
//        if ($this->session->userdata('user_id') == '') {
//            return FALSE;
//        }
//        $offerdata=array(
//        'trip_id' => 7,
//        'date_of_trip' => "30-09-2018",
//        'ischeckadmin' => 1); 
//        $result = trip_offer($offerdata);
//        print_r($result);
        exit();
        $bookdata=array(
        'trip_id' => 2, //15, 13
        'book_user_id' => 81, //81, 99
        'no_of_adult' => 1,
        'no_of_child' => 0,
        'no_of_infan' => 0,
        'date_of_trip' => "Feb 8, 2019",
        'pick_up_location_id' => 11,
        'booked_to' => 'Raja',
        'booked_email' => 'raja@mail.com',
        'booked_phone_no' => '9876543210',
        'booked_comment' => 'Test book'); //39, 37
        $result = trip_book($bookdata,'',1);//COUPONOFFER50PER, cash
        print_r($result);
//        $loginuser_id = $this->session->userdata('user_id');
//                                echo $mypayment = checkbal_mypayment($loginuser_id, 2);
////        
    }
    public function mypayment() {
        //$this->load->helper('custom_helper');
         
       // withdrawal Request
//        $paymentdata = array(
//        'userid' => 1,
//        'transaction_notes' => 'Cash Withdrawal Request',
//        'withdrawal_request_amt' => 250,
//        'b2b_pay_account_info' => 1,
//        'status' => 0);
//        //$status = 1 withdrawal Request, 2 withdrawal
//        make_mypayment($paymentdata, 1);
//        
//        // withdrawal
//        $paymentdata = array(
//        'userid' => 1,
//        'transaction_notes' => 'Cash Withdrawal',
//        'withdrawals' => 250,
//        'withdrawal_notes' => "We are transfted",
//        'withdrawal_paid_on' => "10-09-2018",
//        'b2b_pay_account_info' => 1,
//        'status' => 2,
//        'withdrawal_request_id' => 6); // withdrawal_request_id - id in my_transaction table
//        //$status = 1 withdrawal Request, 2 withdrawal
//        make_mypayment($paymentdata, 2);
        
        // ticket book B2c to Admin
        
      //  Cash Deposited
//        $paymentdata = array(
//        'userid' => 1,
//        'transaction_notes' => 'Cash Deposited',
//        'from_userid' => -1,
//        'book_pay_id' => 0,
//        'book_pay_details_id' => 0,
//        'pnr_no' => '',
//        'trip_id' => 0,
//        'deposits' => 3098,
//        'status' => 2);
//        make_mypayment($paymentdata);
//        //B2c to Admin
//        $paymentdata = array(
//        'userid' => 0,
//        'transaction_notes' => 'Trip has been booked PNR826YTZGV / TRIPFGSbgNw / North Goa Sightseeing Full Day Tour',
//        'book_pay_id' => 1,
//        'book_pay_details_id' => 0,
//        'pnr_no' => 'PNR826YTZGV',
//        'from_userid' => 1,
//        'trip_id' => 1,
//        'deposits' => 3098,
//        'status' => 2);
//        make_mypayment($paymentdata);
        
        
        //cancelled ticket b2b to customer
        //$paymentdata = array(
//        'userid' => 1, // customer userid
//        'transaction_notes' => 'Cash Withdrawal - Trip has been cancelled PNR826YTZGV / TRIPFGSbgNw / North Goa Sightseeing Full Day Tour',
//        'deposits' => 1950,
//        'from_userid' => 3, // vendor userid
//        'book_pay_id' => 1,
//        'book_pay_details_id' => 0,
//        'pnr_no' => 'PNR826YTZGV',
//        'trip_id' => 1,
//        'withdrawal_notes' => "We are transfted",
//        'withdrawal_paid_on' => "10-09-2018",
//        'b2b_pay_account_info' => 1,
//        'status' => 2,
//        'withdrawal_request_id' => 0); // withdrawal_request_id - id in my_transaction table
//        make_mypayment($paymentdata);
//        
//        
//        
//         ticket book Admin to b2b, b2b to b2b
//        $paymentdata = array(
//        'userid' => 3,  // b2b
//        'transaction_notes' => 'Trip has been booked PNR826YTZGV / TRIPFGSbgNw / North Goa Sightseeing Full Day Tour',
//        'book_pay_id' => 1,
//        'book_pay_details_id' => 1,
//        'pnr_no' => 'PNR826YTZGV',
//        'from_userid' => 0,  // default -1  //admin / b2b
//        'trip_id' => 1,
//        'deposits' => 3036,
//        'status' => 2);
//        make_mypayment($paymentdata);
        
      // echo checkbal_mypayment(1,2);
        
//        $pnr = 'PNR64XSNYGR';
//        $paymentdata = array(
//            'userid' => 87,
//            'transaction_notes' => 'Trip has been booked ' . $pnr,
//            'withdrawal_notes' => 'Office Booking PNR' . $pnr,
//            'pnr_no' => $pnr,
//            'from_userid' => 87,
//            'deposits' => 20,
//            'status' => 2);
//        make_mypayment($paymentdata);
        
    }

}
