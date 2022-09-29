-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: library
-- ------------------------------------------------------
-- Server version	8.0.29

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
-- Table structure for table `book.author`
--

DROP TABLE IF EXISTS `book.author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book.author` (
  `author_id` int NOT NULL,
  `first_name` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `middle_name` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT NULL,
  `last_name` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book.author`
--

LOCK TABLES `book.author` WRITE;
/*!40000 ALTER TABLE `book.author` DISABLE KEYS */;
INSERT INTO `book.author` VALUES (0,'Unknown',NULL,NULL),(1,'Tooru',NULL,' Fujisawa'),(2,'Sou',NULL,'Yayoi'),(3,'HERO',NULL,NULL),(4,'Satoshi',NULL,'Mizukami'),(5,'Naoshi',NULL,'Komi'),(6,'Tamiki',NULL,'Wakaki');
/*!40000 ALTER TABLE `book.author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book.book`
--

DROP TABLE IF EXISTS `book.book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book.book` (
  `book_id` int NOT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `title` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `publisher_id` int NOT NULL,
  `date_added` date NOT NULL,
  `number_of_copies` int NOT NULL,
  PRIMARY KEY (`book_id`),
  KEY `publisher_id_idx` (`publisher_id`),
  CONSTRAINT `publisher_book` FOREIGN KEY (`publisher_id`) REFERENCES `book.publisher` (`publisher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book.book`
--

LOCK TABLES `book.book` WRITE;
/*!40000 ALTER TABLE `book.book` DISABLE KEYS */;
INSERT INTO `book.book` VALUES (0,'0','None',0,'2022-07-01',0),(1,'9784063124118','Great Teacher Onizuka',1,'2022-07-09',5),(2,'9780316342032','Horimiya',2,'2022-07-14',6),(3,NULL,'ReLIFE',3,'2022-07-18',10),(4,'9781626926011','Spirit Circle',4,'2022-07-18',4),(5,NULL,'Tokidoki',0,'2022-07-18',2),(6,NULL,'The World God Only Knows',0,'2022-07-18',10);
/*!40000 ALTER TABLE `book.book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book.book_author`
--

DROP TABLE IF EXISTS `book.book_author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book.book_author` (
  `book_id` int NOT NULL,
  `author_id` int NOT NULL,
  KEY `book_id_idx` (`book_id`),
  KEY `author_id_idx` (`author_id`),
  CONSTRAINT `author_book_author` FOREIGN KEY (`author_id`) REFERENCES `book.author` (`author_id`),
  CONSTRAINT `book_book_author` FOREIGN KEY (`book_id`) REFERENCES `book.book` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book.book_author`
--

LOCK TABLES `book.book_author` WRITE;
/*!40000 ALTER TABLE `book.book_author` DISABLE KEYS */;
INSERT INTO `book.book_author` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(0,0);
/*!40000 ALTER TABLE `book.book_author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book.book_category`
--

DROP TABLE IF EXISTS `book.book_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book.book_category` (
  `book_id` int NOT NULL,
  `category_id` int NOT NULL,
  KEY `book_id_idx` (`book_id`),
  KEY `category_id_idx` (`category_id`),
  CONSTRAINT `book_book_category` FOREIGN KEY (`book_id`) REFERENCES `book.book` (`book_id`),
  CONSTRAINT `category_book_category` FOREIGN KEY (`category_id`) REFERENCES `book.category` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book.book_category`
--

LOCK TABLES `book.book_category` WRITE;
/*!40000 ALTER TABLE `book.book_category` DISABLE KEYS */;
INSERT INTO `book.book_category` VALUES (1,1),(1,2),(1,3),(2,4),(3,2),(3,3),(3,4),(3,5),(4,1),(4,2),(4,3),(4,4),(4,6),(4,7),(5,3),(5,4),(6,2),(6,4),(6,7),(6,8),(0,0);
/*!40000 ALTER TABLE `book.book_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book.category`
--

DROP TABLE IF EXISTS `book.category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book.category` (
  `category_id` int NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book.category`
--

LOCK TABLES `book.category` WRITE;
/*!40000 ALTER TABLE `book.category` DISABLE KEYS */;
INSERT INTO `book.category` VALUES (0,'Unknown'),(1,'Action'),(2,'Comedy'),(3,'Drama'),(4,'Romance'),(5,'Slice of Life'),(6,'Adventure'),(7,'Supernatural'),(8,'Fantasy');
/*!40000 ALTER TABLE `book.category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book.popular`
--

DROP TABLE IF EXISTS `book.popular`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book.popular` (
  `book_id` int NOT NULL,
  `favorite_number` int NOT NULL DEFAULT '0',
  KEY `book_id_idx` (`book_id`),
  CONSTRAINT `book_popular` FOREIGN KEY (`book_id`) REFERENCES `book.book` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book.popular`
--

LOCK TABLES `book.popular` WRITE;
/*!40000 ALTER TABLE `book.popular` DISABLE KEYS */;
INSERT INTO `book.popular` VALUES (1,0),(2,0),(3,0),(4,0),(5,0),(6,0),(0,0);
/*!40000 ALTER TABLE `book.popular` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book.publisher`
--

DROP TABLE IF EXISTS `book.publisher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book.publisher` (
  `publisher_id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`publisher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book.publisher`
--

LOCK TABLES `book.publisher` WRITE;
/*!40000 ALTER TABLE `book.publisher` DISABLE KEYS */;
INSERT INTO `book.publisher` VALUES (0,'Unknown'),(1,'Kodansha'),(2,'Yen Press'),(3,'comico'),(4,'Seven Seas');
/*!40000 ALTER TABLE `book.publisher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booklist.booklist`
--

DROP TABLE IF EXISTS `booklist.booklist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booklist.booklist` (
  `booklist_id` int NOT NULL,
  `Name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `user_id` int NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`booklist_id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `user_booklist` FOREIGN KEY (`user_id`) REFERENCES `user.user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booklist.booklist`
--

LOCK TABLES `booklist.booklist` WRITE;
/*!40000 ALTER TABLE `booklist.booklist` DISABLE KEYS */;
INSERT INTO `booklist.booklist` VALUES (1,'Returned',2,'2022-07-15 00:00:00'),(2,'Borrowing',2,'2022-07-14 00:00:00'),(3,'PlanToBorrow',2,'2022-07-13 00:00:00'),(4,'Returned',1,'2022-07-18 00:00:00'),(5,'Borrowing',1,'2022-07-18 00:00:00'),(6,'PlanToBorrow',1,'2022-07-18 00:00:00');
/*!40000 ALTER TABLE `booklist.booklist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booklist.booklist_book`
--

DROP TABLE IF EXISTS `booklist.booklist_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booklist.booklist_book` (
  `booklist_id` int NOT NULL,
  `book_id` int NOT NULL,
  KEY `booklist_id_idx` (`booklist_id`),
  KEY `book_id_idx` (`book_id`),
  CONSTRAINT `book_booklist_book` FOREIGN KEY (`book_id`) REFERENCES `book.book` (`book_id`),
  CONSTRAINT `booklist_booklist_book` FOREIGN KEY (`booklist_id`) REFERENCES `booklist.booklist` (`booklist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booklist.booklist_book`
--

LOCK TABLES `booklist.booklist_book` WRITE;
/*!40000 ALTER TABLE `booklist.booklist_book` DISABLE KEYS */;
INSERT INTO `booklist.booklist_book` VALUES (1,1),(1,2),(3,3),(3,4),(3,5),(2,6),(6,4),(6,2),(4,3);
/*!40000 ALTER TABLE `booklist.booklist_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `borrow.borrowing`
--

DROP TABLE IF EXISTS `borrow.borrowing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `borrow.borrowing` (
  `borrow_id` int NOT NULL,
  `user_id` int NOT NULL,
  `book_id` int NOT NULL,
  `borrow_date` date NOT NULL,
  `due_date` date NOT NULL,
  PRIMARY KEY (`borrow_id`),
  KEY `user_id_idx` (`user_id`),
  KEY `book_id_idx` (`book_id`),
  CONSTRAINT `book_borrowing` FOREIGN KEY (`book_id`) REFERENCES `book.book` (`book_id`),
  CONSTRAINT `user_borrowing` FOREIGN KEY (`user_id`) REFERENCES `user.user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `borrow.borrowing`
--

LOCK TABLES `borrow.borrowing` WRITE;
/*!40000 ALTER TABLE `borrow.borrowing` DISABLE KEYS */;
/*!40000 ALTER TABLE `borrow.borrowing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user.email_address`
--

DROP TABLE IF EXISTS `user.email_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user.email_address` (
  `user_id` int NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `modified_date` datetime NOT NULL,
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `user_email_address` FOREIGN KEY (`user_id`) REFERENCES `user.user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user.email_address`
--

LOCK TABLES `user.email_address` WRITE;
/*!40000 ALTER TABLE `user.email_address` DISABLE KEYS */;
INSERT INTO `user.email_address` VALUES (1,'truongtuananhsamson@gmail.com','2022-07-09 00:00:00'),(2,'shadow@email.com','2022-07-13 00:00:00');
/*!40000 ALTER TABLE `user.email_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user.librarian`
--

DROP TABLE IF EXISTS `user.librarian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user.librarian` (
  `librarian_id` int NOT NULL,
  `first_name` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `middle_name` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT NULL,
  `last_name` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  KEY `user_id_idx` (`librarian_id`),
  CONSTRAINT `user_librarian` FOREIGN KEY (`librarian_id`) REFERENCES `user.user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user.librarian`
--

LOCK TABLES `user.librarian` WRITE;
/*!40000 ALTER TABLE `user.librarian` DISABLE KEYS */;
INSERT INTO `user.librarian` VALUES (1,'Tuấn Anh',NULL,'Trương');
/*!40000 ALTER TABLE `user.librarian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user.member`
--

DROP TABLE IF EXISTS `user.member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user.member` (
  `member_id` int NOT NULL,
  `first_name` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT NULL,
  `middle_name` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT NULL,
  `last_name` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT NULL,
  KEY `member_id_idx` (`member_id`),
  CONSTRAINT `user_member` FOREIGN KEY (`member_id`) REFERENCES `user.user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user.member`
--

LOCK TABLES `user.member` WRITE;
/*!40000 ALTER TABLE `user.member` DISABLE KEYS */;
INSERT INTO `user.member` VALUES (2,'Cid',NULL,'Kageno');
/*!40000 ALTER TABLE `user.member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user.password`
--

DROP TABLE IF EXISTS `user.password`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user.password` (
  `user_id` int NOT NULL,
  `password_hash` varchar(45) DEFAULT NULL,
  `password_salt` varchar(20) DEFAULT NULL,
  `modified_date` datetime NOT NULL,
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `user_password` FOREIGN KEY (`user_id`) REFERENCES `user.user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user.password`
--

LOCK TABLES `user.password` WRITE;
/*!40000 ALTER TABLE `user.password` DISABLE KEYS */;
INSERT INTO `user.password` VALUES (1,'e10adc3949ba59abbe56e057f20f883e',NULL,'2022-07-13 00:00:00'),(2,'e10adc3949ba59abbe56e057f20f883e',NULL,'2022-07-13 00:00:00');
/*!40000 ALTER TABLE `user.password` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user.phone_number`
--

DROP TABLE IF EXISTS `user.phone_number`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user.phone_number` (
  `user_id` int NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `modified_date` datetime NOT NULL,
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `user_phone_number` FOREIGN KEY (`user_id`) REFERENCES `user.user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user.phone_number`
--

LOCK TABLES `user.phone_number` WRITE;
/*!40000 ALTER TABLE `user.phone_number` DISABLE KEYS */;
INSERT INTO `user.phone_number` VALUES (1,'0123456789','2022-07-09 00:00:00'),(2,'234567891','2022-07-13 00:00:00');
/*!40000 ALTER TABLE `user.phone_number` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user.user`
--

DROP TABLE IF EXISTS `user.user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user.user` (
  `user_id` int NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user.user`
--

LOCK TABLES `user.user` WRITE;
/*!40000 ALTER TABLE `user.user` DISABLE KEYS */;
INSERT INTO `user.user` VALUES (0,'None','2022-07-01 00:00:00'),(1,'Kokoroou','2022-07-09 00:00:00'),(2,'Shadow','2022-07-13 00:00:00');
/*!40000 ALTER TABLE `user.user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-21  9:57:59
