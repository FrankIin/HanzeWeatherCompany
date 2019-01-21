-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 21, 2019 at 12:37 AM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(300) NOT NULL,
  `date_of_birth` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `date_of_birth`, `username`, `pass`, `email`) VALUES
(1, '', '0000-00-00', 'asdw', 'qweqweasdasd', 'a@a.com'),
(2, '', '0000-00-00', 'kevin', 'asdasdasd', 'keviny.19933@gmail.com'),
(3, '', '0000-00-00', 'Mark', 'qweqweqwe', 'mark@hanze.nl'),
(4, '', '0000-00-00', 'weqea', 'qweqweqwe', 'weqea@aeqea.com'),
(7, 'Kevin Jakoebian', '1993-09-25', 'kevinj93', 'kevinkevin', 'kevin@hanze.nl'),
(8, 'John Terry', '1992-01-08', 'john_terry69', 'johnjohnsexy', 'john@chelsea.com'),
(10, 'Kevin Jakoebian', '1932-12-25', 'kevina1999', 'kevinkevinkevin', 'kevin@kevin.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
