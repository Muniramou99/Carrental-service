-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2021 at 11:31 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrentalservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `ID` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL,
  `division_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`ID`, `district_name`, `division_id`) VALUES
(1, 'Nilphamary', 1),
(2, 'Dinajpur', 1),
(3, 'Kurigram', 1),
(4, 'Gaibandha', 1),
(5, 'Bogura', 2),
(6, 'Pabna', 2),
(7, 'Nator', 2);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `ID` int(11) NOT NULL,
  `division_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`ID`, `division_name`) VALUES
(1, 'Rangpur'),
(2, 'Rajshahi');

-- --------------------------------------------------------

--
-- Table structure for table `driver_tbl`
--

CREATE TABLE `driver_tbl` (
  `ID` int(15) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Nidnumber` varchar(50) NOT NULL,
  `Registrationnum` varchar(50) NOT NULL,
  `Contactnum` varchar(50) NOT NULL,
  `Psw` varchar(50) NOT NULL,
  `Confirmpsw` varchar(50) NOT NULL,
  `Presentdivision` varchar(100) NOT NULL,
  `Presentdistrict` varchar(100) NOT NULL,
  `Presentthana` varchar(50) NOT NULL,
  `Vehicletype` varchar(50) NOT NULL,
  `Vehiclecolor` varchar(50) NOT NULL,
  `Seat` varchar(50) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver_tbl`
--

INSERT INTO `driver_tbl` (`ID`, `Username`, `Nidnumber`, `Registrationnum`, `Contactnum`, `Psw`, `Confirmpsw`, `Presentdivision`, `Presentdistrict`, `Presentthana`, `Vehicletype`, `Vehiclecolor`, `Seat`, `active`) VALUES
(1, 'anite halim sagor', '1234567890000', '0000000989000', '01020000333', '12345678', '12345678', 'Rangpur', 'Dinajpur', 'Birgonj', 'Default', 'Default', 's5', 1),
(2, 'mou', '1234567899999', '12333378999000', '01717171723', '12345678', '12345678', 'Rajshahi', 'Bogura', 'Gabtoli', 'minivan', 'white', 's5', 1),
(3, 'mou', '12345555555555', '12234567899999', '01717016355', '12345678', '12345678', 'Rajshahi', 'Bogura', 'Gabtoli', 'hatchback', 'pearl', 's7', 1),
(4, 'mou', '1233456789999', '2334567890909', '01717016355', '12345678', '12345678', 'Rangpur', 'Dinajpur', 'Birgonj', 'hatchback', 'white', 's7', 1),
(5, 'Munira akter mou', '1233456789999', '2334567890909', '01717016355', '12345678', '12345678', 'Rajshahi', 'Bogura', 'Gabtoli', 'Default', 'Default', 's5', 1),
(6, 'rahman', '1122333445566', '2222222222222', '01834599993', '12345678', '12345678', 'Rangpur', 'Dinajpur', 'Birampur', 'govambulance', 'redwine', 's10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hier_tbl`
--

CREATE TABLE `hier_tbl` (
  `ID` int(11) NOT NULL,
  `Userid` int(10) NOT NULL,
  `Driverid` int(10) NOT NULL,
  `Date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hier_tbl`
--

INSERT INTO `hier_tbl` (`ID`, `Userid`, `Driverid`, `Date`) VALUES
(1, 1, 5, '2021/07/31'),
(2, 1, 1, '2021/07/31'),
(3, 1, 2, '2021/07/31'),
(4, 1, 5, '2021/07/31'),
(5, 1, 1, '2021/07/31'),
(6, 0, 6, '2021/08/01'),
(7, 0, 1, '2021/08/01'),
(11, 1, 1, '2021/08/02'),
(13, 3, 2, '2021/08/04');

-- --------------------------------------------------------

--
-- Table structure for table `signup_tbl`
--

CREATE TABLE `signup_tbl` (
  `ID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Contactnum` varchar(11) NOT NULL,
  `Password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup_tbl`
--

INSERT INTO `signup_tbl` (`ID`, `Username`, `Contactnum`, `Password`) VALUES
(1, 'mou', '01724108299', '12345678'),
(3, 'munira', '01724108299', '180101023'),
(4, 'munira akter', '01724108299', '180101023'),
(5, 'arabi', '01724108299', '87654321'),
(6, 'mmmm', '01724108299', '123456789'),
(7, 'Tanzim', '01010000001', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `thana`
--

CREATE TABLE `thana` (
  `ID` int(11) NOT NULL,
  `thana_name` varchar(50) NOT NULL,
  `division_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thana`
--

INSERT INTO `thana` (`ID`, `thana_name`, `division_id`, `district_id`) VALUES
(1, 'Jaldhaka', 1, 1),
(2, 'Dimla', 1, 1),
(3, 'Birgonj', 1, 2),
(4, 'Birampur', 1, 2),
(5, 'Shajhanpur', 2, 5),
(6, 'Gabtoli', 2, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `driver_tbl`
--
ALTER TABLE `driver_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hier_tbl`
--
ALTER TABLE `hier_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `signup_tbl`
--
ALTER TABLE `signup_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `thana`
--
ALTER TABLE `thana`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `driver_tbl`
--
ALTER TABLE `driver_tbl`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hier_tbl`
--
ALTER TABLE `hier_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `signup_tbl`
--
ALTER TABLE `signup_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `thana`
--
ALTER TABLE `thana`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
