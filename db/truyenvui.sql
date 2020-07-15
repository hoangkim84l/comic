-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2020 at 07:50 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `truyenvui`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_group_id` int(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `admin_group_id`) VALUES
(1, 'admin', '96e79218965eb72c92a549dd5a330112', 'Techglobal', 1),
(7, 'admincp', '96e79218965eb72c92a549dd5a330112', 'Mod', 2),
(8, 'techglobal', 'd7888a850dd5caf41395bfa98b660868', 'Techglobal co.,ltd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `name` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `name`, `status`) VALUES
(1, 'Eiichiro Oda', 1),
(5, 'Jeon Keuk Jin', 1),
(6, 'Ngưu Lão', 1),
(7, 'Đang cập nhật', 1),
(9, 'Đang cập nhật', 1),
(10, 'Mashima Hiro', 1),
(11, 'Lục Xu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `slug` int(11) DEFAULT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  `date_updated` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `slug`, `fullname`, `date_created`, `date_updated`, `active`) VALUES
(1, 1, 'NGuen van a', 1397379131, 1397379131, 1),
(10, 1, 'Le Chi Dung', 1397390565, 1397390565, 1),
(11, 1, 'Le Chi Trung', 1397390582, 1397390582, 1),
(12, 1, 'Le Chi ABC', 1397390593, 1397390593, 1),
(21, 1, 'NQS', NULL, NULL, 1),
(22, 1, 'NTU', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT 0,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'mô tả'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `slug`, `parent_id`, `lft`, `rght`, `date_created`, `date_updated`, `description`) VALUES
(1, 'Ecchi', '', 0, 1, 2, '2017-04-05 08:59:19', '2017-04-18 03:30:17', 'ECCHI'),
(2, 'Adventure', '', 0, 5, 6, '2017-04-05 09:01:52', '2017-04-18 03:30:52', 'abc'),
(3, 'Anime', '', 0, 3, 4, '2017-04-18 02:58:17', '2017-04-18 03:29:15', 'Anime'),
(4, 'Romance', '', 0, 7, 8, '2017-04-18 03:31:10', '2017-04-18 03:31:10', 'Romance'),
(5, 'Comic', '', 0, 9, 10, '2017-04-18 03:31:30', '2017-04-18 03:31:30', 'Comic'),
(6, 'Action', '', 0, 11, 12, '2017-04-18 03:32:07', '2017-04-18 03:32:07', 'Action'),
(8, 'Magic ', 'magic-1', 0, 13, 14, '2017-05-31 03:57:38', '2020-07-14 12:46:48', 'Magic ');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` int(11) NOT NULL,
  `name` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `story_id` int(11) NOT NULL DEFAULT 0,
  `image_link` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `status` tinyint(5) NOT NULL DEFAULT 1,
  `ordering` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `name`, `slug`, `story_id`, `image_link`, `created`, `status`, `ordering`) VALUES
(1, 'Chap 1', 'chap-1-1', 5, 'gi1.jpg', '2020-07-15 06:39:00', 1, 1),
(2, 'Chap 2', 'chap-2', 5, 'gi26.jpg', '2020-07-15 06:39:25', 1, 2),
(3, 'Chap 3', 'chap-3', 5, 'gi78.jpg', '2020-07-15 06:39:37', 1, 3),
(5, 'Chap 1', 'chap-1', 30, '001.jpg', '2020-07-15 06:44:12', 1, 1),
(6, 'Chap 2', 'chap-2-1', 30, '002.jpg', '2020-07-15 06:44:28', 1, 2),
(7, 'Chap 3', 'chap-3-1', 30, '003.jpg', '2020-07-15 06:44:40', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(128) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `generals`
--

CREATE TABLE `generals` (
  `id` int(11) NOT NULL COMMENT 'khóa chính, tự tăng',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên website',
  `description` varchar(800) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Giới thiệu tóm tắt về website',
  `keywords` varchar(800) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'keyword của website',
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'email của website',
  `site_name` varchar(800) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên công ty',
  `smtp_username` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'mailserver để dùng sendmail.',
  `smtp_password` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'pass word để tự động login mail server khi send mail',
  `smtp_host` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Địa chỉ IP gửi mail',
  `google_analytic` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'code google',
  `smtp_port` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '25' COMMENT 'port send mail',
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'địa chỉ facebook',
  `hotline` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'số điện thoại hotline của công ty',
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'địa chỉ công ty',
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'số điện thoại công ty',
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'số fax công ty',
  `price` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'logo công ty',
  `googleplus` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'địa chỉ googleplus',
  `smtp_ssl` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tât cả thông tin chung';

--
-- Dumping data for table `generals`
--

INSERT INTO `generals` (`id`, `name`, `description`, `keywords`, `email`, `site_name`, `smtp_username`, `smtp_password`, `smtp_host`, `google_analytic`, `smtp_port`, `facebook`, `hotline`, `address`, `phone`, `fax`, `price`, `logo`, `googleplus`, `smtp_ssl`) VALUES
(1, 'Dynamic English - Anh ngữ sinh động, dạy tiếng anh online', '', 'dạy tiếng anh, tiếng anh online, học tiếng anh, học tiếng anh online, anh ngữ sinh động, Dynamic English', 'info@abc.com', '', 'marketing@anhngusinhdong.com', 'anhngusinhdong2014', 'mail.anhngusinhdong.com', '<script>var i=1;</script>', '25', 'https://www.facebook.com/readbookonline.info', '', '1B - 22.3 La Casa Bulding, 89 Hoang Quoc Viet, Phu Thuan Ward , District 7, HCMC', '(0939) 598926', '', NULL, NULL, 'https://google.com.vn', 'tsl');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `active`) VALUES
(1, 'super admin', 1),
(2, 'Giáo viên', 1),
(3, 'Học viên', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `link` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_link` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT 1,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `view` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `name`, `slug`, `description`, `image_link`, `category_id`, `created`, `updated`, `status`, `view`) VALUES
(1, 'One Pice', '', 'truyenej nha', '', 3, '2017-04-18 04:04:03', '2017-05-31 11:37:50', 1, 6),
(4, 'Hiệp Khách Giang Hồ', '', 'Hiệp Khách Giang Hồ', '', 4, '2017-04-18 04:16:24', '2017-05-31 03:05:08', 1, 19),
(5, 'Hôn Trộm 55 Lần', '', '', '', 5, '2017-04-18 04:17:00', '2017-05-31 03:04:29', 1, 1),
(7, 'Attack On Titan', '', 'Attack On Titan', '', 6, '2017-05-31 03:07:35', '2017-05-31 03:07:35', 1, 0),
(8, 'Fairy Tail', '', 'Fairy Tail', '', 3, '2017-05-31 03:09:01', '2017-05-31 03:09:01', 1, 3),
(9, 'Người trong giang hồ', '', 'Người trong giang hồ', '', 1, '2017-05-31 03:09:35', '2017-05-31 03:09:35', 1, 4),
(10, 'Danchi Majo', '', 'Danchi Majo', '', 1, '2017-05-31 03:12:01', '2017-05-31 03:12:01', 1, 0),
(11, 'Danh Sách Yêu Quái', '', 'Danh Sách Yêu Quái', '', 2, '2017-05-31 03:13:02', '2017-05-31 03:13:02', 1, 0),
(12, 'Lady Justice', '', 'Lady Justice', '', 2, '2017-05-31 03:13:52', '2017-05-31 03:13:52', 1, 4),
(13, 'Legend 2', '', 'Legend 2', '', 1, '2017-05-31 03:14:49', '2017-05-31 03:14:49', 1, 5),
(14, 'Hajimete No Gal', '', 'Hajimete No Gal', '', 4, '2017-05-31 03:15:35', '2017-05-31 03:15:35', 1, 3),
(15, 'Bokura No Fushidara', '', 'Bokura No Fushidara', '', 5, '2017-05-31 03:16:45', '2017-05-31 03:16:45', 1, 10),
(16, 'One Pice2', '', 'truyenej nha', '', 3, '2017-04-18 04:04:03', '2017-05-31 11:37:50', 1, 6),
(17, 'Hiệp Khách Giang Hồ2', '', 'Hiệp Khách Giang Hồ', '', 4, '2017-04-18 04:16:24', '2017-05-31 03:05:08', 1, 19),
(18, 'Hôn Trộm 55 Lần2', '', '', '', 5, '2017-04-18 04:17:00', '2017-05-31 03:04:29', 1, 1),
(19, 'Go! Go!', '', 'Go!', '', 1, '2017-05-31 03:05:52', '2020-07-14 12:19:16', 1, 2),
(20, 'Attack On Titan2', '', 'Attack On Titan', '', 6, '2017-05-31 03:07:35', '2017-05-31 03:07:35', 1, 0),
(21, 'Fairy Tail2', '', 'Fairy Tail', '', 3, '2017-05-31 03:09:01', '2017-05-31 03:09:01', 1, 3),
(22, 'Người trong giang hồ2', '', 'Người trong giang hồ', '', 1, '2017-05-31 03:09:35', '2017-05-31 03:09:35', 1, 4),
(23, 'Danchi Majo2', '', 'Danchi Majo', '', 1, '2017-05-31 03:12:01', '2017-05-31 03:12:01', 1, 0),
(24, 'Danh Sách Yêu Quái2', '', 'Danh Sách Yêu Quái', '', 2, '2017-05-31 03:13:02', '2017-05-31 03:13:02', 1, 0),
(25, 'Lady Justice2', '', 'Lady Justice', '', 2, '2017-05-31 03:13:52', '2017-05-31 03:13:52', 1, 4),
(26, 'Legend 22', '', 'Legend 2', '', 1, '2017-05-31 03:14:49', '2017-05-31 03:14:49', 1, 5),
(27, 'Hajimete No Gal2', '', 'Hajimete No Gal', '', 4, '2017-05-31 03:15:35', '2017-05-31 03:15:35', 1, 3),
(28, 'Bokura No Fushidara2', '', 'Bokura No Fushidara', '', 5, '2017-05-31 03:16:45', '2017-05-31 03:16:45', 1, 10),
(30, 'Trở Về Địa Cầu Làm Thần Côn', 'tro-ve-djia-cau-lam-than-con', 'Trở Về Địa Cầu Làm Thần Côn', 'anime-blazblue-1149.jpg', 5, '2020-07-14 12:35:52', '2020-07-15 06:43:50', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `username`, `password`, `date_created`, `date_updated`) VALUES
(2, 'Nguyễn Quốc Sử', 'nqsu381@gmail.com', '', '', 'nongdanit', '$2a$10$RJX6k5GCxNuTzsD6FtBzQe8F.aQgMbX/QeKKM4G5nAGsTyyanCsTK', '2013-10-31 03:24:42', '2017-03-27 04:52:53'),
(65, 'Loan', 'nqsu381@gmail.com', '', '', 'tuyetloan', '$2a$10$MEEQeiTY8ebDoINH7w.Bb.xPac8MSce.HXSWSXXiONXrlOhmyUsaa', '2013-10-31 03:24:42', '2014-12-10 21:01:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generals`
--
ALTER TABLE `generals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `generals`
--
ALTER TABLE `generals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'khóa chính, tự tăng', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
