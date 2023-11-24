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
$route['orders/payment/(:num)']='OrderHistory/payOrder/$1';
$route['orders/cancel/(:num)']='OrderHistory/cancelOrder/$1';
$route['faq']='Faq';
$route['notification']='Notification';

//admin routes
$route['dashboard']='Dashboard';
//mrp routes
$route['mrp']='MRP';
$route['mrp/given']='MRP/given';
$route['mrp/expected']='MRP/expected';
$route['mrp/requirements']='MRP/requirements';
$route['mrp/bom']='MRP/createBOM';
$route['mrp/schedule']='MRP/schedule';
$route['mrp/mrpsuccess']='MRP/createMRP';
//inventory routes
$route['inventory/page/(:num)']='Inventory/index/$1'; //done
$route['inventory/add']='Inventory/addInventory'; //done
$route['inventory/remove/id/(:num)']='Inventory/removeInventory/$1'; //done
$route['inventory/edit/id/(:num)']='Inventory/editItem/$1'; //done
$route['inventory/sortby/(:any)/(:num)']='Inventory/sortBy/$1/$2'; //done
$route['inventory/search/(:any)/(:num)']='Inventory/search/$1/$2'; //done
$route['inventory/filter/(:any)/(:num)']='Inventory/levelFilter/$1/$2'; //done
//product routes
$route['products/page/(:num)']="Products/index/$1"; //done
$route['products/add']="Products/addProduct"; //done
$route['products/remove/id/(:num)']='Products/removeProduct/$1';
$route['products/edit/id/(:num)']='Products/editProduct/$1';//done
$route['products/sortby/(:any)/(:num)']='Products/sortBy/$1/$2'; //done
$route['products/search/(:any)/(:num)']='Products/search/$1/$2';//done
$route['products/filter/(:any)/(:num)']='Products/statusFilter/$1/$2';//done
//order routes
$route['order/page/(:num)']="Orders/index/$1";//done
$route['order/read/id/(:num)']='Orders/readReceipt/$1'; 
$route['order/complete/id/(:num)']='Orders/completeOrder/$1';
$route['order/cancel/id/(:num)']='Orders/cancelOrder/$1';
$route['order/sortby/(:any)/(:num)']='Orders/sortBy/$1/$2';//done
$route['order/search/(:any)/(:num)']='Orders/search/$1/$2';//done
$route['order/filter/(:any)/(:num)']='Orders/statusFilter/$1/$2';//done 
//user routes
$route['users/page/(:num)']="Users/index/$1";//done
$route['users/remove/id/(:num)']='Users/removeUser/$1';//done
$route['users/edit/id/(:num)']='Users/editUser/$1';//done
$route['users/sortby/(:any)/(:num)']='Users/sortBy/$1/$2';//done
$route['users/search/(:any)/(:num)']='Users/search/$1/$2'; //done
$route['users/filter/(:any)/(:num)']='Users/roleFilter/$1/$2'; //done
$route['alerts']="Alerts";

//logout
$route['logout/user']='Logout/logOutUser';
$route['logout/admin']='Logout/logOutAdmin';