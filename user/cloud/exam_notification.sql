-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 27, 2017 at 06:51 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `exam_notification`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `father` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` varchar(20) NOT NULL,
  `degree` varchar(20) NOT NULL,
  `course` varchar(30) NOT NULL,
  `college` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `rdate` varchar(15) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `dtime` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `name`, `father`, `gender`, `dob`, `address`, `city`, `contact`, `email`, `level`, `degree`, `course`, `college`, `username`, `password`, `rdate`, `month`, `year`, `dtime`) VALUES
(1, 'Raja', 'Ram', 'Male', '15-10-1995', '88,woraiyur', 'Trichy', 9095674000, 'raja11@gmail.com', 'Arts', 'MCA', 'Computer Science', 'SASTRA', 'U001', '123456', '21-01-2017', 1, 2017, '2017-02-11 15:54:02'),
(2, 'Dinesh', 'Suresh', 'Male', '10-10-1995', '33,srirangam', '', 9976570006, 'dinesh@gmail.com', 'Arts', 'MCA', 'Computer Science', 'NMC', 'U002', '123456', '21-01-2017', 1, 2017, '2017-02-11 14:57:09'),
(3, 'Dinesh', 'Suresh', 'Male', '15-03-1995', '33,srirangam', '', 9078911432, 'dinesh@gmail.com', 'Engg', 'BE', 'Computer Science', 'SASTRA', 'U003', '123456', '26-01-2017', 1, 2017, '2017-01-26 20:31:21'),
(4, 'KEERTHI', 'dddd', 'Female', '11-8-92', 'n jkxkjjkx', 'Trichy', 1234567890, 'suresh@gmail.com', 'Arts', 'MSc', 'Computer Science', 'kjnjksk', 'U004', '666', '13-02-2017', 2, 2017, '2017-02-13 13:02:07'),
(5, 'viji', 'thomas', 'Female', '1.11.1995', 'ndksjf', '', 9787350287, 'viji@gmail.com', 'Engg', 'B.Tech', 'Computer Science', 'sdskjcbekj', 'U005', 'viji', '26-07-2017', 7, 2017, '2017-07-26 12:47:03'),
(6, 'subha', 'ganesh', 'Female', '1.10.1995', 'skdcjhnidu', '', 8754869085, 'subha@gmail.com', 'SSLC', '', 'Computer Science', 'akjseuic', 'U006', '123456', '27-07-2017', 7, 2017, '2017-07-27 11:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `exam` varchar(100) NOT NULL,
  `edate` varchar(15) NOT NULL,
  `level` varchar(30) NOT NULL,
  `details` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `rdate` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `exam`, `edate`, `level`, `details`, `status`, `rdate`) VALUES
(1, 'TNPSC', '10-02-2017', 'Engg', 'JJ College, Trichy', 0, '26-01-2017'),
(2, 'Net Exam', '23-02-2017', 'Arts', 'net exam for all UG and PG candidates', 0, '11-02-2017'),
(3, 'tnpscexam', '13-4-17', 'Arts', 'tnpsc exam', 0, '13-02-2017'),
(4, 'Net Exam2', '25-02-2017', 'Arts', 'net exam', 0, '13-02-2017'),
(5, 'ssc', '1.11.2017', 'SSLC', 'ndjkcberui', 0, '26-07-2017'),
(6, 'upsc', '12.2.2018', 'Diploma', 'ksjdcusicf', 0, '27-07-2017'),
(7, 'rbi', '11.1.2018', 'Engg', 'jsdgchuedw', 0, '27-07-2017');

-- --------------------------------------------------------

--
-- Table structure for table `exam_apply`
--

CREATE TABLE `exam_apply` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `eid` int(11) NOT NULL,
  `city` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `rdate` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_apply`
--

INSERT INTO `exam_apply` (`id`, `uname`, `eid`, `city`, `location`, `status`, `rdate`) VALUES
(1, 'U001', 2, 'Trichy', '', 1, '11-02-2017'),
(2, 'U004', 4, 'Trichy', '', 1, '13-02-2017'),
(3, 'U005', 1, '', '', 1, '26-07-2017'),
(4, 'U002', 3, '', '', 1, '27-07-2017'),
(5, 'U006', 5, '', '', 1, '27-07-2017');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location`, `city`) VALUES
(1, 'Bharath College', 'Tanjore'),
(2, 'Govt College, Musiri', 'Trichy'),
(3, 'chennai', 'Chennai'),
(4, 'chatram', 'Trichy');
