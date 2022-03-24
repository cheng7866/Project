-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 04:12 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectfgarden`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `IDbooking` int(11) NOT NULL,
  `IDgarden` int(11) DEFAULT NULL,
  `IDPackage` int(11) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `Status` varchar(8000) NOT NULL,
  `Numberofpeoplebooking` int(11) NOT NULL,
  `IDround` int(11) DEFAULT NULL,
  `bookingdate` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `flowerinthegarden`
--

CREATE TABLE `flowerinthegarden` (
  `IDgarden` int(11) NOT NULL,
  `IDflower` int(11) NOT NULL,
  `NameThai` varchar(100) NOT NULL,
  `NameEng` varchar(100) NOT NULL,
  `Description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flowerinthegarden`
--

INSERT INTO `flowerinthegarden` (`IDgarden`, `IDflower`, `NameThai`, `NameEng`, `Description`) VALUES
(71, 75, 'yellow', 'yellow', 'yellow'),
(72, 76, 'black ', 'black ', ' flower have black color'),
(72, 77, 'pink', ' pink', ' flower have pink color'),
(73, 78, 'greenlight', 'greenlight', 'flower have greenlight color'),
(74, 79, 'blueeye', 'blueeye', 'blueeye flower have blueeye color'),
(74, 80, 'ultimate blue eye', 'ultimate blue eye', 'ultimate blue eye flower have ultimate blue eye color'),
(74, 81, 'blue eye white', 'blue eye white', 'blue eye white flower have blue eye white color');

-- --------------------------------------------------------

--
-- Table structure for table `garden`
--

CREATE TABLE `garden` (
  `IDgarden` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `Maxpeople` int(11) NOT NULL,
  `Visitor` int(11) NOT NULL,
  `Description` varchar(8000) NOT NULL,
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `garden`
--

INSERT INTO `garden` (`IDgarden`, `Name`, `userid`, `Maxpeople`, `Visitor`, `Description`, `Latitude`, `Longitude`) VALUES
(71, 'Yellow garden', 8, 50, 0, 'Yellow garden have yellow flower in yellow place people have yellow skin yellow face yellow hand yellow car and yellow house in yellow town you can see many yellow food', 18.817149469360725, 98.81903633864248),
(72, 'Black pink garden  ', 9, 25, 0, 'Black pink garden have black pink flower black pink employee take care visitor many visitor come with black pink suit and black pink dress have black pink food can order it', 18.73393580033438, 98.48395333082998),
(73, 'Greenlight garden', 10, 10, 0, 'Greenlight garden have greenlight flower greenlight pool greenlight tree greenlight view greenlight light greenlight glass greenlight food greenlight theme', 18.788549405649167, 99.47546944411123),
(74, 'blueeye garden', 11, 10, 0, 'blueeye garden have blueeye flower form toon world vary rare exclusive garden in this county with low price high movement ', 19.053562853737997, 98.41254219801748);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `IDPackage` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL,
  `Description` varchar(8000) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`IDPackage`, `Name`, `Price`, `Description`, `userid`) VALUES
(16, 'G&B&Y', 300, 'greenlight garden blackpink garden and yelllow garden fun to much lower price more quality ', 10),
(17, 'ultimate blue eye white yellow', 100, 'cooperation of blueeye garden and yellow garden ', 11),
(18, 'blue eye yellow', 100, 'cooperative of blueeye garden and yellow garden', 11);

-- --------------------------------------------------------

--
-- Table structure for table `packagedetail`
--

CREATE TABLE `packagedetail` (
  `IDPackage` int(11) NOT NULL,
  `IDgarden` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `IDround` int(11) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packagedetail`
--

INSERT INTO `packagedetail` (`IDPackage`, `IDgarden`, `Amount`, `IDround`, `Status`) VALUES
(8, 60, 20, 61, 'wait'),
(8, 61, 20, 66, 'wait'),
(8, 62, 20, 70, 'wait'),
(9, 62, 2, 68, 'wait'),
(9, 66, 1, 82, 'wait'),
(10, 61, 1, 64, 'wait'),
(11, 67, 0, 85, 'confirm'),
(11, 60, 0, 61, 'wait'),
(12, 63, 1, 71, 'wait'),
(13, 60, 1, 61, 'wait'),
(13, 63, 1, 71, 'wait'),
(13, 64, 1, 75, 'wait'),
(14, 61, 1, 66, 'wait'),
(15, 63, 2, 72, 'wait'),
(15, 65, 2, 79, 'wait'),
(16, 71, 100, 91, 'wait'),
(16, 72, 100, 94, 'wait'),
(16, 73, 100, 96, 'wait'),
(17, 71, 50, 91, 'wait'),
(17, 74, 50, 97, 'wait'),
(18, 74, 50, 97, 'wait'),
(18, 71, 50, 91, 'wait');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PayID` int(11) NOT NULL,
  `paymentdate` date NOT NULL,
  `userid` int(11) NOT NULL,
  `IDPackage` int(11) DEFAULT NULL,
  `IDgarden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `PictureID` int(11) NOT NULL,
  `IDgarden` int(11) NOT NULL,
  `fileupload` varchar(200) NOT NULL,
  `dateup` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`PictureID`, `IDgarden`, `fileupload`, `dateup`) VALUES
(49, 71, '20220313854098300.jpg', '2022-03-13 09:39:16'),
(50, 72, '202203131745961591.jpg', '2022-03-13 09:44:04'),
(51, 72, '202203131988518917.jpg', '2022-03-13 09:44:04'),
(52, 73, '20220313521730914.jpg', '2022-03-13 09:46:54'),
(53, 74, '202203131173880151.jpg', '2022-03-13 09:55:52'),
(54, 74, '20220313164908870.jpg', '2022-03-13 09:55:52'),
(55, 74, '202203132101112204.jpg', '2022-03-13 09:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `IDgarden` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `Text` varchar(20) NOT NULL,
  `rate` float NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `round`
--

CREATE TABLE `round` (
  `IDround` int(11) NOT NULL,
  `IDgarden` int(11) NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `round`
--

INSERT INTO `round` (`IDround`, `IDgarden`, `StartTime`, `EndTime`, `Price`) VALUES
(91, 71, '08:30:00', '00:30:00', 20),
(92, 71, '15:00:00', '18:38:00', 20),
(93, 72, '08:00:00', '10:00:00', 30),
(94, 72, '12:00:00', '14:00:00', 30),
(95, 72, '16:00:00', '18:00:00', 30),
(96, 73, '18:00:00', '20:00:00', 100),
(97, 74, '06:00:00', '08:00:00', 25),
(98, 74, '20:00:00', '22:00:00', 25);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `surrname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `surrname`, `email`, `telephone`, `password`) VALUES
(8, 'test01', 'yellow', 'yellow1@cmu.ac.th', '0814561879', '25f9e794323b453885f5181f1b624d0b'),
(9, 'black', 'pink', 'blackpink@cmu.ac.th', '0824517894', '25f9e794323b453885f5181f1b624d0b'),
(10, 'green', 'light', 'greenlight@cmu.ac.th', '0814257894', '25f9e794323b453885f5181f1b624d0b'),
(11, 'Blue', 'eye', 'blueeye@cmu.ac.th', '0878451278', '25f9e794323b453885f5181f1b624d0b'),
(12, 'robert', 'smokeweed', 'robertweed@cmu.ac.th', '0891911150', '25f9e794323b453885f5181f1b624d0b'),
(13, 'John', 'Snow', 'winterfell@cmu.ac.th', '0877479109', '25f9e794323b453885f5181f1b624d0b'),
(14, 'Thiraphat', 'kanthabuppa', 'thiraphat_ka@cmu.ac.th', '0804964806', '25f9e794323b453885f5181f1b624d0b'),
(15, 'bobo', 'putang', 'pinoybobo@cmu.ac.th', '0893571147', '25f9e794323b453885f5181f1b624d0b'),
(16, 'cheng', 'ky', 'cheng7866@gmail.com', '0856977770', '1963bd5135521d623f6c29e6b1174975'),
(18, 'oat', 'suetrong', 'nopparuj_s@cmu.ac.th', '0992691615', '1455ef042f85c834c99fbc3be00b9fc4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`IDbooking`),
  ADD KEY `IDgarden` (`IDgarden`),
  ADD KEY `userid` (`userid`),
  ADD KEY `IDround` (`IDround`),
  ADD KEY `IDPackage` (`IDPackage`);

--
-- Indexes for table `flowerinthegarden`
--
ALTER TABLE `flowerinthegarden`
  ADD PRIMARY KEY (`IDflower`),
  ADD KEY `IDgarden` (`IDgarden`);

--
-- Indexes for table `garden`
--
ALTER TABLE `garden`
  ADD PRIMARY KEY (`IDgarden`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`IDPackage`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PayID`),
  ADD KEY `userid` (`userid`),
  ADD KEY `IDPackage` (`IDPackage`),
  ADD KEY `IDgarden` (`IDgarden`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`PictureID`),
  ADD KEY `IDgarden` (`IDgarden`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`IDgarden`,`userid`),
  ADD KEY `IDgarden` (`IDgarden`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `round`
--
ALTER TABLE `round`
  ADD PRIMARY KEY (`IDround`),
  ADD KEY `IDgarden` (`IDgarden`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `IDbooking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `flowerinthegarden`
--
ALTER TABLE `flowerinthegarden`
  MODIFY `IDflower` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `garden`
--
ALTER TABLE `garden`
  MODIFY `IDgarden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `IDPackage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PayID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `PictureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `round`
--
ALTER TABLE `round`
  MODIFY `IDround` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`IDgarden`) REFERENCES `garden` (`IDgarden`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`IDround`) REFERENCES `round` (`IDround`),
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`IDPackage`) REFERENCES `package` (`IDPackage`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flowerinthegarden`
--
ALTER TABLE `flowerinthegarden`
  ADD CONSTRAINT `flowerinthegarden_ibfk_2` FOREIGN KEY (`IDgarden`) REFERENCES `garden` (`IDgarden`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `garden`
--
ALTER TABLE `garden`
  ADD CONSTRAINT `garden_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`IDPackage`) REFERENCES `package` (`IDPackage`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_3` FOREIGN KEY (`IDgarden`) REFERENCES `garden` (`IDgarden`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `picture_ibfk_1` FOREIGN KEY (`IDgarden`) REFERENCES `garden` (`IDgarden`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`IDgarden`) REFERENCES `garden` (`IDgarden`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `round`
--
ALTER TABLE `round`
  ADD CONSTRAINT `round_ibfk_1` FOREIGN KEY (`IDgarden`) REFERENCES `garden` (`IDgarden`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
