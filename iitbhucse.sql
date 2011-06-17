-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2011 at 10:57 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iitbhucse`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `crsid` bigint(20) NOT NULL,
  `crsname` varchar(255) NOT NULL,
  `crsdescription` varchar(255) NOT NULL,
  PRIMARY KEY (`crsid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--


-- --------------------------------------------------------

--
-- Table structure for table `elibrary`
--

CREATE TABLE IF NOT EXISTS `elibrary` (
  `bookid` varchar(255) NOT NULL,
  `bookname` varchar(255) NOT NULL,
  `bookauthor` varchar(255) NOT NULL,
  `bookdescription` varchar(255) DEFAULT NULL,
  `bookpages` int(11) NOT NULL,
  `bookcollection` varchar(255) NOT NULL,
  PRIMARY KEY (`bookid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elibrary`
--


-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `fid` bigint(20) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `fdesignation` int(11) NOT NULL,
  `fqualification` varchar(255) NOT NULL,
  `femail` varchar(255) NOT NULL,
  `fphone` varchar(255) DEFAULT NULL,
  `finterest` varchar(255) DEFAULT NULL,
  `fstatus` int(11) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--


-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `newsid` int(11) NOT NULL AUTO_INCREMENT,
  `newstitle` varchar(255) NOT NULL,
  `newstime` int(11) NOT NULL,
  `newscontent` varchar(255) NOT NULL,
  `newsauthor` varchar(255) NOT NULL,
  `newsexpiry` int(11) NOT NULL,
  PRIMARY KEY (`newsid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `news`
--


-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `stuid` bigint(20) NOT NULL,
  `stname` varchar(255) NOT NULL,
  `strollno` varchar(255) NOT NULL,
  `stemail` varchar(255) NOT NULL,
  `stcourse` int(11) NOT NULL,
  `styear` int(11) NOT NULL,
  `stinterest` varchar(255) DEFAULT NULL,
  `stcgpa` varchar(255) DEFAULT NULL,
  `stinternship` varchar(255) DEFAULT NULL,
  `stplacement` varchar(255) DEFAULT NULL,
  `stresume` varchar(255) DEFAULT NULL,
  `ststatus` int(11) NOT NULL,
  PRIMARY KEY (`stuid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
