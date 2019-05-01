<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrganicSettingController extends MY_Controller {
    function __construct() {
        parent::__construct();
        $session = UserSession();
        if ( empty( $session['success'] ) ) {
            redirect('admin', 'refresh');
        }else {
            $userSession = $session['userData'];
            if( ADMINUSERNAME != $userSession['username'] ){
                redirect('home', 'refresh');
            }
        }
    }
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
         
        $session = UserSession();
        $userSession = $session['userData'];
        $data['title']='Organic Setting';
        $data['heading']='Setting List';
        $data['backend'] = true;
        $data['view'] = 'organic-setting/list';
        $data['user_data'] = $userSession;
        $data['organicSettingList'] = $this->OrganicSetting->getOrganicSettings();
        
        $this->backendLayout($data);
    }
    
    public function add(){
        
        if( $this->input->post() ) {
            
            $post = $this->input->post();
            if($this->form_validation->run('setting-form') == TRUE){
                
                $details = $post;
                $details['updated_at'] = date('Y-m-d H:i:s');
                $result = $this->OrganicSetting->add( $details );
                if ($result) {
                    $this->session->set_flashdata('Message', 'New Setting has been added succesfully');
                    return redirect('admin/organic-setting', 'refresh');
                } else {
                    $this->session->set_flashdata('Error', 'Failed to create new setting');
                    $data['title'] = 'New Setting' ;
                    $data['heading'] ='Add New Setting';
                    $data['view'] = 'organic-setting/form_data';
                    $this->backendLayout($data);
                }
                
            }else{
                $data['title'] = 'New Setting' ;
                $data['heading'] ='Add New Setting';
                $data['view'] = 'organic-setting/form_data';
                $this->backendLayout($data);
            }
        } else {
            
            $data['title'] = 'New Setting' ;
            $data['heading'] ='Add New Setting';
            $data['view'] = 'organic-setting/form_data';
            $this->backendLayout($data);
        }
    }
    
    public function update(){
        $get = $this->input->get();
        if( $this->input->post() ) {
            
            $post = $this->input->post();
            if($this->form_validation->run('setting-form') == TRUE){
                $details = $post;
                $details['updated_at'] = date('Y-m-d H:i:s');
                $result = $this->OrganicSetting->update( $details );
                if ($result) {
                    $this->session->set_flashdata('Message', 'Setting updated Succesfully');
                    return redirect('admin/organic-setting', 'refresh');
                } else {
                    $this->session->set_flashdata('Error', 'Failed to update category');
                    $settingDetails = $this->OrganicSetting->getOrganicSettingById( $post['id'] );
                    $data['title'] = $settingDetails['title'] ;
                    $data['heading'] ='Update Setting '.$settingDetails['title'];
                    $data['view'] = 'organic-setting/form_data';
                    $data['settingDetails'] = $settingDetails;
                    $this->backendLayout($data);
                }
                
            }else{
                $settingDetails = $this->OrganicSetting->getOrganicSettingById( $post['id'] );
                $data['title'] = $settingDetails['title'] ;
                $data['heading'] ='Update Setting '.$settingDetails['title'];
                $data['view'] = 'organic-setting/form_data';
                $data['settingDetails'] = $settingDetails;
                $this->backendLayout($data);
            }
        }else{
            $settingDetails = $this->OrganicSetting->getOrganicSettingById( $get['id'] );
            $data['title'] = $settingDetails['title'] ;
            $data['heading'] ='Update Setting '.$settingDetails['title'];
            $data['view'] = 'organic-setting/form_data';
            $data['settingDetails'] = $settingDetails;
            $this->backendLayout($data);
        }
    }
    public function delete(){
        $post = $this->input->post();
        $result = $this->Bid->delete($post['id']);
        if($result){
            echo true;
        }else{
            echo false;
        }
   }
}
