-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 11, 2026 at 10:20 AM
-- Server version: 11.8.3-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u203369052_car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `customer_id`, `car_id`, `start_date`, `end_date`, `days`, `created_at`) VALUES
(1, 4, 4, '2026-02-10', NULL, 2, '2026-03-07 12:59:12'),
(2, 4, 1, '2026-02-12', NULL, 3, '2026-03-07 13:00:47'),
(3, 4, 5, '2026-03-15', NULL, 3, '2026-03-07 16:02:02'),
(4, 5, 3, '2026-03-18', NULL, 3, '2026-03-07 16:04:03'),
(5, 7, 2, '2026-03-10', NULL, 1, '2026-03-09 09:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `agency_id` int(11) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `vehicle_number` varchar(50) DEFAULT NULL,
  `seating_capacity` int(11) DEFAULT NULL,
  `rent_per_day` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `agency_id`, `model`, `vehicle_number`, `seating_capacity`, `rent_per_day`, `created_at`) VALUES
(1, 1, 'Maruti Swift', 'UP70AB1234', 5, 1500, '2026-03-07 12:42:04'),
(2, 1, 'Hyundai i20', 'UP70XY5678', 5, 1800, '2026-03-07 12:42:31'),
(3, 1, 'Tata Nexon', 'UP70CD9012', 5, 2200, '2026-03-07 12:42:57'),
(4, 2, 'Toyota Innova', 'UP70EF3456', 7, 3500, '2026-03-07 12:44:57'),
(5, 2, 'Mahindra Scorpio', 'UP70GH7890', 7, 3200, '2026-03-07 12:45:17'),
(6, 2, 'Honda City', 'UP70IJ4567', 5, 2500, '2026-03-07 12:45:40'),
(7, 8, 'sadsad', '371862', 6, 6000, '2026-03-09 09:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('customer','agency') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Speed Car Rentals', 'speedcar@gmail.com', '123456', 'agency', '2026-03-07 12:00:08'),
(2, 'City Drive Agency', 'citydrive@gmail.com', '123456', 'agency', '2026-03-07 12:01:52'),
(4, 'Rahul Sharma', 'rahul@gmail.com', '123456', 'customer', '2026-03-07 12:20:50'),
(5, 'Aman Verma', 'aman@gmail.com', '123456', 'customer', '2026-03-07 12:21:27'),
(6, 'Bharat Car Agency', 'bharatcar@gmail.com', '123456', 'agency', '2026-03-07 16:20:10'),
(7, 'aa', 'aa@aa.com', '123456', 'customer', '2026-03-09 09:15:30'),
(8, 'bb', 'bbb@bbb.com', '123456', 'agency', '2026-03-09 09:16:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
