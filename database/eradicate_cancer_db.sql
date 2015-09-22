-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2015 at 11:11 PM
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
-- Table structure for table `ec_admins`
--

CREATE TABLE IF NOT EXISTS `ec_admins` (
  `id` bigint(11) unsigned NOT NULL,
  `name` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(254) NOT NULL,
  `lastlogin` varchar(254) NOT NULL,
  `isactive` int(1) unsigned NOT NULL DEFAULT '0',
  `isdeleted` int(1) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='administrations section users';

--
-- Dumping data for table `ec_admins`
--

INSERT INTO `ec_admins` (`id`, `name`, `email`, `password`, `lastlogin`, `isactive`, `isdeleted`) VALUES
(1, 'mrin', 'mrintoryal@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ec_countries`
--

CREATE TABLE IF NOT EXISTS `ec_countries` (
  `id` bigint(11) unsigned NOT NULL,
  `name` varchar(254) NOT NULL,
  `shortname` varchar(254) NOT NULL,
  `countrycode` varchar(254) NOT NULL,
  `countryflag` varchar(254) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '0',
  `isdeleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='all permited country in this application';

-- --------------------------------------------------------

--
-- Table structure for table `ec_doctors`
--

CREATE TABLE IF NOT EXISTS `ec_doctors` (
  `id` bigint(11) NOT NULL,
  `patient_id` bigint(11) NOT NULL COMMENT 'here type=0 so use as doctore trit patient as user table',
  `specialization_id` bigint(11) unsigned NOT NULL,
  `image` varchar(254) NOT NULL,
  `designation` varchar(254) NOT NULL,
  `medical_school` varchar(254) NOT NULL,
  `residency` varchar(254) NOT NULL,
  `fellowship` varchar(254) NOT NULL,
  `residency_from` varchar(254) NOT NULL,
  `fellowship_from` varchar(254) NOT NULL,
  `twitter` varchar(254) NOT NULL,
  `facebook` varchar(254) NOT NULL,
  `description_one` text NOT NULL,
  `description_two` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ec_doctors`
--

INSERT INTO `ec_doctors` (`id`, `patient_id`, `specialization_id`, `image`, `designation`, `medical_school`, `residency`, `fellowship`, `residency_from`, `fellowship_from`, `twitter`, `facebook`, `description_one`, `description_two`) VALUES
(1, 3, 2, '1442948945Hydrangeas.jpg', 'mPhil', 'jadjas', 'asdasjd', 'jjnjcnj', 'djkasdjkasjadjkasd', 'jasfjasfka', 'aksfjkask', 'nnzmxnv', 'xnvm,znvm,znvm,z', ',nvm,zxnv,mxnv,mcx'),
(2, 4, 1, '1442953481Jellyfish.jpg', 'sfdsfs', 'sdfsdfs', 'sdfsdfs', 'sfsdf', 'sfsdf', 'sfsd', 'sdfsdf', 'sfsdfsd', 'sdf df sdfbj sbdjkf sjkf sjkdfh sdjkfh sjkdhf sjd fjks fjk sdfklsj djkj sjkf hk sjfhsjk hfsjkd kdsjh fjks fhjk sfhjks', 'fhsjk fhsjk fhsjkfh sjkfhjsk h huerih uisuihfsjkd sjkfkl fjks s');

-- --------------------------------------------------------

--
-- Table structure for table `ec_patients`
--

CREATE TABLE IF NOT EXISTS `ec_patients` (
  `id` bigint(11) unsigned NOT NULL,
  `name` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(254) NOT NULL,
  `createtime` bigint(11) NOT NULL,
  `ispatient` int(1) unsigned NOT NULL DEFAULT '1' COMMENT '1=patient 0=doctor',
  `browserdetails` text NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  `isdeleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ec_patients`
--

INSERT INTO `ec_patients` (`id`, `name`, `email`, `password`, `createtime`, `ispatient`, `browserdetails`, `isactive`, `isdeleted`) VALUES
(1, 'mrinmoy das', 'mrintoryal@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, 1, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.93 Safari/537.36', 1, 0),
(2, 'mrin', 'mrin@doc.com', '827ccb0eea8a706c4c34a16891f84e7b', 1442948944, 0, '', 1, 0),
(3, 'mrin', 'mrin@doc.com', '827ccb0eea8a706c4c34a16891f84e7b', 1442949112, 0, '', 1, 0),
(4, 'mrintwo', 'mrintwo@test.com', '827ccb0eea8a706c4c34a16891f84e7b', 1442953480, 0, '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ec_patient_details`
--

CREATE TABLE IF NOT EXISTS `ec_patient_details` (
  `id` bigint(11) NOT NULL,
  `patient_id` bigint(11) NOT NULL,
  `name` varchar(254) NOT NULL,
  `gender` varchar(254) NOT NULL,
  `dob_month` int(3) NOT NULL,
  `dob_day` int(3) NOT NULL,
  `dob_year` int(6) NOT NULL,
  `weight` double NOT NULL COMMENT 'unit in kg',
  `height` double NOT NULL COMMENT 'unit in cm',
  `city` varchar(254) NOT NULL,
  `state` varchar(254) NOT NULL,
  `country_id` int(4) NOT NULL,
  `performance` text NOT NULL,
  `performance_comment` text NOT NULL,
  `isactive` int(1) unsigned NOT NULL DEFAULT '0',
  `isdeleted` int(1) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ec_principle_diagonisises`
--

CREATE TABLE IF NOT EXISTS `ec_principle_diagonisises` (
  `id` bigint(11) unsigned NOT NULL,
  `name` varchar(256) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '0',
  `isdeleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ec_specializations`
--

CREATE TABLE IF NOT EXISTS `ec_specializations` (
  `id` int(8) unsigned NOT NULL,
  `name` varchar(254) NOT NULL,
  `isactive` int(1) NOT NULL,
  `isdeleted` int(1) NOT NULL,
  `createdon` varchar(254) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='doctors specialization list';

--
-- Dumping data for table `ec_specializations`
--

INSERT INTO `ec_specializations` (`id`, `name`, `isactive`, `isdeleted`, `createdon`) VALUES
(1, 'Lung Cancer', 1, 0, '1442953288'),
(2, 'Breast Cancer', 1, 0, '1442953314'),
(3, 'Prostate cancer', 1, 0, '1442953362');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ec_admins`
--
ALTER TABLE `ec_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_countries`
--
ALTER TABLE `ec_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_doctors`
--
ALTER TABLE `ec_doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_patients`
--
ALTER TABLE `ec_patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_patient_details`
--
ALTER TABLE `ec_patient_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_principle_diagonisises`
--
ALTER TABLE `ec_principle_diagonisises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_specializations`
--
ALTER TABLE `ec_specializations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ec_admins`
--
ALTER TABLE `ec_admins`
  MODIFY `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ec_countries`
--
ALTER TABLE `ec_countries`
  MODIFY `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ec_doctors`
--
ALTER TABLE `ec_doctors`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ec_patients`
--
ALTER TABLE `ec_patients`
  MODIFY `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ec_patient_details`
--
ALTER TABLE `ec_patient_details`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ec_principle_diagonisises`
--
ALTER TABLE `ec_principle_diagonisises`
  MODIFY `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ec_specializations`
--
ALTER TABLE `ec_specializations`
  MODIFY `id` int(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
