<?php
class City_model extends CI_Model
{
    // Function 1:Get category master list
    function city_list($limit, $start,$city_search) {
        $this->db->select()->from('city_master');
        $this->db->like('name',$city_search);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    function city_count($city_search) {
        $this->db->select()->from('city_master');
        $this->db->like('name',$city_search);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function city_insert($data) {
        $this->db->insert('city_master', $data);
        return $this->db->insert_id();
    }

    function category_detail($data) {
        $this->db->select()->from('city_master')->where($data);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function city_update($data, $where) {
        $this->db->where($where);
        $this->db->update('city_master', $data);
        return $this->db->affected_rows();
    }

}

?>