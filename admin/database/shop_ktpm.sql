-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 09:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_ktpm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_user`
--

CREATE TABLE `cart_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `number` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `supply_id` int(11) DEFAULT NULL,
  `category_position` int(4) DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `supply_id`, `category_position`, `slug`) VALUES
(557, 'Áo', NULL, 1, 'ao'),
(558, 'Quần', NULL, 2, 'quan'),
(559, 'Phụ Kiên', NULL, 3, 'phu-kien');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `parent_comment_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `content` longtext DEFAULT NULL,
  `createDate` datetime DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `link_image` varchar(255) NOT NULL DEFAULT 'author-comment.png',
  `editTime` datetime DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `link_Logo` varchar(500) DEFAULT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `address` varchar(500) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `phone_2` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `link_Contact` varchar(550) DEFAULT NULL,
  `link_Facebook` varchar(500) DEFAULT NULL,
  `link_Twitter` varchar(255) DEFAULT NULL,
  `link_linkedin` varchar(255) DEFAULT NULL,
  `zalo` varchar(20) DEFAULT NULL,
  `link_about` varchar(255) DEFAULT NULL,
  `about_footer` longtext DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `link_Logo`, `contact_name`, `address`, `country`, `phone`, `phone_2`, `email`, `link_Contact`, `link_Facebook`, `link_Twitter`, `link_linkedin`, `zalo`, `link_about`, `about_footer`, `favicon`) VALUES
(1, 'logo-shop.png', 'KTPM', 'Cần Thơ', 'Việt Nam', '0123456789', '0123456789', 'admin@gmail.com', 'page/1-about', 'https://www.facebook.com/test/', 'https://www.twitter.com/test/', 'https://www.linkedin.com/test/', '0123456789', 'javascript:void(0);', 'abcccc', 'favicon-shop.png');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) NOT NULL DEFAULT '',
  `phone` int(20) DEFAULT NULL,
  `subject` mediumtext NOT NULL,
  `createTime` datetime NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `editTime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `email`, `phone`, `subject`, `createTime`, `user_id`, `order_id`, `product_id`, `status`, `editTime`) VALUES
(14, '', 'dndb2001151212@gmail.com', 786948941, 'ALO', '2023-04-24 21:30:30', 1044, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `introduce`
--

CREATE TABLE `introduce` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `content_footer` mediumtext DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `media_name` varchar(500) DEFAULT NULL,
  `slug` varchar(500) DEFAULT NULL,
  `createDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_footers`
--

CREATE TABLE `menu_footers` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(150) DEFAULT NULL,
  `menu_url` varchar(255) DEFAULT NULL,
  `menu_description` varchar(255) DEFAULT NULL,
  `parent` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_footers`
--

INSERT INTO `menu_footers` (`id`, `menu_name`, `menu_url`, `menu_description`, `parent`) VALUES
(1, 'Not available', 'javascript:void(0);', '', 0),
(2, 'Not available', 'javascript:void(0);', '', 0),
(3, 'Not available', 'javascript:void(0);', '', 0),
(4, 'Not available', 'javascript:void(0);', '', 0),
(5, 'Not available', 'javascript:void(0);', '', 0),
(6, 'Not available', 'javascript:void(0);', '', 0),
(7, 'Not available', 'javascript:void(0);', '', 0),
(8, 'Not available', 'javascript:void(0);', '', 0),
(9, 'Not available', 'javascript:void(0);', '', 0),
(10, 'Sản phẩm nổi bật', 'type/1-san-pham-hot', 'Sản phẩm nổi bật', 0),
(11, 'Sản phẩm mới', 'type/2-san-pham-moi', 'Sản phẩm mới', 0),
(12, 'Đang giảm giá', 'type/3-san-pham-dang-giam-gia', 'Sản phẩn đang giảm giá', 0),
(18, 'Text Link', 'javascript:void(0);', '', 1),
(19, 'Social', 'javascript:void(0);', 'Các liên kết trang mạng xã hội', 1),
(20, 'Blog', 'javascript:void(0);', '', 1),
(21, 'Loại sản phẩm', 'javascript:void(0);', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `option_name` varchar(200) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL DEFAULT '',
  `autoload` varchar(20) NOT NULL DEFAULT 'yes'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `province` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `cart_total` double NOT NULL,
  `createtime` datetime DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `editTime` datetime DEFAULT NULL,
  `code_order` varchar(50) NOT NULL,
  `type` varchar(11) DEFAULT NULL,
  `order_payment` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `code_order` varchar(50) NOT NULL,
  `type` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post_author` int(11) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'Draft',
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_type` int(11) NOT NULL DEFAULT 1,
  `post_modified_user` varchar(50) DEFAULT NULL,
  `totalView` int(11) NOT NULL DEFAULT 0,
  `post_slug` varchar(255) NOT NULL,
  `post_avatar` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(500) DEFAULT NULL,
  `product_typeid` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `supply_id` int(11) DEFAULT NULL,
  `product_description` longtext DEFAULT NULL,
  `product_price` int(11) NOT NULL,
  `product_color` varchar(255) DEFAULT NULL,
  `product_material` varchar(255) DEFAULT NULL,
  `product_size` varchar(100) DEFAULT NULL,
  `product_detail` longtext DEFAULT NULL,
  `createBy` varchar(100) DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  `editBy` varchar(100) DEFAULT NULL,
  `editDate` datetime DEFAULT NULL,
  `totalView` int(11) DEFAULT 0,
  `saleoff` tinyint(11) DEFAULT 0,
  `percentoff` int(11) DEFAULT NULL,
  `img1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `img4` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_typeid`, `category_id`, `sub_category_id`, `supply_id`, `product_description`, `product_price`, `product_color`, `product_material`, `product_size`, `product_detail`, `createBy`, `createDate`, `editBy`, `editDate`, `totalView`, `saleoff`, `percentoff`, `img1`, `img2`, `img3`, `img4`, `slug`) VALUES
(74, 'Quần sooc active ', 2, 558, 21, NULL, 'Quần sooc active ', 239000, 'Đen, Xanh nhạt', 'Nỉ', 'M', 'Quần sooc active&nbsp;', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'quan-sooc-active--74img1.png', 'quan-sooc-active--74img2.png', NULL, NULL, 'quan-sooc-active-'),
(75, 'Quần sooc nữ màu kem', 2, 558, 21, NULL, 'Quần sooc nữ màu kem', 399000, 'Kem', 'Nỉ', 'M', 'Quần sooc nữ m&agrave;u kem', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'quan-sooc-nu-mau-kem-75img1.png', NULL, NULL, NULL, 'quan-sooc-nu-mau-kem'),
(76, 'Quần vải nam xám', 2, 558, 22, NULL, 'Quần vải nam xám', 499000, 'Xám', 'Vải', 'M', 'Quần vải nam x&aacute;m', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'quan-vai-nam-xam-76img1.png', NULL, NULL, NULL, 'quan-vai-nam-xam'),
(77, 'Quần vải xanh đậm nam', 2, 558, 22, NULL, 'Quần vải xanh đậm nam', 599000, 'Xanh đậm', 'Vải', 'M', 'Quần vải xanh đậm nam', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'quan-vai-xanh-dam-nam-77img1.png', NULL, NULL, NULL, 'quan-vai-xanh-dam-nam'),
(78, 'Khẩu trang unisex', 2, 559, 28, NULL, 'Khẩu trang unisex màu trắng', 69000, 'Trắng', 'Vải', 'M', 'Khẩu trang unisex m&agrave;u trắng', 'Át min', '2023-04-25', 'Át min', '2023-04-25 02:32:38', 0, 0, 0, 'khau-trang-unisex-mau-trang-78img1.png', NULL, NULL, NULL, 'khau-trang-unisex-mau-trang'),
(64, 'Quần jeans nữ xanh ', 2, 558, 18, NULL, 'Quần jeans nữ xanh da trời nhạt', 599000, 'Xanh da trời', 'Kaki', 'M', 'Quần jeans nữ xanh da trời nhạt', 'Át min', '2023-04-25', 'Át min', '2023-04-25 02:33:04', 0, 0, 0, 'quan-jeans-nu-xanh-da-troi-nhat-64img1.png', NULL, NULL, NULL, 'quan-jeans-nu-xanh-da-troi-nhat'),
(65, 'Quần jeans nam xanh ', 2, 558, 18, NULL, 'Quần jeans nam xanh da trời ', 599000, 'Xanh da trời', 'Kaki', 'M', 'Quần jeans nam xanh da trời&nbsp;', 'Át min', '2023-04-25', 'Át min', '2023-04-25 02:33:43', 0, 0, 0, 'quan-jeans-nam-xanh-da-troi--65img1.png', NULL, NULL, NULL, 'quan-jeans-nam-xanh-da-troi-'),
(66, 'Quần kaki nam đen', 2, 558, 19, NULL, 'Quần kaki nam đen', 2690000, 'Đen', 'Kaki', 'M', 'Quần kaki nam đen', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'quan-kaki-nam-den-66img1.png', NULL, NULL, NULL, 'quan-kaki-nam-den'),
(68, 'Quần jeans nam xanh da trời ', 2, 558, 19, NULL, 'Quần jeans nam xanh da trời ', 599000, 'Xanh da trời', 'Kaki', 'M', 'Quần jeans nam xanh da trời&nbsp;', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'quan-jeans-nam-xanh-da-troi--68img1.png', NULL, NULL, NULL, 'quan-jeans-nam-xanh-da-troi-'),
(69, 'Quần kaki nam nâu ', 2, 558, 19, NULL, 'Quần kaki nam nâu ', 699000, 'Nâu', 'Kaki', 'M', 'Quần kaki nam n&acirc;u&nbsp;', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 1, 0, 0, 'quan-kaki-nam-nau--69img1.png', NULL, NULL, NULL, 'quan-kaki-nam-nau-'),
(70, 'Quần nỉ SUPERIOR', 2, 558, 20, NULL, 'Quần nỉ SUPERIOR', 449000, 'Xanh đậm', 'Nỉ', 'M', 'Quần nỉ SUPERIOR', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'quan-ni-superior-70img1.png', NULL, NULL, NULL, 'quan-ni-superior'),
(71, 'Quần nỉ nữ màu hồng', 2, 558, 20, NULL, 'Quần nỉ nữ màu hồng', 369000, 'Hồng', 'Nỉ', 'M', 'Quần nỉ nữ m&agrave;u hồng', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'quan-ni-nu-mau-hong-71img1.png', NULL, NULL, NULL, 'quan-ni-nu-mau-hong'),
(72, 'Quần nỉ nữ trắng', 2, 558, 20, NULL, 'Quần nỉ nữ trắng', 299000, 'Trắng', 'Nỉ', 'M', 'Quần nỉ nữ trắng', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'quan-ni-nu-trang-72img1.png', NULL, NULL, NULL, 'quan-ni-nu-trang'),
(73, 'Quần sooc nam màu kem', 2, 558, 21, NULL, 'Quần sooc nam màu kem', 549000, 'Kem', 'Kaki', 'M', 'Quần sooc nam m&agrave;u kem', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'quan-sooc-nam-mau-kem-73img1.png', NULL, NULL, NULL, 'quan-sooc-nam-mau-kem'),
(55, 'Áo khoác chân bông xanh đậm', 2, 557, 26, NULL, 'Áo khoác chân bông xanh đậm', 990000, 'Xanh đậm', 'Thun coton', 'M', '&Aacute;o kho&aacute;c ch&acirc;n b&ocirc;ng xanh đậm', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-khoac-chan-bong-xanh-dam-55img1.png', NULL, NULL, NULL, 'ao-khoac-chan-bong-xanh-dam'),
(56, 'Áo khoác gió xám', 2, 557, 27, NULL, 'Áo khoác gió xám', 899000, 'Xám', 'Thun coton', 'M', '&Aacute;o kho&aacute;c gi&oacute; x&aacute;m', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-khoac-gio-xam-56img1.png', NULL, NULL, NULL, 'ao-khoac-gio-xam'),
(57, 'Áo khoác gió xanh biển nhạt', 2, 557, 27, NULL, 'Áo khoác gió xanh biển nhạt', 799000, 'Xanh biển nhạt', 'Thun coton', 'M', '&Aacute;o kho&aacute;c gi&oacute; xanh biển nhạt', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-khoac-gio-xanh-bien-nhat-57img1.png', NULL, NULL, NULL, 'ao-khoac-gio-xanh-bien-nhat'),
(58, 'Áo khoác ngắn đen', 2, 557, 23, NULL, 'Áo khoác ngắn đen', 999000, 'Đen', 'Thun coton', 'M', '&Aacute;o kho&aacute;c ngắn đen', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-khoac-ngan-den-58img1.png', NULL, NULL, NULL, 'ao-khoac-ngan-den'),
(59, 'Áo khoác ngắn trắng', 2, 557, 23, NULL, 'Áo khoác ngắn trắng', 899000, 'Trắng', 'Thun coton', 'M', '&Aacute;o kho&aacute;c ngắn trắng', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-khoac-ngan-trang-59img1.png', NULL, NULL, NULL, 'ao-khoac-ngan-trang'),
(60, 'Áo nỉ nam cổ polo', 2, 557, 13, NULL, 'Áo nỉ nam cổ polo', 599000, 'Nâu', 'Thun coton', 'M', '&Aacute;o nỉ nam cổ polo', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-ni-nam-co-polo-60img1.png', NULL, NULL, NULL, 'ao-ni-nam-co-polo'),
(61, 'Áo nỉ có mũ nâu', 2, 557, 14, NULL, 'Áo nỉ có mũ nâu', 649000, 'Nâu', 'Thun coton', 'M', '&Aacute;o nỉ c&oacute; mũ n&acirc;u', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-ni-co-mu-nau-61img1.png', NULL, NULL, NULL, 'ao-ni-co-mu-nau'),
(62, 'Quần jeans nữ xanh da trời', 2, 558, 18, NULL, 'Quần jeans nữ xanh da trời', 599000, 'Xanh da trời', 'Kaki', 'M', 'Quần jeans nữ xanh da trời', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'quan-jeans-nu-xanh-da-troi-62img1.png', NULL, NULL, NULL, 'quan-jeans-nu-xanh-da-troi'),
(63, 'Quần jeans nữ xanh da trời', 2, 558, 18, NULL, 'Quần jeans nữ xanh da trời', 499000, 'Xanh đậm', 'Kaki', 'M', 'Quần jeans nữ xanh da trời', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'quan-jeans-nu-xanh-da-troi-63img1.png', NULL, NULL, NULL, 'quan-jeans-nu-xanh-da-troi'),
(46, 'Áo polo nam đen', 1, 557, 16, NULL, 'Áo polo nam đen', 590000, 'Xanh đậm', 'Thun coton', 'M', '&Aacute;o polo nam đen', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-polo-nam-den-46img1.png', NULL, NULL, NULL, 'ao-polo-nam-den'),
(47, 'Áo polo nam xanh đậm', 2, 557, 16, NULL, 'Áo polo nam xanh đậm', 590000, 'Xanh đậm', 'Thun coton', 'M', '&Aacute;o polo nam xanh đậm', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-polo-nam-xanh-dam-47img1.png', NULL, NULL, NULL, 'ao-polo-nam-xanh-dam'),
(48, 'Áo sơ mi kem', 2, 557, 17, NULL, 'Áo sơ mi kem', 590000, 'Kem', 'Thun coton', 'M', '&Aacute;o sơ mi kem', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-so-mi-kem-48img1.png', NULL, NULL, NULL, 'ao-so-mi-kem'),
(49, 'Áo sơ mi trắng', 2, 557, 17, NULL, 'Áo sơ mi trắng', 399000, 'Trắng', 'Thun coton', 'M', '&Aacute;o sơ mi trắng', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-so-mi-trang-49img1.png', NULL, NULL, NULL, 'ao-so-mi-trang'),
(50, 'Áo chống nắng đen', 2, 557, 24, NULL, 'Áo chống nắng đen', 399000, 'Đen', 'Thun coton', 'M', '&Aacute;o chống nắng đen', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-chong-nang-den-50img1.png', NULL, NULL, NULL, 'ao-chong-nang-den'),
(51, 'Áo ba lỗ vàng', 2, 557, 10, NULL, 'Áo ba lỗ vàng', 349000, 'Vàng', 'Thun coton', 'M', '&Aacute;o ba lỗ v&agrave;ng', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-ba-lo-vang-51img1.png', NULL, NULL, NULL, 'ao-ba-lo-vang'),
(52, 'Áo ba lỗ cam', 2, 557, 10, NULL, 'Áo ba lỗ cam', 269000, 'Cam', 'Thun coton', 'M', '&Aacute;o ba lỗ cam', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-ba-lo-cam-52img1.png', NULL, NULL, NULL, 'ao-ba-lo-cam'),
(53, 'Áo ba lỗ xám', 2, 557, 10, NULL, 'Áo ba lỗ xám', 349000, 'Xám', 'Thun coton', 'M', '&Aacute;o ba lỗ x&aacute;m', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-ba-lo-xam-53img1.png', NULL, NULL, NULL, 'ao-ba-lo-xam'),
(54, 'Áo dài tay trắng', 2, 557, 11, NULL, 'Áo dài tay trắng', 199000, 'Trắng', 'Thun coton', 'M', '&Aacute;o d&agrave;i tay trắng', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-dai-tay-trang-54img1.png', NULL, NULL, NULL, 'ao-dai-tay-trang'),
(35, 'Áo sát nách', 2, 557, 10, NULL, 'Áo sát nách ', 249000, 'Đen', 'Thun coton', 'M', '&Aacute;o s&aacute;t n&aacute;ch&nbsp;', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 2, 0, 0, 'ao-sat-nach-35img1.png', NULL, NULL, NULL, 'ao-sat-nach'),
(36, 'Áo phông dài tay', 2, 557, 11, NULL, 'Áo phông dài tay', 299000, 'Kem', 'Thun coton', 'M', '&Aacute;o ph&ocirc;ng d&agrave;i tay', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-phong-dai-tay-36img1.png', NULL, NULL, NULL, 'ao-phong-dai-tay'),
(37, 'Áo khoác chân bông', 2, 557, 26, NULL, 'Áo khoác chân bông', 1199000, 'Kem', 'Thun coton', 'M', '&Aacute;o kho&aacute;c ch&acirc;n b&ocirc;ng', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-khoac-chan-bong-37img1.png', NULL, NULL, NULL, 'ao-khoac-chan-bong'),
(38, 'Áo khoác gió', 2, 557, 27, NULL, 'Áo khoác gió', 799000, 'Đen', 'Thun coton', 'M', '&Aacute;o kho&aacute;c gi&oacute;', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 1, 0, 0, 'ao-khoac-gio-38img1.png', NULL, NULL, NULL, 'ao-khoac-gio'),
(39, 'Áo khoác lông vũ', 2, 557, 25, NULL, 'Áo khoác lông vũ', 299000, 'Xanh nước', 'Thun coton', 'M', '&Aacute;o kho&aacute;c l&ocirc;ng vũ', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-khoac-long-vu-39img1.png', NULL, NULL, NULL, 'ao-khoac-long-vu'),
(40, 'Áo khoác ngắn', 2, 557, 23, NULL, 'Áo khoác ngắn', 1190000, 'Xám', 'Thun coton', 'M', '&Aacute;o kho&aacute;c ngắn', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-khoac-ngan-40img1.png', NULL, NULL, NULL, 'ao-khoac-ngan'),
(41, 'Áo len', 2, 557, 12, NULL, 'Áo len', 599000, 'Cam', 'Thun coton', 'M', '&Aacute;o len', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-len-41img1.png', NULL, NULL, NULL, 'ao-len'),
(42, 'Áo nỉ', 2, 557, 13, NULL, 'Áo nỉ', 299000, 'Xanh biển', 'Thun coton', 'M', '&Aacute;o nỉ', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-ni-42img1.png', NULL, NULL, NULL, 'ao-ni'),
(43, 'Áo phông', 2, 557, 15, NULL, 'Áo phông', 299000, 'Kem', 'Thun coton', 'M', '&Aacute;o ph&ocirc;ng', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-phong-43img1.png', NULL, NULL, NULL, 'ao-phong'),
(44, 'Áo polo nam', 2, 557, 16, NULL, 'Áo polo nam ', 249000, 'Cam', 'Thun coton', 'M', '&Aacute;o polo nam', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-polo-nam-44img1.png', NULL, NULL, NULL, 'ao-polo-nam'),
(45, 'Áo polo nam xanh', 2, 557, 16, NULL, 'Áo polo nam xanh', 199000, 'Xanh nhạt', 'Thun coton', 'M', '&Aacute;o polo nam xanh', 'Át min', '2023-04-25', '', '0000-00-00 00:00:00', 0, 0, 0, 'ao-polo-nam-xanh-45img1.png', NULL, NULL, NULL, 'ao-polo-nam-xanh');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL,
  `role_desc` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `role_desc`) VALUES
(1, 'Admin', 'Quản trị viên quản lý hệ thống website '),
(2, 'Moderator', 'Người phụ trợ quản lý');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `slide_name` varchar(255) DEFAULT NULL,
  `slide_img1` varchar(255) DEFAULT NULL,
  `slide_text1` varchar(500) DEFAULT NULL,
  `slide_img2` varchar(255) DEFAULT NULL,
  `slide_text2` varchar(500) DEFAULT NULL,
  `slide_img3` varchar(255) DEFAULT NULL,
  `slide_text3` varchar(500) DEFAULT NULL,
  `slide_img4` varchar(255) DEFAULT NULL,
  `slide_text4` varchar(500) DEFAULT NULL,
  `slide_img5` varchar(255) DEFAULT NULL,
  `slide_text5` varchar(500) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `slide_name`, `slide_img1`, `slide_text1`, `slide_img2`, `slide_text2`, `slide_img3`, `slide_text3`, `slide_img4`, `slide_text4`, `slide_img5`, `slide_text5`, `status`) VALUES
(4, 'Slide', 'image1-4-slide.jpg', '', 'image2-4-slide.jpg', '', 'image3-4-slide.jpg', '', 'image4-4-slide.jpg', '', 'image5-4-slide.jpg', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `subcategory_name` varchar(255) DEFAULT NULL,
  `supply_id` int(11) DEFAULT 1,
  `category_id` int(11) DEFAULT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `subcategory_name`, `supply_id`, `category_id`, `slug`) VALUES
(15, 'Áo phông', 1, 557, 'ao-phong'),
(14, 'Áo nỉ có mũ', 1, 557, 'ao-ni-co-mu'),
(13, 'Áo nỉ', 1, 557, 'ao-ni'),
(12, 'Áo len', 1, 557, 'ao-len'),
(11, 'Áo dài tay', 1, 557, 'ao-dai-tay'),
(10, 'Áo ba lỗ', 1, 557, 'ao-ba-lo'),
(16, 'Áo polo', 1, 557, 'ao-polo'),
(17, 'Áo sơ mi', 1, 557, 'ao-so-mi'),
(18, 'Quần jeans', 1, 558, 'quan-jeans'),
(19, 'Quần kaki', 1, 558, 'quan-kaki'),
(20, 'Quần nỉ', 1, 558, 'quan-ni'),
(21, 'Quần sooc', 1, 558, 'quan-sooc'),
(22, 'Quần vải', 1, 558, 'quan-vai'),
(23, 'Áo khoác ngắn', 1, 557, 'ao-khoac-ngan'),
(24, 'Áo khoác chống nắng', 1, 557, 'ao-khoac-chong-nang'),
(25, 'Áo khoác lông vũ', 1, 557, 'ao-khoac-long-vu'),
(26, 'Áo khoác chân bông', 1, 557, 'ao-khoac-chan-bong'),
(27, 'Áo khoác gió', 1, 557, 'ao-khoac-gio'),
(28, 'Khẩu trang ', 1, 559, 'khau-trang-');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `id` int(11) NOT NULL,
  `supply_name` varchar(500) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`id`, `supply_name`, `logo`) VALUES
(1, 'Việt Nam', '');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) DEFAULT NULL,
  `type_description` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type_name`, `type_description`, `slug`) VALUES
(1, 'SẢN PHẨM NỔI BẬT (HOT)', '', 'san-pham-noi-bat'),
(2, 'SẢN PHẨM MỚI', '', 'san-pham-moi'),
(3, 'SẢN PHẨM GIẢM GIÁ', '', 'san-pham-giam-gia');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_username` varchar(50) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 0,
  `user_avatar` varchar(550) DEFAULT 'author-auto.png',
  `user_email` varchar(255) DEFAULT NULL,
  `user_phone` varchar(20) DEFAULT NULL,
  `user_address` varchar(200) DEFAULT NULL,
  `createDate` datetime DEFAULT NULL,
  `verified` int(11) NOT NULL DEFAULT 0,
  `verificationCode` varchar(500) DEFAULT NULL,
  `editTime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_username`, `user_password`, `user_name`, `role_id`, `user_avatar`, `user_email`, `user_phone`, `user_address`, `createDate`, `verified`, `verificationCode`, `editTime`) VALUES
(1040, 'admin', 'e807f1fcf82d132f9bb018ca6738a19f', 'Át min', 1, 'author-auto.png', 'admin@gmail.com', '0123456789', 'Cần Thơ', '2020-04-11 02:43:23', 0, 'aca75e03278fa33d61ce42889ea19ed3', '2023-04-24 22:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `session` varchar(100) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL DEFAULT 0,
  `ip` varchar(34) NOT NULL,
  `browser` varchar(550) NOT NULL,
  `dateonline` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`session`, `time`, `ip`, `browser`, `dateonline`) VALUES
('2v86tmijrg2jdt6e2tbt2ucta5', 1682348452, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', '2023-04-24 22:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `vnpay`
--

CREATE TABLE `vnpay` (
  `id_vnpay` int(11) NOT NULL,
  `vnp_TmnCode` varchar(50) NOT NULL,
  `vnp_Amount` float NOT NULL,
  `vnp_OrderInfo` varchar(50) NOT NULL,
  `vnp_TransactionNo` varchar(50) NOT NULL,
  `vnp_BankCode` varchar(50) NOT NULL,
  `vnp_PayDate` varchar(50) NOT NULL,
  `code_order` varchar(50) NOT NULL,
  `vnp_CardType` varchar(50) NOT NULL,
  `vnp_BankTranNo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_user`
--
ALTER TABLE `cart_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_user` (`user_id`),
  ADD KEY `fk_id_product` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_supply_id` (`supply_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_product` (`product_id`),
  ADD KEY `fk_id_user` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_product_id` (`product_id`),
  ADD KEY `fk_order_id` (`order_id`);

--
-- Indexes for table `introduce`
--
ALTER TABLE `introduce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_footers`
--
ALTER TABLE `menu_footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_user` (`user_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_id` (`order_id`),
  ADD KEY `fk_id_product` (`product_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_author` (`post_author`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_id` (`category_id`),
  ADD KEY `fk_supply_id` (`supply_id`),
  ADD KEY `fk_type_id` (`product_typeid`),
  ADD KEY `fk_id_sub_category` (`sub_category_id`);

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
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_id` (`category_id`),
  ADD KEY `fk_supply_id` (`supply_id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_role` (`role_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`session`);

--
-- Indexes for table `vnpay`
--
ALTER TABLE `vnpay`
  ADD PRIMARY KEY (`id_vnpay`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_user`
--
ALTER TABLE `cart_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=560;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `introduce`
--
ALTER TABLE `introduce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `menu_footers`
--
ALTER TABLE `menu_footers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1045;

--
-- AUTO_INCREMENT for table `vnpay`
--
ALTER TABLE `vnpay`
  MODIFY `id_vnpay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
