-- MySQL dump 10.13  Distrib 5.7.15, for Linux (x86_64)
--
-- Host: localhost    Database: tasp
-- ------------------------------------------------------
-- Server version	5.7.15-0ubuntu0.16.04.1

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
-- Table structure for table `agents`
--

DROP TABLE IF EXISTS `agents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `agent_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qq` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agents`
--

LOCK TABLES `agents` WRITE;
/*!40000 ALTER TABLE `agents` DISABLE KEYS */;
INSERT INTO `agents` VALUES (1,2,'eaenglish','English','EA','female','1990-01-01','','','2018-02-22 13:43:11','2018-02-22 13:43:11');
/*!40000 ALTER TABLE `agents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `teacher` int(11) NOT NULL,
  `topic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course` int(11) NOT NULL,
  `note` int(11) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `evaluation` text COLLATE utf8_unicode_ci,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classes`
--

LOCK TABLES `classes` WRITE;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` VALUES (1,1,1,1,NULL,1,NULL,'2018-02-23 06:30:00','2018-02-23 07:00:00','{\"date\":\"02\\/23\\/2018\",\"attendance\":\"Present\",\"subject\":\"English\",\"topic\":\"English\",\"comment\":\"Great Job!\"}','COMPLETED','REGULAR','2018-02-22 14:27:15','2018-02-22 14:48:27'),(2,1,1,1,NULL,1,NULL,'2018-02-23 07:00:00','2018-02-23 07:30:00','{\"date\":\"02\\/23\\/2018\",\"attendance\":\"Present\",\"subject\":\"English\",\"topic\":\"English\",\"comment\":\"Good Good\"}','COMPLETED','TRIAL','2018-02-22 14:27:27','2018-02-22 15:07:28'),(3,10,1,1,NULL,1,NULL,'2018-02-23 07:30:00','2018-02-23 08:00:00',NULL,'BOOKED','REGULAR','2018-02-22 14:33:36','2018-02-22 14:33:36'),(4,10,1,1,NULL,1,NULL,'2018-02-23 08:00:00','2018-02-23 08:30:00',NULL,'BOOKED','REGULAR','2018-02-22 14:34:32','2018-02-22 14:34:32');
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `regular_classes_completed` int(11) NOT NULL DEFAULT '0',
  `trial_class_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `report` text COLLATE utf8_unicode_ci,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,1,1,2,2,'EA English Course',NULL,NULL,'Active','2018-02-22 14:27:15','2018-02-22 15:07:28');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (100,'2014_10_12_000000_create_users_table',1),(101,'2014_10_12_100000_create_password_resets_table',1),(102,'2017_07_17_083652_create_students_table',1),(103,'2017_07_17_083715_create_teachers_table',1),(104,'2017_07_17_083726_create_classes_table',1),(105,'2017_07_26_022410_create_course_table',1),(106,'2017_07_26_025150_create_agent_table',1),(107,'2017_08_14_053527_create_teachers_schedule_table',1),(108,'2017_09_25_154134_create_news_table',1),(109,'2018_02_19_065520_create_teacher_rank_table',1),(110,'2018_02_21_091449_create_sessions_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `setting` text COLLATE utf8_unicode_ci,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,1,'No Classes From September 30 to October 4','Hello 123','{}','Active','2018-02-22 13:43:13','2018-02-22 13:43:13');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8_unicode_ci,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `student_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `skype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qq` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `available_class` int(11) NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'TEMP',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,10,1,'std0001','Grover','Mac','male','1992-12-12','','',-2,'TEMP','2018-02-22 13:43:12','2018-02-22 15:07:28');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `teacher_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qq` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` VALUES (1,5,'tch001','Siosan','Ken','male','1989-11-01','','',NULL,'2018-02-22 13:43:12','2018-02-22 13:43:12'),(2,6,'tch002','Jodert','Bulaklak','male','1989-11-01','','',NULL,'2018-02-22 13:43:12','2018-02-22 13:43:12'),(3,7,'tch003','Ricardo','Dalisay','male','1989-11-01','','',NULL,'2018-02-22 13:43:12','2018-02-22 13:43:12'),(23,589,'tch023','Howard','Paul','male','1988-11-01','','',NULL,'2018-02-22 13:43:13','2018-02-22 13:43:13'),(56,89,'tch056','Thomas','Peter','male','1988-11-01','','',NULL,'2018-02-22 13:43:13','2018-02-22 13:43:13'),(89,67,'tch089','James','JOnes','male','1988-11-01','','',NULL,'2018-02-22 13:43:13','2018-02-22 13:43:13');
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers_rank`
--

DROP TABLE IF EXISTS `teachers_rank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachers_rank` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rank` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers_rank`
--

LOCK TABLES `teachers_rank` WRITE;
/*!40000 ALTER TABLE `teachers_rank` DISABLE KEYS */;
/*!40000 ALTER TABLE `teachers_rank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers_schedule`
--

DROP TABLE IF EXISTS `teachers_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachers_schedule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers_schedule`
--

LOCK TABLES `teachers_schedule` WRITE;
/*!40000 ALTER TABLE `teachers_schedule` DISABLE KEYS */;
INSERT INTO `teachers_schedule` VALUES (1,1,'2018-02-23 06:30:00','2018-02-23 09:00:00','OPEN','2018-02-22 14:24:44','2018-02-22 14:24:44');
/*!40000 ALTER TABLE `teachers_schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/admin/images/user.png',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=590 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@ea-english.com','$2y$10$f4y55ee4S3h2shm5U.sDWuv/KOTjKb/dwgAFVR0Wwrxg29Q3qvkVa','ADMIN','/admin/images/user.png','sgGPYb7uU3okA2QZIa2SeElN7peSgbuTd7wGo6wquhyTaVguhwivWNQwBJtv','2018-02-22 13:43:11','2018-02-22 15:01:56'),(2,'eaenglish_agent','agent@ea-english.com','$2y$10$N5MeU8EydYVoRLG3WWXVfOoNPA0Q8h9hjdHEPhAm5xoA3HrCA.OBi','AGENT','/admin/images/user.png','8glUz9lwYm5aFtyptqLTEKOhV6UV3NigMXVjXE2Gh5boxwBwHyktNw3QySlW','2018-02-22 13:43:11','2018-02-22 15:06:59'),(5,'teacher1','teacher1@mail.com','$2y$10$3EBJcpH/pCVu.7MPBfREjeA9srRKR37MfRfsyuCE3qKHrGl5A6m4W','TEACHER','/admin/images/user.png','l59bQWrKbwnKGM6H1rV2AGymhUqGQvUH57I3Jw6wgX1VlPOCLyI02bmdjLZw','2018-02-22 13:43:12','2018-02-22 14:56:38'),(6,'teacher2','teacher2@mail.com','$2y$10$nVkNUVAVgvkHJ4VIcOoOtuXDrC2FA288Fzxuxz5lp/GGAPFU0Hseu','TEACHER','/admin/images/user.png',NULL,'2018-02-22 13:43:12','2018-02-22 13:43:12'),(7,'teacher3','teacher3@mail.com','$2y$10$4DO7wm21VxPW8mdJDXcQ2OrU7vOQ6x6JicOaFrM9xesbtuEZZnRBy','TEACHER','/admin/images/user.png',NULL,'2018-02-22 13:43:12','2018-02-22 13:43:12'),(10,'macgrover','macgrover@mail.com','$2y$10$gvTNzTpTTtpcgsAbLk2QNuFaT/iWflQn5KWtfHl/F3NODDNQl44Wi','STUDENT','/admin/images/user.png','oGXMYW9Nm0w25UX0CBUqDjgkUC2LndYsZpYu8nGSeBjgQ1d3Ob48ZIZo7pDA','2018-02-22 13:43:11','2018-02-22 15:02:12'),(67,'james','james@mail.com','$2y$10$vUkFXq9N52rEMSRopfZmXO/U/eQy19YVuFgxUgefSn1ykfxcYOt66','TEACHER','/admin/images/user.png',NULL,'2018-02-22 13:43:13','2018-02-22 13:43:13'),(89,'peter','peter@mail.com','$2y$10$XZD6CHAgvxe4y//sLcd/z.TUsZGNudE6J6owyWZemjCk3EiC.0pVe','TEACHER','/admin/images/user.png',NULL,'2018-02-22 13:43:13','2018-02-22 13:43:13'),(589,'howard','howard@mail.com','$2y$10$I19YsPBGbxYWZupLjhRBruDEPhd7wN2M5bhcyANZ5NJbp9z1WoSX2','TEACHER','/admin/images/user.png',NULL,'2018-02-22 13:43:13','2018-02-22 13:43:13');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-22 15:09:24
