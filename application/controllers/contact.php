<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {

    public function __Construct() {
        parent::__Construct();
    }

    public function index() {
        $data['view'] = 'user/contact_us';
        $data['title'] = 'Contact Us';
        $data['homeSlider'] = true;
        if($this->input->post()){
            $post = $this->input->post();

            if($this->form_validation->run('contact-us') == TRUE){
                $details = $post;
                $details['updated_at'] = date('Y-m-d H:i:s');
                $details['created_at'] = date('Y-m-d H:i:s');
                $details['is_send_mail'] = 0;

                $contact_id = $this->ContactUs->add($details);
                if(!empty($contact_id)){
                    $mail_data['contact_details'] = $details;
                    $mail_data['contact_id'] = $contact_id;

                    $to = ADMINEMAILID;
                    $subject = "New Contact us enquiry";
                    $message = $this->load->view('Email/contact_us',$mail_data,TRUE);
                    $result_mail = $this->sendEmail($to, $subject, $message);
                    $this->session->set_flashdata('Message', 'Thank you, Mail has send successfully. Our support team will contact soon.');
                    return redirect('contact', 'refresh');
//                    if($result_mail['success']){
//                        $update_details = array('id' => $contact_id,
//                                            'is_send_mail' => 1
//                                    );
//                        $this->ContactUs->update($update_details);
//                        $this->session->set_flashdata('Message', 'Thank you, Mail has send successfully. Our support team will contact soon.');
//                        return redirect('contact', 'refresh');
//                    }else{
//                        $this->session->set_flashdata('Message', 'Mail cannot send. Something went wrong, Our support team will contact soon.');
//                        return redirect('contact', 'refresh');
//                    }
                }else{
                    $this->session->set_flashdata('Message', 'Something went wrong, Please try again later.');
                    $this->frontendLayoutHome($data);
                }
            }else{
                $this->frontendLayoutHome($data);
            }
        }else{
            $this->frontendLayoutHome($data);
        }

    }

    public function sendMail() {

        $this->load->library('encrypt');
        $from_email = "swapnesh@sandatwebsolution.com";
        $to_email = $this->input->post('email');
        $username = $this->input->post('username');
        $address = $this->input->post('$address');
        $message = $this->input->post('message');
        // $to_email = "swapnesh@sandatwebsolution.com";
        //Load email library
        $this->load->library('email');

        $this->email->from($from_email, 'Organic Pandit');
        $this->email->to($to_email);
        $this->email->subject('organic pandit');
        $this->email->message($message);


//Send email

        if ($this->email->send()) {
            echo 'Email sent.';
        } else {
            // 	show_error($this->email->print_debugger());
            echo 'Email not  sent.';
        }
    }

}
