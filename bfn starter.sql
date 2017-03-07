-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2017 at 05:33 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

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
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_fullname` varchar(100) DEFAULT NULL,
  `member_address` varchar(100) DEFAULT NULL,
  `member_phone` varchar(11) DEFAULT NULL,
  `member_note` varchar(100) DEFAULT NULL,
  `sale_order_detail_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `product_unit` varchar(11) NOT NULL DEFAULT 'ชิ้น',
  `product_category` int(11) NOT NULL,
  `product_buy` int(11) NOT NULL,
  `product_sale` int(11) NOT NULL,
  `product_max` int(11) NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_limit`
--

CREATE TABLE `product_limit` (
  `product_limit_id` int(11) NOT NULL,
  `product_limit_shop_id` int(11) NOT NULL,
  `product_limit_product_code` varchar(100) NOT NULL,
  `product_limit_max` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sale_order_detail`
--

CREATE TABLE `sale_order_detail` (
  `sale_order_detail_id` int(11) NOT NULL,
  `sale_order_detail_no` varchar(11) NOT NULL,
  `sale_order_detail_date` date NOT NULL,
  `sale_order_detail_time` time NOT NULL,
  `sale_order_detail_vat` int(11) NOT NULL,
  `sale_order_detail_vat_status` int(11) NOT NULL DEFAULT '0',
  `sale_order_detail_discount` int(11) NOT NULL,
  `sale_order_detail_discount_status` int(11) NOT NULL,
  `sale_order_detail_status` int(11) NOT NULL DEFAULT '1',
  `sale_order_detail_pay_type` int(11) NOT NULL DEFAULT '1',
  `sale_order_detail_shop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(11) NOT NULL,
  `shop_details` varchar(200) NOT NULL,
  `shop_zone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `stock_shop` int(11) NOT NULL,
  `stock_price` int(11) NOT NULL,
  `sale_order_detail_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `warehouse_employees` int(11) NOT NULL,
  `warehouse_shop_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `warehouse_temp_shop` int(11) NOT NULL DEFAULT '0',
  `warehouse_temp_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

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
-- Indexes for table `product_limit`
--
ALTER TABLE `product_limit`
  ADD PRIMARY KEY (`product_limit_id`);

--
-- Indexes for table `sale_order_detail`
--
ALTER TABLE `sale_order_detail`
  ADD PRIMARY KEY (`sale_order_detail_id`);

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employees_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_limit`
--
ALTER TABLE `product_limit`
  MODIFY `product_limit_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale_order_detail`
--
ALTER TABLE `sale_order_detail`
  MODIFY `sale_order_detail_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `warehouse_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `warehouse_temp`
--
ALTER TABLE `warehouse_temp`
  MODIFY `warehouse_temp_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
