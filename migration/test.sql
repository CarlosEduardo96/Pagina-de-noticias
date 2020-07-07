-- MySQL dump 10.16  Distrib 10.1.36-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	10.1.36-MariaDB

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
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `comentario` longtext NOT NULL,
  `id_pu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pu` (`id_pu`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_pu`) REFERENCES `noticias` (`id`),
  CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` VALUES (1,'2020-03-25 17:26:58','PEPE PICA PAPAS','Anuma xd',1,1),(2,'2020-03-25 17:27:46','CARLOS EDUARDO RODRIGUEZ CRUZ','Haaa! perro estas en linea\n',1,2);
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticias`
--

DROP TABLE IF EXISTS `noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `descripcion` text NOT NULL,
  `noticia` text NOT NULL,
  `id_autor` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_autor` (`id_autor`),
  CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticias`
--

LOCK TABLES `noticias` WRITE;
/*!40000 ALTER TABLE `noticias` DISABLE KEYS */;
INSERT INTO `noticias` VALUES (1,'2020-03-25 17:23:57','Quema de pastizales en la cuenca del papaloapan.','CARLOS EDUARDO RODRIGUEZ CRUZ','Incendios en la cuenca del papaloapan.','En el lugar de los hechos se arribaron cuerpos policiales.\nNo se reportan muertos solo danos cuantiosos',2),(2,'2020-03-26 17:58:13','Inteligencia articial.','PEPE PICA PAPAS','Alumno del ITSCO crea un software que sigue el movimiento de un objeto.','El alumno Carlos Eduardo de la carrera de sistemas crea un software que realiza el seguimiento de objetos de color en un ambiente controlado.',1),(3,'2020-03-31 19:24:59','Corona viruz covid-19','CARLOS EDUARDO RODRIGUEZ CRUZ','Medidas de prevenciÃ³n','Se le aconseja a ciudadanÃ­a de tomar medidas de prevenciÃ³n y para evitar posibles contagios del Coovid-19 ',2);
/*!40000 ALTER TABLE `noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `ultimavez` datetime NOT NULL,
  `roll` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'PEPE','PICA PAPAS','PEPE@GMAIL.COM','123456','2020-04-10 20:56:08','ADMIN'),(2,'CARLOS EDUARDO','RODRIGUEZ CRUZ','OTACOM96@GMAIL.COM','12345','2020-04-13 15:27:53','USER'),(3,'PABLO','MORSA','PABLO@GMAIL.COM','12345','2020-04-13 16:02:13','USER');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-07 12:10:06
