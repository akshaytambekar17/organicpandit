<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function prints($data){
    echo "<pre>";
    print_r($data);
}
function printDie($data){
    echo "<pre>";
    print_r($data);
    die;
}
function includesHeader($data){
    $ci=& get_instance();
    $ci->load->view($data['structure'].'/web/header',$data);
    $ci->load->view($data['structure'].'/'.$data['view'],$data);
}
function includesHeaderSidebar($data){
    $ci=& get_instance();
    $ci->load->view($data['structure'].'/web/header',$data);
    $ci->load->view($data['structure'].'/web/sidebar',$data);
    $ci->load->view($data['structure'].'/'.$data['view'],$data);
}
function includesHeaderFooter($data){
    $ci=& get_instance();
    $ci->load->view('web/header',$data);
    if(!empty($data['backend'])){
        $ci->load->view($data['structure'].'/'.$data['view'],$data);
    }else{
        $ci->load->view('includes/header',$data);
        $ci->load->view($data['view'],$data);
    }
    $ci->load->view('web/footer',$data);
}
function includesAll($data){
    $ci=& get_instance();
    $ci->load->view('/web/header',$data);
    $ci->load->view('/web/sidebar',$data);
    $ci->load->view($data['structure'].'/'.$data['view'],$data);
    $ci->load->view('/web/footer',$data);
}

