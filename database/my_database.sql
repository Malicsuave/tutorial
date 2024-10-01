-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2024 at 10:23 AM
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
-- Database: `my_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `preffix` varchar(255) NOT NULL,
  `seven_digit` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `first_name`, `middle_name`, `last_name`, `gender`, `preffix`, `seven_digit`, `email`, `password`) VALUES
(1, 'Willard', 'Rivas', 'Malicse', 'Male', '0813', '1234567', 'reywillardd01@gmail.com', 'uFANzajw'),
(2, 'Willard', 'Rivas', 'Malicse', 'Male', '0813', '1234567', 'reywillardd01@gmail.com', 'Qa08b4Np'),
(3, 'John', 'Mcclaire', 'Adams', 'Male', '0817', '0987464', 'John@gmail.com', 'q1xzDpIy'),
(4, 'Jayson', 'Garcia', 'Munti', 'Male', '0906', '0887389', 'jayson@gmail.com', 'CdLz9t40'),
(5, 'Ivan', 'Vazquez', 'Alcantara', 'Male', '0813', '0969464', 'ivan@gmail.com', 'VdMHA4I2'),
(6, 'Kevin', 'Durant', 'Olarte', 'Male', '0813', '4846546', 'kevin@gmail.com', 'c7FTr92q'),
(7, 'Uno', 'Boomboom', 'Valencia', 'Female', '0906', '1654645', 'uno@gmail.com', '8rl9C6mt'),
(8, 'Hannah', 'Alcatraz', 'Alcaraz', 'Female', '0817', '7949446', 'hannah@gmail.com', 'bLeWx0IY'),
(9, 'Kayel', 'Latayan', 'Libao', 'Female', '0905', '6654813', 'kayel@gmail.com', 'iBwTCa1E'),
(10, 'Lieroy', 'Sanchez', 'Robles', 'Male', '0906', '5464646', 'lieroy@gmail.com', 'qkJcuAmg'),
(11, 'Nils', 'Michael', 'Jordan', 'Male', '0907', '7845454', 'nils@gmail.com', '2zMOGdlr'),
(12, 'David', 'Middle', 'Malibiran', 'Male', '0906', '9846554', 'david@gmail.com', 'ANxj3PWH'),
(13, 'DJ', 'deejay', 'Aquino', 'Male', '0907', '2514646', 'dj@gmail.com', 'aQN5cvg4'),
(14, 'Angel', 'Ashley', 'Adao', 'Male', '0907', '3594554', 'angel@gmail.com', 'aGupeE7Y'),
(15, 'John', 'Wall', 'Wizard', 'Male', '0905', '8455454', 'john@gmail.com', 'WXQTk0JG'),
(16, 'Maemae', 'Lovely', 'Pureza', 'Female', '0906', '5789946', 'lovely@gmail.com', 'vUNdZQmc'),
(17, 'Kim Gerald', 'Garcia', 'Delos reyes', 'Male', '0907', '6165484', 'kim@gmail.com', 'AlrPNaDC'),
(18, 'Niel', 'Balangkas', 'Malleon', 'Male', '0907', '8877546', 'niel@gmail.com', 'Y3JxCIZ1'),
(19, 'Jeremiah', 'Briller', 'Lansang', 'Male', '0905', '8484646', 'jeremiah@gmail.com', 'Ja5VgErA'),
(20, 'Jv', 'Malakim', 'Quisto', 'Male', '0907', '4497848', 'jv@gmail.com', 'tA9GMBFv'),
(21, 'Carlo', 'Ocarls', 'Arellano', 'Male', '0905', '6878484', 'carlo@gmail.com', 'FWN0Lxfa'),
(22, 'Leobert', 'Leon', 'Malibiran', 'Male', '0905', '7949446', 'leobert@gmail.com', '9g0BesP6'),
(23, 'Marvin', 'Cutie', 'Anatacio', 'Male', '0905', '8546646', 'marvin@gmail.com', 'mIYl0ZR6'),
(24, 'John', 'Carlo', 'Torres', 'Male', '0906', '5848465', 'johncarlo@gmail.com', 'MUh1bs3a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
