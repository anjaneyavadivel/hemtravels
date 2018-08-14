<?php

class Triplist_model extends CI_Model {

    // Function 1:Get category master list
    function trip_list($limit, $start,$trip_search) {
		$this->db->select('tm.id AS id,tbp.trip_id AS trip_id,tm.created_on AS created_on,tm.isactive AS isactive,tm.trip_name AS trip_name,tm.price_to_adult AS price_to_adult,tm.status AS status');
		$this->db->from('trip_master AS tm');
		$this->db->join('trip_book_pay AS tbp', 'tm.id = tbp.trip_id','LEFT');
        //$this->db->like('name',$trip_search);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    function trip_count($trip_search) {
        $this->db->select('tm.id AS id,tbp.trip_id AS trip_id,tm.created_on AS created_on,tm.isactive AS isactive,tm.trip_name AS trip_name,tm.price_to_adult AS price_to_adult,tm.status AS status');
		$this->db->from('trip_master AS tm');
		$this->db->join('trip_book_pay AS tbp', 'tm.id = tbp.trip_id','LEFT');

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
function total_booking($trip)
	{
		$this->db->select("count(id) AS total");
		$this->db->from('trip_book_pay');
		$this->db->where(array('trip_id'=>$trip));
	}

}

?>