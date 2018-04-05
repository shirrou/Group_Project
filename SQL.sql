/*
SQLyog Community v12.5.1 (64 bit)
MySQL - 10.1.30-MariaDB : Database - testproject
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`testproject` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `testproject`;

/*Table structure for table `basket` */

DROP TABLE IF EXISTS `basket`;

CREATE TABLE `basket` (
  `userID` int(5) DEFAULT NULL,
  `itemID` int(3) DEFAULT NULL,
  `itemCatID` int(3) DEFAULT NULL,
  `memoryID` int(3) DEFAULT NULL,
  `colorID` int(3) DEFAULT NULL,
  `itemBasketQTY` int(2) DEFAULT NULL,
  `itemDetID` int(5) DEFAULT NULL,
  `itemBasketPrice` double(10,2) DEFAULT NULL,
  `basketItemID` int(3) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`basketItemID`),
  KEY `userID` (`userID`),
  KEY `itemID` (`itemID`),
  KEY `itemCatID` (`itemCatID`),
  KEY `memoryID` (`memoryID`),
  KEY `colorID` (`colorID`),
  KEY `itemDetID` (`itemDetID`),
  CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`itemID`) REFERENCES `itemdetails` (`itemID`),
  CONSTRAINT `basket_ibfk_3` FOREIGN KEY (`itemCatID`) REFERENCES `itemdetails` (`itemCatID`),
  CONSTRAINT `basket_ibfk_4` FOREIGN KEY (`memoryID`) REFERENCES `memory` (`memoryID`),
  CONSTRAINT `basket_ibfk_5` FOREIGN KEY (`colorID`) REFERENCES `color` (`colorID`),
  CONSTRAINT `basket_ibfk_6` FOREIGN KEY (`itemDetID`) REFERENCES `itemdetails` (`itemDetID`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `basket` */

insert  into `basket`(`userID`,`itemID`,`itemCatID`,`memoryID`,`colorID`,`itemBasketQTY`,`itemDetID`,`itemBasketPrice`,`basketItemID`) values 
(1,1,3,3,8,1,3,500.00,30),
(1,2,7,27,22,3,22,300.00,35),
(1,1,2,8,5,1,2,750.50,36);

/*Table structure for table `color` */

DROP TABLE IF EXISTS `color`;

CREATE TABLE `color` (
  `colorID` int(3) NOT NULL AUTO_INCREMENT,
  `colorName` varchar(15) NOT NULL,
  `itemCatID` int(3) NOT NULL,
  `itemID` int(3) NOT NULL,
  PRIMARY KEY (`colorID`),
  KEY `colorItemID` (`itemID`),
  KEY `colorItemCatID` (`itemCatID`),
  CONSTRAINT `colorItemCatID` FOREIGN KEY (`itemCatID`) REFERENCES `itemdetails` (`itemCatID`),
  CONSTRAINT `colorItemID` FOREIGN KEY (`itemID`) REFERENCES `itemdetails` (`itemID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `color` */

insert  into `color`(`colorID`,`colorName`,`itemCatID`,`itemID`) values 
(1,'Black',1,1),
(2,'White',2,1),
(3,'Red',2,1),
(4,'Bronze',1,1),
(5,'Black',2,1),
(6,'White',3,1),
(7,'Black',3,1),
(8,'Blue',3,1),
(9,'Black',4,1),
(10,'White',5,3),
(11,'Silver',5,4),
(12,'Black',5,2),
(13,'Silver',5,2),
(14,'White',5,2),
(15,'Gold',5,1),
(16,'White',5,1),
(17,'Blue',5,2),
(18,'Red',5,2),
(19,'Pink',6,1),
(20,'Gold',6,2),
(21,'Black',7,1),
(22,'Green',7,2),
(23,'Black',8,1);

/*Table structure for table `item` */

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `itemCatID` int(3) DEFAULT NULL,
  `itemID` int(3) NOT NULL AUTO_INCREMENT,
  `itemName` varchar(100) NOT NULL,
  `itemDescription` varchar(100) DEFAULT NULL,
  `releaseDate` varchar(50) DEFAULT NULL,
  `weight` int(3) DEFAULT NULL,
  `wide` double(1,1) DEFAULT NULL,
  `operatingSystem` varchar(30) DEFAULT NULL,
  `screenSize` double(1,1) DEFAULT NULL,
  `camera` int(2) DEFAULT NULL,
  `ramMemory` int(2) DEFAULT NULL,
  `battery` int(4) DEFAULT NULL,
  `resolution` varchar(9) DEFAULT NULL,
  `processor` varchar(50) DEFAULT NULL,
  `frontImg` varchar(250) DEFAULT NULL,
  `backImg` varchar(250) DEFAULT NULL,
  `carPic1` varchar(200) DEFAULT NULL,
  `carPic2` varchar(200) DEFAULT NULL,
  `carPic3` varchar(200) DEFAULT NULL,
  `carPic4` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`itemID`,`itemName`),
  KEY `itemCatID` (`itemCatID`),
  CONSTRAINT `item_ibfk_1` FOREIGN KEY (`itemCatID`) REFERENCES `itemcategory` (`itemCatID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `item` */

insert  into `item`(`itemCatID`,`itemID`,`itemName`,`itemDescription`,`releaseDate`,`weight`,`wide`,`operatingSystem`,`screenSize`,`camera`,`ramMemory`,`battery`,`resolution`,`processor`,`frontImg`,`backImg`,`carPic1`,`carPic2`,`carPic3`,`carPic4`) values 
(5,1,'3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'nokia3Front.png','nokia3Back.png','nokia3CarPic1.png','nokia3CarPic2.png','nokia3CarPic3.png','nokia3CarPic4.png'),
(6,1,'5','asdfa','asdfas',654,0.5,'asdf',0.2,11,2,6548,NULL,NULL,'onePlus5Front.png','onePlus5Back.png','onePlus5CarPic1.png','onePlus5CarPic2.png','onePlus5CarPic3.png','onePlus5CarPic4.png'),
(7,1,'Galasy S9','asdlfkjoij',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'samsungGalaxyS9Front.png','samsungGalaxyS9Back.png','samsungGalaxyS9CarPic1.png','samsungGalaxyS9CarPic2.png','samsungGalaxyS9CarPic3.png','samsungGalaxyS9CarPic4.png'),
(3,1,'Mate 10','asdfasdf','sdfadf',174,0.9,'asdf',0.5,12,3,2715,'2135X6548','ASDFA','huaweiMate10Front.png','huaweiMate10Back.png','huaweiMate10CarPic1.png','huaweiMate10CarPic2.png','huaweiMate10CarPic3.png','huaweiMate10CarPic4.png'),
(2,1,'Pixel 2','KJH','15-12-2018',150,0.5,'ASDF',0.5,11,2,2156,'2346x1564','add','googlePixel2Front.png','googlePixel2Back.png','googlePixel2CarPic1.png','googlePixel2CarPic2.png','googlePixel2CarPic3.png','googlePixel2CarPic4.png'),
(4,1,'V30','asdfa','asdf',154,0.2,'6548',0.1,12,2,6548,'6548x6548','asdf','lgV30Front.png','lgV30Back.png','lgV30CarPic1.png','lgV30CarPic2.png','lgV30CarPic3.png','lgV30CarPic4.png'),
(1,1,'X','iphoneX.txt','15-10-2018',174,0.9,'iOs 11.1.1',0.9,12,3,2716,'2346x1254','A11','iphoneXFront.png','iphoneXBack.png','iphoneXCarPic1.png','iphoneXCarPic2.png','iphoneXCarPic3.png','iphoneXCarPic4.png'),
(8,1,'Xperia XZ2','asldifnaosifno','asldkfnoih',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'sonyXperiaXZ2Front.png','sonyXperiaXZ2Back.png','sonyXperiaXZ2CarPic1.png','sonyXperiaXZ2CarPic2.png','sonyXperiaXZ2CarPic3.png','sonyXperiaXZ2CarPic4.png'),
(6,2,'5T','erty',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'onePlus5TFront.png','onePlus5TBack.png','onePlus5TCarPic1.png','onePlus5TCarPic2.png','onePlus5CarPic3.png','onePlus5TCarPic4.png'),
(5,2,'6','pouiu',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'nokia6Front.png','nokia6Back.png','nokia6CarPic1.png','nokia6CarPic2.png','nokia6CarPic3.png','nokia6CarPic4.png'),
(4,2,'G6','asdfa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'lgG6Front.png','lgG6Back.png','lgG6CarPic1.png','lgG6CarPic2.png','lgG6CarPic3.png','lgG6CarPic4.npng'),
(7,2,'Galaxy S8','ert',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'samsungGalaxyS8Front.png','samsungGalaxyS8Back.png','samsungGalaxyS8CarPic1.png','samsungGalaxyS8CarPic2.png','samsungGalaxyS8CarPic3.png','samsungGalaxyS8CarPic4.png'),
(1,2,'X plus','lkjlkjsdfasdfa','lkj',174,0.5,'6548',0.5,11,3,2147,'6548x6484','qssqsq','iphoneXPlusFront.png','iphoneXPlusBack.png','iphoneXPlusCarPic1.png','iphoneXPlusCarPic2.png','iphoneXPlusCarPic3.png','iphoneXPlusCarPic4.png'),
(5,3,'8','rtyu',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'nokia8Front.png','nokia8Back.png','nokia8CarPic1.png','nokia8CarPic2.png','nokia8CarPic3.png','nokia8CarPic4.png'),
(4,3,'Q6','asdfa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'lgQ6Front.png','lgQ6Back.png','lgQ6CarPic1.png','lgQ6CarPic2.png','lgQ6CarPic3.png','lgQ6CarPic4.npng'),
(5,4,'8 Sirrocco','tyui',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'nokia8SiroccoFront.png','nokia8SiroccoBack.png','nokia8SiroccoCarPic1.png','nokia8SiroccoCarPic2.png','nokia8SiroccoCarPic3.png','nokia8SiroccoCarPic4.png'),
(4,4,'V20','lkjlkj',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'lgV20Front.png','lgV20Back.png','lgV20CarPic1.png','lgV20CarPic2.png','lgV20CarPic3.png','lgV20CarPic4.npng');

/*Table structure for table `itemcategory` */

DROP TABLE IF EXISTS `itemcategory`;

CREATE TABLE `itemcategory` (
  `itemCatID` int(3) NOT NULL AUTO_INCREMENT,
  `itemCatName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`itemCatID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `itemcategory` */

insert  into `itemcategory`(`itemCatID`,`itemCatName`) values 
(0,'flagships'),
(1,'Iphone'),
(2,'Google'),
(3,'Huawei'),
(4,'LG'),
(5,'Nokia'),
(6,'OnePlus'),
(7,'Samsung'),
(8,'Sony');

/*Table structure for table `itemdetails` */

DROP TABLE IF EXISTS `itemdetails`;

CREATE TABLE `itemdetails` (
  `itemDetID` int(5) NOT NULL AUTO_INCREMENT,
  `itemCatID` int(3) NOT NULL,
  `itemID` int(3) NOT NULL,
  `itemQty` int(5) NOT NULL,
  `itemTreshold` int(2) NOT NULL,
  `itemPrice` double(5,2) NOT NULL,
  `memoryID` int(2) NOT NULL,
  `colorID` int(2) NOT NULL,
  PRIMARY KEY (`itemDetID`,`itemCatID`,`itemID`,`itemPrice`,`memoryID`,`colorID`),
  KEY `memoryID` (`memoryID`),
  KEY `colorID` (`colorID`),
  KEY `itemCatID` (`itemCatID`),
  KEY `itemID` (`itemID`),
  CONSTRAINT `itemCatID` FOREIGN KEY (`itemCatID`) REFERENCES `item` (`itemCatID`),
  CONSTRAINT `itemID` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemID`),
  CONSTRAINT `itemdetails_ibfk_1` FOREIGN KEY (`memoryID`) REFERENCES `memory` (`memoryID`),
  CONSTRAINT `itemdetails_ibfk_2` FOREIGN KEY (`colorID`) REFERENCES `color` (`colorID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `itemdetails` */

insert  into `itemdetails`(`itemDetID`,`itemCatID`,`itemID`,`itemQty`,`itemTreshold`,`itemPrice`,`memoryID`,`colorID`) values 
(1,3,1,10,10,750.50,1,6),
(2,2,1,10,10,750.50,8,5),
(3,3,1,10,10,500.00,3,8),
(4,3,1,10,10,500.00,2,7),
(5,5,2,10,10,699.99,21,18),
(6,5,2,10,10,895.99,21,17),
(7,1,1,10,10,659.59,4,1),
(8,1,1,10,10,250.00,6,4),
(9,1,2,10,50,439.69,7,3),
(10,1,2,10,30,439.69,7,2),
(11,4,1,10,10,250.00,10,9),
(12,5,1,10,0,742.58,20,16),
(13,5,1,10,2,629.34,20,15),
(14,5,2,10,2,359.85,21,14),
(15,5,2,10,2,368.00,21,13),
(16,5,2,10,2,259.00,21,12),
(17,5,3,10,2,349.00,22,10),
(18,5,4,10,2,490.00,23,11),
(19,6,1,10,1,599.99,24,19),
(20,6,2,10,1,610.99,25,20),
(21,7,1,10,10,455.50,26,21),
(22,7,2,10,1,625.00,27,22),
(23,8,1,10,10,624.50,28,23);

/*Table structure for table `memory` */

DROP TABLE IF EXISTS `memory`;

CREATE TABLE `memory` (
  `memoryID` int(3) NOT NULL AUTO_INCREMENT,
  `memorySize` int(3) NOT NULL,
  `itemCatID` int(3) NOT NULL,
  `itemID` int(3) NOT NULL,
  `itemPrice` double(5,2) NOT NULL,
  PRIMARY KEY (`memoryID`),
  KEY `memoryItemCatID` (`itemCatID`),
  KEY `memoryItemID` (`itemID`),
  CONSTRAINT `memoryItemCatID` FOREIGN KEY (`itemCatID`) REFERENCES `item` (`itemCatID`),
  CONSTRAINT `memoryItemID` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `memory` */

insert  into `memory`(`memoryID`,`memorySize`,`itemCatID`,`itemID`,`itemPrice`) values 
(1,16,3,1,750.50),
(2,32,3,1,500.00),
(3,64,3,1,500.00),
(4,16,1,1,250.00),
(5,32,1,1,250.00),
(6,64,1,1,250.00),
(7,128,1,2,250.00),
(8,32,2,1,750.50),
(9,64,2,1,400.00),
(10,32,4,1,250.00),
(11,64,4,1,300.00),
(12,32,4,2,250.00),
(13,64,4,2,320.00),
(14,128,4,2,430.00),
(15,64,4,3,325.89),
(16,128,4,3,658.84),
(17,32,4,4,459.65),
(18,64,4,4,689.99),
(19,128,4,4,799.99),
(20,64,5,1,629.34),
(21,64,5,2,458.85),
(22,64,5,3,624.50),
(23,64,5,4,350.00),
(24,64,6,1,350.00),
(25,64,6,2,300.00),
(26,64,7,1,300.00),
(27,64,7,2,300.00),
(28,64,8,1,300.00);

/*Table structure for table `order` */

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `orderID` int(5) NOT NULL AUTO_INCREMENT,
  `userID` int(5) NOT NULL,
  `itemDetID` int(5) DEFAULT NULL,
  `ordDate` date DEFAULT NULL,
  `ordQty` int(3) DEFAULT NULL,
  `total` int(8) DEFAULT NULL,
  PRIMARY KEY (`orderID`,`userID`),
  KEY `userID` (`userID`),
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `order` */

/*Table structure for table `paymentdetail` */

DROP TABLE IF EXISTS `paymentdetail`;

CREATE TABLE `paymentdetail` (
  `payMetID` int(3) NOT NULL,
  `cardNumber` int(16) unsigned zerofill NOT NULL,
  `expireDateMonth` int(2) unsigned zerofill NOT NULL,
  `expireDateYear` int(2) NOT NULL,
  `ccv` int(3) unsigned zerofill NOT NULL,
  `funds` double(8,2) NOT NULL,
  PRIMARY KEY (`payMetID`,`cardNumber`),
  CONSTRAINT `paymentdetail_ibfk_2` FOREIGN KEY (`payMetID`) REFERENCES `paymentmethod` (`payMetID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `paymentdetail` */

insert  into `paymentdetail`(`payMetID`,`cardNumber`,`expireDateMonth`,`expireDateYear`,`ccv`,`funds`) values 
(1,0000000000000001,03,12,031,0.00),
(1,0000000000000002,03,12,031,150.25),
(1,0000000000000003,03,12,031,562.23),
(1,0000000000000004,03,12,031,3256.21),
(1,0000000000000005,03,12,032,35568.25),
(1,0000000000000006,03,12,031,354.00),
(1,0000000000000007,03,12,031,356668.00),
(1,0000000000000008,03,12,065,6548.00),
(1,0000000000000009,03,12,658,654.32),
(1,0000004294967295,03,12,031,3256.21);

/*Table structure for table `paymentmethod` */

DROP TABLE IF EXISTS `paymentmethod`;

CREATE TABLE `paymentmethod` (
  `payMetID` int(3) NOT NULL AUTO_INCREMENT,
  `payMetName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`payMetID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `paymentmethod` */

insert  into `paymentmethod`(`payMetID`,`payMetName`) values 
(1,'Visa Debit'),
(2,'Visa Credit'),
(3,'Amex'),
(4,'Paypal');

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `suppID` int(5) NOT NULL AUTO_INCREMENT,
  `suppName` varchar(100) DEFAULT NULL,
  `postCode` varchar(6) DEFAULT NULL,
  `addressLine1` varchar(100) DEFAULT NULL,
  `addressLine2` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`suppID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `supplier` */

/*Table structure for table `supporder` */

DROP TABLE IF EXISTS `supporder`;

CREATE TABLE `supporder` (
  `suppOrdID` int(5) NOT NULL AUTO_INCREMENT,
  `suppID` int(5) NOT NULL,
  `itemCatID` int(5) NOT NULL,
  `itemID` int(5) NOT NULL,
  `qty` int(3) DEFAULT NULL,
  `suppOrdDate` date DEFAULT NULL,
  `deliveryDate` date DEFAULT NULL,
  PRIMARY KEY (`suppOrdID`,`suppID`,`itemCatID`,`itemID`),
  KEY `suppID` (`suppID`),
  KEY `itemCatID` (`itemCatID`),
  KEY `itemID` (`itemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `supporder` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `userID` int(5) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(30) DEFAULT NULL,
  `midName` varchar(100) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(30) DEFAULT NULL,
  `postCode` varchar(6) DEFAULT NULL,
  `addressLine1` varchar(255) DEFAULT NULL,
  `addressLine2` varchar(255) DEFAULT NULL,
  `userType` int(2) DEFAULT NULL,
  PRIMARY KEY (`userID`,`email`),
  KEY `userType` (`userType`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`userType`) REFERENCES `usercategory` (`userCatId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`userID`,`firstName`,`midName`,`lastName`,`email`,`pass`,`postCode`,`addressLine1`,`addressLine2`,`userType`) values 
(1,'Andrea','-','Bizzotto','andrea_bizz8@hotmail.com','123456','E15 4E','21, Maiden Road',NULL,1),
(2,'asdfa','asdf','asdf','asdfasdf','asdf','asdf','asdf','asdf',1),
(3,'Ciao','VCiao','CIao','andrea@gmail.com','ciao','','','',1);

/*Table structure for table `usercategory` */

DROP TABLE IF EXISTS `usercategory`;

CREATE TABLE `usercategory` (
  `userCatId` int(3) NOT NULL,
  `userCatName` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`userCatId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `usercategory` */

insert  into `usercategory`(`userCatId`,`userCatName`) values 
(1,'admin');

/*Table structure for table `wishlist` */

DROP TABLE IF EXISTS `wishlist`;

CREATE TABLE `wishlist` (
  `userID` int(5) DEFAULT NULL,
  `itemDetID` int(5) DEFAULT NULL,
  `itemCatID` int(3) DEFAULT NULL,
  `itemID` int(3) DEFAULT NULL,
  `memoryID` int(3) DEFAULT NULL,
  `colorID` int(3) DEFAULT NULL,
  KEY `userID` (`userID`),
  KEY `itemDetID` (`itemDetID`),
  KEY `itemCatID` (`itemCatID`),
  KEY `itemID` (`itemID`),
  KEY `memoryID` (`memoryID`),
  KEY `colorID` (`colorID`),
  CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`itemDetID`) REFERENCES `itemdetails` (`itemDetID`),
  CONSTRAINT `wishlist_ibfk_3` FOREIGN KEY (`itemCatID`) REFERENCES `itemdetails` (`itemCatID`),
  CONSTRAINT `wishlist_ibfk_4` FOREIGN KEY (`itemID`) REFERENCES `itemdetails` (`itemID`),
  CONSTRAINT `wishlist_ibfk_5` FOREIGN KEY (`memoryID`) REFERENCES `memory` (`memoryID`),
  CONSTRAINT `wishlist_ibfk_6` FOREIGN KEY (`colorID`) REFERENCES `color` (`colorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `wishlist` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
