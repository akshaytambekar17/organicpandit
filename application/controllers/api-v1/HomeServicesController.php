<?php

class HomeServicesController extends OrganicServicePortalController {
    
    function __construct() {
        parent::__construct();
    }
        
    
    public function actionValidateOtp() {
        $arrmixRequestData = $this->getRequestParameterDetails();

        if( true == $this->validateParameters( 'validate-otp-form', $arrmixRequestData ) ) { 

            $arrmixUserDetails = $this->User->getUserById( $arrmixRequestData['user_id'] );
            if( $arrmixRequestData['otp'] == $arrmixUserDetails['otp'] ) {
                $arrmixUpdateData = [
                    'is_validate_otp' => 1,
                    'user_id' => $arrmixUserDetails['user_id'],
                    'updated_by' => $arrmixUserDetails['user_id']
                ];
                $this->User->update( $arrmixUpdateData );

                $arrmixResult['success'] = true;
                $arrmixResult['message'] = 'Your account has been validated. Please conitune with the login.';
            } else {
                $arrmixResult['success'] = false;
                $arrmixResult['message'] = 'Invalid OTP. Please enter the valid OTP.';
            }

        } else {
            $arrmixResult['success'] = false;
            $arrmixResult['message'] = 'Validation Errors';
            $arrmixResult['error'] = $this->getValidationErrors();
        }        
    
        return $arrmixResult;
    }


    
    public static function createService() {
        return new HomeServicesController();
    }
    
}
