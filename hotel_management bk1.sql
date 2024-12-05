-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2024 at 01:56 PM
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
(1, 'admin', '356a192b7913b04c54574d18c28d46e6395428ab'),
(2, 'hungadmin', '356a192b7913b04c54574d18c28d46e6395428ab'),
(3, 'tuanadmin', '356a192b7913b04c54574d18c28d46e6395428ab'),
(4, 'thinhadmin', '356a192b7913b04c54574d18c28d46e6395428ab'),
(5, 'tanadmin', '356a192b7913b04c54574d18c28d46e6395428ab'),
(6, 'hungadmin1', '356a192b7913b04c54574d18c28d46e6395428ab');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(10) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `img`) VALUES
(21, './../mvc/view/banner1.jpg');

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
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_customer` int(11) NOT NULL,
  `id_room` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `request`, `status`, `start_date`, `end_date`, `total_price`, `create_at`, `id_customer`, `id_room`) VALUES
(1, 'don phong', 'do dai', '2024-12-05', '2024-12-06', 123456, '2024-11-10 17:00:00', 2, 2),
(2, '', '', '2024-12-05', '2024-12-06', 123456, '2024-12-05 08:14:42', 8, 2),
(3, 'Dọn dẹp phòng trước', '', '2024-12-05', '2024-12-06', 4356, '2024-12-05 10:50:27', 12, 12),
(4, 'Phục vụ chu đáo', '', '2024-11-26', '2024-11-29', 2500000, '2024-12-05 10:58:47', 12, 7),
(5, 'nhận phòng 8h sáng', '', '2024-12-12', '2024-12-22', 1234, '2024-12-05 11:00:06', 12, 10);

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
(2, 'Tuan', '123', 'tuan@gmail.com', 54327654, ''),
(8, 'ad', '356a192b7913b04c54574d18c28d46e6395428ab', 'hung@gmail.com', 123, 'ad'),
(9, 'Nguyễn Văn Tèo', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'teonv@gmail.com', 42378565, '2'),
(10, 'Nguyễn Tuấn Hưng', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'tuanhungnguyen@gmail.com', 931632195, 'nguyentuanhung'),
(11, 'Hoắc Hưng Thịnh', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'hoacthinh@gmail.com', 347185014, 'hoachungthinh'),
(12, 'Nguyễn Khắc Hưng', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'khachung@gmail.com', 931185014, 'nguyenkhachung'),
(13, 'Đặng Hoàng Tuấn', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'danghoangtuan@gmail.com', 347632195, 'danghoangtuan'),
(14, 'Nguyễn Hoàng Tân', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'hoangtannguyen@gmail.com', 931632014, 'nguyenhoangtan');

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
(1, 'Globezy', 'globezy.jpg', 2147483647, 'globezy@gmail.com', 'Quận 1, TP. Hồ Chí Minh', 10, 200, 'Thức ăn ngon, không gian sang trọng', 'Khách sạn sang trọng ở Quận 1 này nằm trong tòa nhà kiểu Pháp đồ sộ đối diện Nhà hát Opera thành phố, cách ga Sài Gòn 4 km, và cách Nhà thờ Đức Bà, một công trình từ thế kỷ XIX, 9 phút đi bộ.'),
(2, 'Caravelle Saigon', 'caravellesaigon.jpg', 283823499, 'caravellesaigon@email.com', '19-23 Lam Son Square, Bến Nghé, Quận 1, Hồ Chí Minh', 5, 200, 'Đẹp, Sang', 'Khách sạn cao cấp này có lối thiết kế hiện đại cao tầng, cách trạm xe buýt gần nhất 2 phút đi bộ, cách Nhà thờ Đức Bà Sài Gòn 9 phút đi bộ và chợ Bến Thành 11 phút đi bộ.\r\n\r\nPhòng ốc bình dân nhìn ra sông hoặc thành phố, Wi-Fi miễn phí, TV màn hình p'),
(3, 'Hotel des Arts Saigon', 'artssaigon.jpg', 283989888, 'artssaigon@gmail.com', '76 78 Đ. Nguyễn Thị Minh Khai, St, Quận 3, Hồ Chí Minh', 5, 250, 'Nhộn nhịp, sạch sẽ', 'Khách sạn trang nhã này có mặt tiền bê tông tinh tế trên một con phố nhộn nhịp trong trung tâm thành phố, cách Nhà thờ Đức Bà Sài Gòn 6 phút đi bộ và Dinh Độc Lập 12 phút đi bộ.\r\n\r\nPhòng ốc sang trọng, có vòi sen lớn và cửa sổ chạm trần nhìn ra thành'),
(4, 'Novotel Saigon Centre', 'novotelsaigon.webp', 283822486, 'novotelsaigon@gmail.com', '167 Hai Bà Trưng, Phường 6, Quận 3, Hồ Chí Minh', 4, 200, 'Thức ăn ngon, không gian sang trọng', 'Khách sạn hiện đại này cách trạm xe buýt 2 phút đi bộ, cách Nhà thờ Đức Bà Sài Gòn - một nhà thờ Công giáo từ thập niên 1880 9 phút đi bộ, và cách Chợ Bến Thành rộng lớn 2 km.\n\nPhòng ở sáng sủa, hiện đại, có Wi-Fi miễn phí, TV màn hình phẳng, bàn l'),
(5, 'Park Hyatt Sài Gòn', 'parkhyatt.jpg', 283824123, 'parkhyatt@gmail.com', '2 Công trường Lam Sơn, Bến Nghé, Quận 1, Hồ Chí Minh', 5, 200, 'Thoáng mát, sạch sẽ', 'Khách sạn sang trọng ở Quận 1 này nằm trong tòa nhà kiểu Pháp đồ sộ đối diện Nhà hát Opera thành phố, cách ga Sài Gòn 4 km, và cách Nhà thờ Đức Bà, một công trình từ thế kỷ XIX, 9 phút đi bộ.\n\nPhòng ở tinh tế có Wi-Fi miễn phí, TV màn hình phẳng, i'),
(6, 'La Vela Saigon Hotel', 'lavela.webp', 283622228, 'lavela@gmail.com', '280 Đ. Nam Kỳ Khởi Nghĩa, Phường 8, Quận 3, Hồ Chí Minh', 5, 5000, 'Sang trọng, cao', 'Khách sạn cao tầng, sang trọng có quán bar trên tầng thượng, bể bơi vô cực, spa và 3 nhà hàng cao cấp.'),
(7, 'Hotel Grand Saigon', 'hotelgrand.jpg', 283915555, 'hotelgrand@gmail.com', '8 Đ. Đồng Khởi, Bến Nghé, Quận 1, Hồ Chí Minh', 4, 350, 'Phòng to rộng, sạch sẽ, thoáng mát', 'Khách sạn cao cấp này tọa lạc trong một tòa nhà có từ thập niên 1930 và đã được trùng tu, nhìn ra sông Sài Gòn và cách Nhà hát Thành phố lộng lẫy 7 phút đi bộ.\r\n\r\nPhòng ở thoáng mát, nhìn ra thành phố hoặc bể bơi, có Wi-Fi miễn phí, TV màn hình phẳng');

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
(3, 10, 1, 'room.jpg', 'Nằm ở Vũng Tàu, cách Bãi Sau 14 phút đi bộ, The Land Hotel & Apartment cung cấp chỗ nghỉ có phòng chờ chung, chỗ đậu xe riêng miễn phí và sân hiên. Ngoài Wi-Fi miễn phí, khách sạn 3 sao này còn cung cấp bếp chung và dịch vụ phòng. Chỗ nghỉ này cung', 1, 1, 2, 310),
(4, 250, 1, '1733391949_caravellesaigon.jpg', 'Phòng sạch sẽ thoáng mát', 2, 1, 1, 3600000),
(5, 150, 1, '1733391971_caravellesaigon.jpg', 'Phòng đẹp', 2, 25, 2, 2700000),
(6, 150, 1, 'novotelroom.jpg', 'Phòng sạch sẽ thoáng mát', 4, 15, 1, 3800000),
(7, 100, 1, 'novotelroom2.jpg', 'Phòng sang trọng ', 4, 25, 2, 2500000),
(8, 300, 1, 'parkhyattroom.webp', 'Dịch vụ đầy đủ tiện nghi', 5, 20, 3, 5600000),
(9, 300, 1, 'parkhyattroom2.jpg', 'Dịch vụ chu đáo, chăm sóc tận tình ', 5, 1, 4, 6800000),
(10, 30, 1, '1733392461_artssaigon.jpg', 'Sạch sẽ thoáng mát', 3, 1, 2, 1234),
(11, 20, 1, '1733394489_La-Vela-Saigon-Hotel-Ho-Chi-Minh-City-Exterior.jpg', 'Sạch sẽ', 6, 1, 3, 9099),
(12, 30, 1, '1733394603_10025841-eb0fe1766d827eec2b8c5e97a8f6c779.jpeg', 'Đầy đủ tiện nghi', 7, 1, 4, 4356);

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
(2, 'Phòng đơn', 'gọn gàng'),
(3, 'Phòng thường ', 'Dịch vụ đầy đủ nhưng không hỗ trợ bữa sáng'),
(4, 'Phòng V.I.P', 'Dịch vụ đầy đủ tiện nghi, được phục vụ bữa sáng ');

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `id_type_room` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
