-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 01, 2018 at 05:16 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=11116 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`id`, `name`, `price`, `quantity`, `saletype`, `saleprice`, `receipt`, `stamp`) VALUES
(0, 'name', '0.00', 0, 'NOPE', '0.00', 11111, '2018-08-31'),
(32951241, 'bean', '2400.55', 20, 'sell', '48011.00', 11112, NULL),
(32951241, 'maize', '1900.00', 20, 'sell', '38000.00', 11113, '2018-08-31'),
(32951241, 'bean', '2850.67', 20, 'sell', '57013.40', 11114, '2018-08-31'),
(32951241, 'irish-potatoes', '795.45', 20, 'sell', '15909.00', 11115, '2018-08-31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
