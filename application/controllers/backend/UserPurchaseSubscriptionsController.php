<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserPurchaseSubscriptionsController extends MY_Controller {

    public $arrmixUserSession;
    
    function __construct() {
        parent::__construct();
        
        $this->arrmixUserSession = [];
        if( true == isArrVal( $this->session->userdata('user_data') ) ) {
            $this->arrmixUserSession = $this->session->userdata('user_data');
        }
        
    }

    public function actionList() {
        
        $arrmixData = [];
        $arrmixData['title'] = 'User Subscriptions';
        $arrmixData['heading'] = 'User Subscriptions';
        $arrmixData['backend'] = true;
        $arrmixData['view'] = 'user-purchase-subscriptions/list';
        $arrmixData['arrmixUserSession'] = $this->arrmixUserSession;
        
        if( ADMINUSERNAME == $this->arrmixUserSession['username'] ) {
            $arrmixData['arrmixUserPurchaseSubscriptionList'] = $this->UserPurchaseSubscriptions->getUserPurchaseSubscriptions();
        }  else {
            $arrmixData['arrmixUserPurchaseSubscriptionList'] = $this->UserPurchaseSubscriptions->getUserPurchaseSubscriptionsByUserId( $this->arrmixUserSession['user_id'] );
        }
        
        $this->backendLayout( $arrmixData );
    }

    public function view() {
        $session = UserSession();
        $userSession = $session['userData'];
        $get = $this->input->get();
        $arrmixOrderDetails = $this->Orders->getOrderByOrderId( $get['order_id'] );
        $arrProductList = json_decode( $arrmixOrderDetails['product_details'] );
        $arrmixData['arrmixOrderDetails'] = $arrmixOrderDetails;
        $arrmixData['arrProductList'] = $arrProductList;
        $arrmixData['arrUserDetails'] = $userSession;
        $arrmixData['title'] = $arrmixOrderDetails['order_no'];
        $arrmixData['heading'] = ' Order number ' . $arrmixOrderDetails['order_no'];
        $arrmixData['view'] = 'order/view';
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
