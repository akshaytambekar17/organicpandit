<?php

require_once( APPPATH . "controllers\FrontendController.php");

class UsersController extends FrontendController {

    function __construct() {
        parent::__construct();
    }

    public function actionList() {
        $arrmixRequestData = $this->input->get();
        
        if( false == isset( $arrmixRequestData['user_type_id'] ) || false == isIdVal( $arrmixRequestData['user_type_id'] ) ) {
            $this->session->set_flashdata( 'error', "Invalid UserTypeId" );
            redirect( 'home' );
        }
        
        $arrmixUserSearchList = $this->User->getUserBysearchKey( $arrmixRequestData, LIMIT  );
        $arrmixUserTypeDetails = $this->UserType->getUserTypeById( $arrmixRequestData['user_type_id'] );
        
        $arrmixData = [];
        $arrmixData['strTitle'] = 'Users';
        $arrmixData['strHeading'] = 'Users';
        $arrmixData['view'] = 'users/list';
        
        $arrmixData['arrmixUserSearchList'] = $arrmixUserSearchList;
        $arrmixData['arrmixUserTypeDetails'] = $arrmixUserTypeDetails;
        
        $this->ecommerceFrontendLayout( $arrmixData );
    }
    
}
