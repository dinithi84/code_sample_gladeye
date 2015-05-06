-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2014 at 02:29 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

DROP TABLE IF EXISTS `route`;
CREATE TABLE IF NOT EXISTS `route` (
  `route_id` int(11) NOT NULL,
  `route_name` varchar(100) NOT NULL,
  PRIMARY KEY (`route_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`route_id`, `route_name`) VALUES
(1, 'Barns place'),
(2, 'Rosmand place');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `joined_date` date NOT NULL,
  `route_id` int(11) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `fullname`, `email`, `telephone`, `comment`, `joined_date`, `route_id`, `availability`) VALUES
(10, 'Sameera Senarath', 'sameera.s@eyepax.com', '324324234', 'Test content by sameera.', '2014-07-21', 1, 1),
(11, 'Gayan Manikpura', 'gayan.m@eyepax.com', '435435345', 'Test content by gayan.', '2014-07-21', 2, 1),
(13, 'Chandrika', 'chandrika@gmail.com', '324324', 'Chandrika sample', '2014-07-21', 2, 1),
(14, 'Test data', 'test@gmail.com', '435435', 'test data', '2014-07-21', 2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
