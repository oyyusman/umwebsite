-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2023 at 06:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_crud`
--

CREATE TABLE `admin_crud` (
  `sr_no` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_crud`
--

INSERT INTO `admin_crud` (`sr_no`, `admin_name`, `admin_pass`) VALUES
(1, 'usman', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `sr_no` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total_pay` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `check-in` date NOT NULL,
  `check-out` date NOT NULL,
  `Card-no` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`sr_no`, `booking_id`, `price`, `total_pay`, `user_name`, `phonenum`, `address`, `check-in`, `check-out`, `Card-no`) VALUES
(1, 1, 12000, 24000, 'anees', 'pearl boys hostel ,hostel city islamabad', 'pearl boys hostel ,hostel city islamabad', '2023-01-09', '2023-01-11', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `booking_order`
--

CREATE TABLE `booking_order` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `sr_no` int(11) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`sr_no`, `image`) VALUES
(4, 'IMG_89538.png'),
(5, 'IMG_17683.png'),
(8, 'IMG_51690.png'),
(10, 'IMG_21878.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `sr_no` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `gmap` varchar(250) NOT NULL,
  `pn1` bigint(20) NOT NULL,
  `pn2` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `insta` varchar(100) NOT NULL,
  `tweet` varchar(100) NOT NULL,
  `iframe` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`sr_no`, `address`, `gmap`, `pn1`, `pn2`, `email`, `fb`, `insta`, `tweet`, `iframe`) VALUES
(1, 'UM website', 'https://geogle/maps/YyFfff72qj2joRDZ9', 923409213948, 923315456112, 'usman.siryedian@gmail.com', 'https://www.facebook.com/profile.php?id=100062915240938', 'https://www.instagram.com/oyyusman/', 'https://twitter.com/oyyyusman?t=Zmf4E0k5w8OWZuqqavADJQ&s=09', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3321.205904714012!2d73.1565933!3d33.6518263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38dfea4aee5bdf8f:0xe6b55e05d462beb1!2sCOMSATS University Islamabad!5e0!3m2!1sen!2s!4v1666280403162!5m2!1sen!2s');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `icon`, `name`, `description`) VALUES
(19, 'IMG_79662.svg', 'Television', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, tenetur hic reprehenderit minima laudantium quas voluptatibus?'),
(20, 'IMG_93390.svg', 'Geyser', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, tenetur hic reprehenderit minima laudantium quas voluptatibus?'),
(24, 'IMG_18273.svg', 'Dinning', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, tenetur hic reprehenderit minima laudantium quas voluptatibus?');

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE `feature` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`id`, `name`) VALUES
(3, 'AC'),
(5, 'room'),
(6, 'we'),
(14, 'qw'),
(15, 'zxazazaza');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `area` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `removed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `area`, `price`, `quantity`, `adult`, `children`, `description`, `status`, `removed`) VALUES
(1, 'Muhammad Usman', 123, 12000, 11, 4, 6, 'this is usman room', 1, 0),
(2, 'hamad', 121, 1212, 12, 11, 3, '0', 1, 0),
(3, 'anees', 121, 12000, 2, 3, 2, '0', 1, 0),
(4, 'aziz ur rehman', 343, 12000, 12, 12, 11, 'this is aziz room', 1, 0),
(5, 'asad hammed', 3432, 121212, 1, 11, 11, 'this is your room  this is myromjsngfmdsasdfgv asdsfgvcx', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_facilities`
--

CREATE TABLE `room_facilities` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room_features`
--

CREATE TABLE `room_features` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `features_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_features`
--

INSERT INTO `room_features` (`sr_no`, `room_id`, `features_id`) VALUES
(32, 2, 3),
(33, 2, 5),
(34, 2, 6),
(37, 3, 5),
(38, 3, 6),
(39, 4, 3),
(40, 5, 3),
(41, 5, 5),
(42, 5, 6),
(44, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`sr_no`, `room_id`, `image`, `thumb`) VALUES
(14, 1, 'IMG_70114.jpg', 0),
(15, 1, 'IMG_83677.png', 0),
(16, 1, 'IMG_30619.png', 0),
(17, 3, 'IMG_50825.png', 0),
(18, 3, 'IMG_20976.png', 0),
(19, 3, 'IMG_11224.png', 0),
(20, 4, 'IMG_74216.png', 0),
(21, 4, 'IMG_27435.png', 0),
(22, 4, 'IMG_40405.png', 0),
(23, 2, 'IMG_50883.jpg', 0),
(24, 2, 'IMG_39867.png', 0),
(25, 2, 'IMG_56735.png', 0),
(26, 2, 'IMG_60248.png', 0),
(27, 5, 'IMG_82676.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sr_no` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `site_about` varchar(250) NOT NULL,
  `shutdown` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sr_no`, `site_title`, `site_about`, `shutdown`) VALUES
(1, 'um website', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto nostrum alias dolorum perferendis ex laborum dolores minima aperiam sint quos esse velit, iste co', 0);

-- --------------------------------------------------------

--
-- Table structure for table `team_details`
--

CREATE TABLE `team_details` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team_details`
--

INSERT INTO `team_details` (`sr_no`, `name`, `picture`) VALUES
(9, 'Naeem', 'IMG_74646.png'),
(11, 'usman', 'IMG_68228.png'),
(12, 'Asad', 'IMG_42266.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_crud`
--

CREATE TABLE `user_crud` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `phonenumber` varchar(300) NOT NULL,
  `pincode` int(11) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date/time` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_crud`
--

INSERT INTO `user_crud` (`id`, `name`, `address`, `phonenumber`, `pincode`, `dob`, `password`, `status`, `date/time`, `email`) VALUES
(3, 'anees', 'pearl boys hostel ,hostel city islamabad', '0312121212', 123, '2022-12-02', '$2y$10$jYPli8dF.ff0LwaJRTASR.NsNGSo8x6uitGdunx2U9MaOI6gO8y6S', 1, '2022-12-11 18:02:57', 'anees@gmail.com'),
(4, 'Muhammad Usman', 'pearl boys hostel ,hostel city islamabad', '03315456112', 45510, '2022-12-09', '$2y$10$FP236k.6bFU6odcA4XG/L.HLbdcjapVer25thBM39/uXDKh2Lbu1S', 1, '2022-12-11 18:36:31', 'uman.sirsyedian@gmail.com'),
(5, 'Muhammad Usman', 'pearl boys hostel ,hostel city islamabad', '0310699983', 45510, '2022-12-02', '$2y$10$Y1bR9dbZCAoKp8dw3UqKgOWZNfDJypwuEvxM/qaGKyZqjx8OmEndi', 1, '2022-12-11 18:46:07', 'usan.sirsyedian@gmail.com'),
(6, 'Muhammad ehsa', 'pearl boys hostel ,hostel city islamabad', '03409213948', 45510, '2022-12-08', '$2y$10$lY45wIhiQJtv0AnMMtTC1uRv3QtzqYO3fRRWHITG2gMU3XWx3b5oy', 1, '2022-12-13 21:52:37', 'usman.sirsyedian@gmail.com'),
(7, 'Muhammad Asad', 'usmania boys hostel ,hostel city islamabad', '0121212121212', 45510, '2022-12-08', '$2y$10$XKPqYJWdkYO6Oyzqxow3q.a7.CbvmGqu8DIl5yHXCex0J9sNTmk4G', 1, '2022-12-24 16:26:12', 'asad@gmail.com'),
(8, 'Muhammad Usman', 'pearl boys hostel ,hostel city islamabad', '034312121212', 45510, '2023-01-01', '$2y$10$L1s94RMjaG1JVRi17yD1FePw5uE8D4SwGxq7No3qTfHaXFUasc5CS', 1, '2023-01-09 00:20:50', 'a@gmail.com'),
(9, 'muneeb', 'asdfgbvc  hgf', '03124567654', 45660, '2023-07-07', '$2y$10$NqNUJtbOgEK.d9fSvBevWeM3oI5ML8H2Vs5AbNWPTtTjywwDxe19m', 1, '2023-01-09 14:06:04', 'muneeb@gmail.com'),
(10, 'qasim', 'qaz', '02123123456', 1211, '2023-09-04', '$2y$10$fwzb0TMhD5gA9hAcRMR6nura20v2QKIM.JymD/8t5GOopb1rEFaU2', 1, '2023-09-17 21:48:42', 'qasim@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `seen` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_queries`
--

INSERT INTO `user_queries` (`sr_no`, `name`, `email`, `subject`, `message`, `date`, `seen`) VALUES
(17, 'Muhammad Usman', 'usman.sirsyedian@gmail.com', 'management', 'The behaviour of management team i very rude and unsatisfactory', '2022-12-15', 0),
(18, 'Muhammad Usman', 'usman.sirsyedian@gmail.com', 'inspection', 'dfghjnbv', '2023-01-09', 0),
(19, 'mauz', 'mauz@gmail.com', 'qwxc', 'hj knjkbkjjb hkjlb', '2023-01-09', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_crud`
--
ALTER TABLE `admin_crud`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `booking_order`
--
ALTER TABLE `booking_order`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `room id` (`room_id`),
  ADD KEY `facilities id` (`facilities_id`);

--
-- Indexes for table `room_features`
--
ALTER TABLE `room_features`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `rooms id` (`room_id`),
  ADD KEY `feature id` (`features_id`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `team_details`
--
ALTER TABLE `team_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `user_crud`
--
ALTER TABLE `user_crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_crud`
--
ALTER TABLE `admin_crud`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_order`
--
ALTER TABLE `booking_order`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room_facilities`
--
ALTER TABLE `room_facilities`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `room_features`
--
ALTER TABLE `room_features`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_details`
--
ALTER TABLE `team_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_crud`
--
ALTER TABLE `user_crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_order`
--
ALTER TABLE `booking_order`
  ADD CONSTRAINT `booking_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_crud` (`id`),
  ADD CONSTRAINT `booking_order_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD CONSTRAINT `facilities id` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `room id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `room_features`
--
ALTER TABLE `room_features`
  ADD CONSTRAINT `feature id` FOREIGN KEY (`features_id`) REFERENCES `feature` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `rooms id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
