<?php
class Report_model extends CI_Model
{
    // Function 1:Get category master list
    function booking_list($whereData,$limit, $start) {
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
        if(isset($whereData['status']) && $whereData['status']!=''){
            $this->db->where('tbpd.status',$whereData['status']);
        }
        if(isset($whereData['from']) && $whereData['from']!=''){
            $from = date("Y-m-d", strtotime($whereData['from']));
            $to = date("Y-m-d", strtotime($whereData['to']));
            $this->db->where("(tbpd.date_of_trip >='".$this->db->escape_like_str($from)."' AND tbpd.date_of_trip <= '".$this->db->escape_like_str($to)."')");
        }
        if(isset($whereData['groupby']) && $whereData['groupby']!=''){
            $this->db->group_by($whereData['groupby']);
        } 
        $this->db->order_by('booked_on DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    function booking_count($whereData) {
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
        if(isset($whereData['status']) && $whereData['status']!=''){
            $this->db->where('tbpd.status',$whereData['status']);
        }
        if(isset($whereData['from']) && $whereData['from']!=''){
            $from = date("Y-m-d", strtotime($whereData['from']));
            $to = date("Y-m-d", strtotime($whereData['to']));
            $this->db->where("(tbpd.date_of_trip >='".$this->db->escape_like_str($from)."' AND tbpd.date_of_trip <= '".$this->db->escape_like_str($to)."')");
        }
        if(isset($whereData['groupby']) && $whereData['groupby']!=''){
            $this->db->group_by($whereData['groupby']);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    // Function 1:Get category master list
    function cancellation_list($whereData,$limit, $start) {
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
            $from = date("Y-m-d", strtotime($whereData['from']));
            $to = date("Y-m-d", strtotime($whereData['to']));
            $this->db->where("(tbpd.date_of_trip >='".$this->db->escape_like_str($from)."' AND tbpd.date_of_trip <= '".$this->db->escape_like_str($to)."')");
        }
        $this->db->where(array('tbpd.isactive'=>1,'tbpd.status'=>3,'tbpd.payment_status'=>1));
        if(isset($whereData['groupby']) && $whereData['groupby']!=''){
            $this->db->group_by($whereData['groupby']);
        } 
        $this->db->order_by('booked_on DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
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
            $from = date("Y-m-d", strtotime($whereData['from']));
            $to = date("Y-m-d", strtotime($whereData['to']));
            $this->db->where("(tbpd.date_of_trip >='".$this->db->escape_like_str($from)."' AND tbpd.date_of_trip <= '".$this->db->escape_like_str($to)."')");
        }
        $this->db->where(array('tbpd.isactive'=>1,'tbpd.status'=>3,'tbpd.payment_status'=>1));
        if(isset($whereData['groupby']) && $whereData['groupby']!=''){
            $this->db->group_by($whereData['groupby']);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

}

?>