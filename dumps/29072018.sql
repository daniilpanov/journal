-- MySQL dump 10.16  Distrib 10.1.16-MariaDB, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: journal
-- ------------------------------------------------------
-- Server version	10.1.16-MariaDB

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
-- Table structure for table `journal_list`
--

DROP TABLE IF EXISTS `journal_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `journal_list` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `form` varchar(2) NOT NULL,
  `mark` int(1) NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `journal_list`
--

LOCK TABLES `journal_list` WRITE;
/*!40000 ALTER TABLE `journal_list` DISABLE KEYS */;
INSERT INTO `journal_list` VALUES (1,'математика','Пупкин','Вася','5а',5,'2018-07-25'),(2,'математика','Иванов','Иван','5а',4,'2018-07-19'),(3,'физика','Петров','Александр','1г',3,'2018-07-22'),(4,'информатика','Уткин','Лёша','3а',2,'2018-07-26');
/*!40000 ALTER TABLE `journal_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `form` varchar(3) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `e-mails` mediumtext,
  `phones` int(11) DEFAULT NULL,
  `parents` mediumtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_fullname_uindex` (`name`,`surname`,`middle_name`),
  UNIQUE KEY `students_authorization_uindex` (`login`,`password`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (3,'Александр','Петров','','4б','12345','Aleksandr',NULL,NULL,NULL),(11,'Иван','Васильев','','5а',NULL,NULL,NULL,NULL,NULL),(12,'Василий','Пушкин','','5а',NULL,NULL,NULL,NULL,NULL),(13,'Лёша','Уткин','','1г',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachers` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `subjects` varchar(255) NOT NULL,
  `age` int(2) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `e-mail` mediumtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teachers_authorization_uindex` (`login`,`password`),
  UNIQUE KEY `teachers_fullname_uindex` (`name`,`surname`,`middle_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` VALUES (1,'Марат','Стамескин','Рубанкович','MarRub009','7razOtmer,1RazOtrezh','труд, технология',50,'+7(951)675-44-07','marat_rub@mail.ru'),(2,'Валентина','Гваделупова','Аргентинова','ValArg','1100GvAr','география',36,'+7(900)109-55-41','val_arg@inbox.ru');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-29 20:42:20
