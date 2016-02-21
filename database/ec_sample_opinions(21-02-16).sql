-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2016 at 04:50 AM
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
-- Table structure for table `ec_sample_opinions`
--

CREATE TABLE IF NOT EXISTS `ec_sample_opinions` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(254) NOT NULL,
  `doctor_name` varchar(254) NOT NULL,
  `create_date` date NOT NULL,
  `refferences` text NOT NULL,
  `assesment` text NOT NULL,
  `prognosis` text NOT NULL,
  `best_tritment_strategy` text NOT NULL,
  `alternative_strategy` text NOT NULL,
  `doctor_qualification` varchar(254) NOT NULL,
  `create_time` int(11) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ec_sample_opinions`
--

INSERT INTO `ec_sample_opinions` (`id`, `patient_name`, `doctor_name`, `create_date`, `refferences`, `assesment`, `prognosis`, `best_tritment_strategy`, `alternative_strategy`, `doctor_qualification`, `create_time`, `is_deleted`) VALUES
(1, 'dukhi attay', 'Dr. khush man', '2016-03-12', 'Swain SM, Baselga J, Kim SB, Ro J, Semiglazov V, Campone M, Ciruelos E,Ferrero JM, Schneeweiss A, Heeson S, Clark E, Ross G, Benyunes MC, Cortés J; CLEOPATRA Study Group. Pertuzumab, trastuzumab, and docetaxel in HER2-positive metastatic breast cancer. N Engl J Med. 2015 Feb 19;372(8):724-34', 'Based on the imaging and biopsy, you have been diagnosed with relapsed breast cancer. The cancer tissue is positive for expression of the Her-2 receptor and negative for estrogen and progesterone receptors. You have already undergone right sided breast surgery and post-surgery chemotherapy with a combination of Adriamycin and cyclophosphamide followed by paclitaxel and Herceptin (trastuzumab). From the recent imaging, you have progressed seven months after the last chemotherapy with development of multiple new metastasis in your bones and liver. This is consistent with stage IV breast cancer. According to the information provided by you, you are in good performance status currently, i.e you are still active and spend less than 50% time in chair/bed', 'Prognosis\r\nStage IV breast cancer is considered incurable, however, there are multiple agents which can control the disease for prolonged duration. Based on the data published in the Surveillance, Epidemiology, and End Results (SEER) database, more than 50% of unstaged breast cancer patients survive at least 5 years.\r\n\r\nhttp://seer.cancer.gov/statfacts/html/breast.html\r\n\r\nWith the introduction of newer therapies this number could be higher. (Elaborated data based on prognosis will be provided with the report if requested).', 'At this point our recommendation for cancer treatment is to start on a combination of three drugs if considered applicable to you by your oncologist. 1. Pertuzumab, 2. Trastuzumab, and 3. Docetaxel. Based on the CLEOPATRA study, published in prestigious New England Journal of Medicine (see ref below), first-line treatment with pertuzumab/trastuzumab/docetaxel significantly improved overall survival (OS) for patients with HER2-positive metastatic breast cancer compared with placebo/trastuzumab/docetaxel. The median survival of the group treated with combination of pertuzumab/trastuzumab/docetaxel was 56.5 months compared to 40.8 months in the group receiving trastuzumab/docetaxel only.\r\n\r\nAfter achievement of best response to treatment (usually after 6 to 12 months of combined therapy), we typically discontinue cytotoxic chemotherapy and continue trastuzumab (with or without pertuzumab therapy). You will need to be closely monitored by your physician for adverse effects of this combination which may include but not limited to low blood counts, fever, infection, diarrhea, peripheral neuropathy, anemia, asthenia, fatigue, heart failure, shortness of breath and others.\r\n\r\nAlong with chemotherapy, we also recommend bone targeted therapy. Since you have metastasis to bone (cancer has spread to the bone) which is also symptomatic and there is an impending fracture, we recommend starting bone targeted therapy such as zolendronic acid or denosumab, along with calcium plus vitamin D supplementation. Clearance from a dentist is recommended before starting these meds because there is a risk for necrosis of the jaw which can be a serious side effect.', 'Alternatively if Pertuzumab is not available, we recommend that you continue trastuzumab and add another chemotherapy agent such as docetaxel or venorelbine or gemcitabine. Alternatives to trastuzumab include lapatinib (with capecitabine) or TD M -1 (Ado-trastuzumab emtansine). It is better to continue on some anti-Her2 therapy for as long as you can tolerate.\r\n\r\nAlternatively, enrollment in a well-designed clinical trial is also a reasonable option. You can discuss with your physician about clinical trials available in your area. If you are interested to know more about clinical trials available for you in USA, we can provide that information.', 'Phd mped', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ec_sample_opinions`
--
ALTER TABLE `ec_sample_opinions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ec_sample_opinions`
--
ALTER TABLE `ec_sample_opinions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
