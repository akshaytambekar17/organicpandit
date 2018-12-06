<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends MY_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
        $this->load->model('login_model','Login');
    }
    public function index() {
        $session = UserSession();
        $userSession = $session['userData'];
        $data['title'] = 'User Registration';
        $data['heading'] = 'User Registration';
        $data['backend'] = true;
        $data['view'] = 'user/list';
        $data['user_data'] = $userSession;
        $data['user_list'] = $this->User->getUsers();
        $this->backendLayout($data);
    }

    public function login() {
        if ($this->session->userdata('user_data')) {
            redirect('dashboard', 'refresh');
        }
        $data['title'] = 'Login';
        $data['heading'] = 'Organic Pandit';
        $data['hide_footer'] = true;
        $data['hide_social_login'] = true;
        $data['headerFooter'] = true;
        $data['backend'] = true;
        $data['view'] = 'common/login';
        if ($this->input->post()) {
            if ($this->form_validation->run('admin-login') == TRUE) {
                $post = $this->input->post();
                $result = $this->Login->getUserByEmailIdPassword($post);
                if(!empty($result)){
                    $this->session->set_userdata('user_data', $result);
                    redirect('admin/dashboard', 'refresh');
                }else{
                    $this->session->set_flashdata('Error', 'Email Id or Password  must be wrong');
                    $this->backendLayout($data);
                }
            } else {
                $this->backendLayout($data);
            }
        } else {
            $this->backendLayout($data);
        }
    }
    public function view(){
        $get = $this->input->get();
        if($this->input->post()){
            $post = $this->input->post();
            $details = $post;
            $details['updated_at'] = date('Y-m-d H:i:s');
            $result = $this->User->update($details);
            if ($result) {
                if($post['is_verified'] == 2){
                    $verified = "Approve user";
                }else{
                    $verified = "Reject user";
                }
                $user_type_details = $this->UserType->getUserTypeById($post['user_type_id']);
                $data_notify = array(
                                    'user_id' => $post['user_id'],
                                    'user_type_id' => $post['user_type_id'],
                                    'notification_type' => VERIFY_REGISTRATION,
                                    'notify_type' => NOTIFY_WEB,
                                    'message' => 'Admin '.$verified.' '.$post['fullname'],
                                );
                $result_notification = $this->Notifications->insert($data_notify);
                $this->session->set_flashdata('Message', 'User '.$post['fullname'].' has been updated Succesfully');
                return redirect('admin/user', 'refresh');
            } else {
                $this->session->set_flashdata('Error', 'Failed to update product');
                $user_details = $this->User->getUserById($post['user_id']);
                $data['backend'] = true;
                $data['user_details'] = $user_details;
                $data['title'] = $user_details['fullname'] ;
                $data['heading'] = $user_details['fullname'];
                $data['view'] = 'user/view';
                $this->backendLayout($data);
            }
                
            
        }else{
            $user_details = $this->User->getUserById($get['id']);
            $data['backend'] = true;
            $data['user_details'] = $user_details;
            $data['title'] = $user_details['fullname'] ;
            $data['heading'] = $user_details['fullname'];
            $data['view'] = 'user/view';
            $this->backendLayout($data);
        }
    }

    public function home() {
        $this->load->view('frontend/home');
    }

    public function logout() {
        $this->session->unset_userdata('user_data');
        return redirect('home');
    }
    public function delete(){
        $post = $this->input->post();
        $result = $this->User->delete($post['user_id']);
        if($result){
            echo true;
        }else{
            echo false;
        }
   }
}
