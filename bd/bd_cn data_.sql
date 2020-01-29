/*
SQLyog Enterprise - MySQL GUI v6.56
MySQL - 5.5.36 : Database - latorres
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`latorres` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `latorres`;

/*Table structure for table `asignacion` */

DROP TABLE IF EXISTS `asignacion`;

CREATE TABLE `asignacion` (
  `tarea_id` bigint(20) NOT NULL,
  `empleado_id` bigint(20) NOT NULL,
  PRIMARY KEY (`tarea_id`,`empleado_id`),
  KEY `FK_25629271952BE730` (`empleado_id`),
  CONSTRAINT `FK_256292716D5BDFE1` FOREIGN KEY (`tarea_id`) REFERENCES `tarea` (`id`),
  CONSTRAINT `FK_25629271952BE730` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `asignacion` */

insert  into `asignacion`(`tarea_id`,`empleado_id`) values (11,2),(12,2),(14,2),(15,2),(16,2),(17,2),(18,2),(11,3),(12,3),(14,3),(15,3),(16,3),(18,3),(13,4),(17,4),(13,5),(14,5),(15,5),(16,5);

/*Table structure for table `cajas_prod` */

DROP TABLE IF EXISTS `cajas_prod`;

CREATE TABLE `cajas_prod` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cajas_prod` int(5) DEFAULT NULL,
  `categoria` varchar(20) DEFAULT NULL,
  `tipo_caja_id` bigint(20) DEFAULT NULL,
  `marca_caja_id` bigint(20) DEFAULT NULL,
  `tarea_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Relationship15` (`tipo_caja_id`),
  KEY `Relationship16` (`marca_caja_id`),
  KEY `Relationship20` (`tarea_id`),
  CONSTRAINT `Relationship15` FOREIGN KEY (`tipo_caja_id`) REFERENCES `tipo_caja` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Relationship16` FOREIGN KEY (`marca_caja_id`) REFERENCES `marca_caja` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Relationship20` FOREIGN KEY (`tarea_id`) REFERENCES `tarea` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cajas_prod` */

/*Table structure for table `empleado` */

DROP TABLE IF EXISTS `empleado`;

CREATE TABLE `empleado` (
  `id` bigint(20) NOT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_D9D9BF52BF396750` FOREIGN KEY (`id`) REFERENCES `persona` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `empleado` */

insert  into `empleado`(`id`,`telefono`) values (2,'1234'),(3,'5678'),(4,'456'),(5,'2323'),(6,'456'),(7,'789'),(8,'456'),(9,'789');

/*Table structure for table `finca` */

DROP TABLE IF EXISTS `finca`;

CREATE TABLE `finca` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `finca` */

insert  into `finca`(`id`,`nombre`) values (1,'Torres'),(2,'Torres 2'),(3,'Meristemo'),(4,'29'),(5,'Mango');

/*Table structure for table `insumo` */

DROP TABLE IF EXISTS `insumo`;

CREATE TABLE `insumo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(50) DEFAULT NULL,
  `cant_stock` int(11) DEFAULT NULL,
  `tipo_insumo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `insumo` */

insert  into `insumo`(`id`,`detalle`,`cant_stock`,`tipo_insumo`) values (1,'',5,'Funda'),(2,'',100,'Protector'),(3,'Azul',2,'Cinta'),(4,'Roja',2,'Cinta'),(5,'Rimulax',3,'Herbicida');

/*Table structure for table `lote` */

DROP TABLE IF EXISTS `lote`;

CREATE TABLE `lote` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `area` decimal(10,2) NOT NULL,
  `finca_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Relationship13` (`finca_id`),
  CONSTRAINT `Relationship13` FOREIGN KEY (`finca_id`) REFERENCES `finca` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `lote` */

insert  into `lote`(`id`,`area`,`finca_id`) values (1,'2.73',1),(2,'2.04',1),(3,'0.75',NULL),(4,'3.14',NULL),(5,'3.15',NULL),(6,'2.41',NULL),(7,'0.78',NULL),(8,'1.18',NULL),(9,'1.31',NULL),(10,'2.25',NULL),(11,'2.14',NULL),(12,'2.69',NULL),(13,'5.04',NULL),(14,'2.58',NULL),(15,'2.16',NULL),(16,'2.96',NULL),(17,'1.81',NULL),(18,'2.78',NULL),(19,'4.00',NULL),(20,'1.99',NULL),(21,'5.13',NULL),(22,'1.33',NULL),(23,'1.04',NULL),(24,'0.50',NULL),(25,'3.76',NULL),(26,'8.62',NULL),(27,'6.20',NULL),(28,'2.09',NULL),(29,'2.27',NULL),(30,'2.03',NULL),(31,'1.69',NULL),(32,'1.60',NULL),(33,'2.18',NULL),(34,'1.91',NULL),(35,'1.13',NULL),(36,'1.99',NULL),(37,'2.22',NULL),(38,'1.96',NULL),(39,'1.61',NULL),(40,'3.62',NULL),(41,'3.59',NULL),(42,'2.43',NULL),(43,'4.97',NULL),(44,'5.78',NULL),(45,'5.08',NULL),(46,'3.62',NULL),(47,'1.51',NULL);

/*Table structure for table `marca_caja` */

DROP TABLE IF EXISTS `marca_caja`;

CREATE TABLE `marca_caja` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `marca_caja` */

insert  into `marca_caja`(`id`,`detalle`) values (1,'Dole'),(2,'Chiquita'),(3,'Del Monte');

/*Table structure for table `persona` */

DROP TABLE IF EXISTS `persona`;

CREATE TABLE `persona` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `tipo_per` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `persona` */

insert  into `persona`(`id`,`nombre`,`apellido`,`tipo_per`) values (1,'Jefferson','Arevalo','usuario'),(2,'Lenin','Arevalo','empleado'),(3,'Jonathan','Arevalo','empleado'),(4,'b','b','empleado'),(5,'assss','sdaaa','empleado'),(6,'k','k','empleado'),(7,'l','l','empleado'),(8,'k','k','empleado'),(9,'l','l','empleado');

/*Table structure for table `registro_bodega` */

DROP TABLE IF EXISTS `registro_bodega`;

CREATE TABLE `registro_bodega` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `cantidad` int(5) DEFAULT NULL,
  `tipo_reg` varchar(20) DEFAULT NULL,
  `detalle` varchar(100) DEFAULT NULL,
  `insumo_id` bigint(20) DEFAULT NULL,
  `tarea_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_996259F7CE208F97` (`insumo_id`),
  KEY `Relationship19` (`tarea_id`),
  CONSTRAINT `FK_996259F7CE208F97` FOREIGN KEY (`insumo_id`) REFERENCES `insumo` (`id`),
  CONSTRAINT `Relationship19` FOREIGN KEY (`tarea_id`) REFERENCES `tarea` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `registro_bodega` */

insert  into `registro_bodega`(`id`,`fecha`,`cantidad`,`tipo_reg`,`detalle`,`insumo_id`,`tarea_id`) values (1,NULL,2,NULL,NULL,1,11),(2,NULL,2,NULL,NULL,2,11),(3,NULL,3,NULL,NULL,1,12),(4,NULL,3,NULL,NULL,2,12),(5,NULL,5,NULL,NULL,5,13),(6,NULL,3,NULL,NULL,1,14),(7,NULL,3,NULL,NULL,2,14),(8,NULL,3,NULL,NULL,1,15),(9,NULL,3,NULL,NULL,1,16),(10,NULL,2,NULL,NULL,3,17),(11,NULL,4,NULL,NULL,2,18);

/*Table structure for table `tarea` */

DROP TABLE IF EXISTS `tarea`;

CREATE TABLE `tarea` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cantidad` int(5) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `lote_id` bigint(20) DEFAULT NULL,
  `tipo_tarea_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_3CA05366B172197C` (`lote_id`),
  KEY `Relationship18` (`tipo_tarea_id`),
  CONSTRAINT `FK_3CA05366B172197C` FOREIGN KEY (`lote_id`) REFERENCES `lote` (`id`),
  CONSTRAINT `Relationship18` FOREIGN KEY (`tipo_tarea_id`) REFERENCES `tipo_tarea` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `tarea` */

insert  into `tarea`(`id`,`cantidad`,`fecha`,`lote_id`,`tipo_tarea_id`) values (2,2,'2019-01-02',1,1),(4,2,'2018-03-03',2,1),(5,4,'2018-04-03',2,3),(6,0,'2011-03-08',2,3),(7,2,'2014-10-08',2,1),(8,7,'2014-10-08',2,5),(9,8,'2014-10-08',1,3),(10,8,'2014-10-08',1,3),(11,2,NULL,2,1),(12,3,'2014-10-17',2,2),(13,12,'2014-10-17',2,3),(14,3,'2014-10-17',2,2),(15,3,'2014-10-20',2,1),(16,3,'2014-10-20',2,1),(17,4,'2014-10-21',5,1),(18,4,'2014-10-21',6,2);

/*Table structure for table `tipo_caja` */

DROP TABLE IF EXISTS `tipo_caja`;

CREATE TABLE `tipo_caja` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tipo_caja` */

insert  into `tipo_caja`(`id`,`detalle`) values (1,'Politubo'),(2,'3 Libras'),(3,'Sachet');

/*Table structure for table `tipo_tarea` */

DROP TABLE IF EXISTS `tipo_tarea`;

CREATE TABLE `tipo_tarea` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `detalle` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tipo_tarea` */

insert  into `tipo_tarea`(`id`,`detalle`) values (1,'Enfunde'),(2,'Corte'),(3,'Ensunche'),(4,'Deshoje'),(5,'Deshije'),(6,'Riego'),(7,'Fumigacion'),(8,'Fertilizacion'),(9,'Desmane'),(10,'Pesaje');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` bigint(20) NOT NULL,
  `tipo_usuario` varchar(20) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_EDD889C1BF396750` FOREIGN KEY (`id`) REFERENCES `persona` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `usuario` */

insert  into `usuario`(`id`,`tipo_usuario`,`username`,`password`) values (1,'Admin','mono','1234');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
