# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.19-MariaDB)
# Database: second_web
# Generation Time: 2017-05-05 07:34:26 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tokens`;

CREATE TABLE `tokens` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `date_to` varchar(30) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `token` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tokens` WRITE;
/*!40000 ALTER TABLE `tokens` DISABLE KEYS */;

INSERT INTO `tokens` (`uid`, `date_to`, `token`, `login`, `user_id`)
VALUES
	(5,'2017-06-04 21:43:30','32f1bece4e395075f294136f442c902e','admin1','0');

/*!40000 ALTER TABLE `tokens` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(30) DEFAULT NULL,
  `upass` varchar(50) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `uemail` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`uid`, `uname`, `upass`, `fullname`, `uemail`)
VALUES
	(15,'admin1','b59c67bf196a4758191e42f76670ceba','admin1 admin1','admin1@gmail.com'),
	(16,'random','202cb962ac59075b964b07152d234b70','random','random@gmail.com'),
	(17,'sdfsdf','b59c67bf196a4758191e42f76670ceba','sdfsdf','112dfs@gmail.com'),
	(18,'sdfsdfsd','e37ba87089a11fa2d77ca956bd674350','fsdfsf','randosdfsdm@gmail.com'),
	(19,'s334534','1e7c2f3c26ba5a7469dec1ac635e628c','sdssdf','23243234@gmail.com'),
	(20,'123ddd','d39dd746925b9bb251232b0243a6c9a5','123ddd','123ddd@gmail.com'),
	(21,'dfsfsd1111','5b5fc14a0bc7e4fb871d73cd19bfb35f','1111sdfsdff','sdfsfdsd1111f@gmail.com'),
	(22,'dgfgsgsdgf999','9c23c12dfc261c6a62b9cf36f119dc7e','dfgdfgdsfg999','dfgsgsfgsd999@gmail.com'),
	(23,'AZTEK','d39dd746925b9bb251232b0243a6c9a5','AZTEK','AZTEK@gmail.com'),
	(32,'second_web1','e37ba87089a11fa2d77ca956bd674350','second_web1','second_web1@gmail.com');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
