<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostRequirementController extends MY_Controller {
    function __construct() {
        parent::__construct();
        $session = UserSession();
        if ( empty( $session['success'] ) ) {
            redirect('admin', 'refresh');
        }else {
            $userSession = $session['userData'];
//            if( ADMINUSERNAME != $userSession['username'] ){
//                redirect('home', 'refresh');
//            }
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
        $data['title'] = 'Post Data';
        $data['heading']='Post List';
        $data['backend'] = true;
        $data['view'] = 'post-requirement/list';
        $data['user_data'] = $userSession;
        if($userSession['username'] == ADMINUSERNAME){
            $this->PostRequirement->updateIsView();
            $data['post_list'] = $this->PostRequirement->getPostRequirementsWithProductDetails();
        }else{
            $data['post_list'] = $this->PostRequirement->getPostRequirementsWithProductDetailsByUserId($userSession['user_id']);
        }
        $this->backendLayout($data);
    }
    public function create(){
        
        if($this->input->post()){
            $session = UserSession();
            $userSession = $session['userData'];
            $post = $this->input->post();
            $details = $post;
            $details['user_id'] = $userSession['user_id'];
            $details['is_seen'] = 0;
            $details['is_view'] = 0;
            $details['is_deleted'] = 0;
            $details['updated_at'] = date('Y-m-d H:i:s');
            $details['created_at'] = date('Y-m-d H:i:s');
            $data = $this->Bid->insert($details);
            if($data){
                $bids = $this->Bid->getBidByPostRequirementId($post['post_requirement_id']);
                if(!empty($bids) && count($bids)>0){
                    $result['success'] = true;
                    $result['data'] = count($bids);
                }else{
                    $result['success'] = true;
                    $result['data'] = 0;
                }
                
            }else{
                $result['success'] = false;
                $result['data'] = 0;
            }
        }else{
            $result['success'] = false;
            $result['data'] = 0;
        }
        echo json_encode($result);
    }
    public function update(){
        $get = $this->input->get();
        $post_details = $this->PostRequirement->getPostRequirementById($get['id']);
        if($this->input->post()){
            $post = $this->input->post();
            $details = $post;
            $details['updated_at'] = date('Y-m-d H:i:s');
            $result = $this->PostRequirement->update($details);
            $post_details = $this->PostRequirement->getPostRequirementById($post['id']);
            if ($result) {
                if($post['is_verified'] == 2){
                    $verified = "Approve post of";
                }else{
                    $verified = "Reject post of";
                }
                $userDetails = $this->User->getUserById($post_details['user_id']);
                $data_notify = array(
                                        'user_id' => $userDetails['user_id'],
                                        'user_type_id' => $userDetails['user_type_id'],
                                        'notification_type' => VERIFY_POST,
                                        'notify_type' => NOTIFY_WEB,
                                        'message' => 'Admin '.''.$verified.' '.$userDetails['fullname'],
                                    );
                $result_notification = $this->Notifications->insert($data_notify);
                $this->session->set_flashdata('Message', 'Post '.$post['post_code'].' has been updated Succesfully');
                return redirect('admin/post-requirement', 'refresh');
            } else {
                $this->session->set_flashdata('Error', 'Failed to update post '.$post['post_code']);
                $post_details = $this->PostRequirement->getPostRequirementById($post['id']);
                $data['title'] = $post_details['post_code'] ;
                $data['heading'] ='Update Post '.$post_details['post_code'];
                $data['view'] = 'post-requirement/update-details';
                $data['backend'] = true;
                $data['post_details'] = $post_details;
                $this->backendLayout($data);
            }
        }else{
            $data['title'] = $post_details['post_code'] ;
            $data['heading'] ='Update Post '.$post_details['post_code'];
            $data['view'] = 'post-requirement/update-details';
            $data['backend'] = true;
            $data['post_details'] = $post_details;
            $this->backendLayout($data);
        }
    }
    public function delete(){
        $post = $this->input->post();
        $result = $this->PostRequirement->delete($post['id']);
        if($result){
            echo true;
        }else{
            echo false;
        }
   }
   public function bidList()
    {
        $session = UserSession();
        $userSession = $session['userData'];
        $get = $this->input->get();
        $bid_list = $this->Bid->getBidByPostRequirementId($get['post_id']);
        $post_details = $this->PostRequirement->getProductNameByPostRequirementId($get['post_id']); 
        $data['title'] = "Bid List of Post -".$post_details['post_code'];
        $data['heading'] = "Bid List of Post -".$post_details['post_code'];
        $data['backend'] = true;
        $data['view'] = 'post-requirement/bid_list';
        $data['user_data'] = $userSession;
        $data['bid_list'] = $bid_list;
        $data['post_details'] = $post_details;
        $this->backendLayout($data);
    }
}
