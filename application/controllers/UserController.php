<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UserController extends MY_Controller {

    function __construct() {
        parent::__construct();
        //$this->load->model('farmer_model');
    }

    public function index() {
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

    public function signup() {
        $userSession = $this->session->userdata('user_data');
        if (!empty($userSession)) {
            redirect('home');
        }
        $data['title'] = 'Registration';
        $data['heading'] = 'Register With Us';
        $data['hide_footer'] = true;
        $data['view'] = 'user/register';
        $data['homeSlider'] = true;
        $data['farmer_product_list'] = $this->Product->getFarmerProduct();
        $data['user_type_list'] = $this->UserType->getUserTypes();
        $data['state_list'] = $this->State->getStates();
        $data['userSession'] = $userSession;
        $this->frontendLayoutHome($data);
        //$this->frontendFooterLayout($data);
    }

    public function registration() {
        $userSession = $this->session->userdata('user_data');
        if (!empty($userSession)) {
            redirect('home');
        }
        $get = $this->input->get();
        $user_type_details = $this->UserType->getUserTypeById($get['id']);
        $data['user_type_details'] = $user_type_details;
        $data['userTypeList'] = $this->UserType->getUserTypes();
        $data['state_list'] = $this->State->getStates();
        $data['agencies_list'] = $this->Agency->getAgencies();
        $data['certification_agencies_list'] = $this->CertificationAgency->getCertificationAgenciesVerified();
        $data['product_list'] = $this->Product->getActiveProducts();
        $data['crop_list'] = $this->Crop->getActiveCrops();
        $data['title'] = $user_type_details['name'] . ' Registration';
        $data['heading'] = $user_type_details['name'] . ' Register Form';
        $data['hide_footer'] = true;
        $data['view'] = 'user/registration_form';
        $data['userSession'] = $userSession;
        if ($this->input->post()) {
            $post = $this->input->post();
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
            /* if ($post['user_type_id'] != 2) {
              $this->form_validation->set_rules('aadhar_number', 'Aadhar Number', 'trim|required|numeric|exact_length[12]');
              } */

            /* $this->form_validation->set_rules('landline_no', 'Landline Number', 'trim');
              $this->form_validation->set_rules('website', 'Website', 'trim'); */

            if ($post['user_type_id'] == 1 || $post['user_type_id'] == 2 || $post['user_type_id'] == 3 || $post['user_type_id'] == 4) {
                //$this->form_validation->set_rules('is_visit_farm', 'Visit Farm', 'trim|required');
            }

            if ($post['user_type_id'] == 1 || $post['user_type_id'] == 2) {
                $this->form_validation->set_rules('pancard_number', 'Pan Card Number', 'trim');
            } else {
                $this->form_validation->set_rules('gst_number', 'GST Number', 'trim');
            }
            if ($post['user_type_id'] != 1 && $post['user_type_id'] != 6) {
                $this->form_validation->set_rules('ceo_name', 'CEO Name', 'trim');
            }
            if ($post['user_type_id'] != 1 && $post['user_type_id'] != 2 && $post['user_type_id'] != 3 && $post['user_type_id'] != 4 && $post['user_type_id'] != 5 && $post['user_type_id'] != 6) {
                $this->form_validation->set_rules('organization_name', 'Organization Name', 'trim');
            }
            if ($post['user_type_id'] == 2) {
                $this->form_validation->set_rules('total_farmer', 'Number of Farmer', 'trim');
            }
            if ($post['user_type_id'] == 5) {
                $this->form_validation->set_rules('type_of_buyer', 'Type of Buyer', 'trim');
            }

            if ($post['user_type_id'] == 1 || $post['user_type_id'] == 2 || $post['user_type_id'] == 3 || $post['user_type_id'] == 4 || $post['user_type_id'] == 5) {
                $this->form_validation->set_rules('certification_id[]', 'Certification', 'required');
                //$this->form_validation->set_rules('certification_number', 'Certification Number', 'trim');
                $this->form_validation->set_rules('agency_id', 'Certification Agency', 'trim|required');
                //$this->form_validation->set_rules('is_test_report', 'Test Report', 'trim|required');
                /* $this->form_validation->set_rules('Product[product_id][]', 'Product Name', 'trim');
                  $this->form_validation->set_rules('Product[description][]', 'Description', 'trim');
                  $this->form_validation->set_rules('Product[from_date][]', 'From Date', 'trim');
                  $this->form_validation->set_rules('Product[to_date][]', 'To Date', 'trim');
                  $this->form_validation->set_rules('Product[quantity_id][]', 'Quantity', 'trim');
                  $this->form_validation->set_rules('Product[quality][]', 'Quality', 'trim');
                  $this->form_validation->set_rules('Product[price][]', 'Price', 'trim'); */
//                if(empty($_FILES['Product[images][]']['name'])){
//                    $this->form_validation->set_rules('Product[images][]', 'Images', 'trim');
//                }
            }
            /* $this->form_validation->set_rules('Bank[bank_name]', 'Bank Name', 'trim');
              $this->form_validation->set_rules('Bank[account_holder_name]', 'Account Holder Name', 'trim');
              $this->form_validation->set_rules('Bank[account_no]', 'Account Number', 'trim');
              $this->form_validation->set_rules('Bank[ifsc_code]', 'Ifsc Code', 'trim'); */

            if ($post['user_type_id'] == 1 || $post['user_type_id'] == 2) {
                /* $this->form_validation->set_rules('Crop[crop_id][]', 'Select Crop', 'trim');
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
                  $this->form_validation->set_rules('Input[other_details]', 'Other Details', 'trim'); */
            }

            if (7 == $post['user_type_id']) {
                /* $this->form_validation->set_rules('Ecommerce[category_id][]', 'Select Category', 'trim');
                  $this->form_validation->set_rules('Ecommerce[sub_category_id][]', 'Select SubCategory', 'trim');
                  $this->form_validation->set_rules('Ecommerce[brand][]', 'Brand', 'trim');
                  $this->form_validation->set_rules('Ecommerce[price][]', 'Price', 'trim');
                  if (empty($_FILES['ecommerce_images']['name'])) {
                  $this->form_validation->set_rules('ecommerce_images[]', 'Ecommerce Image', 'trim|required');
                  }
                  $this->form_validation->set_rules('Ecommerce[weight][]', 'Weight', 'trim'); */
            }

            if ($this->form_validation->run() == TRUE) {
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
                    //printDie($details);
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
                    unset($details['certification_id']);
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
                    if (!empty($post['certification_id'])) {
                        foreach ($post['certification_id'] as $intCertificationId) {
                            $arrUserCertificationData = array(
                                'user_id' => $user_id,
                                'certification_id' => $intCertificationId
                            );
                            $arrmixUserCertificationData[] = $arrUserCertificationData;
                            $arrUserCertificationData = array();
                        }
                        if (true == isArrVal($arrmixUserCertificationData)) {
                            $this->UserCertifications->insertBatch($arrmixUserCertificationData);
                        }
                    }

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
                                    if (!empty($product_data)) {
                                        $product_data['from_date'] = date("Y-m-d", strtotime(str_replace('/', '-', $product_data['from_date'])));
                                        $product_data['to_date'] = date("Y-m-d", strtotime(str_replace('/', '-', $product_data['to_date'])));
                                        $product_search_details = $this->Product->getProductById($product_data['product_id']);
                                        $product_data['name'] = $product_search_details['name'];
                                        $product_data['user_id'] = $user_id;
                                        $product_result = $this->UserProduct->insert($product_data);
                                        $i++;
                                        $j = 1;
                                        $product_data = array();
                                    }
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
                                    if (!empty($ecommerce_data)) {
                                        $ecommerce_data['updated_at'] = date("Y-m-d H:i:s");
                                        $ecommerce_data['user_id'] = $user_id;
                                        $ecommerce_result = $this->UserInputOrganicEcommerce->insert($ecommerce_data);
                                        $i++;
                                        $j = 1;
                                        $ecommerce_data = [];
                                    }
                                } else {
                                    $j++;
                                }
                            }
                        }
                    }
                    if (!empty($post['Bank'])) {
                        $bank_details = $post['Bank'];
                        $bank_details['user_id'] = $user_id;
                        $this->UserBank->insert($bank_details);
                    }

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
                                    if (!empty($crop_details)) {
                                        $crop_details['user_id'] = $user_id;
                                        $crop_details['user_type_id'] = $post['user_type_id'];
                                        $crop_details['date_sown'] = !empty($crop_details['date_sown']) ? date('Y-m-d', strtotime(str_replace('/', '-', $crop_details['date_sown']))) : '';
                                        $crop_details['date_harvest'] = !empty($crop_details['date_harvest']) ? date('Y-m-d', strtotime(str_replace('/', '-', $crop_details['date_harvest']))) : '';
                                        $crop_details['date_inspection'] = !empty($crop_details['date_inspection']) ? date('Y-m-d', strtotime(str_replace('/', '-', $crop_details['date_inspection']))) : '';
                                        $result_crop = $this->UserCrop->insert($crop_details);
                                        $i++;
                                        $j = 1;
                                        $crop_details = [];
                                    }
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
                                    if (!empty($soil_data)) {
                                        $soil_data['user_id'] = $user_id;
                                        $soil_data['user_type_id'] = $post['user_type_id'];
                                        $soil_result = $this->UserSoil->insert($soil_data);
                                        $i++;
                                        $j = 1;
                                        $soil_data = [];
                                    }
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
                                    if (!empty($micro_data)) {
                                        $micro_data['user_id'] = $user_id;
                                        $micro_data['user_type_id'] = $post['user_type_id'];
                                        $micro_result = $this->UserMicroNutrient->insert($micro_data);
                                        $i++;
                                        $j = 1;
                                        $micro_data = [];
                                    }
                                } else {
                                    $j++;
                                }
                            }
                        }
                    }
                    if (!empty($post['Input'])) {

                        $i = 0;
                        $j = 1;
                        $postInputOrganic = array_filter(array_map('array_filter', $post['Input']));
                        $count = count($postInputOrganic);
                        for ($x = 1; $x <= count($postInputOrganic['input_date']); $x++) {
                            foreach ($postInputOrganic as $keyInput => $valInput) {
                                foreach ($valInput as $key => $val) {
                                    if ($key == $i && !empty($val)) {
                                        $inputData[$keyInput] = $val;
                                    }
                                }
                                if ($count == $j) {
                                    if (!empty($inputData)) {
                                        $inputData['user_id'] = $user_id;
                                        $inputData['user_type_id'] = $post['user_type_id'];
                                        $inputData['input_date'] = !empty($inputData['input_date']) ? date('Y-m-d', strtotime(str_replace('/', '-', $inputData['input_date']))) : '0000-00-00';
                                        $this->UserInputOrganic->insert($inputData);
                                        $i++;
                                        $j = 1;
                                        $inputData = [];
                                    }
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

                    $this->Notifications->insert($dataNotify);

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
                $this->frontendLayout($data);
            }
        } else {
            $this->frontendLayout($data);
        }
    }

    public function registrationCertificationAgency() {
        $userSession = $this->session->userdata('user_data');
        if (!empty($userSession)) {
            redirect('home');
        }
        $get = $this->input->get();
        $user_type_details = $this->UserType->getUserTypeById($get['id']);
        $data['user_type_details'] = $user_type_details;
        $data['state_list'] = $this->State->getStates();
        $data['agencies_list'] = $this->CertificationAgency->getAgencies();
        $data['certification_agencies_list'] = $this->CertificationAgency->getCertificationAgencies();
        $data['title'] = $user_type_details['name'] . ' Registration';
        $data['heading'] = $user_type_details['name'] . ' Register Form';
        $data['hide_footer'] = true;
        $data['view'] = 'user/registration_certification_agency';
        $data['userSession'] = $userSession;
        if ($this->input->post()) {
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
            if ($this->form_validation->run() == TRUE) {
                $details = $post;
                unset($details['confirm_password']);
                $details['password'] = md5($details['password']);
                $details['mobile2'] = !empty($details['mobile2']) ? $details['mobile2'] : 0;
                $details['landline'] = !empty($details['landline']) ? $details['mobile2'] : 0;
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
                    'message' => 'New Certification Agency ' . $agency_details['name'] . ' has been register',
                );
                $result_notification = $this->Notifications->insert($data_notify);

                $this->session->set_flashdata('Message', 'Registration Successfully. Please login to continue');
                redirect('login');
            } else {
                $this->frontendLayout($data);
            }
        } else {
            $this->frontendLayout($data);
        }
    }

    public function searchPost() {
        $data['title'] = 'Search Post';
        $data['heading'] = 'Search Post';
        $data['hide_footer'] = true;
        $data['banner'] = "farmer.jpg";
        $data['view'] = 'post-requirement/search_post';
        $data['farmer_product_list'] = $this->Product->getFarmerProduct();
        $data['state_list'] = $this->State->getStates();
        $userSession = $this->session->userdata('user_data');
        $data['userSession'] = $userSession;
        if ($this->input->post()) {
            $post = $this->input->post();
            if ($this->form_validation->run('search-post-requirement-form') == TRUE) {
                $search_post_list = $this->PostRequirement->getPostBysearchKey($post);
                $data['search_post_list'] = $search_post_list;
                $this->frontendLayout($data);
            } else {
                $this->frontendLayout($data);
            }
        } else {
            $this->frontendLayout($data);
        }
    }

    public function searchUser() {
        $get = $this->input->get();
        $userSession = $this->session->userdata('user_data');
        $data['userSession'] = $userSession;
        $user_type_details = $this->UserType->getUserTypeById($get['id']);
        $data['user_type_details'] = $user_type_details;
        $data['state_list'] = $this->State->getStates();
        $data['organicSettingViewDetails'] = $this->OrganicSetting->getOrganicSettingByKey(SHOW_SEARCH_VIEW_DETAILS_KEY);
        $data['organicSettingViewEnquiry'] = $this->OrganicSetting->getOrganicSettingByKey(SHOW_SEARCH_VIEW_ENQUIRY_KEY);
        $data['product_list'] = $this->Product->getProducts();
        $data['title'] = 'Search ' . $user_type_details['name'];
        $data['heading'] = 'Search ' . $user_type_details['name'];
        $data['hide_footer'] = true;
        $data['view'] = 'user/search_user';
        if ($this->input->post()) {
            $post = $this->input->post();
            $data['search_brand'] = isset($post['search_brand']) ? $post['search_brand'] : '';
            if ($this->form_validation->run('search-user-form') == TRUE) {
                $arrDetails = $post;
                if (ORGANIC_INPUT == $arrDetails['user_type_id']) {
                    $arrmixUserSearchList = $this->User->getUserByUserTypeIdByStateIdByCityIdByEcommerceBrand($arrDetails);
                } else {
                    $arrmixUserSearchList = $this->User->getUserBysearchKey($post);
                }
                $data['search_user_list'] = $arrmixUserSearchList;
                $data['city_id_hidden'] = $arrDetails['city_id'];
                $this->frontendLayout($data);
            } else {
                $this->frontendLayout($data);
            }
        } else {
            $this->frontendLayout($data);
        }
    }

    public function viewUserDetails() {
        $get = $this->input->get();
        $arrmixUserDetails = $this->User->getUserById($get['user_id']);
        $arrAgencyDetails = $this->CertificationAgency->getAgencyById($arrmixUserDetails['agency_id']);
        $arrmixUserDetails['agency_name'] = !empty($arrAgencyDetails['name']) ? $arrAgencyDetails['name'] : 'NA';
        $arrCertificaionDetails = getCertifications();
        $arrmixUserDetails['certification_name'] = !empty($arrCertificaionDetails[$arrmixUserDetails['certification_id']]) ? $arrCertificaionDetails[$arrmixUserDetails['certification_id']] : 'NA';
        $arrStateDetails = $this->State->getStateById($arrmixUserDetails['state_id']);
        $arrmixUserDetails['state'] = $arrStateDetails['name'];
        $arrCityDetails = $this->City->getCityById($arrmixUserDetails['city_id']);
        $arrmixUserDetails['city'] = $arrCityDetails['name'];
        $arrUserTypeDetails = $this->UserType->getUserTypeById($arrmixUserDetails['user_type_id']);
        $arrmixUserDetails['user_type_name'] = $arrUserTypeDetails['name'];
        $data['user_details'] = $arrmixUserDetails;

        $data['title'] = $arrmixUserDetails['fullname'];
        $data['heading'] = '<b>' . $arrmixUserDetails['fullname'] . '</b>';
        $data['hide_footer'] = true;
        $data['view'] = 'user/view_user_details';
        $this->frontendLayout($data);
    }

    public function organicInputEcommerceDetails() {
        $get = $this->input->get();
        $userSession = $this->session->userdata('user_data');
        $data['userSession'] = $userSession;
        $organicInputEcommerceList = $this->UserInputOrganicEcommerce->getUsersInputOrganicEcommerceByUserId($get['user_id']);
        $userDetails = $this->User->getUserById($get['user_id']);
        $data['userDetails'] = $userDetails;
        $data['arrCategory'] = getEcommerceCategory();
        $data['arrSubCategory'] = getEcommerceSubCategory();
        $data['arrBrand'] = getEcommerceBrand();
        $data['organicInputEcommerceList'] = $organicInputEcommerceList;
        $data['title'] = 'Search organic input Ecommerce details ';
        $data['heading'] = 'Search organic input Ecommerce details ';
        $data['hide_footer'] = true;
        $data['view'] = 'user/view_input_organic_ecommerce';
        $this->frontendLayout($data);
    }

    public function searchCertificationAgency() {
        $get = $this->input->get();
        $userSession = $this->session->userdata('user_data');
        $data['userSession'] = $userSession;
        $user_type_details = $this->UserType->getUserTypeById($get['id']);
        $data['user_type_details'] = $user_type_details;
        $data['state_list'] = $this->State->getStates();
        $data['certification_agency_list'] = $this->CertificationAgency->getCertificationAgencies();
        $data['title'] = 'Search ' . $user_type_details['name'];
        $data['heading'] = 'Search ' . $user_type_details['name'];
        $data['hide_footer'] = true;
        $data['view'] = 'user/search_certification_agency';
        if ($this->input->post()) {
//            $post = $this->input->post();
//            if($this->form_validation->run('search-user-form') == TRUE){
//                $search_user_list = $this->User->getUserBysearchKey($post);
//                $data['search_user_list'] = $search_user_list;
//                $this->frontendLayout($data);
//            }else{
//                $this->frontendLayout($data);
//            }
            $this->frontendLayout($data);
        } else {
            $this->frontendLayout($data);
        }
    }

    public function getCitiesByState() {
        $post = $this->input->post();
        $cities = $this->City->getCitiesBystateId($post['state_id']);
        $intCityIdHidden = isVal($post['city_id_hidden']) ? $post['city_id_hidden'] : '';
        $html = array();
        if (!empty($cities)) {
            foreach ($cities as $value) {
                $strSelected = '';
                if ($intCityIdHidden == $value['id']) {
                    $strSelected = 'selected="selected"';
                }
                $data2 = ' <option value="' . $value['id'] . '" ' . set_select('city_id', $value['id']) . ' ' . $strSelected . ' > ' . $value['name'] . '</option>';
                $html[] = $data2;
            }
        }
        echo json_encode($html);
    }

    public function getUserById() {
        $post = $this->input->post();
        $user_details = $this->User->getUserById($post['user_id']);
        $agency_name = $this->CertificationAgency->getAgencyById($user_details['agency_id']);
        $user_details['agency_name'] = !empty($agency_name['name']) ? $agency_name['name'] : 'NA';
        $certificaion_name = getCertifications();
        $user_details['certification_name'] = !empty($certificaion_name[$user_details['certification_id']]) ? $certificaion_name[$user_details['certification_id']] : 'NA';
        $state = $this->State->getStateById($user_details['state_id']);
        $user_details['state'] = $state['name'];
        $city = $this->City->getCityById($user_details['city_id']);
        $user_details['city'] = $city['name'];
        $data['user_details'] = $user_details;
        //echo json_encode($user_details);
        echo $this->load->view('user/modal_user_view', $data);
    }

    public function fetchOrganicInputEcommerceDetails() {
        $post = $this->input->post();
        $userDetails = $this->User->getUserById($post['user_id']);
        $ecommerceDetails = $this->UserInputOrganicEcommerce->getUsersInputOrganicEcommerceById($post['id']);

        $arrCategory = getEcommerceCategory();
        $arrSubCategory = getEcommerceSubCategory();

        $ecommerceDetails['category_name'] = !empty($arrCategory) ? $arrCategory[$ecommerceDetails['category_id']] : 'NA';
        $ecommerceDetails['sub_category_name'] = !empty($arrSubCategory) ? $arrSubCategory[$ecommerceDetails['sub_category_id']] : 'NA';

        $data['userDetails'] = $userDetails;
        $data['ecommerceDetails'] = $ecommerceDetails;

        echo $this->load->view('user/modal_organic_input_ecommerce', $data);
    }

    public function filterFetchOrganicInputEcommerceDetails() {
        $post = $this->input->post();
        $brandId = '';
        $subCategoryId = '';
        if (!empty($post['brand_id'])) {
            $brandId = $post['brand_id'];
        }
        if (!empty($post['sub_category_id'])) {
            $subCategoryId = $post['sub_category_id'];
        }
        $organicInputEcommerceList = $this->UserInputOrganicEcommerce->getUsersInputOrganicEcommerceByUserIdBySubCategoryIdByBrandId($post['user_id'], $subCategoryId, $brandId);
        $userDetails = $this->User->getUserById($post['user_id']);
        $data['userDetails'] = $userDetails;
        $data['arrCategory'] = getEcommerceCategory();
        $data['arrSubCategory'] = getEcommerceSubCategory();
        $data['arrBrand'] = getEcommerceBrand();
        $data['organicInputEcommerceList'] = $organicInputEcommerceList;

        echo $this->load->view('user/filter_organic_input_ecommerce', $data);
    }

    public function getPostById() {
        $post = $this->input->post();
        $post_details = $this->PostRequirement->getPostRequirementById($post['post_id']);
        $post_details['product_details'] = $this->Product->getFarmerProductById($post_details['product_id']);
        echo json_encode($post_details);
    }

    public function getPartnerUserDetails() {
        $post = $this->input->post();
        $userDetails = $this->User->getUserByUserTypeId($post['partner_type_id']);

        if (!empty($post['partner_user_id_hidden'])) {
            $partnerUserIdHidden = $post['partner_user_id_hidden'];
        } else {
            $partnerUserIdHidden = '';
        }

        $html = array();
        if (!empty($userDetails)) {
            foreach ($userDetails as $value) {
                if (!empty($partnerUserIdHidden)) {
                    $selected = $partnerUserIdHidden == $value['user_id'] ? 'selected="selected"' : '';
                } else {
                    $selected = '';
                }
                $data2 = ' <option value="' . $value['user_id'] . '" ' . set_select('partner_user_id', $value['user_id']) . ' ' . $selected . ' > ' . $value['fullname'] . '</option>';
                $html[] = $data2;
            }
            $html[] = ' <option value="0" ' . set_select('partner_user_id', 0) . ' >NONE</option>';
        } else {
            $html[] = ' <option value="0" ' . set_select('partner_user_id', 0) . ' >NONE</option>';
        }
        echo json_encode($html);
    }

    public function searchEnquiry() {
        $post = $this->input->post();

        $details = $post;
        $details['updated_at'] = CURRENT_DATETIME;
        $result = $this->SearchEnquiry->insert($details);
        if ($result) {
            echo true;
        } else {
            echo false;
        }
    }

    public function fetchProductByCategoryId() {
        $post = $this->input->post();
        $arrProductList = $this->Product->getProductByCategoryId($post['category_id']);
        if (isset($post['hidden_product_id'])) {
            $intProductId = $post['hidden_product_id'];
        } else {
            $intProductId = '';
        }
        $html = array();
        if (!empty($arrProductList)) {
            foreach ($arrProductList as $arrProductDetails) {
                if (isVal($intProductId)) {
                    $selected = ( $intProductId == $arrProductDetails['id'] ) ? 'selected="selected"' : '';
                } else {
                    $selected = '';
                }
                $data2 = ' <option value="' . $arrProductDetails['id'] . '" ' . set_select('product_id', $arrProductDetails['id']) . ' ' . $selected . ' > ' . $arrProductDetails['name'] . '</option>';
                $html[] = $data2;
            }
        }
        echo json_encode($html);
    }

    public function checkoutCart() {
        $userSession = $this->session->userdata('user_data');
        $data['userSession'] = $userSession;
        $arrmixCartList = fetchCartDetails();
        $data['arrmixCartList'] = $arrmixCartList;
        $data['title'] = 'Checkout';
        $data['heading'] = 'Checkout';
        $data['hide_footer'] = true;
        $data['view'] = 'user/checkout';
        $this->frontendLayout($data);
    }

    public function addToCart() {
        $arrPost = $this->input->post();
        $intSellProductId = $arrPost['sell_product_id'];
	    $intProductId = $arrPost['product_id'];
        $intPrice = $arrPost['price'];
        $intQuantity = CART_QUANTITY;
        $strProductName = $arrPost['product_name'];

        $arrmixCartList = fetchCartDetails();
        $boolCart = true;
        if( true == isArrVal( $arrmixCartList['cart_list'] ) ) {
            foreach( $arrmixCartList['cart_list'] as $arrCartDetais ) {
                if( $arrCartDetais['id'] == $intProductId ){
                    $boolCart = false;
                }
            }
        }

        if( true == $boolCart ) {
            $arrCartData = array( 'id'          => $intProductId,
                                  'qty'         => $intQuantity,
                                  'price'       => $intPrice,
                                  'price'       => $intPrice,
                                  'name'        => $strProductName,
                                  'options'     => array('product_id'  => $intProductId,
	                                                     'sell_product_id' => $intSellProductId
	                                                    )
                            );
            if( true == $this->cart->insert( $arrCartData ) ) {
                $arrResult['success'] = true;
                $arrResult['message'] = 'Your product <b>' . $strProductName . '</b> has been added to cart';
            } else {
                $arrResult['success'] = false;
                $arrResult['message'] = 'Something went wrong. We cannot add product to cart.';
            }
        } else {
            $arrResult['success'] = false;
            $arrResult['message'] = 'Product <b>' . $strProductName . '</b>  has already added in cart.';
        }

        echo json_encode( $arrResult );
    }

    public function removeFromCart() {
        $arrPost = $this->input->post();
        $intRowId = $arrPost['rowid'];
        $intQuantity = 0;
        $strProductName = $arrPost['product_name'];

        $arrCartData = array(
                            'rowid' => $intRowId,
                            'qty'   => $intQuantity
                        );

        if( true == $this->cart->update( $arrCartData ) ) {
            $arrResult['success'] = true;
            $arrResult['message'] = 'Your product <b>' . $strProductName . '</b> has been removed from cart';
        } else {
            $arrResult['success'] = false;
            $arrResult['message'] = 'Something went wrong. We cannot remove product from cart.';
        }

        echo json_encode( $arrResult );
    }

    public function paynow() {
        $arrSession = UserSession();
        $arrUserSession = $arrSession['userData'];
        $arrmixCartList = fetchCartDetails();
        $data['arrStateList'] = $this->State->getStates();
        $data['arrUserDetails'] = $arrUserSession;
        $data['arrmixCartList'] = $arrmixCartList;
        $data['title'] = 'Paynow';
        $data['heading'] = 'Paynow';
        $data['hide_footer'] = true;
        $data['view'] = 'user/paynow';

        if( $this->input->post() ) {
            $arrPost = $this->input->post();
            if( true == $this->form_validation->run('paynow-form') ) {
                $arrmixData = $arrPost;
                $arrmixData['product_details'] = json_encode( $arrmixCartList['cart_list'] );
                $arrmixData['order_payment_status'] = ORDER_PAYMENT_STATUS_PENDING;
                $intCurrentInsertedOrderId = $this->Orders->insert( $arrmixData );
                $strOrderNo = 'ORDERNO00' . $intCurrentInsertedOrderId;
                $arrUpdateData = array( 'order_id' => $intCurrentInsertedOrderId,
                                        'order_no' => $strOrderNo
                                    );
                $this->Orders->update( $arrUpdateData );
                $arrUrl = paymentGatewayResponseUrl();

                $strTxnId = 'TXNID' . $arrPost['user_id'] . $arrPost['user_type_id'] . strtotime( CURRENT_DATETIME );
                $arrPaymentDetails = array( 'txnid'         => $strTxnId,
                                            'amount'        => sprintf("%.2f", $arrPost['total_amount']),
                                            'firstname'     => $arrPost['fullname'],
                                            'email'         => $arrPost['email_id'],
                                            'phone'         => $arrPost['mobile_no'],
                                            'productinfo'   => $strOrderNo,
                                            'surl'          => $arrUrl['surl'],
                                            'furl'          => $arrUrl['furl'],
                                            'udf1'          => $intCurrentInsertedOrderId,
                                            'udf2'          => '',
                                            'udf3'          => '',
                                            'udf4'          => '',
                                            'udf5'          => '',
                                            'address1'      => '',
                                            'address2'      => '',
                                            'city'          => '',
                                            'state'         => '',
                                            'country'       => '',
                                            'zipcode'       => $arrPost['pincode'],
                                    );
                $arrmixPaymentDetails['payment_details'] = $arrPaymentDetails;
                $arrmixPaymentDetails['api'] = INITIATE_PAYMENT;
                $arrmixPaymentDetails['order_details'] = $arrmixData;

                $this->paymentTransaction( $arrmixPaymentDetails );

                $this->frontendLayout($data);
            } else {
                $this->frontendLayout($data);
            }
        } else {
            $this->frontendLayout($data);
        }

    }

    public function paymentResponse() {

        $arrSession = UserSession();
        $arrUserSession = $arrSession['userData'];
        $arrPost = $this->input->post();
	    if( true == isArrVal( $arrPost ) ) {
	        $easebuzzObj = new Easebuzz( MERCHANT_KEY, SALT, paymentGatewayEnviroment() );
            $arrResult = $easebuzzObj->easebuzzResponse( $arrPost );
            $arrmixResult = json_decode( $arrResult );
	        if( isVal( $arrmixResult->status ) ) {
		        if( 'success' ==  $arrmixResult->data->status ) {
			        $arrOrderDetails = $this->Orders->getOrderByOrderId( $arrmixResult->data->udf1 );
			        $arrTransactionDetails = array(
				        'order_id'          => $arrmixResult->data->udf1,
				        'txnid'             => $arrmixResult->data->txnid,
				        'status'            => $arrmixResult->data->status,
				        'error'             => isset( $arrmixResult->data->error ) ? $arrmixResult->data->error : '',
				        'error_message'     => $arrmixResult->data->error_Message,
				        'easepayid'         => $arrmixResult->data->easepayid,
				        'payment_source'    => $arrmixResult->data->payment_source,
				        'net_amount_debit'  => $arrmixResult->data->net_amount_debit,
				        'added_on'          => $arrmixResult->data->addedon,
				        'total_amount'      => $arrmixResult->data->amount,
			        );
			        $this->Transaction->insert( $arrTransactionDetails );

			        /***
			         * To change the payment status in order table
			         ***/
			        $arrUpdateOrderData = array(
				        'order_payment_status' => ORDER_PAYMENT_STATUS_COMPLETED,
				        'order_id' => $arrmixResult->data->udf1
			        );
			        $this->Orders->update( $arrUpdateOrderData );

			        /***
			         * Destroy all the cart product
			         ***/
			        destroyCart();

			        /***
			         * To make the out of stock
			         ***/
			        $arrobjproductDetails = json_decode( $arrOrderDetails['product_details'] );
			        foreach( $arrobjproductDetails as $objProductDetails ) {
				        $arrSellProductData = array(
					        'sell_product_id' => $objProductDetails->options->sell_product_id,
					        'stock' => OUT_STOCK
				        );
				        $this->SellProduct->update( $arrSellProductData );
			        }

			        $data['boolStatus'] = true;
			        $data['strMessage'] = "Transaction has been done successfully.";
			        $data['intTranscationId'] = $arrmixResult->data->txnid;
			        $data['strOrderNo'] = $arrmixResult->data->productinfo;
			        $data['strAddedOn'] = $arrmixResult->data->addedon;
			        $data['arrOrderDetails'] = $arrOrderDetails;

			        $to = ADMINEMAILID;
			        $subject = "New Order has been placed";
			        $message = $this->load->view('Email/order_admin',$data,TRUE);
			        $this->sendEmail($to, $subject, $message);

			        $to = $arrOrderDetails['email_id'];
			        $subject = "Your order has been placed successfully";
			        $message = $this->load->view('Email/order_buyer',$data,TRUE);
			        $this->sendEmail($to, $subject, $message);
		        } else {
			        if( 'userCancelled' ==  $arrmixResult->data->status ) {
				        $arrUpdateOrderData = array(
					        'order_payment_status' => ORDER_PAYMENT_STATUS_USER_CANCELLED,
					        'order_id' => $arrmixResult->data->udf1
				        );
				        $this->Orders->update( $arrUpdateOrderData );

				        $data['boolStatus'] = false;
				        $data['strMessage'] = 'You have cancelled the transaction of amount ' . $arrmixResult->data->amount;
			        } else {
				        $data['boolStatus'] = false;
				        $data['strMessage'] = 'Something went wrong. Transaction has not proceed further. Please try again later.';
			        }
		        }

	        } else {
		        $data['boolStatus'] = false;
		        $data['strMessage'] = $arrmixResult->data->error_message;
	        }
	        $data['boolDirectCallPaymentResponse'] = false;
        }
	    $data['boolDirectCallPaymentResponse'] = true;
        $data['title'] = 'Payment Response';
        $data['heading'] = 'Payment Response';
        $data['hide_footer'] = true;
        $data['view'] = 'user/payment_response';

        $this->frontendLayout($data);

    }
}
