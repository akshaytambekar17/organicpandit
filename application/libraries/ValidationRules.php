<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ValidationRules {

    public function rules() {
        $arrmixConfigRules = [

            'api-paynow-form' => [
                [
                    'field' => 'user_id',
                    'label' => 'UserId',
                    'rules' => 'required|numeric'
                ],
                [
                    'field' => 'user_type_id',
                    'label' => 'UserTypeId',
                    'rules' => 'required|numeric'
                ],
                [
                    'field' => 'fullname',
                    'label' => 'Fullname',
                    'rules' => 'required'
                ],
                [
                    'field' => 'email_id',
                    'label' => 'Email Id',
                    'rules' => 'required'
                ],
                [
                    'field' => 'mobile_no',
                    'label' => 'Mobile Number',
                    'rules' => 'required|numeric'
                ],
                [
                    'field' => 'state_id',
                    'label' => 'State',
                    'rules' => 'required|numeric'
                ],
                [
                    'field' => 'city_id',
                    'label' => 'City',
                    'rules' => 'required|numeric'
                ],
                [
                    'field' => 'pincode',
                    'label' => 'Pincode',
                    'rules' => 'required|numeric'
                ],
                [
                    'field' => 'address',
                    'label' => 'Address',
                    'rules' => 'required'
                ],
                [
                    'field' => 'product_details',
                    'label' => 'Product Details',
                    'rules' => 'required'
                ],
                [
                    'field' => 'payment_method',
                    'label' => 'Payment Method',
                    'rules' => 'required'
                ]
            ],
            
            'api-user-subscription-form' => [
                [
                    'field' => 'user_id',
                    'label' => 'UserId',
                    'rules' => 'required|numeric'
                ],
                [
                    'field' => 'user_type_id',
                    'label' => 'UserTypeId',
                    'rules' => 'required|numeric'
                ],
                [
                    'field' => 'fullname',
                    'label' => 'Fullname',
                    'rules' => 'required'
                ],
                [
                    'field' => 'email_id',
                    'label' => 'Email Id',
                    'rules' => 'required'
                ],
                [
                    'field' => 'mobile_no',
                    'label' => 'Mobile Number',
                    'rules' => 'required|numeric'
                ],
                [
                    'field' => 'subscription_plan_id',
                    'label' => 'Subscription Plan',
                    'rules' => 'required|numeric'
                ],
                [
                    'field' => 'payment_method',
                    'label' => 'Payment Method',
                    'rules' => 'required'
                ]
            ],
            
            'api-product-payment-response' => [
                [
                    'field' => 'txnid',
                    'label' => 'TranscationId',
                    'rules' => 'required'
                ],
                [
                    'field' => 'status',
                    'label' => 'Status',
                    'rules' => 'required'
                ],
                [
                    'field' => 'error_Message',
                    'label' => 'Error Message',
                    'rules' => 'required'
                ],
                [
                    'field' => 'easepayid',
                    'label' => 'Easepay Id',
                    'rules' => 'required'
                ],
                [
                    'field' => 'payment_source',
                    'label' => 'Payment Source',
                    'rules' => 'required'
                ],
                [
                    'field' => 'amount',
                    'label' => 'Amount',
                    'rules' => 'required'
                ],
                [
                    'field' => 'addedon',
                    'label' => 'addedon',
                    'rules' => 'required'
                ]
            ],
            'validate-otp-form' => [
                [
                    'field' => 'user_id',
                    'label' => 'User Id',
                    'rules' => 'required'     
                ],
                [
                    'field' => 'otp',
                    'label' => 'OTP',
                    'rules' => 'required'     
                ],
                
            ]

        ];
        
        return $arrmixConfigRules;
    }
    
    public function run( $strRuleName ) {
        
        $arrmixConfigRule = $this->rules();
        
        if( true == isset( $arrmixConfigRule[$strRuleName] ) ) {
            return $arrmixConfigRule[$strRuleName];
        }
        
        return false;
        
    }
    
    public static function createService() {
        return new ValidationRules();
    }

}
