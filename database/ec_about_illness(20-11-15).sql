-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2015 at 11:00 PM
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
-- Table structure for table `ec_about_illness`
--

CREATE TABLE IF NOT EXISTS `ec_about_illness` (
  `id` int(11) unsigned NOT NULL,
  `principle_diagonisises_id` int(11) NOT NULL,
  `startdiagomonth` int(11) NOT NULL,
  `startdiagoday` int(11) NOT NULL,
  `startdiagoyear` int(11) NOT NULL,
  `enddiagomonth` int(11) NOT NULL,
  `enddiagoyear` int(11) NOT NULL,
  `enddiagoday` int(11) NOT NULL,
  `diagodetails` text NOT NULL,
  `diagorecomandation` text NOT NULL,
  `istumarmarker` int(11) NOT NULL,
  `tumartype` varchar(256) NOT NULL,
  `tumarmonth` int(11) NOT NULL,
  `tumoryear` int(11) NOT NULL,
  `tumarresult` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ec_about_illness`
--
ALTER TABLE `ec_about_illness`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ec_about_illness`
--
ALTER TABLE `ec_about_illness`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `ec_about_illness` ADD `patient_id` INT(11) UNSIGNED NOT NULL AFTER `id`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
