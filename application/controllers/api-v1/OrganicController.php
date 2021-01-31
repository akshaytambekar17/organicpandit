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
            $arrmixResponseData['success'] = true;
            $arrmixResponseData['message'] = 'Data found for User Types';
            $arrmixResponseData['data'] = $arrUserTypeList;
        }else{
            $arrmixResponseData['success'] = false;
            $arrmixResponseData['message'] = 'No data found';
        }
        
        $this->response( $arrmixResponseData );
    }
    
    public function fetchCountries(){
        
        $arrCountriesList = $this->Country->getCountries();
        
        if( true == isArrVal( $arrCountriesList ) ) {
            $arrmixResponseData['success'] = true;
            $arrmixResponseData['message'] = 'Data found for Countries';
            $arrmixResponseData['data'] = $arrCountriesList;
        }else{
            $arrmixResponseData['success'] = false;
            $arrmixResponseData['message'] = 'No Country data found';
        }
        
        $this->response( $arrmixResponseData );
    }
    
    public function fetchStates(){
        $arrPost = $this->input->post();
        
        if( true == isset( $arrPost['country_id'] ) ) {
            $arrStatesList = $this->State->getStatesByCountryId( $arrPost['country_id'] );
        } else {
            $arrStatesList = $this->State->getStates();
        }
        
        if( true == isArrVal( $arrStatesList ) ) {
            $arrmixResponseData['success'] = true;
            $arrmixResponseData['message'] = 'Data found for States';
            $arrmixResponseData['data'] = $arrStatesList;
        }else{
            $arrmixResponseData['success'] = false;
            $arrmixResponseData['message'] = 'No States data found';
        }
        
        $this->response( $arrmixResponseData );
    }
    
    public function fetchCities(){
        $arrPost = $this->input->post();
        
        if( true == isset( $arrPost['state_id'] ) ) {
            $arrCitiesList = $this->City->getCitiesByStateId( $arrPost['state_id'] );
        } else {
            $arrCitiesList = $this->City->getCities();
        }
        
        if( true == isArrVal( $arrCitiesList ) ) {
            $arrmixResponseData['success'] = true;
            $arrmixResponseData['message'] = 'Data found for Cities';
            $arrmixResponseData['data'] = $arrCitiesList;
        }else{
            $arrmixResponseData['success'] = false;
            $arrmixResponseData['message'] = 'No Cities data found';
        }
        
        $this->response( $arrmixResponseData );
    }
    
    public function fetchCertifications(){
        
        if( true == isArrVal( getCertifications() ) ) {
            $arrmixResponseData['success'] = true;
            $arrmixResponseData['message'] = 'Data found for Certfications';
            $arrmixResponseData['data'] = getCertifications();
        }else{
            $arrmixResponseData['success'] = false;
            $arrmixResponseData['message'] = 'No Certifiations data found';
        }
        
        $this->response( $arrmixResponseData );
    }
    
    public function fetchCertificationAgencies(){
        
        $arrCertificationAgencies = $this->CertificationAgency->getCertificationAgenciesVerified();

        if( true == isArrVal( $arrCertificationAgencies ) ) {
            $arrmixResponseData['success'] = true;
            $arrmixResponseData['message'] = 'Data found for Certfication Agenices';
            $arrmixResponseData['data'] = $arrCertificationAgencies;
        }else{
            $arrmixResponseData['success'] = false;
            $arrmixResponseData['message'] = 'No Certifiations data found';
        }
        
        $this->response( $arrmixResponseData );
    }
    
    public function fetchCategories() {
        
        $arrProductCategoriesList = $this->ProductCategory->getActiveProductCategorys();

        if( true == isArrVal( $arrProductCategoriesList ) ) {
            $arrmixResponseData['success'] = true;
            $arrmixResponseData['message'] = 'Successfully fetch categories list data';
            $arrmixResponseData['data'] = $arrProductCategoriesList;
        }else{
            $arrmixResponseData['success'] = false;
            $arrmixResponseData['message'] = 'No data found';
        }
        
        $this->response( $arrmixResponseData );
    }
    
    public function fetchProducts() {
        
        $arrProductList = $this->Product->getActiveProducts();

        if( true == isArrVal( $arrProductList ) ) {
            $arrmixResponseData['success'] = true;
            $arrmixResponseData['message'] = 'Successfully fetch product list data';
            $arrmixResponseData['data'] = $arrProductList;
        }else{
            $arrmixResponseData['success'] = false;
            $arrmixResponseData['message'] = 'No data found';
        }
        
        $this->response( $arrmixResponseData );
    }

    public function fetchAppSliderImages() {
        
        $arrAppSliderImagesList = $this->AppSliderImages->getAppSliderImages();
        if( true == isArrVal( $arrAppSliderImagesList ) ) {
            foreach( $arrAppSliderImagesList as $arrAppSliderImagesDetails ) {
                $arrAppSliderImagesDetails['slider_image'] = base_url() . APP_SLIDER_IMAGE_PATH . $arrAppSliderImagesDetails['slider_image'];
                $arrmixAppSliderImagesList[] = $arrAppSliderImagesDetails;
            }
        
            $arrmixResponseData['success'] = true;
            $arrmixResponseData['message'] = 'Successfully fetch slider image list data';
            $arrmixResponseData['data'] = $arrmixAppSliderImagesList;
        }else{
            $arrmixResponseData['success'] = false;
            $arrmixResponseData['message'] = 'No data found';
        }
        
        $this->response( $arrmixResponseData );
    }
    
}
