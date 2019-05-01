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
        $post =$this->input->post();
        if( !empty( $post['user_type_id'] ) ) { 
            
            $data = array('user_type_id' => $post['user_type_id'],
                          'username' => $post['username'],
                          'password' => $post['password']
                        );
            $arrUserDetailsResult = $this->login_model->getUsersByEmailIdPassword($data);
            if( !empty( $arrUserDetailsResult ) ) { 
                $userDetails = array(
                    'usertype' => $arrUserDetailsResult['user_type_id'],
                    'username' => $arrUserDetailsResult['username'],
                    'id' => $arrUserDetailsResult['user_id'],
                );
                $this->session->set_userdata('user_data', $arrUserDetailsResult);
                $result['success'] = true;
                $result['userData'] = $userDetails;
            } else {
                $this->session->set_flashdata('error', 'Invalid Username and Password');
                $result['success'] = false;
                $result['message'] = 'Invalid Username and Password';
            }
        } else {
            $this->session->set_flashdata('error', 'Please select the User Type');
            $result['success'] = false;
            $result['message'] = 'Please select the User Type';
        }
        echo json_encode( $result );
    }

}
