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
$route['farm-equip-register'] = "farm_equip_register";	//done
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
$route['post-requirement'] = "PostRequirementController";  //done
$route['post-requirement/search-post'] = "PostRequirementController/searchPost";  //done
$route['getcities-by-state'] = "PostRequirementController/getCitiesByState";  //done
$route['getpost-by-id'] = "PostRequirementController/getPostById";  //done

$route['bid/create'] = "BidController/create";

/************* New Implementation Admin Panel **************/

$route['admin'] = "backend/UserController/login";
$route['admin/dashboard'] = "backend/DashboardController";
$route['admin/post-requirement'] = "backend/PostRequirementController";
$route['admin/bid'] = "backend/BidController";
$route['admin/bid/delete'] = "backend/BidController/delete";

$route['admin/user'] = "backend/UserController";

/* End of file routes.php */
/* Location: ./application/config/routes.php */