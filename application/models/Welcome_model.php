<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model
{
	function get_trip_list()
	{
		$limit=8; 
		$this->db->select('tm.id,tm.trip_name AS trip_name,tm.trip_img_name AS trip_img_name,tm.created_on AS created_on,tm.isactive AS isactive,tm.status AS status');
		$this->db->from('trip_master AS tm');
		$this->db->join('user_master AS um', 'tm.user_id = um.id','INNER');
		$this->db->where(array('tm.isactive'=>1));
		$this->db->group_by('tm.user_id');
		$this->db->order_by("tm.created_on","desc");
		$this->db->limit($limit);
		$query=$this->db->get();
		return $query->result_array();
	}
		
		function get_trippopular_list()
	{
		$limit=10; 
		$this->db->select('tm.id,tm.total_booking AS total_booking,tm.trip_name AS trip_name,tm.trip_img_name AS trip_img_name,tm.created_on AS created_on,tm.isactive AS isactive,tm.status AS status');
		$this->db->from('trip_master AS tm');
		$this->db->join('user_master AS um', 'tm.user_id = um.id','INNER');
		$this->db->where(array('tm.isactive'=>1));
		$this->db->group_by('tm.total_booking');
		$this->db->order_by("tm.total_booking","desc");
		$this->db->limit($limit);
		$query=$this->db->get();
		return $query->result_array();
	}
		
		function get_tripbooking_list()
	{
		$limit=5; 
		$this->db->select('tm.id AS id,tp.booked_on AS booked_on ,um.user_fullname AS user_fullname,tm.no_of_traveller AS no_of_traveller,tm.created_on AS created_on,tm.isactive AS isactive,tm.trip_name AS trip_name,tm.price_to_adult AS price_to_adult,tm.status AS status,tm.total_booking');
		$this->db->from('trip_master AS tm');
		$this->db->join('user_master AS um', 'tm.user_id = um.id','INNER');
		$this->db->join('trip_book_pay AS tp', 'tp.user_id = tm.user_id','INNER');
        $this->db->limit($limit);
		$query=$this->db->get();
        return $query->result_array();
	}
	function get_list()
	{
		$limit=2; 
		$this->db->select('tm.id AS id,tp.booked_on AS booked_on ,um.user_fullname AS user_fullname,tm.no_of_traveller AS no_of_traveller,tm.created_on AS created_on,tm.isactive AS isactive,tm.trip_name AS trip_name,tm.price_to_adult AS price_to_adult,tm.status AS status,tm.total_booking');
		$this->db->from('trip_master AS tm');
		$this->db->join('user_master AS um', 'tm.user_id = um.id','INNER');
		$this->db->join('trip_book_pay AS tp', 'tp.user_id = tm.user_id','INNER');
		$this->db->where(array('tm.isactive'=>1,'tp.status'=>2));
        $this->db->limit($limit);
		$query=$this->db->get();
        return $query->result_array();
	}
}