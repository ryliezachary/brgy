-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2021 at 05:29 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barangay`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_on`) VALUES
(1, 'rose', 'admin', 'Rose Ann', 'Tejada', 'image2.jpg', '2018-04-30'),
(2, 'rhea', 'admin123', 'Rhea', 'Ragunton', 'image1.jpg', '2018-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `individuals`
--

CREATE TABLE `individuals` (
  `id` int(11) NOT NULL,
  `individual_id` varchar(15) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `birthdate` date NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `individuals`
--

INSERT INTO `individuals` (`id`, `individual_id`, `firstname`, `lastname`, `address`, `birthdate`, `contact_info`, `gender`, `photo`, `created_on`) VALUES
(3, 'DYE473869250', 'Rose Ann', 'Tejadas', 'Quinsoriano, Santa Cruz, Ilocos Sur', '2021-08-24', '09123456789', 'Female', 'image2.jpg', '2018-04-30'),
(4, 'MSP294150867', 'RHEA', 'RAGUNTON', 'Quinsoriano, Santa Cruz, Ilocos Sur', '2021-04-21', '09876576543', 'Female', 'image1.jpg', '2021-08-27'),
(5, 'UHC975360482', 'Lichen', 'lacsamana', 'Quinsoriano, Sta. Cruz Ilocos ', '2021-06-07', '09675467876', 'Female', '225305099_1039015186637664_6766149614741698751_n.jpg', '2021-08-27'),
(6, 'ZJE327946510', 'Mary Grace ', 'Cortado', 'Quinsoriano, Santa Cruz, Ilocos Sur', '2021-07-20', '09675645345', 'Female', '', '2021-08-27'),
(7, 'VRY705296831', 'Samuel', 'Tejada', 'Quinsoriano, Santa Cruz, Ilocos Sur', '2021-07-22', '09675645432', 'Male', 'genyo.png', '2021-08-27'),
(9, 'VRU265948703', 'Lorena', 'Tejada', 'Quinsoriano, Santa Cruz, Ilocos Sur', '2009-02-05', '09878768767', 'Female', '', '2021-09-04'),
(11, 'KGP873195620', 'Sarah', 'Bilog', 'Quinsoriano, Santa Cruz, Ilocos Sur', '2011-09-14', '09786545637', 'Female', '', '2021-09-08'),
(12, 'PDM316429058', 'Rizza', 'Vilog', 'Quinsoriano, Santa Cruz, Ilocos Sur', '2002-06-12', '09787656543', 'Female', '', '2021-09-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individuals`
--
ALTER TABLE `individuals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `individuals`
--
ALTER TABLE `individuals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
