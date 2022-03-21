-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server Version:               10.4.20-MariaDB - mariadb.org binary distribution
-- Server Betriebssystem:        Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Exportiere Datenbank Struktur für pgrw
CREATE DATABASE IF NOT EXISTS `pgrw` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `pgrw`;

-- Exportiere Struktur von Tabelle pgrw.person
CREATE TABLE IF NOT EXISTS `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle pgrw.person: ~16 rows (ungefähr)
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` (`id`, `name`) VALUES
	(8, 'asdf 2'),
	(13, 'asdf 3sf'),
	(6, 'asdfjklö'),
	(20, 'gasdf'),
	(1, 'hans 1'),
	(2, 'hödl bär MEISTER'),
	(15, 'julia'),
	(4, 'lisa schatz'),
	(5, 'lisa schatz 2'),
	(3, 'maxi gdsaf'),
	(14, 'michl kga ifg (asdfga)'),
	(10, 'se gsdf'),
	(11, 'se gsdf 2'),
	(9, 'ser rest'),
	(12, 'thomas'),
	(18, 'tom');
/*!40000 ALTER TABLE `person` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle pgrw.stimme
CREATE TABLE IF NOT EXISTS `stimme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `person_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_stimme_person` (`person_id`),
  CONSTRAINT `FK_stimme_person` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle pgrw.stimme: ~30 rows (ungefähr)
/*!40000 ALTER TABLE `stimme` DISABLE KEYS */;
INSERT INTO `stimme` (`id`, `timestamp`, `person_id`) VALUES
	(1, '2022-03-14 17:13:38', 11),
	(2, '2022-03-14 17:15:25', 12),
	(3, '2022-03-14 17:16:13', 13),
	(4, '2022-03-14 17:21:38', 1),
	(5, '2022-03-14 17:22:03', 1),
	(6, '2022-03-14 17:22:04', 1),
	(7, '2022-03-14 17:22:05', 1),
	(8, '2022-03-14 17:22:06', 1),
	(9, '2022-03-14 17:22:06', 1),
	(10, '2022-03-14 17:22:44', 1),
	(36, '2022-03-14 17:27:20', 14),
	(41, '2022-03-14 17:33:24', 2),
	(42, '2022-03-14 17:33:24', 2),
	(43, '2022-03-14 17:33:24', 2),
	(46, '2022-03-15 16:18:01', 1),
	(47, '2022-03-15 16:18:01', 1),
	(48, '2022-03-15 16:18:02', 1),
	(49, '2022-03-15 16:18:02', 1),
	(50, '2022-03-15 16:26:24', 14),
	(53, '2022-03-15 16:26:24', 14),
	(54, '2022-03-15 16:26:26', 14),
	(55, '2022-03-15 16:26:26', 14),
	(56, '2022-03-15 16:26:26', 14),
	(57, '2022-03-15 16:26:26', 14),
	(58, '2022-03-15 16:26:27', 14),
	(59, '2022-03-15 16:26:27', 14),
	(60, '2022-03-15 16:26:27', 14),
	(61, '2022-03-15 16:26:27', 14),
	(62, '2022-03-15 16:26:27', 14),
	(63, '2022-03-15 16:26:27', 14),
	(64, '2022-03-15 16:58:26', 2),
	(65, '2022-03-15 16:58:26', 2),
	(66, '2022-03-15 16:58:26', 2),
	(67, '2022-03-15 16:58:26', 2);
/*!40000 ALTER TABLE `stimme` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
