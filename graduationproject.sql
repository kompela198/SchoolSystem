-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 25 Oca 2022, 23:22:59
-- Sunucu sürümü: 5.7.36
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `graduationproject`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `classproperties`
--

DROP TABLE IF EXISTS `classproperties`;
CREATE TABLE IF NOT EXISTS `classproperties` (
  `classPropertiesId` int(11) NOT NULL AUTO_INCREMENT,
  `ClassroomId` int(11) NOT NULL,
  `capacity` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `numberofblackboard` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `studentseattype` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `avaibilityofprofdesk` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `projector` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `smartboard` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `internet` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `pc` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `speakersystem` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `climate` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`classPropertiesId`),
  KEY `ClassroomId` (`ClassroomId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `classproperties`
--

INSERT INTO `classproperties` (`classPropertiesId`, `ClassroomId`, `capacity`, `numberofblackboard`, `studentseattype`, `avaibilityofprofdesk`, `projector`, `smartboard`, `internet`, `pc`, `speakersystem`, `climate`) VALUES
(1, 1, '50', '2', 'Pairs', 'Available', 'Not Available', 'Available', 'Available', 'Not Available', 'Available', 'Available'),
(2, 15, '100', '2', 'Pairs', 'Available', 'Available', 'Available', 'Available', 'Available', 'Available', 'Available'),
(3, 8, '3', '3', 'Single', 'Available', 'Available', 'Available', 'Available', 'Available', 'Available', 'Available'),
(4, 3, '160', '2', 'Single', 'Available', 'Available', 'Available', 'Available', 'Available', 'Available', 'Available'),
(7, 21, '100', '2', 'Single', 'Available', 'Available', 'Available', 'Available', 'Available', 'Available', 'Available');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `classroom`
--

DROP TABLE IF EXISTS `classroom`;
CREATE TABLE IF NOT EXISTS `classroom` (
  `ClassroomId` int(11) NOT NULL AUTO_INCREMENT,
  `ClassroomCode` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `FacultyId` int(11) NOT NULL,
  PRIMARY KEY (`ClassroomId`),
  KEY `FacultyId` (`FacultyId`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `classroom`
--

INSERT INTO `classroom` (`ClassroomId`, `ClassroomCode`, `FacultyId`) VALUES
(1, 'TP101', 1),
(2, 'TP102', 1),
(3, 'TPLAB', 1),
(4, 'ITDEL', 1),
(5, 'A3.1', 3),
(6, 'A2.9', 3),
(7, 'A3.7', 3),
(8, 'A1.6', 3),
(9, 'PLC', 1),
(10, 'TP201', 1),
(11, 'TP202', 1),
(12, 'LR1', 1),
(13, 'LR2', 1),
(15, 'HEM101', 2),
(20, 'HEM102', 2),
(21, 'a', 1),
(22, 'a', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `CourseId` int(11) NOT NULL AUTO_INCREMENT,
  `CourseCode` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `CourseName` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `SemesterId` int(11) NOT NULL,
  PRIMARY KEY (`CourseId`),
  KEY `userId` (`userId`),
  KEY `SemesterId` (`SemesterId`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `course`
--

INSERT INTO `course` (`CourseId`, `CourseCode`, `CourseName`, `userId`, `SemesterId`) VALUES
(1, 'CEN401', 'Graduation Project 1', 2, 1),
(2, 'CEN301', 'Microprocessor', 2, 1),
(3, 'CEN402', 'Graduation Project 2', 2, 2),
(4, 'ENG101', 'Introduction to Computers', 2, 1),
(5, 'BUS108', 'Principles of Management', 3, 1),
(9, 'H100', 'Hemsirelik', 4, 1),
(21, 'a', 'a', 11, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `coursetime`
--

DROP TABLE IF EXISTS `coursetime`;
CREATE TABLE IF NOT EXISTS `coursetime` (
  `coursetimeId` int(11) NOT NULL AUTO_INCREMENT,
  `courseId` int(11) NOT NULL,
  `start_time` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `end_time` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `FacultyId` int(11) NOT NULL,
  `ClassroomId` int(11) NOT NULL,
  `gun` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `SemesterId` int(11) NOT NULL,
  PRIMARY KEY (`coursetimeId`),
  KEY `courseId` (`courseId`),
  KEY `FacultyId` (`FacultyId`,`ClassroomId`),
  KEY `ClassroomId` (`ClassroomId`),
  KEY `SemesterId` (`SemesterId`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `coursetime`
--

INSERT INTO `coursetime` (`coursetimeId`, `courseId`, `start_time`, `end_time`, `FacultyId`, `ClassroomId`, `gun`, `SemesterId`) VALUES
(49, 1, '09.00 A.M', '09.50 A.M', 1, 5, 'Monday', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `FacultyId` int(11) NOT NULL AUTO_INCREMENT,
  `FacultyName` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`FacultyId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `faculty`
--

INSERT INTO `faculty` (`FacultyId`, `FacultyName`, `userId`) VALUES
(1, 'FACULTY OF ENGINEERING', 2),
(2, 'FACULTY OF PHARMACY', 4),
(3, 'FACULTY OF BUSINESS AND ECONOMICS', 3),
(5, 'Admin ', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notif`
--

DROP TABLE IF EXISTS `notif`;
CREATE TABLE IF NOT EXISTS `notif` (
  `notId` int(11) NOT NULL AUTO_INCREMENT,
  `ClassroomId` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `semesterId` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `gun` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `start_time` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `end_time` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `statuss` varchar(1) COLLATE utf8mb4_turkish_ci NOT NULL,
  `courseId` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `FacultyId` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `userId` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `senderId` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`notId`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `notif`
--

INSERT INTO `notif` (`notId`, `ClassroomId`, `semesterId`, `gun`, `start_time`, `end_time`, `statuss`, `courseId`, `FacultyId`, `userId`, `senderId`) VALUES
(52, '5', '1', 'Monday', '09.00 A.M', '09.50 A.M', '1', '1', '1', '3', '2'),
(51, '5', '1', 'Monday', '09.00 A.M', '09.50 A.M', '2', '21', '1', '2', '11');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `notificationId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `descriptions` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `subjects` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`notificationId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `semester`
--

DROP TABLE IF EXISTS `semester`;
CREATE TABLE IF NOT EXISTS `semester` (
  `SemesterId` int(11) NOT NULL AUTO_INCREMENT,
  `SemesterName` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`SemesterId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `semester`
--

INSERT INTO `semester` (`SemesterId`, `SemesterName`) VALUES
(1, 'Fall'),
(2, 'Spring'),
(3, 'Summer');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `timer`
--

DROP TABLE IF EXISTS `timer`;
CREATE TABLE IF NOT EXISTS `timer` (
  `timerId` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `end_time` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`timerId`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `timer`
--

INSERT INTO `timer` (`timerId`, `start_time`, `end_time`) VALUES
(1, '09.00 A.M', '09.50 A.M'),
(2, '10.00 A.M', '10.50 A.M'),
(3, '11.00 A.M', '11.50 A.M'),
(4, '12.00 P.M.', '12.50 P.M.'),
(5, '13.00 P.M.', '13.50 P.M.'),
(6, '14.00 P.M.', '14.50 P.M.'),
(7, '15.00 P.M.', '15.50 P.M'),
(8, '16.00 P.M.', '16.50 P.M.'),
(9, '17.00 P.M.', '17.50 P.M.'),
(10, '18.00 P.M.', '18.50 P.M.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userFullName` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `userEmail` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `userPassword` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `userType` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT 'advisor',
  `FacultyIdS` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`userId`, `userFullName`, `userEmail`, `userPassword`, `userType`, `FacultyIdS`) VALUES
(1, 'Fevzican Ozgen', 'admin@gau.edu.tr', 'admin', 'admin', '5'),
(2, 'Akin User', 'advisor', 'advisor', 'advisor', '1'),
(3, 'Fehmican', 'fehmican', 'fehmican', 'advisor', '3'),
(4, 'emre', 'emre', 'emre', 'advisor', '2'),
(11, 'emre eker', 'a@a.com', '123', 'advisor', '1');

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `classproperties`
--
ALTER TABLE `classproperties`
  ADD CONSTRAINT `classproperties_ibfk_1` FOREIGN KEY (`ClassroomId`) REFERENCES `classroom` (`ClassroomId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `classroom`
--
ALTER TABLE `classroom`
  ADD CONSTRAINT `classroom_ibfk_1` FOREIGN KEY (`FacultyId`) REFERENCES `faculty` (`FacultyId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_ibfk_3` FOREIGN KEY (`SemesterId`) REFERENCES `semester` (`SemesterId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `coursetime`
--
ALTER TABLE `coursetime`
  ADD CONSTRAINT `coursetime_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `course` (`CourseId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coursetime_ibfk_2` FOREIGN KEY (`FacultyId`) REFERENCES `faculty` (`FacultyId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coursetime_ibfk_3` FOREIGN KEY (`ClassroomId`) REFERENCES `classroom` (`ClassroomId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coursetime_ibfk_4` FOREIGN KEY (`SemesterId`) REFERENCES `semester` (`SemesterId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
