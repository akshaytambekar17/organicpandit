<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Processor_register extends CI_Controller {


  function __construct(){
    parent:: __construct();
    $this->load->model('processor_model');
   
  }

  public function index()
  {


    $data['states'] =  $this->processor_model->get_state();
    $data['agencies'] =  $this->processor_model->get_agency();
    $this->load->view('processor-register', $data);
  }

// get cities
  public function get_city(){


   $this->processor_model->all_city(); 

 }
 

 public function create_processor(){

  if(isset($_FILES["profile"]["name"])){

    echo $profile = $_FILES["profile"]["name"];
    echo $certify_img = $_FILES["certify_img"]["name"];
    echo $video = $_FILES["video"]["name"];

    if($_FILES["profile"]["name"]) 
    {  

      $config['upload_path'] = './upload/profile/';  
      $config['allowed_types'] = 'jpg|jpeg|png|gif';  
      $this->load->library('upload', $config); 

      if(!$this->upload->do_upload('profile'))  
      {  
       echo $this->upload->display_errors();  
     }  
     else  
     {  
       $data = $this->upload->data();   
       $profile = $data["file_name"];    


     }  

   }

   if($_FILES["certify_img"]["name"]) 
   {  

    $config2['upload_path'] = './upload/certificate/';  
    $config2['allowed_types'] = 'jpg|jpeg|png|gif';  



                // Alternately you can set
    $this->upload->initialize($config2);

    $this->load->library('upload', $config2); 

    if(!$this->upload->do_upload('certify_img'))  
    {  
     echo $this->upload->display_errors();  
   }  
   else  
   {  
     $data = $this->upload->data(); 


     $certify_img = $data["file_name"];    

   }  

 }  

 if($_FILES["video"]["name"]) 
 {  

  $config3['upload_path'] = './upload/video/'; 
  $config3['allowed_types'] = '*';



                // Alternately you can set
  $this->upload->initialize($config3);

  $this->load->library('upload', $config3); 

  if(!$this->upload->do_upload('video'))  
  {  
   echo $this->upload->display_errors();  
 }  
 else  
 {  
   $data = $this->upload->data(); 


   $video = $data["file_name"];    

 }  

}              

$this->processor_model->insert_processor($profile, $certify_img, $video); 
} 

}
// insert processor close

}
