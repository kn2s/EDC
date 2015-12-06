-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2015 at 04:39 AM
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
-- Table structure for table `ec_doctor_cases`
--

CREATE TABLE IF NOT EXISTS `ec_doctor_cases` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `casecode` varchar(256) NOT NULL,
  `opinion_due_date` date NOT NULL,
  `available_date` date NOT NULL,
  `consultant_fee` double NOT NULL,
  `satatus` int(2) NOT NULL DEFAULT '0' COMMENT '0=un read,1=pending,2=awating input,3=opnion due,4=delay',
  `diagonisis` varchar(256) NOT NULL,
  `ispaymentdone` int(1) NOT NULL DEFAULT '0',
  `createdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ec_doctor_cases`
--
ALTER TABLE `ec_doctor_cases`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ec_doctor_cases`
--
ALTER TABLE `ec_doctor_cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
