-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table payroll_java.absensi
CREATE TABLE IF NOT EXISTS `absensi` (
  `absensi_id` int NOT NULL AUTO_INCREMENT,
  `employe_id` int DEFAULT NULL,
  `absensi_date` date DEFAULT NULL,
  `check_in` datetime DEFAULT NULL,
  `check_out` datetime DEFAULT NULL,
  PRIMARY KEY (`absensi_id`),
  KEY `employe_reference_idx` (`employe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table payroll_java.absensi: ~7 rows (approximately)
INSERT IGNORE INTO `absensi` (`absensi_id`, `employe_id`, `absensi_date`, `check_in`, `check_out`) VALUES
	(3, 1, '2024-04-23', '2024-04-23 16:20:50', '2024-04-23 23:20:53'),
	(4, 1, '2024-04-24', '2024-04-24 21:54:56', '2024-04-25 12:02:43'),
	(5, 1, '2024-05-02', '2024-05-02 10:15:18', '2024-05-02 16:40:01'),
	(6, 1, '2024-05-04', '2024-05-04 05:41:50', '2024-05-04 08:38:26'),
	(7, 1, '2024-05-11', '2024-05-11 07:54:14', '2024-05-11 17:49:08'),
	(8, 12, '2024-05-11', '2024-05-11 07:49:24', '2024-05-11 19:49:26'),
	(9, 12, '2024-05-10', '2024-05-10 05:17:06', '2024-05-10 20:17:08');

-- Dumping structure for table payroll_java.departement
CREATE TABLE IF NOT EXISTS `departement` (
  `departement_id` int NOT NULL AUTO_INCREMENT,
  `location_id` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`departement_id`),
  KEY `location_reference_idx` (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table payroll_java.departement: ~7 rows (approximately)
INSERT IGNORE INTO `departement` (`departement_id`, `location_id`, `name`, `notes`) VALUES
	(2, 4, 'Departement IT', 'IT HO'),
	(3, 6, 'Departement IT', 'IT Bekasi'),
	(6, 6, 'Departement Keuangan', 'Keuangan Bekasi'),
	(7, 4, 'Departement HR', 'Dept HR HO'),
	(8, 6, 'Departement Operational', 'Dept OPS Bekasi'),
	(9, 11, 'Departement Operational', 'Departement Operational Cibitung'),
	(10, 12, 'Departement Operational', 'Departement Operational Karawang EDIT'),
	(11, 4, 'TEST', 'TEST');

-- Dumping structure for table payroll_java.division
CREATE TABLE IF NOT EXISTS `division` (
  `division_id` int NOT NULL AUTO_INCREMENT,
  `departement_id` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`division_id`),
  KEY `departement_id_idx` (`departement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table payroll_java.division: ~11 rows (approximately)
INSERT IGNORE INTO `division` (`division_id`, `departement_id`, `name`, `notes`) VALUES
	(1, 2, 'Infra', 'TIM INFRA HO'),
	(2, 3, 'Infra', 'TIM INFRA BKS'),
	(6, 2, 'Programmer', 'Division Programmer HO'),
	(7, 6, 'Pajak', 'Div Pajak  - Dept Keuangan - Site Bekasi'),
	(8, 7, 'HRD', 'Divisi HRD HO'),
	(9, 7, 'GA', 'Divisi GA HO'),
	(10, 8, 'Operator Forklfit', 'Operator Forklift Bekasi'),
	(11, 8, 'Picker', 'Picker Bekasi'),
	(12, 8, 'Packing', 'Divisi Packing Bekasi'),
	(13, 9, 'Operational Cibitung', 'Operational Cibitung'),
	(14, 10, 'Operational Karawang', 'Operational Karawang\n'),
	(15, 2, 'TEST UPDATE', 'TEST');

-- Dumping structure for table payroll_java.employe
CREATE TABLE IF NOT EXISTS `employe` (
  `employe_id` int NOT NULL AUTO_INCREMENT,
  `employe_name` varchar(45) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `location_id` int DEFAULT NULL,
  `departement_id` int DEFAULT NULL,
  `division_id` int DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `is_active` tinyint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT (now()),
  `created_by` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`employe_id`),
  KEY `location_reference_idx` (`location_id`),
  KEY `departement_reference_idx` (`departement_id`),
  KEY `division_reference_idx` (`division_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table payroll_java.employe: ~6 rows (approximately)
INSERT IGNORE INTO `employe` (`employe_id`, `employe_name`, `date_of_birth`, `nik`, `username`, `password`, `location_id`, `departement_id`, `division_id`, `role`, `salary`, `is_active`, `created_at`, `created_by`) VALUES
	(1, 'Rifki', '2003-07-03', '202143500723', '202143500723', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 4, 2, 2, 'admin', 5430000.123, 1, '2024-04-04 22:39:45', ''),
	(10, 'HRD HO', '2000-05-01', '1234567', 'hrho', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 4, 7, 8, 'admin', 4500000, 1, '2024-05-11 00:39:56', 'Rifki'),
	(11, 'Karyawan 1', '2024-05-01', '1234561', 'karyawan1', '94ee059335e587e501cc4bf90613e0814f00a7b08bc7c648fd865a2af6a22cc2', 11, 9, 13, 'user', 2500000, 1, '2024-05-11 00:40:53', 'Rifki'),
	(12, 'Karyawan 2', '2024-05-01', '1234562', 'karyawan2', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 6, 8, 11, 'user', 3000000, 1, '2024-05-11 00:41:26', 'Rifki'),
	(13, 'karyawan 3', '2024-05-01', '1234563', 'karyawan3', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 6, 8, 12, 'user', 3000000, 1, '2024-05-11 00:42:05', 'Rifki'),
	(14, 'Karyawan 4', '2024-05-08', '1234564', '1234564', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 6, 6, 7, 'user', 9000000, 0, '2024-05-11 12:30:28', 'Rifki');

-- Dumping structure for table payroll_java.lembur
CREATE TABLE IF NOT EXISTS `lembur` (
  `lembur_id` int NOT NULL AUTO_INCREMENT,
  `absensi_id` int DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `request_from` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT (now()),
  `created_by` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`lembur_id`) USING BTREE,
  KEY `absensi_reference_idx` (`absensi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table payroll_java.lembur: ~5 rows (approximately)
INSERT IGNORE INTO `lembur` (`lembur_id`, `absensi_id`, `start_date`, `end_date`, `request_from`, `created_at`, `created_by`) VALUES
	(1, 3, '2024-04-23 19:30:00', '2024-04-23 22:00:00', 1, '2024-05-02 03:06:56', 'Rifki'),
	(2, 4, '2024-04-25 00:00:00', '2024-04-25 04:30:00', 1, '2024-05-02 03:15:14', 'Rifki'),
	(5, 6, '2024-05-04 06:00:00', '2024-05-04 07:30:00', 1, '2024-05-04 01:39:26', 'Rifki'),
	(7, 5, '2024-05-02 11:00:00', '2024-05-02 16:00:00', 1, '2024-05-11 00:54:48', 'Rifki'),
	(8, 8, '2024-05-11 08:00:00', '2024-05-11 19:00:00', 12, '2024-05-11 12:52:24', 'Karyawan 2'),
	(9, 9, '2024-05-10 06:00:00', '2024-05-10 20:00:00', 12, '2024-05-11 13:38:55', 'Karyawan 2'),
	(10, 7, '2024-05-11 14:00:00', '2024-05-11 17:00:00', 1, '2024-05-11 13:55:17', 'Rifki');

-- Dumping structure for table payroll_java.location
CREATE TABLE IF NOT EXISTS `location` (
  `location_id` int NOT NULL AUTO_INCREMENT,
  `address_1` text,
  `address_2` text,
  `province` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `sub_district` varchar(255) DEFAULT NULL,
  `zip_code` varchar(5) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table payroll_java.location: ~3 rows (approximately)
INSERT IGNORE INTO `location` (`location_id`, `address_1`, `address_2`, `province`, `city`, `district`, `sub_district`, `zip_code`, `name`) VALUES
	(4, 'TEST', 'asfassa', 'Jakarta', 'Jakarta Utara', 'Jakarta Utara', 'Jakarta Utara', '2101', 'Head Office'),
	(6, 'Bekasi	', '', 'Jawa Barat', 'Bekasi', 'Bekasi Utara', 'Teluk Pucung', '17121', 'Site Bekasi'),
	(11, 'Cibitung', 'Cibitung', 'Jawa Barat', 'Cibitung', 'Cibitung', 'Cibitung', '12345', 'Site Cibitung '),
	(12, 'Karawang	', 'Karawang', 'Jawa Barat', 'Karawang', 'Karawang', 'Karawang', '12345', 'Site Karawang');

-- Dumping structure for table payroll_java.reimbursment
CREATE TABLE IF NOT EXISTS `reimbursment` (
  `reimbursment_id` int NOT NULL AUTO_INCREMENT,
  `reimbursment_no` varchar(255) DEFAULT NULL,
  `employe_id` int DEFAULT NULL,
  `request_from` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT (now()),
  `created_by` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`reimbursment_id`),
  KEY `employe_reference_idx` (`employe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table payroll_java.reimbursment: ~4 rows (approximately)
INSERT IGNORE INTO `reimbursment` (`reimbursment_id`, `reimbursment_no`, `employe_id`, `request_from`, `created_at`, `created_by`) VALUES
	(5, 'TEST MASUK', 1, 1, '2024-05-09 15:23:07', '202143500723'),
	(6, 'TEST123', 1, 1, '2024-05-04 14:03:08', '202143500723'),
	(7, 'Reimburse 240511', 1, 1, '2024-05-11 00:56:24', '202143500723'),
	(8, 'TEST ADD', 1, 1, '2024-05-11 13:58:42', '202143500723'),
	(9, 'TEST KARYAWAN', 12, 1, '2024-05-11 15:22:14', '202143500723'),
	(10, 'TEST', 12, 12, '2024-05-11 15:24:22', 'karyawan2');

-- Dumping structure for table payroll_java.reimbursment_detail
CREATE TABLE IF NOT EXISTS `reimbursment_detail` (
  `reimbursment_detail_id` int NOT NULL AUTO_INCREMENT,
  `reimbursment_id` int DEFAULT NULL,
  `description` text,
  `cost` double DEFAULT NULL,
  PRIMARY KEY (`reimbursment_detail_id`),
  KEY `reimbursment_reference_idx` (`reimbursment_id`),
  CONSTRAINT `reimbursment_reference` FOREIGN KEY (`reimbursment_id`) REFERENCES `reimbursment` (`reimbursment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table payroll_java.reimbursment_detail: ~4 rows (approximately)
INSERT IGNORE INTO `reimbursment_detail` (`reimbursment_detail_id`, `reimbursment_id`, `description`, `cost`) VALUES
	(1, 5, 'MAKAN SIANG', 20000),
	(2, 5, 'MAKAN MALEM', 50000),
	(3, 6, 'TEST 1', 100000),
	(4, 6, 'TEST 2', 2000000),
	(5, 6, 'TEST 3', 500000),
	(6, 7, 'Meeting Customer', 200000),
	(7, 7, 'Makan Siang', 100000),
	(8, 7, 'Visit Site', 150000),
	(9, 8, 'UANG MAKAN', 50000),
	(10, 8, 'TRASPORT', 100000),
	(11, 9, 'MAKAN SIANG', 200000),
	(12, 9, 'MAKAN MALAM', 300000),
	(13, 10, 'TEST 123', 100000);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
