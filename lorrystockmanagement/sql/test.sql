-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2017 at 06:41 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `damage`
--

CREATE TABLE `damage` (
  `damageid` int(11) NOT NULL,
  `lorrynumber` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `quntity` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `damage`
--

INSERT INTO `damage` (`damageid`, `lorrynumber`, `productname`, `quntity`) VALUES
(1, 'lorry03', 'choclatebiscuit', '10'),
(2, 'lorry2', 'munchee', '10'),
(3, 'lorry04', 'biscuit', '15');

-- --------------------------------------------------------

--
-- Table structure for table `load_lorry_qty`
--

CREATE TABLE `load_lorry_qty` (
  `loadID` int(11) NOT NULL,
  `lorryID` varchar(255) NOT NULL,
  `lorryNumber` varchar(255) NOT NULL,
  `repID` varchar(255) NOT NULL,
  `stock_details` varchar(3000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `load_lorry_qty`
--

INSERT INTO `load_lorry_qty` (`loadID`, `lorryID`, `lorryNumber`, `repID`, `stock_details`) VALUES
(2, '8', 'lorry04', '2', '[{"temp_id":"1","productname":"choclate","quntity":"55","discount":"90","sellingprice":"200"},{"temp_id":"2","productname":"fghf","quntity":"34","discount":"3545","sellingprice":"34"},{"temp_id":"3","productname":"choclate","quntity":"1","discount":"5","sellingprice":"15"},{"temp_id":"4","productname":"munchee puff","quntity":"2","discount":"2","sellingprice":"22"},{"temp_id":"5","productname":"munchee puff","quntity":"1","discount":"2","sellingprice":"22"},{"temp_id":"6","productname":"choclate","quntity":"1","discount":"5","sellingprice":"15"},{"temp_id":"7","productname":"choclate","quntity":"1","discount":"5","sellingprice":"15"},{"temp_id":"8","productname":"munchee puff","quntity":"2","discount":"2","sellingprice":"22"},{"temp_id":"9","productname":"choclate","quntity":"1","discount":"5","sellingprice":"15"},{"temp_id":"10","productname":"choclate","quntity":"2","discount":"5","sellingprice":"15"}]'),
(3, '1', 'lorry2', '2', '[{"temp_id":"11","productname":"munchee puff","quntity":"2","discount":"2","sellingprice":"22"},{"temp_id":"12","productname":"choclate","quntity":"1","discount":"5","sellingprice":"15"},{"temp_id":"13","productname":"munchee puff","quntity":"5","discount":"2","sellingprice":"22"}]'),
(4, '8', 'lorry04', '1', '[{"temp_id":"14","productname":"munchee puff","quntity":"2","discount":"2","sellingprice":"22"},{"temp_id":"15","productname":"choclate","quntity":"1","discount":"5","sellingprice":"15"},{"temp_id":"16","productname":"anchor butter","quntity":"2","discount":"15","sellingprice":"165"}]'),
(5, '1', 'lorry2', '1', '[{"temp_id":"17","productname":"choclate","quntity":"1","discount":"5","sellingprice":"15"},{"temp_id":"18","productname":"anchor butter","quntity":"2","discount":"15","sellingprice":"165"},{"temp_id":"19","productname":"munchee puff","quntity":"4","discount":"2","sellingprice":"22"}]'),
(6, '1', 'lorry2', '1', '[{"temp_id":"20","productname":"choclate","quntity":"12","discount":"5","sellingprice":"15"},{"temp_id":"21","productname":"munchee puff","quntity":"3","discount":"2","sellingprice":"22"},{"temp_id":"22","productname":"anchor butter","quntity":"12","discount":"15","sellingprice":"165"}]'),
(7, '8', 'lorry04', '1', '[{"temp_id":"23","productname":"anchor butter","quntity":"12","discount":"15","sellingprice":"165"},{"temp_id":"24","productname":"choclate","quntity":"5","discount":"5","sellingprice":"15"},{"temp_id":"25","productname":"choclate","quntity":"7","discount":"5","sellingprice":"15"}]'),
(8, '8', 'lorry04', '1', '[{"temp_id":"26","productname":"munchee puff","quntity":"3","discount":"2","sellingprice":"22"}]'),
(9, '8', 'lorry04', '1', '[{"temp_id":"27","productname":"munchee puff","quntity":"5","discount":"2","sellingprice":"22"}]'),
(10, '8', 'lorry04', '1', '[{"temp_id":"28","productname":"anchor butter","quntity":"2","discount":"15","sellingprice":"165"}]'),
(11, '1', 'lorry2', '1', '[{"temp_id":"29","productname":"anchor butter","quntity":"7","discount":"15","sellingprice":"165"},{"temp_id":"30","productname":"anchor butter","quntity":"7","discount":"15","sellingprice":"165"},{"temp_id":"31","productname":"choclate","quntity":"4","discount":"5","sellingprice":"15"}]'),
(12, '1', 'lorry2', '2', '[{"temp_id":"32","productname":"anchor butter","quntity":"5","discount":"15","sellingprice":"165"},{"temp_id":"33","productname":"munchee puff","quntity":"9","discount":"2","sellingprice":"22"}]'),
(13, '7', 'lorry03', '1', '[{"temp_id":"34","productname":"anchor butter","quntity":"6","discount":"15","sellingprice":"165"},{"temp_id":"35","productname":"munchee puff","quntity":"9","discount":"2","sellingprice":"22"}]'),
(14, '7', 'lorry03', '1', '[{"temp_id":"36","productname":"choclate","quntity":"2","discount":"5","sellingprice":"15"},{"temp_id":"37","productname":"choclate","quntity":"2","discount":"5","sellingprice":"15"},{"temp_id":"38","productname":"anchor butter","quntity":"1","discount":"15","sellingprice":"165"},{"temp_id":"39","productname":"choclate","quntity":"3","discount":"5","sellingprice":"15"},{"temp_id":"40","productname":"anchor butter","quntity":"7","discount":"15","sellingprice":"165"}]'),
(15, '8', 'lorry04', '2', '[{"temp_id":"41","productname":"anchor butter","quntity":"1","discount":"15","sellingprice":"165"}]'),
(16, '7', 'lorry03', '2', '[{"temp_id":"42","productname":"anchor butter","quntity":"5","discount":"15","sellingprice":"165"},{"temp_id":"43","productname":"anchor butter","quntity":"5","discount":"15","sellingprice":"165"},{"temp_id":"44","productname":"munchee puff","quntity":"4","discount":"2","sellingprice":"22"},{"temp_id":"45","productname":"munchee puff","quntity":"4","discount":"2","sellingprice":"22"},{"temp_id":"46","productname":"munchee puff","quntity":"4","discount":"2","sellingprice":"22"},{"temp_id":"47","productname":"munchee puff","quntity":"4","discount":"2","sellingprice":"22"}]');

-- --------------------------------------------------------

--
-- Table structure for table `lorry`
--

CREATE TABLE `lorry` (
  `lorryid` int(11) NOT NULL,
  `lorrynumber` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lorry`
--

INSERT INTO `lorry` (`lorryid`, `lorrynumber`) VALUES
(1, 'lorry2'),
(8, 'lorry04'),
(7, 'lorry03');

-- --------------------------------------------------------

--
-- Table structure for table `rep`
--

CREATE TABLE `rep` (
  `repId` int(11) NOT NULL,
  `repName` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rep`
--

INSERT INTO `rep` (`repId`, `repName`) VALUES
(1, 'nim'),
(2, 'jim');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stockID` int(255) NOT NULL,
  `supplierID` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `stockName` varchar(255) NOT NULL,
  `purchasing_price` double NOT NULL,
  `disscount` varchar(255) NOT NULL,
  `diss_value` double NOT NULL,
  `selling_price` double NOT NULL,
  `qty` double NOT NULL,
  `return_item` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stockID`, `supplierID`, `date`, `stockName`, `purchasing_price`, `disscount`, `diss_value`, `selling_price`, `qty`, `return_item`) VALUES
(1, '12', '323', 'choclate', 10, '50%', 5, 15, 20, 0),
(2, '12', '23', 'munchee puff', 20, '10%', 2, 22, 10, 0),
(3, '123', '222', 'anchor butter', 150, '10%', 15, 165, 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `templorrystck`
--

CREATE TABLE `templorrystck` (
  `temp_id` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `quntity` float NOT NULL,
  `discount` float NOT NULL,
  `sellingprice` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templorrystck`
--

INSERT INTO `templorrystck` (`temp_id`, `productname`, `quntity`, `discount`, `sellingprice`) VALUES
(48, 'choclate', 8, 5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `unload_lorry_qty`
--

CREATE TABLE `unload_lorry_qty` (
  `unloadID` int(11) NOT NULL,
  `lorryID` varchar(255) NOT NULL,
  `lorryNumber` varchar(255) NOT NULL,
  `repID` varchar(255) NOT NULL,
  `stock_details` varchar(3000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unload_lorry_qty`
--

INSERT INTO `unload_lorry_qty` (`unloadID`, `lorryID`, `lorryNumber`, `repID`, `stock_details`) VALUES
(3, '1', 'lorry2', '2', '[{"temp_id":"11","productname":"munchee puff","quntity":"2","discount":"2","sellingprice":"22"},{"temp_id":"12","productname":"choclate","quntity":"1","discount":"5","sellingprice":"15"},{"temp_id":"13","productname":"munchee puff","quntity":"5","discount":"2","sellingprice":"22"}]'),
(2, '8', 'lorry04', '2', '[{"temp_id":"1","productname":"choclate","quntity":"55","discount":"90","sellingprice":"200"},{"temp_id":"2","productname":"fghf","quntity":"34","discount":"3545","sellingprice":"34"},{"temp_id":"3","productname":"choclate","quntity":"1","discount":"5","sellingprice":"15"},{"temp_id":"4","productname":"munchee puff","quntity":"2","discount":"2","sellingprice":"22"},{"temp_id":"5","productname":"munchee puff","quntity":"1","discount":"2","sellingprice":"22"},{"temp_id":"6","productname":"choclate","quntity":"1","discount":"5","sellingprice":"15"},{"temp_id":"7","productname":"choclate","quntity":"1","discount":"5","sellingprice":"15"},{"temp_id":"8","productname":"munchee puff","quntity":"2","discount":"2","sellingprice":"22"},{"temp_id":"9","productname":"choclate","quntity":"1","discount":"5","sellingprice":"15"},{"temp_id":"10","productname":"choclate","quntity":"2","discount":"5","sellingprice":"15"}]'),
(4, '8', 'lorry04', '1', '[{"temp_id":"14","productname":"munchee puff","quntity":"2","discount":"2","sellingprice":"22"},{"temp_id":"15","productname":"choclate","quntity":"1","discount":"5","sellingprice":"15"},{"temp_id":"16","productname":"anchor butter","quntity":"2","discount":"15","sellingprice":"165"}]'),
(5, '1', 'lorry2', '1', '[{"temp_id":"17","productname":"choclate","quntity":"1","discount":"5","sellingprice":"15"},{"temp_id":"18","productname":"anchor butter","quntity":"2","discount":"15","sellingprice":"165"},{"temp_id":"19","productname":"munchee puff","quntity":"4","discount":"2","sellingprice":"22"}]'),
(6, '1', 'lorry2', '1', '[{"temp_id":"20","productname":"choclate","quntity":"12","discount":"5","sellingprice":"15"},{"temp_id":"21","productname":"munchee puff","quntity":"3","discount":"2","sellingprice":"22"},{"temp_id":"22","productname":"anchor butter","quntity":"12","discount":"15","sellingprice":"165"}]'),
(9, '8', 'lorry04', '1', '[{"temp_id":"27","productname":"munchee puff","quntity":"5","discount":"2","sellingprice":"22"}]'),
(10, '8', 'lorry04', '1', '[{"temp_id":"28","productname":"anchor butter","quntity":"2","discount":"15","sellingprice":"165"}]'),
(11, '1', 'lorry2', '1', '[{"temp_id":"29","productname":"anchor butter","quntity":"7","discount":"15","sellingprice":"165"},{"temp_id":"30","productname":"anchor butter","quntity":"7","discount":"15","sellingprice":"165"},{"temp_id":"31","productname":"choclate","quntity":"4","discount":"5","sellingprice":"15"}]'),
(12, '1', 'lorry2', '2', '[{"temp_id":"32","productname":"anchor butter","quntity":"5","discount":"15","sellingprice":"165"},{"temp_id":"33","productname":"munchee puff","quntity":"9","discount":"2","sellingprice":"22"}]'),
(13, '7', 'lorry03', '1', '[{"temp_id":"34","productname":"anchor butter","quntity":"6","discount":"15","sellingprice":"165"},{"temp_id":"35","productname":"munchee puff","quntity":"9","discount":"2","sellingprice":"22"}]'),
(14, '7', 'lorry03', '1', '[{"temp_id":"36","productname":"choclate","quntity":"2","discount":"5","sellingprice":"15"},{"temp_id":"37","productname":"choclate","quntity":"2","discount":"5","sellingprice":"15"},{"temp_id":"38","productname":"anchor butter","quntity":"1","discount":"15","sellingprice":"165"},{"temp_id":"39","productname":"choclate","quntity":"3","discount":"5","sellingprice":"15"},{"temp_id":"40","productname":"anchor butter","quntity":"7","discount":"15","sellingprice":"165"}]'),
(15, '8', 'lorry04', '2', '[{"temp_id":"41","productname":"anchor butter","quntity":"1","discount":"15","sellingprice":"165"}]'),
(16, '7', 'lorry03', '2', '[{"temp_id":"42","productname":"anchor butter","quntity":"5","discount":"15","sellingprice":"165"},{"temp_id":"43","productname":"anchor butter","quntity":"5","discount":"15","sellingprice":"165"},{"temp_id":"44","productname":"munchee puff","quntity":"4","discount":"2","sellingprice":"22"},{"temp_id":"45","productname":"munchee puff","quntity":"4","discount":"2","sellingprice":"22"},{"temp_id":"46","productname":"munchee puff","quntity":"4","discount":"2","sellingprice":"22"},{"temp_id":"47","productname":"munchee puff","quntity":"4","discount":"2","sellingprice":"22"}]');

-- --------------------------------------------------------

--
-- Table structure for table `unload_quntity`
--

CREATE TABLE `unload_quntity` (
  `unload_id` int(10) NOT NULL,
  `lorrynumber` varchar(255) NOT NULL,
  `stockID` varchar(255) NOT NULL,
  `stockName` varchar(255) NOT NULL,
  `quntity` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unload_quntity`
--

INSERT INTO `unload_quntity` (`unload_id`, `lorrynumber`, `stockID`, `stockName`, `quntity`) VALUES
(1, 'lorry2', 'st01', 'choclate', 15),
(2, 'lorry03', 'st02', 'munchee puff', 12),
(3, 'lorry04', 'st03', 'anchor butter', 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `damage`
--
ALTER TABLE `damage`
  ADD PRIMARY KEY (`damageid`);

--
-- Indexes for table `load_lorry_qty`
--
ALTER TABLE `load_lorry_qty`
  ADD PRIMARY KEY (`loadID`);

--
-- Indexes for table `lorry`
--
ALTER TABLE `lorry`
  ADD PRIMARY KEY (`lorryid`);

--
-- Indexes for table `rep`
--
ALTER TABLE `rep`
  ADD PRIMARY KEY (`repId`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stockID`);

--
-- Indexes for table `templorrystck`
--
ALTER TABLE `templorrystck`
  ADD PRIMARY KEY (`temp_id`);

--
-- Indexes for table `unload_lorry_qty`
--
ALTER TABLE `unload_lorry_qty`
  ADD PRIMARY KEY (`unloadID`);

--
-- Indexes for table `unload_quntity`
--
ALTER TABLE `unload_quntity`
  ADD PRIMARY KEY (`unload_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `damage`
--
ALTER TABLE `damage`
  MODIFY `damageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `load_lorry_qty`
--
ALTER TABLE `load_lorry_qty`
  MODIFY `loadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `lorry`
--
ALTER TABLE `lorry`
  MODIFY `lorryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `rep`
--
ALTER TABLE `rep`
  MODIFY `repId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stockID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `templorrystck`
--
ALTER TABLE `templorrystck`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `unload_lorry_qty`
--
ALTER TABLE `unload_lorry_qty`
  MODIFY `unloadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `unload_quntity`
--
ALTER TABLE `unload_quntity`
  MODIFY `unload_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
