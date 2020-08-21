-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2020 at 12:32 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maniexpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(3) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(0, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `checkout_address`
--

CREATE TABLE `checkout_address` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout_address`
--

INSERT INTO `checkout_address` (`id`, `firstname`, `lastname`, `email`, `contact`, `address`, `city`, `zip`) VALUES
(1, 'Muhammad', 'Osama', 'uusman004@gmail.com', '03102257759', 'H # K-14 32 S-24 ,St # 9 near Sabri Masjid', 'Karachi', '75660'),
(2, 'Faizan', 'Ali', 'testing@gmail.com', '03102257759', 'H # K-14 32 S-24 ,St # 9 near Sabri Masjid', 'Karachi', '75660'),
(3, 'Muhammad', 'Sultan', 'testing@gmail.com', '03102257759', 'H # K-14 32 S-24 ,St # 9 near Sabri Masjid', 'Karachi', '75660'),
(4, 'Khansa ', 'Siraj', 'testing@gmail.com', '03102257759', 'H # K-14 32 S-24 ,St # 9 near Sabri Masjid', 'Karachi', '75660');

-- --------------------------------------------------------

--
-- Table structure for table `confirm_order_product`
--

CREATE TABLE `confirm_order_product` (
  `id` int(5) NOT NULL,
  `order_id` varchar(10) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_price` int(5) NOT NULL,
  `product_qty` int(5) NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `product_total` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `confirm_order_product`
--

INSERT INTO `confirm_order_product` (`id`, `order_id`, `product_name`, `product_price`, `product_qty`, `product_image`, `product_total`) VALUES
(1, '1', 'Kids Sandal', 1200, 1, 'product_image/a302186d6119be3c048471afe7e590724.png', '1200'),
(2, '1', 'Slippers', 500, 1, 'product_image/00ed8c66cfbbda1d36af2a7ce65f46e21.jpg', '500'),
(3, '2', 'Slippers', 500, 2, 'product_image/00ed8c66cfbbda1d36af2a7ce65f46e21.jpg', '1000'),
(4, '3', 'Women Sandal', 900, 2, 'product_image/ea16c498c839c98a09356a13e421a2f63.jpg', '1800'),
(5, '4', 'Slippers', 500, 1, 'product_image/00ed8c66cfbbda1d36af2a7ce65f46e21.jpg', '500');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_price` int(5) NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `product_description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_image`, `product_category`, `product_description`) VALUES
(3, 'Slippers', 500, 'product_image/00ed8c66cfbbda1d36af2a7ce65f46e21.jpg', 'men', 'Mens Black Stylish Slippers                                        '),
(4, 'Women Sandal', 900, 'product_image/ea16c498c839c98a09356a13e421a2f63.jpg', 'women', 'Stylish womens sandal'),
(5, 'Kids Sandal', 1200, 'product_image/a302186d6119be3c048471afe7e590724.png', 'kids', 'Stylish Kids Sandals');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout_address`
--
ALTER TABLE `checkout_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirm_order_product`
--
ALTER TABLE `confirm_order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkout_address`
--
ALTER TABLE `checkout_address`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `confirm_order_product`
--
ALTER TABLE `confirm_order_product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
