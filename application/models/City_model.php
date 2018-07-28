<?php
class City_model extends CI_Model
{
	// Function 1:Get category master list
	function city_list()
	{		
		$this->db->select()->from('city_master');
		$query=$this->db->get();
		return $query->result_array();
	}
	
	function city_insert($data)
    {
        $this->db->insert('city_master', $data);
        return $this->db->insert_id();
    }
	function city_detail($id)
	{
		$this->db->select()->from('city_master')->where(array('id'=>$id));		
		$query=$this->db->get();
		return $query->row_array();
	}
	
	function city_update($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('city_master',$data);
		return $this->db->affected_rows();
	}
	
	
	
}
?>