<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller    {

    public function __construct()
    {
        parent::__construct();
         $this->load->model('notification_model');
          $this->load->model('login_model');
    }

    function index()
    {
        $data   = array();
        $data['result'] = $this->notification_model->get_contents();
        $data['results'] = $this->notification_model->get_verification();
    //    $data['result1'] = $this->notification_model->update_verification();
        $this->load->view('notification', $data);
    }
    
    public function create_verification(){
     $this->notification_model->update_verification();
     $this->notification_model->insert_into();
     
 } 
    
   
}
?>