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
-- Table structure for table `transdetails`
--

CREATE TABLE IF NOT EXISTS `transdetails` (
  `transID` int(11) NOT NULL AUTO_INCREMENT,
  `transDate` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`transID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Dumping data for table `transdetails`
--

INSERT INTO `transdetails` (`transID`, `transDate`, `type`, `description`, `amount`) VALUES
(14, '11.08.2017', 'Expense', 'Blood Donation', '200.00'),
(15, '11.08.2017', 'Expense', 'Blood Donation', '2500.00'),
(17, '11.08.2017', 'Expense', 'Religious Donation', '1000.00'),
(18, '11.08.2017', 'Expense', 'Blood Donation', '1000.00'),
(23, '11.08.2017', 'Income', 'Special Offer', '4500.00'),
(24, '11.08.2017', 'Expense', 'Blood Donation', '4356.00'),
(25, '11.08.2017', 'Expense', 'accident charges', '4500.00'),
(43, '11.08.2017', 'Income', 'Bonus income', '200.00'),
(48, '11.08.2017', 'Expense', 'donation', '500.00'),
(49, '11.08.2017', 'Expense', 'donation', '500.00'),
(57, '11.08.2017', 'Income', 'Bonus income', '500.00'),
(59, '11.08.2017', 'Expense', 'Blood Donation', '100.00'),
(60, '11.08.2017', 'Expense', 'Cnacer Donation', '100.00'),
(61, '11.08.2017', 'Income', 'Investment', '200.00'),
(62, '11.08.2017', 'Income', 'Bonus', '100.00'),
(63, '11.08.2017', 'Expense', 'Alms Giving', '200.00'),
(64, '11.08.2017', 'Income', 'Bonus Offer', '1000.00'),
(65, '11.08.2017', 'Income', 'Share holder investment', '10000.00'),
(66, '11.08.2017', 'Expense', 'Building Repair', '500.00'),
(68, '13.08.2017', 'Income', 'Claimed Discounts', '0.00'),
(69, '13.08.2017', 'Income', 'Claimed Discounts', '0.00'),
(70, '13.08.2017', 'Income', 'Claimed Discounts', '0.00'),
(71, '13.08.2017', 'Income', 'Claimed Discounts', '1.00'),
(72, '13.08.2017', 'Income', 'Claimed Discounts', '1200.00'),
(84, '13.08.2017', 'Income', 'Claimed Discounts', '1200.00'),
(85, '13.08.2017', 'Income', 'Claimed Discounts', '1200.00'),
(86, '13.08.2017', 'Income', 'Claimed Discounts', '4200.00'),
(87, '13.08.2017', 'Income', 'Claimed Discounts', '5500.00'),
(88, '13.08.2017', 'Income', 'Claimed Discounts', '0.00'),
(89, '13.08.2017', 'Income', 'Claimed Discounts', '0.00'),
(90, '13.08.2017', 'Income', 'Claimed Discounts', '0.00'),
(91, '13.08.2017', 'Income', 'Claimed Discounts', '1200.00'),
(92, '13.08.2017', 'Income', 'Claimed Discounts', '1200.00'),
(93, '15.08.2017', 'Income', 'Claimed Discounts', '3500.00'),
(94, '15.08.2017', 'Expense', 'Alms giving', '10000.00'),
(95, '17.08.2017', 'Income', 'Claimed Discounts', '0.00'),
(96, '17.08.2017', 'Income', 'Claimed Discounts', '0.00'),
(97, '17.08.2017', 'Income', 'Claimed Discounts', '0.00'),
(98, '17.08.2017', 'Income', 'Siriwardhana', '2300.00'),
(99, '17.08.2017', 'Income', 'Croos', '2000.00'),
(100, '22.08.2017', 'Income', 'Silva', '2500.00'),
(101, '22.08.2017', 'Income', 'Claimed Discounts', '2500.00'),
(102, '22.08.2017', 'Income', 'Additional investment', '5000.00'),
(103, '22.08.2017', 'Expense', 'Building Repair', '5000.00'),
(104, '22.08.2017', 'Income', 'Claimed Discounts', '2000.00'),
(105, '22.08.2017', 'Income', 'Veeraperuma', '3400.00'),
(106, '31.08.2017', 'Income', 'Additional investment', '15000.00'),
(107, '31.08.2017', 'Income', 'Silva', '2500.00'),
(108, '31.08.2017', 'Income', 'Claimed Discounts', '5600.00'),
(109, '31.08.2017', 'Expense', 'Building Repair', '1000.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
