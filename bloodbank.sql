-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 01, 2016 at 04:05 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bloodbank`
--
CREATE DATABASE IF NOT EXISTS `bloodbank` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bloodbank`;

-- --------------------------------------------------------

--
-- Table structure for table `tblcity`
--

CREATE TABLE IF NOT EXISTS `tblcity` (
  `CityID` int(11) NOT NULL AUTO_INCREMENT,
  `CityName` varchar(50) NOT NULL,
  PRIMARY KEY (`CityID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblcity`
--

INSERT INTO `tblcity` (`CityID`, `CityName`) VALUES
(1, 'Rajkot'),
(4, 'Gandhinagar'),
(5, 'kalol');

-- --------------------------------------------------------

--
-- Table structure for table `tbldonor`
--

CREATE TABLE IF NOT EXISTS `tbldonor` (
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `BirthDate` date NOT NULL,
  `BloodGroup` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` varchar(50) NOT NULL,
  `ContactNo` varchar(50) NOT NULL,
  `ReportPath` varchar(200) NOT NULL,
  `Availability` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldonor`
--

INSERT INTO `tbldonor` (`FirstName`, `LastName`, `BirthDate`, `BloodGroup`, `Gender`, `Address`, `City`, `ContactNo`, `ReportPath`, `Availability`) VALUES
('', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('divyesh', 'patel', '0000-00-00', 'B+', 'male', '', '', '', '', ''),
('divyesh', 'patel', '0000-00-00', 'A+', '', '', '', '', '', ''),
('divyesh', 'patel', '0000-00-00', 'A+', 'male', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('a', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('a', 'a', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('ajay', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('ajay', 'patel', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('patel', 'sa', '0000-00-00', 'A+', 'female', '', '', '', '1471753479pdf', ''),
('', '', '0000-00-00', 'A+', '', '', '', '', '1471754377pdf', 'no'),
('patel', 'm', '1111-01-01', 'A+', 'female', 'abvh', 'kalol', '78945612363', '1471754736pdf', 'yes'),
('shah', 'abc', '0025-01-01', 'A+', 'female', 'jhjh', 'ahm', '123', '1471755343pdf', 'no'),
('', '', '0000-00-00', 'A+', '', '', '', '', '1471755880pdf', 'no'),
('patel', 'as', '1999-01-01', 'A+', 'female', 'ahj', 'gandhinagar', '789654123', '1471755943pdf', 'no'),
('patel', 'm', '1777-01-01', 'A+', '', '', '', '', '1471756051pdf', 'yes'),
('patel', 's', '0000-00-00', 'A+', '', '', '', '', '1472702595pdf', ''),
('p', 'p', '0000-00-00', 'A+', '', '', 'kalol', '', '1472702689pdf', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbldonorreg`
--

CREATE TABLE IF NOT EXISTS `tbldonorreg` (
  `DonorID` int(11) NOT NULL AUTO_INCREMENT,
  `LoginID` int(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `BirthDate` date NOT NULL,
  `BloodGroup` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` varchar(50) NOT NULL,
  `ContactNo` varchar(50) NOT NULL,
  `ReportPath` varchar(200) NOT NULL,
  PRIMARY KEY (`DonorID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tbldonorreg`
--

INSERT INTO `tbldonorreg` (`DonorID`, `LoginID`, `FirstName`, `LastName`, `BirthDate`, `BloodGroup`, `Gender`, `Address`, `City`, `ContactNo`, `ReportPath`) VALUES
(4, 25, 'patel', 'sanju', '1996-02-06', 'A+', 'female', 'govindsagar soc', 'kalol', '9978400365', 'abbssk'),
(16, 47, 'patel', 'anee', '1996-01-04', 'A+', 'female', 'unjha', 'unjha', '9871236000', 'jaakjs'),
(19, 50, 'patel', 'pri', '2001-05-05', 'A+', 'male', '', 'ahmedabad', '741369852', 'annv'),
(20, 51, 'patel', 'siddh', '1990-01-01', 'A+', 'male', 'baroda', 'baroda', '123698547', 'djhf'),
(21, 52, 'Patel', 'Smita', '2006-11-24', 'A+', 'female', 'dfs', 'navasari', '9631258740', 'ksok'),
(22, 53, 'patel', 'dwitii', '1883-04-08', 'A+', 'female', 'asoka', 'ahemdabad', '745569811', 'hjh'),
(23, 56, 'patel', 'mamta', '1996-02-06', 'A+', 'female', 'kalol', 'kalol', '47899', 'hjbhj'),
(25, 58, 'patel', 'sanjuu', '1996-02-06', 'A+', 'female', 'kalol', 'kalol', '87999', '1470544993pdf'),
(27, 60, '1', 'p', '1111-02-02', 'A+', 'female', '', '', '', '1470672992pdf'),
(28, 0, '1', 'p', '1111-02-02', 'A+', 'female', '', '', '', '1470673119pdf'),
(29, 0, '', '', '0000-00-00', 'A+', '', '', '', '', '1470673128pdf'),
(30, 0, '1', 'p', '1111-02-02', 'A+', 'female', '', '', '', '1470674319pdf'),
(31, 0, '1', 'p', '1111-02-02', 'A+', 'female', '', '', '', '1470674332pdf'),
(32, 0, '', '', '0000-00-00', 'A+', '', '', '', '', '1470674347pdf'),
(33, 0, '', '', '0000-00-00', 'A+', '', '', '', '', '1470674354pdf'),
(34, 0, '', '', '0000-00-00', 'A+', '', '', '', '', '1470822040pdf'),
(35, 140, 'patel', 'sa', '1996-02-02', 'A+', '', 'kalol', 'kalol', '56546465', ''),
(36, 141, 'p', '', '0000-00-00', 'A+', '', '', '', '', ''),
(37, 144, 'k', 'k', '2014-09-09', 'A+', 'male', 'iu\r\nkk\r\n', 'j', '9090909090', '1471147688pdf'),
(38, 145, 'patel', 'pa', '0000-00-00', 'A+', '', '', '', '', '1471151661pdf'),
(39, 146, 'shah', 'sruttii', '0000-00-00', 'A+', 'female', '', '', '', '1471409139pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE IF NOT EXISTS `tbllogin` (
  `LoginId` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `UserType` varchar(50) NOT NULL,
  PRIMARY KEY (`LoginId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=147 ;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`LoginId`, `Username`, `Password`, `UserType`) VALUES
(1, 'admin@site.com', 'admin', 'admin'),
(8, 'mamta', '123', 'user'),
(25, 'sanju', 'sanju', 'user'),
(26, 'divyesh', 'divyesh', 'user'),
(27, 'divyesh', '123', 'user'),
(28, 'divyesh', 'divyesh', 'user'),
(29, 'mamta', 'mamta', 'user'),
(30, 'sanju', '123', 'user'),
(31, 'sanjuu', '123', 'user'),
(34, 'patel', 'patel', 'user'),
(35, '', '', 'user'),
(36, 'sanju', 'asd', 'user'),
(37, '', '', 'user'),
(38, '', '', 'user'),
(39, 'abc', '123', 'user'),
(40, 'abc', '123', 'user'),
(41, 'a', '1', 'user'),
(42, 'mam', '123', 'user'),
(43, 'mamta', '123', 'user'),
(44, 'mamta', '123', 'user'),
(45, 'charmi', '123', 'user'),
(46, 'paku', 'paku', 'user'),
(47, 'anee', '123', 'user'),
(48, 'jui', '123', 'user'),
(49, 'nirav', 'nirav', 'user'),
(50, 'prit', 'prit', 'user'),
(51, 'siddh', '478', 'user'),
(52, 'neha', 'neha', 'user'),
(53, 'dwitee', '456', 'user'),
(54, '', '', 'user'),
(55, '', '', 'user'),
(56, 'm', '1', 'user'),
(57, 'mamta1', '11', 'user'),
(58, 'wq', 'wq', 'user'),
(59, '', '', 'user'),
(60, '', '', 'user'),
(61, '', '', 'user'),
(62, '', '', 'user'),
(63, '', '', 'user'),
(64, '', '', 'user'),
(65, '', '', 'user'),
(66, '', '', 'user'),
(67, '', '', 'user'),
(68, 'dev', 'dev', 'user'),
(69, '1', '1', 'user'),
(70, '1', '1', 'user'),
(71, 'QWE', 'QWE', 'user'),
(72, 'kj', 'kj', 'user'),
(73, '', '', 'user'),
(74, '1', '1', 'user'),
(75, '1', '1', 'user'),
(76, '1', '1', 'user'),
(77, '1', '1', 'user'),
(78, '1', '1', 'user'),
(79, '1', '1', 'user'),
(80, '', '', 'user'),
(81, 'patel', 'patel', 'user'),
(82, '', '', 'user'),
(83, 'yankit', '', 'user'),
(84, 'option', '', 'user'),
(85, 'bv', '', 'user'),
(86, 'bv', 'bv', 'user'),
(87, 'bv', 'bv', 'user'),
(88, 'bv', 'bv', 'user'),
(89, '', '12', 'user'),
(90, '25', '12', 'user'),
(91, 'nisarg', 'nisarg', 'user'),
(92, 'kaushal', '123', 'user'),
(93, 'jui', '123', 'user'),
(94, 'ankit', '123', 'user'),
(95, 'vfr', 'yhn', 'user'),
(96, 'kaushal`', '147', 'user'),
(97, 'qre', '753', 'user'),
(98, 'divyesh', 'patel', 'user'),
(99, 'pvr', '', 'user'),
(100, 'password', '', 'user'),
(101, 'rebel', 'rebel', 'user'),
(102, 'rebel', 'rebel', 'user'),
(103, 'gujrat', 'gujrat', 'user'),
(104, 'mj', 'asd', 'user'),
(105, 'mj', '12345678', 'user'),
(106, 'mj', '123456789', 'user'),
(107, 'mj', 'A12345689', 'user'),
(108, 'mj', 'A123456789', 'user'),
(109, 'mj', 'As12345678', 'user'),
(110, 'as', 'As12345678', 'user'),
(111, 'as', '', 'user'),
(112, 'as', '', 'user'),
(113, '', '', 'user'),
(114, '', '', 'user'),
(115, '', '', 'user'),
(116, '', '', 'user'),
(117, '', '', 'user'),
(118, 'chirag', 'Chirag12345', 'user'),
(119, 'Chirag1', 'Chirag12345', 'user'),
(120, 'poi', 'Poi12345', 'user'),
(121, 'divyesh1', 'Divyesh123', 'user'),
(122, 'divyesh1', 'Divyesh123', 'user'),
(123, '', '', 'user'),
(124, '', '', 'user'),
(125, 'aaa', '111', 'user'),
(126, 'aaa', '12345678', 'user'),
(127, 'aaa', '12345678', 'user'),
(128, 'aaa', '12345678', 'user'),
(129, 'aaa', '123456788', 'user'),
(130, 'aaa', 'Q12345678', 'user'),
(131, 'mamta', 'mamta_123456', 'user'),
(132, 'mamta', 'mamta_123456', 'user'),
(133, 'mamta', 'mamta_123456', 'user'),
(134, 'mamta', '123_Mamta', 'user'),
(135, 'mamta', '', 'user'),
(136, 'mamta', '', 'user'),
(137, 'abc', 'abc', 'user'),
(138, 'abc', '123_MAMTA', 'user'),
(139, '123', '1_12345678A', 'user'),
(140, 'zx', 'zx', 'user'),
(141, 'ww', '1', 'user'),
(142, 'ab', '123_Mamta', 'user'),
(143, 'abb', 'Mamta123_', 'user'),
(144, 'k', 'k', 'user'),
(145, 'mee', '1', 'user'),
(146, 'meera', 'qw', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tblmedicalreports`
--

CREATE TABLE IF NOT EXISTS `tblmedicalreports` (
  `SrNo` int(11) NOT NULL,
  `MemberID` int(11) NOT NULL AUTO_INCREMENT,
  `ReportName` varchar(50) NOT NULL,
  `ReportPath` varchar(200) NOT NULL,
  `UploadDate` date NOT NULL,
  PRIMARY KEY (`MemberID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblmember`
--

CREATE TABLE IF NOT EXISTS `tblmember` (
  `MemberID` int(11) NOT NULL,
  `LoginID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `BirthDate` date NOT NULL,
  `BloodGroup` varchar(50) NOT NULL,
  `CityID` int(11) NOT NULL,
  `ContactNo` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  PRIMARY KEY (`LoginID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblneedy`
--

CREATE TABLE IF NOT EXISTS `tblneedy` (
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `BirthDate` date NOT NULL,
  `BloodGroup` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `ContactNo` varchar(50) NOT NULL,
  `HospitalName` varchar(50) NOT NULL,
  `HospitalAdd` varchar(200) NOT NULL,
  `HospitalContactNo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblneedy`
--

INSERT INTO `tblneedy` (`FirstName`, `LastName`, `BirthDate`, `BloodGroup`, `Gender`, `Address`, `ContactNo`, `HospitalName`, `HospitalAdd`, `HospitalContactNo`) VALUES
('', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('mamta', 'patel', '1996-02-06', 'A+', '', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('p', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('p', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('p', 'a', '0000-00-00', 'A+', '', '', '', '', '', ''),
('p', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('p', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('p', 'q', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', 'q', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('p', 'p', '0000-00-00', 'A+', '', '', '', '', '', ''),
('mamta', 'patel', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', 'patel', '0000-00-00', 'A+', '', '', '', '', '', ''),
('mamta', 'patel', '0000-00-00', 'A+', '', '', '', '', '', ''),
('mamta', 'patel', '0000-00-00', 'A+', '', '', '', '', '', ''),
('m', 'patel', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', 'patel', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', 'patel', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', 'patel', '0000-00-00', 'A+', '', '', '', '', '', ''),
('p', 'p', '0000-00-00', 'A+', '', '', '', '', '', ''),
('m', 'patel', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', 'l', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', '', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', 'male', '', '', '', '', ''),
('SIDDHARAJ', '', '0000-00-00', 'A+', 'male', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', 'male', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', 'male', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', 'male', '', '', '', '', ''),
('', '', '0000-00-00', 'A+', 'male', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblneedyuser`
--

CREATE TABLE IF NOT EXISTS `tblneedyuser` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `LoginID` int(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `BirthDate` date NOT NULL,
  `BloodGroup` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `ContactNo` varchar(50) NOT NULL,
  `HospitalName` varchar(50) NOT NULL,
  `HospitalAddress` varchar(200) NOT NULL,
  `HospitalContactNo` varchar(50) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblneedyuser`
--

INSERT INTO `tblneedyuser` (`UserID`, `LoginID`, `FirstName`, `LastName`, `BirthDate`, `BloodGroup`, `Gender`, `Address`, `ContactNo`, `HospitalName`, `HospitalAddress`, `HospitalContactNo`) VALUES
(1, 17, 'patel', 'mamta', '1996-02-06', 'A-', '', 'shrifal', '9978400365', 'abc', 'baroda', '978456123'),
(2, 20, 'patel', 'mamta', '1996-02-06', 'A-', '', 'shrifal', '9978400365', 'abc', 'ahhh', '955545555'),
(3, 22, 'patel', 'mamta', '1996-02-06', 'A+', '', 'shrifal', '9978400365', 'glo', 'ahjja', '9874563254'),
(4, 23, 'patel', 'mamta', '1996-02-06', 'A+', 'female', 'shrifal', '9978400365', 'glo', 'ahjja', '9874563254'),
(5, 30, 'patel', 'mamta', '1996-02-06', 'B+', 'female', 'govindsagar ', '7845693214', 'cims', 'ahm', '07985647521');

-- --------------------------------------------------------

--
-- Table structure for table `tblorganization`
--

CREATE TABLE IF NOT EXISTS `tblorganization` (
  `OrganizationType` varchar(50) NOT NULL DEFAULT '',
  `OrgName` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `ContactNo` varchar(50) NOT NULL,
  PRIMARY KEY (`OrganizationType`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorganization`
--

INSERT INTO `tblorganization` (`OrganizationType`, `OrgName`, `City`, `Address`, `ContactNo`) VALUES
('1', 'abc', '1', 'ahmedabad', '9874125891'),
('1114', 'AFAF', '6', 'kalol', '9874561230'),
('2', 'abc', '5', 'gnagar', '9874561236'),
('3', 'abc', '1', 'ahmedabad', '9874125891'),
('Hospital', 'civil', 'ahemdabad', 'ahemdabad', '123'),
('NGO', 'abc', 'kalol', 'panchvti', '9978400356');

-- --------------------------------------------------------

--
-- Table structure for table `tblregistration`
--

CREATE TABLE IF NOT EXISTS `tblregistration` (
  `Username` varchar(20) NOT NULL DEFAULT '',
  `Email` varchar(20) NOT NULL,
  `Password` varchar(35) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblregistration`
--

INSERT INTO `tblregistration` (`Username`, `Email`, `Password`) VALUES
('mamta', 'mamta@gmail.com', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
