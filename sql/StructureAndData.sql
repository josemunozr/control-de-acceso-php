/*
SQLyog Ultimate v9.02 
MySQL - 5.6.16 : Database - systemaccesocontrol
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`systemaccesocontrol` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `systemaccesocontrol`;

/*Table structure for table `agendamiento` */

DROP TABLE IF EXISTS `agendamiento`;

CREATE TABLE `agendamiento` (
  `cod_Age` int(15) NOT NULL AUTO_INCREMENT COMMENT '(PK)codigo agendamiento creado por cada empresa',
  `cod_emp` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT '(FK)rut empresa que realiza agendamientos',
  `cod_UsuSoli` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT '(FK)rut usuario que agenda',
  `motivo` varchar(250) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Motivo de agendamiento',
  `fecha` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'fecha agendada',
  `hora` varchar(8) COLLATE utf8_spanish_ci NOT NULL COMMENT 'hora agendada',
  `estado` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'dos estados : Agendado o Realizado',
  PRIMARY KEY (`cod_Age`),
  KEY `FK_AgendamientoEmpresa` (`cod_emp`),
  KEY `FK_AgendamientoUsuAgen` (`cod_UsuSoli`),
  CONSTRAINT `codigoEmpresa` FOREIGN KEY (`cod_emp`) REFERENCES `empresa` (`cod_emp`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `agendamiento` */

LOCK TABLES `agendamiento` WRITE;

insert  into `agendamiento`(`cod_Age`,`cod_emp`,`cod_UsuSoli`,`motivo`,`fecha`,`hora`,`estado`) values (1,'71951753-4','10394585-2','ingreso de equipos','20/02/2014','12:00','agendado'),(2,'71951753-4','9175545-9','inspección trabajos','27/03/2014','15:00','agendado'),(3,'88381200-k','12687705-6','revisiones tecnicas','04/07/2014','08:45','realizado'),(4,'88381200-k','23569552-9','instalacion de sistema operativo en servidor','12/03/2014','18:00','agendado'),(5,'71951753-4','14050197-2','inspeccion tecnica','05/01/2014','19:15','agendado'),(6,'76125652-4','16219704-5','instalacion de firewall','15/02/2014','10:45','realizado'),(7,'76125652-4','5568487-1','correccion de trabajos','02/07/2014','15:20','agendado'),(8,'71951753-4','6855283-4','inspeccion','16/03/2014','13:25','realizado'),(9,'89456123-5','9175545-9','inspeccion','13/04/2014','15:35','realizado');

UNLOCK TABLES;

/*Table structure for table `empresa` */

DROP TABLE IF EXISTS `empresa`;

CREATE TABLE `empresa` (
  `cod_emp` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT '(PK)rut empresa',
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `dir` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion local de cada Empresa',
  `rubro` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'descripcion rubro de la empresa',
  PRIMARY KEY (`cod_emp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `empresa` */

LOCK TABLES `empresa` WRITE;

insert  into `empresa`(`cod_emp`,`nombre`,`dir`,`rubro`) values ('71951753-4','IBM','Alameda 846','Informática'),('76125652-4','Emerson','Av Sucre 4551','TI'),('88381200-k','Claro Chile S.A','rinconada el salto 100','Telecomunicaciones'),('89456123-5','Rhelec','brasil 1843','TI');

UNLOCK TABLES;

/*Table structure for table `tipoperfil` */

DROP TABLE IF EXISTS `tipoperfil`;

CREATE TABLE `tipoperfil` (
  `cod_per` int(5) NOT NULL COMMENT '(PK) 1.-Admin 2.-DOC 3.-Guardia 4.-Tecnico',
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de perfiles de usuario',
  PRIMARY KEY (`cod_per`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tipoperfil` */

LOCK TABLES `tipoperfil` WRITE;

insert  into `tipoperfil`(`cod_per`,`nombre`) values (1,'DOC'),(2,'Administrador'),(3,'Tecnico'),(4,'Guardia');

UNLOCK TABLES;

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `cod_usu` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT '(PK) rut usuario,sin puntos ni guion',
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `date_ini` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'fecha inicio acceso',
  `date_fin` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'fecha fin acceso',
  `pwd` int(8) DEFAULT NULL COMMENT 'password acceso a sistema',
  `cod_TipPer` int(5) NOT NULL COMMENT '(FK)codigo tipo perfil de usuario',
  `cod_emp` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT '(FK)rut empresa de usuario',
  `correo` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`cod_usu`),
  KEY `FK_usuarioEmpresa` (`cod_emp`),
  KEY `FK_usuarioPerfil` (`cod_TipPer`),
  CONSTRAINT `CodEmpresa` FOREIGN KEY (`cod_emp`) REFERENCES `empresa` (`cod_emp`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `perfilUser` FOREIGN KEY (`cod_TipPer`) REFERENCES `tipoperfil` (`cod_per`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usuario` */

LOCK TABLES `usuario` WRITE;

insert  into `usuario`(`cod_usu`,`nombre`,`apellido`,`date_ini`,`date_fin`,`pwd`,`cod_TipPer`,`cod_emp`,`correo`) values ('10.394.585-2','Fabiola','Reyes','12/01/2014','12/12/2015',763813,3,'89456123-5','freyes@rhelec.com'),('12.687.705-6','Brady','Beard','16/05/2014','12/10/2017',874566,1,'88381200-k','bradyb@clarochile.com'),('14.050.197-2','Albeiro Andres','Gomez Pinilla','01/03/2014','01/04/2017',789456,2,'71951753-4','albeiro@ibm.com'),('14.345.162-3','Jerk','Taylor','14/02/2014','12/12/2017',748438,1,'88381200-k','jtaylor@clarochile.com'),('15.900.780-4','Finn','Roller','15/04/2014','12/12/2014',486541,4,'88381200-k','froller@clarochile.com'),('16.219.704-5','Camilo Jose','Díaz Cordova','01/06/2014','01/05/2016',456789,2,'76125652-4','cjose@emerson.com'),('21.125.608-7','Jose','Muñoz','10/05/2014','01/01/2018',145628,2,'88381200-k','josemunoz@clarochile.com'),('23.569.552-9','Diego Alberto','Arguello Ardila','01/01/2014','12/12/2015',123456,1,'88381200-k','darguello@clarochile.com'),('5.072.865-k','Cade','Mcgary','12/03/2014','12/12/2017',4935465,1,'88381200-k','cadem@clarochile.com'),('5.568.487-1','Fabio','Castel','16/03/2014','09/12/2018',471397,3,'76125652-4','fcastel@emerson.com'),('6.855.283-4','Francisco','Montes','05/02/2014','09/07/2015',458132,3,'71951753-4','fmontes@ibm.com'),('7.900.646-7','Jose','Torres','14/01/2014','12/08/2018',48136,1,'88381200-k','joset@clarochile.com'),('8.917.837-1','Patricio','britto','17/03/2014','12/12/2019',467159,3,'88381200-k','pbritto@clarochile.com'),('9.175.545-9','Maria Jose','Lopez Aedo','01/01/2013','08/10/2016',987186,2,'89456123-5','mariala@rhelec.com');

UNLOCK TABLES;

/*Table structure for table `usuarioagendado` */

DROP TABLE IF EXISTS `usuarioagendado`;

CREATE TABLE `usuarioagendado` (
  `cod_UsuAgenda` int(15) NOT NULL COMMENT '(FK) codigo registro agendamiento realizado por empresa',
  `cod_usu` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT '(FK) rut usuario que visita',
  `estado` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'dos estados:Asiste - NoAsiste',
  `hr_ent` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'hora entrada usuario agendado',
  `hr_sal` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'hora salida usuario agendado',
  KEY `FK_UsuarioAgendado` (`cod_usu`),
  KEY `FK_UsuAgenAgendamiento` (`cod_UsuAgenda`),
  CONSTRAINT `CodBooking` FOREIGN KEY (`cod_UsuAgenda`) REFERENCES `agendamiento` (`cod_Age`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usarioBooked` FOREIGN KEY (`cod_usu`) REFERENCES `usuario` (`cod_usu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usuarioagendado` */

LOCK TABLES `usuarioagendado` WRITE;

insert  into `usuarioagendado`(`cod_UsuAgenda`,`cod_usu`,`estado`,`hr_ent`,`hr_sal`) values (1,'10.394.585-2','realizado','12:30','22:35'),(1,'14.050.197-2','realizado','13:00','20:40'),(1,'6.855.283-4','realizado','13:20','18:45'),(2,'9.175.545-9','realizado','18:35','23:00'),(3,'12.687.705-6','realizado','16:25','22:00'),(3,'14.345.162-3','agendado',NULL,NULL),(3,'15.900.780-4','realizado','16:00','18:00'),(3,'21.125.608-7','realizado','18:35','22:00'),(3,'23.569.552-9','agendado',NULL,NULL),(3,'5.072.865-k','realizado','18:00','23:25'),(4,'23.569.552-9','realizado','13:00','19:00'),(4,'12.687.705-6','realizado','15:45','20:20'),(4,'14.345.162-3','agendado','',''),(5,'14.050.197-2','realizado','16:45','16:50'),(5,'16.219.704-5','realizado','19:20','23:00'),(5,'5.568.487-1','realizado','14:16','19:25'),(6,'16.219.704-5','realizado','14:00','19:25'),(7,'5.568.487-1','realizado','13:45','20:25'),(8,'6.855.283-4','realizado','15:24','19:36'),(9,'9.175.545-9','realizado','16:45','20:50');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
