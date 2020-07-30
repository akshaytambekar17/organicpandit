<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OrderController extends MY_Controller {
    
    function __construct() {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    }
        
    public function getTotalWorth() {
        $arrPostRequirementTotalWorthDetails = $this->PostRequirement->getTotalWorth();
        if( true == isArrVal( $arrPostRequirementTotalWorthDetails ) ) {
            $arrResult['success'] = true;
            $arrResult['message'] = 'Successfully fetch the data';
            $arrResult['data'] = $arrPostRequirementTotalWorthDetails;
        } else {
            $arrResult['success'] = false;
            $arrResult['message'] = 'No data found';
        }
        
        $this->response( $arrResult );
        
    }
    
    public function actionAddOrder() {
        
        $arrmixPost = $this->input->post();
        $arrmixPost['payment_method'] = PAYMENT_METHOD_ONLINE;
        if( true == $this->form_validation->run( 'paynow-form' ) ) { 
            $arrmixInsertData = $arrmixPost;
            $arrmixInsertData['order_payment_status'] = ORDER_PAYMENT_STATUS_PENDING;
            $intCurrentInsertedOrderId = $this->Orders->insert( $arrmixInsertData );
            $strOrderNo = 'ORDERNO00' . $intCurrentInsertedOrderId;
            $arrUpdateData = array( 'order_id' => $intCurrentInsertedOrderId,
                                    'order_no' => $strOrderNo
                                );
            $this->Orders->update( $arrUpdateData );
            $arrUrl = paymentGatewayResponseUrl();

            $strTxnId = 'TXNID' . $arrmixPost['user_id'] . $arrmixPost['user_type_id'] . strtotime( CURRENT_DATETIME );
            $arrPaymentDetails = array( 'txnid'         => $strTxnId,
                                        'amount'        => sprintf("%.2f", $$arrmixInsertData['total_amount']),
                                        'firstname'     => $arrmixPost['fullname'],
                                        'email'         => $arrmixPost['email_id'],
                                        'phone'         => $arrmixPost['mobile_no'],
                                        'productinfo'   => $strOrderNo,
                                        'surl'          => $arrUrl['surl'],
                                        'furl'          => $arrUrl['furl'],
                                        'udf1'          => $intCurrentInsertedOrderId,
                                        'udf2'          => '',
                                        'udf3'          => '',
                                        'udf4'          => '',
                                        'udf5'          => '',
                                        'address1'      => '',
                                        'address2'      => '',
                                        'city'          => '',
                                        'state'         => '',
                                        'country'       => '',
                                        'zipcode'       => $arrmixPost['pincode'],
                                );
            $arrmixPaymentDetails['payment_details'] = $arrPaymentDetails;
            $arrmixPaymentDetails['api'] = INITIATE_PAYMENT;
            $arrmixPaymentDetails['order_details'] = $arrmixInsertData;
            
            $arrmixResult['success'] = true;
            $arrmixResult['message'] = 'Order has been successfully place.';
            $arrmixResult['data'] = $arrmixPaymentDetails;
        } else {
            $arrmixResult['success'] = false;
            $arrmixResult['message'] = 'Validation Errors';
            $arrmixResult['error'] = $this->form_validation->error_array();
        }        
        
        $this->response( $arrmixResult );
    }
    
}
