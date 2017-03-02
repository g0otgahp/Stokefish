-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2017 at 07:01 PM
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

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_details`, `category_status`) VALUES
(1, 'เครื่องใช้', 'เครื่องใช้ทั่วไป', 1),
(2, 'อาหาร', 'อาหาร', 1);

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
(7, 'KT003', 'พนักงานขาย', 'sale', 'e70b59714528d5798b1c8adaf0d0ed15', 6, 1, 1),
(8, 'E00001', 'พนักงาน HomePro', 'sale2', 'e70b59714528d5798b1c8adaf0d0ed15', 6, 2, 1);

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

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_fullname`, `member_address`, `member_phone`, `member_note`, `sale_order_detail_id`) VALUES
(1, 'นายธีรเดช', '0', '2147483647', '0', 1),
(2, 'นายA', '0', '0', '0', 2),
(3, 'aaaaaaa', 'cccccccc', 'bbbbbbbb', 'dddddddd', 3),
(4, '', '', '', '', 4),
(5, 'นาย A', '30/8', '0804805243', 'ไม่รีบ', 5),
(6, 'นาย A', '30/8', '0804805243', 'ไม่รีบ', 7),
(7, 'นาย A', '30/8', '09001919', 'ไม่รีบ', 8),
(8, 'นาย B', '30/8', '0892839392', 'ไม่ไหว', 9),
(9, 'aaaaa', '2222', '1111', '3333', 10),
(10, NULL, NULL, NULL, NULL, 12),
(11, NULL, NULL, NULL, NULL, 13);

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
  `product_unit` varchar(11) NOT NULL DEFAULT 'ชิ้น',
  `product_category` int(11) NOT NULL,
  `product_buy` int(11) NOT NULL,
  `product_sale` int(11) NOT NULL,
  `product_max` int(11) NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_code`, `product_name`, `product_unit`, `product_category`, `product_buy`, `product_sale`, `product_max`, `product_status`, `product_note`) VALUES
(1, '8850999320002', 'หลอดไฟ LED Bulb รุ่น Premium ขนาด 9W', 'ชิ้น', 1, 1200, 1800, 9000, 1, ''),
(2, '8850999320001', 'เบ็ดตกปลารุ่น X-221 Noble', 'ตัว', 1, 2200, 3100, 4000, 1, ''),
(3, '8850999320003', 'ไฟกระพริบ วิบๆ วับๆ', 'ชิ้น', 1, 1000, 1800, 6000, 1, ''),
(4, 'EX001', 'นมบูด', 'กล่อง', 2, 120, 200, 1000, 1, 'บูด 3 อาทิตย์พอประมาณ');

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

--
-- Dumping data for table `product_limit`
--

INSERT INTO `product_limit` (`product_limit_id`, `product_limit_shop_id`, `product_limit_product_code`, `product_limit_max`) VALUES
(1, 2, 'EX001', 0),
(2, 2, '8850999320003', 0),
(3, 1, 'EX001', 0),
(4, 1, '8850999320003', 0);

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

--
-- Dumping data for table `sale_order_detail`
--

INSERT INTO `sale_order_detail` (`sale_order_detail_id`, `sale_order_detail_no`, `sale_order_detail_date`, `sale_order_detail_time`, `sale_order_detail_vat`, `sale_order_detail_vat_status`, `sale_order_detail_discount`, `sale_order_detail_discount_status`, `sale_order_detail_status`, `sale_order_detail_pay_type`, `sale_order_detail_shop`) VALUES
(1, 'IN00002', '2017-02-26', '23:57:57', 0, 0, 0, 0, 1, 1, 1),
(2, 'IN00001', '2017-02-27', '00:33:46', 0, 0, 0, 0, 1, 1, 1),
(3, 'IN00003', '2017-02-27', '01:25:16', 0, 0, 0, 0, 1, 1, 1),
(4, 'IN00004', '2017-02-28', '14:30:48', 0, 0, 0, 0, 1, 1, 1),
(5, 'IN00005', '2017-02-28', '22:27:07', 0, 1, 0, 0, 1, 1, 1),
(6, 'IN00006', '2017-02-28', '22:33:17', 0, 1, 0, 0, 1, 1, 1),
(7, 'IN00007', '2017-02-28', '22:37:14', 0, 1, 0, 0, 1, 1, 1),
(8, 'IN00008', '2017-02-28', '23:17:05', 0, 1, 0, 0, 1, 1, 1),
(9, 'IN00009', '2017-02-28', '23:18:33', 0, 1, 0, 0, 1, 1, 1),
(10, 'IN00010', '2017-02-28', '23:20:03', 0, 1, 0, 0, 1, 1, 1),
(11, 'IN00011', '2017-03-01', '20:08:48', 0, 1, 20, 1, 1, 1, 1),
(12, 'IN00012', '2017-03-01', '20:10:46', 0, 1, 20, 1, 1, 1, 1),
(13, 'IN00013', '2017-03-01', '20:11:29', 0, 1, 20, 1, 1, 1, 1);

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
(1, 'Bhuvarat Fishing Net', 'บ้านดอน'),
(2, 'HomePro', 'ขอนแก่น');

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

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `stock_product`, `stock_type`, `stock_amount`, `stock_date`, `stock_time`, `stock_employees`, `stock_shop`, `stock_price`, `sale_order_detail_id`) VALUES
(1, '8850999320005', 'in', 300, '2014-09-24', '22:41:06', 1, 1, 100, 0),
(2, '8850999320001', 'in', 400, '2014-09-24', '22:41:18', 1, 2, 9300, 0),
(3, '8850999320002', 'in', 300, '2014-09-24', '22:41:28', 1, 1, 100, 0),
(4, '8850999320003', 'in', 400, '2014-09-24', '22:41:38', 1, 1, 1800, 0),
(5, '8850999320004', 'in', 300, '2014-09-24', '22:41:47', 1, 1, 100, 0),
(6, '8850999320004', 'out', 1, '2014-09-24', '22:49:52', 5, 1, 100, 0),
(7, '8850999320005', 'out', 1, '2014-09-24', '22:49:52', 5, 1, 100, 0),
(8, '8850999320002', 'out', 1, '2014-09-24', '22:50:27', 5, 1, 1800, 0),
(9, '8850999320004', 'out', 1, '2014-09-24', '22:50:27', 5, 1, 100, 0),
(10, '8850999320003', 'out', 1, '2014-09-24', '22:50:27', 5, 1, 1800, 0),
(11, '8850999320001', 'out', 1, '2014-09-24', '22:50:27', 5, 1, 3100, 0),
(12, '6901235399270', 'in', 50, '2014-09-25', '14:31:32', 1, 1, 100, 0),
(13, '6901235399270', 'out', 1, '2014-09-25', '14:32:20', 5, 1, 100, 0),
(14, '6901235399270', 'out', 1, '2014-09-25', '14:32:20', 5, 1, 100, 0),
(15, '6901235399270', 'out', 1, '2014-09-25', '14:32:20', 5, 1, 100, 0),
(16, '6901235399270', 'out', 1, '2014-09-25', '14:32:20', 5, 1, 100, 0),
(17, '6901235399270', 'out', 1, '2014-09-25', '14:32:20', 5, 1, 100, 0),
(18, '6901235399270', 'out', 1, '2014-09-25', '14:32:20', 5, 1, 100, 0),
(19, '6901235399270', 'out', 1, '2014-09-25', '14:32:20', 5, 1, 100, 0),
(20, '6901235399270', 'out', 1, '2014-09-25', '14:32:20', 5, 1, 100, 0),
(21, '6901235399270', 'out', 1, '2014-09-25', '14:32:20', 5, 1, 100, 0),
(22, '6901235399270', 'out', 1, '2014-09-25', '14:47:33', 5, 1, 100, 0),
(23, '6901235399270', 'out', 1, '2014-09-25', '14:47:33', 5, 1, 100, 0),
(24, '6901235399270', 'out', 1, '2014-09-25', '14:47:33', 5, 1, 100, 0),
(25, '6901235399270', 'out', 1, '2014-09-25', '14:47:33', 5, 1, 100, 0),
(26, '6901235399270', 'out', 1, '2014-09-25', '14:47:33', 5, 1, 100, 0),
(27, '6901235399270', 'out', 1, '2014-09-25', '14:47:33', 5, 1, 100, 0),
(28, '6901235399270', 'out', 1, '2014-09-25', '14:47:33', 5, 1, 100, 0),
(29, '6901235399270', 'out', 1, '2014-09-25', '14:47:33', 5, 1, 100, 0),
(30, '6901235399270', 'out', 1, '2014-09-25', '14:47:33', 5, 1, 100, 0),
(31, '6901235399270', 'out', 1, '2014-09-26', '12:06:23', 5, 1, 100, 0),
(32, '8850999320002', 'out', 1, '2014-09-26', '12:06:23', 5, 1, 1800, 0),
(33, '8850999320003', 'out', 1, '2014-09-26', '12:06:23', 5, 1, 1800, 0),
(34, '6901235399270', 'in', 1, '2014-09-26', '12:34:44', 5, 1, 100, 0),
(35, '8850999320005', 'out', 1, '2016-05-15', '10:14:38', 5, 1, 100, 0),
(36, '8850999320001', 'out', 3, '2016-05-15', '10:17:57', 5, 1, 9300, 0),
(37, '8850999320001', 'out', 3, '2016-05-15', '10:17:59', 5, 1, 9300, 0),
(38, '8850999320001', 'out', 3, '2016-05-15', '10:18:00', 5, 1, 9300, 0),
(39, '8850999320001', 'out', 3, '2016-05-15', '10:18:01', 5, 1, 9300, 0),
(40, '8850999320001', 'out', 3, '2016-05-15', '10:18:02', 5, 1, 9300, 0),
(41, '8850999320001', 'out', 3, '2016-05-15', '10:18:02', 5, 1, 9300, 0),
(42, '8850999320001', 'out', 3, '2016-05-15', '10:18:02', 5, 1, 9300, 0),
(43, '8850999320001', 'out', 3, '2016-05-15', '10:18:02', 5, 1, 9300, 0),
(44, '8850999320001', 'out', 3, '2016-05-15', '10:18:03', 5, 1, 9300, 0),
(45, '8850999320001', 'out', 3, '2016-05-15', '10:18:03', 5, 1, 9300, 0),
(46, '8850999320001', 'out', 3, '2016-05-15', '10:18:03', 5, 1, 9300, 0),
(47, '8850999320001', 'out', 3, '2016-05-15', '10:18:03', 5, 1, 9300, 0),
(48, '8850999320001', 'out', 3, '2016-05-15', '10:18:10', 5, 1, 9300, 0),
(49, '8850999320001', 'out', 3, '2016-05-15', '10:18:11', 5, 1, 9300, 0),
(50, '8850999320001', 'out', 3, '2016-05-15', '10:18:12', 5, 1, 9300, 0),
(51, '8850999320001', 'out', 3, '2016-05-15', '10:18:12', 5, 1, 9300, 0),
(52, '8850999320001', 'out', 3, '2016-05-15', '10:18:20', 5, 1, 9300, 0),
(53, '8850999320001', 'out', 3, '2016-05-15', '10:18:20', 5, 1, 9300, 0),
(54, '8850999320001', 'out', 3, '2016-05-15', '10:18:21', 5, 1, 9300, 0),
(55, '8850999320001', 'out', 3, '2016-05-15', '10:18:21', 5, 1, 9300, 0),
(56, '8850999320001', 'out', 3, '2016-05-15', '10:18:21', 5, 1, 9300, 0),
(57, '8850999320001', 'out', 3, '2016-05-15', '10:18:21', 5, 1, 9300, 0),
(58, '8850999320001', 'out', 3, '2016-05-15', '10:18:27', 5, 1, 9300, 0),
(59, '8850999320001', 'out', 3, '2016-05-15', '10:18:27', 5, 1, 9300, 0),
(60, '8850999320001', 'out', 3, '2016-05-15', '10:18:27', 5, 1, 9300, 0),
(61, '8850999320001', 'out', 3, '2016-05-15', '10:18:28', 5, 1, 9300, 0),
(62, '8850999320001', 'out', 3, '2016-05-15', '10:20:00', 5, 1, 9300, 0),
(63, '8850999320001', 'out', 3, '2016-05-15', '10:20:26', 5, 1, 9300, 0),
(64, '6901235399270', 'out', 2, '2016-05-15', '10:20:34', 5, 1, 100, 0),
(65, '6901235399270', 'out', 1, '2016-05-15', '10:21:24', 5, 1, 100, 0),
(66, '6901235399270', 'out', 1, '2016-05-15', '10:21:52', 5, 1, 100, 0),
(67, '6901235399270', 'out', 1, '2016-05-15', '10:22:21', 5, 1, 100, 0),
(68, '6901235399270', 'out', 1, '2016-05-15', '10:23:20', 5, 1, 100, 0),
(69, '8850999320001', 'in', 600, '2017-02-25', '19:52:55', 1, 2, 0, 0),
(70, '8850999320003', 'in', 500, '2017-02-25', '19:52:55', 1, 2, 0, 0),
(71, 'EX001', 'in', 200, '2017-02-25', '19:52:55', 1, 2, 100, 0),
(72, '8850999320003', 'in', 200, '2017-02-25', '19:58:15', 1, 2, 360000, 0),
(73, '8850999320003', 'in', 200, '2017-02-25', '19:58:38', 1, 2, 360000, 0),
(74, 'EX001', 'in', 500, '2017-02-26', '00:09:11', 8, 2, 100, 0),
(75, '8850999320003', 'in', 200, '2017-02-26', '00:11:26', 8, 2, 360000, 0),
(76, 'EX001', 'in', 500, '2017-02-26', '00:13:30', 8, 2, 100, 0),
(77, '8850999320001', 'in', 100, '2017-02-26', '00:14:14', 8, 2, 310000, 0),
(78, 'EX001', 'in', 500, '2017-02-26', '00:16:52', 8, 2, 100, 0),
(79, '8850999320003', 'in', 500, '2017-02-26', '00:16:58', 8, 2, 900000, 0),
(80, '8850999320003', 'in', 500, '2017-02-26', '00:19:12', 8, 2, 900000, 0),
(81, 'EX001', 'in', 500, '2017-02-26', '00:19:35', 8, 2, 100, 0),
(82, '8850999320003', 'in', 500, '2017-02-26', '00:19:49', 8, 2, 900000, 0),
(83, 'EX001', 'in', 200, '2017-02-26', '15:54:26', 7, 1, 100, 0),
(84, 'EX001', 'out', 1, '2017-02-26', '16:03:18', 7, 1, 150, 0),
(85, '8850999320002', 'out', 1, '2017-02-26', '16:03:18', 7, 1, 0, 0),
(86, '8850999320002', 'out', 1, '2017-02-26', '16:03:40', 7, 1, 0, 0),
(87, '8850999320002', 'out', 1, '2017-02-26', '16:03:40', 7, 1, 0, 0),
(88, 'EX001', 'in', 200, '2017-02-26', '21:15:14', 7, 1, 100, 0),
(89, '8850999320003', 'in', 200, '2017-02-26', '21:15:14', 7, 1, 360000, 0),
(90, 'EX001', 'out', 1, '2017-02-26', '23:57:57', 7, 1, 150, 1),
(91, 'EX001', 'in', 50, '2017-02-27', '00:33:46', 7, 1, 100, 2),
(92, 'EX001', 'out', 1, '2017-02-27', '01:25:16', 7, 1, 150, 3),
(93, 'EX001', 'out', 1, '2017-02-27', '01:25:16', 7, 1, 150, 3),
(94, '8850999320001', 'out', 1, '2017-02-28', '14:30:48', 7, 1, 3100, 4),
(95, 'EX001', 'out', 1, '2017-02-28', '23:17:05', 7, 1, 150, 8),
(96, 'EX001', 'out', 1, '2017-02-28', '23:18:33', 7, 1, 150, 9),
(97, 'EX001', 'out', 1, '2017-02-28', '23:20:03', 7, 1, 150, 10),
(98, 'EX001', 'out', 1, '2017-02-28', '23:20:03', 7, 1, 150, 10),
(99, 'EX001', 'out', 1, '2017-03-01', '20:10:46', 7, 1, 150, 12),
(100, 'EX001', 'out', 1, '2017-03-01', '20:10:46', 7, 1, 150, 12),
(101, 'EX001', 'out', 1, '2017-03-01', '20:11:30', 7, 1, 150, 13);

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

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`warehouse_id`, `warehouse_product`, `warehouse_type`, `warehouse_amount`, `warehouse_date`, `warehouse_time`, `warehouse_employees`, `warehouse_shop_id`) VALUES
(1, '8850999320005', 'in', 1000, '2014-09-24', '22:39:11', 1, 0),
(2, '8850999320001', 'in', 2000, '2014-09-24', '22:39:21', 1, 0),
(3, '8850999320002', 'in', 1000, '2014-09-24', '22:39:28', 1, 0),
(4, '8850999320003', 'in', 1000, '2014-09-24', '22:39:37', 1, 0),
(5, '8850999320004', 'in', 2000, '2014-09-24', '22:39:55', 1, 0),
(6, '8850999320005', 'out', 300, '2014-09-24', '22:41:06', 1, 0),
(7, '8850999320001', 'out', 400, '2014-09-24', '22:41:18', 1, 0),
(8, '8850999320002', 'out', 300, '2014-09-24', '22:41:28', 1, 0),
(9, '8850999320003', 'out', 400, '2014-09-24', '22:41:38', 1, 0),
(10, '8850999320004', 'out', 300, '2014-09-24', '22:41:47', 1, 0),
(11, '6901235399270', 'out', 50, '2014-09-25', '14:31:32', 1, 0),
(12, '6901235399270', 'in', 200, '2014-09-25', '14:31:42', 1, 0),
(13, '6901235399270', 'in', 10, '2016-05-16', '06:12:58', 1, 0),
(14, '6901235399270', 'out', 10, '2016-05-16', '06:15:30', 1, 0),
(15, '6901235399270', 'out', 10, '2016-05-16', '06:16:56', 1, 0),
(16, 'EX001', 'in', 10, '2017-02-24', '20:05:29', 1, 0),
(17, '8850999320003', 'in', 20, '2017-02-25', '18:52:22', 1, 0),
(18, '8850999320003', 'in', 100, '2017-02-25', '18:52:22', 1, 0),
(19, '8850999320001', 'out', 600, '2017-02-25', '19:52:55', 1, 0),
(20, '8850999320003', 'out', 500, '2017-02-25', '19:52:55', 1, 0),
(21, 'EX001', 'out', 200, '2017-02-25', '19:52:55', 1, 0),
(22, '8850999320003', 'out', 200, '2017-02-25', '19:58:15', 1, 0),
(23, '8850999320003', 'out', 200, '2017-02-25', '19:58:38', 1, 0),
(24, 'EX001', 'in', 500, '2017-02-25', '20:02:24', 1, 0);

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
-- Dumping data for table `warehouse_temp`
--

INSERT INTO `warehouse_temp` (`warehouse_temp_id`, `warehouse_temp_number`, `warehouse_temp_product`, `warehouse_temp_type`, `warehouse_temp_amount`, `warehouse_temp_date`, `warehouse_temp_time`, `warehouse_temp_shop`, `warehouse_temp_status`) VALUES
(18, '', '8850999320002', 'in', 600, '2017-02-25', '20:06:09', 0, 1),
(19, '', 'EX001', 'in', 1000, '2017-02-25', '20:06:15', 0, 1);

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employees_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product_limit`
--
ALTER TABLE `product_limit`
  MODIFY `product_limit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sale_order_detail`
--
ALTER TABLE `sale_order_detail`
  MODIFY `sale_order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `warehouse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `warehouse_temp`
--
ALTER TABLE `warehouse_temp`
  MODIFY `warehouse_temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
