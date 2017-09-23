-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 23, 2017 at 05:02 AM
-- Server version: 5.6.32-78.0-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wwwcreat_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE IF NOT EXISTS `poll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(7) NOT NULL,
  `question` text NOT NULL,
  `image` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flag` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`id`, `user_id`, `question`, `image`, `created_on`, `flag`) VALUES
(1, 1, 'Who is the King of Mewar ?', '81631505970553.jpeg', '2017-09-21 05:09:13', 0),
(2, 1, 'Who is not KuntiPurta ?', '', '2017-09-21 06:03:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `poll_feedback`
--

CREATE TABLE IF NOT EXISTS `poll_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `suggestion` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `poll_feedback`
--

INSERT INTO `poll_feedback` (`id`, `poll_id`, `feedback`, `user_id`, `role_id`, `suggestion`, `created_on`) VALUES
(2, 1, '1', 235, 3, 'fgfgf', '2017-09-21 11:34:46'),
(3, 1, '1', 0, 0, 'fggh', '2017-09-21 12:16:46'),
(4, 1, '1', 4, 1, 'can see b', '2017-09-21 12:34:29'),
(5, 1, '1', 4, 1, 'can see b', '2017-09-21 12:34:29'),
(6, 1, '1', 4, 1, 'can see b', '2017-09-21 12:34:29'),
(7, 1, '1', 4, 1, 'can see b', '2017-09-21 12:34:30'),
(8, 1, 'Maharana Pratap', 922, 5, 'dgdf', '2017-09-21 14:38:09'),
(9, 1, 'Maharana Kumbha', 0, 5, '', '2017-09-22 04:33:32'),
(10, 1, 'Maharana Kumbha', 1075, 5, '', '2017-09-22 06:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `poll_option`
--

CREATE TABLE IF NOT EXISTS `poll_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_id` int(11) NOT NULL,
  `poll_option` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `poll_option`
--

INSERT INTO `poll_option` (`id`, `poll_id`, `poll_option`, `user_id`, `created_on`) VALUES
(1, 1, 'Maharana Pratap', 1, '2017-09-21 05:09:13'),
(2, 1, 'Maharana Kumbha', 1, '2017-09-21 05:09:13'),
(3, 1, 'Ekling Nath ji', 1, '2017-09-21 05:09:13'),
(4, 1, 'Gagannath ji', 1, '2017-09-21 05:09:13'),
(5, 2, 'Bhim', 1, '2017-09-21 05:15:21'),
(6, 2, 'Arjun', 1, '2017-09-21 05:15:21'),
(7, 2, 'Karna', 1, '2017-09-21 05:15:21'),
(8, 2, 'Duryodhan', 1, '2017-09-21 05:15:21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
