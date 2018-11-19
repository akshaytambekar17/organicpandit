<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_register extends CI_Controller {


	function __construct(){
		parent:: __construct();
		$this->load->model('update_model');
   
	}



 // get cities
  public function get_city(){
   $this->update_model->all_city(); 

 } 


// insert farmer close

}
