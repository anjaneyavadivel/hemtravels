<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TripBookings extends CI_Controller {

    public function book_summary($tripCode = null) {

        //if ($this->session->userdata('user_id') == '' ) {redirect('login');}

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

                $data['available_days'] = $this->Trip_model->getAvailableDays($data['details']['id']);

                $data['cutoff_disable_days'] = $this->Trip_model->getCutoffDaysTime($data['details']['created_on'], $data['details']['booking_cut_of_time_type'], $data['details']['booking_cut_of_day'], $data['details']['booking_cut_of_time'], $data['details']['meeting_time']);

                $data['cutoff_max_month'] = $this->Trip_model->getCutoffMonth($data['details']['created_on'], $data['details']['booking_max_cut_of_month']);

                $offerdata = array(
                    'trip_id' => $data['details']['id'],
                    'date_of_trip' => $this->session->userdata('bk_from_date'),
                    'ischeckadmin' => 1);
                if ($this->session->userdata('user_type') == 'VA') {
                    $offerdata['ischeckadmin'] = 0;
                }
                $data['offer_details'] = trip_offer($offerdata);
                // echo "<pre>"; print_r($data['offer_details']);exit;
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


            //SET REDIRECT URL
            if (empty($this->session->userdata('user_type'))) {
                $redirect_url = $this->uri->segment(1) . '/' . $this->uri->segment(2);
                $this->session->set_userdata('last_url', $redirect_url);
            }
        }

        //echo "<pre>";print_r($data);exit;

        $this->load->view('trip/book-ticket', $data);
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
                    'bk_no_of_infan' => $this->input->post('no_of_infan', true)
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

                if (!empty($this->input->post('trip_id', true))) {
                    $userData = array(
                        'user_fullname' => ucwords($this->input->post('user_name', true)),
                        'email' => strtolower($this->input->post('email', true)),
                        'phone' => $this->input->post('phonenumber', true),
                    );
                    $userId = getGuestLoginDeteails($userData);
                    //BOOKING
                    if ($userId > 0) {
                        $bookdata = array(
                            'trip_id' => $this->input->post('trip_id', true),
                            'book_user_id' => $userId,
                            'no_of_adult' => $this->session->userdata('bk_no_of_adult'),
                            'no_of_child' => $this->session->userdata('bk_no_of_children'),
                            'no_of_infan' => $this->session->userdata('bk_no_of_infan'),
                            'date_of_trip' => $this->session->userdata('bk_from_date'),
                            'pick_up_location_id' => $this->session->userdata('bk_location'));
                        $book_pay = trip_book($bookdata,$this->input->post('usecouponcode', true));
                        if (count($book_pay) > 0) {

                            $result = true;
                            $pnr = $book_pay['pnr_no'];
                            $trip_amount = $book_pay['trip_amount'];
                            $customer_id = $userId;
                            // Check wallet amount, full amount in wallet
                            $mypayment = 0;
                            if ($this->session->userdata('user_type') == 'VA' && $book_pay['status']==1) {
                                $loginuser_id = $this->session->userdata('user_id');
                                $mypayment = checkbal_mypayment($loginuser_id, 2);
                                if ($mypayment > 0) {
                                    $balance = (int) $mypayment - (int) $trip_amount;
                                    if ($balance > 0) {
                                        //Amount Move to B2b to B2c 
                                        $paymentdata = array(
                                            'userid' => $customer_id,
                                            'transaction_notes' => 'Cash Deposited for ' . $pnr,
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

                                            trip_book_paid_sucess($updatedata, $book_pay['pnr_no'],1);

                                            //CLEAR BOOKING SESSIONS
                                            $array_items = array('bk_no_of_adult', 'bk_no_of_children', 'bk_no_of_infan', 'bk_from_date',
                                                'bk_to_date', 'bk_location');

                                            $this->session->unset_userdata($array_items);
                                            echo $pnr;
                                            exit;
                                        }
                                    }
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
                            $array_items = array('bk_no_of_adult', 'bk_no_of_children', 'bk_no_of_infan', 'bk_from_date',
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
                $tripId = ucwords(trim($this->input->post('tripId')));
                $fromdate = ucwords(trim($this->input->post('fromdate')));
                $totalPrice = ucwords(trim($this->input->post('totalPrice')));
                $walletbalance = ucwords(trim($this->input->post('walletbalance')));
                $wallettopay = ucwords(trim($this->input->post('wallettopay')));
                $date_of_trip = formatdate($fromdate, $format = 'Y-m-d');
                $whereData = array('isactive' => 1,'type' => 4, 'trip_id' => $tripId, 'coupon_code' => $couponcode, 'validity_from <=' => $date_of_trip, 'validity_to >=' => $date_of_trip);
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
                            $discount_price = $couponhistory->percentage_amount;
                            $totalPrice = (int) $totalPrice - (int) $discount_price;
                            $wallettopay = (int) $wallettopay - (int) $discount_price;
                            if($wallettopay<0){
                                $walletbalance = (int) $walletbalance + (int)abs($wallettopay);
                                $wallettopay =0;
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
                            if($wallettopay<0){
                                $walletbalance = $walletbalance + (int) abs($wallettopay);
                                $wallettopay =0;
                            }
                        }
                    
                        $data = array('status' => 1,
                            'totalPrice' => $totalPrice, 
                            'walletbalance' => $walletbalance, 
                            'wallettopay' => $wallettopay,
                            'msg' => 'Applied coupon code for Rs:'.$discount_price.' off');
                        echo json_encode($data);
                        exit();
                    }
                }
            }
        echo  json_encode(array('status' => 0,'msg' => 'Sorry! Invalid coupon code'));
        exit();
    }
}
