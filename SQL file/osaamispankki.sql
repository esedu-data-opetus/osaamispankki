-- --------------------------------------------------------
-- Verkkotietokone:              127.0.0.1
-- Palvelinversio:               10.1.10-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Versio:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for osaamispankki
CREATE DATABASE IF NOT EXISTS `osaamispankki` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `osaamispankki`;


-- Dumping structure for taulu osaamispankki.hakusanat
CREATE TABLE IF NOT EXISTS `hakusanat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hakusana` varchar(50) DEFAULT NULL,
  `sposti` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table osaamispankki.hakusanat: ~4 rows (suunnilleen)
/*!40000 ALTER TABLE `hakusanat` DISABLE KEYS */;
INSERT INTO `hakusanat` (`id`, `hakusana`, `sposti`) VALUES
	(7, 'koira', 'dog@esedulainen.fi'),
	(17, 'doh', 'riku.ronka@esedulainen.fi'),
	(18, 'dgo', 'riku.ronka@esedulainen.fi'),
	(19, 'dfgofg', 'riku.ronka@esedulainen.fi');
/*!40000 ALTER TABLE `hakusanat` ENABLE KEYS */;


-- Dumping structure for taulu osaamispankki.harrastukset
CREATE TABLE IF NOT EXISTS `harrastukset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `harrastus` varchar(50) DEFAULT NULL,
  `vapaasana` varchar(200) DEFAULT NULL,
  `sposti` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- Dumping data for table osaamispankki.harrastukset: ~2 rows (suunnilleen)
/*!40000 ALTER TABLE `harrastukset` DISABLE KEYS */;
INSERT INTO `harrastukset` (`id`, `harrastus`, `vapaasana`, `sposti`) VALUES
	(28, '123', '123', 'riku.ronka@esedulainen.fi'),
	(39, '123', '123', 'dog@esedulainen.fi');
/*!40000 ALTER TABLE `harrastukset` ENABLE KEYS */;


-- Dumping structure for taulu osaamispankki.henkilotiedot
CREATE TABLE IF NOT EXISTS `henkilotiedot` (
  `henkId` int(11) NOT NULL AUTO_INCREMENT,
  `etunimi` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `pkuva` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `sNimi` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `puhelinnro` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `osoite` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `privSposti` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `postinro` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `spuoli` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `lyhytKuvaus` varchar(140) CHARACTER SET latin1 DEFAULT NULL,
  `sposti` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `aktiivisuus` varchar(50) DEFAULT NULL,
  `ktyyppi` varchar(50) DEFAULT NULL,
  `pitkaKuvaus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`henkId`)
) ENGINE=InnoDB AUTO_INCREMENT=657567580 DEFAULT CHARSET=sjis;

-- Dumping data for table osaamispankki.henkilotiedot: ~108 rows (suunnilleen)
/*!40000 ALTER TABLE `henkilotiedot` DISABLE KEYS */;
INSERT INTO `henkilotiedot` (`henkId`, `etunimi`, `pkuva`, `sNimi`, `puhelinnro`, `osoite`, `privSposti`, `postinro`, `spuoli`, `lyhytKuvaus`, `sposti`, `aktiivisuus`, `ktyyppi`, `pitkaKuvaus`) VALUES
	(35, 'John', '6c7898e7736bebba875374d7f0113e41.png', 'Cena', '050666420', 'johncena road 1', 'john.cena@gmail.com', '420', NULL, 'dog', 'riku.ronka@esedulainen.fi', '1', NULL, NULL),
	(36, 'Riku98', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, '', '1', NULL, NULL),
	(37, 'Riku51', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, '', '1', NULL, NULL),
	(38, 'Riku49', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(39, 'Riku48', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(40, 'Riku47', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(41, 'Riku46', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(42, 'Riku45', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(43, 'Riku44', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(44, 'Riku43', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(45, 'Riku42', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(46, 'Riku41', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(47, 'Riku40', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(48, 'Riku39', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(49, 'Riku56', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(50, 'Riku58', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(51, 'Riku97', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(52, 'Riku96', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(53, 'Riku92', '6c7898e7736bebba875374d7f0113e41.png', 'dog', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(54, 'Riku88', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(55, 'Riku86', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(56, 'Riku81', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(57, 'Riku68', '6c7898e7736bebba875374d7f0113e41.png', 'dog', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(58, 'Riku65', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(59, 'Riku64', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(60, 'Riku63', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(61, 'Riku62', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(234, 'Riku59', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(456, 'Riku38', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(567, 'Riku37', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(678, 'Riku18', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(3242, 'Riku17', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(5435, 'Riku16', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(6767, 'Riku14', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(7567, 'Riku13', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(7657, 'Riku99', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(7967, 'Riku77', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(8978, 'Riku11', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(34235, 'Riku10', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(38965, 'Riku57', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(45345, 'Riku9', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(45865, 'Riku53', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(54754, 'Riku7', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(65464, 'Riku6', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(67867, 'Riku5', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(76534, 'Riku3', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(80756, 'Riku78', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(87456, 'Riku20', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(87654, 'Riku21', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(88888, 'Riku84', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(89789, 'Riku12', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(98798, 'Riku23', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(98967, 'Riku95', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(98989, 'Riku36', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(123254, 'Riku24', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(234234, 'Riku35', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(345345, 'Riku100', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(345654, 'Riku34', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(386567, 'Riku90', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(546546, 'Riku33', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(574653, 'Riku69', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(575456, 'Riku67', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(654654, 'Riku32', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(658987, 'Riku93', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(678678, 'Riku31', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(737564, 'Riku54', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(765756, 'Riku4\r\n', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(768976, 'Riku61', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(786745, 'Riku70', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(786776, 'Riku66', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(786784, 'Riku72', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(789789, 'Riku30', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(796745, 'Riku74', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(865745, 'Riku71', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(876534, 'Riku87', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(876867, 'Riku29', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(878768, 'Riku22', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(897845, 'Riku55', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(897856, 'Riku83', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(897956, 'Riku60', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(976456, 'Riku91', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(4324234, 'Riku28', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(4565478, 'Riku80', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(4597665, 'Riku76', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(5435545, 'Riku15', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(6589657, 'Riku52', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(6756745, 'Riku27', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(6756756, 'Riku19', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(6767856, 'Riku82', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(7864566, 'Riku50', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(7867845, 'Riku89', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(7967456, 'Riku73', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(8075676, 'Riku79', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(8097856, 'Riku75', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(8768678, 'Riku8', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(8979856, 'Riku85', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(9878876, 'Riku94', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(23432465, 'Riku26', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(45345345, 'Riku2', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(657567567, 'Riku25', '6c7898e7736bebba875374d7f0113e41.png', 'dog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
	(657567568, 'Tuomas', 'default.png', '', '', '', '', '', NULL, NULL, 'tuomas@esedulainen.fi', NULL, '1', NULL),
	(657567569, 'Daniel', 'default.png', '', '', '', '', '', NULL, NULL, 'daniel@esedulainen.fi', NULL, '1', NULL),
	(657567570, 'Felix', 'default.png', '', '', '', '', '', NULL, NULL, 'felix@esedulainen.fi', NULL, '1', NULL),
	(657567571, 'Max', 'default.png', '', '', '', '', '', NULL, NULL, 'max@esedulainen.fi', NULL, '1', NULL),
	(657567572, 'Dogedogedo', 'default.png', '', '', '', '', '', NULL, '', 'doge@esedulainen.fi', NULL, '1', NULL),
	(657567577, 'DOGG', 'default.png', '', '', '', '', '', NULL, NULL, 'doge2@esedulainen.fi', NULL, '1', NULL),
	(657567578, 'dogdogdog', 'e0b94715168e0816bc39882a1242f3bb.png', 'dogdogdog', 'dogdogdog', 'dogdogdog', 'dogdogdog', 'dogdogdog', NULL, 'My life isMy life isMy life isMy life isMy life isMy life isMy life isMy life isMy life isMy life isMy life isMy life is', 'dog@esedulainen.fi', NULL, '1', NULL),
	(657567579, 'Samsung', 'd486d151abdb04b8187878328d63d9b9.png', '', '', '', '', '', NULL, NULL, 'samsung@esedulainen.fi', NULL, '1', NULL);
/*!40000 ALTER TABLE `henkilotiedot` ENABLE KEYS */;


-- Dumping structure for taulu osaamispankki.kirjautumistiedot
CREATE TABLE IF NOT EXISTS `kirjautumistiedot` (
  `henkiloId` int(11) NOT NULL AUTO_INCREMENT,
  `etunimi` varchar(50) CHARACTER SET ujis DEFAULT NULL,
  `sposti` varchar(50) CHARACTER SET ujis DEFAULT NULL,
  `salasana` varchar(50) DEFAULT NULL,
  `key` varchar(50) DEFAULT NULL,
  `ktyyppi` varchar(50) DEFAULT NULL COMMENT 'opiskelija, admin, työnantaja',
  `lastlogin` varchar(50) DEFAULT NULL,
  `luotu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`henkiloId`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

-- Dumping data for table osaamispankki.kirjautumistiedot: ~16 rows (suunnilleen)
/*!40000 ALTER TABLE `kirjautumistiedot` DISABLE KEYS */;
INSERT INTO `kirjautumistiedot` (`henkiloId`, `etunimi`, `sposti`, `salasana`, `key`, `ktyyppi`, `lastlogin`, `luotu`) VALUES
	(4, 'yay', 'yay@esedu.fi', '76d80224611fc919a5d54f0ff9fba446', 'a136ac22610e98f6db6bfa3f848f7758', NULL, '18.05.2016 11:18:39', NULL),
	(5, 'erwer', 'pppp@esedu.fi', '76d80224611fc919a5d54f0ff9fba446', '5efe0010bbfb4f2ef5540062805617d8', NULL, '18.05.2016 11:18:39', NULL),
	(6, 'dog', 'dog2@esedu.fi', '76d80224611fc919a5d54f0ff9fba446', 'fb897657f0590f68d42d95b09c583523', NULL, '18.05.2016 11:18:39', NULL),
	(7, '123', '3213123123@esedu.fi', '76d80224611fc919a5d54f0ff9fba446', 'a80fd459da34a3d69bbf4cb777a3bf42', NULL, '18.05.2016 11:18:39', NULL),
	(9, 'test', 'testtest@esedu.fi', '76d80224611fc919a5d54f0ff9fba446', '0b19d1e07574710ccc3273b0518af4eb', NULL, '18.05.2016 11:18:39', NULL),
	(10, 'dog', 'dog@esedu.fi', '76d80224611fc919a5d54f0ff9fba446', 'ec7acf0cb5092a1c205966abee2f7dfe', NULL, '18.05.2016 11:18:39', NULL),
	(12, 'manabu', 'manabu@esedu.fi', '76d80224611fc919a5d54f0ff9fba446', 'd811d985039e5fdb2f009699694acb9a', NULL, '18.05.2016 11:18:39', NULL),
	(37, 'John', 'riku.ronka@esedulainen.fi', '76d80224611fc919a5d54f0ff9fba446', '55d58b7f1959d2930dd9d5425f6971b7', '2', '20.5.2016 12:21', '420'),
	(38, 'Tuomas', 'tuomas@esedulainen.fi', '76d80224611fc919a5d54f0ff9fba446', '9aafbacad01f0ae45edd10c1e35c3808', '1', '18.05.2016 11:18:39', NULL),
	(39, 'Daniel', 'daniel@esedulainen.fi', '76d80224611fc919a5d54f0ff9fba446', '41a3a2e6ca41b3062f0e14cdac410005', '1', '18.05.2016 11:18:39', NULL),
	(40, 'Felix', 'felix@esedulainen.fi', '76d80224611fc919a5d54f0ff9fba446', 'b591a33f70fc7b2af7ce8e2cdd54f4af', '1', '18.05.2016 11:18:39', NULL),
	(41, 'Max', 'max@esedulainen.fi', '76d80224611fc919a5d54f0ff9fba446', 'b481271393eab5265ddafa3b83848b84', '1', '18.05.2016 11:18:39', NULL),
	(45, 'Dogedogedo', 'doge@esedulainen.fi', '76d80224611fc919a5d54f0ff9fba446', '4d1a6d1731e90034c4b0392c1e8614dd', '1', '18.5.2016 14:03', '18.5.2016 13:02'),
	(50, 'DOGG', 'doge2@esedulainen.fi', '76d80224611fc919a5d54f0ff9fba446', 'f8de30fd99e451568b87b776063b473c', '1', '19.5.2016 10:44', '19.5.2016 10:34'),
	(51, 'Hitler', 'dog@esedulainen.fi', '76d80224611fc919a5d54f0ff9fba446', '083b8d3a0c37a8dc2bb750bea84de055', '1', '20.5.2016 11:27', '19.5.2016 10:40'),
	(52, 'Stepmania', 'samsung@esedulainen.fi', '76d80224611fc919a5d54f0ff9fba446', '8d0588d3e1bb67006355a4d1ccaa2056', '1', '23.5.2016 10:04', '20.5.2016 12:06');
/*!40000 ALTER TABLE `kirjautumistiedot` ENABLE KEYS */;


-- Dumping structure for taulu osaamispankki.kortit
CREATE TABLE IF NOT EXISTS `kortit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `knimi` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- Dumping data for table osaamispankki.kortit: ~50 rows (suunnilleen)
/*!40000 ALTER TABLE `kortit` DISABLE KEYS */;
INSERT INTO `kortit` (`id`, `knimi`) VALUES
	(1, 'B-ajokortti'),
	(2, 'C-ajokortti'),
	(3, 'T-ajokortti'),
	(4, 'LT-ajokortti'),
	(5, 'A-ajokortti'),
	(6, 'B96-ajokortti'),
	(7, 'BE-ajokortti'),
	(8, 'C1-ajokortti'),
	(9, 'D1-ajokortti'),
	(10, 'C1E-ajokortti'),
	(11, 'CE-ajokortti'),
	(12, 'A/T-pätevyys, Antenniverkkotyöt-pätevyys'),
	(13, 'ADR-ajolupa'),
	(14, 'Alkusammutuskortti AS 1'),
	(15, 'AT-pätevyys'),
	(16, 'Ensiapu 1'),
	(17, 'Ensiapu 2'),
	(18, 'Erikoiskuljetusten liikenteenohjaajakoulutus - EKL'),
	(19, 'Henkilönostinkortti'),
	(20, 'Hissiturvallisuustutkinto'),
	(21, 'Hitsauspätevyydet'),
	(22, 'Ikärajapassi'),
	(23, 'Järjestyksenvalvojakortti'),
	(24, 'Kaasusumutinlupa'),
	(25, 'Kattotulityökortti'),
	(26, 'Matupa - matkailualan turvallisuuspassi'),
	(27, 'Märkätilojen vedeneristäjän sertifikaatti'),
	(28, 'Potilassiirtojen Ergonomiakortti'),
	(29, 'Putkistopassi'),
	(30, 'Putoamissuojainten määräaikaistarkastaja'),
	(31, 'Puuturvakortti'),
	(32, 'Siltanosturikortti'),
	(33, 'Sosiaali- ja terveydenhuollon turvakortti'),
	(34, 'Suojainasiantuntijakortti'),
	(35, 'Sähköturvallisuuskortti'),
	(36, 'Sähköturvallisuustutkinto 1'),
	(37, 'Sähköturvallisuustutkinto 2'),
	(38, 'Sähköturvallisuustutkinto 3'),
	(39, 'Sähköturvallisuuskortti SFS 6002'),
	(40, 'T-pätevyys, Tietoverkkotyöt-pätevyys'),
	(41, 'Tieturvakortti 1'),
	(42, 'Tieturvakortti 2'),
	(43, 'Trukkikortti'),
	(44, 'Turvallisuusneuvonantajakoulutus'),
	(45, 'Vaarallisten kemikaalien teollisen käsittelyn käytönvalvoja'),
	(46, 'Vartijakortti'),
	(47, 'Vesihygieniapassi'),
	(48, 'Vesityökortti'),
	(49, 'Turvasuojaajakortti'),
	(50, 'Työhyvinvointikortti');
/*!40000 ALTER TABLE `kortit` ENABLE KEYS */;


-- Dumping structure for taulu osaamispankki.kortit_english
CREATE TABLE IF NOT EXISTS `kortit_english` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `knimi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

-- Dumping data for table osaamispankki.kortit_english: ~50 rows (suunnilleen)
/*!40000 ALTER TABLE `kortit_english` DISABLE KEYS */;
INSERT INTO `kortit_english` (`id`, `knimi`) VALUES
	(1, 'B-driving license'),
	(2, 'C-driving license'),
	(3, 'T-driving license'),
	(4, 'LT-driving license'),
	(5, 'A-driving license'),
	(6, 'B96-driving license'),
	(7, 'BE-driving license'),
	(8, 'C1-driving license'),
	(9, 'D1-driving license'),
	(10, 'C1E-driving license'),
	(11, 'CE-driving license'),
	(12, 'Q / T-qualification, qualification terrestrial network Jobs'),
	(13, 'ADR-driving permit'),
	(14, 'Fire extinguishing Card AS1'),
	(15, 'AT-qualification'),
	(16, 'First Aid 1'),
	(17, 'First Aid 2'),
	(18, 'Special transport lollipop training - STLT'),
	(19, 'The person I bought the card'),
	(20, 'Elevator Safety Examination'),
	(21, 'Weldqualifications'),
	(22, 'Age limit passi'),
	(23, 'Security guard card'),
	(24, 'Gas sprayer permission'),
	(25, 'Matupa - the tourism security passport'),
	(26, 'Wet room waterproof- ing system fitters Certificate'),
	(27, 'Patient Handling Ergonomics Card'),
	(28, 'Piping Passport'),
	(30, 'Fall periodic inspector'),
	(31, 'Wood security card'),
	(32, 'Bridge Crane Card'),
	(33, 'Social and health security card'),
	(34, 'Specialist expert card'),
	(35, 'Electrical Safety Card'),
	(36, 'Electrical safety Degree 1'),
	(37, 'Electrical safety Degree 2'),
	(38, 'Electrical safety Degree 3'),
	(39, 'Electrical Safety Course SFS 6002'),
	(40, 'T-qualification, qualification Networking Jobs'),
	(41, 'Roadsafety card 1'),
	(42, 'Roadsafety card 2'),
	(43, 'Truck card'),
	(45, 'Security adviser course'),
	(47, 'Use of hazardous chemicals management'),
	(48, 'Security guard card'),
	(49, 'Water Hygiene Passport'),
	(50, 'Water work card'),
	(51, 'Security protector card'),
	(52, 'Työhyvinvointikortti'),
	(53, 'Wellbeing at Work Card');
/*!40000 ALTER TABLE `kortit_english` ENABLE KEYS */;


-- Dumping structure for taulu osaamispankki.koulutukset
CREATE TABLE IF NOT EXISTS `koulutukset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `koulutusnimi` varchar(50) CHARACTER SET ujis DEFAULT NULL,
  `koulutusaste` varchar(50) DEFAULT NULL,
  `oppilaitos` varchar(50) DEFAULT NULL,
  `alkoi` varchar(50) DEFAULT NULL,
  `loppui` varchar(50) DEFAULT NULL,
  `sposti` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

-- Dumping data for table osaamispankki.koulutukset: ~10 rows (suunnilleen)
/*!40000 ALTER TABLE `koulutukset` DISABLE KEYS */;
INSERT INTO `koulutukset` (`id`, `koulutusnimi`, `koulutusaste`, `oppilaitos`, `alkoi`, `loppui`, `sposti`) VALUES
	(10, 'dog', NULL, NULL, NULL, NULL, 'dog2@esedu.fi'),
	(11, 'Datanomi', NULL, NULL, NULL, NULL, 'ppp@esedu.fi'),
	(12, NULL, NULL, NULL, NULL, NULL, '3213123123@esedu.fi'),
	(13, '123', NULL, NULL, NULL, NULL, '123123123@esedu.fi'),
	(14, '日本鯖', NULL, NULL, NULL, NULL, 'testtest@esedu.fi'),
	(15, NULL, NULL, NULL, NULL, NULL, 'dog@esedu.fi'),
	(90, NULL, NULL, NULL, NULL, NULL, 'manabu@esedu.fi'),
	(95, NULL, NULL, NULL, NULL, NULL, 'manabu@esedu.fi'),
	(114, '123', '123', '123', '123', '123', 'dog@esedulainen.fi'),
	(115, '12312312', '123222222', '123', '16.05.2016', '16.05.2016', 'riku.ronka@esedulainen.fi');
/*!40000 ALTER TABLE `koulutukset` ENABLE KEYS */;


-- Dumping structure for taulu osaamispankki.last_login
CREATE TABLE IF NOT EXISTS `last_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sposti` varchar(50) DEFAULT NULL,
  `lasttlogin` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- Dumping data for table osaamispankki.last_login: ~2 rows (suunnilleen)
/*!40000 ALTER TABLE `last_login` DISABLE KEYS */;
INSERT INTO `last_login` (`id`, `sposti`, `lasttlogin`) VALUES
	(40, 'dog@esedulainen.fi', '19.5.2016 12:32'),
	(41, 'samsung@esedulainen.fi', NULL);
/*!40000 ALTER TABLE `last_login` ENABLE KEYS */;


-- Dumping structure for taulu osaamispankki.opiskelijakortit
CREATE TABLE IF NOT EXISTS `opiskelijakortit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kid` int(11) NOT NULL,
  `knimi` varchar(50) DEFAULT NULL,
  `voimassa` varchar(50) DEFAULT NULL,
  `kommentti` varchar(50) DEFAULT NULL,
  `sposti` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

-- Dumping data for table osaamispankki.opiskelijakortit: ~6 rows (suunnilleen)
/*!40000 ALTER TABLE `opiskelijakortit` DISABLE KEYS */;
INSERT INTO `opiskelijakortit` (`id`, `kid`, `knimi`, `voimassa`, `kommentti`, `sposti`) VALUES
	(41, 0, 'Hygieniapassi', '10.05.2016', '123', 'dog@esedulainen.fi'),
	(43, 0, 'Työturvallisuuskortti', '123', 'wow', 'dog@esedulainen.fi'),
	(44, 0, 'B', '09.05.2016', '123', 'dog@esedulainen.fi'),
	(45, 0, 'B', '09.05.2016', '123', 'dog@esedulainen.fi'),
	(52, 0, 'A1', '21.05.2016', 'qwe', 'riku.ronka@esedulainen.fi'),
	(53, 0, 'Sosiaali- ja terveydenhuollon turvakortti', '01.05.2016', '??', 'riku.ronka@esedulainen.fi'),
	(55, 0, 'B-ajokortti', '01.05.2016', 'hggg', 'samsung@esedulainen.fi');
/*!40000 ALTER TABLE `opiskelijakortit` ENABLE KEYS */;


-- Dumping structure for taulu osaamispankki.paikkakunnat
CREATE TABLE IF NOT EXISTS `paikkakunnat` (
  `postinro` varchar(7) NOT NULL,
  `paikkakunta` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`postinro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table osaamispankki.paikkakunnat: ~0 rows (suunnilleen)
/*!40000 ALTER TABLE `paikkakunnat` DISABLE KEYS */;
/*!40000 ALTER TABLE `paikkakunnat` ENABLE KEYS */;


-- Dumping structure for taulu osaamispankki.tyo
CREATE TABLE IF NOT EXISTS `tyo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tyopaikka` varchar(50) CHARACTER SET ujis DEFAULT NULL,
  `tehtava` varchar(50) CHARACTER SET ujis DEFAULT NULL,
  `alkoi` varchar(50) CHARACTER SET ujis DEFAULT NULL,
  `loppui` varchar(50) CHARACTER SET ujis DEFAULT NULL,
  `kuvaus` varchar(50) CHARACTER SET ujis DEFAULT NULL,
  `sposti` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=199 DEFAULT CHARSET=latin1;

-- Dumping data for table osaamispankki.tyo: ~10 rows (suunnilleen)
/*!40000 ALTER TABLE `tyo` DISABLE KEYS */;
INSERT INTO `tyo` (`id`, `tyopaikka`, `tehtava`, `alkoi`, `loppui`, `kuvaus`, `sposti`) VALUES
	(50, 'Japani', 'Japanin opiskelu', '01.04.2016', '30.04.2016', 'Tons of kanjis, \r\nhiragana + katakana', 'ppp@esedu.fi'),
	(54, 'Jeij', 'it', '0000-00-00', '0000-00-00', 'works', 'random@esedu.fi'),
	(56, '11111111111', '345345', '0000-00-00', '0000-00-00', '34345', 'pppp@esedu.fi'),
	(62, '字', '学', '毎日', '明日', '宇', 'testtest@esedu.fi'),
	(185, '123123', '123', '123', '123', '123', 'riku.ronka@esedulainen.fi'),
	(188, 'reerg', 'greer', '123123', '123123', '123123', 'riku.ronka@esedulainen.fi'),
	(189, '123123', '123', '123', '123', '', 'riku.ronka@esedulainen.fi'),
	(190, '12322222222222', '123', '123', '123', '123', 'riku.ronka@esedulainen.fi'),
	(191, '12322222222222', '123', '123', '123', '123', 'riku.ronka@esedulainen.fi'),
	(198, '123123', '123123123123123', '123123', '123', '123', 'dog@esedulainen.fi');
/*!40000 ALTER TABLE `tyo` ENABLE KEYS */;


-- Dumping structure for taulu osaamispankki.vahvistamattomatkayttajat
CREATE TABLE IF NOT EXISTS `vahvistamattomatkayttajat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etunimi` varchar(50) DEFAULT NULL,
  `sposti` varchar(50) DEFAULT NULL,
  `salasana` varchar(50) DEFAULT NULL,
  `key` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table osaamispankki.vahvistamattomatkayttajat: ~5 rows (suunnilleen)
/*!40000 ALTER TABLE `vahvistamattomatkayttajat` DISABLE KEYS */;
INSERT INTO `vahvistamattomatkayttajat` (`id`, `etunimi`, `sposti`, `salasana`, `key`) VALUES
	(4, 'リク', 'destiny@esedu.fi', '202cb962ac59075b964b07152d234b70', '05c2c8dcc5ef0528733426e3f08e3640'),
	(6, 'りく', 'prto@esedu.fi', '202cb962ac59075b964b07152d234b70', 'd3fd52c0591b02f5030f6ad719728d3b'),
	(8, 'moi', 'aeawe@esedu.fi', '202cb962ac59075b964b07152d234b70', '464c23902775ceb85788219c85e0ab45'),
	(10, 'dog', 'random@esedu.fi', '202cb962ac59075b964b07152d234b70', '25d0fe462039cabb7ee78cb180e91679');
/*!40000 ALTER TABLE `vahvistamattomatkayttajat` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
