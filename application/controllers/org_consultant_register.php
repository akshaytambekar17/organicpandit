<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Org_consultant_register extends CI_Controller {


  function __construct(){
    parent:: __construct();
    $this->load->model('org_consultant_model');
  }


    public function index()
  {
    $data['states'] =  $this->org_consultant_model->get_state();
    $this->load->view('org-consultant-register', $data);
  }

// get cities
  public function get_city(){


   $this->org_consultant_model->all_city(); 

 }

// insert org_consultant

  public function create_org_consultant(){

    if(isset($_FILES["profile"]["name"])){

      echo $profile = $_FILES["profile"]["name"];
      echo $company_images = $_FILES["company_images"]["name"];
      echo $resume = $_FILES["resume"]["name"];
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

 if($_FILES["resume"]["name"]) 
   {  

    $config6['upload_path'] = './upload/resume/'; 
    $config6['allowed_types'] = '*';



                // Alternately you can set
    $this->upload->initialize($config6);

    $this->load->library('upload', $config6); 

    if(!$this->upload->do_upload('resume'))  
    {  
     echo $this->upload->display_errors();  
   }  
   else  
   {  
     $data = $this->upload->data(); 


     $resume = $data["file_name"];    

   }  

 }  

 $this->org_consultant_model->insert_org_consultant($profile, $company_images, $video, $resume); 
} 

}
// insert org_consultant close

}
