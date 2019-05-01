<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// search-detail
$route['account/(:any)/(:any)'] = 'account/view/$1/$2';
$route['check-username-exists/(:any)'] = 'account/check_username_exists/$1';
$route['search-detail'] = "search_detail";
$route['search-detail/(:any)'] = 'search_detail/view/$1';
$route['get-detail/(:any)'] = 'search_detail/get_detail/$1';
$route['get-profile/(:any)'] = 'search_detail/get_profile/$1';

// custom url
$route['farmer-register'] = "farmer_register";	//done
$route['buyer-register'] = "buyer_register";	//done
$route['fpo-register'] = "fpo_register";	//done
$route['processor-register'] = "processor_register";	//done
$route['trader-register'] = "trader_register";	//done
$route['org-consultant-register'] = "org_consultant_register"; //done
$route['org-input-register'] = "org_input_register";  //done
$route['packing-company-register'] = "packing_company_register";   //done
$route['farm-equip-register'] = "farm_equip_register";	//donere
$route['exhibitor-register'] = "exhibitor_register";	//done
$route['org-labs-register'] = "org_labs_register"; 		//done
$route['org-shops-register'] = "org_shops_register";   //done
$route['gov-agency-register'] = "gov_agency_register";  //done
$route['institutions-register'] = "institutions_register";      //done
$route['org-restaurant-register'] = "org_restaurant_register";  //done
$route['ngo-register'] = "ngo_register";  //done
$route['certification-register'] = "certification_register";  //done

// update
$route['farmer-register/update/(:any)/(:any)'] = 'farmer_register/update/$1/$2';

/************* New Implementation **************/

$route['user/home'] = "UserController/home";  //done
$route['search-user'] = "UserController/searchUser";  //done
$route['search-certification-agency'] = "UserController/searchCertificationAgency";  //done
$route['get-user-by-id'] = "UserController/getUserById";  //done
$route['organic-input-ecommerce-details'] = "UserController/organicInputEcommerceDetails";  //done
$route['fetch-organic-input-ecommerce-details'] = "UserController/fetchOrganicInputEcommerceDetails";  //done
$route['filter-fetch-organic-input-ecommerce-details'] = "UserController/filterFetchOrganicInputEcommerceDetails";  //done

$route['post-requirement'] = "PostRequirementController";  //done
$route['post-requirement/search-post'] = "PostRequirementController/searchPost";  //done
$route['getcities-by-state'] = "PostRequirementController/getCitiesByState";  //done
$route['getpost-by-id'] = "PostRequirementController/getPostById";  //done
$route['get-partner-user-details'] = "UserController/getPartnerUserDetails";  //done

$route['bid/create'] = "BidController/create";

$route['signup'] = "UserController/signup";
$route['registration'] = "UserController/registration";
$route['registration-certification-agency'] = "UserController/registrationCertificationAgency";

$route['search-enquiry'] = "UserController/searchEnquiry";


/************* New Implementation Admin Panel **************/

$route['admin'] = "backend/UserController/login";
$route['admin/logout'] = "backend/UserController/logout";
$route['admin/dashboard'] = "backend/DashboardController";
$route['change-password'] = "backend/UserController/changePassword";

$route['admin/post-requirement'] = "backend/PostRequirementController";
$route['admin/post-requirement/update'] = "backend/PostRequirementController/update";
$route['admin/post-requirement/delete'] = "backend/PostRequirementController/delete";
$route['admin/post-requirement/bid-list'] = "backend/PostRequirementController/bidList";

$route['admin/product'] = "backend/ProductController";
$route['admin/product/add'] = "backend/ProductController/add";
$route['admin/product/update'] = "backend/ProductController/update";
$route['admin/product/delete'] = "backend/ProductController/delete";

$route['admin/product-category'] = "backend/ProductCategoryController";
$route['admin/product-category/add'] = "backend/ProductCategoryController/add";
$route['admin/product-category/update'] = "backend/ProductCategoryController/update";
$route['admin/product-category/delete'] = "backend/ProductCategoryController/delete";


$route['admin/user-type'] = "backend/UserTypeController";
$route['admin/user-type/add'] = "backend/UserTypeController/add";
$route['admin/user-type/update'] = "backend/UserTypeController/update";
$route['admin/user-type/delete'] = "backend/UserTypeController/delete";

$route['admin/bid'] = "backend/BidController";
$route['admin/bid/delete'] = "backend/BidController/delete";

$route['admin/user'] = "backend/UserController";
$route['admin/user/delete'] = "backend/UserController/delete";
$route['admin/user/view'] = "backend/UserController/view";
$route['admin/user/update-profile'] = "backend/UserController/updateProfile";

$route['admin/certification-agency'] = "backend/CertificationAgencyController";
$route['admin/certification-agency/delete'] = "backend/CertificationAgencyController/delete";
$route['admin/certification-agency/update'] = "backend/CertificationAgencyController/update";
$route['admin/certification-agency/view'] = "backend/CertificationAgencyController/view";

$route['admin/organic-setting'] = "backend/OrganicSettingController";
$route['admin/organic-setting/delete'] = "backend/OrganicSettingController/delete";
$route['admin/organic-setting/update'] = "backend/OrganicSettingController/update";
$route['admin/organic-setting/add'] = "backend/OrganicSettingController/add";


$route['admin/user-registration-dashboard'] = "backend/UserController/userRegistrationDashborad";

/************* api routes *************/
$route['api/user/login'] = "api/UserController/login";
$route['api/user/fetch-user-type-list'] = "api/UserController/getUserTypeList";
$route['api/user/registration'] = "api/UserController/registration";





/* End of file routes.php */
/* Location: ./application/config/routes.php */