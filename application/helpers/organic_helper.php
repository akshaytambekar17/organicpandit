<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//function includesAll($data){
//    $ci=& get_instance();
//    $ci->load->view('/web/header',$data);
//    $ci->load->view('/web/sidebar',$data);
//    $ci->load->view($data['structure'].'/'.$data['view'],$data);
//    $ci->load->view('/web/footer',$data);
//}
function getQuantities(){
    $data = array( 1 => '500kg to 1 ton',
                   2 => '1 ton to 3 ton',
                   3 => '3 ton to 5 ton',
                   4 => '5 ton to 10 ton',
                   5 => '10 ton to 25 ton',
                   6 => 'Above 25 ton',
            );
    return $data;
}
function getCertifications(){
    $data = array( 1 => 'NPOP',
                   2 => 'NOP',
                   3 => 'PGS',
                   4 => 'ACOS',
                   5 => 'EU',
                   6 => 'Both NPOP &amp; NOP',
            );
    return $data;
}
function getTotalFarmer(){
    $data = array( 
                   1 => '10 to 50',
                   2 => '50 to 100',
                   3 => '100 to 200',
                   4 => '200 to 500',
                   5 => '500 to 1000',
                   6 => '1000 to 3000',
                   7 => 'Above 3000',
            );
    return $data;
}
