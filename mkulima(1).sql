-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 13, 2018 at 05:05 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mkulima`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `county` varchar(75) NOT NULL,
  `id` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `county`, `id`) VALUES
('admin', 'b3aca92c793ee0e9b1a9b0a5f5fc044e05140df3', 'nakuru', 1000000032);

-- --------------------------------------------------------

--
-- Table structure for table `county`
--

DROP TABLE IF EXISTS `county`;
CREATE TABLE IF NOT EXISTS `county` (
  `name` varchar(100) NOT NULL,
  `number` int(3) NOT NULL,
  PRIMARY KEY (`number`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `county`
--

INSERT INTO `county` (`name`, `number`) VALUES
('Mombasa', 1),
('Nairobi', 47),
('Uasin Gishu', 27),
('Nakuru', 32),
('Laikipia', 31),
('Baringo', 30);

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

DROP TABLE IF EXISTS `market`;
CREATE TABLE IF NOT EXISTS `market` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `saletype` varchar(6) NOT NULL,
  `saleprice` decimal(20,2) NOT NULL,
  `receipt` int(11) NOT NULL AUTO_INCREMENT,
  `stamp` date DEFAULT NULL,
  UNIQUE KEY `receipt` (`receipt`) USING BTREE,
  KEY `name` (`name`,`price`),
  KEY `id` (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11124 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`id`, `name`, `price`, `quantity`, `saletype`, `saleprice`, `receipt`, `stamp`) VALUES
(33333333, 'maize', '1900.00', 20, 'sell', '190000.00', 11116, '2018-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `new_admin`
--

DROP TABLE IF EXISTS `new_admin`;
CREATE TABLE IF NOT EXISTS `new_admin` (
  `name` varchar(75) NOT NULL,
  `passkey` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_admin`
--

INSERT INTO `new_admin` (`name`, `passkey`, `id`) VALUES
('admin', 'b3aca92c793ee0e9b1a9b0a5f5fc044e05140df3', 999966669),
('admin', 'b3aca92c793ee0e9b1a9b0a5f5fc044e05140df3', 999966669);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `name` varchar(75) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`name`, `price`, `type`) VALUES
('maize', '2111.50', 'cereals'),
('bean', '2650.00', 'cereals'),
('irish-potatoes', '795.45', 'tubers'),
('banana', '705.99', 'fruit');

-- --------------------------------------------------------

--
-- Table structure for table `soko`
--

DROP TABLE IF EXISTS `soko`;
CREATE TABLE IF NOT EXISTS `soko` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `saletype` varchar(5) NOT NULL,
  `saleprice` decimal(11,2) NOT NULL,
  `receipt` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`receipt`),
  KEY `id` (`id`),
  KEY `price` (`price`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=12002 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soko`
--

INSERT INTO `soko` (`id`, `name`, `price`, `quantity`, `saletype`, `saleprice`, `receipt`) VALUES
(32135878, 'maize', '1900.00', 10, 'buy', '19000.00', 11116);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `firstname` varchar(75) NOT NULL,
  `lastname` varchar(75) NOT NULL,
  `id` int(10) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `county` varchar(75) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstname`, `lastname`, `id`, `phone`, `email`, `county`, `password`, `type`) VALUES
('trizah', 'kimani', 32135878, 711703017, 'trizah@gmail.com', 'Uasin Gishu', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'farmer'),
('cephas', 'wangai', 33333333, 727043222, 'cephas@gmail.com', 'Nakuru', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'farmer'),
('elizabeth', 'waithera', 12457896, 722173937, 'elish@gmail.com', 'Nakuru', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'trader'),
('john', 'mwangi', 32951241, 710783003, 'john@gmail.com', 'Nakuru', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'farmer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
