-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2018 at 08:23 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gameclipsdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `videoID` int(11) NOT NULL,
  `comment` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `favourite_clips`
--

CREATE TABLE `favourite_clips` (
  `favouriteID` int(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `videoID` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `FName` varchar(255) NOT NULL,
  `LName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `FName`, `LName`, `email`, `username`, `password`, `language`) VALUES
(3, 'marbin', 'sarria', 'marbin3d@hotmail.com', 'marbingames', '123456', 'spanish'),
(2, 'Sofia', 'mmm', 'mmm', '', 'mmm', 'mmm');

-- --------------------------------------------------------

--
-- Table structure for table `uservideo`
--

CREATE TABLE `uservideo` (
  `uservideoID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `videoID` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `videoID` int(11) NOT NULL,
  `source` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `ageRange` varchar(255) NOT NULL,
  `description` text,
  `dateUpload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`videoID`, `source`, `title`, `category`, `language`, `ageRange`, `description`, `dateUpload`, `views`, `email`) VALUES
(86, '../videoClips/videoGame2.mp4', 'yy', 'yyy', 'yy', '77', 'yy', '2018-03-18 09:58:06', 0, 'jackactive@hotmail.com'),
(97, 'videoClips/video Sofia.mp4', 'video Sofia1', 'strategy', 'Spanish', '18-20', 'empires', '2018-03-20 00:35:06', 0, 'marbin3d@hotmail.com'),
(96, 'videoClips/video Sofia.mp4', 'game msv', 'strategy', 'Chinesse', '20-22', 'game 3 test', '2018-03-19 11:50:06', 0, 'marbin3d@hotmail.com'),
(87, 'videoClips/videoGame2.mp4', 'game2', 'strategy', 'English', '14-16', 'game video 2', '2018-03-18 10:11:04', 0, 'jackactive@hotmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `videoID` (`videoID`);

--
-- Indexes for table `favourite_clips`
--
ALTER TABLE `favourite_clips`
  ADD PRIMARY KEY (`favouriteID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `videoID` (`videoID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `uservideo`
--
ALTER TABLE `uservideo`
  ADD PRIMARY KEY (`uservideoID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `videoID` (`videoID`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`videoID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourite_clips`
--
ALTER TABLE `favourite_clips`
  MODIFY `favouriteID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `uservideo`
--
ALTER TABLE `uservideo`
  MODIFY `uservideoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `videoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
