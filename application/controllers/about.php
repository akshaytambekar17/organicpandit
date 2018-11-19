<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	
	public function __Construct()
    { 
    	parent::__Construct();

    }
	
	
	public function index()
	{
		$this->load->view('about');
	}

	

  }
