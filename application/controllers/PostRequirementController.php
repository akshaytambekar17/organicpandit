<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PostRequirementController extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('post_requirement_model','Postrequirement');
        $this->load->model('product_model','Product');
        $this->load->model('state_model','State');
    }
    
    public function index()
    {
        $data['title'] = 'Post Requirement';
        $data['heading'] = 'Post Requirement';
        $data['hide_footer'] = true;
        $data['view'] = 'post-requirement/form_data';
        $data['farmer_product_list'] = $this->Product->getFarmerProduct();
        $data['state_list'] = $this->State->getStates();
        $this->frontendLayout($data);
    }
    
}
