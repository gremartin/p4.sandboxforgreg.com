-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2013 at 11:48 PM
-- Server version: 5.1.68-cll
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sandboxf_p4_sandboxforgreg_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `extension` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `photographer` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `description` text NOT NULL,
  `date_uploaded` int(11) NOT NULL,
  `date_modified` int(11) NOT NULL,
  PRIMARY KEY (`photo_id`),
  KEY `uploaded_by` (`uploaded_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_id`, `extension`, `title`, `photographer`, `year`, `uploaded_by`, `description`, `date_uploaded`, `date_modified`) VALUES
(58, 'jpg', 'Beacon Monument', 'unknown', '1900-1906', 1, 'Beacon Monument photo from Library of Congress online collection', 1387756618, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `created`, `modified`, `token`, `password`, `last_login`, `timezone`, `first_name`, `last_name`, `email`, `admin`) VALUES
(1, 0, 0, '67b2aceef83e48a07fc30487d655b6afd551af37', 'password', 0, '', 'Greg', 'Martin', 'gremartin@yahoo.com', 1),
(2, 1387164495, 1387164495, '67b2aceef83e48a07fc30487d655b6afd551af37', '7debe0754ad293bc90f89ca0681fb3857c1b602f', 0, '', 'Greg', 'Martin', 'gmartin@g.harvard.edu', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
