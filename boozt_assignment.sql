-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jul 21, 2021 at 10:24 AM
-- Server version: 10.5.3-MariaDB-1:10.5.3+maria~focal
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boozt_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `email`, `created_at`) VALUES
(1, 'chintushig', 'ochirsukh', 'tushig.tushig@gmail.com\r\n', '2021-07-13 20:41:23'),
(2, 'test', 'qwer', 'hotstuff@gmail.com\r\n', '2021-07-14 20:41:27'),
(3, 'John', 'Doe', 'Something@gmail.com\r\n', '2021-07-14 20:41:27'),
(4, 'Lorem', 'Ipsum', 'Nothing@gmail.com\r\n', '2021-07-14 20:41:27'),
(5, 'Lorem2', 'Ipsum', 'test@gmail.com', '2021-06-14 20:41:27'),
(6, 'Lorem2', 'Ipsum', 'test@gmail.com', '2021-05-14 20:41:27'),
(7, 'Lorem2', 'Ipsum', 'test@gmail.com', '2021-04-12 20:41:27'),
(8, 'Lorem2', 'Ipsum', 'test@gmail.com', '2021-03-11 20:41:27'),
(9, 'Lorem2', 'Ipsum', 'test@gmail.com', '2021-02-15 20:41:27'),
(10, 'Lorem2', 'Ipsum', 'test@gmail.com', '2021-06-14 20:41:27'),
(11, 'Lorem2', 'Ipsum', 'test@gmail.com', '2021-05-16 20:41:27'),
(12, 'Lorem2', 'Ipsum', 'test@gmail.com', '2021-04-14 20:41:27'),
(13, 'Lorem2', 'Ipsum', 'test@gmail.com', '2021-03-17 20:41:27'),
(14, 'Lorem2', 'Ipsum', 'test@gmail.com', '2021-02-19 20:41:27'),
(15, 'Lorem2', 'Ipsum', 'test@gmail.com', '2021-01-18 20:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `purchase_date` datetime NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customer_id`, `purchase_date`, `country`, `device`) VALUES
(2, 1, '2021-07-19 11:46:07', 'Mongolia', 'Iphone\r\n'),
(3, 2, '2021-07-20 11:46:18', 'France', 'Nokia\r\n'),
(4, 2, '2021-07-20 11:46:18', 'Turkey', 'Samsung'),
(5, 2, '2021-07-20 11:46:18', 'USA', 'Gameboy\r\n'),
(6, 1, '2021-05-18 11:46:07', 'Sweden', 'Iphone\r\n'),
(7, 2, '2021-05-19 11:46:07', 'Sweden', 'Iphone\r\n'),
(8, 3, '2021-05-20 11:46:07', 'Sweden', 'Iphone\r\n'),
(9, 2, '2021-05-20 11:46:07', 'Sweden', 'Iphone\r\n'),
(10, 3, '2021-05-21 11:46:07', 'Sweden', 'Iphone\r\n'),
(11, 2, '2021-05-22 11:46:07', 'Sweden', 'Iphone\r\n'),
(12, 3, '2021-05-22 11:46:07', 'Sweden', 'Iphone\r\n'),
(13, 2, '2021-05-22 11:46:07', 'Sweden', 'Iphone\r\n'),
(14, 3, '2021-05-22 11:46:07', 'Sweden', 'Iphone\r\n'),
(15, 2, '2021-05-22 11:46:07', 'Sweden', 'Iphone\r\n'),
(16, 3, '2021-05-23 11:46:07', 'Sweden', 'Iphone\r\n'),
(17, 1, '2021-06-24 11:46:07', 'Mongolia', 'Iphone\r\n'),
(18, 1, '2021-05-25 11:46:07', 'Mongolia', 'Iphone\r\n'),
(19, 1, '2021-06-26 11:46:07', 'Mongolia', 'Iphone\r\n'),
(20, 1, '2021-06-22 11:46:07', 'Mongolia', 'Iphone\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `ean` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `ean`, `quantity`, `price`, `order`) VALUES
(1, 1293801, 3, 17, 2),
(2, 12938012, 2, 31, 3),
(3, 12938013, 2, 31, 2),
(4, 13132421, 2, 50, 5),
(5, 131324211, 2, 50, 5),
(6, 131324212, 2, 50, 6),
(7, 131324213, 2, 50, 7),
(8, 131324214, 2, 50, 8),
(9, 131324215, 2, 50, 9),
(10, 131324216, 2, 50, 10),
(11, 131324217, 2, 50, 11),
(12, 131324218, 2, 50, 12),
(13, 131324219, 2, 50, 13),
(15, 1313242112, 2, 50, 5),
(17, 131324221, 2, 50, 5),
(18, 131324222, 2, 50, 6),
(28, 131324220, 2, 50, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F52993989395C3F3` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_62809DB067B1C660` (`ean`),
  ADD KEY `IDX_62809DB0C6898E08` (`order`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_F52993989395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `FK_62809DB0C6898E08` FOREIGN KEY (`order`) REFERENCES `order` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
