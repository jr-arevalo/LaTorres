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

/*Data for the table `asignacion` */

insert  into `asignacion`(`tarea_id`,`empleado_id`) values (2,3),(4,3),(5,3),(6,3),(7,4),(8,5),(9,6),(9,7),(10,8),(10,9);

/*Data for the table `cajas_prod` */

/*Data for the table `cinta` */

/*Data for the table `corte` */

/*Data for the table `empleado` */

insert  into `empleado`(`id`,`telefono`) values (2,'1234'),(3,'5678'),(4,'456'),(5,'2323'),(6,'456'),(7,'789'),(8,'456'),(9,'789');

/*Data for the table `finca` */

insert  into `finca`(`id`,`nombre`) values (1,'Torres'),(2,'Torres 2'),(3,'Meristemo'),(4,'29'),(5,'Mango');

/*Data for the table `insumo` */

insert  into `insumo`(`id`,`detalle`,`cant_stock`,`tipo_insumo`,`tipo_ins`) values (1,'funda',5,'funda','funda'),(2,'protector',100,'protector','protector');

/*Data for the table `lote` */

insert  into `lote`(`id`,`finca_id`,`area`) values (1,1,100),(2,1,150);

/*Data for the table `marca_caja` */

/*Data for the table `persona` */

insert  into `persona`(`id`,`nombre`,`apellido`,`tipo_per`) values (1,'Jefferson','Arevalo','usuario'),(2,'Lenin','Arevalo','empleado'),(3,'Jonathan','Arevalo','empleado'),(4,'b','b','empleado'),(5,'assss','sdaaa','empleado'),(6,'k','k','empleado'),(7,'l','l','empleado'),(8,'k','k','empleado'),(9,'l','l','empleado');

/*Data for the table `registro_bodega` */

/*Data for the table `suncho` */

/*Data for the table `tarea` */

insert  into `tarea`(`id`,`tipo_tarea_id`,`lote_id`,`cantidad`,`fecha`,`tipo_tar`) values (2,1,1,2,'2019-01-02','tarea'),(4,1,2,2,'2018-03-03','tarea'),(5,3,2,4,'2018-04-03','tarea'),(6,3,2,0,'2011-03-08','tarea'),(7,1,2,2,'2014-10-08','tarea'),(8,5,2,7,'2014-10-08','tarea'),(9,3,1,8,'2014-10-08','tarea'),(10,3,1,8,'2014-10-08','tarea');

/*Data for the table `tarea_insumo` */

/*Data for the table `tipo_caja` */

/*Data for the table `tipo_tarea` */

insert  into `tipo_tarea`(`id`,`detalle`) values (1,'Enfunde'),(2,'Corte'),(3,'Ensunche'),(4,'Deshoje'),(5,'Deshije');

/*Data for the table `usuario` */

insert  into `usuario`(`id`,`tipo_usuario`,`username`,`password`) values (1,'Admin','mono','1234');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
