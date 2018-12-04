<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserController extends MY_Controller {
    function __construct() {
        parent::__construct();
        //$this->load->model('farmer_model');
    }
    
    public function index()
    {
        $data['title'] = 'Post Requirement';
        $data['heading'] = 'Post Requirement';
        $data['hide_footer'] = true;
        $data['view'] = 'post-requirement/form_data';
        $data['farmer_product_list'] = $this->Product->getFarmerProduct();
        $data['state_list'] = $this->State->getStates();
        $userSession = $this->session->userdata('user_data');
        $data['userSession'] = $userSession;
        $this->frontendLayout($data);
    }
    public function signup()
    {
        $userSession = $this->session->userdata('user_data');
        if(!empty($userSession)){
            redirect('home');
        }
        $data['title'] = 'Registration';
        $data['heading'] = 'Register With Us';
        $data['hide_footer'] = true;
        $data['view'] = 'user/register';
        $data['user_type_list'] = $this->UserType->getUserTypes();
        $data['state_list'] = $this->State->getStates();
        $data['userSession'] = $userSession;
        //$this->frontendLayout($data);
        $this->load->view('user/register',$data);
    }
    public function registration()
    {
        $userSession = $this->session->userdata('user_data');
        if(!empty($userSession)){
            redirect('home');
        }
        $get = $this->input->get();
        $user_type_details = $this->UserType->getUserTypeById($get['id']);
        if($user_type_details['id'] == 2){
            $data['name'] = 'FPO Name';
        }else{
            $data['name'] = 'Full Name';
        }
        $data['user_type_details'] = $user_type_details;
        $data['state_list'] = $this->State->getStates();
        $data['agencies_list'] = $this->User->getCertificationAgency();
        $data['title'] = $user_type_details['name'].' Registration';
        $data['heading'] = $user_type_details['name'].' Register Form';
        $data['hide_footer'] = true;
        $data['view'] = 'user/registration_form';
        $data['userSession'] = $userSession;
        $this->frontendLayout($data);
    }
    public function searchPost()
    {
        $data['title'] = 'Search Post';
        $data['heading'] = 'Search Post';
        $data['hide_footer'] = true;
        $data['banner'] = "farmer.jpg";
        $data['view'] = 'post-requirement/search_post';
        $data['farmer_product_list'] = $this->Product->getFarmerProduct();
        $data['state_list'] = $this->State->getStates();
        $userSession = $this->session->userdata('user_data');
        $data['userSession'] = $userSession;
        if($this->input->post()){
            $post = $this->input->post();
            if($this->form_validation->run('search-post-requirement-form') == TRUE){
                $search_post_list = $this->PostRequirement->getPostBysearchKey($post);
                $data['search_post_list'] = $search_post_list;
                $this->frontendLayout($data);
            }else{
                $this->frontendLayout($data);
            }
        }else{
            $this->frontendLayout($data);
        }
        
    }
    public function getCitiesByState(){
        $post = $this->input->post();
        $cities = $this->City->getCitiesBystateId($post['state_id']);
        $html = array();
        if(!empty($cities)){
            foreach($cities as $value){
                $data2 = ' <option value="' . $value['id'] . '" ' . set_select('city_id',$value['id']) . ' > ' . $value['name'] . '</option>';
                $html[] = $data2; 
            }
        }
        echo json_encode($html);
    }
    public function getPostById(){
        $post = $this->input->post();
        $post_details = $this->PostRequirement->getPostRequirementById($post['post_id']);
        $post_details['product_details'] = $this->Product->getFarmerProductById($post_details['product_id']);
        echo json_encode($post_details);
    }
    
}
