-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 24, 2017 at 07:46 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intership`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `private` int(1) NOT NULL DEFAULT '0',
  `faculty_id` int(11) NOT NULL,
  `spec_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `name`, `description`, `user_id`, `private`, `faculty_id`, `spec_id`) VALUES
(30, 'Фирма 1 ЕООД', 'Lorem е елементарен текст, който се използва в типографската и печатарската област.', 0, 0, 3, 1),
(31, 'adportal', 'adportal', 0, 0, 1, 1),
(32, 'adportal', 'adportal', 0, 0, 1, 1),
(2, 'Фирма 2 ЕООД', 'Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. Lorem Ipsum е индустриален стандарт от около 1500 година, когато неизвестен печатар взема няколко печатарски букви и ги разбърква, за да напечата с тях книга с примерни шрифтове. Този начин не само е оцелял повече от 5 века, но е навлязъл и в публикуването на електронни издания като е запазен почти без промяна. Популяризиран е през 60те години на 20ти век със издаването на Letraset листи, съдържащи Lorem Ipsum пасажи, популярен е и в наши дни във софтуер за печатни издания като Aldus PageMaker, който включва различни версии на Lorem Ipsum.', 0, 0, 0, 0),
(3, 'Фирма 3 ЕООД', 'Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. Lorem Ipsum е индустриален стандарт от около 1500 година, когато неизвестен печатар взема няколко печатарски букви и ги разбърква, за да напечата с тях книга с примерни шрифтове. Този начин не само е оцелял повече от 5 века, но е навлязъл и в публикуването на електронни издания като е запазен почти без промяна. Популяризиран е през 60те години на 20ти век със издаването на Letraset листи, съдържащи Lorem Ipsum пасажи, популярен е и в наши дни във софтуер за печатни издания като Aldus PageMaker, който включва различни версии на Lorem Ipsum.', 0, 0, 0, 0),
(4, 'Фирма 4 ЕООД', 'Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. Lorem Ipsum е индустриален стандарт от около 1500 година, когато неизвестен печатар взема няколко печатарски букви и ги разбърква, за да напечата с тях книга с примерни шрифтове. Този начин не само е оцелял повече от 5 века, но е навлязъл и в публикуването на електронни издания като е запазен почти без промяна. Популяризиран е през 60те години на 20ти век със издаването на Letraset листи, съдържащи Lorem Ipsum пасажи, популярен е и в наши дни във софтуер за печатни издания като Aldus PageMaker, който включва различни версии на Lorem Ipsum.', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`) VALUES
(1, 'Компютърни системи и технологии'),
(2, 'Телекомуникации'),
(3, 'Автоматика');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_pos`
--

CREATE TABLE `faculty_pos` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty_pos`
--

INSERT INTO `faculty_pos` (`id`, `name`, `faculty_id`) VALUES
(1, 'PHP', 1),
(2, '.NET', 1),
(3, 'PHP', 2),
(4, '.NET', 2),
(5, 'PHP', 3),
(6, '.NET', 3);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_spec`
--

CREATE TABLE `faculty_spec` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty_spec`
--

INSERT INTO `faculty_spec` (`id`, `name`, `faculty_id`) VALUES
(1, 'Компютърно и софтуерно инженерство', 1),
(2, 'Информационни технологии в транспорта', 1),
(3, 'Компютърно и софтуерно инженерство', 2),
(4, 'Информационни технологии в транспорта', 2),
(5, 'Компютърно и софтуерно инженерство', 3),
(6, 'Информационни технологии в транспорта', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 1),
(2, 'user', '202cb962ac59075b964b07152d234b70', 0),
(3, 'dsaasdasdas', '095b2626c9b6bad0eb89019ea6091bd9', 0),
(6, 'bdabdw', '202cb962ac59075b964b07152d234b70', 0),
(50, 'user2', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE `users_data` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(55) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `course` int(2) NOT NULL,
  `fac_num` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bussines_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `faculty_spec` int(11) NOT NULL,
  `faculty_pos` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`id`, `name`, `email`, `phone`, `course`, `fac_num`, `user_id`, `bussines_id`, `faculty_id`, `faculty_spec`, `faculty_pos`, `from`, `to`, `description`) VALUES
(1, 'raya', 'raya@adportal.bg', '0883561820', 2, 121213066, 2, 0, 0, 0, 0, 0, 0, ''),
(2, 'raya', 'mariqnageorgieva69@abv.bg', '0889245671', 3, 121213066, 2, 0, 0, 0, 0, 0, 0, ''),
(3, 'test', 'test@test.com', '121321', 1, 1212131, 2, 0, 0, 0, 0, 0, 0, ''),
(4, 'adportal', 'mariqnageorgieva69@abv.bg', '121321', 12, 12123, 2, 0, 0, 0, 0, 0, 0, ''),
(5, 'raya', 'fasda@abv.bg', '1231', 12, 13132, 2, 0, 0, 0, 0, 0, 0, ''),
(6, 'raya', 'mariqnageorgieva69@abv.bg', '13132', 12, 1213, 2, 0, 0, 0, 0, 0, 0, ''),
(7, 'dsadas', 'dasdsa@abv.bg', '9338', 8, 929293, 2, 0, 0, 0, 0, 0, 0, ''),
(8, 'dsadas', 'dasdsa@abv.bg', '9338', 8, 929293, 2, 0, 0, 0, 0, 0, 0, ''),
(9, 'dsadas', 'dasdsa@abv.bg', '9338', 8, 929293, 2, 0, 0, 0, 0, 0, 0, ''),
(10, 'dsadas', 'dasdsa@abv.bg', '9338', 8, 929293, 2, 0, 0, 0, 0, 0, 0, ''),
(11, 'adportal', 'mariqnageorgieva69@abv.bg', '0889245671', 2, 12, 2, 0, 0, 0, 0, 0, 0, ''),
(12, 'adportal', 'mariqnageorgieva69@abv.bg', '0889245671', 2, 12, 2, 0, 0, 0, 0, 0, 0, ''),
(13, 'adportal', 'mariqnageorgieva69@abv.bg', '0889245671', 2, 12, 2, 2, 0, 0, 0, 0, 0, ''),
(14, 'dasda', 'raya@adportal.bg', '0889245671', 2, 121213066, 2, 2, 0, 0, 0, 0, 0, ''),
(15, 'raya', 'raya@adportal.bg', '0889245671', 2, 121212066, 2, 1, 0, 0, 0, 0, 0, ''),
(16, 'raya', 'raya@adportal.bg', '0889245671', 2, 121212066, 2, 1, 2, 1, 0, 0, 0, ''),
(17, 'test', 'raya@adportal.bg', '0889245671', 2, 1212313, 2, 1, 1, 1, 0, 0, 0, ''),
(18, 'test', 'raya@adportal.bg', '0889245671', 2, 1212313, 2, 1, 1, 1, 0, 0, 0, ''),
(19, 'test', 'raya@adportal.bg', '0889245671', 2, 1212313, 2, 1, 1, 1, 0, 0, 0, ''),
(20, 'test', 'raya@adportal.bg', '0889245671', 2, 1212313, 2, 1, 1, 1, 0, 0, 0, ''),
(21, 'test', 'raya@adportal.bg', '0889245671', 2, 1212313, 2, 1, 1, 1, 0, 0, 0, ''),
(22, 'test', 'raya@adportal.bg', '0889245671', 2, 1212313, 2, 1, 1, 1, 0, 0, 0, ''),
(23, 'test', 'raya@adportal.bg', '0889245671', 2, 1212313, 2, 1, 1, 1, 0, 0, 0, ''),
(24, 'test', 'raya@adportal.bg', '0889245671', 2, 1212313, 2, 1, 1, 1, 0, 0, 0, ''),
(25, 'test', 'raya@adportal.bg', '0889245671', 2, 1212313, 2, 1, 1, 1, 0, 0, 0, ''),
(26, 'test', 'raya@adportal.bg', '0889245671', 2, 1212313, 2, 1, 1, 1, 0, 0, 0, ''),
(27, 'test', 'raya@adportal.bg', '0889245671', 2, 1212313, 2, 1, 1, 1, 0, 0, 0, ''),
(28, 'test', 'raya@adportal.bg', '0889245671', 2, 1212313, 2, 1, 1, 1, 0, 0, 0, ''),
(29, 'test', 'raya@adportal.bg', '0889245671', 2, 1212313, 2, 1, 1, 1, 0, 0, 0, ''),
(30, 'test', 'raya@adportal.bg', '0889245671', 2, 1212313, 2, 1, 1, 1, 0, 0, 0, ''),
(31, 'test', 'raya@adportal.bg', '0889245671', 2, 1212313, 2, 1, 1, 1, 0, 0, 0, ''),
(32, 'test', 'raya@adportal.bg', '0889245671', 2, 1212313, 2, 1, 1, 1, 0, 0, 0, ''),
(33, 'test', 'raya@adportal.bg', '0889245671', 2, 1212313, 2, 1, 1, 1, 0, 0, 0, ''),
(34, 'test', 'raya@adportal.bg', '0889245671', 2, 1212313, 2, 1, 1, 1, 0, 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `faculty_pos`
--
ALTER TABLE `faculty_pos`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `faculty_spec`
--
ALTER TABLE `faculty_spec`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users_data`
--
ALTER TABLE `users_data`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `faculty_pos`
--
ALTER TABLE `faculty_pos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `faculty_spec`
--
ALTER TABLE `faculty_spec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `users_data`
--
ALTER TABLE `users_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
