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
//        $arrSession = UserSession();
//        if( false == $arrSession['success'] ) {
//            redirect( 'home', 'refresh' );
//        } else {
//            $this->arrUserSession = $arrSession['userData'];
//        }
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
        
        $data['arrUserTypeList'] = $this->UserType->getUserTypes();
        
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
                $arrPost = $this->input->post();
                $result = $this->Login->getUserByEmailIdPassword($arrPost);
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

    public function view() {
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
            $arrPost = $this->input->post();
            $arrDetails = $arrPost;
            $arrDetails['updated_at'] = date('Y-m-d H:i:s');
            $result = $this->User->update($arrDetails);
            if ($result) {
                if($arrPost['is_verified'] == 2){
                    $verified = "Approve user";
                }else{
                    $verified = "Reject user";
                }
                if($arrUserSession['username'] != ADMINUSERNAME && $arrUserSession['user_type_id'] == 16){
                    $certification_agency_details = $this->CertificationAgency->getCertificationAgencyById($arrUserSession['user_id']);
                    $data_notify = array(
                                        'user_id' => $arrPost['user_id'],
                                        'certification_agency_id' => $arrUserSession['user_id'],
                                        'user_type_id' => $certification_agency_details['user_type_id'],
                                        'notification_type' => VERIFY_REGISTRATION,
                                        'notify_type' => NOTIFY_WEB,
                                        'message' => 'Certification Agency '.$verified .' '.$arrPost['fullname'],
                                    );
                    $result_notification = $this->Notifications->insert($data_notify);
                }else{

                    $user_type_details = $this->UserType->getUserTypeById($arrPost['user_type_id']);
                    $data_notify = array(
                                        'user_id' => $arrPost['user_id'],
                                        'user_type_id' => $arrPost['user_type_id'],
                                        'notification_type' => VERIFY_REGISTRATION,
                                        'notify_type' => NOTIFY_WEB,
                                        'message' => 'Admin '.$verified.' '.$arrPost['fullname'],
                                    );
                    $result_notification = $this->Notifications->insert($data_notify);
                }
                $this->session->set_flashdata('Message', 'User '.$arrPost['fullname'].' has been updated Succesfully');
                return redirect('admin/user', 'refresh');
            } else {
                $this->session->set_flashdata('Error', 'Failed to update product');
                $arrUserDetails = $this->User->getUserById($arrPost['user_id']);
                $partnerUserTypeDetails = $this->UserType->getUserTypeById( $arrUserDetails['partner_type_id'] );
                $partnerUserDetails = $this->User->getUserById( $arrUserDetails['partner_user_id'] );
                $user_crop_details = $this->UserCrop->getUserCropsByUserId($arrPost['user_id']);
                $user_soil_details = $this->UserSoil->getUserSoilByUserId($arrPost['user_id']);
                $user_micro_details = $this->UserMicroNutrient->getUserMicroNutrientByUserId($arrPost['user_id']);
                $user_input_details = $this->UserInputOrganic->getUserInputOrganicByUserId($arrPost['user_id']);
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
            $user_crop_details = $this->UserCrop->getUserCropsByUserId($arrGet['id']);
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
    
    public function add() {
        
        $arrGet = $this->input->get();
        $arrSession = UserSession();
        if( false == $arrSession['success'] ) {
            redirect( 'home', 'refresh' );
        } else {
            $arrUserSession = $arrSession['userData'];
        }
        $intUserTypeId = $arrGet['user_type_id'];
        $arrData['arrUserSession'] = $arrUserSession;
        $arrData['intUserTypeId'] = $intUserTypeId;
        $arrData['arrUserTypeList'] = $this->UserType->getUserTypes();
        $arrUserTypeDetails = $this->UserType->getUserTypeById( $intUserTypeId );
        $arrData['arrUserTypeDetails'] = $arrUserTypeDetails;
        $arrData['arrCountriesList'] = $this->Country->getCountries();
        $arrData['arrAgenciesList'] = $this->Agency->getAgencies();
        $arrData['arrCertitificationAgenicesList'] = $this->CertificationAgency->getCertificationAgenciesVerified();
        $arrData['arrProductList'] = $this->Product->getActiveProducts();
        $arrData['arrData'] = $arrData;
        
        $arrData['backend'] = true;
        $arrData['strTitle'] = 'Add User';
        $arrData['title'] = 'Add User';
        $arrData['strHeading'] = 'Add User';
        $arrData['view'] = 'user/registration/form-details';
        
        if( $this->input->post() ) {
            $arrPost = $this->input->post();
            if( true == isset( $arrPost['user_type_id'] ) && FPO == $arrPost['user_type_id'] ) {
                $strFullnameTitle = 'FPO Name';
            } else {
                $strFullnameTitle = 'Fullname';
            }
            $this->form_validation->set_rules( 'partner_type_id', 'Partner Type', 'trim' );
            $this->form_validation->set_rules( 'partner_user_id', 'Partner Name', 'trim' );
            $this->form_validation->set_rules( 'user_type_id', 'User Type', 'trim|required' );
            $this->form_validation->set_rules( 'fullname', $strFullnameTitle, 'trim|required' );
            $this->form_validation->set_rules( 'username', 'Username', 'trim|required|is_unique[tbl_users.username]' );
            $this->form_validation->set_message( 'is_unique', 'The Username already exists.' );
            $this->form_validation->set_rules( 'email_id', 'Email Id', 'trim|required' );
            $this->form_validation->set_rules( 'password', 'Password', 'trim|required|min_length[5]|matches[confirm_password]' );
            $this->form_validation->set_rules( 'confirm_password', 'Confirm Password', 'trim|required|min_length[5]' );
            $this->form_validation->set_rules( 'mobile_no', 'Mobile number', 'trim|required|numeric|exact_length[10]' );

            if( empty( $_FILES['profile_image']['name'] ) ) {
                $this->form_validation->set_rules( 'profile_image', 'Profile Image', 'trim|required' );
            }
            $this->form_validation->set_rules( 'country_id', 'Country', 'trim|required' );
            $this->form_validation->set_rules( 'state_id', 'State', 'trim|required' );
            $this->form_validation->set_rules( 'city_id', 'City', 'trim|required' );
            $this->form_validation->set_rules( 'address', 'Address', 'trim|required' );
            /* if ($arrPost['user_type_id'] != 2) {
              $this->form_validation->set_rules('aadhar_number', 'Aadhar Number', 'trim|required|numeric|exact_length[12]');
              } */
            if( true == isset( $arrPost['user_type_id'] ) && ( $arrPost['user_type_id'] == 1 || $arrPost['user_type_id'] == 2 || $arrPost['user_type_id'] == 3 || $arrPost['user_type_id'] == 4 || $arrPost['user_type_id'] == 5 ) ) {
                $this->form_validation->set_rules('certification_id[]', 'Certification', 'required');
                //$this->form_validation->set_rules('certification_number', 'Certification Number', 'trim');
                $this->form_validation->set_rules('agency_id', 'Certification Agency', 'trim|required');
            }
            
            $this->form_validation->set_rules( 'Bank[bank_name]', 'Bank Name', 'trim' );
            $this->form_validation->set_rules( 'Bank[account_holder_name]', 'Account Holder Name', 'trim' );
            $this->form_validation->set_rules( 'Bank[account_no]', 'Account Number', 'trim' );
            $this->form_validation->set_rules( 'Bank[ifsc_code]', 'Ifsc Code', 'trim' );

            
            if( true == $this->form_validation->run() ) {
                $arrDetails = $arrPost;
                $arrError = array();
                if( !empty( $_FILES['video']['name'] ) ) {
                    $arrConfigVideo['upload_path'] = './assets/images/gallery/';
                    $arrConfigVideo['allowed_types'] = '*';
                    $arrConfigVideo['max_size'] = 102400;
                    $this->load->library( 'upload', $arrConfigVideo );
                    if( $this->upload->do_upload( 'video' ) ) {
                        $arrUploadData = $this->upload->data();
                        $strVideo = $arrUploadData['file_name'];
                    } else {
                        $arrError[] = $this->upload->display_errors();
                        $strVideo = '';
                    }
                } else {
                    $strVideo = '';
                }
                
                if( !empty( $_FILES['resume']['name'] ) ) {
                    $arrConfigResume['upload_path'] = './assets/images/gallery/';
                    $arrConfigResume['allowed_types'] = 'docx|pdf|csv|xls|xlsx';
                    $arrConfigResume['max_size'] = 102400;

                    $this->load->library( 'upload', $arrConfigResume );
                    if($this->upload->do_upload( 'resume' ) ) {
                        $arrUploadData = $this->upload->data();
                        $strResume = $arrUploadData['file_name'];
                    } else {
                        $arrError[] = $this->upload->display_errors();
                        $strResume = '';
                    }
                } else {
                    $strResume = '';
                }
                
                if( !empty( $_FILES['product_catalogue']['name'] ) ) {
                    $arrConfigCatalogue['upload_path'] = './assets/images/gallery/';
                    $arrConfigCatalogue['allowed_types'] = 'docx|pdf|csv|xls|xlsx';
                    $arrConfigCatalogue['max_size'] = 102400;

                    $this->load->library( 'upload', $arrConfigCatalogue );
                    if( $this->upload->do_upload( 'product_catalogue' ) ) {
                        $arrUploadData = $this->upload->data();
                        $strProductCatalogue = $arrUploadData['file_name'];
                    } else {
                        $arrError[] = $this->upload->display_errors();
                        $strProductCatalogue = '';
                    }
                } else {
                    $strProductCatalogue = '';
                }
                
                if( !empty( $_FILES['profile_image']['name'] ) ) {
                    $arrConfigProfileImage['upload_path'] = './assets/images/gallery/';
                    $arrConfigProfileImage['allowed_types'] = 'gif|jpg|png|jpeg';
                    $arrConfigProfileImage['max_size'] = 2048;

                    $this->load->library( 'upload', $arrConfigProfileImage );
                    if( $this->upload->do_upload( 'profile_image' ) ) {
                        $arrUploadData = $this->upload->data();
                        $strProfileImage = $arrUploadData['file_name'];
                    } else {
                        $arrError[] = $this->upload->display_errors();
                        $strProfileImage = '';
                    }
                } else {
                    $strProfileImage = '';
                }
                
                if( !empty( $_FILES['certification_image']['name'] ) ) {
                    $arrConfigProfileImage['upload_path'] = './assets/images/gallery/';
                    $arrConfigCertificationImage['allowed_types'] = 'gif|jpg|png|jpeg';
                    $arrConfigCertificationImage['max_size'] = 2048;

                    $this->load->library('upload', $arrConfigCertificationImage);
                    if ($this->upload->do_upload('certification_image')) {
                        $arrUploadData = $this->upload->data();
                        $strCertificationImage = $arrUploadData['file_name'];
                    } else {
                        $arrError[] = $this->upload->display_errors();
                        $strCertificationImage = '';
                    }
                } else {
                    $strCertificationImage = '';
                }

                if( !empty( $_FILES['company_image']['name'] ) ) {
                    $arrConfigCompanyImage['upload_path'] = './assets/images/gallery/';
                    $arrConfigCompanyImage['allowed_types'] = 'gif|jpg|png|jpeg';
                    $arrConfigCompanyImage['max_size'] = 2048;
                    
                    $this->load->library( 'upload', $arrConfigCompanyImage );
                    if( $this->upload->do_upload( 'company_image' ) ) {
                        $arrUploadData = $this->upload->data();
                        $strCompanyImage = $arrUploadData['file_name'];
                    } else {
                        $arrError[] = $this->upload->display_errors();
                        $strCompanyImage = '';
                    }
                } else {
                    $strCompanyImage = '';
                }

                if( false == isArrVal( $arrError ) ) {
                    unset($arrDetails['confirm_password']);
                    unset($arrDetails['Bank']);
                    unset($arrDetails['certification_id']);
                    
                    $arrDetails['landline_no'] = ( false == isStrVal( $arrDetails['landline_no'] ) ) ? $arrDetails['landline_no'] : 0;
                    $arrDetails['password'] = md5($arrDetails['password']);
                    $arrDetails['profile_image'] = $strProfileImage;
                    $arrDetails['company_image'] = $strCompanyImage;
                    $arrDetails['certification_image'] = $strCertificationImage;
                    $arrDetails['video'] = $strVideo;
                    $arrDetails['product_catalogue'] = $strProductCatalogue;
                    $arrDetails['resume'] = $strResume;
                    $arrDetails['status'] = ENABLED;
                    $arrDetails['is_deleted'] = 0;
                    $arrDetails['is_verified'] = 1;
                    
                    $intUserId = $this->User->insert( $arrDetails );
                    if( true == isArrVal( $arrPost['certification_id'] ) ) {
                        foreach( $arrPost['certification_id'] as $intCertificationId ) {
                            $arrUserCertificationData = array(
                                                            'user_id' => $intUserId,
                                                            'certification_id' => $intCertificationId
                                                        );
                            $arrmixUserCertificationData[] = $arrUserCertificationData;
                            $arrUserCertificationData = array();
                        }
                        if( true == isArrVal( $arrmixUserCertificationData ) ) {
                            $this->UserCertifications->insertBatch($arrmixUserCertificationData);
                        }
                    }

                    if( true == isArrVal( $arrPost['Bank'] ) ) {
                        $arrBankInsertDetails = $arrPost['Bank'];
                        $arrBankInsertDetails['user_id'] = $intUserId;
                        $this->UserBank->insert( $arrBankInsertDetails );
                    }

                    $arrUserTypeDetails = $this->UserType->getUserTypeById($arrPost['user_type_id']);
                    
                    $arrNotifyInsertDetails = array(
                        'user_id' => $intUserId,
                        'user_type_id' => $arrPost['user_type_id'],
                        'notification_type' => REGISTRATION,
                        'notify_type' => NOTIFY_WEB,
                        'message' => 'New ' . $arrUserTypeDetails['name'] . ' ' . $arrPost['fullname'] . ' has been register',
                    );

                    $this->Notifications->insert( $arrNotifyInsertDetails );

                    $this->session->set_flashdata( 'Message', 'Registration Successfully. Please login to continue' );
                    redirect( 'admin/user/user-list', 'refresh' );
                } else {
                    if( true == isArrVal( $arrError ) ) {
                        $this->session->set_flashdata( 'Error', "File cannot be upload - " . implode( ",", $arrError ) );
                        $arrData['strValidationErrorMessage'] = "File cannot be upload - " . implode( ",", $arrError );
                    } else {
                        $this->session->set_flashdata( 'Error', 'Something Went Wrong' );
                    }
                    $this->backendLayout( $arrData );
                }
            } else {
               $this->backendLayout( $arrData );
            }
        } else {
            $this->backendLayout( $arrData );
        }
    }

    public function updateProfile() {
        $arrGet = $this->input->get();
        $session = UserSession();
        $arrUserSession = $session['userData'];
        if($this->input->post()){
            $arrPost = $this->input->post();

            if($arrPost['user_type_id'] == 2){
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
                if( !empty( $arrPost['password'] ) ) {
                    $this->form_validation->set_rules('password', 'Password', 'trim|min_length[5]|matches[confirm_password]');
                    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[5]');
                }
            }

            if($arrPost['user_type_id'] != 2 ){
                $this->form_validation->set_rules('aadhar_number', 'Aadhar Number', 'trim|numeric|exact_length[12]');
            }
            $this->form_validation->set_rules('landline_no', 'Landline Number', 'trim');
            $this->form_validation->set_rules('website', 'Website', 'trim');

            if($arrPost['user_type_id'] == 1 || $arrPost['user_type_id'] == 2 || $arrPost['user_type_id'] == 3 || $arrPost['user_type_id'] == 4){
                $this->form_validation->set_rules('is_visit_farm', 'Visit Farm', 'trim');
            }
            if($arrPost['user_type_id'] == 1 || $arrPost['user_type_id'] == 2 ){
                $this->form_validation->set_rules('pancard_number', 'Pan Card Number', 'trim');
            }else{
                $this->form_validation->set_rules('gst_number', 'GST Number', 'trim');
            }
            if($arrPost['user_type_id'] != 1 && $arrPost['user_type_id'] != 6 ){
                $this->form_validation->set_rules('ceo_name', 'CEO Name', 'trim');
            }
            if($arrPost['user_type_id'] != 1 && $arrPost['user_type_id'] != 2 && $arrPost['user_type_id'] != 3 && $arrPost['user_type_id'] != 4 && $arrPost['user_type_id'] != 5 && $arrPost['user_type_id'] != 6){
                $this->form_validation->set_rules('organization_name', 'Organization Name', 'trim|required');
            }
            if($arrPost['user_type_id'] == 2){
                $this->form_validation->set_rules('total_farmer', 'Number of Farmer', 'trim');
            }
            if($arrPost['user_type_id'] == 5){
                $this->form_validation->set_rules('type_of_buyer', 'Type of Buyer', 'trim');
            }
            if($arrPost['user_type_id'] == 1 || $arrPost['user_type_id'] == 2 || $arrPost['user_type_id'] == 3 || $arrPost['user_type_id'] == 4 || $arrPost['user_type_id'] == 5){
                $this->form_validation->set_rules('certification_id[]', 'Certification', 'trim');
                $this->form_validation->set_rules('certification_number', 'Certification Number', 'trim');
                $this->form_validation->set_rules('agency_id', 'Certification Agency', 'trim|required');
                $this->form_validation->set_rules('is_test_report', 'Test Report', 'trim');
            }
            $this->form_validation->set_rules('Bank[bank_name]', 'Bank Name', 'trim');
            $this->form_validation->set_rules('Bank[account_holder_name]', 'Account Holder Name', 'trim');
            $this->form_validation->set_rules('Bank[account_no]', 'Account Number', 'trim');
            $this->form_validation->set_rules('Bank[ifsc_code]', 'Ifsc Code', 'trim');
            if($this->form_validation->run() == TRUE){
                $arrDetails = $arrPost;
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
                    $video = !empty($arrPost['video_hidden'])?$arrPost['video_hidden']:'';
                    $error = '';
                }
                if(!empty($_FILES['resume']['name'])){
                    $config_resume['upload_path']          = './assets/images/gallery/';
                    $config_resume['allowed_types']        = 'docx|pdf|csv|xls|xlsx';
                    $config_resume['max_size']             = 102400;

                    $this->load->library('upload', $config_resume);
                    if($this->upload->do_upload('resume')){
                        $uploadData = $this->upload->data();
                        $strResume = $uploadData['file_name'];
                        $error = '';
                    }else{
                        $error = $this->upload->display_errors();
                        $strResume = '';
                    }
                }else{
                    $strResume = !empty($arrPost['resume_hidden'])?$arrPost['resume_hidden']:'';
                    $error = '';
                }
                if(!empty($_FILES['product_catalogue']['name'])){
                    $config_catalogue['upload_path']          = './assets/images/gallery/';
                    $config_catalogue['allowed_types']        = 'docx|pdf|csv|xls|xlsx';
                    $config_catalogue['max_size']             = 102400;

                    $this->load->library('upload', $config_catalogue);
                    if($this->upload->do_upload('product_catalogue')){
                        $uploadData = $this->upload->data();
                        $strProductCatalogue = $uploadData['file_name'];
                        $error = '';
                    }else{
                        $error = $this->upload->display_errors();
                        $strProductCatalogue = '';
                    }
                }else{
                    $strProductCatalogue = !empty($arrPost['product_catalogue_hidden'])?$arrPost['product_catalogue_hidden']:'';
                    $error = '';
                }
                if(!empty($_FILES['profile_image']['name'])){
                    $config['upload_path']          = './assets/images/gallery/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['max_size']             = 2048;

                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('profile_image')){
                        $uploadData = $this->upload->data();
                        $strProfileImage = $uploadData['file_name'];
                        $error = '';
                    }else{
                        $error = $this->upload->display_errors();
                        $strProfileImage = '';
                    }
                }else{
                    $strProfileImage = !empty($arrPost['profile_image_hidden'])?$arrPost['profile_image_hidden']:'';
                    $error = '';
                }
                if(!empty($_FILES['certification_image']['name'])){
                    $config1['upload_path']          = './assets/images/gallery/';
                    $config1['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config1['max_size']             = 2048;

                    $this->load->library('upload', $config1);
                    if($this->upload->do_upload('certification_image')){
                        $uploadData = $this->upload->data();
                        $strCertificationImage = $uploadData['file_name'];
                        $error = '';
                    }else{
                        $error = $this->upload->display_errors();
                        $strCertificationImage = '';
                    }
                }else{
                    $strCertificationImage = !empty($arrPost['certification_image_hidden'])?$arrPost['certification_image_hidden']:'';
                    $error = '';
                }
                if(!empty($_FILES['company_image']['name'])){
                    $config_company['upload_path']          = './assets/images/gallery/';
                    $config_company['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config_company['max_size']             = 2048;
                    $this->load->library('upload', $config_company);
                    if($this->upload->do_upload('company_image')){
                        $uploadData = $this->upload->data();
                        $strCompanyImage = $uploadData['file_name'];
                        $error = '';
                    }else{
                        $error = $this->upload->display_errors();
                        $strCompanyImage = '';
                    }
                }else{
                    $strCompanyImage = !empty($arrPost['company_image_hidden'])?$arrPost['company_image_hidden']:'';
                    $error = '';
                }

                if(empty($error)){
                    $intUserId = $arrPost['user_id'];
                    unset($arrDetails['city_id_hidden']);
                    unset($arrDetails['profile_image_hidden']);
                    unset($arrDetails['certification_image_hidden']);
                    unset($arrDetails['company_image_hidden']);
                    unset($arrDetails['resume_hidden']);
                    unset($arrDetails['video_hidden']);
                    unset($arrDetails['product_catalogue_hidden']);
                    unset($arrDetails['Bank']);
                    unset($arrDetails['confirm_password']);
                    if( !empty( $arrDetails['password'] ) ) {
                        $arrDetails['password'] = md5($arrDetails['password']);
                    } else {
                        unset($arrDetails['password']);
                    }
                    $arrDetails['landline_no'] = !empty($arrDetails['landline_no'])?$arrDetails['landline_no']:0;
                    $arrDetails['profile_image'] = $strProfileImage;
                    $arrDetails['company_image'] = $strCompanyImage;
                    $arrDetails['certification_image'] = $strCertificationImage;
                    $arrDetails['video'] = $video;
                    $arrDetails['product_catalogue'] = $strProductCatalogue;
                    $arrDetails['resume'] = $strResume;
                    $arrDetails['updated_at'] = CURRENT_DATETIME;
                    $this->User->update($arrDetails);
                    
                    if( true == isArrVal( $arrPost['certification_id'] ) ) {
                        foreach( $arrPost['certification_id'] as $intCertificationId ) {
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
                    $arrBankDetails = $arrPost['Bank'];
                    $arrBankDetails['user_id'] = $arrPost['user_id'];
                    $this->UserBank->updateByUserId( $arrBankDetails );
                    
                    if( $arrUserSession['username'] == ADMINUSERNAME ) {
                        $this->session->set_flashdata('Message', $arrDetails['fullname']. ' profile has been updated successfully.');
                        redirect('admin/user/user-list');
                    }else{
                        $this->session->set_flashdata('Message', 'Profile has been updated successfully.');
                        redirect('admin/user/update-profile?id='.$arrPost['user_id'].'&user_type_id='.$arrPost['user_type_id']);
                    }
                }else{
                    if(!empty($error)){
                        $this->session->set_flashdata('Error',"File cannot be upload - ".$error);
                    }else if(!empty($errors)){
                        $this->session->set_flashdata('Error', "File cannot be upload - ".$errors[0]);
                    }else{
                        $this->session->set_flashdata('Error','Something Went Wrong');
                    }
                    $data_return = $this->profileData($arrPost['user_id'],$arrPost['user_type_id'],$arrUserSession);
                    $this->backendLayout($data_return);
                }
            }else{
                $data_return = $this->profileData($arrPost['user_id'],$arrPost['user_type_id'],$arrUserSession);
                $this->backendLayout($data_return);
            }
        }else{
            $data_return = $this->profileData( $arrGet['id'],$arrGet['user_type_id'],$arrUserSession );
            $this->backendLayout($data_return);
        }
    }

    public function profileData( $intUserId, $intUserTypeId, $arrUserSession ) {
        $arrUserDetails = $this->User->getUserById($intUserId);
        
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
        $data['user_bank_details'] = $user_bank_details;
        $data['user_type_details'] = $user_type_details;
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
                $arrPost = $this->input->post();
                $arrDetails = $arrPost;
                unset($arrDetails['confirm_password']);
                $arrDetails['password'] = md5($arrPost['password']);
                $arrDetails['user_id'] = $arrUserSession['user_id'];
                if($arrUserSession['user_type_id'] == 16){
                    $result = $this->CertificationAgency->update($arrDetails);
                }else{
                    $result = $this->User->update($arrDetails);
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
        $arrPost = $this->input->post();
        $result = $this->User->delete($arrPost['user_id']);
        if($result){
            echo true;
        }else{
            echo false;
        }
   }
   
    public function fetchRegistrationUserTypeDetails() {
        $arrPost = $this->input->post();
        $arrUserTypeDetails = $this->UserType->getUserTypeById( $arrPost['user_type_id'] );
        $arrData['arrUserTypeDetails'] = $arrUserTypeDetails;
        $arrData['arrCountriesList'] = $this->Country->getCountries();
        $arrData['arrAgenciesList'] = $this->Agency->getAgencies();
        $arrData['arrCertitificationAgenicesList'] = $this->CertificationAgency->getCertificationAgenciesVerified();
        $arrData['arrProductList'] = $this->Product->getActiveProducts(); 
    }
}
