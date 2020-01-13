-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 13, 2020 at 08:08 AM
-- Server version: 5.7.13-log
-- PHP Version: 5.6.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_post`
--

CREATE TABLE `event_post` (
  `post_id1` int(4) NOT NULL,
  `post_head1` text NOT NULL,
  `post_detail1` text NOT NULL,
  `post_img1` varchar(1000) NOT NULL DEFAULT 'unimg.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_post`
--

INSERT INTO `event_post` (`post_id1`, `post_head1`, `post_detail1`, `post_img1`) VALUES
(1, 'NAVyDESIGN', 'ตัวอย่างการแสดงผล NAVyDESIGN', '202001120918.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `log_productbuy`
--

CREATE TABLE `log_productbuy` (
  `log_id` int(3) NOT NULL,
  `log_productname` varchar(1000) NOT NULL,
  `log_price` int(7) NOT NULL,
  `log_name` varchar(1000) NOT NULL,
  `log_date` varchar(12) NOT NULL,
  `buy_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log_raward`
--

CREATE TABLE `log_raward` (
  `log_id` int(4) NOT NULL,
  `log_productname` varchar(100) NOT NULL,
  `log_price` int(7) NOT NULL,
  `log_name` varchar(100) NOT NULL,
  `log_date` varchar(100) NOT NULL,
  `buy_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_data`
--

CREATE TABLE `product_data` (
  `product_id` int(4) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `product_class` varchar(100) NOT NULL,
  `product_detail` varchar(100) NOT NULL,
  `product_price` int(5) NOT NULL,
  `product_img` varchar(1000) NOT NULL DEFAULT 'unproduct'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_data`
--

INSERT INTO `product_data` (`product_id`, `product_name`, `product_type`, `product_class`, `product_detail`, `product_price`, `product_img`) VALUES
(1, 'NAVyDESIGN', 'Super Rare', 'Example', 'ตัวอย่างการแสดงผล NAVyDESIGN', 1, 'product_imgId=27.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rewardcode_data`
--

CREATE TABLE `rewardcode_data` (
  `id` int(6) NOT NULL,
  `code` varchar(100) NOT NULL,
  `reward` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rewardcode_data`
--

INSERT INTO `rewardcode_data` (`id`, `code`, `reward`) VALUES
(1, 'YThhYTY4MWFhYTQ1ODhhOGRiZDNiNDJiMjZkNTlhMWE=1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reward_data`
--

CREATE TABLE `reward_data` (
  `reward_id` int(3) NOT NULL,
  `reward_name` varchar(100) NOT NULL,
  `reward_type` varchar(100) NOT NULL,
  `reward_detail` varchar(100) NOT NULL,
  `reward_price` int(7) NOT NULL,
  `reward_img` varchar(100) NOT NULL DEFAULT 'unproduct.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reward_data`
--

INSERT INTO `reward_data` (`reward_id`, `reward_name`, `reward_type`, `reward_detail`, `reward_price`, `reward_img`) VALUES
(1, 'NAVyDESIGN', 'Super Rare', 'ตัวอย่างการแสดงผล NAVyDESIGN', 1, '202001120950.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `update_post`
--

CREATE TABLE `update_post` (
  `post_id` int(4) NOT NULL,
  `post_head` text NOT NULL,
  `post_detail` text NOT NULL,
  `post_img` varchar(100) NOT NULL DEFAULT 'unimg.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `update_post`
--

INSERT INTO `update_post` (`post_id`, `post_head`, `post_detail`, `post_img`) VALUES
(1, 'NAVyDESIGN', 'ตัวอย่างการแสดงผล NAVyDESIGN', '202001120937.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(4) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'normal',
  `u_name` varchar(16) NOT NULL,
  `p_word` varchar(1000) NOT NULL,
  `SID` varchar(1000) NOT NULL,
  `e_mail` varchar(1000) NOT NULL,
  `pay_point` int(7) NOT NULL DEFAULT '0',
  `reward_point` int(7) NOT NULL DEFAULT '0',
  `level` int(2) NOT NULL DEFAULT '1',
  `user_exp` int(4) NOT NULL DEFAULT '0',
  `max_exp` int(4) NOT NULL DEFAULT '1000',
  `user_level` varchar(16) NOT NULL DEFAULT 'guest',
  `user_img` varchar(1000) NOT NULL DEFAULT 'unprofile'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `status`, `u_name`, `p_word`, `SID`, `e_mail`, `pay_point`, `reward_point`, `level`, `user_exp`, `max_exp`, `user_level`, `user_img`) VALUES
(0, 'normal', 'navydesign', 'bmF2eWRlc2lnbnBhZ2U=', 'YzJlMzUzNDllOTg5NDE4MDFkMTQ4NDQyNGUzNDliZTE=', 'navydesign@navydesign.com', 6000, 6000, 99, 89999, 99999, 'actor', 'tmp_imgYzJlMzUzNDllOTg5NDE4MDFkMTQ4NDQyNGUzNDliZTE=0'),
(1, 'normal', 'navy12', 'bmF2eTEy', 'ZmIxMDhjNWNmZjUyZGU3MGM0ZWUyMGJiMjY1ZjdmN2I=', 'navydesignuser@navydesign.com', 0, 0, 1, 0, 1000, 'guest', 'tmp_imgZmIxMDhjNWNmZjUyZGU3MGM0ZWUyMGJiMjY1ZjdmN2I=8');

-- --------------------------------------------------------

--
-- Table structure for table `web_setting`
--

CREATE TABLE `web_setting` (
  `config_id` int(11) NOT NULL,
  `webname` text NOT NULL,
  `webstatus` text NOT NULL,
  `version` text NOT NULL,
  `ip` text NOT NULL,
  `fbpage` text NOT NULL,
  `slide1_img` text NOT NULL,
  `slide2_img` text NOT NULL,
  `slide3_img` text NOT NULL,
  `background_img` text NOT NULL,
  `video_link` text NOT NULL,
  `text_run` text NOT NULL,
  `web_logo` varchar(1000) NOT NULL,
  `install_gamelink` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `web_setting`
--

INSERT INTO `web_setting` (`config_id`, `webname`, `webstatus`, `version`, `ip`, `fbpage`, `slide1_img`, `slide2_img`, `slide3_img`, `background_img`, `video_link`, `text_run`, `web_logo`, `install_gamelink`) VALUES
(1, 'NAVyDESIGN', 'ยังไม่เปิดให้บริการ', '0.0.1 (Beta)', '127.0.0.1', 'nanydesignpage', 'slide1.jpg', 'slide2.jpg', 'slide3.jpg', 'background.jpg', 'sbrAduXXiBE', 'ตัวอย่างการแสดงผลอักษรวิ่ง NAVyDESIGN\r\n', 'logo.png', 'ไม่มีลิ้งค์ใดๆ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_post`
--
ALTER TABLE `event_post`
  ADD PRIMARY KEY (`post_id1`);

--
-- Indexes for table `log_productbuy`
--
ALTER TABLE `log_productbuy`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `log_raward`
--
ALTER TABLE `log_raward`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `product_data`
--
ALTER TABLE `product_data`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `rewardcode_data`
--
ALTER TABLE `rewardcode_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reward_data`
--
ALTER TABLE `reward_data`
  ADD PRIMARY KEY (`reward_id`);

--
-- Indexes for table `update_post`
--
ALTER TABLE `update_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_setting`
--
ALTER TABLE `web_setting`
  ADD PRIMARY KEY (`config_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_post`
--
ALTER TABLE `event_post`
  MODIFY `post_id1` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `log_productbuy`
--
ALTER TABLE `log_productbuy`
  MODIFY `log_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `log_raward`
--
ALTER TABLE `log_raward`
  MODIFY `log_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `product_data`
--
ALTER TABLE `product_data`
  MODIFY `product_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `rewardcode_data`
--
ALTER TABLE `rewardcode_data`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `reward_data`
--
ALTER TABLE `reward_data`
  MODIFY `reward_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `update_post`
--
ALTER TABLE `update_post`
  MODIFY `post_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `web_setting`
--
ALTER TABLE `web_setting`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
