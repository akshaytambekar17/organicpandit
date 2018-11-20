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
class State_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getStates() {
        return $this->db->get('states')->result_array();
    }
    public function getStateById($id) {
        $this->db->where('id',$id);
        return $this->db->get('states')->row_array();
    }
    
    public function add($data){
        $this->db->insert('states', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    public function update($updateData){
        $this->db->where('id',$updateData['id']);
        $this->db->update('states',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('states'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
