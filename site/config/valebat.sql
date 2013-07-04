-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 04, 2013 at 08:18 PM
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
  `deck` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `card` int(11) NOT NULL,
  PRIMARY KEY (`deck`,`position`),
  KEY `deck` (`deck`),
  KEY `card` (`card`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vale_deck_names`
--

CREATE TABLE IF NOT EXISTS `vale_deck_names` (
  `deck` int(11) NOT NULL AUTO_INCREMENT,
  `owner` int(11) NOT NULL,
  `name` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`deck`),
  KEY `owner` (`owner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vale_settings`
--

CREATE TABLE IF NOT EXISTS `vale_settings` (
  `owner` int(11) NOT NULL,
  `decks` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`owner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vale_settings`
--

INSERT INTO `vale_settings` (`owner`, `decks`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vale_users`
--

CREATE TABLE IF NOT EXISTS `vale_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vale_users`
--

INSERT INTO `vale_users` (`id`, `username`, `password`, `email`) VALUES
(1, 'ben', 'sha256:1000:LmRgeknxqUOCrk53BfcVy/mb1V+JN3Jm:zCcgkvLqfdC4iJm+zkKFkYvIfAibnOOo', 'ben@walkerbox.co.uk');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vale_decks`
--
ALTER TABLE `vale_decks`
  ADD CONSTRAINT `vale_decks_ibfk_1` FOREIGN KEY (`deck`) REFERENCES `vale_deck_names` (`deck`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vale_deck_names`
--
ALTER TABLE `vale_deck_names`
  ADD CONSTRAINT `vale_deck_names_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `vale_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vale_settings`
--
ALTER TABLE `vale_settings`
  ADD CONSTRAINT `vale_settings_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `vale_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
