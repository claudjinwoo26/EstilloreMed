-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 10:34 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profiles`
--

-- --------------------------------------------------------

--
-- Table structure for table `ailments`
--

CREATE TABLE `ailments` (
  `id` int(11) NOT NULL,
  `ailment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `date`, `title`, `status`) VALUES
(1, '2023-04-26', 'aaron time', NULL),
(2, '2023-04-26', 'Anniversary', NULL),
(3, '2023-04-15', 'Mamamo', NULL),
(4, '2023-09-15', 'Appt', NULL),
(5, '2023-04-16', 'Test', NULL),
(6, '2023-04-17', 'test', NULL),
(7, '2023-05-25', 'Test', NULL),
(8, '2023-04-18', 'test run', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `medicine_id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `stock_alert` int(11) NOT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `month_alert` int(11) NOT NULL,
  `mnf_date` date DEFAULT NULL,
  `create_datetime` datetime DEFAULT NULL,
  `update_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`medicine_id`, `name`, `quantity`, `stock_alert`, `price`, `exp_date`, `month_alert`, `mnf_date`, `create_datetime`, `update_datetime`) VALUES
(1, 'Omeprazole', 68, 0, '98.00', '2023-04-14', 0, '2023-02-03', NULL, NULL),
(2, 'Gaviscon', 78, 0, '45.00', '2023-05-24', 0, '2023-01-19', NULL, NULL),
(3, 'Pre-Natal Multi-Vitamins', 8, 0, '65.00', '2023-05-24', 0, '2023-02-10', NULL, NULL),
(4, 'Paracetamol Adults', 50, 0, '50.00', '2023-03-07', 0, '2023-03-03', NULL, NULL),
(5, 'Paracetamol Infants/Kids', 60, 0, '20.00', '2023-03-17', 0, '2023-01-05', NULL, NULL),
(6, 'Paracetamol Suppository', 23, 0, '23.00', '2023-03-02', 0, '2023-03-02', NULL, NULL),
(7, 'Amlodipine', 12, 0, '12.00', '2023-03-25', 0, '2023-03-22', NULL, NULL),
(8, 'Metformin', 34, 0, '356.00', '2023-03-01', 0, '2023-03-01', NULL, NULL),
(9, 'Catapres', 65, 0, '35.00', '2023-01-31', 0, '2023-05-06', NULL, NULL),
(14, 'Loperamide', 30, 0, '12.00', '2023-06-22', 0, '2023-02-07', '2023-04-17 10:09:24', '2023-04-17 10:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` bigint(20) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `middlename` varchar(10) DEFAULT NULL,
  `suffix` varchar(10) DEFAULT NULL,
  `user_type` varchar(10) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `phone` bigint(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `create_datetime` datetime DEFAULT NULL,
  `update_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `firstname`, `lastname`, `middlename`, `suffix`, `user_type`, `email`, `username`, `phone`, `dob`, `age`, `password`, `create_datetime`, `update_datetime`) VALUES
(1, 'Jerremy Andrews', 'Garcia', 'A', '', 'ADMIN', 'febibeans@icloud.com', 'febibeans', 9972476026, '1999-11-09', 23, 'c4ca4238a0b923820dcc509a6f75849b', '2023-04-13 18:34:31', '2023-04-16 12:17:10'),
(2, 'Jerremy Andrews', 'Garcia', '', '', 'USER', 'jerremyandrewsangeles13@gmail.com', 'jem', 9972476026, '1999-11-09', 23, 'c4ca4238a0b923820dcc509a6f75849b', '2023-04-13 18:38:45', '2023-04-16 12:17:28'),
(3, 'Jose Claudio', 'Bereber', 'B', '', 'USER', 'bereber@gmail.com', 'claud', 12345678910, '2001-06-26', 21, 'c4ca4238a0b923820dcc509a6f75849b', '2023-04-13 18:51:18', '2023-04-17 09:33:25'),
(4, 'Avegale', 'Angeles', '', '', 'USER', 'babesangeles49@gmail.com', '', 9364213001, '1972-05-04', 50, 'd41d8cd98f00b204e9800998ecf8427e', '2023-04-15 08:03:24', '2023-04-17 08:15:06'),
(5, 'Ma Franchesca Amy', 'Carrido', 'M', '', 'USER', 'carrido@gmail.com', 'chesca', 12345678910, '2001-01-04', 22, 'c4ca4238a0b923820dcc509a6f75849b', '2023-04-15 08:18:04', '2023-04-17 09:33:45'),
(6, 'Rupert John Lenin', 'Garcia', 'A', '', 'USER', 'ruppy@gmail.com', 'ruppy', 12345678910, '1998-07-04', 24, 'c4ca4238a0b923820dcc509a6f75849b', '2023-04-15 08:18:43', '2023-04-16 12:21:00'),
(7, 'Jem', 'Angeles', '', '', 'USER', 'jerremyandrewsangeles13@gmail.com', 'jemyrice', 9972476026, '1999-11-09', 23, 'c4ca4238a0b923820dcc509a6f75849b', '2023-04-15 09:14:02', '2023-04-16 12:20:26'),
(8, 'Joshua', 'Sucgang', 'G', '', 'USER', 'sucgang@gmail.com', 'Joshua', 13456, '2023-04-04', 21, 'c4ca4238a0b923820dcc509a6f75849b', '2023-04-17 08:11:26', '2023-04-17 08:11:26'),
(9, 'Crismel', 'Santillan', 'P', '', 'USER', 'crismel@gmail.com', 'mellie', 9087547, '2019-01-08', 22, 'c4ca4238a0b923820dcc509a6f75849b', '2023-04-17 10:04:30', '2023-04-17 10:04:30'),
(10, 'Ryan Carlo', 'Arellano', 'B', '', 'USER', 'ryan@gmail.com', 'ryry', 12345678910, '2002-04-04', 21, 'c4ca4238a0b923820dcc509a6f75849b', '2023-05-10 18:40:43', '2023-05-10 18:40:43'),
(11, 'Ellaiza', 'Ubay', 'M', '', 'USER', 'yeshayu@gmail.com', 'yesha', 9972476026, '2005-11-18', 18, 'c4ca4238a0b923820dcc509a6f75849b', '2023-05-31 19:32:48', '2023-05-31 19:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `supply_id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `stock_alert` int(11) NOT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `month_alert` int(11) NOT NULL,
  `mnf_date` date DEFAULT NULL,
  `create_datetime` datetime DEFAULT NULL,
  `update_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`supply_id`, `name`, `quantity`, `stock_alert`, `price`, `exp_date`, `month_alert`, `mnf_date`, `create_datetime`, `update_datetime`) VALUES
(1, 'Syringe', 90, 0, '5.00', '2023-07-20', 0, '2022-11-01', NULL, NULL),
(2, 'Bade', 9, 0, '67.00', '2023-03-31', 0, '2023-03-01', NULL, NULL),
(3, 'Needle Silk', 1, 0, '1.00', '2023-03-01', 0, '2023-03-01', NULL, NULL),
(4, 'Gloves', 1, 0, '1.00', '2023-01-01', 0, '2023-01-01', NULL, NULL),
(5, 'Hair Cap', 1, 0, '1.00', '2023-03-01', 0, '2023-03-01', NULL, NULL),
(6, 'Facemask', 1, 0, '1.00', '2023-03-01', 0, '2023-03-01', NULL, NULL),
(7, 'Cotton Ball', 1, 0, '1.00', '2023-03-01', 0, '2023-03-01', NULL, NULL),
(8, 'Alcohol', 2, 0, '2.00', '2023-03-01', 0, '2023-03-01', NULL, NULL),
(9, 'Betadine', 2, 0, '2.00', '2023-03-02', 0, '2023-03-02', NULL, NULL),
(10, 'Hydrogen Peroxide', 2, 0, '2.00', '2023-03-01', 0, '2023-03-01', NULL, NULL),
(11, 'Lubricating Jelly', 3, 0, '3.00', '2023-03-01', 0, '2023-03-01', NULL, NULL),
(12, 'Ultrasound Gel', 2, 0, '2.00', '2023-03-01', 0, '2023-03-01', NULL, NULL),
(13, 'Micropore Tape', 1, 0, '1.00', '2023-03-01', 0, '2023-03-01', NULL, NULL),
(14, 'Pregnancy Test Kit', 1, 0, '1.00', '2023-03-01', 0, '2023-03-01', NULL, NULL),
(15, 'CBG Monitoring Kit', 1, 0, '1.00', '2023-03-01', 0, '2023-03-01', NULL, NULL),
(18, 'Surgical Gloves', 30, 0, '15.00', '2023-03-19', 0, '2023-01-06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

CREATE TABLE `vaccines` (
  `vaccine_id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `stock_alert` int(11) NOT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `month_alert` int(11) NOT NULL,
  `mnf_date` date DEFAULT NULL,
  `create_datetime` datetime DEFAULT NULL,
  `update_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccines`
--

INSERT INTO `vaccines` (`vaccine_id`, `name`, `quantity`, `stock_alert`, `price`, `exp_date`, `month_alert`, `mnf_date`, `create_datetime`, `update_datetime`) VALUES
(1, 'Flu Vaccine', 30, 0, '1.00', '2023-03-01', 0, '2023-03-01', NULL, NULL),
(2, 'Chicken Pox Vaccine', 30, 0, '1.00', '2023-03-01', 0, '2023-03-01', NULL, NULL),
(3, 'Pneumonia Vaccine', 76, 0, '35.00', '2023-05-19', 0, '2023-01-11', NULL, NULL),
(4, '6-in-1 Vaccine', 24, 0, '24.00', '2023-03-03', 0, '2023-03-03', NULL, NULL),
(5, '5-in-1 Vaccine ', 24, 0, '24.00', '2023-03-04', 0, '2023-03-04', NULL, NULL),
(6, 'Measles Vaccine', 35, 0, '35.00', '2023-03-08', 0, '2023-03-08', NULL, NULL),
(7, 'Japanese Encephalitis Vaccine', 46, 0, '46.00', '2023-03-15', 0, '2023-03-15', NULL, NULL),
(8, 'Tetanus Toxoid Vaccine', 69, 0, '69.00', '2023-03-09', 0, '2023-03-09', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ailments`
--
ALTER TABLE `ailments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`supply_id`);

--
-- Indexes for table `vaccines`
--
ALTER TABLE `vaccines`
  ADD PRIMARY KEY (`vaccine_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `medicine_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `supply_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vaccines`
--
ALTER TABLE `vaccines`
  MODIFY `vaccine_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
