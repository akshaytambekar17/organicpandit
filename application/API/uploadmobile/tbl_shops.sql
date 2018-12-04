-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2018 at 05:58 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organicpandit_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shops`
--

CREATE TABLE `tbl_shops` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `ceo` varchar(255) NOT NULL,
  `comapny_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `landline` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gst` varchar(255) NOT NULL,
  `aadharcard` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `story` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `company_images` varchar(255) NOT NULL,
  `catalouge` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `acc_bank` varchar(255) NOT NULL,
  `acc_name` varchar(255) NOT NULL,
  `acc_no` varchar(255) NOT NULL,
  `ifsc_code` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shops`
--

INSERT INTO `tbl_shops` (`id`, `fullname`, `ceo`, `comapny_name`, `username`, `password`, `email`, `landline`, `mobile`, `state`, `city`, `address`, `gst`, `aadharcard`, `website`, `story`, `profile`, `company_images`, `catalouge`, `video`, `acc_bank`, `acc_name`, `acc_no`, `ifsc_code`, `date`) VALUES
(1, 'Merakisan organic store', 'Prashanth', 'Merakisan organic store', 'merakisanstore', 'd511d6de1c143d95aabd610b8913a9a4', 'prashanth@merakisan.com', '9145347218', '9145347218', '22', '2763', 'Baner', '', '', 'www.merakisan.com', 'all our products are sourced directly from farmers', 'merakisan_store.jpg', 'MK123.png', '', '', '', '', '', '', '2018-05-04 16:30:55'),
(2, 'TRUFOOD', 'SHEETAL KUMAR', 'MERA KISAN', 'SHEETAL', '2e811d6b0f5f5e2c6eaf7db53a7d6ee2', 'nskumar@merakisan.com', '', '7659990044', '36', '4460', 'plot no 53 , 100ft road , madhapur', '36aanft4113g1z7', '', '', 'organic', 'JJJJ.jpg', 'COMPANY_IMAGE.jpeg', '', 'COMPANY_VIDEO.mp4', 'andhra bank', 'trufood', '140311100002874', 'andb0001403', '2018-05-08 15:11:15'),
(3, 'Organic And Naturals', 'Mr.Sudhakar Karanth', 'Organic and naturals', 'organicandnaturals', '25d55ad283aa400af464c76d713c07ad', 'Info@Khandigeorganic.com', '(020 )25536835?', '	080-26320882', '22', '2763', 'Kamalja Apartment,\n#1306,J M Road,Bank Of Baroda Lane\nShivajinagar, Pune', '', '', 'estore.khandigeorganic.com', 'We Deal in all types of organic produts', 'Khandige_organic.png', 'Khandige_organic.png', '', '', '', '', '', '', '2018-05-11 12:30:31'),
(4, 'Satvika Bio Food India Pvt Ltd', 'Vinod Chendhil', 'Satvika Bio Food India Pvt Ltd', 'satvikabiofood', '25d55ad283aa400af464c76d713c07ad', 'vinod.chendhil@gmail.com', '32230003/ 25215020', '9833701982', '22', '2763', 'B202, Ganga Estate, \nOff V. N. Purav Marg, Chembur, \nMumbai - 400071', '', '', '', 'we have all types of organic products', 'naturally_yours.jpg', 'naturally_yours.jpg', '', '', '', '', '', '', '2018-05-11 12:44:49'),
(5, 'Prakriti arogya kendra', 'Mr. Rakesh Chandra', 'Prakriti arogya kendra', 'prakriti', '25d55ad283aa400af464c76d713c07ad', 'prakriti.pune@gmail.com', '+91 20 40038542', '+91 9881308509', '22', '2763', 'Shop No 2 Buena Vista Malkani Group, Anand Vidya Niketan Road, Near Kailas Super Market Off Ganpati Chowk\nViman Nagar,\nPune - 411018 ', '', '', '', 'we have all organic produts', 'Organic.png', 'Organic.png', '', '', '', '', '', '', '2018-05-13 06:11:45'),
(6, 'Farm2kitchen', 'Anand Dholi', 'Farm2kitchen', 'farm2kitchen', '25d55ad283aa400af464c76d713c07ad', 'care@farm2kitchen.com', '', '+91-8698647869 /  +91-7774035500', '22', '2763', 'Farm 2 Kitchen Foods Private Limited\nAnand Dholi(Managing Director)\nHandewadi Road, Hadapsar, Pune - 411028, Maharashtra, India', '', '', '', 'we have all varieties of organic produtc ', 'farm2kitchen.jpg', 'farm2kitchen.jpg', '', '', '', '', '', '', '2018-05-13 06:29:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_shops`
--
ALTER TABLE `tbl_shops`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_shops`
--
ALTER TABLE `tbl_shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
