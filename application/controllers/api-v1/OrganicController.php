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
            $arrResult['data'] = $arrCitiesList;
        }else{
            $arrResult['success'] = false;
            $arrResult['message'] = 'No Cities data found';
        }
        
        $this->response( $arrResult );
    }
    
}
