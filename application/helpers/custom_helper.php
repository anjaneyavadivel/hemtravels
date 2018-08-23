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
            return base_url() . "profile/noprofile.png";
        }
    }

}

if (!function_exists('trippic')) {

    function trippic($image) {
        if (trim($image) != "" && file_exists(FCPATH . "uploads/$image")) {
            return base_url() . "uploads/$image";
        } else {
            return base_url() . "uploads/noimg.jpg";
        }
    }

}
if (!function_exists('categorypic')) {

    function categorypic($image) {
        if (trim($image) != "" && file_exists(FCPATH . "uploads/category/$image")) {
            return base_url() . "uploads/category/$image";
        } else {
            return base_url() . "uploads/category/04.jpg";
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
 *      'ischeckadmin' => 1, //default= 1 - if 1 check super admin offer, 2 - vendor offer, 0 - customer offer check
  'date_of_trip' => date of trip,
 * @return 
 * @author Anjaneya
 * */
if (!function_exists('trip_offer')) {

    function trip_offer($offerdata = array()) {
        // TODO: mail sent to customer and vendor

        $CI = & get_instance();
        $loginuserid = $CI->session->userdata('user_id');
        if (count($offerdata) != 3) {
            return FALSE;
        }
        $date_of_trip = formatdate($offerdata['date_of_trip'], $format = 'Y-m-d');
        $ischeckadmin = $offerdata['ischeckadmin'];
        $parenttrip_id = $offerdata['trip_id'];
        //ini veriable
        $totalpricetoadult = 0;$totalpricetochild = 0;$totalpricetoinfan = 0;
        $totalextrapricetoadult = 0;$totalextrapricetochild = 0;$totalextrapricetoinfan = 0;
        $no_of_traveller = 0;$no_of_min_booktraveller = 0;$no_of_max_booktraveller = 0;$is_open = 1;
        $offer_type_name = ''; $discount_percentage = 0;$offer_type = 0; $offer_by = 0; $discount_price = 0;$coupon_history_id = 0;
        $coupon_history_code = '';$coupon_history_name = '';$coupon_comment = '';
        $parenttrip = getallparenttrip($parenttrip_id);
        //print_r($parenttrip);
        $inWhereData = array('id', $parenttrip);
        $whereData = array('isactive' => 1);
        $trip_list = selectTable('trip_master', $whereData = array(), $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id ASC', $having = '', $limit = array(), $result_way = 'all', $echo = 0, $inWhereData, $notInWhereData = array());
        if ($trip_list->num_rows() > 0) {
            foreach ($trip_list->result() as $row) {
                $price_to_adult = 0;$price_to_child = 0;$price_to_infan = 0;
                $extrapricetoadult = 0;$extrapricetochild = 0;$extrapricetoinfan = 0;
                $trip_id = $row->id;
                $parent_trip_id = $row->parent_trip_id;
                if ($row->parent_trip_id == 0) { // root trip
                    $no_of_traveller = $row->no_of_traveller;$no_of_min_booktraveller = $row->no_of_min_booktraveller;$no_of_max_booktraveller = $row->no_of_max_booktraveller;
                }
                $price_to_adult = $row->price_to_adult;$price_to_child = $row->price_to_child;$price_to_infan = $row->price_to_infan;

                //Offer Specific Day
                $whereData = array('isactive' => 1, 'trip_id' => $trip_id, 'from_date <=' => $date_of_trip, 'to_date >=' => $date_of_trip);
                $offer_list = selectTable('trip_specific_day', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC');
                if ($offer_list->num_rows() > 0) {
                    $offer = $offer_list->row();
                    $pricetoadult = $offer->price_to_adult;$pricetochild = $offer->price_to_child;$pricetoinfan = $offer->price_to_infan;

                    if ($parent_trip_id == 0) {
                        // root trip
                        if ($offer->type == 2) { // 2 - Set Trip Close Specific Day
                            $result = array('is_open' => 0, 'message' => $offer->title, 'from_date' => formatdate($offer->from_date, $format = 'M d, Y'),
                                'to_date' => formatdate($offer->to_date, $format = 'M d, Y'));
                            return $result;
                        }
                        $no_of_traveller = $offer->no_of_traveller;$no_of_min_booktraveller = $offer->no_of_min_booktraveller;
                        $no_of_max_booktraveller = $offer->no_of_max_booktraveller;

                        if ($offer->offer_type == 2) {//2 -Percentage
                            $extrapricetoadult = (int) $price_to_adult * ((int) $pricetoadult / 100);
                            $extrapricetochild = (int) $price_to_child * ((int) $pricetochild / 100);
                            $extrapricetoinfan = (int) $price_to_infan * ((int) $pricetoinfan / 100);
                        }
                        if ($offer->offer_type == 1) { //1 - Fixed and  // root trip
                            $extrapricetoadult = (int) $pricetoadult - (int)$price_to_adult;
                            $extrapricetochild = (int)$pricetochild  - (int)$price_to_child;
                            $extrapricetoinfan = (int)$pricetoinfan  - (int)$price_to_infan;
                        }
                        $totalextrapricetoadult = $extrapricetoadult;
                        $totalextrapricetochild = $extrapricetochild;
                        $totalextrapricetoinfan = $extrapricetoinfan;
                        

                    }else{ // not root trip
                        if ($offer->offer_type == 2) {//2 -Percentage
                            $extrapricetoadult = (int) $price_to_adult * ((int) $pricetoadult / 100);
                            $extrapricetochild = (int) $price_to_child * ((int) $pricetochild / 100);
                            $extrapricetoinfan = (int) $price_to_infan * ((int) $pricetoinfan / 100);
                        }
                        if ($offer->offer_type == 1) { //1 - Fixed and  // root trip
                            $extrapricetoadult = (int) $pricetoadult - (int)$price_to_adult;
                            $extrapricetochild = (int)$pricetochild  - (int)$price_to_child;
                            $extrapricetoinfan = (int)$pricetoinfan  - (int)$price_to_infan;
                        }
                        $totalextrapricetoadult = (int)$totalextrapricetoadult+(int)$extrapricetoadult;
                        $totalextrapricetochild = (int)$totalextrapricetochild+(int)$extrapricetochild;
                        $totalextrapricetoinfan = (int)$totalextrapricetoinfan+(int)$extrapricetoinfan;
                    }
                }
                $price_to_adult = (int)$price_to_adult + (int)$totalextrapricetoadult;
                $price_to_child = (int)$price_to_child + (int)$totalextrapricetochild;
                $price_to_infan = (int)$price_to_infan + (int)$totalextrapricetoinfan;
                if ($CI->session->userdata('user_type') == 'VA' || $ischeckadmin == 2) { //Vandor coupon  (office book)
                    $whereData = array('type' => 2, 'isactive' => 1, 'trip_id' => $row->id, 'validity_from <=' => $date_of_trip, 'validity_to >=' => $date_of_trip);
                    $couponhistory_list = selectTable('coupon_code_master_history', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC');
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
                }else {// super admin coupon changes for customer
                    $whereData = array('category_id' => $row->trip_category_id, 'type' => 3, 'isactive' => 1, 'validity_from <=' => $date_of_trip, 'validity_to >=' => $date_of_trip);
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

                        $price_to_adult = (int) $price_to_adult + ((int) $price_to_adult * ((int) $pricetoadult / 100));
                        $price_to_child = (int) $price_to_child + ((int) $price_to_child * ((int) $pricetochild / 100));
                        $price_to_infan = (int) $price_to_infan + ((int) $price_to_infan * ((int) $pricetoinfan / 100));
                        if ($offer_type == 1) {//fixed
                            $discount_price = $couponhistory->percentage_amount;
                        }
                        if ($offer_type == 2) {//percentage
                            $discount_percentage = $couponhistory->percentage_amount;
                        }
                    } else {// coupon for customer from vendor
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
                }
                
                //final amt
                $totalpricetoadult = (int)$price_to_adult;
                $totalpricetochild = (int)$price_to_child;
                $totalpricetoinfan = (int)$price_to_infan;
                
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
            $totalbookedpersons=0;
            $showField = array('SUM(number_of_persons) AS totalbookedpersons');
            $whereData = array('isactive' => 1,'status' => 2,'payment_status' => 1, 'trip_id' => $parenttrip_id, 'date_of_trip' => $date_of_trip);
            $trip_book_pay_list = selectTable('trip_book_pay', $whereData,$showField);
             if ($trip_book_pay_list->num_rows() > 0) {
                $row = $trip_book_pay_list->row();
                $totalbookedpersons = $row->totalbookedpersons;
             }
            $availabletraveller=(int)$no_of_traveller-(int)$totalbookedpersons;
            $final_price_to_adult = $totalpricetoadult; $final_price_to_child = $totalpricetochild; $final_price_to_infan = $totalpricetoinfan;
            if ($offer_type == 1) {
                $final_price_to_adult = (int)$totalpricetoadult - (int)$discount_price;
                $final_price_to_child = (int)$totalpricetochild - (int)$discount_price;
                $final_price_to_infan = (int)$totalpricetoinfan - (int)$discount_price;
            }
            if ($offer_type == 2) {
                $final_price_to_adult = (int)$totalpricetoadult - ((int) $totalpricetoadult * ((int) $discount_percentage / 100));
                $final_price_to_child = (int)$totalpricetochild - ((int) $totalpricetochild * ((int) $discount_percentage / 100));
                $final_price_to_infan = (int)$totalpricetoinfan - ((int) $totalpricetoinfan * ((int) $discount_percentage / 100));
            }
            if ($final_price_to_adult<0) { $final_price_to_adult = 0; }
            if ($final_price_to_child<0) { $final_price_to_child = 0; }
            if ($final_price_to_infan<0) { $final_price_to_infan = 0; }
            $gst_percentage = GST_PERCENTAGE;
            $result = array('is_open' => $is_open, 'price_to_adult' => $totalpricetoadult, 'price_to_child' => $totalpricetochild, 'price_to_infan' => $totalpricetoinfan,
                'no_of_traveller' => $no_of_traveller,'availabletraveller' => $availabletraveller, 'no_of_min_booktraveller' => $no_of_min_booktraveller, 'no_of_max_booktraveller' => $no_of_max_booktraveller,
                'coupon_history_id' => $coupon_history_id,'offer_by_type' => $offer_by,'coupon_code' => $coupon_history_code,'coupon_name' => $coupon_history_name,'offer_type' => $offer_type, 'offer_type_name' => $offer_type_name, 
                'coupon_comment' => $coupon_comment,'discount_price' => $discount_price,'discount_percentage' => $discount_percentage,'gst_percentage' => $gst_percentage,
                'final_price_to_adult' => $final_price_to_adult, 'final_price_to_child' => $final_price_to_child, 'final_price_to_infan' => $final_price_to_infan);
            return $result;
        }
        $result = array('is_open' => 0, 'message' =>'Sorry! try again...', 'from_date' => '','to_date' => '');
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
  'pick_up_location_id' => pick up location id)
 * @return 
 * @author Anjaneya
 * */
if (!function_exists('trip_book')) {

    function trip_book($bookdata = array()) {
        // TODO: mail sent to customer and vendor

        $CI = & get_instance();
        $loginuserid = $CI->session->userdata('user_id');
        if (count($bookdata) != 7 || $loginuserid == '') {
            return FALSE;
        }
        $date_of_trip = formatdate($bookdata['date_of_trip'], $format = 'Y-m-d');
        $parenttrip_id = $bookdata['trip_id'];
        $is_shared = 0;
        $parent_trip_id = 0;
        $trip_location_name = '';
        $trip_location_landmark = '';
        $discount_price =0;
        $time_of_trip = '';
        $whereData = array('isactive' => 1, 'trip_id' => $bookdata['trip_id'], 'id' => $bookdata['pick_up_location_id']);
        $location_list = selectTable('pick_up_location_map', $whereData);
        if ($location_list->num_rows() > 0) {
            $location = $location_list->row();
            $time_of_trip = $location->time;
            $trip_location_name = $location->location;
            $trip_location_landmark = $location->landmark;
        }
        $whereData = array('isactive' => 1, 'id'=>$bookdata['trip_id']);
        $trip_list = selectTable('trip_master', $whereData);
        if ($trip_list->num_rows() > 0) {
            $row = $trip_list->row();
            $parent_trip_id = $row->parent_trip_id;
        }
        // find offer for customer
        $offer_amt = 0;$discount_percentage = 0;
        $offerdata=array(
        'trip_id' => $parenttrip_id,
        'date_of_trip' => $date_of_trip,
        'ischeckadmin' => 1);//default= 1 - if 1 check super admin offer, 2 - vendor offer, 0 - customer offer check
        $offerinfo = trip_offer($offerdata);
        //print_r($offerinfo);
        
        // cost for trip member
        $number_of_persons = (int) $bookdata['no_of_adult'] + (int) $bookdata['no_of_child'] + (int) $bookdata['no_of_infan'];
        $total_adult_price = $bookdata['no_of_adult'] * $offerinfo['price_to_adult'];
        $total_child_price = $bookdata['no_of_child'] * $offerinfo['price_to_child'];
        $total_infan_price = $bookdata['no_of_infan'] * $offerinfo['price_to_infan'];
        $subtotal_trip_price = (int) $total_adult_price + (int) $total_child_price + (int) $total_infan_price;
        // get offer
        if ($offerinfo['offer_type'] == 1) {
            $discount_price = $offerinfo['discount_price'];
            $offer_amt = $offerinfo['discount_price']*(int)$number_of_persons;
        }
        if ($offerinfo['offer_type'] == 2 && $offerinfo['discount_percentage'] != '0.00') {
            $discount_percentage = $offerinfo['discount_percentage'];
            if (strpos($discount_percentage, '.00') !== false) {
                $discount_percentage = round($discount_percentage);
            } 
            $offer_amt = (int) $subtotal_trip_price * ((int) $discount_percentage / 100);
        }
        $total_trip_price = (int) $subtotal_trip_price - (int) $offer_amt;
        //Find GST
        $gst_percentage = GST_PERCENTAGE;
        $gst_amt = $total_trip_price * (GST_PERCENTAGE / 100);
        $round_off = round(round($total_trip_price + $gst_amt) - ($total_trip_price + $gst_amt),2);
        $net_price = $total_trip_price + $gst_amt + $round_off;
        $pnr_no = createPNR();
        // insert for customer
        $book_pay = array(
            'parent_trip_id' => $parent_trip_id,
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
            'discount_price' => $discount_price,
            'discount_percentage' => $discount_percentage,
            'offer_amt' => $offer_amt,
            'total_trip_price' => $total_trip_price,
            'gst_percentage' => GST_PERCENTAGE,
            'gst_amt' => $gst_amt,
            'round_off' => $round_off,
            'net_price' => $net_price,
            'date_of_trip' => formatdate($bookdata['date_of_trip'], $format = 'Y-m-d'),
            'time_of_trip' => $time_of_trip,
            'pick_up_location_id' => $bookdata['pick_up_location_id'],
            'pick_up_location' => $trip_location_name,
            'pick_up_location_landmark' => $trip_location_landmark,
            'booked_by' => $loginuserid,
            'status' => 1,
            'payment_status' => 0
        );
        $trip_book_payid = insertTable('trip_book_pay', $book_pay);
//        $trip_book_payid=9;
//        echo '<br><br>'; print_r($book_pay);
        $book_pay_detailsid=0;
        if($trip_book_payid){
            // check super admin offer for customer
            if ($CI->session->userdata('user_type') == 'CU' && $offerinfo['offer_by_type']==3) {// super admin coupon changes
                $discount_percentage=0;$discount_price=0;$offer_amt=0;$coupon_history_id=0;
                $total_adult_price=0;$total_child_price=0;$total_infan_price=0;$subtotal_trip_price=0;
                //check offer
                $offerdata=array(
                'trip_id' => $parenttrip_id,
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
                    $offer_amt = (int)$checkoffer['discount_price']*(int)$number_of_persons;
                }
                if ($checkoffer['offer_type'] == 2 && $checkoffer['discount_percentage'] != '0.00') {
                    $discount_percentage = $checkoffer['discount_percentage'];
                    if (strpos($discount_percentage, '.00') !== false) {
                        $discount_percentage = round($discount_percentage);
                    } 
                    $offer_amt = (int)$subtotal_trip_price * ((int) $discount_percentage / 100);
                }
                $total_trip_price = (int) $subtotal_trip_price - (int) $offer_amt;
                
                
                $vendor_amt = $total_trip_price;
                $net_price=(int)$book_pay['total_trip_price'] - (int)$vendor_amt;
                $servicecharge_amt = $net_price * (SERVICECHARGE_PERCENTAGE/100); 
                if($servicecharge_amt<SERVICECHARGE_AMT){// get max amt
                    $servicecharge_amt =SERVICECHARGE_AMT;
                }
                $your_amt = (int)$net_price-(int)$servicecharge_amt;
                $gst_amt = $your_amt * (GST_PERCENTAGE/100);
                $your_final_amt_temp = $your_amt+$gst_amt;
                $round_off = round($your_final_amt_temp)-($your_final_amt_temp);
                $your_final_amt = $round_off+$your_final_amt_temp;

                $book_pay_details = array(
                    'book_pay_id' => $trip_book_payid,
                    'parent_trip_id' => $parent_trip_id,
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
                    'round_off' => number_format ($round_off,2),
                    'date_of_trip' => $book_pay['date_of_trip'],
                    'time_of_trip' => $book_pay['time_of_trip'],
                    'pick_up_location_id' => $book_pay['pick_up_location_id'],
                    'pick_up_location' => $book_pay['pick_up_location'],
                    'pick_up_location_landmark' => $book_pay['pick_up_location_landmark'],
                    'booked_by' => $loginuserid,
                    'status' => 1,
                    'payment_status' => 0
                );
                $book_pay_detailsid = insertTable('trip_book_pay_details', $book_pay_details);
                //echo '<br><br>'; print_r($book_pay_details);
            }

            if($parent_trip_id>0){
                $parenttrip = getallparenttrip($parenttrip_id);
                //echo '<br><br>';print_r($parenttrip);
                $parent_trip_id =0;$vendor_amt =0;
                $inWhereData = array('id', $parenttrip);
                $whereData = array('isactive' => 1);
                $trip_list = selectTable('trip_master', $whereData = array(), $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id ASC', $having = '', $limit = array(), $result_way = 'all', $echo = 0, $inWhereData, $notInWhereData = array());
                if ($trip_list->num_rows() > 0) {
                    foreach ($trip_list->result() as $row) {
                        $trip_id = $row->id;
                        $user_id = $row->user_id;
                        $discount_percentage=0;$discount_price=0;$offer_amt=0;$coupon_history_id=0;
                        $total_adult_price=0;$total_child_price=0;$total_infan_price=0;$subtotal_trip_price=0;
                        //check offer
                        $offerdata=array(
                        'trip_id' => $trip_id,
                        'date_of_trip' => $date_of_trip,
                        'ischeckadmin' => 2);//default= 1 - if 1 check super admin offer, 2 - vendor offer, 0 - customer offer check
                        if($trip_id==$bookdata['trip_id']){
                            $offerdata['ischeckadmin']=0;
                        }
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
                            $offer_amt = (int)$checkoffer['discount_price']*(int)$number_of_persons;
                        }
                        if ($checkoffer['offer_type'] == 2 && $checkoffer['discount_percentage'] != '0.00') {
                            $discount_percentage = $checkoffer['discount_percentage'];
                            if (strpos($discount_percentage, '.00') !== false) {
                                $discount_percentage = round($discount_percentage);
                            } 
                            $offer_amt = (int) $subtotal_trip_price * ((int) $discount_percentage / 100);
                        }
                        $total_trip_price = (int) $subtotal_trip_price - (int) $offer_amt;


                        //$vendor_amt = $total_trip_price;
                        $net_price=(int)$total_trip_price - (int)$vendor_amt;
                        $servicecharge_amt = $net_price * (SERVICECHARGE_PERCENTAGE/100); 
                        if($servicecharge_amt<SERVICECHARGE_AMT){// get max amt
                            $servicecharge_amt =SERVICECHARGE_AMT;
                        }
                        $your_amt = (int)$net_price-(int)$servicecharge_amt;
                        $gst_amt = $your_amt * (GST_PERCENTAGE/100);
                        $your_final_amt_temp = $your_amt+$gst_amt;
                        $round_off = round($your_final_amt_temp)-($your_final_amt_temp);
                        $your_final_amt = $round_off+$your_final_amt_temp;

                        $book_pay_details = array(
                            'book_pay_id' => $trip_book_payid,
                            'parent_trip_id' => $parent_trip_id,
                            'trip_id' => $trip_id,
                            'from_user_id' => $bookdata['book_user_id'],
                            'from_trip_id' => $bookdata['trip_id'],
                            'user_id' => $user_id,
                            'pnr_no' => 'PNR39R4QVQ7',//$book_pay['pnr_no'],
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
                            'discount_price' => $checkoffer['discount_price'],
                            'discount_percentage' => $checkoffer['discount_percentage'],
                            'offer_amt' => $offer_amt,
                            'total_trip_price' => $total_trip_price,
                            'vendor_amt' => $vendor_amt,
                            'your_amt' => $your_amt,
                            'net_price' => $net_price,
                            'servicecharge_amt' => $servicecharge_amt,
                            'gst_percentage' => GST_PERCENTAGE,
                            'gst_amt' => $gst_amt,
                            'your_final_amt' => $your_final_amt,
                            'round_off' => number_format ($round_off,2),
                            'date_of_trip' => $book_pay['date_of_trip'],
                            'time_of_trip' => $book_pay['time_of_trip'],
                            'pick_up_location_id' => $book_pay['pick_up_location_id'],
                            'pick_up_location' => $book_pay['pick_up_location'],
                            'pick_up_location_landmark' => $book_pay['pick_up_location_landmark'],
                            'booked_by' => $loginuserid,
                            'status' => 1,
                            'payment_status' => 0
                        );
                        $book_pay_detailsid = insertTable('trip_book_pay_details', $book_pay_details);
                        //echo '<br><br>'; print_r($book_pay_details);
                        $vendor_amt = $total_trip_price;
                        $parent_trip_id = $row->parent_trip_id; 
                    }
                }
            }
            // booked user info
            
            $whereData = array('id'=>$bookdata['book_user_id']);
            $orWhereData = array('isactive' => 1, 'isactive' => 2);
            $trip_list = selectTable('user_master', $whereData, $showField = array('*'), $orWhereData);
            if ($trip_list->num_rows() > 0) {
               $row = $trip_list->row();
               $customer_id = $row->id;
               $customer_name = $row->user_fullname;
               $customer_phone = $row->phone;
               $customer_email = $row->email;
            }
           $bookdata = array('trip_book_payid' => $trip_book_payid,'pnr_no' => $book_pay['pnr_no'],'trip_id' => $bookdata['trip_id'],
               'customer_id' => $customer_id,'customer_name' => $customer_name,'customer_phone' => $customer_phone,'customer_email' => $customer_email);
           if($trip_book_payid){
                return $bookdata;
           }
            
        }
        $result = array('is_open' => 0, 'message' =>'Sorry! try again...', 'from_date' => '','to_date' => '');
        return $result;
        
        }
}



/**
 * book the trip
  input: array(
  'payment_type' => payment type, // 1 - Pendding, 2- booked, 3 - cancelled
  'payment_status' =>  payment status, // 1 - net, 2 - credit, 3 - debit
  'status' =>  status) //0 - Pendding,1 - sucess,2 - failed
 * @return 
 * @author Anjaneya
 * */
if (!function_exists('trip_book_status_update')) {

    function trip_book_status_update($updatedata = array(), $pnr_no = '') {
        // TODO: mail sent to customer and vendor
        // TODO: my_transaction when success payment

        $CI = & get_instance();
        $loginuserid = $CI->session->userdata('user_id');
        if (count($updatedata) > 3 || count($updatedata) < 1 || $pnr_no == '') {
            return FALSE;
        }
        if ((isset($updatedata['payment_type']) || isset($updatedata['payment_status']) || isset($updatedata['status'])) && $pnr_no != '') {

            $whereData = array('pnr_no' => $pnr_no);
            $result = updateTable('trip_book_pay_details', $whereData, $updatedata);

            $whereData = array('pnr_no' => $pnr_no);
            $result = updateTable('trip_book_pay', $whereData, $updatedata);
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
 * @return 
 * @author Anjaneya
 * */
if (!function_exists('getpnrinfo')) {

    function getpnrinfo($pnr_no = '', $phoneno = '') {
        // TODO: mail sent to customer and vendor
        $CI = & get_instance();
        $loginuserid = $CI->session->userdata('user_id');
        if ($pnr_no == '') {
            return FALSE;
        }
        $book_pay = array();
        if ($CI->session->userdata('user_type') == 'VA') {
            $whereData = array('tpd.isactive' => 1, 'tpd.pnr_no' => $pnr_no, 'tpd.user_id' => $loginuserid);
            if($phoneno!=''){ $whereData['bum.phone']=$phoneno; }
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
            );
            $columns = 'tpd.pnr_no,tpd.number_of_persons,tpd.price_to_adult,tpd.price_to_child,tpd.price_to_infan,tpd.subtotal_trip_price,tpd.offer_amt,tpd.gst_amt,tpd.round_off,tpd.net_price,'
                    . 'tpd.total_trip_price,tpd.date_of_trip,tpd.time_of_trip,tpd.pick_up_location,tpd.pick_up_location_landmark,'
                    . 'tm.id AS trip_id,tm.trip_name,tm.trip_code,tm.how_many_days,tm.how_many_nights,tm.total_days,tm.how_many_hours,'
                    . 'tm.brief_description,tm.other_inclusions,tm.exclusions,tm.languages,tm.meal,tm.cancellation_policy,tm.confirmation_policy,tm.refund_policy,'
                    . 'bum.user_fullname AS bookedby,bum.phone AS bookedby_contactno,bum.email AS bookedby_contactemail,tpd.booked_on,tpd.status,tpd.payment_status,'
                    . 'tmum.user_fullname AS trip_postby,tmum.phone AS trip_contactno,tmum.email AS trip_contactemail,tm.trip_name,';
            $tableData = get_joins('trip_book_pay_details AS tpd', $columns, $joins, $whereData);
            if ($tableData->num_rows() > 0) {
                $book_pay = $tableData->result_array();
                $book_pay[0]['date_of_trip']=formatdate($book_pay[0]['date_of_trip'], $format = 'd M Y');
                $book_pay[0]['time_of_trip']=formatdate($book_pay[0]['time_of_trip'], $format = 'h:i A');
                $book_pay[0]['booked_on']=formatdate($book_pay[0]['booked_on'], $format = 'd M Y h:i A');
                $book_pay[0]['gst_percentage']=GST_PERCENTAGE;
                return $book_pay;
            }
        }

        if (count($book_pay) < 1) {
            $whereData = array('tpd.isactive' => 1, 'tpd.pnr_no' => $pnr_no);
            if($phoneno!=''){ $whereData['bum.phone']=$phoneno; }
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
            );
            $columns = 'tpd.pnr_no,tpd.number_of_persons,tpd.price_to_adult,tpd.price_to_child,tpd.price_to_infan,tpd.subtotal_trip_price,tpd.offer_amt,tpd.gst_amt,tpd.round_off,tpd.net_price,'
                    . 'tpd.total_trip_price,tpd.date_of_trip,tpd.time_of_trip,tpd.pick_up_location,tpd.pick_up_location_landmark,'
                    . 'tm.id AS trip_id,tm.trip_name,tm.trip_code,tm.how_many_days,tm.how_many_nights,tm.total_days,tm.how_many_hours,'
                    . 'tm.brief_description,tm.other_inclusions,tm.exclusions,tm.languages,tm.meal,tm.cancellation_policy,tm.confirmation_policy,tm.refund_policy,'
                    . 'bum.user_fullname AS bookedby,bum.phone AS bookedby_contactno,bum.email AS bookedby_contactemail,tpd.booked_on,tpd.status,tpd.payment_status,'
                    . 'tmum.user_fullname AS trip_postby,tmum.phone AS trip_contactno,tmum.email AS trip_contactemail,tm.trip_name,';
            $tableData = get_joins('trip_book_pay AS tpd', $columns, $joins, $whereData);
            if ($tableData->num_rows() > 0) {
                $book_pay = $tableData->result_array();
                $book_pay[0]['date_of_trip']=formatdate($book_pay[0]['date_of_trip'], $format = 'd M Y');
                $book_pay[0]['time_of_trip']=formatdate($book_pay[0]['time_of_trip'], $format = 'h:i A');
                $book_pay[0]['booked_on']=formatdate($book_pay[0]['booked_on'], $format = 'd M Y h:i A');
                $book_pay[0]['gst_percentage']=GST_PERCENTAGE;
                return $book_pay;
            }
        }
        return FALSE;
    }

}

/**
 * book the trip
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
            return FALSE;
        }
        $returntripid[] = $tripid;
        while ($tripid > 0) {
            $whereData = array('isactive' => 1, 'id' => $tripid);
            $trip_list = selectTable('trip_master', $whereData);
            if ($trip_list->num_rows() > 0) {
                $row = $trip_list->row();
                $returntripid[] = $row->parent_trip_id;
                $tripid = $row->parent_trip_id;
            }
        }
        return $returntripid;
    }

}
/* End of file custom_helper.php */
?>