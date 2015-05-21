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
  CONSTRAINT `asignaturas_id1` FOREIGN KEY (`asignatura_id`) REFERENCES `asignaturas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `aulas_id1` FOREIGN KEY (`aula_id`) REFERENCES `aulas` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `catedraticos_id1` FOREIGN KEY (`catedratico_id`) REFERENCES `catedraticos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ciclos_id1` FOREIGN KEY (`ciclo_id`) REFERENCES `ciclos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `dias_id1` FOREIGN KEY (`dia_id`) REFERENCES `dias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `horarios_id1` FOREIGN KEY (`horario_id`) REFERENCES `horarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1477 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignaciones`
--

LOCK TABLES `asignaciones` WRITE;
/*!40000 ALTER TABLE `asignaciones` DISABLE KEYS */;
INSERT INTO `asignaciones` VALUES (1102,4,1,1,16,1,1,1,3,4),(1103,0,0,1,16,1,1,3,NULL,NULL),(1104,0,0,1,16,1,1,4,NULL,NULL),(1105,0,0,1,16,1,1,5,NULL,NULL),(1106,3,1,1,16,5,1,1,6,4),(1107,0,0,1,16,5,1,3,NULL,NULL),(1108,0,0,1,16,5,1,4,NULL,NULL),(1109,0,0,1,16,5,1,5,NULL,NULL),(1110,0,0,1,16,6,1,1,NULL,NULL),(1111,0,0,1,16,6,1,3,NULL,NULL),(1112,0,0,1,16,6,1,4,NULL,NULL),(1113,0,0,1,16,6,1,5,NULL,NULL),(1114,0,0,1,16,7,1,1,NULL,NULL),(1115,0,0,1,16,7,1,3,NULL,NULL),(1116,0,0,1,16,7,1,4,NULL,NULL),(1117,0,0,1,16,7,1,5,NULL,NULL),(1118,0,0,1,16,8,1,1,NULL,NULL),(1119,0,0,1,16,8,1,3,NULL,NULL),(1120,0,0,1,16,8,1,4,NULL,NULL),(1121,0,0,1,16,8,1,5,NULL,NULL),(1122,0,0,1,16,1,2,1,NULL,NULL),(1123,0,0,1,16,1,2,3,NULL,NULL),(1124,0,0,1,16,1,2,4,NULL,NULL),(1125,0,0,1,16,1,2,5,NULL,NULL),(1126,0,0,1,16,5,2,1,NULL,NULL),(1127,0,0,1,16,5,2,3,NULL,NULL),(1128,0,0,1,16,5,2,4,NULL,NULL),(1129,0,0,1,16,5,2,5,NULL,NULL),(1130,0,0,1,16,6,2,1,NULL,NULL),(1131,0,0,1,16,6,2,3,NULL,NULL),(1132,0,0,1,16,6,2,4,NULL,NULL),(1133,0,0,1,16,6,2,5,NULL,NULL),(1134,0,0,1,16,7,2,1,NULL,NULL),(1135,0,0,1,16,7,2,3,NULL,NULL),(1136,0,0,1,16,7,2,4,NULL,NULL),(1137,0,0,1,16,7,2,5,NULL,NULL),(1138,0,0,1,16,8,2,1,NULL,NULL),(1139,0,0,1,16,8,2,3,NULL,NULL),(1140,0,0,1,16,8,2,4,NULL,NULL),(1141,0,0,1,16,8,2,5,NULL,NULL),(1142,0,0,1,16,1,3,1,NULL,NULL),(1143,0,0,1,16,1,3,3,NULL,NULL),(1144,0,0,1,16,1,3,4,NULL,NULL),(1145,0,0,1,16,1,3,5,NULL,NULL),(1146,0,0,1,16,5,3,1,NULL,NULL),(1147,0,0,1,16,5,3,3,NULL,NULL),(1148,0,0,1,16,5,3,4,NULL,NULL),(1149,0,0,1,16,5,3,5,NULL,NULL),(1150,0,0,1,16,6,3,1,NULL,NULL),(1151,0,0,1,16,6,3,3,NULL,NULL),(1152,0,0,1,16,6,3,4,NULL,NULL),(1153,0,0,1,16,6,3,5,NULL,NULL),(1154,0,0,1,16,7,3,1,NULL,NULL),(1155,0,0,1,16,7,3,3,NULL,NULL),(1156,0,0,1,16,7,3,4,NULL,NULL),(1157,0,0,1,16,7,3,5,NULL,NULL),(1158,0,0,1,16,8,3,1,NULL,NULL),(1159,0,0,1,16,8,3,3,NULL,NULL),(1160,0,0,1,16,8,3,4,NULL,NULL),(1161,0,0,1,16,8,3,5,NULL,NULL),(1162,5,1,1,16,1,4,1,3,4),(1163,0,0,1,16,1,4,3,NULL,NULL),(1164,0,0,1,16,1,4,4,NULL,NULL),(1165,0,0,1,16,1,4,5,NULL,NULL),(1166,0,0,1,16,5,4,1,NULL,NULL),(1167,0,0,1,16,5,4,3,NULL,NULL),(1168,0,0,1,16,5,4,4,NULL,NULL),(1169,0,0,1,16,5,4,5,NULL,NULL),(1170,0,0,1,16,6,4,1,NULL,NULL),(1171,0,0,1,16,6,4,3,NULL,NULL),(1172,0,0,1,16,6,4,4,NULL,NULL),(1173,0,0,1,16,6,4,5,NULL,NULL),(1174,0,0,1,16,7,4,1,NULL,NULL),(1175,0,0,1,16,7,4,3,NULL,NULL),(1176,0,0,1,16,7,4,4,NULL,NULL),(1177,0,0,1,16,7,4,5,NULL,NULL),(1178,0,0,1,16,8,4,1,NULL,NULL),(1179,0,0,1,16,8,4,3,NULL,NULL),(1180,0,0,1,16,8,4,4,NULL,NULL),(1181,1,1,1,16,8,4,5,5,4),(1182,0,0,1,16,1,5,1,NULL,NULL),(1183,0,0,1,16,1,5,3,NULL,NULL),(1184,0,0,1,16,1,5,4,NULL,NULL),(1185,0,0,1,16,1,5,5,NULL,NULL),(1186,0,0,1,16,5,5,1,NULL,NULL),(1187,0,0,1,16,5,5,3,NULL,NULL),(1188,0,0,1,16,5,5,4,NULL,NULL),(1189,0,0,1,16,5,5,5,NULL,NULL),(1190,0,0,1,16,6,5,1,NULL,NULL),(1191,0,0,1,16,6,5,3,NULL,NULL),(1192,0,0,1,16,6,5,4,NULL,NULL),(1193,0,0,1,16,6,5,5,NULL,NULL),(1194,0,0,1,16,7,5,1,NULL,NULL),(1195,0,0,1,16,7,5,3,NULL,NULL),(1196,1,1,1,16,7,5,4,1,1),(1197,0,0,1,16,7,5,5,NULL,NULL),(1198,0,0,1,16,8,5,1,NULL,NULL),(1199,0,0,1,16,8,5,3,NULL,NULL),(1200,0,0,1,16,8,5,4,NULL,NULL),(1201,0,0,1,16,8,5,5,NULL,NULL),(1202,0,0,1,16,1,6,1,NULL,NULL),(1203,0,0,1,16,1,6,3,NULL,NULL),(1204,0,0,1,16,1,6,4,NULL,NULL),(1205,0,0,1,16,1,6,5,NULL,NULL),(1206,0,0,1,16,5,6,1,NULL,NULL),(1207,0,0,1,16,5,6,3,NULL,NULL),(1208,0,0,1,16,5,6,4,NULL,NULL),(1209,0,0,1,16,5,6,5,NULL,NULL),(1210,0,0,1,16,6,6,1,NULL,NULL),(1211,0,0,1,16,6,6,3,NULL,NULL),(1212,0,0,1,16,6,6,4,NULL,NULL),(1213,0,0,1,16,6,6,5,NULL,NULL),(1214,0,0,1,16,7,6,1,NULL,NULL),(1215,0,0,1,16,7,6,3,NULL,NULL),(1216,0,0,1,16,7,6,4,NULL,NULL),(1217,0,0,1,16,7,6,5,NULL,NULL),(1218,0,0,1,16,8,6,1,NULL,NULL),(1219,0,0,1,16,8,6,3,NULL,NULL),(1220,0,0,1,16,8,6,4,NULL,NULL),(1221,0,0,1,16,8,6,5,NULL,NULL),(1222,4,1,0,16,1,4,1,2,4),(1223,2,1,0,16,7,5,4,4,1),(1224,3,1,0,16,5,1,1,7,4),(1346,0,0,1,17,1,1,3,NULL,NULL),(1347,0,0,1,17,1,1,4,NULL,NULL),(1348,0,0,1,17,1,1,5,NULL,NULL),(1349,2,1,1,17,5,1,1,6,4),(1350,0,0,1,17,5,1,3,NULL,NULL),(1351,0,0,1,17,5,1,4,NULL,NULL),(1352,0,0,1,17,5,1,5,NULL,NULL),(1353,1,1,1,17,6,1,1,4,2),(1354,0,0,1,17,6,1,3,NULL,NULL),(1355,0,0,1,17,6,1,4,NULL,NULL),(1356,0,0,1,17,6,1,5,NULL,NULL),(1358,0,0,1,17,7,1,3,NULL,NULL),(1359,0,0,1,17,7,1,4,NULL,NULL),(1360,0,0,1,17,7,1,5,NULL,NULL),(1361,1,1,1,17,8,1,1,7,4),(1362,0,0,1,17,8,1,3,NULL,NULL),(1363,0,0,1,17,8,1,4,NULL,NULL),(1364,0,0,1,17,8,1,5,NULL,NULL),(1365,0,0,1,17,1,2,1,NULL,NULL),(1366,0,0,1,17,1,2,3,NULL,NULL),(1367,0,0,1,17,1,2,4,NULL,NULL),(1368,0,0,1,17,1,2,5,NULL,NULL),(1369,0,0,1,17,5,2,1,NULL,NULL),(1370,1,1,1,17,5,2,3,4,4),(1371,0,0,1,17,5,2,4,NULL,NULL),(1372,0,0,1,17,5,2,5,NULL,NULL),(1373,0,0,1,17,6,2,1,NULL,NULL),(1374,0,0,1,17,6,2,3,NULL,NULL),(1375,0,0,1,17,6,2,4,NULL,NULL),(1376,0,0,1,17,6,2,5,NULL,NULL),(1377,0,0,1,17,7,2,1,NULL,NULL),(1378,4,1,1,17,7,2,3,8,4),(1379,0,0,1,17,7,2,4,NULL,NULL),(1380,0,0,1,17,7,2,5,NULL,NULL),(1381,0,0,1,17,8,2,1,NULL,NULL),(1382,0,0,1,17,8,2,3,NULL,NULL),(1383,0,0,1,17,8,2,4,NULL,NULL),(1384,0,0,1,17,8,2,5,NULL,NULL),(1385,0,0,1,17,1,3,1,NULL,NULL),(1386,0,0,1,17,1,3,3,NULL,NULL),(1387,0,0,1,17,1,3,4,NULL,NULL),(1388,0,0,1,17,1,3,5,NULL,NULL),(1389,1,1,1,17,5,3,1,5,1),(1390,0,0,1,17,5,3,3,NULL,NULL),(1391,0,0,1,17,5,3,4,NULL,NULL),(1392,0,0,1,17,5,3,5,NULL,NULL),(1393,0,0,1,17,6,3,1,NULL,NULL),(1394,0,0,1,17,6,3,3,NULL,NULL),(1395,0,0,1,17,6,3,4,NULL,NULL),(1396,0,0,1,17,6,3,5,NULL,NULL),(1397,0,0,1,17,7,3,1,NULL,NULL),(1398,1,1,1,17,7,3,3,9,4),(1399,0,0,1,17,7,3,4,NULL,NULL),(1400,0,0,1,17,7,3,5,NULL,NULL),(1401,0,0,1,17,8,3,1,NULL,NULL),(1402,0,0,1,17,8,3,3,NULL,NULL),(1403,0,0,1,17,8,3,4,NULL,NULL),(1404,0,0,1,17,8,3,5,NULL,NULL),(1405,3,1,1,17,1,4,1,7,4),(1406,0,0,1,17,1,4,3,NULL,NULL),(1407,0,0,1,17,1,4,4,NULL,NULL),(1408,0,0,1,17,1,4,5,NULL,NULL),(1409,0,0,1,17,5,4,1,NULL,NULL),(1410,0,0,1,17,5,4,3,NULL,NULL),(1411,0,0,1,17,5,4,4,NULL,NULL),(1412,0,0,1,17,5,4,5,NULL,NULL),(1413,1,1,1,17,6,4,1,5,4),(1414,0,0,1,17,6,4,3,NULL,NULL),(1415,0,0,1,17,6,4,4,NULL,NULL),(1416,0,0,1,17,6,4,5,NULL,NULL),(1417,0,0,1,17,7,4,1,NULL,NULL),(1418,1,1,1,17,7,4,3,9,4),(1419,0,0,1,17,7,4,4,NULL,NULL),(1420,0,0,1,17,7,4,5,NULL,NULL),(1421,1,1,1,17,8,4,1,3,4),(1422,0,0,1,17,8,4,3,NULL,NULL),(1423,0,0,1,17,8,4,4,NULL,NULL),(1424,5,1,1,17,8,4,5,3,4),(1425,0,0,1,17,1,5,1,NULL,NULL),(1426,0,0,1,17,1,5,3,NULL,NULL),(1427,0,0,1,17,1,5,4,NULL,NULL),(1428,0,0,1,17,1,5,5,NULL,NULL),(1429,0,0,1,17,5,5,1,NULL,NULL),(1430,0,0,1,17,5,5,3,NULL,NULL),(1431,0,0,1,17,5,5,4,NULL,NULL),(1432,0,0,1,17,5,5,5,NULL,NULL),(1433,0,0,1,17,6,5,1,NULL,NULL),(1434,0,0,1,17,6,5,3,NULL,NULL),(1435,0,0,1,17,6,5,4,NULL,NULL),(1436,0,0,1,17,6,5,5,NULL,NULL),(1437,0,0,1,17,7,5,1,NULL,NULL),(1438,0,0,1,17,7,5,3,NULL,NULL),(1439,1,1,1,17,7,5,4,1,1),(1440,0,0,1,17,7,5,5,NULL,NULL),(1441,0,0,1,17,8,5,1,NULL,NULL),(1442,0,0,1,17,8,5,3,NULL,NULL),(1443,0,0,1,17,8,5,4,NULL,NULL),(1444,0,0,1,17,8,5,5,NULL,NULL),(1445,2,1,1,17,1,6,1,1,1),(1446,0,0,1,17,1,6,3,NULL,NULL),(1447,0,0,1,17,1,6,4,NULL,NULL),(1448,0,0,1,17,1,6,5,NULL,NULL),(1449,0,0,1,17,5,6,1,NULL,NULL),(1450,0,0,1,17,5,6,3,NULL,NULL),(1451,0,0,1,17,5,6,4,NULL,NULL),(1452,0,0,1,17,5,6,5,NULL,NULL),(1453,0,0,1,17,6,6,1,NULL,NULL),(1454,0,0,1,17,6,6,3,NULL,NULL),(1455,0,0,1,17,6,6,4,NULL,NULL),(1456,0,0,1,17,6,6,5,NULL,NULL),(1457,0,0,1,17,7,6,1,NULL,NULL),(1458,0,0,1,17,7,6,3,NULL,NULL),(1459,0,0,1,17,7,6,4,NULL,NULL),(1460,0,0,1,17,7,6,5,NULL,NULL),(1461,0,0,1,17,8,6,1,NULL,NULL),(1462,0,0,1,17,8,6,3,NULL,NULL),(1463,0,0,1,17,8,6,4,NULL,NULL),(1464,0,0,1,17,8,6,5,NULL,NULL),(1465,4,1,0,17,8,4,5,2,4),(1466,2,1,0,17,7,5,4,4,1),(1468,2,1,1,17,7,1,1,5,4),(1474,0,0,1,17,1,1,1,NULL,NULL),(1475,3,1,0,17,1,4,1,6,4),(1476,2,1,0,17,1,6,1,4,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignaturas`
--

LOCK TABLES `asignaturas` WRITE;
/*!40000 ALTER TABLE `asignaturas` DISABLE KEYS */;
INSERT INTO `asignaturas` VALUES (1,'3','idw01','Introducción al desarrollo web',1,1),(2,'1','as321','Pedicura',1,2),(3,'5','au026','Auditoria en sistemas',1,1),(4,'5','asdw','Otro',1,2),(5,'5','gfjgy','test asignatura',1,1),(6,'1','lk7','Calculo I',1,1),(7,'1','sadf','Matematica Aplicada',1,2),(8,'9','3541kj','Test otra asignatura',1,1),(9,'4','c20206','Calculo II',1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aulas`
--

LOCK TABLES `aulas` WRITE;
/*!40000 ALTER TABLE `aulas` DISABLE KEYS */;
INSERT INTO `aulas` VALUES (1,'01','Aula 11',20,1,3),(5,'2','Aula 12',40,1,3),(6,'65','Aula 14',40,1,3),(7,'hg','Aula 15',40,1,3),(8,'jh','Aula 13',40,1,3);
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciclos`
--

LOCK TABLES `ciclos` WRITE;
/*!40000 ALTER TABLE `ciclos` DISABLE KEYS */;
INSERT INTO `ciclos` VALUES (16,1,2014,0),(17,3,2014,1);
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

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(45) DEFAULT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'admin','f5fddff1def426235b607823d757fd4b',1,1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-21  9:40:45
