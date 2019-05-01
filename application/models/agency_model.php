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
class agency_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getAgencies() {
        $this->db->order_by('id','DESC');
        return $this->db->get('tbl_agency')->result_array();
    }
    
    public function getAgencyById($id) {
        $this->db->where('id',$id);
        return $this->db->get('tbl_agency')->row_array();
    }
    
    public function insert($data){
        $this->db->insert('tbl_certification_agency', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    public function update($updateData){
        $this->db->where('user_id',$updateData['user_id']);
        $this->db->update('tbl_certification_agency',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function updateIsView(){
        $updateData = array('is_view' => 1);
        $this->db->update('tbl_certification_agency',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id) {
        $this->db->where('user_id',$id);
        $this->db->delete('tbl_certification_agency'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
