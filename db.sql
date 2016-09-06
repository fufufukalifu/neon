/*
SQLyog Ultimate v10.42 
MySQL - 5.6.26 : Database - db_netjoo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_netjoo` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_netjoo`;

/*Table structure for table `tb_bab` */

CREATE TABLE `tb_bab` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `judulBab` varchar(75) NOT NULL,
  `keterangan` text NOT NULL,
  `status` char(1) DEFAULT '1',
  `tingkatPelajaranID` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tinkatPelajaranID` (`tingkatPelajaranID`),
  CONSTRAINT `tb_bab_ibfk_1` FOREIGN KEY (`tingkatPelajaranID`) REFERENCES `tb_tingkat-pelajaran` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

/*Data for the table `tb_bab` */

insert  into `tb_bab`(`id`,`judulBab`,`keterangan`,`status`,`tingkatPelajaranID`) values (1,'IPA SD BAB 6','','1',4),(2,'IPA SD BAB 1','','1',4),(3,'IPA SD BAB 2','','1',4),(4,'IPA SD BAB 3','','1',4),(5,'IPA SD BAB 4','','1',4),(6,'IPA SD BAB 5','','1',4),(7,'ENGLISH SD BAB 1','','1',6),(8,'ENGLISH SD BAB 2','','1',6),(9,'ENGLISH SD BAB 3','','1',6),(10,'ENGLISH SD BAB 4','','1',6),(11,'ENGLISH SD BAB 5','','1',6),(12,'IPS SD BAB 1','','1',5),(13,'IPS SD BAB 2','','1',5),(14,'IPS SD BAB 3','','1',5),(15,'IPS SD BAB 4','','1',5),(16,'IPA SMP BAB 6','','1',7),(17,'IPA SMP BAB 1','','1',7),(18,'IPA SMP BAB 2','','1',7),(19,'IPA SMP BAB 3','','1',7),(20,'IPA SMP BAB 4','','1',7),(21,'IPA SMP BAB 5','','1',7),(22,'ENGLISH SMP BAB 1','','1',9),(23,'ENGLISH SMP BAB 2','','1',9),(24,'ENGLISH SMP BAB 3','','1',9),(25,'ENGLISH SMP BAB 4','','1',9),(26,'ENGLISH SMP BAB 5','','1',9),(27,'IPS SMP BAB 1','','1',8),(28,'IPS SMP BAB 2','','1',8),(29,'IPS SMP BAB 3','','1',8),(30,'IPS SMP BAB 4','','1',8),(31,'IPA SMK BAB 6','','1',10),(32,'IPA SMK BAB 1','','1',10),(33,'IPA SMK BAB 2','','1',10),(34,'IPA SMK BAB 3','','1',10),(35,'IPA SMK BAB 4','','1',10),(36,'IPA SMK BAB 5','','1',10),(37,'ENGLISH SMK BAB 1','','1',12),(38,'ENGLISH SMK BAB 2','','1',12),(39,'ENGLISH SMK BAB 3','','1',12),(40,'ENGLISH SMK BAB 4','','1',12),(41,'ENGLISH SMK BAB 5','','1',12),(42,'IPS SMK BAB 1','','1',11),(43,'IPS SMK BAB 2','','1',11),(44,'IPS SMK BAB 3','','1',11),(45,'IPS SMK BAB 4','','1',11),(46,'IPA SMA BAB 6','','1',1),(47,'IPA SMA BAB 1','','1',1),(48,'IPA SMA BAB 2','','1',1),(49,'IPA SMA BAB 3','','1',1),(50,'IPA SMA BAB 4','','1',1),(51,'IPA SMA BAB 5','','1',1),(52,'ENGLISH SMA BAB 1','','1',3),(53,'ENGLISH SMA BAB 2','','1',3),(54,'ENGLISH SMA BAB 3','','1',3),(55,'ENGLISH SMA BAB 4','','1',3),(56,'ENGLISH SMA BAB 5','','1',3),(57,'IPS SMA BAB 1','','1',2),(58,'IPS SMA BAB 2','','1',2),(59,'IPS SMA BAB 3','','1',2),(60,'IPS SMA BAB 4','','1',2),(61,'','','1',2);

/*Table structure for table `tb_guru` */

CREATE TABLE `tb_guru` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(200) NOT NULL,
  `namaDepan` varchar(32) NOT NULL,
  `namaBelakang` varchar(32) DEFAULT NULL,
  `mataPelajaran` varchar(32) NOT NULL,
  `alamat` text,
  `noKontak` varchar(15) DEFAULT NULL,
  `penggunaID` int(10) DEFAULT NULL,
  `mataPelajaranID` int(10) DEFAULT NULL,
  `biografi` text,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `penggunaID` (`penggunaID`),
  KEY `a` (`mataPelajaranID`),
  CONSTRAINT `tb_guru_ibfk_2` FOREIGN KEY (`penggunaID`) REFERENCES `tb_pengguna` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `tb_guru_ibfk_3` FOREIGN KEY (`mataPelajaranID`) REFERENCES `tb_mata-pelajaran` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=218 DEFAULT CHARSET=latin1;

/*Data for the table `tb_guru` */

insert  into `tb_guru`(`id`,`uuid`,`namaDepan`,`namaBelakang`,`mataPelajaran`,`alamat`,`noKontak`,`penggunaID`,`mataPelajaranID`,`biografi`,`status`) values (203,'','Ferris','Dominique','Physic',NULL,NULL,NULL,NULL,'Ini adalah biografi Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco','1'),(204,'','Thor','Breanna','Physic',NULL,NULL,NULL,NULL,'Ini adalah biografi Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco','1'),(205,'','Boris','Lani','Physic',NULL,NULL,NULL,NULL,'Ini adalah biografi Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco','1'),(206,'','Jonas','Donna','Physic',NULL,NULL,NULL,NULL,'Ini adalah biografi Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco','1'),(207,'','Dolan','Evangeline','Chemistry',NULL,NULL,4,1,'Ini adalah biografi Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco','1'),(208,'','Kyle','Maggie','Physic',NULL,NULL,NULL,NULL,'Ini adalah biografi Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco','1'),(209,'','Ferris','Kiayada','Physic',NULL,NULL,NULL,NULL,'Ini adalah biografi Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco','1'),(210,'','Mohammad','Xena','Physic',NULL,NULL,NULL,NULL,'Ini adalah biografi Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco','1'),(211,'','Nigel','Francesca','Math',NULL,NULL,NULL,NULL,'Ini adalah biografi Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco','1'),(212,'','Xavier','Karleigh','Chemistry',NULL,NULL,NULL,NULL,'Ini adalah biografi Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco','1'),(213,'','Hiram','Kristen','English',NULL,NULL,NULL,NULL,'Ini adalah biografi Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco','1'),(214,'','Lucian','Lynn','Math',NULL,NULL,NULL,NULL,'Ini adalah biografi Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco','1'),(215,'','Gareth','Brenna','English',NULL,NULL,NULL,NULL,'Ini adalah biografi Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco','1'),(216,'','Akeem','Gretchen','English',NULL,NULL,NULL,NULL,'Ini adalah biografi Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco','1'),(217,'','Giacomo','Ori','Math',NULL,NULL,NULL,NULL,'Ini adalah biografi Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco','1');

/*Table structure for table `tb_komen` */

CREATE TABLE `tb_komen` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `isiKomen` text,
  `timestampe` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `videoID` int(10) DEFAULT NULL,
  `userID` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `videoID` (`videoID`),
  KEY `tb_komen_ibfk_2` (`userID`),
  CONSTRAINT `tb_komen_ibfk_1` FOREIGN KEY (`videoID`) REFERENCES `tb_video` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `tb_komen_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `tb_pengguna` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_komen` */

insert  into `tb_komen`(`id`,`isiKomen`,`timestampe`,`videoID`,`userID`) values (1,'Lorem ipsum dolor sit amet, eu vide nusquam sed, sit et vitae vocent. At est possit numquam percipit. Vidisse aliquip comprehensam pro cu, vim ex dolore docendi. komen by guru','2016-09-05 14:28:02',1,4),(2,'Lorem ipsum dolor sit amet, eu vide nusquam sed, sit et vitae vocent. At est possit numquam percipit. Vidisse aliquip comprehensam pro cu, vim ex dolore docendi. komen by siswa','2016-09-05 14:28:56',1,3);

/*Table structure for table `tb_mata-pelajaran` */

CREATE TABLE `tb_mata-pelajaran` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uuidMapel` varchar(200) NOT NULL,
  `aliasMataPelajaran` varchar(10) NOT NULL,
  `namaMataPelajaran` varchar(32) NOT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tb_mata-pelajaran` */

insert  into `tb_mata-pelajaran`(`id`,`uuidMapel`,`aliasMataPelajaran`,`namaMataPelajaran`,`status`) values (1,'629bfcea-70fa-11e6-aa82-0cd292656f16','IPA','Ilmu Pengetahuan Alam',1),(2,'62a341e4-70fa-11e6-aa82-0cd292656f16','IPS','Ilmu Pengetahuan Sosial',1),(3,'62a34302-70fa-11e6-aa82-0cd292656f16','ING','Bahasa Inggris',1),(4,'62a34374-70fa-11e6-aa82-0cd292656f16','IND','Bahasa Indonesia',1);

/*Table structure for table `tb_pengguna` */

CREATE TABLE `tb_pengguna` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `namaPengguna` varchar(32) DEFAULT NULL,
  `kataSandi` text,
  `eMail` varchar(64) NOT NULL,
  `regTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `aktivasi` char(1) DEFAULT NULL,
  `hakAkses` varchar(12) DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pengguna` */

insert  into `tb_pengguna`(`id`,`namaPengguna`,`kataSandi`,`eMail`,`regTime`,`aktivasi`,`hakAkses`,`status`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','','2016-08-26 13:01:29',NULL,'user','1'),(3,'siswa','bcd724d15cde8c47650fda962968f102','','2016-09-05 14:18:08','1','siswa','1'),(4,'guru','77e69c137812518e359196bb2f5e9bb9','','2016-09-05 14:18:38','1','guru','1');

/*Table structure for table `tb_siswa` */

CREATE TABLE `tb_siswa` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `namaDepan` varchar(32) NOT NULL,
  `namaBelakang` varchar(32) DEFAULT NULL,
  `alamat` text NOT NULL,
  `noKontak` varchar(15) NOT NULL,
  `namaSekolah` varchar(50) NOT NULL,
  `alamatSekolah` text NOT NULL,
  `noKontakSekolah` int(15) NOT NULL,
  `penggunaID` int(10) DEFAULT NULL,
  `photo` varchar(32) DEFAULT NULL,
  `biografi` text,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `penggunaID` (`penggunaID`),
  CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`penggunaID`) REFERENCES `tb_pengguna` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_siswa` */

insert  into `tb_siswa`(`id`,`namaDepan`,`namaBelakang`,`alamat`,`noKontak`,`namaSekolah`,`alamatSekolah`,`noKontakSekolah`,`penggunaID`,`photo`,`biografi`,`status`) values (1,'opik','sutisba','jln.cibaduyut raya no 286','123123','jkjlk','',0,NULL,NULL,NULL,'');

/*Table structure for table `tb_subbab` */

CREATE TABLE `tb_subbab` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `judulSubBab` varchar(75) NOT NULL,
  `babID` int(10) DEFAULT NULL,
  `keterangan` text,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `babID` (`babID`),
  CONSTRAINT `tb_subbab_ibfk_1` FOREIGN KEY (`babID`) REFERENCES `tb_bab` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `tb_subbab` */

insert  into `tb_subbab`(`id`,`judulSubBab`,`babID`,`keterangan`,`status`) values (1,'IPA_SMA-bab1:Judul Sub 1',47,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(2,'IPA_SMA-bab1:Judul Sub 2',47,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(3,'IPA_SMA-bab1:Judul Sub 3',47,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(4,'IPA_SMA-bab2:Judul Sub 1',48,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(5,'IPA_SMA-bab2:Judul Sub 2',48,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(6,'IPA_SMA-bab2:Judul Sub 3',48,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(7,'IPA_SMA-bab3:Judul Sub 1',49,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(8,'IPA_SMA-bab3:Judul Sub 2',49,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(9,'IPA_SMA-bab3:Judul Sub 3',49,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(10,'IPA_SMA-bab3:Judul Sub 4',49,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(11,'IPA_SD-bab1:Judul Sub 1',2,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(12,'IPA_SD-bab1:Judul Sub 2',2,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(13,'IPA_SD-bab1:Judul Sub 3',2,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(14,'IPA_SD-bab2:Judul Sub 1',3,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(15,'IPA_SD-bab2:Judul Sub 2',3,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(16,'IPA_SD-bab2:Judul Sub 3',3,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(17,'IPA_SD-bab3:Judul Sub 1',4,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(18,'IPA_SD-bab3:Judul Sub 2',4,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(19,'IPA_SD-bab3:Judul Sub 3',4,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(20,'IPA_SD-bab3:Judul Sub 4',4,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(21,'IPA_SMK-bab1:Judul Sub 1',32,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(22,'IPA_SMK-bab1:Judul Sub 2',32,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(23,'IPA_SMK-bab1:Judul Sub 3',32,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(24,'IPA_SMK-bab2:Judul Sub 1',33,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(25,'IPA_SMK-bab2:Judul Sub 2',33,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(26,'IPA_SMK-bab2:Judul Sub 3',33,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(27,'IPA_SMK-bab3:Judul Sub 1',34,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(28,'IPA_SMK-bab3:Judul Sub 2',34,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(29,'IPA_SMK-bab3:Judul Sub 3',34,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL),(30,'IPA_SMK-bab3:Judul Sub 4',34,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n tempor incididunt ut labore',NULL);

/*Table structure for table `tb_tingkat` */

CREATE TABLE `tb_tingkat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aliasTingkat` varchar(10) DEFAULT NULL,
  `namaTingkat` varchar(32) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tb_tingkat` */

insert  into `tb_tingkat`(`id`,`aliasTingkat`,`namaTingkat`,`status`) values (1,'SMA','Sekolah Menengah Atas',1),(2,'SD','Sekolah Dasar',1),(3,'SMP','Sekolah Menengah Pertama',1),(4,'SMK','Sekolah Menengah Kejuruan',1);

/*Table structure for table `tb_tingkat-pelajaran` */

CREATE TABLE `tb_tingkat-pelajaran` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tingkatID` int(10) DEFAULT NULL,
  `mataPelajaranID` int(10) DEFAULT NULL,
  `keterangan` varchar(32) DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `tingkatID` (`tingkatID`),
  KEY `mataPelajaranID` (`mataPelajaranID`),
  CONSTRAINT `tb_tingkat-pelajaran_ibfk_1` FOREIGN KEY (`tingkatID`) REFERENCES `tb_tingkat` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `tb_tingkat-pelajaran_ibfk_2` FOREIGN KEY (`mataPelajaranID`) REFERENCES `tb_mata-pelajaran` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tb_tingkat-pelajaran` */

insert  into `tb_tingkat-pelajaran`(`id`,`tingkatID`,`mataPelajaranID`,`keterangan`,`status`) values (1,1,1,'SMA IPA','1'),(2,1,2,'SMA IPS\r\n','1'),(3,1,3,'SMA INGGRIS','1'),(4,2,1,'SD IPA','1'),(5,2,2,'SD IPS','1'),(6,2,3,'SD INGGRIS','1'),(7,3,1,'SMP IPA','1'),(8,3,2,'SMP IPS','1'),(9,3,3,'SMP INGGRIS','1'),(10,4,1,'SMK IPA','1'),(11,4,2,'SMK IPS','1'),(12,4,3,'SMK INGGRIS','1');

/*Table structure for table `tb_video` */

CREATE TABLE `tb_video` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `judulVideo` varchar(32) DEFAULT NULL,
  `namaFile` varchar(32) DEFAULT NULL,
  `deskripsi` text,
  `path` varchar(64) DEFAULT NULL,
  `guruID` int(10) DEFAULT NULL,
  `subBabID` int(10) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tb_video_ibfk_1` (`subBabID`),
  KEY `guruID` (`guruID`),
  CONSTRAINT `tb_video_ibfk_1` FOREIGN KEY (`subBabID`) REFERENCES `tb_subbab` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `tb_video_ibfk_2` FOREIGN KEY (`guruID`) REFERENCES `tb_guru` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tb_video` */

insert  into `tb_video`(`id`,`judulVideo`,`namaFile`,`deskripsi`,`path`,`guruID`,`subBabID`,`status`) values (1,'Judul video 0','algoritma1.mp4',' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non',NULL,207,1,1),(2,'Judul video 1','algoritma1.mp4',' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',NULL,207,1,1),(3,'Judul video 2','algoritma1.mp4',' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',NULL,207,1,1),(4,'Judul video 3','algoritma1.mp4',' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',NULL,207,1,1),(5,'Judul video 4','algoritma1.mp4',' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',NULL,207,2,1),(6,'Judul Video 5','algoritma1.mp4',' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',NULL,207,2,1),(7,'Judul Video 6','algoritma1.mp4',' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',NULL,207,2,1),(8,'Judul Video 7','algoritma1.mp4',' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',NULL,207,2,1);

/*Table structure for table `view_pelajaran_sd` */

DROP TABLE IF EXISTS `view_pelajaran_sd`;

/*!50001 CREATE TABLE  `view_pelajaran_sd`(
 `aliasMataPelajaran` varchar(10) ,
 `namaMataPelajaran` varchar(32) ,
 `aliasTingkat` varchar(10) 
)*/;

/*Table structure for table `view_pelajaran_sma` */

DROP TABLE IF EXISTS `view_pelajaran_sma`;

/*!50001 CREATE TABLE  `view_pelajaran_sma`(
 `aliasMataPelajaran` varchar(10) ,
 `namaMataPelajaran` varchar(32) ,
 `aliasTingkat` varchar(10) 
)*/;

/*Table structure for table `view_pelajaran_smk` */

DROP TABLE IF EXISTS `view_pelajaran_smk`;

/*!50001 CREATE TABLE  `view_pelajaran_smk`(
 `aliasMataPelajaran` varchar(10) ,
 `namaMataPelajaran` varchar(32) ,
 `aliasTingkat` varchar(10) 
)*/;

/*Table structure for table `view_pelajaran_smp` */

DROP TABLE IF EXISTS `view_pelajaran_smp`;

/*!50001 CREATE TABLE  `view_pelajaran_smp`(
 `aliasMataPelajaran` varchar(10) ,
 `namaMataPelajaran` varchar(32) ,
 `aliasTingkat` varchar(10) 
)*/;

/*View structure for view view_pelajaran_sd */

/*!50001 DROP TABLE IF EXISTS `view_pelajaran_sd` */;
/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pelajaran_sd` AS (select `pelajaran`.`aliasMataPelajaran` AS `aliasMataPelajaran`,`pelajaran`.`namaMataPelajaran` AS `namaMataPelajaran`,`tingkat`.`aliasTingkat` AS `aliasTingkat` from ((`tb_mata-pelajaran` `pelajaran` join `tb_tingkat-pelajaran` `t_p` on((`pelajaran`.`id` = `t_p`.`mataPelajaranID`))) join `tb_tingkat` `tingkat` on((`tingkat`.`id` = `t_p`.`tingkatID`))) where (`tingkat`.`aliasTingkat` = 'SD')) */;

/*View structure for view view_pelajaran_sma */

/*!50001 DROP TABLE IF EXISTS `view_pelajaran_sma` */;
/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pelajaran_sma` AS (select `pelajaran`.`aliasMataPelajaran` AS `aliasMataPelajaran`,`pelajaran`.`namaMataPelajaran` AS `namaMataPelajaran`,`tingkat`.`aliasTingkat` AS `aliasTingkat` from ((`tb_mata-pelajaran` `pelajaran` join `tb_tingkat-pelajaran` `t_p` on((`pelajaran`.`id` = `t_p`.`mataPelajaranID`))) join `tb_tingkat` `tingkat` on((`tingkat`.`id` = `t_p`.`tingkatID`))) where (`tingkat`.`aliasTingkat` = 'SMA')) */;

/*View structure for view view_pelajaran_smk */

/*!50001 DROP TABLE IF EXISTS `view_pelajaran_smk` */;
/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pelajaran_smk` AS (select `pelajaran`.`aliasMataPelajaran` AS `aliasMataPelajaran`,`pelajaran`.`namaMataPelajaran` AS `namaMataPelajaran`,`tingkat`.`aliasTingkat` AS `aliasTingkat` from ((`tb_mata-pelajaran` `pelajaran` join `tb_tingkat-pelajaran` `t_p` on((`pelajaran`.`id` = `t_p`.`mataPelajaranID`))) join `tb_tingkat` `tingkat` on((`tingkat`.`id` = `t_p`.`tingkatID`))) where (`tingkat`.`aliasTingkat` = 'SMK')) */;

/*View structure for view view_pelajaran_smp */

/*!50001 DROP TABLE IF EXISTS `view_pelajaran_smp` */;
/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pelajaran_smp` AS (select `pelajaran`.`aliasMataPelajaran` AS `aliasMataPelajaran`,`pelajaran`.`namaMataPelajaran` AS `namaMataPelajaran`,`tingkat`.`aliasTingkat` AS `aliasTingkat` from ((`tb_mata-pelajaran` `pelajaran` join `tb_tingkat-pelajaran` `t_p` on((`pelajaran`.`id` = `t_p`.`mataPelajaranID`))) join `tb_tingkat` `tingkat` on((`tingkat`.`id` = `t_p`.`tingkatID`))) where (`tingkat`.`aliasTingkat` = 'SMP')) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
