-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2023 at 04:51 PM
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
('aman@gmail.com', 'h@g.c'),
('aman@gmail.com', 'r@g.c'),
('h@g.c', 'aman@gmail.com'),
('h@g.c', 'r@g.c'),
('r@g.c', 'aman@gmail.com'),
('r@g.c', 'h@g.c');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender` varchar(40) NOT NULL,
  `receiver` varchar(40) NOT NULL,
  `msg` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `receiver`, `msg`) VALUES
(53, 'r@g.c', 'h@g.c', 'Hey Hasib How are You.'),
(54, 'h@g.c', 'r@g.c', 'Fine. Tell me about you.'),
(55, 'r@g.c', 'h@g.c', 'i am also file!');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `content` text NOT NULL,
  `likeCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `email`, `content`, `likeCount`) VALUES
(1, 'r@g.c', 'Software design patterns are reusable solutions for common development problems. They come in three types: Creational (dealing with object creation), Structural (managing object composition), and Behavioral (handling object communication). They streamline development and improve code structure and maintainability.\r\n\r\n\r\n\r\n\r\n', 5),
(2, 'aman@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, nam totam veritatis neque magni quidem ex! Commodi amet ad unde quasi qui veritatis ipsum! Sequi debitis nemo quasi ea at!', 4),
(3, 'r@g.c', 'MVC (Model-View-Controller) is a software architectural pattern dividing an app into three interconnected components: \r\n\r\n1. **Model** (data logic),\r\n2. **View** (user interface), and \r\n3. **Controller** (handles user input). \r\n\r\nIt enhances code organization, allowing separate development and modification of each component, simplifying maintenance and scalability in applications.', 50),
(4, 'h@g.c', 'IoT encompasses interconnected devices sharing data online. These gadgets, with sensors and internet connectivity, span from household items to industrial tools. They enable remote control and data exchange, revolutionizing sectors like healthcare, transportation, and smart homes. IoT\'s data collection and analysis enhance efficiency and decision-making, transforming how we interact with technology and our environment.', 46);

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
  `userType` varchar(10) NOT NULL,
  `picture` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `firstName`, `lastName`, `phone`, `password`, `gender`, `userType`, `picture`) VALUES
('aman@gmail.com', 'Aman', 'Hosaain', '01872088111', '1234', 'male', 'student', 'pic-5.jpg'),
('h@g.c', 'Hasib', 'Mia', '01872586125', '1234', 'male', 'student', 'pic-3.jpg'),
('r@g.c', 'Rejuyan', 'Ahmed', '01872088111', '1234', 'male', 'student', 'pic-4.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`userId`,`friend`),
  ADD KEY `friends_ibfk_2` (`friend`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_ibfk_2` (`receiver`),
  ADD KEY `fk_1` (`sender`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_ibfk_1` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`friend`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`sender`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
