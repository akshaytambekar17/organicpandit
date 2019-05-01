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
class search_enquiry_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getSearchEnquiries() {
        $this->db->select("tse.*,u.*,ut.name as user_type_name,");
        $this->db->from('tbl_search_enquiry tse');
        $this->db->join('tbl_user tu','tu.user_id = tse.user_id');
        $this->db->join('tbl_user_type tut','tut.id = tse.user_type_id');
        $this->db->order_by('tse.id','DESC');
        return $this->db->get()->result_array();
    }
    
    public function getSearchEnquiryById($id) {
        $this->db->select("u.*,ut.name as user_type_name,");
        $this->db->from('tbl_users u');
        $this->db->join('tbl_user_type ut','ut.id = u.user_type_id');
        $this->db->where('user_id',$id);
        return $this->db->get()->row_array();
    }
    
    public function getSearchEnquiryByPartnerUserId( $partnerUserId ) {
        $this->db->select("u.*,ut.name as user_type_name,");
        $this->db->from('tbl_users u');
        $this->db->join('tbl_user_type ut','ut.id = u.user_type_id');
        $this->db->where('u.partner_user_id',$partnerUserId);
        $this->db->order_by('u.user_id','DESC');
        return $this->db->get()->result_array();
    }
    
    public function getSearchEnquiryByUserTypeId( $userTypeId ) {
        $this->db->select("u.*,ut.name as user_type_name,");
        $this->db->from('tbl_users u');
        $this->db->join('tbl_user_type ut','ut.id = u.user_type_id');
        $this->db->where('u.user_type_id',$userTypeId);
        return $this->db->get()->result_array();
    }
    
    public function getSearchEnquiryFarmers() {
        $this->db->order_by('id','DESC');
        return $this->db->get('tbl_farmer')->result_array();
    }
    
    public function insert($data){
        $this->db->insert('tbl_search_enquiry', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    public function update($updateData){
        $this->db->where('user_id',$updateData['user_id']);
        $this->db->update('tbl_users',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function updateIsView(){
        $updateData = array('is_view' => 1);
        $this->db->update('tbl_users',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id) {
        $this->db->where('user_id',$id);
        $this->db->delete('tbl_users'); 
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
