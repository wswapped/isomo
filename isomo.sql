-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2018 at 06:51 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isomo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `date_created`) VALUES
(1, 'SHYAKA James', 'shyaka', 'shyaka1', '2018-03-06 03:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `paperId` int(11) NOT NULL,
  `file` varchar(1024) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `paperId`, `file`, `date`) VALUES
(8, 2, '../papers/1525025522.html', '2018-04-29 18:12:02'),
(9, 2, '../papers/1525025645.html', '2018-04-29 18:14:05'),
(10, 5, '../papers/1525381350.html', '2018-05-03 21:02:30'),
(11, 5, '../papers/1525381617.html', '2018-05-03 21:06:57'),
(13, 8, '../papers/1525382535.html', '2018-05-03 21:22:15'),
(14, 24, 'answers/1525384982.html', '2018-05-03 22:03:02'),
(15, 25, 'answers/1525384989.html', '2018-05-03 22:03:09'),
(16, 26, 'answers/1525385014.html', '2018-05-03 22:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `name` varchar(32) NOT NULL,
  `printname` varchar(128) DEFAULT NULL,
  `short_intro` text,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`name`, `printname`, `short_intro`, `description`) VALUES
('P6', 'Primary 6', 'Papers for primary leaving students', NULL),
('S3', 'Senior 3', NULL, NULL),
('S6', 'Senior 6', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `subject` int(11) NOT NULL,
  `level` varchar(16) DEFAULT NULL,
  `file` varchar(1024) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `done_date` date DEFAULT NULL COMMENT 'The date when the exam was done',
  `answers` int(11) DEFAULT NULL COMMENT 'references id for answers',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`id`, `name`, `subject`, `level`, `file`, `year`, `done_date`, `answers`, `date`) VALUES
(8, 'S3 Mathematics 2019', 2, 'S3', '../papers/1525025522.html', 2019, NULL, NULL, '2018-04-29 18:12:02'),
(9, 'S3 Mathematics 2019', 2, 'S3', '../papers/1525025645.html', 2019, NULL, NULL, '2018-04-29 18:14:05'),
(10, 'Ikizami', 5, '', '../papers/1525381350.html', 0, NULL, NULL, '2018-05-03 21:02:30'),
(11, 'Ikizami 01', 5, NULL, '../papers/1525381617.html', 0, NULL, NULL, '2018-05-03 21:06:57'),
(13, ' les rÃ¨gles de circulation', 8, NULL, '../papers/1525382535.html', NULL, NULL, NULL, '2018-05-03 21:22:15'),
(14, 'Hands', 4, NULL, '../papers/1525384029.html', NULL, NULL, NULL, '2018-05-03 21:47:09'),
(15, 'Hands', 4, NULL, '../papers/1525384121.html', NULL, NULL, NULL, '2018-05-03 21:48:41'),
(16, 'Hands', 4, NULL, '../papers/1525384137.html', NULL, NULL, NULL, '2018-05-03 21:48:57'),
(17, 'Hands', 4, NULL, '../papers/1525384163.html', NULL, NULL, NULL, '2018-05-03 21:49:23'),
(18, 'DFSDFSD', 4, NULL, '../papers/1525384175.html', NULL, NULL, NULL, '2018-05-03 21:49:35'),
(19, '', 4, NULL, '../papers/1525384188.html', NULL, NULL, NULL, '2018-05-03 21:49:48'),
(20, 'SSFSDFS', 4, NULL, '../papers/1525384217.html', NULL, NULL, NULL, '2018-05-03 21:50:17'),
(21, 'SSFSDFS', 4, NULL, '../papers/1525384910.html', NULL, NULL, NULL, '2018-05-03 22:01:50'),
(22, 'SSFSDFS', 4, NULL, '../papers/1525384949.html', NULL, NULL, NULL, '2018-05-03 22:02:29'),
(23, 'SSFSDFS', 4, NULL, '../papers/1525384971.html', NULL, NULL, NULL, '2018-05-03 22:02:51'),
(24, 'SSFSDFS', 4, NULL, '../papers/1525384982.html', NULL, NULL, NULL, '2018-05-03 22:03:02'),
(25, 'SSFSDFS', 4, NULL, '../papers/1525384989.html', NULL, NULL, NULL, '2018-05-03 22:03:09'),
(26, 'Amategeko', 4, NULL, '../papers/1525385014.html', NULL, NULL, NULL, '2018-05-03 22:03:34'),
(27, 'sdad', 4, NULL, '../papers/1525385131.html', NULL, NULL, NULL, '2018-05-03 22:05:31');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `language` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `type`, `language`) VALUES
(1, 'Mathematics', 1, 'en'),
(2, 'Physics', 1, 'en'),
(3, 'Driving theory', 2, 'en'),
(4, 'Ikizami cya gutwara cyanditse', 2, 'kin'),
(5, 'Driving theory', 2, 'fr'),
(6, 'Traffic rules', 3, 'en'),
(7, 'Amategeko y\'umuhanda', 3, 'kin'),
(8, 'Les règles de circulation', 3, 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `subject_levels`
--

CREATE TABLE `subject_levels` (
  `id` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `level` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_levels`
--

INSERT INTO `subject_levels` (`id`, `subject`, `level`) VALUES
(1, 1, 'P6'),
(2, 1, 'S3'),
(3, 2, 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `subject_type`
--

CREATE TABLE `subject_type` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_type`
--

INSERT INTO `subject_type` (`id`, `name`, `description`) VALUES
(1, 'national_exams', 'For academics, from primary to secondary school'),
(2, 'driving_exam', 'Driving theory exam'),
(3, 'traffic_rules', 'traffic rules');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_levels`
--
ALTER TABLE `subject_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_type`
--
ALTER TABLE `subject_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subject_levels`
--
ALTER TABLE `subject_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject_type`
--
ALTER TABLE `subject_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
