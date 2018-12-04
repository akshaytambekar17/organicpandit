-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2018 at 05:57 PM
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
-- Table structure for table `tbl_pr_trader`
--

CREATE TABLE `tbl_pr_trader` (
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
-- Dumping data for table `tbl_pr_trader`
--

INSERT INTO `tbl_pr_trader` (`id`, `pr_id`, `pr_name`, `pr_desc`, `pr_avlFrom`, `pr_avlTo`, `pr_qty`, `pr_quality`, `pr_price`, `pr_image`, `pr_date`) VALUES
(1, 1, 'Jaggery Powder', '100% Certified products with Less moisture', '2018-01-01', '2018-12-31', '5 ton to 10 ton', 'Powder form ,With lEss Moisture', '68', 'jaggery-powder-500x500.jpg', '2018-05-05 11:09:44'),
(2, 1, 'Jaggery Block', '100% certified .', '2018-01-01', '2018-12-31', '5 ton to 10 ton', 'No Artificial Flavour ', '78', '', '2018-05-05 11:09:44'),
(3, 1, 'Almonds', '100% certified', '2018-01-01', '2018-12-31', '500kg to 1 ton', 'Perimium Quality Alomonds', '1000', 'Almond.jpg', '2018-05-05 11:09:44'),
(4, 1, 'Foxtail Millet', '100% certified', '2018-01-01', '2018-12-31', '3 ton to 5 ton', 'dried mature grains,clean, wholesome, uniform', '52', 'Foxtail_millet.jpg', '2018-05-05 11:09:44'),
(5, 1, 'Barnyard Millet', '100% certified', '2018-01-01', '2018-12-31', '3 ton to 5 ton', 'dried mature grains,clean, wholesome, uniform', '70', 'Barnyard_Millet.jpg', '2018-05-05 11:09:44'),
(6, 1, 'Little Millet', '100% certified', '2018-01-01', '2018-12-31', '3 ton to 5 ton', 'dried mature grains,clean, wholesome, uniform', '79', 'Little_millet.jpg', '2018-05-05 11:09:44'),
(7, 1, 'Proso Millet', '100% certified', '2018-01-01', '2018-12-31', '3 ton to 5 ton', 'dried mature grains,clean, wholesome, uniform', '71', 'Proso-Millet.jpg', '2018-05-05 11:09:44'),
(8, 1, 'Pearl Millet', '100% certified', '2018-01-01', '2018-12-31', '3 ton to 5 ton', 'dried mature grains,clean, wholesome, uniform', '38', '', '2018-05-05 11:09:44'),
(9, 1, 'Puffed Rice', '100% certified', '2018-01-01', '2018-12-31', '1 ton to 3 ton', 'Primium', '115', 'Puffed_Rice.jpg', '2018-05-05 11:09:44'),
(10, 2, 'wheat', 'LOkwan', '2018-01-01', '2018-11-01', 'Above 25 ton', 'Export', '27', 'wheat.jpg', '2018-05-12 07:29:05'),
(11, 3, 'Brown Sugar', 'uniform color,uniform size particles ', '2018-01-01', '2018-12-31', '10 ton to 25 ton', 'Demerara Brown Sugar and  Natural Brown Sugar', '68', 'brown_sugar.jpg', '2018-05-14 08:37:26'),
(12, 4, 'Spices', 'Export Quality of spices ', '2018-01-01', '2018-12-31', '500kg to 1 ton', 'primium', 'varies from product to product', 'black_pepper.jpg', '2018-05-14 09:06:52'),
(13, 5, 'Brown Sugar', 'r brown sugar is made of organically certified grown sugarcane in Uttarakhand.', '2018-01-01', '2018-12-31', '5 ton to 10 ton', ' Natural Brown Sugar', '60', 'brown_sugar1.jpg', '2018-05-14 09:52:52'),
(14, 6, 'Mustard', 'Big Musturd', '2018-01-01', '2018-12-31', '1 ton to 3 ton', '.', '75', 'images1.jpg', '2018-05-14 10:04:59'),
(15, 7, 'Black Pepper', 'all types of spices avilable', '2018-01-01', '2019-01-01', '1 ton to 3 ton', 'Export', '690.00', 'black_pepper1.jpg', '2018-05-14 10:17:06'),
(16, 8, 'Red Chilli Whole', 'Red Chilli Whole\n', '2018-01-01', '2018-12-31', '500kg to 1 ton', 'uniform in color', '170', 'chilli.jpg', '2018-05-14 10:29:05'),
(17, 9, 'Wheat flackes', '100% Organic', '2018-01-01', '2018-12-31', '500kg to 1 ton', 'Premium', '89', 'flackes.jpg', '2018-05-14 11:42:23'),
(18, 10, 'Almonds', 'Organic', '2018-01-01', '2018-12-31', '500kg to 1 ton', 'Premium', '850', 'almonds.jpg', '2018-05-14 12:00:43'),
(19, 11, 'Khandsari Sugar', 'Raw Sugar', '2018-01-01', '2018-12-31', '500kg to 1 ton', 'Export', '120', 'brown_sugar2.jpg', '2018-05-14 12:18:08'),
(20, 12, 'Millets', '100% Organic', '2018-01-01', '2018-12-31', '500kg to 1 ton', 'Good', 'varies from product to product', 'millets.jpg', '2018-05-14 12:27:09'),
(21, 13, 'Mustard', 'Organic', '2018-01-01', '2018-12-31', '1 ton to 3 ton', 'Sotex', '.', 'images2.jpg', '2018-05-15 11:06:25'),
(22, 14, 'Black Pepper', '.', '1970-01-01', '1970-01-01', '500kg to 1 ton', '.', '.', 'black_pepper2.jpg', '2018-05-15 11:32:01'),
(23, 15, 'Pepper, Vanilla , Banana', 'Organic', '2018-01-01', '2018-12-31', '500kg to 1 ton', '.', 'varies from product to product', 'white.png', '2018-05-15 11:41:40'),
(24, 16, 'seeds', 'sesame seeds,', '2018-05-21', '2018-12-31', '500kg to 1 ton', 'GOOD', '100', '5492d23f4e164.jpg', '2018-05-21 11:22:11'),
(25, 17, 'Pomegranate', 'We have \'bhagwa\' verity pomegranate. Maharashtra origin   ', '2018-07-30', '2018-11-30', '1 ton to 3 ton', 'A graade', '90', '', '2018-07-30 08:00:06'),
(26, 17, 'wheat ', 'sharbati and lokone ', '2018-07-30', '2018-12-31', 'Above 25 ton', 'a grade', '31', '', '2018-07-30 08:00:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pr_trader`
--
ALTER TABLE `tbl_pr_trader`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pr_trader`
--
ALTER TABLE `tbl_pr_trader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
