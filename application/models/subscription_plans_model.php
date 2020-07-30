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

class subscription_plans_model extends CI_Model {

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
    
    public function getSubscriptionPlans() {
        $this->db->select( '*' );
        $this->db->from( 'tbl_subscription_plans' );
        return $this->db->get()->result_array();
    }
    
    public function getSubscriptionPlanBySubscriptionPlanId( $intSubscriptionPlanId ) {
        $this->db->select( '*' );
        $this->db->from( 'tbl_subscription_plans' );
        $this->db->where( 'subscription_plan_id', $intSubscriptionPlanId );
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
        
        $this->db->insert( 'tbl_subscription_plans', $arrInsertData );
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
        
        $this->db->where( 'subscription_plan_id', $arrUpdateData['subscription_plan_id'] );
        $this->db->update( 'tbl_subscription_plans', $arrUpdateData );
        
        if( $this->db->affected_rows() ){
            return true;
        }else{
            return false;
        }
    }
    

    public function delete( $intSubscriptionPlanId ) {
        $this->db->where( 'subscription_plan_id', $intSubscriptionPlanId );
        $this->db->delete( 'tbl_subscription_plans' ); 
        if( $this->db->affected_rows() ){
            return true;
        }else{
            return false;
        }
    }
    
}
