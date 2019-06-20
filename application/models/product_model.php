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
class product_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getProducts() {
        $this->db->select("p.*,ut.name as user_type_name");
        $this->db->from('tbl_product p');
        $this->db->join('tbl_user_type ut','ut.id = p.user_type_id');
        $this->db->order_by('p.id','DESC');
        return $this->db->get()->result_array();
    }
    public function getActiveProducts() {
        $this->db->where('status',2);
        $this->db->order_by('id','DESC');
        return $this->db->get('tbl_product')->result_array();
    }
    public function getProductById($id) {
        $this->db->where('id',$id);
        return $this->db->get('tbl_product')->row_array();
    }
    
    public function getProductByCategoryId( $intCategoryId ) {
        $this->db->where('product_category_id',$intCategoryId);
        $this->db->where('status',2);
        return $this->db->get('tbl_product')->result_array();
    }
    public function getFarmerProduct() {
        //$this->db->order_by('id','DESC');
        return $this->db->get('tbl_pr_farmer')->result_array();
    }
    public function getFarmerProductById($id) {
        $this->db->where('id',$id);
        return $this->db->get('tbl_pr_farmer')->row_array();
    }
    
    public function add($data){
        $this->db->insert('tbl_product', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    public function update($updateData){
        $this->db->where('id',$updateData['id']);
        $this->db->update('tbl_product',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('tbl_product'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
