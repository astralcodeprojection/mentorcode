-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 05, 2022 at 10:12 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tttt`
--

-- --------------------------------------------------------

--
-- Table structure for table `menuitems`
--

CREATE TABLE `menuitems` (
  `itemId` int(9) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` int(90) NOT NULL,
  `descr` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menuitems`
--

INSERT INTO `menuitems` (`itemId`, `name`, `price`, `descr`) VALUES
(2, 'Cheese Quesadilla', 7, 'A blend of traditional cheeses melted in a flour totilla.'),
(3, 'Chicken Quesadilla', 7, 'A blend of traditional cheeses with grilled chicken melted in a flour totilla.'),
(4, 'Pollo con Arroz', 9, 'Rice topped with cheese coupled with seasoned grilled chicken'),
(5, 'Enchiladas', 7, 'A cheese topped beef enchilada that is paired with a traditional spicy red sauce.'),
(6, 'Beef Tacos', 6, 'A pair of beef tacos topped with lettuce and cheese.'),
(7, 'Steak Tacos', 8, 'A pair of steak tacos topped with lettuce and cheese.'),
(8, 'Flan', 3, 'Traditional tapioca dessert suitable for any occasion'),
(9, 'Pan Dulce', 4, 'A pastry type sweet that is filled with fruit filling'),
(10, 'Cafecito', 2, 'A shot of sweetened espresso served out of a traditional cafetera'),
(12, 'Cafe con Lech', 3, 'Espresso served in milk that is perfect for enjoying a early morning');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(9) NOT NULL,
  `name` varchar(250) NOT NULL,
  `total` int(250) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `addr` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `paymethod` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `name`, `total`, `fname`, `lname`, `addr`, `state`, `paymethod`) VALUES
(1, 'Array', 77, 'jj', 'hj', '798', 'jh', 'Credit Card');

-- --------------------------------------------------------

--
-- Table structure for table `prepurchase`
--

CREATE TABLE `prepurchase` (
  `preId` int(25) NOT NULL,
  `userId` int(9) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` int(250) NOT NULL,
  `qty` int(250) NOT NULL,
  `descr` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(9) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `addr` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `paymethod` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `email`, `fname`, `lname`, `addr`, `state`, `paymethod`) VALUES
(1, 'd', 'd', 'd@g.com', 'lhkj', 'gfsd', '23 f', 'wes', 'visa'),
(2, '1', 'ldkfj', 'asd@gmail.com', 'afds', 'adsf', '76 d', 'lhkj', 'lkh'),
(3, 'ted', 'ted', 'ted@tmail.com', 'ted', 'teddly', 'ted tn.', 'tn', 'tollars'),
(4, 'lklk', 'lklk', 'jghk@kjh.com', 'huhkj', 'hgvj', 'h', 'h', 'hv'),
(5, 'yee', 'yee', 'yee@gmail.com', 'y', 'ee', '34 tee', 'Wi', 'dick');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menuitems`
--
ALTER TABLE `menuitems`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `prepurchase`
--
ALTER TABLE `prepurchase`
  ADD PRIMARY KEY (`preId`),
  ADD UNIQUE KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menuitems`
--
ALTER TABLE `menuitems`
  MODIFY `itemId` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prepurchase`
--
ALTER TABLE `prepurchase`
  MODIFY `preId` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
