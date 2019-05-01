<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MY_Controller {

    public function __Construct() {
        parent::__Construct();
    }

    public function index() {
        $data['view'] = 'user/about_us';
        $data['title'] = 'About Us';
        $data['homeSlider'] = true;
        $this->frontendLayoutHome($data);
    }

}
