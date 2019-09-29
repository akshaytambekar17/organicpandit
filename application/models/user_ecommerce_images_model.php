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
class user_ecommerce_images_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function getUserEcommerceImages() {
        $this->db->select( 'tue.*, tuei.*' );
        $this->db->from( 'tbl_user_ecommerce_images tuei' );
        $this->db->join( 'tbl_user_ecommerce tue', 'tue.user_ecommerce_id = tuei.user_ecommerce_id' );
        $this->db->order_by( 'tuei.id', 'DESC' );
        return $this->db->get()->result_array();
    }

    public function getUserEcommerceImagesByUserEcommerceId( $intUserEcommerceId ) {
        $this->db->select( 'tue.*, tuei.*' );
        $this->db->from( 'tbl_user_ecommerce_images tuei' );
        $this->db->join( 'tbl_user_ecommerce tue', 'tue.user_ecommerce_id = tuei.user_ecommerce_id' );
        $this->db->where( 'tuei.user_ecommerce_id', $intUserEcommerceId );
        return $this->db->get()->row_array();
    }

    public function getUserEcommerceImagesByUserId( $intUserId ) {
        $this->db->select('tue.*, tuei.*');
        $this->db->from('tbl_user_ecommerce_images tuei');
        $this->db->join('tbl_user_ecommerce tue', 'tue.user_ecommerce_id = tuei.user_ecommerce_id');
        $this->db->where('tue.user_id', $intUserId);
        return $this->db->get()->result_array();
    }

    public function insert($data) {
        $this->db->insert('tbl_user_ecommerce_images', $data);
        $intLastInsertedId = $this->db->insert_id();
        return $intLastInsertedId;
    }

    public function update( $arrUpdateData ) {
        $this->db->where('id', $arrUpdateData['id']);
        $this->db->update('tbl_user_ecommerce_images', $arrUpdateData);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function updateByUserEcommerceId( $arrUpdateData ) {
        $this->db->where( 'user_ecommerce_id', $arrUpdateData['user_ecommerce_id'] );
        $this->db->update( 'tbl_user_ecommerce_images', $arrUpdateData );
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteByUserEcommerceId( $intUserEcommerceId ) {
        $this->db->where('user_ecommerce_id', $intUserEcommerceId);
        $this->db->delete('tbl_user_ecommerce');
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete( $intUserEcommerceImageId ) {
        $this->db->where('id', $intUserEcommerceImageId);
        $this->db->delete('tbl_user_ecommerce');
        if ($this->db->affected_rows()) {
                return true;
        } else {
                return false;
        }
    }

}
