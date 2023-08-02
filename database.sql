/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `jenazah_id_pesanan_unique` (`id_pesanan`),
  UNIQUE KEY `jenazah_id_makam_unique` (`id_makam`),
  CONSTRAINT `jenazah_id_makam_foreign` FOREIGN KEY (`id_makam`) REFERENCES `makam` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `jenazah_id_pesanan_foreign` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `jenazah` DISABLE KEYS */;
INSERT INTO `jenazah` (`id`, `nama`, `nik`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `status_kawin`, `kewarganegaraan`, `provinsi`, `kabupaten`, `kecamatan`, `kelurahan`, `rt`, `rw`, `alamat_ktp`, `alamat_sekarang`, `status_tinggal`, `agama`, `pendidikan`, `pekerjaan`, `tanggal_meninggal`, `tanggal_makam`, `id_pesanan`, `id_makam`, `created_at`, `updated_at`) VALUES
	(1, 'Ipsam eos reprehende', '1234567890123456', 'Enim dolore mollit e', '1991-10-06', 'laki', 1, 'Nulla eos voluptate', 'Sed fugiat inventor', 'Voluptatem et praes', 'Laborum quia dolorem', 'Quis Nam culpa et t', 77, 86, 'At irure consequatur', 'Corrupti velit cons', 'tetap', 'Islam', 'S1', 'Anim ad sunt sequi m', '1994-05-23', '1995-04-01', 3, 3, '2023-07-28 20:00:48', '2023-07-28 20:13:19'),
	(2, 'Obcaecati vero est', '1234567890123452', 'Quod placeat vel cu', '1999-09-19', 'laki', 0, 'Mollit sit et et ill', 'Aute velit aliquid d', 'Autem sunt id volup', 'Velit temporibus und', 'Nisi dolorem at eu s', 98, 75, 'Ullamco id proident', 'Tenetur et voluptate', 'tetap', 'Hindu', 'S1', 'Voluptates lorem aut', '1999-02-14', '1997-05-26', 2, 4, '2023-07-28 20:05:40', '2023-07-28 20:05:40');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `jenazah_kenal` DISABLE KEYS */;
INSERT INTO `jenazah_kenal` (`id`, `nama`, `tempat_ditemukan`, `tanggal_ditemukan`, `jenis_kelamin`, `kewarganegaraan`, `provinsi`, `kabupaten`, `kecamatan`, `kelurahan`, `rt`, `rw`, `id_makam`, `created_at`, `updated_at`) VALUES
	(1, 'Aute consectetur exe', 'Ex recusandae Non q', '1996-06-19', 'perempuan', 'Irure doloremque sin', 'In non sint exercita', 'Numquam possimus ex', 'Voluptatibus molesti', 'Dolorem nihil exerci', 22, 1, 1, '2023-07-28 19:23:43', '2023-07-28 19:23:43');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `makam` DISABLE KEYS */;
INSERT INTO `makam` (`id`, `nama`, `baris`, `kolom`, `id_tpu`, `created_at`, `updated_at`) VALUES
	(1, 'Non assumenda laborus', 11, 5, 1, '2023-07-28 17:08:06', '2023-07-28 17:10:19'),
	(3, 'Et libero ut lorem u', 45, 91, 1, '2023-07-28 19:44:04', '2023-07-28 19:44:04'),
	(4, 'Magnam illum ab inv', 91, 65, 1, '2023-07-28 19:44:11', '2023-07-28 19:44:11');
/*!40000 ALTER TABLE `makam` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_user_table', 1),
	(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(3, '2023_07_27_163411_create_tpu_table', 1),
	(4, '2023_07_27_163708_create_makam_table', 1),
	(5, '2023_07_27_164150_create_jenazah_kenal_table', 1),
	(6, '2023_07_27_164546_create_pesanan_table', 1),
	(7, '2023_07_27_164655_create_jenazah_table', 1),
	(8, '2023_07_27_171248_create_tumpangan_table', 1),
	(9, '2023_07_27_171628_create_pembayaran_table', 1),
	(10, '2023_07_27_191838_create_pewaris_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `jenis` enum('baru','perpanjangan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_jenazah` int(10) unsigned NOT NULL,
  `id_makam` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pembayaran_id_jenazah_foreign` (`id_jenazah`),
  KEY `pembayaran_id_makam_foreign` (`id_makam`),
  CONSTRAINT `pembayaran_id_jenazah_foreign` FOREIGN KEY (`id_jenazah`) REFERENCES `jenazah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pembayaran_id_makam_foreign` FOREIGN KEY (`id_makam`) REFERENCES `makam` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` (`id`, `nama`, `jenis`, `jumlah`, `id_jenazah`, `id_makam`, `created_at`, `updated_at`) VALUES
	(2, 'Saepe eiusmod aperia', 'baru', 250000, 2, 4, '2023-07-29 02:25:33', '2023-07-29 02:25:33'),
	(3, 'Ujang Gambut', 'baru', 250000, 1, 3, '2023-07-29 02:34:44', '2023-07-29 02:34:44');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `pesanan` DISABLE KEYS */;
INSERT INTO `pesanan` (`id`, `nama`, `tanggal_pemesanan`, `tanggal_konfirmasi`, `created_at`, `updated_at`) VALUES
	(2, 'Iste ut sunt fugit', '1970-06-04', '1975-10-09', '2023-07-28 19:41:50', '2023-07-28 19:41:50'),
	(3, 'Vitae repellendus D', '1970-09-12', '1990-08-09', '2023-07-28 19:41:55', '2023-07-28 19:41:55');
/*!40000 ALTER TABLE `pesanan` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `pewaris` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_waris` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL,
  `pekerjaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mendiang` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pewaris_id_mendiang_foreign` (`id_mendiang`),
  CONSTRAINT `pewaris_id_mendiang_foreign` FOREIGN KEY (`id_mendiang`) REFERENCES `jenazah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `pewaris` DISABLE KEYS */;
INSERT INTO `pewaris` (`id`, `nama`, `nik`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `kewarganegaraan`, `provinsi`, `kabupaten`, `kecamatan`, `kelurahan`, `alamat`, `no_hp`, `agama`, `pendidikan`, `status_waris`, `rt`, `rw`, `pekerjaan`, `id_mendiang`, `created_at`, `updated_at`) VALUES
	(1, 'Ullam in fugiat aute', '1234567890123452', 'Suscipit sint quod', '1986-11-24', 'perempuan', 'Exercitation ea dolo', 'Sit consequatur fac', 'Voluptate excepteur', 'Ducimus dignissimos', 'Molestiae enim ut fu', 'Commodo fugit volup', 'Eveniet corporis pl', 'Buddha', 'S3', 'anak', NULL, NULL, 'Qui culpa quae quia', 1, '2023-07-29 01:40:31', '2023-07-29 01:40:31'),
	(2, 'Nisi quae delectus', '1234567890123452', 'Aliquam proident pa', '2007-03-21', 'laki', 'Ut aut amet aute ut', 'Nulla dolor autem ut', 'Est sed incidunt ut', 'Magni ea omnis iusto', 'Hic neque aliqua De', 'Exercitationem ut qu', 'Quaerat repudiandae', 'Buddha', 'SMP', 'anak', NULL, NULL, 'Accusamus sit et in', 2, '2023-07-29 01:41:41', '2023-07-29 01:41:41');
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
	(1, 'Kuburan B', 'Jl. Pemurus Dalam 8', 'Kalimantan Selatan', 'Kota Banjarmasin', 'Banjarmasin Selatan', 'Pemurus Dalam', '2023-07-28 16:23:36', '2023-07-28 16:38:39');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40000 ALTER TABLE `tumpangan` DISABLE KEYS */;
INSERT INTO `tumpangan` (`id`, `nama_pemohon`, `tempat_lahir`, `tanggal_lahir`, `kewarganegaraan`, `agama`, `alamat`, `id_jenazah`, `created_at`, `updated_at`) VALUES
	(1, 'Voluptatem praesenti', 'Aliquam illo reprehe', '1988-04-18', 'Commodo earum explic', 'Islam', 'Nemo voluptas minus', 1, '2023-07-29 02:45:53', '2023-07-29 02:47:04');
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
	(1, 'Admin', 'admin', 'admin', '$2y$10$mHCWL9VQZY1TPCnOo0eUwev2krYgNBEgde7w9yBGKV3Q5cdkJ.zBy', '2023-07-28 10:20:52', '2023-07-28 10:20:52');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
