<?php
class Tripinclusions_model extends CI_Model
{
    // Function 1:Get trip master list
    function trip_list($limit, $start,$trip_search) {
        $this->db->select()->from('trip_inclusions');
        $this->db->like('name',$trip_search);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    function trip_count($trip_search) {
        $this->db->select()->from('trip_inclusions');
        $this->db->like('name',$trip_search);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function trip_insert($data) {
        $this->db->insert('trip_inclusions', $data);
        return $this->db->insert_id();
    }

    function trip_detail($data) {
        $this->db->select()->from('trip_inclusions')->where($data);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function trip_update($data, $where) {
        $this->db->where($where);
        $this->db->update('trip_inclusions', $data);
        return $this->db->affected_rows();
    }

}

?>