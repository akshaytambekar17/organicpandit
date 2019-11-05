ALTER TABLE `tbl_post_requirement` CHANGE `is_logistic` `is_logistic` INT(2) NOT NULL COMMENT '1=No, 2=Yes';

ALTER TABLE `tbl_post_requirement` CHANGE `certification_id` `certification_id` VARCHAR(150) NOT NULL;

ALTER TABLE `tbl_post_requirement` CHANGE `is_verified` `is_verified` INT(2) NOT NULL COMMENT '1= Verified, 0= Not Verified';

ALTER TABLE `tbl_post_requirement` ADD `user_id` INT(11) NOT NULL AFTER `product_id`, ADD INDEX `fk_user_id` (`user_id`);

ALTER TABLE `tbl_post_requirement` ADD `post_code` VARCHAR(100) NOT NULL AFTER `user_id`;

ALTER TABLE `tbl_bid` ADD `comment` VARCHAR(255) NOT NULL AFTER `amount`;


--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(3) NOT NULL COMMENT '1=Not Active, 2=Active',
  `images` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`id`, `name`, `description`, `status`, `images`, `created_at`, `updated_at`) VALUES
(1, 'Farmer', 'Farmer', 2, '', '2018-11-29 17:55:11', '2018-11-29 17:55:11'),
(2, 'FPO', 'FPO', 2, '', '2018-11-29 17:55:11', '2018-11-29 17:55:11'),
(3, 'Trader', 'Trader', 2, '', '2018-11-29 17:55:11', '2018-11-29 17:55:11'),
(4, 'Processor', 'Processor', 2, '', '2018-11-29 17:55:11', '2018-11-29 17:55:11'),
(5, 'Buyer', 'Buyer', 2, '', '2018-11-29 17:55:11', '2018-11-29 17:55:11'),
(6, 'Packaging', 'Packaging', 2, '', '2018-11-29 17:55:11', '2018-11-29 17:55:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `quality` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(7) NOT NULL,
  `images` varchar(255) NOT NULL,
  `status` int(3) NOT NULL COMMENT '1=NotActive, 2=Active',
  `is_deleted` int(3) NOT NULL COMMENT '0=Not Deleted, 1= Deleted',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `user_type_id`, `name`, `description`, `from_date`, `to_date`, `quality`, `price`, `quantity`, `images`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(2, 1, 'Toor Dal', 'Toor Dal', '2018-11-30 00:00:00', '2018-11-30 00:00:00', 'good fresh quality toor dal', 10.00, 10, 'admin.png', 2, 0, '2018-11-29 18:33:52', '2018-11-29 18:41:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_type_id` (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;




/***
** New sql query 24-09-2019
***/

ALTER TABLE `tbl_users` ADD `created_by` INT(11) NOT NULL AFTER `updated_at`, ADD `updated_by` INT NOT NULL AFTER `created_by`;

ALTER TABLE `tbl_users_organic_input_ecommerce` ADD `created_by` INT(11) NOT NULL AFTER `updated_at`, ADD `updated_by` INT(11) NOT NULL AFTER `created_by`;

ALTER TABLE `tbl_users_organic_input_ecommerce` ADD `user_type_id` INT(4) NOT NULL AFTER `user_id`;

UPDATE `tbl_users_organic_input_ecommerce` SET user_type_id = 7;

ALTER TABLE `tbl_users_micro_nutrient` ADD `created_by` INT(11) NOT NULL AFTER `percentage`, ADD `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `created_by`, ADD `updated_by` INT(11) NOT NULL AFTER `created_at`, ADD `updated_at` DATETIME NOT NULL AFTER `updated_by`;

ALTER TABLE `tbl_users_products` ADD `user_type_id` INT(4) NOT NULL AFTER `user_id`;

ALTER TABLE `tbl_users_products` ADD `created_by` INT(11) NOT NULL AFTER `images`, ADD `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `created_by`, ADD `updated_by` INT(11) NOT NULL AFTER `created_at`, ADD `updated_at` DATETIME NOT NULL AFTER `updated_by`;

ALTER TABLE `tbl_users_crop` ADD `created_by` INT(11) NOT NULL AFTER `other_details`, ADD `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `created_by`, ADD `updated_by` INT(11) NOT NULL AFTER `created_at`, ADD `updated_at` DATETIME NOT NULL AFTER `updated_by`;

ALTER TABLE `tbl_users_soil_details` ADD `created_by` INT(11) NOT NULL AFTER `percentage`, ADD `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `created_by`, ADD `updated_by` INT(11) NOT NULL AFTER `created_at`, ADD `updated_at` DATETIME NOT NULL AFTER `updated_by`;

ALTER TABLE `tbl_users_input_organic` ADD `created_by` INT(1) NOT NULL AFTER `other_details`, ADD `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `created_by`, ADD `updated_by` INT(11) NOT NULL AFTER `created_at`, ADD `updated_at` DATETIME NOT NULL AFTER `updated_by`;

ALTER TABLE `tbl_user_ecommerces` CHANGE `available_quantity` `max_quantity` INT(11) NOT NULL;

ALTER TABLE `tbl_user_ecommerces` ADD `min_quantity` INT(11) NOT NULL AFTER `max_quantity`, ADD `delivery_type` VARCHAR(200) NULL AFTER `min_quantity`, ADD `product_unit_id` INT(5) NOT NULL AFTER `delivery_type`, ADD `unit_value` VARCHAR(150) NOT NULL AFTER `product_unit_id`;

--
-- Table structure for table `tbl_meta_data`
--

CREATE TABLE `tbl_meta_data` (
  `meta_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `user_ecommerce_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_meta_data`
--
ALTER TABLE `tbl_meta_data`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `fk_meta_user_ecommerce_id` (`user_ecommerce_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_meta_data`
--
ALTER TABLE `tbl_meta_data`
  MODIFY `meta_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_meta_data`
--
ALTER TABLE `tbl_meta_data`
  ADD CONSTRAINT `fk_meta_user_ecommerce_id` FOREIGN KEY (`user_ecommerce_id`) REFERENCES `tbl_user_ecommerces` (`user_ecommerce_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_units`
--

CREATE TABLE `tbl_product_units` (
  `product_unit_id` int(11) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_units`
--

INSERT INTO `tbl_product_units` (`product_unit_id`, `unit_name`, `created_at`, `updated_at`) VALUES
(1, 'GM', '2019-10-13 12:02:33', '2019-10-13 12:02:33'),
(2, 'KG', '2019-10-13 12:02:33', '2019-10-13 12:02:33'),
(3, 'LITER', '2019-10-13 12:20:21', '2019-10-13 12:20:21'),
(4, 'UNIT', '2019-10-13 12:20:21', '2019-10-13 12:20:21'),
(5, 'PIECE', '2019-10-13 12:20:21', '2019-10-13 12:20:21'),
(6, 'BUNCH', '2019-10-13 12:20:21', '2019-10-13 12:20:21'),
(7, 'DOZEN', '2019-10-13 12:20:21', '2019-10-13 12:20:21'),
(8, 'ML(Mili Liter)', '2019-10-13 12:21:15', '2019-10-13 12:21:15'),
(9, 'WEEK(Subscription)', '2019-10-13 12:21:15', '2019-10-13 12:21:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_product_units`
--
ALTER TABLE `tbl_product_units`
  ADD PRIMARY KEY (`product_unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_product_units`
--
ALTER TABLE `tbl_product_units`
  MODIFY `product_unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;


/**
* 16-October-2019
*/
ALTER TABLE `tbl_users` ADD `country_id` INT(11) NOT NULL AFTER `landline_no`;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(255) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `last_activity` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` blob NOT NULL,
  `user_agent` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `ci_sessions_timestamp` (`last_activity`);
COMMIT;

UPDATE tbl_users SET country_id = 101    


/**
* 04-11-2019
*/

INSERT INTO `tbl_organic_setting` (`id`, `key`, `value`, `title`, `created_at`, `updated_at`) VALUES (NULL, 'show_user_details', '2', 'Show User Details', '2019-04-03 00:08:37', '2019-04-03 00:08:37');

/**
* 05-11-2019
*/

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blogs`
--

CREATE TABLE `tbl_blogs` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  `blog_status` int(3) NOT NULL COMMENT '1=Disabled, 2=Enabled',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
