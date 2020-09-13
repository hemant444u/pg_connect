-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2020 at 10:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pg`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `building_id` int(11) DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `building_id`, `country`, `state`, `district`, `city`, `area`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '1', '1', '1', 'Ramgarh', 'Chokad', '23.356261240729363', '85.31438076733397', '2020-09-01 07:26:31', '2020-09-01 07:41:31'),
(2, NULL, 1, '1', '1', '1', 'Ramgarh', 'Ramgarh', '24.244668648996548', '86.33422100781249', '2020-09-01 07:31:05', '2020-09-01 13:18:20'),
(3, NULL, 2, '1', '1', '1', 'hgf', 'jhgf', '23.024005188377515', '84.62584698437499', '2020-09-01 08:32:35', '2020-09-01 13:19:29'),
(4, NULL, 3, '1', '1', '1', 'jhgf', 'jhg', '23.53364679366798', '86.07604229687499', '2020-09-01 08:38:39', '2020-09-01 13:20:07'),
(5, NULL, 4, '1', '1', '1', 'iugf', 'rgn', '23.013893563163254', '85.71349346874999', '2020-09-01 08:41:17', '2020-09-01 13:20:49'),
(6, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-01 08:43:50', '2020-09-01 08:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `for` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `user_id`, `type`, `name`, `for`, `banner`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'PG', 'Ramacheri', 'girls', '/images/building/5kzygAQCyFRX.jpg', 'pending', '2020-09-01 07:31:04', '2020-09-01 07:31:04'),
(2, 1, 'PG', 'Sarovar', 'boys', '/images/building/8WtYJWanGQ9n.jpg', 'pending', '2020-09-01 08:32:35', '2020-09-01 08:32:35'),
(3, 1, 'pg', 'Sanjivni', 'family', '/images/building/nSvnBUWSIh1b.jpg', 'pending', '2020-09-01 08:38:39', '2020-09-01 13:20:18'),
(4, 1, 'Hostel', 'Chamani', 'common', '/images/building/W1nUntshPMPj.jpg', 'pending', '2020-09-01 08:41:17', '2020-09-01 08:41:17'),
(5, 1, 'Hostel', 'Shanti Niketan', 'boys', '/images/building/nKFQ3ST1x3qt.jpg', 'pending', '2020-09-01 08:43:50', '2020-09-01 08:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, '+91', 'India', '2020-09-01 07:35:07', '2020-09-01 07:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `state_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ramgarh', '2020-09-01 07:36:01', '2020-09-01 07:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `building_id` int(11) NOT NULL,
  `bed_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cooling` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `water_purifier` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `electricity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wifi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_tv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kitchen_with_gas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parking` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `security_guard` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `water_supply` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bathroom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `washing_machine` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teresh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chair_table` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wordrobe` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gate_closing` time DEFAULT NULL,
  `gate_opening` time DEFAULT NULL,
  `furnished` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breakfast` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lunch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dinner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food_on_sunday` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `building_id`, `bed_type`, `cooling`, `water_purifier`, `electricity`, `wifi`, `cc_tv`, `kitchen_with_gas`, `parking`, `security_guard`, `water_supply`, `bathroom`, `washing_machine`, `teresh`, `metress`, `chair_table`, `wordrobe`, `gate_closing`, `gate_opening`, `furnished`, `food`, `breakfast`, `lunch`, `dinner`, `food_type`, `food_on_sunday`, `created_at`, `updated_at`) VALUES
(1, 1, 'Normal', 'Ac', 'No', '18', 'No', 'No', 'No', 'No', 'No', 'Hot', 'Common', 'No', 'No', 'No', 'No', 'No', '23:30:00', '05:32:00', 'Furnished', 'No', NULL, NULL, NULL, NULL, NULL, '2020-09-01 07:31:05', '2020-09-01 07:32:06'),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-01 08:32:35', '2020-09-01 08:32:35'),
(3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-01 08:38:39', '2020-09-01 08:38:39'),
(4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-01 08:41:17', '2020-09-01 08:41:17'),
(5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-01 08:43:50', '2020-09-01 08:43:50');

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
-- Table structure for table `gallery_rooms`
--

CREATE TABLE `gallery_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(27, '2014_10_12_000000_create_users_table', 1),
(28, '2014_10_12_100000_create_password_resets_table', 1),
(29, '2019_08_19_000000_create_failed_jobs_table', 1),
(30, '2020_08_15_073757_create_buildings_table', 1),
(31, '2020_08_24_170023_create_rooms_table', 1),
(32, '2020_08_24_171028_create_gallery_rooms_table', 1),
(33, '2020_08_25_081934_create_facilities_table', 1),
(34, '2020_08_28_171030_create_nearbyplaces_table', 1),
(35, '2020_08_29_123735_create_addresses_table', 1),
(36, '2020_08_30_083232_create_countries_table', 1),
(37, '2020_08_30_084716_create_states_table', 1),
(38, '2020_08_30_084734_create_districts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nearbyplaces`
--

CREATE TABLE `nearbyplaces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `building_id` int(11) NOT NULL,
  `place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distance` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nearbyplaces`
--

INSERT INTO `nearbyplaces` (`id`, `building_id`, `place`, `name`, `photo`, `video`, `distance`, `created_at`, `updated_at`) VALUES
(1, 1, 'Company', 'Temple', '/images/nearbyplaces/xPyi7ACTGOey.jpg', '', 2, '2020-09-01 07:32:52', '2020-09-01 07:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `building_id` int(11) NOT NULL,
  `room_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available` int(11) NOT NULL,
  `bed` int(11) NOT NULL,
  `renter` int(11) NOT NULL,
  `max_rent` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `building_id`, `room_no`, `photo`, `video`, `available`, `bed`, `renter`, `max_rent`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '/images/room/hP8bOafTTx8X.jpg', NULL, 2, 5, 5, 0, '2020-09-01 07:33:39', '2020-09-01 07:33:39'),
(2, 1, '2', '/images/room/hsPYy37wJbyx.jpg', NULL, 2, 3, 6, 0, '2020-09-01 09:10:28', '2020-09-01 09:10:28'),
(3, 2, '1', '/images/room/60u7YPXwqjHE.jpg', NULL, 2, 2, 2, 0, '2020-09-01 09:15:55', '2020-09-01 09:15:55'),
(4, 3, '1', '/images/room/uDndRoqST3Ed.jpg', NULL, 2, 2, 4, 0, '2020-09-01 09:16:34', '2020-09-01 09:16:34'),
(5, 5, '2', '/images/room/v786aQFf8z24.jpg', NULL, 4, 4, 4, 0, '2020-09-01 09:17:35', '2020-09-01 09:17:35'),
(6, 1, '3', '/images/room/Qcx1Z6Cso9AP.jpg', NULL, 2, 3, 5, 0, '2020-09-01 09:18:44', '2020-09-01 09:18:44'),
(7, 4, '5', '/images/room/qCEOR08G2IJI.jpg', NULL, 2, 2, 4, 0, '2020-09-01 09:20:29', '2020-09-01 09:20:29'),
(8, 5, '5', '/images/room/p4yLbBr3jKF9.jpg', '', 5, 5, 5, 1000, '2020-09-01 10:22:09', '2020-09-01 10:23:14');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Jharkhand', '2020-09-01 07:35:32', '2020-09-01 07:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `number`, `role`, `photo`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Owner', 'owner@gmail.com', NULL, '$2y$10$zQwEXmsek.zuT.zj9NEbOuOhB0rgTI.s3hwPwjm3SH7Ej4QhVEmfW', '9162035975', 'owner', '', 'active', NULL, '2020-09-01 07:26:31', '2020-09-01 07:26:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_rooms`
--
ALTER TABLE `gallery_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nearbyplaces`
--
ALTER TABLE `nearbyplaces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_rooms`
--
ALTER TABLE `gallery_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `nearbyplaces`
--
ALTER TABLE `nearbyplaces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
