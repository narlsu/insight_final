-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 10, 2017 at 03:37 am
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insight`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(10) NOT NULL,
  `travel_id` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `travels`
--

CREATE TABLE `travels` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `poster` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `travels`
--

INSERT INTO `travels` (`id`, `title`, `description`, `poster`) VALUES
(1, 'Kerosene creek creek', 'zdgdfh', '589d196b95f9f.jpg'),
(18, 'jjk;jk;jk;j', 'k;jk;jk;jk;', NULL),
(19, 'Kerosene creek', 'Thirty five minutes south of Rotorua is Kerosene Creek, a geothermally heated stream where you can bathe and relax.Hot water from a natural spring under the earth bubbles up into the cool waters of the creek, creating pleasantly warm waters. Swimmers have piled up small smooth rocks to create little hot pools beside the 2m waterfall.Set amongst lush native bush, Kerosene Creek is popular among visitors and locals alike, offering a natural bathing experience like no other.There''s no admission charge, just be courteous to other bathers, and take any rubbish away with you. Getting to Kerosene CreekFollow State Highway 5 south from Rotorua towards Taupo for about 30km. After passing the turnoff to Murupara on your left and Lake Ngahewa on your right, turn left on to Old Waiotapu Rd.Follow this gravel road for 2.2 km (about 3 minutes) until you see a grass verge on the right, where you can park your vehicle. Walk down the short track to the creek.', NULL),
(20, 'Kerosene creek', 'Thirty five minutes south of Rotorua is Kerosene Creek, a geothermally heated stream where you can bathe and relax.Hot water from a natural spring under the earth bubbles up into the cool waters of the creek, creating pleasantly warm waters. Swimmers have piled up small smooth rocks to create little hot pools beside the 2m waterfall.Set amongst lush native bush, Kerosene Creek is popular among visitors and locals alike, offering a natural bathing experience like no other.There''s no admission charge, just be courteous to other bathers, and take any rubbish away with you. Getting to Kerosene CreekFollow State Highway 5 south from Rotorua towards Taupo for about 30km. After passing the turnoff to Murupara on your left and Lake Ngahewa on your right, turn left on to Old Waiotapu Rd.Follow this gravel road for 2.2 km (about 3 minutes) until you see a grass verge on the right, where you can park your vehicle. Walk down the short track to the creek.', '5899083ba605c.jpg'),
(21, 'Kerosene creek', 'Thirty five minutes south of Rotorua is Kerosene Creek, a geothermally heated stream where you can bathe and relax.Hot water from a natural spring under the earth bubbles up into the cool waters of the creek, creating pleasantly warm waters. Swimmers have piled up small smooth rocks to create little hot pools beside the 2m waterfall.Set amongst lush native bush, Kerosene Creek is popular among visitors and locals alike, offering a natural bathing experience like no other.There''s no admission charge, just be courteous to other bathers, and take any rubbish away with you. Getting to Kerosene CreekFollow State Highway 5 south from Rotorua towards Taupo for about 30km. After passing the turnoff to Murupara on your left and Lake Ngahewa on your right, turn left on to Old Waiotapu Rd.Follow this gravel road for 2.2 km (about 3 minutes) until you see a grass verge on the right, where you can park your vehicle. Walk down the short track to the creek.', '5899084d5d1d3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(254) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(60) NOT NULL,
  `profile_name` varchar(40) NOT NULL,
  `privilege` enum('user','admin','banned') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `profile_name`, `privilege`) VALUES
(1, 'test@test.com', '0', '0', 'user'),
(2, 'test1@test.com', '0', '0', 'user'),
(3, 'test2@gmail.com', '$2y$10$rnORJT8ULiVkBAk2Pnh2wuQCe.sFSAaj2DeHwBzYm.Tep5IfdbVp.', '', 'user'),
(4, 'test3@gmail.com', '$2y$10$JnkAgbWYanbMT2XPN17DM.jKTWudXbEBeBs6/IrgYOIYb5RWjILru', '', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `travel_id` (`travel_id`);

--
-- Indexes for table `travels`
--
ALTER TABLE `travels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `travels`
--
ALTER TABLE `travels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
