-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2023 at 03:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee-blend`
--

-- --------------------------------------------------------

--
-- Table structure for table `register_user`
--

CREATE TABLE `register_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_user`
--

INSERT INTO `register_user` (`user_id`, `user_name`, `user_email`, `user_password`, `created_at`) VALUES
(1, 'Zarrar', 'Zarrar@gmail.com', '$2y$10$GdDNDYCSeyH4pn7y7qRtaeSwkzQeLYY3T8lbgcYiJw/r.waRYUtQy', '2023-09-27 11:46:14'),
(2, 'haseeb', 'haseeb@gmail.com', '$2y$10$PJ513CiBzADw4s8VCt6nbuIunN4EEXpKOXEyftTmoqy.JFruEjMGS', '2023-09-27 11:46:43'),
(3, 'safdar', 'safdar@gmail.com', '$2y$10$omil5WNfD8A.aq4zJbsXJeiTIEJByWoAn4K0awsJpSx2nqMwxEDWG', '2023-09-27 11:55:09'),
(4, 'zarrarmalik', 'Zarrarmalik@gmail.com', '$2y$10$lUSVmuWG/owhsMC91oJo8ueCku7mufnYN43PokL326y8NJ1RFoouq', '2023-09-27 12:04:21'),
(12, 'zarrarmalik', 'Zarrarmalik@gmail.com', '$2y$10$Io5YsJECx3atN.snCVzUXOy8j1PhkOcWEG.uU9tO4WUdA5rhqVsXy', '2023-09-27 12:06:55'),
(13, 'taihaam', 'taihaam@gmail.com', '$2y$10$zU63OqwFAG9V16jv8/dGruV/f/Qid9OY/q6KiCuwCv4dkYzWkcqNK', '2023-09-27 12:08:36'),
(15, 'riaz', 'riaz@gmail.com', '$2y$10$/0RTBlpJTeeVsOXa7Wp/BenPs1Q6XUvSnlkKmw97A3nqHLtPZuugS', '2023-09-27 12:59:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register_user`
--
ALTER TABLE `register_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register_user`
--
ALTER TABLE `register_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
