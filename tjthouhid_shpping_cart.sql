-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 04, 2018 at 04:10 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tjthouhid_shpping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone`, `address`, `created`, `modified`, `status`) VALUES
(1, 'Test User', 'testuser@gmail.com', 'b66c665d9ee7b5dcda40d2389f7d0767', '9999999999', 'New York, NY, USA', '2016-08-17 08:21:25', '2016-08-17 08:21:25', '1'),
(2, 'Tj Thouhid', 'tjthouhid@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1737616304', 'sadsd', '2018-02-01 05:41:04', '2018-02-01 05:41:04', '1'),
(3, 'Tj Thouhid', 'tjthouhid@ff.xco', 'e10adc3949ba59abbe56e057f20f883e', '43424', '432234', '2018-02-01 07:39:07', '2018-02-01 07:39:07', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` float(10,2) NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `request` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total_price`, `message`, `request`, `username`, `created`, `modified`, `status`) VALUES
(1, 1, 25.00, '', 'WC', '', '2018-01-27 14:51:11', '2018-01-27 14:51:11', 'OP'),
(2, 1, 65.00, '', '', '', '2018-01-27 15:19:53', '2018-01-27 15:19:53', '1'),
(3, 1, 65.00, '', '', '', '2018-01-27 15:29:16', '2018-01-27 15:29:16', '1'),
(4, 1, 115.00, '', '', '', '2018-01-27 15:30:07', '2018-01-27 15:30:07', '1'),
(5, 1, 25.00, '', '', '', '2018-01-27 15:44:46', '2018-01-27 15:44:47', '1'),
(6, 1, 15.00, '', '', '', '2018-01-27 16:00:20', '2018-01-27 16:00:20', '1'),
(7, 1, 25.00, '', '', '', '2018-01-29 12:02:59', '2018-01-29 12:02:59', '1'),
(8, 1, 80.00, '', '', '', '2018-01-31 13:17:17', '2018-01-31 13:17:17', '1'),
(9, 1, 15.00, '', '', '', '2018-01-31 13:31:08', '2018-01-31 13:31:08', '1'),
(10, 1, 15.00, '', '', '', '2018-01-31 13:47:37', '2018-01-31 13:47:37', '1'),
(11, 1, 25.00, '', '', '', '2018-01-31 14:33:59', '2018-01-31 14:33:59', '1'),
(12, 1, 50.00, '', '', '', '2018-01-31 15:53:35', '2018-01-31 15:53:35', '1'),
(13, 1, 40.00, '', '', '', '2018-01-31 15:53:57', '2018-01-31 15:53:57', '1'),
(14, 2, 325.00, '', '', '', '2018-02-01 07:27:55', '2018-02-01 07:27:55', '1'),
(15, 2, 40.00, '', '', '', '2018-02-01 07:35:22', '2018-02-01 07:35:22', '1'),
(16, 2, 25.00, '', '', '', '2018-02-01 07:38:33', '2018-02-01 07:38:33', '1'),
(17, 3, 25.00, '', '', '', '2018-02-01 07:39:17', '2018-02-01 07:39:17', '1'),
(18, 2, 50.00, '', '', '', '2018-02-01 17:41:17', '2018-02-01 17:41:17', 'OP'),
(19, 2, 50.00, '', 'OP', 'f2', '2018-02-04 16:10:31', '2018-02-04 16:10:31', 'CL');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 2, 1),
(2, 2, 1, 1),
(3, 2, 2, 2),
(4, 3, 1, 1),
(5, 3, 2, 2),
(6, 4, 1, 1),
(7, 4, 2, 4),
(8, 5, 2, 1),
(9, 6, 1, 1),
(10, 7, 2, 1),
(11, 8, 1, 2),
(12, 8, 2, 2),
(13, 9, 1, 1),
(14, 10, 1, 1),
(15, 11, 2, 1),
(16, 12, 2, 2),
(17, 13, 1, 1),
(18, 13, 2, 1),
(19, 14, 2, 13),
(20, 15, 1, 1),
(21, 15, 2, 1),
(22, 16, 2, 1),
(23, 17, 2, 1),
(24, 18, 2, 2),
(25, 19, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `username`, `name`, `description`, `price`, `created`, `modified`, `status`) VALUES
(1, 'f1', 'Product 1', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', 15.00, '2016-08-17 08:21:25', '2016-08-17 08:21:25', '1'),
(2, 'f2', 'Product 2', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', 25.00, '2016-08-17 08:21:25', '2016-08-17 08:21:25', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
