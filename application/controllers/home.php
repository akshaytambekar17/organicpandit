<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function __Construct()
    { 
    	parent::__Construct();
    	$this->load->model('count_user_model');  // to get state and city value in dropdown

    }
	
	
	public function index()
	{
		 $data['sessionArray'] = $this->session->all_userdata();
		 $data['cnt_farmer'] =  $this->count_user_model->get_farmer();
		 $data['cnt_fpo'] =  $this->count_user_model->get_fpo();
		 $data['cnt_trader'] =  $this->count_user_model->get_trader();
		 $data['cnt_processor'] =  $this->count_user_model->get_processor();
		 $data['cnt_buyer'] =  $this->count_user_model->get_buyer();
		 $data['cnt_org_consultant'] =  $this->count_user_model->get_org_consultant();
		 $data['cnt_org_input'] =  $this->count_user_model->get_org_input();
		 $data['cnt_packaging'] =  $this->count_user_model->get_packaging();
		 $data['cnt_logistic'] =  $this->count_user_model->get_logistic();
		 $data['cnt_equipment'] =  $this->count_user_model->get_equipment();
		 $data['cnt_exhibitors'] =  $this->count_user_model->get_exhibitors();
		 $data['cnt_shops'] =  $this->count_user_model->get_shops();
		 $data['cnt_labs'] =  $this->count_user_model->get_labs();
		 $data['cnt_gov_agency'] =  $this->count_user_model->get_gov_agency();
		 $data['cnt_institutions'] =  $this->count_user_model->get_institutions();
		 $data['cnt_restaurant'] =  $this->count_user_model->get_restaurant();
		 $data['cnt_ngo'] =  $this->count_user_model->get_ngo();
		$this->load->view('home', $data);
	}

	

  }
