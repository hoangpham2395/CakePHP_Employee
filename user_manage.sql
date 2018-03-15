-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2018 at 10:05 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_manage`
--

-- --------------------------------------------------------

--
-- Table structure for table `leavedays`
--

CREATE TABLE `leavedays` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `leave_datetime` date NOT NULL COMMENT 'ngày tháng nghỉ',
  `leave_hour` double NOT NULL COMMENT 'số giờ nghỉ',
  `leave_reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'lý do nghỉ',
  `del_flag` int(11) NOT NULL COMMENT '0:chưa xóa; 1:xóa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leavedays`
--

INSERT INTO `leavedays` (`id`, `user_id`, `leave_datetime`, `leave_hour`, `leave_reason`, `del_flag`) VALUES
(1, 1, '2017-01-02', 0.5, 'ốm', 0),
(2, 4, '2017-01-02', 0.5, 'ốm', 0),
(3, 3, '2017-01-03', 1, 'việc gia đình', 0),
(4, 4, '2017-02-08', 0.5, 'ốm', 0),
(5, 5, '2017-02-08', 1, 'ốm', 0),
(6, 5, '2017-01-10', 0.5, 'ốm', 0),
(7, 8, '2017-02-02', 0.5, 'ốm', 0),
(9, 7, '2017-05-03', 0.5, 'ốm', 0),
(10, 6, '2017-02-04', 0.5, 'aa', 0),
(11, 8, '2017-01-29', 0.5, 'a', 0),
(12, 8, '2017-02-08', 0.4, 'a', 0),
(13, 7, '2017-02-07', 0.2, 'a', 0),
(14, 9, '2017-02-09', 0.2, 'a', 0),
(15, 5, '2017-03-06', 0.3, 'a', 0),
(16, 3, '2017-01-01', 0.5, 'ốm', 0),
(17, 3, '2017-01-01', 0.5, 'ốm', 0),
(18, 10, '2017-01-02', 0.5, 'Ốm', 0),
(19, 8, '2017-01-03', 0.5, 'việc gia đình', 0),
(22, 4, '2017-01-06', 0.3, 'ốm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ots`
--

CREATE TABLE `ots` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ot_datetime` date NOT NULL COMMENT 'ngày nghỉ trong dự án',
  `ot_hour` float NOT NULL COMMENT 'số giờ nghỉ',
  `del_flag` int(11) NOT NULL COMMENT '0:chưa xóa; 1:xóa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ots`
--

INSERT INTO `ots` (`id`, `project_id`, `user_id`, `ot_datetime`, `ot_hour`, `del_flag`) VALUES
(1, 3, 3, '2017-02-02', 1, 0),
(2, 2, 4, '2017-02-03', 1, 0),
(3, 3, 3, '2017-02-06', 2, 0),
(4, 2, 2, '2017-01-03', 3, 0),
(5, 3, 6, '2017-02-01', 1, 0),
(6, 2, 4, '2017-02-09', 1.5, 0),
(7, 6, 9, '2017-02-14', 2, 0),
(8, 11, 12, '2017-03-01', 1, 0),
(9, 6, 9, '2017-02-08', 3, 0),
(10, 3, 6, '2017-02-01', 2, 0),
(11, 3, 6, '2017-02-04', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'trạng thái dự án',
  `start_datetime` date NOT NULL COMMENT 'ngày bắt đầu',
  `end_datetime` int(11) NOT NULL COMMENT 'ngày kết thúc',
  `user_id` int(11) NOT NULL COMMENT 'leader',
  `project_lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ngôn ngữ lập trình',
  `project_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'mô tả dự án',
  `del_flag` int(1) NOT NULL COMMENT '0:chưa xóa; 1:xóa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `project_status`, `start_datetime`, `end_datetime`, `user_id`, `project_lang`, `project_description`, `del_flag`) VALUES
(1, 'Suguku', 'Running', '2017-01-04', 0, 6, 'Ruby', 'a', 0),
(2, 'DNP(AR)', 'Running', '2017-01-01', 0, 8, 'Server', '', 0),
(3, 'Tsunagu', 'Running', '2017-01-03', 0, 1, 'Android+IOS+PHP', 'g', 0),
(4, 'Lotte App', 'Running', '2017-02-01', 0, 7, 'Android+IOS', 'a', 1),
(5, 'Lotte App', 'Close', '2016-12-25', 2017, 9, 'Android+IOS', 'a', 0),
(6, 'Lequio', 'Received', '2017-02-07', 0, 5, 'Ruby', 'a', 0),
(7, 'Lotte App (2)', 'Running', '2017-02-01', 2017, 7, 'Android+IOS', 'a', 1),
(8, 'Lotte App (2)', 'Maintenance', '2016-12-25', 2017, 7, 'Android+IOS', 'a', 0),
(9, 'Loco Bee', 'Running', '2017-03-03', 0, 9, 'Nodejs+Android+IOS+PHP', 'a', 0),
(10, 'Data_Sale', 'Running', '2017-02-02', 0, 3, 'PHP', 'a', 0),
(11, 'Uema App', 'Running', '2017-02-21', 0, 12, 'IOS', 'a', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_company` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_personal` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chatwork` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skype` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(1) NOT NULL COMMENT '2:nam; 1:nữ; 3:khác',
  `birthday` date NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `literacy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_datetime` date NOT NULL,
  `exit_datetime` date NOT NULL,
  `leave_days_have` double NOT NULL COMMENT 'số ngày nghỉ cho phép',
  `leave_days_took` double NOT NULL COMMENT 'số ngày nghỉ phép đã nghỉ',
  `leave_days_note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_flag` int(1) NOT NULL COMMENT '0:chưa xóa; 1:xóa',
  `created` datetime NOT NULL COMMENT 'thời gian khởi tạo',
  `modified` datetime NOT NULL COMMENT 'thời gian cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `email_company`, `email_personal`, `chatwork`, `skype`, `tel`, `gender`, `birthday`, `image`, `department`, `position`, `user_type`, `skill`, `literacy`, `contract_type`, `work_address`, `status`, `address`, `bank_account`, `id_number`, `description`, `join_datetime`, `exit_datetime`, `leave_days_have`, `leave_days_took`, `leave_days_note`, `del_flag`, `created`, `modified`) VALUES
(1, 'hoangph', 'aa34e2ef1d8ade8a07bb3de0f4eee08fa1562b28', 'Phạm Huy Hoàng', 'hoangph@gmail.com', 'hoangph@gmail.com', 'hoangph@gmail.com', 'hoangphx123', '0123456789', 2, '1995-03-02', '', 'IT', 'Employee', 'Official employee', 'PHP', 'Đại học', '5 years', 'IT room', 'Joining', 'Việt Nam', '711AAXXXYYY', '174904888', '																1														', '2016-03-09', '1970-01-01', 10, 0, '', 0, '2017-01-01 04:10:29', '2017-06-01 20:47:54'),
(2, 'hoalt', '1415ad20f466c032e2fdf1e9fa98df6c4972a532', 'Lê Thị Hoa', 'hoalt88@gmail.com', 'demo@gmail.com', 'hoalt88@gmail.com', 'hoalt88', '01231234535', 1, '1988-03-08', '', 'App', 'Tester', 'Official employee', 'Android+IOS', 'Đại học', '5 years', 'App room', 'Joining', 'Việt Nam', '711AABBBXXX', '174178252', '																								1																					', '2016-03-15', '1970-01-01', 10, 3, 'adsda', 0, '2017-01-01 04:10:29', '2017-06-01 20:53:46'),
(3, 'admin', '9fdc5a5d0efd918d79f3f6f18842bc472a014a28', 'admin', 'admin@gmail.com', 'admin@gmail.com', 'admin@gmail.com', 'adminx123', '0123456789', 2, '1984-10-01', '', 'IT', 'Director', 'Official employee', 'Android+iOS+PHP', 'Đại học', '3 years', 'App room', 'Joining', 'Việt Nam', '711xxx', '174111222', '								1							', '2000-01-18', '1970-01-01', 7, 4, '', 0, '2017-01-01 04:10:29', '2017-06-01 20:45:33'),
(4, 'quantm', '6444b30f8270d4c9e7f1be265a61df9012fdb979', 'Trần Mạnh Quân', 'quantm92@gmail.com', 'taikhoan11@gmail.com', 'quantm92@gmail.com', 'quantm92', '0123456798', 2, '1992-09-09', '', 'IT', 'Employee', 'Intership', 'PHP', 'Đại học', '6 months', 'IT room', 'Joining', 'Việt Nam', '711zzz', '174222333', '																								1																					', '2017-01-01', '1970-01-01', 2, 3, '', 0, '2017-01-01 04:10:29', '2017-06-03 18:56:07'),
(5, 'thanhdt', 'bcfdbf7088145e0ff7d156a16c8714e845bd7d0c', 'Đặng Tiến Thành', 'thanhdt89@gmail.com', 'thanhdt89@gmail.com', 'thanhdt89@gmail.com', 'thanhdt89', '01688333222', 2, '1989-01-03', '', 'IT', 'Employee', 'Contract', 'PHP', 'Đại học', '2 years', 'IT room', 'Joining', 'Việt Nam', '711aaa', '174333444', '																																1																												', '2017-01-01', '1970-01-01', 3, 2.5, '', 0, '2017-01-01 04:10:29', '2017-06-06 12:27:27'),
(6, 'tuannm', '6444b30f8270d4c9e7f1be265a61df9012fdb979', 'Nguyễn Mạnh Tuấn', 'tuannm94@gmail.com', 'taikhoan33@gmail.com', 'tuannm94@gmail.com', 'tuannm94', '0169222111', 2, '1994-01-14', '', 'Construction', 'Employee', 'Intership', 'Ruby+Server', 'Đại học', '6 months', 'Construction room', 'Joining', 'Việt Nam', '711vvv', '176444555', '								1							', '2017-01-01', '2017-02-05', 4, 4, '', 0, '2017-01-01 04:10:29', '2017-06-01 20:51:21'),
(7, 'dungct', '6658463e6dc63f71343b5fff381468ee4aeb8d2b', 'Cao Tuấn Dũng', 'dungct93@gmail.com', 'dungct93@gmail.com', 'dungct93@gmail.com', 'dungct93', '0123456789', 2, '1993-01-09', '', 'Construction', 'BSE', 'Official employee', 'Ruby+Server', 'Đại học', '3 years', 'Construction room', 'Exited', 'Việt Nam', '711xxxaaa', '178222999', '																1														', '2000-12-22', '2017-02-04', 3, 0, '', 0, '2017-01-01 04:10:29', '2017-06-03 19:38:48'),
(8, 'hieudd', '6444b30f8270d4c9e7f1be265a61df9012fdb979', 'Đỗ Duy Hiếu', 'hieudd92@gmail.com', 'taikhoan55@gmail.com', 'hieudd92@gmail.com', 'hieudd92', '0123456798', 2, '1992-12-25', '', 'Construction', 'Tester', 'Official employee', 'Ruby+Server', 'Đại học', '5 years', 'Construction room', 'Joining', 'Việt Nam', '711hhh', '178000222', '								1							', '2001-01-10', '1970-01-01', 0, 0, '', 0, '2017-01-01 04:10:29', '2017-06-01 20:57:40'),
(9, 'dungdv', '6444b30f8270d4c9e7f1be265a61df9012fdb979', 'Đinh Văn Dũng', 'dungdv94@gmail.com', 'taikhoan66@gmail.com', 'dungdv94@gmail.com', 'dungdv94', '0123456987', 2, '1994-01-10', '', 'IT', 'Tester', 'Official employee', 'Android+iOS', 'Đại học', '3 years', 'IT room', 'Joining', 'Việt Nam', '711eee', '176555333', '								1							', '2002-01-09', '1970-01-01', 0, 0, '2', 0, '2017-01-01 04:10:29', '2017-06-01 20:58:37'),
(10, 'vudx', '6444b30f8270d4c9e7f1be265a61df9012fdb979', 'Đào Xuân Vũ', 'vudx93@gmail.com', 'test1@gmail.com', 'vudx93@gmail.com', 'vudx93', '098765432', 1, '1993-01-30', '', 'Construction', 'Employee', 'Official employee', 'Ruby+Server', 'Đại học', '5 years', 'Construction room', 'Joining', 'Việt Nam', '711eeeccc', '174903782', '								1							', '2002-09-04', '1970-01-01', 0, 0, '', 0, '0000-00-00 00:00:00', '2017-06-01 20:59:47'),
(11, 'thonh', '6444b30f8270d4c9e7f1be265a61df9012fdb979', 'Nguyễn Hữu Thọ', 'thonh94@gmail.com', 'demo@gmail.com', 'thonh94@gmail.com', 'thonh94', '013456789', 2, '1994-02-15', '', 'IT', 'BSE', 'Official employee', 'Android+iOS+PHP', 'Đại học', '5 years', 'App room', 'Joining', 'Việt Nam', '711xxxrrr', '178345876', '								a							', '2000-01-31', '1970-01-01', 0, 0, '', 0, '2017-01-01 04:10:29', '2017-06-01 21:03:15'),
(12, 'anhnv', '6444b30f8270d4c9e7f1be265a61df9012fdb979', 'Nguyễn Văn Anh', 'anguyen@gmail.com', 'anguyen@gmail.com', 'anguyen@gmail.com', 'anguyenx123', '0123456987', 2, '1992-02-27', '', 'IT', 'Employee', 'Official employee', 'Nodejs', 'Đại học', 'Forever', 'IT room', 'Joining', 'Việt Nam', '711sssmmm', '173936283', '								a							', '2001-03-10', '1970-01-01', 0, 0, '', 0, '2017-01-01 04:10:29', '2017-06-01 21:01:11'),
(13, 'chienlt', '6444b30f8270d4c9e7f1be265a61df9012fdb979', 'Lê Thị Chiến', 'clex123@gmail.com', 'clex123@gmail.com', 'clex123@gmail.com', 'clex123', '098765432', 1, '1994-03-08', '', 'IT', 'Employee', 'Official employee', 'Nodejs+IOS', 'Đại học', 'Forever', 'App room', 'Joining', 'Việt Nam', '711kkkaaa', '176892739', '								a							', '2015-03-02', '1970-01-01', 0, 0, '', 0, '2017-01-01 04:10:29', '2017-06-01 21:01:44'),
(14, 'bduong123', '6444b30f8270d4c9e7f1be265a61df9012fdb979', 'Dương Văn Bình', 'bduongx123@gmail.com', 'bduongx123@gmail.com', 'bduongx123@gmail.com', 'bduongx123', '0129876543', 2, '1993-02-21', '', 'IT', 'Employee', 'Official employee', 'Android+IOS', 'Đại học', '5 years', 'App room', 'Joining', 'Việt Nam', '711vvvsss', '174833922', '								a							', '2014-03-03', '1970-01-01', 0, 0, '', 0, '2017-01-01 04:10:29', '2017-06-01 21:00:21'),
(15, 'daomt', '6444b30f8270d4c9e7f1be265a61df9012fdb979', 'Mai Thị Bích Đào', 'maibt80@gmail.com', 'maibt80@gmail.com', 'maibt80@gmail.com', 'maibt80', '0986432122', 1, '1980-06-13', '', 'App', 'Tester', 'Contract', 'Android + iOS', 'Đại học', '1 year', 'App room', 'Joining', 'Việt Nam', '711MMM', '123462913', '																														', '2017-06-06', '1970-01-01', 0, 0, '', 0, '2017-06-01 20:32:36', '2017-06-01 21:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_project`
--

CREATE TABLE `user_project` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL COMMENT '1:leader; 0:employee',
  `join_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'trạng thái tham gia',
  `del_flag` int(11) NOT NULL COMMENT '0:chưa xóa; 1:xóa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_project`
--

INSERT INTO `user_project` (`id`, `project_id`, `user_id`, `user_type`, `join_status`, `del_flag`) VALUES
(1, 1, 6, 1, 'joining', 0),
(2, 2, 8, 1, 'Joining', 0),
(3, 3, 1, 1, 'Joining', 0),
(4, 1, 7, 0, 'Joining', 0),
(5, 1, 4, 0, 'Joining', 0),
(6, 2, 5, 0, 'Joining', 0),
(7, 3, 9, 0, 'Joining', 0),
(8, 1, 6, 0, 'Joining', 1),
(9, 5, 3, 0, 'Joining', 0),
(10, 6, 3, 0, 'Joining', 0),
(11, 9, 12, 0, 'Joining', 0),
(12, 8, 11, 0, 'Joining', 0),
(13, 6, 10, 0, 'Joining', 0),
(14, 9, 11, 0, 'Joining', 0),
(15, 2, 5, 0, 'Joining', 1),
(16, 3, 12, 0, 'Joining', 0),
(17, 2, 9, 0, 'Joining', 1),
(18, 5, 12, 0, 'Joining', 0),
(19, 1, 8, 0, 'Exited', 0),
(20, 10, 9, 0, 'Joining', 0),
(22, 2, 6, 0, 'Joining', 0),
(23, 11, 7, 0, 'Joining', 0),
(24, 10, 2, 0, 'Joining', 0),
(25, 11, 9, 0, 'Joining', 0),
(26, 8, 9, 0, 'Joining', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leavedays`
--
ALTER TABLE `leavedays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ots`
--
ALTER TABLE `ots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_project`
--
ALTER TABLE `user_project`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leavedays`
--
ALTER TABLE `leavedays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `ots`
--
ALTER TABLE `ots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user_project`
--
ALTER TABLE `user_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
