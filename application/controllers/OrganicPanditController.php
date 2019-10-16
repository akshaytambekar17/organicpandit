<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OrganicPanditController extends MY_Controller {

    function __construct() {
        parent::__construct();
        $arrSession = UserSession();
        if (false == $arrSession['success']) {
            redirect('home', 'refresh');
        } else {
            $this->arrUserSession = $arrSession['userData'];
        }
    }

    public function index() {
        printDie( "This is Common Controller" );
    }
    
    public function fetchCitiesByStateId() {
        $arrPost = $this->input->post();
        $arrCitiesList = $this->Districts->getCityByStateId( $arrPost['state_id'] );
        $intCityId = isset( $arrPost['hidden_city_id'] ) ? $arrPost['hidden_city_id'] : '';
        
        $strHtml = array();
        if( true == isArrVal( $arrCitiesList ) ) {
            foreach( $arrCitiesList as $arrCityDetails ) {
                $strSelected = '';
                if( $intCityId == $arrCityDetails['id']) {
                    $strSelected = 'selected="selected"';
                }
                
                $strHtmlData = ' <option value="' . $arrCityDetails['id'] . '" ' . set_select( 'city_id', $arrCityDetails['id'] ) . ' ' . $strSelected . ' > ' . $arrCityDetails['name'] . '</option>';
                $strHtml[] = $strHtmlData;
            }
        }
        echo json_encode( $strHtml );
    }
    
    public function fetchStatesByCountryId() {
        $arrPost = $this->input->post();
        $arrStatesList = $this->State->getStatesByCountryId( $arrPost['state_id'] );
        $intStateId = isset( $arrPost['hidden_state_id'] ) ? $arrPost['hidden_state_id'] : '';
        
        $strHtml = array();
        if( true == isArrVal( $arrStatesList ) ) {
            foreach( $arrStatesList as $arrStateDetails ) {
                $strSelected = '';
                if( $intStateId == $arrStateDetails['id']) {
                    $strSelected = 'selected="selected"';
                }
                
                $strHtmlData = ' <option value="' . $arrStateDetails['id'] . '" ' . set_select( 'state_id', $arrStateDetails['id'] ) . ' ' . $strSelected . ' > ' . $arrStateDetails['name'] . '</option>';
                $strHtml[] = $strHtmlData;
            }
        }
        echo json_encode( $strHtml );
    }
    
    public function fetchProductsByCategoryId() {
        $arrPost = $this->input->post();

        $arrProductList = $this->Product->getProductByCategoryId( $arrPost['category_id'] );
        if( true == isset( $arrPost['hidden_product_id'] ) ) {
            $intProductId = $arrPost['hidden_product_id'];
        } else {
            $intProductId = '';
        }
        
        $arrHtml = array();
        if( true == isArrVal( $arrProductList ) ) {
            foreach( $arrProductList as $arrProductDetails ) {
                if( true == isIdVal( $intProductId ) ) {
                    $strSelected = ( $intProductId == $arrProductDetails['id'] ) ? 'selected="selected"' : '';
                } else {
                    $strSelected = '';
                }
                $strHtml = ' <option value="' . $arrProductDetails['id'] . '" ' . set_select('product_id', $arrProductDetails['id']) . ' ' . $strSelected . ' > ' . $arrProductDetails['name'] . '</option>';
                $arrHtml[] = $strHtml;
            }
        }
        echo json_encode( $arrHtml );
    }
}
