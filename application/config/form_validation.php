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
                array(
                        'field' => 'certification_id',
                        'label' => 'Select Certification',
                        'rules' => 'trim'
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
            ),
	        'sell-product-form' => array(
		        array(
			        'field' => 'category_id',
			        'label' => 'Category',
			        'rules' => 'required'
		        ),
		        array(
			        'field' => 'product_id',
			        'label' => 'Product',
			        'rules' => 'required'
		        ),
		        array(
			        'field' => 'product_description',
			        'label' => 'Product Description',
			        'rules' => 'required'
		        ),
		        array(
			        'field' => 'sell_quantity',
			        'label' => 'Quantity',
			        'rules' => 'required||numeric|greater_than_equal_to[1]|less_than_equal_to[1000]'
		        ),
		        array(
			        'field' => 'price',
			        'label' => 'Price',
			        'rules' => 'required||numeric'
		        ),
		        array(
			        'field' => 'total_price',
			        'label' => 'Total Price',
			        'rules' => 'required'
		        ),
		        array(
			        'field' => 'variety',
			        'label' => 'Variety',
			        'rules' => 'required'
		        ),
		        array(
			        'field' => 'moisture',
			        'label' => 'Moisture',
			        'rules' => 'required'
		        ),
		        array(
			        'field' => 'texture',
			        'label' => 'Texture',
			        'rules' => 'required'
		        ),
		        array(
			        'field' => 'colour',
			        'label' => 'Colour',
			        'rules' => 'required'
		        ),
		        array(
			        'field' => 'broken_ratio',
			        'label' => 'Broken Ratio',
			        'rules' => 'required'
		        ),
		        array(
			        'field' => 'crop_year',
			        'label' => 'Crop Year',
			        'rules' => 'required'
		        ),
		        array(
			        'field' => 'certification_id',
			        'label' => 'Certification',
			        'rules' => 'required'
		        ),
		        array(
			        'field' => 'grain_length',
			        'label' => 'Grain Length',
			        'rules' => 'required'
		        ),
		        array(
			        'field' => 'supply_quantity',
			        'label' => 'Supply Quantity',
			        'rules' => 'required'
		        ),
		        array(
			        'field' => 'packaging_type',
			        'label' => 'Packaging Type',
			        'rules' => 'required'
		        ),
		        array(
			        'field' => 'delivery_location_state',
			        'label' => 'State',
			        'rules' => 'required'
		        ),
		        array(
			        'field' => 'delivery_location[]',
			        'label' => 'City',
			        'rules' => 'required'
		        ),
		        array(
			        'field' => 'lead_time',
			        'label' => 'Lead Time',
			        'rules' => 'required'
		        ),
		        array(
			        'field' => 'delivery_type_id',
			        'label' => 'Delivery Type',
			        'rules' => 'required'
		        ),
		        array(
			        'field' => 'is_logistics',
			        'label' => 'Logistics Required',
			        'rules' => 'required'
		        ),
		        array(
			        'field' => 'other_details',
			        'label' => 'Other Details',
			        'rules' => 'required'
		        ),
		        array(
			        'field' => 'stock',
			        'label' => 'Stock',
			        'rules' => 'required'
		        )
	        ),
        'search-buy-product-form' => array(

	        array(
		        'field' => 'delivery_location_state',
		        'label' => 'State',
		        'rules' => 'trim'
	        ),
	        array(
		        'field' => 'delivery_location[]',
		        'label' => 'City',
		        'rules' => 'trim'
	        ),
	        array(
		        'field' => 'category_id',
		        'label' => 'Category',
		        'rules' => 'trim'
	        ),
	        array(
		        'field' => 'product_id',
		        'label' => 'Product',
		        'rules' => 'trim'
	        )
        ),

        'paynow-form' => array(

	        array(
		        'field' => 'fullname',
		        'label' => 'Fullname',
		        'rules' => 'required'
	        ),
	        array(
		        'field' => 'email_id',
		        'label' => 'Email Id',
		        'rules' => 'required'
	        ),
	        array(
		        'field' => 'mobile_no',
		        'label' => 'Mobile Number',
		        'rules' => 'required|numeric|exact_length[10]'
	        ),
	        array(
		        'field' => 'state_id',
		        'label' => 'State',
		        'rules' => 'required'
	        ),
	        array(
		        'field' => 'city_id',
		        'label' => 'City',
		        'rules' => 'required'
	        ),
	        array(
		        'field' => 'pincode',
		        'label' => 'Pincode',
		        'rules' => 'required|numeric|exact_length[6]'
	        ),
	        array(
		        'field' => 'address',
		        'label' => 'Address',
		        'rules' => 'required'
	        ),
	        array(
		        'field' => 'payment_method',
		        'label' => 'Payment Method',
		        'rules' => 'required'
	        )
        )


);
$config['error_prefix'] = '<div class="error">';
$config['error_suffix'] = '</div>';






