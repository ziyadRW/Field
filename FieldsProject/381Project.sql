-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2023 at 01:11 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `381Project`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `sender` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `receiver` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staduim_info`
--

CREATE TABLE `staduim_info` (
  `id` int NOT NULL,
  `stadium_owner` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `stadium_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `stadium_description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `stadium_seats` int NOT NULL,
  `stadium_img_url` text COLLATE utf8mb4_general_ci NOT NULL,
  `stadium_country` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `stadium_city` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `stadium_street` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staduim_info`
--

INSERT INTO `staduim_info` (`id`, `stadium_owner`, `stadium_name`, `stadium_description`, `stadium_seats`, `stadium_img_url`, `stadium_country`, `stadium_city`, `stadium_street`) VALUES
(24, 'hisham', 'Camp Nou', 'Camp Nou Stadium', 80000, '[\"6565b3fddb68b.jpeg\",\"6565b3fddb7a2.jpeg\",\"6565b3fddb803.jpeg\"]', 'Spain', 'Barcelnoa', 'camp street 1224'),
(25, 'hisham', 'Lucail ', 'Lucail Stadium', 88000, '[\"6565b436311eb.jpg\",\"6565b43631364.png\",\"6565b43631417.jpeg\",\"6565b436314c4.jpeg\"]', 'Qatar', 'Doha', 'Lucail bulevard'),
(26, 'hisham', 'Sentiago Bernabeu', 'Sentiago Bernabeu Stadium', 56000, '[\"6565b4829132d.jpeg\",\"6565b482913ed.jpeg\",\"6565b4829144d.jpeg\"]', 'Spain', 'Madrid', 'madrid street 1224'),
(27, 'hisham', 'Alianz Arena', 'Alianz Arena Stadium', 87000, '[\"6565b4c08f4d9.jpeg\",\"6565b4c08f5c9.jpeg\",\"6565b4c08f643.jpeg\",\"6565b4c08f69e.jpeg\"]', 'Germany', 'Munich', 'Munich street 1736'),
(28, 'achraf', 'Wembely', 'Wembely Stadium', 45600, '[\"6565b50da4a6d.jpeg\",\"6565b50da4bd5.jpeg\",\"6565b50da4c4e.jpeg\"]', 'England', 'London', 'cambridge street 2536'),
(29, 'achraf', 'Old Trafford', 'Old Trafford Stadium', 93000, '[\"6565b5406c1bb.jpeg\",\"6565b5406c290.jpeg\",\"6565b5406c2f5.jpeg\",\"6565b5406c35a.jpeg\"]', 'England', 'Manchester', 'Manchester street 2637'),
(30, 'achraf', 'Anfiled', 'Anfiled Stadium', 70000, '[\"6565b6169b224.jpeg\",\"6565b6169b3fc.jpeg\",\"6565b6169b538.jpeg\"]', 'England', 'Anfiled', 'Anfiled street 363'),
(31, 'achraf', 'Alawwl Park', 'Alawwl Park Stadium', 20000, '[\"6565b658b2a93.jpeg\",\"6565b658b2baf.jpeg\",\"6565b658b2c17.jpeg\"]', 'Saudi Arabia', 'Riyadh', 'KSU campus street 366'),
(32, 'hisham', 'dsijuh', 'ewrrw', 3434, '[\"6570ac842404f.png\"]', 'ertewt', 'rwetre', 'ewtewt'),
(33, 'hisham', 'r', 'ertert', 434, '[\"65710966c874d.png\"]', 'ertert', 'erttr', 'tert'),
(34, 'hisham', 'trryt', 'rtyryrtu', 456546, '[\"65711178baf9d.png\"]', 'rturturty', 'iutyutery', 'rtyrtyy');

-- --------------------------------------------------------

--
-- Table structure for table `temp_table`
--

CREATE TABLE `temp_table` (
  `id` int NOT NULL,
  `tmpVal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `stadium_renter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stadium_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp_table`
--

INSERT INTO `temp_table` (`id`, `tmpVal`, `stadium_renter`, `stadium_id`) VALUES
(154, '[\"2/12/2023\"]', 'customer1', '29'),
(155, '[\"29/11/2023\",\"3/12/2023\"]', 'customer2', '29'),
(157, '[\"2/12/2023\",\"6/12/2023\"]', 'customer1', '31'),
(158, '[\"1/12/2023\"]', 'customer1', '31'),
(159, '[\"4/12/2023\",\"7/12/2023\"]', 'customer2', '24'),
(161, '[\"2/12/2023\",\"7/12/2023\"]', 'customer2', '26'),
(162, '[\"4/12/2023\",\"7/12/2023\"]', 'customer2', '25'),
(163, '[\"2/12/2023\",\"6/12/2023\"]', 'customer2', '27'),
(164, '[\"2/12/2023\",\"6/12/2023\"]', 'customer1', '25'),
(165, '[\"1/12/2023\",\"6/12/2023\"]', 'customer1', '24'),
(166, '[\"6/12/2023\",\"11/12/2023\"]', 'md', '27'),
(167, '[\"7/12/2023\",\"11/12/2023\"]', 'md', '26'),
(168, '[\"7/12/2023\",\"11/12/2023\"]', 'md', '24'),
(169, '[\"8/12/2023\",\"11/12/2023\"]', 'md', '29'),
(170, '[\"8/12/2023\",\"11/12/2023\"]', 'customer1', '25'),
(171, '[\"12/12/2023\"]', 'customer1', '26'),
(172, '[\"7/12/2023\",\"11/12/2023\"]', 'customer1', '27'),
(173, '[\"7/12/2023\",\"10/12/2023\"]', 'customer1', '28'),
(174, '[\"7/12/2023\",\"10/12/2023\"]', 'customer1', '28'),
(175, '[\"9/12/2023\",\"12/12/2023\"]', 'customer2', '25'),
(176, '[\"8/12/2023\",\"12/12/2023\"]', 'customer2', '25'),
(177, '[\"7/12/2023\",\"12/12/2023\"]', 'customer2', '26'),
(178, '[\"7/12/2023\",\"12/12/2023\"]', 'customer2', '26'),
(179, '[\"9/12/2023\",\"13/12/2023\"]', 'customer2', '26'),
(180, '[\"10/12/2023\"]', 'customer2', '25'),
(181, '[\"11/12/2023\",\"13/12/2023\"]', 'customer1', '25'),
(182, '[\"10/12/2023\",\"12/12/2023\"]', 'customer1', '26'),
(183, '[\"10/12/2023\",\"12/12/2023\"]', 'customer1', '26'),
(184, '[\"8/12/2023\",\"11/12/2023\"]', 'customer2', '26'),
(185, '[\"9/12/2023\",\"11/12/2023\"]', 'customer1', '25'),
(186, '[\"8/12/2023\",\"11/12/2023\"]', 'customer1', '24'),
(187, '[\"9/12/2023\",\"12/12/2023\"]', 'customer1', '24'),
(188, '[\"9/12/2023\",\"12/12/2023\"]', 'customer1', '24'),
(189, '[\"8/12/2023\",\"11/12/2023\",\"13/12/2023\"]', 'customer1', '24'),
(190, '[\"8/12/2023\",\"11/12/2023\",\"13/12/2023\"]', 'customer1', '24'),
(191, '[\"11/12/2023\"]', 'customer2', '32'),
(192, '[\"12/12/2023\"]', 'customer2', '32'),
(193, '[\"13/12/2023\"]', 'customer1', '32'),
(194, '[\"8/12/2023\"]', 'aaa', '32'),
(195, '[\"8/12/2023\"]', 'aaa', '32'),
(196, '[\"9/12/2023\"]', 'aaa', '25'),
(197, '[\"9/12/2023\"]', 'customer2', '33'),
(198, '[\"13/12/2023\"]', 'customer1', '33'),
(199, '[\"9/12/2023\"]', 'customer2', '24'),
(200, '[\"12/12/2023\",\"14/12/2023\"]', 'customer2', '34'),
(201, '[\"12/12/2023\",\"14/12/2023\"]', 'customer2', '34'),
(202, '[\"12/12/2023\",\"14/12/2023\"]', 'customer2', '34'),
(203, '[\"10/12/2023\",\"13/12/2023\"]', 'customer2', '34'),
(204, '[\"10/12/2023\",\"13/12/2023\"]', 'customer2', '34');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `id` int NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `account_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `first_name`, `last_name`, `username`, `password`, `account_type`) VALUES
(24, 'mohammed', 'ahmed', 'customer1', '123', 'customer'),
(25, 'khaled', 'naif', 'customer2', '123', 'customer'),
(26, 'naif', 'mohsen', 'customer3', '123', 'customer'),
(27, 'hisham', 'suliman', 'owner1', '123', 'owner'),
(28, 'achraf', 'gazdar', 'owner2', '123', 'owner'),
(29, 'moh', 'md', 'md', '123', 'customer'),
(30, 'dsfds', 'sdfgdsg', 'aaa', 'aaa', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staduim_info`
--
ALTER TABLE `staduim_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_table`
--
ALTER TABLE `temp_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staduim_info`
--
ALTER TABLE `staduim_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `temp_table`
--
ALTER TABLE `temp_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
