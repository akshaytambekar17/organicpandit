<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_model
 *
 * @author comc
 */
class product_units_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->arrUserSession = '';
        $arrSession = UserSession();
        if( true == $arrSession['success'] ) {
            $this->arrUserSession = $arrSession['userData'];
            if( ADMINUSERNAME == $this->arrUserSession['username'] ){
                $this->arrUserSession['user_id'] = 1;
            }
        }
    }

    public function getProductUnits() {
        $this->db->order_by( 'product_unit_id', 'DESC' );
        return $this->db->get( 'tbl_product_units' )->result_array();
    }
    
    public function getProductUnitByProductUnitId( $intProductUnitId ) {
        $this->db->where( 'product_unit_id', $intProductUnitId );
        return $this->db->get( 'tbl_product_units' )->row_array();
    }

    public function insert( $arrInsertData ) {
        $arrInsertData['updated_at'] = CURRENT_DATETIME;
        $this->db->insert( 'tbl_product_units', $arrInsertData );
        $intLastId = $this->db->insert_id();
        return $intLastId;
    }

    public function update( $arrUpdateData ) {
        $arrUpdateData['updated_at'] = CURRENT_DATETIME;
        $this->db->where( 'product_unit_id', $arrUpdateData['product_unit_id'] );
        $this->db->update( 'tbl_product_units', $arrUpdateData );
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete( $intProductUnitId ) {
        $this->db->where( 'product_unit_id', $intProductUnitId );
        $this->db->delete( 'tbl_product_units' );
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

}
