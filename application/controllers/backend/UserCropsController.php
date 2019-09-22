<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserCropsController extends MY_Controller {

    function __construct() {
        parent::__construct();
        $arrSession = UserSession();
        if( false == $arrSession['success'] ) {
            redirect( 'home', 'refresh' );
        } else {
            $this->arrUserSession = $arrSession['userData'];
        }
    }

    public function index() {
        $arrData['backend'] = true;
        $arrData['strTitle'] = 'Crops List';
        $arrData['title'] = 'Crops List';
        $arrData['strHeading'] = 'Crops List';
        $arrData['view'] = 'user-crop/list';
        if( ADMINUSERNAME == $this->arrUserSession['username'] ){ 
            $arrData['arrUserCropsList'] = $this->UserCrop->getUserCrops();
        } else {
            $arrData['arrUserCropsList'] = $this->UserCrop->getUserCropsByUserId( $this->arrUserSession['user_id'] );
        }    
        $this->backendLayout( $arrData );
    }

    public function add() {
        
        $arrData['backend'] = true;
        $arrData['arrCropsList'] = $this->Crop->getActiveCrops();
        $arrData['arrUsersList'] = $this->User->getUsersByUserType();
        $arrData['arrUserSessionDetails'] = $this->arrUserSession;
        $arrData['strTitle'] = 'Add Crop';
        $arrData['title'] = 'Add Crop';
        $arrData['strHeading'] = 'Add Crop';
        $arrData['strSubmitValue'] = 'Add Crop';
        $arrData['view'] = 'user-crop/form-details';

        if( $this->input->post() ) {
            $arrPost = $this->input->post();
            if( ADMINUSERNAME == $this->arrUserSession['username'] ) {
                $this->form_validation->set_rules('user_id', 'User', 'trim|required');
            }
            $this->form_validation->set_rules('crop_id', 'Crop', 'trim|required');
            $this->form_validation->set_rules('area', 'Area', 'trim|required');
            $this->form_validation->set_rules('date_sown', 'Date of Sown', 'trim|required');
            $this->form_validation->set_rules('date_harvest', 'Date of Harvest', 'trim|required');
            $this->form_validation->set_rules('date_inspection', 'Date of Inspection', 'trim|required');
            $this->form_validation->set_rules('inspector_name', 'Crop Inspector', 'trim|required');
            $this->form_validation->set_rules('crop_condition', 'Crop Condition', 'trim|required');
            $this->form_validation->set_rules('other_details', 'Other Details', 'trim|required');
            
            if( true == $this->form_validation->run() ) {
                $arrDetails = $arrPost;
                
                $arrUserDetails = $this->User->getUserById( $arrPost['user_id'] );
                $arrDetails['user_type_id'] = $arrUserDetails['user_type_id'];
                
                $strDateSown = str_replace('/', '-', $arrPost['date_sown'] );
                $strDateHarvest = str_replace('/', '-', $arrPost['date_harvest'] );
                $strDateInspection = str_replace('/', '-', $arrPost['date_inspection'] );
                
                $arrDetails['date_sown'] = date( 'Y-m-d', strtotime( $strDateSown ) );
                $arrDetails['date_harvest'] = date( 'Y-m-d', strtotime( $strDateHarvest ) );
                $arrDetails['date_inspection'] = date( 'Y-m-d', strtotime( $strDateInspection ) );
                
                $intUserCropId = $this->UserCrop->insert( $arrDetails );
                if( true == isIdVal( $intUserCropId ) ) {
                    $arrCropDetails = $this->Crop->getCropById( $arrPost['crop_id'] );
                    $this->session->set_flashdata( 'Message', 'Crop <b>' . $arrCropDetails['name'] . '</b> has been added succesfully' );
                    return redirect( 'admin/user/user-crops', 'refresh' );
                } else {
                    $this->session->set_flashdata( 'Error', 'Failed to add crop ' . $arrCropDetails['name'] );
                    $this->backendLayout( $arrData );
                }
            } else {
                $this->backendLayout( $arrData );
            }    
            
        } else {
            $this->backendLayout( $arrData );
        }
    }

    public function update() {
        $arrGet = $this->input->get();

        $arrUserCropDetails = $this->UserCrop->getUserCropByUserCropId( $arrGet['id'] );
        if( false == isArrVal( $arrUserCropDetails ) ) {
            $this->session->set_flashdata( 'Error', 'Crop not found.' );
            redirect( 'admin/user/user-crops', 'refresh' );
        }
        $arrData['backend'] = true;
        $arrData['arrCropsList'] = $this->Crop->getActiveCrops();
        $arrData['arrUsersList'] = $this->User->getUsersByUserType();
        $arrData['arrUserSessionDetails'] = $this->arrUserSession;
        $arrData['arrUserCropDetails'] = $arrUserCropDetails;
        $arrData['strTitle'] = 'Update Crop';
        $arrData['title'] = 'Update Crop';
        $arrData['strHeading'] = $arrUserCropDetails['crop_name'] . ' Crop';
        $arrData['strSubmitValue'] = 'Update Crop';
        $arrData['view'] = 'user-crop/form-details';

        if( $this->input->post() ) {
            $arrPost = $this->input->post();
            if( ADMINUSERNAME == $this->arrUserSession['username'] ) {
                $this->form_validation->set_rules('user_id', 'User', 'trim|required');
            }
            $this->form_validation->set_rules('crop_id', 'Crop', 'trim|required');
            $this->form_validation->set_rules('area', 'Area', 'trim|required');
            $this->form_validation->set_rules('date_sown', 'Date of Sown', 'trim|required');
            $this->form_validation->set_rules('date_harvest', 'Date of Harvest', 'trim|required');
            $this->form_validation->set_rules('date_inspection', 'Date of Inspection', 'trim|required');
            $this->form_validation->set_rules('inspector_name', 'Crop Inspector', 'trim|required');
            $this->form_validation->set_rules('crop_condition', 'Crop Condition', 'trim|required');
            $this->form_validation->set_rules('other_details', 'Other Details', 'trim|required');
            
            if( true == $this->form_validation->run() ) {
                
                $arrDetails = $arrPost;
                
                $arrUserDetails = $this->User->getUserById( $arrPost['user_id'] );
                $arrDetails['user_type_id'] = $arrUserDetails['user_type_id'];
                
                $strDateSown = str_replace('/', '-', $arrPost['date_sown'] );
                $strDateHarvest = str_replace('/', '-', $arrPost['date_harvest'] );
                $strDateInspection = str_replace('/', '-', $arrPost['date_inspection'] );
                
                $arrDetails['date_sown'] = date( 'Y-m-d', strtotime( $strDateSown ) );
                $arrDetails['date_harvest'] = date( 'Y-m-d', strtotime( $strDateHarvest ) );
                $arrDetails['date_inspection'] = date( 'Y-m-d', strtotime( $strDateInspection ) );
                
                $boolResult = $this->UserCrop->update( $arrDetails );

                if( true == isVal( $boolResult ) ) {
                    $arrCropDetails = $this->Crop->getCropById( $arrPost['crop_id'] );
                    $this->session->set_flashdata( 'Message', 'Crop <b>' . $arrCropDetails['name'] . '</b> has been updated succesfully' );
                    return redirect( 'admin/user/user-crops', 'refresh' );
                } else {
                    $this->session->set_flashdata( 'Error', 'Failed to update Crop ' . $arrCropDetails['name'] );
                    $this->backendLayout( $arrData );
                }
                
            } else {
                $this->backendLayout( $arrData );
            }
        } else {
            $this->backendLayout( $arrData );
        }
    }

    public function delete() {
        $arrPost = $this->input->post();
        $boolResult = $this->UserCrop->delete( $arrPost['id'] );
        if( true == isStrVal( $boolResult ) ) {
            echo true;
        } else {
            echo false;
        }
    }
    
}
