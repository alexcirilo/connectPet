-- MariaDB dump 10.17  Distrib 10.4.6-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: connect_pet
-- ------------------------------------------------------
-- Server version	10.4.6-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `campanha`
--

DROP TABLE IF EXISTS `campanha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campanha` (
  `id_campanha` int(11) NOT NULL AUTO_INCREMENT,
  `cpf_tutor` varchar(14) NOT NULL,
  `cpf_vacinador` varchar(14) NOT NULL,
  `data_vacinacao` date DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `dt_status` date DEFAULT NULL,
  PRIMARY KEY (`id_campanha`),
  KEY `cpf_tutor` (`cpf_tutor`),
  KEY `cpf_vacinador` (`cpf_vacinador`),
  CONSTRAINT `campanha_ibfk_1` FOREIGN KEY (`cpf_tutor`) REFERENCES `tutor` (`cpf`),
  CONSTRAINT `campanha_ibfk_2` FOREIGN KEY (`cpf_vacinador`) REFERENCES `usuarios` (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campanha`
--

LOCK TABLES `campanha` WRITE;
/*!40000 ALTER TABLE `campanha` DISABLE KEYS */;
/*!40000 ALTER TABLE `campanha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(9) NOT NULL,
  `logradouro` varchar(50) NOT NULL,
  `numero` varchar(6) NOT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(20) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `uf` char(2) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  PRIMARY KEY (`id_endereco`),
  KEY `tutor_id` (`tutor_id`),
  CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`id_tutor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foto_pet`
--

DROP TABLE IF EXISTS `foto_pet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foto_pet` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_imagem` varchar(100) NOT NULL,
  `diretorio` varchar(255) NOT NULL,
  `id_pet` int(11) NOT NULL,
  PRIMARY KEY (`id_foto`),
  KEY `id_pet` (`id_pet`),
  CONSTRAINT `foto_pet_ibfk_1` FOREIGN KEY (`id_pet`) REFERENCES `pet` (`id_pet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foto_pet`
--

LOCK TABLES `foto_pet` WRITE;
/*!40000 ALTER TABLE `foto_pet` DISABLE KEYS */;
/*!40000 ALTER TABLE `foto_pet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcao`
--

DROP TABLE IF EXISTS `funcao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcao` (
  `id_funcao` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(4) NOT NULL,
  `descricao` varchar(60) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `dt_status` date DEFAULT NULL,
  PRIMARY KEY (`id_funcao`,`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcao`
--

LOCK TABLES `funcao` WRITE;
/*!40000 ALTER TABLE `funcao` DISABLE KEYS */;
INSERT INTO `funcao` VALUES (1,1,'Administrador','a','2022-04-23');
/*!40000 ALTER TABLE `funcao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pet`
--

DROP TABLE IF EXISTS `pet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pet` (
  `id_pet` int(11) NOT NULL AUTO_INCREMENT,
  `nome_pet` varchar(50) NOT NULL,
  `especie` varchar(10) NOT NULL,
  `raca` varchar(30) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `pelagem` varchar(20) DEFAULT NULL,
  `sexo` char(1) NOT NULL,
  `castrado` char(1) NOT NULL,
  `microchip` varchar(15) DEFAULT NULL,
  `local_implantacao` varchar(20) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `dt_status` date DEFAULT NULL,
  `id_tutor` int(11) NOT NULL,
  PRIMARY KEY (`id_pet`),
  KEY `id_tutor` (`id_tutor`),
  CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`id_tutor`) REFERENCES `tutor` (`id_tutor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pet`
--

LOCK TABLES `pet` WRITE;
/*!40000 ALTER TABLE `pet` DISABLE KEYS */;
/*!40000 ALTER TABLE `pet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutor`
--

DROP TABLE IF EXISTS `tutor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tutor` (
  `id_tutor` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `dt_status` date DEFAULT NULL,
  PRIMARY KEY (`id_tutor`,`cpf`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutor`
--

LOCK TABLES `tutor` WRITE;
/*!40000 ALTER TABLE `tutor` DISABLE KEYS */;
/*!40000 ALTER TABLE `tutor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(14) NOT NULL,
  `login` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `id_funcao` int(2) DEFAULT NULL,
  `registro` varchar(10) DEFAULT NULL,
  `conselho` varchar(15) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `perfil` int(2) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `dt_status` date DEFAULT NULL,
  PRIMARY KEY (`id_usuario`,`cpf`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `id_funcao` (`id_funcao`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_funcao`) REFERENCES `funcao` (`id_funcao`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'000.000.000-00','admin','21232f297a57a5a743894a0e4a801fc3','admin',1,'','','admin@teste.com',1,'a','2022-04-23');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacina`
--

DROP TABLE IF EXISTS `vacina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vacina` (
  `id_vacina` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `descricao` varchar(40) DEFAULT NULL,
  `lote` varchar(20) DEFAULT NULL,
  `laboratorio` varchar(20) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `validade` date DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `dt_status` date DEFAULT NULL,
  PRIMARY KEY (`id_vacina`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacina`
--

LOCK TABLES `vacina` WRITE;
/*!40000 ALTER TABLE `vacina` DISABLE KEYS */;
/*!40000 ALTER TABLE `vacina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacinacao`
--

DROP TABLE IF EXISTS `vacinacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vacinacao` (
  `id_vacinacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_pet` int(11) NOT NULL,
  `data_vacina` date DEFAULT NULL,
  `tipo` int(2) DEFAULT NULL,
  `id_vacina` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  PRIMARY KEY (`id_vacinacao`),
  KEY `id_vacina` (`id_vacina`),
  KEY `codigo` (`codigo`),
  KEY `id_pet` (`id_pet`),
  CONSTRAINT `vacinacao_ibfk_1` FOREIGN KEY (`id_vacina`) REFERENCES `vacina` (`id_vacina`),
  CONSTRAINT `vacinacao_ibfk_2` FOREIGN KEY (`codigo`) REFERENCES `vacina` (`codigo`),
  CONSTRAINT `vacinacao_ibfk_3` FOREIGN KEY (`id_pet`) REFERENCES `pet` (`id_pet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacinacao`
--

LOCK TABLES `vacinacao` WRITE;
/*!40000 ALTER TABLE `vacinacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `vacinacao` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-24 13:02:31
