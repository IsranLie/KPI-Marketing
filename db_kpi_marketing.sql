-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 08, 2025 at 08:02 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kpi_marketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_employees`
--

CREATE TABLE `table_employees` (
  `id` int NOT NULL,
  `employee_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_employees`
--

INSERT INTO `table_employees` (`id`, `employee_name`) VALUES
(1, 'Budi'),
(2, 'Adi'),
(3, 'Rara'),
(4, 'Doni');

-- --------------------------------------------------------

--
-- Table structure for table `table_kpi_marketing`
--

CREATE TABLE `table_kpi_marketing` (
  `id` int NOT NULL,
  `task_id` int DEFAULT NULL,
  `kpi_type_id` int NOT NULL,
  `employee_id` int NOT NULL,
  `deadline` date DEFAULT NULL,
  `actual_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_kpi_marketing`
--

INSERT INTO `table_kpi_marketing` (`id`, `task_id`, `kpi_type_id`, `employee_id`, `deadline`, `actual_date`) VALUES
(1, 1, 1, 1, '2022-01-10', '2022-01-09'),
(2, 2, 1, 1, '2022-01-10', '2022-01-08'),
(3, 3, 2, 1, '2022-01-10', '2022-01-07'),
(4, 4, 2, 1, '2022-01-10', '2022-01-12'),
(5, 5, 1, 2, '2022-01-10', '2022-01-09'),
(6, 6, 1, 2, '2022-01-10', '2022-01-12'),
(7, 7, 2, 2, '2022-01-10', '2022-01-07'),
(8, 8, 2, 2, '2022-01-10', '2022-01-07'),
(9, 9, 1, 3, '2022-01-10', '2022-01-12'),
(10, 10, 1, 3, '2022-01-10', '2022-01-09'),
(11, 11, 2, 3, '2022-01-10', '2022-01-12'),
(12, 12, 2, 4, '2022-01-10', '2022-01-09'),
(13, 13, 1, 4, '2022-01-10', '2022-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `table_kpi_types`
--

CREATE TABLE `table_kpi_types` (
  `id` int NOT NULL,
  `kpi_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `target` int NOT NULL,
  `weight_percentage` decimal(5,2) NOT NULL DEFAULT '0.00',
  `late_penalty_percentage` decimal(5,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_kpi_types`
--

INSERT INTO `table_kpi_types` (`id`, `kpi_name`, `target`, `weight_percentage`, `late_penalty_percentage`) VALUES
(1, 'Sales', 2, 50.00, 7.00),
(2, 'Report', 2, 50.00, 5.00);

-- --------------------------------------------------------

--
-- Table structure for table `table_tasks`
--

CREATE TABLE `table_tasks` (
  `id` int NOT NULL,
  `task_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_tasks`
--

INSERT INTO `table_tasks` (`id`, `task_name`) VALUES
(1, 'Tasklist 1'),
(10, 'Tasklist 10'),
(11, 'Tasklist 11'),
(12, 'Tasklist 12'),
(13, 'Tasklist 13'),
(2, 'Tasklist 2'),
(3, 'Tasklist 3'),
(4, 'Tasklist 4'),
(5, 'Tasklist 5'),
(6, 'Tasklist 6'),
(7, 'Tasklist 7'),
(8, 'Tasklist 8'),
(9, 'Tasklist 9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_employees`
--
ALTER TABLE `table_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_kpi_marketing`
--
ALTER TABLE `table_kpi_marketing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `kpi_type_id` (`kpi_type_id`);

--
-- Indexes for table `table_kpi_types`
--
ALTER TABLE `table_kpi_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kpi_name` (`kpi_name`);

--
-- Indexes for table `table_tasks`
--
ALTER TABLE `table_tasks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `task_name` (`task_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_employees`
--
ALTER TABLE `table_employees`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_kpi_marketing`
--
ALTER TABLE `table_kpi_marketing`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `table_kpi_types`
--
ALTER TABLE `table_kpi_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_tasks`
--
ALTER TABLE `table_tasks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_kpi_marketing`
--
ALTER TABLE `table_kpi_marketing`
  ADD CONSTRAINT `table_kpi_marketing_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `table_employees` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `table_kpi_marketing_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `table_tasks` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `table_kpi_marketing_ibfk_3` FOREIGN KEY (`kpi_type_id`) REFERENCES `table_kpi_types` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
