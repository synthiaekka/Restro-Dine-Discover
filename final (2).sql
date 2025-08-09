-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 12:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL,
  `cust_email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `food_id`, `rest_id`, `cust_email`) VALUES
(14, 6, 3, 'synthiaekka04@gmail.com'),
(15, 6, 3, 'synthiaekka04@gmail.com'),
(16, 3, 3, 'synthiaekka04@gmail.com'),
(17, 6, 3, 'synthiaekka04@gmail.com'),
(18, 3, 3, 'synthiaekka04@gmail.com'),
(19, 3, 3, 'synthiaekka04@gmail.com'),
(20, 2, 1, 'synthiaekka04@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `email`, `phone`, `password`, `name`) VALUES
(1, 'synthiaekka04@gmail.com', '9362560984', '0987654321', 'Synthia Ekka');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `price` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `image`, `description`, `price`, `rest_id`) VALUES
(1, 'Vegetable Salad', 'https://i.postimg.cc/wTLMsvSQ/food-menu1.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, quae.', 250, 2),
(2, 'Oats', 'https://i.postimg.cc/sgzXPzzd/food-menu2.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, quae.', 350, 1),
(3, 'Raw Vegetables', 'https://i.postimg.cc/8zbCtYkF/food-menu3.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, quae.', 100, 3),
(4, 'Fruits Vegetables Mix', 'https://i.postimg.cc/Yq98p5Z7/food-menu4.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, quae.', 250, 4),
(5, 'Fruit Salad', 'https://i.postimg.cc/KYnDqxkP/food-menu5.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, quae.', 200, 6),
(6, 'Fruit Cake', 'https://i.postimg.cc/Jnxc8xQt/food-menu6.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, quae.', 150, 3);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `Res_name` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `manager` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `Res_name`, `address`, `image`, `manager`) VALUES
(1, 'The Great Kabab Factory', 'Delhi', './images/restaurant/restaurant1.jpg', 1),
(2, 'Cafe B-You', 'France', './images/restaurant/restaurant2.jpg', 1),
(3, 'Terra Maya', 'Nepal', './images/restaurant/restaurant3.jpg', 1),
(4, 'Ahaar', 'Azara', './images/restaurant/restaurant4.jpg', 1),
(6, 'Foodisthan', 'Guwahati', './images/restaurant/restaurant5.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `review` varchar(256) NOT NULL,
  `stars` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `rest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `review`, `stars`, `cust_id`, `rest_id`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit voluptas cupiditate aspernatur odit doloribus non.', 5, 1, 1),
(2, 'This is a dummy review', 3, 1, 2),
(3, 'This is a dummy review injected for testing purpose', 1, 1, 3),
(4, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.', 4, 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
