<?php
class Tag_model extends CI_Model
{
    // Function 1:Get category master list
    function tag_list($limit, $start,$tag_search) {
        $this->db->select()->from('trip_tags');
        $this->db->like('name',$tag_search);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    function tag_count($tag_search) {
        $this->db->select()->from('trip_tags');
        $this->db->like('name',$tag_search);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function tag_insert($data) {
        $this->db->insert('trip_tags', $data);
        return $this->db->insert_id();
    }

    function tag_detail($data) {
        $this->db->select()->from('trip_tags')->where($data);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function tag_update($data, $where) {
        $this->db->where($where);
        $this->db->update('trip_tags', $data);
        return $this->db->affected_rows();
    }

}

?>