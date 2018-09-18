<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Report extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Report_model');
        //require_once APPPATH . 'third_party/PHPExcel.php';
        require_once APPPATH . 'third_party/phpspreadsheet/vendor/autoload.php';
       // $this->excel = new PHPExcel();
    }

    public function booking_wise_reports() {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        $url = $this->uri->segment(1);
        if ($url != 'booking-list' && $url != 'booking-wise-reports') {
            redirect('login');
        }
//        $bookingsearch = trim($this->input->post('booking_search'));
//        if ($bookingsearch != '') {
//            $booking_search = $bookingsearch;
//        }
        $loginuserid = $this->session->userdata('user_id');
        $title = trim($this->input->get('title'));
        $from = trim($this->input->get('from'));
        $to = trim($this->input->get('to'));
        $status = trim($this->input->get('status'));
        $bookfrom = trim($this->input->get('bookfrom'));
        $download = trim($this->input->get('download'));
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . $url . "?title=" . $title . "&from=" . $from . "&to=" . $to . "&status=" . $status . "&bookfrom=" . $bookfrom;
        $whereData = array('title' => $title, 'from' => $from, 'to' => $to, 'status' => $status, 'bookfrom' => $bookfrom);
        if ($this->session->userdata('user_type') == 'VA') {
            $whereData['tbpd.user_id'] = $loginuserid;
        }
        if ($this->session->userdata('user_type') == 'SA') {
            $whereData['groupby'] = 'pnr_no';
        }

        $config["total_rows"] = $this->Report_model->booking_count($whereData);
        $config["per_page"] = 20;
        //$config["uri_segment"] = 2;

        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['use_page_numbers'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['cur_tag_open'] = '&nbsp;<a class="active">';
        $config['cur_tag_close'] = '</a>';

        $config['next_link'] = '&NestedGreaterGreater;';
        $config['prev_link'] = '&NestedLessLess;';
        $this->pagination->initialize($config);
        $page = ($this->input->get('page')) ? ( ( $this->input->get('page') - 1 ) * $config["per_page"] ) : 0;
        //$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["bookinglist"] = $this->Report_model->booking_list($whereData, $config["per_page"], $page,$download);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data["from"] = $from;
        $data["to"] = $to;
        $data["status"] = $status;
        $data["bookfrom"] = $bookfrom;
        $data["title"] = $title;
        $data["url"] = $url;
        
        if($download == 1 && isset($data["bookinglist"]) && count($data["bookinglist"]) > 0){
            
            $downloadData = $data["bookinglist"];
            
            $this->bookingExport($downloadData);
            
        }else{
            $this->load->view('report/booking-reports', $data);
        }
    }

    public function loadmodal($view) {
        if ($view != "") {
            $data = array();
            if (isset($_POST)) {
                foreach ($_POST as $key => $value) {
                    $data[$key] = $value;
                }
            }
            $this->load->view("report/booking-reports/$view", $data);
        } else {
            echo "Error";
        }
    }

    public function cancellation_reports() {
        if ($this->session->userdata('user_id') == '') {
            redirect('login');
        }
        $url = $this->uri->segment(1);
        if ($url != 'cancellation-list' && $url != 'cancellation-reports') {
            redirect('login');
        }
        $loginuserid = $this->session->userdata('user_id');
        $title = trim($this->input->get('title'));
        $from = trim($this->input->get('from'));
        $to = trim($this->input->get('to'));
        $status = trim($this->input->get('status'));
        $bookfrom = trim($this->input->get('bookfrom'));
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . $url . "?title=" . $title . "&from=" . $from . "&to=" . $to . "&return_paid_status=" . $status . "&bookfrom=" . $bookfrom;
        $whereData = array('title' => $title, 'from' => $from, 'to' => $to, 'return_paid_status' => $status, 'bookfrom' => $bookfrom);
        if ($this->session->userdata('user_type') == 'VA') {
            $whereData['tbpd.user_id'] = $loginuserid;
        }
        if ($this->session->userdata('user_type') == 'SA') {
            $whereData['groupby'] = 'pnr_no';
        }

        $config["total_rows"] = $this->Report_model->cancellation_count($whereData);
        $config["per_page"] = 20;
        //$config["uri_segment"] = 2;

        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['use_page_numbers'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['cur_tag_open'] = '&nbsp;<a class="active">';
        $config['cur_tag_close'] = '</a>';

        $config['next_link'] = '&NestedGreaterGreater;';
        $config['prev_link'] = '&NestedLessLess;';
        $this->pagination->initialize($config);
        $page = ($this->input->get('page')) ? ( ( $this->input->get('page') - 1 ) * $config["per_page"] ) : 0;
        //$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["cancellist"] = $this->Report_model->cancellation_list($whereData, $config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);
        $data["from"] = $from;
        $data["to"] = $to;
        $data["status"] = $status;
        $data["bookfrom"] = $bookfrom;
        $data["title"] = $title;
        $data["url"] = $url;
        $this->load->view('report/cancellation-reports', $data);
    }

    public function Trip_wise_reports() {
        
         if ($this->session->userdata('user_id') == '' || ($this->session->userdata('user_type') != 'SA' && $this->session->userdata('user_type') != 'VA')) {
            redirect('login');
        }        
        
        $title    = trim($this->input->get('title'));
        $from     = trim($this->input->get('from'));
        $to       = trim($this->input->get('to'));
        $status   = trim($this->input->get('status'));        
        $download = $this->input->get('download');        
        
        $url = $this->uri->segment(1);
        
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url() . $url . "?title=" . $title . "&from=" . $from . "&to=" . $to . "&status=" . $status;
        $whereData = array('title' => $title, 'from' => $from, 'to' => $to, 'status' => $status,'download' => $download);
                
        $config["per_page"] = 2;
        //$config["uri_segment"] = 2;

        $config['enable_query_strings'] = TRUE;
        $config['page_query_string']    = TRUE;
        $config['use_page_numbers']     = TRUE;
        $config['query_string_segment'] = 'page';
        $config['cur_tag_open']         = '&nbsp;<a class="active">';
        $config['cur_tag_close']        = '</a>';

        $config['next_link'] = '&NestedGreaterGreater;';
        $config['prev_link'] = '&NestedLessLess;';
        $page = ($this->input->get('page')) ? ( ( $this->input->get('page') - 1 ) * $config["per_page"] ) : 0;
        $config["total_rows"]  = $this->Report_model->trip_list($whereData, $config["per_page"], $page,'yes');
        $this->pagination->initialize($config);
        
        $data["triplist"] = $this->Report_model->trip_list($whereData, $config["per_page"], $page,'no',$download);        
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links); //echo "<pre>";print_r($str_links);exit;
        $data["from"] = $from;
        $data["to"] = $to;
        $data["status"] = $status;
        $data["title"] = $title;
        $data["url"] = $url;
        
        if($download == 1 && isset($data["triplist"]) && count($data["triplist"]) > 0){
            
            $downloadData = $data["triplist"];
            
            $this->exportData($downloadData);
            
        }else{
            $this->load->view('report/Trip-reports.php', $data);
        }
    }

    public function payment_from_B2C_reports() {
        $this->load->view('report/payment-from-B2C-reports.php');
    }

    public function payment_from_B2B_reports() {
        $this->load->view('report/payment-from-B2B-reports.php');
    }

    public function payment_to_B2B_reports() {
        $this->load->view('report/payment-to-B2B-reports.php');
    }

//	public function cancellation_reports()
//	{
//        $this->load->view('report/cancellation-reports.php');      
//	}
    public function my_transaction_reports() {
        $this->load->view('report/my-transaction-reports.php');
    }

    public function exportXLfile() {
        
        $tamplate = "demo.xlt";
        $objReader = PHPExcel_IOFactory::createReader('Excel5');
        $exportdimond = $this->Userlist_Model->ExportDiamond();
        $objPHPExcel = $objReader->load("assets/file_template/" . $tamplate);

        $row = 2;
        foreach ($exportdimond as $value) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $value->id);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $value->C_Shape);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $value->C_Weight);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $value->C_Color);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $value->C_Clarity);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $value->C_Cut);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $value->C_Polish);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $value->C_Symmetry);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $value->C_Fluorescence);
            $row++;
        }
        $filename = "demo" . date("Y-m-d-H-i-s") . ".csv";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
        $objWriter->save('php://output');
    }
    
    public function bookingExport($data){ 
        $spreadsheet = new Spreadsheet();
        $sheet       = $spreadsheet->getActiveSheet();
        
        //SET HEADER
        $sheet->setCellValue('A1', 'BOOKED ON');
        $sheet->setCellValue('B1', 'PNR NO');       
        $sheet->setCellValue('C1', 'BOOKED FROM');
        $sheet->setCellValue('D1', 'TRIP TILE');
        $sheet->setCellValue('E1', 'DATE OF TRIP');
        $sheet->setCellValue('F1', 'PICKUP LOCATIONS');
        $sheet->setCellValue('G1', 'NO OF TRAVELLERS');
        $sheet->setCellValue('H1', 'PRICE TO ADULT');
        $sheet->setCellValue('I1', 'PRICE TO CHILDREN');
        $sheet->setCellValue('J1', 'PRICE TO INFAN');
        $sheet->setCellValue('K1', 'NO OF ADULT');
        $sheet->setCellValue('L1', 'NO OF CHILDREN');
        $sheet->setCellValue('M1', 'NO OF INFAN');
        $sheet->setCellValue('N1', 'DISCOUNT PERCENTAGE');
        $sheet->setCellValue('O1', 'DISCOUNT PRICE');
        $sheet->setCellValue('P1', 'OFFER AMOUNT');
        $sheet->setCellValue('Q1', 'GST PERCENTAGE');
        $sheet->setCellValue('R1', 'GST AMOUNT');
        $sheet->setCellValue('S1', 'TOTAL');
        $sheet->setCellValue('T1', 'STATUS');
        
        $row = 2;
        
        $status_val = array('New', 'Pending', 'Booked', 'Cancelled', 'Confirmed', 'Completed');
        $user_type_val = array('CU'=>'B2C Booking','GU'=>'B2C Booking','VA'=>'Office Booking');
        
        foreach ($data as $value) {           
            $user_type = $value['user_type'];
            $status    = $value['status'];
            
            $sheet->setCellValue('A' . $row, date("M d, Y", strtotime($value['booked_on'])));
            $sheet->setCellValue('B' . $row, $value['pnr_no']);            
            $sheet->setCellValue('C' . $row, $user_type_val[$user_type]);
            $sheet->setCellValue('D' . $row, $value['trip_name']);
            $sheet->setCellValue('E' . $row, date("M d, Y", strtotime($value['date_of_trip'])));
            $sheet->setCellValue('F' . $row, $value['pick_up_location']);           
            $sheet->setCellValue('G' . $row, $value['number_of_persons']);
            $sheet->setCellValue('H' . $row, $value['price_to_adult'] );
            $sheet->setCellValue('I' . $row, $value['price_to_child'] );           
            $sheet->setCellValue('J'. $row, $value['price_to_infan']);
            $sheet->setCellValue('K'. $row, $value['no_of_adult']);
            $sheet->setCellValue('L'. $row, $value['no_of_child']);
            $sheet->setCellValue('M'. $row, $value['no_of_infan']);
            $sheet->setCellValue('N' . $row,$value['discount_percentage']); 
            $sheet->setCellValue('O'. $row, $value['discount_price']);
            $sheet->setCellValue('P'. $row, $value['offer_amt']);
            $sheet->setCellValue('Q'. $row, $value['gst_percentage']);
            $sheet->setCellValue('R'. $row, $value['gst_amt']);
            $sheet->setCellValue('S'. $row, $value['total_trip_price']);
            $sheet->setCellValue('T'. $row, $status_val[$status]);          
            $row++;
        }
        
        $writer = new Xlsx($spreadsheet);
 
        $filename = 'BOOKING-REPORT-'.date('d-m-Y');
 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output'); // download file 
    }
    
    public function exportData($data){ 
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $this->load->model('Trip_model');
        
        //SET HEADER
        $sheet->setCellValue('A1', 'CODE');
        $sheet->setCellValue('B1', 'TRIP NAME');       
        $sheet->setCellValue('C1', 'CATEGORY');
        $sheet->setCellValue('D1', 'STATE');
        $sheet->setCellValue('E1', 'CITY');
        $sheet->setCellValue('F1', 'PRICE TO ADULT');
        $sheet->setCellValue('G1', 'PRICE TO CHILDREN');
        $sheet->setCellValue('H1', 'PRICE TO INFAN');
        $sheet->setCellValue('I1', 'TRIP DURATION');
        $sheet->setCellValue('J1', 'HOW MANY DAYS');
        $sheet->setCellValue('K1', 'HOW MANY NIGHTS');
        $sheet->setCellValue('L1', 'HOW MANY TIME');
        $sheet->setCellValue('M1', 'HOW MANY HOURS');
        $sheet->setCellValue('N1', 'MEETING POINT');
        $sheet->setCellValue('O1', 'OTHER PICKUP LOCATION');
        $sheet->setCellValue('P1', 'NO OF TRAVELLER');
        $sheet->setCellValue('Q1', 'NO OF MIN BOOK TRAVELLER');
        $sheet->setCellValue('R1', 'NO OF MAX BOOK TRAVELLER');
        $sheet->setCellValue('S1', 'IS SAHARED');
        $sheet->setCellValue('T1', 'BOOKING CUT OF TIME TYPE');
        $sheet->setCellValue('U1', 'BOOKING CUT OF DAY');
        $sheet->setCellValue('V1', 'BOOKING CUT OF TIME');
        $sheet->setCellValue('W1', 'BOOKING MAX CUT OFF MONTH');
        $sheet->setCellValue('X1', 'VIEW TO');
        $sheet->setCellValue('y1', 'POSTED BY');
        $sheet->setCellValue('Z1', 'POSTED ON');
        $sheet->setCellValue('AA1', 'STATUS');
        
        $row = 2;
        
        foreach ($data as $value) {
            $isactive                 = $value['isactive'] == 1 ?'Active':'Inactive';
            $trip_duration            = $value['trip_duration'] == 1 ?'Hours/minutes':'Day/hours';
            $booking_cut_of_time_type = $value['booking_cut_of_time_type'] == 1 ?'Days':'Hours';
            
            $other_pickup_locations  = '';
            
            if(isset($value['id'])){
                $otherLocations = $this->Trip_model->getPickupLocations($value['id']);
                
                if(count($otherLocations) > 0){
                    foreach($otherLocations as $k=>$v){
                        if($k != 0){
                            $other_pickup_locations .= $v['location'].' at '.date("H:i A", strtotime($v['time'])).' / '; 
                        }
                    }
                }
            }
            
            $other_pickup_locations = trim($other_pickup_locations,' / ');
            
            $sheet->setCellValue('A' . $row, $value['trip_code']);
            $sheet->setCellValue('B' . $row, $value['trip_name']);            
            $sheet->setCellValue('C' . $row, $value['category']);
            $sheet->setCellValue('D' . $row, $value['state']);
            $sheet->setCellValue('E' . $row, $value['city']);           
            $sheet->setCellValue('F' . $row, $value['price_to_adult']);
            $sheet->setCellValue('G' . $row, $value['price_to_child']);
            $sheet->setCellValue('H' . $row, $value['price_to_infan']);
            $sheet->setCellValue('I' . $row, $trip_duration);
            $sheet->setCellValue('J'. $row, $value['how_many_days']);
            $sheet->setCellValue('K'. $row, $value['how_many_nights']);
            $sheet->setCellValue('L'. $row, $value['how_many_time']);
            $sheet->setCellValue('M'. $row, $value['how_many_hours']);
            $sheet->setCellValue('N' . $row, $value['meeting_point'].' at '.date("H:i A", strtotime($value['meeting_time']))); 
            $sheet->setCellValue('O'. $row, $other_pickup_locations);
            $sheet->setCellValue('P'. $row, $value['no_of_traveller']);
            $sheet->setCellValue('Q'. $row, $value['no_of_min_booktraveller']);
            $sheet->setCellValue('R'. $row, $value['no_of_max_booktraveller']);
            $sheet->setCellValue('S'. $row, $value['is_shared'] == 1 ? 'Yes':'No');
            $sheet->setCellValue('T'. $row, $booking_cut_of_time_type);
            $sheet->setCellValue('U'. $row, $value['booking_cut_of_day']);
            $sheet->setCellValue('V'. $row, $value['booking_cut_of_time']);
            $sheet->setCellValue('W'. $row, $value['booking_max_cut_of_month']);
            $sheet->setCellValue('X'. $row,  $value['view_to'] == 2 ?'Vendor':'Customer & Vendor');
            $sheet->setCellValue('y' . $row, $value['user_fullname']);
            $sheet->setCellValue('Z' . $row, date("M d, Y", strtotime($row['created_on'])));
            $sheet->setCellValue('AA' . $row, $isactive);
           
            $row++;
        }
        
        $writer = new Xlsx($spreadsheet);
 
        $filename = 'TRIP-REPORT-'.date('d-m-Y');
 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output'); // download file 
    }

}
