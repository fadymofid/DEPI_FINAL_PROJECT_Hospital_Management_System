-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Sep 28, 2024 at 06:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `email`, `phone`, `doctor_id`, `speciality`, `date`, `message`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'فادي ميشيل', 'fadymichel134@gmail.com', '01228595410', 1, 'general_health', '2024-09-29', NULL, 'Approved', '1', '2024-09-28 10:59:14', '2024-09-28 11:04:37'),
(3, 'ali', 'ali@gmail.com', '01278816303', 4, 'dental', '2024-09-29', NULL, 'Approved', '1', '2024-09-28 11:00:00', '2024-09-28 11:04:49'),
(4, 'khaled', 'khaled@gmail.com', '0127234234', 6, 'dental', '2024-09-29', NULL, 'Approved', '1', '2024-09-28 11:00:24', '2024-09-28 11:04:40'),
(5, 'Abdo', 'abdo@gmail.com', '01228595410', 5, 'neurology', '2024-09-30', NULL, 'In Progress', '1', '2024-09-28 11:00:52', '2024-09-28 11:00:52'),
(6, 'pop', 'pop@gmail.com', '01223274286', 3, 'orthopaedics', '2024-09-30', NULL, 'Approved', '1', '2024-09-28 11:01:17', '2024-09-28 11:04:44'),
(7, 'fadyy', 'fadymichel134@gmail.com', '01223274286', 2, 'cardiology', '2024-10-05', NULL, 'In Progress', NULL, '2024-09-28 12:30:24', '2024-09-28 12:30:24'),
(8, 'ahmed', 'fadymichel134@gmail.com', '01228595410', 4, 'dental', '2024-09-29', NULL, 'In Progress', NULL, '2024-09-28 12:30:48', '2024-09-28 12:30:48'),
(9, 'fady mofid', 'fadymichel134@gmail.com', '01223274286', 4, 'dental', '2024-09-29', NULL, 'In Progress', NULL, '2024-09-28 12:31:04', '2024-09-28 12:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `consultation_fee` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `phone`, `speciality`, `consultation_fee`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Hoda Azmy', '01223274286', 'general_health', 100, '1727529727.jpeg', '2024-09-28 10:22:07', '2024-09-28 10:22:07'),
(2, 'Dr. Matt Damon', '01223274286', 'cardiology', 300, '1727529893.jpg', '2024-09-28 10:24:53', '2024-09-28 10:24:53'),
(3, 'DR. Amr Zaky', '01278816303', 'orthopaedics', 360, '1727529936.jpeg', '2024-09-28 10:25:36', '2024-09-28 10:25:36'),
(4, 'DR. Nada Essam', '01278816303', 'dental', 400, '1727530073.jpeg', '2024-09-28 10:27:53', '2024-09-28 10:27:53'),
(5, 'Dr. Amin Ayman', '01223274286', 'neurology', 120, '1727530811.jpg', '2024-09-28 10:40:11', '2024-09-28 10:40:11'),
(6, 'Dr. Lyla Elwy', '01278816303', 'dental', 150, '1727530988.jpg', '2024-09-28 10:43:08', '2024-09-28 10:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `image`, `description`, `category`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Codral', '1727531075.jpg', 'For flu', 'antiseptics', 20.00, '2024-09-28 10:44:36', '2024-09-28 13:02:42'),
(2, 'Panadol Extra', '1727531108.jpg', 'For flu', 'Painkillers', 10.00, '2024-09-28 10:45:08', '2024-09-28 10:45:08'),
(3, 'Gummy Multivitamins', '1727531188.jpg', 'For kids', 'vitamins', 120.00, '2024-09-28 10:46:28', '2024-09-28 10:46:28'),
(4, 'Congestal', '1727531261.png', 'For Headaches', 'antibiotics', 120.00, '2024-09-28 10:47:41', '2024-09-28 10:50:31'),
(5, 'Centrum', '1727531547.jpg', 'Made in USA', 'supplements', 89.00, '2024-09-28 10:52:27', '2024-09-28 10:52:27'),
(6, 'Xoraxon', '1727531637.jpg', 'For kids', 'antiseptics', 90.00, '2024-09-28 10:53:57', '2024-09-28 10:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_09_11_231900_create_sessions_table', 1),
(5, '2024_09_12_180054_create_users_table', 1),
(6, '2024_09_16_032707_create_doctors_table', 1),
(7, '2024_09_17_014314_create_appointments_table', 1),
(8, '2024_09_19_000909_create_medicines_table', 1),
(9, '2024_10_20_200000_add_two_factor_columns_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Y7yNOY7wgg3OHXZ1g0T3ME7MLCNWXwFlMAiWRxhT', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoid0U4cjVFSkFhQldRYW11MVNRbDYwTUg1ajMwWjhZN3VKT05UY1FGQyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcGkvZG9jdG9yLWFwcG9pbnRtZW50cyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czo2OiJsb2NhbGUiO3M6MjoiZW4iO30=', 1727540735);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `phone`, `address`, `email_verified_at`, `type`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Khaled', 'khaled@gmail.com', '$2y$10$ZcBWPcxKgvJHgoseu.Zg5Oo9Vw2UOPYa3hj0c7Swx1lPPMTAy7AIC', NULL, NULL, NULL, '01228595410', '122 mohamed el imbaby', NULL, 'client', NULL, NULL, NULL, '2024-09-28 10:12:28', '2024-09-28 10:56:55'),
(2, 'admin', 'admin@gmail.com', '$2y$10$1ma2hDnLZ7gg03U/fiV3D.G4xxat5WeqIS0bssrtkI/y0Sx1cXKvu', NULL, NULL, NULL, '01223274286', '122 st mohamed el imbaby', NULL, 'admin', NULL, NULL, NULL, '2024-09-28 10:14:32', '2024-09-28 10:14:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
