-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2021 at 05:38 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suburban_outfitters`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customerorderpayment`
--

DROP TABLE IF EXISTS `customerorderpayment`;
CREATE TABLE IF NOT EXISTS `customerorderpayment` (
  `PaymentID` tinyint(4) NOT NULL,
  `OrderID` tinyint(4) NOT NULL,
  PRIMARY KEY (`PaymentID`,`OrderID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `OrderID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `PaymentId` tinyint(4) NOT NULL,
  `UserId` tinyint(4) NOT NULL,
  `ShippingId` tinyint(4) NOT NULL,
  `PlacementDate` date NOT NULL,
  PRIMARY KEY (`OrderID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `PaymentID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `CardName` varchar(225) DEFAULT NULL,
  `CardNumber` char(9) DEFAULT NULL,
  `ExpirationDate` date NOT NULL,
  `SecurityCode` char(3) DEFAULT NULL,
  PRIMARY KEY (`PaymentID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

DROP TABLE IF EXISTS `productdetails`;
CREATE TABLE IF NOT EXISTS `productdetails` (
  `ProductID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(25) NOT NULL,
  `ProductDescription` varchar(130) NOT NULL,
  `ProductPrice` decimal(4,2) DEFAULT NULL,
  `Category` varchar(5) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Availability` int(11) NOT NULL,
  `FileName` varchar(225) NOT NULL,
  `FilePath` varchar(225) NOT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productdetails`
--

INSERT INTO `productdetails` (`ProductID`, `ProductName`, `ProductDescription`, `ProductPrice`, `Category`, `Gender`, `Availability`, `FileName`, `FilePath`) VALUES
(1, 'Mens Pant Style 1', 'Casual and comfortable dress wear to improve your wardrobe. Look fabulous when you return to the office, if you return.', '49.99', 'Pant', 'M', 1, 'Men_Pant1', 'Product Photos/Men_Pant1.jpg'),
(2, 'Mens Pant Style 2', 'These pants are suited for daily use in or outside of the house and deliver optimal comfort.', '49.99', 'Pant', 'M', 1, 'Men_Pant2', 'Product Photos/Men_Pant2.jpg'),
(3, 'Mens Pant Style 3', 'These green pants are sure to stay evergreen throughout wear and wash. The belt is not included.', '49.99', 'Pant', 'M', 1, 'Men_Pant3', 'Product Photos/Men_Pant3.jpg'),
(4, 'Mens Pant Style 4', 'Sleek, straight leg, cool tone pants are all the rage. Treat yourself to the luxury of wearing the hottest pair on the market.', '49.99', 'Pant', 'M', 1, 'Men_Pant4', 'Product Photos/Men_Pant4.jpg'),
(5, 'Mens Shirt Style 1', 'Business casual pink shirt for men.\r\n', '39.99', 'Shirt', 'M', 1, 'Men_Shirt1', 'Product Photos/Men_Shirt1.jpg'),
(6, 'Mens Shirt Style 2', 'Casual dress shirts for men.\r\n', '29.99', 'Shirt', 'M', 1, 'Men_Shirt2', 'Product Photos/Men_Shirt2.jpg'),
(7, 'Mens Shirt Style 3', 'Modern slick looking shirts for men.\r\n', '39.99', 'Shirt', 'M', 1, 'Men_Shirt3', 'Product Photos/Men_Shirt3.jpg'),
(8, 'Mens Shirt Style 4', 'Floral dress shirts for men.\r\n', '29.99', 'Shirt', 'M', 1, 'Men_Shirt4', 'Product Photos/Men_Shirt4.jpg'),
(9, 'Mens Shoe Style 1', 'Casual dress shoes made of indigo colored suede. Comfortable fit, elegant and stylish look.', '59.99', 'Shoe', 'M', 1, 'Men_Shoe1', 'Product Photos/Men_Shoe1.jpg'),
(10, 'Mens Shoe Style 2', 'Brown dress slip-on shoes for men.\r\n', '39.99', 'Shoe', 'M', 1, 'Men_Shoe2', 'Product Photos/Men_Shoe2.jpg'),
(11, 'Mens Shoe Style 3', 'Street casual slip-on shoes for men.', '39.99', 'Shoe', 'M', 1, 'Men_Shoe3', 'Product Photos/Men_Shoe3.jpg'),
(12, 'Mens Shoe Style 4', 'Business casual lace-up kicks for men.', '39.99', 'Shoe', 'M', 1, 'Men_Shoe4', 'Product Photos/Men_Shoe4.jpg'),
(13, 'Womens Pant Style 1', 'Women Casual, Business pant, Green,  Designed for elegance and Comfort.', '70.99', 'Pant', 'W', 1, 'Women_Pant1', 'Product Photos/Women_Pant1.jpg'),
(14, 'Womens Pant Style 2', 'Women Casual pant, Pink, Designed for elegance and Comfort\r\n', '60.99', 'Pant', 'W', 1, 'Women_Pant2', 'Product Photos/Women_Pant2.jpg'),
(15, 'Womens Pant Style 3', 'Women blue plain Business pants. Comfortable and elegance\r\n', '50.99', 'Pant', 'W', 1, 'Women_Pant3', 'Product Photos/Women_Pant3.jpg'),
(16, 'Womens Pant Style 4', 'Women pants with a lot of pockets, designed for usability.', '80.99', 'Pant', 'W', 1, 'Women_Pant4', 'Product Photos/Women_Pant4.jpg'),
(17, 'Womens Shirt Style 1', 'Women Casual, Business shirt, Tan, black, Plaid', '59.99', 'Shirt', 'W', 1, 'Women_Shirt1', 'Product Photos/Women_Shirt1.jpg'),
(18, 'Womens Shirt Style 2', 'Women Casual, Business shirt, blue, horizontal lines\r\n', '49.99', 'Shirt', 'W', 1, 'Women_Shirt2', 'Product Photos/Women_Shirt2.jpg'),
(19, 'Womens Shirt Style 3', 'Women Casual, Summer Shirt, Lavender, Design, Line\r\n', '29.99', 'Shirt', 'W', 1, 'Women_Shirt3', 'Product Photos/Women_Shirt3.jpg'),
(20, 'Womens Shirt Style 4', 'Women Casual, Business, Green/Blue shirt, light, Summer ', '29.99', 'Shirt', 'W', 1, 'Women_Shirt4', 'Product Photos/Women_Shirt4.jpg'),
(21, 'Womens Shoe Style 1', 'Business Casual & Professional, Black, Heels, Wedges, Close toe, Designed for elegance', '50.99', 'Shoe', 'W', 1, 'Women_Shoe1', 'Product Photos/Women_Shoe1.jpg'),
(22, 'Womens Shoe Style 2', 'Red, Pink butterfly shoes, Shiny, Heels, Open toe, Breathable and comfortable to wear, Designed to make you look taller', '30.99', 'Shoe', 'W', 1, 'Women_Shoe2', 'Product Photos/Women_Shoe2.jpg'),
(23, 'Womens Shoe Style 3', 'Business, Wedding & Party heels, Blue, Heels, Close toe, Pointed toe, Designed for elegance and comfort', '70.99', 'Shoe', 'W', 1, 'Women_Shoe3', 'Product Photos/Women_Shoe3.jpg'),
(24, 'Womens Shoe Style 4', 'Summer, Tan, Open toe, Breathable and comfortable to wear, Designed for summer', '40.99', 'Shoe', 'W', 1, 'Women_Shoe4', 'Product Photos/Women_Shoe4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

DROP TABLE IF EXISTS `shipping`;
CREATE TABLE IF NOT EXISTS `shipping` (
  `ShippingID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `EstimatedDeliveryDate` date NOT NULL,
  PRIMARY KEY (`ShippingID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `AccountType` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `AccountType`) VALUES
(2, 'bsmith', '$2y$10$MX1eQp5Tw2o2YvdZQmoK9eTAIp.vGb4iYz3wAWdEVd9Sjc4j3LKpe', 'admin'),
(3, 'pjones', '$2y$10$Vdut/yyD8BLHvkixSrrylu9/oFj9wv3CqCMxhbMI4n8pkdiz7Ro0W', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
