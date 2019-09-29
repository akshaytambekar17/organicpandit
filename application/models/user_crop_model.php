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
class user_crop_model extends CI_Model {

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
    
    public function getUserCrops() {
        $this->db->select( 'tuc.*, tu.fullname, tut.name as user_type_name, tc.name as crop_name' );
        $this->db->from( 'tbl_users_crop tuc' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tuc.user_id' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tuc.user_type_id' );
        $this->db->join( 'tbl_crops tc', 'tc.id = tuc.crop_id' );
        $this->db->order_by( 'tuc.id', 'DESC' );
        return $this->db->get()->result_array();
    }
    public function getUserCropsByUserId( $intUserId ) {
        $this->db->select( 'tuc.*, tu.fullname, tut.name as user_type_name, tc.name as crop_name' );
        $this->db->from( 'tbl_users_crop tuc' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tuc.user_id' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tuc.user_type_id' );
        $this->db->join( 'tbl_crops tc', 'tc.id = tuc.crop_id' );
        $this->db->where( 'tuc.user_id', $intUserId );
        return $this->db->get()->result_array();
    }
    public function getUserCropByUserCropId( $intUserCropId ) {
        $this->db->select( 'tuc.*, tu.fullname, tut.name as user_type_name, tc.name as crop_name' );
        $this->db->from( 'tbl_users_crop tuc' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tuc.user_id' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tuc.user_type_id' );
        $this->db->join( 'tbl_crops tc', 'tc.id = tuc.crop_id' );
        $this->db->where( 'tuc.id', $intUserCropId );
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
        
        $this->db->insert( 'tbl_users_crop', $arrInsertData ) ;
        $intLastId = $this->db->insert_id();
        return $intLastId;
    }
    public function update( $arrUpdateData ){
        $arrUpdateData['updated_at'] = CURRENT_DATETIME;
        if( true == isset( $this->arrUserSession['user_id'] ) ) { 
            $arrUpdateData['updated_by'] = $this->arrUserSession['user_id'];
        } 
        
        $this->db->where( 'id', $arrUpdateData['id'] );
        $this->db->update( 'tbl_users_crop', $arrUpdateData );
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function updateByUserId($updateData){
        $this->db->where('user_id',$updateData['user_id']);
        $this->db->update('tbl_users_crop',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('tbl_users_crop'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function deleteByUserId($user_id) {
        $this->db->where('user_id',$user_id);
        $this->db->delete('tbl_users_crop'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}

