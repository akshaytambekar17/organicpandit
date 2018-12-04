<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserTypeController extends MY_Controller {
    function __construct() {
        parent::__construct();
        
    }
    
    public function index()
    {
        $data['title'] = 'User Type';
        $data['heading'] = 'User Type List';
        $data['view'] = 'user-type/list';
        $data['backend'] = true;
        $data['user_type_list'] = $this->UserType->getUserTypes();
        $this->backendLayout($data);
    }
    public function add(){

        if($this->input->post()){
            $post = $this->input->post();
//            if(empty($_FILES['user_type']['name'])){
//                $this->form_validation->set_rules('image', 'Images', 'trim|required');
//            }
            if($this->form_validation->run('user-type-form') == TRUE){
                if(!empty($_FILES['user_type_images']['name'])){
                    $config['upload_path']          = './assets/images/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['max_size']             = 2048;
                    
                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('user_type_images')){
                        $uploadData = $this->upload->data();
                        $image_name = $uploadData['file_name'];
                        $error = '';
                    }else{
                        $error = $this->upload->display_errors();
                        $image_name = '';
                    }
                }else{
                    $image_name = '';
                    $error = '';
                }
                
                if(empty($error)){
                    $details = $post;
                    $details['images'] = $image_name;
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    $details['created_at'] = date('Y-m-d H:i:s');
                    $user_type_id = $this->UserType->add($details);
                    if ($user_type_id) {
                        $this->session->set_flashdata('Message', 'User Type Added Succesfully');
                        return redirect('admin/user-type', 'refresh');
                    } else {
                        $this->session->set_flashdata('Error', 'Failed to add User Type');
                        $data['title'] = 'User Type';
                        $data['heading']='Add User Type';
                        $data['view'] = 'user-type/form_data';
                        $data['backend'] = true;
                        $this->backendLayout($data);
                    }
                }else{
                    $this->session->set_flashdata('Error',$error);
                    $data['title'] = 'User Type';
                    $data['heading']='Add User Type';
                    $data['view'] = 'user-type/form_data';
                    $data['backend'] = true;
                    $this->backendLayout($data);
                }
            }else{
                $data['title'] = 'User Type';
                $data['heading']='Add User Type';
                $data['view'] = 'user-type/form_data';
                $data['backend'] = true;
                $this->backendLayout($data);
            }
        }else{
            $data['title'] = 'User Type';
            $data['heading']='Add User Type';
            $data['view'] = 'user-type/form_data';
            $data['backend'] = true;
            $this->backendLayout($data);
        }
    }
    public function update(){
        $get = $this->input->get();
        if($this->input->post()){
            $post = $this->input->post();
            if($this->form_validation->run('user-type-form') == TRUE){
                $details = $post;
                if(!empty($_FILES['user_type_images']['name'])){
                    $config['upload_path']          = './assets/images/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['max_size']             = 2048;
                    
                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('user_type_images')){
                        $uploadData = $this->upload->data();
                        $image_name = $uploadData['file_name'];
                        $error = '';
                    }else{
                        $error = $this->upload->display_errors();
                        $image_name = '';
                    }
                }else{
                    $error = '';
                    $image_name = !empty($post['user_type_images_hidden'])?$post['user_type_images_hidden']:''; 
                }
                if(empty($error)){
                    unset($details['user_type_images_hidden']);
                    $details['images'] = $image_name;
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    $result = $this->UserType->update($details);
                    if ($result) {
                        $this->session->set_flashdata('Message', 'User Type updated Succesfully');
                        return redirect('admin/user-type', 'refresh');
                    } else {
                        $this->session->set_flashdata('Error', 'Failed to update user type');
                        $user_type_details = $this->UserType->getUserTypeById($post['id']);
                        $data['backend'] = true;
                        $data['user_type_details'] = $user_type_details;
                        $data['title'] = $user_type_details['name'] ;
                        $data['heading'] ='Update product '.$user_type_details['name'];
                        $data['view'] = 'user-type/form_data';
                        $this->backendLayout($data);
                    }
                }else{
                    $this->session->set_flashdata('Error',$error);
                    $user_type_details = $this->UserType->getUserTypeById($post['id']);
                    $data['backend'] = true;
                    $data['user_type_details'] = $user_type_details;
                    $data['title'] = $user_type_details['name'] ;
                    $data['heading'] ='Update product '.$user_type_details['name'];
                    $data['view'] = 'user-type/form_data';
                    $this->backendLayout($data);
                }
            }else{
                $user_type_details = $this->UserType->getUserTypeById($post['id']);
                $data['backend'] = true;
                $data['user_type_details'] = $user_type_details;
                $data['title'] = $user_type_details['name'] ;
                $data['heading'] ='Update product '.$user_type_details['name'];
                $data['view'] = 'user-type/form_data';
                $this->backendLayout($data);
            }
        }else{
            $user_type_details = $this->UserType->getUserTypeById($get['id']);
            $data['backend'] = true;
            $data['user_type_details'] = $user_type_details;
            $data['title'] = $user_type_details['name'] ;
            $data['heading'] ='Update product '.$user_type_details['name'];
            $data['view'] = 'user-type/form_data';
            $this->backendLayout($data);
        }
    }
    public function delete(){
        $post = $this->input->post();
        $result = $this->UserType->delete($post['id']);
        if($result){
            echo true;
        }else{
            echo false;
        }
   }
}
