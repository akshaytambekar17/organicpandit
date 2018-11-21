<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PostRequirementController extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('post_requirement_model','PostRequirement');
        $this->load->model('product_model','Product');
        $this->load->model('state_model','State');
        $this->load->model('city_model','City');
    }
    
    public function index()
    {
        $data['title'] = 'Post Requirement';
        $data['heading'] = 'Post Requirement';
        $data['hide_footer'] = true;
        $data['view'] = 'post-requirement/form_data';
        $data['farmer_product_list'] = $this->Product->getFarmerProduct();
        $data['state_list'] = $this->State->getStates();
        if($this->input->post()){
            $post = $this->input->post();
            if($this->form_validation->run('post-requirement-form') == TRUE){
                $details = $post;
                $details['from_date'] = date("Y-m-d", strtotime($details['from_date']));
                $details['to_date'] = date("Y-m-d", strtotime($details['to_date']));
                $details['is_verified'] = 0;
                $details['is_seen'] = 0;
                $details['is_view'] = 0;
                $details['is_deleted'] = 0;
                $details['updated_at'] = date('Y-m-d H:i:s');
                $details['created_at'] = date('Y-m-d H:i:s');
                $result = $this->PostRequirement->add($details);
                if ($result) {
                    $this->session->set_flashdata('Message', 'Your Post has been created successfully and sent to support for verfication.Please stay with us');
                    return redirect('post-requirement', 'refresh');
                } else {
                    $this->session->set_flashdata('Error', 'Failed to create post');
                    $this->frontendLayout($data);
                }

            }else{
                $this->frontendLayout($data);
            }
        }else{
            $this->frontendLayout($data);
        }
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
    
}
