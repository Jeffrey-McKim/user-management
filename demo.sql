-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2018 at 11:44 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `expensedata`
--

CREATE TABLE `expensedata` (
  `amount` decimal(10,0) NOT NULL,
  `date` date NOT NULL,
  `itemtype` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expensedata`
--

INSERT INTO `expensedata` (`amount`, `date`, `itemtype`, `name`) VALUES
('0', '0000-00-00', '', ''),
('0', '1333-11-23', 'huge', ''),
('0', '1995-01-23', 'it was big', 'thekochbrothers19@gmail.com'),
('0', '1995-01-23', 'its free real estate', 'tom');

-- --------------------------------------------------------

--
-- Table structure for table `usermanagement`
--

CREATE TABLE `usermanagement` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification_key` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `forgot_status` tinyint(1) NOT NULL,
  `amount` decimal(11,0) NOT NULL,
  `date` date NOT NULL,
  `itemtype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermanagement`
--

INSERT INTO `usermanagement` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `verification_key`, `active`, `forgot_status`, `amount`, `date`, `itemtype`) VALUES
(119, 'tom', '', '', 'jmckim@bluejaybuilds.com', '166ee015c0e0934a8781e0c86a197c6e', '34b7da764b21d298ef307d04d8152dc5', 1, 0, '0', '0000-00-00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usermanagement`
--
ALTER TABLE `usermanagement`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usermanagement`
--
ALTER TABLE `usermanagement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
