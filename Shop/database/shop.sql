-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2023 at 03:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `delivery_address`, `created_at`) VALUES
(4, 4, 'srbija, Novi Sad, 22004, Karadjordjeva 44', '2023-08-10 07:44:09'),
(5, 4, 'srbija, Beograd , 22222, Radnicka 33', '2023-08-10 07:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_items_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_items_id`, `order_id`, `product_id`, `quantity`) VALUES
(9, 3, 2, '1'),
(10, 3, 2, '1'),
(11, 3, 5, '1'),
(12, 3, 6, '3'),
(13, 4, 3, '3'),
(14, 4, 5, '1'),
(16, 4, 5, '1'),
(17, 4, 5, '1'),
(18, 4, 5, '2'),
(19, 4, 4, '3'),
(20, 4, 6, '1'),
(21, 4, 9, '1'),
(22, 4, 8, '1'),
(23, 5, 4, '1'),
(24, 5, 6, '2'),
(25, 5, 5, '1'),
(26, 6, 5, '2'),
(27, 6, 4, '3'),
(28, 7, 11, '1'),
(29, 7, 12, '2');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `size`, `image`, `created_at`) VALUES
(4, 'Jeans 2', '15.99', 'M-Large', 'adydp03056_dcshoes,f_bsnw_frt1.jpg', '2023-08-08 19:52:11'),
(5, 'Kacket 3', '28.99', 'Medium', 'Baseball_cap.jpg', '2023-08-08 19:52:11'),
(6, 'Product F', '14.99', 'Small', 'productF.jpg', '2023-08-08 19:52:11'),
(7, 'Majica1', '129.93', 'L', 'gydt7z3yebrjofgdssrplqaxxvfbddjjriohvg9ltnfiuqk6.png', '2023-08-09 09:53:34'),
(8, 'Majica2', '100', 'M', 'img-20181220-wa0001-jpg.jpg', '2023-08-09 09:55:39'),
(9, 'Jeans 3', '129.95', 'M', 'hmgoepprod.jpg', '2023-08-09 09:57:52'),
(10, 'Majica3', '33.5', 'S', 'img-20181220-wa0001-jpg.jpg', '2023-08-10 08:01:16'),
(11, 'Kacket 1', '23.33', 'M', 'Baseball_cap.jpg', '2023-08-10 08:59:23'),
(12, 'Farmerke ', '20.45', 'XL', 'adydp03056_dcshoes,f_bsnw_frt1.jpg', '2023-08-10 09:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `email`, `is_admin`, `password`, `created_at`) VALUES
(1, 'Dragan', 'Dragan3', 'milosevicdragan022@gmail.com', 0, '$2y$10$WNmLhnWL/CFA0kRhpmitMO9SwBkatEa96oJcrXGiNjAeT9vesO8DS', '2023-08-08 07:12:13'),
(2, 'Lazar', 'cysecor', 'cysecor@gmail.com', 0, '$2y$10$cuvYXvrzwxrBsMbAT0.W0.tyZjrCeV9Y.1jW5RWCHLVRruLkxWN3.', '2023-08-08 09:26:31'),
(3, 'Admin Adminovic', 'admin', 'admin@gmail.com', 1, '$2y$10$i90c32oysR1ziTv5DFyI0uz3a7wWcn5.uKYqBmhHHSjKi3OUxEoOq', '2023-08-09 08:30:40'),
(4, 'Korisnik Korisnikovic', 'korisnik3', 'korisnik@gmail.com', 0, '$2y$10$C/XnwnY0dEhA/WT1Y7jTIOXuxDA2BLVyN0m/UWoqBlIBcZ/N3tJSm', '2023-08-10 06:38:56'),
(5, 'Marta Terek', 'Marta3', 'marta@gmail.com', 0, '$2y$10$GLl6jLwoRi5BQ0REYtkJqeTqxbyEkXPLFko/Vgt.1cFA1iuzeuJ9W', '2023-08-10 15:27:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_items_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
