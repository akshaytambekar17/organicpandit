<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboardview extends CI_Controller {

	
	public function __Construct()
    { 
    	parent::__Construct();
    	 $this->load->model('dashboardview_model');
    	 $this->load->model('login_model');
    }
	
	
	public function index()
	{
		   $data   = array();
    //    $this->load->helper('url');
    //    $this->load->library('acl');
        $data['result'] = $this->dashboardview_model->get_contents();
         $data['results'] = $this->dashboardview_model->get_verification();
        $this->load->view('dashboardview', $data);

	}

	

  }
