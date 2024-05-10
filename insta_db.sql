-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 10:40 AM
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
-- Database: `insta_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_tb`
--

CREATE TABLE `comment_tb` (
  `comment_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment_tb`
--

INSERT INTO `comment_tb` (`comment_id`, `content_id`, `user_id`, `comment`, `date`) VALUES
(1, 34, 1, 'dwada', '2024-04-28'),
(32, 36, 1, 'dwa', '2024-04-30'),
(41, 39, 1, 'sheshyawa21', '2024-05-01'),
(44, 42, 2, 'shesh', '2024-05-03'),
(47, 43, 1, 'shesh', '2024-05-03'),
(48, 44, 3, 'shesh2111', '2024-05-03'),
(49, 46, 1, 'sasasas', '2024-05-03'),
(50, 46, 1, 'sasa', '2024-05-03'),
(52, 49, 1, 'dwadaw', '2024-05-10'),
(53, 49, 1, 'dawdw', '2024-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `content_tb`
--

CREATE TABLE `content_tb` (
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(50) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follow_tb`
--

CREATE TABLE `follow_tb` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `followers_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `follow_tb`
--

INSERT INTO `follow_tb` (`id`, `users_id`, `followers_id`, `status`) VALUES
(3, 2, 1, ''),
(4, 1, 3, ''),
(5, 2, 1, ''),
(6, 1, 2, ''),
(7, 1, 2, ''),
(8, 1, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `users_tb`
--

CREATE TABLE `users_tb` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_tb`
--

INSERT INTO `users_tb` (`user_id`, `username`, `password`, `name`) VALUES
(1, 'admin', 'password', 'Zane Daniel'),
(2, 'nigga', 'password', 'Black American'),
(3, 'user1', 'password', 'Usermotherfucker');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_tb`
--
ALTER TABLE `comment_tb`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `content_tb`
--
ALTER TABLE `content_tb`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `follow_tb`
--
ALTER TABLE `follow_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment_tb`
--
ALTER TABLE `comment_tb`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `content_tb`
--
ALTER TABLE `content_tb`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `follow_tb`
--
ALTER TABLE `follow_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
