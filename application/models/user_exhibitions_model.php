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
class user_exhibitions_model extends CI_Model {

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

    public function getUserExhibitions() {
        $this->db->select( 'tue.*, tuei.*, tu.fullname' );
        $this->db->from( 'tbl_user_exhibitions tue' );
        $this->db->join( 'tbl_user_exhibition_images tuei', 'tuei.user_exhibition_id = tue.user_exhibition_id' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tue.user_id', 'left' );
        $this->db->order_by( 'tue.user_exhibition_id', 'DESC' );
        return $this->db->get()->result_array();
    }
    
    public function getUserExhibitionByUserExhibitionId( $intUserExhibitionId ) {
        $this->db->select( 
                        'tue.*, '
                        . 'tuei.*'
                        . 'tu.fullname' );
        $this->db->from( 'tbl_user_exhibitions tue' );
        $this->db->join( 'tbl_user_exhibition_images tuei', 'tuei.user_exhibition_id = tue.user_exhibition_id' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tue.user_id', 'left' );
        $this->db->where( 'tue.user_exhibition_id', $intUserExhibitionId );
        return $this->db->get()->row_array();
    }

    public function getUserExhibitionByUserId( $intUserId, $intLimit = '', $intOffset = 0  ) {
        $this->db->select( 'tue.*,tu.fullname' );
        $this->db->from( 'tbl_user_exhibitions tue' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tue.user_id', 'left' );
        $this->db->where( 'tue.user_id', $intUserId );
        $this->db->order_by( 'tue.user_exhibition_id', 'desc' );
        if( true == isIdVal( $intLimit ) ) {
            $this->db->limit( $intLimit, $intOffset );
        }
        return $this->db->get()->row_array();
    }

    
    public function insert( $arrInsertData ) {
        //$arrInsertData['updated_at'] = CURRENT_DATETIME;
//        if( true == isset( $this->arrUserSession['user_id'] ) ) {
//            $arrInsertData['created_by'] = $this->arrUserSession['user_id'];
//            $arrInsertData['updated_by'] = $this->arrUserSession['user_id'];
//        } else {
//            $arrInsertData['created_by'] = ( true == isset( $arrInsertData['user_id'] ) ) ? $arrInsertData['user_id'] : '1';
//            $arrInsertData['updated_by'] = ( true == isset( $arrInsertData['user_id'] ) ) ? $arrInsertData['user_id'] : '1';
//        }
        
        $this->db->insert('tbl_user_exhibitions', $arrInsertData);
        $intLastId = $this->db->insert_id();
        return $intLastId;
    }

    public function update($arrUpdateData) {
        //$arrUpdateData['updated_at'] = CURRENT_DATETIME;
//        if( true == isset( $this->arrUserSession['user_id'] ) ) { 
//            $arrUpdateData['updated_by'] = $this->arrUserSession['user_id'];
//        } 
        $this->db->where('user_exhibition_id', $arrUpdateData['user_exhibition_id']);
        $this->db->update('tbl_user_exhibitions', $arrUpdateData);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($intUserExhibitionId) {
        $this->db->where('user_exhibition_id', $intUserExhibitionId);
        $this->db->delete('tbl_user_exhibitions');
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

}
