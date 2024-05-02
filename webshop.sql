-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 12:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `beszerzes`
--

CREATE TABLE `beszerzes` (
  `Termek` bigint(20) UNSIGNED NOT NULL,
  `mikor` date NOT NULL,
  `mennyi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `csomags`
--

CREATE TABLE `csomags` (
  `csomag` bigint(20) UNSIGNED NOT NULL,
  `atadva` date DEFAULT NULL,
  `allapot` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `csomags`
--

INSERT INTO `csomags` (`csomag`, `atadva`, `allapot`, `created_at`, `updated_at`) VALUES
(1, NULL, 0, '2024-04-24 19:27:40', '2024-04-24 19:27:40');

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
-- Table structure for table `kategorias`
--

CREATE TABLE `kategorias` (
  `kat_id` bigint(20) UNSIGNED NOT NULL,
  `elnevezes` varchar(255) NOT NULL,
  `Fokategoria` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategorias`
--

INSERT INTO `kategorias` (`kat_id`, `elnevezes`, `Fokategoria`, `created_at`, `updated_at`) VALUES
(1, 'Háttértár', NULL, '2024-04-24 19:27:40', '2024-04-24 19:27:40'),
(2, 'HDD', 1, '2024-04-24 19:27:40', '2024-04-24 19:27:40'),
(3, 'SSD', 1, '2024-04-24 19:27:40', '2024-04-24 19:27:40'),
(4, 'Pendrive', 1, '2024-04-24 19:27:40', '2024-04-24 19:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `kosar2s`
--

CREATE TABLE `kosar2s` (
  `kosar_id` bigint(20) UNSIGNED NOT NULL,
  `Termek` bigint(20) UNSIGNED NOT NULL,
  `menny` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kosars`
--

CREATE TABLE `kosars` (
  `kosar_id` bigint(20) UNSIGNED NOT NULL,
  `vasarlo` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_27_081058_create_kategorias_table', 1),
(6, '2024_02_27_081348_create_tulajdonsags_table', 1),
(7, '2024_02_27_082036_create_termeks_table', 1),
(8, '2024_02_27_082318_create_termek_jellemzos_table', 1),
(9, '2024_02_27_082819_create_beszerzes_table', 1),
(10, '2024_02_27_083808_create_csomags_table', 1),
(11, '2024_02_27_083809_create_rendeles_table', 1),
(12, '2024_02_27_084017_create_rend_tetels_table', 1),
(13, '2024_02_27_085624_create_kosars_table', 1),
(14, '2024_02_27_085937_create_kosar2s_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
-- Table structure for table `rendeles`
--

CREATE TABLE `rendeles` (
  `rend_szam` bigint(20) UNSIGNED NOT NULL,
  `kelt` date NOT NULL,
  `vasarlo` bigint(20) UNSIGNED NOT NULL,
  `csomag` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rendeles`
--

INSERT INTO `rendeles` (`rend_szam`, `kelt`, `vasarlo`, `csomag`, `created_at`, `updated_at`) VALUES
(1, '2024-01-01', 3, 1, '2024-04-24 19:27:40', '2024-04-24 19:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `rend_tetels`
--

CREATE TABLE `rend_tetels` (
  `rend_szam` bigint(20) UNSIGNED NOT NULL,
  `Termek` bigint(20) UNSIGNED NOT NULL,
  `menny` int(11) NOT NULL,
  `ar` int(11) NOT NULL,
  `allapot` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rend_tetels`
--

INSERT INTO `rend_tetels` (`rend_szam`, `Termek`, `menny`, `ar`, `allapot`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2500, 0, NULL, NULL),
(1, 2, 2, 2000, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `termeks`
--

CREATE TABLE `termeks` (
  `ter_id` bigint(20) UNSIGNED NOT NULL,
  `elnevezes` varchar(255) DEFAULT NULL,
  `Alkategoria` bigint(20) UNSIGNED NOT NULL,
  `marka` varchar(255) NOT NULL,
  `keszlet` int(11) NOT NULL,
  `eladasi_ar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `termeks`
--

INSERT INTO `termeks` (`ter_id`, `elnevezes`, `Alkategoria`, `marka`, `keszlet`, `eladasi_ar`, `created_at`, `updated_at`) VALUES
(1, 'Predator', 2, 'Acer', 2, 2500, '2024-04-24 19:27:40', '2024-05-02 08:34:01'),
(2, 'IronKey ', 3, 'Kingston', 50, 2000, '2024-04-24 19:27:40', '2024-04-24 19:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `termek_jellemzos`
--

CREATE TABLE `termek_jellemzos` (
  `Termek` bigint(20) UNSIGNED NOT NULL,
  `Tulajdonsag` bigint(20) UNSIGNED NOT NULL,
  `ertek` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `termek_jellemzos`
--

INSERT INTO `termek_jellemzos` (`Termek`, `Tulajdonsag`, `ertek`, `created_at`, `updated_at`) VALUES
(1, 1, '200', '2024-04-24 19:27:40', '2024-04-24 19:27:40'),
(1, 2, '500', '2024-04-24 19:45:32', '2024-04-24 19:45:32'),
(2, 1, '120', '2024-04-24 19:27:40', '2024-04-24 19:27:40'),
(2, 2, '16', '2024-04-24 19:27:40', '2024-04-24 19:27:40'),
(2, 3, '6000000000', '2024-04-24 19:47:42', '2024-04-24 19:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `tulajdonsags`
--

CREATE TABLE `tulajdonsags` (
  `tul_id` bigint(20) UNSIGNED NOT NULL,
  `elnevezes` varchar(255) NOT NULL,
  `mertekegyseg` varchar(255) NOT NULL,
  `Fokategoria` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tulajdonsags`
--

INSERT INTO `tulajdonsags` (`tul_id`, `elnevezes`, `mertekegyseg`, `Fokategoria`, `created_at`, `updated_at`) VALUES
(1, 'írási sebesség', 'mb/s', 1, '2024-04-24 19:27:40', '2024-04-24 19:27:40'),
(2, 'tárhely ', 'GB', 1, '2024-04-24 19:27:40', '2024-04-24 19:27:40'),
(3, 'írási sebesség', 'mb/s', 1, '2024-04-24 19:27:40', '2024-04-24 19:27:40');

--
-- Triggers `tulajdonsags`
--
DELIMITER $$
CREATE TRIGGER `check_fokatagoria_insert` BEFORE INSERT ON `tulajdonsags` FOR EACH ROW BEGIN
            DECLARE fokatagoria_count INT;
            SELECT COUNT(*) INTO fokatagoria_count FROM kategorias WHERE kat_id = NEW.Fokategoria AND Fokategoria IS NULL;
            IF fokatagoria_count = 0 THEN
                SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Invalid Fokatagoria value';
            END IF;
        END
$$
DELIMITER ;

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
  `api_token` varchar(60) DEFAULT NULL,
  `lastLogin` date NOT NULL DEFAULT '2024-01-01',
  `permission` tinyint(4) NOT NULL DEFAULT 2,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `api_token`, `lastLogin`, `permission`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$12$9GnnlSsI3v8kvwdUdPuGUeyd8xY2ewGodj2fc2XdDFQwJc5aeFnby', NULL, '2024-01-01', 0, NULL, '2024-04-24 19:27:39', '2024-04-24 19:27:39'),
(2, 'manager', 'manager@manager.com', NULL, '$2y$12$CGxftf0vLSAWRJcD8yPrEuC9fi.fQ/PRCq70nM.KMcV0Vsv/dPRRy', NULL, '2024-01-01', 1, NULL, '2024-04-24 19:27:39', '2024-04-24 19:27:39'),
(3, 'user', 'user@user.com', NULL, '$2y$12$gQ6tI6bT2eBTc4YpyjJq5eTYYEi2LcYssZBoLjlU6PTiTvozuiFOS', NULL, '2024-01-01', 2, NULL, '2024-04-24 19:27:40', '2024-05-02 08:32:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beszerzes`
--
ALTER TABLE `beszerzes`
  ADD PRIMARY KEY (`Termek`,`mikor`);

--
-- Indexes for table `csomags`
--
ALTER TABLE `csomags`
  ADD PRIMARY KEY (`csomag`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategorias`
--
ALTER TABLE `kategorias`
  ADD PRIMARY KEY (`kat_id`);

--
-- Indexes for table `kosar2s`
--
ALTER TABLE `kosar2s`
  ADD PRIMARY KEY (`kosar_id`,`Termek`),
  ADD KEY `kosar2s_termek_foreign` (`Termek`);

--
-- Indexes for table `kosars`
--
ALTER TABLE `kosars`
  ADD PRIMARY KEY (`kosar_id`),
  ADD KEY `kosars_vasarlo_foreign` (`vasarlo`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rendeles`
--
ALTER TABLE `rendeles`
  ADD PRIMARY KEY (`rend_szam`),
  ADD KEY `rendeles_vasarlo_foreign` (`vasarlo`),
  ADD KEY `rendeles_csomag_foreign` (`csomag`);

--
-- Indexes for table `rend_tetels`
--
ALTER TABLE `rend_tetels`
  ADD PRIMARY KEY (`rend_szam`,`Termek`),
  ADD KEY `rend_tetels_termek_foreign` (`Termek`);

--
-- Indexes for table `termeks`
--
ALTER TABLE `termeks`
  ADD PRIMARY KEY (`ter_id`),
  ADD KEY `termeks_alkategoria_foreign` (`Alkategoria`);

--
-- Indexes for table `termek_jellemzos`
--
ALTER TABLE `termek_jellemzos`
  ADD PRIMARY KEY (`Termek`,`Tulajdonsag`),
  ADD KEY `termek_jellemzos_tulajdonsag_foreign` (`Tulajdonsag`);

--
-- Indexes for table `tulajdonsags`
--
ALTER TABLE `tulajdonsags`
  ADD PRIMARY KEY (`tul_id`),
  ADD KEY `tulajdonsags_fokategoria_foreign` (`Fokategoria`);

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
-- AUTO_INCREMENT for table `csomags`
--
ALTER TABLE `csomags`
  MODIFY `csomag` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategorias`
--
ALTER TABLE `kategorias`
  MODIFY `kat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kosars`
--
ALTER TABLE `kosars`
  MODIFY `kosar_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rendeles`
--
ALTER TABLE `rendeles`
  MODIFY `rend_szam` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `termeks`
--
ALTER TABLE `termeks`
  MODIFY `ter_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tulajdonsags`
--
ALTER TABLE `tulajdonsags`
  MODIFY `tul_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beszerzes`
--
ALTER TABLE `beszerzes`
  ADD CONSTRAINT `beszerzes_termek_foreign` FOREIGN KEY (`Termek`) REFERENCES `termeks` (`ter_id`);

--
-- Constraints for table `kosar2s`
--
ALTER TABLE `kosar2s`
  ADD CONSTRAINT `kosar2s_kosar_id_foreign` FOREIGN KEY (`kosar_id`) REFERENCES `kosars` (`kosar_id`),
  ADD CONSTRAINT `kosar2s_termek_foreign` FOREIGN KEY (`Termek`) REFERENCES `termeks` (`ter_id`);

--
-- Constraints for table `kosars`
--
ALTER TABLE `kosars`
  ADD CONSTRAINT `kosars_vasarlo_foreign` FOREIGN KEY (`vasarlo`) REFERENCES `users` (`id`);

--
-- Constraints for table `rendeles`
--
ALTER TABLE `rendeles`
  ADD CONSTRAINT `rendeles_csomag_foreign` FOREIGN KEY (`csomag`) REFERENCES `csomags` (`csomag`),
  ADD CONSTRAINT `rendeles_vasarlo_foreign` FOREIGN KEY (`vasarlo`) REFERENCES `users` (`id`);

--
-- Constraints for table `rend_tetels`
--
ALTER TABLE `rend_tetels`
  ADD CONSTRAINT `rend_tetels_rend_szam_foreign` FOREIGN KEY (`rend_szam`) REFERENCES `rendeles` (`rend_szam`),
  ADD CONSTRAINT `rend_tetels_termek_foreign` FOREIGN KEY (`Termek`) REFERENCES `termeks` (`ter_id`);

--
-- Constraints for table `termeks`
--
ALTER TABLE `termeks`
  ADD CONSTRAINT `termeks_alkategoria_foreign` FOREIGN KEY (`Alkategoria`) REFERENCES `kategorias` (`kat_id`);

--
-- Constraints for table `termek_jellemzos`
--
ALTER TABLE `termek_jellemzos`
  ADD CONSTRAINT `termek_jellemzos_termek_foreign` FOREIGN KEY (`Termek`) REFERENCES `termeks` (`ter_id`),
  ADD CONSTRAINT `termek_jellemzos_tulajdonsag_foreign` FOREIGN KEY (`Tulajdonsag`) REFERENCES `tulajdonsags` (`tul_id`);

--
-- Constraints for table `tulajdonsags`
--
ALTER TABLE `tulajdonsags`
  ADD CONSTRAINT `tulajdonsags_fokategoria_foreign` FOREIGN KEY (`Fokategoria`) REFERENCES `kategorias` (`kat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
