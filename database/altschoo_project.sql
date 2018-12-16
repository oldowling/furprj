-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2018 at 02:39 PM
-- Server version: 5.6.41
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `altschoo_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projectid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `workstream` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `language` varchar(300) NOT NULL,
  `activestatus` tinyint(4) NOT NULL DEFAULT '1',
  `favorite` tinyint(4) NOT NULL DEFAULT '0',
  `assignto` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectid`, `name`, `description`, `workstream`, `status`, `language`, `activestatus`, `favorite`, `assignto`) VALUES
(1, 'test', 'abc', 1, 1, 'HTML, JS, BOOTSTRAP', 1, 1, 5),
(2, 'testing', 'abc', 4, 2, 'MYSQL,ANGULAR', 1, 1, 5),
(8, 'abc', 'test', 1, 1, 'JS', 1, 1, 7),
(9, 'Test Project', 'Project Brief here', 2, 2, 'HTML, CSS, BOOTSTRAP, ANGULAR', 1, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `qualification` tinyint(4) NOT NULL DEFAULT '1',
  `experience` varchar(10) NOT NULL,
  `skills` varchar(300) NOT NULL,
  `objective` tinyint(4) NOT NULL DEFAULT '1',
  `role` tinyint(4) NOT NULL DEFAULT '2',
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `email`, `password`, `username`, `qualification`, `experience`, `skills`, `objective`, `role`, `status`) VALUES
(2, 'test@gmail.com', '$2y$10$QKBYq.RUIlGoly8yRrzMXuhgATM0tsIvstsakShOSIZ2xPz20FWWm', 'test', 1, '', '', 1, 1, 1),
(5, 'ali@gmail.com', '$2y$10$QKBYq.RUIlGoly8yRrzMXuhgATM0tsIvstsakShOSIZ2xPz20FWWm', 'ali', 1, '3', 'HTML,CSS', 1, 3, 1),
(6, 'qazi@gmail.com', '$2y$10$QKBYq.RUIlGoly8yRrzMXuhgATM0tsIvstsakShOSIZ2xPz20FWWm', 'qazi', 1, '2', 'CSS,JS,BOOTSTRAP', 1, 2, 1),
(7, 'test1@gmail.com', '$2y$10$kTFjPljFFFADIB480KsAMuyKa46iKthsUp/87u31NXLc3bks/bsye', 'Olesya', 3, '5', 'ASP,SQL', 3, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
