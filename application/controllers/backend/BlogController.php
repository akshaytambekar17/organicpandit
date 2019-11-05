<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BlogController extends MY_Controller {

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
        $arrData['strTitle'] = 'Blogs List';
        $arrData['title'] = 'Blogs List';
        $arrData['strHeading'] = 'Blogs List';
        $arrData['view'] = 'blog/list';
        $arrData['arrBlogsList'] = $this->Blog->getBlogs();
        
        $this->backendLayout( $arrData );
    }

    public function add() {
        
        $arrData['backend'] = true;
        $arrData['arrUsersList'] = $this->User->getUsersByUserTypeOtherThenProducts();
        $arrData['arrUserSessionDetails'] = $this->arrUserSession;
        $arrData['strTitle'] = 'Add Soil';
        $arrData['title'] = 'Add Soil';
        $arrData['strHeading'] = 'Add Soil';
        $arrData['strSubmitValue'] = 'Add Soil';
        $arrData['view'] = 'user-soil/form-details';

        if( $this->input->post() ) {
            $arrPost = $this->input->post();
            
            $this->form_validation->set_rules('user_id', 'User', 'trim|required');
            $this->form_validation->set_rules('element', 'Element', 'trim|required');
            $this->form_validation->set_rules('percentage', 'Percentage', 'trim|required');
            
            if( true == $this->form_validation->run() ) {
                $arrDetails = $arrPost;
                
                $arrUserDetails = $this->User->getUserById( $arrPost['user_id'] );
                $arrDetails['user_type_id'] = $arrUserDetails['user_type_id'];
                
                $intUserSoilId = $this->UserSoil->insert( $arrDetails );
                if( true == isIdVal( $intUserSoilId ) ) {
                    $this->session->set_flashdata( 'Message', 'Soil has been added succesfully' );
                    return redirect( 'admin/user/user-soils', 'refresh' );
                } else {
                    $this->session->set_flashdata( 'Error', 'Failed to add soil' );
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

        $arrUserSoilDetails = $this->UserSoil->getUserSoilByUserSoilId( $arrGet['id'] );
        if( false == isArrVal( $arrUserSoilDetails ) ) {
            $this->session->set_flashdata( 'Error', 'Soil not found.' );
            redirect( 'admin/user/user-soils', 'refresh' );
        }
        $arrData['backend'] = true;
        $arrData['arrUsersList'] = $this->User->getUsersByUserTypeOtherThenProducts();
        $arrData['arrUserSessionDetails'] = $this->arrUserSession;
        $arrData['arrUserSoilDetails'] = $arrUserSoilDetails;
        $arrData['strTitle'] = 'Update Soil';
        $arrData['title'] = 'Update Soil';
        $arrData['strHeading'] = 'Update Soil';
        $arrData['strSubmitValue'] = 'Update Soil';
        $arrData['view'] = 'user-soil/form-details';

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
                
                $boolResult = $this->UserSoil->update( $arrDetails );

                if( true == isVal( $boolResult ) ) {
                    $this->session->set_flashdata( 'Message', 'Soil has been updated succesfully' );
                    return redirect( 'admin/user/user-soils', 'refresh' );
                } else {
                    $this->session->set_flashdata( 'Error', 'Failed to update Soil ' );
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
        $boolResult = $this->UserSoil->delete( $arrPost['id'] );
        if( true == isStrVal( $boolResult ) ) {
            echo true;
        } else {
            echo false;
        }
    }
    
}
