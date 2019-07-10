<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BuySellController extends MY_Controller {

    function __construct() {
        parent::__construct();
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

    }

    public function searchBuyProduct() {

        $data['arrProductCategoryList'] = $this->ProductCategory->getProductCategorys();
        $arrSellProductList = $this->SellProduct->getSellProducts();
        $data['arrStateList'] = $this->State->getStates();
        $data['arrSellProductList'] = $arrSellProductList;
        $session = UserSession();
        $arrUserSession = $session['userData'];
        $data['arrUserSessionDetails'] = $arrUserSession;
        $data['title'] = 'Search Product to Buy';
        $data['heading'] = 'Search Buy Product';
        $data['hide_footer'] = true;
        $data['banner'] = 'farmer.jpg';
        $data['view'] = 'buy-sell/buy_product';

        if ($this->input->post()) {
            $arrPost = $this->input->post();
            if (true == $this->form_validation->run('search-buy-product-form')) {

            	$arrSellProductList = $this->SellProduct->getSellProductByProductIdByCategoryIdByStateIdByCity($arrPost['product_id'], $arrPost['category_id'], $arrPost['delivery_location_state'], $arrPost['delivery_location']);
                $data['arrSellProductList'] = $arrSellProductList;
                $data['intProductId'] = $arrPost['product_id'];
                $data['intHiddenCityid'] = $arrPost['delivery_location'];
                $this->frontendLayout($data);
            } else {
                $data['intHiddenCityid'] = $arrPost['delivery_location'];
                $this->frontendLayout($data);
            }
        } else {
            $this->frontendLayout($data);
        }
    }

    public function fetchSellProductById() {
        $post = $this->input->post();

        $arrSellProductDetails = $this->SellProduct->getSellProductBySellProductId($post['sell_product_id']);
        $arrintDeliveryLocation = explode( ',', $arrSellProductDetails['delivery_location'] );
	    foreach( $arrintDeliveryLocation as $intDeliveryLocation ) {
		    $arrCityDetails = $this->City->getCityById( $intDeliveryLocation );
		    $arrstrDeliveryLocation[] = $arrCityDetails['name'];
	    }
        $data['strDeliveryLocation'] = implode( ',', $arrstrDeliveryLocation );
        $data['arrSellProductDetails'] = $arrSellProductDetails;

        echo $this->load->view('buy-sell/modal_fetch_sell_product_details', $data);
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

}
