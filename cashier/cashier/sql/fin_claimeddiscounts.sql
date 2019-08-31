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
-- Table structure for table `fin_claimeddiscounts`
--

CREATE TABLE IF NOT EXISTS `fin_claimeddiscounts` (
  `claimId` int(11) NOT NULL AUTO_INCREMENT,
  `claimDate` varchar(50) NOT NULL,
  `supplierName` varchar(50) NOT NULL,
  `discountAmount` decimal(10,2) NOT NULL,
  `claimedStatus` varchar(20) NOT NULL,
  PRIMARY KEY (`claimId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fin_claimeddiscounts`
--

INSERT INTO `fin_claimeddiscounts` (`claimId`, `claimDate`, `supplierName`, `discountAmount`, `claimedStatus`) VALUES
(9, '05.08.2016', 'Fonterra', '1281.20', 'Not Claimed'),
(16, '05.09.2017', 'Silva', '630.00', 'Not Claimed'),
(34, '17.09.2017', 'Perera', '10.00', 'Not Claimed');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
