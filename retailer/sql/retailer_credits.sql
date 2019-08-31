-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2017 at 04:21 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stock_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `retailer_credits`
--

CREATE TABLE IF NOT EXISTS `retailer_credits` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `RetailerID` int(11) NOT NULL,
  `Credits` double NOT NULL,
  `Date_` varchar(50) NOT NULL,
  `Deadline` varchar(50) NOT NULL,
  `BList` int(11) NOT NULL,
  `Count` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `retailer_credits`
--

INSERT INTO `retailer_credits` (`Id`, `RetailerID`, `Credits`, `Date_`, `Deadline`, `BList`, `Count`) VALUES
(2, 18, 3456, '14.08.2017', '21.09.2017', 0, 1),
(8, 19, 2490, '13.08.2017', '20.08.2017', 1, 3),
(9, 20, 5600, '14.08.2017', '21.09.2017', 0, 1),
(10, 21, 4000, '15.08.2017', '22.08.2017', 1, 3),
(12, 23, 3450, '14.08.2017', '21.09.2017', 0, 1),
(13, 30, 2300, '15.08.2017', '22.08.2017', 0, 2),
(14, 45, 5670, '20.08.2017', '27.08.2017', 1, 3),
(15, 48, 7800, '01.09.2017', '08.09.2017', 0, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
