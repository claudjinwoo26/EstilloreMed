-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 06:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT NULL,
  `fk_patient_id` bigint(20) NOT NULL,
  `is_Approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `date`, `title`, `status`, `fk_patient_id`, `is_Approved`) VALUES
(224, '2023-09-28 15:05:00', 'Test 4', 'pending', 10, 0),
(226, '2023-09-29 15:05:00', 'Test3', 'approved', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `medicine_id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `stock_alert` int(11) NOT NULL,
  `month_alert` int(11) NOT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `mnf_date` date DEFAULT NULL,
  `create_datetime` datetime DEFAULT NULL,
  `update_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`medicine_id`, `name`, `quantity`, `stock_alert`, `month_alert`, `price`, `exp_date`, `mnf_date`, `create_datetime`, `update_datetime`) VALUES
(1, 'Omeprazole', 68, 0, 0, 98.00, '2023-04-14', '2023-02-03', NULL, NULL),
(2, 'Gaviscon', 78, 0, 0, 45.00, '2023-05-24', '2023-01-19', NULL, NULL),
(3, 'Pre-Natal Multi-Vitamins', 8, 0, 0, 65.00, '2023-05-24', '2023-02-10', NULL, NULL),
(4, 'Paracetamol Adults', 50, 0, 0, 50.00, '2023-03-07', '2023-03-03', NULL, NULL),
(5, 'Paracetamol Infants/Kids', 60, 0, 0, 20.00, '2023-03-17', '2023-01-05', NULL, NULL),
(6, 'Paracetamol Suppository', 23, 0, 0, 23.00, '2023-03-02', '2023-03-02', NULL, NULL),
(7, 'Amlodipine', 12, 0, 0, 12.00, '2023-03-25', '2023-03-22', NULL, NULL),
(8, 'Metformin', 34, 0, 0, 356.00, '2023-03-01', '2023-03-01', NULL, NULL),
(9, 'Catapres', 65, 0, 0, 35.00, '2023-01-31', '2023-05-06', NULL, NULL);

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
  `dob` date NOT NULL,
  `age` int(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `create_datetime` datetime DEFAULT NULL,
  `update_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `firstname`, `lastname`, `middlename`, `suffix`, `user_type`, `email`, `username`, `phone`, `dob`, `age`, `password`, `create_datetime`, `update_datetime`) VALUES
(1, 'Jerremy Andrews', 'Garcia', 'A', '', 'ADMIN', 'febibeans@icloud.com', 'febibeans', 9972476026, '1970-01-01', 23, 'c4ca4238a0b923820dcc509a6f75849b', '2023-04-13 18:34:31', '2023-04-15 10:19:14'),
(2, 'Jerremy Andrews', 'Garcia', '', '', 'ADMIN', 'jerremyandrewsangeles13@gmail.com', 'jem', 9972476026, '1970-01-01', 23, 'c4ca4238a0b923820dcc509a6f75849b', '2023-04-13 18:38:45', '2023-04-15 12:03:16'),
(3, 'Jose Claudio', 'Bereber', '', '', 'USER', 'bereber@gmail.com', 'claud', 12345678910, '1970-01-01', 21, 'c4ca4238a0b923820dcc509a6f75849b', '2023-04-13 18:51:18', '2023-04-15 12:03:41'),
(4, 'Avegale', 'Angeles', '', '', 'USER', 'babesangeles49@gmail.com', '', 9364213001, '1970-01-01', 50, 'd41d8cd98f00b204e9800998ecf8427e', '2023-04-15 08:03:24', '2023-04-15 10:30:48'),
(5, 'Ma Franchesca Amy', 'Carrido', '', '', 'USER', 'carrido@gmail.com', 'chesca', 12345678910, '1970-01-01', 22, 'c4ca4238a0b923820dcc509a6f75849b', '2023-04-15 08:18:04', '2023-04-15 13:20:05'),
(6, 'Rupert John Lenin', 'Garcia', 'A', '', 'USER', 'ruppy@gmail.com', '', 12345678910, '1970-01-01', 24, 'd41d8cd98f00b204e9800998ecf8427e', '2023-04-15 08:18:43', '2023-04-15 10:31:03'),
(7, 'Jem', 'Angeles', '', '', 'USER', 'jerremyandrewsangeles13@gmail.com', '', 9972476026, '1970-01-01', 23, 'd41d8cd98f00b204e9800998ecf8427e', '2023-04-15 09:14:02', '2023-04-15 10:31:14'),
(8, 'Jose ', 'Bereber', 'B', '', 'USER', 'cbereber7@gmail.com', 'claud26', 639218176896, '2001-06-26', 21, '202cb962ac59075b964b07152d234b70', '2023-09-14 11:22:37', '2023-09-14 11:22:37'),
(9, 'Jose ', 'Claudio', '', '', 'USER', 'cbereber7@gmail.com', '', 639218176896, '2001-06-26', 22, '', '2023-09-14 11:23:31', '2023-09-14 11:23:31'),
(10, 'Ramil', 'Cob', 'S', 'Jr', 'USER', 'ramilcobilla26@yahoo.com', 'ramilsc', 9123456712, '2001-02-18', 32, 'c20ad4d76fe97759aa27a0c99bff6710', '2023-09-19 15:45:03', '2023-09-19 15:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `supply_id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `stock_alert` int(11) NOT NULL,
  `month_alert` int(11) NOT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `mnf_date` date DEFAULT NULL,
  `create_datetime` datetime DEFAULT NULL,
  `update_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`supply_id`, `name`, `quantity`, `stock_alert`, `month_alert`, `price`, `exp_date`, `mnf_date`, `create_datetime`, `update_datetime`) VALUES
(1, 'Syringe', 90, 0, 0, 5.00, '2023-07-20', '2022-11-01', NULL, NULL),
(2, 'Bade', 9, 0, 0, 67.00, '2023-03-31', '2023-03-01', NULL, NULL),
(3, 'Needle Silk', 1, 0, 0, 1.00, '2023-03-01', '2023-03-01', NULL, NULL),
(4, 'Gloves', 1, 0, 0, 1.00, '2023-01-01', '2023-01-01', NULL, NULL),
(5, 'Hair Cap', 1, 0, 0, 1.00, '2023-03-01', '2023-03-01', NULL, NULL),
(6, 'Facemask', 1, 0, 0, 1.00, '2023-03-01', '2023-03-01', NULL, NULL),
(7, 'Cotton Ball', 1, 0, 0, 1.00, '2023-03-01', '2023-03-01', NULL, NULL),
(8, 'Alcohol', 2, 0, 0, 2.00, '2023-03-01', '2023-03-01', NULL, NULL),
(9, 'Betadine', 2, 0, 0, 2.00, '2023-03-02', '2023-03-02', NULL, NULL),
(10, 'Hydrogen Peroxide', 2, 0, 0, 2.00, '2023-03-01', '2023-03-01', NULL, NULL),
(11, 'Lubricating Jelly', 3, 0, 0, 3.00, '2023-03-01', '2023-03-01', NULL, NULL),
(12, 'Ultrasound Gel', 2, 0, 0, 2.00, '2023-03-01', '2023-03-01', NULL, NULL),
(13, 'Micropore Tape', 1, 0, 0, 1.00, '2023-03-01', '2023-03-01', NULL, NULL),
(14, 'Pregnancy Test Kit', 1, 0, 0, 1.00, '2023-03-01', '2023-03-01', NULL, NULL),
(15, 'CBG Monitoring Kit', 1, 0, 0, 1.00, '2023-03-01', '2023-03-01', NULL, NULL),
(18, 'Surgical Gloves', 30, 0, 0, 15.00, '2023-03-19', '2023-01-06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vaccines`
--

CREATE TABLE `vaccines` (
  `vaccine_id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `stock_alert` int(11) NOT NULL,
  `month_alert` int(11) NOT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `mnf_date` date DEFAULT NULL,
  `create_datetime` datetime DEFAULT NULL,
  `update_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccines`
--

INSERT INTO `vaccines` (`vaccine_id`, `name`, `quantity`, `stock_alert`, `month_alert`, `price`, `exp_date`, `mnf_date`, `create_datetime`, `update_datetime`) VALUES
(1, 'Flu Vaccine', 30, 0, 0, 1.00, '2023-03-01', '2023-03-01', NULL, NULL),
(2, 'Chicken Pox Vaccine', 30, 0, 0, 1.00, '2023-03-01', '2023-03-01', NULL, NULL),
(3, 'Pneumonia Vaccine', 76, 0, 0, 35.00, '2023-05-19', '2023-01-11', NULL, NULL),
(4, '6-in-1 Vaccine', 24, 0, 0, 24.00, '2023-03-03', '2023-03-03', NULL, NULL),
(5, '5-in-1 Vaccine ', 24, 0, 0, 24.00, '2023-03-04', '2023-03-04', NULL, NULL),
(6, 'Measles Vaccine', 35, 0, 0, 35.00, '2023-03-08', '2023-03-08', NULL, NULL),
(7, 'Japanese Encephalitis Vaccine', 46, 0, 0, 46.00, '2023-03-15', '2023-03-15', NULL, NULL),
(8, 'Tetanus Toxoid Vaccine', 69, 0, 0, 69.00, '2023-03-09', '2023-03-09', NULL, NULL),
(9, 'Anti Rabies Vaccine', 150, 0, 0, 650.00, '2023-12-22', '2021-11-30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Dengue Vaccine', 250, 0, 0, 550.00, '2024-10-24', '2022-09-27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Hepatitis A Vaccine', 100, 0, 0, 999.99, '2023-12-30', '2022-01-17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'asd', 2, 0, 0, 999.99, '2023-06-01', '2023-05-31', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'HPV Vaccine', 120, 0, 0, 999.99, '2023-12-27', '2022-05-25', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Dummy', 232323, 0, 0, 2.00, '2023-05-01', '2023-05-02', '2023-05-31 12:59:23', '2023-05-31 12:59:23'),
(15, 'Japanese Ecephalitis Vaccine (JE Vaccine)', 100, 0, 0, 999.99, '2024-01-15', '2023-05-25', '2023-05-31 13:01:43', '2023-05-31 13:01:43'),
(16, 'Measles Mumps Rubella Vaccine', 80, 0, 0, 999.99, '2024-11-30', '2022-07-21', '2023-05-31 13:03:13', '2023-05-31 13:03:13'),
(17, 'Pneumococcal Vaccine', 50, 0, 0, 999.99, '2024-06-19', '2023-05-09', '2023-05-31 13:04:33', '2023-05-31 13:04:33'),
(18, 'Rotavirus Vaccine', 50, 0, 0, 999.99, '2024-06-12', '2022-12-30', '2023-05-31 13:05:33', '2023-05-31 13:05:33'),
(19, 'Shingles Vaccine (Zoster Vaccine)', 80, 0, 0, 999.99, '2024-08-22', '2023-01-25', '2023-05-31 13:07:33', '2023-05-31 13:07:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Test` (`fk_patient_id`);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `medicine_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `supply_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vaccines`
--
ALTER TABLE `vaccines`
  MODIFY `vaccine_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `Test` FOREIGN KEY (`fk_patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
