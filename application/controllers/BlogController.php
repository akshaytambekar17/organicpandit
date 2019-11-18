<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BlogController extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

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
    public function index() {
        
        $arrGet = $this->input->get();
        $arrData['strTitle'] = 'Publications';
        $arrData['strHeading'] = 'Publications';
        $arrData['hide_footer'] = true;
        $arrData['view'] = 'blog/list';
        if( true == isset( $arrGet['blog_category_id'] ) ) {
            $arrBlogsList = $this->Blogs->getBlogByBlogCategoryId( $arrGet['blog_category_id'] );
            $arrData['arrBlogCategoryData'] = $this->BlogCategories->getBlogCategoryByBlogCategoryId( $arrGet['blog_category_id'] );
            $arrData['intBlogCategoryId'] = $arrGet['blog_category_id'];
            
            $arrData['arrBlogsList'] = $arrBlogsList;
        } else {
            $arrData['arrBlogsList'] = $this->Blogs->getActiveBlogs();
        }
        $arrData['arrBlogCategoriesList'] = $this->BlogCategories->getBlogCategories();
        $this->load->view( 'blogs/list', $arrData );
    }
    
    public function blogDetails() {
        
        $arrGet = $this->input->get();
        $arrData['strHeading'] = 'Publications Details';
        $arrData['hide_footer'] = true;
        $arrData['view'] = 'blog/details';
        $arrBlogDetails = $this->Blogs->getBlogByBlogId( $arrGet['blog_id'] );
        if( false == isArrVal( $arrBlogDetails ) ) {
            $this->session->set_flashdata( 'Error', 'Publication not found.' );
            redirect( 'blogs', 'refresh' );
        }
        $arrData['arrBlogDetails'] = $arrBlogDetails;
        $arrData['strTitle'] = ( true == isStrVal( $arrBlogDetails['meta_title'] ) ) ? $arrBlogDetails['meta_title'] : 'Publications Details';
        $this->load->view( 'blogs/details', $arrData );
    }
    
}
