<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserShopEcommercesController extends MY_Controller {

    function __construct() {
        parent::__construct();
        $arrSession = UserSession();
        if( false == $arrSession['success'] ) {
            redirect( 'home', 'refresh' );
        } else {
            $this->arrUserSession = $arrSession['userData'];
        }
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $arrGet = $this->input->get();
        $arrUserShopEcommerceList = $this->UserEcommerces->getUserEcommerceByUserId( $arrGet['user_id'] );
        
        if( false == isArrVal( $arrUserShopEcommerceList ) ) {
            $this->session->set_flashdata( 'Error', 'No Products are availabel' );
            return redirect( 'search-user?id=' . SHOPS, 'refresh' );
        }
        $data['arrUserEcommercesList'] = $arrUserShopEcommerceList;
        $arrUserDetails = $this->User->getUserById( $arrGet['user_id'] );
        $data['arrUserDetails'] = $arrUserDetails;
        $data['strTitle'] = 'Shop Products ';
        $data['title'] = 'Shop Products ';
        $data['strHeading'] = 'Products of User ' . $arrUserDetails['fullname'];;
        $data['hide_footer'] = true;
        $data['view'] = 'user-shop-ecommerce/view-user-shop-ecommerce';
        $this->frontendLayout($data);
    }
    
    public function fetchUserShopEcommerceAddToCart() {
        $arrPost = $this->input->post();

        $arrUserEcommerceDetails = $this->UserEcommerces->getUserEcommerceByUserEcommerceId( $arrPost['user_ecommerce_id'] );
	    
        $arrData['arrUserEcommerceDetails'] = $arrUserEcommerceDetails;

        echo $this->load->view( 'modal-box/modal-user-shop-ecommerce-add-to-cart', $arrData );
        
    }

    public function add() {
        $arrProductCategoryList = $this->ProductCategory->getProductCategorys();
        $arrData['arrUsersList'] = $this->User->getUserByUserTypeId( SHOPS );
        $arrData['arrProductCategoryList'] = $arrProductCategoryList;
        $arrData['arrUserSessionDetails'] = $this->arrUserSession;
        $arrData['backend'] = true;
        $arrData['strTitle'] = 'Add Shop Products';
        $arrData['title'] = 'Add Shop Products';
        $arrData['strHeading'] = 'Add Shop Products';
        $arrData['strSubmitValue'] = 'Add Shop Products';
        $arrData['view'] = 'user-shop-ecommerce/form-details';
        
        if( $this->input->post() ) {
            $arrPost = $this->input->post();
            $arrData['strErrorImage'] = '';
//            if( true == empty( $_FILES['primary_image']['name'] ) ) {
//                $this->form_validation->set_rules( 'primary_image', 'Primary Image', 'trim|required' );
//            }
            if( true == $this->form_validation->run( 'user-shop-ecommerce-form' ) ) {
                $arrDetails = $arrPost;
                if( true== isset( $_FILES['primary_image']['name'] ) ) {
                    $config['upload_path'] = './assets/images/product_images/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = 2048;

                    $this->load->library( 'upload', $config );
                    if( $this->upload->do_upload( 'primary_image' ) ) {
                        $arrUploadData = $this->upload->data();
                        $strPrimaryImageName = $arrUploadData['file_name'];
                        $strError = '';
                    } else {
                        $strError = $this->upload->display_errors();
                        $strPrimaryImageName = '';
                    }
                } else {
                        $strPrimaryImageName = '';
                        $strError = '';
                }

                if( false == isVal( $strError ) ) {
                    unset( $arrDetails['primary_image'] );
                    $arrUserDetails = $this->User->getUserById( $arrPost['user_id'] );
                    $arrDetails['user_type_id'] = $arrUserDetails['user_type_id'];    
                    
                    $intUserEcommerceId = $this->UserEcommerces->insert( $arrDetails );
                    if( true == isIdVal( $intUserEcommerceId ) ) {

                        $arrUserEcommerceImageDetails = array(
                                                            'user_ecommerce_id' => $intUserEcommerceId,
                                                            'primary_image' => $strPrimaryImageName,
                                                        );
                        $intUserEcommerceImageId = $this->UserEcommerceImages->insert( $arrUserEcommerceImageDetails );
                        if( true == isIdVal( $intUserEcommerceImageId ) ) {
                            $this->session->set_flashdata( 'Message', 'Shop product has been added successfully. Now you can see in shop product section ' );
                        } else {
                            $this->session->set_flashdata( 'Error', 'Product has been added successfully, but the images cannot be added. Something went wrong. Please try using the update' );
                        }

                        return redirect( 'admin/user/user-shop-ecommerces', 'refresh' );
                    } else {
                        $this->session->set_flashdata( 'Error', 'Failed to add Shop Product' );
                        $this->backendLayout( $arrData );
                    }
                } else {
                        $this->session->set_flashdata('Error', $strError );
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
        $arrUserShopEcommerceDetails = $this->UserEcommerces->getUserEcommerceByUserEcommerceId( $arrGet['user_ecommerce_id'] );
        if( false == isArrVal( $arrUserShopEcommerceDetails ) ) {
            $this->session->set_flashdata( 'Error', 'Failed to fetch Shop Products' );
            return redirect( 'admin/user/user-shop-ecommereces', 'refresh' );
        }
        $arrProductCategoryList = $this->ProductCategory->getProductCategorys();
        $arrData['arrUsersList'] = $this->User->getUserByUserTypeId( SHOPS );
        $arrData['arrProductCategoryList'] = $arrProductCategoryList;
        $arrData['arrUserEcommerceDetails'] = $arrUserShopEcommerceDetails;
        $arrData['arrUserSessionDetails'] = $this->arrUserSession;
        $arrData['backend'] = true;
        $arrData['strTitle'] = 'Update Product ' . $arrUserShopEcommerceDetails['product_name'];
        $arrData['title'] = 'Update Product ' . $arrUserShopEcommerceDetails['product_name'];
        $arrData['strHeading'] = 'Update Product ' . $arrUserShopEcommerceDetails['product_name'];
        $arrData['strSubmitValue'] = 'Update Shop Products';
        $arrData['view'] = 'user-shop-ecommerce/form-details';
        if( $this->input->post() ) {
            $arrPost = $this->input->post();
	
            if( true == $this->form_validation->run( 'user-shop-ecommerce-form' ) ) {
                $arrDetails = $arrPost;
                if( true == isset( $_FILES['primary_image']['name'] ) ) {
                    $config['upload_path'] = './assets/images/product_images/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = 2048;

                    $this->load->library( 'upload', $config );
                    if( $this->upload->do_upload( 'primary_image' ) ) {
                        $arrUploadData = $this->upload->data();
                        $strPrimaryImageName = $arrUploadData['file_name'];
                        $strError = '';
                    } else {
                        $strError = $this->upload->display_errors();
                        $strPrimaryImageName = '';
                    }
                } else {
                    $strPrimaryImageName = isset( $arrPost['primary_image_hidden'] ) ? $arrPost['primary_image_hidden'] : '' ;
                    $strError = '';
                }
                if( false == isStrVal( $strError ) ) {
                    unset( $arrDetails['primary_image_hidden'] );
                    $arrUserDetails = $this->User->getUserById( $arrPost['user_id'] );
                    $arrDetails['user_type_id'] = $arrUserDetails['user_type_id'];    
                    
                    $boolResult = $this->UserEcommerces->update( $arrDetails );
                    if( true == $boolResult ) {
                        $arrUserShopEcommerceImageDetails = array(
                                                                'user_ecommerce_id' => $arrPost['user_ecommerce_id'],
                                                                'primary_image' => $strPrimaryImageName,
                                                            );

                            $this->UserEcommerceImages->updateByUserEcommerceId( $arrUserShopEcommerceImageDetails );

                            $this->session->set_flashdata( 'Message', 'Your shop product details has been updated succesfully' );
                            return redirect( 'admin/user/user-shop-ecommerces', 'refresh' );
                    } else {
                        $this->session->set_flashdata( 'Error', 'Failed to update Shop Products' . $arrUserShopEcommerceDetails['product_name'] );
                        $this->backendLayout( $arrData );
                    }
                } else {
                    $this->session->set_flashdata('Error', $strError );
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

        $boolResult = $this->UserEcommerces->delete( $arrPost['user_ecommerce_id'] );
        if( true == $boolResult ) {
            echo true;
        } else {
            echo false;
        }
    }

}
