-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2024 at 12:20 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duanmoi`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner_bottoms`
--

CREATE TABLE `banner_bottoms` (
  `id` bigint UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale` decimal(10,2) NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_bottoms`
--

INSERT INTO `banner_bottoms` (`id`, `category`, `name`, `image`, `sale`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Phụ Kiện', 'Kính Mát Louis Vuitton LV Waimea Sunglasses Z1082E', '/storage/banners/img0252.jpg', 1400000.00, 'http://127.0.0.1:8000/shop/phu-kien/kinh-mat-louis-vuitton-lv-waimea-sunglasses-z1082e', '1', '2024-04-23 09:22:31', '2024-04-23 09:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `banner_tops`
--

CREATE TABLE `banner_tops` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_tops`
--

INSERT INTO `banner_tops` (`id`, `name`, `image`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Quần Áo Hot 2024', '/storage/banners/banner-1.jpg', 'http://127.0.0.1:8000/shop', '2024-04-23 08:01:23', '2024-04-23 08:29:16'),
(2, 'Phụ Kiện Hot 2024', '/storage/banners/banner-2.jpg', 'http://127.0.0.1:8000/shop/phu-kien', '2024-04-23 08:01:23', '2024-04-23 08:29:27'),
(3, 'Giày Hot 2024', '/storage/banners/banner-3.jpg', 'http://127.0.0.1:8000/shop/giay', '2024-04-23 08:01:23', '2024-04-23 08:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quote` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `slug`, `image`, `quote`, `content`, `author`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Khám Phá Thế Giới Thời Trang: Hành Trình Tìm Kiếm Phong Cách Cá Nhân', 'kham-pha-the-gioi-thoi-trang-hanh-trinh-tim-kiem-phong-cach-ca-nhan', '/storage/blogs/blog-details.jpg', 'Thời trang không chỉ là việc mặc quần áo, mà còn là cách để chúng ta kể câu chuyện về bản thân mình mà không cần lời.', '<h3><strong>Giới thiệu:</strong></h3>\r\n\r\n<p>Thời trang kh&ocirc;ng chỉ l&agrave; c&aacute;ch để ch&uacute;ng ta biểu đạt bản th&acirc;n m&igrave;nh, m&agrave; c&ograve;n l&agrave; một loại nghệ thuật đầy m&agrave;u sắc, phản &aacute;nh c&aacute; t&iacute;nh v&agrave; c&aacute;i nh&igrave;n về cuộc sống của mỗi người. H&atilde;y c&ugrave;ng t&ocirc;i lắng nghe những c&acirc;u chuyện đằng sau những bộ c&aacute;nh, những xu hướng mới, v&agrave; c&ugrave;ng nhau kh&aacute;m ph&aacute; thế giới th&uacute; vị của thời trang.</p>\r\n\r\n<h3><strong>Điểm đến thời trang:</strong></h3>\r\n\r\n<p><strong>1. Paris - Thủ đ&ocirc; thời trang của thế giới:</strong></p>\r\n\r\n<p>Paris lu&ocirc;n được biết đến như một trung t&acirc;m thời trang h&agrave;ng đầu của thế giới. Từ những nh&agrave; mốt danh tiếng như Chanel, Dior, đến những cửa h&agrave;ng thời trang độc lập, Paris l&agrave; nơi m&agrave; c&aacute;i đẹp được t&ocirc;n vinh v&agrave; biến th&agrave;nh hiện thực tr&ecirc;n những s&agrave;n diễn, trong những cửa h&agrave;ng nhỏ, v&agrave; tr&ecirc;n đường phố s&ocirc;i động.</p>\r\n\r\n<p><strong>2. Tokyo - Sự pha trộn của truyền thống v&agrave; hiện đại:</strong></p>\r\n\r\n<p>Tokyo kh&ocirc;ng chỉ l&agrave; một th&agrave;nh phố sầm uất với nhịp sống nhanh ch&oacute;ng m&agrave; c&ograve;n l&agrave; nơi bạn c&oacute; thể t&igrave;m thấy sự đa dạng v&agrave; s&aacute;ng tạo trong thời trang. Từ những phong c&aacute;ch đường phố c&aacute; nh&acirc;n đến những bộ c&aacute;nh kỳ quặc của những nh&agrave; thiết kế độc lập, Tokyo l&agrave; một điểm đến kh&ocirc;ng thể bỏ qua cho những người y&ecirc;u thời trang.</p>\r\n\r\n<p><strong>3. Milano - Sự sang trọng v&agrave; đẳng cấp:</strong></p>\r\n\r\n<p>Milano l&agrave; qu&ecirc; hương của những thương hiệu thời trang danh tiếng như Gucci, Prada, v&agrave; Versace. Với sự kết hợp tinh tế giữa phong c&aacute;ch cổ điển v&agrave; hiện đại, Milano kh&ocirc;ng chỉ l&agrave; một th&agrave;nh phố, m&agrave; c&ograve;n l&agrave; biểu tượng của sự sang trọng v&agrave; đẳng cấp trong thế giới thời trang.</p>\r\n\r\n<h3><strong>Xu hướng thời trang mới:</strong></h3>\r\n\r\n<p><strong>1. M&agrave;u sắc tươi s&aacute;ng:</strong></p>\r\n\r\n<p>Tr&aacute;i ngược với những gam m&agrave;u trầm lặng của m&ugrave;a thu v&agrave; m&ugrave;a đ&ocirc;ng, m&ugrave;a xu&acirc;n năm nay mang đến những gam m&agrave;u tươi s&aacute;ng như hồng phấn, xanh ngọc, v&agrave; cam neon, tạo n&ecirc;n sự tươi mới v&agrave; s&ocirc;i động cho bộ c&aacute;nh của bạn.</p>\r\n\r\n<p><strong>2. &Aacute;o len lưới:</strong></p>\r\n\r\n<p>&Aacute;o len lưới kh&ocirc;ng chỉ l&agrave; một xu hướng mới mẻ m&agrave; c&ograve;n l&agrave; c&aacute;ch tuyệt vời để tạo ra lớp &aacute;o phụ đầy phong c&aacute;ch cho bất kỳ bộ trang phục n&agrave;o. H&atilde;y thử kết hợp &aacute;o len lưới với &aacute;o thun basic v&agrave; quần jeans để c&oacute; một phong c&aacute;ch đơn giản nhưng vẫn nổi bật.</p>\r\n\r\n<p><strong>3. Đ&ocirc;i gi&agrave;y platform:</strong></p>\r\n\r\n<p>Đ&ocirc;i gi&agrave;y platform kh&ocirc;ng chỉ l&agrave; một phụ kiện thời trang m&agrave; c&ograve;n l&agrave; c&aacute;ch ho&agrave;n hảo để tạo ra sự tự tin v&agrave; phong c&aacute;ch cho bất kỳ bộ trang phục n&agrave;o. Với độ cao của n&oacute;, đ&ocirc;i gi&agrave;y platform sẽ l&agrave;m cho đ&ocirc;i ch&acirc;n của bạn trở n&ecirc;n d&agrave;i hơn v&agrave; thon gọn hơn, đồng thời tạo ra một dấu ấn c&aacute; nh&acirc;n độc đ&aacute;o.</p>\r\n\r\n<h3><strong>Kết luận:</strong></h3>\r\n\r\n<p>Thời trang l&agrave; một cuộc phi&ecirc;u lưu kh&ocirc;ng ngừng nghỉ, nơi bạn c&oacute; thể kh&aacute;m ph&aacute; v&agrave; thể hiện bản th&acirc;n m&igrave;nh th&ocirc;ng qua những bộ c&aacute;nh v&agrave; phụ kiện độc đ&aacute;o. H&atilde;y c&ugrave;ng nhau dấn th&acirc;n v&agrave;o thế giới đầy m&agrave;u sắc v&agrave; s&aacute;ng tạo của thời trang, v&agrave; kh&aacute;m ph&aacute; phong c&aacute;ch c&aacute; nh&acirc;n của ch&iacute;nh bạn!</p>', 'Dương Tuấn', 1, '2024-04-21 23:02:20', '2024-04-22 08:55:43'),
(5, 'Thời Trang - Nghệ Thuật Tự Do và Tự Tin', 'thoi-trang-nghe-thuat-tu-do-va-tu-tin', '/storage/blogs/phong-cach-an-mac-cua-nam-hien-nay.jpg', 'Thời trang không chỉ là việc mặc quần áo, mà còn là cách để tự do biểu đạt bản thân và tỏa sáng với cá tính riêng của mỗi người.', '<h3><strong>Giới thiệu:</strong></h3>\r\n\r\n<p>Thời trang kh&ocirc;ng chỉ đơn thuần l&agrave; việc mặc quần &aacute;o mỗi ng&agrave;y, m&agrave; n&oacute; c&ograve;n l&agrave; một loại nghệ thuật tự do, cho ph&eacute;p mỗi người tự do biểu đạt bản th&acirc;n v&agrave; thể hiện c&aacute; t&iacute;nh th&ocirc;ng qua những lựa chọn trang phục. H&atilde;y c&ugrave;ng nhau kh&aacute;m ph&aacute; c&aacute;ch m&agrave; thời trang kh&ocirc;ng chỉ l&agrave; phản &aacute;nh của văn h&oacute;a, m&agrave; c&ograve;n l&agrave; một phần kh&ocirc;ng thể t&aacute;ch rời của cuộc sống h&agrave;ng ng&agrave;y.</p>\r\n\r\n<h3><strong>Tự Tin Qua Phong C&aacute;ch:</strong></h3>\r\n\r\n<p>Thời trang l&agrave; c&aacute;ch tuyệt vời để tạo ra sự tự tin v&agrave; tự tin ở bản th&acirc;n. Khi ch&uacute;ng ta chọn những bộ trang phục m&agrave; ch&uacute;ng ta cảm thấy thoải m&aacute;i v&agrave; tự tin khi mặc, ch&uacute;ng ta tự đ&aacute;nh thức sự tự tin v&agrave; c&aacute; t&iacute;nh của m&igrave;nh. Điều n&agrave;y kh&ocirc;ng chỉ gi&uacute;p ch&uacute;ng ta tự tin hơn trong giao tiếp, m&agrave; c&ograve;n l&agrave; c&aacute;ch để ch&uacute;ng ta tỏa s&aacute;ng v&agrave; ghi điểm trong mắt người kh&aacute;c.</p>\r\n\r\n<h3><strong>Sự Đa Dạng v&agrave; S&aacute;ng Tạo:</strong></h3>\r\n\r\n<p>Thế giới thời trang l&agrave; một thế giới đa dạng v&agrave; s&aacute;ng tạo, nơi mọi người c&oacute; thể t&igrave;m thấy phong c&aacute;ch của ri&ecirc;ng m&igrave;nh. Từ phong c&aacute;ch đường phố c&aacute; nh&acirc;n đến những bộ c&aacute;nh haute couture tinh tế, thời trang l&agrave; một lĩnh vực m&agrave; bất kỳ ai cũng c&oacute; thể thể hiện sự s&aacute;ng tạo v&agrave; c&aacute; t&iacute;nh của m&igrave;nh.</p>\r\n\r\n<h3><strong>Phản &Aacute;nh Văn H&oacute;a v&agrave; X&atilde; Hội:</strong></h3>\r\n\r\n<p>Thời trang kh&ocirc;ng chỉ l&agrave; về việc mặc quần &aacute;o, m&agrave; c&ograve;n l&agrave; c&aacute;ch để ch&uacute;ng ta phản &aacute;nh văn h&oacute;a v&agrave; x&atilde; hội của ch&uacute;ng ta. Từ những bộ trang phục truyền thống của c&aacute;c d&acirc;n tộc đến những xu hướng thời trang phản &aacute;nh c&aacute;c gi&aacute; trị v&agrave; xu hướng của x&atilde; hội, thời trang l&agrave; một phần kh&ocirc;ng thể thiếu của cuộc sống h&agrave;ng ng&agrave;y.</p>\r\n\r\n<h3><strong>Kết Luận:</strong></h3>\r\n\r\n<p>Thời trang kh&ocirc;ng chỉ l&agrave; việc mặc quần &aacute;o, m&agrave; c&ograve;n l&agrave; một loại nghệ thuật tự do v&agrave; tự tin, cho ph&eacute;p mỗi người tự do biểu đạt bản th&acirc;n v&agrave; thể hiện c&aacute; t&iacute;nh. H&atilde;y c&ugrave;ng nhau thưởng thức v&agrave; kh&aacute;m ph&aacute; thế giới đa dạng v&agrave; s&aacute;ng tạo của thời trang, v&agrave; để ch&uacute;ng ta tự tin tỏa s&aacute;ng trong cuộc sống h&agrave;ng ng&agrave;y!</p>', 'Dương Tuấn', 1, '2024-04-22 09:37:56', '2024-04-22 09:37:56'),
(6, 'Thời Trang và Sự Đổi Mới: Tìm Kiếm Cái Mới Lạ Trong Cuộc Sống', 'thoi-trang-va-su-doi-moi-tim-kiem-cai-moi-la-trong-cuoc-song', '/storage/blogs/top-11-thuong-hieu-thoi-trang-nam-noi-tieng-tai-viet-nam-ma-nam-gioi-can-biet-202101291512111392.jpg', 'Dưới những lớp vải và gam màu, thời trang là ngôn ngữ thầm lặng của cá tính, kể lên câu chuyện không từ ngữ.', '<h3><strong>Giới thiệu:</strong></h3>\r\n\r\n<p>Thời trang kh&ocirc;ng chỉ l&agrave; việc chọn lựa quần &aacute;o mỗi ng&agrave;y, m&agrave; c&ograve;n l&agrave; một phần của cuộc sống đầy m&agrave;u sắc v&agrave; sự đổi mới. Tr&ecirc;n h&agrave;nh tr&igrave;nh n&agrave;y, ch&uacute;ng ta kh&ocirc;ng chỉ t&igrave;m kiếm những bộ trang phục mới mẻ, m&agrave; c&ograve;n l&agrave; c&aacute;ch để tự thể hiện v&agrave; kh&aacute;m ph&aacute; bản th&acirc;n m&igrave;nh qua c&aacute;i mới lạ. H&atilde;y c&ugrave;ng nhau kh&aacute;m ph&aacute; c&aacute;ch thời trang g&oacute;p phần l&agrave;m cho cuộc sống của ch&uacute;ng ta trở n&ecirc;n độc đ&aacute;o v&agrave; phong ph&uacute; hơn.</p>\r\n\r\n<h3><strong>Sự Đổi Mới Trong Thời Trang:</strong></h3>\r\n\r\n<p>Thế giới thời trang lu&ocirc;n chuyển động v&agrave; thay đổi, với những xu hướng mới v&agrave; những &yacute; tưởng s&aacute;ng tạo xuất ph&aacute;t từ khắp nơi tr&ecirc;n thế giới. Từ những bộ trang phục retro được t&aacute;i hiện đến những phong c&aacute;ch đường phố độc đ&aacute;o, thời trang lu&ocirc;n l&agrave; nơi để t&igrave;m kiếm sự đổi mới v&agrave; cảm hứng.</p>\r\n\r\n<h3><strong>Thời Trang v&agrave; Sự Tự Do C&aacute; Nh&acirc;n:</strong></h3>\r\n\r\n<p>Thời trang kh&ocirc;ng chỉ l&agrave; việc l&agrave;m đẹp m&agrave; c&ograve;n l&agrave; c&aacute;ch để ch&uacute;ng ta tự do biểu đạt c&aacute; nh&acirc;n v&agrave; thể hiện c&aacute; t&iacute;nh. Từ c&aacute;ch chọn lựa m&agrave;u sắc, kiểu d&aacute;ng đến c&aacute;ch phối hợp trang phục, mỗi người đều c&oacute; thể tự do s&aacute;ng tạo v&agrave; t&igrave;m ra phong c&aacute;ch ri&ecirc;ng của m&igrave;nh.</p>\r\n\r\n<h3><strong>Thời Trang v&agrave; Sự Tiện &Iacute;ch:</strong></h3>\r\n\r\n<p>Ngo&agrave;i việc l&agrave;m đẹp v&agrave; tự do biểu đạt c&aacute; nh&acirc;n, thời trang cũng đ&oacute;ng vai tr&ograve; quan trọng trong cuộc sống h&agrave;ng ng&agrave;y của ch&uacute;ng ta bằng c&aacute;ch cung cấp sự tiện &iacute;ch v&agrave; thoải m&aacute;i. Từ những bộ trang phục c&ocirc;ng sở thoải m&aacute;i đến những bộ trang phục thể thao linh hoạt, thời trang gi&uacute;p ch&uacute;ng ta tự tin v&agrave; thoải m&aacute;i trong mọi t&igrave;nh huống.</p>\r\n\r\n<h3><strong>Kết Luận:</strong></h3>\r\n\r\n<p>Thời trang kh&ocirc;ng chỉ l&agrave; việc mặc quần &aacute;o, m&agrave; c&ograve;n l&agrave; một phần của cuộc sống đầy m&agrave;u sắc v&agrave; sự đổi mới. H&atilde;y c&ugrave;ng nhau kh&aacute;m ph&aacute; v&agrave; tận hưởng sự đa dạng v&agrave; phong ph&uacute; của thế giới thời trang, v&agrave; để ch&uacute;ng ta lu&ocirc;n t&igrave;m kiếm c&aacute;i mới lạ v&agrave; phong c&aacute;ch c&aacute; nh&acirc;n trong cuộc sống h&agrave;ng ng&agrave;y!</p>', 'Dương Tuấn', 1, '2024-04-22 09:41:29', '2024-04-22 09:41:29'),
(7, 'Thời Trang: Khoảnh Khắc Đặc Biệt Trên Đường Sống', 'thoi-trang-khoanh-khac-dac-biet-tren-duong-song', '/storage/blogs/thoi-trang-nam2.jpg', 'Thời trang không chỉ là việc mặc quần áo, mà còn là cách để ghi lại những khoảnh khắc đáng nhớ và tạo ra những kỷ niệm vĩnh cửu trong cuộc sống.', '<h3><strong>Giới thiệu:</strong></h3>\r\n\r\n<p>Thời trang kh&ocirc;ng chỉ l&agrave; một phần của cuộc sống h&agrave;ng ng&agrave;y, m&agrave; c&ograve;n l&agrave; một loại nghệ thuật đặc biệt, nơi m&agrave; ch&uacute;ng ta c&oacute; thể t&igrave;m thấy những khoảnh khắc đặc biệt v&agrave; &yacute; nghĩa tr&ecirc;n h&agrave;nh tr&igrave;nh của m&igrave;nh. H&atilde;y c&ugrave;ng nhau kh&aacute;m ph&aacute; những c&acirc;u chuyện th&uacute; vị v&agrave; những trải nghiệm đ&aacute;ng nhớ qua thế giới th&uacute; vị của thời trang.</p>\r\n\r\n<h3><strong>H&agrave;nh Tr&igrave;nh C&aacute; Nh&acirc;n:</strong></h3>\r\n\r\n<p>Mỗi người c&oacute; một h&agrave;nh tr&igrave;nh ri&ecirc;ng trong thế giới thời trang, nơi m&agrave; ch&uacute;ng ta t&igrave;m kiếm v&agrave; ph&aacute;t triển phong c&aacute;ch c&aacute; nh&acirc;n của m&igrave;nh. Từ những bước đi đầu ti&ecirc;n trong việc kh&aacute;m ph&aacute; m&igrave;nh qua thời trang cho đến những bước tiếp theo trong việc x&acirc;y dựng v&agrave; thể hiện bản th&acirc;n, mỗi khoảnh khắc trong h&agrave;nh tr&igrave;nh của ch&uacute;ng ta l&agrave; một c&acirc;u chuyện đ&aacute;ng nhớ.</p>\r\n\r\n<h3><strong>Thời Trang v&agrave; Kỷ Niệm:</strong></h3>\r\n\r\n<p>Thời trang kh&ocirc;ng chỉ l&agrave; việc chọn lựa trang phục mỗi ng&agrave;y, m&agrave; c&ograve;n l&agrave; c&aacute;ch để ghi lại những kỷ niệm đặc biệt trong cuộc sống. Từ những chiếc &aacute;o lụa m&agrave;u trắng trong ng&agrave;y cưới đến những đ&ocirc;i gi&agrave;y đầu ti&ecirc;n của đứa trẻ, thời trang l&agrave; một phần của những khoảnh khắc đ&aacute;ng nhớ nhất trong cuộc đời.</p>\r\n\r\n<h3><strong>Sự Tương T&aacute;c v&agrave; Kết Nối:</strong></h3>\r\n\r\n<p>Thế giới thời trang cũng l&agrave; nơi m&agrave; ch&uacute;ng ta c&oacute; thể tương t&aacute;c v&agrave; kết nối với nhau th&ocirc;ng qua sở th&iacute;ch v&agrave; đam m&ecirc; chung. Từ việc chia sẻ những lời khuy&ecirc;n thời trang đến việc kết bạn với những người c&oacute; c&ugrave;ng sở th&iacute;ch, thời trang l&agrave; cầu nối giữa c&aacute;c c&aacute; nh&acirc;n tr&ecirc;n khắp thế giới.</p>\r\n\r\n<h3><strong>Kết Luận:</strong></h3>\r\n\r\n<p>Thời trang kh&ocirc;ng chỉ l&agrave; một phần của cuộc sống h&agrave;ng ng&agrave;y, m&agrave; c&ograve;n l&agrave; một loại nghệ thuật đặc biệt, nơi m&agrave; ch&uacute;ng ta c&oacute; thể t&igrave;m thấy những khoảnh khắc đặc biệt v&agrave; &yacute; nghĩa tr&ecirc;n h&agrave;nh tr&igrave;nh của m&igrave;nh. H&atilde;y c&ugrave;ng nhau kh&aacute;m ph&aacute; v&agrave; tận hưởng những trải nghiệm đ&aacute;ng nhớ qua thế giới th&uacute; vị của thời trang!</p>', 'Dương Tuấn', 1, '2024-04-22 09:43:33', '2024-04-22 09:43:33');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Along', 'along', '2024-04-16 08:35:28', NULL, NULL),
(2, 'Chanel', 'chanel', '2024-04-16 08:35:28', NULL, NULL),
(3, 'Hermès', 'hermes', '2024-04-16 08:35:28', NULL, NULL),
(4, 'Gucci ', 'gucci', '2024-04-16 08:35:28', NULL, NULL),
(5, 'Dior', 'dior', '2024-04-16 08:35:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `size`, `color`, `quantity`, `created_at`, `updated_at`) VALUES
(37, 3, 30, 'SIZE: S', 'MÀU: XÁM', 1, '2024-04-28 22:10:46', '2024-04-28 22:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Áo Polo', 'ao-polo', NULL, '2024-04-16 08:35:53', NULL, NULL),
(2, 'Áo Sơ Mi', 'ao-so-mi', NULL, '2024-04-16 08:35:53', NULL, NULL),
(3, 'Quần', 'quan', NULL, '2024-04-16 08:35:53', '2024-04-21 15:59:18', NULL),
(4, 'Giày', 'giay', NULL, '2024-04-16 08:35:53', NULL, NULL),
(5, 'Phụ Kiện', 'phu-kien', NULL, '2024-04-16 08:35:53', '2024-04-21 17:27:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'MÀU: TRẮNG', '2024-04-16 08:36:01', NULL),
(2, 'MÀU: VÀNG', '2024-04-16 08:36:01', NULL),
(3, 'MÀU: ĐEN', '2024-04-16 08:36:01', NULL),
(4, 'MÀU: LAM', '2024-04-16 08:36:01', NULL),
(5, 'MÀU: LỤC', '2024-04-16 08:36:01', NULL),
(6, 'MÀU: TÍM', '2024-04-16 08:36:01', NULL),
(7, 'MÀU: BE', '2024-04-16 08:36:01', NULL),
(8, 'MÀU: XÁM', '2024-04-16 08:36:01', NULL),
(9, 'MÀU: HỒNG', '2024-04-16 08:36:01', NULL),
(13, 'MÀU: XANH DƯƠNG', '2024-04-20 16:52:03', '2024-04-20 16:52:03'),
(14, 'MÀU: ĐỎ', '2024-04-20 16:55:32', '2024-04-20 16:55:32'),
(15, 'MÀU NÂU', '2024-04-20 16:55:32', '2024-04-20 16:55:32'),
(16, 'MÀU: CAM', '2024-04-20 19:03:36', '2024-04-20 19:03:36'),
(17, 'MÀU: XANH LÁ', '2024-04-20 19:03:36', '2024-04-20 19:03:36'),
(18, 'MÀU: XÁM ĐEN', '2024-04-21 15:33:31', '2024-04-21 15:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'okok', 3, 26, 1, '2024-04-20 03:35:52', '2024-05-02 00:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `note`, `created_at`, `updated_at`) VALUES
(1, 'q', 'q@q', 'q', '2024-04-18 12:11:29', '2024-04-18 12:11:29'),
(2, 'q', 'q@q', 'q', '2024-04-18 12:11:57', '2024-04-18 12:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double(10,2) NOT NULL,
  `min_price` decimal(10,2) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `discount`, `min_price`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'ok', 1000000.00, 2500000.00, '2024-04-02', '2024-04-30', '2024-04-22 23:00:12', '2024-04-29 17:32:13'),
(2, 'giamgia', 100000.00, 250000.00, '2024-04-22', '2024-04-30', NULL, NULL),
(3, 'codevip', 1000000.00, 1100000.00, '2024-04-30', '2024-05-01', '2024-04-29 17:25:53', '2024-04-29 17:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 28, '2024-04-22 15:23:13', '2024-04-22 15:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `product_id`, `created_at`, `updated_at`) VALUES
(25, '/storage/products/img1.jpg', 26, '2024-04-20 16:10:12', '2024-04-20 16:10:12'),
(26, '/storage/products/img11.jpg', 26, '2024-04-20 16:10:12', '2024-04-20 16:10:12'),
(27, '/storage/products/img12.jpg', 26, '2024-04-20 16:10:12', '2024-04-20 16:10:12'),
(28, '/storage/products/img13.jpg', 26, '2024-04-20 16:10:13', '2024-04-20 16:10:13'),
(29, '/storage/products/img2.jpg', 27, '2024-04-20 16:46:34', '2024-04-20 16:46:34'),
(30, '/storage/products/img21.jpg', 27, '2024-04-20 16:46:34', '2024-04-20 16:46:34'),
(31, '/storage/products/img22.jpg', 27, '2024-04-20 16:46:34', '2024-04-20 16:46:34'),
(32, '/storage/products/img23.jpg', 27, '2024-04-20 16:46:34', '2024-04-20 16:46:34'),
(33, '/storage/products/img3.jpg', 28, '2024-04-20 16:49:02', '2024-04-20 16:49:02'),
(34, '/storage/products/img31.jpg', 28, '2024-04-20 16:49:02', '2024-04-20 16:49:02'),
(35, '/storage/products/img32.jpg', 28, '2024-04-20 16:49:02', '2024-04-20 16:49:02'),
(36, '/storage/products/img33.jpg', 28, '2024-04-20 16:49:02', '2024-04-20 16:49:02'),
(37, '/storage/products/img4.jpg', 29, '2024-04-20 16:51:17', '2024-04-20 16:51:17'),
(38, '/storage/products/img41.jpg', 29, '2024-04-20 16:51:17', '2024-04-20 16:51:17'),
(39, '/storage/products/img42.jpg', 29, '2024-04-20 16:51:17', '2024-04-20 16:51:17'),
(40, '/storage/products/img43.jpg', 29, '2024-04-20 16:51:17', '2024-04-20 16:51:17'),
(41, '/storage/products/img5.jpg', 30, '2024-04-20 16:55:32', '2024-04-20 16:55:32'),
(42, '/storage/products/img51.jpg', 30, '2024-04-20 16:55:32', '2024-04-20 16:55:32'),
(43, '/storage/products/img52.jpg', 30, '2024-04-20 16:55:32', '2024-04-20 16:55:32'),
(44, '/storage/products/img53.jpg', 30, '2024-04-20 16:55:32', '2024-04-20 16:55:32'),
(45, '/storage/products/img6.jpg', 31, '2024-04-20 17:03:47', '2024-04-20 17:03:47'),
(46, '/storage/products/img61.jpg', 31, '2024-04-20 17:03:47', '2024-04-20 17:03:47'),
(47, '/storage/products/img62.jpg', 31, '2024-04-20 17:03:47', '2024-04-20 17:03:47'),
(48, '/storage/products/img63.jpg', 31, '2024-04-20 17:03:47', '2024-04-20 17:03:47'),
(49, '/storage/products/img7.jpg', 32, '2024-04-20 19:01:35', '2024-04-20 19:01:35'),
(50, '/storage/products/img71.jpg', 32, '2024-04-20 19:01:35', '2024-04-20 19:01:35'),
(51, '/storage/products/img72.jpg', 32, '2024-04-20 19:01:35', '2024-04-20 19:01:35'),
(52, '/storage/products/img73.jpg', 32, '2024-04-20 19:01:35', '2024-04-20 19:01:35'),
(53, '/storage/products/img8.jpg', 33, '2024-04-20 19:03:36', '2024-04-20 19:03:36'),
(54, '/storage/products/img81.jpg', 33, '2024-04-20 19:03:36', '2024-04-20 19:03:36'),
(55, '/storage/products/img82.jpg', 33, '2024-04-20 19:03:36', '2024-04-20 19:03:36'),
(56, '/storage/products/img83.jpg', 33, '2024-04-20 19:03:36', '2024-04-20 19:03:36'),
(57, '/storage/products/img9.jpg', 34, '2024-04-20 19:06:22', '2024-04-20 19:06:22'),
(58, '/storage/products/img91.jpg', 34, '2024-04-20 19:06:22', '2024-04-20 19:06:22'),
(59, '/storage/products/img10.jpg', 35, '2024-04-20 19:08:22', '2024-04-20 19:08:22'),
(60, '/storage/products/img101.jpg', 35, '2024-04-20 19:08:22', '2024-04-20 19:08:22'),
(61, '/storage/products/img102.jpg', 35, '2024-04-20 19:08:22', '2024-04-20 19:08:22'),
(62, '/storage/products/img103.jpg', 35, '2024-04-20 19:08:22', '2024-04-20 19:08:22'),
(63, '/storage/products/img012.jpg', 37, '2024-04-20 19:13:56', '2024-04-20 19:13:56'),
(64, '/storage/products/img0121.jpg', 37, '2024-04-20 19:13:56', '2024-04-20 19:13:56'),
(65, '/storage/products/img0122.jpg', 37, '2024-04-20 19:13:56', '2024-04-20 19:13:56'),
(66, '/storage/products/img0123.jpg', 37, '2024-04-20 19:13:56', '2024-04-20 19:13:56'),
(67, '/storage/products/img011.jpg', 36, '2024-04-20 19:16:15', '2024-04-20 19:16:15'),
(68, '/storage/products/img0111.jpg', 36, '2024-04-20 19:16:15', '2024-04-20 19:16:15'),
(69, '/storage/products/img0112.jpg', 36, '2024-04-20 19:16:15', '2024-04-20 19:16:15'),
(70, '/storage/products/img0113.jpg', 36, '2024-04-20 19:16:15', '2024-04-20 19:16:15'),
(71, '/storage/products/img013.jpg', 38, '2024-04-21 15:08:11', '2024-04-21 15:08:11'),
(72, '/storage/products/img0131.jpg', 38, '2024-04-21 15:08:11', '2024-04-21 15:08:11'),
(73, '/storage/products/img0132.jpg', 38, '2024-04-21 15:08:11', '2024-04-21 15:08:11'),
(74, '/storage/products/img0133.jpg', 38, '2024-04-21 15:08:11', '2024-04-21 15:08:11'),
(75, '/storage/products/img014.jpg', 39, '2024-04-21 15:10:35', '2024-04-21 15:10:35'),
(76, '/storage/products/img0141.jpg', 39, '2024-04-21 15:10:35', '2024-04-21 15:10:35'),
(77, '/storage/products/img0142.jpg', 39, '2024-04-21 15:10:35', '2024-04-21 15:10:35'),
(78, '/storage/products/img0143.jpg', 39, '2024-04-21 15:10:35', '2024-04-21 15:10:35'),
(79, '/storage/products/img015.jpg', 40, '2024-04-21 15:12:39', '2024-04-21 15:12:39'),
(80, '/storage/products/img0151.jpg', 40, '2024-04-21 15:12:39', '2024-04-21 15:12:39'),
(81, '/storage/products/img0152.jpg', 40, '2024-04-21 15:12:39', '2024-04-21 15:12:39'),
(82, '/storage/products/img0153.jpg', 40, '2024-04-21 15:12:39', '2024-04-21 15:12:39'),
(83, '/storage/products/img016.jpg', 41, '2024-04-21 15:16:54', '2024-04-21 15:16:54'),
(84, '/storage/products/img0161.jpg', 41, '2024-04-21 15:16:54', '2024-04-21 15:16:54'),
(85, '/storage/products/img017.jpg', 42, '2024-04-21 15:18:41', '2024-04-21 15:18:41'),
(86, '/storage/products/img0171.jpg', 42, '2024-04-21 15:18:41', '2024-04-21 15:18:41'),
(87, '/storage/products/img018.jpg', 43, '2024-04-21 15:20:35', '2024-04-21 15:20:35'),
(88, '/storage/products/img0181.jpg', 43, '2024-04-21 15:20:35', '2024-04-21 15:20:35'),
(89, '/storage/products/img019.jpg', 44, '2024-04-21 15:22:32', '2024-04-21 15:22:32'),
(90, '/storage/products/img0191.jpg', 44, '2024-04-21 15:22:32', '2024-04-21 15:22:32'),
(91, '/storage/products/img020.jpg', 45, '2024-04-21 15:24:36', '2024-04-21 15:24:36'),
(92, '/storage/products/img0201.jpg', 45, '2024-04-21 15:24:36', '2024-04-21 15:24:36'),
(93, '/storage/products/img021.jpg', 46, '2024-04-21 15:26:38', '2024-04-21 15:26:38'),
(94, '/storage/products/img0211.jpg', 46, '2024-04-21 15:26:38', '2024-04-21 15:26:38'),
(95, '/storage/products/img0212.jpg', 46, '2024-04-21 15:26:38', '2024-04-21 15:26:38'),
(96, '/storage/products/img0213.jpg', 46, '2024-04-21 15:26:38', '2024-04-21 15:26:38'),
(97, '/storage/products/img022.jpg', 47, '2024-04-21 15:28:06', '2024-04-21 15:28:06'),
(98, '/storage/products/img0221.jpg', 47, '2024-04-21 15:28:06', '2024-04-21 15:28:06'),
(99, '/storage/products/img023.jpg', 48, '2024-04-21 15:30:37', '2024-04-21 15:30:37'),
(100, '/storage/products/img0231.jpg', 48, '2024-04-21 15:30:37', '2024-04-21 15:30:37'),
(101, '/storage/products/img024.jpg', 49, '2024-04-21 15:31:55', '2024-04-21 15:31:55'),
(102, '/storage/products/img0241.jpg', 49, '2024-04-21 15:31:55', '2024-04-21 15:31:55'),
(103, '/storage/products/img025.jpg', 50, '2024-04-21 15:33:31', '2024-04-21 15:33:31'),
(104, '/storage/products/img0251.jpg', 50, '2024-04-21 15:33:31', '2024-04-21 15:33:31'),
(105, '/storage/products/img0252.jpg', 50, '2024-04-21 15:33:31', '2024-04-21 15:33:31'),
(106, '/storage/products/img0253.jpg', 50, '2024-04-21 15:33:31', '2024-04-21 15:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_12_060202_create_categories_table', 1),
(6, '2024_04_12_060510_create_colors_table', 1),
(7, '2024_04_12_060921_create_sizes_table', 1),
(8, '2024_04_12_061110_create_tags_table', 1),
(9, '2024_04_12_061127_create_brands_table', 1),
(10, '2024_04_12_061246_create_products_table', 1),
(11, '2024_04_12_064306_create_galleries_table', 1),
(12, '2024_04_12_120440_create_product_color_table', 1),
(13, '2024_04_12_120535_create_product_size_table', 1),
(14, '2024_04_12_120634_create_product_tag_table', 1),
(15, '2024_04_12_131000_create_carts_table', 1),
(16, '2024_04_18_161218_create_favorites_table', 2),
(17, '2024_04_18_183442_create_contacts_table', 3),
(18, '2024_04_20_102426_create_comments_table', 4),
(19, '2024_04_22_050234_create_blogs_table', 5),
(20, '2024_04_22_224812_create_coupons_table', 6),
(21, '2024_04_23_000310_create_orders_table', 7),
(22, '2024_04_23_000431_create_order_details_table', 7),
(23, '2024_04_23_014038_create_sliders_table', 8),
(24, '2024_04_23_145413_create_banner_tops_table', 9),
(25, '2024_04_23_155359_create_banner_bottoms_table', 10),
(26, '2024_04_24_130526_create_social_networks_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `reason` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `coupon_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `status`, `reason`, `token`, `user_id`, `coupon_id`, `created_at`, `updated_at`) VALUES
(4, 'Dương Tuấn', 'along18901@gmail.com', '12344551111', 'HCM mkjio', 3, NULL, NULL, 3, NULL, '2024-04-09 17:53:41', '2024-04-20 10:56:36'),
(5, 'Dương Tuấn', 'along18901@gmail.com', '12344551111', 'HCM', 2, NULL, NULL, 3, NULL, '2024-04-11 07:52:45', '2024-04-21 10:51:06'),
(6, 'Dương Tuấn', 'along18901@gmail.com', '12344551111', 'HCM', 4, 'Không liên lạc được', NULL, 3, 2, '2024-04-14 09:11:22', '2024-04-29 15:03:36'),
(7, 'Dương Tuấn', 'along18901@gmail.com', '12344551111', 'HCM', 3, NULL, NULL, 3, NULL, '2024-04-13 14:46:36', '2024-04-25 02:58:44'),
(8, 'Dương Tuấn', 'along18901@gmail.com', '12344551111', 'HCM', 2, NULL, NULL, 3, NULL, '2024-04-14 14:46:59', '2024-04-25 05:22:20'),
(9, 'Dương Tuấn', 'along18901@gmail.com', '12344551111', 'HCM', 3, NULL, NULL, 3, 1, '2024-04-15 14:47:31', '2024-04-25 03:01:02'),
(10, 'Dương Tuấn', 'along18901@gmail.com', '12344551111', 'HCM', 1, NULL, NULL, 3, NULL, '2024-04-15 18:46:05', '2024-04-25 02:55:49'),
(11, 'Dương Tuấn', 'along18901@gmail.com', '12344551111', 'HCM', 3, NULL, NULL, 3, NULL, '2024-04-17 00:22:01', '2024-04-25 03:01:24'),
(12, 'Dương Tuấn', 'along18901@gmail.com', '12344551111', 'HCM', 1, NULL, NULL, 3, NULL, '2024-04-18 01:16:55', '2024-04-25 02:56:00'),
(13, 'Dương Tuấn', 'along18901@gmail.com', '12344551111', 'HCM', 3, NULL, NULL, 3, NULL, '2024-04-19 01:18:38', '2024-04-25 03:04:33'),
(14, 'Dương Tuấn', 'along18901@gmail.com', '12344551111', 'HCM', 1, NULL, NULL, 3, NULL, '2024-04-20 01:19:03', '2024-04-25 02:56:10'),
(15, 'Dương Tuấn', 'along18901@gmail.com', '12344551111', 'HCM', 3, NULL, NULL, 3, 2, '2024-04-21 01:19:40', '2024-04-25 02:57:41'),
(16, 'Dương Tuấn', 'along18901@gmail.com', '12344551111', 'HCM', 3, NULL, NULL, 3, NULL, '2024-04-22 01:28:08', '2024-04-25 02:57:30'),
(17, 'Dương Tuấn', 'along18901@gmail.com', '12344551111', 'HCM', 3, NULL, NULL, 3, NULL, '2024-04-23 01:28:28', '2024-04-25 02:57:19'),
(18, 'Dương Tuấn', 'along18901@gmail.com', '12344551111', 'HCM', 3, NULL, NULL, 3, NULL, '2024-04-24 01:28:48', '2024-04-25 02:57:09'),
(19, 'Dương Tuấn', 'along18901@gmail.com', '12344551111', 'HCM', 3, NULL, NULL, 3, NULL, '2024-04-25 01:29:20', '2024-04-25 02:56:58'),
(20, 'Dương Tuấn', 'along18901@gmail.com', '12344551111', 'HCM', 3, NULL, NULL, 3, NULL, '2024-04-25 02:46:56', '2024-04-25 05:29:18'),
(21, 'Dương Tuấn', 'along18901@gmail.com', '12344551111', 'HCM', 0, NULL, 'Iac0zbK4hx5Bo9cqnOJc3TuF2ZRCoemfqXOzr5ng', 3, NULL, '2024-04-25 05:28:36', '2024-04-25 05:28:36'),
(22, 'Dương Tuấn', 'tuanndps27303@fpt.edu.vn', '12344551111', 'HCM', 4, 'Bom hàng', NULL, 4, NULL, '2024-04-25 05:57:24', '2024-04-29 16:47:42'),
(23, 'Dương Tuấn', 'tuanndps27303@fpt.edu.vn', '12344551111', 'hcm city', 3, NULL, NULL, 4, NULL, '2024-04-21 05:59:36', '2024-04-25 06:12:12'),
(24, 'Dương Tuấn', 'tuanndps27303@fpt.edu.vn', '12344551111', 'hcm city', 3, NULL, NULL, 4, NULL, '2024-04-21 06:00:43', '2024-04-25 06:11:59'),
(25, 'Dương Tuấn', 'along18901@gmail.com', '12344551111', 'HCM', 3, NULL, NULL, 3, 2, '2024-04-25 06:32:18', '2024-04-25 06:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `price`, `quantity`, `order_id`, `product_id`) VALUES
(3, 277000.00, 1, 4, 30),
(4, 257000.00, 1, 4, 26),
(5, 457000.00, 1, 5, 44),
(6, 147000.00, 1, 6, 49),
(7, 677000.00, 1, 6, 41),
(8, 677000.00, 1, 7, 41),
(9, 205000.00, 1, 8, 40),
(10, 357000.00, 4, 9, 28),
(11, 221000.00, 1, 10, 39),
(12, 257000.00, 1, 11, 33),
(13, 557000.00, 1, 12, 42),
(14, 257000.00, 4, 13, 26),
(15, 327000.00, 2, 14, 27),
(16, 357000.00, 3, 15, 28),
(17, 277000.00, 1, 16, 29),
(18, 227000.00, 5, 17, 31),
(19, 247000.00, 2, 18, 32),
(20, 347000.00, 2, 19, 36),
(21, 277000.00, 1, 20, 29),
(22, 397000.00, 1, 20, 38),
(23, 67000.00, 1, 21, 46),
(24, 357000.00, 1, 22, 28),
(25, 257000.00, 2, 23, 33),
(26, 327000.00, 1, 24, 27),
(27, 987000.00, 1, 25, 45),
(28, 327000.00, 1, 25, 27),
(29, 347000.00, 1, 25, 36);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `summary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `quantity_available` int DEFAULT NULL,
  `quantity_sold` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `hot` tinyint(1) NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `images`, `price`, `sale_price`, `summary`, `description`, `quantity_available`, `quantity_sold`, `status`, `hot`, `slug`, `brand_id`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(26, 'Áo Sơ Mi Cổ Bẻ Tay Ngắn Sợi Nhân Tạo Thấm Hút Biểu Tượng Dáng Rộng Đơn Giản Seventy Seven 22', '/storage/products/img13.jpg', 257000.00, NULL, 'Chất liệu: Kaki Nhung. Thành phần: 100% Polyester. Bo cổ, bo tay phối viền màu, sử dụng chất liệu bo poly co giãn, áo may rã phối màu , trên vị trí rã in dẻo tạo kiểu', '<p>&Aacute;o sơ mi l&agrave; một phần kh&ocirc;ng thể thiếu trong tủ đồ của mọi người, v&agrave; khi n&oacute;i đến sự kết hợp giữa phong c&aacute;ch v&agrave; tiện &iacute;ch, &aacute;o sơ mi cổ bẻ tay ngắn sợi nh&acirc;n tạo từ Seventy Seven 22 l&agrave; lựa chọn h&agrave;ng đầu.</p>\r\n\r\n<h3>Phong C&aacute;ch Đơn Giản v&agrave; Tinh Tế</h3>\r\n\r\n<p>Seventy Seven 22 kh&ocirc;ng ngừng mang đến những thiết kế s&aacute;ng tạo v&agrave; độc đ&aacute;o. &Aacute;o sơ mi cổ bẻ n&agrave;y kh&ocirc;ng chỉ đơn thuần l&agrave; một m&oacute;n đồ, m&agrave; c&ograve;n l&agrave; biểu tượng của phong c&aacute;ch v&agrave; sự tinh tế. Với đường may tỉ mỉ, cổ bẻ tinh tế v&agrave; kiểu d&aacute;ng rộng r&atilde;i, sản phẩm n&agrave;y tạo ra một vẻ ngo&agrave;i thời trang v&agrave; lịch l&atilde;m, phản &aacute;nh sự chăm s&oacute;c v&agrave; tinh thần s&aacute;ng tạo của nh&atilde;n h&agrave;ng.</p>\r\n\r\n<h3>Sự Tiện &Iacute;ch v&agrave; Thoải M&aacute;i</h3>\r\n\r\n<p>Kh&aacute;c với nhiều loại vải kh&aacute;c, sợi nh&acirc;n tạo trong &aacute;o sơ mi Seventy Seven 22 kh&ocirc;ng chỉ mang lại vẻ đẹp mượt m&agrave; m&agrave; c&ograve;n c&oacute; khả năng thấm h&uacute;t mồ h&ocirc;i tốt, gi&uacute;p bạn lu&ocirc;n cảm thấy thoải m&aacute;i v&agrave; tự tin trong mọi ho&agrave;n cảnh. Đặc biệt, thiết kế tay ngắn gi&uacute;p tạo ra cảm gi&aacute;c tho&aacute;ng đ&atilde;ng v&agrave; m&aacute;t mẻ, ph&ugrave; hợp cho m&ugrave;a h&egrave; n&oacute;ng bức.</p>\r\n\r\n<h3>Sự Lựa Chọn Ho&agrave;n Hảo</h3>\r\n\r\n<p>Với &aacute;o sơ mi cổ bẻ từ Seventy Seven 22, bạn kh&ocirc;ng chỉ sở hữu một m&oacute;n đồ thời trang xuất sắc m&agrave; c&ograve;n l&agrave; một sản phẩm mang lại sự thoải m&aacute;i v&agrave; tiện &iacute;ch h&agrave;ng ng&agrave;y. D&ugrave; l&agrave; để đi l&agrave;m, dạo phố hay tham dự c&aacute;c sự kiện, &aacute;o sơ mi n&agrave;y sẽ l&agrave; sự lựa chọn ho&agrave;n hảo cho phong c&aacute;ch của bạn.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>&Aacute;o sơ mi cổ bẻ tay ngắn sợi nh&acirc;n tạo từ Seventy Seven 22 kh&ocirc;ng chỉ l&agrave; một m&oacute;n đồ thời trang, m&agrave; c&ograve;n l&agrave; biểu tượng của sự kết hợp ho&agrave;n hảo giữa phong c&aacute;ch v&agrave; tiện &iacute;ch. Với thiết kế đơn giản nhưng tinh tế v&agrave; sự thoải m&aacute;i vượt trội, sản phẩm n&agrave;y xứng đ&aacute;ng trở th&agrave;nh một phần kh&ocirc;ng thể thiếu trong tủ đồ của bạn.</p>', NULL, NULL, 1, 0, 'ao-so-mi-co-be-tay-ngan-soi-nhan-tao-tham-hut-bieu-tuong-dang-rong-don-gian-seventy-seven-22', 1, 2, '2024-04-16 08:37:40', '2024-04-23 08:38:47', NULL),
(27, 'Áo Sơ Mi Cổ Bẻ Tay Dài Sợi Cà Phê Ít Nhăn Trơn Dáng Vừa Đơn Giản WRINKLE FREE 13', '/storage/products/img23.jpg', 327000.00, NULL, 'Chất liệu: Sợi cà phê (CAFÉ FABRIC). Thành phần: 50% Coffee 50% Polyester. Odor Control - Kiểm soát mùi. Fast Drying - Nhanh khô, Ice Cool Touch - Làm mát cơ thể', '<h3>Sự Tiện &Iacute;ch của Sợi C&agrave; Ph&ecirc;</h3>\r\n\r\n<p>Sợi c&agrave; ph&ecirc; kh&ocirc;ng chỉ l&agrave; một nguy&ecirc;n liệu bền chắc m&agrave; c&ograve;n c&oacute; khả năng chống nhăn tự nhi&ecirc;n, gi&uacute;p &aacute;o sơ mi lu&ocirc;n giữ được h&igrave;nh d&aacute;ng v&agrave; form d&aacute;ng ban đầu m&agrave; kh&ocirc;ng cần phải l&agrave;m phẳng lại sau mỗi lần giặt. Điều n&agrave;y gi&uacute;p bạn tiết kiệm thời gian v&agrave; c&ocirc;ng sức trong việc bảo quản v&agrave; chăm s&oacute;c đồ c&ocirc;ng sở của m&igrave;nh.</p>\r\n\r\n<h3>Thiết Kế Đơn Giản v&agrave; Trơn D&aacute;ng</h3>\r\n\r\n<p>&Aacute;o sơ mi cổ bẻ WRINKLE FREE 13 kh&ocirc;ng chỉ mang lại sự tiện &iacute;ch m&agrave; c&ograve;n l&agrave; biểu tượng của sự đơn giản v&agrave; thanh lịch. Với thiết kế cổ bẻ v&agrave; tay d&agrave;i, sản phẩm n&agrave;y phản &aacute;nh phong c&aacute;ch lịch l&atilde;m v&agrave; chuy&ecirc;n nghiệp, ph&ugrave; hợp cho cả c&aacute;c buổi họp c&ocirc;ng việc v&agrave; những dịp gặp gỡ bạn b&egrave;.</p>\r\n\r\n<h3>Sự Lựa Chọn Th&ocirc;ng Minh v&agrave; Bền Bỉ</h3>\r\n\r\n<p>Với &aacute;o sơ mi cổ bẻ từ d&ograve;ng WRINKLE FREE 13, bạn kh&ocirc;ng chỉ sở hữu một m&oacute;n đồ thời trang xuất sắc m&agrave; c&ograve;n l&agrave; một sản phẩm mang lại sự thoải m&aacute;i v&agrave; tiện &iacute;ch h&agrave;ng ng&agrave;y. Sự kết hợp giữa chất lượng v&agrave; tiện &iacute;ch l&agrave; điều m&agrave; sản phẩm n&agrave;y hướng đến, đảm bảo bạn lu&ocirc;n tự tin v&agrave; thoải m&aacute;i trong mọi ho&agrave;n cảnh.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>&Aacute;o sơ mi cổ bẻ tay d&agrave;i sợi c&agrave; ph&ecirc; từ d&ograve;ng WRINKLE FREE 13 l&agrave; sự lựa chọn th&ocirc;ng minh cho những ai đang t&igrave;m kiếm sự kết hợp giữa tiện &iacute;ch v&agrave; phong c&aacute;ch. Với khả năng chống nhăn độc đ&aacute;o v&agrave; thiết kế đơn giản nhưng lịch l&atilde;m, sản phẩm n&agrave;y đem đến sự thoải m&aacute;i v&agrave; tự tin cho người mặc, phản &aacute;nh sự tinh tế v&agrave; sự chăm s&oacute;c đến từ nh&agrave; sản xuất.</p>', NULL, NULL, 1, 0, 'ao-so-mi-co-be-tay-dai-soi-ca-phe-it-nhan-tron-dang-vua-don-gian-wrinkle-free-13', 2, 2, '2024-04-16 08:37:40', '2024-04-20 16:46:34', NULL),
(28, 'Áo Sơ Mi Cổ Bẻ Tay Ngắn Vải Cotton Thấm Hút Biểu Tượng Dáng Rộng BST Thiết Kế ONE PIECE 30', '/storage/products/img33.jpg', 357000.00, NULL, 'Chất liệu: Sợi cà phê (CAFÉ FABRIC). Thành phần: 50% Coffee 50% Polyester. Odor Control - sử dụng chất liệu bo poly co giãn, áo may rã phối màu , trên vị trí rã in dẻo tạo kiểu', '<h3>Sự Độc Đ&aacute;o của Thiết Kế ONE PIECE 30</h3>\r\n\r\n<p>BST Thiết Kế ONE PIECE 30 lu&ocirc;n nổi bật với sự độc đ&aacute;o v&agrave; tinh tế trong từng chi tiết. &Aacute;o sơ mi cổ bẻ tay ngắn từ bộ sưu tập n&agrave;y kh&ocirc;ng chỉ l&agrave; một m&oacute;n đồ thời trang, m&agrave; c&ograve;n l&agrave; biểu tượng của phong c&aacute;ch v&agrave; c&aacute;i đẹp ri&ecirc;ng biệt. Với d&aacute;ng rộng v&agrave; đường may tỉ mỉ, sản phẩm n&agrave;y chắc chắn sẽ l&agrave;m h&agrave;i l&ograve;ng người mặc ngay từ &aacute;nh nh&igrave;n đầu ti&ecirc;n.</p>\r\n\r\n<h3>Sự Thoải M&aacute;i v&agrave; Tiện &Iacute;ch của Vải Cotton</h3>\r\n\r\n<p>Vải cotton l&agrave; lựa chọn l&yacute; tưởng cho &aacute;o sơ mi với khả năng thấm h&uacute;t mồ h&ocirc;i tốt v&agrave; cảm gi&aacute;c mềm mại tr&ecirc;n da. &Aacute;o sơ mi cổ bẻ tay ngắn từ BST Thiết Kế ONE PIECE 30 kh&ocirc;ng chỉ mang lại sự thoải m&aacute;i m&agrave; c&ograve;n gi&uacute;p bạn lu&ocirc;n cảm thấy tự tin v&agrave; thoải m&aacute;i trong mọi ho&agrave;n cảnh, từ c&ocirc;ng việc đến những buổi gặp gỡ bạn b&egrave;.</p>\r\n\r\n<h3>Sự Lựa Chọn Cho Phong C&aacute;ch Ho&agrave;n Hảo</h3>\r\n\r\n<p>Với &aacute;o sơ mi cổ bẻ từ BST Thiết Kế ONE PIECE 30, bạn kh&ocirc;ng chỉ c&oacute; được một sản phẩm thời trang xuất sắc m&agrave; c&ograve;n l&agrave; một lựa chọn cho phong c&aacute;ch ho&agrave;n hảo. D&ugrave; bạn l&agrave; người y&ecirc;u thời trang cổ điển hay hiện đại, sản phẩm n&agrave;y đều l&agrave; một sự bổ sung tuyệt vời cho tủ đồ của bạn.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>&Aacute;o sơ mi cổ bẻ tay ngắn vải cotton từ BST Thiết Kế ONE PIECE 30 kh&ocirc;ng chỉ l&agrave; một m&oacute;n đồ thời trang m&agrave; c&ograve;n l&agrave; biểu tượng của sự kết hợp ho&agrave;n hảo giữa phong c&aacute;ch v&agrave; tiện &iacute;ch. Với chất liệu vải cotton thấm h&uacute;t v&agrave; thiết kế độc đ&aacute;o, sản phẩm n&agrave;y chắc chắn sẽ l&agrave;m h&agrave;i l&ograve;ng người mặc v&agrave; l&agrave; điểm nhấn cho phong c&aacute;ch của bạn.</p>', NULL, NULL, 1, 1, 'ao-so-mi-co-be-tay-ngan-vai-cotton-tham-hut-bieu-tuong-dang-rong-bst-thiet-ke-one-piece-30', 3, 2, '2024-04-16 08:37:40', '2024-04-20 16:49:02', NULL),
(29, 'Áo Sơ Mi Cổ Bẻ Tay Ngắn Sợi Modal Mặc Nhẹ Trơn Dáng Rộng Đơn Giản WRINKLE FREE 05', '/storage/products/img43.jpg', 277000.00, NULL, 'Chất liệu Modal Poly kết hợp 12% Modal và 88% Polyester. Với tính năng kháng khuẩn, nó giúp ngăn chặn sự phát triển của vi khuẩn. Đồng thời, chất liệu này cũng có khả năng thoáng mát, giúp cơ thể luôn cảm thấy dễ chịu trong mọi điều kiện.', '<h3>Sợi Modal - Chất Liệu Mềm Mại v&agrave; Mặc Nhẹ</h3>\r\n\r\n<p>Sợi modal l&agrave; một lựa chọn tuyệt vời cho &aacute;o sơ mi với đặc t&iacute;nh mềm mại v&agrave; tho&aacute;ng kh&iacute;. Sự kết hợp giữa sợi modal v&agrave; thiết kế cổ bẻ tay ngắn từ d&ograve;ng WRINKLE FREE 05 tạo n&ecirc;n một sản phẩm vừa mang lại cảm gi&aacute;c mặc nhẹ m&agrave; c&ograve;n giữ được vẻ đẹp tự nhi&ecirc;n của chất liệu.</p>\r\n\r\n<h3>Thiết Kế Đơn Giản v&agrave; Trơn D&aacute;ng</h3>\r\n\r\n<p>&Aacute;o sơ mi cổ bẻ WRINKLE FREE 05 mang lại vẻ đẹp đơn giản v&agrave; thanh lịch. Với d&aacute;ng rộng v&agrave; form d&aacute;ng trơn d&aacute;ng, sản phẩm n&agrave;y phản &aacute;nh sự tinh tế v&agrave; sự chăm s&oacute;c đến từ nh&agrave; sản xuất, gi&uacute;p bạn tự tin v&agrave; thoải m&aacute;i trong mọi ho&agrave;n cảnh.</p>\r\n\r\n<h3>Sự Tiện &Iacute;ch của C&ocirc;ng Nghệ WRINKLE FREE</h3>\r\n\r\n<p>C&ocirc;ng nghệ WRINKLE FREE gi&uacute;p &aacute;o sơ mi giữ được h&igrave;nh d&aacute;ng v&agrave; form d&aacute;ng ban đầu m&agrave; kh&ocirc;ng cần phải l&agrave;m phẳng lại sau mỗi lần giặt. Điều n&agrave;y gi&uacute;p bạn tiết kiệm thời gian v&agrave; c&ocirc;ng sức trong việc bảo quản v&agrave; chăm s&oacute;c đồ c&ocirc;ng sở của m&igrave;nh.</p>\r\n\r\n<h3>Sự Lựa Chọn Cho Phong C&aacute;ch Ho&agrave;n Hảo</h3>\r\n\r\n<p>Với &aacute;o sơ mi cổ bẻ từ d&ograve;ng WRINKLE FREE 05, bạn kh&ocirc;ng chỉ c&oacute; được một sản phẩm thời trang xuất sắc m&agrave; c&ograve;n l&agrave; một lựa chọn cho phong c&aacute;ch ho&agrave;n hảo. D&ugrave; bạn l&agrave; người y&ecirc;u thời trang cổ điển hay hiện đại, sản phẩm n&agrave;y đều l&agrave; một sự bổ sung tuyệt vời cho tủ đồ của bạn.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>&Aacute;o sơ mi cổ bẻ tay ngắn sợi modal từ d&ograve;ng WRINKLE FREE 05 l&agrave; sự lựa chọn ho&agrave;n hảo cho những ai đang t&igrave;m kiếm sự kết hợp giữa tiện &iacute;ch v&agrave; phong c&aacute;ch. Với chất liệu mềm mại, thiết kế đơn giản v&agrave; c&ocirc;ng nghệ WRINKLE FREE, sản phẩm n&agrave;y sẽ l&agrave;m h&agrave;i l&ograve;ng người mặc v&agrave; l&agrave; điểm nhấn cho phong c&aacute;ch của bạn.</p>', NULL, NULL, 1, 0, 'ao-so-mi-co-be-tay-ngan-soi-modal-mac-nhe-tron-dang-rong-don-gian-wrinkle-free-05', 4, 2, '2024-04-16 08:37:40', '2024-04-20 16:51:17', NULL),
(30, 'Áo Sơ Mi Cổ Bẻ Tay Dài Vải Cotton Thấm Hút Trơn Dáng Rộng Đơn Giản Y2010 Originals Ver40', '/storage/products/img53.jpg', 397000.00, 277000.00, 'Áo sơ mi tay dài đơn giản Y Nguyên Bản Ver40 được làm từ chất liệu Cotton Flannel Fabric, đặc trưng bởi thành phần 100% cotton. Với khả năng thoát mồ hôi nhanh chóng, giữ cơ thể luôn mát mẻ và khô thoáng. Đồng thời, với khả năng hạn chế nhăn, co rút và giữ màu tốt, việc giặt giũ trở nên dễ dàng hơn.', '<h3>Thiết Kế Đơn Giản v&agrave; Trơn D&aacute;ng</h3>\r\n\r\n<p>&Aacute;o sơ mi từ bộ sưu tập Y2010 Originals Ver40 nổi bật với thiết kế đơn giản v&agrave; d&aacute;ng rộng trơn d&aacute;ng, tạo n&ecirc;n vẻ đẹp thanh lịch v&agrave; sang trọng. Với đường may tỉ mỉ v&agrave; chất liệu cotton cao cấp, sản phẩm n&agrave;y kh&ocirc;ng chỉ l&agrave; lựa chọn tuyệt vời cho c&aacute;c buổi gặp gỡ c&ocirc;ng việc m&agrave; c&ograve;n ph&ugrave; hợp cho những dịp thường ng&agrave;y.</p>\r\n\r\n<h3>Chất Liệu Cotton Thấm H&uacute;t v&agrave; Mềm Mại</h3>\r\n\r\n<p>Chất liệu cotton l&agrave; lựa chọn ưa th&iacute;ch của nhiều người với khả năng thấm h&uacute;t mồ h&ocirc;i tốt v&agrave; cảm gi&aacute;c mềm mại tr&ecirc;n da. &Aacute;o sơ mi cổ bẻ tay d&agrave;i từ Y2010 Originals Ver40 kh&ocirc;ng chỉ mang lại sự thoải m&aacute;i m&agrave; c&ograve;n gi&uacute;p bạn lu&ocirc;n cảm thấy tự tin v&agrave; thoải m&aacute;i trong mọi ho&agrave;n cảnh.</p>\r\n\r\n<h3>Sự Lựa Chọn Cho Phong C&aacute;ch Ho&agrave;n Hảo</h3>\r\n\r\n<p>Với &aacute;o sơ mi cổ bẻ từ Y2010 Originals Ver40, bạn c&oacute; được một sản phẩm thời trang đẳng cấp v&agrave; tiện &iacute;ch. D&ugrave; bạn l&agrave; người y&ecirc;u thời trang cổ điển hay hiện đại, sản phẩm n&agrave;y đều l&agrave; một sự bổ sung tuyệt vời cho tủ đồ của bạn, phản &aacute;nh sự tinh tế v&agrave; sự chăm s&oacute;c đến từ nh&agrave; sản xuất.</p>\r\n\r\n<h3>Sự Độc Đ&aacute;o của Y2010 Originals Ver40</h3>\r\n\r\n<p>Bộ sưu tập Y2010 Originals Ver40 kh&ocirc;ng ngừng mang lại những thiết kế độc đ&aacute;o v&agrave; tinh tế. &Aacute;o sơ mi cổ bẻ tay d&agrave;i vải cotton kh&ocirc;ng chỉ l&agrave; một m&oacute;n đồ thời trang, m&agrave; c&ograve;n l&agrave; biểu tượng của phong c&aacute;ch v&agrave; sự tiện &iacute;ch, phản &aacute;nh sự độc đ&aacute;o v&agrave; c&aacute;i mới mẻ trong thế giới thời trang.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>&Aacute;o sơ mi cổ bẻ tay d&agrave;i vải cotton từ bộ sưu tập Y2010 Originals Ver40 l&agrave; sự kết hợp l&yacute; tưởng giữa phong c&aacute;ch v&agrave; tiện &iacute;ch. Với thiết kế đơn giản, chất liệu cotton thấm h&uacute;t v&agrave; d&aacute;ng rộng trơn d&aacute;ng, sản phẩm n&agrave;y sẽ l&agrave;m h&agrave;i l&ograve;ng người mặc v&agrave; l&agrave; điểm nhấn cho phong c&aacute;ch của bạn.</p>', NULL, NULL, 1, 0, 'ao-so-mi-co-be-tay-dai-vai-cotton-tham-hut-tron-dang-rong-don-gian-y2010-originals-ver40', 5, 2, '2024-04-16 08:37:40', '2024-04-20 16:55:32', NULL),
(31, 'Áo Polo Cổ Bẻ Tay Ngắn Vải Cá Sấu 4 Chiều Thấm Hút Biểu Tượng Dáng Vừa Giá Tốt Seventy Seven 19', '/storage/products/img63.jpg', 227000.00, NULL, 'Chất liệu Thun Cá Sấu Poly 4C bao gồm 95% Polyester và 5% Spandex, tạo nên tính đàn hồi và co giãn. Áo có bo cổ và bo tay được phối viền màu, sử dụng chất liệu bo poly co giãn, tạo sự thoải mái và phong cách. Với kỹ thuật in dẻo, áo được thiết kế với rã phối màu và in dẻo tạo kiểu trên vị trí rã. ', '<h3>Khả Năng Thấm H&uacute;t v&agrave; Đ&agrave;n Hồi của Vải C&aacute; Sấu 4 Chiều</h3>\r\n\r\n<p>Chất liệu vải c&aacute; sấu 4 chiều kh&ocirc;ng chỉ mang lại cảm gi&aacute;c mềm mại v&agrave; thoải m&aacute;i m&agrave; c&ograve;n c&oacute; khả năng thấm h&uacute;t mồ h&ocirc;i tốt. &Aacute;o polo cổ bẻ từ Seventy Seven 19 được l&agrave;m từ vải c&aacute; sấu 4 chiều, gi&uacute;p bạn lu&ocirc;n cảm thấy tự tin v&agrave; thoải m&aacute;i trong mọi ho&agrave;n cảnh, từ c&ocirc;ng việc đến c&aacute;c hoạt động ngoại &ocirc;.</p>\r\n\r\n<h3>Thiết Kế D&aacute;ng Vừa v&agrave; Cổ Bẻ Tay Ngắn</h3>\r\n\r\n<p>Với d&aacute;ng vừa v&agrave; cổ bẻ tay ngắn, &aacute;o polo từ Seventy Seven 19 tạo ra sự kh&aacute;c biệt v&agrave; phong c&aacute;ch ri&ecirc;ng biệt cho người mặc. D&aacute;ng vừa kh&ocirc;ng qu&aacute; &ocirc;m s&aacute;t nhưng cũng kh&ocirc;ng qu&aacute; rộng r&atilde;i, tạo n&ecirc;n sự thoải m&aacute;i v&agrave; lịch l&atilde;m trong mọi t&igrave;nh huống.</p>\r\n\r\n<h3>Sự Tiện &Iacute;ch v&agrave; Gi&aacute; Cả Hợp L&yacute;</h3>\r\n\r\n<p>&Aacute;o polo cổ bẻ từ Seventy Seven 19 kh&ocirc;ng chỉ mang lại sự thoải m&aacute;i v&agrave; phong c&aacute;ch m&agrave; c&ograve;n c&oacute; gi&aacute; cả hợp l&yacute;. Điều n&agrave;y l&agrave;m cho sản phẩm trở th&agrave;nh lựa chọn l&yacute; tưởng cho những ai đang t&igrave;m kiếm sự kết hợp giữa chất lượng v&agrave; gi&aacute; trị.</p>\r\n\r\n<h3>Biểu Tượng của Phong C&aacute;ch v&agrave; Sự Tiện &Iacute;ch</h3>\r\n\r\n<p>Với &aacute;o polo cổ bẻ tay ngắn từ Seventy Seven 19, bạn kh&ocirc;ng chỉ c&oacute; được một m&oacute;n đồ thời trang xuất sắc m&agrave; c&ograve;n l&agrave; biểu tượng của sự tiện &iacute;ch v&agrave; phong c&aacute;ch. Sản phẩm n&agrave;y l&agrave; sự kết hợp ho&agrave;n hảo giữa chất lượng, gi&aacute; trị v&agrave; phong c&aacute;ch, đ&aacute;p ứng mọi nhu cầu của người mặc.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>&Aacute;o polo cổ bẻ tay ngắn vải c&aacute; sấu 4 chiều từ Seventy Seven 19 l&agrave; sự lựa chọn đ&aacute;ng gi&aacute; cho những ai đang t&igrave;m kiếm sự kết hợp giữa phong c&aacute;ch v&agrave; tiện &iacute;ch. Với khả năng thấm h&uacute;t, d&aacute;ng vừa v&agrave; gi&aacute; cả hợp l&yacute;, sản phẩm n&agrave;y sẽ l&agrave;m h&agrave;i l&ograve;ng người mặc v&agrave; l&agrave; điểm nhấn cho phong c&aacute;ch của bạn.</p>', NULL, NULL, 1, 0, 'ao-polo-co-be-tay-ngan-vai-ca-sau-4-chieu-tham-hut-bieu-tuong-dang-vua-gia-tot-seventy-seven-19', 1, 1, '2024-04-16 08:37:40', '2024-04-20 17:03:47', NULL),
(32, 'Áo Polo Cổ Bẻ Tay Ngắn Vải Cotton 2 Chiều Thấm Hút Phối Màu Dáng Rộng Đơn Giản Seventy Seven 02', '/storage/products/img73.jpg', 247000.00, NULL, 'Chất liệu Cotton Uni được chọn với tính năng thấm hút tốt và thoáng mát, giúp cơ thể luôn cảm thấy thoải mái. Kỹ thuật in cao được áp dụng để tạo ra các họa tiết chất lượng cao trên sản phẩm. Đây là một áo thun Polo, được thiết kế với bo cổ và trụ sử dụng bo Poly có màu sắc khác nhau', '<h3>Chất Liệu Cotton 2 Chiều Thấm H&uacute;t</h3>\r\n\r\n<p>Vải cotton 2 chiều l&agrave; lựa chọn ho&agrave;n hảo cho &aacute;o polo với khả năng thấm h&uacute;t mồ h&ocirc;i tốt v&agrave; độ bền cao. &Aacute;o polo từ Seventy Seven 02 được l&agrave;m từ vải cotton 2 chiều, mang lại cảm gi&aacute;c thoải m&aacute;i v&agrave; mềm mại cho người mặc, đồng thời gi&uacute;p duy tr&igrave; sự kh&ocirc; r&aacute;o trong suốt cả ng&agrave;y.</p>\r\n\r\n<h3>Phối M&agrave;u Tinh Tế</h3>\r\n\r\n<p>Sự kết hợp m&agrave;u sắc tinh tế l&agrave; điểm nhấn của &aacute;o polo Seventy Seven 02. Việc phối m&agrave;u h&agrave;i h&ograve;a v&agrave; tinh tế gi&uacute;p tạo n&ecirc;n vẻ đẹp độc đ&aacute;o v&agrave; c&aacute; t&iacute;nh, phản &aacute;nh sự chăm s&oacute;c v&agrave; tinh thần s&aacute;ng tạo của thương hiệu.</p>\r\n\r\n<h3>D&aacute;ng Rộng Đơn Giản</h3>\r\n\r\n<p>Với d&aacute;ng rộng đơn giản, &aacute;o polo từ Seventy Seven 02 mang lại sự thoải m&aacute;i v&agrave; tự do vận động cho người mặc. D&aacute;ng rộng cũng tạo điểm nhấn phong c&aacute;ch v&agrave; hiện đại, phản &aacute;nh sự tự tin v&agrave; phong th&aacute;i của người mặc.</p>\r\n\r\n<h3>Sự Lựa Chọn Cho Phong C&aacute;ch H&agrave;ng Ng&agrave;y</h3>\r\n\r\n<p>Với &aacute;o polo cổ bẻ từ Seventy Seven 02, bạn c&oacute; được một m&oacute;n đồ thời trang ph&ugrave; hợp cho mọi ho&agrave;n cảnh. D&ugrave; l&agrave; đi l&agrave;m, đi chơi hay tham gia c&aacute;c hoạt động ngoại &ocirc;, sản phẩm n&agrave;y lu&ocirc;n l&agrave; sự lựa chọn ho&agrave;n hảo cho phong c&aacute;ch h&agrave;ng ng&agrave;y của bạn.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>&Aacute;o polo cổ bẻ tay ngắn vải cotton 2 chiều từ Seventy Seven 02 l&agrave; sự kết hợp ho&agrave;n hảo giữa phong c&aacute;ch v&agrave; tiện &iacute;ch. Với chất liệu thấm h&uacute;t, phối m&agrave;u tinh tế v&agrave; d&aacute;ng rộng đơn giản, sản phẩm n&agrave;y sẽ l&agrave;m h&agrave;i l&ograve;ng người mặc v&agrave; l&agrave; điểm nhấn cho phong c&aacute;ch của bạn.</p>', NULL, NULL, 1, 0, 'ao-polo-co-be-tay-ngan-vai-cotton-2-chieu-tham-hut-phoi-mau-dang-rong-don-gian-seventy-seven-02', 2, 1, '2024-04-16 08:37:40', '2024-04-20 19:01:35', NULL),
(33, 'Áo Polo Cổ Bẻ Tay Ngắn Vải Cá Sấu 4 Chiều Thoáng Mát Biểu Tượng Dáng Vừa Đơn Giản PREMIUM 30', '/storage/products/img83.jpg', 257000.00, NULL, 'Chất liệu Cá Sấu Cotna, với thành phần 95% Polyester và 5% Spandex, không chỉ mang lại sự thoải mái nhờ ít vón cục và khả năng nhanh khô, mà còn thân thiện với môi trường và thoáng khí. Kỹ thuật thêu 2D được áp dụng, tạo ra các họa tiết chất lượng cao trên sản phẩm.', '<h3>Chất Liệu Vải C&aacute; Sấu 4 Chiều Tho&aacute;ng M&aacute;t</h3>\r\n\r\n<p>Vải c&aacute; sấu 4 chiều l&agrave; lựa chọn l&yacute; tưởng cho &aacute;o polo với khả năng co gi&atilde;n v&agrave; tho&aacute;ng m&aacute;t. Sản phẩm từ d&ograve;ng PREMIUM 30 được l&agrave;m từ chất liệu n&agrave;y, gi&uacute;p bạn cảm thấy thoải m&aacute;i v&agrave; tự tin trong mọi ho&agrave;n cảnh, từ c&ocirc;ng việc đến c&aacute;c hoạt động ngoại &ocirc;.</p>\r\n\r\n<h3>Thiết Kế Đơn Giản v&agrave; D&aacute;ng Vừa</h3>\r\n\r\n<p>&Aacute;o polo từ PREMIUM 30 mang đến vẻ đẹp đơn giản v&agrave; lịch l&atilde;m. Với d&aacute;ng vừa, sản phẩm n&agrave;y kh&ocirc;ng qu&aacute; &ocirc;m s&aacute;t nhưng cũng kh&ocirc;ng qu&aacute; rộng r&atilde;i, tạo n&ecirc;n sự thoải m&aacute;i v&agrave; phong c&aacute;ch ri&ecirc;ng biệt cho người mặc.</p>\r\n\r\n<h3>Sự Biểu Tượng của PREMIUM 30</h3>\r\n\r\n<p>D&ograve;ng PREMIUM 30 lu&ocirc;n nổi tiếng với sự tinh tế v&agrave; chất lượng. &Aacute;o polo cổ bẻ tay ngắn từ d&ograve;ng n&agrave;y kh&ocirc;ng chỉ l&agrave; một m&oacute;n đồ thời trang m&agrave; c&ograve;n l&agrave; biểu tượng của phong c&aacute;ch v&agrave; sự thoải m&aacute;i, phản &aacute;nh sự chăm s&oacute;c v&agrave; tinh thần s&aacute;ng tạo từ thương hiệu.</p>\r\n\r\n<h3>Sự Lựa Chọn Cho Phong C&aacute;ch Ho&agrave;n Hảo</h3>\r\n\r\n<p>Với &aacute;o polo cổ bẻ từ PREMIUM 30, bạn c&oacute; được một sản phẩm thời trang xuất sắc v&agrave; tiện &iacute;ch. D&ugrave; bạn l&agrave; người y&ecirc;u thời trang cổ điển hay hiện đại, sản phẩm n&agrave;y đều l&agrave; một sự bổ sung tuyệt vời cho tủ đồ của bạn, phản &aacute;nh sự tự tin v&agrave; phong c&aacute;ch của bạn.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>&Aacute;o polo cổ bẻ tay ngắn vải c&aacute; sấu 4 chiều từ d&ograve;ng PREMIUM 30 l&agrave; sự kết hợp ho&agrave;n hảo giữa phong c&aacute;ch v&agrave; sự thoải m&aacute;i. Với chất liệu tho&aacute;ng m&aacute;t, thiết kế đơn giản v&agrave; d&aacute;ng vừa, sản phẩm n&agrave;y sẽ l&agrave;m h&agrave;i l&ograve;ng người mặc v&agrave; l&agrave; điểm nhấn cho phong c&aacute;ch của bạn.</p>', NULL, NULL, 1, 1, 'ao-polo-co-be-tay-ngan-vai-ca-sau-4-chieu-thoang-mat-bieu-tuong-dang-vua-don-gian-premium-30', 3, 1, '2024-04-16 08:37:40', '2024-04-20 19:03:36', NULL),
(34, 'Áo Polo Cổ Bẻ Tay Ngắn Sợi Nhân Tạo Thoáng Mát Trơn Dáng Vừa Đơn Giản Gu Tối Giản M18', '/storage/products/img9.jpg', 397000.00, 193000.00, 'Chất liệu Seamless Polyamide Spandex là sự kết hợp hoàn hảo giữa 60% Polyamide và 40% Spandex, mang lại nhiều tính năng ưu việt. Công nghệ Seamless giúp giảm thiểu đường may, tạo ra sản phẩm liền mạch, mang lại cảm giác thoải mái nhất khi mặc.', '<h3>Chất Liệu Sợi Nh&acirc;n Tạo Tho&aacute;ng M&aacute;t</h3>\r\n\r\n<p>Chất liệu sợi nh&acirc;n tạo l&agrave; sự lựa chọn l&yacute; tưởng cho &aacute;o polo với khả năng tho&aacute;ng m&aacute;t v&agrave; dễ chăm s&oacute;c. &Aacute;o polo từ bộ sưu tập Gu Tối Giản M18 được l&agrave;m từ chất liệu n&agrave;y, gi&uacute;p bạn cảm thấy thoải m&aacute;i v&agrave; tự tin trong mọi ho&agrave;n cảnh.</p>\r\n\r\n<h3>Thiết Kế Đơn Giản v&agrave; D&aacute;ng Vừa</h3>\r\n\r\n<p>Với thiết kế đơn giản v&agrave; d&aacute;ng vừa, &aacute;o polo Gu Tối Giản M18 mang đến vẻ đẹp lịch l&atilde;m v&agrave; tinh tế. D&aacute;ng vừa kh&ocirc;ng qu&aacute; &ocirc;m s&aacute;t nhưng cũng kh&ocirc;ng qu&aacute; rộng r&atilde;i, tạo n&ecirc;n sự thoải m&aacute;i v&agrave; phong c&aacute;ch ri&ecirc;ng biệt cho người mặc.</p>\r\n\r\n<h3>Phong C&aacute;ch Tối Giản của Gu Tối Giản</h3>\r\n\r\n<p>Bộ sưu tập Gu Tối Giản lu&ocirc;n ch&uacute; trọng đến sự đơn giản v&agrave; tối giản trong thiết kế. &Aacute;o polo cổ bẻ tay ngắn từ d&ograve;ng n&agrave;y kh&ocirc;ng chỉ l&agrave; một m&oacute;n đồ thời trang m&agrave; c&ograve;n l&agrave; biểu tượng của phong c&aacute;ch v&agrave; thoải m&aacute;i, phản &aacute;nh sự tinh tế v&agrave; đẳng cấp.</p>\r\n\r\n<h3>Lựa Chọn Cho Phong C&aacute;ch H&agrave;ng Ng&agrave;y</h3>\r\n\r\n<p>Với &aacute;o polo cổ bẻ từ Gu Tối Giản M18, bạn c&oacute; được một sản phẩm thời trang xuất sắc v&agrave; tiện &iacute;ch. D&ugrave; bạn l&agrave; người y&ecirc;u thời trang cổ điển hay hiện đại, sản phẩm n&agrave;y đều l&agrave; một sự bổ sung tuyệt vời cho tủ đồ của bạn, phản &aacute;nh sự tự tin v&agrave; phong c&aacute;ch của bạn.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>&Aacute;o polo cổ bẻ tay ngắn sợi nh&acirc;n tạo từ bộ sưu tập Gu Tối Giản M18 l&agrave; sự kết hợp ho&agrave;n hảo giữa phong c&aacute;ch v&agrave; thoải m&aacute;i. Với chất liệu tho&aacute;ng m&aacute;t, thiết kế đơn giản v&agrave; d&aacute;ng vừa, sản phẩm n&agrave;y sẽ l&agrave;m h&agrave;i l&ograve;ng người mặc v&agrave; l&agrave; điểm nhấn cho phong c&aacute;ch của bạn.</p>', NULL, NULL, 1, 0, 'ao-polo-co-be-tay-ngan-soi-nhan-tao-thoang-mat-tron-dang-vua-don-gian-gu-toi-gian-m18', 4, 1, '2024-04-16 08:37:40', '2024-04-20 19:06:22', NULL),
(35, 'Áo Polo Cổ Bẻ Tay Ngắn Cá Sấu 4 chiều Nhanh Khô Phối Màu Dáng Vừa Đơn Giản PREMIUM 28', '/storage/products/img103.jpg', 277000.00, NULL, 'Chất liệu Cá Sấu Poly Spandex, với thành phần chủ yếu là 95% Polyester và 5% Spandex, mang lại nhiều ưu điểm. Với khả năng mau khô và thoáng mát, nó là sự lựa chọn lý tưởng cho những ngày nắng nóng.', '<h3>Khả Năng Nhanh Kh&ocirc; v&agrave; Tho&aacute;ng M&aacute;t của C&aacute; Sấu 4 Chiều</h3>\r\n\r\n<p>Chất liệu c&aacute; sấu 4 chiều l&agrave;m cho &aacute;o polo trở n&ecirc;n tho&aacute;ng m&aacute;t v&agrave; nhanh kh&ocirc;, ph&ugrave; hợp cho mọi hoạt động trong ng&agrave;y. &Aacute;o polo từ d&ograve;ng PREMIUM 28 mang lại cảm gi&aacute;c thoải m&aacute;i v&agrave; dễ chịu cho người mặc trong mọi t&igrave;nh huống.</p>\r\n\r\n<h3>Thiết Kế Phối M&agrave;u Tinh Tế</h3>\r\n\r\n<p>Việc phối m&agrave;u tinh tế l&agrave; điểm nổi bật của &aacute;o polo PREMIUM 28. Sự kết hợp h&agrave;i h&ograve;a giữa c&aacute;c gam m&agrave;u mang lại sự c&aacute; nh&acirc;n h&oacute;a v&agrave; phong c&aacute;ch cho người mặc, phản &aacute;nh sự tinh tế v&agrave; s&agrave;nh điệu.</p>\r\n\r\n<h3>D&aacute;ng Vừa Đơn Giản</h3>\r\n\r\n<p>Với d&aacute;ng vừa đơn giản, &aacute;o polo n&agrave;y tạo ra vẻ ngo&agrave;i lịch l&atilde;m v&agrave; trẻ trung. D&aacute;ng vừa cung cấp sự thoải m&aacute;i v&agrave; linh hoạt, ph&ugrave; hợp với nhiều d&aacute;ng người kh&aacute;c nhau, từ thon gọn đến hơi cồng kềnh.</p>\r\n\r\n<h3>Sự Lựa Chọn Cho Phong C&aacute;ch H&agrave;ng Ng&agrave;y</h3>\r\n\r\n<p>&Aacute;o polo cổ bẻ từ PREMIUM 28 l&agrave; sự kết hợp ho&agrave;n hảo giữa phong c&aacute;ch v&agrave; tiện &iacute;ch. D&ugrave; bạn l&agrave;m việc trong văn ph&ograve;ng, dạo phố c&ugrave;ng bạn b&egrave; hay tham gia c&aacute;c hoạt động ngoại &ocirc;, sản phẩm n&agrave;y đều l&agrave; sự lựa chọn l&yacute; tưởng cho phong c&aacute;ch h&agrave;ng ng&agrave;y của bạn.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>&Aacute;o polo cổ bẻ tay ngắn c&aacute; sấu 4 chiều từ d&ograve;ng PREMIUM 28 l&agrave; sự kết hợp độc đ&aacute;o của phong c&aacute;ch v&agrave; tiện &iacute;ch. Với khả năng nhanh kh&ocirc;, thiết kế phối m&agrave;u tinh tế v&agrave; d&aacute;ng vừa đơn giản, sản phẩm n&agrave;y sẽ mang lại sự thoải m&aacute;i v&agrave; phong c&aacute;ch cho người mặc trong mọi t&igrave;nh huống.</p>', NULL, NULL, 1, 0, 'ao-polo-co-be-tay-ngan-ca-sau-4-chieu-nhanh-kho-phoi-mau-dang-vua-don-gian-premium-28', 5, 1, '2024-04-16 08:37:40', '2024-04-20 19:08:23', NULL),
(36, 'Quần Tây Lưng Gài Sợi Nhân Tạo Co Giãn Trung Bình Trơn Dáng Vừa Đơn Giản Non-Iron 19', '/storage/products/img0113.jpg', 347000.00, NULL, 'Chất liệu Poly Rayon Spandex, với thành phần gồm 82% Polyester, 14% Rayon và 4% Spandex, mang lại nhiều ưu điểm. Với khả năng co giãn tốt, sản phẩm này cho phép bạn thoải mái di chuyển mà không bị gò bó.', '<h3>Chất Liệu Sợi Nh&acirc;n Tạo Co Gi&atilde;n Trung B&igrave;nh</h3>\r\n\r\n<p>Chất liệu sợi nh&acirc;n tạo co gi&atilde;n trung b&igrave;nh l&agrave; lựa chọn l&yacute; tưởng cho quần t&acirc;y với sự thoải m&aacute;i v&agrave; linh hoạt. Quần t&acirc;y từ d&ograve;ng Non-Iron 19 được l&agrave;m từ chất liệu n&agrave;y, mang lại cảm gi&aacute;c thoải m&aacute;i v&agrave; dễ chịu cho người mặc suốt cả ng&agrave;y.</p>\r\n\r\n<h3>Thiết Kế Đơn Giản v&agrave; D&aacute;ng Vừa</h3>\r\n\r\n<p>Với thiết kế đơn giản v&agrave; d&aacute;ng vừa, quần t&acirc;y Non-Iron 19 tạo ra vẻ ngo&agrave;i lịch l&atilde;m v&agrave; trẻ trung. D&aacute;ng vừa cung cấp sự thoải m&aacute;i v&agrave; linh hoạt, ph&ugrave; hợp với nhiều d&aacute;ng người kh&aacute;c nhau, từ thon gọn đến hơi cồng kềnh.</p>\r\n\r\n<h3>T&iacute;nh Năng Non-Iron Tiện Lợi</h3>\r\n\r\n<p>T&iacute;nh năng non-iron gi&uacute;p giữ cho quần lu&ocirc;n mịn m&agrave;ng v&agrave; kh&ocirc;ng nhăn, tiết kiệm thời gian l&agrave;m ủi v&agrave; duy tr&igrave; vẻ ngo&agrave;i gọn g&agrave;ng suốt cả ng&agrave;y. Điều n&agrave;y l&agrave;m cho sản phẩm trở n&ecirc;n lựa chọn h&agrave;ng đầu cho những người c&oacute; lối sống bận rộn.</p>\r\n\r\n<h3>Sự Lựa Chọn Cho Phong C&aacute;ch H&agrave;ng Ng&agrave;y</h3>\r\n\r\n<p>Với quần t&acirc;y từ Non-Iron 19, bạn c&oacute; được một sản phẩm thời trang xuất sắc v&agrave; tiện &iacute;ch. D&ugrave; bạn l&agrave;m việc trong văn ph&ograve;ng, dự tiệc hay đi chơi, sản phẩm n&agrave;y đều l&agrave; sự lựa chọn l&yacute; tưởng cho phong c&aacute;ch h&agrave;ng ng&agrave;y của bạn.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>Quần t&acirc;y lưng g&agrave;i sợi nh&acirc;n tạo co gi&atilde;n từ d&ograve;ng Non-Iron 19 l&agrave; sự kết hợp ho&agrave;n hảo giữa phong c&aacute;ch v&agrave; tiện &iacute;ch. Với chất liệu sợi nh&acirc;n tạo co gi&atilde;n, t&iacute;nh năng non-iron, thiết kế đơn giản v&agrave; d&aacute;ng vừa, sản phẩm n&agrave;y sẽ mang lại sự thoải m&aacute;i v&agrave; phong c&aacute;ch cho người mặc trong mọi t&igrave;nh huống.</p>', NULL, NULL, 1, 0, 'quan-tay-lung-gai-soi-nhan-tao-co-gian-trung-binh-tron-dang-vua-don-gian-non-iron-19', 1, 3, '2024-04-16 08:37:40', '2024-04-20 19:16:15', NULL),
(37, 'Quần Jean Lưng Gài Ống Đứng Vải Cotton Co Giãn Trung Bình Trơn Dáng Vừa Đơn Giản PREMIUM 39', '/storage/products/img0123.jpg', 427000.00, NULL, 'Quần jean lưng gài ôm dáng, sử dụng vải cotton co giãn trung bình, có form tròn vừa vặn. Đơn giản nhưng mang đẳng cấp, phong cách Premium, sản phẩm này là sự kết hợp hoàn hảo giữa thoải mái và phong cách.', '<h3>Chất Liệu Vải Cotton Co Gi&atilde;n Trung B&igrave;nh</h3>\r\n\r\n<p>Chất liệu vải cotton co gi&atilde;n trung b&igrave;nh l&agrave; sự lựa chọn l&yacute; tưởng cho quần jean với sự thoải m&aacute;i v&agrave; linh hoạt. Quần jean từ d&ograve;ng PREMIUM 39 được l&agrave;m từ chất liệu n&agrave;y, mang lại cảm gi&aacute;c thoải m&aacute;i v&agrave; dễ chịu cho người mặc suốt cả ng&agrave;y.</p>\r\n\r\n<h3>Thiết Kế Đơn Giản v&agrave; D&aacute;ng Vừa</h3>\r\n\r\n<p>Với thiết kế đơn giản v&agrave; d&aacute;ng vừa, quần jean PREMIUM 39 tạo ra vẻ ngo&agrave;i lịch l&atilde;m v&agrave; trẻ trung. D&aacute;ng vừa cung cấp sự thoải m&aacute;i v&agrave; linh hoạt, ph&ugrave; hợp với nhiều d&aacute;ng người kh&aacute;c nhau, từ thon gọn đến hơi cồng kềnh.</p>\r\n\r\n<h3>Sự Tiện &Iacute;ch của Lưng G&agrave;i v&agrave; Ống Đứng</h3>\r\n\r\n<p>Quần jean lưng g&agrave;i ống đứng từ PREMIUM 39 kh&ocirc;ng chỉ mang lại phong c&aacute;ch m&agrave; c&ograve;n tạo n&ecirc;n sự tiện &iacute;ch cho người mặc. Lưng g&agrave;i gi&uacute;p giữ quần vững chắc tr&ecirc;n người, trong khi ống đứng tạo n&ecirc;n vẻ ngo&agrave;i hiện đại v&agrave; thời trang.</p>\r\n\r\n<h3>Sự Lựa Chọn Cho Phong C&aacute;ch H&agrave;ng Ng&agrave;y</h3>\r\n\r\n<p>Với quần jean từ PREMIUM 39, bạn c&oacute; được một sản phẩm thời trang xuất sắc v&agrave; tiện &iacute;ch. D&ugrave; bạn l&agrave;m việc trong văn ph&ograve;ng, dạo phố c&ugrave;ng bạn b&egrave; hay tham gia c&aacute;c hoạt động ngoại &ocirc;, sản phẩm n&agrave;y đều l&agrave; sự lựa chọn l&yacute; tưởng cho phong c&aacute;ch h&agrave;ng ng&agrave;y của bạn.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>Quần jean lưng g&agrave;i ống đứng vải cotton co gi&atilde;n từ d&ograve;ng PREMIUM 39 l&agrave; sự kết hợp ho&agrave;n hảo giữa phong c&aacute;ch v&agrave; sự thoải m&aacute;i. Với chất liệu vải cotton co gi&atilde;n, thiết kế đơn giản v&agrave; d&aacute;ng vừa, sản phẩm n&agrave;y sẽ mang lại sự thoải m&aacute;i v&agrave; phong c&aacute;ch cho người mặc trong mọi t&igrave;nh huống.</p>', NULL, NULL, 1, 0, 'quan-jean-lung-gai-ong-dung-vai-cotton-co-gian-trung-binh-tron-dang-vua-don-gian-premium-39', 2, 3, '2024-04-16 08:37:40', '2024-04-20 19:13:56', NULL),
(38, 'Quần Dài Lưng Gài Ống Đứng Vải Denim Đứng Dáng Trơn Dáng Vừa Đơn Giản PREMIUM 58', '/storage/products/img0133.jpg', 397000.00, NULL, 'Quần chất liệu Kaki Thun, với 95% Cotton và 5% Spandex, là lựa chọn hoàn hảo cho sự thoải mái và co giãn. Đặc biệt, sản phẩm này bền màu, giữ màu sắc sáng bóng qua nhiều lần giặt. Thiết kế có ngăn túi nhỏ đồng hồ và cạp thắt lưng sử dụng cùng loại vải', '<h3>Chất Liệu Vải Denim Đứng</h3>\r\n\r\n<p>Vải denim đứng l&agrave; biểu tượng của sự bền bỉ v&agrave; thời trang cổ điển. Quần d&agrave;i từ d&ograve;ng PREMIUM 58 được l&agrave;m từ chất liệu n&agrave;y, mang lại cảm gi&aacute;c thoải m&aacute;i v&agrave; độ bền cao, phản &aacute;nh sự sang trọng v&agrave; đẳng cấp.</p>\r\n\r\n<h3>Thiết Kế Đơn Giản v&agrave; D&aacute;ng Vừa</h3>\r\n\r\n<p>Với thiết kế đơn giản v&agrave; d&aacute;ng vừa, quần d&agrave;i PREMIUM 58 tạo ra vẻ ngo&agrave;i lịch l&atilde;m v&agrave; trẻ trung. D&aacute;ng vừa cung cấp sự thoải m&aacute;i v&agrave; linh hoạt, ph&ugrave; hợp với nhiều d&aacute;ng người kh&aacute;c nhau, từ thon gọn đến hơi cồng kềnh.</p>\r\n\r\n<h3>Sự Tiện &Iacute;ch của Lưng G&agrave;i v&agrave; Ống Đứng</h3>\r\n\r\n<p>Quần d&agrave;i lưng g&agrave;i ống đứng từ PREMIUM 58 kh&ocirc;ng chỉ mang lại phong c&aacute;ch m&agrave; c&ograve;n tạo n&ecirc;n sự tiện &iacute;ch cho người mặc. Lưng g&agrave;i gi&uacute;p giữ quần vững chắc tr&ecirc;n người, trong khi ống đứng tạo n&ecirc;n vẻ ngo&agrave;i hiện đại v&agrave; thời trang.</p>\r\n\r\n<h3>Sự Lựa Chọn Cho Phong C&aacute;ch H&agrave;ng Ng&agrave;y</h3>\r\n\r\n<p>Với quần d&agrave;i từ PREMIUM 58, bạn c&oacute; được một sản phẩm thời trang xuất sắc v&agrave; tiện &iacute;ch. D&ugrave; bạn l&agrave;m việc trong văn ph&ograve;ng, dạo phố c&ugrave;ng bạn b&egrave; hay tham gia c&aacute;c hoạt động ngoại &ocirc;, sản phẩm n&agrave;y đều l&agrave; sự lựa chọn l&yacute; tưởng cho phong c&aacute;ch h&agrave;ng ng&agrave;y của bạn.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>Quần d&agrave;i lưng g&agrave;i ống đứng vải denim đứng từ d&ograve;ng PREMIUM 58 l&agrave; sự kết hợp ho&agrave;n hảo giữa phong c&aacute;ch v&agrave; tiện &iacute;ch. Với chất liệu vải denim đứng, thiết kế đơn giản v&agrave; d&aacute;ng vừa, sản phẩm n&agrave;y sẽ mang lại sự thoải m&aacute;i v&agrave; phong c&aacute;ch tinh tế cho người mặc trong mọi t&igrave;nh huống.</p>', NULL, NULL, 1, 1, 'quan-dai-lung-gai-ong-dung-vai-denim-dung-dang-tron-dang-vua-don-gian-premium-58', 3, 3, '2024-04-16 08:37:40', '2024-04-21 15:08:12', NULL),
(39, 'Quần Short Lưng Gài Dưới Gối Vải Jean Mặc Bền Wash Nhẹ Dáng Vừa Giá Tốt Seventy Seven 29', '/storage/products/img0143.jpg', 277000.00, 221000.00, 'Quần jean chất liệu Cotton, với thành phần 100% Cotton, đảm bảo sự thoải mái và độ bền của sản phẩm. Đặc biệt, sử dụng kỹ thuật thêu 2D để tạo ra các họa tiết chất lượng cao, làm nổi bật và làm mới phong cách của sản phẩm.', '<h3>hất Liệu Vải Jean Mặc Bền Wash Nhẹ</h3>\r\n\r\n<p>Chất liệu vải jean l&agrave; biểu tượng của sự bền bỉ v&agrave; phong c&aacute;ch. Quần short từ d&ograve;ng Seventy Seven 29 được l&agrave;m từ vải jean mặc bền wash nhẹ, gi&uacute;p giữ form d&aacute;ng v&agrave; m&agrave;u sắc sau mỗi lần giặt, đồng thời mang lại cảm gi&aacute;c thoải m&aacute;i v&agrave; sự tự tin cho người mặc.</p>\r\n\r\n<h3>Thiết Kế D&aacute;ng Vừa</h3>\r\n\r\n<p>Với thiết kế d&aacute;ng vừa, quần short Seventy Seven 29 tạo ra vẻ ngo&agrave;i lịch l&atilde;m v&agrave; trẻ trung. D&aacute;ng vừa cung cấp sự thoải m&aacute;i v&agrave; linh hoạt, ph&ugrave; hợp với nhiều d&aacute;ng người kh&aacute;c nhau, từ thon gọn đến hơi cồng kềnh.</p>\r\n\r\n<h3>Sự Tiện &Iacute;ch của Lưng G&agrave;i Dưới Gối</h3>\r\n\r\n<p>Lưng g&agrave;i dưới gối gi&uacute;p giữ quần vững chắc tr&ecirc;n người, đồng thời tạo điểm nhấn thời trang cho sản phẩm. Điều n&agrave;y gi&uacute;p quần short trở n&ecirc;n phong c&aacute;ch v&agrave; tiện dụng cho mọi ho&agrave;n cảnh, từ dạo phố đến c&aacute;c buổi d&atilde; ngoại.</p>\r\n\r\n<h3>Sự Lựa Chọn Gi&aacute; Tốt</h3>\r\n\r\n<p>Với d&ograve;ng Seventy Seven 29, bạn c&oacute; được một sản phẩm thời trang chất lượng với gi&aacute; cả phải chăng. Sản phẩm n&agrave;y kh&ocirc;ng chỉ mang lại sự thoải m&aacute;i v&agrave; phong c&aacute;ch m&agrave; c&ograve;n tiết kiệm chi ph&iacute; cho t&uacute;i tiền của bạn.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>Quần short lưng g&agrave;i dưới gối vải jean từ d&ograve;ng Seventy Seven 29 l&agrave; sự kết hợp ho&agrave;n hảo giữa phong c&aacute;ch v&agrave; độ bền. Với chất liệu vải jean mặc bền wash nhẹ, thiết kế d&aacute;ng vừa v&agrave; gi&aacute; cả phải chăng, sản phẩm n&agrave;y sẽ mang lại sự thoải m&aacute;i v&agrave; phong c&aacute;ch tinh tế cho người mặc.</p>', NULL, NULL, 1, 0, 'quan-short-lung-gai-duoi-goi-vai-jean-mac-ben-wash-nhe-dang-vua-gia-tot-seventy-seven-29', 4, 3, '2024-04-16 08:37:40', '2024-04-21 15:10:35', NULL),
(40, 'Quần Dài Lưng Thun Ống Ôm Vải Thun Co Giãn Biểu Tượng Dáng Vừa Thể Thao Beginner 08', '/storage/products/img0153.jpg', 257000.00, 205000.00, 'Chất liệu vải thun Poly 2 Da, với thành phần 90% Polyester và 10% Spandex, mang lại sự thoải mái và co giãn. Sản phẩm này có khả năng hút ẩm tốt, giúp cơ thể luôn khô ráo và thoáng mát. Đồng thời, được thiết kế với nhãn BST riêng, tạo điểm nhấn cá nhân và độc đáo.', '<h3>Chất Liệu Vải Thun Co Gi&atilde;n</h3>\r\n\r\n<p>Chất liệu vải thun co gi&atilde;n l&agrave; lựa chọn l&yacute; tưởng cho quần d&agrave;i thể thao với sự thoải m&aacute;i v&agrave; linh hoạt. Quần d&agrave;i từ d&ograve;ng Beginner 08 được l&agrave;m từ chất liệu n&agrave;y, gi&uacute;p bạn cảm thấy thoải m&aacute;i v&agrave; tự tin trong mọi hoạt động.</p>\r\n\r\n<h3>Thiết Kế D&aacute;ng Vừa v&agrave; &Ocirc;m</h3>\r\n\r\n<p>Với thiết kế d&aacute;ng vừa v&agrave; &ocirc;m, quần d&agrave;i Beginner 08 tạo ra vẻ ngo&agrave;i thể thao v&agrave; năng động. Đồng thời, việc sử dụng lưng thun gi&uacute;p quần &ocirc;m s&aacute;t v&ugrave;ng bụng một c&aacute;ch thoải m&aacute;i, tạo n&ecirc;n sự tự tin khi vận động.</p>\r\n\r\n<h3>Phong C&aacute;ch Thể Thao Biểu Tượng</h3>\r\n\r\n<p>D&ograve;ng Beginner 08 lu&ocirc;n nổi tiếng với sự đơn giản v&agrave; thể thao. Quần d&agrave;i lưng thun ống &ocirc;m từ d&ograve;ng n&agrave;y kh&ocirc;ng chỉ l&agrave; một m&oacute;n đồ thời trang m&agrave; c&ograve;n l&agrave; biểu tượng của phong c&aacute;ch v&agrave; thoải m&aacute;i, phản &aacute;nh sự năng động v&agrave; sức khỏe.</p>\r\n\r\n<h3>Sự Lựa Chọn Cho Phong C&aacute;ch H&agrave;ng Ng&agrave;y</h3>\r\n\r\n<p>Với quần d&agrave;i từ d&ograve;ng Beginner 08, bạn c&oacute; được một sản phẩm thời trang v&agrave; tiện &iacute;ch. D&ugrave; bạn tập thể dục, dạo phố hay thư gi&atilde;n tại nh&agrave;, sản phẩm n&agrave;y đều l&agrave; sự lựa chọn l&yacute; tưởng cho phong c&aacute;ch h&agrave;ng ng&agrave;y của bạn.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>Quần d&agrave;i lưng thun ống &ocirc;m vải thun co gi&atilde;n từ d&ograve;ng Beginner 08 l&agrave; sự kết hợp l&yacute; tưởng giữa phong c&aacute;ch thể thao v&agrave; sự thoải m&aacute;i. Với chất liệu vải thun co gi&atilde;n, thiết kế d&aacute;ng vừa v&agrave; phong c&aacute;ch biểu tượng, sản phẩm n&agrave;y sẽ mang lại sự thoải m&aacute;i v&agrave; phong c&aacute;ch năng động cho người mặc.</p>', NULL, NULL, 1, 0, 'quan-dai-lung-thun-ong-om-vai-thun-co-gian-bieu-tuong-dang-vua-the-thao-beginner-08', 5, 3, '2024-04-16 08:37:40', '2024-04-21 15:12:39', NULL),
(41, 'Giày Casual Phụ Kiện Miền Gió Cát 19', '/storage/products/img016.jpg', 677000.00, NULL, 'Đôi giày sử dụng chất liệu Microfiber với lớp lót thân và lưỡi gà làm từ mousse 3mm, kết hợp với lớp mesh êm chân. Đế talon và lớp mousse 3.5mm mang lại sự thoải mái khi đi. Đế cao su cung cấp độ bám và bền bỉ. ', '<h3>Sự Tinh Tế trong Thiết Kế</h3>\r\n\r\n<p>Gi&agrave;y casual từ d&ograve;ng Phụ Kiện Miền Gi&oacute; C&aacute;t 19 được thiết kế với sự tinh tế v&agrave; chăm ch&uacute;t đến từng chi tiết. Từ đường may tinh tế đến c&aacute;ch phối m&agrave;u sắc, sản phẩm n&agrave;y tỏa s&aacute;ng trong mọi bước đi của bạn.</p>\r\n\r\n<h3>Phong C&aacute;ch Ph&oacute;ng Kho&aacute;ng</h3>\r\n\r\n<p>Với kiểu d&aacute;ng casual, gi&agrave;y Phụ Kiện Miền Gi&oacute; C&aacute;t 19 mang lại vẻ ngo&agrave;i ph&oacute;ng kho&aacute;ng v&agrave; tự tin cho người mang. Dễ d&agrave;ng kết hợp với nhiều trang phục kh&aacute;c nhau, sản phẩm n&agrave;y l&agrave; lựa chọn ho&agrave;n hảo cho mọi dịp.</p>\r\n\r\n<h3>Chất Liệu Chất Lượng</h3>\r\n\r\n<p>Chất liệu của gi&agrave;y đ&oacute;ng vai tr&ograve; quan trọng trong việc đảm bảo sự thoải m&aacute;i v&agrave; bền bỉ. Gi&agrave;y Phụ Kiện Miền Gi&oacute; C&aacute;t 19 được l&agrave;m từ c&aacute;c vật liệu chất lượng, gi&uacute;p bạn cảm thấy thoải m&aacute;i suốt cả ng&agrave;y d&agrave;i.</p>\r\n\r\n<h3>Điểm Nhấn Cho Phong C&aacute;ch C&aacute; Nh&acirc;n</h3>\r\n\r\n<p>Với gi&agrave;y casual n&agrave;y, bạn kh&ocirc;ng chỉ l&agrave; người mặc m&agrave; c&ograve;n l&agrave; người s&aacute;ng tạo phong c&aacute;ch của m&igrave;nh. Sản phẩm n&agrave;y l&agrave; điểm nhấn ho&agrave;n hảo để thể hiện phong c&aacute;ch c&aacute; nh&acirc;n v&agrave; sự tự tin của bạn.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>Gi&agrave;y Casual Phụ Kiện Miền Gi&oacute; C&aacute;t 19 l&agrave; sự lựa chọn l&yacute; tưởng cho những ai đang t&igrave;m kiếm sự kết hợp giữa phong c&aacute;ch v&agrave; thoải m&aacute;i. Với thiết kế tinh tế, phong c&aacute;ch ph&oacute;ng kho&aacute;ng v&agrave; chất liệu chất lượng, sản phẩm n&agrave;y sẽ l&agrave; điểm nhấn ho&agrave;n hảo cho bộ sưu tập gi&agrave;y của bạn.</p>', NULL, NULL, 1, 1, 'giay-casual-phu-kien-mien-gio-cat-19', 1, 4, '2024-04-16 08:37:40', '2024-04-21 15:16:54', NULL),
(42, 'Giày Tây Lười Da Phụ Kiện Nguyên Bản A4 2023', '/storage/products/img0171.jpg', 797000.00, 557000.00, 'Giày Tây Lười Nguyên Bản A4 2022 được làm từ chất liệu chính là da bò 100%, kết hợp với lớp lót bằng da heo, tạo cảm giác êm ái và sang trọng. Sản phẩm này có mảnh thun co giãn kéo dài từ cổ giày xuống dưới mắt cá, nhưng không dài đến đế giày, tạo sự thoải mái khi sử dụng.', '<h3>Chất Liệu Da Cao Cấp</h3>\r\n\r\n<p>Chất liệu da cao cấp l&agrave; điểm nhấn quan trọng của gi&agrave;y t&acirc;y lười Phụ Kiện Nguy&ecirc;n Bản A4 2023. Da tự nhi&ecirc;n kh&ocirc;ng chỉ mang lại vẻ đẹp sang trọng m&agrave; c&ograve;n đảm bảo sự bền bỉ v&agrave; thoải m&aacute;i cho người mang.</p>\r\n\r\n<h3>Thiết Kế Tinh Tế</h3>\r\n\r\n<p>Với thiết kế lười truyền thống v&agrave; đường may tỉ mỉ, gi&agrave;y t&acirc;y lười A4 2023 tỏa s&aacute;ng với vẻ đẹp tinh tế v&agrave; sự sang trọng. Sản phẩm n&agrave;y l&agrave; biểu tượng của sự lịch l&atilde;m v&agrave; đẳng cấp trong mọi t&igrave;nh huống.</p>\r\n\r\n<h3>Phong C&aacute;ch Đa Dạng</h3>\r\n\r\n<p>D&ugrave; bạn l&agrave;m việc trong văn ph&ograve;ng, dự tiệc hay tham dự sự kiện ch&iacute;nh trị, gi&agrave;y t&acirc;y lười Phụ Kiện Nguy&ecirc;n Bản A4 2023 lu&ocirc;n l&agrave; lựa chọn l&yacute; tưởng. Sự đa dạng trong phong c&aacute;ch gi&uacute;p sản phẩm n&agrave;y ph&ugrave; hợp với nhiều trang phục kh&aacute;c nhau.</p>\r\n\r\n<h3>Sự Tinh Tế v&agrave; Nguy&ecirc;n Bản</h3>\r\n\r\n<p>Được l&agrave;m từ c&aacute;c nguy&ecirc;n liệu chất lượng v&agrave; được chăm ch&uacute;t từng chi tiết, gi&agrave;y t&acirc;y lười A4 2023 thể hiện sự tinh tế v&agrave; nguy&ecirc;n bản. Sản phẩm n&agrave;y l&agrave; sự lựa chọn ho&agrave;n hảo cho những ai đang t&igrave;m kiếm điểm nhấn cho phong c&aacute;ch c&aacute; nh&acirc;n.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>Gi&agrave;y T&acirc;y Lười Da Phụ Kiện Nguy&ecirc;n Bản A4 2023 l&agrave; biểu tượng của sự lịch l&atilde;m v&agrave; đẳng cấp. Với chất liệu da cao cấp, thiết kế tinh tế v&agrave; phong c&aacute;ch đa dạng, sản phẩm n&agrave;y sẽ l&agrave; điểm nhấn ho&agrave;n hảo cho phong c&aacute;ch của bạn.</p>', NULL, NULL, 1, 0, 'giay-tay-loi-da-phu-kien-nguyen-ban-a4-2023', 2, 4, '2024-04-16 08:37:40', '2024-04-21 15:18:41', NULL),
(43, 'Giày Casual Da Phụ Kiện Miền Gió Cát 13', '/storage/products/img018.jpg', 657000.00, 463000.00, 'Đôi giày được làm từ chất liệu chính là da bò, mang lại độ bền và đẹp tự nhiên. Sản phẩm này đi kèm với lớp lót thân và lưỡi gà làm từ mousse 3mm, kết hợp với lớp mesh êm chân, tạo cảm giác thoải mái và thoáng mát.', '<h3>Chất Liệu Da B&ograve; Chất Lượng</h3>\r\n\r\n<p>Được l&agrave;m từ chất liệu ch&iacute;nh l&agrave; da b&ograve;, gi&agrave;y casual Phụ Kiện Miền Gi&oacute; C&aacute;t 13 mang lại độ bền v&agrave; đẹp tự nhi&ecirc;n. Da b&ograve; kh&ocirc;ng chỉ đảm bảo sự sang trọng m&agrave; c&ograve;n đem lại độ bền v&agrave; độ &ecirc;m &aacute;i cho đ&ocirc;i ch&acirc;n của bạn.</p>\r\n\r\n<h3>Lớp L&oacute;t Th&acirc;n v&agrave; Lưỡi G&agrave; từ Mousse 3mm</h3>\r\n\r\n<p>Sản phẩm n&agrave;y đi k&egrave;m với lớp l&oacute;t th&acirc;n v&agrave; lưỡi g&agrave; l&agrave;m từ mousse 3mm, tạo sự &ecirc;m &aacute;i v&agrave; thoải m&aacute;i cho b&agrave;n ch&acirc;n. Điều n&agrave;y gi&uacute;p giảm &aacute;p lực v&agrave; cảm gi&aacute;c mệt mỏi khi di chuyển trong thời gian d&agrave;i.</p>\r\n\r\n<h3>Lớp Mesh &Ecirc;m Ch&acirc;n</h3>\r\n\r\n<p>Lớp mesh &ecirc;m ch&acirc;n được kết hợp trong sản phẩm tạo ra cảm gi&aacute;c thoải m&aacute;i v&agrave; tho&aacute;ng m&aacute;t cho đ&ocirc;i ch&acirc;n của bạn. Sự th&ocirc;ng tho&aacute;ng n&agrave;y gi&uacute;p điều h&ograve;a nhiệt độ v&agrave; hạn chế mồ h&ocirc;i, mang lại sự thoải m&aacute;i suốt cả ng&agrave;y.</p>\r\n\r\n<h3>Thiết Kế Tinh Tế v&agrave; Thời Trang</h3>\r\n\r\n<p>Với thiết kế tinh tế v&agrave; thời trang, gi&agrave;y casual Miền Gi&oacute; C&aacute;t 13 kh&ocirc;ng chỉ l&agrave; sự lựa chọn ho&agrave;n hảo cho c&aacute;c dịp h&agrave;ng ng&agrave;y m&agrave; c&ograve;n l&agrave; điểm nhấn cho phong c&aacute;ch của bạn. Sản phẩm n&agrave;y th&iacute;ch hợp cho cả nam v&agrave; nữ với mọi trang phục.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>Gi&agrave;y Casual Da Phụ Kiện Miền Gi&oacute; C&aacute;t 13 l&agrave; sự kết hợp ho&agrave;n hảo giữa đẳng cấp v&agrave; thoải m&aacute;i. Với chất liệu da b&ograve; chất lượng, lớp l&oacute;t th&acirc;n v&agrave; lưỡi g&agrave; từ mousse 3mm, c&ugrave;ng lớp mesh &ecirc;m ch&acirc;n, sản phẩm n&agrave;y mang lại sự tự tin v&agrave; thoải m&aacute;i cho mỗi bước ch&acirc;n của bạn.</p>', NULL, NULL, 1, 1, 'giay-casual-da-phu-kien-mien-gio-cat-13', 3, 4, '2024-04-16 08:37:40', '2024-04-21 15:20:35', NULL),
(44, 'Giày Casual Phụ Kiện Miền Gió Cát 15', '/storage/products/img019.jpg', 487000.00, NULL, 'Giày được làm từ chất liệu Microfiber, tạo cảm giác mềm mại và thoải mái. Lót vòng cổ bằng Microfiber giúp tăng thêm sự êm ái khi đeo. Sản phẩm này có lớp lót thân và lưỡi mũi làm từ mousse 3mm, kết hợp với lớp mesh êm chân, mang lại sự thoải mái và thoáng mát.', '<h3>Chất Liệu Da B&ograve; Chất Lượng</h3>\r\n\r\n<p>Được l&agrave;m từ chất liệu ch&iacute;nh l&agrave; da b&ograve;, gi&agrave;y casual Phụ Kiện Miền Gi&oacute; C&aacute;t 13 mang lại độ bền v&agrave; đẹp tự nhi&ecirc;n. Da b&ograve; kh&ocirc;ng chỉ đảm bảo sự sang trọng m&agrave; c&ograve;n đem lại độ bền v&agrave; độ &ecirc;m &aacute;i cho đ&ocirc;i ch&acirc;n của bạn.</p>\r\n\r\n<h3>Lớp L&oacute;t Th&acirc;n v&agrave; Lưỡi G&agrave; từ Mousse 3mm</h3>\r\n\r\n<p>Sản phẩm n&agrave;y đi k&egrave;m với lớp l&oacute;t th&acirc;n v&agrave; lưỡi g&agrave; l&agrave;m từ mousse 3mm, tạo sự &ecirc;m &aacute;i v&agrave; thoải m&aacute;i cho b&agrave;n ch&acirc;n. Điều n&agrave;y gi&uacute;p giảm &aacute;p lực v&agrave; cảm gi&aacute;c mệt mỏi khi di chuyển trong thời gian d&agrave;i.</p>\r\n\r\n<h3>Lớp Mesh &Ecirc;m Ch&acirc;n</h3>\r\n\r\n<p>Lớp mesh &ecirc;m ch&acirc;n được kết hợp trong sản phẩm tạo ra cảm gi&aacute;c thoải m&aacute;i v&agrave; tho&aacute;ng m&aacute;t cho đ&ocirc;i ch&acirc;n của bạn. Sự th&ocirc;ng tho&aacute;ng n&agrave;y gi&uacute;p điều h&ograve;a nhiệt độ v&agrave; hạn chế mồ h&ocirc;i, mang lại sự thoải m&aacute;i suốt cả ng&agrave;y.</p>\r\n\r\n<h3>Thiết Kế Tinh Tế v&agrave; Thời Trang</h3>\r\n\r\n<p>Với thiết kế tinh tế v&agrave; thời trang, gi&agrave;y casual Miền Gi&oacute; C&aacute;t 13 kh&ocirc;ng chỉ l&agrave; sự lựa chọn ho&agrave;n hảo cho c&aacute;c dịp h&agrave;ng ng&agrave;y m&agrave; c&ograve;n l&agrave; điểm nhấn cho phong c&aacute;ch của bạn. Sản phẩm n&agrave;y th&iacute;ch hợp cho cả nam v&agrave; nữ với mọi trang phục.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>Gi&agrave;y Casual Da Phụ Kiện Miền Gi&oacute; C&aacute;t 13 l&agrave; sự kết hợp ho&agrave;n hảo giữa đẳng cấp v&agrave; thoải m&aacute;i. Với chất liệu da b&ograve; chất lượng, lớp l&oacute;t th&acirc;n v&agrave; lưỡi g&agrave; từ mousse 3mm, c&ugrave;ng lớp mesh &ecirc;m ch&acirc;n, sản phẩm n&agrave;y mang lại sự tự tin v&agrave; thoải m&aacute;i cho mỗi bước ch&acirc;n của bạn.</p>', NULL, NULL, 1, 0, 'giay-casual-phu-kien-mien-gio-cat-15', 4, 4, '2024-04-16 08:37:40', '2024-04-21 15:22:32', NULL);
INSERT INTO `products` (`id`, `name`, `images`, `price`, `sale_price`, `summary`, `description`, `quantity_available`, `quantity_sold`, `status`, `hot`, `slug`, `brand_id`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(45, 'Giày Tây Cột Dây Da Phụ Kiện No Style 45 2023', '/storage/products/img020.jpg', 987000.00, NULL, 'CHUNKY DERBY - Giày buộc dây, phần thân giày có những lỗ xỏ dây sẽ được may lên phần trên của mũi giày. Vẫn mang kiểu dáng của Derby nhưng kiểu giày này không đem lại cảm giác trang trọng quá mức mà thêm vào là nét trẻ trung, hiện đại và năng động trên nền đế cao hầm hố.', '<h3>Thiết Kế Chunky Derby Ph&aacute; C&aacute;ch</h3>\r\n\r\n<p>Gi&agrave;y t&acirc;y cột d&acirc;y No Style 45 2023 CHUNKY DERBY mang lại sự kết hợp độc đ&aacute;o giữa kiểu d&aacute;ng truyền thống của Derby v&agrave; phong c&aacute;ch ph&aacute; c&aacute;ch Chunky. Điều n&agrave;y tạo ra một sản phẩm mang đậm dấu ấn c&aacute; nh&acirc;n v&agrave; hiện đại.</p>\r\n\r\n<h3>Phong C&aacute;ch Trẻ Trung v&agrave; Hiện Đại</h3>\r\n\r\n<p>Với những lỗ xỏ d&acirc;y được may l&ecirc;n phần tr&ecirc;n của mũi gi&agrave;y, sản phẩm n&agrave;y kh&ocirc;ng chỉ mang lại vẻ trang trọng m&agrave; c&ograve;n th&ecirc;m v&agrave;o sự trẻ trung, hiện đại v&agrave; năng động. Đ&acirc;y l&agrave; lựa chọn ho&agrave;n hảo cho những người y&ecirc;u th&iacute;ch phong c&aacute;ch c&aacute; nh&acirc;n v&agrave; độc đ&aacute;o.</p>\r\n\r\n<h3>Đế Cao Hầm Hố</h3>\r\n\r\n<p>Điểm nhấn của gi&agrave;y l&agrave; đế cao hầm hố, tạo ra vẻ ngo&agrave;i mạnh mẽ v&agrave; phong c&aacute;ch. Đế cao n&agrave;y kh&ocirc;ng chỉ l&agrave;m t&ocirc;n l&ecirc;n vẻ đẹp của gi&agrave;y m&agrave; c&ograve;n mang lại sự thoải m&aacute;i v&agrave; ổn định cho người mang.</p>\r\n\r\n<h3>Sự Linh Hoạt v&agrave; Tiện &Iacute;ch</h3>\r\n\r\n<p>D&ugrave; bạn đi l&agrave;m, đi dạo phố hay tham dự c&aacute;c sự kiện, gi&agrave;y CHUNKY DERBY vẫn l&agrave; sự lựa chọn ho&agrave;n hảo. Sự linh hoạt v&agrave; tiện &iacute;ch của sản phẩm n&agrave;y gi&uacute;p bạn tự tin v&agrave; thoải m&aacute;i trong mọi ho&agrave;n cảnh.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>Gi&agrave;y T&acirc;y Cột D&acirc;y Da Phụ Kiện No Style 45 2023 CHUNKY DERBY l&agrave; biểu tượng của sự ph&aacute; c&aacute;ch v&agrave; phong c&aacute;ch truyền thống. Với thiết kế độc đ&aacute;o, đế cao hầm hố v&agrave; sự linh hoạt, sản phẩm n&agrave;y sẽ l&agrave; điểm nhấn ho&agrave;n hảo cho phong c&aacute;ch c&aacute; nh&acirc;n của bạn.</p>', NULL, NULL, 1, 0, 'giay-tay-cot-day-da-phu-kien-no-style-45-2023', 5, 4, '2024-04-16 08:37:40', '2024-04-21 15:24:36', NULL),
(46, 'PKTT Nón Vải Cotton Phụ Kiện #Y2010 02', '/storage/products/img021.jpg', 97000.00, 67000.00, 'Mũ được làm từ chất liệu kaki 100% cotton, với đặc tính dày dặn mang lại độ bền và tạo form mũ cứng và đẹp mắt. Khóa kim loại không gỉ giúp dễ dàng điều chỉnh theo form đầu để phù hợp và thoải mái khi đội.', '<h3>Chất Liệu Kaki 100% Cotton</h3>\r\n\r\n<p>N&oacute;n vải cotton từ d&ograve;ng Phụ Kiện #Y2010 02 được l&agrave;m từ chất liệu kaki 100% cotton, đảm bảo độ bền v&agrave; sự thoải m&aacute;i cho người đội. Chất liệu n&agrave;y cũng tạo ra form mũ cứng v&agrave; đẹp mắt, giữ cho mũ lu&ocirc;n giữ được h&igrave;nh d&aacute;ng.</p>\r\n\r\n<h3>Điều Chỉnh Dễ D&agrave;ng</h3>\r\n\r\n<p>Kh&oacute;a kim loại kh&ocirc;ng gỉ tr&ecirc;n n&oacute;n gi&uacute;p dễ d&agrave;ng điều chỉnh theo form đầu của mỗi người. Điều n&agrave;y gi&uacute;p n&oacute;n vừa vặn v&agrave; thoải m&aacute;i hơn khi đội, đảm bảo sự thoải m&aacute;i suốt cả ng&agrave;y.</p>\r\n\r\n<h3>Phong C&aacute;ch Đa Dạng</h3>\r\n\r\n<p>Với thiết kế đơn giản v&agrave; tinh tế, n&oacute;n Phụ Kiện #Y2010 02 phản &aacute;nh sự trẻ trung v&agrave; thời thượng. Sản phẩm n&agrave;y ph&ugrave; hợp với nhiều phong c&aacute;ch thời trang v&agrave; l&agrave; điểm nhấn ho&agrave;n hảo cho bất kỳ bộ trang phục n&agrave;o.</p>\r\n\r\n<h3>Sự Lựa Chọn Th&ocirc;ng Minh</h3>\r\n\r\n<p>Với sự kết hợp giữa chất liệu bền bỉ v&agrave; thiết kế tinh tế, n&oacute;n vải cotton #Y2010 02 l&agrave; sự lựa chọn th&ocirc;ng minh cho mọi ho&agrave;n cảnh. D&ugrave; đi dạo phố, du lịch hay tham dự c&aacute;c sự kiện, sản phẩm n&agrave;y sẽ l&agrave;m bạn nổi bật v&agrave; tự tin.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>N&oacute;n Vải Cotton Phụ Kiện #Y2010 02 l&agrave; biểu tượng của sự bền bỉ v&agrave; phong c&aacute;ch. Với chất liệu kaki 100% cotton, kh&oacute;a kim loại kh&ocirc;ng gỉ v&agrave; thiết kế đa dạng, sản phẩm n&agrave;y mang lại sự thoải m&aacute;i v&agrave; tự tin cho mọi người đội.</p>', NULL, NULL, 1, 0, 'pktt-non-vai-cotton-phu-kien-y2010-02', 5, 5, '2024-04-16 08:37:40', '2024-04-21 15:26:38', NULL),
(47, 'PKTT Dây Nịt Da #Y2010 D14', '/storage/products/img022.jpg', 285000.00, NULL, 'Dây làm từ 100% da bò thật, nổi bật với độ bền bỉ và vẻ sang trọng, tinh tế. Đầu khóa làm từ hợp kim Zinc contract, bề mặt sáng bóng và đẹp mắt, đồng thời đặc biệt không bị gỉ sét, giữ cho sản phẩm luôn mới mẻ và bền đẹp theo thời gian.', '<h3>Chất Liệu Da Cao Cấp</h3>\r\n\r\n<p>D&acirc;y nịt da #Y2010 D14 được l&agrave;m từ chất liệu da cao cấp, mang lại vẻ đẳng cấp v&agrave; sang trọng cho bất kỳ trang phục n&agrave;o bạn kết hợp.</p>\r\n\r\n<h3>Thiết Kế Tinh Tế</h3>\r\n\r\n<p>Với thiết kế đơn giản v&agrave; tinh tế, d&acirc;y nịt n&agrave;y tạo ra một điểm nhấn sang trọng v&agrave; lịch l&atilde;m cho bộ trang phục của bạn.</p>\r\n\r\n<h3>Đa Dạng về M&agrave;u Sắc v&agrave; K&iacute;ch Cỡ</h3>\r\n\r\n<p>Sản phẩm c&oacute; sẵn trong nhiều m&agrave;u sắc v&agrave; k&iacute;ch cỡ kh&aacute;c nhau, gi&uacute;p bạn dễ d&agrave;ng lựa chọn v&agrave; phối hợp với c&aacute;c trang phục kh&aacute;c nhau.</p>\r\n\r\n<h3>Sự Linh Hoạt v&agrave; Tiện &Iacute;ch</h3>\r\n\r\n<p>D&acirc;y nịt da kh&ocirc;ng chỉ l&agrave; phụ kiện thời trang m&agrave; c&ograve;n mang lại sự linh hoạt v&agrave; tiện &iacute;ch trong việc giữ quần &aacute;o vững chắc v&agrave; trang tr&iacute; cho trang phục của bạn.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>D&acirc;y Nịt Da Phụ Kiện #Y2010 D14 l&agrave; biểu tượng của sự đẳng cấp v&agrave; phong c&aacute;ch. Với chất liệu da cao cấp, thiết kế tinh tế v&agrave; sự linh hoạt, sản phẩm n&agrave;y l&agrave; điểm nhấn ho&agrave;n hảo cho phong c&aacute;ch c&aacute; nh&acirc;n của bạn.</p>', NULL, NULL, 1, 0, 'pktt-day-nit-da-y2010-d14', 2, 5, '2024-04-16 08:37:40', '2024-04-21 15:28:06', NULL),
(48, 'Túi Đeo Vintage Phụ Kiện Miền Gió Cát 10', '/storage/products/img023.jpg', 377000.00, 263000.00, 'Túi được làm từ vải Canvas, kết hợp 65% Polyester và 35% Cotton, tạo ra sự bền bỉ và thoải mái khi sử dụng. Lót bên trong được làm từ vải 210 Korea, đảm bảo chất lượng và độ bền. Sử dụng dây kéo YKK #5, đảm bảo sự mượt mà và đáng tin cậy khi sử dụng.', '<h3>Thiết Kế Vintage Độc Đ&aacute;o</h3>\r\n\r\n<p>T&uacute;i đeo Vintage Phụ Kiện Miền Gi&oacute; C&aacute;t 10 mang đậm dấu ấn của thời kỳ retro với thiết kế độc đ&aacute;o v&agrave; s&aacute;ng tạo. Đ&acirc;y l&agrave; một điểm nhấn độc đ&aacute;o cho bất kỳ bộ trang phục n&agrave;o v&agrave; thu h&uacute;t sự ch&uacute; &yacute; của mọi người xung quanh.</p>\r\n\r\n<h3>Chất Liệu Chất Lượng</h3>\r\n\r\n<p>Sản phẩm được l&agrave;m từ chất liệu chất lượng, đảm bảo t&iacute;nh bền bỉ v&agrave; độ bền cao. Chất liệu n&agrave;y cũng mang lại cảm gi&aacute;c mềm mại v&agrave; thoải m&aacute;i cho người sử dụng.</p>\r\n\r\n<h3>Sự Tiện Lợi v&agrave; Đa Dụng</h3>\r\n\r\n<p>Với c&aacute;c ngăn v&agrave; ngăn phụ đa dạng, t&uacute;i đeo n&agrave;y mang lại sự tiện lợi v&agrave; đa dụng cho người d&ugrave;ng. Bạn c&oacute; thể mang theo c&aacute;c vật dụng c&aacute; nh&acirc;n h&agrave;ng ng&agrave;y một c&aacute;ch dễ d&agrave;ng v&agrave; gọn g&agrave;ng.</p>\r\n\r\n<h3>Phong C&aacute;ch Cổ Điển v&agrave; Thời Trang</h3>\r\n\r\n<p>T&uacute;i đeo Vintage Phụ Kiện Miền Gi&oacute; C&aacute;t 10 kh&ocirc;ng chỉ l&agrave; phụ kiện tiện &iacute;ch m&agrave; c&ograve;n l&agrave; một phần của phong c&aacute;ch thời trang của bạn. Sự kết hợp giữa phong c&aacute;ch cổ điển v&agrave; hiện đại tạo ra một diện mạo độc đ&aacute;o v&agrave; phong c&aacute;ch.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>T&uacute;i Đeo Vintage Phụ Kiện Miền Gi&oacute; C&aacute;t 10 l&agrave; sự kết hợp tuyệt vời giữa phong c&aacute;ch retro v&agrave; sự tiện lợi. Với thiết kế độc đ&aacute;o, chất liệu chất lượng v&agrave; t&iacute;nh đa dụng, sản phẩm n&agrave;y l&agrave; lựa chọn ho&agrave;n hảo cho những người y&ecirc;u th&iacute;ch phong c&aacute;ch cổ điển v&agrave; thời trang.</p>', NULL, NULL, 1, 1, 'tui-deo-vintage-phu-kien-mien-gio-cat-10', 3, 5, '2024-04-16 08:37:40', '2024-04-21 15:30:37', NULL),
(49, 'PKTT Vớ #Y2010 V19 Combo 5', '/storage/products/img024.jpg', 147000.00, NULL, 'Cổ vớ được thiết kế cao, hỗ trợ đệm cổ chân, giúp giảm áp lực và đảm bảo sự thoải mái khi di chuyển. Kiểu dệt mắt lưới tăng độ thông thoáng, giúp cân bằng nhiệt độ và hỗ trợ lưu thông không khí. Linh động với đa số size chân người dùng, giúp vớ ôm vừa và thoải mái.', '<h3>Chất Liệu Chất Lượng</h3>\r\n\r\n<p>Combo 5 đ&ocirc;i vớ Phụ Kiện #Y2010 V19 được l&agrave;m từ chất liệu chất lượng, đảm bảo độ bền v&agrave; thoải m&aacute;i khi sử dụng. Chất liệu n&agrave;y cũng gi&uacute;p vớ giữ form v&agrave; m&agrave;u sắc sau nhiều lần giặt.</p>\r\n\r\n<h3>Thiết Kế Đa Dạng</h3>\r\n\r\n<p>Combo n&agrave;y đi k&egrave;m với 5 đ&ocirc;i vớ với c&aacute;c mẫu m&atilde; v&agrave; m&agrave;u sắc đa dạng, từ vớ thể thao đến vớ thời trang, phục vụ cho mọi nhu cầu v&agrave; phong c&aacute;ch của bạn.</p>\r\n\r\n<h3>Sự Tiện Lợi Cho Mọi Ho&agrave;n Cảnh</h3>\r\n\r\n<p>Với combo n&agrave;y, bạn c&oacute; đủ loại vớ để sử dụng h&agrave;ng ng&agrave;y, từ c&ocirc;ng việc đến thể thao v&agrave; dạo phố. Điều n&agrave;y gi&uacute;p bạn tiết kiệm thời gian v&agrave; c&ocirc;ng sức trong việc lựa chọn trang phục h&agrave;ng ng&agrave;y.</p>\r\n\r\n<h3>Ph&ugrave; Hợp Cho Mọi Đối Tượng</h3>\r\n\r\n<p>Sản phẩm n&agrave;y ph&ugrave; hợp cho cả nam v&agrave; nữ, từ trẻ em đến người lớn. Điều n&agrave;y l&agrave;m cho combo vớ #Y2010 V19 trở th&agrave;nh một lựa chọn th&ocirc;ng minh cho cả gia đ&igrave;nh.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>Combo 5 đ&ocirc;i vớ Phụ Kiện #Y2010 V19 l&agrave; sự kết hợp tuyệt vời giữa sự tiện lợi v&agrave; phong c&aacute;ch. Với chất liệu chất lượng, thiết kế đa dạng v&agrave; sự ph&ugrave; hợp cho mọi đối tượng, sản phẩm n&agrave;y l&agrave; lựa chọn h&agrave;ng đầu cho sự thoải m&aacute;i v&agrave; phong c&aacute;ch c&aacute; nh&acirc;n.</p>', NULL, NULL, 1, 0, 'pktt-vo-y2010-v19-combo-5', 4, 5, '2024-04-16 08:37:40', '2024-04-21 15:31:55', NULL),
(50, 'Kính Mát Louis Vuitton LV Waimea Sunglasses Z1082E', '/storage/products/img0253.jpg', 16850000.00, 15450000.00, 'Phong cách của sunglasses của Louis Vuitton có thể được mô tả là sang trọng, hiện đại và lịch lãm. Chúng thường có thiết kế tinh tế, đẳng cấp với các chi tiết đặc trưng của thương hiệu, như logo LV hay các họa tiết phong cách.', '<h3>Thiết Kế Tinh Tế v&agrave; Đẳng Cấp</h3>\r\n\r\n<p>K&iacute;nh m&aacute;t Louis Vuitton LV Waimea Sunglasses Z1082E được thiết kế với sự tinh tế v&agrave; đẳng cấp, thể hiện r&otilde; n&eacute;t n&eacute;t đặc trưng của thương hiệu Louis Vuitton. Từ khung k&iacute;nh đến c&aacute;c chi tiết nhỏ, mọi yếu tố đều được chăm ch&uacute;t tỉ mỉ để tạo ra sản phẩm ho&agrave;n hảo.</p>\r\n\r\n<h3>Phong C&aacute;ch Sang Trọng v&agrave; Hiện Đại</h3>\r\n\r\n<p>Sunglasses của Louis Vuitton thường mang đến sự sang trọng v&agrave; hiện đại cho người sử dụng. Với thiết kế đẳng cấp v&agrave; c&aacute;c chi tiết phong c&aacute;ch, sản phẩm n&agrave;y l&agrave; điểm nhấn ho&agrave;n hảo cho bất kỳ bộ trang phục n&agrave;o v&agrave; thể hiện gu thẩm mỹ tinh tế của chủ nh&acirc;n.</p>\r\n\r\n<h3>Logo LV v&agrave; Họa Tiết Phong C&aacute;ch</h3>\r\n\r\n<p>C&aacute;c sản phẩm của Louis Vuitton thường được trang tr&iacute; bằng logo LV hoặc c&aacute;c họa tiết phong c&aacute;ch đặc trưng của thương hiệu. Điều n&agrave;y kh&ocirc;ng chỉ l&agrave;m t&ocirc;n l&ecirc;n vẻ đẹp của sản phẩm m&agrave; c&ograve;n l&agrave; dấu ấn của sự đẳng cấp v&agrave; uy t&iacute;n của Louis Vuitton.</p>\r\n\r\n<h3>Sự Thoải M&aacute;i v&agrave; Bảo Vệ</h3>\r\n\r\n<p>Ngo&agrave;i vẻ ngo&agrave;i sang trọng, k&iacute;nh m&aacute;t Louis Vuitton cũng mang lại sự thoải m&aacute;i v&agrave; bảo vệ tốt cho mắt. Chất liệu chất lượng v&agrave; thiết kế ergonomics gi&uacute;p người sử dụng cảm thấy thoải m&aacute;i trong mọi ho&agrave;n cảnh v&agrave; bảo vệ mắt khỏi t&aacute;c động của &aacute;nh nắng mặt trời.</p>\r\n\r\n<h3>Kết Luận</h3>\r\n\r\n<p>K&iacute;nh M&aacute;t Louis Vuitton LV Waimea Sunglasses Z1082E l&agrave; biểu tượng của sự sang trọng v&agrave; đẳng cấp. Với thiết kế tinh tế, phong c&aacute;ch hiện đại v&agrave; bảo vệ mắt tốt, sản phẩm n&agrave;y l&agrave; lựa chọn ho&agrave;n hảo cho những người y&ecirc;u th&iacute;ch phong c&aacute;ch v&agrave; chất lượng.</p>', NULL, NULL, 1, 1, 'kinh-mat-louis-vuitton-lv-waimea-sunglasses-z1082e', 1, 5, '2024-04-16 08:37:40', '2024-04-21 15:33:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `product_id` bigint UNSIGNED NOT NULL,
  `color_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`product_id`, `color_id`) VALUES
(27, 1),
(29, 1),
(32, 1),
(41, 1),
(46, 1),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(31, 3),
(36, 3),
(38, 3),
(39, 3),
(40, 3),
(42, 3),
(45, 3),
(46, 3),
(47, 3),
(49, 3),
(26, 7),
(29, 7),
(33, 7),
(38, 7),
(40, 7),
(43, 7),
(44, 7),
(48, 7),
(26, 8),
(30, 8),
(31, 8),
(34, 8),
(49, 8),
(29, 13),
(33, 13),
(35, 13),
(37, 13),
(38, 13),
(39, 13),
(30, 14),
(30, 15),
(33, 16),
(33, 17),
(35, 17),
(38, 17),
(50, 18);

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `product_id` bigint UNSIGNED NOT NULL,
  `size_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`product_id`, `size_id`) VALUES
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(26, 4),
(27, 4),
(28, 4),
(29, 4),
(30, 4),
(31, 4),
(32, 4),
(33, 4),
(34, 4),
(35, 4),
(26, 5),
(27, 5),
(28, 5),
(29, 5),
(30, 5),
(31, 5),
(32, 5),
(33, 5),
(34, 5),
(35, 5),
(36, 6),
(37, 6),
(38, 6),
(39, 6),
(40, 6),
(36, 7),
(37, 7),
(38, 7),
(39, 7),
(40, 7),
(36, 8),
(37, 8),
(38, 8),
(39, 8),
(40, 8),
(36, 9),
(37, 9),
(38, 9),
(39, 9),
(40, 9),
(36, 10),
(37, 10),
(38, 10),
(39, 10),
(40, 10),
(46, 11),
(47, 11),
(48, 11),
(49, 11),
(50, 11),
(41, 29),
(42, 29),
(43, 29),
(44, 29),
(45, 29),
(41, 30),
(42, 30),
(43, 30),
(44, 30),
(45, 30),
(41, 31),
(42, 31),
(43, 31),
(44, 31),
(45, 31),
(41, 32),
(42, 32),
(43, 32),
(44, 32),
(45, 32),
(41, 33),
(42, 33),
(43, 33),
(44, 33),
(45, 33);

-- --------------------------------------------------------

--
-- Table structure for table `product_tag`
--

CREATE TABLE `product_tag` (
  `product_id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_tag`
--

INSERT INTO `product_tag` (`product_id`, `tag_id`) VALUES
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(26, 6),
(27, 6),
(28, 6),
(29, 6),
(30, 6),
(28, 7),
(31, 8),
(32, 8),
(33, 8),
(34, 8),
(35, 8),
(36, 9),
(37, 9),
(38, 9),
(39, 9),
(40, 9),
(37, 10),
(39, 10),
(36, 11),
(38, 11),
(39, 12),
(40, 13),
(41, 14),
(42, 14),
(43, 14),
(44, 14),
(45, 14),
(41, 15),
(43, 15),
(44, 15),
(42, 16),
(45, 16),
(46, 17),
(47, 17),
(48, 17),
(49, 17),
(50, 17),
(46, 18),
(46, 19),
(47, 20),
(48, 21),
(49, 22),
(50, 23);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'SIZE: S', '2024-04-16 08:36:18', NULL),
(2, 'SIZE: M', '2024-04-16 08:36:18', NULL),
(3, 'SIZE: L', '2024-04-16 08:36:18', NULL),
(4, 'SIZE: XL', '2024-04-16 08:36:18', NULL),
(5, 'SIZE: XXL', '2024-04-16 08:36:18', NULL),
(6, 'SIZE: 30', '2024-04-16 08:36:18', NULL),
(7, 'SIZE: 31', '2024-04-16 08:36:18', NULL),
(8, 'SIZE: 32', '2024-04-16 08:36:18', NULL),
(9, 'SIZE: 33', '2024-04-16 08:36:18', NULL),
(10, 'SIZE: 34', '2024-04-16 08:36:18', NULL),
(11, 'FREE SIZE', '2024-04-16 08:36:18', NULL),
(29, 'SIZE: 39', '2024-04-21 15:16:54', '2024-04-21 15:16:54'),
(30, 'SIZE: 40', '2024-04-21 15:16:54', '2024-04-21 15:16:54'),
(31, 'SIZE: 41', '2024-04-21 15:16:54', '2024-04-21 15:16:54'),
(32, 'SIZE: 42', '2024-04-21 15:16:54', '2024-04-21 15:16:54'),
(33, 'SIZE: 43', '2024-04-21 15:16:54', '2024-04-21 15:16:54');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `event`, `title`, `summary`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Thời trang mùa hè', 'Bộ sưu tập mùa hè năm 2024', 'Một nhãn hiệu chuyên tạo ra những sản phẩm thiết yếu sang trọng. Được tạo ra một cách có đạo đức với một thái độ kiên định cam kết chất lượng vượt trội.', '/storage/sliders/hero-1.jpg', 1, '2024-04-22 19:16:08', '2024-04-23 08:31:04'),
(2, 'Thời trang mùa hè', 'Bộ sưu tập mùa hè năm 2024', 'Một nhãn hiệu chuyên tạo ra những sản phẩm thiết yếu sang trọng. Được tạo ra một cách có đạo đức với một thái độ kiên định cam kết chất lượng vượt trội.', '/storage/sliders/hero-2.jpg', 1, '2024-04-22 19:17:11', '2024-05-02 00:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `social_networks`
--

CREATE TABLE `social_networks` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_networks`
--

INSERT INTO `social_networks` (`id`, `name`, `link`, `class`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'https://www.facebook.com/', 'fa fa-facebook', '2024-04-24 06:30:48', '2024-04-24 06:33:12'),
(2, 'Twitter', 'https://twitter.com/', 'fa fa-twitter', '2024-04-24 06:31:41', '2024-04-24 06:31:41'),
(3, 'Youtube', 'https://www.youtube.com/', 'fa fa-youtube-play', '2024-04-24 06:32:19', '2024-04-24 06:32:19'),
(4, 'Instagram', 'https://www.instagram.com/', 'fa fa-instagram', '2024-04-24 06:32:53', '2024-04-24 06:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'quần áo', '2024-04-20 14:21:03', '2024-04-20 14:21:03'),
(3, 'áo', '2024-04-20 16:10:13', '2024-04-20 16:10:13'),
(6, 'áo sơ mi', '2024-04-20 16:29:41', '2024-04-20 16:29:41'),
(7, 'one piece', '2024-04-20 16:49:02', '2024-04-20 16:49:02'),
(8, 'áo polo', '2024-04-20 17:03:47', '2024-04-20 17:03:47'),
(9, 'quần', '2024-04-20 19:13:56', '2024-04-20 19:13:56'),
(10, 'quần jean', '2024-04-20 19:13:56', '2024-04-20 19:13:56'),
(11, 'quần tây', '2024-04-20 19:16:15', '2024-04-20 19:16:15'),
(12, 'quần short', '2024-04-21 15:10:35', '2024-04-21 15:10:35'),
(13, 'quần thun', '2024-04-21 15:12:39', '2024-04-21 15:12:39'),
(14, 'giày', '2024-04-21 15:16:54', '2024-04-21 15:16:54'),
(15, 'giày casual', '2024-04-21 15:16:54', '2024-04-21 15:16:54'),
(16, 'giày tây', '2024-04-21 15:18:41', '2024-04-21 15:18:41'),
(17, 'phụ kiện', '2024-04-21 15:26:38', '2024-04-21 15:26:38'),
(18, 'nón', '2024-04-21 15:26:38', '2024-04-21 15:26:38'),
(19, 'nón vải', '2024-04-21 15:26:38', '2024-04-21 15:26:38'),
(20, 'dây nịt', '2024-04-21 15:28:06', '2024-04-21 15:28:06'),
(21, 'túi', '2024-04-21 15:30:37', '2024-04-21 15:30:37'),
(22, 'vớ', '2024-04-21 15:31:55', '2024-04-21 15:31:55'),
(23, 'mắt kính', '2024-04-21 15:33:31', '2024-04-21 15:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `email_verified_at`, `password`, `role`, `active`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Dương Tuấn', 'along18901@gmail.com', '12344551111', 'HCM', '2024-04-18 10:17:12', '$2y$12$up3yyS/vRV3odguJ0EpOFuAUQkGDzr5yJEKMjCA4n5PDjF451E9ua', 0, 1, NULL, '2024-04-18 10:16:39', '2024-05-02 00:36:14', NULL),
(4, 'Anh Long', 'tuanndps27303@fpt.edu.vn', '12344551111', 'hcm city', '2024-04-25 05:54:02', '$2y$12$qq1CnFY4sD3rU/pUG.UINe9.8ywb0Km7tXqSvgOUTd1d25ZUv/Ehm', 1, 1, NULL, '2024-04-21 20:45:58', '2024-04-25 06:02:35', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner_bottoms`
--
ALTER TABLE `banner_bottoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_tops`
--
ALTER TABLE `banner_tops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `favorites_product_id_foreign` (`product_id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_product_id_foreign` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_coupon_id_foreign` (`coupon_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`product_id`,`color_id`),
  ADD KEY `product_color_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`product_id`,`size_id`),
  ADD KEY `product_size_size_id_foreign` (`size_id`);

--
-- Indexes for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD PRIMARY KEY (`product_id`,`tag_id`),
  ADD KEY `product_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_networks`
--
ALTER TABLE `social_networks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner_bottoms`
--
ALTER TABLE `banner_bottoms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner_tops`
--
ALTER TABLE `banner_tops`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `social_networks`
--
ALTER TABLE `social_networks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_color`
--
ALTER TABLE `product_color`
  ADD CONSTRAINT `product_color_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_color_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_size_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD CONSTRAINT `product_tag_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
