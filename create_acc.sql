-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2025 at 05:29 AM
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
-- Database: `create_acc`
--

-- --------------------------------------------------------

--
-- Table structure for table `fees_info`
--

CREATE TABLE `fees_info` (
  `fee_id` int(11) NOT NULL,
  `studentName` varchar(50) NOT NULL,
  `studentNo` int(11) NOT NULL,
  `section` varchar(50) NOT NULL,
  `feeType` varchar(50) NOT NULL,
  `feeAmount` decimal(50,0) NOT NULL,
  `amountPaid` decimal(50,0) NOT NULL,
  `dueDate` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `datePaid` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees_info`
--

INSERT INTO `fees_info` (`fee_id`, `studentName`, `studentNo`, `section`, `feeType`, `feeAmount`, `amountPaid`, `dueDate`, `status`, `datePaid`) VALUES
(23, 'Ababao, Ken Huxley P', 221001211, 'BSIT 2A', 'TEAM_BUILDING', 650, 650, '2023-12-10', 'Paid', '2023-12-08 05:00:00'),
(24, 'Ababao, Ken Huxley P', 221001211, 'BSIT 2A', 'PROM_FEE', 750, 750, '2023-12-25', 'Paid', '2023-12-08 05:00:00'),
(26, 'Ababao, Ken Huxley P', 221001211, 'BSIT 2A', 'TUITION_FEE', 2000, 2000, '2023-11-30', 'Paid', '2023-12-08 05:00:00'),
(31, 'Ababao, Ken Huxley P', 221001211, 'BSIT 2A', 'JPCS_FEE', 150, 150, '2023-12-15', 'Paid', '2023-12-08 05:00:00'),
(35, 'Ababao, Ken Huxley P', 221001211, 'BSIT 2A', 'BYCIT_FEE', 800, 800, '2023-12-31', 'Paid', '2023-12-08 05:00:00'),
(37, 'Abonita, April B.', 221001212, 'BSIT 2A', 'JPCS_FEE', 150, 150, '2023-12-15', 'Paid', '2023-12-08 05:00:00'),
(38, 'Abonita, Jancee Kenn E.', 221001213, 'BSIT 2A', 'BYCIT_FEE', 800, 800, '2023-12-31', 'Paid', '2023-12-08 05:00:00'),
(39, 'Ajero, Jamaica B.', 221001214, 'BSIT-2A', 'BYCIT_FEE', 800, 800, '2023-12-31', 'Paid', '2023-12-11 16:00:00'),
(43, 'Abonita, April B.', 221001212, 'BSIT 2A', 'PROM_FEE', 750, 750, '2023-12-25', 'Paid', '2023-12-15 16:00:00'),
(44, 'Lucas, Mark Bryan S.', 221001287, 'BSIT 2A', 'TEAM_BUILDING', 650, 650, '2023-12-10', 'Paid', '2023-12-15 16:00:00'),
(45, 'Lucas, Mark Bryan S.', 221001287, 'BSIT 2A', 'TUITION_FEE', 2000, 2000, '2023-11-30', 'Paid', '2023-12-15 16:00:00'),
(46, 'Lucas, Mark Bryan S.', 221001287, 'BSIT 2A', 'PROM_FEE', 750, 750, '2023-12-25', 'Paid', '2023-12-15 16:00:00'),
(47, 'Cezar, Michaela M.', 221001280, 'BSIT 2A', 'BYCIT_FEE', 800, 800, '2023-12-31', 'Paid', '2023-12-15 16:00:00'),
(48, 'Catorce, Marjon D.', 221001210, 'BSIT 2A', 'BYCIT_FEE', 800, 800, '2023-12-31', 'Paid', '2023-12-15 16:00:00'),
(49, 'Cervas, Jahara P.', 221001221, 'BSIT 2A', 'JPCS_FEE', 150, 100, '2023-12-15', 'Paid', '2023-12-16 05:01:22'),
(50, 'Cezar, Michaela M.', 221001280, 'BSIT 2A', 'PROM_FEE', 750, 50, '2023-12-25', 'Paid', '2023-12-16 05:13:57'),
(51, 'Bermido, Kenneth Louis T.', 221001218, 'BSIT 2A', 'PROM_FEE', 750, 500, '2023-12-25', 'Paid', '2023-12-16 06:04:36'),
(52, 'Boreta, John Rey S.', 221001219, 'BSIT 2A', 'JPCS_FEE', 150, 50, '2023-12-15', 'Paid', '2023-12-16 06:17:17'),
(53, 'Boreta, John Rey S.', 221001219, 'BSIT 2A', 'BYCIT_FEE', 800, 80, '2023-12-31', 'Paid', '2023-12-16 06:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `studentName` varchar(50) NOT NULL,
  `studentNo` int(11) NOT NULL,
  `section` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_acc`
--

CREATE TABLE `student_acc` (
  `studentNo` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fees_info`
--
ALTER TABLE `fees_info`
  ADD PRIMARY KEY (`fee_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_acc`
--
ALTER TABLE `student_acc`
  ADD PRIMARY KEY (`studentNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fees_info`
--
ALTER TABLE `fees_info`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `student_acc`
--
ALTER TABLE `student_acc`
  MODIFY `studentNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
