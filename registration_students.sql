CREATE DATABASE  IF NOT EXISTS `registration` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `registration`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: cis435p3ac3.czudvkxtbnxr.us-west-2.rds.amazonaws.com    Database: registration
-- ------------------------------------------------------
-- Server version	5.6.19-log

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
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `umid` varchar(8) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `project` varchar(45) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `timeslot` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`umid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES ('00700777','James','Bond','Security and Network in Cyberspace','jbondz@fbi.gov','007-007-0007','12/4/14, 6:00 PM â€“ 7:00 PM'),('01234567','Andy','Wezel','Cryptology','awezel@gmail.com','234-234-2344','12/5/14, 8:00 PM â€“ 9:00 PM'),('11111111','Andrea','Guttierez','Programming in Python','guttierz@umich.edu','111-111-1111','12/4/14, 6:00 PM â€“ 7:00 PM'),('11223344','Jack','Laslow','Phishing and Cybercrime','jlaslow@umich.edu','123-123-1231','12/4/14, 6:00 PM â€“ 7:00 PM'),('21332112','Christian','Adam','Amazon AWS Service Stinks','lovely@globalsbc.com','432-432-6543','12/5/14, 8:00 PM â€“ 9:00 PM'),('22222222','Jose','Torrez','Game Design in HTML5','josetor@gmail.com','321-432-5436','12/4/14, 7:00 PM â€“ 8:00 PM'),('43243243','John','Slovack','Friends and Funtions','jslovack@gmail.com','432-432-4324','12/4/14, 6:00 PM â€“ 7:00 PM'),('54236780','Gina','Loo','Xiah 3D Game Platform','gina@xiah.com','543-543-6543','12/5/14, 8:00 PM â€“ 9:00 PM'),('54325432','Reenee','Lori','Mendeley Sevices','reelori@aol.com','543-678-9033','12/4/14, 7:00 PM â€“ 8:00 PM'),('54353333','Levi','Lowbottoms','Wordpress and blogging','bubblegumdrops@gmail.com','767-745-4744','12/5/14, 8:00 PM â€“ 9:00 PM'),('65465465','George','Lopes','Technology Forever','georglz@gmail.com','000-000-0000','12/4/14, 6:00 PM â€“ 7:00 PM'),('65467890','Karen','Dion','Napster File Sharing','kdion1@goran.com','654-789-9076','12/5/14, 8:00 PM â€“ 9:00 PM'),('67867887','Roland','Dango','Bootstrap Framework','roland@yahoo.com','248-994-1231','12/4/14, 6:00 PM â€“ 7:00 PM'),('76543453','James','Huang','Botnet Experiment','botnet@botnet.com','645-098-0980','12/4/14, 8:00 PM â€“ 9:00 PM'),('87654312','Halp','Me','Virus, Worms, Bugs, oh my!','sos@gmail.com','543-535-3543','12/4/14, 7:00 PM â€“ 8:00 PM');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-15 14:41:03
