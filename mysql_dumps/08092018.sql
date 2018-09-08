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
-- Table structure for table `info_pages`
--

DROP TABLE IF EXISTS `info_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `info_pages` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `position` int(3) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `type` enum('top','sidebar','all') NOT NULL,
  `visible` enum('0','1') NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `value` enum('common','special','main') NOT NULL,
  `description` mediumtext,
  `keywords` mediumtext,
  `content` longtext,
  `created` int(11) NOT NULL,
  `updated` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `info_pages_name_uindex` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_pages`
--

LOCK TABLES `info_pages` WRITE;
/*!40000 ALTER TABLE `info_pages` DISABLE KEYS */;
INSERT INTO `info_pages` VALUES (1,'Главная страница',NULL,'','all','1','Главная страница','main',NULL,NULL,'Это &mdash; главная страница',0,NULL),(3,'Страница из верхнего меню',1,'icon-glass','top','1','Верхняя страница','common',NULL,NULL,'Верхняя страница',0,NULL),(4,'Страница из бокового меню',3,'icon-align-justify','sidebar','1','Боковая страница','common',NULL,NULL,'Боковая страница',0,NULL),(5,'Для Учителей',2,'menu-teachers-icon.png','sidebar','1','Для учителей','special',NULL,NULL,'<p><h3>Для учителей: </h3></p> <ul><li>...</li><li>и ...</li></ul>',0,NULL),(6,'Для родителей',1,'menu-parents-icon.png','sidebar','1','Для родителей','special',NULL,NULL,'<p><h3>Для родителей: </h3></p> <ul><li>...</li><li>и ...</li></ul>',0,NULL);
/*!40000 ALTER TABLE `info_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `journal_list`
--

DROP TABLE IF EXISTS `journal_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `journal_list` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `student_id` int(4) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `mark` varchar(2) NOT NULL,
  `year` int(4) DEFAULT NULL,
  `month` int(2) DEFAULT NULL,
  `day` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `journal_list`
--

LOCK TABLES `journal_list` WRITE;
/*!40000 ALTER TABLE `journal_list` DISABLE KEYS */;
INSERT INTO `journal_list` VALUES (1,3,'математика','5',2018,7,25),(2,11,'математика','4',2018,7,19),(3,12,'физика','3',2018,12,22),(4,13,'информатика','2',2018,1,17),(5,3,'физика','4+',2018,5,3);
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
INSERT INTO `students` VALUES (3,'Александр','Петров','Иванович','4б','6462fe04cb92aaf0ce5f03daf925f324','Aleksandr',NULL,NULL,NULL),(11,'Иван','Пупкин','Васильевич','5а',NULL,NULL,NULL,NULL,NULL),(12,'Василий','Цимбалюк','Андреевич','5а',NULL,NULL,NULL,NULL,NULL),(13,'Лёша','Уткин','Васильевич','1г',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `form` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subjects_subject_uindex` (`subject`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'математика',1),(2,'физика',5);
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers_and_director`
--

DROP TABLE IF EXISTS `teachers_and_director`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachers_and_director` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `is_director` enum('YES','NO') NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `subjects` varchar(255) DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `e-mail` mediumtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teachers_authorization_uindex` (`login`,`password`),
  UNIQUE KEY `teachers_fullname_uindex` (`name`,`surname`,`middle_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers_and_director`
--

LOCK TABLES `teachers_and_director` WRITE;
/*!40000 ALTER TABLE `teachers_and_director` DISABLE KEYS */;
INSERT INTO `teachers_and_director` VALUES (1,'NO','Марат','Стамескин','Рубанкович','MarRub009','6462fe04cb92aaf0ce5f03daf925f324','труд, технология',50,'+7(951)675-44-07','marat_rub@mail.ru'),(2,'NO','Валентина','Гваделупова','Аргентинова','ValArg','1100GvAr','география',36,'+7(900)109-55-41','val_arg@inbox.ru');
/*!40000 ALTER TABLE `teachers_and_director` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-08 16:55:10
