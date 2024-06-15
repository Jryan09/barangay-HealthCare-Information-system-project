-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 02:55 AM
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
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `gender` text NOT NULL,
  `contact_no` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `medical_history` varchar(255) NOT NULL,
  `allergies` varchar(255) NOT NULL,
  `current_medication` varchar(255) NOT NULL,
  `family_medical_history` varchar(255) NOT NULL,
  `social_history` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_history`
--

INSERT INTO `medical_history` (`id`, `username`, `name`, `birthday`, `gender`, `contact_no`, `address`, `medical_history`, `allergies`, `current_medication`, `family_medical_history`, `social_history`) VALUES
(31, 'jozzel09', ' jozzel Sena', '2000-03-08', 'female', 2147483647, 'paraiso zone 1 pinamalayan, Oriental Mindoro', 'N/A', 'N/A', 'N/A', 'N/A', 'drinking alcohol'),
(32, 'lailanie09', ' Lailanie Lacambra', '1981-07-08', 'Female', 909371515, 'paraiso zone 1, pinamalayan oriental mindoro', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A'),
(33, 'jolyn09', ' jolyn Lacdang', '2023-08-14', 'female', 909371515, 'paraiso zone 1, pinamalayan oriental mindoro', 'N/A', 'N/A', 'N/A', 'N/A', 'drinking alcohol');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
