-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table db_hems.tbl_condem_data
CREATE TABLE IF NOT EXISTS `tbl_condem_data` (
  `Condem_code` int(11) NOT NULL AUTO_INCREMENT,
  `Item_id` int(10) DEFAULT NULL,
  `Item_name` varchar(50) DEFAULT NULL,
  `Condem_Date` date DEFAULT NULL,
  `Condem_reasion` varchar(50) DEFAULT NULL,
  `Condem_commity` varchar(200) DEFAULT NULL,
  `Location_Name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Condem_code`),
  KEY `FK_tbl_condem_data_tbl_item` (`Item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table db_hems.tbl_designation
CREATE TABLE IF NOT EXISTS `tbl_designation` (
  `userdesignation_ID` int(11) NOT NULL AUTO_INCREMENT,
  `userdesignation_Level` varchar(100) NOT NULL,
  `user_designation` varchar(100) NOT NULL,
  PRIMARY KEY (`userdesignation_ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table db_hems.tbl_donation
CREATE TABLE IF NOT EXISTS `tbl_donation` (
  `donation_Id` int(11) NOT NULL AUTO_INCREMENT,
  `donation_type` varchar(50) DEFAULT NULL,
  `donation_name` varchar(100) DEFAULT NULL,
  `donation_mobile` int(10) NOT NULL,
  `donation_address` varchar(100) DEFAULT NULL,
  `donation_country` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`donation_Id`),
  UNIQUE KEY `donation_mobile` (`donation_mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table db_hems.tbl_item
CREATE TABLE IF NOT EXISTS `tbl_item` (
  `Item_id` int(10) NOT NULL AUTO_INCREMENT,
  `Item_name` tinytext DEFAULT NULL,
  `Item_type` varchar(50) DEFAULT NULL,
  `Item_price` varchar(50) DEFAULT NULL,
  `Supplier_Name` varchar(50) DEFAULT NULL,
  `Purchase_date` date DEFAULT NULL,
  `Invoice_No` varchar(50) DEFAULT NULL,
  `Warranty` varchar(50) DEFAULT NULL,
  `Item_Modleno` varchar(50) DEFAULT NULL,
  `Location_Name` varchar(50) DEFAULT NULL,
  `Item_qrcode` varchar(50) DEFAULT NULL,
  `Item_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table db_hems.tbl_itemname
CREATE TABLE IF NOT EXISTS `tbl_itemname` (
  `itemname_id` int(11) NOT NULL AUTO_INCREMENT,
  `Item_name` tinytext DEFAULT NULL,
  PRIMARY KEY (`itemname_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table db_hems.tbl_itemstatus
CREATE TABLE IF NOT EXISTS `tbl_itemstatus` (
  `ItemStatus_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Item_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ItemStatus_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table db_hems.tbl_item_type
CREATE TABLE IF NOT EXISTS `tbl_item_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `Item_type` text DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table db_hems.tbl_location
CREATE TABLE IF NOT EXISTS `tbl_location` (
  `Location_id` int(11) NOT NULL AUTO_INCREMENT,
  `Location_Name` varchar(100) DEFAULT NULL,
  `Location_Type` varchar(50) DEFAULT NULL,
  `Location_District` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table db_hems.tbl_login
CREATE TABLE IF NOT EXISTS `tbl_login` (
  `login_Id` int(11) NOT NULL AUTO_INCREMENT,
  `login_username` varchar(50) NOT NULL DEFAULT '0',
  `login_password` varchar(100) NOT NULL DEFAULT '0',
  `login_role` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`login_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table db_hems.tbl_org donation
CREATE TABLE IF NOT EXISTS `tbl_org donation` (
  `Item_Name` varchar(50) DEFAULT NULL,
  `Item_Id` varchar(50) DEFAULT NULL,
  `Local organization name` varchar(50) DEFAULT NULL,
  `Local org Address` varchar(50) DEFAULT NULL,
  `District` varchar(50) DEFAULT NULL,
  `Donation Date` varchar(50) DEFAULT NULL,
  `Donation_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table db_hems.tbl_repair
CREATE TABLE IF NOT EXISTS `tbl_repair` (
  `repair_id` int(11) NOT NULL AUTO_INCREMENT,
  `Item_id` int(10) DEFAULT NULL,
  `Item_Name` varchar(50) DEFAULT NULL,
  `repair_date` date DEFAULT NULL,
  `repair_org` varchar(50) DEFAULT NULL,
  `repair_Cost` varchar(50) DEFAULT NULL,
  `Item_Modleno` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`repair_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table db_hems.tbl_role
CREATE TABLE IF NOT EXISTS `tbl_role` (
  `user_roleid` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_roleid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table db_hems.tbl_service_record
CREATE TABLE IF NOT EXISTS `tbl_service_record` (
  `Service_code` int(11) NOT NULL AUTO_INCREMENT,
  `Item_Id` varchar(50) DEFAULT NULL,
  `Item_Name` varchar(50) DEFAULT NULL,
  `Last sevice Date` date DEFAULT NULL,
  `Service Organization` varchar(50) DEFAULT NULL,
  `Service_Duration` varchar(50) DEFAULT NULL,
  `Service_Cost` varchar(50) DEFAULT NULL,
  `Next_Service Date` date DEFAULT NULL,
  PRIMARY KEY (`Service_code`),
  KEY `Item_Id` (`Item_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table db_hems.tbl_supplier
CREATE TABLE IF NOT EXISTS `tbl_supplier` (
  `Supplier_Id` int(100) NOT NULL AUTO_INCREMENT,
  `Supplier_Name` varchar(50) DEFAULT NULL,
  `Supplier_Email` varchar(50) DEFAULT NULL,
  `Supplier_Mobile` int(10) DEFAULT NULL,
  `Supplier_Address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Supplier_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table db_hems.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_nic` varchar(50) DEFAULT '',
  `user_email` varchar(50) DEFAULT '',
  `user_name` varchar(100) DEFAULT '',
  `user_address` varchar(100) NOT NULL DEFAULT '',
  `user_designation` varchar(50) DEFAULT '',
  `user_mobile` int(11) NOT NULL,
  `user_dob` date DEFAULT NULL,
  `Location_Name` varchar(50) DEFAULT NULL,
  `user_role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_nic` (`user_nic`,`user_email`,`user_mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
