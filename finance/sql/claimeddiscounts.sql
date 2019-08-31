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
-- Table structure for table `claimeddiscounts`
--

CREATE TABLE IF NOT EXISTS `claimeddiscounts` (
  `claimId` int(11) NOT NULL AUTO_INCREMENT,
  `Date` varchar(50) NOT NULL,
  `supplierName` varchar(50) NOT NULL,
  `discountAmount` decimal(10,2) NOT NULL,
  `claimedStatus` varchar(20) NOT NULL,
  PRIMARY KEY (`claimId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `claimeddiscounts`
--

INSERT INTO `claimeddiscounts` (`claimId`, `Date`, `supplierName`, `discountAmount`, `claimedStatus`) VALUES
(8, '13.08.2017', 'Munchee', '2500.00', 'Not Claimed'),
(9, '05.08.2016', 'Fonterra', '1250.00', 'Not Claimed'),
(10, '20.08.2017', 'Fonterra', '1000.00', 'Not Claimed'),
(11, '18.08.2017', 'Fonterra', '800.00', 'Not Claimed'),
(17, '01.08.2017', 'Munchee', '1200.00', 'Not Claimed');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
