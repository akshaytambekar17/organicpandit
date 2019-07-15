<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SellProductController extends MY_Controller {

    function __construct() {
        parent::__construct();
        $session = UserSession();
        if (empty($session['success'])) {
            redirect('admin', 'refresh');
        } else {
            $userSession = $session['userData'];
//            if( ADMINUSERNAME != $userSession['username'] ){
//                redirect('home', 'refresh');
//            }
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
        $session = UserSession();
        $userSession = $session['userData'];
        $data['title'] = 'Sell Product';
        $data['heading'] = 'Sell Product List';
        $data['backend'] = true;
        $data['view'] = 'sell-product/list';
        $data['arrUserData'] = $userSession;
        if ($userSession['username'] == 'adminmaster') {
            $data['arrmixSellProductList'] = $this->SellProduct->getSellProducts();
        } else {
            $data['arrmixSellProductList'] = $this->SellProduct->getSellProductByUserId($userSession['user_id']);
        }

        $this->backendLayout($data);
    }

    public function create() {
        $session = UserSession();
        $userSession = $session['userData'];
        if( $this->input->post() ) {
            $post = $this->input->post();
	        $data['strErrorImage'] = '';
	        if( true == empty( $_FILES['primary_image']['name'] ) ) {
		        $this->form_validation->set_rules( 'primary_image', 'Primary Image', 'trim|required' );
	        }
            if( true == $this->form_validation->run( 'sell-product-form' ) ) {
                $arrPostSellProductDetails = $post;

	            if( !empty( $_FILES['primary_image']['name'] ) ) {
		            $config['upload_path'] = './assets/images/sell_products/';
		            $config['allowed_types'] = 'gif|jpg|png|jpeg';
		            $config['max_size'] = 2048;

		            $this->load->library( 'upload', $config );
		            if( $this->upload->do_upload( 'primary_image' ) ) {
			            $arrUploadData = $this->upload->data();
			            $strPrimaryImageName = $arrUploadData['file_name'];
			            $arrError[] = '';
		            } else {
			            $arrError[] = $this->upload->display_errors();
			            $strPrimaryImageName = '';
		            }
	            } else {
		            $strPrimaryImageName = '';
		            $arrError[] = '';
	            }

	            if( !empty( $_FILES['other_image1']['name'] ) ) {
		            $config['upload_path'] = './assets/images/sell_products/';
		            $config['allowed_types'] = 'gif|jpg|png|jpeg';
		            $config['max_size'] = 2048;

		            $this->load->library( 'upload', $config );
		            if( $this->upload->do_upload( 'other_image1' ) ) {
			            $arrUploadData = $this->upload->data();
			            $strOtherImageName1 = $arrUploadData['file_name'];
			            $arrError[] = '';
		            } else {
			            $arrError[] = $this->upload->display_errors();
			            $strOtherImageName1 = '';
		            }
	            } else {
		            $strOtherImageName1 = '';
		            $arrError[] = '';
	            }

	            if( !empty( $_FILES['other_image3']['name'] ) ) {
		            $config['upload_path'] = './assets/images/sell_products/';
		            $config['allowed_types'] = 'gif|jpg|png|jpeg';
		            $config['max_size'] = 2048;

		            $this->load->library( 'upload', $config );
		            if( $this->upload->do_upload( 'other_image3' ) ) {
			            $arrUploadData = $this->upload->data();
			            $strOtherImageName3 = $arrUploadData['file_name'];
			            $arrError[] = '';
		            } else {
			            $arrError[] = $this->upload->display_errors();
			            $strOtherImageName3 = '';
		            }
	            } else {
		            $strOtherImageName3 = '';
		            $arrError[] = '';
	            }

	            if( !empty( $_FILES['other_image4']['name'] ) ) {
		            $config['upload_path'] = './assets/images/sell_products/';
		            $config['allowed_types'] = 'gif|jpg|png|jpeg';
		            $config['max_size'] = 2048;

		            $this->load->library( 'upload', $config );
		            if( $this->upload->do_upload( 'other_image4' ) ) {
			            $arrUploadData = $this->upload->data();
			            $strOtherImageName4 = $arrUploadData['file_name'];
			            $arrError[] = '';
		            } else {
			            $arrError[] = $this->upload->display_errors();
			            $strOtherImageName4 = '';
		            }
	            } else {
		            $strOtherImageName4 = '';
		            $arrError[] = '';
	            }

	            if( !empty( $_FILES['other_image2']['name'] ) ) {
		            $config['upload_path'] = './assets/images/sell_products/';
		            $config['allowed_types'] = 'gif|jpg|png|jpeg';
		            $config['max_size'] = 2048;

		            $this->load->library( 'upload', $config );
		            if( $this->upload->do_upload( 'other_image2' ) ) {
			            $arrUploadData = $this->upload->data();
			            $strOtherImageName2 = $arrUploadData['file_name'];
			            $arrError[] = '';
		            } else {
			            $arrError[] = $this->upload->display_errors();
			            $strOtherImageName2 = '';
		            }
	            } else {
		            $strOtherImageName2 = '';
		            $arrError[] = '';
	            }

	            if( false == isArrVal( array_filter( $arrError ) ) ) {
		            unset( $arrPostSellProductDetails['primary_image'] );
		            unset( $arrPostSellProductDetails['other_image1'] );
		            unset( $arrPostSellProductDetails['other_image2'] );
		            unset( $arrPostSellProductDetails['other_image3'] );
		            unset( $arrPostSellProductDetails['other_image4'] );
		            unset( $arrPostSellProductDetails['delivery_location'] );
					$arrPostSellProductDetails['delivery_location'] = implode( ',', $post['delivery_location'] );

		            if( ADMINUSERNAME == $userSession['username'] ) {
			            $arrPostSellProductDetails['user_id']    = 0;
			            $arrPostSellProductDetails['created_by'] = $userSession['register_id'];
			            $arrPostSellProductDetails['updated_by'] = $userSession['register_id'];
		            } else {
			            $arrPostSellProductDetails['user_id']    = $userSession['user_id'];
			            $arrPostSellProductDetails['created_by'] = $userSession['user_id'];
			            $arrSellProductDetails['updated_by']     = $userSession['user_id'];
		            }
		            $intSellproductId = $this->SellProduct->insert( $arrPostSellProductDetails );
		            if( true == isVal( $intSellproductId ) ) {

		            	$arrSellProductImageDetails = array(
		            		                                'sell_product_id' => $intSellproductId,
				                                            'primary_image' => $strPrimaryImageName,
				                                            'other_image1' => $strOtherImageName1,
				                                            'other_image2' => $strOtherImageName2,
				                                            'other_image3' => $strOtherImageName3,
				                                            'other_image4' => $strOtherImageName4,
			                                            );
		            	$intSellProductImageId = $this->SellProductImage->insert( $arrSellProductImageDetails );
		            	if( true == isVal( $intSellProductImageId ) ) {
				            $this->session->set_flashdata( 'Message', 'Product has been out for the sell. You can see in Buy product section ' );
			            } else {
				            $this->session->set_flashdata( 'Error', 'Product has been added successfully, but the images cannot be added. Something went wrong. Please try using the update' );
			            }

						return redirect( 'sell-product', 'refresh' );
		            } else {
			            $this->session->set_flashdata( 'Error', 'Failed to create for selling product' );
			            $arrProductCategoryList               = $this->ProductCategory->getProductCategorys();
			            $data['arrCertificationAgenciesList'] = $this->CertificationAgency->getCertificationAgenciesVerified();
			            $data['arrCitiesList']                = $this->City->getCities();
			            $data['arrStateList']                 = $this->State->getStates();
			            $data['arrProductCategoryList']       = $arrProductCategoryList;
			            $data['title']                        = 'Sell Product';
			            $data['heading']                      = 'Sell Product';
			            $data['view']                         = 'sell-product/form_data';
			            $this->backendLayout( $data );
		            }
	            } else {
		            $this->session->set_flashdata('Error', implode( ',', array_filter( $arrError ) ) );
		            $data['strErrorImage'] = implode( ',', array_filter( $arrError ) );
		            $arrProductCategoryList = $this->ProductCategory->getProductCategorys();
		            $data['arrCertificationAgenciesList'] = $this->CertificationAgency->getCertificationAgenciesVerified();
		            $data['arrCitiesList'] = $this->City->getCities();
		            $data['arrStateList'] = $this->State->getStates();
		            $data['arrProductCategoryList'] = $arrProductCategoryList;
		            $data['title'] = 'Sell Product';
		            $data['heading'] = 'Sell Product';
		            $data['view'] = 'sell-product/form_data';
		            $this->backendLayout($data);
	            }
            } else {
            	$arrProductCategoryList = $this->ProductCategory->getProductCategorys();
                $data['arrCertificationAgenciesList'] = $this->CertificationAgency->getCertificationAgenciesVerified();
                $data['arrCitiesList'] = $this->City->getCities();
                $data['arrStateList'] = $this->State->getStates();
                $data['arrProductCategoryList'] = $arrProductCategoryList;
                $data['title'] = 'Sell Product';
                $data['heading'] = 'Sell Product';
                $data['view'] = 'sell-product/form_data';
                $this->backendLayout($data);
            }
        } else {
            $arrProductCategoryList = $this->ProductCategory->getProductCategorys();
            $data['arrCertificationAgenciesList'] = $this->CertificationAgency->getCertificationAgenciesVerified();
            $data['arrCitiesList'] = $this->City->getCities();
            $data['arrStateList'] = $this->State->getStates();
            $data['arrProductCategoryList'] = $arrProductCategoryList;
            $data['title'] = 'Sell Product';
            $data['heading'] = 'Sell Product';
            $data['view'] = 'sell-product/form_data';
            $this->backendLayout($data);
        }
    }

    public function update() {
        $session = UserSession();
        $userSession = $session['userData'];

        $get = $this->input->get();
        if( $this->input->post() ) {
            $post = $this->input->post();
	        $data['strErrorImage'] = '';
            if ($this->form_validation->run('sell-product-form') == TRUE) {
                $arrPostSellProductDetails = $post;
	            if( !empty( $_FILES['primary_image']['name'] ) ) {
		            $config['upload_path'] = './assets/images/sell_products/';
		            $config['allowed_types'] = 'gif|jpg|png|jpeg';
		            $config['max_size'] = 2048;

		            $this->load->library( 'upload', $config );
		            if( $this->upload->do_upload( 'primary_image' ) ) {
			            $arrUploadData = $this->upload->data();
			            $strPrimaryImageName = $arrUploadData['file_name'];
			            $arrError[] = '';
		            } else {
			            $arrError[] = $this->upload->display_errors();
			            $strPrimaryImageName = '';
		            }
	            } else {
		            $strPrimaryImageName = isset( $post['primary_image_hidden'] ) ? $post['primary_image_hidden'] : '' ;
		            $arrError[] = '';
	            }

	            if( !empty( $_FILES['other_image1']['name'] ) ) {
		            $config['upload_path'] = './assets/images/sell_products/';
		            $config['allowed_types'] = 'gif|jpg|png|jpeg';
		            $config['max_size'] = 2048;

		            $this->load->library( 'upload', $config );
		            if( $this->upload->do_upload( 'other_image1' ) ) {
			            $arrUploadData = $this->upload->data();
			            $strOtherImageName1 = $arrUploadData['file_name'];
			            $arrError[] = '';
		            } else {
			            $arrError[] = $this->upload->display_errors();
			            $strOtherImageName1 = '';
		            }
	            } else {
		            $strOtherImageName1 = isset( $post['other_image_hidden1'] ) ? $post['other_image_hidden1'] : '' ;
		            $arrError[] = '';
	            }

	            if( !empty( $_FILES['other_image3']['name'] ) ) {
		            $config['upload_path'] = './assets/images/sell_products/';
		            $config['allowed_types'] = 'gif|jpg|png|jpeg';
		            $config['max_size'] = 2048;

		            $this->load->library( 'upload', $config );
		            if( $this->upload->do_upload( 'other_image3' ) ) {
			            $arrUploadData = $this->upload->data();
			            $strOtherImageName3 = $arrUploadData['file_name'];
			            $arrError[] = '';
		            } else {
			            $arrError[] = $this->upload->display_errors();
			            $strOtherImageName3 = '';
		            }
	            } else {
		            $strOtherImageName3 = isset( $post['other_image_hidden3'] ) ? $post['other_image_hidden3'] : '' ;;
		            $arrError[] = '';
	            }

	            if( !empty( $_FILES['other_image4']['name'] ) ) {
		            $config['upload_path'] = './assets/images/sell_products/';
		            $config['allowed_types'] = 'gif|jpg|png|jpeg';
		            $config['max_size'] = 2048;

		            $this->load->library( 'upload', $config );
		            if( $this->upload->do_upload( 'other_image4' ) ) {
			            $arrUploadData = $this->upload->data();
			            $strOtherImageName4 = $arrUploadData['file_name'];
			            $arrError[] = '';
		            } else {
			            $arrError[] = $this->upload->display_errors();
			            $strOtherImageName4 = '';
		            }
	            } else {
		            $strOtherImageName4 = isset( $post['other_image_hidden4'] ) ? $post['other_image_hidden4'] : '' ;;
		            $arrError[] = '';
	            }

	            if( !empty( $_FILES['other_image2']['name'] ) ) {
		            $config['upload_path'] = './assets/images/sell_products/';
		            $config['allowed_types'] = 'gif|jpg|png|jpeg';
		            $config['max_size'] = 2048;

		            $this->load->library( 'upload', $config );
		            if( $this->upload->do_upload( 'other_image2' ) ) {
			            $arrUploadData = $this->upload->data();
			            $strOtherImageName2 = $arrUploadData['file_name'];
			            $arrError[] = '';
		            } else {
			            $arrError[] = $this->upload->display_errors();
			            $strOtherImageName2 = '';
		            }
	            } else {
		            $strOtherImageName2 = isset( $post['other_image_hidden2'] ) ? $post['other_image_hidden2'] : '' ;;
		            $arrError[] = '';
	            }

	            if( false == isArrVal( array_filter( $arrError ) ) ) {
		            unset( $arrPostSellProductDetails['primary_image'] );
		            unset( $arrPostSellProductDetails['other_image1'] );
		            unset( $arrPostSellProductDetails['other_image2'] );
		            unset( $arrPostSellProductDetails['other_image3'] );
		            unset( $arrPostSellProductDetails['other_image4'] );
		            unset( $arrPostSellProductDetails['delivery_location'] );
		            unset( $arrPostSellProductDetails['primary_image_hidden'] );
		            unset( $arrPostSellProductDetails['other_image_hidden1'] );
		            unset( $arrPostSellProductDetails['other_image_hidden2'] );
		            unset( $arrPostSellProductDetails['other_image_hidden3'] );
		            unset( $arrPostSellProductDetails['other_image_hidden4'] );
		            unset( $arrPostSellProductDetails['sell_product_image_id'] );

		            $arrPostSellProductDetails['delivery_location'] = implode( ',', $post['delivery_location'] );

		            if( ADMINUSERNAME == $userSession['username'] ) {
			            $arrPostSellProductDetails['updated_by'] = $userSession['register_id'];
		            } else {
			            $arrPostSellProductDetails['updated_by'] = $userSession['user_id'];
		            }
		            $boolResult = $this->SellProduct->update( $arrPostSellProductDetails );
		            if( true == $boolResult ) {
						$arrSellProductImageDetails = array(
				            'id' => $post['sell_product_image_id'],
				            'sell_product_id' => $post['sell_product_id'],
				            'primary_image' => $strPrimaryImageName,
				            'other_image1' => $strOtherImageName1,
				            'other_image2' => $strOtherImageName2,
				            'other_image3' => $strOtherImageName3,
				            'other_image4' => $strOtherImageName4,
			            );

			            $this->SellProductImage->update( $arrSellProductImageDetails );

			            $this->session->set_flashdata( 'Message', 'Your sell product details has been updated succesfully' );

			            return redirect( 'sell-product', 'refresh' );
		            } else {
			            $this->session->set_flashdata( 'Error', 'Failed to update category' );
			            $arrSellProductDetails                = $this->SellProduct->getSellProductBySellProductId( $post['sell_product_id'] );
			            $arrProductCategoryList               = $this->ProductCategory->getProductCategorys();
			            $data['arrCertificationAgenciesList'] = $this->CertificationAgency->getCertificationAgenciesVerified();
			            $data['arrCitiesList']                = $this->City->getCities();
			            $data['arrStateList']                 = $this->State->getStates();
			            $data['arrProductCategoryList']       = $arrProductCategoryList;
			            $data['arrSellProductDetails']        = $arrSellProductDetails;
			            $data['title']                        = 'Sell Product';
			            $data['heading']                      = 'Sell Product';
			            $data['view']                         = 'sell-product/form_data';
			            $this->backendLayout( $data );
		            }
	            } else {
		            $this->session->set_flashdata('Error', implode( ',', array_filter( $arrError ) ) );
		            $data['strErrorImage'] = implode( ',', array_filter( $arrError ) );
		            $arrSellProductDetails = $this->SellProduct->getSellProductBySellProductId( $post['sell_product_id'] );
		            $arrProductCategoryList = $this->ProductCategory->getProductCategorys();
		            $data['arrCertificationAgenciesList'] = $this->CertificationAgency->getCertificationAgenciesVerified();
		            $data['arrCitiesList'] = $this->City->getCities();
		            $data['arrStateList'] = $this->State->getStates();
		            $data['arrProductCategoryList'] = $arrProductCategoryList;
		            $data['arrSellProductDetails'] = $arrSellProductDetails;
		            $data['title'] = 'Sell Product';
		            $data['heading'] = 'Sell Product';
		            $data['view'] = 'sell-product/form_data';
		            $this->backendLayout($data);
	            }

            } else {
                $arrSellProductDetails = $this->SellProduct->getSellProductBySellProductId( $post['sell_product_id'] );
                $arrProductCategoryList = $this->ProductCategory->getProductCategorys();
                $data['arrCertificationAgenciesList'] = $this->CertificationAgency->getCertificationAgenciesVerified();
                $data['arrCitiesList'] = $this->City->getCities();
                $data['arrStateList'] = $this->State->getStates();
                $data['arrProductCategoryList'] = $arrProductCategoryList;
                $data['arrSellProductDetails'] = $arrSellProductDetails;
                $data['title'] = 'Sell Product';
                $data['heading'] = 'Sell Product';
                $data['view'] = 'sell-product/form_data';
                $this->backendLayout($data);
            }
        } else {
            $arrSellProductDetails = $this->SellProduct->getSellProductBySellProductId( $get['sell_product_id'] );
            $arrProductCategoryList = $this->ProductCategory->getProductCategorys();
            $data['arrCertificationAgenciesList'] = $this->CertificationAgency->getCertificationAgenciesVerified();
            $data['arrCitiesList'] = $this->City->getCities();
            $data['arrStateList'] = $this->State->getStates();
            $data['arrProductCategoryList'] = $arrProductCategoryList;
            $data['arrSellProductDetails'] = $arrSellProductDetails;
            $data['title'] = 'Sell Product';
            $data['heading'] = 'Sell Product';
            $data['view'] = 'sell-product/form_data';
            $this->backendLayout($data);
        }
    }

    public function delete() {
        $post = $this->input->post();

        $boolResult = $this->SellProduct->delete($post['sell_product_id']);
        if ($boolResult) {
            echo true;
        } else {
            echo false;
        }
    }

    public function fetchProductByCategoryId() {
        $post = $this->input->post();

        $arrProductList = $this->Product->getProductByCategoryId($post['category_id']);
        if (isset($post['hidden_product_id'])) {
            $intProductId = $post['hidden_product_id'];
        } else {
            $intProductId = '';
        }
        $html = array();
        if (!empty($arrProductList)) {
            foreach ($arrProductList as $arrProductDetails) {
                if (isVal($intProductId)) {
                    $selected = ( $intProductId == $arrProductDetails['id'] ) ? 'selected="selected"' : '';
                } else {
                    $selected = '';
                }
                $data2 = ' <option value="' . $arrProductDetails['id'] . '" ' . set_select('product_id', $arrProductDetails['id']) . ' ' . $selected . ' > ' . $arrProductDetails['name'] . '</option>';
                $html[] = $data2;
            }
        }
        echo json_encode($html);
    }

    public function fetchCitiesByStateId() {
        $post = $this->input->post();
		$arrCitiesList = $this->City->getCitiesBystateId($post['state_id']);
        $intstrCityIdHidden = isVal($post['hidden_city_id']) ? $post['hidden_city_id'] : '';
        $arrintCityIdHidden = explode( ',', $intstrCityIdHidden );

        $html = array();
        if (!empty($arrCitiesList)) {
            foreach ($arrCitiesList as $arrCityDetails) {
                $strSelected = '';
                foreach( $arrintCityIdHidden as $intCityIdHidden ){
	                if( $intCityIdHidden == $arrCityDetails['id']) {
		                $strSelected = 'selected="selected"';
	                }
                }

                $data2 = ' <option value="' . $arrCityDetails['id'] . '" ' . set_select('delivery_location', $arrCityDetails['id']) . ' ' . $strSelected . ' > ' . $arrCityDetails['name'] . '</option>';
                $html[] = $data2;
            }
        }
        echo json_encode($html);
    }

}
