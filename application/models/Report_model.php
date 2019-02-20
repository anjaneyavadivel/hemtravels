<?php
class Report_model extends CI_Model
{
    // Function 1:Get category master list
    function booking_list($whereData,$limit, $start,$resultCount='no',$result_for = 'bk') {
        $this->db->select('tbpd.*,by.user_type,um.user_fullname,um.phone,trip_name,trip_code')->from('trip_book_pay_details AS tbpd');
        $this->db->join('trip_master', 'trip_master.id = tbpd.trip_id','INNER');
        $this->db->join('user_master AS um', 'um.id = tbpd.from_user_id','INNER');
        $this->db->join('user_master AS by', 'by.id = tbpd.booked_by','INNER');
        
        if($result_for == 'tt'){
            $this->db->join('trip_book_pay_details AS tbpd2', 'tbpd2.parent_trip_id = tbpd.trip_id','INNER');
            $this->db->where('tbpd2.parent_trip_id !=', 0);
        }
        if(isset($whereData['title']) && $whereData['title']!=''){
            if($result_for == 'tt'){
                $this->db->where('(trip_master.trip_name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR trip_master.trip_code LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )');
            }else{
                $this->db->where('(trip_master.trip_name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR trip_master.trip_code LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR pnr_no LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR tbpd.booked_phone_no LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR tbpd.status LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )');
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
        if(isset($whereData['bookedonfrom']) && !empty($whereData['bookedonfrom']) && isset($whereData['bookedonto']) && !empty($whereData['bookedonto'])){
            $bookedonfrom = date("Y-m-d", strtotime($whereData['bookedonfrom'])).' 00:00:00';
            $bookedonto = date("Y-m-d", strtotime($whereData['bookedonto'])).' 24:60:60';
            $this->db->where("(tbpd.booked_on >='".$this->db->escape_like_str($bookedonfrom)."' AND tbpd.booked_on <= '".$this->db->escape_like_str($bookedonto)."')");
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
                $this->db->where('(trip_master.trip_name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR trip_master.trip_code LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR pnr_no LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR tbpd.booked_phone_no LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR tbpd.status LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )');
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
        if(isset($whereData['bookedonfrom']) && !empty($whereData['bookedonfrom']) && isset($whereData['bookedonto']) && !empty($whereData['bookedonto'])){
            $bookedonfrom = date("Y-m-d", strtotime($whereData['bookedonfrom'])).' 00:00:00';
            $bookedonto = date("Y-m-d", strtotime($whereData['bookedonto'])).' 24:59:59';
            $this->db->where("(tbpd.booked_on >='".$this->db->escape_like_str($bookedonfrom)."' AND tbpd.booked_on <= '".$this->db->escape_like_str($bookedonto)."')");
        }
        if(isset($whereData['groupby']) && $whereData['groupby']!=''){
            $this->db->group_by($whereData['groupby']);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    function booking_childinfo($whereData) {
        $this->db->select('tbpd.*,by.user_type,um.user_fullname,um.phone,trip_name,trip_code')->from('trip_book_pay_details AS tbpd');
        $this->db->join('trip_master', 'trip_master.id = tbpd.trip_id','INNER');
        $this->db->join('user_master AS um', 'um.id = tbpd.from_user_id','INNER');
        $this->db->join('user_master AS by', 'by.id = tbpd.booked_by','INNER');
        $this->db->where($whereData);
        $query = $this->db->get();
        return $query->first_row('array');
    }
    // Function 1:Get category master list
    function cancellation_list($whereData,$limit, $start,$resultCount='no') {
        $this->db->select('tbpd.*,by.user_type,trip_name,trip_code')->from('trip_book_pay_details AS tbpd');
        $this->db->join('trip_master', 'trip_master.id = tbpd.trip_id','INNER');
        $this->db->join('user_master AS um', 'um.id = tbpd.from_user_id','INNER');
        $this->db->join('user_master AS by', 'by.id = tbpd.booked_by','INNER');
        if(isset($whereData['title']) && $whereData['title']!=''){
            $this->db->where('(pnr_no LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR tbpd.booked_phone_no LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR tbpd.status LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )');
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
           $this->db->where('(pnr_no LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR tbpd.booked_phone_no LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR tbpd.status LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )');
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
           $this->db->where('(um.user_fullname LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR trip_code LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR trip_name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR tc.name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )');
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
           $this->db->where('(trip_master.trip_code LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR trip_master.trip_name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR mt.pnr_no LIKE "%'.$this->db->escape_like_str($whereData['title']).'%"  )');
        }      
        if(isset($whereData['status']) && $whereData['status']!=''){            
            $this->db->where('mt.status',$whereData['status']);
        }             
        $this->db->where_not_in('mt.status',4);     
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
        $this->db->where_not_in('mt.status',4);      
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
        $this->db->where_not_in('mt.status',4);       
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
        $this->db->select('mt.*,tm.trip_name,lum.id as recorduserid,lum.user_fullname as recordusername,um1.id as fromuserid,um1.user_fullname as fromuser,um2.user_fullname as touser,um2.id as touserid')->from('my_transaction AS mt');         
        $this->db->join('user_master AS um1', 'um1.id = mt.from_userid','LEFT');
        $this->db->join('user_master AS um2', 'um2.id = mt.to_userid','LEFT');
        $this->db->join('user_master AS lum', 'lum.id = mt.userid','LEFT');
        $this->db->join('trip_master AS tm', 'tm.id = mt.trip_id','LEFT');      
        //$this->db->where('um.user_type','SA');
        if($this->session->userdata('user_type') == 'SA'){            
            $this->db->where('(mt.userid =0 OR mt.to_userid =-2)');
        }else{        
            $this->db->where('(mt.userid ='.$this->session->userdata('user_id').')');
         }
       
        if(isset($whereData['title']) && $whereData['title']!=''){
           $this->db->where('(lum.user_fullname LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR um2.user_fullname LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR um1.user_fullname LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR mt.transaction_notes LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR trip_name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )');
        }      
        
        if(isset($whereData['status']) && $whereData['status']!=''){            
            $this->db->where('mt.status',$whereData['status']);
        }    
        
        if(isset($whereData['statusin']) && !empty($whereData['statusin'])){            
            $this->db->where_in('mt.status',$whereData['statusin']);
        }        
        if(isset($whereData['from']) && $whereData['from']!=''){
            $from = date("Y-m-d", strtotime($whereData['from'])).' 00:00:00';
            $to = date("Y-m-d", strtotime($whereData['to'])).' 24:60:60';
            $this->db->where("(mt.date_time >='".$this->db->escape_like_str($from)."' AND mt.date_time <= '".$this->db->escape_like_str($to)."')");
        }           
        $this->db->where_not_in('mt.status',4);
       
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
   function transaction_view($whereData) {
        $this->db->select('mt.*,tm.trip_name,lum.id as recorduserid,lum.user_fullname as recordusername,um1.id as fromuserid,um1.user_fullname as fromuser,um2.user_fullname as touser,um2.id as touserid,'
                . 'ai.bank_name,ai.account_holder_name,ai.account_number,ai.ifsc_code,ai.branch,ai.address,')->from('my_transaction AS mt');         
        $this->db->join('user_master AS um1', 'um1.id = mt.from_userid','LEFT');
        $this->db->join('user_master AS um2', 'um2.id = mt.to_userid','LEFT');
        $this->db->join('user_master AS lum', 'lum.id = mt.userid','LEFT');
        $this->db->join('trip_master AS tm', 'tm.id = mt.trip_id','LEFT');  
        $this->db->join('account_info AS ai', 'ai.id = mt.b2b_pay_account_info','LEFT');      
        
        if(isset($whereData['statusin']) && !empty($whereData['statusin'])){            
            $this->db->where_in('mt.status',$whereData['statusin']);
        }          
        $this->db->where_not_in('mt.status',4);          
        $this->db->where_in('mt.id',$whereData['id']);
        $this->db->order_by('mt.id DESC'); 
        return $query = $this->db->get();
    }
    public function tomorrow_list($whereData,$limit, $start,$resultCount='no'){
        $whQry = '';
        $un_whQry = '';
        if(isset($whereData['title']) && $whereData['title']!=''){
            $whQry = ' AND (tbpd.pnr_no LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR trip_master.trip_name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR trip_master.trip_code LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )';            
           // $un_whQry = ' AND (tm1.trip_name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR tm1.trip_code LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )';            
        }
        if(isset($whereData['bookfrom']) && $whereData['bookfrom']==1){
            $whQry .= ' AND (by.user_type LIKE "%CU%" OR by.user_type LIKE "%GU%")';
            //$un_whQry .= ' AND (by1.user_type LIKE "%CU%" OR by1.user_type LIKE "%GU%")';
        }
        if(isset($whereData['bookfrom']) && $whereData['bookfrom']==2){
            $whQry .= ' AND by.user_type = "VA"';
           // $un_whQry .= ' AND by1.user_type = "VA"';
        }
        
        if(isset($whereData['status']) && $whereData['status']!=''){
            $whQry .= ' AND tbpd.status = '.$whereData['status'];
           // $un_whQry .= ' AND tbpd1.status = '.$whereData['status'];
        }
        if(isset($whereData['from']) && $whereData['from']!=''){
            $from = date("Y-m-d", strtotime($whereData['from']));
            $to = date("Y-m-d", strtotime($whereData['to']));
            $whQry .= ' AND (tbpd.date_of_trip >="'.$this->db->escape_like_str($from).'" AND tbpd.date_of_trip <= "'.$this->db->escape_like_str($to).'")';
            //$un_whQry .= ' AND (tbpd1.date_of_trip >="'.$this->db->escape_like_str($from).'" AND tbpd1.date_of_trip <= "'.$this->db->escape_like_str($to).'")';
        }  
        
        $limitQry = '';
        
        if($resultCount != 'download'){
            $limitQry = 'LIMIT '.$start.','.$limit;
        }
        $childtriparr=array(0);
        $whereData = array('user_id' => $this->session->userdata('user_id'),'status' => 1,'isactive' => 1);
        $trip_list = selectTable('trip_master', $whereData, $showField = array('*'));
        if ($trip_list->num_rows() > 0) {
            foreach ($trip_list->result() as $row) {
            $childtriparr = array_merge( $childtriparr,getallchildtrip($row->id));
        }}
        $childtripstring = implode(',', $childtriparr);
        
        $query = $this->db->query("SELECT
                                    `tbpd`.*,`by`.`user_type`,`trip_name`,`trip_code`,um.user_fullname,um.phone,trip_code,va.user_fullname as vendor
                                  FROM
                                    `trip_book_pay` AS `tbpd`
                                  INNER JOIN
                                    `trip_master` ON `trip_master`.`id` = `tbpd`.`trip_id`
                                  INNER JOIN
                                    `user_master` AS `um` ON `um`.`id` = `tbpd`.`user_id`
                                  INNER JOIN
                                    `user_master` AS `by` ON `by`.`id` = `tbpd`.`booked_by`
                                  INNER JOIN
                                    `user_master` AS `va` ON `va`.`id` = `tbpd`.`trip_user_id`
                                  WHERE
                                    `tbpd`.`trip_id` IN ($childtripstring)  {$whQry} GROUP BY tbpd.id ORDER BY tbpd.id DESC {$limitQry}");
    
        //echo "<pre>";print_r($this->db->last_query());exit;
    
        if($resultCount == 'yes'){
            
            return $query->num_rows();
        }else if($resultCount == 'download'){
            $query = $this->db->get();
            return $query->result_array();
        }else{            
            return $query->result_array();
        }
    }
    /*
    public function tomorrow_list($whereData,$limit, $start,$resultCount='no'){
        $whQry = '';
        $un_whQry = '';
        if(isset($whereData['title']) && $whereData['title']!=''){
            $whQry = ' AND (trip_master.trip_name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR trip_master.trip_code LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )';            
            $un_whQry = ' AND (tm1.trip_name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR tm1.trip_code LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )';            
        }
        if(isset($whereData['bookfrom']) && $whereData['bookfrom']==1){
            $whQry .= ' AND (by.user_type LIKE "%CU%" OR by.user_type LIKE "%GU%")';
            $un_whQry .= ' AND (by1.user_type LIKE "%CU%" OR by1.user_type LIKE "%GU%")';
        }
        if(isset($whereData['bookfrom']) && $whereData['bookfrom']==2){
            $whQry .= ' AND by.user_type = "VA"';
            $un_whQry .= ' AND by1.user_type = "VA"';
        }
        
        if(isset($whereData['status']) && $whereData['status']!=''){
            $whQry .= ' AND tbpd.status = '.$whereData['status'];
            $un_whQry .= ' AND tbpd1.status = '.$whereData['status'];
        }
        if(isset($whereData['from']) && $whereData['from']!=''){
            $from = date("Y-m-d", strtotime($whereData['from']));
            $to = date("Y-m-d", strtotime($whereData['to']));
            $whQry .= ' AND (tbpd.date_of_trip >="'.$this->db->escape_like_str($from).'" AND tbpd.date_of_trip <= "'.$this->db->escape_like_str($to).'")';
            $un_whQry .= ' AND (tbpd1.date_of_trip >="'.$this->db->escape_like_str($from).'" AND tbpd1.date_of_trip <= "'.$this->db->escape_like_str($to).'")';
        }  
        
        $limitQry = '';
        
        if($resultCount != 'download'){
            $limitQry = 'LIMIT '.$start.','.$limit;
        }
        
        $query = $this->db->query("SELECT * FROM ((SELECT
                                    `tbpd`.*,`by`.`user_type`,`trip_name`,um.user_fullname,um.phone,trip_code,va.user_fullname as vendor
                                  FROM
                                    `trip_book_pay_details` AS `tbpd`
                                  INNER JOIN
                                    `trip_master` ON `trip_master`.`id` = `tbpd`.`trip_id`
                                  INNER JOIN
                                    `user_master` AS `um` ON `um`.`id` = `tbpd`.`from_user_id`
                                  INNER JOIN
                                    `user_master` AS `by` ON `by`.`id` = `tbpd`.`booked_by`
                                  INNER JOIN
                                    `user_master` AS `va` ON `va`.`id` = `tbpd`.`trip_user_id`
                                  INNER JOIN
                                    `trip_book_pay_details` AS `tbpd1` ON `tbpd1`.`trip_id` = `tbpd`.`trip_id`
                                  WHERE
                                    `tbpd`.`user_id` = '{$this->session->userdata('user_id')}'  {$whQry} GROUP BY tbpd.id)  

                                  UNION
                                  (
                                  SELECT
                                    tbpd1.*,`by1`.`user_type`,um1.user_fullname,um1.phone,tm1.trip_name,tm1.trip_code,va1.user_fullname as vendor
                                  FROM
                                    `trip_book_pay_details` AS `tbpd`
                                    INNER JOIN
                                    `trip_book_pay_details` AS `tbpd1` ON `tbpd1`.`parent_trip_id` = `tbpd`.`trip_id`
                                  INNER JOIN
                                    `trip_master` AS `tm1` ON `tm1`.`id` = `tbpd1`.`trip_id`
                                  INNER JOIN
                                    `user_master` AS `um1` ON `um1`.`id` = `tbpd1`.`from_user_id`
                                  INNER JOIN
                                    `user_master` AS `by1` ON `by1`.`id` = `tbpd1`.`booked_by`
                                  INNER JOIN
                                    `user_master` AS `va1` ON `va1`.`id` = `tbpd1`.`trip_user_id`
                                  WHERE
                                    `tbpd`.`user_id` = '{$this->session->userdata('user_id')}' {$un_whQry} GROUP BY tbpd1.id)) as X ORDER BY X.ID DESC {$limitQry}");
    
        //echo "<pre>";print_r($this->db->last_query());exit;
    
        if($resultCount == 'yes'){
            
            return $query->num_rows();
        }else{            
            return $query->result_array();
        }
    }*/
    function user_list($whereData,$limit=10, $start=0,$resultCount = 'no') {
        $this->db->select('um.*')->from('user_master AS um');
        $this->db->where('um.user_type !=','SA');
        
        if(isset($whereData['type']) && $whereData['type']!=''){           
            $this->db->where('um.user_type',$whereData['type']);
        }        
        if(isset($whereData['from']) && $whereData['from']!=''){
            $from = date("Y-m-d", strtotime($whereData['from']));
            $to   = date("Y-m-d", strtotime($whereData['to']));
            $this->db->where("(um.created_on >='".$this->db->escape_like_str($from)."' AND um.created_on <= '".$this->db->escape_like_str($to)."')");
        }
        
        if(isset($whereData['title']) && $whereData['title']!=''){
           $this->db->where('(um.user_fullname LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR um.email LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR um.phone LIKE "%'.$this->db->escape_like_str($whereData['title']).'%"  )');
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
    
    function trip_shared_list($whereData,$limit=10, $start=0,$resultCount = 'no') {
        $this->db->select('ts.*,tm.trip_code,sum.user_fullname AS sharedusername,sum.email AS fromuseremail,tm.trip_name,mtm.trip_name AS maked_trip_name,mtm.trip_code AS maked_trip_code');
        $this->db->select('tm.trip_name AS trip_name,um.user_fullname AS tousername,um.email AS email,cm.coupon_name AS coupon_name,cm.offer_type,cm.percentage_amount');
        $this->db->from('trip_shared AS ts');
        $this->db->join('user_master AS sum', 'ts.shared_user_id = sum.id','LEFT');
        $this->db->join('user_master AS um', 'ts.user_id = um.id','LEFT');
        $this->db->join('trip_master AS tm', 'ts.trip_id = tm.id','LEFT');
        $this->db->join('trip_master AS mtm', 'ts.id = mtm.trip_shared_id','LEFT');
        $this->db->join('coupon_code_master_history AS cm', 'ts.coupon_history_id = cm.id','LEFT');
       
       
        if(isset($whereData['title']) && $whereData['title']!=''){
           $this->db->where('(tm.trip_name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR mtm.trip_name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )');
        }      
        
        if(isset($whereData['status']) && $whereData['status']!=''){            
            $this->db->where('ts.status',$whereData['status']);
        }   
       
        $this->db->order_by('ts.id DESC'); 
        
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

    function pay_history_reports($whereData,$limit=20, $start=0,$resultCount = 'no') {
        $this->db->select('mt.*,tm.trip_name,lum.id as recorduserid,lum.user_fullname as recordusername,um1.id as fromuserid,um1.user_fullname as fromuser,um2.user_fullname as touser,um2.id as touserid')->from('my_transaction AS mt');         
        $this->db->join('user_master AS um1', 'um1.id = mt.from_userid','LEFT');
        $this->db->join('user_master AS um2', 'um2.id = mt.to_userid','LEFT');
        $this->db->join('user_master AS lum', 'lum.id = mt.userid','LEFT');
        $this->db->join('trip_master AS tm', 'tm.id = mt.trip_id','LEFT');      
        //$this->db->where('mt.status',3);
        
        if($this->session->userdata('user_type') == 'VA'){  
      //      $this->db->where('(mt.from_userid ='.$this->session->userdata('user_id').' OR mt.to_userid ='.$this->session->userdata('user_id').' OR mt.userid ='.$this->session->userdata('user_id').' )');
              $this->db->where('mt.userid ='.$this->session->userdata('user_id'));
        }
       if($this->session->userdata('user_type') == 'VA'){  
            //$this->db->where('(mt.from_userid !=-1 AND mt.to_userid !=-1)');
        }
       
        if(isset($whereData['title']) && $whereData['title']!=''){
           $this->db->where('( mt.pnr_no LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )');
        }           
        $this->db->where_not_in('mt.status',4);
              
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
    function payment_summary_reports($whereData,$limit=20, $start=0,$resultCount = 'no') {
        
        if($this->session->userdata('user_type') == 'VA' || isset($whereData['id']) && !empty($whereData['id'])){  
            //$this->db->select('tbod.booked_on,mt.*,tm.trip_name,um1.user_type,um1.id as recorduserid,um1.user_fullname as recordusername,SUM(deposits) as credit,SUM(withdrawals) as debit')->from('my_transaction AS mt');         
            $this->db->select('tbod.booked_on,mt.*,tm.trip_name,tm.trip_code,um1.user_type,um1.id as recorduserid,um1.user_fullname as recordusername,tbod.your_amt as credit,SUM(withdrawals) as debit')->from('my_transaction AS mt');         
        }else if($this->session->userdata('user_type') == 'SA'){  
            $this->db->select('mt.*,tm.trip_name,tm.trip_code,um1.user_type,um1.id as recorduserid,um1.user_fullname as recordusername,um1.email as recordemail')->from('trip_book_pay AS mt');                     
        }
                
        $this->db->join('trip_master AS tm', 'tm.id = mt.trip_id','LEFT');      
        
        
        if($this->session->userdata('user_type') == 'VA' || isset($whereData['id']) && !empty($whereData['id'])){ 
            
            $user_id = $this->session->userdata('user_id');
            if(isset($whereData['id']) && !empty($whereData['id'])){
                $user_id = $whereData['id'];
            }
            
            $this->db->join('trip_book_pay_details AS tbod', 'tbod.id = mt.book_pay_details_id','LEFT');
            $this->db->join('user_master AS um1', 'um1.id = mt.userid','LEFT');
            $this->db->where('(mt.userid ='.$user_id.')');
            $this->db->where('(tbod.user_id ='.$user_id.')');          
            $this->db->where_not_in('mt.status',4);        
            $this->db->where_not_in('tbod.status',array(1,3));
            $this->db->group_by('book_pay_id'); 
        }else{
            $this->db->join('user_master AS um1', 'um1.id = mt.user_id','LEFT');
            //$this->db->where('mt.status !=',3);          
            $this->db->where_not_in('mt.status',array(1,3));
        }
       
        if(isset($whereData['title']) && $whereData['title']!=''){
           $this->db->where('(mt.pnr_no LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" OR trip_name LIKE "%'.$this->db->escape_like_str($whereData['title']).'%" )');
        } 
              
        if(isset($whereData['from']) && $whereData['from']!=''){
            $from = date("Y-m-d", strtotime($whereData['from'])).' 00:00:00';
            $to   = date("Y-m-d", strtotime($whereData['to'])).' 24:00:00';
            $this->db->where("(mt.booked_on >='".$this->db->escape_like_str($from)."' AND mt.booked_on <= '".$this->db->escape_like_str($to)."')");
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