-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2017 at 09:17 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_table`
--

CREATE TABLE `comment_table` (
  `COMMENT_ID` int(11) NOT NULL,
  `POST_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `COMMENT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `confirmation_table`
--

CREATE TABLE `confirmation_table` (
  `CONFIRMATION_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `VALIDATION_TEXT` varchar(50) NOT NULL,
  `STATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friend_table`
--

CREATE TABLE `friend_table` (
  `ID` int(4) NOT NULL,
  `FID` int(5) NOT NULL,
  `TID` int(5) NOT NULL,
  `status` varchar(15) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_table`
--

INSERT INTO `friend_table` (`ID`, `FID`, `TID`, `status`, `date`) VALUES
(43, 24, 31, 'FRIENDS', '19-08-17'),
(45, 32, 24, 'FRIENDS', '18-jun-17'),
(49, 31, 25, 'FRIENDS', '19-08-17'),
(50, 31, 28, 'NOTFRIENDS', '19-08-17'),
(51, 31, 33, 'FRIENDS', '19-08-17'),
(52, 31, 35, 'NOTFRIENDS', '19-08-17'),
(53, 31, 35, 'NOTFRIENDS', '19-08-17'),
(54, 31, 34, 'NOTFRIENDS', '19-08-17'),
(63, 24, 25, 'NOTFRIENDS', '19-08-17'),
(64, 24, 33, 'FRIENDS', '19-08-17'),
(65, 24, 26, 'NOTFRIENDS', '19-08-17'),
(66, 24, 28, 'NOTFRIENDS', '19-08-17'),
(67, 24, 34, 'NOTFRIENDS', '19-08-17'),
(68, 33, 27, 'FRIENDS', '19-08-17'),
(69, 33, 25, 'NOTFRIENDS', '19-08-17'),
(70, 27, 24, 'NOTFRIENDS', '19-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `post` varchar(200) NOT NULL,
  `post_by` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `path` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post`, `post_by`, `date`, `path`) VALUES
(4, 'playing WATH DOGS 2.', 24, '2017-08-19 12:27:09 ', 'image/dedsec_skull_noise_by_junguler-da6229q.gif'),
(6, '  \r\nHaving a great EID :)', 24, '2017-08-19 12:33:16 ', 'image/19554973_1337676669687184_5588073086087573551_n.jpg'),
(7, '  \r\nwaiting to see my buddy.. @ROBI', 31, '2017-08-19 13:11:48 ', 'image/latest.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `post_image_table`
--

CREATE TABLE `post_image_table` (
  `IMAGE_ID` int(11) NOT NULL,
  `POST_ID` int(11) NOT NULL,
  `IMAGE_LINK` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status_store`
--

CREATE TABLE `status_store` (
  `POST_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `TITLE` varchar(50) NOT NULL,
  `ADDRESS` text NOT NULL,
  `RENT` int(8) NOT NULL,
  `DATE_TIME` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `PROFILE_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `PHONE_NO` varchar(15) DEFAULT NULL,
  `IMAGE` text,
  `ADDRESS` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`PROFILE_ID`, `USER_ID`, `PHONE_NO`, `IMAGE`, `ADDRESS`) VALUES
(5, 24, '', '../profile_picture/24.jpg', NULL),
(6, 25, NULL, '../profile_picture/25.jpg', NULL),
(7, 26, NULL, '../profile_picture/26.jpg', NULL),
(8, 27, NULL, '../profile_picture/27.jpg', NULL),
(9, 28, NULL, '../profile_picture/28.jpg', NULL),
(10, 31, NULL, '../profile_picture/31.jpg', NULL),
(11, 32, NULL, NULL, NULL),
(12, 33, NULL, '../profile_picture/33.jpg', NULL),
(13, 34, NULL, NULL, NULL),
(14, 35, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `USER_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(30) NOT NULL,
  `LAST_NAME` varchar(30) NOT NULL,
  `USER_NAME` varchar(50) NOT NULL,
  `USER_TYPE` varchar(15) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `ADDED_TIME` varchar(25) NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `DOB` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`USER_ID`, `FIRST_NAME`, `LAST_NAME`, `USER_NAME`, `USER_TYPE`, `EMAIL`, `PASSWORD`, `ADDED_TIME`, `GENDER`, `DOB`) VALUES
(24, 'fardin', 'rahman', 'fardin', 'AUTH_USER', 'fardin10@gmail.com', '1233', '2017-08-11 12:11:51 pm', 'Male', '31-may-1994'),
(25, 'Nigar', 'Rakhi', 'rakhi', 'AUTH_USER', 'rakhi@gmail.com', '12345', '2017-08-11 12:12:41 pm', 'Female', '14-aug-1994'),
(26, 'Robi', 'Ratno', 'robi', 'AUTH_USER', 'robi@gmail.com', '123456', '2017-08-11 12:13:17 pm', 'Others', '1-may-1994'),
(27, 'Susmita', 'Anchal', 'susu', 'AUTH_USER', 'susu@gmail.com', '123', '2017-08-11 12:14:20 pm', 'Female', '31-july-1994'),
(28, 'Kakon', 'Ghosh', 'kghosh', 'AUTH_USER', 'kakon@gmail.com', '123789', '2017-08-11 12:15:04 pm', 'Male', '3-may-1994'),
(31, 'Jaber', 'Hossain', 'jaber', 'AUTH_USER', 'jaberhossain100', '1234', '2017-08-12 00:05:11 am', 'Male', '2-sept-1994'),
(32, 'Rifah', 'Tasnia', 'rifah', 'AUTH_USER', 'rifaht@gmail.com', '789', '2017-08-12 00:40:31 am', 'Female', '15-may-1994'),
(33, 'Urmi', 'Jaman', 'urmi', 'AUTH_USER', 'urmi12@gmail.com', '12345', '2017-08-13 12:26:47 pm', 'Female', '5-feb-1994'),
(34, 'cdsah', 'sjdjhdaksjdb', 'abc', 'AUTH_USER', 'asaa@gmail.com', '123', '2017-08-13 12:57:52 pm', 'Male', '0'),
(35, 'asdfg', 'asdf', 'asd', 'AUTH_USER', 'asd@', '123', '2017-08-13 13:26:13 pm', 'Other', '02-Jan-1995');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_table`
--
ALTER TABLE `comment_table`
  ADD PRIMARY KEY (`COMMENT_ID`),
  ADD KEY `POST_ID` (`POST_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `confirmation_table`
--
ALTER TABLE `confirmation_table`
  ADD PRIMARY KEY (`CONFIRMATION_ID`),
  ADD UNIQUE KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `friend_table`
--
ALTER TABLE `friend_table`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_image_table`
--
ALTER TABLE `post_image_table`
  ADD PRIMARY KEY (`IMAGE_ID`),
  ADD KEY `POST_ID` (`POST_ID`);

--
-- Indexes for table `status_store`
--
ALTER TABLE `status_store`
  ADD PRIMARY KEY (`POST_ID`),
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `USER_ID_2` (`USER_ID`),
  ADD KEY `USER_ID_3` (`USER_ID`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`PROFILE_ID`),
  ADD UNIQUE KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`USER_ID`),
  ADD UNIQUE KEY `ADMIN_USER_NAME` (`USER_NAME`),
  ADD UNIQUE KEY `ADMIN_EMAIL` (`EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment_table`
--
ALTER TABLE `comment_table`
  MODIFY `COMMENT_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `confirmation_table`
--
ALTER TABLE `confirmation_table`
  MODIFY `CONFIRMATION_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `friend_table`
--
ALTER TABLE `friend_table`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `post_image_table`
--
ALTER TABLE `post_image_table`
  MODIFY `IMAGE_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `status_store`
--
ALTER TABLE `status_store`
  MODIFY `POST_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `PROFILE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_table`
--
ALTER TABLE `comment_table`
  ADD CONSTRAINT `fk_comTable_pTable` FOREIGN KEY (`POST_ID`) REFERENCES `status_store` (`POST_ID`),
  ADD CONSTRAINT `fk_comTable_uTable` FOREIGN KEY (`USER_ID`) REFERENCES `user_info` (`USER_ID`);

--
-- Constraints for table `confirmation_table`
--
ALTER TABLE `confirmation_table`
  ADD CONSTRAINT `fk_Utable_ConTable` FOREIGN KEY (`USER_ID`) REFERENCES `user_info` (`USER_ID`);

--
-- Constraints for table `post_image_table`
--
ALTER TABLE `post_image_table`
  ADD CONSTRAINT `fk_pImgTable_pTable` FOREIGN KEY (`POST_ID`) REFERENCES `status_store` (`POST_ID`);

--
-- Constraints for table `status_store`
--
ALTER TABLE `status_store`
  ADD CONSTRAINT `fk_pTable_uTable` FOREIGN KEY (`USER_ID`) REFERENCES `user_info` (`USER_ID`);

--
-- Constraints for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD CONSTRAINT `fk_Utable_UProTable` FOREIGN KEY (`USER_ID`) REFERENCES `user_info` (`USER_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
