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
class meta_data_model extends CI_Model {

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

    public function getMetaData() {
        $this->db->select( 'tmd.*, tu.fullname, tut.name as user_type_name' );
        $this->db->from( 'tbl_meta_data tmd' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tmd.user_id', 'left' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tmd.user_type_id', 'left' );
        $this->db->order_by( 'tmd.meta_id', 'DESC' );
        return $this->db->get()->result_array();
    }
    
    public function getMetaDataByUserTypeId( $intUserTypeId ) {
        $this->db->select( 'tmd.*, tu.fullname, tut.name as user_type_name' );
        $this->db->from( 'tbl_meta_data tmd' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tmd.user_id', 'left' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tmd.user_type_id', 'left' );
        $this->db->where( 'tmd.user_type_id', $intUserTypeId );
        $this->db->order_by( 'tmd.meta_id', 'DESC' );
        return $this->db->get()->result_array();
    }

    public function getMetaDataByMetaDataId( $intMetaDataId ) {
        $this->db->select( 'tmd.*, tu.fullname, tut.name as user_type_name' );
        $this->db->from( 'tbl_meta_data tmd' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tmd.user_id', 'left' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tmd.user_type_id', 'left' );
        $this->db->where( 'tmd.meta_id', $intMetaDataId );
        return $this->db->get()->row_array();
    }
    
    public function getMetaDataByUserEcommerceId( $intUserEcommerceId ) {
        $this->db->select( 'tmd.*, tu.fullname, tut.name as user_type_name' );
        $this->db->from( 'tbl_meta_data tmd' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tmd.user_id', 'left' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tmd.user_type_id', 'left' );
        $this->db->where( 'tmd.user_ecommerce_id', $intUserEcommerceId );
        return $this->db->get()->row_array();
    }

    public function getMetaDataByUserId( $intUserId ) {
        $this->db->select( 'tmd.*, tu.fullname, tut.name as user_type_name' );
        $this->db->from( 'tbl_meta_data tmd' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tmd.user_id', 'left' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tmd.user_type_id', 'left' );
        $this->db->where( 'tmd.user_id', $intUserId );
        return $this->db->get()->result_array();
    }

    public function insert( $arrInsertData ) {
        $arrInsertData['updated_at'] = CURRENT_DATETIME;
        if( true == isset( $this->arrUserSession['user_id'] ) ) {
            $arrInsertData['created_by'] = $this->arrUserSession['user_id'];
            $arrInsertData['updated_by'] = $this->arrUserSession['user_id'];
        } else {
            $arrInsertData['created_by'] = $arrInsertData['user_id'];
            $arrInsertData['updated_by'] = $arrInsertData['user_id'];
        }
        
        $this->db->insert( 'tbl_meta_data', $arrInsertData );
        $intLastId = $this->db->insert_id();
        return $intLastId;
    }

    public function update( $arrUpdateData ) {
        $arrUpdateData['updated_at'] = CURRENT_DATETIME;
        if( true == isset( $this->arrUserSession['user_id'] ) ) { 
            $arrUpdateData['updated_by'] = $this->arrUserSession['user_id'];
        } 
        $this->db->where( 'meta_id', $arrUpdateData['meta_id'] );
        $this->db->update( 'tbl_meta_data', $arrUpdateData );
        if( $this->db->affected_rows() ) {
            return true;
        } else {
            return false;
        }
    }
    
    public function updateByUserEcommerceId( $arrUpdateData ) {
        $arrMetaDataDetails = $this->getMetaDataByUserEcommerceId( $arrUpdateData['user_ecommerce_id'] );
        if( false == isArrVal( $arrMetaDataDetails ) ) {
            $this->insert( $arrUpdateData );
        } else {
            $arrUpdateData['updated_at'] = CURRENT_DATETIME;
            if( true == isset( $this->arrUserSession['user_id'] ) ) { 
                $arrUpdateData['updated_by'] = $this->arrUserSession['user_id'];
            } 
            $this->db->where( 'user_ecommerce_id', $arrUpdateData['user_ecommerce_id'] );
            $this->db->update( 'tbl_meta_data', $arrUpdateData );
            if( $this->db->affected_rows() ) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function delete( $intMetaDataId ) {
        $this->db->where( 'meta_id', $intMetaDataId );
        $this->db->delete( 'tbl_meta_data ');
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

}
