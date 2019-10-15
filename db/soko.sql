-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 29, 2018 at 10:58 PM
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
-- Table structure for table `soko`
--

DROP TABLE IF EXISTS `soko`;
CREATE TABLE IF NOT EXISTS `soko` (
  `id` bigint(11) UNSIGNED NOT NULL,
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
(32951241, 'maize', '1950.00', 20, 'buy', '39000.00', 12000),
(32951241, 'bean', '2000.00', 1, 'buy', '2000.00', 12001);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
