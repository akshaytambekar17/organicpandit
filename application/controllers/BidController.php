<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BidController extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('bid_model','Bid');
    }
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        
    }
    public function create(){
        $userSession = $this->session->userdata('user_data');
        $userSession;
        if($this->input->post()){
            $post = $this->input->post();
            $details = $post;
            $details['user_id'] = $userSession['id'];
            $details['is_seen'] = 0;
            $details['is_view'] = 0;
            $details['is_deleted'] = 0;
            $details['updated_at'] = date('Y-m-d H:i:s');
            $details['created_at'] = date('Y-m-d H:i:s');
            $data = $this->Bid->insert($details);
            if($data){
                $bids = $this->Bid->getBidByPostRequirementId($post['post_requirement_id']);
                if(!empty($bids) && count($bids)>0){
                    $result['success'] = true;
                    $result['data'] = count($bids);
                }else{
                    $result['success'] = true;
                    $result['data'] = 0;
                }
                
            }else{
                $result['success'] = false;
                $result['data'] = 0;
            }
        }else{
            $result['success'] = false;
            $result['data'] = 0;
        }
        echo json_encode($result);
    }
    public function update(){
        $get = $this->input->get();
        if($this->input->post()){
            $post = $this->input->post();
            if($this->form_validation->run('category') == TRUE){
                $details = $post;
                if(!empty($_FILES['image']['name'])){
                    $config['upload_path']          = './assets/images/category-images/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['max_size']             = 2048;
                    $config['max_width']            = 0;
                    $config['max_height']           = 0;

                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('image')){
                        $uploadData = $this->upload->data();
                        $image_name = $uploadData['file_name'];
                        $error = '';
                    }else{
                        $error = $this->upload->display_errors();
                        $image_name = '';
                    }
                }else{
                    $error = '';
                    $image_name = !empty($post['image_hidden'])?$post['image_hidden']:''; 
                }
                if(empty($error)){
                    unset($details['image_hidden']);
                    $details['image'] = $image_name;
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    $result = $this->Category->update($details);
                    if ($result) {
                        $this->session->set_flashdata('Message', 'Category updated Succesfully');
                        return redirect('category', 'refresh');
                    } else {
                        $this->session->set_flashdata('Error', 'Failed to update category');
                        $category_details = $this->Category->getCategoryById($post['id']);
                        $data['category_list'] = $this->Category->getCategories();
                        $data['title'] = $category_details['name'] ;
                        $data['heading'] ='Update Category '.$category_details['name'];
                        $data['view'] = 'Category/form_data';
                        $data['category_details'] = $category_details;
                        $this->backendLayout($data);
                        $this->backendLayout($data);
                    }
                }else{
                    $this->session->set_flashdata('Error',$error);
                    $category_details = $this->Category->getCategoryById($post['id']);
                    $data['category_list'] = $this->Category->getCategories();
                    $data['title'] = $category_details['name'] ;
                    $data['heading'] ='Update Category '.$category_details['name'];
                    $data['view'] = 'Category/form_data';
                    $data['category_details'] = $category_details;
                    $this->backendLayout($data);
                }
            }else{
                $data['title']='Category';
                $data['heading']='Add Category';
                $data['view'] = 'Category/form_data';
                $this->backendLayout($data);
            }
        }else{
            $category_details = $this->Category->getCategoryById($get['id']);
            $data['category_list'] = $this->Category->getCategories();
            $data['title'] = $category_details['name'] ;
            $data['heading'] ='Update Category '.$category_details['name'];
            $data['view'] = 'Category/form_data';
            $data['category_details'] = $category_details;
            $this->backendLayout($data);
        }
    }
    public function delete(){
        $post = $this->input->post();
        $result = $this->Category->delete($post['id']);
        if($result){
            echo true;
        }else{
            echo false;
        }
   }
}
