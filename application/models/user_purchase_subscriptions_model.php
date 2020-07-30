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

class user_purchase_subscriptions_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
        $arrSession = UserSession();
        $this->arrUserSession = '';
        if( true == $arrSession['success'] ) {
            $this->arrUserSession = $arrSession['userData'];
            if( ADMINUSERNAME == $this->arrUserSession['username'] ){
                $this->arrUserSession['user_id'] = 1;
            }
        }
    }
    
    public function getUserPurchaseSubscriptions() {
        $this->db->select( 'tups.*, tu.fullname, tut.name as user_type_name' );
        $this->db->from( 'tbl_user_purchase_subscriptions tups' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tups.user_id', 'left' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tu.user_type_id', 'left' );
        $this->db->order_by( 'tups.user_purchase_subscription_id', 'desc' );
        return $this->db->get()->result_array();
    }
    
    public function getUserPurchaseSubscriptionsByUserId( $intUserId ) {
        $this->db->select( 'tups.*, tu.fullname, tut.name as user_type_name' );
        $this->db->from( 'tbl_user_purchase_subscriptions tups' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tups.user_id', 'left' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tu.user_type_id', 'left' );
        $this->db->order_by( 'tups.user_purchase_subscription_id', 'desc' );
        $this->db->where( 'tups.user_id', $intUserId );
        return $this->db->get()->result_array();
    }
    
    public function getUserPurchaseSubscriptionDetailsBySubscriptionIdByUserId( $intSubscriptionId, $intUserId ) {
        $this->db->select( '*' );
        $this->db->from( 'tbl_user_purchase_subscriptions' );
        $this->db->where( 'subscription_plan_id', $intSubscriptionId );
        $this->db->where( 'user_id', $intUserId );
        return $this->db->get()->row_array();
    }
    
    public function insert( $arrInsertData ){
        
        $arrInsertData['updated_at'] = CURRENT_DATETIME;
        if( true == isset( $this->arrUserSession['user_id'] ) ) {
            $arrInsertData['created_by'] = $this->arrUserSession['user_id'];
            $arrInsertData['updated_by'] = $this->arrUserSession['user_id'];
        } else {
            if( false == isset( $arrInsertData['created_by'] ) ) { 
                $arrInsertData['created_by'] = ADMIN_ID;
            }
            if( false == isset( $arrInsertData['updated_by'] ) ) {
                $arrInsertData['updated_by'] = ADMIN_ID;
            }
        }
        
        $this->db->insert( 'tbl_user_purchase_subscriptions', $arrInsertData );
        $intLastId = $this->db->insert_id();
        
        return $intLastId;
    }
    public function update( $arrUpdateData ){
        
        $arrUpdateData['updated_at'] = CURRENT_DATETIME;
        if( true == isset( $this->arrUserSession['user_id'] ) ) { 
            $arrUpdateData['updated_by'] = $this->arrUserSession['user_id'];
        } else {
            if( false == isset( $arrUpdateData['updated_by'] ) ) {
                $arrUpdateData['updated_by'] = ADMIN_ID;
            }
        }   
        
        $this->db->where( 'user_purchase_subscription_id', $arrUpdateData['user_purchase_subscription_id'] );
        $this->db->update( 'tbl_user_purchase_subscriptions', $arrUpdateData );
        
        if( $this->db->affected_rows() ){
            return true;
        }else{
            return false;
        }
    }
    

    public function delete( $intUserPurchaseSubscriptionId ) {
        $this->db->where( 'user_purchase_subscription_id', $intUserPurchaseSubscriptionId );
        $this->db->delete( 'tbl_user_purchase_subscriptions' ); 
        if( $this->db->affected_rows() ){
            return true;
        }else{
            return false;
        }
    }
    
}
