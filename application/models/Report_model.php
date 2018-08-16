<?php
class Report_model extends CI_Model
{
    // Function 1:Get category master list
    function booking_list($limit, $start,$booking_search) {
        $this->db->select()->from('trip_book_pay');
		$this->db->join('trip_master', 'trip_master.id = trip_book_pay.trip_id','INNER');
        $this->db->like('pnr_no',$booking_search);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    function booking_count($booking_search) {
        $this->db->select()->from('trip_book_pay');
        $this->db->like('pnr_no',$booking_search);
        $query = $this->db->get();
        return $query->num_rows();
    }

}

?>