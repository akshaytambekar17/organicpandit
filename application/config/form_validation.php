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
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required'
                ),
        ),
        'admin-login' => array(
                array(
                        'field' => 'username',
                        'label' => 'Username',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required'
                ),
        ),
        'email' => array(
                array(
                        'field' => 'emailaddress',
                        'label' => 'EmailAddress',
                        'rules' => 'trim|required|valid_email'
                ),
                array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'trim|required|alpha'
                ),
                array(
                        'field' => 'title',
                        'label' => 'Title',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'message',
                        'label' => 'MessageBody',
                        'rules' => 'trim|required'
                )
        ),
        'post-requirement-form' => array(
                array(
                        'field' => 'company_name',
                        'label' => 'Company name',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'product_id',
                        'label' => 'Product Name',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'quality_specification',
                        'label' => 'Quality Specification',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'from_date',
                        'label' => 'From Date',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'to_date',
                        'label' => 'To Date',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'price',
                        'label' => 'Price',
                        'rules' => 'trim|required|numeric|greater_than[1]|less_than[2000]'
                ),
                array(
                        'field' => 'quantity',
                        'label' => 'Quantity',
                        'rules' => 'trim|required|numeric|greater_than[1]|less_than[100000]'
                ),
                array(
                        'field' => 'total_price',
                        'label' => 'Total Price',
                        'rules' => 'trim|required|numeric|greater_than[1]'
                ),
                array(
                        'field' => 'delivery_address',
                        'label' => 'Delivery Address',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'state_id',
                        'label' => 'Select State',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'city_id',
                        'label' => 'Select City',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'pincode',
                        'label' => 'Pincode',
                        'rules' => 'trim|required|numeric|exact_length[6]'
                ),
                array(
                        'field' => 'payment_terms',
                        'label' => 'Payment Terms',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'is_logistic',
                        'label' => 'Logistic',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'certification_id',
                        'label' => 'Select Certification',
                        'rules' => 'trim|required'
                ),

        ),
        'search-post-requirement-form' => array(
                array(
                        'field' => 'state_id',
                        'label' => 'Select State',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'city_id',
                        'label' => 'Select City',
                        'rules' => 'trim|required'
                ),

        ),
        'search-user-form' => array(
                array(
                        'field' => 'state_id',
                        'label' => 'Select State',
                        'rules' => 'trim|required'
                )
        ),
        'products-form' => array(
                    array(
                            'field' => 'product_category_id',
                            'label' => 'Category',
                            'rules' => 'trim|required'
                    ),
                    array(
                            'field' => 'name',
                            'label' => 'Product name',
                            'rules' => 'trim|required'
                    ),
                    array(
                            'field' => 'description',
                            'label' => 'Description',
                            'rules' => 'trim|required'
                    ),
//                    array(
//                            'field' => 'from_date',
//                            'label' => 'From Date',
//                            'rules' => 'trim|required'
//                    ),
//                    array(
//                            'field' => 'to_date',
//                            'label' => 'To Date',
//                            'rules' => 'trim|required'
//                    ),
//                    array(
//                            'field' => 'quantity',
//                            'label' => 'Quantity',
//                            'rules' => 'trim|required|numeric'
//                    ),
//                    array(
//                            'field' => 'price',
//                            'label' => 'Price',
//                            'rules' => 'trim|required|numeric'
//                    ),
//                    array(
//                            'field' => 'quality',
//                            'label' => 'Quality',
//                            'rules' => 'trim|required'
//                    ),
                    array(
                            'field' => 'status',
                            'label' => 'Status',
                            'rules' => 'trim|required'
                    )
            ),

            'product-category-form' => array(

                    array(
                            'field' => 'name',
                            'label' => 'Category Name',
                            'rules' => 'trim|required'
                    ),
                    array(
                            'field' => 'status',
                            'label' => 'Status',
                            'rules' => 'trim|required'
                    )
            ),

            'user-type-form' => array(
                    array(
                            'field' => 'name',
                            'label' => 'Name',
                            'rules' => 'trim|required'
                    ),
                    array(
                            'field' => 'description',
                            'label' => 'Description',
                            'rules' => 'trim|required'
                    ),
                    array(
                            'field' => 'status',
                            'label' => 'Status',
                            'rules' => 'trim|required'
                    )
            ),
            'change-password-form' => array(
                    array(
                            'field' => 'password',
                            'label' => 'Password',
                            'rules' => 'trim|required|min_length[5]|matches[confirm_password]'
                    ),
                    array(
                            'field' => 'confirm_password',
                            'label' => 'Confirm Password',
                            'rules' => 'trim|required|min_length[5]'
                    ),
            ),
            'contact-us' => array(
                    array(
                            'field' => 'name',
                            'label' => 'Name',
                            'rules' => 'trim|required|alpha'
                    ),
                    array(
                            'field' => 'email_id',
                            'label' => 'Email Id',
                            'rules' => 'trim|required|valid_email'
                    ),
                    array(
                            'field' => 'mobile_no',
                            'label' => 'Mobile number',
                            'rules' => 'trim|required|numeric|exact_length[10]'
                    ),
                    array(
                            'field' => 'query',
                            'label' => 'Message',
                            'rules' => 'trim|required'
                    ),
            ),
            'setting-form' => array(
                    array(
                            'field' => 'title',
                            'label' => 'Title',
                            'rules' => 'trim|required'
                    ),
                    array(
                            'field' => 'key',
                            'label' => 'key',
                            'rules' => 'trim|required'
                    ),
                    array(
                            'field' => 'value',
                            'label' => 'Status',
                            'rules' => 'trim|required'
                    ),
            ),
	        'sell-product-form' => array(
		        array(
			        'field' => 'category_id',
			        'label' => 'Category',
			        'rules' => 'trim|required'
		        ),
		        array(
			        'field' => 'product_id',
			        'label' => 'Product',
			        'rules' => 'trim|required'
		        ),
		        array(
			        'field' => 'product_description',
			        'label' => 'Product Description',
			        'rules' => 'trim'
		        ),
		        array(
			        'field' => 'sell_quantity',
			        'label' => 'Quantity',
			        'rules' => 'trim|required||numeric|greater_than_equal_to[1]|less_than_equal_to[1000]'
		        ),
		        array(
			        'field' => 'price',
			        'label' => 'Price',
			        'rules' => 'trim|required||numeric'
		        ),
		        array(
			        'field' => 'total_price',
			        'label' => 'Total Price',
			        'rules' => 'trim|required'
		        ),
		        array(
			        'field' => 'variety',
			        'label' => 'Variety',
			        'rules' => 'trim'
		        ),
		        array(
			        'field' => 'moisture',
			        'label' => 'Moisture',
			        'rules' => 'trim'
		        ),
		        array(
			        'field' => 'texture',
			        'label' => 'Texture',
			        'rules' => 'trim'
		        ),
		        array(
			        'field' => 'colour',
			        'label' => 'Colour',
			        'rules' => 'trim'
		        ),
		        array(
			        'field' => 'broken_ratio',
			        'label' => 'Broken Ratio',
			        'rules' => 'trim'
		        ),
		        array(
			        'field' => 'crop_year',
			        'label' => 'Crop Year',
			        'rules' => 'trim'
		        ),
		        array(
			        'field' => 'certification_id',
			        'label' => 'Certification',
			        'rules' => 'trim|required'
		        ),
		        array(
			        'field' => 'grain_length',
			        'label' => 'Grain Length',
			        'rules' => 'trim'
		        ),
		        array(
			        'field' => 'supply_quantity',
			        'label' => 'Supply Quantity',
			        'rules' => 'trim'
		        ),
		        array(
			        'field' => 'packaging_type',
			        'label' => 'Packaging Type',
			        'rules' => 'trim'
		        ),
		        array(
			        'field' => 'delivery_location_state',
			        'label' => 'State',
			        'rules' => 'trim|required'
		        ),
		        array(
			        'field' => 'delivery_location[]',
			        'label' => 'City',
			        'rules' => 'trim|required'
		        ),
		        array(
			        'field' => 'lead_time',
			        'label' => 'Lead Time',
			        'rules' => 'trim'
		        ),
		        array(
			        'field' => 'delivery_type_id',
			        'label' => 'Delivery Type',
			        'rules' => 'trim'
		        ),
		        array(
			        'field' => 'is_logistics',
			        'label' => 'Logistics Required',
			        'rules' => 'trim'
		        ),
		        array(
			        'field' => 'other_details',
			        'label' => 'Other Details',
			        'rules' => 'trim'
		        ),
		        array(
			        'field' => 'stock',
			        'label' => 'Stock',
			        'rules' => 'trim|required'
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
		        'rules' => 'trim|required'
	        ),
	        array(
		        'field' => 'email_id',
		        'label' => 'Email Id',
		        'rules' => 'trim|required'
	        ),
	        array(
		        'field' => 'mobile_no',
		        'label' => 'Mobile Number',
		        'rules' => 'trim|required|numeric|exact_length[10]'
	        ),
	        array(
		        'field' => 'state_id',
		        'label' => 'State',
		        'rules' => 'trim|required'
	        ),
	        array(
		        'field' => 'city_id',
		        'label' => 'City',
		        'rules' => 'trim|required'
	        ),
	        array(
		        'field' => 'pincode',
		        'label' => 'Pincode',
		        'rules' => 'trim|required|numeric|exact_length[6]'
	        ),
	        array(
		        'field' => 'address',
		        'label' => 'Address',
		        'rules' => 'trim|required'
	        ),
	        array(
		        'field' => 'payment_method',
		        'label' => 'Payment Method',
		        'rules' => 'trim|required'
	        )
        ),
    
        'user-product-form' => array(
                array(
                        'field' => 'user_id',
                        'label' => 'User',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'product_id',
                        'label' => 'Product',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'description',
                        'label' => 'Description',
                        'rules' => 'trim|required|alpha_numeric_spaces'
                ),
                array(
                        'field' => 'from_date',
                        'label' => 'From Date',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'to_date',
                        'label' => 'To Date',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'quantity_id',
                        'label' => 'Quantity',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'quality',
                        'label' => 'Quality',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'price',
                        'label' => 'Price',
                        'rules' => 'trim|required|numeric'
                )
        ),
    
        'user-crop-form' => array(
                array(
                        'field' => 'user_id',
                        'label' => 'User',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'crop_id',
                        'label' => 'Crop',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'area',
                        'label' => 'Area',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'date_sown',
                        'label' => 'Date of Sown',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'date_harvest',
                        'label' => 'Date of Harvest',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'date_inspection',
                        'label' => 'Date of Inspection',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'inspector_name',
                        'label' => 'Inspector Name',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'crop_conditon',
                        'label' => 'Crop Condition',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'other_details',
                        'label' => 'Other Details',
                        'rules' => 'trim|required'
                )
        ),
        'user-organic-input-ecommerce-form' => array(
                array(
                        'field' => 'user_id',
                        'label' => 'User',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'category_id',
                        'label' => 'Category',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'sub_category_id',
                        'label' => 'Category',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'ecommerce_brand_id',
                        'label' => 'Brand',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'price',
                        'label' => 'Price',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'dosage',
                        'label' => 'Dosage',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'weight',
                        'label' => 'Weight',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'spectrum',
                        'label' => 'Spectrum',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'compatibility',
                        'label' => 'Compatibility',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'duration_effect',
                        'label' => 'Duration of Effect',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'frequency_application',
                        'label' => 'Frequency of Application',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'applicable_crops',
                        'label' => 'Applicable Crops',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'final_remarks',
                        'label' => 'Final Remarks',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'chemical',
                        'label' => 'Chemical Composition',
                        'rules' => 'trim|required'
                )
        ),
    
        'user-shop-ecommerce-form' => array(
                array(
                        'field' => 'user_id',
                        'label' => 'User',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'category_id',
                        'label' => 'Category',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'product_id',
                        'label' => 'Product',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'description',
                        'label' => 'Description',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'price',
                        'label' => 'Price',
                        'rules' => 'trim|required|numeric'
                ),
                array(
                        'field' => 'min_quantity',
                        'label' => 'Min Quantity',
                        'rules' => 'trim|required|numeric'
                ),
                array(
                        'field' => 'product_unit_id',
                        'label' => 'Unit',
                        'rules' => 'trim|required|numeric'
                ),
                array(
                        'field' => 'user_ecommerce_status',
                        'label' => 'Status',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'stock',
                        'label' => 'Stock',
                        'rules' => 'trim|required'
                )
        ),
        'lab-report-form' => array(
                array(
                        'field' => 'category_id',
                        'label' => 'Category',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'product_id',
                        'label' => 'Product',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'lab_name',
                        'label' => 'Lab Name',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'date_of_sampling',
                        'label' => 'Date of Sampling',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'shipment_number',
                        'label' => 'Shipment Number',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'description',
                        'label' => 'Description',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'quantity',
                        'label' => 'Quantity',
                        'rules' => 'trim|required|numeric'
                ),
                array(
                        'field' => 'exporter',
                        'label' => 'Exporter',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'invoice_number',
                        'label' => 'Invoice Number',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'sampling_location',
                        'label' => 'Sampling Location',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'type_of_sample',
                        'label' => 'Type of Sample',
                        'rules' => 'trim|required'
                ),
                array(
                        'field' => 'seal_number',
                        'label' => 'Seal Number',
                        'rules' => 'trim|required'
                )
        ),


);
$config['error_prefix'] = '<div class="error">';
$config['error_suffix'] = '</div>';






