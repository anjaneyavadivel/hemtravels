<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trips extends CI_Controller {

   

    public function make_new_trip($isshared = 0) { 
        
        if ($this->session->userdata('user_id') == '') {redirect('login');}
         
        $whereData = array('isactive' => 1);
        $tags_list = selectTable('trip_tags', $whereData);
        $tags=array(); if(isset($tags_list) && $tags_list->num_rows()>0) foreach($tags_list->result() as $tg) {$tags[]=  array('value'=>strtolower($tg->name)); }
        $data['tags'] = $tags;
        
        $whereData_2        = array('isactive' => 1,'country_id' => 1);
        $data['state_list'] = selectTable('state_master', $whereData_2);
        $data['isshared']   = $isshared;
        
        $data['category_list'] = selectTable('trip_category', $whereData,['*'],[],[],'','',[],'result_array');       
        
        $data['inclusion_list'] = selectTable('trip_inclusions', $whereData,['*'],[],[],'','',[],'result_array');       
        
        
        //echo "<pre>";print_r($data['category_list']);exit;
        
        $this->load->view('trip/make-new-trip',$data);
    }

     public function getalltags() {
        if ($this->session->userdata('user_id') == '') {return FALSE;}
         
        $whereData = array('isactive' => 1);
        $tags_list= selectTable('trip_tags', $whereData);
        $tags=array(); if(isset($tags_list) && $tags_list->num_rows()>0) foreach($tags_list->result() as $tg) {$tags[]=$tg->name; }
        echo json_encode($tags);
    }
    
    public function city_list(){
        $returnedData['data'] = [];
        if ($_POST) 
        {
            $state_id  = $this->input->post('state_id');
            
            if(!empty($state_id)){
                $whereData        = array('isactive' => 1,'state_id' => $state_id);
                $returnedData['data'] = selectTable('city_master', $whereData,['*'],[],[],'','',[],'result_array'); 
            }
        }
        echo json_encode($returnedData);
    }
    
    public function add_action()
	{
            $error = '';$success = '';
            //echo "<pre>";print_r($_POST);exit;
            if ($this->session->userdata('user_id') == '') {redirect('login');}
		if ($_POST) 
		{
                    $this->db->trans_start();
                    
                    //TRIP MASTER TABLE
                    $master_values = array(
                        'user_id'           => $this->session->userdata('user_id'),
                        'trip_category_id'  => $this->input->post('trip_category_id'),
                        'trip_name'         => $this->input->post('trip_name'),
                        'is_shared'         => $this->input->post('is_shared') == 1?1:0,
                        'price_to_adult'    => $this->input->post('price_to_adult'),
                        'price_to_child'    => $this->input->post('price_to_child'),
                        'price_to_infan'    => $this->input->post('price_to_infan'),
                        'trip_duration'     => $this->input->post('trip_duration'),
                        'how_many_days'     => $this->input->post('trip_duration') == 2 ?$this->input->post('how_many_days'):0,
                        'how_many_nights'   => $this->input->post('trip_duration') == 2 ?$this->input->post('how_many_nights'):0,
                        'total_days'        => $this->input->post('trip_duration') == 2 ?
                                                $this->input->post('how_many_days') + $this->input->post('how_many_nights'):0,
                        'how_many_hours'    => $this->input->post('trip_duration') == 1 ?$this->input->post('how_many_hours'):0,
                        'brief_description' => $this->input->post('brief_description'),
                        'no_of_traveller'   => $this->input->post('no_of_traveller'),
                        'no_of_traveller'   => $this->input->post('no_of_traveller'),
                        'no_of_min_booktraveller' => $this->input->post('no_of_min_booktraveller'),
                        'no_of_max_booktraveller' => $this->input->post('no_of_max_booktraveller'),
                        'booking_cut_of_time_type' => $this->input->post('booking_cut_of_time_type'),
                        'booking_cut_of_day' => $this->input->post('booking_cut_of_time_type') == 1?$this->input->post('booking_cut_of_time') * 24:0,
                        'booking_cut_of_day' => $this->input->post('booking_cut_of_time') == 2?$this->input->post('booking_cut_of_time'):0,
                        'state_id'           => $this->input->post('state_id'),
                        'city_id'            => $this->input->post('city_id'),
                        'cancellation_policy'=> $this->input->post('cancellation_policy'),
                        'confirmation_policy'=> $this->input->post('confirmation_policy'),
                        'refund_policy'      => $this->input->post('refund_policy'),
                        'other_inclusions'      => $this->input->post('other_inclusions'),
                        'exclusions'      => $this->input->post('exclusions'),
                        'other_setting'      => $this->input->post('other_setting'),
                        'other_no_of_traveller'              => $this->input->post('other_no_of_traveller'),
                        'other_no_of_min_booktraveller'      => $this->input->post('other_no_of_min_booktraveller'),
                        'other_no_of_max_booktraveller'      => $this->input->post('other_no_of_max_booktraveller'),
                        'other_price_to_adult'               => $this->input->post('other_price_to_adult'),
                        'other_price_to_child'               => $this->input->post('other_price_to_child'),
                        'other_price_to_infan'               => $this->input->post('other_price_to_infan'),
                        'is_terms_accpet'               => !empty($this->input->post('term_accept'))?1:0,
                        'isactive'           => $this->input->post('button_type') == 'draft'?2:1);
                    
                    $query   = insertTable('trip_master', $master_values);
                    $trip_id = $this->db->insert_id();
                    
                    $trip_code = 'TRIP'.str_pad($trip_id, 5, '0', STR_PAD_LEFT);
                    
                    $trip_img_name = null;
                    if(!empty($this->input->post('gallery_images'))){
                        $trip_img_names = json_decode($_POST['gallery_images'],true);
                        $trip_img_name = isset($trip_img_names[0])?$trip_img_names[0]:null;
                        
                        //GALLERY IMAGES
                        if(count($trip_img_names) >0){
                            foreach($trip_img_names as $v){
                                $query1   = insertTable('trip_gallery', array('trip_id'=>$trip_id,'file_name' => $v));
                            }
                        }
                    }
                    
                    //UPDATE TRIP TABLE                    
                    $upQry = updateTable('trip_master',array('id' => $trip_id),array('trip_code' => $trip_code,'trip_img_name'=>$trip_img_name));
                    
                    //PICKUP LOCATION MAP
                    if(!empty($this->input->post('pickup_meeting_point'))){
                        $pickLocs = $this->input->post('pickup_meeting_point');
                        foreach($pickLocs as $k=>$v){
                            if(isset($_POST['pickup_meeting_point'][$k]) && !empty($_POST['pickup_meeting_point'][$k])){
                                $pickLocValue = array(
                                    'trip_id' => $trip_id,
                                    'city_id' => $this->input->post('city_id'),
                                    'location' => isset($_POST['pickup_meeting_point'][$k])?$_POST['pickup_meeting_point'][$k]:0,
                                    'time' => isset($_POST['pickup_meeting_time'][$k])?$_POST['pickup_meeting_time'][$k]:0,
                                    'landmark' => isset($_POST['pickup_landmark'][$k])?$_POST['pickup_landmark'][$k]:0,
                                );
                                $query2   = insertTable('pick_up_location_map',$pickLocValue);
                            }
                        }
                    }
                    
                    //TRIP INCLUSIONS
                    if(!empty($this->input->post('trip_inclusions'))){
                        foreach($this->input->post('trip_inclusions') as $k=>$v){
                            $incValue = array(
                                'trip_id' => $trip_id,
                                'inclusions_id' => $v                              
                            );
                            $query3   = insertTable('trip_inclusions_map',$incValue);
                        }
                    }
                    
                    //TRIP IITINERARY
                    if(!empty($this->input->post('trip_from_time'))){
                        foreach($this->input->post('trip_from_time') as $k=>$v){
                            
                            if(isset($_POST['trip_from_time'][$k]) && !empty($_POST['trip_from_time'][$k])){
                                $itiValue = array(
                                    'trip_id' => $trip_id,
                                    'from_time' => isset($_POST['trip_from_time'][$k])?$_POST['trip_from_time'][$k]:0,
                                    'to_time' => isset($_POST['trip_to_time'][$k])?$_POST['trip_to_time'][$k]:0,
                                    'title' => isset($_POST['trip_from_title'][$k])?$_POST['trip_from_title'][$k]:'',                             
                                    'short_description' => isset($_POST['trip_short_dec'][$k])?$_POST['trip_short_dec'][$k]:'',                             
                                    'brief_description' => isset($_POST['trip_brief_dec'][$k])?$_POST['trip_brief_dec'][$k]:'',                             
                                );
                                $query4   = insertTable('trip_itinerary',$itiValue);
                            }
                        }
                    }
                    
                    //TRIP AVAILABLE
                    $tripAvailable = array(
                        'trip_id'      => $trip_id,
                        'monday' => !empty($this->input->post('trip_ava_mon'))?1:0,
                        'tuesday' => !empty($this->input->post('trip_ava_tue'))?1:0,
                        'wednesday' => !empty($this->input->post('trip_ava_wed'))?1:0,
                        'thursday' => !empty($this->input->post('trip_ava_thu'))?1:0,
                        'friday' => !empty($this->input->post('trip_ava_fri'))?1:0,
                        'saturday' => !empty($this->input->post('trip_ava_sat'))?1:0,
                        'sunday' => !empty($this->input->post('trip_ava_sun'))?1:0,
                    );
                    $query5   = insertTable('trip_avilable',$tripAvailable);
                    
                    $success = 'New trip has been successfully added...';
                    
                    $this->db->trans_complete();

                    if ($this->db->trans_status() === FALSE)
                    {
                         $error = 'New trip not added.please try again!.';   
                    }
		}
                
            if($error != ''){               
                $this->session->set_userdata('err', $error);
                redirect('make-new-trip');
            }
            
            if($success != ''){
                $this->session->set_userdata('suc', $success);
                redirect('trip-list');
            }
               
	}
        
         public function gallery_upload()
        {
                $config['upload_path']          = './assets-customs/gallery_images/';
                $config['allowed_types']        = 'gif|jpg|png';
                /*$config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;*/
                
                $new_name = time().'_'.$_FILES["file"]['name'];
                $config['file_name'] = $new_name;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $data = array('error' => $this->upload->display_errors());

                        
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        
                }
                echo json_encode($data);
        }
    
    public function trip_list() {
         if ($this->session->userdata('user_id') == '') {redirect('login');}
        
        $this->load->view('trip/trip-list');
    }
    public function trip_calendar_view() {
         if ($this->session->userdata('user_id') == '') {redirect('login');}
        
        $this->load->view('trip/trip-calendar-view');
    }
    public function trip_view() {
         if ($this->session->userdata('user_id') == '') {redirect('login');}
        
        $this->load->view('trip/trip-view');
    }
}
