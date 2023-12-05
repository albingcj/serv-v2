-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 05:31 AM
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
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `uid` int(100) NOT NULL,
  `id` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `Degree` varchar(50) NOT NULL,
  `branch` varchar(60) NOT NULL,
  `iname` varchar(100) NOT NULL,
  `univ` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `mos` varchar(30) NOT NULL,
  `mes` varchar(30) NOT NULL,
  `yc` varchar(30) NOT NULL,
  `cs` varchar(30) NOT NULL,
  `score` varchar(30) NOT NULL,
  `cnum` varchar(50) NOT NULL,
  `cert` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`uid`, `id`, `course`, `Degree`, `branch`, `iname`, `univ`, `state`, `mos`, `mes`, `yc`, `cs`, `score`, `cnum`, `cert`) VALUES
(784, 'admin', 'SSLC', 'SSLC', 'COMPUTER SCIENCE AND ENGINEERING', 'AJITHA V', 'stateboard', 'Manipur', 'Full Time', 'xcsd', 'xvdv', 'Completed', '100', 'zzz222', 'images/cert/adminSSLC.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `basic`
--

CREATE TABLE `basic` (
  `id` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `religion` varchar(50) NOT NULL,
  `social` varchar(50) NOT NULL,
  `caste` varchar(50) NOT NULL,
  `ms` varchar(50) NOT NULL,
  `pmc` varchar(50) NOT NULL,
  `pim1` varchar(50) NOT NULL,
  `pim2` varchar(50) NOT NULL,
  `paddress` text NOT NULL,
  `taddress` text NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `blood` varchar(50) NOT NULL,
  `aadhar` varchar(200) NOT NULL,
  `pan` varchar(200) NOT NULL,
  `surgery` varchar(200) NOT NULL,
  `insurance` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cocurricular`
--

CREATE TABLE `cocurricular` (
  `uid` int(100) NOT NULL,
  `id` varchar(50) NOT NULL,
  `event` varchar(100) NOT NULL,
  `pp` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `org_det` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `cert` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cocurricular`
--

INSERT INTO `cocurricular` (`uid`, `id`, `event`, `pp`, `level`, `org_det`, `date`, `cert`) VALUES
(1, 'admin', 'Symposium', 'Participation', 'finals', 'mkce', '2023-08-01', 'images/cert/admin.png'),
(5, 'admin', 'Workshop', 'Participation', 'finals', 'mkce', '2023-08-01', 'images/cert/admin.png');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint(255) NOT NULL,
  `cid` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time(6) DEFAULT current_timestamp(),
  `complaint_type` varchar(255) NOT NULL,
  `description` varchar(100) NOT NULL,
  `block` varchar(20) NOT NULL,
  `place` varchar(30) NOT NULL,
  `fac_id` varchar(20) NOT NULL,
  `hod_id` varchar(20) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  `workers` varchar(255) NOT NULL DEFAULT 'No one Assigned',
  `rating` int(10) DEFAULT 0,
  `feedback` varchar(100) DEFAULT NULL,
  `rej_comment` varchar(100) DEFAULT NULL,
  `fin_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `cid`, `date`, `time`, `complaint_type`, `description`, `block`, `place`, `fac_id`, `hod_id`, `status`, `workers`, `rating`, `feedback`, `rej_comment`, `fin_date`) VALUES
(81, 'ME000001', '2023-11-15', '09:17:20.000000', 'System Complaints', 'fan not working. regulator issues. jane man', 'Boys New Hostel', '301', 'aji', 'ME01', 5, '4,3,1,15,14,13', 1, 'xx', NULL, '2023-11-16 14:02:17'),
(82, 'ME000002', '2023-11-15', '10:03:50.000000', 'System Complaints', 'need light changes near the top right of the corner', 'Main Block', '1', 'aji', 'ME01', 3, '14,15,16', 1, 'xx', NULL, '2023-11-16 15:04:56'),
(83, 'ME000003', '2023-11-16', '15:42:33.000000', 'General Complaints', 'the ac water eis leaking ', 'PG Block', '34', 'aji', 'ME01', 6, '1,12', 0, NULL, NULL, '2023-11-17 09:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `exp`
--

CREATE TABLE `exp` (
  `uid` int(200) NOT NULL,
  `id` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `iname` varchar(100) NOT NULL,
  `design` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `fromd` date NOT NULL,
  `tod` date NOT NULL,
  `exp` varchar(200) NOT NULL,
  `cert` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exp`
--

INSERT INTO `exp` (`uid`, `id`, `type`, `iname`, `design`, `role`, `fromd`, `tod`, `exp`, `cert`) VALUES
(1234, '123', 'HOD', 'erterter', 'etrter', 'HOD', '2013-09-03', '2022-09-03', 'tert', 'ertert');

-- --------------------------------------------------------

--
-- Table structure for table `extracurricular`
--

CREATE TABLE `extracurricular` (
  `uid` int(100) NOT NULL,
  `id` varchar(50) NOT NULL,
  `event` varchar(50) NOT NULL,
  `pp` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `org_det` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `cert` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `extracurricular`
--

INSERT INTO `extracurricular` (`uid`, `id`, `event`, `pp`, `level`, `org_det`, `date`, `cert`) VALUES
(15, 'admin', 'Symposium', '1st Prize', 'level 1', 'mkce', '2023-08-09', 'images/cert/admin.png');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `uid` int(100) NOT NULL,
  `id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `design` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `doj` date NOT NULL,
  `pass` varchar(50) NOT NULL,
  `cert` varchar(100) NOT NULL,
  `bc` int(200) NOT NULL,
  `ac` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`uid`, `id`, `name`, `dept`, `design`, `role`, `doj`, `pass`, `cert`, `bc`, `ac`) VALUES
(1, 'ME01', 'hod', 'ME01', 'hod', 'HOD', '2023-09-07', '123', 'asd', 1, 1),
(12346, 'aji', 'ajitha', 'IT', 'Fac', 'FACULTY', '2023-09-05', '123', '121', 1, 1),
(12347, 'admin', 'admin', 'mkce', 'admin', 'MANAGER', '2023-09-06', 'admin', 's', 26, 26),
(12348, 'itkm', 'itkm', 'itkm', 'itkm', 'ITKM', '2023-09-07', '12', '122', 1, 1),
(12349, 'gen', 'genral staff', 'non technical', 'staff', 'GENERAL', '2023-09-07', '1', '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `uid` int(200) NOT NULL,
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `relationship` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `uid` int(200) NOT NULL,
  `id` varchar(100) NOT NULL,
  `pt` varchar(100) NOT NULL,
  `jn` varchar(100) NOT NULL,
  `pn` varchar(100) NOT NULL,
  `vol` varchar(100) NOT NULL,
  `issue` varchar(100) NOT NULL,
  `pages` varchar(100) NOT NULL,
  `pissn` varchar(100) NOT NULL,
  `eissn` varchar(100) NOT NULL,
  `scope` varchar(30) NOT NULL,
  `mon` varchar(100) NOT NULL,
  `paper` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `uid` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `pass`) VALUES
('admin', 'admin'),
('aji', 'aji'),
('ME01', '123'),
('itkm', '12'),
('gen', '12');

-- --------------------------------------------------------

--
-- Table structure for table `nominee`
--

CREATE TABLE `nominee` (
  `id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  `share` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patent`
--

CREATE TABLE `patent` (
  `uid` int(200) NOT NULL,
  `id` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `fd` date NOT NULL,
  `anum` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `noa` varchar(30) NOT NULL,
  `cert` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

CREATE TABLE `posting` (
  `uid` int(30) NOT NULL,
  `id` varchar(30) NOT NULL,
  `level` varchar(30) NOT NULL,
  `pname` varchar(40) NOT NULL,
  `fromd` date NOT NULL,
  `tod` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `punish`
--

CREATE TABLE `punish` (
  `uid` int(20) NOT NULL,
  `id` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `fromd` varchar(30) NOT NULL,
  `tod` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `punish`
--

INSERT INTO `punish` (`uid`, `id`, `type`, `reason`, `fromd`, `tod`) VALUES
(8, 'admin', 'Cricket ', 'final', 'MKCE ,Karur', '1st Prize'),
(9, 'admin', 'BasketBall', 'pre-finals', 'MKCE ,Karur', 'Participation');

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `id` varchar(30) NOT NULL,
  `oid` varchar(30) NOT NULL DEFAULT '0000-0000',
  `sid` varchar(30) NOT NULL,
  `rid` varchar(30) NOT NULL,
  `gsid` varchar(30) NOT NULL,
  `hid` varchar(30) NOT NULL,
  `iid` varchar(30) NOT NULL,
  `gi` varchar(30) NOT NULL,
  `cs` varchar(30) NOT NULL,
  `cgs` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `uid` int(30) NOT NULL,
  `id` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `no` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `fromd` varchar(30) NOT NULL DEFAULT 'primary',
  `tod` date NOT NULL,
  `cert` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`uid`, `id`, `type`, `no`, `name`, `fromd`, `tod`, `cert`) VALUES
(722, 'admin', 'Symposium', 'Finals', 'VSB', 'Prize', '2023-08-02', 'images/training/adminVSB.png'),
(724, 'admin', 'Hackathon', 'Pre-Finals', 'PSG', '1st Prize', '2023-08-01', 'images/training/adminPSG.png'),
(726, 'admin', 'Hackathon', 'Finals', 'mkce', 'Participation', '2023-08-02', 'images/training/adminmkce.png');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `currentWorkId` int(100) NOT NULL,
  `total` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id`, `name`, `type`, `status`, `rating`, `currentWorkId`, `total`) VALUES
(1, 'anand goswami', 'itkm', 0, 3, 0, 8),
(2, 'box', 'itkm', 0, 0, 0, 0),
(3, 'cow', 'general', 0, 2, 0, 4),
(4, 'dog', 'general', 0, 2, 0, 4),
(5, 'eat', 'itkm', 0, 0, 0, 0),
(6, 'sat', 'genral', 0, 0, 0, 0),
(7, 'eat', 'itkm', 0, 0, 0, 0),
(8, 'fat', 'genral', 0, 0, 0, 0),
(9, 'gun', 'itkm', 0, 0, 0, 0),
(10, 'hot', 'genral', 0, 0, 0, 0),
(11, 'gun', 'itkm', 0, 0, 0, 0),
(12, 'hot', 'genral', 0, 0, 0, 0),
(13, 'ice', 'genral', 0, 3, 0, 8),
(14, 'joy', 'genral', 1, 3, 82, 8),
(15, 'kid', 'genral', 1, 3, 82, 8),
(16, 'lot', 'itkm', 1, 0, 82, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic`
--
ALTER TABLE `academic`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `cocurricular`
--
ALTER TABLE `cocurricular`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cid` (`cid`);

--
-- Indexes for table `exp`
--
ALTER TABLE `exp`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `extracurricular`
--
ALTER TABLE `extracurricular`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `patent`
--
ALTER TABLE `patent`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `punish`
--
ALTER TABLE `punish`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic`
--
ALTER TABLE `academic`
  MODIFY `uid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=785;

--
-- AUTO_INCREMENT for table `cocurricular`
--
ALTER TABLE `cocurricular`
  MODIFY `uid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `exp`
--
ALTER TABLE `exp`
  MODIFY `uid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12346;

--
-- AUTO_INCREMENT for table `extracurricular`
--
ALTER TABLE `extracurricular`
  MODIFY `uid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `uid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12350;

--
-- AUTO_INCREMENT for table `family`
--
ALTER TABLE `family`
  MODIFY `uid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=532;

--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `uid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patent`
--
ALTER TABLE `patent`
  MODIFY `uid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posting`
--
ALTER TABLE `posting`
  MODIFY `uid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `punish`
--
ALTER TABLE `punish`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `uid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=727;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
