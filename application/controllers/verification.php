<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verification extends CI_Controller    {

    public function __construct()
    {
        parent::__construct();
         $this->load->model('verification_model');
          $this->load->model('login_model');
    }

    function index()
    {
        $data   = array();
        $data['results'] = $this->verification_model->get_verification();
    //    $data['result1'] = $this->notification_model->update_verification();
        $this->load->view('verification', $data);
    }
    
    public function create_verification(){
     $this->verification_model->update_verification();
     $this->verification_model->update();

 } 
 
 public function create_verification1(){
     $this->verification_model->update_verification1();
      $this->verification_model->update();

 } 
    
   
}
?>