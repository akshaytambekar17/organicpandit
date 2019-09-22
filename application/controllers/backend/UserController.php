<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends MY_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
        $this->load->model('login_model','Login');
    }

    public function index() {
        $session = UserSession();
        if ( empty( $session['success'] ) ) {
            redirect('admin', 'refresh');
        }else {
            $arrUserSession = $session['userData'];
//            if( ADMINUSERNAME != $arrUserSession['username'] ){
//                redirect('home', 'refresh');
//            }
        }
        $arrUserSession = $session['userData'];
        if( ADMINUSERNAME == $arrUserSession['username'] ){
            $data['arrUsersList'] = $this->User->getUsers();
        }else{
            $data['arrUsersList'] = $this->User->getUserByPartnerUserId( $arrUserSession['user_id'] );
        }
        
        $data['title'] = 'User Registration';
        $data['heading'] = 'User Registration';
        $data['backend'] = true;
        $data['view'] = 'user/list';
        $data['arrUserSessionDetails'] = $arrUserSession;
        $this->backendLayout($data);
    }
    
    public function userList() {
        $session = UserSession();
        if ( empty( $session['success'] ) ) {
            redirect('admin', 'refresh');
        }else {
            $arrUserSession = $session['userData'];
//            if( ADMINUSERNAME != $arrUserSession['username'] ){
//                redirect('home', 'refresh');
//            }
        }
        $arrUserSession = $session['userData'];
        if( ADMINUSERNAME == $arrUserSession['username'] ){
            $data['arrUsersList'] = $this->User->getUsers();
        }else{
            $data['arrUsersList'] = $this->User->getUserByPartnerUserId( $arrUserSession['user_id'] );
        }
        
        $data['title'] = 'User Registration';
        $data['heading'] = 'User Registration';
        $data['backend'] = true;
        $data['view'] = 'user/list';
        $data['arrUserSessionDetails'] = $arrUserSession;
        $this->backendLayout($data);
    }

    public function login() {
        $session = UserSession();
        if ( $session['success'] ) {
            redirect('admin/dashboard', 'refresh');
        }else {
            $arrUserSession = $session['userData'];
//            if( ADMINUSERNAME != $arrUserSession['username'] ){
//                redirect('home', 'refresh');
//            }
        }

        $data['title'] = 'Login';
        $data['heading'] = 'Organic Pandit';
        $data['hide_footer'] = true;
        $data['hide_social_login'] = true;
        $data['headerFooter'] = true;
        $data['backend'] = true;
        $data['view'] = 'common/login';
        if ($this->input->post()) {
            if ($this->form_validation->run('admin-login') == TRUE) {
                $post = $this->input->post();
                $result = $this->Login->getUserByEmailIdPassword($post);
                if(!empty($result)){
                    $this->session->set_userdata('user_data', $result);
                    redirect('admin/dashboard', 'refresh');
                }else{
                    $this->session->set_flashdata('Error', 'Email Id or Password  must be wrong');
                    $this->backendLayout($data);
                }
            } else {
                $this->backendLayout($data);
            }
        } else {
            $this->backendLayout($data);
        }
    }

    public function view(){
        $session = UserSession();
        if ( empty( $session['success'] ) ) {
            redirect('admin', 'refresh');
        }else {
            $arrUserSession = $session['userData'];
//            if( ADMINUSERNAME != $arrUserSession['username'] ){
//                redirect('home', 'refresh');
//            }
        }
        $arrGet = $this->input->get();
        $arrUserSession = $session['userData'];
        if($this->input->post()){
            $post = $this->input->post();
            $details = $post;
            $details['updated_at'] = date('Y-m-d H:i:s');
            $result = $this->User->update($details);
            if ($result) {
                if($post['is_verified'] == 2){
                    $verified = "Approve user";
                }else{
                    $verified = "Reject user";
                }
                if($arrUserSession['username'] != ADMINUSERNAME && $arrUserSession['user_type_id'] == 16){
                    $certification_agency_details = $this->CertificationAgency->getCertificationAgencyById($arrUserSession['user_id']);
                    $data_notify = array(
                                        'user_id' => $post['user_id'],
                                        'certification_agency_id' => $arrUserSession['user_id'],
                                        'user_type_id' => $certification_agency_details['user_type_id'],
                                        'notification_type' => VERIFY_REGISTRATION,
                                        'notify_type' => NOTIFY_WEB,
                                        'message' => 'Certification Agency '.$verified .' '.$post['fullname'],
                                    );
                    $result_notification = $this->Notifications->insert($data_notify);
                }else{

                    $user_type_details = $this->UserType->getUserTypeById($post['user_type_id']);
                    $data_notify = array(
                                        'user_id' => $post['user_id'],
                                        'user_type_id' => $post['user_type_id'],
                                        'notification_type' => VERIFY_REGISTRATION,
                                        'notify_type' => NOTIFY_WEB,
                                        'message' => 'Admin '.$verified.' '.$post['fullname'],
                                    );
                    $result_notification = $this->Notifications->insert($data_notify);
                }
                $this->session->set_flashdata('Message', 'User '.$post['fullname'].' has been updated Succesfully');
                return redirect('admin/user', 'refresh');
            } else {
                $this->session->set_flashdata('Error', 'Failed to update product');
                $arrUserDetails = $this->User->getUserById($post['user_id']);
                $partnerUserTypeDetails = $this->UserType->getUserTypeById( $arrUserDetails['partner_type_id'] );
                $partnerUserDetails = $this->User->getUserById( $arrUserDetails['partner_user_id'] );
                $user_crop_details = $this->UserCrop->getUserCropByUserId($post['user_id']);
                $user_soil_details = $this->UserSoil->getUserSoilByUserId($post['user_id']);
                $user_micro_details = $this->UserMicroNutrient->getUserMicroNutrientByUserId($post['user_id']);
                $user_input_details = $this->UserInputOrganic->getUserInputOrganicByUserId($post['user_id']);
                $data['user_data'] = $arrUserSession;
                $data['backend'] = true;
                $data['user_details'] = $arrUserDetails;
                $data['partnerUserTypeName'] = $partnerUserTypeDetails['name'];
                $data['partnerUserName'] = $partnerUserDetails['fullname'];
                $data['user_crop_details'] = $user_crop_details;
                $data['user_soil_details'] = $user_soil_details;
                $data['user_micro_details'] = $user_micro_details;
                $data['user_input_details'] = $user_input_details;
                $data['title'] = $arrUserDetails['fullname'] ;
                $data['heading'] = $arrUserDetails['fullname'];
                $data['view'] = 'user/view';
                $this->backendLayout($data);
            }


        }else{
            $arrUserDetails = $this->User->getUserById($arrGet['id']);
            $user_crop_details = $this->UserCrop->getUserCropByUserId($arrGet['id']);
            $user_soil_details = $this->UserSoil->getUserSoilByUserId($arrGet['id']);
            $user_micro_details = $this->UserMicroNutrient->getUserMicroNutrientByUserId($arrGet['id']);
            $user_input_details = $this->UserInputOrganic->getUserInputOrganicByUserId($arrGet['id']);
            $partnerUserTypeDetails = $this->UserType->getUserTypeById( $arrUserDetails['partner_type_id'] );
            $partnerUserDetails = $this->User->getUserById( $arrUserDetails['partner_user_id'] );
            $data['user_data'] = $arrUserSession;
            $data['backend'] = true;
            $data['user_details'] = $arrUserDetails;
            $data['partnerUserTypeName'] = $partnerUserTypeDetails['name'];
            $data['partnerUserName'] = $partnerUserDetails['fullname'];
            $data['user_crop_details'] = $user_crop_details;
            $data['user_soil_details'] = $user_soil_details;
            $data['user_micro_details'] = $user_micro_details;
            $data['user_input_details'] = $user_input_details;
            $data['title'] = $arrUserDetails['fullname'] ;
            $data['heading'] = $arrUserDetails['fullname'];
            $data['view'] = 'user/view';
            $this->backendLayout($data);
        }
    }

    public function updateProfile(){
        $arrGet = $this->input->get();
        $session = UserSession();
        $arrUserSession = $session['userData'];
        if($this->input->post()){
            $post = $this->input->post();

            if($post['user_type_id'] == 2){
                $fullname_title = 'FPO Name';
            }else{
                $fullname_title = 'Fullname';
            }
            $this->form_validation->set_rules('fullname', $fullname_title, 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_message('is_unique', 'The Username already exists.');
            $this->form_validation->set_rules('email_id', 'Email Id', 'trim|required');
            $this->form_validation->set_rules('mobile_no', 'Mobile number', 'trim|required|numeric|exact_length[10]');
            $this->form_validation->set_rules('state_id', 'State', 'trim|required');
            $this->form_validation->set_rules('city_id', 'City', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('story', 'Story', 'trim');

            if( ADMINUSERNAME == $arrUserSession['username'] ){
                if( !empty( $post['password'] ) ) {
                    $this->form_validation->set_rules('password', 'Password', 'trim|min_length[5]|matches[confirm_password]');
                    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[5]');
                }
            }

            if($post['user_type_id'] != 2 ){
                $this->form_validation->set_rules('aadhar_number', 'Aadhar Number', 'trim|numeric|exact_length[12]');
            }
            $this->form_validation->set_rules('landline_no', 'Landline Number', 'trim');
            $this->form_validation->set_rules('website', 'Website', 'trim');

            if($post['user_type_id'] == 1 || $post['user_type_id'] == 2 || $post['user_type_id'] == 3 || $post['user_type_id'] == 4){
                $this->form_validation->set_rules('is_visit_farm', 'Visit Farm', 'trim');
            }
            if($post['user_type_id'] == 1 || $post['user_type_id'] == 2 ){
                $this->form_validation->set_rules('pancard_number', 'Pan Card Number', 'trim');
            }else{
                $this->form_validation->set_rules('gst_number', 'GST Number', 'trim');
            }
            if($post['user_type_id'] != 1 && $post['user_type_id'] != 6 ){
                $this->form_validation->set_rules('ceo_name', 'CEO Name', 'trim');
            }
            if($post['user_type_id'] != 1 && $post['user_type_id'] != 2 && $post['user_type_id'] != 3 && $post['user_type_id'] != 4 && $post['user_type_id'] != 5 && $post['user_type_id'] != 6){
                $this->form_validation->set_rules('organization_name', 'Organization Name', 'trim|required');
            }
            if($post['user_type_id'] == 2){
                $this->form_validation->set_rules('total_farmer', 'Number of Farmer', 'trim');
            }
            if($post['user_type_id'] == 5){
                $this->form_validation->set_rules('type_of_buyer', 'Type of Buyer', 'trim');
            }
            if($post['user_type_id'] == 1 || $post['user_type_id'] == 2 || $post['user_type_id'] == 3 || $post['user_type_id'] == 4 || $post['user_type_id'] == 5){
                $this->form_validation->set_rules('certification_id[]', 'Certification', 'trim');
                $this->form_validation->set_rules('certification_number', 'Certification Number', 'trim');
                $this->form_validation->set_rules('agency_id', 'Certification Agency', 'trim|required');
                $this->form_validation->set_rules('is_test_report', 'Test Report', 'trim');
//                $this->form_validation->set_rules('Product[name][]', 'Product Name', 'trim');
//                $this->form_validation->set_rules('Product[description][]', 'Description', 'trim');
//                $this->form_validation->set_rules('Product[from_date][]', 'From Date', 'trim');
//                $this->form_validation->set_rules('Product[to_date][]', 'To Date', 'trim');
//                $this->form_validation->set_rules('Product[quantity_id][]', 'Quantity', 'trim');
//                $this->form_validation->set_rules('Product[quality][]', 'Quality', 'trim');
//                $this->form_validation->set_rules('Product[price][]', 'Price', 'trim');

            }
            $this->form_validation->set_rules('Bank[bank_name]', 'Bank Name', 'trim');
            $this->form_validation->set_rules('Bank[account_holder_name]', 'Account Holder Name', 'trim');
            $this->form_validation->set_rules('Bank[account_no]', 'Account Number', 'trim');
            $this->form_validation->set_rules('Bank[ifsc_code]', 'Ifsc Code', 'trim');
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
                    $video = !empty($post['video_hidden'])?$post['video_hidden']:'';
                    $error = '';
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
                    $resume = !empty($post['resume_hidden'])?$post['resume_hidden']:'';
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
                    $product_catalogue = !empty($post['product_catalogue_hidden'])?$post['product_catalogue_hidden']:'';
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
                    $profile_image = !empty($post['profile_image_hidden'])?$post['profile_image_hidden']:'';
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
                    $certification_image = !empty($post['certification_image_hidden'])?$post['certification_image_hidden']:'';
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
                    $company_image = !empty($post['company_image_hidden'])?$post['company_image_hidden']:'';
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
                        }else{
                            $product_images[] = !empty($post['product_images_hidden'][$i])?$post['product_images_hidden'][$i]:'';
                        }
                    }
                }else{
                    $product_images[] = '';
                    $errors[] = '';
                }
                if(empty($error)){
                    $intUserId = $post['user_id'];
                    unset($details['product_count']);
                    unset($details['crop_count']);
                    unset($details['soil_count']);
                    unset($details['city_id_hidden']);
                    unset($details['profile_image_hidden']);
                    unset($details['certification_image_hidden']);
                    unset($details['company_image_hidden']);
                    unset($details['resume_hidden']);
                    unset($details['video_hidden']);
                    unset($details['product_catalogue_hidden']);
                    unset($details['product_images_hidden']);
                    unset($details['Bank']);
                    unset($details['Product']);
                    unset($details['Crop']);
                    unset($details['Soil']);
                    unset($details['Micro']);
                    unset($details['Input']);
                    unset($details['confirm_password']);
                    if( !empty( $details['password'] ) ) {
                        $details['password'] = md5($details['password']);
                    } else {
                        unset($details['password']);
                    }
                    $details['landline_no'] = !empty($details['landline_no'])?$details['landline_no']:0;
                    $details['profile_image'] = $profile_image;
                    $details['company_image'] = $company_image;
                    $details['certification_image'] = $certification_image;
                    $details['video'] = $video;
                    $details['product_catalogue'] = $product_catalogue;
                    $details['resume'] = $resume;
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    $result = $this->User->update($details);
                    
                    if( true == isArrVal( $post['certification_id'] ) ) {
                        foreach( $post['certification_id'] as $intCertificationId ) {
                            $arrUserCertificationData = array(
                                'user_id' => $intUserId,
                                'certification_id' => $intCertificationId
                            );
                            $arrmixUserCertificationData[] = $arrUserCertificationData;
                            $arrUserCertificationData = array();
                        }
                        if (true == isArrVal($arrmixUserCertificationData)) {
                            $this->UserCertifications->deleteByUserId( $intUserId );
                            $this->UserCertifications->insertBatch( $arrmixUserCertificationData );
                        }
                    }
                    if(!empty($post['Product'])){
                        $this->UserProduct->deleteByUserId($post['user_id']);
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
                                    $product_data['from_date'] = date( "Y-m-d", strtotime( str_replace( '/', '-', $product_data['from_date'] ) ) );
                                    $product_data['to_date'] = date( "Y-m-d", strtotime( str_replace( '/', '-', $product_data['to_date'] ) ) );
                                    $product_data['user_id'] = $post['user_id'];
                                    $product_search_details = $this->Product->getProductById($product_data['product_id']);
                                    $product_data['name'] = $product_search_details['name'];
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
                    $bank_details['user_id'] = $post['user_id'];
                    $result_bank = $this->UserBank->updateByUserId($bank_details);
                    if(!empty($post['Crop'])){
                        $this->UserCrop->deleteByUserId($post['user_id']);
                        $i = 0;
                        $j = 1;
                        $post_crop = array_filter(array_map('array_filter', $post['Crop']));
                        $count = count($post_crop);
                        for($x=1;$x<=count($post_crop['crop_id']);$x++){
                            foreach($post_crop as $key_crop => $val_crop){
                                foreach($val_crop as $key => $val){
                                    if($key == $i && !empty($val)){
                                        $crop_details[$key_crop] = $val;
                                    }
                                }
                                if($count == $j){

                                    $crop_details['user_id'] = $intUserId;
                                    $crop_details['user_type_id'] = $post['user_type_id'];
                                    $crop_details['date_sown'] = !empty( $crop_details['date_sown'] ) ? date( 'Y-m-d', strtotime( str_replace( '/', '-', $crop_details['date_sown'] ) ) ) : '';
                                    $crop_details['date_harvest'] = !empty( $crop_details['date_harvest'] ) ? date( 'Y-m-d', strtotime( str_replace( '/', '-', $crop_details['date_harvest'] ) ) ) : '';
                                    $crop_details['date_inspection'] = !empty( $crop_details['date_inspection'] ) ? date( 'Y-m-d', strtotime( str_replace( '/', '-', $crop_details['date_inspection'] ) ) ) : '';

                                    $result_crop = $this->UserCrop->insert($crop_details);
                                    $i++;
                                    $j = 1;
                                    $crop_details = array();
                                }else{
                                    $j++;
                                }
                            }
                        }
                    }
                    if(!empty($post['Soil'])){
                        $this->UserSoil->deleteByUserId($post['user_id']);
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
                                    $soil_data['user_id'] = $intUserId;
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
                        $this->UserMicroNutrient->deleteByUserId($post['user_id']);
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
                                    $micro_data['user_id'] = $intUserId;
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
                    if( !empty($post['Input'] ) ) {
                        $this->UserInputOrganic->deleteByUserId($post['user_id']);
                        $i = 0;
                        $j = 1;
                        $postInputOrganic = array_filter( array_map( 'array_filter', $post['Input'] ) );
                        $count = count( $postInputOrganic );
                        for ( $x = 1; $x <= count( $postInputOrganic['input_date'] ); $x++ ) {
                            foreach( $postInputOrganic as $keyInput => $valInput ) {
                                foreach( $valInput as $key => $val ) {
                                    if( $key == $i && !empty( $val ) ) {
                                        $inputData[$keyInput] = $val;
                                    }
                                }
                                if ($count == $j) {
                                    $inputData['user_id'] = $intUserId;
                                    $inputData['user_type_id'] = $post['user_type_id'];
                                    $inputData['input_date'] = !empty( $inputData['input_date'] ) ? date( 'Y-m-d', strtotime( str_replace( '/', '-', $inputData['input_date'] ) ) ) : '0000-00-00';
                                    $this->UserInputOrganic->insert( $inputData );
                                    $i++;
                                    $j = 1;
                                    $inputData = array();
                                } else {
                                    $j++;
                                }
                            }
                        }
//                        $input_details = $post['Input'];
//                        $input_details['user_id'] = $intUserId;
//                        $input_details['user_type_id'] = $post['user_type_id'];
//                        $input_details['input_date'] = !empty($input_details['input_date']) ? date('Y-m-d', strtotime($input_details['input_date'])) : '0000-00-00';

                    }

                    if($arrUserSession['username'] == ADMINUSERNAME){
                        $this->session->set_flashdata('Message', $details['fullname']. ' profile has been updated successfully.');
                        redirect('admin/user');
                    }else{
                        $this->session->set_flashdata('Message', 'Profile has been updated successfully.');
                        redirect('admin/user/update-profile?id='.$post['user_id'].'&user_type_id='.$post['user_type_id']);
                    }
                }else{
                    if(!empty($error)){
                        $this->session->set_flashdata('Error',"File cannot be upload - ".$error);
                    }else if(!empty($errors)){
                        $this->session->set_flashdata('Error', "File cannot be upload - ".$errors[0]);
                    }else{
                        $this->session->set_flashdata('Error','Something Went Wrong');
                    }
                    $data_return = $this->profileData($post['user_id'],$post['user_type_id'],$arrUserSession);
                    $this->backendLayout($data_return);
                }
            }else{
                $data_return = $this->profileData($post['user_id'],$post['user_type_id'],$arrUserSession);
                $this->backendLayout($data_return);
            }
        }else{
            $data_return = $this->profileData( $arrGet['id'],$arrGet['user_type_id'],$arrUserSession );
            $this->backendLayout($data_return);
        }
    }

    public function profileData( $intUserId, $intUserTypeId, $arrUserSession ) {
        $arrUserDetails = $this->User->getUserById($intUserId);
        if($arrUserDetails['user_type_id'] == 1 || $arrUserDetails['user_type_id'] == 2 || $arrUserDetails['user_type_id'] == 4 || $arrUserDetails['user_type_id'] == 3 || $arrUserDetails['user_type_id'] == 5 ){
            $user_product_details = $this->UserProduct->getUserProductByUserId($intUserId);
        }else{
            $user_product_details = '';
        }
        
        $user_crop_details = $this->UserCrop->getUserCropByUserId($intUserId);
        $user_soil_details = $this->UserSoil->getUserSoilByUserId($intUserId);
        $user_micro_details = $this->UserMicroNutrient->getUserMicroNutrientByUserId($intUserId);
        $user_input_details = $this->UserInputOrganic->getUserInputOrganicByUserId($intUserId);

        $user_bank_details = $this->UserBank->getUserBankByUserId($intUserId);
        $user_type_details = $this->UserType->getUserTypeById($intUserTypeId);
        $arrUserCertificationsList = $this->UserCertifications->getUserCertificationByUserId( $intUserId );
        $strUserCertificationName = '';
        $arrCertificationList = getCertifications();
        if( true == isArrVal( $arrUserCertificationsList ) ) {
            foreach( $arrUserCertificationsList as $arrUserCertificationDetails ) {
                $arrstrCertificationName[] = $arrCertificationList[ $arrUserCertificationDetails['certification_id'] ];
            }
            $strUserCertificationName = implode( ',', $arrstrCertificationName );
        }
        $data['strUserCertificationName'] = $strUserCertificationName;
        $data['userInputOrganicList'] = $this->UserInputOrganic->getUserInputOrganicByUserId( $intUserId );
        $data['userTypeList'] = $this->UserType->getUserTypes();
        $data['product_list'] = $this->Product->getActiveProducts();
        $data['user_type_list'] = $this->UserType->getUserTypes();
        $data['state_list'] = $this->State->getStates();
        $data['agencies_list'] = $this->Agency->getAgencies();
        $data['certification_agencies_list'] = $this->CertificationAgency->getCertificationAgenciesVerified();
        $data['crop_list'] = $this->Crop->getActiveCrops();
        $data['user_data'] = $arrUserSession;
        $data['backend'] = true;
        $data['user_details'] = $arrUserDetails;
        $data['user_product_details'] = $user_product_details;
        $data['user_bank_details'] = $user_bank_details;
        $data['user_type_details'] = $user_type_details;
        $data['user_crop_details'] = $user_crop_details;
        $data['user_soil_details'] = $user_soil_details;
        $data['user_micro_details'] = $user_micro_details;
        $data['user_session'] = $arrUserSession;
        $data['title'] = $arrUserDetails['fullname'] ;
        $data['heading'] = $arrUserDetails['fullname'];
        $data['view'] = 'user/profile_form';
        return $data;
    }

    public function userRegistrationDashborad() {
        $session = UserSession();
        if ( empty( $session['success'] ) ) {
            redirect('home', 'refresh');
        }

        $arrUserSession = $session['userData'];
        if( ADMINUSERNAME == $arrUserSession['username'] ){
            $data['userList'] = $this->User->getUsers();
        }else{
            $data['userList'] = $this->User->getUserByPartnerUserId( $arrUserSession['user_id'] );
        }
        $data['userTypeList'] = $this->UserType->getUserTypes();

        $data['title'] = 'User Registration';
        $data['heading'] = 'User Registration';
        $data['backend'] = true;
        $data['view'] = 'common/user-registration-dashboard';
        $data['userSessionData'] = $arrUserSession;
        $this->backendLayout($data);
    }

    public function changePassword() {
        if (!$this->session->userdata('user_data')) {
            redirect('home', 'refresh');
        }
        $session = UserSession();
        $arrUserSession = $session['userData'];
        $data['user_details'] = $arrUserSession;
        $data['title'] = 'Change Password';
        $data['heading'] = 'Change Password';
        $data['backend'] = true;
        $data['view'] = 'user/change_password';
        if ($this->input->post()) {
            if ($this->form_validation->run('change-password-form') == TRUE) {
                $post = $this->input->post();
                $details = $post;
                unset($details['confirm_password']);
                $details['password'] = md5($post['password']);
                $details['user_id'] = $arrUserSession['user_id'];
                if($arrUserSession['user_type_id'] == 16){
                    $result = $this->CertificationAgency->update($details);
                }else{
                    $result = $this->User->update($details);
                }
                if($result){
                    $this->session->unset_userdata('user_data');
                    $this->session->set_flashdata('Message', 'Password has been changed successfully.Plesae login to continue.');
                    redirect('login');
                }else{
                    $this->session->set_flashdata('Error', 'Somethin went wrong,Please try again later');
                    $this->backendLayout($data);
                }
             } else {
                $this->backendLayout($data);
            }
        }else {
            $this->backendLayout($data);
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_data');
        return redirect('home');
    }
    
    public function delete(){
        $post = $this->input->post();
        $result = $this->User->delete($post['user_id']);
        if($result){
            echo true;
        }else{
            echo false;
        }
   }
}
