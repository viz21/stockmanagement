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
-- Table structure for table `fin_dailybalance`
--

CREATE TABLE IF NOT EXISTS `fin_dailybalance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bDate` varchar(50) NOT NULL,
  `dailyIncome` decimal(10,2) NOT NULL,
  `dailyExpense` decimal(10,2) NOT NULL,
  `netBalance` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `fin_dailybalance`
--

INSERT INTO `fin_dailybalance` (`id`, `bDate`, `dailyIncome`, `dailyExpense`, `netBalance`) VALUES
(1, '01.08.2017', '5000000.00', '0.00', '5000000.00'),
(12, '02.08.2017', '1100.00', '200.00', '5000900.00'),
(13, '11.08.2017', '10000.00', '500.00', '5010400.00'),
(15, '13.08.2017', '2400.00', '0.00', '5018300.00'),
(16, '15.08.2017', '3500.00', '10000.00', '5011800.00'),
(17, '17.08.2017', '4300.00', '0.00', '5016100.00'),
(18, '22.08.2017', '15400.00', '5000.00', '5026500.00'),
(19, '31.08.2017', '23100.00', '1000.00', '5048600.00'),
(20, '01.09.2017', '25000.00', '3000.00', '5070600.00'),
(21, '12.09.2017', '42000.00', '1000.00', '5111600.00'),
(22, '13.09.2017', '3500.00', '1000.00', '2500.00'),
(23, '14.09.2017', '24800.00', '0.00', '27300.00'),
(24, '15.09.2017', '4900.00', '0.00', '4900.00'),
(27, '17.09.2017', '0.00', '789.00', '-789.00'),
(29, '2017-09-01', '0.00', '999.00', '-2787.00'),
(30, '2017-09-07', '0.00', '992.00', '-3779.00'),
(31, '2017-08-18', '0.00', '2000.00', '-5779.00'),
(32, '23.09.2017', '46707.80', '1010.00', '39918.80');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
