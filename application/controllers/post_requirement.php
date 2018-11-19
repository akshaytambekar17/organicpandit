<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_requirement extends CI_Controller {


	function __construct(){
		parent:: __construct();
		$this->load->model('requirement_model');
   
	}

	public function index()
	{


    $data['states'] =  $this->requirement_model->get_state();
    $this->load->view('post-requirement', $data);
  }


 // get cities
  public function get_city(){


   $this->requirement_model->all_city(); 

 }
 

 public function create_(){

 }
}
