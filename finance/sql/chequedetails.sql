-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2017 at 10:05 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `waligamadistributors`
--

-- --------------------------------------------------------

--
-- Table structure for table `chequedetails`
--

CREATE TABLE IF NOT EXISTS `chequedetails` (
  `chequeId` int(11) NOT NULL AUTO_INCREMENT,
  `Date` varchar(50) NOT NULL,
  `retailerName` varchar(50) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`chequeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `chequedetails`
--

INSERT INTO `chequedetails` (`chequeId`, `Date`, `retailerName`, `Amount`) VALUES
(1, '02.08.2017', 'Nanayakkara', '12000.00'),
(2, '03.08.2017', 'Perera', '5000.00'),
(3, '04.08.2017', 'Tennakoon', '4800.00'),
(10, '18.08.2017', 'Wijekoon', '2000.00'),
(11, '30.08.2017', 'Marapana', '25000.00'),
(13, '15.08.2017', 'Weerasinghe', '5000.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
