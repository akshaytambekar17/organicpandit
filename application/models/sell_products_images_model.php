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
class sell_products_images_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function getSellProductImages() {
        $this->db->select('tsp.*, tspi.*');
        $this->db->from('tbl_sell_products_images tspi');
        $this->db->join('tbl_sell_products tsp', 'tsp.sell_product_id = tspi.sell_product_id');
        $this->db->order_by('tspi.id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getSellProductImagesBySellProductId( $intSellProductId ) {
	    $this->db->select('tsp.*, tspi.*');
	    $this->db->from('tbl_sell_products_images tspi');
	    $this->db->join('tbl_sell_products tsp', 'tsp.sell_product_id = tspi.sell_product_id');
	    $this->db->where('tspi.sell_product_id', $intSellProductId);
        return $this->db->get()->row_array();
    }

    public function getSellProductImagesByUserId( $intUserId ) {
	    $this->db->select('tsp.*, tspi.*');
	    $this->db->from('tbl_sell_products_images tspi');
	    $this->db->join('tbl_sell_products tsp', 'tsp.sell_product_id = tspi.sell_product_id');
	    $this->db->where('tsp.user_id', $intUserId);
        return $this->db->get()->result_array();
    }

    public function insert($data) {
        $this->db->insert('tbl_sell_products_images', $data);
        $intLastInsertedId = $this->db->insert_id();
        return $intLastInsertedId;
    }

    public function update( $arrUpdateData ) {
        $this->db->where('id', $arrUpdateData['id']);
        $this->db->update('tbl_sell_products_images', $arrUpdateData);
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

	public function delete( $intSellProductImageId ) {
		$this->db->where('id', $intSellProductImageId);
		$this->db->delete('tbl_sell_products');
		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}

}
