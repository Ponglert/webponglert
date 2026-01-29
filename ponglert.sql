-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2026 at 09:02 AM
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
-- Database: `ponglert`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id_mem` int(11) NOT NULL COMMENT 'รหัสสมาชิก',
  `name_mem` varchar(50) NOT NULL,
  `email_mem` varchar(100) NOT NULL,
  `password_mem` varchar(50) NOT NULL,
  `sex_mem` smallint(6) NOT NULL,
  `birthday_mem` date NOT NULL,
  `phone_mem` varchar(20) NOT NULL,
  `address_mem` varchar(200) DEFAULT NULL,
  `zipcode_mem` varchar(10) DEFAULT NULL,
  `country_mem` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id_mem`, `name_mem`, `email_mem`, `password_mem`, `sex_mem`, `birthday_mem`, `phone_mem`, `address_mem`, `zipcode_mem`, `country_mem`) VALUES
(1, 'Ponglert Sangkaphet', 'ponglert.s@ubru.ac.th', '123456', 1, '2026-01-01', '0861433302', 'addressp', '34000', 'Thai'),
(2, 'user01', 'user01@gmail.com', '123456', 2, '2025-09-17', '0861433301', 'user01address', '34000', 'Thai'),
(3, 'user02', 'user02@gmail.com', '123456', 1, '2025-09-08', '0861433305', 'user01address', '34000', 'Thai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id_mem`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id_mem` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสมาชิก', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
