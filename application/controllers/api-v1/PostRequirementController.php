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
        //printDie( 'in' );    
        if( true == $this->form_validation->run( 'post-requirement-form' ) ) {
            $arrDetails = $arrPost;
            $arrDetails['from_date'] = date( "Y-m-d", strtotime( $arrDetails['from_date'] ) );
            $arrDetails['to_date'] = date( "Y-m-d", strtotime( $arrDetails['to_date'] ) );
            $arrDetails['is_verified'] = 1;
            $arrDetails['is_seen'] = 0;
            $arrDetails['is_view'] = 0;
            $arrDetails['is_deleted'] = 0;
            $arrDetails['post_code'] = '';
            $arrDetails['updated_at'] = CURRENT_DATETIME;
            $arrDetails['created_at'] = CURRENT_DATETIME;

            $intPostRequirementId = $this->PostRequirement->add( $arrDetails );
            $arrUserDetails = $this->User->getUserById( $arrDetails['user_id'] );

            $arrInsertData = [
                'user_id' => $arrUserDetails['user_id'],
                'user_type_id' => $arrUserDetails['user_type_id'],
                'notification_type' => POST,
                'notify_type' => NOTIFY_WEB,
                'message' => 'New Post has been added by ' . $arrUserDetails['fullname'] . ' through APP',
            ];

            $this->Notifications->insert( $arrInsertData );

            if( true == isIdVal( $intPostRequirementId ) ) {
                $arrResult['success'] = true;
                $arrResult['message'] = 'Your Post has been created successfully and sent to support for verfication.Please stay with us';

            } else {
                $arrResult['success'] = false;
                $arrResult['message'] = 'Something went wrong. Post not created. Please try again later or You can add through Portal';
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
        if( true == isset( $arrPost['state_id'] ) && true == isIdVal( $arrPost['state_id'] ) && true == isset( $arrPost['city_id'] ) && true == isIdVal( $arrPost['city_id'] ) ) {
            
            $intOffset = DEFAULT_OFFEST;
            if( true == isset( $arrPost['page_no'] ) && true == isIdVal( $arrPost['page_no'] ) ) {
                $intOffset = $this->calculateOffset( $arrPost['page_no'] );
            }
            
            $arrPostRequirementList = $this->PostRequirement->getPostBysearchKey( $arrPost, LIMIT, $intOffset );
            foreach( $arrPostRequirementList as $arrPostRequirementDetails ) {
                $arrBidList = $this->Bid->getBidByPostRequirementId( $arrPostRequirementDetails['id'] );
                $arrPostRequirementDetails['total_bids'] = count( $arrBidList );
                
                $arrmixPostRequirementList[] = $arrPostRequirementDetails;
            }
            if( true == isArrVal( $arrmixPostRequirementList ) ) {
                $arrResult['success'] = true;
                $arrResult['message'] = 'Successfully fetch data for Post requirement';
                $arrResult['data'] = $arrmixPostRequirementList;
            } else {
                $arrResult['success'] = false;
                $arrResult['message'] = 'No data found';
            }
        } else {
            $arrResult['success'] = false;
            $arrResult['message'] = 'state and City is required';
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
    
}
