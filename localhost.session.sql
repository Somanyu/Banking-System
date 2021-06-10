-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 07:18 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customers`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_transc`
--

CREATE TABLE `customer_transc` (
  `id` tinyint(4) NOT NULL,
  `full_name` text NOT NULL,
  `email_id` text NOT NULL,
  `balance` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_transc`
--

INSERT INTO `customer_transc` (`id`, `full_name`, `email_id`, `balance`) VALUES
(101, 'Somanyu Samal', 'somanyu.samal@gmail.com', 60000),
(102, 'Arjun Wagle', 'arjun.wagle@gmail.com', 30992),
(103, 'Mohini Raj', 'mohini.raj@gmail.com', 44534),
(104, 'Krishna Sachin', 'krishna.sachin@gmail.com', 19637),
(105, 'Rohan Mishra', 'rohan.mishra@gmail.com', 30000),
(106, 'Gunjan Mehera', 'gunjan.mehra@gmail.com', 44000),
(107, 'Virat Singh', 'virat.singh@gmail.com', 26000),
(108, 'Riya Gada', 'riya.gada@gmail.com', 46003),
(109, 'Sohan Rajendra', 'rohan.rajendra@gmail.com', 34388),
(110, 'Priyanka Khandelal', 'priyanka.khandelal@gmail.com', 34000);

-- --------------------------------------------------------

--
-- Table structure for table `history_transc`
--

CREATE TABLE `history_transc` (
  `serial_no` int(11) NOT NULL,
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `balance` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_transc`
--
ALTER TABLE `customer_transc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_transc`
--
ALTER TABLE `history_transc`
  ADD PRIMARY KEY (`serial_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history_transc`
--
ALTER TABLE `history_transc`
  MODIFY `serial_no` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
