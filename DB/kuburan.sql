-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table kuburan.kenal
DROP TABLE IF EXISTS `kenal`;
CREATE TABLE IF NOT EXISTS `kenal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_jenazah` varchar(50) DEFAULT NULL,
  `kelamin` enum('laki-laki','wanita') DEFAULT NULL,
  `alamat_temu` varchar(50) DEFAULT NULL,
  `tanggal_temu` date DEFAULT NULL,
  `desa_temu` varchar(50) DEFAULT NULL,
  `kabupaten_temu` varchar(50) DEFAULT NULL,
  `provinsi_temu` varchar(50) DEFAULT NULL,
  `negara_temu` varchar(50) DEFAULT NULL,
  `rt_temu` int DEFAULT NULL,
  `rw_temu` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table kuburan.kenal: ~2 rows (approximately)
REPLACE INTO `kenal` (`id`, `nama_jenazah`, `kelamin`, `alamat_temu`, `tanggal_temu`, `desa_temu`, `kabupaten_temu`, `provinsi_temu`, `negara_temu`, `rt_temu`, `rw_temu`) VALUES
	(1, 'aldi', 'laki-laki', 'Jln. Pramuka simpang pramuka 2', '2023-02-06', 'sungi miyai', 'Muara teweh', 'kalsel', 'indonesia', 14, 21),
	(2, 'glora', 'laki-laki', 'Jln. Pramuka simpang pramuka 2', '2023-02-07', 'banjarmasin tengah', 'barito utara', 'kalteng', 'indonesia', 11, 22);

-- Dumping structure for table kuburan.mampu
DROP TABLE IF EXISTS `mampu`;
CREATE TABLE IF NOT EXISTS `mampu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` int NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki','Perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat_ktp` varchar(50) NOT NULL,
  `alamat_now` varchar(50) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `negara` varchar(50) NOT NULL,
  `rt` int NOT NULL,
  `rw` int NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Hindu','Buhda') NOT NULL,
  `pendidikan` enum('Tidak Sekolah','Tidak lulus SD','SD','SMP','SMA','D1','D2','D3','S1','S2','S3') NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `kawin` enum('Belum Menikah','Sudah menikah') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tinggal` enum('Tetap','Kontrak') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `meninggal` date DEFAULT NULL,
  `dimakam` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table kuburan.mampu: ~5 rows (approximately)
REPLACE INTO `mampu` (`id`, `nik`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat_ktp`, `alamat_now`, `desa`, `kecamatan`, `kota`, `provinsi`, `negara`, `rt`, `rw`, `agama`, `pendidikan`, `pekerjaan`, `kawin`, `tinggal`, `meninggal`, `dimakam`) VALUES
	(1, 1111111111, 'mulyadi', 'banjarbaru', '2023-03-01', 'Perempuan', 'meksiko', 'tenggerang', 'batu raya', 'kapuas', 'kapuas timur', 'kalimantan tengah', 'indonesia', 11, 22, 'Hindu', 'SMA', 'buruh', 'Sudah menikah', 'Kontrak', NULL, NULL),
	(5, 46645645, 'Muhammad Salehin', 'banjarbaru', '2023-01-31', 'Perempuan', 'Jln. Pramuka simpang pramuka 2', 'Jln. Pramuka simpang pramuka 2', 'banjarmaisn utara', 'banjarmasin selatan', 'Muara teweh', 'kalimantan selatan', 'indonesia', 12, 31, 'Kristen', 'S2', 'petani', 'Sudah menikah', 'Kontrak', NULL, NULL),
	(6, 46645645, 'Muhammad Salehin', 'banjarbaru', '2023-01-31', 'Perempuan', 'Jln. Pramuka simpang pramuka 2', 'Jln. Pramuka simpang pramuka 2', 'banjarmaisn utara', 'banjarmasin selatan', 'Muara teweh', 'kalimantan selatan', 'indonesia', 12, 31, 'Kristen', 'S2', 'petani', 'Sudah menikah', 'Kontrak', NULL, NULL),
	(7, 46645645, 'Muhammad Salehin', 'banjarbaru', '2023-02-08', 'Laki', 'Jln. Pramuka simpang pramuka 2', 'Jln. Pramuka simpang pramuka 2', 'banjarmaisn utara', 'ads', 'Muara teweh', 'kalimantan selatan', 'indonesia', 12, 22, 'Katolik', 'D1', 'buruh', 'Sudah menikah', 'Tetap', NULL, NULL),
	(9, 890889, 'Muhammad Salehin', 'banjarbaru', '2020-12-08', 'Perempuan', 'Jln. Pramuka simpang pramuka 2', 'Jln. Pramuka simpang pramuka 2', 'banjarmaisn utara', 'banjarmasin selatan', 'Muara teweh', 'kalimantan selatan', 'indonesia', 12, 22, 'Hindu', 'S1', 'petani', 'Belum Menikah', 'Tetap', '2023-02-09', '2023-02-10');

-- Dumping structure for table kuburan.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kuburan.users: ~8 rows (approximately)
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'aldi', 'nugraha@gmail.com', NULL, '$2y$10$fCEu.k8iW3fAaAmqBjjdlO9oo2t01tUhSv85i28hyyp8247JuGhB2', NULL, '2023-02-06 06:54:01', '2023-02-07 22:43:24'),
	(3, 'susilo', 'yoko@gmail.com', NULL, '$2y$10$gZjl2gjyP4nUhoCAGIWQxuTCzr24c.hVHDwpgTq87Cq2PZop6W9nm', NULL, '2023-02-07 21:05:42', '2023-02-07 21:05:42'),
	(4, 'yudha', 'yudha@gmail.com', NULL, '$2y$10$1yHfjyXLmGo5GuXoPlvgrecthp.GQCP45mEKMBdOuvSTZj044unaK', NULL, '2023-02-07 21:32:17', '2023-02-07 21:32:17'),
	(10, 'ronal', 'ronal@gmail.com', NULL, '$2y$10$/IW1nVaRk.GrJ7H9qGfIg.ldhI36ZJCZhYPxRwj6.ngrkqkmGXVIS', NULL, '2023-02-07 21:36:36', '2023-02-07 21:36:36'),
	(11, 'mari', 'mari@gmail.com', NULL, '$2y$10$zAgDQyniIvxpEraKCOI1BORO1aBeiy20705V1CFbIMuk25xAM8Fja', NULL, '2023-02-07 21:48:08', '2023-02-07 22:43:51'),
	(15, 'admin', 'admin@gmail.com', NULL, '$2y$10$HcvqQ5PtwhF5HjUmso78JOe/8LanBkw1of/L01uYGhW4fdUZ/4G.O', NULL, '2023-02-08 00:44:33', '2023-02-08 00:44:33'),
	(16, 'yudha', 'toke@gmail.com', NULL, '$2y$10$J22o6SZBCRnD6Q872x.87e.D7bG.GBN70RlkPAiGn.1.3bBOA6mC2', NULL, '2023-02-09 23:49:56', '2023-02-09 23:49:56'),
	(17, 'chika', 'chika@gmail.com', NULL, '$2y$10$ckycDdJyAA5fZhrW/tEnQOdq3W/1mvsuWTrjfLn/OMJTBtR6SS/tG', NULL, '2023-02-10 03:34:10', '2023-02-10 03:34:10');

-- Dumping structure for table kuburan.waris
DROP TABLE IF EXISTS `waris`;
CREATE TABLE IF NOT EXISTS `waris` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_mendiang` varchar(50) NOT NULL,
  `status_waris` enum('ayah','ibu','anak','paman','bibi') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nik_waris` int NOT NULL,
  `nama_waris` varchar(50) NOT NULL,
  `tempat_waris` varchar(50) NOT NULL,
  `tanggal_waris` date NOT NULL,
  `kelamin` enum('cwo','cwe') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `agama` enum('Islam','Kristen','Budha','Katolik','Hindu') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `negara` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `no_hp` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table kuburan.waris: ~2 rows (approximately)
REPLACE INTO `waris` (`id`, `nama_mendiang`, `status_waris`, `nik_waris`, `nama_waris`, `tempat_waris`, `tanggal_waris`, `kelamin`, `kecamatan`, `kabupaten`, `provinsi`, `agama`, `negara`, `pekerjaan`, `no_hp`) VALUES
	(1, 'hadi', 'ayah', 3123452, 'kobe', 'malang', '2023-02-06', 'cwo', 'blasda', 'usdhwq', 'asiduhqf', 'Kristen', 'andfjyqg', 'asbfqe', 203874198),
	(2, 'yoko adro', 'ayah', 23123, 'glora tantama', 'balik papan', '2023-02-23', 'cwo', 'banjarmasin selatan', 'banjarmaisn', 'kalimantan selatan', 'Katolik', 'indonesia', 'perampok', 12131131);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
