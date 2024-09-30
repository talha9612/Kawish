-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 08:32 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pumpproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$8hkAj8YsOa/DUcA1tMCuP..XCBbpqhNcYcdC8EePHt1lP7kQT6H3u', NULL, '2024-01-29 05:11:12', '2024-01-29 05:11:12'),
(2, 'admin2', 'admin2@gmail.com', NULL, '$2y$10$M4jJDLETrkrylytkbcE.uOO7DS3lwgbWjnWMLEUE1A9J8daA7..qa', NULL, '2024-01-29 05:35:53', '2024-01-29 05:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `f_h_name` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `city` text NOT NULL,
  `country` text NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `title`, `name`, `email`, `email_verified_at`, `password`, `f_h_name`, `phone`, `city`, `country`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', 'donor 1', 'donor@gmail.com', NULL, '$2y$10$yIQNDxKsL84.H.fAT1jdoOd4p9H5xtepn393HDn9wc5GySo7waknu', 'father', '123456789', 'lahore', 'pakistan', NULL, '2024-01-29 06:06:18', '2024-01-29 06:06:18'),
(8, 'Mrs', 'Yetta Banks', 'wacaxafi@mailinator.com', NULL, '$2y$10$LnCmvMutcLmobo7PWT/xDOiJn3Aw7y1ozCPcyr4aW7DkCbLCE25Q2', 'Cadman Campos', '+1 (585) 755-3289', 'Temporibus commodo n', 'Eaque est labore eos', NULL, '2024-03-04 06:52:57', '2024-03-04 06:52:57');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_29_091450_create_admins_table', 1),
(6, '2024_01_29_093008_create_donors_table', 2),
(8, '2024_02_01_102926_create_surveies_table', 3),
(9, '2024_02_06_081615_create_projects_table', 4);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `survey_id` int(10) NOT NULL,
  `setup` varchar(255) NOT NULL,
  `project_id` varchar(191) NOT NULL,
  `requested_by` varchar(255) NOT NULL,
  `requested_for` varchar(255) NOT NULL,
  `donor_id` bigint(20) UNSIGNED NOT NULL,
  `plaque_id` bigint(20) UNSIGNED NOT NULL,
  `area` varchar(255) NOT NULL,
  `village_name` varchar(255) NOT NULL,
  `region` varchar(100) NOT NULL,
  `appro_h_f` int(11) NOT NULL,
  `appro_residents` int(11) NOT NULL,
  `tentative_start_date` date NOT NULL,
  `actual_start_date` date DEFAULT NULL,
  `tentative_completion_date` date NOT NULL,
  `actual_completion_date` date DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `expected_cost` decimal(10,2) NOT NULL,
  `actual_cost` int(11) NOT NULL,
  `depth` varchar(50) DEFAULT NULL,
  `snap_surveyed` varchar(512) NOT NULL,
  `snap_working` varchar(512) DEFAULT NULL,
  `current_working` varchar(512) DEFAULT NULL,
  `custodian_name` varchar(255) NOT NULL,
  `custodian_phone` varchar(255) NOT NULL,
  `comments` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `survey_id`, `setup`, `project_id`, `requested_by`, `requested_for`, `donor_id`, `plaque_id`, `area`, `village_name`, `region`, `appro_h_f`, `appro_residents`, `tentative_start_date`, `actual_start_date`, `tentative_completion_date`, `actual_completion_date`, `status`, `expected_cost`, `actual_cost`, `depth`, `snap_surveyed`, `snap_working`, `current_working`, `custodian_name`, `custodian_phone`, `comments`, `created_at`, `updated_at`) VALUES
(34, 51, 'Hand Pump', 'S-Nsqv-TM-HP-19870409-1', 'Otto Carlson', 'Eius commodo volupta', 1, 45, 'Numquam sed quia vel', 'Tatiana Mcclure', 'Sindh', 1, 2, '1987-04-09', NULL, '1974-11-08', NULL, 'In Process', '85.00', 44, 'Beatae a et sit eius', '[\"\\/images\\/1709199879_81834d73-d908-4264-b19e-3e80205d6f36 - Copy.jpg\",\"\\/images\\/1709200409_download (1).png\"]', '[\"\\/projects\\/snap_working\\/17092000602037730071_81834d73-d908-4264-b19e-3e80205d6f36 - Copy.jpg\",\"\\/projects\\/snap_working\\/1709200409_images.jpg\"]', '[\"\\/projects\\/current_working\\/17092000601669072141_81834d73-d908-4264-b19e-3e80205d6f36 - Copy.jpg\",\"\\/projects\\/current_working\\/1709200409_download.jpg\"]', 'Jessamine Decker', '+1 (506) 467-3956', 'Voluptas in esse occ', '2024-02-29 04:47:40', '2024-02-29 04:53:29'),
(35, 54, 'New Well', 'P-Hpv-HL-NW-20030408-1', 'Driscoll Joyner', 'Porro et quo sit do', 1, 10, 'Hic perspiciatis vo', 'Hayden Levine', 'Punjab', 71, 92, '2003-04-08', NULL, '1982-08-21', '1993-07-28', 'Completed', '51.00', 15, 'Illo Nam incidunt r', '[\"\\/images\\/1710399468_hp orig bk.jpeg\"]', NULL, NULL, 'Vance Meyer', '+1 (365) 593-3175', 'Libero dolore do dol', '2024-03-14 03:46:00', '2024-03-14 03:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `surveies`
--

CREATE TABLE `surveies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setup` varchar(255) NOT NULL,
  `project_id` varchar(191) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `village_name` varchar(255) NOT NULL,
  `region` text NOT NULL,
  `appro_h_f` varchar(255) NOT NULL,
  `appro_residents` int(11) NOT NULL,
  `expected_cost` decimal(10,2) NOT NULL,
  `remark` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `asign` int(10) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surveies`
--

INSERT INTO `surveies` (`id`, `setup`, `project_id`, `status`, `area`, `village_name`, `region`, `appro_h_f`, `appro_residents`, `expected_cost`, `remark`, `image`, `asign`, `created_at`, `updated_at`) VALUES
(51, 'Hand Pump', 'undefined', '2', 'Numquam sed quia vel', 'Tatiana Mcclure', 'Sindh', '1', 2, '85.00', 'Rerum ullam maxime l', '[\"\\/images\\/1709199879_81834d73-d908-4264-b19e-3e80205d6f36 - Copy.jpg\",\"\\/images\\/1709199879_81834d73-d908-4264-b19e-3e80205d6f36.jpg\"]', 1, '2024-02-29 04:44:39', '2024-02-29 04:47:40'),
(52, 'Hand Pump', 'undefined', '2', 'Sunt nemo necessita', 'Colby Roberts', 'Khyber Pakhtunkhwa', '15', 62, '67000.00', 'Ullam molestiae fugi', '[\"\\/images\\/1710404041_download (1).png\",\"\\/images\\/1710404041_download.jpg\"]', 0, '2024-02-29 04:54:16', '2024-03-14 03:14:01'),
(53, 'New Well', 'undefined', '2', 'Eveniet elit volup', 'Jamalia Ewing', 'Punjab', '93', 53, '77.00', 'Tempora rerum iste u', '[\"\\/images\\/1710399433_download.jpg\"]', 0, '2024-03-14 01:57:13', '2024-03-14 02:51:44'),
(54, 'New Well', 'undefined', '2', 'Hic perspiciatis vo', 'Hayden Levine', 'Punjab', '71', 92, '51.00', 'Nobis laboriosam ex', '[\"\\/images\\/1710399468_hp orig bk.jpeg\"]', 1, '2024-03-14 01:57:48', '2024-03-14 03:46:00'),
(55, 'New Well', 'undefined', '2', 'Quidem neque totam u', 'Fletcher Whitley', 'Sindh', '14', 33, '74.00', 'Non commodo ipsam su', '[\"\\/images\\/1710399952_download.png\"]', 0, '2024-03-14 02:05:52', '2024-03-14 02:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@gmail.com', NULL, '$2y$10$7VsQVWZWknvjXbVWa9dAWuJeWnoReFreh05GJdT8UqEZblODoJwCa', NULL, '2024-01-29 04:53:33', '2024-01-29 04:53:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `donors_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surveies`
--
ALTER TABLE `surveies`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `surveies`
--
ALTER TABLE `surveies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
