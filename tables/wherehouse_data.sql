-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2023 at 01:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wherehouse_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `device` varchar(10) NOT NULL,
  `item` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `device`, `item`, `date`) VALUES
(26, '1', 'aa', '2023-02-26 16:01:12'),
(30, '1', 'bb', '2023-02-26 18:52:00'),
(31, '1', 'aa', '2023-02-28 12:15:39'),
(32, '1', 'bb', '2023-02-28 12:18:07'),
(34, '59', 'cc', '2023-03-09 13:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `item` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `weight` float NOT NULL,
  `tare` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`item`, `name`, `weight`, `tare`) VALUES
('aa', 'Paper Weight', 10.05, 5.01),
('bb', 'Box of Resistors', 5.53, 1.93);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `device` varchar(10) NOT NULL,
  `stock` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `device`, `stock`, `name`, `date`) VALUES
(1, '1', 70, 'Paper', '2023-02-22 21:32:45'),
(2, '1', 70, 'Paper', '2023-02-22 21:33:14'),
(3, '1', 70, 'Paper', '2023-02-22 21:33:44'),
(4, '1', 70, 'Paper', '2023-02-22 21:33:54'),
(5, '1', 70, 'Paper', '2023-02-22 21:34:04'),
(6, '1', 50, 'Paper', '2023-02-22 21:34:23'),
(7, '1', 50, 'Paper', '2023-02-22 21:39:32'),
(8, '1', 50, 'Paper', '2023-02-22 21:39:42'),
(9, '2', 50, 'Paper', '2023-02-22 21:40:02'),
(10, '2', 50, 'Paper', '2023-02-22 21:40:12'),
(11, '2', 50, 'Paper', '2023-02-22 21:40:22'),
(12, '2', 50, 'Paper', '2023-02-22 21:40:32'),
(14, '1', 100, 'none', '2023-02-26 15:26:30'),
(15, '1', 100, 'Widgets', '2023-02-26 16:17:57'),
(16, '1', 0, 'Widgets', '2023-02-26 16:25:02'),
(17, '1', 100, 'Widgets', '2023-02-26 16:27:04'),
(18, '1', 100, 'Widgets', '2023-02-26 17:28:31'),
(19, '1', 345, 'DEMONSTRATIONS', '2023-02-26 17:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`) VALUES
(1, 'admin', 'password'),
(2, 'aburrowe', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`item`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
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
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
