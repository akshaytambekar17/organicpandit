<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends MY_Controller {

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
        public $arrmixUserSession;
        
        function __construct() {
            parent::__construct();
            
            if( false == isArrVal( $this->session->userdata('user_data') ) ) {
                redirect( 'home', 'refresh' );
            }
            
            $this->arrmixUserSession = $this->session->userdata('user_data');
        }
	public function index()
	{
            $arrmixData = [];
            $arrmixData['title'] = 'Dashboard'; 
            $arrmixData['heading'] = 'Organic Pandit';
            $arrmixData['backend'] = true;
            $arrmixData['view'] = 'common/dashboard';
            
            if( ADMINUSERNAME == $this->arrmixUserSession['username'] ) {
                $arrmixData['bid_list'] = $this->Bid->getBids();
                $arrmixData['post_requirement_list'] = $this->PostRequirement->getPostRequirements();
                $arrmixData['product_list'] = $this->Product->getProducts();
                $arrmixData['user_type_list'] = $this->UserType->getUserTypes();
                $arrmixData['certification_agencies_list'] = $this->CertificationAgency->getCertificationAgencies();
                $arrmixData['user_list'] = $this->User->getUsers();
                $arrmixData['arrLabReportsList'] = $this->LabReports->getLabReports();
            }else{
                $arrmixData['bid_list'] = $this->Bid->getBidByUserId($this->arrmixUserSession['user_id']);
                $arrmixData['post_requirement_list'] = $this->PostRequirement->getAllPostRequirementByUserId($this->arrmixUserSession['user_id']);
                $arrmixData['user_list'] = $this->User->getUserByPartnerUserId( $this->arrmixUserSession['user_id'] );
            }
            
            $arrmixData['total_worth'] = $this->PostRequirement->getTotalWorth();
            
            if( ADMINUSERNAME == $this->arrmixUserSession['username'] ){
                $arrmixData['user_details'] = $this->arrmixUserSession;
            }else{
                if( CERTIFICATION_AGENICES == $this->arrmixUserSession['user_type_id'] ) {
                    $arrmixData['user_details'] = $this->CertificationAgency->getCertificationAgencyById($this->arrmixUserSession['user_id']);
                }else{
                    $arrmixData['user_details'] = $this->User->getUserById($this->arrmixUserSession['user_id']);
                }
            }
            
            $this->backendLayout($arrmixData);
        }
}
