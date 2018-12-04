<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

			function __construct(){
		parent:: __construct();
		$this->load->model('Manufacturer_model', 'manufact');
	}
	
	public function home($page = 'Home')
		{

			 if ( ! file_exists(APPPATH.'views/Pages/'.$page.'.php'))
		        {
		               show_404();
		        }


				if(!$this->session->userdata('logged_in')){
				redirect('Users/login');
			}
		        $data['title'] = ucfirst($page); // Capitalize the first letter

		        $this->load->view('Pages/Home', $data);
		}


		public function view_manufacturer()
		{
			if(!$this->session->userdata('logged_in')){
				redirect('Users/login');
			}
		        $this->load->view('Pages/view_manufacturer');
		}

		public function view_distributor()
		{
			if(!$this->session->userdata('logged_in')){
				redirect('Users/login');
			}
		        $this->load->view('Pages/view_distributor');
		}

		public function add_manufacturer()
		{
			if(!$this->session->userdata('logged_in')){
				redirect('Users/login');
			}
		        $this->load->view('Pages/add_manufacturer');
		}

		public function create_manufacturer(){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('Users/login');
			}


			if(isset($_FILES["image_file"]["name"]))  
           {  
                //$new_name = $_FILES["image_file"]["name"];
                $config['upload_path'] = './upload/';  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('image_file'))  
                {  
                     echo $this->upload->display_errors();  
                }  
                else  
                {  
                     $data = $this->upload->data();  
                     echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';  


                  $new_name = $data["file_name"];    
                  $this->manufacturer_model->insert_manufacturer($new_name); //save_employee is the function name in the Model 
                }  
           } 
		}	

		public function showAllManufacturer(){
		$result = $this->manufacturer_model->showAllManufacturer();
		echo json_encode($result);
	}

	public function editManufacturer(){
		$result = $this->manufacturer_model->editManufacturer();
	}

	public function showManufacturer(){
		$result = $this->manufacturer_model->showManufacturer();
	}




}
