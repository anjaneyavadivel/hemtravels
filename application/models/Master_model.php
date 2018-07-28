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

}

?>