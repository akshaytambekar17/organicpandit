<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    function __construct() {
        parent:: __construct();

        $this->load->model('update_model');
        $this->load->model('login_model');
    }

    public function index() {
        $this->load->view('account');
    }

    public function check_username_exists($usertype = NULL) {
        $result = $this->login_model->check_username_exists($usertype);
    }

    public function view($type = NULL, $username = NULL) {
        // $this->load->view('account', $data);
        //print $type . $username;
        switch ($type) {
            case "farmer":
                $data['acc_name'] = $username;
                $data['user_type'] = $type;
                $table_name = 'tbl_farmer';
                $data['states'] = $this->update_model->get_state();
                $data['cities'] = $this->update_model->get_city();
                $data['tdata'] = $this->update_model->get_tdata($table_name, $username);

                $this->load->view('account/update-register', $data);

                break;
            case "fpo":
                $data['acc_name'] = $username;
                $data['user_type'] = $type;
                $table_name = 'tbl_fpo';
                $data['states'] = $this->update_model->get_state();
                $data['cities'] = $this->update_model->get_city();
                $data['tdata'] = $this->update_model->get_tdata($table_name, $username);

                $this->load->view('account/update-register', $data);

                break;
            case "trader":
                $data['acc_name'] = $username;
                $data['user_type'] = $type;
                $table_name = 'tbl_trader';
                $data['states'] = $this->update_model->get_state();
                $data['cities'] = $this->update_model->get_city();
                $data['tdata'] = $this->update_model->get_tdata($table_name, $username);

                $this->load->view('account/update-register', $data);

                break;
            case "processor":
                $data['acc_name'] = $username;
                $data['user_type'] = $type;
                $table_name = 'tbl_processor';
                $data['states'] = $this->update_model->get_state();
                $data['cities'] = $this->update_model->get_city();
                $data['tdata'] = $this->update_model->get_tdata($table_name, $username);

                $this->load->view('account/update-register', $data);

                break;
            case "buyer":
                $data['acc_name'] = $username;
                $data['user_type'] = $type;
                $table_name = 'tbl_buyer';
                $data['states'] = $this->update_model->get_state();
                $data['cities'] = $this->update_model->get_city();
                $data['tdata'] = $this->update_model->get_tdata($table_name, $username);

                $this->load->view('account/update-register', $data);

                break;
            case "org_consultant":
                $data['acc_name'] = $username;
                $data['user_type'] = $type;
                $table_name = 'tbl_org_consultant';
                $data['states'] = $this->update_model->get_state();
                $data['cities'] = $this->update_model->get_city();
                $data['tdata'] = $this->update_model->get_tdata($table_name, $username);

                $this->load->view('account/update-register', $data);
                break;
            case "org_input":
                $data['acc_name'] = $username;
                $data['user_type'] = $type;
                $table_name = 'tbl_org_input';
                $data['states'] = $this->update_model->get_state();
                $data['cities'] = $this->update_model->get_city();
                $data['tdata'] = $this->update_model->get_tdata($table_name, $username);

                $this->load->view('account/update-register', $data);
                break;
            case "packaging":
                $data['acc_name'] = $username;
                $data['user_type'] = $type;
                $table_name = 'tbl_packaging';
                $data['states'] = $this->update_model->get_state();
                $data['cities'] = $this->update_model->get_city();
                $data['tdata'] = $this->update_model->get_tdata($table_name, $username);

                $this->load->view('account/update-register', $data);
                break;
            case "logistic":
                $data['acc_name'] = $username;
                $data['user_type'] = $type;
                $table_name = 'tbl_logistic';
                $data['states'] = $this->update_model->get_state();
                $data['cities'] = $this->update_model->get_city();
                $data['tdata'] = $this->update_model->get_tdata($table_name, $username);

                $this->load->view('account/update-register', $data);
                break;
            case "farm_equipment":
                $data['acc_name'] = $username;
                $data['user_type'] = $type;
                $table_name = 'tbl_equipment';
                $data['states'] = $this->update_model->get_state();
                $data['cities'] = $this->update_model->get_city();
                $data['tdata'] = $this->update_model->get_tdata($table_name, $username);

                $this->load->view('account/update-register', $data);
                break;
            case "exhibitors":
                $data['acc_name'] = $username;
                $data['user_type'] = $type;
                $table_name = 'tbl_exhibitors';
                $data['states'] = $this->update_model->get_state();
                $data['cities'] = $this->update_model->get_city();
                $data['tdata'] = $this->update_model->get_tdata($table_name, $username);

                $this->load->view('account/update-register', $data);
                break;
            case "shops":
                $data['acc_name'] = $username;
                $data['user_type'] = $type;
                $table_name = 'tbl_shops';
                $data['states'] = $this->update_model->get_state();
                $data['cities'] = $this->update_model->get_city();
                $data['tdata'] = $this->update_model->get_tdata($table_name, $username);

                $this->load->view('account/update-register', $data);
                break;
            case "labs":
                $data['acc_name'] = $username;
                $data['user_type'] = $type;
                $table_name = 'tbl_labs';
                $data['states'] = $this->update_model->get_state();
                $data['cities'] = $this->update_model->get_city();
                $data['tdata'] = $this->update_model->get_tdata($table_name, $username);

                $this->load->view('account/update-register', $data);
                break;
            case "gov_agency":
                $data['acc_name'] = $username;
                $data['user_type'] = $type;
                $table_name = 'tbl_gov_agency';
                $data['states'] = $this->update_model->get_state();
                $data['cities'] = $this->update_model->get_city();
                $data['tdata'] = $this->update_model->get_tdata($table_name, $username);

                $this->load->view('account/update-register', $data);
                break;
            case "institutions":
                $data['acc_name'] = $username;
                $data['user_type'] = $type;
                $table_name = 'tbl_institutions';
                $data['states'] = $this->update_model->get_state();
                $data['cities'] = $this->update_model->get_city();
                $data['tdata'] = $this->update_model->get_tdata($table_name, $username);

                $this->load->view('account/update-register', $data);
                break;
            case "others":
                $data['acc_name'] = $username;
                $data['user_type'] = $type;
                $table_name = 'tbl_others';
                $data['states'] = $this->update_model->get_state();
                $data['cities'] = $this->update_model->get_city();
                $data['tdata'] = $this->update_model->get_tdata($table_name, $username);

                $this->load->view('account/update-register', $data);
                break;
            case "restaurant":
                $data['acc_name'] = $username;
                $data['user_type'] = $type;
                $table_name = 'tbl_restaurant';
                $data['states'] = $this->update_model->get_state();
                $data['cities'] = $this->update_model->get_city();
                $data['tdata'] = $this->update_model->get_tdata($table_name, $username);

                $this->load->view('account/update-register', $data);
                break;
            case "ngo":
                $data['acc_name'] = $username;
                $data['user_type'] = $type;
                $table_name = 'tbl_ngo';
                $data['states'] = $this->update_model->get_state();
                $data['cities'] = $this->update_model->get_city();
                $data['tdata'] = $this->update_model->get_tdata($table_name, $username);

                $this->load->view('account/update-register', $data);
                break;
            default:
                $data['acc_name'] = $username;
                $data['user_type'] = $type;
                $table_name = 'tbl_farmer';
                $data['states'] = $this->update_model->get_state();
                $data['cities'] = $this->update_model->get_city();
                $data['tdata'] = $this->update_model->get_tdata($table_name, $username);

                $this->load->view('account/update-register', $data);
        }
    }

    public function update_register() {
        $fname = $this->input->post('fullname');
        if (isset($fname)) {
            $profile = "";
            $certify_img = "";
            $video = "";
            $profile = $_FILES["profile"]["name"];
            $certify_img = $_FILES["certify_img"]["name"];
            $video = $_FILES["video"]["name"];

            if (!empty($_FILES["profile"]["name"])) {
                echo "in pr";
                $config['upload_path'] = './upload/profile/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('profile')) {
                    echo $this->upload->display_errors();
                } else {
                    $data = $this->upload->data();
                    $profile = $data["file_name"];
                }
            } else {
                echo "out pr";
                $profile = $this->input->post('old_profile');
            }

            if ($_FILES["certify_img"]["name"]) {

                $config2['upload_path'] = './upload/certificate/';
                $config2['allowed_types'] = 'jpg|jpeg|png|gif';

                // Alternately you can set
                $this->upload->initialize($config2);

                $this->load->library('upload', $config2);

                if (!$this->upload->do_upload('certify_img')) {
                    echo $this->upload->display_errors();
                } else {
                    $data = $this->upload->data();


                    $certify_img = $data["file_name"];
                }
            }

            if ($_FILES["video"]["name"]) {

                $config3['upload_path'] = './upload/video/';
                $config3['allowed_types'] = '*';

                // Alternately you can set
                $this->upload->initialize($config3);

                $this->load->library('upload', $config3);

                if (!$this->upload->do_upload('video')) {
                    echo $this->upload->display_errors();
                } else {
                    $data = $this->upload->data();


                    $video = $data["file_name"];
                }
            }



            $this->update_model->update_register($profile, $certify_img, $video);
        }
    }

    function logout() {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect('home');
    }

}
