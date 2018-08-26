<?php

class 	Tripspecific_model extends CI_Model {

    // Function 1:Get category master list
    function trip_list($limit, $start,$category_search) {
        $this->db->select()->from('trip_specific_day');
        $this->db->like('name',$category_search);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    function trip_count($category_search) {
        $this->db->select()->from('trip_category');
        $this->db->like('name',$category_search);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function trip_insert($data) {
        $this->db->insert('trip_category', $data);
        return $this->db->insert_id();
    }

    function trip_detail($data) {
        $this->db->select()->from('trip_category')->where($data);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function trip_update($data, $where) {
        $this->db->where($where);
        $this->db->update('trip_category', $data);
        return $this->db->affected_rows();
    }
    
}

?>