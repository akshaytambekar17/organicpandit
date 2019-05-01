<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductCategoryController extends MY_Controller {
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
        $data['title'] = 'Product Category';
        $data['heading'] = 'Products Category List';
        $data['view'] = 'product-category/list';
        $data['backend'] = true;
        $data['productCategoryList'] = $this->ProductCategory->getProductCategorys();
        $this->backendLayout($data);
    }
    public function add(){

        if($this->input->post()){
            $post = $this->input->post();
                
            if( $this->form_validation->run('product-category-form') == TRUE ){
                
                $details = $post;
                
                $details['updated_at'] = date('Y-m-d H:i:s');
                $result = $this->ProductCategory->add($details);
                if ( !empty( $result ) ) {
                    $this->session->set_flashdata('Message', 'Category Added Succesfully');
                    return redirect('admin/product-category', 'refresh');
                } else {
                    $this->session->set_flashdata('Error', 'Failed to add category');
                    $data['title'] = 'Category';
                    $data['heading']='Add Category';
                    $data['view'] = 'product-category/form_data';
                    $data['backend'] = true;
                    $this->backendLayout($data);
                }
            }else{
                $data['title'] = 'Category';
                $data['heading']='Add Category';
                $data['view'] = 'product-category/form_data';
                $data['backend'] = true;
                $this->backendLayout($data);
            }
        }else{
            $data['title'] = 'Category';
            $data['heading']='Add Category';
            $data['view'] = 'product-category/form_data';
            $data['backend'] = true;
            $this->backendLayout($data);
        }
    }
    public function update(){
        $get = $this->input->get();
        if($this->input->post()){
            $post = $this->input->post();
            if($this->form_validation->run('product-category-form') == TRUE){
                $details = $post;

                $details['updated_at'] = date('Y-m-d H:i:s');
                $result = $this->ProductCategory->update( $details );
                if( $result ) {
                    $this->session->set_flashdata('Message', 'Category updated Succesfully');
                    return redirect('admin/product-category', 'refresh');
                } else {
                    $this->session->set_flashdata('Error', 'Failed to update product');
                    $productCategoryDetails = $this->ProductCategory->getProductCategoryById( $post['id'] );
                    $data['backend'] = true;
                    $data['productCategoryDetails'] = $productCategoryDetails;
                    $data['title'] = $productCategoryDetails['name'] ;
                    $data['heading'] ='Update product '.$productCategoryDetails['name'];
                    $data['view'] = 'product-category/form_data';
                    $this->backendLayout($data);
                }
            }else{
                $productCategoryDetails = $this->ProductCategory->getProductCategoryById( $post['id'] );
                $data['backend'] = true;
                $data['productCategoryDetails'] = $productCategoryDetails;
                $data['title'] = $productCategoryDetails['name'] ;
                $data['heading'] ='Update product '.$productCategoryDetails['name'];
                $data['view'] = 'product-category/form_data';
                $this->backendLayout($data);
                
            }
        }else{
            $productCategoryDetails = $this->ProductCategory->getProductCategoryById( $get['id'] );
            $data['backend'] = true;
            $data['productCategoryDetails'] = $productCategoryDetails;
            $data['title'] = $productCategoryDetails['name'] ;
            $data['heading'] ='Update product '.$productCategoryDetails['name'];
            $data['view'] = 'product-category/form_data';
            $this->backendLayout($data);
        }
    }
    public function delete(){
        $post = $this->input->post();
        $result = $this->ProductCategory->delete( $post['id'] );
        if($result){
            echo true;
        }else{
            echo false;
        }
   }
}
