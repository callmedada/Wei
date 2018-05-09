-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2018-05-10 00:47:11
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
-- 表的结构 `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ads`
--

INSERT INTO `ads` (`id`, `title`, `image`, `url`, `created`) VALUES
(52, '百度', 'http://www.perf.com/public/uploads/20180122/1516590529874909344.png', 'https://www.baidu.com/', '2018-01-22 16:08:50');

-- --------------------------------------------------------

--
-- 表的结构 `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `nav_ids` varchar(200) DEFAULT NULL,
  `isadmin` int(2) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `auth`
--

INSERT INTO `auth` (`id`, `role_id`, `nav_ids`, `isadmin`, `created`) VALUES
(1, 1, '1,31,65', 0, '2018-02-05 15:28:56'),
(2, 2, '1,31,32,33', 0, '2018-01-17 20:32:15'),
(10, 23, '31', 0, '2018-02-05 16:17:56');

-- --------------------------------------------------------

--
-- 表的结构 `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `content` text,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `banner`
--

INSERT INTO `banner` (`id`, `title`, `image`, `url`, `content`, `created`) VALUES
(51, '2', 'http://admin.wcao.top:8080/public/uploads/20180202/1517554493234465594.jpg', '', '<p>layui 的所有图标全部采用字体形式，取材于阿里巴巴矢量图标库（iconfont）。因此你可以把一个icon看作是一个普通的文字，这意味着你直接用css控制文字属性，如color、font-size，就可以改变图标的颜色和大小。而区分不同的图标，我们主要是采用&nbsp;<em style="padding: 0px 3px; color: rgb(102, 102, 102); font-family: ">Unicode</em><span style="font-family: ">&nbsp;字符12123</span></p><p><span style="font-family: "><span style="font-family: ">通过对一个内联元素（一般推荐用&nbsp;</span><em style="padding: 0px 3px; color: rgb(102, 102, 102); font-family: ">i</em><span style="font-family: ">标签）设定&nbsp;</span><em style="padding: 0px 3px; color: rgb(102, 102, 102); font-family: ">class=&quot;layui-icon&quot;</em><span style="font-family: ">，来定义一个图标，然后对元素加上图标对应的&nbsp;</span><em style="padding: 0px 3px; color: rgb(102, 102, 102); font-family: ">Unicode</em><span style="font-family: ">&nbsp;字符，即可显示出你想要的图标，譬如：</span></span></p><p><span style="font-family: "></span></p><pre class="layui-code layui-box layui-code-view" style="margin-top: 10px; margin-bottom: 10px; padding: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); white-space: pre-wrap; word-wrap: break-word; box-sizing: content-box; position: relative; line-height: 20px; border-width: 1px 1px 1px 6px; border-style: solid; border-color: rgb(226, 226, 226); border-image: initial; background-color: rgb(242, 242, 242); color: rgb(51, 51, 51); font-family: ">elayui.code&amp;#xe60c;其中的&nbsp;&amp;#xe60c;&nbsp;即是图标对应的Unicode字符你可以去定义它的颜色或者大小</pre>', '2018-02-02 19:55:29'),
(50, '123', 'http://admin.wcao.top:8080/public/uploads/20180202/15175544861963210782.jpg', 'http://www.baidu.com', '<p><img src="/ueditor/php/upload/image/20180122/1516609102377776.png" title="1516609102377776.png"/></p><p><img src="/ueditor/php/upload/image/20180122/1516609102696512.png" title="1516609102696512.png"/></p><p><br/></p>', '2018-02-02 19:55:23'),
(52, '测试2', 'http://admin.wcao.top:8080/public/uploads/20180205/15178167861889041083.jpg', 'http://www.baidu.com', '<p>asdasdasdasd</p>', '2018-02-05 20:46:34'),
(53, 'jhjk', '', 'hfdgfhg', '<p>gjhgj</p>', '2018-03-14 18:02:52');

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

-- --------------------------------------------------------

--
-- 表的结构 `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
-- 表的结构 `link`
--

CREATE TABLE `link` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `manage`
--

CREATE TABLE `manage` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `pwd` varchar(50) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_ip` varchar(50) DEFAULT NULL,
  `last_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `manage`
--

INSERT INTO `manage` (`id`, `name`, `pwd`, `role_id`, `email`, `phone`, `created`, `last_ip`, `last_time`) VALUES
(1, 'admin', '123456', 2, NULL, NULL, '2018-04-05 19:18:20', '127.0.0.1', '2018-04-06 03:04:20'),
(18, 'admin1', '1234567', 1, NULL, NULL, '2018-01-17 22:30:29', '127.0.0.1', '2018-01-17 10:01:48'),
(19, 'test', '123456', 23, NULL, NULL, '2018-04-05 19:15:46', '127.0.0.1', '2018-04-06 03:04:46'),
(20, 'hysasuke', '30115991', 2, NULL, NULL, '2018-05-04 18:14:04', '127.0.0.1', '2018-05-05 02:05:04');

-- --------------------------------------------------------

--
-- 表的结构 `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `controller` varchar(20) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `first` int(11) DEFAULT NULL COMMENT '是否为顶级节点，1：是，0：不是',
  `play` char(10) DEFAULT NULL COMMENT '是否显示,on：显示，off：隐藏',
  `icon` char(50) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `menu`
--

INSERT INTO `menu` (`id`, `name`, `controller`, `pid`, `first`, `play`, `icon`, `created`) VALUES
(1, '系统设置', 'Admin', 0, 1, 'on', '614', '2018-02-28 00:08:39'),
(2, '菜单设置', 'Menu', 1, 0, 'on', '630', '2018-01-15 22:18:40'),
(3, '角色设置', 'Role', 1, 0, 'on', '612', '2018-01-15 22:19:01'),
(5, '权限设置', 'Auth', 1, 0, 'on', '857', '2018-01-16 19:47:08'),
(4, '后台账号', 'Manage', 1, 0, 'on', '613', '2018-01-22 21:31:03'),
(31, '全局设置', '', 0, 1, 'on', '705', '2018-02-27 22:53:55'),
(33, 'Banner', 'Banner', 31, 0, 'on', '634', '2018-02-05 20:10:24'),
(70, 'User', 'User', 1, 0, 'on', '', '2018-03-20 19:40:37'),
(68, 'test', '', 0, 1, 'on', '', '2018-03-20 17:54:42'),
(67, 'banner1', 'Banners', 31, 0, 'on', '', '2018-03-14 15:46:41'),
(71, 'AvaliableRoom', 'Room', 1, 0, 'on', '&#xe63c', '2018-04-06 17:52:30'),
(75, 'Transaction', 'transaction', 1, 0, 'on', '', '2018-05-04 18:46:35');

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
-- 表的结构 `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` char(50) DEFAULT NULL,
  `isadmin` int(2) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `role`
--

INSERT INTO `role` (`id`, `name`, `isadmin`, `created`) VALUES
(1, '管理员', 1, '2018-03-20 21:23:46'),
(2, '超级管理员', 1, '2018-03-20 21:23:49'),
(23, '测试账号', 1, '2018-03-20 21:23:51'),
(24, '普通会员', 0, '2018-03-20 21:23:39');

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
(3, 101, 2),
(4, 222, 3);

-- --------------------------------------------------------

--
-- 表的结构 `transaction`
--

CREATE TABLE `transaction` (
  `tid` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `term` varchar(1) NOT NULL,
  `uid` int(11) NOT NULL,
  `date` date NOT NULL,
  `in_time` time NOT NULL,
  `out_time` time NOT NULL,
  `rid` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `transaction`
--

INSERT INTO `transaction` (`tid`, `year`, `term`, `uid`, `date`, `in_time`, `out_time`, `rid`, `status`) VALUES
(1, 2018, 'S', 3, '2018-05-04', '14:27:00', '17:45:59', 1, '2'),
(2, 2018, 'S', 3, '2018-05-04', '13:43:00', '15:41:29', 2, '2'),
(4, 2018, 'S', 20, '2018-05-04', '19:03:24', '20:05:39', 1, '2'),
(18, 2018, 'S', 20, '2018-05-09', '16:05:15', '00:00:00', 3, '1');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `alias` char(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `sex` int(11) DEFAULT NULL,
  `major` char(255) DEFAULT NULL,
  `avatar` char(255) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `alias`, `role_id`, `sex`, `major`, `avatar`, `created`, `last_time`) VALUES
(3, 'leilei', '', '李雷', 0, 1, 'ITEC', '', '2018-03-20 20:12:39', '0000-00-00'),
(4, 'test1', '', '韩梅梅', 0, 2, 'ITEC', '', '2018-03-20 20:12:46', '0000-00-00'),
(6, 'sad', '123123', 'asd', 24, NULL, 'asd', 'asd', '2018-03-20 22:07:19', '0000-00-00'),
(7, '20', '2018', 'S', 0, NULL, '2018-5-4', '15:03:23', '2018-05-04 18:57:07', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage`
--
ALTER TABLE `manage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- 使用表AUTO_INCREMENT `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- 使用表AUTO_INCREMENT `building`
--
ALTER TABLE `building`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- 使用表AUTO_INCREMENT `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `link`
--
ALTER TABLE `link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- 使用表AUTO_INCREMENT `manage`
--
ALTER TABLE `manage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- 使用表AUTO_INCREMENT `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- 使用表AUTO_INCREMENT `report`
--
ALTER TABLE `report`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- 使用表AUTO_INCREMENT `room`
--
ALTER TABLE `room`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
