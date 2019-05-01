<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Form Validaiton
| -------------------------------------------------------------------------
| 
*/
$config = array(
        'login' => array(
                array(
                        'field' => 'email_id',
                        'label' => 'Email',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required'
                ),
        ),
        'admin-login' => array(
                array(
                        'field' => 'username',
                        'label' => 'Username',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required'
                ),
        ),
        'email' => array(
                array(
                        'field' => 'emailaddress',
                        'label' => 'EmailAddress',
                        'rules' => 'required|valid_email'
                ),
                array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'required|alpha'
                ),
                array(
                        'field' => 'title',
                        'label' => 'Title',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'message',
                        'label' => 'MessageBody',
                        'rules' => 'required'
                )
        ),
        'post-requirement-form' => array(
                array(
                        'field' => 'company_name',
                        'label' => 'Company name',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'product_id',
                        'label' => 'Product Name',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'quality_specification',
                        'label' => 'Quality Specification',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'from_date',
                        'label' => 'From Date',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'to_date',
                        'label' => 'To Date',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'price',
                        'label' => 'Price',
                        'rules' => 'required|numeric|greater_than[1]|less_than[2000]'
                ),
                array(
                        'field' => 'quantity',
                        'label' => 'Quantity',
                        'rules' => 'required|numeric|greater_than[1]|less_than[100000]'
                ),
                array(
                        'field' => 'total_price',
                        'label' => 'Total Price',
                        'rules' => 'required|numeric|greater_than[1]'
                ),
                array(
                        'field' => 'delivery_address',
                        'label' => 'Delivery Address',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'state_id',
                        'label' => 'Select State',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'city_id',
                        'label' => 'Select City',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'pincode',
                        'label' => 'Pincode',
                        'rules' => 'required|numeric|exact_length[6]'
                ),
                array(
                        'field' => 'payment_terms',
                        'label' => 'Payment Terms',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'is_logistic',
                        'label' => 'Logistic',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'certification_id',
                        'label' => 'Select Certification',
                        'rules' => 'required'
                ),
                
        ),
        'search-post-requirement-form' => array(
                array(
                        'field' => 'state_id',
                        'label' => 'Select State',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'city_id',
                        'label' => 'Select City',
                        'rules' => 'required'
                ),
                                
        ),
        'search-user-form' => array(
                array(
                        'field' => 'state_id',
                        'label' => 'Select State',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'city_id',
                        'label' => 'Select City',
                        'rules' => 'required'
                ),
                                
        ),
        'products-form' => array(
                    array(
                            'field' => 'product_category_id',
                            'label' => 'Category',
                            'rules' => 'required'
                    ),
                    array(
                            'field' => 'name',
                            'label' => 'Product name',
                            'rules' => 'required'
                    ),
                    array(
                            'field' => 'description',
                            'label' => 'Description',
                            'rules' => 'required'
                    ),
//                    array(
//                            'field' => 'from_date',
//                            'label' => 'From Date',
//                            'rules' => 'required'
//                    ),
//                    array(
//                            'field' => 'to_date',
//                            'label' => 'To Date',
//                            'rules' => 'required'
//                    ),
//                    array(
//                            'field' => 'quantity',
//                            'label' => 'Quantity',
//                            'rules' => 'required|numeric'
//                    ),
//                    array(
//                            'field' => 'price',
//                            'label' => 'Price',
//                            'rules' => 'required|numeric'
//                    ),
//                    array(
//                            'field' => 'quality',
//                            'label' => 'Quality',
//                            'rules' => 'required'
//                    ),
                    array(
                            'field' => 'status',
                            'label' => 'Status',
                            'rules' => 'required'
                    )
            ),
    
            'product-category-form' => array(
                    
                    array(
                            'field' => 'name',
                            'label' => 'Category Name',
                            'rules' => 'required'
                    ),
                    array(
                            'field' => 'status',
                            'label' => 'Status',
                            'rules' => 'required'
                    )
            ),
    
            'user-type-form' => array(
                    array(
                            'field' => 'name',
                            'label' => 'Name',
                            'rules' => 'required'
                    ),
                    array(
                            'field' => 'description',
                            'label' => 'Description',
                            'rules' => 'required'
                    ),
                    array(
                            'field' => 'status',
                            'label' => 'Status',
                            'rules' => 'required'
                    )
            ),
            'change-password-form' => array(
                    array(
                            'field' => 'password',
                            'label' => 'Password',
                            'rules' => 'required|min_length[5]|matches[confirm_password]'
                    ),
                    array(
                            'field' => 'confirm_password',
                            'label' => 'Confirm Password',
                            'rules' => 'required|min_length[5]'
                    ),
            ),
            'contact-us' => array(
                    array(
                            'field' => 'name',
                            'label' => 'Name',
                            'rules' => 'required|alpha'
                    ),
                    array(
                            'field' => 'email_id',
                            'label' => 'Email Id',
                            'rules' => 'required|valid_email'
                    ),
                    array(
                            'field' => 'mobile_no',
                            'label' => 'Mobile number',
                            'rules' => 'required|numeric|exact_length[10]'
                    ),
                    array(
                            'field' => 'query',
                            'label' => 'Message',
                            'rules' => 'required'
                    ),
            ),
            'setting-form' => array(
                    array(
                            'field' => 'title',
                            'label' => 'Title',
                            'rules' => 'required'
                    ),
                    array(
                            'field' => 'key',
                            'label' => 'key',
                            'rules' => 'required'
                    ),
                    array(
                            'field' => 'value',
                            'label' => 'Status',
                            'rules' => 'required'
                    ),
            )
);
$config['error_prefix'] = '<div class="error">';
$config['error_suffix'] = '</div>';






