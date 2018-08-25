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
	function getInclusionsName($id)
	{		
            $this->db->select('ti.name')
                    ->from('trip_inclusions_map tim')
                    ->join('trip_inclusions ti','ti.id = tim.inclusions_id','inner')->where(array('tim.trip_id'=>$id,'tim.isactive' => 1));
            $query = $this->db->get();
            $re = $query->result_array();
            if(count($re) > 0){
                $re = array_column($re, 'name');
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
        
        function getSharedDetails($id)
	{		
            $this->db->select('ts.*,um.user_fullname')->from('trip_shared ts')
                    ->join('user_master um','um.id = ts.user_id','left')->where(array('ts.trip_id'=>$id,'ts.isactive' => 1));
            $query=$this->db->get();
            
            return $query->row_array();
            
	}
        function getTotalReview($id)
	{            
            return $this->db->where(array('trip_id'=>$id,'isactive' => 1))->count_all_results('trip_comment');            
	}
	function getTripAllReviews($id)
	{		
            $this->db->select('ts.*,DATE_FORMAT(ts.created_on, "%h:%i %p - %b %m -%Y") as review_date,um.user_fullname')->from('trip_comment ts')
                    ->join('user_master um','um.id = ts.user_id','left')->where(array('ts.trip_id'=>$id,'ts.isactive' => 1));
            $query=$this->db->get();
            
            return $query->result_array();
            
	}
	
        function getCutoffDaysTime($date,$type,$days,$hours,$meeting_time){
            $disableDays = [];
            if($type == 1){ //DAYS DISABLE
               
                for($i=1;$i<=$days;$i++){
                    $fo_date = strtotime("+".$i." days", strtotime($date));
                    $disableDays[$i-1] = date("Y-m-d", $fo_date);
                }
                
            }else if($type == 2){ //HOURS DISABLE   
                
                if($hours >= 24){                    
                    $days = floor($hours / 24);
                    for($i=1;$i<=$days;$i++){
                        $fo_date = strtotime("+".$i." days", strtotime($date));
                        $disableDays[$i-1] = date("Y-m-d", $fo_date);
                    }
                }else{                
                    $createdDateTime = strtotime($date);
                    $meeting_time_ca = explode(':',$meeting_time); 
                    
                    if(isset($meeting_time_ca[0]) && $meeting_time_ca[0] > $hours){
                        
                        $diff_h   = $meeting_time_ca[0] - $hours;                        
                        $diff_h_s = $diff_h .' hours '.$meeting_time_ca[1].' minutes';
                        
                        $fo_dateTime     = strtotime("+".$diff_h_s, $createdDateTime);                        
                        $fo_date         = strtotime(date("Y-m-d", $fo_dateTime)); 
                        $d = date('Y-m-d H:i:s');
                        $currentDateTime = strtotime($d);
                        $currentDate     = strtotime(date('Y-m-d')); 
                        
                        if($fo_dateTime < $currentDateTime && $fo_date == $currentDate){
                            $disableDays[0] = date("Y-m-d", $createdDateTime);
                        }
                        
                    }else{
                        $disableDays[0] = date("Y-m-d", $createdDateTime);
                    }
                }
                
            }
            return json_encode($disableDays);
        }
	function getWishlist($id)
	{		
            $this->db->select()->from('user_wishlist')->where(array('trip_id'=>$id,'user_id'=>$this->session->userdata('user_id'),'isactive' => 1));
            return $this->db->get()->row();            
	}
	function getUserIdByEmail($email)
	{		
            $this->db->select()->from('user_master')->where(array('email'=>$email,'isactive' => 1));
            $result = $this->db->get()->row();
            $result = isset($result->id)?$result->id:'';
            return $result;            
	}
	function getTripTotalRating($tripId)
	{
            $query = $this->db->query('SELECT SUM(rating) as tot_rating,COUNT(id) as total FROM trip_comment WHERE isactive = 1');            
            return $query->row_array();
                      
	}
	
}
?>