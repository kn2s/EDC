-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2015 at 07:48 AM
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
-- Table structure for table `ec_services`
--

CREATE TABLE IF NOT EXISTS `ec_services` (
  `id` int(10) NOT NULL,
  `doct_service_brif` text NOT NULL,
  `doct_service_detail` text NOT NULL,
  `doc_collabration_title` varchar(254) NOT NULL,
  `doc_colla_option_one` text NOT NULL,
  `doc_colla_option_two` text NOT NULL,
  `doc_colla_option_three` text NOT NULL,
  `doc_colla_option_four` text NOT NULL,
  `doc_colla_email` varchar(254) NOT NULL,
  `patient_service_brif` text NOT NULL,
  `patient_service_detail` text NOT NULL,
  `patient_hepling_title` text NOT NULL,
  `patient_helping_way` text NOT NULL,
  `consulting_charge` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ec_services`
--

INSERT INTO `ec_services` (`id`, `doct_service_brif`, `doct_service_detail`, `doc_collabration_title`, `doc_colla_option_one`, `doc_colla_option_two`, `doc_colla_option_three`, `doc_colla_option_four`, `doc_colla_email`, `patient_service_brif`, `patient_service_detail`, `patient_hepling_title`, `patient_helping_way`, `consulting_charge`) VALUES
(1, 'Eradicate Cancer strives to build a global platform for Hematology/ Oncology physicians, where Physicians with expertise in specific cancer subtypes and up-to-date with this fast advancing field can collaborate directly with treating physicians wherever they are.', 'We share knowledge directly with patients regarding their specific diagnosis, after going over their history and investigation reports. In this process, we want to share knowledge with YOU- the treating physician.<br>\r\n<br> \r\nIt is obviously up to you, to decide whether to pursue, modify or change our recommendations according to the resources available to you or affordability to the patient.<br><br>\r\nWe have no intention to challenge your judgment, but work together by joining hands, so that the patient receives the best and most up-to-date management.', 'Why should you collaborate with us?', 'Be a part of a global community of Hematology/ Oncology physicians sharing knowledge across borders.', 'Stay up-to-date with advancements in the rapidly moving field, which might be difficult for some busy clinicians.', 'Know about clinical trials available.', 'You are welcome to advertise our collaboration in your locality.', 'contact@eradicalecancer.com', 'The field of oncology is advancing at a rate never seen before. But the diagnosis of cancer is indeed overwhelming.', 'We believe every patient regardless of where they are deserves to know about the best strategy and upcoming treatments to combat this alarming disease.<br><br>\r\nEradicate Cancer strives to build a platform for patients to directly communicate with physicians trained in cancer and blood disorders from world-renowned Universities. Our physicians have specific expertise in various types and subtypes of hematology/oncology.<br><br>\r\nOur goal is to share knowledge directly with you regarding “your” specific diagnosis, after going over your history and investigation reports, regardless of where you are!', 'Through this common platform we wish to help you with', '<h4 class="first">A detailed EXPLANATION AND PROGNOSIS about your disease</h4>\r\n                <h4>CHANNELIZING YOUR CARE by directing you towards the specialists (like radiation oncologist, surgical oncologist, transplant physician, etc) you need to see</h4>\r\n                <h4>Educating you about THE BEST AND MOST ADVANCED TREATMENT STRATEGY, and alternative strategies</h4>\r\n                <h4>Making you up-to-date with the best solution IN YOUR CASE</h4>\r\n                <h4>Informing you about applicable CLINICAL TRIALS, which you should consider strongly if accessible to you</h4>', 80);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ec_services`
--
ALTER TABLE `ec_services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ec_services`
--
ALTER TABLE `ec_services`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
