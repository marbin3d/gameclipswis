-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2018 at 02:36 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(3, 'Marbin', 'Sarria', 'marbin3d@hotmail.com', 'marbin3d', '123456', 'spanish'),
(12, 'Sofia', 'Grijalva', 'sofia.grijalva1994@gmail.com', 'sofisu', '1234', 'spanish'),
(13, 'Ana', 'Gloria', 'ana@gmail.com', 'Anita', '123', 'Portugues'),
(14, 'Pedro', 'Moscoso', 'pedro@gmail.com', 'Pedro', '123', 'Spanish'),
(15, 'David', 'Grijalva', 'david@gmail.com', 'David', '123', 'Spanish'),
(16, 'Claire', 'Lauren', 'claire@gmail.com', 'Claire', '123', 'English'),
(18, 'Carlos', 'Pin', 'carlos@gmail.com', 'Carlos', '123', 'Spanish'),
(19, 'Claudia', 'Idalgo', 'claudia@gmail.com', 'Claudia', '123', 'English'),
(20, 'Mauricio', 'Espinel', 'mmauricio@gmail.com', 'Mauricio', '123', 'French'),
(21, 'Natalia', 'Vinazco', 'natalia@hotmail.com', 'Natalia', '123', 'Spanish'),
(2, 'Marbin2', 'Sarria', 'marbin3d2@hotmail.com', 'marbin3d2', '123456', 'spanish');

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

--
-- Dumping data for table `uservideo`
--

INSERT INTO `uservideo` (`uservideoID`, `userID`, `videoID`, `rating`) VALUES
(2, 3, 86, 4),
(3, 2, 96, 5),
(4, 12, 96, 4),
(5, 3, 133, 4),
(6, 3, 131, 5),
(7, 3, 127, 4),
(8, 3, 159, 4);

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
(97, 'videoClips/videoGame2Test.mp4', 'video Sofia1', 'strategy', 'Spanish', '1820', 'empires', '2018-03-20 00:35:06', 1, 'marbin3d@hotmail.com'),
(96, 'videoClips/videoGame2Test.mp4', 'game msv', 'strategy', 'Chinesse', '20-22', 'game 3 test', '2018-03-19 11:50:06', 1, 'marbin3d@hotmail.com'),
(133, 'videoClips/guide2.mp4', 'Fallout in 5 Minutes', 'Tutorial', 'English', 'All ages', 'Need a refresher before Fallout 4? This is everything you need to know about the story of Fallout. Watch more games in 5 minutes: Halo - https://www.youtube.com/watch?v=i7zLB... Call of Duty Black Ops - https://www.youtube.com/watch?v=Bmskt... MGS 5 Big Boss - https://www.youtube.com/watch?v=CrfVK... Subscribe to IGN for more! http://www.youtube.com/user/IGNentert...', '2018-04-28 03:12:09', 1, 'claudia@gmail.com'),
(131, 'videoClips/strategy1.mp4', 'Pudge Plays #2 - Dota 2', 'Strategy', 'English', 'All ages', 'Submit Your Dota 2 Pudge Plays!', '2018-04-28 02:39:11', 1, 'david@gmail.com'),
(132, 'videoClips/trailer1.mp4', 'StarCraft II: Legacy of the Void Opening Cinematic', 'Trailer', 'English', 'All ages', 'The time of reclamation is upon us! Blizzard Entertainment is pleased to present the StarCraft II: Legacy of the Void opening cinematic. On November 10, 2015, players will join the fight to reclaim Aiur and vanquish the universe’s most ancient evil.', '2018-04-28 02:53:00', 1, 'claire@gmail.com'),
(127, 'videoClips/gameplay1.mp4', 'Dark Souls: Remastered - Gameplay Trailer', 'Game Play', 'English', 'All ages', 'Lordran looks better than ever in Dark Souls: Remastered, coming to PC, Xbox One and PlayStation 4 May 25th 2018.', '2018-04-27 02:01:26', 1, 'sofia.grijalva1994@gmail.com'),
(128, 'videoClips/gameplay2.mp4', 'Fortnite Battle Royale Review', 'Game Play', 'English', 'All ages', 'Fortnite Battle Royale reviewed by Austen Goslin on PC, Xbox One, PlayStation 4, and iOS. Also available on Android.', '2018-04-28 02:07:07', 1, 'ana@gmail.com'),
(134, 'videoClips/gameplay3.mp4', '5 Minutes of Skyrim Nintendo Switch Gameplay - PAX 2017', 'Game Play', 'English', 'All ages', 'Zach and Brian goof their way through the starting areas of Skyrim while playing it on Nintendo Switch.\r\n\r\nWatch more from PAX West 2017 here!\r\nhttps://www.youtube.com/watch?v=saZRs...\r\n\r\nSubscribe to IGN for more!\r\nhttp://www.youtube.com/user/IGNentert...', '2018-04-28 03:19:46', 1, 'mmauricio@gmail.com'),
(86, 'videoClips/videoGame2Test.mp4', 'video86', 'strategy', 'Spanish', '18-20', 'empires', '2018-03-20 00:35:06', 1, 'marbin3d@hotmail.com'),
(158, 'https://www.youtube.com/embed/vRRvFX-P-R4', 'Adventure world', 'adventure', 'English', '16-30', 'Game of adventures', '2018-05-17 13:00:35', 1, 'marbin3d@hotmail.com'),
(159, 'https://www.youtube.com/embed/b5vRXcchxLg', 'cars game', 'sport', 'English', '12-20', 'Sport game Racing cars', '2018-05-17 13:07:54', 1, 'marbin3d@hotmail.com');

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
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `uservideo`
--
ALTER TABLE `uservideo`
  MODIFY `uservideoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `videoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
