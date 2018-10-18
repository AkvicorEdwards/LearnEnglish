-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 18, 2018 at 06:10 PM
-- Server version: 5.5.60-log
-- PHP Version: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learn_english`
--
CREATE DATABASE IF NOT EXISTS `learn_english` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `learn_english`;

-- --------------------------------------------------------

--
-- Table structure for table `english`
--

CREATE TABLE `english` (
  `id` int(11) NOT NULL,
  `list` int(11) NOT NULL,
  `word` varchar(100) NOT NULL,
  `translate` varchar(170) NOT NULL,
  `r_cont` int(11) NOT NULL COMMENT 'Correct number of times',
  `f_cont` int(11) NOT NULL COMMENT 'Number of errors',
  `cont` int(11) NOT NULL COMMENT 'Total',
  `rate` float NOT NULL COMMENT 'Correct rate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(170) NOT NULL,
  `permissions` varchar(170) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `permissions`) VALUES
(1, 'lyu', '$2y$10$TaXj//VN8UcGURySgxYiMu9E9ljh1c6Hq5p7oBPUNKSDMlZa6tJ/C', 'blog learn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `english`
--
ALTER TABLE `english`
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
-- AUTO_INCREMENT for table `english`
--
ALTER TABLE `english`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
