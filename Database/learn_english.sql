-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 20, 2018 at 04:54 PM
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
  `list` varchar(170) NOT NULL,
  `word` varchar(100) NOT NULL,
  `translate` varchar(170) NOT NULL,
  `r_cont` int(11) NOT NULL COMMENT 'Correct number of times',
  `f_cont` int(11) NOT NULL COMMENT 'Number of errors',
  `cont` int(11) NOT NULL COMMENT 'Total',
  `rate` float NOT NULL COMMENT 'Correct rate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `english`
--

INSERT INTO `english` (`id`, `list`, `word`, `translate`, `r_cont`, `f_cont`, `cont`, `rate`) VALUES
(1, '1', 'rose ', '玫瑰花', 0, 0, 0, 0),
(2, '1', ' tulip ', '郁金香', 0, 0, 0, 0),
(3, '1', ' balsam ', '凤仙花', 0, 0, 0, 0),
(4, '1', ' canna ', '美人蕉', 0, 0, 0, 0),
(5, '1', ' lily ', '百合花', 0, 0, 0, 0),
(6, '1', ' jasmine ', '茉莉', 0, 0, 0, 0),
(7, '1', ' sweet pea ', '香豌豆花', 0, 0, 0, 0),
(8, '1', ' sunflower ', '向日葵', 0, 0, 0, 0),
(9, '1', ' geranium ', '大竺葵', 0, 0, 0, 0),
(10, '1', ' morning-glory', ' 牵牛花', 0, 0, 0, 0),
(11, '1', ' cosmos', ' 大波斯菊', 0, 0, 0, 0),
(12, '1', ' pansy', ' 三色堇', 0, 0, 0, 0),
(13, '1', ' poppy ', '罂粟花', 0, 0, 0, 0),
(14, '1', ' marigold ', '金盏花', 0, 0, 0, 0),
(15, '1', ' carnation ', '麝香石竹', 0, 0, 0, 0),
(16, '1', ' amaryllis ', '孤挺花', 0, 0, 0, 0),
(17, '1', ' dahlia ', '大丽花', 0, 0, 0, 0),
(18, '1', ' pink ', '石竹花', 0, 0, 0, 0),
(19, '1', ' crocus ', '番红花', 0, 0, 0, 0),
(20, '1', ' iris ', '蝴蝶花', 0, 0, 0, 0),
(21, '1', ' hyacinth', ' 风信花', 0, 0, 0, 0),
(22, '1', ' daffodil ', '黄水仙', 0, 0, 0, 0),
(23, '1', ' chrysanthemum ', '菊', 0, 0, 0, 0),
(24, '1', ' marguerite, daisy ', '雏菊', 0, 0, 0, 0),
(25, '1', ' gladiolus ', '剑兰', 0, 0, 0, 0),
(26, '1', ' cantury plant ', '龙舌兰', 0, 0, 0, 0),
(27, '1', ' magnolia ', '木兰', 0, 0, 0, 0),
(28, '1', ' yucca ', '丝兰', 0, 0, 0, 0),
(29, '1', ' orchid ', '兰花', 0, 0, 0, 0),
(30, '1', ' freesia ', '小苍兰', 0, 0, 0, 0),
(31, '1', ' cyclamen', ' 仙客来', 0, 0, 0, 0),
(32, '1', ' begonia ', '秋海棠', 1, 1, 1, 0),
(33, '1', ' anemone ', '银莲花', 0, 0, 0, 0),
(34, '1', ' wisteria', ' 柴藤', 0, 0, 0, 0),
(35, '1', ' redbud', ' 紫荆', 0, 0, 0, 0),
(36, '1', ' dogwood ', '山茱萸', 0, 0, 0, 0),
(37, '1', ' hawthorn', ' 山楂', 0, 0, 0, 0),
(38, '1', ' camellia ', '山茶', 0, 0, 0, 0),
(39, '1', ' hydrangea ', '八仙花', 0, 0, 0, 0),
(40, '1', ' hibiscus ', '木槿', 0, 0, 0, 0),
(41, '1', ' peony ', '芍药', 0, 0, 0, 0),
(42, '1', ' azalea ', '杜鹃', 0, 0, 0, 0),
(43, '1', ' rhododendron ', '杜鹃花', 0, 0, 0, 0),
(44, '1', ' daphne ', '瑞香', 0, 0, 0, 0),
(45, '1', ' gardenia ', '栀子', 0, 0, 0, 0),
(46, '1', ' lilac ', '紫丁香', 1, 0, 1, 1),
(47, '1', ' night-blooming cereus ', '仙人掌', 0, 0, 0, 0),
(48, '1', ' apple ', '苹果', 0, 0, 0, 0),
(49, '1', ' pear ', '梨', 0, 0, 0, 0),
(50, '1', ' orange ', '桔子', 0, 0, 0, 0),
(51, '1', ' quince ', '柑橘', 0, 0, 0, 0),
(52, '1', ' apricot', ' 杏', 0, 0, 0, 0),
(53, '1', ' plum', ' 洋李', 0, 0, 0, 0),
(54, '1', ' pistil ', '雌蕊', 0, 0, 0, 0),
(55, '1', ' ovary ', '子房', 0, 0, 0, 0),
(56, '1', ' petal ', '花瓣', 0, 0, 0, 0),
(57, '1', ' anther ', '花药', 0, 0, 0, 0),
(58, '1', ' stamen ', '雄蕊', 0, 0, 0, 0),
(59, '1', ' nectar gland ', '蜜腺', 0, 0, 0, 0),
(60, '1', ' sepal', ' 萼片', 0, 0, 0, 0),
(61, '1', ' stalk ', '花柄', 0, 0, 0, 0),
(62, '1', ' pollen ', '花粉', 0, 0, 0, 0),
(63, '1', ' pine ', '松', 0, 0, 0, 0),
(64, '1', ' cerdar ', '雪松类', 0, 0, 0, 0),
(65, '1', ' larch ', '落叶松', 0, 0, 0, 0),
(66, '1', ' juniper ', '杜松', 0, 0, 0, 0),
(67, '1', ' cone ', '松果', 0, 0, 0, 0),
(68, '1', ' cypress ', '柏树', 0, 0, 0, 0),
(69, '1', ' bamboo ', '竹', 0, 0, 0, 0),
(70, '1', ' box ', '黄杨', 0, 0, 0, 0),
(71, '1', ' poplar ', '白杨', 0, 0, 0, 0),
(72, '1', ' cottonwood ', '三角叶杨', 0, 0, 0, 0),
(73, '1', ' osier ', '紫皮柳树', 0, 0, 0, 0),
(74, '1', ' willow ', '垂柳', 0, 0, 0, 0),
(75, '1', ' birch ', '白桦', 0, 0, 0, 0),
(76, '1', ' maple ', '枫树', 0, 0, 0, 0),
(77, '1', ' sequoia ', '红杉', 0, 0, 0, 0),
(78, '1', ' fir', ' 冷杉', 0, 0, 0, 0),
(79, '1', ' hemlock spruce', ' 铁杉', 0, 0, 0, 0),
(80, '1', ' spruce ', '云杉', 0, 0, 0, 0),
(81, '1', ' yew ', '紫杉', 0, 0, 0, 0),
(82, '2', 'is1', '这是1', 1, 0, 1, 1),
(83, '2', 'is2', '这是2', 1, 0, 1, 1),
(84, '2', 'this is3', '这是3', 0, 0, 0, 0),
(85, '2', 'this is 4', '这是 4', 0, 0, 0, 0),
(86, 'one', 'one', '', 0, 0, 0, 0),
(87, 'one', 'one', '', 0, 0, 0, 0),
(88, 'one', 'one', '', 0, 0, 0, 0),
(89, 'two', 'two', '', 0, 0, 0, 0),
(90, 'two', 'two', '', 0, 0, 0, 0),
(91, 'one', 'one', '', 0, 0, 0, 0),
(92, 'one', 'one', '', 0, 0, 0, 0),
(93, 'bad', 'bad', '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `list_index`
--

CREATE TABLE `list_index` (
  `id` int(11) NOT NULL,
  `list_name` varchar(170) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_index`
--

INSERT INTO `list_index` (`id`, `list_name`, `total`) VALUES
(1, '1', 81),
(2, '2', 4),
(3, 'one', 5),
(4, 'two', 2),
(5, 'bad', 1);

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
-- Indexes for table `list_index`
--
ALTER TABLE `list_index`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `list_index`
--
ALTER TABLE `list_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
