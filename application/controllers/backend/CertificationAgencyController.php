<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CertificationAgencyController extends MY_Controller {

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
        $data['title'] = 'Certification Agency Registration';
        $data['heading'] = 'Certification Agency Registration';
        $data['backend'] = true;
        $data['view'] = 'certification-agency/list';
        $data['user_data'] = $userSession;
        $data['certification_agencies_list'] = $this->CertificationAgency->getCertificationAgencies();
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
        $certification_agency_details = $this->CertificationAgency->getCertificationAgencyById($get['id']);
        $data['backend'] = true;
        $data['certification_agency_details'] = $certification_agency_details;
        $data['title'] = $certification_agency_details['fullname'] ;
        $data['heading'] = $certification_agency_details['fullname'];
        $data['view'] = 'certification-agency/view';
        if($this->input->post()){
            $post = $this->input->post();
            $details = $post;
            $details['updated_at'] = date('Y-m-d H:i:s');
            $result = $this->CertificationAgency->update($details);
            if ($result) {
                if($post['is_verified'] == 2){
                    $verified = "Approve Certification Agency";
                }else{
                    $verified = "Reject Certification Agency";
                }
                $certification_agency_details = $this->CertificationAgency->getCertificationAgencyById($post['user_id']);
                $data_notify = array(
                                    'user_id' => 0,
                                    'certification_agency_id' => $post['user_id'],
                                    'user_type_id' => $post['user_type_id'],
                                    'notification_type' => VERIFY_REGISTRATION,
                                    'notify_type' => NOTIFY_WEB,
                                    'message' => 'Admin '.$verified.' '.$certification_agency_details['name'],
                                );
                $result_notification = $this->Notifications->insert($data_notify);
                $this->session->set_flashdata('Message', 'Certification Agency '.$certification_agency_details['name'].' has been updated Succesfully');
                return redirect('admin/certification-agency', 'refresh');
            } else {
                $this->session->set_flashdata('Error', 'Failed to update data');
                $certification_agency_details = $this->CertificationAgency->getCertificationAgencyById($post['id']);
                $data['backend'] = true;
                $data['certification_agency_details'] = $certification_agency_details;
                $data['title'] = $certification_agency_details['fullname'] ;
                $data['heading'] = $certification_agency_details['fullname'];
                $data['view'] = 'certification-agency/view';
                $this->backendLayout($data);
            }
                
            
        }else{
            $this->backendLayout($data);
        }
    }
    public function update(){
        $session = UserSession();
        $userSession = $session['userData'];
        $get = $this->input->get();
        $user_type_details = $this->UserType->getUserTypeById($get['user_type_id']);
        $certification_agency_details = $this->CertificationAgency->getCertificationAgencyById($get['id']);
        $data['user_type_details'] = $user_type_details;
        $data['state_list'] = $this->State->getStates();
        $data['agencies_list'] = $this->CertificationAgency->getAgencies();
        $data['certification_agencies_list'] = $this->CertificationAgency->getCertificationAgencies();
        $data['backend'] = true;
        $data['certification_agency_details'] = $certification_agency_details;
        $data['title'] = $certification_agency_details['fullname'] ;
        $data['heading'] = $certification_agency_details['fullname'];
        $data['view'] = 'certification-agency/update';
        $data['userSession'] = $userSession;
        if($this->input->post()){
            $post = $this->input->post();
            //$this->form_validation->set_rules('agency_id', 'Certification Agency', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('contact_person', 'Contact Person', 'trim|required');
            $this->form_validation->set_rules('website', 'Website', 'trim|required');
            $this->form_validation->set_rules('licence_no', 'Licence number', 'trim|required');
            $this->form_validation->set_rules('email1', 'Email Id1', 'trim|required');
            $this->form_validation->set_rules('mobile1', 'Mobile number1', 'trim|required|numeric|exact_length[10]');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('email2', 'Email Id2', 'trim');
            $this->form_validation->set_rules('mobile2', 'Mobile number2', 'trim|numeric|exact_length[10]');
            if($this->form_validation->run() == TRUE){
                $details = $post;
                $details['mobile2'] = !empty($details['mobile2'])?$details['mobile2']:0;
                $details['landline'] = !empty($details['landline'])?$details['mobile2']:0;
                $details['fullname'] = $details['contact_person'];
                $details['updated_at'] = date('Y-m-d H:i:s');
                $user_id = $this->CertificationAgency->update($details);
                if($userSession['username'] == ADMINUSERNAME){
                    $this->session->set_flashdata('Message', $details['fullname']. ' profile has been updated successfully.');
                    redirect('admin/certification-agency');
                }else{
                    $this->session->set_flashdata('Message', 'Profile has been updated successfully.');
                    redirect('admin/certification-agency/update?id='.$post['user_id'].'&user_type_id='.$post['user_type_id']);
                }
            }else{
                $this->backendLayout($data);
            }
        }else{
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
        $result = $this->CertificationAgency->delete($post['user_id']);
        if($result){
            echo true;
        }else{
            echo false;
        }
   }
}
