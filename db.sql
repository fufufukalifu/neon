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
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

/*Data for the table `tb_bab` */

insert  into `tb_bab`(`id`,`judulBab`,`keterangan`,`status`,`tingkatPelajaranID`) values (62,'Ciri-ciri mahluk hidup','','1',13),(63,'Perkembangan mahluk hidup','','1',13),(64,'Keseimbangan ekosistem','','1',13),(65,'Greetings','','1',14),(66,'Text','','1',14),(67,'Tenses','','1',14),(68,'Salam','','1',15),(69,'Jenis Teks','','1',15),(70,'Pola Kalimat','','1',15),(71,'Sejarah','','1',16),(72,'Perang Dunia II','','1',16),(73,'Perang Dunia I','','1',16),(74,'4','','1',16);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_guru` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_komen` */

/*Table structure for table `tb_mata-pelajaran` */

CREATE TABLE `tb_mata-pelajaran` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aliasMataPelajaran` varchar(10) NOT NULL,
  `namaMataPelajaran` varchar(32) NOT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tb_mata-pelajaran` */

insert  into `tb_mata-pelajaran`(`id`,`aliasMataPelajaran`,`namaMataPelajaran`,`status`) values (1,'IPA','Ilmu Pengetahuan Alam',1),(2,'IPS','Ilmu Pengetahuan Sosial',1),(3,'ING','Bahasa Inggris',1),(4,'IND','Bahasa Indonesia',1);

/*Table structure for table `tb_pengguna` */

CREATE TABLE `tb_pengguna` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `namaPengguna` varchar(32) DEFAULT NULL,
  `kataSandi` text,
  `eMail` varchar(64) NOT NULL,
  `regTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `aktivasi` char(1) DEFAULT NULL,
  `avatar` varchar(64) DEFAULT NULL,
  `oauth_uid` varchar(255) DEFAULT NULL,
  `oauth_provider` varchar(255) DEFAULT NULL,
  `hakAkses` varchar(12) DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  `last_akses` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pengguna` */

insert  into `tb_pengguna`(`id`,`namaPengguna`,`kataSandi`,`eMail`,`regTime`,`aktivasi`,`avatar`,`oauth_uid`,`oauth_provider`,`hakAkses`,`status`,`last_akses`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','','2016-08-26 13:01:29','1',NULL,NULL,NULL,'user','1','2016-09-08 21:47:20'),(3,'siswa','bcd724d15cde8c47650fda962968f102','','2016-09-05 14:18:08','1',NULL,NULL,NULL,'siswa','1','2016-09-08 21:47:20'),(4,'guru','77e69c137812518e359196bb2f5e9bb9','','2016-09-05 14:18:38','1',NULL,NULL,NULL,'guru','1','2016-09-08 21:47:20'),(5,NULL,NULL,'opik.sutisna@mail.unpas.ac.id','2016-09-08 21:47:25','1',NULL,'1875070992721359','facebook','siswa','1','2016-09-08 17:06:57'),(6,'fufufukalifu','21232f297a57a5a743894a0e4a801fc3','op.sutisna@gmail.com','2016-09-08 21:57:31','1',NULL,NULL,NULL,'siswa','1','2016-09-08 21:57:31');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_siswa` */

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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*Data for the table `tb_subbab` */

insert  into `tb_subbab`(`id`,`judulSubBab`,`babID`,`keterangan`,`status`) values (31,'Hewan',62,NULL,'1'),(32,'Melestarikan Jenis',63,NULL,'1'),(33,'Berkembang Biak',63,NULL,'1'),(34,'Kegiatan Manusia',64,NULL,'1'),(35,'Greetings 1',65,NULL,'1'),(36,'Narative Text',66,NULL,'1'),(37,'Present Tense',67,NULL,'1'),(38,'Perfect Tense',67,NULL,'1'),(39,'Salam 1',68,NULL,'1'),(40,'Gaya Salam',68,NULL,'1'),(41,'Jenis Teks',69,NULL,'1'),(42,'Laporan',69,NULL,'1'),(43,'Pola Kalimat 1',70,NULL,'1'),(44,'Polat Kalimat 2',70,NULL,'1'),(45,'Sejarah',71,NULL,'1'),(46,'Tujuan Belajar Sejarah',71,NULL,'1'),(47,'Deskripsi Singkat',72,NULL,'1'),(48,'Penyebab',72,NULL,'1'),(49,'Deskripsi Singkat',73,NULL,'1'),(50,'Penyebab',73,NULL,'1');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tb_tingkat-pelajaran` */

insert  into `tb_tingkat-pelajaran`(`id`,`tingkatID`,`mataPelajaranID`,`keterangan`,`status`) values (13,2,1,'IPA-SD','1'),(14,1,3,'INGGRIS-SMA','1'),(15,3,4,'INDONESIA-SMP','1'),(16,4,2,'SMK-IPS','1');

/*Table structure for table `tb_video` */

CREATE TABLE `tb_video` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `judulVideo` varchar(32) DEFAULT NULL,
  `namaFile` varchar(32) DEFAULT NULL,
  `deskripsi` text,
  `path` varchar(64) DEFAULT NULL,
  `guruID` int(10) DEFAULT NULL,
  `published` char(1) DEFAULT NULL,
  `subBabID` int(10) DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `tb_video_ibfk_1` (`subBabID`),
  KEY `tb_video_ibfk_2` (`guruID`),
  CONSTRAINT `tb_video_ibfk_1` FOREIGN KEY (`subBabID`) REFERENCES `tb_subbab` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `tb_video_ibfk_2` FOREIGN KEY (`guruID`) REFERENCES `tb_guru` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tb_video` */

insert  into `tb_video`(`id`,`judulVideo`,`namaFile`,`deskripsi`,`path`,`guruID`,`published`,`subBabID`,`status`) values (9,'Cicak','algoritma.mp4','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n',NULL,NULL,NULL,31,'1'),(10,'Penebangan','algoritma.mp4','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',NULL,NULL,NULL,34,'1'),(11,'Perburuan Liar','algoritma.mp4','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',NULL,NULL,NULL,34,'1');

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
