db-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 02:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techmarathon`
--
CREATE DATABASE IF NOT EXISTS `techmarathon` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `techmarathon`;

-- --------------------------------------------------------

--
-- Table structure for table `apple`
--

CREATE TABLE `apple` (
  `id` int(11) NOT NULL,
  `leaderName` varchar(100) NOT NULL,
  `leaderEmail` varchar(100) NOT NULL,
  `leaderNumber` varchar(10) NOT NULL,
  `college` varchar(100) NOT NULL,
  `member1Name` varchar(100) DEFAULT NULL,
  `member1Number` varchar(10) DEFAULT NULL,
  `member2Name` varchar(100) DEFAULT NULL,
  `member2Number` varchar(10) DEFAULT NULL,
  `member3Name` varchar(100) DEFAULT NULL,
  `member3Number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cabbage`
--

CREATE TABLE `cabbage` (
  `id` int(11) NOT NULL,
  `leaderName` varchar(100) NOT NULL,
  `leaderEmail` varchar(100) NOT NULL,
  `leaderNumber` varchar(10) NOT NULL,
  `college` varchar(100) NOT NULL,
  `member1Name` varchar(100) DEFAULT NULL,
  `member1Number` varchar(10) DEFAULT NULL,
  `member2Name` varchar(100) DEFAULT NULL,
  `member2Number` varchar(10) DEFAULT NULL,
  `member3Name` varchar(100) DEFAULT NULL,
  `member3Number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `capsicum`
--

CREATE TABLE `capsicum` (
  `id` int(11) NOT NULL,
  `leaderName` varchar(100) NOT NULL,
  `leaderEmail` varchar(100) NOT NULL,
  `leaderNumber` varchar(10) NOT NULL,
  `college` varchar(100) NOT NULL,
  `member1Name` varchar(100) DEFAULT NULL,
  `member1Number` varchar(10) DEFAULT NULL,
  `member2Name` varchar(100) DEFAULT NULL,
  `member2Number` varchar(10) DEFAULT NULL,
  `member3Name` varchar(100) DEFAULT NULL,
  `member3Number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` int(11) NOT NULL,
  `ViewCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `ViewCount`) VALUES
(1, 5379);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventName` varchar(100) NOT NULL,
  `eventTagline` varchar(500) NOT NULL,
  `eventDescription` varchar(700) NOT NULL,
  `eventImage` varchar(50) NOT NULL,
  `eventType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventName`, `eventTagline`, `eventDescription`, `eventImage`, `eventType`) VALUES
('Apple', 'Slogans that rhyme with apple fruit are easier to remember and grabs the attention of users. Challenge yourself to create your own rhyming slogan.', 'description/Apple.html', 'images/Apple.jpg', 'Fruits'),
('Banana', 'Fruit In A Day Is The Healthy Way! Keep It A-Peal-ing! Eat Right! Eat Banana!', 'description/Banana.html', 'images/Banana.jpg', 'Fruits'),
('Cabbage', '“An idealist is one who, on noticing that a rose smells better than a cabbage, concludes that it makes a better soup.”', 'description/Cabbage.html', 'images/Cabbage.jpg', 'Vegetables'),
('Capsicum Green', 'Savory that is a swell word. And Basil and Betel. Capsicum. Curry. All great. But Relish, now, Relish with a capital R. No argument , that the best.', 'description/Capsicum Green.html', 'images/Capsicum Green.jpg', 'Vegetables'),
('Fresh Carrot', 'The only carrots that interest me are the number you get in a diamond.', 'description/Fresh Carrot.html', 'images/Fresh Carrot.jpg', 'Vegetables'),
('Fresh Onion', '“Like the layers of an onion, under the first lie is another, and under that another, and they all make you cry.”', 'description/Fresh Onion.html', 'images/Fresh Onion.jpg', 'Vegetables'),
('Ladies Finger', 'Slogans that rhyme with lady finger are easier to remember and grabs the attention of users. Challenge yourself to create your own rhyming slogan.', 'description/Ladies Finger.html', 'images/Ladies Finger.jpg', 'Vegetables'),
('Mango', 'Mango Fruit - Fresh and Juicy', 'description/Mango.html', 'images/Mango.jpg', 'Fruits'),
('Oranges', '“When you squeeze an orange, orange juice comes out, because that’s what’s inside. When you are squeezed, what comes out is what is inside.”', 'description/Oranges.html', 'images/Oranges.jpg', 'Fruits'),
('Peas', 'Some days confidence shrinks to the size of a pea, and the backbone feels like a feather. We want to be somewhere else, and do not know where - want to be someone else and do not know who.', 'description/Peas.html', 'images/Peas.jpg', 'Vegetables'),
('Signature Strawberry', 'Happiness, I have grasped, is a destination, like strawberry fields. Once you find the way in, there you are, and you will never feel low again.', 'description/Signature Strawberry.html', 'images/Signature Strawberry.jpg', 'Fruits'),
('Tomato', 'Do not regret what you ate, eat healthy and feel great.', 'description/Tomato.html', 'images/Tomato.jpg', 'Vegetables'),
('Watermelon', 'The Warm Summer Months Are The Perfect Time For Watermelon!', 'description/Watermelon.html', 'images/Watermelon.jpg', 'Fruits');

-- --------------------------------------------------------

--
-- Table structure for table `freshcarrot`
--

CREATE TABLE `freshcarrot` (
  `id` int(11) NOT NULL,
  `leaderName` varchar(100) NOT NULL,
  `leaderEmail` varchar(100) NOT NULL,
  `leaderNumber` varchar(10) NOT NULL,
  `college` varchar(100) NOT NULL,
  `member1Name` varchar(100) DEFAULT NULL,
  `member1Number` varchar(10) DEFAULT NULL,
  `member2Name` varchar(100) DEFAULT NULL,
  `member2Number` varchar(10) DEFAULT NULL,
  `member3Name` varchar(100) DEFAULT NULL,
  `member3Number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `freshonion`
--

CREATE TABLE `freshonion` (
  `id` int(11) NOT NULL,
  `leaderName` varchar(100) NOT NULL,
  `leaderEmail` varchar(100) NOT NULL,
  `leaderNumber` varchar(10) NOT NULL,
  `college` varchar(100) NOT NULL,
  `member1Name` varchar(100) DEFAULT NULL,
  `member1Number` varchar(10) DEFAULT NULL,
  `member2Name` varchar(100) DEFAULT NULL,
  `member2Number` varchar(10) DEFAULT NULL,
  `member3Name` varchar(100) DEFAULT NULL,
  `member3Number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ladiesfinger`
--

CREATE TABLE `ladiesfinger` (
  `id` int(11) NOT NULL,
  `leaderName` varchar(100) NOT NULL,
  `leaderEmail` varchar(100) NOT NULL,
  `leaderNumber` varchar(10) NOT NULL,
  `college` varchar(100) NOT NULL,
  `member1Name` varchar(100) DEFAULT NULL,
  `member1Number` varchar(10) DEFAULT NULL,
  `member2Name` varchar(100) DEFAULT NULL,
  `member2Number` varchar(10) DEFAULT NULL,
  `member3Name` varchar(100) DEFAULT NULL,
  `member3Number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `itemName` varchar(250) NOT NULL,
  `mobNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertable`
--

INSERT INTO `ordertable` (`id`, `name`, `mail`, `address`, `itemName`, `mobNumber`) VALUES
(1, 'Monish', 'mohdmonishksg@gmail.com', 'MNNIT Allahabad', 'TV Fandom', '9821446257'),
(2, 'Aryan Rajput', 'aryanrajputsfe@gmail.com', 'Uttam Nagar New Delhi', 'JK Cardamom Green', '9821347890');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `eventName` varchar(100) NOT NULL,
  `room` varchar(100) NOT NULL,
  `status` varchar(500) NOT NULL,
  `round` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `eventName`, `room`, `status`, `round`) VALUES
(1, 'Algowls', '--', 'Result will be displayed in the auditorium at 5:00 pm.', '--'),
(2, 'Junkyard Wars ', '--', 'Result will be displayed in the auditorium at 5:00 pm.', '--'),
(3, 'TVFandom', ' Finals at 404', 'Second round going on. Result will be displayed in the auditorium at 5:00 pm.', '--'),
(4, 'Battle of Bytes', 'FINAL Lab 1 ', 'Second Round Going On LAB 1.Result will be displayed in the auditorium at 5:00 pm.', 'FINAL'),
(5, 'Snake Jam', 'College Lawn\r\n', 'Going on.Result will be displayed in the auditorium at 5:00 pm.', '---'),
(6, 'Tech - Charades', '--', 'Result will be displayed in the auditorium at 5:00 pm.', '--'),
(7, 'TechWars', 'Prelims 403, 404', 'Final round going on.Result will be displayed in the auditorium at 5:00 pm.', 'Final'),
(8, 'App Combat', 'Lab 3', 'Second Round Going on. Result will be displayed in the auditorium at 5:00 pm.', 'Final'),
(9, 'Webgators', 'Final Lab 1\r\n', 'SECOND ROUND GOING ON!!Result will be displayed in the auditorium at 5:00 pm.', 'Final'),
(10, 'PubG', 'Prelims &\r\nFinals Room\r\n401, 402\r\n', 'GOING ON!!', 'Prelims '),
(11, 'LAN Gaming', 'Prelims & Finals\r\nLab 2\r\n', 'Going on', 'Prelims');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apple`
--
ALTER TABLE `apple`
  ADD PRIMARY KEY (`leaderEmail`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `cabbage`
--
ALTER TABLE `cabbage`
  ADD PRIMARY KEY (`leaderEmail`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `capsicum`
--
ALTER TABLE `capsicum`
  ADD PRIMARY KEY (`leaderEmail`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventName`);

--
-- Indexes for table `freshcarrot`
--
ALTER TABLE `freshcarrot`
  ADD PRIMARY KEY (`leaderEmail`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `freshonion`
--
ALTER TABLE `freshonion`
  ADD PRIMARY KEY (`leaderEmail`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `ladiesfinger`
--
ALTER TABLE `ladiesfinger`
  ADD PRIMARY KEY (`leaderEmail`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apple`
--
ALTER TABLE `apple`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cabbage`
--
ALTER TABLE `cabbage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `capsicum`
--
ALTER TABLE `capsicum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `freshcarrot`
--
ALTER TABLE `freshcarrot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freshonion`
--
ALTER TABLE `freshonion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ladiesfinger`
--
ALTER TABLE `ladiesfinger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ordertable`
--
ALTER TABLE `ordertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
