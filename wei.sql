-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018-04-29 19:31:27
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
(1, 'Life Science', 100, ''),
(2, 'Lassonde Building', 999, 'ChIJix1g5i8uK4gRKCn_A0nn5uM');

-- --------------------------------------------------------

--
-- 表的结构 `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `section` varchar(1) NOT NULL,
  `term` varchar(1) NOT NULL,
  `year` year(4) NOT NULL,
  `courseid` int(4) NOT NULL,
  `time` time NOT NULL,
  `endtime` time NOT NULL,
  `rid` int(11) NOT NULL,
  `days` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `course`
--

INSERT INTO `course` (`id`, `section`, `term`, `year`, `courseid`, `time`, `endtime`, `rid`, `days`) VALUES
(1, 'A', 'W', 2018, 4443, '13:00:00', '15:00:00', 2, '135'),
(2, 'M', 'W', 2018, 2011, '08:30:00', '10:00:00', 1, '24'),
(3, 'Z', 'W', 2018, 3101, '10:00:00', '16:00:00', 1, '135');

-- --------------------------------------------------------

--
-- 表的结构 `report`
--

CREATE TABLE `report` (
  `rid` int(11) NOT NULL,
  `time` time NOT NULL,
  `bid` int(255) NOT NULL,
  `roomnumber` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `room`
--

CREATE TABLE `room` (
  `rid` int(11) NOT NULL,
  `roomnumber` int(11) NOT NULL,
  `bid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `room`
--

INSERT INTO `room` (`rid`, `roomnumber`, `bid`) VALUES
(1, 105, 1),
(2, 206, 1),
(3, 101, 2);

-- --------------------------------------------------------

--
-- 表的结构 `transaction`
--

CREATE TABLE `transaction` (
  `tid` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `term` varchar(1) NOT NULL,
  `uid` int(11) NOT NULL,
  `time` time NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `building`
--
ALTER TABLE `building`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `report`
--
ALTER TABLE `report`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `room`
--
ALTER TABLE `room`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
