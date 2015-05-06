-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: mph
-- ------------------------------------------------------
-- Server version	5.6.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `asignaciones`
--

DROP TABLE IF EXISTS `asignaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seccion` int(11) DEFAULT NULL,
  `ocupado` tinyint(1) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `ciclo_id` int(11) NOT NULL,
  `aula_id` int(11) NOT NULL,
  `dia_id` int(11) NOT NULL,
  `horario_id` int(11) NOT NULL,
  `asignatura_id` int(11) DEFAULT NULL,
  `catedratico_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ciclos_id1_idx` (`ciclo_id`),
  KEY `aulas_id1_idx` (`aula_id`),
  KEY `dias_id1_idx` (`dia_id`),
  KEY `horarios_id1_idx` (`horario_id`),
  KEY `asignaturas_id1_idx` (`asignatura_id`),
  KEY `catedraticos_id1_idx` (`catedratico_id`),
  CONSTRAINT `aulas_id1` FOREIGN KEY (`aula_id`) REFERENCES `aulas` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `asignaturas_id1` FOREIGN KEY (`asignatura_id`) REFERENCES `asignaturas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `catedraticos_id1` FOREIGN KEY (`catedratico_id`) REFERENCES `catedraticos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ciclos_id1` FOREIGN KEY (`ciclo_id`) REFERENCES `ciclos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `dias_id1` FOREIGN KEY (`dia_id`) REFERENCES `dias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `horarios_id1` FOREIGN KEY (`horario_id`) REFERENCES `horarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=287 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignaciones`
--

LOCK TABLES `asignaciones` WRITE;
/*!40000 ALTER TABLE `asignaciones` DISABLE KEYS */;
INSERT INTO `asignaciones` VALUES (153,0,0,1,7,1,1,3,NULL,NULL),(154,0,0,1,7,1,1,4,NULL,NULL),(158,1,1,1,7,1,2,1,1,1),(159,0,0,1,7,1,2,3,NULL,NULL),(160,0,0,1,7,1,2,4,NULL,NULL),(164,1,1,1,7,1,3,1,1,1),(165,0,0,1,7,1,3,3,NULL,NULL),(166,0,0,1,7,1,3,4,NULL,NULL),(170,0,0,1,7,1,4,1,NULL,NULL),(171,0,0,1,7,1,4,3,NULL,NULL),(172,0,0,1,7,1,4,4,NULL,NULL),(176,0,0,1,7,1,5,1,NULL,NULL),(177,0,0,1,7,1,5,3,NULL,NULL),(178,0,0,1,7,1,5,4,NULL,NULL),(183,0,0,1,7,1,6,3,NULL,NULL),(184,0,0,1,7,1,6,4,NULL,NULL),(200,1,1,1,7,1,1,1,1,1),(204,2,1,0,7,1,1,1,2,1),(205,4,1,0,7,1,1,1,3,1),(206,2,1,1,8,1,1,1,1,1),(207,0,0,1,8,1,1,3,NULL,NULL),(212,0,0,1,8,1,2,1,NULL,NULL),(213,0,0,1,8,1,2,3,NULL,NULL),(214,0,0,1,8,1,2,4,NULL,NULL),(218,0,0,1,8,1,3,1,NULL,NULL),(219,0,0,1,8,1,3,3,NULL,NULL),(220,0,0,1,8,1,3,4,NULL,NULL),(224,0,0,1,8,1,4,1,NULL,NULL),(225,0,0,1,8,1,4,3,NULL,NULL),(226,0,0,1,8,1,4,4,NULL,NULL),(231,0,0,1,8,1,5,3,NULL,NULL),(232,0,0,1,8,1,5,4,NULL,NULL),(236,0,0,1,8,1,6,1,NULL,NULL),(238,0,0,1,8,1,6,4,NULL,NULL),(253,0,0,1,8,1,1,4,NULL,NULL),(261,0,0,1,8,1,6,3,NULL,NULL),(274,2,1,1,8,1,5,1,1,1),(275,1,1,0,8,1,5,1,2,1),(276,2,1,0,8,1,5,1,3,1);
/*!40000 ALTER TABLE `asignaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asignaturas`
--

DROP TABLE IF EXISTS `asignaturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignaturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(3) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `carrera_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `carreras_id1_idx` (`carrera_id`),
  CONSTRAINT `carreras_id1` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignaturas`
--

LOCK TABLES `asignaturas` WRITE;
/*!40000 ALTER TABLE `asignaturas` DISABLE KEYS */;
INSERT INTO `asignaturas` VALUES (1,'III','idw01','Introducción al desarrollo web',1,1),(2,'I','as321','Pedicura',1,2),(3,'V','au026','Auditoria en sistemas',1,1),(4,'V','asdw','Otro',1,2),(5,'V','gfjgy','test asignatura',1,1);
/*!40000 ALTER TABLE `asignaturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aulas`
--

DROP TABLE IF EXISTS `aulas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aulas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `tipoaula_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tipoaulas_id1_idx` (`tipoaula_id`),
  CONSTRAINT `tipoaulas_id1` FOREIGN KEY (`tipoaula_id`) REFERENCES `tipoaulas` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aulas`
--

LOCK TABLES `aulas` WRITE;
/*!40000 ALTER TABLE `aulas` DISABLE KEYS */;
INSERT INTO `aulas` VALUES (1,'01','Aula 11',20,1,3),(5,'2','Aula 12',20,1,3);
/*!40000 ALTER TABLE `aulas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carreras`
--

DROP TABLE IF EXISTS `carreras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carreras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `facultade_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `facultades_id_idx` (`facultade_id`),
  CONSTRAINT `facultades_id` FOREIGN KEY (`facultade_id`) REFERENCES `facultades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carreras`
--

LOCK TABLES `carreras` WRITE;
/*!40000 ALTER TABLE `carreras` DISABLE KEYS */;
INSERT INTO `carreras` VALUES (1,2601,'Ingeniería en ciencias de la computación',1,1),(2,2602,'Técnico en sistemas de computación',1,1);
/*!40000 ALTER TABLE `carreras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catedraticos`
--

DROP TABLE IF EXISTS `catedraticos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catedraticos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catedraticos`
--

LOCK TABLES `catedraticos` WRITE;
/*!40000 ALTER TABLE `catedraticos` DISABLE KEYS */;
INSERT INTO `catedraticos` VALUES (1,'Carlos Amaury Tejada',1),(2,'Guillermo Perez',1),(3,'Felipe Alvarenga',1),(4,'Pendiente de Asignar',1);
/*!40000 ALTER TABLE `catedraticos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ciclos`
--

DROP TABLE IF EXISTS `ciclos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciclos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(1) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciclos`
--

LOCK TABLES `ciclos` WRITE;
/*!40000 ALTER TABLE `ciclos` DISABLE KEYS */;
INSERT INTO `ciclos` VALUES (3,1,2015,0),(4,3,2015,0),(5,3,2015,0),(6,2,2015,0),(7,1,2016,0),(8,3,2016,1);
/*!40000 ALTER TABLE `ciclos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dias`
--

DROP TABLE IF EXISTS `dias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dias`
--

LOCK TABLES `dias` WRITE;
/*!40000 ALTER TABLE `dias` DISABLE KEYS */;
INSERT INTO `dias` VALUES (1,'lu','Lunes',1),(2,'ma','Martes',1),(3,'mi','Miércoles',1),(4,'ju','Jueves',1),(5,'vi','Viernes',1),(6,'sá','Sábado',1);
/*!40000 ALTER TABLE `dias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facultades`
--

DROP TABLE IF EXISTS `facultades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facultades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facultades`
--

LOCK TABLES `facultades` WRITE;
/*!40000 ALTER TABLE `facultades` DISABLE KEYS */;
INSERT INTO `facultades` VALUES (1,'01','Facultad de ingeniería y arquitectura',1),(2,'02','Facultad de ciencias económicas',1),(3,'03','Facultad de ciencias jurídicas',1);
/*!40000 ALTER TABLE `facultades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horarios`
--

DROP TABLE IF EXISTS `horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hora` varchar(45) DEFAULT NULL,
  `periodo` varchar(45) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horarios`
--

LOCK TABLES `horarios` WRITE;
/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
INSERT INTO `horarios` VALUES (1,'7:00 a 8:30','AM',1),(3,'6:30 a 8:00','PM',1),(4,'6:30 a 8:00','AM',1),(5,'5:00 - 6:30','PM',1);
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoaulas`
--

DROP TABLE IF EXISTS `tipoaulas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoaulas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoaulas`
--

LOCK TABLES `tipoaulas` WRITE;
/*!40000 ALTER TABLE `tipoaulas` DISABLE KEYS */;
INSERT INTO `tipoaulas` VALUES (2,'Aula con Computadoras',1),(3,'Aula con Pupitres',1);
/*!40000 ALTER TABLE `tipoaulas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-06 17:50:06
