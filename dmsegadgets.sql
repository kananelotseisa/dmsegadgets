-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 12:19 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmsegadgets`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profilepic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `profilepic`) VALUES
(1, 'Tseisa', 'caff553961b06d4fea6d32794e4e24bd', '');

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `member_id` varchar(8) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `points` int(11) NOT NULL DEFAULT 200,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`member_id`, `name`, `email`, `password`, `status`, `points`, `create_datetime`) VALUES
('2022MP', 'Khaliso', 'makhube@gmail.com ', 'e57ff9231212d705f09215a01e50e2db', 'approved', 200, '2022-12-02 08:49:41'),
('215787', 'Molemo', 'mahloane@gmail.com', 'b3c42908b0e58516a3ba607b67be9a7f', 'approved', 200, '2022-12-02 04:55:47'),
('3M3M34', 'Lenyata', 'lenyeta@gmail.com', 'f1e709e6aef16ba2f0cd6c7e4f52b9b6', 'pending', 200, '2022-12-02 11:27:10'),
('53EG82', 'Thuso', 'thuso@gmail.com', '7c9819fe2f2d651e4edd4eea8eb12e5c', 'approved', 200, '2022-12-02 12:18:51'),
('7SM028', 'Mmako', 'mmakommako@gmail.com', '31d61cae1f8c86be3d99abf58b16d660', 'pending', 200, '2022-12-02 01:53:51'),
('8SEE3D', 'Mpho', 'mpho63@gmail.com', '33ea011f5e10469f61445d3c5dd3320c', 'deny', 200, '2022-12-02 05:05:03'),
('9M3G80', 'Neo', 'neo@gmail.com', '73882ab1fa529d7273da0db6b49cc4f3', 'approved', 200, '2022-12-14 13:19:02'),
('D495G1', 'Kananelo', 'kananelo@gmail.com', '5531a5834816222280f20d1ef9e95f69', 'approved', 200, '2023-01-06 19:53:48'),
('EMGDS6', 'Thabo', 'thabo@gmail.com', 'dff1749a367a95e75a84a6385df5dfa9', 'pending', 200, '2022-12-02 11:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `distributor stock`
--

CREATE TABLE `distributor stock` (
  `id` int(11) NOT NULL,
  `distributor` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `buying_price` double(6,2) NOT NULL,
  `selling_price` double(6,2) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gadgets`
--

CREATE TABLE `gadgets` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` double(6,2) NOT NULL,
  `points` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gadgets`
--

INSERT INTO `gadgets` (`id`, `image`, `name`, `description`, `price`, `points`) VALUES
(2, '1669826289_chair1.png', 'Gaming Chair', 'This chair is designed to reduce muscle pain and bring comfort', 1200.00, 120),
(6, '1669833990_boxunit.png', 'System box', 'inside: 1TB HDD, 16GB RAM', 1600.00, 161),
(8, '1669834108_singlehandkeyboard.png', 'keyboard', 'single hand minimal keyboard', 120.00, 60),
(13, '1669835532_rgbmonitor.png', 'rgb monitor', 'gaming monitor with rgb cooler', 2000.00, 230),
(15, '1669974289_sofa.png', 'Gaming Sofa', 'Roller coaster gti', 3500.00, 300),
(16, '1671020580_pinkmouse.png', 'Rgb mouse', 'multi-functional mouse', 20.00, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `distributor stock`
--
ALTER TABLE `distributor stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gadgets`
--
ALTER TABLE `gadgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `distributor stock`
--
ALTER TABLE `distributor stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gadgets`
--
ALTER TABLE `gadgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
