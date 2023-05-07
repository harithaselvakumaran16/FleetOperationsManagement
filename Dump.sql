CREATE DATABASE  IF NOT EXISTS `carrentalsystem1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `carrentalsystem1`;
-- MySQL dump 10.13  Distrib 8.0.27, for macos11 (x86_64)
--
-- Host: localhost    Database: carrentalsystem1
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `approvalStatus`
--

DROP TABLE IF EXISTS `approvalStatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `approvalStatus` (
  `id` varchar(200) NOT NULL,
  `status` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `approvalStatus`
--

LOCK TABLES `approvalStatus` WRITE;
/*!40000 ALTER TABLE `approvalStatus` DISABLE KEYS */;
INSERT INTO `approvalStatus` VALUES ('rk@gmail.com','Approved');
/*!40000 ALTER TABLE `approvalStatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking` (
  `bookingID` int NOT NULL AUTO_INCREMENT,
  `customerID` varchar(200) DEFAULT NULL,
  `vehicleID` int DEFAULT NULL,
  `startDate` datetime DEFAULT NULL,
  `numberOfDays` int DEFAULT NULL,
  `numberOfHours` int DEFAULT NULL,
  `cost` double DEFAULT NULL,
  `bookingStatus` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`bookingID`),
  KEY `customerID` (`customerID`),
  KEY `vehicleID` (`vehicleID`),
  CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`vehicleID`) REFERENCES `vehicles` (`vehicleID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES (2,'rk@gmail.com',6,'2023-04-17 00:00:00',1,2,180,'Returned');
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `update_availability` AFTER INSERT ON `booking` FOR EACH ROW BEGIN
    UPDATE vehicles
    SET availability = 0
    WHERE vehicleID = NEW.vehicleID;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobileNumber` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `streetName` varchar(100) NOT NULL,
  `apartmentNo` varchar(50) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `drivingLicenseNumber` varchar(20) NOT NULL,
  `damageProtection` varchar(100) DEFAULT NULL,
  `drivingCredits` int DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES ('Bob','Johnson','bjohnson@example.com','555-9876','mypassword3','789 Maple Ln','Apt 2C','Somewhere','TX','54321','DL11122233',NULL,5),('Bob','Johnson','bkjllohnson@example.com','555-9876','mypassword3','789 Maple Ln','Apt 2C','Somewhere','TX','54321','DL11122233',NULL,5),('Bob','Johnson','bkjohnson@example.com','555-9876','mypassword3','789 Maple Ln','Apt 2C','Somewhere','TX','54321','DL11122233',NULL,5),('David','Kim','davidkim@example.com','555-2222','mypassword5','222 Pine Ave','Apt 3D','Anytown','CA','12345','DL77788899','Premium',20),('Jane','Smith','janesmith@example.com','555-5678','mypassword2','456 Oak Ave',NULL,'Anycity','NY','67890','DL87654321','Premium',25),('John','Doe','johndoe@example.com','555-1234','mypassword','123 Main St','Apt 4B','Anytown','CA','12345','DL12345678','Basic',10),('Rohith','Chandra ','kandambeth.r@northeastern.edu','123456789','test','Street','apt','Boston','Massachusetts','2116','23432432','yes',1),('Rohith','Chandra ','rk@gmail.com','3243242','test','6 Cd st','213','Boston','Massachusetts','10071','12344444','yes',2),('Rohith','Chandra ','rohitck2013@gmail.com','23423432','','Street','apt','Boston','Massachusetts','234324','23432432','yes',2),('Sarah','Lee','sarahlee@example.com','555-1111','mypassword4','111 Cherry St',NULL,'Someville','MA','01234','DL44455566','Basic',15);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `customer_insert` AFTER INSERT ON `customer` FOR EACH ROW BEGIN
  INSERT INTO `loginInformation` (`id`, `password`, `userType`)
  VALUES (NEW.email, NEW.password, 'customer');
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `license_approval` AFTER INSERT ON `customer` FOR EACH ROW BEGIN
  INSERT INTO `approvalStatus` (`id`, `status`)
  VALUES (NEW.email,'Not Approved');
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `location` (
  `locationID` int NOT NULL AUTO_INCREMENT,
  `locationName` varchar(100) DEFAULT NULL,
  `streetName` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  PRIMARY KEY (`locationID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (1,'Northeastern University','Gainsborough Street','Boston','Massachusetts','2115'),(2,'Prudential Center','100 Belvidere St','Boston','Massachusetts','2119'),(3,'Dartmouth St Garage','126 Dartmouth St','Boston','Massachusetts','02116'),(4,'Washington St - Parking 1','1320 Washington St','Boston','Massachusetts','02081'),(5,'MFA','25 Museum Rd','Boston','Massachusetts','02115'),(6,'Near Madison Park','30 Ruggles St','Boston','Massachusetts','02120'),(7,'Tremont St - Parking 1','1430 Tremont St','Boston','Massachusetts','02120'),(8,'SMFA Building (university)','160 Saint Aplohonsus Street','Boston','Massachusetts','02120'),(9,'Lot 30','353 Dudley St','Boston','Massachusetts','02119'),(10,'The Smith','660 Harrison Ave','Boston','Massachusetts','02118'),(11,'Rear Alley','146 W Concord St','Boston','Massachusetts','02118'),(12,'Washington St - Parking 2','1901 Washington St','Boston','Massachusetts','02466'),(13,'Testing','testing','test','Testing','1234');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loginInformation`
--

DROP TABLE IF EXISTS `loginInformation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loginInformation` (
  `id` varchar(300) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `userType` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loginInformation`
--

LOCK TABLES `loginInformation` WRITE;
/*!40000 ALTER TABLE `loginInformation` DISABLE KEYS */;
INSERT INTO `loginInformation` VALUES ('admin','admin123','admin'),('johndoe@example.com','mypassword','user'),('bkjohnson@example.com','mypassword3','customer'),('bkjllohnson@example.com','mypassword3','customer'),('rohitck2013@gmail.com','','customer'),('rohitck2013@gmail.com','','customer'),('kandambeth.r@northeastern.edu','test','customer'),('rk@gmail.com','test','customer');
/*!40000 ALTER TABLE `loginInformation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maintenance`
--

DROP TABLE IF EXISTS `maintenance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `maintenance` (
  `maintenanceID` int NOT NULL AUTO_INCREMENT,
  `maintenanceProvider` varchar(200) NOT NULL,
  `maintenanceDate` datetime DEFAULT NULL,
  `vehicleID` int DEFAULT NULL,
  PRIMARY KEY (`maintenanceID`),
  KEY `vehicleID` (`vehicleID`),
  CONSTRAINT `maintenance_ibfk_1` FOREIGN KEY (`vehicleID`) REFERENCES `vehicles` (`vehicleID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maintenance`
--

LOCK TABLES `maintenance` WRITE;
/*!40000 ALTER TABLE `maintenance` DISABLE KEYS */;
/*!40000 ALTER TABLE `maintenance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membershipPackage`
--

DROP TABLE IF EXISTS `membershipPackage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `membershipPackage` (
  `membershipID` int NOT NULL AUTO_INCREMENT,
  `packageName` varchar(200) DEFAULT NULL,
  `packageDescription` varchar(500) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `duration` int DEFAULT NULL,
  PRIMARY KEY (`membershipID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membershipPackage`
--

LOCK TABLES `membershipPackage` WRITE;
/*!40000 ALTER TABLE `membershipPackage` DISABLE KEYS */;
INSERT INTO `membershipPackage` VALUES (1,'Bronze','$5 off on all rides',5,3),(2,'Silver','$12 off on all rides',12,4),(3,'Gold','$20 off on all rides',20,4);
/*!40000 ALTER TABLE `membershipPackage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `memberships`
--

DROP TABLE IF EXISTS `memberships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `memberships` (
  `membershipID` int NOT NULL,
  `customerID` varchar(300) NOT NULL,
  PRIMARY KEY (`membershipID`,`customerID`),
  KEY `membershipID` (`membershipID`),
  KEY `customerID` (`customerID`),
  CONSTRAINT `memberships_ibfk_1` FOREIGN KEY (`membershipID`) REFERENCES `membershipPackage` (`membershipID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `memberships_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `memberships`
--

LOCK TABLES `memberships` WRITE;
/*!40000 ALTER TABLE `memberships` DISABLE KEYS */;
INSERT INTO `memberships` VALUES (1,'rk@gmail.com');
/*!40000 ALTER TABLE `memberships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supervisor`
--

DROP TABLE IF EXISTS `supervisor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supervisor` (
  `supervisorID` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `assignedLocationID` int DEFAULT NULL,
  PRIMARY KEY (`supervisorID`),
  KEY `assignedLocationID` (`assignedLocationID`),
  CONSTRAINT `supervisor_ibfk_1` FOREIGN KEY (`assignedLocationID`) REFERENCES `location` (`locationID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supervisor`
--

LOCK TABLES `supervisor` WRITE;
/*!40000 ALTER TABLE `supervisor` DISABLE KEYS */;
INSERT INTO `supervisor` VALUES (1,'David','Smith','ddsmith@hotmail.com',1),(2,'Carlos','Ben','carbee129@gmail.com',2),(3,'Robert','James','jj9090@gmail.com',13),(4,'Howard','Stark','kingFam@gmail.com',4),(5,'Tony','Clark','ironheart3000@gmail.com',5),(6,'Ben','Haagen','bennyboy12@gmail.com',NULL),(7,'Jerry','Daas','iscream43@gmail.com',6),(8,'Shaily','Sheraton','sheshaw09@gmail.com',NULL),(9,'Harper','Lee','iauthor333@gmail.com',7),(10,'Sherly','Jones','dijhon98@gmail.com',8),(11,'Carter','Brown','ckkbrown8900@gmail.com',9),(12,'James','Garcia','jackJill899@gmail.com',10),(13,'Walter','Beck','becklee012@gmail.com',11),(14,'Dev','Singh','ddsinghh@gmail.com',12);
/*!40000 ALTER TABLE `supervisor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicles` (
  `vehicleID` int NOT NULL AUTO_INCREMENT,
  `numberPlate` varchar(50) DEFAULT NULL,
  `hourlyRate` double DEFAULT NULL,
  `perDayRate` double DEFAULT NULL,
  `lateChareges` double DEFAULT NULL,
  `availability` int DEFAULT NULL,
  `typeID` int DEFAULT NULL,
  `locationID` int DEFAULT NULL,
  PRIMARY KEY (`vehicleID`),
  KEY `typeID` (`typeID`),
  KEY `locationID` (`locationID`),
  CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`typeID`) REFERENCES `vehicleType` (`typeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `vehicles_ibfk_2` FOREIGN KEY (`locationID`) REFERENCES `location` (`locationID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicles`
--

LOCK TABLES `vehicles` WRITE;
/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */;
INSERT INTO `vehicles` VALUES (1,'ABC123',20,100,10,1,1,1),(2,'DEF456',25,120,15,1,2,2),(3,'GHI789',20,100,10,1,3,1),(4,'JKL012',25,120,15,0,4,2),(5,'MNO345',30,150,20,1,5,3),(6,'PQR678',25,120,15,1,6,2),(7,'STU901',30,150,20,1,7,3),(8,'VWX234',25,120,15,0,8,2),(9,'ABC123',20,100,10,1,1,1),(10,'DEF456',25,120,15,1,2,2),(11,'GHI789',20,100,10,1,3,1),(12,'JKL012',25,120,15,0,4,2),(13,'MNO345',30,150,20,1,5,3),(14,'PQR678',25,120,15,1,6,2),(15,'STU901',30,150,20,1,7,3),(16,'VWX234',25,120,15,0,8,2),(17,'ABC123',20,100,10,1,1,1),(18,'DEF456',25,120,15,1,2,2),(19,'GHI789',20,100,10,1,3,1),(20,'JKL012',25,120,15,0,4,2),(21,'MNO345',30,150,20,1,5,3),(22,'PQR678',25,120,15,1,6,2),(23,'STU901',30,150,20,1,7,3),(24,'VWX234',25,120,15,0,8,2),(25,'ABC123',20,100,10,1,1,1),(26,'DEF456',25,120,15,1,2,2),(27,'GHI789',20,100,10,1,3,1),(28,'JKL012',25,120,15,0,4,2),(29,'MNO345',30,150,20,1,5,3),(30,'PQR678',25,120,15,1,6,2),(31,'STU901',30,150,20,1,7,3),(32,'VWX234',25,120,15,0,8,2),(33,'ABC123',20,100,10,1,1,1),(34,'DEF456',25,120,15,1,2,2),(35,'GHI789',20,100,10,1,3,1),(36,'JKL012',25,120,15,0,4,2),(37,'MNO345',30,150,20,1,5,3),(38,'PQR678',25,120,15,1,6,2),(39,'STU901',30,150,20,1,7,3),(40,'VWX234',25,120,15,0,8,2),(41,'ABC123',20,100,10,1,1,1),(42,'DEF456',25,120,15,1,2,2),(43,'GHI789',20,100,10,1,3,1),(44,'JKL012',25,120,15,0,4,2),(45,'MNO345',30,150,20,1,5,3),(46,'PQR678',25,120,15,1,6,2),(47,'STU901',30,150,20,1,7,3),(48,'VWX234',25,120,15,0,8,2),(49,'ABC123',20,100,10,1,1,1),(50,'DEF456',25,120,15,1,2,2),(51,'GHI789',20,100,10,1,3,1),(52,'JKL012',25,120,15,0,4,2),(53,'MNO345',30,150,20,1,5,3),(54,'PQR678',25,120,15,1,6,2),(55,'STU901',30,150,20,1,7,3),(56,'VWX234',25,120,15,0,8,2),(57,'EXAM-2020',10,20,30,1,1,5),(58,'FR10',1000,5000,2000,1,35,10);
/*!40000 ALTER TABLE `vehicles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicleType`
--

DROP TABLE IF EXISTS `vehicleType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vehicleType` (
  `typeID` int NOT NULL AUTO_INCREMENT,
  `model` varchar(100) NOT NULL,
  `make` varchar(100) NOT NULL,
  `year` year NOT NULL,
  `mileage` varchar(100) DEFAULT NULL,
  `seats` int NOT NULL,
  PRIMARY KEY (`typeID`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicleType`
--

LOCK TABLES `vehicleType` WRITE;
/*!40000 ALTER TABLE `vehicleType` DISABLE KEYS */;
INSERT INTO `vehicleType` VALUES (1,'Toyota','Camry',2019,'21 City 41 Highway (mpg)',5),(2,'Toyota','Corolla',2021,'31 City 40 Highway (mpg)',5),(3,'Toyota','RAV4',2018,'23 City 30 Highway (mpg)',5),(4,'Honda','Odyssey',2021,'19 City 28 Highway (mpg)',7),(5,'Honda','Civic',2022,'32 City 41 Highway (mpg)',5),(6,'Honda','CRV',2023,'28 City 24 Highway (mpg)',5),(7,'Nissan','Altima',2020,'28 City 31 Highway (mpg)',5),(8,'Kia','Soul',2022,'29 City 35 Highway (mpg)',5),(9,'Honda','HR-V',2021,'28 City 31 Highway (mpg)',5),(10,'Toyota','Sienna',2019,'19 City 27 Highway (mpg)',7),(11,'Toyota','Prius',2017,'58 City 53 Highway (mpg)',5),(12,'Volkswagen','Jetta',2020,'30 City 40 Highway (mpg)',5),(13,'Hyundai','Tucson',2019,'23 City 30 Highway (mpg)',5),(14,'Jeep','Compass',2022,'22 City 31 Highway (mpg)',5),(15,'Ford','Focus',2018,'30 City 40 Highway (mpg)',5),(16,'Chevrolet','Spark',2017,'20 City 38 Highway (mpg)',4),(17,'Chevrolet','Cruze',2020,'28 City 38 Highway (mpg)',5),(18,'Hyundai','Sonata',2021,'28 City 38 Highway (mpg)',5),(19,'Hyundai','Elantra',2022,'33 City 43 Highway (mpg)',5),(20,'Nissan','Rogue',2019,'26 City 33 Highway (mpg)',5),(21,'Fiat','500',2020,'22 City 30 Highway (mpg)',4),(22,'Ford','Fiesta',2019,'27 City 37 Highway (mpg)',5),(23,'Chrysler','200',2017,'23 City 36 Highway (mpg)',5),(24,'Toyota','Corolla',2019,'30 City 40 Highway (mpg)',5),(25,'Honda','CRV',2020,'28 City 34 Highway (mpg)',5),(26,'Toyota','Sienna',2017,'19 City 27 Highway (mpg)',7),(27,'Kia','Soul',2020,'29 City 35 Highway (mpg)',5),(28,'Kia','Forte',2019,'31 City 41 Highway (mpg)',5),(29,'Chevrolet','Malibu',2018,'27 City 36 Highway (mpg)',5),(30,'Nissan','Versa',2021,'32 City 40 Highway (mpg)',5),(31,'Camry','Toyota',2010,'21 City 41 Highway (mpg)',5),(32,'Camry','Toyota',2019,'21 City 41 Highway (mpg)',5),(33,'Ca','To',2000,'21 City 41 Highway (mpg)',4),(35,'LaFerrari','Ferrari',2019,'21 City 41 Highway (mpg)',5);
/*!40000 ALTER TABLE `vehicleType` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'carrentalsystem1'
--

--
-- Dumping routines for database 'carrentalsystem1'
--
/*!50003 DROP PROCEDURE IF EXISTS `insert_booking` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_booking`(
  IN customer_id VARCHAR(200),
  IN vehicle_id INT,
  IN start_date DATETIME,
  IN num_days INT,
  IN num_hours INT,
  IN booking_status VARCHAR(200)
)
BEGIN
  INSERT INTO booking (customerID, vehicleID, startDate, numberOfDays, numberOfHours, bookingStatus)
  VALUES (customer_id, vehicle_id, start_date, num_days, num_hours, booking_status);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `update_booking_cost` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_booking_cost`(IN booking_id INT, IN new_cost DOUBLE)
BEGIN
    UPDATE booking SET cost = new_cost WHERE bookingID = booking_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-21 17:56:36
