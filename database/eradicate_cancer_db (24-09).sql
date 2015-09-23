-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2015 at 08:35 PM
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
-- Table structure for table `ec_homepagecontents`
--

DROP TABLE IF EXISTS `ec_homepagecontents`;
CREATE TABLE IF NOT EXISTS `ec_homepagecontents` (
  `id` bigint(11) NOT NULL,
  `specialisttag` text NOT NULL,
  `facebook` varchar(254) NOT NULL,
  `twitter` varchar(254) NOT NULL,
  `youtube` varchar(254) NOT NULL,
  `tag_one` text NOT NULL,
  `tag_two` text NOT NULL,
  `tag_three` text NOT NULL,
  `rss` varchar(254) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='home page contens section';

--
-- Dumping data for table `ec_homepagecontents`
--

INSERT INTO `ec_homepagecontents` (`id`, `specialisttag`, `facebook`, `twitter`, `youtube`, `tag_one`, `tag_two`, `tag_three`, `rss`) VALUES
(1, 'know your doctor more closelly', 'http://facebook.com/', 'http://twitter.com/', 'http://youtube.com/', 'Connect with physicians trained in top most American institutions', 'Get cure at your door step', 'Stay informed with latest advancements of treatment', 'http://rss.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ec_homepagecontents`
--
ALTER TABLE `ec_homepagecontents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ec_homepagecontents`
--
ALTER TABLE `ec_homepagecontents`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
