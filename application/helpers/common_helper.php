<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function prints($data) {
    echo "<pre>";
    print_r($data);
}

function printDie($data) {
    echo "<pre>";
    print_r($data);
    die;
}

function includesHeader($data) {
    $ci = & get_instance();
    $ci->load->view($data['structure'] . '/web/header', $data);
    $ci->load->view($data['structure'] . '/' . $data['view'], $data);
}

function includesHeaderSidebar($data) {
    $ci = & get_instance();
    $ci->load->view($data['structure'] . '/web/header', $data);
    $ci->load->view($data['structure'] . '/web/sidebar', $data);
    $ci->load->view($data['structure'] . '/' . $data['view'], $data);
}

function includesHeaderFooter($data) {
    $ci = & get_instance();
    $ci->load->view('web/header', $data);
    if (!empty($data['backend'])) {
        $ci->load->view($data['structure'] . '/' . $data['view'], $data);
    } else {
        $ci->load->view('includes/header', $data);
        //$ci->load->view('frontend/menubar',$data);
        $ci->load->view($data['view'], $data);
        $ci->load->view('frontend/footer', $data);
    }
    $ci->load->view('web/footer', $data);
}

function includesFrontendFooter($data) {
    $ci = & get_instance();
    $ci->load->view($data['view'], $data);
    $ci->load->view('frontend/footer', $data);
}

function includesHeaderFooterHome($data) {

    $ci = & get_instance();
    $ci->load->view('frontend/header', $data);
    $ci->load->view('frontend/menubar', $data);
    $ci->load->view($data['view'], $data);
    $ci->load->view('frontend/footer', $data);
}

function includesAll($data) {
    $ci = & get_instance();
    $ci->load->view('/web/header', $data);
    $ci->load->view('/web/sidebar', $data);
    $ci->load->view($data['structure'] . '/' . $data['view'], $data);
    $ci->load->view('/web/footer', $data);
}

function UserSession() {
    $ci = & get_instance();
    if ($ci->session->userdata('user_data')) {
        $result['success'] = true;
        $result['userData'] = $ci->session->userdata('user_data');
    } else {
        $result['success'] = false;
        $result['userData'] = "Please login to continue";
    }
    return $result;
}

function isArrVal( $arrData ) {
    if ( isset( $arrData ) && !empty( $arrData ) && count( $arrData ) > 0) {
        return true;
    } else {
        return false;
    }
}

function isVal( $strData ) {
    if ( true == isset( $strData ) && !empty( $strData ) ) {
        return true;
    } else {
        return false;
    }
}

function isStrVal( $strData ) {
    if ( true == isset( $strData ) && !empty( $strData ) && is_string( $strData ) ) {
        return true;
    } else {
        return false;
    }
}

function isIdVal( $intData ) {
    if ( true == isset( $intData ) && !empty( $intData ) && is_numeric( $intData ) ) {
        return true;
    } else {
        return false;
    }
}

function printLastSql() {
    $ci = & get_instance();
    printDie( $ci->db->last_query() );
}

function printFormValidationError() {
    printDie( validation_errors() );
}

function convertDateFormatToStandardFormat( $strDate ) {
    $strDate = str_replace( '/', '-', $strDate );
    return date( 'Y-m-d', strtotime( $strDate ) );
}

function generateRandomAlphaNumericString( $intCount = 7 ) {
    
    $strAlphaNumeric = '0123456789abcdefghijklmnopqrstuvwxyz';
    
    return substr( str_shuffle( $strAlphaNumeric ), 0, $intCount );
}
