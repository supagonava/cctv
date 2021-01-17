-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2021 at 09:11 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cctv`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `home_no` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'บ้านเลขที่',
  `village` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'หมู่ที่',
  `road` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ถนน',
  `zoi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ซอย',
  `district` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ตำบล',
  `amphures` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'อำเภอ',
  `province` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'จังหวัด',
  `post_code` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'รหัสไปรษณีย์',
  `user_id` int(11) DEFAULT NULL COMMENT 'สำหรับผู้ใช้',
  `store_id` int(11) DEFAULT NULL COMMENT 'สำหรับร้านค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ชื่อหมวดหมู่'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shipment_method` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ประเภทขนส่ง',
  `tracking_number` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'เลขพัสดุ',
  `date` date NOT NULL COMMENT 'วันที่',
  `file_slip` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'สลิป',
  `total_price` float NOT NULL COMMENT 'ราคา',
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ordersproducts`
--

CREATE TABLE `ordersproducts` (
  `product_id` int(11) NOT NULL COMMENT 'สินค้า',
  `order_id` int(11) NOT NULL COMMENT 'รหัสออเดอร์',
  `qty` int(11) NOT NULL COMMENT 'จำนวน (ชิ้น)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` int(200) NOT NULL COMMENT 'ชื่อสินค้า',
  `category_id` int(11) NOT NULL COMMENT 'หมวดหมู่',
  `price` float NOT NULL COMMENT 'ราคา',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'รายละเอียด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productscontent`
--

CREATE TABLE `productscontent` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL COMMENT 'สินค้า',
  `file_path` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'รูป',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'รายละเอียดรูป'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ชื่อ',
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'นามสกุล',
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'เบอร์โทรศัพท์',
  `facebook` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'เฟสบุ๊ค',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'อีเมล',
  `line ID` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ไลน์',
  `Room Size` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ขนาดห้อง',
  `bugget` float DEFAULT NULL COMMENT 'งบประมาณที่มี',
  `user_id` int(11) DEFAULT NULL COMMENT 'ผู้เสนอราคา',
  `create_at` timestamp NULL DEFAULT NULL COMMENT 'ทำรายการเมื่อ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotationcontent`
--

CREATE TABLE `quotationcontent` (
  `id` int(11) NOT NULL,
  `file_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'รูปภาพ',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'รายละเอียด',
  `q_id` int(11) NOT NULL COMMENT 'รหัสใบเสนอราคา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reply_sheet`
--

CREATE TABLE `reply_sheet` (
  `id` int(11) NOT NULL,
  `real_price` float NOT NULL COMMENT 'ราคาจริง',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'คำอธิบาย',
  `store_id` int(11) DEFAULT NULL COMMENT 'ผู้ตอบใบเสนอราคา',
  `q_id` int(11) NOT NULL COMMENT 'ใบเสนอราคา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ชื่อบทบาท',
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'คำอธิบายเช่น สามารถจัดการสินค้าได้,ตั้งค่าที่อยู่ได้'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles_users`
--

CREATE TABLE `roles_users` (
  `role_id` int(11) NOT NULL COMMENT 'บทบาท',
  `user_id` int(11) NOT NULL COMMENT 'ผู้ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ชื่อร้านค้า',
  `facebook` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'เฟสร้าน',
  `www` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'URL ร้านค้า',
  `line ID` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ไลน์ร้านค้า',
  `longtitude` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ลองติจูด',
  `Latitude` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ละติจูด',
  `map URL` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'URL แผนที่ร้าน',
  `user_id` int(11) NOT NULL COMMENT 'เจ้าของร้าน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ชื่อผู้ใช้',
  `password_hash` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'รหัสผ่าน',
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ชื่อ',
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'นามสกุล',
  `sex` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'เพศ',
  `dob` date DEFAULT NULL COMMENT 'วันเกิด',
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'เบอร์โทรศัพท์',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'อีเมล์',
  `lineId` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ไลน์',
  `facebook` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'เฟสบุค',
  `auth_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`, `firstname`, `lastname`, `sex`, `dob`, `phone`, `email`, `lineId`, `facebook`, `auth_key`, `create_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$o.fiM3GY3./oEbNDDSyjUOdyPhqlQUvZiFB2tGb55dw04/KbKH.5O', 'ศุภกร', 'เอมชนานนท์', '', NULL, '', '', '', '', '', NULL, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ordersproducts`
--
ALTER TABLE `ordersproducts`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `productscontent`
--
ALTER TABLE `productscontent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `quotationcontent`
--
ALTER TABLE `quotationcontent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `q_id` (`q_id`);

--
-- Indexes for table `reply_sheet`
--
ALTER TABLE `reply_sheet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `q_id` (`q_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_users`
--
ALTER TABLE `roles_users`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productscontent`
--
ALTER TABLE `productscontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reply_sheet`
--
ALTER TABLE `reply_sheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `address_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ordersproducts`
--
ALTER TABLE `ordersproducts`
  ADD CONSTRAINT `ordersproducts_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `ordersproducts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `productscontent`
--
ALTER TABLE `productscontent`
  ADD CONSTRAINT `productscontent_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `quotation`
--
ALTER TABLE `quotation`
  ADD CONSTRAINT `quotation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quotationcontent`
--
ALTER TABLE `quotationcontent`
  ADD CONSTRAINT `quotationcontent_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `quotation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reply_sheet`
--
ALTER TABLE `reply_sheet`
  ADD CONSTRAINT `reply_sheet_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `quotation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reply_sheet_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roles_users`
--
ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `store_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
