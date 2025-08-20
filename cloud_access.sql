-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2021 at 01:53 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cloud_access`
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
('admin', 'admin'),
('provider', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `blockchain`
--

CREATE TABLE `blockchain` (
  `id` int(11) NOT NULL default '0',
  `block_id` int(11) NOT NULL,
  `pre_hash` varchar(200) NOT NULL,
  `hash_value` varchar(200) NOT NULL,
  `sdata` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blockchain`
--


-- --------------------------------------------------------

--
-- Table structure for table `ks_blocked`
--

CREATE TABLE `ks_blocked` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `owner` varchar(20) NOT NULL,
  `fid` int(11) NOT NULL,
  `ipaddress` varchar(30) NOT NULL,
  `macaddress` varchar(30) NOT NULL,
  `hack_pattern` varchar(30) NOT NULL,
  `dtime` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_blocked`
--


-- --------------------------------------------------------

--
-- Table structure for table `ks_register`
--

CREATE TABLE `ks_register` (
  `id` int(11) NOT NULL,
  `owner` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `location` varchar(30) NOT NULL,
  `company` varchar(50) NOT NULL,
  `desig` varchar(30) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `signature` varchar(50) NOT NULL,
  `public_key` varchar(30) NOT NULL,
  `num_user` int(11) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `sms_st` int(11) NOT NULL,
  `rdate` varchar(15) NOT NULL,
  `status` int(11) NOT NULL,
  `file_req` int(11) NOT NULL,
  `log_st` int(11) NOT NULL,
  PRIMARY KEY  (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_register`
--


-- --------------------------------------------------------

--
-- Table structure for table `ks_request`
--

CREATE TABLE `ks_request` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `owner` varchar(30) NOT NULL,
  `fid` int(11) NOT NULL,
  `secret_key` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `req_date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_request`
--


-- --------------------------------------------------------

--
-- Table structure for table `ks_send_audit`
--

CREATE TABLE `ks_send_audit` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `fid` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `signature` varchar(20) NOT NULL,
  `key_block` varchar(20) NOT NULL,
  `rdate` varchar(15) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_send_audit`
--


-- --------------------------------------------------------

--
-- Table structure for table `ks_user_files`
--

CREATE TABLE `ks_user_files` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `owner` varchar(20) NOT NULL,
  `file_type` varchar(200) NOT NULL,
  `file_content` varchar(200) NOT NULL,
  `upload_file` varchar(200) NOT NULL,
  `key1` varchar(50) NOT NULL,
  `mod_time` varchar(30) NOT NULL,
  `modify_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `key_count` int(11) NOT NULL,
  `server` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `file_req` int(11) NOT NULL,
  `file_st` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_user_files`
--


-- --------------------------------------------------------

--
-- Table structure for table `ks_user_reg`
--

CREATE TABLE `ks_user_reg` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `file_req` int(11) NOT NULL,
  `rdate` varchar(15) NOT NULL,
  PRIMARY KEY  (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_user_reg`
--


-- --------------------------------------------------------

--
-- Table structure for table `ks_user_search`
--

CREATE TABLE `ks_user_search` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `fid` int(11) NOT NULL,
  `keyword` varchar(200) NOT NULL,
  `key_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ks_user_search`
--

