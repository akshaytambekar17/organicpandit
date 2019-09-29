<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserOrganicInputEcommercesController extends MY_Controller {

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
        $arrData['strTitle'] = 'User Organic Input Ecommerce List';
        $arrData['title'] = 'User Organic Input Ecommerce List';
        $arrData['strHeading'] = 'User Organic Input Ecommerce List';
        $arrData['view'] = 'user-organic-input-ecommerce/list';
        if( ADMINUSERNAME == $this->arrUserSession['username'] ){ 
            $arrData['arrUserOrganicInputEcommercesList'] = $this->UserInputOrganicEcommerce->getUsersInputOrganicEcommerce();
        } else {
            $arrData['arrUserOrganicInputEcommercesList'] = $this->UserInputOrganicEcommerce->getUsersInputOrganicEcommerceByUserId( $this->arrUserSession['user_id'] );
        }    
        $this->backendLayout( $arrData );
    }

    public function add() {
        
        $arrData['backend'] = true;
        $arrData['arrUsersList'] = $this->User->getUserByUserTypeId( ORGANIC_INPUT );
        $arrData['arrUserSessionDetails'] = $this->arrUserSession;
        $arrData['strTitle'] = 'Add Orgnic Input E-Commerce';
        $arrData['title'] = 'Add Orgnic Input E-Commerce';
        $arrData['strHeading'] = 'Add Orgnic Input E-Commerce';
        $arrData['strSubmitValue'] = 'Add Orgnic Input E-Commerce';
        $arrData['view'] = 'user-organic-input-ecommerce/form-details';

        if( $this->input->post() ) {
            $arrPost = $this->input->post();
            
            if( true == $this->form_validation->run( 'user-organic-input-ecommerce-form' ) ) {
                $arrDetails = $arrPost;
                
                if(  true == isStrVal( $_FILES['images']['name'] ) ) {
                    $arrConfig['upload_path'] = './assets/images/ecommerce_images/';
                    $arrConfig['allowed_types'] = 'gif|jpg|png|jpeg';
                    $arrConfig['max_size'] = 2048;
                    $this->load->library( 'upload', $arrConfig );

                    if( $this->upload->do_upload('images') ) {
                        $arrUploadData = $this->upload->data();
                        $strOraganicInputEcommerceImage = $arrUploadData['file_name'];
                        $strError = '';
                    } else {
                        $strError = $this->upload->display_errors();
                        $strOraganicInputEcommerceImage = '';
                    }
                } else {
                    $strOraganicInputEcommerceImage = '';
                    $strError = '';
                }
                if( false == isStrVal( $strError ) ) { 
                    $arrDetails['images'] = $strOraganicInputEcommerceImage;
                    $arrUserDetails = $this->User->getUserById( $arrPost['user_id'] );
                    $arrDetails['user_type_id'] = $arrUserDetails['user_type_id'];
                    
                    $intUserOrganicInputEcommerceId = $this->UserInputOrganicEcommerce->insert( $arrDetails );
                    if( true == isIdVal( $intUserOrganicInputEcommerceId ) ) {
                        $this->session->set_flashdata( 'Message', 'New Organic Input E-Commerce has been added succesfully' );
                        return redirect( 'admin/user/user-organic-input-ecommerces', 'refresh' );
                    } else {
                        $this->session->set_flashdata( 'Error', 'Failed to add Organic Input E-Commerce ' );
                        $this->backendLayout( $arrData );
                    }
                } else {
                    $this->session->set_flashdata( 'Error', $strError );
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

        $arrUserOrganicInputEcommerceDetails = $this->UserInputOrganicEcommerce->getUsersInputOrganicEcommerceById( $arrGet['id'] );
        if( false == isArrVal( $arrUserOrganicInputEcommerceDetails ) ) {
            $this->session->set_flashdata( 'Error', 'Oragnic Input Ecommerce not found.' );
            redirect( 'admin/user/user-organic-input-ecommerces', 'refresh' );
        }
        $arrData['backend'] = true;
        $arrData['arrUsersList'] = $this->User->getUserByUserTypeId( ORGANIC_INPUT );
        $arrData['arrUserSessionDetails'] = $this->arrUserSession;
        $arrData['arrUserOrganicInputEcommerceDetails'] = $arrUserOrganicInputEcommerceDetails;
        $arrData['strTitle'] = 'Update Orgnic Input E-Commerce';
        $arrData['title'] = 'Update Orgnic Input E-Commerce';
        $arrData['strHeading'] = 'Update Orgnic Input E-Commerce';
        $arrData['strSubmitValue'] = 'Update Orgnic Input E-Commerce';
        $arrData['view'] = 'user-organic-input-ecommerce/form-details';

        if( $this->input->post() ) {
            $arrPost = $this->input->post();
            if( true == $this->form_validation->run( 'user-organic-input-ecommerce-form' ) ) {
                if(  true == isStrVal( $_FILES['images']['name'] ) ) {
                    $arrConfig['upload_path'] = './assets/images/ecommerce_images/';
                    $arrConfig['allowed_types'] = 'gif|jpg|png|jpeg';
                    $arrConfig['max_size'] = 2048;
                    $this->load->library( 'upload', $arrConfig );

                    if( $this->upload->do_upload('images') ) {
                        $arrUploadData = $this->upload->data();
                        $strOraganicInputEcommerceImage = $arrUploadData['file_name'];
                        $strError = '';
                    } else {
                        $strError = $this->upload->display_errors();
                        $strOraganicInputEcommerceImage = '';
                    }
                } else {
                    $strOraganicInputEcommerceImage = $arrPost['images_hidden'];
                    $strError = '';
                }
                if( false == isStrVal( $strError ) ) { 
                    $arrDetails = $arrPost;
                    unset( $arrDetails['images_hidden'] );
                    $arrDetails['images'] = $strOraganicInputEcommerceImage;
                    
                    $arrUserDetails = $this->User->getUserById( $arrPost['user_id'] );
                    $arrDetails['user_type_id'] = $arrUserDetails['user_type_id'];
                    
                    $boolResult = $this->UserInputOrganicEcommerce->update( $arrDetails );
                    
                    if( true == isVal( $boolResult ) ) {
                        $this->session->set_flashdata( 'Message', 'Organice Input E-Commerce has been updated succesfully' );
                        return redirect( 'admin/user/user-organic-input-ecommerces', 'refresh' );
                    } else {
                        $this->session->set_flashdata( 'Error', 'Failed to update Organice Input E-Commerce' );
                        $this->backendLayout( $arrData );
                    }
                } else {
                    $this->session->set_flashdata( 'Error', $strError );
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
        $boolResult = $this->UserInputOrganicEcommerce->delete( $arrPost['id'] );
        if( true == isStrVal( $boolResult ) ) {
            echo true;
        } else {
            echo false;
        }
    }
    
}
