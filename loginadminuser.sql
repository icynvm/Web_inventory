-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.27-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for loginadminuser1
CREATE DATABASE IF NOT EXISTS `loginadminuser1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `loginadminuser1`;

-- Dumping structure for table loginadminuser1.assets
CREATE TABLE IF NOT EXISTS `assets` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `assets_id` varchar(255) NOT NULL,
  `assets_name` varchar(255) NOT NULL,
  `assets_type` varchar(255) NOT NULL,
  `assets_model` varchar(255) NOT NULL,
  `assets_serial` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `assets_warranty` varchar(255) NOT NULL,
  PRIMARY KEY (`a_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table loginadminuser1.assets: ~4 rows (approximately)
INSERT INTO `assets` (`a_id`, `assets_id`, `assets_name`, `assets_type`, `assets_model`, `assets_serial`, `date`, `assets_warranty`) VALUES
	(1, 'hw13x51da', 'LAPTOP22222', 'Other', '423454516', 'sw13123s', '2023-02-17', '3 years\r\n'),
	(2, '6666', 'LAPTOP', 'Software', '63764', '6543634', '2023-02-20', '3 years'),
	(3, '64758', 'czxc', 'Software', '63764', '1113333333', '2023-02-21', '3 years'),
	(4, '6475812', 'LAPTOP-s', 'Hardware', '63764', '1513212', '2023-02-22', '2 years');

-- Dumping structure for table loginadminuser1.msoffice
CREATE TABLE IF NOT EXISTS `msoffice` (
  `ms_id` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `SerialNumber` varchar(255) NOT NULL,
  `Key` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Key_from_office` varchar(255) NOT NULL,
  `version` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ms_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table loginadminuser1.msoffice: ~3 rows (approximately)
INSERT INTO `msoffice` (`ms_id`, `Email`, `Password`, `SerialNumber`, `Key`, `Type`, `Key_from_office`, `version`) VALUES
	(1, 'supina081@gmail.com', 'IcxyTest', 'Gfrwq245hvcc123', 'gadwead', 'BOI', 'wgfvdgqeqwe', NULL),
	(2, 'supina022@gmail.com', 'IcxyTest', 'vbcbsfdaf21', 'gadweadxxas', 'aqwea', 'wbweqweq', '2018'),
	(3, 'mhsfasd@sfscv.dd', 'cxzczxcasdasd', '31xvxcvad', 'gadwead', '23afdszxc', 'cbcvbvcb', '2019');

-- Dumping structure for table loginadminuser1.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userlevel` varchar(1) NOT NULL,
  `userid` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table loginadminuser1.users: ~14 rows (approximately)
INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `userlevel`, `userid`) VALUES
	(0, 'ize', '1', 'sdgdfbv', 'asdav', '1321541@gmail.com', 'm', NULL),
	(8, 'icy', '1', 'Sittichai', 'supina', '6231301009@lamduan.mfu.ac.th', 'a', NULL),
	(10, 'bam', '1', 'rawin', 'sripol', '6231301005@lamduan.mfu.ac.th', 'm', NULL),
	(11, 'test', '1', 'test F', 'test L', 'supina081@gmail.com', 'm', NULL),
	(12, 'noey', '1412', 'chanapha', 'nambut', '6231301001@lamduan.mfu.ac.th', 'm', NULL),
	(13, 'may', '11234', 'sirima', 'posuwan', '6231301011@lamduan.mfu.ac.th', 'm', NULL),
	(14, 'noon', '0914', 'chutcharee', 'watcharamaimetha', '6231205054@lamduan.mfu.ac.th', 'm', NULL),
	(18, 'test1', '2', 'sittichai', 'supina', 'supina081@gmail.com', 'm', NULL),
	(19, 'icy.nvm', 'test', 'sittichai', 'supina', 'supina081@gmail.com', 'm', NULL),
	(20, 'noeyeiei', '1412', 'chanapha', 'nambut', '6231301001@lamduan.mfu.ac.th', 'm', NULL),
	(21, 'jibeiei', '1', 'jib', 'eiei', '6231301003@lamduan.mfu.ac.th', 'm', NULL),
	(22, 'nooncute', 'เน…', 'chutcharee', 'watcharamaimetha', 'noon@gmail.com', 'm', NULL),
	(0, 'vbbcv', '3', 'adasdasd', 'asdzxcvzxcv', 'fadsas@gmail.com', 'm', NULL),
	(0, 'zczxc', '2', 'sgsfdasd', 'asdasda', 'adsda@gmail.com', 'm', NULL);

-- Dumping structure for table loginadminuser1.users_info
CREATE TABLE IF NOT EXISTS `users_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `depart` varchar(100) NOT NULL,
  `division` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `resign` varchar(100) NOT NULL,
  `a_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `a_id` (`a_id`),
  CONSTRAINT `users_info_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `assets` (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table loginadminuser1.users_info: ~3 rows (approximately)
INSERT INTO `users_info` (`id`, `userid`, `firstname`, `lastname`, `depart`, `division`, `date`, `resign`, `a_id`) VALUES
	(7, '850860', 'intern 111', 'supina', 'Operations Department', 'senior', '2023-02-13', 'yes', 1),
	(9, '636344x', 'intern 111', 'asdasdsss', 'Project Management Department', 'intern', '2023-02-21', 'no', 2),
	(10, 'T42321', 'sittichai', 'supina', 'HR & GA Department', 'intern', '2023-02-14', 'no', 4);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
