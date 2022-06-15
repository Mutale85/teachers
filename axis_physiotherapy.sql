-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2022 at 03:30 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `axis_physiotherapy`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `user_email` text NOT NULL,
  `image` text NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT current_timestamp(),
  `clicks` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `user_email`, `image`, `date_posted`, `clicks`) VALUES
(5, 'mutamuls@gmail.com', '2022-06-111.jpeg', '2022-06-11 23:37:55', 0),
(6, 'mutamuls@gmail.com', '2022-06-112.jpeg', '2022-06-11 23:37:55', 0),
(7, 'mutamuls@gmail.com', '2022-06-113.jpeg', '2022-06-11 23:37:55', 0),
(8, 'mutamuls@gmail.com', '2022-06-114.jpeg', '2022-06-11 23:37:55', 0),
(9, 'mutamuls@gmail.com', '2022-06-115.jpeg', '2022-06-11 23:37:55', 0),
(10, 'mutamuls@gmail.com', '2022-06-116.jpeg', '2022-06-11 23:37:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `service_number` text NOT NULL,
  `password` text NOT NULL,
  `time_login` datetime NOT NULL DEFAULT current_timestamp(),
  `user_ip` text NOT NULL,
  `user_country` text DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`id`, `parent_id`, `service_number`, `password`, `time_login`, `user_ip`, `user_country`, `logout_time`) VALUES
(156, 1, '938126', '$2y$10$J9RysAYw6ys/kwcVlvthzub3LvdBfofsxIdyehCptd9E8GhLXZWgC', '2022-01-26 16:05:16', '::1', NULL, '2022-01-26 16:08:28'),
(157, 1, '938126', '$2y$10$J9RysAYw6ys/kwcVlvthzub3LvdBfofsxIdyehCptd9E8GhLXZWgC', '2022-01-26 16:08:54', '::1', NULL, '2022-01-26 19:30:35'),
(158, 2, '938474', '$2y$10$FuuawfJgcy2nvFVBwPQfsOb09cxYZt2Vpq8cCaemc9n.S03rtCmcK', '2022-01-30 15:32:50', '::1', NULL, '2022-01-30 18:43:48'),
(159, 2, '938474', '$2y$10$FuuawfJgcy2nvFVBwPQfsOb09cxYZt2Vpq8cCaemc9n.S03rtCmcK', '2022-02-21 16:40:43', '::1', NULL, NULL),
(160, 2, '938474', '$2y$10$FuuawfJgcy2nvFVBwPQfsOb09cxYZt2Vpq8cCaemc9n.S03rtCmcK', '2022-03-14 13:53:22', '::1', NULL, NULL),
(161, 2, '938474', '$2y$10$FuuawfJgcy2nvFVBwPQfsOb09cxYZt2Vpq8cCaemc9n.S03rtCmcK', '2022-03-14 15:45:19', '::1', NULL, '2022-03-14 15:46:57'),
(162, 2, '938474', '$2y$10$FuuawfJgcy2nvFVBwPQfsOb09cxYZt2Vpq8cCaemc9n.S03rtCmcK', '2022-04-10 07:45:53', '::1', NULL, '2022-04-13 08:29:27'),
(163, 2, '938474', '$2y$10$FuuawfJgcy2nvFVBwPQfsOb09cxYZt2Vpq8cCaemc9n.S03rtCmcK', '2022-04-12 14:39:41', '::1', NULL, NULL),
(164, 2, '938474', '$2y$10$FuuawfJgcy2nvFVBwPQfsOb09cxYZt2Vpq8cCaemc9n.S03rtCmcK', '2022-04-13 08:57:09', '::1', NULL, '2022-04-13 16:15:58'),
(165, 2, '938474', '$2y$10$FuuawfJgcy2nvFVBwPQfsOb09cxYZt2Vpq8cCaemc9n.S03rtCmcK', '2022-04-21 15:50:17', '::1', NULL, '2022-04-21 16:02:16'),
(166, 2, '938474', '$2y$10$FuuawfJgcy2nvFVBwPQfsOb09cxYZt2Vpq8cCaemc9n.S03rtCmcK', '2022-04-25 10:33:45', '::1', NULL, NULL),
(167, 2, '938474', '$2y$10$FuuawfJgcy2nvFVBwPQfsOb09cxYZt2Vpq8cCaemc9n.S03rtCmcK', '2022-04-25 10:33:47', '::1', NULL, '2022-04-25 12:01:35'),
(168, 2, '938474', '$2y$10$FuuawfJgcy2nvFVBwPQfsOb09cxYZt2Vpq8cCaemc9n.S03rtCmcK', '2022-04-26 20:36:52', '::1', NULL, NULL),
(169, 2, '938474', '$2y$10$FuuawfJgcy2nvFVBwPQfsOb09cxYZt2Vpq8cCaemc9n.S03rtCmcK', '2022-04-26 20:36:54', '::1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `fullnames` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `activate` enum('0','1') NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `fullnames`, `email`, `password`, `parent_id`, `activate`, `date_added`) VALUES
(1, 'George Mutale Mulenga', 'mulengamuls85@gmail.com', '$2y$10$YxQnZsdfylMXCqPo6MUU4.Bhj6G.0HeEca2N35P/su7FrdSKfpKhu', 1, '1', '2021-11-17 22:28:58'),
(2, 'Hope Chilekwa', 'mutamuls@gmail.com', '$2y$10$WAeF72.5iQW564qeQrrSe.Zt2.1BZccsu3YQgz6nH4GjSX4JR82rK', 2, '1', '2022-01-16 02:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `service_personnel`
--

CREATE TABLE `service_personnel` (
  `id` int(11) NOT NULL,
  `service_number` text NOT NULL,
  `rank` text NOT NULL,
  `firstname` text NOT NULL,
  `surname` text NOT NULL,
  `trade_branch` text NOT NULL,
  `phone_number` text NOT NULL,
  `unit` text NOT NULL,
  `marital_status` text NOT NULL,
  `gender` text NOT NULL,
  `spouse_firstname` text NOT NULL,
  `spouse_surname` text NOT NULL,
  `spouse_service_number` text DEFAULT NULL,
  `spouse_rank` text DEFAULT NULL,
  `spouse_nrc` text NOT NULL,
  `spouse_phone_number` text NOT NULL,
  `spouse_occupation` text NOT NULL,
  `spouse_employer` text NOT NULL,
  `quarter_number` text NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_personnel`
--

INSERT INTO `service_personnel` (`id`, `service_number`, `rank`, `firstname`, `surname`, `trade_branch`, `phone_number`, `unit`, `marital_status`, `gender`, `spouse_firstname`, `spouse_surname`, `spouse_service_number`, `spouse_rank`, `spouse_nrc`, `spouse_phone_number`, `spouse_occupation`, `spouse_employer`, `quarter_number`, `parent_id`) VALUES
(1, '938474', 'FSGT', 'George Mutale', 'Mulenga', 'Fire', '+260976330092', 'ZAF Lusaka', 'Married', 'Male', 'Harriet H', 'Tembo', '', '', '266673/73/1', '0978428707', 'Nurse', 'Ministry of Health', 'House number 104B, \r\nPemblock Married Quarters\r\nZAF Lusaka', 2),
(3, '938390', 'FSGT', 'Harrison', 'Banda', 'Radar Operator', '0977700112', '65 ADU', 'Married', 'Male', 'Ireen', 'Mwape', '', '', '647363/78/1', '09371220039', 'Nurse', 'Ministry of Health', 'Lc 186 A', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_personnel`
--
ALTER TABLE `service_personnel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login_table`
--
ALTER TABLE `login_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_personnel`
--
ALTER TABLE `service_personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
