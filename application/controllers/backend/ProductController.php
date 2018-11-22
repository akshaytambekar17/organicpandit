<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('CategoryModel','Category');
        $this->load->model('ProductModel','Product');
        $this->load->model('BrandModel','Brand');
        $this->load->model('SizeModel','Size');
        $this->load->model('ColorModel','Color');
        $this->load->model('ProductHasCategoryModel','ProductHasCategory');
        $this->load->model('ProductHasOptionsModel','ProductHasOptions');
        $this->load->model('ProductHasSizeModel','ProductHasSize');
        $this->load->model('ProductHasBrandModel','ProductHasBrand');
        $this->load->model('ProductHasColorModel','ProductHasColor');
    }
    
    public function index()
    {
        $data['title'] = 'Product';
        $data['heading'] = 'Products List';
        $data['view'] = 'product/list';
        $data['product_list'] = $this->Product->getProducts();
        $this->backendLayout($data);
    }
    public function add(){

        if($this->input->post()){
            $post = $this->input->post();
            if(empty($_FILES['image']['name'])){
                $this->form_validation->set_rules('image', 'Image', 'trim|required');
            }
            if($this->form_validation->run('products-form') == TRUE){
                
                $config['upload_path']          = './assets/images/product-images/';
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
                if(empty($error)){
                    $details = $post;
                    unset($details['category']);
                    unset($details['category']);
                    unset($details['color']);
                    unset($details['size']);
                    unset($details['brand']);
                    $details['image'] = $image_name;
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    $details['created_at'] = date('Y-m-d H:i:s');
                    $product_id = $this->Product->add($details);
                    foreach($post['category'] as $value){
                        $product_has_category_data = array('product_id' => $product_id,
                                                            'category_id' =>$value
                                                    );
                        $this->ProductHasCategory->add($product_has_category_data);
                    }
                    foreach($post['color'] as $value){
                        $product_has_color_data = array('product_id' => $product_id,
                                                        'color_id' =>$value
                                                    );
                        $this->ProductHasColor->add($product_has_color_data);
                    }
                    foreach($post['size'] as $value){
                        $product_has_size_data = array('product_id' => $product_id,
                                                       'size_id' =>$value
                                                    );
                        $this->ProductHasSize->add($product_has_size_data);
                    }
                    foreach($post['brand'] as $value){
                        $product_has_brand_data = array('product_id' => $product_id,
                                                        'brand_id' =>$value
                                                    );
                        $this->ProductHasBrand->add($product_has_brand_data);
                    }
                    
                    if ($product_id) {
                        $this->session->set_flashdata('Message', 'Product Added Succesfully');
                        return redirect('product', 'refresh');
                    } else {
                        $this->session->set_flashdata('Error', 'Failed to add product');
                        $data['category_list'] = $this->Category->getCategories();
                        $data['color_list'] = $this->Color->getColors();
                        $data['size_list'] = $this->Size->getSizes();
                        $data['brand_list'] = $this->Brand->getBrands();
                        $data['title'] = 'Product';
                        $data['heading']='Add Product';
                        $data['view'] = 'product/form_data';
                        $this->backendLayout($data);
                    }
                }else{
                    $this->session->set_flashdata('Error',$error);
                    $data['category_list'] = $this->Category->getCategories();
                    $data['color_list'] = $this->Color->getColors();
                    $data['size_list'] = $this->Size->getSizes();
                    $data['brand_list'] = $this->Brand->getBrands();
                    $data['title'] = 'Product';
                    $data['heading']='Add Product';
                    $data['view'] = 'product/form_data';
                    $this->backendLayout($data);
                }
            }else{
                $data['category_list'] = $this->Category->getCategories();
                $data['color_list'] = $this->Color->getColors();
                $data['size_list'] = $this->Size->getSizes();
                $data['brand_list'] = $this->Brand->getBrands();
                $data['title'] = 'Product';
                $data['heading']='Add Product';
                $data['view'] = 'product/form_data';
                $this->backendLayout($data);
            }
        }else{
            $data['category_list'] = $this->Category->getCategories();
            $data['color_list'] = $this->Color->getColors();
            $data['size_list'] = $this->Size->getSizes();
            $data['brand_list'] = $this->Brand->getBrands();
            $data['title'] = 'Product';
            $data['heading']='Add Product';
            $data['view'] = 'product/form_data';
            $this->backendLayout($data);
        }
    }
    public function update(){
        $get = $this->input->get();
        if($this->input->post()){
            $post = $this->input->post();
            if($this->form_validation->run('products-form') == TRUE){
                $details = $post;
                if(!empty($_FILES['image']['name'])){
                    $config['upload_path']          = './assets/images/product-images/';
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
                    unset($details['category']);
                    unset($details['color']);
                    unset($details['size']);
                    unset($details['brand']);
                    $details['image'] = $image_name;
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    $result = $this->Product->update($details);
                    $this->ProductHasCategory->deleteByProductId($post['id']);
                    foreach($post['category'] as $value){
                        $product_has_category_data = array('product_id' => $post['id'],
                                                            'category_id' =>$value
                                                    );
                        $this->ProductHasCategory->add($product_has_category_data);
                    }
                    $this->ProductHasColor->deleteByProductId($post['id']);
                    foreach($post['color'] as $value){
                        $product_has_color_data = array('product_id' => $post['id'],
                                                        'color_id' =>$value
                                                    );
                        $this->ProductHasColor->add($product_has_color_data);
                    }
                    $this->ProductHasSize->deleteByProductId($post['id']);
                    foreach($post['size'] as $value){
                        $product_has_size_data = array('product_id' => $post['id'],
                                                       'size_id' =>$value
                                                    );
                        $this->ProductHasSize->add($product_has_size_data);
                    }
                    $this->ProductHasBrand->deleteByProductId($post['id']);
                    foreach($post['brand'] as $value){
                        $product_has_brand_data = array('product_id' => $post['id'],
                                                        'brand_id' =>$value
                                                    );
                        $this->ProductHasBrand->add($product_has_brand_data);
                    }
                    if ($result) {
                        $this->session->set_flashdata('Message', 'Product updated Succesfully');
                        return redirect('product', 'refresh');
                    } else {
                        $this->session->set_flashdata('Error', 'Failed to update product');
                        $product_details = $this->Product->getProductById($post['id']);
                        $product_has_category_details = $this->ProductHasCategory->getProductHasCategoryByProductId($post['id']);
                        $data['category_list'] = $this->Category->getCategories();
                        $data['product_details'] = $product_details;
                        $data['product_has_category_details'] = $product_has_category_details;
                        $data['title'] = $product_details['name'] ;
                        $data['heading'] ='Update product '.$product_details['name'];
                        $data['view'] = 'product/form_data';
                        $this->backendLayout($data);
                    }
                }else{
                    $this->session->set_flashdata('Error',$error);
                    $product_details = $this->Product->getProductById($post['id']);
                    $data['product_has_category_details'] = $this->ProductHasCategory->getProductHasCategoryByProductId($post['id']);
                    $data['product_has_options_details'] = $this->ProductHasOptions->getProductHasOptionsByProductId($post['id']);
                    $data['product_has_brand_details'] = $this->ProductHasBrand->getProductHasBrandByProductId($post['id']);
                    $data['product_has_color_details'] = $this->ProductHasColor->getProductHasColorByProductId($post['id']);
                    $data['product_has_size_details'] = $this->ProductHasSize->getProductHasSizeByProductId($post['id']);
                    $data['category_list'] = $this->Category->getCategories();
                    $data['color_list'] = $this->Color->getColors();
                    $data['size_list'] = $this->Size->getSizes();
                    $data['brand_list'] = $this->Brand->getBrands();
                    $data['product_details'] = $product_details;
                    $data['title'] = $product_details['name'] ;
                    $data['heading'] ='Update product '.$product_details['name'];
                    $data['view'] = 'product/form_data';
                    $this->backendLayout($data);
                }
            }else{
                $product_details = $this->Product->getProductById($post['id']);
                $data['product_has_category_details'] = $this->ProductHasCategory->getProductHasCategoryByProductId($post['id']);
                $data['product_has_options_details'] = $this->ProductHasOptions->getProductHasOptionsByProductId($post['id']);
                $data['product_has_brand_details'] = $this->ProductHasBrand->getProductHasBrandByProductId($post['id']);
                $data['product_has_color_details'] = $this->ProductHasColor->getProductHasColorByProductId($post['id']);
                $data['product_has_size_details'] = $this->ProductHasSize->getProductHasSizeByProductId($post['id']);
                $data['category_list'] = $this->Category->getCategories();
                $data['color_list'] = $this->Color->getColors();
                $data['size_list'] = $this->Size->getSizes();
                $data['brand_list'] = $this->Brand->getBrands();
                $data['product_details'] = $product_details;
                $data['title'] = $product_details['name'] ;
                $data['heading'] ='Update product '.$product_details['name'];
                $data['view'] = 'product/form_data';
                $this->backendLayout($data);
            }
        }else{
            $product_details = $this->Product->getProductById($get['id']);
            $data['product_has_category_details'] = $this->ProductHasCategory->getProductHasCategoryByProductId($get['id']);
            $data['product_has_options_details'] = $this->ProductHasOptions->getProductHasOptionsByProductId($get['id']);
            $data['product_has_brand_details'] = $this->ProductHasBrand->getProductHasBrandByProductId($get['id']);
            $data['product_has_color_details'] = $this->ProductHasColor->getProductHasColorByProductId($get['id']);
            $data['product_has_size_details'] = $this->ProductHasSize->getProductHasSizeByProductId($get['id']);
            $data['category_list'] = $this->Category->getCategories();
            $data['color_list'] = $this->Color->getColors();
            $data['size_list'] = $this->Size->getSizes();
            $data['brand_list'] = $this->Brand->getBrands();
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
