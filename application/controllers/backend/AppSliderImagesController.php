<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AppSliderImagesController extends MY_Controller {

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
        $arrData['strTitle'] = 'Slider Images List';
        $arrData['title'] = 'Slider Images List';
        $arrData['strHeading'] = 'Slider Images List';
        $arrData['view'] = 'app-slider-images/list';
        $arrData['arrAppSliderImagesList'] = $this->AppSliderImages->getAppSliderImages();
        
        $this->backendLayout( $arrData );
    }

    public function add() {
        
        $arrData['backend'] = true;
        $arrData['arrUserSessionDetails'] = $this->arrUserSession;
        $arrData['strTitle'] = 'Add App Slider Image';
        $arrData['title'] = 'Add App Slider Image';
        $arrData['strHeading'] = 'Add App Slider Image';
        $arrData['strSubmitValue'] = 'Add App Slider Image';
        $arrData['view'] = 'app-slider-images/form-details';

        if( $this->input->post() ) {
            
            $arrPost = $this->input->post();
            if( empty( $_FILES['slider_image']['name'] ) ) {
                $this->form_validation->set_rules( 'slider_image', 'Slider Image', 'trim|required' );
            }
            
            $this->form_validation->set_rules( 'slider_image_value', 'Slider Image Value', 'trim' );
            
            if( true == $this->form_validation->run() ) {
                unset( $arrPost['slider_images_value'] );
                $arrDetails = $arrPost;
                $strError = '';
                if( true == isset( $_FILES['slider_image']['name'] ) && ( true == isStrVal( $_FILES['slider_image']['name'] ) ) ) {
                    $arrConfigSliderImage['upload_path'] = './assets/images/app-slider-images/';
                    $arrConfigSliderImage['allowed_types'] = 'gif|jpg|png|jpeg';
                    $arrConfigSliderImage['max_size'] = 2048;

                    $this->load->library( 'upload', $arrConfigSliderImage );
                    if( $this->upload->do_upload( 'slider_image' ) ) {
                        $arrUploadData = $this->upload->data();
                        $strSliderImage = $arrUploadData['file_name'];
                    } else {
                        $strError = $this->upload->display_errors();
                        $strSliderImage = '';
                    }
                } else {
                    $strSliderImage = '';
                }
                if( false == isStrVal( $strError ) ) {
                    
                    $arrDetails['slider_image'] = $strSliderImage;
                    $intAppSliderImage = $this->AppSliderImages->insert( $arrDetails );
                    if( true == isIdVal( $intAppSliderImage ) ) {
                        $this->session->set_flashdata( 'Message', 'New Slider Image has been added succesfully' );
                        return redirect( 'admin/app-slider-images', 'refresh' );
                    } else {
                        $this->session->set_flashdata( 'Error', 'Failed to add App Slider Image' );
                        $this->backendLayout( $arrData );
                    }
                } else {
                    $this->session->set_flashdata( 'Error', $strError );
                    $arrData['strErrorMessage'] = $strError;
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

        $arrAppSliderImageDetails = $this->AppSliderImages->getAppSliderImageByAppSliderImageId( $arrGet['app_slider_image_id'] );
        if( false == isArrVal( $arrAppSliderImageDetails ) ) {
            $this->session->set_flashdata( 'Error', 'Slider not found.' );
            redirect( 'admin/app-slider-images', 'refresh' );
        }
        $arrData['backend'] = true;
        $arrData['arrUserSessionDetails'] = $this->arrUserSession;
        $arrData['arrAppSliderImageDetails'] = $arrAppSliderImageDetails;
        $arrData['strTitle'] = 'Update App Slider Image';
        $arrData['title'] = 'Update App Slider Image';
        $arrData['strHeading'] = 'Update App Slider Image';
        $arrData['strSubmitValue'] = 'Update App Slider Image';
        $arrData['view'] = 'app-slider-images/form-details';

        if( $this->input->post() ) {
            $arrPost = $this->input->post();
            
            if( empty( $_FILES['slider_image']['name'] ) ) {
                $this->form_validation->set_rules( 'slider_image', 'Slider Image', 'trim|required' );
            }
            $this->form_validation->set_rules( 'slider_image_value', 'Slider Image Value', 'trim' );
            if( true == $this->form_validation->run() ) {
                
                unset( $arrPost['slider_images_value'] );
                $arrDetails = $arrPost;
                $strError = '';
                if( true == isset( $_FILES['slider_image']['name'] ) && ( true == isStrVal( $_FILES['slider_image']['name'] ) ) ) {
                    $arrConfigSliderImage['upload_path'] = './assets/images/app-slider-images/';
                    $arrConfigSliderImage['allowed_types'] = 'gif|jpg|png|jpeg';
                    $arrConfigSliderImage['max_size'] = 2048;

                    $this->load->library( 'upload', $arrConfigSliderImage );
                    
                    if( $this->upload->do_upload( 'slider_image' ) ) {
                        $arrUploadData = $this->upload->data();
                        $strSliderImage = $arrUploadData['file_name'];
                    } else {
                        $strError = $this->upload->display_errors();
                        $strSliderImage = '';
                    }
                } else {
                    $strSliderImage = true == isset( $arrPost['slider_image_hidden'] ) ? $arrPost['slider_image_hidden'] : '';
                }
                if( false == isStrVal( $strError ) ) {
                    
                    unset( $arrDetails['slider_image_hidden'] );
                    $arrDetails['slider_image'] = $strSliderImage;
                    $boolResult = $this->AppSliderImages->update( $arrDetails );

                    if( true == isVal( $boolResult ) ) {
                        $this->session->set_flashdata( 'Message', 'Slider Image has been updated succesfully' );
                        return redirect( 'admin/app-slider-images', 'refresh' );
                    } else {
                        $this->session->set_flashdata( 'Error', 'Failed to update App Slider Image' );
                        $this->backendLayout( $arrData );
                    }
                } else {
                    $this->session->set_flashdata( 'Error', $strError );
                    $arrData['strErrorMessage'] = $strError;
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
        $boolResult = $this->AppSliderImages->delete( $arrPost['app_slider_image_id'] );
        if( true == isVal( $boolResult ) ) {
            echo true;
        } else {
            echo false;
        }
    }
    
}
