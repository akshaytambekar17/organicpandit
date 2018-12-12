<?php

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('url', 'language','form'));
        $this->load->model('login_model','Login');
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
        $this->load->model('state_model','State');
        $this->load->model('city_model','City');
        $this->load->model('notifications_model','Notifications');
        $this->load->model('certification_agency_model','CertificationAgency');
        
        define('ADMINUSERNAME', 'adminmaster');
        define('REGISTRATION', 1);
        define('POST', 2);
        define('BID', 3);
        define('VERIFY_REGISTRATION', 4);
        define('VERIFY_POST', 5);
        define('NOTIFY_SMS', 1);
        define('NOTIFY_EMAIL', 2);
        define('NOTIFY_PUSH', 3);
        define('NOTIFY_WEB', 4);
        
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
    
    public function sendSms($mobileno, $textmessage) {
//Your authentication key
        $authKey = "149798ARBQ5C3uSC958f9edd0";
//Multiple mobiles numbers separated by comma
        $mobileNumber = $mobileno;
//Sender ID,While using route4 sender id should be 6 characters long.
        $senderId = "ShiftMe";
//Your message to send, Add URL encoding here.
        $message = urlencode($textmessage);
//Define route 
        $route = "1";
//Prepare you post parameters
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender' => $senderId,
            'route' => $route
        );
//API URL
        $url = "https://control.msg91.com/api/sendhttp.php";
// init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
                //,CURLOPT_FOLLOWLOCATION => true
        ));
//Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//get response
        $output = curl_exec($ch);
//Print error if any
        if (curl_errno($ch)) {
//            echo 'error:' . curl_error($ch);
            return FALSE;
        }
        curl_close($ch);
        return TRUE;
//        echo $output;
    }
    public function sendEmail($to,$subject,$message){
        $this->load->library('email');
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_user'] = 'akshaytambekar17@gmail.com';
        $config['smtp_pass'] = '@kshay_1793';
        $config['smtp_port'] = 465;
        $config['charset']   = 'utf-8';
        $config['newline']   = "\r\n";
        $config['mailtype'] = 'html';
        $config['wordwrap'] = TRUE;
        $this->email->initialize($config);
        $this->email->from('akshaytambekar17@gmail.com', 'Shift Me');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        
        if($this->email->send()){
            $result['success'] = true;
            $result['message'] = "Email has been sent Successfully";
        }else{
            $result['success'] = false;
            $result['message'] = "Something went wrong please try again";
            //printDie($this->email->print_debugger());
        }
        return $result;
    }
//    public function UserSession(){
//        if($this->session->userdata('user_data')){
//            $result['success'] = true;
//            $result['userData'] = $this->session->userdata('user_data');
//        }else{
//            $result['success'] = false;
//            $result['userData'] = "Please login to continue";
//        }
//        return $result;
//    }
    
}
