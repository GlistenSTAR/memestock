-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 14, 2021 at 01:19 AM
-- Server version: 10.3.25-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelance_memestock`
--

-- --------------------------------------------------------

--
-- Table structure for table `tweets_stocks`
--

CREATE TABLE `tweets_stocks` (
  `id` int(11) NOT NULL,
  `stock` varchar(155) NOT NULL,
  `tweet_count` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tweets_stocks`
--

INSERT INTO `tweets_stocks` (`id`, `stock`, `tweet_count`, `created_at`, `updated_at`) VALUES
(4, 'FI', 9, '2021-03-13 19:17:26', '2021-03-13 19:17:26'),
(5, 'KO', 185, '2021-03-13 19:17:26', '2021-03-13 19:17:26'),
(6, 'CAT', 115, '2021-03-13 19:17:34', '2021-03-13 19:17:34'),
(7, 'RKT', 162, '2021-03-13 19:17:50', '2021-03-13 19:17:50'),
(8, 'BB', 299, '2021-03-13 19:18:01', '2021-03-13 19:18:01'),
(9, 'SPOT', 25, '2021-03-13 20:04:48', '2021-03-13 20:04:48'),
(10, 'FORD', 8, '2021-03-13 20:05:22', '2021-03-13 20:05:22'),
(11, 'SUM', 4, '2021-03-13 20:05:26', '2021-03-13 20:05:26'),
(12, 'MAR', 23, '2021-03-13 20:05:29', '2021-03-13 20:05:29'),
(13, 'MEI', 5, '2021-03-13 20:05:33', '2021-03-13 20:05:33'),
(14, 'EBAY', 106, '2021-03-13 20:05:58', '2021-03-13 20:05:58'),
(15, 'TREE', 2, '2021-03-13 20:06:31', '2021-03-13 20:06:31'),
(16, 'AMD', 315, '2021-03-13 20:28:51', '2021-03-13 20:28:51'),
(17, 'CVS', 41, '2021-03-13 20:32:12', '2021-03-13 20:32:12'),
(18, 'GOEV', 91, '2021-03-13 22:38:31', '2021-03-13 22:38:31'),
(19, 'NOK', 272, '2021-03-13 22:40:49', '2021-03-13 22:40:49'),
(20, 'SI', 129, '2021-03-13 22:42:20', '2021-03-13 22:42:20'),
(21, 'ZOM', 563, '2021-03-13 22:44:54', '2021-03-13 22:44:54'),
(22, 'PLTR', 835, '2021-03-14 00:44:32', '2021-03-14 00:44:32'),
(23, 'TSLA', 3782, '2021-03-14 00:47:38', '2021-03-14 00:47:38'),
(24, 'FIT', 3, '2021-03-14 00:47:41', '2021-03-14 00:47:41'),
(25, 'HA', 15, '2021-03-14 00:47:42', '2021-03-14 00:47:42'),
(26, 'GME', 2753, '2021-03-14 01:03:05', '2021-03-14 01:03:05'),
(27, 'AMC', 3484, '2021-03-14 01:06:13', '2021-03-14 01:06:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tweets_stocks`
--
ALTER TABLE `tweets_stocks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tweets_stocks`
--
ALTER TABLE `tweets_stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
