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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller']='Landing';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//user routes
$route['login']='Login';
$route['landing']='Landing';
$route['register']='Register';
$route['checkout']='Checkout';
$route['account']='EditProfile';
$route['account/update']='EditProfile/updateAccount';
$route['account/update/password']='EditProfile/updatePassword';
$route['account/update/avatar']='EditProfile/updateProfilePic';
$route['checkout']='Checkout';
$route['checkout/order/user']='Checkout/placeOrderUser';
$route['checkout/order']='Checkout/placeOrder';
$route['orders']='OrderHistory';
$route['orders/id/(:num)']='OrderHistory/searchById/$1';
$route['orders/date/(:any)/(:any)']='OrderHistory/searchByDate/$1/$2';
$route['orders/payment']='OrderHistory/payOrder';
$route['faq']='Faq';

//admin routes
$route['dashboard']='Dashboard';
$route['mrp']='MRP';
$route['inventory/page/(:num)']='Inventory/index/$1';
$route['inventory/add']='Inventory/addInventory';
$route['inventory/remove/id/(:num)']='Inventory/removeInventory/$1';
$route['inventory/edit/id/(:num)']='Inventory/editItem/$1';
$route['inventory/sortby/(:any)/(:num)']='Inventory/sortBy/$1/$2';
$route['inventory/search/(:any)/(:num)']='Inventory/search/$1/$2';
$route['inventory/filter/(:any)/(:num)']='Inventory/levelFilter/$1/$2';
$route['products/page/(:num)']="Products/index/$1";
$route['order/page/(:num)']="Orders/index/$1";
$route['users/page/(:num)']="Users/index/$1";
$route['alerts']="Alerts";

//logout
$route['logout']='Logout';