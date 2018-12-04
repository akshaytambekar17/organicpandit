<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Certification_register extends CI_Controller {


	function __construct(){
		parent:: __construct();
		$this->load->model('certification_model');
   
	}

	public function index()
	{


    $data['agencies'] =  $this->certification_model->get_agency();
    $this->load->view('certification-register', $data);
  }


 // get cities
  public function get_city(){


   $this->certification_model->all_city(); 

 }
 

 public function create_certification(){
     echo $data;
     $this->certification_model->insert_certification($data);
 }
}
