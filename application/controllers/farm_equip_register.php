<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Farm_equip_register extends CI_Controller {


  function __construct(){
    parent:: __construct();
    $this->load->model('farm_equip_model');
  }


    public function index()
  {
    $data['states'] =  $this->farm_equip_model->get_state();
    $this->load->view('farm-equip-register', $data);
  }

// get cities
  public function get_city(){


   $this->farm_equip_model->all_city(); 

 }

// insert farm_equip

  public function create_farm_equip(){

    if(isset($_FILES["profile"]["name"])){

      echo $profile = $_FILES["profile"]["name"];
      echo $company_images = $_FILES["company_images"]["name"];
      echo $catalouge = $_FILES["catalouge"]["name"];
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

     if($_FILES["company_images"]["name"]) 
     {  

      $config2['upload_path'] = './upload/certificate/';  
      $config2['allowed_types'] = 'jpg|jpeg|png|gif';  



                // Alternately you can set
      $this->upload->initialize($config2);

      $this->load->library('upload', $config2); 

      if(!$this->upload->do_upload('company_images'))  
      {  
       echo $this->upload->display_errors();  
     }  
     else  
     {  
       $data = $this->upload->data(); 


       $company_images = $data["file_name"];    

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

    if($_FILES["catalouge"]["name"]) 
   {  

    $config4['upload_path'] = './upload/doc/'; 
    $config4['allowed_types'] = '*';



                // Alternately you can set
    $this->upload->initialize($config4);

    $this->load->library('upload', $config4); 

    if(!$this->upload->do_upload('catalouge'))  
    {  
     echo $this->upload->display_errors();  
   }  
   else  
   {  
     $data = $this->upload->data(); 


     $catalouge = $data["file_name"];    

   }  

 }              

 $this->farm_equip_model->insert_farm_equip($profile, $company_images, $video, $catalouge); 
} 

}
// insert farm_equip close

}
