-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2015 at 07:59 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hq`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslevel`
--

CREATE TABLE IF NOT EXISTS `accesslevel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accesslevel`
--

INSERT INTO `accesslevel` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'CEO'),
(4, 'Employee'),
(3, 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `hq_branch`
--

CREATE TABLE IF NOT EXISTS `hq_branch` (
  `id` int(11) NOT NULL,
  `language` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `branchid` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hq_content`
--

CREATE TABLE IF NOT EXISTS `hq_content` (
  `id` int(11) NOT NULL,
  `pillar` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hq_department`
--

CREATE TABLE IF NOT EXISTS `hq_department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `deptid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hq_designation`
--

CREATE TABLE IF NOT EXISTS `hq_designation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hq_options`
--

CREATE TABLE IF NOT EXISTS `hq_options` (
  `id` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `representation` int(11) NOT NULL,
  `actualorder` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `optiontext` text NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_options`
--

INSERT INTO `hq_options` (`id`, `question`, `representation`, `actualorder`, `image`, `order`, `weight`, `optiontext`, `text`) VALUES
(1, 1, 1, 1, '', '1', '4', 'I try to take the same bus back home everyday', 'Person rarely has to miss personal commitments'),
(2, 1, 1, 2, '', '2', '6', 'I secretly have a bunk bed in office', 'Person secretly has a bunk bed in office'),
(3, 1, 1, 3, '', '3', '7', 'I see the sun set everyday', 'Person gets to see the sun set everyday'),
(4, 1, 1, 4, '', '4', '8', 'I wasn''t able to attend the last family function', 'Person can''t remember last family outing'),
(5, 2, 1, 1, '', '1', '4', 'Person shown to be relaxing at the beach. A Call barred sign on the side', 'Person sitting on the beach shown to have multiple hands-one hand holding phone, one hand typing on laptop, one hand making a signature, one hand holding a camera'),
(6, 2, 1, 2, '', '1', '6', 'Occasional calls/mails come in but person is able to delegate effectively', 'Person shown to be doing a trek holding the laptop as well  (Or could be shown doing it in different times. E.g. morning trek and evening call/mail');

-- --------------------------------------------------------

--
-- Table structure for table `hq_pillar`
--

CREATE TABLE IF NOT EXISTS `hq_pillar` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `order` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_pillar`
--

INSERT INTO `hq_pillar` (`id`, `name`, `weight`, `order`) VALUES
(1, 'Work Life Blend', '100', '1'),
(2, 'Employee Engagement', '100', '2');

-- --------------------------------------------------------

--
-- Table structure for table `hq_question`
--

CREATE TABLE IF NOT EXISTS `hq_question` (
  `id` int(11) NOT NULL,
  `pillar` int(11) NOT NULL,
  `noofans` int(11) NOT NULL,
  `order` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_question`
--

INSERT INTO `hq_question` (`id`, `pillar`, `noofans`, `order`, `timestamp`, `text`) VALUES
(1, 1, 1, '2', '2015-07-30 08:05:10', 'You put in your best at work. We know you do. But, your life\n\nlooks like this...'),
(2, 1, 0, '3', '2015-08-03 05:06:28', 'You have managed to get the much-awaited annual leave. You have taken your family along. You will be like…');

-- --------------------------------------------------------

--
-- Table structure for table `hq_team`
--

CREATE TABLE IF NOT EXISTS `hq_team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `teamid` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hq_team`
--

INSERT INTO `hq_team` (`id`, `name`, `teamid`) VALUES
(5, 'HR Team', 'H1');

-- --------------------------------------------------------

--
-- Table structure for table `hq_useranswer`
--

CREATE TABLE IF NOT EXISTS `hq_useranswer` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `pillar` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `option` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_useranswer`
--

INSERT INTO `hq_useranswer` (`id`, `user`, `pillar`, `question`, `option`, `order`, `timestamp`) VALUES
(1, 7, 1, 1, 3, 0, '2015-07-30 09:29:40');

-- --------------------------------------------------------

--
-- Table structure for table `hq_userpillar`
--

CREATE TABLE IF NOT EXISTS `hq_userpillar` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `pillar` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `logintype`
--

CREATE TABLE IF NOT EXISTS `logintype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logintype`
--

INSERT INTO `logintype` (`id`, `name`) VALUES
(1, 'Facebook'),
(2, 'Twitter'),
(3, 'Email'),
(4, 'Google');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `linktype` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `isactive` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `keyword`, `url`, `linktype`, `parent`, `isactive`, `order`, `icon`) VALUES
(1, 'Users', '', '', 'site/viewusers', 1, 0, 1, 1, 'icon-user'),
(2, 'Branch', '', '', 'site/viewbranch', 1, 0, 1, 2, 'icon-dashboard'),
(3, 'Department', '', '', 'site/viewdepartment', 1, 0, 1, 3, 'icon-dashboard'),
(4, 'Dashboard', '', '', 'site/index', 1, 0, 1, 0, 'icon-dashboard'),
(5, 'Designation', '', '', 'site/viewdesignation', 1, 0, 1, 4, 'icon-dashboard'),
(6, 'Pillar', '', '', 'site/viewpillar', 1, 0, 1, 5, 'icon-dashboard'),
(7, 'Questions', '', '', 'site/viewquestion', 1, 0, 1, 5, 'icon-dashboard'),
(8, 'Options', '', '', 'site/viewoptions', 1, 0, 1, 5, 'icon-dashboard'),
(9, 'User Answers', '', '', 'site/viewuseranswer', 1, 0, 1, 5, 'icon-dashboard'),
(10, 'User Pillar', '', '', 'site/viewuserpillar', 1, 0, 1, 5, 'icon-dashboard'),
(11, 'Content', '', '', 'site/viewcontent', 1, 0, 1, 5, 'icon-dashboard');

-- --------------------------------------------------------

--
-- Table structure for table `menuaccess`
--

CREATE TABLE IF NOT EXISTS `menuaccess` (
  `menu` int(11) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuaccess`
--

INSERT INTO `menuaccess` (`menu`, `access`) VALUES
(1, 1),
(4, 1),
(2, 1),
(3, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 3),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'inactive'),
(2, 'Active'),
(3, 'Waiting'),
(4, 'Active Waiting'),
(5, 'Blocked');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `accesslevel` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `socialid` varchar(255) NOT NULL,
  `logintype` int(11) NOT NULL,
  `json` text NOT NULL,
  `gender` int(11) NOT NULL,
  `age` varchar(255) NOT NULL,
  `maritalstatus` int(11) NOT NULL,
  `designation` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `noofyearsinorganization` varchar(255) NOT NULL,
  `spanofcontrol` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `employeeid` varchar(255) NOT NULL,
  `branch` int(11) NOT NULL,
  `language` varchar(255) NOT NULL,
  `team` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`, `gender`, `age`, `maritalstatus`, `designation`, `department`, `noofyearsinorganization`, `spanofcontrol`, `description`, `employeeid`, `branch`, `language`, `team`) VALUES
(1, 'wohlig', 'a63526467438df9566c508027d9cb06b', 'wohlig@wohlig.com', 1, '0000-00-00 00:00:00', 1, NULL, '', '', 1, '', 0, '0', 0, 1, 1, '', '', '															', '', 1, '0', 5),
(4, 'pratik', '0cb2b62754dfd12b6ed0161d4b447df7', 'pratik@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, 'pratik', '1', 1, '', 0, '', 0, 0, 0, '', '', '', '', 0, '', 0),
(5, 'wohlig123', 'wohlig123', 'wohlig1@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, '', '', 0, '', 0, '', 0, 0, 0, '', '', '', '', 0, '', 0),
(6, 'wohlig1', 'a63526467438df9566c508027d9cb06b', 'wohlig2@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, '', '', 0, '', 0, '', 0, 0, 0, '', '', '', '', 0, '', 0),
(7, 'Avinash', 'a63526467438df9566c508027d9cb06b', 'avinash@wohlig.com', 4, '2014-10-17 06:22:29', 1, NULL, '', '', 0, '', 0, '', 0, 0, 0, '', '', '', '', 0, '', 0),
(9, 'avinash', 'a208e5837519309129fa466b0c68396b', 'a@email.com', 2, '2014-12-03 11:06:19', 3, '', '', '123', 1, 'demojson', 0, '', 0, 0, 0, '', '', '', '', 0, '', 0),
(13, 'aaa', 'a208e5837519309129fa466b0c68396b', 'aaa3@email.com', 3, '2014-12-04 06:55:42', 3, NULL, '', '1', 2, 'userjson', 0, '', 0, 0, 0, '', '', '', '', 0, '', 0),
(14, 'xdcvghbn', 'e99a18c428cb38d5f260853678922e03', 'dcvgb@rftgh.ghhb', 1, '2015-07-30 11:47:58', 1, '', '', '', 0, '', 0, '', 0, 1, 1, '', '', '															', '', 1, '0', 5);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int(11) NOT NULL,
  `onuser` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `onuser`, `status`, `description`, `timestamp`) VALUES
(1, 1, 1, 'User Address Edited', '2014-05-12 06:50:21'),
(2, 1, 1, 'User Details Edited', '2014-05-12 06:51:43'),
(3, 1, 1, 'User Details Edited', '2014-05-12 06:51:53'),
(4, 4, 1, 'User Created', '2014-05-12 06:52:44'),
(5, 4, 1, 'User Address Edited', '2014-05-12 12:31:48'),
(6, 23, 2, 'User Created', '2014-10-07 06:46:55'),
(7, 24, 2, 'User Created', '2014-10-07 06:48:25'),
(8, 25, 2, 'User Created', '2014-10-07 06:49:04'),
(9, 26, 2, 'User Created', '2014-10-07 06:49:16'),
(10, 27, 2, 'User Created', '2014-10-07 06:52:18'),
(11, 28, 2, 'User Created', '2014-10-07 06:52:45'),
(12, 29, 2, 'User Created', '2014-10-07 06:53:10'),
(13, 30, 2, 'User Created', '2014-10-07 06:53:33'),
(14, 31, 2, 'User Created', '2014-10-07 06:55:03'),
(15, 32, 2, 'User Created', '2014-10-07 06:55:33'),
(16, 33, 2, 'User Created', '2014-10-07 06:59:32'),
(17, 34, 2, 'User Created', '2014-10-07 07:01:18'),
(18, 35, 2, 'User Created', '2014-10-07 07:01:50'),
(19, 34, 2, 'User Details Edited', '2014-10-07 07:04:34'),
(20, 18, 2, 'User Details Edited', '2014-10-07 07:05:11'),
(21, 18, 2, 'User Details Edited', '2014-10-07 07:05:45'),
(22, 18, 2, 'User Details Edited', '2014-10-07 07:06:03'),
(23, 7, 6, 'User Created', '2014-10-17 06:22:29'),
(24, 7, 6, 'User Details Edited', '2014-10-17 06:32:22'),
(25, 7, 6, 'User Details Edited', '2014-10-17 06:32:37'),
(26, 8, 6, 'User Created', '2014-11-15 12:05:52'),
(27, 9, 6, 'User Created', '2014-12-02 10:46:36'),
(28, 9, 6, 'User Details Edited', '2014-12-02 10:47:34'),
(29, 4, 6, 'User Details Edited', '2014-12-03 10:34:49'),
(30, 4, 6, 'User Details Edited', '2014-12-03 10:36:34'),
(31, 4, 6, 'User Details Edited', '2014-12-03 10:36:49'),
(32, 8, 6, 'User Details Edited', '2014-12-03 10:47:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslevel`
--
ALTER TABLE `accesslevel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `hq_branch`
--
ALTER TABLE `hq_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_content`
--
ALTER TABLE `hq_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_department`
--
ALTER TABLE `hq_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_designation`
--
ALTER TABLE `hq_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_options`
--
ALTER TABLE `hq_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_pillar`
--
ALTER TABLE `hq_pillar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_question`
--
ALTER TABLE `hq_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_team`
--
ALTER TABLE `hq_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_useranswer`
--
ALTER TABLE `hq_useranswer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hq_userpillar`
--
ALTER TABLE `hq_userpillar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logintype`
--
ALTER TABLE `logintype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesslevel`
--
ALTER TABLE `accesslevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `hq_options`
--
ALTER TABLE `hq_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `hq_pillar`
--
ALTER TABLE `hq_pillar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hq_question`
--
ALTER TABLE `hq_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hq_team`
--
ALTER TABLE `hq_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hq_useranswer`
--
ALTER TABLE `hq_useranswer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
