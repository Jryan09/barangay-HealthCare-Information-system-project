-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 02:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `birthday` date DEFAULT '1900-01-01',
  `email` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `age` int(255) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `blood_type` text NOT NULL,
  `birth_of_place` varchar(255) NOT NULL,
  `immunization` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `firstname`, `lastname`, `birthday`, `email`, `gender`, `age`, `weight`, `height`, `blood_type`, `birth_of_place`, `immunization`) VALUES
(96, 'lailanie09', 'Lailanie ', ' Lacambra', '1985-05-10', 'lailanie123@gmail.com', 'Female', 45, '56', '163', 'O+', 'paraiso zone1, pinamalayan oriental mindoro', ''),
(97, 'jozzel09', 'jozzel', ' Sena', '2000-03-08', 'jozzel123@gmail.com', 'female', 24, '47', '158', 'A+', 'paraiso zone1, pinamalayan oriental mindoro', ''),
(99, 'jolyn09', 'jolyn ', ' Lacdang', '2003-08-15', 'jolyn123@Gmail.com', '', 20, '45', '156', 'A+', 'paraiso zone1, pinamalayan oriental mindoro', ''),
(100, 'foroi', 'froilan', ' manzo', '2002-12-25', 'froilanmanzo62@gmail.com', 'male', 12, '60', '170', 'O+', 'secret', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
