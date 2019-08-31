-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2017 at 06:49 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventory_mng`
--

-- --------------------------------------------------------

--
-- Table structure for table `damage_items`
--

CREATE TABLE IF NOT EXISTS `damage_items` (
  `dmg_no` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(50) NOT NULL,
  `stockName` varchar(150) NOT NULL,
  `dmg_qty` varchar(250) NOT NULL,
  `lorryID` varchar(150) NOT NULL,
  PRIMARY KEY (`dmg_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `damage_items`
--

INSERT INTO `damage_items` (`dmg_no`, `date`, `stockName`, `dmg_qty`, `lorryID`) VALUES
(1, '2017/8/20', 'choco', '5', '001'),
(2, '2017-04-22', 'ginger', '600', '002');

-- --------------------------------------------------------

--
-- Table structure for table `return`
--

CREATE TABLE IF NOT EXISTS `return` (
  `retNo` int(11) NOT NULL DEFAULT '0',
  `stockName` varchar(150) NOT NULL,
  `LorryID` varchar(100) NOT NULL,
  `returnQty` double NOT NULL,
  PRIMARY KEY (`retNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return`
--

INSERT INTO `return` (`retNo`, `stockName`, `LorryID`, `returnQty`) VALUES
(1, 'choco', '001', 10),
(2, 'ringo', '002', 5);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `stockID` int(150) NOT NULL AUTO_INCREMENT,
  `supplierName` varchar(150) NOT NULL,
  `ddate` varchar(50) NOT NULL,
  `stockName` varchar(150) NOT NULL,
  `purchasing_price` decimal(10,2) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `diss_value` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `qty` double NOT NULL,
  PRIMARY KEY (`stockID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stockID`, `supplierName`, `ddate`, `stockName`, `purchasing_price`, `discount`, `diss_value`, `selling_price`, `qty`) VALUES
(7, 'sami', '2017-08-19', 'rrr', '1.00', '10', '0.10', '1.10', 100),
(8, 'chamma', '2017-01-10', 'potato', '20000.00', '10', '2000.00', '22000.00', 600);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplierID` int(11) NOT NULL DEFAULT '0',
  `supplierName` varchar(150) NOT NULL,
  PRIMARY KEY (`supplierID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierID`, `supplierName`) VALUES
(1, 'sami'),
(2, 'chamma'),
(3, 'bindu'),
(4, 'champ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
