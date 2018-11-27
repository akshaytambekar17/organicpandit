<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __Construct() {
        parent::__Construct();
    }

    public function index() {
        $this->load->view('login');
    }

    function login_validation() {
        $this->load->library('form_validation');

        //true  
        $usertype = $this->input->post('usertype');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //model function  
        $this->load->model('login_model');
        $id = $this->login_model->can_login($usertype, $username, $password);
        if ($result = $this->login_model->can_login($usertype, $username, $password)) {
            $result['usertype'] = $usertype;
            $session_data = array(
                'usertype' => $usertype,
                'username' => $username,
                'id' => $id,
            );
            
            $this->session->set_userdata('user_data', $result);
            //$this->session->set_userdata($result);
        } else {
            $this->session->set_flashdata('error', 'Invalid Username and Password');
            print('fail');
        }
    }

}
