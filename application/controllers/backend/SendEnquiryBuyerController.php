<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OrderController extends MY_Controller {

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

        $data['title'] = 'Enquiry Send by Buyer List';
        $data['heading'] = 'Enquiry Send by Buyer List';
        $data['backend'] = true;
        $data['view'] = 'send_enquiry/seller_list';
        $data['arrUserData'] = $userSession;
        if( $userSession['username'] == 'adminmaster' ) {
            $data['arrmixSendEnquiryBuyerList'] = $this->SendEnquiryBuyer->getSendEnquiryBuyers();
        } else {
            $data['arrmixSendEnquiryBuyerList'] = $this->SendEnquiryBuyer->getSendEnquiryBuyersBySellProductId( $userSession['user_id'] );
        }

        $this->backendLayout($data);
    }

    public function create() {
        $session = UserSession();
        $userSession = $session['userData'];
        if ($this->input->post()) {
            $post = $this->input->post();
            if (TRUE == $this->form_validation->run('sell-product-form')) {
                $arrPostSellProductDetails = $post;
                if ($userSession['username'] == 'adminmaster') {
                    $arrPostSellProductDetails['user_id'] = 0;
                    $arrPostSellProductDetails['created_by'] = $userSession['register_id'];
                    $arrPostSellProductDetails['updated_by'] = $userSession['register_id'];
                } else {
                    $arrPostSellProductDetails['user_id'] = $userSession['user_id'];
                    $arrPostSellProductDetails['created_by'] = $userSession['user_id'];
                    $arrSellProductDetails['updated_by'] = $userSession['user_id'];
                }
                $boolResult = $this->SellProduct->insert($arrPostSellProductDetails);
                if ($boolResult) {
                    $this->session->set_flashdata('Message', 'Product has been out for the sell. You can see in Buy product section ');
                    return redirect('sell-product', 'refresh');
                } else {
                    $this->session->set_flashdata('Error', 'Failed to create for selling product');
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
        if ($this->input->post()) {
            $post = $this->input->post();
            if ($this->form_validation->run('sell-product-form') == TRUE) {
                $arrPostSellProductDetails = $post;
                if ($userSession['username'] == 'adminmaster') {
                    $arrPostSellProductDetails['updated_by'] = $userSession['register_id'];
                } else {
                    $arrPostSellProductDetails['updated_by'] = $userSession['user_id'];
                }
                $boolResult = $this->SellProduct->update($arrPostSellProductDetails);
                if (true == $boolResult) {
                    $this->session->set_flashdata('Message', 'Your sell product details has been updated succesfully');
                    return redirect('sell-product', 'refresh');
                } else {
                    $this->session->set_flashdata('Error', 'Failed to update category');
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

    public function view() {
        $session = UserSession();
        $userSession = $session['userData'];
        $get = $this->input->get();
        $arrmixOrderDetails = $this->Orders->getOrderByOrderId( $get['order_id'] );
        $arrProductList = json_decode( $arrmixOrderDetails['product_details'] );
        $data['arrmixOrderDetails'] = $arrmixOrderDetails;
        $data['arrProductList'] = $arrProductList;
        $data['arrUserDetails'] = $userSession;
        $data['title'] = $arrmixOrderDetails['order_no'];
        $data['heading'] = ' Order number ' . $arrmixOrderDetails['order_no'];
        $data['view'] = 'order/view';
        $this->backendLayout($data);

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
        $intCityIdHidden = isVal($post['hidden_city_id']) ? $post['hidden_city_id'] : '';
        $html = array();
        if (!empty($arrCitiesList)) {
            foreach ($arrCitiesList as $arrCityDetails) {
                $strSelected = '';
                if ($intCityIdHidden == $arrCityDetails['id']) {
                    $strSelected = 'selected="selected"';
                }
                $data2 = ' <option value="' . $arrCityDetails['id'] . '" ' . set_select('delivery_location', $arrCityDetails['id']) . ' ' . $strSelected . ' > ' . $arrCityDetails['name'] . '</option>';
                $html[] = $data2;
            }
        }
        echo json_encode($html);
    }

}
