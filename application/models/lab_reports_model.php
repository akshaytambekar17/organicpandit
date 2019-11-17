<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Soil_model
 *
 * @author comc
 */
class lab_reports_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
        $arrSession = UserSession();
        $this->arrUserSession = '';
        if( true == $arrSession['success'] ) {
            $this->arrUserSession = $arrSession['userData'];
            if( ADMINUSERNAME == $this->arrUserSession['username'] ){
                $this->arrUserSession['user_id'] = 1;
            }
        }
    }
    
    public function getLabReports() {
        $this->db->select( 'tlr.*,tp.name as product_name, tcp.name as category_name' );
        $this->db->from( 'tbl_lab_reports tlr' );
        $this->db->join('tbl_product tp', 'tp.id = tlr.product_id');
        $this->db->join( 'tbl_product_category tcp', 'tcp.id = tlr.category_id' );
        $this->db->order_by( 'tlr.lab_report_id', 'DESC' );
        return $this->db->get()->result_array();
    }
    
    public function getLabReportByLabReportId( $intLabReportId ) {
        $this->db->select( 'tlr.*,tp.name as product_name, tcp.name as category_name' );
        $this->db->from( 'tbl_lab_reports tlr' );
        $this->db->join('tbl_product tp', 'tp.id = tlr.product_id');
        $this->db->join( 'tbl_product_category tcp', 'tcp.id = tlr.category_id' );
        $this->db->where( 'tlr.lab_report_id', $intLabReportId );
        return $this->db->get()->row_array();
    }
    
    public function insert( $arrInsertData ){
        $arrInsertData['updated_at'] = CURRENT_DATETIME;
        
        $this->db->insert( 'tbl_lab_reports', $arrInsertData );
        $intLabReportId = $this->db->insert_id();
        return $intLabReportId;
    }
    
    public function update( $arrUpdateData ){
        $arrUpdateData['updated_at'] = CURRENT_DATETIME;
        
        $this->db->where( 'lab_report_id', $arrUpdateData['lab_report_id'] );
        $this->db->update( 'tbl_lab_reports', $arrUpdateData );
        if( $this->db->affected_rows() ) {
            return true;
        }else{
            return false;
        }
    }
    
    public function delete( $intLabReportId ) {
        $this->db->where( 'lab_report_id', $intLabReportId );
        $this->db->delete( 'tbl_lab_reports' ); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    
}

