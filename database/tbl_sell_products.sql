-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2019 at 08:17 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_demo_organic_pandit`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sell_products`
--

CREATE TABLE `tbl_sell_products` (
  `sell_product_id` bigint(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(5) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `price` varchar(100) NOT NULL,
  `variety` varchar(255) NOT NULL,
  `moisture` varchar(150) NOT NULL,
  `texture` varchar(255) NOT NULL,
  `colour` varchar(150) NOT NULL,
  `broken_ration` varchar(100) NOT NULL,
  `crop_year` year(4) NOT NULL,
  `certification_id` int(5) NOT NULL,
  `grain_length` varchar(100) NOT NULL,
  `supply_quantity` varchar(100) NOT NULL,
  `packaging_type` varchar(150) NOT NULL,
  `delivery_location` int(11) NOT NULL,
  `lead_time` varchar(200) NOT NULL,
  `is_logistics` int(3) NOT NULL COMMENT '1= No, 2=Yes',
  `delivery_type_id` int(3) NOT NULL,
  `other_details` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_sell_products`
--
ALTER TABLE `tbl_sell_products`
  ADD PRIMARY KEY (`sell_product_id`),
  ADD KEY `fk_sell_user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_sell_products`
--
ALTER TABLE `tbl_sell_products`
  MODIFY `sell_product_id` bigint(15) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_sell_products`
--
ALTER TABLE `tbl_sell_products`
  ADD CONSTRAINT `fk_sell_user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
