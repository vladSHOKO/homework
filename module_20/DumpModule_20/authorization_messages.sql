-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: authorization
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `sender_id` int NOT NULL,
  `recipient_id` int NOT NULL,
  `readed` tinyint NOT NULL DEFAULT '0',
  `time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `messages_id_uindex` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'Приветствие','Ну привет, дружище! Как у тебя дела?',2,1,1,''),(2,'Вопрос по делу № 134','Поступили новые указания, касательно работы в данном проекте. Как ты на них смотришь?',3,1,1,''),(3,'Задача на завтра','Привет! Как успехи с учёбой? Высылаю тебе задачу, которую хорошо бы сделать к завтрашнему дню',4,1,1,''),(4,'Приглашение в чат','Привет! Хочу пригласить тебя в чат наших супер крутых чуваков',2,1,1,'2024-01-22 13:03:12'),(5,'Эй, дружище на ID 2','Это я так, хочу глянуть придёт ли это письмо челу с id - 1',3,2,0,'2024-01-22 13:03:12'),(6,'Туц-туц','Да это я так, решил просто тебе написать, дружище',1,2,0,'2024-01-22 13:03:12'),(7,'Кац-кац','Хехеййййййй, давай дружить',4,2,0,'2024-01-22 13:03:12'),(8,'Дарова','Как твои дела? Давай знакомится и дружить?',1,3,0,'2024-01-22 13:03:12'),(9,'Hello','Дратути. Я бы хотел с тобой дружить',2,3,0,'2024-01-22 13:03:12'),(10,'Привет мучачос','Здаровосто, асталовисто беби',4,3,0,'2024-01-22 13:03:12'),(11,'Ну здраствуй амиго','Как твои дела, дружище, давно не виделись! Давай встретимся',1,4,1,'2024-01-22 13:03:12'),(12,'Делопроизводителю','Здравствуйте! Необходимо явится на работу завтра. Накопилось много документов',2,4,1,'2024-01-22 13:03:12'),(13,'Го бухать','Дарова, дружбанннннн!!! У меня завтра день рождения, пошли бухнем как следует',3,4,1,'2024-01-22 13:03:12'),(14,'Пробное письмо','Пробное письмо',1,4,1,'2024-01-22 13:03:12'),(15,'Пробное письмо самому себе','Пробное письмо самому себе',1,1,1,'2024-01-22 13:03:12'),(16,'Пробное письмо самому себе','Пробное письмо самому себе',1,1,1,'2024-01-22 13:03:12'),(17,'Повторное письмо самому себе','Пробное письмо самому себе',1,1,1,'2024-01-22 13:03:12'),(18,'Проверка на дату ','Проверяю будет ли введена дата и время отправки сообщения',1,1,1,'2024-01-22 13:03:12'),(19,'Проверка на дату ','Проверяю будет ли введена дата и время отправки сообщения',1,1,1,'2024-01-22 13:03:12'),(20,'Проверка на дату повторное','Повторно проверяю вывод даты и времени отправки письма',1,1,1,'2024-01-22 13:03:32'),(21,'Сами сусами','Сам сусам',1,1,1,'2024-01-22 14:01:30'),(22,'DDDDDDD','DDDDD',1,1,1,'2024-01-22 14:06:06'),(23,'qwerty','qwertt',1,1,1,'2024-01-22 14:20:01'),(24,'ДРАААААТУТИ','ДРАААААТУТИ',1,1,1,'2024-01-22 14:22:31'),(25,'FPFPFPFPFP','fpfpfpfpfpfpfpfp',1,1,1,'2024-01-22 14:23:19'),(26,'qwer','qwer',4,4,1,'2024-02-06 14:09:27'),(27,'06/02/2024 message','test message',4,4,1,'2024-02-06 16:36:52');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-06 22:05:03
