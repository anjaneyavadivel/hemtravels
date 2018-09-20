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
        
        $data['is_shared'] = 0;
        $data['parent_trip_id'] = 0;
        
        //SHARED TRIP DETAILS
        if($this->uri->segment(1) == 'make-shared-trip'){
            
            $this->db->select('ts.*,tm.trip_code')->from('trip_shared as ts')
                    ->join('trip_master tm','tm.id = ts.trip_id','inner')
                    ->where(array('ts.user_id'=>$this->session->userdata('user_id'),'ts.isactive' => 1,'ts.status' => 1,'ts.code' => $tripCode));
            $query =$this->db->get();
            
            $result = $query->row_array(); 
            
            if(count($result) > 0){
                $tripCode = $result['trip_code'];
                $data['parent_trip_id'] = $result['shared_user_id'];
                $data['is_shared'] = 1;
                $data['share_code'] = $result['code'];
            }else{
                $this->session->set_userdata('err', 'Unable to share this trip');
                redirect('/');
            }
        }
       
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
        
        //SHARED TRIP DETAILS
        if($this->uri->segment(1) == 'make-shared-trip' && isset($data['trip_details']['galleries']) && !empty($data['trip_details']['galleries'])){
            $sharedGalleries = json_decode($data['trip_details']['galleries'],true);
            $shared_galleries = [];
            if(count($sharedGalleries) > 0){
               $shared_galleries  = array_column($sharedGalleries,'file_name');
            }
            $data['shared_galleries'] = json_encode($shared_galleries);
        }
        
        //echo "<pre>";print_r($data['shared_galleries']);exit;
        
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
        $succ = '';
        if ($_POST) 
        {
            $trip_id  = $this->input->post('trip_id');
            
            if(!empty($trip_id)){
                $whereData        = array('isactive' => 0);
                updateTable('trip_master',array('id' => $trip_id),$whereData);
                updateTable('trip_master',array('parent_trip_id' => $trip_id),$whereData);
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
            
                $this->form_validation->set_rules('trip_name', 'Trip name', 'trim|required');
                $this->form_validation->set_rules('trip_category_id', 'Trip Category id', 'trim|required');
                $this->form_validation->set_rules('trip_duration', 'Trip Duration', 'trim|required');
                $this->form_validation->set_rules('brief_description', 'Brief Description', 'trim|required');
                $this->form_validation->set_rules('no_of_traveller', 'No of traveller', 'trim|required');
                $this->form_validation->set_rules('no_of_min_booktraveller', 'No of min booltraveller', 'trim|required');
                
                if ($this->form_validation->run($this) == FALSE) {
                    $error = validation_errors();
                }else{
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
                            
                            //FOR SHARED TRIP
                            if(!empty($this->input->post('parent_trip_id')) && !empty($this->input->post('is_shared'))){
                                 $master_values['parent_trip_id'] = $this->input->post('parent_trip_id');
                            }

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
                            
                            
                            //UPDATE SHARED TRIP TABLE FOR SHARED TRIP
                            if(!empty($this->input->post('parent_trip_id')) && !empty($this->input->post('is_shared')) && !empty($this->input->post('share_code'))){
                                updateTable('trip_shared',array('code' => $this->input->post('share_code')),array('status' => 2));
                            }

                            $error   = '';
                            $success = 'New trip has been successfully added...'; 

                            $this->db->trans_complete();

                            if ($this->db->trans_status() === FALSE)
                            {
                                $error = 'New trip not added.please try again!.';  
                            }
                        }catch(Exception $e){}
                }            
            }
                
            if($error != ''){               
                $this->session->set_userdata('err', $error);
                
                //FOR SHARED TRIP
                if(!empty($this->input->post('parent_trip_id')) && !empty($this->input->post('is_shared')) && !empty($this->input->post('share_code'))){
                    redirect('make-shared-trip').$this->input->post('share_code');
                }else{
                    redirect('make-new-trip');
                }
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
            
            $this->form_validation->set_rules('trip_name', 'Trip name', 'trim|required');
            $this->form_validation->set_rules('trip_category_id', 'Trip Category id', 'trim|required');
            $this->form_validation->set_rules('trip_duration', 'Trip Duration', 'trim|required');
            $this->form_validation->set_rules('brief_description', 'Brief Description', 'trim|required');
            $this->form_validation->set_rules('no_of_traveller', 'No of traveller', 'trim|required');
            $this->form_validation->set_rules('no_of_min_booktraveller', 'No of min booltraveller', 'trim|required');
                
                if ($this->form_validation->run($this) == FALSE) {
                    $error = validation_errors();
                }else{
            
                    if (!empty($this->input->post('trip_id')) && !empty($this->input->post('trip_name')) && !empty($this->input->post('trip_category_id')) 
                        && !empty($this->input->post('trip_duration')) && !empty($this->input->post('brief_description')) 
                        && !empty($this->input->post('no_of_traveller')) && !empty($this->input->post('no_of_min_booktraveller'))) 
                    {
                        $error = 'Trip not updated.please try again!.';  

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
                            $success = 'Trip has been successfully updated...'; 

                            $this->db->trans_complete();

                            if ($this->db->trans_status() === FALSE)
                            {
                                $error = 'Trip not updated.please try again!.';  
                            }
                        }catch(Exception $e){}
                }        
            }
                
            if($error != ''){               
                $this->session->set_userdata('err', $error);
                redirect('trip-list');
            }
            
            if($success != ''){
                $this->session->set_userdata('suc', $success);
                redirect('trip-list');
            }
               
	}
        
        //INPUT FILEDS
        public function tripMasterFields(){
            
            $city_id = $this->input->post('city_id');
            if($city_id == 'other'){
                $city_id = $this->addNewCity($this->input->post('state_id'),$this->input->post('other_city'));
            }
            $category_id = $this->input->post('trip_category_id');
            if($category_id == 'other'){
                $category_id = $this->addNewCategory($this->input->post('other_category'));
            }
            
            //TRIP MASTER TABLE
                $master_values = array(                    
                    'user_id'           => $this->session->userdata('user_id'),
                    'trip_name'         => $this->input->post('trip_name'),
                    'trip_category_id'  => $category_id,
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
                    'brief_description' => htmlentities($this->input->post('brief_description')),
                    'languages'         => $this->input->post('languages'),
                    'meal'              => $this->input->post('meal'),
                    'transport'         => !empty($this->input->post('transport'))?htmlentities($this->input->post('transport')):null,
                    'things_to_carry'   => !empty($this->input->post('things_to_carry'))?htmlentities($this->input->post('things_to_carry')):null,
                    'tour_type'         => !empty($this->input->post('tour_type'))?htmlentities($this->input->post('tour_type')):null,
                    'no_of_traveller'   => !empty($this->input->post('no_of_traveller'))?htmlentities($this->input->post('no_of_traveller')):null,                        
                    'no_of_min_booktraveller' => $this->input->post('no_of_min_booktraveller'),
                    'no_of_max_booktraveller' => $this->input->post('no_of_max_booktraveller'),
                    'booking_cut_of_time_type' => $this->input->post('booking_cut_of_time_type'),
                    'booking_cut_of_day'  => $this->input->post('booking_cut_of_time_type') == 1?$this->input->post('booking_cut_of_time'):0,
                    'booking_cut_of_time' => $this->input->post('booking_cut_of_time_type') == 2?$this->input->post('booking_cut_of_time'):0,
                    'state_id'           => $this->input->post('state_id'),
                    'city_id'            => $city_id,
                    'cancellation_policy'=> !empty($this->input->post('cancellation_policy'))?htmlentities($this->input->post('cancellation_policy')):null,
                    'confirmation_policy'=> !empty($this->input->post('confirmation_policy'))?htmlentities($this->input->post('confirmation_policy')):null,
                    'refund_policy'      => !empty($this->input->post('refund_policy'))?htmlentities($this->input->post('refund_policy')):null,
                    'other_inclusions'   => !empty($this->input->post('other_inclusions'))?htmlentities($this->input->post('other_inclusions')):null,
                    'exclusions'         => !empty($this->input->post('exclusions'))?htmlentities($this->input->post('exclusions')):null,                   
                    'is_terms_accpet'    => 1,
                    'view_to'          => $this->input->post('view_to'),
                    'booking_max_cut_of_month' => !empty($this->input->post('booking_max_cut_of_month'))?$this->input->post('booking_max_cut_of_month'):12,
                    );           
                
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
                                'brief_description' => isset($_POST['trip_brief_dec'][$k])? htmlentities($_POST['trip_brief_dec'][$k]):'',                             
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
        
        // ADD NEW CITY
        function addNewCity($state_id,$name){            
            $cityValue = array(
                'state_id'  => $state_id,
                'name'      => $name,
                'created_on'  => date('Y-m-d H:i:s'),
                'created_by'  => $this->session->userdata('user_id')                       
            );
            return insertTable('city_master',$cityValue);
             
        }
        // ADD NEW Category
        function addNewCategory($name){            
            $categoryValue = array(               
                'name'      => $name,                
                'created_by'  => $this->session->userdata('user_id')                       
            );
            return insertTable('trip_category',$categoryValue);
             
        }
    
    public function trip_list() {
         
        $whereData = array('isactive' => 1);
        $data['category_list'] = selectTable('trip_category', $whereData,['*'],[],[],'','',[],'result_array');
        $tags_list = selectTable('trip_tags', $whereData);
        $tags=array(); if(isset($tags_list) && $tags_list->num_rows()>0) foreach($tags_list->result() as $tg) {$tags[]=  array('value'=>strtolower($tg->name)); }
        $data['tags'] = $tags;
        
        //echo "<pre>";print_r($data);exit;
        
        $this->load->view('trip/trip-list',$data);
    }
    
    public function trip_calendar_view($tripCode = null) {
        if ($this->session->userdata('user_type') != 'SA' && $this->session->userdata('user_type')!='VA' && $this->session->userdata('user_id') == '') {redirect('login');}
        
        $data  = $this->getTripDetails($tripCode); 
        $data['review_count'] = 0;
        if(isset($data['details']['id'])){ 
            $data['review_count'] = $this->Trip_model->getTotalReview($data['details']['id']);
        }
        
        $this->session->set_userdata('show_calendar_trip', $tripCode);
        
        $this->load->view('trip/trip-calendar-view',$data);
    }
    
    public function getCalendarData($file = null) {
        $query = $this->db->query("SELECT tb.date_of_trip as date,DAY(tb.date_of_trip) as day,Month(tb.date_of_trip) as month,
                 YEAR(date_of_trip) as year,count(*) as b_count,tm.no_of_traveller,tm.id as trip_id,
                 SUM(number_of_persons) AS totalbookedpersons,(tm.no_of_traveller - SUM(number_of_persons)) as availabletraveller
                 FROM `trip_book_pay` as tb 
                 INNER JOIN trip_master as tm ON tm.id = tb.trip_id 
                 where tb.status NOT IN(1,3)
                    and tm.user_id   = {$this->session->userdata('user_id')} "
                 . "and tm.trip_code = '{$this->session->userdata('show_calendar_trip')}' "
                 . "and tb.isactive  = 1 "
                . "GROUP by tb.date_of_trip");
        
        $result = $query->result_array(); //echo "<pre>";print_r($result);exit;
        $re_json = [];
        if(count($result) > 0){
            foreach($result as $v){
               
                $re_json[] = array(                    
                    "name" =>  'Total:'.$v['no_of_traveller'].'<br>Booked:'.$v['totalbookedpersons'].'<br>Available:'.$v['availabletraveller'],
                    "date"  => $v['day'],
                    "month" => $v['month'],
                    "year"  => $v['year'],
                    "start_time" => "",
                    // "end_time" => "15:30",
                    "color" => "4",
                    "description"  => $this->calendarDescription($v['date']),
                );
            }
        }//echo "<pre>";print_r($re_json);exit;
        echo json_encode($re_json);exit;
    }
    
    private function calendarDescription($date){
        $query2 = $this->db->query("SELECT tb.date_of_trip as date,tb.pnr_no,um.user_fullname,um.phone,tb.number_of_persons
                 FROM `trip_book_pay` as tb 
                 INNER JOIN trip_master as tm ON tm.id = tb.trip_id 
                 INNER JOIN user_master as um ON um.id = tb.user_id 
                 where tb.status NOT IN(1,3)
                 and tm.user_id = {$this->session->userdata('user_id')} and tb.isactive = 1 and tb.date_of_trip = '{$date}'");
                 
        $result2 = $query2->result_array(); //echo "<pre>";print_r($result);exit;
        $bookDescription = '';
        if(count($result2) > 0){
            $bookDescription = '<h3>Booking Details</h3><hr>
                <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Sno.</th>
                    <th>PNR No</th>
                    <th>No of persons</th>
                    <th>Customer</th>
                    <th>Phone</th>
                  </tr>
                </thead>
                <tbody>';
            
            foreach($result2 as $k=>$v){
                $sno = $k+1;
                $bookDescription .= '
                    <tr>
                        <td>'.$sno.'</td>
                        <td><a href="'.base_url().'/PNR-status/'.$v['pnr_no'].'" target="_blank">'.$v['pnr_no'].'<a></td>
                        <td>'.$v['number_of_persons'].'</td>
                        <td>'.$v['user_fullname'].'</td>
                        <td>'.$v['phone'].'</td>
                    </tr>';
            }
            
            $bookDescription .= '</tbody></table>';
        }
        return $bookDescription;
    }
    
    public function trip_view($tripCode = null) { 
         
        $data  = $this->getTripDetails($tripCode,1); 
        
        if(isset($data['details']['trip_category_id']) && isset($data['details']['id'])){
            $whereData = array(                
                'trip_category_id' => $data['details']['trip_category_id'],
                'isactive'         => 1,
                'id !='            => $data['details']['id']
            );
            
            if($this->session->userdata('user_type') == 'VA'){
                $whereData['user_id'] = $this->session->userdata('user_id');                
            }else if($this->session->userdata('user_type') == 'CU' || $this->session->userdata('user_type') == 'GU'){
                $whereData['view_to'] = 1;                
            }
            
            $data['related_tours'] = selectTable('trip_master', $whereData,['*'],[],[],'','',[],'result_array');  
            
             $this->load->helper('custom_helper');
            
            if(count($data['related_tours']) > 0){
                foreach ($data['related_tours'] as $k=> $v){
                    if(isset($data['related_tours'][$k]['brief_description']) && !empty($data['related_tours'][$k]['brief_description'])){
                        //$data['related_tours'][$k]['brief_description'] = html_entity_decode($data['related_tours'][$k]['brief_description']);
                    }
                    if(isset($data['related_tours'][$k]['id']) && !empty($data['related_tours'][$k]['id'])){
                        
                        $date = date('Y-m-d');
                        if($data['related_tours'][$k]['booking_cut_of_time_type'] == 1){
                            $fo_date = strtotime("+".$data['related_tours'][$k]['booking_cut_of_day']." days", strtotime($date));
                            $date = date("Y-m-d", $fo_date);
                        }
                        
                        $offerdata =array(
                        'trip_id'      => $data['related_tours'][$k]['id'],                
                        'date_of_trip' => $date,
                        'ischeckadmin' => 1);
                        if ($this->session->userdata('user_type') == 'VA') {
                            $offerdata['ischeckadmin']=0;
                        }

                        $data['related_tours'][$k]['offer_details'] = trip_offer($offerdata);
                    }
                }
            }
            
            
            $data['review_count'] = $this->Trip_model->getTotalReview($data['details']['id']);
            $data['all_reviews'] = $this->Trip_model->getTripAllReviews($data['details']['id']);
            $data['wishlist'] = $this->Trip_model->getWishlist($data['details']['id']);
            $data['cutoff_disable_days'] = $this->Trip_model->getCutoffDaysTime($data['details']['created_on'],$data['details']['booking_cut_of_time_type'],$data['details']['booking_cut_of_day'],$data['details']['booking_cut_of_time'],$data['details']['meeting_time']);
            $data['cutoff_max_month'] = $this->Trip_model->getCutoffMonth($data['details']['created_on'],$data['details']['booking_max_cut_of_month']);
            //echo "<pre>";print_r($data['pickups']);exit;
            //ALL PICKUP LOCATIONS
            if(isset($data['pickups']) && count($data['pickups']) > 0){
                $pickup_locations = '';
                foreach($data['pickups'] as $v){
                    $pickup_locations .= $v['location'].', ';
                }
                $data['pickup_locations'] = trim($pickup_locations,', ');
            }
            
            
            
        }
        //echo "<pre>";print_r($data['related_tours']);exit;
        
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
                            . "LEFT JOIN trip_category as tc ON tm.trip_category_id = tc.id AND tc.isactive = 1 "
                            . "LEFT JOIN city_master as cm ON tm.city_id = cm.id AND cm.isactive = 1 "
                            . "LEFT JOIN state_master as sm ON tm.state_id = sm.id AND sm.isactive = 1 "
                            . "WHERE tm.isactive = ? ";
                    
                    if($this->session->userdata('user_type') == 'VA') {
                        $tot_sql .=  'AND tm.user_id = '.$this->session->userdata('user_id').' ';
                    }
                    
                    //VIEW TO
                    if($this->session->userdata('user_type') != 'SA' || $this->session->userdata('user_type') != 'VA') {
                        $tot_sql .=  'AND tm.view_to = 1 ';
                    }
                    
                    //FILTER BY TITLE
                    $searchTitle = $this->db->escape_like_str($this->input->post('search_title',true));
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
                    
                     //FILTER BY SEARCH TERM
                    $searchTerm = $this->db->escape_like_str($this->input->post('search_term',true));
                    if(!empty($searchTerm)){                        
                        $tot_sql .= " AND (tm.trip_name LIKE '%{$searchTerm}%' ESCAPE '!' OR tc.name LIKE '%{$searchTerm}%' ESCAPE '!' "
                        . "OR cm.name LIKE '%{$searchTerm}%' ESCAPE '!' OR sm.name LIKE '%{$searchTerm}%' ESCAPE '!') ";
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
                    
                    
                    $tot_query = $this->db->query($tot_sql, array( 1));
                    
                    $res_sql   = $tot_sql." LIMIT ?,5";
                    $res_query = $this->db->query($res_sql, array( 1, $page));
                    
                    //echo $this->db->last_query();exit;
                    
                    $this->load->helper('custom_helper');
                    
                    
                    if($res_query->num_rows() > 0){
                        $returnedData["total_count"] = $tot_query->num_rows();
                        $returnedData["last_page"]   = ceil($returnedData["total_count"] / 5);
                        $returnedData['results']     = $res_query->result_array();
                        
                        if(count($returnedData['results']) > 0){
                            foreach ($returnedData['results'] as $k=> $v){
                                if(isset($returnedData['results'][$k]['brief_description']) && !empty($returnedData['results'][$k]['brief_description'])){
                                    $returnedData['results'][$k]['brief_description'] = html_entity_decode($returnedData['results'][$k]['brief_description']);
                                }
                                if(isset($returnedData['results'][$k]['id']) && !empty($returnedData['results'][$k]['id'])){
                                    
                                    $date = date('Y-m-d');
                                    if($returnedData['results'][$k]['booking_cut_of_time_type'] == 1){
                                        $fo_date = strtotime("+".$returnedData['results'][$k]['booking_cut_of_day']." days", strtotime($date));
                                        $date = date("Y-m-d", $fo_date);
                                    }
                                    
                                    $offerdata =array(
                                    'trip_id'      => $returnedData['results'][$k]['id'],                
                                    'date_of_trip' => $date,
                                    'ischeckadmin' => 1);
                                    if ($this->session->userdata('user_type') == 'VA') {
                                        $offerdata['ischeckadmin'] = 0;
                                    }
                                    
                                    $returnedData['results'][$k]['offer_details'] = trip_offer($offerdata);
                                }
                            }
                        }
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
            $data['shared_details'] = $this->Trip_model->getSharedDetails($data['details']['id']);
            $data['shared_details'] = $this->Trip_model->getSharedDetails($data['details']['id']);
            
        }
        
        return $data;
        
    }
    
    public function addRemoveWishlistAction(){
        $status = 'err';
        $message = 'Wishlist not added.please try again';
        if ($_POST) 
        {
            $trip_id  = $this->input->post('trip_id');
            $wishlist_id  = $this->input->post('wish_id');
            
            if(!empty($trip_id) && $wishlist_id <= 0){
                $wishValue = array(
                    'trip_id'     => $trip_id,
                    'user_id'     => $this->session->userdata('user_id') ,
                    'created_on'  => date('Y-m-d H:i:s'),
                    'created_by'  => $this->session->userdata('user_id')                       
                );
                $wishlist_id = insertTable('user_wishlist',$wishValue);
                
                if($wishlist_id > 0){
                    $status  = 'suc';
                    $message = 'Wishlist has been successfully added';
                }
            }else if(!empty($trip_id) && $wishlist_id > 0){
                $wishValue = array(
                    'isactive'   => 0,
                    'updated_on'   => date('Y-m-d H:i:s'),
                    'updated_by'  => $this->session->userdata('user_id')                       
                );
                updateTable('user_wishlist',array('id' => $wishlist_id),$wishValue);
                
                $status  = 'suc';
                $message = 'Wishlist has been successfully removed';
                
            }
        }
        
        
        $this->session->set_userdata($status, $message);            
        
        echo 'succss';exit;
    }
    
    public function review_action()
	{
            $msg = 'Please check your submission';$status = 'err';
            
                $this->form_validation->set_rules('trip_id', 'Trip Details', 'trim|required');
                $this->form_validation->set_rules('trip_code', 'Trip Details', 'trim|required');
                $this->form_validation->set_rules('user_name', 'User name', 'trim|required');
                $this->form_validation->set_rules('message', 'Message', 'trim|required');
                
                
                if ($this->form_validation->run($this) == FALSE) {
                    $msg = validation_errors();
                }else{
                    if (!empty($this->input->post('trip_id')) && !empty($this->input->post('trip_code')) && !empty($this->input->post('user_name')) && !empty($this->input->post('message')))
                       
                    {
                        $msg = 'Review not added.please try again!.';  

                        $this->db->trans_start(); 

                        try{
                            
                            $this->load->model('Trip_model');                             
                            
                            $totRating  = $this->Trip_model->getTripTotalRating($this->input->post('trip_id'));

                            if($this->session->userdata('user_type') == 'CU'){
                                $user_id = $this->session->userdata('user_id');
                            }else{
                                $user_id  = $this->Trip_model->getUserIdByEmail($this->input->post('email'));
                            }
                            
                            $revValue = array(
                                'trip_id'     => $this->input->post('trip_id'),
                                'user_id'     => $user_id,
                                'name'        => $this->input->post('user_name'),
                                'email'       => !empty($this->input->post('email'))?$this->input->post('email'):'',
                                'message'     => $this->input->post('message'),
                                'rating'      => $this->input->post('rating')                                                     
                            );
                            $review_id = insertTable('trip_comment',$revValue);
                            
                            //UPDATE TOTAL RATING IN TRIP MASTER
                            if($review_id > 0){
                                
                                $tot_rating = $totRating['tot_rating'] + $this->input->post('rating');
                                $noReview  = $totRating['total'] + 1;
                                $tot_re = (int)$tot_rating / (int)$noReview;
                                $tot_re = round($tot_re,1);

                               $tValue = array(
                                   'total_rating'   => $tot_re                                                         
                               );
                               updateTable('trip_master',array('id' => $this->input->post('trip_id')),$tValue);

                               $msg   = 'Review has been successfully added';
                               $status = 'suc'; 
                            }

                            $this->db->trans_complete();

                            if ($this->db->trans_status() === FALSE)
                            {
                                $msg = 'Review not added.please try again!.'; 
                            }
                        }catch(Exception $e){}
                }            
            }
            
            $this->session->set_userdata($status, $msg);
            redirect('trip-view/'.$this->input->post('trip_code'));
               
    }
    
    
    public function reviewDeleteAction(){
        $status = 'err';
        $message = 'Review not removed.please try again';
        if ($_POST) 
        {
            $trip_id   = $this->input->post('trip_id');
            $review_id = $this->input->post('review_id');
            
            if(!empty($trip_id) && !empty($review_id)){
                $comValue = array(
                    'isactive'   => 0                                         
                );
                updateTable('trip_comment',array('id' => $review_id),$comValue);
                
                $this->load->model('Trip_model');
                $totRating  = $this->Trip_model->getTripTotalRating($trip_id);
                $tot_rating = $totRating['tot_rating'];
                $noReview  = $totRating['total'] ;
                $tot_re = $tot_rating / $noReview;
                $tot_re = round($tot_re,1);

                $tValue = array(
                    'total_rating'   => $tot_re                                                         
                );
                updateTable('trip_master',array('id' => $trip_id),$tValue);
                
                $status  = 'suc';
                $message = 'Review has been successfully removed';
            }
        }
        
        
        $this->session->set_userdata($status, $message);            
        
        echo 'succss';exit;
    }
    
    public function tripLinkShareModal($tripCode = null) { 
        if ($this->session->userdata('user_id') == '' || 
            ($this->session->userdata('user_type') != 'SA' && $this->session->userdata('user_type') !='VA' )) {
            return FALSE;
        }
        $data['tripCode'] = $tripCode;
       
        $this->load->view("trip/trip-share-modal",$data);
        
    }
}
