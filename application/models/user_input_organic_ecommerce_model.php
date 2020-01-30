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
        $arrSession = UserSession();
        $this->arrUserSession = '';
        if( true == $arrSession['success'] ) {
            $this->arrUserSession = $arrSession['userData'];
            if( ADMINUSERNAME == $this->arrUserSession['username'] ){
                $this->arrUserSession['user_id'] = 1;
            }
        }
    }

    public function getUsersInputOrganicEcommerce() {
        $this->db->select( 'tuoie.*, tu.fullname, tut.name as user_type_name' );
        $this->db->from( 'tbl_users_organic_input_ecommerce tuoie' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tuoie.user_id' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tuoie.user_type_id' );
        $this->db->order_by( 'tuoie.id','DESC' );
        return $this->db->get()->result_array();
    }
    public function getUsersInputOrganicEcommerceByUserId( $intUserId, $intLimit = '', $intOffset = 0 ) {
        $this->db->select( 'tuoie.*, tu.*, tut.name as user_type_name' );
        $this->db->from( 'tbl_users_organic_input_ecommerce tuoie' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tuoie.user_id' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tuoie.user_type_id' );
        $this->db->where( 'tuoie.user_id', $intUserId );
        if( true == isIdVal( $intLimit ) ) {
            $this->db->limit( $intLimit, $intOffset );
        }
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
    
    public function getUsersInputOrganicEcommerceById( $intOrganicInputEcommerceId ) {
        $this->db->select( 'tuoie.*,tu.*' );
        $this->db->from( 'tbl_users_organic_input_ecommerce tuoie' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tuoie.user_id' );
        $this->db->where( 'tuoie.id', $intOrganicInputEcommerceId );
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
        
        $this->db->insert( 'tbl_users_organic_input_ecommerce', $arrInsertData );
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    public function update( $arrUpdateData ){
        $arrUpdateData['updated_at'] = CURRENT_DATETIME;
        if( true == isset( $this->arrUserSession['user_id'] ) ) { 
            $arrUpdateData['updated_by'] = $this->arrUserSession['user_id'];
        } 
        
        $this->db->where('id',$arrUpdateData['id']);
        $this->db->update('tbl_users_organic_input_ecommerce',$arrUpdateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function updateByUserId($arrUpdateData){
        $this->db->where('user_id',$arrUpdateData['user_id']);
        $this->db->update('tbl_users_organic_input_ecommerce',$arrUpdateData);
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

