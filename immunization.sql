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
-- Table structure for table `immunization`
--

CREATE TABLE `immunization` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `vaccine_name` varchar(255) NOT NULL,
  `vaccination_date` date NOT NULL,
  `health_provider` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `immunization`
--

INSERT INTO `immunization` (`id`, `username`, `patient_name`, `vaccine_name`, `vaccination_date`, `health_provider`) VALUES
(5, '', 'jam ryan sena', 'anti pollo', '2023-11-03', 'delos reyes medical center'),
(43, 'jozzel09', 'jozzel Lacdang', 'anti pollo', '2000-03-08', 'barangay health center,  zone 1 pinamalayan, oriental, mindoro'),
(45, 'lailanie09', 'Lailanie Lacambra', 'anti pollo', '1981-07-15', 'b'),
(46, 'jolyn09', 'Jolyn Lacdang', 'anti pollo', '2023-11-14', 'barangay health center,  zone 1 pinamalayan, oriental, mindoro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `immunization`
--
ALTER TABLE `immunization`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `immunization`
--
ALTER TABLE `immunization`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
