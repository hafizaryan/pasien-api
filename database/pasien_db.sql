-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 27, 2025 at 08:26 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pasien_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_06_27_013640_create_patients_table', 1),
(2, '2025_06_27_021656_create_sessions_table', 1),
(3, '2025_06_27_044120_create_personal_access_tokens_table', 2),
(4, '2025_06_27_044541_create_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `nik`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(6, 'Ahmad Santoso', '3273010101010001', 'Jl. Merdeka No. 10, Jakarta', '0812345678901', '2025-06-27 00:23:30', '2025-06-27 00:23:30'),
(7, 'Budi Setiawan', '3374020202020002', 'Jl. Sudirman No. 45, Surabaya', '0823456789012', '2025-06-27 00:26:59', '2025-06-27 00:26:59'),
(8, 'Citra Lestari', '3475030303030003', 'Jl. Gatot Subroto No. 12, Bandung', '0834567890123', '2025-06-27 00:27:22', '2025-06-27 00:27:22'),
(9, 'Dewi Anggraeni', '3576040404040004', 'Jl. Pahlawan No. 8, Yogyakarta', '0845678901234', '2025-06-27 00:27:28', '2025-06-27 00:27:28'),
(10, 'Citra Lestari', '3475030303030003', 'Jl. Gatot Subroto No. 12, Bandung', '083456789012', '2025-06-27 00:28:53', '2025-06-27 00:28:53'),
(11, 'Eko Prasetyo', '3677050505050005', 'Jl. Diponegoro No. 33, Semarang', '085678901234', '2025-06-27 00:29:00', '2025-06-27 00:29:00'),
(12, 'Fitriani Wulandari', '3378060606060006', 'Jl. Ahmad Yani No. 17, Malang', '086789012345', '2025-06-27 00:29:05', '2025-06-27 00:29:05'),
(13, 'Gunawan Susilo', '3479070707070007', 'Jl. S. Parman No. 22, Medan', '087890123456', '2025-06-27 00:29:08', '2025-06-27 00:29:08'),
(14, 'Hana Putri', '3580080808080008', 'Jl. Thamrin No. 5, Makassar', '088901234567', '2025-06-27 00:29:11', '2025-06-27 00:29:11'),
(15, 'Irfan Maulana', '3681090909090009', 'Jl. Gajah Mada No. 9, Denpasar', '089012345678', '2025-06-27 00:29:15', '2025-06-27 00:29:15'),
(16, 'Jihan Ayu', '3272101010100010', 'Jl. Hayam Wuruk No. 11, Bogor', '081123456789', '2025-06-27 00:29:18', '2025-06-27 00:29:18'),
(17, 'Kurniawan Adi', '3373111111110011', 'Jl. Juanda No. 14, Palembang', '082234567890', '2025-06-27 00:29:21', '2025-06-27 00:29:21'),
(18, 'Lina Marlina', '3474121212120012', 'Jl. Teuku Umar No. 20, Padang', '083345678901', '2025-06-27 00:29:25', '2025-06-27 00:29:25'),
(19, 'Mulyadi Saputra', '3575131313130013', 'Jl. Imam Bonjol No. 7, Pekanbaru', '084456789012', '2025-06-27 00:29:28', '2025-06-27 00:29:28'),
(20, 'Nurhayati Sari', '3676141414140014', 'Jl. Urip Sumoharjo No. 3, Balikpapan', '085567890123', '2025-06-27 00:29:32', '2025-06-27 00:29:32'),
(21, 'Oki Pratama', '3277151515150015', 'Jl. Sisingamangaraja No. 25, Bandar Lampung', '086678901234', '2025-06-27 00:29:36', '2025-06-27 00:29:36'),
(22, 'Putri Wulandari', '3378161616160016', 'Jl. Cendana No. 9, Samarinda', '087789012345', '2025-06-27 00:29:40', '2025-06-27 00:29:40'),
(23, 'Putri Wulandari', '3378161616160016', 'Jl. Cendana No. 9, Samarinda', '087789012345', '2025-06-27 00:29:44', '2025-06-27 00:29:44'),
(24, 'Siti Rahayu', '3580181818180018', 'Jl. Sultan Hasanuddin No. 30, Manado', '089901234567', '2025-06-27 00:29:48', '2025-06-27 00:29:48'),
(25, 'Rudi Hartono', '3479171717170017', 'Jl. Kartini No. 18, Banjarmasin', '088890123456', '2025-06-27 00:29:50', '2025-06-27 00:29:50'),
(26, 'Teguh Wijaya', '3681191919190019', 'Jl. Pattimura No. 12, Ambon', '081012345678', '2025-06-27 00:29:53', '2025-06-27 00:29:53'),
(27, 'Umi Kalsum', '3272202020200020', 'Jl. Raya Bogor No. 50, Depok', '082123456789', '2025-06-27 00:30:00', '2025-06-27 00:30:00'),
(32, 'Agus Supriyanto', '3275012301980001', 'Jl. Mangga No. 5, Jakarta Selatan', '081298745632', '2025-06-27 00:51:46', '2025-06-27 00:51:46'),
(35, 'Dian Permata Sari', '3376123402890002', 'Jl. Anggrek No. 12, Surabaya', '082387654321', '2025-06-27 00:53:08', '2025-06-27 00:53:08'),
(36, 'Fajar Nugroho', '3477234503700003', 'Jl. Melati No. 8, Bandung', '083476543219', '2025-06-27 00:53:30', '2025-06-27 00:53:30'),
(37, 'Rina Wijaya', '3578345604610004', 'Jl. Kenanga No. 15, Yogyakarta', '084565432198', '2025-06-27 00:53:34', '2025-06-27 00:53:34'),
(38, 'Rina Wijaya', '3578345604610004', 'Jl. Kenanga No. 15, Yogyakarta', '084565432198', '2025-06-27 00:53:37', '2025-06-27 00:53:37'),
(39, 'Hendra Kurniawan', '3679456705520005', 'Jl. Flamboyan No. 3, Semarang', '085654321987', '2025-06-27 00:53:40', '2025-06-27 00:53:40'),
(40, 'Siska Dewi', '3370567806430006', 'Jl. Teratai No. 7, Malang', '086743219876', '2025-06-27 00:53:43', '2025-06-27 00:53:43'),
(41, 'Adi Pratama', '3471678907340007', 'Jl. Cempaka No. 9, Medan', '087832198765', '2025-06-27 00:53:46', '2025-06-27 00:53:46'),
(42, 'Linda Suryani', '3572789018250008', 'Jl. Mawar No. 11, Makassar', '088921876543', '2025-06-27 00:53:50', '2025-06-27 00:53:50'),
(43, 'Maya Indah Lestari', '3274901230070010', 'Jl. Sakura No. 6, Bogor', '081109876543', '2025-06-27 00:53:53', '2025-06-27 00:54:42'),
(44, 'Hafiz Aryan Siregar', '1221070612020001', 'Jalan Bangau Sakti Kota Pekanbaru', '085156839681', '2025-06-27 01:14:40', '2025-06-27 01:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'auth_token', '3f12921af40d4b64111e478a3d4e18f8fafab1069805bb301d8758d99ad9e2bd', '[\"*\"]', NULL, NULL, '2025-06-26 21:46:32', '2025-06-26 21:46:32'),
(2, 'App\\Models\\User', 1, 'auth_token', '9fe8e64a00d40ed53d72bf60599c2440ff00771317c8f1f5edf7f95871332300', '[\"*\"]', NULL, NULL, '2025-06-26 21:46:41', '2025-06-26 21:46:41'),
(3, 'App\\Models\\User', 2, 'auth_token', 'bdd272c0427d353affbc403665cfeb8935c3875a0dfe32945a1331f80dd34eba', '[\"*\"]', NULL, NULL, '2025-06-26 21:47:35', '2025-06-26 21:47:35'),
(5, 'App\\Models\\User', 2, 'auth_token', 'defc676bcb1486b82e3620b038f1327c53e2f82863181be70d8b4939dd59af79', '[\"*\"]', NULL, NULL, '2025-06-26 21:47:42', '2025-06-26 21:47:42'),
(7, 'App\\Models\\User', 3, 'auth_token', 'd14ce7d9d6b5398ca74cd3538a9cc1753f483b1aa50b4dc0bcaf26f297298836', '[\"*\"]', NULL, NULL, '2025-06-26 21:58:30', '2025-06-26 21:58:30'),
(8, 'App\\Models\\User', 3, 'auth_token', '26dd79a49ba836b03c2eeb27f10632d8b031be1064f683e9debbd86e89dbc093', '[\"*\"]', NULL, NULL, '2025-06-26 21:58:43', '2025-06-26 21:58:43'),
(9, 'App\\Models\\User', 3, 'auth_token', '26e29767f31acba041e08de0a97db94480d1c068b08549f3d7979c40762ec1eb', '[\"*\"]', NULL, NULL, '2025-06-26 21:59:36', '2025-06-26 21:59:36'),
(11, 'App\\Models\\User', 2, 'auth_token', '0a57d314028876c62b1635f11d2625878bfe0f3de5224f6565cf7ddd8e054b9e', '[\"*\"]', NULL, NULL, '2025-06-26 23:01:35', '2025-06-26 23:01:35'),
(12, 'App\\Models\\User', 2, 'auth_token', 'efdf718202aa3b84d57e522eb708fea1b55937bb45e4a2fe8cd3df3abceae602', '[\"*\"]', NULL, NULL, '2025-06-26 23:01:36', '2025-06-26 23:01:36'),
(13, 'App\\Models\\User', 2, 'auth_token', '0b13804184b73e642cf66455b7aac7f2c2c824b7ee0a41993af93fb4fd333bf4', '[\"*\"]', NULL, NULL, '2025-06-26 23:01:37', '2025-06-26 23:01:37'),
(14, 'App\\Models\\User', 2, 'auth_token', 'c66382b1e37b542b6380e3a6125dbe852f760455aa0c292f84057a6fd7e4babe', '[\"*\"]', NULL, NULL, '2025-06-26 23:01:57', '2025-06-26 23:01:57'),
(15, 'App\\Models\\User', 2, 'auth_token', 'e13a6baa5e2a56fff1e6a6d27eb1951ee83f2476772d48ff01ba2710a94e7b20', '[\"*\"]', NULL, NULL, '2025-06-26 23:23:08', '2025-06-26 23:23:08'),
(16, 'App\\Models\\User', 2, 'auth_token', 'bb58166d437e7dec615cdc42507558090b2d473b64239b32730234a0321537d4', '[\"*\"]', NULL, NULL, '2025-06-26 23:24:14', '2025-06-26 23:24:14'),
(17, 'App\\Models\\User', 2, 'auth_token', '9c1b881bf9a49786ddc9b3c0802118db9f27f33a129e49dcbcf8a7bd2f35a83b', '[\"*\"]', NULL, NULL, '2025-06-26 23:24:18', '2025-06-26 23:24:18'),
(18, 'App\\Models\\User', 2, 'auth_token', 'c75c2234991ba833c68279a6123bac41eb9ac2be99e85af0f4a862d4e2dc572a', '[\"*\"]', NULL, NULL, '2025-06-26 23:26:11', '2025-06-26 23:26:11'),
(19, 'App\\Models\\User', 3, 'auth_token', 'eba3b57f9049f80d96f7411eeb9529acf124e1bdc11e1f08f328b45877aa416d', '[\"*\"]', NULL, NULL, '2025-06-26 23:28:56', '2025-06-26 23:28:56'),
(20, 'App\\Models\\User', 3, 'auth_token', '1706abc65035c87c1d0b7ba0166e1fed26f97cf3f36c1643b966978940dae247', '[\"*\"]', NULL, NULL, '2025-06-26 23:29:22', '2025-06-26 23:29:22'),
(21, 'App\\Models\\User', 3, 'auth_token', '5dc1938e5ab3cb651a94fbb6e6473b0a19af31fbf0eeb3a0c6f51977063ae93b', '[\"*\"]', NULL, NULL, '2025-06-26 23:31:19', '2025-06-26 23:31:19'),
(22, 'App\\Models\\User', 3, 'auth_token', '7f0d3aa5a6fa7136163cd0f2fca28f0719a8b6e21a756c6da11c05747992e566', '[\"*\"]', NULL, NULL, '2025-06-26 23:31:42', '2025-06-26 23:31:42'),
(23, 'App\\Models\\User', 3, 'auth_token', '57a7ef54b519649bfa4ebdef7f1cd1fca2571bdec00fe781e849e352c5ee38c6', '[\"*\"]', NULL, NULL, '2025-06-26 23:32:55', '2025-06-26 23:32:55'),
(24, 'App\\Models\\User', 3, 'auth_token', '01524e775137fcd5e9dcb11e2ca42c89615ff57558fcdbd3a9660a3417cd4a2e', '[\"*\"]', NULL, NULL, '2025-06-26 23:37:21', '2025-06-26 23:37:21'),
(25, 'App\\Models\\User', 3, 'auth_token', '4de177e919750c0df9620c99849e113e0349b242006d808081dd154b1405bcb7', '[\"*\"]', NULL, NULL, '2025-06-26 23:39:56', '2025-06-26 23:39:56'),
(26, 'App\\Models\\User', 3, 'auth_token', '4340b4d73fb15fde39fb71f7ddcd01f7436a9fad7c92fa8e02e9521951e71ad6', '[\"*\"]', NULL, NULL, '2025-06-26 23:41:02', '2025-06-26 23:41:02'),
(27, 'App\\Models\\User', 3, 'auth_token', '542acc8b0bf3913789a24e1f31b99b90aaeee1e16917664ff37c5db12a0b4ba2', '[\"*\"]', NULL, NULL, '2025-06-26 23:41:22', '2025-06-26 23:41:22'),
(28, 'App\\Models\\User', 3, 'auth_token', 'b867669a9615ac8d893587d2189abd01187b05e22806f35dc4db0927620e2f83', '[\"*\"]', NULL, NULL, '2025-06-26 23:42:17', '2025-06-26 23:42:17'),
(29, 'App\\Models\\User', 3, 'auth_token', '55d5c0bfa96fa7eba0d66b0f9fc833b98cde422a34278f4b507d0cc6adb0dcd7', '[\"*\"]', NULL, NULL, '2025-06-26 23:45:22', '2025-06-26 23:45:22'),
(30, 'App\\Models\\User', 3, 'auth_token', '9f5a8729146a1b90338ddcf44490b5123d3ed7969526ccd8e707e1081d4d238d', '[\"*\"]', NULL, NULL, '2025-06-26 23:46:14', '2025-06-26 23:46:14'),
(31, 'App\\Models\\User', 3, 'auth_token', '8052cac73ef225ec26c1e0e8c258b3ddf6bc104a07e9a1dd585e41fe9945c054', '[\"*\"]', NULL, NULL, '2025-06-26 23:48:17', '2025-06-26 23:48:17'),
(32, 'App\\Models\\User', 3, 'auth_token', '26504d262561c2b65d2f16350f4bd94c454dec842231b7fd056fc1eb8d1e30d0', '[\"*\"]', NULL, NULL, '2025-06-26 23:49:44', '2025-06-26 23:49:44'),
(33, 'App\\Models\\User', 3, 'auth_token', 'd1b962a889788f94d1844dbb80014a3ff2e3056e9e17cd762bde9022ba7ece01', '[\"*\"]', NULL, NULL, '2025-06-26 23:50:00', '2025-06-26 23:50:00'),
(34, 'App\\Models\\User', 3, 'auth_token', 'fd0c5bd8c82825ad85ddb2103b44250b85662aab72d41da8febf7692a9ce21bf', '[\"*\"]', NULL, NULL, '2025-06-26 23:53:30', '2025-06-26 23:53:30'),
(35, 'App\\Models\\User', 3, 'auth_token', 'df42c28cc5ca4563543e7f8b21bcb67cc8b4b33e06dd564b238cc1e19f5ffcaa', '[\"*\"]', NULL, NULL, '2025-06-26 23:54:29', '2025-06-26 23:54:29'),
(36, 'App\\Models\\User', 3, 'auth_token', 'd22c7004b2dd6c382f281ecb00f59c3ceeb38d2cc66d8025095d79c643efd991', '[\"*\"]', NULL, NULL, '2025-06-26 23:59:07', '2025-06-26 23:59:07'),
(37, 'App\\Models\\User', 3, 'auth_token', '5e0a6b39295987f5b5a3605de11bafb51aecab426ce1965054f4011f44339a2c', '[\"*\"]', NULL, NULL, '2025-06-27 00:03:47', '2025-06-27 00:03:47'),
(38, 'App\\Models\\User', 3, 'auth_token', '5b3d659bd38706bf2dffa53e897f11ebcc164ec5f3dc6cc027998be4cbb16ab6', '[\"*\"]', NULL, NULL, '2025-06-27 00:04:54', '2025-06-27 00:04:54'),
(39, 'App\\Models\\User', 3, 'auth_token', '5a6cf057e33d91d01acc4951da4f6b8042cdf09b48558f473877cc08f76d9e74', '[\"*\"]', NULL, NULL, '2025-06-27 00:05:15', '2025-06-27 00:05:15'),
(40, 'App\\Models\\User', 3, 'auth_token', 'f7106eb6220d2d837fd02ee31785a8b0a5017e8ff6620a778f32e762a1abb5e1', '[\"*\"]', NULL, NULL, '2025-06-27 00:05:29', '2025-06-27 00:05:29'),
(41, 'App\\Models\\User', 3, 'auth_token', 'd2f4ae134c8437ef1af619e2d03be4950b797eb402ecb9be2ec605b08b6a3831', '[\"*\"]', NULL, NULL, '2025-06-27 00:11:25', '2025-06-27 00:11:25'),
(52, 'App\\Models\\User', 4, 'auth_token', '35ae21b342cf7833a389a777f2f8cdae2aca3d1d474b208801854fff38a3d0e6', '[\"*\"]', NULL, NULL, '2025-06-27 00:40:01', '2025-06-27 00:40:01');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('FiwfeVectmU6n43FCg69POey2m33lhklyM79tP5j', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVjdsT01DbUhzbXppVEw1RXhMc29aMUk0RTczbDloQUxXcW9LUXo2ZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751012506);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', NULL, '$2y$12$ztEyCJ1Dap5785uFerfLLOkHtwdt.i.qQ/ca2jrfM5rhO85H5n/cW', NULL, '2025-06-26 21:46:32', '2025-06-26 21:46:32'),
(2, 'John Doe', 'john@example.com', NULL, '$2y$12$19hQmmzYaBe3HvrHtyaQg.Qs8ko6a1aAYvTXXfPpAgIbYjgEACQgS', NULL, '2025-06-26 21:47:35', '2025-06-26 21:47:35'),
(3, 'Hafiz Aryan Siregar', 'hafizaryansiregar@gmail.com', NULL, '$2y$12$2JNR9OE2W7AjMI18UlnldehHywCS8hSD98vzwwdJ7.ORIodXVILQC', NULL, '2025-06-26 21:58:30', '2025-06-26 21:58:30'),
(4, 'Admin Rumah Sakit Syafira', 'admin@gmail.com', NULL, '$2y$12$Tcz5WCey9A7C1XX3fQEArO7eCLfdkXpYixhxpMHOyuR/c69laZUhe', NULL, '2025-06-27 00:40:01', '2025-06-27 00:40:01');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
