-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2021 at 06:47 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pc2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bianos`
--

CREATE TABLE `bianos` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `amount` int(255) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bianos`
--

INSERT INTO `bianos` (`id`, `name`, `picture`, `amount`, `price`) VALUES
(1, 'Bianos Meaty meat pizza', 'assets/img/bianos/meat.jpg', 1, 40),
(2, 'Bianos Cheesy cheese pizza', 'assets/img/bianos/cheese.jpg', 1, 60);

-- --------------------------------------------------------

--
-- Table structure for table `caesars`
--

CREATE TABLE `caesars` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caesars`
--

INSERT INTO `caesars` (`id`, `name`, `picture`, `price`) VALUES
(6, 'Caesars family pizza', 'assets/img/caesars/large.jpg', 157),
(7, 'Caesars single pizza', 'assets/img/caesars/slice.jpg', 25);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `amount` int(255) NOT NULL,
  `price` int(100) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `picture`, `amount`, `price`, `total`) VALUES
(544, 'Bianos Meaty meat pizza', 'assets/img/bianos/meat.jpg', 2, 40, 80),
(545, 'Bianos Cheesy cheese pizza', 'assets/img/bianos/cheese.jpg', 4, 60, 240),
(549, 'Bianos Cheesy cheese pizza', 'assets/img/bianos/cheese.jpg', 1, 60, 60);

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `name`, `location`) VALUES
(2, 'Francis', 'Bahrain'),
(9, 'Comar', 'LAbangon'),
(11, 'Test', 'test'),
(12, 'change', 'cganw'),
(13, 'change', 'Enter1 your location'),
(14, '', ''),
(15, '', ''),
(16, '', ''),
(17, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `shakeys`
--

CREATE TABLE `shakeys` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shakeys`
--

INSERT INTO `shakeys` (`id`, `name`, `picture`, `price`) VALUES
(3, 'Shakeys hawaiian pizza', 'assets/img/shakeys/hawaiian.jpg\r\n', 89),
(4, 'Shakeys supreme pizza', 'assets/img/shakeys/supreme.jpg', 95);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bianos`
--
ALTER TABLE `bianos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caesars`
--
ALTER TABLE `caesars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shakeys`
--
ALTER TABLE `shakeys`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bianos`
--
ALTER TABLE `bianos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `caesars`
--
ALTER TABLE `caesars`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=550;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `shakeys`
--
ALTER TABLE `shakeys`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
