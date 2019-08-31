-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2017 at 12:13 PM
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
-- Table structure for table `fin_chequedetails`
--

CREATE TABLE IF NOT EXISTS `fin_chequedetails` (
  `chequeId` int(11) NOT NULL AUTO_INCREMENT,
  `chequeDate` varchar(50) NOT NULL,
  `retailerId` int(11) NOT NULL,
  `retailerName` varchar(50) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`chequeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `fin_chequedetails`
--

INSERT INTO `fin_chequedetails` (`chequeId`, `chequeDate`, `retailerId`, `retailerName`, `Amount`) VALUES
(25, '08.07.2017', 1, 'Perera', '2000.00'),
(26, '25.09.2017', 3, 'Tennakoon', '5000.00'),
(27, '05.09.2017', 2, 'Nanayakkara', '3500.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
