<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package                CodeIgniter
 * @author                ExpressionEngine Dev Team
 * @copyright        Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license                https://codeigniter.com/user_guide/license.html
 * @link                https://codeigniter.com
 * @since                Version 1.0
 * @filesource
 */
// ------------------------------------------------------------------------
// ------------------------------------------------------------------------
//Set Default Time Zone as India
//date_default_timezone_set('NZ');


if (!function_exists('profile_pic')) {

    function profile_pic($image) {
        if (trim($image) != "" && file_exists(FCPATH . "profile/$image")) {
            return base_url() . "profile/$image";
        } else {
            return base_url() . "assets/images/man/01.jpg";
        }
    }

}

if (!function_exists('trippic')) {

    function trippic($image) {
        $randomNumber = rand(0,6); 
        $imgmaster = array('noimg.jpg','06.jpg','br.jpg','cycling-travel-experience1-sm.jpg','trekking-india-1402309802-sm.jpg','ti_725_69592403632641-sm.jpg','Trekking-sm.jpg');
        if (trim($image) != "" && file_exists(FCPATH . "uploads/$image")) {
            return base_url() . "uploads/$image";
        } else {
            return base_url() . "uploads/".$imgmaster[$randomNumber];
        }
    }

}
if (!function_exists('categorypic')) {

    function categorypic($image) {
        $randomNumber = rand(0,5); 
        $imgmaster = array('trekking-india-1402309802-sm.jpg','cycling-travel-experience1-sm.jpg','Trekking-sm.jpg','ti_725_69592403632641-sm.jpg','goaresortlead-866x487.jpg','br.jpg');
        if (trim($image) != "" && file_exists(FCPATH . "uploads/category/$image")) {
            return base_url() . "uploads/category/$image";
        } else {
            return base_url() . "uploads/category/".$imgmaster[$randomNumber];
        }
    }

}
// send E- Mail to personal mail id
/*
 * $username is login user name
 */

//if (!function_exists('sendemailtopersonalmail')) {
//
//    function sendemailtopersonalmail($userid, $subject = '', $content = '', $weburl = '', $fromown = 0, $shorttitle = '', $icon = '', $linkmsg = 'Click Here') {
//        $CI = & get_instance();
//
//        //run the forgotten password method to email an activation code to the user
//        return $sentmail = $CI->ion_auth->sendemailtopersonalmail($userid, $subject, $content, $weburl, $fromown, $shorttitle, $icon, $linkmsg);
//    }
//
//}

if (!function_exists('set_option')) {

    function set_option($current_value, $actual_value) {
        if ($current_value === $actual_value) {
            return "selected='selected'";
        }
        return "";
    }

}

if (!function_exists('formatdate')) {
    /*
     * This function will returns an formatted array
     * $array  array to be formatted
     *  
     */

    function formatdate($date, $format = 'd-m-Y') {
        //echo $date;
        if ($date != "0000-00-00 00:00:00" && $date != "1970-01-01 00:00:00" && $date != "") {
            return date($format, strtotime($date));
        }
        return date($format);
    }

}

//  Convert Time Format
if (!function_exists('convert_time_format')) {

    function convert_time_format($format, $val) {
        if ($format == 12) {
            return DATE("h:i a", STRTOTIME($val));
        } else if ($format == 24) {
            return DATE("H:i", STRTOTIME($val));
        } else {
            return "";
        }
    }

}

// Convert Date Format
if (!function_exists('convert_date_format')) {

    function convert_date_format($format, $val) {
        if ($format == 1) {
            return DATE("d m y", strtotime($val));
        } else if ($format == 2) {
            return DATE("d m Y", strtotime($val));
        } else if ($format == 3) {
            return DATE("d M Y", strtotime($val));
        } else if ($format == 4) {
            return DATE("M d", strtotime($val));
        } else if ($format == 5) {
            return DATE("d M y", strtotime($val));
        } else {
            return "";
        }
    }

}

/**
 * token dynamic value generator
 *
 * @return %y y %m m
 * @author Anjaneya
 * */
if (!function_exists('twodatediff')) {

    function twodatediff($from = '', $end = '') {
        if ($from == '') {
            $from = $end;
            $end = '';
        }
        if ($end == '') {
            $end = date('Y-m-d');
        }
        $datetime1 = new DateTime($from);
        $datetime2 = new DateTime($end);
        $interval = $datetime1->diff($datetime2);
        if ($interval->y != 0 && $interval->m != 0) {
            $result = $interval->format('%yy %mm');
        } else if ($interval->y != 0 && $interval->m == 0) {
            $result = $interval->format('%yy');
        } else if ($interval->y == 0 && $interval->m != 0) {
            $result = $interval->format('%mm');
        }
        return $result;
    }

}

//if (!function_exists('make_username')) {
//
//// Replaces all spaces with hyphens.
//// Removes special chars.
//// Replaces multiple hyphens with single one.
//
//    function make_username($string) {
//        $string = strtolower(trim($string));
//        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
//        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
//
//        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
//    }
//
//}

if (!function_exists('com_time_ago')) {

    function com_time_ago($val, $format, $sep) {
        //$val="2015-10-04 14:01:00"; $format=0; $sep=1;
        //date_default_timezone_set("Asia/Calcutta");
        $val1 = strtotime($val);
        $cur_time = time();
        $time_elapsed = $cur_time - $val1;
        $seconds = $time_elapsed;
        $minutes = round($time_elapsed / 60);
        $hours = round($time_elapsed / 3600);
        $days = round($time_elapsed / 86400);
        $weeks = round($time_elapsed / 604800);
        $months = round($time_elapsed / 2600640);
        $years = round($time_elapsed / 31207680);

        $df1 = array('j M Y'); //with year
        $df2 = array('d M'); //without year
        $tf = array('g:ia'); //time

        $seperator = array('', ' ', ' at '); //bw date and time

        $out = "";
        //Seconds
        if ($seconds <= 60) {
            $out = "just now";
        }
        //Minutes
        else if ($minutes <= 60) {
            if ($minutes == 1) {
                $out = "a minute ago";
            } else {
                $out = "$minutes min";
            }
        }
        //Hours
        else if ($hours <= 24) {
            if ($hours == 1) {
                $out = "hrs";
            } else {
                $out = "$hours hrs";
            }
        }
        //Days
        else if ($days <= 7) {
            if ($days == 1) {
                $out = "yesterday" . $seperator[$sep] . date($tf[$format], $val1);
            } else {
                $out = "$days days ago";
            }
        }
        //Past Year
        else if (date('Y', $val1) < date('Y', $cur_time)) {
            $out = date($df1[$format], $val1) . ',' . $seperator[$sep] . date($tf[$format], $val1);
        }
        //Current Year
        else {
            $out = date($df2[$format], $val1) . $seperator[$sep] . date($tf[$format], $val1);
        }

        return strtolower($out);
    }

}

if (!function_exists('does_pnr_exist')) {

    function does_pnr_exist($PNR) {
        $CI = & get_instance();
        $whereData = array('pnr_no' => $PNR);
        $trip_list = selectTable('trip_book_pay', $whereData);
        if ($trip_list->num_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

}
if (!function_exists('createPNR')) {

    function createPNR() {
        $CI = & get_instance();
        $CI->load->helper('string');
        $PNR_length = 6;
        $PNR_numlength = 2;
        $PNR = 'PNR' . random_string('numeric', $PNR_numlength) . strtoupper(random_string('alnum', $PNR_length));
        while (does_pnr_exist($PNR)) {
            $PNR = 'PNR' . random_string('numeric', $PNR_numlength) . strtoupper(random_string('alnum', $PNR_length));
        }
        return $PNR;
    }

}

/**
 * book the trip
  input: 'trip_id' => trip id,
 * 'parenttrip_id' =>$parenttrip_id
 *      'ischeckadmin' => 1, //default= 1 - if 1 check super admin offer, 2 - vendor offer, 0 - customer offer check
  'date_of_trip' => date of trip,
 * usecouponcode = ''  //Specific Customer Offer
 * @return 
 * @author Anjaneya
 * */
if (!function_exists('trip_offer')) {

    function trip_offer($offerdata = array(), $usecouponcode = '', $isbook = 0) {
        // TODO: mail sent to customer and vendor
        $CI = & get_instance();
        $loginuserid = $CI->session->userdata('user_id');
        if (count($offerdata) < 3 ||count($offerdata) > 4 ) {
            return FALSE;
        }
        $date_of_trip = formatdate($offerdata['date_of_trip'], $format = 'Y-m-d');
        $ischeckadmin = $offerdata['ischeckadmin'];
        $parenttrip_id = $offerdata['trip_id'];
        //ini veriable
        $is_allow_child = 1;
        $is_allow_infan = 1;
        $totalpricetoadult = 0;
        $totalpricetochild = 0;
        $totalpricetoinfan = 0;
        $totalextrapricetoadult = 0;
        $totalextrapricetochild = 0;
        $totalextrapricetoinfan = 0;
        $no_of_traveller = 0;
        $no_of_min_booktraveller = 0;
        $no_of_max_booktraveller = 0;
        $is_open = 1;
        $offer_type_name = '';
        $discount_percentage = 0;
        $specific_coupon_history_id = 0;
        $specific_coupon_history_code = '';
        $specific_coupon_history_name = '';
        $specific_coupon_comment = '';
        $specific_discount_percentage = 0;
        $specific_discount_price = 0;
        $specific_offer_type = 0;
        $specific_offer_by = 0;
        $trip_category_id = 0;//echo $parenttrip_id;
        $parenttrip = getallparenttrip($parenttrip_id);
        $getallparenttrip = getallparenttrip($offerdata['parenttrip_id']);
        sort($getallparenttrip);
                print_r($parenttrip);
        $inWhereData = array('id', $parenttrip);
        $whereData = array('isactive' => 1);
        $trip_list = selectTable('trip_master', $whereData = array(), $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id ASC', $having = '', $limit = array(), $result_way = 'all', $echo = 0, $inWhereData, $notInWhereData = array());
        if ($trip_list->num_rows() > 0) {
            foreach ($trip_list->result() as $row) {
                $price_to_adult = 0;
                $price_to_child = 0;
                $price_to_infan = 0;
                $is_allow_child = $row->is_allow_child;
                $is_allow_infan = $row->is_allow_infan;
                $extrapricetoadult = 0;
                $extrapricetochild = 0;
                $extrapricetoinfan = 0;
                $coupon_history_id = 0;
                $offer_type = 0;
                $offer_by = 0;
                $discount_price = 0;
                $coupon_history_code = '';
                $coupon_history_name = '';
                $coupon_comment = '';
                $trip_id = $row->id;
                $trip_user_id = $row->user_id;
                $child_user_id = 0;
                $key = array_search ($trip_id, $getallparenttrip);
                $child_trip_id = isset($getallparenttrip[$key+1])?$getallparenttrip[$key+1]:0;
                $trip_category_id = $row->trip_category_id;
                if ($row->parent_trip_id == 0) { // root trip
                    $no_of_traveller = $row->no_of_traveller;
                    $no_of_min_booktraveller = $row->no_of_min_booktraveller;
                    $no_of_max_booktraveller = $row->no_of_max_booktraveller;
                }
                $price_to_adult = $row->price_to_adult;
                $price_to_child = $row->price_to_child;
                $price_to_infan = $row->price_to_infan;

                //Offer Specific Day
                $whereData = array('isactive' => 1, 'trip_id' => $trip_id, 'from_date <=' => $date_of_trip, 'to_date >=' => $date_of_trip);
                $offer_list = selectTable('trip_specific_day', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC');
                if ($offer_list->num_rows() > 0) {
                    $offer = $offer_list->row();
                    $pricetoadult = $offer->price_to_adult;
                    $pricetochild = $offer->price_to_child;
                    $pricetoinfan = $offer->price_to_infan;

                    if ($parent_trip_id == 0) {
                        // root trip
                        if ($offer->type == 2) { // 2 - Set Trip Close Specific Day
                            $msg = 'Sorry, we could not proceed your request. ' . $offer->title . ' from ' . formatdate($offer->from_date, $format = 'M d, Y') . ' to ' . formatdate($offer->to_date, $format = 'M d, Y');
                            $result = array('is_open' => 0, 'message' => $msg, 'from_date' => formatdate($offer->from_date, $format = 'M d, Y'),
                                'to_date' => formatdate($offer->to_date, $format = 'M d, Y'));
                            return $result;
                        }
                        $no_of_traveller = $offer->no_of_traveller;
                        $no_of_min_booktraveller = $offer->no_of_min_booktraveller;
                        $no_of_max_booktraveller = $offer->no_of_max_booktraveller;

                        if ($offer->offer_type == 2) {//2 -Percentage
                            $extrapricetoadult = (int) $price_to_adult * ((int) $pricetoadult / 100);
                            $extrapricetochild = (int) $price_to_child * ((int) $pricetochild / 100);
                            $extrapricetoinfan = (int) $price_to_infan * ((int) $pricetoinfan / 100);
                        }
                        if ($offer->offer_type == 1) { //1 - Fixed and  // root trip
                            $extrapricetoadult = (int) $pricetoadult - (int) $price_to_adult;
                            $extrapricetochild = (int) $pricetochild - (int) $price_to_child;
                            $extrapricetoinfan = (int) $pricetoinfan - (int) $price_to_infan;
                        }
                        $totalextrapricetoadult = $extrapricetoadult;
                        $totalextrapricetochild = $extrapricetochild;
                        $totalextrapricetoinfan = $extrapricetoinfan;
                    } else { // not root trip
                        if ($offer->offer_type == 2) {//2 -Percentage
                            $extrapricetoadult = (int) $price_to_adult * ((int) $pricetoadult / 100);
                            $extrapricetochild = (int) $price_to_child * ((int) $pricetochild / 100);
                            $extrapricetoinfan = (int) $price_to_infan * ((int) $pricetoinfan / 100);
                        }
                        if ($offer->offer_type == 1) { //1 - Fixed and  // root trip
                            $extrapricetoadult = (int) $pricetoadult - (int) $price_to_adult;
                            $extrapricetochild = (int) $pricetochild - (int) $price_to_child;
                            $extrapricetoinfan = (int) $pricetoinfan - (int) $price_to_infan;
                        }
                        $totalextrapricetoadult = (int) $totalextrapricetoadult + (int) $extrapricetoadult;
                        $totalextrapricetochild = (int) $totalextrapricetochild + (int) $extrapricetochild;
                        $totalextrapricetoinfan = (int) $totalextrapricetoinfan + (int) $extrapricetoinfan;
                    }
                }
                $price_to_adult = (int) $price_to_adult + (int) $totalextrapricetoadult;
                $price_to_child = (int) $price_to_child + (int) $totalextrapricetochild;
                $price_to_infan = (int) $price_to_infan + (int) $totalextrapricetoinfan;
//                if (($CI->session->userdata('user_type') == 'VA' || $ischeckadmin == 2) && $trip_id == $parenttrip_id && count($parenttrip)<=2) {
//                    echo count($parenttrip);
//                }else 
                //echo $ischeckadmin;
                    if (($CI->session->userdata('user_type') == 'VA' || $ischeckadmin == 2) && $trip_id != $offerdata['parenttrip_id']) {
                        
                    //Vandor coupon  (office book), shared trip
//                    if($isbook == 1){
//                        $whereData = array('type' => 2, 'isactive' => 1, 'trip_id' => $row->id, 'validity_from <=' => $date_of_trip, 'validity_to >=' => $date_of_trip);
//                        $couponhistory_list = selectTable('coupon_code_master_history', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC');
//                    }else{
                        $whereData = array('id' => $child_trip_id);
                        $trip_list55 = selectTable('trip_master', $whereData);
                        if ($trip_list55->num_rows() >0) {
                            $row = $trip_list55->row();
                            $child_user_id = $row->user_id;
                        }
                        $whereData = array('cc.type' => 2, 'cc.isactive' => 1, 'ts.status' => 2,'ts.shared_user_id' => $child_user_id,'ts.user_id' => $trip_user_id,'ts.isactive' => 1, 'cc.trip_id' => $row->id, 'cc.validity_from <=' => $date_of_trip, 'cc.validity_to >=' => $date_of_trip);
                        //$whereData = array('cc.type' => 2, 'cc.isactive' => 1, 'ts.status' => 2,'ts.user_id' => $loginuserid,'ts.isactive' => 1, 'cc.trip_id' => $row->id, 'cc.validity_from <=' => $date_of_trip, 'cc.validity_to >=' => $date_of_trip);
                        $joins = array(
                            array(
                                'table' => 'trip_shared AS ts',
                                'condition' => 'ts.id = tm.trip_shared_id',
                                'jointype' => 'INNER'
                            ),
                            array(
                                'table' => 'coupon_code_master_history AS cc',
                                'condition' => 'cc.id = ts.coupon_history_id',
                                'jointype' => 'INNER'
                            ),
                        );
                        $columns = 'cc.*';
                        $couponhistory_list = get_joins('trip_master AS tm', $columns, $joins, $whereData, $orWhereData = array(), $group = array(), $order = 'cc.id DESC');
//                    }
                    if ($couponhistory_list->num_rows() > 0) {
                        $couponhistory = $couponhistory_list->row();
                        $coupon_history_id = $couponhistory->id;
                        $coupon_history_code = $couponhistory->coupon_code;
                        $coupon_history_name = $couponhistory->coupon_name;
                        $offer_by = $couponhistory->type;
                        $coupon_comment = $couponhistory->comment;
                        $offer_type = $couponhistory->offer_type;
                        if ($offer_type == 1) {//fixed
                            $discount_price = $couponhistory->percentage_amount;
                        }
                        if ($offer_type == 2) {//percentage
                            $discount_percentage = $couponhistory->percentage_amount;
                        }
                    }
                } else {// super admin coupon changes for customer
                    // coupon for customer from vendor
                    $whereData = array('type' => 1, 'isactive' => 1, 'trip_id' => $row->id, 'validity_from <=' => $date_of_trip, 'validity_to >=' => $date_of_trip);
                    $couponhistory_list = selectTable('coupon_code_master_history', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC');
                    if ($couponhistory_list->num_rows() > 0) {
                        $couponhistory = $couponhistory_list->row();
                        $coupon_history_id = $couponhistory->id;
                        $coupon_history_code = $couponhistory->coupon_code;
                        $coupon_history_name = $couponhistory->coupon_name;
                        $coupon_comment = $couponhistory->comment;
                        $offer_by = $couponhistory->type;
                        $offer_type = $couponhistory->offer_type;
                        if ($offer_type == 1) {//fixed
                            $discount_price = $couponhistory->percentage_amount;
                        }
                        if ($offer_type == 2) {//percentage
                            $discount_percentage = $couponhistory->percentage_amount;
                        }
                    }
                }

                if ($usecouponcode != '' && $trip_id == $offerdata['parenttrip_id']) { // Specific Customer Offer
                    $whereData = array('isactive' => 1, 'type' => 4, 'trip_id' => $row->id, 'coupon_code' => $usecouponcode, 'validity_from <=' => $date_of_trip, 'validity_to >=' => $date_of_trip);
                    $couponhistory_list = selectTable('coupon_code_master_history', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC');
                    if ($couponhistory_list->num_rows() > 0) {
                        $couponhistory = $couponhistory_list->row();
                        $specific_coupon_history_id = $couponhistory->id;
                        $specific_coupon_history_code = $couponhistory->coupon_code;
                        $specific_coupon_history_name = $couponhistory->coupon_name;
                        $specific_coupon_comment = $couponhistory->comment;
                        $specific_offer_type = $couponhistory->offer_type;
                        $specific_offer_by = $couponhistory->type;
                        if ($specific_offer_type == 1) {//fixed
                            $specific_discount_price = $couponhistory->percentage_amount;
                            //$discount_price = (int) $discount_price + (int) $specific_discount_price;
                        }
                        if ($specific_offer_type == 2) {//percentage
                            $specific_discount_percentage = $couponhistory->percentage_amount;
                            //$discount_percentage = (int) $discount_percentage + (int) $specific_discount_percentage;
                        }
                    }
                }
                //final amt
                $totalpricetoadult = (int) $price_to_adult;
                $totalpricetochild = (int) $price_to_child;
                $totalpricetoinfan = (int) $price_to_infan;
            }
            if ($CI->session->userdata('user_type') == 'CU' || $CI->session->userdata('user_type') == 'GU') {
                $whereData = array('category_id' => $trip_category_id, 'type' => 3, 'isactive' => 1, 'validity_from <=' => $date_of_trip, 'validity_to >=' => $date_of_trip);
                $couponhistory_list = selectTable('coupon_code_master_history', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC');
                if ($couponhistory_list->num_rows() > 0 && $ischeckadmin == 1) { // coupon for CA from admin
                    $couponhistory = $couponhistory_list->row();
                    $coupon_history_id = $couponhistory->id;
                    $coupon_history_code = $couponhistory->coupon_code;
                    $coupon_history_name = $couponhistory->coupon_name;
                    $coupon_comment = $couponhistory->comment;
                    $offer_by = $couponhistory->type;
                    $offer_type = $couponhistory->offer_type;
                    $pricetoadult = $couponhistory->price_to_adult;
                    $pricetochild = $couponhistory->price_to_child;
                    $pricetoinfan = $couponhistory->price_to_infan;

                    $price_to_adult = (int) $totalpricetoadult + ((int) $price_to_adult * ((int) $pricetoadult / 100));
                    $price_to_child = (int) $totalpricetochild + ((int) $price_to_child * ((int) $pricetochild / 100));
                    $price_to_infan = (int) $totalpricetoinfan + ((int) $price_to_infan * ((int) $pricetoinfan / 100));
                    if ($offer_type == 1) {//fixed
                        $discount_price = $couponhistory->percentage_amount;
                    }
                    if ($offer_type == 2) {//percentage
                        $discount_percentage = $couponhistory->percentage_amount;
                    }
                    $totalpricetoadult = (int) $price_to_adult;
                    $totalpricetochild = (int) $price_to_child;
                    $totalpricetoinfan = (int) $price_to_infan;
                }
            }
            // get offer
            if ($offer_type == 1) {
                $offer_type_name = 'Fixed Amount';
            }
            if ($offer_type == 2) {
                $offer_type_name = 'Percentage Amount';
            }
            if (strpos($discount_percentage, '.00') !== false) {
                $discount_percentage = round($discount_percentage);
            }
            if (strpos($discount_price, '.00') !== false) {
                $discount_price = round($discount_price);
            }



            $checktripavailable = checktripavailable($parenttrip_id, $date_of_trip);
            $availabletraveller = $checktripavailable['total_available'];
//            $whereData = array('isactive' => 1, 'status' => 2, 'payment_status' => 1, 'trip_id' => $parenttrip_id, 'date_of_trip' => $date_of_trip);
//            $trip_book_pay_list = selectTable('trip_book_pay', $whereData, $showField);
//            if ($trip_book_pay_list->num_rows() > 0) {
//                $row = $trip_book_pay_list->row();
//                $totalbookedpersons = $row->totalbookedpersons;
//            }
            //$availabletraveller = (int) $no_of_traveller - (int) $totalbookedpersons;
            $final_price_to_adult = $totalpricetoadult;
            $final_price_to_child = $totalpricetochild;
            $final_price_to_infan = $totalpricetoinfan;
            if ($offer_type == 1) {
                $final_price_to_adult = (int) $totalpricetoadult - (int) $discount_price;
                $final_price_to_child = (int) $totalpricetochild - (int) $discount_price;
                $final_price_to_infan = (int) $totalpricetoinfan - (int) $discount_price;
            }
            if ($offer_type == 2) {
                $final_price_to_adult = (int) $totalpricetoadult - ((int) $totalpricetoadult * ((int) $discount_percentage / 100));
                $final_price_to_child = (int) $totalpricetochild - ((int) $totalpricetochild * ((int) $discount_percentage / 100));
                $final_price_to_infan = (int) $totalpricetoinfan - ((int) $totalpricetoinfan * ((int) $discount_percentage / 100));
            }
            if ($final_price_to_adult < 0) {
                $final_price_to_adult = 0;
            }
            if ($final_price_to_child < 0) {
                $final_price_to_child = 0;
            }
            if ($final_price_to_infan < 0) {
                $final_price_to_infan = 0;
            }
            $gst_percentage = GST_PERCENTAGE;
            $result = array('is_open' => $is_open, 'price_to_adult' => $totalpricetoadult, 'price_to_child' => $totalpricetochild, 'price_to_infan' => $totalpricetoinfan,'is_allow_child' => $is_allow_child, 'is_allow_infan' => $is_allow_infan,
                'no_of_traveller' => $no_of_traveller, 'availabletraveller' => $availabletraveller, 'no_of_min_booktraveller' => $no_of_min_booktraveller, 'no_of_max_booktraveller' => $no_of_max_booktraveller,
                'coupon_history_id' => $coupon_history_id, 'offer_by_type' => $offer_by, 'coupon_code' => $coupon_history_code, 'coupon_name' => $coupon_history_name, 'offer_type' => $offer_type, 'offer_type_name' => $offer_type_name,
                'coupon_comment' => $coupon_comment, 'discount_price' => $discount_price, 'discount_percentage' => $discount_percentage, 'gst_percentage' => $gst_percentage,
                'specific_coupon_history_id' => $specific_coupon_history_id, 'specific_coupon_code' => $specific_coupon_history_code, 'specific_coupon_name' => $specific_coupon_history_name,
                'specific_offer_type' => $specific_offer_type,'specific_offer_by' => $specific_offer_by, 'specific_discount_price' => $specific_discount_price, 'specific_discount_percentage' => $specific_discount_percentage,
                'final_price_to_adult' => $final_price_to_adult, 'final_price_to_child' => $final_price_to_child, 'final_price_to_infan' => $final_price_to_infan);
            return $result;
        }
        $result = array('is_open' => 0, 'message' => 'Sorry, we could not proceed your request.please try again later!...', 'from_date' => '', 'to_date' => '');
        return $result;
    }

}



/**
 * book the trip
  input: array(
  'trip_id' => trip id,
  'book_user_id' => book user_id, customer user id
  'no_of_adult' => no of adult,
  'no_of_child' => no of child,
  'no_of_infan' => no of infan,
  'date_of_trip' => date of trip,
  //'time_of_trip' => time of trip,
  'pick_up_location_id' => pick up location id,
    'booked_to' => $cus_name,
    'booked_email' => $cus_email,
    'booked_phone_no' => $cus_phone,
    'booked_comment' => $booked_comment)
 * usecouponcode = ''  //Specific Customer Offer
 * @return 
 * @author Anjaneya
 * */
if (!function_exists('trip_book')) {

    function trip_book($bookdata = array(), $usecouponcode = '', $isbook = 0) {
        // TODO: mail sent to customer and vendor

        $CI = & get_instance();
        $loginuserid = $CI->session->userdata('user_id');
        if ($loginuserid == '') {
            $loginuserid = $bookdata['book_user_id'];
        }
        if (count($bookdata) != 11 || $loginuserid == '') {
            $result = array('status' => 0, 'is_open' => 0, 'message' => 'Sorry! try again...', 'from_date' => '', 'to_date' => '');
            return $result;
        }
        $date_of_trip = formatdate($bookdata['date_of_trip'], $format = 'Y-m-d');
        $parenttrip_id = $bookdata['trip_id'];
        $tripamount = 0;
        $is_shared = 0;
        $parent_trip_id = 0;
        $trip_user_id = 0;
        $trip_location_name = '';
        $trip_location_landmark = '';
        $discount_price = 0;
        $time_of_trip = '';$master_net_price = 0;
        $whereData = array('isactive' => 1, 'trip_id' => $bookdata['trip_id'], 'id' => $bookdata['pick_up_location_id']);
        $location_list = selectTable('pick_up_location_map', $whereData);
        if ($location_list->num_rows() > 0) {
            $location = $location_list->row();
            $time_of_trip = $location->time;
            $trip_location_name = $location->location;
            $trip_location_landmark = $location->landmark;
        }
        $how_many_days = 0;
        $whereData = array('isactive' => 1, 'id' => $bookdata['trip_id']);
        $trip_list = selectTable('trip_master', $whereData);
        if ($trip_list->num_rows() > 0) {
            $row = $trip_list->row();
            $parent_trip_id = $row->parent_trip_id;
            $how_many_days = $row->how_many_days;
            $trip_user_id = $row->user_id;
        }

        $dateoftrip = date('Y-m-d', strtotime($bookdata['date_of_trip'] . ' + ' . $how_many_days . ' days'));
        $date_of_trip_to = formatdate($dateoftrip, $format = 'Y-m-d');
        // find offer for customer
        $offer_amt = 0;
        $discount_percentage = 0;
        $specific_discount_price = 0;
        $specific_discount_percentage = 0;
        $specific_offer_amt = 0;
        $offerdata = array(
            'trip_id' => $parenttrip_id,
            'parenttrip_id' => $parenttrip_id,
            'date_of_trip' => $date_of_trip,
            'ischeckadmin' => 1); //default= 1 - if 1 check super admin offer, 2 - vendor offer, 0 - customer offer check
        if ($CI->session->userdata('user_type') == 'VA') {
            $offerdata['ischeckadmin'] = 0;
        }
        $offerinfo = trip_offer($offerdata,$usecouponcode,$isbook);
        //print_r($offerinfo);//exit();
        if (isset($offerinfo['is_open']) && $offerinfo['is_open'] == 0) {
            $result = array('status' => $offerinfo['is_open'], 'is_open' => $offerinfo['is_open'], 'message' => $offerinfo['message'], 'from_date' => '', 'to_date' => '');
            return $result;
        }
        // check allow child and infant
        if ($offerinfo['is_allow_child'] ==0 && $bookdata['no_of_child']>0) {
            $result = array('status' => 0, 'is_open' => 0, 'message' => 'Sorry! we are not allow child', 'from_date' => '', 'to_date' => '');
            return $result;
        }
        if ($offerinfo['is_allow_infan'] ==0 && $bookdata['no_of_adult']>0) {
            $result = array('status' => 0, 'is_open' => 0, 'message' => 'Sorry! we are not allow infan', 'from_date' => '', 'to_date' => '');
            return $result;
        }
        
        $number_of_persons = (int) $bookdata['no_of_adult'] + (int) $bookdata['no_of_child'] + (int) $bookdata['no_of_infan'];
        // check traveller valid
        if ($offerinfo['availabletraveller'] < $number_of_persons || ($offerinfo['no_of_min_booktraveller'] > $number_of_persons || $offerinfo['no_of_max_booktraveller'] < $number_of_persons)) {
            $result = array('status' => 0, 'is_open' => 0, 'message' => 'Sorry! You can book Min ' . $offerinfo['no_of_min_booktraveller'] . ' to Max ' . $offerinfo['no_of_max_booktraveller'] . ' and available booking ' . $offerinfo['availabletraveller'], 'from_date' => '', 'to_date' => '');
            return $result;
        }
        //print_r($offerinfo);exit();
        // cost for trip member
        $total_adult_price = (int) $bookdata['no_of_adult'] * (int) $offerinfo['price_to_adult'];
        $total_child_price = (int) $bookdata['no_of_child'] * (int) $offerinfo['price_to_child'];
        $total_infan_price = (int) $bookdata['no_of_infan'] * (int) $offerinfo['price_to_infan'];
        $subtotal_trip_price = (int) $total_adult_price + (int) $total_child_price + (int) $total_infan_price;
        // get offer
        if ($offerinfo['offer_type'] == 1) {
            $discount_price = $offerinfo['discount_price'];
            $offer_amt = $offerinfo['discount_price'] * (int) $number_of_persons;
        }
        if ($offerinfo['offer_type'] == 2 && $offerinfo['discount_percentage'] != '0.00') {
            $discount_percentage = $offerinfo['discount_percentage'];
            if (strpos($discount_percentage, '.00') !== false) {
                $discount_percentage = round($discount_percentage);
            }
            $offer_amt = (int) $subtotal_trip_price * ((int) $discount_percentage / 100);
        }
        // get offer for Specific Customer Offer
        if ($offerinfo['specific_offer_type'] == 1) {
            $specific_discount_price = $offerinfo['specific_discount_price'];
            $specific_offer_amt = $offerinfo['specific_discount_price'] * (int) $number_of_persons;
        }
        if ($offerinfo['specific_offer_type'] == 2 && $offerinfo['specific_discount_percentage'] != '0.00') {
            $specific_discount_percentage = $offerinfo['specific_discount_percentage'];
            if (strpos($specific_discount_percentage, '.00') !== false) {
                $specific_discount_percentage = round($specific_discount_percentage);
            }
            $specific_offer_amt = (int) $subtotal_trip_price * ((int) $specific_discount_percentage / 100);
        }
        //add  offer_amt + $specific_offer_amt
        $offer_amt = $specific_offer_amt + $offer_amt;
        if ($offerinfo['coupon_history_id'] == 0) {
            $offerinfo['coupon_history_id'] = $offerinfo['specific_coupon_history_id'];
            $offerinfo['specific_coupon_history_id'] = 0;
        }
        $total_trip_price = (int) $subtotal_trip_price - (int) $offer_amt;
        //Find GST
        $gst_percentage = GST_PERCENTAGE;
        $gst_amt = $total_trip_price * (GST_PERCENTAGE / 100);
        $round_off = round(round($total_trip_price + $gst_amt) - ($total_trip_price + $gst_amt), 2);
        $net_price = $total_trip_price + $gst_amt + $round_off;
        $pnr_no = createPNR();
        $tripamount = $net_price;
        $master_net_price = $net_price;
        $masternet_price =0;
        // insert for customer
        $book_pay = array(
            'parent_trip_id' => $parent_trip_id,
            'trip_user_id' => $trip_user_id,
            'trip_id' => $bookdata['trip_id'],
            'user_id' => $bookdata['book_user_id'], // customer user
            'pnr_no' => $pnr_no,
            'price_to_adult' => $offerinfo['price_to_adult'],
            'price_to_child' => $offerinfo['price_to_child'],
            'price_to_infan' => $offerinfo['price_to_infan'],
            'number_of_persons' => $number_of_persons,
            'no_of_adult' => $bookdata['no_of_adult'],
            'no_of_child' => $bookdata['no_of_child'],
            'no_of_infan' => $bookdata['no_of_infan'],
            'total_adult_price' => $total_adult_price,
            'total_child_price' => $total_child_price,
            'total_infan_price' => $total_infan_price,
            'subtotal_trip_price' => $subtotal_trip_price,
            'coupon_history_id' => $offerinfo['coupon_history_id'],
            'specific_coupon_history_id' => $offerinfo['specific_coupon_history_id'],
            'specific_coupon_code' => $offerinfo['specific_coupon_code'],
            'discount_price' => $discount_price,
            'discount_percentage' => $discount_percentage,
            'offer_amt' => $offer_amt,
            'total_trip_price' => $total_trip_price,
            'gst_percentage' => GST_PERCENTAGE,
            'gst_amt' => $gst_amt,
            'round_off' => $round_off,
            'net_price' => $net_price,
            'date_of_trip' => formatdate($bookdata['date_of_trip'], $format = 'Y-m-d'),
            'date_of_trip_to' => $date_of_trip_to,
            'time_of_trip' => $time_of_trip,
            'pick_up_location_id' => $bookdata['pick_up_location_id'],
            'pick_up_location' => $trip_location_name,
            'pick_up_location_landmark' => $trip_location_landmark,
            'booked_by' => $loginuserid,
            'booked_to' => $bookdata['booked_to'],
            'booked_email' => $bookdata['booked_email'],
            'booked_phone_no' => $bookdata['booked_phone_no'],
            'booked_comment' => $bookdata['booked_comment'],
            'status' => 1,
            'payment_status' => 0
        );
        //$trip_book_payid = insertTable('trip_book_pay', $book_pay);
        $trip_book_payid=6;
        //echo '<br><br>'; print_r($book_pay);
        //exit();
        $paydetailsidmaster = $pay_details_id = '-' . $trip_book_payid;
        $book_pay_detailsid = 0;
        if ($trip_book_payid) {
            // check super admin offer for customer
            if ($offerinfo['offer_by_type'] == 3) {// super admin coupon changes
                $discount_percentage = 0;
                $discount_price = 0;
                $offer_amt = 0;
                $coupon_history_id = 0;
                $total_adult_price = 0;
                $total_child_price = 0;
                $total_infan_price = 0;
                $subtotal_trip_price = 0;
                //check offer
                $offerdata = array(
                    'trip_id' => $parenttrip_id,
                    'parenttrip_id' => $parenttrip_id,
                    'date_of_trip' => $date_of_trip,
                    'ischeckadmin' => 0); //default= 1 - if 1 check super admin offer, 2 - vendor offer, 0 - customer offer check
                $checkoffer = trip_offer($offerdata);
                //echo '<br><br>'; print_r($checkoffer);
                $number_of_persons = (int) $bookdata['no_of_adult'] + (int) $bookdata['no_of_child'] + (int) $bookdata['no_of_infan'];
                $total_adult_price = $bookdata['no_of_adult'] * $checkoffer['price_to_adult'];
                $total_child_price = $bookdata['no_of_child'] * $checkoffer['price_to_child'];
                $total_infan_price = $bookdata['no_of_infan'] * $checkoffer['price_to_infan'];
                $subtotal_trip_price = (int) $total_adult_price + (int) $total_child_price + (int) $total_infan_price;

                // get offer
                if ($checkoffer['offer_type'] == 1) {
                    $discount_price = $checkoffer['discount_price'];
                    $offer_amt = (int) $checkoffer['discount_price'] * (int) $number_of_persons;
                }
                if ($checkoffer['offer_type'] == 2 && $checkoffer['discount_percentage'] != '0.00') {
                    $discount_percentage = $checkoffer['discount_percentage'];
                    if (strpos($discount_percentage, '.00') !== false) {
                        $discount_percentage = round($discount_percentage);
                    }
                    $offer_amt = (int) $subtotal_trip_price * ((int) $discount_percentage / 100);
                }
                $total_trip_price = (int) $subtotal_trip_price - (int) $offer_amt;


                $vendor_amt = $total_trip_price;
                $net_price = (int) $book_pay['total_trip_price'] - (int) $vendor_amt;
                $servicecharge_amt = $net_price * (SERVICECHARGE_PERCENTAGE / 100);
                if ($servicecharge_amt < SERVICECHARGE_AMT) {// get max amt
                    $servicecharge_amt = SERVICECHARGE_AMT;
                }
                $your_amt = (int) $net_price - (int) $servicecharge_amt;
                $gst_amt = (int) $your_amt * ((int) GST_PERCENTAGE / 100);
                $your_final_amt_temp = (int) $your_amt + (int) $gst_amt;
                $round_off = round($your_final_amt_temp) - ($your_final_amt_temp);
                $your_final_amt = $round_off + $your_final_amt_temp;
                $masternet_price +=$your_final_amt+$servicecharge_amt;
                $book_pay_details = array(
                    'book_pay_id' => $trip_book_payid,
                    'parent_trip_id' => $parent_trip_id,
                    'trip_user_id' => $trip_user_id,
                    'trip_id' => $book_pay['trip_id'],
                    'from_user_id' => $bookdata['book_user_id'],
                    'from_trip_id' => $bookdata['trip_id'],
                    'user_id' => 0,
                    'pnr_no' => $book_pay['pnr_no'],
                    'price_to_adult' => $book_pay['price_to_adult'],
                    'price_to_child' => $book_pay['price_to_child'],
                    'price_to_infan' => $book_pay['price_to_infan'],
                    'number_of_persons' => $book_pay['number_of_persons'],
                    'no_of_adult' => $book_pay['no_of_adult'],
                    'no_of_child' => $book_pay['no_of_child'],
                    'no_of_infan' => $book_pay['no_of_infan'],
                    'total_adult_price' => $book_pay['total_adult_price'],
                    'total_child_price' => $book_pay['total_child_price'],
                    'total_infan_price' => $book_pay['total_infan_price'],
                    'subtotal_trip_price' => $book_pay['subtotal_trip_price'],
                    'coupon_history_id' => $book_pay['coupon_history_id'],
                    'discount_price' => $book_pay['discount_price'],
                    'discount_percentage' => $book_pay['discount_percentage'],
                    'offer_amt' => $book_pay['offer_amt'],
                    'total_trip_price' => $book_pay['total_trip_price'],
                    'vendor_amt' => $vendor_amt,
                    'your_amt' => $your_amt,
                    'net_price' => $net_price,
                    'servicecharge_amt' => $servicecharge_amt,
                    'gst_percentage' => GST_PERCENTAGE,
                    'gst_amt' => $gst_amt,
                    'your_final_amt' => $your_final_amt,
                    'round_off' => number_format($round_off, 2),
                    'date_of_trip' => $book_pay['date_of_trip'],
                    'date_of_trip_to' => $book_pay['date_of_trip_to'],
                    'time_of_trip' => $book_pay['time_of_trip'],
                    'pick_up_location_id' => $book_pay['pick_up_location_id'],
                    'pick_up_location' => $book_pay['pick_up_location'],
                    'pick_up_location_landmark' => $book_pay['pick_up_location_landmark'],
                    'booked_by' => $loginuserid,
                    'booked_to' => $bookdata['booked_to'],
                    'booked_email' => $bookdata['booked_email'],
                    'booked_phone_no' => $bookdata['booked_phone_no'],
                    'booked_comment' => $bookdata['booked_comment'],
                    'status' => 1,
                    'payment_status' => 0,
                    'pay_details_id' => $pay_details_id
                );
                $book_pay_detailsid = insertTable('trip_book_pay_details', $book_pay_details);
                //$book_pay_detailsid =11;
                //echo '<br><br>'; print_r($book_pay_details);
                $pay_details_id = $book_pay_detailsid;
            }
            if ($parenttrip_id > 0) {
                $parenttrip = getallparenttrip($parenttrip_id);
                //echo '<br><br>';print_r($parenttrip);
                $parent_trip_id = 0;
                $trip_user_id = 0;
                $vendor_amt = 0;$parentservicecharge=0;
                $parent_discount_price = 0;
                $inWhereData = array('id', $parenttrip);
                $whereData = array('isactive' => 1);
                $trip_list = selectTable('trip_master', $whereData = array(), $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id ASC', $having = '', $limit = array(), $result_way = 'all', $echo = 0, $inWhereData, $notInWhereData = array());
                if ($trip_list->num_rows() > 0) {
                    foreach ($trip_list->result() as $row) {
                        $trip_id = $row->id;
                        $user_id = $row->user_id;
                        $parent_trip_id = $row->parent_trip_id;
                        $trip_user_id = $row->user_id;
                        $discount_percentage = 0;
                        $discount_price = 0;
                        $offer_amt = 0;
                        $coupon_history_id = 0;
                        $total_adult_price = 0;
                        $total_child_price = 0;
                        $total_infan_price = 0;
                        $subtotal_trip_price = 0;
                        $specific_discount_price = 0;
                        $specific_discount_percentage = 0;
                        $specific_offer_amt = 0;$discount_your_price = 0;
                        //check offer
                        $offerdata = array(
                            'trip_id' => $trip_id,
                            'parenttrip_id' => $parenttrip_id,
                            'date_of_trip' => $date_of_trip,
                            'ischeckadmin' => 2); //default= 1 - if 1 check super admin offer, 2 - vendor offer, 0 - customer offer check
                        if ($trip_id == $bookdata['trip_id']) {
                            $offerdata['ischeckadmin'] = 0;
                        } print_r($offerdata);
                        $checkoffer = trip_offer($offerdata, $usecouponcode,$isbook);
                        echo '<br><br>'; print_r($checkoffer);exit();
                        $number_of_persons = (int) $bookdata['no_of_adult'] + (int) $bookdata['no_of_child'] + (int) $bookdata['no_of_infan'];
                        $total_adult_price = $bookdata['no_of_adult'] * $checkoffer['price_to_adult'];
                        $total_child_price = $bookdata['no_of_child'] * $checkoffer['price_to_child'];
                        $total_infan_price = $bookdata['no_of_infan'] * $checkoffer['price_to_infan'];
                        $subtotal_trip_price = (int) $total_adult_price + (int) $total_child_price + (int) $total_infan_price;
                        //subtotal_trip_price = total_adult_price + total_child_price + total_infan_price
                        // get offer
                        if ($checkoffer['offer_type'] == 1) {
                            $discount_price = $checkoffer['discount_price'];
                            $offer_amt = (int) $checkoffer['discount_price'] * (int) $number_of_persons;
                        }
                        if ($checkoffer['offer_type'] == 2 && $checkoffer['discount_percentage'] != '0.00') {
                            $discount_percentage = $checkoffer['discount_percentage'];
                            if (strpos($discount_percentage, '.00') !== false) {
                                $discount_percentage = round($discount_percentage);
                            }
                            $offer_amt = (int) $subtotal_trip_price * ((int) $discount_percentage / 100);
                        }
                        // get offer for Specific Customer Offer
                        if ($checkoffer['specific_offer_type'] == 1) {
                            $specific_discount_price = $checkoffer['specific_discount_price'];
                            $specific_offer_amt = $checkoffer['specific_discount_price'] * (int) $number_of_persons;
                        }
                        if ($checkoffer['specific_offer_type'] == 2 && $checkoffer['specific_discount_percentage'] != '0.00') {
                            $specific_discount_percentage = $checkoffer['specific_discount_percentage'];
                            if (strpos($specific_discount_percentage, '.00') !== false) {
                                $specific_discount_percentage = round($specific_discount_percentage);
                            }
                            $specific_offer_amt = (int) $subtotal_trip_price * ((int) $specific_discount_percentage / 100);
                        }
                        //add  offer_amt + $specific_offer_amt
                        $offer_amt = $specific_offer_amt + $offer_amt;
                        if ($checkoffer['coupon_history_id'] == 0) {
                            $checkoffer['coupon_history_id'] = $checkoffer['specific_coupon_history_id'];
                            $checkoffer['specific_coupon_history_id'] = 0;
                        }
                        $total_trip_price = (int) $subtotal_trip_price;
                        //temp for offer limit
                        $total_trip_price_temp2 = $total_trip_price_temp = (int) $subtotal_trip_price - (int) $vendor_amt;
                        if($offer_amt<$total_trip_price_temp2){
                            $total_trip_price_temp2 = (int) $total_trip_price_temp2- (int) $offer_amt;
                        } 
                        //offer limit
                        if($total_trip_price_temp2<$offer_amt){
                            $offer_amt=$total_trip_price_temp;
                            $servicecharge_amt_temp = $total_trip_price_temp2 * (SERVICECHARGE_PERCENTAGE / 100);
                            if ($servicecharge_amt_temp < SERVICECHARGE_AMT) {// get max amt
                                $servicecharge_amt_temp = SERVICECHARGE_AMT;
                            }
                            if ($CI->session->userdata('user_type') == 'VA' && $trip_id ==$parenttrip_id) {// booking vendor 0 service amt
                                $servicecharge_amt_temp = 0;
                            }
                            $offer_amt = (int) $offer_amt - (int) $servicecharge_amt_temp;
                        }
                        $total_trip_price_temp = $total_trip_price_temp-$offer_amt;
//                        echo "<br>"; 
//                        echo $total_trip_price_temp;
                        //check limit for $vendor_cash_amt
                        $vendor_cash_amt=0;
                        if($total_trip_price_temp>0 && $CI->session->userdata('user_type') == 'VA' && $trip_id ==$parenttrip_id){
                            $vendor_cash_amt=$total_trip_price_temp;
                            $servicecharge_amt_temp = $subtotal_trip_price * (SERVICECHARGE_PERCENTAGE / 100);
                            if ($servicecharge_amt_temp < SERVICECHARGE_AMT) {// get max amt
                                $servicecharge_amt_temp = SERVICECHARGE_AMT;
                            }
                            if ($CI->session->userdata('user_type') == 'VA' && $trip_id ==$parenttrip_id) {// booking vendor 0 service amt
                                $servicecharge_amt_temp = 0;
                            }
                            $vendor_cash_amt = (int) $vendor_cash_amt - (int) $servicecharge_amt_temp;
                        }
                        $net_price = (int) $total_trip_price - (int) $vendor_amt - (int) $offer_amt - (int) $vendor_cash_amt;
                        
                        
                        //echo $vendor_cash_amt;
                        $servicecharge_amt = $net_price * (SERVICECHARGE_PERCENTAGE / 100);
                        if ($servicecharge_amt < SERVICECHARGE_AMT ) {// get max amt
                            $servicecharge_amt = SERVICECHARGE_AMT;
                        }
                        
                        if ($CI->session->userdata('user_type') == 'VA' && $trip_id ==$parenttrip_id) {// booking vendor 0 service amt
                            $servicecharge_amt = 0;
                        }
                        //if 100% discount need to get servicecharge amt
//                        if($net_price<$servicecharge_amt){
//                            $parentservicecharge=$parentservicecharge+$servicecharge_amt;
//                            $servicecharge_amt = 0;
//                        }
//                        else if($net_price>=$parentservicecharge && $parentservicecharge!=0){
//                            if($vendor_cash_amt>$servicecharge_amt){
//                                $vendor_cash_amt= $vendor_cash_amt-$servicecharge_amt;
//                                $net_price=$net_price+$servicecharge_amt;
//                            }
//                            $servicecharge_amt = $servicecharge_amt+$parentservicecharge;
//                            $parentservicecharge = 0;
//                        }
                        $your_amt = (int) $net_price - (int) $servicecharge_amt;
                        
                        //your_amt = net_price - servicecharge_amt
                        $gst_amt = $your_amt * (GST_PERCENTAGE / 100);
                        $your_final_amt_temp = $your_amt + $gst_amt;
                        $round_off = round($your_final_amt_temp) - ($your_final_amt_temp);
                        $your_final_amt = $round_off + $your_final_amt_temp;
                        //your_final_amt = your_amt + gst_amt
                        //$vendor_cash_amt=0;
//                        if ($trip_id ==$parenttrip_id) {
//                           // $discount_your_price = $your_final_amt;
////                            if($CI->session->userdata('user_type') == 'VA'){
////                                $master_net_price = $master_net_price - 20;
////                            }else{
////                                $master_net_price = $master_net_price - $your_final_amt;
////                            }
////                            if($total_trip_price_temp>0){
////                                $vendor_cash_amt = $your_amt;
////                            }
////                            $your_final_amt = 0;
////                            $your_amt = 0;
//                        }
                        
                        //$discount_your_price = $total_trip_price - $vendor_amt - $offer_amt - $vendor_cash_amt - $total_trip_price;
                        $masternet_price +=$your_final_amt+$servicecharge_amt;
                        $book_pay_details = array(
                            'book_pay_id' => $trip_book_payid,
                            'parent_trip_id' => $parent_trip_id,
                            'trip_user_id' => $trip_user_id,
                            'trip_id' => $trip_id,
                            'from_user_id' => $bookdata['book_user_id'],
                            'from_trip_id' => $bookdata['trip_id'],
                            'user_id' => $user_id,
                            'pnr_no' => $book_pay['pnr_no'],
                            'price_to_adult' => $checkoffer['price_to_adult'],
                            'price_to_child' => $checkoffer['price_to_child'],
                            'price_to_infan' => $checkoffer['price_to_infan'],
                            'number_of_persons' => $number_of_persons,
                            'no_of_adult' => $book_pay['no_of_adult'],
                            'no_of_child' => $book_pay['no_of_child'],
                            'no_of_infan' => $book_pay['no_of_infan'],
                            'total_adult_price' => $total_adult_price,
                            'total_child_price' => $total_child_price,
                            'total_infan_price' => $total_infan_price,
                            'subtotal_trip_price' => $subtotal_trip_price,
                            'coupon_history_id' => $checkoffer['coupon_history_id'],
                            'specific_coupon_history_id' => $checkoffer['specific_coupon_history_id'],
                            'specific_coupon_code' => $checkoffer['specific_coupon_code'],
                            'discount_price' => $checkoffer['discount_price'],
                            'discount_percentage' => $checkoffer['discount_percentage'],
                            'discount_your_price' => $vendor_cash_amt,
                            'offer_amt' => $offer_amt,
                            'total_trip_price' => $total_trip_price,
                            'vendor_amt' => $vendor_amt,
                            'vendor_offer_amt' => $parent_discount_price,
                            //'vendor_cash_amt' => $vendor_cash_amt,
                            'your_amt' => $your_amt,
                            'net_price' => $net_price,
                            'servicecharge_amt' => $servicecharge_amt,
                            'gst_percentage' => GST_PERCENTAGE,
                            'gst_amt' => $gst_amt,
                            'your_final_amt' => $your_final_amt,
                            'round_off' => number_format($round_off, 2),
                            'date_of_trip' => $book_pay['date_of_trip'],
                            'time_of_trip' => $book_pay['time_of_trip'],
                            'date_of_trip_to' => $book_pay['date_of_trip_to'],
                            'pick_up_location_id' => $book_pay['pick_up_location_id'],
                            'pick_up_location' => $book_pay['pick_up_location'],
                            'pick_up_location_landmark' => $book_pay['pick_up_location_landmark'],
                            'booked_by' => $loginuserid,
                            'booked_to' => $bookdata['booked_to'],
                            'booked_email' => $bookdata['booked_email'],
                            'booked_phone_no' => $bookdata['booked_phone_no'],
                            'booked_comment' => $bookdata['booked_comment'],
                            'status' => 1,
                            'payment_status' => 0,
                            'pay_details_id' => $pay_details_id
                        );
                        //$book_pay_detailsid = insertTable('trip_book_pay_details', $book_pay_details);
                        $book_pay_detailsid =10;
                        echo '<br><br>'; print_r($book_pay_details);
                        exit();
                        $vendor_amt = $net_price;
                        $parent_trip_id = $row->parent_trip_id;
                        $pay_details_id = $book_pay_detailsid;
                        if($checkoffer['offer_by_type']==2){
                            $parent_discount_price = $offer_amt;
                        }else{
                            $parent_discount_price = 0;
                        }
                        $tripamount=$masternet_price;
                            // - ur amt(discount_your_price) from master and update status paid to vendor
                        if ($CI->session->userdata('user_type') == 'VA' && $trip_id ==$parenttrip_id) {
                            //$discount_your_price = $your_final_amt;
                            //$master_net_price = $master_net_price - $your_final_amt;
                            $whereData = array('id' => $trip_book_payid);
                            $updatedata = array('offer_amt' => $book_pay_details['offer_amt'],'discount_your_price' => $book_pay_details['discount_your_price'],'net_price' => $masternet_price);
                            //$result = updateTable('trip_book_pay', $whereData, $updatedata);
                            echo '<br><br>'; print_r($updatedata);
//                            $whereData = array('book_pay_id' => $trip_book_payid,'book_pay_id' => $trip_book_payid,'id' =>$book_pay_detailsid);
//                            $updatedata = array('b2b_payment_status' => 1,'b2b_payment_on' => date('Y-m-d'));
//                            $result = updateTable('trip_book_pay_details', $whereData, $updatedata);
                  //          echo '<br><br>'; print_r($updatedata);
                        }
                        // exit();
                    }
                }
                exit();

                $whereData = array('pay_details_id' => $paydetailsidmaster);
                $updatedata = array('pay_details_id' => $pay_details_id);
                $result = updateTable('trip_book_pay_details', $whereData, $updatedata);
            }
            // booked user info

            $whereData = array('id' => $bookdata['book_user_id']);
            $orWhereData = array('isactive' => 1, 'isactive' => 2);
            $trip_list = selectTable('user_master', $whereData, $showField = array('*'), $orWhereData);
            if ($trip_list->num_rows() > 0) {
                $row = $trip_list->row();
                $customer_id = $row->id;
                $customer_name = $row->user_fullname;
                $customer_phone = $row->phone;
                $customer_email = $row->email;
            }
            $bookdata = array('status' => 1, 'trip_book_payid' => $trip_book_payid, 'pnr_no' => $book_pay['pnr_no'], 'trip_amount' => $tripamount, 'trip_id' => $bookdata['trip_id'],
                'customer_id' => $customer_id, 'customer_name' => $customer_name, 'customer_phone' => $customer_phone, 'customer_email' => $customer_email);
            if ($trip_book_payid) {
                return $bookdata;
            }
        }
        $result = array('status' => 0, 'is_open' => 0, 'message' => 'Sorry! try again...', 'from_date' => '', 'to_date' => '');
        return $result;
    }

}



/**
 * book the trip
  input: array(
  'account_info_id' => account id for cancel
  'payment_type' => payment type, // 1 - net, 2 - credit, 3 - debit
  'payment_status' =>  payment status, // 0 - Pendding,1 - sucess,2 - failed
  'status' =>  status) //1 - Pendding, 2- booked, 3 - cancelled, 4 - confirmed, 5 -Completed
  $paystatus =>  0, // 0 - default,1 - not Deposited
 * @return 
 * @author Anjaneya
 * */
// if pay sucess need to pass $updatedata['payment_status']==1 && $updatedata['status']==2
if (!function_exists('trip_book_paid_sucess')) {

    function trip_book_paid_sucess($updatedata = array(), $pnr_no = '', $paystatus = 0) {
        // TODO: mail sent to customer and vendor
        // TODO: my_transaction when success payment

        $CI = & get_instance();
        $loginuserid = $CI->session->userdata('user_id');
        if (count($updatedata) > 4 || count($updatedata) < 1 || $pnr_no == '') {
            return FALSE;
        }
        if ((isset($updatedata['payment_type']) || isset($updatedata['payment_status']) || isset($updatedata['status'])) && $pnr_no != '') {
            $whereData = array('pnr_no' => $pnr_no);
            $trip_book_list = selectTable('trip_book_pay', $whereData);
            if ($trip_book_list->num_rows() < 1) {
                return FALSE;
            }
            $row = $trip_book_list->row();
            $book_pay_id = $row->id;
            $user_id = $row->user_id;
            $trip_id = $row->trip_id;
            $net_price = $row->net_price;
            $status = $row->status;
            $payment_status = $row->payment_status;
            $number_of_persons = $row->number_of_persons;

            $whereData = array('id' => $trip_id);
            $trip_list = selectTable('trip_master', $whereData);
            if ($trip_list->num_rows() < 1) {
                return FALSE;
            }
            $row = $trip_list->row();
            $trip_code = $row->trip_code;
            $trip_name = $row->trip_name;
            $total_booking = $row->total_booking;

            $pnrinfo = getpnrinfo($pnr_no, '', 1);
            // TODO: need to send mail for pay sucess
         
            $subtotal_trip_price = $pnrinfo['subtotal_trip_price'] . ' ( ';
            if ($pnrinfo['no_of_adult'] > 0) {
                $subtotal_trip_price .= $pnrinfo['no_of_adult'] . '*' . $pnrinfo['price_to_adult'];
            }
            if ($pnrinfo['no_of_child'] > 0) {
                $subtotal_trip_price .= ', ' . $pnrinfo['no_of_child'] . '*' . $pnrinfo['price_to_child'];
            }
            if ($pnrinfo['no_of_infan'] > 0) {
                $subtotal_trip_price .= ', ' . $pnrinfo['no_of_infan'] . '*' . $pnrinfo['price_to_infan'];
            }
            $subtotal_trip_price .= ')';
            
            $othermsg = '<tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Trip Code / Name :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['trip_code'] . ' / ' . $pnrinfo['trip_name'] . ' </p></div>
                              </td><td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">PNR Number :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['pnr_no'] . ' </p></div>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Customer Name :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['booked_to'] . ' </p></div>
                              </td><td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">No Of Traveller :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['number_of_persons'] . ' </p></div>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Contact Email :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['booked_email'] . ' </p></div>
                              </td><td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Phone Number :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['booked_phone_no'] . ' </p></div>
                                </td>
                            </tr>';
                            if($pnrinfo['booked_comment']!=''){
                                $othermsg .='<tr>
                                <td colspan="2" align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Customer Comment :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['booked_comment'] . ' </p></div>
                              </td>
                            </tr>';
                            }
                            if ($pnrinfo['total_days'] > 0) {
                                $how_many_nights = '';
                                if ($pnrinfo['how_many_nights'] > 0) {
                                    $how_many_nights = $pnrinfo['how_many_nights'] . 'night(s)';
                                }
                                $othermsg .= '
                            <tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Pick up location, landmark :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['pick_up_location']  . ', ' . $pnrinfo['pick_up_location_landmark']. ' </p></div>
                              </td><td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Total Days :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['how_many_days'] . ' day(s), ' . $how_many_nights .  ' </p></div>
                                </td>
                            </tr>';
                            }else if ($pnrinfo['how_many_hours'] > 0) {
                                $othermsg .= '
                            <tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Pick up location, landmark :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['pick_up_location']  . ', ' . $pnrinfo['pick_up_location_landmark']. ' </p></div>
                              </td><td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Total Hours :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['how_many_hours'] . ' Hr(s) </p></div>
                                </td>
                            </tr>';
                            }

                                $date_of_trip_to = '';
                                if($pnrinfo['date_of_trip']!=$pnrinfo['date_of_trip_to']){
                                    $date_of_trip_to = '-'.$pnrinfo['date_of_trip_to'];
                                }
$othermsg .= '<tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Date of Trip :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['date_of_trip'] . ' ' . $pnrinfo['time_of_trip'] . $date_of_trip_to. ' </p></div>
                              </td><td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Booked on :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['booked_on'] . ' </p></div>
                                </td>
                            </tr>';
                            if($pnrinfo['bookedby_contactemail']!=$pnrinfo['booked_email']){
                                $othermsg .= '
                            <tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Booked by Name :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['bookedby'] . ' </p></div>
                              </td><td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Booked by Email :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['bookedby_contactemail'] . ' </p></div>
                                </td>
                            </tr>';
                            }
$othermsg .= '<tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Amount :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $subtotal_trip_price . ' </p></div>
                                </td>
                            </tr>';
              
            if ($pnrinfo['offer_amt'] != 0.00) {
                $coupon_code = '';
                if ($pnrinfo['coupon_code'] != '') {
                    $offer_type = '';
                    if (strpos($pnrinfo['percentage_amount'], '.00') !== false) {
                        $pnrinfo['percentage_amount'] = round($pnrinfo['percentage_amount']);
                    }
                    if ($pnrinfo['offer_type'] == 2) {
                        $offer_type = '%';
                    }
                    $specific_coupon_code = '';
                    if ($pnrinfo['specific_coupon_code'] != '' && $pnrinfo['coupon_code'] != $pnrinfo['specific_coupon_code']) {
                        $specific_coupon_code = $pnrinfo['specific_coupon_code'] . ', ';
                    }
                    $coupon_code = '(' . $specific_coupon_code . $pnrinfo['coupon_code'] . ')';
                    //$coupon_code = '<br>' . $pnrinfo['coupon_code'] . ' (' . $pnrinfo['percentage_amount'] . $offer_type . ' OFF)';
                }
                $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Offer Amount :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['offer_amt'] . ' ' . $coupon_code . ' </p></div>
                                    </td>
                                </tr>';
            }
            if ($pnrinfo['gst_amt'] > 0) {
                $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">GST Amount (' . $pnrinfo['gst_percentage'] . '%) :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['gst_amt'] . ' </p></div>
                                    </td>
                                </tr>';
            }
            if ($pnrinfo['round_off'] != 0) {
                $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Round Off :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['round_off'] . ' </p></div>
                                    </td>
                                </tr>';
            }
            if ($pnrinfo['net_price'] != 0.00) {
                $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Paid Amount :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['net_price'] . ' </p></div>
                                    </td>
                                </tr>';
            }
           
            
            if ($pnrinfo['languages'] > 0) {
                $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Languages :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['languages'] . ' </p></div>
                                    </td>
                                </tr>';
            }
            if ($pnrinfo['meal'] > 0) {
                $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Meals :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['meal'] . ' </p></div>
                                    </td>
                                </tr>';
            }
            if ($pnrinfo['brief_description'] != '') {
                $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;padding-top:0px;">
                                        <div class="f_img_div" style="width:100%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 22px;">Brief Description</p></div>

                                    </td>
                                </tr> 
                                <tr style=" line-height: 1.6; color: #333; font-size: 15px;">
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <p>' . html_entity_decode($pnrinfo['brief_description']) . '</p>

                                    </td>
                                </tr>';
            }
            if ($pnrinfo['confirmation_policy'] != '') {
                $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;padding-top:0px;">
                                        <div class="f_img_div" style="width:100%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 22px;">Confirmation Policy</p></div>

                                    </td>
                                </tr> 
                                <tr style=" line-height: 1.6; color: #333; font-size: 15px;">
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <p>' . html_entity_decode($pnrinfo['confirmation_policy']) . '</p>

                                    </td>
                                </tr>';
            }
            if ($pnrinfo['cancellation_policy'] != '') {
                $cancellation_policylink='';
                if (isset($updatedata['status']) && isset($updatedata['payment_status']) && $updatedata['payment_status'] == 1 && $updatedata['status'] == 2) {
                  $cancellation_policylink = '<p><a href="' . base_url() . 'trip-cancel/' . $pnr_no . '/3" style="color:#00adef" target="_new">Click here to cancel the trip</a></p>';
                }
                $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;padding-top:0px;">
                                        <div class="f_img_div" style="width:100%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 22px;">Cancellation Policy</p></div>

                                    </td>
                                </tr> 
                                <tr style=" line-height: 1.6; color: #333; font-size: 15px;">
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <p>' . html_entity_decode($pnrinfo['cancellation_policy']) . '</p>' . $cancellation_policylink . '

                                    </td>
                                </tr>';
            }
            if ($pnrinfo['refund_policy'] != '') {
                $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;padding-top:0px;">
                                        <div class="f_img_div" style="width:100%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 22px;">Refund Policy</p></div>

                                    </td>
                                </tr> 
                                <tr style=" line-height: 1.6; color: #333; font-size: 15px;">
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <p>' . html_entity_decode($pnrinfo['refund_policy']) . '</p>

                                    </td>
                                </tr>';
            }
            $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;padding-top:0px;">
                                        <div class="f_img_div" style="width:100%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 22px;">NEED BOOKING HELP?</p></div>

                                    </td>
                                </tr> 
                                <tr style=" line-height: 1.6; color: #333; font-size: 15px;">
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <p style="font-weight:600;">Email:' . $pnrinfo['trip_contactemail'] . '</p>
                                        <p style="font-weight:600;">Hotline: ' . $pnrinfo['trip_contactno'] . '</p>

                                    </td>
                                </tr>';
//            'payment_status' =>  1, // 0 - Pendding,1 - sucess,2 - failed
//            'status' =>  2) //1 - Pendding, 2- booked, 3 - cancelled, 4 - confirmed, 5 -Completed
            if (isset($updatedata['status']) && isset($updatedata['payment_status']) && $updatedata['payment_status'] == 1 && $updatedata['status'] == 2) {
                // ticket book B2c to Admin

                $whereData = array('pnr_no' => $pnr_no);
                $result = updateTable('trip_book_pay_details', $whereData, $updatedata);

                $whereData = array('pnr_no' => $pnr_no);
                $result = updateTable('trip_book_pay', $whereData, $updatedata);

                $total_booking = (int) $number_of_persons + (int) $total_booking;

                $whereData22 = array('trip_code' => $trip_code);
                $updatedata22 = array('total_booking' => $total_booking);
                $result = updateTable('trip_master', $whereData22, $updatedata22);
                //  Cash Deposited
                if ($paystatus != 1) {
                    $paymentdata = array(
                        'userid' => $user_id,
                        'transaction_notes' => 'Cash Deposited',
                        'from_userid' => -1,
                        'book_pay_id' => 0,
                        'book_pay_details_id' => 0,
                        'pnr_no' => '',
                        'trip_id' => 0,
                        'deposits' => $net_price,
                        'status' => 2);
                    $result = make_mypayment($paymentdata);
                }
                $paymentdata = array(
                    'userid' => 0,
                    'transaction_notes' => 'Trip has been booked ' . $pnr_no . ' / ' . $trip_code . ' / ' . $trip_name,
                    'book_pay_id' => $book_pay_id,
                    'book_pay_details_id' => 0,
                    'pnr_no' => $pnr_no,
                    'from_userid' => $user_id,
                    'trip_id' => $trip_id,
                    'deposits' => $net_price,
                    'status' => 2);
                $result = make_mypayment($paymentdata);

                ///$touserid= $pnrinfo['bookedbyid'];
                $subject = 'Trip has been booked your PNR No ' . $pnr_no;
                $message = 'Trip has been booked successfully! Your <b>PNR No: ' . $pnr_no . '</b> ( Trip Code/Name: ' . $trip_code . ' / ' . $trip_name . ' ) at ' . site_title . '.<br>';
                $message .= 'Our executive person contact you shortly and confirm <a href="' . base_url() . 'PNR-status/' . $pnr_no . '/1" style="color:#00adef" target="_new">Your Trip</a>.';
                $mailData = array(
                    //'fromuserid' => $pnrinfo['trip_postbyid'],
                    'ccemail' => $pnrinfo['trip_contactemail']. ',' .$pnrinfo['bookedby_contactemail'],
                    'bccemail' => admin_email. ',' . 'anjaneya.developer@gmail.com',
                    //'touserid' => $touserid,
                    'toemail' => $pnrinfo['booked_email'],
                    'subject' => $subject,
                    'message' => $message,
                    'othermsg' => $othermsg
                );

                sendemail_personalmail($mailData);
                
                $whereData = array('tpd.isactive' => 1, 'tpd.pnr_no' => $pnr_no,'tpd.trip_id !='=>$trip_id);
                $joins = array(
                    array(
                        'table' => 'trip_master AS tm',
                        'condition' => 'tm.id = tpd.trip_id',
                        'jointype' => 'INNER'
                    ),
                    array(
                        'table' => 'user_master AS tmum',
                        'condition' => 'tm.user_id = tmum.id',
                        'jointype' => 'INNER'
                    ),
                    array(
                        'table' => 'user_master AS bum',
                        'condition' => 'tpd.from_user_id = bum.id',
                        'jointype' => 'INNER'
                    ),
                    array(
                        'table' => 'coupon_code_master_history AS ccmhd',
                        'condition' => 'tpd.coupon_history_id = ccmhd.id',
                        'jointype' => 'LEFT'
                    ),
                );
                $columns = 'tpd.*,tm.id AS trip_id,tm.trip_name,tm.trip_code,tm.how_many_days,tm.how_many_nights,tm.total_days,tm.how_many_hours,'
                        . 'tm.brief_description,tm.other_inclusions,tm.exclusions,tm.languages,tm.meal,tm.cancellation_policy,tm.confirmation_policy,tm.refund_policy,'
                        . 'bum.id AS bookedbyid,bum.user_fullname AS bookedby,bum.phone AS bookedby_contactno,bum.email AS bookedby_contactemail,'
                        . 'tmum.id AS trip_postbyid,tmum.user_fullname AS trip_postby,tmum.phone AS trip_contactno,tmum.email AS trip_contactemail,tm.trip_name,'
                        . '(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.coupon_code END) AS coupon_code,(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.offer_type END) AS offer_type,'
                        . '(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.percentage_amount END) AS percentage_amount';
                $tableData = get_joins('trip_book_pay_details AS tpd', $columns, $joins, $whereData, $orWhereData = array(), $group = array(), $order = '', $having = '', $limit = array(), $result_way = 'all', $echo = 0,$inWhereData = array());
                if ($tableData->num_rows() > 0) {
                    $book_pay = $tableData->result_array();
                   // $book_pay[0]['date_of_trip']
                    $subtotal_trip_price = $book_pay[0]['subtotal_trip_price'] . ' ( ';
            if ($book_pay[0]['no_of_adult'] > 0) {
                $subtotal_trip_price .= $book_pay[0]['no_of_adult'] . '*' . $book_pay[0]['price_to_adult'];
            }
            if ($book_pay[0]['no_of_child'] > 0) {
                $subtotal_trip_price .= ', ' . $book_pay[0]['no_of_child'] . '*' . $book_pay[0]['price_to_child'];
            }
            if ($book_pay[0]['no_of_infan'] > 0) {
                $subtotal_trip_price .= ', ' . $book_pay[0]['no_of_infan'] . '*' . $book_pay[0]['price_to_infan'];
            }
            $subtotal_trip_price .= ')';
            $othermsg = '<tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Trip Code / Name :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $book_pay[0]['trip_code'] . ' / ' . $book_pay[0]['trip_name'] . ' </p></div>
                              </td><td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">PNR Number :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['pnr_no'] . ' </p></div>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Customer Name :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['booked_to'] . ' </p></div>
                              </td><td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">No Of Traveller :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['number_of_persons'] . ' </p></div>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Contact Email :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['booked_email'] . ' </p></div>
                              </td><td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Phone Number :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['booked_phone_no'] . ' </p></div>
                                </td>
                            </tr>';
                            if($pnrinfo['booked_comment']!=''){
                                $othermsg .='<tr>
                                <td colspan="2" align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Customer Comment :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['booked_comment'] . ' </p></div>
                              </td>
                            </tr>';
                            }
                            if ($pnrinfo['total_days'] > 0) {
                                $how_many_nights = '';
                                if ($pnrinfo['how_many_nights'] > 0) {
                                    $how_many_nights = $pnrinfo['how_many_nights'] . 'night(s)';
                                }
                                $othermsg .= '
                            <tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Pick up location, landmark :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['pick_up_location']  . ', ' . $pnrinfo['pick_up_location_landmark']. ' </p></div>
                              </td><td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Total Days :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['how_many_days'] . ' day(s), ' . $how_many_nights .  ' </p></div>
                                </td>
                            </tr>';
                            }else if ($pnrinfo['how_many_hours'] > 0) {
                                $othermsg .= '
                            <tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Pick up location, landmark :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['pick_up_location']  . ', ' . $pnrinfo['pick_up_location_landmark']. ' </p></div>
                              </td><td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Total Hours :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['how_many_hours'] . ' Hr(s) </p></div>
                                </td>
                            </tr>';
                            }

                                $date_of_trip_to = '';
                                if($pnrinfo['date_of_trip']!=$pnrinfo['date_of_trip_to']){
                                    $date_of_trip_to = '-'.$pnrinfo['date_of_trip_to'];
                                }
$othermsg .= '<tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Date of Trip :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['date_of_trip'] . ' ' . $pnrinfo['time_of_trip'] . $date_of_trip_to. ' </p></div>
                              </td><td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Booked on :</p>
                                    <p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $pnrinfo['booked_on'] . ' </p></div>
                                </td>
                            </tr>
                            
<tr>
                                <td align="left" style="border-bottom: 1px solid #eee;">
                                    <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Amount :</p></div>
                                    <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $subtotal_trip_price . ' </p></div>
                                </td>
                            </tr>';
            
            if ($book_pay[0]['offer_amt'] != 0.00) {
                $coupon_code = '';
                if ($book_pay[0]['coupon_code'] != '') {
                    $offer_type = '';
                    if (strpos($book_pay[0]['percentage_amount'], '.00') !== false) {
                        $book_pay[0]['percentage_amount'] = round($book_pay[0]['percentage_amount']);
                    }
                    if ($book_pay[0]['offer_type'] == 2) {
                        $offer_type = '%';
                    }
                    $specific_coupon_code = '';
                    if ($book_pay[0]['specific_coupon_code'] != '' && $book_pay[0]['coupon_code'] != $book_pay[0]['specific_coupon_code']) {
                        $specific_coupon_code = $book_pay[0]['specific_coupon_code'] . ', ';
                    }
                    $coupon_code = '(' . $specific_coupon_code . $book_pay[0]['coupon_code'] . ')';
                    //$coupon_code = '<br>' . $book_pay[0]['coupon_code'] . ' (' . $book_pay[0]['percentage_amount'] . $offer_type . ' OFF)';
                }
                $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Offer Amount :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $book_pay[0]['offer_amt'] . ' ' . $coupon_code . ' </p></div>
                                    </td>
                                </tr>';
            }
            if ($book_pay[0]['gst_amt'] > 0) {
                $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">GST Amount (' . $book_pay[0]['gst_percentage'] . '%) :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $book_pay[0]['gst_amt'] . ' </p></div>
                                    </td>
                                </tr>';
            }
            if ($book_pay[0]['round_off'] != 0) {
                $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Round Off :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $book_pay[0]['round_off'] . ' </p></div>
                                    </td>
                                </tr>';
            }
            if ($book_pay[0]['net_price'] != 0.00) {
                $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Paid Amount :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $book_pay[0]['net_price'] . ' </p></div>
                                    </td>
                                </tr>';
            }
            if ($book_pay[0]['languages'] > 0) {
                $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Languages :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $book_pay[0]['languages'] . ' </p></div>
                                    </td>
                                </tr>';
            }
            if ($book_pay[0]['meal'] > 0) {
                $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <div class="f_img_div" style="width:35%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 12px;">Meals :</p></div>
                                        <div class="f_content_div" style="width:65%; float:right;"><p class="f_content" style="padding-right: 20px; margin-bottom: 0px; line-height: 1.6; color: #333; font-size: 12px;">' . $book_pay[0]['meal'] . ' </p></div>
                                    </td>
                                </tr>';
            }
            if ($book_pay[0]['brief_description'] != '') {
                $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;padding-top:0px;">
                                        <div class="f_img_div" style="width:100%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 22px;">Brief Description</p></div>

                                    </td>
                                </tr> 
                                <tr style=" line-height: 1.6; color: #333; font-size: 15px;">
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <p>' . html_entity_decode($book_pay[0]['brief_description']) . '</p>

                                    </td>
                                </tr>';
            }
            if ($book_pay[0]['confirmation_policy'] != '') {
                $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;padding-top:0px;">
                                        <div class="f_img_div" style="width:100%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 22px;">Confirmation Policy</p></div>

                                    </td>
                                </tr> 
                                <tr style=" line-height: 1.6; color: #333; font-size: 15px;">
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <p>' . html_entity_decode($book_pay[0]['confirmation_policy']) . '</p>

                                    </td>
                                </tr>';
            }
            if ($book_pay[0]['cancellation_policy'] != '') {
                $cancellation_policylink='';
                if (isset($updatedata['status']) && isset($updatedata['payment_status']) && $updatedata['payment_status'] == 1 && $updatedata['status'] == 2) {
                  $cancellation_policylink = '<p><a href="' . base_url() . 'trip-cancel/' . $pnr_no . '/3" style="color:#00adef" target="_new">Click here to cancel the trip</a></p>';
                }
                $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;padding-top:0px;">
                                        <div class="f_img_div" style="width:100%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 22px;">Cancellation Policy</p></div>

                                    </td>
                                </tr> 
                                <tr style=" line-height: 1.6; color: #333; font-size: 15px;">
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <p>' . html_entity_decode($book_pay[0]['cancellation_policy']) . '</p>' . $cancellation_policylink . '

                                    </td>
                                </tr>';
            }
            if ($book_pay[0]['refund_policy'] != '') {
                $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;padding-top:0px;">
                                        <div class="f_img_div" style="width:100%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 22px;">Refund Policy</p></div>

                                    </td>
                                </tr> 
                                <tr style=" line-height: 1.6; color: #333; font-size: 15px;">
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <p>' . html_entity_decode($book_pay[0]['refund_policy']) . '</p>

                                    </td>
                                </tr>';
            }
            $othermsg .= '<tr>
                                    <td align="left" style="border-bottom: 1px solid #eee;padding-top:0px;">
                                        <div class="f_img_div" style="width:100%; float:left;"><p class="welcome_description" style="color: #333;font-weight:bold; font-size: 22px;">NEED BOOKING HELP?</p></div>

                                    </td>
                                </tr> 
                                <tr style=" line-height: 1.6; color: #333; font-size: 15px;">
                                    <td align="left" style="border-bottom: 1px solid #eee;">
                                        <p style="font-weight:600;">Email:' . $book_pay[0]['trip_contactemail'] . '</p>
                                        <p style="font-weight:600;">Hotline: ' . $book_pay[0]['trip_contactno'] . '</p>

                                    </td>
                                </tr>';
            
                    $subject = 'You got a new booking request PNR No ' . $pnr_no;
                    $message = 'You got a new booking request! <b>PNR No: ' . $pnr_no . '</b> ( Trip Code/Name: ' . $trip_code . ' / ' . $trip_name . ' ) at ' . site_title . '.<br>';
                    $message .= '<a href="' . base_url() . 'PNR-status/' . $pnr_no . '/1" style="color:#00adef" target="_new">View PNR status</a>.';
                    $mailData = array(
                        //'fromuserid' => $pnrinfo['trip_postbyid'],
                        //'ccemail' => $book_pay[0]['trip_contactemail'],
                        'bccemail' => admin_email . ',' . 'anjaneya.developer@gmail.com',
                        //'touserid' => $touserid,
                        'toemail' => $book_pay[0]['trip_contactemail'],
                        'subject' => $subject,
                        'message' => $message,
                        'othermsg' => $othermsg
                    );

                    sendemail_personalmail($mailData);
                }
            }
//            'status' =>  3) //1 - Pendding, 2- booked, 3 - cancelled, 4 - confirmed, 5 -Completed
            if (isset($updatedata['status']) && $updatedata['status'] == 3) {
                $updatedata['cancelled_on'] = date('Y-m-d');
                $whereData = array('pnr_no' => $pnr_no);
                $result = updateTable('trip_book_pay_details', $whereData, $updatedata);

                $whereData = array('pnr_no' => $pnr_no);
                $result = updateTable('trip_book_pay', $whereData, $updatedata);

                $total_booking = (int) $number_of_persons - (int) $total_booking;

                $whereData22 = array('trip_code' => $trip_code);
                $updatedata22 = array('total_booking' => $total_booking);
                $result = updateTable('trip_master', $whereData22, $updatedata22);

                //$touserid= $user_id;
                $subject = 'Trip has been cancelled your PNR No ' . $pnr_no;
                $message = 'Trip has been cancelled successfully! Your <b>PNR No: ' . $pnr_no . '</b> ( Trip Code/Name: ' . $trip_code . ' / ' . $trip_name . ' ) at ' . site_title . '.<br>';
                $message .= 'Please read our Cancellation Policy. Our executive person contact you shortly and confirm <a href="' . base_url() . 'PNR-status/' . $pnr_no . '/1" style="color:#00adef" target="_new">Your Trip</a> and refund amount to you.';

                $mailData = array(
                    //'fromuserid' => $pnrinfo['trip_postbyid'],
                    'ccemail' => $pnrinfo['trip_contactemail']. ',' .$pnrinfo['bookedby_contactemail'],
                    'bccemail' => admin_email . ',' . 'anjaneya.developer@gmail.com',
                    //'touserid' => $touserid,
                    'toemail' => $pnrinfo['booked_email'],
                    'subject' => $subject,
                    'message' => $message,
                    'othermsg' => $othermsg
                );
                sendemail_personalmail($mailData);
            }
////            'status' =>  4) //1 - Pendding, 2- booked, 3 - cancelled, 4 - confirmed, 5 -Completed
//            if (isset($updatedata['status']) && $updatedata['status'] == 4) {
//                $touserid= $pnrinfo['bookedbyid'];
//                $subject='Trip has been confirmed your trip PNR No '.$pnr_no;
//                $message='Trip has been confirmed your trip <b>PNR No '. $pnr_no . '</b> ( Trip Code/Name: ' . $trip_code . ' / ' . $trip_name.' ) at '.site_title.'.';
//                $mailData = array(
//                //'fromuserid' => $pnrinfo['trip_postbyid'],
//                'ccemail' => admin_email.','.email_bottem_email.','.'anjaneya.developer@gmail.com,'.$pnrinfo['bookedby_contactemail'],
//                //'bccemail' => admin_email.','.email_bottem_email.','.$pnrinfo['bookedby_contactemail'],
//                'touserid' => $touserid,
//                //'toemail' => 'anjaneya.developer@gmail.com',
//                'subject' => $subject,
//                'message' => $message,
//                'othermsg' => $othermsg
//                );
//                sendemail_personalmail($mailData);
//            }
////            'status' =>  5) //1 - Pendding, 2- booked, 3 - cancelled, 4 - confirmed, 5 -Completed
//            if (isset($updatedata['status']) && $updatedata['status'] == 5) {
//                $touserid= $pnrinfo['bookedbyid'];
//                $subject='Trip has been completed your trip PNR No '.$pnr_no;
//                $message='Trip has been completed your trip <b>PNR No '. $pnr_no . '</b> ( Trip Code/Name: ' . $trip_code . ' / ' . $trip_name.' ) at '.site_title.'.';
//                $mailData = array(
//                //'fromuserid' => $pnrinfo['trip_postbyid'],
//                'ccemail' => 'anjaneya.developer@gmail.com,'.$pnrinfo['bookedby_contactemail'],
//                'bccemail' => admin_email.','.email_bottem_email.','.$pnrinfo['bookedby_contactemail'],
//                'touserid' => $touserid,
//                //'toemail' => 'anjaneya.developer@gmail.com',
//                'subject' => $subject,
//                'message' => $message,
//                'othermsg' => $othermsg
//                );
//                //print_r($pnrinfo);
//                //print_r($mailData);
//                sendemail_personalmail($mailData);
//            }
            return TRUE;
        }
        return FALSE;
    }

}


/**
 * book the trip
  input:
  'pnr' => pnr
  'phoneno' => phone no
  'viewtype' => if 1 check only trip_book_pay table
 * @return 
 * @author Anjaneya
 * */
if (!function_exists('getpnrinfo')) {

    function getpnrinfo($pnr_no = '', $phoneno = '', $viewtype = 0) {
        // TODO: mail sent to customer and vendor
        $CI = & get_instance();
        $loginuserid = $CI->session->userdata('user_id');
        if ($pnr_no == '') {
            return FALSE;
        }
        $book_pay = array();
        if ($CI->session->userdata('user_type') == 'VA' && $viewtype != 1) {
            $whereData = array('tpd.isactive' => 1, 'tpd.pnr_no' => $pnr_no, 'tpd.user_id' => $loginuserid);
            if ($phoneno != '') {
                $whereData['bum.phone'] = $phoneno;
            }
            $joins = array(
                array(
                    'table' => 'trip_master AS tm',
                    'condition' => 'tm.id = tpd.trip_id',
                    'jointype' => 'INNER'
                ),
                array(
                    'table' => 'user_master AS tmum',
                    'condition' => 'tm.user_id = tmum.id',
                    'jointype' => 'INNER'
                ),
                array(
                    'table' => 'user_master AS bum',
                    'condition' => 'tpd.from_user_id = bum.id',
                    'jointype' => 'INNER'
                ),
                array(
                    'table' => 'coupon_code_master_history AS ccmhd',
                    'condition' => 'tpd.coupon_history_id = ccmhd.id',
                    'jointype' => 'LEFT'
                ),
            );
            $columns = 'tpd.*,tm.id AS trip_id,tm.trip_name,tm.trip_code,tm.how_many_days,tm.how_many_nights,tm.total_days,tm.how_many_hours,'
                    . 'tm.brief_description,tm.other_inclusions,tm.exclusions,tm.languages,tm.meal,tm.cancellation_policy,tm.confirmation_policy,tm.refund_policy,'
                    . 'bum.id AS bookedbyid,bum.user_fullname AS bookedby,bum.phone AS bookedby_contactno,bum.email AS bookedby_contactemail,'
                    . 'tmum.id AS trip_postbyid,tmum.user_fullname AS trip_postby,tmum.phone AS trip_contactno,tmum.email AS trip_contactemail,tm.trip_name,'
                    . '(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.coupon_code END) AS coupon_code,(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.offer_type END) AS offer_type,'
                    . '(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.percentage_amount END) AS percentage_amount';
            $tableData = get_joins('trip_book_pay_details AS tpd', $columns, $joins, $whereData);
            if ($tableData->num_rows() > 0) {
                $book_pay = $tableData->result_array();
                $book_pay[0]['date_of_trip'] = formatdate($book_pay[0]['date_of_trip'], $format = 'd M Y');
                $book_pay[0]['time_of_trip'] = formatdate($book_pay[0]['time_of_trip'], $format = 'h:i A');
                if ($book_pay[0]['date_of_trip_to'] != '' && $book_pay[0]['date_of_trip_to'] != '0000-00-00') {
                    $book_pay[0]['date_of_trip_to'] = formatdate($book_pay[0]['date_of_trip_to'], $format = 'd M Y');
                } else {
                    $book_pay[0]['date_of_trip_to'] = '';
                }
                $book_pay[0]['booked_on'] = formatdate($book_pay[0]['booked_on'], $format = 'd M Y h:i A');
                //$book_pay[0]['gst_percentage'] = GST_PERCENTAGE;
                //print_r($book_pay);         exit();
                return $book_pay[0];
            }
        }

        if (count($book_pay) < 1) {
            $whereData = array('tpd.isactive' => 1, 'tpd.pnr_no' => $pnr_no);
            if ($phoneno != '') {
                $whereData['bum.phone'] = $phoneno;
            }
            $joins = array(
                array(
                    'table' => 'trip_master AS tm',
                    'condition' => 'tm.id = tpd.trip_id',
                    'jointype' => 'INNER'
                ),
                array(
                    'table' => 'user_master AS tmum',
                    'condition' => 'tm.user_id = tmum.id',
                    'jointype' => 'INNER'
                ),
                array(
                    'table' => 'user_master AS bum',
                    'condition' => 'tpd.user_id = bum.id',
                    'jointype' => 'INNER'
                ),
                array(
                    'table' => 'coupon_code_master_history AS ccmhd',
                    'condition' => 'tpd.coupon_history_id = ccmhd.id',
                    'jointype' => 'LEFT'
                ),
            );
            $columns = 'tpd.*,tm.id AS trip_id,tm.trip_name,tm.trip_code,tm.how_many_days,tm.how_many_nights,tm.total_days,tm.how_many_hours,'
                    . 'tm.brief_description,tm.other_inclusions,tm.exclusions,tm.languages,tm.meal,tm.cancellation_policy,tm.confirmation_policy,tm.refund_policy,'
                    . 'bum.id AS bookedbyid,bum.user_fullname AS bookedby,bum.phone AS bookedby_contactno,bum.email AS bookedby_contactemail,'
                    . 'tmum.id AS trip_postbyid,tmum.user_fullname AS trip_postby,tmum.phone AS trip_contactno,tmum.email AS trip_contactemail,tm.trip_name,'
                    . '(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.coupon_code END) AS coupon_code,(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.offer_type END) AS offer_type,'
                    . '(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.percentage_amount END) AS percentage_amount';
            $tableData = get_joins('trip_book_pay AS tpd', $columns, $joins, $whereData);
            if ($tableData->num_rows() > 0) {
                $book_pay = $tableData->result_array();
                $book_pay[0]['date_of_trip'] = formatdate($book_pay[0]['date_of_trip'], $format = 'd M Y');
                $book_pay[0]['time_of_trip'] = formatdate($book_pay[0]['time_of_trip'], $format = 'h:i A');
                if ($book_pay[0]['date_of_trip_to'] != '' && $book_pay[0]['date_of_trip_to'] != '0000-00-00') {
                    $book_pay[0]['date_of_trip_to'] = formatdate($book_pay[0]['date_of_trip_to'], $format = 'd M Y');
                } else {
                    $book_pay[0]['date_of_trip_to'] = '';
                }
                $book_pay[0]['booked_on'] = formatdate($book_pay[0]['booked_on'], $format = 'd M Y h:i A');
                //$book_pay[0]['gst_percentage'] = GST_PERCENTAGE;
                $book_pay[0]['servicecharge_amt'] = 0;
                $book_pay[0]['your_final_amt'] = 0;
                return $book_pay[0];
            }
        }
        return FALSE;
    }

}

/**
 * get all parent trip
  input: $tripid, $returntripid=array()
 * @return 
 * @author Anjaneya
 * */
if (!function_exists('getallparenttrip')) {

    function getallparenttrip($tripid = 0, $returntripid = array()) {
        // TODO: mail sent to customer and vendor
        $CI = & get_instance();
        $loginuserid = $CI->session->userdata('user_id');
        $whereData = array('isactive' => 1, 'id' => $tripid);
        $trip_list = selectTable('trip_master', $whereData);
        if ($trip_list->num_rows() < 1) {
            return array(0);
        }
        $returntripid[] = $tripid;

        while ($tripid > 0) {
            $whereData = array('isactive' => 1, 'id' => $tripid);
            $trip_list = selectTable('trip_master', $whereData);
            if ($trip_list->num_rows() > 0) {
                $row = $trip_list->row();
                $returntripid[] = $row->parent_trip_id;
                $tripid = $row->parent_trip_id;
            } else {
                $tripid = 0;
            }
        }
        $trip = array_unique($returntripid);
        return $trip;
    }

}


/**
 * get all child trip
  input: $tripid, $returntripid=array()
 * @return 
 * @author Anjaneya
 * */
if (!function_exists('getallchildtrip')) {

    function getallchildtrip($tripid = 0, $returntripid = array()) {
        $CI = & get_instance();
        $childs1 = array();
        $loginuserid = $CI->session->userdata('user_id');
        $whereData = array('isactive' => 1, 'id' => $tripid);
        $trip_list = selectTable('trip_master', $whereData);
        if ($trip_list->num_rows() < 1) {
            return array();
        }
        $returntripid[] = $tripid;

        //Stage-1
        $toal_users1 = 0;
        $whereData = array('isactive' => 1, 'parent_trip_id' => $tripid);
        $trip_list = selectTable('trip_master', $whereData);
        if ($trip_list->num_rows() > 0) {
            foreach ($trip_list->result() as $row1) {
                $returntripid[] = $row1->id;
            }
        }
        $childs1 = $returntripid;

        //Stage-2
        while (count($childs1) > 0) {
            $CI->db->select('id')->from('trip_master')->where_in('parent_trip_id', $childs1);
            $trip_list2 = $CI->db->get();
            if ($trip_list2->num_rows() > 0) {
                $childs1 = array();
                foreach ($trip_list2->result() as $row2) {
                    $childs1[] = $row2->id;
                }
                $returntripid = array_merge($returntripid, $childs1);
            } else {
                $childs1 = array();
            }
        }
        $trip = array_unique($returntripid);
        return $trip;
    }

}

/**
 * get all parent and child trip
  input: $tripid
 * @return 
 * @author Anjaneya
 * */
if (!function_exists('getparentchildtrip')) {

    function getparentchildtrip($currenttripid) {
        $parent_arr = getallparenttrip($currenttripid);
        $child_arr = getallchildtrip($currenttripid);
        $parentchildtrip = array_merge($parent_arr, $child_arr);
        $trip = array_unique($parentchildtrip);
        return $trip;
    }

}

/**
 * get all parent and child trip
  input: $tripid
 * @return 
 * @author Anjaneya
 * */
if (!function_exists('checktripavailable')) {

    function checktripavailable($currenttripid, $date_of_trip) {
        $CI = & get_instance();
        $CI->load->model('Trip_model');
        $date_of_trip = formatdate($date_of_trip, $format = 'Y-m-d');
        $cut_of_date = date('Y-m-d');
        $alltrip_arr = getparentchildtrip($currenttripid);
        $no_of_traveller = 0;
        $inWhereData = array('id', $alltrip_arr);
        $whereData = array('isactive' => 1, 'parent_trip_id' => 0);
        $trip_list = selectTable('trip_master', $whereData = array(), $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id ASC', $having = '', $limit = array(), $result_way = 'all', $echo = 0, $inWhereData, $notInWhereData = array());
        if ($trip_list->num_rows() > 0) {
            $trip = $trip_list->row();
            $trip_id = $trip->id;
            $no_of_traveller = $trip->no_of_traveller;
            $booking_cut_of_time_type = $trip->booking_cut_of_time_type;
            $booking_cut_of_day = $trip->booking_cut_of_day;
            $booking_cut_of_time = $trip->booking_cut_of_time;
            $meeting_time = $trip->meeting_time;
            $booking_max_cut_of_month = $trip->booking_max_cut_of_month;

            //Offer Specific Day
            $whereData = array('isactive' => 1, 'trip_id' => $trip_id, 'from_date <=' => $date_of_trip, 'to_date >=' => $date_of_trip);
            $offer_list = selectTable('trip_specific_day', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC');
            if ($offer_list->num_rows() > 0) {
                $offer = $offer_list->row();
                $no_of_traveller = $offer->no_of_traveller;
            }
            $cutoff_disable_days = $CI->Trip_model->getCutoffDaysTime(date('Y-m-d'), $booking_cut_of_time_type, $booking_cut_of_day, $booking_cut_of_time, $meeting_time);

            $cutoff_max_month = $CI->Trip_model->getCutoffMonth(date('Y-m-d'), $booking_max_cut_of_month);
        }

        $totalbookedpersons = 0;
        $string_alltrip = implode(',', $alltrip_arr);
//        $showField = array('SUM(number_of_persons) AS totalbookedpersons');
//        $inWhereData = array('trip_id', $alltrip_arr);
//        $whereData = array('isactive' => 1, 'status' => 2, 'payment_status' => 1, 'date_of_trip' => $date_of_trip);
//        $trip_book_pay_list = selectTable('trip_book_pay', $whereData, $showField, $orWhereData = array(), $group = array(), $order = 'id ASC', $having = '', $limit = array(), $result_way = 'all', $echo = 0, $inWhereData, $notInWhereData = array());
        $trip_book_pay_list = $CI->db->query("SELECT tb.date_of_trip as date,DAY(tb.date_of_trip) as day,Month(tb.date_of_trip) as month,
                 YEAR(date_of_trip) as year,count(*) as b_count,tm.no_of_traveller,tm.id as trip_id,
                 SUM(number_of_persons) AS totalbookedpersons,(tm.no_of_traveller - SUM(number_of_persons)) as availabletraveller
                 FROM `trip_book_pay` as tb 
                 INNER JOIN trip_master as tm ON tm.id = tb.trip_id 
                 where tb.status NOT IN(1,3) "
                . "and tm.id IN({$string_alltrip}) "
                . "and tb.date_of_trip ='{$date_of_trip}'"
                . "and tb.payment_status =1 "
                . "and tb.isactive  = 1 ");
        if ($trip_book_pay_list->num_rows() > 0) {
            foreach ($trip_book_pay_list->result() as $row) {
                $totalbookedpersons = $totalbookedpersons + $row->totalbookedpersons;
            }
        }
        if ($totalbookedpersons == '') {
            $totalbookedpersons = 0;
        };
        $availabletraveller = $no_of_traveller - $totalbookedpersons;
        $cutoffdisabledays = json_decode($cutoff_disable_days);
        if (!empty($cutoffdisabledays)) {
            $cutoffdisabledays = formatdate($cutoffdisabledays[0], $format = 'Y-m-d');
        } else {
            $cutoffdisabledays = date('Y-m-d');
        }
        $cutoff_max_month = formatdate($cutoff_max_month, $format = 'Y-m-d');
        if ($date_of_trip < date('Y-m-d') || $date_of_trip < $cutoffdisabledays || $date_of_trip > $cutoff_max_month) {
            $availabletraveller = 0;
        }
        $available = array('total_size' => $no_of_traveller, 'total_booked' => $totalbookedpersons, 'total_available' => $availabletraveller);
        return $available;
    }

}
/**
 * book the trip
  input: $mailData array(
 * fromuserid //(option)
 * fromusername //(option)
 * fromemail  //(option) use fromuserid or fromemail
 * touserid  //(option) use touserid or toemail
 * toemail  //(option) use touserid or toemail
 * ccemail  //(option) 
 * bccemail  //(option) 
 * subject
 * message
 * othermsg (option) like book PNR info show /table format 
 * )
 * @return 
 * @author Anjaneya
 * */
if (!function_exists('sendemail_personalmail')) {

    function sendemail_personalmail($mailData = array()) {
        if (!empty($mailData)) {
            $CI = & get_instance();
            $fromemail = '';
            $toemail = '';
            $ccemail = '';
            $bccemail = '';
            $donotreply = donotreply;
            $mailData['tousername'] = '';
            // get from user info
            if (isset($mailData['fromuserid']) && $mailData['fromuserid'] != '') {
                $whereData = array('id' => (int) $mailData['fromuserid']);
                //$showField = array('email','phone');
                $tableData = selectTable('user_master', $whereData)->row();
                $fromuser_info = $tableData->first_row('array');
                $fromemail = $fromuser_info['email'];
            }
            if (isset($mailData['fromemail']) && $mailData['fromemail'] != '') {
                $fromemail = $mailData['fromemail'];
            }
            // get to user info
            if (isset($mailData['touserid']) && $mailData['touserid'] != '') {
                $whereData = array('id' => (int) $mailData['touserid']);
                //$showField = array('email','phone','user_fullname');
                $tableData = selectTable('user_master', $whereData);
                $touserinfo = $tableData->first_row('array');
                $toemail = $touserinfo['email'];
                $mailData['tousername'] = $touserinfo['user_fullname'];
            }
            if (isset($mailData['fromusername']) && $mailData['fromusername'] != '') {
                $mailData['tousername'] = $mailData['fromusername'];
            }
            if ($mailData['tousername'] == '') {
                $mailData['tousername'] = 'Sir/Madam';
            }
            if ($fromemail == '') {
                $fromemail = admin_email;
            }
            if ($toemail == '' && isset($mailData['toemail'])) {
                $toemail = $mailData['toemail'];
            }
            if ($toemail != '' && isset($mailData['toemail'])) {
                $toemail = $toemail.','.$mailData['toemail'];
            }
            if ($ccemail == '' && isset($mailData['ccemail'])) {
                $ccemail = $mailData['ccemail'];
            }
            if ($bccemail == '' && isset($mailData['bccemail'])) {
                $bccemail = $mailData['bccemail'];
            }//$bccemail ='support@bookyourtips.in';
            if ($fromemail == '' || $toemail == '') {
                return FALSE;
            }
            $CI->email->clear();
            $message = $CI->load->view('email/default_template.tpl.php', $mailData, TRUE);
            
            $email_config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'mail.bookyourtrips.in',
                'smtp_port' => 465,
                'smtp_user' => 'support@bookyourtips.in',
                'smtp_pass' => 'Goatravel@S456',
                'smtp_timeout' => '30',
                'crlf' => '\n',
                'newline' => '\r\n',
                'mailtype' => 'html',
                'charset' => 'utf-8'
            );
//            echo $fromemail."<br>";
//            echo $toemail."<br>";
//            echo $ccemail."<br>";
//            echo $bccemail."<br>";
//            echo $donotreply."<br>";
//            echo $mailData['subject']."<br>";
//            echo $message."<br>";
//            exit();
            $CI->load->library('email', $email_config);
            //echo $fromemail;echo $toemail;echo $ccemail;
            $CI->email->set_mailtype("html");
            $CI->email->from($fromemail);
            $CI->email->to($toemail);
            if (isset($ccemail) && $ccemail != "") {
                $CI->email->cc($ccemail);
            }
            if (isset($bccemail) && $bccemail != "") {
                $CI->email->bcc($bccemail);
            }
            if (isset($donotreply) && $donotreply != "") {
                $CI->email->reply_to($donotreply, 'Do-not-reply');
            }
            $CI->email->subject($mailData['subject'] . ' - ' . site_title);
            $CI->email->message($message); //echo $subject;
            if ($CI->email->send()) {
                return TRUE;
            } else {
                //$this->email->print_debugger();
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

}


//$userid = userid
//$iscleared = 0 - total, 1 - uncleared,  2 - cleared, 
if (!function_exists('checkbal_mypayment')) {

    function checkbal_mypayment($userid = '', $iscleared = 2) {
        $CI = & get_instance();
        if ($userid < 0) {
            return FALSE;
        }
        $balance = 0;
        $unclearedbalance = 0;
        $whereData = array('userid' => $userid);
        $inWhereData = array('status', array(2));
        $transaction = selectTable('my_transaction', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC', $having = '', $limit = array(), $result_way = 'all', $echo = 0, $inWhereData, $notInWhereData = array());
        if ($transaction->num_rows() > 0) {
            $row = $transaction->row();
            $balance = $row->balance;
            if ($iscleared == 0) {
                return $balance;
            }
            $whereData = array('userid' => $userid);
            $inWhereData = array('status', array(0, 1));
            $transaction = selectTable('my_transaction', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC', $having = '', $limit = array(), $result_way = 'all', $echo = 0, $inWhereData, $notInWhereData = array());
            if ($transaction->num_rows() > 0) {
                foreach ($transaction->result() as $row) {
                    $balance = $balance - $row->withdrawal_request_amt;
                    $unclearedbalance = (int) $unclearedbalance + (int) $row->withdrawal_request_amt;
                }
            }
            if ($iscleared == 2) {
                return $balance;
            }
            if ($iscleared == 1) {
                return $unclearedbalance;
            }
        }
        return 0;
    }

}
/**
 * book the trip
  input: array(
  book_pay_id  //from trip_book_pay
  book_pay_details_id  //from trip_book_pay_details
  pnr_no
  userid //from user_master ( owner of recored)
  from_userid //if 0- super admin / if own trip from user id
  trip_id //from trip_master ( billing trip )
  transaction_notes
  withdrawals
  deposits
  b2b_pay_account_info //from account_info
  withdrawal_request_amt
  withdrawal_notes
  withdrawal_paid_on
  status  //0 - new, 1 - InProgress, 2 -  Executed,3 - withdrawals request
 * ) 
 * @return 
 * @author Anjaneya
 * */
// if pay sucess need to pass $updatedata['payment_status']==1 && $updatedata['status']==2
if (!function_exists('update_mypayment')) {

    function update_mypayment($insertdata = array()) {
        // TODO: mail sent to customer and vendor
        // TODO: my_transaction when success payment

        $CI = & get_instance();
        $loginuserid = $CI->session->userdata('user_id');
        if (isset($insertdata['userid'])) {
            $balance = 0;
            $frombalance = 0;
            $whereData = array('userid' => $insertdata['userid']);
            $inWhereData = array('status', array(2)); // only Executed
            $transaction = selectTable('my_transaction', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC', $having = '', $limit = array(), $result_way = 'all', $echo = 0, $inWhereData, $notInWhereData = array());
            if ($transaction->num_rows() > 0) {
                $row = $transaction->row();
                $balance = $row->balance;
            }
            if (isset($insertdata['withdrawals'])) {
                $balance = (int) $balance - (int) $insertdata['withdrawals'];
            }
            if (isset($insertdata['deposits'])) {
                $balance = (int) $balance + (int) $insertdata['deposits'];
            }
            //if ($balance <= 0) { $balance = 0; }
            $insertdata['balance'] = $balance;

            //print_r($insertdata);
            $result = insertTable('my_transaction', $insertdata);
            //TODO: email

            if ($result)
                return $result;
        }
        return FALSE;
    }

}

/**
 * book the trip
  input: array(
  book_pay_id  //from trip_book_pay
  book_pay_details_id  //from trip_book_pay_details
  pnr_no
  userid //from user_master ( owner of recored)
  from_userid //if 0- super admin / if own trip from user id
  trip_id //from trip_master ( billing trip )
  transaction_notes
  withdrawals
  deposits
  b2b_pay_account_info //from account_info
  withdrawal_request_amt
  withdrawal_notes
  withdrawal_paid_on
  status  //0 - new, 1 - InProgress, 2 -  Executed,3 - withdrawals request
 * ) 
 * @return 
 * @author Anjaneya
 * */
// if pay sucess need to pass $updatedata['payment_status']==1 && $updatedata['status']==2
//$status=0 default Deposited (or) from Withdrawal, 1 -withdrawals request, 2 -withdrawals
//$isacceptnactive=0  0-not accept nactive value  1-accept nactive value
if (!function_exists('make_mypayment')) {

    function make_mypayment($makedata = array(), $status = 0,$isacceptnactive=0) {
        // TODO: mail sent to customer and vendor
        // TODO: my_transaction when success payment
        $CI = & get_instance();
        $loginuserid = $CI->session->userdata('user_id');
        if (isset($makedata['userid'])) {
            //$status=1 -withdrawals request,
            if ($status == 1) {
                $withdrawalsdata = array(
                    'userid' => $makedata['userid'],
                    'to_userid' => -2,
                    'transaction_notes' => 'Withdrawal Request: ' . $makedata['transaction_notes'],
                    'book_pay_id' => 0,
                    'book_pay_details_id' => 0,
                    'pnr_no' => '',
                    'trip_id' => 0,
                    'b2b_pay_account_info' => $makedata['b2b_pay_account_info'],
                    'withdrawal_request_amt' => $makedata['withdrawal_request_amt'],
                    'status' => $makedata['status']);
                return update_mypayment($withdrawalsdata);
            }
            //$status=2 -withdrawals ,
            if ($status == 2) {
                $withdrawalsdata = array(
                    'userid' => $makedata['userid'],
                    'to_userid' => -1,
                    'transaction_notes' => 'Withdrawal: ' . $makedata['transaction_notes'],
                    'book_pay_id' => 0,
                    'book_pay_details_id' => 0,
                    'pnr_no' => '',
                    'trip_id' => 0,
                    'b2b_pay_account_info' => $makedata['b2b_pay_account_info'],
                    'withdrawals' => $makedata['withdrawals'],
                    'withdrawal_notes' => $makedata['withdrawal_notes'],
                    'withdrawal_paid_on' => date("Y-m-d", strtotime($makedata['withdrawal_paid_on'])),
                    'status' => $makedata['status']);
                $withdrawresult = update_mypayment($withdrawalsdata);
                if ($withdrawresult) {
                    if (isset($makedata['withdrawal_request_id']) && $makedata['withdrawal_request_id'] != '') {
                        $whereData = array('id' => $makedata['withdrawal_request_id']);
                        $updatedata = array('status' => 3); //sent
                        $result = updateTable('trip_book_pay', $whereData, $updatedata);
                    }
                   if (isset($makedata['my_transaction_id']) && $makedata['my_transaction_id'] != '') {
                        $whereData22 = array('id' => $makedata['my_transaction_id']);
                        $updatedata22 = array( 'status' => 3);
                        $result = updateTable('my_transaction', $whereData22, $updatedata22);
                    }
                    return $withdrawresult;
                }
                return FALSE;
            }
            //$status=0 default deposits (or) from Withdrawal,
            $balance = 0;
            $frombalance = 0;
            $whereData = array('userid' => $makedata['userid']);
            $inWhereData = array('status', array(2)); // only Executed
            $transaction = selectTable('my_transaction', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC', $having = '', $limit = array(), $result_way = 'all', $echo = 0, $inWhereData, $notInWhereData = array());
            if ($transaction->num_rows() > 0) {
                $row = $transaction->row();
                $balance = $row->balance;
            }
            // amt get from user
            if ($makedata['from_userid'] >= 0) {
                $frombalance = checkbal_mypayment($makedata['from_userid']);
                if ($makedata['deposits'] > $frombalance && $isacceptnactive==0) {
                    return FALSE;
                }
                //Cash Withdrawal
                $paymentdata = array(
                    'userid' => $makedata['from_userid'],
                    'to_userid' => $makedata['userid'],
                    'transaction_notes' => 'Withdrawal: ' . $makedata['transaction_notes'],
                    'trip_id' => isset($makedata['trip_id']) ? $makedata['trip_id'] : 0,
                    'withdrawals' => $makedata['deposits'],
                    'status' => $makedata['status'],
                    'book_pay_id' => isset($makedata['book_pay_id']) ? $makedata['book_pay_id'] : 0,
                    'book_pay_details_id' => isset($makedata['book_pay_details_id']) ? $makedata['book_pay_details_id'] : 0,
                    'pnr_no' => isset($makedata['pnr_no']) ? $makedata['pnr_no'] : '',
                    'withdrawal_notes' => isset($makedata['withdrawal_notes']) ? $makedata['withdrawal_notes'] : '',
                    'withdrawal_paid_on' => isset($makedata['withdrawal_paid_on']) ? date("Y-m-d", strtotime($makedata['withdrawal_paid_on'])) : '',
                    'b2b_pay_account_info' => isset($makedata['b2b_pay_account_info']) ? $makedata['b2b_pay_account_info'] : 0,
                    'withdrawal_request_id' => isset($makedata['withdrawal_request_id']) ? $makedata['withdrawal_request_id'] : 0);
//                print_r($paymentdata);echo "<br><br>";
//                //exit();
                $result = update_mypayment($paymentdata);
            }
            $paymentdata = array(
                'userid' => $makedata['userid'],
                'transaction_notes' => 'Deposit: ' . $makedata['transaction_notes'],
                'book_pay_id' => isset($makedata['book_pay_id']) ? $makedata['book_pay_id'] : 0,
                'book_pay_details_id' => isset($makedata['book_pay_details_id']) ? $makedata['book_pay_details_id'] : 0,
                'trip_id' => isset($makedata['trip_id']) ? $makedata['trip_id'] : 0,
                'from_userid' => $makedata['from_userid'], // default -1
                'trip_id' => isset($makedata['trip_id']) ? $makedata['trip_id'] : 0,
                'deposits' => $makedata['deposits'],
                'status' => $makedata['status'],
                'pnr_no' => isset($makedata['pnr_no']) ? $makedata['pnr_no'] : '',
                'withdrawal_notes' => isset($makedata['withdrawal_notes']) ? $makedata['withdrawal_notes'] : '',
                'withdrawal_paid_on' => isset($makedata['withdrawal_paid_on']) ? date("Y-m-d", strtotime($makedata['withdrawal_paid_on'])) : '',
                'b2b_pay_account_info' => isset($makedata['b2b_pay_account_info']) ? $makedata['b2b_pay_account_info'] : 0,
                'withdrawal_request_id' => isset($makedata['withdrawal_request_id']) ? $makedata['withdrawal_request_id'] : 0);
             //print_r($paymentdata);
            $result = update_mypayment($paymentdata);
//             exit();
            if ($result) {
                return $result;
            }
        }
        return FALSE;
    }

}

/**
 * cancelled trip and refund amount
 * $pnr_no = ''  
 * $refund_date = ''
 * $refund_percentage = ''  //<=100
 * @return 
 * @author Anjaneya
 * */
if (!function_exists('cancelled_trip_refund_amount')) {

    function cancelled_trip_refund_amount($refundinfo = array()) {
        // TODO: mail sent to customer and vendor

        $CI = & get_instance();
        $loginuserid = $CI->session->userdata('user_id');
        if (count($refundinfo) != 4) {
            $result = array('status' => 0, 'message' => 'Sorry! try again...');
            return $result;
        }
        $return_on = formatdate($refundinfo['refund_date'], $format = 'Y-m-d');
        $refund_percentage = $refundinfo['refund_percentage'];
        $return_notes = $refundinfo['return_notes'];
        if ($refund_percentage > 100 || $refund_percentage < 0) {
            $result = array('status' => 0, 'message' => 'Sorry! try again...');
            return $result;
        }
        //master tavle trip_book_pay
        $whereData = array('tpd.status' => 3, 'tpd.payment_status' => 1,'tpd.b2b_payment_status !=' => 1,'tpd.return_paid_status !=' => 3, 'tpd.isactive' => 1, 'tpd.pnr_no' => $refundinfo['pnr_no']);
        $joins = array(
            array(
                'table' => 'trip_master AS tm',
                'condition' => 'tm.id = tpd.trip_id',
                'jointype' => 'INNER'
            ),
            array(
                'table' => 'user_master AS tmum',
                'condition' => 'tm.user_id = tmum.id',
                'jointype' => 'INNER'
            ),
            array(
                'table' => 'user_master AS bum',
                'condition' => 'tpd.user_id = bum.id',
                'jointype' => 'INNER'
            ),
            array(
                'table' => 'coupon_code_master_history AS ccmhd',
                'condition' => 'tpd.coupon_history_id = ccmhd.id',
                'jointype' => 'LEFT'
            ),
        );
        $columns = 'tpd.*,tm.id AS trip_id,tm.trip_name,tm.trip_code,tm.how_many_days,tm.how_many_nights,tm.total_days,tm.how_many_hours,'
                . 'tm.brief_description,tm.other_inclusions,tm.exclusions,tm.languages,tm.meal,tm.cancellation_policy,tm.confirmation_policy,tm.refund_policy,'
                . 'bum.id AS bookedbyid,bum.user_fullname AS bookedby,bum.phone AS bookedby_contactno,bum.email AS bookedby_contactemail,'
                . 'tmum.id AS trip_postbyid,tmum.user_fullname AS trip_postby,tmum.phone AS trip_contactno,tmum.email AS trip_contactemail,tm.trip_name,'
                . '(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.coupon_code END) AS coupon_code,(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.offer_type END) AS offer_type,'
                . '(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.percentage_amount END) AS percentage_amount';
        $tableData = get_joins('trip_book_pay AS tpd', $columns, $joins, $whereData);
        if ($tableData->num_rows() > 0) {
            $book_pay = $tableData->result();
            $net_price = $book_pay[0]->net_price;
            $return_paid_amt = ($refund_percentage / 100) * $net_price;
            $transaction_notes = 'Trip cancelled/refund amount for PNR No ' . $book_pay[0]->pnr_no . ' (' . $book_pay[0]->trip_code . ' / ' . $book_pay[0]->trip_name . ').<br>' . $return_notes;
            if ($book_pay[0]->gst_amt > 0) {
                $transaction_notes .=' Include GST and Service Charge.';
            }
            $paymentdata = array(
                'userid' => $book_pay[0]->user_id, // b2c
                'transaction_notes' => $transaction_notes,
                'book_pay_id' => $book_pay[0]->id,
                'book_pay_details_id' => 0,
                'pnr_no' => $book_pay[0]->pnr_no,
                'from_userid' => 0, // default -1  //admin / b2b
                'trip_id' => $book_pay[0]->trip_id,
                'deposits' => $return_paid_amt,
                'status' => 2);
            $paymentid = make_mypayment($paymentdata);
            if ($paymentid) {
                $whereData22 = array('id' => $book_pay[0]->id);
                $updatedata22 = array('my_transaction_id' => $paymentid,'b2b_payment_status' => 1, 'b2b_payment_on' => date('Y-m-d'),
                    'return_paid_amt' => $return_paid_amt, 'return_notes' => $return_notes, 'return_on' => $return_on, 'return_paid_status' => 3,
                    'refund_percentage' => $refund_percentage);
                $result = updateTable('trip_book_pay', $whereData22, $updatedata22);

                $subject = 'You have received cancelled/refund amount for PNR No ' . $book_pay[0]->pnr_no;
                $message = 'You have received cancelled/refund amount for PNR No ' . $book_pay[0]->pnr_no . ' (' . $book_pay[0]->trip_code . ' / ' . $book_pay[0]->trip_name . ') from ' . site_title. '.<br><br>' . $return_notes;
                $mailData = array(
                    //'fromuserid' => $pnrinfo['trip_postbyid'],
                    'ccemail' => admin_email . ',' . $book_pay[0]->booked_email,
                    'bccemail' => 'anjaneya.developer@gmail.com',
                    'touserid' => $book_pay[0]->user_id,
                    //'toemail' => 'anjaneya.developer@gmail.com',
                    'subject' => $subject,
                    'message' => $message,
                        //'othermsg' => $othermsg
                );

                sendemail_personalmail($mailData);

                //master tavle trip_book_pay_details
                $book_pay = array();
                $whereData = array('tpd.status' => 3, 'tpd.payment_status' => 1,'tpd.b2b_payment_status !=' => 1,'tpd.return_paid_status !=' => 3, 'tpd.isactive' => 1, 'tpd.pnr_no' => $refundinfo['pnr_no']);
                $joins = array(
                    array(
                        'table' => 'trip_master AS tm',
                        'condition' => 'tm.id = tpd.trip_id',
                        'jointype' => 'INNER'
                    ),
                    array(
                        'table' => 'user_master AS tmum',
                        'condition' => 'tm.user_id = tmum.id',
                        'jointype' => 'INNER'
                    ),
                    array(
                        'table' => 'user_master AS bum',
                        'condition' => 'tpd.from_user_id = bum.id',
                        'jointype' => 'INNER'
                    ),
                    array(
                        'table' => 'coupon_code_master_history AS ccmhd',
                        'condition' => 'tpd.coupon_history_id = ccmhd.id',
                        'jointype' => 'LEFT'
                    ),
                );
                $columns = 'tpd.*,tm.id AS trip_id,tm.trip_name,tm.trip_code,tm.how_many_days,tm.how_many_nights,tm.total_days,tm.how_many_hours,'
                        . 'tm.brief_description,tm.other_inclusions,tm.exclusions,tm.languages,tm.meal,tm.cancellation_policy,tm.confirmation_policy,tm.refund_policy,'
                        . 'bum.id AS bookedbyid,bum.user_fullname AS bookedby,bum.phone AS bookedby_contactno,bum.email AS bookedby_contactemail,'
                        . 'tmum.id AS trip_postbyid,tmum.user_fullname AS trip_postby,tmum.phone AS trip_contactno,tmum.email AS trip_contactemail,tm.trip_name,'
                        . '(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.coupon_code END) AS coupon_code,(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.offer_type END) AS offer_type,'
                        . '(CASE WHEN ccmhd.id IS NOT NULL THEN ccmhd.percentage_amount END) AS percentage_amount';
                $tableData = get_joins('trip_book_pay_details AS tpd', $columns, $joins, $whereData);
                if ($tableData->num_rows() > 0) {
                foreach ($tableData->result() as $book_pay) {
                    //$book_pay = $tableData->result();
                    $net_price = $book_pay->your_final_amt;
                    $return_paid_amt = ($refund_percentage / 100) * $net_price;
                    $transaction_notes = 'Trip cancelled/refund amount for PNR No ' . $book_pay->pnr_no . ' (' . $book_pay->trip_code . ' / ' . $book_pay->trip_name . ').<br>' . $return_notes;
                    if ($book_pay->servicecharge_amt > 0 || $book_pay->gst_amt > 0) {
                        $transaction_notes .=' Include GST and Service Charge.';
                    }
                    $paymentdata = array(
                        'userid' => $book_pay->user_id, // b2c
                        'transaction_notes' => $transaction_notes,
                        'book_pay_id' => $book_pay->book_pay_id,
                        'book_pay_details_id' => $book_pay->id,
                        'pnr_no' => $book_pay->pnr_no,
                        'from_userid' => 0, // default -1  //admin / b2b
                        'trip_id' => $book_pay->trip_id,
                        'deposits' => $return_paid_amt,
                        'status' => 2);
                    $paymentid = make_mypayment($paymentdata);
                    if ($paymentid) {
                        $whereData22 = array('id' => $book_pay->id);
                        $updatedata22 = array('my_transaction_id' => $paymentid,'b2b_payment_status' => 1, 'b2b_payment_on' => date('Y-m-d'),
                            'return_paid_amt' => $return_paid_amt, 'return_notes' => $return_notes, 'return_on' => $return_on, 'return_paid_status' => 3,
                             'refund_percentage' => $refund_percentage);
                        $result = updateTable('trip_book_pay_details', $whereData22, $updatedata22);

                        $subject = 'You have received cancelled/refund amount for PNR No ' . $book_pay->pnr_no;
                        $message = 'You have received cancelled/refund amount for PNR No ' . $book_pay->pnr_no . ' (' . $book_pay->trip_code . ' / ' . $book_pay->trip_name . ') from ' . site_title. '.<br><br>' . $return_notes;
                        $mailData = array(
                            //'fromuserid' => $pnrinfo['trip_postbyid'],
                            'ccemail' => admin_email,
                            'bccemail' => 'anjaneya.developer@gmail.com',
                            'touserid' => $book_pay->user_id,
                            //'toemail' => 'anjaneya.developer@gmail.com',
                            'subject' => $subject,
                            'message' => $message,
                                //'othermsg' => $othermsg
                        );

                        sendemail_personalmail($mailData);
                    }
                }
                }
                $result = array('status' => 1, 'message' => 'Successfully transferred amount!');
                return $result;
            }
        }
        $result = array('status' => 0, 'message' => 'Sorry! try again...');
        return $result;
    }

}

if (!function_exists('payment_user_details')) {

    function payment_user_details($PNR,$loginuser_id) {
        $CI = & get_instance();
        $whereData = array('tpd.status' => 1, 'tpd.pnr_no' => $PNR);
        
        $user = [];
           
        $joins = array(               
            array(
                'table'     => 'user_master AS bum',
                'condition' => 'tpd.user_id = bum.id',
                'jointype'  => 'INNER'
            )                
        );
        $columns = 'tpd.id,tpd.user_id,tpd.net_price,bum.email,bum.phone,bum.user_fullname';
        $tableData = get_joins('trip_book_pay AS tpd', $columns, $joins, $whereData);
        if ($tableData->num_rows() > 0) {
            $user = $tableData->row_array();
            
            if(isset($user['net_price'])){
                
                $user['total_amount'] = $user['net_price'];
                $mypayment = checkbal_mypayment($loginuser_id, 2);
                if ($mypayment > 0) {
                    $user['total_amount'] = (int) $mypayment - (int) $user['total_amount'];
                }
            }
        }
        
        return $user;
    }

}
/* End of file custom_helper.php */
?>