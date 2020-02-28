<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Soil_model
 *
 * @author comc
 */
class app_slider_images_model extends CI_Model {

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
    
    public function getAppSliderImages() {
        $this->db->order_by( 'app_slider_image_id', 'desc' );
        return $this->db->get( 'tbl_app_slider_images' )->result_array();
    }
    
    public function getAppSliderImageByAppSliderImageId( $intAppSliderImageId ) {
        $this->db->where( 'app_slider_image_id', $intAppSliderImageId );
        return $this->db->get( 'tbl_app_slider_images' )->row_array();
    }
    
    public function insert( $arrInsertData ){
        $arrInsertData['updated_at'] = CURRENT_DATETIME;
        $arrInsertData['created_by'] = $this->arrUserSession['user_id'];
        $arrInsertData['updated_by'] = $this->arrUserSession['user_id'];
        
        $this->db->insert( 'tbl_app_slider_images', $arrInsertData );
        $intAppSliderImageId = $this->db->insert_id();
        return $intAppSliderImageId;
    }
    
    public function update( $arrUpdateData ){
        $arrUpdateData['updated_at'] = CURRENT_DATETIME;
        if( true == isset( $this->arrUserSession['user_id'] ) ) { 
            $arrUpdateData['updated_by'] = $this->arrUserSession['user_id'];
        } 
        
        $this->db->where( 'app_slider_image_id', $arrUpdateData['app_slider_image_id'] );
        $this->db->update( 'tbl_app_slider_images', $arrUpdateData );
        if( $this->db->affected_rows() ) {
            return true;
        }else{
            return false;
        }
    }
    
    public function delete( $intAppSliderImageId ) {
        $this->db->where( 'app_slider_image_id', $intAppSliderImageId );
        $this->db->delete( 'tbl_app_slider_images' ); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    
}

