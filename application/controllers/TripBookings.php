<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TripBookings extends CI_Controller {

    public function book_summary($tripCode = null) {

        //if ($this->session->userdata('user_id') == '' ) {redirect('login');}

        $data = [];
        if (!empty($tripCode)) {
            $this->load->model('Trip_model');
            //$this->load->helper('custom_helper');
            //
            
            //CALENDAR DETAILS
            $data['from_date'] = $this->session->userdata('bk_from_date');
            $data['to_date'] = $this->session->userdata('bk_to_date');
            $data['location'] = $this->session->userdata('bk_location');
            $data['no_of_adult'] = $this->session->userdata('bk_no_of_adult');
            $data['no_of_children'] = $this->session->userdata('bk_no_of_children');
            $data['no_of_infan'] = $this->session->userdata('bk_no_of_infan');
            $data['total_traveller'] = $data['no_of_adult'] + $data['no_of_children'] + $data['no_of_infan'];
            $data['user_fullname'] = $this->session->userdata('name');
            $data['user_email'] = $this->session->userdata('user_email');
            $data['user_phone'] = $this->session->userdata('user_phone');
            $data['usecouponcode'] = $this->session->userdata('bk_usecouponcode');
            if ($data['usecouponcode'] == 'undefined') {
                $data['usecouponcode'] = '';
            }
            //GENERAL DETAILS
            $data['details'] = $this->Trip_model->getDetails($tripCode);

            if (isset($data['details']['id'])) {
                //REVIEW COUNT
                $data['review_count'] = $this->Trip_model->getTotalReview($data['details']['id']);

                //PICKUP
                $data['pickups'] = $this->Trip_model->getPickupLocations($data['details']['id']);

                $data['available_days'] = $this->Trip_model->getAvailableDays($data['details']['id']);

                $data['cutoff_disable_days'] = $this->Trip_model->getCutoffDaysTime($data['details']['created_on'], $data['details']['booking_cut_of_time_type'], $data['details']['booking_cut_of_day'], $data['details']['booking_cut_of_time'], $data['details']['meeting_time']);

                $data['cutoff_max_month'] = $this->Trip_model->getCutoffMonth($data['details']['created_on'], $data['details']['booking_max_cut_of_month']);
                $data['disable_date_enable'] = $this->Trip_model->getTripEnableBooking($data['details']['id']);

                $offerdata = array(
                    'trip_id' => $data['details']['id'],
                    'parenttrip_id' => $data['details']['id'],
                    'date_of_trip' => $this->session->userdata('bk_from_date'),
                    'ischeckadmin' => 1);
                if ($this->session->userdata('user_type') == 'VA') {
                    $offerdata['ischeckadmin'] = 0;
                }
                $data['usecouponcode_msg'] = '';
                $data['cus_coupon_code'] = '';
                $data['cus_coupon_name'] = '';
                $data['cus_coupon_type'] = '';
                $data['cus_coupon_price'] = '';
                $data['cus_coupon_percentage'] = '';
                $data['offer_details'] = trip_offer($offerdata, $data['usecouponcode']);
                // echo "<pre>"; print_r($data['offer_details']);exit;
                $parenttrip_id = $data['details']['id'];
                $date_of_trip = formatdate($this->session->userdata('bk_from_date'), $format = 'Y-m-d');
                $discount_your_price = 0;
                if (isset($data['offer_details']['is_open']) && $data['offer_details']['is_open'] == 1) {
                    $number_of_persons = $data['total_traveller'];
                    // check traveller valid
                    if ($data['offer_details']['availabletraveller'] >= $number_of_persons || ($data['offer_details']['no_of_min_booktraveller'] <= $number_of_persons || $data['offer_details']['no_of_max_booktraveller'] >= $number_of_persons)) {

                        $parenttrip = getallparenttrip($data['details']['id']);
                        //echo '<br><br>';print_r($parenttrip);
                        $parent_trip_id = 0;
                        $trip_user_id = 0;
                        $vendor_amt = 0;
                        $your_final_amt = 0;
                        $parentservicecharge = 0;
                        $inWhereData = array('id', $parenttrip);
                        $whereData = array('isactive' => 1);
                        $trip_list = selectTable('trip_master', $whereData = array(), $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id ASC', $having = '', $limit = array(), $result_way = 'all', $echo = 0, $inWhereData, $notInWhereData = array());
                        if ($trip_list->num_rows() > 0) {
                            foreach ($trip_list->result() as $row) {
                                $trip_id = $row->id;
                                $user_id = $row->user_id;
                                $parent_trip_id = $row->parent_trip_id;
                                $trip_user_id = $row->user_id;
                                $discount_percentage = 0;
                                $discount_price = 0;
                                $your_amt = 0;
                                $offer_amt = 0;
                                $coupon_history_id = 0;
                                $total_adult_price = 0;
                                $total_child_price = 0;
                                $total_infan_price = 0;
                                $subtotal_trip_price = 0;
                                $specific_discount_price = 0;
                                $specific_discount_percentage = 0;
                                $specific_offer_amt = 0;
                                $your_final_amt_temp = 0;
                                //check offer
                                $offerdata = array(
                                    'trip_id' => $trip_id,
                                    'parenttrip_id' => $data['details']['id'],
                                    'date_of_trip' => $date_of_trip,
                                    'ischeckadmin' => 2); //default= 1 - if 1 check super admin offer, 2 - vendor offer, 0 - customer offer check
                                if ($trip_id == $data['details']['id']) {
                                    $offerdata['ischeckadmin'] = 2;
                                }
                                $checkoffer = trip_offer($offerdata);
                                //echo '<br><br>'; print_r($checkoffer);
                                $number_of_persons = $data['total_traveller'];
                                $total_adult_price = $data['no_of_adult'] * $checkoffer['price_to_adult'];
                                $total_child_price = $data['no_of_children'] * $checkoffer['price_to_child'];
                                $total_infan_price = $data['no_of_infan'] * $checkoffer['price_to_infan'];
                                $subtotal_trip_price = (int) $total_adult_price + (int) $total_child_price + (int) $total_infan_price;

                                // get offer
                                if ($checkoffer['offer_type'] == 1) {
                                    $discount_price = $checkoffer['discount_price'];
                                    $offer_amt = (int) $checkoffer['discount_price'] * (int) $number_of_persons;
                                }
                                if ($checkoffer['offer_type'] == 2 && $checkoffer['discount_percentage'] != '0.00') {
                                    $discount_percentage = $checkoffer['discount_percentage'];
                                    if (strpos($discount_percentage, '.00') !== false) {
                                        $discount_percentage = round($discount_percentage);
                                    }
                                    $offer_amt = (int) $subtotal_trip_price * ((int) $discount_percentage / 100);
                                }
                                // get offer for Specific Customer Offer
                                if ($checkoffer['specific_offer_type'] == 1) {
                                    $specific_discount_price = $checkoffer['specific_discount_price'];
                                    $specific_offer_amt = $checkoffer['specific_discount_price'] * (int) $number_of_persons;
                                }
                                if ($checkoffer['specific_offer_type'] == 2 && $checkoffer['specific_discount_percentage'] != '0.00') {
                                    $specific_discount_percentage = $checkoffer['specific_discount_percentage'];
                                    if (strpos($specific_discount_percentage, '.00') !== false) {
                                        $specific_discount_percentage = round($specific_discount_percentage);
                                    }
                                    $specific_offer_amt = (int) $subtotal_trip_price * ((int) $specific_discount_percentage / 100);
                                }
                                //add  offer_amt + $specific_offer_amt
                                $offer_amt = $specific_offer_amt + $offer_amt;
                                if ($checkoffer['coupon_history_id'] == 0) {
                                    $checkoffer['coupon_history_id'] = $checkoffer['specific_coupon_history_id'];
                                    $checkoffer['specific_coupon_history_id'] = 0;
                                }
                                $total_trip_price = (int) $subtotal_trip_price - (int) $offer_amt;

                                //$vendor_amt = $total_trip_price;
                                $net_price = (int) $total_trip_price - (int) $vendor_amt;
                                $servicecharge_amt = $net_price * (SERVICECHARGE_PERCENTAGE / 100);
                                if ($servicecharge_amt < SERVICECHARGE_AMT) {// get max amt
                                    $servicecharge_amt = SERVICECHARGE_AMT;
                                }
                                if ($trip_id == $parenttrip_id) {
                                    $servicecharge_amt = SERVICECHARGE_AMT;
                                }
                                $your_amt = (int) $net_price - (int) $servicecharge_amt;
//                                if($your_amt<1){
//                                    $parentservicecharge=$parentservicecharge + ($your_amt * -1);
//                                    $your_amt = 0;
//                                }
                                $gst_amt = $your_amt * (GST_PERCENTAGE / 100);
                                $your_final_amt_temp = (int) $your_amt + (int) $gst_amt;
                                $round_off = round($your_final_amt_temp) - ($your_final_amt_temp);
                                $your_final_amt = (int) $round_off + (int) $your_final_amt_temp;
                                if ($trip_id == $parenttrip_id) {
                                    $discount_your_price = $your_final_amt;
                                }
                                $vendor_amt = $total_trip_price;
                                if ($vendor_amt < 0) {
                                    $vendor_amt *= -1;
                                }
                            }
                        }
                    }
                    //SET REDIRECT URL
                    if (empty($this->session->userdata('user_type'))) {
                        $redirect_url = $this->uri->segment(1) . '/' . $this->uri->segment(2);
                        $this->session->set_userdata('last_url', $redirect_url);
                    }
                }
                $data['parent_trip'] = 1;
                if ($your_amt < 0) {
                    $your_amt *= -1;
                    $your_amt = $your_amt - SERVICECHARGE_AMT - SERVICECHARGE_AMT;
                } else {
                    $data['parent_trip'] = 0;
                }
                $data['your_amt'] = $your_amt - $parentservicecharge; //echo $data['your_amt'];exit();
                $data['discount_your_price'] = $discount_your_price;
                if ($data['discount_your_price'] < 0) {
                    $data['discount_your_price'] = -SERVICECHARGE_AMT;
                }
                if ($this->session->userdata('user_type') != 'VA') {
                    $data['discount_your_price'] = 0;
                }
                if ($data['usecouponcode'] != '') {
                    $data['cus_coupon_code'] = '';
                    $data['cus_coupon_name'] = '';
                    $data['cus_coupon_type'] = 0;
                    $data['cus_percentage_amount'] = 0;
                    $whereData = array('isactive' => 1, 'type' => 4, 'trip_id' => $data['details']['id'], 'coupon_code' => $data['usecouponcode'], 'validity_from <=' => $date_of_trip, 'validity_to >=' => $date_of_trip);
                    $couponhistory_list = selectTable('coupon_code_master_history', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC');
                    if ($couponhistory_list->num_rows() > 0) {
                        $couponhistory = $couponhistory_list->row();
                        $coupon_history_id = $couponhistory->id;
                        $coupon_history_code = $couponhistory->coupon_code;
                        $coupon_history_name = $couponhistory->coupon_name;
                        $offer_by = $couponhistory->type;
                        $coupon_comment = $couponhistory->comment;
                        $offer_type = $couponhistory->offer_type;
                        $data['cus_coupon_code'] = $coupon_history_code;
                        $data['cus_coupon_name'] = $coupon_history_name;
                        $data['cus_coupon_type'] = $offer_type;
                        $data['cus_percentage_amount'] = $couponhistory->percentage_amount;
                    } else {
                        $data['usecouponcode_msg'] = 'Sorry! Invalid coupon code';
                    }
                }
            }
            // echo "<pre>";print_r($data);exit;

            $this->load->view('trip/book-ticket', $data);
        }
    }

    public function book_proceed($tripCode = null) {

        $data = [];
        if (!empty($tripCode)) {
            $this->load->model('Trip_model');
            //$this->load->helper('custom_helper');
            //GENERAL DETAILS
            $data['details'] = $this->Trip_model->getDetails($tripCode);

            if (isset($data['details']['id'])) {
                //REVIEW COUNT
                $data['review_count'] = $this->Trip_model->getTotalReview($data['details']['id']);

                //PICKUP
                $data['pickups'] = $this->Trip_model->getPickupLocations($data['details']['id']);
            }

            //CALENDAR DETAILS
            $data['from_date'] = $this->session->userdata('bk_from_date');
            $data['to_date'] = $this->session->userdata('bk_to_date');
            $data['location'] = $this->session->userdata('bk_location');
            $data['no_of_adult'] = $this->session->userdata('bk_no_of_adult');
            $data['no_of_children'] = $this->session->userdata('bk_no_of_children');
            $data['no_of_infan'] = $this->session->userdata('bk_no_of_infan');
            $data['total_traveller'] = $data['no_of_adult'] + $data['no_of_children'] + $data['no_of_infan'];
            $data['user_fullname'] = $this->session->userdata('name');
            $data['user_email'] = $this->session->userdata('user_email');
            $data['user_phone'] = $this->session->userdata('user_phone');
            $data['usecouponcode'] = $this->session->userdata('bk_usecouponcode');
        }
        //echo "<pre>";print_r($data);exit;

        $this->load->view('trip/book-proceed', $data);
    }

    public function book_done($tripCode = null) {

        $data = [];

        $this->load->view('trip/book-done', $data);
    }

    public function setBookingDetails() {
        $result = false;
        if ($_POST) {
            $this->load->library('session');

            if (!empty($this->input->post('from_date', true)) && !empty($this->input->post('to_date', true)) && !empty($this->input->post('location', true)) && (!empty($this->input->post('no_of_adult', true)) || !empty($this->input->post('no_of_children', true)) ||
                    !empty($this->input->post('no_of_infan', true)))
            ) {
                $newdata = array(
                    'bk_from_date' => $this->input->post('from_date', true),
                    'bk_to_date' => $this->input->post('to_date', true),
                    'bk_location' => $this->input->post('location', true),
                    'bk_no_of_adult' => $this->input->post('no_of_adult', true),
                    'bk_no_of_children' => $this->input->post('no_of_children', true),
                    'bk_no_of_infan' => $this->input->post('no_of_infan', true),
                    'bk_usecouponcode' => $this->input->post('usecouponcode', true)
                );

                $this->session->set_userdata($newdata);

                $result = true;
            }
        }

        if ($result === false) {
            $this->session->set_userdata('err', 'Your book request not done.please try again!.');
        }

        echo $result;
        exit;
    }

    public function paymentProceed() {
        $result = false;
        $pnr = 0;
        if ($_POST) {
            $this->load->library('session');

            //$this->load->helper('custom_helper');

            $this->form_validation->set_rules('user_name', 'User name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('phonenumber', 'Phone number', 'trim|required');

            if ($this->form_validation->run($this) == FALSE) {
                $this->session->set_userdata('err', validation_errors());
            } else {
                $loginuser_id = $this->session->userdata('user_id');
                if (!empty($this->input->post('trip_id', true))) {
                    $cus_name=ucwords($this->input->post('user_name', true));
                    $cus_email=strtolower($this->input->post('email', true));
                    $cus_phone=$this->input->post('phonenumber', true);
                    
                    $userData = array(
                        'user_fullname' => $cus_name,
                        'email' => $cus_email,
                        'phone' => $cus_phone,
                    );
                    $userId = getGuestLoginDeteails($userData);
                    if ($this->session->userdata('user_type') == 'VA' && $loginuser_id ==$userId) {
                        $userData = array(
                            'user_fullname' => $cus_name,
                            'email' => 'guestnomail@mail.com',
                            'phone' => '9876543210',
                        );
                        $userId = getGuestLoginDeteails($userData);
                    }
                    //BOOKING
                    if ($userId > 0) {
                        $bookdata = array(
                            'trip_id' => $this->input->post('trip_id', true),
                            'book_user_id' => $userId,
                            'no_of_adult' => $this->session->userdata('bk_no_of_adult'),
                            'no_of_child' => $this->session->userdata('bk_no_of_children'),
                            'no_of_infan' => $this->session->userdata('bk_no_of_infan'),
                            'date_of_trip' => $this->session->userdata('bk_from_date'),
                            'pick_up_location_id' => $this->session->userdata('bk_location'),
                            'booked_to' => $cus_name,
                            'booked_email' => $cus_email,
                            'booked_phone_no' => $cus_phone);
                        $book_pay = trip_book($bookdata, $this->session->userdata('bk_usecouponcode'));
                        if (count($book_pay) > 0) {

                            $result = true;
                            $pnr = $book_pay['pnr_no'];
                            $trip_amount = $book_pay['trip_amount'];
                            $customer_id = $userId;
                            // Check wallet amount, full amount in wallet
                            $mypayment = 0;
                            if ($this->session->userdata('user_type') == 'VA' && $book_pay['status'] == 1) {
                                $mypayment = checkbal_mypayment($loginuser_id, 2);
                                if ($mypayment > 0) {
                                    $balance = (int) $mypayment - (int) $trip_amount;
                                    if ($balance <0) {
                                        //  Cash Deposited to B2b
                                        $paymentdata = array(
                                            'userid' => $loginuser_id,
                                            'transaction_notes' => 'Cash Deposited',
                                            'from_userid' => -1,
                                            'book_pay_id' => 0,
                                            'book_pay_details_id' => 0,
                                            'pnr_no' => '',
                                            'trip_id' => 0,
                                            'deposits' => $trip_amount,
                                            'status' => 2);
                                        make_mypayment($paymentdata);
                                    }
                                        //Amount Move to B2b to BYT 
                                        $paymentdata = array(
                                            'userid' => 0,
                                            'transaction_notes' => 'Trip has been booked ' . $pnr,
                                            'withdrawal_notes' => 'Office Booking PNR' . $pnr,
                                            'pnr_no' => $pnr,
                                            'from_userid' => $loginuser_id,
                                            'deposits' => $trip_amount,
                                            'status' => 2);
                                        if (make_mypayment($paymentdata)) {

                                            $updatedata = array(
                                                'payment_type' => 1, // 1 - net, 2 - credit, 3 - debit
                                                'payment_status' => 1,
                                                'status' => 2);

                                            trip_book_paid_sucess($updatedata, $book_pay['pnr_no'], 1);

                                            //CLEAR BOOKING SESSIONS
                                            $array_items = array('bk_no_of_adult', 'bk_no_of_children', 'bk_no_of_infan', 'bk_from_date', 'bk_usecouponcode',
                                                'bk_to_date', 'bk_location');

                                            $this->session->unset_userdata($array_items);
                                            echo $pnr;
                                            exit;
                                        }
                                }
                            } else {
                                //Amount Move to B2c to BYT 
                                //  Cash Deposited
                                $paymentdata = array(
                                    'userid' => $customer_id,
                                    'transaction_notes' => 'Cash Deposited',
                                    'from_userid' => -1,
                                    'book_pay_id' => 0,
                                    'book_pay_details_id' => 0,
                                    'pnr_no' => '',
                                    'trip_id' => 0,
                                    'deposits' => $trip_amount,
                                    'status' => 2);
                                make_mypayment($paymentdata);

                                $paymentdata = array(
                                    'userid' => $customer_id,
                                    'transaction_notes' => 'Trip has been booked ' . $pnr,
                                    'withdrawal_notes' => 'Office Booking PNR' . $pnr,
                                    'pnr_no' => $pnr,
                                    'from_userid' => -1,
                                    'deposits' => $trip_amount,
                                    'status' => 2);
                                if (make_mypayment($paymentdata)) {

                                    $updatedata = array(
                                        'payment_type' => 1, // 1 - net, 2 - credit, 3 - debit
                                        'payment_status' => 1,
                                        'status' => 2);

                                    trip_book_paid_sucess($updatedata, $book_pay['pnr_no'], 1);

                                    //CLEAR BOOKING SESSIONS
                                    $array_items = array('bk_no_of_adult', 'bk_no_of_children', 'bk_no_of_infan', 'bk_from_date', 'bk_usecouponcode',
                                        'bk_to_date', 'bk_location');

                                    $this->session->unset_userdata($array_items);
                                    echo $pnr;
                                    exit;
                                }
                            }

                            //TODO: Redierct to payment getway
                            //{
                            //MANUALLY CHANGE BOOKING STATUS
                            $updatedata = array(
                                'payment_type' => 1, // 1 - net, 2 - credit, 3 - debit
                                'payment_status' => 1,
                                'status' => 2);

                            trip_book_paid_sucess($updatedata, $book_pay['pnr_no']);

                            //CLEAR BOOKING SESSIONS
                            $array_items = array('bk_no_of_adult', 'bk_no_of_children', 'bk_no_of_infan', 'bk_from_date', 'bk_usecouponcode',
                                'bk_to_date', 'bk_location');

                            $this->session->unset_userdata($array_items);
                            //}
                        }
                        //echo "<pre>"; print_r($result);exit;
                    }
                }
            }
        }

        if ($result === false) {
            $this->session->set_userdata('err', 'Your book request not done.please try again!.');
        }

        echo $pnr;
        exit;
    }

    public function checkcouponcode() {
        if ($_POST) {
            $this->form_validation->set_rules('couponcode', 'couponcode', 'trim|required');
            $this->form_validation->set_rules('tripId', 'tripId', 'trim|required');
            $this->form_validation->set_rules('totalPrice', 'totalPrice', 'trim|required');
            $this->form_validation->set_rules('fromdate', 'fromdate', 'trim|required');
            if ($this->form_validation->run($this) != FALSE) {
                $couponcode = trim($this->input->post('couponcode'));
                $tripId = trim($this->input->post('tripId'));
                $fromdate = trim($this->input->post('fromdate'));
                $totalPrice = trim($this->input->post('totalPrice'));
                $walletbalance = trim($this->input->post('walletbalance'));
                $wallettopay = trim($this->input->post('wallettopay'));
                $date_of_trip = formatdate($fromdate, $format = 'Y-m-d');
                $no_of_adult = trim($this->input->post('no_of_adult'));
                $no_of_child = trim($this->input->post('no_of_children'));
                $no_of_infan = trim($this->input->post('no_of_infan'));
                $whereData = array('isactive' => 1, 'type' => 4, 'trip_id' => $tripId, 'coupon_code' => $couponcode, 'validity_from <=' => $date_of_trip, 'validity_to >=' => $date_of_trip);
                $couponhistory_list = selectTable('coupon_code_master_history', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC');
                if ($couponhistory_list->num_rows() > 0) {
                    $couponhistory = $couponhistory_list->row();
                    $coupon_history_id = $couponhistory->id;
                    $coupon_history_code = $couponhistory->coupon_code;
                    $coupon_history_name = $couponhistory->coupon_name;
                    $offer_by = $couponhistory->type;
                    $coupon_comment = $couponhistory->comment;
                    $offer_type = $couponhistory->offer_type;
                    if ($offer_type == 1) {//fixed
                        $offer_price = $couponhistory->percentage_amount;
                        $number_of_persons = (int) $no_of_adult + (int) $no_of_child + (int) $no_of_infan;
                        $discount_price = (int) $offer_price * (int) $number_of_persons;
                        $totalPrice = (int) $totalPrice - (int) $discount_price;
                        $wallettopay = (int) $wallettopay - (int) $discount_price;
                        if ($wallettopay < 0) {
                            $walletbalance = (int) $walletbalance + (int) abs($wallettopay);
                            $wallettopay = 0;
                        }
                    }
                    if ($offer_type == 2) {//percentage
                        $discount_percentage = $couponhistory->percentage_amount;
                        if (strpos($discount_percentage, '.00') !== false) {
                            $discount_percentage = round($discount_percentage);
                        }
                        $discount_price = (int) $totalPrice * ((int) $discount_percentage / 100);
                        $totalPrice = (int) $totalPrice - (int) $discount_price;
                        $wallettopay = (int) $wallettopay - (int) $discount_price;
                        if ($wallettopay < 0) {
                            $walletbalance = $walletbalance + (int) abs($wallettopay);
                            $wallettopay = 0;
                        }
                    }

                    $data = array('status' => 1,
                        'totalPrice' => $totalPrice,
                        'walletbalance' => $walletbalance,
                        'wallettopay' => $wallettopay,
                        'msg' => 'Applied coupon code for Rs:' . $discount_price . ' off');
                    echo json_encode($data);
                    exit();
                }
            }
        }
        echo json_encode(array('status' => 0, 'msg' => 'Sorry! Invalid coupon code'));
        exit();
    }

}
