  -- phpMyAdmin SQL Dump
  -- version 4.1.14
  -- http://www.phpmyadmin.net
  --
  -- Host: 127.0.0.1
  -- Generation Time: Aug 13, 2017 at 07:24 AM
  -- Server version: 5.6.17
  -- PHP Version: 5.5.12

  SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
  SET time_zone = "+00:00";


  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8 */;

  --
  -- Database: `employee`
  --

  -- --------------------------------------------------------

  --
  -- Table structure for table `emp_detail`
  --

  CREATE TABLE IF NOT EXISTS `emp_detail` (
    `emp_id` int(11) NOT NULL AUTO_INCREMENT,
    `fname` varchar(20) NOT NULL,
    `lname` varchar(30) NOT NULL,
    `address` varchar(80) NOT NULL,
    `telephone` int(11) NOT NULL,
    `pos_id` int(11) NOT NULL,
    `pos_name` varchar(30) NOT NULL,
    `salary` decimal(10,2) NOT NULL,
    `nic` varchar(10) NOT NULL,
    `email` varchar(50) NOT NULL,
    `gender` varchar(10) NOT NULL,
    PRIMARY KEY (`emp_id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

  --
  -- Dumping data for table `emp_detail`
  --

  INSERT INTO `emp_detail` (`emp_id`, `fname`, `lname`, `address`, `telephone`, `pos_id`, `pos_name`, `salary`, `nic`, `email`, `gender`) VALUES
  (8, 'hansaka', 'perera', 'kotte', 2147483647, 4, 'Sales Representative', '5000.00', '7777777777', 'upssep14@gmail.com', 'female'),
  (9, 'tharu', 'alwis', 'jaffna', 2147483647, 1, 'Cashier', '5000.00', '5555555555', 'tharu@gmail.com', 'female'),
  (10, 'chathu', 'perera', 'kotte', 2147483647, 2, 'Operator', '5000.00', '5555555555', 'chathu@gmail.com', 'female'),
  (11, 'sunny', 'silva', 'galle', 777399763, 3, 'Labourer', '50.00', '5555555555', 'suuny@gmail.com', 'female');

  -- --------------------------------------------------------

  --
  -- Table structure for table `emp_sal`
  --

  CREATE TABLE IF NOT EXISTS `emp_sal` (
    `sal_id` int(11) NOT NULL AUTO_INCREMENT,
    `emp_id` int(11) NOT NULL,
    `month` varchar(30) NOT NULL,
    `year` int(11) NOT NULL,
    `hours` int(11) NOT NULL,
    `rate` int(11) NOT NULL,
    `total_ot` decimal(10,0) NOT NULL,
    `total_sal` decimal(10,0) NOT NULL,
    PRIMARY KEY (`sal_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

  -- --------------------------------------------------------

  --
  -- Table structure for table `sale_rep`
  --

  CREATE TABLE IF NOT EXISTS `sale_rep` (
    `sale_id` int(10) NOT NULL AUTO_INCREMENT,
    `emp_id` int(10) NOT NULL,
    `retail_name` varchar(30) NOT NULL,
    `date` varchar(15) NOT NULL,
    `income` int(30) NOT NULL,
    PRIMARY KEY (`sale_id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
