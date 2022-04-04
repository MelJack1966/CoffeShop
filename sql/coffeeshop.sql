-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2022 at 10:06 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeeshop`
--
CREATE DATABASE IF NOT EXISTS `coffeeshop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `coffeeshop`;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL COMMENT 'Customer name',
  `size` int(30) NOT NULL COMMENT 'Food->Grams; Drink->Ounces',
  `price` varchar(11) DEFAULT NULL COMMENT 'Price',
  `type` int(2) NOT NULL COMMENT '"Food" or "Drink"',
  `description` varchar(200) DEFAULT NULL COMMENT 'Description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table contains all menu items';

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `size`, `price`, `type`, `description`) VALUES
(1, 'Espresso', 2, '9.99', 2, '2oz shot of espresso'),
(2, 'Flat White', 6, '9.99', 2, 'Steamed Milk and Espresso with a 2:1 ratio'),
(3, 'Mocha', 10, '9.99', 2, 'Steamed milk, chocolate, and espresso. 60ml chocolate, 60ml espresso, 30ml steamed milk.'),
(4, 'Macchiato', 4, '9.99', 2, 'Espresso and a dot of foamed milk on top. 4oz espresso.'),
(5, 'Caffe Latte', 16, '9.99', 2, 'Espresso, steamed milk, and a dot of foamed milk. 4 oz espresso, 12 oz steamed milk.'),
(6, 'Cappuccino', 12, '9.99', 2, 'Espresso, steamed milk, and foamed milk. 1:1:1 ratio.'),
(7, 'Americano', 10, '9.99', 2, 'Espresso and hot water. 2:3 ratio.'),
(8, 'Long Black', 10, '9.99', 2, 'Espresso is added to hot water instead of the other way around (Americano). 3:2 ratio hot water to espresso.'),
(9, 'Sandwich', 200, '9.99', 1, 'A mysterious sandwich of untold deliciousness...'),
(10, 'Brownie', 50, '9.99', 1, 'A chocolate brownie'),
(11, 'Pancake', 250, '9.99', 1, 'A pancake'),
(12, 'Cheeseburger', 300, '9.99', 1, 'A burger with a slice of cheese on it'),
(13, 'Waffle', 300, '9.99', 1, 'A waffle');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(50) NOT NULL,
  `transaction_id` int(50) NOT NULL COMMENT 'Transaction ID',
  `item_id` int(50) NOT NULL COMMENT 'Item ID',
  `temperature` int(10) DEFAULT 1 COMMENT 'Serving temperature of the drink. Some people like cold coffee...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table contains each item involved in a transaction';

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `item_id`, `temperature`) VALUES
(1, 2, 1, 1),
(2, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `temperature`
--

DROP TABLE IF EXISTS `temperature`;
CREATE TABLE `temperature` (
  `id` int(10) NOT NULL,
  `temperature` varchar(4) NOT NULL COMMENT 'Drink temperature'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temperature`
--

INSERT INTO `temperature` (`id`, `temperature`) VALUES
(1, 'Hot'),
(2, 'Cold');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `id` int(50) NOT NULL,
  `user_id` int(10) DEFAULT NULL COMMENT 'User ID',
  `name` varchar(60) DEFAULT NULL COMMENT 'Customer Name',
  `total` varchar(10) NOT NULL COMMENT 'Transaction total cost'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table contains order and customer information';

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `name`, `total`) VALUES
(2, 1, 'test transaction', '19.98');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(2) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `type`) VALUES
(1, 'FOOD'),
(2, 'DRINK');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(60) NOT NULL COMMENT 'User''s Name',
  `username` varchar(100) NOT NULL COMMENT 'Account Username',
  `password` varchar(20) NOT NULL COMMENT 'Account Password'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table contains all account information';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(1, 'Test User', 'test', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_fk` (`type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `temperature_fk` (`temperature`),
  ADD KEY `transaction_id_fk` (`transaction_id`),
  ADD KEY `item_id_fk` (`item_id`);

--
-- Indexes for table `temperature`
--
ALTER TABLE `temperature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `temperature`
--
ALTER TABLE `temperature`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `type_fk` FOREIGN KEY (`type`) REFERENCES `type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `item_id_fk` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `temperature_fk` FOREIGN KEY (`temperature`) REFERENCES `temperature` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaction_id_fk` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
