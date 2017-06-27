-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2017 at 09:08 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

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
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `about_us` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `about_us`) VALUES
(1, '<p><strong><span style="font-size: 14.0pt; font-family: ''Times New Roman'',''serif''; mso-fareast-font-family: ''Times New Roman''; mso-font-kerning: 18.0pt;">About us</span></strong></p><p>The main objective of the institution is to build young citizens of tomorrow who are ready to face challenges and</p><p>harness opportunities. MDS Sr. Sec. School provides the fullest opportunities to its students to develop an all round</p><p>personality in addition to scholarly pursuits. The institution has adopted the phrase TOTAL KNOWLEDGE TOTAL</p><p>PERSONALITY to reflect this mission and to achieve this objective, the following infrastructure has been developed</p><p>for the overall personality development.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `acedmic_calendar`
--

CREATE TABLE `acedmic_calendar` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `tag` int(11) NOT NULL,
  `curent_date` date NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acedmic_calendar`
--

INSERT INTO `acedmic_calendar` (`id`, `category_id`, `date`, `description`, `user_id`, `tag`, `curent_date`, `flag`) VALUES
(1, 4, '2017-06-25', 'dinner', 1, 6, '2017-06-21', 0),
(2, 4, '2017-06-30', 'Functions', 1, 6, '2017-06-21', 0),
(3, 2, '2017-06-30', 'by Principle', 1, 6, '2017-06-21', 0),
(4, 2, '2017-06-27', 'fghjkl', 1, 6, '2017-06-27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `achivements`
--

CREATE TABLE `achivements` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `achivement` varchar(225) NOT NULL,
  `rank` varchar(22) NOT NULL,
  `curent_date` date NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `achivements`
--

INSERT INTO `achivements` (`id`, `student_id`, `achivement`, `rank`, `curent_date`, `flag`) VALUES
(1, 1, 'School Toper', '1', '2017-06-09', 0),
(2, 2, 'Football Player of the school', '1', '2017-06-09', 0),
(3, 4, 'Hokey Player of the school', '1', '2017-06-09', 0),
(4, 2477, 'Student of the Year', '1', '2017-06-09', 0),
(5, 6, 'volleyball Player', '1', '2017-06-09', 0),
(6, 5, 'failer', '1', '2017-06-09', 0),
(7, 4, 'failer', '1', '2017-06-09', 0),
(8, 1, 'dada', 'dasds', '2017-06-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `add_to_calendar`
--

CREATE TABLE `add_to_calendar` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `parent_event_id` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `curent_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `api_versions`
--

CREATE TABLE `api_versions` (
  `id` int(11) NOT NULL,
  `version` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api_versions`
--

INSERT INTO `api_versions` (`id`, `version`) VALUES
(1, '3');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `appoint_to` int(11) NOT NULL,
  `appoint_date` date NOT NULL,
  `appoint_time` time NOT NULL,
  `reason` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL COMMENT '0 = pending, 1 = approved, 2 = rejected, 3 = Completed',
  `student_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `appoint_to`, `appoint_date`, `appoint_time`, `reason`, `timestamp`, `status`, `student_id`, `name`) VALUES
(1, 3, '2017-04-01', '03:25:00', 'This is test meeting', '2017-03-29 07:49:01', 1, 0, ''),
(2, 2, '2017-03-31', '10:20:00', 'This is  postman data updated', '2017-04-03 05:37:28', 1, 0, ''),
(4, 2, '2017-03-31', '10:20:00', 'This is  postman data updated', '2017-03-29 08:12:28', 0, 0, ''),
(5, 3, '2017-04-14', '10:10:00', 'notification', '2017-04-15 10:52:00', 1, 1, 'mukesh  ji'),
(6, 3, '2017-04-14', '10:10:00', 'notification', '2017-04-14 05:13:32', 0, 1, 'mukesh  ji');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `topic` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `submission_date` date NOT NULL,
  `curent_date` date NOT NULL,
  `file` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `attendance_mark` varchar(20) NOT NULL COMMENT '1= Present , 2= absent , 3=Leave',
  `attendance_date` date NOT NULL,
  `curent_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `user_id`, `attendance_mark`, `attendance_date`, `curent_date`) VALUES
(9, 1, 3, '1', '2017-04-18', '2017-04-06'),
(10, 1, 3, '1', '2017-04-18', '2017-04-06'),
(11, 1, 3, '2', '2017-04-18', '2017-04-06'),
(12, 1, 3, '3', '2017-04-18', '2017-04-06'),
(13, 1, 3, '3', '2017-04-18', '2017-04-06'),
(14, 1, 3, '1', '2017-04-18', '2017-04-06'),
(15, 15, 3, 'p', '2017-04-18', '2017-04-06'),
(16, 15, 3, 'p', '2017-04-18', '2017-04-06'),
(17, 1, 1, '2', '2017-04-13', '2017-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `broadcast_message`
--

CREATE TABLE `broadcast_message` (
  `id` int(11) NOT NULL,
  `role_id` varchar(200) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `curent_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_role_id` int(11) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bus_routes`
--

CREATE TABLE `bus_routes` (
  `id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_routes`
--

INSERT INTO `bus_routes` (`id`, `vehicle_id`, `station_id`, `flag`) VALUES
(1, 1, 1, 0),
(2, 1, 2, 0),
(3, 1, 3, 0),
(4, 1, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `class_section`
--

CREATE TABLE `class_section` (
  `id` int(20) NOT NULL,
  `class_id` int(20) NOT NULL,
  `section_id` int(20) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact_detail`
--

CREATE TABLE `contact_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `flag` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_detail`
--

INSERT INTO `contact_detail` (`id`, `name`, `mobile_no`, `email`, `designation`, `flag`, `timestamp`) VALUES
(1, 'ashish jain', '9898989898', 'ashish@phppoets.in', 'Teacher', 0, '2017-03-27 09:10:36'),
(2, 'Dsu Menaria', '9680747166', 'dsumenaria@gmail.com', 'Principle', 0, '2017-03-27 06:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `director_principle_message`
--

CREATE TABLE `director_principle_message` (
  `id` int(11) NOT NULL,
  `sms_sender_role` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sms_receive_role` int(11) NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `director_principle_message`
--

INSERT INTO `director_principle_message` (`id`, `sms_sender_role`, `message`, `timestamp`, `sms_receive_role`, `login_id`) VALUES
(1, 2, 'Test Message', '2017-06-22 10:08:25', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `location` varchar(1000) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `lattitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `shareable` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `time` varchar(100) NOT NULL,
  `curent_date` date NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `category_id`, `user_id`, `image`, `title`, `description`, `location`, `date_from`, `date_to`, `lattitude`, `longitude`, `shareable`, `role_id`, `time`, `curent_date`, `flag`) VALUES
(1, 4, 1, '98711498019022.jpeg', 'Anuual Function', 'Hello student this is our anuual Function', 'BN College', '2017-06-25', '2017-06-30', '40.438497', '-80.001276', '1', 5, '9:00 AM', '2017-06-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_details`
--

CREATE TABLE `event_details` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL,
  `name` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_details`
--

INSERT INTO `event_details` (`id`, `event_id`, `date`, `time`, `name`) VALUES
(1, 1, '2017-06-25', '9:50 AM', 'dinner'),
(2, 1, '2017-06-30', '10:00 AM', 'Function');

-- --------------------------------------------------------

--
-- Table structure for table `exam_time_table`
--

CREATE TABLE `exam_time_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `exam_date` date NOT NULL,
  `room_no` varchar(122) NOT NULL,
  `curent_date` date NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_time_table`
--

INSERT INTO `exam_time_table` (`id`, `user_id`, `class_id`, `section_id`, `subject_id`, `time_from`, `time_to`, `exam_date`, `room_no`, `curent_date`, `flag`) VALUES
(1, 1, -4, 1, 11, '12:30:00', '12:30:00', '2017-06-01', '12', '2017-06-07', 0),
(2, 1, -4, 1, 10, '12:30:00', '12:30:00', '0000-00-00', '', '2017-06-07', 0),
(3, 1, 3, 1, 0, '05:45:00', '05:45:00', '2017-06-21', '', '2017-06-21', 0),
(4, 1, 2, 1, 0, '05:45:00', '05:45:00', '2017-06-21', '', '2017-06-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `extra_classes`
--

CREATE TABLE `extra_classes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `reason` text NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra_classes`
--

INSERT INTO `extra_classes` (`id`, `user_id`, `class_id`, `section_id`, `subject_id`, `date`, `time`, `reason`, `flag`) VALUES
(1, 0, -4, 1, 2, '2017-04-13', '03:00:00', 'eeeeeeee', 0),
(2, 0, -4, 1, 1, '2017-03-31', '11:15:00', 'rrrrrrrrrrrrrrrrrrrrrrrrr', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_login`
--

CREATE TABLE `faculty_login` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `class_id` varchar(200) NOT NULL,
  `section_id` varchar(200) NOT NULL,
  `device_token` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `curent_date` date NOT NULL,
  `flag` int(11) NOT NULL,
  `notification_key` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_login`
--

INSERT INTO `faculty_login` (`id`, `role_id`, `user_name`, `password`, `mobile_no`, `address`, `class_id`, `section_id`, `device_token`, `image`, `curent_date`, `flag`, `notification_key`) VALUES
(1, 2, 'admin', '5d41402abc4b2a76b9719d911017c592', '8233334988', 'Udaipur', '', '', '', '', '2017-03-02', 0, ''),
(2, 3, 'Principal', 'e7d715a9b79d263ae527955341bbe9b1', '9696969696', 'udaipur', '', '', '', '36641489524804.jpeg', '2017-03-15', 0, ''),
(3, 4, 'teacher', '5d41402abc4b2a76b9719d911017c592', '9680747166', 'udaipur', '1', '2', '', '87571490659969.jpeg', '2017-03-15', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `event_news_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `event_news_id`, `category_id`) VALUES
(1, 1, 4),
(2, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `home_gallery`
--

CREATE TABLE `home_gallery` (
  `id` int(11) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_gallery`
--

INSERT INTO `home_gallery` (`id`, `pic`, `title`, `flag`) VALUES
(1, '1.jpg', '', 0),
(2, '2.jpg', '', 0),
(3, '3.jpg', '', 0),
(4, '4.jpg', '', 0),
(5, '5.jpg', '', 0),
(6, '6.jpg', '', 0),
(7, '7.jpg', '', 0),
(8, '8.jpg', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_form`
--

CREATE TABLE `inquiry_form` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `study` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `query` text NOT NULL,
  `curent_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issue_item`
--

CREATE TABLE `issue_item` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `item_id` int(10) NOT NULL,
  `item_price` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `total_price` varchar(50) NOT NULL,
  `remarks` text NOT NULL,
  `issue_date` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leave_note`
--

CREATE TABLE `leave_note` (
  `id` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `reason` text NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = in-process, 1 = approved, 2 = rejected',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_note`
--

INSERT INTO `leave_note` (`id`, `date_from`, `date_to`, `reason`, `student_id`, `status`, `timestamp`, `class_id`) VALUES
(1, '2017-04-02', '2017-04-04', 'test krne k liye ok', 1, 1, '2017-04-15 10:00:24', 3),
(2, '2017-05-01', '2017-03-31', 'This is  postman data push', 2477, 2, '2017-04-15 10:00:08', 3);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `father_name` varchar(250) NOT NULL,
  `mother_name` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `roll_no` varchar(250) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `medium` int(11) NOT NULL,
  `eno` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile_no` text NOT NULL,
  `father_mobile` varchar(30) NOT NULL,
  `mother_mobile` varchar(30) NOT NULL,
  `otp` varchar(200) NOT NULL,
  `notification_key` varchar(2000) NOT NULL,
  `device_token` varchar(2000) NOT NULL,
  `image` varchar(100) NOT NULL,
  `school_id` int(11) NOT NULL,
  `curent_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user_id`, `role_id`, `name`, `dob`, `father_name`, `mother_name`, `address`, `roll_no`, `class_id`, `section_id`, `medium`, `eno`, `password`, `mobile_no`, `father_mobile`, `mother_mobile`, `otp`, `notification_key`, `device_token`, `image`, `school_id`, `curent_date`, `flag`) VALUES
(1, 1, 5, 'Miss Anukriti Malpani', '2012-12-27', 'Mr. Sanjay Malpani', '', 'Near Telephone Exchange Sukhadia Nagar, Nathdwara', '', 2, 2, 0, '1192', '52292e0c763fd027c6eba6b8f494d2eb', '9461656248, 7737706550', '9461656248', '7737706550', '', '', '', '', 0, '2017-06-17 11:30:04', 0),
(2, 1, 5, 'Mast. Ali Asgar Bohra', '2012-08-17', 'Mr. Mustafa Hussian', '', 'Bohra Bazar, Telipura, Nathdwara', '', 2, 2, 0, '1098', 'a5e0ff62be0b08456fc7f1e88812af3d', '8058272144', '8058272144', '', '', '', '', '', 0, '2017-06-17 11:30:04', 0),
(3, 1, 5, 'Miss Dhanvi Patel', '2012-07-02', 'Mr. Brijesh Suresh Bhai Patel', '', 'Near BSNL Extension, Kishore Nagar, Rajsamand', '', 2, 2, 0, '1178', '7d771e0e8f3633ab54856925ecdefc5d', '9649034474, 8094722423', '9649034474', '8094722423', '', '', '', '', 0, '2017-06-17 11:30:04', 0),
(4, 1, 5, 'Mast. Dhruvit Shekhar', '2012-08-27', 'Mr. Manish Shekhar', '', 'H.No. - 12, Opposite Lal Baag, Nathdwara', '', 2, 2, 0, '1180', '6eb6e75fddec0218351dc5c0c8464104', '9116005970, 7728984880', '9116005970', '7728984880', '', '', '', '', 0, '2017-06-17 11:30:04', 0),
(5, 1, 5, 'Miss Hiral Jain', '2012-12-31', 'Mr. Hitesh Jain', '', 'Adarsh Nagar, Umang Palace, New Road, Nathdwara', '', 2, 2, 0, '1201', '7501e5d4da87ac39d782741cd794002d', '8387838383, 9602707823', '8387838383', '9602707823', '', '', '', '', 0, '2017-06-17 11:30:04', 0),
(6, 1, 5, 'Miss Hiya Jain', '2013-05-17', 'Mr. Kapil Jain', '', 'Ambika Bhawan, Adarsh Nagar, New Road, Nathdwara', '', 2, 2, 0, '1137', '801c14f07f9724229175b8ef8b4585a8', '8978320100, 8829921000', '8978320100', '8829921000', '', '', '', '', 0, '2017-06-17 11:30:04', 0),
(7, 1, 5, 'Miss Jaynee Sanadhya', '2013-04-04', 'Mr. Rahul Sanadhya', '', 'Near Ambawara Akhada, Nathuwas Road, Nathdwara', '', 2, 2, 0, '1115', 'e19347e1c3ca0c0b97de5fb3b690855a', '9001997573, 8952900898', '9001997573', '8952900898', '', '', '', '', 0, '2017-06-17 11:30:04', 0),
(8, 1, 5, 'Miss Kritika Dashora', '2012-06-20', 'Mr. Sushil Dashora', '', 'Behind Sr. Sec. School, Near Shiv Mandir, Kankroli (Rajsamand)', '', 2, 2, 0, '1112', '20d135f0f28185b84a4cf7aa51f29500', '9982043627, 9649726701', '9982043627', '9649726701', '', '', '', '', 0, '2017-06-17 11:30:04', 0),
(9, 1, 5, 'Mast. Lavansh Khandelwal', '2013-03-16', 'Mr. Manish Khandelwal', '', 'Rawaton Ka Darwaja, Kumharwara, Nathdwara', '', 2, 2, 0, '1101', 'c6bff625bdb0393992c9d4db0c6bbe45', '8696975523, 7737813012', '8696975523', '7737813012', '', '', '', '', 0, '2017-06-17 11:30:04', 0),
(10, 1, 5, 'Mast. Mayank Sharma', '2012-07-22', 'Mr. Puranmal Sharma', '', 'RHB Sukhadia Nagar, Nathdwara', '', 2, 2, 0, '1126', 'ffeed84c7cb1ae7bf4ec4bd78275bb98', '9414172977, 9460226236', '9414172977', '9460226236', '', '', '', '', 0, '2017-06-17 11:30:04', 0),
(11, 1, 5, 'Mast. Moheen Ashwani', '2012-12-05', 'Mr. Suresh Ashwani', '', 'H. No. - 123, Friends Colony, Opposite Lal Baag, Nathdwara', '', 2, 2, 0, '1170', '3eb71f6293a2a31f3569e10af6552658', '9983443388, 8769669985', '9983443388', '8769669985', '', '', '', '', 0, '2017-06-17 11:30:04', 0),
(12, 1, 5, 'Miss Nehal Paliwal', '2013-08-15', 'Mr. Sunil Paliwal', '', 'Kanwa Nandsamand Road, Nathdwara', '', 2, 2, 0, '1172', '36a1694bce9815b7e38a9dad05ad42e0', '9783028317, 9828882907', '9783028317', '9828882907', '', '', '', '', 0, '2017-06-17 11:30:04', 0),
(13, 1, 5, 'Miss Pankhu Jain', '2013-06-18', 'Mr. Ujjwal Prakash Lodha', '', 'Nai Haweli Chowk, Nathdwara', '', 2, 2, 0, '1197', 'ae5e3ce40e0404a45ecacaaf05e5f735', '9414343899, 9462678570', '9414343899', '9462678570', '', '', '', '', 0, '2017-06-17 11:30:04', 0),
(14, 1, 5, 'Mast. Sarvaang Sharma', '2012-11-01', 'Mr. Shivhari Sharma', '', 'Near Samudyik Bhawan, Sukhadia Nagar, Nathdwara', '', 2, 2, 0, '1094', '41bfd20a38bb1b0bec75acf0845530a7', '9352730999, 9309046988', '9352730999', '9309046988', '', '', '', '', 0, '2017-06-17 11:30:04', 0),
(15, 1, 5, 'Miss Anushka Kumawat', '2012-11-27', 'Mr. Gaurav Kumawat', '', 'Fauz Mohalla, Nathdwara', '', 2, 1, 0, '1152', '45f31d16b1058d586fc3be7207b58053', '9414245514, 7737813867', '9414245514', '7737813867', '', '', '', '', 0, '2017-06-17 11:30:04', 0),
(16, 1, 5, 'Miss Batul Bohra', '2013-07-17', 'Mr. Hakimuddin Bohra', '', 'Tehsil Road, Holi Mangra, Nathdwara', '', 2, 1, 0, '1185', '5680522b8e2bb01943234bce7bf84534', '9829118053, 9680902964', '9829118053', '9680902964', '', '', '', '', 0, '2017-06-17 11:30:04', 0),
(17, 1, 5, 'Miss Devishi Gurjar', '2013-02-13', 'Mr. Deepak Gurjar', '', 'Vallabhpura Gati, Govind Chowk, Nathdwara', '', 2, 1, 0, '1150', '2b38c2df6a49b97f706ec9148ce48d86', '9024939606, 7568634757', '9024939606', '7568634757', '', '', '', '', 0, '2017-06-17 11:30:04', 0),
(18, 1, 5, 'Miss Divya Choudhary', '2012-09-29', 'Mr. Yogendra Singh Choudhary', '', 'Rawato Ka Darwaja, Jaat Mohalla, Nathdwara', '', 2, 1, 0, '1140', '8248a99e81e752cb9b41da3fc43fbe7f', '7568829870, 9983850488', '7568829870', '9983850488', '', '', '', '', 0, '2017-06-17 11:30:04', 0),
(19, 1, 5, 'Mast. Garvit Boliwal', '2013-06-26', 'Mr. Kamla Shankar Boliwal', '', 'Banas Pul, Gunjol, Nathdwara', '', 2, 1, 0, '1092', '6a2feef8ed6a9fe76d6b3f30f02150b4', '9414654328, 9672678805', '9414654328', '9672678805', '', '', '', '', 0, '2017-06-17 11:30:05', 0),
(20, 1, 5, 'Miss Himanshi Lohar', '2012-12-31', 'Mr. Manoj Lohar', '', 'Vill. & Post. Dhanyala, Teh. Nathdwara, Dist. Rajsamand', '', 2, 1, 0, '1233', 'e034fb6b66aacc1d48f445ddfb08da98', '9772392577, 7742011822', '9772392577', '7742011822', '', '', '', '', 0, '2017-06-17 11:30:05', 0),
(21, 1, 5, 'Mast. Hriyansh Singh Chouhan', '2013-02-23', 'Mr. Ganpat Singh Chouhan', '', 'Kallakhedi Viran, Post - Gunjol, Nathdwara', '', 2, 1, 0, '1191', 'b20bb95ab626d93fd976af958fbc61ba', '9460209565, 8058200175', '9460209565', '8058200175', '', '', '', '', 0, '2017-06-17 11:30:05', 0),
(22, 1, 5, 'Mast. Jay Kaneria', '2012-09-26', 'Mr. Kuldeep Kaneria', '', 'G.53, Sukhadia Nagar, Nathdwara', '', 2, 1, 0, '1175', '1896a3bf730516dd643ba67b4c447d36', '9414234028, 9784182121', '9414234028', '9784182121', '', '', '', '', 0, '2017-06-17 11:30:05', 0),
(23, 1, 5, 'Mast. Kabir Mehta', '2012-03-31', 'Mr. Anil Mehta', '', 'Bhalawaton Ka Kheda, R.T.D.C. Road, Nathdwara', '', 2, 1, 0, '1089', '03f544613917945245041ea1581df0c2', '9460334747, 9413077688', '9460334747', '9413077688', '', '', '', '', 0, '2017-06-17 11:30:05', 0),
(24, 1, 5, 'Miss Lakshita Saini', '2012-12-23', 'Mr. Dheeraj Saini', '', 'Lal Baag, Kheto Par, Nathdwara', '', 2, 1, 0, '1156', 'e22312179bf43e61576081a2f250f845', '8387980014, 7568823287', '8387980014', '7568823287', '', '', '', '', 0, '2017-06-17 11:30:05', 0),
(25, 1, 5, 'Miss Leesha Dagliya', '2012-10-03', 'Mr. Jeevan Dagliya', '', 'Mahaveerpura, Nathdwara', '', 2, 1, 0, '1132', '571e0f7e2d992e738adff8b1bd43a521', '9001793310, 9352733100', '9001793310', '9352733100', '', '', '', '', 0, '2017-06-17 11:30:05', 0),
(26, 1, 5, 'Mast. Mann Bhatt', '2013-03-25', 'Mr. Shyam Sundar Bhatt', '', 'Near Uba Ganeshji Mandir, Sinhad, Nathdwara', '', 2, 1, 0, '1174', '3473decccb0509fb264818a7512a8b9b', '9214464763, 9928309691', '9214464763', '9928309691', '', '', '', '', 0, '2017-06-17 11:30:05', 0),
(27, 1, 5, 'Miss Maayra Choudhary', '2013-03-16', 'Mr. Mahendra Singh Choudhary', '', 'Manli Villa, Shanti Colony, Kankroli, (Rajsamand)', '', 2, 1, 0, '1106', 'c9f95a0a5af052bffce5c89917335f67', '9549456001, 7597628674', '9549456001', '7597628674', '', '', '', '', 0, '2017-06-17 11:30:05', 0),
(28, 1, 5, 'Mast. Prasana Lodha', '2013-06-18', 'Mr. Pawan Lodha', '', 'Sohan Villa, Mahaveerpura, Nathdwara', '', 2, 1, 0, '1171', 'a113c1ecd3cace2237256f4c712f61b5', '9829995000, 9784256095', '9829995000', '9784256095', '', '', '', '', 0, '2017-06-17 11:30:05', 0),
(29, 1, 5, 'Miss Preksha Choudhary', '2013-03-28', 'Mr. Rahul Singh Choudhary', '', 'Rawaton Ka Darwaja, Jat Mohalla, Nathdwara', '', 2, 1, 0, '1118', 'c60d060b946d6dd6145dcbad5c4ccf6f', '9672663493, 9983850488', '9672663493', '9983850488', '', '', '', '', 0, '2017-06-17 11:30:05', 0),
(30, 1, 5, 'Mast. Raghav Shrimali', '2012-05-05', 'Mr. Prakash Chandra Shrimali', '', 'Chintamani Ka Madada, Tehsil - Rajsamand', '', 2, 1, 0, '1216', '3948ead63a9f2944218de038d8934305', '9636362831, 8107407853', '9636362831', '8107407853', '', '', '', '', 0, '2017-06-17 11:30:05', 0),
(31, 1, 5, 'Mast. Tanish Somani', '2012-10-17', 'Mr. Rajkumar Somani', '', 'Near Tera Panthi Nohra, Nai Haweli Chowk, Nathdwara', '', 2, 1, 0, '1183', '0e095e054ee94774d6a496099eb1cf6a', '9829940834, 9571442734', '9829940834', '9571442734', '', '', '', '', 0, '2017-06-17 11:30:05', 0),
(32, 1, 5, 'Mast. Gaurav Lohar', '2012-08-02', 'Mr. Praveen Lohar', '', 'Vill. & Post. Dhanyala, Teh. Nathdwara, Dist. Rajsamand', '', 2, 1, 0, '1232', 'e53a0a2978c28872a4505bdb51db06dc', '9001843599, 8769530753', '9001843599', '8769530753', '', '', '', '', 0, '2017-06-17 11:30:05', 0),
(33, 1, 5, 'Mast. Indra Vardhan Paliwal', '2013-07-31', 'Mrs. Manju Paliwal', '', 'FI Narayan Chowk, Sukhadia Nagar, Nathdwara', '', 2, 1, 0, '1229', '310ce61c90f3a46e340ee8257bc70e93', '9414245554, 9413252072', '9414245554', '9413252072', '', '', '', '', 0, '2017-06-17 11:30:05', 0),
(34, 1, 5, 'Mast. Nimish Nehra', '2013-04-27', 'Mr. Virendra Pratap Singh Choudhary', '', 'Naniji Ka Baag, Bus Stand, Nathdwara', '', 2, 3, 0, '1226', '3210ddbeaa16948a702b6049b8d9a202', '9929659666, 9521212001', '9929659666', '9521212001', '', '', '', '', 0, '2017-06-17 11:30:05', 0),
(35, 1, 5, 'Miss Ragini Sahu', '2013-01-06', 'Mr. Govind Sahu', '', 'Badarda, Rajsamand', '', 2, 3, 0, '012', 'd2490f048dc3b77a457e3e450ab4eb38', '9166228881', '9166228881', '', '', '', '', '', 0, '2017-06-17 11:30:05', 0),
(36, 1, 5, 'Mast. Rajveer Tailor', '2013-03-29', 'Mr. Bheru Lal Tailor', '', '74 - Shiv Nagar Lal Baag, Nathdwara', '', 2, 3, 0, '1145', 'feab05aa91085b7a8012516bc3533958', '9001448073, 7728048148', '9001448073', '7728048148', '', '', '', '', 0, '2017-06-17 11:30:05', 0),
(37, 1, 5, 'Miss Vidhi Veerwal', '2012-12-09', 'Mr. Vinod Kumar Veerwal', '', 'Badarda, Rajsamand', '', 2, 3, 0, '014', '0e51011a4c4891e5c01c12d85c4dcaa7', '9828624016', '9828624016', '', '', '', '', '', 0, '2017-06-17 11:30:05', 0),
(38, 1, 5, 'Mast. Heramb Nandwana', '2013-01-01', 'Mr. Devesh Kumar Nandwana', '', 'Shanti Niketan, Nand Colony, Rajnagar', '', 2, 3, 0, '1177', '83f97f4825290be4cb794ec6a234595f', '7742311113, 9521660113', '7742311113', '9521660113', '', '', '', '', 0, '2017-06-17 11:30:05', 0),
(39, 1, 5, 'Mast. Dakshraj Singh', '2012-07-10', 'Mr. Sumer Singh', '', 'Kalla Khedi, Badalawali, Nathdwara', '', 2, 3, 0, '1109', '8f1d43620bc6bb580df6e80b0dc05c48', '9799128099, 9799705182', '9799128099', '9799705182', '', '', '', '', 0, '2017-06-17 11:30:06', 0),
(40, 1, 5, 'Miss Ishita Inani', '2013-07-31', 'Mr. Bhagwati Lal Inani', '', 'H.No. - 200, Anand Nagar, Kothariya Road, Lal Baag, Nathdwara', '', 2, 3, 0, '1099', 'a0160709701140704575d499c997b6ca', '9414472893, 9413953252', '9414472893', '9413953252', '', '', '', '', 0, '2017-06-17 11:30:06', 0),
(41, 1, 5, 'Mast. Raghav Sahu', '2013-01-22', 'Mr. Dinesh Chandra Sahu', '', 'Badarda, Rajsamand', '', 2, 3, 0, '013', '441954d29ad2a375cef8ea524a2c7e73', '7737836453', '7737836453', '', '', '', '', '', 0, '2017-06-17 11:30:06', 0),
(42, 1, 5, 'Mast. Shivansh Choudhary', '2013-03-10', 'Mr. Prahalad Singh Chouhan', '', 'IV / 37 Civil Lines, Kankroli (Rajsamand)', '', 2, 3, 0, '1193', '9a3d458322d70046f63dfd8b0153ece4', '9460725774, 9571835774', '9460725774', '9571835774', '', '', '', '', 0, '2017-06-17 11:30:06', 0),
(43, 1, 5, 'Miss Priyanshi Kunwar Chouhan', '2013-06-18', 'Mr. Gurudayal Singh Chouhan', '', 'Ambika Vill. Kuncholi', '', 2, 3, 0, '1234', '81dc9bdb52d04dc20036dbd8313ed055', '9784785846 , 9610984199', '9784785846', '9610984199', '', '', '', '', 0, '2017-06-17 11:30:06', 0),
(54, 1, 5, 'Miss Aakansha Keer', '2011-09-17', 'Mr. Kishan Lal Keer', '', '"S Ivam" Near C. Graphic School, Panch Ratan Complex, Keshav Nagar, Gudali (Rajsamand)', '', 3, 1, 0, '1090', '8b4066554730ddfaa0266346bdc1b202', '9828620491, 9414915908', '9828620491', '9414915908', '', '', '', '', 0, '2017-06-17 11:30:06', 0),
(55, 1, 5, 'Miss Chaitri Sanchihar', '2012-03-26', 'Mr. Bhaskar Sanchihar', '', 'Gopal Niwas, Hotal Ganga Sadan, Mohangarh', '', 3, 1, 0, '1020', '65cc2c8205a05d7379fa3a6386f710e1', '9829153922, 9460942680', '9829153922', '9460942680', '', '', '', '', 0, '2017-06-17 11:30:06', 0),
(56, 1, 5, 'Miss Chanchal Foujdar', '2011-09-19', 'Mr. Ram Pratap Singh', '', 'Railway Police Line, Rajsamand', '', 3, 1, 0, '1006', '9246444d94f081e3549803b928260f56', '9468693664, 7597147594', '9468693664', '7597147594', '', '', '', '', 0, '2017-06-17 11:30:06', 0),
(57, 1, 5, 'Miss Charvi Chaplot', '2012-04-20', 'Mr. Durgesh Chaplot', '', 'Chintamani Ka Madra, Post - Farara, (Rajsamand)', '', 3, 1, 0, '922', 'ccc0aa1b81bf81e16c676ddb977c5881', '9414659041, 9782967776', '9414659041', '9782967776', '', '', '', '', 0, '2017-06-17 11:30:06', 0),
(58, 1, 5, 'Mast. Ansh Puri Goswami', '2012-01-28', 'Mr. Manojpuri Goswami', '', 'Ganesh Nagar, Jawad, Kankroli, (Rajsamand)', '', 3, 1, 0, '1042', '9ac403da7947a183884c18a67d3aa8de', '8559886924, 8559887128', '8559886924', '8559887128', '', '', '', '', 0, '2017-06-17 11:30:06', 0),
(59, 1, 5, 'Miss Falguni Juniwal', '2012-07-04', 'Mr. Harish Juniwal', '', 'Anand Nagar, Lal Baag, Kotharia Road, Nathdwara', '', 3, 1, 0, '1010', '1e48c4420b7073bc11916c6c1de226bb', '9460941213, 9057822473', '9460941213', '9057822473', '', '', '', '', 0, '2017-06-17 11:30:06', 0),
(60, 1, 5, 'Mast. Hardik Choudhary', '2011-08-04', 'Mr. Mahendra Singh Choudhary', '', 'Mahendra Singh, A - 7 Police Quarters, Nathuwas, Nathdwara', '', 3, 1, 0, '1125', 'c21002f464c5fc5bee3b98ced83963b8', '9001988307, 9602094234', '9001988307', '9602094234', '', '', '', '', 0, '2017-06-17 11:30:06', 0),
(61, 1, 5, 'Miss Hemangani Shekhar Mali', '2011-12-14', 'Mr. Harshavardhan Shekhar Mali', '', 'Lal Baag Ke Samne, N.H. - 8 Road, Nathdwara', '', 3, 1, 0, '1085', '4f16c818875d9fcb6867c7bdc89be7eb', '8003346355, 8239689143', '8003346355', '8239689143', '', '', '', '', 0, '2017-06-17 11:30:06', 0),
(63, 1, 5, 'Mast. Moksh Bhatia', '2012-04-05', 'Mr. Himanshu Bhatia', '', 'Hanuman Mandir Road, Nikunj R., Bichumangri, Nathdwara', '', 3, 1, 0, '896', '061412e4a03c02f9902576ec55ebbe77', '7737660051, 7737318025', '7737660051', '7737318025', '', '', '', '', 0, '2017-06-17 11:30:06', 0),
(64, 1, 5, 'Miss Parishi Dadheech', '2011-11-21', 'Mr. Piyush Dadheech', '', 'Jeevan Jagrati Colony, Fouj Mohalla, Nathdwara', '', 3, 1, 0, '893', 'd56b9fc4b0f1be8871f5e1c40c0067e7', '9799122984, 9214195085', '9799122984', '9214195085', '', '', '', '', 0, '2017-06-17 11:30:06', 0),
(65, 1, 5, 'Mast. Pragyan Sharma', '2012-04-07', 'Mr. Krishna Chandra Sharma', '', 'C/o Mr. Khyali Lal Jain, Krishna Chandra Sharma, Behind Choudhary Petrol Pump, Jain Colony', '', 3, 1, 0, '1115', 'e19347e1c3ca0c0b97de5fb3b690855a', '9672976255, 9829183234', '9672976255', '9829183234', '', '', '', '', 0, '2017-06-17 11:30:07', 0),
(66, 1, 5, 'Miss Radhika Audichya', '2012-01-17', 'Mr. Vitthal Audichya', '', 'Uba Ganesh Ji Mandir, Sinhad, Nathdwara', '', 3, 1, 0, '1003', 'aa68c75c4a77c87f97fb686b2f068676', '9950615511, 9694283075', '9950615511', '9694283075', '', '', '', '', 0, '2017-06-17 11:30:07', 0),
(67, 1, 5, 'Miss Riddhi Jain', '2012-05-05', 'Mr. Vimlesh Jain', '', 'Aadarsh Nagar, Tehsil Road, Nathdwara', '', 3, 1, 0, '991', '692f93be8c7a41525c0baf2076aecfb4', '9783191919, 9783628832', '9783191919', '9783628832', '', '', '', '', 0, '2017-06-17 11:30:07', 0),
(68, 1, 5, 'Mast. Rudra Choudhary', '2012-02-13', 'Mr. Amit Choudhary', '', 'Rawaton Ka Darwaja, Patwari Payasa, Nathdwara', '', 3, 1, 0, '983', '6aab1270668d8cac7cef2566a1c5f569', '9461253324, 9680336188', '9461253324', '9680336188', '', '', '', '', 0, '2017-06-17 11:30:07', 0),
(69, 1, 5, 'Miss Siddhi Kunwar Chouhan', '2011-12-02', 'Mr. Hement Singh Chouhan', '', 'Village - Jambu Talab, Post - Gunjol, Tehsil - Nathdwara, Dist. - (Rajsamand)', '', 3, 1, 0, '1092', '6a2feef8ed6a9fe76d6b3f30f02150b4', '8875339017, 9587917052', '8875339017', '9587917052', '', '', '', '', 0, '2017-06-17 11:30:07', 0),
(70, 1, 5, 'Mast. Tanmay Bhatia', '2011-11-23', 'Mr. Bhupesh Bhatia', '', 'Matru Shri Campus'' Opp. Nathi Nagar, Govind Nagar, Bichhu Mangri, Nathdwara', '', 3, 1, 0, '1077', '062ddb6c727310e76b6200b7c71f63b5', '9829243310, 8769933673', '9829243310', '8769933673', '', '', '', '', 0, '2017-06-17 11:30:07', 0),
(71, 1, 5, 'Mast. Vedanshi Badola', '2012-05-23', 'Mr. Kapil Badola', '', 'Badola Sadan, Nayakwari, Rajnagar', '', 3, 1, 0, '1067', '31857b449c407203749ae32dd0e7d64a', '9414073427, 9413706217', '9414073427', '9413706217', '', '', '', '', 0, '2017-06-17 11:30:07', 0),
(72, 1, 5, 'Mast. Yatharth Kumawat', '2012-03-14', 'Mr. Dr. Ashok Kumawat', '', '100 Fit Road, Near Ramanuj Vatika, Kankroli, (Rajsamand)', '', 3, 1, 0, '961', 'd707329bece455a462b58ce00d1194c9', '9828660404, 9929815174', '9828660404', '9929815174', '', '', '', '', 0, '2017-06-17 11:30:07', 0),
(84, 1, 5, 'Miss Bhavya Mandowara', '2012-07-30', 'Mr. Hemant Mandowara', '', 'C. 405 - 4 Floor, Shreeji Complex, Tehsil Road, Nathdwara', '', 3, 3, 0, '910', 'e205ee2a5de471a70c1fd1b46033a75f', '9413026109, 8696636965', '', '', '', '', '', '', 0, '2017-06-17 11:30:07', 0),
(85, 1, 5, 'Miss Dakshita Sharma', '2012-04-10', 'Mr. Alok Kumar Sharma', '', 'C/o Ganpat Badola, Kothari Mohalla, Rajnagar', '', 3, 3, 0, '955', 'ef4e3b775c934dada217712d76f3d51f', '9413038662, 9413525352', '', '', '', '', '', '', 0, '2017-06-17 11:30:07', 0),
(86, 1, 5, 'Mast. Darshil Sinyal', '2011-08-16', 'Mr. Yogesh Sinyal', '', 'Tehsil Road, Near Dak Bangla, Nathdwara', '', 3, 3, 0, '929', '0d0871f0806eae32d30983b62252da50', '9414834111, 9530081582', '', '', '', '', '', '', 0, '2017-06-17 11:30:07', 0),
(87, 1, 5, 'Mast. Dhawal Sahu', '2011-10-04', 'Mr. Govind Sahu', '', 'Village - Badarda, Dist. (Rajsamand)', '', 3, 3, 0, '011', '84eb13cfed01764d9c401219faa56d53', '9166228881, 9214888985', '', '', '', '', '', '', 0, '2017-06-17 11:30:07', 0),
(88, 1, 5, 'Mast. Divyansh Mali', '2012-04-20', 'Mr. Pankaj Mali', '', 'Opp. Gokuldham, Lal Baag, Nathdwara', '', 3, 3, 0, '925', '7fa732b517cbed14a48843d74526c11a', '9829860527, 9636464590', '', '', '', '', '', '', 0, '2017-06-17 11:30:07', 0),
(89, 1, 5, 'Mast. Diyan Dhoka', '2011-09-14', 'Mr. Bhupesh Dhoka', '', 'Kothari Mohalla, Near Maszid, Sadar Bajar, (Rajsamand)', '', 3, 3, 0, '997', 'ec5aa0b7846082a2415f0902f0da88f2', '9414264333, 9468512666', '', '', '', '', '', '', 0, '2017-06-17 11:30:07', 0),
(90, 1, 5, 'Miss Havi Tripathi', '2012-04-17', 'Mr. Chetnya Tripathi', '', 'Trivari Payasa, Lodha Gati, Nathdwara', '', 3, 3, 0, '1080', '731c83db8d2ff01bdc000083fd3c3740', '9413067861, 9413067343', '', '', '', '', '', '', 0, '2017-06-17 11:30:08', 0),
(91, 1, 5, 'Mast. Hriday Mehta', '2012-01-10', 'Mr. Lalit Mehta', '', 'Mahaveerpura, Nathdwara', '', 3, 3, 0, '918', '1e056d2b0ebd5c878c550da6ac5d3724', '9660517512, 9602531527', '', '', '', '', '', '', 0, '2017-06-17 11:30:08', 0),
(92, 1, 5, 'Mast. Kanishk Shrimali', '2011-10-19', 'Mr. Hemant Shrimali', '', 'Chintaman Ka Madra, Post - Farara Mahadev, (Rajsamand)', '', 3, 3, 0, '999', 'b706835de79a2b4e80506f582af3676a', '9414171522, 9950240672', '', '', '', '', '', '', 0, '2017-06-17 11:30:08', 0),
(93, 1, 5, 'Miss Kanishka Shrimali', '2011-10-19', 'Mr. Hemant Shrimali', '', 'Chintaman Ka Madra, Post - Farara Mahadev, (Rajsamand)', '', 3, 3, 0, '928', 'd045c59a90d7587d8d671b5f5aec4e7c', '9414171522, 9950240672', '', '', '', '', '', '', 0, '2017-06-17 11:30:08', 0),
(94, 1, 5, 'Mast. Kartik Suthar', '2011-08-24', 'Mr. Shanti Lal Suthar', '', 'Suthar Ka Mohalla, Village - Upali Oden, Nathdwara', '', 3, 3, 0, '1045', 'a0e2a2c563d57df27213ede1ac4ac780', '9929094598, 8875358450', '', '', '', '', '', '', 0, '2017-06-17 11:30:08', 0),
(95, 1, 5, 'Miss Kavya Kunwar Rathore', '2012-02-04', 'Mr.Neelam Singh Rathore', '', 'Village Post - Farara, Dist. - Rajsamand', '', 3, 3, 0, '1034', 'bdb106a0560c4e46ccc488ef010af787', '8890409088, 9649085212', '', '', '', '', '', '', 0, '2017-06-17 11:30:08', 0),
(96, 1, 5, 'Miss Kishkinda Singh', '2012-04-23', 'Mr. Dashrath Singh Chouhan', '', 'Village - Kalla Khedi, Post - Gunjol, Nathdwara', '', 3, 3, 0, '1049', '58c54802a9fb9526cd0923353a34a7ae', '9414172303', '', '', '', '', '', '', 0, '2017-06-17 11:30:08', 0),
(97, 1, 5, 'Mast. Kshitij Gurjar', '2012-04-14', 'Mr. Lokesh Gurjar', '', 'Patwari Payasa, Jat Mohalla, Nai Haveli, Nathdwara', '', 3, 3, 0, '1032', '995e1fda4a2b5f55ef0df50868bf2a8f', '9887350683, 7665818000', '', '', '', '', '', '', 0, '2017-06-17 11:30:08', 0),
(98, 1, 5, 'Mast. Lakshraj Singh Rathore', '2012-01-02', 'Mr. Jashwant Singh Rathore', '', 'Village Post - Farara, Dist. - Rajsamand', '', 3, 3, 0, '1012', 'f33ba15effa5c10e873bf3842afb46a6', '8890409088, 9983949202', '', '', '', '', '', '', 0, '2017-06-17 11:30:08', 0),
(99, 1, 5, 'Mast. Manan Mantri', '2011-08-29', 'Mr. Gopal Mantri', '', 'Kishore Nagar, Manda, (Rajsamand), (Raj.)', '', 3, 3, 0, '1094', '41bfd20a38bb1b0bec75acf0845530a7', '9414149602, 9414825930', '', '', '', '', '', '', 0, '2017-06-17 11:30:08', 0),
(100, 1, 5, 'Mast. Naksh Sharma', '2012-04-10', 'Mr. Murli Sharma', '', 'Opp. Vishvakarma Temple, Maliwara, (Rajsamand), (Raj.)', '', 3, 3, 0, '1095', 'd6723e7cd6735df68d1ce4c704c29a04', '8107558383, 9694123172', '', '', '', '', '', '', 0, '2017-06-17 11:30:08', 0),
(101, 1, 5, 'Mast. Piyush Kumar Karnani', '2012-04-05', 'Mr. Mahesh Karnani', '', 'C/o Ganpat Lal Sisodia, Ahinsa Nagar Civil Lines, Rajsamand', '', 3, 3, 0, '916', '23ce1851341ec1fa9e0c259de10bf87c', '9602116271, 9983461924', '', '', '', '', '', '', 0, '2017-06-17 11:30:08', 0),
(102, 1, 5, 'Mast. Priyanshu Mali', '2012-03-09', 'Mr. Mamtesh Kumar Mali ', '', 'Lal Baag, Kheton Par, Nathdwara', '', 3, 3, 0, '936', '90794e3b050f815354e3e29e977a88ab', '9928761370, 7790935187', '', '', '', '', '', '', 0, '2017-06-17 11:30:08', 0),
(103, 1, 5, 'Miss Pushti Sanadhya', '2011-12-19', 'Mr. Govind Sanadhya', '', 'Anand Bhawan, Vallabhpura, Govind Chowk, Nathdwara', '', 3, 3, 0, '1119', '8597a6cfa74defcbde3047c891d78f90', '9829094448, 9414343943', '', '', '', '', '', '', 0, '2017-06-17 11:30:08', 0),
(104, 1, 5, 'Mast. Lakshit Verma', '2012-01-31', 'Mr. Koshik Verma', '', 'Dholi Khan Road, Nai Aabadi, Sanwar, Rajnagar (Raj.)', '', 3, 3, 0, '1230', '4122cb13c7a474c1976c9706ae36521d', '9829193567, 9602193613', '', '', '', '', '', '', 0, '2017-06-17 11:30:08', 0),
(114, 1, 5, 'Mast. Arnav Lodha', '2011-07-24', 'Mr. Kapil Lodha', '', '102, Sunrise Apartment, Opp. Bohra Petrol Pump, Bus Stand, Nathdwara', '', 4, 2, 0, '1107', 'e58cc5ca94270acaceed13bc82dfedf7', '9602462339, 9828786730', '', '', '', '', '', '', 0, '2017-06-17 11:30:08', 0),
(115, 1, 5, 'Mast. Darshil Shrimali', '2010-10-20', 'Mr. Rakash Shrimali', '', 'Uday Niwas, Shastri Nagar, Near Raj Ice - Factory, Kankroli', '', 4, 2, 0, '1128', '3fe78a8acf5fda99de95303940a2420c', '9636641227, 9166494202', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(116, 1, 5, 'Mast. Dheer Gurjar', '2010-11-10', 'Mr. Prakash Gurjar', '', 'Hela Wali Gali, Gurjarpura, Nathdwara', '', 4, 2, 0, '853', 'aff1621254f7c1be92f64550478c56e6', '9982046488, 9783912902', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(117, 1, 5, 'Mast. Dishank Pipada', '2011-04-02', 'Mr. Deepak Pipada', '', 'Near Shiv Mandir, Asotiya, Nai Abadi, Kankroli', '', 4, 2, 0, '904', 'f47d0ad31c4c49061b9e505593e3db98', '9461388431, 7597484105', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(118, 1, 5, 'Mast. Engit Jain', '2011-10-15', 'Mr. Gunsagar Madrecha', '', 'Sadar Bazar, Rajsamand', '', 4, 2, 0, '923', 'c4015b7f368e6b4871809f49debe0579', '9414353817, 9462713620', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(119, 1, 5, 'Mast. Hitarth Maheshwari', '2010-10-30', 'Mr. Anant Maheshwari', '', 'U -J Sukhadia Nagar, Nathdwara', '', 4, 2, 0, '839', '8f7d807e1f53eff5f9efbe5cb81090fb', '9414171328, 9413953520', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(120, 1, 5, 'Miss Ishani Paliwal', '2011-06-26', 'Mr. Pramod Paliwal', '', '29 - J, ''Mudrika'', Sukhadia Nagar, Nathdwara', '', 4, 2, 0, '872', '43feaeeecd7b2fe2ae2e26d917b6477d', '8875080999, 9829040545', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(121, 1, 5, 'Miss Jhanvi Gurjar', '2010-11-11', 'Mr. Deepak Gurjar', '', 'Jharna Darwaja, Nathdwara', '', 4, 2, 0, '847', 'f4552671f8909587cf485ea990207f3b', '9680462646, 9929827289', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(122, 1, 5, 'Mast. Khyat Kothari', '2010-11-13', 'Mr. Manoj Kothari', '', 'Sajjan Villa, Ayodhyapuri, Kishore Nagar, Rajsamand', '', 4, 2, 0, '850', '1efa39bcaec6f3900149160693694536', '9785021672, 9829111672', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(123, 1, 5, 'Miss Kishika Bhatia', '2011-03-15', 'Mr. Kapil Bhatia', '', 'Risala Chowk, Nathdwara', '', 4, 2, 0, '963', '1ce927f875864094e3906a4a0b5ece68', '9829290263, 02953-232103', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(124, 1, 5, 'Mast. Kushagra Choudhary', '2010-12-21', 'Mr. Sanjay Kumar Choudhary', '', 'Mohangarh, Nathdwara', '', 4, 2, 0, '848', '362e80d4df43b03ae6d3f8540cd63626', '9414343912,', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(125, 1, 5, 'Mast. Manas Sanchihar', '2011-05-12', 'Mr. Vibhu Sanchihar', '', 'Near Mataji Mandir, Jagan Marble, Gunjol', '', 4, 2, 0, '827', 'fa3a3c407f82377f55c19c5d403335c7', '9928384149, 9269938567', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(126, 1, 5, 'Mast. Nikunj Kushija', '2011-02-24', 'Mr. Nilesh Kushija', '', '101, Pawan Dham, R.T.D.C., Lal Baag, Nathdwara', '', 4, 2, 0, '930', '1cc3633c579a90cfdd895e64021e2163', '9829466110, 8387854700', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(127, 1, 5, 'Mast. Tanishk Meena', '2011-07-19', 'Mr. Ramprasad Meena', '', 'Behind Rajdeep Hotel, Near S.B.B.J. Bank, Nathdwara', '', 4, 2, 0, '838', 'f9028faec74be6ec9b852b0a542e2f39', '9636372899, 8107244300', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(128, 1, 5, 'Mast. Yatharth Nagda', '2011-05-19', 'Mr. Tejendra Nagda', '', 'Near Rajwadi Hotel, Bherunath Colony, Kankroli', '', 4, 2, 0, '865', '3b3dbaf68507998acd6a5a5254ab2d76', '9950733655, 8107518855', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(129, 1, 5, 'Mast. Yusuf Rangeen', '2011-02-18', 'Mr. Mohammed Rangeen', '', 'Rakhmal Bait'', Near New Rise Primary School, Holi Mangra, Tehsil Road, Nathdwara', '', 4, 2, 0, '1148', 'df0aab058ce179e4f7ab135ed4e641a9', '9829196106, 8829078652', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(130, 1, 5, 'Mast. Dhruvansh Lakhara', '2010-12-13', 'Mr. Narendra Lakhara', '', 'Chota Gopalpura, Nathdwara', '', 4, 2, 0, '828', 'c2626d850c80ea07e7511bbae4c76f4b', '9252272245, 8385006334', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(131, 1, 5, 'Miss. Chahak Chechani', '2011-05-29', 'Mr. kamlesh Chechani', '', 'Brijpura, Near Ahilya Kund Nathdwara', '', 4, 2, 0, '840', 'fa83a11a198d5a7f0bf77a1987bcd006', '8890508965, 9660672199', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(132, 1, 5, 'Miss. Madhvi Maheshwari', '2010-11-01', 'Mr. Vinesh Kumar Namdhar', '', 'Vallabhpura Ntd.', '', 4, 2, 0, '834', '301ad0e3bd5cb1627a2044908a42fdc2', '9024115433, 9529128977', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(144, 1, 5, 'Mast. Akhil Kothari', '2010-10-26', 'Mr. Pintu Kothari', '', 'Pagaria Complex, Mukharji Chouraha, Kankroli', '', 4, 1, 0, '836', 'ab88b15733f543179858600245108dd8', '9929549887, 9928549525', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(145, 1, 5, 'Mast. Arav Choudhary', '2011-07-24', 'Mr. Rajesh Choudhary', '', 'Jat Mohalla, Nathdwara', '', 4, 1, 0, '823', '632cee946db83e7a52ce5e8d6f0fed35', '9829923800, 9261229093', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(146, 1, 5, 'Miss Bhagyashri Jain', '2010-11-10', 'Mr. Suresh Jain', '', 'Laxmi Niwas'', Anand Nagar, Kotharia Road, Nathdwara', '', 4, 1, 0, '1011', '7f975a56c761db6506eca0b37ce6ec87', '9602207950, 7023047127', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(147, 1, 5, 'Miss Dakshita Gurjar', '2011-02-18', 'Mr. Lokesh Gurjar', '', 'Patwari Paysa, Jat Mohalla, Nai Haveli, Nathdwara', '', 4, 1, 0, '957', '2ba596643cbbbc20318224181fa46b28', '9887350683, 7665818000', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(148, 1, 5, 'Mast. Dheeren Sharma', '2010-11-10', 'Mr. Deepesh Sharma', '', 'Bombay Cottage, Rampura, Nathdwara', '', 4, 1, 0, '856', '8c235f89a8143a28a1d6067e959dd858', '9649955366, 9351637566', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(149, 1, 5, 'Miss Dikshita Bansal', '2010-10-20', 'Mr. Amit Bansal', '', 'Lucky House, Ayodhyapuri, Civil Line, 100ft. Road, (Raj.)', '', 4, 1, 0, '821', '4558dbb6f6f8bb2e16d03b85bde76e2c', '9887179479, 9785001171', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(150, 1, 5, 'Miss Heer Gurjar', '2011-03-17', 'Mr. Kamlesh Gurjar', '', 'Hela Wali Gali, Gurjarpura, Nathdwara', '', 4, 1, 0, '1144', '4588e674d3f0faf985047d4c3f13ed0d', '9829206345, 9784136633', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(151, 1, 5, 'Miss Kanishka Kunwar Chouhan', '2011-04-11', 'Mr. Devendra Singh Chouhan', '', 'A - 6, Housing Board Colony, Sukhadia Nagar, Nathdwara', '', 4, 1, 0, '973', 'ca75910166da03ff9d4655a0338e6b09', '9928740006, 9928369857', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(152, 1, 5, 'Mast. Kavy Kothari', '2010-08-07', 'Mr. Sharad Kothari', '', 'Rang Niwas, Head Post Office Ke Samne, Kankroli', '', 4, 1, 0, '822', 'afda332245e2af431fb7b672a68b659d', '9414100051, 9462021555', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(153, 1, 5, 'Mat. Lakshyaraj Singh Ranawat', '2010-10-24', 'Mr. Narendra Singh Ranawat', '', 'Kuncholi, Post - Bagol, Nathdwara', '', 4, 1, 0, '851', '92fb0c6d1758261f10d052e6e2c1123c', '9929042533, 7693071977', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(154, 1, 5, 'Miss Litisha Siyal', '2010-11-20', 'Mr. Arun Siyal', '', 'New Road, Opp. Siddhi Vinayak Hotel, Nathdwara', '', 4, 1, 0, '854', 'f7e9050c92a851b0016442ab604b0488', '9950097661, 9001782221', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(155, 1, 5, 'Mast. Preet Solanki', '2011-08-03', 'Mr. Hitesh Solanki', '', 'Mahadev Colony, Jal Chakki Road, Kankroli', '', 4, 1, 0, '882', '6c3cf77d52820cd0fe646d38bc2145ca', '9602644999, 9928724248', '', '', '', '', '', '', 0, '2017-06-17 11:30:09', 0),
(156, 1, 5, 'Miss Riddhi Mehta', '2010-07-19', 'Mr. Umang Mehta', '', 'Hari Sudarshan, Near Bhalawato Ka Kheda, Ntd.', '', 4, 1, 0, '701', 'b4a528955b84f584974e92d025a75d1f', '9928030652, 9929931255', '', '', '', '', '', '', 0, '2017-06-17 11:30:10', 0),
(157, 1, 5, 'Miss Shreya Vagrecha', '2011-05-09', 'Mr. Kalu Lal Vagrecha', '', 'Near The Ankur School, Bagarwada, Nathdwara', '', 4, 1, 0, '863', '19b650660b253761af189682e03501dd', '9829643708, 9001783709', '', '', '', '', '', '', 0, '2017-06-17 11:30:10', 0),
(158, 1, 5, 'Mast. Takshraj Singh Chouhan', '2011-02-24', 'Mr. Sumer Singh Chouhan', '', 'Kallakhedi, Post - Gunjol, Nathdwara', '', 4, 1, 0, '842', 'fc3cf452d3da8402bebb765225ce8c0e', '9799128099, 9799701582', '', '', '', '', '', '', 0, '2017-06-17 11:30:10', 0),
(159, 1, 5, 'Mast. Vaibhav Agarwal', '2010-11-23', 'Mr. Vijay Kumar Agarwal', '', 'Court Campus, Nathuwas, Nathdwara', '', 4, 1, 0, '829', 'ce78d1da254c0843eb23951ae077ff5f', '8104853952, 9461402069', '', '', '', '', '', '', 0, '2017-06-17 11:30:10', 0),
(160, 1, 5, 'Miss Yashika Choudhary', '2010-04-22', 'Mr. Mahendra Choudhary', '', 'Vivekanand Chouraha, Shanti Colony, Kankroli', '', 4, 1, 0, '824', '677e09724f0e2df9b6c000b75b5da10d', '9549456001, 7597628674', '', '', '', '', '', '', 0, '2017-06-17 11:30:10', 0),
(161, 1, 5, 'Mast. Yug Verma', '2011-05-19', 'Mr. Chandra Shekhar Verma', '', 'Nathuwas, (Pipali Chouraha), Nathdwara', '', 4, 1, 0, '819', '3b5dca501ee1e6d8cd7b905f4e1bf723', '9784785866, 8003686658', '', '', '', '', '', '', 0, '2017-06-17 11:30:10', 0),
(162, 1, 5, 'Mast. Adhiraj Singh Kitawat', '2010-05-29', 'Mr. Sajjan Singh Kittawat', '', 'Vill.- Uriya, Post -Uthnol, Nathdwara', '', 4, 1, 0, '859', '2a084e55c87b1ebcdaad1f62fdbbac8e', '9783635488', '', '', '', '', '', '', 0, '2017-06-17 11:30:10', 0),
(163, 1, 5, 'Miss. Ruchika Mali', '2010-09-25', 'Mr. Mahesh Kumar Mali', '', 'Hotel Gokul Dham ke piche, Lal Baag, Nathdwara', '', 4, 1, 0, '841', '02a32ad2669e6fe298e607fe7cc0e1a0', '9829466015,9929010057', '', '', '', '', '', '', 0, '2017-06-17 11:30:10', 0),
(164, 1, 5, 'Mast. Bhavik Jangid', '2011-08-10', 'Dr. Deepak Sharma', '', 'Anand Nagar, Lal Baag, Nathdwara', '', 4, 1, 0, '1235', '9996535e07258a7bbfd8b132435c5962', '9999305202, 9910519940', '', '', '', '', '', '', 0, '2017-06-17 11:30:10', 0),
(165, 1, 5, 'Miss. Harshita Gurjar', '2011-02-17', 'Late Dilip Gurjar', '', 'Chhota Gopalpura, Bohra Bazar, Nathdwara', '', 4, 1, 0, '1035', 'a34bacf839b923770b2c360eefa26748', '9829999342', '', '', '', '', '', '', 0, '2017-06-17 11:30:10', 0),
(166, 1, 5, 'Mast. Ram Abhinav Maheshwari', '2011-04-21', 'Mr. Gourav Kumar Maheshwari', '', 'Mahadev Colony, Jal Chakki Road, Kankroli', '', 4, 1, 0, '1002', 'fba9d88164f3e2d9109ee770223212a0', '7737459844, 7737577899', '', '', '', '', '', '', 0, '2017-06-17 11:30:10', 0),
(174, 1, 5, 'Miss Archi Singh Chouhan', '2011-01-13', 'Mr. Shoorveer Singh Chouhan', '', 'G.H. Sukhadiya Nagar, Nathdwara', '', 4, 3, 0, '998', '9ab0d88431732957a618d4a469a0d4c3', '9414014808, 9799932166', '', '', '', '', '', '', 0, '2017-06-17 11:30:10', 0),
(175, 1, 5, 'Miss Darshi Sanadhya', '2010-12-13', 'Mr. Rakesh Sanadhya', '', 'Behind Temple, Joshipura, Nathdwara', '', 4, 3, 0, '855', 'addfa9b7e234254d26e9c7f2af1005cb', '9602164355, 9672414086', '', '', '', '', '', '', 0, '2017-06-17 11:30:10', 0),
(176, 1, 5, 'Miss Dikshita Kumawat', '2010-11-12', 'Mr. Dinesh Chand Kumar Kumawat', '', 'Badarda, Nathdwara', '', 4, 3, 0, '10', 'd3d9446802a44259755d38e6d163e820', '97858917331, 8058694430', '', '', '', '', '', '', 0, '2017-06-17 11:30:10', 0),
(177, 1, 5, 'Mast. Dipanshu Kumawat', '2011-06-24', 'Mr. Brij Lal Kumawat', '', 'R - 1, Kumavat, Shiv Colony, 100ft. Road', '', 4, 3, 0, '911', 'b56a18e0eacdf51aa2a5306b0f533204', '9414684072, 9460447445', '', '', '', '', '', '', 0, '2017-06-17 11:30:10', 0),
(178, 1, 5, 'Mast. Divyansh Lodha', '2010-11-18', 'Mr. Surendra Kumar Lodha', '', 'Lodha Gati, Ganesh Nagar, Nathdwara', '', 4, 3, 0, '1007', 'd7322ed717dedf1eb4e6e52a37ea7bcd', '9672127112, 9602507097', '', '', '', '', '', '', 0, '2017-06-17 11:30:11', 0),
(179, 1, 5, 'Miss Garima Maheshwari', '2011-05-23', 'Mr. Rajgopal Maheshwari', '', 'Abhishek Palace, Addarsh Nagar, Near Raj.', '', 4, 3, 0, '785', '4b04a686b0ad13dce35fa99fa4161c65', '9772339990, 9414274307', '', '', '', '', '', '', 0, '2017-06-17 11:30:11', 0),
(180, 1, 5, 'Miss Harshika Maheshwari', '2011-03-15', 'Mr. Kamlesh Maheshwari', '', 'Maheshwari Street, Near Old Post Office, Raj.', '', 4, 3, 0, '960', '437d7d1d97917cd627a34a6a0fb41136', '9414264305, 9414174473', '', '', '', '', '', '', 0, '2017-06-17 11:30:11', 0),
(181, 1, 5, 'Mast. Indraraj Singh Chouhan', '2011-01-31', 'Mr. Narendra Singh Chouhan', '', 'Kalla Khedi, Gunjol, Nathdwara', '', 4, 3, 0, '862', '5ec91aac30eae62f4140325d09b9afd0', '9610847863, 7568865513', '', '', '', '', '', '', 0, '2017-06-17 11:30:11', 0),
(182, 1, 5, 'Miss Naitalde Kunwar Jajawat', '2010-12-05', 'Mr. Rajendra Singh Rajawat', '', 'Behind Choudhary Petrol Pump, Bus Stand, Nathdwara', '', 4, 3, 0, '1000', 'a9b7ba70783b617e9998dc4dd82eb3c5', '7737676225, 98281571199', '', '', '', '', '', '', 0, '2017-06-17 11:30:11', 0),
(183, 1, 5, 'Miss Payodhi Paliwal', '2011-06-11', 'Mr. Vijay Paliwal', '', 'Housing Board Colony, Teleyo Ka Talab, Nathdwara', '', 4, 3, 0, '830', '8e82ab7243b7c66d768f1b8ce1c967eb', '9950915797, 9784873308', '', '', '', '', '', '', 0, '2017-06-17 11:30:11', 0),
(184, 1, 5, 'Miss Shambhavi Swarnkar', '2010-10-10', 'Mr. Lokesh Soni', '', 'Mohangarh, Nichala Chowk, Nathdwara', '', 4, 3, 0, '874', '51ef186e18dc00c2d31982567235c559', '9001775729, 9166775392', '', '', '', '', '', '', 0, '2017-06-17 11:30:11', 0),
(185, 1, 5, 'Miss Shubha Maheshwari', '2011-08-16', 'Mr. Vishal Maheshwari', '', 'Subhash Nagar, Behind Sagun Ice Cream', '', 4, 3, 0, '915', '24896ee4c6526356cc127852413ea3b4', '9414497772, 9460617070', '', '', '', '', '', '', 0, '2017-06-17 11:30:11', 0),
(186, 1, 5, 'Mast. Taha Bara Bhaiwala', '2010-06-02', 'Mr. Mufaddal Bhaiwala', '', 'Boharwadi, Near Bohra Masjid, Nathdwara', '', 4, 3, 0, '871', 'aeb3135b436aa55373822c010763dd54', '9829183283, 7737187862', '', '', '', '', '', '', 0, '2017-06-17 11:30:11', 0),
(187, 1, 5, 'Mast. Tanish Jain', '2011-05-13', 'Mr. Lalit Jain', '', 'Opposite Post Office, Bus Stand, Nathdwara', '', 4, 3, 0, '837', 'b0b183c207f46f0cca7dc63b2604f5cc', '9414343046, 9610006010', '', '', '', '', '', '', 0, '2017-06-17 11:30:11', 0),
(188, 1, 5, 'Miss Vashika Fatima', '2011-05-14', 'Mr. Siraj Alam Mansuri', '', 'Bohra Mohalla, Nathdwara', '', 4, 3, 0, '877', '352407221afb776e3143e8a1a0577885', '9950405865, 7737667469', '', '', '', '', '', '', 0, '2017-06-17 11:30:11', 0),
(189, 1, 5, 'Mast. Bhavyansh Sanadhya', '2010-11-09', 'Mr. Mahesh Sanadhya', '', 'Bada Gopalpura, Nathdwara', '', 4, 3, 0, '864', '1fc214004c9481e4c8073e85323bfd4b', '9829097455, 9414553763', '', '', '', '', '', '', 0, '2017-06-17 11:30:11', 0),
(190, 1, 5, 'Mast. Raghvendra Soni', '2011-05-15', 'Mr. Yaghyesh Soni', '', 'Mohangarh, Nathdwara', '', 4, 3, 0, '849', 'fe8c15fed5f808006ce95eddb7366e35', '9252701352, 9352690306', '', '', '', '', '', '', 0, '2017-06-17 11:30:11', 0),
(191, 1, 5, 'Mast. Shreerudransh Singh', '2011-07-20', 'Mr. Sanjay Kumar Lodha', '', 'Lodha Gati, Ganesh Nagar, Nathdwara', '', 4, 3, 0, '858', 'a67f096809415ca1c9f112d96d27689b', '9461401819, 9649528206', '', '', '', '', '', '', 0, '2017-06-17 11:30:11', 0),
(204, 1, 5, 'Miss Anjali Nandwana', '2010-06-09', 'Mr. Neeraj Nandwana', '', 'Shastri Nagar, Bhilwara Road, Kankroli', '', 5, 2, 0, '924', 'bea5955b308361a1b07bc55042e25e54', '9214342873, 8233972733', '', '', '', '', '', '', 0, '2017-06-17 11:30:11', 0),
(205, 1, 5, 'Miss Anushka Kumawat', '2009-10-07', 'Mr. Sunil Kumawat', '', 'Fauz Mohalla, Nathdwara', '', 5, 2, 0, '704', 'f64eac11f2cd8f0efa196f8ad173178e', '9828443385, 9610615576', '', '', '', '', '', '', 0, '2017-06-17 11:30:11', 0),
(206, 1, 5, 'Miss Bhor Kataria', '2011-01-26', 'Mr. Gaurav Kataria', '', 'Upper Lodha Ghati, Ganesh Nagar, Nathdwara', '', 5, 2, 0, '1220', 'b24d516bb65a5a58079f0f3526c87c57', '9414656700, 9875241512', '', '', '', '', '', '', 0, '2017-06-17 11:30:11', 0),
(207, 1, 5, 'Miss Charvi Karnawat', '2009-09-06', 'Mr. Ajay Karnawat', '', 'Opp. Aashirwad Complex, Nathdwara', '', 5, 2, 0, '809', '32b30a250abd6331e03a2a1f16466346', '9414171023, 8769132613', '', '', '', '', '', '', 0, '2017-06-17 11:30:11', 0),
(208, 1, 5, 'Mast. Daksh Maheshwari', '2010-12-14', 'Mr. Ramesh Maheshwari', '', 'Naniji Ka Baag, Bus Stand, Nathdwara', '', 5, 2, 0, '1153', '55b1927fdafef39c48e5b73b5d61ea60', '8442093301, 9351924546', '', '', '', '', '', '', 0, '2017-06-17 11:30:11', 0),
(209, 1, 5, 'Miss Dishita Chandaliya', '2010-08-27', 'Mr. Atul Chandaliya', '', 'Brajpura, Nathdwara', '', 5, 2, 0, '1173', '0a0a0c8aaa00ade50f74a3f0ca981ed7', '8233451403, 7597294142', '', '', '', '', '', '', 0, '2017-06-17 11:30:11', 0),
(210, 1, 5, 'Miss Divyanshi Sinyal', '2009-12-26', 'Mr. Yogesh Sinyal', '', 'Tehsil Road, Near Dak Bangla, Nathdwara', '', 5, 2, 0, '845', 'b86e8d03fe992d1b0e19656875ee557c', '9414834111, 9530081582', '', '', '', '', '', '', 0, '2017-06-17 11:30:11', 0),
(211, 1, 5, 'Mast. Hardik Shrimali', '2010-06-17', 'Mr. Hitesh Kumar Shrimali', '', 'Village - Maja, Vaya - Kotharia Road', '', 5, 2, 0, '886', '704afe073992cbe4813cae2f7715336f', '9462495683, 7742584731', '', '', '', '', '', '', 0, '2017-06-17 11:30:11', 0),
(212, 1, 5, 'Mast. Harshal Kabra', '2010-02-27', 'Mr. Nirmal Kabra', '', '44-G Near lal Kothi, Sukhadia Nagar, Nathdwara', '', 5, 2, 0, '934', '4daa3db355ef2b0e64b472968cb70f0d', '9214434335, 9782036415', '', '', '', '', '', '', 0, '2017-06-17 11:30:11', 0),
(213, 1, 5, 'Mast. Himanshu Sharma', '2009-05-28', 'Mr. Madhav Lal Sharma', '', 'Narayan Chowk, Sukhadia Nagar', '', 5, 2, 0, '962', '5c936263f3428a40227908d5a3847c0b', '9928627438, 9928345246', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(214, 1, 5, 'Mast. Ishan Jain', '2009-12-29', 'Mr. Nitesh Jain', '', 'Near Shrivilas, Bus Stand, Nathdwara', '', 5, 2, 0, '1149', '09c6c3783b4a70054da74f2538ed47c6', '9414353920, 9461233901', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(215, 1, 5, 'Miss Kanishka Jain', '2010-01-28', 'Mr. Abhishek Jain', '', 'Behind Radhika Hospital, Kankroli', '', 5, 2, 0, '860', 'fc49306d97602c8ed1be1dfbf0835ead', '9928161962, 9928416845', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(216, 1, 5, 'Miss Khushi Yadav', '2010-07-17', 'Mr. Jai Prakash Yadav', '', 'Near Girls School, Shanti Colony, Kankroli', '', 5, 2, 0, '699', 'afd4836712c5e77550897e25711e1d96', '9414232229, 7610963969', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(217, 1, 5, 'Mast. Kkunal Bhatia', '2009-12-03', 'Mr. Anoop Bhatia', '', 'Mohangarh, Nathdwara', '', 5, 2, 0, '688', 'f79921bbae40a577928b76d2fc3edc2a', '9414343022, 9252063333', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(218, 1, 5, 'Miss Neha Sharma', '2009-11-17', 'Mr. Lokesh Sharma', '', 'Nai Haveli Chowk, Nathdwara', '', 5, 2, 0, '773', '86b122d4358357d834a87ce618a55de0', '9460209613, 9460803670', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(219, 1, 5, 'Miss Riya Saini', '2010-07-18', 'Mr. Deepak Saini', '', 'Lal Baag, Kheto Par, Nathdwara', '', 5, 2, 0, '778', 'e07413354875be01a996dc560274708e', '9928075927, 8560944438', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(220, 1, 5, 'Mast. Rudra Darger', '2009-12-07', 'Mr. Kamlesh Darger', '', 'Behind Radhika Hospital, Kankroli', '', 5, 2, 0, '726', '0d3180d672e08b4c5312dcdafdf6ef36', '9414171822, 9784299471', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(221, 1, 5, 'Mast. Rudraksh Choudhary', '2010-07-19', 'Mr. Prasant Choudhary', '', 'Rawato Ka Darwaja, Nathdwara', '', 5, 2, 0, '1146', '8a3363abe792db2d8761d6403605aeb7', '9460802658, 7568866949', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(222, 1, 5, 'Mast. Saksham Kawadia', '2010-04-10', 'Mr. Sanjay Kawadia', '', 'III Kawadia Kunj, 100ft. Road, (Rajsamand)', '', 5, 2, 0, '777', 'f1c1592588411002af340cbaedd6fc33', '9772355000, 9462107206', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(223, 1, 5, 'Mast. Shourya Gupta', '2010-10-17', 'Mr. Sagar Gupta', '', 'Patwari Mohalla, Rawato Ka Darwaja, Nathdwara', '', 5, 2, 0, '1151', 'f197002b9a0853eca5e046d9ca4663d5', '9314438537, 9314287099', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(224, 1, 5, 'Mast. Sohan Bhatia', '2009-10-30', 'Mr. Manish Bhatia', '', 'Sindhi Colony, Nathdwara', '', 5, 2, 0, '810', 'b6edc1cd1f36e45daf6d7824d7bb2283', '9829041513, 9351620900', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(225, 1, 5, 'Miss Varitika Kumawat', '2009-09-10', 'Mr. Ramdayal Kumawat', '', '3/12 Civil Line, (Rajsamand), Near Sharma Hospital', '', 5, 2, 0, '879', 'd516b13671a4179d9b7b458a6ebdeb92', '9772222723, 9772022888', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(226, 1, 5, 'Mast. Yatharth Khandelwal', '2010-07-22', 'Mr. Ashok Kumar Khandelwal', '', 'Plot No. - 8, Ganesh Nagar, Jawad, Kankroli', '', 5, 2, 0, '1009', '31b3b31a1c2f8a370206f111127c0dbd', '7062262364, 8094141783', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(234, 1, 5, 'Mast. Arham Surana', '2010-06-20', 'Mr. Jitendra Surana', '', 'Near Choudhary Petrol Pump, Bus Stand, Nathdwara', '', 5, 3, 0, '1108', 'b9d487a30398d42ecff55c228ed5652b', '9829406582, 9414330848', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(235, 1, 5, 'Mast. Bhanu Solanki', '2010-05-02', 'Mr. Hitesh Solanki', '', 'Madhav Colony, Jal Chakki Road, Kankroli', '', 5, 3, 0, '883', '210f760a89db30aa72ca258a3483cc7f', '9602644999, 9928724248', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(236, 1, 5, 'Mast. Daksh Malani', '2009-08-04', 'Mr. Nitesh Malani', '', 'Sukhadia Nagar, Nathdwara', '', 5, 3, 0, '958', 'd240e3d38a8882ecad8633c8f9c78c9b', '9829043728, 7597924228', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(237, 1, 5, 'Mast. Darsh Shekhar', '2009-12-24', 'Mr. Lokesh Chandra Shekhar', '', 'Opp. Lal Baag, Nathdwara', '', 5, 3, 0, '695', 'e4bb4c5173c2ce17fd8fcd40041c068f', '9828108524, 9950733789', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(238, 1, 5, 'Mast. Karan Kaneria', '2010-04-19', 'Mr. Kuldeep Kaneria', '', 'Sukhadia Nagar, Nathdwara', '', 5, 3, 0, '728', 'd4c2e4a3297fe25a71d030b67eb83bfc', '9414234028, 9784182121', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(239, 1, 5, 'Miss Khushi Choudhary', '2010-01-17', 'Mr. Amit Choudhary', '', 'Bhalawaton Ka Kheda, Lal Baag, Nathdwara', '', 5, 3, 0, '1017', '5d616dd38211ebb5d6ec52986674b6e4', '9352744444, 9829200498', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(240, 1, 5, 'Miss Khushi Shrimali', '2010-10-16', 'Mr. Tarun Shrimali', '', 'Lal Baag, Kothariya Road, Nathdwara', '', 5, 3, 0, '1114', 'd6ef5f7fa914c19931a55bb262ec879c', '9982900886, 9571677358', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(241, 1, 5, 'Mast. Lakshya Raj Gurjar', '2010-01-24', 'Mr. Yudhishtir Gurjar', '', 'Vallabhpura, Nathdwara', '', 5, 3, 0, '685', '3328bdf9a4b9504b9398284244fe97c2', '9928116601, 8947024571', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(242, 1, 5, 'Miss Lavisha Dagliya', '2010-05-12', 'Mr. Jeevan Dagliya', '', 'Mahaveerpura, Nathdwara', '', 5, 3, 0, '723', '08419be897405321542838d77f855226', '9001793310, 9352733100', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(243, 1, 5, 'Miss Manya Bhatiya', '2009-10-15', 'Mr. Chetanya Bhatiya', '', 'Shrikunj, Kanva Road, Nathdwara', '', 5, 3, 0, '913', '8b5040a8a5baf3e0e67386c2e3a9b903', '9829049920, 7597782017', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(244, 1, 5, 'Mast. Mayank Swami', '2010-06-22', 'Mr. Manoj Kumar Swami', '', 'Darji Chok, Rajsamand', '', 5, 3, 0, '1203', '491442df5f88c6aa018e86dac21d3606', '9928072183, 9413262449', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(245, 1, 5, 'Miss Megha Khandelwal', '2010-11-02', 'Mr. Anil Kumar Khandelwal', '', 'Plot No. - 8, Ganesh Nagar, Jawad, Kankroli', '', 5, 3, 0, '1005', '2387337ba1e0b0249ba90f55b2ba2521', '9672295835, 8875192832', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(246, 1, 5, 'Mast. Raghav Bhatia', '2010-07-19', 'Mr. Girish Bhatia', '', 'Gokul Dham Society, Bichhu Magri, Nathdwara', '', 5, 3, 0, '743', '5c572eca050594c7bc3c36e7e8ab9550', '9529552888, 9214874163', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(247, 1, 5, 'Mast. Samank Bharti', '2010-07-29', 'Mr. Guru Govind Bharti', '', 'Mohangarh, Niche Ka Chowk, Nathdwara', '', 5, 3, 0, '905', 'f57a2f557b098c43f11ab969efe1504b', '9587283812, 8290224111', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(248, 1, 5, 'Mast. Shiv Soni', '2010-08-24', 'Mr. Naresh Kumar Soni', '', '403, Shyam Enclave, Tehsil Road, Nathdwara', '', 5, 3, 0, '1190', '160c88652d47d0be60bfbfed25111412', '9460744505, 9950182550', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(249, 1, 5, 'Mast. Siddhant Pagaria', '2010-02-16', 'Mr. Kuldeep Pagaria', '', 'Mukharji Chouraha, Bhilwara Road, Kankroli', '', 5, 3, 0, '811', '670e8a43b246801ca1eaca97b3e19189', '9414684100, 9460174674', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(250, 1, 5, 'Mast. Vansh Choudhary', '2009-12-30', 'Mr. Yogendra Singh Choudhary', '', 'Rawto Ka Darwaja, Jaat Mohalla, Nathdwara', '', 5, 3, 0, '1186', '2b6d65b9a9445c4271ab9076ead5605a', '7568829870, 9983850488', '', '', '', '', '', '', 0, '2017-06-17 11:30:12', 0),
(251, 1, 5, 'Miss Vanshika Sharma', '2010-09-28', 'Mr. Sunil Sharma', '', 'Bada Gopalpura, Nathdwara', '', 5, 3, 0, '1184', '97af4fb322bb5c8973ade16764156bed', '9414285031, 8955891231', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0),
(252, 1, 5, 'Mast. Viral Jain', '2010-10-26', 'Mr. Lokesh Dagliya', '', 'Mahaveerpura, Nathdwara', '', 5, 3, 0, '710', 'e70611883d2760c8bbafb4acb29e3446', '9829044310, 9680944473', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0),
(253, 1, 5, 'Mast. Pradhyuman Singh Rao', '2009-11-12', 'Mr. Virendra Singh Rao', '', 'Dewana Badarda, (Rajsamand)', '', 5, 3, 0, '890', '024d7f84fff11dd7e8d9c510137a2381', '9660136572, 9950713932', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0),
(254, 1, 5, 'Mast. Rituraj Singh Rao', '2010-04-01', 'Mr. Dalpat Singh Rao', '', 'Dewana Badarda, (Rajsamand)', '', 5, 3, 0, '889', '07871915a8107172b3b5dc15a6574ad3', '9660136572, 9785250537', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0),
(255, 1, 5, 'Miss Apurva', '2010-03-22', 'Mr. Subodh Kumar Singh', '', 'Krishna Residency, Ballav Block, Ntd.', '', 5, 3, 0, '1237', 'a9eb812238f753132652ae09963a05e9', '8130822212', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0),
(264, 1, 5, 'Mast. Aadi Kothari', '2010-07-08', 'Mr. Bhuvnesh Kothari', '', 'Nai Haveli Chowk, Nathdwara', '', 5, 1, 0, '979', 'c32d9bf27a3da7ec8163957080c8628e', '9414170534, 9414907120', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0),
(265, 1, 5, 'Miss Bhavya Lodha', '2010-08-21', 'Mr. Pawan Lodha', '', 'Mahaveerpura, Nathdwara', '', 5, 1, 0, '776', '8c6744c9d42ec2cb9e8885b54ff744d0', '9829096750, 9829995000', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0),
(266, 1, 5, 'Mast. Dhruv Soni', '2010-06-27', 'Mr. Subhash Soni', '', 'Shreeji Optical Wali Gali, Nathdwara', '', 5, 1, 0, '707', '500e75a036dc2d7d2fec5da1b71d36cc', '8824991500, 9828334730', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0);
INSERT INTO `login` (`id`, `user_id`, `role_id`, `name`, `dob`, `father_name`, `mother_name`, `address`, `roll_no`, `class_id`, `section_id`, `medium`, `eno`, `password`, `mobile_no`, `father_mobile`, `mother_mobile`, `otp`, `notification_key`, `device_token`, `image`, `school_id`, `curent_date`, `flag`) VALUES
(267, 1, 5, 'Miss Gati Jain', '2010-07-27', 'Mr. Kamlesh Bolia', '', 'Reti Mohalla, Kankroli', '', 5, 1, 0, '697', '8a0e1141fd37fa5b98d5bb769ba1a7cc', '9414831520, 9414777763', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0),
(268, 1, 5, 'Mast. Harshit Gurjar', '2009-09-17', 'Mr. Kanhaiya Lal Gurjar', '', 'Vallabhpura, Ganesh Nagar, Nathdwara', '', 5, 1, 0, '692', 'e555ebe0ce426f7f9b2bef0706315e0c', '7737667492, 9672646854', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0),
(269, 1, 5, 'Miss Ishita Chouhan', '2010-02-21', 'Mr. Prahlad Singh Chouhan', '', 'IV / 137 Civil Lines, Rajsamand', '', 5, 1, 0, '844', 'e97ee2054defb209c35fe4dc94599061', '9460725774, 9636907155', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0),
(270, 1, 5, 'Mast. Kavya Sisodiya', '2009-07-20', 'Mr. Rajesh Sisodiya', '', 'Nai Haveli Chowk, Nathdwara', '', 5, 1, 0, '976', '9c01802ddb981e6bcfbec0f0516b8e35', '8290899006, 9602577854', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0),
(271, 1, 5, 'Mast. Krishna Bolia', '2010-05-17', 'Mr. Kiran Kumar Bolia', '', 'Mukharji Chouraha, Kankroli', '', 5, 1, 0, '690', 'c06d06da9666a219db15cf575aff2824', '9460363322, 7877244591', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0),
(272, 1, 5, 'Mast. Krishnpal Singh', '2009-08-14', 'Mr. Dunger S. Chundawat', '', '100ft. Road, Maharana Pratap Chouraha, (Raj.)', '', 5, 1, 0, '1188', 'c44e503833b64e9f27197a484f4257c0', '9460707538, 9460361853', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0),
(273, 1, 5, 'Mast. Lakshya Khandelwal', '2010-02-21', 'Mr. Manish Khandelwal', '', 'Rawaton Ka Darwaja, Nathdwara', '', 5, 1, 0, '716', 'e7f8a7fb0b77bcb3b283af5be021448f', '7737813012, 8233952178', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0),
(274, 1, 5, 'Miss Lakshya Kunwar Rathore', '2010-01-07', 'Mr. Shaitan S. Rathore', '', 'Bageri Naka Office, Nathdwara', '', 5, 1, 0, '676', 'dc6a70712a252123c40d2adba6a11d84', '9983928209, 9875006147', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0),
(275, 1, 5, 'Miss Mansi Paliwal', '2009-11-10', 'Mr. Lalit Paliwal', '', 'Gurjarpura, Nathdwara', '', 5, 1, 0, '690', 'c06d06da9666a219db15cf575aff2824', '9587966655, 9829630747', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0),
(276, 1, 5, 'Mast. Mitansh Soni', '2010-02-01', 'Mr. Vishal Soni', '', 'Aadarsh Nagar, Nathdwara', '', 5, 1, 0, '1198', 'c54e7837e0cd0ced286cb5995327d1ab', '9929331122, 9414745198', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0),
(277, 1, 5, 'Miss Monika Mali', '2009-01-14', 'Mr. Sheshnarayan Mali', '', 'Bhandari Bawari Ke Pass, Nathdwara', '', 5, 1, 0, '719', '2afe4567e1bf64d32a5527244d104cea', '9929506683, 9782073111', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0),
(278, 1, 5, 'Miss Radhika Gurjar', '2010-04-28', 'Mr. Manish Gurjar', '', 'Near Purohit Hospital, Nathuwas Chouraha, Nathdwara', '', 5, 1, 0, '761', '88ae6372cfdc5df69a976e893f4d554b', '9799725863, 8829973382', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0),
(279, 1, 5, 'Miss Sakshi Kunwar', '2011-07-01', 'Mr. Jay Singh ', '', 'Shanti Colony, Nai Aabadi, Kankroli', '', 5, 1, 0, '1196', '9adeb82fffb5444e81fa0ce8ad8afe7a', '8890912338, 9602248061', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0),
(280, 1, 5, 'Mast. Siddh Daglia', '2009-10-02', 'Mr. Kapil Daglia', '', 'Mahaveerpura, Nathdwara', '', 5, 1, 0, '789', '68053af2923e00204c3ca7c6a3150cf7', '9799081711, 9414869484', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0),
(281, 1, 5, 'Mast. Tanishq Motiwala', '2010-03-05', 'Mr. Girish Parikh', '', 'Shreejee Kripa, Rampura, Nathdwara', '', 5, 1, 0, '721', 'aba3b6fd5d186d28e06ff97135cade7f', '9829096124, 9828932608', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0),
(282, 1, 5, 'Mast. Yash Mehta', '2011-01-02', 'Mr. Kushal Mehta', '', 'Behind SBI Bank, Rajnagar Road, (Raj.)', '', 5, 1, 0, '1096', '4e2545f819e67f0615003dd7e04a6087', '7737732816, 9462722131', '', '', '', '', '', '', 0, '2017-06-17 11:30:13', 0),
(283, 1, 5, 'Miss Yashasvi Jangid', '2010-07-22', 'Mr. Mukesh Jangid', '', 'Radhika Hospital, Krishna Nagar, Kankroli', '', 5, 1, 0, '808', 'a8ecbabae151abacba7dbde04f761c37', '9929984440, 9829274890', '', '', '', '', '', '', 0, '2017-06-17 11:30:14', 0),
(284, 1, 5, 'Miss Yashvi Lodha', '2010-05-29', 'Mr. Dayanand Lodha', '', 'Ganesh Nagar, Lodha Ghati, Nathdwara', '', 5, 1, 0, '801', '1905aedab9bf2477edc068a355bba31a', '9351460643, 9829382233', '', '', '', '', '', '', 0, '2017-06-17 11:30:14', 0),
(285, 1, 5, 'Mast. Yug Mehta', '2010-12-07', 'Mr. Arun Mehta', '', 'Behind SBI Bank, Rajnagar Road, (Raj.)', '', 5, 1, 0, '1097', 'db2b4182156b2f1f817860ac9f409ad7', '8769560189, 9461260039', '', '', '', '', '', '', 0, '2017-06-17 11:30:14', 0),
(294, 1, 5, 'Miss Charvi Kumawat', '2009-11-01', 'Mr. Ravindra Kumawat', '', 'Uba Ganeshji, Nathdwara, Rajsamand', '', 6, 2, 0, '669', '5c04925674920eb58467fb52ce4ef728', '9829134781, 9799120861', '', '', '', '', '', '', 0, '2017-06-17 11:30:14', 0),
(295, 1, 5, 'Miss Charvi Pagaria', '2009-06-17', 'Mr. Pankaj Pagaria', '', 'Navkar, Behind Radhika Hospital, Kankroli', '', 6, 2, 0, '708', 'ae0eb3eed39d2bcef4622b2499a05fe6', '9414171500, 9460210500', '', '', '', '', '', '', 0, '2017-06-17 11:30:14', 0),
(296, 1, 5, 'Miss Dakshita Sanadhya', '2008-12-08', 'Mr. Govind Sanadhya', '', ' ''Anand Bhawan'' Vallabhpura, Govind Chowk, Nathdwara', '', 6, 2, 0, '1157', 'a8240cb8235e9c493a0c30607586166c', '9829094448, 9414343943', '', '', '', '', '', '', 0, '2017-06-17 11:30:14', 0),
(297, 1, 5, 'Miss Divya Kumawat', '2008-11-10', 'Mr. Jagdish Chandra Kumawat', '', 'Near Swastik Cinema, Kankroli, (Raj.)', '', 6, 2, 0, '751', '912d2b1c7b2826caf99687388d2e8f7c', '9950733835, 8559886770', '', '', '', '', '', '', 0, '2017-06-17 11:30:14', 0),
(298, 1, 5, 'Miss Drishti Raj Kumawat', '2009-04-23', 'Mr. Tilkesh Kumawat', '', 'N.H. - 8, Lal Baag, Nathdwara, (Raj.)', '', 6, 2, 0, '637', 'a532400ed62e772b9dc0b86f46e583ff', '9829972791, 9680499747', '', '', '', '', '', '', 0, '2017-06-17 11:30:14', 0),
(299, 1, 5, 'Miss Kavya Joshi', '2009-01-09', 'Mr. Rajesh Joshi', '', 'Ganesh Nagar, Nathdwara, (Raj.)', '', 6, 2, 0, '610', '00ac8ed3b4327bdd4ebbebcb2ba10a00', '9829755676, 9829755675', '', '', '', '', '', '', 0, '2017-06-17 11:30:14', 0),
(300, 1, 5, 'Miss Kavya Sharma', '2008-10-21', 'Mr. Narendra K. Sharma', '', 'Vitthal Nathji Temple, Nathdwara', '', 6, 2, 0, '813', 'e0cf1f47118daebc5b16269099ad7347', '8952081945, 8769581945', '', '', '', '', '', '', 0, '2017-06-17 11:30:14', 0),
(301, 1, 5, 'Mast. Kuldeep Jakhar', '2009-09-30', 'Mr. Arvind Jakhar', '', 'Reserve Police Line, Rajsamand', '', 6, 2, 0, '765', 'd840cc5d906c3e9c84374c8919d2074e', '9462494426, 9462542836', '', '', '', '', '', '', 0, '2017-06-17 11:30:14', 0),
(302, 1, 5, 'Mast. Lakshya Swarnkar', '2008-11-13', 'Mr. Santosh Swarnkar', '', 'Vallabhpura, Nathdwara, (Raj.)', '', 6, 2, 0, '774', '4e0928de075538c593fbdabb0c5ef2c3', '9549048500, 9549058550', '', '', '', '', '', '', 0, '2017-06-17 11:30:14', 0),
(303, 1, 5, 'Mast. Moksh Bagrecha', '2008-10-24', 'Mr. Pravin Bagrecha', '', 'Near S.B.B.J. Bank, New Road, Nathdwara', '', 6, 2, 0, '584', 'f5deaeeae1538fb6c45901d524ee2f98', '9799068424, 9887054115', '', '', '', '', '', '', 0, '2017-06-17 11:30:14', 0),
(304, 1, 5, 'Mast. Netik Mandot', '2009-10-21', 'Mr. Piyush Mandot', '', 'Ahilya Kund, Brijpura, Nathdwara', '', 6, 2, 0, '901', '892c91e0a653ba19df81a90f89d99bcd', '7597762005, 9610132207', '', '', '', '', '', '', 0, '2017-06-17 11:30:15', 0),
(305, 1, 5, 'Mast. Parth Bhatia', '2007-12-04', 'Mr. Kamlesh Bhatia', '', 'Sindhi Colony, Nathdwara, (Raj.)', '', 6, 2, 0, '686', '109a0ca3bc27f3e96597370d5c8cf03d', '9660934678, 9529570543', '', '', '', '', '', '', 0, '2017-06-17 11:30:15', 0),
(306, 1, 5, 'Mast. Parth Mali', '2009-06-01', 'Mr. Abhishek Mali', '', 'P.W.D., Rest House, Near Tehsil Road, Nathdwara', '', 6, 2, 0, '921', '430c3626b879b4005d41b8a46172e0c0', '9887224890, 9887927501', '', '', '', '', '', '', 0, '2017-06-17 11:30:15', 0),
(307, 1, 5, 'Miss Pranchi Samdani', '2009-06-01', 'Mr. Bhupendra K. Samdani', '', ' ''Hemant Villa'' Opp. Vandana Talkies, Nathdwara', '', 6, 2, 0, '846', '84f7e69969dea92a925508f7c1f9579a', '8875519998, 9314103431', '', '', '', '', '', '', 0, '2017-06-17 11:30:15', 0),
(308, 1, 5, 'Miss Rudrakshi Paliwal', '2008-10-28', 'Mr. Sunil Paliwal', '', 'Nandsamand Road, Nathdwara, (Raj.)', '', 6, 2, 0, '612', 'f76a89f0cb91bc419542ce9fa43902dc', '9413811447, 9828882907', '', '', '', '', '', '', 0, '2017-06-17 11:30:15', 0),
(309, 1, 5, 'Miss Shaili Joshi ', '2008-12-06', 'Mr. Jai Prakash Joshi', '', 'Near Water Tank, Sukhadia Nagar, Nathdwara', '', 6, 2, 0, '581', 'c6e19e830859f2cb9f7c8f8cacb8d2a6', '9950477266, 9680278150', '', '', '', '', '', '', 0, '2017-06-17 11:30:15', 0),
(310, 1, 5, 'Miss Shivi Girnara', '2009-04-21', 'Mr. Hemant K. Girnara', '', '12, Sukhadia Nagar, Nathdwara', '', 6, 2, 0, '573', 'e5f6ad6ce374177eef023bf5d0c018b6', '9214820851, 7597765151', '', '', '', '', '', '', 0, '2017-06-17 11:30:15', 0),
(311, 1, 5, 'Mast. Shourya Solanki', '2009-03-24', 'Mr. Praveen Solanki', '', 'Bombey Market, Sarrafa Bazar, Kankroli', '', 6, 2, 0, '912', '2a9d121cd9c3a1832bb6d2cc6bd7a8a7', '9314413061, 8003204306', '', '', '', '', '', '', 0, '2017-06-17 11:30:15', 0),
(312, 1, 5, 'Miss Simran Sharma', '2008-03-07', 'Mr. Shyam Sundar Sharma', '', 'A - 27, Nai Abadi, Kankroli', '', 6, 2, 0, '632', 'abd815286ba1007abfbb8415b83ae2cf', '9414220786, 9461020789', '', '', '', '', '', '', 0, '2017-06-17 11:30:15', 0),
(313, 1, 5, 'Miss Tanisha Lodha', '2009-02-15', 'Mr. Kapil Lodha', '', 'Sunrise Complex, Flat No. - 203, New Road, Nathdwara', '', 6, 2, 0, '661', '3a066bda8c96b9478bb0512f0a43028c', '9602462339, 9828786730', '', '', '', '', '', '', 0, '2017-06-17 11:30:15', 0),
(314, 1, 5, 'Miss Tanisha Tailor', '2008-12-23', 'Mr. Bheru Lal Tailor', '', 'Nakoda Nagar, Lal Baag, Nathdwara', '', 6, 2, 0, '771', 'b7ee6f5f9aa5cd17ca1aea43ce848496', '9549571399, 8107786610', '', '', '', '', '', '', 0, '2017-06-17 11:30:15', 0),
(315, 1, 5, 'Miss Uttra Verma', '2008-12-11', 'Mr. Chandrashekhar Verma', '', 'Peepali Chauraha, Nathuwas, Nathdwara', '', 6, 2, 0, '977', 'cc1aa436277138f61cda703991069eaf', '9784785866, 9772311711', '', '', '', '', '', '', 0, '2017-06-17 11:30:15', 0),
(316, 1, 5, 'Mast. Arihant Surana', '2009-02-06', 'Mr. Abhay Surana', '', 'Shrinath Colony, Behind Police Station, Nathdwara', '', 6, 2, 0, '700', 'e5841df2166dd424a57127423d276bbe', '9887113562, 9587212141', '', '', '', '', '', '', 0, '2017-06-17 11:30:15', 0),
(317, 1, 5, 'Mast. Hiren Gehlot', '2009-09-16', 'Mr. Priyatam Gehlot', '', 'Rissala Chowk, Nathdwara', '', 6, 2, 0, '757', '470e7a4f017a5476afb7eeb3f8b96f9b', '9983232882, 9571712544', '', '', '', '', '', '', 0, '2017-06-17 11:30:15', 0),
(318, 1, 5, 'Miss Nia Nagar', '2009-10-21', 'Mr. Subohkant Nagar', '', '202, Vardhman Complex, Naya Road Ntd.', '', 6, 2, 0, '892', 'c2aee86157b4a40b78132f1e71a9e6f1', '9772348860, 9214848860', '', '', '', '', '', '', 0, '2017-06-17 11:30:15', 0),
(324, 1, 5, 'Mast. Aman Jha', '2009-06-20', 'Mr. Dharmendra Jha', '', 'A - 43, Nai Aabadi, Gokul Nagar, Kanakroli', '', 6, 1, 0, '814', '96b9bff013acedfb1d140579e2fbeb63', '9772349913', '', '', '', '', '', '', 0, '2017-06-17 11:30:15', 0),
(325, 1, 5, 'Mast. Arham Jain', '2009-05-23', 'Mr. Dharmesh Jain', '', '20/29 Adarsh Nagar, New Road, Nathdwara', '', 6, 1, 0, '897', '5705e1164a8394aace6018e27d20d237', '9214445111, 7737666335', '', '', '', '', '', '', 0, '2017-06-17 11:30:15', 0),
(326, 1, 5, 'Miss Bhumi Maheshwari', '2009-09-26', 'Mr. Rakesh Maheshwari', '', 'Lal Bazar, Nathdwara', '', 6, 1, 0, '931', '9f53d83ec0691550f7d2507d57f4f5a2', '9667042565, 9414472324', '', '', '', '', '', '', 0, '2017-06-17 11:30:15', 0),
(327, 1, 5, 'Miss Bhoomi Makhija', '2008-10-06', 'Mr. Kamlesh Makhija', '', 'Babu Bhai Sindhi Ka Makan, Rampura, Nathdwara', '', 6, 1, 0, '617', '5d44ee6f2c3f71b73125876103c8f6c4', '9672626680, 9460886736', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(328, 1, 5, 'Mast. Divya Suthar', '2009-04-22', 'Mr. Chetan Suthar', '', 'Gunjol, Opp. Lal Baag, Kotharia', '', 6, 1, 0, '672', '2dea61eed4bceec564a00115c4d21334', '9829548535', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(329, 1, 5, 'Mast. Hatim Bootwala', '2008-11-06', 'Mr. Abdul Qadir Bootwala', '', 'Bohra Bazar, Nathdwara', '', 6, 1, 0, '607', 'dc82d632c9fcecb0778afbc7924494a6', '9413953250, 7737671250', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(330, 1, 5, 'Mast. Jigar Lavti', '2008-10-10', 'Mr. Nilesh Lavti', '', 'Sukhadia Nagar, Nathdwara', '', 6, 1, 0, '634', '6766aa2750c19aad2fa1b32f36ed4aee', '9529164646, 9352903740', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(331, 1, 5, 'Mast. Kartavya Sen', '2009-07-20', 'Mr. Navneet K. Sen', '', 'Royal House, Bus Stand, Bagol, Nathdwara', '', 6, 1, 0, '1161', '38ca89564b2259401518960f7a06f94b', '9950942601, 9414659098', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(332, 1, 5, 'Mast. Krishn Bhatia', '2009-04-29', 'Mr. Shyam Sundar Bhatia', '', 'Sindhi Colony, Nathdwara', '', 6, 1, 0, '831', 'e0ec453e28e061cc58ac43f91dc2f3f0', '9351620900, 9352720900', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(333, 1, 5, 'Mast. Krishna Chechani', '2008-11-21', 'Mr. Kamlesh Chechani', '', 'Brijpura, Near Ahilya Kund, Nathdwara', '', 6, 1, 0, '629', '051e4e127b92f5d98d3c79b195f2b291', '9660672199, 8890508965', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(334, 1, 5, 'Mast. Manan Singhvi', '2008-12-18', 'Mr. Dinesh Singhvi', '', 'Nakoda Nagar, Lal Baag, Nathdwara', '', 6, 1, 0, '935', 'e820a45f1dfc7b95282d10b6087e11c0', '7665667661', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(335, 1, 5, 'Miss Mansi Gurjar', '2009-05-04', 'Mr. Vijay Gurjar', '', 'Badshah Ki Gali, Gurjarpura, Nathdwara', '', 6, 1, 0, '888', '0a113ef6b61820daa5611c870ed8d5ee', '9829652999, 8875213031', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(336, 1, 5, 'Mast. Manthan Sisodia', '2008-10-23', 'Mr. Abhishek Sisodia', '', 'Near SBBJ Bank, Adarsh Nagar, New Road,Nathdwara', '', 6, 1, 0, '797', 'beb22fb694d513edcf5533cf006dfeae', '9928103939, 9829634149', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(337, 1, 5, 'Miss Mimansa Singh Ranawat', '2009-01-13', 'Mr. Narendra Singh Ranawat', '', 'Kuncholi', '', 6, 1, 0, '628', '42e77b63637ab381e8be5f8318cc28a2', '7869346289, 9929042533', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(338, 1, 5, 'Miss Palak Lavti', '2009-10-17', 'Mr. Dinesh Chandra Lavti', '', 'Park Road, Sukhadia Nagar, Nathdwara', '', 6, 1, 0, '687', '7f5d04d189dfb634e6a85bb9d9adf21e', '9352824287, 9024153110', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(339, 1, 5, 'Mast. Pallav Joshi', '2008-08-06', 'Mr. Dilip Kumar Joshi', '', 'Bhalawaton Ka Kheda, Lal Baag, Nathdwara', '', 6, 1, 0, '619', 'cdc0d6e63aa8e41c89689f54970bb35f', '9799576042', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(340, 1, 5, 'Miss Pragyan Trivedi', '2009-06-29', 'Mr. Rakesh Trivedi', '', 'Shrinath Colony A, Nathdwara', '', 6, 1, 0, '605', 'c361bc7b2c033a83d663b8d9fb4be56e', '8107280461, 9799934058', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(341, 1, 5, 'Mast. Pranay Siyal', '2008-12-19', 'Mr. Vimal Siyal', '', 'New Road, Opp. Hotel Siddhi Vinayak, Nathdwara', '', 6, 1, 0, '796', '35cf8659cfcb13224cbd47863a34fc58', '9214857938, 9636226700', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(342, 1, 5, 'Mast. Rahul Singh Rathore', '2009-03-23', 'Mr. Fateh Singh Rathore', '', 'Balaji Nagar, Somnath Chowk Ke Pass, Jawad, (Rajsamand)', '', 6, 1, 0, '960', '437d7d1d97917cd627a34a6a0fb41136', '9929428059, 9602194932', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(343, 1, 5, 'Mast. Raghav Krishna Nandwana', '2008-10-29', 'Mr. Arun Kumar Nandwana', '', 'Near Shiv Mandir, Girls School Road, Kankroli', '', 6, 1, 0, '1154', 'e8b1cbd05f6e6a358a81dee52493dd06', '9950098663, 9950300933', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(344, 1, 5, 'Miss Riya Vyas', '2008-10-29', 'Mr. Manish Vyas', '', '19-G, Sukhadia Nagar, Nathdwara', '', 6, 1, 0, '604', '9cf81d8026a9018052c429cc4e56739b', '9414300927, 9461401867', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(345, 1, 5, 'Mast. Shivam Purohit', '2008-11-09', 'Mr. Narayan Lal Purohit', '', 'Friends Colony, Lal Baag, Nathdwara', '', 6, 1, 0, '611', '8ebda540cbcc4d7336496819a46a1b68', '9928121184, 9784233004', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(346, 1, 5, 'Miss Tanishka Somani', '2009-04-11', 'Mr. Rajkumar Somani', '', 'Near Tera Panthi Nohra, Nai Haweli Chowk, Nathdwara', '', 6, 1, 0, '606', '44c4c17332cace2124a1a836d9fc4b6f', '9571442734, 9829940834', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(347, 1, 5, 'Miss Yashashvi Mali', '2008-11-30', 'Mr. Mahesh Kumar Mali', '', 'Friends Colony, Lal Baag, Nathdwara', '', 6, 1, 0, '887', '7ce3284b743aefde80ffd9aec500e085', '9829466015, 9929010057', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(348, 1, 5, 'Mast. Chinmay Sharma', '2009-10-05', 'Mr. Suresh Kumar Sharma', '', 'Jawahar Navodaya Vidyalaya, N.H. - 8, (Rajsamand)', '', 6, 1, 0, '1187', '4f284803bd0966cc24fa8683a34afc6e', '9414522001, 7665003191', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(354, 1, 5, 'Mast. Aaryan Lodha', '2009-06-18', 'Mr. Tejpal Lodha', '', 'Ganesh Nagar, Nathdwara', '', 6, 3, 0, '895', '20aee3a5f4643755a79ee5f6a73050ac', '9352668047, 773700637', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(355, 1, 5, 'Mast. Aayush Paliwal', '2009-02-03', 'Mr. Harish Paliwal', '', 'Near SBBJ Bank Gali, New Road, Nathdwara, (Rajsamand)', '', 6, 3, 0, '926', 'cbb6a3b884f4f88b3a8e3d44c636cbd8', '9950876576, 9829400180', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(356, 1, 5, 'Miss Aradhya Soni', '2009-11-24', 'Mr. Govind Soni', '', 'Lal Bagh, Friends Colony, Nathdwara, (Rajsamand), (Raj.)', '', 6, 3, 0, '1125', 'c21002f464c5fc5bee3b98ced83963b8', '9413024902, 8233500543', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(357, 1, 5, 'Mast. Bhavin Jain', '2009-05-14', 'Mr. Tarun Jain', '', 'A -  Gokul Nagar, R.T.D.C., Nathdwara', '', 6, 3, 0, '609', 'd7a728a67d909e714c0774e22cb806f2', '9460302242, 9251369087', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(358, 1, 5, 'Mast. Bhavya Bolia', '2008-11-02', 'Mr. Kamlesh Bolia', '', 'Reti Mohalla, Kankroli', '', 6, 3, 0, '646', '0ff39bbbf981ac0151d340c9aa40e63e', '9414831520, 9414777763', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(359, 1, 5, 'Mast. Darshil Bhoi', '2009-11-26', 'Mr. Anil Raj Bhoi', '', 'Behind Shitla Mata Mandir, S.B.B.J. Bank, Rajnagar, (Rajsamand)', '', 6, 3, 0, '992', '860320be12a1c050cd7731794e231bd3', '9928740020, 7737338085', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(360, 1, 5, 'Mast. Dhairya Surana', '2008-02-18', 'Mr. Navin Surana', '', 'Friends Colony, Lal Bagh, Nathdwara', '', 6, 3, 0, '747', '8d317bdcf4aafcfc22149d77babee96d', '8890965555, 9929145558', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(361, 1, 5, 'Mast. Divyansh Mali', '2009-01-04', 'Mr. Chetan Mali', '', 'New Road, Madhav Hotal, Nathdwara', '', 6, 3, 0, '591', '3493894fa4ea036cfc6433c3e2ee63b0', '9414171315, 9461179131', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(362, 1, 5, 'Mast. Faiz Ahmed Mansuri', '2009-02-15', 'Moh. Firoj Khan', '', 'Mohangarh, Nichla Chowk, Nathdwara', '', 6, 3, 0, '876', '67d16d00201083a2b118dd5128dd6f59', '9928895108', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(363, 1, 5, 'Miss Garima Shrimali', '2009-12-21', 'Mr. Kailash Chandra Shrimali', '', 'Chinta Man Ka Madra, Farara, (Rajsamand)', '', 6, 3, 0, '987', 'df6d2338b2b8fce1ec2f6dda0a630eb0', '9929659621, 7414955605', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(364, 1, 5, 'Mast. Hardik Suthar', '2009-05-01', 'Mr. Shanti Lal Suthar', '', 'Sutharo Ka Mohalla, Upali Odan', '', 6, 3, 0, '1018', 'ef50c335cca9f340bde656363ebd02fd', '8875358450, 9929094598', '', '', '', '', '', '', 0, '2017-06-17 11:30:16', 0),
(365, 1, 5, 'Mast. Mayank Joshi', '2008-12-17', 'Mr. Ramesh Chandra Joshi', '', 'Police Station Colony, Nathdwara', '', 6, 3, 0, '639', '0f96613235062963ccde717b18f97592', '9680334998, 9610257187', '', '', '', '', '', '', 0, '2017-06-17 11:30:17', 0),
(366, 1, 5, 'Mast. Nitish Soni', '2009-11-17', 'Mr. Ashish Soni', '', 'Near S.B.B.J. Bank, New Road, Nathdwara', '', 6, 3, 0, '906', 'c8fbbc86abe8bd6a5eb6a3b4d0411301', '9414354058, 9784545854', '', '', '', '', '', '', 0, '2017-06-17 11:30:17', 0),
(367, 1, 5, 'Mast. Pavitra Bagora', '2009-05-06', 'Mr. Ravi Bagora', '', 'Near Bhakti Palace, Mohangarh, Nathdwara', '', 6, 3, 0, '594', '076a0c97d09cf1a0ec3e19c7f2529f2b', '7414648776, 9414648766', '', '', '', '', '', '', 0, '2017-06-17 11:30:17', 0),
(368, 1, 5, 'Miss Raavi Gurjar', '2009-07-02', 'Mr. Dipak Gurjar', '', 'Vallabhapura Ghati, Nathdwara', '', 6, 3, 0, '596', 'b2eeb7362ef83deff5c7813a67e14f0a', '9024939606, 7568634757', '', '', '', '', '', '', 0, '2017-06-17 11:30:17', 0),
(369, 1, 5, 'Mast. Saksham Raj Ajmera', '2009-01-01', 'Mr. Shyam Sundar', '', 'R.T.D.C., Lal Bagh, Nathdwara', '', 6, 3, 0, '670', '17c276c8e723eb46aef576537e9d56d0', '9166947909, 9672007229', '', '', '', '', '', '', 0, '2017-06-17 11:30:17', 0),
(370, 1, 5, 'Mast. Shivraj Singh Chouhan', '2009-04-20', 'Mr. Jivan S. Chouhan', '', 'Kalla Khedi Viran, Post - Gunjol, Nathdwara', '', 6, 3, 0, '671', '5dd9db5e033da9c6fb5ba83c7a7ebea9', '9636727818', '', '', '', '', '', '', 0, '2017-06-17 11:30:17', 0),
(371, 1, 5, 'Mast. Shivraj Singh Rathore', '2009-02-13', 'Mr. Shaitan S. Rathor', '', 'Bagheri Office, N.H. - 8, Nathdwara', '', 6, 3, 0, '744', '0537fb40a68c18da59a35c2bfe1ca554', '9983928209, 9875006147', '', '', '', '', '', '', 0, '2017-06-17 11:30:17', 0),
(372, 1, 5, 'Miss Shrijeeka Soni', '2009-11-25', 'Mr. Jagdish Soni', '', 'Ganesh Takri Road, Vallabhpura, Nathdwara', '', 6, 3, 0, '1008', '1587965fb4d4b5afe8428a4a024feb0d', '9828532840, 7665164206', '', '', '', '', '', '', 0, '2017-06-17 11:30:17', 0),
(373, 1, 5, 'Mast. Vedant Gorwa', '2009-01-26', 'Mr. Gulal Gorwa', '', 'Charnamrit Jharna Darwaja, Nathdwara', '', 6, 3, 0, '741', '2e65f2f2fdaf6c699b223c61b1b5ab89', '9001795133, 9413953258', '', '', '', '', '', '', 0, '2017-06-17 11:30:17', 0),
(374, 1, 5, 'Mast. Vishwapratap Singh', '2009-06-21', 'Mr. Raghpal S. Chouhan', '', 'Kuncholi', '', 6, 3, 0, '626', '45645a27c4f1adc8a7a835976064a86d', '9829620900', '', '', '', '', '', '', 0, '2017-06-17 11:30:17', 0),
(375, 1, 5, 'Mast. Yojitraj Singh', '2008-11-11', 'Mr. Hukamraj S. Chouhan', '', 'Village - Gunjol, Nathdwara', '', 6, 3, 0, '937', 'b7892fb3c2f009c65f686f6355c895b5', '9829069857, 9928748382', '', '', '', '', '', '', 0, '2017-06-17 11:30:17', 0),
(381, 1, 5, 'Miss Aishna Gurjar', '2008-01-19', 'Mr. Amit Gurjar', '', '', '', 7, 2, 0, '552', '94c7bb58efc3b337800875b5d382a072', '8824346388, 9680253444', '', '', '', '', '', '', 0, '2017-06-17 11:30:17', 0),
(382, 1, 5, 'Mast. Aman Sharma', '2008-04-25', 'Mr. Rajesh Sharma', '', '', '', 7, 2, 0, '526', '85422afb467e9456013a2a51d4dff702', '9829624408, 7737667473', '', '', '', '', '', '', 0, '2017-06-17 11:30:17', 0),
(383, 1, 5, 'Mast. Dev Kaneria', '2007-12-18', 'Mr. Ajay Kaneria', '', '', '', 7, 2, 0, '433', '019d385eb67632a7e958e23f24bd07d7', '9829872672, 9571858896', '', '', '', '', '', '', 0, '2017-06-17 11:30:17', 0),
(384, 1, 5, 'Miss Drishti Lodha', '2007-12-30', 'Mr. Ganesh Kumar Lodha', '', '', '', 7, 2, 0, '463', '428fca9bc1921c25c5121f9da7815cde', '7737667493, 7737260266', '', '', '', '', '', '', 0, '2017-06-17 11:30:17', 0),
(385, 1, 5, 'Mast. Drona Kumawat', '2008-07-23', 'Mr. Ganesh Lal Kumawat', '', '', '', 7, 2, 0, '443', '13f3cf8c531952d72e5847c4183e6910', '9829846910, 9587700951', '', '', '', '', '', '', 0, '2017-06-17 11:30:17', 0),
(386, 1, 5, 'Mast. Hari Soni', '2009-02-07', 'Mr. Naresh Kumar Soni', '', '', '', 7, 2, 0, '1182', 'f47330643ae134ca204bf6b2481fec47', '9460744505, 7742784343', '', '', '', '', '', '', 0, '2017-06-17 11:30:17', 0),
(387, 1, 5, 'Mast. Havish Maheshwari', '2008-07-31', 'Mr. Pradeep Maheshwari', '', '', '', 7, 2, 0, '479', 'd18f655c3fce66ca401d5f38b48c89af', '9460574515, 7737660028', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(388, 1, 5, 'Mast Idris Bohra', '2007-10-17', 'Mr. Mustafa Hussain', '', '', '', 7, 2, 0, '438', '1651cf0d2f737d7adeab84d339dbabd3', '8058272144, 9024266573', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(389, 1, 5, 'Miss Khushi Maheshwari', '2008-11-26', 'Mr. Sagar Maheshwari', '', '', '', 7, 2, 0, '1131', 'fe709c654eac84d5239d1a12a4f71877', '9829230154, 9414658570', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(390, 1, 5, 'Miss Khushi Sanadhya', '2008-05-26', 'Mr. Sanjay Sanadhya', '', '', '', 7, 2, 0, '815', '71ad16ad2c4d81f348082ff6c4b20768', '9057811305, 8058539543', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(391, 1, 5, 'Miss Mansi Jadiya', '2008-08-30', 'Mr. Chandra Prakash Jadiya', '', '', '', 7, 2, 0, '487', 'a516a87cfcaef229b342c437fe2b95f7', '9828352278, 9783916730', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(392, 1, 5, 'Mast. Naitik Shrimali', '2008-03-27', 'Mr. Hitesh Shrimali', '', '', '', 7, 2, 0, '471', '8e6b42f1644ecb1327dc03ab345e618b', '9928018044, 7568633996', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(393, 1, 5, 'Mast. Nikhil Sharma', '2008-11-27', 'Mr. Yogesh Kumar Sharma', '', '', '', 7, 2, 0, '1176', 'a7d8ae4569120b5bec12e7b6e9648b86', '9460744505, 9461921838', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(394, 1, 5, 'Mast. Prince Madrecha', '2008-03-22', 'Mr. Sanjay Kumar Madrecha', '', '', '', 7, 2, 0, '585', 'a9a1d5317a33ae8cef33961c34144f84', '9950636866, 9461179464', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(395, 1, 5, 'Miss Pushti Sharma', '2008-01-07', 'Mr. Vinod Kumar Sharma', '', '', '', 7, 2, 0, '485', '218a0aefd1d1a4be65601cc6ddc1520e', '9460209493, 9352757195', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(396, 1, 5, 'Mast. Shatrunjay Singh Chouhan', '2008-05-28', 'Mr. Jeevan Singh Chouhan', '', '', '', 7, 2, 0, '817', '31839b036f63806cba3f47b93af8ccb5', '9610992180, 9610989180', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(397, 1, 5, 'Mast. Tanish Bhatia', '2008-04-20', 'Mr. Gaurav Bhatia', '', '', '', 7, 2, 0, '595', '04ecb1fa28506ccb6f72b12c0245ddbc', '9214499909, 8058599909', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(398, 1, 5, 'Miss Tasneem Lohawala', '2008-05-23', 'Mr. Mustafa Lohawala', '', '', '', 7, 2, 0, '523', '2bb232c0b13c774965ef8558f0fbd615', '9414926452, 8233370712', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(399, 1, 5, 'Mast. Unnat Gurjar', '2009-06-30', 'Mr. Yogesh Gurjar', '', '', '', 7, 2, 0, '532', '298f95e1bf9136124592c8d4825a06fc', '9214176537, 7568634524', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(400, 1, 5, 'Mast. Yashraj Singh Rathore', '2010-01-01', 'Mr. Dungar Singh Rathore', '', '', '', 7, 2, 0, '835', '4d5b995358e7798bc7e9d9db83c612a5', '9929649872', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(401, 1, 5, 'Mast. Yatharth Gurjar', '2008-02-29', 'Mr. Manish Gurjar', '', '', '', 7, 2, 0, '505', 'e8c0653fea13f91bf3c48159f7c24f78', '9799725863, 8829973382', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(402, 1, 5, 'Mast. Piyush Chaplot', '2008-10-26', 'Mr. Nirmal Chaplot', '', '', '', 7, 2, 0, '650', '884d247c6f65a96a7da4d1105d584ddd', '9413313699, 9414905247', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(403, 1, 5, 'Mast. Aryan', '2008-04-05', 'Mr. Subodh Kumar Lodha', '', '', '', 7, 2, 0, '1238', 'd38901788c533e8286cb6400b40b386d', '7728885945, 8130822212', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(405, 1, 5, 'Miss Aarya Agrawal ', '2008-01-16', 'Mr. Mukesh Agrawal', '', '', '', 7, 1, 0, '447', '9a96876e2f8f3dc4f3cf45f02c61c0c1', '7728805484, 9468647194', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(406, 1, 5, 'Mast. Abhishek Yadav', '2008-08-09', 'Mr. Jaiprakash Yadav', '', '', '', 7, 1, 0, '630', '9cc138f8dc04cbf16240daa92d8d50e2', '9414232229, 7610963639', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(407, 1, 5, 'Mast. Ankit Meena', '2008-09-01', 'Mr. Ram Prasad Meena', '', '', '', 7, 1, 0, '786', '61b4a64be663682e8cb037d9719ad8cd', '9660155123, 8107244300', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(408, 1, 5, 'Mast. Areen Sanadhya', '2008-06-02', 'Mr. Subhash Chandra Sanadhya', '', '', '', 7, 1, 0, '461', '0353ab4cbed5beae847a7ff6e220b5cf', '9950734630, 8233364630', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(409, 1, 5, 'Mast. Bhavya Soni', '2007-06-02', 'Mr. Pramod Soni', '', '', '', 7, 1, 0, '749', 'b056eb1587586b71e2da9acfe4fbd19e', '9799071006, 8769458900', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(410, 1, 5, 'Miss Chahal Bhandari', '2008-06-28', 'Mr. Chandra Prakash Bhandari', '', '', '', 7, 1, 0, '805', '846c260d715e5b854ffad5f70a516c88', '9314485444, 9509633577', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(411, 1, 5, 'Mast. Darshil Boliwal', '2008-08-19', 'Mr. Kamla Shankar Boliwal', '', '', '', 7, 1, 0, '902', 'b6a1085a27ab7bff7550f8a3bd017df8', '8764138604, 9414654328', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(413, 1, 5, 'Miss Dixita Lakhara', '2008-01-15', 'Mr. Narendra Lakhara', '', '', '', 7, 1, 0, '542', '7dcd340d84f762eba80aa538b0c527f7', '9252272245, 9928769445', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(414, 1, 5, 'Miss Fatima ', '2008-10-24', 'Mr. Murtaza', '', '', '', 7, 1, 0, '832', '7250eb93b3c18cc9daa29cf58af7a004', '7737671252, 9829161151', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(415, 1, 5, 'Mast. Harshit Keer', '2009-02-19', 'Mr. Krishan Lal Keer', '', '', '', 7, 1, 0, '1110', '2cbca44843a864533ec05b321ae1f9d1', '9460969171, 9414915908', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(416, 1, 5, 'Miss Harshita Tailor', '2006-10-15', 'Mr. Bheru Lal Tailor', '', '', '', 7, 1, 0, '772', 'e57c6b956a6521b28495f2886ca0977a', '9549571399, 8107786610', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(417, 1, 5, 'Miss Jigisha Kataria', '2008-08-15', 'Mr. Abhishek Kataria', '', '', '', 7, 1, 0, '565', 'cbcb58ac2e496207586df2854b17995f', '9571264166, 8239691920', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(418, 1, 5, 'Mast. Latavya Pokhra', '2008-08-22', 'Mr. Kamal Pokhra', '', '', '', 7, 1, 0, '638', '4c27cea8526af8cfee3be5e183ac9605', '9414372115, 9460211766', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(419, 1, 5, 'Mast. Madhav Shrimali', '2008-01-25', 'Mr. Dinesh Shrimali', '', '', '', 7, 1, 0, '547', 'c75b6f114c23a4d7ea11331e7c00e73c', '9928081418, 9782695518', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(420, 1, 5, 'Mast. Manan Gurjar', '2007-12-01', 'Mr. Manish Gurjar', '', '', '', 7, 1, 0, '492', '55a7cf9c71f1c9c495413f934dd1a158', '9829923888, 9001602388', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(421, 1, 5, 'Miss Nandini Lakhotia', '2007-11-12', 'Mr. Jagdish Lakhotia', '', '', '', 7, 1, 0, '469', 'dc6a6489640ca02b0d42dabeb8e46bb7', '9928361500, 8769050141', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(422, 1, 5, 'Mast. Piyush Chandak', '2008-08-05', 'Mr. Laxmi Kant Chandak', '', '', '', 7, 1, 0, '1163', '6e7d2da6d3953058db75714ac400b584', '9414232686, 7014179342', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(423, 1, 5, 'Miss Priyanshi Audichya', '2007-11-07', 'Mr. Vitthal Audichya', '', '', '', 7, 1, 0, '503', '285e19f20beded7d215102b49d5c09a0', '9950615511, 9694283075', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(424, 1, 5, 'Miss Priyanshi Tak', '2008-05-15', 'Mr. Bhagwati Lal Tak', '', '', '', 7, 1, 0, '539', '5737034557ef5b8c02c0e46513b98f90', '9785681664, 9928540921', '', '', '', '', '', '', 0, '2017-06-17 11:30:18', 0),
(425, 1, 5, 'Mast. Rishiraj Singh Chouhan', '2008-02-07', 'Mr. Ganpat Singh Chouhan', '', '', '', 7, 1, 0, '482', 'f770b62bc8f42a0b66751fe636fc6eb0', '9460209565, 8058200175', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(426, 1, 5, 'Miss Saanchi Ajmera', '2008-12-05', 'Mr. Vikas Ajmera', '', '', '', 7, 1, 0, '698', '99bcfcd754a98ce89cb86f73acc04645', '9414353839, 9462625100', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(427, 1, 5, 'Miss Samiksha Sanadhya', '2007-05-12', 'Mr. Mahesh Sanadhya', '', '', '', 7, 1, 0, '528', 'f4be00279ee2e0a53eafdaa94a151e2c', '9929097455, 9414553763', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(428, 1, 5, 'Mast. Shubh Kogta', '2008-12-31', 'Mr. Lokesh Kogta', '', '', '', 7, 1, 0, '681', '1595af6435015c77a7149e92a551338e', '8561914148, 7597492611', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(429, 1, 5, 'Mast. Hanudra Sharma', '2007-10-04', '', '', '', '', 7, 1, 0, '498', '05f971b5ec196b8c65b75d2ef8267331', '9680171028, 9929111658', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(430, 1, 5, 'Miss Aastha Soni', '2008-02-12', 'Mr. Tilkesh Soni', '', 'Gokul Nagar, Lal Baag, Nathdwara', '', 7, 3, 0, '471', '8e6b42f1644ecb1327dc03ab345e618b', '9414343211, 9413574273', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(431, 1, 5, 'Mast. Ali Akber Lohawala', '2008-01-14', 'Mr. Shabbir Hussain', '', 'Tehsil Road, Nathdwara', '', 7, 3, 0, '792', '96ea64f3a1aa2fd00c72faacf0cb8ac9', '9829196105, 9829196105', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(432, 1, 5, 'Mast. Bhavya Paliwal', '2008-08-14', 'Mr. Pankaj Paliwal', '', 'Behind Lal Baag Hospital, Nathdwara', '', 7, 3, 0, '489', '854d9fca60b4bd07f9bb215d59ef5561', '9799761802, 8290129495', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(433, 1, 5, 'Miss Bhavya Sharma', '2008-06-20', 'Mr. Sanjay Kumar Sharma', '', 'Anand Nagar, Lal Baag, Nathdwara', '', 7, 3, 0, '516', 'f3f27a324736617f20abbf2ffd806f6d', '9828050905, 9587381508', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(434, 1, 5, 'Mast. Bhupesh Gujarati', '2008-05-24', 'Mr. Durgesh Gujarati', '', 'Near Hanuman Ji Temple, Sinhad, Nathdwara', '', 7, 3, 0, '568', 'dd458505749b2941217ddd59394240e8', '9829471141, 9602462304', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(435, 1, 5, 'Mast. Devkrishna Parihar', '2007-08-31', 'Mr. Chandan Singh Parihar', '', 'Bohra Bazar, Nathdwara', '', 7, 3, 0, '465', '68ce199ec2c5517597ce0a4d89620f55', '9950839947, 9602776660', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(436, 1, 5, 'Mast. Hussain Bohra', '2007-09-30', 'Mr. Burhanuddin Bohra', '', 'Bohra Bazar, Near Bohra Gati, Nathdwara', '', 7, 3, 0, '437', 'fccb60fb512d13df5083790d64c4d5dd', '7737675164', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(437, 1, 5, 'Miss Jhanvi Purohit', '2008-01-09', 'Mr. Mangilal Purohit', '', 'Friends Colony, Lal Baag, Nathdwara', '', 7, 3, 0, '544', '97e8527feaf77a97fc38f34216141515', '9001680792, 9799127310', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(438, 1, 5, 'Miss Kanishka Tak', '2008-01-10', 'Mr. Bharat Kumar Tak', '', 'Near Hanuman Temple, Sinhad, Nathdwara', '', 7, 3, 0, '546', 'ed265bc903a5a097f61d3ec064d96d2e', '9785454815, 8094617455', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(439, 1, 5, 'Miss Kritika Bolia', '2008-03-14', 'Mr. Ramesh Bolia', '', 'Shanti Colony, Nai Aabadi, Kankroli', '', 7, 3, 0, '1062', 'cd89fef7ffdd490db800357f47722b20', '9413663881, 7597764829', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(440, 1, 5, 'Mast. Lavish Tuklia', '2008-09-18', 'Mr. Vijay Tuklia', '', 'Holithada, J.K. Mode, Kankroli', '', 7, 3, 0, '957', '2ba596643cbbbc20318224181fa46b28', '7737832228, 9785155508', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(441, 1, 5, 'Mast. Mayank Suthar', '2008-03-19', 'Mr. Dinesh Suthar', '', 'Shreenath Colony (A), Nathdwara', '', 7, 3, 0, '816', '43fa7f58b7eac7ac872209342e62e8f1', '8769669880,', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(442, 1, 5, 'Miss Mudrika Maheshwari', '2007-12-02', 'Mr. Basant Maheshwari', '', 'C - 41, Housing Board Colony, Sukhadiya Nagar', '', 7, 3, 0, '453', '49ae49a23f67c759bf4fc791ba842aa2', '9214126210, 7737665305', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(443, 1, 5, 'Miss Nehal Goswami', '2008-05-20', 'Mr. Guru Govind Bharti', '', 'Bharati Bhawan, Niche Ka Chowk, Mohangarh, Nathdwara', '', 7, 3, 0, '833', '013a006f03dbc5392effeb8f18fda755', '9785659805', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(444, 1, 5, 'Mast. Nilansh Maheshwari', '2008-05-21', 'Mr. Bharat Maheshwari', '', 'Behind Swaminarayan Temple, Bus Stand, Nathdwara', '', 7, 3, 0, '440', 'a8abb4bb284b5b27aa7cb790dc20f80b', '9414171253, 8769007404', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(445, 1, 5, 'Miss Padmshree Jain', '2008-07-10', 'Mr. Somil Jain', '', 'Mukharji Chouraha, Jain Hospital, Kankroli', '', 7, 3, 0, '956', '168908dd3227b8358eababa07fcaf091', '9829445480, 9461045480', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(446, 1, 5, 'Mast. Parth Audichya', '2008-03-23', 'Mr. Devishankar Audichya', '', 'Lal Baag, Shiv Nagar, Kothariya Road, Nathdwara', '', 7, 3, 0, '569', '8b16ebc056e613024c057be590b542eb', '9829614906, 9602462411', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(447, 1, 5, 'Miss Priyanshi Sanadhya', '2008-10-27', 'Mr. Gopesh Sanadhya', '', 'Near Sundervilas, Nathdwara', '', 7, 3, 0, '481', '9461cce28ebe3e76fb4b931c35a169b0', '9461375067, 9351148253', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(448, 1, 5, 'Miss Shrishtiraj Purohit', '2007-11-22', 'Mr. Narpat Singh Purohit', '', 'Arihant Plaza, Bus Stand, Ntd.', '', 7, 3, 0, '548', '8d34201a5b85900908db6cae92723617', '9587703594, 9414436348', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(449, 1, 5, 'Mast. Sumit Bolia', '2008-02-08', 'Mr. Vinay Bolia', '', 'Manglam Auto Parts, Mukharji Chouraha, Kankroli', '', 7, 3, 0, '1068', '53adaf494dc89ef7196d73636eb2451b', '9413663881, 7597579517', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(450, 1, 5, 'Miss Tanisha Surana', '2008-08-08', 'Mr. Manish Surana', '', 'Near Ankur School, Bagarwada, Nathdwara', '', 7, 3, 0, '500', 'cee631121c2ec9232f3a2f028ad5c89b', '9829517011, 9929734042', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(451, 1, 5, 'Miss Varsha Inani', '2008-01-18', 'Mr. Mahesh Kumar Inani', '', 'Modiyon Ki Khidak, Lodha Gati, Nathdwara', '', 7, 3, 0, '524', 'ba2fd310dcaa8781a9a652a31baf3c68', '9352323203, 9314295151', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(455, 1, 5, 'Miss Aditi Maheshwari', '2007-02-22', 'Mr. Pradeep Maheshwari', '', '4 - J Sukhadiya Nagar, Nathdwara', '', 8, 2, 0, '354', '8dd48d6a2e2cad213179a3992c0be53c', '7737675128, 7737660028', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(456, 1, 5, 'Mast. Bharat Singh Solanki', '2007-06-30', 'Mr. Gamer Singh Solanki', '', 'Police Quarter, Nathuwas, Nathdwara', '', 8, 2, 0, '1021', '0768281a05da9f27df178b5c39a51263', '9414220801, 9462565867', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(457, 1, 5, 'Miss Bhuvi Kawdia', '2007-01-17', 'Mr. Sanjay Kawdia', '', 'Mahveer Nagar, Rajsamand', '', 8, 2, 0, '898', 'a64c94baaf368e1840a1324e839230de', '9772355000, 9462107206', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(458, 1, 5, 'Mast. Dev Shrimali', '2007-08-29', 'Mr. Yogesh Shrimali', '', 'Vinayak Vihar Colony, Nathdwara', '', 8, 2, 0, '340', '40008b9a5380fcacce3976bf7c08af5b', '9414232494', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(459, 1, 5, 'Miss Divdarshini Ranawat', '2007-07-07', 'Mr. Narendra Singh Ranawat', '', 'Kuncholi, Bagol, Nathdwara', '', 8, 2, 0, '329', '6faa8040da20ef399b63a72d0e4ab575', '7693071977, 9929042533', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(460, 1, 5, 'Mast. Gourav Nagda', '2006-08-10', 'Mr. Nana Lal Nagda', '', 'Shiv Nagar, Lal Baag, Nathdwara', '', 8, 2, 0, '553', 'f387624df552cea2f369918c5e1e12bc', '9784804433, 9784211365', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(461, 1, 5, 'Mast. Hardik Gurjar', '2007-02-01', 'Mr. Deepak Gurjar', '', 'Meera Nagar, Nathdwara', '', 8, 2, 0, '356', '6c524f9d5d7027454a783c841250ba71', '9214697532, 9314298904', '', '', '', '', '', '', 0, '2017-06-17 11:30:19', 0),
(462, 1, 5, 'Mast. Jatin Sanadhya', '2006-09-05', 'Mr. Kapil Sanadhya', '', 'Behind Choudhary Petrol Pump, Nathdwara', '', 8, 2, 0, '495', '35051070e572e47d2c26c241ab88307f', '9352735450, 9799128028', '', '', '', '', '', '', 0, '2017-06-17 11:30:20', 0),
(463, 1, 5, 'Mast. Jay Chaplot', '2007-09-22', 'Mr. Bhavesh Chaplot', '', 'Mahaveerpura, Nathdwara', '', 8, 2, 0, '615', '58d4d1e7b1e97b258c9ed0b37e02d087', '7568866199, 9414171299', '', '', '', '', '', '', 0, '2017-06-17 11:30:20', 0),
(464, 1, 5, 'Mast. Jay Dadheech', '2008-11-08', 'Mr. Neeraj Dadheech', '', 'Fauz Mohalla, Nathdwara', '', 8, 2, 0, '420', 'b6f0479ae87d244975439c6124592772', '8947024751, 9887884651', '', '', '', '', '', '', 0, '2017-06-17 11:30:20', 0),
(465, 1, 5, 'Mast. Krishna Sharma', '2007-01-30', 'Mr. Rajesh Sharma', '', 'Sukhadiya Nagar, Nathdwara', '', 8, 2, 0, '1202', '147702db07145348245dc5a2f2fe5683', '9414264175', '', '', '', '', '', '', 0, '2017-06-17 11:30:20', 0),
(466, 1, 5, 'Mast. Kushagra Singhal', '2007-05-19', 'Mr. Satish Singhal', '', 'Doctor Quarter No. 2/3, R.K. Hospital Campus, Rajsamand', '', 8, 2, 0, '1159', '16e6a3326dd7d868cbc926602a61e4d0', '9460547427, 8560098000', '', '', '', '', '', '', 0, '2017-06-17 11:30:20', 0),
(467, 1, 5, 'Mast. Lakshraj Singh Chundawat', '2007-12-31', 'Mr. Gajendra Singh Chundawat', '', 'Kalaji Goraji Mandir, Panchwati, Kalawati', '', 8, 2, 0, '1179', 'dabd8d2ce74e782c65a973ef76fd540b', '9460444574, 8239250223', '', '', '', '', '', '', 0, '2017-06-17 11:30:20', 0),
(468, 1, 5, 'Mast. Lokendra Vyas', '2007-10-27', 'Mr. Ram Dayal Vyas', '', 'Near Post Office, Kankroli', '', 8, 2, 0, '870', '22fb0cee7e1f3bde58293de743871417', '9829909198, 9784301164', '', '', '', '', '', '', 0, '2017-06-17 11:30:20', 0),
(469, 1, 5, 'Mast. Matul Jain', '2007-01-14', 'Mr. Mukesh Jain', '', '100ft. Road, Ayodhyapuri, Kankroli', '', 8, 2, 0, '795', '7c590f01490190db0ed02a5070e20f01', '7737130411, 9829954630', '', '', '', '', '', '', 0, '2017-06-17 11:30:20', 0),
(470, 1, 5, 'Mast. Mehul Sharma', '2006-12-11', 'Mr. Dilip Kumar Sharma', '', 'Lal Baag, Nathdwara', '', 8, 2, 0, '613', 'f29c21d4897f78948b91f03172341b7b', '9166762590, 9001370230', '', '', '', '', '', '', 0, '2017-06-17 11:30:20', 0),
(471, 1, 5, 'Mast. Nikhilesh Mali', '2006-12-18', 'Mr. Aditya Mali', '', 'Lal Baag, Nathdwara', '', 8, 2, 0, '417', '41ae36ecb9b3eee609d05b90c14222fb', '9414171181, 9414251591', '', '', '', '', '', '', 0, '2017-06-17 11:30:20', 0),
(472, 1, 5, 'Miss Nishtha Mehta', '2007-07-25', 'Mr. Vinod Mehta', '', 'Maheshwari Mohalla, Rajnagar, Rajsamand, (Raj.)', '', 8, 2, 0, '1117', '0eec27c419d0fe24e53c90338cdc8bc6', '9414174867, 9413574867', '', '', '', '', '', '', 0, '2017-06-17 11:30:20', 0),
(473, 1, 5, 'Mast. Parth Parikh', '2006-12-13', 'Mr. Late Manish Parikh', '', 'Setho Ka Paysa, Mandir Marg. Nathdwara', '', 8, 2, 0, '506', 'ff4d5fbbafdf976cfdc032e3bde78de5', '9636691974', '', '', '', '', '', '', 0, '2017-06-17 11:30:20', 0),
(474, 1, 5, 'Miss Pratishtha Singh Choudhary', '2008-01-11', 'Mr. Yogesh Singh Choudhary', '', 'Rawto Ka Darwaja, Nathdwara', '', 8, 2, 0, '350', '9de6d14fff9806d4bcd1ef555be766cd', '8823990990, 9610301876', '', '', '', '', '', '', 0, '2017-06-17 11:30:20', 0),
(475, 1, 5, 'Miss Raghavi Gurjar', '2006-12-15', 'Mr. Deepak Gurjar', '', 'Jarna Darwaja, Nathdwara', '', 8, 2, 0, '394', '28f0b864598a1291557bed248a998d4e', '9929827289, 9680462646', '', '', '', '', '', '', 0, '2017-06-17 11:30:20', 0),
(476, 1, 5, 'Mast. Rajyavardhan Singh Chouhan', '2007-07-05', 'Mr. Kesar Singh Chouhan', '', 'Kalla Khedi, Gunjol, Nathdwara', '', 8, 2, 0, '428', '8d7d8ee069cb0cbbf816bbb65d56947e', '9602160353, 7221911915', '', '', '', '', '', '', 0, '2017-06-17 11:30:20', 0),
(477, 1, 5, 'Mast. Rakshit Bhatia', '2006-08-01', 'Mr. Sanjay Bhatia', '', 'Bichu Mangri, Nathdwara', '', 8, 2, 0, '484', 'eba0dc302bcd9a273f8bbb72be3a687b', '8696181535, 9784593802', '', '', '', '', '', '', 0, '2017-06-17 11:30:20', 0),
(478, 1, 5, 'Mast. Ronak Sukhlecha', '2006-07-05', 'Mr. Rajendra Kumar Sukhlecha', '', 'J.K. Mode, Kankroli', '', 8, 2, 0, '755', 'ccb0989662211f61edae2e26d58ea92f', '02952-221555, 9414741255', '', '', '', '', '', '', 0, '2017-06-17 11:30:20', 0),
(479, 1, 5, 'Mast. Taksh Dhoka', '2008-01-30', 'Mr. Ranjeet Dhoka', '', 'Kothari Mohalla, Rajnagar', '', 8, 2, 0, '1095', 'd6723e7cd6735df68d1ce4c704c29a04', '9928711234, 9660505999', '', '', '', '', '', '', 0, '2017-06-17 11:30:20', 0),
(480, 1, 5, 'Mast. Vatsal Lakhotia', '2007-12-22', 'Mr. Shyamsunder Lakhotia', '', 'Naniji Ka Baag, Nathdwara', '', 8, 2, 0, '706', '9c82c7143c102b71c593d98d96093fde', '9352733263, 9351456763', '', '', '', '', '', '', 0, '2017-06-17 11:30:20', 0),
(481, 1, 5, 'Mast. Vikrant Singh Kumawat', '2007-03-23', 'Mr. Balram Singh Kumawat', '', 'Fauz Mohalla, Nathdwara', '', 8, 2, 0, '342', '58238e9ae2dd305d79c2ebc8c1883422', '9166203364, 9636440484', '', '', '', '', '', '', 0, '2017-06-17 11:30:20', 0),
(482, 1, 5, 'Miss Dhruvika Singh', '2006-10-13', 'Mr. Shoorveer Singh', '', 'Sukhadiya Nagar, Nathdwara', '', 8, 3, 0, '451', '941e1aaaba585b952b62c14a3a175a61', '9414343880, 9799932166', '', '', '', '', '', '', 0, '2017-06-17 11:30:20', 0),
(483, 1, 5, 'Mast. Hemang Shrimali', '2007-03-27', 'Mr. Bhagwati Prasad Shrimali', '', 'Panchratan Complex, Kankroli', '', 8, 3, 0, '917', 'da0d1111d2dc5d489242e60ebcbaf988', '7737892419, 7737470047', '', '', '', '', '', '', 0, '2017-06-17 11:30:21', 0),
(484, 1, 5, 'Mast. Himanshu Khandelwal', '2008-11-30', 'Mr. Yagyanarayan Sharma', '', 'Panchratan Complex, Kankroli', '', 8, 3, 0, '1031', 'afdec7005cc9f14302cd0474fd0f3c96', '9413762864, 02952-221701', '', '', '', '', '', '', 0, '2017-06-17 11:30:21', 0),
(485, 1, 5, 'Mast. Jinit Sharma', '2007-07-02', 'Mr. Rajneesh Sharma', '', 'Ice Factory, Nai Haveli Chock, Nathdwara', '', 8, 3, 0, '328', 'cd00692c3bfe59267d5ecfac5310286c', '9413286069, 8233308818', '', '', '', '', '', '', 0, '2017-06-17 11:30:21', 0),
(486, 1, 5, 'Miss Khushi Bagora', '2007-04-12', 'Mr. Rajesh Bagora', '', 'Sukhadiya Nagar, Nathdwara', '', 8, 3, 0, '711', '6081594975a764c8e3a691fa2b3a321d', '8239771111, 9694544428', '', '', '', '', '', '', 0, '2017-06-17 11:30:21', 0),
(487, 1, 5, 'Miss Kritika Purohit', '2007-07-12', 'Mr. Bheru Lal Purohit', '', 'Yamuna Vihar Colony, Nathdwara', '', 8, 3, 0, '618', 'eb6fdc36b281b7d5eabf33396c2683a2', '9799290508', '', '', '', '', '', '', 0, '2017-06-17 11:30:21', 0),
(488, 1, 5, 'Mast. Rajdeep Singh Shaktawat', '2006-09-29', 'Mr. Dilip Singh Shaktawat', '', 'Near Jawad By Pass, Kankroli', '', 8, 3, 0, '909', 'a4300b002bcfb71f291dac175d52df94', '9414927294, 9460170216', '', '', '', '', '', '', 0, '2017-06-17 11:30:21', 0),
(489, 1, 5, 'Mast. Suryadev Singh', '2007-04-20', 'Mr. Unkar Singh', '', 'Uriya, Nathdwara', '', 8, 3, 0, '1205', 'b571ecea16a9824023ee1af16897a582', '9929425222, 9783429007', '', '', '', '', '', '', 0, '2017-06-17 11:30:21', 0),
(490, 1, 5, 'Miss Tanvi Verma', '2007-03-08', 'Mr. Chandrashekhar Verma', '', 'Pipli Chouraha, Nathuwas', '', 8, 3, 0, '339', '04025959b191f8f9de3f924f0940515f', '9784785866, 9772311711', '', '', '', '', '', '', 0, '2017-06-17 11:30:21', 0),
(491, 1, 5, 'Mast. Vaibhav Shrimali', '2007-05-18', 'Mr. Kailash Chandra Shrimali', '', 'Chintamani Ka Madra, Farara, Rajsamand', '', 8, 3, 0, '988', '9908279ebbf1f9b250ba689db6a0222b', '8875028010, 7412955605', '', '', '', '', '', '', 0, '2017-06-17 11:30:21', 0),
(492, 1, 5, 'Mast. Annay Laddha', '2007-02-17', 'Mr. Sunil Laddha', '', ' ''Matra Shree'' Pratap Chouraha, Rajsamand', '', 8, 3, 0, '1036', '83fa5a432ae55c253d0e60dbfa716723', '9414171658, 8955771658', '', '', '', '', '', '', 0, '2017-06-17 11:30:21', 0),
(493, 1, 5, 'Miss Dikshika Mali', '2007-04-17', 'Mr. Ghanshyam Mali', '', 'Girirajpura, Nathdwara', '', 8, 3, 0, '402', '69cb3ea317a32c4e6143e665fdb20b14', '9024524236, 8696962585', '', '', '', '', '', '', 0, '2017-06-17 11:30:21', 0),
(494, 1, 5, 'Miss Divyanshi Singh Rao', '2007-08-03', 'Mr. Sandeep Singh Rao', '', 'Friends Colony, Lal Baag, Nathdwara', '', 8, 3, 0, '590', '08b255a5d42b89b0585260b6f2360bdd', '9414264472, 9602793640', '', '', '', '', '', '', 0, '2017-06-17 11:30:21', 0),
(495, 1, 5, 'Miss Mansvi Makhija', '2007-08-13', 'Mr. Kamlesh Makhija', '', 'Rampura, Govind Chowk, Nathdwara', '', 8, 3, 0, '432', '248e844336797ec98478f85e7626de4a', '9672626680, 9460886736', '', '', '', '', '', '', 0, '2017-06-17 11:30:21', 0),
(496, 1, 5, 'Miss Munira Bohra', '2007-02-19', 'Mr. Abbas Ali Bootwala', '', 'High Sec. School, Fauj Mohalla, Nathdwara', '', 8, 3, 0, '367', '05049e90fa4f5039a8cadc6acbb4b2cc', '9414263580, 8239703883', '', '', '', '', '', '', 0, '2017-06-17 11:30:21', 0),
(497, 1, 5, 'Mast. Pranav Joshi', '2006-09-23', 'Mr. Prakash Chandra Joshi', '', 'Sukhadia Nagar, Nathdwara', '', 8, 3, 0, '335', 'f9b902fc3289af4dd08de5d1de54f68f', '9001822300, 9462022920', '', '', '', '', '', '', 0, '2017-06-17 11:30:21', 0),
(498, 1, 5, 'Miss Priya Mali', '2007-03-07', 'Mr. Sheshnarayan Mali', '', 'Lal Baag, Jhankar Complex, Nathdwara', '', 8, 3, 0, '407', 'f4f6dce2f3a0f9dada0c2b5b66452017', '9929506683, 9782073111', '', '', '', '', '', '', 0, '2017-06-17 11:30:21', 0),
(499, 1, 5, 'Miss Samridhi Khandelwal', '2007-09-24', 'Mr. Yugal Kishore Khandelwal', '', 'Rawton Ka Darwaja, Bus Stand Road, Nathdwara', '', 8, 3, 0, '597', '08c5433a60135c32e34f46a71175850c', '9829508555, 8769442659', '', '', '', '', '', '', 0, '2017-06-17 11:30:21', 0),
(500, 1, 5, 'Mast. Bhavishya Choudhary', '2008-01-06', 'Mr. Surendra Kumar', '', '100ft. Road, Rajsamand', '', 8, 3, 0, '1227', 'c4851e8e264415c4094e4e85b0baa7cc', '9402202607, 9828540351', '', '', '', '', '', '', 0, '2017-06-17 11:30:21', 0);
INSERT INTO `login` (`id`, `user_id`, `role_id`, `name`, `dob`, `father_name`, `mother_name`, `address`, `roll_no`, `class_id`, `section_id`, `medium`, `eno`, `password`, `mobile_no`, `father_mobile`, `mother_mobile`, `otp`, `notification_key`, `device_token`, `image`, `school_id`, `curent_date`, `flag`) VALUES
(502, 1, 5, 'Miss Avani Maheshwari', '2006-09-05', 'Mr. Lalit Mundra', '', '45, Above Old Excise Office, (Raj.)', '', 9, 2, 0, '899', '01882513d5fa7c329e940dda99b12147', '9414174803, 9462677373', '', '', '', '', '', '', 0, '2017-06-17 11:30:21', 0),
(503, 1, 5, 'Mast. Ayush Bohara', '2006-04-29', 'Mr. Jitendra Bohra', '', 'Balaji Kirana Store, Tehsil Road, Nathdwara', '', 9, 2, 0, '601', 'b2f627fff19fda463cb386442eac2b3d', '9890038010, 9530360075', '', '', '', '', '', '', 0, '2017-06-17 11:30:21', 0),
(504, 1, 5, 'Miss Bhavya Sharma', '2004-07-11', 'Mr. Lokendra Sharma', '', 'Mahadev Ji Ki Ghati, Bhimgadi, Nathdwara', '', 9, 2, 0, '1113', '9c3b1830513cc3b8fc4b76635d32e692', '9829029067, 8769542121', '', '', '', '', '', '', 0, '2017-06-17 11:30:21', 0),
(505, 1, 5, 'Miss Bhumii Bhatia', '2005-11-06', 'Mr. Anoop Kumar Bhatia', '', 'Mohangarh, Nathdwara', '', 9, 2, 0, '210', '6f3ef77ac0e3619e98159e9b6febf557', '9414343022, 9252063333', '', '', '', '', '', '', 0, '2017-06-17 11:30:21', 0),
(506, 1, 5, 'Mast. Dipesh jain', '2005-09-18', 'Mr. Pankaj Jain', '', 'Siddivinayak Appartment, Sinhad, Nathdwara', '', 9, 2, 0, '212', '1534b76d325a8f591b52d302e7181331', '9414353410, 9414867139', '', '', '', '', '', '', 0, '2017-06-17 11:30:21', 0),
(507, 1, 5, 'Miss Diya Parikh', '2006-03-02', 'Mr. Harish Parikh', '', 'Setho Ka Paysa, Mandir Marg. Nathdwara', '', 9, 2, 0, '435', 'ddb30680a691d157187ee1cf9e896d03', '9983391139, 9460838991', '', '', '', '', '', '', 0, '2017-06-17 11:30:22', 0),
(508, 1, 5, 'Mast. Harsh Jain', '2006-03-12', 'Mr. Rajendra Jain', '', 'Aadarsh Nagar, Tehsil Road, Nathdwara', '', 9, 2, 0, '213', '979d472a84804b9f647bc185a877a8b5', '9829371678, 9413134666', '', '', '', '', '', '', 0, '2017-06-17 11:30:22', 0),
(509, 1, 5, 'Miss Harshita Chaplot', '2006-04-08', 'Mr. Nirmal Chaplot', '', 'Mahaveerpura, Nathdwara', '', 9, 2, 0, '214', 'ca46c1b9512a7a8315fa3c5a946e8265', '9413313699, 9414905247', '', '', '', '', '', '', 0, '2017-06-17 11:30:22', 0),
(510, 1, 5, 'Mast. Hitanshu Golani', '2006-05-31', 'Mr. Mahendra Golani', '', 'Sindhi Colony, Nathdwara', '', 9, 2, 0, '383', 'beed13602b9b0e6ecb5b568ff5058f07', '9829040836, 9509840836', '', '', '', '', '', '', 0, '2017-06-17 11:30:22', 0),
(511, 1, 5, 'Mast. Ishan Bohra', '2005-12-14', 'Mr. Purushottam Bohra', '', 'Near Private Bus Stand, Nathdwara', '', 9, 2, 0, '319', '8d3bba7425e7c98c50f52ca1b52d3735', '9414343103, 8875521305', '', '', '', '', '', '', 0, '2017-06-17 11:30:22', 0),
(512, 1, 5, 'Mast. Kanishk Jain', '2006-06-26', 'Mr. Rajendra Jain', '', 'Shiv Temple, Lal Baag, Nathdwara', '', 9, 2, 0, '739', 'df263d996281d984952c07998dc54358', '9414171485, 8003185512', '', '', '', '', '', '', 0, '2017-06-17 11:30:22', 0),
(513, 1, 5, 'Miss Khushi Kanwar', '2006-10-03', 'Mr. Loomb Singh', '', 'Police Line, Rajnagar', '', 9, 2, 0, '873', '98d6f58ab0dafbb86b083a001561bb34', '9414935350, 9928774187', '', '', '', '', '', '', 0, '2017-06-17 11:30:22', 0),
(514, 1, 5, 'Mast. Krish Jain', '2006-10-17', 'Mr. Satish Jain', '', 'Mahaveerpura, Nathdwara', '', 9, 2, 0, '656', '26408ffa703a72e8ac0117e74ad46f33', '9461259498, 8947924250', '', '', '', '', '', '', 0, '2017-06-17 11:30:22', 0),
(515, 1, 5, 'Mast. Kunal Lodha', '2006-03-08', 'Mr. Ujjwal Prakash Lodha', '', 'Gokul Plaza, New Road, Nathdwara', '', 9, 2, 0, '259', 'cfa0860e83a4c3a763a7e62d825349f7', '9414343899, 9462678570', '', '', '', '', '', '', 0, '2017-06-17 11:30:22', 0),
(516, 1, 5, 'Mast. Kunal Meena', '2005-05-12', 'Mr. Shankar Meena', '', 'Behind Alok School, Dhoinda', '', 9, 2, 0, '1079', '43baa6762fa81bb43b39c62553b2970d', '9928059130, 9929629812', '', '', '', '', '', '', 0, '2017-06-17 11:30:22', 0),
(517, 1, 5, 'Miss Muskan Sahu', '2006-07-11', 'Mr. Satyanarayan Sahu', '', 'Naya Bazar, Kankroli', '', 9, 2, 0, '1138', 'c3e0c62ee91db8dc7382bde7419bb573', '9166843028, 9829346674', '', '', '', '', '', '', 0, '2017-06-17 11:30:22', 0),
(518, 1, 5, 'Miss Nandini Soni', '2006-04-16', 'Mr. Mukesh Soni', '', 'Mohangarh Uper Ka Chowk, Nathdwara', '', 9, 2, 0, '1139', '184260348236f9554fe9375772ff966e', '9571461920, 9166478915', '', '', '', '', '', '', 0, '2017-06-17 11:30:22', 0),
(519, 1, 5, 'Mast. Nihal Jain', '2006-07-08', 'Mr. Suresh Jain', '', 'Lal Baag, Nathdwara', '', 9, 2, 0, '216', '45fbc6d3e05ebd93369ce542e8f2322d', '9602207950, 7023047127', '', '', '', '', '', '', 0, '2017-06-17 11:30:22', 0),
(520, 1, 5, 'Miss Nishka Jain', '2006-06-26', 'Mr. Lalit Jain', '', 'Opposite Post Office, Nathdwara', '', 9, 2, 0, '235', '577ef1154f3240ad5b9b413aa7346a1e', '9414343046, 9610006010', '', '', '', '', '', '', 0, '2017-06-17 11:30:22', 0),
(521, 1, 5, 'Mast. Nitesh Kumar Meena', '2006-07-21', 'Mr. Mahendra Kumar Meena', '', 'Police Quarter ND - 1, Nathuwas, Nathdwara', '', 9, 2, 0, '1093', '68b1fbe7f16e4ae3024973f12f3cb313', '9587773730, 9667761929', '', '', '', '', '', '', 0, '2017-06-17 11:30:22', 0),
(522, 1, 5, 'Mast. Pawan Bhatia', '2006-04-13', 'Mr. Prakash Bhatia', '', 'Lad Parishad, Sukhadiya Nagar, Nathdwara', '', 9, 2, 0, '734', 'e995f98d56967d946471af29d7bf99f1', '9829447222, 9680590902', '', '', '', '', '', '', 0, '2017-06-17 11:30:22', 0),
(523, 1, 5, 'Mast. Raghvendra Paliwal', '2006-12-17', 'Mr. Komal Paliwal', '', 'Govind Chowk, Nathdwara', '', 9, 2, 0, '653', 'eaae339c4d89fc102edd9dbdb6a28915', '9352934244, 8094589409', '', '', '', '', '', '', 0, '2017-06-17 11:30:22', 0),
(524, 1, 5, 'Miss Ritika Shrimali', '2006-03-17', 'Mr. Roshan Lal Shrimali', '', 'Shrinath Colony, Nathdwara', '', 9, 2, 0, '267', 'eda80a3d5b344bc40f3bc04f65b7a357', '9799937601, 9799575991', '', '', '', '', '', '', 0, '2017-06-17 11:30:22', 0),
(525, 1, 5, 'Miss Reetu Joshi', '2005-11-01', 'Mr. Ramesh Chandra Joshi', '', 'Nathuwas, Nathdwara', '', 9, 2, 0, '415', '42e7aaa88b48137a16a1acd04ed91125', '9680334998, 9610257187', '', '', '', '', '', '', 0, '2017-06-17 11:30:22', 0),
(526, 1, 5, 'Mast. Rohit Paliwal', '2006-10-06', 'Mr. Vijay Paliwal', '', 'Shiv Nagar, Kotharia Road, Nathdwara', '', 9, 2, 0, '966', '4e0cb6fb5fb446d1c92ede2ed8780188', '9460029597, 9784499399', '', '', '', '', '', '', 0, '2017-06-17 11:30:22', 0),
(527, 1, 5, 'Mast. Sahil Bhatia', '2005-03-09', 'Mr. Prakash Bhatia', '', 'Lad Parishad, Sukhadiya Nagar, Nathdwara', '', 9, 2, 0, '385', 'dc912a253d1e9ba40e2c597ed2376640', '9829447222, 9680590902', '', '', '', '', '', '', 0, '2017-06-17 11:30:22', 0),
(528, 1, 5, 'Miss Shreya Kumawat', '2006-06-25', 'Mr. Pravin Kumawat', '', 'Tehsil Road, Nathdwara', '', 9, 2, 0, '263', '8c19f571e251e61cb8dd3612f26d5ecf', '9529868588, 9928290234', '', '', '', '', '', '', 0, '2017-06-17 11:30:23', 0),
(529, 1, 5, 'Miss Shreya Lakhotia', '2006-07-07', 'Mr. Deepak Lakhotia', '', 'Mahadev Colony, Kankroli', '', 9, 2, 0, '787', '3621f1454cacf995530ea53652ddf8fb', '7728036807, 9461179236', '', '', '', '', '', '', 0, '2017-06-17 11:30:23', 0),
(530, 1, 5, 'Mast. Tanmay Maheshwari', '2006-01-23', 'Mr. Rakesh Maheshwari', '', 'Lal Bazar Chowk, Nathdwara', '', 9, 2, 0, '217', '63dc7ed1010d3c3b8269faf0ba7491d4', '9414472324, 9460305488', '', '', '', '', '', '', 0, '2017-06-17 11:30:23', 0),
(531, 1, 5, 'Miss Vedanti Bhatia', '2006-09-13', 'Mr. Giriraj Bhatia', '', 'Matri Shree Campus, Opposite Natthi Nagar, Nathdwara', '', 9, 2, 0, '1051', '456ac9b0d15a8b7f1e71073221059886', '9829240112, 7737777314', '', '', '', '', '', '', 0, '2017-06-17 11:30:23', 0),
(532, 1, 5, 'Mast. Vidhan Jain', '2006-02-08', 'Mr. Sumit Jain', '', 'Aadarsh Nagar, Tehsil Road, Nathdwara', '', 9, 2, 0, '800', '7a53928fa4dd31e82c6ef826f341daec', '9667917774, 8432245424', '', '', '', '', '', '', 0, '2017-06-17 11:30:23', 0),
(533, 1, 5, 'Mast. Vijay Purbiya', '2005-12-26', 'Mr. Bheru Lal Purbiya', '', 'Vallabhpura, Nathdwara', '', 9, 2, 0, '285', '0e01938fc48a2cfb5f2217fbfb00722d', '9950314413, 9636456088', '', '', '', '', '', '', 0, '2017-06-17 11:30:23', 0),
(534, 1, 5, 'Miss Yashasvi Gour', '2006-05-15', 'Mr. Rakesh Gour', '', 'Bhalavaton Ka Kheda, Nathdwara', '', 9, 2, 0, '927', '1f4477bad7af3616c1f933a02bfabe4e', '9828873120, 8239311557', '', '', '', '', '', '', 0, '2017-06-17 11:30:23', 0),
(535, 1, 5, 'Mast. Yuvraj Sharma', '2006-02-21', 'Mr. Girish Sharma', '', 'Sukhadiya Nagar, Nathdwara', '', 9, 2, 0, '327', 'b83aac23b9528732c23cc7352950e880', '9414232498, 9460305498', '', '', '', '', '', '', 0, '2017-06-17 11:30:23', 0),
(536, 1, 5, 'Miss Bhuvi Surana', '2006-09-30', 'Mr. Vikas Surana', '', '301, Shree Complex Nathdwara', '', 9, 2, 0, '458', 'd07e70efcfab08731a97e7b91be644de', '9950998503, 9929529452', '', '', '', '', '', '', 0, '2017-06-17 11:30:23', 0),
(537, 1, 5, 'Mast. Aditya Paliwal', '2005-04-10', 'Mr. Dinesh Paliwal', '', 'Jal Chakki Road, Kankroli', '', 10, 2, 0, '826', '795c7a7a5ec6b460ec00c5841019b9e9', '9460210510, 9829614917', '', '', '', '', '', '', 0, '2017-06-17 11:30:23', 0),
(538, 1, 5, 'Mast. Aditya Sharma', '2004-06-09', 'Mr. Ganpat Lal Sharma', '', 'Friends Colony, Lal Bagh, Nathdwara', '', 10, 2, 0, '508', '389bc7bb1e1c2a5e7e147703232a88f6', '9001594171, 9784115407', '', '', '', '', '', '', 0, '2017-06-17 11:30:23', 0),
(539, 1, 5, 'Miss Chitra Soni', '2005-12-11', 'Mr. Rajesh Soni', '', 'Gokul Nagar, Lal Baag, Nathdwara', '', 10, 2, 0, '667', 'b5dc4e5d9b495d0196f61d45b26ef33e', '7597690021, 8875028023', '', '', '', '', '', '', 0, '2017-06-17 11:30:23', 0),
(540, 1, 5, 'Mast. Dakshh Tripathi', '2005-11-11', 'Mr. Bharat Tripathi', '', 'Panchratna Complex, Kankroli', '', 10, 2, 0, '1052', 'f4dd765c12f2ef67f98f3558c282a9cd', '9799513605, 9799513606', '', '', '', '', '', '', 0, '2017-06-17 11:30:23', 0),
(541, 1, 5, 'Miss Dakshta Tripathi', '2005-11-11', 'Mr. Bharat Tripathi', '', 'Panchratna Complex, Kankroli', '', 10, 2, 0, '1054', 'db576a7d2453575f29eab4bac787b919', '9799513605, 9799513606', '', '', '', '', '', '', 0, '2017-06-17 11:30:23', 0),
(542, 1, 5, 'Miss Divyanshi Verma', '2005-08-22', 'Mr. Krishan Gopal Verma', '', 'Narayan Chowk, Sukhadia Nagar, Nathdwara', '', 10, 2, 0, '748', 'e49b8b4053df9505e1f48c3a701c0682', '7791039991', '', '', '', '', '', '', 0, '2017-06-17 11:30:23', 0),
(543, 1, 5, 'Miss Himanshi Sanadhya', '2005-08-05', 'Mr. Gopesh Sanadhya', '', 'Opp. Sundar Vilas, Nathdwara', '', 10, 2, 0, '156', '1c9ac0159c94d8d0cbedc973445af2da', '9461921478, 7737490693', '', '', '', '', '', '', 0, '2017-06-17 11:30:23', 0),
(544, 1, 5, 'Miss Ishita Sanadhya', '2005-07-02', 'Mr. Praveen Sanadhya', '', 'Rawton Ka Darwaja, Nathdwara', '', 10, 2, 0, '791', 'df7f28ac89ca37bf1abd2f6c184fe1cf', '9680591344', '', '', '', '', '', '', 0, '2017-06-17 11:30:23', 0),
(545, 1, 5, 'Miss Jeenal Bolia', '2005-08-18', 'Mr. Kiran Kumar Bolia', '', 'Mukharji Chouraha, Kankroli', '', 10, 2, 0, '694', '5487315b1286f907165907aa8fc96619', '7597762370, 9460363322', '', '', '', '', '', '', 0, '2017-06-17 11:30:23', 0),
(546, 1, 5, 'Miss Kalindi Dave', '2004-11-29', 'Mr. Lokesh Dave', '', 'Kanva Basti, Nathdwara', '', 10, 2, 0, '720', '5f2c22cb4a5380af7ca75622a6426917', '9772233651, 9828028800', '', '', '', '', '', '', 0, '2017-06-17 11:30:23', 0),
(547, 1, 5, 'Miss Kashish Agrawal', '2005-06-08', 'Mr. Vijay Agrawal', '', 'J. III - I, Court Campus, Nathuwas, Nathdwara', '', 10, 2, 0, '178', '8f85517967795eeef66c225f7883bdcb', '8104853952, 9461402069', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(548, 1, 5, 'Miss Kavya Sharma', '2005-04-15', 'Mr. Suresh Kumar Sharma', '', 'Jawahar Navodaya Vidyalaya, (Rajsamand)', '', 10, 2, 0, '1168', '2f29b6e3abc6ebdefb55456ea6ca5dc8', '9414522001, 7665003191', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(549, 1, 5, 'Mast. Laksha Ameta', '2006-07-18', 'Mr. Om Prakash Ameta', '', 'Panchratna Complex, Kankroli', '', 10, 2, 0, '969', 'e744f91c29ec99f0e662c9177946c627', '7568155485, 9928544772', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(550, 1, 5, 'Mast. Manan Bhutra', '2006-01-17', 'Mr. Sunil Maheshwari', '', 'Meera Nagar, Nathdwara', '', 10, 2, 0, '533', 'df877f3865752637daa540ea9cbc474f', '9414353272, 9460369501', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(551, 1, 5, 'Miss Manisha Kunwar Chundawat', '2005-01-28', 'Mr. Vijay Singh Chundawat', '', 'Narayan Chowk, Sukhadia Nagar, Nathdwara', '', 10, 2, 0, '612', 'f76a89f0cb91bc419542ce9fa43902dc', '9928006787, 9636426887', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(552, 1, 5, 'Miss Manisha Jangid', '2005-01-03', 'Mr. Hari Ram Jangid', '', 'Nai Haveli School, Rawton Ka Darwaja, Nathdwara', '', 10, 2, 0, '545', '647bba344396e7c8170902bcf2e15551', '9166478866, 9829238625', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(553, 1, 5, 'Mast. Mayank Kumath', '2005-09-02', 'Mr. Samarth Kumath', '', 'Karmchari Colony, Tehsil Road, Nathdwara', '', 10, 2, 0, '614', '851ddf5058cf22df63d3344ad89919cf', '9214891006, 7665208811', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(554, 1, 5, 'Mast. Milan Bhatia', '2004-12-26', 'Mr. Bharat Bhatia', '', 'Mohangarh, Nathdwara', '', 10, 2, 0, '527', '13f320e7b5ead1024ac95c3b208610db', '9828318964, ', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(555, 1, 5, 'Miss Navya Mahakali', '2005-01-08', 'Mr. Pradeep Mahakali', '', 'Sukhadia Nagar, Nathdwara', '', 10, 2, 0, '125', '3def184ad8f4755ff269862ea77393dd', '9783548383, 9414877468', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(556, 1, 5, 'Miss Nehal Sharma', '2005-05-24', 'Mr. Vijay Sharma', '', 'Bagarwada, Nathdwara', '', 10, 2, 0, '124', 'c8ffe9a587b126f152ed3d89a146b445', '9828762415, 9829352317', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(557, 1, 5, 'Mast. Nilaksh Raj Chouhan', '2004-12-10', 'Mr. Madan Singh Chouhan', '', 'Karjiya Ghati, Nathdwara', '', 10, 2, 0, '967', '6cfe0e6127fa25df2a0ef2ae1067d915', '9001037212, 9828944729', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(558, 1, 5, 'Miss Samiksha Lakhara', '2005-08-20', 'Mr. Mangi Lal Lakhara', '', 'Ahilya Kund, Nathdwara', '', 10, 2, 0, '301', '34ed066df378efacc9b924ec161e7639', '9414787058,', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(559, 1, 5, 'Miss Shahi Nagar', '2004-11-20', 'Mr. Shubham Nagar', '', 'Flat No. - 202, B - Wing, Vardhman Complex, Nai Road, Nathdwara', '', 10, 2, 0, '1033', 'e17184bcb70dcf3942c54e0b537ffc6d', '9772348860, 9214848860', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(560, 1, 5, 'Mast. Shivam Rathi', '2005-11-12', 'Mr. Pankaj Rathi', '', 'Nai Haveli Chowk, Nathdwara', '', 10, 2, 0, '183', 'cedebb6e872f539bef8c3f919874e9d7', '9414171361, 9680992063', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(561, 1, 5, 'Miss Sneha Chundawat', '2005-01-26', 'Mr. Raghuveer Singh Chundawat', '', 'Police Line, Rajsamand', '', 10, 2, 0, '964', '8065d07da4a77621450aa84fee5656d9', '9784964912, 9462323831', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(562, 1, 5, 'Miss Sumbul Fatima', '2005-10-06', 'Mr. Firoj Khan', '', 'Mohangarh, Nichla Chowk, Nathdwara', '', 10, 2, 0, '377', 'd34ab169b70c9dcd35e62896010cd9ff', '9829091888, 9928895108', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(563, 1, 5, 'Miss Tanisha Pipara', '2005-10-07', 'Mr. Deepak Pipara', '', 'Nai Abaadi, Kankroli', '', 10, 2, 0, '745', '5f0f5e5f33945135b874349cfbed4fb9', '7597484105, 9461388431', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(564, 1, 5, 'Miss Tisha Tak', '2006-12-11', 'Mr. Kishan Tak', '', '100ft. Road, Dev Heritage, Rajnagar', '', 10, 2, 0, '543', '81448138f5f163ccdba4acc69819f280', '9413830218, 9461085055', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(572, 1, 5, 'Mast. Jatin Joshi', '2005-03-07', 'Mr. Purnashankar Joshi', '', 'Bijlai, Lal Baag, Nathdwara', '', 10, 1, 0, '154', '1d7f7abc18fcb43975065399b0d1e48e', '8003354511, 9413263899', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(573, 1, 5, 'Miss Aarya Sanchihar', '2005-12-12', 'Mr. Surya Prakash Sanchihar', '', 'Dhora Mohalla, Kankroli', '', 10, 1, 0, '785', '4b04a686b0ad13dce35fa99fa4161c65', '7568008507, 9166021583', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(574, 1, 5, 'Mast. Aishwary Kumawat', '2005-03-16', 'Mr. Devendra Kumawat', '', 'Fauz Mohalla, Nathdwara', '', 10, 1, 0, '869', '49c9adb18e44be0711a94e827042f630', '9829289159, 8290265253', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(575, 1, 5, 'Mast. Aksh Vijay Vargiya', '2005-08-20', 'Mr. Vinod Vijayvargiya', '', 'Radhika Hospital, Kankroli', '', 10, 1, 0, '738', '217eedd1ba8c592db97d0dbe54c7adfc', '9414275344', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(576, 1, 5, 'Miss Anjali Parikh', '2005-03-15', 'Mr. Kalpesh Parikh', '', 'Setho Ka Payasa, Nathdwara', '', 10, 1, 0, '442', 'c203d8a151612acf12457e4d67635a95', '9983395845, 9636877117', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(577, 1, 5, 'Mast. Ansh Joshi', '2005-03-15', 'Mr. Suresh Joshi', '', 'Sindhi Colony, Nathdwara', '', 10, 1, 0, '148', '47d1e990583c9c67424d369f3414728e', '9950659749, 9001642886', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(578, 1, 5, 'Mast. Chirag Singh', '2004-08-17', 'Mr. Ganshyam Singh ', '', 'Sinhad, Maruti Complex, Nathdwara', '', 10, 1, 0, '444', '550a141f12de6341fba65b0ad0433500', '8290403109, 7611994877', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(579, 1, 5, 'Mast. Devang Bhatia', '2004-10-27', 'Mr. Girish Bhatia', '', 'Gokuldham Socity, Nathdwara', '', 10, 1, 0, '459', '7fe1f8abaad094e0b5cb1b01d712f708', '9829552888, 9214874163', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(580, 1, 5, 'Mast. Dhruv Vijayvargiya', '2005-07-21', 'Mr. Naresh Vijayvargiya', '', 'Sindhi Colony, Nathdwara', '', 10, 1, 0, '155', '2a79ea27c279e471f4d180b08d62b00a', '9829756010', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(581, 1, 5, 'Mast. Dirgh Upadhyay', '2005-08-21', 'Mr. Pushpraj Upadhyay', '', '186, Shanti Colony, Kankroli', '', 10, 1, 0, '939', '3df1d4b96d8976ff5986393e8767f5b2', '9680686868, 9829057004', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(582, 1, 5, 'Mast. Dishant Jain', '2005-04-07', 'Mr. Himmat Jain', '', 'Govindpura Road, Nathdwara', '', 10, 1, 0, '145', '2b24d495052a8ce66358eb576b8912c8', '8696888990, 9950555812', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(583, 1, 5, 'Mast. Hardik Jain', '2005-03-20', 'Mr. Vinod Jain', '', 'Mahaveerpura, Nathdwara', '', 10, 1, 0, '631', 'b7bb35b9c6ca2aee2df08cf09d7016c2', '9672909500, 9982900676', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(584, 1, 5, 'Miss Harshita Choudhary', '2004-12-01', 'Mr. Vijay Choudhary', '', 'Nai Haweli School, Nathdwara', '', 10, 1, 0, '137', '3988c7f88ebcb58c6ce932b957b6f332', '9829176873, 9549665656', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(585, 1, 5, 'Miss Jhanvi Lavti', '2005-10-12', 'Mr. Dinesh Chandra Lavti', '', 'Sukhadia Nagar, Park Road, Nathdwara', '', 10, 1, 0, '300', '94f6d7e04a4d452035300f18b984988c', '9352824287, 9024153110', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(586, 1, 5, 'Mast. Kavya Khichi', '2005-03-18', 'Mr. Suresh Khichi', '', 'Behind HDFC Bank, Mahaveer Nagar, Kankroli', '', 10, 1, 0, '1221', '1d72310edc006dadf2190caad5802983', '9928451160, 9887707724', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(587, 1, 5, 'Miss Keona Daglia', '2005-09-25', 'Mr. Kapil Kumar Daglia', '', 'Mahaveerpura, Nathdwara', '', 10, 1, 0, '959', '0f840be9b8db4d3fbd5ba2ce59211f55', '9799081711, 9414869484', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(588, 1, 5, 'Mast. Lakshya Dave', '2005-05-07', 'Mr. Bhuvaneshwar Dave', '', 'Bhalawato Ka Kheda, Lal Baag, Nathdwara', '', 10, 1, 0, '625', '233509073ed3432027d48b1a83f5fbd2', '9414621869, 8952873065', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(589, 1, 5, 'Mast. Manthan Rathi', '2005-09-30', 'Mr. Lokesh Rathi', '', 'Lal Baag, Nathdwara', '', 10, 1, 0, '736', '6bc24fc1ab650b25b4114e93a98f1eba', '9461048533, 9602720283', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(590, 1, 5, 'Mast. Mudit Paliwal', '2005-07-11', 'Mr. Kapil Paliwal', '', 'Rampura, Nathdwara', '', 10, 1, 0, '315', 'ad13a2a07ca4b7642959dc0c4c740ab6', '8875697588, 8875212414', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(591, 1, 5, 'Mast. Nakul Nandwana', '2005-03-31', 'Mr. Dinesh Nandwana', '', 'Manushyam, Shastri Nagar, Kankroli', '', 10, 1, 0, '933', '043c3d7e489c69b48737cc0c92d0f3a2', '9629834290, 8290096862', '', '', '', '', '', '', 0, '2017-06-17 11:30:24', 0),
(592, 1, 5, 'Miss Nishtha Jain', '2005-12-02', 'Mr. Dharmesh Jain', '', '20/29, Adarsh Nagar, Nathdwara', '', 10, 1, 0, '249', '077e29b11be80ab57e1a2ecabb7da330', '9214445111, 9462513746', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(593, 1, 5, 'Mast. Parv Goyal', '2005-01-04', 'Mr. Rakesh Goyal', '', 'Behind Kanwadiya Hospital, 100ft. Road, Kankroli', '', 10, 1, 0, '733', '6c29793a140a811d0c45ce03c1c93a28', '9829271749, 9251471749', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(594, 1, 5, 'Miss Priya Soni', '2005-04-22', 'Mr. Dharmendra Soni', '', 'Friends Colony, Nathdwara', '', 10, 1, 0, '414', '66808e327dc79d135ba18e051673d906', '9772381499, 9982080179', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(595, 1, 5, 'Mast. Rajat Soni', '2005-06-15', 'Mr. Mukesh Soni', '', 'Mohangarh, Uper Ka Chowk, Nathdwara', '', 10, 1, 0, '986', 'fe7ee8fc1959cc7214fa21c4840dff0a', '9571461920, 9166478915', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(596, 1, 5, 'Miss Ridhima Goyal', '2005-01-04', 'Mr. Rakesh Goyal', '', 'Behind Kanwadiya Hospital, 100ft. Road, Kankroli', '', 10, 1, 0, '729', '5751ec3e9a4feab575962e78e006250d', '9829271749, 9251471749', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(597, 1, 5, 'Mast. Sampurn Laddha', '2005-10-24', 'Mr. Madhu Prakash Laddha', '', 'Matra Shree'', 100ft. Road, Rajnagar, (Raj.)', '', 10, 1, 0, '724', '7f1171a78ce0780a2142a6eb7bc4f3c8', '7014146619, 9414174858', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(598, 1, 5, 'Mast. Sanskar Panwar', '2004-12-17', 'Mr. Neeraj Kumar Panwar', '', 'Nav Bahar Colony, J.K. Turn, Kankroli', '', 10, 1, 0, '920', '6d0f846348a856321729a2f36734d1a7', '9460942790, 9461063422', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(599, 1, 5, 'Miss Shubhi Sanadhya', '2004-12-27', 'Mr. Naresh Chandra Sanadhya', '', 'Bus Stand, Nathdwara', '', 10, 1, 0, '120', 'da4fb5c6e93e74d3df8527599fa62642', '9928081505, 9468708547', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(600, 1, 5, 'Miss Sneha Girnara', '2004-08-02', 'Mr. Sanjay Girnara', '', 'Bdiawala Chowk, Nathdwara', '', 10, 1, 0, '205', 'eae27d77ca20db309e056e3d2dcd7d69', '9587700881, 9680335589', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(601, 1, 5, 'Miss Sneha Mehta', '2006-02-23', 'Mr. Arun Mehta', '', 'Behind SBI Bank, Jal Chakki, Kankroli', '', 10, 1, 0, '788', 'c15da1f2b5e5ed6e6837a3802f0d1593', '9414232152, 9461260039', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(602, 1, 5, 'Mast. Lakshya Kabra', '2005-11-30', 'Mr. Hemant Kabra', '', 'Near Anand Takies, Nathdwara', '', 10, 1, 0, '891', 'cfbce4c1d7c425baf21d6b6f2babe6be', '9602405488, 9602405489', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(603, 1, 5, 'Mast. Madhur Bhatia', '2004-12-26', 'Mr. Bharat Bhatia', '', 'Mohangarh, Nathdwara', '', 10, 1, 0, '531', '0fcbc61acd0479dc77e3cccc0f5ffca7', '9828318964', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(608, 1, 5, 'Miss Aagya Bagora', '2004-04-21', 'Mr. Ravi Bagora', '', 'Mohangarh, Nathdwara', '', 11, 2, 0, '22', 'b6d767d2f8ed5d21a44b0e5886680cb9', '9950501556, 8875224673', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(609, 1, 5, 'Mast. Aayush Joshi', '2004-02-25', 'Mr. Rajesh Joshi', '', 'Bijlai, Nathdwara', '', 11, 2, 0, '201', '757b505cfd34c64c85ca5b5690ee5293', '8107130700, 9928665531', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(610, 1, 5, 'Miss Aksha Jain', '2004-04-22', 'Mr. Somil Jain', '', 'Jain Hospital, Mukharji Choraha, Rajsamand', '', 11, 2, 0, '799', '28267ab848bcf807b2ed53c3a8f8fc8a', '9829445980, 9461045480', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(611, 1, 5, 'Mast. Anand Sahu', '2004-12-19', 'Mr. Satyanarayan Sahu', '', 'Naya Bazar, Kankroli', '', 11, 2, 0, '1087', 'a26398dca6f47b49876cbaffbc9954f9', '9166843208, 9829346674', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(612, 1, 5, 'Miss Anubhuti Tripathi', '2004-01-19', 'Mr. Chetanya Kumar Triphathi', '', 'Tiwari Paysa, Lodha Ghati, Nathdwara', '', 11, 2, 0, '111', '698d51a19d8a121ce581499d7b701668', '9001062178, 9413067344', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(613, 1, 5, 'Mast. Devansh Vyas', '2004-04-17', 'Mr. Parag Vyas', '', 'J - 19, Near Telephone Exchange, Sukhadia Nagar', '', 11, 2, 0, '582', '46922a0880a8f11f8f69cbb52b1396be', '9414206427, 9460335327', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(614, 1, 5, 'Miss Devshree Dave', '2003-05-26', 'Mr. Chandraprakash Dave', '', 'Opposite Ankur B-Ed College, Kanva Road', '', 11, 2, 0, '97', 'e2ef524fbf3d9fe611d5a8e90fefdc9c', '7597449525, 9887081145', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(615, 1, 5, 'Miss Diya Golani', '2004-05-15', 'Mr. Chandraprakash Golani', '', 'Housing Board, Teliyon Ka Talab, D - 7', '', 11, 2, 0, '798', '9e3cfc48eccf81a0d57663e129aef3cb', '9983232882, 9571712544', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(616, 1, 5, 'Miss Diya Sanadhya', '2004-04-17', 'Mr. Harikant Sanadhya', '', 'Shreeji Kripa,  Sukhadia Nagar', '', 11, 2, 0, '537', '5ea1649a31336092c05438df996a3e59', '9680935751, 9352711031', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(617, 1, 5, 'Miss Ishi Gahlot', '2004-04-22', 'Mr. Priyatam Gehlot', '', 'Hotel Keshav, Opp. Rissala Chowk, Nathdwara', '', 11, 2, 0, '445', '67f7fb873eaf29526a11a9b7ac33bfac', '9983232882, 9571712544', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(618, 1, 5, 'Miss Juhi Bhatia', '2003-11-28', 'Mr. Dilip Bhatia', '', 'Kumharwada, Nathdwara', '', 11, 2, 0, '1030', 'e515df0d202ae52fcebb14295743063b', '9829358645, 9829750468', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(619, 1, 5, 'Miss Kanan Kabra', '2004-05-24', 'Mr. Ghanshyam Kabra', '', 'Shreeji Colony, Opp. Vandana Talkies, Bus Stand, Nathdwara', '', 11, 2, 0, '48', '642e92efb79421734881b53e1e1b18b6', '9829242909, 9799008909', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(620, 1, 5, 'Mast. Kartikey Sharma', '2004-10-05', 'Mr. Rajesh Kumar Sharma', '', '100ft. Road, Tulsi Vihar, Mahaveer Nagar', '', 11, 2, 0, '842', 'fc3cf452d3da8402bebb765225ce8c0e', '9414174748, 7877238777', '', '', '', '', '', '', 0, '2017-06-17 11:30:25', 0),
(621, 1, 5, 'Miss Keerti Thakkar', '2003-09-20', 'Mr. Lokesh Thakkar', '', 'Karmachari Colony, Private Bus Stand, Nathdwara', '', 11, 2, 0, '563', '8eefcfdf5990e441f0fb6f3fad709e21', '9928426919, 9000592815', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(622, 1, 5, 'Mast. Lakshya Mehta', '2004-08-07', 'Mr. Vinod Mehta', '', 'Maheshwari Mohalla, Rajnagar, Rajsamand, (Raj.)', '', 11, 2, 0, '1121', '3a15c7d0bbe60300a39f76f8a5ba6896', '9414174867, 9413574867', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(623, 1, 5, 'Miss Nidhi Bhatia', '2003-07-11', 'Mr. Paresh Bhatia', '', 'Bichchhu Mangri, Gokul Dham Society, Nathdwara', '', 11, 2, 0, '19', '1f0e3dad99908345f7439f8ffabdffc4', '9928426919, 9950574449', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(624, 1, 5, 'Mast. Nirav Maheshwari', '2004-08-23', 'Mr. Sunil Chehani ', '', 'Hanuman Temple, Opp. Avarimata Temple, Sinhad, Nathdwara', '', 11, 2, 0, '17', '70efdf2ec9b086079795c442636b55fb', '9694776111, 9829845892', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(625, 1, 5, 'Mast. Prakshit Suthar', '2004-02-09', 'Mr. Surendra Kumar Suthar', '', 'Dwarkesh Colony, Kankroli', '', 11, 2, 0, '995', '2bcab9d935d219641434683dd9d18a03', '9829292521, 8769745034', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(626, 1, 5, 'Miss Pritha Jain', '2004-03-06', 'Mr. Dinesh Jain', '', 'Nai Haweli Chowk, Nathdwara', '', 11, 2, 0, '21', '3c59dc048e8850243be8079a5c74d079', '9413632149', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(627, 1, 5, 'Miss Pushti Rathi', '2004-12-07', 'Mr. Abhishek Rathi', '', 'New Road, Nathdwara', '', 11, 2, 0, '258', '502e4a16930e414107ee22b6198c578f', '9829041333, 9530077780', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(628, 1, 5, 'Mast. Saumya Ajmera', '2004-05-22', 'Mr. Vikas Ajmera', '', 'Subhash Nagar, 100ft. Road', '', 11, 2, 0, '679', 'ca9c267dad0305d1a6308d2a0cf1c39c', '9141353839, 9462625100', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(629, 1, 5, 'Mast. Shabbir Hussain', '2004-09-29', 'Mr. Murtaza Mukhiya', '', 'Near High Secondary School, Nathdwara', '', 11, 2, 0, '1070', 'dc58e3a306451c9d670adcd37004f48f', '9829161151, 7737671252', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(630, 1, 5, 'Miss Srishti Pagaria', '2004-03-19', 'Mr. Pankaj Pagaria', '', 'Shree Krishna Nagar, Behind Radhika Hospital, Bhilwara Road, Kankroli', '', 11, 2, 0, '735', '6cd67d9b6f0150c77bda2eda01ae484c', '9414171500, 9460210500', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(631, 1, 5, 'Mast. Tanay Laddha', '2004-08-23', 'Mr. Sunil Laddha', '', 'Pratap Chouraha, 100ft. Road, Rajsamand', '', 11, 2, 0, '1015', '298923c8190045e91288b430794814c4', '9414171658, 8955771658', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(632, 1, 5, 'Mast. Vishal Chaplot', '2004-05-20', 'Mr. Bhavesh Chaplot', '', 'Mahaveerpura, Opposite Samiti, Nathdwara', '', 11, 2, 0, '138', '013d407166ec4fa56eb1e1f8cbe183b9', '9414171299, 7568866199', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(633, 1, 5, 'Mast. Yash Samar', '2004-06-30', 'Mr. Rajeev Samar', '', 'Shitla Mata Mandir Gali, Rajnagar, Rajsamand', '', 11, 2, 0, '1104', '4da04049a062f5adfe81b67dd755cecc', '9414788763, 9024080630', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(634, 1, 5, 'Miss Yashaswi Shrimali', '2004-07-29', 'Mr. Yogesh Shrimali', '', 'Vinayak Vihar, Behind Police Station', '', 11, 2, 0, '92', '92cc227532d17e56e07902b254dfad10', '9414232494, 9462190674', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(635, 1, 5, 'Mast. Darshan Sanadhya', '2004-02-06', 'Mr. Rahul Sanadhya', '', 'Ambawada Akhada, Nathdwara', '', 11, 2, 0, '32', '6364d3f0f495b6ab9dcf8d3b5c6e0b01', '9414353318, 8952900898', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(636, 1, 5, 'Miss Garvita Paliwal', '2004-12-27', 'Mr. Vijay Paliwal', '', 'Kothariya Road, Shiv Nagar, Nathdwara', '', 11, 2, 0, '941', '92262bf907af914b95a0fc33c3f33bf6', '9460029597, 9784499399', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(637, 1, 5, 'Mast. Madhuram Sanadhya', '2004-05-01', 'Mr. Balendu Sanadhya', '', 'Sundar Vilas, Nathdwara', '', 11, 2, 0, '103', '6974ce5ac660610b44d9b9fed0ff9548', '9462373067', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(638, 1, 5, 'Mast. Manay Purohit', '2004-08-12', 'Mr. Madan Purohit', '', 'Upli Oden, Nathdwara', '', 11, 2, 0, '752', 'a1d33d0dfec820b41b54430b50e96b5c', '9928426919, 9950574449', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(639, 1, 5, 'Miss Sneha Sanadhya', '2004-09-25', 'Mr. Harish  Kumar Sanadhya', '', 'Nakoda Nagar, Lal Baag, Nathdwara', '', 11, 2, 0, '241', 'f340f1b1f65b6df5b5e3f94d95b11daf', '9460507622, 7742009194', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(640, 1, 5, 'Mast. Sujal Agrawal', '2004-04-15', 'Mr. Rakesh Agrawal', '', 'Sundar Colony, Rajsamand', '', 11, 2, 0, '633', '26dd0dbc6e3f4c8043749885523d6a25', '9799986063, 8003216630', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(641, 1, 5, 'Mast. Veerendra Singh Jhala', '2004-01-05', 'Mr. Mahipal Singh Jhala', '', 'C, 19 Sukhadia Nagar, Nathdwara', '', 11, 2, 0, '412', 'b9228e0962a78b84f3d5d92f4faa000b', '9414877475, 9982191620', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(642, 1, 5, 'Mast. Vivek Lakhotia', '2004-05-20', 'Mr. Mukesh Lakhotia', '', 'Lakhotia Gali, Chopati, Nathdwara', '', 11, 2, 0, '26', '4e732ced3463d06de0ca9a15b6153677', '9829135264, 9982247066', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(643, 1, 5, 'Mast. Arihant Jain', '2002-12-16', 'Mr. Rajendra Jain', '', 'Adarsh Nagar, Tehsil Road, Nathdwara', '', 12, 2, 0, '300', '94f6d7e04a4d452035300f18b984988c', '9829371678, 9413134666', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(644, 1, 5, 'Mast. Ayushman Khangarot', '2005-05-27', 'Mr. Nand Singh Khangarot', '', 'Salampura, Kankroli', '', 12, 2, 0, '376', '142949df56ea8ae0be8b5306971900a4', '9799666699, 7742299456', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(645, 1, 5, 'Miss Bhavya Pal', '2003-09-05', 'Mr. Surendra Singh Pal', '', 'Shree Krishna Nagar, Rajsamand', '', 12, 2, 0, '302', '577bcc914f9e55d5e4e4f82f9f00e7d4', '9414859357, 9460700395', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(646, 1, 5, 'Miss Bhakti Bhatia', '2003-01-30', 'Mr. Giriraj Bhatia', '', 'Bicchu Mangri, Nathdwara', '', 12, 2, 0, '1050', '5055cbf43fac3f7e2336b27310f0b9ef', '9819802215, 773777314', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(647, 1, 5, 'Mast. Devang Hiran', '2003-09-13', 'Mr. Pankaj Hiran', '', 'Devang, Sunder Colony, Rajsamand', '', 12, 2, 0, '295', '49182f81e6a13cf5eaa496d51fea6406', '9352415950, 9509898980', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(648, 1, 5, 'Miss Dipansha Kumawat', '2004-03-06', 'Mr. Ghanshyam Kumawat', '', 'Fourj Mohalla, Nathdwara', '', 12, 2, 0, '305', '496e05e1aea0a9c4655800e8a7b9ea28', '9414877164, 9001781933', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(649, 1, 5, 'Miss Harshita Girnara', '2002-11-25', 'Mr. Sanjay Girnara', '', 'Badala Wala Chowk, Nathuwas, Nathdwara', '', 12, 2, 0, '312', '950a4152c2b4aa3ad78bdd6b366cc179', '9587700881, 9680335589', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(650, 1, 5, 'Mast. Ishit Parikh', '2003-03-09', 'Lt. Mr. Manish Parikh', '', 'Setho Ka Payasa, Mandir Marg, Nathdwara', '', 12, 2, 0, '315', 'ad13a2a07ca4b7642959dc0c4c740ab6', '9636691974', '', '', '', '', '', '', 0, '2017-06-17 11:30:26', 0),
(651, 1, 5, 'Mast. Jayesh Lodha', '2003-01-04', 'Mr. Natwar Lal Lodha', '', 'Ganesh Nagar, Lodha Ghati, Nathdwara', '', 12, 2, 0, '316', '3fe94a002317b5f9259f82690aeea4cd', '9460300206', '', '', '', '', '', '', 0, '2017-06-17 11:30:27', 0),
(652, 1, 5, 'Mast. Kartik Agarwal', '2003-07-27', 'Mr. Praveen Agarwal', '', 'Rawaton Ka Darwaja, Nathdwara', '', 12, 2, 0, '320', '320722549d1751cf3f247855f937b982', '8769434157, 8952902583', '', '', '', '', '', '', 0, '2017-06-17 11:30:27', 0),
(653, 1, 5, 'Miss Khushi Swarnkar', '2004-01-05', 'Mr. Santosh Swarnkar', '', 'Rampura, Nathdwara', '', 12, 2, 0, '322', '5737c6ec2e0716f3d8a7a5c4e0de0d9a', '9549048500, 9549058550', '', '', '', '', '', '', 0, '2017-06-17 11:30:27', 0),
(654, 1, 5, 'Miss Meenal Chaplot', '2003-01-21', 'Mr. Bhavesh Chaplot', '', 'Mahaveerpura, Nathdwara', '', 12, 2, 0, '331', '6da37dd3139aa4d9aa55b8d237ec5d4a', '9784683299, 7568866199', '', '', '', '', '', '', 0, '2017-06-17 11:30:27', 0),
(655, 1, 5, 'Mast. Prateek Lakhotia', '2003-10-23', 'Mr. Deepak Lakhotia', '', 'Mahadev Colony, Jal Chakki, Kankroli', '', 12, 2, 0, '292', '1700002963a49da13542e0726b7bb758', '9414171807, 9461179236', '', '', '', '', '', '', 0, '2017-06-17 11:30:27', 0),
(656, 1, 5, 'Miss Saasha Gupta', '2003-11-22', 'Mr. Sagar Gupta', '', 'Patwari Payasa, Nathdwara', '', 12, 2, 0, '348', '01386bd6d8e091c2ab4c7c7de644d37b', '9950372973, 8239477780', '', '', '', '', '', '', 0, '2017-06-17 11:30:27', 0),
(657, 1, 5, 'Mast. Sanskar Bhatia', '2003-03-31', 'Mr. Gaurav Bhatia', '', 'Near Hotel Vrinda, Mohangarh, Nathdwara', '', 12, 2, 0, '349', '0bb4aec1710521c12ee76289d9440817', '9214499909, 8058599909', '', '', '', '', '', '', 0, '2017-06-17 11:30:27', 0),
(658, 1, 5, 'Mast. Abhidev Sharma', '2003-10-03', 'Mr. Shiv Hari Sharma', '', 'Sukhadia Nagar, Near Community Hall, Nathdwara', '', 12, 2, 0, '350', '9de6d14fff9806d4bcd1ef555be766cd', '9352730999, 7073455102', '', '', '', '', '', '', 0, '2017-06-17 11:30:27', 0),
(659, 1, 5, 'Mast. Shashwat Sharma', '2003-04-05', 'Mr. Gajendra Sharma', '', 'Ganesh Nagar, Lodha Ghati, Nathdwara', '', 12, 2, 0, '354', '8dd48d6a2e2cad213179a3992c0be53c', '9829453222, 9928487944', '', '', '', '', '', '', 0, '2017-06-17 11:30:27', 0),
(660, 1, 5, 'Miss Tanvi Bhutra', '2004-01-17', 'Mr. Sunil Butra', '', 'Meera Nagar, Mobegarh, Nathdwara', '', 12, 2, 0, '360', 'e7b24b112a44fdd9ee93bdf998c6ca0e', '9414353272, 9460369501', '', '', '', '', '', '', 0, '2017-06-17 11:30:27', 0),
(661, 1, 5, 'Mast. Arvind Singh ', '2003-06-03', 'Mr. Sajjan Singh ', '', 'Village - Uriya, Uthnol, Nathdwara', '', 12, 2, 0, '301', '34ed066df378efacc9b924ec161e7639', '9783635488', '', '', '', '', '', '', 0, '2017-06-17 11:30:27', 0),
(662, 1, 5, 'Miss Drushti Rathi', '2003-01-09', 'Mr. Pawan Rathi', '', 'A - 15, Govind Nagar, Nathdwara', '', 12, 2, 0, '307', '8e98d81f8217304975ccb23337bb5761', '9309255690, 9314542220', '', '', '', '', '', '', 0, '2017-06-17 11:30:27', 0),
(663, 1, 5, 'Mast. Garv  Purohit', '2003-12-26', 'Mr. Ashok Purohit', '', 'Lakshmi Sadan, Sunder Vilas, Nathdwara', '', 12, 2, 0, '308', 'a8c88a0055f636e4a163a5e3d16adab7', '9772390372, 9950646610', '', '', '', '', '', '', 0, '2017-06-17 11:30:27', 0),
(664, 1, 5, 'Miss Harshita Jha', '2003-03-15', 'Mr. Dharmendra Jha', '', 'A - 66, Nai Abadi, Kankroli', '', 12, 2, 0, '369', '0c74b7f78409a4022a2c4c5a5ca3ee19', '9414251427, 9636467006', '', '', '', '', '', '', 0, '2017-06-17 11:30:27', 0),
(665, 1, 5, 'Miss Harshita Paliwal', '2002-09-04', 'Mr. Chandrashekhar Paliwal', '', 'Gurjarpura, Nathdwara', '', 12, 2, 0, '313', '158f3069a435b314a80bdcb024f8e422', '8769435092, 7023261277', '', '', '', '', '', '', 0, '2017-06-17 11:30:27', 0),
(666, 1, 5, 'Mast. Idris Mukhiya', '2003-03-12', 'Mr. Mufaddal Mukhiya', '', 'Bohra Bazar, Nathdwara', '', 12, 2, 0, '1046', '1579779b98ce9edb98dd85606f2c119d', '9829923900, 9413953255', '', '', '', '', '', '', 0, '2017-06-17 11:30:27', 0),
(667, 1, 5, 'Miss Jeenal Jain', '2002-12-08', 'Mr. Ratnesh Jain', '', 'Opp. Mahadev Temple, Lal Bazar, Nathdwara', '', 12, 2, 0, '317', '5b8add2a5d98b1a652ea7fd72d942dac', '9461179137, 9799329848', '', '', '', '', '', '', 0, '2017-06-17 11:30:27', 0),
(668, 1, 5, 'Mast. Jeetendra Deval', '2001-06-09', 'Mr. Sukhdev Singh Charan', '', 'Sukhadiya Nagar, Nathdwara', '', 12, 2, 0, '318', '432aca3a1e345e339f35a30c8f65edce', '9829378171, 7891866941', '', '', '', '', '', '', 0, '2017-06-17 11:30:27', 0),
(669, 1, 5, 'Miss Jiya Agrawal', '2004-05-10', 'Mr. Mukesh Agrawal', '', 'Block - D, Arihant Plaza, Nathdwara', '', 12, 2, 0, '319', '8d3bba7425e7c98c50f52ca1b52d3735', '7728805484, 9413700597', '', '', '', '', '', '', 0, '2017-06-17 11:30:27', 0),
(670, 1, 5, 'Miss Khushi Girnara', '2004-08-12', 'Mr. Kamlesh Girnara', '', 'Shreenath Colony, Nathdwara', '', 12, 2, 0, '321', 'caf1a3dfb505ffed0d024130f58c5cfa', '9983041180, 9214174154', '', '', '', '', '', '', 0, '2017-06-17 11:30:27', 0),
(671, 1, 5, 'Mast. Kushal Purohit', '2004-04-05', 'Mr. Mangi Lal Purohit', '', 'Friends Colony, Lal Baag, Nathdwara', '', 12, 2, 0, '327', 'b83aac23b9528732c23cc7352950e880', '9001680792, 7568076185', '', '', '', '', '', '', 0, '2017-06-17 11:30:27', 0),
(672, 1, 5, 'Miss Lakshyaraj Chouhan', '2003-02-09', 'Mr. Devendra Chouhan', '', 'Sukhadiya Nagar, Nathdwara', '', 12, 2, 0, '328', 'cd00692c3bfe59267d5ecfac5310286c', '9928369857, 9928740006', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(673, 1, 5, 'Mast. Parth Bhandari', '2003-08-12', 'Mr. Chandraprakash Bhandari', '', 'Shree Ram Nagar, 100ft. Road, Rajsamand', '', 12, 2, 0, '287', '918317b57931b6b7a7d29490fe5ec9f9', '9352662755, 9314485444', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(674, 1, 5, 'Miss Radhika Maheshwari', '2003-02-02', 'Mr. Anant Maheshwari', '', 'Sukhadiya Nagar, Nathdwara', '', 12, 2, 0, '343', '3ad7c2ebb96fcba7cda0cf54a2e802f5', '9414171328, 9413953520', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(675, 1, 5, 'Miss Suhani Jain', '2003-07-19', 'Mr. Dinesh Chandra Jain', '', 'Mahaveerpura, Nathdwara', '', 12, 2, 0, '358', 'aa942ab2bfa6ebda4840e7360ce6e7ef', '9413019463, 02953 - 231558', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(676, 1, 5, 'Miss Tanishka Khandelwal', '2003-04-18', 'Mr. Harikant Khandelwal', '', 'Bus Stand, Nathdwara', '', 12, 2, 0, '359', 'c058f544c737782deacefa532d9add4c', '8769442659, 9928619995', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(677, 1, 5, 'Miss Vinti Thakkar', '2002-05-14', 'Mr. Lokesh Thakkar', '', 'Karmachari Colony, Tehsil Road, Nathdwara', '', 12, 2, 0, '366', '5ef698cd9fe650923ea331c15af3b160', '9928760915, 9001092815', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(679, 1, 5, 'Miss Chhavi Surana', '2003-03-12', 'Mr. Pankaj Surana', '', 'Shreenath Colony, Nathdwara', '', 12, 1, 0, '304', '37bc2f75bf1bcfe8450a1a41c200364c', '9829147407, 02953 - 232407', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(680, 1, 5, 'Miss Divyanshi Dave', '2002-12-12', 'Mr. Rajendra Dave', '', 'Ganesh Tekri, Nathdwara', '', 12, 1, 0, '306', 'b2eb7349035754953b57a32e2841bda5', '9829378492, 9214977339', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(681, 1, 5, 'Miss Diya Jain', '2004-04-18', 'Mr. Balwant Jain', '', 'Tehsil Road, Nathdwara', '', 12, 1, 0, '1025', '82b8a3434904411a9fdc43ca87cee70c', '9929472904, 9166764320', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(682, 1, 5, 'Miss Gungunraj Kumawat', '2003-05-22', 'Mr. Mahesh Kumawat', '', 'Kothariya Road, Lal Baag, Nathdwara', '', 12, 1, 0, '763', 'eefc9e10ebdc4a2333b42b2dbb8f27b6', '9414171565, 9461570565', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(683, 1, 5, 'Miss Koyal Soni', '2003-01-14', 'Mr. Dharmendra Soni', '', 'Friends Colony, Lal Baag, Nathdwara', '', 12, 1, 0, '421', 'e0c641195b27425bb056ac56f8953d24', '9772381499, 9783916179', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(684, 1, 5, 'Mast. Lakshyaraj Singh', '2003-05-11', 'Mr. Ghanshyam Singh', '', 'Sinhad, Near Hanumanji Temple, Nathdwara', '', 12, 1, 0, '549', 'ccb1d45fb76f7c5a0bf619f979c6cf36', '7611994877, 8290403109', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(685, 1, 5, 'Mast. Mayank Vijayvergiya', '2003-11-19', 'Mr. Anil Kumar Vijay', '', 'Asotia, Kankroli', '', 12, 1, 0, '599', '3435c378bb76d4357324dd7e69f3cd18', '9214039485, 9214064115', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(686, 1, 5, 'Mast. Mohammed Husain Bohra', '2002-12-28', 'Mr. Burhanuddin Bohra', '', 'Bohra Bazar, Nathdwara', '', 12, 1, 0, '326', 'a666587afda6e89aec274a3657558a27', '7737675164', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(687, 1, 5, 'Miss Nandini Bhatia', '2003-01-27', 'Mr. Sachin Bhatia', '', 'Mohangarh, Nathdwara', '', 12, 1, 0, '07', 'd72d187df41e10ea7d9fcdc7f5909205', '9829161199, 9782025345', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(688, 1, 5, 'Miss Nikita Rathore', '2003-05-25', 'Mr. Jogendra Rathore', '', 'Police Station, Nathdwara', '', 12, 1, 0, '782', '72da7fd6d1302c0a159f6436d01e9eb0', '9799991899, 9660976303', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(689, 1, 5, 'Mast. Nimit Jain', '2002-06-24', 'Mr. Ramesh Jain', '', 'Bus Stand, Nathdwara', '', 12, 1, 0, '230', '6da9003b743b65f4c0ccd295cc484e57', '9314488128, 9414171353', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(690, 1, 5, 'Miss Pritima Priyanshi Chouhan', '2002-12-27', 'Mr. Madan Singh Chouhan', '', 'Kalla Khedi, Nathdwara', '', 12, 1, 0, '1044', '1019c8091693ef5c5f55970346633f92', '9828944729, 9001037212', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(691, 1, 5, 'Mast. Rishabh Chaplot', '2003-06-11', 'Mr. Chater Lal Chaplot', '', 'Mahaveerpura, Nathdwara', '', 12, 1, 0, '160', 'b73ce398c39f506af761d2277d853a92', '9413218176, 9587283675', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(692, 1, 5, 'Mast. Saurabh Kumar Bomb', '2002-05-06', 'Mr. Ashok Kumar Bomb', '', 'Bagarwara, Nathdwara', '', 12, 1, 0, '418', 'd1f255a373a3cef72e03aa9d980c7eca', '9829356523, 7727904571', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(693, 1, 5, 'Mast. Sharan Kandwani', '2003-11-15', 'Mr. Parmanand Kandwani', '', 'Kumharwada, Nathdwara', '', 12, 1, 0, '150', '7ef605fc8dba5425d6965fbd4c8fbe1f', '9414343900, 8952081601', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(694, 1, 5, 'Miss Vanshita Purohit', '2003-05-31', 'Mr. Giriraj Purohit', '', 'Jat Khidki, Nathdwara', '', 12, 1, 0, '363', '00411460f7c92d2124a67ea0f4cb5f85', '9672128167, 9649950045', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(695, 1, 5, 'Mast. Vidhan Laddha', '2003-11-22', 'Mr. Kamlesh Laddha', '', '100ft. Road, Rajnagar, Rajsamand', '', 12, 1, 0, '365', '9be40cee5b0eee1462c82c6964087ff9', '9414660399, 9782024877', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(696, 1, 5, 'Mast. Yash Kumar Jain', '2003-05-18', 'Mr. Pankaj Jain', '', 'Sinhad, Nathdwara', '', 12, 1, 0, '368', 'cf004fdc76fa1a4f25f62e0eb5261ca3', '9414353410, 9414867139', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(697, 1, 5, 'Miss Anjali Paliwal', '2003-10-05', 'Mr. Kamlesh Paliwal', '', 'Shiv Nagar, Lal Bagh, Nathdwara', '', 12, 1, 0, '299', 'ef0d3930a7b6c95bd2b32ed45989c61f', '9414869719, 9680846262', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(698, 1, 5, 'Miss Chhavi Sisodia', '2003-04-04', 'Mr. Shambhu Singh Sisodia', '', 'Nai Haveli Chowk, Nathdwara', '', 12, 1, 0, '303', '11b9842e0a271ff252c1903e7132cd68', '9829094212, 9672127171', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(699, 1, 5, 'Mast. Jitendra Singh Jadawat', '2002-12-08', 'Mr. Ganpat Singh Jadawat', '', 'Chandradeep Colony', '', 12, 1, 0, '348', '01386bd6d8e091c2ab4c7c7de644d37b', '9772582884', '', '', '', '', '', '', 0, '2017-06-17 11:30:28', 0),
(700, 1, 5, 'Mast. Kartik Joshi', '2002-12-20', 'Mr. Prakash Chandra Joshi', '', 'Brahmpuri, Nathuwas, Nathdwara', '', 12, 1, 0, '504', 'b337e84de8752b27eda3a12363109e80', '9929654812, 8890639075', '', '', '', '', '', '', 0, '2017-06-17 11:30:29', 0),
(701, 1, 5, 'Miss Pragati Sanadhya', '2004-01-13', 'Mr. Sunil Datta Sanadhya', '', 'Nai Haveli Chowk, Nathdwara', '', 12, 1, 0, '337', '357a6fdf7642bf815a88822c447d9dc4', '9314912589, 8432405851', '', '', '', '', '', '', 0, '2017-06-17 11:30:29', 0),
(702, 1, 5, 'Miss Priyal Mehta', '2003-07-06', 'Mr. Umang Mehta', '', 'RTDC Road, Nathdwara', '', 12, 1, 0, '340', '40008b9a5380fcacce3976bf7c08af5b', '9929931255, 8441930652', '', '', '', '', '', '', 0, '2017-06-17 11:30:29', 0),
(703, 1, 5, 'Mast. Ripunjay Garg', '2003-02-21', 'Mr. Narendra Garg', '', '100 Ft. Road, Alankar Residence, C3 (Raj.)', '', 12, 1, 0, '345', 'd81f9c1be2e08964bf9f24b15f0e4900', '9414273038, 8239692572', '', '', '', '', '', '', 0, '2017-06-17 11:30:29', 0),
(704, 1, 5, 'Mast. Ronak Maheshwari', '2004-04-07', 'Mr. Vishal Maheshwari', '', 'Subhash Nagar, Kankroli', '', 12, 1, 0, '347', 'c5ff2543b53f4cc0ad3819a36752467b', '9414497772, 9460617070', '', '', '', '', '', '', 0, '2017-06-17 11:30:29', 0),
(705, 1, 5, 'Mast. Sawan Ladha', '2003-07-18', 'Mr. Jitendra Ladha', '', 'Karni Vihar, Rajsamand', '', 12, 1, 0, '352', '371bce7dc83817b7893bcdeed13799b5', '9414677357, 7737574175', '', '', '', '', '', '', 0, '2017-06-17 11:30:29', 0),
(706, 1, 5, 'Mast. Soumya Singh', '2004-02-21', 'Mr. Chattar Singh', '', 'Ganesh Nagar, Lodha Ghati, Nathdwara', '', 12, 1, 0, '355', '82cec96096d4281b7c95cd7e74623496', '9167734215, 9461808038', '', '', '', '', '', '', 0, '2017-06-17 11:30:29', 0),
(707, 1, 5, 'Miss Shrishti Sharma', '2002-12-10', 'Mr. Lokendra Sharma', '', 'Mahadev Ji Ki Ghati, Bhimgadi, Nathdwara', '', 12, 1, 0, '356', '6c524f9d5d7027454a783c841250ba71', '9829029067, 8769542121', '', '', '', '', '', '', 0, '2017-06-17 11:30:29', 0),
(708, 1, 5, 'Miss Vaishnavi Bhatt', '2003-12-08', 'Mr. Shyam Sundar Bhatt', '', 'Uba Ganesh Ji, Nathdwara', '', 12, 1, 0, '362', 'c3e878e27f52e2a57ace4d9a76fd9acf', '9214464763, 9928309691', '', '', '', '', '', '', 0, '2017-06-17 11:30:29', 0),
(709, 1, 5, 'Mast. Vivek Paliwal', '2003-10-04', 'Mr. Purnashankar Paliwal', '', 'New Road, Vardhman Complex, Nathdwara', '', 12, 1, 0, '367', '05049e90fa4f5039a8cadc6acbb4b2cc', '9414342981, 9460304481', '', '', '', '', '', '', 0, '2017-06-17 11:30:29', 0),
(710, 1, 5, 'Miss Chhavi Surana', '2003-03-12', 'Mr. Pankaj Surana', '', 'Shreenath Colony, Nathdwara', '', 12, 1, 0, '304', '37bc2f75bf1bcfe8450a1a41c200364c', '9829147407, 02953 - 232407', '', '', '', '', '', '', 0, '2017-06-17 11:30:29', 0),
(711, 1, 5, 'Miss Divyanshi Dave', '2002-12-12', 'Mr. Rajendra Dave', '', 'Ganesh Tekri, Nathdwara', '', 12, 1, 0, '306', 'b2eb7349035754953b57a32e2841bda5', '9829378492, 9214977339', '', '', '', '', '', '', 0, '2017-06-17 11:30:29', 0),
(712, 1, 5, 'Miss Diya Jain', '2004-04-18', 'Mr. Balwant Jain', '', 'Tehsil Road, Nathdwara', '', 12, 1, 0, '1025', '82b8a3434904411a9fdc43ca87cee70c', '9929472904, 9166764320', '', '', '', '', '', '', 0, '2017-06-17 11:30:29', 0),
(713, 1, 5, 'Miss Gungunraj Kumawat', '2003-05-22', 'Mr. Mahesh Kumawat', '', 'Kothariya Road, Lal Baag, Nathdwara', '', 12, 1, 0, '763', 'eefc9e10ebdc4a2333b42b2dbb8f27b6', '9414171565, 9461570565', '', '', '', '', '', '', 0, '2017-06-17 11:30:29', 0),
(714, 1, 5, 'Miss Koyal Soni', '2003-01-14', 'Mr. Dharmendra Soni', '', 'Friends Colony, Lal Baag, Nathdwara', '', 12, 1, 0, '421', 'e0c641195b27425bb056ac56f8953d24', '9772381499, 9783916179', '', '', '', '', '', '', 0, '2017-06-17 11:30:29', 0),
(715, 1, 5, 'Mast. Lakshyaraj Singh', '2003-05-11', 'Mr. Ghanshyam Singh', '', 'Sinhad, Near Hanumanji Temple, Nathdwara', '', 12, 1, 0, '549', 'ccb1d45fb76f7c5a0bf619f979c6cf36', '7611994877, 8290403109', '', '', '', '', '', '', 0, '2017-06-17 11:30:29', 0);
INSERT INTO `login` (`id`, `user_id`, `role_id`, `name`, `dob`, `father_name`, `mother_name`, `address`, `roll_no`, `class_id`, `section_id`, `medium`, `eno`, `password`, `mobile_no`, `father_mobile`, `mother_mobile`, `otp`, `notification_key`, `device_token`, `image`, `school_id`, `curent_date`, `flag`) VALUES
(716, 1, 5, 'Mast. Mayank Vijayvergiya', '2003-11-19', 'Mr. Anil Kumar Vijay', '', 'Asotia, Kankroli', '', 12, 1, 0, '599', '3435c378bb76d4357324dd7e69f3cd18', '9214039485, 9214064115', '', '', '', '', '', '', 0, '2017-06-17 11:30:29', 0),
(717, 1, 5, 'Mast. Mohammed Husain Bohra', '2002-12-28', 'Mr. Burhanuddin Bohra', '', 'Bohra Bazar, Nathdwara', '', 12, 1, 0, '326', 'a666587afda6e89aec274a3657558a27', '7737675164', '', '', '', '', '', '', 0, '2017-06-17 11:30:29', 0),
(718, 1, 5, 'Miss Nandini Bhatia', '2003-01-27', 'Mr. Sachin Bhatia', '', 'Mohangarh, Nathdwara', '', 12, 1, 0, '07', 'd72d187df41e10ea7d9fcdc7f5909205', '9829161199, 9782025345', '', '', '', '', '', '', 0, '2017-06-17 11:30:29', 0),
(719, 1, 5, 'Miss Nikita Rathore', '2003-05-25', 'Mr. Jogendra Rathore', '', 'Police Station, Nathdwara', '', 12, 1, 0, '782', '72da7fd6d1302c0a159f6436d01e9eb0', '9799991899, 9660976303', '', '', '', '', '', '', 0, '2017-06-17 11:30:29', 0),
(720, 1, 5, 'Mast. Nimit Jain', '2002-06-24', 'Mr. Ramesh Jain', '', 'Bus Stand, Nathdwara', '', 12, 1, 0, '230', '6da9003b743b65f4c0ccd295cc484e57', '9314488128, 9414171353', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(721, 1, 5, 'Miss Pritima Priyanshi Chouhan', '2002-12-27', 'Mr. Madan Singh Chouhan', '', 'Kalla Khedi, Nathdwara', '', 12, 1, 0, '1044', '1019c8091693ef5c5f55970346633f92', '9828944729, 9001037212', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(722, 1, 5, 'Mast. Rishabh Chaplot', '2003-06-11', 'Mr. Chater Lal Chaplot', '', 'Mahaveerpura, Nathdwara', '', 12, 1, 0, '160', 'b73ce398c39f506af761d2277d853a92', '9413218176, 9587283675', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(723, 1, 5, 'Mast. Saurabh Kumar Bomb', '2002-05-06', 'Mr. Ashok Kumar Bomb', '', 'Bagarwara, Nathdwara', '', 12, 1, 0, '418', 'd1f255a373a3cef72e03aa9d980c7eca', '9829356523, 7727904571', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(724, 1, 5, 'Mast. Sharan Kandwani', '2003-11-15', 'Mr. Parmanand Kandwani', '', 'Kumharwada, Nathdwara', '', 12, 1, 0, '150', '7ef605fc8dba5425d6965fbd4c8fbe1f', '9414343900, 8952081601', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(725, 1, 5, 'Miss Vanshita Purohit', '2003-05-31', 'Mr. Giriraj Purohit', '', 'Jat Khidki, Nathdwara', '', 12, 1, 0, '363', '00411460f7c92d2124a67ea0f4cb5f85', '9672128167, 9649950045', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(726, 1, 5, 'Mast. Vidhan Laddha', '2003-11-22', 'Mr. Kamlesh Laddha', '', '100ft. Road, Rajnagar, Rajsamand', '', 12, 1, 0, '365', '9be40cee5b0eee1462c82c6964087ff9', '9414660399, 9782024877', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(727, 1, 5, 'Mast. Yash Kumar Jain', '2003-05-18', 'Mr. Pankaj Jain', '', 'Sinhad, Nathdwara', '', 12, 1, 0, '368', 'cf004fdc76fa1a4f25f62e0eb5261ca3', '9414353410, 9414867139', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(728, 1, 5, 'Miss Anjali Paliwal', '2003-10-05', 'Mr. Kamlesh Paliwal', '', 'Shiv Nagar, Lal Bagh, Nathdwara', '', 12, 1, 0, '299', 'ef0d3930a7b6c95bd2b32ed45989c61f', '9414869719, 9680846262', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(729, 1, 5, 'Miss Chhavi Sisodia', '2003-04-04', 'Mr. Shambhu Singh Sisodia', '', 'Nai Haveli Chowk, Nathdwara', '', 12, 1, 0, '303', '11b9842e0a271ff252c1903e7132cd68', '9829094212, 9672127171', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(730, 1, 5, 'Mast. Jitendra Singh Jadawat', '2002-12-08', 'Mr. Ganpat Singh Jadawat', '', 'Chandradeep Colony', '', 12, 1, 0, '348', '01386bd6d8e091c2ab4c7c7de644d37b', '9772582884', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(731, 1, 5, 'Mast. Kartik Joshi', '2002-12-20', 'Mr. Prakash Chandra Joshi', '', 'Brahmpuri, Nathuwas, Nathdwara', '', 12, 1, 0, '504', 'b337e84de8752b27eda3a12363109e80', '9929654812, 8890639075', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(732, 1, 5, 'Miss Pragati Sanadhya', '2004-01-13', 'Mr. Sunil Datta Sanadhya', '', 'Nai Haveli Chowk, Nathdwara', '', 12, 1, 0, '337', '357a6fdf7642bf815a88822c447d9dc4', '9314912589, 8432405851', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(733, 1, 5, 'Miss Priyal Mehta', '2003-07-06', 'Mr. Umang Mehta', '', 'RTDC Road, Nathdwara', '', 12, 1, 0, '340', '40008b9a5380fcacce3976bf7c08af5b', '9929931255, 8441930652', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(734, 1, 5, 'Mast. Ripunjay Garg', '2003-02-21', 'Mr. Narendra Garg', '', '100 Ft. Road, Alankar Residence, C3 (Raj.)', '', 12, 1, 0, '345', 'd81f9c1be2e08964bf9f24b15f0e4900', '9414273038, 8239692572', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(735, 1, 5, 'Mast. Ronak Maheshwari', '2004-04-07', 'Mr. Vishal Maheshwari', '', 'Subhash Nagar, Kankroli', '', 12, 1, 0, '347', 'c5ff2543b53f4cc0ad3819a36752467b', '9414497772, 9460617070', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(736, 1, 5, 'Mast. Sawan Ladha', '2003-07-18', 'Mr. Jitendra Ladha', '', 'Karni Vihar, Rajsamand', '', 12, 1, 0, '352', '371bce7dc83817b7893bcdeed13799b5', '9414677357, 7737574175', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(737, 1, 5, 'Mast. Soumya Singh', '2004-02-21', 'Mr. Chattar Singh', '', 'Ganesh Nagar, Lodha Ghati, Nathdwara', '', 12, 1, 0, '355', '82cec96096d4281b7c95cd7e74623496', '9167734215, 9461808038', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(738, 1, 5, 'Miss Shrishti Sharma', '2002-12-10', 'Mr. Lokendra Sharma', '', 'Mahadev Ji Ki Ghati, Bhimgadi, Nathdwara', '', 12, 1, 0, '356', '6c524f9d5d7027454a783c841250ba71', '9829029067, 8769542121', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(739, 1, 5, 'Miss Vaishnavi Bhatt', '2003-12-08', 'Mr. Shyam Sundar Bhatt', '', 'Uba Ganesh Ji, Nathdwara', '', 12, 1, 0, '362', 'c3e878e27f52e2a57ace4d9a76fd9acf', '9214464763, 9928309691', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(740, 1, 5, 'Mast. Vivek Paliwal', '2003-10-04', 'Mr. Purnashankar Paliwal', '', 'New Road, Vardhman Complex, Nathdwara', '', 12, 1, 0, '367', '05049e90fa4f5039a8cadc6acbb4b2cc', '9414342981, 9460304481', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(741, 1, 5, 'Mast. Abhinav Tripathi', '2004-08-26', 'Mr. Ashok Tripathi', '', 'Sundar Vilas, Nathdwara', '', 13, 2, 0, '203', 'e2c0be24560d78c5e599c2a9c9d0bbd2', '9928130989, 9414541015', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(742, 1, 5, 'Mast. Aditya Panwar', '2002-01-21', 'Mr. Deepak Panwar', '', 'Naniji Ka Bagh, Nathdwara', '', 13, 2, 0, '204', '274ad4786c3abca69fa097b85867d9a4', '9829356100, 7023402006', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(743, 1, 5, 'Mast. Amar Sain', '2001-03-28', 'Mr. Anil Sain', '', 'Naayo Ki Gali, Kankroli', '', 13, 2, 0, '259', 'cfa0860e83a4c3a763a7e62d825349f7', '8852866000, 8829990021', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(744, 1, 5, 'Miss Chanchal Bhatia', '2002-02-17', 'Mr. Sanjay Bhatia', '', 'Bichho Mangari, Nathdwara / J.P. Marg', '', 13, 2, 0, '208', '091d584fced301b442654dd8c23b3fc9', '9784593802, 8696181535', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(745, 1, 5, 'Mast. Dhananjay Sharma', '2001-09-24', 'Mr. Prakash Sharma', '', 'Uba Ganeshji, Nathdwara, Rajsamand', '', 13, 2, 0, '209', 'b1d10e7bafa4421218a51b1e1f1b0ba2', '9829775380, 9602727783', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(746, 1, 5, 'Miss Dhruvi Paliwal', '2001-04-21', 'Mr. Dharmendra Paliwal', '', 'Rampura, Nathdwara', '', 13, 2, 0, '210', '6f3ef77ac0e3619e98159e9b6febf557', '9529730555, ', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(747, 1, 5, 'Mast. Dilip Dave', '2002-08-25', 'Mr. Ashok Dave', '', 'Govind Nagar, Nathdwara', '', 13, 2, 0, '211', 'eb163727917cbba1eea208541a643e74', '9460927324, 9462434374', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(748, 1, 5, 'Mast. Gautam Paliwal', '2001-11-27', 'Mr. Om Prakash Paliwal', '', 'Rampura, Nathdwara', '', 13, 2, 0, '213', '979d472a84804b9f647bc185a877a8b5', '9829082763, 9680310664', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(749, 1, 5, 'Mast. Harsh Soni', '2003-05-22', 'Mr. Lokesh Soni', '', 'Risala Chowk, Nathdwara', '', 13, 2, 0, '214', 'ca46c1b9512a7a8315fa3c5a946e8265', '9829407553, ', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(750, 1, 5, 'Mast. Himanshu Nandwana', '2003-03-14', 'Mr. Neeraj Nandwana', '', 'Shastri Nagar, Kankroli, (Raj.)', '', 13, 2, 0, '943', '2f885d0fbe2e131bfc9d98363e55d1d4', '9214342873, 8233972733', '', '', '', '', '', '', 0, '2017-06-17 11:30:30', 0),
(751, 1, 5, 'Mast. Kavya Vaishnav', '2003-07-10', 'Mr. Mahesh Vairagi', '', 'Mobe Gadh, Nathdwara', '', 13, 2, 0, '219', 'c0e190d8267e36708f955d7ab048990d', '9414251527, 9460824801', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(752, 1, 5, 'Miss Khushi Laddha', '2002-08-27', 'Mr. Manoj Laddha', '', 'Nayakwari, Rajnagar', '', 13, 2, 0, '944', '64223ccf70bbb65a3a4aceac37e21016', '9414173715, 9610855544', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(753, 1, 5, 'Miss Krishna Chhaparwal', '2002-05-15', 'Mr. Bal Krishna Chhaparwal', '', 'New Road, Nathdwara', '', 13, 2, 0, '222', 'bcbe3365e6ac95ea2c0343a2395834dd', '8290129615, 9462240518', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(754, 1, 5, 'Miss Kritika Sanadhya', '2002-09-01', 'Mr. Balendu Sanadhya', '', 'Sundar Vilas, Nathdwara', '', 13, 2, 0, '223', '115f89503138416a242f40fb7d7f338e', '9462071349, 9461375067', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(755, 1, 5, 'Miss Lakshita Jadiya', '2002-05-12', 'Mr. Chandraprakash Jadiya', '', 'New Road, Nathdwara', '', 13, 2, 0, '224', '13fe9d84310e77f13a6d184dbf1232f3', '7239949902, 9828352278', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(756, 1, 5, 'Mast. Lalit S. Asoliya', '2002-09-24', 'Mr. Chandan S. Asoliya', '', 'Bhawani Nagar, Rajsamand', '', 13, 2, 0, '1141', 'f7f580e11d00a75814d2ded41fe8e8fe', '9829230576, 9414172576', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(757, 1, 5, 'Mast. Mahip Gorana', '2001-08-19', 'Mr. Rajesh Gorana', '', 'Govind Nagar, Rajsamand', '', 13, 2, 0, '1169', '1e1d184167ca7676cf665225e236a3d2', '9461179194, 9962624284', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(758, 1, 5, 'Mast. Mohit Daiya', '2001-11-09', 'Mr. Rakesh Daiya', '', 'Vallabhpura, Nathdwara', '', 13, 2, 0, '227', '705f2172834666788607efbfca35afb3', '9602010907, 8559908033', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(759, 1, 5, 'Miss Payonidhi Joshi', '2002-06-18', 'Mr. Narendra Joshi', '', 'Bichhoo Mangari, Nathdwara / J.P. Marg', '', 13, 2, 0, '229', '57aeee35c98205091e18d1140e9f38cf', '9829526556, 9462513751', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(760, 1, 5, 'Mast. Piyush Dave', '2001-09-18', 'Mr. Ashok Dave', '', 'Govind Nagar, Nathdwara', '', 13, 2, 0, '230', '6da9003b743b65f4c0ccd295cc484e57', '9460927324, 9462434374', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(761, 1, 5, 'Mast. Priyansh Devpura', '2002-07-17', 'Mr. Dinesh Chandra Devpura', '', 'Kothariya, Nathdwara', '', 13, 2, 0, '231', '9b04d152845ec0a378394003c96da594', '9530077801, 9461386775', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(762, 1, 5, 'Mast. Raghav Inani', '2002-12-02', 'Mr. Bhagwati Inani', '', 'Lal Baagh, Kotharia Road, Nathdwara', '', 13, 2, 0, '234', '289dff07669d7a23de0ef88d2f7129e7', '9414472893, 9413953252', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(763, 1, 5, 'Mast. Raghav Laddha', '2002-07-18', 'Mr. Sharad Laddha', '', 'Nayakwari, Rajnagar', '', 13, 2, 0, '264', 'd6baf65e0b240ce177cf70da146c8dc8', '9413024935, 8233224935', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(764, 1, 5, 'Mast. Rohit S. Chouhan', '2003-01-25', 'Mr. Loomb Singh Chouhan', '', 'Police Line, Rajnagar', '', 13, 2, 0, '397', 'e46de7e1bcaaced9a54f1e9d0d2f800d', '9928774187, 7728972768', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(765, 1, 5, 'Miss Sakshi Jain', '2002-09-02', 'Mr. Sanjay Madrecha', '', 'Near Power House, White House, Rajsamand', '', 13, 2, 0, '240', '335f5352088d7d9bf74191e006d8e24c', '9950636866, 9461179464', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(766, 1, 5, 'Mast. Sudhanshu Somani', '2002-06-30', 'Mr. Navneet Somani', '', 'Lodha Ghati, Nathdwara', '', 13, 2, 0, '242', 'e4a6222cdb5b34375400904f03d8e6a5', '9887010182, 9829052514', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(767, 1, 5, 'Miss Swati Paliwal', '2001-10-28', 'Mr. Laxmi Lal Paliwal', '', 'Shri Ram Nagar, 100 Ft. Road, Kankroli', '', 13, 2, 0, '1142', '8ce6790cc6a94e65f17f908f462fae85', '9799695550, 9602194521', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(768, 1, 5, 'Miss Tanisha Maheshwari', '2002-08-03', 'Mr. Sagar Maheshwari', '', 'Mahaveer Nagar, 100 Feet Road, (Raj.)', '', 13, 2, 0, '489', '854d9fca60b4bd07f9bb215d59ef5561', '9829230154, 9414658570', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(769, 1, 5, 'Miss Urmila Deval', '2002-08-30', 'Mr. Sukhdev Singh Charan', '', 'Sukhadiya Nagar, Nathdwara', '', 13, 2, 0, '243', 'cb70ab375662576bd1ac5aaf16b3fca4', '7891866941, 9829378171', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(770, 1, 5, 'Miss Vandini Gurjar', '2002-11-21', 'Mr. Manish Gurjar', '', 'Gurjarpura, Nathdwara', '', 13, 2, 0, '245', '0266e33d3f546cb5436a10798e657d97', '9001602388, 9829923888', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(771, 1, 5, 'Miss Varshita Sharma', '2002-03-20', 'Mr. Vikas Sharma', '', 'Sukhadia Nagar, Nathdwara', '', 13, 2, 0, '246', '38db3aed920cf82ab059bfccbd02be6a', '9929961010, 9024380747', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(772, 1, 5, 'Miss Vidhika Gaur', '2002-09-22', 'Mr. Rakesh Gaur', '', 'Laal Bagh, Nathdwara', '', 13, 2, 0, '994', '934815ad542a4a7c5e8a2dfa04fea9f5', '9828873120, 8239311557', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(773, 1, 5, 'Miss Khushi Golani', '2003-01-05', 'Mr. Kishor Golani', '', 'D - 7, Housing Board, Nathdwara', '', 13, 2, 0, '944', '64223ccf70bbb65a3a4aceac37e21016', '9414343979, 9461944591', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(774, 1, 5, 'Mast. Chirag Agarwal', '2003-02-17', 'Mr. Mahaveer Prasad Agarwal', '', 'Sukhadia Nagar, Nathdwara', '', 13, 2, 0, '1236', '7bccfde7714a1ebadf06c5f4cea752c1', '7114508472, 7568304949', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(775, 1, 5, 'Mast. Abhinav Jain', '2003-01-11', 'Mr. Tarun Jain', '', 'Lal Baag, Dr. Colony, Nathdwara', '', 13, 1, 0, '202', '854d6fae5ee42911677c739ee1734486', '9460302242, 9251369087', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(776, 1, 5, 'Mast. Anubhav Soni', '2002-08-27', 'Mr. Jagdish Soni', '', 'Ganesh Tekri, Nathdwara', '', 13, 1, 0, '205', 'eae27d77ca20db309e056e3d2dcd7d69', '9828532840, 7665164206', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(777, 1, 5, 'Mast. Ayush Joshi', '2003-06-25', 'Mr. Jitendra Joshi', '', 'Nathuwas, Nathdwara', '', 13, 1, 0, '206', '7eabe3a1649ffa2b3ff8c02ebfd5659f', '9828380196, 9352903836', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(778, 1, 5, 'Mast. Bhavesh Kabra', '2002-09-16', 'Mr. Rajesh Kabra', '', 'Gurjarpura, Nathdwara', '', 13, 1, 0, '207', '69adc1e107f7f7d035d7baf04342e1ca', '9214933276, 8386948273', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(779, 1, 5, 'Miss Dhwani Ameta', '2002-12-06', 'Mr. Om Prakash Ameta', '', 'Suncity Road, Panchratn Complex, Kankroli', '', 13, 1, 0, '947', 'c4b31ce7d95c75ca70d50c19aef08bf1', '7568155485, 9928544772', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(780, 1, 5, 'Miss Divya Goswami', '2000-03-05', 'Mr. Rameshpuri Goswami', '', 'Nai Haweli Chowk, Nathdwara', '', 13, 1, 0, '212', '1534b76d325a8f591b52d302e7181331', '9929044250, 9829944250', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(781, 1, 5, 'Mast. Harshit Shrimali', '2002-03-23', 'Mr. Roshan Shrimali', '', 'Shreenath Colony - B, Nathdwara', '', 13, 1, 0, '215', '3b8a614226a953a8cd9526fca6fe9ba5', '9799575991, 9414621601', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(782, 1, 5, 'Mast. Hemang Hiran', '2002-03-24', 'Mr. Pankaj Hiran', '', 'Ajanta Furniture, Kankroli', '', 13, 1, 0, '289', '839ab46820b524afda05122893c2fe8e', '9413319426, 9509898980', '', '', '', '', '', '', 0, '2017-06-17 11:30:31', 0),
(783, 1, 5, 'Mast. Kartik Paliwal', '2002-05-15', 'Mr. Hargovind Paliwal', '', 'Near Newmorn Public School, Nathdwara', '', 13, 1, 0, '217', '63dc7ed1010d3c3b8269faf0ba7491d4', '9928855552, 9636888274', '', '', '', '', '', '', 0, '2017-06-17 11:30:32', 0),
(784, 1, 5, 'Miss Kashish Paliwal', '2002-10-27', 'Mr. Deepak Paliwal', '', 'New Road, Nathdwara', '', 13, 1, 0, '218', 'e96ed478dab8595a7dbda4cbcbee168f', '8003184939, 8769434165', '', '', '', '', '', '', 0, '2017-06-17 11:30:32', 0),
(785, 1, 5, 'Mast. Kavyansh Karnawat', '2002-03-22', 'Mr. Ajay Karnawat', '', 'Opp. Vandana Talkies, Nathdwara', '', 13, 1, 0, '291', '9c838d2e45b2ad1094d42f4ef36764f6', '9414171023, 02953 - 232423', '', '', '', '', '', '', 0, '2017-06-17 11:30:32', 0),
(786, 1, 5, 'Miss Khushi Kabra', '2002-06-28', 'Mr. Satyanarayan Kabra', '', 'Gurjarpura, Nathdwara', '', 13, 1, 0, '220', 'ec8ce6abb3e952a85b8551ba726a1227', '9116777171, 9829277664', '', '', '', '', '', '', 0, '2017-06-17 11:30:32', 0),
(787, 1, 5, 'Miss Khushi Sanadhya', '2002-11-10', 'Mr. Chandrashekhar Sanadhya', '', 'Lambi Gali, Nathdwara', '', 13, 1, 0, '221', '060ad92489947d410d897474079c1477', '9610010458, 9672699458', '', '', '', '', '', '', 0, '2017-06-17 11:30:32', 0),
(788, 1, 5, 'Mast. Lakshya Sanadhya', '2002-08-28', 'Mr. Sanjay Sanadhya', '', 'Behind Shreenathji Temple, Nathdwara', '', 13, 1, 0, '225', 'd1c38a09acc34845c6be3a127a5aacaf', '9828631305, 9887820747', '', '', '', '', '', '', 0, '2017-06-17 11:30:32', 0),
(789, 1, 5, 'Miss Nidhi Gurjar', '2003-09-17', 'Mr. Prakash Gurjar', '', 'Ganesh Tekri, Nathdwara', '', 13, 1, 0, '1217', '6a61d423d02a1c56250dc23ae7ff12f3', '9214948814, 9660247516', '', '', '', '', '', '', 0, '2017-06-17 11:30:32', 0),
(790, 1, 5, 'Mast. Nikunj Prajapat', '2002-03-14', 'Mr. Mukut Bihari Prajapat', '', 'Near Banas Pul, Gunjol, Nathdwara', '', 13, 1, 0, '228', '74db120f0a8e5646ef5a30154e9f6deb', '9828352848, 9772795322', '', '', '', '', '', '', 0, '2017-06-17 11:30:32', 0),
(791, 1, 5, 'Mast. Nitesh Singh Charan', '2001-03-15', 'Mr. Devraj Singh Charan', '', 'Kishor Nagar, (Manda), Rajsamand', '', 13, 1, 0, '1105', 'af21d0c97db2e27e13572cbf59eb343d', '9950724381, 9928835189', '', '', '', '', '', '', 0, '2017-06-17 11:30:32', 0),
(792, 1, 5, 'Mast. Parth Krishna', '2002-12-01', 'Mr. Arun Kumar Nandwana', '', 'Shanti Colony, Near Shiv Mandir, Kankroli', '', 13, 1, 0, '1102', 'c667d53acd899a97a85de0c201ba99be', '9950098663, 9950300933', '', '', '', '', '', '', 0, '2017-06-17 11:30:32', 0),
(793, 1, 5, 'Mast. Prateek Nandwana', '2002-03-29', 'Mr. Dinesh Chandra Nandwana', '', 'Shastri Nagar, Kankroli', '', 13, 1, 0, '942', 'b55ec28c52d5f6205684a473a2193564', '8290096862, 9214342878', '', '', '', '', '', '', 0, '2017-06-17 11:30:32', 0),
(794, 1, 5, 'Miss Priyanshi Rathi', '2002-03-06', 'Mr. Govind Rathi', '', 'Neem Wali Gali, Nathdwara', '', 13, 1, 0, '232', 'be83ab3ecd0db773eb2dc1b0a17836a1', '9660516638, 9783370468', '', '', '', '', '', '', 0, '2017-06-17 11:30:32', 0),
(795, 1, 5, 'Miss Ravina Kunwar Kitawat', '2003-08-31', 'Mr. Onkar Singh', '', 'Uriya, Nathdwara', '', 13, 1, 0, '1206', '144a3f71a03ab7c4f46f9656608efdb2', '9929425222, 9783429007', '', '', '', '', '', '', 0, '2017-06-17 11:30:32', 0),
(796, 1, 5, 'Mast. Rishit Laddha', '2002-05-11', 'Mr. Rakesh Laddha', '', 'Ram Nagar, Rajsamand', '', 13, 1, 0, '266', 'f7664060cc52bc6f3d620bcedc94a4b6', '9414173720, 8107108720', '', '', '', '', '', '', 0, '2017-06-17 11:30:32', 0),
(797, 1, 5, 'Mast. Rishit Sharma', '2003-01-26', 'Mr. Alok Kumar Sharma', '', 'Sukhadiya Nagar, Nathdwara', '', 13, 1, 0, '252', '03c6b06952c750899bb03d998e631860', '9829795674, 7742055789', '', '', '', '', '', '', 0, '2017-06-17 11:30:32', 0),
(798, 1, 5, 'Mast. Sahil Surana', '2002-12-22', 'Mr. Sunil Surana', '', 'New Road, Nathdwara', '', 13, 1, 0, '236', '01161aaa0b6d1345dd8fe4e481144d84', '9460574509, 8239486867', '', '', '', '', '', '', 0, '2017-06-17 11:30:32', 0),
(799, 1, 5, 'Miss Sejal Jain', '2002-04-03', 'Mr. Rajendra Jain', '', 'Friends Colony, Nathdwara', '', 13, 1, 0, '239', '555d6702c950ecb729a966504af0a635', '9414171485, 8003185512', '', '', '', '', '', '', 0, '2017-06-17 11:30:32', 0),
(800, 1, 5, 'Mast. Vishwas Sharma', '2002-05-03', 'Mr. Vishnu Sharma', '', 'Chitrakaron Ki Gali, Nathdwara', '', 13, 1, 0, '247', '3cec07e9ba5f5bb252d13f5f431e4bbb', '9602776669, 8386852955', '', '', '', '', '', '', 0, '2017-06-17 11:30:32', 0),
(801, 1, 5, 'Mast. Yash Paliwal', '2002-11-07', 'Mr. Pramendra Paliwal', '', 'Rampura, Nathdwara', '', 13, 1, 0, '248', '621bf66ddb7c962aa0d22ac97d69b793', '9799610003, 8107216555', '', '', '', '', '', '', 0, '2017-06-17 11:30:33', 0),
(802, 1, 5, 'Mast. Yashpal Singh Solanki', '2002-07-31', 'Mr. Pabu Singh Solanki', '', 'Siddharth Nagar, Jawad, Rajsamand', '', 13, 1, 0, '1123', '2cfd4560539f887a5e420412b370b361', '9414833727, 8561914109', '', '', '', '', '', '', 0, '2017-06-17 11:30:33', 0),
(803, 1, 5, 'Miss Yukta Arora', '2002-01-12', 'Mr. Ramesh Arora', '', 'Lakhotiya Gali, Nathdwara', '', 13, 1, 0, '250', '6c9882bbac1c7093bd25041881277658', '9929035768, 9829430456', '', '', '', '', '', '', 0, '2017-06-17 11:30:33', 0),
(804, 1, 5, 'Miss Kanisha Joshi', '2002-02-22', 'Mr. Purnashankar Joshi', '', 'Bijalai, Nathdwara', '', 13, 1, 0, '216', '45fbc6d3e05ebd93369ce542e8f2322d', '9413263899, 8003354511', '', '', '', '', '', '', 0, '2017-06-17 11:30:33', 0),
(805, 1, 5, 'Mast. Yashraj Sahu', '2001-10-22', 'Mr. Rajesh Sahu', '', 'Mahaveerpura, Nathdwara', '', 13, 1, 0, '249', '077e29b11be80ab57e1a2ecabb7da330', '8290129052, 9414343122', '', '', '', '', '', '', 0, '2017-06-17 11:30:33', 0),
(806, 1, 5, 'Miss Amisha Lodha', '2000-11-10', 'Mr. Natwar Lal Lodha', '', 'Ganesh Nagar, Nathdwara', '', 15, 4, 0, '994', '934815ad542a4a7c5e8a2dfa04fea9f5', '8302516920, 9460300206', '', '', '', '', '', '', 0, '2017-06-17 11:30:33', 0),
(807, 1, 5, 'Mast. Chirag Agrawal', '1999-12-17', 'Mr. Rakesh Agrawal', '', 'Sundar Colony, Kankroli', '', 15, 4, 0, '996', '0b8aff0438617c055eb55f0ba5d226fa', '8003216630, 9680747166', '', '', '', '', '', '', 0, '2017-06-21 06:26:40', 0),
(808, 1, 5, 'Miss Dishita Surana', '2000-05-01', 'Mr. Sunil Surana', '', 'Nakoda Nagar, Nathdwara', '', 15, 4, 0, '997', 'ec5aa0b7846082a2415f0902f0da88f2', '9352730117, 9672321117', '', '', '', '', '', '', 0, '2017-06-17 11:30:33', 0),
(809, 1, 5, 'Mast. Jay Sanadhya', '2001-05-14', 'Mr. Harish Kumar Sanadhya', '', 'Nakoda Nagar, Nathdwara', '', 15, 4, 0, '998', '9ab0d88431732957a618d4a469a0d4c3', '7742009194, 9460507622', '', '', '', '', '', '', 0, '2017-06-17 11:30:33', 0),
(810, 1, 5, 'Mast. Karan Singh Asoliya', '2001-08-25', 'Mr. Chandan S. Asoliya', '', 'J.K. Circle, Kankroli', '', 15, 4, 0, '999', 'b706835de79a2b4e80506f582af3676a', '9829230576, 9413730576', '', '', '', '', '', '', 0, '2017-06-17 11:30:33', 0),
(811, 1, 5, 'Mast. Keshav Purohit', '2000-06-04', 'Mr. Chandra Shekhar Purohit', '', 'Gurjarpura, Nathdwara', '', 15, 4, 0, '1000', 'a9b7ba70783b617e9998dc4dd82eb3c5', '8769439092, 7023261277', '', '', '', '', '', '', 0, '2017-06-17 11:30:34', 0),
(812, 1, 5, 'Miss Khushi Lodha', '2001-03-31', 'Late Mr. Amit Lodha', '', 'Lodha Ghati, Nathdwara', '', 15, 4, 0, '1001', 'b8c37e33defde51cf91e1e03e51657da', '9929773326', '', '', '', '', '', '', 0, '2017-06-17 11:30:34', 0),
(813, 1, 5, 'Mast. Lavish Kothari', '1999-08-05', 'Mr. Dinesh Kothari', '', 'Ahilya Kund, Nathdwara', '', 15, 4, 0, '1003', 'aa68c75c4a77c87f97fb686b2f068676', '9521777942, 9460802679', '', '', '', '', '', '', 0, '2017-06-17 11:30:34', 0),
(814, 1, 5, 'Mast. Naman Gokharu', '2001-07-30', 'Mr. Jeetendra Kumar Gokharu', '', 'Pancharatna Complex, Kankroli', '', 15, 4, 0, '1004', 'fed33392d3a48aa149a87a38b875ba4a', '9414780990, 9414164215', '', '', '', '', '', '', 0, '2017-06-17 11:30:34', 0),
(815, 1, 5, 'Mast. Nihir Sanadhya', '2001-04-11', 'Mr. Lavnesh Kumar Sanadhya', '', 'Nai Haveli Chowk, Nathdwara', '', 15, 4, 0, '1005', '2387337ba1e0b0249ba90f55b2ba2521', '9799327422', '', '', '', '', '', '', 0, '2017-06-17 11:30:34', 0),
(816, 1, 5, 'Mast. Nitesh Rathore', '2000-04-24', 'Mr. Jogendra Rathore', '', '404- Block 2, Krishna residency , Nathdwara', '', 15, 4, 0, '1006', '9246444d94f081e3549803b928260f56', '9799991899, 9660976303', '', '', '', '', '', '', 0, '2017-06-17 11:30:34', 0),
(817, 1, 5, 'Mast. Paritosh Sanadhya', '2000-12-19', 'Mr. Kapil Sanadhya', '', 'Choudhary Petrol Pump, Nathdwara', '', 15, 4, 0, '1007', 'd7322ed717dedf1eb4e6e52a37ea7bcd', '9799128028, 9352735450', '', '', '', '', '', '', 0, '2017-06-17 11:30:34', 0),
(818, 1, 5, 'Mast. Rishi Kumawat', '2001-01-18', 'Mr. Ganesh Lal Kumawat', '', 'Mohangarh, Nathdwara', '', 15, 4, 0, '1010', '1e48c4420b7073bc11916c6c1de226bb', '9587700951, 9829846910', '', '', '', '', '', '', 0, '2017-06-17 11:30:35', 0),
(819, 1, 5, 'Mast. Ritesh Sharma', '1999-04-03', 'Mr. Anil Kumar Sharma', '', 'Shanti Colony, Kankroli', '', 15, 4, 0, '1011', '7f975a56c761db6506eca0b37ce6ec87', '9214044557, 9214474557', '', '', '', '', '', '', 0, '2017-06-17 11:30:35', 0),
(820, 1, 5, 'Mast. Ritik Kumawat', '2001-04-11', 'Mr. Ghanshyam Kumawat', '', 'Fauz Mohalla, Nathdwara', '', 15, 4, 0, '1012', 'f33ba15effa5c10e873bf3842afb46a6', '9001781933, 9414877164', '', '', '', '', '', '', 0, '2017-06-17 11:30:35', 0),
(821, 1, 5, 'Miss Sejal Surana', '2000-03-06', 'Mr. Ravindra Surana', '', 'RTDC Road, Nathdwara', '', 15, 4, 0, '1013', '6b180037abbebea991d8b1232f8a8ca9', '9461259520, 9414342920', '', '', '', '', '', '', 0, '2017-06-17 11:30:35', 0),
(822, 1, 5, 'Mast. Siddharth Kabra', '2000-05-21', 'Mr. Rajesh Kumar Kabra', '', 'Nani Ji Ka Bhag, Nathdwara', '', 15, 4, 0, '1014', '766d856ef1a6b02f93d894415e6bfa0e', '7014315145, 9829081198', '', '', '', '', '', '', 0, '2017-06-17 11:30:35', 0),
(823, 1, 5, 'Mast. Vaibhav Purohit', '1999-10-01', 'Mr. Jagdish Chandra Purohit', '', 'Gurjarpura, Nathdwara', '', 15, 4, 0, '1016', '08fe2621d8e716b02ec0da35256a998d', '8233229401, 9460729401', '', '', '', '', '', '', 0, '2017-06-17 11:30:36', 0),
(824, 1, 5, 'Miss Vijaya Bohra', '2000-11-13', 'Mr. Purushottam Bohra', '', 'Tehsil Road, Nathdwara', '', 15, 4, 0, '1018', 'ef50c335cca9f340bde656363ebd02fd', '9414343103, 8875521305', '', '', '', '', '', '', 0, '2017-06-17 11:30:36', 0),
(825, 1, 5, 'Mast. Arpit Birla', '2000-03-09', 'Mr. Kedarmal Birla', '', 'Birla Mandir, 100ft. Road, Kankroli', '', 15, 4, 0, '995', '2bcab9d935d219641434683dd9d18a03', '8104394788, 9462023364', '', '', '', '', '', '', 0, '2017-06-17 11:30:36', 0),
(826, 1, 5, 'Mast. Udit Hinger', '2000-05-23', 'Mr. Bheru Lal Hinger', '', 'Dev Rachna'' Hinger Medical Nr. K.N. Hospital, Kankroli', '', 15, 4, 0, '1015', '298923c8190045e91288b430794814c4', '9887070670, 9785529750', '', '', '', '', '', '', 0, '2017-06-17 11:30:36', 0),
(827, 1, 5, 'Mast. Vaibhav Singh Charan', '2001-08-07', 'Mr. Narayan Singh', '', 'Kumbha Nagar, Shankarpura, Near R.K. Hospital, Kankroli', '', 15, 4, 0, '1017', '5d616dd38211ebb5d6ec52986674b6e4', '9928076432, 9783706535', '', '', '', '', '', '', 0, '2017-06-17 11:30:36', 0),
(828, 1, 5, 'Mast. Purushottam Singh Chundawat', '2000-10-08', 'Mr. Rajendra Singh', '', 'D - 23, Dhwarika Nagar, Housing Board, Kankroli', '', 15, 4, 0, '1008', '1587965fb4d4b5afe8428a4a024feb0d', '9414926338, 9460301308', '', '', '', '', '', '', 0, '2017-06-17 11:30:37', 0),
(829, 1, 5, 'Mast. Raghunandan Singh', '2000-09-13', 'Mr. Govind Singh', '', 'Near Graphic School, Panch Ratna Complex, H.No. P - 30, Kankroli', '', 15, 4, 0, '1009', '31b3b31a1c2f8a370206f111127c0dbd', '7737460355, 9829840938', '', '', '', '', '', '', 0, '2017-06-17 11:30:37', 0),
(830, 1, 5, 'Mast. Yuvraj Singh Rathore', '2000-05-29', 'Mr. Abhay Singh', '', 'Anand Nagar, Nathdwara', '', 15, 4, 0, '1019', '03e0704b5690a2dee1861dc3ad3316c9', '9799777680, 7568073482', '', '', '', '', '', '', 0, '2017-06-17 11:30:37', 0),
(831, 1, 5, 'Mast. Krishan Pal Singh Chouhan', '1998-07-22', 'Mr. Bhim Singh Chouhan', '', 'Village - Kuncholi, Teh. - Nathdwara', '', 15, 4, 0, '1002', 'fba9d88164f3e2d9109ee770223212a0', '8619221980, 9772011101', '', '', '', '', '', '', 0, '2017-06-17 11:30:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_bus`
--

CREATE TABLE `master_bus` (
  `id` int(11) NOT NULL,
  `vehicle_type` varchar(223) NOT NULL,
  `vehicle_no` varchar(225) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_bus`
--

INSERT INTO `master_bus` (`id`, `vehicle_type`, `vehicle_no`, `flag`) VALUES
(1, 'Bus', 'Bus121', 0),
(2, 'Bus', 'a1', 0),
(3, 'Bus', 'b2', 0),
(4, 'Bus', '121', 0),
(5, 'Bus', '121', 0),
(6, 'Bus', '121', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_category`
--

CREATE TABLE `master_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_category`
--

INSERT INTO `master_category` (`id`, `category_name`) VALUES
(1, 'Examination'),
(2, 'Holiday'),
(3, 'Festival'),
(4, 'Event'),
(5, 'News'),
(6, 'Notice');

-- --------------------------------------------------------

--
-- Table structure for table `master_class`
--

CREATE TABLE `master_class` (
  `id` int(11) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `roman` varchar(50) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_class`
--

INSERT INTO `master_class` (`id`, `class_name`, `roman`, `flag`) VALUES
(1, 'Nursery', 'Nursery', 0),
(2, 'LKG', 'LKG', 0),
(3, 'HKG', 'HKG', 0),
(4, 'First', 'I', 0),
(5, 'Second', 'II', 0),
(6, 'Third', 'III', 0),
(7, 'Fouth', 'IV', 0),
(8, 'Fifth', 'V', 0),
(9, 'Sixth', 'VI', 0),
(10, 'Seventh', 'VII', 0),
(11, 'Eighth', 'VIII', 0),
(12, 'Ninth', 'IX', 0),
(13, 'Tenth', 'X', 0),
(14, 'Eleventh', 'XI', 0),
(15, 'Twelfth', 'XII', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_exam`
--

CREATE TABLE `master_exam` (
  `id` int(11) NOT NULL,
  `exam_type` varchar(223) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_exam`
--

INSERT INTO `master_exam` (`id`, `exam_type`, `flag`) VALUES
(1, 'dasdfsafffsa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_item`
--

CREATE TABLE `master_item` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_item`
--

INSERT INTO `master_item` (`id`, `item_name`, `price`, `flag`) VALUES
(1, 'Books', 10000, 0),
(2, 'TV', 15000, 0),
(3, 'AC', 20000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_medium`
--

CREATE TABLE `master_medium` (
  `id` int(11) NOT NULL,
  `medium_name` varchar(200) NOT NULL,
  `flag` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_medium`
--

INSERT INTO `master_medium` (`id`, `medium_name`, `flag`) VALUES
(1, 'CBSE', 0),
(2, 'RBSE', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_role`
--

CREATE TABLE `master_role` (
  `id` int(2) NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_role`
--

INSERT INTO `master_role` (`id`, `role_name`) VALUES
(1, 'All'),
(2, 'Director'),
(3, 'Principal'),
(4, 'Teacher'),
(5, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `master_section`
--

CREATE TABLE `master_section` (
  `id` int(11) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_section`
--

INSERT INTO `master_section` (`id`, `section_name`, `flag`) VALUES
(1, 'Lily', 0),
(2, 'Rose', 0),
(3, 'Marigold', 0),
(4, 'Science', 0),
(5, 'Commerce', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_sports`
--

CREATE TABLE `master_sports` (
  `id` int(11) NOT NULL,
  `sports_name` varchar(225) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_sports`
--

INSERT INTO `master_sports` (`id`, `sports_name`, `flag`) VALUES
(1, 'Basketball', 0),
(2, 'Archery', 0),
(3, 'cricket', 0),
(4, 'Karate', 0),
(5, 'Badminten', 0),
(6, 'Tenis', 0),
(7, 'Laun Tenis', 1),
(8, 'scatting', 0),
(9, 'Kusti', 0),
(10, 'Swimming', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_station`
--

CREATE TABLE `master_station` (
  `id` int(11) NOT NULL,
  `station` varchar(222) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_station`
--

INSERT INTO `master_station` (`id`, `station`, `flag`) VALUES
(1, 'station 1', 0),
(2, 'station 2', 0),
(3, 'station 3', 0),
(4, 'station 4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_subject`
--

CREATE TABLE `master_subject` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_subject`
--

INSERT INTO `master_subject` (`id`, `subject_name`, `flag`) VALUES
(1, 'English', 0),
(2, 'Hindi', 0),
(3, 'Maths', 0),
(4, 'EVS', 0),
(5, 'Computer', 0),
(6, 'G.K.', 0),
(7, 'Art', 0),
(8, 'Physical Education', 0),
(9, 'Music', 0),
(10, 'Science', 0),
(11, 'Social Studies', 0),
(12, 'Sanskrit', 0),
(13, 'French', 0),
(14, 'Physics', 0),
(15, 'Chemistry', 0),
(16, 'Biology', 0),
(17, 'Business Studies', 0),
(18, 'Accountancy', 0),
(19, 'Economics', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_vendor`
--

CREATE TABLE `master_vendor` (
  `id` int(11) NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_vendor`
--

INSERT INTO `master_vendor` (`id`, `vendor_name`, `flag`) VALUES
(1, 'ZENOX', 0),
(2, 'KAN', 0);

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
(78, 'Return', 'Inventory', 'fa fa-suitcase', '', '', 'item_return.php', 'fa fa-truck', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `featured_image` varchar(100) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `curent_date` date NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `role_id`, `featured_image`, `title`, `description`, `date`, `category_id`, `user_id`, `curent_date`, `flag`) VALUES
(1, 1, '35561498020531.jpeg', 'Test Event', 'Test Event 21 June', '2017-06-30', 5, 1, '2017-06-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `curent_date` date NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id`, `user_id`, `note`, `curent_date`, `flag`) VALUES
(1, 1, 'sddsfds', '2017-05-29', 0),
(2, 1, 'bbbbbbbbb', '2017-05-29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(10) NOT NULL,
  `role_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notice_no` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `dateofpublish` date NOT NULL,
  `time` varchar(100) NOT NULL,
  `class_id` varchar(200) NOT NULL,
  `section_id` varchar(200) NOT NULL,
  `medium_id` varchar(200) NOT NULL,
  `noticedetails` mediumtext NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `curent_date` date NOT NULL,
  `shareable` int(11) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `role_id`, `category_id`, `user_id`, `notice_no`, `image`, `title`, `description`, `dateofpublish`, `time`, `class_id`, `section_id`, `medium_id`, `noticedetails`, `file_name`, `curent_date`, `shareable`, `flag`) VALUES
(1, 2, 6, 1, 'CBA/2017-2018/A/1', 'notice1.jpg', 'dasd', 'dasdas', '2017-06-21', '03:15 PM', '1,2', '', '', '<center><img src="img/CBAlogo.png" width="150px" height="150px" /></center><center>dasdasasdas</center>', 'notice1.pdf', '0000-00-00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `submitted_by` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `title`, `message`, `user_id`, `role_id`, `submitted_by`, `timestamp`, `date`, `time`) VALUES
(1, 'New Appointment', 'New Appointment Request Submitted', 3, 0, 1, '2017-04-14 05:13:32', '', ''),
(2, 'Leave Application', 'Your Leave Application Approved', 1, 5, 0, '2017-04-15 10:00:24', 'Apr 15 2017', '03:30 PM'),
(3, 'Appointment', 'Your Appointment is Completed', 1, 5, 1, '2017-04-15 10:52:01', 'Apr 15 2017', '04:22 PM'),
(4, 'Syllabus', 'Your Class Syllabus Added', 297, 5, 1, '2017-06-08 08:41:58', 'Jun 08 2017', '02:11 PM'),
(5, 'Syllabus', 'Your Class Syllabus Added', 298, 5, 1, '2017-06-08 08:42:00', 'Jun 08 2017', '02:12 PM'),
(6, 'Syllabus', 'Your Class Syllabus Added', 300, 5, 1, '2017-06-08 08:42:01', 'Jun 08 2017', '02:12 PM'),
(7, 'Syllabus', 'Your Class Syllabus Added', 306, 5, 1, '2017-06-08 08:42:02', 'Jun 08 2017', '02:12 PM'),
(8, 'Syllabus', 'Your Class Syllabus Added', 310, 5, 1, '2017-06-08 08:42:03', 'Jun 08 2017', '02:12 PM'),
(9, 'Syllabus', 'Your Class Syllabus Added', 316, 5, 1, '2017-06-08 08:42:04', 'Jun 08 2017', '02:12 PM'),
(10, 'Syllabus', 'Your Class Syllabus Added', 317, 5, 1, '2017-06-08 08:42:04', 'Jun 08 2017', '02:12 PM'),
(11, 'Syllabus', 'Your Class Syllabus Added', 318, 5, 1, '2017-06-08 08:42:05', 'Jun 08 2017', '02:12 PM'),
(12, 'Syllabus', 'Your Class Syllabus Added', 323, 5, 1, '2017-06-08 08:42:05', 'Jun 08 2017', '02:12 PM'),
(13, 'Syllabus', 'Your Class Syllabus Added', 324, 5, 1, '2017-06-08 08:42:06', 'Jun 08 2017', '02:12 PM'),
(14, 'Syllabus', 'Your Class Syllabus Added', 327, 5, 1, '2017-06-08 08:42:07', 'Jun 08 2017', '02:12 PM'),
(15, 'Syllabus', 'Your Class Syllabus Added', 328, 5, 1, '2017-06-08 08:42:07', 'Jun 08 2017', '02:12 PM'),
(16, 'Syllabus', 'Your Class Syllabus Added', 330, 5, 1, '2017-06-08 08:42:08', 'Jun 08 2017', '02:12 PM'),
(17, 'Syllabus', 'Your Class Syllabus Added', 331, 5, 1, '2017-06-08 08:42:09', 'Jun 08 2017', '02:12 PM'),
(18, 'Syllabus', 'Your Class Syllabus Added', 333, 5, 1, '2017-06-08 08:42:09', 'Jun 08 2017', '02:12 PM'),
(19, 'Syllabus', 'Your Class Syllabus Added', 335, 5, 1, '2017-06-08 08:42:10', 'Jun 08 2017', '02:12 PM'),
(20, 'Syllabus', 'Your Class Syllabus Added', 341, 5, 1, '2017-06-08 08:42:12', 'Jun 08 2017', '02:12 PM'),
(21, 'Syllabus', 'Your Class Syllabus Added', 343, 5, 1, '2017-06-08 08:42:13', 'Jun 08 2017', '02:12 PM'),
(22, 'Syllabus', 'Your Class Syllabus Added', 346, 5, 1, '2017-06-08 08:42:13', 'Jun 08 2017', '02:12 PM'),
(23, 'Syllabus', 'Your Class Syllabus Added', 347, 5, 1, '2017-06-08 08:42:15', 'Jun 08 2017', '02:12 PM'),
(24, 'Syllabus', 'Your Class Syllabus Added', 351, 5, 1, '2017-06-08 08:42:16', 'Jun 08 2017', '02:12 PM'),
(25, 'Syllabus', 'Your Class Syllabus Added', 352, 5, 1, '2017-06-08 08:42:17', 'Jun 08 2017', '02:12 PM'),
(26, 'Syllabus', 'Your Class Syllabus Added', 353, 5, 1, '2017-06-08 08:42:18', 'Jun 08 2017', '02:12 PM'),
(27, 'Syllabus', 'Your Class Syllabus Added', 354, 5, 1, '2017-06-08 08:42:19', 'Jun 08 2017', '02:12 PM'),
(28, 'Syllabus', 'Your Class Syllabus Added', 358, 5, 1, '2017-06-08 08:42:19', 'Jun 08 2017', '02:12 PM'),
(29, 'Syllabus', 'Your Class Syllabus Added', 362, 5, 1, '2017-06-08 08:42:20', 'Jun 08 2017', '02:12 PM'),
(30, 'Syllabus', 'Your Class Syllabus Added', 366, 5, 1, '2017-06-08 08:42:20', 'Jun 08 2017', '02:12 PM'),
(31, 'Syllabus', 'Your Class Syllabus Added', 367, 5, 1, '2017-06-08 08:42:21', 'Jun 08 2017', '02:12 PM'),
(32, 'Syllabus', 'Your Class Syllabus Added', 368, 5, 1, '2017-06-08 08:42:22', 'Jun 08 2017', '02:12 PM'),
(33, 'Syllabus', 'Your Class Syllabus Added', 369, 5, 1, '2017-06-08 08:42:22', 'Jun 08 2017', '02:12 PM'),
(34, 'Syllabus', 'Your Class Syllabus Added', 370, 5, 1, '2017-06-08 08:42:26', 'Jun 08 2017', '02:12 PM'),
(35, 'Syllabus', 'Your Class Syllabus Added', 372, 5, 1, '2017-06-08 08:42:27', 'Jun 08 2017', '02:12 PM'),
(36, 'Syllabus', 'Your Class Syllabus Added', 375, 5, 1, '2017-06-08 08:42:27', 'Jun 08 2017', '02:12 PM'),
(37, 'Syllabus', 'Your Class Syllabus Added', 377, 5, 1, '2017-06-08 08:42:28', 'Jun 08 2017', '02:12 PM'),
(38, 'Syllabus', 'Your Class Syllabus Added', 379, 5, 1, '2017-06-08 08:42:28', 'Jun 08 2017', '02:12 PM'),
(39, 'Syllabus', 'Your Class Syllabus Added', 380, 5, 1, '2017-06-08 08:42:29', 'Jun 08 2017', '02:12 PM'),
(40, 'Syllabus', 'Your Class Syllabus Added', 382, 5, 1, '2017-06-08 08:42:29', 'Jun 08 2017', '02:12 PM'),
(41, 'Syllabus', 'Your Class Syllabus Added', 383, 5, 1, '2017-06-08 08:42:30', 'Jun 08 2017', '02:12 PM'),
(42, 'Syllabus', 'Your Class Syllabus Added', 385, 5, 1, '2017-06-08 08:42:30', 'Jun 08 2017', '02:12 PM'),
(43, 'Syllabus', 'Your Class Syllabus Added', 386, 5, 1, '2017-06-08 08:42:31', 'Jun 08 2017', '02:12 PM'),
(44, 'Syllabus', 'Your Class Syllabus Added', 387, 5, 1, '2017-06-08 08:42:31', 'Jun 08 2017', '02:12 PM'),
(45, 'Syllabus', 'Your Class Syllabus Added', 388, 5, 1, '2017-06-08 08:42:32', 'Jun 08 2017', '02:12 PM'),
(46, 'Syllabus', 'Your Class Syllabus Added', 390, 5, 1, '2017-06-08 08:42:33', 'Jun 08 2017', '02:12 PM'),
(47, 'Syllabus', 'Your Class Syllabus Added', 391, 5, 1, '2017-06-08 08:42:33', 'Jun 08 2017', '02:12 PM'),
(48, 'Syllabus', 'Your Class Syllabus Added', 393, 5, 1, '2017-06-08 08:42:34', 'Jun 08 2017', '02:12 PM'),
(49, 'Syllabus', 'Your Class Syllabus Added', 394, 5, 1, '2017-06-08 08:42:38', 'Jun 08 2017', '02:12 PM'),
(50, 'Syllabus', 'Your Class Syllabus Added', 396, 5, 1, '2017-06-08 08:42:38', 'Jun 08 2017', '02:12 PM'),
(51, 'Syllabus', 'Your Class Syllabus Added', 397, 5, 1, '2017-06-08 08:42:39', 'Jun 08 2017', '02:12 PM'),
(52, 'Syllabus', 'Your Class Syllabus Added', 399, 5, 1, '2017-06-08 08:42:40', 'Jun 08 2017', '02:12 PM'),
(53, 'Syllabus', 'Your Class Syllabus Added', 400, 5, 1, '2017-06-08 08:42:40', 'Jun 08 2017', '02:12 PM'),
(54, 'Syllabus', 'Your Class Syllabus Added', 402, 5, 1, '2017-06-08 08:42:41', 'Jun 08 2017', '02:12 PM'),
(55, 'Syllabus', 'Your Class Syllabus Added', 403, 5, 1, '2017-06-08 08:42:42', 'Jun 08 2017', '02:12 PM'),
(56, 'Syllabus', 'Your Class Syllabus Added', 404, 5, 1, '2017-06-08 08:42:43', 'Jun 08 2017', '02:12 PM'),
(57, 'Syllabus', 'Your Class Syllabus Added', 405, 5, 1, '2017-06-08 08:42:43', 'Jun 08 2017', '02:12 PM'),
(58, 'Syllabus', 'Your Class Syllabus Added', 2188, 5, 1, '2017-06-08 08:42:44', 'Jun 08 2017', '02:12 PM'),
(59, 'Syllabus', 'Your Class Syllabus Added', 2189, 5, 1, '2017-06-08 08:42:44', 'Jun 08 2017', '02:12 PM'),
(60, 'Syllabus', 'Your Class Syllabus Added', 2190, 5, 1, '2017-06-08 08:42:45', 'Jun 08 2017', '02:12 PM'),
(61, 'Syllabus', 'Your Class Syllabus Added', 2191, 5, 1, '2017-06-08 08:42:45', 'Jun 08 2017', '02:12 PM'),
(62, 'Syllabus', 'Your Class Syllabus Added', 2192, 5, 1, '2017-06-08 08:42:46', 'Jun 08 2017', '02:12 PM'),
(63, 'Syllabus', 'Your Class Syllabus Added', 2193, 5, 1, '2017-06-08 08:42:47', 'Jun 08 2017', '02:12 PM'),
(64, 'Syllabus', 'Your Class Syllabus Added', 2194, 5, 1, '2017-06-08 08:42:47', 'Jun 08 2017', '02:12 PM'),
(65, 'Syllabus', 'Your Class Syllabus Added', 2195, 5, 1, '2017-06-08 08:42:48', 'Jun 08 2017', '02:12 PM'),
(66, 'Syllabus', 'Your Class Syllabus Added', 2196, 5, 1, '2017-06-08 08:42:49', 'Jun 08 2017', '02:12 PM'),
(67, 'Syllabus', 'Your Class Syllabus Added', 2197, 5, 1, '2017-06-08 08:42:49', 'Jun 08 2017', '02:12 PM'),
(68, 'Syllabus', 'Your Class Syllabus Added', 2198, 5, 1, '2017-06-08 08:42:50', 'Jun 08 2017', '02:12 PM'),
(69, 'Syllabus', 'Your Class Syllabus Added', 2199, 5, 1, '2017-06-08 08:42:51', 'Jun 08 2017', '02:12 PM'),
(70, 'Syllabus', 'Your Class Syllabus Added', 2200, 5, 1, '2017-06-08 08:42:55', 'Jun 08 2017', '02:12 PM'),
(71, 'Syllabus', 'Your Class Syllabus Added', 2201, 5, 1, '2017-06-08 08:42:55', 'Jun 08 2017', '02:12 PM'),
(72, 'Syllabus', 'Your Class Syllabus Added', 2202, 5, 1, '2017-06-08 08:42:56', 'Jun 08 2017', '02:12 PM'),
(73, 'Syllabus', 'Your Class Syllabus Added', 2203, 5, 1, '2017-06-08 08:42:57', 'Jun 08 2017', '02:12 PM'),
(74, 'Syllabus', 'Your Class Syllabus Added', 2204, 5, 1, '2017-06-08 08:42:59', 'Jun 08 2017', '02:12 PM'),
(75, 'Syllabus', 'Your Class Syllabus Added', 2205, 5, 1, '2017-06-08 08:42:59', 'Jun 08 2017', '02:12 PM'),
(76, 'Syllabus', 'Your Class Syllabus Added', 2206, 5, 1, '2017-06-08 08:43:00', 'Jun 08 2017', '02:13 PM'),
(77, 'Syllabus', 'Your Class Syllabus Added', 2207, 5, 1, '2017-06-08 08:43:00', 'Jun 08 2017', '02:13 PM'),
(78, 'Syllabus', 'Your Class Syllabus Added', 2208, 5, 1, '2017-06-08 08:43:01', 'Jun 08 2017', '02:13 PM'),
(79, 'Syllabus', 'Your Class Syllabus Added', 2209, 5, 1, '2017-06-08 08:43:01', 'Jun 08 2017', '02:13 PM'),
(80, 'Syllabus', 'Your Class Syllabus Added', 2210, 5, 1, '2017-06-08 08:43:02', 'Jun 08 2017', '02:13 PM'),
(81, 'Syllabus', 'Your Class Syllabus Added', 2211, 5, 1, '2017-06-08 08:43:02', 'Jun 08 2017', '02:13 PM'),
(82, 'Syllabus', 'Your Class Syllabus Added', 2212, 5, 1, '2017-06-08 08:43:02', 'Jun 08 2017', '02:13 PM'),
(83, 'Syllabus', 'Your Class Syllabus Added', 2213, 5, 1, '2017-06-08 08:43:03', 'Jun 08 2017', '02:13 PM'),
(84, 'Syllabus', 'Your Class Syllabus Added', 2214, 5, 1, '2017-06-08 08:43:03', 'Jun 08 2017', '02:13 PM'),
(85, 'Syllabus', 'Your Class Syllabus Added', 2215, 5, 1, '2017-06-08 08:43:04', 'Jun 08 2017', '02:13 PM'),
(86, 'Syllabus', 'Your Class Syllabus Added', 2216, 5, 1, '2017-06-08 08:43:04', 'Jun 08 2017', '02:13 PM'),
(87, 'Syllabus', 'Your Class Syllabus Added', 2217, 5, 1, '2017-06-08 08:43:05', 'Jun 08 2017', '02:13 PM'),
(88, 'Syllabus', 'Your Class Syllabus Added', 2218, 5, 1, '2017-06-08 08:43:06', 'Jun 08 2017', '02:13 PM'),
(89, 'Syllabus', 'Your Class Syllabus Added', 2219, 5, 1, '2017-06-08 08:43:07', 'Jun 08 2017', '02:13 PM'),
(90, 'Syllabus', 'Your Class Syllabus Added', 2220, 5, 1, '2017-06-08 08:43:09', 'Jun 08 2017', '02:13 PM'),
(91, 'Syllabus', 'Your Class Syllabus Added', 2221, 5, 1, '2017-06-08 08:43:10', 'Jun 08 2017', '02:13 PM'),
(92, 'Syllabus', 'Your Class Syllabus Added', 2222, 5, 1, '2017-06-08 08:43:10', 'Jun 08 2017', '02:13 PM'),
(93, 'Syllabus', 'Your Class Syllabus Added', 2223, 5, 1, '2017-06-08 08:43:11', 'Jun 08 2017', '02:13 PM'),
(94, 'Syllabus', 'Your Class Syllabus Added', 2224, 5, 1, '2017-06-08 08:43:12', 'Jun 08 2017', '02:13 PM'),
(95, 'Syllabus', 'Your Class Syllabus Added', 299, 5, 1, '2017-06-08 08:44:19', 'Jun 08 2017', '02:14 PM'),
(96, 'Syllabus', 'Your Class Syllabus Added', 301, 5, 1, '2017-06-08 08:44:19', 'Jun 08 2017', '02:14 PM'),
(97, 'Syllabus', 'Your Class Syllabus Added', 302, 5, 1, '2017-06-08 08:44:20', 'Jun 08 2017', '02:14 PM'),
(98, 'Syllabus', 'Your Class Syllabus Added', 303, 5, 1, '2017-06-08 08:44:20', 'Jun 08 2017', '02:14 PM'),
(99, 'Syllabus', 'Your Class Syllabus Added', 304, 5, 1, '2017-06-08 08:44:21', 'Jun 08 2017', '02:14 PM'),
(100, 'Syllabus', 'Your Class Syllabus Added', 305, 5, 1, '2017-06-08 08:44:21', 'Jun 08 2017', '02:14 PM'),
(101, 'Syllabus', 'Your Class Syllabus Added', 307, 5, 1, '2017-06-08 08:44:22', 'Jun 08 2017', '02:14 PM'),
(102, 'Syllabus', 'Your Class Syllabus Added', 308, 5, 1, '2017-06-08 08:44:22', 'Jun 08 2017', '02:14 PM'),
(103, 'Syllabus', 'Your Class Syllabus Added', 309, 5, 1, '2017-06-08 08:44:23', 'Jun 08 2017', '02:14 PM'),
(104, 'Syllabus', 'Your Class Syllabus Added', 311, 5, 1, '2017-06-08 08:44:23', 'Jun 08 2017', '02:14 PM'),
(105, 'Syllabus', 'Your Class Syllabus Added', 312, 5, 1, '2017-06-08 08:44:25', 'Jun 08 2017', '02:14 PM'),
(106, 'Syllabus', 'Your Class Syllabus Added', 313, 5, 1, '2017-06-08 08:44:27', 'Jun 08 2017', '02:14 PM'),
(107, 'Syllabus', 'Your Class Syllabus Added', 314, 5, 1, '2017-06-08 08:44:28', 'Jun 08 2017', '02:14 PM'),
(108, 'Syllabus', 'Your Class Syllabus Added', 315, 5, 1, '2017-06-08 08:44:31', 'Jun 08 2017', '02:14 PM'),
(109, 'Syllabus', 'Your Class Syllabus Added', 319, 5, 1, '2017-06-08 08:44:31', 'Jun 08 2017', '02:14 PM'),
(110, 'Syllabus', 'Your Class Syllabus Added', 320, 5, 1, '2017-06-08 08:44:32', 'Jun 08 2017', '02:14 PM'),
(111, 'Syllabus', 'Your Class Syllabus Added', 321, 5, 1, '2017-06-08 08:44:32', 'Jun 08 2017', '02:14 PM'),
(112, 'Syllabus', 'Your Class Syllabus Added', 322, 5, 1, '2017-06-08 08:44:33', 'Jun 08 2017', '02:14 PM'),
(113, 'Syllabus', 'Your Class Syllabus Added', 325, 5, 1, '2017-06-08 08:44:34', 'Jun 08 2017', '02:14 PM'),
(114, 'Syllabus', 'Your Class Syllabus Added', 326, 5, 1, '2017-06-08 08:44:34', 'Jun 08 2017', '02:14 PM'),
(115, 'Syllabus', 'Your Class Syllabus Added', 329, 5, 1, '2017-06-08 08:44:35', 'Jun 08 2017', '02:14 PM'),
(116, 'Syllabus', 'Your Class Syllabus Added', 332, 5, 1, '2017-06-08 08:44:35', 'Jun 08 2017', '02:14 PM'),
(117, 'Syllabus', 'Your Class Syllabus Added', 334, 5, 1, '2017-06-08 08:44:36', 'Jun 08 2017', '02:14 PM'),
(118, 'Syllabus', 'Your Class Syllabus Added', 336, 5, 1, '2017-06-08 08:44:36', 'Jun 08 2017', '02:14 PM'),
(119, 'Syllabus', 'Your Class Syllabus Added', 337, 5, 1, '2017-06-08 08:44:36', 'Jun 08 2017', '02:14 PM'),
(120, 'Syllabus', 'Your Class Syllabus Added', 338, 5, 1, '2017-06-08 08:44:37', 'Jun 08 2017', '02:14 PM'),
(121, 'Syllabus', 'Your Class Syllabus Added', 339, 5, 1, '2017-06-08 08:44:38', 'Jun 08 2017', '02:14 PM'),
(122, 'Syllabus', 'Your Class Syllabus Added', 340, 5, 1, '2017-06-08 08:44:39', 'Jun 08 2017', '02:14 PM'),
(123, 'Syllabus', 'Your Class Syllabus Added', 342, 5, 1, '2017-06-08 08:44:40', 'Jun 08 2017', '02:14 PM'),
(124, 'Syllabus', 'Your Class Syllabus Added', 344, 5, 1, '2017-06-08 08:44:41', 'Jun 08 2017', '02:14 PM'),
(125, 'Syllabus', 'Your Class Syllabus Added', 345, 5, 1, '2017-06-08 08:44:41', 'Jun 08 2017', '02:14 PM'),
(126, 'Syllabus', 'Your Class Syllabus Added', 348, 5, 1, '2017-06-08 08:44:42', 'Jun 08 2017', '02:14 PM'),
(127, 'Syllabus', 'Your Class Syllabus Added', 349, 5, 1, '2017-06-08 08:44:43', 'Jun 08 2017', '02:14 PM'),
(128, 'Syllabus', 'Your Class Syllabus Added', 350, 5, 1, '2017-06-08 08:44:44', 'Jun 08 2017', '02:14 PM'),
(129, 'Syllabus', 'Your Class Syllabus Added', 355, 5, 1, '2017-06-08 08:44:47', 'Jun 08 2017', '02:14 PM'),
(130, 'Syllabus', 'Your Class Syllabus Added', 356, 5, 1, '2017-06-08 08:44:47', 'Jun 08 2017', '02:14 PM'),
(131, 'Syllabus', 'Your Class Syllabus Added', 357, 5, 1, '2017-06-08 08:44:48', 'Jun 08 2017', '02:14 PM'),
(132, 'Syllabus', 'Your Class Syllabus Added', 359, 5, 1, '2017-06-08 08:44:49', 'Jun 08 2017', '02:14 PM'),
(133, 'Syllabus', 'Your Class Syllabus Added', 360, 5, 1, '2017-06-08 08:44:50', 'Jun 08 2017', '02:14 PM'),
(134, 'Syllabus', 'Your Class Syllabus Added', 361, 5, 1, '2017-06-08 08:44:50', 'Jun 08 2017', '02:14 PM'),
(135, 'Syllabus', 'Your Class Syllabus Added', 363, 5, 1, '2017-06-08 08:44:51', 'Jun 08 2017', '02:14 PM'),
(136, 'Syllabus', 'Your Class Syllabus Added', 364, 5, 1, '2017-06-08 08:44:52', 'Jun 08 2017', '02:14 PM'),
(137, 'Syllabus', 'Your Class Syllabus Added', 365, 5, 1, '2017-06-08 08:44:52', 'Jun 08 2017', '02:14 PM'),
(138, 'Syllabus', 'Your Class Syllabus Added', 371, 5, 1, '2017-06-08 08:44:53', 'Jun 08 2017', '02:14 PM'),
(139, 'Syllabus', 'Your Class Syllabus Added', 373, 5, 1, '2017-06-08 08:44:53', 'Jun 08 2017', '02:14 PM'),
(140, 'Syllabus', 'Your Class Syllabus Added', 374, 5, 1, '2017-06-08 08:44:53', 'Jun 08 2017', '02:14 PM'),
(141, 'Syllabus', 'Your Class Syllabus Added', 376, 5, 1, '2017-06-08 08:44:54', 'Jun 08 2017', '02:14 PM'),
(142, 'Syllabus', 'Your Class Syllabus Added', 378, 5, 1, '2017-06-08 08:44:55', 'Jun 08 2017', '02:14 PM'),
(143, 'Syllabus', 'Your Class Syllabus Added', 381, 5, 1, '2017-06-08 08:44:56', 'Jun 08 2017', '02:14 PM'),
(144, 'Syllabus', 'Your Class Syllabus Added', 384, 5, 1, '2017-06-08 08:44:57', 'Jun 08 2017', '02:14 PM'),
(145, 'Syllabus', 'Your Class Syllabus Added', 389, 5, 1, '2017-06-08 08:44:58', 'Jun 08 2017', '02:14 PM'),
(146, 'Syllabus', 'Your Class Syllabus Added', 392, 5, 1, '2017-06-08 08:45:00', 'Jun 08 2017', '02:15 PM'),
(147, 'Syllabus', 'Your Class Syllabus Added', 395, 5, 1, '2017-06-08 08:45:00', 'Jun 08 2017', '02:15 PM'),
(148, 'Syllabus', 'Your Class Syllabus Added', 398, 5, 1, '2017-06-08 08:45:01', 'Jun 08 2017', '02:15 PM'),
(149, 'Syllabus', 'Your Class Syllabus Added', 401, 5, 1, '2017-06-08 08:45:02', 'Jun 08 2017', '02:15 PM'),
(150, 'Syllabus', 'Your Class Syllabus Added', 299, 5, 1, '2017-06-08 08:50:51', 'Jun 08 2017', '02:20 PM'),
(151, 'Syllabus', 'Your Class Syllabus Added', 301, 5, 1, '2017-06-08 08:50:53', 'Jun 08 2017', '02:20 PM'),
(152, 'Syllabus', 'Your Class Syllabus Added', 302, 5, 1, '2017-06-08 08:50:55', 'Jun 08 2017', '02:20 PM'),
(153, 'Syllabus', 'Your Class Syllabus Added', 303, 5, 1, '2017-06-08 08:50:56', 'Jun 08 2017', '02:20 PM'),
(154, 'Syllabus', 'Your Class Syllabus Added', 304, 5, 1, '2017-06-08 08:51:00', 'Jun 08 2017', '02:21 PM'),
(155, 'Syllabus', 'Your Class Syllabus Added', 305, 5, 1, '2017-06-08 08:51:00', 'Jun 08 2017', '02:21 PM'),
(156, 'Syllabus', 'Your Class Syllabus Added', 307, 5, 1, '2017-06-08 08:51:01', 'Jun 08 2017', '02:21 PM'),
(157, 'Syllabus', 'Your Class Syllabus Added', 308, 5, 1, '2017-06-08 08:51:04', 'Jun 08 2017', '02:21 PM'),
(158, 'Syllabus', 'Your Class Syllabus Added', 309, 5, 1, '2017-06-08 08:51:05', 'Jun 08 2017', '02:21 PM'),
(159, 'Syllabus', 'Your Class Syllabus Added', 311, 5, 1, '2017-06-08 08:51:07', 'Jun 08 2017', '02:21 PM'),
(160, 'Syllabus', 'Your Class Syllabus Added', 312, 5, 1, '2017-06-08 08:51:10', 'Jun 08 2017', '02:21 PM'),
(161, 'Syllabus', 'Your Class Syllabus Added', 313, 5, 1, '2017-06-08 08:51:12', 'Jun 08 2017', '02:21 PM'),
(162, 'Syllabus', 'Your Class Syllabus Added', 314, 5, 1, '2017-06-08 08:51:14', 'Jun 08 2017', '02:21 PM'),
(163, 'Syllabus', 'Your Class Syllabus Added', 315, 5, 1, '2017-06-08 08:51:18', 'Jun 08 2017', '02:21 PM'),
(164, 'Syllabus', 'Your Class Syllabus Added', 319, 5, 1, '2017-06-08 08:51:21', 'Jun 08 2017', '02:21 PM'),
(165, 'Syllabus', 'Your Class Syllabus Added', 320, 5, 1, '2017-06-08 08:51:23', 'Jun 08 2017', '02:21 PM'),
(166, 'Syllabus', 'Your Class Syllabus Added', 321, 5, 1, '2017-06-08 08:51:27', 'Jun 08 2017', '02:21 PM'),
(167, 'Syllabus', 'Your Class Syllabus Added', 322, 5, 1, '2017-06-08 08:51:28', 'Jun 08 2017', '02:21 PM'),
(168, 'Syllabus', 'Your Class Syllabus Added', 325, 5, 1, '2017-06-08 08:51:29', 'Jun 08 2017', '02:21 PM'),
(169, 'Syllabus', 'Your Class Syllabus Added', 326, 5, 1, '2017-06-08 08:51:29', 'Jun 08 2017', '02:21 PM'),
(170, 'Syllabus', 'Your Class Syllabus Added', 329, 5, 1, '2017-06-08 08:51:31', 'Jun 08 2017', '02:21 PM'),
(171, 'Syllabus', 'Your Class Syllabus Added', 332, 5, 1, '2017-06-08 08:51:35', 'Jun 08 2017', '02:21 PM'),
(172, 'Syllabus', 'Your Class Syllabus Added', 334, 5, 1, '2017-06-08 08:51:37', 'Jun 08 2017', '02:21 PM'),
(173, 'Syllabus', 'Your Class Syllabus Added', 336, 5, 1, '2017-06-08 08:51:38', 'Jun 08 2017', '02:21 PM'),
(174, 'Syllabus', 'Your Class Syllabus Added', 337, 5, 1, '2017-06-08 08:51:39', 'Jun 08 2017', '02:21 PM'),
(175, 'Syllabus', 'Your Class Syllabus Added', 338, 5, 1, '2017-06-08 08:51:39', 'Jun 08 2017', '02:21 PM'),
(176, 'Syllabus', 'Your Class Syllabus Added', 339, 5, 1, '2017-06-08 08:51:41', 'Jun 08 2017', '02:21 PM'),
(177, 'Syllabus', 'Your Class Syllabus Added', 340, 5, 1, '2017-06-08 08:51:45', 'Jun 08 2017', '02:21 PM'),
(178, 'Syllabus', 'Your Class Syllabus Added', 342, 5, 1, '2017-06-08 08:51:49', 'Jun 08 2017', '02:21 PM'),
(179, 'Syllabus', 'Your Class Syllabus Added', 344, 5, 1, '2017-06-08 08:51:51', 'Jun 08 2017', '02:21 PM'),
(180, 'Syllabus', 'Your Class Syllabus Added', 345, 5, 1, '2017-06-08 08:51:55', 'Jun 08 2017', '02:21 PM'),
(181, 'Syllabus', 'Your Class Syllabus Added', 348, 5, 1, '2017-06-08 08:51:59', 'Jun 08 2017', '02:21 PM'),
(182, 'Syllabus', 'Your Class Syllabus Added', 349, 5, 1, '2017-06-08 08:52:00', 'Jun 08 2017', '02:22 PM'),
(183, 'Syllabus', 'Your Class Syllabus Added', 350, 5, 1, '2017-06-08 08:52:03', 'Jun 08 2017', '02:22 PM'),
(184, 'Syllabus', 'Your Class Syllabus Added', 355, 5, 1, '2017-06-08 08:52:06', 'Jun 08 2017', '02:22 PM'),
(185, 'Syllabus', 'Your Class Syllabus Added', 356, 5, 1, '2017-06-08 08:52:09', 'Jun 08 2017', '02:22 PM'),
(186, 'Syllabus', 'Your Class Syllabus Added', 357, 5, 1, '2017-06-08 08:52:16', 'Jun 08 2017', '02:22 PM'),
(187, 'Syllabus', 'Your Class Syllabus Added', 359, 5, 1, '2017-06-08 08:52:17', 'Jun 08 2017', '02:22 PM'),
(188, 'Syllabus', 'Your Class Syllabus Added', 360, 5, 1, '2017-06-08 08:52:24', 'Jun 08 2017', '02:22 PM'),
(189, 'Syllabus', 'Your Class Syllabus Added', 361, 5, 1, '2017-06-08 08:52:26', 'Jun 08 2017', '02:22 PM'),
(190, 'Syllabus', 'Your Class Syllabus Added', 363, 5, 1, '2017-06-08 08:52:28', 'Jun 08 2017', '02:22 PM'),
(191, 'Syllabus', 'Your Class Syllabus Added', 364, 5, 1, '2017-06-08 08:52:29', 'Jun 08 2017', '02:22 PM'),
(192, 'Syllabus', 'Your Class Syllabus Added', 365, 5, 1, '2017-06-08 08:52:30', 'Jun 08 2017', '02:22 PM'),
(193, 'Syllabus', 'Your Class Syllabus Added', 371, 5, 1, '2017-06-08 08:52:31', 'Jun 08 2017', '02:22 PM'),
(194, 'Syllabus', 'Your Class Syllabus Added', 373, 5, 1, '2017-06-08 08:52:33', 'Jun 08 2017', '02:22 PM'),
(195, 'Syllabus', 'Your Class Syllabus Added', 374, 5, 1, '2017-06-08 08:52:35', 'Jun 08 2017', '02:22 PM'),
(196, 'Syllabus', 'Your Class Syllabus Added', 376, 5, 1, '2017-06-08 08:52:37', 'Jun 08 2017', '02:22 PM'),
(197, 'Syllabus', 'Your Class Syllabus Added', 378, 5, 1, '2017-06-08 08:52:38', 'Jun 08 2017', '02:22 PM'),
(198, 'Syllabus', 'Your Class Syllabus Added', 381, 5, 1, '2017-06-08 08:52:43', 'Jun 08 2017', '02:22 PM'),
(199, 'Syllabus', 'Your Class Syllabus Added', 384, 5, 1, '2017-06-08 08:52:44', 'Jun 08 2017', '02:22 PM'),
(200, 'Syllabus', 'Your Class Syllabus Added', 389, 5, 1, '2017-06-08 08:52:46', 'Jun 08 2017', '02:22 PM'),
(201, 'Syllabus', 'Your Class Syllabus Added', 392, 5, 1, '2017-06-08 08:52:47', 'Jun 08 2017', '02:22 PM'),
(202, 'Syllabus', 'Your Class Syllabus Added', 395, 5, 1, '2017-06-08 08:52:49', 'Jun 08 2017', '02:22 PM'),
(203, 'Syllabus', 'Your Class Syllabus Added', 398, 5, 1, '2017-06-08 08:52:51', 'Jun 08 2017', '02:22 PM'),
(204, 'Syllabus', 'Your Class Syllabus Added', 401, 5, 1, '2017-06-08 08:52:54', 'Jun 08 2017', '02:22 PM');

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE `remarks` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `gread` varchar(50) NOT NULL,
  `remark` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remarks`
--

INSERT INTO `remarks` (`id`, `class_id`, `section_id`, `student_id`, `gread`, `remark`, `timestamp`, `login_id`) VALUES
(1, -4, 1, 1, 'good', 'This is  postman data push', '2017-04-06 06:55:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `return_item`
--

CREATE TABLE `return_item` (
  `id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `item_id` int(10) NOT NULL,
  `item_price` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `total_price` varchar(50) NOT NULL,
  `remarks` text NOT NULL,
  `return_date` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_inward`
--

CREATE TABLE `stock_inward` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_rate` int(11) NOT NULL,
  `total` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `remarks` text NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `stock_inward`
--

INSERT INTO `stock_inward` (`id`, `vendor_id`, `item_id`, `quantity`, `item_rate`, `total`, `date`, `remarks`, `flag`) VALUES
(1, 1, 2, 12, 15000, '180000', '2017-06-27', 'no', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock_quantity`
--

CREATE TABLE `stock_quantity` (
  `id` int(11) NOT NULL,
  `item_id` int(50) NOT NULL,
  `quantity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_quantity`
--

INSERT INTO `stock_quantity` (`id`, `item_id`, `quantity`) VALUES
(1, 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `exam_type_id` int(11) NOT NULL,
  `max_marks` varchar(50) NOT NULL,
  `obtained_marks` varchar(20) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `test_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `student_id`, `class_id`, `section_id`, `subject_id`, `exam_type_id`, `max_marks`, `obtained_marks`, `teacher_id`, `test_date`) VALUES
(1, 9, -4, 1, 1, 1, '10', '1', 2, '2017-06-01'),
(2, 1860, -4, 1, 1, 1, '10', '2', 2, '2017-06-01'),
(3, 1861, -4, 1, 1, 1, '10', '3', 2, '2017-06-01'),
(4, 25, -4, 1, 1, 1, '10', '4', 2, '2017-06-01'),
(5, 23, -4, 1, 1, 1, '10', '5', 2, '2017-06-01'),
(6, 11, -4, 1, 1, 1, '10', '6', 2, '2017-06-01'),
(7, 5, -4, 1, 1, 1, '10', '7', 2, '2017-06-01'),
(9, 19, -4, 1, 1, 1, '10', '7', 2, '2017-06-01'),
(10, 16, -4, 1, 1, 1, '10', '7', 2, '2017-06-01'),
(11, 24, -4, 1, 1, 1, '10', '7', 2, '2017-06-01'),
(12, 18, -4, 1, 1, 1, '10', '7', 2, '2017-06-01'),
(13, 20, -4, 1, 1, 1, '10', '7', 2, '2017-06-01'),
(14, 1859, -4, 1, 1, 1, '10', '7', 2, '2017-06-01'),
(15, 12, -4, 1, 1, 1, '10', '7', 2, '2017-06-01'),
(16, 1858, -4, 1, 1, 1, '10', '7', 1, '2017-06-01'),
(17, 15, -4, 1, 1, 1, '10', '7', 2, '2017-06-01'),
(18, 6, -4, 1, 1, 1, '10', '7', 2, '2017-06-01'),
(19, 21, -4, 1, 1, 1, '10', '5', 2, '2017-06-01'),
(21, 7, -4, 1, 1, 1, '10', '5', 2, '2017-06-01'),
(22, 8, -4, 1, 1, 1, '10', '5', 2, '2017-06-01'),
(23, 1, -4, 1, 1, 1, '10', '4', 2, '2017-06-01'),
(25, 22, -4, 1, 1, 1, '10', '4', 2, '2017-06-01'),
(26, 17, -4, 1, 1, 1, '10', '1', 2, '2017-06-01'),
(27, 13, -4, 1, 1, 1, '10', '2', 2, '2017-06-01'),
(28, 14, -4, 1, 1, 1, '10', '5', 2, '2017-06-01'),
(29, 10, -4, 1, 1, 1, '10', '6', 2, '2017-06-01'),
(32, 3, -4, 1, 1, 1, '10', '', 2, '2017-06-01'),
(33, 4, -4, 1, 1, 1, '10', '', 2, '2017-06-01'),
(34, 2, -4, 2, 5, 1, '500', '10', 1, '2017-06-18'),
(35, 2, -4, 2, 5, 1, '500', '10', 1, '2017-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `subject_mapping`
--

CREATE TABLE `subject_mapping` (
  `id` int(11) NOT NULL,
  `class_id` int(10) NOT NULL,
  `section_id` int(10) NOT NULL,
  `subject_id` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_mapping`
--

INSERT INTO `subject_mapping` (`id`, `class_id`, `section_id`, `subject_id`, `date`) VALUES
(1, -4, 1, '1,2', '2017-06-10'),
(3, -2, 2, '16,17,15', '2017-06-10'),
(4, 1, 2, '18,16,17', '2017-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `subsports_gallery`
--

CREATE TABLE `subsports_gallery` (
  `id` int(11) NOT NULL,
  `sports_id` int(11) NOT NULL,
  `gallery_pic` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL,
  `curent_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subsports_gallery`
--

INSERT INTO `subsports_gallery` (`id`, `sports_id`, `gallery_pic`, `flag`, `curent_date`) VALUES
(1, 3, 'sports/cricket/9349.jpg', 0, '2017-06-09'),
(2, 3, 'sports/cricket/17114.jpg', 0, '2017-06-09'),
(3, 3, 'sports/cricket/4875.jpg', 0, '2017-06-09'),
(4, 4, 'sports/Judo/6040.jpeg', 0, '2017-06-09'),
(5, 4, 'sports/Judo/3057.jpg', 0, '2017-06-09'),
(6, 6, 'sports/Table Tenis/13270.jpg', 0, '2017-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `sub_gallery`
--

CREATE TABLE `sub_gallery` (
  `id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `gallery_pic` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_gallery`
--

INSERT INTO `sub_gallery` (`id`, `gallery_id`, `gallery_pic`, `flag`) VALUES
(1, 1, 'event70511.jpg', 0),
(2, 1, 'event19361.jpg', 0),
(3, 2, 'event42702.jpg', 0),
(4, 2, 'event88292.jpg', 0),
(5, 2, 'event93412.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_time_table`
--

CREATE TABLE `sub_time_table` (
  `id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `time_table_id` int(11) NOT NULL,
  `time_from` varchar(200) NOT NULL,
  `time_to` varchar(200) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `curent_date` date NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`id`, `user_id`, `class_id`, `section_id`, `subject_id`, `file`, `date`, `curent_date`, `flag`) VALUES
(1, 1, 1, 1, 2, 'pdf1.pdf', '2017-06-08', '2017-06-08', 0),
(2, 1, 1, 2, 2, 'pdf2.pdf', '2017-06-08', '2017-06-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `date` date NOT NULL,
  `day` varchar(200) NOT NULL,
  `curent_date` date NOT NULL,
  `file` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_management`
--

CREATE TABLE `user_management` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `module_id` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_management`
--

INSERT INTO `user_management` (`id`, `role_id`, `module_id`) VALUES
(1, 4, '1'),
(2, 4, '2'),
(3, 4, '3'),
(4, 4, '4'),
(5, 4, '5'),
(6, 4, '7'),
(7, 4, '8'),
(8, 4, '11'),
(9, 4, '12'),
(10, 4, '15'),
(11, 4, '42'),
(12, 4, '43'),
(13, 4, '44'),
(14, 4, '45'),
(15, 4, '46'),
(16, 4, '47'),
(17, 4, '48'),
(18, 4, '49'),
(19, 4, '50'),
(20, 4, '51'),
(21, 4, '52'),
(22, 4, '53'),
(23, 4, '54'),
(24, 4, '55'),
(25, 4, '56'),
(26, 4, '57'),
(27, 4, '58'),
(28, 4, '59'),
(29, 4, '60'),
(30, 4, '61'),
(31, 4, '62'),
(32, 4, '63'),
(33, 4, '64'),
(34, 4, '65'),
(35, 4, '66'),
(36, 4, '68'),
(37, 4, '69'),
(38, 4, '70'),
(39, 4, '71'),
(40, 4, '72'),
(41, 4, '73'),
(42, 4, '74'),
(43, 4, '75'),
(44, 2, '1'),
(45, 2, '2'),
(46, 2, '3'),
(47, 2, '4'),
(48, 2, '5'),
(49, 2, '7'),
(50, 2, '8'),
(51, 2, '11'),
(52, 2, '12'),
(53, 2, '15'),
(54, 2, '42'),
(55, 2, '43'),
(56, 2, '44'),
(57, 2, '45'),
(58, 2, '46'),
(59, 2, '47'),
(60, 2, '48'),
(61, 2, '49'),
(62, 2, '50'),
(63, 2, '51'),
(64, 2, '52'),
(65, 2, '53'),
(66, 2, '54'),
(67, 2, '55'),
(68, 2, '56'),
(69, 2, '57'),
(70, 2, '58'),
(71, 2, '59'),
(72, 2, '60'),
(73, 2, '61'),
(74, 2, '62'),
(75, 2, '63'),
(76, 2, '64'),
(77, 2, '65'),
(78, 2, '66'),
(79, 2, '68'),
(80, 2, '69'),
(81, 2, '70'),
(82, 2, '71'),
(83, 2, '72'),
(84, 2, '73'),
(85, 2, '74'),
(86, 2, '75'),
(87, 2, '76'),
(88, 2, '77'),
(89, 2, '78');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acedmic_calendar`
--
ALTER TABLE `acedmic_calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `achivements`
--
ALTER TABLE `achivements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_to_calendar`
--
ALTER TABLE `add_to_calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_versions`
--
ALTER TABLE `api_versions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `broadcast_message`
--
ALTER TABLE `broadcast_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_routes`
--
ALTER TABLE `bus_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_section`
--
ALTER TABLE `class_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_detail`
--
ALTER TABLE `contact_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `director_principle_message`
--
ALTER TABLE `director_principle_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_details`
--
ALTER TABLE `event_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_time_table`
--
ALTER TABLE `exam_time_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_classes`
--
ALTER TABLE `extra_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_login`
--
ALTER TABLE `faculty_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_gallery`
--
ALTER TABLE `home_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry_form`
--
ALTER TABLE `inquiry_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_item`
--
ALTER TABLE `issue_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_note`
--
ALTER TABLE `leave_note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_bus`
--
ALTER TABLE `master_bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_category`
--
ALTER TABLE `master_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_class`
--
ALTER TABLE `master_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_exam`
--
ALTER TABLE `master_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_item`
--
ALTER TABLE `master_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_medium`
--
ALTER TABLE `master_medium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_role`
--
ALTER TABLE `master_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_section`
--
ALTER TABLE `master_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_sports`
--
ALTER TABLE `master_sports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_station`
--
ALTER TABLE `master_station`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_subject`
--
ALTER TABLE `master_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_vendor`
--
ALTER TABLE `master_vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remarks`
--
ALTER TABLE `remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_item`
--
ALTER TABLE `return_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_inward`
--
ALTER TABLE `stock_inward`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_quantity`
--
ALTER TABLE `stock_quantity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_mapping`
--
ALTER TABLE `subject_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subsports_gallery`
--
ALTER TABLE `subsports_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_gallery`
--
ALTER TABLE `sub_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_time_table`
--
ALTER TABLE `sub_time_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_management`
--
ALTER TABLE `user_management`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `acedmic_calendar`
--
ALTER TABLE `acedmic_calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `achivements`
--
ALTER TABLE `achivements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `add_to_calendar`
--
ALTER TABLE `add_to_calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `api_versions`
--
ALTER TABLE `api_versions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `broadcast_message`
--
ALTER TABLE `broadcast_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bus_routes`
--
ALTER TABLE `bus_routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `class_section`
--
ALTER TABLE `class_section`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contact_detail`
--
ALTER TABLE `contact_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `director_principle_message`
--
ALTER TABLE `director_principle_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `event_details`
--
ALTER TABLE `event_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `exam_time_table`
--
ALTER TABLE `exam_time_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `extra_classes`
--
ALTER TABLE `extra_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `faculty_login`
--
ALTER TABLE `faculty_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `home_gallery`
--
ALTER TABLE `home_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `inquiry_form`
--
ALTER TABLE `inquiry_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `issue_item`
--
ALTER TABLE `issue_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leave_note`
--
ALTER TABLE `leave_note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=832;
--
-- AUTO_INCREMENT for table `master_bus`
--
ALTER TABLE `master_bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `master_category`
--
ALTER TABLE `master_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `master_class`
--
ALTER TABLE `master_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `master_exam`
--
ALTER TABLE `master_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `master_item`
--
ALTER TABLE `master_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master_medium`
--
ALTER TABLE `master_medium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `master_role`
--
ALTER TABLE `master_role`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `master_section`
--
ALTER TABLE `master_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `master_sports`
--
ALTER TABLE `master_sports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `master_station`
--
ALTER TABLE `master_station`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `master_subject`
--
ALTER TABLE `master_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `master_vendor`
--
ALTER TABLE `master_vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;
--
-- AUTO_INCREMENT for table `remarks`
--
ALTER TABLE `remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `return_item`
--
ALTER TABLE `return_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock_inward`
--
ALTER TABLE `stock_inward`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stock_quantity`
--
ALTER TABLE `stock_quantity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `subject_mapping`
--
ALTER TABLE `subject_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subsports_gallery`
--
ALTER TABLE `subsports_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sub_gallery`
--
ALTER TABLE `sub_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sub_time_table`
--
ALTER TABLE `sub_time_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `syllabus`
--
ALTER TABLE `syllabus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_management`
--
ALTER TABLE `user_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
