-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2023 at 06:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `National_id` varchar(20) NOT NULL,
  `Tcas_round` int(5) NOT NULL,
  `Prefix_th` varchar(10) NOT NULL,
  `Firstname_th` varchar(50) NOT NULL,
  `Lastname_th` varchar(50) NOT NULL,
  `Prefix_en` varchar(10) NOT NULL,
  `Fistname_en` varchar(50) NOT NULL,
  `Lastname_en` varchar(50) NOT NULL,
  `Birth_date` date NOT NULL,
  `Ethnicity` varchar(20) NOT NULL,
  `Nationality` varchar(20) NOT NULL,
  `Religion` varchar(20) NOT NULL,
  `Province` varchar(20) NOT NULL,
  `District` varchar(20) NOT NULL,
  `Sub_district` varchar(20) NOT NULL,
  `Home_no` varchar(20) NOT NULL,
  `Village_no` varchar(20) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `Postal_Code` varchar(50) NOT NULL,
  `Telephone_number` varchar(15) NOT NULL,
  `Home_number` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Parents_occupation` varchar(50) NOT NULL,
  `Income_parents` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_city`
--

CREATE TABLE `db_city` (
  `Province` varchar(50) NOT NULL,
  `District` varchar(20) NOT NULL,
  `Sub_district` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education_student`
--

CREATE TABLE `education_student` (
  `School` varchar(100) NOT NULL,
  `Study_plan` varchar(50) NOT NULL,
  `Avg_gpa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `Major_id` varchar(50) NOT NULL,
  `Faculty` varchar(50) NOT NULL,
  `Major_name` varchar(50) NOT NULL,
  `Gpa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`National_id`,`Tcas_round`),
  ADD KEY `fore_Province` (`Province`);

--
-- Indexes for table `db_city`
--
ALTER TABLE `db_city`
  ADD KEY `Province` (`Province`,`District`,`Sub_district`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `fore_Province` FOREIGN KEY (`Province`) REFERENCES `db_city` (`Province`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
