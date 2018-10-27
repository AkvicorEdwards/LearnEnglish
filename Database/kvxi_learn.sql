-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2018 at 09:13 PM
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
-- Database: `kvxi_learn`
--
CREATE DATABASE IF NOT EXISTS `kvxi_learn` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kvxi_learn`;

-- --------------------------------------------------------

--
-- Table structure for table `list_index`
--

CREATE TABLE `list_index` (
  `id` int(11) NOT NULL,
  `list_name` varchar(170) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_index`
--

INSERT INTO `list_index` (`id`, `list_name`, `total`) VALUES
(1, '1', 15);

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `id` int(11) NOT NULL,
  `lists` varchar(170) DEFAULT NULL,
  `word` varchar(170) DEFAULT NULL,
  `translate` varchar(170) DEFAULT NULL,
  `r_count` int(11) DEFAULT '1',
  `f_count` int(11) DEFAULT '1',
  `a_count` int(11) DEFAULT '2',
  `rate` float DEFAULT '0.5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `lists`, `word`, `translate`, `r_count`, `f_count`, `a_count`, `rate`) VALUES
(1, '1', 'tent', '帐篷', 2, 1, 3, 0.666667),
(2, '1', 'field', '田地,田野', 1, 2, 3, 0.333333),
(3, '1', 'smell', '闻起来', 2, 1, 3, 0.666667),
(4, '1', 'wonderful', '极好的', 2, 1, 3, 0.666667),
(5, '1', 'campfire', '营火,篝火', 1, 2, 3, 0.333333),
(6, '1', 'creep', '爬行', 1, 2, 3, 0.333333),
(7, '1', 'sleeping bag', '睡袋', 1, 2, 3, 0.333333),
(8, '1', 'comfortable', '舒适的,安逸的', 2, 1, 3, 0.666667),
(9, '1', 'soundly', '香甜地', 2, 1, 3, 0.666667),
(10, '1', 'leap', '跳越,跳起', 2, 1, 3, 0.666667),
(11, '1', 'heavily', '大量地', 2, 1, 3, 0.666667),
(12, '1', 'stream', '小溪', 2, 1, 3, 0.666667),
(13, '1', 'form', '形成', 1, 2, 3, 0.333333),
(14, '1', 'wind', '蜿蜒', 1, 2, 3, 0.333333),
(15, '1', 'right', '正好', 1, 2, 3, 0.333333);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_index`
--
ALTER TABLE `list_index`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_index`
--
ALTER TABLE `list_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
