-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2015 at 10:13 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nurserytv`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `scope` varchar(255) NOT NULL,
  `cdate` datetime NOT NULL,
  `mdate` datetime NOT NULL,
  `ordering` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL,
  `metakey` varchar(255) NOT NULL,
  `metadesc` varchar(255) NOT NULL,
  `showpath` smallint(6) NOT NULL,
  `status` smallint(6) NOT NULL,
  `link_original` varchar(255) NOT NULL,
  `redirect` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `title`, `alias`, `scope`, `cdate`, `mdate`, `ordering`, `type`, `description`, `metakey`, `metadesc`, `showpath`, `status`, `link_original`, `redirect`) VALUES
(6, 'Karaoke Songs', 'karaoke-songs', '', '2015-10-02 17:49:18', '2015-10-02 17:49:18', 0, 0, 'Karaoke Songs', 'Karaoke Songs', 'Karaoke Songs', 0, 1, '', 0),
(5, 'Songs', 'songs', '', '2015-10-02 17:52:41', '2015-10-02 17:52:41', 0, 0, 'Songs', 'Songs', 'Songs', 0, 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_index`
--

CREATE TABLE IF NOT EXISTS `tbl_category_index` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `pindex` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tbl_category_index`
--

INSERT INTO `tbl_category_index` (`id`, `cat_id`, `pindex`, `type`) VALUES
(11, 6, 5, 1),
(12, 5, 5, 1),
(13, 7, 39, 0),
(14, 8, 39, 0),
(15, 5, 5, 1),
(16, 8, 40, 0),
(17, 6, 5, 1),
(18, 6, 5, 1),
(19, 6, 5, 1),
(20, 5, 5, 1),
(21, 5, 5, 1),
(22, 5, 5, 1),
(23, 5, 5, 1),
(24, 5, 5, 1),
(25, 6, 5, 1),
(26, 5, 5, 1),
(27, 6, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_error`
--

CREATE TABLE IF NOT EXISTS `tbl_error` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vid` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL,
  `cdate` datetime NOT NULL,
  `mdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_error`
--

INSERT INTO `tbl_error` (`id`, `vid`, `subject`, `message`, `cdate`, `mdate`) VALUES
(1, 39, 'dasd', 'asdasda', '2015-10-02 05:26:53', '0000-00-00 00:00:00'),
(2, 39, 'ádasd', 'ádasdasda', '2015-10-02 05:35:45', '0000-00-00 00:00:00'),
(3, 39, 'asdghags dkashg kd', 'á dggaidgyaisdasd', '2015-10-02 05:36:27', '0000-00-00 00:00:00'),
(4, 43, 'ádas', 'ádasd', '2015-10-02 17:46:52', '0000-00-00 00:00:00'),
(5, 43, 'asda s', 'a sdasdasdsaas', '2015-10-02 17:47:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_playlist`
--

CREATE TABLE IF NOT EXISTS `tbl_playlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_playlist`
--

INSERT INTO `tbl_playlist` (`id`, `name`, `alias`, `status`, `active`, `metakey`, `metadesc`) VALUES
(3, 'Happy Birthday songs', 'happy-birthday-songs', 1, 1, 'Happy Birthday songs, Happy Birthday songs', 'Happy Birthday songs. Happy Birthday songs'),
(4, 'Happy Birthday songs - Karaoke - Sing along', 'happy-birthday-songs-karaoke-sing-along', 1, 0, '', ''),
(5, 'Numbers songs - Counting for kids - Karaoke - Sing Along', 'numbers-songs-counting-for-kids-karaoke-sing-along', 1, 0, '', ''),
(6, 'Nursery Rhymes Collection', 'nursery-rhymes-collection', 1, 0, '', ''),
(7, 'ABCs and Phonics Songs', 'abcs-and-phonics-songs', 1, 0, '', ''),
(8, 'Animals songs', 'animals-songs', 1, 0, '', ''),
(9, 'Lullabies for kids - Karaoke - Sing Along', 'lullabies-for-kids-karaoke-sing-along', 1, 0, '', ''),
(10, 'ABCs and Phonics Songs - Karaoke - Sing Along', 'abcs-and-phonics-songs-karaoke-sing-along', 1, 0, '', ''),
(11, 'Karaoke Songs', 'karaoke-songs', 1, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posts`
--

CREATE TABLE IF NOT EXISTS `tbl_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `introtext` varchar(255) NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `uid` int(11) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `ordering` smallint(6) NOT NULL,
  `created` datetime NOT NULL,
  `metakey` varchar(255) NOT NULL,
  `metadesc` varchar(255) NOT NULL,
  `cdate` datetime NOT NULL,
  `mdate` datetime NOT NULL,
  `status` smallint(6) NOT NULL,
  `link_original` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_posts`
--

INSERT INTO `tbl_posts` (`id`, `title`, `alias`, `introtext`, `fulltext`, `uid`, `thumbnail`, `ordering`, `created`, `metakey`, `metadesc`, `cdate`, `mdate`, `status`, `link_original`) VALUES
(18, 'Công Phượng chính thức thi đấu ở Nhật Bản năm 2016', 'cong-phuong-chinh-thuc-thi-dau-o-nhat-ban-nam-2016', 'Chỉ mình Công Phượng được bầu Đức cho đi “du học” Nhật Bản, còn Tuấn Anh phải ở nhà.', '<p style="font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;">\r\n	Như ch&uacute;ng t&ocirc;i th&ocirc;ng tin trước đ&oacute;, CLB Mito Hollyhock của Nhật Bản đ&atilde; đưa ra lời đề nghị chuyển nhượng với 2 cầu thủ trẻ t&agrave;i năng của&nbsp;<a class="TextlinkBaiviet" href="http://www.24h.com.vn/bau-duc-hagl-chinh-phuc-v-league-c48e3315.html" style="text-decoration: none; color: rgb(0, 0, 255);">HAGL</a>&nbsp;l&agrave;&nbsp;<strong>C&ocirc;ng Phượng</strong>&nbsp;v&agrave; Tuấn Anh kể từ khi V-League 2015 c&ograve;n chưa kết th&uacute;c. Khi nghe những th&ocirc;ng tin đội b&oacute;ng của Nhật Bản ngỏ &yacute; muốn chi&ecirc;u mộ C&ocirc;ng Phượng v&agrave; Tuấn Anh, nhiều người cho rằng đ&acirc;y chỉ l&agrave; &ldquo;chi&ecirc;u&rdquo; l&agrave;m h&igrave;nh ảnh của bầu Đức v&agrave; HAGL.</p>\r\n<p style="font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;">\r\n	&nbsp;</p>\r\n<p style="font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;">\r\n	Nhưng qua nhiều lần đ&agrave;m ph&aacute;n, đến thời điểm hiện tại về cơ bản giữa đội b&oacute;ng hiện đang chơi ở J-League 2 v&agrave; HAGL đ&atilde; đạt được thoả thuận chuyển nhượng tiền đạo C&ocirc;ng Phượng. &Ocirc;ng Nguyễn Tấn Anh, trưởng đo&agrave;n&nbsp;<a class="TextlinkBaiviet" href="http://www.24h.com.vn/bong-da-c48.html" style="text-decoration: none; color: rgb(0, 0, 255);">b&oacute;ng đ&aacute;</a>&nbsp;HAGL, đ&atilde;&nbsp;x&aacute;c nhận với ch&uacute;ng t&ocirc;i: &ldquo;CLB Mito Hollyhock v&agrave; HAGL đ&atilde; đạt được thoả thuận chuyển nhượng C&ocirc;ng Phượng. C&ocirc;ng Phượng sẽ ch&iacute;nh thức thi đấu ở J-League 2&nbsp;m&ugrave;a giải 2016&rdquo;.</p>\r\n<p style="font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: center;">\r\n	<span align="center" class="img-share" style="position: relative; display: block;"><span class="shareImage" id="shareImage-0" style="display: block; height: 20px; position: absolute; left: 25px; bottom: 10px; opacity: 0;"><img alt="" height="20" src="http://24h-static.24hstatic.com/images/2014/share-fb.gif" style="border: 0px; max-width: 400px;" width="67" />&nbsp;<span title=""><img alt="" height="20" src="http://24h-static.24hstatic.com/images/2014/share-gg.gif" style="border: 0px; max-width: 400px;" width="67" /></span></span><img alt="Công Phượng chính thức thi đấu ở Nhật Bản năm 2016 - 1" class="news-image" id="news-image-id-0" src="http://24h-img.24hstatic.com/upload/3-2015/images/2015-09-27/1443365467-cp-01.jpg" style="border: 0px; max-width: 400px; width: 500px; height: 371px;" /></span></p>\r\n<p style="font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 255); font-style: italic; text-align: center;">\r\n	Đại diện CLB Mito Hollyhock quan t&acirc;m đến C&ocirc;ng Phượng v&agrave; Tuấn Anh</p>\r\n<p style="font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;">\r\n	&nbsp;</p>\r\n<p style="font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;">\r\n	&Ocirc;ng Mitsushiro Obara &ndash; Gi&aacute;m đốc kỹ thuật của CLB Mito Hollyhock đ&atilde; thừa nhận với ch&uacute;ng t&ocirc;i về thương vụ chuyển nhượng C&ocirc;ng Phượng.&nbsp;Như vậy, C&ocirc;ng Phượng ch&iacute;nh thức trở th&agrave;nh cầu thủ người Việt Nam thứ 2 được thi đấu ở J-League 2, sau tiền đạo &ldquo;đ&agrave;n anh&rdquo; C&ocirc;ng Vinh từng thi đấu cho Consadole Sapporo cũng ở J-League 2 hồi năm 2013.</p>\r\n<p style="font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;">\r\n	&nbsp;</p>\r\n<p style="font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;">\r\n	Trước cơ hội được thi đấu ở m&ocirc;i trường b&oacute;ng đ&aacute; chuy&ecirc;n nghiệp bậc nhất ch&acirc;u &Aacute;,&nbsp;<em>C&ocirc;ng Phượng vui mừng chia sẻ</em>: &ldquo;Sau một m&ugrave;a giải được thi đấu ở V-League, bản th&acirc;n t&ocirc;i c&ugrave;ng đồng đội cảm thấy m&igrave;nh cần phải học hỏi nhiều điều hơn nữa để trưởng th&agrave;nh hơn. Việc được thi đấu ở một giải đấu c&oacute; chất lượng chuy&ecirc;n m&ocirc;n cao như J-League l&agrave; cơ hội kh&ocirc;ng thể tốt hơn để t&ocirc;i tiếp tục ph&aacute;t triển bản th&acirc;n&rdquo;.</p>\r\n<p style="font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;">\r\n	&nbsp;</p>\r\n<p style="font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;">\r\n	Được biết, trước mắt C&ocirc;ng Phượng sẽ thi đấu cho Mito Hollyhock trong m&ugrave;a giải 2016 v&agrave; tiền đạo gốc Nghệ An vẫn c&ugrave;ng với U21 HAGL tham dự giải U21 Quốc tế 2015 (dự kiến tổ chức ở TP HCM v&agrave;o th&aacute;ng 11/2015).</p>\r\n<p style="font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: center;">\r\n	<span align="center" class="img-share" style="position: relative; display: block;"><span class="shareImage" id="shareImage-1" style="display: block; height: 20px; position: absolute; left: 25px; bottom: 10px; opacity: 0;"><img alt="" height="20" src="http://24h-static.24hstatic.com/images/2014/share-fb.gif" style="border: 0px; max-width: 400px;" width="67" />&nbsp;<span title=""><img alt="" height="20" src="http://24h-static.24hstatic.com/images/2014/share-gg.gif" style="border: 0px; max-width: 400px;" width="67" /></span></span><img alt="Công Phượng chính thức thi đấu ở Nhật Bản năm 2016 - 2" class="news-image" id="news-image-id-1" src="http://24h-img.24hstatic.com/upload/3-2015/images/2015-09-27/1443367961-cphuong.jpg" style="border: 0px; max-width: 400px;" /></span></p>\r\n<p style="font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 255); font-style: italic; text-align: center;">\r\n	C&ocirc;ng Phượng (b&ecirc;n tr&aacute;i)&nbsp;được bầu&nbsp;Đức cho đi Nhật Bản &quot;du học&quot;</p>\r\n<p style="font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;">\r\n	&nbsp;</p>\r\n<p style="font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;">\r\n	Trong ng&agrave;y 27/9, tr&ecirc;n c&aacute;c trang mạng x&atilde; hội xuất hiện kh&aacute; nhiều th&ocirc;ng tin về việc c&oacute; đến 4 cầu thủ đ&atilde; v&agrave; đang thi đấu cho HAGL gồm C&ocirc;ng Phượng, Tuấn Anh, Hồng Duy v&agrave; Tiến Dũng sẽ được bầu Đức cho sang Nhật Bản &ldquo;du học&rdquo;. Tuy nhi&ecirc;n, l&atilde;nh đạo đội b&oacute;ng phố N&uacute;i x&aacute;c nhận với ch&uacute;ng t&ocirc;i rằng sẽ chỉ c&oacute; C&ocirc;ng Phượng đầu qu&acirc;n cho CLB Mito Hollyhock.</p>\r\n<p style="font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;">\r\n	&nbsp;</p>\r\n<p style="font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;">\r\n	&ldquo;Chỉ c&oacute;&nbsp;<u>C&ocirc;ng Phượng&nbsp;</u>chuyển sang Nhật Bản thi đấu. Tuấn Anh hay Hồng Duy chắc chắn vẫn sẽ thi đấu cho HAGL ở V-League 2016. Đội b&oacute;ng nước Nhật c&oacute; đặt vấn đề về trường hợp của Tuấn Anh, nhưng HAGL x&aacute;c định cầu thủ n&agrave;y sẽ l&agrave; trụ cột của đội b&oacute;ng ở m&ugrave;a giải mới n&ecirc;n ch&uacute;ng t&ocirc;i&nbsp;từ chối chuyển nhượng&rdquo;, một l&atilde;nh đạo CLB HAGL n&oacute;i.</p>\r\n<p style="font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;">\r\n	&nbsp;</p>\r\n<p style="font-family: Arial, Helvetica, sans-serif; color: rgb(0, 0, 0); text-align: justify;">\r\n	C&ograve;n với trường hợp của Tiến Dũng, trung vệ n&agrave;y kh&aacute; ngạc nhi&ecirc;n trước th&ocirc;ng tin m&igrave;nh sẽ sang Nhật Bản thi đấu khi chia sẻ với ch&uacute;ng t&ocirc;i: &ldquo;T&ocirc;i kh&ocirc;ng hiểu những th&ocirc;ng tin đ&oacute; ở đ&acirc;u ra nữa. T&ocirc;i đang đầu qu&acirc;n cho Viettel v&agrave; chắc chắn m&ugrave;a tới t&ocirc;i vẫn thi đấu cho Viettel ở giải hạng Nhất&rdquo;.&nbsp;</p>\r\n', 0, '/uploads/images/30/09/2015/avatar.png', 0, '2015-10-02 18:22:13', 'Pedro, chiến thắng lớn nhất của Chelsea', 'ádasdasda', '2015-10-02 18:22:13', '2015-10-02 18:22:13', 1, 'http://www.24h.com.vn/bong-da/arsenal-vs-liverpool-2015-phoi-bay-su-that-c48a729748.html'),
(19, '', '', '', '', 0, '', 0, '2015-10-02 18:21:00', '', '', '2015-10-02 18:21:00', '2015-10-02 18:21:00', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tags`
--

CREATE TABLE IF NOT EXISTS `tbl_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_tags`
--

INSERT INTO `tbl_tags` (`id`, `name`, `alias`, `status`) VALUES
(7, 'Tag1', 'tag1', 1),
(8, 'Tag2', 'tag2', 1),
(9, 'Tag3', 'tag3', 1),
(10, 'Tag4', 'tag4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tag_index`
--

CREATE TABLE IF NOT EXISTS `tbl_tag_index` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `tbl_tag_index`
--

INSERT INTO `tbl_tag_index` (`id`, `tag_id`, `video_id`) VALUES
(24, 7, 39),
(25, 8, 39),
(26, 9, 39),
(27, 10, 39),
(28, 8, 40),
(29, 10, 40),
(30, 8, 41),
(31, 10, 42),
(32, 7, 44),
(33, 9, 44),
(34, 9, 45),
(35, 10, 45),
(36, 8, 46);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `groupID` bigint(20) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `home_phone` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(258) NOT NULL,
  `city` varchar(128) NOT NULL,
  `province_state` varchar(128) NOT NULL,
  `zip_code` varchar(30) NOT NULL,
  `country` smallint(6) NOT NULL,
  `suppliers` varchar(32) NOT NULL,
  `cdate` int(11) NOT NULL,
  `mdate` int(11) NOT NULL,
  `template_id` smallint(6) NOT NULL,
  `status` smallint(6) NOT NULL,
  `lastvisit` datetime NOT NULL,
  `activeCode` varchar(64) NOT NULL,
  `params` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `groupID` (`groupID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `groupID`, `mobile`, `home_phone`, `first_name`, `last_name`, `address`, `city`, `province_state`, `zip_code`, `country`, `suppliers`, `cdate`, `mdate`, `template_id`, `status`, `lastvisit`, `activeCode`, `params`) VALUES
(28, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 25, '', '', 'admin', 'admin', '', '', '', '', 0, '', 0, 2015, 0, 1, '2015-10-12 22:28:08', '', ''),
(20, 'anhvinhvs', 'e10adc3949ba59abbe56e057f20f883e', 'ducdm87@gmail.com', 19, '', '', 'ducdm87', '', '', '', '', '', 0, 'facebook', 1392186072, 2015, 0, 2, '2014-02-12 14:34:00', '', ''),
(7, 'ducdm@binhhoang.com', '25f9e794323b453885f5181f1b624d0b', 'ducdm@binhhoang.com', 19, '', '', 'ducdm', '', '', '', '', '', 0, '', 1389770555, 2015, 0, 2, '2014-01-16 10:04:50', '2ed194a21f0735a76ee4358192533784:1389840767', ''),
(8, 'dinhbang19@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'dinhbang19@gmail.com', 19, '', '', 'dinhbang19', '', '', '', '', '', 0, '', 1389841867, 2015, 0, 2, '2014-01-16 10:15:45', '17bb5d16f6e732bfddcc11d63a584a6a:1389841867', ''),
(12, 'ducdm87@twitter.com', '', 'ducdm87@twitter.com', 19, '', '', 'ducdm87', '', '', '', '', '', 0, 'twitter', 1389856370, 1389856370, 0, 1, '0000-00-00 00:00:00', '', ''),
(16, 'bangtdadmin', '96e6fc55ef27cd6ee161ba7a062c3111', 'bangtdadmin@gmail.com', 24, '', '', 'bangtdadmin', 'bangtdadmin', '', '', '', '', 0, '', 0, 2014, 0, 1, '2014-02-17 14:24:04', '', ''),
(14, 'bangtd@binhhoang.com', 'e10adc3949ba59abbe56e057f20f883e', 'bangtd@binhhoang.com', 19, '', '', 'bangtd', '', '', '', '', '', 0, '', 1390532686, 1390532686, 0, 1, '2014-01-24 10:14:08', '0ccf5da3b41dff684ee030f1b6f9894e:1390532686', ''),
(15, 'hoangdaoxuan@yahoo.com.au', '', 'hoangdaoxuan@yahoo.com.au', 19, '', '', 'hoangdaoxuan', '', '', '', '', '', 0, 'facebook', 1390536708, 1390536708, 0, 1, '0000-00-00 00:00:00', '', ''),
(17, 'vuhien', 'c0f849c33cf98290c9bd976fb81eb6b0', 'vuhien@binhhoang.com', 23, '', '', 'vuhien', 'vuhien', '', '', '', '', 0, '', 0, 2014, 0, 1, '2014-02-10 13:53:28', '', ''),
(18, 'anhmantk@gmail.com', '', 'anhmantk@gmail.com', 19, '', '', 'anhmantk', '', '', '', '', '', 0, 'facebook', 1392112877, 1392112877, 0, 1, '0000-00-00 00:00:00', '', ''),
(19, 'ducdm871@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'ducdm871@gmail.com', 19, '', '', 'ducdm871', '', '', '', '', '', 0, '', 1392177110, 1392177110, 0, 1, '2014-02-12 13:14:56', '18f48748011eb544d6bbf7062d6042da:1392177110', ''),
(29, 'adminsadsas', 'e10adc3949ba59abbe56e057f20f883e', '', 19, '04 8738 2173', '', 'Dương', 'Vinh', '', '', '', '', 0, '', 0, 0, 0, 1, '0000-00-00 00:00:00', '', ''),
(30, 'adminsadsas', 'e10adc3949ba59abbe56e057f20f883e', '', 19, '04 8738 2173', '', 'Dương', 'Vinh', '', '', '', '', 0, '', 0, 0, 0, 1, '0000-00-00 00:00:00', '', ''),
(31, 'adminsadsas', 'e10adc3949ba59abbe56e057f20f883e', '', 19, '04 8738 2173', '', 'Dương', 'Vinh', '', '', '', '', 0, '', 0, 0, 0, 1, '0000-00-00 00:00:00', '', ''),
(32, 'adminsadsas', 'e10adc3949ba59abbe56e057f20f883e', '', 19, '04 8738 2173', '', 'Dương', 'Vinh', '', '', '', '', 0, '', 0, 0, 0, 1, '0000-00-00 00:00:00', '', ''),
(33, 'adminsadsas', 'e10adc3949ba59abbe56e057f20f883e', '', 19, '04 8738 2173', '', 'Dương', 'Vinh', '', '', '', '', 0, '', 0, 0, 0, 1, '0000-00-00 00:00:00', '', ''),
(34, 'adminsadsas', 'e10adc3949ba59abbe56e057f20f883e', '', 19, '04 8738 2173', '', 'Dương', 'Vinh', '', '', '', '', 0, '', 0, 0, 0, 1, '0000-00-00 00:00:00', '', ''),
(35, 's', 'e10adc3949ba59abbe56e057f20f883e', 'haiconnai@gmail.com', 25, '', '', 'haiconnai', 's', '', '', '', '', 0, '', 0, 0, 0, 1, '2015-10-02 15:32:55', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_group`
--

CREATE TABLE IF NOT EXISTS `tbl_users_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `lft` int(11) NOT NULL DEFAULT '0',
  `value` varchar(255) NOT NULL DEFAULT '',
  `isActive` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `tbl_users_group`
--

INSERT INTO `tbl_users_group` (`id`, `parent_id`, `name`, `lft`, `value`, `isActive`) VALUES
(17, 0, 'ROOT', 1, 'ROOT', 0),
(28, 17, 'USERS', 2, 'USERS', 0),
(29, 28, 'Public Frontend', 3, 'Public Frontend', 0),
(18, 29, 'Registered', 4, 'Registered', 0),
(19, 18, 'Author', 5, 'Author', 0),
(20, 19, 'Editor', 6, 'Editor', 0),
(21, 20, 'Publisher', 7, 'Publisher', 0),
(30, 28, 'Public Backend', 13, 'Public Backend', 0),
(23, 30, 'Manager', 14, 'Manager', 0),
(24, 23, 'Administrator', 15, 'Administrator', 0),
(25, 24, 'Super Administrator', 16, 'Super Administrator', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_videos`
--

CREATE TABLE IF NOT EXISTS `tbl_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `info` text,
  `fecth_link` varchar(255) DEFAULT NULL,
  `origin_link` text,
  `viewed` int(11) DEFAULT NULL,
  `liked` int(11) NOT NULL,
  `play_id` bigint(20) NOT NULL,
  `server` int(1) DEFAULT '0',
  `rating` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `metakey` varchar(255) NOT NULL,
  `metadesc` varchar(255) NOT NULL,
  `cdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `category_id` (`play_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `tbl_videos`
--

INSERT INTO `tbl_videos` (`id`, `title`, `alias`, `image`, `info`, `fecth_link`, `origin_link`, `viewed`, `liked`, `play_id`, `server`, `rating`, `status`, `metakey`, `metadesc`, `cdate`, `mdate`) VALUES
(42, 'Finger Family Shark Family Nursery Rhyme | Animal Finger Family | Fish Finger Family', 'finger-family-shark-family-nursery-rhyme-animal-finger-family-fish-finger-family', 'https://i.ytimg.com/vi/Cw8JL6Ozvhk/hqdefault.jpg', 'finger-family-shark-family-nursery-rhyme-animal-finger-family-fish-finger-family', 'https://www.youtube.com/watch?v=Cw8JL6Ozvhk', '', 26, 15, 4, 0, NULL, 1, 'finger-family-shark-family-nursery-rhyme-animal-finger-family-fish-finger-family', 'finger-family-shark-family-nursery-rhyme-animal-finger-family-fish-finger-family', '2015-09-25 05:47:53', '2015-09-25 05:47:53'),
(41, 'Nursery Rhyme - 1,2,3,4,5 Once I caught a fish alive', 'nursery-rhyme-1-2-3-4-5-once-i-caught-a-fish-alive', 'https://i.ytimg.com/vi/9ir_l7qTiZ4/hqdefault.jpg', 'asdadsasdas', 'https://www.youtube.com/watch?v=9ir_l7qTiZ4', '', 7, 0, 4, 0, NULL, 1, 'https://www.youtube.com/watch?v=9ir_l7qTiZ4', 'https://www.youtube.com/watch?v=9ir_l7qTiZ4', '2015-09-25 05:47:13', '2015-09-25 05:47:13'),
(39, 'TOP 20 LEARN ENGLISH NURSERY RHYMES | 40 MINS LONG. Learning Playlist', 'top-20-learn-english-nursery-rhymes-40-mins-long.-learning-playlist', 'https://i.ytimg.com/vi/DQQ99j0DMmk/hqdefault.jpg', 'asdasdasdas', 'https://www.youtube.com/watch?v=DQQ99j0DMmk', '', 19, 0, 3, 0, NULL, 1, 'asdsa', 'asdasdasd', '2015-10-01 17:40:25', '2015-10-01 17:40:25'),
(40, 'ANIMALS IN THE OCEAN | Nursery Rhymes TV. Toddler Kindergarten Preschool Baby Songs.', 'animals-in-the-ocean-nursery-rhymes-tv.-toddler-kindergarten-preschool-baby-songs.', 'https://i.ytimg.com/vi/AskWKTiyLmU/hqdefault.jpg', 'asdasdasd', 'https://www.youtube.com/watch?v=AskWKTiyLmU', '', 13, 0, 5, 0, NULL, 1, 'sadasd', '', '2015-09-25 05:44:58', '2015-09-25 05:44:58'),
(43, '3D Police Finger Family Song | 3D Daddy Finger Nursery Rhyme for Children', '3d-police-finger-family-song-3d-daddy-finger-nursery-rhyme-for-children', 'https://i.ytimg.com/vi/0OCk7yqahSY/hqdefault.jpg', 'ádasdasdas', 'https://www.youtube.com/watch?v=0OCk7yqahSY', '', 7, 0, 0, 0, NULL, 1, 'ádas', 'ádas', '2015-09-25 09:38:14', '2015-09-25 09:38:14'),
(44, 'Finger Family Song - Mega Finger Family Collection! Frozen, Minions, Elmo, Nursery Rhymes & More!', 'finger-family-song-mega-finger-family-collection-frozen-minions-elmo-nursery-rhymes-more', 'https://i.ytimg.com/vi/hSQxjB1Jdkw/hqdefault.jpg', 'jaskjdgasjdasd', 'https://www.youtube.com/watch?v=hSQxjB1Jdkw', '', 3, 1, 4, 0, NULL, 1, 'ád', 'ádasda', '2015-09-25 10:12:53', '2015-09-25 10:12:53'),
(45, 'Thomas and Friends Monster Finger Family Song', 'thomas-and-friends-monster-finger-family-song', 'https://i.ytimg.com/vi/OaFrZmX5wFo/hqdefault.jpg', 'ádasdas', 'https://www.youtube.com/watch?v=OaFrZmX5wFo', '', 5, 0, 4, 0, NULL, 1, 'ádasd', 'ádasdas', '2015-09-25 10:13:19', '2015-09-25 10:13:19'),
(46, 'SUPER FUN! Thomas and Friends Making Tracks to GREAT Destinations Video & THEME SONG!', 'super-fun-thomas-and-friends-making-tracks-to-great-destinations-video-theme-song', 'https://i.ytimg.com/vi/XWM-6df3KIw/hqdefault.jpg', 'ádasdasd', 'https://www.youtube.com/watch?v=XWM-6df3KIw', '', 6, 0, 4, 0, NULL, 1, 'Pedro, chiến thắng lớn nhất của Chelsea', 'ádasdasdas', '2015-09-25 10:13:45', '2015-09-25 10:13:45');
