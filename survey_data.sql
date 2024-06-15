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
-- Table structure for table `survey_data`
--

CREATE TABLE `survey_data` (
  `full_name` varchar(100) NOT NULL,
  `gender` text NOT NULL,
  `age` int(3) NOT NULL,
  `contact_number` int(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `health_insurance` enum('Yes','No') NOT NULL,
  `visited_provider` enum('Yes','No') NOT NULL,
  `consent` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_data`
--

INSERT INTO `survey_data` (`full_name`, `gender`, `age`, `contact_number`, `address`, `health_insurance`, `visited_provider`, `consent`) VALUES
('jam mampusti', 'male', 23, 2147483647, 'pinamalayan, Oriental Mindoro', 'Yes', 'Yes', 'Yes'),
('jam mampusti', 'male', 23, 2147483647, 'pinamalayan, Oriental Mindoro', 'Yes', 'Yes', 'Yes'),
('jam mampusti', 'male', 23, 2147483647, 'pinamalayan, Oriental Mindoro', 'Yes', 'Yes', 'Yes'),
('kkkk ppp', 'male', 67, 2147483647, 'pinamalayan, Oriental Mindoro', 'Yes', 'Yes', 'Yes'),
('jam mampusti', 'male', 23, 2147483647, 'pinamalayan, Oriental Mindoro', 'Yes', 'Yes', 'Yes');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
