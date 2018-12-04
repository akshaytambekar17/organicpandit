<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	
	public function __Construct()
	{ 
		parent::__Construct();

	}
	
	
	public function index()
	{
		$this->load->view('contact');
	}


	   public function sendMail() { 
	       
         $this->load->library('encrypt');
         $from_email = "swapnesh@sandatwebsolution.com"; 
         $to_email = $this->input->post('email'); 
         $username = $this->input->post('username'); 
         $address = $this->input->post('$address'); 
         $message = $this->input->post('message'); 
        // $to_email = "swapnesh@sandatwebsolution.com"; 
   
         //Load email library 
         $this->load->library('email'); 
   
         $this->email->from($from_email, 'Organic Pandit'); 
         $this->email->to($to_email);
         $this->email->subject('organic pandit'); 
         $this->email->message($message); 
   
    
//Send email

        if($this->email->send())
        {
        	echo 'Email sent.';
        }
        else
        {
        // 	show_error($this->email->print_debugger());
        	echo 'Email not  sent.';
        }

    }

}
