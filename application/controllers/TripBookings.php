<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TripBookings extends CI_Controller {

   public function book_summary($tripCode = null) { 
        
        //if ($this->session->userdata('user_id') == '' ) {redirect('login');}
        
        $data = [];
        if(!empty($tripCode)){
            $this->load->model('Trip_model');
             $this->load->helper('custom_helper');
            
            //GENERAL DETAILS
            $data['details'] = $this->Trip_model->getDetails($tripCode);
            
            if(isset($data['details']['id'])){
                //REVIEW COUNT
                $data['review_count'] = $this->Trip_model->getTotalReview($data['details']['id']);
                
                //PICKUP
                $data['pickups'] = $this->Trip_model->getPickupLocations($data['details']['id']);
                
               
                $offerdata=array(
                'trip_id'      => $data['details']['id'],                
                'date_of_trip' => $this->session->userdata('bk_from_date'),
                'ischeckadmin' => 0);
                $data['offer_details'] = trip_offer($offerdata);
               //echo "<pre>"; print_r($data['offer_details']);exit;
            }
            
            //CALENDAR DETAILS
            $data['from_date'] = $this->session->userdata('bk_from_date');
            $data['to_date']   = $this->session->userdata('bk_to_date');
            $data['location']  = $this->session->userdata('bk_location');
            $data['no_of_adult'] = $this->session->userdata('bk_no_of_adult');
            $data['no_of_children'] = $this->session->userdata('bk_no_of_children');
            $data['no_of_infan'] = $this->session->userdata('bk_no_of_infan');
            $data['total_traveller'] = $data['no_of_adult'] + $data['no_of_children'] + $data['no_of_infan'];
            
        }
        //echo "<pre>";print_r($data);exit;
        
        $this->load->view('trip/book-ticket',$data);
    }
   public function book_proceed($tripCode = null) { 
        
        $data = [];
        if(!empty($tripCode)){
            $this->load->model('Trip_model');
             $this->load->helper('custom_helper');
            
            //GENERAL DETAILS
            $data['details'] = $this->Trip_model->getDetails($tripCode);
            
            if(isset($data['details']['id'])){
                //REVIEW COUNT
                $data['review_count'] = $this->Trip_model->getTotalReview($data['details']['id']);
                
                //PICKUP
                $data['pickups'] = $this->Trip_model->getPickupLocations($data['details']['id']);
                
            }
            
            //CALENDAR DETAILS
            $data['from_date'] = $this->session->userdata('bk_from_date');
            $data['to_date']   = $this->session->userdata('bk_to_date');
            $data['location']  = $this->session->userdata('bk_location');
            $data['no_of_adult'] = $this->session->userdata('bk_no_of_adult');
            $data['no_of_children'] = $this->session->userdata('bk_no_of_children');
            $data['no_of_infan'] = $this->session->userdata('bk_no_of_infan');
            $data['total_traveller'] = $data['no_of_adult'] + $data['no_of_children'] + $data['no_of_infan'];
            $data['user_fullname'] = $this->session->userdata('name');
            $data['user_email'] = $this->session->userdata('user_email');
            $data['user_phone'] = $this->session->userdata('user_phone');
            
        }
        //echo "<pre>";print_r($data);exit;
        
        $this->load->view('trip/book-proceed',$data);
    }
   public function book_done($tripCode = null) { 
        
        $data = [];
        
        $this->load->view('trip/book-done',$data);
    }
    
    public function setBookingDetails(){
        $result = false;
        if ($_POST) 
        {
            $this->load->library('session');            
            
            if(!empty($this->input->post('from_date',true)) && !empty($this->input->post('to_date',true)) && !empty($this->input->post('location',true))
                && (!empty($this->input->post('no_of_adult',true)) || !empty($this->input->post('no_of_children',true)) ||
                        !empty($this->input->post('no_of_infan',true)))
            ){
                $newdata = array(
                    'bk_from_date'   => $this->input->post('from_date',true),
                    'bk_to_date'     => $this->input->post('to_date',true),
                    'bk_location'    => $this->input->post('location',true),
                    'bk_no_of_adult'    => $this->input->post('no_of_adult',true),
                    'bk_no_of_children' => $this->input->post('no_of_children',true),
                    'bk_no_of_infan'    => $this->input->post('no_of_infan',true)                    
                );

                $this->session->set_userdata($newdata); 
                
                $result = true;
            }
        }
        
        if($result === false){
            $this->session->set_userdata('err','Your book request not done.please try again!.'); 
        }
        
        echo $result;exit;
    }
    
    public function setPaymentProceedDetails(){
        $result = false;
        if ($_POST) 
        {
            $this->load->library('session');            
            
            if(!empty($this->input->post('total_price',true))
            ){
                $newdata = array(
                    'bk_total_price'   => $this->input->post('total_price',true)                                       
                );

                $this->session->set_userdata($newdata); 
                
                $result = true;
            }
        }
        
        if($result === false){
            $this->session->set_userdata('err','Your book request not done.please try again!.'); 
        }
        
        echo $result;exit;
    }
    
    public function confirmUser(){
        $result = false;$pnr ='';
        if ($_POST) 
        {
            $this->load->library('session');   
            
             $this->load->helper('custom_helper');
             
            $this->form_validation->set_rules('user_name', 'User name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run($this) == FALSE) {
                $this->session->set_userdata('err',validation_errors());                
            }else{
            
                if(!empty($this->input->post('trip_id',true))){
                    $userData=array(
                    'user_fullname' => $this->input->post('user_name',true),
                    'email'         => $this->input->post('email',true),
                    'password'      => $this->input->post('password',true),
                    );
                    $userId         = getGuestLoginDeteails($userData);

                    //BOOKING
                    if($userId > 0){
                        $bookdata=array(
                        'trip_id' => $this->input->post('trip_id',true),
                        'book_user_id' => $userId,
                        'no_of_adult' => $this->session->userdata('bk_no_of_adult'),
                        'no_of_child' => $this->session->userdata('bk_no_of_children'),
                        'no_of_infan' => $this->session->userdata('bk_no_of_infan'),
                        'date_of_trip' => $this->session->userdata('bk_from_date'),
                        'pick_up_location_id' => $this->session->userdata('bk_location'));
                        $pnr = trip_book($bookdata);
                        if(count($pnr) > 0 ){
                            $result = true;
                            
                            //CLEAR BOOKING SESSIONS
                            $array_items = array('bk_no_of_adult', 'bk_no_of_children','bk_no_of_infan','bk_from_date',
                                'bk_to_date','bk_location');

                            $this->session->unset_userdata($array_items);
                        }
                        //echo "<pre>"; print_r($result);exit;
                    }
                }
            }
        }
        
        if($result === false){
            $this->session->set_userdata('err','Your book request not done.please try again!.'); 
        }
        
        echo $pnr;exit;
    }
    
}
