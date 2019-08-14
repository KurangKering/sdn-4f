-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.40-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for sdn-afri
CREATE DATABASE IF NOT EXISTS `sdn-afri` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sdn-afri`;

-- Dumping structure for table sdn-afri.album_photo
CREATE TABLE IF NOT EXISTS `album_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `cover` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table sdn-afri.album_photo: ~4 rows (approximately)
/*!40000 ALTER TABLE `album_photo` DISABLE KEYS */;
INSERT IGNORE INTO `album_photo` (`id`, `title`, `description`, `cover`, `created_at`, `updated_at`) VALUES
	(12, 'Kebersamaan', 'Cicak cicak apa yang ndak makan', '4e225e127cc7bcd3558143bba9399f75.jpg', '2019-05-15 15:28:19', '2019-05-15 15:28:19'),
	(13, 'jasfjas', 'asfas', 'd54b945fc1be2f202da45a9e050afe2e.jpg', '2019-05-15 15:28:40', '2019-05-15 15:28:40'),
	(14, 'adf', 'sfasfasdfas', 'd2707bda5a4e6e4215dbd25917abe828.jpg', '2019-05-15 15:28:57', '2019-05-15 15:28:57'),
	(17, '234234', '2423423', 'b27f15189b2171c0fa1de4d4bfeddce0.jpg', '2019-05-15 15:29:53', '2019-05-15 15:29:53'),
	(18, 'asdfas', 'asfsa', 'e695096999957f4bfe36a3eeb9b78b2e.jpg', '2019-08-14 14:18:32', '2019-08-14 14:18:32');
/*!40000 ALTER TABLE `album_photo` ENABLE KEYS */;

-- Dumping structure for table sdn-afri.berita
CREATE TABLE IF NOT EXISTS `berita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_berita_id` varchar(50) NOT NULL DEFAULT '0',
  `judul` text NOT NULL,
  `konten` longtext NOT NULL,
  `author_user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `berita_image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_berita_users` (`author_user_id`),
  CONSTRAINT `FK_berita_users` FOREIGN KEY (`author_user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Dumping data for table sdn-afri.berita: ~3 rows (approximately)
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
INSERT IGNORE INTO `berita` (`id`, `kategori_berita_id`, `judul`, `konten`, `author_user_id`, `created_at`, `updated_at`, `berita_image`) VALUES
	(2, '1,7', 'asda', '<p>cicak</p>', 6, '2019-05-13 23:45:58', '2019-05-14 12:29:07', '7437bffc367ee5893afbb27c75e0ee75.jpg'),
	(17, '1,6,7', 'Anu pak Anu', '<p>kepala sekolah mencabuli anak didiknya</p>\n<p>&nbsp;</p>\n<p><img src="http://localhost/sdn-afri/media/berita/berita-image-1557808510744.jpg" alt="" width="300" height="297" /></p>', 6, '2019-05-14 11:36:52', '2019-05-14 11:37:59', 'af7c31e28a2baa53cc9755a3250ac943.jpg'),
	(24, '1', 'asfsa', 'asfsaf', 6, '2019-05-14 23:28:22', '2019-05-14 23:28:22', NULL);
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;

-- Dumping structure for table sdn-afri.data_guru_pegawai
CREATE TABLE IF NOT EXISTS `data_guru_pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL DEFAULT '',
  `jabatan` varchar(250) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table sdn-afri.data_guru_pegawai: ~2 rows (approximately)
/*!40000 ALTER TABLE `data_guru_pegawai` DISABLE KEYS */;
INSERT IGNORE INTO `data_guru_pegawai` (`id`, `nama`, `jabatan`, `created_at`, `updated_at`) VALUES
	(4, 'asdfasasdfasfas', 'asdfa', '2019-07-08 15:10:35', '2019-07-08 15:10:41'),
	(5, 'asdfasfasfasdfas', 'asdfasfasfasfasd', '2019-07-08 15:10:46', '2019-07-08 15:10:46');
/*!40000 ALTER TABLE `data_guru_pegawai` ENABLE KEYS */;

-- Dumping structure for table sdn-afri.hubungi_kami
CREATE TABLE IF NOT EXISTS `hubungi_kami` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table sdn-afri.hubungi_kami: ~10 rows (approximately)
/*!40000 ALTER TABLE `hubungi_kami` DISABLE KEYS */;
INSERT IGNORE INTO `hubungi_kami` (`id`, `nama`, `email`, `pesan`, `created_at`, `updated_at`) VALUES
	(1, 'asdfa', 'asfas', 'asfas', '2019-05-15 10:13:11', '2019-05-15 10:13:11'),
	(2, 'asfas', 'asfas', 'asfs', '2019-05-15 10:13:29', '2019-05-15 10:13:29'),
	(3, 'afas', 'asdfasfa', 'sfafasfasfa', '2019-05-15 10:14:17', '2019-05-15 10:14:17'),
	(4, 'asdfasf', 'asfasfasfas', '', '2019-05-15 10:15:10', '2019-05-15 10:15:10'),
	(5, '3453', '34534', '34534', '2019-05-15 10:15:38', '2019-05-15 10:15:38'),
	(6, '343', '3453345345', '345345353', '2019-05-15 10:17:08', '2019-05-15 10:17:08'),
	(7, '879', '797797', '89778', '2019-05-15 10:18:24', '2019-05-15 10:18:24'),
	(8, 'anu pak', 'asf@asfas.conm', 'asdfsa\r\n', '2019-05-15 10:19:41', '2019-05-15 10:19:41'),
	(9, 'asfsa', 'fasfasf', 'asfas', '2019-05-15 10:22:25', '2019-05-15 10:22:25'),
	(10, '242', '23423423423', '23423', '2019-05-15 10:23:11', '2019-05-15 10:23:11');
/*!40000 ALTER TABLE `hubungi_kami` ENABLE KEYS */;

-- Dumping structure for table sdn-afri.image_slider
CREATE TABLE IF NOT EXISTS `image_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) NOT NULL,
  `caption` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table sdn-afri.image_slider: ~2 rows (approximately)
/*!40000 ALTER TABLE `image_slider` DISABLE KEYS */;
INSERT IGNORE INTO `image_slider` (`id`, `url`, `caption`, `created_at`, `updated_at`) VALUES
	(7, '6b1097188f674a30d607db30430f8c07.jpg', 'cicak rowo', '2019-05-15 17:18:53', '2019-05-15 17:18:53'),
	(8, 'ebc9b38105ce13c6879c33f6c6eee9c9.jpg', 'bujang lapuk jangan di buang', '2019-05-15 17:19:09', '2019-05-15 17:19:09');
/*!40000 ALTER TABLE `image_slider` ENABLE KEYS */;

-- Dumping structure for table sdn-afri.kategori_berita
CREATE TABLE IF NOT EXISTS `kategori_berita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table sdn-afri.kategori_berita: ~4 rows (approximately)
/*!40000 ALTER TABLE `kategori_berita` DISABLE KEYS */;
INSERT IGNORE INTO `kategori_berita` (`id`, `kategori`, `created_at`, `updated_at`) VALUES
	(1, 'Kesehatan', '2019-05-14 11:47:02', '2019-05-14 11:47:02'),
	(6, 'somay', '2019-05-14 11:54:54', '2019-05-14 11:54:54'),
	(7, 'asfds', '2019-05-14 11:57:42', '2019-05-14 11:57:42'),
	(8, '123', '2019-05-14 11:57:48', '2019-05-14 11:58:43');
/*!40000 ALTER TABLE `kategori_berita` ENABLE KEYS */;

-- Dumping structure for table sdn-afri.komentar_berita
CREATE TABLE IF NOT EXISTS `komentar_berita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `berita_id` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_komentar_berita_berita` (`berita_id`),
  CONSTRAINT `FK_komentar_berita_berita` FOREIGN KEY (`berita_id`) REFERENCES `berita` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table sdn-afri.komentar_berita: ~2 rows (approximately)
/*!40000 ALTER TABLE `komentar_berita` DISABLE KEYS */;
INSERT IGNORE INTO `komentar_berita` (`id`, `berita_id`, `komentar`, `nama`, `email`, `created_at`, `updated_at`) VALUES
	(1, 17, 'jangan makan pisng', 'asfsafa', 'asfds@adfas.com', '2019-05-14 22:04:23', '2019-05-14 22:04:23'),
	(10, 24, 'safsa', 'sadfsa', 'safs@safas.com', '2019-05-16 14:43:50', '2019-05-16 14:43:50');
/*!40000 ALTER TABLE `komentar_berita` ENABLE KEYS */;

-- Dumping structure for table sdn-afri.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `isi` longtext,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table sdn-afri.pages: ~10 rows (approximately)
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT IGNORE INTO `pages` (`id`, `title`, `isi`, `created_at`, `updated_at`) VALUES
	(1, NULL, NULL, '2019-05-14 13:07:23', '2019-05-14 13:07:23'),
	(3, 'visi_misi', '<p>asfasasdfsafasd</p>', '2019-05-14 13:12:30', '2019-07-15 21:47:24'),
	(4, 'sambutan', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2019-05-16 14:14:54', '2019-05-16 14:18:35'),
	(5, 'profil', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2019-05-16 14:14:52', '2019-05-16 14:18:40'),
	(6, 'ruangan', '<p>afasdf</p>', '2019-07-15 21:43:29', '2019-07-15 22:13:44'),
	(7, 'elektronik', 'afasd', '2019-07-15 21:51:56', '2019-07-15 21:51:56'),
	(8, 'moubiler', 'asfas', '2019-07-15 21:55:56', '2019-07-15 21:55:57'),
	(9, 'inventaris', '<p>asdfasdf asdf as</p>', '2019-07-15 21:56:01', '2019-07-15 21:57:58'),
	(10, 'prestasi', '<p>afasd fsaf asfsad as</p>', '2019-07-15 22:04:23', '2019-07-15 22:06:03'),
	(11, 'ekstrakulikuler', '<p>afasdfsd&nbsp; af asd asf</p>', '2019-07-15 22:13:31', '2019-07-15 22:14:07');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;

-- Dumping structure for table sdn-afri.pengaturan
CREATE TABLE IF NOT EXISTS `pengaturan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) NOT NULL,
  `nilai` varchar(250) NOT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table sdn-afri.pengaturan: ~7 rows (approximately)
/*!40000 ALTER TABLE `pengaturan` DISABLE KEYS */;
INSERT IGNORE INTO `pengaturan` (`id`, `nama`, `nilai`, `keterangan`, `created_at`, `updated_at`) VALUES
	(1, 'nama_sekolah', 'SDN 167 PEKANBARU', 'nama sekolah', '2019-05-16 12:41:11', '2019-05-16 13:26:11'),
	(2, 'alamat', 'Jl. Jati Rejo Pekanbaru Riauu', 'Alamat sekolah', '2019-05-16 12:41:28', '2019-05-16 13:05:39'),
	(3, 'telepon', '08138123818u', 'No Telepon Sekolah', '2019-05-16 12:41:44', '2019-05-16 13:05:39'),
	(4, 'email', 'sdn167pekanbaru@gmail.comu', 'Alamat Email sekolah', '2019-05-16 12:42:02', '2019-05-16 13:05:39'),
	(5, 'motto', 'jadilah seperti iniu', 'Motto Sekolah', '2019-05-16 12:42:14', '2019-05-16 13:05:39'),
	(6, 'nama_kepsek', 'DR. Ucok BABA', 'Nama Kepala Sekolah', '2019-05-16 13:31:53', '2019-05-16 13:53:49'),
	(7, 'foto_kepsek', '4822c445095fece660406e711738b95d.jpg', 'Foto Kepala Sekolah', '2019-05-16 13:32:07', '2019-07-30 15:28:25');
/*!40000 ALTER TABLE `pengaturan` ENABLE KEYS */;

-- Dumping structure for table sdn-afri.photos
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(100) DEFAULT NULL,
  `album_photo_id` int(11) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_photos_album_foto` (`album_photo_id`),
  CONSTRAINT `FK_photos_album_foto` FOREIGN KEY (`album_photo_id`) REFERENCES `album_photo` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table sdn-afri.photos: ~3 rows (approximately)
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT IGNORE INTO `photos` (`id`, `caption`, `album_photo_id`, `url`, `created_at`, `updated_at`) VALUES
	(14, '345345', 17, '1926f533fc2f377b5dbc3ee59f0f9337.jpg', '2019-05-15 15:32:22', '2019-05-15 15:32:22'),
	(15, '234234234', 17, '237915d39a2e725dc87bc8858caf2f03.jpg', '2019-05-15 15:36:12', '2019-05-15 15:36:12'),
	(16, '67867867', 17, '67adeace9b4a216b3f041fea50a1945b.jpeg', '2019-05-15 15:38:05', '2019-05-15 15:38:05');
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;

-- Dumping structure for table sdn-afri.quotes
CREATE TABLE IF NOT EXISTS `quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quote` varchar(250) NOT NULL,
  `oleh` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table sdn-afri.quotes: ~0 rows (approximately)
/*!40000 ALTER TABLE `quotes` DISABLE KEYS */;
INSERT IGNORE INTO `quotes` (`id`, `quote`, `oleh`, `created_at`, `updated_at`) VALUES
	(3, 'Setiap kali mau makan harus cuci tangan terlebih Dahulu', 'iiopo', '2019-05-16 13:21:13', '2019-05-16 13:22:52');
/*!40000 ALTER TABLE `quotes` ENABLE KEYS */;

-- Dumping structure for table sdn-afri.relasi_berita_kategori
CREATE TABLE IF NOT EXISTS `relasi_berita_kategori` (
  `berita_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  UNIQUE KEY `berita_id_kategori_id` (`berita_id`,`kategori_id`),
  KEY `FK_relasi_berita_kategori_kategori_berita` (`kategori_id`),
  CONSTRAINT `FK_relasi_berita_kategori_berita` FOREIGN KEY (`berita_id`) REFERENCES `berita` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_relasi_berita_kategori_kategori_berita` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_berita` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table sdn-afri.relasi_berita_kategori: ~0 rows (approximately)
/*!40000 ALTER TABLE `relasi_berita_kategori` DISABLE KEYS */;
INSERT IGNORE INTO `relasi_berita_kategori` (`berita_id`, `kategori_id`) VALUES
	(24, 8);
/*!40000 ALTER TABLE `relasi_berita_kategori` ENABLE KEYS */;

-- Dumping structure for table sdn-afri.struktur_organisasi
CREATE TABLE IF NOT EXISTS `struktur_organisasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) NOT NULL DEFAULT '',
  `jabatan` varchar(250) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table sdn-afri.struktur_organisasi: ~0 rows (approximately)
/*!40000 ALTER TABLE `struktur_organisasi` DISABLE KEYS */;
INSERT IGNORE INTO `struktur_organisasi` (`id`, `nama`, `jabatan`, `created_at`, `updated_at`) VALUES
	(2, 'H. Silaban', 'Kepala Sekolah', '2019-07-08 15:27:52', '2019-07-08 15:27:52');
/*!40000 ALTER TABLE `struktur_organisasi` ENABLE KEYS */;

-- Dumping structure for table sdn-afri.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table sdn-afri.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `username`, `nama`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
	(6, 'admin', 'admin', 'admin@admin.com', '7815696ecbf1c96e6894b779456d330e', 'admin', '2019-05-13 15:57:58', '2019-05-13 15:58:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table sdn-afri.videos
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(250) NOT NULL,
  `caption` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table sdn-afri.videos: ~0 rows (approximately)
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT IGNORE INTO `videos` (`id`, `url`, `caption`, `created_at`, `updated_at`) VALUES
	(19, '4c3bed7b9cb3d1b9e705bf8c2583e128.MP4', 'perpisahan', '2019-08-15 01:57:43', '2019-08-15 01:58:04');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
