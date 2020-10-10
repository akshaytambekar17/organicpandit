<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FrontendController
 *
 * @author Kiran Jadhav
 */

class FrontendController extends MY_Controller {
    
    public $arrmixUserSession;
    
    function __construct() {
        parent::__construct();
        
        $this->arrmixUserSession = [];
        if( true == isArrVal( $this->session->userdata('user_data') ) ) {
            $this->arrmixUserSession = $this->session->userdata('user_data');
        }
        
        
    }
    
}
