<?php
class State_model extends CI_Model
{
	// Function 1:Get category master list
	function state_list()
	{		
		$this->db->select()->from('state_master');
		$query=$this->db->get();
		return $query->result_array();
	}
	
	function state_insert($data)
    {
        $this->db->insert('state_master', $data);
        return $this->db->insert_id();
    }
	function state_detail($id)
	{
		$this->db->select()->from('state_master')->where(array('id'=>$id));		
		$query=$this->db->get();
		return $query->row_array();
	}
	
	function state_update($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('state_master',$data);
		return $this->db->affected_rows();
	}
	
	
	
}
?>