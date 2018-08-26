<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



$route['logout'] = 'Loginview/logout';

//Api
$route['gmail'] = 'api/gmail';
$route['fb'] = 'api/fb';

$route['update-profile'] = 'Loginview/update_profile';
$route['my-profile'] = 'Loginview/profile';
$route['account-details'] = 'Loginview/account_details';
$route['change-password'] = 'Loginview/change_password';
$route['my-post'] = 'Loginview/my_post';
$route['booking-history'] = 'Loginview/booking_history';
$route['my-wishlist'] = 'Loginview/my_wish_list';

//common to All
$route['about-us'] = 'welcome/about_us';
$route['contact-us'] = 'welcome/contact_us';
$route['contact/add'] = 'welcome/contact_add';

//$route['faq'] = 'welcome/faq';

$route['faq'] = 'welcome/faq_list';
$route['faq/add'] = 'welcome/faq_add';
$route['faq/edit/(:num)'] = 'welcome/faq_edit/$1';
$route['faq/delete/(:num)'] = 'welcome/faq_delete/$1';



//PNR STATUS
$route['PNR-status/(:any)/(:num)'] = 'pnr_status/pnr_status_check/$1/$2';
$route['PNR-status/(:any)'] = 'pnr_status/pnr_status_check/$1';
$route['PNR-status'] = 'pnr_status/pnr_status_check';
$route['PNR-status-report/(:any)'] = 'pnr_status/pnr_status_report/$1';


//PNR STATUS
$route['withdrawals-request'] = 'request/withdrawals_request';


$route['booking-list'] = 'report/booking_wise_reports';
$route['cancellation-list'] = 'report/cancellation_reports';
//report 
$route['booking-wise-reports'] = 'report/booking_wise_reports';
$route['Trip-wise-reports'] = 'report/Trip_wise_reports';
$route['payment-from-B2C-reports'] = 'report/payment_from_B2C_reports';
$route['payment-from-B2B-reports'] = 'report/payment_from_B2B_reports';
$route['payment-to-B2B-reports'] = 'report/payment_to_B2B_reports';
$route['cancellation-reports'] = 'report/cancellation_reports';
$route['my-transaction-reports'] = 'report/my_transaction_reports';


//Master to admin
$route['category-master/add'] = 'master/category_add';
$route['category-master/loadmodal/(:any)'] = 'master/loadmodal/$1';
$route['category-master/edit'] = 'master/category_edit';
$route['category-master/save-edit'] = 'master/category_save_edit';
$route['category-master/delete/(:num)'] = 'master/category_delete/$1';
$route['category-master/active/(:num)'] = 'master/category_active/$1';
$route['category-master/(:any)'] = 'master/category_list/$1';
$route['category-master'] = 'master/category_list';


//Master to admin
$route['tag-master/add'] = 'tag/tag_add';
$route['tag-master/loadmodal/(:any)'] = 'tag/loadmodal/$1';
$route['tag-master/edit'] = 'tag/tag_edit';
$route['tag-master/save-edit'] = 'tag/tag_save_edit';
$route['tag-master/delete/(:num)'] = 'tag/tag_delete/$1';
$route['tag-master/active/(:num)'] = 'tag/tag_active/$1';
$route['tag-master/(:any)'] = 'tag/tag_list/$1';
$route['tag-master'] = 'tag/tag_list';


//Master to admin
$route['city-master/add'] = 'city/city_add';
$route['city-master/loadmodal/(:any)'] = 'city/loadmodal/$1';
$route['city-master/edit'] = 'city/city_edit';
$route['city-master/save-edit'] = 'city/city_save_edit';
$route['city-master/delete/(:num)'] = 'city/city_delete/$1';
$route['city-master/active/(:num)'] = 'city/city_active/$1';
$route['city-master/(:any)'] = 'city/city_list/$1';
$route['city-master'] = 'city/city_list';


//Master to admin
$route['trip-inclusions-master/add'] = 'Tripinclusions/trip_add';
$route['trip-inclusions-master/loadmodal/(:any)'] = 'Tripinclusions/loadmodal/$1';
$route['trip-inclusions-master/edit'] = 'Tripinclusions/trip_edit';
$route['trip-inclusions-master/save-edit'] = 'Tripinclusions/trip_save_edit';
$route['trip-inclusions-master/delete/(:num)'] = 'Tripinclusions/trip_delete/$1';
$route['trip-inclusions-master/active/(:num)'] = 'Tripinclusions/trip_active/$1';
$route['trip-inclusions-master/(:any)'] = 'Tripinclusions/trip_list/$1';
$route['trip-inclusions-master'] = 'Tripinclusions/trip_list';

//Master to admin
$route['trip-specific/add'] = 'tripspecific/trip-specific_add';
$route['trip-specific/loadmodal/(:any)'] = 'tripspecific/loadmodal/$1';
$route['trip-specific/edit'] = 'tripspecific/trip_edit';
$route['trip-specific/save-edit'] = 'tripspecific/trip_save_edit';
$route['trip-specific/delete/(:num)'] = 'tripspecific/trip_delete/$1';
$route['trip-specific/active/(:num)'] = 'tripspecific/trip_active/$1';
$route['trip-specific/(:any)'] = 'tripspecific/trip_list/$1';
$route['trip-specific'] = 'tripspecific/trip_list';



//Master to admin
$route['state-master/add'] = 'state/state_add';
$route['state-master/loadmodal/(:any)'] = 'state/loadmodal/$1';
$route['state-master/edit'] = 'state/state_edit';
$route['state-master/save-edit'] = 'state/state_save_edit';
$route['state-master/delete/(:num)'] = 'state/state_delete/$1';
$route['state-master/active/(:num)'] = 'state/state_active/$1';
$route['state-master/(:any)'] = 'state/state_list/$1';
$route['state-master'] = 'state/state_list';


//coupon-code-master
$route['coupon-code-master/add'] = 'master/coupon_code_add';
$route['couponcodeaddmaster'] = 'master/couponcodeaddmaster';
$route['coupon-code-master/edit'] = 'master/coupon_code_edit';
$route['coupon-code-master/save-edit'] = 'master/coupon_code_save_edit';
$route['coupon-code-master/(:any)'] = 'master/coupon_code_list/$1';
$route['coupon-code-master'] = 'master/coupon_code_list';
$route['couponcode_vaildation'] = 'master/couponcode_vaildation';
$route['coupon-code-master/delete/(:num)'] = 'master/coupon_code_delete/$1';
$route['coupon-code-master/active/(:num)'] = 'master/coupon_code_active/$1';

//triplist vender
$route['triplist/loadmodal/(:any)'] = 'triplist/loadmodal/$1';
$route['triplist/delete/(:num)'] = 'triplist/trip_delete/$1';
$route['triplist/active/(:num)'] = 'triplist/trip_active/$1';
$route['triplist/(:any)'] = 'triplist/trip_list/$1';
$route['triplist'] = 'triplist/trip_list';


//Trip
$route['make-new-trip/(:num)'] = 'trips/make_new_trip/$1';
$route['make-new-trip'] = 'trips/make_new_trip';
$route['edit-trip'] = 'trips/edit_trip';
$route['getalltags'] = 'trips/getalltags';


$route['trip-list'] = 'trips/trip_list';
$route['trip-calendar-view'] = 'trips/trip_calendar_view';
$route['trip-view/(:any)'] = 'trips/trip_view/$1';

$route['trip-book/(:any)'] = 'TripBookings/book_summary/$1';
$route['trip-proceed/(:any)'] = 'TripBookings/book_proceed/$1';
$route['tripbook-done/(:any)'] = 'TripBookings/book_done/$1';
