<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getNotifications(){
    $ci=& get_instance();
    $ci->load->model('notifications_model','Notifications');
    $result = $ci->Notifications->getNotifications();
    return $result;
    
}
function getBidNotifications(){
    $ci=& get_instance();
    $ci->load->model('notifications_model','Notifications');
    $result = $ci->Notifications->getPosthNotifications();
    return $result;
    
}

function getUserCount(){
    $ci=& get_instance();
    $ci->load->model('user_model','User');
    $session = UserSession();
    $userSession = $session['userData'];
    if( ADMINUSERNAME == $userSession['username'] ){
        $result = $ci->User->getUsers();
    }else{
        $result = $ci->User->getUserByPartnerUserId( $userSession['user_id'] );
    }
    return $result;
    
}

function getPostNotifications(){
    $ci=& get_instance();
    $ci->load->model('notifications_model','Notifications');
    $result = $ci->Notifications->getBidNotifications();
    return $result;
    
}

function getQuantities(){
    $data = array( 1 => '500kg to 1 ton',
                   2 => '1 ton to 3 ton',
                   3 => '3 ton to 5 ton',
                   4 => '5 ton to 10 ton',
                   5 => '10 ton to 25 ton',
                   6 => 'Above 25 ton',
            );
    return $data;
}
function getCertifications(){
    $data = array( 1 => 'NPOP',
                   2 => 'NOP',
                   3 => 'PGS',
                   4 => 'ACOS',
                   5 => 'EU',
                   6 => 'Both NPOP &amp; NOP',
            );
    return $data;
}
function getTotalFarmer(){
    $data = array( 
                   1 => '10 to 50',
                   2 => '50 to 100',
                   3 => '100 to 200',
                   4 => '200 to 500',
                   5 => '500 to 1000',
                   6 => '1000 to 3000',
                   7 => 'Above 3000',
            );
    return $data;
}
function getCropCategory(){
    
    $data = array( 
                   1 => 'Vegetables',
                   2 => 'Fruits',
                   3 => 'Dry Fruits',
                   4 => 'Spices',
                   5 => 'Rice',
                   6 => 'Other',
            );
    $result = getProductCategory();
    return $result;
}

function getProductCategory(){
    
    $ci=& get_instance();
    $ci->load->model('product_category_model','ProductCategory');
    $productCategoryList = $ci->ProductCategory->getProductCategorys();
    foreach( $productCategoryList as $value ) {
        $resultData[$value['id']] =$value['name'];
        $data = $resultData;
    }
    
    return $data;
    
}

function getSoilElement(){
    $data = array( 
                   1 => 'Nitrogen',
                   2 => 'Phosphorus(P)',
                   3 => 'Potassium(K)',
                   4 => 'pH',
            );
    return $data;
}
function getSoilPercentage(){
    $data = array( 
                   1 => 'Very High',
                   2 => 'High',
                   3 => 'Medium',
                   4 => 'Low',
                   5 => 'Very Low',
            );
    return $data;
}
function getMicroElement(){
    $data = array( 
                   1 => 'Boron',
                   2 => 'Copper',
                   3 => 'Iron',
                   4 => 'Manganese',
                   5 => 'Sulphur',
                   6 => 'Zinc',
            );
    return $data;
}

function getMicroPercentage(){
    $data = array( 
                   1 => 'Sufficient',
                   2 => 'Deficient',
            );
    return $data;
}

function getEcommerceCategory(){
    $data = array( 
                   1 => 'Organic Farming',
                   2 => 'Testing Farming',
            );
    return $data;
}

function getEcommerceSubCategory(){
    $data = array( 
                   1 => 'Integrated Pest Management',
                   2 => 'Crop Protection',
                   3 => 'Crop Nutrition',
            );
    return $data;
}

function getEcommerceBrand(){
    $data = array( 
                   1 => 'Brand1',
                   2 => 'Brand2',
                   3 => 'Brand3',
            );
    return $data;
}

function getAreaInNumber() {
    
    for( $i = 1; $i <= 1000; $i++ ) {
        $arrNumber[] = $i;
    }
    return $arrNumber;
}

function ViewRegistration($userTypeDetails){
    $ci=& get_instance();
    $data['user_type_details'] = $userTypeDetails;
    if($userTypeDetails['id'] == 1){
        return $ci->load->view('user/registration_farmer',$data);
    }else if($userTypeDetails['id'] == 2){
        return $ci->load->view('user/registration_fpo',$data);
    }else if($userTypeDetails['id'] == 3){
        return $ci->load->view('user/registration_trader',$data);
    }else if($userTypeDetails['id'] == 4){
        return $ci->load->view('user/registration_processor',$data);
    }else if($userTypeDetails['id'] == 5){
        return $ci->load->view('user/registration_buyer',$data);
    }else if($userTypeDetails['id'] == 6){
        return $ci->load->view('user/registration_organic_consultant',$data);
    }else if($userTypeDetails['id'] == 7){
        return $ci->load->view('user/registration_organic_input',$data);
    }else if($userTypeDetails['id'] == 8){
        return $ci->load->view('user/registration_packing_company',$data);
    }else if($userTypeDetails['id'] == 9){
        return $ci->load->view('user/registration_logistic_company',$data);
    }else if($userTypeDetails['id'] == 10){
        return $ci->load->view('user/registration_farm_equipment',$data);
    }else if($userTypeDetails['id'] == 11){
        return $ci->load->view('user/registration_exhibitor',$data);
    }else if($userTypeDetails['id'] == 12){
        return $ci->load->view('user/registration_shops',$data);
    }else if($userTypeDetails['id'] == 13){
        return $ci->load->view('user/registration_labs',$data);
    }else if($userTypeDetails['id'] == 14){
        return $ci->load->view('user/registration_government_agencies',$data);
    }else if($userTypeDetails['id'] == 15){
        return $ci->load->view('user/registration_institutions',$data);
    }else if($userTypeDetails['id'] == 17){
        return $ci->load->view('user/registration_restaurant',$data);
    }else if($userTypeDetails['id'] == 18){
        return $ci->load->view('user/registration_ngo',$data);
    }else{
        return $ci->load->view('user/registration_certification_agencies',$data);
    }
}
function ViewProfile($userTypeDetails,$user_details,$user_product_details){
    $ci=& get_instance();
    $data['user_type_details'] = $userTypeDetails;
    $data['user_details'] = $user_details;
    $data['user_product_details'] = $user_product_details;
    if($userTypeDetails['id'] == 1){
        return $ci->load->view('backend/user/profile_farmer',$data);
    }else if($userTypeDetails['id'] == 2){
        return $ci->load->view('backend/user/profile_fpo',$data);
    }else if($userTypeDetails['id'] == 3){
        return $ci->load->view('backend/user/profile_trader',$data);
    }else if($userTypeDetails['id'] == 4){
        return $ci->load->view('backend/user/profile_processor',$data);
    }else if($userTypeDetails['id'] == 5){
        return $ci->load->view('backend/user/profile_buyer',$data);
    }else if($userTypeDetails['id'] == 6){
        return $ci->load->view('backend/user/profile_organic_consultant',$data);
    }else if($userTypeDetails['id'] == 7){
        return $ci->load->view('backend/user/profile_organic_input',$data);
    }else if($userTypeDetails['id'] == 8){
        return $ci->load->view('backend/user/profile_packing_company',$data);
    }else if($userTypeDetails['id'] == 9){
        return $ci->load->view('backend/user/profile_logistic_company',$data);
    }else if($userTypeDetails['id'] == 10){
        return $ci->load->view('backend/user/profile_farm_equipment',$data);
    }else if($userTypeDetails['id'] == 11){
        return $ci->load->view('backend/user/profile_exhibitor',$data);
    }else if($userTypeDetails['id'] == 12){
        return $ci->load->view('backend/user/profile_shops',$data);
    }else if($userTypeDetails['id'] == 13){
        return $ci->load->view('backend/user/profile_labs',$data);
    }else if($userTypeDetails['id'] == 14){
        return $ci->load->view('backend/user/profile_government_agencies',$data);
    }else if($userTypeDetails['id'] == 15){
        return $ci->load->view('backend/user/profile_institutions',$data);
    }else if($userTypeDetails['id'] == 17){
        return $ci->load->view('backend/user/profile_restaurant',$data);
    }else if($userTypeDetails['id'] == 18){
        return $ci->load->view('backend/user/profile_ngo',$data);
    }else{
        return $ci->load->view('backend/user/profile_certification_agencies',$data);
    }
}
