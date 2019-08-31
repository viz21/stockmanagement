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
-- Table structure for table `fin_supplierpayment`
--

CREATE TABLE IF NOT EXISTS `fin_supplierpayment` (
  `supTransId` int(11) NOT NULL AUTO_INCREMENT,
  `supplierName` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `Id` int(11) NOT NULL,
  `method` varchar(50) NOT NULL,
  PRIMARY KEY (`supTransId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `fin_supplierpayment`
--

INSERT INTO `fin_supplierpayment` (`supTransId`, `supplierName`, `price`, `Id`, `method`) VALUES
(1, 'Munchee', 2000, 1, 'Cash'),
(2, 'Munchee', 2000, 1, 'Cash'),
(3, 'Fonterra', 5500, 2, 'Cheque'),
(7, 'Munchee', 4999, 99, ''),
(8, 'Munchee', 4999, 69, ''),
(12, 'Fonterra', 5600, 6, ''),
(13, 'Munchee', 322, 77, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
