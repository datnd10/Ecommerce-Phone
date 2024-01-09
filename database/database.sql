-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 04:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(11) NOT NULL,
  `product_color_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `product_color_id`, `quantity`) VALUES
(13, 22, 1),
(1, 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_active` boolean DEFAULT true, 
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `description`, `created_at`) VALUES
(1, 'iphone', 'tốt', '2023-12-06 22:04:25'),
(2, 'xiaomi', 'trung quốc1', '2023-12-06 22:27:04'),
(3, 'samsung', 'hàn quốc', '2023-12-06 22:27:12'),
(6, 'cacsa', 'csa', '2023-12-24 01:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `total_money` float NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `status` varchar(255) DEFAULT 'pending',
  `shipping` float NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `total_money`, `name`, `address`, `phone`, `message`, `payment_method`, `payment_status`, `created_at`, `status`, `shipping`, `user_id`) VALUES
(2, 693, 'Nguyen Minh Duc', 'Hoa Binh, Xa Duc Hanh, Huyen Bao Lam, Tinh Cao Bang', '1234567890', 'Ship Chu Nhat', NULL, NULL, '2023-12-26 21:07:18', 'received', 3, 1),
(3, 4005, 'Nguyen Minh Duc', 'Quang Ninh', '1234567890', 'Ship Chu Nhat', NULL, NULL, '2023-12-26 21:51:12', 'pending', 5, 1),
(4, 2074, 'Nguyen Van A', '123 Ho Tay, Phuong Truc Bach, Quan Ba Dinh, Thanh pho Ha Noi', '0987654321', 'Ship Vao Chu Nhat', NULL, NULL, '2023-12-27 23:54:57', 'received', 4, 1),
(5, 350, 'Nguyen Van A', 'kkk, Phuong Tran Phu, Thanh pho Ha Giang, Tinh Ha Giang', '0987654321', 'Ship Vao Chu Nhat', NULL, NULL, '2023-12-29 18:06:18', 'pending', 5, 1),
(7, 8003, 'Nguyen Minh Duc3', 'Truong Cap 2 Mo Lao, Phuong Mo Lao, Quan Ha Dong, Thanh pho Ha Noi', '1234567190', '', NULL, NULL, '2024-01-03 16:28:02', 'pending', 3, 1),
(8, 70010, 'Nguyen Minh Duc3', 'Truong Cap 2 Mo Lao, Phuong Mo Lao, Quan Ha Dong, Thanh pho Ha Noi', '1234567190', '', NULL, NULL, '2024-01-03 16:28:40', 'canceled', 3, 1),
(9, 693, 'Dac Dat', 'Ha Noi', '1234509876', '', NULL, NULL, '2024-01-03 22:24:24', 'received', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_color_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `product_color_id`, `quantity`) VALUES
(1, 2, 14, 1),
(2, 2, 22, 1),
(3, 3, 8, 4),
(4, 4, 14, 6),
(5, 5, 14, 1),
(8, 7, 8, 8),
(9, 8, 23, 7),
(10, 9, 22, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` varchar(9999) NOT NULL,
  `rate` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
    `is_active` boolean DEFAULT true,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `description`, `rate`, `created_at`, `category_id`) VALUES
(1, 'Iphone 15', 'Good', 0, '2023-12-06 22:04:38', 1),
(2, 'xiaomi 13t pro 5g', '12', 0, '2023-12-06 22:41:53', 2),
(3, 'samsung galaxy z flip 5g', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit\r\n', 0, '2023-12-06 22:42:06', 3),
(4, 'iphone 14', 'good', 0, '2023-12-06 22:47:57', 1),
(10, 'cá', 'csa', 0, '2023-12-24 01:16:45', 6);

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `product_color_id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` float NOT NULL DEFAULT 0,
  `sold_quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
    `is_active` boolean DEFAULT true,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`product_color_id`, `color`, `quantity`, `price`, `sold_quantity`, `created_at`, `product_id`) VALUES
(8, 'black', 90, 1000, 8, '2023-12-06 23:58:46', 4),
(14, 'black', 11, 345, 1, '2023-12-07 00:13:45', 2),
(21, 'green', 0, 123, 0, '2023-12-07 22:06:25', 3),
(22, 'purple', 16, 345, 2, '2023-12-07 22:08:37', 3),
(23, 'pink', 32, 10001, 0, '2023-12-12 19:26:17', 4);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `product_image_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_color_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`product_image_id`, `image`, `product_color_id`) VALUES
(65, 'Vmm3NLMH1703086895.jfif', 23),
(66, 'XjzbD2X41703086895.jfif', 23),
(69, 'CnZm3Xo71703086919.jfif', 21),
(70, '5gyHzXvO1703086919.jfif', 21),
(75, 'kpEKU9871703436890.png', 22),
(76, '9WnSr35Z1703436890.jfif', 22),
(96, 'TRoAlwKd1703507941.jpg', 8),
(97, '3akHMEUg1703507941.jfif', 8),
(98, 'OIpuVWRa1703510510.jfif', 14);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `content` varchar(999) NOT NULL,
  `star` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `product_color_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `content`, `star`, `created_at`, `user_id`, `product_color_id`) VALUES
(2, 'very good', 5, '2024-01-03 21:53:59', 1, 22),
(3, 'very gôd', 5, '2024-01-03 22:24:54', 5, 22);

-- --------------------------------------------------------

--
-- Table structure for table `review_image`
--

CREATE TABLE `review_image` (
  `review_image_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `review_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review_image`
--

INSERT INTO `review_image` (`review_image_id`, `image`, `review_id`) VALUES
(1, 'P3B9uV4f1704293639.jpg', 2),
(2, 'Mtm93V0e1704293639.jpg', 2),
(3, 'V2ohVLBE1704293639.jpg', 2),
(4, 'Z760qVBC1704293639.jpg', 2),
(5, 'puvS3AEV1704295494.jpg', 3),
(6, 'p6UwHFDU1704295494.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
   `is_active` boolean DEFAULT true,
  `token` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `username`, `fullname`, `phone`, `address`, `avatar`, `role`, `created_at`, `token`, `status`) VALUES
(1, 'ducn3m@gmail.com', 'duc123', 'ducnm123', 'Nguyen Minh Duc3', '1234567190', 'Truong Cap 2 Mo Lao, Phuong Mo Lao, Quan Ha Dong, Thanh pho Ha Noi', 'wmlWLK5g1703850690.jpg', 0, '2023-12-06 22:04:10', '', 0),
(5, 'datnd@gmail.com', 'dat123', 'datnd19', 'Dac Dat', '1234509876', 'Ha Noi', 'lDXOYiOs1703262573.png', 0, '2023-12-22 00:56:48', '', 0),
(8, 'cuongkeng@gmail.com', 'cuong123', 'cuong123', 'Dang CUong', '1235412781', 'Ha Noi', 'CcuIK3Dp1703849732.jpg', 1, '2023-12-23 00:10:59', '', 0),
(9, 'dat123@gmail.com', 'dat123', 'datnh123', 'dat dat', '1234567890', 'Quang Ninh', 'guest.png', 1, '2024-01-02 23:25:36', '', 0),
(10, 'datca123@gmail.com', 'dat123', 'cbhjascbhasj', 'dat dat', '0987612345', 'Quang Ninh', 'guest.png', 1, '2024-01-02 23:25:59', '', 0),
(12, 'cas123@gmail.com', 'dat123', 'vbc', '', '1111111111', '', 'guest.png', 1, '2024-01-03 01:14:20', '', 0),
(13, 'ca@gmail.com', 'dat123', 'cacsa', '', '9999999999', '', 'guest.png', 1, '2024-01-03 01:15:09', '', 0),
(14, 'duc222nm@gmail.com', 'dat123', 'ducnm12331', '', '1234567090', '', 'guest.png', 1, '2024-01-03 01:15:51', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_color_id` (`product_color_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_color_id` (`product_color_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`product_color_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`product_image_id`),
  ADD KEY `product_color_id` (`product_color_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_color_id` (`product_color_id`);

--
-- Indexes for table `review_image`
--
ALTER TABLE `review_image`
  ADD PRIMARY KEY (`review_image_id`),
  ADD KEY `review_id` (`review_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `product_color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `product_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `review_image`
--
ALTER TABLE `review_image`
  MODIFY `review_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_color_id`) REFERENCES `product_color` (`product_color_id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_color_id`) REFERENCES `product_color` (`product_color_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `product_color`
--
ALTER TABLE `product_color`
  ADD CONSTRAINT `product_color_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`product_color_id`) REFERENCES `product_color` (`product_color_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`product_color_id`) REFERENCES `product_color` (`product_color_id`);

--
-- Constraints for table `review_image`
--
ALTER TABLE `review_image`
  ADD CONSTRAINT `review_image_ibfk_1` FOREIGN KEY (`review_id`) REFERENCES `review` (`review_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
