-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2021 at 07:10 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `FullName` varchar(60) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `razorpay_payment_id` varchar(60) DEFAULT NULL,
  `Payment_Status` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `FullName`, `Email`, `razorpay_payment_id`, `Payment_Status`) VALUES
(1, 'azad', 'choubeyazad@gmail,com', NULL, NULL),
(2, 'azad', 'azad@gmail.com', NULL, 'Pending'),
(3, 'azad', 'azad@gmail.com', NULL, 'Pending'),
(4, 'azad', 'azad@gmail.com', NULL, 'Pending'),
(5, 'azad', 'azad@gmail.com', NULL, 'Pending'),
(6, 'azad', 'azad@gmail.com', NULL, 'Pending'),
(7, 'azad', 'azad@gmail.com', NULL, 'Pending'),
(8, 'azad', 'azad@gmail.com', NULL, 'Pending'),
(9, 'azad', 'azad@gmail.com', NULL, 'Pending'),
(10, 'azad', 'azad@gmail.com', NULL, 'Pending'),
(11, 'azad', 'azad@gmail.com', NULL, 'Pending'),
(12, 'azad', 'azad@gmail.com', NULL, 'Pending'),
(13, 'azad', 'azad@gmail.com', NULL, 'Pending'),
(14, 'azad', 'azad@gmail.com', NULL, 'Pending'),
(15, 'azad', 'azad@gmail.com', NULL, 'Pending'),
(16, 'azad', 'azad@gmail.com', NULL, 'Pending'),
(17, 'azad', 'GURDEV@gmail.com', NULL, 'Pending'),
(18, 'azad', 'GURDEV@gmail.com', NULL, 'Pending'),
(19, 'azad', 'singhbhupinder16375@gmail.com', NULL, 'Pending'),
(20, 'azad', 'surveyorsahil@gmail.com', NULL, 'Pending'),
(21, 'anoop', 'pune.akcmmaharashra@gmail.com', NULL, 'Pending'),
(22, 'anoop', 'GURDEV@gmail.com', NULL, 'Pending'),
(23, 'azad', 'singhbhupinder16375@gmail.com', NULL, 'Pending'),
(24, 'azad', 'surveyorsahil@gmail.com', NULL, 'Pending'),
(25, 'azad', 'Jotdhillon3116@gmail.com', 'pay_Ht4Lziz4xwhKId', 'Complate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
