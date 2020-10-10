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
class invoices_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->arrUserSession = '';
        $arrSession = UserSession();
        if( true == $arrSession['success'] ) {
            $this->arrUserSession = $arrSession['userData'];
            if( ADMINUSERNAME == $this->arrUserSession['username'] ){
                $this->arrUserSession['user_id'] = 1;
            }
        }
    }

    public function getInvoices() {
        $this->db->select( 'ti.*, tos.*, tu.fullname' );
        $this->db->from( 'tbl_invoices ti' );
        $this->db->join( 'tbl_orders tos', 'tos.order_id = ti.order_id' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = ti.user_id' );
        $this->db->order_by( 'ti.invoice_id', 'DESC' );
        return $this->db->get()->result_array();
    }
    
    public function getInvoiceByInvoiceId( $intInvoiceId ) {
        $this->db->select( 'ti.*, tos.*, tu.fullname' );
        $this->db->from( 'tbl_invoices ti' );
        $this->db->join( 'tbl_orders tos', 'tos.order_id = ti.order_id' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = ti.user_id', 'left' );
        $this->db->where( 'ti.invoice_id', $intInvoiceId );
        $this->db->order_by( 'ti.invoice_id', 'DESC' );
        return $this->db->get()->row_array();
    }

    public function getInvoiceByUserId( $intUserId ) {
        $this->db->select( 'ti.*, tos.*, tu.fullname' );
        $this->db->from( 'tbl_invoices ti' );
        $this->db->join( 'tbl_orders tos', 'tos.order_id = ti.order_id' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = ti.user_id', 'left' );
        $this->db->where( 'ti.user_id', $intUserId );
        $this->db->order_by( 'ti.invoice_id', 'DESC' );
        return $this->db->get()->result_array();
    }
    
    public function getInvoiceByOrderId( $intOrderId ) {
        $this->db->select( 'ti.*, to.*, tu.fullname' );
        $this->db->from( 'tbl_invoices ti' );
        $this->db->join( 'tbl_orders to', 'to.order_id = ti.order_id' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = ti.user_id', 'left' );
        $this->db->where( 'ti.order_id', $intOrderId );
        $this->db->order_by( 'ti.invoice_id', 'DESC' );
        return $this->db->get()->row_array();
    }

    public function insert( $arrInsertData ) {
        $arrInsertData['updated_at'] = CURRENT_DATETIME;
        if( true == isset( $this->arrUserSession['user_id'] ) ) {
            $arrInsertData['created_by'] = $this->arrUserSession['user_id'];
        } else {
            $arrInsertData['created_by'] = $arrInsertData['user_id'];
        }
        
        $this->db->insert('tbl_invoices', $arrInsertData);
        $intLastId = $this->db->insert_id();
        return $intLastId;
    }

    public function update($arrUpdateData) {
        $arrUpdateData['updated_at'] = CURRENT_DATETIME;
        $this->db->where('invoice_id', $arrUpdateData['invoice_id']);
        $this->db->update('tbl_invoices', $arrUpdateData);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete( $intInvoiceId ) {
        $this->db->where( 'invoice_id', $intInvoiceId );
        $this->db->delete( 'tbl_invoices' );
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

}
