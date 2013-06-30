-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2013 at 11:56 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `valebat`
--

-- --------------------------------------------------------

--
-- Table structure for table `vale_decks`
--

CREATE TABLE IF NOT EXISTS `vale_decks` (
  `owner` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `card1` int(11) DEFAULT NULL,
  `card2` int(11) DEFAULT NULL,
  `card3` int(11) DEFAULT NULL,
  `card4` int(11) DEFAULT NULL,
  `card5` int(11) DEFAULT NULL,
  `card6` int(11) DEFAULT NULL,
  `card7` int(11) DEFAULT NULL,
  `card8` int(11) DEFAULT NULL,
  `card9` int(11) DEFAULT NULL,
  `card10` int(11) DEFAULT NULL,
  `card11` int(11) DEFAULT NULL,
  `card12` int(11) DEFAULT NULL,
  `card13` int(11) DEFAULT NULL,
  `card14` int(11) DEFAULT NULL,
  `card15` int(11) DEFAULT NULL,
  `card16` int(11) DEFAULT NULL,
  `card17` int(11) DEFAULT NULL,
  `card18` int(11) DEFAULT NULL,
  `card19` int(11) DEFAULT NULL,
  `card20` int(11) DEFAULT NULL,
  `card21` int(11) DEFAULT NULL,
  `card22` int(11) DEFAULT NULL,
  `card23` int(11) DEFAULT NULL,
  `card24` int(11) DEFAULT NULL,
  `card25` int(11) DEFAULT NULL,
  `card26` int(11) DEFAULT NULL,
  `card27` int(11) DEFAULT NULL,
  `card28` int(11) DEFAULT NULL,
  `card29` int(11) DEFAULT NULL,
  `card30` int(11) DEFAULT NULL,
  `card31` int(11) DEFAULT NULL,
  `card32` int(11) DEFAULT NULL,
  `card33` int(11) DEFAULT NULL,
  `card34` int(11) DEFAULT NULL,
  `card35` int(11) DEFAULT NULL,
  `card36` int(11) DEFAULT NULL,
  `card37` int(11) DEFAULT NULL,
  `card38` int(11) DEFAULT NULL,
  `card39` int(11) DEFAULT NULL,
  `card40` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vale_users`
--

CREATE TABLE IF NOT EXISTS `vale_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
