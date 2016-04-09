-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2016 at 08:00 PM
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
-- Table structure for table `ec_email_text`
--

CREATE TABLE IF NOT EXISTS `ec_email_text` (
  `id` int(11) NOT NULL,
  `registration` text NOT NULL,
  `appointment_confirm` text NOT NULL,
  `opinion_thanks` text NOT NULL,
  `doc_allow_modify` text NOT NULL,
  `quesionair_modify` text NOT NULL,
  `communication_recieve` text NOT NULL,
  `password_recovery` text NOT NULL,
  `case_assign` text NOT NULL,
  `opinion_due_alert` text NOT NULL,
  `opinion_submited` text NOT NULL,
  `opinion_missed` text NOT NULL,
  `contact_us` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ec_email_text`
--

INSERT INTO `ec_email_text` (`id`, `registration`, `appointment_confirm`, `opinion_thanks`, `doc_allow_modify`, `quesionair_modify`, `communication_recieve`, `password_recovery`, `case_assign`, `opinion_due_alert`, `opinion_submited`, `opinion_missed`, `contact_us`) VALUES
(1, 'Thanks for connecting with EDC. We fulfil your preferred doctor.', 'czxczx', '', 'zxczxc', 'zxczx', 'zxczx', 'asdasdasa sdas dsa a', 'sdewrwe e rewt f ds', 'sdfs dsf sdf ', 'asdaa f', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ec_email_text`
--
ALTER TABLE `ec_email_text`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ec_email_text`
--
ALTER TABLE `ec_email_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
