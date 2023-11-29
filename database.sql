/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE IF NOT EXISTS `fasilitas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `fasilitas` DISABLE KEYS */;
INSERT INTO `fasilitas` (`id`, `nama`, `jumlah`, `created_at`, `updated_at`) VALUES
	(1, 'Tenda', 2, '2023-09-22 18:58:32', '2023-09-22 18:58:32');
/*!40000 ALTER TABLE `fasilitas` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `jenazah` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kawin` tinyint(1) NOT NULL,
  `kewarganegaraan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `alamat_ktp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_sekarang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_tinggal` enum('tetap','kontrak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_meninggal` date NOT NULL,
  `tanggal_makam` date NOT NULL,
  `id_pesanan` int(10) unsigned NOT NULL,
  `id_makam` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file_ktp` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `file_akta` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `file_kk` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `jenazah_id_pesanan_unique` (`id_pesanan`),
  UNIQUE KEY `jenazah_id_makam_unique` (`id_makam`),
  CONSTRAINT `jenazah_id_makam_foreign` FOREIGN KEY (`id_makam`) REFERENCES `makam` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `jenazah_id_pesanan_foreign` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `jenazah` DISABLE KEYS */;
INSERT INTO `jenazah` (`id`, `nama`, `nik`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `status_kawin`, `kewarganegaraan`, `provinsi`, `kabupaten`, `kecamatan`, `kelurahan`, `rt`, `rw`, `alamat_ktp`, `alamat_sekarang`, `status_tinggal`, `agama`, `pendidikan`, `pekerjaan`, `tanggal_meninggal`, `tanggal_makam`, `id_pesanan`, `id_makam`, `created_at`, `updated_at`, `file_ktp`, `file_akta`, `file_kk`) VALUES
	(5, 'Asep Purnama', '1234567890123456', 'Nostrud natus totam', '1986-06-11', 'laki', 0, 'Occaecat quae evenie', 'Omnis obcaecati blan', 'Libero minim ea quia', 'Dolore provident es', 'Earum eum exercitati', 81, 13, 'Ut distinctio Excep', 'Unde et enim esse a', 'tetap', 'Konghuchu', 'S2', 'Vel fugit tempore', '1980-11-14', '2001-03-18', 2, 2, '2023-09-22 20:02:44', '2023-09-22 20:09:30', 'uploads/09222023200930650df47a02cbbBalai-Kota-Banjarmasin-001.jpg', 'uploads/09222023200244650df2e4bad9b4904726.jpg', 'uploads/09222023200244650df2e4bb1a74904726.jpg');
/*!40000 ALTER TABLE `jenazah` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `jenazah_kenal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_ditemukan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_ditemukan` date NOT NULL,
  `jenis_kelamin` enum('laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `id_makam` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `jenazah_kenal_id_makam_unique` (`id_makam`),
  CONSTRAINT `jenazah_kenal_id_makam_foreign` FOREIGN KEY (`id_makam`) REFERENCES `makam` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `jenazah_kenal` DISABLE KEYS */;
/*!40000 ALTER TABLE `jenazah_kenal` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `makam` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baris` int(11) NOT NULL,
  `kolom` int(11) NOT NULL,
  `id_tpu` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `makam_id_tpu_foreign` (`id_tpu`),
  CONSTRAINT `makam_id_tpu_foreign` FOREIGN KEY (`id_tpu`) REFERENCES `tpu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `makam` DISABLE KEYS */;
INSERT INTO `makam` (`id`, `nama`, `baris`, `kolom`, `id_tpu`, `created_at`, `updated_at`) VALUES
	(1, 'A', 1, 1, 1, '2023-09-22 18:49:27', '2023-09-22 18:49:27'),
	(2, 'A', 1, 2, 1, '2023-09-22 18:49:35', '2023-09-22 18:49:35');
/*!40000 ALTER TABLE `makam` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(15, '2014_10_12_000000_create_user_table', 1),
	(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(17, '2023_07_27_163411_create_tpu_table', 1),
	(18, '2023_07_27_163708_create_makam_table', 1),
	(19, '2023_07_27_164150_create_jenazah_kenal_table', 1),
	(20, '2023_07_27_164546_create_pesanan_table', 1),
	(21, '2023_07_27_164655_create_jenazah_table', 1),
	(22, '2023_07_27_171248_create_tumpangan_table', 1),
	(23, '2023_07_27_171628_create_pembayaran_table', 1),
	(24, '2023_07_27_191838_create_pewaris_table', 1),
	(25, '2023_08_08_131425_create_pekerja_table', 1),
	(26, '2023_08_08_133614_create_pengeluaran_table', 1),
	(27, '2023_09_22_183221_create_pemeliharaan_table', 1),
	(28, '2023_09_22_183435_create_fasilitas_table', 1),
	(29, '2023_11_29_000218_create_upah_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `pekerja` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bagian` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `pekerja` DISABLE KEYS */;
INSERT INTO `pekerja` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `bagian`, `created_at`, `updated_at`) VALUES
	(1, 'Udin Gambut', 'Saepe officiis aute', '1997-06-11', 'laki', 'Modi deserunt sint', 'Voluptatem Et nihil', '2023-09-22 19:05:45', '2023-09-22 19:05:45');
/*!40000 ALTER TABLE `pekerja` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('baru','perpanjangan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `domisili` tinyint(1) NOT NULL,
  `jasa_gali` tinyint(1) NOT NULL,
  `jasa_rawat` tinyint(1) NOT NULL,
  `id_jenazah` int(10) unsigned NOT NULL,
  `id_makam` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pembayaran_id_jenazah_foreign` (`id_jenazah`),
  KEY `pembayaran_id_makam_foreign` (`id_makam`),
  CONSTRAINT `pembayaran_id_jenazah_foreign` FOREIGN KEY (`id_jenazah`) REFERENCES `jenazah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pembayaran_id_makam_foreign` FOREIGN KEY (`id_makam`) REFERENCES `makam` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` (`id`, `nama`, `jenis`, `jumlah`, `domisili`, `jasa_gali`, `jasa_rawat`, `id_jenazah`, `id_makam`, `created_at`, `updated_at`) VALUES
	(1, 'Ujang', 'baru', 6250000, 0, 1, 1, 5, 2, '2023-08-24 06:44:20', '2023-09-24 06:44:20'),
	(2, 'Ujang', 'baru', 7250000, 1, 0, 1, 5, 2, '2023-09-24 06:45:30', '2023-09-24 06:45:36');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `pemeliharaan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hari` enum('senin','selasa','rabu','kamis','jumat','sabtu','minggu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam` time NOT NULL,
  `tindakan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pekerja` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pemeliharaan_id_pekerja_foreign` (`id_pekerja`),
  CONSTRAINT `pemeliharaan_id_pekerja_foreign` FOREIGN KEY (`id_pekerja`) REFERENCES `pekerja` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `pemeliharaan` DISABLE KEYS */;
INSERT INTO `pemeliharaan` (`id`, `hari`, `jam`, `tindakan`, `id_pekerja`, `created_at`, `updated_at`) VALUES
	(1, 'senin', '09:00:00', 'Babarasih', 1, '2023-09-22 19:14:21', '2023-09-22 19:14:21');
/*!40000 ALTER TABLE `pemeliharaan` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `pengeluaran` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `pengeluaran` DISABLE KEYS */;
INSERT INTO `pengeluaran` (`id`, `jenis`, `jumlah`, `tanggal`, `created_at`, `updated_at`) VALUES
	(1, 'Bayar Hutang', 5000000, '2023-09-24 00:00:00', '2023-09-24 06:55:14', '2023-09-24 06:55:14');
/*!40000 ALTER TABLE `pengeluaran` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `pesanan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `tanggal_konfirmasi` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `pesanan` DISABLE KEYS */;
INSERT INTO `pesanan` (`id`, `nama`, `tanggal_pemesanan`, `tanggal_konfirmasi`, `created_at`, `updated_at`) VALUES
	(1, 'Ujang Pratama', '2023-09-23', '2023-09-23', '2023-09-22 18:50:09', '2023-09-22 18:50:09'),
	(2, 'Asep Purnama', '2023-09-22', '2023-09-23', '2023-09-22 19:37:49', '2023-09-22 19:37:49');
/*!40000 ALTER TABLE `pesanan` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `pewaris` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_waris` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mendiang` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pewaris_id_mendiang_foreign` (`id_mendiang`),
  CONSTRAINT `pewaris_id_mendiang_foreign` FOREIGN KEY (`id_mendiang`) REFERENCES `jenazah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `pewaris` DISABLE KEYS */;
/*!40000 ALTER TABLE `pewaris` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `tpu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `tpu` DISABLE KEYS */;
INSERT INTO `tpu` (`id`, `nama`, `alamat`, `provinsi`, `kabupaten`, `kecamatan`, `kelurahan`, `created_at`, `updated_at`) VALUES
	(1, 'Makam A', 'Quod praesentium con', 'Accusamus deserunt v', 'In dolorum aute nisi', 'Fuga Labore magna i', 'Sed ea autem id reru', '2023-09-22 18:49:17', '2023-09-22 18:49:44');
/*!40000 ALTER TABLE `tpu` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `tumpangan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_pemohon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kewarganegaraan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenazah` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tumpangan_id_jenazah_foreign` (`id_jenazah`),
  CONSTRAINT `tumpangan_id_jenazah_foreign` FOREIGN KEY (`id_jenazah`) REFERENCES `jenazah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `tumpangan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tumpangan` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `nama`, `username`, `role`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin', 'admin', '$2y$10$q0d7HDLpi3uVEZH/SGnpeOEBrHd1YSpy63Kg59YknaCfcn6Ujwb6a', '2023-09-24 06:43:45', '2023-09-24 06:43:45');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
