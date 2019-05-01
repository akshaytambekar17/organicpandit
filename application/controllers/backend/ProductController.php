<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends MY_Controller {
    function __construct() {
        parent::__construct();
        $session = UserSession();
        if ( empty( $session['success'] ) ) {
            redirect('admin', 'refresh');
        }else {
            $userSession = $session['userData'];
            if( ADMINUSERNAME != $userSession['username'] ){
                redirect('home', 'refresh');
            }
        }
    }
    
    public function index()
    {
        $data['title'] = 'Product';
        $data['heading'] = 'Products List';
        $data['view'] = 'product/list';
        $data['backend'] = true;
        $data['product_list'] = $this->Product->getProducts();
        $this->backendLayout($data);
    }
    public function add(){

        if($this->input->post()){
            $post = $this->input->post();
//            if(empty($_FILES['images']['name'])){
//                $this->form_validation->set_rules('image', 'Images', 'trim|required');
//            }
            if($this->form_validation->run('products-form') == TRUE){
//                if(!empty($_FILES['product_images']['name'])){
//                    $config['upload_path']          = './assets/images/';
//                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
//                    $config['max_size']             = 2048;
//                    
//                    $this->load->library('upload', $config);
//                    if($this->upload->do_upload('product_images')){
//                        $uploadData = $this->upload->data();
//                        $image_name = $uploadData['file_name'];
//                        $error = '';
//                    }else{
//                        $error = $this->upload->display_errors();
//                        $image_name = '';
//                    }
//                }else{
//                    $image_name = '';
//                    $error = '';
//                }
                $error = '';
                if(empty($error)){
                    $details = $post;
                    $details['user_type_id'] = 1;
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    $details['created_at'] = date('Y-m-d H:i:s');
                    $productId = $this->Product->add($details);
                    if ( !empty( $productId ) ) {
                        $this->session->set_flashdata('Message', 'Product Added Succesfully');
                        return redirect('admin/product', 'refresh');
                    } else {
                        $this->session->set_flashdata('Error', 'Failed to add product');
                        $data['user_type_list'] = $this->UserType->getUserTypes();
                        $data['title'] = 'Product';
                        $data['heading']='Add Product';
                        $data['view'] = 'product/form_data';
                        $data['backend'] = true;
                        $this->backendLayout($data);
                    }
                }else{
                    $this->session->set_flashdata('Error',$error);
                    $data['user_type_list'] = $this->UserType->getUserTypes();
                    $data['title'] = 'Product';
                    $data['heading']='Add Product';
                    $data['view'] = 'product/form_data';
                    $data['backend'] = true;
                    $this->backendLayout($data);
                }
            }else{
                $data['user_type_list'] = $this->UserType->getUserTypes();
                $data['title'] = 'Product';
                $data['heading']='Add Product';
                $data['view'] = 'product/form_data';
                $data['backend'] = true;
                $this->backendLayout($data);
            }
        }else{
            $data['user_type_list'] = $this->UserType->getUserTypes();
            $data['title'] = 'Product';
            $data['heading']='Add Product';
            $data['view'] = 'product/form_data';
            $data['backend'] = true;
            $this->backendLayout($data);
        }
    }
    public function update(){
        $get = $this->input->get();
        if($this->input->post()){
            $post = $this->input->post();
            if($this->form_validation->run('products-form') == TRUE){
                $details = $post;
//                if(!empty($_FILES['product_images']['name'])){
//                    $config['upload_path']          = './assets/images/';
//                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
//                    $config['max_size']             = 2048;
//                    
//                    $this->load->library('upload', $config);
//                    if($this->upload->do_upload('product_images')){
//                        $uploadData = $this->upload->data();
//                        $image_name = $uploadData['file_name'];
//                        $error = '';
//                    }else{
//                        $error = $this->upload->display_errors();
//                        $image_name = '';
//                    }
//                }else{
//                    $error = '';
//                    $image_name = !empty($post['product_images_hidden'])?$post['product_images_hidden']:''; 
//                }
                $error = '';
                if(empty($error)){
//                    unset($details['product_images_hidden']);
//                    $details['images'] = $image_name;
//                    $details['from_date'] = date("Y-m-d", strtotime($details['from_date']));
//                    $details['to_date'] = date("Y-m-d", strtotime($details['to_date']));
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    $result = $this->Product->update($details);
                    if ($result) {
                        $this->session->set_flashdata('Message', 'Product updated Succesfully');
                        return redirect('admin/product', 'refresh');
                    } else {
                        $this->session->set_flashdata('Error', 'Failed to update product');
                        $product_details = $this->Product->getProductById($post['id']);
                        $data['user_type_list'] = $this->UserType->getUserTypes();
                        $data['backend'] = true;
                        $data['product_details'] = $product_details;
                        $data['title'] = $product_details['name'] ;
                        $data['heading'] ='Update product '.$product_details['name'];
                        $data['view'] = 'product/form_data';
                        $this->backendLayout($data);
                    }
                }else{
                    $this->session->set_flashdata('Error',$error);
                    $product_details = $this->Product->getProductById($post['id']);
                    $data['user_type_list'] = $this->UserType->getUserTypes();
                    $data['backend'] = true;
                    $data['product_details'] = $product_details;
                    $data['title'] = $product_details['name'] ;
                    $data['heading'] ='Update product '.$product_details['name'];
                    $data['view'] = 'product/form_data';
                    $this->backendLayout($data);
                }
            }else{
                $product_details = $this->Product->getProductById($post['id']);
                $data['user_type_list'] = $this->UserType->getUserTypes();
                $data['backend'] = true;
                $data['product_details'] = $product_details;
                $data['title'] = $product_details['name'] ;
                $data['heading'] ='Update product '.$product_details['name'];
                $data['view'] = 'product/form_data';
                $this->backendLayout($data);
            }
        }else{
            $product_details = $this->Product->getProductById($get['id']);
            $data['user_type_list'] = $this->UserType->getUserTypes();
            $data['backend'] = true;
            $data['product_details'] = $product_details;
            $data['title'] = $product_details['name'] ;
            $data['heading'] ='Update product '.$product_details['name'];
            $data['view'] = 'product/form_data';
            $this->backendLayout($data);
        }
    }
    public function delete(){
        $post = $this->input->post();
        $result = $this->Product->delete($post['id']);
        if($result){
            echo true;
        }else{
            echo false;
        }
   }
}
