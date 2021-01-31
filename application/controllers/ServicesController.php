<?php
require_once __DIR__ . './../libraries/ValidationRules.php';

class ServicesController extends CI_Controller {

    public $g_intAppVersion;
    public $g_strMethodName;
    public $g_arrmixAuthDetails;
    public $g_arrmixParameterDetails;
    public $g_arrmixTokenDetails;
    protected $g_arrmixValidationErrors;
    
    public static $s_arrmixSkipMethod = ['login'];
    
    public function __construct() {
        parent::__construct();
        
        header( 'Access-Control-Allow-Origin: *' );
        header( "Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE" );
        
        $this->loadServices();
        
        $objRequestRawData = file_get_contents( "php://input" );
        
        if( false == isVal( $objRequestRawData ) ) {
            $this->generateErrorMessage( 'Raw data request is required.', ERROR_INVALID_REQUEST, ERROR_MESSAGE_INVALID_REQUEST );
        }
        
        $this->validateRequestData( $objRequestRawData );
        
    }   
    
    public function validateRequestData( $objRequestRawData ) {
        
        $arrmixRequestRawData = json_decode( $objRequestRawData, true );
        
        if( false == isset( $arrmixRequestRawData['app_version'] ) ) {
            $this->generateErrorMessage( 'App version is required.', ERROR_INVALID_REQUEST, ERROR_MESSAGE_INVALID_REQUEST );
        }
        
        if( false == isset( $arrmixRequestRawData['method'] ) && false == isArrVal( $arrmixRequestRawData['method'] ) ) {
            $this->generateErrorMessage( 'Method is required.', ERROR_INVALID_REQUEST, ERROR_MESSAGE_INVALID_REQUEST );
        }
        
        if( false == isset( $arrmixRequestRawData['method']['name'] ) && false == isStrVal( $arrmixRequestRawData['method']['name'] ) ) {
            $this->generateErrorMessage( 'Method name is required.', ERROR_INVALID_REQUEST, ERROR_MESSAGE_INVALID_REQUEST );
        }
        
        if( false == isset( $arrmixRequestRawData['method']['parameters'] ) ) {
            $this->generateErrorMessage( 'Parameters is required.', ERROR_INVALID_REQUEST, ERROR_MESSAGE_INVALID_REQUEST );
        }
        
        if( false == isset( $arrmixRequestRawData['auth'] ) ) {
            $this->generateErrorMessage( 'Auth type is required.', ERROR_INVALID_REQUEST, ERROR_MESSAGE_INVALID_REQUEST );
        }
        
        if( false == in_array( $arrmixRequestRawData['method']['name'], self::$s_arrmixSkipMethod ) ) {
            if( false == isset( $arrmixRequestRawData['auth']['token'] ) || false == isVal( $arrmixRequestRawData['auth']['token'] ) ) {
                $this->generateErrorMessage( 'Auth token is required.', ERROR_INVALID_REQUEST, ERROR_MESSAGE_INVALID_REQUEST );
            }
            $arrmixDecryptTokenData = getDecryptedToken( $arrmixRequestRawData['auth']['token'] );
            
            if( false == isset( $arrmixDecryptTokenData['user_id'] ) || false == isset( $arrmixDecryptTokenData['user_type_id'] ) ||
               false == isIdVal( $arrmixDecryptTokenData['user_id'] ) || false == isIdVal( $arrmixDecryptTokenData['user_type_id'] ) ) {
                
                $this->generateErrorMessage( ERROR_MESSAGE_INVALID_TOKEN, ERROR_INVALID_TOKEN );
            }
            
            $arrmixUserDetails = $this->User->getUserById( $arrmixDecryptTokenData['user_id'] );
            if( false == isArrVal( $arrmixUserDetails ) ) {
                $this->generateErrorMessage( ERROR_MESSAGE_INVALID_TOKEN, ERROR_INVALID_TOKEN );
            }
            
            $this->setDecryptedTokenDetails( $arrmixDecryptTokenData );
        }
        
        $this->setRequestAuthDetails( $arrmixRequestRawData['auth'] );
        $this->setRequestMethodName( $arrmixRequestRawData['method']['name'] );
        $this->setRequestParameterDetails( $arrmixRequestRawData['method']['parameters'] );
        
    }
    
    public function generateErrorMessage( $strErrorMessage, $intErrorType, $strErrorTypeName = '' ) {
        
        $arrmixResponseData['response'] = [
            'error' => $intErrorType,
            'message' =>  ( ( true == isStrVal( $strErrorTypeName ) ) ? $strErrorTypeName . ': ' : '' ) . $strErrorMessage
        ];
        
        $this->response( $arrmixResponseData );
        exit;
    }
    
    public function generateSuccessMessage( $arrmixResponseDetails ) {
        
        $arrmixResponseData['response'] = [
            'status' => SUCCESS,
            'data' =>  $arrmixResponseDetails
        ];
        
        $this->response( $arrmixResponseData );
        exit;
    }
    
    public function setDecryptedTokenDetails( $arrmixDecryptTokenData ) {
        $this->g_arrmixTokenDetails = $arrmixDecryptTokenData;
    }
    
    public function getDecryptedTokenDetails() {
        return $this->g_arrmixTokenDetails;
    }
    
    public function setRequestAuthDetails( $arrmixAuthDetails ) {
        $this->g_arrmixAuthDetails = $arrmixAuthDetails;
    }
    
    public function getRequestAuthDetails() {
        return $this->g_arrmixAuthDetails;
    }
    
    public function setRequestMethodName( $strMethodName ) {
        $this->g_strMethodName = $strMethodName;
    }
    
    public function getRequestMethodName() {
        return $this->g_strMethodName;
    }
    
    public function setRequestParameterDetails( $arrmixParameterDetails ) {
        $this->g_arrmixParameterDetails = $arrmixParameterDetails;
    }
    
    public function getRequestParameterDetails() {
        return $this->g_arrmixParameterDetails;
    }
    
    public function response( $arrData ) {
        echo json_encode( $arrData );
    }
    
    private function loadServices() {
        $this->load->database();
        $this->load->library( ['form_validation', 'encryption'] );
        $this->load->helper( ['url', 'language','form'] );
        
        $this->load->model( 'user_model','User' );
        $this->load->model( 'user_product_model','UserProduct' );
        $this->load->model( 'user_bank_model','UserBank' );
        $this->load->model( 'user_type_model','UserType' );
        $this->load->model( 'user_soil_model','UserSoil' );
        $this->load->model( 'user_micro_nutrient_model','UserMicroNutrient' );
        $this->load->model( 'user_crop_model','UserCrop' );
        $this->load->model( 'user_input_organic_model','UserInputOrganic' );
        $this->load->model( 'user_input_organic_ecommerce_model','UserInputOrganicEcommerce' );
        $this->load->model( 'user_certifications_model','UserCertifications' );
        $this->load->model( 'country_model','Country' );
        $this->load->model( 'state_model','State' );
        $this->load->model( 'city_model','City' );
        $this->load->model( 'notifications_model','Notifications' );
        $this->load->model( 'certification_agency_model','CertificationAgency' );
        $this->load->model( 'organic_setting_model','OrganicSetting' );
        $this->load->model( 'search_enquiry_model','SearchEnquiry' );
        $this->load->model( 'product_model','Product' );
        $this->load->model( 'product_category_model','ProductCategory' );
        $this->load->model( 'agency_model','Agency' );
        $this->load->model( 'sell_products_model','SellProduct' );
        $this->load->model( 'orders_model','Orders' );
        $this->load->model( 'transaction_model','Transaction' );
        $this->load->model( 'sell_products_images_model','SellProductImage' );
        $this->load->model( 'send_enquiry_buyer_model','SendEnquiryBuyer' );
        $this->load->model( 'user_ecommerces_model','UserEcommerces' );
        $this->load->model( 'user_ecommerce_images_model','UserEcommerceImages' );
        $this->load->model( 'product_units_model','ProductUnits' );
        $this->load->model( 'meta_data_model','MetaData' );
        $this->load->model( 'blogs_model','Blogs' );
        $this->load->model( 'blog_categories_model','BlogCategories' );
        $this->load->model( 'lab_reports_model','LabReports' );
        $this->load->model( 'app_slider_images_model', 'AppSliderImages' );
        $this->load->model( 'user_exhibitions_model', 'UserExhibitions' );
        $this->load->model( 'user_exhibition_images_model', 'UserExhibitionImages' );
        $this->load->model( 'subscription_plans_model', 'SubscriptionPlans' );
        $this->load->model( 'user_purchase_subscriptions_model', 'UserPurchaseSubscriptions' );

    }

    public function getValidationErrors() {
        return $this->g_arrmixValidationErrors;
    }
    
    public function validateParameters( $strRuleName, $arrmixParameterData ) {
        
        if( false == isArrVal( $arrmixParameterData ) || false == isVal( $strRuleName ) ) {
            return false;
        }
        
        $arrmixValidationList = ValidationRules::createService()->run( $strRuleName );
        
        if( false == isArrVal( $arrmixValidationList ) ) {
            $this->g_arrmixValidationErrors = ['message' => 'Invalid rule'];
            return false;
        }
        
        foreach( $arrmixValidationList as $arrmixValidationDetails ) {
            
            if( true == isset( $arrmixValidationDetails['rules'] ) ) {
                $arrmixRules = explode( '|', $arrmixValidationDetails['rules'] ) ;
                $this->executeRules( $arrmixParameterData, $arrmixValidationDetails['label'], $arrmixValidationDetails['field'], $arrmixRules  );
            }
        }
        
        if( false == isArrVal( $this->g_arrmixValidationErrors ) ) {
            return true;
        }
        
        return false;
        
    }
    
    private function executeRules( $arrmixParameterData, $strFieldLabel, $strField, $arrmixRuleList  ) {
        
        if( false == isArrVal( $arrmixRuleList ) ) {
            return false;
        }
        
        foreach( $arrmixRuleList as $strRule ) {
            
            switch( $strRule ) {
                case 'required':
                    if( false == isset( $arrmixParameterData[$strField] ) || false == isVal( $arrmixParameterData[$strField] ) ) {
                        $this->g_arrmixValidationErrors[$strField] = 'The ' . $strFieldLabel . ' is required.';
                    }
                    break;
                
                case 'numeric':
                    if( true == isset( $arrmixParameterData[$strField] ) && false == isIdVal( $arrmixParameterData[$strField] ) ) {
                        $this->g_arrmixValidationErrors[$strField] = 'The ' . $strFieldLabel . ' is should be numeric.';
                    }
                    break;
                
                case 'string':
                    if( true == isset( $arrmixParameterData[$strField] ) && false == isStrVal( $arrmixParameterData[$strField] ) ) {
                        $this->g_arrmixValidationErrors[$strField] = 'The ' . $strFieldLabel . ' is should be string.';
                    }
                    break;
                
                default :
            }
        }
        
        return true;
        
    }
    
    public static function createService() {
        return new ServicesController();
    }
    
   
}
