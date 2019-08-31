CREATE TABLE IF NOT EXISTS `retailer_stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stocks` varchar(50000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

INSERT INTO `retailer_stocks` (`id`, `stocks`) VALUES
(1, '[{"id":"10","stockId":"1","stockName":"Munchee Chocolate Biscuits","quantity":"50","unitPrice":"25.00","totPrice":"1250.00","discPrice":"350.00"},{"id":"11","stockId":"1","stockName":"Munchee Chocolate Biscuits","quantity":"50","unitPrice":"25.00","totPrice":"1250.00","discPrice":"350.00"}]'),
(2, '[{"id":"12","stockId":"2","stockName":"Munchee Cream Biscuits","quantity":"5","unitPrice":"75.00","totPrice":"375.00","discPrice":"32.50"},{"id":"13","stockId":"5","stockName":"Anchor butter","quantity":"6","unitPrice":"82.00","totPrice":"492.00","discPrice":"15.00"}]'),
(3, '[{"id":"14","stockId":"2","stockName":"Munchee Cream Biscuits","quantity":"5","unitPrice":"75.00","totPrice":"375.00","discPrice":"32.50"},{"id":"15","stockId":"2","stockName":"Munchee Cream Biscuits","quantity":"6","unitPrice":"75.00","totPrice":"450.00","discPrice":"39.00"},{"id":"16","stockId":"4","stockName":"Anchor Milk powder","quantity":"2","unitPrice":"150.00","totPrice":"300.00","discPrice":"20.00"}]'),
(4, '[{"id":"17","stockId":"4","stockName":"Anchor Milk powder","quantity":"2","unitPrice":"150.00","totPrice":"300.00","discPrice":"20.00"},{"id":"18","stockId":"4","stockName":"Anchor Milk powder","quantity":"2","unitPrice":"150.00","totPrice":"300.00","discPrice":"20.00"}]'),
(5, '[{"id":"19","stockId":"1","stockName":"Munchee Chocolate Biscuits","quantity":"5","unitPrice":"25.00","totPrice":"125.00","discPrice":"35.00"},{"id":"20","stockId":"3","stockName":"Munchee Lemon Puff","quantity":"2","unitPrice":"100.00","totPrice":"200.00","discPrice":"21.00"}]'),
(6, '[{"id":"22","stockId":"2","stockName":"Munchee Cream Biscuits","quantity":"2","unitPrice":"75.00","totPrice":"150.00","discPrice":"13.00"}]');
