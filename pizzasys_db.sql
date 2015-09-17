-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 17, 2015 at 10:23 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

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
('bd0ca0825d8a159661464cee16a55fc8', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.85 Safari/537.36', 1442521186, 'a:1:{s:9:"user_data";s:0:"";}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cheese`
--

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

CREATE TABLE IF NOT EXISTS `tbl_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `size` int(1) NOT NULL,
  `crush` int(1) DEFAULT NULL,
  `sauce` int(1) NOT NULL,
  `cheese` int(1) NOT NULL,
  `topping` varchar(255) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `size`, `crush`, `sauce`, `cheese`, `topping`, `order_time`) VALUES
(1, 2, 1, 3, 2, 'topping', '2015-09-10 21:08:42'),
(2, 3, 5, 3, 4, '13', '2015-09-17 19:37:18'),
(3, 2, 2, 3, 4, '23', '2015-09-17 19:50:04'),
(4, 1, 3, 4, 4, '13', '2015-09-17 19:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sauce`
--

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
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `security_question` varchar(255) DEFAULT NULL,
  `security_answer` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `entry_date` datetime DEFAULT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `email`, `password`, `security_question`, `security_answer`, `active`, `entry_date`, `last_login`) VALUES
(1, 'a@gmail.com', '123', 'A', 'B', 1, '2015-09-10 17:08:42', '2015-09-10 21:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `contact_no` double NOT NULL,
  `security_question` varchar(255) NOT NULL,
  `security_answer` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `entry_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `password`, `Address`, `contact_no`, `security_question`, `security_answer`, `last_login`, `entry_timestamp`) VALUES
(1, '', 'sauhardad@gmail.com', '$2a$08$FqOeZeD0779QpjUFGeglOe9cO5o2GeL21fL4z/i0FmJTDqV4GkN3.', '', 0, '', '', '2015-09-17 15:34:58', '2015-09-17 19:34:58'),
(2, 'Nirdosh Bista', 'nirdosh@gmail.com', '$2a$08$LsgIk19.025/LLvWt.P6HeWSu.AbnovaJMdahYJQsPXO/3ETUue8i', 'Lokanthali', 0, '', '', '0000-00-00 00:00:00', '2015-09-16 02:10:10'),
(4, 'Md Salman Ahmed', 'salman0yam@gmail.com', '$2a$08$FE.g2VoTbS0bSwAV0JAT/OKrwGDnoaKp9PkaP7TiZKJvJxY3rtmi2', '811, Magnolia', 4237731454, 'What is your name?', 'salman', '2015-09-17 15:56:38', '2015-09-17 19:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_order`
--

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
