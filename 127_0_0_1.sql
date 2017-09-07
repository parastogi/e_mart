-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2017 at 05:49 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_mart`
--
CREATE DATABASE IF NOT EXISTS `e_mart` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `e_mart`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `m_username` varchar(256) NOT NULL,
  `i_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `i_id` int(11) NOT NULL,
  `i_name` varchar(256) DEFAULT NULL,
  `category` varchar(256) DEFAULT NULL,
  `price` float(11,2) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `available` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `m_username` varchar(256) NOT NULL,
  `m_name` varchar(256) DEFAULT NULL,
  `m_password` varchar(256) DEFAULT NULL,
  `m_address` varchar(256) DEFAULT NULL,
  `m_email` varchar(256) DEFAULT NULL,
  `m_phone` varchar(13) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_purchases`
--

CREATE TABLE `member_purchases` (
  `o_id` int(11) NOT NULL,
  `m_username` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `o_id` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `amount` float(11,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_has_items`
--

CREATE TABLE `order_has_items` (
  `o_id` int(11) NOT NULL,
  `i_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `s_username` varchar(256) NOT NULL,
  `s_name` varchar(256) DEFAULT NULL,
  `s_password` varchar(256) DEFAULT NULL,
  `s_address` varchar(256) DEFAULT NULL,
  `s_email` varchar(256) DEFAULT NULL,
  `s_phone` varchar(256) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`s_username`, `s_name`, `s_password`, `s_address`, `s_email`, `s_phone`) VALUES
('paras', 'paras agarwal', 'paras', 'h-202,Hall-4', 'agarwalp631@gmail.com', '9479836041');

-- --------------------------------------------------------

--
-- Table structure for table `staffadditem`
--

CREATE TABLE `staffadditem` (
  `s_username` varchar(256) NOT NULL,
  `i_id` int(11) NOT NULL,
  `date_added` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`m_username`,`i_id`),
  ADD KEY `i_id` (`i_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_username`);

--
-- Indexes for table `member_purchases`
--
ALTER TABLE `member_purchases`
  ADD PRIMARY KEY (`o_id`,`m_username`),
  ADD KEY `m_username` (`m_username`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `order_has_items`
--
ALTER TABLE `order_has_items`
  ADD PRIMARY KEY (`o_id`,`i_id`),
  ADD KEY `i_id` (`i_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`s_username`);

--
-- Indexes for table `staffadditem`
--
ALTER TABLE `staffadditem`
  ADD PRIMARY KEY (`s_username`,`i_id`),
  ADD KEY `i_id` (`i_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
