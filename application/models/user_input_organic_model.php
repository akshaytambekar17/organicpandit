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
class user_input_organic_model extends CI_Model {

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
    
    public function getUsersInputOrganic() {
        $this->db->select( 'tuio.*, tu.fullname, tut.name as user_type_name' );
        $this->db->from( 'tbl_users_input_organic tuio' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tuio.user_id' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tuio.user_type_id' );
        $this->db->order_by( 'tuio.id', 'DESC' );
        return $this->db->get()->result_array();
    }
    public function getUserInputOrganicByUserId( $intUserId ) {
        $this->db->select( 'tuio.*, tu.fullname, tut.name as user_type_name' );
        $this->db->from( 'tbl_users_input_organic tuio' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tuio.user_id' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tuio.user_type_id' );
        $this->db->where( 'tuio.user_id', $intUserId );
        return $this->db->get()->result_array();
    }
    public function getUserInputOrganicById( $intUserInputOrganicManureId ) {
        $this->db->select( 'tuio.*, tu.fullname, tut.name as user_type_name' );
        $this->db->from( 'tbl_users_input_organic tuio' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tuio.user_id' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tuio.user_type_id' );
        $this->db->where( 'tuio.id', $intUserInputOrganicManureId );
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
        
        $this->db->insert( 'tbl_users_input_organic', $arrInsertData );
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    public function update( $arrUpdateData ){
        $arrUpdateData['updated_at'] = CURRENT_DATETIME;
        if( true == isset( $this->arrUserSession['user_id'] ) ) { 
            $arrUpdateData['updated_by'] = $this->arrUserSession['user_id'];
        } 
        
        $this->db->where( 'id', $arrUpdateData['id'] );
        $this->db->update( 'tbl_users_input_organic', $arrUpdateData );
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function updateByUserId($updateData){
        $this->db->where('user_id',$updateData['user_id']);
        $this->db->update('tbl_users_input_organic',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('tbl_users_input_organic'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function deleteByUserId($userId) {
        $this->db->where('user_id',$userId);
        $this->db->delete('tbl_users_input_organic'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}

