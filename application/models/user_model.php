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
    
    public function getUsers() {
        $this->db->select("u.*,ut.name as user_type_name,");
        $this->db->from('tbl_users u');
        $this->db->join('tbl_user_type ut','ut.id = u.user_type_id');
        $this->db->order_by('u.user_id','DESC');
        return $this->db->get()->result_array();
    }
    
    public function getUserById($id) {
        $this->db->select("u.*,ut.name as user_type_name,");
        $this->db->from('tbl_users u');
        $this->db->join('tbl_user_type ut','ut.id = u.user_type_id');
        $this->db->where('user_id',$id);
        return $this->db->get()->row_array();
    }
    
    public function getUserByPartnerUserId( $partnerUserId ) {
        $this->db->select("u.*,ut.name as user_type_name,");
        $this->db->from('tbl_users u');
        $this->db->join('tbl_user_type ut','ut.id = u.user_type_id');
        $this->db->where('u.partner_user_id',$partnerUserId);
        $this->db->order_by('u.user_id','DESC');
        return $this->db->get()->result_array();
    }
    
    public function getUserByUserTypeId( $userTypeId ) {
        $this->db->select("u.*,ut.name as user_type_name,");
        $this->db->from('tbl_users u');
        $this->db->join('tbl_user_type ut','ut.id = u.user_type_id');
        $this->db->where('u.user_type_id',$userTypeId);
        return $this->db->get()->result_array();
    }
    
    public function getUserLoginByUsernamePassword( $username, $password ) {
        $this->db->select("u.*,ut.name as user_type_name,");
        $this->db->from('tbl_users u');
        $this->db->join('tbl_user_type ut','ut.id = u.user_type_id');
        $this->db->where('username', $username );
        $this->db->where('password',  md5( $password ) );
        return $this->db->get()->row_array();
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
    public function getUserBysearchKey($data) {
        if(!empty($data['state_id']) && !empty($data['city_id'])){
            $this->db->where('state_id',$data['state_id']);
            $this->db->where('city_id',$data['city_id']);
        }
        if(!empty($data['certification_id'])){
            $this->db->where('certification_id',$data['certification_id']);
        }
        $this->db->where('user_type_id',$data['user_type_id']);
        //$this->db->where('is_verified',2);
        return $this->db->get('tbl_users')->result_array();
    }
    public function insert($data){
        $this->db->insert('tbl_users', $data);
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
