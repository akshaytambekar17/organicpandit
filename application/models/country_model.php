<?php
if ( ! defined( 'BASEPATH' )) exit( 'No direct script access allowed' );
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
class country_model extends CI_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getCountries() {
        return $this->db->get( 'countries' )->result_array();
    }
    public function getCountryById( $intCountryId ) {
        $this->db->where( 'id' , $intCountryId ) ;
        return $this->db->get( 'countries' )->row_array();
    }
    
    public function add( $arrInsertData ) {
        $this->db->insert( 'countries', $arrInsertData );
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    public function update( $arrUpdateData ) {
        $this->db->where( 'id', $arrUpdateData['id'] );
        $this->db->update( 'countries', $arrUpdateData );
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function delete( $intCountryId ) {
        $this->db->where( 'id ', $intCountryId );
        $this->db->delete( 'countries' ); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
