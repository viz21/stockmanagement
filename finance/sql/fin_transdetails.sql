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
-- Table structure for table `fin_transdetails`
--

CREATE TABLE IF NOT EXISTS `fin_transdetails` (
  `transID` int(11) NOT NULL AUTO_INCREMENT,
  `transDate` varchar(50) NOT NULL,
  `transactionDate` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`transID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=177 ;

--
-- Dumping data for table `fin_transdetails`
--

INSERT INTO `fin_transdetails` (`transID`, `transDate`, `transactionDate`, `type`, `description`, `amount`) VALUES
(14, '11.08.2017', '11.08.2017', 'Expense', 'Blood Donation', '200.00'),
(15, '11.08.2017', '11.08.2017', 'Expense', 'Blood Donation', '2500.00'),
(43, '11.08.2017', '11.08.2017', 'Income', 'Bonus income', '200.00'),
(49, '11.08.2017', '11.08.2017', 'Expense', 'donation', '500.00'),
(57, '11.08.2017', '11.08.2017', 'Income', 'Bonus income', '500.00'),
(59, '11.08.2017', '11.08.2017', 'Expense', 'Blood Donation', '100.00'),
(61, '11.08.2017', '11.08.2017', 'Income', 'Investment', '200.00'),
(62, '11.08.2017', '09.07.2017', 'Income', 'Bonus', '100.00'),
(63, '11.08.2017', '11.08.2017', 'Expense', 'Alms Giving', '200.00'),
(64, '11.08.2017', '11.08.2017', 'Income', 'Bonus Offer', '1000.00'),
(65, '11.08.2017', '11.08.2017', 'Income', 'Share holder investment', '10000.00'),
(66, '11.08.2017', '11.08.2017', 'Expense', 'Building Repair', '500.00'),
(71, '13.08.2017', '10.07.2017', 'Income', 'Claimed Discounts', '1.00'),
(72, '13.08.2017', '10.08.2017', 'Income', 'Claimed Discounts', '1200.00'),
(170, '23.09.2017', '23.09.2017', 'Income', 'Perera', '1500.00'),
(173, '23.09.2017', '05.08.2017', 'Income', 'Nanayakkara', '5000.00'),
(174, '23.09.2017', '18.06.2017', 'Income', 'Tennakoon', '2500.00'),
(176, '23.09.2017', '17.09.2017', 'Income', 'Claimed Discounts : yesil', '0.80');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
