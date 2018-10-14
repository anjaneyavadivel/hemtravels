<?php
class Tripshared_model extends CI_Model
{

    // Function 1:Get state master list
    function trip_list($whereData,$limit, $start) {
        $this->db->select('ts.*,tm.trip_code,sum.user_fullname AS sharedusername,um.user_fullname AS tousername,tm.trip_name,mtm.trip_name AS maked_trip_name');
        $this->db->select('tm.trip_name AS trip_name,um.user_fullname AS user_fullname,um.email AS email,cm.coupon_name AS coupon_name,cm.offer_type,cm.percentage_amount');
        $this->db->from('trip_shared AS ts');
        $this->db->join('user_master AS sum', 'ts.shared_user_id = sum.id','LEFT');
        $this->db->join('user_master AS um', 'ts.user_id = um.id','LEFT');
        $this->db->join('trip_master AS tm', 'ts.trip_id = tm.id','LEFT');
        $this->db->join('trip_master AS mtm', 'ts.id = mtm.trip_shared_id','LEFT');
        $this->db->join('coupon_code_master_history AS cm', 'ts.coupon_history_id = cm.id','LEFT');
        if(isset($whereData['title']) && $whereData['title']!=''){
            $this->db->where('(tm.trip_name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR ts.code LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )');
        }
        if(isset($whereData['status']) && $whereData['status']!=''){
            $this->db->where('ts.status',$whereData['status']);
        }
        if(isset($whereData['loginuserid']) && $whereData['loginuserid']!=''){
              $this->db->where('(ts.shared_user_id IN ('.$this->db->escape_like_str($whereData['loginuserid']).') OR ts.user_id IN('.$this->db->escape_like_str($whereData['loginuserid']).'))');
        }
        if(isset($whereData['isactive']) && $whereData['isactive']!=''){
            $this->db->where('ts.isactive',$whereData['isactive']);
        }$this->db->group_by('ts.id');
        $this->db->order_by('ts.id DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    function trip_count($whereData) {
         $this->db->select('ts.*,tm.trip_code,sum.user_fullname AS sharedusername,um.user_fullname AS tousername,tm.trip_name');
		$this->db->select('tm.trip_name AS trip_name,um.user_fullname AS user_fullname,um.email AS email,cm.coupon_name AS coupon_name');
		$this->db->from('trip_shared AS ts');
		$this->db->join('user_master AS sum', 'ts.shared_user_id = sum.id');
		$this->db->join('user_master AS um', 'ts.user_id = um.id');
		$this->db->join('trip_master AS tm', 'ts.user_id = tm.user_id');
		$this->db->join('coupon_code_master_history AS cm', 'ts.coupon_history_id = cm.coupon_code_id','LEFT');
        if(isset($whereData['title']) && $whereData['title']!=''){
            $this->db->where('(tm.trip_name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR ts.code LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )');
        }
        if(isset($whereData['status']) && $whereData['status']!=''){
            $this->db->where('ts.status',$whereData['status']);
        }
        if(isset($whereData['isactive']) && $whereData['isactive']!=''){
            $this->db->where('ts.isactive',$whereData['isactive']);
        }
        if(isset($whereData['loginuserid']) && $whereData['loginuserid']!=''){
              $this->db->where('(ts.shared_user_id IN ('.$this->db->escape_like_str($whereData['loginuserid']).') OR ts.user_id IN('.$this->db->escape_like_str($whereData['loginuserid']).'))');
        }$this->db->group_by('ts.id');
        $query = $this->db->get();
        return $query->num_rows();
    }

    
}
?>