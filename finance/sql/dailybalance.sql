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
-- Table structure for table `dailybalance`
--

CREATE TABLE IF NOT EXISTS `dailybalance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bDate` varchar(50) NOT NULL,
  `dailyIncome` decimal(10,2) NOT NULL,
  `dailyExpense` decimal(10,2) NOT NULL,
  `netBalance` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `dailybalance`
--

INSERT INTO `dailybalance` (`id`, `bDate`, `dailyIncome`, `dailyExpense`, `netBalance`) VALUES
(1, '01.08.2017', '5000000.00', '0.00', '5000000.00'),
(12, '02.08.2017', '1100.00', '200.00', '5000900.00'),
(13, '11.08.2017', '10000.00', '500.00', '5010400.00'),
(15, '13.08.2017', '2400.00', '0.00', '5018300.00'),
(16, '15.08.2017', '3500.00', '10000.00', '5011800.00'),
(17, '17.08.2017', '4300.00', '0.00', '5016100.00'),
(18, '22.08.2017', '15400.00', '5000.00', '5026500.00'),
(19, '31.08.2017', '23100.00', '1000.00', '5048600.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
