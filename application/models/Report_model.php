<?php
class Report_model extends CI_Model
{
    // Function 1:Get category master list
    function booking_list($whereData,$limit, $start,$resultCount='no',$result_for = 'bk') {
        $this->db->select('tbpd.*,by.user_type,um.user_fullname,um.phone,trip_name,trip_code')->from('trip_book_pay_details AS tbpd');
        $this->db->join('trip_master', 'trip_master.id = tbpd.trip_id','INNER');
        $this->db->join('user_master AS um', 'um.id = tbpd.from_user_id','INNER');
        $this->db->join('user_master AS by', 'by.id = tbpd.booked_by','INNER');
        if(isset($whereData['title']) && $whereData['title']!=''){
            if($result_for == 'tt'){
                $this->db->where('(trip_master.trip_name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR trip_master.trip_code LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )');
            }else{
                $this->db->where('(pnr_no LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR um.phone LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR tbpd.status LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )');
            }
        }
        if(isset($whereData['bookfrom']) && $whereData['bookfrom']==1){
            $this->db->where('(by.user_type LIKE "%CU%" OR by.user_type LIKE "%GU%")');
        }
        if(isset($whereData['bookfrom']) && $whereData['bookfrom']==2){
            $this->db->where('by.user_type','VA');
        }
        if(isset($whereData['tbpd.user_id']) && $whereData['tbpd.user_id']!=''){
            $this->db->where('tbpd.user_id',$whereData['tbpd.user_id']);
        }
        if(isset($whereData['status']) && $whereData['status']!=''){
            $this->db->where('tbpd.status',$whereData['status']);
        }
        if(isset($whereData['from']) && $whereData['from']!=''){
            $from = date("Y-m-d", strtotime($whereData['from'])).' 00:00:00';
            $to = date("Y-m-d", strtotime($whereData['to'])).' 24:60:60';
            $this->db->where("(tbpd.date_of_trip >='".$this->db->escape_like_str($from)."' AND tbpd.date_of_trip <= '".$this->db->escape_like_str($to)."')");
        }
        if(isset($whereData['groupby']) && $whereData['groupby']!=''){
            $this->db->group_by($whereData['groupby']);
        } 
        $this->db->order_by('booked_on DESC');
        if($resultCount == 'yes'){
            $query = $this->db->get();
            return $query->num_rows();
        }else if($resultCount == 'download'){
            $query = $this->db->get();
            return $query->result_array();
        }else{
            $this->db->limit($limit, $start);
            $query = $this->db->get();
            return $query->result_array();
        }
    }

    function booking_count($whereData,$result_for = 'bk') {
        $this->db->select('tbpd.*,by.user_type,trip_name')->from('trip_book_pay_details AS tbpd');
        $this->db->join('trip_master', 'trip_master.id = tbpd.trip_id','INNER');
        $this->db->join('user_master AS um', 'um.id = tbpd.from_user_id','INNER');
        $this->db->join('user_master AS by', 'by.id = tbpd.booked_by','INNER');
        if(isset($whereData['title']) && $whereData['title']!=''){
            if($result_for == 'tt'){
                $this->db->where('(trip_master.trip_name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR trip_master.trip_code LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )');
            }else{ 
                $this->db->where('(pnr_no LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR um.phone LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR tbpd.status LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )');
            }
        }
        if(isset($whereData['bookfrom']) && $whereData['bookfrom']==1){
            $this->db->where('(by.user_type LIKE "%CU%" OR by.user_type LIKE "%GU%")');
        }
        if(isset($whereData['bookfrom']) && $whereData['bookfrom']==2){
            $this->db->where('by.user_type','VA');
        }
        if(isset($whereData['tbpd.user_id']) && $whereData['tbpd.user_id']!=''){
            $this->db->where('tbpd.user_id',$whereData['tbpd.user_id']);
        }
        if(isset($whereData['status']) && $whereData['status']!=''){
            $this->db->where('tbpd.status',$whereData['status']);
        }
        if(isset($whereData['from']) && $whereData['from']!=''){
            $from = date("Y-m-d", strtotime($whereData['from'])).' 00:00:00';
            $to = date("Y-m-d", strtotime($whereData['to'])).' 24:60:60';
            $this->db->where("(tbpd.date_of_trip >='".$this->db->escape_like_str($from)."' AND tbpd.date_of_trip <= '".$this->db->escape_like_str($to)."')");
        }
        if(isset($whereData['groupby']) && $whereData['groupby']!=''){
            $this->db->group_by($whereData['groupby']);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    // Function 1:Get category master list
    function cancellation_list($whereData,$limit, $start,$resultCount='no') {
        $this->db->select('tbpd.*,by.user_type,trip_name,trip_code')->from('trip_book_pay_details AS tbpd');
        $this->db->join('trip_master', 'trip_master.id = tbpd.trip_id','INNER');
        $this->db->join('user_master AS um', 'um.id = tbpd.from_user_id','INNER');
        $this->db->join('user_master AS by', 'by.id = tbpd.booked_by','INNER');
        if(isset($whereData['title']) && $whereData['title']!=''){
            $this->db->where('(pnr_no LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR um.phone LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR tbpd.status LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )');
        }
        if(isset($whereData['bookfrom']) && $whereData['bookfrom']==1){
            $this->db->where('(by.user_type LIKE "%CU%" OR by.user_type LIKE "%GU%")');
        }
        if(isset($whereData['bookfrom']) && $whereData['bookfrom']==2){
            $this->db->where('by.user_type','VA');
        }
        if(isset($whereData['tbpd.user_id']) && $whereData['tbpd.user_id']!=''){
            $this->db->where('tbpd.user_id',$whereData['tbpd.user_id']);
        }
        if(isset($whereData['return_paid_status']) && $whereData['return_paid_status']!=''){
            $this->db->where('tbpd.return_paid_status',$whereData['return_paid_status']);
        }
        if(isset($whereData['from']) && $whereData['from']!=''){
            $from = date("Y-m-d", strtotime($whereData['from'])).' 00:00:00';
            $to = date("Y-m-d", strtotime($whereData['to'])).' 24:60:60';
            $this->db->where("(tbpd.date_of_trip >='".$this->db->escape_like_str($from)."' AND tbpd.date_of_trip <= '".$this->db->escape_like_str($to)."')");
        }
        $this->db->where(array('tbpd.isactive'=>1,'tbpd.status'=>3,'tbpd.payment_status'=>1));
        if(isset($whereData['groupby']) && $whereData['groupby']!=''){
            $this->db->group_by($whereData['groupby']);
        } 
        $this->db->order_by('booked_on DESC');
        if($resultCount == 'yes'){
            $query = $this->db->get();
            return $query->num_rows();
        }else if($resultCount == 'download'){
            $query = $this->db->get();
            return $query->result_array();
        }else{
            $this->db->limit($limit, $start);
            $query = $this->db->get();
            return $query->result_array();
        }
    }

    function cancellation_count($whereData) {
        $this->db->select('tbpd.*,by.user_type,trip_name')->from('trip_book_pay_details AS tbpd');
        $this->db->join('trip_master', 'trip_master.id = tbpd.trip_id','INNER');
        $this->db->join('user_master AS um', 'um.id = tbpd.from_user_id','INNER');
        $this->db->join('user_master AS by', 'by.id = tbpd.booked_by','INNER');
        if(isset($whereData['title']) && $whereData['title']!=''){
           $this->db->where('(pnr_no LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR um.phone LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR tbpd.status LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )');
        }
        if(isset($whereData['bookfrom']) && $whereData['bookfrom']==1){
            $this->db->where('(by.user_type LIKE "%CU%" OR by.user_type LIKE "%GU%")');
        }
        if(isset($whereData['bookfrom']) && $whereData['bookfrom']==2){
            $this->db->where('by.user_type','VA');
        }
        if(isset($whereData['tbpd.user_id']) && $whereData['tbpd.user_id']!=''){
            $this->db->where('tbpd.user_id',$whereData['tbpd.user_id']);
        }
        if(isset($whereData['return_paid_status']) && $whereData['return_paid_status']!=''){
            $this->db->where('tbpd.return_paid_status',$whereData['return_paid_status']);
        }
        if(isset($whereData['from']) && $whereData['from']!=''){
            $from = date("Y-m-d", strtotime($whereData['from'])).' 00:00:00';
            $to = date("Y-m-d", strtotime($whereData['to'])).' 24:60:60';
            $this->db->where("(tbpd.date_of_trip >='".$this->db->escape_like_str($from)."' AND tbpd.date_of_trip <= '".$this->db->escape_like_str($to)."')");
        }
        $this->db->where(array('tbpd.isactive'=>1,'tbpd.status'=>3,'tbpd.payment_status'=>1));
        if(isset($whereData['groupby']) && $whereData['groupby']!=''){
            $this->db->group_by($whereData['groupby']);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    function trip_list($whereData,$limit=10, $start=0,$resultCount = 'no') {
        $this->db->select('tm.*,um.user_fullname,tc.name as category,sm.name as state,cm.name as city')->from('trip_master AS tm'); 
        $this->db->join('user_master AS um', 'um.id = tm.user_id','INNER');
        $this->db->join('trip_category AS tc', 'tc.id = tm.trip_category_id','INNER');
        $this->db->join('state_master AS sm', 'sm.id = tm.state_id','INNER');
        $this->db->join('city_master AS cm', 'cm.id = tm.city_id','INNER');
        
        if($this->session->userdata('user_type') == 'VA'){
            $this->db->where('um.user_type','VA');
            $this->db->where('tm.user_id',$this->session->userdata('user_id'));
        } 
        
        if(isset($whereData['title']) && $whereData['title']!=''){
           $this->db->where('(trip_code LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR trip_name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR tc.name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )');
        }      
        
        if(isset($whereData['status']) && $whereData['status']!=''){
            $status = $whereData['status'] == 1?1:0;
            $this->db->where('tm.isactive',$status);
        }        
        if(isset($whereData['from']) && $whereData['from']!=''){
            $from = date("Y-m-d", strtotime($whereData['from'])).' 00:00:00';
            $to = date("Y-m-d", strtotime($whereData['to'])).' 24:60:60';
            $this->db->where("(tm.created_on >='".$this->db->escape_like_str($from)."' AND tm.created_on <= '".$this->db->escape_like_str($to)."')");
        }
       
        $this->db->order_by('created_on DESC');
        
        if($resultCount == 'yes'){
            $query = $this->db->get();
            return $query->num_rows();
        }else if($resultCount == 'download'){
            $query = $this->db->get();
            return $query->result_array();
        }else{
            $this->db->limit($limit, $start);
            $query = $this->db->get();
            return $query->result_array();
        }
    }
    
    function payment_from_b2c($whereData,$limit=20, $start=0,$resultCount = 'no') {
        $this->db->select('tb.*,pt.trip_name AS parent_trip_name,pt.trip_code AS parent_trip_code,ptum.user_fullname AS parent_trip_user_name,ptum.email AS parent_trip_user_email,trip_master.trip_name,trip_master.trip_code,mt.status as tra_status')->from('trip_book_pay_details AS tb');
        $this->db->join('my_transaction  AS mt', 'tb.my_transaction_id = mt.id','INNER');
        $this->db->join('trip_master', 'trip_master.id = tb.trip_id','INNER');
        $this->db->join('trip_master AS pt', 'pt.id = tb.parent_trip_id','LEFT');
        $this->db->join('user_master AS ptum', 'ptum.id = pt.user_id','LEFT');
        $this->db->join('user_master AS um', 'um.id = tb.from_user_id','INNER');
        $this->db->join('user_master AS by', 'by.id = tb.booked_by','INNER');
        $this->db->where('(by.user_type LIKE "%CU%" OR by.user_type LIKE "%GU%")');
        
//        if($this->session->userdata('user_type') == 'SA'){  
//            //$this->db->where('tb.parent_trip_id',0);
//        }
        if($this->session->userdata('user_type') == 'VA'){            
            $this->db->where('tb.trip_user_id ',$this->session->userdata('user_id'));
        } 
        if(isset($whereData['title']) && $whereData['title']!=''){
           $this->db->where('(trip_code LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR trip_name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR mt.pnr_no LIKE "%'.$this->db->escape_like_str($whereData['title']).'%"  )');
        }      
        if(isset($whereData['status']) && $whereData['status']!=''){            
            $this->db->where('mt.status',$whereData['status']);
        }        
        if(isset($whereData['from']) && $whereData['from']!=''){
            $from = date("Y-m-d", strtotime($whereData['from'])).' 00:00:00';
            $to = date("Y-m-d", strtotime($whereData['to'])).' 24:60:60';
            $this->db->where("(tb.booked_on >='".$this->db->escape_like_str($from)."' AND tb.booked_on <= '".$this->db->escape_like_str($to)."')");
            
        }
//       if($this->session->userdata('user_type') == 'SA'){  
//            $this->db->group_by('tb.pnr_no');
//        }
        $this->db->order_by('tb.booked_on DESC'); 
        
        if($resultCount == 'yes'){
            $query = $this->db->get();
            return $query->num_rows();
        }else if($resultCount == 'download'){
            $query = $this->db->get();
            return $query->result_array();
        }else{
            $this->db->limit($limit, $start);
            $query = $this->db->get();//echo $this->db->last_query();exit;
            return $query->result_array();
        }
    }
    
    function payment_from_b2b($whereData,$limit=20, $start=0,$resultCount = 'no') {
        $this->db->select('tb.*,pt.trip_name AS parent_trip_name,pt.trip_code AS parent_trip_code,ptum.user_fullname AS parent_trip_user_name,ptum.email AS parent_trip_user_email,trip_master.trip_name,trip_master.trip_code,mt.status as tra_status')->from('trip_book_pay_details AS tb');
        $this->db->join('my_transaction  AS mt', 'tb.my_transaction_id = mt.id','INNER');
        $this->db->join('trip_master', 'trip_master.id = tb.trip_id','INNER');
        $this->db->join('trip_master AS pt', 'pt.id = tb.parent_trip_id','LEFT');
        $this->db->join('user_master AS ptum', 'ptum.id = pt.user_id','LEFT');
        $this->db->join('user_master AS um', 'um.id = tb.from_user_id','INNER');
        $this->db->join('user_master AS by', 'by.id = tb.booked_by','INNER');
        $this->db->where('(by.user_type LIKE "%VA%")');
//        if($this->session->userdata('user_type') == 'SA'){  
//            $this->db->where('tb.parent_trip_id !=',0);
//        }
        if($this->session->userdata('user_type') == 'VA'){            
            $this->db->where('tb.user_id ',$this->session->userdata('user_id'));
        } 
        
        if(isset($whereData['title']) && $whereData['title']!=''){
           $this->db->where('(trip_code LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR trip_name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR mt.pnr_no LIKE "%'.$this->db->escape_like_str($whereData['title']).'%"  )');
        }      
        
        if(isset($whereData['status']) && $whereData['status']!=''){            
            $this->db->where('mt.status',$whereData['status']);
        }        
        if(isset($whereData['from']) && $whereData['from']!=''){
            $from = date("Y-m-d", strtotime($whereData['from'])).' 00:00:00';
            $to = date("Y-m-d", strtotime($whereData['to'])).' 24:60:60';
            $this->db->where("(tb.booked_on >='".$this->db->escape_like_str($from)."' AND tb.booked_on <= '".$this->db->escape_like_str($to)."')");
        }
       
        $this->db->order_by('tb.booked_on DESC'); 
        
        if($resultCount == 'yes'){
            $query = $this->db->get();
            return $query->num_rows();
        }else if($resultCount == 'download'){
            $query = $this->db->get();
            return $query->result_array();
        }else{
            $this->db->limit($limit, $start);
            $query = $this->db->get();//echo $this->db->last_query();exit;
            return $query->result_array();
        }
    }
    function payment_to_b2b($whereData,$limit=20, $start=0,$resultCount = 'no') {
        $this->db->select('tb.*,ptb.subtotal_trip_price AS parent_subtotal_trip_price,ptb.discount_percentage AS parent_discount_percentage,ptb.offer_amt AS parent_offer_amt,ptb.discount_price AS parent_discount_price,pt.trip_name AS parent_trip_name,pt.trip_code AS parent_trip_code,ptum.user_fullname AS parent_trip_user_name,ptum.email AS parent_trip_user_email,trip_master.trip_name,trip_master.trip_code,mt.status as tra_status')->from('trip_book_pay_details AS tb');
        $this->db->join('my_transaction  AS mt', 'tb.my_transaction_id = mt.id','INNER');
        $this->db->join('trip_master', 'trip_master.id = tb.trip_id','INNER');
        $this->db->join('trip_master AS pt', 'pt.id = tb.parent_trip_id','LEFT');
        $this->db->join('user_master AS ptum', 'ptum.id = pt.user_id','LEFT');
        $this->db->join('user_master AS um', 'um.id = tb.from_user_id','INNER');
        $this->db->join('user_master AS by', 'by.id = tb.booked_by','INNER');
        $this->db->join('trip_book_pay_details AS ptb', 'ptb.trip_id = tb.parent_trip_id AND ptb.book_pay_id = tb.book_pay_id AND ptb.total_trip_price = tb.vendor_amt','INNER');
        $this->db->where('(by.user_type LIKE "%CU%" OR by.user_type LIKE "%GU%" OR by.user_type LIKE "%VA%")');
        $this->db->where('tb.parent_trip_id !=',0);
        if($this->session->userdata('user_type') == 'VA'){            
            $this->db->where('tb.user_id ',$this->session->userdata('user_id'));
        } 
        
        if(isset($whereData['title']) && $whereData['title']!=''){
           $this->db->where('(trip_code LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR trip_name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR mt.pnr_no LIKE "%'.$this->db->escape_like_str($whereData['title']).'%"  )');
        }      
        
        if(isset($whereData['status']) && $whereData['status']!=''){            
            $this->db->where('mt.status',$whereData['status']);
        }        
        if(isset($whereData['from']) && $whereData['from']!=''){
            $from = date("Y-m-d", strtotime($whereData['from'])).' 00:00:00';
            $to = date("Y-m-d", strtotime($whereData['to'])).' 24:60:60';
            $this->db->where("(tb.booked_on >='".$this->db->escape_like_str($from)."' AND tb.booked_on <= '".$this->db->escape_like_str($to)."')");
        }
       
        $this->db->order_by('tb.booked_on DESC'); 
        
        if($resultCount == 'yes'){
            $query = $this->db->get();
            return $query->num_rows();
        }else if($resultCount == 'download'){
            $query = $this->db->get();
            return $query->result_array();
        }else{
            $this->db->limit($limit, $start);
            $query = $this->db->get();//echo $this->db->last_query();exit;
            return $query->result_array();
        }
    }
    function transaction_reports($whereData,$limit=20, $start=0,$resultCount = 'no') {
        $this->db->select('mt.*,tm.trip_name,um1.id as fromuserid,um1.user_fullname as fromuser,um2.user_fullname as touser,um2.id as touserid')->from('my_transaction AS mt');         
        $this->db->join('user_master AS um1', 'um1.id = mt.from_userid','LEFT');
        $this->db->join('user_master AS um2', 'um2.id = mt.to_userid','LEFT');
        $this->db->join('trip_master AS tm', 'tm.id = mt.trip_id','LEFT');      
        //$this->db->where('um.user_type','SA');
        if($this->session->userdata('user_type') == 'SA'){            
            $this->db->where('(mt.userid =0)');
        }else{        
            $this->db->where('(mt.userid ='.$this->session->userdata('user_id').')');
         }
       
        if(isset($whereData['title']) && $whereData['title']!=''){
           $this->db->where('(trip_name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )');
        }      
        
        if(isset($whereData['status']) && $whereData['status']!=''){            
            $this->db->where('mt.status',$whereData['status']);
        }        
        if(isset($whereData['from']) && $whereData['from']!=''){
            $from = date("Y-m-d", strtotime($whereData['from'])).' 00:00:00';
            $to = date("Y-m-d", strtotime($whereData['to'])).' 24:60:60';
            $this->db->where("(mt.date_time >='".$this->db->escape_like_str($from)."' AND mt.date_time <= '".$this->db->escape_like_str($to)."')");
        }
       
        $this->db->order_by('mt.id DESC'); 
        
        if($resultCount == 'yes'){
            $query = $this->db->get();
            return $query->num_rows();
        }else if($resultCount == 'download'){
            $query = $this->db->get();
            return $query->result_array();
        }else{
            $this->db->limit($limit, $start);
            $query = $this->db->get();//echo $this->db->last_query();exit;
            return $query->result_array();
        }
    }
   

}

?>