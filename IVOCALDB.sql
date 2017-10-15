-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 09, 2017 at 11:17 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ivocaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `imgp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `length` varchar(10) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `decription` varchar(500) NOT NULL,
  `file` varchar(500) NOT NULL,
  `img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `name`, `length`, `genre`, `decription`, `file`, `img`) VALUES
(1, 'Happy – Pharrell Williams', '3.53', 'Pop', 'Happy (Pharrell Williams song) \"Happy\" is a song written, produced, and performed by American singer and record producer Pharrell Williams, from the Despicable Me 2 soundtrack album. It also served as the lead single from Williams\' second studio album, Girl (2014).', 'https://www.iheart.com/artist/pharrell-williams-992340/songs/happy-from-despicable-me-2-25405476/', 'https://upload.wikimedia.org/wikipedia/en/2/23/Pharrell_Williams_-_Happy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `imgp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `uname` varchar(200) NOT NULL,
  `fbuid` varchar(50) NOT NULL,
  `token` varchar(500) NOT NULL,
  `frequncey` varchar(50) NOT NULL,
  `created` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `fbuid`, `token`, `frequncey`, `created`) VALUES
(1, 'damith', '123123123', 'asdasdasldkajsdjlasjdlajsldjlaskjdlaksd', '', '2017-07-25 18:57:26'),
(2, 'damith', '123123123', 'asdasdasldkajsdjlasjdlajsldjlaskjdlaksd', '', '2017-07-30 13:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `warmups`
--

CREATE TABLE `warmups` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `imgp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `warmups`
--
ALTER TABLE `warmups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `warmups`
--
ALTER TABLE `warmups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;