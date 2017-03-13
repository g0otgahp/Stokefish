-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2017 at 12:31 PM
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
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `config_id` int(11) NOT NULL,
  `config_shop_name` varchar(200) NOT NULL,
  `config_phone` varchar(100) NOT NULL,
  `config_address` varchar(500) NOT NULL,
  `config_detail` varchar(500) NOT NULL,
  `config_tax` varchar(100) NOT NULL,
  `config_logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`config_id`, `config_shop_name`, `config_phone`, `config_address`, `config_detail`, `config_tax`, `config_logo`) VALUES
(1, 'หจก. มิตรเกษตรนครพนม', '0483549000533', '26/1 ถนนศรีเทพ ต.ในเมือง อ.เมือง จ.นครพนม 48000', 'จำหน่าย เครื่องสีข้าว เครื่องยนต์ดีเซลล์ทุกยี่ห้อ เครื่องสูบน้ำ ครื่องกำเนิดไฟฟ้า ปั้มบาดาล อะไหล่ทุกชนิด และเครื่องตัดหญ้า', '0483549000533', 'logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`config_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
