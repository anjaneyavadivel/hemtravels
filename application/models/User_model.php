<?php if(!defined('BASEPATH'))exit('No direct script access allowed');
class User_model extends CI_Model 
{
	function insert_user($data)
	{
		$this->db->insert('user_master',$data);
		return $this->db->insert_id();
	}
	
	function get_user_detail($user_id)
	{
		$this->db->select()->from('user_master');
		$this->db->where(array('um_user_id'=>$user_id,'um_status'=>1));
		$query=$this->db->get();
		$result=$query->first_row('array');
		return $result;
	}	
	function update_user($updateData,$whereData)
	{
		$this->db->where($whereData);
		$this->db->update('user_master',$updateData);
	}
	/*Select Data By Condition From A Table*/	
	function select($table,$cond)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($cond);
		$query = $this->db->get();
		return $query;
	}
	
	
}
?>