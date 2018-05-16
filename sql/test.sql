-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2018 at 10:06 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllUsers` ()  NO SQL
SELECT *
FROM abs_users$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `addNewUser` (`user_name` TEXT, `user_age` INT(11), `user_address` TEXT) RETURNS INT(11) NO SQL
BEGIN
INSERT INTO `user`(`name`, `age`, `address`) VALUES (user_name, user_age, user_address);
return 1;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `deleteUser` (`user_id` INT(11)) RETURNS INT(11) NO SQL
BEGIN
DELETE FROM user WHERE id = user_id;
return 1;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `updateUser` (`user_id` INT(11), `name` TEXT, `age` INT(11), `address` TEXT) RETURNS INT(11) NO SQL
BEGIN
update user set name=name, age=age, address=address where id=user_id;
RETURN 1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `abs_users`
-- (See below for the actual view)
--
CREATE TABLE `abs_users` (
`id` int(11)
,`name` text
,`age` int(11)
,`address` text
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `age` int(11) NOT NULL DEFAULT '0',
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `age`, `address`) VALUES
(1, 'user1', 15, 'Houghton St, London WC2A 2AE, UK'),
(2, 'user2', 25, '2 Temple Pl, London WC2R 3BD, UK'),
(3, 'user3', 22, 'Bankside, London SE1 9TG, UK'),
(4, 'user4', 35, '150 Albany Rd, London SE5 0AL, UK'),
(5, 'user5', 28, 'London SW12 8PB, United Kingdom'),
(6, 'test2', 15, 'test'),
(7, 'dfgjnkk', 22, 'jbj');

-- --------------------------------------------------------

--
-- Structure for view `abs_users`
--
DROP TABLE IF EXISTS `abs_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `abs_users`  AS  select `user`.`id` AS `id`,`user`.`name` AS `name`,`user`.`age` AS `age`,`user`.`address` AS `address` from `user` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
