-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 28, 2022 at 10:15 AM
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
  `descr` varchar(500) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menuitems`
--

INSERT INTO `menuitems` (`itemId`, `name`, `price`, `descr`, `img`) VALUES
(2, 'Cheese Quesadilla', 7, 'A blend of traditional cheeses melted in a flour totilla.', 'img/cq.jpg'),
(3, 'Chicken Quesadilla', 7, 'A blend of traditional cheeses with grilled chicken melted in a flour totilla.', 'img/9522c8dc-24c7-4ba6-b3e8-81cc3ff22f4c.jpg'),
(4, 'Pollo con Arroz', 9, 'Rice topped with cheese coupled with seasoned grilled chicken', 'img/132477_640x428.jpg'),
(5, 'Enchiladas', 7, 'A cheese topped beef enchilada that is paired with a traditional spicy red sauce.', 'img/el.jpg'),
(6, 'Beef Tacos', 6, 'A pair of beef tacos topped with lettuce and cheese.', 'img/beef-tacos-I-howsweeteats.com-11.jpg'),
(7, 'Steak Tacos', 8, 'A pair of steak tacos topped with lettuce and cheese.', 'img/dulce-de-leche-flan-2a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(9) NOT NULL,
  `userId` int(9) NOT NULL,
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

INSERT INTO `orders` (`orderId`, `userId`, `total`, `fname`, `lname`, `addr`, `state`, `paymethod`) VALUES
(1, 0, 77, 'jj', 'hj', '798', 'jh', 'Credit Card'),
(2, 1, 70, 'as', 'as', 'as', 'as', 'Cash'),
(3, 1, 70, 'as', 'as', 'as', 'as', 'Cash'),
(4, 1, 70, 'lhkj', 'gfsd', '23', 'wes', 'Cash'),
(5, 1, 70, 'lhkj', 'gfsd', '23', 'wes', 'Credit Card'),
(6, 1, 154, 'lhkj', 'gfsd', '23', 'wes', 'Credit Card'),
(7, 1, 154, 'lhkj', 'gfsd', '23', 'wes', 'Credit Card'),
(8, 1, 154, 'lhkj', 'gfsd', '23', 'wes', 'Credit Card'),
(9, 1, 154, 'lhkj', 'gfsd', '23', 'wes', 'Debit Card'),
(10, 1, 154, 'lhkj', 'gfsd', '23', 'wes', 'Debit Card'),
(11, 1, 154, 'lhkj', 'gfsd', '23', 'wes', 'Debit Card'),
(12, 1, 154, 'lhkj', 'gfsd', '23', 'wes', 'Credit Card'),
(13, 1, 154, 'lhkj', 'gfsd', '23', 'wes', 'Debit Card'),
(14, 1, 154, 'lhkj', 'gfsd', '23', 'wes', 'Credit Card'),
(15, 1, 154, 'lhkj', 'gfsd', '23', 'wes', 'Debit Card'),
(16, 1, 154, 'lhkj', 'gfsd', '23', 'wes', 'Debit Card'),
(17, 1, 154, 'lhkj', 'gfsd', '23', 'wes', 'Debit Card');

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

--
-- Dumping data for table `prepurchase`
--

INSERT INTO `prepurchase` (`preId`, `userId`, `name`, `price`, `qty`, `descr`) VALUES
(2, 5, 'Cheese Quesadilla', 7, 77, 'A blend of traditional cheeses melted in a flour totilla.'),
(7, 5, 'Pollo con Arroz', 9, 1, 'Rice topped with cheese coupled with seasoned grilled chicken'),
(8, 5, 'Cheese Quesadilla', 7, 2, 'A blend of traditional cheeses melted in a flour totilla.'),
(9, 5, 'Cheese Quesadilla', 7, 3, 'A blend of traditional cheeses melted in a flour totilla.'),
(10, 1, 'Cafecito', 2, 2, 'A shot of sweetened espresso served out of a traditional cafetera'),
(11, 1, 'Cheese Quesadilla', 7, 5, 'A blend of traditional cheeses melted in a flour totilla.');

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
(5, 'yee', 'yee', 'yee@gmail.com', 'y', 'ee', '34 tee', 'Wi', 'dick'),
(6, 'y', 'y', 'y@yahoo.com', 'y1', 'y2', 'place ln', 'pl', 'diamonds?'),
(7, 'c', 'c', 'c@gmail.com', 'x', 'x', 'x', 'x', 'x');

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
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `userId` (`userId`) USING BTREE;

--
-- Indexes for table `prepurchase`
--
ALTER TABLE `prepurchase`
  ADD PRIMARY KEY (`preId`),
  ADD KEY `userId` (`userId`) USING BTREE;

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
  MODIFY `itemId` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `prepurchase`
--
ALTER TABLE `prepurchase`
  MODIFY `preId` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
