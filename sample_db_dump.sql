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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agents`
--

LOCK TABLES `agents` WRITE;
/*!40000 ALTER TABLE `agents` DISABLE KEYS */;
INSERT INTO `agents` VALUES (1,2,'eaenglish','English','EA','female','1990-01-01','','','2018-03-04 04:34:07','2018-03-04 04:34:07'),(3,591,'agentx4411','Agen123','agnent','female','1981-03-04','','','2018-03-07 06:01:01','2018-03-09 14:15:53');
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classes`
--

LOCK TABLES `classes` WRITE;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` VALUES (1,1,1,1,NULL,1,NULL,'2018-03-06 07:00:00','2018-03-06 07:30:00',NULL,'BOOKED','REGULAR','2018-03-04 07:16:13','2018-03-04 07:16:13'),(2,1,1,1,NULL,1,NULL,'2018-03-07 08:30:00','2018-03-07 09:00:00',NULL,'CANCELLED','REGULAR','2018-03-04 07:16:25','2018-03-05 15:47:19'),(3,2,1,1,NULL,1,NULL,'2018-03-06 07:30:00','2018-03-06 08:00:00',NULL,'BOOKED','REGULAR','2018-03-05 15:40:16','2018-03-05 15:40:16'),(4,10,1,1,NULL,1,NULL,'2018-03-07 07:00:00','2018-03-07 07:30:00',NULL,'CANCELLED','REGULAR','2018-03-05 15:56:52','2018-03-06 10:40:49'),(5,1,1,1,NULL,1,NULL,'2018-03-06 08:00:00','2018-03-06 08:30:00',NULL,'BOOKED','REGULAR','2018-03-05 16:10:07','2018-03-05 16:10:07'),(6,1,1,1,NULL,1,NULL,'2018-03-06 08:30:00','2018-03-06 09:00:00',NULL,'BOOKED','REGULAR','2018-03-05 16:10:14','2018-03-05 16:10:14'),(7,10,1,1,NULL,1,NULL,'2018-03-08 15:00:00','2018-03-08 15:30:00','{\"date\":\"03\\/08\\/2018\",\"attendance\":\"Present\",\"subject\":\"English\",\"topic\":\"English\",\"comment\":\"Good 123\"}','COMPLETED','REGULAR','2018-03-08 04:52:21','2018-03-08 04:55:14'),(8,10,1,1,NULL,1,NULL,'2018-03-08 15:30:00','2018-03-08 16:00:00','{\"date\":\"03\\/08\\/2018\",\"attendance\":\"Present\",\"subject\":\"English\",\"topic\":\"English\",\"comment\":\"GooD 2343\"}','COMPLETED','REGULAR','2018-03-08 04:55:31','2018-03-08 06:43:26'),(9,10,1,1,NULL,1,NULL,'2018-03-16 10:00:00','2018-03-16 10:30:00',NULL,'BOOKED','REGULAR','2018-03-08 10:48:38','2018-03-08 10:48:38'),(10,1,1,1,NULL,1,NULL,'2018-03-16 11:30:00','2018-03-16 12:00:00',NULL,'BOOKED','REGULAR','2018-03-13 02:01:07','2018-03-13 02:01:07'),(11,1,2,1,NULL,2,NULL,'2018-03-16 10:30:00','2018-03-16 11:00:00',NULL,'BOOKED','REGULAR','2018-03-13 02:17:04','2018-03-13 02:17:04');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,1,1,4,NULL,'EA English Course',NULL,NULL,'Active','2018-03-04 07:16:13','2018-03-08 06:43:26'),(2,2,1,0,NULL,'EA English Course',NULL,NULL,'Active','2018-03-13 02:17:04','2018-03-13 02:17:04');
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_07_17_083652_create_students_table',1),(4,'2017_07_17_083715_create_teachers_table',1),(5,'2017_07_17_083726_create_classes_table',1),(6,'2017_07_26_022410_create_course_table',1),(7,'2017_07_26_025150_create_agent_table',1),(8,'2017_08_14_053527_create_teachers_schedule_table',1),(9,'2017_09_25_154134_create_news_table',1),(10,'2018_02_19_065520_create_teacher_rank_table',1),(11,'2018_02_21_091449_create_sessions_table',1);
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
INSERT INTO `news` VALUES (1,1,'No Classes From September 30 to October 4','Hello 123','{}','Active','2018-03-04 04:34:09','2018-03-04 04:34:09');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,10,1,'std00012','Grover','Mac','male','1989-12-10','','',16,'TEMP','2018-03-04 04:34:07','2018-03-09 14:34:54'),(2,592,1,'std123456','Mac123','Grover456','male','1992-03-03','','',5,'TEMP','2018-03-13 02:15:32','2018-03-13 02:16:42');
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
INSERT INTO `teachers` VALUES (1,5,'tch001','Siosan','Ken','male','1989-11-01','','',NULL,'2018-03-04 04:34:07','2018-03-04 04:34:07'),(2,6,'teacher2','Jodert','Bulaklak','male','1989-11-01','','','Gwapo ako','2018-03-04 04:34:08','2018-03-09 13:52:57'),(3,7,'tch003','Ricardo','Dalisay','male','1989-11-01','','',NULL,'2018-03-04 04:34:08','2018-03-04 04:34:08'),(23,589,'tch023','Howard','Paul','male','1988-11-01','','',NULL,'2018-03-04 04:34:09','2018-03-04 04:34:09'),(56,89,'tch056','Thomas','Peter','male','1988-11-01','','',NULL,'2018-03-04 04:34:08','2018-03-04 04:34:08'),(89,67,'tch089','James','JOnes','male','1988-11-01','','',NULL,'2018-03-04 04:34:09','2018-03-04 04:34:09');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers_rank`
--

LOCK TABLES `teachers_rank` WRITE;
/*!40000 ALTER TABLE `teachers_rank` DISABLE KEYS */;
INSERT INTO `teachers_rank` VALUES (1,1,1,'2018-03-04 07:15:21','2018-03-04 07:15:21'),(2,2,2,'2018-03-04 07:15:21','2018-03-05 16:12:37'),(3,3,23,'2018-03-04 07:15:21','2018-03-05 16:12:37'),(4,4,3,'2018-03-04 07:15:21','2018-03-05 16:12:37');
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers_schedule`
--

LOCK TABLES `teachers_schedule` WRITE;
/*!40000 ALTER TABLE `teachers_schedule` DISABLE KEYS */;
INSERT INTO `teachers_schedule` VALUES (1,1,'2018-03-06 07:00:00','2018-03-06 12:30:00','OPEN','2018-03-04 06:43:49','2018-03-04 08:52:10'),(2,1,'2018-03-07 07:00:00','2018-03-07 09:00:00','OPEN','2018-03-04 07:15:34','2018-03-06 10:33:07'),(3,1,'2018-03-08 07:00:00','2018-03-08 09:00:00','OPEN','2018-03-04 08:47:49','2018-03-04 08:48:07'),(4,1,'2018-03-09 07:00:00','2018-03-09 12:30:00','OPEN','2018-03-05 07:18:25','2018-03-05 07:18:25'),(5,1,'2018-03-07 10:00:00','2018-03-07 11:00:00','CLOSED','2018-03-05 07:18:39','2018-03-05 07:18:56'),(6,1,'2018-03-07 11:00:00','2018-03-07 14:30:00','OPEN','2018-03-05 07:18:47','2018-03-06 10:32:59'),(7,1,'2018-03-07 17:00:00','2018-03-07 20:00:00','OPEN','2018-03-05 09:45:08','2018-03-05 09:45:08'),(8,3,'2018-03-07 07:00:00','2018-03-07 14:00:00','OPEN','2018-03-05 10:11:42','2018-03-05 10:11:42'),(9,2,'2018-03-07 07:00:00','2018-03-07 11:00:00','OPEN','2018-03-05 10:12:01','2018-03-05 15:59:34'),(10,2,'2018-03-07 05:00:00','2018-03-07 06:30:00','OPEN','2018-03-05 10:12:20','2018-03-05 10:12:20'),(11,2,'2018-03-08 07:30:00','2018-03-08 09:30:00','OPEN','2018-03-05 16:13:31','2018-03-05 16:13:31'),(12,3,'2018-03-08 07:00:00','2018-03-08 09:00:00','OPEN','2018-03-05 16:22:53','2018-03-05 16:22:53'),(13,1,'2018-03-08 15:00:00','2018-03-08 21:00:00','OPEN','2018-03-08 04:51:28','2018-03-08 04:51:28'),(14,1,'2018-03-17 10:00:00','2018-03-17 15:00:00','OPEN','2018-03-08 10:48:13','2018-03-08 10:48:13'),(15,1,'2018-03-16 10:00:00','2018-03-16 15:00:00','OPEN','2018-03-08 10:48:24','2018-03-08 10:48:24');
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
) ENGINE=InnoDB AUTO_INCREMENT=593 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@ea-english.com','$2y$10$rzQZXwX8BFKurt8kFEbSHOU..HKqw8TmF6secc9lojdqnhzvLJ2Ee','ADMIN','uploads/1520146137.png','ROMLweZijRwLFTuYgVbh1WqMQ7NYohY04SygGvk4ww1pph2ojOZl6rc0bOTX','2018-03-04 04:34:06','2018-03-13 02:31:11'),(2,'eaenglish_agent','agent@ea-english.com','$2y$10$1/8JL68n4Gl2C6mEw0924.atEgO6Bh/kJhAGxBBkmOdCNvGupvyzm','AGENT','uploads/1520265227.png','az4Mn0uiqqWFT9YD4qqFrKU4JIG8tlwVAxv0CU4shxkiK6tFSYAE3aCRXRji','2018-03-04 04:34:07','2018-03-13 15:11:19'),(5,'teacher1','teacher1@mail.com','$2y$10$0b/ajLLUopMawRJceVR1je5aM5TOTjdvwpIHtyzZHrT6i2CQfELZ2','TEACHER','/admin/images/user.png','TYWbXdwP7yTBnRa0GmPQP2kVcd9JHgS1cYBreUsoHgElamH9irXXlcWrC6Vl','2018-03-04 04:34:07','2018-03-08 07:44:58'),(6,'teacher2','teacher2@mail.com','$2y$10$YFGBQK7OqAlxhIi1f0nWRu.ekGK9wl41bSqYADnCyf5nmIxZX2Pai','TEACHER','/admin/images/user.png',NULL,'2018-03-04 04:34:08','2018-03-09 14:17:30'),(7,'teacher3','teacher3@mail.com','$2y$10$YtgzV7DFQdaAdcVoRGLA9uDTTbPx7Wv/hfEWbr6m4W1YScK6S7Q3K','TEACHER','/admin/images/user.png',NULL,'2018-03-04 04:34:08','2018-03-04 04:34:08'),(10,'macgrover','macgrover@mail.com','$2y$10$fhoXxFLXMgaRB1yzhwJb7.hxUwcUBrAeoQ3AvUJQOVQPnRZySNOy.','STUDENT','/admin/images/user.png','buB4ZgTofHwCdr3O0PKSSRT4c23OrsYuxS2aylhr3ZRNzVlx13p7SfnyqZBA','2018-03-04 04:34:07','2018-03-13 15:07:15'),(67,'james','james@mail.com','$2y$10$ehvDPW0a8Ejp/ejSz6C6tOif77J/DJySRcZaf7Cv2dK8323xfcBy2','TEACHER','/admin/images/user.png',NULL,'2018-03-04 04:34:09','2018-03-04 04:34:09'),(89,'peter','peter@mail.com','$2y$10$AU1qzl6yRo.jEnMB7LyAbe.a8QD4IlBVN4kO16EdsQF5ryTIjl3hi','TEACHER','/admin/images/user.png',NULL,'2018-03-04 04:34:08','2018-03-04 04:34:08'),(589,'howard','howard@mail.com','$2y$10$43o6sEj.L6LdO1/6BImHyOvpxzWJSTVqERrt0Trnvb44YNqE.TVp.','TEACHER','/admin/images/user.png',NULL,'2018-03-04 04:34:09','2018-03-04 04:34:09'),(591,'agent234','agent2@ea-english.com','$2y$10$CFo949VqGXN.r9UcEkjIW.Pz3bKboYHkJR08aWyZOmPtVCJfwwAza','AGENT','/admin/images/user.png',NULL,'2018-03-07 06:01:01','2018-03-09 14:16:55'),(592,'mac11234','macgrover1@mail.com','$2y$10$ae7wJpHaSB3H/0cGz5EkhOWj47fmjlXdLwL1dxTxXLzi4kjf0OeJe','STUDENT','/admin/images/user.png',NULL,'2018-03-13 02:15:32','2018-03-13 02:15:32');
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

-- Dump completed on 2018-03-22  8:17:51
