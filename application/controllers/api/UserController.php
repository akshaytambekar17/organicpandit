<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class UserController extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('MY_Form_validation');
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    }
    public function login(){
        $post = $this->input->post();
	
        if( !empty( $post['username'] ) && !empty( $post['password'] ) ){
            $details = $post;
            
            $userDetails = $this->User->getUserLoginByUsernamePassword( $details['username'], $details['password'] );
            if( !empty( $userDetails ) ) {
//                $fcmData = array('token' => $details['token'],
//                                     'user_id' => $userDetails['user_id'],
//                                     'type' => TYPE_ANDROID,
//                                     'active' => 1,
//                                     'updated_at' => CURRENTDATETIME
//                                );  
//                $this->PushNotificationDevices->insert($fcmData);
//                            $resultFcm = $this->PushNotificationDevices->getPushNotificationDevicesByUserId($userDetails['user_id']);
//                            if(empty($resultFcm)){
//                                $this->PushNotificationDevices->insert($fcmData);
//                            }else{
//                                $this->PushNotificationDevices->update($fcmData);
//                            }

                $result['success'] = true;
                $result['data'] = $userDetails;
            }else{
                $result['success'] = false;
                $result['message'] = 'Invalid Username or Password.';   
            }
        }else{
            $result['success'] = false;
            $result['message'] = 'Plesae enter the email and password.';
        }  
        
        $this->response( $result );
        
    }
    
    public function getUserTypeList(){
        
        $userTypeList = $this->UserType->getUserTypes();
        
        if( !empty( $userTypeList ) ) {
            $result['success'] = true;
            $result['data'] = $userTypeList;
        }else{
            $result['success'] = false;
            $result['message'] = 'No data found';
        }
        
        $this->response( $result );
    }
    
    public function registration() {
        $post = $this->input->post();
        
        if( !empty( $post['user_type_id'] ) ) {
            if ($post['user_type_id'] == 2) {
                $fullname_title = 'FPO Name';
            } else {
                $fullname_title = 'Fullname';
            }
            
            $this->form_validation->set_rules('partner_type_id', 'Partner Type', 'trim|required');
            $this->form_validation->set_rules('partner_user_id', 'Partner Name', 'trim|required');
            $this->form_validation->set_rules('fullname', $fullname_title, 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tbl_users.username]');
            $this->form_validation->set_message('is_unique', 'The Username already exists.');
            $this->form_validation->set_rules('email_id', 'Email Id', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|matches[confirm_password]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[5]');
            $this->form_validation->set_rules('mobile_no', 'Mobile number', 'trim|required|numeric|exact_length[10]');

            if (empty($_FILES['profile_image']['name'])) {
                $this->form_validation->set_rules('profile_image', 'Profile Image', 'trim|required');
            }
                $this->form_validation->set_rules('state_id', 'State', 'trim|required');
            $this->form_validation->set_rules('city_id', 'City', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            //$this->form_validation->set_rules('story', 'Story', 'trim|required');
            if ($post['user_type_id'] != 2) {
                $this->form_validation->set_rules('aadhar_number', 'Aadhar Number', 'trim|required|numeric|exact_length[12]');
            }

            $this->form_validation->set_rules('landline_no', 'Landline Number', 'trim');
            $this->form_validation->set_rules('website', 'Website', 'trim');

            if ($post['user_type_id'] == 1 || $post['user_type_id'] == 2 || $post['user_type_id'] == 3 || $post['user_type_id'] == 4) {
                //$this->form_validation->set_rules('is_visit_farm', 'Visit Farm', 'trim|required');
            }

            if ($post['user_type_id'] == 1 || $post['user_type_id'] == 2) {
                $this->form_validation->set_rules('pancard_number', 'Pan Card Number', 'trim|required');
            } else {
                $this->form_validation->set_rules('gst_number', 'GST Number', 'trim|required');
            }
            if ($post['user_type_id'] != 1 && $post['user_type_id'] != 6) {
                $this->form_validation->set_rules('ceo_name', 'CEO Name', 'trim|required');
            }
            if ($post['user_type_id'] != 1 && $post['user_type_id'] != 2 && $post['user_type_id'] != 3 && $post['user_type_id'] != 4 && $post['user_type_id'] != 5 && $post['user_type_id'] != 6) {
                $this->form_validation->set_rules('organization_name', 'Organization Name', 'trim|required');
            }
            if ($post['user_type_id'] == 2) {
                $this->form_validation->set_rules('total_farmer', 'Number of Farmer', 'trim|required');
            }
            if ($post['user_type_id'] == 5) {
                $this->form_validation->set_rules('type_of_buyer', 'Type of Buyer', 'trim|required');
            }

            if ($post['user_type_id'] == 1 || $post['user_type_id'] == 2 || $post['user_type_id'] == 3 || $post['user_type_id'] == 4 || $post['user_type_id'] == 5) {
                $this->form_validation->set_rules('certification_id', 'Certification', 'trim|required');
                $this->form_validation->set_rules('certification_number', 'Certification Number', 'trim');
                $this->form_validation->set_rules('agency_id', 'Certification Agency', 'trim|required');
                //$this->form_validation->set_rules('is_test_report', 'Test Report', 'trim|required');
                $this->form_validation->set_rules('Product[product_id][]', 'Product Name', 'trim');
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

            if ($post['user_type_id'] == 1 || $post['user_type_id'] == 2) {
                $this->form_validation->set_rules('Crop[crop_id][]', 'Select Crop', 'trim');
                $this->form_validation->set_rules('Crop[area][]', 'Area', 'trim');
                $this->form_validation->set_rules('Crop[date_sown][]', 'Date of Sown', 'trim');
                $this->form_validation->set_rules('Crop[date_harvest][]', 'Date of Harvest', 'trim');
                $this->form_validation->set_rules('Crop[date_inspection][]', 'Date of Inspection', 'trim');
                $this->form_validation->set_rules('Crop[crop_condition][]', 'Crop Condition', 'trim');
                $this->form_validation->set_rules('Crop[other_details][]', 'Other Details', 'trim');

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

            if (7 == $post['user_type_id']) {
                $this->form_validation->set_rules('Ecommerce[category_id][]', 'Select Category', 'trim');
                $this->form_validation->set_rules('Ecommerce[sub_category_id][]', 'Select SubCategory', 'trim');
                $this->form_validation->set_rules('Ecommerce[brand][]', 'Brand', 'trim');
                $this->form_validation->set_rules('Ecommerce[price][]', 'Price', 'trim');
                if (empty($_FILES['ecommerce_images']['name'])) {
                    $this->form_validation->set_rules('ecommerce_images[]', 'Ecommerce Image', 'trim|required');
                }
                $this->form_validation->set_rules('Ecommerce[weight][]', 'Weight', 'trim');
            }
            
            if ( $this->form_validation->run() == TRUE ) {
                $details = $post;
                if (!empty($_FILES['video']['name'])) {
                    $config_video['upload_path'] = './assets/images/gallery/';
                    $config_video['allowed_types'] = '*';
                    $config_video['max_size'] = 102400;
                    $this->load->library('upload', $config_video);
                    if ($this->upload->do_upload('video')) {
                        $uploadData = $this->upload->data();
                        $video = $uploadData['file_name'];
                        $error = '';
                    } else {
                        $error = $this->upload->display_errors();
                        $video = '';
                    }
                } else {
                    $error = '';
                    $video = '';
                }
                if (!empty($_FILES['resume']['name'])) {
                    $config_resume['upload_path'] = './assets/images/gallery/';
                    $config_resume['allowed_types'] = 'docx|pdf|csv|xls|xlsx';
                    $config_resume['max_size'] = 102400;

                    $this->load->library('upload', $config_resume);
                    if ($this->upload->do_upload('resume')) {
                        $uploadData = $this->upload->data();
                        $resume = $uploadData['file_name'];
                        $error = '';
                    } else {
                        $error = $this->upload->display_errors();
                        $resume = '';
                    }
                } else {
                    $resume = '';
                    $error = '';
                }
                if (!empty($_FILES['product_catalogue']['name'])) {
                    $config_catalogue['upload_path'] = './assets/images/gallery/';
                    $config_catalogue['allowed_types'] = 'docx|pdf|csv|xls|xlsx';
                    $config_catalogue['max_size'] = 102400;

                    $this->load->library('upload', $config_catalogue);
                    if ($this->upload->do_upload('product_catalogue')) {
                        $uploadData = $this->upload->data();
                        $product_catalogue = $uploadData['file_name'];
                        $error = '';
                    } else {
                        $error = $this->upload->display_errors();
                        $product_catalogue = '';
                    }
                } else {
                    $product_catalogue = '';
                    $error = '';
                }
                if (!empty($_FILES['profile_image']['name'])) {
                    $config['upload_path'] = './assets/images/gallery/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = 2048;

                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('profile_image')) {
                        $uploadData = $this->upload->data();
                        $profile_image = $uploadData['file_name'];
                        $error = '';
                    } else {
                        $error = $this->upload->display_errors();
                        $profile_image = '';
                    }
                } else {
                    $profile_image = '';
                    $error = '';
                }
                if (!empty($_FILES['certification_image']['name'])) {
                    $config1['upload_path'] = './assets/images/gallery/';
                    $config1['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config1['max_size'] = 2048;

                    $this->load->library('upload', $config1);
                    if ($this->upload->do_upload('certification_image')) {
                        $uploadData = $this->upload->data();
                        $certification_image = $uploadData['file_name'];
                        $error = '';
                    } else {
                        $error = $this->upload->display_errors();
                        $certification_image = '';
                    }
                } else {
                    $certification_image = '';
                    $error = '';
                }

                if (!empty($_FILES['company_image']['name'])) {
                    $config_company['upload_path'] = './assets/images/gallery/';
                    $config_company['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config_company['max_size'] = 2048;
                    $this->load->library('upload', $config_company);
                    if ($this->upload->do_upload('company_image')) {
                        $uploadData = $this->upload->data();
                        $company_image = $uploadData['file_name'];
                        $error = '';
                    } else {
                        $error = $this->upload->display_errors();
                        $company_image = '';
                    }
                } else {
                    $company_image = '';
                    $error = '';
                }


                if (!empty($_FILES['product_images']['name'])) {
                    $count = count($_FILES['product_images']['name']);
                    $files = $_FILES;
                    for ($i = 0; $i < $count; $i++) {
                        if (!empty($files['product_images']['name'][$i])) {
                            $_FILES['product_images']['name'] = $files['product_images']['name'][$i];
                            $_FILES['product_images']['type'] = $files['product_images']['type'][$i];
                            $_FILES['product_images']['tmp_name'] = $files['product_images']['tmp_name'][$i];
                            $_FILES['product_images']['error'] = $files['product_images']['error'][$i];
                            $_FILES['product_images']['size'] = $files['product_images']['size'][$i];
                            $config4['upload_path'] = './assets/images/product_images/';
                            $config4['allowed_types'] = 'gif|jpg|png|jpeg';
                            $this->load->library('upload', $config4);
                            $this->upload->initialize($config4);
                            if ($this->upload->do_upload('product_images')) {
                                $uploadData = $this->upload->data();
                                $product_images[] = $uploadData['file_name'];
                                $errors[] = '';
                            } else {
                                $errors[] = $this->upload->display_errors();
                                $product_images[] = '';
                            }
                        }
                    }
                } else {
                    $errors[] = '';
                    $product_images[] = '';
                }

                if (!empty($_FILES['ecommerce_images']['name'])) {
                    $count = count($_FILES['ecommerce_images']['name']);
                    $files = $_FILES;
                    for ($i = 0; $i < $count; $i++) {
                        if (!empty($files['ecommerce_images']['name'][$i])) {
                            $_FILES['ecommerce_images']['name'] = $files['ecommerce_images']['name'][$i];
                            $_FILES['ecommerce_images']['type'] = $files['ecommerce_images']['type'][$i];
                            $_FILES['ecommerce_images']['tmp_name'] = $files['ecommerce_images']['tmp_name'][$i];
                            $_FILES['ecommerce_images']['error'] = $files['ecommerce_images']['error'][$i];
                            $_FILES['ecommerce_images']['size'] = $files['ecommerce_images']['size'][$i];
                            $config4['upload_path'] = './assets/images/ecommerce_images/';
                            $config4['allowed_types'] = 'gif|jpg|png|jpeg';
                            $this->load->library('upload', $config4);
                            $this->upload->initialize($config4);
                            if ($this->upload->do_upload('ecommerce_images')) {
                                $uploadData = $this->upload->data();
                                $ecommerce_images[] = $uploadData['file_name'];
                                $errors[] = '';
                            } else {
                                $errors[] = $this->upload->display_errors();
                                $ecommerce_images[] = '';
                            }
                        }
                    }
                } else {
                    $errors[] = '';
                    $ecommerce_images[] = '';
                }

                if (empty($error)) {
                    unset($details['confirm_password']);
                    unset($details['product_count']);
                    unset($details['crop_count']);
                    unset($details['soil_count']);
                    unset($details['ecommerce_count']);
                    unset($details['Bank']);
                    unset($details['Product']);
                    unset($details['Ecommerce']);
                    unset($details['Crop']);
                    unset($details['Soil']);
                    unset($details['Micro']);
                    unset($details['Input']);
                    $details['landline_no'] = !empty($details['landline_no']) ? $details['landline_no'] : 0;
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
                    if (!empty($post['Product'])) {
                        $i = 0;
                        $j = 1;
                        $post_product = array_filter(array_map('array_filter', $post['Product']));
                        $count = count($post_product);
                        for ($x = 1; $x <= count($post_product['product_id']); $x++) {
                            foreach ($post_product as $key_product => $val_product) {
                                foreach ($val_product as $key => $val) {
                                    if ($key == $i && !empty($val)) {
                                        $product_data[$key_product] = $val;
                                        if (!empty($product_images)) {
                                            foreach ($product_images as $key_image => $val_image) {
                                                if ($key_image == $i) {
                                                    $product_data['images'] = $val_image;
                                                }
                                            }
                                        }
                                    }
                                }
                                if ($count == $j) {
                                    $product_data['from_date'] = date("Y-m-d", strtotime($product_data['from_date']));
                                    $product_data['to_date'] = date("Y-m-d", strtotime($product_data['to_date']));
                                    $product_search_details = $this->Product->getProductById($product_data['product_id']);
                                    $product_data['name'] = $product_search_details['name'];
                                    $product_data['user_id'] = $user_id;
                                    $product_result = $this->UserProduct->insert($product_data);
                                    $i++;
                                    $j = 1;
                                    $product_data = array();
                                } else {
                                    $j++;
                                }
                            }
                        }
                    }
                    if (!empty($post['Ecommerce'])) {
                        $i = 0;
                        $j = 1;
                        $post_ecommerce = array_filter(array_map('array_filter', $post['Ecommerce']));
                        $count = count($post_ecommerce);
                        for ($x = 1; $x <= count($post_ecommerce['category_id']); $x++) {
                            foreach ($post_ecommerce as $key_ecommerce => $val_ecommerce) {
                                foreach ($val_ecommerce as $key => $val) {
                                    if ($key == $i && !empty($val)) {
                                        $ecommerce_data[$key_ecommerce] = $val;
                                        if (!empty($ecommerce_images)) {
                                            foreach ($ecommerce_images as $key_image => $val_image) {
                                                if ($key_image == $i) {
                                                    $ecommerce_data['images'] = $val_image;
                                                }
                                            }
                                        }
                                    }
                                }
                                if ($count == $j) {

                                    $ecommerce_data['updated_at'] = date("Y-m-d H:i:s");
                                    $ecommerce_data['user_id'] = $user_id;
                                    $ecommerce_result = $this->UserInputOrganicEcommerce->insert($ecommerce_data);
                                    $i++;
                                    $j = 1;
                                    $ecommerce_data = array();
                                } else {
                                    $j++;
                                }
                            }
                        }
                    }
                    $bank_details = $post['Bank'];
                    $bank_details['user_id'] = $user_id;
                    $result_bank = $this->UserBank->insert($bank_details);

                    if (!empty($post['Crop'])) {
                        $i = 0;
                        $j = 1;
                        $post_crop = array_filter(array_map('array_filter', $post['Crop']));
                        $count = count($post_crop);
                        for ($x = 1; $x <= count($post_crop['crop_id']); $x++) {
                            foreach ($post_crop as $key_crop => $val_crop) {
                                foreach ($val_crop as $key => $val) {
                                    if ($key == $i && !empty($val)) {
                                        $crop_details[$key_crop] = $val;
                                    }
                                }
                                if ($count == $j) {
                                    $crop_details['user_id'] = $user_id;
                                    $crop_details['user_type_id'] = $post['user_type_id'];
                                    $crop_details['date_sown'] = !empty($crop_details['date_sown']) ? date('Y-m-d', strtotime($crop_details['date_sown'])) : '';
                                    $crop_details['date_harvest'] = !empty($crop_details['date_harvest']) ? date('Y-m-d', strtotime($crop_details['date_harvest'])) : '';
                                    $crop_details['date_inspection'] = !empty($crop_details['date_inspection']) ? date('Y-m-d', strtotime($crop_details['date_inspection'])) : '';
                                    $result_crop = $this->UserCrop->insert($crop_details);
                                    $i++;
                                    $j = 1;
                                    $crop_details = array();
                                } else {
                                    $j++;
                                }
                            }
                        }
                    }
                    if (!empty($post['Soil'])) {
                        $i = 0;
                        $j = 1;
                        $post_soil = array_filter(array_map('array_filter', $post['Soil']));
                        $count = count($post_soil);
                        for ($x = 1; $x <= max(count($post_soil['element']), count($post_soil['percentage'])); $x++) {
                            foreach ($post_soil as $key_soil => $val_soil) {
                                foreach ($val_soil as $key => $val) {
                                    if ($key == $i && !empty($val)) {
                                        $soil_data[$key_soil] = $val;
                                    }
                                }
                                if ($count == $j) {
                                    $soil_data['user_id'] = $user_id;
                                    $soil_data['user_type_id'] = $post['user_type_id'];
                                    $soil_result = $this->UserSoil->insert($soil_data);
                                    $i++;
                                    $j = 1;
                                    $soil_data = array();
                                } else {
                                    $j++;
                                }
                            }
                        }
                    }
                    if (!empty($post['Micro'])) {
                        $i = 0;
                        $j = 1;
                        $post_micro = array_filter(array_map('array_filter', $post['Micro']));
                        $count = count($post_micro);
                        for ($x = 1; $x <= max(count($post_micro['element']), count($post_micro['percentage'])); $x++) {
                            foreach ($post_micro as $key_micro => $val_micro) {
                                foreach ($val_micro as $key => $val) {
                                    if ($key == $i && !empty($val)) {
                                        $micro_data[$key_micro] = $val;
                                    }
                                }
                                if ($count == $j) {
                                    $micro_data['user_id'] = $user_id;
                                    $micro_data['user_type_id'] = $post['user_type_id'];
                                    $micro_result = $this->UserMicroNutrient->insert($micro_data);
                                    $i++;
                                    $j = 1;
                                    $micro_data = array();
                                } else {
                                    $j++;
                                }
                            }
                        }
                    }
                    if( !empty($post['Input'] ) ) {
                        
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
                                    $inputData['user_id'] = $user_id;
                                    $inputData['user_type_id'] = $post['user_type_id'];
                                    $inputData['input_date'] = !empty( $inputData['input_date'] ) ? date('Y-m-d', strtotime($inputData['input_date'])) : '0000-00-00';
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
//                        $input_details['user_id'] = $user_id;
//                        $input_details['user_type_id'] = $post['user_type_id'];
//                        $input_details['input_date'] = !empty($input_details['input_date']) ? date('Y-m-d', strtotime($input_details['input_date'])) : '0000-00-00';
                        
                    }

                    $user_type_details = $this->UserType->getUserTypeById($post['user_type_id']);
                    $dataNotify = array(
                        'user_id' => $user_id,
                        'user_type_id' => $post['user_type_id'],
                        'notification_type' => REGISTRATION,
                        'notify_type' => NOTIFY_WEB,
                        'message' => 'New ' . $user_type_details['name'] . ' ' . $post['fullname'] . ' has been register',
                    );
                    
                    $this->Notifications->insert( $dataNotify );

                    $this->session->set_flashdata('Message', 'Registration Successfully. Please login to continue');
                    redirect('login');
                } else {
                    if (!empty($error)) {
                        $this->session->set_flashdata('Error', "File cannot be upload - " . $error);
                    } else if (!empty($errors)) {
                        $this->session->set_flashdata('Error', "File cannot be upload - " . $errors[0]);
                    } else {
                        $this->session->set_flashdata('Error', 'Something Went Wrong');
                    }
                    $this->frontendLayout($data);
                }
            } else {
                $result['success'] = false;
                $result['message'] = 'Error in validation';
                $result['errors'] = $this->form_validation->error_array();
            }
        } else {
            $result['success'] = false;
            $result['message'] = 'Please select User type';
        }
        
        $this->response( $result );
    }
    
    
    
    public function sendNotification_post(){
        
        $post = $this->input->post();
        
        $details['title'] = $post['title'];
        $details['description'] = $post['description'];
        $details['id'] = 1;
        $type = "Testing for Counsellor";
        $location_ids = 0;
        $fcmData = array(
                    'alert' => '',
                    'badge' =>1,
                    'title' => $details['title'],
                    'body' => strip_tags($details['description']),
                    'notification_type' => $type,
                    'id'=> $details['id'],
                    'image_path'=> !empty($details['image'])?$details['image']:'',
                    'location_ids'=>$location_ids
        );
        $registrationIds = array();
        $fcmList =  $this->PushNotificationDevices->getPushNotificationDevices(); 
        if(!empty($fcmList)){
            foreach($fcmList as $fcm){
                array_push($registrationIds,$fcm['token']);
            }
            $this->sendPushNotification($fcmData,$registrationIds);
            $result['success'] = true;
            $result['message'] = 'Notification has been send succcessfully.';
            
        }else{
            $result['success'] = false;
            $result['message'] = 'No FCM token present.';
        }
        $this->response($result);
    }
}
