-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2017 at 08:18 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_manage`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `login_username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_personal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `chatwork` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `skype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `literacy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank_account` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT 'số chứng minh thư',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_datetime` date NOT NULL,
  `exit_datetime` date NOT NULL,
  `leave_days_have` double NOT NULL COMMENT 'số ngày nghỉ phép',
  `leave_days_took` double NOT NULL COMMENT 'Số ngày phép đã nghỉ',
  `leave_days_note` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Note về ngày phép',
  `del_flag` int(1) NOT NULL COMMENT '1:xóa; 0:chưa xóa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `login_username`, `login_password`, `fullname`, `email_company`, `email_personal`, `chatwork`, `skype`, `tel`, `gender`, `birthday`, `image`, `department`, `position`, `employee_type`, `skill`, `literacy`, `contract_type`, `work_address`, `status`, `address`, `bank_account`, `id_number`, `description`, `join_datetime`, `exit_datetime`, `leave_days_have`, `leave_days_took`, `leave_days_note`, `del_flag`) VALUES
(1, 'admin', 'admin123', 'admin', 'admin@gmail.com', 'admin@gmail.com', 'admin@gmail.com', 'adminx123', '0123456789', 'male', '1984-10-01', '', 'IT', 'Director', 'Official employee', 'Android+iOS+PHP', '12/12', '3 years', 'App room', 'Joining', 'Việt Nam', '711xxx', '174111222', '1', '2000-01-18', '1970-01-01', 7, 4, '', 0),
(2, 'taikhoan2', '123123', 'taikhoan 11', 'taikhoan11@gmail.com', 'taikhoan11@gmail.com', 'taikhoan11@gmail.com', 'taikhoan11x123', '0123456798', 'male', '1992-09-09', '', 'IT', 'Employee', 'Intership', 'PHP', '12/12', '6 months', 'IT room', 'Joining', 'Việt Nam', '711zzz', '174222333', '1', '2017-01-01', '0000-00-00', 2, 3, '', 1),
(3, 'taikhoan3', '123123', 'taikhoan 22', 'taikhoan22@gmail.com', 'taikhoan22@gmail.com', 'taikhoan22@gmail.com', 'taikhoan22x123', '01688333222', 'female', '1989-01-03', '', 'IT', 'Employee', 'Contract', 'PHP', '12/12', '2 years', 'IT room', 'Joining', 'Việt Nam', '711aaa', '174333444', '1', '2017-01-01', '1970-01-01', 2, 2.5, '', 0),
(4, 'taikhoan4', '123123', 'taikhoan 33', 'taikhoan33@gmail.com', 'taikhoan33@gmail.com', 'taikhoan33@gmail.com', 'taikhoan33x123', '0169222111', 'female', '1994-01-14', '', 'Construction', 'Employee', 'Intership', 'Ruby', '12/12', '6 months', 'Construction room', 'Joining', 'Việt Nam', '711vvv', '176444555', '1', '2017-01-01', '2017-02-05', 4, 4, '', 0),
(5, 'taikhoan5', '123123', 'taikhoan44', 'taikhoan44@gmail.com', 'taikhoan5@gmail.com', 'taikhoan44@gmail.com', 'taikhoan44x123', '0123456789', 'male', '1993-01-09', '', 'Construction', 'BSE', 'Official employee', 'Server', '12/12', '3 years', 'Construction room', 'Exited', 'Việt Nam', '711xxxaaa', '178222999', '1', '2000-12-22', '2017-02-04', 4, 0, '', 0),
(6, 'taikhoan6', '123123', 'taikhoan55', 'taikhoan55@gmail.com', 'taikhoan55@gmail.com', 'taikhoan55@gmail.com', 'taikhoan55x123', '0123456798', 'male', '1992-12-25', '', 'Construction', 'Tester', 'Official employee', 'Ruby', '12/12', '5 years', 'Construction room', 'Joining', 'Việt Nam', '711hhh', '178000222', '1', '2001-01-10', '1970-01-01', 0, 0, '', 0),
(7, 'taikhoan7', '123123', 'taikhoan66', 'taikhoan66@gmail.com', 'taikhoan66@gmail.com', 'taikhoan66@gmail.com', 'taikhoan66x123', '0123456987', 'female', '1994-01-10', '', 'IT', 'Tester', 'Official employee', 'Android+iOS', '12/12', '3 years', 'IT room', 'Joining', 'Việt Nam', '711eee', '176555333', '1', '2002-01-09', '1970-01-01', 0, 0, '1', 0),
(8, 'test1', '123123', 'test1', 'test1@gmail.com', 'test1@gmail.com', 'test1@gmail.com', 'test1x123', '098765432', 'male', '1993-01-30', '', 'Construction', 'Employee', 'Official employee', 'Server', 'Đại học', '5 years', 'Construction room', 'Joining', 'Việt Nam', '711eeeccc', '174903782', '1', '2002-09-04', '1970-01-01', 0, 0, '', 0),
(9, 'demo', '123123', 'demo abc', 'demo@gmail.com', 'demo@gmail.com', 'demo@gmail.com', 'demo123xxx', '013456789', 'female', '1994-02-15', '', 'IT', 'BSE', 'Official employee', 'Android+iOS+PHP', 'Đại học', '5 years', 'App room', 'Joining', 'Việt Nam', '711xxxrrr', '178345876', 'a', '2000-01-31', '0000-00-00', 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_project`
--

CREATE TABLE `employee_project` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `join_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'trạng thái nhân viên với dự án',
  `del_flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_project`
--

INSERT INTO `employee_project` (`id`, `employee_id`, `project_id`, `join_status`, `del_flag`) VALUES
(1, 6, 1, 'leader', 0),
(2, 8, 2, 'leader', 0),
(3, 1, 3, 'leader', 0);

-- --------------------------------------------------------

--
-- Table structure for table `leavedays`
--

CREATE TABLE `leavedays` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `leave_datetime` date NOT NULL COMMENT 'ngày nghỉ phép',
  `leave_hour` double NOT NULL COMMENT 'số giờ nghỉ',
  `leave_reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'lý do nghỉ',
  `del_flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `leavedays`
--

INSERT INTO `leavedays` (`id`, `employee_id`, `leave_datetime`, `leave_hour`, `leave_reason`, `del_flag`) VALUES
(1, 1, '2017-01-01', 0.5, 'ốm', 0),
(2, 4, '2017-01-02', 0.5, 'ốm', 0),
(3, 3, '2017-01-03', 1, 'việc gia đình', 0),
(4, 4, '2017-02-08', 0.5, 'ốm', 0),
(5, 5, '2017-02-08', 1, 'ốm', 0),
(6, 5, '2017-01-10', 0.5, 'ốm', 0),
(7, 8, '2017-02-02', 0.5, 'ốm', 0),
(9, 7, '2017-02-03', 0.5, 'ốm', 0),
(10, 6, '2017-02-04', 0.5, 'aa', 0),
(11, 8, '2017-01-29', 0.5, 'a', 0),
(12, 8, '2017-02-08', 0.4, 'a', 0),
(13, 7, '2017-02-07', 0.2, 'a', 0),
(14, 9, '2017-02-09', 0.2, 'a', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ot`
--

CREATE TABLE `ot` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `ot_datetime` date NOT NULL,
  `ot_hour` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ot`
--

INSERT INTO `ot` (`id`, `project_id`, `employee_id`, `ot_datetime`, `ot_hour`) VALUES
(1, 3, 3, '2017-02-02', 2),
(2, 2, 4, '2017-02-03', 4),
(3, 3, 3, '2017-02-06', 1),
(4, 2, 2, '2017-01-03', 3),
(5, 3, 6, '2017-02-01', 3),
(6, 2, 4, '2017-02-09', 1),
(7, 6, 9, '2017-02-14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'trạng thái dự án',
  `start_datetime` date NOT NULL COMMENT 'ngày bắt đầu',
  `end_datetime` date NOT NULL COMMENT 'ngày kết thúc',
  `leader_id` int(11) NOT NULL,
  `project_lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ngôn ngữ lập trình',
  `project_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'mô tả dự án',
  `del_flag` int(1) NOT NULL COMMENT '0:chưa xóa; 1:xóa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `project_status`, `start_datetime`, `end_datetime`, `leader_id`, `project_lang`, `project_description`, `del_flag`) VALUES
(1, 'Suguku', 'Running', '2017-01-04', '0000-00-00', 6, 'Ruby', '', 0),
(2, 'DNP(AR)', 'Running', '2017-01-01', '0000-00-00', 8, 'Server', '', 0),
(3, 'Tsunagu', 'Running', '2017-01-03', '0000-00-00', 1, 'Android+IOS+PHP', '', 0),
(4, 'Lotte App', 'Running', '2017-02-01', '0000-00-00', 7, 'Android+IOS', 'a', 0),
(5, 'Lotte App', 'Running', '2017-02-01', '0000-00-00', 7, 'Android+IOS', 'a', 0),
(6, 'Lequio', 'Running', '2017-02-03', '0000-00-00', 4, 'Ruby', 'a', 0),
(7, 'Lotte App (2)', 'Running', '2017-02-01', '2017-02-28', 7, 'Android+IOS', '								a							', 1),
(8, 'Lotte App (2)', 'Close', '2017-02-01', '2017-03-01', 7, 'Android+IOS', '																																								a																																			', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_project`
--
ALTER TABLE `employee_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leavedays`
--
ALTER TABLE `leavedays`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `ot`
--
ALTER TABLE `ot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `employee_project`
--
ALTER TABLE `employee_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `leavedays`
--
ALTER TABLE `leavedays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `ot`
--
ALTER TABLE `ot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
