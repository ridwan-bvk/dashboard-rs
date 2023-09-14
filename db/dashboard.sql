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


-- Dumping database structure for dashboardrs
DROP DATABASE IF EXISTS `dashboardrs`;
CREATE DATABASE IF NOT EXISTS `dashboardrs` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dashboardrs`;

-- Dumping structure for table dashboardrs.detail_pendaftaran
DROP TABLE IF EXISTS `detail_pendaftaran`;
CREATE TABLE IF NOT EXISTS `detail_pendaftaran` (
  `no_rm` varchar(10) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tgl_lahir` datetime DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `status_kirim` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dashboardrs.detail_pendaftaran: ~2 rows (approximately)
INSERT INTO `detail_pendaftaran` (`no_rm`, `nama`, `tgl_lahir`, `alamat`, `status_kirim`) VALUES
	('00012', 'Dadang', '1999-01-14 00:00:00', 'bandung', 'sukses'),
	('00013', 'Nani', '1987-08-13 00:00:00', 'ciamis', 'gagal');

-- Dumping structure for table dashboardrs.rekap_pendaftaran
DROP TABLE IF EXISTS `rekap_pendaftaran`;
CREATE TABLE IF NOT EXISTS `rekap_pendaftaran` (
  `kd_booking` varchar(50) DEFAULT NULL,
  `task_id` varchar(50) DEFAULT NULL,
  `tgl_pendaftaran` datetime DEFAULT NULL,
  `status_kirim` varchar(50) DEFAULT NULL,
  `pesan_kirim` varchar(50) DEFAULT NULL,
  `tgl_kirim` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dashboardrs.rekap_pendaftaran: ~2 rows (approximately)
INSERT INTO `rekap_pendaftaran` (`kd_booking`, `task_id`, `tgl_pendaftaran`, `status_kirim`, `pesan_kirim`, `tgl_kirim`, `tgl_update`) VALUES
	('001', 'ID-01', '2023-09-01 22:13:51', 'sukses', 'pendaftaran sukses', '2023-09-10 22:14:24', '2023-09-14 22:14:32'),
	('002', 'ID-02', '2023-09-14 22:15:04', 'gagal', 'batal', '2023-09-14 22:15:20', '2023-09-14 22:15:20');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
