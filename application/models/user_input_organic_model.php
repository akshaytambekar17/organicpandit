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
    }
    
    public function getUsersInputOrganic() {
        $this->db->order_by('id','DESC');
        return $this->db->get('tbl_users_input_organic')->result_array();
    }
    public function getUserInputOrganicByUserId($user_id) {
        $this->db->where('user_id',$user_id);
        return $this->db->get('tbl_users_input_organic')->row_array();
    }
    public function getUserInputOrganicById($id) {
        $this->db->where('id',$id);
        return $this->db->get('tbl_users_input_organic')->row_array();
    }
    public function insert($data){
        $this->db->insert('tbl_users_input_organic', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    public function update($updateData){
        $this->db->where('id',$updateData['id']);
        $this->db->update('tbl_users_input_organic',$updateData);
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
    public function deleteByUserId($user_id) {
        $this->db->where('user_id',$user_id);
        $this->db->delete('tbl_users_input_organic'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}

