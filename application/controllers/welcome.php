<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    public function __Construct()
    { 
    	parent::__Construct();
    	session_start();
    	$this->load->model('category');
    	$this->load->model('product_model');

    }


	public function index()
	{   

		$data['category'] = $this->category->category();
		$product['productlist'] = $this->product_model->product();
		$this->load->view('common/header',$data);
		$this->load->view('index',$product);
		$this->load->view('common/footer');
	}

	public function home()
	{ 
		$data['category'] = $this->category->category();
		$product['productlist'] = $this->product_model->product();
		$this->load->view('common/header',$data);
		$this->load->view('index',$product);
		$this->load->view('common/footer');
	}

	public function kitchen()
	{ 
		$data['category'] = $this->category->category();
		$this->load->view('common/header',$data);
		$this->load->view('kitchen');
		$this->load->view('common/footer');
	}
	public function contact_us()
	{ 
		$data['category'] = $this->category->category();
		$this->load->view('common/header',$data);
		$this->load->view('contact');
		$this->load->view('common/footer');
	}

	public function care()
	{ 
		$data['category'] = $this->category->category();
		$this->load->view('common/header',$data);
		$this->load->view('care');
		$this->load->view('common/footer');
	}

	public function single()

	{ 
		$id = $this->uri->segment(2);
		$data['category'] = $this->category->category();

		
		$this->load->view('common/header',$data);
		$data['single'] = $this->product_model->single($id);
		$this->load->view('single',$data);
		$this->load->view('common/footer');
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */