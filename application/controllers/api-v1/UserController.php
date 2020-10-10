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
                    
                    $arrmixTokenData = [
                        'user_id' => $arrUserDetails['user_id'],
                        'user_type_id' => $arrUserDetails['user_type_id'],
                        'fullname' => $arrUserDetails['fullname'],
                        'username' => $arrUserDetails['username'],
                        'email_id' => $arrUserDetails['email_id'],
                        'mobile_no' => $arrUserDetails['mobile_no'],
                        'is_verified' => $arrUserDetails['is_verified'],
                        'is_subscription' => $arrUserDetails['is_subscription'],
                        'status' => $arrUserDetails['status']
                    ];
                    
                    $arrResult['success'] = true;
                    $arrResult['data'] = $arrUserDetails;
                    $arrResult['userToken'] = getEncryptedToken( $arrmixTokenData );
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
            
            if( true == isset( $_FILES['profile_image']['name'] ) && true == isVal( $_FILES['profile_image']['name'] ) ) {
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
                $arrDetails['password'] = md5( $arrDetails['password'] );
                
                $intUserId = $this->User->insert( $arrDetails );
                if( true == isIdVal( $intUserId ) ) {
                    $arrmixUserCertificationData = [];
                    if( true == isVal( $arrPost['certification_id'] ) ) {
                        $arrCeritificationIds = explode( ',', $arrPost['certification_id'] );
                        foreach( $arrCeritificationIds as $intCertificationId ) {
                            if( 0 != $intCertificationId ) {
                                $arrUserCertificationData = [
                                    'user_id' => $intUserId,
                                    'certification_id' => $intCertificationId
                                ];
                                $arrmixUserCertificationData[] = $arrUserCertificationData;
                            }

                        }
                    }
                    
                    if( true == isArrVal( $arrmixUserCertificationData ) ) {
                        $this->UserCertifications->insertBatch( $arrmixUserCertificationData );
                    }
                    
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
            $arrResult['message'] = 'Validation Errors : ' . implode( ',', $this->form_validation->error_array() );
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
                $arrmixUserCount = $this->User->getUserByUserTypeIdByStateIdByCityIdByEcommerceBrand( $arrPost );
            } else {
                $arrmixUserSearchList = $this->User->getUserBysearchKey( $arrPost, LIMIT, $intOffset );
                $arrmixUserCount = $this->User->getUserBysearchKey( $arrPost );
            }
            
            if( true == isArrVal( $arrmixUserSearchList ) ) {
                $arrResult['success'] = true;
                $arrResult['message'] = 'Successfully fetch data for Users';
                $arrResult['total_count'] = count( $arrmixUserCount );
                $arrResult['total_page'] = round( count( $arrmixUserCount ) / LIMIT );
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
            $arrUserOrganicInputListCount = $this->UserInputOrganicEcommerce->getUsersInputOrganicEcommerceByUserId( $arrPost['user_id'] );
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
                $arrResult['total_count'] = count( $arrUserOrganicInputListCount );
                $arrResult['total_page'] = round( count( $arrUserOrganicInputListCount ) / LIMIT);
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
            $arrUserShopEcommerceListCount = $this->UserEcommerces->getUserEcommerceByUserId( $arrPost['user_id'] );
            
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
                $arrResult['total_count'] = count( $arrUserShopEcommerceListCount );
                $arrResult['total_page'] = round( count( $arrUserShopEcommerceListCount ) / LIMIT );
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
    
    public function forgotPassword() {
        
        $arrPost = $this->input->post();
        if( true == isset( $arrPost['username'] ) && true == isVal( $arrPost['username'] ) ) {
            $arrUserDetails = $this->User->getUserByUsername( $arrPost['username'] );
            if( true == isArrVal( $arrUserDetails ) ) {
                $strRandomString = generateRandomAlphaNumericString();
                
                $arrMailData['arrUserDetails'] = $arrUserDetails;
                $arrMailData['strRandomString'] = $strRandomString;
                
                $strTo = $arrUserDetails['email_id'];
                $strSubject = "Organic Pandit Password Reset.";
                $strMessage = $this->load->view( 'Email/forgot_password', $arrMailData, TRUE );
                $arrMailResult = $this->sendEmail( $strTo, $strSubject, $strMessage );
                if( true == $arrMailResult['success'] ) {
                    $arrUpdateData = [
                        'password' => md5( $strRandomString ),
                        'user_id' => $arrUserDetails['user_id']
                    ];
                    
                    $this->User->update( $arrUpdateData );
                    
                    $arrResult['success'] = true;
                    $arrResult['message'] = 'You password has been sent to your regsiterd Email Id ' . $arrUserDetails['email_id'];
                    
                } else {
                    $arrResult['success'] = false;
                    $arrResult['message'] = 'Mail cannot sent Something went wrong. Pleaes contact to Support Team to reset password.';
                }
                
            } else {
                $arrResult['success'] = false;
                $arrResult['message'] = 'The username ' . $arrPost['username'] . ' is not available. Please enter valid username';
            }
            
        } else {
            $arrResult['success'] = false;
            $arrResult['message'] = 'Username is required';
        }
        
        $this->response( $arrResult );
    }
    
    public function sendEnquiry() {
        $arrmixPostData = $this->input->post();

        if ( true == $this->form_validation->run( 'user-send-enquiry' ) ) {
            
            $arrmixUserDetails = $this->User->getUserById( $arrmixPostData['user_id'] );
            if( true == isArrVal( $arrmixUserDetails  ) ) {
                
                $arrmixInsertData = $arrmixPostData;
                $arrmixInsertData['updated_at'] = CURRENT_DATETIME;
                
                $intSearchEnquiryId = $this->SearchEnquiry->insert( $arrmixInsertData );
                if( true == isIdVal( $intSearchEnquiryId ) ) {

                    if( true == isIdVal( $arrmixUserDetails['mobile_no'] ) ) {
                        $strMessage = $arrmixPostData['fullname'] . ' has enquiry regarding your product. Please login to Organic Pandit portal and get the details.%0a%0aThank you.%0aTeam Organic Pandit.';
                        $this->sendSms( $arrmixUserDetails['mobile_no'], $strMessage );
                    }

                    $arrmixData['arrmixUserDetails'] = $arrmixUserDetails;
                    $arrmixData['arrmixPostData'] = $arrmixPostData;

                    $to = ADMINEMAILID;
                    $subject = "New enquiry has been sent in the Organic Pandit.";
                    $message = $this->load->view( 'Email/search_enquiry_admin', $arrmixData, TRUE );
                    $this->sendEmail( $to, $subject, $message );

                    $to = $arrmixUserDetails['email_id'];
                    $subject = "You have enquiry in the Organic Pandit.";
                    $message = $this->load->view( 'Email/search_enquiry_receiver', $arrmixData, TRUE );
                    $this->sendEmail($to, $subject, $message);

                    $arrResult['success'] = true;
                    $arrResult['message'] = 'Details has been sent to sender successfully.';

                } else {
                    $arrResult['success'] = false;
                    $arrResult['message'] = 'Something went wrong. Please try later.';
                }
            } else {
                $arrResult['success'] = false;
                $arrResult['message'] = 'User details not found which you want to send to data users. Please select the valid user.';
            }    
        } else {
            $arrResult['success'] = false;
            $arrResult['message'] = 'Validation Errors: ' . implode( ',', $this->form_validation->error_array() );
        }
        
        $this->response( $arrResult );
        
    }
    
}
