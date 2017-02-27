-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2017 at 02:15 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bfn`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_details` varchar(100) NOT NULL,
  `category_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_details`, `category_status`) VALUES
(1, 'sfmlksdmfklmsdf', 'sdfklsdkmflmsldf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employees_id` int(11) NOT NULL,
  `employees_code` varchar(50) NOT NULL,
  `employees_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `employees_position` int(11) NOT NULL,
  `employees_shop` int(11) NOT NULL,
  `employees_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employees_id`, `employees_code`, `employees_name`, `username`, `password`, `employees_position`, `employees_shop`, `employees_status`) VALUES
(1, 'KT001', 'นายชัยวัฒน์ ชยพาณิชย์สกุล', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 0, 1),
(2, 'KT002', 'พนักงานสต๊อกกลาง', 'stock', '908880209a64ea539ae8dc5fdb7e0a91', 2, 0, 1),
(7, 'KT003', 'พนักงานขาย', 'sale', 'e70b59714528d5798b1c8adaf0d0ed15', 6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `order_number` varchar(30) NOT NULL,
  `order_code` int(11) NOT NULL,
  `order_count` int(11) NOT NULL,
  `employees` int(11) NOT NULL,
  `shop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_number`, `order_code`, `order_count`, `employees`, `shop`) VALUES
(32, '000001', 2147483647, 1, 5, 1),
(33, '000002', 2147483647, 1, 5, 1),
(34, '000003', 2147483647, 1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_temp`
--

CREATE TABLE `order_temp` (
  `order_temp_id` int(11) NOT NULL,
  `order_temp_code` varchar(300) NOT NULL,
  `order_temp_count` int(11) NOT NULL,
  `temp_employees` int(11) NOT NULL,
  `temp_shop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(11) NOT NULL,
  `position_name` varchar(100) NOT NULL,
  `position_details` varchar(300) NOT NULL,
  `position_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position_name`, `position_details`, `position_status`) VALUES
(1, 'ผู้ดูแลระบบ', 'Administator', 1),
(2, 'พนักงานสต๊อกกลาง', 'Warehouse', 2),
(6, 'พนักงานขาย', 'Shop', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(300) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_buy` int(11) NOT NULL,
  `product_sale` int(11) NOT NULL,
  `product_max` int(11) NOT NULL,
  `product_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_code`, `product_name`, `product_category`, `product_buy`, `product_sale`, `product_max`, `product_status`) VALUES
(1, 'PD232143', 'หลอดไฟ LED Bulb รุ่น Premium ขนาด 9W', 1, 21312, 2313, 111, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(11) NOT NULL,
  `shop_details` varchar(200) NOT NULL,
  `shop_zone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`shop_id`, `shop_details`, `shop_zone`) VALUES
(1, 'Bhuvarat Fishing Net', 'บ้านดอน');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `stock_product` varchar(100) NOT NULL,
  `stock_type` varchar(10) NOT NULL,
  `stock_amount` int(11) NOT NULL,
  `stock_date` date NOT NULL,
  `stock_time` time NOT NULL,
  `stock_employees` int(11) NOT NULL,
  `stock_shop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `stock_product`, `stock_type`, `stock_amount`, `stock_date`, `stock_time`, `stock_employees`, `stock_shop`) VALUES
(1, '8850999320005', 'in', 300, '2014-09-24', '22:41:06', 1, 1),
(2, '8850999320001', 'in', 400, '2014-09-24', '22:41:18', 1, 1),
(3, '8850999320002', 'in', 300, '2014-09-24', '22:41:28', 1, 1),
(4, '8850999320003', 'in', 400, '2014-09-24', '22:41:38', 1, 1),
(5, '8850999320004', 'in', 300, '2014-09-24', '22:41:47', 1, 1),
(6, '8850999320004', 'out', 1, '2014-09-24', '22:49:52', 5, 1),
(7, '8850999320005', 'out', 1, '2014-09-24', '22:49:52', 5, 1),
(8, '8850999320002', 'out', 1, '2014-09-24', '22:50:27', 5, 1),
(9, '8850999320004', 'out', 1, '2014-09-24', '22:50:27', 5, 1),
(10, '8850999320003', 'out', 1, '2014-09-24', '22:50:27', 5, 1),
(11, '8850999320001', 'out', 1, '2014-09-24', '22:50:27', 5, 1),
(12, '6901235399270', 'in', 50, '2014-09-25', '14:31:32', 1, 1),
(13, '6901235399270', 'out', 1, '2014-09-25', '14:32:20', 5, 1),
(14, '6901235399270', 'out', 1, '2014-09-25', '14:32:20', 5, 1),
(15, '6901235399270', 'out', 1, '2014-09-25', '14:32:20', 5, 1),
(16, '6901235399270', 'out', 1, '2014-09-25', '14:32:20', 5, 1),
(17, '6901235399270', 'out', 1, '2014-09-25', '14:32:20', 5, 1),
(18, '6901235399270', 'out', 1, '2014-09-25', '14:32:20', 5, 1),
(19, '6901235399270', 'out', 1, '2014-09-25', '14:32:20', 5, 1),
(20, '6901235399270', 'out', 1, '2014-09-25', '14:32:20', 5, 1),
(21, '6901235399270', 'out', 1, '2014-09-25', '14:32:20', 5, 1),
(22, '6901235399270', 'out', 1, '2014-09-25', '14:47:33', 5, 1),
(23, '6901235399270', 'out', 1, '2014-09-25', '14:47:33', 5, 1),
(24, '6901235399270', 'out', 1, '2014-09-25', '14:47:33', 5, 1),
(25, '6901235399270', 'out', 1, '2014-09-25', '14:47:33', 5, 1),
(26, '6901235399270', 'out', 1, '2014-09-25', '14:47:33', 5, 1),
(27, '6901235399270', 'out', 1, '2014-09-25', '14:47:33', 5, 1),
(28, '6901235399270', 'out', 1, '2014-09-25', '14:47:33', 5, 1),
(29, '6901235399270', 'out', 1, '2014-09-25', '14:47:33', 5, 1),
(30, '6901235399270', 'out', 1, '2014-09-25', '14:47:33', 5, 1),
(31, '6901235399270', 'out', 1, '2014-09-26', '12:06:23', 5, 1),
(32, '8850999320002', 'out', 1, '2014-09-26', '12:06:23', 5, 1),
(33, '8850999320003', 'out', 1, '2014-09-26', '12:06:23', 5, 1),
(34, '6901235399270', 'in', 1, '2014-09-26', '12:34:44', 5, 1),
(35, '8850999320005', 'out', 1, '2016-05-15', '10:14:38', 5, 1),
(36, '8850999320001', 'out', 3, '2016-05-15', '10:17:57', 5, 1),
(37, '8850999320001', 'out', 3, '2016-05-15', '10:17:59', 5, 1),
(38, '8850999320001', 'out', 3, '2016-05-15', '10:18:00', 5, 1),
(39, '8850999320001', 'out', 3, '2016-05-15', '10:18:01', 5, 1),
(40, '8850999320001', 'out', 3, '2016-05-15', '10:18:02', 5, 1),
(41, '8850999320001', 'out', 3, '2016-05-15', '10:18:02', 5, 1),
(42, '8850999320001', 'out', 3, '2016-05-15', '10:18:02', 5, 1),
(43, '8850999320001', 'out', 3, '2016-05-15', '10:18:02', 5, 1),
(44, '8850999320001', 'out', 3, '2016-05-15', '10:18:03', 5, 1),
(45, '8850999320001', 'out', 3, '2016-05-15', '10:18:03', 5, 1),
(46, '8850999320001', 'out', 3, '2016-05-15', '10:18:03', 5, 1),
(47, '8850999320001', 'out', 3, '2016-05-15', '10:18:03', 5, 1),
(48, '8850999320001', 'out', 3, '2016-05-15', '10:18:10', 5, 1),
(49, '8850999320001', 'out', 3, '2016-05-15', '10:18:11', 5, 1),
(50, '8850999320001', 'out', 3, '2016-05-15', '10:18:12', 5, 1),
(51, '8850999320001', 'out', 3, '2016-05-15', '10:18:12', 5, 1),
(52, '8850999320001', 'out', 3, '2016-05-15', '10:18:20', 5, 1),
(53, '8850999320001', 'out', 3, '2016-05-15', '10:18:20', 5, 1),
(54, '8850999320001', 'out', 3, '2016-05-15', '10:18:21', 5, 1),
(55, '8850999320001', 'out', 3, '2016-05-15', '10:18:21', 5, 1),
(56, '8850999320001', 'out', 3, '2016-05-15', '10:18:21', 5, 1),
(57, '8850999320001', 'out', 3, '2016-05-15', '10:18:21', 5, 1),
(58, '8850999320001', 'out', 3, '2016-05-15', '10:18:27', 5, 1),
(59, '8850999320001', 'out', 3, '2016-05-15', '10:18:27', 5, 1),
(60, '8850999320001', 'out', 3, '2016-05-15', '10:18:27', 5, 1),
(61, '8850999320001', 'out', 3, '2016-05-15', '10:18:28', 5, 1),
(62, '8850999320001', 'out', 3, '2016-05-15', '10:20:00', 5, 1),
(63, '8850999320001', 'out', 3, '2016-05-15', '10:20:26', 5, 1),
(64, '6901235399270', 'out', 2, '2016-05-15', '10:20:34', 5, 1),
(65, '6901235399270', 'out', 1, '2016-05-15', '10:21:24', 5, 1),
(66, '6901235399270', 'out', 1, '2016-05-15', '10:21:52', 5, 1),
(67, '6901235399270', 'out', 1, '2016-05-15', '10:22:21', 5, 1),
(68, '6901235399270', 'out', 1, '2016-05-15', '10:23:20', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `warehouse_id` int(11) NOT NULL,
  `warehouse_product` varchar(100) NOT NULL,
  `warehouse_type` varchar(10) NOT NULL,
  `warehouse_amount` int(11) NOT NULL,
  `warehouse_date` date NOT NULL,
  `warehouse_time` time NOT NULL,
  `warehouse_employees` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`warehouse_id`, `warehouse_product`, `warehouse_type`, `warehouse_amount`, `warehouse_date`, `warehouse_time`, `warehouse_employees`) VALUES
(1, '8850999320005', 'in', 1000, '2014-09-24', '22:39:11', 1),
(2, '8850999320001', 'in', 2000, '2014-09-24', '22:39:21', 1),
(3, '8850999320002', 'in', 1000, '2014-09-24', '22:39:28', 1),
(4, '8850999320003', 'in', 1000, '2014-09-24', '22:39:37', 1),
(5, '8850999320004', 'in', 2000, '2014-09-24', '22:39:55', 1),
(6, '8850999320005', 'out', 300, '2014-09-24', '22:41:06', 1),
(7, '8850999320001', 'out', 400, '2014-09-24', '22:41:18', 1),
(8, '8850999320002', 'out', 300, '2014-09-24', '22:41:28', 1),
(9, '8850999320003', 'out', 400, '2014-09-24', '22:41:38', 1),
(10, '8850999320004', 'out', 300, '2014-09-24', '22:41:47', 1),
(11, '6901235399270', 'out', 50, '2014-09-25', '14:31:32', 1),
(12, '6901235399270', 'in', 200, '2014-09-25', '14:31:42', 1),
(13, '6901235399270', 'in', 10, '2016-05-16', '06:12:58', 1),
(14, '6901235399270', 'out', 10, '2016-05-16', '06:15:30', 1),
(15, '6901235399270', 'out', 10, '2016-05-16', '06:16:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_temp`
--

CREATE TABLE `warehouse_temp` (
  `warehouse_temp_id` int(11) NOT NULL,
  `warehouse_temp_number` varchar(50) NOT NULL,
  `warehouse_temp_product` varchar(50) NOT NULL,
  `warehouse_temp_type` varchar(10) NOT NULL,
  `warehouse_temp_amount` int(11) NOT NULL,
  `warehouse_temp_date` date NOT NULL,
  `warehouse_temp_time` time NOT NULL,
  `warehouse_temp_shop` int(11) NOT NULL,
  `warehouse_temp_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `warehouse_temp`
--

INSERT INTO `warehouse_temp` (`warehouse_temp_id`, `warehouse_temp_number`, `warehouse_temp_product`, `warehouse_temp_type`, `warehouse_temp_amount`, `warehouse_temp_date`, `warehouse_temp_time`, `warehouse_temp_shop`, `warehouse_temp_status`) VALUES
(1, '000001', '6901235399270', 'in', 10, '2016-05-16', '06:12:51', 0, 1),
(2, '000002', '6901235399270', 'out', 10, '2016-05-16', '06:15:29', 2, 1),
(3, '000003', '6901235399270', 'out', 10, '2016-05-16', '06:16:54', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employees_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_temp`
--
ALTER TABLE `order_temp`
  ADD PRIMARY KEY (`order_temp_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`warehouse_id`);

--
-- Indexes for table `warehouse_temp`
--
ALTER TABLE `warehouse_temp`
  ADD PRIMARY KEY (`warehouse_temp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employees_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `order_temp`
--
ALTER TABLE `order_temp`
  MODIFY `order_temp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `warehouse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `warehouse_temp`
--
ALTER TABLE `warehouse_temp`
  MODIFY `warehouse_temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
