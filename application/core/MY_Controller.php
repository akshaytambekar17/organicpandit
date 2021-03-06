<?php
include_once('easebuzz/easebuzz_payment_gateway.php');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('form_validation','encryption'));
        $this->load->helper(array('url', 'language','form'));
        $this->load->model('login_model','Login');
        $this->load->model('contact_us_model','ContactUs');
        $this->load->model('crop_model','Crop');
        $this->load->model('bid_model','Bid');
        $this->load->model('post_requirement_model','PostRequirement');
        $this->load->model('product_model','Product');
        $this->load->model('user_model','User');
        $this->load->model('user_product_model','UserProduct');
        $this->load->model('user_bank_model','UserBank');
        $this->load->model('user_type_model','UserType');
        $this->load->model('user_soil_model','UserSoil');
        $this->load->model('user_micro_nutrient_model','UserMicroNutrient');
        $this->load->model('user_crop_model','UserCrop');
        $this->load->model('user_input_organic_model','UserInputOrganic');
        $this->load->model('user_input_organic_ecommerce_model','UserInputOrganicEcommerce');
        $this->load->model('user_certifications_model','UserCertifications');
        $this->load->model('country_model','Country');
        $this->load->model('state_model','State');
        $this->load->model('city_model','City');
        $this->load->model('notifications_model','Notifications');
        $this->load->model('certification_agency_model','CertificationAgency');
        $this->load->model('organic_setting_model','OrganicSetting');
        $this->load->model('search_enquiry_model','SearchEnquiry');
        $this->load->model('product_category_model','ProductCategory');
        $this->load->model('agency_model','Agency');
        $this->load->model('sell_products_model','SellProduct');
        $this->load->model('orders_model','Orders');
        $this->load->model('transaction_model','Transaction');
        $this->load->model('sell_products_images_model','SellProductImage');
        $this->load->model('send_enquiry_buyer_model','SendEnquiryBuyer');
        $this->load->model('user_ecommerces_model','UserEcommerces');
        $this->load->model('user_ecommerce_images_model','UserEcommerceImages');
        $this->load->model('product_units_model','ProductUnits');
        $this->load->model('meta_data_model','MetaData');
        $this->load->model('blogs_model','Blogs');
        $this->load->model('blog_categories_model','BlogCategories');
        $this->load->model('lab_reports_model','LabReports');
        $this->load->model( 'app_slider_images_model', 'AppSliderImages' );
        $this->load->model( 'user_exhibitions_model', 'UserExhibitions' );
        $this->load->model( 'user_exhibition_images_model', 'UserExhibitionImages' );
        $this->load->model( 'subscription_plans_model', 'SubscriptionPlans' );
        $this->load->model( 'user_purchase_subscriptions_model', 'UserPurchaseSubscriptions' );
        
    }

    public function backendLayout($data) {
        $data['structure'] = 'backend';
        if(!empty($data['header'])){
            includesHeader($data);
        }else if(!empty($data['headerSidebar'])){
            includesHeaderSidebar($data);
        }else if(!empty($data['headerFooter'])){
            includesHeaderFooter($data);
        }else{
            includesAll($data);
        }

    }

    public function frontendLayout($data) {
    	includesHeaderFooter($data);
    }

    public function frontendFooterLayout($data) {
        includesFrontendFooter($data);
    }

    public function frontendLayoutHome($data) {
        includesHeaderFooterHome($data);
    }
    
    public function ecommerceFrontendLayout( $arrmixData ) {
        includesEcommerceFrontend( $arrmixData );
    }

    function curlReq($url, $vars) {
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_POST, 1);
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $vars);
        $buffer = curl_exec($curl_handle);
        curl_close($curl_handle);
        $object = json_decode($buffer);
        return $object;
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
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'p3plcpnl0542.prod.phx3.secureserver.net';
        $config['smtp_user'] = MAIL_USERNAME;
        $config['smtp_pass'] = MAIL_PASSWORD;
        $config['smtp_port'] = 465;
        $config['smtp_crypto'] = 'ssl';
        $config['charset']   = 'utf-8';
        $config['newline']   = "\r\n";
        $config['mailtype'] = 'html';
        $config['wordwrap'] = TRUE;
        $this->email->initialize($config);
        $this->email->from( MAIL_USERNAME, 'Organic Pandit');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        
        if($this->email->send()){
            $result['success'] = true;
            $result['message'] = "Email has been sent Successfully";
        }else{
            $result['success'] = false;
            $result['message'] = "Something went wrong please try again";
            printDie($this->email->print_debugger());
        }
        return $result;
    }

    public function response( $arrData ) {
        echo json_encode( $arrData );
    }
    
    public function calculateOffset( $intPageNo ) {
        if( true == isIdVal( $intPageNo ) ) {
            return ( LIMIT * ( $intPageNo - 1 ) );
        }else {
            return DEFAULT_OFFEST;
        }
    }

    public function paymentTransaction( $arrmixPaymentDetails ){

        $arrPaymentGatewayConfigDetails = getPaymentGatewayConfigDetails();
        $arrobjEasebuzzObj = new Easebuzz( $arrPaymentGatewayConfigDetails['key'], $arrPaymentGatewayConfigDetails['salt'], paymentGatewayEnviroment() );
        if( INITIATE_PAYMENT == $arrmixPaymentDetails['api'] ) {

            /*  Very Important Notes
            *
            * Post Data should be below format.
            *
                Array ( [txnid] => T3SAT0B5OL [amount] => 100.0 [firstname] => jitendra [email] => test@gmail.com [phone] => 1231231235 [productinfo] => Laptop [surl] => http://localhost:3000/response.php [furl] => http://localhost:3000/response.php [udf1] => aaaa [udf2] => aa [udf3] => aaaa [udf4] => aaaa [udf5] => aaaa [address1] => aaaa [address2] => aaaa [city] => aaaa [state] => aaaa [country] => aaaa [zipcode] => 123123 )
            */
            $result = $arrobjEasebuzzObj->initiatePaymentAPI( $arrmixPaymentDetails['payment_details'] );

            $this->easebuzzAPIResponse( $result, $arrmixPaymentDetails );

        } else if( TRANSACTION == $arrmixPaymentDetails['api'] ){

            /*  Very Important Notes
            *
            * Post Data should be below format.
            *
                Array ( [txnid] => TZIF0SS24C [amount] => 1.03 [email] => test@gmail.com [phone] => 1231231235 )
            */
            $result = $arrobjEasebuzzObj->transactionAPI( $arrmixPaymentDetails['payment_details'] );

            $this->easebuzzAPIResponse( $result );

        }else if( TRANSACTION_DATE == $arrmixPaymentDetails['api'] || TRANSACTION_DATE_API == $arrmixPaymentDetails['api'] ){

            /*  Very Important Notes
            *
            * Post Data should be below format.
            *
                Array ( [merchant_email] => jitendra@gmail.com [transaction_date] => 06-06-2018 )
            */
            $result = $arrobjEasebuzzObj->transactionDateAPI( $arrmixPaymentDetails['payment_details'] );

            $this->easebuzzAPIResponse( $result );

        }else if( REFUND == $arrmixPaymentDetails['api']  ){

            /*  Very Important Notes
            *
            * Post Data should be below format.
            *
                Array ( [txnid] => ASD20088 [refund_amount] => 1.03 [phone] => 1231231235 [email] => test@gmail.com [amount] => 1.03 )
            */
            $result = $arrobjEasebuzzObj->refundAPI( $arrmixPaymentDetails['payment_details'] );

            $this->easebuzzAPIResponse( $result );

        }else if( PAYOUT == $arrmixPaymentDetails['api'] ){

            /*  Very Important Notes
            *
            * Post Data should be below format.
            *
               Array ( [merchant_email] => jitendra@gmail.com [payout_date] => 08-06-2018 )
            */
            $result = $arrobjEasebuzzObj->payoutAPI( $arrmixPaymentDetails['payment_details'] );

            $this->easebuzzAPIResponse( $result );

        } else {

        }

    }

    public function easebuzzAPIResponse( $jsonmixResponseData, $arrmixPaymentDetails = array() ){

        printDie($jsonmixResponseData);

//        $arrSession = UserSession();
//        $arrUserSession = $arrSession['userData'];
//        $arrmixCartList = fetchCartDetails();
//        $data['success_message'] = 'Successfully Transcation Done.';
//        $data['transcation_id'] = 'TXNID00121';
//        $data['arrUserDetails'] = $arrUserSession;
//        $data['arrmixCartList'] = $arrmixCartList;
//        $data['title'] = 'Payment Response';
//        $data['heading'] = 'Payment Response';
//        $data['hide_footer'] = true;
//        $data['view'] = 'user/payment_response';
//
//        $this->frontendLayout($data);
    }
    
    public function generateOTP() {
        $intGeneratorNumber = "1357902468"; 
  
        $intOTP = ""; 

        for( $intCounter = 1; $intCounter <= 6; $intCounter++ ) { 
            $intOTP .= substr( $intGeneratorNumber, ( rand()%( strlen( $intGeneratorNumber ) ) ), 1 ); 
        } 

        return $intOTP; 
    }

}
