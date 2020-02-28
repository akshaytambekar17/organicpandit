<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OrganicController extends MY_Controller {
    
    function __construct() {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    }
    
    public function fetchUserTypeList() {
        
        $arrUserTypeList = $this->UserType->getUserTypes();
        
        if( true == isArrVal( $arrUserTypeList ) ) {
            $arrResult['success'] = true;
            $arrResult['message'] = 'Data found for User Types';
            $arrResult['data'] = $arrUserTypeList;
        }else{
            $arrResult['success'] = false;
            $arrResult['message'] = 'No data found';
        }
        
        $this->response( $arrResult );
    }
    
    public function fetchCountries(){
        
        $arrCountriesList = $this->Country->getCountries();
        
        if( true == isArrVal( $arrCountriesList ) ) {
            $arrResult['success'] = true;
            $arrResult['message'] = 'Data found for Countries';
            $arrResult['data'] = $arrCountriesList;
        }else{
            $arrResult['success'] = false;
            $arrResult['message'] = 'No Country data found';
        }
        
        $this->response( $arrResult );
    }
    
    public function fetchStates(){
        $arrPost = $this->input->post();
        
        if( true == isset( $arrPost['country_id'] ) ) {
            $arrStatesList = $this->State->getStatesByCountryId( $arrPost['country_id'] );
        } else {
            $arrStatesList = $this->State->getStates();
        }
        
        if( true == isArrVal( $arrStatesList ) ) {
            $arrResult['success'] = true;
            $arrResult['message'] = 'Data found for States';
            $arrResult['data'] = $arrStatesList;
        }else{
            $arrResult['success'] = false;
            $arrResult['message'] = 'No States data found';
        }
        
        $this->response( $arrResult );
    }
    
    public function fetchCities(){
        $arrPost = $this->input->post();
        
        if( true == isset( $arrPost['state_id'] ) ) {
            $arrCitiesList = $this->City->getCitiesByStateId( $arrPost['state_id'] );
        } else {
            $arrCitiesList = $this->City->getCities();
        }
        
        if( true == isArrVal( $arrCitiesList ) ) {
            $arrResult['success'] = true;
            $arrResult['message'] = 'Data found for Cities';
            $arrResult['data'] = $arrCitiesList;
        }else{
            $arrResult['success'] = false;
            $arrResult['message'] = 'No Cities data found';
        }
        
        $this->response( $arrResult );
    }
    
    public function fetchCertifications(){
        
        if( true == isArrVal( getCertifications() ) ) {
            $arrResult['success'] = true;
            $arrResult['message'] = 'Data found for Certfications';
            $arrResult['data'] = getCertifications();
        }else{
            $arrResult['success'] = false;
            $arrResult['message'] = 'No Certifiations data found';
        }
        
        $this->response( $arrResult );
    }
    
    public function fetchCertificationAgencies(){
        
        $arrCertificationAgencies = $this->CertificationAgency->getCertificationAgenciesVerified();

        if( true == isArrVal( $arrCertificationAgencies ) ) {
            $arrResult['success'] = true;
            $arrResult['message'] = 'Data found for Certfication Agenices';
            $arrResult['data'] = $arrCertificationAgencies;
        }else{
            $arrResult['success'] = false;
            $arrResult['message'] = 'No Certifiations data found';
        }
        
        $this->response( $arrResult );
    }
    
    public function fetchCategories() {
        
        $arrProductCategoriesList = $this->ProductCategory->getActiveProductCategorys();

        if( true == isArrVal( $arrProductCategoriesList ) ) {
            $arrResult['success'] = true;
            $arrResult['message'] = 'Successfully fetch categories list data';
            $arrResult['data'] = $arrProductCategoriesList;
        }else{
            $arrResult['success'] = false;
            $arrResult['message'] = 'No data found';
        }
        
        $this->response( $arrResult );
    }
    
    public function fetchProducts() {
        
        $arrProductList = $this->Product->getActiveProducts();

        if( true == isArrVal( $arrProductList ) ) {
            $arrResult['success'] = true;
            $arrResult['message'] = 'Successfully fetch product list data';
            $arrResult['data'] = $arrProductList;
        }else{
            $arrResult['success'] = false;
            $arrResult['message'] = 'No data found';
        }
        
        $this->response( $arrResult );
    }
    
    public function fetchAppSliderImages() {
        
        $arrAppSliderImagesList = $this->AppSliderImages->getAppSliderImages();
        if( true == isArrVal( $arrAppSliderImagesList ) ) {
            foreach( $arrAppSliderImagesList as $arrAppSliderImagesDetails ) {
                $arrAppSliderImagesDetails['slider_image'] = base_url() . APP_SLIDER_IMAGE_PATH . $arrAppSliderImagesDetails['slider_image'];
                $arrmixAppSliderImagesList[] = $arrAppSliderImagesDetails;
            }
        
            $arrResult['success'] = true;
            $arrResult['message'] = 'Successfully fetch slider image list data';
            $arrResult['data'] = $arrmixAppSliderImagesList;
        }else{
            $arrResult['success'] = false;
            $arrResult['message'] = 'No data found';
        }
        
        $this->response( $arrResult );
    }
    
}
