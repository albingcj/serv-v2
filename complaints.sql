-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2023 at 07:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mm`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time(6) DEFAULT NULL,
  `complaint_type` varchar(255) NOT NULL,
  `description` varchar(100) NOT NULL,
  `block` varchar(20) NOT NULL,
  `place` varchar(30) NOT NULL,
  `fac_id` varchar(20) NOT NULL,
  `hod_id` varchar(20) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  `feedback` varchar(100) DEFAULT NULL,
  `rej_comment` varchar(100) DEFAULT NULL,
  `hod_ap_date` date DEFAULT NULL,
  `princ_ap_date` date DEFAULT NULL,
  `man_ap_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `date`, `time`, `complaint_type`, `description`, `block`, `place`, `fac_id`, `hod_id`, `status`, `feedback`, `rej_comment`, `hod_ap_date`, `princ_ap_date`, `man_ap_date`) VALUES
(1, '2023-09-12', '09:11:12.000000', '', 'SYSTEM 4', 'RK', 'FOP LAB', '214001', 'admin', 0, NULL, NULL, NULL, NULL, NULL),
(2, '2023-09-08', '16:25:18.000000', '', 'dfdg dfg dg fgfd ', '24', 'yfyhfgh', '12131232', 'admin', 1, NULL, NULL, NULL, NULL, NULL),
(3, '2023-09-12', NULL, '', 'asdasdasdasdas', 'daasd', 'adsdasd', '121212', 'admin', 2, NULL, NULL, NULL, NULL, NULL),
(1694537667, '2023-09-12', NULL, '', 'sdasdsad', 'Main Block', '12', '', 'ME01', 3, NULL, NULL, NULL, NULL, NULL),
(1694537668, '2023-09-13', '11:53:57.000000', '', 'bulb fix', 'apj', '331', '121212', 'admin', -1, NULL, 'the lights are fixed already', NULL, NULL, NULL),
(1694596636, '2023-09-13', NULL, '', 'sdfdsfsdf', 'PG Block', '1', '', 'EEE01', 0, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1694596637;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
