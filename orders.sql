-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2020 at 05:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment7`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `postcode` varchar(200) NOT NULL,
  `province` varchar(200) NOT NULL,
  `product1` int(11) DEFAULT NULL,
  `product2` int(11) DEFAULT NULL,
  `product3` int(11) DEFAULT NULL,
  `totalCost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `city`, `postcode`, `province`, `product1`, `product2`, `product3`, `totalCost`) VALUES
(1, 'John Smith', 'john@sheridancollege.ca', '123-123-1234', '123 address', 'Toronto', 'A2A 2A2', 'Ontario', 5, 2, 6, 234.56),
(2, 'Tom', 'tom@gmail.com', '123-332-4567', '28 Trafalgar', 'Oakville', 'H4A 7D4', 'Ontario', 1, 1, 1, 2761.5),
(4, 'khang', 'email@domain.com', '123-123-1234', '123 Trafalgar Street', 'Toronto', 'X9X 9X9', 'alberta', 1, 1, 1, 2761.5),
(5, 'khang', 'email@domain.com', '123-123-1234', '123 Trafalgar Street', 'Toronto', 'X9X 9X9', 'alberta', 1, 1, 1, 2761.5),
(6, 'Anne Hatheway', 'anna@gmail.com', '345-223-4034', '23 Square One', 'Vancouver', 'K9G 2O9', 'BC', 2, 3, 4, 8304.8),
(7, 'Tony Stark', 'tony@avangers.com', '234-549-4982', '23 South Notario', 'Winnerpeg', 'L8J 7F3', 'manitoba', 2, 3, 1, 5622.4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
