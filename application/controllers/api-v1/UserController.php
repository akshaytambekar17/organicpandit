<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserController extends MY_Controller {
    
    function __construct() {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    }
    
    public function login() {
        $arrPost = $this->input->post();
	
        if( true == isset( $arrPost['user_type_id'] ) ) {
            
            if( true == isset( $arrPost['username'] ) && true == isset( $arrPost['password'] ) ) {

                $arrUserDetails = $this->User->getUserLoginByUsernameByPasswordByUserTypeId( $arrPost['username'], $arrPost['password'], $arrPost['user_type_id'] );
                if( true == isArrVal( $arrUserDetails ) ) {
                    $arrResult['success'] = true;
                    $arrResult['data'] = $arrUserDetails;
                } else{
                    $arrResult['success'] = false;
                    $arrResult['message'] = 'Invalid Username or Password or User Type.';   
                }
            } else{
                $arrResult['success'] = false;
                $arrResult['message'] = 'Plesae enter the username and password.';
            }  
        } else {
            $arrResult['success'] = false;
            $arrResult['message'] = 'Plesae select User Type.';
        }
        
        $this->response( $arrResult );
    }
    
    public function registration() {
        $arrPost = $this->input->post();
        
        $this->form_validation->set_rules( 'user_type_id', 'User Type', 'trim|required' );
        $this->form_validation->set_rules( 'fullname', 'Fullname', 'trim|required' );
        $this->form_validation->set_rules( 'email_id', 'Email Id', 'trim|required' );
        $this->form_validation->set_rules( 'mobile_no', 'Mobile number', 'trim|required|numeric|exact_length[10]' );
        $this->form_validation->set_rules( 'username', 'Username', 'trim|required|is_unique[tbl_users.username]' );
        $this->form_validation->set_message( 'is_unique', 'The Username already exists.' );
        $this->form_validation->set_rules( 'password', 'Password', 'trim|required|min_length[5]|matches[confirm_password]' );
        $this->form_validation->set_rules( 'confirm_password', 'Confirm Password', 'trim|required|min_length[5]' );
        $this->form_validation->set_rules( 'country_id', 'Country', 'trim|required' );
        $this->form_validation->set_rules( 'state_id', 'State', 'trim|required' );
        $this->form_validation->set_rules( 'city_id', 'City', 'trim|required' );
        $this->form_validation->set_rules( 'address', 'Address', 'trim|required' );
        $this->form_validation->set_rules( 'certification_id', 'Certification', 'trim|required' );
        $this->form_validation->set_rules( 'agency_id', 'Certification Agency', 'trim|required' );
        
        if ( true == $this->form_validation->run() ) { 
            $arrDetails = $arrPost;
            if( true == isset( $_FILES['profile_image']['name'] ) ) {
                $arrConfigProfileImage['upload_path'] = './assets/images/gallery/';
                $arrConfigProfileImage['allowed_types'] = 'gif|jpg|png|jpeg';
                $arrConfigProfileImage['max_size'] = 2048;

                $this->load->library( 'upload', $arrConfigProfileImage );
                if( $this->upload->do_upload( 'profile_image' ) ) {
                    $arrUploadData = $this->upload->data();
                    $strProfileImage = $arrUploadData['file_name'];
                    $strError = '';
                } else {
                    $strError = $this->upload->display_errors();
                    $strProfileImage = '';
                }
            } else {
                $strProfileImage = '';
                $strError = '';
            }
            if( false == isStrVal( $strError ) ) {
                
                unset( $arrDetails['confirm_password'] );
                unset( $arrDetails['certification_id'] );
                $arrDetails['profile_image'] = $strProfileImage;
                $arrDetails['status'] = ENABLED;
                
                $intUserId = $this->User->insert( $arrDetails );
                if( true == isIdVal( $intUserId ) ) {
                    $arrCeritificationIds = explode( ',', $arrPost['certification_id'] );
                    foreach( $arrCeritificationIds as $intCertificationId ) {
                        $arrUserCertificationData = [
                            'user_id' => $intUserId,
                            'certification_id' => $intCertificationId
                        ];
                        $arrmixUserCertificationData[] = $arrUserCertificationData;
                        $arrUserCertificationData = array();
                    }
                    
                    $this->UserCertifications->insertBatch( $arrmixUserCertificationData );
                    
                    $arrUserTypeDetails = $this->UserType->getUserTypeById( $arrPost['user_type_id'] );
                    $arrNotificationInsertData =  [
                        'user_id' => $intUserId,
                        'user_type_id' => $arrPost['user_type_id'],
                        'notification_type' => REGISTRATION,
                        'notify_type' => NOTIFY_WEB,
                        'message' => 'New ' . $arrUserTypeDetails['name'] . ' ' . $arrPost['fullname'] . ' has been register through app',
                    ];

                    $this->Notifications->insert( $arrNotificationInsertData );
                    $arrResult['success'] = true;
                    $arrResult['message'] = 'Registration has been done successfully. Please continue with login.';
                } else {
                    $arrResult['success'] = false;
                    $arrResult['message'] = 'Registration has been failed. Pleaes try again later';
                }
            } else {
                $arrResult['success'] = false;
                $arrResult['message'] = 'Error while uploading Image. Error : ' . strip_tags( $strError );
            }
        } else {
            $arrResult['success'] = false;
            $arrResult['message'] = 'Validation Errors';
            $arrResult['error'] = $this->form_validation->error_array();
        }
        
        $this->response( $arrResult );
    }
    
    public function getUsersList() {
        $arrPost = $this->input->post();
        if( true == isset( $arrPost['user_type_id'] ) && true == isIdVal( $arrPost['user_type_id'] ) && true == isset( $arrPost['state_id'] ) && true == isIdVal( $arrPost['state_id'] ) ) {
            
            $intOffset = DEFAULT_OFFEST;
            if( true == isset( $arrPost['page_no'] ) && true == isIdVal( $arrPost['page_no'] ) ) {
                $intOffset = $this->calculateOffset( $arrPost['page_no'] );
            }
            
            if( ORGANIC_INPUT == $arrPost['user_type_id']) {
                $arrmixUserSearchList = $this->User->getUserByUserTypeIdByStateIdByCityIdByEcommerceBrand( $arrPost, LIMIT, $intOffset );
            } else {
                $arrmixUserSearchList = $this->User->getUserBysearchKey( $arrPost, LIMIT, $intOffset );
            }
            
            if( true == isArrVal( $arrmixUserSearchList ) ) {
                $arrResult['success'] = true;
                $arrResult['message'] = 'Successfully fetch data for Users';
                $arrResult['data'] = $arrmixUserSearchList;
            } else {
                $arrResult['success'] = false;
                $arrResult['message'] = 'No users data found';
            }
        } else {
            $arrResult['success'] = false;
            $arrResult['message'] = 'User type and State is required';
        }
        
        $this->response( $arrResult );
        
    }
    
    public function getUserDetails() {
        $arrPost = $this->input->post();
        if( true == isset( $arrPost['user_id'] ) && true == isIdVal( $arrPost['user_id'] ) ) {
            
            $arrUserDetails = $this->User->getUserById( $arrPost['user_id'] );
            if( true == isArrVal( $arrUserDetails ) ) {
                $arrAgencyDetails = $this->CertificationAgency->getCertificationAgencyById( $arrUserDetails['agency_id'] );
                $arrUserProductList = $this->UserProduct->getUserProductsByUserId( $arrUserDetails['user_id'] );
                $arrUserCropList = $this->UserCrop->getUserCropsByUserId( $arrUserDetails['user_id'] );
                $arrUserSoilList = $this->UserSoil->getUserSoilByUserId( $arrUserDetails['user_id'] );
                $arrUserMicroList = $this->UserMicroNutrient->getUserMicroNutrientByUserId( $arrUserDetails['user_id'] );
                $arrUserInputList = $this->UserInputOrganic->getUserInputOrganicByUserId( $arrUserDetails['user_id'] );

                $arrmixUserProductList = [];
                $arrmixUserSoilList = [];
                $arrmixUserMicroList = [];
                if( true == isArrVal( $arrUserProductList ) ) {
                    $arrQuantitesList = getQuantities();    
                    foreach( $arrUserProductList as $arrUserProductDetails ) {
                        $arrUserProductDetails['quantity_name'] = $arrQuantitesList[$arrUserProductDetails['quantity_id']];
                        $arrUserProductDetails['images'] = ( true == isVal( $arrUserProductDetails['images'] ) ) ? base_url() . USER_PRODUCT_IMAGE_PATH . $arrUserProductDetails['images'] : '';

                        $arrmixUserProductList[] = $arrUserProductDetails;
                    }
                }

                if( true == isArrVal( $arrUserSoilList ) ) {
                    $arrSoilElementList = getSoilElement();    
                    $arrSoilPercentageList = getSoilPercentage();    
                    foreach( $arrUserSoilList as $arrUserSoilDetails ) {
                        $arrUserSoilDetails['element_name'] = $arrSoilElementList[$arrUserSoilDetails['element']];                    
                        $arrUserSoilDetails['percentage_name'] = $arrSoilPercentageList[$arrUserSoilDetails['percentage']];                    

                        $arrmixUserSoilList[] = $arrUserSoilDetails;
                    }
                }

                if( true == isArrVal( $arrUserMicroList ) ) {
                    $arrMicroElementList = getMicroElement();    
                    $arrMicroPercentageList = getMicroPercentage();    
                    foreach( $arrUserMicroList as $arrUserMicroDetails ) {
                        $arrUserMicroDetails['element_name'] = $arrMicroElementList[$arrUserMicroDetails['element']];                    
                        $arrUserMicroDetails['percentage_name'] = $arrMicroPercentageList[$arrUserMicroDetails['percentage']];                    

                        $arrmixUserMicroList[] = $arrUserMicroDetails;
                    }
                }
                $arrUserDetails['ceo_name'] = ( NULL == $arrUserDetails['ceo_name'] ) ? 'NA' : $arrUserDetails['ceo_name'];
                $arrUserDetails['organization_name'] = ( NULL == $arrUserDetails['organization_name'] ) ? 'NA' : $arrUserDetails['organization_name'];
                $arrUserDetails['profile_image'] = base_url() . GALLERY_IMAGE_PATH . $arrUserDetails['profile_image'];
                if( true == isArrVal( $arrAgencyDetails ) ) {
                    $arrUserDetails['agency_name'] = $arrAgencyDetails['name'];
                }
                $arrUserDetails['user_product_list'] = $arrmixUserProductList;
                $arrUserDetails['user_crop_list'] = $arrUserCropList;
                $arrUserDetails['user_soil_list'] = $arrmixUserSoilList;
                $arrUserDetails['user_micro_list'] = $arrmixUserMicroList;
                $arrUserDetails['user_input_list'] = $arrUserInputList;
            
            
                $arrResult['success'] = true;
                $arrResult['message'] = 'Successfully fetch user data';
                $arrResult['data'] = $arrUserDetails;
            } else {
                $arrResult['success'] = false;
                $arrResult['message'] = 'No data found';
            }
        } else {
            $arrResult['success'] = false;
            $arrResult['message'] = 'User Id is required';
        }
        
        $this->response( $arrResult );
        
    }
    
    public function getUserOrganicInputList() {
        $arrPost = $this->input->post();
        if( true == isset( $arrPost['user_id'] ) && true == isIdVal( $arrPost['user_id'] ) ) {
            
            $intOffset = DEFAULT_OFFEST;
            if( true == isset( $arrPost['page_no'] ) && true == isIdVal( $arrPost['page_no'] ) ) {
                $intOffset = $this->calculateOffset( $arrPost['page_no'] );
            }
            
            $arrUserOrganicInputList = $this->UserInputOrganicEcommerce->getUsersInputOrganicEcommerceByUserId( $arrPost['user_id'], LIMIT, $intOffset );
            $arrOrganicInputEcommerceCategoryList = getEcommerceCategory();
            $arrOrganicInputEcommerceSubCategoryList = getEcommerceSubCategory();
            $arrmixUserOrganicInputList = [];
            
            foreach( $arrUserOrganicInputList as $arrUserOrganicInputDetails ) {
                $arrUserOrganicInputDetails['category_name'] = $arrOrganicInputEcommerceCategoryList[$arrUserOrganicInputDetails['category_id']];
                $arrUserOrganicInputDetails['sub_category_name'] = $arrOrganicInputEcommerceSubCategoryList[$arrUserOrganicInputDetails['sub_category_id']];
                $arrUserOrganicInputDetails['images'] = ( true == isVal( $arrUserOrganicInputDetails['images'] ) ) ? base_url() . ORGANIC_INPUT_ECOMMERCE_IMAGE_PATH . $arrUserOrganicInputDetails['images'] : '';
                
                $arrmixUserOrganicInputList[] = $arrUserOrganicInputDetails;
            }
            
            if( true == isArrVal( $arrmixUserOrganicInputList ) ) {
                $arrResult['success'] = true;
                $arrResult['message'] = 'Successfully fetch data for User organic input';
                $arrResult['data'] = $arrmixUserOrganicInputList;
            } else {
                $arrResult['success'] = false;
                $arrResult['message'] = 'No users data found';
            }
        } else {
            $arrResult['success'] = false;
            $arrResult['message'] = 'User Id is required';
        }
        
        $this->response( $arrResult );
        
    }
    
    public function getUserOrganicInputDetails() {
        $arrPost = $this->input->post();
        if( true == isset( $arrPost['user_organic_input_id'] ) && true == isIdVal( $arrPost['user_organic_input_id'] ) ) {
            
            $arrUserOrganicInputDetails = $this->UserInputOrganicEcommerce->getUsersInputOrganicEcommerceById( $arrPost['user_organic_input_id'] );
            if( true == isArrVal( $arrUserOrganicInputDetails ) ) {
                $arrResult['success'] = true;
                $arrResult['message'] = 'Successfully fetch data for User organic input';
                $arrResult['data'] = $arrUserOrganicInputDetails;
            } else {
                $arrResult['success'] = false;
                $arrResult['message'] = 'No ecommerce data found';
            }
        } else {
            $arrResult['success'] = false;
            $arrResult['message'] = 'Organic Input Ecommerce is required';
        }
        
        $this->response( $arrResult );
    }
    
    public function getUserShopEcommerceList() {
        $arrPost = $this->input->post();
        if( true == isset( $arrPost['user_id'] ) && true == isIdVal( $arrPost['user_id'] ) ) {
            
            $intOffset = DEFAULT_OFFEST;
            if( true == isset( $arrPost['page_no'] ) && true == isIdVal( $arrPost['page_no'] ) ) {
                $intOffset = $this->calculateOffset( $arrPost['page_no'] );
            }
            $arrUserShopEcommerceList = $this->UserEcommerces->getUserEcommerceByUserId( $arrPost['user_id'], LIMIT, $intOffset );
            if( true == isArrVal( $arrUserShopEcommerceList ) ) {
                
                $arrmixUserShopEcommerceList = [];
                foreach( $arrUserShopEcommerceList as $arrUserShopEcommerceDetails ) {
                    $arrUserShopEcommerceDetails['primary_image'] = ( true == isVal( $arrUserShopEcommerceDetails['primary_image'] ) ) ? base_url() . USER_PRODUCT_IMAGE_PATH . $arrUserShopEcommerceDetails['primary_image'] : '';
                    $arrUserShopEcommerceDetails['other_image1'] = ( true == isVal( $arrUserShopEcommerceDetails['other_image1'] ) ) ? base_url() . USER_PRODUCT_IMAGE_PATH . $arrUserShopEcommerceDetails['other_image1'] : '';
                    $arrUserShopEcommerceDetails['other_image2'] = ( true == isVal( $arrUserShopEcommerceDetails['other_image2'] ) ) ? base_url() . USER_PRODUCT_IMAGE_PATH . $arrUserShopEcommerceDetails['other_image2'] : '';
                    $arrUserShopEcommerceDetails['other_image3'] = ( true == isVal( $arrUserShopEcommerceDetails['other_image2'] ) ) ? base_url() . USER_PRODUCT_IMAGE_PATH . $arrUserShopEcommerceDetails['other_image3'] : '';

                    $arrmixUserShopEcommerceList[] = $arrUserShopEcommerceDetails;
                }
               
                $arrResult['success'] = true;
                $arrResult['message'] = 'Successfully fetch data for User Shop Ecommerce';
                $arrResult['data'] = $arrmixUserShopEcommerceList;
            } else {
                $arrResult['success'] = false;
                $arrResult['message'] = 'No user shops data found';
            }
        } else {
            $arrResult['success'] = false;
            $arrResult['message'] = 'User Id is required';
        }
        
        $this->response( $arrResult );
        
    }
    
    public function getUserShopEcommerceDetails() {
        $arrPost = $this->input->post();
        if( true == isset( $arrPost['user_ecommerce_id'] ) && true == isIdVal( $arrPost['user_ecommerce_id'] ) ) {
            
            $arrUserShopEcommerceDetails = $this->UserEcommerces->getUserEcommerceByUserEcommerceId( $arrPost['user_ecommerce_id'] );
            if( true == isArrVal( $arrUserShopEcommerceDetails ) ) {
                $arrResult['success'] = true;
                $arrResult['message'] = 'Successfully fetch data for User Shop';
                $arrResult['data'] = $arrUserShopEcommerceDetails;
            } else {
                $arrResult['success'] = false;
                $arrResult['message'] = 'No ecommerce data found';
            }
        } else {
            $arrResult['success'] = false;
            $arrResult['message'] = 'Shop Ecommerce is required';
        }
        
        $this->response( $arrResult );
    }
    
}
