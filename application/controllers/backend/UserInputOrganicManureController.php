<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserInputOrganicManureController extends MY_Controller {

    function __construct() {
        parent::__construct();
        $arrSession = UserSession();
        if( false == $arrSession['success'] ) {
            redirect( 'home', 'refresh' );
        } else {
            $this->arrUserSession = $arrSession['userData'];
        }
    }

    public function index() {
        $arrData['backend'] = true;
        $arrData['strTitle'] = 'Input Organic Manures List';
        $arrData['title'] = 'Input Organic Manures List';
        $arrData['strHeading'] = 'Input Organic Manures List';
        $arrData['view'] = 'user-input-organic-manure/list';
        if( ADMINUSERNAME == $this->arrUserSession['username'] ){ 
            $arrData['arrUserInputOrganicManuresList'] = $this->UserInputOrganic->getUsersInputOrganic();
        } else {
            $arrData['arrUserInputOrganicManuresList'] = $this->UserInputOrganic->getUserInputOrganicByUserId( $this->arrUserSession['user_id'] );
        }    
        $this->backendLayout( $arrData );
    }

    public function add() {
        
        $arrData['backend'] = true;
        $arrData['arrUsersList'] = $this->User->getUsersByUserTypeOtherThenProducts();
        $arrData['arrUserSessionDetails'] = $this->arrUserSession;
        $arrData['strTitle'] = 'Add Input Organic Manure';
        $arrData['title'] = 'Add Input Organic Manure';
        $arrData['strHeading'] = 'Add Input Organic Manure';
        $arrData['strSubmitValue'] = 'Add Input Organic Manures';
        $arrData['view'] = 'user-input-organic-manure/form-details';

        if( $this->input->post() ) {
            $arrPost = $this->input->post();
            
            $this->form_validation->set_rules('user_id', 'User', 'trim|required');
            $this->form_validation->set_rules('input_date', 'Input Date', 'trim|required');
            $this->form_validation->set_rules('input_name', 'Input Name', 'trim|required');
            $this->form_validation->set_rules('supplier_name', 'Supplier Name', 'trim|required');
            $this->form_validation->set_rules('total_area', 'Area', 'trim|required');
            $this->form_validation->set_rules('other_details', 'Other Details', 'trim|required');
            
            if( true == $this->form_validation->run() ) {
                $arrDetails = $arrPost;
                
                $arrUserDetails = $this->User->getUserById( $arrPost['user_id'] );
                $arrDetails['user_type_id'] = $arrUserDetails['user_type_id'];
                
                $strInputDate = str_replace('/', '-', $arrPost['input_date'] );
                
                $arrDetails['input_date'] = date( 'Y-m-d', strtotime( $strInputDate ) );
                
                $intUserInputOrganicId = $this->UserInputOrganic->insert( $arrDetails );
                if( true == isIdVal( $intUserInputOrganicId ) ) {
                    $this->session->set_flashdata( 'Message', 'Input Organic Manure has been added succesfully' );
                    return redirect( 'admin/user/user-input-organic-manures', 'refresh' );
                } else {
                    $this->session->set_flashdata( 'Error', 'Failed to add Input Organic Manure' );
                    $this->backendLayout( $arrData );
                }
            } else {
                $this->backendLayout( $arrData );
            }    
            
        } else {
            $this->backendLayout( $arrData );
        }
    }

    public function update() {
        $arrGet = $this->input->get();

        $arrUserInputOrganicManureDetails = $this->UserInputOrganic->getUserInputOrganicById( $arrGet['id'] );
        if( false == isArrVal( $arrUserInputOrganicManureDetails ) ) {
            $this->session->set_flashdata( 'Error', 'Input Organic Manure not found.' );
            redirect( 'admin/user/user-input-organic-manures', 'refresh' );
        }
        $arrData['backend'] = true;
        $arrData['arrUsersList'] = $this->User->getUsersByUserTypeOtherThenProducts();
        $arrData['arrUserSessionDetails'] = $this->arrUserSession;
        $arrData['arrUserInputOrganicManureDetails'] = $arrUserInputOrganicManureDetails;
        $arrData['strTitle'] = 'Update Input Organic Manure';
        $arrData['title'] = 'Update Input Organic Manure';
        $arrData['strHeading'] = 'Update Input Organic Manure';
        $arrData['strSubmitValue'] = 'Update Input Organic Manures';
        $arrData['view'] = 'user-input-organic-manure/form-details';

        if( $this->input->post() ) {
            $arrPost = $this->input->post();
            
            $this->form_validation->set_rules('user_id', 'User', 'trim|required');
            $this->form_validation->set_rules('input_date', 'Input Date', 'trim|required');
            $this->form_validation->set_rules('input_name', 'Input Name', 'trim|required');
            $this->form_validation->set_rules('supplier_name', 'Supplier Name', 'trim|required');
            $this->form_validation->set_rules('total_area', 'Area', 'trim|required');
            $this->form_validation->set_rules('other_details', 'Other Details', 'trim|required');
            
            if( true == $this->form_validation->run() ) {
                
                $arrDetails = $arrPost;
                
                $arrUserDetails = $this->User->getUserById( $arrPost['user_id'] );
                $arrDetails['user_type_id'] = $arrUserDetails['user_type_id'];
                
                $strInputDate = str_replace('/', '-', $arrPost['input_date'] );
                
                $arrDetails['input_date'] = date( 'Y-m-d', strtotime( $strInputDate ) );
     
                $boolResult = $this->UserInputOrganic->update( $arrDetails );
                if( true == isVal( $boolResult ) ) {
                    $this->session->set_flashdata( 'Message', 'Input Organic Manure has been updated succesfully' );
                    return redirect( 'admin/user/user-input-organic-manures', 'refresh' );
                } else {
                    $this->session->set_flashdata( 'Error', 'Failed to update Input Organic Manure' );
                    $this->backendLayout( $arrData );
                }
                
            } else {
                $this->backendLayout( $arrData );
            }
        } else {
            $this->backendLayout( $arrData );
        }
    }

    public function delete() {
        $arrPost = $this->input->post();
        $boolResult = $this->UserInputOrganic->delete( $arrPost['id'] );
        if( true == isStrVal( $boolResult ) ) {
            echo true;
        } else {
            echo false;
        }
    }
    
}
