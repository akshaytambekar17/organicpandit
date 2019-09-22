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
class user_certifications_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function getUserCertification() {
        $this->db->order_by('users_certification_id','DESC');
        return $this->db->get('tbl_user_certifications')->result_array();
    }

    public function getUserCertificationByUserId( $intUserId ) {
        $this->db->where( 'user_id', $intUserId );
        return $this->db->get('tbl_user_certifications')->result_array();
    }

    public function getUserCertificationByUserCertificationId( $intUsersCertificationId ) {
            $this->db->where('users_certification_id',$intUsersCertificationId);
            return $this->db->get('tbl_user_certifications')->row_array();
    }

    public function getUserCertificationByCertificationId( $intCertificationId ) {
        $this->db->where('certification_id',$intCertificationId);
        return $this->db->get('tbl_bid')->result_array();
    }

    public function insert($data){
        $this->db->insert('tbl_user_certifications', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }

    public function insertBatch( $arrmixBatchData ){
            $this->db->insert_batch('tbl_user_certifications', $arrmixBatchData);
            if($this->db->affected_rows()){
                    return true;
            }else{
                    return false;
            }
    }

    public function update($updateData){
        $this->db->where('users_certification_id',$updateData['users_certification_id']);
        $this->db->update('tbl_user_certifications',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function updateByUserId($updateData){
        $this->db->where('user_id',$updateData['user_id']);
        $this->db->update('tbl_user_certifications',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function delete( $intUserCeritificationId ) {
        $this->db->where( 'user_ceritification_id', $intUserCeritificationId );
        $this->db->delete( 'tbl_user_certifications' );
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    
    public function deleteByUserId( $intUserId ) {
        $this->db->where( 'user_id', $intUserId );
        $this->db->delete( 'tbl_user_certifications' );
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

}
