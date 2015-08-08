-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2015 at 06:11 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_branch`
--

INSERT INTO `hq_branch` (`id`, `language`, `name`, `branchid`, `address`) VALUES
(1, 0, 'Mumbai', 'br1', 'Mumbai,Maharashtra'),
(2, 0, 'Branch2', 'br2', '2,2 area,2,2,2');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_department`
--

INSERT INTO `hq_department` (`id`, `name`, `deptid`) VALUES
(1, 'IT', 'IT-12'),
(2, 'Account', 'dept1');

-- --------------------------------------------------------

--
-- Table structure for table `hq_designation`
--

CREATE TABLE IF NOT EXISTS `hq_designation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_designation`
--

INSERT INTO `hq_designation` (`id`, `name`, `language`) VALUES
(1, 'Sr. Manager', '0'),
(2, 'Manager', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_options`
--

INSERT INTO `hq_options` (`id`, `question`, `representation`, `actualorder`, `image`, `order`, `weight`, `optiontext`, `text`) VALUES
(7, 1, 1, 0, '', '', '20', '1: I try to take the same bus back home everyday', '1: I try to take the same bus back home everyday'),
(8, 1, 1, 0, '', '', '50', '2: I secretly have a bunk bed in office', '2: I secretly have a bunk bed in office'),
(9, 1, 1, 0, '', '', '70', '3: I see the sun set everyday', '3: I see the sun set everyday'),
(10, 1, 1, 0, '', '', '100', '4: I wasn''t able to attend the last family function', '4: I wasn''t able to attend the last family function'),
(11, 2, 1, 0, '', '', '100', '4 pictures as mentioned in the Pictorial Representation column.', '4 pictures as mentioned in the Pictorial Representation column.'),
(12, 3, 1, 0, '', '', '20', 'Getting recognized', 'Getting recognized'),
(13, 3, 1, 0, '', '', '30', 'Money', 'Money'),
(14, 3, 1, 0, '', '', '50', 'Happy Workplace', 'Happy Workplace'),
(15, 3, 1, 0, '', '', '70', 'Time with family and friends', 'Time with family and friends'),
(16, 3, 1, 0, '', '', '80', 'Success', 'Success'),
(17, 3, 1, 0, '', '', '90', 'Independence', 'Independence'),
(18, 3, 1, 0, '', '', '25', 'Support', 'Support'),
(19, 3, 1, 0, '', '', '100', 'Community Service', 'Community Service'),
(20, 4, 1, 0, '', '', '50', '1: It''s simple. I do both!', '1: It''s simple. I do both!'),
(21, 4, 1, 0, '', '', '20', '2: I can''t help thinking about work while exercising', '2: I can''t help thinking about work while exercising'),
(22, 4, 1, 0, '', '', '100', '3: I am out of practice when it comes to exercising', '3: I am out of practice when it comes to exercising'),
(23, 4, 1, 0, '', '', '70', '4:  I focus on exercising while I am at it', '4:  I focus on exercising while I am at it'),
(24, 5, 1, 0, '', '', '100', '1: Some things need to change', '1: Some things need to change'),
(25, 5, 1, 0, '', '', '50', '2: We all have good days and bad days', '2: We all have good days and bad days'),
(26, 5, 1, 0, '', '', '20', '3: Let''s not even talk about work', '3: Let''s not even talk about work'),
(27, 5, 1, 0, '', '', '70', '4: It''s going really well!', '4: It''s going really well!'),
(28, 6, 1, 0, '', '', '40', '1: Not really an issue because I can always reach out to someone.', '1: Not really an issue because I can always reach out to someone.'),
(29, 6, 1, 0, '', '', '20', '2:  I don''t know what to do.', '2:  I don''t know what to do.'),
(30, 6, 1, 0, '', '', '100', '3:  I''m not stressed. I get to learn something new.', '3:  I''m not stressed. I get to learn something new.'),
(31, 6, 1, 0, '', '', '60', '4:  I''m not sure of who I can go to for help.', '4:  I''m not sure of who I can go to for help.'),
(32, 7, 1, 0, '', '', '90', '1: Not a bad idea.', '1: Not a bad idea.'),
(33, 7, 1, 0, '', '', '50', '2:  I''m not sure if you should apply  right now.', '2:  I''m not sure if you should apply  right now.'),
(34, 7, 1, 0, '', '', '80', '3: Are you sure you want to apply in my company? `', '3: Are you sure you want to apply in my company?'),
(35, 7, 1, 0, '', '', '100', '4: Sure! You should definitely apply. Send in your CV.', '4: Sure! You should definitely apply. Send in your CV.'),
(36, 8, 1, 0, '', '', '100', '1: Okay. I don''t have much to say about this.', '1: Okay. I don''t have much to say about this.'),
(37, 8, 1, 0, '', '', '20', '2: Yes, I know! Wow, that''s such good news!', '2: Yes, I know! Wow, that''s such good news!'),
(38, 8, 1, 0, '', '', '60', '3: What is my organization getting an award for?', '3: What is my organization getting an award for?'),
(39, 8, 1, 0, '', '', '80', '4:  That''s nice, I guess.', '4:  That''s nice, I guess.'),
(40, 9, 1, 0, '', '', '20', 'Freedom', 'Freedom'),
(41, 9, 1, 0, '', '', '30', 'Integrity', 'Integrity'),
(42, 9, 1, 0, '', '', '40', 'Team Work', 'Team Work'),
(43, 9, 1, 0, '', '', '50', 'Relationships', 'Relationships'),
(44, 9, 1, 0, '', '', '60', 'Job Security', 'Job Security'),
(45, 9, 1, 0, '', '', '70', 'Recognition', 'Recognition'),
(46, 9, 1, 0, '', '', '80', 'Social Responsibility', 'Social Responsibility'),
(47, 9, 1, 0, '', '', '100', 'Personal Growth', 'Personal Growth'),
(48, 10, 1, 0, '', '', '30', 'Respect  from others', 'Respect  from others'),
(49, 10, 1, 0, '', '', '40', 'Appreciation', 'Appreciation'),
(50, 10, 1, 0, '', '', '50', 'Financial Stability', 'Financial Stability'),
(51, 10, 1, 0, '', '', '60', 'Social Network (Friends and Family)', 'Social Network (Friends and Family)'),
(52, 10, 1, 0, '', '', '70', 'Helping the Society', 'Helping the Society'),
(53, 10, 1, 0, '', '', '80', 'Pursuing Hobbies', 'Pursuing Hobbies'),
(54, 10, 1, 0, '', '', '90', 'Work', 'Work'),
(55, 10, 1, 0, '', '', '100', 'Good Health', 'Good Health'),
(56, 11, 1, 0, '', '', '30', '1: It''s a little hard to get out of bed.', '1: It''s a little hard to get out of bed.'),
(57, 11, 1, 0, '', '', '50', '2: I need to check my mail first thing in the morning.', '2: I need to check my mail first thing in the morning.'),
(58, 11, 1, 0, '', '', '70', '3: I can''t wait to have my morning cup of tea and start the day!', '3: I can''t wait to have my morning cup of tea and start the day!'),
(59, 11, 1, 0, '', '', '100', '4: Can I go back in time to have the weekend again?', '4: Can I go back in time to have the weekend again?'),
(60, 12, 1, 0, '', '', '100', 'Afford the luxuries', 'Afford the luxuries'),
(61, 12, 1, 0, '', '', '90', 'The Team', 'The Team'),
(62, 12, 1, 0, '', '', '80', 'It matters to me', 'It matters to me'),
(63, 12, 1, 0, '', '', '70', 'Meet my deadlines/targets', 'Meet my deadlines/targets'),
(64, 12, 1, 0, '', '', '60', 'Societal Acceptance', 'Societal Acceptance'),
(65, 12, 1, 0, '', '', '50', 'Salary', 'Salary'),
(66, 12, 1, 0, '', '', '40', 'Stability in Life', 'Stability in Life'),
(67, 12, 1, 0, '', '', '30', 'Learn Something New', 'Learn Something New'),
(68, 13, 1, 0, '', '', '30', '1: I have the time. What exercise should I be doing?', '1: I have the time. What exercise should I be doing?'),
(69, 13, 1, 0, '', '', '100', '2: I exercise when I can. It depends on work.', '2: I exercise when I can. It depends on work.'),
(70, 13, 1, 0, '', '', '70', '3:  I have an exercise routine that I follow.', '3:  I have an exercise routine that I follow.'),
(71, 13, 1, 0, '', '', '50', '4: Exercise? I wish I had the time.', '4: Exercise? I wish I had the time.'),
(72, 14, 1, 0, '', '', '50', '1: "I don''t know what to do."', '1: "I don''t know what to do."'),
(73, 14, 1, 0, '', '', '40', '2: "This happens at work. I know how to deal with this."', '2: "This happens at work. I know how to deal with this."'),
(74, 14, 1, 0, '', '', '70', '3: "I will talk to the Counsellor. That helps."', '3: "I will talk to the Counsellor. That helps."'),
(75, 14, 1, 0, '', '', '100', '4: "I need help. Who should I talk to?"', '4: "I need help. Who should I talk to?"'),
(76, 15, 1, 0, '', '', '40', '1: Let me make that call. I''ll start once that is done.', '1: Let me make that call. I''ll start once that is done.'),
(77, 15, 1, 0, '', '', '30', '2: I need to finish this today. Let''s do this!', '2: I need to finish this today. Let''s do this!'),
(78, 15, 1, 0, '', '', '100', '3: It''s due in the evening. Plenty of time left.', '3: It''s due in the evening. Plenty of time left.'),
(79, 15, 1, 0, '', '', '70', '4: I can work on this while sending out those mails.', '4: I can work on this while sending out those mails.'),
(80, 16, 1, 0, '', '', '10', '1: I follow a routine when I eat at work.', '1: I follow a routine when I eat at work.'),
(81, 16, 1, 0, '', '', '40', '2: I eat a bit of both.', '2: I eat a bit of both.'),
(82, 16, 1, 0, '', '', '70', '3: It''s faster and easier to have junk food at work.', '3: It''s faster and easier to have junk food at work.'),
(83, 16, 1, 0, '', '', '100', '4: Eating in office? I wish I had the time!', '4: Eating in office? I wish I had the time!'),
(84, 17, 1, 0, '', '', '40', '1: I am not sure of what to do. I can ask someone to tell me again.', '1: I am not sure of what to do. I can ask someone to tell me again.'),
(85, 17, 1, 0, '', '', '60', '2:  Please don''t pick me for this one.', '2:  Please don''t pick me for this one.'),
(86, 17, 1, 0, '', '', '80', '3:  I know what to do. Not a problem.', '3:  I know what to do. Not a problem.'),
(87, 17, 1, 0, '', '', '100', '4: I don''t know what needs to be done. Who should I be asking?', '4: I don''t know what needs to be done. Who should I be asking?'),
(88, 18, 1, 0, '', '', '100', '1: It''s a little awkward. What am I supposed to say?', '1: It''s a little awkward. What am I supposed to say?'),
(89, 18, 1, 0, '', '', '60', '2: I would prefer to look at my phone.', '2: I would prefer to look at my phone.'),
(90, 18, 1, 0, '', '', '40', '3: Why does the lift get stuck at a time like this? I don''t know what to do.', '3: Why does the lift get stuck at a time like this? I don''t know what to do.'),
(91, 18, 1, 0, '', '', '20', '4: No problem! I get a chance to catch up with my boss.', '4: No problem! I get a chance to catch up with my boss.'),
(92, 19, 1, 0, '', '', '30', '1: Some colleagues might want to be there.', '1: Some colleagues might want to be there.'),
(93, 19, 1, 0, '', '', '50', '2: Colleagues for my party? Not so sure.', '2: Colleagues for my party? Not so sure.'),
(94, 19, 1, 0, '', '', '60', '3: There are so many colleagues who would love to be there', '3: There are so many colleagues who would love to be there'),
(95, 19, 1, 0, '', '', '100', '4: I am not sure of who I can call.', '4: I am not sure of who I can call.'),
(96, 20, 1, 0, '', '', '100', 'Part of a Bigger Family', 'Part of a Bigger Family'),
(97, 20, 1, 0, '', '', '90', 'Fun', 'Fun'),
(98, 20, 1, 0, '', '', '80', 'Room full of strangers', 'Room full of strangers'),
(99, 20, 1, 0, '', '', '70', 'Neutral', 'Neutral'),
(100, 20, 1, 0, '', '', '60', 'Sense of Fear', 'Sense of Fear'),
(101, 20, 1, 0, '', '', '50', 'Lack of Acceptance', 'Lack of Acceptance'),
(102, 20, 1, 0, '', '', '40', 'Each employee in one''s own zone', 'Each employee in one''s own zone'),
(103, 20, 1, 0, '', '', '30', 'Waiting for 6:30 PM', 'Waiting for 6:30 PM');

-- --------------------------------------------------------

--
-- Table structure for table `hq_pillar`
--

CREATE TABLE IF NOT EXISTS `hq_pillar` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `order` varchar(255) NOT NULL,
  `expectedweight` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_pillar`
--

INSERT INTO `hq_pillar` (`id`, `name`, `weight`, `order`, `expectedweight`) VALUES
(1, 'Work Life Blend', '100', '1', '80'),
(2, 'Employee Engagement', '100', '2', '85'),
(3, 'Driving Force', '100', '3', ''),
(4, 'Health of an Individual', '100', '4', ''),
(5, 'Interpersonal Relationships at Work', '100', '5', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_question`
--

INSERT INTO `hq_question` (`id`, `pillar`, `noofans`, `order`, `timestamp`, `text`) VALUES
(1, 1, 1, '2', '2015-07-30 08:05:10', 'You put in your best at work. We know you do. But, your life\n\nlooks like this...'),
(2, 1, 0, '3', '2015-08-03 05:06:28', 'You have managed to get the much-awaited annual leave. You have taken your family along. You will be like…'),
(3, 1, 0, '', '2015-08-04 11:34:14', 'You just met a genie who can grant you wishes of your choice. You choose…'),
(4, 1, 0, '', '2015-08-04 11:34:42', 'You know how important it is to exercise as well as meet deadlines. We know you can do both. So…'),
(5, 2, 0, '', '2015-08-04 11:35:01', 'You meet a school friend after a long time and she asks you, "How''s work?". You say…'),
(6, 2, 0, '', '2015-08-04 11:35:28', 'You are in the middle of a project and things aren''t going your way.  What next?'),
(7, 2, 0, '', '2015-08-04 11:35:56', 'Your junior in college approaches you for a job in your company and you say…'),
(8, 2, 0, '', '2015-08-04 11:36:11', 'Congratulations! Your organization just won an award.'),
(9, 3, 0, '', '2015-08-04 11:36:27', 'The values and/or beliefs that drive you in life are :'),
(10, 3, 0, '', '2015-08-04 11:36:36', 'What will make you sing ''Because I''m happy..''?\n\nIn case audio option of the song (Because I''m happy) unavailable,\nWhat will make you want to say, "This makes me happy!"?'),
(11, 3, 0, '', '2015-08-04 11:36:48', 'Yes, the weekend is over and Monday morning is back.'),
(12, 3, 0, '', '2015-08-04 11:37:02', 'You come to work because.'),
(13, 4, 0, '', '2015-08-04 11:37:21', 'To exercise or not to exercise…that is the question.'),
(14, 4, 0, '', '2015-08-04 11:37:30', 'When work gets stressful, you say…'),
(15, 4, 0, '', '2015-08-04 11:37:39', 'You need to submit that report by today evening and you think…'),
(16, 4, 0, '', '2015-08-04 11:37:52', 'Your food habits at work looks like this…'),
(17, 5, 0, '', '2015-08-04 11:38:10', 'When you are in a team meeting where tasks are being allocated, you think…'),
(18, 5, 0, '', '2015-08-04 11:38:16', 'You are stuck in the lift with your boss. What next?'),
(19, 5, 0, '', '2015-08-04 11:38:24', 'You are making a guest list for your birthday party. You think to yourself…'),
(20, 5, 0, '', '2015-08-04 11:38:39', 'When I am at work, it is like…');

-- --------------------------------------------------------

--
-- Table structure for table `hq_team`
--

CREATE TABLE IF NOT EXISTS `hq_team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `teamid` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hq_team`
--

INSERT INTO `hq_team` (`id`, `name`, `teamid`) VALUES
(5, 'HR Team', 'H1'),
(6, 'Team B', 't2');

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
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `test` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hq_useranswer`
--

INSERT INTO `hq_useranswer` (`id`, `user`, `pillar`, `question`, `option`, `order`, `timestamp`, `test`) VALUES
(1, 15, 1, 1, 7, 0, '2015-08-04 13:05:48', 1),
(2, 15, 1, 2, 11, 0, '2015-08-04 13:06:17', 1),
(3, 15, 1, 3, 15, 0, '2015-08-04 13:06:47', 1),
(4, 15, 1, 4, 21, 0, '2015-08-04 13:07:38', 1),
(5, 15, 2, 5, 25, 0, '2015-08-04 13:08:38', 1),
(6, 15, 2, 6, 0, 0, '2015-08-04 13:08:54', 1),
(7, 15, 2, 7, 33, 0, '2015-08-04 13:09:42', 1),
(8, 15, 2, 8, 37, 0, '2015-08-04 13:11:00', 1),
(9, 15, 3, 9, 43, 0, '2015-08-04 13:11:52', 1),
(10, 15, 3, 10, 52, 0, '2015-08-04 13:12:41', 1),
(11, 15, 3, 11, 56, 0, '2015-08-04 13:15:24', 1),
(12, 15, 3, 12, 64, 0, '2015-08-04 13:16:30', 1),
(13, 15, 4, 13, 70, 0, '2015-08-04 13:16:58', 1),
(14, 15, 4, 14, 74, 0, '2015-08-04 13:17:11', 1),
(15, 15, 4, 15, 76, 0, '2015-08-04 13:17:46', 1),
(16, 15, 4, 17, 84, 0, '2015-08-04 13:18:06', 1),
(17, 15, 4, 18, 90, 0, '2015-08-04 13:19:03', 1),
(18, 15, 5, 17, 84, 0, '2015-08-05 04:20:22', 1),
(19, 15, 5, 18, 89, 0, '2015-08-05 04:20:42', 1),
(20, 15, 5, 19, 94, 0, '2015-08-05 04:21:03', 1),
(21, 15, 5, 20, 99, 0, '2015-08-05 04:21:29', 1),
(22, 16, 1, 1, 8, 0, '2015-08-05 05:04:09', 1),
(23, 16, 1, 2, 11, 0, '2015-08-05 05:04:24', 1),
(24, 16, 1, 3, 16, 0, '2015-08-05 05:04:40', 1),
(25, 16, 1, 4, 20, 0, '2015-08-05 05:04:54', 1),
(26, 16, 2, 5, 25, 0, '2015-08-05 05:05:10', 1),
(27, 16, 2, 6, 29, 0, '2015-08-05 05:05:22', 1),
(28, 16, 2, 7, 33, 0, '2015-08-05 05:05:34', 1),
(29, 16, 2, 8, 38, 0, '2015-08-05 05:05:46', 1),
(30, 16, 3, 9, 45, 0, '2015-08-05 05:37:23', 1),
(31, 16, 3, 11, 58, 0, '2015-08-05 05:38:28', 1),
(32, 16, 3, 12, 64, 0, '2015-08-05 05:38:40', 1),
(33, 16, 4, 13, 69, 0, '2015-08-05 05:39:00', 1),
(34, 16, 4, 14, 73, 0, '2015-08-05 05:39:16', 1),
(35, 16, 4, 15, 77, 0, '2015-08-05 05:39:28', 1),
(36, 16, 4, 16, 80, 0, '2015-08-05 05:39:42', 1),
(37, 16, 5, 17, 84, 0, '2015-08-05 05:40:16', 1),
(38, 16, 5, 18, 88, 0, '2015-08-05 05:44:12', 1),
(39, 16, 5, 19, 93, 0, '2015-08-05 05:44:25', 1),
(40, 16, 5, 20, 101, 0, '2015-08-05 05:44:37', 1),
(41, 7, 1, 1, 8, 0, '2015-08-05 05:44:49', 1),
(42, 7, 1, 2, 11, 0, '2015-08-05 05:44:59', 1),
(43, 7, 1, 3, 17, 0, '2015-08-05 05:45:11', 1),
(44, 7, 1, 4, 21, 0, '2015-08-05 05:45:23', 1),
(45, 7, 2, 5, 25, 0, '2015-08-05 05:45:44', 1),
(46, 7, 2, 6, 30, 0, '2015-08-05 05:45:55', 1),
(47, 7, 2, 7, 33, 0, '2015-08-05 05:46:07', 1),
(48, 7, 2, 8, 37, 0, '2015-08-05 05:46:31', 1),
(49, 7, 3, 9, 45, 0, '2015-08-05 05:46:47', 1),
(50, 7, 3, 10, 52, 0, '2015-08-05 05:47:01', 1),
(51, 7, 3, 11, 57, 0, '2015-08-05 05:47:17', 1),
(52, 7, 3, 12, 64, 0, '2015-08-05 05:47:28', 1),
(53, 7, 4, 13, 70, 0, '2015-08-05 05:47:38', 1),
(54, 7, 4, 14, 72, 0, '2015-08-05 05:47:51', 1),
(55, 7, 4, 15, 76, 0, '2015-08-05 05:48:16', 1),
(56, 7, 4, 16, 81, 0, '2015-08-05 05:59:18', 1),
(57, 7, 5, 17, 85, 0, '2015-08-05 05:59:31', 1),
(58, 7, 5, 18, 89, 0, '2015-08-05 05:59:43', 1),
(59, 7, 5, 19, 94, 0, '2015-08-05 05:59:56', 1),
(60, 7, 5, 20, 101, 0, '2015-08-05 06:00:09', 1),
(61, 15, 1, 1, 8, 0, '2015-08-05 11:00:06', 2),
(62, 15, 1, 2, 11, 0, '2015-08-05 11:00:33', 2),
(63, 15, 1, 3, 18, 0, '2015-08-05 11:01:01', 2),
(64, 15, 1, 4, 21, 0, '2015-08-05 11:01:17', 2),
(65, 15, 2, 5, 24, 0, '2015-08-05 11:01:52', 2),
(66, 15, 2, 6, 30, 0, '2015-08-05 11:02:11', 2),
(67, 15, 2, 7, 33, 0, '2015-08-05 11:02:30', 2),
(68, 15, 2, 8, 36, 0, '2015-08-05 11:02:53', 2),
(69, 15, 3, 9, 44, 0, '2015-08-05 11:03:13', 2),
(70, 15, 3, 10, 52, 0, '2015-08-05 11:03:30', 2),
(71, 15, 3, 11, 57, 0, '2015-08-05 11:03:45', 2),
(72, 15, 3, 12, 65, 0, '2015-08-05 11:04:07', 2),
(73, 15, 4, 13, 68, 0, '2015-08-05 11:04:41', 2),
(74, 15, 4, 14, 73, 0, '2015-08-05 11:05:10', 2),
(75, 15, 4, 15, 77, 0, '2015-08-05 11:05:25', 2),
(76, 15, 4, 16, 81, 0, '2015-08-05 11:05:39', 2),
(77, 15, 5, 17, 85, 0, '2015-08-05 11:06:00', 2),
(78, 15, 5, 18, 89, 0, '2015-08-05 11:06:14', 2),
(79, 15, 5, 19, 93, 0, '2015-08-05 11:06:29', 2),
(80, 15, 5, 20, 103, 0, '2015-08-05 11:06:44', 2),
(81, 7, 1, 1, 10, 0, '2015-08-05 11:10:15', 2),
(82, 7, 1, 2, 11, 0, '2015-08-05 11:11:07', 2),
(83, 7, 1, 3, 16, 0, '2015-08-05 11:11:47', 2),
(84, 7, 1, 4, 21, 0, '2015-08-05 11:21:30', 2),
(85, 7, 2, 5, 27, 0, '2015-08-05 11:22:12', 2),
(86, 7, 2, 6, 29, 0, '2015-08-05 11:22:28', 2),
(87, 7, 2, 7, 34, 0, '2015-08-05 11:22:43', 2),
(88, 7, 2, 8, 37, 0, '2015-08-05 11:22:58', 2),
(89, 7, 3, 9, 44, 0, '2015-08-05 11:23:21', 2),
(90, 7, 3, 10, 54, 0, '2015-08-05 11:23:44', 2),
(91, 7, 3, 11, 57, 0, '2015-08-05 11:24:19', 2),
(92, 7, 3, 12, 67, 0, '2015-08-05 11:24:34', 2),
(93, 7, 4, 13, 69, 0, '2015-08-05 11:24:50', 2),
(94, 7, 4, 14, 73, 0, '2015-08-05 11:28:12', 2),
(95, 7, 4, 15, 77, 0, '2015-08-05 11:28:27', 2),
(96, 7, 4, 16, 81, 0, '2015-08-05 11:29:18', 2),
(97, 7, 5, 17, 86, 0, '2015-08-05 11:30:42', 2),
(98, 7, 5, 18, 90, 0, '2015-08-05 11:32:38', 2),
(99, 7, 5, 19, 94, 0, '2015-08-05 11:32:54', 2),
(100, 7, 5, 20, 103, 0, '2015-08-05 11:33:09', 2);

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
(7, 'Questions', '', '', 'site/viewquestion', 1, 0, 1, 6, 'icon-dashboard'),
(8, 'Options', '', '', 'site/viewoptions', 1, 0, 1, 7, 'icon-dashboard'),
(9, 'User Answers', '', '', 'site/viewuseranswer', 1, 0, 1, 8, 'icon-dashboard'),
(10, 'User Pillar', '', '', 'site/viewuserpillar', 1, 0, 1, 9, 'icon-dashboard'),
(11, 'Content', '', '', 'site/viewcontent', 1, 0, 1, 10, 'icon-dashboard'),
(12, 'Team', '', '', 'site/viewteam', 1, 0, 1, 11, 'icon-dashboard'),
(14, 'Test ', '', '', 'site/viewtest', 1, 0, 1, 13, 'icon-dashboard'),
(15, 'Test Pillar Expected', '', '', 'site/viewtestpillarexpected', 1, 0, 1, 14, 'icon-dashboard');

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
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(8, 3),
(11, 3),
(12, 3),
(7, 3),
(13, 1),
(14, 1),
(15, 1),
(15, 2),
(15, 3);

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
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `units` varchar(255) NOT NULL,
  `schedule` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `department` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `designation` int(11) NOT NULL,
  `check` int(11) NOT NULL,
  `team` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `enddate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `units`, `schedule`, `startdate`, `department`, `branch`, `designation`, `check`, `team`, `timestamp`, `enddate`) VALUES
(1, 'Department test', '2', 1, '2015-08-06', 1, 1, 1, 1, 5, '2015-08-06 12:23:45', '2015-08-18'),
(2, 'Branch test', '1', 1, '2015-08-06', 0, 1, 0, 2, 0, '2015-08-06 11:55:52', '2015-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `testpillarexpected`
--

CREATE TABLE IF NOT EXISTS `testpillarexpected` (
  `id` int(11) NOT NULL,
  `test` int(11) NOT NULL,
  `pillar` int(11) NOT NULL,
  `expectedvalue` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testpillarexpected`
--

INSERT INTO `testpillarexpected` (`id`, `test`, `pillar`, `expectedvalue`) VALUES
(1, 1, 1, 70),
(2, 1, 2, 99),
(3, 2, 1, 20),
(4, 2, 2, 60),
(5, 1, 3, 50),
(6, 2, 3, 60),
(7, 1, 4, 80),
(8, 2, 4, 80),
(9, 1, 5, 20),
(10, 2, 5, 70);

-- --------------------------------------------------------

--
-- Table structure for table `testquestion`
--

CREATE TABLE IF NOT EXISTS `testquestion` (
  `id` int(11) NOT NULL,
  `test` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `datetimestatus` int(11) NOT NULL,
  `dateandtime` datetime NOT NULL,
  `sendstatus` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testquestion`
--

INSERT INTO `testquestion` (`id`, `test`, `question`, `datetimestatus`, `dateandtime`, `sendstatus`) VALUES
(16, 1, 1, 1, '2015-08-06 00:00:00', 1),
(17, 1, 2, 1, '2015-08-06 12:00:00', 1),
(18, 1, 3, 1, '2015-08-07 00:00:00', 1),
(19, 1, 4, 1, '2015-08-07 12:00:00', 1),
(20, 1, 5, 1, '2015-08-08 00:00:00', 1),
(21, 1, 6, 1, '2015-08-08 12:00:00', 1),
(22, 1, 7, 1, '2015-08-09 00:00:00', 0),
(23, 1, 8, 1, '2015-08-09 12:00:00', 0),
(24, 1, 9, 1, '2015-08-10 00:00:00', 0),
(25, 1, 10, 1, '2015-08-10 12:00:00', 0),
(26, 1, 11, 1, '2015-08-11 00:00:00', 0),
(27, 1, 12, 1, '2015-08-11 12:00:00', 0),
(28, 1, 13, 1, '2015-08-12 00:00:00', 0),
(29, 1, 14, 1, '2015-08-12 12:00:00', 0),
(30, 1, 15, 1, '2015-08-13 00:00:00', 0),
(31, 1, 16, 1, '2015-08-13 12:00:00', 0),
(32, 1, 17, 1, '2015-08-14 00:00:00', 0),
(33, 1, 18, 1, '2015-08-14 12:00:00', 0),
(34, 1, 19, 1, '2015-08-15 00:00:00', 0),
(35, 1, 20, 1, '2015-08-15 12:00:00', 0),
(36, 2, 1, 1, '2015-08-06 00:00:00', 1),
(37, 2, 2, 1, '2015-08-07 00:00:00', 1),
(38, 2, 3, 1, '2015-08-08 00:00:00', 1),
(39, 2, 4, 1, '2015-08-09 00:00:00', 0),
(40, 2, 5, 1, '2015-08-10 00:00:00', 0),
(41, 2, 6, 1, '2015-08-11 00:00:00', 0),
(42, 2, 7, 1, '2015-08-12 00:00:00', 0),
(43, 2, 8, 1, '2015-08-13 00:00:00', 0),
(44, 2, 9, 1, '2015-08-14 00:00:00', 0),
(45, 2, 10, 1, '2015-08-15 00:00:00', 0),
(46, 2, 11, 1, '2015-08-16 00:00:00', 0),
(47, 2, 12, 1, '2015-08-17 00:00:00', 0),
(48, 2, 13, 1, '2015-08-18 00:00:00', 0),
(49, 2, 14, 1, '2015-08-19 00:00:00', 0),
(50, 2, 15, 1, '2015-08-20 00:00:00', 0),
(51, 2, 16, 1, '2015-08-21 00:00:00', 0),
(52, 2, 17, 1, '2015-08-22 00:00:00', 0),
(53, 2, 18, 1, '2015-08-23 00:00:00', 0),
(54, 2, 19, 1, '2015-08-24 00:00:00', 0),
(55, 2, 20, 1, '2015-08-25 00:00:00', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`, `gender`, `age`, `maritalstatus`, `designation`, `department`, `noofyearsinorganization`, `spanofcontrol`, `description`, `employeeid`, `branch`, `language`, `team`) VALUES
(1, 'wohlig', 'a63526467438df9566c508027d9cb06b', 'wohlig@wohlig.com', 1, '0000-00-00 00:00:00', 1, NULL, '', '', 1, '', 0, '0', 0, 1, 1, '', '', '															', '', 1, '0', 5),
(4, 'pratik', '0cb2b62754dfd12b6ed0161d4b447df7', 'pratik@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, 'pratik', '1', 1, '', 0, '', 0, 0, 0, '', '', '', '', 0, '', 0),
(5, 'wohlig123', 'wohlig123', 'wohlig1@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, '', '', 0, '', 0, '', 0, 0, 0, '', '', '', '', 0, '', 0),
(6, 'wohlig1', 'a63526467438df9566c508027d9cb06b', 'wohlig2@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, '', '', 0, '', 0, '', 0, 0, 0, '', '', '', '', 0, '', 0),
(7, 'Avinash', 'a63526467438df9566c508027d9cb06b', 'avinash@wohlig.com', 4, '2014-10-17 06:22:29', 1, NULL, '', '', 0, '', 0, '', 0, 1, 1, '10', '', '', '', 1, '1', 1),
(9, 'avinash', 'a208e5837519309129fa466b0c68396b', 'a@email.com', 2, '2014-12-03 11:06:19', 3, '', '', '123', 1, 'demojson', 0, '', 0, 0, 0, '', '', '', '', 0, '', 0),
(13, 'aaa', 'a208e5837519309129fa466b0c68396b', 'aaa3@email.com', 3, '2014-12-04 06:55:42', 3, NULL, '', '1', 2, 'userjson', 0, '', 0, 0, 0, '', '', '', '', 0, '', 0),
(14, 'xdcvghbn', 'e99a18c428cb38d5f260853678922e03', 'dcvgb@rftgh.ghhb', 1, '2015-07-30 11:47:58', 1, '', '', '', 0, '', 0, '', 0, 1, 1, '', '', '															', '', 1, '0', 5),
(15, 'Pooja', 'a63526467438df9566c508027d9cb06b', 'pooja.wohlig@gmail.com', 4, '2014-10-17 06:22:29', 1, NULL, '', '', 0, '', 0, '', 0, 1, 1, '10', '', '', '', 1, '1', 1),
(16, 'Jagruti', 'a63526467438df9566c508027d9cb06b', 'jagruti@wohlig.com', 4, '2014-10-17 06:22:29', 1, NULL, '', '', 0, '', 0, '', 0, 1, 1, '10', '', '', '', 1, '1', 1),
(17, 'HR', '938d4fcc4d4599b6c97a97767336cb1f', 'hr@wohlig.com', 3, '2015-08-04 08:57:34', 1, '', 'hr', '12345678', 0, '', 0, '20', 0, 0, 1, '12', '2', '		hbjhb													', '65656', 0, '0', 5);

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

-- --------------------------------------------------------

--
-- Table structure for table `userquestionsend`
--

CREATE TABLE IF NOT EXISTS `userquestionsend` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `test` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userquestionsend`
--

INSERT INTO `userquestionsend` (`id`, `user`, `test`, `question`, `timestamp`) VALUES
(1, 7, 1, 6, '2015-08-08 07:15:43'),
(2, 15, 1, 6, '2015-08-08 07:15:45'),
(3, 16, 1, 6, '2015-08-08 07:15:47');

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
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testpillarexpected`
--
ALTER TABLE `testpillarexpected`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testquestion`
--
ALTER TABLE `testquestion`
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
-- Indexes for table `userquestionsend`
--
ALTER TABLE `userquestionsend`
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
-- AUTO_INCREMENT for table `hq_branch`
--
ALTER TABLE `hq_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hq_department`
--
ALTER TABLE `hq_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hq_designation`
--
ALTER TABLE `hq_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hq_options`
--
ALTER TABLE `hq_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `hq_pillar`
--
ALTER TABLE `hq_pillar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hq_question`
--
ALTER TABLE `hq_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `hq_team`
--
ALTER TABLE `hq_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `hq_useranswer`
--
ALTER TABLE `hq_useranswer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `testpillarexpected`
--
ALTER TABLE `testpillarexpected`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `testquestion`
--
ALTER TABLE `testquestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `userquestionsend`
--
ALTER TABLE `userquestionsend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
