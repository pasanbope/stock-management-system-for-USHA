-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 01:49 PM
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
-- Database: `usha`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `subtotal` float NOT NULL,
  `userid` int(10) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `status`, `subtotal`, `userid`, `orderDate`) VALUES
(12, 'pending', 40480, 11, '2023-05-14 10:45:42'),
(13, 'completed', 37470, 11, '2023-05-14 10:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `city` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`orderid`, `name`, `email`, `phone`, `address`, `zipcode`, `city`) VALUES
(12, 'Jhon', 'tndprint123@gmail.com', '0123456789', 'Colombo 5', '152345', 'Colombo'),
(13, 'Jhon', 'tndprint123@gmail.com', '0123456789', 'Colombo 5', '152345', 'Colombo');

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `orderId` int(10) NOT NULL,
  `productId` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`orderId`, `productId`, `quantity`) VALUES
(12, 8, 2),
(13, 8, 1),
(13, 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `stock` int(50) NOT NULL,
  `image` varchar(1024) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `short_description`, `description`, `price`, `stock`, `image`, `category`) VALUES
(8, 'TECHNIX PLUS 48', 'Decorative looks with unique Dual-colour designs will complement your interiors exquisitely. The Technix 48 also comes with lacquer metallic paint that sparkles like no other. A meagre power consumption of only 43W will guarantee electricity savings, season after season.', 'Sweep Size (mm)	:	1200\r\nNo. of Blades	:	3\r\nRPM @ 230v	:	330\r\nVolts	:	230V\r\nWattage	:	43W\r\nAir Delivery(M3/Min)	:	215\r\nWarranty	:	2 years warranty', 19990, 5, 'Product_3823.png', 'Ceiling Fans'),
(9, 'AVIATOR', 'Good fan', 'Air Delivery	:	250 m3/min\r\nWattage	:	70 watt\r\nRPM	:	290\r\nSweep	:	1400mm\r\nWarranty	:	2 years\r\nNo of Blades	:	3', 24990, 10, 'Product_6624.png', 'Ceiling Fans'),
(10, 'NEW QUANTA DECO SLS', 'Decorative looks with unique Dual-colour designs will complement your interiors exquisitely, The Technix 48 also comes with lacquer metallic paint that sparkles like no other. A meagre power consumption of only 43W will guarantee electricity savings, season after season.', 'Sweep Size (mm)	:	1400\r\nNo. of Blades	:	3\r\nRPM @ 230v	:	280\r\nWattage	:	70W\r\nAir Delivery(M3/Min)	:	250\r\nWarranty	:	2 Years warranty', 25990, 5, 'Product_3594.png', 'Ceiling Fans'),
(11, 'NEW QUANTA', 'Good fan', 'Sweep Size (mm)	:	1400\r\nNo. of Blades	:	3\r\nRPM @ 230v	:	280\r\nWattage	:	70W\r\nAir Delivery(M3/Min)	:	250\r\nTemp. Rise @244V at 40° Ambient(deg.C)	:	70 Max\r\n', 25790, 15, 'Product_2415.png', 'Ceiling Fans'),
(14, 'JRC-280 F 2.8L | 1000 W', 'The new USHA Multi Cooker is made for fast, easy and healthy cooking. The 2.8 litre (L),1000 W pot has a family-friendly capacity. It can cook 1.5 kg of rice in one go. But that\'s not all. The multi-cooker does so much more. Steam, boil, bake, warm and cook, with just one button. Even heat through the in-built thermostat and heating plate makes it taste perfect every time. A two-stage thermal safety mechanism silently stands guard over your food, preventing your food from being over-cooked.', 'power (283)	:	1000W (276)\r\nVoltage (67)	:	220-240 V (385)\r\nCapacity (61)	:	2.8L (278)\r\nFreq (70)	:	50 Hz (69)\r\nHeating Plate Dia (373)	:	192 mm (2398)\r\nWarranty	:	2 Years', 8490, 5, 'Product_6065.jpg', 'Rice Cookers'),
(15, 'JRC-220 A 2.2L | 900 W', 'The new USHA Multi Cooker is made for fast, easy and healthy cooking. The 2.2 litre (L), 900 W pot has a good capacity. It can cook 1 kg of rice in one go. But that\'s not all. The Multi Cooker does so much more. Steam, boil, bake, warm and cook with just one button. Even heat through the in-built thermostat and heating plate makes food taste perfect every time. A two-stage thermal safety mechanism silently stands guard over your food, preventing your food from being over-cooked. Boldly put your Multi Cooker through a multi-course meal right from breakfast favourites like upma and poha to flavoured vegetables, curries and biryanis. Halwa turns out well, as does khichdi—a humble comfort food. Reheat food or keep it warm. The USHA Multi Cooker simplifies cooking with consistent results and astonishing versatility. It can make anyone into a cook.', 'power (283)	:	900W (279)\r\nCapacity (61)	:	2.2L (280)\r\nWarranty (64)	:	2 Years On Product (63)\r\nHeating Element Waranty (2395)	:	5 Years (351)\r\nVoltage (67)	:	220-240 V (385)\r\nFreq (70)	:	50 Hz (69)\r\nHeating Plate Dia (373)	:	165mm (342)\r\n', 7390, 5, 'Product_7081.jpg', 'Rice Cookers');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `phone` text NOT NULL,
  `business_name` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `phone`, `business_name`, `address`, `name`, `email`, `password`, `username`) VALUES
(9, '0112345678', 'Usha Store', 'Usha, Colombo.', 'Usha Admin', 'storeusha3@gmail.com', '1234', 'admin'),
(11, '0123456789', 'TND Printers', 'Colombo 5', 'Jhon', 'tndprint123@gmail.com', '1234', 'jhon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD KEY `orderId` (`orderId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `order` (`id`);

--
-- Constraints for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `orderitem_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
