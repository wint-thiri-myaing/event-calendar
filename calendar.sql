-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2020 at 09:10 AM
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
-- Database: `calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `task_name` varchar(50) NOT NULL,
  `memo` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `color` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `task_name`, `memo`, `date`, `color`) VALUES
(10, 'werewr', 'werwer', '2020-06-18', '#FFD700'),
(98, 'aaaa', 'fhg', '2020-07-28', '#008000'),
(105, 'Dinner', 'sdfdgh', '2020-07-23', '#FFD700'),
(106, 'aaaa', 'mgm', '2020-07-31', '#FF0000'),
(108, 'kkk', 'nfgj', '2020-07-22', '#008000'),
(109, 'kkk', 'fjg', '2020-07-30', '#008000'),
(110, 'Dinner', 'fgvg,h', '2020-07-30', '#FFD700'),
(115, 'Dinner', 'bfngjg', '2020-07-17', '#008000'),
(118, '0038', 'xdh', '2020-07-15', '#0071c5'),
(121, 'Dinner', 'dsh', '2020-07-06', '#008000'),
(122, 'kkk', 'dshf', '2020-07-06', '#FFD700'),
(126, 'kkk', 'fd', '2020-07-09', '#FF0000'),
(127, 'aaaa', 'cv', '2020-07-01', '#FF8C00'),
(145, 'kkk', 'ffj', '2020-08-04', '#008000'),
(149, 'Dinner', 'gdbfx', '2020-08-05', '#0071c5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
