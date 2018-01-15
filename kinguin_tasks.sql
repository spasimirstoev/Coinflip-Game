-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 яну 2018 в 20:16
-- Версия на сървъра: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kinguin_tasks`
--

-- --------------------------------------------------------

--
-- Структура на таблица `coinflip_statistics`
--

CREATE TABLE `coinflip_statistics` (
  `id_statistics` int(11) NOT NULL,
  `head_choosen` int(11) NOT NULL,
  `tail_choosen` int(11) NOT NULL,
  `head_win` int(11) NOT NULL,
  `tail_win` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Схема на данните от таблица `coinflip_statistics`
--

INSERT INTO `coinflip_statistics` (`id_statistics`, `head_choosen`, `tail_choosen`, `head_win`, `tail_win`) VALUES
(1, 401, 63, 244, 220);

-- --------------------------------------------------------

--
-- Структура на таблица `loggin_users`
--

CREATE TABLE `loggin_users` (
  `login_username` varchar(20) NOT NULL,
  `login_dollars` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `loggin_users`
--

INSERT INTO `loggin_users` (`login_username`, `login_dollars`) VALUES
('qwe', 179),
('Space', 864468),
('TonnyG', 54271),
('cheater', 110),
('qazxswert', 9985566),
('master\'"', 120),
('george', 0),
('gameCheater', 1055655),
('logitech', 18),
('ferwererwe', 100),
('tester', 0),
('dave', 110),
('fdfsd', 109),
('desislav', 80),
('ffff', 40),
('aaaa', 100),
('georgi', 90),
('hristo', 110),
('stan', 108);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coinflip_statistics`
--
ALTER TABLE `coinflip_statistics`
  ADD PRIMARY KEY (`id_statistics`);

--
-- Indexes for table `loggin_users`
--
ALTER TABLE `loggin_users`
  ADD PRIMARY KEY (`login_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coinflip_statistics`
--
ALTER TABLE `coinflip_statistics`
  MODIFY `id_statistics` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
