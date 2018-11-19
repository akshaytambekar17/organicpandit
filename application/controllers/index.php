<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {
	
	public function __Construct()
	{
	  parent::__Construct();
		ob_start();
		$this->load->helper('url');
		$this->load->library('session');
		//$this->load->driver('session');
  		$this->load->model('category');
    	$this->load->model('product_model');
    	$this->load->model('register_model');
    	$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		//$this->load->library('facebook');
		

        //Load user model
        $this->load->model('user');
	}	
	public function index()
	{ 
		$cid=0;
		$data['category'] = $this->category->category();
		$data['city'] = $this->category->cities();
		$data['secity']=$this->register_model->getcitybyid($this->session->userdata('setcity'));
		$data['cid'] = $cid ;
		$id = $this->session->userdata('setcity');
		$cat = $this->session->userdata('setcategory');
		$data['user'] =$this->session->userdata('userdata');
		//print_r($data['user']->id);
		if(!empty($id))
		{
			$data['productlist'] = $this->product_model->product($id);
		}
		else
		{
			$data['productlist'] = $this->product_model->product($id);
		}
		$this->load->view('common/header',$data);
		$this->load->view('index',$data);
		$this->load->view('common/footer');
	}

	public function category()
	{ 
		$id = $this->uri->segment(2);

		$data['category'] = $this->category->category();
		$data['user'] =$this->session->userdata('userdata');
		$data['city'] = $this->category->cities();
		$data['cid'] = $id ;
		$cityid=$this->session->userdata('setcity');
		$data['productlist'] = $this->product_model->category_product($id,$cityid);
		$data['secity']=$this->register_model->getcitybyid($this->session->userdata('setcity'));
		$this->load->view('common/header',$data);
		$this->load->view('index',$data);
		$this->load->view('common/footer');
	}
	public function contact()
	{
		$data=$this->input->post();
		$this->register_model->contact($data);

		// $this->session->set_flashdata('error',"Error! Transaction Failed. Please Check Your Detail & Try Again.");

		$this->session->set_flashdata('succes_msg','Success! Your contact us request has been submitted successfully');
		redirect('index/contact_us');
		/*$data['category'] = $this->category->category();
		$data['user'] =$this->session->userdata('userdata');
		$data['secity']=$this->register_model->getcitybyid($this->session->userdata('setcity'));
		$this->load->view('common/header',$data);
		$this->load->view('contactus');
		$this->load->view('common/footer');*/
	}
	public function category_product() 
	{
		$id = $this->uri->segment(2);
		$data['category'] = $this->category->category();
		$data['user'] =$this->session->userdata('userdata');
		$data['city']= $this->category->cities();
		$data['cid'] = $id ;
		$cityid=$this->session->userdata('setcity');
		$data['productlist'] = $this->product_model->category_product($id,$cityid);
		$data['secity']=$this->register_model->getcitybyid($this->session->userdata('setcity'));
		$this->load->view('common/header',$data);
		$this->load->view('kitchen',$data);
		$this->load->view('common/footer');

	}
	public function login()
	{
		$data['user'] =$this->session->userdata('userdata');

		
        $userData = array();
         $fbuser = '';   
		 $data['city']= $this->category->cities();
        //$data['authUrl'] =  $this->facebook->login_url();
		$data['category'] = $this->category->category();
		$data['secity']=$this->register_model->getcitybyid($this->session->userdata('setcity'));
		$this->load->view('common/header',$data);
		$this->load->view('login',$data);
		$this->load->view('common/footer');
	}
	public function onlineform()
	{
		$data=$this->input->post();
		$data['user'] =$this->session->userdata('userdata');
		$data['city']= $this->category->cities();
		$data['category'] = $this->category->category();
		$data['secity']=$this->register_model->getcitybyid($this->session->userdata('setcity'));
		$data['time']=$this->register_model->gettime();	
		$this->load->view('common/header',$data);
		$this->load->view('paywitheasebuzz-php-lib-master/index',$data);
		$this->load->view('common/footer');
		
	}
	public function login1()
	{
			$id=0;
			//$this->session->set_userdata('fb_access_token', $access_token->getValue());
			$appId="1375734162478018";
			$appSecret="b2dcb84218e3167ef45908143d4eda77";
			$redirectTo="http://www.shopping.merakisan.com/index/login1/1";
			$code=$this->input->get('code');
			 $token_url="https://graph.facebook.com/oauth/access_token?client_id="
        . $appId . "&redirect_uri=" . urlencode($redirectTo)
        . "&client_secret=" . $appSecret
        . "&code=" . $code . "&display=popup";
			$response = file_get_contents($token_url);
			$response=json_decode($response);
			//print_r($response);  
			//$params = null;
			//parse_str($response, $params);
			 $access_token = $response->access_token;
			$this->session->set_userdata('fb_access_token', $access_token);
			if($this->facebook->is_authenticated()){
			$userProfile = $this->facebook->request('get', '/me?fields=id,name,first_name,last_name,email,gender,locale,picture');
				$user=$this->register_model->fblogin($userProfile);
					if($user)
					{
					$final->id=$user->id;
					$final->username=$user->name;
					$this->session->set_userdata('userdata',$final);
					} 
					$data['category'] = $this->category->category();
					$data['city'] = $this->category->cities();
					$data['user'] =$this->session->userdata('userdata');
					$data['productlist'] = $this->product_model->product($id);
					if($this->uri->segment(3) && $this->uri->segment(3)=='1')
					{
						redirect('index/paynow');
					}
					else
					{
						redirect('index/');
					}
					/*$this->load->view('common/header',$data);
					$this->load->view('index',$data);
					$this->load->view('common/footer');*/
				
			} 
			else
			{
				if($this->uri->segment(3) && $this->uri->segment(3)=='1')
					{
						redirect('index/paynow');
					}
					else
					{
						redirect('index/');
					}
			}
			/*echo "<pre>";
			print_r($this->get_access_token()); 
			exit;*/
	}
	public function searchproduct()
	{
		$name=$this->input->post('name');
		$return=$this->product_model->searchproduct($name);
		echo $return;
	}
	public function howwork()
	{ 
		$data['category'] = $this->category->category();
		$data['user'] =$this->session->userdata('userdata');
		$data['city']= $this->category->cities();
		$data['secity']=$this->register_model->getcitybyid($this->session->userdata('setcity'));		
		$this->load->view('common/header',$data); 
		$this->load->view('howwork');
		$this->load->view('common/footer');
	}
	public function invoice()
	{
		$orderid=$this->uri->segment(3);
		$data['category'] = $this->category->category();
		$data['city']= $this->category->cities();
		$data['secity']=$this->register_model->getcitybyid($this->session->userdata('setcity'));
		$data['user'] =$this->session->userdata('userdata');
		$data['date']=$this->register_model->get_data($orderid);
		$data['orderid'] =$orderid;
		$data['orderdetail']=$this->register_model->orderdetail($orderid);
		$this->load->view('invoice',$data);
		
	}
	public function viewproduct()
	{
		$prodid = $this->input->post('product_id');
		$data['single'] = $this->product_model->popupsingle($prodid);
		//echo $prodid; die;
	}

	public function logout()
	{ 
		$cid=0;
		$data['category'] = $this->category->category();
		$this->session->unset_userdata('userdata');
		$data['city'] = $this->category->cities();
		$data['cid'] = $cid ;
		$data['secity']=$this->register_model->getcitybyid($this->session->userdata('setcity'));
		$id = $this->input->post('city');
		if(!empty($id))
		{
			$data['productlist'] = $this->product_model->product($id);
		}
		else
		{
			$data['productlist'] = $this->product_model->product($id);
		}
		$this->load->view('common/header',$data);
		$this->load->view('index',$data);
		$this->load->view('common/footer');
	}

	public function single()
	{ 
		$id = $this->uri->segment(2);
		//echo $id ; die;
		$data['category'] = $this->category->category();
		$data['user'] =$this->session->userdata('userdata');
		$data['city'] = $this->category->cities();
		$data['secity']=$this->register_model->getcitybyid($this->session->userdata('setcity'));
		$this->load->view('common/header',$data);
		$data['single'] = $this->product_model->single($id);
		$this->load->view('single',$data);
		$this->load->view('common/footer');
	}
	public function setcity()
	{
		$city=$this->input->post('city');
		$this->session->set_userdata('setcity',$city); 
		redirect('index/');
	}
	public function user_login()
	{
		    $id=0; 
		    $data['category'] = $this->category->category();
		    $data['city'] = $this->category->cities();
			$username = $this->input->post('Email');
			//$data['authUrl'] =  $this->facebook->login_url();
			$data['user'] =$this->session->userdata('userdata');
			$data['secity']=$this->register_model->getcitybyid($this->session->userdata('setcity'));
			$password = $this->input->post('Password');
			if(empty($username) || empty($password))
			{
				$data['errmessage'] = 'Email And Password Required';
				$this->load->view('common/header',$data);
				$this->load->view('login',$data);
				$this->load->view('common/footer');

			}

			else
			{
				$password = md5($password);
				$user = $this->register_model->getuser($username,$password);
				
				if($user)
				{

					//echo $user; 
					$this->session->set_userdata('userdata',$user);
					$data['user'] =$this->session->userdata('userdata');
					$data['productlist'] = $this->product_model->product($id);
					if($this->uri->segment(3) && $this->uri->segment(3)=='1')
					{
						redirect('index/paynow');
					}
					else
					{
						$this->load->view('common/header',$data);
						$this->load->view('index',$data);
						$this->load->view('common/footer');
					}

				}
				else
				{
					$data['user'] =$this->session->userdata('userdata');
					$data['errmessage'] = 'Email Or Password Invalid';
					$this->load->view('common/header',$data);
					$this->load->view('login',$data);
					$this->load->view('common/footer');

				}

			}

			


	}


	public function register()
	{ 
		$data['user'] =$this->session->userdata('userdata');
		$data['city'] = $this->category->cities();
		$data['category'] = $this->category->category();
		$data['secity']=$this->register_model->getcitybyid($this->session->userdata('setcity'));
		$this->load->view('common/header',$data);
		$this->load->view('register');
		$this->load->view('common/footer');
	}	
	public function paynow()	{ 		
		$data['user'] =$this->session->userdata('userdata');
		$data['category'] = $this->category->category();
		$data['secity']=$this->register_model->getcitybyid($this->session->userdata('setcity'));
		$data['city'] = $this->category->cities();		
		$data['totalamt'] = $this->input->post("totalamt");	
		$data['id'] = $this->input->post("id");	
		$data['qty'] = $this->input->post("qty");
		$data['total'] = $this->input->post("total");
		if($this->input->post("totalamt")!='')
		{
			$this->session->set_userdata('cart', $data);
		}	
		$data['city']=$this->register_model->getcity();
		$data['time']=$this->register_model->gettime();
		$this->load->view('common/header',$data);		
		$this->load->view('pay',$data);	
		$this->load->view('common/footer');
	}
	public function ordermanage()
	{
		$data['category'] = $this->category->category();
		$data['city'] = $this->category->cities();	
		$data['user'] =$this->session->userdata('userdata');
		$data['order']=$this->register_model->getuserorder($data['user']->id);
		$data['secity']=$this->register_model->getcitybyid($this->session->userdata('setcity'));
		$this->load->view('common/header',$data);		
		$this->load->view('ordermanage',$data);	
		$this->load->view('common/footer');
	}
	public function cancel()
	{
		$this->session->set_flashdata('error',"Error! Transaction Failed. Please Check Your Detail & Try Again.");
		redirect('index/paynow');
	}
	public function addresscod()
	{
		$data=$this->input->post();
		$data['user'] =$this->session->userdata('userdata');
	
		$res=$this->register_model->codorder($data);
		if($res=='CANCEL')
		{
			$this->session->set_flashdata('error_tran',"Error! Transaction Failed. Please Check Your Detail & Try Again.");
		}
		else
		{
			$this->session->set_flashdata('success_tran',"Your order has been placed successfully!!! Thank you from Merakisan");
			
		}
		redirect('index/paynow'); 
	}
	public function contact_us()
	{
		$data['category'] = $this->category->category();
		$data['user'] =$this->session->userdata('userdata');
		$data['city'] = $this->category->cities();	
		$data['secity']=$this->register_model->getcitybyid($this->session->userdata('setcity'));
		$this->load->view('common/header',$data);
		$this->load->view('contactus');
		$this->load->view('common/footer');
	}
	public function ordercancel()
	{
		$orderid=$this->uri->segment(3);
		$this->register_model->ordercancel($orderid);
		redirect('index/ordermanage');
		
	}
	public function forgot()
	{
		$email=$this->input->post('email');
		$res=$this->register_model->checkmail($email);
		echo $res;
	}
	public function register_save()
	{ 

			$data['category'] = $this->category->category(); 
			$data['city'] = $this->category->cities();	
			$data['validation'] = array(
					'username' => '',
					'email' => '',
					'pass' => '',
					'password' => '',
					);

		    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('Username', 'Username', 'required|min_length[5]|max_length[15]');
			$this->form_validation->set_rules('Email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('Password', 'Password.', 'required|min_length[5]|max_length[50]|matches[Confirm_Password]');
			$this->form_validation->set_rules('Confirm_Password', 'Confirm_Password', 'required|min_length[5]|max_length[50]');

			$this->form_validation->set_rules('name', 'name.', 'required|min_length[5]|max_length[50]');
			$this->form_validation->set_rules('mobile', 'mobile', 'required|min_length[10]|max_length[10]');

			$data['secity']=$this->register_model->getcitybyid($this->session->userdata('setcity'));
			if ($this->form_validation->run() == FALSE) {
				$data['validation'] = array(
							'username' => 'Username length should be 5 -15',
							'email' => 'Email field is required',
							'pass' => 'Password length should be 5 -50',
							'password' => 'Confirm_Password is required',
							'name' =>'name length should be 5 -15',
							'mobile' =>'Enter valid mobile no',
						);

				$this->load->view('common/header',$data);
				$this->load->view('register',$data);
				$this->load->view('common/footer');
				} else {

				$date =date("Y-m-d");
				$password = $this->input->post('Password');
				$password = md5($password);
					//echo "here"; die;
				//Setting values for tabel columns
				$data = array(
				'name' => $this->input->post('name'),	
				'username' => $this->input->post('Username'),
				'Email' => $this->input->post('Email'),
				'mobile' => $this->input->post('mobile'),	
				'password' => $password,
				'conpass' => $this->input->post('Confirm_Password'),
				'status' => 0,
				'date' =>$date,
				);
				
				//Transfering data to Model
				$save =$this->register_model->register($data);
				if($save)
				{
					$data['message'] = 'You are registered Successfully';
				}
				$data['secity']=$this->register_model->getcitybyid($this->session->userdata('setcity'));
				//Loading View
				$this->load->view('common/header',$data);
				$this->load->view('register',$data);
				$this->load->view('common/footer');
				}
	}
	
	public function privacypolicy()
	{ 
		$data['category'] = $this->category->category();
		$data['user'] =$this->session->userdata('userdata');
		$data['city']= $this->category->cities();
		$data['secity']=$this->register_model->getcitybyid($this->session->userdata('setcity'));		
		$this->load->view('common/header',$data); 
		$this->load->view('privacypolicy');
		$this->load->view('common/footer');
	}

	public function returnspolicy()
	{ 
		$data['category'] = $this->category->category();
		$data['user'] =$this->session->userdata('userdata');
		$data['city']= $this->category->cities();
		$data['secity']=$this->register_model->getcitybyid($this->session->userdata('setcity'));		
		$this->load->view('common/header',$data); 
		$this->load->view('returnspolicy');
		$this->load->view('common/footer');
	}

	public function termsandconditions()
	{ 
		$data['category'] = $this->category->category();
		$data['user'] =$this->session->userdata('userdata');
		$data['city']= $this->category->cities();
		$data['secity']=$this->register_model->getcitybyid($this->session->userdata('setcity'));		
		$this->load->view('common/header',$data); 
		$this->load->view('termsandconditions');
		$this->load->view('common/footer');
	}
	
	public function findus()
	{
		$name = $this->input->post('name');
		$data['category'] = $this->category->category();
		$data['user'] =$this->session->userdata('userdata');	
		$data['secity']=$this->register_model->getcitybyid($this->session->userdata('setcity'));
		$this->load->view('common/header',$data);
		//$data['find'] = $this->category->find();
		$data['store']=$this->product_model->search($name);
		$this->load->view('findus',$data);
		$this->load->view('common/footer');
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */