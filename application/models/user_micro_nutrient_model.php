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
class user_micro_nutrient_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getUserMicroNutrients() {
        $this->db->select( 'tumn.*, tu.fullname, tut.name as user_type_name' );
        $this->db->from( 'tbl_users_micro_nutrient tumn' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tumn.user_id' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tumn.user_type_id' );
        $this->db->order_by( 'tumn.id', 'DESC');
        return $this->db->get()->result_array();
    }
    public function getUserMicroNutrientByUserId( $intUserId ) {
        $this->db->select( 'tumn.*, tu.fullname, tut.name as user_type_name' );
        $this->db->from( 'tbl_users_micro_nutrient tumn' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tumn.user_id' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tumn.user_type_id' );
        $this->db->where( 'tumn.user_id', $intUserId );
        $this->db->order_by( 'tumn.id', 'DESC' );
        return $this->db->get()->result_array();
    }
    public function getUserMicroNutrientByUserMicroNutrientId( $UserMicroNutrientId ) {
        $this->db->select( 'tumn.*, tu.fullname, tut.name as user_type_name' );
        $this->db->from( 'tbl_users_micro_nutrient tumn' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tumn.user_id' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tumn.user_type_id' );
        $this->db->where( 'tumn.id', $UserMicroNutrientId );
        return $this->db->get()->row_array();
    }
    public function insert($data){
        $this->db->insert('tbl_users_micro_nutrient', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    public function update($updateData){
        $this->db->where('id',$updateData['id']);
        $this->db->update('tbl_users_micro_nutrient',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('tbl_users_micro_nutrient'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function deleteByUserId($user_id) {
        $this->db->where('user_id',$user_id);
        $this->db->delete('tbl_users_micro_nutrient'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}

