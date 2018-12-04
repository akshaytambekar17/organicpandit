<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends MY_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
        function __construct() {
            parent::__construct();
            if (!$this->session->userdata('user_data')) {
                //redirect('admin', 'refresh');
                redirect('home', 'refresh');
            }
        }
	public function index()
	{
            $session = UserSession();
            $userSession = $session['userData'];
            $data['title'] = 'Dashboard'; 
            $data['heading'] = 'Organic Pandit';
            $data['backend'] = true;
            $data['view'] = 'common/dashboard';
            if($userSession['username'] == 'adminmaster'){
                $data['bid_list'] = $this->Bid->getBids();
                $data['post_requirement_list'] = $this->PostRequirement->getPostRequirements();
                $data['product_list'] = $this->Product->getProducts();
                $data['user_type_list'] = $this->UserType->getUserTypes();
            }else{
                $data['bid_list'] = $this->Bid->getBidByUserId($userSession['id']);
                $data['post_requirement_list'] = $this->PostRequirement->getPostRequirementByUserId($userSession['id']);
            }
            $data['user_list'] = $this->User->getUserFarmers();
            $data['user_details'] = $userSession;
            $this->backendLayout($data);
        }
}
