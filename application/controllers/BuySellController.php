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
	    if( true == $session['success'] ) {
			$data['intUserId'] = $arrUserSession['user_id'];
	    } else {
		    $data['intUserId'] = '';
	    }
	    $data['title'] = 'Search Product to Buy';
        $data['heading'] = 'Search Buy Product';
        $data['hide_footer'] = true;
        $data['banner'] = 'farmer.jpg';
        $data['view'] = 'buy-sell/buy_product';

        if ($this->input->post()) {
            $arrPost = $this->input->post();
            if (true == $this->form_validation->run('search-buy-product-form')) {
	            $strintDeliveryLocation = '';
	            $intProductId = '';
	            $intCategoryId = '';
	            $intDeliveryLocationState = '';
	            if( true == isset( $arrPost['delivery_location'] ) && true == isArrVal( $arrPost['delivery_location'] ) ) {
		            $strintDeliveryLocation = implode( ',', $arrPost['delivery_location'] );
	            }
	            if( true == isset( $arrPost['product_id'] ) ) {
					$intProductId = $arrPost['product_id'];
	            }
				if( true == isset( $arrPost['category_id'] ) ) {
		            $intCategoryId = $arrPost['category_id'];
	            }
	            if( true == isset( $arrPost['delivery_location_state'] ) ) {
		            $intDeliveryLocationState = $arrPost['delivery_location_state'];
	            }
	            $arrSellProductList = $this->SellProduct->getSellProductByProductIdByCategoryIdByStateIdByCity( $intProductId, $intCategoryId, $intDeliveryLocationState, $strintDeliveryLocation );
                $data['arrSellProductList'] = $arrSellProductList;
                $data['intProductId'] = $intProductId;
                $data['intHiddenCityid'] = '';
                $this->frontendLayout( $data );
            } else {
                $data['intHiddenCityid'] = $arrPost['delivery_location'];
                $this->frontendLayout( $data );
            }
        } else {
            $this->frontendLayout($data);
        }
    }

    public function fetchSellProductById() {
        $post = $this->input->post();

        $arrSellProductDetails = $this->SellProduct->getSellProductBySellProductId($post['sell_product_id']);
	    if( strpos( $arrSellProductDetails['delivery_location'], ',' ) !== false ) {
		    $arrintDeliveryLocation = explode( ',', $arrSellProductDetails['delivery_location'] );
            foreach( $arrintDeliveryLocation as $intDeliveryLocation ) {
		        $arrCityDetails = $this->City->getCityById( $intDeliveryLocation );
		        $arrstrDeliveryLocation[] = $arrCityDetails['name'];
	        }
        } else {
	        $arrCityDetails = $this->City->getCityById( $arrSellProductDetails['delivery_location'] );
	        $arrstrDeliveryLocation[] = $arrCityDetails['name'];
        }
        $data['strDeliveryLocation'] = implode( ',', $arrstrDeliveryLocation );
        $data['arrSellProductDetails'] = $arrSellProductDetails;

        if( true == isset( $post['bool_add_to_cart_modal'] ) ) {
	        echo $this->load->view('buy-sell/modal_add_to_cart', $data);
        } else if( true == isset( $post['bool_send_enquiry_modal'] ) ) {
			echo $this->load->view('buy-sell/modal_send_enquiry', $data);
        } else {
		    echo $this->load->view('buy-sell/modal_fetch_sell_product_details', $data);
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

    public function sendEnquirySellProduct() {
	    $session = UserSession();
	    $arrUserSession = $session['userData'];
	    $arrPost = $this->input->post();
	    $intSellProductId = $arrPost['sell_product_id'];
	    $strDescription = $arrPost['description'];
	    $arrSellProductDetails = $this->SellProduct->getSellProductBySellProductId( $intSellProductId );

	    $data['arrSellProductDetails'] = $arrSellProductDetails;
		$data['strBuyerName'] = $arrUserSession['fullname'];
	    $data['strSellerName'] = $arrUserSession['fullname'];
		$data['description'] = $strDescription;

	    $arrSendEnquiryData = $arrPost;
	    $arrSendEnquiryData['buyer_id'] = $arrUserSession['user_id'];

	    $intSendEnquiryBuyerId = $this->SendEnquiryBuyer->insert( $arrSendEnquiryData );

	    if( true == isVal( $intSendEnquiryBuyerId ) ) {
		    $to = ADMINEMAILID;
		    $subject = "New enquiry has been sent by the buyer.";
		    $message = $this->load->view('Email/send_enquiry_admin',$data,TRUE);
		    $this->sendEmail($to, $subject, $message);

		    $to = $arrSellProductDetails['email_id'];
		    $subject = "New enquiry has been sent by the buyer.";
		    $message = $this->load->view('Email/send_enquiry_seller',$data,TRUE);
		    $this->sendEmail($to, $subject, $message);

		    $to = $arrUserSession['email_id'];
		    $subject = "Your enquiry has been sent to the seller.";
		    $message = $this->load->view('Email/send_enquiry_buyer',$data,TRUE);
		    $this->sendEmail($to, $subject, $message);

		    $arrResult['success'] = true;
		    $arrResult['message'] = 'Details has been send to seller. Seller will contact soon';
	    } else {
		    $arrResult['success'] = false;
		    $arrResult['message'] = 'Something went wrong. We cannot send the details. Please try again later.';
	    }

	    echo json_encode( $arrResult );
    }

}
