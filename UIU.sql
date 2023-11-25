-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2023 at 01:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `UIU`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `userId` varchar(40) NOT NULL,
  `friend` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`userId`, `friend`) VALUES
('aman@gmail.com', 'h@gmail.com'),
('aman@gmail.com', 'r@gmail.com'),
('h@gmail.com', 'aman@gmail.com'),
('h@gmail.com', 'r@gmail.com'),
('r@gmail.com', 'aman@gmail.com'),
('r@gmail.com', 'h@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `sender` varchar(40) NOT NULL,
  `receiver` varchar(40) NOT NULL,
  `msg` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`sender`, `receiver`, `msg`) VALUES
('h@gmail.com', 'r@gmail.com', 'I am fine. what about you?'),
('r@gmail.com', 'h@gmail.com', 'Hi homi! how are you?');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `content` varchar(500) NOT NULL,
  `likeCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `email`, `content`, `likeCount`) VALUES
(1, 'r@gmail.com', 'this social media is bad ass?', 5),
(2, 'aman@gmail.com', 'aslfj oalwefosj adol agd asdfl asfd;oljafsdaf doal;wefsdj', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(40) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `userType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `firstName`, `lastName`, `phone`, `password`, `gender`, `userType`) VALUES
('aman@gmail.com', 'Aman', 'Hosaain', '01872088111', '1234', 'male', 'student'),
('h@gmail.com', 'Homaira', 'Hea', '01872586125', '1234', 'female', 'student'),
('r@gmail.com', 'Rejuyan', 'Ahmed', '01872088111', '1234', 'male', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`userId`,`friend`),
  ADD KEY `friend` (`friend`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`sender`,`receiver`),
  ADD KEY `receiver` (`receiver`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`friend`) REFERENCES `users` (`email`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver`) REFERENCES `users` (`email`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
