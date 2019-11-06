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
            if( empty( $_FILES['blog_image']['name'] ) ) {
                $this->form_validation->set_rules('blog_image', 'Image', 'trim|required');
            }
            $this->form_validation->set_rules('blog_status', 'Status', 'trim|required');
            
            if( true == $this->form_validation->run() ) {
                $arrDetails = $arrPost;
                $strError = '';
                if( true == isset( $_FILES['blog_image']['name'] ) && ( true == isStrVal( $_FILES['blog_image']['name'] ) ) ) {
                    $arrConfigBlogImage['upload_path'] = './assets/images/blogs/';
                    $arrConfigBlogImage['allowed_types'] = 'gif|jpg|png|jpeg';
                    $arrConfigBlogImage['max_size'] = 2048;

                    $this->load->library( 'upload', $arrConfigBlogImage );
                    if( $this->upload->do_upload( 'blog_image' ) ) {
                        $arrUploadData = $this->upload->data();
                        $strBlogImage = $arrUploadData['file_name'];
                    } else {
                        $strError = $this->upload->display_errors();
                        $strBlogImage = '';
                    }
                } else {
                    $strBlogImage = '';
                }
                if( false == isStrVal( $strError ) ) {
                    
                    $arrDetails['blog_image'] = $strBlogImage;
                    $intBlogId = $this->Blogs->insert( $arrDetails );
                    if( true == isIdVal( $intBlogId ) ) {
                        $this->session->set_flashdata( 'Message', 'New Blog has been added succesfully' );
                        return redirect( 'admin/blogs', 'refresh' );
                    } else {
                        $this->session->set_flashdata( 'Error', 'Failed to add blog' );
                        $this->backendLayout( $arrData );
                    }
                } else {
                    $this->session->set_flashdata( 'Error', $strError );
                    $arrData['strErrorMessage'] = $strError;
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
            $this->session->set_flashdata( 'Error', 'Blog not found.' );
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
            
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            $this->form_validation->set_rules('blog_status', 'Status', 'trim|required');
            
            if( true == $this->form_validation->run() ) {
                
                $arrDetails = $arrPost;
                $strError = '';
                if( true == isset( $_FILES['blog_image']['name'] ) && ( true == isStrVal( $_FILES['blog_image']['name'] ) ) ) {
                    $arrConfigBlogImage['upload_path'] = './assets/images/blogs/';
                    $arrConfigBlogImage['allowed_types'] = 'gif|jpg|png|jpeg';
                    $arrConfigBlogImage['max_size'] = 2048;

                    $this->load->library( 'upload', $arrConfigBlogImage );
                    if( $this->upload->do_upload( 'blog_image' ) ) {
                        $arrUploadData = $this->upload->data();
                        $strBlogImage = $arrUploadData['file_name'];
                    } else {
                        $strError = $this->upload->display_errors();
                        $strBlogImage = '';
                    }
                } else {
                    $strBlogImage = true == isset( $arrPost['blog_image_hidden'] ) ? $arrPost['blog_image_hidden'] : '';
                }
                if( false == isStrVal( $strError ) ) {
                    
                    unset( $arrDetails['blog_image_hidden'] );
                    $arrDetails['blog_image'] = $strBlogImage;
                    $boolResult = $this->Blogs->update( $arrDetails );

                    if( true == isVal( $boolResult ) ) {
                        $this->session->set_flashdata( 'Message', 'Blog has been updated succesfully' );
                        return redirect( 'admin/blogs', 'refresh' );
                    } else {
                        $this->session->set_flashdata( 'Error', 'Failed to update blog ' );
                        $this->backendLayout( $arrData );
                    }
                } else {
                    $this->session->set_flashdata( 'Error', $strError );
                    $arrData['strErrorMessage'] = $strError;
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
        $boolResult = $this->Blogs->delete( $arrPost['blog_id'] );
        if( true == isVal( $boolResult ) ) {
            echo true;
        } else {
            echo false;
        }
    }
    
}
