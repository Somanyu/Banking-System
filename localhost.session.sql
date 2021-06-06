-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 04:12 PM
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
  `Identity No` tinyint(4) NOT NULL,
  `First Name` text NOT NULL,
  `E-mail ID` text NOT NULL,
  `Balance` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_transc`
--

INSERT INTO `customer_transc` (`Identity No`, `First Name`, `E-mail ID`, `Balance`) VALUES
(1, 'Somanyu Samal', 'somanyu.samal@gmail.com', 2000),
(2, 'Arjun Wagle', 'arjun.wagle@gmail.com', 500),
(3, 'Mohini Raj', 'mohini.raj@gmail.com', 340),
(4, 'Krishna Sachin', 'krishna.sachin@gmail.com', 50),
(5, 'Rohan Mishra', 'rohan.mishra@gmail.com', 320),
(6, 'Gunjan Mehera', 'gunjan.mehra@gmail.com', 440),
(7, 'Virat Singh', 'virat.singh@gmail.com', 110),
(8, 'Riya Gada', 'riya.gada@gmail.com', 800),
(9, 'Sohan Rajendra', 'rohan.rajendra@gmail.com', 220),
(10, 'Priyanka Khandelal', 'priyanka.khandelal@gmail.com', 344);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_transc`
--
ALTER TABLE `customer_transc`
  ADD PRIMARY KEY (`Identity No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
