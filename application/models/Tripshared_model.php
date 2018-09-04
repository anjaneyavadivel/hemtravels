<?php
class Tripshared_model extends CI_Model
{

    // Function 1:Get state master list
    function trip_list($limit, $start,$trip_search) {
        $this->db->select('ts.id AS id,ts.code AS code,ts.isactive AS isactive,ts.trip_id AS trip_id,ts.shared_user_id AS shared_user_id,ts.user_id AS user_id,ts.to_user_mail AS to_user_mail,ts.status AS status,ts.coupon_history_id AS coupon_history_id');
		$this->db->select('tm.trip_name AS trip_name,um.user_fullname AS user_fullname,um.email AS email,cm.coupon_name AS coupon_name');
		$this->db->from('trip_shared AS ts');
		$this->db->join('user_master AS um', 'ts.user_id = um.id');
		$this->db->join('trip_master AS tm', 'ts.user_id = tm.user_id');
		$this->db->join('coupon_code_master_history AS cm', 'ts.coupon_history_id = cm.coupon_code_id','LEFT');
        $this->db->like('tm.trip_name',$trip_search);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    function trip_count($trip_search) {
        $this->db->select('ts.id AS id,ts.code AS code,ts.isactive AS isactive,ts.trip_id AS trip_id,ts.shared_user_id AS shared_user_id,ts.user_id AS user_id,ts.to_user_mail AS to_user_mail,ts.status AS status,ts.coupon_history_id AS coupon_history_id');
		$this->db->select('tm.trip_name AS trip_name,um.user_fullname AS user_fullname,um.email AS email,cm.coupon_name AS coupon_name');
		$this->db->from('trip_shared AS ts');
		$this->db->join('user_master AS um', 'ts.user_id = um.id');
		$this->db->join('trip_master AS tm', 'ts.user_id = tm.user_id');
		$this->db->join('coupon_code_master_history AS cm', 'ts.coupon_history_id = cm.coupon_code_id','LEFT');
        $this->db->like('tm.trip_name',$trip_search);
        $query = $this->db->get();
        return $query->num_rows();
    }

    
}
?>