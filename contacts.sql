-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2018 at 10:45 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL unique,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `phone`, `email`) VALUES
(50, 'aa', 'aa', 3333333, 'aa@aa.com'),
(51, 'aaa', 'aa', 1111, 'sssss@ssssssssss.com'),
(52, 'aa', 'aa', 33333333, 'sssssss@sss.com'),
(53, 'sdf', 'sdffds', 333333, 'vv@vv.com'),
(54, 'sadf', 'dsaf', 555, '555@ffff.com'),
(55, 'sadf', 'sds', 223, '22sdsd@sdf.com'),
(56, 'sadfsd', 'dsfsd', 4444444, 'qqq@qqq.com'),
(57, 'hh', 'hh', 55, 'hhhhhhhhhhhh@hhhhhh.com'),
(58, 'rfrf', 'deed', 324, 'jjjj@jjj.com'),
(59, 'yyy', 'yy', 666, 'wer34@sdf.com'),
(60, 'eeeee', 'eeeee', 3241, 'sadffsd@sdfsd.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
