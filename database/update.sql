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