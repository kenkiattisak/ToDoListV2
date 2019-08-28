-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2019 at 06:29 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolistdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_todo`
--

CREATE TABLE `tb_todo` (
  `td_id` int(11) NOT NULL,
  `td_todo` varchar(50) COLLATE utf8mb4_thai_520_w2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_thai_520_w2;

--
-- Dumping data for table `tb_todo`
--

INSERT INTO `tb_todo` (`td_id`, `td_todo`) VALUES
(60, 'ddcvg'),
(61, 'ggg'),
(62, 'TEST '),
(63, 'kytkytk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_todo`
--
ALTER TABLE `tb_todo`
  ADD PRIMARY KEY (`td_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_todo`
--
ALTER TABLE `tb_todo`
  MODIFY `td_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
