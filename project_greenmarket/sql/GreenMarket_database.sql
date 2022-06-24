-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 34.175.213.0    Database: greenmarket_database
-- ------------------------------------------------------
-- Server version	8.0.26-google

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
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--



--
-- Table structure for table `order_cart`
--

DROP TABLE IF EXISTS `order_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_cart` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `product_id` int unsigned NOT NULL,
  `product_amount` int unsigned NOT NULL,
  `price` decimal(8,2) NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `fk_order_cart_customer_login` (`customer_id`),
  KEY `fk_order_cart_product_info` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_cart`
--

LOCK TABLES `order_cart` WRITE;
/*!40000 ALTER TABLE `order_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_detail` (
  `item_id` int NOT NULL,
  `order_id` int unsigned NOT NULL,
  `product_id` int unsigned NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` decimal(8,2) DEFAULT NULL,
  `procuct_cnt` int NOT NULL DEFAULT '1',
  `all_amount` decimal(8,2) DEFAULT NULL,
  `buy_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`),
  KEY `fk_order_detail_product_info` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail`
--

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_master`
--

DROP TABLE IF EXISTS `order_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_master` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int unsigned NOT NULL,
  `customer_addr_id` int NOT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `payment_method` tinyint NOT NULL,
  `order_status` tinyint NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pay_time` datetime DEFAULT NULL,
  `shipping_time` datetime DEFAULT NULL,
  `receive_time` datetime DEFAULT NULL,
  `cancel_time` datetime DEFAULT NULL,
  `closed_type` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`),
  KEY `fk_order_master_customer_login` (`customer_id`),
  KEY `fk_order_master_custome_address` (`customer_addr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_master`
--

LOCK TABLES `order_master` WRITE;
/*!40000 ALTER TABLE `order_master` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_info`
--

DROP TABLE IF EXISTS `product_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_info` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(20) NOT NULL,
  `one_category` varchar(20) NOT NULL,
  `two_category` varchar(20) DEFAULT NULL,
  `s_id` int NOT NULL,
  `w_id` int NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `production_date` datetime NOT NULL,
  `resource_cast` int NOT NULL,
  `pollution_caused` int NOT NULL,
  `shelf_life` int DEFAULT NULL,
  `descript` varchar(50) NOT NULL,
  `picture` varbinary(10000) NOT NULL DEFAULT '',
  `eletricity_cast` int DEFAULT NULL,
  `water_cast` int DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `fk_product_info_warehouse_info` (`w_id`),
  KEY `S_id_idx` (`s_id`,`w_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_info`
--

LOCK TABLES `product_info` WRITE;
/*!40000 ALTER TABLE `product_info` DISABLE KEYS */;
INSERT INTO `product_info` VALUES (2,'frigorifico lg','eletrodomestico','refrgeração',27,1,600.00,'2021-10-28 00:00:00',5,10,NULL,'um ótimo frigorifico para sua casa',_binary 'fridgelg.jpg',3,0);
/*!40000 ALTER TABLE `product_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_info`
--

DROP TABLE IF EXISTS `shipping_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipping_info` (
  `ship_id` tinyint NOT NULL,
  `transporter_id` int unsigned NOT NULL,
  `receiver_id` int unsigned NOT NULL,
  `vehicle_id` int unsigned NOT NULL,
  `order_id` int unsigned NOT NULL,
  `distance_value` int NOT NULL,
  PRIMARY KEY (`ship_id`),
  KEY `fk_shipping_info_order_detail` (`transporter_id`),
  KEY `reveiver_id` (`receiver_id`),
  KEY `fk_shipping_info_order_master` (`order_id`),
  KEY `fk_shipping_info_veichel_info` (`vehicle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_info`
--

LOCK TABLES `shipping_info` WRITE;
/*!40000 ALTER TABLE `shipping_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `shipping_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_address`
--

DROP TABLE IF EXISTS `user_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_address` (
  `user_addr_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `postal_code` smallint NOT NULL,
  `city` varchar(200) NOT NULL,
  `district` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`user_addr_id`),
  KEY `fk_customer_login_customer_address` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_address`
--

LOCK TABLES `user_address` WRITE;
/*!40000 ALTER TABLE `user_address` DISABLE KEYS */;
INSERT INTO `user_address` VALUES (1,18,1234,'halicarnassus','halicarnassus','halicarnassus, Turkey'),(2,26,4321,'kansas city','kansas','street20 kansas city kansas'),(3,27,4321,'kansas city','kansas','street20 kansas city kansas'),(4,28,3214,'porto','lisboa','lisboa'),(5,29,3850,'Albergaria-a-Velha','lisboa','Rua Conselheiro José Mourisca nº15'),(6,31,2550,'Lisboa','Lisboa','Rua');
/*!40000 ALTER TABLE `user_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_info` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL,
  `password` char(32) NOT NULL,
  `name` char(32) DEFAULT NULL,
  `email` char(50) NOT NULL,
  `accountType` char(32) DEFAULT NULL,
  `birthday` char(32) DEFAULT NULL,
  `gender` char(32) DEFAULT NULL,
  `phone` char(32) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_info`
--

LOCK TABLES `user_info` WRITE;
/*!40000 ALTER TABLE `user_info` DISABLE KEYS */;
INSERT INTO `user_info` VALUES (1,'administrator','admin12345',NULL,'administratorgreenamrket@hotmail.com','admin',NULL,NULL,NULL,'2022-06-21 18:34:49'),(4,'','',NULL,'',NULL,NULL,NULL,NULL,'2022-05-03 22:32:42'),(5,'jacobino','jacobino1234',NULL,'jacobino@hotmail.com',NULL,NULL,NULL,NULL,'2022-05-03 23:00:14'),(6,'frfrfrfr','frfrfrfrfrfr',NULL,'franciscofdias2@gmail.com',NULL,NULL,NULL,NULL,'2022-05-03 23:37:34'),(7,'Filipe00','Filipe00',NULL,'filipeOMaior@gmail.com',NULL,NULL,NULL,NULL,'2022-05-03 23:37:42'),(8,'francisco','francisco123',NULL,'franciscofdias248@gmail.com',NULL,NULL,NULL,NULL,'2022-05-04 10:59:11'),(9,'lucas','lucas1234',NULL,'lucas@hotmail.com',NULL,NULL,NULL,NULL,'2022-05-19 11:40:29'),(10,'lopes','lopezpolez',NULL,'lopes@email.com','',NULL,NULL,NULL,'2022-05-19 16:06:44'),(13,'lex','lexlex',NULL,'lex@email.com','',NULL,NULL,NULL,'2022-05-19 17:10:35'),(18,'Herodotus','herodotusHistorian','Herodotus','Herodotus@email.com','consumer','','','555555555','2022-05-19 17:50:33'),(27,'frankie','frankfrank','frank west','frank@email.com','supplier','','','999999999','2022-05-31 23:25:47'),(29,'manuel','manuelmanuel','Jose Francisco Fernandes Dias','manuel@email.com','consumer','','','918592467','2022-06-01 14:49:38'),(31,'rocha','rocharocha','Rocha','rocha@gmail.com','transporter','','','913242341','2022-06-21 16:17:38');
/*!40000 ALTER TABLE `user_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_info`
--

DROP TABLE IF EXISTS `vehicle_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicle_info` (
  `vehicle_id` int NOT NULL AUTO_INCREMENT,
  `transporter_id` int NOT NULL,
  `vehicle_type` char(50) NOT NULL,
  `pollution_caused` int NOT NULL,
  `plate_number` varchar(6) NOT NULL,
  `pic_desc` varbinary(10000) DEFAULT NULL,
  `descript` text NOT NULL,
  PRIMARY KEY (`vehicle_id`),
  KEY `fk_veichle_info_customer_login` (`transporter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_info`
--

LOCK TABLES `vehicle_info` WRITE;
/*!40000 ALTER TABLE `vehicle_info` DISABLE KEYS */;
INSERT INTO `vehicle_info` VALUES (2,31,'c1',127,'abc-53',NULL,'veiculo de quatro rodas');
/*!40000 ALTER TABLE `vehicle_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouse_info`
--

DROP TABLE IF EXISTS `warehouse_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `warehouse_info` (
  `warehouse_id` int NOT NULL AUTO_INCREMENT,
  `supplier_id` int NOT NULL,
  `warehouse_name` varchar(10) NOT NULL,
  `warehouse_phone` int NOT NULL,
  `email` varchar(10) NOT NULL,
  `city` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  PRIMARY KEY (`warehouse_id`),
  KEY `fk_warehouse_info_customer_login` (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouse_info`
--

LOCK TABLES `warehouse_info` WRITE;
/*!40000 ALTER TABLE `warehouse_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `warehouse_info` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-24  0:03:23
