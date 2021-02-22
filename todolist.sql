-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 22, 2021 at 05:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `td_list`
--

CREATE TABLE `td_list` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `completed` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `td_list`
--

INSERT INTO `td_list` (`id`, `title`, `completed`, `time`) VALUES
(17, 'AS much you want', 'NO', '2021-02-22 10:26:12'),
(19, 'One', 'YES', '2021-02-22 11:42:35'),
(21, 'Five', 'YES', '2021-02-22 11:42:47'),
(22, 'I can edit as well', 'NO', '2021-02-22 11:42:56'),
(23, 'If I want to edit', 'NO', '2021-02-22 11:43:02'),
(24, 'Completed', 'YES', '2021-02-22 11:44:18'),
(25, 'As much  I want', 'NO', '2021-02-22 11:54:11'),
(26, 'New One', 'YES', '2021-02-22 16:16:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `td_list`
--
ALTER TABLE `td_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `td_list`
--
ALTER TABLE `td_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
