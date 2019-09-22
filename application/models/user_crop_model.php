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
    public function getUserCropByUserId( $intUserId ) {
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
    public function insert($data){
        $this->db->insert('tbl_users_crop', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    public function update( $arrUpdateData ){
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

