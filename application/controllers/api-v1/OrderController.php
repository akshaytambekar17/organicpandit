<?php

class OrderController extends OrganicServicePortalController {
    
    function __construct() {
        parent::__construct();
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
        
        $arrmixRequestData = $this->getRequestParameterDetails();
        
        if( true == $this->validateParameters( 'api-paynow-form', $arrmixRequestData ) ) {
            
            $arrmixInsertData = $arrmixRequestData;
            $arrmixInsertData['order_payment_status'] = ORDER_PAYMENT_STATUS_PENDING;
            $arrmixInsertData['product_details'] = json_encode( $arrmixInsertData['product_details'] );
            
            //$intCurrentInsertedOrderId = $this->Orders->insert( $arrmixInsertData );
            $intCurrentInsertedOrderId = 1;
            $strOrderNo = 'ORDERNO00' . $intCurrentInsertedOrderId;
            $arrUpdateData = array( 'order_id' => $intCurrentInsertedOrderId,
                                    'order_no' => $strOrderNo
                                );
            //$this->Orders->update( $arrUpdateData );
            $arrstrUrl = paymentGatewayResponseUrl();
            $arrmixPaymentGatewayConfigDetails = getPaymentGatewayConfigDetails();

            $strTxnId = 'TXNID' . $arrmixRequestData['user_id'] . $arrmixRequestData['user_type_id'] . strtotime( CURRENT_DATETIME );
            $arrmixPaymentData = [  
                'txnid'       => $strTxnId,
                'amount'      => sprintf("%.1f", $arrmixRequestData['total_amount']),
                'firstname'   => $arrmixRequestData['fullname'],
                'email'       => $arrmixRequestData['email_id'],
                'phone'       => $arrmixRequestData['mobile_no'],
                'productinfo' => $strOrderNo,
                'surl'        => $arrstrUrl['surl'],
                'furl'        => $arrstrUrl['furl'],
                'udf1'        => $intCurrentInsertedOrderId,
                'udf2'        => '',
                'udf3'        => '',
                'udf4'        => '',
                'udf5'        => '',
                'address1'    => '',
                'address2'    => '',
                'city'        => '',
                'state'       => '',
                'country'     => '',
                'zipcode'     => $arrmixRequestData['pincode'],
                'key'         => $arrmixPaymentGatewayConfigDetails['key'],
                'salt'        => $arrmixPaymentGatewayConfigDetails['salt'],
            ];
            
            $arrmixHashData = [
                $arrmixPaymentGatewayConfigDetails['key'],
                $arrmixPaymentData['txnid'],
                $arrmixPaymentData['amount'],
                $arrmixPaymentData['productinfo'],
                $arrmixPaymentData['firstname'],
                $arrmixPaymentData['email'],
                $arrmixPaymentData['udf1'],
                $arrmixPaymentData['udf2'],
                $arrmixPaymentData['udf3'],
                $arrmixPaymentData['udf4'],
                $arrmixPaymentData['udf5'],
                $arrmixPaymentData['address1'],
                $arrmixPaymentData['address2'],
                $arrmixPaymentData['city'],
                $arrmixPaymentData['state'],
                $arrmixPaymentData['country'],
                $arrmixPaymentGatewayConfigDetails['salt'],
                $arrmixPaymentGatewayConfigDetails['key']
            ];
            
            $strHash = hash( "sha512", implode( '|', $arrmixHashData ) );
//            $this->encryption->create_key(16);
//            $strHash = $this->encryption->encrypt( implode( '|', $arrmixHashData ) );
            
            $arrmixPaymentData['unique_id'] = $arrmixRequestData['user_id'];
            $arrmixPaymentData['payment_method'] = $arrmixRequestData['payment_method'];
            $arrmixPaymentData['hash'] = $strHash;
            
            $arrmixPaymentDetails['payment_details'] = $arrmixPaymentData;
            $arrmixPaymentDetails['api'] = INITIATE_PAYMENT;
            
            $arrmixResult['success'] = true;
            $arrmixResult['message'] = 'Order has been successfully place.';
            $arrmixResult['data'] = $arrmixPaymentDetails;
        } else {
            $arrmixResult['success'] = false;
            $arrmixResult['message'] = 'Validation Errors';
            $arrmixResult['error'] = $this->getValidationErrors();
        }        
        
        return $arrmixResult;
    }
    
    public static function createService() {
        return new OrderController();
    }
    
}
