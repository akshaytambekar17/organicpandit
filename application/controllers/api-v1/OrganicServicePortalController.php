<?php

require_once __DIR__ . './../ServicesController.php';

class OrganicServicePortalController extends ServicesController {

    public function index() {
        
        $strMethodName = 'action' . $this->getRequestMethodName();
        
        switch( $strMethodName ) {
            
            case 'actionAddOrder':
                require_once __DIR__ .'/OrderController.php';
                $arrmixResponseData = OrderController::createService()->$strMethodName();
                break;

            case 'actionGetSubscriptionPlans':
                require_once __DIR__ .'/SubscriptionController.php';
                $arrmixResponseData = SubscriptionController::createService()->$strMethodName();
                break;

            case 'actionAddSubscriptionOrder':
                require_once __DIR__ .'/SubscriptionController.php';
                $arrmixResponseData = SubscriptionController::createService()->$strMethodName();
                break;

            case 'actionProductPaymentResponse':
                require_once __DIR__ .'/PaymentResponseController.php';
                $arrmixResponseData = PaymentResponseController::createService()->$strMethodName();
                break;

            case 'actionSubscriptionPaymentResponse':
                require_once __DIR__ .'/PaymentResponseController.php';
                $arrmixResponseData = PaymentResponseController::createService()->$strMethodName();
                break;
                
            
            default:
                $this->generateErrorMessage( 'Method name ' . $this->getRequestMethodName() . ' not found', ERROR_METHOD_NAME_NOT_FOUND, ERROR_MESSAGE_METHOD_NAME_NOT_FOUND );
        }
        
        $this->generateSuccessMessage( $arrmixResponseData );
    }
    
    
    public function actionLogin() {
        
        $arrmixRequestParameterDetails = $this->getRequestParameterDetails();
        
        $arrmixResponseData = [
            'success' => false,
            'message' => 'Something went wrong. Please try later.'
        ];
        
        if( $this->validation->run( $arrmixRequestParameterDetails, 'validateServiceLogin' ) ) {
                
            $arrmixUserDetails = \App\Models\UsersModel::createService()->findUserByUsername( $arrmixRequestParameterDetails['username'] );
            
            if( true == isArrVal( $arrmixUserDetails ) ) {
                
                if( $arrmixRequestParameterDetails['password'] == $this->decryptPassword( $arrmixUserDetails['password'] ) ) {
                    
                    if( $arrmixRequestParameterDetails['standard_id'] == $arrmixUserDetails['standard_id'] ) {
                        $arrmixTokenData = [
                            'user_id' => $arrmixUserDetails['user_id'],
                            'user_type_id' => $arrmixUserDetails['user_type_id'],
                            'student_id' => $arrmixUserDetails['student_id'],
                            'roll_number' => $arrmixUserDetails['roll_number'],
                            'login_at' => CURRENT_DATETIME,
                        ];

                        $strEncryptedToken = $this->encryptToken( $arrmixTokenData );

                        $arrmixResponseData['success'] = true;
                        $arrmixResponseData['message'] = 'Successfully Login.';
                        $arrmixResponseData['user_details'] = $arrmixUserDetails;
                        $arrmixResponseData['token'] = $strEncryptedToken;
                    } else {
                        $arrmixResponseData['success'] = false;
                        $arrmixResponseData['message'] = 'You are not allowed to see other standard details. Please select your standard.';
                    }
                    
                } else {
                    $arrmixResponseData['success'] = false;
                    $arrmixResponseData['message'] = 'Invalid Password.';
                }
                
            } else {
                $arrmixResponseData['success'] = false;
                $arrmixResponseData['message'] = 'Invalid Username.';
            }
        } else {
            $this->generateErrorMessage( implode( ',', $this->validation->getErrors() ), ERROR_INVALID_PARAMETERS, ERROR_MESSAGE_INVALID_PARAMETERS );
        }
        
        $this->generateSuccessMessage( $arrmixResponseData );
        
    }
    
    public function sendSms( $intMobileNumber, $strMessage ) {
        
        $objCurlInit = curl_init();
        $strUsername = SMS_USERNAME;
        $strPassword = SMS_PASSWORD;
        $strSenderId = SMS_SENDER_ID; 
        
        $strCurrentData = CURRENT_DATETIME;
        $strPostFields = "userid=$strUsername&password=$strPassword&sender=$strSenderId&mobileno=$intMobileNumber&msg=$strMessage&msgtype=0&sendon=$strCurrentData";
        
        curl_setopt( $objCurlInit, CURLOPT_URL,  "http://web.sms2india.in/websms/sendsms.aspx?");
        curl_setopt( $objCurlInit, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt( $objCurlInit, CURLOPT_POST, 1);
        curl_setopt( $objCurlInit, CURLOPT_POSTFIELDS, $strPostFields );
        //Ignore SSL certificate verification
        curl_setopt( $objCurlInit, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt( $objCurlInit, CURLOPT_SSL_VERIFYPEER, 0);
        $strResponse = curl_exec( $objCurlInit );
        curl_close( $objCurlInit );
        return $strResponse;
        
    }

    public function sendEmail($to,$subject,$message){
        
        $this->load->library('encrypt');
        $this->load->library('email');
        
        $arrmixConfig = [];
        
        $arrmixConfig['protocol'] = 'smtp';
        $arrmixConfig['smtp_host'] = 'p3plcpnl0542.prod.phx3.secureserver.net';
        $arrmixConfig['smtp_user'] = MAIL_USERNAME;
        $arrmixConfig['smtp_pass'] = MAIL_PASSWORD;
        $arrmixConfig['smtp_port'] = 465;
        $arrmixConfig['smtp_crypto'] = 'ssl';
        $arrmixConfig['charset']   = 'utf-8';
        $arrmixConfig['newline']   = "\r\n";
        $arrmixConfig['mailtype'] = 'html';
        $arrmixConfig['wordwrap'] = true;
        
        $this->email->initialize($arrmixConfig);
        $this->email->from( MAIL_USERNAME, 'Organic Pandit');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        
        if( $this->email->send() ) {
            $arrmixResponse['success'] = true;
            $arrmixResponse['message'] = "Email has been sent Successfully";
        }else{
            $arrmixResponse['success'] = false;
            $arrmixResponse['message'] = "Something went wrong please try again";
            $arrmixResponse['error'] = $this->email->print_debugger(); 
        }
        
        return $arrmixResponse;
    }
    
    public function calculateOffset( $intPageNo ) {
        if( true == isIdVal( $intPageNo ) ) {
            return ( LIMIT * ( $intPageNo - 1 ) );
        }else {
            return DEFAULT_OFFEST;
        }
    }
    
    
}
