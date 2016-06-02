-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2016 at 11:39 PM
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
-- Table structure for table `ec_smtp_configs`
--

CREATE TABLE IF NOT EXISTS `ec_smtp_configs` (
  `id` int(11) NOT NULL,
  `smtp_host` varchar(254) NOT NULL,
  `smtp_port` varchar(254) NOT NULL,
  `smtp_username` varchar(254) NOT NULL,
  `smtp_password` varchar(254) NOT NULL,
  `smtp_client` varchar(254) NOT NULL,
  `is_default` int(1) NOT NULL DEFAULT '0',
  `is_active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ec_smtp_configs`
--

INSERT INTO `ec_smtp_configs` (`id`, `smtp_host`, `smtp_port`, `smtp_username`, `smtp_password`, `smtp_client`, `is_default`, `is_active`) VALUES
(2, 'mail.eradicatecancer.com', '25', 'contact@eradicatecancer.com', 'Abhirishi9*', 'null', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ec_smtp_configs`
--
ALTER TABLE `ec_smtp_configs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ec_smtp_configs`
--
ALTER TABLE `ec_smtp_configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
