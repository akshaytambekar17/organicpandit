-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2018 at 05:56 PM
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
-- Table structure for table `tbl_pr_fpo`
--

CREATE TABLE `tbl_pr_fpo` (
  `id` int(11) NOT NULL,
  `pr_id` int(11) NOT NULL,
  `pr_name` varchar(255) NOT NULL,
  `pr_desc` varchar(255) NOT NULL,
  `pr_avlFrom` date NOT NULL,
  `pr_avlTo` date NOT NULL,
  `pr_qty` varchar(255) NOT NULL,
  `pr_quality` varchar(255) NOT NULL,
  `pr_price` varchar(255) NOT NULL,
  `pr_image` varchar(255) NOT NULL,
  `pr_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pr_fpo`
--

INSERT INTO `tbl_pr_fpo` (`id`, `pr_id`, `pr_name`, `pr_desc`, `pr_avlFrom`, `pr_avlTo`, `pr_qty`, `pr_quality`, `pr_price`, `pr_image`, `pr_date`) VALUES
(1, 1, 'Little Millets', 'foxtail millet, little millet, barnyard millet, kodo millet, proso millet, browntop millet, pearl millet, finger millet & jowar.', '2018-05-01', '2019-01-02', '10 ton to 25 ton', 'This is our motto and we are experts in selling the best 100% organic goods.', '46', 'little.jpg', '2018-05-03 14:22:08'),
(2, 2, 'organic wheat', 'organic wheat we are supplying is known for high nutrition value.No impurities are present in our organic products', '2018-03-05', '2018-05-25', '10 ton to 25 ton', 'best quality', '34', 'wheat.jpg', '2018-05-03 14:35:20'),
(3, 3, 'coriander seed', 'organic', '2018-01-01', '2018-12-01', '500kg to 1 ton', 'primium', '90', 'coriander.jpg', '2018-05-12 07:41:52'),
(4, 4, 'OILS', 'Organic Sesame Oil \nOrganic Mustard Oil \nOrganic Niger Oil \nOrganic Rice Bran Oil ', '2018-01-01', '2018-12-31', '500kg to 1 ton', 'Cold pressed', 'varies from product to product', 'unnamed.jpg', '2018-05-15 11:24:01'),
(5, 5, 'cabbage', 'cabbage', '2018-05-01', '2018-12-31', '500kg to 1 ton', 'kg', '20', 'fpo.jpg', '2018-05-16 12:24:17'),
(6, 6, 'cauliflower', 'cauliflower', '2018-05-01', '2018-12-31', '500kg to 1 ton', 'kg', '20', 'fpo1.jpg', '2018-05-16 12:29:31'),
(7, 7, 'turmeric', 'Turmeric, Buckwheat,Ginger Cardamom,Round Chilli ,Pumkin Green Pea Orang', '2018-05-01', '2018-12-31', '500kg to 1 ton', 'kg', '20', 'fpo2.jpg', '2018-05-16 12:33:36'),
(8, 8, 'ginger', 'Ginger , Buck Wheat Orange Pulses,Turmeric', '2018-05-01', '2018-12-31', '500kg to 1 ton', 'kg', '20', 'fpo3.jpg', '2018-05-16 12:37:50'),
(9, 9, 'pulses peas', 'Turmeric, Ginger, Pulses Peas, Beans', '2018-05-01', '2018-12-31', '500kg to 1 ton', 'kg', '20', 'fpo4.jpg', '2018-05-17 04:18:26'),
(10, 10, 'cardamom', 'Ginger , Turmeric, Buckwheat ,Paddy, Cardamom', '2018-05-01', '2018-12-31', '500kg to 1 ton', 'kg', '20', '', '2018-05-17 04:21:20'),
(11, 11, 'buckwheat', 'Turmeric, Buckwheat,Ginger Cardamom,Round Chilli ,Pumkin Green Pea Orang', '2018-05-01', '2018-12-31', '500kg to 1 ton', 'kg', '20', 'fpo5.jpg', '2018-05-17 04:24:10'),
(12, 12, 'orange', 'Buck WheatCardamom, Pulses Orange ,Beans', '2018-05-01', '2018-12-31', '500kg to 1 ton', 'kg', '20', 'fpo6.jpg', '2018-05-17 04:26:33'),
(13, 13, 'cardamom', 'Cardamom Buck Wheat Turmeric, Patatp, Pumkin, Pulse', '2018-05-01', '2018-12-31', '500kg to 1 ton', 'kg', '20', 'fpo7.jpg', '2018-05-17 04:45:11'),
(14, 14, 'Cardamom Buck Wheat Turmeric, Patatp, Pumkin, Pulse', 'Cardamom ', '2018-05-01', '2018-12-31', '500kg to 1 ton', '1kg', '20', 'fpo8.jpg', '2018-05-17 06:04:59'),
(15, 15, 'Cardamom Buck Wheat, Patato,Pumkin', 'Cardamom', '2018-05-01', '2018-12-31', '500kg to 1 ton', '1 kg', '20', 'fpo9.jpg', '2018-05-17 06:10:03'),
(16, 16, 'Large Cardamom, Ginger, Buck Wheat', 'Buck Wheat', '2018-05-01', '2018-12-31', '500kg to 1 ton', ' 1kg', '20', 'fpo10.jpg', '2018-05-17 06:14:12'),
(17, 17, 'Large Cardamom, Ginger, Buck Wheat', 'Buck Wheat', '2018-05-01', '2018-12-31', '500kg to 1 ton', ' 1kg', '20', 'fpo11.jpg', '2018-05-17 06:17:50'),
(18, 18, 'Large Cardamom, Ginger, Buck Wheat', 'Buck Wheat', '2018-05-01', '2018-12-31', '500kg to 1 ton', ' 1kg', '20', 'fpo12.jpg', '2018-05-17 06:19:50'),
(19, 19, 'Large Cardamom, Ginger, Buck Wheat', 'Buck Wheat', '2018-05-01', '2018-12-31', '500kg to 1 ton', ' 1kg', '20', 'fpo13.jpg', '2018-05-17 06:22:24'),
(20, 20, 'Large Cardamom, Ginger, Buck Wheat', 'Buck Wheat', '2018-05-01', '2018-12-31', '500kg to 1 ton', ' 1kg', '20', 'fpo14.jpg', '2018-05-17 06:24:30'),
(21, 21, 'Large Cardamom, Ginger, Buck Wheat', 'Buck Wheat', '2018-05-01', '2018-12-31', '500kg to 1 ton', ' 1kg', '20', 'fpo15.jpg', '2018-05-17 06:26:20'),
(22, 22, 'Large Cardamom, Ginger, Buck Wheat', 'Buck Wheat', '2018-05-01', '2018-12-31', '500kg to 1 ton', ' 1kg', '20', 'fpo16.jpg', '2018-05-17 06:29:43'),
(23, 23, 'Large Cardamom, Ginger, Buck Wheat', 'Buck Wheat', '2018-05-01', '2018-12-31', '500kg to 1 ton', ' 1kg', '20', 'fpo17.jpg', '2018-05-17 06:32:06'),
(24, 24, 'Large Cardamom, Ginger, Buck Wheat', 'Cardamom', '2018-05-01', '2018-12-31', '500kg to 1 ton', '1 kg', '20', 'fpo18.jpg', '2018-05-17 07:39:32'),
(25, 25, 'Large Cardamom, Ginger.', 'Ginger', '2018-05-01', '2018-05-31', '500kg to 1 ton', '1 kg', '20', 'fpo19.jpg', '2018-05-17 07:43:02'),
(26, 26, 'Large Cardamom.', 'Large Cardamom', '2018-05-01', '2018-12-31', '500kg to 1 ton', '1 kg', '20', 'fpo20.jpg', '2018-05-17 07:47:28'),
(27, 27, 'Ginger/Buckwheat/Green Vegetables', 'Ginger', '2018-05-01', '2018-12-31', '500kg to 1 ton', '1kg', '20', 'fpo21.jpg', '2018-05-17 07:53:10'),
(28, 28, 'Turmeric/Ginger/Buckwheat /Green Vegetables/Cherry Pepper/Broom Sticks', 'Ginger', '2018-05-01', '2018-12-31', '500kg to 1 ton', '1kg', '20', 'fpo22.jpg', '2018-05-17 07:55:48'),
(29, 29, 'Ginger/Buckwheat/Lemon Grass/Green Coffee/Green Vegetables/Cherry Pepper/Broom Sticks', 'Ginger', '2018-05-01', '2018-12-31', '500kg to 1 ton', '1kg', '20', 'fpo23.jpg', '2018-05-17 07:59:30'),
(30, 30, 'Buckwheat/Turmeric/Large Cardamom/Ginger/Cherry Peper/ Green Leafy Vegetables', 'Buckwheat', '2018-05-01', '2018-12-31', '500kg to 1 ton', '1kg', '20', 'fpo24.jpg', '2018-05-17 08:03:32'),
(31, 31, 'Large Cardamom/Buckwheat', 'Buckwheat', '2018-05-01', '2018-12-31', '500kg to 1 ton', '1kg', '20', 'fpo25.jpg', '2018-05-17 08:07:09'),
(32, 32, 'Large Cardamom', 'Large Cardamom', '2018-05-01', '2018-12-31', '500kg to 1 ton', '1kg', '20', 'fpo26.jpg', '2018-05-17 08:11:55'),
(33, 33, 'Buckwheat /Cherry Pepper/Green Vegetables', 'Buckwheat ', '2018-05-01', '2018-12-31', '500kg to 1 ton', '1kg', '20', 'fpo27.jpg', '2018-05-17 08:16:33'),
(34, 34, 'Ginger/Large Cardamom/Buckwheat/Cher ry Pepper/Vegetables/Pulses', 'Ginger/Large', '2018-05-01', '2018-12-31', '500kg to 1 ton', '1kg', '20', 'fpo28.jpg', '2018-05-17 08:20:31'),
(35, 35, 'Turmeric/Choatey(Locally Called Iskus)/Ginger/Buckwheat/V egetables', 'Vegetables', '2018-05-01', '2018-12-31', '500kg to 1 ton', '1kg', '20', 'fpo29.jpg', '2018-05-17 08:24:36'),
(36, 36, 'Large Cardamom, Ginger, Buck Wheat', 'Buck Wheat', '2018-05-01', '2018-12-31', '500kg to 1 ton', '1kg', '20', 'fpo30.jpg', '2018-05-17 08:49:31'),
(37, 37, 'Foxtail Millets', '100% Organic', '2018-01-01', '2018-12-31', 'Above 25 ton', 'a grade', '54', 'foxtail_millet.jpg', '2018-05-26 04:54:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pr_fpo`
--
ALTER TABLE `tbl_pr_fpo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pr_fpo`
--
ALTER TABLE `tbl_pr_fpo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
