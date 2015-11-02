-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2015 at 02:57 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nurserytv`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_articles`
--

CREATE TABLE IF NOT EXISTS `tbl_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `introtext` varchar(255) NOT NULL,
  `fulltext` text NOT NULL,
  `catID` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `ordering` smallint(6) NOT NULL,
  `created` datetime NOT NULL,
  `metakey` varchar(255) NOT NULL,
  `metadesc` varchar(255) NOT NULL,
  `cdate` datetime NOT NULL,
  `mdate` datetime NOT NULL,
  `status` smallint(6) NOT NULL,
  `feature` tinyint(4) NOT NULL,
  `link_original` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `catid` (`catID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_articles`
--

INSERT INTO `tbl_articles` (`id`, `title`, `alias`, `introtext`, `fulltext`, `catID`, `uid`, `thumbnail`, `ordering`, `created`, `metakey`, `metadesc`, `cdate`, `mdate`, `status`, `feature`, `link_original`) VALUES
(7, 'Thủ thuật trang điểm đẹp tự nhiên cho nàng bận rộn a', 'thu-thuat-trang-diem-dep-tu-nhien-cho-nang-ban-ron-a', 'Trang điểm là biện pháp làm đẹp nhanh nhất, nó dường như có sức mạnh ma thuật có thể biến một vẻ đẹp bình thường trở thành một lộng lẫy. Vì lẽ đó mà đối với người phụ nữ thì trang điểm là một phần không thể thiếu trong cuộc sốn a', '<p>\r\n	Tại Cung Quần Ngựa H&agrave; Nội, chương tr&igrave;nh nghệ thuật &quot;Kẻ nổi loạn truyền thống&quot; với sự tham dự của hơn 1.000 nh&agrave; tạo mẫu t&oacute;c đ&atilde; mang đến nhiều tiết mục, bộ sưu tập t&oacute;c độc đ&aacute;o c&aacute; t&iacute;nh. Giải V&agrave;ng Color Zoom&#39;15 của hai hạng mục dự thi s&aacute;ng tạo v&agrave; t&agrave;i năng trẻ đ&atilde; được trao cho nh&agrave; tạo mẫu t&oacute;c Nguyễn Huyền Linh - Salon Linh Hair v&agrave; nh&agrave; tạo mẫu t&oacute;c Lương Xu&acirc;n Vinh - Salon H&agrave; T&oacute;c. a</p>\r\n<table border="0" cellpadding="2" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<img alt="" data-natural-width="500" data-pwidth="470.40625" data-width="500" src="http://c1.f9.img.vnecdn.net/2015/08/27/27-8-20152-9715-1440665074.png" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				<p>\r\n					&Ocirc;ng Trần Anh Tuấn gi&aacute;m đốc SunStar Việt Nam -&nbsp;nh&agrave; ph&acirc;n phối của Goldwell tại Việt Nam trao giải V&agrave;ng Quốc gia Color Zoom&nbsp;hạng mục s&aacute;ng tạo cho nh&agrave; tạo mẫu t&oacute;c&nbsp;Nguyễn Huyền Linh - Salon Linh Hair.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	Chia sẻ về t&aacute;c phẩm dự thi của m&igrave;nh, nh&agrave; tạo mẫu t&oacute;c Nguyễn Huyền Linh cho biết: &rdquo;&Yacute; tưởng của t&ocirc;i đến từ những điều giản dị trong cuộc sống đời thường. Cảm x&uacute;c an l&agrave;nh, th&aacute;nh thiện đến từ thiết kế nội thất, c&aacute;ch phối s&aacute;ng của h&agrave;ng trăm h&agrave;ng ngh&igrave;n mảng m&agrave;u lấp l&aacute;nh nơi m&aacute;i v&ograve;m của nh&agrave; thờ hay những hoa văn tu&acirc;n thủ theo h&igrave;nh thức Roman v&agrave; G&ocirc; - T&iacute;ch, t&ocirc;n nghi&ecirc;m v&agrave; trang nh&atilde;. H&igrave;nh tượng về sự nổi loạn v&agrave; th&aacute;ch thức của những thanh thiếu ni&ecirc;n trong tiểu thuyết &quot;Bắt trẻ đồng xanh&quot; của Holden Caulfield. Tất cả tạo cảm hứng trong t&ocirc;i để x&acirc;y dựng &yacute; tưởng cho b&agrave;i dự thi của m&igrave;nh&rdquo;.</p>\r\n<table border="0" cellpadding="2" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<img alt="" data-natural-width="500" data-pwidth="470.40625" data-width="500" src="http://c1.f9.img.vnecdn.net/2015/08/27/27-8-20158-6168-1440665074.png" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				<p>\r\n					Nh&agrave; tạo mẫu t&oacute;c Lương Xu&acirc;n Vinh - Salon H&agrave; T&oacute;c - giải V&agrave;ng Quốc gia Color Zoom hạng mục t&agrave;i năng trẻ tr&igrave;nh diễn c&ugrave;ng t&aacute;c phẩm dự thi của m&igrave;nh.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&ldquo;May mắn của t&ocirc;i l&agrave; c&oacute; sự động vi&ecirc;n v&agrave; chỉ bảo của người thầy cũng l&agrave; qu&aacute;n qu&acirc;n giải Quốc Gia Color Zoom&#39;14 - nh&agrave; tạo mẫu t&oacute;c Nguyễn Hải H&agrave;. T&aacute;c phẩm của t&ocirc;i muốn thể hiện phong c&aacute;ch thanh lịch thời thượng, đẳng cấp nhưng cũng đầy g&oacute;c cạnh&quot;, nh&agrave; tạo mẫu t&oacute;c Lương Xu&acirc;n Vinh - giải V&agrave;ng hạng mục t&agrave;i năng chia sẻ.</p>\r\n<table border="0" cellpadding="2" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<img alt="" data-natural-width="500" data-pwidth="470.40625" data-width="500" src="http://c1.f9.img.vnecdn.net/2015/08/27/27-8-201514-925443799-4069-1440665075.png" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				<p>\r\n					Gi&acirc;y ph&uacute;t hồi hộp chờ c&ocirc;ng bố giải V&agrave;ng Quốc gia Color Zoom.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	Trong th&aacute;ng 10 tới đ&acirc;y, hai nh&agrave; tạo mẫu t&oacute;c sẽ đại diện cho c&aacute;c nh&agrave; tạo mẫu t&oacute;c Việt Nam tham dự cuộc thi to&agrave;n cầu tại Las Vegas, Mỹ.</p>\r\n<div>\r\n	<div>\r\n		<div>\r\n			&nbsp;</div>\r\n	</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', 29, 0, '/uploads/images/27/10/2015/images.jpg', 0, '2015-09-07 23:11:00', 'Thủ thuật trang điểm đẹp tự nhiên cho nàng bận rộn', 'Thủ thuật trang điểm đẹp tự nhiên cho nàng bận rộn', '2015-09-07 23:11:00', '2015-10-27 10:19:06', 1, 1, 'http://www.24h.com.vn/lam-dep/bo-tui-5-meo-hay-giup-doi-moi-xinh-nhu-nu-hoa-hong-c145a729727.html'),
(8, 'Bỏ túi 5 mẹo hay giúp đôi môi xinh như nụ hoa hồng', 'bo-tui-5-meo-hay-giup-doi-moi-xinh-nhu-nu-hoa-hong', 'Hiện nay trên thị trường có nhiều loại kem dưỡng ẩm có thể giúp chị em khắc phục được tình trạng làn môi khô ráp. Nhưng để đôi môi có được sắc hồng, mịn màng một cách tự nhiên thì việc chăm sóc môi với những nguyên liệu tự nhiên là sự lựa chọn vừa rẻ lại ', '<div class="contentbaiviet">\r\n	<p>\r\n		Hiện nay tr&ecirc;n thị trường c&oacute; nhiều loại kem dưỡng ẩm c&oacute; thể gi&uacute;p chị em khắc phục được t&igrave;nh trạng&nbsp;l&agrave;n m&ocirc;i kh&ocirc; r&aacute;p. Nhưng để đ&ocirc;i m&ocirc;i c&oacute; được sắc hồng, mịn m&agrave;ng một c&aacute;ch tự nhi&ecirc;n th&igrave; việc&nbsp;chăm s&oacute;c m&ocirc;i với những nguy&ecirc;n liệu tự nhi&ecirc;n l&agrave; sự lựa chọn vừa rẻ lại tiện lợi</p>\r\n	<div style="page-break-after: always;">\r\n		<span style="display: none;">&nbsp;</span></div>\r\n	<p style="text-align: center;">\r\n		<img alt="bo tui 5 meo hay giup doi moi xinh nhu nu hoa hong hinh anh 1" class="news-image" data-pagespeed-loaded="1" data-pagespeed-onload="pagespeed.CriticalImages.checkImageForCriticality(this);" id="news-image-id-0" src="http://streaming1.danviet.vn/upload/3-2015/images/2015-08-22/1440242501-moi-dv1.jpg" title="Bỏ túi 5 mẹo hay giúp đôi môi xinh như nụ hoa hồng hình ảnh 1" width="100%" /></p>\r\n	<p style="text-align: center;">\r\n		<em>Phụ nữ&nbsp;hấp dẫn với vẻ đẹp tự nhi&ecirc;n</em></p>\r\n	<p>\r\n		<em>Nếu bạn l&agrave; người y&ecirc;u chuộng c&aacute;c biện ph&aacute;p tự nhi&ecirc;n, h&atilde;y tham khảo 5 mẹo chăm s&oacute;c l&agrave;n m&ocirc;i dưới đ&acirc;y.</em></p>\r\n	<p>\r\n		<strong>1. Tẩy tế b&agrave;o chết bởi chanh, đường</strong></p>\r\n	<p>\r\n		Chanh c&oacute; nhiều axit tự nhi&ecirc;n gi&uacute;p loại bỏ c&aacute;c hắc tố trong da m&ocirc;i. Đường với kết cấu hạt nhỏ li ti đảm nhiệm chức năng l&agrave;m bong c&aacute;c tế b&agrave;o chết. V&igrave; vậy, sử dụng hỗn hợp n&agrave;y để tẩy tế b&agrave;o chết c&oacute; thể gi&uacute;p cho l&agrave;n m&ocirc;i s&aacute;ng hồng tự nhi&ecirc;n.</p>\r\n	<p>\r\n		Đổ 1 th&igrave;a đường ra ch&eacute;n rồi bổ sung th&ecirc;m 1 th&igrave;a nước cốt chanh v&agrave; trộn đều. Sử dụng hỗn hợp n&agrave;y ch&agrave; x&aacute;t l&ecirc;n đ&ocirc;i m&ocirc;i khoảng 10 sau đ&oacute; rửa sạch với nước ấm.</p>\r\n	<p style="text-align: center;">\r\n		<img alt="bo tui 5 meo hay giup doi moi xinh nhu nu hoa hong hinh anh 2" class="news-image" data-pagespeed-loaded="1" data-pagespeed-onload="pagespeed.CriticalImages.checkImageForCriticality(this);" id="news-image-id-1" src="http://streaming1.danviet.vn/upload/3-2015/images/2015-08-22/1440242501-moi-dv2.jpg" title="Bỏ túi 5 mẹo hay giúp đôi môi xinh như nụ hoa hồng hình ảnh 2" width="100%" /></p>\r\n	<p style="text-align: center;">\r\n		<em>Chanh với đường n&acirc;u tạo th&agrave;nh kem tẩy tế b&agrave;o chết tuyệt diệu</em></p>\r\n	<p>\r\n		<strong>2. M&aacute;t xa m&ocirc;i với mật ong v&agrave; chanh</strong></p>\r\n	<p>\r\n		Mật ong l&agrave; th&agrave;nh phần tự nhi&ecirc;n c&oacute; t&aacute;c dụng dưỡng ẩm v&agrave; kh&aacute;ng khuẩn tuyệt vời. Trong khi chanh l&agrave; th&agrave;nh phần tẩy trắng gi&uacute;p đ&ocirc;i m&ocirc;i s&aacute;ng hồng.</p>\r\n	<p>\r\n		Cắt đ&ocirc;i quả chanh sau đ&oacute; r&oacute;t v&agrave;i giọt mật ong l&ecirc;n chanh rồi m&aacute;t xa nhẹ nh&agrave;ng l&ecirc;n đ&ocirc;i m&ocirc;i, để ch&uacute;ng trong 15 ph&uacute;t sau đ&oacute; rửa sạch với nước ấm.</p>\r\n	<p style="text-align: center;">\r\n		<img alt="bo tui 5 meo hay giup doi moi xinh nhu nu hoa hong hinh anh 3" class="news-image" data-pagespeed-loaded="1" data-pagespeed-onload="pagespeed.CriticalImages.checkImageForCriticality(this);" id="news-image-id-2" src="http://streaming1.danviet.vn/upload/3-2015/images/2015-08-22/1440242501-moi-dv3.jpg" title="Bỏ túi 5 mẹo hay giúp đôi môi xinh như nụ hoa hồng hình ảnh 3" width="100%" /></p>\r\n	<p style="text-align: center;">\r\n		<em>Chanh v&agrave; mật ong gi&uacute;p đ&ocirc;i m&ocirc;i vừa s&aacute;ng hồng, vừa mềm mịn</em></p>\r\n	<p>\r\n		<strong>3. Nước củ cải đường</strong></p>\r\n	<p>\r\n		Đ&acirc;y l&agrave; loại nước tự nhi&ecirc;n c&oacute; dồi d&agrave;o c&aacute;c hợp chất chống oxy h&oacute;a v&agrave; loại bỏ c&aacute;c hắc tố da gi&uacute;p l&agrave;n da m&ocirc;i trở n&ecirc;n mềm mịn v&agrave; s&aacute;ng hơn.</p>\r\n	<p>\r\n		Sử dụng m&aacute;y &eacute;p tr&aacute;i c&acirc;y để &eacute;p của cải đường lấy nước ra cốc, sau đ&oacute; sử dụng nước n&agrave;y m&aacute;t xa l&ecirc;n đ&ocirc;i m&ocirc;i. Sau 15 ph&uacute;t rửa sạch với nước ấm.</p>\r\n	<p style="text-align: center;">\r\n		<img alt="bo tui 5 meo hay giup doi moi xinh nhu nu hoa hong hinh anh 4" class="news-image" data-pagespeed-loaded="1" data-pagespeed-onload="pagespeed.CriticalImages.checkImageForCriticality(this);" id="news-image-id-3" src="http://streaming1.danviet.vn/upload/3-2015/images/2015-08-22/1440242501-moi-dv4.jpg" title="Bỏ túi 5 mẹo hay giúp đôi môi xinh như nụ hoa hồng hình ảnh 4" width="100%" /></p>\r\n	<p style="text-align: center;">\r\n		<em>Nước &eacute;p củ cải đường l&agrave;m s&aacute;ng bờ m&ocirc;i</em></p>\r\n	<p>\r\n		<strong>4. Dưỡng ẩm với dầu hạnh nh&acirc;n v&agrave; dầu dừa</strong></p>\r\n	<p>\r\n		Đ&acirc;y l&agrave; 2 loại tinh dầu đặc hiệu gi&uacute;p l&agrave;n da mềm mịn. Với đ&ocirc;i m&ocirc;i ch&uacute;ng cung cấp nhiều th&agrave;nh phần kh&aacute;ng khuẩn v&agrave; độ ẩm gi&uacute;p đ&ocirc;i m&ocirc;i c&oacute; được vẻ đẹp mịn m&agrave;ng một c&aacute;ch tự nhi&ecirc;n.</p>\r\n	<p>\r\n		Trộn 1 th&igrave;a dầu hạnh nh&acirc;n c&ugrave;ng với 1 th&igrave;a dầu dừa đ&atilde; được đun h&oacute;a lỏng trong một c&aacute;i ch&eacute;n con. Sử dụng ng&oacute;n tay chấm hỗn hợp dầu v&agrave; m&aacute;t xa l&ecirc;n đ&ocirc;i m&ocirc;i thay thế c&oacute; một thỏi son dưỡng m&ocirc;i h&agrave;ng ng&agrave;y.</p>\r\n	<p style="text-align: center;">\r\n		<img alt="bo tui 5 meo hay giup doi moi xinh nhu nu hoa hong hinh anh 5" class="news-image" data-pagespeed-loaded="1" data-pagespeed-onload="pagespeed.CriticalImages.checkImageForCriticality(this);" id="news-image-id-4" src="http://streaming1.danviet.vn/upload/3-2015/images/2015-08-22/1440242501-moi-dv5.jpg" title="Bỏ túi 5 mẹo hay giúp đôi môi xinh như nụ hoa hồng hình ảnh 5" width="100%" /></p>\r\n	<p style="text-align: center;">\r\n		<em>Dầu dừa v&agrave; dầu hạnh nhận tạo độ ẩm tuyệt vời cho đ&ocirc;i m&ocirc;i</em></p>\r\n	<p>\r\n		<strong>5. Vitamin E</strong></p>\r\n	<p>\r\n		Vitamin E l&agrave; thần dược gi&uacute;p k&iacute;ch th&iacute;ch sự ph&aacute;t triển của c&aacute;c tế b&agrave;o da. Do đ&oacute;, biết c&aacute;ch bổ sung vitamin E cho cơ thể hoặc m&aacute;t xa dầu vitamin E cũng c&oacute; thể đem lại vẻ đẹp tự nhi&ecirc;n, mịn m&agrave;ng cho đ&ocirc;i m&ocirc;i.</p>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', 31, 0, '/uploads/images/26/08/2015/1440383969-1440242501-moi-dv1%5B1%5D.jpg', 0, '2015-08-26 08:26:30', 'tu van lam dep, cham soc moi, moi dep tu nhien, môi xinh, da đẹp, môi hồng', 'Hiện nay trên thị trường có nhiều loại kem dưỡng ẩm có thể giúp chị em khắc phục được tình trạng làn môi khô ráp. Nhưng để đôi môi có được sắc hồng, mịn màng một cách tự nhiên thì việc chăm sóc môi với những nguyên liệu tự nhiên là sự lựa chọn vừa rẻ lại ', '2015-08-26 08:26:30', '2015-10-28 08:04:49', 1, 1, 'http://www.24h.com.vn/lam-dep-c145.html'),
(5, 'Nuôi da trắng mịn bằng trứng gà', 'nuoi-da-trang-min-bang-trung-ga', 'Trứng là một loại thực phẩm chứa nhiều dinh dưỡng có lợi cho sức khỏe. Không những thế, với những thành phần như vitamin A, B6, B12, D và E… trứng còn giúp chị em chúng mình chăm sóc hiệu quả đối với vẻ đẹp của làn da.', '\r\n	Trứng lÃ  một loại thực phẩm chứa nhiều dinh dưỡng cÃ³ lợi cho sức khỏe. KhÃ´ng những thế, với những thÃ nh phần như vitamin A, B6, B12, D vÃ  Eâ¦ trứng cÃ²n giÃºp chị em chÃºng mÃ¬nh chăm sÃ³c hiệu quả đối với vẻ đẹp của lÃ n da.\r\n\r\n	Điều đÃ¡ng nÃ³i ở đÃ¢y lÃ  với mỗi loại da như da nhờn, da khÃ´, giÃ£n chÃ¢n lÃ´ngâ¦ cần phải hiểu vÃ  sử dụng trứng một cÃ¡ch hợp lÃ½ thÃ¬ mới đem đến hiệu quả thiết thực.\r\n\r\n	Â \r\n\r\n	LÃ n da sÃ¡ng, mịn lÃ  thÃ nh phần khÃ´ng thể thiếu trong vẻ đẹp của chị em phụ nữ\r\n\r\n	Â \r\n\r\n	Trứng lÃ  nguyÃªn liệu chăm sÃ³c lÃ n da đẹp toÃ n diện\r\n\r\n	HÃ£y cÃ¹ng chÃºng tÃ´i học cÃ¡ch sử dụng một số biện phÃ¡p từ mặt nạ trứng đối với cÃ¡c loại da.\r\n\r\n	1. Chăm sÃ³c da dầu\r\n\r\n	Da nhờn xuất hiện khi quÃ¡ trÃ¬nh sản xuất tuyến nhờn dưới da diễn ra ngoÃ i vÃ²ng kiểm soÃ¡t. Vấn đề cÃ¡c chất nhờn xuất hiện quÃ¡ mức trÃªn bề mặt lÃ n da lÃ m ảnh hưởng đến kết quả trang điểm cũng như sức khỏe tế bÃ o da.\r\n\r\n	Với hiện tượng đÃ³, bạn chỉ nÃªn sử dụng lÃ²ng trắng trứng vÃ¬ tÃ­nh năng hÃºt dầu tồn tại cơ bản ở thÃ nh phần nÃ y.\r\n\r\n	CÃ¡ch sử dụng\r\n\r\n	Đập vỡ một quả trứng, sau đÃ³ khÃ©o lÃ©o tÃ¡ch rời loại bỏ lÃ²ng đỏ, chỉ sử dụng lÃ²ng trắng trứng. Vắt thÃªm vÃ i giọt nước cốt chanh vÃ  trộn đều hỗn hợp. DÃ¹ng một bÃ n chải để xoa hỗn hợp lÃªn khuÃ´n mặt vÃ  thư giÃ£n khoảng 15 phÃºt đủ cho mặt nạ khÃ´. Cuối cÃ¹ng lÃ m sạch mọi thứ bằng khăn vÃ  nước ấm.\r\n\r\n	Â \r\n\r\n	Mặt nạ lÃ²ng trắng trứng kiểm soÃ¡t da dầu\r\n\r\n	2. Chăm sÃ³c da khÃ´\r\n\r\n	TrÃ¡i với da nhờn thÃ¬ da khÃ´ lại lÃ  hiện tượng cÃ¡c tế bÃ o da bị cướp đi độ ẩm khiến chÃºng trở nÃªn khÃ´ rÃ¡p. LÃ n da khÃ´ cũng sẽ lÃ m cho sức khỏe của tế bÃ o bị ảnh hưởng tiÃªu cực, những lớp trang điểm cũng trở nÃªn sần sÃ¹i.\r\n\r\n	Để khắc phục hiện tượng da khÃ´, bạn nÃªn sử dụng lÃ²ng đỏ của trứng. ĐÃ¢y lÃ  bộ phận cung cấp kịp thời độ ẩm vÃ  những dinh dưỡng cần thiết giÃºp tế bÃ o da nhanh chÃ³ng lấy lại sự cÃ¢n bằng.\r\n\r\n	CÃ¡ch sử dụng\r\n\r\n	Đập vỡ trứng rồi tÃ¡ch bỏ lÃ²ng trắng, chỉ để lại lÃ²ng đỏ trong bÃ¡t con. Bổ sung thÃªm 1 thÃ¬a mật ong cÃ¹ng 1 thÃ¬a dầu Ã´ liu vÃ  khuấy đều cho cÃ¡c hỗn hợp hÃ²a lẫn với nhau. Ãp dụng mặt nạ lÃªn khuÃ´n mặt vÃ  thư giÃ£n trong 15 phÃºt rồi rửa sạchÂ  với nước ấm.\r\n\r\n	Â \r\n\r\n	LÃ²ng đỏ trứng với mật ong khắc phục lÃ n da khÃ´\r\n\r\n	3. Chăm sÃ³c da thường\r\n\r\n	Nếu lÃ n da của bạn bÃ¬nh thường, để duy trÃ¬ sự mềm mại thÃ¬ sử dụng mặt nạ trứng để dưỡng da cũng lÃ  biện phÃ¡p đem lại hiệu quả tốt. Sự kết hợp giữa việc tẩy bỏ chất dầu vÃ  dưỡng ẩm của cả hai thÃ nh phần lÃ²ng trắng vÃ  lÃ²ng đỏ của trứng sẽ giÃºp lÃ n da luÃ´n tươi trẻ.\r\n\r\n	CÃ¡ch sử dụng\r\n\r\n	Đập vỡ trứng, tÃ¡ch riÃªng lÃ²ng trắng vÃ  lÃ²ng đỏ vÃ o hai cÃ¡i bÃ¡t sạch. LÃ m sạch lÃ n da, sau đÃ³ trước tiÃªn bạn Ã¡p dụng mặt nạ lÃ²ng trắng trứng lÃªn khuÃ´n mặt chờ 15 phÃºt cho khÃ´. Tiếp tục bạn sử dụng mặt nạ lÃ²ng đỏ trứng lÃªn vÃ  chờ đến khi chÃºng hoÃ n toÃ n khÃ´. Cuối cÃ¹ng rửa sạch với nước ấm.\r\n\r\n	4. Mở lỗ chÃ¢n lÃ´ng\r\n\r\n	Hiện tượng tắc nghẽn lỗ chÃ¢n lÃ´ng lÃ  một trong những nguyÃªn nhÃ¢n khiến cho lÃ n da gặp nhiều vấn để rắc rối. VÃ¬ vậy, mỗi tuần mở rộng lỗ chÃ¢n lÃ´ng đÃª giải thoÃ¡t những chất cặn bÃ£ vÃ  lượng dầu dư thừa lÃ  một bước trong quyÂ trÃ¬nh lÃ m đẹp.\r\n\r\n	CÃ¡ch sử dụng\r\n\r\n	Trước hết, đập vỡ trứng vÃ  chỉ sử dụng lÃ²ng trắng trứng để loại bỏ hết lớp chất dầu trÃªn bề mặt lÃ n da. Bước tiếp theo lÃ  dÃ¹ng một bÃ¡t nước nÃ³ng thực hiện bước xÃ´ng mặt để hơi nÃ³ng lÃ m giÃ£n nở lÃ´ chÃ¢n lÃ´ng. Cuối cÃ¹ng dÃ¹ng khăn mềm để thấm khÃ´ sau đÃ³ rửa lại với nước lạnh để thu hẹp lỗ chÃ¢n lÃ´ng.\r\n\r\n	Â ', 31, 0, '/uploads/images/26/08/2015/1440556303-1440297664-trung-dv5%5B1%5D.jpg', 0, '2015-08-26 08:20:17', 'Nuôi da trắng mịn bằng trứng gà', 'Trứng là một loại thực phẩm chứa nhiều dinh dưỡng có lợi cho sức khỏe. Không những thế, với những thành phần như vitamin A, B6, B12, D và E… trứng còn giúp chị em chúng mình chăm sóc hiệu quả đối với vẻ đẹp của làn da.', '2015-08-26 08:20:17', '2015-08-26 08:20:17', 1, 0, 'http://www.24h.com.vn/lam-dep/nuoi-da-trang-min-bang-trung-ga-c145a730214.html'),
(6, 'Bí quyết gương mặt đẹp như nữ thần của Song Hye-Kyo', 'bi-quyet-guong-mat-dep-nhu-nu-than-cua-song-hye-kyo', 'Không quá khó để nắm được cách trang điểm trong suốt của Song Hye-Kyo.', '<p>\r\n	1. L&Atilde;&acute;ng m&Atilde; y Trước ti&Atilde;&ordf;n ch&Atilde;&ordm;ng ta sẽ d&Atilde;&sup1;ng cọ kẻ l&Atilde;&acute;ng m&Atilde; y t&Atilde;&iexcl;n phấn m&Atilde; u n&Atilde;&cent;u tự nhi&Atilde;&ordf;n theo khu&Atilde;&acute;n l&Atilde;&acute;ng m&Atilde; y sẵn c&Atilde;&sup3;. C&Atilde;&iexcl;c bạn ch&Atilde;&ordm; &Atilde;&frac12; t&Atilde;&iexcl;n phấn ở phần giữa v&Atilde; đu&Atilde;&acute;i l&Atilde;&acute;ng m&Atilde; y trước, sau đ&Atilde;&sup3; mới d&Atilde;&sup1;ng lượng phấn c&Atilde;&sup2;n lại tr&Atilde;&ordf;n cọ để t&Atilde;&iexcl;n phần đầu l&Atilde;&acute;ng m&Atilde; y. Vừa t&Atilde;&iexcl;n vừa chải xu&Atilde;&acute;i theo chiều l&Atilde;&acute;ng m&Atilde; y. Đối với những v&Atilde;&sup1;ng &Atilde;&shy;t l&Atilde;&acute;ng m&Atilde; y th&Atilde;&not; ch&Atilde;&ordm;ng ta c&Atilde;&sup3; thể sử dụng m&Atilde; u phấn đậm hơn. Ngo&Atilde; i ra c&Atilde;&iexcl;c bạn n&Atilde;&ordf;n sử dụng m&Atilde; u phấn d&Atilde;&sup1;ng cho l&Atilde;&acute;ng m&Atilde; y gần với m&Atilde; u&Acirc; t&Atilde;&sup3;c&Acirc; để đem lại cảm gi&Atilde;&iexcl;c tự nhi&Atilde;&ordf;n. &Acirc; Vẻ đẹp trong ngần của Song Hye-Kyo 2. Bầu mắt Ở bước n&Atilde; y ch&Atilde;&ordm;ng ta sẽ sử dụng đầu ng&Atilde;&sup3;n tay để t&Atilde;&iexcl;n một lớp phấn m&Atilde; u n&Atilde;&cent;u tự nhi&Atilde;&ordf;n thật mỏng l&Atilde;&ordf;n bầu mắt v&Atilde; bọng mắt. Nếu như c&Atilde;&iexcl;c bạn muốn tạo điểm nhấn hơn th&Atilde;&not; ch&Atilde;&ordm;ng ta c&Atilde;&sup3; thể d&Atilde;&sup1;ng m&Atilde; u phấn đậm hơn một ch&Atilde;&ordm;t để t&Atilde;&iexcl;n l&Atilde;&ordf;n phần m&Atilde;&shy; mắt để tạo ra hiệu ứng b&Atilde;&sup3;ng đổ. 3. Viền mắt Phong c&Atilde;&iexcl;ch&Acirc; trang điểm&Acirc; trong suốt kh&Atilde;&acute;ng cần qu&Atilde;&iexcl; nhấn mạnh v&Atilde; o phần eyeliner. Ch&Atilde;&ordm;ng ta sẽ chỉ sử dụng eyeliner m&Atilde; u n&Atilde;&cent;u để kẻ s&Atilde;&iexcl;t m&Atilde;&shy; mắt một đường thật mảnh. &Acirc; Viền mắt mảnh v&Atilde; s&Atilde;&iexcl;t m&Atilde;&shy; 4. L&Atilde;&acute;ng mi D&Atilde;&sup1;ng kẹp mi để uốn cong l&Atilde;&acute;ng mi, sau đ&Atilde;&sup3; chải mascara để khiến cho đ&Atilde;&acute;i mắt long lanh v&Atilde; quyến rũ hơn. 5. M&Atilde;&iexcl; hồng Sử dụng phấn m&Atilde;&iexcl; dạng kem v&Atilde; d&Atilde;&sup1;ng tay để t&Atilde;&iexcl;n nhẹ v&Atilde; từ phần xương g&Atilde;&sup2; m&Atilde;&iexcl; l&Atilde;&ordf;n ph&Atilde;&shy;a th&Atilde;&iexcl;i dương. &Acirc; M&Atilde;&iexcl; hồng h&Atilde; o, căng khỏe 6. Son m&Atilde;&acute;i Việc sử dụng m&Atilde; u son nhẹ nh&Atilde; ng (Natural Lip tint gloss) ph&Atilde;&sup1; hợp với tổng thể khu&Atilde;&acute;n mặt sẽ đem lại hiệu quả tốt hơn so với một t&Atilde;&acute;ng son qu&Atilde;&iexcl; nổi bật. C&Atilde;&iexcl;c bạn ch&Atilde;&ordm; &Atilde;&frac12; n&Atilde;&ordf;n d&Atilde;&sup1;ng cọ t&Atilde;&iexcl;n son từ trong long m&Atilde;&acute;i ra ph&Atilde;&shy;a ngo&Atilde; i. &Acirc; &Acirc;</p>\r\n', 27, 0, '/uploads/images/26/08/2015/1440468146-1440467967-1%5B1%5D.jpg', 0, '2015-08-26 08:22:49', 'Bí quyết gương mặt đẹp như nữ thần của Song Hye-Kyo', 'Không quá khó để nắm được cách trang điểm trong suốt của Song Hye-Kyo.', '2015-08-26 08:22:49', '2015-10-27 10:17:56', 1, 0, 'http://www.24h.com.vn/lam-dep/bi-quyet-guong-mat-dep-nhu-nu-than-cua-song-hye-kyo-c145a729949.html'),
(4, '9x có vòng ba 101 cm gây chú ý tại Hoa hậu Hoàn vũ VN', '9x-co-vong-ba-101-cm-gay-chu-y-tai-hoa-hau-hoan-vu-vn', 'Quỳnh Mai – thí sinh VNTM 2013 có chỉ số hình thể rất nóng bỏng: 88 – 64 – 101.', '<p>\r\n	Một trong những yếu tố đem lại sức n&oacute;ng cho Hoa hậu Ho&agrave;n vũ Việt Nam 2015 l&agrave; sự g&oacute;p mặt của c&aacute;c gương mặt th&acirc;n quen. Trong số đ&oacute;, Ng&ocirc; Thị Quỳnh Mai, người đẹp từng dự thi Vietnam&rsquo;s Next Top Model 2013 v&agrave; l&agrave; qu&aacute;n qu&acirc;n cuộc thi T&igrave;m kiếm thần tượng Thời trang F-Idol g&acirc;y ch&uacute; &yacute; với vẻ ngo&agrave;i khỏe khoắn, n&oacute;ng bỏng.</p>\r\n<p align="center" style="color:#0000FF;font-style:italic;text-align:center;">\r\n	<img alt="9x co vong ba 101 cm gay chu y tai hoa hau hoan vu vn hinh anh 1" class="news-image" data-pagespeed-loaded="1" data-pagespeed-onload="pagespeed.CriticalImages.checkImageForCriticality(this);" id="news-image-id-0" src="http://streaming1.danviet.vn/upload/3-2015/images/2015-08-26/1440562471-10506957_805828259436122_9162226043185044067_o.jpg" title="9x có vòng ba 101 cm gây chú ý tại Hoa hậu Hoàn vũ VN hình ảnh 1" width="100%" /></p>\r\n<p style="color:#0000FF;font-style:italic;text-align:center;">\r\n	Th&iacute; sinh Hoa hậu Việt Nam 2015 Ng&ocirc; Thị Quỳnh Mai</p>\r\n<p>\r\n	Ng&ocirc; Thị Quỳnh Mai sinh năm 1995, đến từ Trung cấp M&uacute;a TP.HCM. 9x n&agrave;y từng học m&uacute;a 6 năm v&agrave; lọt v&agrave;o top 30 của cuộc thi So you think you can dance. Năm 2013, khi vừa tr&ograve;n 18 tuổi, c&ocirc; tiếp tục để lại nhiều dấu ấn khi g&oacute;p mặt tại cuộc thi Vietnam&rsquo;s Next Top Model.</p>\r\n<p>\r\n	L&agrave; một vũ c&ocirc;ng n&ecirc;n Quỳnh Mai c&oacute; th&acirc;n h&igrave;nh kh&aacute; thể thao với l&agrave;n da r&aacute;m nắng khỏe khoắn. Quỳnh Mai cao 1m70 v&agrave; c&oacute; số đo v&ograve;ng 3 ấn tượng: 101 cm (chỉ số h&igrave;nh thể của Quỳnh Mai l&agrave; 88-64-101). Sau khi rời khỏi Vietnam&rsquo;s Next Top Model năm 2013, c&ocirc; g&aacute;i trẻ hạ quyết t&acirc;m giảm c&acirc;n v&agrave; tới nay đ&atilde; đạt được mục ti&ecirc;u, giảm 8kg, từ 64 xuống c&ograve;n 56kg.</p>\r\n<p>\r\n	Để &eacute;p c&acirc;n th&agrave;nh c&ocirc;ng, Quỳnh Mai rất chăm chỉ luyện tập c&aacute;c b&agrave;i thể dục cardio (c&aacute;c b&agrave;i tập tốt cho nhịp tim như chạy, đạp xe&hellip;). C&ocirc; khẳng định vẫn ăn uống b&igrave;nh thường v&agrave; chỉ giảm bớt khẩu phần xuống một ch&uacute;t. Trước mỗi lần tham gia c&aacute;c buổi chụp h&igrave;nh, Quỳnh Mai sẽ hạn chế ăn những m&oacute;n c&oacute; nước để thải bớt nước ra ngo&agrave;i.</p>\r\n<p align="center" style="color:#0000FF;font-style:italic;text-align:center;">\r\n	<img alt="9x co vong ba 101 cm gay chu y tai hoa hau hoan vu vn hinh anh 2" class="news-image" data-pagespeed-loaded="1" data-pagespeed-onload="pagespeed.CriticalImages.checkImageForCriticality(this);" id="news-image-id-1" src="http://streaming1.danviet.vn/upload/3-2015/images/2015-08-26/1440562471-11902463_1029008977118048_7500604629508781434_n.jpg" title="9x có vòng ba 101 cm gây chú ý tại Hoa hậu Hoàn vũ VN hình ảnh 2" width="100%" /></p>\r\n<p style="color:#0000FF;font-style:italic;text-align:center;">\r\n	Quỳnh Mai c&oacute; số đo 3 v&ograve;ng ấn tượng: 88 - 64 - 101</p>\r\n<p>\r\n	Đến với Hoa hậu Ho&agrave;n vũ Việt Nam 2015, 9x xinh đẹp cho biết c&ocirc; hi vọng sẽ lọt v&agrave;o top 5 v&agrave; cũng khẳng định những kinh nghiệm c&oacute; được tại Vietnam&rsquo;s Next Top Model đ&atilde; gi&uacute;p c&ocirc; rất nhiều trong việc r&egrave;n luyện sức &eacute;p, sức chịu đựng, kỹ năng catwalk, c&aacute;ch tạo d&aacute;ng, ăn mặc v&agrave; kh&ocirc;ng sợ h&atilde;i trước đ&aacute;m đ&ocirc;ng.</p>\r\n<p>\r\n	D&ugrave; c&ograve;n &iacute;t tuổi m&agrave; đ&atilde; thử sức ở một đấu trường lớn với nhiều &ldquo;đ&agrave;n chị&rdquo; từng &ldquo;chinh chiến&rdquo; tại c&aacute;c cuộc thi hoa hậu, Quỳnh Mai vẫn khẳng định: <em>&ldquo;T&ocirc;i ho&agrave;n to&agrave;n kh&ocirc;ng thấy &aacute;p lực bởi bản th&acirc;n t&ocirc;i cũng l&agrave; một đối thủ đ&aacute;ng gờm. T&ocirc;i lu&ocirc;n giữ vững tinh thần, đối thủ c&agrave;ng nặng, t&ocirc;i c&agrave;ng th&iacute;ch hơn!&rdquo;</em></p>\r\n<p>\r\n	Nữ vũ c&ocirc;ng 9x cũng tự tin về h&igrave;nh thể của m&igrave;nh bởi theo c&ocirc; <em>&ldquo;mỗi người c&oacute; một c&aacute;ch nh&igrave;n kh&aacute;c nhau về vẻ đẹp. C&oacute; người th&iacute;ch m&igrave;nh d&acirc;y, c&oacute; người th&iacute;ch khỏe khoắn.&rdquo;</em> Quỳnh Mai khẳng định c&ocirc; đại diện cho tu&yacute;p thể thao v&agrave; kh&ocirc;ng hề tự ti nếu c&oacute; ai đ&oacute; n&oacute;i m&igrave;nh b&eacute;o. <em>&ldquo;V&oacute;c d&aacute;ng thể thao, khỏe khoắn cũng cho t&ocirc;i sức khỏe để ho&agrave;n th&agrave;nh thật tốt c&aacute;c nhiệm vụ đặt ra trong cuộc thi!&rdquo;</em></p>\r\n<p align="center" style="color:#0000FF;font-style:italic;text-align:center;">\r\n	<img alt="9x co vong ba 101 cm gay chu y tai hoa hau hoan vu vn hinh anh 3" class="news-image" data-pagespeed-loaded="1" data-pagespeed-onload="pagespeed.CriticalImages.checkImageForCriticality(this);" id="news-image-id-2" src="http://streaming1.danviet.vn/upload/3-2015/images/2015-08-26/1440562471-quynh-mai-2.jpg" title="9x có vòng ba 101 cm gây chú ý tại Hoa hậu Hoàn vũ VN hình ảnh 3" width="100%" /></p>\r\n<p align="center" style="color:#0000FF;font-style:italic;text-align:center;">\r\n	<img alt="9x co vong ba 101 cm gay chu y tai hoa hau hoan vu vn hinh anh 4" class="news-image" data-pagespeed-loaded="1" data-pagespeed-onload="pagespeed.CriticalImages.checkImageForCriticality(this);" id="news-image-id-3" src="http://streaming1.danviet.vn/upload/3-2015/images/2015-08-26/1440562471-1378353774-ts.jpg" title="9x có vòng ba 101 cm gây chú ý tại Hoa hậu Hoàn vũ VN hình ảnh 4" width="100%" /></p>\r\n<p align="center" style="color:#0000FF;font-style:italic;text-align:center;">\r\n	Quỳnh Mai tại cuộc thi Vietnam&#39;s Next Top Model 2013</p>\r\n<p align="center" style="color:#0000FF;font-style:italic;text-align:center;">\r\n	<img alt="9x co vong ba 101 cm gay chu y tai hoa hau hoan vu vn hinh anh 5" class="news-image" data-pagespeed-loaded="1" data-pagespeed-onload="pagespeed.CriticalImages.checkImageForCriticality(this);" id="news-image-id-4" src="http://streaming1.danviet.vn/upload/3-2015/images/2015-08-26/1440562471-images1262963_nen18.jpg" title="9x có vòng ba 101 cm gây chú ý tại Hoa hậu Hoàn vũ VN hình ảnh 5" width="100%" /></p>\r\n<p align="center" style="color:#0000FF;font-style:italic;text-align:center;">\r\n	<img alt="9x co vong ba 101 cm gay chu y tai hoa hau hoan vu vn hinh anh 6" class="news-image" data-pagespeed-loaded="1" data-pagespeed-onload="pagespeed.CriticalImages.checkImageForCriticality(this);" id="news-image-id-5" src="http://streaming1.danviet.vn/upload/3-2015/images/2015-08-26/1440562471-10382401_805812572771024_5513912342273027311_o.jpg" title="9x có vòng ba 101 cm gây chú ý tại Hoa hậu Hoàn vũ VN hình ảnh 6" width="100%" /></p>\r\n<p align="center" style="color:#0000FF;font-style:italic;text-align:center;">\r\n	Người đẹp 9x l&agrave; một vũ c&ocirc;ng</p>\r\n<p align="center" style="color:#0000FF;font-style:italic;text-align:center;">\r\n	<img alt="9x co vong ba 101 cm gay chu y tai hoa hau hoan vu vn hinh anh 7" class="news-image" data-pagespeed-loaded="1" data-pagespeed-onload="pagespeed.CriticalImages.checkImageForCriticality(this);" id="news-image-id-6" src="http://streaming1.danviet.vn/upload/3-2015/images/2015-08-26/1440562471-563066_675946495757633_750052158_n.jpg" title="9x có vòng ba 101 cm gây chú ý tại Hoa hậu Hoàn vũ VN hình ảnh 7" width="100%" /></p>\r\n<p align="center" style="color:#0000FF;font-style:italic;text-align:center;">\r\n	<img alt="9x co vong ba 101 cm gay chu y tai hoa hau hoan vu vn hinh anh 8" class="news-image" data-pagespeed-loaded="1" data-pagespeed-onload="pagespeed.CriticalImages.checkImageForCriticality(this);" id="news-image-id-7" src="http://streaming1.danviet.vn/upload/3-2015/images/2015-08-26/1440562471-10451723_887381327947481_5423493404078034037_n.jpg" title="9x có vòng ba 101 cm gây chú ý tại Hoa hậu Hoàn vũ VN hình ảnh 8" width="100%" /></p>\r\n<p align="center" style="color:#0000FF;font-style:italic;text-align:center;">\r\n	Sau VNTM, c&ocirc; đ&atilde; ki&ecirc;n tr&igrave; tập gym để giảm c&acirc;n v&agrave; c&oacute; một cơ thể săn chắc</p>\r\n<p align="center" style="color:#0000FF;font-style:italic;text-align:center;">\r\n	<img alt="9x co vong ba 101 cm gay chu y tai hoa hau hoan vu vn hinh anh 9" class="news-image" data-pagespeed-loaded="1" data-pagespeed-onload="pagespeed.CriticalImages.checkImageForCriticality(this);" id="news-image-id-8" src="http://streaming1.danviet.vn/upload/3-2015/images/2015-08-26/1440562471-1382436655-3.jpg" title="9x có vòng ba 101 cm gây chú ý tại Hoa hậu Hoàn vũ VN hình ảnh 9" width="100%" /></p>\r\n<p align="center" style="color:#0000FF;font-style:italic;text-align:center;">\r\n	Quỳnh Mai rất tự tin bước v&agrave;o v&ograve;ng b&aacute;n kết Hoa hậu Ho&agrave;n vũ Việt Nam 2015</p>\r\n', 31, 0, '/uploads/images/26/08/2015/1440562941-1440562471-1378353774-ts%5B1%5D.jpg', 0, '2015-08-26 11:06:26', 'làm đẹp, giảm cân, vòng 3, vòng 3 khủng, 9x, hoa hậu hoàn vũ việt nam 2015', 'Một trong những yếu tố đem lại sức nóng cho Hoa hậu Hoàn vũ Việt Nam 2015 là sự góp mặt của các gương mặt thân quen. Trong số đó, Ngô Thị Quỳnh Mai, người đẹp từng dự thi Vietnam’s Next Top Model 2013 và là quán quân cuộc thi Tìm kiếm thần tượng Thời tran', '2015-08-26 11:06:26', '2015-10-28 08:12:44', 1, 0, 'http://www.24h.com.vn/lam-dep/9x-co-vong-ba-101-cm-gay-chu-y-tai-hoa-hau-hoan-vu-vn-c145a730251.html'),
(9, ' Lý Nhã Kỳ mời họa sĩ 15 tuổi vẽ tranh cho show thời trang', 'ly-nha-ky-moi-hoa-si-15-tuoi-ve-tranh-cho-show-thoi-trang', 'Cựu Đại sứ du lịch đầu tư thiết kế thảm đỏ, thiệp mời, poster... bằng hội họa để tạo không gian phù hợp cho những bộ váy Haute Couture.', '<div class="fck_detail width_common">\r\n	<p class="Normal">\r\n		<span>L&yacute; Nh&atilde; Kỳ tiết lộ nhiều bức họa được sử dụng trong Lynk Fashion Show 2015 l&agrave; c&aacute;ch thể hiện sự tr&acirc;n trọng m&agrave; c&ocirc; d&agrave;nh cho nh&agrave; thiết kế&nbsp;</span><span>Alexis Mabille</span><span>, đồng thời l&agrave;m tăng gi&aacute; trị nghệ thuật cho buổi diễn.&nbsp;</span></p>\r\n	<p class="Normal">\r\n		Với &yacute; tưởng sử dụng tranh vẽ, từ đầu năm nay, L&yacute; Nh&atilde; Kỳ đ&atilde; t&igrave;m c&aacute;c họa sĩ ph&ugrave; hợp thực hiện c&ocirc;ng việc.&nbsp;<span>To&agrave;n bộ h&igrave;nh ảnh trang tr&iacute; được những nghệ sĩ t&agrave;i hoa của Việt Nam v&agrave; quốc tế vẽ tay.&nbsp;</span></p>\r\n	<table align="center" border="0" cellpadding="3" cellspacing="0" class="tplCaption" style="width: 100%;">\r\n		<tbody>\r\n			<tr>\r\n				<td>\r\n					<img alt="Lý Nhã Kỳ khoe bức tranh chân dung Xa Thi Mạn được vẽ bởi chàng trai 15 tuổi." data-natural-width="500" data-pwidth="470.4" data-width="500" src="http://img.f9.giaitri.vnecdn.net/2015/10/28/DAIN7458-3324-1445997123.jpg" style="width: 100%;" /></td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n					<p class="Image">\r\n						L&yacute; Nh&atilde; Kỳ khoe bức tranh ch&acirc;n dung Xa Thi Mạn được vẽ bởi ch&agrave;ng&nbsp;họa sĩ&nbsp;15 tuổi.</p>\r\n				</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	<p class="Normal">\r\n		<span>​</span><span>Ch&agrave;ng trai 15 tuổi đến từ Nghệ An t&ecirc;n Phan Đăng Ho&agrave;ng, người từng tặng cựu Đại sứ Du lịch những bức ch&acirc;n dung của c&ocirc;, l&agrave; một trong số họa sĩ được Cựu Đại sứ Du lịch tin tưởng. Đăng Ho&agrave;ng sẽ vẽ c&aacute;c nh&acirc;n vật quan trọng trong show như&nbsp;</span><a href="http://giaitri.vnexpress.net/tin-tuc/thoi-trang/lang-mot/xa-thi-man-toi-viet-nam-du-show-thoi-trang-cua-ly-nha-ky-3299898.html">Xa Thi Mạn</a><span>,&nbsp;</span><a href="http://giaitri.vnexpress.net/tin-tuc/thoi-trang/lang-mot/ly-nha-ky-toat-mo-hoi-dap-ung-yeu-cau-cua-alexis-mabille-3298053.html">Alexis Mabille</a><span>... L&yacute; Nh&atilde; Kỳ cho biết c&ocirc; thường xuy&ecirc;n theo s&aacute;t c&acirc;y cọ trẻ tuổi để g&oacute;p &yacute; ho&agrave;n thiện n&eacute;t vẽ, l&agrave;m bật l&ecirc;n thần th&aacute;i nh&acirc;n vật.&nbsp;</span></p>\r\n	<p class="Normal">\r\n		<span>Trong nhiều th&aacute;ng qua, Phan Đăng Ho&agrave;ng ng&agrave;y đ&ecirc;m vẽ ch&acirc;n dung người nổi tiếng sẽ tham gia show diễn. C&aacute;c bức vẽ &quot;Hoa hậu TVB&quot; Xa Thi Mạn v&agrave; nh&agrave; thiết kế Alexis Mabille hứa hẹn g&acirc;y bất ngờ với quan kh&aacute;ch ở chương tr&igrave;nh. Ngo&agrave;i ra, show c&ograve;n giới thiệu&nbsp;</span><span>50 bức ch&acirc;n dung nh&acirc;n vật đặc biệt kh&aacute;c.&nbsp;</span></p>\r\n	<p class="Normal" style="text-align:right;">\r\n		<strong>V&acirc;n An</strong></p>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', 30, 0, 'http://img.f9.giaitri.vnecdn.net/2015/10/28/DAIN7458-3324-1445997123.jpg', 0, '2015-09-01 21:32:17', 'Lý Nhã Kỳ mời họa sĩ 15 tuổi vẽ tranh cho show thời trang', 'Cựu Đại sứ du lịch đầu tư thiết kế thảm đỏ, thiệp mời, poster... bằng hội họa để tạo không gian phù hợp cho những bộ váy Haute Couture.', '2015-09-01 21:32:17', '2015-10-28 08:17:51', 1, 0, 'http://vnexpress.net/tin-tuc/thoi-su/pho-tong-tham-muu-truong-chon-cach-tiet-kiem-khi-to-chuc-dieu-binh-3272453.html');
INSERT INTO `tbl_articles` (`id`, `title`, `alias`, `introtext`, `fulltext`, `catID`, `uid`, `thumbnail`, `ordering`, `created`, `metakey`, `metadesc`, `cdate`, `mdate`, `status`, `feature`, `link_original`) VALUES
(10, 'Kính hàng hiệu có chất lượng thế nào so với đồ bình dân', 'kinh-hang-hieu-co-chat-luong-the-nao-so-voi-do-binh-dan', 'Những cặp kính giá vài chục tới vài trăm triệu đồng thực chất được sản xuất cùng một "lò" với hàng bình dân, khả năng chống tia UV không vượt trội hơn là bao', '<div class="short_intro txt_666">\r\n	Những cặp k&iacute;nh gi&aacute; v&agrave;i chục tới v&agrave;i trăm triệu đồng thực chất được sản xuất c&ugrave;ng một &quot;l&ograve;&quot; với h&agrave;ng b&igrave;nh d&acirc;n, khả năng chống tia UV kh&ocirc;ng vượt trội hơn l&agrave; bao.</div>\r\n<div style="page-break-after: always;">\r\n	<span style="display: none;">&nbsp;</span></div>\r\n<div class="fck_detail width_common">\r\n	<p class="Normal">\r\n		K&iacute;nh mắt trong nhiều thập kỷ qua vẫn được xem l&agrave; m&oacute;n phụ kiện <a href="http://giaitri.vnexpress.net/tin-tuc/thoi-trang/lang-mot/7-mon-do-ua-thich-cua-phu-nu-sanh-dieu-3025460.html">kh&ocirc;ng thể thiếu</a> với cả đ&agrave;n &ocirc;ng lẫn phụ nữ khi xuống phố. Mỗi m&ugrave;a mốt tr&ocirc;i qua, c&aacute;c qu&yacute; &ocirc;ng, qu&yacute; c&ocirc; lại &quot;l&ugrave;ng sục&quot; để sở hữu những kiểu k&iacute;nh r&acirc;m <a href="http://giaitri.vnexpress.net/tin-tuc/thoi-trang/lang-mot/nhung-mau-kinh-dep-nhat-xuan-he-nam-nay-2968220.html">hợp mốt</a>, từ Prada, Tom Ford, Ray Ban, Oakley, Dolce &amp; Gabbana cho đến Salvatore Ferragamo, Chanel, Celine, Chopard... Gi&aacute; của m&oacute;n phụ kiện nhỏ b&eacute; n&agrave;y dao động từ v&agrave;i trăm đ&ocirc; đến v&agrave;i trăm ngh&igrave;n đ&ocirc; t&ugrave;y v&agrave;o độ cầu kỳ, tinh xảo v&agrave; nguy&ecirc;n liệu của sản phẩm. Vậy điểm kh&aacute;c biệt giữa k&iacute;nh h&agrave;ng hiệu cao cấp với những sản phẩm b&igrave;nh d&acirc;n do c&aacute;c thương hiệu nhỏ sản xuất l&agrave; g&igrave;?</p>\r\n	<table align="center" border="0" cellpadding="3" cellspacing="0" class="tplCaption" style="width: 100%;">\r\n		<tbody>\r\n			<tr>\r\n				<td>\r\n					<img alt="5-9369-1441597147.jpg" data-natural-width="500" data-pwidth="470.4" data-width="500" src="http://c1.f9.img.vnecdn.net/2015/09/07/5-9369-1441597147.jpg" style="width: 100%;" /></td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n					<p class="Image">\r\n						Những cặp k&iacute;nh thời trang gi&aacute; h&agrave;ng trăm đ&ocirc; thậm ch&iacute; l&ecirc;n tới v&agrave;i trăm ngh&igrave;n đ&ocirc; la khiến kh&ocirc;ng &iacute;t người đặt c&acirc;u hỏi ch&uacute;ng c&oacute; g&igrave; đặc biệt hơn so với đồ b&igrave;nh d&acirc;n. Ảnh<em>: Dolcegabbana.</em></p>\r\n				</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	<p class="Normal">\r\n		<strong>Tr&ecirc;n thực tế, c&aacute;c thương hiệu k&iacute;nh cao cấp nhất v&agrave; c&aacute;c sản phẩm của h&atilde;ng b&igrave;nh d&acirc;n đều chung nguồn gốc. </strong></p>\r\n	<p class="Normal">\r\n		Luxottica - c&ocirc;ng ty sản xuất k&iacute;nh c&oacute; trụ sở ch&iacute;nh tại Milan, Italy - được coi l&agrave; &quot;&ocirc;ng tr&ugrave;m&quot; trong ng&agrave;nh sản xuất k&iacute;nh thế giới. Mỗi năm, h&atilde;ng n&agrave;y lại cho ra l&ograve; ra h&agrave;ng triệu cặp k&iacute;nh thời trang để đưa về c&aacute;c h&atilde;ng, từ Burberry, Chanel, Paul Smith, Tiffany &amp; Co., Versace, Vogue, Person, Miu Miu, Tory Burch, Paul Smith Donna Karan... cho đến những thương hiệu nhỏ hơn. B&ecirc;n cạnh đ&oacute;, Luxottica cũng sở hữu một loạt c&aacute;c nh&atilde;n hiệu k&iacute;nh nổi tiếng như Ray Ban, Oakley, Oliver Peoples v&agrave; REVO.</p>\r\n	<p class="Normal">\r\n		Luca Biondolillo - đại diện h&atilde;ng cho biết: &quot;70% k&iacute;nh mắt của c&aacute;c h&atilde;ng đều được ch&uacute;ng t&ocirc;i sản xuất tại nh&agrave; m&aacute;y ở Italy, phần c&ograve;n lại l&agrave; Mỹ v&agrave; Trung Quốc. Luxottica kh&ocirc;ng chỉ phụ tr&aacute;ch sản xuất m&agrave; c&ograve;n cả tạo mẫu v&agrave; marketing&quot;. Người n&agrave;y cho biết mỗi nh&agrave; mốt sẽ l&agrave;m việc với đội thiết kế của h&atilde;ng để đưa ra mẫu số chung rồi thỏa thuận cấp ph&eacute;p v&agrave; sản xuất đại tr&agrave; hay giới hạn. Mỗi thỏa thuận cấp ph&eacute;p gi&uacute;p cho thiết kế k&iacute;nh của từng h&atilde;ng được bảo hộ độc quyền trong v&ograve;ng 3-10 năm.</p>\r\n	<p class="Normal">\r\n		Ngo&agrave;i Luxottica, thị trường k&iacute;nh mắt thế giới c&ograve;n bị &quot;thao t&uacute;ng&quot; bởi một &quot;&ocirc;ng lớn&quot; kh&aacute;c l&agrave; Safilo. C&ocirc;ng ty Italy n&agrave;y sản xuất k&iacute;nh cho những h&atilde;ng như Alexander McQueen, A/X Armani Exchange, Balenciaga, Banana Republic, Bottega Veneta, Dior, Emporio Armani, Fossil, Giorgio Armani, Gucci,Yves Saint Laurent, Marc Jacobs... Safilo cũng sở hữu thương hiệu của ri&ecirc;ng m&igrave;nh như Carrera, Polaroid, Smith Optics, Oxydo hay Blue Bay.</p>\r\n	<p class="Normal">\r\n		Theo t&iacute;nh to&aacute;n của c&aacute;c chuy&ecirc;n gia, cứ mỗi một đ&ocirc; la (hơn 20.000 đồng) c&oacute; trong c&aacute;c cặp k&iacute;nh b&aacute;n ra, những c&ocirc;ng ty như Luxottica hay Sofila sẽ thu về khoảng 64 cent (khoảng hơn 12.000 đồng). Cả khi đ&atilde; trừ c&aacute;c khấu hao li&ecirc;n quan đến b&aacute;n h&agrave;ng v&agrave; marketing, số tiền họ kiếm được tr&ecirc;n mỗi sản phẩm vẫn chiếm hơn một nửa gi&aacute; b&aacute;n ra.</p>\r\n	<table align="center" border="0" cellpadding="3" cellspacing="0" class="tplCaption" style="width: 85.034%;">\r\n		<tbody>\r\n			<tr>\r\n				<td>\r\n					<img alt="1-3243-1441597147.jpg" data-pwidth="470.4" data-width="400" src="http://c1.f9.img.vnecdn.net/2015/09/07/1-3243-1441597147.jpg" /></td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n					<p class="Image">\r\n						Những mẫu k&iacute;nh h&agrave;ng hiệu v&agrave; b&igrave;nh d&acirc;n tr&ecirc;n thế giới hiện nay hầu hết được sản xuất bởi một số nh&agrave; cung cấp từ Italy. Ảnh:<em> Blogspot.</em></p>\r\n				</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	<p class="Normal">\r\n		<span>Đeo k&iacute;nh h&agrave;ng hiệu cũng kh&ocirc;ng tốt hơn cho mắt so với k&iacute;nh b&igrave;nh d&acirc;n bởi khả năng chống tia UV - c&ocirc;ng dụng ch&iacute;nh của k&iacute;nh - l&agrave; như nhau.&nbsp;</span><span>&quot;Một cặp k&iacute;nh 300 USD (hơn 6 triệu đồng) thực chất chẳng kh&aacute;c nhiều so với h&agrave;ng 100 USD (hơn 2 triệu đồng) về khả năng bảo vệ mắt, ngoại trừ việc tr&ocirc;ng ch&uacute;ng đẹp hơn v&agrave; c&oacute; t&ecirc;n thương hiệu nổi tiếng đi k&egrave;m&quot;, Jay Duker - chủ tịch của trung t&acirc;m nh&atilde;n khoa Tufts Medical Center (Mỹ) cho biết. Theo chuy&ecirc;n gia, chỉ cần bỏ ra 40-70 USD, c&aacute;c &quot;thượng đế&quot; đ&atilde; sở hữu được một cặp k&iacute;nh c&oacute; khả năng chống tia cực t&iacute;m (UV) tối đa c&ugrave;ng nhiều lợi &iacute;ch kh&aacute;c.</span></p>\r\n	<p class="Normal">\r\n		Tiến sĩ Reza Dana, Gi&aacute;m đốc phụ tr&aacute;ch mảng phẫu thuật gi&aacute;c mạc v&agrave; c&aacute;c tật kh&uacute;c xạ về mắt ở bệnh viện tai-mắt Massachusetts (Mỹ) khẳng định: &quot;Những cặp mắt k&iacute;nh c&oacute; khả năng chống tia UV sử dụng c&ocirc;ng nghệ kh&ocirc;ng mấy đắt đỏ&quot;.</p>\r\n	<p class="Normal">\r\n		<strong>V&igrave; thế, số tiền đắt đỏ m&agrave; kh&aacute;ch h&agrave;ng phải chi cho c&aacute;c cặp k&iacute;nh hiệu phần nhiều v&igrave; c&aacute;c yếu tố ngo&agrave;i chất lượng</strong>.<strong> </strong></p>\r\n	<p class="Normal">\r\n		Gi&aacute; trị thương hiệu l&agrave; một trong những yếu tố g&acirc;y ảnh hưởng nhất đến gi&aacute; b&aacute;n. Để c&oacute; được lợi nhuận cao, c&aacute;c <a href="http://giaitri.vnexpress.net/tin-tuc/thoi-trang/lang-mot/nha-mot-lon-vung-tien-cho-sao-quang-ba-thuong-hieu-2994204.html">thương hiệu lớn</a> phải chi <a href="http://giaitri.vnexpress.net/tin-tuc/thoi-trang/lang-mot/quang-cao-soc-sex-bai-toan-cau-khach-cua-thoi-trang-hien-dai-3109624.html?commentid=9501581&amp;focus=reply">bộn tiền</a> cho <a href="http://giaitri.vnexpress.net/tin-tuc/thoi-trang/lang-mot/chieu-quang-cao-dua-bong-sao-lon-cua-nha-mot-3030903.html">quảng c&aacute;o</a>. B&ecirc;n cạnh đ&oacute;, họ c&ograve;n phải chịu c&aacute;c khoản ph&iacute; về b&aacute;n h&agrave;ng, quản l&yacute; hay thuế. Việc đẩy gi&aacute; c&aacute;c mặt h&agrave;ng l&ecirc;n cao để đảm bảo được cả hai yếu tố quảng b&aacute; thương hiệu lẫn lợi nhuận l&agrave; điều cần thiết.</p>\r\n	<p class="Normal">\r\n		Will Wister, một chuy&ecirc;n gia đầu tư, cho biết nếu coi số lượng h&agrave;ng h&oacute;a sản xuất kh&ocirc;ng thay đổi, việc mở rộng thiết kế sẽ khiến c&aacute;c nh&agrave; mốt mất nhiều chi ph&iacute; hơn cho lĩnh vực nghi&ecirc;n cứu v&agrave; ph&aacute;t triển. C&aacute;c khoản chi tăng l&ecirc;n cũng đồng nghĩa với việc gi&aacute; b&aacute;n của sản phẩm phải &quot;đội&quot; l&ecirc;n th&igrave; mới đem lại được lợi nhuận về cho người sản xuất.</p>\r\n	<table align="center" border="0" cellpadding="3" cellspacing="0" class="tplCaption" style="width: 92.0493%;">\r\n		<tbody>\r\n			<tr>\r\n				<td>\r\n					<img alt="chopard-6370-1441619936.jpg" data-pwidth="470.4" data-width="433" src="http://c1.f9.img.vnecdn.net/2015/09/07/chopard-6370-1441619936.jpg" /></td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n					<p class="Image">\r\n						Phụ kiện h&agrave;ng hiệu vẫn c&oacute; được chỗ đứng trong l&ograve;ng người y&ecirc;u thời trang bởi danh tiếng của thương hiệu. Từ tr&ecirc;n xuống, c&aacute;c mẫu k&iacute;nh gi&aacute; cao &quot;ngất ngưởng&quot; của Cartier Panthere (159.000 USD), Dolce &amp; Gabbana DG2027B (383.000 USD), Chopard (400.000 USD).</p>\r\n				</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	<p class="Normal">\r\n		Tuy nhi&ecirc;n, việc kho&aacute;c l&ecirc;n m&igrave;nh m&oacute;n đồ xa xỉ, c&oacute; sẵn danh tiếng vẫn được xem như một c&aacute;ch khẳng định đẳng cấp. Hầu hết thương hiệu lớn đều đăng k&yacute; một thiết kế độc quyền, đồng nghĩa với việc ai sở hữu những cặp k&iacute;nh thời thượng đắt đỏ cũng sẽ l&agrave; người đi đầu về phong c&aacute;ch. Một số nh&agrave; sản xuất c&ograve;n t&igrave;m c&aacute;ch đưa c&aacute;c loại trang sức, đ&aacute; qu&yacute; cũng như vật liệu chống nước, chịu lực, chống sương... để những m&oacute;n phụ kiện th&ecirc;m phần độc đ&aacute;o. <span class="_5yl5"><span>C&aacute;c &ocirc;ng lớn như Chopard (Thụy Sĩ), Dolce &amp; Gabbana (Italy), Shiels Emerald (Australia), Cartier (Ph&aacute;p) đ&atilde; đua nhau tr&igrave;nh l&agrave;ng những mẫu k&iacute;nh xa xỉ, sử dụng c&aacute;c nguy&ecirc;n liệu như v&agrave;ng, v&agrave;ng trắng, kim cương, hồng ngọc... trang tr&iacute;. Mẫu k&iacute;nh Panthere của Cartier trị gi&aacute; 159.000 USD c&oacute; h&agrave;ng trăm vi&ecirc;n kim cương c&ugrave;ng sapphires sắc xanh tạo h&igrave;nh con b&aacute;o dọc hai gọng k&iacute;nh. Hay như mẫu k&iacute;nh đắt gi&aacute; nhất thế giới năm 2014 của thương hiệu Chopard &quot;h&eacute;t&quot; gi&aacute; 400.000 USD bởi phần mắt được phủ 51 vi&ecirc;n kim cương, c&ograve;n gọng d&aacute;t v&agrave;ng nguy&ecirc;n chất 24 cara.</span></span></p>\r\n	<p class="Normal">\r\n		Nếu so s&aacute;nh về gi&aacute; trị sử dụng (khả năng che chắn nắng, bụi), khoảng c&aacute;ch giữa c&aacute;c cặp k&iacute;nh h&agrave;ng hiệu với b&igrave;nh d&acirc;n kh&ocirc;ng lớn. Nhưng x&eacute;t về mặt thẩm mỹ v&agrave; s&aacute;ng tạo, những m&oacute;n phụ kiện ph&ugrave; phiếm vẫn vượt trội hơn nhiều so với c&aacute;c đối thủ gi&aacute; rẻ. Bởi vậy, c&acirc;u trả lời cho thắc mắc &quot;k&iacute;nh h&agrave;ng hiệu c&oacute; đ&aacute;ng tiền kh&ocirc;ng?&quot; ph&ugrave; thuộc phần nhiều v&agrave;o khả năng kinh tế cũng như quan niệm về c&aacute;n c&acirc;n thẩm mỹ - t&uacute;i tiền của từng người.</p>\r\n	<table border="1" cellpadding="1" cellspacing="0">\r\n		<tbody>\r\n			<tr>\r\n				<td style="background-color: rgb(255, 255, 204);">\r\n					<p class="Normal" style="text-align:center;">\r\n						<strong>Lưu &yacute; khi sử dụng&nbsp;k&iacute;nh</strong></p>\r\n					<p class="Normal">\r\n						1. Kh&ocirc;ng đeo k&iacute;nh trong nh&agrave; hoặc v&agrave;o buổi tối.</p>\r\n					<p class="Normal">\r\n						2. Chọn k&iacute;ch thước ph&ugrave; hợp với khu&ocirc;n mặt v&agrave; phong c&aacute;ch.</p>\r\n					<p class="Normal">\r\n						3. Lu&ocirc;n đảm bảo mắt k&iacute;nh kh&ocirc;ng bị mờ.</p>\r\n					<p class="Normal">\r\n						4.&nbsp;<span>Kh&ocirc;ng n&ecirc;n đeo k&iacute;nh mắt gương khi n&oacute;i chuyện với người kh&aacute;c bởi n&oacute; khiến người đối diện bị bối rối v&igrave; chỉ thấy b&oacute;ng m&igrave;nh trước mặt.</span></p>\r\n					<p class="Normal">\r\n						5. Kh&ocirc;ng n&ecirc;n g&agrave;i k&iacute;nh l&ecirc;n đỉnh đầu. N&oacute; chỉ ph&ugrave; hợp khi bạn kh&ocirc;ng c&oacute; t&uacute;i &aacute;o để cất k&iacute;nh.</p>\r\n					<p class="Normal">\r\n						6. Kh&ocirc;ng vứt k&iacute;nh nếu kh&ocirc;ng bị hỏng. Thời trang lu&ocirc;n tuần ho&agrave;n n&ecirc;n phụ kiện kh&ocirc;ng c&ograve;n hợp mốt sẽ c&oacute; thể trở lại th&agrave;nh xu hướng v&agrave;o những năm sau.</p>\r\n				</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', 31, 0, 'http://c1.f9.img.vnecdn.net/2015/09/07/1-3243-1441597147.jpg', 0, '2015-09-07 22:45:32', 'Kính hàng hiệu có chất lượng thế nào so với đồ bình dân', 'Những cặp kính giá vài chục tới vài trăm triệu đồng thực chất được sản xuất cùng một lò với hàng bình dân, khả năng chống tia UV không vượt trội hơn là bao', '2015-09-07 22:45:32', '2015-10-28 08:14:26', 1, 0, 'http://giaitri.vnexpress.net/tin-tuc/thoi-trang/lang-mot/kinh-hang-hieu-co-chat-luong-the-nao-so-voi-do-binh-dan-3275162.html'),
(11, '100 năm phát triển nội y được tái hiện trong video 3 phút', '100-nam-phat-trien-noi-y-duoc-tai-hien-trong-video-3-phut', 'Trong video do trang Mode thực hiện, người xem có thể thấy rõ sự biến đổi về kiểu dáng và chất liệu của nội y dành cho phụ nữ qua từng thập kỷ.', '<p class="Normal" style="margin: 0px 0px 1em; padding: 0px; line-height: 18px; text-rendering: geometricPrecision; font-family: arial; font-size: 14px;">\r\n	<span style="margin: 0px; padding: 0px;">Video d&agrave;i gần ba ph&uacute;t, trong đ&oacute; c&aacute;c người mẫu lần lượt thể hiện từng mẫu nội y đặc trưng qua c&aacute;c giai đoạn từ năm 1915 đến nay.</span></p>\r\n<p class="Normal" style="margin: 0px 0px 1em; padding: 0px; line-height: 18px; text-rendering: geometricPrecision; font-family: arial; font-size: 14px;">\r\n	<span style="margin: 0px; padding: 0px;">Thập ni&ecirc;n 1910, nội y d&agrave;nh cho nữ giới đơn giản l&agrave; chiếc &aacute;o liền th&acirc;n tối giản. Năm 1925, v&aacute;y ngủ hai d&acirc;y (slipdress) mỏng manh so&aacute;n ng&ocirc;i. Ch&uacute;ng được l&agrave;m từ nhiều chất liệu như&nbsp;</span><span style="margin: 0px; padding: 0px;">lụa, mousseline.</span><span style="margin: 0px; padding: 0px;">&nbsp;L&uacute;c n&agrave;y, c&aacute;c c&ocirc; g&aacute;i c&oacute; th&ecirc;m &aacute;o kho&aacute;c nhẹ b&ecirc;n ngo&agrave;i.&nbsp;</span><span style="margin: 0px; padding: 0px;">Trong những năm 1930, phụ nữ bắt đầu diện kiểu &aacute;o l&oacute;t c&uacute;p ngực, mặc k&egrave;m quần short rộng v&agrave; mỏng.</span></p>\r\n<table align="center" border="1" cellpadding="1" cellspacing="0" class="tbl_insert" style="margin: 0px auto 10px; padding: 0px; max-width: 100%; font-family: arial; font-size: 14px; line-height: normal; width: 468px;">\r\n	<tbody style="margin: 0px; padding: 0px;">\r\n		<tr style="margin: 0px; padding: 0px;">\r\n			<td style="margin: 0px; padding: 2px;">\r\n				<div style="margin: 0px; padding: 0px; text-align: center;">\r\n					<div class="embed-container" style="margin: 0px 0px 1em; padding: 0px 0px 259.875px; position: relative; height: 0px; overflow: hidden;">\r\n						 </div>\r\n				</div>\r\n			</td>\r\n		</tr>\r\n		<tr style="margin: 0px; padding: 0px;">\r\n			<td style="margin: 0px; padding: 2px;">\r\n				&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p class="Normal" style="margin: 0px 0px 1em; padding: 0px; line-height: 18px; text-rendering: geometricPrecision; font-family: arial; font-size: 14px;">\r\n	<span style="margin: 0px; padding: 0px;">Năm 1945, &aacute;o&nbsp;</span><span style="margin: 0px; padding: 0px;">ngực c&oacute; m&uacute;t l&oacute;t ra đời với phom d&aacute;ng liền th&acirc;n như một chiếc v&aacute;y ống ngắn b&oacute; s&aacute;t cơ thể, phần ngực cắt c&uacute;p &ocirc;m trọn v&ograve;ng một. 10 năm sau, b&ecirc;n cạnh chiếc &aacute;o ngực hai d&acirc;y, nữ giới được l&agrave;m quen với &aacute;o ngủ rộng v&agrave; ngắn theo kiểu babydoll. L&uacute;c n&agrave;y, quần l&oacute;t được may b&oacute; cơ thể hơn với d&aacute;ng quần short xếp b&egrave;o nh&uacute;n. Năm 1965 đ&aacute;nh dấu một bước ngoặt lớn khi&nbsp;</span><span style="margin: 0px; padding: 0px;">đồ l&oacute;t cả &aacute;o lẫn quần được l&agrave;m b&oacute; s&aacute;t cơ thể, t&ocirc;n l&ecirc;n bầu ngực, cắt c&uacute;p nhỏ gọn, tinh tế hơn. Năm 1975, v&aacute;y ngủ hai d&acirc;y tiếp tục trỗi dậy với phi&ecirc;n bản d&agrave;i bằng lụa, &ocirc;m d&aacute;ng hơn so với thời kỳ 1925.</span></p>\r\n<p class="Normal" style="margin: 0px 0px 1em; padding: 0px; line-height: 18px; text-rendering: geometricPrecision; font-family: arial; font-size: 14px;">\r\n	Từ năm 1985 đến nay, c&aacute;c d&aacute;ng &aacute;o corset đầy khi&ecirc;u kh&iacute;ch ph&aacute;t triển như vũ b&atilde;o. C&aacute;c nh&agrave; thiết kế ng&agrave;y c&agrave;ng đơn giản h&oacute;a nội y, sử dụng đa chất liệu hơn, kiểu d&aacute;ng tinh tế v&agrave; phong ph&uacute;, đem lại nhiều lựa chọn cho nữ giới.</p>\r\n', 30, 0, 'http://c1.img.video.giaitri.vnecdn.net/web/2015/09/07/hanh-trinh-100-nam-bien-doi-cua-do-lot-1441614622_490x294.jpg', 0, '2015-09-07 23:05:49', 'Trong video do trang Mode thực hiện, người xem có thể thấy rõ sự biến đổi về kiểu dáng và chất liệu của nội y dành cho phụ nữ qua từng thập kỷ.', 'Trong video do trang Mode thực hiện, người xem có thể thấy rõ sự biến đổi về kiểu dáng và chất liệu của nội y dành cho phụ nữ qua từng thập kỷ.', '2015-09-07 23:05:49', '2015-10-28 10:01:31', 1, 0, 'http://giaitri.vnexpress.net/tin-tuc/thoi-trang/lang-mot/100-nam-phat-trien-noi-y-duoc-tai-hien-trong-video-3-phut-3275574.html');

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
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL,
  `metakey` varchar(255) NOT NULL,
  `metadesc` varchar(255) NOT NULL,
  `showpath` smallint(6) NOT NULL,
  `status` smallint(6) NOT NULL,
  `feature` tinyint(4) NOT NULL,
  `link_original` varchar(255) NOT NULL,
  `redirect` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `title`, `alias`, `scope`, `cdate`, `mdate`, `ordering`, `lft`, `rgt`, `type`, `description`, `metakey`, `metadesc`, `showpath`, `status`, `feature`, `link_original`, `redirect`) VALUES
(31, 'Tin tức-Làm đẹp', 'tin-tuc-lam-dep', 'articles', '2015-08-26 08:14:25', '2015-10-21 21:15:15', 0, 0, 0, 0, 'Tin tức-Làm đẹp', 'Tin tức-Làm đẹp', 'Tin tức-Làm đẹp', 0, 1, 1, '', 0),
(30, 'Tin tức-Sao việt', 'tin-tuc-sao-viet', 'articles', '2015-08-26 08:14:12', '2015-10-21 21:15:30', 0, 0, 0, 0, 'Tin tức-Sao việt', 'Tin tức-Sao việt', 'Tin tức-Sao việt', 0, 1, 1, '', 0),
(29, 'Vui nhộn', 'vui-nhon', 'playlists', '2015-08-25 03:54:49', '2015-08-25 03:54:49', 0, 0, 0, 1, 'Vui nhộn', 'Vui nhộn', 'Vui nhộn', 0, 1, 0, '', 0),
(28, 'Phim Con Heo', 'phim-con-heo', 'playlists', '2015-08-25 03:54:21', '2015-08-25 03:54:21', 0, 0, 0, 1, 'Phim con heo', 'Phim con heo', 'Phim con heo', 0, 1, 0, '', 0),
(27, 'Hài Hước', 'hai-huoc', 'playlists', '2015-08-25 03:51:41', '2015-10-30 04:01:10', 0, 0, 0, 1, 'ádasd', 'ádas', 'ádasdas', 0, 1, 1, '', 0),
(32, 'Thể Thao', 'the-thao', 'playlists', '2015-08-27 11:16:04', '2015-10-21 21:15:40', 0, 0, 0, 1, 'thể thao', '', '', 0, 1, 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_index`
--

CREATE TABLE IF NOT EXISTS `tbl_category_index` (
  `cat_id` int(11) NOT NULL,
  `pindex` int(11) NOT NULL,
  `type` smallint(11) NOT NULL DEFAULT '0' COMMENT '1: article, 2: playlist',
  PRIMARY KEY (`cat_id`,`pindex`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category_index`
--

INSERT INTO `tbl_category_index` (`cat_id`, `pindex`, `type`) VALUES
(27, 8, 2),
(27, 9, 2),
(29, 3, 2),
(29, 11, 2),
(32, 3, 2),
(32, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_extensions`
--

CREATE TABLE IF NOT EXISTS `tbl_extensions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `version` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  `creationDate` varchar(32) NOT NULL,
  `ordering` int(11) NOT NULL,
  `type` varchar(32) NOT NULL COMMENT 'module, plugin, app',
  `folder` varchar(128) NOT NULL,
  `client` varchar(32) NOT NULL COMMENT 'site, backend',
  `status` smallint(6) NOT NULL,
  `params` text NOT NULL,
  `cdate` datetime NOT NULL,
  `mdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_extensions`
--

INSERT INTO `tbl_extensions` (`id`, `title`, `alias`, `author`, `version`, `description`, `creationDate`, `ordering`, `type`, `folder`, `client`, `status`, `params`, `cdate`, `mdate`) VALUES
(1, 'article', 'article', 'ducdm87', '1.0', 'bai viet', '', 1, 'app', 'article', '', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'banner', 'banner', 'ducdm87', '', 'banner', '', 2, 'app', 'banner', '', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'tophits', '', 'BHmedia group php', '', 'Top hits article', 'July 2006', 1, 'module', 'tophits', 'site', 0, '{"param":{"attr":{"title":{"0":"advance"},"path":{"0":"extensions\\/modules\\/tophits\\/element"}},"field":[{"@attributes":{"type":"text","name":"","default":"","label":"","description":""}},{"@attributes":{"type":"textarea","name":"","default":"","label":"","description":"","cols":"10","rows":"10"}},{"@attributes":{"type":"radio","name":"","default":"","label":"","description":""},"option":["On","Off"]},{"@attributes":{"type":"select","name":"layout","default":"","label":"","description":""},"option":["tin moi","tin noi bat"]},{"@attributes":{"type":"category","name":"catID","label":"","description":"","scope":"","parent":"","maxlevel":"2"}},{"@attributes":{"type":"date","name":"date","label":"","description":""}}]}}', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'main menu', 'main-menu', 'ducdm87', '1.0', '', 'January 1', 0, 'module', 'mainmenu', '1', 0, '{"menutype":"1","menu_style":"horiz_flat","showAllChildren":"1","moduleclass_sfx":"sdf -aasd","header":"as","footer":"dsa","cache":"1","cache_time":"600"}', '2015-10-02 10:37:49', '2015-10-16 04:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menus`
--

CREATE TABLE IF NOT EXISTS `tbl_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL,
  `cdate` datetime NOT NULL,
  `mdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_menus`
--

INSERT INTO `tbl_menus` (`id`, `title`, `alias`, `description`, `status`, `cdate`, `mdate`) VALUES
(1, 'main menu', 'main-menu', 'trang chu', 1, '0000-00-00 00:00:00', '2015-10-12 09:23:01'),
(3, 'User menu', 'user-menu', '', 1, '0000-00-00 00:00:00', '2015-10-12 09:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_item`
--

CREATE TABLE IF NOT EXISTS `tbl_menu_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `menuID` int(11) NOT NULL,
  `parentID` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `type` varchar(32) NOT NULL COMMENT 'url, app, separator, alias',
  `default` smallint(6) NOT NULL,
  `link` varchar(255) NOT NULL,
  `controller` varchar(64) NOT NULL,
  `action` varchar(64) NOT NULL,
  `level` smallint(6) NOT NULL,
  `ordering` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `cdate` datetime NOT NULL,
  `mdate` datetime NOT NULL,
  `params` text NOT NULL COMMENT 'showtitle, class-sf,  metadata',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tbl_menu_item`
--

INSERT INTO `tbl_menu_item` (`id`, `title`, `alias`, `menuID`, `parentID`, `lft`, `rgt`, `type`, `default`, `link`, `controller`, `action`, `level`, `ordering`, `status`, `cdate`, `mdate`, `params`) VALUES
(1, 'menu_root', 'root', 0, 0, 0, 49, 'app', 0, '', '', '', 0, 0, 0, '0000-00-00 00:00:00', '2015-08-17 10:15:59', ''),
(23, 'tin trong nuoc', 'tin-trong-nuoc', 1, 17, 38, 39, 'app', 0, '', '', '', 2, 23, 1, '0000-00-00 00:00:00', '2015-10-19 10:05:07', '{"app":"article","controller":"category","action":"blog","catid":"10","menu_text":1}'),
(24, 'tin quoc te', 'tin-quoc-te', 1, 17, 8, 9, 'app', 0, '', '', '', 2, 0, 1, '0000-00-00 00:00:00', '2015-08-18 06:42:44', ''),
(17, 'tin tuc', 'tin-tuc', 1, 1, 5, 40, 'app', 1, '', '', '', 1, 17, 1, '0000-00-00 00:00:00', '2015-10-16 05:41:14', '{"app":"article","controller":"category","action":"blog","catid":"10","menu_text":1}'),
(18, 'menu 2', 'menu 1', 1, 1, 41, 44, 'app', 0, '', 'articles', 'category', 1, 0, 1, '0000-00-00 00:00:00', '2015-08-18 06:33:03', ''),
(19, 'menu 3', 'menu 1', 1, 1, 45, 46, 'app', 0, '', '', '', 1, 0, 1, '0000-00-00 00:00:00', '2015-08-18 06:34:42', ''),
(20, 'menu 4', '', 1, 1, 47, 48, 'app', 0, '', '', '', 1, 0, 1, '0000-00-00 00:00:00', '2015-08-18 06:35:42', ''),
(25, 'Tin Y học', 'tin-y-hoc', 1, 17, 10, 25, 'app', 0, '', '', '', 2, 25, 1, '0000-00-00 00:00:00', '2015-08-18 10:40:00', ''),
(26, 'tintuc 1.4', '', 1, 17, 26, 27, 'app', 0, '', '', '', 2, 0, 1, '0000-00-00 00:00:00', '2015-08-18 06:43:48', ''),
(27, 'tintuc 1.5', '', 1, 17, 28, 35, 'app', 0, '', '', '', 2, 0, 1, '0000-00-00 00:00:00', '2015-08-18 06:43:50', ''),
(28, 'Y học 1.3.1', '', 1, 25, 11, 12, 'app', 0, '', '', '', 3, 0, 1, '0000-00-00 00:00:00', '2015-08-18 06:56:04', ''),
(29, 'Y học 1.3.2', '', 1, 25, 15, 16, 'app', 0, '', '', '', 3, 0, 1, '0000-00-00 00:00:00', '2015-08-18 06:58:09', ''),
(30, 'tintuc 1.5.1', '', 1, 27, 29, 32, 'app', 0, '', '', '', 3, 0, 1, '0000-00-00 00:00:00', '2015-08-18 06:59:03', ''),
(31, 'Y học 1.3.3', '', 1, 25, 17, 20, 'app', 0, '', '', '', 3, 29, 1, '0000-00-00 00:00:00', '2015-08-18 07:37:28', ''),
(32, 'Trang chu', 'trang-chu', 1, 1, 3, 30, '', 0, '', '', '', 1, 32, 1, '0000-00-00 00:00:00', '2015-10-16 05:05:14', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modules`
--

CREATE TABLE IF NOT EXISTS `tbl_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `cdate` datetime NOT NULL,
  `mdate` datetime NOT NULL,
  `ordering` int(11) NOT NULL,
  `showtitle` smallint(6) NOT NULL,
  `menu` varchar(32) NOT NULL,
  `position` varchar(128) NOT NULL,
  `module` varchar(128) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_modules`
--

INSERT INTO `tbl_modules` (`id`, `title`, `alias`, `cdate`, `mdate`, `ordering`, `showtitle`, `menu`, `position`, `module`, `description`, `status`, `params`) VALUES
(1, 'main menu', 'main-menu', '2015-10-14 05:31:21', '2015-10-16 10:06:12', 0, 1, 'all', '', 'mainmenu', '', 1, '{"menutype":"3","menu_style":"horiz_flat","showAllChildren":"1","moduleclass_sfx":"sdf -aasd","header":"","footer":"","cache":"1","cache_time":"600"}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module_menuitem_ref`
--

CREATE TABLE IF NOT EXISTS `tbl_module_menuitem_ref` (
  `moduleID` int(11) NOT NULL,
  `menuID` int(11) NOT NULL,
  UNIQUE KEY `moduleID` (`moduleID`,`menuID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_module_menuitem_ref`
--

INSERT INTO `tbl_module_menuitem_ref` (`moduleID`, `menuID`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_playlist`
--

CREATE TABLE IF NOT EXISTS `tbl_playlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `feature` tinyint(4) NOT NULL,
  `active` int(11) NOT NULL,
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `cdate` datetime NOT NULL,
  `mdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_playlist`
--

INSERT INTO `tbl_playlist` (`id`, `name`, `alias`, `thumbnail`, `status`, `feature`, `active`, `metakey`, `metadesc`, `cdate`, `mdate`) VALUES
(3, 'Happy Birthday songs', 'happy-birthday-songs', '', 1, 1, 1, 'Happy Birthday songs, Happy Birthday songs', 'Happy Birthday songs. Happy Birthday songs', '2015-10-28 05:18:13', '2015-10-30 05:24:32'),
(4, 'Happy Birthday songs - Karaoke - Sing along', 'happy-birthday-songs-karaoke-sing-along', '', 1, 1, 0, '', '', '0000-00-00 00:00:00', '2015-10-30 05:24:58'),
(5, 'Numbers songs - Counting for kids - Karaoke - Sing Along', 'numbers-songs-counting-for-kids-karaoke-sing-along', '', 1, 1, 0, '', '', '0000-00-00 00:00:00', '2015-10-29 04:56:29'),
(6, 'Nursery Rhymes Collection', 'nursery-rhymes-collection', '', 1, 1, 0, '', '', '0000-00-00 00:00:00', '2015-10-29 04:56:45'),
(7, 'ABCs and Phonics Songs', 'abcs-and-phonics-songs', '', 1, 1, 0, '', '', '0000-00-00 00:00:00', '2015-10-29 04:56:23'),
(8, 'Animals songs', 'animals-songs', '', 1, 1, 0, '', '', '0000-00-00 00:00:00', '2015-10-30 05:24:06'),
(9, 'Lullabies for kids - Karaoke - Sing Along', 'lullabies-for-kids-karaoke-sing-along', '', 1, 1, 0, '', '', '0000-00-00 00:00:00', '2015-10-30 05:25:28'),
(10, 'ABCs and Phonics Songs - Karaoke - Sing Along', 'abcs-and-phonics-songs-karaoke-sing-along', '', 1, 0, 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Karaoke Songs', 'karaoke-songs', '', 1, 0, 0, '', '', '0000-00-00 00:00:00', '2015-10-30 04:34:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_playlist_xref`
--

CREATE TABLE IF NOT EXISTS `tbl_playlist_xref` (
  `playlistID` int(11) NOT NULL,
  `videoID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_playlist_xref`
--

INSERT INTO `tbl_playlist_xref` (`playlistID`, `videoID`) VALUES
(9, 63),
(10, 63),
(11, 63),
(8, 63),
(10, 62),
(9, 62),
(8, 62),
(7, 62),
(11, 60),
(10, 60),
(9, 60),
(8, 60),
(7, 60),
(6, 60),
(5, 60),
(4, 60),
(3, 60),
(8, 57),
(4, 55),
(4, 54),
(3, 54);

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `groupID` tinyint(4) NOT NULL,
  `leader` smallint(6) NOT NULL,
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
  `cdate` datetime NOT NULL,
  `mdate` datetime NOT NULL,
  `template_id` smallint(6) NOT NULL,
  `status` smallint(6) NOT NULL,
  `lastvisit` datetime NOT NULL,
  `activeCode` varchar(64) NOT NULL,
  `params` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `address` (`address`),
  KEY `city` (`city`),
  KEY `province_state` (`province_state`),
  KEY `status` (`status`),
  KEY `template_id` (`template_id`),
  KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `groupID`, `leader`, `mobile`, `home_phone`, `first_name`, `last_name`, `address`, `city`, `province_state`, `zip_code`, `country`, `suppliers`, `cdate`, `mdate`, `template_id`, `status`, `lastvisit`, `activeCode`, `params`) VALUES
(28, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 2, 0, '', '', 'admin', 'admin', '', '', '', '', 0, '', '2015-10-24 00:00:00', '2015-10-24 00:00:00', 0, 1, '2015-10-30 15:58:56', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_group`
--

CREATE TABLE IF NOT EXISTS `tbl_users_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentID` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` smallint(6) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `value` varchar(255) NOT NULL DEFAULT '',
  `isActive` varchar(1) NOT NULL,
  `backend` tinyint(4) NOT NULL,
  `status` smallint(6) NOT NULL,
  `cdate` datetime NOT NULL,
  `mdate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `matdep_gacl_parent_id_aro_groups` (`parentID`),
  KEY `matdep_gacl_lft_rgt_aro_groups` (`lft`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tbl_users_group`
--

INSERT INTO `tbl_users_group` (`id`, `parentID`, `name`, `lft`, `rgt`, `level`, `value`, `isActive`, `backend`, `status`, `cdate`, `mdate`) VALUES
(1, 0, 'ROOT', 1, 22, 0, 'ROOT', '', -1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 'Registered', 20, 21, 1, 'Registered', '', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 6, 'Author', 12, 13, 3, 'Author', '', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 5, 'Editor', 11, 16, 2, 'Editor', '', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 'Publisher', 10, 19, 1, 'Publisher', '', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'Super Administrator', 2, 9, 1, 'Super Administrator', '', 1, 1, '0000-00-00 00:00:00', '2015-10-19 10:19:24'),
(31, 2, 'quản lý khu vực 1', 7, 8, 2, 'quản lý khu vực 1', '1', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 2, 'quản lý khu vực 2', 5, 6, 2, 'quản lý khu vực 2', '1', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_videos`
--

CREATE TABLE IF NOT EXISTS `tbl_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `actor` varchar(255) DEFAULT NULL,
  `info` text,
  `linkyoutube` varchar(255) NOT NULL,
  `videocode` text NOT NULL,
  `videourl` text NOT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `viewed` int(11) DEFAULT NULL,
  `like` int(11) NOT NULL,
  `play_id` int(11) NOT NULL,
  `fecth_link` varchar(255) NOT NULL,
  `catID` int(11) NOT NULL,
  `director` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `cdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL,
  `feature` tinyint(4) NOT NULL,
  `hotweek` tinyint(4) NOT NULL,
  `type` varchar(30) NOT NULL,
  `metakey` varchar(255) NOT NULL,
  `metadesc` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`catID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `tbl_videos`
--

INSERT INTO `tbl_videos` (`id`, `title`, `alias`, `image`, `actor`, `info`, `linkyoutube`, `videocode`, `videourl`, `duration`, `viewed`, `like`, `play_id`, `fecth_link`, `catID`, `director`, `rating`, `cdate`, `mdate`, `status`, `feature`, `hotweek`, `type`, `metakey`, `metadesc`) VALUES
(36, 'Answer for "Get month name from Date using JavaScript"', 'answer-for-get-month-name-from-date-using-javascript', '/uploads/images/26/08/2015/1440302798-1439290851-trang-diem-dv1%5B1%5D.jpg', 'Asian', 'sf 34r34r3r34r34', '', '', '', '3', 3, 0, 0, '', 28, NULL, NULL, '2015-08-26 11:58:29', '2015-08-26 11:58:29', 1, 0, 0, '1', '', ''),
(37, 'Ke O Mien Xa - Dan Nguyen', 'ke-o-mien-xa-dan-nguyen', '/uploads/images/26/08/2015/1440468146-1440467967-1%5B1%5D.jpg', 'Asian', 'lá jhasj dbahbd hakgdskhadgsasgi đáiátdá', '', '', '', '3', 1, 0, 0, '', 28, NULL, NULL, '2015-08-27 03:43:59', '2015-08-27 03:43:59', 1, 0, 0, '1', '', ''),
(38, 'Rừng Lá Thấp', 'rung-la-thap', NULL, 'Japan', 'bhagdkahgsdasjdasdasd', '', '', '', '3:55', NULL, 0, 0, '', 29, NULL, NULL, '2015-08-27 04:51:06', '2015-08-27 04:51:06', 1, 0, 0, '1', '', ''),
(39, 'Hai con nai', 'hai-con-nai', '/uploads/images/27/08/2015/vn.png', 'áldasdas', 'uaosy gauygskygakyudgayusd7o6atd7 62thasd gaygsdkjashd', '', '', '', '3', 8, 0, 0, '', 29, NULL, NULL, '2015-08-27 06:08:22', '2015-08-27 06:08:22', 1, 0, 0, '1', '', ''),
(40, 'Troubleshooting', 'troubleshooting', '/uploads/images/27/08/2015/Big_Buck_Bunny_Trailer_480x270.png', 'Asian', 'A great all rounder. The net tab can disable cache and allow you to review server response and MIME types easily', '', '', '', '3', NULL, 0, 0, '', 27, NULL, NULL, '2015-08-27 08:52:50', '2015-08-27 08:52:50', 1, 0, 0, '1', '', ''),
(41, 'Video Hài Hước - Top 10 Pha Bóng Đá Hài Hước Khó Đỡ Nhất', 'video-hai-huoc-top-10-pha-bong-da-hai-huoc-kho-do-nhat', '/uploads/images/28/08/2015/dong0467-1440726511_490x294.jpg', '', 'khonf co mo ta nao', '', '', '', '', 1, 0, 0, '', 32, NULL, NULL, '2015-08-28 05:39:42', '2015-08-28 05:39:42', 1, 1, 0, '2', '', ''),
(42, '10 pha bóng hài hước nhất thế giới bóng đá', '10-pha-bong-hai-huoc-nhat-the-gioi-bong-da', '', '', '10 pha bóng hài hước nhất thế giới bóng đá', '', '', '', '', 3, 0, 0, '', 29, NULL, NULL, '2015-08-28 04:32:41', '2015-08-28 04:32:41', 1, 0, 0, '1', '', ''),
(43, 'KĨ THUẬT CỦA HAI SIÊU SAO BÓNG ĐÁ HÀNG ĐẦU THẾ GIỚI', 'ki-thuat-cua-hai-sieu-sao-bong-da-hang-dau-the-gioi', '/uploads/images/28/08/2015/CNbhcx6WIAA3Hrd-5422-1440716111.png', '', 'KĨ THUẬT CỦA HAI SIÊU SAO BÓNG ĐÁ HÀNG ĐẦU THẾ GIỚI', '', '', '', '', 1, 0, 0, '', 32, NULL, NULL, '2015-08-28 05:46:10', '2015-08-28 05:46:10', 1, 1, 0, '2', '', ''),
(44, 'Messi và những pha đi bóng thần thánh', 'messi-va-nhung-pha-di-bong-than-thanh', '', '', 'Messi và những pha đi bóng thần thánh', '', '', '', '', 10, 0, 0, '', 32, NULL, NULL, '2015-08-28 04:47:49', '2015-08-28 04:47:49', 1, 0, 0, '2', '', ''),
(45, 'Ronaldinho & Messi ● THE MOVIE ● Two Legends - One Story || HD', 'ronaldinho-messi-the-movie-two-legends-one-story-hd', '/uploads/images/28/08/2015/tag-reuters-1-5897-1440697725-7716-8563-1440716111.jpg', '', 'Ronaldinho & Messi ● THE MOVIE ● Two Legends - One Story || HD', '', '', '', '', 4, 1, 0, '', 32, NULL, NULL, '2015-08-28 05:48:09', '2015-08-28 05:48:09', 1, 1, 0, '2', '', ''),
(46, 'Hài miền Bắc: Căn bệnh kỳ lạ, Quang Thắng, Công Lý', 'hai-mien-bac-can-benh-ky-la-quang-thang-cong-ly', '', 'VN', 'asvdhg kaygadskyu gidasid đâs', '', '', '', '14:55', NULL, 0, 0, '', 29, NULL, NULL, '2015-08-31 03:38:28', '2015-08-31 03:38:28', 1, 0, 0, '3', '', ''),
(47, 'Hài miền Bắc: Rắn nổi, Chiến Thắng, Công Lý', 'hai-mien-bac-ran-noi-chien-thang-cong-ly', '', '', 'Hài miền Bắc: Rắn nổi, Chiến Thắng, Công Lý', '', '', '', '14:41', NULL, 0, 0, '', 29, NULL, NULL, '2015-08-31 03:40:55', '2015-08-31 03:40:55', 1, 0, 0, '3', '', ''),
(48, 'Hài miền Bắc: Đổi đời, Công Lý, Anh Tuấn, Thanh Tú', 'hai-mien-bac-doi-doi-cong-ly-anh-tuan-thanh-tu', '', '', 'Hài miền Bắc: Đổi đời, Công Lý, Anh Tuấn, Thanh Tú', '', '', '', '14:55', NULL, 0, 0, '', 29, NULL, NULL, '2015-08-31 03:44:43', '2015-08-31 03:44:43', 1, 0, 0, '3', '', ''),
(49, 'Hài miền Bắc: Đàn bà thời nay', 'hai-mien-bac-dan-ba-thoi-nay', '', 'Japan', 'Hài miền Bắc: Đàn bà thời nay', '', '', '', '9:28', NULL, 0, 0, '', 29, NULL, NULL, '2015-08-31 03:49:09', '2015-08-31 03:49:09', 1, 0, 0, '3', '', ''),
(50, 'Hài miền Bắc: MC làng, Anh Quân, Quốc Trị', 'hai-mien-bac-mc-lang-anh-quan-quoc-tri', '', '', 'Hài miền Bắc: MC làng, Anh Quân, Quốc Trị', '', '', '', '', 1, 0, 0, '', 27, NULL, NULL, '2015-08-31 03:50:42', '2015-08-31 03:50:42', 1, 0, 0, '3', '', ''),
(51, 'Hài miền Bắc: Đổi đời, Công Lý, Anh Tuấn, Thanh Tú', 'hai-mien-bac-doi-doi-cong-ly-anh-tuan-thanh-tu', '', '', 'Hài miền Bắc: Đổi đời, Công Lý, Anh Tuấn, Thanh Tú', '', '', '', '14:55', NULL, 0, 0, '', 29, NULL, NULL, '2015-08-31 03:51:26', '2015-08-31 03:51:26', 1, 0, 0, '1', '', ''),
(52, '[Phim Hài] Bình Luận Bóng Đá | Chiến Thắng , Quang Tèo Mai Thỏ', 'phim-hai-binh-luan-bong-da-chien-thang-quang-teo-mai-tho', '', '', '[Phim Hài] Bình Luận Bóng Đá | Chiến Thắng , Quang Tèo Mai Thỏ', '', '', '', '9:56', NULL, 0, 0, '', 29, NULL, NULL, '2015-08-31 03:52:22', '2015-08-31 03:52:22', 1, 0, 0, '3', '', ''),
(53, 'Phim Hài Ngắn Hay Nhất | Tuyển Dụng Gái Mát Xa', 'phim-hai-ngan-hay-nhat-tuyen-dung-gai-mat-xa', '', '', 'Phim Hài Ngắn Hay Nhất | Tuyển Dụng Gái Mát Xa', '', '', '', '23:55', 2, 0, 0, '', 29, NULL, NULL, '2015-08-31 03:55:58', '2015-08-31 03:55:58', 1, 0, 0, '3', '', ''),
(54, '[Phim Hài] Các Em Ấy Khỏe Lắm - Mai Thỏ, Quang Tèo, Trung Hiếu', 'phim-hai-cac-em-ay-khoe-lam-mai-tho-quang-teo-trung-hieu', '', '', '[Phim Hài] Các Em Ấy Khỏe Lắm - Mai Thỏ, Quang Tèo, Trung Hiếu', '', '', '', '', NULL, 0, 0, '', 29, NULL, NULL, '2015-08-31 03:57:39', '2015-10-30 05:29:07', 1, 1, 0, '3', '', ''),
(55, 'Môn thể thao bựa nhất trong lịch sử =))', 'mon-the-thao-bua-nhat-trong-lich-su', '', '', 'Môn thể thao bựa nhất trong lịch sử =))', '', '', '', '', NULL, 0, 0, '', 32, NULL, NULL, '2015-08-31 04:01:45', '2015-10-30 05:28:45', 1, 1, 0, '2', '', ''),
(56, '[Thể Thao 24h] - Thụy Điển 2 - 3 Bồ Đào Nha Tổng 2 - 4, Lượt về play off vòng loại World Cup 2014', 'the-thao-24h-thuy-dien-2-3-bo-dao-nha-tong-2-4-luot-ve-play-off-vong-loai-world-cup-2014', '', '', '[Thể Thao 24h] - Thụy Điển 2 - 3 Bồ Đào Nha Tổng 2 - 4, Lượt về play off vòng loại World Cup 2014', '', '', '', '2:27', 1, 0, 0, '', 32, NULL, NULL, '2015-08-31 04:03:22', '2015-10-29 07:28:02', 1, 1, 1, '1', '', ''),
(57, 'Tin điện ảnh| Trương Quỳnh Anh được Tim tặng xế hộp sau khi làm lành', 'tin-dien-anh-truong-quynh-anh-duoc-tim-tang-xe-hop-sau-khi-lam-lanh', '', '', 'Tin điện ảnh| Trương Quỳnh Anh được Tim tặng xế hộp sau khi làm lành', '', '', '', '1:22', NULL, 0, 0, '', 29, NULL, NULL, '2015-08-31 04:08:12', '2015-10-30 05:27:58', 1, 1, 0, '4', '', ''),
(58, 'Tin hot nhất trong ngày - Trương Quỳnh Anh khoe chân dài sexy, thân mật bên Phạm Văn Mách', 'tin-hot-nhat-trong-ngay-truong-quynh-anh-khoe-chan-dai-sexy-than-mat-ben-pham-van-mach', '', '', 'Tin hot nhất trong ngày - Trương Quỳnh Anh khoe chân dài sexy, thân mật bên Phạm Văn Mách', '', '', '', '1:40', NULL, 0, 0, '', 32, NULL, NULL, '2015-08-31 04:08:56', '2015-10-29 07:26:38', 1, 1, 1, '4', '', ''),
(59, 'Những cặp đôi sao Việt tái hợp sau ồn ào đổ vỡ', 'nhung-cap-doi-sao-viet-tai-hop-sau-on-ao-do-vo', '', '', 'Những cặp đôi sao Việt tái hợp sau ồn ào đổ vỡ', '', '', '', '1:20', NULL, 0, 0, '', 32, NULL, NULL, '2015-08-31 04:09:42', '2015-10-29 05:43:40', 1, 0, 0, '4', '', ''),
(60, 'Thúy Nga 115 Paris by night 116 - HAY NHẤT 2015', 'thuy-nga-115-paris-by-night-116-hay-nhat-2015', '', '', 'Thúy Nga 115 Paris by night 116 - HAY NHẤT 2015', '', '', '', '', 1, 0, 0, '', 27, NULL, NULL, '2015-08-31 04:10:07', '2015-10-30 05:23:21', 1, 1, 1, '4', '', ''),
(61, 'Asia 77 - Liên Khúc Nhạc Vàng Hay Nhất | Dòng Nhạc Anh Bằng - Lam Phương - Disc 1', 'asia-77-lien-khuc-nhac-vang-hay-nhat-dong-nhac-anh-bang-lam-phuong-disc-1', '', '', 'Asia 77 - Liên Khúc Nhạc Vàng Hay Nhất | Dòng Nhạc Anh Bằng - Lam Phương - Disc 1', '', '', '', '1:33:35', 1, 0, 0, '', 27, NULL, NULL, '2015-08-31 04:10:51', '2015-10-29 07:26:27', 1, 1, 1, '4', '', ''),
(62, 'Quy trình Kỹ xảo điện ảnh trong các phim nổi tiếng', 'quy-trinh-ky-xao-dien-anh-trong-cac-phim-noi-tieng', '/uploads/images/21/10/2015/duong-ve-nha.jpg', '', 'Quy trình Kỹ xảo điện ảnh trong các phim nổi tiếng', '', 'dád', 'dád', '3:17', 2, 0, 0, '', 29, NULL, NULL, '2015-08-31 04:12:51', '2015-10-30 05:20:40', 1, 1, 1, '4', 'dád', 'ad'),
(63, 'Một khi anh đã cứng thì phải cứng như thế này', 'mot-khi-anh-da-cung-thi-phai-cung-nhu-the-nay', '', '', 'Một khi anh đã "cứng" thì phải "cứng" như thế này :3', '', '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/EtReC_NDE2U" frameborder="0" allowfullscreen></iframe>', 'http://clip.vietbao.vn/wp-content/uploads/2015/04/20150424-motor-oil-chug-challenge-3988.mp4', '0:24', 14, 5, 0, '', 29, NULL, NULL, '2015-08-31 04:13:36', '2015-10-30 04:59:59', 1, 1, 0, '4', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_videos2`
--

CREATE TABLE IF NOT EXISTS `tbl_videos2` (
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
-- Dumping data for table `tbl_videos2`
--

INSERT INTO `tbl_videos2` (`id`, `title`, `alias`, `image`, `info`, `fecth_link`, `origin_link`, `viewed`, `liked`, `play_id`, `server`, `rating`, `status`, `metakey`, `metadesc`, `cdate`, `mdate`) VALUES
(42, 'Finger Family Shark Family Nursery Rhyme | Animal Finger Family | Fish Finger Family', 'finger-family-shark-family-nursery-rhyme-animal-finger-family-fish-finger-family', 'https://i.ytimg.com/vi/Cw8JL6Ozvhk/hqdefault.jpg', 'finger-family-shark-family-nursery-rhyme-animal-finger-family-fish-finger-family', 'https://www.youtube.com/watch?v=Cw8JL6Ozvhk', '', 26, 15, 4, 0, NULL, 1, 'finger-family-shark-family-nursery-rhyme-animal-finger-family-fish-finger-family', 'finger-family-shark-family-nursery-rhyme-animal-finger-family-fish-finger-family', '2015-09-25 05:47:53', '2015-09-25 05:47:53'),
(41, 'Nursery Rhyme - 1,2,3,4,5 Once I caught a fish alive', 'nursery-rhyme-1-2-3-4-5-once-i-caught-a-fish-alive', 'https://i.ytimg.com/vi/9ir_l7qTiZ4/hqdefault.jpg', 'asdadsasdas', 'https://www.youtube.com/watch?v=9ir_l7qTiZ4', '', 7, 0, 4, 0, NULL, 1, 'https://www.youtube.com/watch?v=9ir_l7qTiZ4', 'https://www.youtube.com/watch?v=9ir_l7qTiZ4', '2015-09-25 05:47:13', '2015-09-25 05:47:13'),
(39, 'TOP 20 LEARN ENGLISH NURSERY RHYMES | 40 MINS LONG. Learning Playlist', 'top-20-learn-english-nursery-rhymes-40-mins-long.-learning-playlist', 'https://i.ytimg.com/vi/DQQ99j0DMmk/hqdefault.jpg', 'asdasdasdas', 'https://www.youtube.com/watch?v=DQQ99j0DMmk', '', 19, 0, 3, 0, NULL, 1, 'asdsa', 'asdasdasd', '2015-10-01 17:40:25', '2015-10-01 17:40:25'),
(40, 'ANIMALS IN THE OCEAN | Nursery Rhymes TV. Toddler Kindergarten Preschool Baby Songs.', 'animals-in-the-ocean-nursery-rhymes-tv.-toddler-kindergarten-preschool-baby-songs.', 'https://i.ytimg.com/vi/AskWKTiyLmU/hqdefault.jpg', 'asdasdasd', 'https://www.youtube.com/watch?v=AskWKTiyLmU', '', 13, 0, 5, 0, NULL, 1, 'sadasd', '', '2015-09-25 05:44:58', '2015-09-25 05:44:58'),
(43, '3D Police Finger Family Song | 3D Daddy Finger Nursery Rhyme for Children', '3d-police-finger-family-song-3d-daddy-finger-nursery-rhyme-for-children', 'https://i.ytimg.com/vi/0OCk7yqahSY/hqdefault.jpg', 'ádasdasdas', 'https://www.youtube.com/watch?v=0OCk7yqahSY', '', 7, 0, 0, 0, NULL, 1, 'ádas', 'ádas', '2015-09-25 09:38:14', '2015-09-25 09:38:14'),
(44, 'Finger Family Song - Mega Finger Family Collection! Frozen, Minions, Elmo, Nursery Rhymes & More!', 'finger-family-song-mega-finger-family-collection-frozen-minions-elmo-nursery-rhymes-more', 'https://i.ytimg.com/vi/hSQxjB1Jdkw/hqdefault.jpg', 'jaskjdgasjdasd', 'https://www.youtube.com/watch?v=hSQxjB1Jdkw', '', 3, 1, 4, 0, NULL, 1, 'ád', 'ádasda', '2015-09-25 10:12:53', '2015-09-25 10:12:53'),
(45, 'Thomas and Friends Monster Finger Family Song', 'thomas-and-friends-monster-finger-family-song', 'https://i.ytimg.com/vi/OaFrZmX5wFo/hqdefault.jpg', 'ádasdas', 'https://www.youtube.com/watch?v=OaFrZmX5wFo', '', 5, 0, 4, 0, NULL, 1, 'ádasd', 'ádasdas', '2015-09-25 10:13:19', '2015-09-25 10:13:19'),
(46, 'SUPER FUN! Thomas and Friends Making Tracks to GREAT Destinations Video & THEME SONG!', 'super-fun-thomas-and-friends-making-tracks-to-great-destinations-video-theme-song', 'https://i.ytimg.com/vi/XWM-6df3KIw/hqdefault.jpg', 'ádasdasd', 'https://www.youtube.com/watch?v=XWM-6df3KIw', '', 6, 0, 4, 0, NULL, 1, 'Pedro, chiến thắng lớn nhất của Chelsea', 'ádasdasdas', '2015-09-25 10:13:45', '2015-09-25 10:13:45');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
