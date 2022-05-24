-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 04:05 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_demo_join`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'Tivi ', 'Mô tả cho tivi', '2021-12-07 01:55:08'),
(2, 'Tủ lạnh', 'Mô tả cho tủ lạnh', '2021-12-07 01:55:08'),
(3, 'Điều hòa', 'Mô tả cho điều hòa', '2021-12-07 01:55:27'),
(4, 'Máy tính', 'Mô tả cho máy tính', '2021-12-07 01:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT 0,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `description`, `created_at`) VALUES
(1, 4, 'Laptop Asus', 1000, 'Mô tả Laptop Asus', '2021-12-07 02:00:55'),
(2, 4, 'Laptop Dell', 2000, 'Mô tả Laptop Dell', '2021-12-07 02:00:55'),
(3, 4, 'Laptop Toshiba ', 3000, 'Mô tả Laptop Toshiba ', '2021-12-07 02:00:55'),
(4, 1, 'Tivi Samsung', 4000, 'Mô tả Tivi Samsung', '2021-12-07 02:02:12'),
(5, 1, 'Tivi Sony', 5000, 'Mô tả Tivi Sony', '2021-12-07 02:02:12'),
(6, 2, 'Tủ lạnh Sharp', 7000, 'Mô tả Tủ lạnh Sharp', '2021-12-07 02:02:12'),
(7, 2, 'Tủ lạnh Panasonic', 8000, 'Mô tả Tủ lạnh Panasonic', '2021-12-07 02:02:12'),
(8, 1000, 'product name category 1000', 1000, 'product description category 1000', '2021-12-13 02:02:58'),
(9, 2000, 'product name category 2000', 2000, 'product name category 2000', '2021-12-13 02:02:58'),
(10, 0, 'product name category null', 0, 'product description category null', '2021-12-13 02:03:19'),
(11, 0, 'product name category null', 0, 'product description category null', '2021-12-13 02:03:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
