-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 10:35 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ict3612_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `ActorID` int(6) UNSIGNED NOT NULL,
  `ActorFullName` varchar(50) NOT NULL,
  `ActorNotes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`ActorID`, `ActorFullName`, `ActorNotes`) VALUES
(10100, 'David Hosselhif', 'Well built, good for beach and action scenes.'),
(10101, 'Kate Winstonlet', 'Very slender with sharp nose, good for witch scripts and evil rom-coms.'),
(10102, 'Vin Petrol', 'True action hero vibe, good for Mall Cop scripts.'),
(10103, 'Matthew Petty', 'Sharp sarcastic humour, does not do well under pressure.'),
(10104, 'Scarlet Johnsaxion', 'Well mannered actor, bad eating habbits, also randomly does action hero poses for some reason.');

-- --------------------------------------------------------

--
-- Table structure for table `contestant`
--

CREATE TABLE `contestant` (
  `ContestantID` bigint(13) UNSIGNED ZEROFILL NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Tel` varchar(10) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contestant`
--

INSERT INTO `contestant` (`ContestantID`, `FirstName`, `LastName`, `Tel`, `Email`) VALUES
(2369852358963, 'November', 'Mathlako', '0236985258', 'nov.mathlako@gmail.com'),
(3256987569875, 'Ryan', 'Stevenson', '0369898523', 'rtheryan@yahoo.com'),
(3698712369874, 'Stephen', 'Sphor', '0589637896', 's.spohr@lantic.net'),
(3854965873215, 'Gale', 'Winters', '0589357825', 'winterscoming@yahoo.com'),
(6982574139523, 'Glen', 'Brown', '0123456781', 'glen.brown@gmail.com'),
(8965896589658, 'Harry', 'Harris', '0589698741', 'harry.harris@gmail.com'),
(9635896865896, 'Prince', 'Westford', '0854748598', 'princeforever@hotmail.com'),
(9808010115084, 'Ralph', 'Botes', '0258967878', 'ralph.b@yahoo.com'),
(9852465825467, 'Thepo', 'Zulu', '0123896582', 'zulu@hotmail.com'),
(9875632598563, 'Yvanke', 'Botha', '0258741025', 'botha.y@gmail.com'),
(9878987896969, 'Rene', 'Ali', '0321236362', 'ali@lantic.net');

-- --------------------------------------------------------

--
-- Table structure for table `filmactorroles`
--

CREATE TABLE `filmactorroles` (
  `FilmTitleID` int(6) UNSIGNED NOT NULL,
  `ActorID` int(6) UNSIGNED DEFAULT NULL,
  `RoleTypeID` int(3) UNSIGNED DEFAULT NULL,
  `CharacterName` varchar(50) DEFAULT NULL,
  `CharacterDescription` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filmactorroles`
--

INSERT INTO `filmactorroles` (`FilmTitleID`, `ActorID`, `RoleTypeID`, `CharacterName`, `CharacterDescription`) VALUES
(100001, 10104, 105, 'Drama queen', 'Former NAVY Seal and now a melodramatic housewife with control issues.'),
(100002, 10101, 106, 'Superhero', 'Cafeteria chef turned super, self-aware, depressed, in love with principal.'),
(100003, 10100, 100, 'Beach waiter', 'Big and clumsy with German accent.'),
(100004, 10102, 101, 'Limo Driver', 'Cannot shift gears to save his life, likes to glare at taxi drivers.'),
(100005, 10103, 102, 'Sales Agent', 'Ambitious, self-resenting and hyperactive.'),
(100006, 10104, 103, 'US Presedent', 'Clumsy, especially on stairs, an accent nobody understands, hair smelling problem.'),
(100007, 10101, 104, 'Las Vegas Diva', 'Happy go lucky dancer, dreams big but is depressed.');

-- --------------------------------------------------------

--
-- Table structure for table `filmtitles`
--

CREATE TABLE `filmtitles` (
  `FilmTitleID` int(6) UNSIGNED NOT NULL,
  `FilmTitle` varchar(50) DEFAULT NULL,
  `FilmDuration` varchar(50) DEFAULT NULL,
  `FilmStory` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filmtitles`
--

INSERT INTO `filmtitles` (`FilmTitleID`, `FilmTitle`, `FilmDuration`, `FilmStory`) VALUES
(100001, 'Melo-MOM', '101 min', '10 Years after her divorce, a NAVY Seal veteran finds herself dealing with the local moms and the struggle to keep up with her kids.'),
(100002, 'Super Sandwich', '204 min', 'When a cafeteria chef suddenly gets superpowers, her life forever changes. Now she must make sandwiches while saving lives, can she do it?'),
(100003, 'Beach Love', '66 min', 'When a simple beach job day goes wrong, how will our hero save his struggle with life while juggling love?'),
(100004, 'Fast and Glareious', '144 min', 'A limo driver posing as an undercover taxi driver, has set his sites on the rich and famous and will do whatever it takes to get them home!'),
(100005, 'SOLD', '369 min', 'When a sales agent finds himself too deep and in trouble, only his own deranged mind can help him retain his sanity.'),
(100006, 'Broken Spear', '121 min', 'A serious terrorist threat tips the scales of war. The only way out is down, but will he fall or walk? The terrorists might win.'),
(100007, 'Dance Life', '98 min', 'When life dancing just doesn’t pay off, a single diva mother escapes her mangled life to become a pilot in the French NAVY.');

-- --------------------------------------------------------

--
-- Table structure for table `roletypes`
--

CREATE TABLE `roletypes` (
  `RoleTypeID` int(3) UNSIGNED NOT NULL,
  `RoleType` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roletypes`
--

INSERT INTO `roletypes` (`RoleTypeID`, `RoleType`) VALUES
(100, 'Action'),
(101, 'Horror'),
(102, 'Adventure'),
(103, 'Crime'),
(104, 'Drama'),
(105, 'Family animation'),
(106, 'Comedy');

-- --------------------------------------------------------

--
-- Table structure for table `winners`
--

CREATE TABLE `winners` (
  `WinnerID` int(11) NOT NULL,
  `ContestantID` bigint(13) UNSIGNED ZEROFILL DEFAULT NULL,
  `WinYear` int(4) UNSIGNED ZEROFILL DEFAULT NULL,
  `WinningPoints` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `winners`
--

INSERT INTO `winners` (`WinnerID`, `ContestantID`, `WinYear`, `WinningPoints`) VALUES
(1, 9852465825467, 2017, 198),
(2, 6982574139523, 2018, 188),
(3, 9875632598563, 2019, 202),
(4, 9878987896969, 2020, 175),
(5, 3698712369874, 2021, 216),
(6, 9852465825467, 2022, 199);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`ActorID`);

--
-- Indexes for table `contestant`
--
ALTER TABLE `contestant`
  ADD PRIMARY KEY (`ContestantID`);

--
-- Indexes for table `filmactorroles`
--
ALTER TABLE `filmactorroles`
  ADD PRIMARY KEY (`FilmTitleID`);

--
-- Indexes for table `filmtitles`
--
ALTER TABLE `filmtitles`
  ADD PRIMARY KEY (`FilmTitleID`);

--
-- Indexes for table `roletypes`
--
ALTER TABLE `roletypes`
  ADD PRIMARY KEY (`RoleTypeID`);

--
-- Indexes for table `winners`
--
ALTER TABLE `winners`
  ADD PRIMARY KEY (`WinnerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `ActorID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10105;

--
-- AUTO_INCREMENT for table `filmactorroles`
--
ALTER TABLE `filmactorroles`
  MODIFY `FilmTitleID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100008;

--
-- AUTO_INCREMENT for table `roletypes`
--
ALTER TABLE `roletypes`
  MODIFY `RoleTypeID` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
