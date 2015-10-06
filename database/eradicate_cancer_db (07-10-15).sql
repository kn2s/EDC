-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2015 at 09:12 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eradicate_cancer_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ec_alcohols`
--

DROP TABLE IF EXISTS `ec_alcohols`;
CREATE TABLE IF NOT EXISTS `ec_alcohols` (
  `id` bigint(11) NOT NULL,
  `socialactivity_id` bigint(11) NOT NULL,
  `alcoholname` varchar(254) NOT NULL,
  `quantity` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ec_drugs`
--

DROP TABLE IF EXISTS `ec_drugs`;
CREATE TABLE IF NOT EXISTS `ec_drugs` (
  `id` bigint(11) NOT NULL,
  `socialactivity_id` bigint(11) NOT NULL,
  `drugname` varchar(254) NOT NULL,
  `quantity` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ec_smokings`
--

DROP TABLE IF EXISTS `ec_smokings`;
CREATE TABLE IF NOT EXISTS `ec_smokings` (
  `id` bigint(11) NOT NULL,
  `socialactivity_id` bigint(11) NOT NULL,
  `quantity` int(8) NOT NULL,
  `frommonth` int(10) NOT NULL,
  `fromyear` int(10) NOT NULL,
  `tomonth` int(10) NOT NULL,
  `toyear` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ec_socialactivities`
--

DROP TABLE IF EXISTS `ec_socialactivities`;
CREATE TABLE IF NOT EXISTS `ec_socialactivities` (
  `id` bigint(11) NOT NULL,
  `patient_id` bigint(11) NOT NULL,
  `comment` text NOT NULL,
  `isdeleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ec_alcohols`
--
ALTER TABLE `ec_alcohols`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_drugs`
--
ALTER TABLE `ec_drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_smokings`
--
ALTER TABLE `ec_smokings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_socialactivities`
--
ALTER TABLE `ec_socialactivities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ec_alcohols`
--
ALTER TABLE `ec_alcohols`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ec_drugs`
--
ALTER TABLE `ec_drugs`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ec_smokings`
--
ALTER TABLE `ec_smokings`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ec_socialactivities`
--
ALTER TABLE `ec_socialactivities`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
