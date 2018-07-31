<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trips extends CI_Controller {

   

    public function make_new_trip($isshared = 0) {
         if ($this->session->userdata('user_id') == '') {redirect('login');}
         
        $whereData = array('isactive' => 1);
        $tags_list= selectTable('trip_tags', $whereData);
        $tags=array(); if(isset($tags_list) && $tags_list->num_rows()>0) foreach($tags_list->result() as $tg) {$tags[]=  array('value'=>strtolower($tg->name)); }
        $data['tags']=$tags;
        $whereData = array('isactive' => 1,'country_id' => 1);
        $data['state_list']= selectTable('state_master', $whereData);
        $data['isshared']=$isshared;
        $this->load->view('trip/make-new-trip',$data);
    }

     public function getalltags() {
        if ($this->session->userdata('user_id') == '') {return FALSE;}
         
        $whereData = array('isactive' => 1);
        $tags_list= selectTable('trip_tags', $whereData);
        $tags=array(); if(isset($tags_list) && $tags_list->num_rows()>0) foreach($tags_list->result() as $tg) {$tags[]=$tg->name; }
        echo json_encode($tags);
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
