-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2018 at 05:46 PM
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
-- Table structure for table `tbl_org_consultant`
--

CREATE TABLE `tbl_org_consultant` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
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
  `video` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `acc_bank` varchar(255) NOT NULL,
  `acc_name` varchar(255) NOT NULL,
  `acc_no` varchar(255) NOT NULL,
  `ifsc_code` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_org_consultant`
--

INSERT INTO `tbl_org_consultant` (`id`, `fullname`, `username`, `password`, `email`, `landline`, `mobile`, `state`, `city`, `address`, `gst`, `aadharcard`, `website`, `story`, `profile`, `company_images`, `video`, `resume`, `acc_bank`, `acc_name`, `acc_no`, `ifsc_code`, `date`) VALUES
(1, 'YOGISH APPAJAIAH', 'YOGI\'S WORLD OF ORGANICS', '5d0b9935d9a64c1f9daca15cceadb8f6', 'yogisworldoforganics@gmail.com', '', '9448218544', '17', '1558', 'FLAT N0-307, SECOND FLOOR, MAHAVEER THRISHLA APARTMENT, SAPTAGIRI LAYOUT, BHEL 2ND STAGE, RAJARAJESHWARI NAGAR, BANGALORE-560098', '', '', '', 'MY PROFILE &JOURNEY\n\nName:  Yogish Appajaiah\n\nProfile Highlights\n•	Ex Gazetted Group -B Officer, Dep', 'DSC07024.JPG', 'IMG-20171229-WA0035.jpg', '', '', '', '', '', '', '2018-05-05 12:15:56'),
(2, 'ECOCERT PVT LTD', 'ECOCERT', '25d55ad283aa400af464c76d713c07ad', 'office.india@ecocert.com', '0124-4313160 / (61)/(62)/(63)/(64)/(65)', ' 7065505621', '22', '2499', 'Aurangabad Business Centre,\n5th Floor, Office No. F-4, F-5\nOpp. District Court, Adalat Road, \nAurangabad- 431001, Maharashtra,India', '', '', '', 'Ecocert is an inspection and certification body established in France in 199.', 'ECOCERT.jpg', 'ECOCERT.jpg', '', '', '', '', '', '', '2018-05-12 06:03:42'),
(3, 'Udaysinh Kharat ', '7229013399', '5ce941861a42c20dac12163b9730ec13', 'UDAY.KHARAT@OUTLOOK.COM', '', '7229013399', '22', '2707', 'Synergy Consultants Inc., V-1079, Sector – 19, APMC, New Vegetable Market, VASHI, Navi Mumbai – 400 705', 'NA', '670659619375', 'www.synergyagry.in ', 'ORGANIC CERTIFICATION CONSULTANT', 'Photo_Uday_Kharat.jpg', 'synergy_consultants.JPG', '', 'Uday_Kharat_Nov,17.docx', '', '', '', '', '2018-06-02 17:45:15'),
(4, 'Udaysinh Kharat ', '9099098166', '5ce941861a42c20dac12163b9730ec13', 'UDAYKHARAT@GMAIL.COM', '', '7229013399', '12', '783', 'D-307, SUPRABH APPT,', '', '', '', 'Organic certification consultant', 'Photo_Uday_Kharat1.jpg', 'Photo_Uday_Kharat.jpg', '', '', '', '', '', '', '2018-07-03 05:28:04'),
(5, 'sgsgg45', 'dgfsd5', '912ec803b2ce49e4a541068d495ab570', 'admin@gmail.com', 'dfasdf', 'asdfsdaf', '11', '718', 'sdfs', 'sdfg245', 'sdf45', 'dsfs4', 'fgfd56', 'Hydrangeas.jpg', 'Desert.jpg', '', '', 'jmkg', 'ghjghj', 'hjghj', 'ghjhgj', '2018-07-18 10:21:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_org_consultant`
--
ALTER TABLE `tbl_org_consultant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_org_consultant`
--
ALTER TABLE `tbl_org_consultant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
