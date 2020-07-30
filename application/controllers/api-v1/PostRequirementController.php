<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PostRequirementController extends MY_Controller {
    
    function __construct() {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    }
        
    public function getTotalWorth() {
        $arrPostRequirementTotalWorthDetails = $this->PostRequirement->getTotalWorth();
        if( true == isArrVal( $arrPostRequirementTotalWorthDetails ) ) {
            $arrResult['success'] = true;
            $arrResult['message'] = 'Successfully fetch the data';
            $arrResult['data'] = $arrPostRequirementTotalWorthDetails;
        } else {
            $arrResult['success'] = false;
            $arrResult['message'] = 'No data found';
        }
        
        $this->response( $arrResult );
        
    }
    
    public function insert() {
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
    
    public function getPostRequirementList() {
        $arrPost = $this->input->post();
            
        $intOffset = DEFAULT_OFFEST;
        if( true == isset( $arrPost['page_no'] ) && true == isIdVal( $arrPost['page_no'] ) ) {
            $intOffset = $this->calculateOffset( $arrPost['page_no'] );
        }

        $arrmixPostRequirementList = [];
        $arrPostRequirementList = $this->PostRequirement->getPostBysearchKey( $arrPost, LIMIT, $intOffset );
        $arrPostRequirementListCount = $this->PostRequirement->getPostBysearchKey( $arrPost );
        
        foreach( $arrPostRequirementList as $arrPostRequirementDetails ) {
            $arrBidList = $this->Bid->getBidByPostRequirementId( $arrPostRequirementDetails['id'] );
            $arrPostRequirementDetails['total_bids'] = count( $arrBidList );

            $arrmixPostRequirementList[] = $arrPostRequirementDetails;
        }
        if( true == isArrVal( $arrmixPostRequirementList ) ) {
            $arrResult['success'] = true;
            $arrResult['message'] = 'Successfully fetch data for Post requirement';
            $arrResult['total_count'] = count( $arrPostRequirementListCount );
            $arrResult['total_page'] = round( count( $arrPostRequirementListCount ) / LIMIT );
            $arrResult['data'] = $arrmixPostRequirementList;
        } else {
            $arrResult['success'] = false;
            $arrResult['message'] = 'No data found';
        }
        
        
        $this->response( $arrResult );
        
    }
    
    public function getPostRequirementDetails() {
        $arrPost = $this->input->post();
        if( true == isset( $arrPost['post_requirement_id'] ) && true == isIdVal( $arrPost['post_requirement_id'] ) ) {
            
            $arrPostRequirementDetails = $this->PostRequirement->getPostRequirementById( $arrPost['post_requirement_id'] );
            if( true == isArrVal( $arrPostRequirementDetails ) ) {
                $arrResult['success'] = true;
                $arrResult['message'] = 'Successfully fetch post requirement data';
                $arrResult['data'] = $arrPostRequirementDetails;
            } else {
                $arrResult['success'] = false;
                $arrResult['message'] = 'No data found';
            }
        } else {
            $arrResult['success'] = false;
            $arrResult['message'] = 'Post requirement Id is required';
        }
        
        $this->response( $arrResult );
        
    }
    
    public function applyBid() {
        $arrPost = $this->input->post();
        if( true == isset( $arrPost['user_id'] ) && true == isIdVal( $arrPost['user_id'] ) ) {
            if( true == isset( $arrPost['post_requirement_id'] ) && true == isIdVal( $arrPost['post_requirement_id'] ) && true == isset( $arrPost['amount'] ) && true == isIdVal( $arrPost['amount'] ) ) { 
                $arrDetails = $arrPost;
                $arrDetails['is_seen'] = 0;
                $arrDetails['is_view'] = 0;
                $arrDetails['is_deleted'] = 0;
                $arrDetails['updated_at'] = CURRENT_DATETIME;
                $arrDetails['created_at'] = CURRENT_DATETIME;
                $intBidId = $this->Bid->insert( $arrDetails );
                if( true == isIdVal( $intBidId ) ) {            
                    $arrUserDetails = $this->User->getUserById( $arrPost['user_id'] );
                    $arrInsertData = [
                        'user_id' => $arrPost['user_id'],
                        'user_type_id' => $arrUserDetails['user_type_id'],
                        'notification_type' => BID,
                        'notify_type' => NOTIFY_WEB,
                        'message' => 'New Bid has been placed by '.$arrUserDetails['fullname'],
                    ];

                    $intNotificationId = $this->Notifications->insert( $arrInsertData );
                    if( true == isIdVal( $intNotificationId ) ) {
                        $arrResult['success'] = true;
                        $arrResult['message'] = 'Your bid has been successfully placed.';
                    } else {
                        $arrResult['success'] = false;
                        $arrResult['message'] = 'Your bid has been successfully placed, but not able to send notification to System Admin.';
                    }

                } else {
                    $arrResult['success'] = false;
                    $arrResult['message'] = 'Something went wrong. Please Apply for Bid later.';
                }
                
            } else {
                $arrResult['success'] = false;
                $arrResult['message'] = 'Post requirement data and Amount is required.';
            }
            
        } else {
            $arrResult['success'] = false;
            $arrResult['message'] = 'Please provide me user details before proceeding for Bid.';
        }
        
        $this->response( $arrResult );
    }
    
}
