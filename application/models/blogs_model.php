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
class blogs_model extends CI_Model {

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
    
    public function getBlogs() {
        $this->db->order_by( 'blog_id', 'DESC' );
        return $this->db->get( 'tbl_blogs' )->result_array();
    }
    
    public function getActiveBlogs() {
        $this->db->where( 'blog_status', ENABLED );
        $this->db->order_by( 'blog_id', 'DESC' );
        return $this->db->get( 'tbl_blogs' )->result_array();
    }
    
    public function getBlogByBlogId( $intBlogId ) {
        $this->db->where( 'blog_id', $intBlogId );
        return $this->db->get( 'tbl_blogs' )->row_array();
    }
    
    public function insert( $arrInsertData ){
        $arrInsertData['updated_at'] = CURRENT_DATETIME;
        $arrInsertData['created_by'] = $this->arrUserSession['user_id'];
        $arrInsertData['updated_by'] = $this->arrUserSession['user_id'];
        
        $this->db->insert( 'tbl_blogs', $arrInsertData );
        $intBlogId = $this->db->insert_id();
        return $intBlogId;
    }
    
    public function update( $arrUpdateData ){
        $arrUpdateData['updated_at'] = CURRENT_DATETIME;
        if( true == isset( $this->arrUserSession['user_id'] ) ) { 
            $arrUpdateData['updated_by'] = $this->arrUserSession['user_id'];
        } 
        
        $this->db->where( 'blog_id', $arrUpdateData['blog_id'] );
        $this->db->update( 'tbl_blogs', $arrUpdateData );
        if( $this->db->affected_rows() ) {
            return true;
        }else{
            return false;
        }
    }
    
    public function delete( $intBlogId ) {
        $this->db->where( 'blog_id', $intBlogId );
        $this->db->delete( 'tbl_blogs' ); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    
}

