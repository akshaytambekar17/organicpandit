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
class orders_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function getOrders() {
        $this->db->select('tos.*, tup.name as user_type_name, s.name as state_name, c.name as city_name ');
        $this->db->from('tbl_orders tos');
        $this->db->join('tbl_users tu', 'tu.user_id = tos.user_id', 'left');
        $this->db->join('tbl_user_type tup', 'tup.id = tos.user_type_id', 'left');
        $this->db->join('states s', 's.id = tos.state_id', 'left');
        $this->db->join('cities c', 'c.id = tos.city_id', 'left');
        $this->db->order_by('tos.order_id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getOrderByOrderId( $intOrderId ) {
        $this->db->select('tos.*, tup.name as user_type_name, s.name as state_name, c.name as city_name ');
        $this->db->from('tbl_orders tos');
        $this->db->join('tbl_users tu', 'tu.user_id = tos.user_id', 'left');
        $this->db->join('tbl_user_type tup', 'tup.id = tos.user_type_id', 'left');
        $this->db->join('states s', 's.id = tos.state_id', 'left');
        $this->db->join('cities c', 'c.id = tos.city_id', 'left');
        $this->db->where('tos.order_id', $intOrderId);
        return $this->db->get()->row_array();
    }

    public function getOrderByUserId( $intUserId ) {
        $this->db->select('tos.*, tup.name as user_type_name, s.name as state_name, c.name as city_name ');
        $this->db->from('tbl_orders tos');
        $this->db->join('tbl_users tu', 'tu.user_id = tos.user_id', 'left');
        $this->db->join('tbl_user_type tup', 'tup.id = tos.user_type_id', 'left');
        $this->db->join('states s', 's.id = tos.state_id', 'left');
        $this->db->join('cities c', 'c.id = tos.city_id', 'left');
        $this->db->where('tos.user_id', $intUserId);
        return $this->db->get()->result_array();
    }

    
    public function insert($data) {

        $data['updated_at'] = CURRENT_DATETIME;
        $this->db->insert('tbl_orders', $data);
        $intCurrentInsertedOrderId = $this->db->insert_id();
        return $intCurrentInsertedOrderId;
    }

    public function update( $arrUpdateData ) {
        
        $arrUpdateData['updated_at'] = CURRENT_DATETIME;
        $this->db->where('order_id', $arrUpdateData['order_id']);
        $this->db->update('tbl_orders', $arrUpdateData);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($intOrderId) {
        $this->db->where('order_id', $intOrderId);
        $this->db->delete('tbl_orders');
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

}
