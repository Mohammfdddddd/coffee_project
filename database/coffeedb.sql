-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 مايو 2024 الساعة 21:01
-- إصدار الخادم: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeedb`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contactnum` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `admin`
--

INSERT INTO `admin` (`id`, `name`, `age`, `email`, `contactnum`, `username`, `password`, `type`) VALUES
(1, 'wsan', '22', 'wsan@gmail.com ', '534002270', 'admin', '1234', 'admin');

-- --------------------------------------------------------

--
-- بنية الجدول `booking`
--

CREATE TABLE `booking` (
  `id` int(50) NOT NULL,
  `name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `coffee_name` varchar(500) NOT NULL,
  `price` varchar(200) NOT NULL,
  `card_number` varchar(500) NOT NULL,
  `card_name` varchar(500) NOT NULL,
  `exp_month_year` varchar(500) NOT NULL,
  `CVV` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `booking`
--

INSERT INTO `booking` (`id`, `name`, `email`, `phone`, `coffee_name`, `price`, `card_number`, `card_name`, `exp_month_year`, `CVV`, `username`, `date`) VALUES
(5, 'wsan', 'Wsan@gmail.com', '507194525', 'coffee new', '10', '1234456', 'wsan', '03/2025', '1234', 'admin', '2024-05-09 13:45:04'),
(6, 'fatima', 'fatima@gmail.com', '5768899543', 'coffee new', '10', '12255', 'fatima', '1/2025', '1234', 'admin1', '2024-05-11 14:34:21');

-- --------------------------------------------------------

--
-- بنية الجدول `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- بنية الجدول `order`
--

CREATE TABLE `order` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pin_code` varchar(255) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `Calnder` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `order`
--

INSERT INTO `order` (`id`, `name`, `number`, `email`, `method`, `street`, `city`, `country`, `pin_code`, `total_products`, `total_price`, `Calnder`) VALUES
(1, 'fatima', '3665989', 'fatima@gmail.com', 'credit cart', 'taif', 'taif', 'ksa', '12345', 'coffee new (2) ', '20', '2024-05-12');

-- --------------------------------------------------------

--
-- بنية الجدول `products`
--

CREATE TABLE `products` (
  `id` int(50) NOT NULL,
  `name` varchar(222) NOT NULL,
  `type_product` varchar(222) NOT NULL,
  `price` varchar(222) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `products`
--

INSERT INTO `products` (`id`, `name`, `type_product`, `price`, `image`, `date`) VALUES
(4, 'Test And Healthy', 'very goog', '20', 'menu-2.png', '2024-05-09 13:16:05'),
(5, 'coffee new', 'very goog coffee', '10', 'menu-4.png', '2024-05-09 13:17:46'),
(6, 'coffee very good ', 'very goog coffee', '20', 'menu-5.png', '2024-05-09 13:37:58');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `Birth_date` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `Birth_date`, `Gender`, `username`, `password`) VALUES
(2, 'wsan', 'Wsan@gmail.com', '556377882', ' 2024-05-09', 'Woman', 'admin', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'fatima', 'fatima@gmail.com', '5768899543', ' 2024-05-10', 'Man', 'admin1', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
