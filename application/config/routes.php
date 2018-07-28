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
$route['faq'] = 'welcome/faq';

//Master to admin
$route['category-master'] = 'master/category_list';
$route['category-master/add'] = 'master/category_add';
$route['category-master/edit/(:num)'] = 'master/category_edit/$1';
$route['category-master/delete/(:num)'] = 'master/category_delete/$1';

//Master to admin
$route['tag-master'] = 'tag/tag_list';
$route['tag-master/add'] = 'tag/tag_add';
$route['tag-master/delete/(:num)'] = 'tag/tag_delete/$1';
$route['tag-master/active/(:num)'] = 'tag/tag_active/$1';

//Master to admin
$route['trip-inclusions-master'] = 'Tripinclusions/trip_list';
$route['trip-inclusions-master/delete/(:num)'] = 'Tripinclusions/trip_delete/$1';
$route['trip-inclusions-master/active/(:num)'] = 'Tripinclusions/trip_active/$1';

//Master to admin
$route['state-master'] = 'state/state_list';
$route['state-master/delete/(:num)'] = 'state/state_delete/$1';
$route['state-master/active/(:num)'] = 'state/state_active/$1';

//Master to admin
$route['city-master'] = 'city/city_list';
$route['city-master/delete/(:num)'] = 'city/city_delete/$1';
$route['city-master/active/(:num)'] = 'city/city_active/$1';



//Trip
$route['make-new-trip/(:num)'] = 'trips/make_new_trip/$1';
$route['make-new-trip'] = 'trips/make_new_trip';
$route['getalltags'] = 'trips/getalltags';
