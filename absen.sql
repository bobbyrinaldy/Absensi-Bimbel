-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `absences`;
CREATE TABLE `absences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `group_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `matkul` enum('M','F','K') NOT NULL,
  `waktu` text NOT NULL,
  `tempat` text NOT NULL,
  `keterangan` text,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacher_id` (`teacher_id`),
  KEY `group_id` (`group_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `absences_ibfk_5` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `absences_ibfk_6` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `absences_ibfk_7` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `absences` (`id`, `tanggal`, `group_id`, `teacher_id`, `matkul`, `waktu`, `tempat`, `keterangan`, `user_id`, `created_at`, `updated_at`) VALUES
(2,	'2017-10-18',	15,	1,	'M',	'2:38:39 PM',	'Kantor',	'Cancel',	1,	'2017-10-18 00:38:40',	'2017-10-18 00:38:40');

DROP TABLE IF EXISTS `administrations`;
CREATE TABLE `administrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration_id` int(11) NOT NULL,
  `bayar` int(11) NOT NULL DEFAULT '0',
  `cicilan_ke` int(11) NOT NULL DEFAULT '0',
  `sisa_bayar` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `registration_id` (`registration_id`),
  CONSTRAINT `administrations_ibfk_2` FOREIGN KEY (`registration_id`) REFERENCES `registrations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `administrations` (`id`, `registration_id`, `bayar`, `cicilan_ke`, `sisa_bayar`, `created_at`, `updated_at`) VALUES
(2,	3,	3850000,	2,	0,	'2017-10-18 02:34:55',	'2017-10-19 23:53:56'),
(3,	4,	2875000,	0,	0,	'2017-10-15 23:25:46',	'2017-10-15 23:25:46'),
(5,	7,	2875000,	1,	0,	'2017-10-16 03:05:43',	'2017-10-16 03:11:06'),
(7,	3,	3850000,	0,	0,	'2017-10-18 02:25:20',	'2017-10-18 02:25:20'),
(8,	8,	2875000,	0,	0,	'2017-10-19 21:01:31',	'2017-10-19 21:01:31');

DROP TABLE IF EXISTS `consultations`;
CREATE TABLE `consultations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `waktu` text NOT NULL,
  `tempat` text NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacher_id` (`teacher_id`),
  CONSTRAINT `consultations_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `consultations` (`id`, `tanggal`, `waktu`, `tempat`, `teacher_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(2,	'2017-10-20',	'11:14:29 AM',	'Rumah Pengajar',	1,	'Coba Coba',	'2017-10-19 21:13:24',	'2017-10-19 21:14:30');

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_grup` text NOT NULL,
  `kriteria` enum('P','D','T') NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `groups` (`id`, `nama_grup`, `kriteria`, `user_id`, `created_at`, `updated_at`) VALUES
(15,	'Aliquam',	'D',	1,	'2017-10-16 23:47:40',	'2017-10-16 23:47:40'),
(16,	'Doloribus adipisci',	'P',	1,	'2017-10-16 23:47:47',	'2017-10-17 01:14:11');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `registrations`;
CREATE TABLE `registrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `fakultas` text NOT NULL,
  `nim` int(11) NOT NULL,
  `asal_sekolah` text NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `sosmed` text NOT NULL,
  `no_tlp_ortu` varchar(13) NOT NULL,
  `kriteria` enum('P','D','T') NOT NULL,
  `jalur_terima` varchar(20) NOT NULL,
  `ipk` varchar(5) NOT NULL,
  `minat_prodi` text NOT NULL,
  `pembayaran` enum('L','TL') NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `registrations_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `registrations` (`id`, `nama`, `fakultas`, `nim`, `asal_sekolah`, `alamat`, `no_tlp`, `sosmed`, `no_tlp_ortu`, `kriteria`, `jalur_terima`, `ipk`, `minat_prodi`, `pembayaran`, `user_id`, `created_at`, `updated_at`) VALUES
(3,	'Bobby Bhakti Rinaldy',	'LPKIA',	6314088,	'SMAN 6 CImahi',	'bandung',	'0811234567890',	'bobby',	'0811234567890',	'P',	'SNMPTN',	'3.0',	'Quaerat natus porro soluta dolorum',	'L',	1,	'2017-10-15 23:23:09',	'2017-10-19 23:53:56'),
(4,	'Hadi Firmansyah',	'FITB',	6314011,	'SMAN 6 CImahi',	'bandung',	'08112222222',	'hadifir',	'0811234567890',	'D',	'SBMPTN',	'3.0',	'Quaerat natus porro soluta dolorum',	'L',	1,	'2017-10-15 23:25:45',	'2017-10-15 23:25:45'),
(7,	'Ade Mugni Rusmana',	'FITB',	6314044,	'SMAN 6 CImahi',	'bandung',	'0811234567890',	'bobby',	'0811234567890',	'D',	'SNMPTN',	'3.0',	'Quaerat natus porro soluta dolorum',	'L',	1,	'2017-10-16 03:05:43',	'2017-10-16 03:11:06'),
(8,	'Gerry FR',	'LPKIA',	6314088,	'SMAN 6 CImahi',	'bandung',	'08112222222',	'bobby',	'0811234567890',	'D',	'SBMPTN',	'3.0',	'Nulla est in ipsam maxime animi est est',	'L',	1,	'2017-09-19 21:01:30',	'2017-10-19 21:01:30');

DROP TABLE IF EXISTS `subconsult`;
CREATE TABLE `subconsult` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `consultation_id` int(11) NOT NULL,
  `registration_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `consultation_id` (`consultation_id`),
  KEY `registration_id` (`registration_id`),
  CONSTRAINT `subconsult_ibfk_1` FOREIGN KEY (`consultation_id`) REFERENCES `consultations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subconsult_ibfk_2` FOREIGN KEY (`registration_id`) REFERENCES `registrations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `subconsult` (`id`, `consultation_id`, `registration_id`) VALUES
(11,	2,	4),
(12,	2,	7);

DROP TABLE IF EXISTS `subgroups`;
CREATE TABLE `subgroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `registration_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  KEY `registration_id` (`registration_id`),
  CONSTRAINT `subgroups_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subgroups_ibfk_2` FOREIGN KEY (`registration_id`) REFERENCES `registrations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `subgroups` (`id`, `group_id`, `registration_id`, `created_at`, `updated_at`) VALUES
(50,	15,	4,	'2017-10-19 20:18:43',	'2017-10-19 20:18:43'),
(51,	15,	7,	'2017-10-19 20:18:43',	'2017-10-19 20:18:43'),
(52,	16,	3,	'2017-10-19 20:18:47',	'2017-10-19 20:18:47');

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `universitas` text NOT NULL,
  `jurusan` text NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `sosmed` text NOT NULL,
  `pendidikan` text NOT NULL,
  `semester` int(11) NOT NULL,
  `pengajar` enum('M','F','K') NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `teachers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `teachers` (`id`, `nama`, `alamat`, `tempat_lahir`, `tgl_lahir`, `universitas`, `jurusan`, `no_tlp`, `sosmed`, `pendidikan`, `semester`, `pengajar`, `user_id`, `created_at`, `updated_at`) VALUES
(1,	'Ai Gina',	'Voluptate',	'Bandung',	'2017-10-17',	'LPKIA',	'Teknik Informatika',	'0811234567890',	'aigina',	'd3',	6,	'M',	1,	'2017-10-17 02:54:03',	'2017-10-18 02:19:32'),
(2,	'Bobby Bhakti Rinaldy',	'Cimahi',	'Bandung',	'1996-06-10',	'LPKIA',	'Teknik Informatika',	'0811234567890',	'bobby',	'D3',	6,	'M',	1,	'2017-10-18 01:22:18',	'2017-10-18 01:22:48');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'admin',	'admin',	'admin@admin.com',	'$2y$10$8Q1ZQ1eKzQpOh4aB6QZBX.TXt786e6v0lt9S3Idyu/bgaszPCSucy',	'5nre2AcXCL7VqqxuwhNXNxA0jKr5Hp5LUZHnWDsQnz3jIMSo33AI9FkHIQTI',	'2017-10-12 23:28:32',	'2017-10-12 23:28:32');

-- 2017-11-15 14:49:15
