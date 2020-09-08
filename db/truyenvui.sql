-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2020 at 07:04 AM
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
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `status` tinyint(5) NOT NULL DEFAULT 1,
  `ordering` int(11) NOT NULL DEFAULT 0,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `name`, `slug`, `story_id`, `image_link`, `content`, `author`, `created`, `status`, `ordering`, `view`) VALUES
(1, 'Chap 1', 'chap-1-new', 5, 'gi1.jpg', '', '', '2020-07-15 06:39:00', 1, 1, 12),
(2, 'Chap 2', 'chap-2', 5, 'gi26.jpg', '', '', '2020-07-15 06:39:25', 1, 2, 4),
(3, 'Chap 3', 'chap-3', 5, 'gi78.jpg', '', '', '2020-07-15 06:39:37', 1, 3, 0),
(5, 'Chap 1', 'chap-1-mua-la-rung', 30, '001.jpg', '<p>\r\n	Nội dung chữ</p>\r\n', 'Di', '2020-08-27 08:28:41', 1, 1, 39),
(6, 'Chap 2', 'chap-2-2', 30, '002.jpg', '', 'DUY', '2020-08-27 08:40:43', 1, 2, 82),
(7, 'Chap 3', 'chap-3-1', 30, '003.jpg', '', '', '2020-07-15 06:44:40', 1, 3, 25),
(8, 'Chương 1 Sự khởi đầu', 'chuong-1-su-khoi-djau', 31, '', '<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Ở thế giới n&agrave;y mọi thứ của một người được quyết định bởi rune m&agrave; người đ&oacute; sở hữu, rune c&oacute; m&agrave;u c&agrave;ng đậm, c&agrave;ng kh&aacute;c biệt th&igrave; sức mạnh người đ&oacute; sở hữu c&agrave;ng lớn.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Truyền thuyết xưa kể lại rằng, thuở xa xưa c&oacute; một vị anh h&ugrave;ng, khi thế giới đang đứng trước bờ vực bị ma tộc x&acirc;m chiếm, vị anh h&ugrave;ng n&agrave;y đ&atilde; d&ugrave;ng to&agrave;n bộ sức mạnh v&agrave; sinh mệnh của m&igrave;nh để tạo ra thất trụ phong ấn h&igrave;nh th&agrave;nh n&ecirc;n ranh giới của nh&acirc;n loại v&agrave; ma tộc.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trải qua h&agrave;ng ng&agrave;n năm, kết giới đ&oacute; ng&agrave;y c&agrave;ng yếu, bọn ma tộc lại bắt đầu chuẩn bị cho một cuộc x&acirc;m lược mới.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">C&oacute; một lời ti&ecirc;n tri n&oacute;i rằng, khi cả thế giới một lần nữa l&acirc;m nguy sẽ c&oacute; một vị anh h&ugrave;ng xuất hiện, người n&agrave;y mang trong người một sức mạnh phi thường, đ&oacute; sẽ ch&iacute;nh l&agrave; người mở ra một thế giới mới.</span></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;** Lục địa đen hay c&ograve;n gọi l&agrave; lục địa Jourhelhm **</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;** Kỷ nguy&ecirc;n thứ 3 sau khi thất trụ phong ấn h&igrave;nh th&agrave;nh **</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;** L&agrave;ng Heauhelm đ&oacute; c&aacute;ch th&agrave;nh phố Mimir kh&ocirc;ng xa **</span></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Một đ&aacute;m người thần b&iacute;, đang đứng sau c&aacute;nh rừng nh&igrave;n về ph&iacute;a ng&ocirc;i l&agrave;ng.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Theo th&ocirc;ng tin điều tra được, đứa trẻ đ&oacute; sẽ được sinh ra ngay tại ng&ocirc;i l&agrave;ng n&agrave;y. Một t&ecirc;n mặt đồ đen c&uacute;i người, k&iacute;nh cẩn n&oacute;i.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Tốt lắm. Mọi thứ đều đ&atilde; sẵn s&agrave;ng, chỉ c&ograve;n chờ ng&agrave;y đứa trẻ đ&oacute; ra đời th&ocirc;i. Gia tộc Mahdo của ta cuối c&ugrave;ng cũng chờ được ng&agrave;y n&agrave;y. T&ecirc;n mặc đồ đen n&agrave;y của vẻ l&agrave; chỉ huy của đ&aacute;m người n&agrave;y, hắn n&oacute;i xong th&igrave; cười lớn.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hắn chỉ một người &aacute;o đen đang đứng gần đ&oacute;.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Ngươi, quay về b&aacute;o với Ng&agrave;i ấy l&agrave; mọi chuyện h&atilde;y thực hiện theo đ&uacute;ng kế hoạch.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Đ&atilde; r&otilde;. Người &aacute;o đen đ&oacute; nhận lệnh rồi từ từ biến mất trong b&oacute;ng đ&ecirc;m.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;** Ở một ngọn n&uacute;i nọ, quanh năm bao phủ bởi băng tuyết **</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;** Bộ tộc Javed **</span></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Một &ocirc;ng l&atilde;o, r&acirc;u t&oacute;c bạc phơ, cả người mặc một bộ đồ trắng đang ngồi tĩnh tọa trong một điện thờ.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Vị anh h&ugrave;ng...vị anh h&ugrave;ng trong lời ti&ecirc;n tri sắp ra đời rồi. Mau, mau đi tập hợp c&aacute;c trưởng l&atilde;o kh&aacute;c lại đ&acirc;y cho ta. &Ocirc;ng l&atilde;o đ&oacute; bất chợt mở to mắt, k&ecirc;u l&ecirc;n.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;Chẳng mấy chốc m&agrave; điện thờ đ&atilde; chật k&iacute;n người. Khi nhận thấy đ&atilde; đủ mặt, &ocirc;ng l&atilde;o chậm r&atilde;i n&oacute;i.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">- Ta c&oacute; linh cảm vị anh h&ugrave;ng trong lời ti&ecirc;n tri sắp ch&agrave;o đời, nhưng c&oacute; một thế lực đen tối đang c&oacute; mưu đồ muốn h&atilde;m hại Ng&agrave;i ấy. Nếu điều đ&oacute; xảy ra, tai họa sẽ ập xuống thế giới n&agrave;y. Ch&uacute;ng ta, những đứa con được thần linh ph&ugrave; trợ, c&oacute; nhiệm vụ phải gi&uacute;p đỡ cho Ng&agrave;i ấy, kh&ocirc;ng thể để cho thế lực đen tối đ&oacute; ho&agrave;n th&agrave;nh &yacute; nguyện được. Cho d&ugrave; phải đ&aacute;nh đổi cả t&iacute;nh mạng n&agrave;y. C&aacute;c người c&oacute; đồng &yacute; l&agrave;m điều n&agrave;y với ta kh&ocirc;ng?</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Được, nghe theo đại trưởng l&atilde;o.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Được.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;H&agrave;ng loạt tiếng đồng &yacute; vang l&ecirc;n, tất cả đều đồng l&ograve;ng h&ocirc; to &quot;Được, bảo vệ đấng cứu thế!&quot;</span></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;** L&agrave;ng Heauhelm 3 ng&agrave;y sau **</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tr&ecirc;n bầu trời đang nắng ch&oacute;i chang đột nhi&ecirc;n m&acirc;y đen k&eacute;o đến, sấm chớp nổi l&ecirc;n b&aacute;o hiệu một trận cuồng phong sắp k&eacute;o đến.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cả đ&aacute;m d&acirc;n l&agrave;ng k&eacute;o nhau chạy t&aacute;n loạn, c&aacute;c cửa h&agrave;ng nhanh ch&oacute;ng thu dọn h&agrave;ng h&oacute;a rồi đ&oacute;ng cửa lại, c&aacute;c ng&ocirc;i nh&agrave; vốn đ&atilde; kh&ocirc;ng được chắc chắn lắm nay trở n&ecirc;n xi&ecirc;u vẹo, đung đưa trước gi&oacute;, cảm gi&aacute;c như chỉ cần một đợt gi&oacute; nhẹ thổi qua cũng l&agrave;m cho ch&uacute;ng tan th&agrave;nh từng mảnh vụn.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Kỳ lạ, sao đang nắng lại c&oacute; gi&oacute; nổi l&ecirc;n được. Một người d&acirc;n vừa tranh thủ dọn h&agrave;ng vừa lầm bầm.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Đ&uacute;ng l&agrave; điềm b&aacute;o xui xẻo m&agrave;. Một người kh&aacute;c k&ecirc;u l&ecirc;n.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cả khu chợ tấp nập chẳng mấy chốc vắng lặng, kh&ocirc;ng một b&oacute;ng người.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bỗng một tiếng s&eacute;t ch&oacute;i tay vang l&ecirc;n như x&eacute; tan bầu trời. M&acirc;y đen c&ugrave;ng với b&atilde;o t&aacute;p đột ngột biến mất, trả lại bầu trời trong xanh kh&ocirc;ng một gợn m&acirc;y.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C&ugrave;ng l&uacute;c đ&oacute;, c&aacute;ch khu chợ kh&ocirc;ng xa một tiếng kh&oacute;c của trẻ con vang l&ecirc;n.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Oa..oa..oa.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Một b&agrave; mụ vui mừng bế một đứa b&eacute; sơ sinh ra trao cho người đ&agrave;n &ocirc;ng đang thấp thỏm ở ngo&agrave;i cửa.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Xin ch&uacute;c mừng, l&agrave; một b&eacute; trai.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Người đ&agrave;n &ocirc;ng nhảy l&ecirc;n sung sướng &ocirc;m chầm lấy h&agrave;i nhi b&eacute; nhỏ.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Thật tuyệt, ta sẽ đặt t&ecirc;n n&oacute; l&agrave; Aiden. Aiden Volgraze hy vọng sau n&agrave;y n&oacute; sẽ trở th&agrave;nh một đứa b&eacute; tốt bụng.</span></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;** Th&agrave;nh phố Mimir **</span></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Một t&ecirc;n l&iacute;nh hầu cận vội v&agrave;ng chạy đến quỳ rạp xuống b&aacute;o c&aacute;o với người đang ngồi tr&ecirc;n chiếc ghế ph&iacute;a tr&ecirc;n bục. Đi theo sau hắn l&agrave; một người hầu g&aacute;i đang &ocirc;m trong người một đứa b&eacute;.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- B&aacute;o c&aacute;o chủ nh&acirc;n, phu nh&acirc;n đ&atilde; sinh rồi, l&agrave; một b&eacute; trai. Ph&iacute;a b&ecirc;n kia cũng b&aacute;o tin, mọi chuyện đều diễn ra đ&uacute;ng với dự định.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Tốt lắm. Người ngồi tr&ecirc;n ghế miệng nở một nụ cười tr&agrave;n đầy sự t&agrave; &aacute;c, tay nhấc l&ecirc;n một ly rượu, uống cạn sau đ&oacute; ra hiệu cho người nữ hầu mang đứa b&eacute; đến gần.&nbsp;</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hắn liếc mắt nh&igrave;n đứa b&eacute; đang được người hầu bế trong tay, &aacute;nh mắt tho&aacute;ng lộ r&otilde; vẻ đắc &yacute;.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- N&oacute; sẽ t&ecirc;n l&agrave; Leohart. Sẽ l&agrave; người đưa gia tộc Mahdo trở th&agrave;nh b&aacute; chủ của v&ugrave;ng đất n&agrave;y. N&oacute;i xong hắn cười lớn, tiếng cười của hắn vang vọng khắp căn ph&ograve;ng y&ecirc;n tĩnh.</span></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;** Bộ tộc Javed **</span></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Đại trưởng l&atilde;o, đại trưởng l&atilde;o, người kh&ocirc;ng sao chứ? Một người chạy vội đến đỡ &ocirc;ng l&atilde;o dậy, vẻ mặt tr&agrave;n đầy lo lắng.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Ta kh&ocirc;ng sao. &Ocirc;ng n&oacute;i với hơi thở gấp g&aacute;p, giọng cũng nghe kh&ocirc;ng r&otilde; nữa. - Mau gọi tộc trưởng đến đ&acirc;y cho ta.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Người c&oacute; cần nghỉ ngơi một l&aacute;t kh&ocirc;ng ạ? Người đ&oacute; lại hỏi.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Kh&ocirc;ng cần. Nhanh l&ecirc;n, ta kh&ocirc;ng c&ograve;n nhiều thời gian nữa.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Được, t&ocirc;i đi ngay. Người đ&oacute; nhanh ch&oacute;ng rời đi.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chẳng mấy chốc c&oacute; hai người bước đến, một người l&agrave; người ban n&atilde;y, người c&ograve;n lại vẻ mặt nghi&ecirc;m nghị, th&acirc;n h&igrave;nh cao lớn ch&iacute;nh l&agrave; tộc trưởng. Tộc trưởng vội v&atilde; chạy đến đỡ lấy đại trưởng l&atilde;o đang mệt mỏi nằm dưới s&agrave;n.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Đại trưởng l&atilde;o, người kh&ocirc;ng sao chứ? Ta đ&atilde; đến rồi đ&acirc;y.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Tộc trưởng, ngươi đến rồi. Người đ&oacute; đ&atilde; ra đời, ta c&ugrave;ng với c&aacute;c vị trưởng l&atilde;o kh&aacute;c đ&atilde; d&ugrave;ng to&agrave;n bộ ph&eacute;p thuật để tạo n&ecirc;n một trận ph&aacute;p, trận ph&aacute;p n&agrave;y tuy đ&atilde; th&agrave;nh c&ocirc;ng nhưng thế lực b&ecirc;n kia qu&aacute; mạnh ta chỉ c&oacute; thể ngăn chặn được một phần trận ph&aacute;p đ&oacute;. Việc c&ograve;n lại... Đại trưởng l&atilde;o dừng một l&uacute;c rồi n&oacute;i tiếp.&nbsp;</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Việc c&ograve;n lại đ&agrave;nh nhờ ngươi vậy. Ở đ&acirc;y ta c&oacute; một vi&ecirc;n linh lực, ngươi h&atilde;y d&ugrave;ng n&oacute;, đợi sau khi con của ngươi ch&agrave;o đời, n&oacute; sẽ c&oacute; thể cảm nhận được khi ở gần trận ph&aacute;p. H&atilde;y nu&ocirc;i dạy n&oacute; thật tốt, sau đ&oacute; cho n&oacute; đi gi&uacute;p đỡ người đ&oacute;, chỉ c&oacute; ph&aacute; giải hết c&aacute;c trận ph&aacute;p th&igrave; thế giới n&agrave;y mới kh&ocirc;ng l&acirc;m v&agrave;o cảnh diệt vong.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Nhưng l&agrave;m sao n&oacute; biết được đ&acirc;u l&agrave; người n&oacute; cần phải gi&uacute;p đỡ.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- N&oacute; sẽ c&oacute; thể cảm nhận được, đ&oacute; l&agrave; một người mang kh&iacute; chất đặc biệt, cả thế gian chỉ c&oacute; một. N&oacute;i rồi đại trưởng l&atilde;o nhắm mắt, cả cơ thể nhẹ bẫng, hơi thở cuối c&ugrave;ng cũng kh&ocirc;ng c&ograve;n nữa.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Đại trưởng l&atilde;o.... Tộc trưởng &ocirc;m lấy thi thể đại trưởng l&atilde;o g&agrave;o l&ecirc;n thảm thiết.</span></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ng&agrave;y h&ocirc;m đ&oacute;, c&oacute; một dị tượng xuất hiện tr&ecirc;n bầu trời.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hai sinh linh c&ugrave;ng l&uacute;c ch&agrave;o đời.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-c3c28628-7fff-31b8-42e8-6091dacc857a\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Một trận ph&aacute;p quy m&ocirc; to&agrave;n thế giới được thiết lập mở ra một cuộc chiến giữa c&aacute;i thiện v&agrave; &aacute;c.</span></span></p>\r\n<div>\r\n	&nbsp;</div>\r\n', 'Sasuna', '2020-08-27 09:18:37', 1, 0, 21);
INSERT INTO `chapters` (`id`, `name`, `slug`, `story_id`, `image_link`, `content`, `author`, `created`, `status`, `ordering`, `view`) VALUES
(9, 'Chương 2. Cuộc gặp gỡ định mệnh', 'chuong-2-cuoc-gap-go-djinh-menh', 31, '', '<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;** Hai mươi năm sau **</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;** Bộ tộc Javed **</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;H&ocirc;m nay l&agrave; một ng&agrave;y v&ocirc; c&ugrave;ng trọng đại, nh&agrave; nh&agrave; đều giăng đ&egrave;n kết hoa, một đống lửa trại lớn được đốt l&ecirc;n ở khu đất rộng r&atilde;i, tất cả mọi d&acirc;n l&agrave;ng đều c&oacute; mặt, rượu thịt được b&agrave;y đầy ắp tr&ecirc;n b&agrave;n tiệc. H&ocirc;m nay l&agrave; lễ trưởng th&agrave;nh của con g&aacute;i tộc trưởng.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Một hồi trống được cất l&ecirc;n, mọi tiếng cười n&oacute;i xung quanh đều dừng lại, tất cả hướng mắt về ph&iacute;a người đang đi tới.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hai c&ocirc; g&aacute;i nhỏ, d&aacute;ng người cao gầy, m&aacute;i t&oacute;c d&agrave;i x&otilde;a ra tung bay trong gi&oacute;, khu&ocirc;n mặt giống nhau như đ&uacute;c nhưng kh&iacute; chất ho&agrave;n to&agrave;n kh&aacute;c nhau.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C&ocirc; g&aacute;i c&oacute; t&oacute;c m&agrave;u đỏ mang vẻ tinh nghịch v&agrave; sắc sảo, c&ocirc; g&aacute;i mang m&aacute;i t&oacute;c bạch kim th&igrave; nh&igrave;n c&oacute; vẻ l&atilde;nh đạm v&agrave; c&oacute; phần hơi xa c&aacute;ch. Cả hai c&ocirc; đều kho&aacute;c l&ecirc;n m&igrave;nh bộ v&aacute;y đặc trưng của bộ tộc Javed, c&aacute;c đường chỉ may đều v&ocirc; c&ugrave;ng tinh xảo, ch&acirc;n mỗi người mang một chiếc lắc bạc khi đi tạo n&ecirc;n tiếng leng keng trong trẻo.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hai người bước đến c&uacute;i ch&agrave;o tộc trưởng đang ngồi tr&ecirc;n ghế ở ch&iacute;nh diện vẻ mặt nghi&ecirc;m nghị nhưng kh&ocirc;ng che đậy được n&eacute;t vui sướng tr&ecirc;n khu&ocirc;n mặt, kế b&ecirc;n cạnh l&agrave; phu nh&acirc;n của tộc trưởng với khu&ocirc;n mặt &ocirc;n h&ograve;a tươi cười niềm nở.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Cha. Cả hai người đồng loạt ch&agrave;o.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Được rồi. Tộc trưởng kho&aacute;c tay ra hiệu một vị trưởng l&atilde;o đứng gần đ&oacute; h&atilde;y bắt đầu buổi lễ.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Người trưởng l&atilde;o gật đầu, sau khi đọc l&ecirc;n một b&agrave;i tấu d&agrave;i ca tụng về c&aacute;c vị thần cũng như niềm hạnh ph&uacute;c khi được l&agrave;m lễ trưởng th&agrave;nh, vị trưởng l&atilde;o dừng lại một l&uacute;c sau đ&oacute; cho người mang đến một c&aacute;i khay được che lại bằng tấm vải đỏ.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Tộc trưởng đến lượt ng&agrave;y rồi. Người trưởng l&atilde;o cung k&iacute;nh n&oacute;i.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tộc trưởng đứng dậy, bước xuống bục lấy tay k&eacute;o chiếc khăn đang che tr&ecirc;n c&aacute;i khay để lộ ra b&ecirc;n trong l&agrave; hai chiếc c&agrave;i t&oacute;c chạm khắc tinh xảo một bạc, một đỏ.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Misha con đến đ&acirc;y. &Ocirc;ng cầm một chiếc c&agrave;i t&oacute;c rồi ra hiệu cho c&ocirc; g&aacute;i c&oacute; m&aacute;i t&oacute;c đỏ rực bước đến.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C&ocirc; g&aacute;i nghe gọi t&ecirc;n m&igrave;nh th&igrave; nhẹ nh&agrave;ng bước đến b&ecirc;n cạnh, tộc trưởng nhẹ nh&agrave;ng c&agrave;i l&ecirc;n t&oacute;c c&ocirc; chiếc c&agrave;i t&oacute;c m&agrave;u bạc.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Syringa con đến đ&acirc;y. &Ocirc;ng lại cầm chiếc c&agrave;i t&oacute;c c&ograve;n lại c&agrave;i l&ecirc;n m&aacute;i t&oacute;c m&agrave;u bạch kim.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sau đ&oacute; &ocirc;ng ngắm nh&igrave;n hai c&ocirc; con g&aacute;i một l&uacute;c, vẻ mặt đầy tr&igrave;u mến.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Đ&acirc;y l&agrave; biểu tượng của tộc Javed ta, một khi c&aacute;c con đ&atilde; sở hữu n&oacute; chứng tỏ c&aacute;c con đ&atilde; đến tuổi trưởng th&agrave;nh. &Ocirc;ng dừng lại một l&uacute;c rồi n&oacute;i tiếp.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Từ ng&agrave;y mai c&aacute;c con c&oacute; thể xuống n&uacute;i đi thực hiện sứ mệnh của m&igrave;nh, c&aacute;c con n&ecirc;n nhớ việc m&agrave; c&aacute;c con l&agrave;m sẽ quyết định sự tồn vong của thế giới n&agrave;y. &Aacute;nh mắt &ocirc;ng lại tr&agrave;n ngập niềm hy vọng nh&igrave;n hai c&ocirc; con g&aacute;i nhỏ.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Cuộc h&agrave;nh tr&igrave;nh ta biết sẽ c&oacute; v&ocirc; v&agrave;n hiểm nguy đang ở ph&iacute;a trước đợi c&aacute;c con, ta v&agrave; tất cả những g&igrave; c&oacute; thể l&agrave;m cho c&aacute;c con ta đều đ&atilde; l&agrave;m cả rồi. Việc c&ograve;n lại đều l&agrave; nhờ ở bản th&acirc;n c&aacute;c con.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Con biết rồi thưa cha. Cả hai lại đồng thanh đ&aacute;p.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Ta v&agrave; tất cả mọi người ở đ&acirc;y đều cầu nguyện cho c&aacute;c con, hy vọng c&aacute;c con c&oacute; thể b&igrave;nh an trở về.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S&aacute;ng h&ocirc;m sau, hai c&ocirc; g&aacute;i nhỏ từ biệt c&aacute;c th&agrave;nh vi&ecirc;n trong l&agrave;ng, tộc trưởng v&agrave; vợ trong l&ograve;ng kh&ocirc;ng n&eacute;n nổi x&uacute;c động, kỳ thực ai lại muốn rời xa con m&igrave;nh cơ chứ.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Misha con l&agrave; chị, n&ecirc;n đừng c&oacute; m&agrave; suốt ng&agrave;y nghịch ngợm ph&aacute; ph&aacute;ch nữa, phải trưởng th&agrave;nh hơn để c&oacute; thể l&agrave; chỗ dựa cho em con. Con c&oacute; biết kh&ocirc;ng?</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Con biết rồi thưa cha.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Syringa. &Ocirc;ng xoa đầu c&ocirc; g&aacute;i rồi n&oacute;i tiếp. -&nbsp; &nbsp; Đứa trẻ n&agrave;y th&igrave; lại trưởng th&agrave;nh đến độ l&agrave;m người kh&aacute;c lo lắng, con kh&ocirc;ng cần phải cố gắng chịu đựng tất cả đ&acirc;u, nếu c&oacute; chuyện g&igrave; con c&oacute; thể n&oacute;i với chị con, con hiểu chưa?</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Con hiểu rồi.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Th&ocirc;i kh&ocirc;ng c&ograve;n sớm nữa, hai đứa mau l&ecirc;n đường đi. Nhớ l&agrave; phải chăm s&oacute;c lẫn nhau đ&oacute;.</span></span></p>\r\n<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\">\r\n	<span id=\"docs-internal-guid-e646df13-7fff-2490-6f1f-bcdd12b62bf1\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Con biết rồi. Cha, mẹ hai người cứ y&ecirc;n t&acirc;m đi. Hai c&ocirc; g&aacute;i đồng loạt trả lời rồi quay lưng bước đi. Ph&iacute;a sau vẫn c&ograve;n nghe văng vẳng tiếng n&oacute;i của tộc trưởng v&agrave; vợ dặn d&ograve; đủ điều.</span></span></p>\r\n<div>\r\n	&nbsp;</div>\r\n', 'Sasuna', '2020-09-01 05:18:30', 1, 0, 14);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `parent_id`, `body`, `created`) VALUES
(8, 68, 6, 0, 'phát nữa', '0000-00-00 00:00:00'),
(9, 68, 6, 0, 'test', '2020-09-04 02:09:00'),
(10, 68, 6, 0, 'tee', '2020-09-04 02:10:02'),
(11, 68, 6, 0, 'cái nữa nè', '2020-09-03 17:00:00');

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

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `address`, `title`, `content`, `phone`, `created`) VALUES
(17, 'Test', 'vd@embrace-it.com', 'Kildehøjvej 12, 3460 Birkerød, Denmark', 'IS THERE A WARRANTY ON THE SOLAR HOME SYSTEM?', 'Test', '0723443206', 1598584231);

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
  `view` int(11) NOT NULL DEFAULT 0,
  `author` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `name`, `slug`, `description`, `image_link`, `category_id`, `created`, `updated`, `status`, `view`, `author`) VALUES
(1, 'One Pice', '', 'truyenej nha', '', 3, '2017-04-18 04:04:03', '2017-05-31 11:37:50', 1, 6, ''),
(4, 'Hiệp Khách Giang Hồ', '', 'Hiệp Khách Giang Hồ', '', 4, '2017-04-18 04:16:24', '2017-05-31 03:05:08', 1, 20, ''),
(5, 'Hôn Trộm 55 Lần', '', '', '', 5, '2017-04-18 04:17:00', '2017-05-31 03:04:29', 1, 1, ''),
(7, 'Attack On Titan', '', 'Attack On Titan', '', 6, '2017-05-31 03:07:35', '2017-05-31 03:07:35', 1, 2, ''),
(8, 'Fairy Tail', '', 'Fairy Tail', '', 3, '2017-05-31 03:09:01', '2017-05-31 03:09:01', 1, 3, ''),
(9, 'Người trong giang hồ', '', 'Người trong giang hồ', '', 1, '2017-05-31 03:09:35', '2017-05-31 03:09:35', 1, 4, ''),
(10, 'Danchi Majo', '', 'Danchi Majo', '', 1, '2017-05-31 03:12:01', '2017-05-31 03:12:01', 1, 0, ''),
(11, 'Danh Sách Yêu Quái', '', 'Danh Sách Yêu Quái', '', 2, '2017-05-31 03:13:02', '2017-05-31 03:13:02', 1, 0, ''),
(12, 'Lady Justice', '', 'Lady Justice', '', 2, '2017-05-31 03:13:52', '2017-05-31 03:13:52', 1, 4, ''),
(13, 'Legend 2', '', 'Legend 2', '', 1, '2017-05-31 03:14:49', '2017-05-31 03:14:49', 1, 5, ''),
(14, 'Hajimete No Gal', '', 'Hajimete No Gal', '', 4, '2017-05-31 03:15:35', '2017-05-31 03:15:35', 1, 3, ''),
(15, 'Bokura No Fushidara', '', 'Bokura No Fushidara', '', 5, '2017-05-31 03:16:45', '2017-05-31 03:16:45', 1, 10, ''),
(16, 'One Pice2', '', 'truyenej nha', '', 3, '2017-04-18 04:04:03', '2017-05-31 11:37:50', 1, 6, ''),
(17, 'Hiệp Khách Giang Hồ2', '', 'Hiệp Khách Giang Hồ', '', 4, '2017-04-18 04:16:24', '2017-05-31 03:05:08', 1, 19, ''),
(18, 'Hôn Trộm 55 Lần2', '', '', '', 5, '2017-04-18 04:17:00', '2017-05-31 03:04:29', 1, 1, ''),
(19, 'Go! Go!', '', 'Go!', '', 1, '2017-05-31 03:05:52', '2020-07-14 12:19:16', 1, 2, ''),
(20, 'Attack On Titan2', '', 'Attack On Titan', '', 6, '2017-05-31 03:07:35', '2017-05-31 03:07:35', 1, 2, ''),
(21, 'Fairy Tail2', '', 'Fairy Tail', '', 3, '2017-05-31 03:09:01', '2017-05-31 03:09:01', 1, 3, ''),
(22, 'Người trong giang hồ2', '', 'Người trong giang hồ', '', 1, '2017-05-31 03:09:35', '2017-05-31 03:09:35', 1, 4, ''),
(23, 'Danchi Majo2', '', 'Danchi Majo', '', 1, '2017-05-31 03:12:01', '2017-05-31 03:12:01', 1, 0, ''),
(24, 'Danh Sách Yêu Quái2', '', 'Danh Sách Yêu Quái', '', 2, '2017-05-31 03:13:02', '2017-05-31 03:13:02', 1, 0, ''),
(25, 'Lady Justice2', '', 'Lady Justice', '', 2, '2017-05-31 03:13:52', '2017-05-31 03:13:52', 1, 4, ''),
(26, 'Legend 22', '', 'Legend 2', '', 1, '2017-05-31 03:14:49', '2017-05-31 03:14:49', 1, 6, ''),
(27, 'Hajimete No Gal2', '', 'Hajimete No Gal', '', 4, '2017-05-31 03:15:35', '2017-05-31 03:15:35', 1, 3, ''),
(28, 'Bokura No Fushidara2', '', 'Bokura No Fushidara', '', 5, '2017-05-31 03:16:45', '2017-05-31 03:16:45', 1, 10, ''),
(30, 'Trở Về Địa Cầu Làm Thần Côn', 'tro-ve-djia-cau-lam-than-con-1', 'Trở Về Địa Cầu Làm Thần Côn', 'anime-blazblue-1149.jpg', 5, '2020-07-14 12:35:52', '2020-08-27 05:49:08', 1, 85, 'Duy'),
(31, 'The fate of rune', 'the-fate-of-rune-1', '<div>\r\n	- Trong một thế giới m&agrave; c&aacute;c vị thần dần mất đi sức mạnh của m&igrave;nh. Đ&oacute; l&agrave; l&uacute;c thế lực ma tộc dần th&ocirc;n t&iacute;nh Midgard. Chỉ c&oacute; một đấng cứu thế c&oacute; thể tạo ra một tương lai tho&aacute;t khỏi b&oacute;ng đ&ecirc;m của ma tộc.</div>\r\n<div>\r\n	- Một người được định sinh ra mang trong m&igrave;nh sứ mệnh giải cứu thế giới, một người vốn dĩ c&oacute; số mệnh b&igrave;nh thường lại trở th&agrave;nh anh h&ugrave;ng giải cứu thế giới.</div>\r\n<div>\r\n	- Hai con người c&ugrave;ng chung vận mệnh sẽ thế n&agrave;o khi bản ng&atilde; v&agrave; ho&agrave;n cảnh kh&aacute;c nhau. Đến cuối c&ugrave;ng ai mới l&agrave; người tạo ra tương lai mới cho nh&acirc;n loại.</div>\r\n<div>\r\n	&nbsp;</div>\r\n', 'caotu_n.jpg', 5, '2020-08-27 09:17:57', '2020-08-28 03:42:33', 1, 19, 'Sasuna');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(255) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gmail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hotline` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_title` text COLLATE utf8_unicode_ci NOT NULL,
  `site_key` text COLLATE utf8_unicode_ci NOT NULL,
  `site_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `zalo` text COLLATE utf8_unicode_ci NOT NULL,
  `facebook` text COLLATE utf8_unicode_ci NOT NULL,
  `logo` text COLLATE utf8_unicode_ci NOT NULL,
  `favicon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` tinyint(4) NOT NULL,
  `robots` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `copyright` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `geo_region` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `geo_placename` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `og_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `og_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `name`, `gmail`, `skype`, `phone`, `hotline`, `site_title`, `site_key`, `site_desc`, `zalo`, `facebook`, `logo`, `favicon`, `sort_order`, `robots`, `author`, `copyright`, `geo_region`, `geo_placename`, `og_image`, `og_type`) VALUES
(1, 'TeamCafe Sữa', 'teamcafesua@gmail.com', 'teamcafesua@gmail.com', '123456', '123456', 'Hội mê truyện, mê đọc manga', 'manga, truyện tranh, truyện chữ, truyện ngắn', 'một nhóm các thành viên cùng chí hướng và sản phẩm là nội dung trong site này ', 'fanpage zalo', 'fanpage facebook', 'bong-lua-vang.jpg', 'duyquyen1.png', 1, 'noodp,index,follow', 'TeamCafeSua', 'TeamCafeSua', 'VN', '123 Quận Phú Nhuận, Hồ chí Minh', 'bong-lua-vang1.jpg', 'website');

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
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `username`, `password`, `created`, `updated`) VALUES
(2, 'Nguyễn Quốc Sử', 'nqsu381@gmail.com', '', '', 'nongdanit', '$2a$10$RJX6k5GCxNuTzsD6FtBzQe8F.aQgMbX/QeKKM4G5nAGsTyyanCsTK', '2013-10-31 03:24:42', '2017-03-27 04:52:53'),
(65, 'Loan', 'nqsu381@gmail.com', '', '', 'tuyetloan', '$2a$10$MEEQeiTY8ebDoINH7w.Bb.xPac8MSce.HXSWSXXiONXrlOhmyUsaa', '2013-10-31 03:24:42', '2014-12-10 21:01:28'),
(68, 'Thành viên số 1', 'vpduy84@gmail.com', '0723443206', 'Kildehøjvej 12, 3460 Birkerød, Denmark', NULL, 'ccfe595945102260ef3554fca8a83a4b', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'Test PHP', 'vpduy87@gmail.com', '0723443206', 'Kildehøjvej 12, 3460 Birkerød, Denmark', NULL, '959c6e0ab05dbbe8e53fbb9618536ed8', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'Test tester', 'vd9@embrace-it.com', '0723443206', 'Kildehøjvej 12, 3460 Birkerød, Denmark', NULL, 'ccfe595945102260ef3554fca8a83a4b', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
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
-- Indexes for table `support`
--
ALTER TABLE `support`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
