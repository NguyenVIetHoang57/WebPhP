-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 01:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(50, 'Laptop Acer', '2023-05-24 12:16:37', '2023-05-24 14:30:45'),
(51, 'PC Gaming', '2023-05-24 13:33:13', '2023-05-24 13:33:13'),
(52, 'PC Components', '2023-05-24 13:13:44', '2023-05-24 13:13:44'),
(53, 'Laptop Components', '2023-05-24 13:20:44', '2023-05-24 13:20:44'),
(54, 'Laptop Lenovo', '2023-05-25 05:09:49', '2023-05-25 05:09:49'),
(55, 'Laptop Asus', '2023-05-25 05:20:49', '2023-05-25 05:20:49'),
(56, 'Laptop Gigabyte', '2023-05-25 05:43:49', '2023-05-25 05:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment_text` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_id` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `rating` int(11) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment_text`, `created_at`, `product_id`, `phone`, `rating`, `username`) VALUES
(21, 'test', '2023-06-05 13:56:10', 49, '0916390444', 5, 'root'),
(22, 'abc', '2023-06-05 13:57:18', 49, '09163944444', 2, 'admin'),
(23, 'alo 1 2 3 4', '2023-06-06 08:53:21', 54, '', 5, 'A B C X Y Z'),
(24, 'ABC', '2023-06-06 10:43:39', 54, '0916390444', 3, 'admin'),
(27, 'khong co gi', '2023-06-06 23:20:11', 49, '0916390444', 2, 'thien');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `phone_number`, `email`, `address`, `note`, `order_date`) VALUES
(172, 'Dương Cao Thiên', '243242342', 'asda@adasd123', 'asdasd', 'asdad', '2023-05-24 13:03:52'),
(173, 'ád', '2342342342342', 'adsadad@adasd', 'asdasd', 'dfgdfg', '2023-05-24 13:16:50'),
(174, 'Dương Cao Thiên', '2342342342342', 'duongcaothien100801hiie@gmail.com', 'aaaa', '', '2023-05-24 14:03:49'),
(175, 'Dương Cao Thiên', '2342342342342', 'asda@adasd123', 'abc', '', '2023-05-24 14:05:43'),
(176, 'asd', '2342342342342', 'asda@adasd123', 'asdasd', 'asda', '2023-05-24 16:30:57'),
(177, 'abc', '0235467891', 'adm@gmail.com', 'abc', 'khong can gi het', '2023-05-25 06:05:06'),
(178, 'asd', 'asd', 'asd@gmail.com', 'asd', 'as', '2023-06-02 11:40:54'),
(179, 'asd', 'asd', 'asd@sdadsa', 'asd', 'asd', '2023-06-02 11:41:22'),
(180, 'Dương Cao Thiên', '2342342342342', 'duongcaothien100801hiie@gmail.com', 'asd', 'áđậ0dap', '2023-06-02 11:57:10'),
(181, 'Thien Duong1', '0916390915', 'duongcaothien100801@gmail.com', 'ubuuy', 'uhuhu', '2023-06-03 13:07:40'),
(182, 'Thien Duong', '0916390915', 'duongcaothien100801@gmail.com', 'gjgh', 'ghjgj', '2023-06-03 13:17:27'),
(183, 'Thien Duong abc', '0916390915', 'duongcaothien100801@gmail.com', 's', 'test', '2023-06-03 13:26:38'),
(184, 'Thien Duong abc', '0916390915', 'duongcaothien100801@gmail.com', 's', 'oi', '2023-06-03 13:26:51'),
(185, 'Thien Duong', '0916390915', 'duongcaothien100801@gmail.com', 'abcd', 'test', '2023-06-03 13:31:56'),
(186, 'Dương Cao Thiên', '2342342342342', 'duongcaothien100801hiie@gmail.com', 'asd', 'test', '2023-06-03 13:58:55'),
(187, 'Dương Cao Thiên', '2342342342342', 'duongcaothien100801hiie@gmail.com', 'asd', 'tst', '2023-06-03 14:00:20'),
(188, 'asd', '2342342342342', 'duongcaothien100801hiie@gmail.com', 'a', '2', '2023-06-03 14:04:45'),
(189, 'Dương Cao Thiên', '2342342342342', 'duongcaothien100801hiie@gmail.com', 'asd', 'sdasd', '2023-06-03 14:05:09'),
(190, 'sad', '2342342342342', 'duongcaothien100801hiie@gmail.com', 'asd', 'sd', '2023-06-03 14:08:13'),
(191, 'Dương Cao Thiên', '0235467891', 'duongcaothien100801hiie@gmail.com', 'ho chi minh', 'test', '2023-06-03 14:09:33'),
(192, 'Dương Cao Thiên', '0235467891', 'duongcaothien100801hiie@gmail.com', 'sdfs', 'tét', '2023-06-03 17:18:59'),
(193, 'Dương Cao Thiên', '0235467891', 'duongcaothien100801hiie@gmail.com', 'Tp. HCM', 'Test Chức năng', '2023-06-04 10:54:17'),
(194, 'Dương Cao Thiên', '0235467891', 'duongcaothien100801hiie@gmail.com', 'hcm', 'asd', '2023-06-05 14:49:51'),
(195, 'Dương Cao Thiên', '0235467891', 'duongcaothien100801hiie@gmail.com', 'asda', 'tesst', '2023-06-06 09:56:46'),
(196, 'Dương Cao Thiên', '0235467891', 'kenduong2k@gmail.com', 'asdasd', 'tesst', '2023-06-06 09:58:12'),
(197, 'Dương Cao Thiên', '2342342342342', 'kenduong2k@gmail.com', 'asda', 'tesst', '2023-06-06 09:59:46'),
(198, 'Dương Cao Thiên', '0235467891', 'kenduong2k@gmail.com', 'asd', 'test', '2023-06-06 10:01:11'),
(199, 'Dương Cao Thiên', '0235467891', 'kenduong2k@gmail.com', 'abc', 'test', '2023-06-06 12:03:18'),
(200, 'Dương Cao Thiên', '0235467891', 'kenduong2k@gmail.com', 'Tp. HCM', 'test', '2023-06-06 12:05:13'),
(201, 'Dương Cao Thiên', '0235467891', 'kenduong2k@gmail.com', 'Tp. HCM', 'test', '2023-06-06 12:05:44'),
(202, 'Dương Cao Thiên', '0235467891', 'duongcaothien100801hiie@gmail.com', 'asda', 'test a b c', '2023-06-06 12:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `id_user`, `num`, `price`, `status`) VALUES
(187, 176, 49, 1, 1, 29000000, 'Has received the goods'),
(188, 177, 49, 1, 1, 29000200, 'Preparing'),
(189, 178, 52, 1, 1, 32000000, 'Preparing'),
(190, 179, 49, 1, 344, 19900000, 'Preparing'),
(191, 180, 49, 1, 4, 19900000, 'Preparing'),
(192, 181, 49, 0, 55, 19900000, 'Preparing'),
(193, 182, 49, 0, 2, 19900000, 'Preparing'),
(194, 183, 49, 0, 1, 19900000, 'Preparing'),
(195, 184, 49, 0, 1, 19900000, 'Preparing'),
(196, 185, 49, 0, 5, 19900000, 'Preparing'),
(197, 186, 49, 0, 5, 19900000, 'Preparing'),
(198, 188, 49, 0, 1, 19900000, 'Đang chuẩn bị'),
(199, 189, 49, 0, 1, 19900000, 'Đang chuẩn bị'),
(200, 190, 49, 1, 1, 19900000, 'Preparing'),
(201, 191, 49, 1, 15, 19900000, 'Preparing'),
(202, 192, 49, 1, 45, 19900000, 'Preparing'),
(203, 193, 54, 1, 1, 33990000, 'Preparing'),
(204, 194, 49, 1, 6, 19900000, 'Preparing'),
(205, 195, 49, 0, 1, 19900000, 'Preparing'),
(206, 196, 49, 1, 1, 19900000, 'Preparing'),
(207, 197, 49, 1, 1, 19900000, 'Cancelled'),
(208, 198, 49, 1, 1, 19900000, 'Cancelled'),
(209, 198, 50, 1, 1, 15000000, 'Cancelled'),
(210, 198, 51, 1, 1, 8899000, 'Cancelled'),
(211, 198, 52, 1, 1, 32000000, 'Cancelled'),
(212, 199, 55, 1, 1, 67990000, 'Preparing'),
(213, 200, 55, 1, 1, 67990000, 'Preparing'),
(214, 201, 49, 1, 2001, 19900000, 'Preparing'),
(215, 202, 54, 1, 1, 33990000, 'Preparing');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `number` float NOT NULL,
  `thumbnail` varchar(500) NOT NULL,
  `thumbnail_1` varchar(500) NOT NULL,
  `thumbnail_2` varchar(500) NOT NULL,
  `thumbnail_3` varchar(500) NOT NULL,
  `thumbnail_4` varchar(500) NOT NULL,
  `thumbnail_5` varchar(500) NOT NULL,
  `content` longtext NOT NULL,
  `id_category` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `id_sanpham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `number`, `thumbnail`, `thumbnail_1`, `thumbnail_2`, `thumbnail_3`, `thumbnail_4`, `thumbnail_5`, `content`, `id_category`, `created_at`, `updated_at`, `id_sanpham`) VALUES
(49, 'Laptop Gaming Acer Nitro 5 Eagle AN515-57-54MV NH.QENSV.003 (Core i5-11400H | 8GB | 512GB | RTX™ 3050 4GB | 15.6 inch FHD | Win 11 | Đen)', 19900000, 30, 'uploads/1.jpg', 'uploads/2.jpg', 'uploads/3.jpg', '', '', '', '<p><span class=\"item \" style=\"display: block; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><span class=\"fa fa-check-circle\" style=\"display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: 900; font-stretch: normal; line-height: 1; font-family: \"Font Awesome 5 Free\"; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; color: rgb(255, 153, 0); margin-right: 5px;\"></span>CPU: Intel® Core i5-11400H (upto 4.50 GHz, 12MB)</span><span class=\"item \" style=\"display: block; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><span class=\"fa fa-check-circle\" style=\"display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: 900; font-stretch: normal; line-height: 1; font-family: \"Font Awesome 5 Free\"; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; color: rgb(255, 153, 0); margin-right: 5px;\"></span>RAM: 8GB khe rời DDR4 3200MHz (2 khe, tối đa 32GB)</span><span class=\"item \" style=\"display: block; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><span class=\"fa fa-check-circle\" style=\"display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: 900; font-stretch: normal; line-height: 1; font-family: \"Font Awesome 5 Free\"; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; color: rgb(255, 153, 0); margin-right: 5px;\"></span>Ổ cứng: 512GB PCIe NVMe SSD</span><span class=\"item \" style=\"display: block; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><span class=\"fa fa-check-circle\" style=\"display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: 900; font-stretch: normal; line-height: 1; font-family: \"Font Awesome 5 Free\"; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; color: rgb(255, 153, 0); margin-right: 5px;\"></span>VGA: NVIDIA® GeForce RTX™ 3050 4GB GDDR6</span><span class=\"item hide d-block\" style=\"display: none; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><span class=\"fa fa-check-circle\" style=\"display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: 900; font-stretch: normal; line-height: 1; font-family: \"Font Awesome 5 Free\"; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; color: rgb(255, 153, 0); margin-right: 5px;\"></span>Màn hình: 15.6 inch FHD(1920 x 1080) IPS 144Hz SlimBezel, Acer ComfyView LED-backlit TFT LCD</span><span class=\"item hide d-block\" style=\"display: none; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><span class=\"fa fa-check-circle\" style=\"display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: 900; font-stretch: normal; line-height: 1; font-family: \"Font Awesome 5 Free\"; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; color: rgb(255, 153, 0); margin-right: 5px;\"></span>Pin: 4-cell, 57.5 Wh</span><span class=\"item hide d-block\" style=\"display: none; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><span class=\"fa fa-check-circle\" style=\"display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: 900; font-stretch: normal; line-height: 1; font-family: \"Font Awesome 5 Free\"; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; color: rgb(255, 153, 0); margin-right: 5px;\"></span>Cân nặng: 2.2 kg</span><span class=\"item hide d-block\" style=\"display: none; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><span class=\"fa fa-check-circle\" style=\"display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: 900; font-stretch: normal; line-height: 1; font-family: \"Font Awesome 5 Free\"; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; color: rgb(255, 153, 0); margin-right: 5px;\"></span>Tính năng: Đèn nền bàn phím</span><span class=\"item hide d-block\" style=\"display: none; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><span class=\"fa fa-check-circle\" style=\"display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: 900; font-stretch: normal; line-height: 1; font-family: \"Font Awesome 5 Free\"; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; color: rgb(255, 153, 0); margin-right: 5px;\"></span>Màu sắc: Đen</span><span class=\"item hide d-block\" style=\"display: none; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><span class=\"fa fa-check-circle\" style=\"display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: 900; font-stretch: normal; line-height: 1; font-family: \"Font Awesome 5 Free\"; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; color: rgb(255, 153, 0); margin-right: 5px;\"></span>OS: Windows 11</span></p>', 50, '2023-05-24 12:04:38', '2023-06-07 01:15:08', 0),
(50, 'PC Gaming GM08 11th Core I7 11700F | 16G | RTX2060 6G | 27inch', 15000000, 20, 'uploads/4.jpg', 'uploads/55.jpg', 'uploads/66.jpg', '', '', '', '<p><b>Thông số kĩ thuật</b></p><p>Tên : GM08</p><p>CPU: Intel® Core i7-11700F (2.5GHz turbo up to 4.9Ghz, 8 nhân 16 luồng, 16MB Cache, 65W)</p><p>Ram: Ram Adata 16G/3200MHz DDR4 XPG RED RGB Tản Nhiệt ( 2 * 8G )</p><p>Main: GIGABYTE B560M AORUS PRO (Intel B560, Socket 1200)</p><p>Card: Card màn hình NVIDIA RTX 2060 6G</p>', 51, '2023-05-24 13:31:14', '2023-06-07 01:58:09', 0),
(51, 'VGA MSI GeForce RTX 3060 VENTUS 3X 12G OC', 8899000, 333, 'uploads/36229_product_1610444356cd57d92b6aec488c9abcb8566aaef5df.png', '', '', '', '', '', '<p><span class=\"item \" style=\"display: block; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\">Dung lượng bộ nhớ: 12GB GDDR6</span><span class=\"item \" style=\"display: block; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><span class=\"fa fa-check-circle\" style=\"display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: 900; font-stretch: normal; line-height: 1; font-family: &quot;Font Awesome 5 Free&quot;; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; color: rgb(255, 153, 0); margin-right: 5px;\"></span>Core Clock: Boost: 1807 MHz</span><span class=\"item \" style=\"display: block; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><span class=\"fa fa-check-circle\" style=\"display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: 900; font-stretch: normal; line-height: 1; font-family: &quot;Font Awesome 5 Free&quot;; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; color: rgb(255, 153, 0); margin-right: 5px;\"></span>Băng thông: 192-bit</span><span class=\"item \" style=\"display: block; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><span class=\"fa fa-check-circle\" style=\"display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: 900; font-stretch: normal; line-height: 1; font-family: &quot;Font Awesome 5 Free&quot;; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; color: rgb(255, 153, 0); margin-right: 5px;\"></span>Kết nối: DisplayPort x 3 (v1.4a)/HDMI x 1 (Supports 4K@120Hz as specified in HDMI 2.1)</span><span class=\"item hide d-block\" style=\"display: none; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><span class=\"fa fa-check-circle\" style=\"display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: 900; font-stretch: normal; line-height: 1; font-family: &quot;Font Awesome 5 Free&quot;; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; color: rgb(255, 153, 0); margin-right: 5px;\"></span>Nguồn yêu cầu: 550 W</span></p>', 52, '2023-05-24 14:52:19', '2023-06-02 06:44:35', 0),
(52, 'Laptop Gaming Acer Nitro 5 Tiger AN515-58-773Y NH.QFKSV.001 (Core™ i7-12700H | 8GB | 512GB | RTX™ 3050Ti 4GB | 15.6 inch FHD | Win 11 | Đen)', 32000000, 20, 'uploads/7864_6927_nitro5_an515_58_wallpaper_win11_rgbkb_light_on_black_01_min.png', '', '', '', '', '', '<p><span class=\"item \" style=\"display: block; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\">CPU: Intel® Core™ i7-12700H (upto 4.70 GHz, 24MB)</span><span class=\"item \" style=\"display: block; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><span class=\"fa fa-check-circle\" style=\"display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: 900; font-stretch: normal; line-height: 1; font-family: &quot;Font Awesome 5 Free&quot;; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; color: rgb(255, 153, 0); margin-right: 5px;\"></span>RAM: 8GB khe rời DDR4 3200MHz (2 khe, tối đa 32GB)</span><span class=\"item \" style=\"display: block; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><span class=\"fa fa-check-circle\" style=\"display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: 900; font-stretch: normal; line-height: 1; font-family: &quot;Font Awesome 5 Free&quot;; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; color: rgb(255, 153, 0); margin-right: 5px;\"></span>Ổ cứng: 512GB PCIe NVMe SED SSD cắm sẵn (nâng cấp tối đa 2TB Gen4, 16 Gb/s, NVMe và 1 TB 2.5-inch 5400 RPM)</span><span class=\"item \" style=\"display: block; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><span class=\"fa fa-check-circle\" style=\"display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: 900; font-stretch: normal; line-height: 1; font-family: &quot;Font Awesome 5 Free&quot;; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; color: rgb(255, 153, 0); margin-right: 5px;\"></span>VGA: NVIDIA® GeForce RTX™ 3050Ti 4GB GDDR6</span><span class=\"item hide d-block\" style=\"display: none; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><span class=\"fa fa-check-circle\" style=\"display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: 900; font-stretch: normal; line-height: 1; font-family: &quot;Font Awesome 5 Free&quot;; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; color: rgb(255, 153, 0); margin-right: 5px;\"></span>Màn hình: 15.6 inch FHD(1920 x 1080) IPS 144Hz SlimBezel, Acer ComfyView LED-backlit TFT LCD</span><span class=\"item hide d-block\" style=\"display: none; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><span class=\"fa fa-check-circle\" style=\"display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: 900; font-stretch: normal; line-height: 1; font-family: &quot;Font Awesome 5 Free&quot;; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; color: rgb(255, 153, 0); margin-right: 5px;\"></span>Pin: 4-cell, 57.5 Wh</span><span class=\"item hide d-block\" style=\"display: none; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><span class=\"fa fa-check-circle\" style=\"display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: 900; font-stretch: normal; line-height: 1; font-family: &quot;Font Awesome 5 Free&quot;; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; color: rgb(255, 153, 0); margin-right: 5px;\"></span>Cân nặng: 2.5kg</span><span class=\"item hide d-block\" style=\"display: none; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><span class=\"fa fa-check-circle\" style=\"display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: 900; font-stretch: normal; line-height: 1; font-family: &quot;Font Awesome 5 Free&quot;; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; color: rgb(255, 153, 0); margin-right: 5px;\"></span>Tính năng: Bàn phím RGB 4 zone</span><span class=\"item hide d-block\" style=\"display: none; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><span class=\"fa fa-check-circle\" style=\"display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: 900; font-stretch: normal; line-height: 1; font-family: &quot;Font Awesome 5 Free&quot;; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; color: rgb(255, 153, 0); margin-right: 5px;\"></span>Màu sắc: Obsidian Black</span><span class=\"item hide d-block\" style=\"display: none; margin-bottom: 5px; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 14px;\"><span class=\"fa fa-check-circle\" style=\"display: inline-block; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-weight: 900; font-stretch: normal; line-height: 1; font-family: &quot;Font Awesome 5 Free&quot;; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; color: rgb(255, 153, 0); margin-right: 5px;\"></span>OS: Windows 11 Home</span></p>', 50, '2023-05-24 16:05:28', '2023-06-02 06:21:28', 0),
(53, 'RAM Laptop DDR4 Crucial 32GB Bus 3200 SODIMM CT32G4SFD832A (by Micron)', 2200000, 10, 'uploads/RAM-Laptop-DDR4-Crucial-32GB-Bus-3200-SODIMM-CT32G4SFD832A-hinh-1.jpg', '', '', '', '', '', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(102, 102, 102); font-family: Arial, sans-serif; font-size: 14px;\">Mô tả:</p><ul style=\"margin-bottom: 10px; padding: 0px 0px 0px 20px; color: rgb(102, 102, 102); font-family: Arial, sans-serif; font-size: 14px;\"><li>Loại: RAM&nbsp;Laptop</li><li>Dung lượng: 32GB</li><li>Bus: 3200</li><li>Điện Áp: 1.2V</li><li>Bảo hành 36 tháng</li></ul>', 53, '2023-05-24 16:24:30', '2023-06-02 06:40:37', 0),
(54, 'Lenovo Legion 5 17ITH6H (2021)', 33990000, 30, 'uploads/lenovo-legion-5-17ach6h-6-1634636539.jpg', '', '', '', '', '', '<ul class=\"product__info\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; color: rgb(51, 51, 51); font-family: SFProText; font-size: 14px;\"><li style=\"list-style: none; padding-bottom: 10px;\"><span style=\"font-weight: bolder;\">CPU: </span>Intel® Core™ i7-11800H (24MB Cache, up to 4.6 GHz, 8 cores)</li><li style=\"list-style: none; padding-bottom: 10px;\"><span style=\"font-weight: bolder;\">Ram: </span>16GB SO-DIMM DDR4 3200MHz</li><li style=\"list-style: none; padding-bottom: 10px;\"><span style=\"font-weight: bolder;\">Ổ cứng: </span>1 TB M.2 2242 SSD</li><li style=\"list-style: none; padding-bottom: 10px;\"><span style=\"font-weight: bolder;\">Màn hình: </span>17.3\" FHD IPS (1920 x 1080) 144Hz refresh rate, 72% NTSC, 300 nits</li><li style=\"list-style: none; padding-bottom: 10px;\"><span style=\"font-weight: bolder;\">Card đồ họa: </span>NVIDIA® GeForce® RTX™ 3060 6GB GDDR6</li><li style=\"list-style: none; padding-bottom: 10px;\"><span style=\"font-weight: bolder;\">Tình trạng: </span>Hàng New, Nguyên Seal, Nhập Khẩu</li></ul>', 54, '2023-06-04 10:23:51', '2023-06-04 10:16:52', 0),
(55, 'Laptop Asus Rog Strix Scar 15 G533ZS-LN036W', 67990000, 20, 'uploads/asus-rog-strix-scar-2022-armor-cap - Copy.jpg', 'uploads/scar-d1.jpeg', 'uploads/laptop-asus-rog-strix-scar-15-g533zs-ln036w-3.webp', '', '', '', '<ul class=\"technical-content-modal\" style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 10px; list-style: none; width: 483px; color: rgb(74, 74, 74); font-family: sans-serif;\"><li class=\"technical-content-modal-item m-3\" style=\"box-sizing: inherit; margin: 0.75rem !important; padding: 0px;\"><p class=\"title is-6 m-2\" style=\"box-sizing: inherit; margin-bottom: 1.5rem; padding: 0px; word-break: break-word; color: rgb(54, 54, 54); font-size: 1rem; font-weight: 600; line-height: 1.125;\">Vi xử lý & đồ họa</p><div class=\"modal-item-description mx-2\" style=\"box-sizing: inherit; border: 1px solid rgb(239, 239, 239); border-radius: 10px; font-size: 14px; overflow: hidden;\"><div class=\"px-3 py-2 is-flex is-align-items-center is-justify-content-space-between\" style=\"box-sizing: inherit; background-color: rgb(239, 239, 239); justify-content: space-between !important; align-items: center !important; padding-right: 0.75rem !important; padding-left: 0.75rem !important; display: flex !important;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; width: 125.094px;\">Loại card đồ họa</p><div style=\"box-sizing: inherit; width: 250.188px;\">NVIDIA® GeForce RTX™ 3080 Laptop GPU</div></div><div class=\"px-3 py-2 is-flex is-align-items-center is-justify-content-space-between\" style=\"box-sizing: inherit; justify-content: space-between !important; align-items: center !important; padding-right: 0.75rem !important; padding-left: 0.75rem !important; display: flex !important;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; width: 125.094px;\">Loại CPU</p><div style=\"box-sizing: inherit; width: 250.188px;\">12th Gen Intel® Core™ i9-12900H</div></div></div></li><li class=\"technical-content-modal-item m-3\" style=\"box-sizing: inherit; margin: 0.75rem !important; padding: 0px;\"><p class=\"title is-6 m-2\" style=\"box-sizing: inherit; margin-bottom: 1.5rem; padding: 0px; word-break: break-word; color: rgb(54, 54, 54); font-size: 1rem; font-weight: 600; line-height: 1.125;\">RAM & Ổ cứng</p><div class=\"modal-item-description mx-2\" style=\"box-sizing: inherit; border: 1px solid rgb(239, 239, 239); border-radius: 10px; font-size: 14px; overflow: hidden;\"><div class=\"px-3 py-2 is-flex is-align-items-center is-justify-content-space-between\" style=\"box-sizing: inherit; background-color: rgb(239, 239, 239); justify-content: space-between !important; align-items: center !important; padding-right: 0.75rem !important; padding-left: 0.75rem !important; display: flex !important;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; width: 125.094px;\">Dung lượng RAM</p><div style=\"box-sizing: inherit; width: 250.188px;\">32GB</div></div><div class=\"px-3 py-2 is-flex is-align-items-center is-justify-content-space-between\" style=\"box-sizing: inherit; justify-content: space-between !important; align-items: center !important; padding-right: 0.75rem !important; padding-left: 0.75rem !important; display: flex !important;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; width: 125.094px;\">Loại RAM</p><div style=\"box-sizing: inherit; width: 250.188px;\">DDR5</div></div><div class=\"px-3 py-2 is-flex is-align-items-center is-justify-content-space-between\" style=\"box-sizing: inherit; background-color: rgb(239, 239, 239); justify-content: space-between !important; align-items: center !important; padding-right: 0.75rem !important; padding-left: 0.75rem !important; display: flex !important;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; width: 125.094px;\">Số khe ram</p><div style=\"box-sizing: inherit; width: 250.188px;\">2x DDR5 SO-DIMM slots 2x PCIe</div></div><div class=\"px-3 py-2 is-flex is-align-items-center is-justify-content-space-between\" style=\"box-sizing: inherit; justify-content: space-between !important; align-items: center !important; padding-right: 0.75rem !important; padding-left: 0.75rem !important; display: flex !important;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; width: 125.094px;\">Ổ cứng</p><div style=\"box-sizing: inherit; width: 250.188px;\">2TB M.2 NVMe™ PCIe® 4.0 Performance SSD</div></div></div></li><li class=\"technical-content-modal-item m-3\" style=\"box-sizing: inherit; margin: 0.75rem !important; padding: 0px;\"><p class=\"title is-6 m-2\" style=\"box-sizing: inherit; margin-bottom: 1.5rem; padding: 0px; word-break: break-word; color: rgb(54, 54, 54); font-size: 1rem; font-weight: 600; line-height: 1.125;\">Màn hình</p><div class=\"modal-item-description mx-2\" style=\"box-sizing: inherit; border: 1px solid rgb(239, 239, 239); border-radius: 10px; font-size: 14px; overflow: hidden;\"><div class=\"px-3 py-2 is-flex is-align-items-center is-justify-content-space-between\" style=\"box-sizing: inherit; background-color: rgb(239, 239, 239); justify-content: space-between !important; align-items: center !important; padding-right: 0.75rem !important; padding-left: 0.75rem !important; display: flex !important;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; width: 125.094px;\">Kích thước màn hình</p><div style=\"box-sizing: inherit; width: 250.188px;\">15.6 inches</div></div><div class=\"px-3 py-2 is-flex is-align-items-center is-justify-content-space-between\" style=\"box-sizing: inherit; justify-content: space-between !important; align-items: center !important; padding-right: 0.75rem !important; padding-left: 0.75rem !important; display: flex !important;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; width: 125.094px;\">Độ phân giải màn hình</p><div style=\"box-sizing: inherit; width: 250.188px;\">2560x1440 (Quad HD)</div></div><div class=\"px-3 py-2 is-flex is-align-items-center is-justify-content-space-between\" style=\"box-sizing: inherit; background-color: rgb(239, 239, 239); justify-content: space-between !important; align-items: center !important; padding-right: 0.75rem !important; padding-left: 0.75rem !important; display: flex !important;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; width: 125.094px;\">Màn hình cảm ứng</p><div style=\"box-sizing: inherit; width: 250.188px;\">Không</div></div><div class=\"px-3 py-2 is-flex is-align-items-center is-justify-content-space-between\" style=\"box-sizing: inherit; justify-content: space-between !important; align-items: center !important; padding-right: 0.75rem !important; padding-left: 0.75rem !important; display: flex !important;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; width: 125.094px;\">Chất liệu tấm nền</p><div style=\"box-sizing: inherit; width: 250.188px;\">Tấm nền IPS</div></div></div></li><li class=\"technical-content-modal-item m-3\" style=\"box-sizing: inherit; margin: 0.75rem !important; padding: 0px;\"><p class=\"title is-6 m-2\" style=\"box-sizing: inherit; margin-bottom: 1.5rem; padding: 0px; word-break: break-word; color: rgb(54, 54, 54); font-size: 1rem; font-weight: 600; line-height: 1.125;\">Giao tiếp & kết nối</p><div class=\"modal-item-description mx-2\" style=\"box-sizing: inherit; border: 1px solid rgb(239, 239, 239); border-radius: 10px; font-size: 14px; overflow: hidden;\"><div class=\"px-3 py-2 is-flex is-align-items-center is-justify-content-space-between\" style=\"box-sizing: inherit; background-color: rgb(239, 239, 239); justify-content: space-between !important; align-items: center !important; padding-right: 0.75rem !important; padding-left: 0.75rem !important; display: flex !important;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; width: 125.094px;\">Hệ điều hành</p><div style=\"box-sizing: inherit; width: 250.188px;\">Windows 11 Home</div></div><div class=\"px-3 py-2 is-flex is-align-items-center is-justify-content-space-between\" style=\"box-sizing: inherit; justify-content: space-between !important; align-items: center !important; padding-right: 0.75rem !important; padding-left: 0.75rem !important; display: flex !important;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; width: 125.094px;\">Wi-Fi</p><div style=\"box-sizing: inherit; width: 250.188px;\">Wi-Fi 6E</div></div><div class=\"px-3 py-2 is-flex is-align-items-center is-justify-content-space-between\" style=\"box-sizing: inherit; background-color: rgb(239, 239, 239); justify-content: space-between !important; align-items: center !important; padding-right: 0.75rem !important; padding-left: 0.75rem !important; display: flex !important;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; width: 125.094px;\">Bluetooth</p><div style=\"box-sizing: inherit; width: 250.188px;\">Bluetooth 5.2</div></div></div></li><li class=\"technical-content-modal-item m-3\" style=\"box-sizing: inherit; margin: 0.75rem !important; padding: 0px;\"><p class=\"title is-6 m-2\" style=\"box-sizing: inherit; margin-bottom: 1.5rem; padding: 0px; word-break: break-word; color: rgb(54, 54, 54); font-size: 1rem; font-weight: 600; line-height: 1.125;\">Công nghệ âm thanh</p><div class=\"modal-item-description mx-2\" style=\"box-sizing: inherit; border: 1px solid rgb(239, 239, 239); border-radius: 10px; font-size: 14px; overflow: hidden;\"><div class=\"px-3 py-2 is-flex is-align-items-center is-justify-content-space-between\" style=\"box-sizing: inherit; background-color: rgb(239, 239, 239); justify-content: space-between !important; align-items: center !important; padding-right: 0.75rem !important; padding-left: 0.75rem !important; display: flex !important;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; width: 125.094px;\">Công nghệ âm thanh</p><div style=\"box-sizing: inherit; width: 250.188px;\">1x 3.5mm Combo Audio Jack</div></div></div></li><li class=\"technical-content-modal-item m-3\" style=\"box-sizing: inherit; margin: 0.75rem !important; padding: 0px;\"><p class=\"title is-6 m-2\" style=\"box-sizing: inherit; margin-bottom: 1.5rem; padding: 0px; word-break: break-word; color: rgb(54, 54, 54); font-size: 1rem; font-weight: 600; line-height: 1.125;\">Tiện ích khác</p><div class=\"modal-item-description mx-2\" style=\"box-sizing: inherit; border: 1px solid rgb(239, 239, 239); border-radius: 10px; font-size: 14px; overflow: hidden;\"><div class=\"px-3 py-2 is-flex is-align-items-center is-justify-content-space-between\" style=\"box-sizing: inherit; background-color: rgb(239, 239, 239); justify-content: space-between !important; align-items: center !important; padding-right: 0.75rem !important; padding-left: 0.75rem !important; display: flex !important;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; width: 125.094px;\">Tính năng đặc biệt</p><div style=\"box-sizing: inherit; width: 250.188px;\">Ổ cứng SSD, Wi-Fi 6</div></div></div></li><li class=\"technical-content-modal-item m-3\" style=\"box-sizing: inherit; margin: 0.75rem !important; padding: 0px;\"><p class=\"title is-6 m-2\" style=\"box-sizing: inherit; margin-bottom: 1.5rem; padding: 0px; word-break: break-word; color: rgb(54, 54, 54); font-size: 1rem; font-weight: 600; line-height: 1.125;\">Thông số khác</p><div class=\"modal-item-description mx-2\" style=\"box-sizing: inherit; border: 1px solid rgb(239, 239, 239); border-radius: 10px; font-size: 14px; overflow: hidden;\"><div class=\"px-3 py-2 is-flex is-align-items-center is-justify-content-space-between\" style=\"box-sizing: inherit; background-color: rgb(239, 239, 239); justify-content: space-between !important; align-items: center !important; padding-right: 0.75rem !important; padding-left: 0.75rem !important; display: flex !important;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; width: 125.094px;\">Hãng sản xuất</p><div style=\"box-sizing: inherit; width: 250.188px;\">ASUS</div></div></div></li><li class=\"technical-content-modal-item m-3\" style=\"box-sizing: inherit; margin: 0.75rem !important; padding: 0px;\"><p class=\"title is-6 m-2\" style=\"box-sizing: inherit; margin-bottom: 1.5rem; padding: 0px; word-break: break-word; color: rgb(54, 54, 54); font-size: 1rem; font-weight: 600; line-height: 1.125;\">Thông số kỹ thuật</p><div class=\"modal-item-description mx-2\" style=\"box-sizing: inherit; border: 1px solid rgb(239, 239, 239); border-radius: 10px; font-size: 14px; overflow: hidden;\"><div class=\"px-3 py-2 is-flex is-align-items-center is-justify-content-space-between\" style=\"box-sizing: inherit; background-color: rgb(239, 239, 239); justify-content: space-between !important; align-items: center !important; padding-right: 0.75rem !important; padding-left: 0.75rem !important; display: flex !important;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; width: 125.094px;\">Cổng giao tiếp</p><div style=\"box-sizing: inherit; width: 250.188px;\">1x 2.5G LAN port 1x Thunderbolt™ 4 support DisplayPort™ 1x USB 3.2 Gen 2 Type-C support DisplayPort™ / power delivery / G-SYNC 2x USB 3.2 Gen 1 Type-A</div></div></div></li><li class=\"technical-content-modal-item m-3\" style=\"box-sizing: inherit; margin: 0.75rem !important; padding: 0px;\"><p class=\"title is-6 m-2\" style=\"box-sizing: inherit; margin-bottom: 1.5rem; padding: 0px; word-break: break-word; color: rgb(54, 54, 54); font-size: 1rem; font-weight: 600; line-height: 1.125;\">Pin & công nghệ sạc</p><div class=\"modal-item-description mx-2\" style=\"box-sizing: inherit; border: 1px solid rgb(239, 239, 239); border-radius: 10px; font-size: 14px; overflow: hidden;\"><div class=\"px-3 py-2 is-flex is-align-items-center is-justify-content-space-between\" style=\"box-sizing: inherit; background-color: rgb(239, 239, 239); justify-content: space-between !important; align-items: center !important; padding-right: 0.75rem !important; padding-left: 0.75rem !important; display: flex !important;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; width: 125.094px;\">Pin</p><div style=\"box-sizing: inherit; width: 250.188px;\">90WHrs, 4S1P, 4-cell Li-ion</div></div></div></li><li class=\"technical-content-modal-item m-3\" style=\"box-sizing: inherit; margin: 0.75rem !important; padding: 0px;\"><p class=\"title is-6 m-2\" style=\"box-sizing: inherit; margin-bottom: 1.5rem; padding: 0px; word-break: break-word; color: rgb(54, 54, 54); font-size: 1rem; font-weight: 600; line-height: 1.125;\">Thiết kế & Trọng lượng</p><div class=\"modal-item-description mx-2\" style=\"box-sizing: inherit; border: 1px solid rgb(239, 239, 239); border-radius: 10px; font-size: 14px; overflow: hidden;\"><div class=\"px-3 py-2 is-flex is-align-items-center is-justify-content-space-between\" style=\"box-sizing: inherit; background-color: rgb(239, 239, 239); justify-content: space-between !important; align-items: center !important; padding-right: 0.75rem !important; padding-left: 0.75rem !important; display: flex !important;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; width: 125.094px;\">Kích thước</p><div style=\"box-sizing: inherit; width: 250.188px;\">35.4 x 25.9 x 2.26 ~ 2.72 cm</div></div><div class=\"px-3 py-2 is-flex is-align-items-center is-justify-content-space-between\" style=\"box-sizing: inherit; justify-content: space-between !important; align-items: center !important; padding-right: 0.75rem !important; padding-left: 0.75rem !important; display: flex !important;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; width: 125.094px;\">Trọng lượng</p><div style=\"box-sizing: inherit; width: 250.188px;\">2.30 kg</div></div></div></li></ul>', 55, '2023-06-06 11:52:02', '2023-06-06 12:55:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `tenadmin` varchar(100) NOT NULL,
  `tendangnhap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `dienthoai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `tenadmin`, `tendangnhap`, `email`, `diachi`, `matkhau`, `dienthoai`) VALUES
(1, 'thien', 'Admin', 'admin@gmail.com', 'TPHCM', '1', '012345678');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dangky`
--

CREATE TABLE `tbl_dangky` (
  `id_dangky` int(11) NOT NULL,
  `tenkhachhang` varchar(200) NOT NULL,
  `tendangnhap` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `dienthoai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_dangky`
--

INSERT INTO `tbl_dangky` (`id_dangky`, `tenkhachhang`, `tendangnhap`, `email`, `diachi`, `matkhau`, `dienthoai`) VALUES
(111, 'Dương Cao Thiên1', 'dct', 'duongcaothien100801hiie@gmail.com', 'Tp.HCM Quận Bình Thạnh', 'tB5pc6sxbB', '0123456789'),
(112, 'abc', 'adm', 'adm@gmail.com', 'hochiminh', '123', '0234567891'),
(113, 'duongcaothien', 'dct1', 'kenduong2k@gmail.com', 'Tp.HCM', 'pDlbcqgdqw', '12356756750'),
(114, 'duongcaothien', 'dct11', 'kubi2k13@gmail.com', 'Tp. HCM', 'GSNzF1nLCo', '0234567891'),
(115, 'Thien Duong', 'DuongCaoThien', 'duongcaothien100801@gmail.com', 'Tp.HCM Q.BinhThanh', '1', '09163909555');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  ADD PRIMARY KEY (`id_dangky`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `id_dangky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
