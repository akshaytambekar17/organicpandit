<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Search_detail extends CI_Controller {
function __construct(){
parent:: __construct();
$this->load->model('farmer_model');  // to get state and city value in dropdown
$this->load->model('fpo_model');  // to get products dropdown
$this->load->model('trader_model');  // to get products dropdown
$this->load->model('processor_model');  // to get products dropdown
$this->load->model('buyer_model');  // to get products dropdown
$this->load->model('search_detail_model'); // to get detail based on criateria
}
public function index()
{
$data['states'] =  $this->farmer_model->get_state();
$data['cities'] =  $this->farmer_model->get_city();
$this->load->view('search-detail', $data);
}
public function view($slug = NULL){
// print $slug;
switch ($slug) {
case "farmer":
$data['meta_title'] = 'List of Certified Organic Farmers in India | Organic Farmers Haryana Maharashtra & kerala';
$data['meta_description'] = 'List of Organic farmers in India,list of certified organic farmers in india,organic farming in india,Organic farmers in Haryana ,Organic farmers in Maharashtra,List of Organic farmers in kerala,List of Organic farmers in Tamilnadu';
$data['meta_keywords'] = 'List of Organic farmers in India';
$data['title'] = 'Search your Farmer';
$data['banner'] = 'farmer.jpg';	
$data['slug'] = 'farmer';
$data['products'] =  $this->farmer_model->get_products();
break;
case "fpo":
$data['meta_title'] = 'List Of Farmer Producer Company India | list of fpo in india';
$data['meta_description'] = 'List Of Farmer Producer Company India, list of fpo in india, list of fpos in india';
$data['meta_keywords'] = 'list of fpo in india';
$data['title'] = 'Search your FPO';
$data['banner'] = 'fpo.jpg';	
$data['slug'] = 'fpo';
$data['products'] =  $this->fpo_model->get_products();
break;
case "trader":
$data['meta_title'] = 'AAAAAAA';
$data['meta_description'] = 'BBBBBB';
$data['meta_keywords'] = 'CCCCCCC';
$data['title'] = 'Search your Trader';
$data['banner'] = 'trader.jpg';	
$data['slug'] = 'trader';
$data['products'] =  $this->trader_model->get_products();
break;
case "processor":
$data['meta_title'] = 'Processor';
$data['meta_description'] = 'Processor';
$data['meta_keywords'] = 'Processor';
$data['title'] = 'Search your Processor';
$data['banner'] = 'processor.jpg';	
$data['slug'] = 'processor';
$data['products'] =  $this->processor_model->get_products();
break;
case "buyer":
$data['meta_title'] = 'Buyers of Organic Products in India | Vegetable, Banana, Pomegranate, Mango';
$data['meta_description'] = 'Buyers of Organic Products in India,organic agricultural products buyers in india,organic produce buyers,how to sell organic vegetables in india,organic vegetable buyers,organic banana buyers,pomegranate buyers in india,mango buyers';
$data['meta_keywords'] = 'Buyers of Organic Products in India';
$data['title'] = 'Search your Buyer';
$data['banner'] = 'buyer.jpg';	
$data['slug'] = 'buyer';			
$data['products'] =  $this->buyer_model->get_products();
break;
case "org_consultant":
$data['meta_title'] = 'Organic Consultants | Organic Consultants List | Organic Consulting Firm';
$data['meta_description'] = 'Organic Consultants, Organic Consultants List, Organic Consulting Firm';
$data['meta_keywords'] = 'Organic Consultants, Organic Consultants List, Organic Consulting Firm';
$data['title'] = 'Search your Organic Consultant';
$data['banner'] = 'org_consultant.jpg';	
$data['slug'] = 'org_consultant';
break;
case "org_input":
$data['meta_title'] = 'Organic Input';
$data['meta_description'] = 'Organic Input';
$data['meta_keywords'] = 'Organic Input';
$data['title'] = 'Search your Organic Input';
$data['banner'] = 'org_input.jpg';	
$data['slug'] = 'org_input';
break;
case "packaging":
$data['meta_title'] = 'Organic Packaging';
$data['meta_description'] = 'Organic Packaging';
$data['meta_keywords'] = 'Organic Packaging';
$data['title'] = 'Search your Packaging';
$data['banner'] = 'packaging.jpg';	
$data['slug'] = 'packaging';
break;
case "logistic":
$data['meta_title'] = 'Organic Logistic';
$data['meta_description'] = 'Organic Logistic';
$data['meta_keywords'] = 'Logistic';
$data['title'] = 'Search your Logistic';
$data['banner'] = 'logistic.jpg';	
$data['slug'] = 'logistic';
break;
case "farm_equipment":
$data['meta_title'] = 'Organic Equipment';
$data['meta_description'] = 'Organic Equipment';
$data['meta_keywords'] = 'Equipment';
$data['title'] = 'Search your Farm Equipment';
$data['banner'] = 'farm_equipment.jpg';	
$data['slug'] = 'farm_equipment';
break;
case "exhibitors":
$data['meta_title'] = 'Organic Exhibitors';
$data['meta_description'] = 'Organic Exhibitors';
$data['meta_keywords'] = 'Organic Exhibitors';
$data['title'] = 'Search your Exhibitors';
$data['banner'] = 'exhibitors.jpg';	
$data['slug'] = 'exhibitors';
break;
case "shops":
$data['meta_title'] = 'Organic Shop | Online organic store | Organic Bazaar';
$data['meta_description'] = 'Organic Shop , Online organic store, Organic Bazaar';
$data['meta_keywords'] = 'Organic Sho';
$data['title'] = 'Search your Organic Shops';
$data['banner'] = 'shops.jpg';	
$data['slug'] = 'shops';
break;
case "labs":
$data['meta_title'] = 'Organic Labs';
$data['meta_description'] = 'Organic Labs';
$data['meta_keywords'] = 'Organic Labs';
$data['title'] = 'Search your Labs';
$data['banner'] = 'labs.jpg';	
$data['slug'] = 'labs';
break;
case "gov_agency":
$data['meta_title'] = 'Government Agencies';
$data['meta_description'] = 'Government Agencies';
$data['meta_keywords'] = 'Government Agencies';
$data['title'] = 'Search your Government Agencies';
$data['banner'] = 'gov_agency.jpg';	
$data['slug'] = 'gov_agency';
break;
case "institutions":
$data['meta_title'] = 'organic farming institutio';
$data['meta_description'] = 'organic farming institutio';
$data['meta_keywords'] = 'organic farming institutio';
$data['title'] = 'Search your Institutions';
$data['banner'] = 'institutions.jpg';	
$data['slug'] = 'institutions';
break;
case "others":
$data['meta_title'] = 'AAAAAAA';
$data['meta_description'] = 'BBBBBB';
$data['meta_keywords'] = 'CCCCCCC';
$data['title'] = 'Search your Others';
$data['banner'] = 'others.jpg';	
$data['slug'] = 'others';
break;
case "restaurant":
$data['meta_title'] = 'Restaurant';
$data['meta_description'] = 'Restaurant';
$data['meta_keywords'] = 'CCCCCCC';
$data['title'] = 'Search your Restaurant';
$data['banner'] = 'restaurant.jpg';	
$data['slug'] = 'restaurant';
break;
case "ngo":
$data['meta_title'] = 'NGO';
$data['meta_description'] = 'NGO';
$data['meta_keywords'] = 'CCCCCCC';
$data['title'] = 'Search your NGO';
$data['banner'] = 'ngo.jpg';	
$data['slug'] = 'ngo';
break;
case "certification":
$data['meta_title'] = 'Certification';
$data['meta_description'] = 'Certification';
$data['meta_keywords'] = 'CCCCCCC';
$data['title'] = 'Search your Certification';
$data['banner'] = 'certification.jpg';	
$data['slug'] = 'certification';
break; 
default:
$data['meta_title'] = 'AAAAAAA';
$data['meta_description'] = 'BBBBBB';
$data['meta_keywords'] = 'CCCCCCC';
$data['title'] = 'Search your Buyer';
$data['banner'] = 'buyer.jpg';	
$data['slug'] = 'buyer';
}
$data['states'] =  $this->farmer_model->get_state();
$this->load->view('search-detail', $data);
}
// get cities
public function get_detail($slug = NULL){ 
// print $slug;
$this->search_detail_model->get_detail($slug);

}
// show profile
public function get_profile($slug = NULL){
$result = $this->search_detail_model->get_profile();
}
}