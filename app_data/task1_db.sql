-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2018 at 03:48 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task1_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `task1_logintbl`
--

CREATE TABLE `task1_logintbl` (
  `login_id` bigint(20) NOT NULL,
  `login_email` varchar(50) NOT NULL,
  `login_password` varchar(255) NOT NULL,
  `login_datetime` varchar(50) NOT NULL,
  `login_isactivate` int(2) NOT NULL,
  `login_hash` varchar(40) NOT NULL,
  `login_ischangepass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task1_logintbl`
--

INSERT INTO `task1_logintbl` (`login_id`, `login_email`, `login_password`, `login_datetime`, `login_isactivate`, `login_hash`, `login_ischangepass`) VALUES
(1, 'catscalecompany@gmail.com', '591317cc94a7b6c85c77ebb58d87ee70', '28/11/18 03:19:11PM', 1, '44bf89b63173d40fb39f9842e308b3f9', '5e632913bf096e49880cf8b92d53c9ad');

-- --------------------------------------------------------

--
-- Table structure for table `task1_posttbl`
--

CREATE TABLE `task1_posttbl` (
  `post_id` int(10) NOT NULL,
  `post_author` varchar(50) NOT NULL,
  `post_item` text NOT NULL,
  `post_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task1_posttbl`
--

INSERT INTO `task1_posttbl` (`post_id`, `post_author`, `post_item`, `post_date`) VALUES
(1, 'catscalecompany@gmail.com', 'hello', '26/11/2018'),
(2, 'catscalecompany@gmail.com', 'hi', '26/11/2018'),
(3, 'catscalecompany@gmail.com', 'how are you', '26/11/2018'),
(4, 'catscalecompany12@gmail.com', 'sd', '27/11/2018');

-- --------------------------------------------------------

--
-- Table structure for table `task1_registertbl`
--

CREATE TABLE `task1_registertbl` (
  `register_id` bigint(20) NOT NULL,
  `register_fname` varchar(51) NOT NULL,
  `register_lname` varchar(51) NOT NULL,
  `register_mobile` varchar(20) NOT NULL,
  `register_dob` varchar(50) NOT NULL,
  `register_gender` varchar(15) NOT NULL,
  `register_email` varchar(60) NOT NULL,
  `register_photoname` varchar(50) NOT NULL,
  `register_datetime` varchar(50) NOT NULL,
  `register_hash` varchar(40) NOT NULL,
  `register_isactivate` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task1_registertbl`
--

INSERT INTO `task1_registertbl` (`register_id`, `register_fname`, `register_lname`, `register_mobile`, `register_dob`, `register_gender`, `register_email`, `register_photoname`, `register_datetime`, `register_hash`, `register_isactivate`) VALUES
(1, 'vikas', 'singh', '8808613963', '1998-05-09', 'Male', 'catscalecompany@gmail.com', 'useravatar - Copy.png', '26/11/2018 07:08:25PM Monday', 'b2fd0961ea86cd55fa2f860d03576a70', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task1_logintbl`
--
ALTER TABLE `task1_logintbl`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `task1_posttbl`
--
ALTER TABLE `task1_posttbl`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `task1_registertbl`
--
ALTER TABLE `task1_registertbl`
  ADD PRIMARY KEY (`register_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task1_logintbl`
--
ALTER TABLE `task1_logintbl`
  MODIFY `login_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `task1_posttbl`
--
ALTER TABLE `task1_posttbl`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `task1_registertbl`
--
ALTER TABLE `task1_registertbl`
  MODIFY `register_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
