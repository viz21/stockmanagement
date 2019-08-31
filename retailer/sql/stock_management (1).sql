-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2017 at 10:46 PM
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
-- Table structure for table `retailerdetails`
--

CREATE TABLE IF NOT EXISTS `retailerdetails` (
  `RetailerID` int(11) NOT NULL AUTO_INCREMENT,
  `RetailerName` varchar(50) NOT NULL,
  `ShopName` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `CoNumber` int(11) NOT NULL,
  `MobNumber` int(11) NOT NULL,
  `Email` varchar(20) NOT NULL,
  PRIMARY KEY (`RetailerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `retailerdetails`
--

INSERT INTO `retailerdetails` (`RetailerID`, `RetailerName`, `ShopName`, `Address`, `CoNumber`, `MobNumber`, `Email`) VALUES
(19, 'tharuka nanayakkara', 'tharuka group', 'wattala', 1234567890, 0, 'tharukananayakkara@y'),
(20, 'tharuka nana', 'tharuka company', 'wattala', 1234567890, 1234567890, 'thra@yahoo.com'),
(21, 'chathu', 'chathusara and sons', 'gampaha', 2147483647, 2147483647, 'ch@gmail.com'),
(22, 'tharuuuuu nanayakkara', 'tharuka group', 'fsf', 1234567890, 1234567890, 'thra@yahoo.com'),
(23, 'Kamal Perera', 'Top shop', 'Malabe', 2147483647, 2147483647, 'kamal@y.com'),
(24, 'Amal DeSilva', 'Good Food Store', 'Colombo 10', 2147483647, 2147483647, 'amal@y.com'),
(25, 'Rahul Weerasekara', 'Hill Stores', 'Kandy', 1234567891, 772354167, 'Ra@ymail.com'),
(26, 'udula siriwardhana', 'ABC shop', 'kotte', 2147483647, 1245369803, 'udu@gmail.com'),
(27, 'Chathu Tennakoon', 'chathu and sons', 'Galle', 2147483647, 765428791, 'ch@gmail.com'),
(28, 'Jhon Silva', 'Silvass', 'Maradhana', 2147483647, 712345627, 'jhon@j.com'),
(29, 'sanila', 'sani', 'kaduwwela', 1237896540, 1478529630, 's@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `retailer_cheque`
--

CREATE TABLE IF NOT EXISTS `retailer_cheque` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `RetailerID` int(11) NOT NULL,
  `Date_` int(11) NOT NULL,
  `Credits` decimal(10,2) NOT NULL,
  `Method` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `retailer_credits`
--

CREATE TABLE IF NOT EXISTS `retailer_credits` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `RetailerID` int(11) NOT NULL,
  `Credits` decimal(10,2) NOT NULL,
  `Date_` varchar(50) NOT NULL,
  `Deadline` varchar(50) NOT NULL,
  `BList` int(11) NOT NULL DEFAULT '0',
  `Count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `retailer_credits`
--

INSERT INTO `retailer_credits` (`Id`, `RetailerID`, `Credits`, `Date_`, `Deadline`, `BList`, `Count`) VALUES
(8, 19, '2490.00', '13.08.2017', '20.08.2017', 0, 3),
(9, 20, '5600.00', '14.08.2017', '21.09.2017', 0, 1),
(10, 21, '4000.00', '15.08.2017', '22.08.2017', 0, 3),
(12, 23, '3450.00', '14.08.2017', '21.09.2017', 0, 3),
(13, 24, '2300.00', '15.08.2017', '22.08.2017', 0, 2),
(14, 25, '5670.00', '20.08.2017', '27.08.2017', 1, 3),
(15, 26, '7800.00', '01.09.2017', '08.09.2017', 0, 2),
(16, 27, '55670.00', '15.08.2017', '22.08.2017', 1, 3),
(18, 28, '1000.00', '17.08.2017', '24.08.2017', 0, 1),
(22, 29, '2000.00', '17.08.2017', '24.08.2017', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `retailer_payment`
--

CREATE TABLE IF NOT EXISTS `retailer_payment` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `RetailerID` int(11) NOT NULL,
  `SalesID` int(11) NOT NULL,
  `Date_` varchar(50) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `PaidAmount` decimal(10,2) NOT NULL,
  `Discount` decimal(10,2) NOT NULL,
  `Method` varchar(300) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `retailer_payment`
--

INSERT INTO `retailer_payment` (`Id`, `RetailerID`, `SalesID`, `Date_`, `Price`, `PaidAmount`, `Discount`, `Method`) VALUES
(1, 19, 2, '17.08.2017', '2500.00', '2520.00', '0.00', 'credit'),
(2, 20, 1, '19.08.2017', '45000.00', '40000.00', '0.00', 'credit'),
(3, 21, 1, '20.08.2017', '45000.00', '40000.00', '0.00', 'credit'),
(4, 21, 2, '20.08.2017', '45000.00', '40000.00', '500.00', 'credit'),
(5, 23, 4, '20.08.2017', '45000.00', '40000.00', '300.00', 'credit'),
(6, 23, 1, '21.08.2017', '45000.00', '40000.00', '0.00', 'credit'),
(7, 24, 1, '22.08.2017', '45000.00', '40000.00', '0.00', 'credit'),
(8, 19, 1, '21.08.2017', '45000.00', '40000.00', '0.00', 'credit'),
(9, 25, 3, '23.08.2017', '50000.00', '40000.00', '1000.00', 'credit'),
(10, 26, 5, '25.08.2017', '5000.00', '4000.00', '100.00', 'credit'),
(11, 27, 2, '25.08.2017', '4908.00', '2000.00', '340.00', 'credit'),
(12, 20, 1, '25.08.2017', '45000.00', '40000.00', '0.00', 'credit'),
(13, 28, 4, '26.08.2017', '5000.00', '400.00', '600.00', 'credit'),
(26, 2, 2, '17.08.2017', '4500.50', '3000.00', '50.00', 'credit'),
(27, 2, 2, '17.08.2017', '4500.50', '3000.00', '50.00', 'credit'),
(28, 0, 0, '20.08.2017', '0.00', '0.00', '0.00', 'credit');

-- --------------------------------------------------------

--
-- Table structure for table `retailer_stocks`
--

CREATE TABLE IF NOT EXISTS `retailer_stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stocks` varchar(50000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `retailer_stocks`
--

INSERT INTO `retailer_stocks` (`id`, `stocks`) VALUES
(1, '[{"id":"10","stockId":"1","stockName":"Munchee Chocolate Biscuits","quantity":"50","unitPrice":"25.00","totPrice":"1250.00","discPrice":"350.00"},{"id":"11","stockId":"1","stockName":"Munchee Chocolate Biscuits","quantity":"50","unitPrice":"25.00","totPrice":"1250.00","discPrice":"350.00"}]'),
(2, '[{"id":"12","stockId":"2","stockName":"Munchee Cream Biscuits","quantity":"5","unitPrice":"75.00","totPrice":"375.00","discPrice":"32.50"},{"id":"13","stockId":"5","stockName":"Anchor butter","quantity":"6","unitPrice":"82.00","totPrice":"492.00","discPrice":"15.00"}]'),
(3, '[{"id":"14","stockId":"2","stockName":"Munchee Cream Biscuits","quantity":"5","unitPrice":"75.00","totPrice":"375.00","discPrice":"32.50"},{"id":"15","stockId":"2","stockName":"Munchee Cream Biscuits","quantity":"6","unitPrice":"75.00","totPrice":"450.00","discPrice":"39.00"},{"id":"16","stockId":"4","stockName":"Anchor Milk powder","quantity":"2","unitPrice":"150.00","totPrice":"300.00","discPrice":"20.00"}]'),
(4, '[{"id":"17","stockId":"4","stockName":"Anchor Milk powder","quantity":"2","unitPrice":"150.00","totPrice":"300.00","discPrice":"20.00"},{"id":"18","stockId":"4","stockName":"Anchor Milk powder","quantity":"2","unitPrice":"150.00","totPrice":"300.00","discPrice":"20.00"}]'),
(5, '[{"id":"19","stockId":"1","stockName":"Munchee Chocolate Biscuits","quantity":"5","unitPrice":"25.00","totPrice":"125.00","discPrice":"35.00"},{"id":"20","stockId":"3","stockName":"Munchee Lemon Puff","quantity":"2","unitPrice":"100.00","totPrice":"200.00","discPrice":"21.00"}]'),
(6, '[{"id":"22","stockId":"2","stockName":"Munchee Cream Biscuits","quantity":"2","unitPrice":"75.00","totPrice":"150.00","discPrice":"13.00"}]');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
