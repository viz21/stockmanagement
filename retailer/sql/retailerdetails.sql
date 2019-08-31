CREATE TABLE IF NOT EXISTS `retailerdetails` (
  `RetailerID` int(11) NOT NULL AUTO_INCREMENT,
  `RetailerName` varchar(50) NOT NULL,
  `ShopName` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `CoNumber` int(11) NOT NULL,
  `MobNumber` int(11) NOT NULL,
  `Email` varchar(20) NOT NULL,
  PRIMARY KEY (`RetailerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;


INSERT INTO `retailerdetails` (`RetailerID`, `RetailerName`, `ShopName`, `Address`, `CoNumber`, `MobNumber`, `Email`) VALUES
(18, 'gfhgczghc', 'fdghgdfagfsd', 'fdfsgdfghsfd', 1234567890, 1234567890, 'fdghgdghdf@gmail.com'),
(19, 'tharuka nanayakkara', 'tharuka group', 'wattala', 1234567890, 0, 'tharukananayakkara@y'),
(20, 'tharuka nana', 'tharuka company', 'wattala', 1234567890, 1234567890, 'thra@yahoo.com'),
(21, 'chathu', 'chathusara and sons', 'gampaha', 2147483647, 2147483647, 'ch@gmail.com'),
(22, 'tharuuuuu nanayakkara', 'tharuka group', 'fsf', 1234567890, 1234567890, 'thra@yahoo.com'),
(23, 'Kamal Perera', 'Top shop', 'Malabe', 2147483647, 2147483647, 'kamal@y.com'),
(24, 'Amal DeSilva', 'Good Food Store', 'Colombo 10', 2147483647, 776529134, 'amal@y.com'),
(25, 'Rahul Weerasekara', 'Hill Stores', 'Kandy', 1234567891, 772354167, 'Ra@ymail.com'),
(26, 'udula siriwardhana', 'ABC shop', 'kotte', 2147483647, 1245369803, 'udu@gmail.com'),
(27, 'Chathu Tennakoon', 'chathu and sons', 'Galle', 2147483647, 765428791, 'ch@gmail.com'),
(28, 'Jhon Silva', 'Silvass', 'Maradhana', 2147483647, 712345627, 'jhon@j.com');
