-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2019 at 06:05 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `addvehicle`
--

CREATE TABLE `addvehicle` (
  `vehicleid` int(11) NOT NULL,
  `vehiclenum` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `size` varchar(50) NOT NULL,
  `fueltype` varchar(50) NOT NULL,
  `servicemileage` int(100) NOT NULL,
  `status` int(11) NOT NULL,
  `currentmileage` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addvehicle`
--

INSERT INTO `addvehicle` (`vehicleid`, `vehiclenum`, `type`, `size`, `fueltype`, `servicemileage`, `status`, `currentmileage`) VALUES
(2, 'HQ-4848', 'Lorry', 'Medium', 'Diesel', 45000, 0, 42000),
(3, 'GQ-4919', 'Lorry', 'Medium', 'Diesel', 10000, 0, 56000);

-- --------------------------------------------------------

--
-- Table structure for table `auth_details`
--

CREATE TABLE `auth_details` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `empId` int(11) NOT NULL,
  `empname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_details`
--

INSERT INTO `auth_details` (`id`, `username`, `password`, `type`, `empId`, `empname`) VALUES
(1, 'admin', 'admin', 1, 0, 'Shavin'),
(63, 'thisura', 'thisura', 6, 10, 'Thisura Daksith'),
(66, 'shavin', 'shavin', 3, 13, 'shavin Dimasha'),
(67, 'kasun', 'kasun', 5, 14, 'Kasun Perera'),
(68, 'vishwa', 'vishwa', 2, 15, 'Vishwa Perera'),
(69, 'employee', 'employee', 4, 16, 'Sunil Perera'),
(71, 'hashan', 'hashan', 7, 17, 'Hashan Perera'),
(74, 'pesh', 'pesh', 3, 18, 'pesh herath'),
(75, 'pesh', 'pesh', 3, 18, 'pesh herath'),
(76, 'pesh', 'pesh', 3, 18, 'pesh herath'),
(77, 'pesh', 'pesh', 3, 18, 'pesh herath'),
(78, 'pesh', 'pesh', 3, 18, 'pesh herath'),
(79, 'pesh', 'pesh', 3, 18, 'pesh herath'),
(80, 'pesh', 'pesh', 3, 18, 'pesh herath'),
(81, 'pesh', 'pesh', 3, 18, 'pesh herath'),
(82, 'pesh', 'pesh', 3, 18, 'pesh herath'),
(83, 'pesh', 'pesh', 3, 18, 'pesh herath'),
(84, 'pesh', 'pesh', 3, 18, 'pesh herath'),
(85, 'pesh', 'pesh', 3, 18, 'pesh herath'),
(86, 'pesh', 'pesh', 3, 18, 'pesh herath'),
(87, 'pesh', 'pesh', 3, 18, 'pesh herath'),
(88, 'pesh', 'pesh', 3, 18, 'pesh herath'),
(89, 'qwqw', 'qww', 4, 18, 'pesh herath'),
(90, 'lalith', 'lalith', 3, 21, 'Lalith Perera'),
(91, 'lalith', 'lalith', 3, 22, 'Lalith Perera');

-- --------------------------------------------------------

--
-- Table structure for table `cartitems`
--

CREATE TABLE `cartitems` (
  `id` int(11) NOT NULL,
  `SalesID` int(11) NOT NULL,
  `RetailerID` int(11) NOT NULL,
  `RetailerName` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL,
  `PaidAmount` int(11) NOT NULL,
  `Method` varchar(50) NOT NULL,
  `Discount` int(11) NOT NULL,
  `Credits` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `credit_dates`
--

CREATE TABLE `credit_dates` (
  `id` int(11) NOT NULL,
  `days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `damage_stock`
--

CREATE TABLE `damage_stock` (
  `id` int(11) NOT NULL,
  `stockID` int(11) NOT NULL,
  `supplierName` varchar(150) NOT NULL,
  `stockName` varchar(300) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `damage_stock`
--

INSERT INTO `damage_stock` (`id`, `stockID`, `supplierName`, `stockName`, `qty`) VALUES
(16, 22, 'Sandun', 'Ginger', 20),
(15, 20, 'Lalith', 'Chili powder', 40);

-- --------------------------------------------------------

--
-- Table structure for table `del_retview`
--

CREATE TABLE `del_retview` (
  `stockId` int(11) NOT NULL,
  `stockName` varchar(255) NOT NULL,
  `supplierName` varchar(255) NOT NULL,
  `stockqty` int(11) NOT NULL,
  `ordqty` int(11) NOT NULL,
  `disval` double NOT NULL,
  `sellingprice` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_detail`
--

CREATE TABLE `emp_detail` (
  `emp_id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `address` varchar(80) NOT NULL,
  `telephone` varchar(11) NOT NULL,
  `pos_id` int(11) NOT NULL,
  `pos_name` varchar(30) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `nic` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_detail`
--

INSERT INTO `emp_detail` (`emp_id`, `fname`, `lname`, `address`, `telephone`, `pos_id`, `pos_name`, `salary`, `nic`, `email`, `gender`, `status`, `value`) VALUES
(5, 'raween', 'Madshan', '65/E,pittugala,Malabe', '0112413661', 2, 'Finance Manager', '25000.00', '952635642V', 're@gmail.com', 'male', 0, 1),
(10, 'Thisura', 'Daksith', '34/E,malabe,Athurugiliya', '0112413789', 6, 'Supplier Handler', '25000.00', '952678942V', 'Thisura@gmail.com', 'male', 1, 1),
(13, 'Shavin', 'Dimasha', '65/E,Walivita,Malabe', '0112413661', 3, 'Retail Manager', '25000.00', '952634892V', 'shavin@gmail.com', 'male', 1, 1),
(14, 'Kasun', 'Perera', '65/E,Walivita,Rajagiriya', '0112447661', 5, 'Product Delivery Manager', '20000.00', '952678942V', 'kasun@gmail.com', 'male', 1, 1),
(15, 'Vishwa', 'Perera', '78/E,ratwatta,koswatta', '0112445661', 2, 'Finance Manager', '25000.00', '952626592V', 'vishwa@gmail.com', 'male', 1, 1),
(16, 'Hashan', 'Perera', '78/E,ratwatta,koswatta', '0112763569', 7, 'Stock Manager', '25000.00', '952678942V', 'hashan@gmail.com', 'male', 0, 1),
(17, 'Hashan', 'vijethunga', '65/E,Walivita,Rajagiriya', '0112413678', 7, 'Stock Manager', '25000.00', '952635642V', 'hashan@gmail.com', 'male', 1, 1),
(19, 'sanila', 'Perera', '65/E,Walivita,Malabe', '0112413777', 3, 'Retail Manager', '25000.00', '952635642V', 'sanila@gmail.com', 'male', 0, 0),
(20, 'pesh', 'herath', '78/E,ratwatta,koswatta', '0112413999', 6, 'Supplier Handler', '20000.00', '952626592V', 'pesh@gmail.com', 'female', 1, 0),
(22, 'Lalith', 'Perera', '65/E,Walivita,Malabe', '0112413890', 3, 'Retail Manager', '25000.00', '952635642V', 'lalith@gmail.com', 'male', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_sal`
--

CREATE TABLE `emp_sal` (
  `sal_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `month` varchar(30) NOT NULL,
  `year` int(11) NOT NULL,
  `total_sal` decimal(10,0) NOT NULL,
  `hours` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `total_ot` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_sal`
--

INSERT INTO `emp_sal` (`sal_id`, `emp_id`, `month`, `year`, `total_sal`, `hours`, `rate`, `total_ot`) VALUES
(31, 10, 'July', 2019, '30000', 2, 2500, '5000'),
(32, 13, 'July', 2019, '30000', 2, 2500, '5000'),
(33, 14, 'July', 2019, '25000', 2, 2500, '5000'),
(34, 15, 'July', 2019, '30000', 2, 2500, '5000'),
(35, 17, 'July', 2019, '30000', 2, 2500, '5000'),
(36, 10, 'April', 2019, '30000', 2, 2500, '5000'),
(37, 13, 'April', 2019, '30000', 2, 2500, '5000'),
(38, 14, 'April', 2019, '20400', 2, 200, '400'),
(39, 15, 'April', 2019, '25400', 2, 200, '400'),
(40, 17, 'April', 2019, '25400', 2, 200, '400'),
(41, 10, 'March', 2019, '25000', 0, 1500, '0'),
(42, 13, 'March', 2019, '25000', 0, 1500, '0'),
(43, 14, 'March', 2019, '20000', 0, 1500, '0'),
(44, 15, 'March', 2019, '28000', 2, 1500, '3000'),
(45, 17, 'March', 2019, '28000', 2, 1500, '3000'),
(46, 19, 'March', 2019, '28000', 2, 1500, '3000'),
(47, 20, 'March', 2019, '24500', 3, 1500, '4500'),
(69, 10, 'August', 2019, '28000', 2, 1500, '3000'),
(70, 13, 'August', 2019, '28000', 2, 1500, '3000'),
(71, 14, 'August', 2019, '23000', 2, 1500, '3000'),
(72, 15, 'August', 2019, '29500', 3, 1500, '4500'),
(73, 17, 'August', 2019, '25000', 0, 1500, '0'),
(74, 20, 'August', 2019, '21500', 1, 1500, '1500'),
(75, 22, 'August', 2019, '28000', 2, 1500, '3000');

-- --------------------------------------------------------

--
-- Table structure for table `fin_chequedetails`
--

CREATE TABLE `fin_chequedetails` (
  `chequeId` int(11) NOT NULL,
  `chequeDate` varchar(50) NOT NULL,
  `retailerId` int(11) NOT NULL,
  `retailerName` varchar(50) NOT NULL,
  `Amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fin_claimeddiscounts`
--

CREATE TABLE `fin_claimeddiscounts` (
  `claimId` int(11) NOT NULL,
  `claimDate` varchar(50) NOT NULL,
  `supplierName` varchar(50) NOT NULL,
  `discountAmount` decimal(10,2) NOT NULL,
  `claimedStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fin_dailybalance`
--

CREATE TABLE `fin_dailybalance` (
  `id` int(11) NOT NULL,
  `bDate` varchar(50) NOT NULL,
  `dailyIncome` decimal(10,2) NOT NULL,
  `dailyExpense` decimal(10,2) NOT NULL,
  `netBalance` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fin_dailybalance`
--

INSERT INTO `fin_dailybalance` (`id`, `bDate`, `dailyIncome`, `dailyExpense`, `netBalance`) VALUES
(1, '10.08.2019', '300000.00', '13100.00', '286900.00'),
(2, '14.08.2019', '208465.00', '105090.00', '103375.00'),
(3, '16.08.2019', '675600.00', '455000.00', '220600.00'),
(4, '17.08.2018', '560000.00', '302050.00', '257950.00');

-- --------------------------------------------------------

--
-- Table structure for table `fin_notclearcheque`
--

CREATE TABLE `fin_notclearcheque` (
  `chequeId` int(11) NOT NULL,
  `chequeDate` varchar(50) NOT NULL,
  `reatilerId` int(11) NOT NULL,
  `retailerName` varchar(50) NOT NULL,
  `telNo` int(11) NOT NULL,
  `Amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fin_supplierpayment`
--

CREATE TABLE `fin_supplierpayment` (
  `supTransId` int(11) NOT NULL,
  `supplierName` varchar(50) NOT NULL,
  `stockName` varchar(150) NOT NULL,
  `totprice` decimal(10,0) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fin_supplierpayment`
--

INSERT INTO `fin_supplierpayment` (`supTransId`, `supplierName`, `stockName`, `totprice`, `status`) VALUES
(2, 'Jiwan', 'Herb', '60000', 0),
(11, 'Ajith', 'Cumin', '175000', 0),
(12, 'Lalith', 'Chili powder', '60000', 0),
(13, 'Karuna', 'Black Paper', '67500', 0),
(14, 'Sandun', 'Ginger', '23000', 0),
(15, 'Sumithra', 'Turmeric', '32500', 0),
(16, 'Kumara', 'Salt', '31500', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fin_transdetails`
--

CREATE TABLE `fin_transdetails` (
  `transID` int(11) NOT NULL,
  `transDate` varchar(50) NOT NULL,
  `transactionDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fin_transdetails`
--

INSERT INTO `fin_transdetails` (`transID`, `transDate`, `transactionDate`, `type`, `description`, `amount`) VALUES
(1, '16.07.2019', '2016-07-20 13:30:00', 'Expense', 'Salary for January / January', '610028.00'),
(2, '16.07.2019', '2016-07-20 13:30:00', 'Expense', 'Salary for January / January', '630029.00'),
(3, '16.07.2019', '2016-07-20 13:30:00', 'Expense', 'Salary for January / January', '650030.00'),
(4, '16.07.2019', '2016-07-20 13:30:00', 'Expense', 'Salary for January / January', '675031.00'),
(5, '16.07.2019', '2016-07-20 13:30:00', 'Expense', 'Salary for January / January', '695032.00'),
(6, '16.07.2019', '2016-07-20 13:30:00', 'Expense', 'Salary for January / January', '715033.00'),
(7, '16.07.2019', '2016-07-20 13:30:00', 'Expense', 'Salary for January / ', '740034.00'),
(8, '16.07.2019', '2016-07-20 13:30:00', 'Expense', 'Salary for January / ', '760035.00'),
(9, '16.07.2019', '2016-07-20 13:30:00', 'Expense', 'Salary for January / ', '780036.00'),
(10, '16.07.2019', '2016-07-20 13:30:00', 'Expense', 'Salary for January / 2017', '805037.00'),
(11, '16.07.2019', '2016-07-20 13:30:00', 'Expense', 'Salary for January / 2017', '825038.00'),
(12, '16.07.2019', '2016-07-20 13:30:00', 'Expense', 'Salary for January / 2017', '845039.00'),
(13, '16.07.2019', '2019-07-16 18:06:33', 'Expense', 'Salary for January / 2017', '975045.00'),
(14, '16.07.2019', '2019-07-16 18:07:29', 'Expense', 'Salary for January / 2017', '1040048.00'),
(15, '16.07.2019', '2019-07-16 18:07:35', 'Expense', 'Salary for January / 2017', '1105051.00'),
(16, '16.07.2019', '2019-07-16 18:09:45', 'Expense', 'Salary for January / 2017', '1190055.00'),
(17, '16.07.2019', '2019-07-16 18:11:20', 'Expense', 'Salary for January / 2019', '85016.00'),
(18, '20.07.2019', '2019-07-20 06:36:41', 'Expense', 'Salary for January / 2017', '1273055.00'),
(26, '26.07.2019', '2019-07-26 17:46:02', 'Expense', 'Salary for January / 2019', '120080.00'),
(27, '26.07.2019', '2019-07-26 17:46:07', 'Expense', 'Salary for January / 2019', '240160.00'),
(28, '26.07.2019', '2019-07-26 17:47:36', 'Expense', 'Salary for January / 2019', '360240.00'),
(29, '26.07.2019', '2019-07-26 17:49:14', 'Expense', 'Salary for June / 2019', '120005.00'),
(30, '26.07.2019', '2019-07-26 18:06:54', 'Expense', 'Salary for August / 2019', '150000.00'),
(31, '27.07.2019', '2019-07-27 05:42:31', 'Expense', 'Salary for  / ', '0.00'),
(32, '27.07.2019', '2019-07-27 05:43:19', 'Expense', 'Salary for  / ', '0.00'),
(33, '27.07.2019', '2019-07-27 05:45:56', 'Expense', 'Salary for  / ', '0.00'),
(34, '27.07.2019', '2019-07-27 05:46:32', 'Expense', 'Salary for  / ', '0.00'),
(35, '27.07.2019', '2019-07-27 05:46:38', 'Expense', 'Salary for  / ', '0.00'),
(36, '27.07.2019', '2019-07-27 05:46:41', 'Expense', 'Salary for  / ', '0.00'),
(37, '27.07.2019', '2019-07-27 05:46:43', 'Expense', 'Salary for  / ', '0.00'),
(38, '27.07.2019', '2019-07-27 05:46:43', 'Expense', 'Salary for  / ', '0.00'),
(39, '27.07.2019', '2019-07-27 05:46:44', 'Expense', 'Salary for  / ', '0.00'),
(40, '27.07.2019', '2019-07-27 05:46:50', 'Expense', 'Salary for  / ', '0.00'),
(43, '16.08.2019', '2019-08-16 16:11:09', 'Expense', 'Salary for August / 2019', '277500.00'),
(44, '16.08.2019', '2019-08-16 16:13:28', 'Expense', 'Salary for July / 2019', '145000.00'),
(45, '17.08.2019', '2019-08-17 14:48:03', 'Expense', 'Salary for April / 2019', '131200.00'),
(46, '17.08.2019', '2019-08-17 15:22:31', 'Expense', 'Salary for March / 2019', '178500.00'),
(47, '17.08.2019', '2019-08-13 18:30:00', 'Expense', 'supplier Transaction', '175000.00'),
(48, '17.08.2019', '2019-08-13 18:30:00', 'Expense', 'supplier Transaction', '175000.00'),
(49, '17.08.2019', '2019-08-13 18:30:00', 'Expense', 'supplier Transaction', '175000.00'),
(50, '17.08.2019', '2019-08-16 18:30:00', 'Income', 'retailer', '200000.00'),
(51, '17.08.2019', '2019-08-16 18:30:00', 'Income', 'retailer', '200000.00'),
(52, '17.08.2019', '2019-08-16 18:30:00', 'Income', 'retailer', '200000.00'),
(53, '17.08.2019', '2019-08-16 18:30:00', 'Income', 'retailerpay', '450000.00'),
(54, '17.08.2019', '2019-08-16 18:30:00', 'Income', 'retailerpay', '450000.00'),
(55, '17.08.2019', '2019-08-16 18:30:00', 'Income', 'retailerpays', '175000.00'),
(56, '17.08.2019', '2019-08-16 18:30:00', 'Income', 'retailerpayd', '175000.00'),
(68, '14.08.2019', '2019-08-13 18:30:00', 'Income', 'Retailer Pay', '30000.00'),
(70, '31.08.2019', '2019-08-30 18:30:00', 'Income', 'RetailerPay', '21000.00'),
(72, '31.08.2019', '2019-08-31 17:33:52', 'Expense', 'Salary for January / 2019', '180000.00'),
(73, '31.08.2019', '2019-08-31 17:34:55', 'Expense', 'Salary for August / 2019', '183000.00'),
(74, '31.08.2019', '2019-08-30 18:30:00', 'Expense', 'supplier Pay', '31500.00');

-- --------------------------------------------------------

--
-- Table structure for table `holdstock`
--

CREATE TABLE `holdstock` (
  `stockID` int(150) NOT NULL,
  `supplierName` varchar(150) NOT NULL,
  `ddate` date NOT NULL,
  `stockName` varchar(150) NOT NULL,
  `purchasing_price` decimal(10,2) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `diss_value` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `qty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(55, '', 'HQ-4848', '', '[{"temp_id":"106","productname":"salt","quntity":"100","discount":"6","sellingprice":"114"},{"temp_id":"107","productname":"salt","quntity":"100","discount":"6","sellingprice":"114"},{"temp_id":"108","productname":"salt","quntity":"100","discount":"6","sellingprice":"114"},{"temp_id":"109","productname":"salt","quntity":"100","discount":"6","sellingprice":"114"},{"temp_id":"110","productname":"pepper","quntity":"150","discount":"6","sellingprice":"144"},{"temp_id":"111","productname":"pepper","quntity":"150","discount":"6","sellingprice":"144"},{"temp_id":"112","productname":"pepper","quntity":"150","discount":"6","sellingprice":"144"},{"temp_id":"113","productname":"pepper","quntity":"150","discount":"6","sellingprice":"144"},{"temp_id":"114","productname":"pepper","quntity":"150","discount":"6","sellingprice":"144"},{"temp_id":"115","productname":"pepper","quntity":"150","discount":"6","sellingprice":"144"}]'),
(56, '', 'HQ-4848', '', '[]'),
(57, '', 'HQ-4848', '', '[]'),
(58, '', 'HQ-4848', '', '[]'),
(59, '', 'HQ-4848', '', '[]'),
(60, '', 'HQ-4848', '', '[]'),
(61, '', 'HQ-4848', '', '[{"temp_id":"116","productname":"termeric","quntity":"500","discount":"6","sellingprice":"114"}]'),
(62, '', 'HQ-4848', '', '[{"temp_id":"117","productname":"termeric","quntity":"200","discount":"6","sellingprice":"114"}]'),
(63, '', 'HQ-4848', '', '[{"temp_id":"118","productname":"termeric","quntity":"50","discount":"6","sellingprice":"114"}]'),
(64, '', 'HQ-4848', '', '[]');

-- --------------------------------------------------------

--
-- Table structure for table `load_lorry_ret`
--

CREATE TABLE `load_lorry_ret` (
  `loadID` int(11) NOT NULL,
  `lorryID` varchar(255) NOT NULL,
  `lorryNumber` varchar(255) NOT NULL,
  `repID` varchar(255) NOT NULL,
  `stock_details` varchar(3000) NOT NULL,
  `retId` int(11) NOT NULL,
  `retName` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lorry_damage_stocks`
--

CREATE TABLE `lorry_damage_stocks` (
  `id` int(11) NOT NULL,
  `supplierName` varchar(255) NOT NULL,
  `stockId` int(11) NOT NULL,
  `stockName` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitPrice` decimal(10,2) NOT NULL,
  `totPrice` decimal(10,2) NOT NULL,
  `discPrice` decimal(10,2) NOT NULL,
  `lorryID` int(11) NOT NULL,
  `lorryNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pur_temp`
--

CREATE TABLE `pur_temp` (
  `id` int(11) NOT NULL,
  `stockName` varchar(100) NOT NULL,
  `qty` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rep_d_fin`
--

CREATE TABLE `rep_d_fin` (
  `id` int(11) NOT NULL,
  `Cash` decimal(10,2) NOT NULL DEFAULT '0.00',
  `Cheque` decimal(10,2) NOT NULL DEFAULT '0.00',
  `damage` decimal(10,2) NOT NULL DEFAULT '0.00',
  `return_` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rep_id` int(11) NOT NULL,
  `credit` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rep_d_sales`
--

CREATE TABLE `rep_d_sales` (
  `id` int(11) NOT NULL,
  `retId` int(11) NOT NULL,
  `retName` varchar(100) NOT NULL,
  `totPrice` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `repId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `retailerdetails`
--

CREATE TABLE `retailerdetails` (
  `RetailerID` int(11) NOT NULL,
  `RetailerName` varchar(50) NOT NULL,
  `ShopName` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `CoNumber` varchar(15) NOT NULL,
  `MobNumber` varchar(15) NOT NULL,
  `Email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailerdetails`
--

INSERT INTO `retailerdetails` (`RetailerID`, `RetailerName`, `ShopName`, `Address`, `CoNumber`, `MobNumber`, `Email`) VALUES
(1, 'Ranawaka', 'Ranawaka Stores', '64/E,Honnanthara Rd,Piliyandala', '0112456690', '0779856888', 'ranawaka@gmail.com'),
(2, 'Shantha', 'Shantha Stores', '65/E,pittugala,Malabe', '0112956861', '0779597368', 'shantha@gmail.com'),
(3, 'Suranga', 'Wijayantha Stores', '98/2,Gammana Rd, maharagama', '0112456700', '0773240768', 'suranga@gmail.com'),
(4, 'Bandula', 'Bandu Enterprise', '78/E,Ratwatta,kBorella', '0112413662', '0719924353', 'bandu@gmail.com'),
(5, 'Sudath', 'Kaduwela SD Stores', '987/A,Gamunupura,Kaduwela', '0112454334', '0712326756', 'sudath@gmail.com'),
(7, 'Sajith', 'Sajith Stores', '78/E,ratwatta,jubili post', '0112456690', '0779856777', 'sajith@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `retailer_cheque`
--

CREATE TABLE `retailer_cheque` (
  `ID` int(11) NOT NULL,
  `RetailerID` int(11) NOT NULL,
  `Date_` varchar(20) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Credit_amount` decimal(10,2) NOT NULL,
  `Method_` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `retailer_credits`
--

CREATE TABLE `retailer_credits` (
  `Id` int(11) NOT NULL,
  `RetailerID` int(11) NOT NULL,
  `Credits` decimal(10,2) NOT NULL,
  `Date_` varchar(50) NOT NULL,
  `Deadline` varchar(50) NOT NULL,
  `BList` int(11) NOT NULL DEFAULT '0',
  `Count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `retailer_free_stock`
--

CREATE TABLE `retailer_free_stock` (
  `id` int(11) NOT NULL,
  `saleId` int(11) NOT NULL,
  `stockId` int(11) NOT NULL,
  `stockName` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `suppliername` varchar(2000) NOT NULL,
  `Date_` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `retailer_order`
--

CREATE TABLE `retailer_order` (
  `Id` int(11) NOT NULL,
  `retId` int(11) NOT NULL,
  `retName` varchar(255) NOT NULL,
  `stock_details` varchar(3000) NOT NULL,
  `date_` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `retailer_order`
--

INSERT INTO `retailer_order` (`Id`, `retId`, `retName`, `stock_details`, `date_`) VALUES
(1, 1, 'resi', '[{"temp_id":"47","retId":"1","stockName":"termeric","ord_qty":"50","stockId":"3"}]', '26.07.2019'),
(2, 2, 'shantha', '[{"temp_id":"49","retId":"2","stockName":"termeric","ord_qty":"50","stockId":"3"},{"temp_id":"50","retId":"2","stockName":"salt","ord_qty":"50","stockId":"2"}]', '26.07.2019'),
(3, 0, '', '[{"temp_id":"21","retId":"0","stockName":"salt","ord_qty":"100","stockId":"2"}]', '26.07.2019');

-- --------------------------------------------------------

--
-- Table structure for table `retailer_payment`
--

CREATE TABLE `retailer_payment` (
  `RetailerID` int(11) NOT NULL,
  `RetailerName` varchar(150) NOT NULL,
  `date_` varchar(50) NOT NULL,
  `stockName` varchar(150) NOT NULL,
  `qty` int(11) NOT NULL,
  `pur_price` decimal(10,0) NOT NULL,
  `Discount` varchar(50) NOT NULL,
  `PaidAmount` decimal(10,2) NOT NULL,
  `Method` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailer_payment`
--

INSERT INTO `retailer_payment` (`RetailerID`, `RetailerName`, `date_`, `stockName`, `qty`, `pur_price`, `Discount`, `PaidAmount`, `Method`) VALUES
(10, 'shantha', '16.08.19', 'Herb', 50, '120', '4', '3000.00', 'Cash'),
(18, 'Ranawaka stores', '17.08.19', 'Black Paper', 430, '120', '4', '65000.00', 'Cash'),
(19, 'Suranga', '17.08.19', 'Cumin', 300, '350', '2', '70000.00', 'Cash'),
(20, 'Ranawaka', '10.08.19', 'Black Paper', 450, '150', '4', '62000.00', 'Cash'),
(21, 'Bandula', '11.08.19', 'Herb', 350, '120', '4', '70000.00', 'Cheque'),
(22, 'Sudath', '14.08.19', 'Cumin', 300, '350', '2', '84000.00', 'Cash'),
(23, 'Shantha', '15.08.19', 'Black Paper', 450, '150', '4', '30000.00', 'Cheque'),
(25, 'Sajith', '31.08.19', 'Salt', 400, '105', '4', '45000.00', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `retailer_sales`
--

CREATE TABLE `retailer_sales` (
  `id` int(11) NOT NULL,
  `date_` varchar(50) NOT NULL,
  `stockitem` varchar(300) NOT NULL,
  `salesid` int(11) NOT NULL,
  `supplierName` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `retailer_stocks`
--

CREATE TABLE `retailer_stocks` (
  `id` int(11) NOT NULL,
  `stocks` varchar(50000) NOT NULL,
  `returnStocks` varchar(5000) DEFAULT NULL,
  `retId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `retordertemp`
--

CREATE TABLE `retordertemp` (
  `tempid` int(11) NOT NULL,
  `stockId` int(11) NOT NULL,
  `stockName` varchar(255) NOT NULL,
  `ord_qty` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `return_stock`
--

CREATE TABLE `return_stock` (
  `id` int(11) NOT NULL,
  `stockName` int(11) NOT NULL,
  `supplierName` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Date_` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rol_notify`
--

CREATE TABLE `rol_notify` (
  `id` int(11) NOT NULL,
  `stockId` int(11) NOT NULL,
  `supplierName` varchar(255) NOT NULL,
  `stockName` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `retId` int(11) NOT NULL,
  `retName` varchar(100) NOT NULL,
  `totPrice` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `repId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_rep`
--

CREATE TABLE `sale_rep` (
  `sale_id` int(10) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `retail_name` varchar(30) NOT NULL,
  `date` varchar(15) NOT NULL,
  `income` int(30) NOT NULL,
  `discount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `send_damagestock`
--

CREATE TABLE `send_damagestock` (
  `id` int(11) NOT NULL,
  `supplierName` varchar(100) NOT NULL,
  `damage_list` varchar(4000) NOT NULL,
  `date_` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stockID` int(150) NOT NULL,
  `supplierName` varchar(150) NOT NULL,
  `ddate` varchar(50) NOT NULL,
  `stockName` varchar(150) NOT NULL,
  `purchasing_price` decimal(10,2) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `diss_value` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stockID`, `supplierName`, `ddate`, `stockName`, `purchasing_price`, `discount`, `diss_value`, `selling_price`, `qty`) VALUES
(18, 'Jiwan', '14.08.19', 'Herb', '120.00', '4', '4.80', '115.20', 350),
(19, 'Ajith', '16.08.19', 'Cumin', '350.00', '2', '10.50', '339.50', 300),
(20, 'Lalith', '17.08.19', 'Chili powder', '100.00', '5', '6.00', '114.00', 500),
(21, 'Karuna', '18.08.19', 'Black Paper', '150.00', '4', '6.00', '144.00', 450),
(22, 'Sandun', '18.08.19', 'Ginger', '115.00', '3', '3.45', '111.55', 200),
(23, 'Sumithra', '15.08.19', 'Turmeric', '130.00', '3', '3.90', '126.10', 250),
(25, 'Kumara', '31.08.19', 'Salt', '105.00', '4', '4.20', '100.80', 300);

-- --------------------------------------------------------

--
-- Table structure for table `supplierdetails`
--

CREATE TABLE `supplierdetails` (
  `Supid` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `telnumber` varchar(10) NOT NULL,
  `mobnumber` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplierdetails`
--

INSERT INTO `supplierdetails` (`Supid`, `fname`, `lname`, `address`, `telnumber`, `mobnumber`, `email`) VALUES
(28, 'Sumithra', 'Enterprises', '65/E,Walivita,Malabe', '0112875689', '0779856368', 'sumEnt@gmail.com'),
(35, 'Lalith', 'Perera', '89/4,Maliban St,Pitakotuwa', '0112775009', '0777344690', 'lalith70@gmail.com'),
(34, 'Ajith', 'Perera', '567/45,Galwala Rd,Waliweriya', '0112875456', '0770093900', 'ajith@gmail.com'),
(33, 'Jiwan', 'Enterprises', '78/E,Ediriweera Rd,Pallebadda', '0112875689', '0776744231', 'Jiwan@gmail.com'),
(36, 'Karuna', 'Fernando', '923/2,Kandy Rd,Nittambuwa', '0112546785', '0756783452', 'karunaent@gmail.com'),
(37, 'Sandun', 'Gamage', '45/A,Muddarangama Rd,Veyangoda', '0112008345', '0714345287', 'sandun@gmail.com'),
(39, 'Kumara', 'Fernando', '65/E,Walivita,Rajagiriya', '0112875689', '0779893350', 'kumara@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_stock`
--

CREATE TABLE `supplier_stock` (
  `id` int(11) NOT NULL,
  `stock` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_stock`
--

INSERT INTO `supplier_stock` (`id`, `stock`) VALUES
(6, '[{"id":"1","stockName":"salt","supplierName":"karuna","qty":"300","selling_price":"114.00"}]'),
(7, '[{"id":"2","stockName":"salt","supplierName":"karuna","qty":"600","selling_price":"114.00"}]'),
(8, '[{"id":"3","stockName":"salt","supplierName":"karuna","qty":"1200","selling_price":"114.00"}]'),
(9, '[{"id":"4","stockName":"salt","supplierName":"karuna","qty":"2400","selling_price":"114.00"}]'),
(10, '[{"id":"5","stockName":"termeric","supplierName":"tharush","qty":"500","selling_price":"114.00"}]'),
(11, '[{"id":"6","stockName":"termeric","supplierName":"tharush","qty":"550","selling_price":"114.00"}]'),
(12, '[{"id":"1","stockName":"termeric","supplierName":"tharush","qty":"800","selling_price":"114.00"}]'),
(13, '[{"id":"2","stockName":"termeric","supplierName":"tharush","qty":"400","selling_price":"114.00"}]'),
(14, '[{"id":"1","stockName":"termeric","supplierName":"tharush","qty":"200","selling_price":"114.00"}]'),
(15, '[{"id":"2","stockName":"salt","supplierName":"Karuna","qty":"4000","selling_price":"114.00"},{"id":"3","stockName":"Black Paper","supplierName":"Jiwan","qty":"100","selling_price":"115.20"},{"id":"4","stockName":"Black Paper","supplierName":"Jiwan","qty":"100","selling_price":"115.20"},{"id":"5","stockName":"Black Paper","supplierName":"Jiwan","qty":"10","selling_price":"115.20"},{"id":"6","stockName":"Black Paper","supplierName":"Jiwan","qty":"10","selling_price":"115.20"},{"id":"7","stockName":"Black Paper","supplierName":"Jiwan","qty":"10","selling_price":"115.20"}]'),
(16, '[{"id":"8","stockName":"Black Paper","supplierName":"Jiwan","qty":"10","selling_price":"115.20"}]'),
(17, '[{"id":"9","stockName":"Black Paper","supplierName":"Jiwan","qty":"10","selling_price":"115.20"},{"id":"10","stockName":"Black Paper","supplierName":"Jiwan","qty":"10","selling_price":"115.20"},{"id":"11","stockName":"Black Paper","supplierName":"Jiwan","qty":"10","selling_price":"115.20"},{"id":"12","stockName":"Black Paper","supplierName":"Jiwan","qty":"10","selling_price":"115.20"},{"id":"13","stockName":"Black Paper","supplierName":"","qty":"10","selling_price":"115.20"}]'),
(18, '[{"id":"14","stockName":"Black Paper","supplierName":"Jiwan","qty":"10","selling_price":"115.20"},{"id":"15","stockName":"Black Paper","supplierName":"Jiwan","qty":"10","selling_price":"115.20"},{"id":"16","stockName":"Black Paper","supplierName":"","qty":"10","selling_price":"115.20"},{"id":"17","stockName":"Black Paper","supplierName":"","qty":"10","selling_price":"115.20"},{"id":"18","stockName":"Black Paper","supplierName":"Jiwan","qty":"10","selling_price":"115.20"},{"id":"19","stockName":"Black Paper","supplierName":"","qty":"10","selling_price":"115.20"}]'),
(19, '[{"id":"20","stockName":"Black Paper","supplierName":"","qty":"10","selling_price":"115.20"}]'),
(20, '[]'),
(21, '[]'),
(22, '[]'),
(23, '[]'),
(24, '[]'),
(25, '[{"id":"21","stockName":"Black Paper","supplierName":"Jiwan","qty":"10","selling_price":"115.20"}]'),
(26, '[]'),
(27, '[{"id":"22","stockName":"Black Paper","supplierName":"Jiwan","qty":"10","selling_price":"115.20"}]'),
(28, '[{"id":"23","stockName":"Cumin","supplierName":"Ajith","qty":"60","selling_price":"339.50"}]'),
(29, '[{"id":"1","stockName":"Turmeric","supplierName":"Sumithra","qty":"100","selling_price":"116.40"}]'),
(30, '[{"id":"1","stockName":"Salt","supplierName":"Kumara","qty":"50","selling_price":"100.80"}]'),
(31, '[{"id":"2","stockName":"Salt","supplierName":"Kumara","qty":"450","selling_price":"100.80"}]');

-- --------------------------------------------------------

--
-- Table structure for table `sup_payment`
--

CREATE TABLE `sup_payment` (
  `pID` int(20) NOT NULL,
  `supplierName` varchar(50) NOT NULL,
  `stockName` varchar(150) NOT NULL,
  `totprice` decimal(10,0) NOT NULL,
  `ddate` varchar(50) NOT NULL,
  `Method` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sup_payment`
--

INSERT INTO `sup_payment` (`pID`, `supplierName`, `stockName`, `totprice`, `ddate`, `Method`) VALUES
(30, 'Karuna', 'Black Paper', '67500', '20.08.19', 'Cash'),
(29, 'Lalith', 'Chili powder', '60000', '20.08.19', 'Cash'),
(33, 'Kumara', 'Salt', '31500', '31.08.19', 'Cash'),
(32, 'Sandun', 'Ginger', '23000', '20.08.19', 'Cash'),
(31, 'Sumithra', 'Turmeric', '32500', '20.08.19', 'Cash'),
(28, 'Ajith', 'Cumin', '175000', '20.08.19', 'Cheque'),
(27, 'Jiwan', 'Herb', '36000', '17.08.19', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `sup_temptable`
--

CREATE TABLE `sup_temptable` (
  `s_ID` int(20) NOT NULL,
  `supName` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_ID` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempcart`
--

CREATE TABLE `tempcart` (
  `id` int(11) NOT NULL,
  `stockId` int(11) NOT NULL,
  `stockName` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitPrice` decimal(10,2) NOT NULL,
  `totPrice` decimal(10,2) NOT NULL,
  `discPrice` decimal(10,2) NOT NULL,
  `repId` int(11) NOT NULL,
  `supplierName` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempcart_extra`
--

CREATE TABLE `tempcart_extra` (
  `id` int(11) NOT NULL,
  `stockId` int(11) NOT NULL,
  `stockName` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitPrice` decimal(10,2) NOT NULL,
  `totPrice` decimal(10,2) NOT NULL,
  `discPrice` decimal(10,2) NOT NULL,
  `repId` int(11) NOT NULL,
  `supplierName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempcart_order`
--

CREATE TABLE `tempcart_order` (
  `temp_id` int(11) NOT NULL,
  `retId` int(11) NOT NULL,
  `stockName` varchar(60) NOT NULL,
  `ord_qty` double NOT NULL,
  `stockId` int(11) NOT NULL,
  `repId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempcart_rep_lorry`
--

CREATE TABLE `tempcart_rep_lorry` (
  `id` int(11) NOT NULL,
  `stockId` int(11) NOT NULL,
  `stockName` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitPrice` decimal(10,2) NOT NULL,
  `totPrice` decimal(10,2) NOT NULL,
  `discPrice` decimal(10,2) NOT NULL,
  `repId` int(11) NOT NULL,
  `supplierName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempcart_rep_rm`
--

CREATE TABLE `tempcart_rep_rm` (
  `id` int(11) NOT NULL,
  `stockId` int(11) NOT NULL,
  `stockName` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitPrice` decimal(10,2) NOT NULL,
  `totPrice` decimal(10,2) NOT NULL,
  `discPrice` decimal(10,2) NOT NULL,
  `repId` int(11) NOT NULL,
  `supplierName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempdstok`
--

CREATE TABLE `tempdstok` (
  `id` int(11) NOT NULL,
  `stockId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempemp_sal`
--

CREATE TABLE `tempemp_sal` (
  `id` int(10) NOT NULL,
  `empName` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempemp_sal`
--

INSERT INTO `tempemp_sal` (`id`, `empName`, `month`, `year`, `total`, `status`) VALUES
(1, 'Thisura', 'March', '2020', '25004.00', 0),
(2, 'Shavin', 'March', '2020', '25004.00', 1),
(3, 'Kasun', 'March', '2020', '20004.00', 1),
(4, 'Vishwa', 'March', '2020', '25004.00', 1),
(5, 'Hashan', 'March', '2020', '25004.00', 0),
(6, 'Thisura', 'July', '2019', '25001.00', 1),
(7, 'Shavin', 'July', '2019', '25004.00', 1),
(8, 'Kasun', 'July', '2019', '20012.00', 0),
(9, 'Vishwa', 'July', '2019', '25020.00', 1),
(10, 'Hashan', 'July', '2019', '25036.00', 0),
(11, 'Thisura', 'April', '2019', '30000.00', 1),
(12, 'Shavin', 'April', '2019', '30000.00', 1),
(13, 'Kasun', 'April', '2019', '20400.00', 1),
(14, 'Vishwa', 'April', '2019', '25400.00', 1),
(15, 'Hashan', 'April', '2019', '25400.00', 1),
(16, 'Thisura', 'March', '2019', '25000.00', 1),
(17, 'Shavin', 'March', '2019', '25000.00', 1),
(18, 'Kasun', 'March', '2019', '20000.00', 1),
(19, 'Vishwa', 'March', '2019', '28000.00', 1),
(20, 'Hashan', 'March', '2019', '28000.00', 1),
(21, 'sanila', 'March', '2019', '28000.00', 1),
(22, 'pesh', 'March', '2019', '24500.00', 1),
(23, 'Thisura', 'August', '2019', '29500.00', 0),
(24, 'Shavin', 'August', '2019', '28000.00', 0),
(25, 'Kasun', 'August', '2019', '21500.00', 0),
(26, 'Vishwa', 'August', '2019', '25000.00', 0),
(27, 'Hashan', 'August', '2019', '29500.00', 0),
(28, 'pesh', 'August', '2019', '24500.00', 0),
(29, 'Lalith', 'August', '2019', '28000.00', 0),
(30, 'Thisura', 'August', '2019', '28000.00', 0),
(31, 'Shavin', 'August', '2019', '29500.00', 0),
(32, 'Kasun', 'August', '2019', '23000.00', 0),
(33, 'Vishwa', 'August', '2019', '31000.00', 0),
(34, 'Hashan', 'August', '2019', '26500.00', 0),
(35, 'pesh', 'August', '2019', '20000.00', 0),
(36, 'Lalith', 'August', '2019', '29500.00', 0),
(37, 'Thisura', 'January', '2019', '28000.00', 1),
(38, 'Shavin', 'January', '2019', '28000.00', 1),
(39, 'Kasun', 'January', '2019', '23000.00', 1),
(40, 'Vishwa', 'January', '2019', '26500.00', 1),
(41, 'Hashan', 'January', '2019', '25000.00', 1),
(42, 'pesh', 'January', '2019', '20000.00', 1),
(43, 'Lalith', 'January', '2019', '29500.00', 1),
(44, 'Thisura', 'August', '2019', '28000.00', 1),
(45, 'Shavin', 'August', '2019', '28000.00', 1),
(46, 'Kasun', 'August', '2019', '23000.00', 1),
(47, 'Vishwa', 'August', '2019', '29500.00', 1),
(48, 'Hashan', 'August', '2019', '25000.00', 1),
(49, 'pesh', 'August', '2019', '21500.00', 1),
(50, 'Lalith', 'August', '2019', '28000.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tempextrastck`
--

CREATE TABLE `tempextrastck` (
  `temp_id` int(11) NOT NULL,
  `stockID` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `quntity` double NOT NULL,
  `discount` double NOT NULL,
  `sellingprice` double NOT NULL,
  `supplierName` varchar(255) NOT NULL,
  `empId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `templorrystck`
--

CREATE TABLE `templorrystck` (
  `temp_id` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `quntity` double NOT NULL,
  `discount` double NOT NULL,
  `sellingprice` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempretailer_payments`
--

CREATE TABLE `tempretailer_payments` (
  `id` int(11) NOT NULL,
  `retailerName` varchar(100) NOT NULL,
  `paidAmount` decimal(10,2) NOT NULL,
  `method` varchar(100) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempretailer_payments`
--

INSERT INTO `tempretailer_payments` (`id`, `retailerName`, `paidAmount`, `method`, `status`) VALUES
(1, 'Ranawaka stores', '2400.00', 'Cash', 0),
(2, 'shantha', '3456.00', 'Cash', 0),
(3, 'Ranawaka stores', '5000.00', 'Cash', 0),
(4, 'Ranawaka stores', '5000.00', 'Cheque', 0),
(5, 'shantha', '4000.00', 'Cash', 0),
(6, 'Ranawaka stores', '65000.00', 'Cash', 0),
(7, 'Suranga', '70000.00', 'Cash', 1),
(8, 'Ranawaka', '62000.00', 'Cash', 1),
(9, 'Bandula', '70000.00', 'Cheque', 1),
(10, 'Sudath', '84000.00', 'Cash', 1),
(11, 'Shantha', '30000.00', 'Cheque', 1),
(12, 'Sajith', '21000.00', 'Cash', 0),
(13, 'Sajith', '45000.00', 'Cash', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tempretstk`
--

CREATE TABLE `tempretstk` (
  `temp_id` int(11) NOT NULL,
  `retId` int(11) NOT NULL,
  `stockName` varchar(60) NOT NULL,
  `ord_qty` double NOT NULL,
  `stockId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempretstk`
--

INSERT INTO `tempretstk` (`temp_id`, `retId`, `stockName`, `ord_qty`, `stockId`) VALUES
(5, 2, 'termeric', 50, 3),
(6, 2, 'salt', 50, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tempstock`
--

CREATE TABLE `tempstock` (
  `id` int(11) NOT NULL,
  `stockName` varchar(150) NOT NULL,
  `supplierName` varchar(150) NOT NULL,
  `qty` double NOT NULL,
  `selling_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempvehiclefuel`
--

CREATE TABLE `tempvehiclefuel` (
  `id` int(10) NOT NULL,
  `vehiclenum` varchar(190) NOT NULL,
  `date_` varchar(100) NOT NULL,
  `fuelcost` decimal(10,0) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempvehiclefuel`
--

INSERT INTO `tempvehiclefuel` (`id`, `vehiclenum`, `date_`, `fuelcost`, `status`) VALUES
(1, 'HQ-4848', '17.08.2019', '500', 0),
(2, 'HQ-4848', '17.08.2019', '154', 1),
(3, 'HQ-4848', '17.08.2019', '154', 0),
(4, 'HQ-4848', '17.08.2019', '154', 1),
(5, 'GQ-4919', '21.08.2019', '4500', 1),
(6, 'HQ-4848', '31.08.2019', '2500', 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_retview`
--

CREATE TABLE `temp_retview` (
  `stockId` int(11) NOT NULL,
  `stockName` varchar(255) NOT NULL,
  `supplierName` varchar(255) NOT NULL,
  `stockqty` int(11) NOT NULL,
  `ordqty` int(11) NOT NULL,
  `disval` double NOT NULL,
  `sellingprice` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_unload`
--

CREATE TABLE `temp_unload` (
  `temp_id` int(11) NOT NULL,
  `stockID` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `quntity` double NOT NULL,
  `discount` double NOT NULL,
  `sellingprice` double NOT NULL,
  `supplierName` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_unload_ret`
--

CREATE TABLE `temp_unload_ret` (
  `temp_id` int(11) NOT NULL,
  `stockID` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `quntity` double NOT NULL,
  `discount` double NOT NULL,
  `sellingprice` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `stocks` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `unload_lorry_qty`
--

CREATE TABLE `unload_lorry_qty` (
  `unloadID` int(11) NOT NULL,
  `lorryID` varchar(255) NOT NULL,
  `lorryNumber` varchar(255) NOT NULL,
  `repID` int(11) NOT NULL,
  `stock_details` varchar(3000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unload_lorry_ret`
--

CREATE TABLE `unload_lorry_ret` (
  `unloadID` int(11) NOT NULL,
  `lorryID` varchar(255) NOT NULL,
  `lorryNumber` varchar(255) NOT NULL,
  `repID` int(11) NOT NULL,
  `stock_details` varchar(3000) NOT NULL,
  `retId` int(11) NOT NULL,
  `retName` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehiclefuel`
--

CREATE TABLE `vehiclefuel` (
  `id` int(11) NOT NULL,
  `vehiclenum` varchar(100) NOT NULL,
  `date_` varchar(100) NOT NULL,
  `fuelcost` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehiclefuel`
--

INSERT INTO `vehiclefuel` (`id`, `vehiclenum`, `date_`, `fuelcost`) VALUES
(3, 'HQ-4848', '17.08.2019', 2000),
(11, 'HQ-4848', '31.08.2019', 2500),
(10, 'GQ-4919', '19.08.2019', 4500);

-- --------------------------------------------------------

--
-- Table structure for table `vehiclemileage`
--

CREATE TABLE `vehiclemileage` (
  `id` int(11) NOT NULL,
  `vehiclenum` varchar(100) NOT NULL,
  `date_` varchar(100) NOT NULL,
  `s_mileage` int(100) NOT NULL,
  `f_mileage` int(100) NOT NULL,
  `m_perday` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehiclemileage`
--

INSERT INTO `vehiclemileage` (`id`, `vehiclenum`, `date_`, `s_mileage`, `f_mileage`, `m_perday`) VALUES
(12, 'GQ-4919', '17.08.2019', 56000, 56400, 400),
(10, 'HQ-4848', '18.08.2019', 42000, 46000, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `vehicleservice`
--

CREATE TABLE `vehicleservice` (
  `id` int(11) NOT NULL,
  `vehiclenum` varchar(100) NOT NULL,
  `date_` varchar(100) NOT NULL,
  `servicecost` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_damage`
--

CREATE TABLE `warehouse_damage` (
  `id` int(11) NOT NULL,
  `supplierName` varchar(255) NOT NULL,
  `stockId` int(11) NOT NULL,
  `stockName` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitPrice` decimal(10,2) NOT NULL,
  `totPrice` decimal(10,2) NOT NULL,
  `discPrice` decimal(10,2) NOT NULL,
  `status` int(4) NOT NULL,
  `Date_` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addvehicle`
--
ALTER TABLE `addvehicle`
  ADD PRIMARY KEY (`vehicleid`);

--
-- Indexes for table `auth_details`
--
ALTER TABLE `auth_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cartitems`
--
ALTER TABLE `cartitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `damage_stock`
--
ALTER TABLE `damage_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_detail`
--
ALTER TABLE `emp_detail`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `emp_sal`
--
ALTER TABLE `emp_sal`
  ADD PRIMARY KEY (`sal_id`);

--
-- Indexes for table `fin_chequedetails`
--
ALTER TABLE `fin_chequedetails`
  ADD PRIMARY KEY (`chequeId`);

--
-- Indexes for table `fin_claimeddiscounts`
--
ALTER TABLE `fin_claimeddiscounts`
  ADD PRIMARY KEY (`claimId`);

--
-- Indexes for table `fin_dailybalance`
--
ALTER TABLE `fin_dailybalance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fin_notclearcheque`
--
ALTER TABLE `fin_notclearcheque`
  ADD PRIMARY KEY (`chequeId`);

--
-- Indexes for table `fin_supplierpayment`
--
ALTER TABLE `fin_supplierpayment`
  ADD PRIMARY KEY (`supTransId`);

--
-- Indexes for table `fin_transdetails`
--
ALTER TABLE `fin_transdetails`
  ADD PRIMARY KEY (`transID`);

--
-- Indexes for table `holdstock`
--
ALTER TABLE `holdstock`
  ADD PRIMARY KEY (`stockID`);

--
-- Indexes for table `load_lorry_qty`
--
ALTER TABLE `load_lorry_qty`
  ADD PRIMARY KEY (`loadID`);

--
-- Indexes for table `load_lorry_ret`
--
ALTER TABLE `load_lorry_ret`
  ADD PRIMARY KEY (`loadID`);

--
-- Indexes for table `lorry_damage_stocks`
--
ALTER TABLE `lorry_damage_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pur_temp`
--
ALTER TABLE `pur_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rep_d_fin`
--
ALTER TABLE `rep_d_fin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rep_d_sales`
--
ALTER TABLE `rep_d_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retailerdetails`
--
ALTER TABLE `retailerdetails`
  ADD PRIMARY KEY (`RetailerID`);

--
-- Indexes for table `retailer_cheque`
--
ALTER TABLE `retailer_cheque`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `retailer_credits`
--
ALTER TABLE `retailer_credits`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `retailer_free_stock`
--
ALTER TABLE `retailer_free_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retailer_order`
--
ALTER TABLE `retailer_order`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `retailer_payment`
--
ALTER TABLE `retailer_payment`
  ADD PRIMARY KEY (`RetailerID`);

--
-- Indexes for table `retailer_sales`
--
ALTER TABLE `retailer_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retailer_stocks`
--
ALTER TABLE `retailer_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retordertemp`
--
ALTER TABLE `retordertemp`
  ADD PRIMARY KEY (`tempid`);

--
-- Indexes for table `return_stock`
--
ALTER TABLE `return_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rol_notify`
--
ALTER TABLE `rol_notify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_rep`
--
ALTER TABLE `sale_rep`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `send_damagestock`
--
ALTER TABLE `send_damagestock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stockID`);

--
-- Indexes for table `supplierdetails`
--
ALTER TABLE `supplierdetails`
  ADD PRIMARY KEY (`Supid`);

--
-- Indexes for table `supplier_stock`
--
ALTER TABLE `supplier_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sup_payment`
--
ALTER TABLE `sup_payment`
  ADD PRIMARY KEY (`pID`);

--
-- Indexes for table `sup_temptable`
--
ALTER TABLE `sup_temptable`
  ADD PRIMARY KEY (`s_ID`);

--
-- Indexes for table `tempcart`
--
ALTER TABLE `tempcart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempcart_extra`
--
ALTER TABLE `tempcart_extra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempcart_order`
--
ALTER TABLE `tempcart_order`
  ADD PRIMARY KEY (`temp_id`);

--
-- Indexes for table `tempcart_rep_lorry`
--
ALTER TABLE `tempcart_rep_lorry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempcart_rep_rm`
--
ALTER TABLE `tempcart_rep_rm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempdstok`
--
ALTER TABLE `tempdstok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempemp_sal`
--
ALTER TABLE `tempemp_sal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempextrastck`
--
ALTER TABLE `tempextrastck`
  ADD PRIMARY KEY (`temp_id`);

--
-- Indexes for table `templorrystck`
--
ALTER TABLE `templorrystck`
  ADD PRIMARY KEY (`temp_id`);

--
-- Indexes for table `tempretailer_payments`
--
ALTER TABLE `tempretailer_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempretstk`
--
ALTER TABLE `tempretstk`
  ADD PRIMARY KEY (`temp_id`);

--
-- Indexes for table `tempstock`
--
ALTER TABLE `tempstock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempvehiclefuel`
--
ALTER TABLE `tempvehiclefuel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_unload`
--
ALTER TABLE `temp_unload`
  ADD PRIMARY KEY (`temp_id`);

--
-- Indexes for table `temp_unload_ret`
--
ALTER TABLE `temp_unload_ret`
  ADD PRIMARY KEY (`temp_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unload_lorry_qty`
--
ALTER TABLE `unload_lorry_qty`
  ADD PRIMARY KEY (`unloadID`);

--
-- Indexes for table `unload_lorry_ret`
--
ALTER TABLE `unload_lorry_ret`
  ADD PRIMARY KEY (`unloadID`);

--
-- Indexes for table `vehiclefuel`
--
ALTER TABLE `vehiclefuel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehiclemileage`
--
ALTER TABLE `vehiclemileage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicleservice`
--
ALTER TABLE `vehicleservice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse_damage`
--
ALTER TABLE `warehouse_damage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addvehicle`
--
ALTER TABLE `addvehicle`
  MODIFY `vehicleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `auth_details`
--
ALTER TABLE `auth_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `cartitems`
--
ALTER TABLE `cartitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `damage_stock`
--
ALTER TABLE `damage_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `emp_detail`
--
ALTER TABLE `emp_detail`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `emp_sal`
--
ALTER TABLE `emp_sal`
  MODIFY `sal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `fin_chequedetails`
--
ALTER TABLE `fin_chequedetails`
  MODIFY `chequeId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fin_claimeddiscounts`
--
ALTER TABLE `fin_claimeddiscounts`
  MODIFY `claimId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fin_dailybalance`
--
ALTER TABLE `fin_dailybalance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fin_notclearcheque`
--
ALTER TABLE `fin_notclearcheque`
  MODIFY `chequeId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fin_supplierpayment`
--
ALTER TABLE `fin_supplierpayment`
  MODIFY `supTransId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `fin_transdetails`
--
ALTER TABLE `fin_transdetails`
  MODIFY `transID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `load_lorry_qty`
--
ALTER TABLE `load_lorry_qty`
  MODIFY `loadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `load_lorry_ret`
--
ALTER TABLE `load_lorry_ret`
  MODIFY `loadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `lorry_damage_stocks`
--
ALTER TABLE `lorry_damage_stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pur_temp`
--
ALTER TABLE `pur_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `rep_d_fin`
--
ALTER TABLE `rep_d_fin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rep_d_sales`
--
ALTER TABLE `rep_d_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `retailerdetails`
--
ALTER TABLE `retailerdetails`
  MODIFY `RetailerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `retailer_cheque`
--
ALTER TABLE `retailer_cheque`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `retailer_credits`
--
ALTER TABLE `retailer_credits`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `retailer_free_stock`
--
ALTER TABLE `retailer_free_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `retailer_order`
--
ALTER TABLE `retailer_order`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `retailer_payment`
--
ALTER TABLE `retailer_payment`
  MODIFY `RetailerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `retailer_sales`
--
ALTER TABLE `retailer_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `retailer_stocks`
--
ALTER TABLE `retailer_stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `retordertemp`
--
ALTER TABLE `retordertemp`
  MODIFY `tempid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `return_stock`
--
ALTER TABLE `return_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rol_notify`
--
ALTER TABLE `rol_notify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale_rep`
--
ALTER TABLE `sale_rep`
  MODIFY `sale_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `send_damagestock`
--
ALTER TABLE `send_damagestock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stockID` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `supplierdetails`
--
ALTER TABLE `supplierdetails`
  MODIFY `Supid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `supplier_stock`
--
ALTER TABLE `supplier_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `sup_payment`
--
ALTER TABLE `sup_payment`
  MODIFY `pID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `sup_temptable`
--
ALTER TABLE `sup_temptable`
  MODIFY `s_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tempcart`
--
ALTER TABLE `tempcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tempcart_extra`
--
ALTER TABLE `tempcart_extra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tempcart_order`
--
ALTER TABLE `tempcart_order`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tempcart_rep_lorry`
--
ALTER TABLE `tempcart_rep_lorry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tempcart_rep_rm`
--
ALTER TABLE `tempcart_rep_rm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tempdstok`
--
ALTER TABLE `tempdstok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tempemp_sal`
--
ALTER TABLE `tempemp_sal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `tempextrastck`
--
ALTER TABLE `tempextrastck`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=550;
--
-- AUTO_INCREMENT for table `templorrystck`
--
ALTER TABLE `templorrystck`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `tempretailer_payments`
--
ALTER TABLE `tempretailer_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tempretstk`
--
ALTER TABLE `tempretstk`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tempstock`
--
ALTER TABLE `tempstock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tempvehiclefuel`
--
ALTER TABLE `tempvehiclefuel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `temp_unload`
--
ALTER TABLE `temp_unload`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1153;
--
-- AUTO_INCREMENT for table `temp_unload_ret`
--
ALTER TABLE `temp_unload_ret`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unload_lorry_qty`
--
ALTER TABLE `unload_lorry_qty`
  MODIFY `unloadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `unload_lorry_ret`
--
ALTER TABLE `unload_lorry_ret`
  MODIFY `unloadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `vehiclefuel`
--
ALTER TABLE `vehiclefuel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `vehiclemileage`
--
ALTER TABLE `vehiclemileage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `vehicleservice`
--
ALTER TABLE `vehicleservice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `warehouse_damage`
--
ALTER TABLE `warehouse_damage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
