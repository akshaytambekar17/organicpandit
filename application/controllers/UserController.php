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
        $this->frontendFooterLayout($data);
    }
    public function registration()
    {
        $userSession = $this->session->userdata('user_data');
        if(!empty($userSession)){
            redirect('home');
        }
        $get = $this->input->get();
        $user_type_details = $this->UserType->getUserTypeById($get['id']);
        $data['user_type_details'] = $user_type_details;
        $data['state_list'] = $this->State->getStates();
        $data['agencies_list'] = $this->CertificationAgency->getAgencies();
        $data['certification_agencies_list'] = $this->CertificationAgency->getCertificationAgenciesVerified();
        $data['product_list'] = $this->Product->getActiveProducts();
        $data['crop_list'] = $this->Crop->getActiveCrops();
        $data['title'] = $user_type_details['name'].' Registration';
        $data['heading'] = $user_type_details['name'].' Register Form';
        $data['hide_footer'] = true;
        $data['view'] = 'user/registration_form';
        $data['userSession'] = $userSession;
        if($this->input->post()){
            $post = $this->input->post();
                
            if($post['user_type_id'] == 2){
                $fullname_title = 'FPO Name';
            }else{
                $fullname_title = 'Fullname';
            }
            $this->form_validation->set_rules('fullname', $fullname_title, 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tbl_users.username]');
            $this->form_validation->set_message('is_unique', 'The Username already exists.');
            $this->form_validation->set_rules('email_id', 'Email Id', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[confirm_password]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[5]');
            $this->form_validation->set_rules('mobile_no', 'Mobile number', 'trim|required|numeric|exact_length[10]');
            
            if(empty($_FILES['profile_image']['name'])){
                $this->form_validation->set_rules('profile_image', 'Profile Image', 'trim|required');
            }
            $this->form_validation->set_rules('state_id', 'State', 'trim|required');
            $this->form_validation->set_rules('city_id', 'City', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('story', 'Story', 'trim|required');
            if($post['user_type_id'] != 2 ){
                $this->form_validation->set_rules('aadhar_number', 'Aadhar Number', 'trim|required|numeric|exact_length[12]');
            }
            
            $this->form_validation->set_rules('landline_no', 'Landline Number', 'trim');
            $this->form_validation->set_rules('website', 'Website', 'trim');
            
            if($post['user_type_id'] == 1 || $post['user_type_id'] == 2 || $post['user_type_id'] == 3 || $post['user_type_id'] == 4){
                $this->form_validation->set_rules('is_visit_farm', 'Visit Farm', 'trim|required');
            }
            
            if($post['user_type_id'] == 1 || $post['user_type_id'] == 2 ){
                $this->form_validation->set_rules('pancard_number', 'Pan Card Number', 'trim|required');
            }else{
                $this->form_validation->set_rules('gst_number', 'GST Number', 'trim|required');
            }
            if($post['user_type_id'] != 1 && $post['user_type_id'] != 6 ){
                $this->form_validation->set_rules('ceo_name', 'CEO Name', 'trim|required');
            }
            if($post['user_type_id'] != 1 && $post['user_type_id'] != 2 && $post['user_type_id'] != 3 && $post['user_type_id'] != 4 && $post['user_type_id'] != 5 && $post['user_type_id'] != 6){
                $this->form_validation->set_rules('organization_name', 'Organization Name', 'trim|required');
            }
            if($post['user_type_id'] == 2){
                $this->form_validation->set_rules('total_farmer', 'Number of Farmer', 'trim|required');
            }
            if($post['user_type_id'] == 5){
                $this->form_validation->set_rules('type_of_buyer', 'Type of Buyer', 'trim|required');
            }
            
            if($post['user_type_id'] == 1 || $post['user_type_id'] == 2 || $post['user_type_id'] == 3 || $post['user_type_id'] == 4 || $post['user_type_id'] == 5){
                $this->form_validation->set_rules('certification_id', 'Certification', 'trim|required');
                $this->form_validation->set_rules('certification_number', 'Certification Number', 'trim');
                $this->form_validation->set_rules('agency_id', 'Certification Agency', 'trim|required');
                $this->form_validation->set_rules('is_test_report', 'Test Report', 'trim|required');
                $this->form_validation->set_rules('Product[name][]', 'Product Name', 'trim');
                $this->form_validation->set_rules('Product[description][]', 'Description', 'trim');
                $this->form_validation->set_rules('Product[from_date][]', 'From Date', 'trim');
                $this->form_validation->set_rules('Product[to_date][]', 'To Date', 'trim');
                $this->form_validation->set_rules('Product[quantity_id][]', 'Quantity', 'trim');
                $this->form_validation->set_rules('Product[quality][]', 'Quality', 'trim');
                $this->form_validation->set_rules('Product[price][]', 'Price', 'trim');
//                if(empty($_FILES['Product[images][]']['name'])){
//                    $this->form_validation->set_rules('Product[images][]', 'Images', 'trim');
//                }
            }
            $this->form_validation->set_rules('Bank[bank_name]', 'Bank Name', 'trim');
            $this->form_validation->set_rules('Bank[account_holder_name]', 'Account Holder Name', 'trim');
            $this->form_validation->set_rules('Bank[account_no]', 'Account Number', 'trim');
            $this->form_validation->set_rules('Bank[ifsc_code]', 'Ifsc Code', 'trim');
            
            if($post['user_type_id'] == 1 || $post['user_type_id'] == 2){
                $this->form_validation->set_rules('Crop[crop_id]', 'Select Crop', 'trim');
                $this->form_validation->set_rules('Crop[area]', 'Area', 'trim');
                $this->form_validation->set_rules('Crop[date_sown]', 'Date of Sown', 'trim');
                $this->form_validation->set_rules('Crop[date_harvest]', 'Date of Harvest', 'trim');
                $this->form_validation->set_rules('Crop[date_inspection]', 'Date of Inspection', 'trim');
                $this->form_validation->set_rules('Crop[crop_condition]', 'Crop Condition', 'trim');
                $this->form_validation->set_rules('Crop[other_details]', 'Other Details', 'trim');

                $this->form_validation->set_rules('Soil[element][]', 'Element', 'trim');
                $this->form_validation->set_rules('Soil[percentage][]', 'Percentage', 'trim');

                $this->form_validation->set_rules('Micro[element][]', 'Element', 'trim');
                $this->form_validation->set_rules('Micro[percentage][]', 'Percentage', 'trim');
                
                $this->form_validation->set_rules('Input[input_date]', 'Input Date', 'trim');
                $this->form_validation->set_rules('Input[input_name]', 'Input Name', 'trim');
                $this->form_validation->set_rules('Input[supplier_name]', 'Supplier Name', 'trim');
                $this->form_validation->set_rules('Input[total_area]', 'Total Area', 'trim');
                $this->form_validation->set_rules('Input[other_details]', 'Other Details', 'trim');
                
            }
            if($this->form_validation->run() == TRUE){
                $details = $post;
                if(!empty($_FILES['video']['name'])){
                    $config_video['upload_path']          = './assets/images/gallery/';
                    $config_video['allowed_types']        = '*';
                    $config_video['max_size']             = 102400;
                    $this->load->library('upload', $config_video);
                    if($this->upload->do_upload('video')){
                        $uploadData = $this->upload->data();
                        $video = $uploadData['file_name'];
                        $error = '';
                    }else{
                        $error = $this->upload->display_errors();
                        $video = '';
                    }
                }else{
                    $error = '';
                    $video = '';
                }
                if(!empty($_FILES['resume']['name'])){
                    $config_resume['upload_path']          = './assets/images/gallery/';
                    $config_resume['allowed_types']        = 'docx|pdf|csv|xls|xlsx';
                    $config_resume['max_size']             = 102400;

                    $this->load->library('upload', $config_resume);
                    if($this->upload->do_upload('resume')){
                        $uploadData = $this->upload->data();
                        $resume = $uploadData['file_name'];
                        $error = '';
                    }else{
                        $error = $this->upload->display_errors();
                        $resume = '';
                    }
                }else{
                    $resume = '';
                    $error = '';
                }
                if(!empty($_FILES['product_catalogue']['name'])){
                    $config_catalogue['upload_path']          = './assets/images/gallery/';
                    $config_catalogue['allowed_types']        = 'docx|pdf|csv|xls|xlsx';
                    $config_catalogue['max_size']             = 102400;

                    $this->load->library('upload', $config_catalogue);
                    if($this->upload->do_upload('product_catalogue')){
                        $uploadData = $this->upload->data();
                        $product_catalogue = $uploadData['file_name'];
                        $error = '';
                    }else{
                        $error = $this->upload->display_errors();
                        $product_catalogue = '';
                    }
                }else{
                    $product_catalogue = '';
                    $error = '';
                }
                if(!empty($_FILES['profile_image']['name'])){
                    $config['upload_path']          = './assets/images/gallery/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['max_size']             = 2048;
                    
                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('profile_image')){
                        $uploadData = $this->upload->data();
                        $profile_image = $uploadData['file_name'];
                        $error = '';
                    }else{
                        $error = $this->upload->display_errors();
                        $profile_image = '';
                    }
                }else{
                    $profile_image = '';
                    $error = '';
                }
                if(!empty($_FILES['certification_image']['name'])){
                    $config1['upload_path']          = './assets/images/gallery/';
                    $config1['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config1['max_size']             = 2048;

                    $this->load->library('upload', $config1);
                    if($this->upload->do_upload('certification_image')){
                        $uploadData = $this->upload->data();
                        $certification_image = $uploadData['file_name'];
                        $error = '';
                    }else{
                        $error = $this->upload->display_errors();
                        $certification_image = '';
                    }
                }else{
                    $certification_image = '';
                    $error = '';
                }
                
                if(!empty($_FILES['company_image']['name'])){
                    $config_company['upload_path']          = './assets/images/gallery/';
                    $config_company['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config_company['max_size']             = 2048;
                    $this->load->library('upload', $config_company);
                    if($this->upload->do_upload('company_image')){
                        $uploadData = $this->upload->data();
                        $company_image = $uploadData['file_name'];
                        $error = '';
                    }else{
                        $error = $this->upload->display_errors();
                        $company_image = '';
                    }
                }else{
                    $company_image = '';
                    $error = '';
                }

                
                if(!empty($_FILES['product_images']['name'])){
                    $count = count($_FILES['product_images']['name']);
                    $files = $_FILES;
                    for($i=0; $i<$count; $i++){
                        if(!empty($files['product_images']['name'][$i])){
                            $_FILES['product_images']['name'] = $files['product_images']['name'][$i];
                            $_FILES['product_images']['type'] = $files['product_images']['type'][$i];
                            $_FILES['product_images']['tmp_name'] = $files['product_images']['tmp_name'][$i];
                            $_FILES['product_images']['error'] = $files['product_images']['error'][$i];
                            $_FILES['product_images']['size'] = $files['product_images']['size'][$i];
                            $config4['upload_path'] = './assets/images/product_images/';
                            $config4['allowed_types'] = 'gif|jpg|png|jpeg';
                            $this->load->library('upload', $config4);
                            $this->upload->initialize($config4);
                            if($this->upload->do_upload('product_images')){
                                $uploadData = $this->upload->data();
                                $product_images[] = $uploadData['file_name'];
                                $errors[] = '';
                            }else{
                                $errors[] = $this->upload->display_errors();
                                $product_images[] = '';
                            }
                        }
                    }
                }else{
                    $errors[] = '';
                    $product_images[] = '';
                }
                
                if(empty($error)){
                    unset($details['confirm_password']);
                    unset($details['product_count']);
                    unset($details['Bank']);
                    unset($details['Product']);
                    unset($details['Crop']);
                    unset($details['Soil']);
                    unset($details['Micro']);
                    unset($details['Input']);
                    $details['landline_no'] = !empty($details['landline_no'])?$details['landline_no']:0;
                    $details['password'] = md5($details['password']);
                    $details['profile_image'] = $profile_image;
                    $details['company_image'] = $company_image;
                    $details['certification_image'] = $certification_image;
                    $details['video'] = $video;
                    $details['product_catalogue'] = $product_catalogue;
                    $details['resume'] = $resume;
                    $details['status'] = 2;
                    $details['is_deleted'] = 0;
                    $details['is_verified'] = 1;
                    $details['created_at'] = date('Y-m-d H:i:s');
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    
                    $user_id = $this->User->insert($details);
                    if(!empty($post['Product'])){
                        $i = 0;
                        $j = 1;
                        $post_product = array_filter(array_map('array_filter', $post['Product'])); 
                        $count = count($post_product);
                        for($x=1;$x<=count($post_product['product_id']);$x++){
                            foreach($post_product as $key_product => $val_product){
                                foreach($val_product as $key => $val){
                                    if($key == $i && !empty($val)){
                                        $product_data[$key_product] = $val;
                                        if(!empty($product_images)){
                                            foreach($product_images as $key_image => $val_image){
                                                if($key_image == $i){
                                                    $product_data['images'] = $val_image;   
                                                }
                                            }
                                        }
                                    }
                                }
                                if($count == $j){
                                    $product_data['from_date'] = date("Y-m-d", strtotime($product_data['from_date']));
                                    $product_data['to_date'] = date("Y-m-d", strtotime($product_data['to_date']));
                                    $product_search_details = $this->Product->getProductById($product_data['product_id']);
                                    $product_data['name'] = $product_search_details['name'];
                                    $product_data['user_id'] = $user_id;
                                    $product_result = $this->UserProduct->insert($product_data);
                                    $i++;
                                    $j = 1;
                                    $product_data = array();
                                }else{
                                    $j++;
                                }
                            }
                        }
                    }
                    $bank_details = $post['Bank'];
                    $bank_details['user_id'] = $user_id;
                    $result_bank = $this->UserBank->insert($bank_details);
                    
                    if(!empty($post['Crop'])){
                        $crop_details = $post['Crop'];
                        $crop_details['user_id'] = $user_id;
                        $crop_details['user_type_id'] = $post['user_type_id'];
                        $crop_details['date_sown'] = !empty($crop_details['date_sown'])?date('Y-m-d', strtotime($crop_details['date_sown'])):'0000-00-00';
                        $crop_details['date_harvest'] = !empty($crop_details['date_harvest'])?date('Y-m-d', strtotime($crop_details['date_harvest'])):'0000-00-00';
                        $crop_details['date_inspection'] = !empty($crop_details['date_inspection'])?date('Y-m-d', strtotime($crop_details['date_inspection'])):'0000-00-00';
                        $result_crop = $this->UserCrop->insert($crop_details);
                    }
                    if(!empty($post['Soil'])){
                        $i = 0;
                        $j = 1;
                        $post_soil = array_filter(array_map('array_filter', $post['Soil'])); 
                        $count = count($post_soil);
                        for($x=1;$x<=max(count($post_soil['element']),count($post_soil['percentage']));$x++){
                            foreach($post_soil as $key_soil => $val_soil){
                                foreach($val_soil as $key => $val){
                                    if($key == $i && !empty($val)){
                                        $soil_data[$key_soil] = $val;
                                    }
                                }
                                if($count == $j){
                                    $soil_data['user_id'] = $user_id;
                                    $soil_data['user_type_id'] = $post['user_type_id'];
                                    $soil_result = $this->UserSoil->insert($soil_data);
                                    $i++;
                                    $j = 1;
                                    $soil_data = array();
                                }else{
                                    $j++;
                                }
                            }
                        }
                    }
                    if(!empty($post['Micro'])){
                        $i = 0;
                        $j = 1;
                        $post_micro = array_filter(array_map('array_filter', $post['Micro'])); 
                        $count = count($post_micro);
                        for($x=1;$x<=max(count($post_micro['element']),count($post_micro['percentage']));$x++){
                            foreach($post_micro as $key_micro => $val_micro){
                                foreach($val_micro as $key => $val){
                                    if($key == $i && !empty($val)){
                                        $micro_data[$key_micro] = $val;
                                    }
                                }
                                if($count == $j){
                                    $micro_data['user_id'] = $user_id;
                                    $micro_data['user_type_id'] = $post['user_type_id'];
                                    $micro_result = $this->UserMicroNutrient->insert($micro_data);
                                    $i++;
                                    $j = 1;
                                    $micro_data = array();
                                }else{
                                    $j++;
                                }
                            }
                        }
                    }
                    if(!empty($post['Input'])){
                        $input_details = $post['Input'];
                        $input_details['user_id'] = $user_id;
                        $input_details['user_type_id'] = $post['user_type_id'];
                        $input_details['input_date'] = !empty($input_details['input_date'])?date('Y-m-d', strtotime($input_details['input_date'])):'0000-00-00';
                        $result_bank = $this->UserInputOrganic->insert($input_details);
                    }
                    
                    $user_type_details = $this->UserType->getUserTypeById($post['user_type_id']);
                    $data_notify = array(
                                        'user_id' => $user_id,
                                        'user_type_id' => $post['user_type_id'],
                                        'notification_type' => REGISTRATION,
                                        'notify_type' => NOTIFY_WEB,
                                        'message' => 'New '.$user_type_details['name'].' '.$post['fullname'].' has been register',
                                    );
                    $result_notification = $this->Notifications->insert($data_notify);
                    
                    $this->session->set_flashdata('Message', 'Registration Successfully. Please login to continue');
                    redirect('login');
                }else{
                    if(!empty($error)){
                        $this->session->set_flashdata('Error',"File cannot be upload - ".$error);
                    }else if(!empty($errors)){
                        $this->session->set_flashdata('Error', "File cannot be upload - ".$errors[0]);
                    }else{
                        $this->session->set_flashdata('Error','Something Went Wrong');
                    }
                    $this->frontendLayout($data);
                }
            }else{
                $this->frontendLayout($data);
            }
        }else{
            $this->frontendLayout($data);
        }
    }
    public function registrationCertificationAgency()
    {
        $userSession = $this->session->userdata('user_data');
        if(!empty($userSession)){
            redirect('home');
        }
        $get = $this->input->get();
        $user_type_details = $this->UserType->getUserTypeById($get['id']);
        $data['user_type_details'] = $user_type_details;
        $data['state_list'] = $this->State->getStates();
        $data['agencies_list'] = $this->CertificationAgency->getAgencies();
        $data['certification_agencies_list'] = $this->CertificationAgency->getCertificationAgencies();
        $data['title'] = $user_type_details['name'].' Registration';
        $data['heading'] = $user_type_details['name'].' Register Form';
        $data['hide_footer'] = true;
        $data['view'] = 'user/registration_certification_agency';
        $data['userSession'] = $userSession;
        if($this->input->post()){
            $post = $this->input->post();
            
            $this->form_validation->set_rules('agency_id', 'Certification Agency', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tbl_certification_agency.username]');
            $this->form_validation->set_message('is_unique', 'The Username already exists.');
            $this->form_validation->set_rules('contact_person', 'Contact Person', 'trim|required');
            $this->form_validation->set_rules('website', 'Website', 'trim|required');
            $this->form_validation->set_rules('licence_no', 'Licence number', 'trim|required');
            $this->form_validation->set_rules('email1', 'Email Id1', 'trim|required');
            $this->form_validation->set_rules('mobile1', 'Mobile number1', 'trim|required|numeric|exact_length[10]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[confirm_password]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[5]');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('email2', 'Email Id2', 'trim');
            $this->form_validation->set_rules('mobile2', 'Mobile number2', 'trim|numeric|exact_length[10]');
            if($this->form_validation->run() == TRUE){
                $details = $post;
                unset($details['confirm_password']);
                $details['password'] = md5($details['password']);
                $details['mobile2'] = !empty($details['mobile2'])?$details['mobile2']:0;
                $details['landline'] = !empty($details['landline'])?$details['mobile2']:0;
                $details['fullname'] = $details['contact_person'];
                $details['status'] = 2;
                $details['is_deleted'] = 0;
                $details['is_verified'] = 1;
                $details['is_view'] = 0;
                $details['created_at'] = date('Y-m-d H:i:s');
                $details['updated_at'] = date('Y-m-d H:i:s');
                $user_id = $this->CertificationAgency->insert($details);
                $user_type_details = $this->UserType->getUserTypeById($post['user_type_id']);
                $agency_details = $this->CertificationAgency->getAgencyById($post['agency_id']);
                $data_notify = array(
                                    'user_id' => $user_id,
                                    'user_type_id' => $post['user_type_id'],
                                    'notification_type' => REGISTRATION,
                                    'notify_type' => NOTIFY_WEB,
                                    'message' => 'New Certification Agency '.$agency_details['name'].' has been register',
                                );
                $result_notification = $this->Notifications->insert($data_notify);

                $this->session->set_flashdata('Message', 'Registration Successfully. Please login to continue');
                redirect('login');
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
    public function searchUser()
    {
        $get = $this->input->get();
        $userSession = $this->session->userdata('user_data');
        $data['userSession'] = $userSession;
        $user_type_details = $this->UserType->getUserTypeById($get['id']);
        $data['user_type_details'] =$user_type_details;
        $data['state_list'] = $this->State->getStates();
        $data['product_list'] = $this->Product->getProducts();
        $data['title'] = 'Search '.$user_type_details['name'];
        $data['heading'] = 'Search '.$user_type_details['name'];
        $data['hide_footer'] = true;
        $data['view'] = 'user/search_user';
        if($this->input->post()){
            $post = $this->input->post();
            if($this->form_validation->run('search-user-form') == TRUE){
                $search_user_list = $this->User->getUserBysearchKey($post);
                $data['search_user_list'] = $search_user_list;
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
    public function getUserById(){
        $post = $this->input->post();
        $user_details = $this->User->getUserById($post['user_id']);
        $agency_name = $this->CertificationAgency->getAgencyById($user_details['agency_id']);
        $user_details['agency_name'] = !empty($agency_name['name'])?$agency_name['name']:'NA';
        $certificaion_name = getCertifications();
        $user_details['certification_name'] = !empty($certificaion_name[$user_details['certification_id']])?$certificaion_name[$user_details['certification_id']]:'NA';
        $state = $this->State->getStateById($user_details['state_id']);
        $user_details['state'] = $state['name'];
        $city = $this->City->getCityById($user_details['city_id']);
        $user_details['city'] = $city['name'];
        $data['user_details'] = $user_details;
        //echo json_encode($user_details);
        echo $this->load->view('user/modal_user_view',$data);
    }
    public function getPostById(){
        $post = $this->input->post();
        $post_details = $this->PostRequirement->getPostRequirementById($post['post_id']);
        $post_details['product_details'] = $this->Product->getFarmerProductById($post_details['product_id']);
        echo json_encode($post_details);
    }
    
}
