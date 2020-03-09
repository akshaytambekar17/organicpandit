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
class user_exhibition_images_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function getUserExhibitionImages() {
        $this->db->select( 'tue.*, tuei.*' );
        $this->db->from( 'tbl_user_exhibition_images tuei' );
        $this->db->join( 'tbl_user_exhibitions tue', 'tue.user_exhibition_id = tuei.user_exhibition_id' );
        $this->db->order_by( 'tuei.id', 'DESC' );
        return $this->db->get()->result_array();
    }

    public function getUserExhibitionImagesByUserExhibitionId( $intUserExhibitionId ) {
        $this->db->select( 'tue.*, tuei.*' );
        $this->db->from( 'tbl_user_exhibition_images tuei' );
        $this->db->join( 'tbl_user_exhibitions tue', 'tue.user_exhibition_id = tuei.user_exhibition_id' );
        $this->db->where( 'tuei.user_exhibition_id', $intUserExhibitionId );
        return $this->db->get()->result_array();
    }

    public function getUserExhibitionImagesByUserId( $intUserId ) {
        $this->db->select('tue.*, tuei.*');
        $this->db->from( 'tbl_user_exhibition_images tuei');
        $this->db->join( 'tbl_user_exhibitions tue', 'tue.user_exhibition_id = tuei.user_exhibition_id' );
        $this->db->where( 'tue.user_id', $intUserId );
        return $this->db->get()->result_array();
    }

    public function insertBatch( $arrInsertBatchData ) {        
        $this->db->insert_batch( 'tbl_user_exhibition_images', $arrInsertBatchData );
        $intUserExhibitionImageId = $this->db->insert_id();
        return $intUserExhibitionImageId;
    }
    
    public function insert( $arrInsertData ) {
        $this->db->insert( 'tbl_user_exhibition_images', $arrInsertData );
        $intLastInsertedId = $this->db->insert_id();
        return $intLastInsertedId;
    }

    public function update( $arrUpdateData ) {
        $this->db->where('id', $arrUpdateData['id']);
        $this->db->update('tbl_user_exhibition_images', $arrUpdateData);
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function updateByUserExhibitionId( $arrUpdateData ) {
        $this->db->where( 'user_exhibition_id', $arrUpdateData['user_exhibition_id'] );
        $this->db->update( 'tbl_user_exhibition_images', $arrUpdateData );
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteByUserExhibitionId( $intUserExhibitionId ) {
        $this->db->where('user_exhibition_id', $intUserExhibitionId);
        $this->db->delete('tbl_user_exhibition_images');
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete( $intUserExhibitionImageId ) {
        $this->db->where('user_exhibition_image_id', $intUserExhibitionImageId);
        $this->db->delete('tbl_user_exhibition_images');
        if ($this->db->affected_rows()) {
                return true;
        } else {
                return false;
        }
    }

}
