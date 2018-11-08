-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 02, 2018 at 08:21 PM
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
(16, 26, 'answers/1525385014.html', '2018-05-03 22:03:34'),
(17, 29, 'answers/1526293024.html', '2018-05-14 10:17:04'),
(18, 30, 'answers/1526297071.html', '2018-05-14 11:24:31'),
(19, 31, 'answers/1526643574.html', '2018-05-18 11:39:34'),
(20, 32, 'answers/1526644095.html', '2018-05-18 11:48:15'),
(21, 33, 'answers/1526716328.html', '2018-05-19 07:52:08'),
(22, 34, 'answers/1526716921.html', '2018-05-19 08:02:01'),
(23, 35, 'answers/1526719338.html', '2018-05-19 08:42:19'),
(24, 36, 'answers/1530891484.html', '2018-07-06 15:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `buy_requests`
--

CREATE TABLE `buy_requests` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `answer` int(11) NOT NULL,
  `price` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `device` varchar(1028) NOT NULL,
  `status` enum('pending','done','failed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buy_requests`
--

INSERT INTO `buy_requests` (`id`, `user`, `phone`, `answer`, `price`, `date`, `device`, `status`) VALUES
(1, 42, '121212', 19, 200, '2018-05-20 08:59:10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 'pending'),
(2, 42, '121212', 19, 200, '2018-05-20 09:00:03', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 'pending'),
(3, 42, '0782163537', 20, 200, '2018-05-22 09:28:47', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 'pending'),
(4, 42, '9211212121', 22, 200, '2018-05-22 09:37:10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 'pending'),
(5, 42, '0784762982', 14, 200, '2018-05-22 11:35:19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 'pending'),
(6, 43, '784848236', 19, 200, '2018-07-08 02:53:24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `message` varchar(2048) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `date`) VALUES
(1, 'Placide', 'placidelunis@gmail.com', 'Placidelunismsakmdsakksadmkdsdssd', '2018-05-15 14:05:22'),
(2, 'Placide', 'placidelunis@gmail.com', 'Placidelunismsakmdsakksadmkdsdssd', '2018-05-15 14:06:45'),
(3, 'Placide', 'placidelunis@gmail.com', 'Placidelunismsakmdsakksadmkdsdssd', '2018-05-15 14:09:16'),
(4, 'Saphani', 'inyatsi@me.rw', 'Contacting you for support', '2018-05-16 13:59:59');

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
-- Table structure for table `menu_promoted_subjects`
--

CREATE TABLE `menu_promoted_subjects` (
  `id` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `level` varchar(32) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `archive` enum('no','yes') NOT NULL DEFAULT 'no',
  `archiveDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Lists the subjects to promote on the menu';

--
-- Dumping data for table `menu_promoted_subjects`
--

INSERT INTO `menu_promoted_subjects` (`id`, `subject`, `level`, `createdDate`, `archive`, `archiveDate`) VALUES
(1, 1, 'P6', '2018-07-08 04:53:03', 'no', NULL),
(2, 1, 'S3', '2018-07-08 04:53:03', 'no', NULL),
(3, 1, 'S6', '2018-07-08 04:53:03', 'no', NULL),
(4, 2, 'S3', '2018-07-08 04:53:03', 'no', NULL),
(5, 2, 'S6', '2018-07-08 04:53:03', 'no', NULL);

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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `archived` enum('no','yes') NOT NULL DEFAULT 'no',
  `archivedDate` timestamp NULL DEFAULT NULL,
  `archivedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`id`, `name`, `subject`, `level`, `file`, `year`, `done_date`, `answers`, `date`, `archived`, `archivedDate`, `archivedBy`) VALUES
(8, 'S3 Mathematics 2019', 2, 'S3', 'papers/1526293024.html', 2019, NULL, NULL, '2018-05-14 11:09:47', 'no', NULL, NULL),
(9, 'S3 Mathematics 2019', 2, 'S3', 'papers/1526293024.html', 2019, NULL, NULL, '2018-05-14 11:09:47', 'no', NULL, NULL),
(10, 'Ikizami', 5, '', 'papers/1526293024.html', 0, NULL, NULL, '2018-05-14 11:09:47', 'no', NULL, NULL),
(11, 'Ikizami 01', 5, NULL, 'papers/1526293024.html', 0, NULL, NULL, '2018-05-14 11:09:47', 'no', NULL, NULL),
(13, 'Les regles de circulation', 8, NULL, 'papers/1526293024.html', NULL, NULL, NULL, '2018-05-22 08:11:52', 'no', NULL, NULL),
(14, 'Hands', 4, NULL, 'papers/1526293024.html', NULL, NULL, NULL, '2018-05-14 11:09:47', 'no', NULL, NULL),
(15, 'Hands', 4, NULL, 'papers/1526293024.html', NULL, NULL, NULL, '2018-05-14 11:09:47', 'no', NULL, NULL),
(16, 'Hands', 4, NULL, 'papers/1526293024.html', NULL, NULL, NULL, '2018-05-14 11:09:47', 'no', NULL, NULL),
(17, 'Hands', 4, NULL, 'papers/1526293024.html', NULL, NULL, NULL, '2018-05-14 11:09:47', 'no', NULL, NULL),
(18, 'DFSDFSD', 4, NULL, 'papers/1526293024.html', NULL, NULL, NULL, '2018-05-14 11:09:47', 'no', NULL, NULL),
(20, 'SSFSDFS', 4, NULL, 'papers/1526293024.html', NULL, NULL, NULL, '2018-05-14 11:09:47', 'no', NULL, NULL),
(21, 'SSFSDFS', 4, NULL, 'papers/1526293024.html', NULL, NULL, NULL, '2018-05-14 11:09:47', 'no', NULL, NULL),
(22, 'SSFSDFS', 4, NULL, 'papers/1526293024.html', NULL, NULL, NULL, '2018-05-14 11:09:47', 'no', NULL, NULL),
(23, 'SSFSDFS', 4, NULL, 'papers/1526293024.html', NULL, NULL, NULL, '2018-05-14 11:09:47', 'no', NULL, NULL),
(24, 'SSFSDFS', 4, NULL, 'papers/1526293024.html', NULL, NULL, NULL, '2018-05-14 11:09:47', 'no', NULL, NULL),
(25, 'SSFSDFS', 4, NULL, 'papers/1526293024.html', NULL, NULL, NULL, '2018-05-14 11:09:47', 'no', NULL, NULL),
(26, 'Amategeko', 4, NULL, 'papers/1526293024.html', NULL, NULL, NULL, '2018-05-14 11:09:47', 'no', NULL, NULL),
(27, 'sdad', 4, NULL, 'papers/1526293024.html', NULL, NULL, NULL, '2018-05-14 11:09:47', 'no', NULL, NULL),
(28, 'S3 Mathematics 2018', 2, 'S3', 'papers/1526293024.html', 2018, NULL, NULL, '2018-05-14 11:09:47', 'no', NULL, NULL),
(29, 'P6 Mathematics 2017', 1, 'P6', 'papers/1526293024.html', 2017, NULL, NULL, '2018-05-14 11:09:47', 'no', NULL, NULL),
(30, 'MAte mabi', 4, NULL, 'papers/1526297071.html', NULL, NULL, NULL, '2018-05-20 06:16:14', 'no', NULL, NULL),
(31, 'P6 Social Studies 2017', 9, 'P6', 'papers/1526643574.html', 2017, NULL, NULL, '2018-05-18 11:45:53', 'no', NULL, NULL),
(32, 'PROVISION DRIVING TEST', 3, NULL, 'papers/1526644095.html', NULL, NULL, NULL, '2018-05-19 08:12:21', 'no', NULL, NULL),
(33, 'S3 Mathematics 1999', 2, 'S3', 'papers/1526716328.html', 1999, NULL, NULL, '2018-05-19 07:52:08', 'no', NULL, NULL),
(34, 'Ikizami 05', 5, NULL, 'papers/1526716921.html', NULL, NULL, NULL, '2018-05-19 08:02:01', 'no', NULL, NULL),
(35, 'Soma amategeko y\'umuhanda', 8, NULL, 'papers/1526719338.html', NULL, NULL, NULL, '2018-05-19 08:42:18', 'no', NULL, NULL),
(36, 'P6 Social Studies 2017', 4, 'P6', 'papers/1530891484.html', 2017, NULL, NULL, '2018-07-06 15:38:04', 'no', NULL, NULL);

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
(8, 'Les règles de circulation', 3, 'fr'),
(9, 'Social Studies', 1, 'en');

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
(3, 2, 'S6'),
(4, 9, 'P6');

-- --------------------------------------------------------

--
-- Table structure for table `subject_type`
--

CREATE TABLE `subject_type` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `sname` varchar(32) NOT NULL COMMENT 'Short slug name',
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_type`
--

INSERT INTO `subject_type` (`id`, `name`, `sname`, `description`) VALUES
(1, 'national_exams', 'ne', 'For academics, from primary to secondary school'),
(2, 'driving_exam', 'de', 'Driving theory exam'),
(3, 'traffic_rules', 'tr', 'traffic rules');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(2048) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `stopDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `createdDate`, `stopDate`) VALUES
(1, 'dasd@dsada.dad', '2018-07-03 23:08:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(32) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `gender` varchar(8) NOT NULL,
  `dob` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `archived` varchar(4) NOT NULL DEFAULT 'no',
  `archivedDate` timestamp NULL DEFAULT NULL,
  `archivedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `phone`, `email`, `gender`, `dob`, `password`, `createdDate`, `archived`, `archivedDate`, `archivedBy`) VALUES
(1, 'Placide', 'placide', '078', 'sh@me.com', 'male', '12121212', '', '2018-05-13 18:50:43', 'no', '2018-05-14 22:00:00', NULL),
(2, 'sdsdsd', 'sdsds', '121212', 'email', 'gender', '1212', '', '2018-05-15 22:15:38', 'no', NULL, NULL),
(3, 'sdsdsd', 'sdsds', '121212', 'email', 'gender', '1212', '', '2018-05-15 22:16:17', 'no', NULL, NULL),
(4, 'sdsdsd', 'sdsds', '121212', 'email', 'gender', '1212', '', '2018-05-15 22:16:40', 'no', NULL, NULL),
(5, 'sdsdsd', 'sdsds', '121212', 'email', 'gender', '1212', '', '2018-05-15 22:16:56', 'no', NULL, NULL),
(6, 'sdsdsd', 'sdsds', '121212', 'email', 'gender', '1212', '', '2018-05-15 22:17:23', 'no', NULL, NULL),
(7, 'sdsdsd', 'sdsds', '121212', 'email', 'gender', '1212', '', '2018-05-15 22:17:48', 'no', NULL, NULL),
(8, 'sdsdsd', 'sdsds', '121212', 'email', 'gender', '1212', '', '2018-05-15 22:18:06', 'no', NULL, NULL),
(9, 'sdsdsd', 'sdsds', '121212', 'email', 'gender', '1212', '', '2018-05-15 22:20:02', 'no', NULL, NULL),
(10, 'sdsdsd', 'sdsds', '121212', 'email', 'gender', '1212', '', '2018-05-15 22:20:49', 'no', NULL, NULL),
(11, 'sdsdsd', 'sdsds', '121212', 'email', 'gender', '1212', '', '2018-05-15 22:21:42', 'no', NULL, NULL),
(12, 'sdsdsd', 'sdsds', '121212', 'email', 'gender', '1212', '', '2018-05-15 22:21:52', 'no', NULL, NULL),
(13, 'sdsdsd', 'sdsds', '121212', 'email', 'gender', '1212', '', '2018-05-15 23:16:02', 'no', NULL, NULL),
(14, 'sdsdsd', 'sdsds', '121212', 'email', 'gender', '1212', '', '2018-05-15 23:16:12', 'no', NULL, NULL),
(15, 'sdsdsd', 'sdsds', '121212', 'email', 'gender', '1212', '', '2018-05-15 23:16:22', 'no', NULL, NULL),
(16, 'sdsdsd', 'sdsds', '121212', 'email', 'gender', '1212', '', '2018-05-15 23:16:36', 'no', NULL, NULL),
(17, 'sdsdsd', 'sdsds', '121212', 'email', 'gender', '1212', '', '2018-05-15 23:16:44', 'no', NULL, NULL),
(18, 'sdsdsd', 'sdsds', '121212', 'email', 'gender', '1212', '', '2018-05-15 23:17:10', 'no', NULL, NULL),
(19, 'sdsdsd', 'sdsds', '121212', 'email', 'gender', '1212', '', '2018-05-15 23:17:19', 'no', NULL, NULL),
(20, 'sdsdsd', 'sdsds', '121212', 'email', 'gender', '1212', '', '2018-05-15 23:17:35', 'no', NULL, NULL),
(21, 'sdadsad', 'asdasda', '1212121212', 'email', 'gender', '21211', '', '2018-05-15 23:18:14', 'no', NULL, NULL),
(22, 'sdadsad', 'asdasda', '1212121212', 'email', 'gender', '21211', '', '2018-05-15 23:19:13', 'no', NULL, NULL),
(23, 'sdadsad', 'asdasda', '1212121212', 'email', 'gender', '21211', '', '2018-05-15 23:19:23', 'no', NULL, NULL),
(24, 'sdadsad', 'asdasda', '1212121212', 'email', 'gender', '21211', '', '2018-05-15 23:19:52', 'no', NULL, NULL),
(25, 'sdadsad', 'asdasda', '1212121212', 'email', 'gender', '21211', '', '2018-05-15 23:20:46', 'no', NULL, NULL),
(26, 'sdadsad', 'asdasda', '1212121212', 'email', 'gender', '21211', '', '2018-05-15 23:20:59', 'no', NULL, NULL),
(27, 'sdadsad', 'asdasda', '1212121212', 'email', 'gender', '21211', '', '2018-05-15 23:21:07', 'no', NULL, NULL),
(28, 'sdadsad', 'asdasda', '1212121212', 'email', 'gender', '21211', '', '2018-05-15 23:21:17', 'no', NULL, NULL),
(29, 'sdadsad', 'asdasda', '1212121212', 'email', 'gender', '21211', '', '2018-05-15 23:21:44', 'no', NULL, NULL),
(30, 'sdadsad', 'asdasda', '1212121212', 'email', 'gender', '21211', '', '2018-05-15 23:22:03', 'no', NULL, NULL),
(31, 'sdadsad', 'asdasda', '1212121212', 'email', 'gender', '21211', '', '2018-05-15 23:22:24', 'no', NULL, NULL),
(32, 'sdadsad', 'asdasda', '1212121212', 'email', 'gender', '21211', '', '2018-05-15 23:22:39', 'no', NULL, NULL),
(33, 'sdadsad', 'asdasda', '1212121212', 'email', 'gender', '21211', '', '2018-05-15 23:22:48', 'no', NULL, NULL),
(34, 'sdadsad', 'asdasda', '1212121212', 'email', 'gender', '21211', '', '2018-05-15 23:23:59', 'no', NULL, NULL),
(35, 'sdadsad', 'asdasda', '1212121212', 'email', 'gender', '21211', '', '2018-05-15 23:24:21', 'no', NULL, NULL),
(36, 'sdadsad', 'asdasda', '1212121212', 'email', 'gender', '21211', '', '2018-05-15 23:25:00', 'no', NULL, NULL),
(37, 'sdadsad', 'asdasda21', '1212121212', 'email', 'gender', '21211', '', '2018-05-15 23:32:42', 'no', NULL, NULL),
(38, 'sdadsad', 'asdasda213', '1212121212', 'email', 'gender', '21211', '', '2018-05-15 23:33:12', 'no', NULL, NULL),
(39, 'Insibika', 'inka', '', 'placide@edorica.com', 'male', '121', '', '2018-05-15 23:47:35', 'no', NULL, NULL),
(40, 'isomo', 'isomo', '12121', 'isom@igihe.com', 'female', '121211', '$2y$10$lrmNXg1XPspG4ZsFlisbt.hV/tvW5xSOI6ZdvgS9RyZlHMKVaos7W', '2018-05-15 23:49:37', 'no', NULL, NULL),
(41, 'Placide', 'placidelunis', '', 'placidelunis@gmail.com', 'male', '1990', '$2y$10$1wAJyw142FXmdKNs345.Deyi4r/PUEn8pRlD92inTQ.TU0COO326m', '2018-05-16 08:46:17', 'no', NULL, NULL),
(42, 'placide', '12', '', '12@me.com', 'male', '1998', '$2y$10$Q0rBql8Xn7XY0qUMh6fEqub0/Te7PeT2ce4l3kUROSmb.7jnhkCqe', '2018-05-16 08:47:37', 'no', NULL, NULL),
(43, 'MUHIRWA Clement', 'placidelunis@gmail.com', '784848236', 'muhirwaclement@gmail.com', 'male', '', '$2y$10$2LRYdqLiwrMuhmq.l2soJ.6Z3Rvft84Qf8Vm1nR.jpOMKKVHTqyr.', '2018-07-06 15:41:34', 'no', NULL, NULL);

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
-- Indexes for table `buy_requests`
--
ALTER TABLE `buy_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `menu_promoted_subjects`
--
ALTER TABLE `menu_promoted_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject`),
  ADD KEY `level-menu` (`level`);

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
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `buy_requests`
--
ALTER TABLE `buy_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu_promoted_subjects`
--
ALTER TABLE `menu_promoted_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subject_levels`
--
ALTER TABLE `subject_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject_type`
--
ALTER TABLE `subject_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_promoted_subjects`
--
ALTER TABLE `menu_promoted_subjects`
  ADD CONSTRAINT `level-menu` FOREIGN KEY (`level`) REFERENCES `levels` (`name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_promoted_subjects_ibfk_1` FOREIGN KEY (`subject`) REFERENCES `subjects` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
