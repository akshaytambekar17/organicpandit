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

    public function actionFetchProductByCategory() {
        
        $arrmixRequestData = $this->getRequestParameterDetails();

        if( true == $this->validateParameters( 'product-by-category-form', $arrmixRequestData ) ) { 

            $arrmixProductList = $this->Product->getProductByCategoryId( $arrmixRequestData['category_id'] );

            if( true == isArrVal( $arrmixProductList ) ) {
                $arrmixResponseData['success'] = true;
                $arrmixResponseData['message'] = 'Successfully fetch product list data';
                $arrmixResponseData['data'] = $arrmixProductList;
            } else {
                $arrmixResponseData['success'] = false;
                $arrmixResponseData['message'] = 'No data found';
            }

        } else {
            $arrmixResponseData['success'] = false;
            $arrmixResponseData['message'] = 'Please select Category';
        }
        
        return $arrmixResponseData;
    }

    public function actionAddUserProduct() {
        
        $arrmixRequestData = $this->getRequestParameterDetails();
        $arrintAcceptedUserTypeId = [ FARMER, BUYER ];

        if( true == $this->validateParameters( 'add-user-product-form', $arrmixRequestData ) ) { 

            if( true == in_array( $arrmixRequestData['user_type_id'], $arrintAcceptedUserTypeId ) ) {

                $strProductImage = '';
                $strImageErrorMessage = '';
                if ( true == isset( $_FILES['product_image']['name'] ) && true == isStrVal( $_FILES['product_image']['name'] ) ) {
                    
                    $arrmixConfig['upload_path'] = './assets/images/product_images/';
                    $arrmixConfig['allowed_types'] = 'gif|jpg|png|jpeg';
                    $arrmixConfig['max_size'] = 2048;
    
                    $this->load->library( 'upload', $arrmixConfig );
    
                    if( $this->upload->do_upload( 'product_image' ) ) {
                        $arrmixFileUploadData = $this->upload->data();
                        $strProductImage = $arrmixFileUploadData['file_name'];
                    } else {
                        $strImageErrorMessage = $this->upload->display_errors();
                    }

                } 
    
                if( false == isStrVal( $strImageErrorMessage ) ) {

                    $arrmixInsertData = $arrmixRequestData;
                    $arrmixInsertData['images'] = $strProductImage;
                    $arrmixInsertData['from_date'] = date( "Y-m-d", strtotime( $arrmixRequestData['from_date'] ) );
                    $arrmixInsertData['to_date'] = date( "Y-m-d", strtotime( $arrmixRequestData['to_date'] ) );
                    
                    $intUserProductId = $this->UserProduct->insert( $arrmixInsertData );
    
                    if( true == isIdVal( $intUserProductId ) ) {
                        $arrmixResponseData['success'] = true;
                        $arrmixResponseData['message'] = 'Product has been successfully inserted.';
                    } else {
                        $arrmixResponseData['success'] = false;
                        $arrmixResponseData['message'] = 'No data found';
                    }

                } else {
                    $arrmixResponseData['success'] = false;
                    $arrmixResponseData['message'] = $strImageErrorMessage;
                }

            } else {
                $arrmixResponseData['success'] = false;
                $arrmixResponseData['message'] = 'Invalid User Type Id. It should only Farmer and Buyer.';
            }
            
        } else {
            $arrmixResponseData['success'] = false;
            $arrmixResponseData['message'] = 'Please select Category';
        }
        
        return $arrmixResponseData;
    }
    
    public static function createService() {
        return new HomeServicesController();
    }
    
}
