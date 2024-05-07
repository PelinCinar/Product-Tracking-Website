# Host: localhost  (Version 5.5.5-10.1.29-MariaDB)
# Date: 2024-04-11 20:15:01
# Generator: MySQL-Front 6.0  (Build 2.13)


#
# Structure for table "calisan"
#

DROP TABLE IF EXISTS `calisan`;
CREATE TABLE `calisan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Ad` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Soyad` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Sifre` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

#
# Data for table "calisan"
#

INSERT INTO `calisan` VALUES (1,'Umut','Yilmaz','33'),(2,'Servet','Abi','666'),(9,'Ahmet','Demir','44'),(10,'Mehmet','TaÅŸ','QNU67F');

#
# Structure for table "urun"
#

DROP TABLE IF EXISTS `urun`;
CREATE TABLE `urun` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `u_adi` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `u_adedi` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `u_fiyati` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

#
# Data for table "urun"
#

INSERT INTO `urun` VALUES (1,'Parol','900','50'),(2,'Dolarex','5','85'),(3,'Deloday','410','20'),(4,'Pharmatol','3466','5'),(5,'Bioxcin','264','500'),(6,'Coraspin','198','1000');

#
# Structure for table "yetkili"
#

DROP TABLE IF EXISTS `yetkili`;
CREATE TABLE `yetkili` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Ad` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Soyad` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Sifre` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

#
# Data for table "yetkili"
#

INSERT INTO `yetkili` VALUES (1,'Pelin','Cinar','123'),(2,'Ugur','Bilgic','321'),(3,'admin','admin','1234');
