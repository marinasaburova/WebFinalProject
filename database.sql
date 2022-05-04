DROP DATABASE IF EXISTS kelarinadatabase;
CREATE DATABASE kelarinadatabase;
USE kelarinadatabase;  -- MySQL command
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2022 at 03:12 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelarinadatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `shipFirstName` varchar(30) DEFAULT NULL,
  `shipLastName` varchar(30) DEFAULT NULL,
  `shipStreet` varchar(30) DEFAULT NULL,
  `shipStreet2` varchar(30) DEFAULT NULL,
  `shipCity` varchar(30) DEFAULT NULL,
  `shipState` char(2) DEFAULT NULL,
  `shipZip` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `dateJoined` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `email`, `password`, `firstName`, `lastName`, `shipFirstName`, `shipLastName`, `shipStreet`, `shipStreet2`, `shipCity`, `shipState`, `shipZip`, `dateJoined`, `status`) VALUES
(0000000001, 'marina@gmail.com', '$2y$10$PMMWInZZYD3H.wmCc8kEFenORHTlAWHZ0N99ke0L/udypkIaUGk2C', 'Marina', 'Saburova', 'Marina', 'Saburova', '22 Normal Ave', NULL, 'Montclair', 'NJ', 07043, '2022-04-23 20:14:42', 'active'),
(0000000002, 'kelsey@gmail.com', '$2y$10$i1D9cQHT9R21gFDjZv3vE.iTFTabTBrahyEXRgujTv2oUQFZ0mWVS', 'Kelsey', 'Nyman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-23 20:22:25', 'active'),
(0000000003, 'marina2@gmail.com', '$2y$10$EApJZ5hxCoW6NfBaGm0hNOVZVG.0sUCiM13KvrwGwCOKTPO/OXVrG', 'Marina2', 'Saburova', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-29 13:16:09', 'active'),
(0000000004, 'sharpay@gmail.com', '$2y$10$WacD08gqa5Rs4P.C7hlAJeYPid7bQ5wSP56gigyWcPg0JrVq.pBfq', 'Sharpay', 'Evans', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-29 13:16:29', 'active'),
(0000000005, 'london@tipton.com', '$2y$10$/CKCAvZJiK7TltwhThhjXOrh4rux/A6QyXpIXbD64DUybfrTqlUuO', 'London', 'Tipton', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-29 13:17:16', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'active',
  `dateJoined` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `email`, `password`, `firstName`, `lastName`, `status`, `dateJoined`) VALUES
(0000000001, 'marina@employee.com', '$2y$10$bxj21X.977yyLtHrTWvzYeZfXe4w0Evg6eczzv11G1Jylnd5afrBC', 'Marina', 'TheEmployee', 'active', '2022-04-27 19:04:55'),
(0000000002, 'kelsey@employee.com', '$2y$10$uDPxAqS.ez9DXCnZC/vEI.TcQiQIN3FdtP87cg413AeCpTOomyn4S', 'Kelsey', 'TheEmployee', 'active', '2022-04-27 19:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` decimal(5,2) UNSIGNED NOT NULL,
  `quantity` int(3) UNSIGNED NOT NULL,
  `category` varchar(15) NOT NULL,
  `color` varchar(15) NOT NULL,
  `material` varchar(15) NOT NULL,
  `description` text DEFAULT NULL,
  `tags` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemID`, `name`, `price`, `quantity`, `category`, `color`, `material`, `description`, `tags`) VALUES
(0000000001, 'Bag1', '10.00', 1, 'bags', 'black', 'leather', 'A gorgeous and simple black bag. ', 'leather, bag, purse, minimal'),
(0000000002, 'Belt1', '15.00', 49, 'belt', 'white', 'faux leather', 'A simple faux leather belt with gold details. ', 'gold, faux leather, belt, simple, minimal'),
(0000000003, 'Sunglasses1', '10.00', 77, 'sunglasses', 'pink', 'metal', 'Metal frame sunglasses with a pink border. ', 'girly, cute, pink, feminine'),
(0000000004, 'Sunglasses2', '10.00', 79, 'sunglasses', 'blue', 'metal', 'Metal frame sunglasses with a teal border. ', 'beachy, cute, teal, blue, feminine'),
(0000000005, 'Silver Watch', '50.00', 50, 'watches', 'silver', 'metal', 'silver simple watch', 'minimal'),
(0000000006, 'Rose Gold Watch', '50.00', 50, 'watches', 'rose gold', 'metal', 'Cute rose gold watch', 'rose gold, cute, girly'),
(0000000007, 'Pink Wallet', '50.00', 50, 'bags', 'pink', 'faux leather', 'Cute pink wallet', 'girly, pink'),
(0000000008, 'White Belt with Gold Details', '20.00', 50, 'belts', 'white', 'faux leather', 'Minimal white belt with gold details', 'simple, minimal, clean'),
(0000000009, 'Pink Belt', '20.00', 50, 'belts', 'pink', 'faux leather', 'Girly pink belt', 'girly, pink, feminine');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `customerID` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `itemsPrice` decimal(7,2) UNSIGNED NOT NULL,
  `shipping` decimal(4,2) UNSIGNED NOT NULL,
  `tax` decimal(4,2) UNSIGNED NOT NULL,
  `status` varchar(15) NOT NULL,
  `timePlaced` timestamp NOT NULL DEFAULT current_timestamp(),
  `shipFirstName` varchar(30) NOT NULL,
  `shipLastName` varchar(30) NOT NULL,
  `shipStreet` varchar(30) NOT NULL,
  `shipStreet2` varchar(30) DEFAULT NULL,
  `shipCity` varchar(30) NOT NULL,
  `shipState` char(2) NOT NULL,
  `shipZip` int(5) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `customerID`, `email`, `itemsPrice`, `shipping`, `tax`, `status`, `timePlaced`, `shipFirstName`, `shipLastName`, `shipStreet`, `shipStreet2`, `shipCity`, `shipState`, `shipZip`) VALUES
(0000000020, 0000000001, 'marina@gmail.com', '40.00', '5.00', '2.00', 'placed', '2022-04-27 01:23:28', 'Marina', 'Saburova', '1 Normal Ave', NULL, 'Montclair', 'NJ', 07043),
(0000000021, NULL, 'glnsbr@gmail.com', '105.00', '5.00', '5.25', 'placed', '2022-04-27 01:25:34', 'Galina', 'Saburova', '1 Normal Ave', NULL, 'Montclair', 'NJ', 07043),
(0000000022, 0000000001, 'marina@gmail.com', '60.00', '5.00', '3.00', 'placed', '2022-04-27 01:27:22', 'Marina', 'Saburova', '1 Normal Ave', NULL, 'Montclair', 'NJ', 07043),
(0000000023, NULL, 'sharpay@gmail.com', '55.00', '5.00', '2.75', 'placed', '2022-04-27 12:51:57', 'Sharpay', 'Evans', '4 Wildcat Ave', NULL, 'Albuquerque', 'NM', 74385),
(0000000031, 0000000001, 'marina@gmail.com', '30.00', '5.00', '1.50', 'placed', '2022-04-27 13:07:41', 'Marina', 'Saburova', '1 Normal Ave', NULL, 'Montclair', 'NJ', 07043),
(0000000032, 0000000001, 'marina@gmail.com', '30.00', '5.00', '1.50', 'placed', '2022-04-27 13:09:12', 'Marina', 'Saburova', '2 Normal Ave', NULL, 'Montclair', 'NJ', 07043),
(0000000033, 0000000001, 'marina@gmail.com', '65.00', '5.00', '3.25', 'placed', '2022-04-27 13:10:18', 'Marina', 'Saburova', '126 S 14th Ave', NULL, 'Manville', 'NJ', 08835),
(0000000034, 0000000001, 'marina@gmail.com', '20.00', '5.00', '1.00', 'placed', '2022-04-27 18:02:29', 'Marina', 'Saburova', '1 Normal Ave', NULL, 'Montclair', 'NJ', 07043),
(0000000037, 0000000001, 'marina@gmail.com', '10.00', '5.00', '0.50', 'placed', '2022-04-27 18:05:59', 'Marina', 'Saburova', '1 Normal Ave', NULL, 'Montclair', 'NJ', 07043),
(0000000038, 0000000001, 'marina@gmail.com', '35.00', '5.00', '1.75', 'placed', '2022-04-27 18:08:02', 'Marina', 'Saburova', '1 Normal Ave', NULL, 'Montclair', 'NJ', 07043),
(0000000039, 0000000001, 'marina@gmail.com', '10.00', '5.00', '0.50', 'placed', '2022-04-27 18:11:35', 'Marina', 'Saburova', '1 Normal Ave', NULL, 'Montclair', 'NJ', 07043),
(0000000041, 0000000001, 'marina@gmail.com', '10.00', '5.00', '0.50', 'placed', '2022-04-27 18:16:16', 'Marina', 'Saburova', '1 Normal Ave', NULL, 'Montclair', 'NJ', 07043),
(0000000042, 0000000001, 'marina@gmail.com', '10.00', '5.00', '0.50', 'placed', '2022-04-27 18:17:20', 'Marina', 'Saburova', '1 Normal Ave', NULL, 'Montclair', 'NJ', 07043),
(0000000043, 0000000001, 'marina@gmail.com', '20.00', '5.00', '1.00', 'placed', '2022-04-27 23:55:31', 'Marina', 'Saburova', '1 Normal Ave', NULL, 'Montclair', 'NJ', 07043),
(0000000044, 0000000001, 'marina@gmail.com', '10.00', '5.00', '0.50', 'placed', '2022-04-28 15:30:24', 'Marina', 'Saburova', '26 Normal Ave', NULL, 'Montclair', 'NJ', 07043),
(0000000045, 0000000001, 'marina@gmail.com', '25.00', '5.00', '1.25', 'placed', '2022-04-28 15:46:24', 'Marina', 'Saburova', '22 Normal Ave', NULL, 'Montclair', 'NJ', 07043),
(0000000046, 0000000001, 'marina@gmail.com', '10.00', '5.00', '0.50', 'placed', '2022-04-28 15:51:04', 'Marina', 'Saburova', '1 Normal Ave', NULL, 'Montclair', 'NJ', 07043),
(0000000047, 0000000001, 'marina@gmail.com', '10.00', '5.00', '0.50', 'placed', '2022-04-28 15:52:13', 'Marina', 'Saburova', '1 Normal Ave', NULL, 'Montclair', 'NJ', 07043),
(0000000048, 0000000001, 'marina@gmail.com', '10.00', '5.00', '0.50', 'placed', '2022-04-28 16:54:39', 'Marina', 'Saburova', '1 Normal Ave', NULL, 'Montclair', 'NJ', 07043),
(0000000049, 0000000001, 'marina@gmail.com', '25.00', '5.00', '1.25', 'placed', '2022-04-28 17:05:21', 'Marina', 'Saburova', '22 Normal Ave', NULL, 'Montclair', 'NJ', 07043),
(0000000050, 0000000001, 'marina@gmail.com', '65.00', '5.00', '3.25', 'placed', '2022-05-01 19:43:54', 'Marina', 'Saburova', '22 Normal Ave', NULL, 'Montclair', 'NJ', 07043),
(0000000051, 0000000001, 'marina@gmail.com', '65.00', '5.00', '3.25', 'placed', '2022-05-01 19:46:01', 'Marina', 'Saburova', '22 Normal Ave', NULL, 'Montclair', 'NJ', 07043),
(0000000052, 0000000001, 'marina@gmail.com', '60.00', '5.00', '3.00', 'placed', '2022-05-01 20:55:08', 'Marina', 'Saburova', '22 Normal Ave', NULL, 'Montclair', 'NJ', 07043);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `orderID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `itemID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `quantity` int(3) UNSIGNED NOT NULL,
  `price` decimal(5,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`orderID`, `itemID`, `quantity`, `price`) VALUES
(0000000020, 0000000001, 1, '10.00'),
(0000000020, 0000000004, 3, '10.00'),
(0000000021, 0000000002, 7, '15.00'),
(0000000022, 0000000001, 1, '10.00'),
(0000000022, 0000000003, 4, '10.00'),
(0000000022, 0000000004, 1, '10.00'),
(0000000023, 0000000001, 1, '10.00'),
(0000000023, 0000000002, 3, '15.00'),
(0000000031, 0000000001, 2, '10.00'),
(0000000031, 0000000004, 1, '10.00'),
(0000000032, 0000000001, 2, '10.00'),
(0000000032, 0000000004, 1, '10.00'),
(0000000033, 0000000001, 2, '10.00'),
(0000000033, 0000000004, 3, '10.00'),
(0000000033, 0000000002, 1, '15.00'),
(0000000034, 0000000001, 1, '10.00'),
(0000000034, 0000000003, 1, '10.00'),
(0000000037, 0000000001, 1, '10.00'),
(0000000038, 0000000004, 1, '10.00'),
(0000000038, 0000000001, 1, '10.00'),
(0000000038, 0000000002, 1, '15.00'),
(0000000039, 0000000001, 1, '10.00'),
(0000000041, 0000000003, 1, '10.00'),
(0000000042, 0000000003, 1, '10.00'),
(0000000043, 0000000001, 1, '10.00'),
(0000000043, 0000000003, 1, '10.00'),
(0000000044, 0000000001, 1, '10.00'),
(0000000045, 0000000001, 1, '10.00'),
(0000000045, 0000000002, 1, '15.00'),
(0000000046, 0000000001, 1, '10.00'),
(0000000047, 0000000001, 1, '10.00'),
(0000000048, 0000000004, 1, '10.00'),
(0000000049, 0000000003, 1, '10.00'),
(0000000049, 0000000002, 1, '15.00'),
(0000000050, 0000000004, 1, '10.00'),
(0000000051, 0000000004, 1, '10.00'),
(0000000051, 0000000002, 1, '15.00'),
(0000000051, 0000000001, 4, '10.00'),
(0000000052, 0000000003, 3, '10.00'),
(0000000052, 0000000001, 3, '10.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`),
  ADD UNIQUE KEY `customerID` (`customerID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeID`),
  ADD UNIQUE KEY `employeeID` (`employeeID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`),
  ADD UNIQUE KEY `itemID` (`itemID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD UNIQUE KEY `orderID` (`orderID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD KEY `orderID` (`orderID`),
  ADD KEY `itemID` (`itemID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


GRANT SELECT, INSERT, DELETE, UPDATE
ON kelarinadatabase.*
TO kelarina@localhost
IDENTIFIED BY 'kelarinapass';