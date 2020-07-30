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
    
    public function fetchBuySellProductList() {

        $arrPost = $this->input->post();
        
        $strintDeliveryLocation = '';
        $intProductId = '';
        $intCategoryId = '';
        $intDeliveryLocationState = '';
        if( true == isset( $arrPost['delivery_location'] ) ) {
            $strintDeliveryLocation = $arrPost['delivery_location'];
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
        
        $intOffset = DEFAULT_OFFEST;
        if( true == isset( $arrPost['page_no'] ) && true == isIdVal( $arrPost['page_no'] ) ) {
            $intOffset = $this->calculateOffset( $arrPost['page_no'] );
        }
        
        $arrmixSellProductList = $this->SellProduct->getSellProductByProductIdByCategoryIdByStateIdByCity( $intProductId, $intCategoryId, $intDeliveryLocationState, $strintDeliveryLocation, LIMIT, $intOffset );
        $arrmixSellProductListCount = $this->SellProduct->getSellProductByProductIdByCategoryIdByStateIdByCity( $intProductId, $intCategoryId, $intDeliveryLocationState, $strintDeliveryLocation );
        
        if( true == isArrVal( $arrmixSellProductList ) ) {
            foreach( $arrmixSellProductList as $arrmixSellProductDetails ) {
                $arrmixSellProductDetails['primary_image'] = ( true == isVal( $arrmixSellProductDetails['primary_image'] ) ) ? 'assets/images/sell_products/' . $arrmixSellProductDetails['primary_image'] : '';
                $arrmixSellProductDetails['other_image1'] = ( true == isVal( $arrmixSellProductDetails['other_image1'] ) ) ? 'assets/images/sell_products/' . $arrmixSellProductDetails['other_image1'] : '';
                $arrmixSellProductDetails['other_image2'] = ( true == isVal( $arrmixSellProductDetails['other_image2'] ) ) ? 'assets/images/sell_products/' . $arrmixSellProductDetails['other_image2'] : '';
                $arrmixSellProductDetails['other_image3'] = ( true == isVal( $arrmixSellProductDetails['other_image3'] ) ) ? 'assets/images/sell_products/' . $arrmixSellProductDetails['other_image3'] : '';
                $arrmixSellProductDetails['other_image4'] = ( true == isVal( $arrmixSellProductDetails['other_image4'] ) ) ? 'assets/images/sell_products/' . $arrmixSellProductDetails['other_image4'] : '';
                
                $arrSellProductList[] = $arrmixSellProductDetails;
            }
            $arrResult['success'] = true;
            $arrResult['message'] = 'Successfully fetch data for Buy Product.';
            $arrResult['total_count'] = count( $arrmixSellProductListCount );
            $arrResult['total_page'] = round( count( $arrmixSellProductListCount ) / LIMIT );
            $arrResult['data'] = $arrSellProductList;
        } else {
            $arrResult['success'] = false;
            $arrResult['message'] = 'Buy Product Data not found.';
        }
        
        $this->response( $arrResult );
    }

    public function fetchBuySellProductDetails() {
        $arrPost = $this->input->post();

        $arrSellProductDetails = $this->SellProduct->getSellProductBySellProductId( $arrPost['sell_product_id'] );
        if( true == isArrVal( $arrSellProductDetails ) ) {
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
            $arrSellProductDetails['strDeliveryLocation'] = implode( ',', $arrstrDeliveryLocation );
            
            $arrSellProductDetails['primary_image'] = ( true == isVal( $arrSellProductDetails['primary_image'] ) ) ? 'assets/images/sell_products/' . $arrSellProductDetails['primary_image'] : '';
            $arrSellProductDetails['other_image1'] = ( true == isVal( $arrSellProductDetails['other_image1'] ) ) ? 'assets/images/sell_products/' . $arrSellProductDetails['other_image1'] : '';
            $arrSellProductDetails['other_image2'] = ( true == isVal( $arrSellProductDetails['other_image2'] ) ) ? 'assets/images/sell_products/' . $arrSellProductDetails['other_image2'] : '';
            $arrSellProductDetails['other_image3'] = ( true == isVal( $arrSellProductDetails['other_image3'] ) ) ? 'assets/images/sell_products/' . $arrSellProductDetails['other_image3'] : '';
            $arrSellProductDetails['other_image4'] = ( true == isVal( $arrSellProductDetails['other_image4'] ) ) ? 'assets/images/sell_products/' . $arrSellProductDetails['other_image4'] : '';
            
            $arrResult['success'] = true;
            $arrResult['message'] = 'Successfully fetch data for Buy Product.';
            $arrResult['data'] = $arrSellProductDetails;
            
        } else {
            $arrResult['success'] = false;
            $arrResult['message'] = 'Buy Product Data not found.';
        }
       
        $this->response( $arrResult );
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

    public function sendEnquiry() {
	    
        $arrmixRequestData = $this->input->post();
        $intSellProductId = $arrmixRequestData['sell_product_id'];
        $strDescription = $arrmixRequestData['description'];

        $arrSellProductDetails = $this->SellProduct->getSellProductBySellProductId( $intSellProductId );
        if( true == isArrVal( $arrSellProductDetails ) ) {
            
            $arrmixUserDetails = $this->User->getUserById( $arrmixRequestData['user_id'] );

            $arrmixData['arrSellProductDetails'] = $arrSellProductDetails;
            $arrmixData['strBuyerName'] = $arrmixUserDetails['fullname'];
            $arrmixData['strSellerName'] = $arrSellProductDetails['fullname'];
            $arrmixData['description'] = $strDescription;

            $arrSendEnquiryData = $arrmixRequestData;
            unset( $arrSendEnquiryData['user_id'] );
            $arrSendEnquiryData['buyer_id'] = $arrmixRequestData['user_id'];

            $intSendEnquiryBuyerId = $this->SendEnquiryBuyer->insert( $arrSendEnquiryData );

            if( true == isVal( $intSendEnquiryBuyerId ) ) {
                if( true == isIdVal( $arrSellProductDetails['mobile_no'] ) ) {
                    $strSMSMessage = 'Hi ' . $arrSellProductDetails['fullname'] . ', you have enquiry from buyer ' . $arrmixUserDetails['fullname'] . ' regarding product ' . $arrSellProductDetails['product_name'] . ', to find the more details please login to portal.%0a%0aThank you.%0aTeam OrganicPandit.';
                    $this->sendSms( $arrSellProductDetails['mobile_no'], $strSMSMessage );
                }

                $to = ADMINEMAILID;
                $subject = "New enquiry has been sent by the buyer.";
                $message = $this->load->view( 'Email/send_enquiry_admin', $arrmixData, TRUE );
                $this->sendEmail( $to, $subject, $message );

                $to = $arrSellProductDetails['email_id'];
                $subject = "New enquiry has been sent by the buyer.";
                $message = $this->load->view( 'Email/send_enquiry_seller', $arrmixData, TRUE );
                $this->sendEmail($to, $subject, $message);

                $to = $arrmixUserDetails['email_id'];
                $subject = "Your enquiry has been sent to the seller.";
                $message = $this->load->view( 'Email/send_enquiry_buyer', $arrmixData, TRUE );
                $this->sendEmail($to, $subject, $message);

                $arrResult['success'] = true;
                $arrResult['message'] = 'Details has been send to seller. Seller will contact soon';
            } else {
                $arrResult['success'] = false;
                $arrResult['message'] = 'Something went wrong. We cannot send the details. Please try again later.';
            }
        } else {
            $arrResult['success'] = false;
            $arrResult['message'] = 'Seller Product details not found. Please select the valid seller product';
        }

        $this->response( $arrResult );
    }

}
