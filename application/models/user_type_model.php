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
class user_type_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getUserTypes() {
        //$this->db->order_by('id','DESC');
        return $this->db->get('tbl_user_type')->result_array();
    }
    public function getUserTypeById( $intUserTypeId )  {
        $this->db->where( 'id', $intUserTypeId );
        return $this->db->get('tbl_user_type')->row_array();
    }
    public function add($data){
        $this->db->insert('tbl_user_type', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    public function update($updateData){
        $this->db->where('id',$updateData['id']);
        $this->db->update('tbl_user_type',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('tbl_user_type'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
