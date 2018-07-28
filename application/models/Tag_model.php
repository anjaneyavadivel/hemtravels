<?php
class Tag_model extends CI_Model
{
	// Function 1:Get category master list
	function tag_list()
	{		
		$this->db->select()->from('trip_tags');
		$query=$this->db->get();
		return $query->result_array();
	}
	
	function tag_insert($data)
    {
        $this->db->insert('trip_tags', $data);
        return $this->db->insert_id();
    }
	function tag_detail($id)
	{
		$this->db->select()->from('trip_tags')->where(array('id'=>$id));		
		$query=$this->db->get();
		return $query->row_array();
	}
	
	function tag_update($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('trip_tags',$data);
		return $this->db->affected_rows();
	}
	
	
	
}
?>