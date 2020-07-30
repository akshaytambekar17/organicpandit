<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
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
class transaction_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function getTransactions() {
        $this->db->select( 'tt.*, tos.order_no, tups.purchase_subscription_number' );
        $this->db->from( 'tbl_transaction tt' );
        $this->db->join( 'tbl_orders tos', 'tos.order_id = tt.order_id', 'left' );
        $this->db->join( 'tbl_user_purchase_subscriptions tups', 'tups.user_purchase_subscription_id = tt.user_purchase_subscription_id', 'left' );
        $this->db->order_by( 'transaction_id', 'DESC' );
        return $this->db->get()->result_array();
    }

    public function getTransactionByTransactionId( $intTransactionId ) {
        $this->db->where('transaction_id', $intTransactionId);
        return $this->db->get('tbl_transaction')->row_array();
    }

    public function getTransactionsByUserId( $intUserId ) {
        $this->db->select( 'tt.*, tos.order_no, tups.purchase_subscription_number' );
        $this->db->from( 'tbl_transaction tt' );
        $this->db->join( 'tbl_orders tos', 'tos.order_id = tt.order_id', 'left' );
        $this->db->join( 'tbl_user_purchase_subscriptions tups', 'tups.user_purchase_subscription_id = tt.user_purchase_subscription_id', 'left');
        $this->db->where( 'tos.user_id', $intUserId );
        $this->db->or_where( 'tups.user_id', $intUserId );
        
        return $this->db->get()->result_array();
    }

    public function insert($data) {
        $this->db->insert('tbl_transaction', $data);
        $intCurrentInsertedTransactionId = $this->db->insert_id();
        return $intCurrentInsertedTransactionId;
    }

    public function update( $arrUpdateData ) {

        //$arrUpdateData['updated_at'] = CURRENT_DATETIME;
        $this->db->where('transaction_id', $arrUpdateData['transaction_id']);
        $this->db->update('tbl_transaction', $arrUpdateData);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($intTransactionId) {
        $this->db->where('transaction_id', $intTransactionId);
        $this->db->delete('tbl_transaction');
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

}
