-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018-06-13 22:27:57
-- 服务器版本： 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wei`
--

-- --------------------------------------------------------

--
-- 表的结构 `building`
--

CREATE TABLE `building` (
  `bid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `numberOfRooms` int(255) NOT NULL,
  `googleid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `building`
--

INSERT INTO `building` (`bid`, `name`, `numberOfRooms`, `googleid`) VALUES
(1, 'Life Sciences Building', 100, 'ChIJHRCqJS4uK4gR9S-sy8rCfKA'),
(2, 'Lassonde Bldg', 999, 'ChIJix1g5i8uK4gRKCn_A0nn5uM'),
(3, 'Chemistry', 100, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`bid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `building`
--
ALTER TABLE `building`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
