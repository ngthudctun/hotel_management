-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2024 at 02:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id_admin`, `name`, `password`) VALUES
(1, 'admin', '356a192b7913b04c54574d18c28d46e6395428ab');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(10) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `request` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_price` int(20) NOT NULL,
  `create_at` date NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_room` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `request`, `status`, `start_date`, `end_date`, `total_price`, `create_at`, `id_customer`, `id_room`) VALUES
(1, 'don phong', 'do dai', '2024-12-05', '2024-12-06', 123456, '2024-11-11', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `tel` int(20) NOT NULL,
  `username` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `name`, `password`, `email`, `tel`, `username`) VALUES
(1, 'Hưng', '123', 'hung', 1234, 'hung'),
(2, 'Tuan', '', '', 0, ''),
(8, 'ad', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'hung@gmail.com', 123, 'ad'),
(9, '2', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', 0, '2');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id_hotel` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `image_hotel` varchar(250) NOT NULL,
  `tel` int(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `average_rating` int(10) NOT NULL,
  `total_room` int(250) NOT NULL,
  `review` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `name`, `image_hotel`, `tel`, `email`, `address`, `average_rating`, `total_room`, `review`, `description`) VALUES
(1, '', 'Globezy.png', 0, '', '', 0, 0, '', ''),
(9, '', '1733227117_download.png', 0, '', '', 0, 0, '', ''),
(13, 'ad', '1733276312_hacker.png', 123, '123@gmail.com', '123', 123, 123, '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `amount` int(20) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_method` enum('Credit Card','Momo','Cash','Other','') NOT NULL,
  `status` varchar(250) NOT NULL,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id_payment`, `id_booking`, `amount`, `payment_date`, `payment_method`, `status`, `create_at`) VALUES
(1, 1, 12, '2024-11-05', 'Momo', 'do doi', '2024-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `rating` int(5) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `id_hotel`, `id_customer`, `rating`, `comment`, `create_at`) VALUES
(1, 1, 2, 5, 'sach se', '2024-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id_room` int(11) NOT NULL,
  `capacity` int(20) NOT NULL,
  `avalibity` tinyint(1) NOT NULL,
  `image_room` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `id_type_room` int(11) NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id_room`, `capacity`, `avalibity`, `image_room`, `description`, `id_hotel`, `room_number`, `id_type_room`, `price`) VALUES
(2, 250, 1, 'room.jpg', 'mo ta room', 1, 12, 1, 123456),
(3, 10, 1, 'room.jpg', 'Nằm ở Vũng Tàu, cách Bãi Sau 14 phút đi bộ, The Land Hotel & Apartment cung cấp chỗ nghỉ có phòng chờ chung, chỗ đậu xe riêng miễn phí và sân hiên. Ngoài Wi-Fi miễn phí, khách sạn 3 sao này còn cung cấp bếp chung và dịch vụ phòng. Chỗ nghỉ này cung', 1, 1, 2, 310);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `id_type_room` int(11) NOT NULL,
  `type_name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`id_type_room`, `type_name`, `description`) VALUES
(1, 'Phòng đôi', 'Sach'),
(2, 'Phòng đơn', 'gọn gàng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `fk_booking_customer` (`id_customer`),
  ADD KEY `id_room` (`id_room`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `id_booking` (`id_booking`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`),
  ADD KEY `id_hotel` (`id_hotel`),
  ADD KEY `id_type_room` (`id_type_room`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`id_type_room`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `id_type_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_room`) REFERENCES `room` (`id_room`),
  ADD CONSTRAINT `fk_booking_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`id_booking`) REFERENCES `booking` (`id_booking`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id_hotel`),
  ADD CONSTRAINT `room_ibfk_2` FOREIGN KEY (`id_type_room`) REFERENCES `room_type` (`id_type_room`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
