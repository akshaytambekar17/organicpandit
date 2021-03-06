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
class user_soil_model extends CI_Model {

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
    
    public function getUserSoil() {
        $this->db->select( 'tusd.*, tu.fullname, tut.name as user_type_name' );
        $this->db->from( 'tbl_users_soil_details tusd' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tusd.user_id' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tusd.user_type_id' );
        $this->db->order_by( 'tusd.id', 'DESC' );
        return $this->db->get()->result_array();
    }
    public function getUserSoilByUserId( $intUserId ) {
        $this->db->select( 'tusd.*, tu.fullname, tut.name as user_type_name' );
        $this->db->from( 'tbl_users_soil_details tusd' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tusd.user_id' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tusd.user_type_id' );
        $this->db->where( 'tusd.user_id', $intUserId );
        $this->db->order_by( 'tusd.id', 'DESC' );
        return $this->db->get()->result_array();
    }
    public function getUserSoilByUserSoilId( $intUserSoilId ) {
        $this->db->select( 'tusd.*, tu.fullname, tut.name as user_type_name' );
        $this->db->from( 'tbl_users_soil_details tusd' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tusd.user_id' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tusd.user_type_id' );
        $this->db->where( 'tusd.id', $intUserSoilId );
        return $this->db->get()->row_array();
    }
    public function insert( $arrInsertData ){
        $arrInsertData['updated_at'] = CURRENT_DATETIME;
        if( true == isset( $this->arrUserSession['user_id'] ) ) {
            $arrInsertData['created_by'] = $this->arrUserSession['user_id'];
            $arrInsertData['updated_by'] = $this->arrUserSession['user_id'];
        } else {
            $arrInsertData['created_by'] = $arrInsertData['user_id'];
            $arrInsertData['updated_by'] = $arrInsertData['user_id'];
        }
        
        $this->db->insert( 'tbl_users_soil_details', $arrInsertData );
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    public function update( $arrUpdateData ){
        $arrUpdateData['updated_at'] = CURRENT_DATETIME;
        if( true == isset( $this->arrUserSession['user_id'] ) ) { 
            $arrUpdateData['updated_by'] = $this->arrUserSession['user_id'];
        } 
        
        $this->db->where( 'id', $arrUpdateData['id'] );
        $this->db->update( 'tbl_users_soil_details', $arrUpdateData );
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('tbl_users_soil_details'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function deleteByUserId($user_id) {
        $this->db->where('user_id',$user_id);
        $this->db->delete('tbl_users_soil_details'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}

