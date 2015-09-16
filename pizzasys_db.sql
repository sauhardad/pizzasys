-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 16, 2015 at 07:42 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pizzasys_db`
--
CREATE DATABASE IF NOT EXISTS `pizzasys_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pizzasys_db`;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('966f3ecb0c5106c7be491b0182970443', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:36.0) Gecko/20100101 Firefox/36.0', 1442381824, 'a:1:{s:9:"logged_in";a:2:{s:2:"id";s:1:"1";s:5:"email";s:19:"sauhardad@gmail.com";}}'),
('bc13af72f71e5bf790f8d21968ab828a', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.81 Safari/537.36', 1442381174, 'a:2:{s:9:"user_data";s:0:"";s:11:"data_values";a:5:{s:8:"size_val";s:1:"2";s:9:"crust_val";s:1:"4";s:9:"sauce_val";s:1:"1";s:10:"cheese_val";s:1:"2";s:16:"toppings_arr_val";a:2:{i:0;s:1:"2";i:1;s:1:"3";}}}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cheese`
--

DROP TABLE IF EXISTS `tbl_cheese`;
CREATE TABLE IF NOT EXISTS `tbl_cheese` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_cheese`
--

INSERT INTO `tbl_cheese` (`id`, `name`) VALUES
(1, 'Mozzarella'),
(2, 'Provolone'),
(3, 'Italian Hard Cheeses'),
(4, 'Smoked Gouda'),
(5, 'Blue Cheese'),
(6, 'Cream Cheeses');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_crust`
--

DROP TABLE IF EXISTS `tbl_crust`;
CREATE TABLE IF NOT EXISTS `tbl_crust` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_crust`
--

INSERT INTO `tbl_crust` (`id`, `name`) VALUES
(1, 'Hand-kneaded or slowly-mixed thin crust'),
(2, 'Golden brown and lightly crispy'),
(3, 'Thin and crispy'),
(4, 'Over an inch thick with a spongy texture'),
(5, 'Hand tossed with love'),
(6, 'A truely greate crunchy thin crust'),
(7, 'Brooklyn style type');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `size` int(1) NOT NULL,
  `crush` int(1) DEFAULT NULL,
  `sauce` int(1) NOT NULL,
  `cheese` int(1) NOT NULL,
  `topping` varchar(255) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `size`, `crush`, `sauce`, `cheese`, `topping`, `order_time`) VALUES
(1, 2, 1, 3, 2, 'topping', '2015-09-10 21:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sauce`
--

DROP TABLE IF EXISTS `tbl_sauce`;
CREATE TABLE IF NOT EXISTS `tbl_sauce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_sauce`
--

INSERT INTO `tbl_sauce` (`id`, `name`) VALUES
(1, 'Eggplant (Aubergine) Sauce'),
(2, 'Shrimp Sauce'),
(3, 'Spinach Sauce'),
(4, 'Tuna Sauce'),
(5, 'White Sauce'),
(6, 'Sweet chilli sauce'),
(7, 'Green sauce'),
(8, 'Peppercorn sauce'),
(9, 'Tomato sauce');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_toppings`
--

DROP TABLE IF EXISTS `tbl_toppings`;
CREATE TABLE IF NOT EXISTS `tbl_toppings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_toppings`
--

INSERT INTO `tbl_toppings` (`id`, `name`) VALUES
(1, 'Red Onions'),
(2, 'Prosciutto'),
(3, 'Hamburger'),
(4, 'Anchovies'),
(5, 'Pepperoni'),
(6, 'Fried Eggplant'),
(7, 'Whole Roasted Garlic Cloves'),
(8, 'Bacon'),
(9, 'Actual Italian Sausage');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `contact_no` double NOT NULL,
  `security question` varchar(255) NOT NULL,
  `security answer` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `entry_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `password`, `Address`, `contact_no`, `security question`, `security answer`, `last_login`, `entry_timestamp`) VALUES
(1, '', 'sauhardad@gmail.com', '$2a$08$FqOeZeD0779QpjUFGeglOe9cO5o2GeL21fL4z/i0FmJTDqV4GkN3.', '', 0, '', '', '2015-09-16 11:15:54', '2015-09-16 05:30:54'),
(2, 'Nirdosh Bista', 'nirdosh@gmail.com', '$2a$08$LsgIk19.025/LLvWt.P6HeWSu.AbnovaJMdahYJQsPXO/3ETUue8i', 'Lokanthali', 0, '', '', '0000-00-00 00:00:00', '2015-09-16 02:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_order`
--

DROP TABLE IF EXISTS `tbl_user_order`;
CREATE TABLE IF NOT EXISTS `tbl_user_order` (
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`,`order_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_user_order`
--
ALTER TABLE `tbl_user_order`
  ADD CONSTRAINT `tbl_user_order_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_user_order_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
