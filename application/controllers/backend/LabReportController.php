<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LabReportController extends MY_Controller {

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
        $arrData['strTitle'] = 'Lab Reports List';
        $arrData['title'] = 'Lab Reports List';
        $arrData['strHeading'] = 'Lab Reports List';
        $arrData['view'] = 'lab-reports/list';
        $arrData['arrLabReportsList'] = $this->LabReports->getLabReports();
        
        $this->backendLayout( $arrData );
    }

    public function add() {
        
        $arrData['backend'] = true;
        $arrData['arrUserSessionDetails'] = $this->arrUserSession;
        $arrData['arrProductCategoryList'] = $this->ProductCategory->getProductCategorys();
        $arrData['strTitle'] = 'Add Lab Reports';
        $arrData['title'] = 'Add Lab Reports';
        $arrData['strHeading'] = 'Add Lab Reports';
        $arrData['strSubmitValue'] = 'Add Lab Reports';
        $arrData['view'] = 'lab-reports/form-details';

        if( $this->input->post() ) {
            $arrPost = $this->input->post();
            
            if( true == $this->form_validation->run( 'lab-report-form' ) ) {
                $strError = '';
                if( true == isset( $_FILES['upload_lab_report']['name'] ) && ( true == isStrVal( $_FILES['upload_lab_report']['name'] ) ) ) {
                    $arrConfigBlogImage['upload_path'] = './assets/lab-reports/';
                    $arrConfigBlogImage['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|csv';
                    $arrConfigBlogImage['max_size'] = 2048;

                    $this->load->library( 'upload', $arrConfigBlogImage );
                    if( $this->upload->do_upload( 'upload_lab_report' ) ) {
                        $arrUploadData = $this->upload->data();
                        $strUploadLabReport = $arrUploadData['file_name'];
                    } else {
                        $strError = $this->upload->display_errors();
                        $strUploadLabReport = '';
                    }
                } else {
                    $strUploadLabReport = '';
                }
                
                if( false == isStrVal( $strError ) ) {
                    $arrDetails = $arrPost;
                    $arrDetails['upload_lab_report'] = $strUploadLabReport;
                    $arrDetails['date_of_sampling'] = convertDateFormatToStandardFormat( $arrDetails['date_of_sampling'] );
                    $intLabReportId = $this->LabReports->insert( $arrDetails );
                    if( true == isIdVal( $intLabReportId ) ) {
                        $this->session->set_flashdata( 'Message', 'New Lab Report has been added succesfully' );
                        return redirect( 'admin/lab-reports', 'refresh' );
                    } else {
                        $this->session->set_flashdata( 'Error', 'Failed to add Lab Reports' );
                        $this->backendLayout( $arrData );
                    }
                } else {
                    $this->session->set_flashdata( 'Error', $strError );
                    $arrData['strErrorMessage'] = $strError;
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

        $arrLabReportDetails = $this->LabReports->getLabReportByLabReportId( $arrGet['lab_report_id'] );
        if( false == isArrVal( $arrLabReportDetails ) ) {
            $this->session->set_flashdata( 'Error', 'Lab Report not found.' );
            redirect( 'admin/lab-reports', 'refresh' );
        }
        $arrData['backend'] = true;
        $arrData['arrUserSessionDetails'] = $this->arrUserSession;
        $arrData['arrProductCategoryList'] = $this->ProductCategory->getProductCategorys();
        $arrData['arrLabReportDetails'] = $arrLabReportDetails;
        $arrData['title'] = 'Update Lab Report';
        $arrData['strHeading'] = 'Update Lab Report';
        $arrData['strSubmitValue'] = 'Update Lab Report';
        $arrData['view'] = 'lab-reports/form-details';

        if( $this->input->post() ) {
            $arrPost = $this->input->post();
            
            if( true == $this->form_validation->run( 'lab-report-form' ) ) {
                $strError = '';
                if( true == isset( $_FILES['upload_lab_report']['name'] ) && ( true == isStrVal( $_FILES['upload_lab_report']['name'] ) ) ) {
                    $arrConfigBlogImage['upload_path'] = './assets/lab-reports/';
                    $arrConfigBlogImage['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|csv';
                    $arrConfigBlogImage['max_size'] = 2048;

                    $this->load->library( 'upload', $arrConfigBlogImage );
                    if( $this->upload->do_upload( 'upload_lab_report' ) ) {
                        $arrUploadData = $this->upload->data();
                        $strUploadLabReport = $arrUploadData['file_name'];
                    } else {
                        $strError = $this->upload->display_errors();
                        $strUploadLabReport = '';
                    }
                } else {
                    $strUploadLabReport = ( true == isStrVal( $arrPost['upload_lab_report_hidden'] ) ) ? $arrPost['upload_lab_report_hidden'] : '';
                }
                
                if( false == isStrVal( $strError ) ) {
                    $arrDetails = $arrPost;
                    unset( $arrDetails['upload_lab_report_hidden'] );
                    $arrDetails['upload_lab_report'] = $strUploadLabReport;
                    $arrDetails['date_of_sampling'] = convertDateFormatToStandardFormat( $arrDetails['date_of_sampling'] );
                    $boolResult = $this->LabReports->update( $arrDetails );
                    if( true == isVal( $boolResult ) ) {
                        $this->session->set_flashdata( 'Message', 'Lab Report has been updated succesfully' );
                        return redirect( 'admin/lab-reports', 'refresh' );
                    } else {
                        $this->session->set_flashdata( 'Error', 'Failed to update Lab Report' );
                        $this->backendLayout( $arrData );
                    }
                } else {
                    $this->session->set_flashdata( 'Error', $strError );
                    $arrData['strErrorMessage'] = $strError;
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
        $boolResult = $this->LabReports->delete( $arrPost['lab_report_id'] );
        if( true == isVal( $boolResult ) ) {
            echo true;
        } else {
            echo false;
        }
    }
    
}
