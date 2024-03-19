-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 19, 2024 at 08:44 PM
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
-- Database: `Database`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `user_id`, `first_name`, `middle_name`, `last_name`) VALUES
(1, 1, 'dawg', 'diggity', 'dawgg');

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `publication_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `publication_title` varchar(255) NOT NULL,
  `publication_text` int(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `publication_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publication_comment`
--

CREATE TABLE `publication_comment` (
  `publication_comment_id` int(11) NOT NULL,
  `comment_text` varchar(225) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `publication_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='this is the user table';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`) VALUES
(1, 'admin', '$2y$10$EMMng5TVPO4GRoD0mexdPeMWnpv0kiIgch2K7XnriGWrMN5tYbP/G'),
(2, 'fuked', '$2y$10$11DCUPZhZn6HddcibP4lhONgxFgrUUqyiAEPyMOltG9urZX4jSq5q');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `profile_to_user` (`user_id`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`publication_id`),
  ADD KEY `publication_to_profile` (`profile_id`);

--
-- Indexes for table `publication_comment`
--
ALTER TABLE `publication_comment`
  ADD PRIMARY KEY (`publication_comment_id`),
  ADD KEY `comment_to_profile` (`profile_id`),
  ADD KEY `comment_to_publication` (`publication_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `publication_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publication_comment`
--
ALTER TABLE `publication_comment`
  MODIFY `publication_comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_to_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`) ON DELETE CASCADE;

--
-- Constraints for table `publication_comment`
--
ALTER TABLE `publication_comment`
  ADD CONSTRAINT `comment_to_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_to_publication` FOREIGN KEY (`publication_id`) REFERENCES `publication` (`publication_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
