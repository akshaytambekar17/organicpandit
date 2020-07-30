<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __Construct() {
        parent::__Construct();
        $this->load->model('user_type_model','UserType');
        $this->load->model('login_model');
    }

    public function index() {
        $userSession = $this->session->userdata('user_data');
        if(!empty($userSession)){
            redirect('home');
        }
        
        $data['title'] = 'Registration';
        $data['heading'] = 'Register With Us';
        $data['hide_footer'] = true;
        $data['view'] = 'login';
        $data['user_type_list'] = $this->UserType->getUserTypes();
        $data['userSession'] = $userSession;
        $this->frontendFooterLayout($data);
        //$this->load->view('login',$data);
    }

    function login_validation() {
        $this->load->library('form_validation');
        
        $arrmixRequestData = $this->input->post();
        
        if( true == isIdVal( $arrmixRequestData['user_type_id'] ) ) { 
            
            $arrmixUserDetails = $this->login_model->getUsersByEmailIdPassword( $arrmixRequestData );
            
            if( true == isArrVal( $arrmixUserDetails ) ) { 
                if( true == $arrmixUserDetails['is_validate_otp'] ) {
                    $this->session->set_userdata( 'user_data', $arrmixUserDetails );
                    $arrmixResponseData['success'] = true;
                    $arrmixResponseData['userData'] = $arrmixUserDetails;
                } else{
                    $arrmixResponseData['success'] = false;
                    $arrmixResponseData['message'] = 'Your account has been not validate. Please verify your mobile number using OTP or contact to support team.';
                }
            } else {
                $arrmixResponseData['success'] = false;
                $arrmixResponseData['message'] = 'Invalid Username and Password';
            }
        } else {
            $arrmixResponseData['success'] = false;
            $arrmixResponseData['message'] = 'Invalid User Type';
        }
        
        $this->response( $arrmixResponseData );
    }

}
