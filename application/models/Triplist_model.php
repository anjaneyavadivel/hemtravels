<?php

class Triplist_model extends CI_Model {

    // Function 1:Get category master list
    function trip_list($limit, $start,$trip_search) {
		$this->db->select('tm.id AS id,tm.created_on AS created_on,tm.isactive AS isactive,tm.trip_name AS trip_name,tm.price_to_adult AS price_to_adult,tm.status AS status,tm.total_booking,tm.trip_code');
		$this->db->from('trip_master AS tm');
        //$this->db->like('name',$trip_search);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    function trip_count($trip_search) {
        $this->db->select('tm.id AS id,tm.created_on AS created_on,tm.isactive AS isactive,tm.trip_name AS trip_name,tm.price_to_adult AS price_to_adult,tm.status AS status,tm.total_booking');
		$this->db->from('trip_master AS tm');
        //$this->db->like('name',$trip_search);
        $query = $this->db->get();
        return $query->num_rows();
    }
	function trip_update($data, $where) {
        $this->db->where($where);
        $this->db->update('trip_master', $data);
        return $this->db->affected_rows();
    }
	
	function trip_detail($data) {
        $this->db->select()->from('trip_master')->where($data);
        $query = $this->db->get();
        return $query->first_row('array');
    }


}

?>