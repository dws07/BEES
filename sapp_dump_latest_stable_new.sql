-- MySQL dump 10.13  Distrib 5.7.43, for osx10.18 (x86_64)
--
-- Host: localhost    Database: sapp
-- ------------------------------------------------------
-- Server version	5.7.43

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
-- Table structure for table `audit_log`
--

DROP TABLE IF EXISTS `audit_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audit_log` (
  `audit_id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) NOT NULL,
  `id_no` int(11) NOT NULL,
  `operation` varchar(50) NOT NULL,
  `field_name` text NOT NULL,
  `old_value` text NOT NULL,
  `new_value` text,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`audit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_log`
--

LOCK TABLES `audit_log` WRITE;
/*!40000 ALTER TABLE `audit_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `audit_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `children_information`
--

DROP TABLE IF EXISTS `children_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `children_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `travel_id` int(11) NOT NULL,
  `children_name` varchar(100) DEFAULT NULL,
  `children_dob` varchar(100) DEFAULT NULL,
  `children_age` varchar(100) DEFAULT NULL,
  `children_gender` varchar(100) DEFAULT NULL,
  `children_address` varchar(100) DEFAULT NULL,
  `children_identicard_number` varchar(100) DEFAULT NULL,
  `children_parent_name` varchar(100) DEFAULT NULL,
  `children_relations` varchar(100) DEFAULT NULL,
  `remarks` text,
  `nepali_dob_children` varchar(100) DEFAULT NULL,
  `is_returned` varchar(10) DEFAULT '0',
  `created` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `children_information`
--

LOCK TABLES `children_information` WRITE;
/*!40000 ALTER TABLE `children_information` DISABLE KEYS */;
INSERT INTO `children_information` VALUES (3,1,'sita',NULL,'3','महिला','Aut vel duis ea atqu','972','Reed Olson','Optio sint cillum ',NULL,'2076-03-07','1',NULL,NULL,'2024-07-15',6),(4,1,'hari',NULL,'1','पुरुष','Esse autem dicta vol','299','Rigel Mcfadden','Necessitatibus fugia',NULL,'2080-03-01','1',NULL,NULL,'2024-07-15',6),(5,2,'sita',NULL,'4','महिला','Esse autem dicta vol','299','Rigel Mcfadden','Necessitatibus fugia',NULL,'2081-03-04','0','2024-07-15',6,NULL,NULL),(6,2,'ffg',NULL,'4','महिला','Alias dolorum illo r','406','Rigel Mcfadden','Necessitatibus fugia',NULL,'2081-03-06','0','2024-07-15',6,NULL,NULL);
/*!40000 ALTER TABLE `children_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department_para`
--

DROP TABLE IF EXISTS `department_para`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department_para` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(100) NOT NULL,
  `department_code` varchar(25) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department_para`
--

LOCK TABLES `department_para` WRITE;
/*!40000 ALTER TABLE `department_para` DISABLE KEYS */;
INSERT INTO `department_para` VALUES (1,'आन्तरिक मामिला तथा कानुन मन्त्रालय','आन्तरिक मामिला तथा कानुन ','आन्तरिक मामिला तथा कानुन मन्त्रालय',3,'2023-01-31',0,'2024-06-13','1'),(2,'Credit Administration & Recovery Department','CrdAdmn','',3,'2023-01-31',0,'0000-00-00','2'),(3,'Administration Department','AdmnHmn','',3,'2023-01-31',0,'2023-06-07','2'),(4,'Compliance Department','CompDep','',3,'2023-01-31',0,'0000-00-00','2'),(5,'Branch Risk Assets & Control','BrnRsk','',3,'2023-01-31',0,'2023-08-18','2'),(6,'Account & Finance Deparment','AccFin','',3,'2023-01-31',0,'0000-00-00','2'),(7,'Information Technology','InfTech','',3,'2023-01-31',0,'0000-00-00','2'),(8,'Compliance Department','ComDep','',3,'2023-01-31',0,'0000-00-00','2'),(9,'Corporate Credit Department','CrdRsk','',3,'2023-01-31',0,'2023-06-29','2'),(10,'Credit Operation Department','CrdOprn','',3,'2023-01-31',0,'0000-00-00','2'),(11,'Regional Manager (Bhairahawa Region)','RegMngrBhai','',3,'2023-01-31',0,'2023-01-31','2'),(12,'Regional Manager (Pokhara Region)','RegMngrPok','',3,'2023-01-31',0,'2023-01-31','2'),(13,'Regional Manager (Narayangarh Region)','RegMngrNar','',3,'2023-01-31',0,'0000-00-00','2'),(14,'Human Resources Department','hr','',1,'2023-06-07',0,'0000-00-00','2'),(15,'Credit Risk Department','CrdRisk','',1,'2023-07-05',0,'0000-00-00','2'),(16,'Central Operation Department','COD','',1,'2023-08-23',0,'0000-00-00','2'),(17,'General Service Department','GSD','',2,'2024-03-28',0,'0000-00-00','2'),(18,'NPA/NBA','NPA/NBA','',2,'2024-04-16',0,'0000-00-00','2'),(19,'APF','APF','APF',8,'2024-06-16',0,'0000-00-00','1');
/*!40000 ALTER TABLE `department_para` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `designation_para`
--

DROP TABLE IF EXISTS `designation_para`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `designation_para` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation_code` varchar(25) NOT NULL,
  `designation_name` varchar(255) NOT NULL,
  `designation_name_nepali` varchar(255) DEFAULT NULL,
  `position` varchar(25) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `designation_para`
--

LOCK TABLES `designation_para` WRITE;
/*!40000 ALTER TABLE `designation_para` DISABLE KEYS */;
INSERT INTO `designation_para` VALUES (7,'DGM','Deputy General Manager','उपमहाप्रबन्धक','1','',1,'2022-03-03',0,'2024-02-23','2'),(8,'DCEO','Deputy Chief Executive Officer','उपप्रमुख कार्यकारी अधिकृत','2','',3,'2022-03-28',0,'2024-02-23','2'),(9,'CHR','Chairman','अध्यक्ष','2','',3,'2022-04-14',3,'2024-02-23','2'),(10,'DIR','Director',' निर्देशक','3','',1,'2022-09-02',0,'2024-02-23','2'),(12,'DIR-IND','Director (Independent)','निर्देशक( स्वतन्त्र )','4','',1,'2022-09-02',0,'2024-02-23','2'),(16,'SM','Senior Manager','वरिष्ठ प्रबन्धक','5','',1,'2022-09-02',0,'2024-02-23','2'),(19,'CEO','Chief Executive Officer','प्रमुख कार्यकारी अधिकृत','7','',1,'2022-09-02',0,'2024-02-23','2'),(20,'IC','Independent Chairman',NULL,'8','',1,'2023-12-20',0,'0000-00-00','2'),(21,'PD','Promoter Director',' प्रमोटर निर्देशक','9','',1,'2023-12-20',0,'2024-02-23','2'),(22,'PUD','Public Director','सार्वजनिक निर्देशक','10','',1,'2023-12-20',0,'2024-02-23','2'),(23,'PROD','Promoter Director','प्रमोटर निर्देशक','11','',1,'2023-12-20',0,'2024-02-23','2'),(24,'COMSE','Company Secretary','कम्पनी सचिव','12','',1,'2023-12-20',0,'2024-02-23','2'),(25,'HC','Head-Credit','हेड-क्रेडिट','12','',1,'2023-12-20',0,'2024-02-23','2'),(26,'HF','Head-Finance','हेड-फाइनान्स','13','',1,'2023-12-20',0,'2024-02-23','2'),(27,'प्रमुख-आईटी विभाग','प्रमुख-आईटी विभाग',' प्रमुख-आईटी विभाग','1',' प्रमुख-आईटी विभाग',1,'2023-12-20',0,'2024-06-13','1'),(28,'HINA','Head-Internal Audit','आन्तरिक लेखापरीक्षण प्रमुख','15','',1,'2023-12-20',0,'2024-02-23','2'),(29,'HEHRE','Head-Human Resource','प्रमुख-मानव संसाधन','16','',1,'2023-12-20',0,'2024-02-23','2'),(30,'CBO','Chief Business Officer',' प्रमुख व्यापार अधिकारी','17','',2,'2024-03-17',0,'0000-00-00','2'),(31,'OI','Operation Incharge',' अपरेशन इन्चार्ज','18','',2,'2024-03-17',0,'0000-00-00','2'),(32,'GSD','Head-General Service','प्रमुख-जनरल सेवा','19','',2,'2024-03-28',0,'2024-03-28','2'),(33,'NPA/NBA','Head-NPA/NBA','प्रमुख-NPA/NBA','20','',2,'2024-04-16',0,'0000-00-00','2'),(34,'SP','SP','SP','1','only for sp',8,'2024-06-16',0,'0000-00-00','1');
/*!40000 ALTER TABLE `designation_para` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `districts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province_id` int(11) NOT NULL,
  `title` varchar(155) NOT NULL,
  `title_nepali` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated` date NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `districts`
--

LOCK TABLES `districts` WRITE;
/*!40000 ALTER TABLE `districts` DISABLE KEYS */;
INSERT INTO `districts` VALUES (1,1,'Bhojpur','㼿','2022-07-06',1,'2022-10-11',1,'1'),(2,1,'Dhankuta','','2022-07-06',1,'2022-07-06',NULL,'1'),(3,1,'Ilam','','2022-07-06',1,'2022-07-06',NULL,'1'),(4,1,'Jhapa','','2022-07-06',1,'2022-07-06',NULL,'1'),(5,1,'Khotang','','2022-07-06',1,'2022-07-06',NULL,'1'),(6,1,'Morang','','2022-07-06',1,'2022-07-06',NULL,'1'),(7,1,'Okhaldhunga','','2022-07-06',1,'2022-07-06',NULL,'1'),(8,1,'Panchthar','पाँचथर','2022-07-06',1,'2024-01-13',2,'1'),(9,1,'Sankhuwasabha','','2022-07-06',1,'2022-07-06',NULL,'1'),(10,1,'Solukhumbu','','2022-07-06',1,'2022-07-06',NULL,'1'),(11,1,'Sunsari','','2022-07-06',1,'2022-07-06',NULL,'1'),(12,1,'Taplejung','','2022-07-06',1,'2022-07-06',NULL,'1'),(13,1,'Terhathum','','2022-07-06',1,'2022-07-06',NULL,'1'),(14,1,'Udayapur','','2022-07-06',1,'2022-07-06',NULL,'1'),(15,2,'Parsa','','2022-07-06',1,'2022-07-06',1,'1'),(16,2,'Bara','','2022-07-06',1,'2022-07-06',NULL,'1'),(17,2,'Rautahat','','2022-07-06',1,'2022-07-06',NULL,'1'),(18,2,'Sarlahi','','2022-07-06',1,'2022-07-06',NULL,'1'),(19,2,'Dhanusha','','2022-07-06',1,'2022-07-06',NULL,'1'),(20,2,'Siraha','','2022-07-06',1,'2022-07-06',NULL,'1'),(21,2,'Mahottari','','2022-07-06',1,'2022-07-06',NULL,'1'),(22,2,'Saptari','','2022-07-06',1,'2022-07-06',NULL,'1'),(23,3,'Sindhuli','','2022-07-06',1,'2022-07-06',NULL,'1'),(24,3,'Ramechhap','','2022-07-06',1,'2022-07-06',NULL,'1'),(25,3,'Dolakha','','2022-07-06',1,'2022-07-06',NULL,'1'),(26,3,'Bhaktapur','','2022-07-06',1,'2022-07-06',NULL,'1'),(27,3,'Dhading','','2022-07-06',1,'2022-07-06',NULL,'1'),(28,3,'Kathmandu','','2022-07-06',1,'2022-07-06',NULL,'1'),(29,3,'Kavrepalanchok','','2022-07-06',1,'2022-07-06',NULL,'1'),(30,3,'Lalitpur','','2022-07-06',1,'2022-07-06',NULL,'1'),(31,3,'Nuwakot','','2022-07-06',1,'2022-07-06',NULL,'1'),(32,3,'Rasuwa','','2022-07-06',1,'2022-07-06',NULL,'1'),(33,3,'Sindhupalchok','','2022-07-06',1,'2022-07-06',NULL,'1'),(34,3,'Chitwan','','2022-07-06',1,'2022-07-06',NULL,'1'),(35,3,'Makwanpur','','2022-07-06',1,'2022-07-06',NULL,'1'),(36,4,'Baglung','','2022-07-06',1,'2022-07-06',NULL,'1'),(37,4,'Gorkha','','2022-07-06',1,'2022-07-06',NULL,'1'),(38,4,'Kaski','','2022-07-06',1,'2022-07-06',NULL,'1'),(39,4,'Lamjung','','2022-07-06',1,'2022-07-06',NULL,'1'),(40,4,'Manang','','2022-07-06',1,'2022-07-06',NULL,'1'),(41,4,'Mustang','','2022-07-06',1,'2022-07-06',NULL,'1'),(42,4,'Myagdi','','2022-07-06',1,'2022-07-06',NULL,'1'),(43,4,'Nawalpur','','2022-07-06',1,'2022-07-06',NULL,'1'),(44,4,'Parbat','','2022-07-06',1,'2022-07-06',NULL,'1'),(45,4,'Syangja','','2022-07-06',1,'2022-07-06',NULL,'1'),(46,4,'Tanahun','','2022-07-06',1,'2022-07-06',NULL,'1'),(47,5,'Kapilvastu','','2022-07-06',1,'2022-07-06',NULL,'1'),(48,5,'Parasi','','2022-07-06',1,'2022-07-06',NULL,'1'),(49,5,'Rupandehi','','2022-07-06',1,'2022-07-06',NULL,'1'),(50,5,'Arghakhanchi','','2022-07-06',1,'2022-07-06',NULL,'1'),(51,5,'Gulmi','','2022-07-06',1,'2022-07-06',NULL,'1'),(52,5,'Palpa','','2022-07-06',1,'2022-07-06',NULL,'1'),(53,5,'Dang','','2022-07-06',1,'2022-07-06',NULL,'1'),(54,5,'Pyuthan','','2022-07-06',1,'2022-07-06',NULL,'1'),(55,5,'Rolpa','','2022-07-06',1,'2022-07-06',NULL,'1'),(56,5,'Eastern Rukum','','2022-07-06',1,'2022-07-08',1,'1'),(57,5,'Banke','','2022-07-06',1,'2022-07-06',NULL,'1'),(58,5,'Bardiya','','2022-07-06',1,'2022-07-06',NULL,'1'),(59,6,'Western Rukum','','2022-07-06',1,'2022-07-06',NULL,'1'),(60,6,'Salyan','','2022-07-06',1,'2022-07-06',NULL,'1'),(61,6,'Dolpa','','2022-07-06',1,'2022-07-06',NULL,'1'),(62,6,'Humla','','2022-07-06',1,'2022-07-06',NULL,'1'),(63,6,'Jumla','','2022-07-06',1,'2022-07-06',NULL,'1'),(64,6,'Kalikot','','2022-07-06',1,'2022-07-06',NULL,'1'),(65,6,'Mugu','','2022-07-06',1,'2022-07-06',NULL,'1'),(66,6,'Surkhet','','2022-07-06',1,'2022-07-06',NULL,'1'),(67,6,'Dailekh','','2022-07-06',1,'2022-07-06',NULL,'1'),(68,6,'Jajarkot','','2022-07-06',1,'2022-07-06',NULL,'1'),(69,7,'Kailali','','2022-07-06',1,'2022-07-06',NULL,'1'),(70,7,'Achham','','2022-07-06',1,'2022-07-06',NULL,'1'),(71,7,'Doti','','2022-07-06',1,'2022-07-06',NULL,'1'),(72,7,'Bajhang','','2022-07-06',1,'2022-07-06',NULL,'1'),(73,7,'Bajura','','2022-07-06',1,'2022-07-06',NULL,'1'),(74,7,'Kanchanpur','','2022-07-06',1,'2022-07-06',NULL,'1'),(75,7,'Dadeldhura','','2022-07-06',1,'2022-07-06',NULL,'1'),(76,7,'Baitadi','','2022-07-06',1,'2022-07-06',NULL,'1'),(77,7,'Darchula','दार्चुला','2022-07-06',1,'2022-10-11',1,'1');
/*!40000 ALTER TABLE `districts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document`
--

DROP TABLE IF EXISTS `document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `docpath` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document`
--

LOCK TABLES `document` WRITE;
/*!40000 ALTER TABLE `document` DISABLE KEYS */;
/*!40000 ALTER TABLE `document` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gone_direction_information`
--

DROP TABLE IF EXISTS `gone_direction_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gone_direction_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `travel_id` int(11) NOT NULL,
  `direction` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gone_direction_information`
--

LOCK TABLES `gone_direction_information` WRITE;
/*!40000 ALTER TABLE `gone_direction_information` DISABLE KEYS */;
/*!40000 ALTER TABLE `gone_direction_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `health_information`
--

DROP TABLE IF EXISTS `health_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `health_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `travel_id` int(11) NOT NULL,
  `health_status` varchar(100) DEFAULT NULL,
  `health_result` varchar(100) DEFAULT NULL,
  `remarks` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `health_information`
--

LOCK TABLES `health_information` WRITE;
/*!40000 ALTER TABLE `health_information` DISABLE KEYS */;
INSERT INTO `health_information` VALUES (1,1,'fff','fff',NULL),(2,2,'fff','Dolores excepturi ve',NULL);
/*!40000 ALTER TABLE `health_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `masterdatatable`
--

DROP TABLE IF EXISTS `masterdatatable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `masterdatatable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated` date NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `masterdatatable`
--

LOCK TABLES `masterdatatable` WRITE;
/*!40000 ALTER TABLE `masterdatatable` DISABLE KEYS */;
INSERT INTO `masterdatatable` VALUES (1,'Super Admin','1',1,'2022-01-27',1,'2022-01-27','Only For Developer'),(2,'Admin','1',1,'2022-01-27',1,'2022-01-27','For Admins Only'),(3,'HRD Admin','1',1,'2022-01-28',1,'2022-10-13','<p>HRD Department</p>\r\n'),(4,'Finance Admin','1',1,'2022-01-28',1,'2022-10-13','<p>Finance Department</p>\r\n'),(5,'Grievance Admin','1',1,'2022-10-13',1,'2022-10-13','<p>Grievance Officer</p>\r\n'),(6,'Business Admin','1',1,'2022-10-13',0,'0000-00-00','<p>Business Development</p>\r\n'),(7,'Treasury Admin','1',1,'2022-10-13',0,'0000-00-00','<p>Treasury</p>\r\n'),(8,'Card Admin','1',1,'2022-10-13',0,'0000-00-00','<p>Digital</p>\r\n'),(9,'Operation Admin','1',1,'2022-10-13',0,'0000-00-00','<p>Operation</p>\r\n'),(10,'Trade Amin','1',1,'2022-10-13',0,'0000-00-00','<p>Trade</p>\r\n'),(11,'AML/CFT','1',1,'2022-10-13',0,'0000-00-00','<p>Compliance</p>\r\n'),(12,'text','1',1,'2024-06-06',1,'2024-06-06','<p>tttsssssssssss</p>\r\n');
/*!40000 ALTER TABLE `masterdatatable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module`
--

LOCK TABLES `module` WRITE;
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
INSERT INTO `module` VALUES (3,'content','Content','2'),(13,'designation','पद','1'),(14,'department','विभाग','1'),(29,'site_settings','Site Settings','1'),(30,'staff','कर्मचारीहरु','1'),(31,'user','प्रयोगकर्ताहरु','1'),(32,'user_role','प्रयोगकर्ता भूमिका','1'),(33,'module','प्रयोगकर्ता अनुमति','1'),(34,'staff_dep_deg','पद','1'),(44,'banner','Banner','2'),(48,'branch','Branch','2'),(49,'atm_locations','Atm Locations','2'),(50,'blog','Blog','2'),(51,'blog_category','Blog Category','2'),(52,'calendar','Calendar','2'),(55,'faq','FAQ','2'),(66,'video','Video','2'),(67,'province','प्रदेश','1'),(68,'district','जिल्ला','1'),(70,'banking_hour','Banking Hour','2'),(71,'online_account','Online Account Opening','2'),(72,'dataentryform','यात्री फारम','1'),(73,'परिचय पत्र नम्बर','परिचय पत्र नम्बर ','2');
/*!40000 ALTER TABLE `module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `module_function`
--

DROP TABLE IF EXISTS `module_function`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `module_function` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `function_name` varchar(255) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=672 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module_function`
--

LOCK TABLES `module_function` WRITE;
/*!40000 ALTER TABLE `module_function` DISABLE KEYS */;
INSERT INTO `module_function` VALUES (258,37,'view','View'),(259,37,'generate_year_end','Generate'),(260,37,'all','Year End List'),(261,36,'cancel_row','Cancel'),(262,36,'change_status','Approve'),(263,36,'location_transfer_post','Post'),(264,36,'soft_delete','Delete'),(265,36,'view','View'),(266,36,'form','Form'),(267,36,'all','List'),(268,35,'cancel_row','Cancell'),(269,35,'change_status','Approve'),(270,35,'scrap_post','Post'),(271,35,'soft_delete','Delete'),(272,35,'view','View'),(273,35,'form','Form'),(274,35,'all','List'),(278,33,'role_function','Role Function'),(279,33,'soft_delete','Delete'),(280,33,'form','Form'),(281,33,'all','List'),(291,29,'index','Site Settings'),(292,28,'change_status','Approve'),(293,28,'cancel_row','Cancell'),(294,28,'all','List'),(295,28,'form','Form'),(296,28,'view','View'),(297,27,'change_status','Approve'),(298,27,'cancel_row','Cancell'),(299,27,'sales_return_post','Post'),(300,27,'soft_delete','Delete'),(301,27,'view','View'),(302,27,'edit','Edit'),(303,27,'add','Add'),(304,27,'form','Form'),(305,27,'all','List'),(306,26,'change_status','Approve'),(307,26,'cancel_row','Cancell'),(308,26,'sales_post','Post'),(309,26,'soft_delete','Delete'),(310,26,'view','View'),(311,26,'edit','Edit'),(312,26,'add','Add'),(313,26,'all','List'),(314,25,'grn_return_post','Post'),(315,25,'all','List'),(316,25,'form','Form'),(317,25,'add','Add'),(318,25,'edit','Edit'),(319,25,'view','View'),(320,25,'soft_delete','Delete'),(321,25,'cancel_row','Cancell'),(322,25,'change_status','Approve'),(323,24,'change_status','Approve'),(324,24,'cancel_row','Cancell'),(325,24,'grn_post','Post'),(326,24,'soft_delete','Delete'),(327,24,'view','View'),(328,24,'edit','Edit'),(329,24,'add','Add'),(330,24,'direct_add','Direct Add'),(331,24,'all','List'),(332,23,'soft_delete','Delete'),(333,23,'form','Form'),(334,23,'all','List'),(335,22,'change_status','Approve'),(336,22,'cancel_row','Cancell'),(337,22,'soft_delete','Delete'),(338,22,'view','View'),(339,22,'edit','Edit'),(340,22,'direct_add','Direct Add'),(341,22,'add','Add'),(342,22,'form','Form'),(343,22,'all','List'),(344,21,'change_status','Approve'),(345,21,'cancel_row','Cancell'),(346,21,'soft_delete','Delete'),(347,21,'view','View'),(348,21,'edit','Edit'),(349,21,'add','Add'),(350,21,'direct_add','Direct Add'),(351,21,'form','Form'),(352,21,'all','List'),(353,20,'change_status','Approve'),(354,20,'cancel_row','Cancell'),(355,20,'soft_delete','Delete'),(356,20,'view','View'),(357,20,'edit','Edit'),(358,20,'direct_add','Direct Add'),(359,20,'add','Add'),(360,20,'form','Form'),(361,20,'all','List'),(362,19,'change_status','Approve'),(363,19,'cancel_row','Cancell'),(364,19,'soft_delete','Delete'),(365,19,'view','View'),(366,19,'form','Form'),(367,19,'all','List'),(368,18,'change_status','Approve'),(369,18,'cancel_row','Cancell'),(370,18,'issue_return_post','Post'),(371,18,'soft_delete','Delete'),(372,18,'edit','Edit'),(373,18,'view','View'),(374,18,'add','Add'),(375,18,'form','Form'),(376,18,'all','List'),(377,17,'view','View'),(378,17,'direct_view','Direct View'),(379,17,'change_status','Approve'),(380,17,'cancel_row','Cancell'),(381,17,'issue_post','Post'),(382,17,'soft_delete','Delete'),(383,17,'edit','Edit'),(384,17,'form','Form'),(385,17,'add','Add'),(386,17,'direct_add','Direct Add'),(387,17,'all','List'),(388,16,'change_status','Approve'),(389,16,'cancel_row','Cancell'),(390,16,'soft_delete','Delete'),(391,16,'view','View'),(392,16,'form','Form'),(393,16,'all','List'),(394,15,'view','View'),(395,15,'opening_post','Post'),(396,15,'change_status','Approve'),(397,15,'soft_delete','Delete'),(398,15,'form','Form'),(399,15,'all','List'),(400,15,'cancel_row','Cancell'),(407,12,'soft_delete','Delete'),(408,12,'form','form'),(409,12,'all','List'),(410,11,'soft_delete','Delete'),(411,11,'form','Form'),(412,11,'all','List'),(413,10,'soft_delete','Delete'),(414,10,'form','Form'),(415,10,'all','List'),(416,9,'soft_delete','Delete'),(417,9,'form','Form'),(418,9,'all','List'),(419,8,'soft_delete','Delete'),(420,8,'form','Form'),(421,8,'all','List'),(422,7,'soft_delete','Delete'),(423,7,'form','Form'),(424,7,'all','List'),(425,6,'soft_delete','Delete'),(426,6,'form','Form'),(427,6,'all','List'),(428,5,'soft_delete','Delete'),(429,5,'form','Form'),(430,5,'all','List'),(431,4,'soft_delete','Delete'),(432,4,'form','Form'),(433,4,'all','List'),(438,2,'soft_delete','Delete'),(439,2,'form','Form'),(440,2,'all','List'),(441,1,'soft_delete','Delete'),(442,1,'form','Form'),(443,1,'all','List'),(456,3,'menu','Menu'),(457,3,'soft_delete','Delete'),(458,3,'add','Add'),(459,3,'all','List'),(460,3,'edit','Edit'),(516,44,'all','List'),(517,44,'form','Add/Edit'),(518,44,'soft_delete','Delete'),(531,48,'soft_delete','Delete'),(532,48,'form','Add/Edit'),(533,48,'all','List'),(534,49,'all','List'),(535,49,'form','Add/Edit'),(536,49,'soft_delete','Delete'),(537,50,'all','List'),(538,50,'form','Add/Edit'),(539,50,'soft_delete','Delete'),(543,52,'all','List'),(544,52,'form','Add/Edit'),(545,52,'soft_delete','Delete'),(555,55,'soft_delete','Delete'),(556,55,'all','List'),(557,55,'form','Add/Edit'),(592,66,'all','List'),(593,66,'form','Add/Edit'),(594,66,'soft_delete','Delete'),(595,51,'soft_delete','Delete'),(596,51,'form','Add/Edit'),(597,51,'all','List'),(618,70,'all','List'),(619,70,'form','Add/Edit'),(620,70,'soft_delete','Delete'),(621,71,'all','all'),(631,72,'soft_delete','Delete'),(632,72,'form','Add/Edit'),(633,72,'all','View'),(634,68,'soft_delete','Delete'),(635,68,'form','Add/Edit'),(636,68,'all','view'),(637,67,'soft_delete','Delete'),(638,67,'form','Add/Edit'),(639,67,'all','View'),(647,32,'all','List'),(648,32,'form','Form'),(649,32,'soft_delete','Delete'),(650,31,'all','List'),(651,31,'form','Form'),(652,31,'soft_delete','Delete'),(653,31,'changepassword','Password Change'),(654,30,'all','List'),(655,30,'form','Form'),(656,30,'soft_delete','Delete'),(657,14,'all','List'),(658,14,'form','Form'),(659,14,'soft_delete','Delete'),(666,13,'all','List'),(667,13,'form','Form'),(668,13,'soft_delete','Delete'),(669,34,'soft_delete','Delete'),(670,34,'form','Form'),(671,34,'all','List');
/*!40000 ALTER TABLE `module_function` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `module_function_role`
--

DROP TABLE IF EXISTS `module_function_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `module_function_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_function_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18736 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module_function_role`
--

LOCK TABLES `module_function_role` WRITE;
/*!40000 ALTER TABLE `module_function_role` DISABLE KEYS */;
INSERT INTO `module_function_role` VALUES (11471,509,7),(11472,508,7),(11473,507,7),(11474,506,7),(11475,505,7),(11476,504,7),(11477,503,7),(11478,588,8),(11479,587,8),(11480,586,8),(11481,536,8),(11482,535,8),(11483,534,8),(11484,502,9),(11485,501,9),(11486,500,9),(11487,502,10),(11488,501,10),(11489,500,10),(11490,502,11),(11491,501,11),(11492,500,11),(12143,615,6),(12144,614,6),(12145,613,6),(12146,612,6),(12147,611,6),(13296,620,3),(13297,619,3),(13298,618,3),(13299,533,3),(13300,532,3),(13301,531,3),(18620,630,13),(18621,629,13),(18622,628,13),(18623,605,13),(18624,604,13),(18625,602,13),(18626,276,13),(18627,280,13),(18628,283,13),(18629,289,13),(18630,402,13),(18631,405,13),(18656,633,2),(18657,632,2),(18658,631,2),(18659,281,2),(18660,280,2),(18661,279,2),(18662,278,2),(18663,649,2),(18664,648,2),(18665,647,2),(18666,653,2),(18667,652,2),(18668,651,2),(18669,650,2),(18670,656,2),(18671,655,2),(18672,654,2),(18673,291,2),(18674,659,2),(18675,658,2),(18676,657,2),(18677,668,2),(18678,667,2),(18679,666,2),(18683,633,4),(18684,632,4),(18709,633,1),(18710,632,1),(18711,631,1),(18712,636,1),(18713,635,1),(18714,634,1),(18715,281,1),(18716,280,1),(18717,279,1),(18718,278,1),(18719,649,1),(18720,648,1),(18721,647,1),(18722,653,1),(18723,652,1),(18724,651,1),(18725,650,1),(18726,656,1),(18727,655,1),(18728,654,1),(18729,291,1),(18730,659,1),(18731,658,1),(18732,657,1),(18733,668,1),(18734,667,1),(18735,666,1);
/*!40000 ALTER TABLE `module_function_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `officers`
--

DROP TABLE IF EXISTS `officers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `officers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `name_nepali` varchar(200) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `featured_image` varchar(255) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `created` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `officers`
--

LOCK TABLES `officers` WRITE;
/*!40000 ALTER TABLE `officers` DISABLE KEYS */;
INSERT INTO `officers` VALUES (1,'Mr. Kumar Khadka','कुमार खड्का','kumar.khadka@skdbl.com.np','mr-kumar-khadka1713503922','https://admin.skdbl.com.np/uploads/responsive_filemanager/NEW%20DCEO.png','+977-9802717224','+977-21-518135 Ext:129','Information','2023-04-05',1,'2024-04-19',2,'1'),(2,'Mr. Kumar Khadka',' कुमार खड्का','grievance@skdbl.com.np','mr-kumar-khadka','https://admin.skdbl.com.np/uploads/responsive_filemanager/NEW%20DCEO.png','+977-9802717224','+977-21-518135 Ext:129','Grievance','2023-04-06',1,'2024-04-19',2,'1'),(3,'Mr. Bidur Pokhrel',' बिदुर पोखरेल','bidur.pokhrel@skdbl.com.np','mr-bidur-pokhrel','https://admin.skdbl.com.np/uploads/responsive_filemanager/hr11.jpg','+977-9802752482','+977-21-518135 Ext:131','Compliance','2023-04-06',1,'2024-01-13',2,'1');
/*!40000 ALTER TABLE `officers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_information`
--

DROP TABLE IF EXISTS `personal_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(100) DEFAULT NULL,
  `age` varchar(100) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `marital_status` varchar(100) DEFAULT NULL,
  `marital_status_remarks` varchar(255) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `identicard_type` varchar(100) DEFAULT NULL,
  `identicard_number` varchar(100) DEFAULT NULL,
  `travel_start_country` varchar(100) DEFAULT NULL,
  `entry_adress` varchar(100) DEFAULT NULL,
  `entry_time` varchar(100) DEFAULT NULL,
  `exit_time` varchar(100) DEFAULT NULL,
  `entry_address2` varchar(100) DEFAULT NULL,
  `travel_destination` varchar(100) DEFAULT NULL,
  `travel_deuration` varchar(100) DEFAULT NULL,
  `travel_porpose` varchar(100) DEFAULT NULL,
  `traveler_proporty` varchar(100) DEFAULT NULL,
  `travel_type` varchar(100) DEFAULT NULL,
  `children_name` varchar(100) DEFAULT NULL,
  `children_dob` varchar(100) DEFAULT NULL,
  `children_age` varchar(100) DEFAULT NULL,
  `children_gender` varchar(100) DEFAULT NULL,
  `children_address` varchar(100) DEFAULT NULL,
  `children_identicard_number` varchar(100) DEFAULT NULL,
  `children_parent_name` varchar(100) DEFAULT NULL,
  `children_relations` varchar(100) DEFAULT NULL,
  `health_status` varchar(100) DEFAULT NULL,
  `health_result` varchar(100) DEFAULT NULL,
  `vehicle_information` varchar(100) DEFAULT NULL,
  `gone_dirction` varchar(100) DEFAULT NULL,
  `types_of_vehicle` varchar(100) DEFAULT NULL,
  `vehicle_number` varchar(100) DEFAULT NULL,
  `drivers_name` varchar(100) DEFAULT NULL,
  `driving_licence` varchar(100) DEFAULT NULL,
  `drivers_number` varchar(100) DEFAULT NULL,
  `use_of_vehicle` varchar(100) DEFAULT NULL,
  `heavy_vehicle_type` varchar(100) DEFAULT NULL,
  `property_information` varchar(100) DEFAULT NULL,
  `pasengers` varchar(100) DEFAULT NULL,
  `remarks` text,
  `others_information` text,
  `profile_image` varchar(100) DEFAULT NULL,
  `other_document` varchar(100) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `nepali_date_of_birth` varchar(100) DEFAULT NULL,
  `country_code` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_information`
--

LOCK TABLES `personal_information` WRITE;
/*!40000 ALTER TABLE `personal_information` DISABLE KEYS */;
INSERT INTO `personal_information` VALUES (1,'Rajesh Gurung','1993-02-10','31','nepali','Sint laborum accusam','पुरुष','9811956191','अविवाहित','','Dolorem natus qui ut','नागरिता','332',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'fasf',NULL,'uploads/Screenshot_2024-07-02_at_10_27_111.png',NULL,'1',6,'2024-07-15',6,'2024-07-15','2072-03-01','+977'),(2,'sita','2015-06-16','9','Corporis id et non p','Sint laborum accusam','महिला','9811956192','अन्य','ffffff','Dolorem natus qui ut','सवारी चालक पत्र','460',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ddd',NULL,'uploads/Screenshot_2024-07-03_at_08_38_12.png',NULL,'1',6,'2024-07-15',NULL,NULL,'2072-03-01','+91');
/*!40000 ALTER TABLE `personal_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile_picture`
--

DROP TABLE IF EXISTS `profile_picture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile_picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `image_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_picture`
--

LOCK TABLES `profile_picture` WRITE;
/*!40000 ALTER TABLE `profile_picture` DISABLE KEYS */;
/*!40000 ALTER TABLE `profile_picture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provinces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(155) NOT NULL,
  `title_nepali` varchar(255) NOT NULL,
  `p_no` int(2) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` date NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated` date NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provinces`
--

LOCK TABLES `provinces` WRITE;
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
INSERT INTO `provinces` VALUES (1,'Province No. 1','प्रदेश नं. १',1,1,'2022-07-04',1,'2022-10-11','1'),(2,'Madhesh','मधेश',2,1,'2022-07-04',1,'2022-10-11','1'),(3,'Bagmati','बागमती',3,1,'2022-07-04',1,'2022-10-12','1'),(4,'Gandaki','गण्डकी',4,1,'2022-07-06',1,'2022-10-11','1'),(5,'Lumbini','लुम्बिनी',5,1,'2022-07-06',1,'2022-10-11','1'),(6,'Karnali','कर्णाली',6,1,'2022-07-06',1,'2022-10-11','1'),(7,'Sudurpashchim','सुदूरपश्चिम',7,1,'2022-07-06',1,'2022-10-11','1');
/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(100) NOT NULL,
  `short_name` varchar(50) DEFAULT NULL,
  `site_slogan` varchar(150) NOT NULL,
  `web_url` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `mobile` varchar(150) NOT NULL,
  `telephone` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `updated_on` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_settings`
--

LOCK TABLES `site_settings` WRITE;
/*!40000 ALTER TABLE `site_settings` DISABLE KEYS */;
INSERT INTO `site_settings` VALUES (1,'आन्तरिक मामिला तथा कानुन मन्त्रालय ','आन्तरिक मामिला तथा कानुन मन्त्रालय ','आन्तरिक मामिला तथा कानुन मन्त्रालय ','http://moial.sudurpashchim.gov.np/','सुदूरपश्चिम प्रदेश सरकार  ',' ९८४८६३४६५१','  ०९१-५२१२२७','moiaffairsandlaw7@gmail.com','nepal-government4.png','2024-06-07',1,'1');
/*!40000 ALTER TABLE `site_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_desig_depart`
--

DROP TABLE IF EXISTS `staff_desig_depart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_desig_depart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `designation_code` varchar(25) NOT NULL,
  `department_code` varchar(25) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_desig_depart`
--

LOCK TABLES `staff_desig_depart` WRITE;
/*!40000 ALTER TABLE `staff_desig_depart` DISABLE KEYS */;
INSERT INTO `staff_desig_depart` VALUES (4,3,0,'CO-ORD','Dev','2022-09-28','0000-00-00',1,'2022-09-28 00:00:00',8,'2024-06-13 00:00:00','2'),(5,4,0,'SM','InfTech','2023-04-02','0000-00-00',1,'2023-05-14 00:00:00',8,'2024-06-13 00:00:00','2'),(7,6,0,'HITD','MrkDep','2024-06-13','0000-00-00',1,'2024-06-13 00:00:00',8,'2024-06-13 00:00:00','2'),(8,7,0,'प्रमुख-आईटी विभाग','आन्तरिक मामिला तथा कानुन ','2024-06-13','0000-00-00',1,'2024-06-13 00:00:00',0,'0000-00-00 00:00:00','1'),(9,8,0,'प्रमुख-आईटी विभाग','आन्तरिक मामिला तथा कानुन ','2024-06-13','0000-00-00',1,'2024-06-13 00:00:00',0,'0000-00-00 00:00:00','1'),(10,9,0,'प्रमुख-आईटी विभाग','आन्तरिक मामिला तथा कानुन ','2024-06-13','0000-00-00',1,'2024-06-13 00:00:00',0,'0000-00-00 00:00:00','1'),(11,10,0,'SP','APF','2024-06-17','0000-00-00',8,'2024-06-16 00:00:00',0,'0000-00-00 00:00:00','1'),(12,11,0,'SP','APF','2024-06-16','0000-00-00',8,'2024-06-16 00:00:00',0,'0000-00-00 00:00:00','1'),(13,12,0,'SP','APF','2024-06-16','0000-00-00',8,'2024-06-16 00:00:00',0,'0000-00-00 00:00:00','1'),(14,13,0,'प्रमुख-आईटी विभाग','APF','1989-11-15','0000-00-00',8,'2024-06-19 00:00:00',0,'0000-00-00 00:00:00','1'),(15,14,0,'प्रमुख-आईटी विभाग','आन्तरिक मामिला तथा कानुन ','2024-07-02','0000-00-00',8,'2024-06-22 00:00:00',0,'0000-00-00 00:00:00','1');
/*!40000 ALTER TABLE `staff_desig_depart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_infos`
--

DROP TABLE IF EXISTS `staff_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_infos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) DEFAULT NULL,
  `full_name` varchar(155) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text,
  `featured_image` varchar(255) DEFAULT NULL,
  `appointed_date` date DEFAULT NULL,
  `temp_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `contact` varchar(155) DEFAULT NULL,
  `email` varchar(155) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_on` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_infos`
--

LOCK TABLES `staff_infos` WRITE;
/*!40000 ALTER TABLE `staff_infos` DISABLE KEYS */;
INSERT INTO `staff_infos` VALUES (3,0,'Super Admin','1664365571','','https://admin.icfcbank.com/uploads/responsive_filemanager/download.png','2022-09-28','Prasuti Marga -509, Kathmandu, Nepal','Prasuti Marga -509, Kathmandu, Nepal','+977-1-4102299, 4102213 ,4102239','info@nyatapol.com','2022-09-28',1,'2024-06-13',8,'2'),(4,0,'Entry user','1684062636','<p><strong>Saptakoshi Development Bank Limited</strong></p>\r\n','https://admin.icfcbank.com/uploads/responsive_filemanager/icon.png','2023-04-02','Kathmandu','Kathmandu','01-4525292','info@skdbl.com.np','2023-05-14',1,'2024-06-13',8,'2'),(7,NULL,'दिवश अधिकारी','',NULL,'240613014100__nepal-government.png','2024-06-13','काठमाडौँ','काठमाडौँ','९८६५९५६०६१','dilc1425@gmail.com','2024-06-13',1,'2024-06-13',1,'1'),(8,NULL,'दिल चौधरी','1718221917',NULL,'240613014052__nepal-government.png','2024-06-13','काठमाडौँ','कैलाली','९८६५९५६०६१','dilc1425@gmail.com','2024-06-13',1,'2024-06-13',1,'1'),(9,NULL,'कपिल क्षेत्री','1718221972',NULL,'240613014035__nepal-government.png','2024-06-13','काठमाडौँ','कैलाली','९८६५९५६०६१','dilc1425@gmail.com','2024-06-13',1,'2024-06-13',1,'1'),(10,NULL,'ram yadav','1718542179',NULL,'240616074957__nepal-government.png','2024-06-17','kathamndu','Kailali','9865956061','test@gmail.com','2024-06-16',8,'2024-06-16',8,'1'),(11,NULL,'DIl chaudhary','1718546389',NULL,'240616074946__nepal-government.png','2024-06-16','Dhangadhi kailali','Kathmandu, Nepal','9865956061','dilc1425@gmail.com','2024-06-16',8,'2024-06-16',8,'1'),(12,NULL,'दिल चौधरी','1718546749',NULL,'240616075049__nepal-government.png','2024-06-16','काठमाडौँ','Kathmandu, Nepal','9865956061','dilc1425@gmail.com','2024-06-16',8,NULL,NULL,'1'),(13,NULL,'Hamish Cleveland','1718752682',NULL,NULL,'1989-11-15','Perspiciatis molest','Hic dolor nisi saepe','Dolore laudantium e','vava@mailinator.com','2024-06-19',8,NULL,NULL,'1'),(14,NULL,'Phillip Gould','1719068358',NULL,'240622084418__viber_image_2024-06-09_21-16-02-461.jpg','2024-07-02','Cumque eiusmod est ','Et rem itaque veniam','Quis in eum sunt ea ','sucyte@mailinator.com','2024-06-22',8,NULL,NULL,'1');
/*!40000 ALTER TABLE `staff_infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_images`
--

DROP TABLE IF EXISTS `tbl_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `RecordNo` int(11) NOT NULL,
  `DocPath` mediumtext NOT NULL,
  `Caption` mediumtext,
  `Type` char(2) NOT NULL,
  `page` mediumtext,
  `SubmitDt` date NOT NULL,
  `doc_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_images`
--

LOCK TABLES `tbl_images` WRITE;
/*!40000 ALTER TABLE `tbl_images` DISABLE KEYS */;
INSERT INTO `tbl_images` VALUES (1,2,'BFIN__1541144199-Training-brochure--Corporate-Secreterial.pdf','Training brochure- Corporate Secreterial.pdf','2','publication','2018-11-02',NULL,1,'2019-03-01 11:26:07'),(2,3,'BFIN__1541144852-individual-form.pdf','individual-form.pdf','g','publication','2018-11-02',NULL,1,'2019-03-01 11:26:07'),(3,3,'BFIN__1541144852-Training-brochure--Corporate-Secreterial.pdf','Training brochure- Corporate Secreterial.pdf','g','publication','2018-11-02',NULL,1,'2019-03-01 11:26:07'),(4,2,'1549001818IMG_20180527_100034.jpg',NULL,'2','csr','2019-02-01',NULL,1,'2019-03-01 11:26:07'),(5,2,'1549001818IMG_20180527_104018.jpg',NULL,'2','csr','2019-02-01',NULL,1,'2019-03-01 11:26:07'),(6,2,'1549001818IMG_20180527_151830.jpg',NULL,'2','csr','2019-02-01',NULL,1,'2019-03-01 11:26:07'),(7,2,'1549178116bg.jpg',NULL,'2','csr','2019-02-03',NULL,2,'2019-03-01 11:26:07'),(8,2,'154917838415450418582debit_card_form1.pdf',NULL,'2','csr','2019-02-03',NULL,2,'2019-03-01 11:26:07'),(9,2,'154917840315450418582debit_card_form1.pdf',NULL,'2','csr','2019-02-03',NULL,2,'2019-03-01 11:26:07'),(10,2,'154918618615450418582debit_card_form1.pdf',NULL,'2','csr','2019-02-03',NULL,2,'2019-03-01 11:26:07'),(11,2,'15494316051545041296Application_for_term-fixed_deposit.pdf',NULL,'2','csr','2019-02-06',NULL,2,'2019-03-01 11:26:07'),(12,2,'15494318471545041296Application_for_term-fixed_deposit.pdf',NULL,'2','csr','2019-02-06',NULL,2,'2019-03-01 11:26:07'),(13,2,'15494325551545041296Application_for_term-fixed_deposit.pdf',NULL,'2','csr','2019-02-06',NULL,2,'2019-03-01 11:26:07'),(14,4,'1549955915bou.jpg',NULL,'4','csr','2019-02-12',NULL,2,'2019-03-01 11:26:07'),(15,4,'1549966619bou.jpg',NULL,'4','csr','2019-02-12',NULL,1,'2019-03-01 11:26:07'),(16,4,'1549967347bou1.jpg',NULL,'4','csr','2019-02-12',NULL,1,'2019-03-01 11:26:07'),(17,5,'1551423164IMG20181222170558~2_copy.jpg',NULL,'5','csr','2019-03-01',NULL,2,'2019-03-01 11:26:07'),(18,5,'1551423164IMG20181222104137_copy.jpg',NULL,'5','csr','2019-03-01',NULL,1,'2019-03-01 11:26:07'),(19,5,'1551423164IMG20181222095322_copy.jpg',NULL,'5','csr','2019-03-01',NULL,1,'2019-03-01 11:26:07'),(32,9,'1551594800menu1.png',NULL,'g','csr','2019-03-03',NULL,1,'2019-03-03 06:33:20'),(33,9,'1551594800menu2.png',NULL,'g','csr','2019-03-03',NULL,1,'2019-03-03 06:33:20'),(34,9,'1551594800menu3.png',NULL,'g','csr','2019-03-03',NULL,1,'2019-03-03 06:33:20'),(35,10,'20180915_081824~2_copy.jpg',NULL,'g','csr','2019-03-05',NULL,1,'2019-03-05 10:13:08'),(36,10,'20180915_084225~2_copy.jpg',NULL,'g','csr','2019-03-05',NULL,1,'2019-03-05 10:13:08'),(37,10,'IMG-e8f651dd1fa6241aacdb5c0cb6becbec-V_copy.jpg',NULL,'g','csr','2019-03-05',NULL,1,'2019-03-05 10:13:08'),(38,12,'Prospectus Debenture 2083 Final for printing.pdf',NULL,'g','news','2020-02-16',NULL,1,'2020-02-16 05:11:11'),(39,5,'FISCAL YEAR 206-70 UNCOLLECTED DIVIDEND LIST.pdf',NULL,'5','news','2020-03-01',NULL,2,'2020-03-01 12:53:53'),(40,22,'10 years inactive accounts(as on 15th July 2020) (1).pdf',NULL,'g','news','2020-09-03',NULL,1,'2020-09-03 04:15:20'),(41,12,'1670215693cancer.jpg',NULL,'g','csr','2022-12-04',NULL,2,'2022-12-05 04:48:13'),(42,12,'1670216075cancer.jpg',NULL,'12','csr','2022-12-04',NULL,1,'2022-12-05 04:54:35'),(43,15,'1670218663download.jpg',NULL,'g','csr','2022-12-05',NULL,1,'2022-12-05 05:37:43'),(44,16,'1670218767download.jpg',NULL,'g','csr','2022-12-05',NULL,1,'2022-12-05 05:39:27'),(45,18,'1670219155download.jpg',NULL,'g','csr','2022-12-05',NULL,1,'2022-12-05 05:45:55'),(46,11,'16702195521667542431Sponsored_to_Pren_Bahadur_shahi.jpg',NULL,'11','csr','2022-12-05',NULL,1,'2022-12-05 05:52:32');
/*!40000 ALTER TABLE `tbl_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_networks`
--

DROP TABLE IF EXISTS `tbl_networks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_networks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` mediumtext,
  `title` varchar(255) DEFAULT NULL,
  `Location` mediumtext,
  `Address` mediumtext,
  `Map` mediumtext,
  `description` longtext NOT NULL,
  `description_nepali` mediumtext NOT NULL,
  `Page` varchar(25) DEFAULT NULL,
  `Type` char(5) NOT NULL DEFAULT 'g',
  `MetaKeyword` mediumtext,
  `MetaDescription` mediumtext,
  `Serial` int(11) NOT NULL DEFAULT '0',
  `featured_image` mediumtext,
  `DocPath` mediumtext,
  `Disabled` int(11) DEFAULT '0',
  `created` datetime NOT NULL,
  `lastmodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `title_nepali` mediumtext NOT NULL,
  `categoryNepali` mediumtext NOT NULL,
  `category` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  `updated` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_networks`
--

LOCK TABLES `tbl_networks` WRITE;
/*!40000 ALTER TABLE `tbl_networks` DISABLE KEYS */;
INSERT INTO `tbl_networks` VALUES (1,'gaurishankar-development-bank-ltd','GAURISHANKAR DEVELOPMENT BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,2,'2018-12-17 08:34:49','2023-01-30 10:50:02',18,'गौरीशंकर विकास बैंक लि।','','Development Banks',2,NULL,NULL,'2'),(2,'triveni-bikash-bank-ltd','TRIVENI BIKASH BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,1,'2018-12-17 08:34:58','2023-07-05 07:57:22',18,'ट्रिवेनी बिकाश बैंक लिमिटेड।','','Development Banks',2,'2023-07-05',1,'2'),(3,'shangrila-development-bank-ltd','SHANGRILA DEVELOPMENT BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,1,'2018-12-17 08:35:05','2023-01-30 10:49:06',18,'शंग्रिला विकास बैंक लिमिटेड।','','Development Banks',2,NULL,NULL,'1'),(4,'kamana-bikash-bank-ltd','KAMANA BIKASH BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,1,'2018-12-17 08:35:21','2023-01-30 10:49:06',18,'KAMANA BKKAS BANK LTD।','','Development Banks',2,NULL,NULL,'1'),(5,'bishwa-bikash-bank-ltd','BISHWA BIKASH BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,1,'2018-12-17 08:35:28','2023-07-05 07:57:08',18,'BISHWA BIKASH बैंक लिमिटेड।','','Development Banks',2,'2023-07-05',1,'2'),(6,'city-development-bank','CITY DEVELOPMENT BANK',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,1,'2018-12-17 08:35:36','2023-07-05 07:56:57',18,'शहर विकास बैंक','','Development Banks',2,'2023-07-05',1,'2'),(7,'pashupati-development-bank','PASHUPATI DEVELOPMENT BANK',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,1,'2018-12-17 08:35:43','2023-07-05 07:55:50',18,'PASHUPATI विकास बैंक','','Development Banks',2,'2023-07-05',1,'2'),(8,'malika-vikas-bank','MALIKA VIKAS BANK',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,1,'2018-12-17 08:35:52','2023-07-05 07:55:10',18,'MALIKA VIKAS बैंक','','Development Banks',2,'2023-07-05',1,'2'),(9,'paschimanchal-development-bank-ltd','PASCHIMANCHAL DEVELOPMENT BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,1,'2018-12-17 08:35:59','2023-07-05 07:55:39',18,'पाश्चिमांचल विकास बैंक ','','Development Banks',2,'2023-07-05',1,'2'),(10,'janata-bank-ltd','JANATA BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,1,'2018-12-17 08:36:06','2023-07-05 07:54:34',18,'जनता बैंक लिमिटेड।','','Development Banks',2,'2023-07-05',1,'2'),(11,'union-finance-ltd','UNION FINANCE LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,1,'2018-12-17 08:36:13','2023-07-05 07:54:45',18,'यूनियन फाइनान्स लिमिटेड।','','Financial Institutions',3,'2023-07-05',1,'2'),(12,'reliance-finance-ltd','RELIANCE FINANCE LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,0,'2018-12-17 08:36:20','2023-01-30 10:51:34',2,'सम्बन्ध फाइनान्स लिमिटेड','','Financial Institutions',3,NULL,NULL,'1'),(13,'manjushree-financial-institution-ltd','MANJUSHREE FINANCIAL INSTITUTION LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,0,'2018-12-17 08:36:27','2023-01-30 10:51:34',2,'मञ्जुश्रे वित्तीय संस्था लि।','','Financial Institutions',3,NULL,NULL,'1'),(14,'kailash-bikash-bank','KAILASH BIKASH BANK',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,1,'2018-12-17 08:36:34','2023-07-05 07:54:22',18,'कैलाश बिकाश बैंक','','Development Banks',2,'2023-07-05',1,'2'),(15,'international-development-bank-ltd','INTERNATIONAL DEVELOPMENT BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,1,'2018-12-17 08:36:40','2023-07-05 07:54:08',18,'अन्तर्राष्ट्रिय विकास बैंक लिमिटेड।','','Development Banks',2,'2023-07-05',1,'2'),(16,'gurkha-development-bank-ltd','GURKHA DEVELOPMENT BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,1,'2018-12-17 08:36:49','2023-07-05 07:53:57',18,'गुरखा विकास बैंक लि','','Development Banks',2,'2023-07-05',1,'2'),(17,'kasthamandap-development-bank-ltd','KASTHAMANDAP DEVELOPMENT BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,1,'2018-12-17 08:36:56','2023-07-05 07:53:47',18,'KASHMANDAP विकास बैंक लिमिटेड।','','Development Banks',2,'2023-07-05',1,'2'),(18,'sunrise-bank-ltd','SUNRISE BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,1,'2018-12-17 09:57:59','2023-01-30 10:52:49',18,'सनरी बैंक लिमिटेड।','','Commercial Banks',1,NULL,NULL,'1'),(19,'sagarmatha-merchant-banking-finance-ltd','SAGARMATHA MERCHANT BANKING & FINANCE LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,1,'2018-12-17 09:58:08','2023-07-05 07:53:15',18,'सागरमाथा व्यापारी बैंक र वित्त लिमिटेड','','Financial Institutions',3,'2023-07-05',1,'2'),(20,'jyoti-bikash-bank-ltd','JYOTI BIKASH BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,1,'2018-12-17 09:58:15','2023-01-30 10:49:06',1,'ज्योति बिकश बैंक लिमिटेड','विकास बैंकहरू','Development Banks',2,NULL,NULL,'1'),(21,'sanima-bank-ltd','SANIMA BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,2,'2018-12-17 09:58:24','2023-01-30 10:52:49',2,'सानिमा बैंक लिमिटेड','','Commercial Banks',1,NULL,NULL,'2'),(22,'nepal-bank-ltd','NEPAL BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,1,'2018-12-17 09:58:33','2023-01-30 10:52:49',18,'नेपाल बैंक लिमिटेड।','','Commercial Banks',1,NULL,NULL,'1'),(23,'bank-of-asia-nepal-ltd','BANK OF ASIA NEPAL LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,2,'2018-12-17 09:58:40','2023-01-30 10:52:49',2,'एशिया नेपालको बैंक।','','Commercial Banks',1,NULL,NULL,'2'),(24,'nmb-bank-ltd','NMB BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,0,'2018-12-17 09:58:47','2023-01-30 10:52:49',2,'NMB बैंक लिमिटेड','','Commercial Banks',1,NULL,NULL,'1'),(25,'ndep-bank-ltd','NDEP BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,2,'2018-12-17 09:59:21','2023-01-30 10:50:02',2,'एनडीईपी बैंक लिमिटेड','','',0,NULL,NULL,'2'),(26,'prabhu-finance-company-ltd','PRABHU FINANCE COMPANY LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,1,'2018-12-17 09:59:29','2023-07-05 07:56:31',18,'प्रभू फाइनान्स कम्पनी लिमिटेड','','Development Banks',2,'2023-07-05',1,'2'),(27,'vibor-bikas-bank-ltd','VIBOR BIKAS BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,2,'2018-12-17 09:59:36','2023-01-30 10:50:02',18,'VIBOR BIKAS बैंक लिमिटेड','','Development Banks',2,NULL,NULL,'2'),(28,'grand-bank-ltd','GRAND BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,2,'2018-12-17 09:59:42','2023-01-30 10:50:02',2,'ग्रान्ड बैंक लिमिटेड।','','Development Banks',2,NULL,NULL,'2'),(29,'prime-commercial-bank-ltd','PRIME COMMERCIAL BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,2,'2018-12-17 09:59:53','2023-01-30 10:52:49',2,'प्राथमिक वाणिज्य बैंक लिमिटेड','','Commercial Banks',1,NULL,NULL,'2'),(30,'clean-energy-development-bank-ltd','CLEAN ENERGY DEVELOPMENT BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,2,'2018-12-17 10:00:03','2023-01-30 10:50:02',2,'स्वच्छ ऊर्जा विकास बैंक लिमिटेड','','Development Banks',2,NULL,NULL,'2'),(31,'kist-bank-ltd','KIST BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,2,'2018-12-17 10:00:09','2023-01-30 10:50:02',2,'किस्ट बैंक लिमिटेड','','',0,NULL,NULL,'2'),(32,'siddharth-development-bank-ltd','SIDDHARTH DEVELOPMENT BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,2,'2018-12-17 10:00:17','2023-01-30 10:50:02',18,'सिद्धार्थ विकास बैंक लि','','Development Banks',2,NULL,NULL,'2'),(33,'siddharth-bank-ltd','SIDDHARTH BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,1,'2018-12-17 10:00:25','2023-01-30 10:52:49',18,'सिद्धार्थ बैंक लिमिटेड','','Commercial Banks',1,NULL,NULL,'1'),(34,'citizens-bank-international','CITIZENS BANK INTERNATIONAL',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,2,'2018-12-17 10:00:32','2023-01-30 10:52:49',2,'सिटीजन बैंक अन्तर्राष्ट्रिय','','Commercial Banks',1,NULL,NULL,'2'),(35,'global-ime-bank-ltd','GLOBAL IME BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,0,'2018-12-17 10:00:38','2023-01-30 10:52:49',2,'ग्लोबल आईएम बैंक लिमिटेड','','Commercial Banks',1,NULL,NULL,'1'),(36,'agriculture-development-bank','AGRICULTURE DEVELOPMENT BANK',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,0,'2018-12-17 10:00:44','2023-01-30 10:52:49',18,'कृषि विकास बैंक','','Commercial Banks',1,NULL,NULL,'1'),(37,'nabil-bank-ltd','NABIL BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,0,'2018-12-17 10:00:50','2023-01-30 10:52:49',2,'नाबिल बैंक लिमिटेड','','Commercial Banks',1,NULL,NULL,'1'),(38,'lumbini-bank-ltd-durbar-marg','LUMBINI BANK LTD. DURBAR MARG',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,2,'2018-12-17 10:00:57','2023-01-30 10:50:02',18,'लुम्बिनी बैंक लिमिटेड','','Development Banks',2,NULL,NULL,'2'),(39,'machhapuchchhre-bank-ltd','MACHHAPUCHCHHRE BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,1,'2018-12-17 10:01:06','2023-01-30 10:52:49',18,'MACHHAPUCHCHHRE बैंक लिमिटेड','','Commercial Banks',1,NULL,NULL,'1'),(40,'nic-bank-ltd','NIC BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,1,'2018-12-17 10:01:14','2023-01-30 10:52:49',1,'एनआईसी बैंक लिमिटेड','','Commercial Banks',1,NULL,NULL,'1'),(41,'ncc-bank-ltd','NCC BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,2,'2018-12-17 10:01:19','2023-01-30 10:52:49',2,'NCC बैंक लिमिटेड','','Commercial Banks',1,NULL,NULL,'2'),(42,'laxmi-bank-ltd','LAXMI BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,0,'2018-12-17 10:01:25','2023-01-30 10:52:49',1,'LAXMI बैंक लिमिटेड','वाणिज्य बैंकहरू','Commercial Banks',1,NULL,NULL,'1'),(43,'everest-bank-ltd','EVEREST BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,0,'2018-12-17 10:01:34','2023-01-30 10:52:49',2,'सदाबहार बैंक लि','','Commercial Banks',1,NULL,NULL,'1'),(44,'bank-of-kathmandu','BANK OF KATHMANDU',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,2,'2018-12-17 10:01:41','2023-01-30 10:52:49',2,'BANK OF KATHMANDU','','Commercial Banks',1,NULL,NULL,'2'),(45,'himalayan-bank-ltd','HIMALAYAN BANK LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,0,'2018-12-17 10:01:46','2023-01-30 10:52:49',2,'हिमालयन बैंक लिमिटेड','','Commercial Banks',1,NULL,NULL,'1'),(46,'civil-bank-limited','CIVIL BANK LIMITED',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,0,'2019-09-16 16:39:18','2023-07-05 07:52:52',18,'नागरिक बैंक सीमित','','Commercial Banks',1,'2023-07-05',1,'2'),(47,'mega-bank-limited','MEGA BANK LIMITED',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,0,'2019-09-16 16:43:02','2023-07-05 07:56:04',18,'मेगा बैंक सीमित','','Commercial Banks',1,'2023-07-05',1,'2'),(48,'prabhu-bank-limited','PRABHU BANK LIMITED',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,0,'2019-09-16 16:43:47','2023-01-30 10:52:49',18,'प्रभु बैंक सीमित','','Commercial Banks',1,NULL,NULL,'1'),(49,'gandaki-bikash-bank-limited','GANDAKI BIKASH BANK LIMITED',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,0,'2019-09-16 16:59:33','2023-07-05 07:58:11',18,'गांडाकी बिकाश बैंक लिमिटेड','','Development Banks',2,'2023-07-05',1,'2'),(50,'green-development-bank','GREEN DEVELOPMENT BANK',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,0,'2019-09-16 17:00:08','2023-01-30 10:49:06',18,'GREEN विकास बैंक','','Development Banks',2,NULL,NULL,'1'),(51,'kanchan-development-bank','KANCHAN DEVELOPMENT BANK',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,0,'2019-09-16 17:00:18','2023-07-05 07:58:49',18,'कांचन विकास बैंक','','Development Banks',2,'2023-07-05',1,'2'),(52,'karnali-development-bank','KARNALI DEVELOPMENT BANK',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,0,'2019-09-16 17:00:27','2023-01-30 10:49:06',18,'कार्नाली विकास बैंक','','Development Banks',2,NULL,NULL,'1'),(53,'nepal-community-development-bank-limited','NEPAL COMMUNITY DEVELOPMENT BANK LIMITED',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,0,'2019-09-16 17:00:46','2023-07-05 07:51:23',18,'नेपाल कम्युनिटी विकास बैंक सीमित','','Development Banks',2,'2023-07-05',1,'2'),(54,'purnima-bikash-bank-limited','PURNIMA BIKASH BANK LIMITED',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,0,'2019-09-16 17:01:00','2023-07-05 07:51:14',1,'पूर्णिमा बिकाश बैंक लिमिटेड','','Development Banks',2,'2023-07-05',1,'2'),(55,'capital-merchant-banking-and-finance-ltd','CAPITAL MERCHANT BANKING AND FINANCE LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,0,'2019-09-16 17:02:01','2023-01-30 10:51:34',1,'CAPITAL MERCHANT BANKING AND FINANCE LTD.','वित्तीय संस्था','Financial Institutions',3,NULL,NULL,'1'),(56,'central-finance-ltd','CENTRAL FINANCE LTD.',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,0,'2019-09-16 17:02:26','2023-01-30 10:51:34',18,'CENTRAL FINANCE LTD.','','Financial Institutions',3,NULL,NULL,'1'),(57,'goodwill-finance-ltd','GOODWILL FINANCE LTD',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,0,'2019-09-16 17:02:53','2023-01-30 10:51:34',1,'GOODWILL FINANCE LTD','','Financial Institutions',3,NULL,NULL,'1'),(58,'gurkhas-finance-ltd','GURKHAS FINANCE LTD',NULL,NULL,NULL,'','',NULL,'g','','',0,NULL,NULL,0,'2019-09-16 17:03:24','2023-01-30 10:51:34',1,'GURKHAS FINANCE LTD','','Financial Institutions',3,NULL,NULL,'1'),(59,'lalitpur-finance-ltd','LALITPUR FINANCE LTD',NULL,NULL,NULL,'','',NULL,'g','','',0,'https://demo.nyatapol.com/dashicfc/uploads/responsive_filemanager/lalitpur-finance-company-ltd66.png',NULL,0,'2019-09-16 17:03:39','2023-07-05 07:50:56',18,'LALITPUR FINANCE LTD','','Financial Institutions',3,'2023-07-05',1,'2'),(60,'pokhara-finance-ltd','POKHARA FINANCE LTD',NULL,NULL,NULL,'','',NULL,'g','','',0,'https://demo.nyatapol.com/dashicfc/uploads/responsive_filemanager/20180611112608_pokhara-finance.jpg',NULL,0,'2019-09-16 17:03:56','2023-03-26 06:27:51',18,'POKHARA FINANCE LTD','','Financial Institutions',3,'2023-03-26',1,'1'),(61,'progressive-finance-limited','PROGRESSIVE FINANCE LIMITED',NULL,NULL,NULL,'','',NULL,'g','','',0,'https://demo.nyatapol.com/dashicfc/uploads/responsive_filemanager/Progressive-Finance-Logo_818-x-209.jpg',NULL,0,'2019-09-16 17:04:14','2023-03-26 06:27:17',1,'PROGRESSIVE FINANCE LIMITED','वित्तीय संस्था','Financial Institutions',3,'2023-03-26',1,'1'),(62,'srijana-finance-ltd','SRIJANA FINANCE LTD',NULL,NULL,NULL,'','',NULL,'g','','',0,'https://demo.nyatapol.com/dashicfc/uploads/responsive_filemanager/Sirjana-Finance.jpg',NULL,0,'2019-09-16 17:04:28','2023-07-05 07:50:45',1,'SRIJANA FINANCE LTD','वित्तीय संस्था','Financial Institutions',3,'2023-07-05',1,'2');
/*!40000 ALTER TABLE `tbl_networks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pagetype`
--

DROP TABLE IF EXISTS `tbl_pagetype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pagetype` (
  `RecordNo` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT NULL,
  `pagetype_slug` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `Disabled` int(11) NOT NULL,
  PRIMARY KEY (`RecordNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pagetype`
--

LOCK TABLES `tbl_pagetype` WRITE;
/*!40000 ALTER TABLE `tbl_pagetype` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pagetype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_post_category`
--

DROP TABLE IF EXISTS `tbl_post_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_post_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `post_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_post_category`
--

LOCK TABLES `tbl_post_category` WRITE;
/*!40000 ALTER TABLE `tbl_post_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_post_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_previlage`
--

DROP TABLE IF EXISTS `tbl_previlage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_previlage` (
  `RecordNo` int(11) NOT NULL AUTO_INCREMENT,
  `UserType` int(11) NOT NULL DEFAULT '0',
  `Previlage` varchar(255) NOT NULL DEFAULT '',
  `Remarks` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`RecordNo`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_previlage`
--

LOCK TABLES `tbl_previlage` WRITE;
/*!40000 ALTER TABLE `tbl_previlage` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_previlage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_system_options`
--

DROP TABLE IF EXISTS `tbl_system_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_system_options` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(50) NOT NULL,
  `option_value` mediumtext NOT NULL,
  `modified_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique keys` (`option_name`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_system_options`
--

LOCK TABLES `tbl_system_options` WRITE;
/*!40000 ALTER TABLE `tbl_system_options` DISABLE KEYS */;
INSERT INTO `tbl_system_options` VALUES (74,'site_title','ICFC Finance Limited','2018-12-12 09:20:25'),(75,'phone_1','01-4425292 ','2018-12-12 09:20:52'),(76,'phone_2','01-4473052','2018-12-12 09:20:52'),(77,'email_address_1','info@icfcbank.com','2018-12-12 09:20:52'),(78,'site_short_name','ICFC','2018-12-12 09:20:25'),(79,'site_link','','2018-12-23 08:52:40'),(80,'email_address_2','','2018-12-03 10:28:02'),(81,'address_line_1','','2018-12-03 10:28:02'),(82,'address_line_2','','2018-12-03 10:28:02'),(83,'phone_3','','2018-12-03 10:28:02'),(84,'phone_4','','2018-12-03 10:28:02'),(85,'social_pinterest','#','2018-12-13 09:33:55'),(86,'social_linkedin','#','2018-12-13 09:33:56'),(87,'social_twitter','#','2018-12-13 09:33:56'),(88,'social_instagram','#','2018-12-13 09:33:56'),(89,'social_google','#','2018-12-13 09:33:56'),(90,'social_facebook','https://www.facebook.com/icfcbank/','2019-01-13 07:25:31'),(91,'bank_hours','<h2>Counter Timing</h2>\r\n\r\n<table cellpadding=\"5\" class=\"t-border table table-hover\">\r\n	<tbody>\r\n		<tr>\r\n			<th colspan=\"2\" rowspan=\"1\" style=\"text-align:left\"><span style=\"font-size:14px\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>&nbsp; Sunday&nbsp; - Thursday</th>\r\n			<th rowspan=\"1\" style=\"text-align:left\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Friday&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</th>\r\n		</tr>\r\n		<tr>\r\n			<td><span style=\"font-size:14px\">All Branches</span></td>\r\n			<td>\r\n			<p><span style=\"font-size:14px\">10:00 a.m. - 03:30p.m&nbsp;</span></p>\r\n			</td>\r\n			<td><span style=\"font-size:14px\">10:00 a.m. - 01:30p.m</span></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h2>&nbsp;</h2>\r\n','2022-11-10 08:41:17'),(92,'site_title_nepali','आईसीएफसी वित्त लिमिटेड','2019-09-23 05:30:29'),(93,'site_short_name_nepali','आईसीएफसी','2019-09-23 05:30:29'),(94,'address_line_1_nepali','','2019-09-23 05:42:49'),(95,'address_line_2_nepali','','2019-09-23 05:42:49'),(96,'phone_1_nepali','०१-४४२५२९२ ','2019-11-19 04:37:40'),(97,'phone_2_nepali','०१-४४७३०५२ ','2019-11-19 04:37:40'),(98,'phone_3_nepali','','2019-11-19 04:37:40'),(99,'phone_4_nepali','','2019-11-19 04:37:40'),(100,'bank_hours_nepali','','2023-01-17 09:53:08');
/*!40000 ALTER TABLE `tbl_system_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_team`
--

DROP TABLE IF EXISTS `tbl_team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_team` (
  `RecordNo` int(11) NOT NULL AUTO_INCREMENT,
  `PageName` mediumtext,
  `PageTitle` mediumtext,
  `datevalue` mediumtext,
  `Location` mediumtext,
  `Description` longtext NOT NULL,
  `qualification` mediumtext,
  `post` mediumtext,
  `representative` mediumtext,
  `Type` char(2) NOT NULL DEFAULT 'g',
  `MetaKeyword` mediumtext,
  `MetaDescription` mediumtext,
  `Serial` int(11) NOT NULL DEFAULT '0',
  `CoverImage` mediumtext,
  `DocPath` mediumtext,
  `Disabled` int(11) DEFAULT '0',
  `created` datetime NOT NULL,
  `lastmodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `PageTitleNepali` mediumtext NOT NULL,
  `qualificationNepali` mediumtext NOT NULL,
  `postNepali` mediumtext NOT NULL,
  `representativeNepali` mediumtext,
  `DescriptionNepali` mediumtext,
  PRIMARY KEY (`RecordNo`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_team`
--

LOCK TABLES `tbl_team` WRITE;
/*!40000 ALTER TABLE `tbl_team` DISABLE KEYS */;
INSERT INTO `tbl_team` VALUES (1,'sunil-pant1','Sunil Pant',NULL,NULL,'','','                 Chief Executive Officer',NULL,'g','','',0,'1657611747Sunil_Sir_Edited_New.jpg',NULL,0,'2018-10-29 08:03:53','2022-07-12 07:42:27',18,'श्री सुनील पंत','एमबीए','प्रमुख कार्यकारी अधिकृत',NULL,'<p>श्री पंत त्रिभुवन विश्वविद्यालयबाट एमबीए स्नातक हुनुहुन्छ र उनीसँग २५&nbsp;&nbsp;वर्ष भन्दा बढीको बैंकिंग अनुभव नेपालका प्रमुख वित्तीय संस्था र वाणिज्य बैंकहरूसँग छ। उहाँ एक अनुभवी पेशेवर हुनुहुन्छ जसले समग्र वित्तीय संस्थाको व्यवस्थापनमा राम्रो पकड राख्नुहुन्छ।</p>\r\n'),(2,'amit-shrestha2','Amit Shrestha',NULL,NULL,'','','Deputy Chief Executive Officer',NULL,'g','','',0,'16557853212.jpg',NULL,0,'2018-12-13 10:30:50','2022-06-21 06:06:47',18,'श्री अमित श्रेष्ठ','','',NULL,'<p>श्री श्रेष्ठ काठमाडौं विश्वविद्यालयबाट एमबीए स्नातक हुन् र उनीसँग १६&nbsp;वर्ष भन्दा बढीको बैंकिंग अनुभव छ जसमा &nbsp;६&nbsp;बर्ष नेपाल एसबीआई नेपाल लिमिटेडसँग छ र उनिलाई क्रेडिट व्यवस्थापन र शाखा संचालनको राम्रो ज्ञान छ।</p>\r\n'),(3,'lachhaman-prasad-jaisi3','Lachhaman Prasad Jaisi',NULL,NULL,'','','Deputy General Manager',NULL,'g','','',0,'1657611940lachaman_sir.jpg',NULL,0,'2018-12-13 10:31:14','2022-07-12 07:45:40',18,'श्री  लक्ष्मण प्रसाद जैसी','','प्रमुख वित्तीय अधिकारी',NULL,'<p>श्री जयसी बी.क. (ऑनर्स) र एल.एल.बी. ले ​​भारतको उडिस्साको सम्बलपुर विश्वविद्यालयबाट स्नातक छन् र चौध वर्ष भन्दा बढीको बैंकिंग अनुभव छ जसमा सिद्धार्थ बैंक लिमिटेडसँग <strong>&nbsp;६&nbsp;</strong>&nbsp;बर्ष वित्त र योजनाको प्रमुखको रूपमा रहेको छ र यस क्षेत्रमा राम्रो ज्ञान छ। वित्त, कोषागार, जोखिम व्यवस्थापन र क्रेडिट व्यवस्थापन।</p>\r\n'),(4,'sanjaya-thapaliya4','Sanjaya Thapaliya  ',NULL,NULL,'','','Senior Manager',NULL,'g','','',0,'16557852833.jpg',NULL,0,'2021-12-21 02:45:19','2022-06-21 06:06:16',18,'Sanjaya Thapaliya  ','','Senior Manager',NULL,'');
/*!40000 ALTER TABLE `tbl_team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usertype`
--

DROP TABLE IF EXISTS `tbl_usertype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_usertype` (
  `RecordNo` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL DEFAULT '',
  `Description` varchar(255) NOT NULL DEFAULT '',
  `Remarks` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`RecordNo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usertype`
--

LOCK TABLES `tbl_usertype` WRITE;
/*!40000 ALTER TABLE `tbl_usertype` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_usertype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_group`
--

DROP TABLE IF EXISTS `team_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_code` varchar(25) NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text,
  `created_by` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  `rank` int(11) NOT NULL,
  `description_nepali` text NOT NULL,
  `group_name_nepali` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `show_on_menu` enum('Yes','No') NOT NULL DEFAULT 'No',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_group`
--

LOCK TABLES `team_group` WRITE;
/*!40000 ALTER TABLE `team_group` DISABLE KEYS */;
INSERT INTO `team_group` VALUES (1,'BOD','BOD','bod','',3,'2023-01-31',0,'2023-03-02','1',0,'','',0,'No'),(2,'MGNT','Management Team','management-team','',3,'2023-01-31',0,'2023-03-02','1',0,'','',0,'No'),(3,'HOD','HOD','hod','',3,'2023-01-31',0,'2023-03-02','1',0,'','',0,'No'),(4,'RH','Regional Head','regional-head','',3,'2023-01-31',0,'2023-03-02','1',0,'','',0,'No'),(5,'CS','Company Secretary','company-secretary','',3,'2023-03-02',0,'2023-03-02','1',0,'','',0,'No'),(6,'IT','IT Officers','it-officers','',1,'2023-04-12',0,'2024-01-28','1',0,'','',0,'No');
/*!40000 ALTER TABLE `team_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `name_nepali` varchar(200) NOT NULL,
  `description_nepali` text NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `featured_image` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `sub_designation` varchar(255) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `team_group_id` int(11) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL,
  `created` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  `show_on_top` enum('Yes','No') NOT NULL DEFAULT 'No',
  `is_block` enum('Yes','No') NOT NULL DEFAULT 'No',
  `blur` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,'Mr. Laxman Limbu Subba','श्री. लक्ष्मन लिम्बु सुब्बा','','','mr-laxman-limbu-subba1708676225','','https://admin.skdbl.com.np/uploads/responsive_filemanager/Laxman%20Subba.jpg','9','',0,1,'','',1,'2023-01-31',3,'2024-02-23',2,'1','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(2,'Shyam Singh Pandey','','',NULL,'shyam-singh-pandey2','','https://admin.icfcbank.com/uploads/responsive_filemanager/team/bod/1579596940MR_SHYAM_SINGH_PANDEY.jpg',NULL,'',NULL,1,'','',0,'2023-01-31',3,'2024-01-30',2,'2','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(3,'Mr. Hemraj Subedi','श्री. हेमराज सुवेदी','','','mr-hemraj-subedi1708676242','','https://admin.skdbl.com.np/uploads/responsive_filemanager/Hemraj%20Subedi1.jpg','10','',0,1,'','',2,'2023-01-31',3,'2024-02-23',2,'1','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(4,'Prof. Rajendra Gopal Shrestha','प्रो. राजेन्द्र गोपाल श्रेष्ठ','','','prof-rajendra-gopal-shrestha','','https://admin.icfcbank.com/uploads/responsive_filemanager/team/bod/1579175427Rajendra_Gopal_Shrestha.jpg','','',0,1,'','',0,'2023-01-31',3,'2023-12-20',1,'2','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(5,'Mr. Ganesh Prasad Baral','श्री.  गणेश प्रसाद बराल','','','mr-ganesh-prasad-baral','','https://admin.skdbl.com.np/uploads/responsive_filemanager/Ganesh%20Baral.jpg','10','',0,1,'','',3,'2023-01-31',3,'2024-01-28',2,'1','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(6,'Mr. Bhagirath Khanal','श्री. भगीरथ खनाल','','','mr-bhagirath-khanal','','https://admin.skdbl.com.np/uploads/responsive_filemanager/5be2.jpg','10','',0,1,'','',4,'2023-01-31',3,'2024-01-30',2,'1','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(7,'Mr. Lil Bahadur Limbu Rogu','श्री. लील बहादुर लिम्बु रोगु','','','mr-lil-bahadur-limbu-rogu1708676287','','https://admin.skdbl.com.np/uploads/responsive_filemanager/LBRL.jpg','10','',0,1,'','',5,'2023-01-31',3,'2024-02-23',2,'1','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(8,'Mrs. Bheshaja Kafle','श्रीमती. भेषजा काफ्ले','','','mrs-bheshaja-kafle','','https://admin.skdbl.com.np/uploads/responsive_filemanager/Bhesaja.jpg','10','',0,1,'','',6,'2023-01-31',3,'2024-01-30',2,'1','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(9,'Laxminath Ghimire',' लक्ष्मीनाथ घिमिरे','','','laxminath-ghimire1704628713','','https://admin.skdbl.com.np/uploads/responsive_filemanager/Laxminath%20Ghimire.jpg','21','',0,1,'','',7,'2023-01-31',3,'2024-01-28',2,'2','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(10,'Mr. Dinesh Kumar Pokhrel','श्री. दिनेश कुमार पोखरेल','<p>श्री पंत त्रिभुवन विश्वविद्यालयबाट एमबीए स्नातक हुनुहुन्छ र उनीसँग २५&nbsp;&nbsp;वर्ष भन्दा बढीको बैंकिंग अनुभव नेपालका प्रमुख वित्तीय संस्था र वाणिज्य बैंकहरूसँग छ। उहाँ एक अनुभवी पेशेवर हुनुहुन्छ जसले समग्र वित्तीय संस्थाको व्यवस्थापनमा राम्रो पकड राख्नुहुन्छ।</p>\r\n','','mr-dinesh-kumar-pokhrel','','https://admin.skdbl.com.np/uploads/responsive_filemanager/ACEO.jpg','19','',0,2,'','',1,'2023-01-31',3,'2024-01-30',2,'1','No','Yes','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(11,'Mr. Kumar Khadka','श्री. कुमार खड्का','<p>श्री श्रेष्ठ काठमाडौं विश्वविद्यालयबाट एमबीए स्नातक हुन् र उनीसँग १६&nbsp;वर्ष भन्दा बढीको बैंकिंग अनुभव छ जसमा &nbsp;६&nbsp;बर्ष नेपाल एसबीआई नेपाल लिमिटेडसँग छ र उनिलाई क्रेडिट व्यवस्थापन र शाखा संचालनको राम्रो ज्ञान छ।</p>\r\n','','mr-kumar-khadka','','https://admin.skdbl.com.np/uploads/responsive_filemanager/NEW%20DCEO.png','8','',0,2,'','',2,'2023-01-31',3,'2024-04-19',2,'1','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(12,'Mr. Bidur Pokhrel','श्री. बिदुर पोखरेल','<p>श्री जयसी बी.क. (ऑनर्स) र एल.एल.बी. ले ​​भारतको उडिस्साको सम्बलपुर विश्वविद्यालयबाट स्नातक छन् र चौध वर्ष भन्दा बढीको बैंकिंग अनुभव छ जसमा सिद्धार्थ बैंक लिमिटेडसँग <strong>&nbsp;६&nbsp;</strong>&nbsp;बर्ष वित्त र योजनाको प्रमुखको रूपमा रहेको छ र यस क्षेत्रमा राम्रो ज्ञान छ। वित्त, कोषागार, जोखिम व्यवस्थापन र क्रेडिट व्यवस्थापन।</p>\r\n','','mr-bidur-pokhrel','','https://admin.skdbl.com.np/uploads/responsive_filemanager/hr11.jpg','25','',0,2,'','',4,'2023-01-31',3,'2024-03-26',2,'1','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(13,'Mr. Swastik Parajuli','श्री. स्वस्तिक पराजुली','','','mr-swastik-parajuli','','https://admin.skdbl.com.np/uploads/responsive_filemanager/Swastik.jpg','31','',0,2,'','',11,'2023-01-31',3,'2024-03-28',2,'1','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(35,'Pooja Joshi','Pooja Joshi','','pooja.joshi@icfcbank.com','pooja-joshi1688531838','','https://admin.icfcbank.com/uploads/responsive_filemanager/team/hod/1655966725POOJA_JOSHI.jpg','','',15,3,'','',1,'2023-01-31',3,'2023-12-20',1,'2','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(36,'Sagar Nidhi Tiwari','Sagar Nidhi Tiwari','','sagar.tiwari@icfcbank.com','sagar-nidhi-tiwari1677750248','','https://admin.icfcbank.com/uploads/responsive_filemanager/team/hod/1655966979SAGAR_NIDHI_TIWARI.jpg','','',4,3,'','',0,'2023-01-31',3,'2023-12-20',1,'2','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(37,'Ronesh Chitrakar','Ronesh Chitrakar','','ronesh.chitrakar@icfcbank.com','ronesh-chitrakar1677754988','','https://admin.icfcbank.com/uploads/responsive_filemanager/team/hod/1655967050RONESH_CHITRAKAR.jpg','','',7,3,'','',2,'2023-01-31',3,'2023-12-20',1,'2','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(38,'Navin Poudel','Navin Poudel','','navin.paudel@icfcbank.com','navin-poudel1677750191','','https://admin.icfcbank.com/uploads/responsive_filemanager/team/hod/1655967228NAVIN_POUDEL.jpg','','',6,3,'','',0,'2023-01-31',3,'2023-12-20',1,'2','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(39,'Rajesh Subedi','Rajesh Subedi','','rajesh.subedi@icfcbank.com','rajesh-subedi','','https://admin.icfcbank.com/uploads/responsive_filemanager/team/hod/1655967666RAJESH_SUBEDI.jpg','','',10,3,'','',0,'2023-01-31',3,'2023-12-20',1,'2','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(40,'Birendra Khadka','Birendra Khadka','','birendra.khadka@icfcbank.com','birendra-khadka','','https://admin.icfcbank.com/uploads/responsive_filemanager/1697181130722.jpg','','',4,3,'','',11,'2023-01-31',3,'2023-12-20',1,'2','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(41,'Sanjok Gurung','Sanjok Gurung','','sanjok.gurung@icfcbank.com','sanjok-gurung1686115896','','https://admin.icfcbank.com/uploads/responsive_filemanager/team/hod/165863631136965.jpg','','',1,3,'','',10,'2023-01-31',3,'2023-12-20',1,'2','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(42,'Nitesh Tiwari','Nitesh Tiwari','','nitesh.tiwari@icfcbank.com','nitesh-tiwari1686115487','','https://admin.icfcbank.com/uploads/responsive_filemanager/team/hod/1655968629NITESH_TIWARI.jpg','','',3,3,'','',5,'2023-01-31',3,'2023-12-20',1,'2','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(43,'Achyut Pandit','','','achyut.pandit@icfcbank.com','achyut-pandit','','https://admin.icfcbank.com/uploads/responsive_filemanager/team/hod/1661076871Achyut_Pandit_(2).jpg','','',5,3,'','',3,'2023-01-31',3,'2023-12-20',1,'2','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(44,'Pradip Khatiwada','','','pradip.khatiwada@icfcbank.com','pradip-khatiwada','','https://admin.icfcbank.com/uploads/responsive_filemanager/team/hod/1666352840pp.jpg','','',2,3,'','',8,'2023-01-31',3,'2023-12-20',1,'2','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(48,'Navin Paudel','','','','navin-paudel1692703321','','https://admin.icfcbank.com/uploads/responsive_filemanager/team/regional_head/1674966540NAVIN_POUDEL.jpg','','',13,4,'','',0,'2023-01-31',3,'2023-12-20',1,'2','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(49,'Sagar Nidhi Tiwari','','','','sagar-nidhi-tiwari1692703456','','https://admin.icfcbank.com/uploads/responsive_filemanager/team/regional_head/Achyut%20Pandit%20(2).jpg','','',11,4,'','',0,'2023-01-31',3,'2023-12-20',1,'2','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(50,'Anup KC',' Anup KC','','','anup-kc','','https://admin.icfcbank.com/uploads/responsive_filemanager/team/regional_head/1656668100anup_kc.jpg','','',12,4,'','',0,'2023-01-31',3,'2023-12-20',1,'2','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(51,'Lachhaman Prasad Jaisi','Lachhaman Prasad Jaisi','','laxman.adhikari@icfcbank.com','lachhaman-prasad-jaisi1691740277','','https://admin.icfcbank.com/uploads/responsive_filemanager/team/company_secretary/16557853194.jpg','','',7,5,'','01-4525292 ext 214',0,'2023-03-02',3,'2023-12-20',1,'2','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(52,'Sudin Thapa','Sudin Thapa','','sudin.thapa@icfcbank.com','sudin-thapa1697695665','','https://admin.icfcbank.com/uploads/responsive_filemanager/info%201.png','','Digital Officer',7,0,'','9849236902',0,'2023-04-12',1,'2023-12-20',1,'2','No','Yes','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(53,'Kishor Katuwal','Kishor Katuwal','','kishor.katuwal@icfcbank.com','kishor-katuwal1697695606','','https://admin.icfcbank.com/uploads/responsive_filemanager/compliance1.png','','Mobile Bank Officer',7,0,'','9849845434',0,'2023-04-12',1,'2023-12-20',1,'2','No','Yes','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(54,'Sumit Nepali','Sumit Nepali','','sumit.nepal@icfcbank.com','sumit-nepali1697695534','','https://admin.icfcbank.com/uploads/responsive_filemanager/griev%201.png','','Internet Bank Officer',7,0,'','9843405994',2,'2023-04-12',1,'2023-12-20',1,'2','No','Yes','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(55,'Deepsikha Shrestha','Deepsikha Shrestha','','deepsikha.shrestha@icfcbank.com','deepsikha-shrestha','','https://admin.icfcbank.com/uploads/responsive_filemanager/team/hod/1680525881photo-Deepsikha.jpg','','',14,3,'','',8,'2023-06-07',1,'2023-12-20',1,'2','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(56,'Suraj Uprety','Suraj Uprety','','suraj.uprety@icfcbank.com','suraj-uprety1693109832','','https://admin.icfcbank.com/uploads/responsive_filemanager/team/hod/1680524912suraj.jpg','','Credit Operation Department',9,3,'','',4,'2023-06-07',1,'2023-12-20',1,'2','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(57,'Krishna Prasad Bhusal','Krishna Prasad Bhusal','','krishna.bhusal@icfcbank.com','krishna-prasad-bhusal','','https://admin.icfcbank.com/uploads/responsive_filemanager/team/hod/1682678104Mar_24%2C_2023_1.jpg','','',6,3,'','',9,'2023-06-07',1,'2023-12-20',1,'2','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(58,'Mr. Amrit Sharma','','','amrit.sharma@icfcbank.com','mr-amrit-sharma1699589908','','https://admin.icfcbank.com/uploads/responsive_filemanager/icon.png','','Regional head Lumbini Region',0,4,'','',0,'2023-08-22',1,'2023-12-20',1,'2','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(59,'Mrs.  Menuka Subedi','Mrs.  Menuka Subedi','','','mrs-menuka-subedi1693109879','','https://admin.icfcbank.com/uploads/responsive_filemanager/Photo-%20Menuka%20Subedi.png','','Head – Central Operation Department',16,3,'','',6,'2023-08-23',1,'2023-12-20',1,'2','No','No','LEHV6nWB2yk8pyo0adR*.7kCMdnj'),(60,'Mr. Kumar Khadka','श्री. कुमार खड्का','','kumar.khadka@skdbl.com.np','mr-kumar-khadka1713503965','','https://admin.skdbl.com.np/uploads/responsive_filemanager/NEW%20DCEO.png','24','',0,1,'','',8,'2023-12-20',1,'2024-04-19',2,'1','No','No',''),(61,'Mr. Upendra Bista','श्री. उपेन्द्र बिष्ट','','','mr-upendra-bista1711517634','','https://admin.skdbl.com.np/uploads/responsive_filemanager/Upendra%20Bista.jpg','27','',0,2,'','',7,'2023-12-20',1,'2024-03-27',2,'1','No','No',''),(62,'Mr. Robin Shrestha','श्री. रबिन श्रेष्ठ','','','mr-robin-shrestha1711517780','','https://admin.skdbl.com.np/uploads/responsive_filemanager/Robin.jpg','26','',0,2,'','',6,'2023-12-20',1,'2024-03-27',2,'1','No','No',''),(63,'Mrs. Babita Bhattarai','श्रीमती. बबिता भट्टराई','','babita.bhattarai@gmail.com.com','mrs-babita-bhattarai','','https://admin.skdbl.com.np/uploads/responsive_filemanager/HR12.jpg','29','',0,2,'','',8,'2023-12-20',1,'2024-03-27',2,'1','No','No',''),(64,'Mr. Avishek Baral','श्री. अभिषेक बराल','','avishek.baral@skdbl.com.np','mr-avishek-baral','','https://admin.skdbl.com.np/uploads/responsive_filemanager/CBO.jpg','30','',0,2,'Biratnagar','',3,'2024-03-26',2,'2024-03-27',2,'1','No','Yes',''),(65,'Mr. Abhisek Adhikari','श्री. अभिषेक अधिकारी','','','mr-abhisek-adhikari','','https://admin.skdbl.com.np/uploads/responsive_filemanager/HEAD%20NPA%20Management.jpg','33','',18,2,'','',5,'2024-03-27',2,'2024-04-16',2,'1','No','Yes',''),(66,'Mr. Manishekhar Dev','श्री. मनिशेखर देव','','manishekhar.deo@skdbl.com.np','mr-manishekhar-dev','','https://admin.skdbl.com.np/uploads/responsive_filemanager/Mani%20Sir.jpg','28','',0,2,'Biratnagar','',10,'2024-03-28',2,'2024-03-29',2,'1','No','Yes',''),(67,'Mr. Baburam Subedi','श्री. बाबुराम सुवेदी','','baburam.subedi@skdbl.com.np','mr-baburam-subedi','','https://admin.skdbl.com.np/uploads/responsive_filemanager/Baburam%20Sir.jpg','32','',17,2,'Biratnagar','',9,'2024-03-28',2,'2024-03-29',2,'1','No','Yes','');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `travel_information`
--

DROP TABLE IF EXISTS `travel_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `travel_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `travel_start_country` varchar(100) DEFAULT NULL,
  `entry_adress` varchar(100) DEFAULT NULL,
  `entry_time` time DEFAULT NULL,
  `entry_address2` varchar(100) DEFAULT NULL,
  `travel_destination` varchar(100) DEFAULT NULL,
  `travel_deuration` varchar(100) DEFAULT NULL,
  `travel_porpose` varchar(100) DEFAULT NULL,
  `traveler_proporty` varchar(100) DEFAULT NULL,
  `travel_type` varchar(100) DEFAULT NULL,
  `remarks` text,
  `person_id` bigint(20) DEFAULT NULL,
  `gone_dirction` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `is_returned` varchar(10) DEFAULT '0',
  `exit_time` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `travel_information`
--

LOCK TABLES `travel_information` WRITE;
/*!40000 ALTER TABLE `travel_information` DISABLE KEYS */;
INSERT INTO `travel_information` VALUES (1,'dasdsa','dasdas','01:23:00','dsadasda','dasdasdasd','Obcaecati molestiae ','व्यापार','fff','गाडी','dasdas',1,'भारत',1,6,6,'2024-07-15','2024-07-15','1','02:26:00'),(2,'dasdsa','dasdas','06:51:00','dsadasda','dasdasdasd','dasdasdsad','व्यापार','fff','गाडी','hhh',2,'भारत',1,6,NULL,'2024-07-15',NULL,'0',NULL);
/*!40000 ALTER TABLE `travel_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_log`
--

DROP TABLE IF EXISTS `user_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(255) DEFAULT NULL,
  `function` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1255 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_log`
--

LOCK TABLES `user_log` WRITE;
/*!40000 ALTER TABLE `user_log` DISABLE KEYS */;
INSERT INTO `user_log` VALUES (1,'module','all',6,'2024-07-08 17:59:28'),(2,'module','role_function',6,'2024-07-08 17:59:33'),(3,'module','form',6,'2024-07-08 17:59:46'),(4,'module','form',6,'2024-07-08 18:00:08'),(5,'module','all',6,'2024-07-08 18:00:08'),(6,'module','all',6,'2024-07-08 18:00:15'),(7,'designation','all',6,'2024-07-08 18:00:18'),(8,'designation','form',6,'2024-07-08 18:00:21'),(9,'designation','all',6,'2024-07-08 18:00:24'),(10,'designation','form',6,'2024-07-08 18:00:25'),(11,'designation','all',6,'2024-07-08 18:00:27'),(12,'department','all',6,'2024-07-08 18:00:28'),(13,'department','form',6,'2024-07-08 18:00:29'),(14,'designation','all',6,'2024-07-08 18:00:31'),(15,'department','all',6,'2024-07-08 18:00:32'),(16,'designation','all',6,'2024-07-08 18:00:33'),(17,'department','all',6,'2024-07-08 18:00:36'),(18,'designation','all',6,'2024-07-08 18:00:40'),(19,'department','all',6,'2024-07-08 18:06:18'),(20,'designation','all',6,'2024-07-08 18:06:22'),(21,'dataentryform','form',6,'2024-07-08 18:13:59'),(22,'dataentryform','form',6,'2024-07-08 18:14:48'),(23,'department','all',6,'2024-07-08 18:19:56'),(24,'dashboard',NULL,6,'2024-07-08 18:44:00'),(25,'dashboard',NULL,6,'2024-07-08 19:13:54'),(26,'dashboard',NULL,6,'2024-07-08 19:13:57'),(27,'dashboard',NULL,6,'2024-07-08 19:14:08'),(28,'dashboard',NULL,6,'2024-07-08 19:15:26'),(29,'dashboard',NULL,6,'2024-07-08 19:15:52'),(30,'dashboard',NULL,6,'2024-07-08 19:15:55'),(31,'dashboard',NULL,6,'2024-07-08 19:16:09'),(32,'dashboard',NULL,6,'2024-07-08 19:16:47'),(33,'dashboard',NULL,6,'2024-07-08 19:16:54'),(34,'dashboard',NULL,6,'2024-07-08 19:17:28'),(35,'dashboard',NULL,6,'2024-07-08 19:17:29'),(36,'dashboard',NULL,6,'2024-07-08 19:17:29'),(37,'dashboard',NULL,6,'2024-07-08 19:17:29'),(38,'dashboard',NULL,6,'2024-07-08 19:17:29'),(39,'dashboard',NULL,6,'2024-07-08 19:17:29'),(40,'dashboard',NULL,6,'2024-07-08 19:17:43'),(41,'dashboard',NULL,6,'2024-07-08 19:18:08'),(42,'dashboard',NULL,6,'2024-07-08 19:18:42'),(43,'dashboard',NULL,6,'2024-07-08 19:20:01'),(44,'dashboard',NULL,6,'2024-07-08 19:20:46'),(45,'dashboard',NULL,6,'2024-07-08 19:22:27'),(46,'dashboard',NULL,6,'2024-07-08 19:22:28'),(47,'dashboard',NULL,6,'2024-07-08 19:22:29'),(48,'dashboard',NULL,6,'2024-07-08 19:22:29'),(49,'dashboard',NULL,6,'2024-07-08 19:22:29'),(50,'dashboard',NULL,6,'2024-07-08 19:22:29'),(51,'dashboard',NULL,6,'2024-07-08 19:22:30'),(52,'dashboard',NULL,6,'2024-07-08 19:22:38'),(53,'dashboard',NULL,6,'2024-07-08 19:22:49'),(54,'dashboard',NULL,6,'2024-07-08 19:22:52'),(55,'dashboard',NULL,6,'2024-07-08 19:22:54'),(56,'dashboard',NULL,6,'2024-07-08 19:22:54'),(57,'dashboard',NULL,6,'2024-07-08 19:22:54'),(58,'dashboard',NULL,6,'2024-07-08 19:22:54'),(59,'dashboard',NULL,6,'2024-07-08 19:22:54'),(60,'dashboard',NULL,6,'2024-07-08 19:25:00'),(61,'dashboard',NULL,6,'2024-07-08 19:25:03'),(62,'dashboard',NULL,6,'2024-07-08 19:25:09'),(63,'dashboard',NULL,6,'2024-07-08 19:25:24'),(64,'dashboard',NULL,6,'2024-07-08 19:25:37'),(65,'dashboard',NULL,6,'2024-07-08 19:26:13'),(66,'dashboard',NULL,6,'2024-07-08 19:26:38'),(67,'dashboard',NULL,6,'2024-07-08 19:26:44'),(68,'dashboard',NULL,6,'2024-07-08 19:28:23'),(69,'dashboard',NULL,6,'2024-07-08 19:28:38'),(70,'dashboard',NULL,6,'2024-07-08 19:29:06'),(71,'dashboard',NULL,6,'2024-07-08 19:29:08'),(72,'dashboard',NULL,6,'2024-07-08 19:29:09'),(73,'dashboard',NULL,6,'2024-07-08 19:30:10'),(74,'dashboard',NULL,6,'2024-07-08 19:30:36'),(75,'dashboard',NULL,6,'2024-07-08 19:33:35'),(76,'dashboard',NULL,6,'2024-07-08 19:34:02'),(77,'dashboard',NULL,6,'2024-07-08 19:35:06'),(78,'dashboard',NULL,6,'2024-07-08 19:35:23'),(79,'dashboard',NULL,6,'2024-07-08 19:36:28'),(80,'dashboard',NULL,6,'2024-07-08 19:37:02'),(81,'travel','all',6,'2024-07-08 19:38:23'),(82,'dataentryform','form',6,'2024-07-08 19:38:47'),(83,'dashboard',NULL,6,'2024-07-08 19:38:50'),(84,'dataentryform','form',6,'2024-07-08 19:42:04'),(85,'dashboard',NULL,6,'2024-07-08 19:42:15'),(86,'travel','all',6,'2024-07-08 19:42:18'),(87,'dashboard',NULL,6,'2024-07-08 19:42:57'),(88,'travel','all',6,'2024-07-08 19:43:09'),(89,'dashboard',NULL,6,'2024-07-08 19:43:26'),(90,'dataentryform','all',6,'2024-07-08 19:43:32'),(91,'dashboard',NULL,6,'2024-07-08 19:43:37'),(92,'designation','all',6,'2024-07-08 19:43:49'),(93,'department','all',6,'2024-07-08 19:43:50'),(94,'user_role','all',6,'2024-07-08 19:43:51'),(95,'module','role_function',6,'2024-07-08 19:43:52'),(96,'user','all',6,'2024-07-08 19:43:56'),(97,'staff','all',6,'2024-07-08 19:44:00'),(98,'user','all',6,'2024-07-08 19:44:06'),(99,'staff','all',6,'2024-07-08 19:44:07'),(100,'dataentryform','form',6,'2024-07-08 19:44:08'),(101,'dataentryform','getDetailFromContact',6,'2024-07-08 19:44:29'),(102,'dataentryform','form',6,'2024-07-08 19:45:56'),(103,'dataentryform','all',6,'2024-07-08 19:45:56'),(104,'travel','all',6,'2024-07-08 19:46:09'),(105,'dashboard',NULL,6,'2024-07-08 19:46:11'),(106,'dataentryform','all',6,'2024-07-08 19:46:18'),(107,'dataentryform','all',6,'2024-07-08 19:46:50'),(108,'dashboard',NULL,6,'2024-07-08 19:47:27'),(109,'dashboard',NULL,6,'2024-07-08 19:52:15'),(110,'travel','all',6,'2024-07-08 19:52:34'),(111,'dashboard',NULL,6,'2024-07-08 19:53:34'),(112,'travel','all',6,'2024-07-08 19:53:36'),(113,'dashboard',NULL,6,'2024-07-08 19:53:44'),(114,'dataentryform','form',6,'2024-07-08 19:54:04'),(115,'dataentryform','getDetailFromContact',6,'2024-07-08 19:54:34'),(116,'dataentryform','form',6,'2024-07-08 19:55:25'),(117,'dataentryform','all',6,'2024-07-08 19:55:25'),(118,'travel','all',6,'2024-07-08 19:55:35'),(119,'dashboard',NULL,6,'2024-07-08 19:56:05'),(120,'dataentryform','form',6,'2024-07-08 19:56:19'),(121,'dashboard',NULL,6,'2024-07-08 19:56:21'),(122,'designation','all',6,'2024-07-08 19:56:23'),(123,'department','all',6,'2024-07-08 19:56:24'),(124,'dashboard',NULL,6,'2024-07-08 19:56:26'),(125,'travel','all',6,'2024-07-08 20:03:13'),(126,'dashboard',NULL,6,'2024-07-08 20:11:19'),(127,'dashboard',NULL,6,'2024-07-09 10:43:32'),(128,'designation','all',6,'2024-07-09 10:43:45'),(129,'designation','form',6,'2024-07-09 10:43:47'),(130,'dashboard',NULL,6,'2024-07-09 10:43:53'),(131,'dataentryform','form',6,'2024-07-09 10:46:17'),(132,'dataentryform','getDetailFromContact',6,'2024-07-09 10:46:24'),(133,'dataentryform','all',6,'2024-07-09 10:46:45'),(134,'travel','all',6,'2024-07-09 10:47:10'),(135,'dataentryform','form',6,'2024-07-09 10:48:22'),(136,'travel','all',6,'2024-07-09 10:48:28'),(137,'dashboard',NULL,6,'2024-07-09 10:48:31'),(138,'dataentryform','all',6,'2024-07-09 10:48:33'),(139,'dataentryform','form',6,'2024-07-09 10:48:35'),(140,'dataentryform','all',6,'2024-07-09 10:48:37'),(141,'dashboard',NULL,6,'2024-07-09 10:48:42'),(142,'travel','all',6,'2024-07-09 10:48:57'),(143,'dashboard',NULL,6,'2024-07-09 10:49:13'),(144,'dataentryform','form',6,'2024-07-09 10:50:47'),(145,'dataentryform','saveSnaps',6,'2024-07-09 10:57:42'),(146,'dashboard',NULL,6,'2024-07-09 10:59:34'),(147,'designation','all',6,'2024-07-09 11:00:05'),(148,'department','all',6,'2024-07-09 11:00:07'),(149,'designation','all',6,'2024-07-09 11:00:09'),(150,'dashboard',NULL,6,'2024-07-09 11:00:22'),(151,'travel','all',6,'2024-07-09 11:00:24'),(152,'dashboard',NULL,6,'2024-07-09 11:00:28'),(153,'travel','all',6,'2024-07-09 11:01:09'),(154,'dashboard',NULL,6,'2024-07-09 11:01:15'),(155,'travel','all',6,'2024-07-09 11:01:33'),(156,'dashboard',NULL,6,'2024-07-09 11:01:54'),(157,'travel','all',6,'2024-07-09 11:03:16'),(158,'dashboard',NULL,6,'2024-07-09 11:03:18'),(159,'travel','all',6,'2024-07-09 11:03:31'),(160,'dashboard',NULL,6,'2024-07-09 11:04:06'),(161,'dataentryform','all',6,'2024-07-09 11:04:11'),(162,'dataentryform','form',6,'2024-07-09 11:04:26'),(163,'dashboard',NULL,6,'2024-07-09 11:05:31'),(164,'user','all',6,'2024-07-09 11:06:59'),(165,'module','role_function',6,'2024-07-09 11:07:00'),(166,'module','role_function',6,'2024-07-09 11:07:16'),(167,'module','role_function',6,'2024-07-09 11:07:16'),(168,'district','all',6,'2024-07-09 11:07:18'),(169,'district','all',6,'2024-07-09 11:07:24'),(170,'district','all',6,'2024-07-09 11:07:36'),(171,'district','all',6,'2024-07-09 11:07:37'),(172,'district','all',6,'2024-07-09 11:07:37'),(173,'district','all',6,'2024-07-09 11:07:37'),(174,'district','all',6,'2024-07-09 11:07:37'),(175,'district','all',6,'2024-07-09 11:07:37'),(176,'district','all',6,'2024-07-09 11:07:37'),(177,'district','all',6,'2024-07-09 11:07:37'),(178,'district','all',6,'2024-07-09 11:07:37'),(179,'district','all',6,'2024-07-09 11:07:37'),(180,'dataentryform','form',6,'2024-07-09 11:07:49'),(181,'travel','all',6,'2024-07-09 11:12:19'),(182,'dashboard',NULL,6,'2024-07-09 11:19:14'),(183,'dataentryform','form',6,'2024-07-09 11:20:14'),(184,'dashboard',NULL,6,'2024-07-09 11:21:06'),(185,'designation','all',6,'2024-07-09 11:21:25'),(186,'department','all',6,'2024-07-09 11:21:26'),(187,'district','all',6,'2024-07-09 11:21:26'),(188,'user_role','all',6,'2024-07-09 11:21:27'),(189,'module','role_function',6,'2024-07-09 11:21:28'),(190,'user','all',6,'2024-07-09 11:21:29'),(191,'staff','all',6,'2024-07-09 11:21:30'),(192,'dataentryform','form',6,'2024-07-09 11:21:32'),(193,'staff','all',6,'2024-07-09 11:21:33'),(194,'user','all',6,'2024-07-09 11:21:41'),(195,'user','form',6,'2024-07-09 11:21:44'),(196,'staff','all',6,'2024-07-09 11:22:51'),(197,'dataentryform','form',6,'2024-07-09 11:22:52'),(198,'dashboard',NULL,6,'2024-07-09 11:22:55'),(199,'dataentryform','form',6,'2024-07-09 11:23:14'),(200,'staff','all',6,'2024-07-09 11:23:16'),(201,'user','all',6,'2024-07-09 11:23:17'),(202,'module','role_function',6,'2024-07-09 11:23:18'),(203,'dashboard',NULL,6,'2024-07-09 11:23:33'),(204,'travel','all',6,'2024-07-09 11:23:36'),(205,'dashboard',NULL,6,'2024-07-09 12:14:07'),(206,'travel','all',6,'2024-07-09 12:14:12'),(207,'travel','all',6,'2024-07-09 12:28:56'),(208,'dashboard',NULL,6,'2024-07-09 12:29:39'),(209,'designation','all',6,'2024-07-09 12:29:52'),(210,'department','all',6,'2024-07-09 12:29:54'),(211,'district','all',6,'2024-07-09 12:29:54'),(212,'user_role','all',6,'2024-07-09 12:29:55'),(213,'module','role_function',6,'2024-07-09 12:29:55'),(214,'user','all',6,'2024-07-09 12:29:56'),(215,'staff','all',6,'2024-07-09 12:29:57'),(216,'dataentryform','form',6,'2024-07-09 12:29:57'),(217,'dashboard',NULL,6,'2024-07-09 12:30:10'),(218,'dataentryform','form',6,'2024-07-09 12:30:15'),(219,'dashboard',NULL,6,'2024-07-11 14:49:20'),(220,'dataentryform','form',6,'2024-07-11 14:54:40'),(221,'dashboard',NULL,6,'2024-07-11 14:59:09'),(222,'dashboard',NULL,6,'2024-07-11 15:00:26'),(223,'dataentryform','all',6,'2024-07-11 15:01:43'),(224,'travel','all',6,'2024-07-11 15:01:48'),(225,'dashboard',NULL,6,'2024-07-11 15:02:17'),(226,'dashboard',NULL,6,'2024-07-11 15:07:41'),(227,'dashboard',NULL,6,'2024-07-11 15:09:20'),(228,'dashboard',NULL,6,'2024-07-11 15:09:21'),(229,'dashboard',NULL,6,'2024-07-11 15:09:45'),(230,'travel','all',6,'2024-07-11 15:09:49'),(231,'dashboard',NULL,6,'2024-07-11 15:10:00'),(232,'dataentryform','form',6,'2024-07-11 15:10:31'),(233,'dashboard',NULL,6,'2024-07-11 15:13:14'),(234,'dataentryform','form',6,'2024-07-11 15:24:14'),(235,'dataentryform','form',6,'2024-07-11 15:36:32'),(236,'dashboard',NULL,6,'2024-07-11 15:38:15'),(237,'dataentryform','form',6,'2024-07-11 15:54:55'),(238,'dashboard',NULL,6,'2024-07-11 15:59:19'),(239,'dataentryform','form',6,'2024-07-11 16:01:19'),(240,'module','role_function',6,'2024-07-11 16:02:54'),(241,'user_role','all',6,'2024-07-11 16:02:55'),(242,'district','all',6,'2024-07-11 16:02:56'),(243,'department','all',6,'2024-07-11 16:02:57'),(244,'dashboard',NULL,6,'2024-07-11 16:02:58'),(245,'district','all',6,'2024-07-11 16:03:00'),(246,'department','all',6,'2024-07-11 16:03:02'),(247,'user_role','all',6,'2024-07-11 16:03:03'),(248,'module','role_function',6,'2024-07-11 16:03:04'),(249,'module','all',6,'2024-07-11 16:03:10'),(250,'module','role_function',6,'2024-07-11 16:03:15'),(251,'module','all',6,'2024-07-11 16:03:16'),(252,'module','form',6,'2024-07-11 16:03:18'),(253,'module','role_function',6,'2024-07-11 16:04:09'),(254,'module','getForm',6,'2024-07-11 16:04:59'),(255,'module','getForm',6,'2024-07-11 16:05:02'),(256,'user','all',6,'2024-07-11 16:05:08'),(257,'staff','all',6,'2024-07-11 16:05:08'),(258,'dataentryform','form',6,'2024-07-11 16:05:09'),(259,'dashboard',NULL,6,'2024-07-11 16:05:10'),(260,'designation','all',6,'2024-07-11 16:05:11'),(261,'department','all',6,'2024-07-11 16:05:11'),(262,'user_role','all',6,'2024-07-11 16:05:13'),(263,'module','role_function',6,'2024-07-11 16:05:14'),(264,'user','all',6,'2024-07-11 16:05:16'),(265,'dataentryform','form',6,'2024-07-11 16:05:17'),(266,'dataentryform','getDetailFromContact',6,'2024-07-11 16:06:38'),(267,'dataentryform','getDetailFromContact',6,'2024-07-11 16:06:48'),(268,'dashboard',NULL,6,'2024-07-11 16:07:27'),(269,'travel','all',6,'2024-07-11 16:07:44'),(270,'dashboard',NULL,6,'2024-07-11 16:07:49'),(271,'travel','all',6,'2024-07-11 16:07:56'),(272,'dashboard',NULL,6,'2024-07-11 16:08:31'),(273,'dataentryform','all',6,'2024-07-11 16:08:33'),(274,'travel','all',6,'2024-07-11 16:08:39'),(275,'travel','all',6,'2024-07-11 16:15:39'),(276,'dashboard',NULL,6,'2024-07-11 16:35:40'),(277,'dataentryform','form',6,'2024-07-11 16:59:04'),(278,'dataentryform','form',6,'2024-07-11 18:22:02'),(279,'dataentryform','form',6,'2024-07-11 18:24:35'),(280,'dataentryform','form',6,'2024-07-11 18:25:46'),(281,'dataentryform','form',6,'2024-07-11 18:30:35'),(282,'dataentryform','form',6,'2024-07-11 18:31:25'),(283,'dataentryform','form',6,'2024-07-11 18:32:20'),(284,'dashboard',NULL,6,'2024-07-11 18:33:15'),(285,'dataentryform','all',6,'2024-07-11 18:33:18'),(286,'dataentryform','form',6,'2024-07-11 18:33:56'),(287,'dashboard',NULL,6,'2024-07-11 18:33:58'),(288,'staff','all',6,'2024-07-11 18:34:04'),(289,'dataentryform','form',6,'2024-07-11 18:34:06'),(290,'dashboard',NULL,6,'2024-07-11 18:34:10'),(291,'dataentryform','form',6,'2024-07-11 18:34:12'),(292,'dashboard',NULL,6,'2024-07-11 18:34:15'),(293,'district','all',6,'2024-07-11 18:34:30'),(294,'district','all',6,'2024-07-11 18:35:24'),(295,'district','all',6,'2024-07-11 18:35:37'),(296,'district','all',6,'2024-07-11 18:35:42'),(297,'district','all',6,'2024-07-11 18:35:48'),(298,'district','all',6,'2024-07-11 18:35:55'),(299,'district','all',6,'2024-07-11 18:36:09'),(300,'district','all',6,'2024-07-11 18:36:20'),(301,'district','all',6,'2024-07-11 18:36:23'),(302,'district','all',6,'2024-07-11 18:36:41'),(303,'district','all',6,'2024-07-11 18:36:44'),(304,'district','all',6,'2024-07-11 18:36:48'),(305,'district','all',6,'2024-07-11 18:36:50'),(306,'district','all',6,'2024-07-11 18:36:53'),(307,'district','all',6,'2024-07-11 18:36:55'),(308,'district','all',6,'2024-07-11 18:36:58'),(309,'district','all',6,'2024-07-11 18:37:04'),(310,'district','all',6,'2024-07-11 18:37:19'),(311,'district','all',6,'2024-07-11 18:37:23'),(312,'district','all',6,'2024-07-11 18:37:25'),(313,'district','all',6,'2024-07-11 18:37:25'),(314,'district','all',6,'2024-07-11 18:37:25'),(315,'district','all',6,'2024-07-11 18:37:26'),(316,'district','all',6,'2024-07-11 18:37:26'),(317,'district','all',6,'2024-07-11 18:37:26'),(318,'district','all',6,'2024-07-11 18:37:26'),(319,'district','all',6,'2024-07-11 18:37:27'),(320,'district','all',6,'2024-07-11 18:37:27'),(321,'dataentryform','form',6,'2024-07-11 18:38:10'),(322,'module','form',6,'2024-07-11 18:38:47'),(323,'module','form',6,'2024-07-11 18:38:49'),(324,'user_role','all',6,'2024-07-11 18:39:39'),(325,'district','all',6,'2024-07-11 18:39:40'),(326,'department','all',6,'2024-07-11 18:39:42'),(327,'designation','all',6,'2024-07-11 18:39:44'),(328,'dashboard',NULL,6,'2024-07-11 18:39:44'),(329,'dataentryform','form',6,'2024-07-11 18:45:49'),(330,'dataentryform','getDetailFromContact',6,'2024-07-11 18:45:59'),(331,'dataentryform','form',6,'2024-07-11 18:46:24'),(332,'dataentryform','getDetailFromContact',6,'2024-07-11 18:46:30'),(333,'dataentryform','getDetailFromContact',6,'2024-07-11 18:46:45'),(334,'dataentryform','form',6,'2024-07-11 18:49:05'),(335,'designation','all',6,'2024-07-11 18:49:34'),(336,'designation','form',6,'2024-07-11 18:49:35'),(337,'department','all',6,'2024-07-11 18:49:38'),(338,'department','form',6,'2024-07-11 18:49:40'),(339,'district','all',6,'2024-07-11 18:49:42'),(340,'district','form',6,'2024-07-11 18:49:43'),(341,'user_role','all',6,'2024-07-11 18:49:45'),(342,'user_role','form',6,'2024-07-11 18:49:46'),(343,'module','role_function',6,'2024-07-11 18:49:50'),(344,'user','all',6,'2024-07-11 18:49:51'),(345,'user','form',6,'2024-07-11 18:49:53'),(346,'staff','all',6,'2024-07-11 18:49:57'),(347,'staff','form',6,'2024-07-11 18:49:58'),(348,'dataentryform','form',6,'2024-07-11 18:50:17'),(349,'dashboard',NULL,6,'2024-07-11 18:53:45'),(350,'travel','all',6,'2024-07-11 18:53:47'),(351,'dataentryform','form',6,'2024-07-11 18:55:55'),(352,'dataentryform','form',6,'2024-07-11 18:55:56'),(353,'dataentryform','form',6,'2024-07-11 18:55:57'),(354,'dataentryform','form',6,'2024-07-11 19:00:25'),(355,'dashboard',NULL,6,'2024-07-11 19:01:03'),(356,'travel','all',6,'2024-07-11 19:01:05'),(357,'dataentryform','form',6,'2024-07-11 19:01:14'),(358,'dataentryform','form',6,'2024-07-11 19:08:32'),(359,'dataentryform','form',6,'2024-07-11 19:13:39'),(360,'dataentryform','form',6,'2024-07-11 19:17:32'),(361,'dataentryform','form',6,'2024-07-11 19:17:51'),(362,'dataentryform','form',6,'2024-07-11 19:19:28'),(363,'dataentryform','form',6,'2024-07-11 19:20:36'),(364,'dataentryform','form',6,'2024-07-11 19:24:35'),(365,'dataentryform','form',6,'2024-07-11 19:26:02'),(366,'dataentryform','form',6,'2024-07-11 19:26:55'),(367,'dataentryform','form',6,'2024-07-11 19:27:23'),(368,'dataentryform','form',6,'2024-07-11 19:27:35'),(369,'dataentryform','form',6,'2024-07-11 19:30:11'),(370,'dataentryform','form',6,'2024-07-11 19:30:18'),(371,'dataentryform','form',6,'2024-07-11 19:30:34'),(372,'dataentryform','form',6,'2024-07-11 19:31:35'),(373,'dataentryform','form',6,'2024-07-11 19:31:53'),(374,'dataentryform','form',6,'2024-07-11 19:33:13'),(375,'dataentryform','form',6,'2024-07-11 19:33:36'),(376,'dataentryform','form',6,'2024-07-11 19:35:00'),(377,'dataentryform','form',6,'2024-07-11 19:35:18'),(378,'dataentryform','form',6,'2024-07-11 19:37:24'),(379,'dataentryform','form',6,'2024-07-11 19:37:27'),(380,'dataentryform','form',6,'2024-07-11 19:37:28'),(381,'dataentryform','form',6,'2024-07-11 19:38:20'),(382,'dataentryform','form',6,'2024-07-11 19:38:32'),(383,'dataentryform','form',6,'2024-07-11 19:38:54'),(384,'dataentryform','form',6,'2024-07-11 19:39:14'),(385,'dataentryform','form',6,'2024-07-11 19:39:23'),(386,'dataentryform','form',6,'2024-07-11 19:39:30'),(387,'dataentryform','form',6,'2024-07-11 19:39:46'),(388,'dataentryform','form',6,'2024-07-11 19:40:08'),(389,'dataentryform','form',6,'2024-07-11 19:43:08'),(390,'dataentryform','form',6,'2024-07-11 19:43:31'),(391,'dataentryform','form',6,'2024-07-11 19:44:26'),(392,'dataentryform','form',6,'2024-07-11 19:44:34'),(393,'dataentryform','form',6,'2024-07-11 19:45:36'),(394,'dataentryform','form',6,'2024-07-11 19:45:56'),(395,'dataentryform','form',6,'2024-07-11 19:46:35'),(396,'dataentryform','form',6,'2024-07-11 19:46:59'),(397,'dataentryform','form',6,'2024-07-11 19:47:26'),(398,'dataentryform','form',6,'2024-07-11 19:47:35'),(399,'dataentryform','form',6,'2024-07-11 19:48:33'),(400,'dataentryform','form',6,'2024-07-11 19:48:43'),(401,'dataentryform','getDetailFromContact',6,'2024-07-11 19:48:51'),(402,'dataentryform','getDetailFromContact',6,'2024-07-11 19:49:02'),(403,'dataentryform','getDetailFromContact',6,'2024-07-11 19:49:11'),(404,'dataentryform','form',6,'2024-07-11 19:50:04'),(405,'dataentryform','form',6,'2024-07-11 19:50:23'),(406,'dataentryform','form',6,'2024-07-11 19:51:31'),(407,'dataentryform','form',6,'2024-07-11 19:51:51'),(408,'dataentryform','form',6,'2024-07-11 19:54:30'),(409,'dataentryform','form',6,'2024-07-11 19:54:42'),(410,'dataentryform','form',6,'2024-07-11 19:55:07'),(411,'dataentryform','form',6,'2024-07-11 19:55:14'),(412,'dataentryform','form',6,'2024-07-11 19:58:53'),(413,'dataentryform','form',6,'2024-07-11 19:59:30'),(414,'dataentryform','form',6,'2024-07-11 20:00:16'),(415,'dataentryform','form',6,'2024-07-11 20:00:29'),(416,'dataentryform','form',6,'2024-07-11 20:08:11'),(417,'dataentryform','form',6,'2024-07-11 20:08:13'),(418,'dataentryform','getDetailFromContact',6,'2024-07-11 20:08:17'),(419,'dataentryform','form',6,'2024-07-11 20:08:21'),(420,'dataentryform','getDetailFromContact',6,'2024-07-11 20:08:31'),(421,'dataentryform','form',6,'2024-07-11 20:09:22'),(422,'dataentryform','getDetailFromContact',6,'2024-07-11 20:09:26'),(423,'dataentryform','form',6,'2024-07-11 20:10:33'),(424,'dataentryform','getDetailFromContact',6,'2024-07-11 20:10:41'),(425,'dataentryform','getDetailFromContact',6,'2024-07-11 20:11:05'),(426,'dataentryform','getDetailFromContact',6,'2024-07-11 20:11:12'),(427,'dataentryform','form',6,'2024-07-11 20:12:23'),(428,'dataentryform','getDetailFromContact',6,'2024-07-11 20:12:30'),(429,'dataentryform','form',6,'2024-07-11 20:13:25'),(430,'dataentryform','getDetailFromContact',6,'2024-07-11 20:13:37'),(431,'dataentryform','form',6,'2024-07-11 20:16:58'),(432,'dataentryform','getDetailFromContact',6,'2024-07-11 20:17:06'),(433,'dataentryform','form',6,'2024-07-11 20:18:48'),(434,'dataentryform','getDetailFromContact',6,'2024-07-11 20:18:53'),(435,'dataentryform','form',6,'2024-07-11 20:19:06'),(436,'dataentryform','getDetailFromContact',6,'2024-07-11 20:19:13'),(437,'dataentryform','form',6,'2024-07-11 20:21:36'),(438,'dataentryform','getDetailFromContact',6,'2024-07-11 20:21:44'),(439,'dataentryform','form',6,'2024-07-11 20:23:39'),(440,'dataentryform','getDetailFromContact',6,'2024-07-11 20:23:45'),(441,'dataentryform','form',6,'2024-07-11 20:24:43'),(442,'dataentryform','getDetailFromContact',6,'2024-07-11 20:24:47'),(443,'dataentryform','form',6,'2024-07-11 20:27:52'),(444,'dataentryform','getDetailFromContact',6,'2024-07-11 20:27:58'),(445,'dataentryform','form',6,'2024-07-11 20:28:57'),(446,'dataentryform','form',6,'2024-07-11 20:29:05'),(447,'dataentryform','getDetailFromContact',6,'2024-07-11 20:29:10'),(448,'dataentryform','form',6,'2024-07-11 20:31:15'),(449,'dataentryform','getDetailFromContact',6,'2024-07-11 20:31:20'),(450,'dataentryform','getDetailFromContact',6,'2024-07-11 20:31:49'),(451,'dataentryform','getDetailFromContact',6,'2024-07-11 20:33:03'),(452,'dataentryform','form',6,'2024-07-11 20:33:08'),(453,'dataentryform','getDetailFromContact',6,'2024-07-11 20:33:19'),(454,'dataentryform','getDetailFromContact',6,'2024-07-11 20:33:22'),(455,'dataentryform','form',6,'2024-07-11 20:42:10'),(456,'dataentryform','getDetailFromContact',6,'2024-07-11 20:42:16'),(457,'dataentryform','getDetailFromContact',6,'2024-07-11 20:42:25'),(458,'dataentryform','getDetailFromContact',6,'2024-07-11 20:42:27'),(459,'dataentryform','getDetailFromContact',6,'2024-07-11 20:42:30'),(460,'dataentryform','form',6,'2024-07-11 20:44:38'),(461,'dataentryform','getDetailFromContact',6,'2024-07-11 20:44:44'),(462,'dataentryform','getDetailFromContact',6,'2024-07-11 20:44:52'),(463,'dataentryform','getDetailFromContact',6,'2024-07-11 20:44:57'),(464,'dataentryform','getDetailFromContact',6,'2024-07-11 20:45:27'),(465,'dataentryform','getDetailFromContact',6,'2024-07-11 20:45:32'),(466,'dataentryform','getDetailFromContact',6,'2024-07-11 20:45:38'),(467,'dataentryform','form',6,'2024-07-11 20:45:43'),(468,'dataentryform','getDetailFromContact',6,'2024-07-11 20:45:47'),(469,'dataentryform','getDetailFromContact',6,'2024-07-11 20:45:51'),(470,'dataentryform','form',6,'2024-07-11 20:46:19'),(471,'dataentryform','getDetailFromContact',6,'2024-07-11 20:46:24'),(472,'dataentryform','getDetailFromContact',6,'2024-07-11 20:46:27'),(473,'dataentryform','form',6,'2024-07-11 20:47:18'),(474,'dataentryform','getDetailFromContact',6,'2024-07-11 20:47:24'),(475,'dataentryform','getDetailFromContact',6,'2024-07-11 20:47:38'),(476,'dataentryform','getDetailFromContact',6,'2024-07-11 20:47:44'),(477,'dataentryform','getDetailFromContact',6,'2024-07-11 20:48:15'),(478,'dataentryform','getDetailFromContact',6,'2024-07-11 20:48:24'),(479,'dataentryform','form',6,'2024-07-11 20:48:47'),(480,'dataentryform','form',6,'2024-07-11 20:49:09'),(481,'dataentryform','form',6,'2024-07-11 20:49:09'),(482,'dataentryform','form',6,'2024-07-11 20:49:10'),(483,'dataentryform','form',6,'2024-07-11 20:49:11'),(484,'dataentryform','getDetailFromContact',6,'2024-07-11 20:49:18'),(485,'dataentryform','form',6,'2024-07-11 20:50:32'),(486,'dataentryform','getDetailFromContact',6,'2024-07-11 20:50:39'),(487,'dataentryform','getDetailFromContact',6,'2024-07-11 20:50:44'),(488,'dataentryform','form',6,'2024-07-11 20:51:38'),(489,'dataentryform','getDetailFromContact',6,'2024-07-11 20:51:46'),(490,'dataentryform','getDetailFromContact',6,'2024-07-11 20:51:59'),(491,'dataentryform','form',6,'2024-07-11 20:56:07'),(492,'dataentryform','getDetailFromContact',6,'2024-07-11 20:56:12'),(493,'dataentryform','form',6,'2024-07-11 20:56:38'),(494,'dataentryform','getDetailFromContact',6,'2024-07-11 20:56:45'),(495,'dashboard',NULL,6,'2024-07-11 20:57:00'),(496,'dataentryform','form',6,'2024-07-11 20:57:20'),(497,'dashboard',NULL,6,'2024-07-11 20:57:23'),(498,'dataentryform','form',6,'2024-07-11 20:57:26'),(499,'dataentryform','form',6,'2024-07-11 20:57:38'),(500,'dataentryform','getDetailFromContact',6,'2024-07-11 20:57:46'),(501,'dataentryform','getDetailFromContact',6,'2024-07-11 20:57:48'),(502,'dataentryform','form',6,'2024-07-11 20:58:02'),(503,'dataentryform','form',6,'2024-07-11 20:58:16'),(504,'dataentryform','getDetailFromContact',6,'2024-07-11 20:58:35'),(505,'dataentryform','getDetailFromContact',6,'2024-07-11 20:59:04'),(506,'dataentryform','getDetailFromContact',6,'2024-07-11 20:59:08'),(507,'dataentryform','getDetailFromContact',6,'2024-07-11 20:59:12'),(508,'dataentryform','form',6,'2024-07-11 21:00:20'),(509,'dataentryform','form',6,'2024-07-11 21:07:10'),(510,'dataentryform','getDetailFromContact',6,'2024-07-11 21:07:18'),(511,'dataentryform','getDetailFromContact',6,'2024-07-11 21:07:22'),(512,'dataentryform','getDetailFromContact',6,'2024-07-11 21:08:13'),(513,'dataentryform','getDetailFromContact',6,'2024-07-11 21:08:22'),(514,'dataentryform','form',6,'2024-07-11 21:11:28'),(515,'dataentryform','getDetailFromContact',6,'2024-07-11 21:11:36'),(516,'dataentryform','getDetailFromContact',6,'2024-07-11 21:11:42'),(517,'dataentryform','getDetailFromContact',6,'2024-07-11 21:11:47'),(518,'dashboard',NULL,6,'2024-07-11 21:12:50'),(519,'travel','all',6,'2024-07-11 21:12:52'),(520,'dataentryform','form',6,'2024-07-11 21:13:21'),(521,'dashboard',NULL,6,'2024-07-11 21:13:23'),(522,'dataentryform','form',6,'2024-07-11 21:13:25'),(523,'dataentryform','getDetailFromContact',6,'2024-07-11 21:13:30'),(524,'dashboard',NULL,6,'2024-07-11 21:13:38'),(525,'travel','all',6,'2024-07-11 21:13:40'),(526,'dataentryform','getDetailFromContact',6,'2024-07-11 21:14:01'),(527,'dashboard',NULL,6,'2024-07-11 21:14:13'),(528,'travel','all',6,'2024-07-11 21:14:15'),(529,'dataentryform','form',6,'2024-07-11 21:19:44'),(530,'dataentryform','getDetailFromContact',6,'2024-07-11 21:19:50'),(531,'dataentryform','form',6,'2024-07-11 21:21:57'),(532,'dataentryform','getDetailFromContact',6,'2024-07-11 21:22:04'),(533,'dataentryform','getDetailFromContact',6,'2024-07-11 21:22:06'),(534,'dataentryform','form',6,'2024-07-11 21:24:21'),(535,'dataentryform','getDetailFromContact',6,'2024-07-11 21:24:28'),(536,'dataentryform','form',6,'2024-07-11 21:24:31'),(537,'dataentryform','getDetailFromContact',6,'2024-07-11 21:24:36'),(538,'dataentryform','getDetailFromContact',6,'2024-07-11 21:24:44'),(539,'dataentryform','getDetailFromContact',6,'2024-07-11 21:24:50'),(540,'dataentryform','form',6,'2024-07-11 21:26:35'),(541,'dataentryform','getDetailFromContact',6,'2024-07-11 21:26:46'),(542,'dataentryform','form',6,'2024-07-11 21:27:53'),(543,'dataentryform','getDetailFromContact',6,'2024-07-11 21:28:04'),(544,'dataentryform','form',6,'2024-07-11 21:28:14'),(545,'dataentryform','getDetailFromContact',6,'2024-07-11 21:28:26'),(546,'dataentryform','getDetailFromContact',6,'2024-07-11 21:28:56'),(547,'dataentryform','form',6,'2024-07-11 21:29:05'),(548,'dataentryform','getDetailFromContact',6,'2024-07-11 21:29:13'),(549,'dataentryform','form',6,'2024-07-11 21:29:44'),(550,'dataentryform','getDetailFromContact',6,'2024-07-11 21:29:52'),(551,'dataentryform','getDetailFromContact',6,'2024-07-11 21:29:57'),(552,'dataentryform','getDetailFromContact',6,'2024-07-11 21:30:01'),(553,'dataentryform','form',6,'2024-07-11 21:32:21'),(554,'dataentryform','getDetailFromContact',6,'2024-07-11 21:32:27'),(555,'dataentryform','getDetailFromContact',6,'2024-07-11 21:32:35'),(556,'dataentryform','form',6,'2024-07-11 21:34:22'),(557,'dataentryform','getDetailFromContact',6,'2024-07-11 21:34:29'),(558,'dataentryform','form',6,'2024-07-11 21:35:05'),(559,'dataentryform','getDetailFromContact',6,'2024-07-11 21:35:12'),(560,'dataentryform','getDetailFromContact',6,'2024-07-11 21:35:16'),(561,'dataentryform','form',6,'2024-07-11 21:39:51'),(562,'dataentryform','getDetailFromContact',6,'2024-07-11 21:39:56'),(563,'dataentryform','getDetailFromContact',6,'2024-07-11 21:40:00'),(564,'dataentryform','getDetailFromContact',6,'2024-07-11 21:40:03'),(565,'dashboard',NULL,6,'2024-07-11 21:42:09'),(566,'dashboard',NULL,6,'2024-07-12 02:11:31'),(567,'dataentryform','form',6,'2024-07-12 02:11:34'),(568,'dataentryform','getDetailFromContact',6,'2024-07-12 02:11:46'),(569,'dataentryform','form',6,'2024-07-12 02:42:52'),(570,'dataentryform','form',6,'2024-07-12 02:43:35'),(571,'dataentryform','form',6,'2024-07-12 02:43:48'),(572,'dataentryform','form',6,'2024-07-12 02:44:01'),(573,'dataentryform','getDetailFromContact',6,'2024-07-12 02:44:05'),(574,'dataentryform','form',6,'2024-07-12 02:44:39'),(575,'dataentryform','getDetailFromContact',6,'2024-07-12 02:44:48'),(576,'dataentryform','form',6,'2024-07-12 02:45:38'),(577,'dataentryform','getDetailFromContact',6,'2024-07-12 02:45:43'),(578,'dataentryform','form',6,'2024-07-12 02:46:33'),(579,'dataentryform','form',6,'2024-07-12 02:46:44'),(580,'dataentryform','getDetailFromContact',6,'2024-07-12 02:46:50'),(581,'dataentryform','form',6,'2024-07-12 02:50:17'),(582,'dataentryform','getDetailFromContact',6,'2024-07-12 02:50:22'),(583,'dataentryform','form',6,'2024-07-12 02:50:53'),(584,'dataentryform','getDetailFromContact',6,'2024-07-12 02:50:59'),(585,'dataentryform','form',6,'2024-07-12 02:58:31'),(586,'dataentryform','getDetailFromContact',6,'2024-07-12 02:58:38'),(587,'dataentryform','getDetailFromContact',6,'2024-07-12 02:59:13'),(588,'dataentryform','form',6,'2024-07-12 03:07:38'),(589,'dataentryform','form',6,'2024-07-12 03:08:04'),(590,'dataentryform','form',6,'2024-07-12 03:10:39'),(591,'dataentryform','getDetailFromContact',6,'2024-07-12 03:10:49'),(592,'dataentryform','getDetailFromContact',6,'2024-07-12 03:11:03'),(593,'dataentryform','getDetailFromContact',6,'2024-07-12 03:11:11'),(594,'dataentryform','form',6,'2024-07-12 03:12:04'),(595,'dataentryform','getDetailFromContact',6,'2024-07-12 03:12:11'),(596,'dataentryform','form',6,'2024-07-12 03:14:21'),(597,'dataentryform','getDetailFromContact',6,'2024-07-12 03:14:28'),(598,'dataentryform','form',6,'2024-07-12 03:19:43'),(599,'dashboard',NULL,6,'2024-07-12 03:19:44'),(600,'dataentryform','form',6,'2024-07-12 03:19:45'),(601,'dataentryform','form',6,'2024-07-12 03:19:48'),(602,'dataentryform','getDetailFromContact',6,'2024-07-12 03:19:52'),(603,'dataentryform','form',6,'2024-07-12 03:21:43'),(604,'dataentryform','getDetailFromContact',6,'2024-07-12 03:21:48'),(605,'dataentryform','form',6,'2024-07-12 03:23:54'),(606,'dataentryform','getDetailFromContact',6,'2024-07-12 03:24:00'),(607,'dashboard',NULL,6,'2024-07-12 11:18:47'),(608,'dataentryform','form',6,'2024-07-12 11:18:50'),(609,'dataentryform','form',6,'2024-07-12 11:27:18'),(610,'dataentryform','getDetailFromContact',6,'2024-07-12 11:27:33'),(611,'dataentryform','getDetailFromContact',6,'2024-07-12 11:30:51'),(612,'dataentryform','form',6,'2024-07-12 11:31:36'),(613,'dataentryform','getDetailFromContact',6,'2024-07-12 11:31:40'),(614,'dataentryform','getDetailFromContact',6,'2024-07-12 11:31:46'),(615,'dataentryform','getDetailFromContact',6,'2024-07-12 11:32:44'),(616,'dataentryform','getDetailFromContact',6,'2024-07-12 11:32:57'),(617,'dataentryform','getDetailFromContact',6,'2024-07-12 11:33:15'),(618,'dataentryform','form',6,'2024-07-12 11:34:42'),(619,'dataentryform','getDetailFromContact',6,'2024-07-12 11:35:22'),(620,'dataentryform','getDetailFromContact',6,'2024-07-12 11:35:40'),(621,'dataentryform','form',6,'2024-07-12 11:36:24'),(622,'dashboard',NULL,6,'2024-07-14 10:30:24'),(623,'dataentryform','form',6,'2024-07-14 10:30:28'),(624,'dataentryform','form',6,'2024-07-14 10:31:38'),(625,'dataentryform','form',6,'2024-07-14 10:33:41'),(626,'dataentryform','form',6,'2024-07-14 10:34:08'),(627,'dataentryform','form',6,'2024-07-14 10:36:37'),(628,'dataentryform','form',6,'2024-07-14 10:36:54'),(629,'dataentryform','form',6,'2024-07-14 10:37:04'),(630,'dataentryform','form',6,'2024-07-14 10:40:04'),(631,'dataentryform','form',6,'2024-07-14 10:40:28'),(632,'dataentryform','form',6,'2024-07-14 10:41:10'),(633,'dataentryform','form',6,'2024-07-14 10:41:37'),(634,'dataentryform','form',6,'2024-07-14 10:43:27'),(635,'dataentryform','form',6,'2024-07-14 10:43:49'),(636,'dataentryform','form',6,'2024-07-14 10:43:52'),(637,'dataentryform','form',6,'2024-07-14 10:45:26'),(638,'dataentryform','form',6,'2024-07-14 10:45:40'),(639,'dataentryform','form',6,'2024-07-14 10:46:09'),(640,'dataentryform','form',6,'2024-07-14 10:46:23'),(641,'dataentryform','form',6,'2024-07-14 10:49:10'),(642,'dataentryform','form',6,'2024-07-14 10:50:25'),(643,'dataentryform','form',6,'2024-07-14 10:51:19'),(644,'dataentryform','form',6,'2024-07-14 10:54:45'),(645,'dataentryform','form',6,'2024-07-14 10:54:48'),(646,'dataentryform','getDetailFromContact',6,'2024-07-14 10:54:53'),(647,'dataentryform','form',6,'2024-07-14 10:57:17'),(648,'dataentryform','getDetailFromContact',6,'2024-07-14 10:57:24'),(649,'dataentryform','form',6,'2024-07-14 10:58:43'),(650,'dataentryform','getDetailFromContact',6,'2024-07-14 10:58:49'),(651,'dataentryform','form',6,'2024-07-14 11:00:13'),(652,'dataentryform','getDetailFromContact',6,'2024-07-14 11:01:44'),(653,'dataentryform','form',6,'2024-07-14 11:02:05'),(654,'dataentryform','getDetailFromContact',6,'2024-07-14 11:02:21'),(655,'dataentryform','form',6,'2024-07-14 11:03:15'),(656,'dataentryform','form',6,'2024-07-14 11:03:35'),(657,'dataentryform','getDetailFromContact',6,'2024-07-14 11:03:41'),(658,'dataentryform','form',6,'2024-07-14 11:03:53'),(659,'dataentryform','form',6,'2024-07-14 11:10:53'),(660,'dataentryform','getDetailFromContact',6,'2024-07-14 11:11:08'),(661,'dataentryform','form',6,'2024-07-14 11:11:21'),(662,'dataentryform','getDetailFromContact',6,'2024-07-14 11:11:39'),(663,'dataentryform','form',6,'2024-07-14 11:15:46'),(664,'dataentryform','getDetailFromContact',6,'2024-07-14 11:15:57'),(665,'dataentryform','getDetailFromContact',6,'2024-07-14 11:16:09'),(666,'dataentryform','form',6,'2024-07-14 11:16:34'),(667,'dataentryform','getDetailFromContact',6,'2024-07-14 11:16:41'),(668,'dataentryform','getDetailFromContact',6,'2024-07-14 11:16:45'),(669,'dataentryform','getDetailFromContact',6,'2024-07-14 11:16:53'),(670,'dataentryform','getDetailFromContact',6,'2024-07-14 11:17:01'),(671,'dataentryform','form',6,'2024-07-14 11:17:13'),(672,'dataentryform','getDetailFromContact',6,'2024-07-14 11:17:20'),(673,'dataentryform','getDetailFromContact',6,'2024-07-14 11:17:24'),(674,'dataentryform','form',6,'2024-07-14 11:32:02'),(675,'dataentryform','getDetailFromContact',6,'2024-07-14 11:32:08'),(676,'dataentryform','form',6,'2024-07-14 11:33:06'),(677,'dataentryform','getDetailFromContact',6,'2024-07-14 11:33:12'),(678,'dataentryform','form',6,'2024-07-14 11:35:21'),(679,'dataentryform','getDetailFromContact',6,'2024-07-14 11:35:29'),(680,'dataentryform','form',6,'2024-07-14 11:35:42'),(681,'dataentryform','form',6,'2024-07-14 11:35:43'),(682,'dataentryform','form',6,'2024-07-14 11:35:44'),(683,'dataentryform','form',6,'2024-07-14 11:35:44'),(684,'dataentryform','getDetailFromContact',6,'2024-07-14 11:35:53'),(685,'dataentryform','getDetailFromContact',6,'2024-07-14 11:36:07'),(686,'dataentryform','getDetailFromContact',6,'2024-07-14 11:37:00'),(687,'dataentryform','form',6,'2024-07-14 11:38:33'),(688,'dataentryform','getDetailFromContact',6,'2024-07-14 11:38:43'),(689,'dataentryform','getDetailFromContact',6,'2024-07-14 11:40:32'),(690,'dataentryform','form',6,'2024-07-14 11:41:14'),(691,'dataentryform','getDetailFromContact',6,'2024-07-14 11:41:27'),(692,'dataentryform','form',6,'2024-07-14 11:42:20'),(693,'dataentryform','getDetailFromContact',6,'2024-07-14 11:42:25'),(694,'dataentryform','getDetailFromContact',6,'2024-07-14 11:42:34'),(695,'dataentryform','form',6,'2024-07-14 11:43:01'),(696,'dataentryform','getDetailFromContact',6,'2024-07-14 11:43:13'),(697,'dataentryform','getDetailFromContact',6,'2024-07-14 11:43:19'),(698,'dataentryform','getDetailFromContact',6,'2024-07-14 11:43:23'),(699,'dataentryform','form',6,'2024-07-14 11:43:39'),(700,'dataentryform','getDetailFromContact',6,'2024-07-14 11:43:45'),(701,'dataentryform','form',6,'2024-07-14 11:44:05'),(702,'dataentryform','getDetailFromContact',6,'2024-07-14 11:44:12'),(703,'dataentryform','getDetailFromContact',6,'2024-07-14 11:44:17'),(704,'dataentryform','form',6,'2024-07-14 11:44:37'),(705,'dataentryform','getDetailFromContact',6,'2024-07-14 11:44:43'),(706,'dataentryform','getDetailFromContact',6,'2024-07-14 11:44:48'),(707,'dataentryform','form',6,'2024-07-14 11:48:40'),(708,'dataentryform','getDetailFromContact',6,'2024-07-14 11:48:52'),(709,'dataentryform','form',6,'2024-07-14 11:50:03'),(710,'dataentryform','getDetailFromContact',6,'2024-07-14 11:50:21'),(711,'dataentryform','getDetailFromContact',6,'2024-07-14 11:50:34'),(712,'dataentryform','form',6,'2024-07-14 11:51:05'),(713,'dataentryform','getDetailFromContact',6,'2024-07-14 11:51:13'),(714,'dataentryform','getDetailFromContact',6,'2024-07-14 11:51:22'),(715,'dataentryform','getDetailFromContact',6,'2024-07-14 11:51:27'),(716,'dataentryform','getDetailFromContact',6,'2024-07-14 11:51:32'),(717,'dataentryform','getDetailFromContact',6,'2024-07-14 11:51:35'),(718,'dataentryform','getDetailFromContact',6,'2024-07-14 11:51:42'),(719,'dataentryform','getDetailFromContact',6,'2024-07-14 11:51:45'),(720,'dataentryform','getDetailFromContact',6,'2024-07-14 11:51:49'),(721,'dataentryform','getDetailFromContact',6,'2024-07-14 11:51:51'),(722,'dataentryform','getDetailFromContact',6,'2024-07-14 11:52:32'),(723,'dataentryform','getDetailFromContact',6,'2024-07-14 11:52:36'),(724,'dataentryform','getDetailFromContact',6,'2024-07-14 11:52:42'),(725,'dataentryform','getDetailFromContact',6,'2024-07-14 11:52:51'),(726,'dataentryform','form',6,'2024-07-14 11:54:46'),(727,'dataentryform','getDetailFromContact',6,'2024-07-14 11:54:51'),(728,'dataentryform','getDetailFromContact',6,'2024-07-14 11:54:56'),(729,'dataentryform','getDetailFromContact',6,'2024-07-14 11:55:00'),(730,'dataentryform','getDetailFromContact',6,'2024-07-14 11:57:29'),(731,'dataentryform','form',6,'2024-07-14 11:57:31'),(732,'dataentryform','getDetailFromContact',6,'2024-07-14 11:57:36'),(733,'dataentryform','getDetailFromContact',6,'2024-07-14 11:57:38'),(734,'dataentryform','getDetailFromContact',6,'2024-07-14 11:57:50'),(735,'dataentryform','getDetailFromContact',6,'2024-07-14 11:58:00'),(736,'dataentryform','getDetailFromContact',6,'2024-07-14 11:58:03'),(737,'dataentryform','form',6,'2024-07-14 11:58:25'),(738,'dataentryform','getDetailFromContact',6,'2024-07-14 11:58:29'),(739,'dataentryform','getDetailFromContact',6,'2024-07-14 11:58:33'),(740,'dataentryform','getDetailFromContact',6,'2024-07-14 11:58:35'),(741,'dataentryform','getDetailFromContact',6,'2024-07-14 11:58:37'),(742,'dataentryform','getDetailFromContact',6,'2024-07-14 11:58:44'),(743,'dataentryform','form',6,'2024-07-14 11:59:12'),(744,'dataentryform','getDetailFromContact',6,'2024-07-14 11:59:27'),(745,'dataentryform','form',6,'2024-07-14 11:59:37'),(746,'dataentryform','getDetailFromContact',6,'2024-07-14 11:59:43'),(747,'dataentryform','form',6,'2024-07-14 11:59:56'),(748,'dataentryform','getDetailFromContact',6,'2024-07-14 12:00:03'),(749,'dataentryform','form',6,'2024-07-14 12:00:31'),(750,'dataentryform','form',6,'2024-07-14 12:00:32'),(751,'dataentryform','getDetailFromContact',6,'2024-07-14 12:00:37'),(752,'dataentryform','getDetailFromContact',6,'2024-07-14 12:00:40'),(753,'dataentryform','getDetailFromContact',6,'2024-07-14 12:00:42'),(754,'dataentryform','getDetailFromContact',6,'2024-07-14 12:00:45'),(755,'dataentryform','form',6,'2024-07-14 12:01:19'),(756,'dataentryform','getDetailFromContact',6,'2024-07-14 12:01:24'),(757,'dataentryform','form',6,'2024-07-14 12:04:31'),(758,'dataentryform','getDetailFromContact',6,'2024-07-14 12:04:51'),(759,'dataentryform','getDetailFromContact',6,'2024-07-14 12:05:08'),(760,'dataentryform','getDetailFromContact',6,'2024-07-14 12:05:14'),(761,'dataentryform','form',6,'2024-07-14 12:06:17'),(762,'dataentryform','getDetailFromContact',6,'2024-07-14 12:06:24'),(763,'dataentryform','form',6,'2024-07-14 12:07:00'),(764,'dataentryform','getDetailFromContact',6,'2024-07-14 12:07:04'),(765,'dataentryform','form',6,'2024-07-14 12:07:52'),(766,'dataentryform','getDetailFromContact',6,'2024-07-14 12:07:57'),(767,'dashboard',NULL,6,'2024-07-14 12:10:13'),(768,'travel','all',6,'2024-07-14 12:12:44'),(769,'dashboard',NULL,6,'2024-07-14 12:12:45'),(770,'dataentryform','form',6,'2024-07-14 12:12:58'),(771,'dashboard',NULL,6,'2024-07-14 15:19:37'),(772,'dataentryform','form',6,'2024-07-14 15:19:44'),(773,'dataentryform','getDetailFromContact',6,'2024-07-14 15:23:19'),(774,'dataentryform','getDetailFromContact',6,'2024-07-14 15:23:22'),(775,'dataentryform','form',6,'2024-07-14 15:23:24'),(776,'dataentryform','getDetailFromContact',6,'2024-07-14 15:23:29'),(777,'dataentryform','form',6,'2024-07-14 15:23:33'),(778,'dashboard',NULL,6,'2024-07-14 15:25:34'),(779,'travel','all',6,'2024-07-14 15:25:35'),(780,'dataentryform','form',6,'2024-07-14 15:28:15'),(781,'dataentryform','form',6,'2024-07-14 15:28:50'),(782,'dataentryform','form',6,'2024-07-14 15:50:01'),(783,'dataentryform','form',6,'2024-07-14 15:50:33'),(784,'dataentryform','form',6,'2024-07-14 15:58:13'),(785,'dataentryform','form',6,'2024-07-14 16:15:47'),(786,'dataentryform','form',6,'2024-07-14 16:27:53'),(787,'dataentryform','form',6,'2024-07-14 16:30:55'),(788,'dataentryform','form',6,'2024-07-14 16:31:57'),(789,'dataentryform','form',6,'2024-07-14 16:37:19'),(790,'dataentryform','getDetailFromContact',6,'2024-07-14 16:37:25'),(791,'dataentryform','getDetailFromContact',6,'2024-07-14 16:41:08'),(792,'dataentryform','getDetailFromContact',6,'2024-07-14 16:41:11'),(793,'dataentryform','form',6,'2024-07-14 16:43:04'),(794,'dataentryform','getDetailFromContact',6,'2024-07-14 16:43:10'),(795,'dataentryform','getDetailFromContact',6,'2024-07-14 16:43:27'),(796,'dataentryform','form',6,'2024-07-14 16:43:42'),(797,'dataentryform','form',6,'2024-07-14 16:44:20'),(798,'dataentryform','form',6,'2024-07-14 16:44:57'),(799,'dashboard',NULL,6,'2024-07-14 16:45:01'),(800,'dataentryform','form',6,'2024-07-14 16:59:52'),(801,'dashboard',NULL,6,'2024-07-14 17:00:33'),(802,'travel','all',6,'2024-07-14 17:03:43'),(803,'dashboard',NULL,6,'2024-07-14 17:03:48'),(804,'dataentryform','all',6,'2024-07-14 17:03:50'),(805,'dashboard',NULL,6,'2024-07-14 17:03:53'),(806,'travel','all',6,'2024-07-14 17:03:55'),(807,'dashboard',NULL,6,'2024-07-14 17:05:06'),(808,'dataentryform','all',6,'2024-07-14 17:05:07'),(809,'travel','all',6,'2024-07-14 17:09:56'),(810,'dashboard',NULL,6,'2024-07-14 17:10:04'),(811,'dataentryform','form',6,'2024-07-14 17:10:07'),(812,'dataentryform','getDetailFromContact',6,'2024-07-14 17:10:17'),(813,'dataentryform','form',6,'2024-07-14 17:11:33'),(814,'dataentryform','getDetailFromContact',6,'2024-07-14 17:11:42'),(815,'dataentryform','getDetailFromContact',6,'2024-07-14 17:11:50'),(816,'dataentryform','getDetailFromContact',6,'2024-07-14 17:11:57'),(817,'dataentryform','getDetailFromContact',6,'2024-07-14 17:12:01'),(818,'dataentryform','form',6,'2024-07-14 17:12:41'),(819,'dataentryform','getDetailFromContact',6,'2024-07-14 17:12:45'),(820,'dataentryform','form',6,'2024-07-14 17:22:14'),(821,'dataentryform','all',6,'2024-07-14 17:22:14'),(822,'travel','all',6,'2024-07-14 17:22:19'),(823,'dataentryform','form',6,'2024-07-14 17:23:53'),(824,'dataentryform','getDetailFromContact',6,'2024-07-14 17:23:59'),(825,'dataentryform','form',6,'2024-07-14 17:26:08'),(826,'dataentryform','getDetailFromContact',6,'2024-07-14 17:26:17'),(827,'dataentryform','form',6,'2024-07-14 17:32:22'),(828,'dataentryform','getDetailFromContact',6,'2024-07-14 17:32:28'),(829,'dataentryform','form',6,'2024-07-14 17:34:32'),(830,'dataentryform','all',6,'2024-07-14 17:34:32'),(831,'travel','all',6,'2024-07-14 17:34:46'),(832,'dataentryform','form',6,'2024-07-14 17:35:25'),(833,'dataentryform','form',6,'2024-07-14 17:38:06'),(834,'dataentryform','getDetailFromContact',6,'2024-07-14 17:38:11'),(835,'dataentryform','form',6,'2024-07-14 17:39:01'),(836,'dataentryform','form',6,'2024-07-14 17:39:18'),(837,'dataentryform','form',6,'2024-07-14 17:40:05'),(838,'dataentryform','getDetailFromContact',6,'2024-07-14 17:40:11'),(839,'dataentryform','form',6,'2024-07-14 17:41:14'),(840,'dataentryform','form',6,'2024-07-14 17:44:28'),(841,'dataentryform','getDetailFromContact',6,'2024-07-14 17:44:42'),(842,'dataentryform','form',6,'2024-07-14 18:01:56'),(843,'dataentryform','getDetailFromContact',6,'2024-07-14 18:03:34'),(844,'dataentryform','form',6,'2024-07-14 18:09:02'),(845,'dataentryform','form',6,'2024-07-14 18:17:44'),(846,'dataentryform','getDetailFromContact',6,'2024-07-14 18:17:49'),(847,'dataentryform','getDetailFromContact',6,'2024-07-14 18:18:07'),(848,'dataentryform','getDetailFromContact',6,'2024-07-14 18:18:17'),(849,'dataentryform','form',6,'2024-07-14 18:24:24'),(850,'dataentryform','getDetailFromContact',6,'2024-07-14 18:24:37'),(851,'dataentryform','form',6,'2024-07-14 18:27:05'),(852,'dataentryform','form',6,'2024-07-14 18:27:26'),(853,'dataentryform','all',6,'2024-07-14 18:27:26'),(854,'travel','all',6,'2024-07-14 18:27:31'),(855,'dataentryform','form',6,'2024-07-14 18:28:14'),(856,'dataentryform','getDetailFromContact',6,'2024-07-14 18:28:24'),(857,'dataentryform','getDetailFromContact',6,'2024-07-14 18:29:04'),(858,'dataentryform','form',6,'2024-07-14 18:29:10'),(859,'dataentryform','getDetailFromContact',6,'2024-07-14 18:29:15'),(860,'dataentryform','getDetailFromContact',6,'2024-07-14 18:29:27'),(861,'dataentryform','getDetailFromContact',6,'2024-07-14 18:29:37'),(862,'dataentryform','getDetailFromContact',6,'2024-07-14 18:29:51'),(863,'dataentryform','form',6,'2024-07-14 18:31:30'),(864,'dataentryform','getDetailFromContact',6,'2024-07-14 18:31:36'),(865,'dataentryform','form',6,'2024-07-14 18:31:41'),(866,'dataentryform','getDetailFromContact',6,'2024-07-14 18:31:45'),(867,'dataentryform','form',6,'2024-07-14 18:31:49'),(868,'dataentryform','getDetailFromContact',6,'2024-07-14 18:31:54'),(869,'dataentryform','getDetailFromContact',6,'2024-07-14 18:32:22'),(870,'dataentryform','getDetailFromContact',6,'2024-07-14 18:32:27'),(871,'dataentryform','getDetailFromContact',6,'2024-07-14 18:32:38'),(872,'dataentryform','getDetailFromContact',6,'2024-07-14 18:32:40'),(873,'dataentryform','getDetailFromContact',6,'2024-07-14 18:32:52'),(874,'dataentryform','form',6,'2024-07-14 18:33:52'),(875,'dataentryform','getDetailFromContact',6,'2024-07-14 18:33:58'),(876,'dataentryform','getDetailFromContact',6,'2024-07-14 18:34:01'),(877,'dataentryform','form',6,'2024-07-14 18:34:57'),(878,'dataentryform','getDetailFromContact',6,'2024-07-14 18:35:02'),(879,'dataentryform','form',6,'2024-07-14 18:36:52'),(880,'dataentryform','all',6,'2024-07-14 18:36:52'),(881,'travel','all',6,'2024-07-14 18:36:55'),(882,'dataentryform','form',6,'2024-07-14 18:37:17'),(883,'dataentryform','getDetailFromContact',6,'2024-07-14 18:37:22'),(884,'dataentryform','form',6,'2024-07-14 18:39:06'),(885,'dataentryform','getDetailFromContact',6,'2024-07-14 18:39:13'),(886,'dataentryform','form',6,'2024-07-14 18:39:48'),(887,'dataentryform','all',6,'2024-07-14 18:39:48'),(888,'travel','all',6,'2024-07-14 18:39:52'),(889,'dataentryform','form',6,'2024-07-14 18:40:06'),(890,'dataentryform','getDetailFromContact',6,'2024-07-14 18:40:11'),(891,'dataentryform','getDetailFromContact',6,'2024-07-14 18:40:15'),(892,'dataentryform','form',6,'2024-07-14 18:41:13'),(893,'dataentryform','getDetailFromContact',6,'2024-07-14 18:41:20'),(894,'dataentryform','form',6,'2024-07-14 18:42:14'),(895,'dataentryform','getDetailFromContact',6,'2024-07-14 18:42:23'),(896,'dataentryform','getDetailFromContact',6,'2024-07-14 18:42:36'),(897,'dataentryform','form',6,'2024-07-14 18:43:01'),(898,'dataentryform','getDetailFromContact',6,'2024-07-14 18:43:06'),(899,'dataentryform','getDetailFromContact',6,'2024-07-14 18:43:10'),(900,'dataentryform','getDetailFromContact',6,'2024-07-14 18:43:15'),(901,'dataentryform','form',6,'2024-07-14 18:43:18'),(902,'dataentryform','getDetailFromContact',6,'2024-07-14 18:43:24'),(903,'dataentryform','getDetailFromContact',6,'2024-07-14 18:43:29'),(904,'dataentryform','getDetailFromContact',6,'2024-07-14 18:44:40'),(905,'dataentryform','getDetailFromContact',6,'2024-07-14 18:44:42'),(906,'dataentryform','form',6,'2024-07-14 18:44:56'),(907,'dataentryform','getDetailFromContact',6,'2024-07-14 18:45:03'),(908,'dataentryform','getDetailFromContact',6,'2024-07-14 18:45:29'),(909,'dataentryform','getDetailFromContact',6,'2024-07-14 18:45:40'),(910,'dataentryform','getDetailFromContact',6,'2024-07-14 18:45:45'),(911,'dataentryform','form',6,'2024-07-14 18:50:13'),(912,'dataentryform','getDetailFromContact',6,'2024-07-14 18:50:18'),(913,'dataentryform','getDetailFromContact',6,'2024-07-14 18:50:22'),(914,'dataentryform','getDetailFromContact',6,'2024-07-14 18:50:29'),(915,'dataentryform','form',6,'2024-07-14 18:52:27'),(916,'dataentryform','getDetailFromContact',6,'2024-07-14 18:52:33'),(917,'dataentryform','getDetailFromContact',6,'2024-07-14 18:52:38'),(918,'dataentryform','getDetailFromContact',6,'2024-07-14 18:52:43'),(919,'dataentryform','getDetailFromContact',6,'2024-07-14 18:52:54'),(920,'dataentryform','getDetailFromContact',6,'2024-07-14 18:52:56'),(921,'dataentryform','form',6,'2024-07-14 18:54:40'),(922,'dataentryform','getDetailFromContact',6,'2024-07-14 18:54:48'),(923,'dataentryform','getDetailFromContact',6,'2024-07-14 18:54:56'),(924,'dataentryform','getDetailFromContact',6,'2024-07-14 18:55:08'),(925,'dataentryform','getDetailFromContact',6,'2024-07-14 18:55:13'),(926,'dataentryform','getDetailFromContact',6,'2024-07-14 18:55:16'),(927,'dataentryform','form',6,'2024-07-14 18:58:12'),(928,'dataentryform','getDetailFromContact',6,'2024-07-14 18:58:16'),(929,'dataentryform','getDetailFromContact',6,'2024-07-14 18:58:18'),(930,'dataentryform','getDetailFromContact',6,'2024-07-14 18:58:20'),(931,'dataentryform','form',6,'2024-07-14 18:58:40'),(932,'dataentryform','getDetailFromContact',6,'2024-07-14 18:58:46'),(933,'dataentryform','getDetailFromContact',6,'2024-07-14 18:59:14'),(934,'dataentryform','form',6,'2024-07-14 19:02:40'),(935,'dataentryform','all',6,'2024-07-14 19:02:40'),(936,'travel','all',6,'2024-07-14 19:02:42'),(937,'dataentryform','form',6,'2024-07-14 19:03:24'),(938,'dataentryform','getDetailFromContact',6,'2024-07-14 19:03:33'),(939,'dataentryform','getDetailFromContact',6,'2024-07-14 19:03:40'),(940,'dataentryform','getDetailFromContact',6,'2024-07-14 19:04:43'),(941,'dataentryform','getDetailFromContact',6,'2024-07-14 19:04:52'),(942,'dashboard',NULL,6,'2024-07-14 19:06:11'),(943,'dataentryform','form',6,'2024-07-14 19:06:30'),(944,'dashboard',NULL,6,'2024-07-14 19:06:51'),(945,'dashboard',NULL,6,'2024-07-14 19:06:59'),(946,'dataentryform','form',6,'2024-07-14 19:09:34'),(947,'dashboard',NULL,6,'2024-07-14 19:09:57'),(948,'dataentryform','all',6,'2024-07-14 19:12:35'),(949,'dashboard',NULL,6,'2024-07-14 19:12:40'),(950,'dataentryform','form',6,'2024-07-14 19:12:43'),(951,'dashboard',NULL,6,'2024-07-14 19:13:25'),(952,'travel','all',6,'2024-07-14 19:15:42'),(953,'dataentryform','form',6,'2024-07-14 19:18:16'),(954,'dataentryform','form',6,'2024-07-14 19:18:31'),(955,'dashboard',NULL,6,'2024-07-14 19:18:33'),(956,'travel','all',6,'2024-07-14 19:18:37'),(957,'travel','all',6,'2024-07-14 19:18:48'),(958,'travel','all',6,'2024-07-14 19:19:46'),(959,'travel','all',6,'2024-07-14 19:21:01'),(960,'travel','all',6,'2024-07-14 19:23:20'),(961,'dashboard',NULL,6,'2024-07-14 19:23:40'),(962,'dashboard',NULL,6,'2024-07-15 03:02:16'),(963,'dataentryform','form',6,'2024-07-15 03:02:20'),(964,'dashboard',NULL,6,'2024-07-15 12:38:17'),(965,'dataentryform','all',6,'2024-07-15 12:40:41'),(966,'dashboard',NULL,6,'2024-07-15 12:40:47'),(967,'dashboard',NULL,6,'2024-07-15 12:40:49'),(968,'travel','all',6,'2024-07-15 12:40:55'),(969,'dashboard',NULL,6,'2024-07-15 12:41:06'),(970,'dashboard',NULL,6,'2024-07-15 12:41:48'),(971,'dataentryform','form',6,'2024-07-15 12:41:51'),(972,'dataentryform','getDetailFromContact',6,'2024-07-15 12:41:55'),(973,'dataentryform','getDetailFromContact',6,'2024-07-15 12:42:03'),(974,'dashboard',NULL,6,'2024-07-15 12:42:13'),(975,'dataentryform','form',6,'2024-07-15 12:42:17'),(976,'dashboard',NULL,6,'2024-07-15 16:50:30'),(977,'dataentryform','form',6,'2024-07-15 16:50:41'),(978,'dataentryform','saveSnaps',6,'2024-07-15 16:51:34'),(979,'dataentryform','form',6,'2024-07-15 16:53:08'),(980,'dataentryform','form',6,'2024-07-15 16:55:55'),(981,'dataentryform','form',6,'2024-07-15 16:56:21'),(982,'dataentryform','form',6,'2024-07-15 16:56:30'),(983,'dataentryform','form',6,'2024-07-15 16:58:36'),(984,'dataentryform','form',6,'2024-07-15 17:00:19'),(985,'dashboard',NULL,6,'2024-07-15 17:19:14'),(986,'dataentryform','all',6,'2024-07-15 17:19:19'),(987,'dashboard',NULL,6,'2024-07-15 17:19:23'),(988,'dataentryform','form',6,'2024-07-15 17:19:25'),(989,'dataentryform','all',6,'2024-07-15 17:19:26'),(990,'dashboard',NULL,6,'2024-07-15 17:19:31'),(991,'dataentryform','form',6,'2024-07-15 17:39:46'),(992,'dataentryform','saveSnaps',6,'2024-07-15 17:40:00'),(993,'dataentryform','form',6,'2024-07-15 17:53:45'),(994,'dataentryform','saveSnaps',6,'2024-07-15 18:10:07'),(995,'dataentryform','form',6,'2024-07-15 18:14:14'),(996,'dataentryform','form',6,'2024-07-15 18:16:17'),(997,'dataentryform','form',6,'2024-07-15 18:17:06'),(998,'dataentryform','upload_image',6,'2024-07-15 18:17:10'),(999,'dataentryform','form',6,'2024-07-15 18:17:28'),(1000,'dataentryform','upload_image',6,'2024-07-15 18:17:37'),(1001,'dataentryform','upload_image',6,'2024-07-15 18:19:16'),(1002,'dataentryform','form',6,'2024-07-15 18:19:55'),(1003,'dataentryform','upload_image',6,'2024-07-15 18:19:59'),(1004,'dataentryform','form',6,'2024-07-15 18:20:14'),(1005,'dataentryform','upload_image',6,'2024-07-15 18:20:21'),(1006,'dataentryform','form',6,'2024-07-15 18:20:33'),(1007,'dataentryform','upload_image',6,'2024-07-15 18:20:40'),(1008,'dataentryform','form',6,'2024-07-15 18:21:58'),(1009,'dataentryform','upload_image',6,'2024-07-15 18:22:04'),(1010,'dataentryform','form',6,'2024-07-15 18:22:46'),(1011,'dataentryform','upload_image',6,'2024-07-15 18:22:51'),(1012,'dataentryform','form',6,'2024-07-15 18:23:10'),(1013,'dataentryform','upload_image',6,'2024-07-15 18:23:15'),(1014,'dataentryform','form',6,'2024-07-15 18:23:24'),(1015,'dataentryform','upload_image',6,'2024-07-15 18:23:29'),(1016,'dataentryform','form',6,'2024-07-15 18:24:28'),(1017,'dataentryform','upload_image',6,'2024-07-15 18:24:32'),(1018,'dataentryform','form',6,'2024-07-15 18:24:56'),(1019,'dataentryform','upload_image',6,'2024-07-15 18:25:00'),(1020,'dataentryform','form',6,'2024-07-15 18:26:09'),(1021,'dataentryform','upload_image',6,'2024-07-15 18:26:23'),(1022,'dataentryform','saveSnaps',6,'2024-07-15 18:26:54'),(1023,'dataentryform','form',6,'2024-07-15 18:27:07'),(1024,'dataentryform','form',6,'2024-07-15 18:30:08'),(1025,'dataentryform','form',6,'2024-07-15 18:30:19'),(1026,'dataentryform','form',6,'2024-07-15 18:30:34'),(1027,'dataentryform','form',6,'2024-07-15 18:32:35'),(1028,'dataentryform','form',6,'2024-07-15 18:33:01'),(1029,'dataentryform','form',6,'2024-07-15 18:33:42'),(1030,'dataentryform','form',6,'2024-07-15 18:34:07'),(1031,'dataentryform','form',6,'2024-07-15 18:34:19'),(1032,'dataentryform','form',6,'2024-07-15 18:36:41'),(1033,'dataentryform','form',6,'2024-07-15 18:39:31'),(1034,'dataentryform','form',6,'2024-07-15 18:43:24'),(1035,'dataentryform','form',6,'2024-07-15 18:43:46'),(1036,'dataentryform','form',6,'2024-07-15 18:45:33'),(1037,'dataentryform','form',6,'2024-07-15 18:46:00'),(1038,'dataentryform','form',6,'2024-07-15 18:46:37'),(1039,'dataentryform','form',6,'2024-07-15 18:47:06'),(1040,'dataentryform','form',6,'2024-07-15 18:49:25'),(1041,'dataentryform','form',6,'2024-07-15 18:50:20'),(1042,'dataentryform','form',6,'2024-07-15 18:52:44'),(1043,'dataentryform','form',6,'2024-07-15 18:53:44'),(1044,'dataentryform','form',6,'2024-07-15 18:54:14'),(1045,'dataentryform','form',6,'2024-07-15 18:55:51'),(1046,'dataentryform','form',6,'2024-07-15 18:56:44'),(1047,'dataentryform','form',6,'2024-07-15 18:57:07'),(1048,'dashboard',NULL,6,'2024-07-15 18:57:27'),(1049,'dataentryform','form',6,'2024-07-15 18:59:13'),(1050,'dashboard',NULL,6,'2024-07-15 19:00:59'),(1051,'travel','all',6,'2024-07-15 19:01:08'),(1052,'travel','all',6,'2024-07-15 19:01:20'),(1053,'travel','all',6,'2024-07-15 19:05:06'),(1054,'dashboard',NULL,6,'2024-07-15 19:06:12'),(1055,'dataentryform','form',6,'2024-07-15 19:16:32'),(1056,'dashboard',NULL,6,'2024-07-15 19:16:46'),(1057,'dataentryform','form',6,'2024-07-15 19:16:48'),(1058,'dataentryform','form',6,'2024-07-15 19:18:57'),(1059,'dataentryform','form',6,'2024-07-15 19:19:38'),(1060,'dataentryform','form',6,'2024-07-15 19:20:19'),(1061,'user_role','all',6,'2024-07-15 19:23:40'),(1062,'module','role_function',6,'2024-07-15 19:24:38'),(1063,'dataentryform','form',6,'2024-07-15 19:27:34'),(1064,'staff','all',6,'2024-07-15 19:27:47'),(1065,'staff','form',6,'2024-07-15 19:27:49'),(1066,'staff','all',6,'2024-07-15 19:28:47'),(1067,'department','all',6,'2024-07-15 19:29:23'),(1068,'department','form',6,'2024-07-15 19:29:25'),(1069,'dashboard',NULL,6,'2024-07-15 19:29:26'),(1070,'dataentryform','form',6,'2024-07-15 19:29:32'),(1071,'dataentryform','form',6,'2024-07-15 19:32:04'),(1072,'dataentryform','form',6,'2024-07-15 19:32:24'),(1073,'dataentryform','form',6,'2024-07-15 19:33:06'),(1074,'dataentryform','form',6,'2024-07-15 19:33:45'),(1075,'dataentryform','form',6,'2024-07-15 19:33:56'),(1076,'dataentryform','form',6,'2024-07-15 19:35:48'),(1077,'dataentryform','form',6,'2024-07-15 19:36:55'),(1078,'dataentryform','form',6,'2024-07-15 19:37:31'),(1079,'dataentryform','form',6,'2024-07-15 19:37:32'),(1080,'dataentryform','form',6,'2024-07-15 19:41:48'),(1081,'dataentryform','form',6,'2024-07-15 19:41:56'),(1082,'dataentryform','form',6,'2024-07-15 19:41:57'),(1083,'dataentryform','form',6,'2024-07-15 19:41:57'),(1084,'dataentryform','form',6,'2024-07-15 19:42:51'),(1085,'dataentryform','form',6,'2024-07-15 19:42:53'),(1086,'dataentryform','form',6,'2024-07-15 19:48:15'),(1087,'dataentryform','form',6,'2024-07-15 19:52:46'),(1088,'dataentryform','form',6,'2024-07-15 19:53:19'),(1089,'dataentryform','form',6,'2024-07-15 19:57:25'),(1090,'dataentryform','form',6,'2024-07-15 20:01:12'),(1091,'dataentryform','form',6,'2024-07-15 20:02:33'),(1092,'dataentryform','form',6,'2024-07-15 20:09:11'),(1093,'dataentryform','form',6,'2024-07-15 20:11:05'),(1094,'dataentryform','form',6,'2024-07-15 20:12:18'),(1095,'dataentryform','form',6,'2024-07-15 20:13:03'),(1096,'dataentryform','form',6,'2024-07-15 20:13:41'),(1097,'dataentryform','form',6,'2024-07-15 20:14:17'),(1098,'dataentryform','form',6,'2024-07-15 20:19:13'),(1099,'dashboard',NULL,6,'2024-07-15 20:20:03'),(1100,'dataentryform','form',6,'2024-07-15 20:20:09'),(1101,'dashboard',NULL,6,'2024-07-15 20:23:06'),(1102,'dataentryform','form',6,'2024-07-15 20:23:08'),(1103,'dashboard',NULL,6,'2024-07-15 20:23:12'),(1104,'dataentryform','all',6,'2024-07-15 20:23:14'),(1105,'travel','all',6,'2024-07-15 20:23:15'),(1106,'dashboard',NULL,6,'2024-07-15 20:23:28'),(1107,'dataentryform','form',6,'2024-07-15 20:23:38'),(1108,'dataentryform','form',6,'2024-07-15 20:26:48'),(1109,'dataentryform','form',6,'2024-07-15 20:27:57'),(1110,'dataentryform','form',6,'2024-07-15 20:30:42'),(1111,'dataentryform','form',6,'2024-07-15 20:32:57'),(1112,'dataentryform','form',6,'2024-07-15 20:35:00'),(1113,'dataentryform','form',6,'2024-07-15 20:39:23'),(1114,'dataentryform','form',6,'2024-07-15 20:39:57'),(1115,'dataentryform','form',6,'2024-07-15 20:41:57'),(1116,'dataentryform','form',6,'2024-07-15 20:43:48'),(1117,'dataentryform','form',6,'2024-07-15 20:45:05'),(1118,'dataentryform','form',6,'2024-07-15 20:45:19'),(1119,'dataentryform','form',6,'2024-07-15 20:50:35'),(1120,'dataentryform','form',6,'2024-07-15 20:50:36'),(1121,'dataentryform','form',6,'2024-07-15 20:51:35'),(1122,'dataentryform','getDetailFromContact',6,'2024-07-15 20:52:03'),(1123,'dataentryform','getDetailFromContact',6,'2024-07-15 20:52:25'),(1124,'dataentryform','form',6,'2024-07-15 20:54:00'),(1125,'dataentryform','getDetailFromContact',6,'2024-07-15 20:54:12'),(1126,'dataentryform','form',6,'2024-07-15 20:58:39'),(1127,'dataentryform','getDetailFromContact',6,'2024-07-15 20:58:51'),(1128,'dataentryform','upload_image',6,'2024-07-15 21:02:46'),(1129,'dataentryform','form',6,'2024-07-15 21:05:59'),(1130,'dataentryform','getDetailFromContact',6,'2024-07-15 21:06:04'),(1131,'dataentryform','form',6,'2024-07-15 21:08:09'),(1132,'dataentryform','getDetailFromContact',6,'2024-07-15 21:08:17'),(1133,'dataentryform','form',6,'2024-07-15 21:09:42'),(1134,'dataentryform','getDetailFromContact',6,'2024-07-15 21:09:48'),(1135,'dataentryform','form',6,'2024-07-15 21:10:23'),(1136,'dataentryform','getDetailFromContact',6,'2024-07-15 21:10:28'),(1137,'dataentryform','form',6,'2024-07-15 21:11:49'),(1138,'dataentryform','form',6,'2024-07-15 21:13:18'),(1139,'dataentryform','form',6,'2024-07-15 21:13:38'),(1140,'dataentryform','form',6,'2024-07-15 21:13:52'),(1141,'dataentryform','form',6,'2024-07-15 21:14:15'),(1142,'dataentryform','form',6,'2024-07-15 21:14:38'),(1143,'dataentryform','form',6,'2024-07-15 21:15:08'),(1144,'dataentryform','form',6,'2024-07-15 21:15:22'),(1145,'dataentryform','form',6,'2024-07-15 21:15:48'),(1146,'dataentryform','form',6,'2024-07-15 21:16:10'),(1147,'dataentryform','form',6,'2024-07-15 21:16:38'),(1148,'dataentryform','getDetailFromContact',6,'2024-07-15 21:16:43'),(1149,'dataentryform','form',6,'2024-07-15 21:17:10'),(1150,'dataentryform','form',6,'2024-07-15 21:17:29'),(1151,'dataentryform','getDetailFromContact',6,'2024-07-15 21:17:34'),(1152,'dataentryform','form',6,'2024-07-15 21:18:06'),(1153,'dataentryform','getDetailFromContact',6,'2024-07-15 21:18:12'),(1154,'dataentryform','form',6,'2024-07-15 21:18:44'),(1155,'dataentryform','form',6,'2024-07-15 21:18:56'),(1156,'dataentryform','form',6,'2024-07-15 21:19:29'),(1157,'dataentryform','getDetailFromContact',6,'2024-07-15 21:19:34'),(1158,'dataentryform','form',6,'2024-07-15 21:19:47'),(1159,'dataentryform','getDetailFromContact',6,'2024-07-15 21:19:55'),(1160,'dataentryform','upload_image',6,'2024-07-15 21:20:04'),(1161,'dataentryform','getDetailFromContact',6,'2024-07-15 21:20:15'),(1162,'dashboard',NULL,6,'2024-07-15 21:20:15'),(1163,'dataentryform','getDetailFromContact',6,'2024-07-15 21:20:52'),(1164,'dataentryform','getDetailFromContact',6,'2024-07-15 21:20:57'),(1165,'dashboard',NULL,6,'2024-07-15 21:20:57'),(1166,'dataentryform','getDetailFromContact',6,'2024-07-15 21:21:40'),(1167,'dataentryform','getDetailFromContact',6,'2024-07-15 21:21:45'),(1168,'dashboard',NULL,6,'2024-07-15 21:21:45'),(1169,'dataentryform','getDetailFromContact',6,'2024-07-15 21:23:58'),(1170,'dataentryform','getDetailFromContact',6,'2024-07-15 21:24:05'),(1171,'dashboard',NULL,6,'2024-07-15 21:24:05'),(1172,'dataentryform','upload_image',6,'2024-07-15 21:27:17'),(1173,'dataentryform','getDetailFromContact',6,'2024-07-15 21:28:25'),(1174,'dataentryform','form',6,'2024-07-15 21:28:49'),(1175,'dataentryform','getDetailFromContact',6,'2024-07-15 21:28:56'),(1176,'dataentryform','getDetailFromContact',6,'2024-07-15 21:29:01'),(1177,'dataentryform','getDetailFromContact',6,'2024-07-15 21:29:04'),(1178,'dataentryform','getDetailFromContact',6,'2024-07-15 21:29:20'),(1179,'dataentryform','getDetailFromContact',6,'2024-07-15 21:29:45'),(1180,'dataentryform','form',6,'2024-07-15 21:31:04'),(1181,'dataentryform','getDetailFromContact',6,'2024-07-15 21:31:11'),(1182,'dataentryform','getDetailFromContact',6,'2024-07-15 21:31:13'),(1183,'dataentryform','getDetailFromContact',6,'2024-07-15 21:31:16'),(1184,'dataentryform','getDetailFromContact',6,'2024-07-15 21:31:27'),(1185,'dataentryform','getDetailFromContact',6,'2024-07-15 21:31:30'),(1186,'dataentryform','getDetailFromContact',6,'2024-07-15 21:32:47'),(1187,'dataentryform','getDetailFromContact',6,'2024-07-15 21:32:55'),(1188,'dataentryform','form',6,'2024-07-15 21:33:26'),(1189,'dataentryform','getDetailFromContact',6,'2024-07-15 21:33:33'),(1190,'dataentryform','getDetailFromContact',6,'2024-07-15 21:33:39'),(1191,'dataentryform','getDetailFromContact',6,'2024-07-15 21:33:43'),(1192,'dataentryform','form',6,'2024-07-15 21:34:34'),(1193,'dataentryform','getDetailFromContact',6,'2024-07-15 21:34:42'),(1194,'dataentryform','getDetailFromContact',6,'2024-07-15 21:34:45'),(1195,'dataentryform','getDetailFromContact',6,'2024-07-15 21:34:47'),(1196,'dataentryform','form',6,'2024-07-15 21:39:03'),(1197,'dataentryform','getDetailFromContact',6,'2024-07-15 21:39:12'),(1198,'dataentryform','getDetailFromContact',6,'2024-07-15 21:39:16'),(1199,'dataentryform','getDetailFromContact',6,'2024-07-15 21:39:19'),(1200,'dataentryform','form',6,'2024-07-15 21:41:17'),(1201,'dashboard',NULL,6,'2024-07-16 02:40:35'),(1202,'dataentryform','form',6,'2024-07-16 02:45:31'),(1203,'dashboard',NULL,6,'2024-07-16 02:45:49'),(1204,'dashboard',NULL,6,'2024-07-16 03:02:20'),(1205,'dashboard',NULL,6,'2024-07-16 16:29:21'),(1206,'dataentryform','form',6,'2024-07-16 16:29:24'),(1207,'dashboard',NULL,6,'2024-07-16 16:52:44'),(1208,'dashboard',NULL,6,'2024-07-16 16:54:09'),(1209,'dashboard',NULL,6,'2024-07-16 17:20:07'),(1210,'dashboard',NULL,6,'2024-07-16 17:21:24'),(1211,'dashboard',NULL,6,'2024-07-16 17:21:56'),(1212,'dashboard',NULL,6,'2024-07-16 17:24:54'),(1213,'dataentryform','form',6,'2024-07-16 17:29:32'),(1214,'dashboard',NULL,6,'2024-07-16 17:34:57'),(1215,'dashboard',NULL,6,'2024-07-16 17:35:20'),(1216,'dashboard',NULL,6,'2024-07-16 17:35:37'),(1217,'dashboard',NULL,6,'2024-07-16 17:40:31'),(1218,'dashboard',NULL,6,'2024-07-16 17:41:45'),(1219,'dashboard',NULL,6,'2024-07-16 17:42:43'),(1220,'dashboard',NULL,6,'2024-07-16 17:43:18'),(1221,'dashboard',NULL,6,'2024-07-16 17:52:29'),(1222,'dashboard',NULL,6,'2024-07-16 17:52:45'),(1223,'dashboard',NULL,6,'2024-07-16 17:56:27'),(1224,'dashboard',NULL,6,'2024-07-16 17:57:40'),(1225,'dashboard',NULL,6,'2024-07-16 18:04:22'),(1226,'dashboard',NULL,6,'2024-07-16 18:05:04'),(1227,'dashboard',NULL,6,'2024-07-16 18:05:33'),(1228,'dashboard',NULL,6,'2024-07-16 18:16:20'),(1229,'dashboard',NULL,6,'2024-07-16 18:17:13'),(1230,'dashboard',NULL,6,'2024-07-16 18:18:13'),(1231,'dashboard',NULL,6,'2024-07-16 18:18:28'),(1232,'dashboard',NULL,6,'2024-07-16 18:19:25'),(1233,'dataentryform','form',6,'2024-07-16 18:19:42'),(1234,'dataentryform','form',6,'2024-07-16 18:33:11'),(1235,'dataentryform','form',6,'2024-07-16 18:33:50'),(1236,'dataentryform','form',6,'2024-07-16 18:38:42'),(1237,'dataentryform','form',6,'2024-07-16 18:40:38'),(1238,'dataentryform','getDetailFromContact',6,'2024-07-16 18:50:45'),(1239,'dashboard',NULL,6,'2024-07-16 19:04:18'),(1240,'dataentryform','form',6,'2024-07-16 19:06:28'),(1241,'dashboard',NULL,6,'2024-07-16 19:06:30'),(1242,'dataentryform','form',6,'2024-07-16 19:06:35'),(1243,'dashboard',NULL,6,'2024-07-17 10:34:22'),(1244,'dashboard',NULL,6,'2024-07-17 11:51:19'),(1245,'dataentryform','form',6,'2024-07-17 11:51:39'),(1246,'dashboard',NULL,6,'2024-07-17 11:51:41'),(1247,'dataentryform','form',6,'2024-07-17 11:51:52'),(1248,'dashboard',NULL,6,'2024-07-17 11:52:04'),(1249,'dashboard',NULL,6,'2024-07-17 11:52:22'),(1250,'dashboard',NULL,6,'2024-07-17 11:52:23'),(1251,'dashboard',NULL,6,'2024-07-17 11:52:23'),(1252,'dashboard',NULL,6,'2024-07-17 11:52:27'),(1253,'dashboard',NULL,6,'2024-07-17 11:52:27'),(1254,'dataentryform','form',6,'2024-07-17 11:52:35');
/*!40000 ALTER TABLE `user_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated` date NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,'Super Admin','1',1,'2022-01-27',8,'2024-06-14','Only For Developer'),(2,'Admin','1',1,'2022-01-27',8,'2024-06-14','For Admins Only'),(3,'HRD Admin','2',1,'2022-01-28',8,'2024-06-13','<p>HRD Department</p>\r\n'),(4,'Entry User','1',1,'2022-01-28',8,'2024-06-14','<p>Only for Data entry</p>\r\n'),(5,'Grievance Admin','2',1,'2022-10-13',1,'2024-06-07','<p>Grievance Officer</p>\r\n'),(6,'Business Admin','2',1,'2022-10-13',1,'2024-06-07','<p>Business Development</p>\r\n'),(7,'Treasury Admin','2',1,'2022-10-13',1,'2024-06-07','<p>Treasury</p>\r\n'),(8,'Card Admin','2',1,'2022-10-13',1,'2024-06-07','<p>Digital</p>\r\n'),(9,'Operation Admin','2',1,'2022-10-13',1,'2024-06-07','<p>Operation</p>\r\n'),(10,'Trade Amin','2',1,'2022-10-13',1,'2024-06-07','<p>Trade</p>\r\n'),(11,'AML/CFT','2',1,'2022-10-13',1,'2024-06-07','<p>Compliance</p>\r\n'),(12,'view user','1',8,'2024-06-16',0,'0000-00-00','ttemmndk');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `auth_code` varchar(100) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `designation_code` varchar(25) DEFAULT NULL,
  `depart_id` int(11) DEFAULT NULL,
  `appointed_date` date DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `temp_address` varchar(255) NOT NULL,
  `permanent_address` varchar(255) NOT NULL,
  `country_code` varchar(10) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `currently_working` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  `psd_changed_date` date NOT NULL,
  `psd_changed` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (6,'admin123','5ecbbec3737d7cde5cc7a6927762db61','f696afd95acc49e2ec2fdcd002af17e0',1,7,NULL,NULL,NULL,'','','','','','','','dilc1425@gmail.com','2024-06-13',1,'0000-00-00',0,'Yes','1','0000-00-00','0'),(7,'entry.user','87099b48fb43ec64605492ccae25ccce','b13de906904689b773a088de1f19df1f',4,9,NULL,NULL,NULL,'','','','','','','','dilc1425@gmail.com','2024-06-13',1,'0000-00-00',0,'Yes','1','0000-00-00','0'),(8,'super.admin','5ecbbec3737d7cde5cc7a6927762db61','fbc4f5b75f9bceea5eae343daa3ea33f',1,8,NULL,NULL,NULL,'','','','','','','','dilc1425@gmail.com','2024-06-13',1,'0000-00-00',0,'Yes','1','0000-00-00','0'),(9,'ram.yadv','6a557ed1005dddd940595b8fc6ed47b2',NULL,4,10,NULL,NULL,NULL,'','','','','','','','ram@gmail.com','2024-06-16',8,'0000-00-00',0,'Yes','1','0000-00-00','0');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_information`
--

DROP TABLE IF EXISTS `vehicle_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `travel_id` int(11) NOT NULL,
  `vehicle_information` varchar(100) DEFAULT NULL,
  `gone_dirction` varchar(100) DEFAULT NULL,
  `types_of_vehicle` varchar(100) DEFAULT NULL,
  `vehicle_number` varchar(100) DEFAULT NULL,
  `drivers_name` varchar(100) DEFAULT NULL,
  `driving_licence` varchar(100) DEFAULT NULL,
  `drivers_number` varchar(100) DEFAULT NULL,
  `use_of_vehicle` varchar(100) DEFAULT NULL,
  `heavy_vehicle_type` varchar(100) DEFAULT NULL,
  `property_information` varchar(100) DEFAULT NULL,
  `pasengers` varchar(100) DEFAULT NULL,
  `remarks` text,
  `is_returned` varchar(10) DEFAULT '0',
  `created` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_information`
--

LOCK TABLES `vehicle_information` WRITE;
/*!40000 ALTER TABLE `vehicle_information` DISABLE KEYS */;
INSERT INTO `vehicle_information` VALUES (1,1,'सरकारी',NULL,'जीप','dasdasd','dsadda','Rerum duis sunt nis','822','व्यक्तिगत काम','सानो','dsadasdas','Voluptatem reprehend',NULL,'1','2024-07-15',6,'2024-07-15',6),(2,2,'निजि',NULL,'साइकल','dasdasd','Troy Walter','Et Nam ad eius conse','dasdasd','ब्यापार','सानो','dsadasdas','dasdasdasd',NULL,'0','2024-07-15',6,NULL,NULL);
/*!40000 ALTER TABLE `vehicle_information` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-17 17:44:24
