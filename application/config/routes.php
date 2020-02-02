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
$route['view-user-details'] = "UserController/viewUserDetails";  //done
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

$route['search-buy-product'] = "BuySellController/searchBuyProduct";
$route['fetch-sell-product-by-id'] = "BuySellController/fetchSellProductById";

$route['sell-product'] = "backend/SellProductController/index";
$route['sell-product/create'] = "backend/SellProductController/create";
$route['sell-product/update'] = "backend/SellProductController/update";
$route['sell-product/delete'] = "backend/SellProductController/delete";
$route['fetch-cities-by-state-id'] = "backend/SellProductController/fetchCitiesByStateId";


$route['fetch-product-by-category-id'] = "backend/SellProductController/fetchProductByCategoryId";
$route['buy-sell/fetch-product-by-category-id'] = "BuySellController/fetchProductByCategoryId";
$route['send-enquiry-sell-product'] = "BuySellController/sendEnquirySellProduct";

$route['fetch-organic-input-ecommerce-add-to-cart'] = "UserController/fetchOrganicInputEcommerceAddToCart";

$route['user-shop-ecommerces'] = "UserShopEcommercesController";  //done
$route['fetch-shop-ecommerce-add-to-cart'] = "UserShopEcommercesController/fetchUserShopEcommerceAddToCart";  //done

$route['add-to-cart'] = "UserController/addToCart";
$route['remove-from-cart'] = "UserController/removeFromCart";
$route['checkout-cart'] = "UserController/checkoutCart";
$route['paynow'] = "UserController/paynow";
$route['payment-response'] = "UserController/paymentResponse";

$route['blogs'] = "BlogController";
$route['blog-details'] = "BlogController/blogDetails";

$route['lab-report-details'] = "LabReportController/view";

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

$route['admin/user/user-list'] = "backend/UserController/userList";
$route['admin/user/delete'] = "backend/UserController/delete";
$route['admin/user/view'] = "backend/UserController/view";
$route['admin/user/update-profile'] = "backend/UserController/updateProfile";
$route['admin/user/add'] = "backend/UserController/add";

$route['admin/user/user-products'] = "backend/UserProductsController";
$route['admin/user/user-products/add'] = "backend/UserProductsController/add";
$route['admin/user/user-products/update'] = "backend/UserProductsController/update";
$route['admin/user/user-products/delete'] = "backend/UserProductsController/delete";

$route['admin/user/user-crops'] = "backend/UserCropsController";
$route['admin/user/user-crops/add'] = "backend/UserCropsController/add";
$route['admin/user/user-crops/update'] = "backend/UserCropsController/update";
$route['admin/user/user-crops/delete'] = "backend/UserCropsController/delete";

$route['admin/user/user-soils'] = "backend/UserSoilsController";
$route['admin/user/user-soils/add'] = "backend/UserSoilsController/add";
$route['admin/user/user-soils/update'] = "backend/UserSoilsController/update";
$route['admin/user/user-soils/delete'] = "backend/UserSoilsController/delete";

$route['admin/user/user-micro-nutrients'] = "backend/UserMicroNutrientsController";
$route['admin/user/user-micro-nutrients/add'] = "backend/UserMicroNutrientsController/add";
$route['admin/user/user-micro-nutrients/update'] = "backend/UserMicroNutrientsController/update";
$route['admin/user/user-micro-nutrients/delete'] = "backend/UserMicroNutrientsController/delete";

$route['admin/user/user-input-organic-manures'] = "backend/UserInputOrganicManureController";
$route['admin/user/user-input-organic-manures/add'] = "backend/UserInputOrganicManureController/add";
$route['admin/user/user-input-organic-manures/update'] = "backend/UserInputOrganicManureController/update";
$route['admin/user/user-input-organic-manures/delete'] = "backend/UserInputOrganicManureController/delete";

$route['admin/user/user-organic-input-ecommerces'] = "backend/UserOrganicInputEcommercesController";
$route['admin/user/user-organic-input-ecommerces/add'] = "backend/UserOrganicInputEcommercesController/add";
$route['admin/user/user-organic-input-ecommerces/update'] = "backend/UserOrganicInputEcommercesController/update";
$route['admin/user/user-organic-input-ecommerces/delete'] = "backend/UserOrganicInputEcommercesController/delete";

$route['admin/certification-agency'] = "backend/CertificationAgencyController";
$route['admin/certification-agency/delete'] = "backend/CertificationAgencyController/delete";
$route['admin/certification-agency/update'] = "backend/CertificationAgencyController/update";
$route['admin/certification-agency/view'] = "backend/CertificationAgencyController/view";

$route['admin/organic-setting'] = "backend/OrganicSettingController";
$route['admin/organic-setting/delete'] = "backend/OrganicSettingController/delete";
$route['admin/organic-setting/update'] = "backend/OrganicSettingController/update";
$route['admin/organic-setting/add'] = "backend/OrganicSettingController/add";

$route['admin/blogs'] = "backend/BlogController";
$route['admin/blogs/add'] = "backend/BlogController/add";
$route['admin/blogs/update'] = "backend/BlogController/update";
$route['admin/blogs/delete'] = "backend/BlogController/delete";


$route['admin/user/user-shop-ecommerces'] = "backend/UserShopEcommercesController";
$route['admin/user/user-shop-ecommerces/add'] = "backend/UserShopEcommercesController/add";
$route['admin/user/user-shop-ecommerces/update'] = "backend/UserShopEcommercesController/update";
$route['admin/user/user-shop-ecommerces/delete'] = "backend/UserShopEcommercesController/delete";

$route['admin/user-registration-dashboard'] = "backend/UserController/userRegistrationDashborad";

$route['orders'] = "backend/OrderController/index";
$route['order/view'] = "backend/OrderController/view";

$route['transactions'] = "backend/TransactionController/index";

$route['buyer-enquiry-list'] = "backend/SendEnquiryBuyerController/index";

$route['admin/lab-reports'] = "backend/LabReportController";
$route['admin/lab-reports/add'] = "backend/LabReportController/add";
$route['admin/lab-reports/update'] = "backend/LabReportController/update";
$route['admin/lab-reports/delete'] = "backend/LabReportController/delete";

$route['admin/app-slider-images'] = "backend/AppSliderImagesController";
$route['admin/app-slider-images/add'] = "backend/AppSliderImagesController/add";
$route['admin/app-slider-images/update'] = "backend/AppSliderImagesController/update";
$route['admin/app-slider-images/delete'] = "backend/AppSliderImagesController/delete";


/**
 * Ajax routing
 */
$route['fetch-products-by-category-id'] = 'OrganicPanditController/fetchProductsByCategoryId';
$route['fetch-states-by-country-id'] = 'OrganicPanditController/fetchStatesByCountryId';
$route['fetch-cities-by-state-id'] = 'OrganicPanditController/fetchCitiesByStateId';
$route['fetch-registration-user-type-details'] = 'backend/UserController/fetchRegistrationUserTypeDetails';
$route['fetch-frontend-states-by-country-id'] = 'UserController/fetchFrontendStatesByCountryId';
$route['fetch-frontend-cities-by-state-id'] = 'UserController/fetchFrontendCitiesByStateId';


/************* api routes *************/
$route['api-v1/user/login'] = 'api-v1/UserController/login';
$route['api-v1/user/registration'] = 'api-v1/UserController/registration';
$route['api-v1/user/fetch-users-list'] = 'api-v1/UserController/getUsersList';
$route['api-v1/user/fetch-user'] = 'api-v1/UserController/getUserDetails';
$route['api-v1/user/fetch-user-organic-input-list'] = 'api-v1/UserController/getUserOrganicInputList';
$route['api-v1/user/fetch-user-organic-input'] = 'api-v1/UserController/getUserOrganicInputDetails';
$route['api-v1/user/fetch-user-shops-list'] = 'api-v1/UserController/getUserShopEcommerceList';
$route['api-v1/user/fetch-user-shop'] = 'api-v1/UserController/getUserShopEcommerceDetails';

$route['api-v1/fetch-user-type-list'] = 'api-v1/OrganicController/fetchUserTypeList';
$route['api-v1/fetch-countries'] = 'api-v1/OrganicController/fetchCountries';
$route['api-v1/fetch-states'] = 'api-v1/OrganicController/fetchStates';
$route['api-v1/fetch-cities'] = 'api-v1/OrganicController/fetchCities';
$route['api-v1/fetch-certifications'] = 'api-v1/OrganicController/fetchCertifications';
$route['api-v1/fetch-certification-agencies'] = 'api-v1/OrganicController/fetchCertificationAgencies';
$route['api-v1/fetch-products'] = 'api-v1/OrganicController/fetchProducts';
$route['api-v1/fetch-categories'] = 'api-v1/OrganicController/fetchCategories';
$route['api-v1/fetch-app-slider-images'] = 'api-v1/OrganicController/fetchAppSliderImages';

$route['api-v1/post-requirement/fetch-total-worth'] = 'api-v1/PostRequirementController/getTotalWorth';
$route['api-v1/post-requirement/fetch-post-requirement-list'] = 'api-v1/PostRequirementController/getPostRequirementList';
$route['api-v1/post-requirement/fetch-post-requirement'] = 'api-v1/PostRequirementController/getPostRequirementDetails';


/* End of file routes.php */
/* Location: ./application/config/routes.php */