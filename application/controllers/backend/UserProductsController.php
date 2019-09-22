<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserProductsController extends MY_Controller {

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
        $arrData['strTitle'] = 'User Products List';
        $arrData['title'] = 'User Products List';
        $arrData['strHeading'] = 'User Products List';
        $arrData['view'] = 'user-product/list';
        if( ADMINUSERNAME == $this->arrUserSession['username'] ){ 
            $arrData['arrUserProductsList'] = $this->UserProduct->getUserProducts();
        } else {
            $arrData['arrUserProductsList'] = $this->UserProduct->getUserProductsByUserId( $this->arrUserSession['user_id'] );
        }    
        $this->backendLayout( $arrData );
    }

    public function add() {
        
        $arrData['backend'] = true;
        $arrData['arrProductList'] = $this->Product->getActiveProducts();
        $arrData['arrUsersList'] = $this->User->getUsersByUserType();
        $arrData['arrUserSessionDetails'] = $this->arrUserSession;
        $arrData['strTitle'] = 'Add Product';
        $arrData['title'] = 'Add Product';
        $arrData['strHeading'] = 'Add Product';
        $arrData['strSubmitValue'] = 'Add Product';
        $arrData['view'] = 'user-product/form-details';

        if( $this->input->post() ) {
            $arrPost = $this->input->post();
            if( ADMINUSERNAME == $this->arrUserSession['username'] ) {
                $this->form_validation->set_rules('user_id', 'User', 'trim|required');
            }
            if( true == $this->form_validation->run( 'user-product-form' ) ) {
                $arrDetails = $arrPost;
                
                if(  true == isStrVal( $_FILES['images']['name'] ) ) {
                    $arrConfig['upload_path'] = './assets/images/product_images/';
                    $arrConfig['allowed_types'] = 'gif|jpg|png|jpeg';
                    $arrConfig['max_size'] = 2048;
                    $this->load->library( 'upload', $arrConfig );

                    if( $this->upload->do_upload('images') ) {
                        $arrUploadData = $this->upload->data();
                        $strProductImage = $arrUploadData['file_name'];
                        $strError = '';
                    } else {
                        $strError = $this->upload->display_errors();
                        $strProductImage = '';
                    }
                } else {
                    $strProductImage = '';
                    $strError = '';
                }
                if( false == isStrVal( $strError ) ) { 
                    $arrDetails['images'] = $strProductImage;
                    $arrProductDetails = $this->Product->getProductById( $arrPost['product_id'] );
                    $arrDetails['name'] = $arrProductDetails['name'];
                    $strToDate = str_replace('/', '-', $arrPost['to_date'] );
                    $strFromDate = str_replace('/', '-', $arrPost['from_date'] );
                    
                    $arrDetails['to_date'] = date( 'Y-m-d', strtotime( $strToDate ) );
                    $arrDetails['from_date'] = date( 'Y-m-d', strtotime( $strFromDate ) );
                    
                    $intUserProductId = $this->UserProduct->insert( $arrDetails );
                    if( true == isIdVal( $intUserProductId ) ) {
                        $this->session->set_flashdata( 'Message', 'Product <b>' . $arrDetails['name'] . '</b> has been added succesfully' );
                        return redirect( 'admin/user/user-products', 'refresh' );
                    } else {
                        $this->session->set_flashdata( 'Error', 'Failed to add product ' . $arrDetails['name'] );
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

        $arrUserProductDetails = $this->UserProduct->getUserProductsByUserProductId( $arrGet['id'] );
        if( false == isArrVal( $arrUserProductDetails ) ) {
            $this->session->set_flashdata( 'Error', 'Product not found.' );
            redirect( 'admin/user/user-products', 'refresh' );
        }
        $arrData['backend'] = true;
        $arrData['arrProductList'] = $this->Product->getActiveProducts();
        $arrData['arrUsersList'] = $this->User->getUsersByUserType();
        $arrData['arrUserSessionDetails'] = $this->arrUserSession;
        $arrData['arrUserProductDetails'] = $arrUserProductDetails;
        $arrData['strTitle'] = 'Update Product';
        $arrData['title'] = 'Update Product';
        $arrData['strHeading'] = $arrUserProductDetails['name'] . ' Product';
        $arrData['strSubmitValue'] = 'Update Product';
        $arrData['view'] = 'user-product/form-details';

        if( $this->input->post() ) {
            $arrPost = $this->input->post();
            if( true == $this->form_validation->run( 'user-product-form' ) ) {
                if(  true == isStrVal( $_FILES['images']['name'] ) ) {
                    $arrConfig['upload_path'] = './assets/images/product_images/';
                    $arrConfig['allowed_types'] = 'gif|jpg|png|jpeg';
                    $arrConfig['max_size'] = 2048;
                    $this->load->library( 'upload', $arrConfig );

                    if( $this->upload->do_upload('images') ) {
                        $arrUploadData = $this->upload->data();
                        $strProductImage = $arrUploadData['file_name'];
                        $strError = '';
                    } else {
                        $strError = $this->upload->display_errors();
                        $strProductImage = '';
                    }
                } else {
                    $strProductImage = $arrPost['images_hidden'];
                    $strError = '';
                }
                if( false == isStrVal( $strError ) ) { 
                    $arrDetails = $arrPost;
                    unset( $arrDetails['images_hidden'] );
                    $arrDetails['images'] = $strProductImage;
                    $arrProductDetails = $this->Product->getProductById( $arrPost['product_id'] );
                    $arrDetails['name'] = $arrProductDetails['name'];
                    
                    $strToDate = str_replace('/', '-', $arrPost['to_date'] );
                    $strFromDate = str_replace('/', '-', $arrPost['from_date'] );
                    
                    $arrDetails['to_date'] = date( 'Y-m-d', strtotime( $strToDate ) );
                    $arrDetails['from_date'] = date( 'Y-m-d', strtotime( $strFromDate ) );
                    $boolResult = $this->UserProduct->update( $arrDetails );
                    
                    if( true == isVal( $boolResult ) ) {
                        $this->session->set_flashdata( 'Message', 'Product <b>' . $arrDetails['name'] . '</b> has been updated succesfully' );
                        return redirect( 'admin/user/user-products', 'refresh' );
                    } else {
                        $this->session->set_flashdata( 'Error', 'Failed to update Product ' . $arrDetails['name'] );
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
        $boolResult = $this->UserProduct->delete( $arrPost['id'] );
        if( true == isStrVal( $boolResult ) ) {
            echo true;
        } else {
            echo false;
        }
    }
    
}
