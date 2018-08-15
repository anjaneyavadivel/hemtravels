<?php

class Master_model extends CI_Model {

    // Function 1:Get category master list
    function category_list($limit, $start,$category_search) {
        $this->db->select()->from('trip_category');
        $this->db->like('name',$category_search);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    function category_count($category_search) {
        $this->db->select()->from('trip_category');
        $this->db->like('name',$category_search);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function category_insert($data) {
        $this->db->insert('trip_category', $data);
        return $this->db->insert_id();
    }

    function category_detail($data) {
        $this->db->select()->from('trip_category')->where($data);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function category_update($data, $where) {
        $this->db->where($where);
        $this->db->update('trip_category', $data);
        return $this->db->affected_rows();
    }
    
    // Function 1:Get coupon code master
    function coupon_code_list($limit, $start,$coupon_code_search = '',$offer_type='') {
        $user_id = $this->session->userdata('user_id');
        $this->db->select('ccm.*,tm.trip_name,tc.name AS categoryname')->from('coupon_code_master AS ccm');
        $this->db->join('trip_master AS tm','tm.id=ccm.trip_id','LEFT');
        $this->db->join('trip_category AS tc','tc.id=ccm.category_id','LEFT');
        $this->db->where("(coupon_code LIKE '%".$this->db->escape_like_str($coupon_code_search)."%' OR coupon_name LIKE '%".$this->db->escape_like_str($coupon_code_search)."%' )");
        if($offer_type!=''){
            $this->db->where('type',$offer_type);
        }
        if ($this->session->userdata('user_type') != 'SA') {
            $this->db->where_not_in('type',3);
        }
        if ($this->session->userdata('user_type') == 'VA') {
            $this->db->where('ccm.user_id',$user_id);
        }
        $this->db->order_by("id","DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }
    function coupon_code_count($coupon_code_search = '',$offer_type='') {
        $user_id = $this->session->userdata('user_id');
        $this->db->select('ccm.*,tm.trip_name,tc.name AS categoryname')->from('coupon_code_master AS ccm');
        $this->db->join('trip_master AS tm','tm.id=ccm.trip_id','LEFT');
        $this->db->join('trip_category AS tc','tc.id=ccm.category_id','LEFT');
        $this->db->where("(coupon_code LIKE '%".$this->db->escape_like_str($coupon_code_search)."%' OR coupon_name LIKE '%".$this->db->escape_like_str($coupon_code_search)."%' )");
        if($offer_type!=''){
            $this->db->where('type',$offer_type);
        }
        if ($this->session->userdata('user_type') != 'SA') {
            $this->db->where_not_in('type',3);
        }
        if ($this->session->userdata('user_type') == 'VA') {
            $this->db->where('ccm.user_id',$user_id);
        }
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        return $query->num_rows();
    }
	
	function coupon_code_update($data, $where) {
        $this->db->where($where);
        $this->db->update('coupon_code_master', $data);
        return $this->db->affected_rows();
    }
	
	function coupon_code_detail($data) {
        $this->db->select()->from('coupon_code_master')->where($data);
        $query = $this->db->get();
        return $query->first_row('array');
    }

}

?>