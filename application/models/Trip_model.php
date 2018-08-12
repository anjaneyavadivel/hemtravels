<?php
class Trip_model extends CI_Model
{	
	function getDetails($tripCode)
	{		
            $this->db->select()->from('trip_master')->where(array('trip_code'=>$tripCode,'isactive' => 1));
            $query=$this->db->get();
            return $query->row_array();
	}
	function getAvailableDays($id)
	{		
            $this->db->select()->from('trip_avilable')->where(array('trip_id'=>$id,'isactive' => 1));
            $query=$this->db->get();
            return $query->row_array();
	}
	function getGalleries($id)
	{		
            $this->db->select()->from('trip_gallery')->where(array('trip_id'=>$id,'isactive' => 1));
            $query=$this->db->get();
            return json_encode($query->result_array());
	}
	function getInclusions($id)
	{		
            $this->db->select('inclusions_id')->from('trip_inclusions_map')->where(array('trip_id'=>$id,'isactive' => 1));
            $query = $this->db->get();
            $re = $query->result_array();
            if(count($re) > 0){
                $re = array_column($re, 'inclusions_id');
            }
            return $re;
	}
	function getItinerary($id)
	{		
            $this->db->select()->from('trip_itinerary')->where(array('trip_id'=>$id,'isactive' => 1));
            $query=$this->db->get();
            return $query->result_array();
	}
	function getTags($id)
	{		
            $this->db->select('tt.name')->from('trip_tag_map ttm')
                    ->join('trip_tags tt','tt.id = ttm.tag_id','left')->where(array('ttm.trip_id'=>$id,'ttm.isactive' => 1));
            $query=$this->db->get();
            
            $tags = $query->result_array();
            
            $result = '';
            
            if(count($tags) > 0){
                $result = implode(', ', array_column($tags, 'name'));
            }
            
            return $result;
	}
        function getPickupLocations($id)
	{		
            $this->db->select()->from('pick_up_location_map')->where(array('trip_id'=>$id,'isactive' => 1));
            $query=$this->db->get();
            return $query->result_array();
	}
	
	
	
	
	
}
?>