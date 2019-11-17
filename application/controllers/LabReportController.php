<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LabReportController extends MY_Controller {

    function __construct() {
        parent::__construct();
        $arrSession = UserSession();
        if( false == $arrSession['success'] ) {
            //redirect( 'home', 'refresh' );
        } else {
            $this->arrUserSession = $arrSession['userData'];
        }
    }

    public function index() {
    }
    
    public function view() {
        $arrGet = $this->input->get();
        
        $arrLabReportDetails = $this->LabReports->getLabReportByLabReportId( $arrGet['lab_report_id'] );
        $arrData['arrLabReportDetails'] = $arrLabReportDetails;
        $arrData['strTitle'] = ( true == isArrVal( $arrLabReportDetails ) ) ? $arrLabReportDetails['lab_name'] : 'Lab Report';
        $arrData['title'] = ( true == isArrVal( $arrLabReportDetails ) ) ? $arrLabReportDetails['lab_name'] : 'Lab Report';
        $arrData['strHeading'] = '<b>Lab Report</b>';
        $arrData['hide_footer'] = true;
        $arrData['view'] = 'lab-report/view';
        $this->frontendLayout($arrData);
    }

    
}
