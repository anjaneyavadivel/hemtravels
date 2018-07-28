<?php
class Tripinclusions_model extends CI_Model
{
	// Function 1:Get category master list
	function trip_list()
	{		
		$this->db->select()->from('trip_inclusions');
		$query=$this->db->get();
		return $query->result_array();
	}
	
	function trip_insert($data)
    {
        $this->db->insert('trip_inclusions', $data);
        return $this->db->insert_id();
    }
	function trip_detail($id)
	{
		$this->db->select()->from('trip_inclusions')->where(array('id'=>$id));		
		$query=$this->db->get();
		return $query->row_array();
	}
	
	function trip_update($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('trip_inclusions',$data);
		return $this->db->affected_rows();
	}
	
	
	
}
?>