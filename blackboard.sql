-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: localhost    Database: blackboard
-- ------------------------------------------------------
-- Server version	8.0.25-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ADMIN`
--

DROP TABLE IF EXISTS `ADMIN`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ADMIN` (
  `Email` varchar(40) NOT NULL,
  `password` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ADMIN`
--

LOCK TABLES `ADMIN` WRITE;
/*!40000 ALTER TABLE `ADMIN` DISABLE KEYS */;
INSERT INTO `ADMIN` VALUES ('admin.gcit@rub.edu.bt','@2020Lab3');
/*!40000 ALTER TABLE `ADMIN` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ANSWER`
--

DROP TABLE IF EXISTS `ANSWER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ANSWER` (
  `AId` int NOT NULL,
  `date` date DEFAULT NULL,
  `content` text,
  `QId` int DEFAULT NULL,
  `Senroll_no` int DEFAULT NULL,
  PRIMARY KEY (`AId`),
  KEY `Senroll_no` (`Senroll_no`),
  KEY `QId` (`QId`),
  CONSTRAINT `ANSWER_ibfk_1` FOREIGN KEY (`Senroll_no`) REFERENCES `STUDENT` (`enroll_no`),
  CONSTRAINT `ANSWER_ibfk_2` FOREIGN KEY (`QId`) REFERENCES `QUESTION` (`QId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ANSWER`
--

LOCK TABLES `ANSWER` WRITE;
/*!40000 ALTER TABLE `ANSWER` DISABLE KEYS */;
/*!40000 ALTER TABLE `ANSWER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `QUESTION`
--

DROP TABLE IF EXISTS `QUESTION`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `QUESTION` (
  `QId` int NOT NULL,
  `date` date DEFAULT NULL,
  `Senroll_no` int DEFAULT NULL,
  PRIMARY KEY (`QId`),
  KEY `Senroll_no` (`Senroll_no`),
  CONSTRAINT `QUESTION_ibfk_1` FOREIGN KEY (`Senroll_no`) REFERENCES `STUDENT` (`enroll_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `QUESTION`
--

LOCK TABLES `QUESTION` WRITE;
/*!40000 ALTER TABLE `QUESTION` DISABLE KEYS */;
/*!40000 ALTER TABLE `QUESTION` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `STUDENT`
--

DROP TABLE IF EXISTS `STUDENT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `STUDENT` (
  `enroll_no` int NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `Department` varchar(10) DEFAULT NULL,
  `Year` int DEFAULT NULL,
  `login_password` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`enroll_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `STUDENT`
--

LOCK TABLES `STUDENT` WRITE;
/*!40000 ALTER TABLE `STUDENT` DISABLE KEYS */;
INSERT INTO `STUDENT` VALUES (12190008,'Jambay Lhamo','12190008.gcit@rub.edu.bt','BSc CS',2,'12190008'),(12190014,'Namgay Wangchuk','12190014.gcit@rub.edu.bt','BSc CS',2,'12190014'),(12190022,'Sangay Lakshay','12190022.gcit@rub.edu.bt','BSc CS',2,'12190022'),(12190034,'Tshering Dema','12190034.gcit@rub.edu.bt','BSc CS',2,'12190034');
/*!40000 ALTER TABLE `STUDENT` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-17 15:10:22
