<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
class user_product_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getUserProducts() {
        $this->db->select( 'tup.*, tu.fullname, tut.name as user_type_name' );
        $this->db->from( 'tbl_users_products tup' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tup.user_id' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tu.user_type_id' );
        $this->db->order_by( 'tup.id','DESC' );
        return $this->db->get()->result_array();
    }
    
    public function getUserProductsByUserId( $intUserId ) {
        $this->db->select( 'tup.*, tu.fullname, tut.name as user_type_name' );
        $this->db->from( 'tbl_users_products tup' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tup.user_id' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tu.user_type_id' );
        $this->db->where( 'user_id', $intUserId );
        $this->db->order_by( 'tup.id','DESC' );
        return $this->db->get()->result_array();
    }
    
    public function getUserProductsByUserProductId( $intUserProductId ) {
        $this->db->select( 'tup.*, tu.fullname, tut.name as user_type_name' );
        $this->db->from( 'tbl_users_products tup' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tup.user_id' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tu.user_type_id' );
        $this->db->where( 'tup.id', $intUserProductId );
        return $this->db->get()->row_array();
    }
    
    
    public function insert($data){
        $this->db->insert('tbl_users_products', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    public function update( $updateData ){
        $this->db->where( 'id',$updateData['id'] );
        $this->db->update( 'tbl_users_products', $updateData );
        return true;
    }
    
    public function delete( $intId ) {
        $this->db->where( 'id', $intId );
        $this->db->delete('tbl_users_products'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function deleteByUserId($user_id) {
        $this->db->where('user_id',$user_id);
        $this->db->delete('tbl_users_products'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function getCertificationAgency() {
        //$this->db->order_by('id','DESC');
        return $this->db->get('tbl_certification')->result_array();
    }
}
