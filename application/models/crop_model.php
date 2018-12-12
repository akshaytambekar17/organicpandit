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
class crop_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getCrops() {
        //$this->db->order_by('id','DESC');
        return $this->db->get('tbl_crops')->result_array();
    }
    public function getActiveCrops() {
        $this->db->where('status',2);
        //$this->db->order_by('id','DESC');
        return $this->db->get('tbl_crops')->result_array();
    }
    public function getCropById($id) {
        $this->db->where('id',$id);
        return $this->db->get('tbl_crops')->row_array();
    }
    
    public function add($data){
        $this->db->insert('tbl_crops', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    public function update($updateData){
        $this->db->where('id',$updateData['id']);
        $this->db->update('tbl_crops',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('tbl_crops'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
