-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2023 at 01:34 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
