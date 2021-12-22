-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 02:52 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii_advance`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`) VALUES
(3, 'Name', 'Name@gmail.com', ''),
(4, 'Name1', 'Name1@gmail.com', ''),
(5, 'Name2', 'Name2@gmail.com', ''),
(11, 'Ramesh Ramesh', 'Ramesh@gmail.com', ''),
(13, 'Ramesh Ramesh', 'Ramesh@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1640009946),
('m130524_201442_init', 1640009974),
('m190124_110200_add_verification_token_column_to_user_table', 1640009974);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `phone`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(10, 'username', '2iirve0of2zW5f0VjiTQF33MAsH3JEAB', '$2y$13$2e2WR1EB9zPD1HIkJ3IxcO7gXmPswgeS31x/cMbz5okTUiC.WxHYa', NULL, 'username@gmail.com', '1234567', 9, 1640012150, 1640012150, 'XivkK8Cio8KIZkQ2bSej51dx5T3pJvjG_1640012150'),
(11, 'deepvyas', 'f-23-qa2jH7UMw8uEd-O8JDRwmhSjcxS', '$2y$13$BVUzM/rgrTYI.rSJw8F8Gezkzunq6bw4KO7YmfUUU6W26aR8h0YWq', NULL, 'deepvyas71@gmail.com', '', 10, 1640095584, 1640095584, 'PJnrZwOaxYFlvGwc1O8AdC_eNKmoi8bV_1640095584'),
(18, 'rahulsignup', '2Af7DrmfJexq1a7v4UIWkz6vMYzeMICm', '$2y$13$X7ltjU1Ik1JIlyiLrt396O4JdacjuMiEB/a7Mh5P3DHA4xp1ssXKe', NULL, 'rahul.vermadfff@gmail.com', '', 10, 1640099662, 1640099662, 'zUYi-sRqn5iWNGdl8Q3dGRNTDWFIUjbm_1640099662');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
