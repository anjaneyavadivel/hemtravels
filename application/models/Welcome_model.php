<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model {

    function get_trip_list($where, $limit = '') {
        $this->db->select('tm.id,sm.name AS statename,tm.trip_code,tm.total_booking,tm.price_to_adult,tm.trip_name AS trip_name,tm.trip_img_name AS trip_img_name,tm.created_on AS created_on,tm.isactive AS isactive,tm.status AS status');
        $this->db->from('trip_master AS tm');
        $this->db->join('user_master AS um', 'tm.user_id = um.id', 'INNER');
        $this->db->join('state_master AS sm', 'tm.state_id = sm.id', 'INNER');
        $this->db->where($where);
        $this->db->order_by("tm.created_on", "desc");
        if ($limit != '') {
            $this->db->limit($limit);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_trippopular_list($where, $limit = '') {
        $this->db->select('tm.id,sm.name AS statename,tm.trip_code,tm.total_booking,tm.trip_name AS trip_name,tm.trip_img_name AS trip_img_name,tm.created_on AS created_on,tm.isactive AS isactive,tm.status AS status');
        $this->db->from('trip_master AS tm');
        $this->db->join('user_master AS um', 'tm.user_id = um.id', 'INNER');
        $this->db->join('state_master AS sm', 'tm.state_id = sm.id', 'INNER');
        $this->db->where($where);
        $this->db->order_by("tm.total_booking", "desc");
        if ($limit != '') {
            $this->db->limit($limit);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_tripbooking_list($where, $limit = '') {
        $this->db->select('tm.id AS id,tp.booked_on AS booked_on ,um.user_fullname AS user_fullname,tp.number_of_persons,tm.created_on AS created_on,tm.isactive AS isactive,tm.trip_name AS trip_name,tm.price_to_adult AS price_to_adult,tm.status AS status,tm.total_booking');
        $this->db->from('trip_book_pay AS tp');
        $this->db->join('trip_master AS tm', 'tp.trip_id = tm.id', 'INNER');
        $this->db->join('user_master AS um', 'tp.user_id = um.id', 'INNER');
        $this->db->where($where);
        if ($limit != '') {
            $this->db->limit($limit);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function faq_list() {
        $this->db->select('*')->from('faq_master')->where(array('isactive' => 1));
        $query = $this->db->get();
        return $query->result_array();
    }

    function faq_insert($data) {
        $this->db->insert('faq_master', $data);
        return $this->db->insert_id();
    }

    function faq_detail($id) {
        $this->db->select()->from('faq_master')->where(array('isactive' => 1, 'id' => $id));
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function faq_update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('faq_master', $data);
        return $this->db->affected_rows();
    }

    function get_tripcategory_list($where, $limit = '') {
        $this->db->select('cm.*,SUM(IF(tm.id IS NULL, 0, 1)) AS totaltrip');
        $this->db->from('trip_category AS cm');
        $this->db->join('trip_master AS tm', 'tm.trip_category_id = cm.id AND tm.isactive=1', 'LEFT');
        $this->db->where($where);
        $this->db->order_by("totaltrip", "DESC");
        $this->db->group_by("cm.id");
        if ($limit != '') {
            $this->db->limit($limit);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
	function contact_insert($data) {
        $this->db->insert('contact_us', $data);
        return $this->db->insert_id();
    }
	function contact_detail($id) {
        $this->db->select()->from('contact_us')->where(array('isactive' => 1, 'id' => $id));
        $query = $this->db->get();
        return $query->first_row('array');
    }

}
?>

