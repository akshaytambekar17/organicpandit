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
class send_enquiry_buyer_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function getSendEnquiryBuyers() {
        $this->db->select('tseb.*,tsp.*,tu.fullname as buyer_name, tp.name as product_name, tcp.name as category_name');
        $this->db->from('tbl_send_enquiry_buyer tseb');
        $this->db->join('tbl_sell_products tsp', 'tsp.sell_product_id = tseb.sell_product_id','left' );
	    $this->db->join('tbl_users tu', 'tu.user_id = tseb.buyer_id','left');
	    $this->db->join('tbl_product tp', 'tp.id = tsp.product_id','left');
	    $this->db->join('tbl_product_category tcp', 'tcp.id = tsp.category_id','left');
        $this->db->order_by('tseb.id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getSendEnquiryBuyersBySellProductId( $intSellProductId ) {
	    $this->db->select('tsp.*, tseb.*, tu.fullname as buyer_name, tp.name as product_name, tcp.name as category_name');
	    $this->db->from('tbl_send_enquiry_buyer tseb');
	    $this->db->join('tbl_sell_products tsp', 'tsp.sell_product_id = tseb.sell_product_id','left');
	    $this->db->join('tbl_users tu', 'tu.user_id = tseb.buyer_id','left');
	    $this->db->join('tbl_product tp', 'tp.id = tsp.product_id','left');
	    $this->db->join('tbl_product_category tcp', 'tcp.id = tsp.category_id','left');
	    $this->db->where('tseb.sell_product_id', $intSellProductId);
        return $this->db->get()->row_array();
    }

    public function getSendEnquiryBuyersByUserId( $intUserId ) {
	    $this->db->select('tseb.*, tsp.*, tu.fullname as buyer_name, tp.name as product_name, tcp.name as category_name');
	    $this->db->from('tbl_send_enquiry_buyer tseb');
	    $this->db->join('tbl_sell_products tsp', 'tsp.sell_product_id = tseb.sell_product_id','left');
	    $this->db->join('tbl_users tu', 'tu.user_id = tseb.buyer_id','left');
	    $this->db->join('tbl_product tp', 'tp.id = tsp.product_id','left');
	    $this->db->join('tbl_product_category tcp', 'tcp.id = tsp.category_id','left');
	    $this->db->where('tsp.user_id', $intUserId);
        return $this->db->get()->result_array();
    }

	public function getSendEnquiryBuyersByBuyerId( $intBuyerId ) {
		$this->db->select('tsp.*, tseb.*,tu.fullname as seller_name');
		$this->db->from('tbl_send_enquiry_buyer tseb');
		$this->db->join('tbl_sell_products tsp', 'tsp.sell_product_id = tseb.sell_product_id');
		$this->db->join('tbl_users tu', 'tu.user_id = tsp.user_id','left');
		$this->db->where('tseb.buyer_id', $intBuyerId);
		return $this->db->get()->result_array();
	}

    public function insert($data) {
        $this->db->insert('tbl_send_enquiry_buyer', $data);
        $intLastInsertedId = $this->db->insert_id();
        return $intLastInsertedId;
    }

    public function update( $arrUpdateData ) {
        $this->db->where('id', $arrUpdateData['id']);
        $this->db->update('tbl_send_enquiry_buyer', $arrUpdateData);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteBySellProductId( $intSellProductId ) {
        $this->db->where('sell_product_id', $intSellProductId);
        $this->db->delete('tbl_sell_products');
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

	public function delete( $intSendEnquiryBuyerId ) {
		$this->db->where('id', $intSendEnquiryBuyerId);
		$this->db->delete('tbl_sell_products');
		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}

}
