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
class user_ecommerces_model extends CI_Model {

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

    public function getUserEcommerces() {
        $this->db->select( 'tue.*, tuei.*, tp.name as product_name, tcp.name as category_name, tu.fullname, tut.name as user_type_name' );
        $this->db->from( 'tbl_user_ecommerces tue' );
        $this->db->join( 'tbl_user_ecommerce_images tuei', 'tuei.user_ecommerce_id = tue.user_ecommerce_id' );
        $this->db->join( 'tbl_product tp', 'tp.id = tue.product_id' );
        $this->db->join( 'tbl_product_category tcp', 'tcp.id = tue.category_id' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tue.user_id', 'left' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tue.user_type_id', 'left' );
        $this->db->order_by( 'tue.user_ecommerce_id', 'DESC' );
        return $this->db->get()->result_array();
    }
    
    public function getUserEcommercesByUserTypeId( $intUserTypeId ) {
        $this->db->select( 'tue.*, tuei.*, tp.name as product_name, tcp.name as category_name, tu.fullname, tut.name as user_type_name' );
        $this->db->from( 'tbl_user_ecommerces tue' );
        $this->db->join( 'tbl_user_ecommerce_images tuei', 'tuei.user_ecommerce_id = tue.user_ecommerce_id' );
        $this->db->join( 'tbl_product tp', 'tp.id = tue.product_id' );
        $this->db->join( 'tbl_product_category tcp', 'tcp.id = tue.category_id' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tue.user_id', 'left' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tue.user_type_id', 'left' );
        $this->db->where( 'tue.user_type_id', $intUserTypeId );
        $this->db->order_by( 'tue.user_ecommerce_id', 'DESC' );
        return $this->db->get()->result_array();
    }

    public function getUserEcommerceByUserEcommerceId( $intUserEcommerceId ) {
        $this->db->select( 
                        'tue.*, '
                        . 'tuei.*, tp.name as product_name, '
                        . 'tcp.name as category_name, '
                        . 'tu.fullname, tut.name as user_type_name, '
                        . 'tmd.slug, tmd.meta_title, tmd.meta_keyword, tmd.meta_description' );
        $this->db->from( 'tbl_user_ecommerces tue' );
        $this->db->join( 'tbl_user_ecommerce_images tuei', 'tuei.user_ecommerce_id = tue.user_ecommerce_id' );
        $this->db->join( 'tbl_product tp', 'tp.id = tue.product_id' );
        $this->db->join( 'tbl_product_category tcp', 'tcp.id = tue.category_id' );
        $this->db->join( 'tbl_meta_data tmd', 'tmd.user_ecommerce_id = tue.user_ecommerce_id' ,'left' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tue.user_id', 'left' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tue.user_type_id', 'left' );
        $this->db->where( 'tue.user_ecommerce_id', $intUserEcommerceId );
        return $this->db->get()->row_array();
    }

    public function getUserEcommerceByUserId( $intUserId ) {
        $this->db->select( 'tue.*, tuei.*, tp.name as product_name, tcp.name as category_name, tu.fullname, tut.name as user_type_name' );
        $this->db->from( 'tbl_user_ecommerces tue' );
        $this->db->join( 'tbl_user_ecommerce_images tuei', 'tuei.user_ecommerce_id = tue.user_ecommerce_id' );
        $this->db->join( 'tbl_product tp', 'tp.id = tue.product_id' );
        $this->db->join( 'tbl_product_category tcp', 'tcp.id = tue.category_id' );
        $this->db->join( 'tbl_users tu', 'tu.user_id = tue.user_id', 'left' );
        $this->db->join( 'tbl_user_type tut', 'tut.id = tue.user_type_id', 'left' );
        $this->db->where( 'tue.user_id', $intUserId );
        $this->db->order_by( 'tue.user_ecommerce_id', 'desc' );
        return $this->db->get()->result_array();
    }

    public function getUserEcommerceByProductIdByCategoryId($intProductId, $intCategoryId) {
        $this->db->select('tue.*,tu.*,tp.name as product_name, tcp.name as category_name,c.name as city_name, ta.name as certificaton_agency_name');
        $this->db->from('tbl_user_ecommerces tue');
        $this->db->join('tbl_users tu', 'tu.user_id = tue.user_id','left');
        $this->db->join('tbl_product tp', 'tp.id = tue.product_id');
        $this->db->join('tbl_product_category tcp', 'tcp.id = tue.category_id');
        $this->db->join('tbl_certification_agency tca', 'tca.user_id = tue.certification_id', 'left');
        $this->db->join('cities c', 'c.id = tue.delivery_location', 'left');
        $this->db->join('tbl_agency ta', ' ta.id = tca.agency_id', 'left');
        $this->db->where('tue.product_id', $intProductId);
        $this->db->where('tue.category_id', $intCategoryId);
        return $this->db->get()->result_array();
    }

    public function insert( $arrInsertData ) {
        $arrInsertData['updated_at'] = CURRENT_DATETIME;
        if( true == isset( $this->arrUserSession['user_id'] ) ) {
            $arrInsertData['created_by'] = $this->arrUserSession['user_id'];
            $arrInsertData['updated_by'] = $this->arrUserSession['user_id'];
        } else {
            $arrInsertData['created_by'] = $arrInsertData['user_id'];
            $arrInsertData['updated_by'] = $arrInsertData['user_id'];
        }
        
        $this->db->insert('tbl_user_ecommerces', $arrInsertData);
        $intLastId = $this->db->insert_id();
        return $intLastId;
    }

    public function update($arrUpdateData) {
        $arrUpdateData['updated_at'] = CURRENT_DATETIME;
        if( true == isset( $this->arrUserSession['user_id'] ) ) { 
            $arrUpdateData['updated_by'] = $this->arrUserSession['user_id'];
        } 
        $this->db->where('user_ecommerce_id', $arrUpdateData['user_ecommerce_id']);
        $this->db->update('tbl_user_ecommerces', $arrUpdateData);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($intUserEcommerceId) {
        $this->db->where('user_ecommerce_id', $intUserEcommerceId);
        $this->db->delete('tbl_user_ecommerces');
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

}
