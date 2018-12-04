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
class user_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getUserFarmers() {
        $this->db->order_by('id','DESC');
        return $this->db->get('tbl_farmer')->result_array();
    }
    public function getUserFarmerById($id) {
        $this->db->where('id',$id);
        return $this->db->get('tbl_farmer')->row_array();
    }
    public function getBidByPostRequirementId($id) {
        $this->db->where('post_requirement_id',$id);
        return $this->db->get('tbl_bid')->result_array();
    }
    public function getBidByNotView() {
        $this->db->where('is_view',0);
        return $this->db->get('tbl_bid')->result_array();
    }
    
    public function insert($data){
        $this->db->insert('tbl_bid', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    public function update($updateData){
        $this->db->where('id',$updateData['id']);
        $this->db->update('tbl_bid',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function updateIsView(){
        $updateData = array('is_view' => 1);
        $this->db->update('tbl_bid',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('tbl_farmer'); 
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
