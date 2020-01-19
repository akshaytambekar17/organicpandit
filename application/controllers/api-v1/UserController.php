<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserController extends MY_Controller {
    
    function __construct() {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    }
    
    public function login(){
        $arrPost = $this->input->post();
	
        if( true == isset( $arrPost['user_type_id'] ) ) {
            
            if( true == isset( $arrPost['username'] ) && true == isset( $arrPost['password'] ) ) {

                $arrUserDetails = $this->User->getUserLoginByUsernameByPasswordByUserTypeId( $arrPost['username'], $arrPost['password'], $arrPost['user_type_id'] );
                if( true == isArrVal( $arrUserDetails ) ) {
                    $arrResult['success'] = true;
                    $arrResult['data'] = $arrUserDetails;
                } else{
                    $arrResult['success'] = false;
                    $arrResult['message'] = 'Invalid Username or Password or User Type.';   
                }
            } else{
                $arrResult['success'] = false;
                $arrResult['message'] = 'Plesae enter the username and password.';
            }  
        } else {
            $arrResult['success'] = false;
            $arrResult['message'] = 'Plesae select User Type.';
        }
        
        $this->response( $arrResult );
    }
    
    public function registration() {
        $arrPost = $this->input->post();
        
        $this->form_validation->set_rules( 'user_type_id', 'User Type', 'trim|required' );
        $this->form_validation->set_rules( 'fullname', 'Fullname', 'trim|required' );
        $this->form_validation->set_rules( 'email_id', 'Email Id', 'trim|required' );
        $this->form_validation->set_rules( 'mobile_no', 'Mobile number', 'trim|required|numeric|exact_length[10]' );
        $this->form_validation->set_rules( 'username', 'Username', 'trim|required|is_unique[tbl_users.username]' );
        $this->form_validation->set_message( 'is_unique', 'The Username already exists.' );
        $this->form_validation->set_rules( 'password', 'Password', 'trim|required|min_length[5]|matches[confirm_password]' );
        $this->form_validation->set_rules( 'confirm_password', 'Confirm Password', 'trim|required|min_length[5]' );
        $this->form_validation->set_rules( 'country_id', 'Country', 'trim|required' );
        $this->form_validation->set_rules( 'state_id', 'State', 'trim|required' );
        $this->form_validation->set_rules( 'city_id', 'City', 'trim|required' );
        $this->form_validation->set_rules( 'address', 'Address', 'trim|required' );
        $this->form_validation->set_rules( 'certification_id', 'Certification', 'trim|required' );
        $this->form_validation->set_rules( 'agency_id', 'Certification Agency', 'trim|required' );
        
        if ( true == $this->form_validation->run() ) { 
            $arrDetails = $arrPost;
            if( true == isset( $_FILES['profile_image']['name'] ) ) {
                $arrConfigProfileImage['upload_path'] = './assets/images/gallery/';
                $arrConfigProfileImage['allowed_types'] = 'gif|jpg|png|jpeg';
                $arrConfigProfileImage['max_size'] = 2048;

                $this->load->library( 'upload', $arrConfigProfileImage );
                if( $this->upload->do_upload( 'profile_image' ) ) {
                    $arrUploadData = $this->upload->data();
                    $strProfileImage = $arrUploadData['file_name'];
                    $strError = '';
                } else {
                    $strError = $this->upload->display_errors();
                    $strProfileImage = '';
                }
            } else {
                $strProfileImage = '';
                $strError = '';
            }
            if( false == isStrVal( $strError ) ) {
                
                unset( $arrDetails['confirm_password'] );
                unset( $arrDetails['certification_id'] );
                $arrDetails['profile_image'] = $strProfileImage;
                $arrDetails['status'] = ENABLED;
                
                $intUserId = $this->User->insert( $arrDetails );
                if( true == isIdVal( $intUserId ) ) {
                    $arrCeritificationIds = explode( ',', $arrPost['certification_id'] );
                    foreach( $arrCeritificationIds as $intCertificationId ) {
                        $arrUserCertificationData = [
                            'user_id' => $intUserId,
                            'certification_id' => $intCertificationId
                        ];
                        $arrmixUserCertificationData[] = $arrUserCertificationData;
                        $arrUserCertificationData = array();
                    }
                    
                    $this->UserCertifications->insertBatch( $arrmixUserCertificationData );
                    
                    $arrUserTypeDetails = $this->UserType->getUserTypeById( $arrPost['user_type_id'] );
                    $arrNotificationInsertData =  [
                        'user_id' => $intUserId,
                        'user_type_id' => $arrPost['user_type_id'],
                        'notification_type' => REGISTRATION,
                        'notify_type' => NOTIFY_WEB,
                        'message' => 'New ' . $arrUserTypeDetails['name'] . ' ' . $arrPost['fullname'] . ' has been register through app',
                    ];

                    $this->Notifications->insert( $arrNotificationInsertData );
                    $arrResult['success'] = true;
                    $arrResult['message'] = 'Registration has been done successfully. Please continue with login.';
                } else {
                    $arrResult['success'] = false;
                    $arrResult['message'] = 'Registration has been failed. Pleaes try again later';
                }
            } else {
                $arrResult['success'] = false;
                $arrResult['message'] = 'Error while uploading Image. Error : ' . strip_tags( $strError );
            }
        } else {
            $arrResult['success'] = false;
            $arrResult['message'] = 'Validation Errors';
            $arrResult['error'] = $this->form_validation->error_array();
        }
        
        $this->response( $arrResult );
    }
    
//    public function sendNotification_post(){
//        
//        $post = $this->input->post();
//        
//        $details['title'] = $post['title'];
//        $details['description'] = $post['description'];
//        $details['id'] = 1;
//        $type = "Testing for Counsellor";
//        $location_ids = 0;
//        $fcmData = array(
//                    'alert' => '',
//                    'badge' =>1,
//                    'title' => $details['title'],
//                    'body' => strip_tags($details['description']),
//                    'notification_type' => $type,
//                    'id'=> $details['id'],
//                    'image_path'=> !empty($details['image'])?$details['image']:'',
//                    'location_ids'=>$location_ids
//        );
//        $registrationIds = array();
//        $fcmList =  $this->PushNotificationDevices->getPushNotificationDevices(); 
//        if(!empty($fcmList)){
//            foreach($fcmList as $fcm){
//                array_push($registrationIds,$fcm['token']);
//            }
//            $this->sendPushNotification($fcmData,$registrationIds);
//            $arrResult['success'] = true;
//            $arrResult['message'] = 'Notification has been send succcessfully.';
//            
//        }else{
//            $arrResult['success'] = false;
//            $arrResult['message'] = 'No FCM token present.';
//        }
//        $this->response($arrResult);
//    }
}
