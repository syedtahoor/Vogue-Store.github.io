-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2023 at 07:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(17, 'men'),
(18, 'women'),
(20, 'accessories');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) DEFAULT NULL,
  `c_contact` varchar(100) DEFAULT NULL,
  `c_email` varchar(250) DEFAULT NULL,
  `c_password` varchar(200) DEFAULT NULL,
  `c_address` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`c_id`, `c_name`, `c_contact`, `c_email`, `c_password`, `c_address`) VALUES
(7, 'ali', '03142555524', 'syeed@gmail.com', '123456789', 'kda flats');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `o_id` int(11) DEFAULT NULL,
  `product_item` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`o_id`, `product_item`, `price`, `quantity`) VALUES
(1, 'Stylish Jacket', 20000, 1),
(1, 'Black and White Sneakers', 50000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ordermanager`
--

CREATE TABLE `ordermanager` (
  `o_id` int(11) NOT NULL,
  `o_name` varchar(100) DEFAULT NULL,
  `o_contact` varchar(200) DEFAULT NULL,
  `o_email` varchar(250) DEFAULT NULL,
  `o_address` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordermanager`
--

INSERT INTO `ordermanager` (`o_id`, `o_name`, `o_contact`, `o_email`, `o_address`) VALUES
(1, 'syed tahoor ali', '03412809870', 'syedtahooraliali@gmail.com', 'kda flats');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) DEFAULT NULL,
  `p_price` int(11) DEFAULT NULL,
  `p_quantity` int(11) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `p_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_price`, `p_quantity`, `c_id`, `p_image`) VALUES
(35, 'Black jacket', 15000, 5, 17, 'pro-2.jpg'),
(37, 'Stylish Jacket', 20000, 10, 17, 'pro-3.jpg'),
(55, 'Brown tint jacket', 20000, 5, 18, 'pro-5.jpg'),
(56, 'Black and red upper', 21000, 5, 18, 'pro-4.jpg'),
(57, 'Black Cap', 1200, 5, 20, 'cap 2.webp'),
(58, 'Blue stylish cap', 1299, 5, 20, 'cap 5.webp'),
(59, 'AirJordan Shoe', 30000, 6, 20, '357cf26a-26a1-4ff0-8cde-d46249051eff.webp'),
(62, 'Black and White Sneakers', 50000, 5, 20, 'fd17b420-b388-4c8a-aaaa-e0a98ddf175f.webp'),
(63, 'Idiol Grey Watch ', 12000, 6, 20, 'patek-philippe-grand-complications-minute-repeater-tourbillon-retrograde-perpetual-calendar-531650p-001-800x1243.webp'),
(64, 'White steel watch', 12999, 5, 20, 'patek-philippe-nautilus-59901a-011-800x1283.webp'),
(65, 'Girls Upper', 19999, 5, 18, 'S 3.webp'),
(68, 'Brown Belt', 1999, 5, 20, 'B 2.webp'),
(69, 'White Shalwar Kameez', 15000, 5, 17, 'K 6.webp'),
(74, 'Black Kurti', 14999, 5, 18, 'T 1.webp'),
(75, 'Off White Kurti', 13999, 5, 18, 'T 2.webp'),
(76, 'Mehroon Kurta Shalwar', 19999, 5, 17, 'K 1.webp'),
(77, 'Fashionable Shalwar Kameez', 21999, 5, 17, 'K 9.webp'),
(81, 'Stylish Kurti', 20999, 5, 18, 'K 3.webp'),
(82, 'Kurti ', 12999, 5, 18, 'K 4.webp'),
(83, 'Fashionable Kurti', 12899, 5, 18, 'K 2.webp'),
(84, 'Black Upper', 13998, 5, 18, 'S 1.jpg'),
(85, 'Red Upper', 14989, 5, 18, 'S 2.webp');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_password` varchar(200) DEFAULT NULL,
  `u_email` varchar(250) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_email` (`c_email`);

--
-- Indexes for table `ordermanager`
--
ALTER TABLE `ordermanager`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ordermanager`
--
ALTER TABLE `ordermanager`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `category` (`c_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
