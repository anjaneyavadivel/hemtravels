<?php

class 	Tripspecific_model extends CI_Model {

    // Function 1:Get coupon code master
    function trip_list($limit, $start,$trip_search = '',$offer_type='') {
        $user_id = $this->session->userdata('user_id');
        $this->db->select('tsd.*,tm.trip_name')->from('trip_specific_day AS tsd');
        $this->db->join('trip_master AS tm','tm.id=tsd.trip_id','LEFT');
        $this->db->where("(title LIKE '%".$this->db->escape_like_str($trip_search)."%')");
        if($offer_type!=''){
            $this->db->where('type',$offer_type);
        }
        
        $this->db->order_by("id","DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }
    function trip_count($trip_search = '',$offer_type='') {
        $user_id = $this->session->userdata('user_id');
        $this->db->select('tsd.*,tm.trip_name')->from('trip_specific_day AS tsd');
        $this->db->join('trip_master AS tm','tm.id=tsd.trip_id','LEFT');
        $this->db->where("(title LIKE '%".$this->db->escape_like_str($trip_search)."%')");
        if($offer_type!=''){
            $this->db->where('type',$offer_type);
        }
        
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        return $query->num_rows();
    }
	
	
}



?>