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
        
        $data['isshared'] = $isshared;        
        
        $data['category_list'] = selectTable('trip_category', $whereData,['*'],[],[],'','',[],'result_array');       
        
        $data['inclusion_list'] = selectTable('trip_inclusions', $whereData,['*'],[],[],'','',[],'result_array');       
        
        
        //echo "<pre>";print_r($data['category_list']);exit;
        
        $this->load->view('trip/make-new-trip',$data);
    }
    
    public function update($tripCode = null) { 
        
        if ($this->session->userdata('user_id') == '') {redirect('login');}
       
        $data['trip_details']  = $this->getTripDetails($tripCode);   
        
        if(isset($data['trip_details']['details']) && count($data['trip_details']['details']) > 0){
            
            
            if(isset($data['trip_details']['details']['other_from_date'])&& !empty($data['trip_details']['details']['other_from_date'])){ 
               $data['trip_details']['details']['other_from_date'] = date("M j,Y", strtotime($data['trip_details']['details']['other_from_date']));
            }
            if(isset($data['trip_details']['details']['other_to_date'])&& !empty($data['trip_details']['details']['other_to_date'])){ 
               $data['trip_details']['details']['other_to_date'] = date("M j,Y", strtotime($data['trip_details']['details']['other_to_date']));
            }
            
            $whereData = array('isactive' => 1);
            $tags_list = selectTable('trip_tags', $whereData);
            $tags=array(); if(isset($tags_list) && $tags_list->num_rows()>0) foreach($tags_list->result() as $tg) {$tags[]=  array('value'=>strtolower($tg->name)); }
            $data['tags'] = $tags;

            $whereData_2        = array('isactive' => 1,'country_id' => 1);
            $data['state_list'] = selectTable('state_master', $whereData_2); 
            
            $whereData_3        = array('isactive' => 1,'state_id' => $data['trip_details']['details']['state_id']);
            $data['city_list'] = selectTable('city_master', $whereData_3);  
            
            $data['category_list'] = selectTable('trip_category', $whereData,['*'],[],[],'','',[],'result_array');
            $data['inclusion_list'] = selectTable('trip_inclusions', $whereData,['*'],[],[],'','',[],'result_array');       
        
        }
        
        //echo "<pre>";print_r($data['trip_details']['inclusions']);exit;
        
        $this->load->view('trip/trip-update',$data);
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
        echo json_encode($returnedData);exit;
    }
    
    public function delete_trip(){
        $succ = 'error';
        if ($_POST) 
        {
            $trip_id  = $this->input->post('trip_id');
            
            if(!empty($trip_id)){
                $whereData        = array('isactive' => 0);
                updateTable('trip_master',array('id' => $trip_id),$whereData);
                $this->session->set_userdata('suc', 'Trip has been successfully deleted');
                $succ = 'success';
            }
        }
        
        if($succ == ''){
            $this->session->set_userdata('err', 'Trip not deleted');            
        }
        echo $succ;exit;
        
    }
    
    public function add_action()
	{
            $error = 'Please check your submission';$success = '';
            
            if ($this->session->userdata('user_id') == '') {redirect('login');}
            
		if (!empty($this->input->post('trip_name')) && !empty($this->input->post('trip_category_id')) 
                    && !empty($this->input->post('trip_duration')) && !empty($this->input->post('brief_description')) 
                    && !empty($this->input->post('no_of_traveller')) && !empty($this->input->post('no_of_min_booktraveller'))) 
		{
                    $error = 'New trip not added.please try again!.';  
                    
                    $this->db->trans_start(); 
                    
                    try{
                        $this->load->helper('string');
                        $trip_code = 'TRIP'.random_string('alnum',7);
                        //Lower case everything
                        $trip_url = strtolower($this->input->post('trip_name'));
                        //Make alphanumeric (removes all other characters)
                        $trip_url = preg_replace("/[^a-z0-9_\s-]/", "", $trip_url);
                        //Clean up multiple dashes or whitespaces
                        $trip_url = preg_replace("/[\s-]+/", " ", $trip_url);
                        //Convert whitespaces and underscore to dash
                        $trip_url = preg_replace("/[\s_]/", "-", $trip_url);                            

                        //TRIP MASTER TABLE
                        $master_values = $this->tripMasterFields();
                        $master_values['trip_code']  = $trip_code;
                        $master_values['trip_url']   = $trip_url;                        
                        $master_values['isactive']   = $this->input->post('button_type') == 'draft'?2:1;
                        $master_values['created_on'] = date('Y-m-d H:i:s');
                        $master_values['created_by'] = $this->session->userdata('user_id');

                        //echo "<pre>";print_r($master_values);exit;
                        

                        $query   = insertTable('trip_master', $master_values);
                        $trip_id = $this->db->insert_id();
                        
                        //GALLERY IMAGES
                        if(!empty($this->input->post('gallery_images'))){
                            $trip_img_names = json_decode($_POST['gallery_images'],true);
                            $trip_img_name = isset($trip_img_names[0])?$trip_img_names[0]:null;                        
                        }
                        $this->galleryImages($trip_id);
                        

                        //PICKUP LOCATION MAP
                        $meeting_point = '';
                        $meeting_time  = '';
                        if(!empty($this->input->post('pickup_meeting_point'))){
                            $pickLocs = $this->input->post('pickup_meeting_point');

                            $meeting_point = isset($_POST['pickup_meeting_point'][0])?$_POST['pickup_meeting_point'][0]:'';
                            $meeting_time  = isset($_POST['pickup_meeting_time'][0])?$_POST['pickup_meeting_time'][0]:'';

                            $this->pickupLocations($pickLocs,$trip_id);
                        }

                        //UPDATE TRIP TABLE                    
                        $upQry = updateTable('trip_master',array('id' => $trip_id),
                                 array('trip_img_name' => $trip_img_name,
                                       'meeting_point' => $meeting_point,
                                       'meeting_time'  => $meeting_time,
                                     ));

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
                        $this->itineraryAdd($trip_id);                        

                        //TRIP AVAILABLE
                        $tripAvailable = $this->getTripAvailable($trip_id);
                        $query5   = insertTable('trip_avilable',$tripAvailable);

                        //TRIP TAG MAP
                        $this->tagAddUpdate($trip_id);                                      
                        
                        $error   = '';
                        $success = 'New trip has been successfully added...'; 

                        $this->db->trans_complete();

                        if ($this->db->trans_status() === FALSE)
                        {
                            $error = 'New trip not added.please try again!.';  
                        }
                    }catch(Exception $e){}
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
        
    public function edit_action()
	{
            $error = 'Please check your submission';$success = '';
            
            if ($this->session->userdata('user_id') == '') {redirect('login');}
            
		if (!empty($this->input->post('trip_id')) && !empty($this->input->post('trip_name')) && !empty($this->input->post('trip_category_id')) 
                    && !empty($this->input->post('trip_duration')) && !empty($this->input->post('brief_description')) 
                    && !empty($this->input->post('no_of_traveller')) && !empty($this->input->post('no_of_min_booktraveller'))) 
		{
                    $error = 'New trip not updated.please try again!.';  
                    
                    $this->db->trans_start(); 
                    
                    try{         
                        
                        $trip_id = $this->input->post('trip_id');

                        $master_values = $this->tripMasterFields();
                        $master_values['updated_on'] = date('Y-m-d H:i:s');
                        $master_values['updated_by'] = $this->session->userdata('user_id'); 

                        //GALLERY IMAGES CODE BEGIN HERE
                        
                            //ADD NEW
                                $this->galleryImages($trip_id);

                            //REMOVE GALLERY IMAGES
                                if(!empty($this->input->post('ex_rm_gallery_images'))){
                                    $rm_imgs = trim($this->input->post('ex_rm_gallery_images'),', ');
                                    $rm_imgs = explode(',', $rm_imgs);

                                    if(count($rm_imgs) > 0){
                                        $this->db->where_in('id', $rm_imgs);
                                        $this->db->update('trip_gallery', array('isactive' => 0));
                                    }
                                }
                                
                        //GALLERY IMAGES CODE END HERE   
                        

                        //PICKUP LOCATION MAP CODE BEGIN HERE
                           
                            //UPDATE
                                $meeting_point = '';
                                $meeting_time  = '';
                                if(!empty($this->input->post('ex_pickup_meeting_point'))){
                                    $exPickLocs = $this->input->post('ex_pickup_meeting_point');
                                    $c1 = 0;
                                    foreach($exPickLocs as $k=>$v){

                                        if($c1 == 0){
                                            $meeting_point = isset($_POST['ex_pickup_meeting_point'][$k])?$_POST['ex_pickup_meeting_point'][$k]:'';
                                            $meeting_time  = isset($_POST['ex_pickup_meeting_time'][$k])?$_POST['ex_pickup_meeting_time'][$k]:'';
                                        }
                                        $exPickLocValue = array(                                        
                                            'city_id'   => $this->input->post('city_id'),
                                            'location'  => isset($_POST['ex_pickup_meeting_point'][$k])?$_POST['ex_pickup_meeting_point'][$k]:0,
                                            'time'      => isset($_POST['ex_pickup_meeting_time'][$k])?$_POST['ex_pickup_meeting_time'][$k]:0,
                                            'landmark'  => isset($_POST['ex_pickup_landmark'][$k])?$_POST['ex_pickup_landmark'][$k]:0,
                                        );
                                        $exPicQry = updateTable('pick_up_location_map',array('trip_id' => $trip_id,'id'=>$k),$exPickLocValue);                                    
                                        $c1++;
                                    }

                                }

                            //INSERT
                                if(!empty($this->input->post('pickup_meeting_point'))){
                                    $pickLocs = $this->input->post('pickup_meeting_point');
                                    $this->pickupLocations($pickLocs,$trip_id);                            
                                }
                                
                        //PICKUP LOCATION MAP CODE END HERE                          

                        //UPDATE TRIP TABLE                    
                        $upQry = updateTable('trip_master',array('id' => $trip_id),$master_values);

                        //TRIP INCLUSIONS CODE BEGIN HERE
                        
                                $this->db->select('id')->from('trip_inclusions_map')->where(array('trip_id'=>$trip_id,'isactive' => 1));
                                $ex_inclusions = $this->db->get()->result_array();
                                
                                if(count($ex_inclusions) >0){
                                    $ex_inclusions = array_column($ex_inclusions, 'id');
                                }
                                
                                $tripInclusions = [];
                                
                                if(!empty($this->input->post('trip_inclusions'))){
                                    $tripInclusions = $this->input->post('trip_inclusions');
                                }                               
                            

                            //DELETE
                                $rm_inclusions  = array_diff($ex_inclusions, $tripInclusions);
                                if(!empty($rm_inclusions) && count($rm_inclusions) > 0){
                                    $this->db->where_in('id', $rm_inclusions);
                                    $this->db->update('trip_inclusions_map', array('isactive' => 0));
                                }

                            //INSERT
                                $add_inclusions = array_diff($tripInclusions,$ex_inclusions);
                                if(!empty($add_inclusions) && count($add_inclusions) > 0){
                                    foreach($add_inclusions as $k=>$v){
                                        $incValue = array(
                                            'trip_id' => $trip_id,
                                            'inclusions_id' => $v                              
                                        );
                                        $query3   = insertTable('trip_inclusions_map',$incValue);
                                    }
                                }
                             
                        //TRIP INCLUSIONS CODE END HERE

                        //TRIP IITINERARY CODE BEGIN HERE
                                
                            //UPDATE
                                if(!empty($this->input->post('ex_trip_from_time'))){
                                    foreach($this->input->post('ex_trip_from_time') as $k=>$v){

                                        if(isset($_POST['ex_trip_from_time'][$k]) && !empty($_POST['ex_trip_from_time'][$k])){
                                            $exItiValue = array(                                                
                                                'from_time'         => isset($_POST['ex_trip_from_time'][$k])?$_POST['ex_trip_from_time'][$k]:0,
                                                'to_time'           => isset($_POST['ex_trip_to_time'][$k])?$_POST['ex_trip_to_time'][$k]:0,
                                                'title'             => isset($_POST['ex_trip_from_title'][$k])?$_POST['ex_trip_from_title'][$k]:'',                             
                                                'short_description' => isset($_POST['ex_trip_short_dec'][$k])?$_POST['ex_trip_short_dec'][$k]:'',                             
                                                'brief_description' => isset($_POST['ex_trip_brief_dec'][$k])?$_POST['ex_trip_brief_dec'][$k]:'',                             
                                            );
                                            $exItiQry = updateTable('trip_itinerary',array('trip_id' => $trip_id,'id'=>$k),$exItiValue);                                    
                                        }
                                    }
                                }
                                
                            //INSERT
                                $this->itineraryAdd($trip_id);
                                
                        //TRIP IITINERARY CODE END HERE
                                

                        //TRIP AVAILABLE
                        $tripAvailable = $this->getTripAvailable($trip_id);
                        $avaQry = updateTable('trip_avilable',array('trip_id' => $trip_id),$tripAvailable);                                    
                        

                        //TRIP TAG MAP CODE BEGIN HERE 
                            
                            //DELETE ALL
                               $tagDelALLQry = updateTable('trip_tag_map',array('trip_id' => $trip_id,'isactive !=' => 0),array('isactive' => 0));                                
                            
                            //INSERT
                               $this->tagAddUpdate($trip_id,1);
                               
                        //TRIP TAG MAP CODE END HERE 
                        
                        $error   = '';
                        $success = 'New trip has been successfully updated...'; 

                        $this->db->trans_complete();

                        if ($this->db->trans_status() === FALSE)
                        {
                            $error = 'New trip not updated.please try again!.';  
                        }
                    }catch(Exception $e){}
            }            
                
            if($error != ''){               
                $this->session->set_userdata('err', $error);
                redirect('trips/');
            }
            
            if($success != ''){
                $this->session->set_userdata('suc', $success);
                redirect('trip-list');
            }
               
	}
        
        //INPUT FILEDS
        public function tripMasterFields(){
            //TRIP MASTER TABLE
                $master_values = array(                    
                    'user_id'           => $this->session->userdata('user_id'),
                    'trip_name'         => $this->input->post('trip_name'),
                    'trip_category_id'  => $this->input->post('trip_category_id'),
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
                    'languages'         => $this->input->post('languages'),
                    'meal'              => $this->input->post('meal'),
                    'transport'         => $this->input->post('transport'),
                    'things_to_carry'   => $this->input->post('things_to_carry'),
                    'tour_type'         => $this->input->post('tour_type'),
                    'no_of_traveller'   => $this->input->post('no_of_traveller'),                        
                    'no_of_min_booktraveller' => $this->input->post('no_of_min_booktraveller'),
                    'no_of_max_booktraveller' => $this->input->post('no_of_max_booktraveller'),
                    'booking_cut_of_time_type' => $this->input->post('booking_cut_of_time_type'),
                    'booking_cut_of_day'  => $this->input->post('booking_cut_of_time_type') == 1?$this->input->post('booking_cut_of_time'):0,
                    'booking_cut_of_time' => $this->input->post('booking_cut_of_time_type') == 2?$this->input->post('booking_cut_of_time') * 24:0,
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
                    'is_terms_accpet'               => 1,
                    );
                
                    if(!empty($this->input->post('other_from_date'))){
                        $from = $this->input->post('other_from_date');
                        $from = date("Y-m-d", strtotime($from)).' 00:00:00';
                        $master_values['other_from_date'] = $from;
                    }
                    if(!empty($this->input->post('other_to_date'))){
                        $to = $this->input->post('other_to_date');
                        $to = date("Y-m-d", strtotime($to)).' 00:00:00';
                        $master_values['other_to_date'] = $to;
                    }                
                
            return $master_values;
        }
        
        //GALLERY IMAGES ADD
        function galleryImages($trip_id){
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
        }

        //PICKUP LOCATIONS ADD
        function pickupLocations($pickLocs,$trip_id){
            foreach($pickLocs as $k=>$v){
                if(isset($_POST['pickup_meeting_point'][$k]) && !empty($_POST['pickup_meeting_point'][$k])){
                    $pickLocValue = array(
                        'trip_id'  => $trip_id,
                        'city_id'  => $this->input->post('city_id'),
                        'location' => isset($_POST['pickup_meeting_point'][$k])?$_POST['pickup_meeting_point'][$k]:0,
                        'time'     => isset($_POST['pickup_meeting_time'][$k])?$_POST['pickup_meeting_time'][$k]:0,
                        'landmark' => isset($_POST['pickup_landmark'][$k])?$_POST['pickup_landmark'][$k]:0,
                    );
                    $query2   = insertTable('pick_up_location_map',$pickLocValue);
                }
            }
        }
        
        //ITINERARY ADD
        function itineraryAdd($trip_id){
            //TRIP IITINERARY
                if(!empty($this->input->post('trip_from_time'))){
                    foreach($this->input->post('trip_from_time') as $k=>$v){

                        if(isset($_POST['trip_from_time'][$k]) && !empty($_POST['trip_from_time'][$k])){
                            $itiValue = array(
                                'trip_id'           => $trip_id,
                                'from_time'         => isset($_POST['trip_from_time'][$k])?$_POST['trip_from_time'][$k]:0,
                                'to_time'           => isset($_POST['trip_to_time'][$k])?$_POST['trip_to_time'][$k]:0,
                                'title'             => isset($_POST['trip_from_title'][$k])?$_POST['trip_from_title'][$k]:'',                             
                                'short_description' => isset($_POST['trip_short_dec'][$k])?$_POST['trip_short_dec'][$k]:'',                             
                                'brief_description' => isset($_POST['trip_brief_dec'][$k])?$_POST['trip_brief_dec'][$k]:'',                             
                            );
                            $query4   = insertTable('trip_itinerary',$itiValue);
                        }
                    }
                }
        }
        
        //TAGS ADD
        function tagAddUpdate($trip_id,$isUpdate = 0){
            if(!empty($this->input->post('tags'))){                        
                $tags = $this->input->post('tags');
                $tags = explode(',',$tags);
                if(count($tags) >0){
                    foreach($tags as $v){
                        $tag_exists = selectTable('trip_tags', array('LOWER(name)'=>$v),['*'],[],[],'','',[],'result_array');

                         $tag_map['trip_id'] = $trip_id;
                        if(count($tag_exists) > 0){ //CHECK EXISTS
                            $tag_map['tag_id'] = isset($tag_exists[0]['id'])?$tag_exists[0]['id']:0;
                        }else{ //IF NOT THEN CREATE
                            $newTagValue = array(
                                'name'       => $v,
                                'created_on' => date('Y-m-d H:i:s'),
                                'created_by' => $this->session->userdata('user_id'),
                            );
                            $tag_query   = insertTable('trip_tags', $newTagValue);
                            $tag_map['tag_id'] = $this->db->insert_id();
                        }

                        if($isUpdate == 1){
                            $isUpdate = 0;
                            $this->db->select()->from('trip_tag_map')->where(array('trip_id'=>$trip_id,'tag_id' => $tag_map['tag_id']));
                            $tagEx = $this->db->get()->result_array();

                            if(count($tagEx) > 0){                                        
                                $tagUpQry = updateTable('trip_tag_map',array('trip_id' => $trip_id,'tag_id' => $tag_map['tag_id']),array('isactive' => 1));                                
                                $isUpdate = 1;
                            }
                        }

                        if($isUpdate == 0){
                            //ADD TRIP MAP TABLE
                            $tag_query   = insertTable('trip_tag_map', $tag_map);
                        }
                    }
                }

            }
        }
        
        //TRIP AVAILABLE
        function getTripAvailable($trip_id){
            return array(
                            'trip_id'   => $trip_id,
                            'monday'    => !empty($this->input->post('trip_ava_mon'))?1:0,
                            'tuesday'   => !empty($this->input->post('trip_ava_tue'))?1:0,
                            'wednesday' => !empty($this->input->post('trip_ava_wed'))?1:0,
                            'thursday'  => !empty($this->input->post('trip_ava_thu'))?1:0,
                            'friday'    => !empty($this->input->post('trip_ava_fri'))?1:0,
                            'saturday'  => !empty($this->input->post('trip_ava_sat'))?1:0,
                            'sunday'    => !empty($this->input->post('trip_ava_sun'))?1:0,
                        );
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
         
        $whereData = array('isactive' => 1);
        $data['category_list'] = selectTable('trip_category', $whereData,['*'],[],[],'','',[],'result_array');
        $tags_list = selectTable('trip_tags', $whereData);
        $tags=array(); if(isset($tags_list) && $tags_list->num_rows()>0) foreach($tags_list->result() as $tg) {$tags[]=  array('value'=>strtolower($tg->name)); }
        $data['tags'] = $tags;
        
        //echo "<pre>";print_r($data);exit;
        
        $this->load->view('trip/trip-list',$data);
    }
    public function trip_calendar_view() {
         if ($this->session->userdata('user_id') == '') {redirect('login');}
        
        $this->load->view('trip/trip-calendar-view');
    }
    public function trip_view($tripCode = null) { 
         if ($this->session->userdata('user_id') == '') {redirect('login');}
         
        $data  = $this->getTripDetails($tripCode,1); 
        
        if(isset($data['details']['trip_category_id']) && isset($data['details']['id'])){
            $whereData = array(
                'user_id' => $this->session->userdata('user_id'),
                'trip_category_id' =>$data['details']['trip_category_id'],
                'isactive'=>1,
                'id !=' => $data['details']['id']);
            $data['related_tours'] = selectTable('trip_master', $whereData,['*'],[],[],'','',[],'result_array');       
        }
        //echo "<pre>";print_r($data['pickups']);exit;
        
        $this->load->view('trip/trip-view',$data);
    }
    
    //GET TRIP LIST DATA
    public function getTripLists(){
        $returnedData = [];
        
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            try{
                if(!empty($this->input->post('currentPage'))){
                    $whereData = array('isactive' => 1);
                    
                    $page = ($this->input->post('currentPage') - 1) * 5;
                    
                    $tot_sql   = "SELECT tm.*,ts.to_user_mail as shared_email FROM trip_master as tm "
                            . "LEFT JOIN trip_tag_map as tam ON tam.trip_id = tm.id AND tam.isactive = 1 "                            
                            . "LEFT JOIN trip_tags as tt ON tt.id = tam.tag_id "
                            . "LEFT JOIN trip_shared as ts ON ts.trip_id = tm.id AND ts.isactive = 1 AND tm.is_shared = 1 "
                            . "WHERE tm.user_id = ? AND tm.isactive = ? ";
                    
                    //FILTER BY TITLE
                    $searchTitle = $this->input->post('search_title',true);
                    if(!empty($searchTitle)){                        
                        $tot_sql .= " AND tm.trip_name LIKE '%{$searchTitle}%' ESCAPE '!'";
                    }
                    
                    //FILTER BY PRICE
                    $searchPrices = $this->input->post('search_price',true);
                    if(!empty($searchPrices)){
                        $searchPrices = rtrim($searchPrices,', ');
                        $searchPrices = explode(',',$searchPrices);
                        
                        if(count($searchPrices) > 0){
                            
                            $prQry = ''; 
                            foreach($searchPrices as $v){
                                $searchPrice = explode('-', $v);
                                if(count($searchPrice) > 0){ 
                                    if(isset($searchPrice[1])){
                                        $prQry .= " (tm.price_to_adult >= {$searchPrice[0]} AND tm.price_to_adult <= {$searchPrice[1]}) OR ";
                                    }else{
                                        $prQry .= " (tm.price_to_adult >= {$searchPrice[0]}) OR ";
                                    }
                                }                            
                            }
                            
                            if($prQry != ''){
                                $prQry   = rtrim($prQry,'OR ');
                                $tot_sql .= " AND (" .$prQry. " )";
                            }
                           
                        }
                        
                    }
                    
                    //FILTER BY PEOPLE
                    $searchPeoples = $this->input->post('search_people',true);
                    if(!empty($searchPeoples)){
                        $searchPeoples = rtrim($searchPeoples,', ');
                        $searchPeoples = explode(',',$searchPeoples);
                        
                        if(count($searchPeoples) > 0){
                            
                            $peQry = ''; 
                            foreach($searchPeoples as $v){
                                $searchPeople = explode('_', $v);
                                if(count($searchPeople) > 0){ 
                                    if(isset($searchPeople[1])){
                                        $peQry .= " (tm.no_of_traveller >= {$searchPeople[0]} AND tm.no_of_traveller <= {$searchPeople[1]}) OR ";
                                    }else{
                                        $peQry .= " (tm.no_of_traveller >= {$searchPeople[0]}) OR ";
                                    }
                                }                            
                            }
                            
                            if($peQry != ''){
                                $peQry   = rtrim($peQry,'OR ');
                                $tot_sql .= " AND (" .$peQry. " )";
                            }
                           
                        }
                        
                    }
                    
                    //FILTER BY CATEGORY
                    $searchCategories = $this->input->post('search_category',true);
                    if(!empty($searchCategories)){
                        $searchCategories = rtrim($searchCategories,', ');
                        
                        if($searchCategories != ''){
                            $tot_sql .= " AND tm.trip_category_id IN(".$searchCategories.")";
                        }
                        
                    }
                    
                    //FILTER BY TAGS
                    $search_tags = $this->input->post('search_tags',true);
                    if(!empty($search_tags) && $search_tags != 'undefined'){  
                        
                        $search_tags = explode(',',$search_tags);
                        
                        $taQry = '';
                        
                        if(count($search_tags) > 0);{
                            foreach($search_tags as $v){
                                $taQry .="'".$v."',";
                            }
                            $taQry = rtrim($taQry,', ');
                        }
                        
                        $tot_sql .= " AND tt.name IN(".$taQry.")"; 
                    }
                    
                    //GROUP BY
                    $tot_sql .= ' GROUP BY tm.id';
                    
                    //ORDER BY
                    $sort_by = $this->input->post('sort_by',true);
                    if(!empty($sort_by)){  
                        if($sort_by == '1'){  //PRICE
                            $tot_sql .= ' ORDER BY tm.price_to_adult ASC';
                        }else if($sort_by == '2'){ //LOCATION
                            $tot_sql .= ' ORDER BY tm.meeting_point ASC';
                        }else if($sort_by == '3'){ //CATEGORY
                            $tot_sql .= ' ORDER BY tm.trip_category_id ASC';
                        }else if($sort_by == '4'){ //NEW POST
                            $tot_sql .= ' ORDER BY tm.created_on DESC';
                        }else if($sort_by == '5'){ //USER RATING
                            $tot_sql .= ' ORDER BY tm.total_rating DESC';
                        }
                    }
                    
                    
                    $tot_query = $this->db->query($tot_sql, array($this->session->userdata('user_id'), 1));
                    
                    $res_sql   = $tot_sql." LIMIT ?,5";
                    $res_query = $this->db->query($res_sql, array($this->session->userdata('user_id'), 1, $page));
                    
                    //echo $this->db->last_query();exit;
                    
                    if($res_query->num_rows() > 0){
                        $returnedData["total_count"] = $tot_query->num_rows();
                        $returnedData["last_page"]   = ceil($returnedData["total_count"] / 5);
                        $returnedData['results']     = $res_query->result_array();
                    }
                    
                }
                
            }catch(Exception $e){}
        }
        
        echo json_encode($returnedData);exit;
    }
    
    public function getTripDetails($tripCode,$inc = 0){
        $this->load->model('Trip_model');
        
        $data['details'] = $this->Trip_model->getDetails($tripCode);
        
        if(count($data['details']) > 0 && isset($data['details']['id'])){
            $data['available_days'] = $this->Trip_model->getAvailableDays($data['details']['id']);
            $data['galleries']      = $this->Trip_model->getGalleries($data['details']['id']);
            if($inc == 1){
                $data['inclusions'] = $this->Trip_model->getInclusionsName($data['details']['id']);
            }else{
                $data['inclusions'] = $this->Trip_model->getInclusions($data['details']['id']);
            }
            $data['itineraries']    = $this->Trip_model->getItinerary($data['details']['id']);
            $data['tags']           = $this->Trip_model->getTags($data['details']['id']);
            $data['pickups']        = $this->Trip_model->getPickupLocations($data['details']['id']);
            
        }
        
        return $data;
        
    }
}
