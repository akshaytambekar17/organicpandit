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
    
    public function fetchDistrictListByStateId() {
//        $arrPost = $this->input->post();
//        $arrDistrictsList = $this->Districts->getDistrictByStateId( $arrPost['state_id'] );
//        $intDistrictId = isset( $arrPost['hidden_district_id'] ) ? $arrPost['hidden_district_id'] : '';
//        
//        $strHtml = array();
//        if( true == isArrVal( $arrDistrictsList ) ) {
//            foreach( $arrDistrictsList as $arrDistrictDetails ) {
//                $strSelected = '';
//                if( $intDistrictId == $arrDistrictDetails['district_id']) {
//                    $strSelected = 'selected="selected"';
//                }
//                
//                $data2 = ' <option value="' . $arrDistrictDetails['district_id'] . '" ' . set_select( 'district_id', $arrDistrictDetails['district_id'] ) . ' ' . $strSelected . ' > ' . $arrDistrictDetails['district_name'] . '</option>';
//                $strHtml[] = $data2;
//            }
//        }
//        echo json_encode( $strHtml );
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
