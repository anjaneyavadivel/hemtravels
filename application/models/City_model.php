<?php
class City_model extends CI_Model
{
    // Function 1:Get category master list
	
	function city_list($limit, $start,$city_search) {
        $this->db->select('sm.id AS sid,sm.name AS sname,cim.isactive AS isactive,sm.country_id AS country_id,cm.name AS cname,cim.id AS id,cim.id AS id,cim.name AS name,cim.state_id AS csid');
		$this->db->from('city_master AS cim');
		$this->db->join('state_master AS sm', 'sm.id = cim.state_id');
		$this->db->join('country_master AS cm', 'sm.country_id = cm.id');
        $this->db->like('cim.name',$city_search);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    function city_count($city_search) {
        $this->db->select()->from('city_master');
        $this->db->like('name',$city_search);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function city_insert($data) {
        $this->db->insert('city_master', $data);
        return $this->db->insert_id();
    }

    function city_detail($data) {
        $this->db->select()->from('city_master')->where($data);
        $query = $this->db->get();
        return $query->first_row('array');
    }

	function industrycategory_detail($ica_category_id)
	{
		$this->db->select()->from('industry_category')->where(array('ica_active'=>1,'ica_category_id'=>$ica_category_id));		
		$query=$this->db->get();
		return $query->first_row('array');
	}
	
    function city_update($data, $where) {
        $this->db->where($where);
        $this->db->update('city_master', $data);
        return $this->db->affected_rows();
    }

}

?>


