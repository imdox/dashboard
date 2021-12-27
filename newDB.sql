-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 26, 2021 at 03:40 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `project14`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(500) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `date`) VALUES
(4, 'admin@example.com', '$2y$12$knvnvT4sUw80J9LtVCD7VO5r0MJZXQ10..SDF5PMA0cwd31Y5qIkS', '2018-08-07 01:23:11'),
(5, 'admin@gmail.com', '$2y$12$PfwF/GlUHcDS0QwQY/gNVueBUiUYb4cepXyLw6238nxJYSys5xF6e', '2021-12-11 19:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `author` varchar(200) NOT NULL,
  `title` varchar(400) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `author`, `title`, `content`, `date`) VALUES
(5, 'Ethredah', 'MENTAL HEALTH IS REAL', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,csem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. enean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,\r\n\r\n', '2018-07-27 15:28:31'),
(15, 'hhkjkjjkjkj', 'hjkhjkhjkjkjkj', 'opopoopopopoo ', '2021-12-13 23:54:32'),
(16, 'sdfsdfsdfs', 'sdfsdfsd', ' sdfsdfsdf', '2021-12-13 23:55:17'),
(17, 'sdfsdfsdf', 'sdfsdfsdfs', 'sdfdsfsdfs ', '2021-12-13 23:55:24'),
(18, 'wewewewe', 'qwqwqwqwqw', 'asasasasas ', '2021-12-13 23:55:35'),
(19, 'ytytytytyty', 'jkjkkjjkjkjjk', ';l;ll;looioioioiiiio ', '2021-12-13 23:55:47'),
(20, 'sfdfsdfsf', 'dsfdsfsdf', 'sdfsdfsdfsd ', '2021-12-14 00:49:04'),
(21, 'dodge', 'dgdggg', 'gffggfgfg ', '2021-12-14 18:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `link` varchar(1000) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `content`, `image`, `link`, `date`, `time`, `active`) VALUES
(1, 'test', 'ssadsadsa ', '../images/event_img/WhatsApp Image 2021-12-20 at 2.01.32 PM.jpeg', 'sdsadsadsa', '2021-12-24', '23:05', 1),
(2, 'sdfdsfd', 'sdfdsfd ', '../images/event_img/WhatsApp Image 2021-12-20 at 2.01.32 PM.jpeg', 'ddfdfdf', '2021-11-21', '01:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_center`
--

CREATE TABLE `m_center` (
  `id` int(11) NOT NULL,
  `type` varchar(10) DEFAULT 'img',
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `video` varchar(1000) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reg_user`
--

CREATE TABLE `reg_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reg_user`
--

INSERT INTO `reg_user` (`id`, `name`, `email`, `mobile`, `city`, `event_id`, `created_at`) VALUES
(1, 'Shrawan Shide', 's@gmail.com', '9167186662', 'mumbai', 1, '2021-12-25 09:43:30'),
(3, 'Shrawan Shinde', 'imdox.services@gmail.com', '09167879876', 'Kolhapur', 1, '2021-12-26 13:31:50'),
(7, 'Shrawan Shinde', 'imdox.services@gmail.com', '', 'Kolhapur', 1, '2021-12-26 14:48:54'),
(8, 'Shrawan Shinde', 'imdox.services@gmail.com', '9167879876', 'Kolhapur', 1, '2021-12-26 15:00:01'),
(9, 'Shrawan Shinde', 'mbot@gmail.com', '8888888888', 'Mumbai', 1, '2021-12-26 15:03:32');

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(11) NOT NULL,
  `names` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`id`, `names`, `email`, `mobile`, `message`, `date`) VALUES
(4, 'James Mlamba', 'jaymo@gmail.com', '', 'I am interested in a meeting.', '2018-07-28 01:38:22'),
(5, 'James Mlamba', 'ethredah@gmail.com', '', 'hi', '2018-07-31 19:45:43'),
(6, 'Shrawan Shinde', 'imdox.services@gmail.com', '09167879876', 'sdfsdf f dfdfdf fdf dff', '2021-12-26 16:15:19'),
(7, 'Shrawan Shinde', 'imdox.services@gmail.com', '09167879876', 'aa', '2021-12-26 16:15:58'),
(8, 'Shrawan Shinde', 'imdox.services@gmail.com', '09167879876', 'aa', '2021-12-26 16:16:45'),
(9, 'Shrawan Shinde', 'imdox.services@gmail.com', '09167879876', 'sdasdsd', '2021-12-26 16:20:30'),
(10, 'Shrawan Shinde', 'imdox.services@gmail.com', '09167879876', 'fdsfdsfd', '2021-12-26 16:21:15'),
(11, 'Shrawan Shinde', 'imdox.services@gmail.com', '09167879876', 'sdssdfsdf sdfsdf sf sdf sdf sdf sd fds', '2021-12-26 20:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `f_name` varchar(100) DEFAULT NULL,
  `l_name` varchar(100) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `rpc_code` varchar(100) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `f_name`, `l_name`, `password`, `mobile`, `city`, `country`, `rpc_code`, `date`, `created_at`, `login_time`) VALUES
(3, 'ethredah@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-27 18:21:30', '2021-12-20 20:33:04', '2021-12-20 20:34:25'),
(4, 'james@hack3.io', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-27 18:21:30', '2021-12-20 20:33:04', '2021-12-20 20:34:25'),
(6, 'admin@pikash.sales', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-28 01:49:21', '2021-12-20 20:33:04', '2021-12-20 20:34:25'),
(7, 'imdox.services@gmail.com', 'Shrawan', 'Shinde', '123456', '09167879876', 'Kolhapur', 'India', '123456', '2021-12-21 02:06:44', '2021-12-20 20:36:44', '2021-12-20 20:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `video` varchar(1000) NOT NULL,
  `blogid` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name`, `description`, `image`, `video`, `blogid`, `date`) VALUES
(9, 'ddd', ' dddddd', '../images/video_img/xhGht9-WhatsApp Image 2021-12-20 at 4.38.13 PM.jpeg', 'https://www.youtube.com/watch?v=G87knTZnhks', 17, '2021-12-24 01:04:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_center`
--
ALTER TABLE `m_center`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg_user`
--
ALTER TABLE `reg_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogid` (`blogid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_center`
--
ALTER TABLE `m_center`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reg_user`
--
ALTER TABLE `reg_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
