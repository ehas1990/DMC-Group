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
$route['admin'] = 'admin/auth/index';
$route['admin/dashboard'] = 'admin/dashboard/index';
$route['admin/ChangePassword'] = 'admin/dashboard/changePassword';
$route['admin/BackendSettings/(:any)'] = 'admin/dashboard/Siteconfiguration/$1';

$route['admin/Settings/OrderStatus'] = 'admin/dashboard/OrderStatus';
$route['admin/Settings/EditRoleType/(:any)'] = 'admin/dashboard/EditRoleType/$1';
$route['admin/Settings/AddRoleType'] = 'admin/dashboard/AddRoleType';
$route['admin/Settings/ListRole'] = 'admin/dashboard/ListRole';
$route['admin/Settings/Dates'] = 'admin/dashboard/ListOutlet';

$route['admin/Settings/EditProjectType/(:any)'] = 'admin/dashboard/EditProjectType/$1';
$route['admin/Settings/AddProjectType'] = 'admin/dashboard/AddProjectType';

$route['admin/Settings/ListChurch'] = 'admin/dashboard/ListProjectStatus';
$route['admin/Settings/EditProjectStatus/(:any)'] = 'admin/dashboard/EditProjectStatus/$1';
$route['admin/Settings/AddProjectStatus'] = 'admin/dashboard/AddProjectStatus';

$route['admin/Settings/ListLocation'] = 'admin/dashboard/ListCity';
$route['admin/Settings/EditCity/(:any)'] = 'admin/dashboard/EditCity/$1';
$route['admin/Settings/AddCity'] = 'admin/dashboard/AddCity';


$route['admin/Settings/ListServices'] = 'admin/dashboard/ListServices';
$route['admin/Settings/EditServices/(:any)'] = 'admin/dashboard/EditServices/$1';
$route['admin/Settings/AddServices'] = 'admin/dashboard/AddServices';

$route['admin/Settings/Coupons'] = 'admin/dashboard/Coupons';
$route['admin/Settings/Signatures'] = 'admin/dashboard/ListExpenseType';
$route['admin/Settings/EditExpenseType/(:any)'] = 'admin/dashboard/EditExpenseType/$1';
$route['admin/Settings/AddExpenseType'] = 'admin/dashboard/AddExpenseType';

$route['admin/Settings/ListIncomeType'] = 'admin/dashboard/ListIncomeType';
$route['admin/Settings/EditIncomeType/(:any)'] = 'admin/dashboard/EditIncomeType/$1';
$route['admin/Settings/AddIncomeType'] = 'admin/dashboard/AddIncomeType';

$route['admin/Settings/ListPaymentMethods'] = 'admin/dashboard/ListPaymentMethods';
$route['admin/Settings/EditPaymentMethod/(:any)'] = 'admin/dashboard/EditPaymentMethod/$1';
$route['admin/Settings/AddPaymentMethod'] = 'admin/dashboard/AddPaymentMethod';

$route['admin/Users/ListUsers'] = 'admin/Users/index';
$route['admin/Users/EditUsers/(:any)'] = 'admin/Users/EditUsers/$1';
$route['admin/Users/AddUsers'] = 'admin/Users/AddUsers';


$route['admin/Settings/Department'] = 'admin/dashboard/Department';
$route['admin/Settings/EditDepartment/(:any)'] = 'admin/dashboard/EditDepartment/$1';
$route['admin/Settings/AddDepartment'] = 'admin/dashboard/AddDepartment';


$route['admin/Users/LisClient'] = 'admin/Clients/index';
$route['admin/Users/EditClient/(:any)'] = 'admin/Clients/EditClient/$1';
$route['admin/Users/AddClient'] = 'admin/Clients/AddClient';

$route['admin/Projects/LisProjects'] = 'admin/Projects/index';
$route['admin/Projects/EditProjects/(:any)'] = 'admin/Projects/EditProjects/$1';
$route['admin/Projects/AddProjects'] = 'admin/Projects/AddProjects';

$route['admin/Projects/getServiceCategory/(:any)'] = 'admin/Projects/getServiceCategory/$1';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
