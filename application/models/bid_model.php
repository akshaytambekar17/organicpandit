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
class bid_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getBids() {
        $this->db->order_by('id','DESC');
        return $this->db->get('tbl_bid')->result_array();
    }
    public function getBidById($id) {
        $this->db->where('id',$id);
        return $this->db->get('tbl_bid')->row_array();
    }
    public function getBidByPostRequirementId($id) {
        $this->db->where('post_requirement_id',$id);
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

    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('tbl_bid'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
