<?php

class SubscriptionController extends OrganicServicePortalController {
    
    function __construct() {
        parent::__construct();
    }
        
    
    public function actionGetSubscriptionPlans() {
        
        $arrmixSubscriptionPLansList = $this->SubscriptionPlans->getSubscriptionPlans();

        if( true == isArrVal( $arrmixSubscriptionPLansList ) ) {
            $arrmixResult['success'] = true;
            $arrmixResult['message'] = 'Data of subscription plans are fetch successfully.';
            $arrmixResult['data'] = $arrmixSubscriptionPLansList;
        } else {
            $arrmixResult['success'] = false;
            $arrmixResult['message'] = 'Validation Errors';
        }
        
        return $arrmixResult;
    }

    public function actionAddSubscriptionOrder() {
        
        $arrmixRequestData = $this->getRequestParameterDetails();
        
        if( true == $this->validateParameters( 'api-user-subscription-form', $arrmixRequestData ) ) {
            $arrmixDecrptedTokenData = $this->getDecryptedTokenDetails();
            
            if( true == $arrmixDecrptedTokenData['is_subscription'] ) {
                $arrmixResult['success'] = false;
                $arrmixResult['message'] = 'You already have subscription plan.';
                $arrmixResult['error'] = 'You already have subscription plan.';    

                return $arrmixResult;
            }


            $arrmixSubscriptionPlanDetails = $this->SubscriptionPlans->getSubscriptionPlanBySubscriptionPlanId( $arrmixRequestData['subscription_plan_id'] ); 
            if( false == isArrVal( $arrmixSubscriptionPlanDetails ) ) {
                $arrmixResult['success'] = false;
                $arrmixResult['message'] = 'Invalid Subscription Plan';
                $arrmixResult['error'] = 'Invalid Subscription Plan';

                return $arrmixResult;
            } 
            
            $arrmixInsertData = [
                'user_id' => $arrmixDecrptedTokenData['user_id'],
                'subscription_plan_id' => $arrmixSubscriptionPlanDetails['subscription_plan_id'],
                'price' => $arrmixSubscriptionPlanDetails['price'],
                'payment_status' => ORDER_PAYMENT_STATUS_PENDING,
                'expired_at' => date( 'Y-m-d', strtotime( '+' . $arrmixSubscriptionPlanDetails['expiration'] . ' month' ) )
            ];
            
            $intUserPurchaseSubscriptionId = $this->UserPurchaseSubscriptions->insert( $arrmixInsertData );
            
            $strPurchaseSubscriptionNumber = 'PURSUBO00' . $intUserPurchaseSubscriptionId;
            $arrUpdateData = [
                'user_purchase_subscription_id' => $intUserPurchaseSubscriptionId,
                'purchase_subscription_number' => $strPurchaseSubscriptionNumber
            ];
            $this->UserPurchaseSubscriptions->update( $arrUpdateData );
            
            $strTxnId = 'TXNID' . $arrmixDecrptedTokenData['user_id'] . $intUserPurchaseSubscriptionId . strtotime( CURRENT_DATETIME );
            
            $arrmixUrl = purchaseSubscriptionPaymentGatewayResponseUrl();
            $arrmixPaymentGatewayConfigDetails = getPaymentGatewayConfigDetails();

            $arrmixPaymentData = [  
                'txnid'       => $strTxnId,
                'amount'      => sprintf("%.1f", $arrmixSubscriptionPlanDetails['price']),
                'firstname'   => $arrmixRequestData['fullname'],
                'email'       => $arrmixRequestData['email_id'],
                'phone'       => $arrmixRequestData['mobile_no'],
                'productinfo' => $strPurchaseSubscriptionNumber,
                'surl'        => $arrmixUrl['surl'] . '?is_app_response=true',
                'furl'        => $arrmixUrl['furl'] . '?is_app_response=true',
                'udf1'        => $intUserPurchaseSubscriptionId,
                'udf2'        => '',
                'udf3'        => '',
                'udf4'        => '',
                'udf5'        => '',
                'address1'    => '',
                'address2'    => '',
                'city'        => '',
                'state'       => '',
                'country'     => '',
                'zipcode'     => '',
                'pay_mode'    => getPayMode(),
                'key'         => $arrmixPaymentGatewayConfigDetails['key'],
                'salt'        => $arrmixPaymentGatewayConfigDetails['salt'],
            ];
            
            $arrmixHashData = [
                $arrmixPaymentData['key'],
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
                $arrmixPaymentData['salt'],
                $arrmixPaymentData['key']
            ];
            
            $strHash = hash( "sha512", implode( '|', $arrmixHashData ) );
 
            $arrmixPaymentData['unique_id'] = $arrmixRequestData['user_id'];
            $arrmixPaymentData['payment_method'] = $arrmixRequestData['payment_method'];
            $arrmixPaymentData['hash'] = $strHash;
            
            $arrmixPaymentDetails['payment_details'] = $arrmixPaymentData;
            $arrmixPaymentDetails['api'] = INITIATE_PAYMENT;
            
            $arrmixResult['success'] = true;
            $arrmixResult['message'] = 'Subsciption details has been added successfully.';
            $arrmixResult['data'] = $arrmixPaymentDetails;
        } else {
            $arrmixResult['success'] = false;
            $arrmixResult['message'] = 'Validation Errors';
            $arrmixResult['error'] = $this->getValidationErrors();
        }        
        
        return $arrmixResult;
    }
    
    public static function createService() {
        return new SubscriptionController();
    }
    
}
