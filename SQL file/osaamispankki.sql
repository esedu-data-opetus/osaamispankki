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


-- Dumping structure for taulu rosaamispankki.henkilotiedot
CREATE TABLE IF NOT EXISTS `henkilotiedot` (
  `henkId` int(11) NOT NULL AUTO_INCREMENT,
  `eNimi` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `pkuva` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `sNimi` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `puhelinnro` varchar(50) DEFAULT NULL,
  `pitkaKuvaus` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `osoite` varchar(50) DEFAULT NULL,
  `privSposti` varchar(50) DEFAULT NULL,
  `postinro` varchar(50) DEFAULT NULL,
  `spuoli` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `lyhytKuvaus` varchar(140) CHARACTER SET latin1 DEFAULT NULL,
  `sposti` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `ktyyppi` int(11) DEFAULT NULL,
  PRIMARY KEY (`henkId`)
) ENGINE=InnoDB DEFAULT CHARSET=sjis;

-- Tietojen vientiä ei oltu valittu.


-- Dumping structure for taulu osaamispankki.kirjautumistiedot
CREATE TABLE IF NOT EXISTS `kirjautumistiedot` (
  `henkiloId` int(11) NOT NULL AUTO_INCREMENT,
  `etunimi` varchar(50) CHARACTER SET ujis DEFAULT NULL,
  `sposti` varchar(50) CHARACTER SET ujis DEFAULT NULL,
  `salasana` varchar(50) DEFAULT NULL,
  `privSposti` varchar(50) DEFAULT NULL COMMENT 'Käyttäjän privaatti posti, jota lukee aktiivisesti',
  `ktyyppi` varchar(50) DEFAULT NULL COMMENT 'opiskelija, admin, työnantaja',
  `aktiivisuus` datetime DEFAULT NULL,
  `key` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`henkiloId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Tietojen vientiä ei oltu valittu.


-- Dumping structure for taulu osaamispankki.kortinomistajat
CREATE TABLE IF NOT EXISTS `kortinomistajat` (
  `henkiloId` int(11) NOT NULL,
  `korttiId` int(11) NOT NULL,
  `vapaa sana` varchar(50) DEFAULT NULL,
  `voimassaolo` date DEFAULT NULL,
  PRIMARY KEY (`henkiloId`,`korttiId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Tietojen vientiä ei oltu valittu.


-- Dumping structure for taulu osaamispankki.kortit
CREATE TABLE IF NOT EXISTS `kortit` (
  `korttiId` int(11) NOT NULL AUTO_INCREMENT,
  `kNimi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`korttiId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Tietojen vientiä ei oltu valittu.


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Tietojen vientiä ei oltu valittu.


-- Dumping structure for taulu osaamispankki.koulutus
CREATE TABLE IF NOT EXISTS `koulutus` (
  `kouluid` int(11) NOT NULL,
  `koulutusid` int(11) NOT NULL,
  `henkiloid` int(11) NOT NULL,
  `vapaa sana` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`koulutusid`,`henkiloid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Tietojen vientiä ei oltu valittu.


-- Dumping structure for taulu osaamispankki.paikkakunnat
CREATE TABLE IF NOT EXISTS `paikkakunnat` (
  `postinro` varchar(7) NOT NULL,
  `paikkakunta` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`postinro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Tietojen vientiä ei oltu valittu.


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Tietojen vientiä ei oltu valittu.


-- Dumping structure for taulu rosaamispankki.tyotyypit
CREATE TABLE IF NOT EXISTS `tyotyypit` (
  `tyyppiID` int(11) NOT NULL AUTO_INCREMENT,
  `tyyppinimi` int(11) DEFAULT NULL,
  `tyyppikuvaus` int(11) DEFAULT NULL,
  PRIMARY KEY (`tyyppiID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Tietojen vientiä ei oltu valittu.


-- Dumping structure for taulu osaamispankki.vahvistamattomatkayttajat
CREATE TABLE IF NOT EXISTS `vahvistamattomatkayttajat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etunimi` varchar(50) DEFAULT NULL,
  `sposti` varchar(50) DEFAULT NULL,
  `salasana` varchar(50) DEFAULT NULL,
  `key` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Tietojen vientiä ei oltu valittu.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
