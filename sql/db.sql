-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2022 at 07:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeeshopdb`
--
CREATE DATABASE IF NOT EXISTS `coffeeshopdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `coffeeshopdb`;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `ID` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `picture` varchar(45) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ID`, `name`, `price`, `picture`, `description`, `size`) VALUES
(2, 'cappuccino', 2.6, 'cappuccino.jpg', '', 12),
(3, 'cappuccino', 3.1, 'cappuccino.jpg', '', 16),
(4, 'cappuccino', 3.6, 'cappuccino.jpg', '', 20),
(5, 'latte', 2.5, 'latte.jpg', '', 12),
(6, 'latte', 3, 'latte.jpg', '', 16),
(7, 'latte', 3.5, 'latte.jpg', '', 20),
(8, 'chai', 3, 'chai.jpg', '', 12),
(9, 'chai', 3, 'chai.jpg', '', 12),
(10, 'chai', 3.4, 'chai.jpg', '', 16),
(11, 'chai', 3.8, 'chai.jpg', '', 20),
(12, 'mocha', 3.5, 'mocha.jpg', '', 12),
(13, 'mocha', 4, 'mocha.jpg', '', 16),
(14, 'mocha', 4.5, 'mocha.jpg', '', 20),
(15, 'white chocolate', 4.5, 'whitechocolate.jpg', '', 12),
(16, 'hot chocolate', 2, 'hotchocolate.jpg', '', 12),
(17, 'hot chocolate', 2.25, 'hotchocolate.jpg', '', 16),
(18, 'hot chocolate', 2.5, 'hotchocolate.jpg', '', 20),
(19, 'ice coffee', 2, 'icecoffee.jpg', '', 16),
(20, 'fresh brew', 1.5, 'freshbrew.jpg', '', 12),
(21, 'fresh brew', 1.7, 'freshbrew.jpg', '', 16),
(22, 'fresh brew', 2, 'freshbrew.jpg', '', 20),
(26, 'cuban brew', 2.75, 'cubanbrew.jpg', '', 12),
(27, 'cuban brew', 3.25, 'cubanbrew.jpg', '', 16),
(28, 'cuban brew', 3.75, 'cubanbrew.jpg', '', 20),
(29, 'ice coffee', 1.75, 'icecoffee.jpg', '', 12),
(30, 'ice coffee', 2.75, 'icecoffee.jpg', '', 20);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `items` varchar(1000) NOT NULL,
  `total` varchar(20) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `role` int(11) DEFAULT 0,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phonenum` varchar(10) DEFAULT NULL,
  `lastlogin` datetime DEFAULT current_timestamp(),
  `locked` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `fname`, `lname`, `password`, `role`, `username`, `email`, `phonenum`, `lastlogin`, `locked`) VALUES
(24, NULL, NULL, 'password', 0, 'test', NULL, NULL, '2022-03-01 21:28:54', 0),
(25, 'User1', 'Busy', 'password', 0, 'User1', 'busy@busy.com', '3212257889', '2022-02-23 21:31:58', 0),
(26, 'Shaun', 'Graham', 'ShaunG', 0, 'ShaunG', 'shaunkiliangraham@gmail.com', '', '2022-02-28 18:52:20', 0),
(27, 'Ivan', 'Miranda', 'Lim01Kmm', 0, 'ivanM', 'ivan@ivan.com', '3605089338', '2022-02-28 19:17:45', 0),
(28, 'Jose', 'Labastida', 'mycoffee', 0, 'Jose', 'jose.labastida@my.metro.edu', '1234567898', '2022-04-02 17:07:48', 0),
(29, 'Mel', 'McCormack', 'test12', 0, 'meljack', 'maus93.mm@gmail.com', '', '2022-02-28 19:23:27', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
