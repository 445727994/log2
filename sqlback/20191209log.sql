# Host: localhost  (Version: 5.7.26)
# Date: 2019-12-09 09:58:31
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "admin_menu"
#

DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "admin_menu"
#

/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` VALUES (1,0,1,'Dashboard','fa-bar-chart','/',NULL,NULL,NULL),(2,0,2,'管理员','fa-tasks','',NULL,NULL,NULL),(3,2,3,'用户','fa-users','auth/users',NULL,NULL,NULL),(4,2,4,'角色','fa-user','auth/roles',NULL,NULL,NULL),(5,2,5,'权限','fa-ban','auth/permissions',NULL,NULL,NULL),(6,2,6,'菜单','fa-bars','auth/menu',NULL,NULL,NULL),(7,2,7,'操作历史','fa-history','auth/logs',NULL,NULL,NULL),(8,0,0,'用户','fa-user',NULL,'auth.management','2019-11-11 03:23:10','2019-11-11 03:23:46'),(9,8,0,'用户列表','fa-bars','users','auth.management','2019-11-11 03:24:09','2019-11-11 03:24:09');
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;

#
# Structure for table "admin_operation_log"
#

DROP TABLE IF EXISTS `admin_operation_log`;
CREATE TABLE `admin_operation_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_operation_log_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "admin_operation_log"
#

/*!40000 ALTER TABLE `admin_operation_log` DISABLE KEYS */;
INSERT INTO `admin_operation_log` VALUES (1,1,'admin','GET','127.0.0.1','[]','2019-11-11 02:24:12','2019-11-11 02:24:12'),(2,1,'admin','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 02:24:16','2019-11-11 02:24:16'),(3,1,'admin','GET','127.0.0.1','[]','2019-11-11 02:28:39','2019-11-11 02:28:39'),(4,1,'admin','GET','127.0.0.1','[]','2019-11-11 02:33:04','2019-11-11 02:33:04'),(5,1,'admin','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 02:33:09','2019-11-11 02:33:09'),(6,1,'admin/auth/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 02:33:11','2019-11-11 02:33:11'),(7,1,'admin/auth/users','GET','127.0.0.1','[]','2019-11-11 02:33:12','2019-11-11 02:33:12'),(8,1,'admin/auth/users','GET','127.0.0.1','[]','2019-11-11 02:33:13','2019-11-11 02:33:13'),(9,1,'admin','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 02:33:14','2019-11-11 02:33:14'),(10,1,'admin/auth/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 02:33:23','2019-11-11 02:33:23'),(11,1,'admin/auth/roles','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 02:34:16','2019-11-11 02:34:16'),(12,1,'admin/auth/permissions','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 02:34:27','2019-11-11 02:34:27'),(13,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 02:34:32','2019-11-11 02:34:32'),(14,1,'admin/auth/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 02:43:19','2019-11-11 02:43:19'),(15,1,'admin/auth/users','GET','127.0.0.1','[]','2019-11-11 02:43:25','2019-11-11 02:43:25'),(16,1,'admin/auth/users','GET','127.0.0.1','[]','2019-11-11 02:43:28','2019-11-11 02:43:28'),(17,1,'admin','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 02:43:31','2019-11-11 02:43:31'),(18,1,'admin/auth/users','GET','127.0.0.1','[]','2019-11-11 03:17:27','2019-11-11 03:17:27'),(19,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-11 03:20:35','2019-11-11 03:20:35'),(20,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:22:54','2019-11-11 03:22:54'),(21,1,'admin/auth/menu','POST','127.0.0.1','{\"parent_id\":\"0\",\"title\":\"\\u7528\\u6237\",\"icon\":\"fa-user\",\"uri\":\"users\",\"roles\":[\"1\",null],\"permission\":\"auth.management\",\"_token\":\"mtDaeyhnTw6IztznPp4J8BcOJAvLQPzo7miIoew7\"}','2019-11-11 03:23:10','2019-11-11 03:23:10'),(22,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-11 03:23:11','2019-11-11 03:23:11'),(23,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-11 03:23:13','2019-11-11 03:23:13'),(24,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 03:23:21','2019-11-11 03:23:21'),(25,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 03:23:25','2019-11-11 03:23:25'),(26,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 03:23:27','2019-11-11 03:23:27'),(27,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 03:23:28','2019-11-11 03:23:28'),(28,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 03:23:29','2019-11-11 03:23:29'),(29,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 03:23:30','2019-11-11 03:23:30'),(30,1,'admin/auth/menu/8/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 03:23:36','2019-11-11 03:23:36'),(31,1,'admin/auth/menu/8','PUT','127.0.0.1','{\"parent_id\":\"0\",\"title\":\"\\u7528\\u6237\",\"icon\":\"fa-user\",\"uri\":null,\"roles\":[\"1\",null],\"permission\":\"auth.management\",\"_token\":\"mtDaeyhnTw6IztznPp4J8BcOJAvLQPzo7miIoew7\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/sfrps.gp93.cn\\/admin\\/auth\\/menu\"}','2019-11-11 03:23:46','2019-11-11 03:23:46'),(32,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-11 03:23:46','2019-11-11 03:23:46'),(33,1,'admin/auth/menu','POST','127.0.0.1','{\"parent_id\":\"8\",\"title\":\"\\u7528\\u6237\\u5217\\u8868\",\"icon\":\"fa-bars\",\"uri\":\"users\",\"roles\":[\"1\",null],\"permission\":\"auth.management\",\"_token\":\"mtDaeyhnTw6IztznPp4J8BcOJAvLQPzo7miIoew7\"}','2019-11-11 03:24:09','2019-11-11 03:24:09'),(34,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-11 03:24:09','2019-11-11 03:24:09'),(35,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 03:24:11','2019-11-11 03:24:11'),(36,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:24:13','2019-11-11 03:24:13'),(37,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 03:24:15','2019-11-11 03:24:15'),(38,1,'admin','GET','127.0.0.1','[]','2019-11-11 03:27:12','2019-11-11 03:27:12'),(39,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:27:15','2019-11-11 03:27:15'),(40,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:29:32','2019-11-11 03:29:32'),(41,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:29:39','2019-11-11 03:29:39'),(42,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:34:32','2019-11-11 03:34:32'),(43,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:35:38','2019-11-11 03:35:38'),(44,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:38:23','2019-11-11 03:38:23'),(45,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:38:34','2019-11-11 03:38:34'),(46,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:40:58','2019-11-11 03:40:58'),(47,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:41:09','2019-11-11 03:41:09'),(48,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:41:18','2019-11-11 03:41:18'),(49,1,'admin/users/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 03:41:22','2019-11-11 03:41:22'),(50,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 03:57:04','2019-11-11 03:57:04'),(51,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:57:05','2019-11-11 03:57:05'),(52,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:57:07','2019-11-11 03:57:07'),(53,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:57:08','2019-11-11 03:57:08'),(54,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:57:09','2019-11-11 03:57:09'),(55,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:57:11','2019-11-11 03:57:11'),(56,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:57:12','2019-11-11 03:57:12'),(57,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:57:13','2019-11-11 03:57:13'),(58,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 03:57:14','2019-11-11 03:57:14'),(59,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:57:16','2019-11-11 03:57:16'),(60,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:57:17','2019-11-11 03:57:17'),(61,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:57:20','2019-11-11 03:57:20'),(62,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:57:22','2019-11-11 03:57:22'),(63,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:57:23','2019-11-11 03:57:23'),(64,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:57:24','2019-11-11 03:57:24'),(65,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:57:28','2019-11-11 03:57:28'),(66,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:57:31','2019-11-11 03:57:31'),(67,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:57:34','2019-11-11 03:57:34'),(68,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:57:35','2019-11-11 03:57:35'),(69,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:57:37','2019-11-11 03:57:37'),(70,1,'admin/users/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 03:57:40','2019-11-11 03:57:40'),(71,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 03:58:25','2019-11-11 03:58:25'),(72,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:58:27','2019-11-11 03:58:27'),(73,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:58:33','2019-11-11 03:58:33'),(74,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:58:34','2019-11-11 03:58:34'),(75,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:58:35','2019-11-11 03:58:35'),(76,1,'admin','GET','127.0.0.1','[]','2019-11-11 03:59:13','2019-11-11 03:59:13'),(77,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 03:59:14','2019-11-11 03:59:14'),(78,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 04:04:22','2019-11-11 04:04:22'),(79,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 04:04:30','2019-11-11 04:04:30'),(80,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 04:07:24','2019-11-11 04:07:24'),(81,1,'admin','GET','127.0.0.1','[]','2019-11-11 04:09:28','2019-11-11 04:09:28'),(82,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 04:09:32','2019-11-11 04:09:32'),(83,1,'admin/users/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 04:09:49','2019-11-11 04:09:49'),(84,1,'admin/users/create','GET','127.0.0.1','[]','2019-11-11 05:53:45','2019-11-11 05:53:45'),(85,1,'admin/users/create','GET','127.0.0.1','[]','2019-11-11 05:54:07','2019-11-11 05:54:07'),(86,1,'admin/users/create','GET','127.0.0.1','[]','2019-11-11 05:54:19','2019-11-11 05:54:19'),(87,1,'admin/users/create','GET','127.0.0.1','[]','2019-11-11 05:55:53','2019-11-11 05:55:53'),(88,1,'admin/users/create','GET','127.0.0.1','[]','2019-11-11 05:56:06','2019-11-11 05:56:06'),(89,1,'admin/users/create','GET','127.0.0.1','[]','2019-11-11 05:56:13','2019-11-11 05:56:13'),(90,1,'admin/users/create','GET','127.0.0.1','[]','2019-11-11 05:56:47','2019-11-11 05:56:47'),(91,1,'admin/users/create','GET','127.0.0.1','[]','2019-11-11 05:57:02','2019-11-11 05:57:02'),(92,1,'admin/users/create','GET','127.0.0.1','[]','2019-11-11 05:57:22','2019-11-11 05:57:22'),(93,1,'admin/users/create','GET','127.0.0.1','[]','2019-11-11 05:57:31','2019-11-11 05:57:31'),(94,1,'admin/users/create','GET','127.0.0.1','[]','2019-11-11 05:57:46','2019-11-11 05:57:46'),(95,1,'admin/users/create','GET','127.0.0.1','[]','2019-11-11 05:58:58','2019-11-11 05:58:58'),(96,1,'admin/users/create','GET','127.0.0.1','[]','2019-11-11 05:59:28','2019-11-11 05:59:28'),(97,1,'admin/users/create','GET','127.0.0.1','[]','2019-11-11 05:59:56','2019-11-11 05:59:56'),(98,1,'admin/users/create','GET','127.0.0.1','[]','2019-11-11 06:00:01','2019-11-11 06:00:01'),(99,1,'admin/users/create','GET','127.0.0.1','[]','2019-11-11 06:00:12','2019-11-11 06:00:12'),(100,1,'admin/users/create','GET','127.0.0.1','[]','2019-11-11 06:00:30','2019-11-11 06:00:30'),(101,1,'admin/users/create','GET','127.0.0.1','[]','2019-11-11 06:02:31','2019-11-11 06:02:31'),(102,1,'admin/users/create','GET','127.0.0.1','[]','2019-11-11 06:03:14','2019-11-11 06:03:14'),(103,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 06:03:21','2019-11-11 06:03:21'),(104,1,'admin/users/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 06:03:23','2019-11-11 06:03:23'),(105,1,'admin/users','POST','127.0.0.1','{\"name\":\"\\u6d4b\\u8bd5\",\"mobile\":\"15639068085\",\"email\":\"1234556@qq.com\",\"wx_nickname\":\"151\",\"wx_head_img\":\"5152\",\"password\":\"152\",\"_token\":\"mtDaeyhnTw6IztznPp4J8BcOJAvLQPzo7miIoew7\",\"_previous_\":\"http:\\/\\/http://frps.gp93.cn\\/admin\\/users\"}','2019-11-11 06:03:37','2019-11-11 06:03:37'),(106,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 06:03:38','2019-11-11 06:03:38'),(107,1,'admin/users/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 06:03:41','2019-11-11 06:03:41'),(108,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 06:03:43','2019-11-11 06:03:43'),(109,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 06:04:27','2019-11-11 06:04:27'),(110,1,'admin/users/1','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 06:04:35','2019-11-11 06:04:35'),(111,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 06:04:37','2019-11-11 06:04:37'),(112,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 06:04:48','2019-11-11 06:04:48'),(113,1,'admin/users/1','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 06:04:51','2019-11-11 06:04:51'),(114,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 06:04:53','2019-11-11 06:04:53'),(115,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 06:05:05','2019-11-11 06:05:05'),(116,1,'admin/users/1','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 06:05:07','2019-11-11 06:05:07'),(117,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 06:05:08','2019-11-11 06:05:08'),(118,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 06:05:28','2019-11-11 06:05:28'),(119,1,'admin/users/1','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 06:05:30','2019-11-11 06:05:30'),(120,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 06:05:36','2019-11-11 06:05:36'),(121,1,'admin/users/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 06:09:57','2019-11-11 06:09:57'),(122,1,'admin/users/1','PUT','127.0.0.1','{\"name\":\"\\u6d4b\\u8bd5\",\"mobile\":\"15639068085\",\"email\":\"1234556@qq.com\",\"wx_nickname\":\"151\",\"wx_head_img\":\"5152\",\"password\":\"41515\",\"_token\":\"mtDaeyhnTw6IztznPp4J8BcOJAvLQPzo7miIoew7\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/http://frps.gp93.cn\\/admin\\/users\"}','2019-11-11 06:10:00','2019-11-11 06:10:00'),(123,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 06:10:01','2019-11-11 06:10:01'),(124,1,'admin/users','GET','127.0.0.1','[]','2019-11-11 06:15:40','2019-11-11 06:15:40'),(125,1,'admin/users','GET','127.0.0.1','{\"__search__\":\"title:foo\",\"_pjax\":\"#pjax-container\"}','2019-11-11 06:17:16','2019-11-11 06:17:16'),(126,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\",\"__search__\":\"title:\"}','2019-11-11 06:17:20','2019-11-11 06:17:20'),(127,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\",\"__search__\":null}','2019-11-11 06:17:22','2019-11-11 06:17:22'),(128,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\",\"__search__\":\"title:\\u6d4b\\u8bd5\"}','2019-11-11 06:17:27','2019-11-11 06:17:27'),(129,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\",\"__search__\":\"name:\\u6d4b\\u8bd5\"}','2019-11-11 06:17:32','2019-11-11 06:17:32'),(130,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\",\"__search__\":null}','2019-11-11 06:18:16','2019-11-11 06:18:16'),(131,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\",\"__search__\":\"mobile:15639068085\"}','2019-11-11 06:18:40','2019-11-11 06:18:40'),(132,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\",\"__search__\":\"mobile:15639068085\"}','2019-11-11 06:18:42','2019-11-11 06:18:42'),(133,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\",\"__search__\":\"mobile:15639068085\"}','2019-11-11 06:18:45','2019-11-11 06:18:45'),(134,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\",\"__search__\":null}','2019-11-11 06:18:47','2019-11-11 06:18:47'),(135,1,'admin/users/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 06:18:53','2019-11-11 06:18:53'),(136,1,'admin/users','GET','127.0.0.1','{\"__search__\":null,\"_pjax\":\"#pjax-container\"}','2019-11-11 06:18:56','2019-11-11 06:18:56'),(137,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\",\"id\":null}','2019-11-11 06:19:00','2019-11-11 06:19:00'),(138,1,'admin/users','GET','127.0.0.1','{\"id\":null}','2019-11-11 06:22:06','2019-11-11 06:22:06'),(139,1,'admin/users','GET','127.0.0.1','{\"id\":null}','2019-11-11 06:29:10','2019-11-11 06:29:10'),(140,1,'admin/users','GET','127.0.0.1','{\"__search__\":\"1\",\"_pjax\":\"#pjax-container\"}','2019-11-11 06:29:13','2019-11-11 06:29:13'),(141,1,'admin/users','GET','127.0.0.1','{\"__search__\":\"1\"}','2019-11-11 06:46:49','2019-11-11 06:46:49'),(142,1,'admin/users','GET','127.0.0.1','{\"__search__\":\"1\"}','2019-11-11 06:47:18','2019-11-11 06:47:18'),(143,1,'admin/users','GET','127.0.0.1','{\"__search__\":\"1\"}','2019-11-11 06:47:32','2019-11-11 06:47:32'),(144,1,'admin/users','GET','127.0.0.1','{\"__search__\":\"1\"}','2019-11-11 06:47:49','2019-11-11 06:47:49'),(145,1,'admin/users','GET','127.0.0.1','{\"__search__\":\"1\"}','2019-11-11 06:49:05','2019-11-11 06:49:05'),(146,1,'admin/users','GET','127.0.0.1','{\"__search__\":\"1\"}','2019-11-11 06:49:27','2019-11-11 06:49:27'),(147,1,'admin/users','GET','127.0.0.1','{\"__search__\":\"1\"}','2019-11-11 06:50:06','2019-11-11 06:50:06'),(148,1,'admin/users','GET','127.0.0.1','{\"__search__\":\"1\"}','2019-11-11 06:50:22','2019-11-11 06:50:22'),(149,1,'admin/users','GET','127.0.0.1','{\"__search__\":\"1\"}','2019-11-11 06:50:36','2019-11-11 06:50:36'),(150,1,'admin/users','GET','127.0.0.1','{\"__search__\":\"1\"}','2019-11-11 06:51:17','2019-11-11 06:51:17'),(151,1,'admin/users','GET','127.0.0.1','{\"__search__\":\"1\"}','2019-11-11 06:51:40','2019-11-11 06:51:40'),(152,1,'admin/users','GET','127.0.0.1','{\"__search__\":\"1\"}','2019-11-11 07:28:14','2019-11-11 07:28:14'),(153,1,'admin/users/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 07:28:19','2019-11-11 07:28:19'),(154,1,'admin','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-11 07:29:47','2019-11-11 07:29:47'),(155,1,'admin/users','GET','127.0.0.1','[]','2019-12-07 02:49:46','2019-12-07 02:49:46'),(156,1,'admin','GET','127.0.0.1','[]','2019-12-07 02:49:49','2019-12-07 02:49:49'),(157,1,'admin','GET','127.0.0.1','[]','2019-12-07 02:49:52','2019-12-07 02:49:52'),(158,1,'admin','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-12-07 02:49:55','2019-12-07 02:49:55'),(159,1,'admin','GET','127.0.0.1','[]','2019-12-07 03:10:14','2019-12-07 03:10:14'),(160,1,'admin','GET','127.0.0.1','[]','2019-12-07 03:15:03','2019-12-07 03:15:03'),(161,1,'admin/auth/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-12-07 03:15:07','2019-12-07 03:15:07'),(162,1,'admin/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-12-07 03:15:11','2019-12-07 03:15:11'),(163,1,'admin','GET','127.0.0.1','[]','2019-12-07 03:35:49','2019-12-07 03:35:49'),(164,1,'admin/users','GET','127.0.0.1','[]','2019-12-07 03:36:42','2019-12-07 03:36:42'),(165,1,'admin/users','GET','127.0.0.1','[]','2019-12-07 03:37:33','2019-12-07 03:37:33'),(166,1,'admin/users','GET','127.0.0.1','[]','2019-12-07 04:05:22','2019-12-07 04:05:22'),(167,1,'admin/cates','GET','127.0.0.1','[]','2019-12-07 06:19:47','2019-12-07 06:19:47'),(168,1,'admin/cates','GET','127.0.0.1','[]','2019-12-07 06:20:09','2019-12-07 06:20:09'),(169,1,'admin/cates','GET','127.0.0.1','[]','2019-12-07 06:38:35','2019-12-07 06:38:35'),(170,1,'admin/bills','GET','127.0.0.1','[]','2019-12-07 06:38:46','2019-12-07 06:38:46'),(171,1,'admin/bills','GET','127.0.0.1','[]','2019-12-07 06:40:53','2019-12-07 06:40:53'),(172,1,'admin/bills','GET','127.0.0.1','[]','2019-12-07 06:41:19','2019-12-07 06:41:19'),(173,1,'admin/bills','GET','127.0.0.1','[]','2019-12-07 06:56:29','2019-12-07 06:56:29'),(174,1,'admin/bills/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-12-07 06:56:31','2019-12-07 06:56:31'),(175,1,'admin/bills/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-12-07 06:56:33','2019-12-07 06:56:33'),(176,1,'admin/bills','GET','127.0.0.1','[]','2019-12-07 06:56:36','2019-12-07 06:56:36'),(177,1,'admin/bills','GET','127.0.0.1','[]','2019-12-07 06:57:08','2019-12-07 06:57:08'),(178,1,'admin/bills/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-12-07 06:57:12','2019-12-07 06:57:12'),(179,1,'admin/bills/create','GET','127.0.0.1','[]','2019-12-07 06:59:02','2019-12-07 06:59:02'),(180,1,'admin/bills','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-12-07 07:03:50','2019-12-07 07:03:50'),(181,1,'admin/bills','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-12-07 07:03:51','2019-12-07 07:03:51'),(182,1,'admin/bills','GET','127.0.0.1','[]','2019-12-07 07:03:53','2019-12-07 07:03:53'),(183,1,'admin/bills','GET','127.0.0.1','[]','2019-12-07 07:04:51','2019-12-07 07:04:51'),(184,1,'admin/bills','GET','127.0.0.1','[]','2019-12-07 07:06:47','2019-12-07 07:06:47'),(185,1,'admin/bills','GET','127.0.0.1','[]','2019-12-07 07:07:08','2019-12-07 07:07:08'),(186,1,'admin/bills','GET','127.0.0.1','[]','2019-12-07 07:09:19','2019-12-07 07:09:19'),(187,1,'admin/bills','GET','127.0.0.1','[]','2019-12-07 07:09:40','2019-12-07 07:09:40'),(188,1,'admin/bills','GET','127.0.0.1','[]','2019-12-07 07:09:48','2019-12-07 07:09:48'),(189,1,'admin/bills','GET','127.0.0.1','[]','2019-12-07 07:10:37','2019-12-07 07:10:37'),(190,1,'admin/bills','GET','127.0.0.1','[]','2019-12-07 07:11:51','2019-12-07 07:11:51'),(191,1,'admin/bills','GET','127.0.0.1','[]','2019-12-07 07:12:47','2019-12-07 07:12:47'),(192,1,'admin/bills','GET','127.0.0.1','[]','2019-12-07 07:15:41','2019-12-07 07:15:41'),(193,1,'admin/bills','GET','127.0.0.1','[]','2019-12-07 07:17:11','2019-12-07 07:17:11'),(194,1,'admin/bills/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-12-07 07:17:14','2019-12-07 07:17:14'),(195,1,'admin/bills','GET','127.0.0.1','[]','2019-12-07 07:17:17','2019-12-07 07:17:17'),(196,1,'admin/bills','GET','127.0.0.1','[]','2019-12-07 07:17:44','2019-12-07 07:17:44'),(197,1,'admin/bills/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-12-07 07:17:45','2019-12-07 07:17:45'),(198,1,'admin/bills/create','GET','127.0.0.1','[]','2019-12-07 07:18:58','2019-12-07 07:18:58'),(199,1,'admin/bills/create','GET','127.0.0.1','[]','2019-12-07 07:19:09','2019-12-07 07:19:09'),(200,1,'admin/bills/create','GET','127.0.0.1','[]','2019-12-07 07:21:00','2019-12-07 07:21:00'),(201,1,'admin/bills/create','GET','127.0.0.1','[]','2019-12-07 07:22:34','2019-12-07 07:22:34'),(202,1,'admin/bills/create','GET','127.0.0.1','[]','2019-12-07 07:24:37','2019-12-07 07:24:37'),(203,1,'admin/bills/create','GET','127.0.0.1','[]','2019-12-07 07:24:46','2019-12-07 07:24:46'),(204,1,'admin/bills/create','GET','127.0.0.1','[]','2019-12-07 07:25:39','2019-12-07 07:25:39'),(205,1,'admin/bills/create','GET','127.0.0.1','[]','2019-12-07 07:26:05','2019-12-07 07:26:05'),(206,1,'admin/bills/create','GET','127.0.0.1','[]','2019-12-07 07:26:17','2019-12-07 07:26:17'),(207,1,'admin/bills/create','GET','127.0.0.1','[]','2019-12-07 07:26:28','2019-12-07 07:26:28'),(208,1,'admin/bills/create','GET','127.0.0.1','[]','2019-12-07 07:27:21','2019-12-07 07:27:21'),(209,1,'admin/bills','POST','127.0.0.1','{\"user\":{\"name\":\"1\"},\"money\":\"10\",\"type\":\"1\",\"bank_id\":\"1\",\"cate_id\":\"1\",\"_token\":\"7agnKIX7TBBnZUom9niar2B3KzxD5CSvRogy2kPw\"}','2019-12-07 07:27:33','2019-12-07 07:27:33'),(210,1,'admin/bills/create','GET','127.0.0.1','[]','2019-12-07 07:27:35','2019-12-07 07:27:35'),(211,1,'admin/bills','POST','127.0.0.1','{\"user\":{\"name\":\"1\"},\"money\":\"10\",\"type\":\"1\",\"bank_id\":\"1\",\"cate_id\":\"1\",\"_token\":\"7agnKIX7TBBnZUom9niar2B3KzxD5CSvRogy2kPw\"}','2019-12-07 07:28:22','2019-12-07 07:28:22'),(212,1,'admin/bills/create','GET','127.0.0.1','[]','2019-12-07 07:28:23','2019-12-07 07:28:23'),(213,1,'admin/bills/create','GET','127.0.0.1','[]','2019-12-07 07:30:05','2019-12-07 07:30:05'),(214,1,'admin/bills','GET','127.0.0.1','[]','2019-12-07 07:30:48','2019-12-07 07:30:48'),(215,1,'admin/bills/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-12-07 07:30:51','2019-12-07 07:30:51'),(216,1,'admin/bills/1/edit','GET','127.0.0.1','[]','2019-12-07 07:31:07','2019-12-07 07:31:07'),(217,1,'admin/bills/1/edit','GET','127.0.0.1','[]','2019-12-07 07:31:55','2019-12-07 07:31:55'),(218,1,'admin/bills/1/edit','GET','127.0.0.1','[]','2019-12-07 07:32:00','2019-12-07 07:32:00'),(219,1,'admin/bills/1/edit','GET','127.0.0.1','[]','2019-12-07 07:32:56','2019-12-07 07:32:56'),(220,1,'admin/bills/1/edit','GET','127.0.0.1','[]','2019-12-07 07:32:56','2019-12-07 07:32:56'),(221,1,'admin/bills/1/edit','GET','127.0.0.1','[]','2019-12-07 07:34:01','2019-12-07 07:34:01'),(222,1,'admin/bills/1/edit','GET','127.0.0.1','[]','2019-12-07 07:34:09','2019-12-07 07:34:09'),(223,1,'admin/bills/1/edit','GET','127.0.0.1','[]','2019-12-07 07:34:19','2019-12-07 07:34:19'),(224,1,'admin/bills/1/edit','GET','127.0.0.1','[]','2019-12-07 07:35:12','2019-12-07 07:35:12'),(225,1,'admin/bills/1001/edit','GET','127.0.0.1','[]','2019-12-07 07:35:17','2019-12-07 07:35:17'),(226,1,'admin/bills/1001/edit','GET','127.0.0.1','[]','2019-12-07 07:35:23','2019-12-07 07:35:23'),(227,1,'admin/bills/1001/edit','GET','127.0.0.1','[]','2019-12-07 07:36:17','2019-12-07 07:36:17'),(228,1,'admin/bills/1001/edit','GET','127.0.0.1','[]','2019-12-07 07:36:41','2019-12-07 07:36:41'),(229,1,'admin/bills/1/edit','GET','127.0.0.1','[]','2019-12-07 07:38:58','2019-12-07 07:38:58'),(230,1,'admin/bills/1/edit','GET','127.0.0.1','[]','2019-12-07 07:39:26','2019-12-07 07:39:26'),(231,1,'admin/bills/1/edit','GET','127.0.0.1','[]','2019-12-07 07:39:39','2019-12-07 07:39:39'),(232,1,'admin/bills/1/edit','GET','127.0.0.1','[]','2019-12-07 07:39:42','2019-12-07 07:39:42'),(233,1,'admin/bills/1/edit','GET','127.0.0.1','[]','2019-12-07 07:39:50','2019-12-07 07:39:50'),(234,1,'admin/bills/1/edit','GET','127.0.0.1','[]','2019-12-07 07:39:55','2019-12-07 07:39:55'),(235,1,'admin/bills/1/edit','GET','127.0.0.1','[]','2019-12-07 07:40:07','2019-12-07 07:40:07'),(236,1,'admin/bills/1/edit','GET','127.0.0.1','[]','2019-12-07 07:40:20','2019-12-07 07:40:20'),(237,1,'admin/bills/1/edit','GET','127.0.0.1','[]','2019-12-07 07:41:00','2019-12-07 07:41:00'),(238,1,'admin/bills/1/edit','GET','127.0.0.1','[]','2019-12-07 08:01:14','2019-12-07 08:01:14'),(239,1,'admin','GET','127.0.0.1','[]','2019-12-07 08:45:49','2019-12-07 08:45:49');
/*!40000 ALTER TABLE `admin_operation_log` ENABLE KEYS */;

#
# Structure for table "admin_permissions"
#

DROP TABLE IF EXISTS `admin_permissions`;
CREATE TABLE `admin_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_permissions_name_unique` (`name`),
  UNIQUE KEY `admin_permissions_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "admin_permissions"
#

/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;
INSERT INTO `admin_permissions` VALUES (1,'All permission','*','','*',NULL,NULL),(2,'Dashboard','dashboard','GET','/',NULL,NULL),(3,'Login','auth.login','','/auth/login\r\n/auth/logout',NULL,NULL),(4,'User setting','auth.setting','GET,PUT','/auth/setting',NULL,NULL),(5,'Auth management','auth.management','','/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs',NULL,NULL);
/*!40000 ALTER TABLE `admin_permissions` ENABLE KEYS */;

#
# Structure for table "admin_role_menu"
#

DROP TABLE IF EXISTS `admin_role_menu`;
CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "admin_role_menu"
#

/*!40000 ALTER TABLE `admin_role_menu` DISABLE KEYS */;
INSERT INTO `admin_role_menu` VALUES (1,2,NULL,NULL),(1,8,NULL,NULL),(1,9,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;

#
# Structure for table "admin_role_permissions"
#

DROP TABLE IF EXISTS `admin_role_permissions`;
CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "admin_role_permissions"
#

/*!40000 ALTER TABLE `admin_role_permissions` DISABLE KEYS */;
INSERT INTO `admin_role_permissions` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_permissions` ENABLE KEYS */;

#
# Structure for table "admin_role_users"
#

DROP TABLE IF EXISTS `admin_role_users`;
CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "admin_role_users"
#

/*!40000 ALTER TABLE `admin_role_users` DISABLE KEYS */;
INSERT INTO `admin_role_users` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_users` ENABLE KEYS */;

#
# Structure for table "admin_roles"
#

DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE `admin_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_roles_name_unique` (`name`),
  UNIQUE KEY `admin_roles_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "admin_roles"
#

/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` VALUES (1,'Administrator','administrator','2019-11-11 02:17:34','2019-11-11 02:17:34');
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;

#
# Structure for table "admin_user_permissions"
#

DROP TABLE IF EXISTS `admin_user_permissions`;
CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "admin_user_permissions"
#

/*!40000 ALTER TABLE `admin_user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_user_permissions` ENABLE KEYS */;

#
# Structure for table "admin_users"
#

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_username_unique` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "admin_users"
#

/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'admin','$2y$10$6xsYXQkHH/3HfrnGMpDiY.RA.E5zgT14dTYv5FAaGNqpjKbdNFwJG','Administrator',NULL,'Nb3GeiM4hHiXebDfjN3Wxohh5Mv2FshgxjyYgRJWQPKzQAtVOWtqJKy3Sh2M','2019-11-11 02:17:34','2019-11-11 02:17:34');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;

#
# Structure for table "failed_jobs"
#

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "failed_jobs"
#

/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

#
# Structure for table "migrations"
#

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "migrations"
#

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_01_04_173148_create_admin_tables',1),(4,'2019_08_19_000000_create_failed_jobs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

#
# Structure for table "password_resets"
#

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "password_resets"
#

/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

#
# Structure for table "user_bank"
#

DROP TABLE IF EXISTS `user_bank`;
CREATE TABLE `user_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `name` varchar(100) DEFAULT '',
  `code` varchar(50) NOT NULL DEFAULT '',
  `type` int(11) DEFAULT '0' COMMENT '类型 暂无关',
  `day_time` int(3) NOT NULL DEFAULT '0' COMMENT '还款日',
  `bill_time` int(10) NOT NULL DEFAULT '0' COMMENT '账单日',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "user_bank"
#

/*!40000 ALTER TABLE `user_bank` DISABLE KEYS */;
INSERT INTO `user_bank` VALUES (1,1,'招商','0652',0,0,0,NULL,NULL);
/*!40000 ALTER TABLE `user_bank` ENABLE KEYS */;

#
# Structure for table "user_bill"
#

DROP TABLE IF EXISTS `user_bill`;
CREATE TABLE `user_bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `type` int(1) NOT NULL DEFAULT '0' COMMENT '0支出1收入',
  `cate_id` int(11) NOT NULL DEFAULT '0' COMMENT '分类ID',
  `bank_id` int(11) NOT NULL DEFAULT '0',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

#
# Data for table "user_bill"
#

/*!40000 ALTER TABLE `user_bill` DISABLE KEYS */;
INSERT INTO `user_bill` VALUES (1,1,10.00,1,1,1,'2019-12-07','2019-12-07'),(2,0,10.00,1,1,1,'2019-12-07','2019-12-07'),(10,0,100.00,1,1,1,NULL,NULL);
/*!40000 ALTER TABLE `user_bill` ENABLE KEYS */;

#
# Structure for table "user_cate"
#

DROP TABLE IF EXISTS `user_cate`;
CREATE TABLE `user_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `name` varchar(100) DEFAULT '',
  `type` int(11) DEFAULT '0' COMMENT '类型 暂无关',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "user_cate"
#

/*!40000 ALTER TABLE `user_cate` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_cate` ENABLE KEYS */;

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `wx_openid` varchar(100) CHARACTER SET utf8mb4 NOT NULL DEFAULT '',
  `wx_nickname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `wx_head_img` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "users"
#

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'测试','1234556@qq.com',NULL,'$2y$10$uRb2/Swd5ICgYckKj4/CfeaXqNZqYpql1dldsJcdCgR1Hw4Q51LUm',NULL,'2019-11-11 06:03:37','2019-11-11 06:10:01','15639068085','','151','5152');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
