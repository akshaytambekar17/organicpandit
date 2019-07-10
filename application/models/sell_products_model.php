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
class sell_products_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function getSellProducts() {
        $this->db->select('tsp.*,tsp.certification_id as sell_product_certification_id, tspi.*,tspi.id as sell_product_image_id, tp.name as product_name, tcp.name as category_name, tu.fullname, c.name as city_name, ta.name as certificaton_agency_name');
        $this->db->from('tbl_sell_products tsp');
	    $this->db->join('tbl_sell_products_images tspi', 'tspi.sell_product_id = tsp.sell_product_id','left');
        $this->db->join('tbl_product tp', 'tp.id = tsp.product_id');
        $this->db->join('tbl_product_category tcp', 'tcp.id = tsp.category_id');
        $this->db->join('tbl_users tu', 'tu.user_id = tsp.user_id', 'left');
        $this->db->join('tbl_certification_agency tca', 'tca.user_id = tsp.certification_id', 'left');
        $this->db->join('cities c', 'c.id = tsp.delivery_location', 'left');
        $this->db->join('tbl_agency ta', ' ta.id = tca.agency_id', 'left');
        $this->db->order_by('tsp.sell_product_id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getSellProductBySellProductId($intSellProductId) {
        $this->db->select('tsp.*,tsp.certification_id as sell_product_certification_id,tspi.*,tspi.id as sell_product_image_id, tu.*,tp.name as product_name, tcp.name as category_name,c.name as city_name, s.name as state_name, ta.name as certificaton_agency_name');
        $this->db->from('tbl_sell_products tsp');
	    $this->db->join('tbl_sell_products_images tspi', 'tspi.sell_product_id = tsp.sell_product_id','left');
        $this->db->join('tbl_product tp', 'tp.id = tsp.product_id');
        $this->db->join('tbl_product_category tcp', 'tcp.id = tsp.category_id');
        $this->db->join('tbl_certification_agency tca', 'tca.user_id = tsp.certification_id', 'left');
        $this->db->join('cities c', 'c.id = tsp.delivery_location', 'left');
	    $this->db->join('states s', 's.id = tsp.delivery_location_state', 'left');
        $this->db->join('tbl_agency ta', ' ta.id = tca.agency_id', 'left');
        $this->db->join('tbl_users tu', 'tu.user_id = tsp.user_id', 'left');
        $this->db->where('tsp.sell_product_id', $intSellProductId);
        return $this->db->get()->row_array();
    }

    public function getSellProductByUserId($intUserId) {
        $this->db->select('tsp.*, tsp.certification_id as sell_product_certification_id, tspi.*, tspi.id as sell_product_image_id,tu.*,tp.name as product_name, tcp.name as category_name,c.name as city_name, ta.name as certificaton_agency_name');
        $this->db->from('tbl_sell_products tsp');
	    $this->db->join('tbl_sell_products_images tspi', 'tspi.sell_product_id = tsp.sell_product_id','left');
        $this->db->join('tbl_users tu', 'tu.user_id = tsp.user_id');
        $this->db->join('tbl_product tp', 'tp.id = tsp.product_id');
        $this->db->join('tbl_product_category tcp', 'tcp.id = tsp.category_id');
        $this->db->join('tbl_certification_agency tca', 'tca.user_id = tsp.certification_id', 'left');
        $this->db->join('cities c', 'c.id = tsp.delivery_location', 'left');
        $this->db->join('tbl_agency ta', ' ta.id = tca.agency_id', 'left');
        $this->db->where('tsp.user_id', $intUserId);
        return $this->db->get()->result_array();
    }

    public function getSellProductByProductIdByCategoryId($intProductId, $intCategoryId) {
        $this->db->select('tsp.*,tu.*,tp.name as product_name, tcp.name as category_name,c.name as city_name, ta.name as certificaton_agency_name');
        $this->db->from('tbl_sell_products tsp');
        $this->db->join('tbl_users tu', 'tu.user_id = tsp.user_id','left');
        $this->db->join('tbl_product tp', 'tp.id = tsp.product_id');
        $this->db->join('tbl_product_category tcp', 'tcp.id = tsp.category_id');
        $this->db->join('tbl_certification_agency tca', 'tca.user_id = tsp.certification_id', 'left');
        $this->db->join('cities c', 'c.id = tsp.delivery_location', 'left');
        $this->db->join('tbl_agency ta', ' ta.id = tca.agency_id', 'left');
        $this->db->where('tsp.product_id', $intProductId);
        $this->db->where('tsp.category_id', $intCategoryId);
        return $this->db->get()->result_array();
    }

	public function getSellProductByProductIdByCategoryIdByStateIdByCity( $intProductId, $intCategoryId, $intStateId, $intCityId ) {
		$this->db->select('tsp.*,tu.*,tp.name as product_name, tcp.name as category_name,c.name as city_name, ta.name as certificaton_agency_name');
		$this->db->from('tbl_sell_products tsp');
		$this->db->join('tbl_users tu', 'tu.user_id = tsp.user_id','left');
		$this->db->join('tbl_product tp', 'tp.id = tsp.product_id');
		$this->db->join('tbl_product_category tcp', 'tcp.id = tsp.category_id');
		$this->db->join('tbl_certification_agency tca', 'tca.user_id = tsp.certification_id', 'left');
		$this->db->join('cities c', 'c.id = tsp.delivery_location', 'left');
		$this->db->join('states s', 's.id = tsp.delivery_location_state', 'left');
		$this->db->join('tbl_agency ta', ' ta.id = tca.agency_id', 'left');
		$this->db->where('tsp.product_id', $intProductId);
		$this->db->where('tsp.category_id', $intCategoryId);
		$this->db->where('tsp.delivery_location_state', $intStateId);
		//$this->db->where('tsp.delivery_location', $intCityId);
		return $this->db->get()->result_array();
	}

    public function insert($data) {

        $data['created_at'] = CURRENT_DATETIME;
        $data['updated_at'] = CURRENT_DATETIME;
        $this->db->insert('tbl_sell_products', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }

    public function update($arrUpdateData) {
        $arrUpdateData['updated_at'] = CURRENT_DATETIME;
        $this->db->where('sell_product_id', $arrUpdateData['sell_product_id']);
        $this->db->update('tbl_sell_products', $arrUpdateData);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($intSellProductId) {
        $this->db->where('sell_product_id', $intSellProductId);
        $this->db->delete('tbl_sell_products');
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

}
