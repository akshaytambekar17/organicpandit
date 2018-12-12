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
        $data = array('user_type_id' => $post['user_type_id'],
                      'username' => $post['username'],
                      'password' => $post['password']
                    );
        $result = $this->login_model->getUsersByEmailIdPassword($data);
        if($result){
            $session_data = array(
                'usertype' => $result['user_type_id'],
                'username' => $result['username'],
                'id' => $result['user_id'],
            );
            $this->session->set_userdata('user_data', $result);
            print('success');
        } else {
            $this->session->set_flashdata('error', 'Invalid Username and Password');
            print('fail');
        }
    }

}
