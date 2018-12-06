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
class notifications_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getNotifications() {
        $this->db->order_by('id','DESC');
        return $this->db->get('tbl_notifications')->result_array();
    }
    public function getNotificationsById($id) {
        $this->db->where('id',$id);
        return $this->db->get('tbl_notifications')->row_array();
    }
    public function getNotificationsByPostRequirementId($id) {
        $this->db->where('post_requirement_id',$id);
        return $this->db->get('tbl_notifications')->result_array();
    }
    public function getNotificationsByNotView() {
        $this->db->where('is_view',0);
        return $this->db->get('tbl_notifications')->result_array();
    }
    public function getNotificationsByUserId($user_id) {
        $this->db->where('user_id',$user_id);
        return $this->db->get('tbl_notifications')->result_array();
    }
    
    public function insert($data){
        $this->db->insert('tbl_notifications', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    public function update($updateData){
        $this->db->where('id',$updateData['id']);
        $this->db->update('tbl_notifications',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function updateIsView(){
        $updateData = array('is_view' => 1);
        $this->db->update('tbl_notifications',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('tbl_notifications'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}