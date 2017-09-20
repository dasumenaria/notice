-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2017 at 08:37 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_notice`
--

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(30) NOT NULL,
  `name` varchar(60) NOT NULL,
  `main_menu` text NOT NULL,
  `main_menu_icon` varchar(30) NOT NULL,
  `sub_menu` varchar(20) NOT NULL,
  `sub_menu_icon` varchar(30) NOT NULL,
  `page_name_url` text NOT NULL,
  `icon_class_name` varchar(30) NOT NULL,
  `query_string` text NOT NULL,
  `target` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `main_menu`, `main_menu_icon`, `sub_menu`, `sub_menu_icon`, `page_name_url`, `icon_class_name`, `query_string`, `target`) VALUES
(1, 'Dashboard', '', '', '', '', 'index1.php', 'fa fa-home', '', ''),
(2, 'Add', 'Event', 'fa fa-ticket', '', '', 'create_event.php', 'fa fa-search-plus', '', ''),
(3, 'View', 'Event', '', '', '', 'view_event.php', 'fa fa-edit', '', ''),
(4, 'Add', 'News', 'fa fa-hacker-news', '', '', 'create_news.php', 'fa fa-search-plus', '', ''),
(5, 'View', 'News', '', '', '', 'view_news.php', 'fa fa-edit', '', ''),
(7, 'Add', 'Gallery', 'fa fa-file-picture-o', '', '', 'gallery.php', 'fa fa-search-plus', '', ''),
(8, 'View', 'Gallery', '', '', '', 'view_gallery.php', 'fa fa-edit', '', ''),
(11, 'Add', 'Faculty Registration', 'fa fa-user', '', '', 'create_user.php', 'fa fa-picture-o ', '', ''),
(12, 'View', 'Faculty Registration', '', '', '', 'view_users.php', 'fa fa-ticket ', '', ''),
(15, 'Add', 'User Rights', 'fa fa-check', '', '', 'user_rights.php', 'fa fa-eye ', '', ''),
(42, 'Add', 'Registration', 'fa fa-user', '', '', 'registration.php', 'fa fa-plus', '', ''),
(43, 'View', 'Registration', 'fa fa-user', '', '', 'view_profile.php', 'fa fa-edit', '', ''),
(44, 'Add', 'Academic Calendar', 'fa fa-building', '', '', 'academy_calendar.php', 'fa fa-plus', '', ''),
(45, 'View', 'Academic Calendar', 'fa fa-building', '', '', 'view_academy_calendar.php', 'fa fa-edit', '', ''),
(46, 'Add', 'Notice', 'fa fa-bell', '', '', 'create_notice.php', 'fa fa-plus', '', ''),
(47, 'View', 'Notice', 'fa fa-bell', '', '', 'view_notice.php', 'fa fa-edit', '', ''),
(48, 'Import Data', 'Registration', 'fa fa-user', '', '', 'import_data.php', 'fa fa-edit fa-file-excel-o', '', ''),
(49, 'Add', 'Syllabus', 'fa fa-edit', '', '', 'syllabus.php', 'fa fa-plus', '', ''),
(50, 'View', 'Syllabus', 'fa fa-edit', '', '', 'view_syllabus.php', 'fa fa-edit', '', ''),
(51, 'School Time Table', 'Time Table', 'fa fa-edit', '', '', 'timetable.php', 'fa fa-plus', '', ''),
(52, 'View', 'Time Table', 'fa fa-edit', '', '', 'view_timetable.php', 'fa fa-edit', '', ''),
(53, 'Add', 'Contact Details', 'fa fa-group', '', '', 'contact_detail.php', 'fa fa-book', '', ''),
(54, 'Edit', 'Contact Details', 'fa fa-group', '', '', 'edit_contact_detail.php', 'fa fa-edit ', '', ''),
(55, 'Message', '', '', '', '', 'dir_princ_meaasge.php', 'fa fa-envelope', '', ''),
(56, 'Exam Time Table', 'Time Table', 'fa fa-edit', '', '', 'exam_time_table.php', 'fa fa-plus', '', ''),
(57, 'Add', 'Sports', 'fa fa-plus', '', '', 'sports.php', 'fa fa-plus', '', ''),
(58, 'View', 'Sports', 'fa fa-plus', '', '', 'view_sports.php', 'fa fa-plus', '', ''),
(59, 'Add', 'Achivement', 'fa fa-plus', '', '', 'achivements.php', 'fa fa-plus', '', ''),
(60, 'View', 'Achivement', 'fa fa-plus', '', '', 'view_achivements.php', 'fa fa-plus', '', ''),
(61, 'Class', 'Master', 'fa fa-gavel', '', '', 'master_class.php', 'fa fa-plus', '', ''),
(62, 'Section', 'Master', 'fa fa-gavel', '', '', 'master_section.php', 'fa fa-plus', '', ''),
(63, 'Section Mapping', 'Master', 'fa fa-gavel', '', '', 'teacher_mapping.php', 'fa fa-plus', '', ''),
(64, 'Subject', 'Master', 'fa fa-gavel', '', '', 'master_subject.php', 'fa fa-plus', '', ''),
(65, 'Subject Mapping', 'Master', 'fa fa-gavel', '', '', 'subject_mapping.php', 'fa fa-plus', '', ''),
(66, 'Exam', 'Master', 'fa fa-gavel', '', '', 'master_exam.php', 'fa fa-plus', '', ''),
(68, 'Sport', 'Master', 'fa fa-gavel', '', '', 'master_sports.php', 'fa fa-plus', '', ''),
(69, 'Station', 'Master', 'fa fa-gavel', '', '', 'master_station.php', 'fa fa-plus', '', ''),
(70, 'Bus', 'Master', 'fa fa-gavel', '', '', 'master_bus.php', 'fa fa-plus', '', ''),
(71, 'Insert Marks', 'Marks', 'fa fa-gavel', '', '', 'class_test.php', 'fa fa-plus', '', ''),
(72, 'Upload Marks', 'Marks', 'fa fa-gavel', '', '', 'upload_student_marks.php', 'fa fa-plus', '', ''),
(73, 'Add Item', 'Inventory', 'fa fa-suitcase', '', '', 'master_item.php', 'fa fa-plus', '', ''),
(74, 'Add Vendor', 'Inventory', 'fa fa-suitcase', '', '', 'master_vendor.php', 'fa fa-user', '', ''),
(75, 'Add Stock', 'Inventory', 'fa fa-suitcase', '', '', 'stock_inward.php', 'fa fa-truck', '', ''),
(76, 'Edit Stock', 'Inventory', 'fa fa-suitcase', '', '', 'stock_inward_view.php', 'fa fa-truck', '', ''),
(77, 'Issue', 'Inventory', 'fa fa-suitcase', '', '', 'item_issue.php', 'fa fa-truck', '', ''),
(78, 'Return', 'Inventory', 'fa fa-suitcase', '', '', 'item_return.php', 'fa fa-truck', '', ''),
(79, 'Inventory Reports', '', '', '', '', 'inventory_report.php', 'fa fa-truck', '', ''),
(80, 'Item Maintenance', 'Inventory', 'fa fa-suitcase', '', '', 'item_maintenance.php', 'fa fa-truck', '', ''),
(81, 'Bus Routes', 'Master', 'fa fa-gavel', '', '', 'bus_routes.php', 'fa fa-plus', '', ''),
(82, 'Student Password', 'User Rights', 'fa fa-check', '', '', 'change_password.php', 'fa fa-eye ', '', ''),
(83, 'Report', 'Student Report', 'fa fa-group', '', '', 'student_details.php', '', '', ''),
(84, 'I-Card', 'Student Report', 'fa fa-group', '', '', 'student_icard.php', '', '', ''),
(85, 'Poll', '', '', '', '', 'create_poll.php', 'fa fa-book', '', ''),
(86, 'Work Report', 'Report', 'fa fa-ticket', '', '', 'work_report.php', 'fa fa-search-plus', '', ''),
(87, 'Banned Report', 'Report', 'fa fa-ticket', '', '', 'ban_view.php', 'fa fa-search-plus', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `id` int(11) NOT NULL,
  `user_id` int(7) NOT NULL,
  `question` text NOT NULL,
  `image` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flag` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `poll_feedback`
--

CREATE TABLE `poll_feedback` (
  `id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `poll_option`
--

CREATE TABLE `poll_option` (
  `id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `poll_option` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poll_feedback`
--
ALTER TABLE `poll_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poll_option`
--
ALTER TABLE `poll_option`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `poll_feedback`
--
ALTER TABLE `poll_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `poll_option`
--
ALTER TABLE `poll_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
