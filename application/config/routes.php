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
// Page Redirect URL
$route['default_controller'] = 'Users_controller';
$route['drivers'] ='Users_controller/drivers';
$route['cell-machine'] ='Users_controller/sale_machine';
$route['machineDetails'] ='Users_controller/machineDetails';
$route['addNewDrivers'] ='Users_controller/addNewDrivers';
$route['about']='Users_controller/about';
$route['contact'] ='Users_controller/contact';
$route['owner'] ='Users_controller/owner';
$route['addNewOwner']='Users_controller/addNewOwner';
$route['mechanics'] ='Users_controller/mechanics';
$route['addNewMechanics'] ='Users_controller/addNewMechanics';
$route['sellBuyMachine'] ='Users_controller/sellBuyMachine';
$route['termsAndCondition']='Users_controller/termsAndCondition';
$route['privacyPolicy'] ='Users_controller/privacy_policy';
$route['sparePart'] ='Users_controller/sparePart';
$route['addNewSparePart'] ='Users_controller/addNewSparePart';
$route['addNewEngineerAndSupervisor'] ='Users_controller/addNewEngineerAndSupervisor';
$route['engineerOrSupervisor']='Users_controller/engineerOrSupervisor';
$route['spareDetails'] = 'Users_controller/spareDetails';
$route['learningPath'] ='Users_controller/learningPath';

$route['admin-login']='SupportController/login_admin';
$route['dashboard']='SupportController/index';
$route['Logout']='SupportController/support_user_logout';
$route['student_eqnuiry']='SupportController/student_eqnuiry';
$route['change_password']='SupportController/change_password';
$route['city']='SupportController/city';
$route['viewMachinary']='SupportController/viewMachinary';
$route['driver-list']='SupportController/driver';
$route['owner-list']='SupportController/owner';
$route['mechanics-list']='SupportController/mechanics';
$route['customer_enquiry']='SupportController/customer_enquiry';
$route['generic_status_changed']='SupportController/generic_status_changed';
$route['generic_delete']='SupportController/generic_delete';
$route['orderlog']='SupportController/orderlog';
$route['generic_status_changed_driver'] ='SupportController/generic_status_changed_driver';
$route['generic_delete_driver'] ='SupportController/generic_delete_driver';
$route['generic_status_changed_owner'] ='SupportController/generic_status_changed_owner';
$route['generic_delete_owner'] ='SupportController/generic_delete_owner';
$route['generic_status_changed_mechanics'] ='SupportController/generic_status_changed_mechanics';
$route['generic_delete_mechanics'] ='SupportController/generic_delete_mechanics';
$route['usersList'] ='SupportController/usersList';
$route['updatefavouritemachinary'] ='SupportController/updatefavouritemachinary';
$route['updatefavouritedriver'] ='SupportController/updatefavouritedriver';
$route['updatefavouriteowner'] ='SupportController/updatefavouriteowner';
$route['updatefavouritemmechanics'] ='SupportController/updatefavouritemmechanics';
$route['civilList'] ='SupportController/civilList';
$route['spareList'] ='SupportController/spareList';
$route['generic_delete_spare']='SupportController/generic_delete_spare';
$route['updatefavouritemspare']='SupportController/updatefavouritemspare';
$route['generic_status_changed_spare']='SupportController/generic_status_changed_spare';
$route['learningpath']='SupportController/learningpath';
$route['driverTypes']='SupportController/driverTypes';
$route['add_driver_types']='SupportController/add_driver_types';
$route['generic_delete_driver_types']='SupportController/generic_delete_driver_types';
$route['machineType']='SupportController/machineType';
$route['submit_machinary_types']='SupportController/submit_machinary_types';
$route['generic_delete_machinary_types']='SupportController/generic_delete_machinary_types';

$route['generic_delete_civil']='SupportController/generic_delete_civil';
$route['updatefavouritemcivil']='SupportController/updatefavouritemcivil';
$route['generic_status_changed_civil']='SupportController/generic_status_changed_civil';


$route['generic_delete_learning']='SupportController/generic_delete_learning';
$route['generic_status_changed_learning']='SupportController/generic_status_changed_learning';
// API Link
$route['add_new_machine_cell']='Api_Controller/add_new_machine_cell';
$route['add_new_drivers'] ='Api_Controller/add_new_drivers';
$route['login_users'] ='Api_Controller/login_users';
$route['logout']='Api_Controller/logout';
$route['viewInformationForDriver']='Api_Controller/viewInformationForDriver';
$route['add_new_owners']='Api_Controller/add_new_owners';
$route['viewInformationForOwner'] ='Api_Controller/viewInformationForOwner';
$route['add_new_mechanics']='Api_Controller/add_new_mechanics';
$route['viewInformationForMchanics'] ='Api_Controller/viewInformationForMchanics';
$route['add_new_shop'] ='Api_Controller/add_new_shop';
$route['add_new_engineer'] ='Api_Controller/add_new_engineer';
$route['viewInformationForCivil'] ='Api_Controller/viewInformationForCivil';
$route['viewInformationForSpare'] ='Api_Controller/viewInformationForSpare';
$route['submit_learning_path']='Api_Controller/submit_learning_path';
// Pagination Links
$route['cell_machine_list']='Datatables_Controller/cell_machine_list';
$route['driver_table_list']='Datatables_Controller/driver_table_list';
$route['owner_table_list'] ='Datatables_Controller/owner_table_list';
$route['mechanics_table_list']='Datatables_Controller/mechanics_table_list';
$route['users_table_list'] ='Datatables_Controller/users_table_list';
$route['spare_table_list']='Datatables_Controller/spare_table_list';
$route['civil_table_list']='Datatables_Controller/civil_table_list';
$route['learning_table_list']='Datatables_Controller/learning_table_list';
$route['referral_table_list']='Datatables_Controller/referral_table_list';
$route['driveType_table_list']='Datatables_Controller/driveType_table_list';
$route['machinaryType_table_list']='Datatables_Controller/machinaryType_table_list';

$route['razorpay_payment']='Api_Controller/razorpay_payment';
$route['test_token']='Api_Controller/test_token';
$route['updatefavouriteproduct']='Api_Controller/updatefavouriteproduct';
$route['category_Status_Changed']='Api_Controller/category_Status_Changed';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
