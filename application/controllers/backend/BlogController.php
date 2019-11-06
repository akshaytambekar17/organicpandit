<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BlogController extends MY_Controller {

    function __construct() {
        parent::__construct();
        $arrSession = UserSession();
        if( false == $arrSession['success'] ) {
            redirect( 'home', 'refresh' );
        } else {
            $this->arrUserSession = $arrSession['userData'];
        }
    }

    public function index() {
        $arrData['backend'] = true;
        $arrData['strTitle'] = 'Blogs List';
        $arrData['title'] = 'Blogs List';
        $arrData['strHeading'] = 'Blogs List';
        $arrData['view'] = 'blog/list';
        $arrData['arrBlogsList'] = $this->Blogs->getBlogs();
        
        $this->backendLayout( $arrData );
    }

    public function add() {
        
        $arrData['backend'] = true;
        $arrData['arrUserSessionDetails'] = $this->arrUserSession;
        $arrData['strTitle'] = 'Add Blog';
        $arrData['title'] = 'Add Blog';
        $arrData['strHeading'] = 'Add Blog';
        $arrData['strSubmitValue'] = 'Add Blog';
        $arrData['view'] = 'blog/form-details';

        if( $this->input->post() ) {
            $arrPost = $this->input->post();
            
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            $this->form_validation->set_rules('blog_image', 'Image', 'trim|required');
            $this->form_validation->set_rules('blog_status', 'Status', 'trim|required');
            
            if( true == $this->form_validation->run() ) {
                $arrDetails = $arrPost;
                
                $intBlogId = $this->Blogs->insert( $arrDetails );
                if( true == isIdVal( $intBlogId ) ) {
                    $this->session->set_flashdata( 'Message', 'New Blog has been added succesfully' );
                    return redirect( 'admin/blogs', 'refresh' );
                } else {
                    $this->session->set_flashdata( 'Error', 'Failed to add blog' );
                    $this->backendLayout( $arrData );
                }
            } else {
                $this->backendLayout( $arrData );
            }    
            
        } else {
            $this->backendLayout( $arrData );
        }
    }

    public function update() {
        $arrGet = $this->input->get();

        $arrBlogDetails = $this->Blogs->getBlogByBlogId( $arrGet['blog_id'] );
        if( false == isArrVal( $arrBlogDetails ) ) {
            $this->session->set_flashdata( 'Error', 'Soil not found.' );
            redirect( 'admin/blogs', 'refresh' );
        }
        $arrData['backend'] = true;
        $arrData['arrUserSessionDetails'] = $this->arrUserSession;
        $arrData['arrBlogDetails'] = $arrBlogDetails;
        $arrData['strTitle'] = 'Update Blog';
        $arrData['title'] = 'Update Blog';
        $arrData['strHeading'] = 'Update Blog';
        $arrData['strSubmitValue'] = 'Update Blog';
        $arrData['view'] = 'blog/form-details';

        if( $this->input->post() ) {
            $arrPost = $this->input->post();
            if( ADMINUSERNAME == $this->arrUserSession['username'] ) {
                $this->form_validation->set_rules('user_id', 'User', 'trim|required');
            }
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            $this->form_validation->set_rules('blog_status', 'Status', 'trim|required');
            
            if( true == $this->form_validation->run() ) {
                
                $arrDetails = $arrPost;
                
                
                $boolResult = $this->Blogs->update( $arrDetails );

                if( true == isVal( $boolResult ) ) {
                    $this->session->set_flashdata( 'Message', 'Soil has been updated succesfully' );
                    return redirect( 'admin/blogs', 'refresh' );
                } else {
                    $this->session->set_flashdata( 'Error', 'Failed to update Soil ' );
                    $this->backendLayout( $arrData );
                }
                
            } else {
                $this->backendLayout( $arrData );
            }
        } else {
            $this->backendLayout( $arrData );
        }
    }

    public function delete() {
        $arrPost = $this->input->post();
        $boolResult = $this->Blogs->delete( $arrPost['id'] );
        if( true == isStrVal( $boolResult ) ) {
            echo true;
        } else {
            echo false;
        }
    }
    
}
