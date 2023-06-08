-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 16, 2022 at 03:20 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybook_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `content_i_follow`
--

CREATE TABLE `content_i_follow` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `contentid` bigint(20) NOT NULL,
  `content_type` varchar(10) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `likes` text NOT NULL,
  `contentid` bigint(20) NOT NULL,
  `following` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `type`, `likes`, `contentid`, `following`) VALUES
(19, 'user', '[{\"userid\":\"735225524\",\"date\":\"2022-02-15 12:57:30\"}]', 1225296084, ''),
(20, 'user', '', 735225524, '[{\"userid\":\"1225296084\",\"date\":\"2022-02-15 12:57:30\"}]'),
(21, 'post', '[{\"userid\":\"735225524\",\"date\":\"2022-02-15 13:01:32\"}]', 18070, ''),
(22, 'user', '[{\"userid\":\"848989622732475\",\"date\":\"2022-02-16 07:40:53\"}]', 848989622732475, ''),
(23, 'post', '[{\"userid\":\"848989622732475\",\"date\":\"2022-02-16 12:26:45\"}]', 223803, '');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL,
  `msgid` varchar(60) NOT NULL,
  `sender` bigint(20) NOT NULL,
  `receiver` bigint(20) NOT NULL,
  `message` text DEFAULT NULL,
  `file` varchar(500) DEFAULT NULL,
  `received` tinyint(1) NOT NULL DEFAULT 0,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_sender` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_receiver` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `tags` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `msgid`, `sender`, `receiver`, `message`, `file`, `received`, `seen`, `deleted_sender`, `deleted_receiver`, `date`, `tags`) VALUES
(22, 'Ayg30nxp5KNf7_jdzdbegR4xt9utplAXVYJ0od3uUNfAlQwVW', 735225524, 1225296084, 'hii', '', 0, 0, 0, 0, '2022-02-15 17:27:39', '[]');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `activity` varchar(10) NOT NULL,
  `contentid` bigint(20) NOT NULL,
  `content_owner` bigint(20) NOT NULL,
  `content_type` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `userid`, `activity`, `contentid`, `content_owner`, `content_type`, `date`) VALUES
(48, 735225524, 'follow', 1225296084, 1225296084, 'profile', '2022-02-15 12:57:30'),
(49, 735225524, 'like', 18070, 735225524, 'post', '2022-02-15 13:01:32'),
(50, 848989622732475, 'like', 223803, 848989622732475, 'post', '2022-02-16 12:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `notification_seen`
--

CREATE TABLE `notification_seen` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `notification_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_seen`
--

INSERT INTO `notification_seen` (`id`, `userid`, `notification_id`) VALUES
(30, 1225296084, 0),
(31, 848989622732475, 0),
(32, 735225524, 0),
(33, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) NOT NULL,
  `postid` bigint(20) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `has_image` tinyint(1) NOT NULL,
  `is_profile_image` tinyint(1) NOT NULL,
  `is_cover_image` tinyint(1) NOT NULL,
  `parent` bigint(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `userid` bigint(20) NOT NULL,
  `owner` bigint(20) NOT NULL,
  `likes` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `tags` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `postid`, `post`, `image`, `has_image`, `is_profile_image`, `is_cover_image`, `parent`, `date`, `userid`, `owner`, `likes`, `comments`, `tags`) VALUES
(75, 310054911320, 'sdsdsd', '', 0, 0, 0, 0, '2022-02-15 15:15:35', 848989622732475, 0, 0, 0, '[]'),
(76, 43713, 'sfdfdfkk', '', 0, 0, 0, 0, '2022-02-15 15:15:39', 848989622732475, 0, 0, 0, '[]'),
(78, 18070, 'helow', '', 0, 0, 0, 0, '2022-02-15 17:31:19', 735225524, 0, 1, 1, '[]'),
(79, 52788, 'heloo', '', 0, 0, 0, 18070, '2022-02-15 17:31:44', 735225524, 0, 0, 0, '[]'),
(81, 73980268932589, 'hiiii', '', 0, 0, 0, 0, '2022-02-16 11:57:49', 735225524, 0, 0, 0, '[]'),
(82, 4226580810047645428, '', 'uploads/848989622732475/Cqb5inrUqMhuBuF.jpg', 1, 1, 0, 0, '2022-02-16 12:01:44', 848989622732475, 0, 0, 0, '[]'),
(83, 223803, '', 'uploads/848989622732475/8srL9qrGD7ZkoU0.jpg', 1, 0, 1, 0, '2022-02-16 12:02:12', 848989622732475, 0, 1, 0, '[]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `owner` bigint(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `type` varchar(10) NOT NULL,
  `profile_image` varchar(500) NOT NULL,
  `cover_image` varchar(500) NOT NULL,
  `date` datetime NOT NULL,
  `online` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `url_address` varchar(100) NOT NULL,
  `likes` int(11) NOT NULL,
  `about` text NOT NULL,
  `tag_name` varchar(20) NOT NULL,
  `group_type` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `owner`, `first_name`, `last_name`, `gender`, `type`, `profile_image`, `cover_image`, `date`, `online`, `email`, `password`, `url_address`, `likes`, `about`, `tag_name`, `group_type`) VALUES
(15, 848989622732475, 0, 'Dfdf', 'Dfdf', 'Male', 'profile', 'uploads/848989622732475/Cqb5inrUqMhuBuF.jpg', 'uploads/848989622732475/8srL9qrGD7ZkoU0.jpg', '2022-02-15 06:38:05', 1645011059, 'admin2@ffghfg.ghfg', '315f166c5aca63a157f7d41007675cb44a948b33', 'dfdf.dfdf', 1, '', 'dfdfdfdf', ''),
(16, 1225296084, 0, 'Haritha', 'Perera', 'Male', 'profile', '', '', '2022-02-15 06:38:40', 1644915297, 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'haritha.perera', 1, '', 'harithaperera', ''),
(17, 493746539599355514, 848989622732475, 'Sdsd', '', '', 'group', '', '', '2022-02-15 10:35:44', 0, '', '', 'sdsd.92', 0, '', '', 'Public'),
(18, 735225524, 0, 'Test', 'Test', 'Female', 'profile', '', '', '2022-02-15 12:53:55', 1644992884, 'pamodi@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'test.test', 0, 'hellowww', 'testtest', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content_i_follow`
--
ALTER TABLE `content_i_follow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `contentid` (`contentid`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `contentid` (`contentid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `msgid` (`msgid`),
  ADD KEY `sender` (`sender`),
  ADD KEY `receiver` (`receiver`),
  ADD KEY `received` (`received`),
  ADD KEY `seen` (`seen`),
  ADD KEY `deleted_sender` (`deleted_sender`),
  ADD KEY `date` (`date`),
  ADD KEY `deleted_receiver` (`deleted_receiver`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `contentid` (`contentid`),
  ADD KEY `content_owner` (`content_owner`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `notification_seen`
--
ALTER TABLE `notification_seen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `notification_id` (`notification_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postid`),
  ADD KEY `date` (`date`),
  ADD KEY `parent` (`parent`),
  ADD KEY `userid` (`userid`),
  ADD KEY `likes` (`likes`),
  ADD KEY `comments` (`comments`),
  ADD KEY `owner` (`owner`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `date` (`date`),
  ADD KEY `online` (`online`),
  ADD KEY `email` (`email`),
  ADD KEY `url_address` (`url_address`),
  ADD KEY `likes` (`likes`),
  ADD KEY `tag_name` (`tag_name`),
  ADD KEY `type` (`type`),
  ADD KEY `owner` (`owner`),
  ADD KEY `group_type` (`group_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content_i_follow`
--
ALTER TABLE `content_i_follow`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `notification_seen`
--
ALTER TABLE `notification_seen`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
