<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

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
	public function index()
	{
            $data['title']='Login';
            $data['heading']='Framework';
            $data['hide_footer'] = true;
            $data['hide_social_login'] = true;
            $data['structure'] = 'backend';
            $data['view'] = 'common/login';
            if($this ->input->post()){
                if($this->form_validation->run('signup')){
                    
                }else{
                    
                }
            }else{
                
                includesHeaderFooter($data);
            }
            
        }

        
}
