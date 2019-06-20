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
class user_input_organic_ecommerce_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function getUsersInputOrganicEcommerce() {
        $this->db->order_by('id','DESC');
        return $this->db->get('tbl_users_organic_input_ecommerce')->result_array();
    }
    public function getUsersInputOrganicEcommerceByUserId( $userId ) {
        $this->db->select('tuoie.*,tu.*');
        $this->db->from('tbl_users_organic_input_ecommerce tuoie');
        $this->db->join('tbl_users tu','tu.user_id = tuoie.user_id');
        $this->db->where('tuoie.user_id',$userId);
        return $this->db->get()->result_array();
    }
    
    public function getUsersInputOrganicEcommerceByUserIdBySubCategoryIdByBrandId( $userId, $subCategoryId, $brandId ) {
        $this->db->select('tuoie.*,tu.*');
        $this->db->from('tbl_users_organic_input_ecommerce tuoie');
        $this->db->join('tbl_users tu','tu.user_id = tuoie.user_id');
        $this->db->where('tuoie.user_id',$userId);
        if( !empty( $subCategoryId ) ){
            $this->db->where('tuoie.sub_category_id',$subCategoryId);
        }
        if( !empty( $brandId ) ){
            $this->db->where('tuoie.ecommerce_brand_id',$brandId);
        }
        return $this->db->get()->result_array();
    }
    
    public function getUsersInputOrganicEcommerceByEcommerceBrand( $intUserId, $strBrand ) {
        $this->db->where('user_id',$intUserId);
        $this->db->like('ecommerce_brand_id',$strBrand);
        return $this->db->get('tbl_users_organic_input_ecommerce')->result_array();
    }
    
    public function getUsersInputOrganicEcommerceById( $id ) {
        $this->db->where('id',$id);
        return $this->db->get('tbl_users_organic_input_ecommerce')->row_array();
    }
    public function insert($data){
        $this->db->insert('tbl_users_organic_input_ecommerce', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    public function update($updateData){
        $this->db->where('id',$updateData['id']);
        $this->db->update('tbl_users_organic_input_ecommerce',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function updateByUserId($updateData){
        $this->db->where('user_id',$updateData['user_id']);
        $this->db->update('tbl_users_organic_input_ecommerce',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('tbl_users_organic_input_ecommerce');
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function deleteByUserId($user_id) {
        $this->db->where('user_id',$user_id);
        $this->db->delete('tbl_users_organic_input_ecommerce');
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}

