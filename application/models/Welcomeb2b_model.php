<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcomeb2b_model extends CI_Model
{
	//Function-1 view event post 
	function get_trip_list()
	{
		$limit=2; 
		$this->db->select('tm.trip_name AS trip_name,tm.trip_img_name AS trip_img_name,tm.created_on AS created_on,tm.isactive AS isactive,tm.status AS status');
		$this->db->from('trip_master AS tm');
		//$this->db->join('trip_master AS tm', 'tm.user_id = um.id','LEFT');
		$this->db->where(array('tm.created_on >='=>date('Y-m-d'),'tm.isactive'=>1));
		$this->db->group_by('tm.user_id');
		$this->db->order_by("tm.created_on","desc");
		$this->db->limit($limit);
		$query=$this->db->get();
		return $query->result_array();
		
		
	}
		
}