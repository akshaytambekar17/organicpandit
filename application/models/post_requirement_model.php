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
class post_requirement_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getPostRequirements() {
        $this->db->order_by('id','DESC');
        return $this->db->get('tbl_post_requirement')->result_array();
    }
    public function getPostRequirementById($id) {
        $this->db->where('id',$id);
        return $this->db->get('tbl_post_requirement')->row_array();
    }
    
    public function add($data){
        $this->db->insert('tbl_post_requirement', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    public function update($updateData){
        $this->db->where('id',$updateData['id']);
        $this->db->update('tbl_post_requirement',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('tbl_post_requirement'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
