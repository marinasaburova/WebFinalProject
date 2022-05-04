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

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2022 at 07:55 PM
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
(0000000001, 'marina@gmail.com', '$2y$10$PMMWInZZYD3H.wmCc8kEFenORHTlAWHZ0N99ke0L/udypkIaUGk2C', 'Marina', 'Saburova', 'Marina', 'Saburova', '1 Normal Ave', NULL, 'Montclair', 'NJ', 07043, '2022-04-23 20:14:42', 'active'),
(0000000002, 'kelsey@gmail.com', '$2y$10$i1D9cQHT9R21gFDjZv3vE.iTFTabTBrahyEXRgujTv2oUQFZ0mWVS', 'Kelsey', 'Nyman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-23 20:22:25', 'active'),
(0000000004, 'sharpay@gmail.com', '$2y$10$WacD08gqa5Rs4P.C7hlAJeYPid7bQ5wSP56gigyWcPg0JrVq.pBfq', 'Sharpay', 'Evans', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-29 13:16:29', 'active'),
(0000000005, 'london@tipton.com', '$2y$10$/CKCAvZJiK7TltwhThhjXOrh4rux/A6QyXpIXbD64DUybfrTqlUuO', 'London', 'Tipton', 'London', 'Tipton', '128 St. James Street', 'Suite 504', 'Boston', 'MA', 01820, '2022-04-29 13:17:16', 'active');

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
(0000000001, 'Elise Bag', '53.00', 8, 'bags', 'black', 'leather', 'A gorgeous and simple black bag. This is a great staple piece to have!', 'leather, bag, purse, minimal, black, simple, classic, staple'),
(0000000002, 'Clara Belt', '15.00', 48, 'belts', 'white', 'faux leather', 'This simple white faux leather belt with gold details is a perfect way to spice up any outfit!', 'gold, faux leather, belt, simple, minimal, classic, classy, staple, cute, feminine, chic'),
(0000000003, 'Rosella Sunglasses', '15.00', 28, 'sunglasses', 'pink', 'metal', 'Metal frame sunglasses with gorgeous pink reflective lenses! ', 'girly, cute, pink, feminine, classy, bold, rose gold, statement, reflective, mirror'),
(0000000004, 'Merliah Sunglasses', '15.00', 59, 'sunglasses', 'blue', 'metal', 'Feel the summer breeze with these metal frame sunglasses with a teal reflective lens. So cool!', 'beachy, cute, teal, blue, bold, summer, light blue, reflective, mirror'),
(0000000005, 'Silver Square Watch', '50.00', 50, 'watches', 'silver', 'metal', 'A simple watch with a more masculine feel, thanks to the square face. However, the silver metal band still feels luxe. ', 'luxe, masculine, bold, rectangle, square, metal, silver, chain'),
(0000000006, 'Rose Gold Watch', '50.00', 48, 'watches', 'rose gold', 'metal', 'Cute rose gold watch', 'rose gold, cute, girly'),
(0000000007, 'Anna Wallet', '50.00', 48, 'bags', 'pink', 'faux leather', 'A classic choice: the light pink wallet. This is a gorgeous choice! The pink is subtle and feminine. ', 'girly, pink, minimal, simple, gold details, classic, classy, chic, feminine'),
(0000000008, 'White Belt with Gold Details', '20.00', 50, 'belts', 'white', 'faux leather', 'Minimal white belt with gold details', 'simple, minimal, clean'),
(0000000009, 'Pink Belt', '20.00', 48, 'belts', 'pink', 'faux leather', 'Girly pink belt', 'girly, pink, feminine'),
(0000000010, 'Jane Watch', '60.12', 47, 'watches', 'white', 'leather', 'A small leather watch with gorgeous gold details. Perfect for a minimalist who still wants to look chic!', 'minimal, simple, white, gold, metal, watch, small'),
(0000000011, 'Stevie Watch', '40.15', 48, 'watches', 'white', 'fabric', 'A watch with a simple fabric strap and gold details. The strap makes it super adjustable, and can be switched out for other ones! ', 'simple, white, minimal, practical, gold'),
(0000000012, 'Fae Gold Watch', '70.12', 49, 'watches', 'gold', 'metal', 'A glamorous gold watch with a fine-mesh chain. This watch is very sparkly and will grab people\'s attention! ', 'glamorous, feminine, glam, chic, gold, sparkle, shiny, extra, gold, chain, metal'),
(0000000013, 'Aspen Watch', '55.10', 50, 'watches', 'red', 'leather', 'The Aspen watch is timeless with it\'s beautiful deep burgundy color. Perfect for a classic look.', 'classic, burgundy, red, leather, leather strap, timeless, old fashioned'),
(0000000014, 'London Watch', '74.50', 50, 'watches', 'black', 'leather', 'This is a classic watch with silver details and a black leather strap. Perfect for cold days in London, for example. ', 'classy, classic, dark, black, silver, timeless, minimal, simple'),
(0000000015, 'Sophie Leather Shoulder Bag', '50.00', 48, 'bags', 'brown', 'faux leather', 'A faux leather bag in a classic brown shade. This is perfect for autumnal outfits or someone with a boho style. Bonus: you can fit a lot in here!', 'boho, country, autumn, fall, warm, brown, leather, shoulder bag'),
(0000000016, 'Amie Wallet', '30.10', 50, 'bags', 'pink', 'faux leather', 'This hot pink clutch is bound to gain attention! Vibrant colors are in this season. ', 'hot pink, bright, vibrant, colorful, wallet, clutch, small bag, purse, flashy, extra, glam'),
(0000000017, 'Dove Leather Wallet', '40.00', 49, 'bags', 'white', 'leather', 'This is a classic piece for any simple gal, with delicate white leather and gold details. The shade is perfect: not too stark white, but not too dirty. ', 'minimal, simple, gold details, wallet, clutch, small, white, light'),
(0000000018, 'Belle Card Holder', '20.50', 49, 'bags', 'blue', 'leather', 'A super tiny but practical card holder with many compartments.', 'baby blue, light blue, card holder, clutch, handheld, leather, girly, cute, simple, minimal'),
(0000000019, 'Classic White Shoulder Bag', '70.00', 48, 'bags', 'white', 'leather', 'A large white bag, which is perfect for almost everyone. You can\'t go wrong with this color!', 'simple, white, large bag, shoulder bag, big, minimal, classic, cute'),
(0000000020, 'Main Character Sunnies', '30.00', 50, 'sunglasses', 'nude', 'metal', 'Off-white metal frame sunglasses with an awesome ombre lens. ', 'statement, brown, nude, neutral, off-white, ombre, glasses'),
(0000000021, 'Chunky Sunglasses', '40.00', 50, 'sunglasses', 'cream', 'plastic', 'Statement sunglasses with a chunky nude plastic frame. ', 'statement, plastic, chunky, large, big, glam, nude, neutral, off-white, off white');

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
(0000000054, 0000000001, 'marina@gmail.com', '160.12', '5.00', '8.01', 'placed', '2022-05-04 17:46:16', 'Marina', 'Saburova', '1 Normal Ave', NULL, 'Montclair', 'NJ', 07043),
(0000000055, 0000000001, 'marina@gmail.com', '83.00', '5.00', '4.15', 'placed', '2022-05-04 17:47:11', 'Marina', 'Saburova', '1 Normal Ave', NULL, 'Montclair', 'NJ', 07043),
(0000000056, 0000000001, 'marina@gmail.com', '70.50', '5.00', '3.53', 'placed', '2022-05-04 17:49:29', 'Marina', 'Saburova', '1 Normal Ave', NULL, 'Montclair', 'NJ', 07043),
(0000000057, NULL, 'sophie@gmail.com', '120.12', '5.00', '6.01', 'placed', '2022-05-04 17:53:05', 'Sophie', 'Sheridan', '1 Mykonos St.', NULL, 'Bridgewater', 'NJ', 08521),
(0000000058, 0000000005, 'london@tipton.com', '603.54', '5.00', '30.18', 'placed', '2022-05-04 17:54:50', 'London', 'Tipton', '128 St. James Street', 'Suite 504', 'Boston', 'MA', 01820);

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
(0000000054, 0000000003, 2, '15.00'),
(0000000054, 0000000007, 1, '50.00'),
(0000000054, 0000000009, 1, '20.00'),
(0000000054, 0000000010, 1, '60.12'),
(0000000055, 0000000002, 1, '15.00'),
(0000000055, 0000000001, 1, '53.00'),
(0000000055, 0000000004, 1, '15.00'),
(0000000056, 0000000015, 1, '50.00'),
(0000000056, 0000000018, 1, '20.50'),
(0000000057, 0000000015, 1, '50.00'),
(0000000057, 0000000012, 1, '70.12'),
(0000000058, 0000000001, 1, '53.00'),
(0000000058, 0000000007, 1, '50.00'),
(0000000058, 0000000006, 2, '50.00'),
(0000000058, 0000000011, 2, '40.15'),
(0000000058, 0000000017, 1, '40.00'),
(0000000058, 0000000019, 2, '70.00'),
(0000000058, 0000000009, 1, '20.00'),
(0000000058, 0000000010, 2, '60.12');

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
  MODIFY `customerID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

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