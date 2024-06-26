-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2024 at 12:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `RugbyDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admins`
--

CREATE TABLE `Admins` (
  `admin_id` int(11) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `player_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Coaches`
--

CREATE TABLE `Coaches` (
  `coach_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact_details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event_description` text DEFAULT NULL,
  `approval_status` enum('pending','approved') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_date`, `event_time`, `event_description`, `approval_status`) VALUES
(20, 'coding ', '2002-03-03', '23:30:00', 'treforbes ', 'approved'),
(21, 'football', '2024-03-20', '14:30:00', 'treforbes\r\n', 'approved'),
(22, 'football', '2024-04-28', '23:30:00', 'come play ball ', 'approved'),
(23, 'treis', '2024-04-30', '12:30:00', 'footbal is coll and fun', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `Matches`
--

CREATE TABLE `Matches` (
  `match_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `host_team_id` int(11) DEFAULT NULL,
  `guest_team_id` int(11) DEFAULT NULL,
  `host_team_score` int(11) DEFAULT NULL,
  `guest_team_score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Players`
--

CREATE TABLE `Players` (
  `player_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` char(40) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `is_admin` enum('0','1') DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Players`
--

INSERT INTO `Players` (`player_id`, `username`, `password`, `position`, `weight`, `email`, `phone_number`, `is_admin`, `team_id`, `first_name`, `last_name`) VALUES
(1, 'JacobPhillips', '8cb2237d0679ca88db6464eac60da96345513964', 'President ', NULL, 'Jacob.Phillips@bobcats.gcsu.edu', '7705330223', '1', 1, 'Jacob', 'Phillips '),
(8, 'HarrisonSmy', '8cb2237d0679ca88db6464eac60da96345513964', 'Vice President', NULL, 'Harrison.Smy@bobcats.gcsu.edu', '7709255331', '1', 1, 'Harrison', 'Say'),
(9, 'SydneyJoubert', '8cb2237d0679ca88db6464eac60da96345513964', 'Vice President ', NULL, 'Sydney.Joubert@bobcats.gcsu.edu', '5045089017', '1', 2, 'Sydney', 'Joubert '),
(10, 'CiarraMunsey ', '8cb2237d0679ca88db6464eac60da96345513964', 'President ', NULL, 'Ciarra.munsey@bobcats.gcsu.edu', '7702355778', '1', 2, 'Ciarra ', 'Munsey'),
(11, 'treforbes', 'Kuntrevous1', NULL, NULL, 'kuntrevous.forbes@bobcats.gcsu.edu', '6787611966', '0', 1, 'Kuntrevous', 'Forbes');

-- --------------------------------------------------------

--
-- Table structure for table `Teams`
--

CREATE TABLE `Teams` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(255) DEFAULT NULL,
  `team_type` varchar(10) DEFAULT NULL,
  `coach_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Teams`
--

INSERT INTO `Teams` (`team_id`, `team_name`, `team_type`, `coach_id`) VALUES
(1, 'Bobcats', 'Mens', NULL),
(2, 'Bobcats', 'Womens', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Team_Records`
--

CREATE TABLE `Team_Records` (
  `record_id` int(11) NOT NULL,
  `team_id` int(11) DEFAULT NULL,
  `wins` int(11) DEFAULT NULL,
  `losses` int(11) DEFAULT NULL,
  `draws` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `Coaches`
--
ALTER TABLE `Coaches`
  ADD PRIMARY KEY (`coach_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `Matches`
--
ALTER TABLE `Matches`
  ADD PRIMARY KEY (`match_id`),
  ADD KEY `host_team_id` (`host_team_id`),
  ADD KEY `guest_team_id` (`guest_team_id`);

--
-- Indexes for table `Players`
--
ALTER TABLE `Players`
  ADD PRIMARY KEY (`player_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `Teams`
--
ALTER TABLE `Teams`
  ADD PRIMARY KEY (`team_id`),
  ADD KEY `coach_id` (`coach_id`);

--
-- Indexes for table `Team_Records`
--
ALTER TABLE `Team_Records`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `team_id` (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admins`
--
ALTER TABLE `Admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Coaches`
--
ALTER TABLE `Coaches`
  MODIFY `coach_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `Matches`
--
ALTER TABLE `Matches`
  MODIFY `match_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Players`
--
ALTER TABLE `Players`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Teams`
--
ALTER TABLE `Teams`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Team_Records`
--
ALTER TABLE `Team_Records`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Admins`
--
ALTER TABLE `Admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `Players` (`player_id`);

--
-- Constraints for table `Matches`
--
ALTER TABLE `Matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`host_team_id`) REFERENCES `Teams` (`team_id`),
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`guest_team_id`) REFERENCES `Teams` (`team_id`);

--
-- Constraints for table `Players`
--
ALTER TABLE `Players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `Teams` (`team_id`);

--
-- Constraints for table `Teams`
--
ALTER TABLE `Teams`
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`coach_id`) REFERENCES `Coaches` (`coach_id`);

--
-- Constraints for table `Team_Records`
--
ALTER TABLE `Team_Records`
  ADD CONSTRAINT `team_records_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `Teams` (`team_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
