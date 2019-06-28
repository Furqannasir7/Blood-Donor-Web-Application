-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2019 at 02:03 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '74d4a2309fd5446f2aa233980b736040', '2019-06-24 12:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `tblblooddonars`
--

CREATE TABLE `tblblooddonars` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `BloodGroup` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Message` mediumtext,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblblooddonars`
--

INSERT INTO `tblblooddonars` (`id`, `FullName`, `MobileNumber`, `EmailId`, `Gender`, `Age`, `BloodGroup`, `Address`, `Message`, `PostingDate`, `status`) VALUES
(6, 'M.Furqan Nasir', '03154345281', 'nasirfurqan29@gmail.com', 'Male', 21, 'O+', 'Ichra,Lahore', 'For need. Contact me.', '2019-06-23 15:48:50', 1),
(7, 'Husnain Malik', '03114443208', 'husnainmalik0235@gmail.com', 'Male', 21, 'A+', 'Kareem Market,Lahore', 'For Humanity', '2019-06-23 16:25:28', 1),
(8, 'Hussain Shahid', '03258464528', 'hussain.shahid@gmail.com', 'Male', 20, 'B-', 'Johar Town,Lahore', 'Blessed', '2019-06-23 16:25:28', 1),
(9, 'Nasir Ali', '03004149321', 'nasir5644@gmail.com', 'Male', 52, 'O+', 'Ichra,Lahore', 'For Needy', '2019-06-23 16:26:45', 1),
(10, 'Ali Raza', '03231413512', 'aliraza41@gmail.com', 'Male', 22, 'AB+', 'Ichra,Lahore', ' For Humanity', '2019-06-23 22:13:30', 1),
(12, 'Ali Makhdoom', '03114452584', 'alimakhdoom@gmail.com', 'Male', 30, 'O-', 'Johar Town,Lahore', ' For Humanity', '2019-06-23 22:17:17', 1),
(14, 'Aqib Butt', '03344335606', 'aqibbutt@gmail.com', 'Male', 22, 'B+', 'Jail Road,Lahore', ' For Humanity', '2019-06-24 13:24:51', 1),
(15, 'Umair Habib', '03045821638', 'habib@gmail.com', 'Male', 25, 'B-', 'Pindi', ' Pindi Boy.', '2019-06-25 08:28:15', 1),
(16, 'Nouman Imran', '03231413512', 'mani41@gmail.com', 'Male', 25, 'O-', 'Iqbal Town,Lahore', ' For Humanity.', '2019-06-26 22:34:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblbloodgroup`
--

CREATE TABLE `tblbloodgroup` (
  `id` int(11) NOT NULL,
  `BloodGroup` varchar(20) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbloodgroup`
--

INSERT INTO `tblbloodgroup` (`id`, `BloodGroup`, `PostingDate`) VALUES
(1, 'A-', '2017-06-30 20:33:50'),
(2, 'AB-', '2017-06-30 20:34:00'),
(3, 'O-', '2017-06-30 20:34:05'),
(5, 'A+', '2017-06-30 20:34:13'),
(6, 'AB+', '2017-06-30 20:34:18'),
(7, 'O+', '2019-06-23 20:03:08'),
(8, 'B-', '2019-06-23 22:14:25'),
(9, 'B+', '2019-06-23 22:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusinfo`
--

CREATE TABLE `tblcontactusinfo` (
  `id` int(11) NOT NULL,
  `Address` tinytext,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactusinfo`
--

INSERT INTO `tblcontactusinfo` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
(2, 'Johar Town, Lahore ', 'pythons.69@gmail.com', '03090078601');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactusquery`
--

INSERT INTO `tblcontactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(5, 'Furqan Nasir', 'nasirfurqan29@gmail.com', '03094103268', 'Need Blood O+.', '2019-06-23 21:59:39', NULL),
(6, 'Husnain Malik', 'husnainmalik0235@gmail.com', '03114443208', 'Need A+ 2 bottles.', '2019-06-23 22:02:25', NULL),
(7, 'Affan Arshad', 'affan.arshad@gmail.com', '09004143852', 'Charas', '2019-06-25 06:44:30', NULL),
(8, 'Umair Habib', 'habib@gmail.com', '0325846127', 'Pindi Boy.', '2019-06-25 08:27:08', NULL),
(9, 'Hamza abbasi', 'hamza@gmail.com', '02586623', 'Good', '2019-06-26 22:00:33', NULL),
(10, 'Farhan', 'farhan@gmail.com', '03214568795', 'Nice', '2019-06-26 22:20:33', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblblooddonars`
--
ALTER TABLE `tblblooddonars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbloodgroup`
--
ALTER TABLE `tblbloodgroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblblooddonars`
--
ALTER TABLE `tblblooddonars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblbloodgroup`
--
ALTER TABLE `tblbloodgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
