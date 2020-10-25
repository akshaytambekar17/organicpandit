<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SubscriptionPlanController
 *
 * @author Akshay Tambekar
 */
class SubscriptionPlanController extends MY_Controller {
    
    public $arrmixUserSession;
    
    function __construct() {
        parent::__construct();
        
        $this->arrmixUserSession = [];
        if( true == isArrVal( $this->session->userdata('user_data') ) ) {
            $this->arrmixUserSession = $this->session->userdata('user_data');
        }
    }
    
    public function actionSubscriptionPlan() {
        
        $arrmixSubscriptionPlanList = $this->SubscriptionPlans->getSubscriptionPlans();
        
        $arrmixData = [];
        
        $arrmixData['title'] = 'Subscription Plan';
        $arrmixData['heading'] = 'Subscription Plan';
        $arrmixData['hide_footer'] = true;
        $arrmixData['view'] = 'user/subscription-plan';
        
        $arrmixData['arrmixSubscriptionPlanList'] = $arrmixSubscriptionPlanList;
        
        $this->frontendLayout( $arrmixData );
        
    }
    
    public function actionPurchaseSubscriptionPlan() {
        
        if( false == isArrVal( $this->arrmixUserSession ) ) {
            $this->session->set_flashdata( 'Error', 'Please login to purchase subscription plan.');
            redirect( 'login' );
        }
        
        if( NOT_VERIFIED == $this->arrmixUserSession['is_verified'] ) {
            $this->session->set_flashdata( 'Error', 'You are not verified by the Organic team. Please contact to support team.');
            redirect( 'subscription-plan' );
        }
        
        if( true == $this->arrmixUserSession['is_subscription'] ) {
            $this->session->set_flashdata( 'Error', 'You already have subscription plan.');
            redirect( 'subscription-plan' );
        }
        
        $arrmixRequestData = $this->input->get();
        
        if( false == isIdVal( $arrmixRequestData['subscription_plan_id'] ) ) {
            $this->session->set_flashdata( 'Error', 'Invalid Subscription Plan.');
            redirect( 'subscription-plan' );
        } 
        
        $arrmixSubscriptionPlanDetails = $this->SubscriptionPlans->getSubscriptionPlanBySubscriptionPlanId( $arrmixRequestData['subscription_plan_id'] ); 
        if( false == isArrVal( $arrmixSubscriptionPlanDetails ) ) {
            $this->session->set_flashdata( 'Error', 'Invalid Subscription Plan.');
            redirect( 'subscription-plan' );
        } 
        
        $arrmixInsertData = [
            'user_id' => $this->arrmixUserSession['user_id'],
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
        
        $arrmixUrl = purchaseSubscriptionPaymentGatewayResponseUrl();

        $strTxnId = 'TXNID' . $this->arrmixUserSession['user_id'] . $intUserPurchaseSubscriptionId . strtotime( CURRENT_DATETIME );
        $arrmixPaymentDetails = array( 'txnid'         => $strTxnId,
                                    'amount'        => sprintf( "%.2f", $arrmixSubscriptionPlanDetails['price'] ),
                                    'firstname'     => $this->arrmixUserSession['fullname'],
                                    'email'         => $this->arrmixUserSession['email_id'],
                                    'phone'         => $this->arrmixUserSession['mobile_no'],
                                    'productinfo'   => $strPurchaseSubscriptionNumber,
                                    'surl'          => $arrmixUrl['surl'],
                                    'furl'          => $arrmixUrl['furl'],
                                    'udf1'          => $intUserPurchaseSubscriptionId,
                                    'udf2'          => '',
                                    'udf3'          => '',
                                    'udf4'          => '',
                                    'udf5'          => '',
                                    'address1'      => '',
                                    'address2'      => '',
                                    'city'          => '',
                                    'state'         => '',
                                    'country'       => '',
                                    'zipcode'       => '',
                            );
        $arrmixPaymentDetails['payment_details'] = $arrmixPaymentDetails;
        $arrmixPaymentDetails['api'] = INITIATE_PAYMENT;
        
        $this->paymentTransaction( $arrmixPaymentDetails );
        
    }
    
    public function actionPurchaseSubscriptionPaymentResponse() {

        if( false == isArrVal( $this->arrmixUserSession ) ) {
            redirect( 'login' );
        }
        
        if( !$this->input->post() ) {
            redirect( 'home' );
        }
        
        $arrmixData = [];
        
        $arrmixData['title'] = 'Subscription Payment Response';
        $arrmixData['heading'] = 'Subscription Payment Response';
        $arrmixData['hide_footer'] = true;
        $arrmixData['view'] = 'user/purchase-subscription-payment-response';
        
        if( $this->input->post() ) {
            $arrmixPaymentGatewayRequestData = $this->input->post();
            if( 'success' == $arrmixPaymentGatewayRequestData['status'] ) {
                $arrTransactionDetails = [
                    'user_purchase_subscription_id' => $arrmixPaymentGatewayRequestData['udf1'],
                    'txnid'                         => $arrmixPaymentGatewayRequestData['txnid'],
                    'status'                        => $arrmixPaymentGatewayRequestData['status'],
                    'error'                         => isset( $arrmixPaymentGatewayRequestData['error'] ) ? $arrmixPaymentGatewayRequestData['error'] : '',
                    'error_message'                 => $arrmixPaymentGatewayRequestData['error_Message'],
                    'easepayid'                     => $arrmixPaymentGatewayRequestData['easepayid'],
                    'payment_source'                => $arrmixPaymentGatewayRequestData['payment_source'],
                    'net_amount_debit'              => $arrmixPaymentGatewayRequestData['net_amount_debit'],
                    'added_on'                      => $arrmixPaymentGatewayRequestData['addedon'],
                    'total_amount'                  => $arrmixPaymentGatewayRequestData['amount'],
                    'deduction_percentage'          => $arrmixPaymentGatewayRequestData['deduction_percentage'],
                ];
                $this->Transaction->insert( $arrTransactionDetails );
                
                $arrmixUserPurchaseSubscriptionUpdateData = [
                    'user_purchase_subscription_id' => $arrmixPaymentGatewayRequestData['udf1'],
                    'payment_status' => ORDER_PAYMENT_STATUS_COMPLETED
                ];
                
                $this->UserPurchaseSubscriptions->update( $arrmixUserPurchaseSubscriptionUpdateData );
                
                $arrmixUserUpdateData = [
                    'user_id' => $this->arrmixUserSession['user_id'],
                    'is_subscription' => SUBSCRIBED,
                    'is_subscription_expire' => NOT_SUBSCRIPTION_EXPIRED
                ];
                
                $this->User->update( $arrmixUserUpdateData );
                
                $strTo = ADMINEMAILID;
                $strSubject = "User " . $arrmixPaymentGatewayRequestData['firstname'] . " has been subscribed plan." ;
                $strMessage = $this->load->view('Email/purchase_subscription', $arrmixPaymentGatewayRequestData, true );
                
                $this->sendEmail( $strTo, $strSubject, $strMessage );

                $arrmixPaymentGatewayRequestData['boolIsUser'] = true;
                $strTo = $arrmixPaymentGatewayRequestData['email'];
                $strSubject = "Organic pandit subscription plan.";
                $strMessage = $this->load->view( 'Email/purchase_subscription', $arrmixPaymentGatewayRequestData, true );
                
                $this->sendEmail( $strTo, $strSubject, $strMessage);
                
                if( true == isIdVal( $arrmixPaymentGatewayRequestData['phone'] ) ) {
                    $strMessage = 'Hi ' . $arrmixPaymentGatewayRequestData['firstname'] . ',%0aYour subscription plan has been successfully done. Your purchase subscription number is ' . $arrmixPaymentGatewayRequestData['productinfo']  . ' and transaction amount is ' . $arrmixPaymentGatewayRequestData['amount'] . ' .%0aThank you for subscribing our services.%0a%0aTeam OrganicPandit.';
                    $this->sendSms( $arrmixPaymentGatewayRequestData['phone'], $strMessage );
                }
                
                $arrmixData['status'] = 'success';
            } else if( 'failure' == $arrmixPaymentGatewayRequestData['status'] ) {
                $arrTransactionDetails = [
                    'user_purchase_subscription_id' => $arrmixPaymentGatewayRequestData['udf1'],
                    'txnid'                         => $arrmixPaymentGatewayRequestData['txnid'],
                    'status'                        => $arrmixPaymentGatewayRequestData['status'],
                    'error'                         => isset( $arrmixPaymentGatewayRequestData['error'] ) ? $arrmixPaymentGatewayRequestData['error'] : '',
                    'error_message'                 => $arrmixPaymentGatewayRequestData['error_Message'],
                    'easepayid'                     => $arrmixPaymentGatewayRequestData['easepayid'],
                    'payment_source'                => $arrmixPaymentGatewayRequestData['payment_source'],
                    'net_amount_debit'              => $arrmixPaymentGatewayRequestData['net_amount_debit'],
                    'added_on'                      => $arrmixPaymentGatewayRequestData['addedon'],
                    'total_amount'                  => $arrmixPaymentGatewayRequestData['amount'],
                    'deduction_percentage'          => $arrmixPaymentGatewayRequestData['deduction_percentage'],
                ];
                $this->Transaction->insert( $arrTransactionDetails );
                
                $arrmixUserPurchaseSubscriptionUpdateData = [
                    'user_purchase_subscription_id' => $arrmixPaymentGatewayRequestData['udf1'],
                    'payment_status' => ORDER_PAYMENT_STATUS_FAILED
                ];
                
                $this->UserPurchaseSubscriptions->update( $arrmixUserPurchaseSubscriptionUpdateData );
                
                if( true == isIdVal( $arrmixPaymentGatewayRequestData['phone'] ) ) {
                    $strMessage = 'Hi ' . $arrmixPaymentGatewayRequestData['firstname'] . ',%0aYour transcation has been failed for amount ' . $arrmixPaymentGatewayRequestData['amount'] . ' .%0aThank you.%0a%0aTeam OrganicPandit.';
                    $this->sendSms( $arrmixPaymentGatewayRequestData['phone'], $strMessage );
                }
                
                $arrmixData['status'] = 'failure';
                $arrmixData['arrmixPaymentGatewayRequestData'] = $arrmixPaymentGatewayRequestData;
                
            } else {
                
                $arrmixUserPurchaseSubscriptionUpdateData = [
                    'user_purchase_subscription_id' => $arrmixPaymentGatewayRequestData['udf1'],
                    'payment_status' => ORDER_PAYMENT_STATUS_USER_CANCELLED
                ];
                
                $this->UserPurchaseSubscriptions->update( $arrmixUserPurchaseSubscriptionUpdateData );
                
                $arrmixData['status'] = 'userCancelled';
                $arrmixData['arrmixPaymentGatewayRequestData'] = $arrmixPaymentGatewayRequestData;
            }
        } 

        $this->frontendLayout( $arrmixData );

    }
}
