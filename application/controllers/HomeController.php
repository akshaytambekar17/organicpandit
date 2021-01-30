<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    /**
    * Index Page for this controller.
    *
    * Maps to the following URL
    * 		http://example.com/index.php/welcome
    * 	- or -
    * 		http://example.com/index.php/welcome/index
    * 	- or -
    * Since this controller is set as the default controller in
    * config/routes.php, it's displayed at http://example.com/
    *
    * So any other public methods not prefixed with an underscore will
    * map to /index.php/welcome/<method_name>
    * @see https://codeigniter.com/user_guide/general/urls.html
    */

    public function actionTermsConditions() {
        
        $arrmixData['strTitle'] = 'Terms & Conditions';
        $arrmixData['view'] = 'terms-conditions';
        
        $this->frontendFooterLayout( $arrmixData );
    }

    public function actionPrivacyPolicy() {
        $arrmixData['strTitle'] = 'Privacy Policy';
        $arrmixData['view'] = 'privacy-policy';
        
        $this->frontendFooterLayout( $arrmixData );
    }

    public function actionRefundPolicy() {
        
        $arrmixData['strTitle'] = 'Refund Policy';
        $arrmixData['view'] = 'refund-policy';
        
        $this->frontendFooterLayout( $arrmixData );
    }
    
}
