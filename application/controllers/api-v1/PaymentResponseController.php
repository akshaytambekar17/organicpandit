<?php

class PaymentResponseController extends OrganicServicePortalController {
    
    public function __construct() {
        parent::__construct();
    }
        
    
    public function actionProductPaymentResponse() {
        
        $arrmixRequestData = $this->getRequestParameterDetails();
        
        if( true == $this->validateParameters( 'api-product-payment-response', $arrmixRequestData ) ) {
            $arrmixDecrptedTokenData = $this->getDecryptedTokenDetails();
            
            if( 'success' ==  $arrmixRequestData['status'] ) {
                $arrmixOrderDetails = $this->Orders->getOrderByOrderId( $arrmixRequestData['udf1'] );
                
                $arrmixTransactionDetails = [
                    'order_id'          => $arrmixRequestData['udf1'],
                    'txnid'             => $arrmixRequestData['txnid'],
                    'status'            => $arrmixRequestData['status'],
                    'error'             => isset( $arrmixRequestData['error'] ) ? $arrmixRequestData['error'] : '',
                    'error_message'     => $arrmixRequestData['error_Message'],
                    'easepayid'         => $arrmixRequestData['easepayid'],
                    'payment_source'    => $arrmixRequestData['payment_source'],
                    'net_amount_debit'  => $arrmixRequestData['net_amount_debit'],
                    'added_on'          => $arrmixRequestData['addedon'],
                    'total_amount'      => $arrmixRequestData['amount'],
                ];

                $this->Transaction->insert( $arrmixTransactionDetails );

                /***
                 * To change the payment status in order table
                 ***/
                $arrmixUpdateOrderData = [
                    'order_payment_status' => ORDER_PAYMENT_STATUS_COMPLETED,
                    'order_id' => $arrmixRequestData['udf1']
                ];
                $this->Orders->update( $arrmixUpdateOrderData );

                /***
                 * To make the out of stock
                 ***/
                $arrmixProductList = json_decode( $arrmixOrderDetails['product_details'], true );
                $arrmixOrderProductName = [];
                
                foreach( $arrmixProductList as $arrmixProductDetails ) {
                    foreach( $arrmixProductDetails as $arrmixProductData ) {
                        $arrmixOrderProductName[] = $arrmixProductData['Name'];
                        if ( CART_ORDER_TYPE_1 == $arrmixProductData['options']['cart_order_type'] ) {
                            
                            $arrmixSellProductData = [
                                'sell_product_id' => $arrmixProductData['options']['sell_product_id'],
                                'stock' => OUT_STOCK
                            ];

                            $this->SellProduct->update( $arrmixSellProductData );
                        }
                    }    
                }

                $arrmixData['boolStatus'] = true;
                $arrmixData['strMessage'] = "Transaction has been done successfully.";
                $arrmixData['intTranscationId'] = $arrmixRequestData['txnid'];
                $arrmixData['strOrderNo'] = $arrmixRequestData['productinfo'];
                $arrmixData['strAddedOn'] = $arrmixRequestData['addedon'];
                $arrmixData['intTotalAmount'] = $arrmixRequestData['amount'];
                $arrmixData['arrOrderDetails'] = $arrmixOrderDetails;
                
                if( true == isIdVal( $arrmixOrderDetails['mobile_no'] ) ) {
                    $strMessage = 'Hi ' . $arrmixOrderDetails['fullname'] . ' your order has been placed against the product ' . implode( ',', $arrmixOrderProductName ) . ' with the amount ' . $arrmixOrderDetails['total_amount'] . ' .%0aThank you for purchasing our product.%0a%0aTeam OrganicPandit.';
                    $this->sendSms( $arrmixOrderDetails['mobile_no'], $strMessage );
                }

                $strTo = ADMINEMAILID;
                $strSubject = "New Order has been placed";
                $strMessage = $this->load->view( 'Email/order_admin', $arrmixData, TRUE );
                $this->sendEmail( $strTo, $strSubject, $strMessage );

                $strTo = $arrmixOrderDetails['email_id'];
                $strSubject = "Your order has been placed successfully";
                $strMessage = $this->load->view( 'Email/order_buyer', $arrmixData, TRUE );
                $this->sendEmail( $strTo, $strSubject, $strMessage );

                $arrmixResponseData['status'] = 'success';
                $arrmixResponseData['message'] = 'Your transcation has been successfully done for amount ' . $arrmixRequestData['amount'];
                $arrmixResponseData['data'] = $arrmixTransactionDetails;
                

            } else if( 'failure' == $arrmixRequestData['status'] ) {
                $arrTransactionDetails = [
                    'order_id'          => $arrmixRequestData['udf1'],
                    'txnid'             => $arrmixRequestData['txnid'],
                    'status'            => $arrmixRequestData['status'],
                    'error'             => isset( $arrmixRequestData['error'] ) ? $arrmixRequestData['error'] : '',
                    'error_message'     => $arrmixRequestData['error_Message'],
                    'easepayid'         => $arrmixRequestData['easepayid'],
                    'payment_source'    => $arrmixRequestData['payment_source'],
                    'net_amount_debit'  => $arrmixRequestData['net_amount_debit'],
                    'added_on'          => $arrmixRequestData['addedon'],
                    'total_amount'      => $arrmixRequestData['amount'],
                ];
                $this->Transaction->insert( $arrTransactionDetails );
                
                $arrmixUpdateOrderData = [
                    'order_payment_status' => ORDER_PAYMENT_STATUS_FAILED,
                    'order_id' => $arrmixRequestData['udf1']
                ];
                $this->Orders->update( $arrmixUpdateOrderData );

                if( true == isIdVal( $arrmixRequestData['phone'] ) ) {
                    $strMessage = 'Hi ' . $arrmixRequestData['firstname'] . ',%0aYour transcation has been failed for amount ' . $arrmixRequestData['amount'] . ' .%0aThank you.%0a%0aTeam OrganicPandit.';
                    $this->sendSms( $arrmixRequestData['phone'], $strMessage );
                }
                
                $arrmixResponseData['status'] = 'failure';
                $arrmixResponseData['message'] = 'Your transcation has been failed for amount ' . $arrmixRequestData['amount'];
                $arrmixResponseData['data'] = $arrTransactionDetails;
                
            } else {
                
                $arrUpdateOrderData = array(
                        'order_payment_status' => ORDER_PAYMENT_STATUS_USER_CANCELLED,
                        'order_id' => $arrmixRequestData['udf1']
                );
                $this->Orders->update( $arrUpdateOrderData );

                $arrmixResponseData['status'] = 'userCancelled';
                $arrmixResponseData['message'] = 'You have cancelled the transaction of amount ' . $arrmixRequestData['amount'];
            }
        } else {
            $arrmixResponseData['success'] = false;
            $arrmixResponseData['message'] = 'Validation Errors';
            $arrmixResponseData['error'] = $this->getValidationErrors();
        }       
        
        return $arrmixResponseData;
    }

    public function actionSubscriptionPaymentResponse() {
        
        $arrmixRequestData = $this->getRequestParameterDetails();
        
        if( true == $this->validateParameters( 'api-product-payment-response', $arrmixRequestData ) ) {
            $arrmixDecrptedTokenData = $this->getDecryptedTokenDetails();
            
            if( 'success' ==  $arrmixRequestData['status'] ) {
                
                $arrmixTransactionDetails = [
                    'user_purchase_subscription_id' => $arrmixRequestData['udf1'],
                    'txnid'                         => $arrmixRequestData['txnid'],
                    'status'                        => $arrmixRequestData['status'],
                    'error'                         => isset( $arrmixRequestData['error'] ) ? $arrmixRequestData['error'] : '',
                    'error_message'                 => $arrmixRequestData['error_Message'],
                    'easepayid'                     => $arrmixRequestData['easepayid'],
                    'payment_source'                => $arrmixRequestData['payment_source'],
                    'net_amount_debit'              => $arrmixRequestData['net_amount_debit'],
                    'added_on'                      => $arrmixRequestData['addedon'],
                    'total_amount'                  => $arrmixRequestData['amount'],
                    'deduction_percentage'          => $arrmixRequestData['deduction_percentage'],
                ];

                $this->Transaction->insert( $arrmixTransactionDetails );

                $arrmixUserPurchaseSubscriptionUpdateData = [
                    'user_purchase_subscription_id' => $arrmixRequestData['udf1'],
                    'payment_status' => ORDER_PAYMENT_STATUS_COMPLETED
                ];
                
                $this->UserPurchaseSubscriptions->update( $arrmixUserPurchaseSubscriptionUpdateData );
                
                $arrmixUserUpdateData = [
                    'user_id' => $arrmixDecrptedTokenData['user_id'],
                    'is_subscription' => SUBSCRIBED,
                    'is_subscription_expire' => NOT_SUBSCRIPTION_EXPIRED
                ];
                
                $this->User->update( $arrmixUserUpdateData );
                
                $strTo = ADMINEMAILID;
                $strSubject = "User " . $arrmixRequestData['firstname'] . " has been subscribed plan." ;
                $strMessage = $this->load->view('Email/purchase_subscription', $arrmixRequestData, true );
                
                $this->sendEmail( $strTo, $strSubject, $strMessage );

                $arrmixRequestData['boolIsUser'] = true;
                $strTo = $arrmixRequestData['email'];
                $strSubject = "Organic pandit subscription plan.";
                $strMessage = $this->load->view( 'Email/purchase_subscription', $arrmixRequestData, true );
                
                $this->sendEmail( $strTo, $strSubject, $strMessage);
                
                if( true == isIdVal( $arrmixRequestData['phone'] ) ) {
                    $strMessage = 'Hi ' . $arrmixRequestData['firstname'] . ',%0aYour subscription plan has been successfully done. Your purchase subscription number is ' . $arrmixRequestData['productinfo']  . ' and transaction amount is ' . $arrmixRequestData['amount'] . ' .%0aThank you for subscribing our services.%0a%0aTeam OrganicPandit.';
                    $this->sendSms( $arrmixRequestData['phone'], $strMessage );
                }

                $arrmixResponseData['status'] = 'success';
                $arrmixResponseData['message'] = 'Your subscription plan has been successfully done. Your purchase subscription number is ' . $arrmixRequestData['productinfo']  . ' and transaction amount is ' . $arrmixRequestData['amount'];
                $arrmixResponseData['data'] = $arrmixTransactionDetails;
                

            } else if( 'failure' == $arrmixRequestData['status'] ) {
                $arrmixTransactionDetails = [
                    'user_purchase_subscription_id' => $arrmixRequestData['udf1'],
                    'txnid'             => $arrmixRequestData['txnid'],
                    'status'            => $arrmixRequestData['status'],
                    'error'             => isset( $arrmixRequestData['error'] ) ? $arrmixRequestData['error'] : '',
                    'error_message'     => $arrmixRequestData['error_Message'],
                    'easepayid'         => $arrmixRequestData['easepayid'],
                    'payment_source'    => $arrmixRequestData['payment_source'],
                    'net_amount_debit'  => $arrmixRequestData['net_amount_debit'],
                    'added_on'          => $arrmixRequestData['addedon'],
                    'total_amount'      => $arrmixRequestData['amount'],
                ];
                $this->Transaction->insert( $arrmixTransactionDetails );
                
                $arrmixUserPurchaseSubscriptionUpdateData = [
                    'user_purchase_subscription_id' => $arrmixRequestData['udf1'],
                    'payment_status' => ORDER_PAYMENT_STATUS_FAILED
                ];
                
                $this->UserPurchaseSubscriptions->update( $arrmixUserPurchaseSubscriptionUpdateData );
                
                if( true == isIdVal( $arrmixRequestData['phone'] ) ) {
                    $strMessage = 'Hi ' . $arrmixRequestData['firstname'] . ',%0aYour transcation has been failed for amount ' . $arrmixRequestData['amount'] . ' .%0aThank you.%0a%0aTeam OrganicPandit.';
                    $this->sendSms( $arrmixRequestData['phone'], $strMessage );
                }
                
                $arrmixResponseData['status'] = 'failure';
                $arrmixResponseData['message'] = 'Your transcation has been failed for amount ' . $arrmixRequestData['amount'];
                $arrmixResponseData['data'] = $arrmixTransactionDetails;
                
            } else {
                
                $arrmixUserPurchaseSubscriptionUpdateData = [
                    'user_purchase_subscription_id' => $arrmixRequestData['udf1'],
                    'payment_status' => ORDER_PAYMENT_STATUS_USER_CANCELLED
                ];
                
                $this->UserPurchaseSubscriptions->update( $arrmixUserPurchaseSubscriptionUpdateData );

                $arrmixResponseData['status'] = 'userCancelled';
                $arrmixResponseData['message'] = 'You have cancelled the transaction of amount ' . $arrmixRequestData['amount'];
            }
        } else {
            $arrmixResponseData['success'] = false;
            $arrmixResponseData['message'] = 'Validation Errors';
            $arrmixResponseData['error'] = $this->getValidationErrors();
        }       
        
        return $arrmixResponseData;
    }
    
    public static function createService() {
        return new PaymentResponseController();
    }
    
}
