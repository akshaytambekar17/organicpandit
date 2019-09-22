<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserMicroNutrientsController extends MY_Controller {

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
        $arrData['strTitle'] = 'Micro Nutrient List';
        $arrData['title'] = 'Micro Nutrient List';
        $arrData['strHeading'] = 'Micro Nutrient List';
        $arrData['view'] = 'user-micro-nutrient/list';
        if( ADMINUSERNAME == $this->arrUserSession['username'] ){ 
            $arrData['arrUserMicroNutrientsList'] = $this->UserMicroNutrient->getUserMicroNutrients();
        } else {
            $arrData['arrUserMicroNutrientsList'] = $this->UserMicroNutrient->getUserMicroNutrientByUserId( $this->arrUserSession['user_id'] );
        }    
        
        $this->backendLayout( $arrData );
    }

    public function add() {
        
        $arrData['backend'] = true;
        $arrData['arrUsersList'] = $this->User->getUsersByUserType();
        $arrData['arrUserSessionDetails'] = $this->arrUserSession;
        $arrData['strTitle'] = 'Add Micro Nutrient';
        $arrData['title'] = 'Add Micro Nutrient';
        $arrData['strHeading'] = 'Add Micro Nutrient';
        $arrData['strSubmitValue'] = 'Add Micro Nutrient';
        $arrData['view'] = 'user-micro-nutrient/form-details';
        if( $this->input->post() ) {
            $arrPost = $this->input->post();
            printDie( $arrPost );
            if( ADMINUSERNAME == $this->arrUserSession['username'] ) {
                $this->form_validation->set_rules('user_id', 'User', 'trim|required');
            }
            $this->form_validation->set_rules('element', 'Element', 'trim|required');
            $this->form_validation->set_rules('percentage', 'Percentage', 'trim|required');
            
            if( true == $this->form_validation->run() ) {
                $arrDetails = $arrPost;
                
                $arrUserDetails = $this->User->getUserById( $arrPost['user_id'] );
                $arrDetails['user_type_id'] = $arrUserDetails['user_type_id'];
                
                $intUserMicroNutrientId = $this->UserMicroNutrient->insert( $arrDetails );
                if( true == isIdVal( $intUserMicroNutrientId ) ) {
                    $this->session->set_flashdata( 'Message', 'Micro Nutrient has been added succesfully' );
                    return redirect( 'admin/user/user-micro-nutrients', 'refresh' );
                } else {
                    $this->session->set_flashdata( 'Error', 'Failed to add Micro Nutrient' );
                    $this->backendLayout( $arrData );
                }
            } else {
                printDie( validation_errors() );
                $this->backendLayout( $arrData );
            }    
            
        } else {
            $this->backendLayout( $arrData );
        }
    }

    public function update() {
        $arrGet = $this->input->get();

        $arrUserMicroNutrientDetails = $this->UserMicroNutrient->getUserMicroNutrientByUserMicroNutrientId( $arrGet['id'] );
        if( false == isArrVal( $arrUserMicroNutrientDetails ) ) {
            $this->session->set_flashdata( 'Error', 'Micro Nutrient not found.' );
            redirect( 'admin/user/user-soils', 'refresh' );
        }
        $arrData['backend'] = true;
        $arrData['arrUsersList'] = $this->User->getUsersByUserType();
        $arrData['arrUserSessionDetails'] = $this->arrUserSession;
        $arrData['arrUserMicroNutrientDetails'] = $arrUserMicroNutrientDetails;
        $arrData['strTitle'] = 'Update Micro Nutrient';
        $arrData['title'] = 'Update Micro Nutrient';
        $arrData['strHeading'] = 'Update Micro Nutrient';
        $arrData['strSubmitValue'] = 'Update Micro Nutrient';
        $arrData['view'] = 'user-micro-nutrient/form-details';

        if( $this->input->post() ) {
            $arrPost = $this->input->post();
            if( ADMINUSERNAME == $this->arrUserSession['username'] ) {
                $this->form_validation->set_rules('user_id', 'User', 'trim|required');
            }
            $this->form_validation->set_rules('element', 'Element', 'trim|required');
            $this->form_validation->set_rules('percentage', 'Percentage', 'trim|required');
            
            if( true == $this->form_validation->run() ) {
                
                $arrDetails = $arrPost;
                $arrUserDetails = $this->User->getUserById( $arrPost['user_id'] );
                $arrDetails['user_type_id'] = $arrUserDetails['user_type_id'];
                
                $boolResult = $this->UserMicroNutrient->update( $arrDetails );

                if( true == isVal( $boolResult ) ) {
                    $this->session->set_flashdata( 'Message', 'Micro Nutrient has been updated succesfully' );
                    return redirect( 'admin/user/user-soils', 'refresh' );
                } else {
                    $this->session->set_flashdata( 'Error', 'Failed to update Micro Nutrient ' );
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
        $boolResult = $this->UserMicroNutrient->delete( $arrPost['id'] );
        if( true == isStrVal( $boolResult ) ) {
            echo true;
        } else {
            echo false;
        }
    }
    
}
