-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2016 at 08:44 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dsystems`
--

-- --------------------------------------------------------

--
-- Table structure for table `bot_sense`
--

CREATE TABLE IF NOT EXISTS `bot_sense` (
  `id_bot_sense` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(300) NOT NULL,
  `response` text NOT NULL,
  PRIMARY KEY (`id_bot_sense`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `bot_sense`
--

INSERT INTO `bot_sense` (`id_bot_sense`, `message`, `response`) VALUES
(1, '/start', 'I can help you manage your cloud account.%0A%0AYou can control me by sending these commands:%0A%0A*Folder Options*%0A/newfolder - create a new folder%0A/renamefolder - rename a folder%0A/deletefolder - delete a folder%0A/movefolder - move folder%0A/copyfolder - copy folder%0A/list - shows list of files and folders%0A%0A*File Options*%0A/uploadfile - upload file%0A/renamefile - rename a file%0A/deletefile - delete a file%0A/movefile - move file%0A/copyfile - copy file%0A/list - shows list of files and folders '),
(2, '/help', 'I can help you manage your cloud account.%0A%0AYou can control me by sending these commands:%0A%0A*Folder Options*%0A/newfolder - create a new folder%0A/renamefolder - rename a folder%0A/deletefolder - delete a folder%0A/movefolder - move folder%0A/copyfolder - copy folder%0A/list - shows list of files and folders%0A%0A*File Options*%0A/uploadfile - upload file%0A/renamefile - rename a file%0A/deletefile - delete a file%0A/movefile - move file%0A/copyfile - copy file%0A/list - shows list of files and folders '),
(3, '/newfolder', 'Alright, what should we call your folder?'),
(4, '/deletefolder', 'Ok, what folder do you want to delete?');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `idc` int(11) NOT NULL AUTO_INCREMENT,
  `idu` int(11) NOT NULL,
  `Pictures` tinyint(4) NOT NULL,
  `Music` tinyint(4) NOT NULL,
  `Videos` tinyint(4) NOT NULL,
  `Documents` tinyint(4) NOT NULL,
  `Archives` tinyint(4) NOT NULL,
  PRIMARY KEY (`idc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`idc`, `idu`, `Pictures`, `Music`, `Videos`, `Documents`, `Archives`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 5, 1, 1, 1, 1, 1),
(3, 6, 0, 1, 1, 0, 0),
(5, 9, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idu` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(256) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  PRIMARY KEY (`idu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idu`, `username`, `password`, `email`, `telephone`, `first_name`, `last_name`) VALUES
(1, 'faridibin', 'c498b237f8019500b49bcbc28987714c1b1545c1', 'faridibin@gmail.com', '+233209091275', 'Farid', 'Adam'),
(5, 'infirno', '1d2f9b3352625004c1d9992bb8fe96d87f042914', 'infirnohamza@gmail.com', '+233209092175', 'Hamza', 'Adam'),
(6, 'zara', 'd66fcc742cc640480ace083585445fd5cb3ea224', 'faridibin@gmail.com', '+233572092219', 'Zaratu', 'Adam'),
(9, 'albert74', '96d6d98fc4d8971a46b6c384394fb2566b309f2e', 'albertasare74@gmail.com', '+', 'Albert', 'Asare');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
