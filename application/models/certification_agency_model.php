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
class certification_agency_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getCertificationAgencies() {
        $this->db->select("ca.*,a.name");
        $this->db->from('tbl_certification_agency ca');
        $this->db->join('tbl_agency a','a.id = ca.agency_id');
        $this->db->order_by('ca.user_id','DESC');
        return $this->db->get()->result_array();
    }
    public function getCertificationAgenciesVerified() {
        $this->db->select("ca.*,a.name");
        $this->db->from('tbl_certification_agency ca');
        $this->db->join('tbl_agency a','a.id = ca.agency_id');
        $this->db->where('is_verified',2);
        $this->db->order_by('ca.user_id','DESC');
        return $this->db->get()->result_array();
    }
    public function getCertificationAgenciesNotVerified() {
        $this->db->select("ca.*,a.name");
        $this->db->from('tbl_certification_agency ca');
        $this->db->join('tbl_agency a','a.id = ca.agency_id');
        $this->db->where('is_verified',1);
        $this->db->order_by('ca.user_id','DESC');
        return $this->db->get()->result_array();
    }
    public function getCertificationAgencyById($id) {
        $this->db->select("ca.*,a.name");
        $this->db->from('tbl_certification_agency ca');
        $this->db->join('tbl_agency a','a.id = ca.agency_id');
        $this->db->where('ca.user_id',$id);
        return $this->db->get()->row_array();
    }
    public function getAgencies() {
        //$this->db->order_by('u.user_id','DESC');
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
