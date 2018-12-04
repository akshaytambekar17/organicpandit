<?php defined('BASEPATH') OR exit('No direct script access allowed');
class user_authentication extends CI_Controller
{
    function __construct() {
        parent::__construct();
		

        // Load facebook library
        $this->load->library('facebook');
		$this->load->helper('url');

        //Load user model
        //$this->load->model('user');
    }

    public function index(){
        $userData = array();

        // Check if user is logged in
        if($this->facebook->is_authenticated()){
			
            // Get user facebook profile details
            $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

            // Preparing data for database insertion
            /*$userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];
			$userData['name']= $userProfile['first_name'];
			$userData['username'] = $userProfile['first_name'].$userProfile['last_name'];
            //$userData['first_name'] = $userProfile['first_name'];
            //$userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
            //$userData['gender'] = $userProfile['gender'];
            //$userData['locale'] = $userProfile['locale'];
            //$userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            //$userData['picture_url'] = $userProfile['picture']['data']['url'];
            $data['desired_url'] = 'http://www.shopping.merakisan.com/'; // set the url you want the user to be redirected after logging in
            

            // Insert or update user data
            $userID = $this->user->checkUser($userData);
			print_r($userProfile);
            // Check user data insert or update status
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            }else{
               $data['userData'] = array();
            }

            // Get logout URL
            $data['logoutUrl'] = $this->facebook->logout_url();*/
			print_r($userProfile);
        }else{
            $fbuser = '';   

            // Get login URL
            $data['authUrl'] =  $this->facebook->login_url();
			//echo "<script>alert('".$this->facebook->login_url()."');</script>";
			//$data['helper'] =  new FacebookRedirectLoginHelper($desired_url); 
        }

        // Load login & profile view
        //$this->load->view('common/header',$data);
		//$this->load->view('login');
		//$this->load->view('common/footer');
    }

    public function logout() {
        // Remove local Facebook session
        $this->facebook->destroy_session();

        // Remove user data from session
        $this->session->unset_userdata('userData');

        // Redirect to login page
        //redirect('/user_authentication');
    }
}