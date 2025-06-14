-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: libreria
-- ------------------------------------------------------
-- Server version	8.0.37

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `autor`
--

DROP TABLE IF EXISTS `autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autor` (
  `CODIGO_AUTOR` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `NOMBRE` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `APELLIDO_P` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `APELLIDO_M` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `FECHA_NACIMIENTO` date DEFAULT NULL,
  `PAIS` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CIUDAD` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `OBSERVACIONES` varchar(800) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`CODIGO_AUTOR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `ID_CLIENTE` int NOT NULL AUTO_INCREMENT,
  `NOMBRE_CLIENTE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `EMAIL` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `TELEFONO` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `DIRECCION` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID_CLIENTE`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `editorial`
--

DROP TABLE IF EXISTS `editorial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `editorial` (
  `CODIGO_EDITORIAL` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `NOMBRE` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `TELEFONO` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CONTACTO` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `DIRECCION` varchar(600) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CIUDAD` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PAIS` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`CODIGO_EDITORIAL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `influenciado`
--

DROP TABLE IF EXISTS `influenciado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `influenciado` (
  `CODIGO_AUTOR1` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CODIGO_AUTOR2` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `libro`
--

DROP TABLE IF EXISTS `libro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `libro` (
  `ISBN` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `TITULO` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CODIGO_AUTOR` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CODIGO_EDITORIAL` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `EDICION` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `LUGAR_EDICION` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `NUMERO_EDICION` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PRECIO_VENTA` decimal(10,2) DEFAULT NULL,
  `TIPO_CUBIERTA` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PAGINAS` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ESTANTERIA` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `NUMERO_EJEMPLARES` int DEFAULT NULL,
  `OBSERVACIONES` varchar(800) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CODIGO_BARRAS` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`ISBN`),
  KEY `fk_autor` (`CODIGO_AUTOR`),
  KEY `fk_editorial` (`CODIGO_EDITORIAL`),
  CONSTRAINT `fk_autor` FOREIGN KEY (`CODIGO_AUTOR`) REFERENCES `autor` (`CODIGO_AUTOR`),
  CONSTRAINT `fk_editorial` FOREIGN KEY (`CODIGO_EDITORIAL`) REFERENCES `editorial` (`CODIGO_EDITORIAL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `libros_venta`
--

DROP TABLE IF EXISTS `libros_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `libros_venta` (
  `nombre_libro` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tema`
--

DROP TABLE IF EXISTS `tema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tema` (
  `CODIGO_TEMA` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `NOMBRE_TEMA` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`CODIGO_TEMA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `temporal_credito`
--

DROP TABLE IF EXISTS `temporal_credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `temporal_credito` (
  `total` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cantidad_pagada` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cambio` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tipo_pago` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `topico`
--

DROP TABLE IF EXISTS `topico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `topico` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mensaje` text COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `autor` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `curso` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `anio` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tratar`
--

DROP TABLE IF EXISTS `tratar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tratar` (
  `CODIGO_LIBRO` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CODIGO_TEMA` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pass` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `id_venta` int NOT NULL AUTO_INCREMENT,
  `total` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cantidad_pagada` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cambio` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tipo_pago` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha_venta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `venta_fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-13 21:55:42
