<?php
//Glbal Controller
class MY_Controller extends CI_Controller{

    public function get_usersession(){

        $session_data = $this->session->userdata('username');

        $data['user']=$this->Authenticate_model->get_login($session_data);
        $data['notification'] = $this->Notification_model->get_admin_notification();

        $admin = $this->Authenticate_model->get_login($session_data);

        if(!($admin->groupname == "Administrator")){

            redirect(base_url());       
        }else{

            $this->load->view('includes/header',$data);
        }

    }
    public function get_usersession_dashboard(){

        if(!$this->session->userdata('loggedin')){

            $data['user']="";

            $this->load->view('includes/header',$data);


        }else{

            $session_data = $this->session->userdata('username');

            $data['user']=$this->Authenticate_model->get_login($session_data);

            $this->load->view('includes/header',$data);
        }


    }




}
?>