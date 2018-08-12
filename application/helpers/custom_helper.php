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
        if (trim($image) != "" && file_exists(YH_UPLOAD_PATH . "profile/$image")) {
            return YH_MEDIA_PATH . "profile/$image";
        } else {
            return YH_MEDIA_PATH . "profile/thumbnail/noprofile.png";
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
        $whereData = array('pnr_no'=>$PNR);
        $trip_list = selectTable('trip_book_pay', $whereData);
        if ($trip_list->num_rows() >0) {
            return TRUE;
        }
        return FALSE;
    }

}
if (!function_exists('createPNR')) {

    function createPNR() {
        $CI = & get_instance();
        $CI->load->helper('string');
        $PNR_length=6;$PNR_numlength=2;
        $PNR = 'PNR'.random_string('numeric', $PNR_numlength).  strtoupper(random_string('alnum', $PNR_length));
        while (does_pnr_exist($PNR)) {
            $PNR = 'PNR'.random_string('numeric', $PNR_numlength).  strtoupper(random_string('alnum', $PNR_length));
        }
        return $PNR;
    }

}
/**
 * book the trip
 input: 'trip_id' => trip id,
        'login_user_id' => login user_id,
 *      'ischeckadmin' => 0, // if 0 check super admin offer
        'date_of_trip' => date of trip,
 * @return 
 * @author Anjaneya
 * */
if (!function_exists('trip_offer')) {

    function trip_offer($offerdata = array()) {
        // TODO: mail sent to customer and vendor
        
        $CI = & get_instance();
        $loginuserid = $CI->session->userdata('user_id');
        if (count($offerdata) != 4 || $loginuserid == '') {
            return FALSE;
        }
        $date_of_trip = formatdate($offerdata['date_of_trip'], $format = 'Y-m-d');
        $login_user_id = $offerdata['login_user_id'];
        $ischeckadmin = $offerdata['ischeckadmin'];
        $trip_id = $offerdata['trip_id'];
        
        $whereData = array('isactive' => 1, 'id'=>$trip_id);
        $trip_list = selectTable('trip_master', $whereData);
        if ($trip_list->num_rows() > 0) {
            $row = $trip_list->row();
            $price_to_adult = $row->price_to_adult;$price_to_child = $row->price_to_child;
            $price_to_infan = $row->price_to_infan;
            
            // Find discount price
            $discount_percentage=0;$discount_price=0;$coupon_history_id=0;
            $coupon_history_code='';$coupon_history_name='';$offer_type=0;$offer_type_name='';
            if ($CI->session->userdata('user_type') == 'CU') {// super admin coupon changes
                $whereData = array('category_id'=>$row->trip_category_id,'type' => 3, 'isactive' => 1, 'validity_from <='=>$date_of_trip, 'validity_to >='=>$date_of_trip);
                $couponhistory_list = selectTable('coupon_code_master_history', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC');
                if ($couponhistory_list->num_rows() > 0 && $ischeckadmin==0) { // coupon for CA from admin
                    $couponhistory = $couponhistory_list->row();
                    $coupon_history_id=$couponhistory->id;
                    $coupon_history_code=$couponhistory->coupon_code;
                    $coupon_history_name=$couponhistory->coupon_name;
                    $offer_type=$couponhistory->offer_type;
                    $price_to_adult = $couponhistory->price_to_adult;$price_to_child = $couponhistory->price_to_child;
                    $price_to_infan = $couponhistory->price_to_infan;
                    if($offer_type==1){//fixed
                        $discount_price= $couponhistory->percentage_amount;
                    }
                    if($offer_type==2){//percentage
                        $discount_percentage=$couponhistory->percentage_amount;
                    }
                }else{// coupon for CA from vendor
                    $whereData = array('type' => 1, 'isactive' => 1, 'trip_id'=>$row->id, 'validity_from <='=>$date_of_trip, 'validity_to >='=>$date_of_trip);
                    $couponhistory_list = selectTable('coupon_code_master_history', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC');
                    if ($couponhistory_list->num_rows() > 0) {
                        $couponhistory = $couponhistory_list->row();
                        $coupon_history_id=$couponhistory->id;
                        $coupon_history_code=$couponhistory->coupon_code;
                        $coupon_history_name=$couponhistory->coupon_name;
                        $offer_type=$couponhistory->offer_type;
                        if($offer_type==1){//fixed
                            $discount_price= $couponhistory->percentage_amount;
                        }
                        if($offer_type==2){//percentage
                            $discount_percentage=$couponhistory->percentage_amount;
                        }
                    }
                }
            }else if ($CI->session->userdata('user_type') == 'VA') { //Vandor coupon  (office book)
                $whereData = array('type' => 2, 'isactive' => 1, 'trip_id'=>$row->id, 'validity_from <='=>$date_of_trip, 'validity_to >='=>$date_of_trip);
                    $couponhistory_list = selectTable('coupon_code_master_history', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC');
                    if ($couponhistory_list->num_rows() > 0) {
                        $couponhistory = $couponhistory_list->row();
                        $coupon_history_id=$couponhistory->id;
                        $coupon_history_code=$couponhistory->coupon_code;
                        $coupon_history_name=$couponhistory->coupon_name;
                        $offer_type=$couponhistory->offer_type;
                        if($offer_type==1){//fixed
                            $discount_price= $couponhistory->percentage_amount;
                        }
                        if($offer_type==2){//percentage
                            $discount_percentage=$couponhistory->percentage_amount;
                        }
                    }
            }
            // get offer
            if($offer_type==1){
                $offer_type_name = 'Fixed Amount';
            }
            if($offer_type==2){
                $offer_type_name = 'Percentage Amount';
            }
            if (strpos($discount_percentage, '.00') !== false) {
                $discount_percentage=round($discount_percentage);
            }
            $result=array('price_to_adult'=>$price_to_adult,'price_to_child'=>$price_to_child,
                'price_to_infan'=>$price_to_infan,'offer_type'=>$offer_type,'discount_price'=>$discount_price,'coupon_history_id'=>$coupon_history_id,
                'discount_percentage'=>$discount_percentage,'offer_type_name'=>$offer_type_name);
            return $result;
        }
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
        $is_shared = 0;$parent_trip_id = 0;
        $whereData = array('isactive' => 1, 'id'=>$bookdata['trip_id']);
        $trip_list = selectTable('trip_master', $whereData);
        if ($trip_list->num_rows() > 0) {
            $row = $trip_list->row();
            $is_shared = $row->is_shared;$parent_trip_id = $row->parent_trip_id;
            $trip_code = $row->trip_code;$trip_name = $row->trip_name;
            $price_to_adult = $row->price_to_adult;$price_to_child = $row->price_to_child;$price_to_infan = $row->price_to_infan;
            $time_of_trip='';$trip_location_name='';$trip_location_landmark='';
            $whereData = array('isactive' => 1, 'trip_id'=>$bookdata['trip_id'], 'id'=>$bookdata['pick_up_location_id']);
            $location_list = selectTable('pick_up_location_map', $whereData);
            if ($location_list->num_rows() > 0) {
                $location = $location_list->row();
                $time_of_trip=$location->time;
                $trip_location_name=$location->location;
                $trip_location_landmark=$location->landmark;
            }
            // Find discount price
            $discount_percentage=0;$discount_price=0;$offer_amt=0;$coupon_history_id=0;$number_of_persons=0;
            $coupon_history_code='';$coupon_history_name='';$offer_type=0;$offer_type_name='';
            if ($CI->session->userdata('user_type') == 'CU') {// super admin coupon changes
                $whereData = array('category_id'=>$row->trip_category_id,'type' => 3, 'isactive' => 1, 'validity_from <='=>$date_of_trip, 'validity_to >='=>$date_of_trip);
                $couponhistory_list = selectTable('coupon_code_master_history', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC');
                if ($couponhistory_list->num_rows() > 0) { // coupon for CA from admin
                    $couponhistory = $couponhistory_list->row();
                    $coupon_history_id=$couponhistory->id;
                    $coupon_history_code=$couponhistory->coupon_code;
                    $coupon_history_name=$couponhistory->coupon_name;
                    $offer_type=$couponhistory->offer_type;
                    $price_to_adult = $couponhistory->price_to_adult;$price_to_child = $couponhistory->price_to_child;
                    $price_to_infan = $couponhistory->price_to_infan;
                    if($offer_type==1){//fixed
                        $discount_price= $couponhistory->percentage_amount;
                    }
                    if($offer_type==2){//percentage
                        $discount_percentage=$couponhistory->percentage_amount;
                    }
                }else{// coupon for CA from vendor
                    $whereData = array('type' => 1, 'isactive' => 1, 'trip_id'=>$row->id, 'validity_from <='=>$date_of_trip, 'validity_to >='=>$date_of_trip);
                    $couponhistory_list = selectTable('coupon_code_master_history', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC');
                    if ($couponhistory_list->num_rows() > 0) {
                        $couponhistory = $couponhistory_list->row();
                        $coupon_history_id=$couponhistory->id;
                        $coupon_history_code=$couponhistory->coupon_code;
                        $coupon_history_name=$couponhistory->coupon_name;
                        $offer_type=$couponhistory->offer_type;
                        if($offer_type==1){//fixed
                            $discount_price= $couponhistory->percentage_amount;
                        }
                        if($offer_type==2){//percentage
                            $discount_percentage=$couponhistory->percentage_amount;
                        }
                    }
                }
            }else if ($CI->session->userdata('user_type') == 'VA') { //Vandor coupon  (office book)
                $whereData = array('type' => 2, 'isactive' => 1, 'trip_id'=>$row->id, 'validity_from <='=>$date_of_trip, 'validity_to >='=>$date_of_trip);
                    $couponhistory_list = selectTable('coupon_code_master_history', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC');
                    if ($couponhistory_list->num_rows() > 0) {
                        $couponhistory = $couponhistory_list->row();
                        $coupon_history_id=$couponhistory->id;
                        $coupon_history_code=$couponhistory->coupon_code;
                        $coupon_history_name=$couponhistory->coupon_name;
                        $offer_type=$couponhistory->offer_type;
                        if($offer_type==1){//fixed
                            $discount_price= $couponhistory->percentage_amount;
                        }
                        if($offer_type==2){//percentage
                            $discount_percentage=$couponhistory->percentage_amount;
                        }
                    }
            }
            // cost for trip member
            $number_of_persons= (int)$bookdata['no_of_adult']+(int)$bookdata['no_of_child']+(int)$bookdata['no_of_infan'];
            $total_adult_price = $bookdata['no_of_adult']*$price_to_adult;
            $total_child_price = $bookdata['no_of_child']*$price_to_child;
            $total_infan_price = $bookdata['no_of_infan']*$price_to_infan;
            $subtotal_trip_price = (int)$total_adult_price+(int)$total_child_price+(int)$total_infan_price;
            // get offer
            if($offer_type==1){
                $offer_amt = $discount_price;
            }
            if($offer_type==2 && $discount_percentage!='0.00'){
                if ($offer_type==2 && strpos($discount_percentage, '.00') !== false) {
                    $discount_percentage=round($discount_percentage);
                }
                $offer_amt = (int)$subtotal_trip_price*((int)$discount_percentage/100);
            }
            $total_trip_price=(int)$subtotal_trip_price-(int)$offer_amt;
            //Find GST
            $gst_percentage = GST_PERCENTAGE;
            $gst_amt = $total_trip_price * (GST_PERCENTAGE/100);
            $round_off = round($total_trip_price+$gst_amt)-($total_trip_price+$gst_amt);
            $net_price = $total_trip_price+$gst_amt+$round_off;
            $pnr_no = createPNR();
            // insert for customer
            $book_pay = array(
                'parent_trip_id' => $parent_trip_id,
                'trip_id' => $bookdata['trip_id'],
                'user_id' => $bookdata['book_user_id'],// customer user
                'pnr_no' => $pnr_no,
                'price_to_adult' => $price_to_adult,
                'price_to_child' => $price_to_child,
                'price_to_infan' => $price_to_infan,
                'number_of_persons' => $number_of_persons,
                'no_of_adult' => $bookdata['no_of_adult'],
                'no_of_child' => $bookdata['no_of_child'],
                'no_of_infan' => $bookdata['no_of_infan'],
                'total_adult_price' => $total_adult_price,
                'total_child_price' => $total_child_price,
                'total_infan_price' => $total_infan_price,
                'subtotal_trip_price' => $subtotal_trip_price,
                'coupon_history_id' => $coupon_history_id,
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
           $trip_book_payid = 1;$pnr_no = 'PNR24AMTFSE';//insertTable('trip_book_pay', $book_pay);
            echo '<br><br>'; print_r($book_pay);
           if($trip_book_payid){
               if ($CI->session->userdata('user_type') == 'CU') {// super admin coupon changes
                $whereData = array('category_id'=>$row->trip_category_id,'type' => 3, 'isactive' => 1, 'validity_from <='=>date('Y-m-d'), 'validity_to >='=>date('Y-m-d'));
                $couponhistory_list = selectTable('coupon_code_master_history', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC');
                if ($couponhistory_list->num_rows() > 0) { // coupon for CA from admin
                    $couponhistory = $couponhistory_list->row();
                    
                    $discount_percentage=0;$discount_price=0;$offer_amt=0;$coupon_history_id=0;
                    //check offer
                    $offerdata=array(
                    'trip_id' => $book_pay['trip_id'],
                    'login_user_id' => $book_pay['user_id'],
                    'date_of_trip' => $date_of_trip,
                    'ischeckadmin' => 1);// check trip offer only 
                    $checkoffer = trip_offer($offerdata);
                    $offer_type=$checkoffer['offer_type'];
                    $coupon_history_id=$checkoffer['coupon_history_id'];
                    if($offer_type==1){//fixed
                        $discount_price= $checkoffer['discount_price'];
                    }
                    if($offer_type==2){//percentage
                        $discount_percentage=$checkoffer['discount_percentage'];
                    }
                    echo '<br><br>'; print_r($checkoffer);
                    $book_pay_detailsid=0;
                    $whereData = array('isactive' => 1, 'id'=>$book_pay['trip_id']);
                    $trip_list = selectTable('trip_master', $whereData);
                    if ($trip_list->num_rows() > 0) {
                        $row = $trip_list->row();
                        $price_to_adult = $row->price_to_adult;$price_to_child = $row->price_to_child;$price_to_infan = $row->price_to_infan;
                        $is_shared = $row->is_shared;$parent_trip_id = $row->parent_trip_id;
            
                        // cost for trip member
                        $number_of_persons= $book_pay['number_of_persons'];
                        $total_adult_price = $book_pay['no_of_adult']*$price_to_adult;
                        $total_child_price = $book_pay['no_of_child']*$price_to_child;
                        $total_infan_price = $book_pay['no_of_infan']*$price_to_infan;
                        $subtotal_trip_price = (int)$total_adult_price+(int)$total_child_price+(int)$total_infan_price;
                        // get offer
                        if($offer_type==1){
                            $offer_amt = $discount_price;
                        }
                        if($offer_type==2 && $discount_percentage!='0.00'){
                            if ($offer_type==2 && strpos($discount_percentage, '.00') !== false) {
                                $discount_percentage=round($discount_percentage);
                            }
                            $offer_amt = (int)$subtotal_trip_price*((int)$discount_percentage/100);
                        }
                        $total_trip_price=(int)$subtotal_trip_price-(int)$offer_amt;
                        //Find GST
//                        $gst_percentage = GST_PERCENTAGE;
//                        $gst_amt = $total_trip_price * (GST_PERCENTAGE/100);
//                        $round_off = round($total_trip_price+$gst_amt)-($total_trip_price+$gst_amt);
                        //$net_price = $total_trip_price+$gst_amt+$round_off;
                        $vendor_amt = $total_trip_price;
                        $your_amt=(int)$book_pay['total_trip_price'] - (int)$vendor_amt;
                        $servicecharge_amt = $your_amt * (SERVICECHARGE_PERCENTAGE/100); 
                        if($servicecharge_amt<SERVICECHARGE_AMT){// get max amt
                            $servicecharge_amt =SERVICECHARGE_AMT;
                        }
                        $gst_amt = $your_amt * (GST_PERCENTAGE/100);
                        $your_final_amt_temp = $your_amt+$gst_amt-$servicecharge_amt;
                        $round_off = round($your_final_amt_temp)-($your_final_amt_temp);
                        $your_final_amt = $round_off+$your_final_amt_temp;
            
//                        $your_final_amt_temp = $your_amt-$servicecharge_amt+$gst_amt;
//                        $round_off = round($book_pay['total_trip_price']+$gst_amt,2)-($book_pay['total_trip_price']+$gst_amt);
//                        $net_price = $book_pay['total_trip_price']+$gst_amt+$round_off;
//                        $your_final_amt = $your_amt-$servicecharge_amt+$gst_amt;
                        $book_pay_details = array(
                            'book_pay_id' => $trip_book_payid,
                            'parent_trip_id' => $parent_trip_id,
                            'trip_id' => $book_pay['trip_id'],
                            'from_user_id' => $bookdata['book_user_id'],
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
                        //$book_pay_detailsid = insertTable('trip_book_pay_details', $book_pay_details);
                        echo '<br><br>'; print_r($book_pay_details);
                    } 
                }
               }
               $book_pay_detailsid =1;//
               $bookdata = array('trip_book_payid' => $trip_book_payid,'pnr_no' => $pnr_no,'trip_id' => $bookdata['trip_id'],
                   'book_pay_detailsid' => $book_pay_detailsid);
               //trip_book_details(book_pay);
               if(trip_book_details($bookdata)){
                    return $pnr_no;
               }
           }
        }
        return FALSE;
    }

}
/**
 * book the trip
 input: array(
        'trip_book_payid' => trip book payid,
        'pnr_no' =>  pnr number,
        'trip_id' =>  trip id,
        'book_pay_detailsid' =>  book pay details id)
 * @return 
 * @author Anjaneya
 * */
if (!function_exists('trip_book_details')) {

    function trip_book_details($bookdata = array()) {
        // TODO: mail sent to customer and vendor
        
        $CI = & get_instance();
        $loginuserid = $CI->session->userdata('user_id');
        if (count($bookdata) != 4 || $loginuserid == '') {
            return FALSE;
        }
        $trip_book_payid = $bookdata['trip_book_payid'];
        // ini veriable
        //prev ini veriable
        $is_shared = 0;$parent_trip_id = 0; 
        $no_of_adult = 0;$no_of_child = 0;$no_of_infan = 0;$number_of_persons= 0;$user_id= 0;
        $from_user_id=0;$userid=0;$booked_user_id=0;$date_of_trip='';
        //current ini veriable
        $price_to_adult = 0;$price_to_child = 0;
        $price_to_infan = 0;$total_adult_price = 0;$total_child_price = 0;$total_infan_price = 0;
        $subtotal_trip_price = 0;$total_trip_price = 0;$coupon_history_id = 0;
        $discount_percentage=0;$discount_price=0;$offer_amt=0;
        $round_off=0;$net_price=0;
        
        // next ini veriable
        $your_final_amt=0; $next_total_trip_price=0;
        
        $whereData = array('isactive' => 1, 'id'=>$bookdata['trip_book_payid'], 'pnr_no'=>$bookdata['pnr_no']);
        $book_pay_list = selectTable('trip_book_pay', $whereData);
        if ($book_pay_list->num_rows() > 0) {
            $book_pay = $book_pay_list->row();   
            $no_of_adult = $book_pay->no_of_adult;$no_of_child = $book_pay->no_of_child;$no_of_infan = $book_pay->no_of_infan;
            $number_of_persons= $book_pay->number_of_persons;
            $from_user_id= $book_pay->user_id;$date_of_trip= $book_pay->date_of_trip;$booked_user_id= $book_pay->booked_by;
            $time_of_trip= $book_pay->time_of_trip;$pick_up_location_id= $book_pay->pick_up_location_id;
            $pick_up_location= $book_pay->pick_up_location;$pick_up_location_landmark= $book_pay->pick_up_location_landmark;
        }
        if($bookdata['book_pay_detailsid']>0){
            $whereData = array('isactive' => 1, 'id'=>$bookdata['book_pay_detailsid'], 'pnr_no'=>$bookdata['pnr_no']);
            $pay_details_list = selectTable('trip_book_pay_details', $whereData);
            if ($pay_details_list->num_rows() > 0) {
                $book_pay = $pay_details_list->row();   
                $no_of_adult = $book_pay->no_of_adult;$no_of_child = $book_pay->no_of_child;$no_of_infan = $book_pay->no_of_infan;
                $number_of_persons= $book_pay->number_of_persons;
                if($book_pay->user_id>0){
                    $from_user_id= $book_pay->user_id;
                }
                
            }
        }
        //find vendor coupon or Customer coupon
        $isendudertrip=1;
        $whereData = array('isactive' => 1, 'pnr_no'=>$bookdata['pnr_no']);
        $pay_details_list = selectTable('trip_book_pay_details', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC');
        if ($pay_details_list->num_rows() > 0) {
                $book_pay = $pay_details_list->row();   
            if ($book_pay->user_id!=0) {
                $isendudertrip=0;
            }
        }
        $whereData = array('isactive' => 1, 'id'=>$bookdata['trip_id']);
        $trip_list = selectTable('trip_master', $whereData);
        if ($trip_list->num_rows() > 0) {
            $row = $trip_list->row();
            $price_to_adult = $row->price_to_adult;$price_to_child = $row->price_to_child;$price_to_infan = $row->price_to_infan;
            $is_shared = $row->is_shared;$parent_trip_id = $row->parent_trip_id;$user_id = $row->user_id;

            // cost for trip member
            $number_of_persons= $number_of_persons;
            $total_adult_price = $no_of_adult*$price_to_adult;
            $total_child_price = $no_of_child*$price_to_child;
            $total_infan_price = $no_of_infan*$price_to_infan;
            $subtotal_trip_price = (int)$total_adult_price+(int)$total_child_price+(int)$total_infan_price;
            // get offer
            if ($CI->session->userdata('user_type') == 'CU' && $isendudertrip==1) {// customer coupon for end leavel user
                // coupon for CA from vendor
                    $whereData = array('type' => 1, 'isactive' => 1, 'trip_id'=>$bookdata['trip_id'], 'validity_from <='=>$date_of_trip, 'validity_to >='=>$date_of_trip);
                    $couponhistory_list = selectTable('coupon_code_master_history', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC');
                    if ($couponhistory_list->num_rows() > 0) {
                        $couponhistory = $couponhistory_list->row();
                        $coupon_history_id=$couponhistory->id;
                        $coupon_history_code=$couponhistory->coupon_code;
                        $coupon_history_name=$couponhistory->coupon_name;
                        $offer_type=$couponhistory->offer_type;
                        if($offer_type==1){//fixed
                            $discount_price= $couponhistory->percentage_amount;
                        }
                        if($offer_type==2){//percentage
                            $discount_percentage=$couponhistory->percentage_amount;
                        }
                    }
            }else { //Vandor coupon  (office book)
                $whereData = array('type' => 2, 'isactive' => 1, 'trip_id'=>$bookdata['trip_id'], 'validity_from <='=>$date_of_trip, 'validity_to >='=>$date_of_trip);
                    $couponhistory_list = selectTable('coupon_code_master_history', $whereData, $showField = array('*'), $orWhereData = array(), $group = array(), $order = 'id DESC');
                    if ($couponhistory_list->num_rows() > 0) {
                        $couponhistory = $couponhistory_list->row();
                        $coupon_history_id=$couponhistory->id;
                        $coupon_history_code=$couponhistory->coupon_code;
                        $coupon_history_name=$couponhistory->coupon_name;
                        $offer_type=$couponhistory->offer_type;
                        if($offer_type==1){//fixed
                            $discount_price= $couponhistory->percentage_amount;
                        }
                        if($offer_type==2){//percentage
                            $discount_percentage=$couponhistory->percentage_amount;
                        }
                    }
            }
            if($offer_type==1){
                $offer_amt = $discount_price;
            }
            if($offer_type==2 && $discount_percentage!='0.00'){
                if ($offer_type==2 && strpos($discount_percentage, '.00') !== false) {
                    $discount_percentage=round($discount_percentage);
                }
                $offer_amt = (int)$subtotal_trip_price*((int)$discount_percentage/100);
            }
            $total_trip_price=(int)$subtotal_trip_price-(int)$offer_amt;
            
            
            /////////////////////////// parent user amt find
            if($parent_trip_id==0){
                $vendor_amt=0;
            }else{
                
            }
            
            ////////////////////////////////
            //Find GST
            $your_amt=(int)$total_trip_price - (int)$vendor_amt;
            $servicecharge_amt = $your_amt * (SERVICECHARGE_PERCENTAGE/100); 
            if($servicecharge_amt<SERVICECHARGE_AMT){// get max amt
                $servicecharge_amt =SERVICECHARGE_AMT;
            }
            $gst_percentage = GST_PERCENTAGE;
            $gst_amt = $your_amt * (GST_PERCENTAGE/100);
            $your_final_amt_temp = $your_amt+$gst_amt-$servicecharge_amt;
            $round_off = round($your_final_amt_temp)-($your_final_amt_temp);
            $your_final_amt = $round_off+$your_final_amt_temp;
            
            $book_pay_details = array(
                'book_pay_id' => $trip_book_payid,
                'parent_trip_id' => $parent_trip_id,
                'trip_id' => $bookdata['trip_id'],
                'from_user_id' => $from_user_id,
                'user_id' => $user_id,
                'pnr_no' => $bookdata['pnr_no'],
                'price_to_adult' => $price_to_adult,
                'price_to_child' => $price_to_child,
                'price_to_infan' => $price_to_infan,
                'number_of_persons' => $number_of_persons,
                'no_of_adult' => $no_of_adult,
                'no_of_child' => $no_of_child,
                'no_of_infan' => $no_of_infan,
                'total_adult_price' => $total_adult_price,
                'total_child_price' => $total_child_price,
                'total_infan_price' => $total_infan_price,
                'subtotal_trip_price' => $subtotal_trip_price,
                'coupon_history_id' => $coupon_history_id,
                'discount_price' => $discount_price,
                'discount_percentage' => $discount_percentage,
                'offer_amt' => $offer_amt,
                'total_trip_price' => $total_trip_price,
                'vendor_amt' => $vendor_amt,
                'your_amt' => $your_amt,
                'servicecharge_amt' => $servicecharge_amt,
                'gst_percentage' => GST_PERCENTAGE,
                'gst_amt' => $gst_amt,
                'your_final_amt' => $your_final_amt,
                'round_off' => number_format ($round_off,2),
                'date_of_trip' => $date_of_trip,
                'time_of_trip' => $time_of_trip,
                'pick_up_location_id' => $pick_up_location_id,
                'pick_up_location' => $pick_up_location,
                'pick_up_location_landmark' => $pick_up_location_landmark,
                'booked_by' => $loginuserid,
                'status' => 1,
                'payment_status' => 0
            );
            //$book_pay_detailsid = insertTable('trip_book_pay_details', $book_pay_details);
            echo '<br><br>'; print_r($book_pay_details);
        }  
           
        
        
            
         
        return FALSE;
    }

}
/* End of file custom_helper.php */
?>