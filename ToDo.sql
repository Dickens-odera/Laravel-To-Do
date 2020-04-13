-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 13, 2020 at 01:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ToDo`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `task` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isComplete` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `user_id`, `task`, `description`, `isComplete`, `created_at`, `updated_at`) VALUES
(2, NULL, 'Task Two', 'This is the second task', 0, '2020-04-12 17:49:54', '2020-04-12 17:49:54'),
(3, NULL, 'Task THree', 'This is the third task', 0, '2020-04-12 17:54:51', '2020-04-12 17:54:51'),
(4, NULL, 'task four', 'this is the fourth task', 0, '2020-04-12 18:11:28', '2020-04-12 18:11:28'),
(5, NULL, 'task four', 'this is the fourth task', 0, '2020-04-12 18:11:47', '2020-04-12 18:11:47'),
(6, NULL, 'fourth task', 'this is the fourth task', 0, '2020-04-12 18:17:03', '2020-04-12 18:17:03'),
(8, 3, 'fourth task', 'this is the fourth task', 0, '2020-04-12 18:18:38', '2020-04-12 18:18:38'),
(10, NULL, 'fourth task', 'this is the fourth task', 0, '2020-04-12 18:18:42', '2020-04-12 18:18:42'),
(11, NULL, 'fourth task', 'this is the fourth task', 0, '2020-04-12 18:18:42', '2020-04-12 18:18:42'),
(12, NULL, 'fourth task', 'this is the fourth task', 0, '2020-04-12 18:18:43', '2020-04-12 18:18:43'),
(13, NULL, 'another task', 'this is some other task', 0, '2020-04-12 19:36:25', '2020-04-12 19:36:25'),
(14, NULL, 'another task', 'this is some other task', 0, '2020-04-12 19:36:57', '2020-04-12 19:36:57'),
(15, NULL, 'another task e', 'this is some other task e', 0, '2020-04-12 19:37:12', '2020-04-12 19:37:12'),
(16, NULL, 'another task e', 'this is some other task e', 7, '2020-04-12 19:37:26', '2020-04-12 19:37:26'),
(17, NULL, 'one', 'one', 0, '2020-04-13 11:51:44', '2020-04-13 11:51:44'),
(18, 3, 'Take Breakfast', 'Breakfast', 0, '2020-04-13 12:04:19', '2020-04-13 12:04:19'),
(19, 3, 'Take Breakfast', 'Take Breakfast', 0, '2020-04-13 12:19:44', '2020-04-13 12:19:44'),
(20, 4, 'Lunch', 'Take Lunch', 0, '2020-04-13 12:22:01', '2020-04-13 12:22:01'),
(21, 4, 'Take Breakfast', 'test', 0, '2020-04-13 12:56:23', '2020-04-13 12:56:23'),
(22, 4, 'another test', 'testing the app', 0, '2020-04-13 12:56:40', '2020-04-13 12:56:40'),
(23, 4, 'Testing', 'tetsung the app', 0, '2020-04-13 13:09:35', '2020-04-13 13:09:35'),
(24, 4, 'updated task item', 'updated description', 1, '2020-04-13 13:23:51', '2020-04-13 14:30:51'),
(26, NULL, 'Evening walk', 'Take a break and have some evening walk to refresh the mind', 0, '2020-04-13 14:24:49', '2020-04-13 14:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2020_04_11_212123_add_role_to_users_table', 2),
(5, '2020_04_11_212948_add_username_to_users_table', 3),
(6, '2020_04_12_010154_create_lists_table', 4),
(7, '2020_04_12_130015_add_user_id_to_lists_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('superadmin','user1','user2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(3, 'Dickens Odera', 'dickens', 'dickensodera9@gmail.com', NULL, '$2y$10$ucnfz2jbhMf9Dwxb15Xk.OVuMmk3RJ5kvy28lYr7CqKbBUzmPpKLS', 'NEhoCAddgcSkU3w84Qo0sLF6y9wApol9QfQ5x8FGZNylW8fqZkqSjYGFBxyT', '2020-04-12 01:42:34', '2020-04-12 01:42:34', 'superadmin'),
(4, 'Jared Odera', 'odera', 'dickenso2015@gmail.com', NULL, '$2y$10$BfJM4D33I0tvDhCGSxq6ZeeNC73j.n6XxmDkv/BEdsGLJsQvytIlm', NULL, '2020-04-13 12:21:43', '2020-04-13 12:21:43', 'user1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lists_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lists`
--
ALTER TABLE `lists`
  ADD CONSTRAINT `lists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
