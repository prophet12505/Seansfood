-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2023 at 09:46 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seansfoods`
--
CREATE DATABASE IF NOT EXISTS `seansfoods` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `seansfoods`;

-- --------------------------------------------------------

--
-- Table structure for table `seansfoods_products`
--

DROP TABLE IF EXISTS `seansfoods_products`;
CREATE TABLE IF NOT EXISTS `seansfoods_products` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(50) NOT NULL,
  `prod_price` double NOT NULL,
  `prod_desc` text NOT NULL,
  `prod_img` varchar(150) NOT NULL,
  `prod_meta` varchar(50) NOT NULL,
  `prod_rate` double NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `seansfoods_products`
--

INSERT INTO `seansfoods_products` (`prod_id`, `prod_name`, `prod_price`, `prod_desc`, `prod_img`, `prod_meta`, `prod_rate`) VALUES
(1, 'burger', 9.9, 'This is the burger you want', './img/products/burger.jpg', 'burger', 5),
(2, 'Baked potato', 19.99, 'A baked potato', './img/products/baked-potato.png', 'baked-potato', 4);

-- --------------------------------------------------------

--
-- Table structure for table `seansfoods_users`
--

DROP TABLE IF EXISTS `seansfoods_users`;
CREATE TABLE IF NOT EXISTS `seansfoods_users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `seansfoods_users`
--

INSERT INTO `seansfoods_users` (`userid`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'Hongxin', 'Ouyang', 'seansfoods', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
