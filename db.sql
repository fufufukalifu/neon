/*
SQLyog Ultimate v10.42 
MySQL - 5.6.26 : Database - db_Neon
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_Neon` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_Neon`;

/*Table structure for table `tb_bab` */

CREATE TABLE `tb_bab` (
  `id` int(10) NOT NULL,
  `judulBab` varchar(75) NOT NULL,
  `keterangan` text NOT NULL,
  `status` char(1) DEFAULT '1',
  `tingkatPelajaranID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_bab` */

insert  into `tb_bab`(`id`,`judulBab`,`keterangan`,`status`,`tingkatPelajaranID`) values (62,'Ciri-ciri mahluk hidup','','1',13),(63,'Perkembangan mahluk hidup','','1',13),(64,'Keseimbangan ekosistem','','1',13),(65,'Greetings','','1',14),(66,'Text','','1',14),(67,'Tenses','','1',14),(68,'Salam','','1',15),(69,'Jenis Teks','','1',15),(70,'Pola Kalimat','','1',15),(71,'Sejarah','','1',16),(72,'Perang Dunia II','','1',16),(73,'Perang Dunia I','','1',16),(74,'4','','1',16);

/*Table structure for table `tb_banksoal` */

CREATE TABLE `tb_banksoal` (
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
  `soal` text NOT NULL,
  `jawaban` char(1) NOT NULL,
  `kesulitan` char(1) NOT NULL,
  `id_bab` int(11) NOT NULL,
  `id_tingkat-pelajaran` int(11) NOT NULL,
  `sumber` varchar(100) NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `publish` char(1) NOT NULL,
  PRIMARY KEY (`id_soal`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tb_banksoal` */

insert  into `tb_banksoal`(`id_soal`,`soal`,`jawaban`,`kesulitan`,`id_bab`,`id_tingkat-pelajaran`,`sumber`,`create_by`,`publish`) values (1,'1','','',62,0,'','',''),(2,'2','','',62,0,'','',''),(3,'3','','',62,0,'','',''),(4,'4','','',63,0,'','',''),(5,'5','','',63,0,'','','');

/*Table structure for table `tb_guru` */

CREATE TABLE `tb_guru` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `namaDepan` varchar(32) NOT NULL,
  `namaBelakang` varchar(32) DEFAULT NULL,
  `alamat` text,
  `noKontak` varchar(15) DEFAULT NULL,
  `penggunaID` int(10) DEFAULT NULL,
  `mataPelajaranID` int(10) DEFAULT NULL,
  `biografi` text,
  `photo` varchar(32) DEFAULT 'default.jpg',
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `penggunaID` (`penggunaID`),
  KEY `a` (`mataPelajaranID`),
  CONSTRAINT `tb_guru_ibfk_2` FOREIGN KEY (`penggunaID`) REFERENCES `tb_pengguna` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `tb_guru_ibfk_3` FOREIGN KEY (`mataPelajaranID`) REFERENCES `tb_mata-pelajaran` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `tb_guru` */

insert  into `tb_guru`(`id`,`namaDepan`,`namaBelakang`,`alamat`,`noKontak`,`penggunaID`,`mataPelajaranID`,`biografi`,`photo`,`status`) values (21,'sasda','asd','qqwe','45',NULL,NULL,'Sed aliquet dui auctor blandit ipsum tincidunt\r\nQuis rhoncus lorem dolor eu sem. Aenean enim risus, convallis id ultrices eget.','default.png','1'),(34,'Johny','Subejo','Deep','089656469669',42,2,NULL,'default.png','1');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_komen` */

insert  into `tb_komen`(`id`,`isiKomen`,`timestampe`,`videoID`,`userID`) values (1,'comment','2016-09-09 12:55:43',9,3);

/*Table structure for table `tb_latihan` */

CREATE TABLE `tb_latihan` (
  `id_latihan` int(11) NOT NULL AUTO_INCREMENT,
  `nm_latihan` varchar(75) NOT NULL,
  `create_by` varchar(75) NOT NULL,
  `id_paket` int(11) NOT NULL,
  PRIMARY KEY (`id_latihan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_latihan` */

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

/*Table structure for table `tb_mm-paketbank` */

CREATE TABLE `tb_mm-paketbank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paket` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_mm-paketbank` */

/*Table structure for table `tb_mm-tryoutpaket` */

CREATE TABLE `tb_mm-tryoutpaket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tryout` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_mm-tryoutpaket` */

/*Table structure for table `tb_paket` */

CREATE TABLE `tb_paket` (
  `id_paket` int(11) NOT NULL AUTO_INCREMENT,
  `nm_paket` varchar(75) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `jumlah_soal` int(11) NOT NULL,
  `durasi` int(11) NOT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=latin1;

/*Data for the table `tb_paket` */

insert  into `tb_paket`(`id_paket`,`nm_paket`,`deskripsi`,`status`,`jumlah_soal`,`durasi`) values (1,'nama','des',0,1,1),(130,'1','1',0,10,1),(131,'opik','opik',0,10,12),(132,'132','15',0,321,32),(133,'lakjd','lkjd',0,10,123),(134,'qwe','qwe',0,10,123),(135,'opik','opik',0,10,10),(136,'2','2',0,20,2),(137,'12','20',0,12,0),(138,'judul','10',0,0,0),(139,'','',0,0,0),(140,'12','12',0,10,123),(141,'dasd','asd',0,10,123),(142,'1','1',0,10,1),(143,'1','1',0,10,1),(144,'5','5',1,10,5),(145,'111','111',0,10,111),(146,'Buat Ilham','buat ilham',0,10,10);

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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pengguna` */

insert  into `tb_pengguna`(`id`,`namaPengguna`,`kataSandi`,`eMail`,`regTime`,`aktivasi`,`avatar`,`oauth_uid`,`oauth_provider`,`hakAkses`,`status`,`last_akses`) values (3,'siswa','bcd724d15cde8c47650fda962968f102','','2016-09-05 14:18:08','1',NULL,NULL,NULL,'siswa','1','2016-09-08 21:47:20'),(41,'siswabageur','efe6398127928f1b2e9ef3207fb82663','goichissnime@gmail.com','2016-09-13 14:18:15','1',NULL,NULL,NULL,'siswa','1','2016-09-13 14:18:15'),(42,'guru','77e69c137812518e359196bb2f5e9bb9','goichinime@gmail.com','2016-09-13 14:21:13','1',NULL,NULL,NULL,'guru','1','2016-09-13 14:21:13');

/*Table structure for table `tb_piljawaban` */

CREATE TABLE `tb_piljawaban` (
  `id_pilihan` int(11) NOT NULL AUTO_INCREMENT,
  `pilihan` char(1) NOT NULL,
  `jawaban` text NOT NULL,
  `id_soal` int(11) NOT NULL,
  PRIMARY KEY (`id_pilihan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_piljawaban` */

/*Table structure for table `tb_report-latihan` */

CREATE TABLE `tb_report-latihan` (
  `id_report-latihan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(11) NOT NULL,
  `id_latihan` int(11) NOT NULL,
  `jmlh_kosong` int(11) NOT NULL,
  `jmlh_benar` int(11) NOT NULL,
  `jmlh_salah` int(11) NOT NULL,
  `total_nilai` int(11) NOT NULL,
  `tgl_pengerjaan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_report-latihan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_report-latihan` */

/*Table structure for table `tb_report-tryout` */

CREATE TABLE `tb_report-tryout` (
  `id_report` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(11) NOT NULL,
  `id_mm-tryout-paket` int(11) NOT NULL,
  `jmlh_kosong` int(11) NOT NULL,
  `jmlh_benar` int(11) NOT NULL,
  `jmlh_salah` int(11) NOT NULL,
  `total_nilai` int(11) NOT NULL,
  `tgl_pengerjaan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_report`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_report-tryout` */

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
  `photo` varchar(32) DEFAULT 'default.jpg',
  `biografi` text,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `penggunaID` (`penggunaID`),
  CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`penggunaID`) REFERENCES `tb_pengguna` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tb_siswa` */

insert  into `tb_siswa`(`id`,`namaDepan`,`namaBelakang`,`alamat`,`noKontak`,`namaSekolah`,`alamatSekolah`,`noKontakSekolah`,`penggunaID`,`photo`,`biografi`,`status`) values (2,'nama depan','nama belakang','alamat saya','dfakdjafkl','s.dki','dfd',0,NULL,'default.png',NULL,''),(3,'qw','qw','qwqw','4324234','Sma Panjalu','ss',0,NULL,'default.jpg',NULL,''),(6,'siswa','bageur','Cikapundung','345345345','Sma Panjalu','Jalan Pasuruan',0,41,'smailll.jpg',NULL,'');

/*Table structure for table `tb_subbab` */

CREATE TABLE `tb_subbab` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `judulSubBab` varchar(75) NOT NULL,
  `babID` int(10) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `keterangan` text,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `babID` (`babID`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

/*Data for the table `tb_subbab` */

insert  into `tb_subbab`(`id`,`judulSubBab`,`babID`,`date_created`,`keterangan`,`status`) values (31,'Hewan',62,NULL,'onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(32,'Melestarikan Jenis',63,'2016-09-19 10:55:35','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(33,'Berkembang Biak',63,'2016-09-19 10:55:37','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(34,'Kegiatan Manusia',64,'2016-09-19 10:55:37','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(35,'Greetings 1',65,'2016-09-19 10:55:38','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(36,'Narative Text',66,'2016-09-19 10:55:38','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(37,'Present Tense',67,'2016-09-19 10:55:39','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(38,'Perfect Tense',67,'2016-09-19 10:55:39','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(39,'Salam 1',68,'2016-09-19 10:55:39','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(40,'Gaya Salam',68,'2016-09-19 10:55:40','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(41,'Jenis Teks',69,'2016-09-19 10:55:40','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(42,'Laporan',69,'2016-09-19 10:55:40','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(43,'Pola Kalimat 1',70,'2016-09-19 10:55:41','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(44,'Polat Kalimat 2',70,'2016-09-19 10:55:41','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(45,'Sejarah',71,'2016-09-19 10:55:43','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(46,'Tujuan Belajar Sejarah',71,'2016-09-19 10:55:44','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(47,'Deskripsi Singkat',72,'2016-09-19 10:55:44','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(48,'Penyebab',72,'2016-09-19 10:55:45','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(49,'Deskripsi Singkat',73,'2016-09-19 10:55:45','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(50,'Penyebab',73,'2016-09-19 10:55:46','onec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis','1'),(51,'',NULL,'2016-09-19 10:55:33',NULL,NULL);

/*Table structure for table `tb_tingkat` */

CREATE TABLE `tb_tingkat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aliasTingkat` varchar(10) DEFAULT NULL,
  `namaTingkat` varchar(32) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tb_tingkat` */

insert  into `tb_tingkat`(`id`,`aliasTingkat`,`namaTingkat`,`status`) values (1,'SD','Sekolah Dasar',1),(2,'SMP','Sekolah Menengah Pertama',1),(3,'SMK','Sekolah Menengah Kejuruan',1),(4,'SMA','Sekolah Menengah Atas',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `tb_tingkat-pelajaran` */

insert  into `tb_tingkat-pelajaran`(`id`,`tingkatID`,`mataPelajaranID`,`keterangan`,`status`) values (13,1,1,'IPA-SD','1'),(14,4,3,'INGGRIS-SMA','1'),(15,2,4,'INDONESIA-SMP','1'),(16,3,2,'SMK-IPS','1'),(17,2,1,'untuk SMP IPA','1');

/*Table structure for table `tb_tryout` */

CREATE TABLE `tb_tryout` (
  `id_tryout` int(11) NOT NULL AUTO_INCREMENT,
  `nm_tryout` varchar(75) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_berhenti` date NOT NULL,
  `publish` char(1) NOT NULL,
  PRIMARY KEY (`id_tryout`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_tryout` */

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tb_video` */

insert  into `tb_video`(`id`,`judulVideo`,`namaFile`,`deskripsi`,`path`,`guruID`,`published`,`subBabID`,`status`) values (9,'Cicak','algoritma1.mp4','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n',NULL,34,NULL,34,'1'),(10,'Penebangan','algoritma1.mp4','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',NULL,34,NULL,34,'1'),(11,'Perburuan Liar','algoritma1.mp4','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.',NULL,34,NULL,34,'1'),(12,NULL,NULL,NULL,NULL,34,NULL,34,'1');

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
