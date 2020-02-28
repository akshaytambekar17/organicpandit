<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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

class user_model extends CI_Model {

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
    
    public function getUsers() {
        $this->db->select( 'u.*,'
                            . 'ut.name as user_type_name,'
                            . '( select name from tbl_user_type where id = u.partner_type_id ) as partner_type_name,'
                            . '( select fullname from tbl_users where user_id = u.partner_user_id ) as partner_fullname '  
                        );
        $this->db->from('tbl_users u');
        $this->db->join('tbl_user_type ut','ut.id = u.user_type_id');
        $this->db->order_by('u.user_id','DESC');
        return $this->db->get()->result_array();
    }
    
    public function getUsersByUserType() {
        $this->db->select( 'u.*,'
                            . 'ut.name as user_type_name,'
                            . '( select name from tbl_user_type where id = u.partner_type_id ) as partner_type_name,'
                            . '( select fullname from tbl_users where user_id = u.partner_user_id ) as partner_fullname '  
                        );
        $this->db->from('tbl_users u');
        $this->db->join('tbl_user_type ut','ut.id = u.user_type_id');
        $this->db->where_in('u.user_type_id', getUserTypes());
        $this->db->order_by('u.user_id','DESC');
        return $this->db->get()->result_array();
    }
    
    public function getUsersByUserTypeOtherThenProducts() {
        $this->db->select( 'u.*,'
                            . 'ut.name as user_type_name,'
                            . '( select name from tbl_user_type where id = u.partner_type_id ) as partner_type_name,'
                            . '( select fullname from tbl_users where user_id = u.partner_user_id ) as partner_fullname '  
                        );
        $this->db->from('tbl_users u');
        $this->db->join('tbl_user_type ut','ut.id = u.user_type_id');
        $this->db->where_in('u.user_type_id', getUserTypesOtherThenProducts());
        $this->db->order_by('u.user_id','DESC');
        return $this->db->get()->result_array();
    }
    
    public function getUserById( $intUserId ) {
        $this->db->select( "u.*,ut.name as user_type_name, ubd.*" );
        $this->db->from( 'tbl_users u' );
        $this->db->join( 'tbl_user_type ut', 'ut.id = u.user_type_id' );
        $this->db->join( 'tbl_users_bank_details ubd', 'ubd.user_id = u.user_id', 'left' );
        $this->db->where( 'u.user_id', $intUserId );
        return $this->db->get()->row_array();
    }
    
    public function getUserByPartnerUserId( $partnerUserId ) {
        $this->db->select("u.*,ut.name as user_type_name,");
        $this->db->from('tbl_users u');
        $this->db->join('tbl_user_type ut','ut.id = u.user_type_id');
        $this->db->where('u.partner_user_id',$partnerUserId);
        $this->db->order_by('u.user_id','DESC');
        return $this->db->get()->result_array();
    }
    
    public function getUserByUserTypeId( $intUserTypeId ) {
        $this->db->select( 'u.*,'
                            . 'ut.name as user_type_name,'
                            . '( select name from tbl_user_type where id = u.partner_type_id ) as partner_type_name,'
                            . '( select fullname from tbl_users where user_id = u.partner_user_id ) as partner_fullname '  
                        );
        $this->db->from( 'tbl_users u' );
        $this->db->join( 'tbl_user_type ut','ut.id = u.user_type_id' );
        $this->db->where( 'u.user_type_id', $intUserTypeId );
        $this->db->order_by( 'u.user_id', 'DESC' );
        return $this->db->get()->result_array();
    }
    
    public function getUserLoginByUsernamePassword( $username, $password ) {
        $this->db->select("u.*,ut.name as user_type_name,");
        $this->db->from('tbl_users u');
        $this->db->join('tbl_user_type ut','ut.id = u.user_type_id');
        $this->db->where('username', $username );
        $this->db->where('password',  md5( $password ) );
        return $this->db->get()->row_array();
    }
    public function getUserLoginByUsernameByPasswordByUserTypeId( $strUsername, $strPassword, $intUserTypeId ) {
        $this->db->select( "u.*,ut.name as user_type_name,");
        $this->db->from( 'tbl_users u');
        $this->db->join( 'tbl_user_type ut','ut.id = u.user_type_id');
        $this->db->where( 'u.user_type_id', $intUserTypeId );
        $this->db->where( 'u.username', $strUsername );
        $this->db->where( 'u.password',  md5( $strPassword ) );
        return $this->db->get()->row_array();
    }
    
    public function getUserFarmers() {
        $this->db->order_by('id','DESC');
        return $this->db->get('tbl_farmer')->result_array();
    }
    public function getUserFarmerById($id) {
        $this->db->where('id',$id);
        return $this->db->get('tbl_farmer')->row_array();
    }
    public function getBidByPostRequirementId($id) {
        $this->db->where('post_requirement_id',$id);
        return $this->db->get('tbl_bid')->result_array();
    }
    public function getBidByNotView() {
        $this->db->where('is_view',0);
        return $this->db->get('tbl_bid')->result_array();
    }
    public function getUserBysearchKey( $arrData, $intLimit = '', $intOffset = 0 ) {
        if( true == isset( $arrData['state_id'] ) && true == isIdVal( $arrData['state_id'] ) ){
            $this->db->where( 'state_id', $arrData['state_id'] );
        }
        if( true == isset( $arrData['city_id'] ) && true == isIdVal( $arrData['city_id'] ) ) {
            $this->db->where( 'city_id', $arrData['city_id'] );
        }
        if( true == isset( $arrData['certification_id'] ) && true == isIdVal( $arrData['certification_id'] ) ) {
            $this->db->where( 'certification_id', $arrData['certification_id'] );
        }
        
        $this->db->where( 'user_type_id', $arrData['user_type_id'] );
        $this->db->order_by( 'user_id','desc' );
        if( true == isIdVal( $intLimit ) ) {
            $this->db->limit( $intLimit, $intOffset );
        }
        
        return $this->db->get('tbl_users')->result_array();
    }
    
    public function getUserByUserTypeIdByStateIdByCityIdByEcommerceBrand( $arrData, $intLimit = '', $intOffset = 0 ) {
        
        $this->db->select("u.*,uoie.*");
        $this->db->from('tbl_users u');
        $this->db->join('tbl_users_organic_input_ecommerce uoie','uoie.user_id = u.user_id');
        $this->db->where('u.user_type_id',$arrData['user_type_id']);
        $this->db->where('u.state_id',$arrData['state_id']);
        if( true == isset( $arrData['city_id'] ) && true == isIdVal( $arrData['city_id'] ) ) {
            $this->db->where('u.city_id',$arrData['city_id']);
        }
        if( true == isset( $arrData['search_brand'] ) && true == isVal( $arrData['search_brand'] ) ){
            $this->db->like('uoie.ecommerce_brand_id',$arrData['search_brand']);
        }
        
        if( true == isIdVal( $intLimit ) ) {
            $this->db->limit( $intLimit, $intOffset );
        }
        
        return $this->db->get()->result_array();
    }
    
    public function insert( $arrInsertData ){
        $arrInsertData['updated_at'] = CURRENT_DATETIME;
        if( true == isset( $this->arrUserSession['user_id'] ) ) {
            $arrInsertData['created_by'] = $this->arrUserSession['user_id'];
            $arrInsertData['updated_by'] = $this->arrUserSession['user_id'];
        }
        
        $this->db->insert( 'tbl_users', $arrInsertData );
        $intLastId = $this->db->insert_id();
        if( false == isset( $this->arrUserSession['user_id'] ) ) { 
            $arrUpdateData = array( 'created_by' => $intLastId,
                                    'updated_by' => $intLastId,
                                    'user_id' => $intLastId   
                            );
            $this->update( $arrUpdateData );
        }
        return $intLastId;
    }
    public function update( $arrUpdateData ){
        $arrUpdateData['updated_at'] = CURRENT_DATETIME;
        if( true == isset( $this->arrUserSession['user_id'] ) ) { 
            $arrUpdateData['updated_by'] = $this->arrUserSession['user_id'];
        }    
        
        $this->db->where( 'user_id', $arrUpdateData['user_id'] );
        $this->db->update( 'tbl_users', $arrUpdateData );
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function updateIsView(){
        $updateData = array('is_view' => 1);
        $this->db->update('tbl_users',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id) {
        $this->db->where('user_id',$id);
        $this->db->delete('tbl_users'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function getCertificationAgency() {
        //$this->db->order_by('id','DESC');
        return $this->db->get('tbl_certification')->result_array();
    }
}
