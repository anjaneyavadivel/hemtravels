<?php
class State_model extends CI_Model
{

    // Function 1:Get state master list
    function state_list($limit, $start,$state_search) {
        $this->db->select()->from('state_master');
        $this->db->like('name',$state_search);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    function state_count($state_search) {
        $this->db->select()->from('state_master');
        $this->db->like('name',$state_search);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function state_insert($data) {
        $this->db->insert('state_master', $data);
        return $this->db->insert_id();
    }

    function state_detail($data) {
        $this->db->select()->from('state_master')->where($data);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function state_update($data, $where) {
        $this->db->where($where);
        $this->db->update('state_master', $data);
        return $this->db->affected_rows();
    }

}

?>