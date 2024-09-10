-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 09:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `mytbl`
--

CREATE TABLE `mytbl` (
  `id` int(11) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `mName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mytbl`
--

INSERT INTO `mytbl` (`id`, `fName`, `mName`, `lName`, `section`, `address`, `email`, `contact`, `password`, `account_type`) VALUES
(22, 'Carlo Angelo', 'Pastrana', 'Arellano', 'INF-222', 'Bulbok', 'carlo@gmail.com', '09456258452', 'pass', '2'),
(23, 'David', 'Super', 'Malibiran', 'INF-222', 'Tanauan, Malayo, Duluhan, Php40 fare', 'gmail@gmail.com', '09456258452', 'pass', '2'),
(26, 'Jv', 'Nokage', 'Quisto', 'INF-222', 'Mataas na kahoy, tatawid ng dagat', 'jv@gmail.com', '09546258423', 'pass', '2'),
(27, 'Joshua', 'Robers', 'Garcia', 'INF-222', 'Sicily, Italy', 'joshua@gmail.com', '09548751654', 'pass', '2'),
(28, 'Lebron', 'Safron', 'Jame', 'INF-222', 'Los Angeles, Lakers', 'lebron@gmail.com', '09154862574', 'pass', '2'),
(29, 'Maria', 'Narito', 'Daniela', 'INF-222', 'Sico, Lipa', 'dani@gmail.com', '09542687413', 'pass', '2'),
(31, 'Crystal ', 'Clear ', 'Macasaet', 'INF-222', 'Mataas na kahoy', 'crystal@gmail.com', '09258456974', 'pass', '2'),
(33, 'Reggie', 'Roxas', 'Rocafort', 'INF-222', 'Riles, Tambo', 'reggie@gmail.com', '09245364131', 'password', '2'),
(34, 'admin', 'admin', 'admin', '', '', 'admin@gmail.com', '', 'admin', '1'),
(35, 'Hakeem', 'Malakim', 'Olajuwon', 'INF-222', 'Nigeria, Africa', 'hakeem@gmail.com', '09547517845', 'pass', '2'),
(36, 'Cade', 'Blade', 'Cunningham', 'INF-222', 'Texas, USA', 'cade@gmail.com', '09754845475', 'pass', '2'),
(37, 'Ash', 'Pikachu', 'Ketchum', 'INF-222', 'Townsville, Hojo Region', 'ash@gmail.com', '09451657894', 'pass', '2'),
(38, 'Viktor', 'Magtanggol', 'Wembanyama', 'INF-222', 'Paris, France, Europe tabi ng jolibee', 'viktor@gmail.com', '0945475214552', 'pass', '2'),
(39, 'Blair', 'Cyrus', 'Williams', 'INF-222', 'Los Angeles, California', 'blair@gmail.com', '09784561573', 'pass', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mytbl`
--
ALTER TABLE `mytbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mytbl`
--
ALTER TABLE `mytbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
