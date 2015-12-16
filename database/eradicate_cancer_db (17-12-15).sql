-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2015 at 08:45 PM
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
  `patient_id` int(11) unsigned NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `ec_alcohols`
--

CREATE TABLE IF NOT EXISTS `ec_alcohols` (
  `id` bigint(11) NOT NULL,
  `socialactivity_id` bigint(11) NOT NULL,
  `alcoholname` varchar(254) NOT NULL,
  `quantity` int(8) NOT NULL,
  `alcoholunit` varchar(254) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ec_case_communications`
--

CREATE TABLE IF NOT EXISTS `ec_case_communications` (
  `id` int(11) NOT NULL,
  `doctor_case_id` int(11) NOT NULL,
  `doct_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `isdoctoresent` int(1) NOT NULL DEFAULT '0',
  `isquestionaryedit` int(1) NOT NULL DEFAULT '0',
  `createdate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ec_case_opinions`
--

CREATE TABLE IF NOT EXISTS `ec_case_opinions` (
  `id` int(11) NOT NULL,
  `doctor_case_id` int(11) NOT NULL,
  `assessment` text NOT NULL,
  `prognosis` text NOT NULL,
  `treatmentstrategy` text NOT NULL,
  `alternativestrategy` text NOT NULL,
  `comment` text NOT NULL,
  `attachementname` varchar(254) NOT NULL,
  `cteratedatetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='all permited country in this application';

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ec_drugs`
--

CREATE TABLE IF NOT EXISTS `ec_drugs` (
  `id` bigint(11) NOT NULL,
  `socialactivity_id` bigint(11) NOT NULL,
  `drugname` varchar(254) NOT NULL,
  `quantity` int(8) NOT NULL,
  `drugunit` varchar(254) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ec_drug_alergies`
--

CREATE TABLE IF NOT EXISTS `ec_drug_alergies` (
  `id` bigint(11) unsigned NOT NULL,
  `patient_detail_id` bigint(11) unsigned NOT NULL,
  `name` varchar(254) NOT NULL,
  `reaction` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ec_homepagecontents`
--

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
  `detailsformsubmit` int(2) NOT NULL DEFAULT '0' COMMENT 'patient which form submit at last',
  `detailsubmitpercent` double NOT NULL COMMENT 'form details fillup percentage',
  `browserdetails` text NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  `isdeleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ec_patient_documents`
--

CREATE TABLE IF NOT EXISTS `ec_patient_documents` (
  `id` int(11) unsigned NOT NULL,
  `patient_id` int(11) unsigned NOT NULL,
  `bloodreport` text NOT NULL,
  `imagingreport` text NOT NULL,
  `pathologyreport` text NOT NULL,
  `otherreport` text NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ec_patient_past_histories`
--

CREATE TABLE IF NOT EXISTS `ec_patient_past_histories` (
  `id` int(11) unsigned NOT NULL,
  `patient_id` int(11) unsigned NOT NULL,
  `cancer_history` text NOT NULL,
  `surgical_history` text NOT NULL,
  `hospitalization` text NOT NULL,
  `family_cancer_history` text NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `ec_smokings`
--

CREATE TABLE IF NOT EXISTS `ec_smokings` (
  `id` bigint(11) NOT NULL,
  `socialactivity_id` bigint(11) NOT NULL,
  `quantity` int(8) NOT NULL,
  `frommonth` int(10) NOT NULL,
  `fromyear` int(10) NOT NULL,
  `tomonth` int(10) NOT NULL,
  `toyear` int(10) NOT NULL,
  `smkunit` varchar(254) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ec_socialactivities`
--

CREATE TABLE IF NOT EXISTS `ec_socialactivities` (
  `id` bigint(11) NOT NULL,
  `patient_id` bigint(11) NOT NULL,
  `comment` text NOT NULL,
  `alcohalstartmonth` int(11) NOT NULL,
  `alcohalstartyear` int(11) NOT NULL,
  `alcohalendmonth` int(11) NOT NULL,
  `alcohalendyear` int(11) NOT NULL,
  `isdeleted` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `ec_tumar_markers`
--

CREATE TABLE IF NOT EXISTS `ec_tumar_markers` (
  `id` int(11) NOT NULL,
  `about_illness_id` int(11) NOT NULL,
  `name` varchar(254) NOT NULL,
  `tumormonth` int(11) NOT NULL,
  `tumoryear` int(11) NOT NULL,
  `tumorresult` varchar(254) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ec_about_illness`
--
ALTER TABLE `ec_about_illness`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_admins`
--
ALTER TABLE `ec_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_alcohols`
--
ALTER TABLE `ec_alcohols`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_case_communications`
--
ALTER TABLE `ec_case_communications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_case_opinions`
--
ALTER TABLE `ec_case_opinions`
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
-- Indexes for table `ec_doctor_cases`
--
ALTER TABLE `ec_doctor_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_drugs`
--
ALTER TABLE `ec_drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_drug_alergies`
--
ALTER TABLE `ec_drug_alergies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_homepagecontents`
--
ALTER TABLE `ec_homepagecontents`
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
-- Indexes for table `ec_patient_documents`
--
ALTER TABLE `ec_patient_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_patient_past_histories`
--
ALTER TABLE `ec_patient_past_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_principle_diagonisises`
--
ALTER TABLE `ec_principle_diagonisises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_services`
--
ALTER TABLE `ec_services`
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
-- Indexes for table `ec_specializations`
--
ALTER TABLE `ec_specializations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ec_tumar_markers`
--
ALTER TABLE `ec_tumar_markers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ec_about_illness`
--
ALTER TABLE `ec_about_illness`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ec_admins`
--
ALTER TABLE `ec_admins`
  MODIFY `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ec_alcohols`
--
ALTER TABLE `ec_alcohols`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `ec_case_communications`
--
ALTER TABLE `ec_case_communications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `ec_case_opinions`
--
ALTER TABLE `ec_case_opinions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ec_countries`
--
ALTER TABLE `ec_countries`
  MODIFY `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ec_doctors`
--
ALTER TABLE `ec_doctors`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ec_doctor_cases`
--
ALTER TABLE `ec_doctor_cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ec_drugs`
--
ALTER TABLE `ec_drugs`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `ec_drug_alergies`
--
ALTER TABLE `ec_drug_alergies`
  MODIFY `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `ec_homepagecontents`
--
ALTER TABLE `ec_homepagecontents`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ec_patients`
--
ALTER TABLE `ec_patients`
  MODIFY `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ec_patient_details`
--
ALTER TABLE `ec_patient_details`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ec_patient_documents`
--
ALTER TABLE `ec_patient_documents`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ec_patient_past_histories`
--
ALTER TABLE `ec_patient_past_histories`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ec_principle_diagonisises`
--
ALTER TABLE `ec_principle_diagonisises`
  MODIFY `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ec_services`
--
ALTER TABLE `ec_services`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ec_smokings`
--
ALTER TABLE `ec_smokings`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `ec_socialactivities`
--
ALTER TABLE `ec_socialactivities`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ec_specializations`
--
ALTER TABLE `ec_specializations`
  MODIFY `id` int(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ec_tumar_markers`
--
ALTER TABLE `ec_tumar_markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
