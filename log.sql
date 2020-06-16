/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50644
Source Host           : 127.0.0.1:3306
Source Database       : log

Target Server Type    : MYSQL
Target Server Version : 50644
File Encoding         : 65001

Date: 2020-06-16 21:59:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_menu
-- ----------------------------
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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_menu
-- ----------------------------
INSERT INTO `admin_menu` VALUES ('1', '0', '1', 'Dashboard', 'fa-bar-chart', '/', null, null, null);
INSERT INTO `admin_menu` VALUES ('2', '0', '2', '管理员', 'fa-tasks', '', null, null, null);
INSERT INTO `admin_menu` VALUES ('3', '2', '3', '用户', 'fa-users', 'auth/users', null, null, null);
INSERT INTO `admin_menu` VALUES ('4', '2', '4', '角色', 'fa-user', 'auth/roles', null, null, null);
INSERT INTO `admin_menu` VALUES ('5', '2', '5', '权限', 'fa-ban', 'auth/permissions', null, null, null);
INSERT INTO `admin_menu` VALUES ('6', '2', '6', '菜单', 'fa-bars', 'auth/menu', null, null, null);
INSERT INTO `admin_menu` VALUES ('7', '2', '7', '操作历史', 'fa-history', 'auth/logs', null, null, null);
INSERT INTO `admin_menu` VALUES ('8', '0', '0', '用户', 'fa-user', null, 'auth.management', '2019-11-11 03:23:10', '2019-11-11 03:23:46');
INSERT INTO `admin_menu` VALUES ('9', '8', '0', '用户列表', 'fa-bars', 'users', 'auth.management', '2019-11-11 03:24:09', '2019-11-11 03:24:09');
INSERT INTO `admin_menu` VALUES ('10', '0', '0', '系统设置', 'fa-bars', null, null, '2019-12-17 06:08:08', '2019-12-17 06:08:08');
INSERT INTO `admin_menu` VALUES ('11', '10', '0', 'APP设置', 'fa-bars', 'app-settings', null, '2019-12-17 06:08:24', '2019-12-17 06:08:24');

-- ----------------------------
-- Table structure for admin_operation_log
-- ----------------------------
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
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_operation_log
-- ----------------------------
INSERT INTO `admin_operation_log` VALUES ('1', '1', 'admin/app-settings', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/app-settings\"}', '2020-02-22 06:23:13', '2020-02-22 06:23:13');
INSERT INTO `admin_operation_log` VALUES ('2', '1', 'admin/app-settings', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/app-settings\"}', '2020-02-22 06:39:14', '2020-02-22 06:39:14');
INSERT INTO `admin_operation_log` VALUES ('3', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\",\"_pjax\":\"#pjax-container\"}', '2020-02-22 06:39:19', '2020-02-22 06:39:19');
INSERT INTO `admin_operation_log` VALUES ('4', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\",\"_pjax\":\"#pjax-container\"}', '2020-02-22 06:39:57', '2020-02-22 06:39:57');
INSERT INTO `admin_operation_log` VALUES ('5', '1', 'admin/app-settings', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/app-settings\"}', '2020-02-25 12:50:42', '2020-02-25 12:50:42');
INSERT INTO `admin_operation_log` VALUES ('6', '1', 'admin/app-settings', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/app-settings\"}', '2020-02-25 13:01:36', '2020-02-25 13:01:36');
INSERT INTO `admin_operation_log` VALUES ('7', '1', 'admin/app-settings', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/app-settings\"}', '2020-02-26 09:41:18', '2020-02-26 09:41:18');
INSERT INTO `admin_operation_log` VALUES ('8', '1', 'admin/app-settings', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/app-settings\"}', '2020-02-26 13:42:26', '2020-02-26 13:42:26');
INSERT INTO `admin_operation_log` VALUES ('9', '1', 'admin/app-settings', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/app-settings\"}', '2020-02-27 12:56:33', '2020-02-27 12:56:33');
INSERT INTO `admin_operation_log` VALUES ('10', '1', 'admin/app-settings', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/app-settings\",\"_pjax\":\"#pjax-container\"}', '2020-02-27 12:56:38', '2020-02-27 12:56:38');
INSERT INTO `admin_operation_log` VALUES ('11', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\",\"_pjax\":\"#pjax-container\"}', '2020-02-27 12:56:41', '2020-02-27 12:56:41');
INSERT INTO `admin_operation_log` VALUES ('12', '1', 'admin/users', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/users\",\"_pjax\":\"#pjax-container\"}', '2020-02-27 12:56:49', '2020-02-27 12:56:49');
INSERT INTO `admin_operation_log` VALUES ('13', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\"}', '2020-02-27 12:57:30', '2020-02-27 12:57:30');
INSERT INTO `admin_operation_log` VALUES ('14', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\"}', '2020-02-27 13:10:33', '2020-02-27 13:10:33');
INSERT INTO `admin_operation_log` VALUES ('15', '1', 'admin/auth/users', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/auth\\/users\",\"_pjax\":\"#pjax-container\"}', '2020-02-27 13:10:36', '2020-02-27 13:10:36');
INSERT INTO `admin_operation_log` VALUES ('16', '1', 'admin/auth/roles', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/auth\\/roles\",\"_pjax\":\"#pjax-container\"}', '2020-02-27 13:10:38', '2020-02-27 13:10:38');
INSERT INTO `admin_operation_log` VALUES ('17', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\"}', '2020-02-28 11:54:50', '2020-02-28 11:54:50');
INSERT INTO `admin_operation_log` VALUES ('18', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\"}', '2020-02-29 08:40:50', '2020-02-29 08:40:50');
INSERT INTO `admin_operation_log` VALUES ('19', '1', 'admin/ads', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\"}', '2020-02-29 08:40:58', '2020-02-29 08:40:58');
INSERT INTO `admin_operation_log` VALUES ('20', '1', 'admin/ads', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\"}', '2020-02-29 08:42:02', '2020-02-29 08:42:02');
INSERT INTO `admin_operation_log` VALUES ('21', '1', 'admin/ad-cates', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ad-cates\"}', '2020-02-29 08:46:59', '2020-02-29 08:46:59');
INSERT INTO `admin_operation_log` VALUES ('22', '1', 'admin/ad-cates/create', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ad-cates\\/create\",\"_pjax\":\"#pjax-container\"}', '2020-02-29 08:47:03', '2020-02-29 08:47:03');
INSERT INTO `admin_operation_log` VALUES ('23', '1', 'admin/ad-cates', 'POST', '192.168.31.158', '{\"name\":\"\\u9996\\u9875\\u5e7f\\u544a\\u4f4d\",\"_token\":\"Q4a37ivIaVHOm8eYoZQX8BAGXmWx88kExI0AUuEj\",\"_previous_\":\"http:\\/\\/log.mn\\/admin\\/ad-cates\",\"s\":\"\\/admin\\/ad-cates\"}', '2020-02-29 08:47:11', '2020-02-29 08:47:11');
INSERT INTO `admin_operation_log` VALUES ('24', '1', 'admin/ad-cates', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ad-cates\"}', '2020-02-29 08:47:12', '2020-02-29 08:47:12');
INSERT INTO `admin_operation_log` VALUES ('25', '1', 'admin/ads', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\"}', '2020-02-29 08:52:30', '2020-02-29 08:52:30');
INSERT INTO `admin_operation_log` VALUES ('26', '1', 'admin/ad-cates', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ad-cates\"}', '2020-02-29 08:56:57', '2020-02-29 08:56:57');
INSERT INTO `admin_operation_log` VALUES ('27', '1', 'admin/ad-cates', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ad-cates\"}', '2020-02-29 08:57:45', '2020-02-29 08:57:45');
INSERT INTO `admin_operation_log` VALUES ('28', '1', 'admin/ad-cates', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ad-cates\"}', '2020-02-29 09:24:51', '2020-02-29 09:24:51');
INSERT INTO `admin_operation_log` VALUES ('29', '1', 'admin/ads', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\"}', '2020-02-29 09:24:54', '2020-02-29 09:24:54');
INSERT INTO `admin_operation_log` VALUES ('30', '1', 'admin/ads', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\"}', '2020-02-29 09:25:06', '2020-02-29 09:25:06');
INSERT INTO `admin_operation_log` VALUES ('31', '1', 'admin/ads/create', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/create\",\"_pjax\":\"#pjax-container\"}', '2020-02-29 09:25:08', '2020-02-29 09:25:08');
INSERT INTO `admin_operation_log` VALUES ('32', '1', 'admin/ad-cates/1/edit', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ad-cates\\/1\\/edit\",\"_pjax\":\"#pjax-container\"}', '2020-02-29 09:27:36', '2020-02-29 09:27:36');
INSERT INTO `admin_operation_log` VALUES ('33', '1', 'admin/ad-cates/1', 'PUT', '192.168.31.158', '{\"name\":\"\\u9996\\u9875\",\"_token\":\"Q4a37ivIaVHOm8eYoZQX8BAGXmWx88kExI0AUuEj\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/log.mn\\/admin\\/ad-cates\",\"s\":\"\\/admin\\/ad-cates\\/1\"}', '2020-02-29 09:27:39', '2020-02-29 09:27:39');
INSERT INTO `admin_operation_log` VALUES ('34', '1', 'admin/ad-cates', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ad-cates\"}', '2020-02-29 09:27:40', '2020-02-29 09:27:40');
INSERT INTO `admin_operation_log` VALUES ('35', '1', 'admin/ads/create', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/create\"}', '2020-02-29 09:27:56', '2020-02-29 09:27:56');
INSERT INTO `admin_operation_log` VALUES ('36', '1', 'admin/ads', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\",\"_pjax\":\"#pjax-container\"}', '2020-02-29 09:28:23', '2020-02-29 09:28:23');
INSERT INTO `admin_operation_log` VALUES ('37', '1', 'admin/ads', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\"}', '2020-02-29 09:28:24', '2020-02-29 09:28:24');
INSERT INTO `admin_operation_log` VALUES ('38', '1', 'admin/ads/create', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/create\",\"_pjax\":\"#pjax-container\"}', '2020-02-29 09:33:04', '2020-02-29 09:33:04');
INSERT INTO `admin_operation_log` VALUES ('39', '1', 'admin/ads', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\"}', '2020-02-29 09:33:45', '2020-02-29 09:33:45');
INSERT INTO `admin_operation_log` VALUES ('40', '1', 'admin/ads', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\"}', '2020-02-29 09:34:30', '2020-02-29 09:34:30');
INSERT INTO `admin_operation_log` VALUES ('41', '1', 'admin/ads/create', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/create\",\"_pjax\":\"#pjax-container\"}', '2020-02-29 09:34:33', '2020-02-29 09:34:33');
INSERT INTO `admin_operation_log` VALUES ('42', '1', 'admin/ads', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\"}', '2020-02-29 09:34:35', '2020-02-29 09:34:35');
INSERT INTO `admin_operation_log` VALUES ('43', '1', 'admin/ads', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\"}', '2020-02-29 09:35:25', '2020-02-29 09:35:25');
INSERT INTO `admin_operation_log` VALUES ('44', '1', 'admin/ads/create', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/create\",\"_pjax\":\"#pjax-container\"}', '2020-02-29 09:35:29', '2020-02-29 09:35:29');
INSERT INTO `admin_operation_log` VALUES ('45', '1', 'admin/ads', 'POST', '192.168.31.158', '{\"title\":\"\\u8f6e\\u64ad1\",\"cate_id\":\"1\",\"_file_sort_\":{\"img\":null},\"url\":\"http:\\/\\/go.ngrok.gp93.cn\\/wechat\\/index\",\"_token\":\"Q4a37ivIaVHOm8eYoZQX8BAGXmWx88kExI0AUuEj\",\"_previous_\":\"http:\\/\\/log.mn\\/admin\\/ads\",\"s\":\"\\/admin\\/ads\"}', '2020-02-29 09:48:29', '2020-02-29 09:48:29');
INSERT INTO `admin_operation_log` VALUES ('46', '1', 'admin/ads/create', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/create\"}', '2020-02-29 09:48:32', '2020-02-29 09:48:32');
INSERT INTO `admin_operation_log` VALUES ('47', '1', 'admin/ads', 'POST', '192.168.31.158', '{\"title\":\"\\u8f6e\\u64ad1\",\"cate_id\":\"1\",\"_file_sort_\":{\"img\":null},\"url\":\"http:\\/\\/go.ngrok.gp93.cn\\/wechat\\/index\",\"_token\":\"Q4a37ivIaVHOm8eYoZQX8BAGXmWx88kExI0AUuEj\",\"s\":\"\\/admin\\/ads\"}', '2020-02-29 10:00:16', '2020-02-29 10:00:16');
INSERT INTO `admin_operation_log` VALUES ('48', '1', 'admin/ads/create', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/create\"}', '2020-02-29 10:00:18', '2020-02-29 10:00:18');
INSERT INTO `admin_operation_log` VALUES ('49', '1', 'admin/ads', 'POST', '192.168.31.158', '{\"title\":\"\\u8f6e\\u64ad1\",\"cate_id\":\"1\",\"_file_sort_\":{\"img\":null},\"url\":\"http:\\/\\/go.ngrok.gp93.cn\\/wechat\\/index\",\"_token\":\"Q4a37ivIaVHOm8eYoZQX8BAGXmWx88kExI0AUuEj\",\"s\":\"\\/admin\\/ads\"}', '2020-02-29 10:00:24', '2020-02-29 10:00:24');
INSERT INTO `admin_operation_log` VALUES ('50', '1', 'admin/ads', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\"}', '2020-02-29 10:00:24', '2020-02-29 10:00:24');
INSERT INTO `admin_operation_log` VALUES ('51', '1', 'admin/ads/1/edit', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/1\\/edit\",\"_pjax\":\"#pjax-container\"}', '2020-02-29 10:00:28', '2020-02-29 10:00:28');
INSERT INTO `admin_operation_log` VALUES ('52', '1', 'admin/ads/1/edit', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/1\\/edit\"}', '2020-02-29 10:00:35', '2020-02-29 10:00:35');
INSERT INTO `admin_operation_log` VALUES ('53', '1', 'admin/ads/1/edit', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/1\\/edit\"}', '2020-02-29 10:01:23', '2020-02-29 10:01:23');
INSERT INTO `admin_operation_log` VALUES ('54', '1', 'admin/ads/1/edit', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/1\\/edit\"}', '2020-02-29 10:01:50', '2020-02-29 10:01:50');
INSERT INTO `admin_operation_log` VALUES ('55', '1', 'admin/ads/1/edit', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/1\\/edit\"}', '2020-02-29 10:01:57', '2020-02-29 10:01:57');
INSERT INTO `admin_operation_log` VALUES ('56', '1', 'admin/ads/1', 'PUT', '192.168.31.158', '{\"title\":\"\\u8f6e\\u64ad1\",\"cate_id\":\"1\",\"url\":\"http:\\/\\/go.ngrok.gp93.cn\\/wechat\\/index\",\"_token\":\"Q4a37ivIaVHOm8eYoZQX8BAGXmWx88kExI0AUuEj\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/log.mn\\/admin\\/ads\\/1\\/edit?s=%2Fadmin%2Fads%2F1%2Fedit\",\"s\":\"\\/admin\\/ads\\/1\"}', '2020-02-29 10:02:02', '2020-02-29 10:02:02');
INSERT INTO `admin_operation_log` VALUES ('57', '1', 'admin/ads/1/edit', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/1\\/edit\"}', '2020-02-29 10:02:03', '2020-02-29 10:02:03');
INSERT INTO `admin_operation_log` VALUES ('58', '1', 'admin/ads/1/edit', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/1\\/edit\"}', '2020-02-29 10:02:14', '2020-02-29 10:02:14');
INSERT INTO `admin_operation_log` VALUES ('59', '1', 'admin/ads/1', 'PUT', '192.168.31.158', '{\"title\":\"\\u8f6e\\u64ad1\",\"cate_id\":\"1\",\"url\":\"http:\\/\\/go.ngrok.gp93.cn\\/wechat\\/index\",\"_token\":\"Q4a37ivIaVHOm8eYoZQX8BAGXmWx88kExI0AUuEj\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/log.mn\\/admin\\/ads\\/1\\/edit?s=%2Fadmin%2Fads%2F1%2Fedit\",\"s\":\"\\/admin\\/ads\\/1\"}', '2020-02-29 10:02:59', '2020-02-29 10:02:59');
INSERT INTO `admin_operation_log` VALUES ('60', '1', 'admin/ads/1/edit', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/1\\/edit\"}', '2020-02-29 10:03:00', '2020-02-29 10:03:00');
INSERT INTO `admin_operation_log` VALUES ('61', '1', 'admin/ads/1/edit', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/1\\/edit\"}', '2020-02-29 10:03:02', '2020-02-29 10:03:02');
INSERT INTO `admin_operation_log` VALUES ('62', '1', 'admin/ads/1/edit', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/1\\/edit\",\"_pjax\":\"#pjax-container\"}', '2020-02-29 10:10:53', '2020-02-29 10:10:53');
INSERT INTO `admin_operation_log` VALUES ('63', '1', 'admin/ads/1/edit', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/1\\/edit\",\"_pjax\":\"#pjax-container\"}', '2020-02-29 10:11:00', '2020-02-29 10:11:00');
INSERT INTO `admin_operation_log` VALUES ('64', '1', 'admin/ads', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\"}', '2020-02-29 10:11:05', '2020-02-29 10:11:05');
INSERT INTO `admin_operation_log` VALUES ('65', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\"}', '2020-03-01 11:15:34', '2020-03-01 11:15:34');
INSERT INTO `admin_operation_log` VALUES ('66', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\"}', '2020-04-02 09:35:54', '2020-04-02 09:35:54');
INSERT INTO `admin_operation_log` VALUES ('67', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\"}', '2020-04-02 09:41:06', '2020-04-02 09:41:06');
INSERT INTO `admin_operation_log` VALUES ('68', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\"}', '2020-04-02 13:49:36', '2020-04-02 13:49:36');
INSERT INTO `admin_operation_log` VALUES ('69', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\"}', '2020-04-04 03:48:32', '2020-04-04 03:48:32');
INSERT INTO `admin_operation_log` VALUES ('70', '1', 'admin/auth/users', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/auth\\/users\",\"_pjax\":\"#pjax-container\"}', '2020-04-04 03:48:40', '2020-04-04 03:48:40');
INSERT INTO `admin_operation_log` VALUES ('71', '1', 'admin/auth/roles', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/auth\\/roles\",\"_pjax\":\"#pjax-container\"}', '2020-04-04 03:48:42', '2020-04-04 03:48:42');
INSERT INTO `admin_operation_log` VALUES ('72', '1', 'admin/auth/permissions', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/auth\\/permissions\",\"_pjax\":\"#pjax-container\"}', '2020-04-04 03:48:44', '2020-04-04 03:48:44');
INSERT INTO `admin_operation_log` VALUES ('73', '1', 'admin/auth/menu', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/auth\\/menu\",\"_pjax\":\"#pjax-container\"}', '2020-04-04 03:48:45', '2020-04-04 03:48:45');
INSERT INTO `admin_operation_log` VALUES ('74', '1', 'admin/ads', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\"}', '2020-04-04 03:49:04', '2020-04-04 03:49:04');
INSERT INTO `admin_operation_log` VALUES ('75', '1', 'admin/ads/create', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/create\",\"_pjax\":\"#pjax-container\"}', '2020-04-04 03:51:33', '2020-04-04 03:51:33');
INSERT INTO `admin_operation_log` VALUES ('76', '1', 'admin/ads/create', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/create\"}', '2020-04-04 05:29:04', '2020-04-04 05:29:04');
INSERT INTO `admin_operation_log` VALUES ('77', '1', 'admin/auth/menu', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/auth\\/menu\"}', '2020-04-04 05:29:05', '2020-04-04 05:29:05');
INSERT INTO `admin_operation_log` VALUES ('78', '1', 'admin/ads/create', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/create\"}', '2020-04-04 06:05:54', '2020-04-04 06:05:54');
INSERT INTO `admin_operation_log` VALUES ('79', '1', 'admin/ads', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\",\"_pjax\":\"#pjax-container\"}', '2020-04-04 06:05:59', '2020-04-04 06:05:59');
INSERT INTO `admin_operation_log` VALUES ('80', '1', 'admin/ads', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\"}', '2020-04-04 06:06:58', '2020-04-04 06:06:58');
INSERT INTO `admin_operation_log` VALUES ('81', '1', 'admin/ads', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\"}', '2020-04-04 06:12:39', '2020-04-04 06:12:39');
INSERT INTO `admin_operation_log` VALUES ('82', '1', 'admin/ads/1/edit', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/1\\/edit\",\"_pjax\":\"#pjax-container\"}', '2020-04-04 06:12:45', '2020-04-04 06:12:45');
INSERT INTO `admin_operation_log` VALUES ('83', '1', 'admin/ads/1', 'PUT', '192.168.31.158', '{\"key\":\"0\",\"img\":\"_file_del_\",\"_file_del_\":null,\"_token\":\"wfndULiltDZZJiqnvfxT8bKJKXwdKr281BDc0YZ0\",\"_method\":\"PUT\",\"s\":\"\\/admin\\/ads\\/1\"}', '2020-04-04 06:12:53', '2020-04-04 06:12:53');
INSERT INTO `admin_operation_log` VALUES ('84', '1', 'admin/ads/1', 'PUT', '192.168.31.158', '{\"title\":\"\\u8f6e\\u64ad1\",\"cate_id\":\"1\",\"url\":\"http:\\/\\/go.ngrok.gp93.cn\\/wechat\\/index\",\"_token\":\"wfndULiltDZZJiqnvfxT8bKJKXwdKr281BDc0YZ0\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/log.mn\\/admin\\/ads\",\"s\":\"\\/admin\\/ads\\/1\"}', '2020-04-04 06:13:16', '2020-04-04 06:13:16');
INSERT INTO `admin_operation_log` VALUES ('85', '1', 'admin/ads', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\"}', '2020-04-04 06:13:17', '2020-04-04 06:13:17');
INSERT INTO `admin_operation_log` VALUES ('86', '1', 'admin/ads/1/edit', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/1\\/edit\",\"_pjax\":\"#pjax-container\"}', '2020-04-04 06:13:21', '2020-04-04 06:13:21');
INSERT INTO `admin_operation_log` VALUES ('87', '1', 'admin/ads/1/edit', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/1\\/edit\"}', '2020-04-04 06:16:23', '2020-04-04 06:16:23');
INSERT INTO `admin_operation_log` VALUES ('88', '1', 'admin/ads/1/edit', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/1\\/edit\"}', '2020-04-04 06:16:44', '2020-04-04 06:16:44');
INSERT INTO `admin_operation_log` VALUES ('89', '1', 'admin/ads/1', 'PUT', '192.168.31.158', '{\"key\":\"0\",\"img\":\"_file_del_\",\"_file_del_\":null,\"_token\":\"wfndULiltDZZJiqnvfxT8bKJKXwdKr281BDc0YZ0\",\"_method\":\"PUT\",\"s\":\"\\/admin\\/ads\\/1\"}', '2020-04-04 06:16:51', '2020-04-04 06:16:51');
INSERT INTO `admin_operation_log` VALUES ('90', '1', 'admin/ads/1', 'PUT', '192.168.31.158', '{\"title\":\"\\u8f6e\\u64ad1\",\"cate_id\":\"1\",\"url\":\"http:\\/\\/go.ngrok.gp93.cn\\/wechat\\/index\",\"_token\":\"wfndULiltDZZJiqnvfxT8bKJKXwdKr281BDc0YZ0\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/log.mn\\/admin\\/ads\\/1\\/edit?s=%2Fadmin%2Fads%2F1%2Fedit\",\"s\":\"\\/admin\\/ads\\/1\"}', '2020-04-04 06:16:58', '2020-04-04 06:16:58');
INSERT INTO `admin_operation_log` VALUES ('91', '1', 'admin/ads/1/edit', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/1\\/edit\"}', '2020-04-04 06:17:00', '2020-04-04 06:17:00');
INSERT INTO `admin_operation_log` VALUES ('92', '1', 'admin/ads/1/edit', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/1\\/edit\"}', '2020-04-04 06:17:59', '2020-04-04 06:17:59');
INSERT INTO `admin_operation_log` VALUES ('93', '1', 'admin/ads/1', 'PUT', '192.168.31.158', '{\"key\":\"0\",\"img\":\"_file_del_\",\"_file_del_\":null,\"_token\":\"wfndULiltDZZJiqnvfxT8bKJKXwdKr281BDc0YZ0\",\"_method\":\"PUT\",\"s\":\"\\/admin\\/ads\\/1\"}', '2020-04-04 06:18:00', '2020-04-04 06:18:00');
INSERT INTO `admin_operation_log` VALUES ('94', '1', 'admin/ads/1/edit', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/1\\/edit\"}', '2020-04-04 06:18:02', '2020-04-04 06:18:02');
INSERT INTO `admin_operation_log` VALUES ('95', '1', 'admin/ads/1', 'PUT', '192.168.31.158', '{\"title\":\"\\u8f6e\\u64ad1\",\"cate_id\":\"1\",\"url\":\"http:\\/\\/go.ngrok.gp93.cn\\/wechat\\/index\",\"_token\":\"wfndULiltDZZJiqnvfxT8bKJKXwdKr281BDc0YZ0\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/log.mn\\/admin\\/ads\\/1\\/edit?s=%2Fadmin%2Fads%2F1%2Fedit\",\"s\":\"\\/admin\\/ads\\/1\"}', '2020-04-04 06:18:07', '2020-04-04 06:18:07');
INSERT INTO `admin_operation_log` VALUES ('96', '1', 'admin/ads/1/edit', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/1\\/edit\"}', '2020-04-04 06:18:08', '2020-04-04 06:18:08');
INSERT INTO `admin_operation_log` VALUES ('97', '1', 'admin/ads/1/edit', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/1\\/edit\"}', '2020-04-04 06:26:47', '2020-04-04 06:26:47');
INSERT INTO `admin_operation_log` VALUES ('98', '1', 'admin/ads/1/edit', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/1\\/edit\"}', '2020-04-04 06:27:13', '2020-04-04 06:27:13');
INSERT INTO `admin_operation_log` VALUES ('99', '1', 'admin/ads/1/edit', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/1\\/edit\"}', '2020-04-04 06:28:01', '2020-04-04 06:28:01');
INSERT INTO `admin_operation_log` VALUES ('100', '1', 'admin/auth/menu', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/auth\\/menu\"}', '2020-04-04 07:15:45', '2020-04-04 07:15:45');
INSERT INTO `admin_operation_log` VALUES ('101', '1', 'admin/ads', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\"}', '2020-04-04 07:15:49', '2020-04-04 07:15:49');
INSERT INTO `admin_operation_log` VALUES ('102', '1', 'admin/ads/create', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/create\",\"_pjax\":\"#pjax-container\"}', '2020-04-04 07:15:54', '2020-04-04 07:15:54');
INSERT INTO `admin_operation_log` VALUES ('103', '1', 'admin/auth/menu', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/auth\\/menu\"}', '2020-04-04 07:19:41', '2020-04-04 07:19:41');
INSERT INTO `admin_operation_log` VALUES ('104', '1', 'admin/ads', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\"}', '2020-04-04 07:19:46', '2020-04-04 07:19:46');
INSERT INTO `admin_operation_log` VALUES ('105', '1', 'admin/ads/create', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\\/create\",\"_pjax\":\"#pjax-container\"}', '2020-04-04 07:19:50', '2020-04-04 07:19:50');
INSERT INTO `admin_operation_log` VALUES ('106', '1', 'admin/ads', 'POST', '192.168.31.158', '{\"title\":\"\\u6bcf\\u65e5\\u7b7e\\u5230\",\"cate_id\":\"2\",\"url\":null,\"_token\":\"wfndULiltDZZJiqnvfxT8bKJKXwdKr281BDc0YZ0\",\"_previous_\":\"http:\\/\\/log.mn\\/admin\\/ads\",\"s\":\"\\/admin\\/ads\"}', '2020-04-04 07:20:26', '2020-04-04 07:20:26');
INSERT INTO `admin_operation_log` VALUES ('107', '1', 'admin/ads', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\\/ads\"}', '2020-04-04 07:20:27', '2020-04-04 07:20:27');
INSERT INTO `admin_operation_log` VALUES ('108', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\"}', '2020-04-24 16:48:55', '2020-04-24 16:48:55');
INSERT INTO `admin_operation_log` VALUES ('109', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\"}', '2020-04-24 16:49:02', '2020-04-24 16:49:02');
INSERT INTO `admin_operation_log` VALUES ('110', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\"}', '2020-04-24 16:49:05', '2020-04-24 16:49:05');
INSERT INTO `admin_operation_log` VALUES ('111', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\"}', '2020-04-24 16:49:18', '2020-04-24 16:49:18');
INSERT INTO `admin_operation_log` VALUES ('112', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\"}', '2020-04-24 16:50:07', '2020-04-24 16:50:07');
INSERT INTO `admin_operation_log` VALUES ('113', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\"}', '2020-04-26 13:48:10', '2020-04-26 13:48:10');
INSERT INTO `admin_operation_log` VALUES ('114', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\"}', '2020-04-26 15:34:26', '2020-04-26 15:34:26');
INSERT INTO `admin_operation_log` VALUES ('115', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\"}', '2020-04-26 15:34:31', '2020-04-26 15:34:31');
INSERT INTO `admin_operation_log` VALUES ('116', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\"}', '2020-04-27 01:51:33', '2020-04-27 01:51:33');
INSERT INTO `admin_operation_log` VALUES ('117', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\"}', '2020-04-27 01:51:34', '2020-04-27 01:51:34');
INSERT INTO `admin_operation_log` VALUES ('118', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\"}', '2020-04-27 01:51:55', '2020-04-27 01:51:55');
INSERT INTO `admin_operation_log` VALUES ('119', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\"}', '2020-04-27 12:57:44', '2020-04-27 12:57:44');
INSERT INTO `admin_operation_log` VALUES ('120', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\"}', '2020-04-28 06:43:43', '2020-04-28 06:43:43');
INSERT INTO `admin_operation_log` VALUES ('121', '1', 'admin', 'GET', '192.168.31.158', '{\"s\":\"\\/admin\"}', '2020-04-30 01:07:57', '2020-04-30 01:07:57');

-- ----------------------------
-- Table structure for admin_permissions
-- ----------------------------
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

-- ----------------------------
-- Records of admin_permissions
-- ----------------------------
INSERT INTO `admin_permissions` VALUES ('1', 'All permission', '*', '', '*', null, null);
INSERT INTO `admin_permissions` VALUES ('2', 'Dashboard', 'dashboard', 'GET', '/', null, null);
INSERT INTO `admin_permissions` VALUES ('3', 'Login', 'auth.login', '', '/auth/login\r\n/auth/logout', null, null);
INSERT INTO `admin_permissions` VALUES ('4', 'User setting', 'auth.setting', 'GET,PUT', '/auth/setting', null, null);
INSERT INTO `admin_permissions` VALUES ('5', 'Auth management', 'auth.management', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', null, null);

-- ----------------------------
-- Table structure for admin_roles
-- ----------------------------
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

-- ----------------------------
-- Records of admin_roles
-- ----------------------------
INSERT INTO `admin_roles` VALUES ('1', 'Administrator', 'administrator', '2019-11-11 02:17:34', '2019-11-11 02:17:34');

-- ----------------------------
-- Table structure for admin_role_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_menu`;
CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_role_menu
-- ----------------------------
INSERT INTO `admin_role_menu` VALUES ('1', '2', null, null);
INSERT INTO `admin_role_menu` VALUES ('1', '8', null, null);
INSERT INTO `admin_role_menu` VALUES ('1', '9', null, null);

-- ----------------------------
-- Table structure for admin_role_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_permissions`;
CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_role_permissions
-- ----------------------------
INSERT INTO `admin_role_permissions` VALUES ('1', '1', null, null);

-- ----------------------------
-- Table structure for admin_role_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_users`;
CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_role_users
-- ----------------------------
INSERT INTO `admin_role_users` VALUES ('1', '1', null, null);

-- ----------------------------
-- Table structure for admin_users
-- ----------------------------
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

-- ----------------------------
-- Records of admin_users
-- ----------------------------
INSERT INTO `admin_users` VALUES ('1', 'admin', '$2y$10$6xsYXQkHH/3HfrnGMpDiY.RA.E5zgT14dTYv5FAaGNqpjKbdNFwJG', 'Administrator', null, 'Nb3GeiM4hHiXebDfjN3Wxohh5Mv2FshgxjyYgRJWQPKzQAtVOWtqJKy3Sh2M', '2019-11-11 02:17:34', '2019-11-11 02:17:34');

-- ----------------------------
-- Table structure for admin_user_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_user_permissions`;
CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admin_user_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for app_setting
-- ----------------------------
DROP TABLE IF EXISTS `app_setting`;
CREATE TABLE `app_setting` (
  `set_name` varchar(20) NOT NULL,
  `app_name` varchar(50) DEFAULT '',
  `app_logo` varchar(500) DEFAULT NULL,
  `defalut_img` varchar(255) DEFAULT NULL,
  `error_img` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`set_name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of app_setting
-- ----------------------------
INSERT INTO `app_setting` VALUES ('app_set', '萤火淘客', 'images/72934c726d6fc94afad1100856dc83f8.jpg', 'images/98535c97d35bd5c62573d92c00d861ec.jpg', 'images/b0f535b20df71ad28b7317a21270ce15.jpg', '2019-12-16 15:29:34');

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `content` longtext,
  `is_show` int(1) DEFAULT '0',
  `cate_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of article
-- ----------------------------

-- ----------------------------
-- Table structure for article_cate
-- ----------------------------
DROP TABLE IF EXISTS `article_cate`;
CREATE TABLE `article_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `is_show` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of article_cate
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
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

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2016_01_04_173148_create_admin_tables', '1');
INSERT INTO `migrations` VALUES ('4', '2019_08_19_000000_create_failed_jobs_table', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `set_name` varchar(20) NOT NULL DEFAULT '',
  `set_value` varchar(500) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES ('oauth_suc', '认证成功,关闭此页面即可');
INSERT INTO `setting` VALUES ('oauth_error', '认证失败,请尝试重新认证');
INSERT INTO `setting` VALUES ('wechat_default', '回复0返回公众号菜单');
INSERT INTO `setting` VALUES ('oauth_repeat', '认证失败,同一淘宝账户不能重复认证不同微信');

-- ----------------------------
-- Table structure for tbk_ads
-- ----------------------------
DROP TABLE IF EXISTS `tbk_ads`;
CREATE TABLE `tbk_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbk_ads
-- ----------------------------
INSERT INTO `tbk_ads` VALUES ('1', '轮播1', '1', 'images/854e2fc81553bec6f0408adcba203875.jpg', 'http://go.ngrok.gp93.cn/wechat/index', '2020-02-29 10:00:24', '2020-04-04 06:18:08');
INSERT INTO `tbk_ads` VALUES ('2', '轮播2', '1', 'images/854e2fc81553bec6f0408adcba203875.jpg', 'http://go.ngrok.gp93.cn/wechat/index', '2020-02-29 10:00:24', '2020-02-29 10:02:59');
INSERT INTO `tbk_ads` VALUES ('3', '轮播3', '1', 'images/854e2fc81553bec6f0408adcba203875.jpg', 'http://go.ngrok.gp93.cn/wechat/index', '2020-02-29 10:00:24', '2020-02-29 10:02:59');
INSERT INTO `tbk_ads` VALUES ('4', '每日签到', '2', 'images/aeee324303ea397586decec846e87b61.png', null, '2020-04-04 07:20:26', '2020-04-04 07:20:26');

-- ----------------------------
-- Table structure for tbk_ad_cate
-- ----------------------------
DROP TABLE IF EXISTS `tbk_ad_cate`;
CREATE TABLE `tbk_ad_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `key` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbk_ad_cate
-- ----------------------------
INSERT INTO `tbk_ad_cate` VALUES ('1', '首页轮播', '2020-02-29 08:47:11', '2020-02-29 09:27:39', 'banner');
INSERT INTO `tbk_ad_cate` VALUES ('2', '首页分类', '2020-02-29 08:47:11', '2020-02-29 09:27:39', 'banner');

-- ----------------------------
-- Table structure for tbk_cate
-- ----------------------------
DROP TABLE IF EXISTS `tbk_cate`;
CREATE TABLE `tbk_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '分类名',
  `imgurl` varchar(300) NOT NULL COMMENT '图片名',
  `cid` int(10) unsigned zerofill NOT NULL COMMENT '主分类',
  `pid` int(10) unsigned zerofill NOT NULL COMMENT '上级分类',
  `sort` int(11) unsigned zerofill NOT NULL,
  `type` int(1) unsigned zerofill NOT NULL COMMENT '类型',
  PRIMARY KEY (`id`,`type`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbk_cate
-- ----------------------------

-- ----------------------------
-- Table structure for tbk_goods
-- ----------------------------
DROP TABLE IF EXISTS `tbk_goods`;
CREATE TABLE `tbk_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(1) NOT NULL DEFAULT '1' COMMENT '类型1淘宝',
  `item_id` bigint(15) NOT NULL COMMENT '淘宝商品ID',
  `seller_id` bigint(18) DEFAULT NULL COMMENT '售卖ID',
  `item_title` varchar(300) DEFAULT '' COMMENT '宝贝标题',
  `item_short_title` varchar(200) DEFAULT NULL COMMENT '宝贝短标题',
  `item_desc` varchar(1000) DEFAULT NULL COMMENT '宝贝推荐语',
  `item_price` decimal(10,2) DEFAULT NULL COMMENT '在售价',
  `item_sale` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '月销量',
  `item_sale2` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '宝贝近2小时跑单',
  `today_sale` int(11) NOT NULL COMMENT '当天销量',
  `item_copy` varchar(500) NOT NULL DEFAULT '' COMMENT '推广长图（带http://img.haodanku.com/0_553757100845_1509175123.jpg-600进行访问）',
  `item_pic` varchar(500) NOT NULL COMMENT '宝贝主图原始图像由于图片原图过大影响加载速度，建议加上后缀_310x310.jpg',
  `fqcat` int(11) NOT NULL DEFAULT '1' COMMENT '商品类目：\r\n1女装，2男装，3内衣，4美妆，5配饰，6鞋品，7箱包，8儿童，9母婴，10居家，11美食，12数码，13家电，14其他，15车品，16文体，17宠物',
  `item_end_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '宝贝券后价',
  `shop_type` varchar(10) DEFAULT NULL COMMENT '店铺类型：\r\n天猫店（B）\r\n淘宝店（C）',
  `tkrates` varchar(255) DEFAULT NULL COMMENT '佣金比例',
  `tkmoney` varchar(255) NOT NULL COMMENT '预计可得（宝贝价格 * 佣金比例 / 100）',
  `coupon_url` varchar(300) DEFAULT NULL COMMENT '优惠券链接',
  `coupon_money` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '	优惠券金额',
  `coupon_surplus` varchar(255) DEFAULT NULL COMMENT '优惠券剩余量',
  `coupon_receive` int(11) DEFAULT NULL,
  `coupon_receive2` int(11) DEFAULT NULL COMMENT '当天优惠券领取量',
  `today_coupon_receive` varchar(255) DEFAULT NULL,
  `coupon_num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '优惠券总数量',
  `coupon_explain` varchar(100) DEFAULT NULL COMMENT '	优惠券使用条件',
  `coupon_starttime` int(11) DEFAULT NULL COMMENT '优惠券开始时间',
  `coupon_endtime` int(11) DEFAULT NULL COMMENT '优惠券结束时间',
  `start_time` int(11) DEFAULT NULL COMMENT '	活动开始时间',
  `end_time` int(11) DEFAULT NULL COMMENT '活动结束时间',
  `guide_article` varchar(500) DEFAULT NULL COMMENT '推广导购文案',
  `seller_name` varchar(100) DEFAULT NULL COMMENT '	放单人名号',
  `user_id` bigint(20) DEFAULT NULL COMMENT '店主的userid',
  `seller_nick` varchar(255) DEFAULT NULL COMMENT '店铺掌柜名',
  `shop_name` varchar(255) DEFAULT NULL COMMENT '	店铺名',
  `discount` decimal(5,2) DEFAULT NULL COMMENT '	折扣力度',
  `activityid` varchar(100) NOT NULL COMMENT '优惠券ID',
  `coupon_condition` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '优惠券限定使用金额',
  `taobao_image` varchar(2000) NOT NULL DEFAULT '' COMMENT '轮播主图，用英文逗号分隔开来（由于图片原图过大影响加载速度，建议加上后缀_310x310.jpg，如',
  `shop_id` int(11) DEFAULT NULL,
  `son_category` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `general_index` int(11) DEFAULT '0',
  PRIMARY KEY (`id`,`type`,`item_id`) USING BTREE,
  UNIQUE KEY `item_id` (`item_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbk_goods
-- ----------------------------

-- ----------------------------
-- Table structure for tbk_order
-- ----------------------------
DROP TABLE IF EXISTS `tbk_order`;
CREATE TABLE `tbk_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT '0' COMMENT '用户Id',
  `ordernum` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '订单号',
  `trade_parent_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '父订单号',
  `title` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '订单名',
  `itemid` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '商品ID',
  `item_img` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品缩略图',
  `item_num` int(11) NOT NULL DEFAULT '1' COMMENT '商品数',
  `price` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '单价',
  `final_price` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT '付款价格',
  `commission_rate` decimal(5,2) NOT NULL DEFAULT '0.00' COMMENT '分成比1',
  `commission_amount` decimal(6,2) NOT NULL DEFAULT '0.00' COMMENT '预估收入',
  `pid` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '推广位',
  `site_id` bigint(20) NOT NULL DEFAULT '0',
  `relation_id` bigint(20) NOT NULL DEFAULT '0' COMMENT '渠道关系ID',
  `status` tinyint(4) NOT NULL DEFAULT '3' COMMENT '3：订单结算，12：订单付款， 13：订单失效，14：订单成功',
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1淘宝 2京东 3拼多多',
  `is_complete` int(1) NOT NULL DEFAULT '0' COMMENT '是否加入log表计算3失效 2返现到账 1已计算 0默认',
  `complete_at` timestamp NULL DEFAULT NULL COMMENT '完成时间',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alimama_rate` decimal(11,4) DEFAULT NULL,
  `paid_time` timestamp NULL DEFAULT NULL,
  `alimama_share_fee` decimal(11,4) DEFAULT '0.0000' COMMENT '阿里技术服务费 接口获取',
  `platform` decimal(11,4) DEFAULT '0.0000' COMMENT '平台5%获利',
  `tb_cost` decimal(11,4) DEFAULT '0.0000' COMMENT '最终收取技术服务费',
  `calcuate_money` decimal(11,0) DEFAULT '0' COMMENT '参与计算金额',
  `pub_id` varchar(20) DEFAULT NULL COMMENT '推广者Id',
  `user_cost` decimal(11,4) DEFAULT NULL,
  PRIMARY KEY (`id`,`ordernum`) USING BTREE,
  UNIQUE KEY `ordernum` (`ordernum`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbk_order
-- ----------------------------
INSERT INTO `tbk_order` VALUES ('97', '7', '1059936194061735023', '1059936194061735023', '三合一数据线一拖三充电线iPhone苹果华为oppo小米type-c二合一车载安卓3a多头充电器快冲三头多功能手机加', '615628909515', '//img.alicdn.com/tfscom/i2/3290822501/O1CN01hSNP4X1ULVAODbcdo_!!3290822501.jpg', '1', '0.00', '1.82', '19.50', '0.35', '0', '0', '2494492898', '12', '1', '0', null, '2020-06-16 06:17:25', null, '0.0000', '2020-06-14 08:59:12', '0.0000', '0.0000', '0.0000', '0', '351510037', null);

-- ----------------------------
-- Table structure for tbk_order_logs
-- ----------------------------
DROP TABLE IF EXISTS `tbk_order_logs`;
CREATE TABLE `tbk_order_logs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `type` tinyint(1) DEFAULT NULL COMMENT '1淘宝 2京东 3拼多多',
  `credit` decimal(10,4) DEFAULT '0.0000' COMMENT '系统佣金',
  `get_type` int(2) NOT NULL DEFAULT '0' COMMENT '获取方式',
  `ordernum` varchar(30) NOT NULL COMMENT '订单号',
  `status` tinyint(1) DEFAULT '1' COMMENT '1待返佣 2已返佣3已失效',
  `remark` varchar(200) DEFAULT '' COMMENT '备注',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`user_id`,`get_type`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbk_order_logs
-- ----------------------------
INSERT INTO `tbk_order_logs` VALUES ('67', '7', '1', '0.2205', '1', '1059936194061735023', '1', '订单返利：0.2205', '2020-06-16 06:50:05', '2020-06-16 06:50:05');
INSERT INTO `tbk_order_logs` VALUES ('68', '6', '1', '0.0315', '2', '1059936194061735023', '1', '下级订单返利：0.0315', '2020-06-16 06:50:05', '2020-06-16 06:50:05');
INSERT INTO `tbk_order_logs` VALUES ('69', '1', '1', '0.0630', '3', '1059936194061735023', '1', '团队订单返利：0.063', '2020-06-16 06:50:05', '2020-06-16 06:50:05');
INSERT INTO `tbk_order_logs` VALUES ('70', '7', '1', '0.2205', '1', '1059936194061735025', '1', '订单返利：0.2205', '2020-06-16 06:50:05', '2020-06-16 06:50:05');
INSERT INTO `tbk_order_logs` VALUES ('72', '1', '1', '0.0630', '3', '1059936194061735025', '1', '团队订单返利：0.063', '2020-06-16 06:50:05', '2020-06-16 06:50:05');
INSERT INTO `tbk_order_logs` VALUES ('74', '6', '1', '0.0315', '2', '1059936194061735025', '1', '下级订单返利：0.0315', '2020-06-16 06:50:05', '2020-06-16 06:50:05');

-- ----------------------------
-- Table structure for tbk_spider_logs
-- ----------------------------
DROP TABLE IF EXISTS `tbk_spider_logs`;
CREATE TABLE `tbk_spider_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'spider 名',
  `start_time` timestamp NULL DEFAULT NULL COMMENT '开始时间',
  `end_time` timestamp NULL DEFAULT NULL COMMENT '结束时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbk_spider_logs
-- ----------------------------
INSERT INTO `tbk_spider_logs` VALUES ('82', '好单库定时拉取', '2019-12-17 15:23:36', null);
INSERT INTO `tbk_spider_logs` VALUES ('83', '好单库定时拉取', '2019-12-17 15:24:47', null);
INSERT INTO `tbk_spider_logs` VALUES ('84', '好单库定时拉取', '2019-12-17 15:25:18', null);
INSERT INTO `tbk_spider_logs` VALUES ('85', '好单库定时拉取', '2019-12-18 02:19:08', null);
INSERT INTO `tbk_spider_logs` VALUES ('86', '好单库定时拉取', '2019-12-18 02:22:33', null);
INSERT INTO `tbk_spider_logs` VALUES ('87', '好单库定时拉取', '2019-12-18 02:24:44', '2019-12-18 02:26:29');
INSERT INTO `tbk_spider_logs` VALUES ('88', '淘宝商品更新', '2019-12-18 03:46:00', null);
INSERT INTO `tbk_spider_logs` VALUES ('89', '淘宝删除失效商品', '2019-12-18 03:46:25', null);
INSERT INTO `tbk_spider_logs` VALUES ('90', '淘宝商品更新', '2019-12-18 03:49:49', null);
INSERT INTO `tbk_spider_logs` VALUES ('91', '淘宝商品更新', '2019-12-18 03:51:12', '2019-12-18 03:52:11');
INSERT INTO `tbk_spider_logs` VALUES ('92', '淘宝商品更新', '2019-12-18 05:29:54', null);
INSERT INTO `tbk_spider_logs` VALUES ('93', '淘宝删除失效商品', '2019-12-18 05:34:57', null);
INSERT INTO `tbk_spider_logs` VALUES ('94', '淘宝商品更新', '2019-12-18 05:41:37', '2019-12-18 05:41:39');
INSERT INTO `tbk_spider_logs` VALUES ('95', '淘宝商品更新', '2019-12-18 05:41:43', '2019-12-18 05:41:44');
INSERT INTO `tbk_spider_logs` VALUES ('96', '淘宝商品更新', '2019-12-18 05:57:16', '2019-12-18 05:57:26');
INSERT INTO `tbk_spider_logs` VALUES ('97', '淘宝商品更新', '2019-12-18 05:57:47', '2019-12-18 05:59:45');
INSERT INTO `tbk_spider_logs` VALUES ('98', '淘宝删除失效商品', '2019-12-18 05:59:27', '2019-12-18 05:59:45');
INSERT INTO `tbk_spider_logs` VALUES ('99', '淘宝商品更新', '2019-12-18 06:05:49', '2019-12-18 06:08:00');
INSERT INTO `tbk_spider_logs` VALUES ('100', '淘宝删除失效商品', '2019-12-18 06:07:59', '2019-12-18 06:08:01');
INSERT INTO `tbk_spider_logs` VALUES ('101', '淘宝商品更新', '2019-12-18 06:52:56', '2019-12-18 06:55:01');
INSERT INTO `tbk_spider_logs` VALUES ('102', '淘宝删除失效商品', '2019-12-18 06:54:38', '2019-12-18 06:55:01');
INSERT INTO `tbk_spider_logs` VALUES ('103', '淘宝商品更新', '2020-01-13 07:36:17', null);
INSERT INTO `tbk_spider_logs` VALUES ('104', '淘宝删除失效商品', '2020-01-13 07:36:18', null);
INSERT INTO `tbk_spider_logs` VALUES ('105', '淘宝商品定时拉取', '2020-01-13 07:40:23', '2020-01-13 07:43:38');
INSERT INTO `tbk_spider_logs` VALUES ('106', '淘宝商品定时拉取', '2020-05-04 14:45:47', null);
INSERT INTO `tbk_spider_logs` VALUES ('107', '淘宝拉取用户订单', '2020-05-04 14:47:18', null);
INSERT INTO `tbk_spider_logs` VALUES ('108', '淘宝拉取用户订单', '2020-05-04 14:47:30', null);
INSERT INTO `tbk_spider_logs` VALUES ('109', '淘宝拉取用户订单', '2020-05-04 14:47:39', null);
INSERT INTO `tbk_spider_logs` VALUES ('110', '淘宝拉取用户订单', '2020-05-04 14:48:33', null);
INSERT INTO `tbk_spider_logs` VALUES ('111', '淘宝商品定时拉取', '2020-05-10 08:16:28', '2020-05-10 08:18:54');

-- ----------------------------
-- Table structure for tbk_user_credit_log
-- ----------------------------
DROP TABLE IF EXISTS `tbk_user_credit_log`;
CREATE TABLE `tbk_user_credit_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `operater_id` int(11) unsigned zerofill NOT NULL COMMENT '操作人 adminid   0为系统自动',
  `credit` decimal(10,2) unsigned zerofill NOT NULL DEFAULT '00000000.00' COMMENT '变动积分',
  `current_credit` decimal(10,2) unsigned zerofill NOT NULL COMMENT '当前积分',
  `type` tinyint(4) NOT NULL COMMENT '类型',
  `remark` varchar(300) NOT NULL DEFAULT '' COMMENT '备注',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbk_user_credit_log
-- ----------------------------

-- ----------------------------
-- Table structure for tbk_user_history
-- ----------------------------
DROP TABLE IF EXISTS `tbk_user_history`;
CREATE TABLE `tbk_user_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic_url` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `item_price` decimal(9,2) DEFAULT NULL,
  `coupon_price` decimal(9,2) DEFAULT NULL,
  `item_end_price` decimal(9,2) DEFAULT NULL,
  `type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbk_user_history
-- ----------------------------

-- ----------------------------
-- Table structure for tbk_user_msg
-- ----------------------------
DROP TABLE IF EXISTS `tbk_user_msg`;
CREATE TABLE `tbk_user_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned zerofill NOT NULL COMMENT '用户ID',
  `msg` varchar(500) DEFAULT NULL COMMENT '收到信息内容',
  `return_msg` varchar(500) DEFAULT NULL COMMENT '返回信息内容',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbk_user_msg
-- ----------------------------

-- ----------------------------
-- Table structure for tbk_user_oauth
-- ----------------------------
DROP TABLE IF EXISTS `tbk_user_oauth`;
CREATE TABLE `tbk_user_oauth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `session_key` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `openid` varchar(30) DEFAULT NULL,
  `taobao` varchar(50) DEFAULT NULL,
  `expire_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `open_uid` varchar(100) DEFAULT NULL,
  `relation_id` varchar(100) DEFAULT NULL,
  `invited_code` varchar(100) DEFAULT NULL,
  `account_name` varchar(100) DEFAULT NULL,
  `special_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tbk_user_oauth
-- ----------------------------
INSERT INTO `tbk_user_oauth` VALUES ('1', '1', '6200f131dffc671bfc433ZZc773a35c15492be3a90dc2c71121372610', 'tb3857139_2013', '1121372610', '1121372610', '2020-05-09 07:38:22', '2020-05-08 07:38:22', '2020-05-08 07:38:22', null, null, null, 'HHDB63', null, null);
INSERT INTO `tbk_user_oauth` VALUES ('2', '7', '62009093b2a88ff2dfh2d0a87e61605bafc0c2f1b2343ff720732350', 'gaomengsi314324', '720732350', '720732350', '2020-07-06 05:40:14', '2020-05-08 14:14:24', '2020-06-06 05:40:14', null, '', '2494492898', null, 'g**4', '');
INSERT INTO `tbk_user_oauth` VALUES ('3', '25', '6200708a8435263bdfdfccf21613d095eb7ddec1b6310352933692332', 'tb210626147', '2933692332', '2933692332', '2020-05-11 07:42:51', '2020-05-10 07:42:51', '2020-05-10 07:42:51', null, '', null, null, null, null);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `wx_openid` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `wx_nickname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `wx_head_img` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `level_id` int(11) DEFAULT NULL COMMENT '等级',
  `invited_id` int(11) DEFAULT NULL COMMENT '邀请人',
  `related` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '邀请关系',
  `team_id` int(11) NOT NULL DEFAULT '0' COMMENT '团队Id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `login_ip` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'login_ip',
  `team` int(1) NOT NULL DEFAULT '1',
  `credit` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `mobile` (`mobile`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '꧁꫞꯭萤火虫꫞꧂', null, null, '$2y$10$QmMv6XfHUK7cCt.m3lIu3uKApRYUPGSqf4biamCnLe1sLZZDItt9O', null, '', 'o8N8n56uwxv1wJj-cIOSp7HZi2-M', '꧁꫞꯭萤火虫꫞꧂', 'http://thirdwx.qlogo.cn/mmopen/SyXicictQ9VGUYiaC73iaVWs4Mj09aQa1uAgEJyrj0tbFrZChpOejnkXibAHrUoUQIdHBXNSc5qeggpadObUWzWzDmmPmUSr8OEbF/132', '1', '1', '1', '1', '2020-05-08 07:37:21', '2020-05-08 07:37:21', null, '1', '0.00');
INSERT INTO `users` VALUES ('2', '萤火虫2', null, null, '$2y$10$gYvMjhbLMSf1e20CxGzJlOA.zZn2Li0HI72iIdbrseOuao8tCjL7i', null, '', 'o8N8n58Nu6KziLfzq2zXjciWy9u0', '萤火虫', '', '1', '1', '1', '1', '2020-05-08 14:12:16', '2020-05-08 14:12:16', null, '1', '0.00');
INSERT INTO `users` VALUES ('3', '萤火虫3', null, null, '$2y$10$p9wZr/KKo37xIsnCv.8zM.I7G.uzOcyD7cwRiJZMBoB90hE5Z4CoG', null, '', 'o8N8n5ytTbl4VB16KGF0Vsa5x9bw', '萤火虫', 'http://thirdwx.qlogo.cn/mmopen/ibKHP1TZZeXK7eDlhqd27MFib1brLBflV4Jmh4JsG3zjnPBpM0AjbIcWJbStXGqicraRUMpgGMkBREdTdSDeYkVtzw7LxbpKRo7/132', '1', '2', '2_1', '1', '2020-05-08 14:45:30', '2020-05-08 14:45:30', null, '1', '0.00');
INSERT INTO `users` VALUES ('4', '萤火虫4', '4', '2020-06-16 10:57:19', '$2y$10$p9wZr/KKo37xIsnCv.8zM.I7G.uzOcyD7cwRiJZMBoB90hE5Z4CoG', '', '', 'o8N8n5ytTbl4VB16KGF0Vsa5x9bw', '萤火虫', 'http://thirdwx.qlogo.cn/mmopen/ibKHP1TZZeXK7eDlhqd27MFib1brLBflV4Jmh4JsG3zjnPBpM0AjbIcWJbStXGqicraRUMpgGMkBREdTdSDeYkVtzw7LxbpKRo7/132', '1', '3', '3_2_1', '1', '2020-05-08 14:45:30', '2020-05-08 14:45:30', '', '1', '0.00');
INSERT INTO `users` VALUES ('7', '萤火虫7', '7', '2020-06-16 10:57:19', '$2y$10$p9wZr/KKo37xIsnCv.8zM.I7G.uzOcyD7cwRiJZMBoB90hE5Z4CoG', '', '', 'o8N8n5ytTbl4VB16KGF0Vsa5x9bw', '萤火虫', 'http://thirdwx.qlogo.cn/mmopen/ibKHP1TZZeXK7eDlhqd27MFib1brLBflV4Jmh4JsG3zjnPBpM0AjbIcWJbStXGqicraRUMpgGMkBREdTdSDeYkVtzw7LxbpKRo7/132', '1', '6', '6_5_4_3_2_1', '1', '2020-05-08 14:45:30', '2020-05-08 14:45:30', '', '1', '0.00');
INSERT INTO `users` VALUES ('6', '萤火虫6', '6', '2020-06-16 10:57:19', '$2y$10$p9wZr/KKo37xIsnCv.8zM.I7G.uzOcyD7cwRiJZMBoB90hE5Z4CoG', '', '', 'o8N8n5ytTbl4VB16KGF0Vsa5x9bw', '萤火虫', 'http://thirdwx.qlogo.cn/mmopen/ibKHP1TZZeXK7eDlhqd27MFib1brLBflV4Jmh4JsG3zjnPBpM0AjbIcWJbStXGqicraRUMpgGMkBREdTdSDeYkVtzw7LxbpKRo7/132', '1', '5', '5_4_3_2_1', '1', '2020-05-08 14:45:30', '2020-05-08 14:45:30', '', '1', '0.00');
INSERT INTO `users` VALUES ('5', '萤火虫5', '5', '2020-06-16 10:57:19', '$2y$10$gYvMjhbLMSf1e20CxGzJlOA.zZn2Li0HI72iIdbrseOuao8tCjL7i', '', '', 'o8N8n58Nu6KziLfzq2zXjciWy9u0', '萤火虫', '', '1', '4', '4_3_2_1', '1', '2020-05-08 14:12:16', '2020-05-08 14:12:16', '', '1', '0.00');

-- ----------------------------
-- Table structure for user_bank
-- ----------------------------
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

-- ----------------------------
-- Records of user_bank
-- ----------------------------
INSERT INTO `user_bank` VALUES ('1', '1', '招商', '0652', '0', '0', '0', null, null);

-- ----------------------------
-- Table structure for user_bill
-- ----------------------------
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

-- ----------------------------
-- Records of user_bill
-- ----------------------------
INSERT INTO `user_bill` VALUES ('1', '1', '10.00', '1', '1', '1', '2019-12-07', '2019-12-07');
INSERT INTO `user_bill` VALUES ('2', '0', '10.00', '1', '1', '1', '2019-12-07', '2019-12-07');
INSERT INTO `user_bill` VALUES ('10', '0', '100.00', '1', '1', '1', null, null);

-- ----------------------------
-- Table structure for user_cate
-- ----------------------------
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

-- ----------------------------
-- Records of user_cate
-- ----------------------------

-- ----------------------------
-- Table structure for user_credit_log
-- ----------------------------
DROP TABLE IF EXISTS `user_credit_log`;
CREATE TABLE `user_credit_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `type` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user_credit_log
-- ----------------------------

-- ----------------------------
-- Table structure for user_level
-- ----------------------------
DROP TABLE IF EXISTS `user_level`;
CREATE TABLE `user_level` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `team` int(3) DEFAULT '60',
  `up` int(3) DEFAULT '0',
  `commission` int(3) DEFAULT '60',
  `recommend_nums` int(3) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_auto` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user_level
-- ----------------------------
INSERT INTO `user_level` VALUES ('1', '10', '10', '70', '0', '2019-12-13 10:32:17', '2019-12-13 10:32:17', '0');
INSERT INTO `user_level` VALUES ('2', '10', '10', '80', '0', '2019-12-13 10:32:17', '2019-12-13 10:32:17', '0');
INSERT INTO `user_level` VALUES ('3', '0', '0', '90', '0', '2019-12-13 10:32:17', '2019-12-13 10:32:17', '0');
INSERT INTO `user_level` VALUES ('4', '0', '0', '100', '0', null, null, '0');

-- ----------------------------
-- Table structure for user_money
-- ----------------------------
DROP TABLE IF EXISTS `user_money`;
CREATE TABLE `user_money` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `money` decimal(10,2) DEFAULT NULL,
  `predict_money` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user_money
-- ----------------------------
INSERT INTO `user_money` VALUES ('1', '25', '10.00', '20.00', null, null);

-- ----------------------------
-- Table structure for wechat_log
-- ----------------------------
DROP TABLE IF EXISTS `wechat_log`;
CREATE TABLE `wechat_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `msg` varchar(1000) NOT NULL DEFAULT '',
  `return_msg` varchar(1000) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of wechat_log
-- ----------------------------
INSERT INTO `wechat_log` VALUES ('4', '24', '111', '口令转换失败,商品不属于淘客推广商品', '2020-01-21 12:31:26', '2020-01-21 12:31:26');
INSERT INTO `wechat_log` VALUES ('5', '24', '1212', '口令转换失败,商品不属于淘客推广商品', '2020-01-21 12:31:32', '2020-01-21 12:31:32');
INSERT INTO `wechat_log` VALUES ('6', '24', '【柏奈儿红米k30钢化膜红米k20pro全屏k20尊享版小米k30手机k20 pro全覆盖porredmik30无白边redmi抗蓝光贴膜】https://m.tb.cn/h.VYvdwYL 點ゞ撃°鏈﹏接，再选择瀏覽→噐咑№亓；或復ず■淛整句话¢9wwg12z8X7g¢移步到?τáǒЬáǒ?', '转换成功【柏奈儿红米k30钢化膜红米k20pro全屏k20尊享版小米k30手机k20 pro全覆盖porredmik30无白边redmi抗蓝光贴膜】復ず■淛淘口令￥QOp712ACS3T￥移步到氵匋Bao', '2020-01-21 12:31:43', '2020-01-21 12:31:43');
INSERT INTO `wechat_log` VALUES ('7', '24', '111', '口令转换失败,商品不属于淘客推广商品', '2020-02-20 08:23:00', '2020-02-20 08:23:00');
INSERT INTO `wechat_log` VALUES ('8', '24', '111', '口令转换失败,商品不属于淘客推广商品', '2020-02-20 08:23:03', '2020-02-20 08:23:03');
INSERT INTO `wechat_log` VALUES ('9', '24', '11', '口令转换失败,商品不属于淘客推广商品', '2020-02-20 08:54:09', '2020-02-20 08:54:09');
INSERT INTO `wechat_log` VALUES ('10', '24', '121', '口令转换失败,商品不属于淘客推广商品', '2020-02-20 08:55:36', '2020-02-20 08:55:36');
INSERT INTO `wechat_log` VALUES ('11', '24', '2121', '口令转换失败,商品不属于淘客推广商品', '2020-02-20 10:00:48', '2020-02-20 10:00:48');
INSERT INTO `wechat_log` VALUES ('12', '24', '【【买1送1 买2送3】Dragonest/龙巢美国进口西洋参切片花旗参片】https://m.tb.cn/h.VbS4OfL 嚸↑↓擊鏈バ接，再选择瀏覽嘂..咑№亓；或椱ァ製整句话¢eHSB12zJ0v4¢移步到?氵匋Bao?', '口令转换失败,商品不属于淘客推广商品', '2020-02-20 10:28:52', '2020-02-20 10:28:52');
INSERT INTO `wechat_log` VALUES ('13', '24', '【柏奈儿红米k30钢化膜红米k20pro全屏k20尊享版小米k30手机k20 pro全覆盖porredmik30无白边redmi抗蓝光贴膜】https://m.tb.cn/h.VYvdwYL 點ゞ撃°鏈﹏接，再选择瀏覽→噐咑№亓；或復ず■淛整句话¢9wwg12z8X7g¢移步到?τáǒЬáǒ?', '口令转换失败,商品不属于淘客推广商品', '2020-02-20 10:29:20', '2020-02-20 10:29:20');
INSERT INTO `wechat_log` VALUES ('14', '24', '11', '口令转换失败,商品不属于淘客推广商品', '2020-02-20 10:31:14', '2020-02-20 10:31:14');
INSERT INTO `wechat_log` VALUES ('15', '24', '【塔菲克USB蓝牙适配器4.0电脑台式机ps4笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】https://m.tb.cn/h.VbiUpGY 點￡擊☆鏈ㄣ接，再选择瀏覽→噐咑ぺ鐦；或椱ァ製整句话₳Wu4U1dZjvsf₳移步到?τáǒЬáǒ?', '口令转换失败,商品不属于淘客推广商品', '2020-02-20 10:31:28', '2020-02-20 10:31:28');
INSERT INTO `wechat_log` VALUES ('16', '24', '【塔菲克USB蓝牙适配器4.0电脑台式机ps4笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】https://m.tb.cn/h.VbiUpGY 點￡擊☆鏈ㄣ接，再选择瀏覽→噐咑ぺ鐦；或椱ァ製整句话₳Wu4U1dZjvsf₳移步到?τáǒЬáǒ?', '口令转换失败,商品不属于淘客推广商品{\"status\":301,\"content\":\"\\u5f88\\u62b1\\u6b49\\uff01\\u6388\\u6743\\u8d26\\u53f7sid\\u8fc7\\u671f\\u6216\\u8005sid\\u548cappkey\\u4e0d\\u5339\\u914d\\uff01\\uff01\"}', '2020-02-20 10:32:28', '2020-02-20 10:32:28');
INSERT INTO `wechat_log` VALUES ('17', '24', '笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】https://m.tb.cn/h.VbiUpGY 點￡擊☆鏈ㄣ接，再选择瀏覽→噐咑ぺ鐦；或椱ァ製整句话₳Wu4U1dZjvsf₳移步到?τáǒЬáǒ?', '口令转换失败,商品不属于淘客推广商品{\"status\":301,\"content\":\"\\u5f88\\u62b1\\u6b49\\uff01\\u6388\\u6743\\u8d26\\u53f7sid\\u8fc7\\u671f\\u6216\\u8005sid\\u548cappkey\\u4e0d\\u5339\\u914d\\uff01\\uff01\"}', '2020-02-20 10:35:14', '2020-02-20 10:35:14');
INSERT INTO `wechat_log` VALUES ('18', '24', '笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】https://m.tb.cn/h.VbiUpGY 點￡擊☆鏈ㄣ接，再选择瀏覽→噐咑ぺ鐦；或椱ァ製整句话₳Wu4U1dZjvsf₳移步到?τáǒЬáǒ?', '口令转换失败,商品不属于淘客推广商品{\"status\":301,\"content\":\"\\u5f88\\u62b1\\u6b49\\uff01\\u6388\\u6743\\u8d26\\u53f7sid\\u8fc7\\u671f\\u6216\\u8005sid\\u548cappkey\\u4e0d\\u5339\\u914d\\uff01\\uff01\"}', '2020-02-20 10:37:36', '2020-02-20 10:37:36');
INSERT INTO `wechat_log` VALUES ('19', '24', '笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】https://m.tb.cn/h.VbiUpGY 點￡擊☆鏈ㄣ接，再选择瀏覽→噐咑ぺ鐦；或椱ァ製整句话₳Wu4U1dZjvsf₳移步到?τáǒЬáǒ?', '转换成功【塔菲克USB蓝牙适配器4.0电脑台式机ps4笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】復ず■淛淘口令￥jhc714zwKzT￥移步到氵匋Bao', '2020-02-20 11:01:27', '2020-02-20 11:01:27');
INSERT INTO `wechat_log` VALUES ('20', '24', '11', '口令转换失败,商品不属于淘客推广商品', '2020-02-20 13:33:43', '2020-02-20 13:33:43');
INSERT INTO `wechat_log` VALUES ('21', '24', '321323', '口令转换失败,商品不属于淘客推广商品', '2020-02-20 14:13:30', '2020-02-20 14:13:30');
INSERT INTO `wechat_log` VALUES ('22', '24', '笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】https://m.tb.cn/h.VbiUpGY 點￡擊☆鏈ㄣ接，再选择瀏覽→噐咑ぺ鐦；或椱ァ製整句话₳Wu4U1dZjvsf₳移步到?τáǒЬáǒ?', '转换成功【塔菲克USB蓝牙适配器4.0电脑台式机ps4笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】復ず■淛淘口令￥GtEw1f0gK2P￥移步到氵匋Bao', '2020-02-20 14:15:00', '2020-02-20 14:15:00');
INSERT INTO `wechat_log` VALUES ('23', '24', '笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】https://m.tb.cn/h.VbiUpGY 點￡擊☆鏈ㄣ接，再选择瀏覽→噐咑ぺ鐦；或椱ァ製整句话₳Wu4U1dZjvsf₳移步到?τáǒЬáǒ?', '转换成功【塔菲克USB蓝牙适配器4.0电脑台式机ps4笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】復ず■淛淘口令￥TPJ91f0h5jV￥移步到氵匋Bao/n 11', '2020-02-20 14:17:12', '2020-02-20 14:17:12');
INSERT INTO `wechat_log` VALUES ('24', '24', '笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】https://m.tb.cn/h.VbiUpGY 點￡擊☆鏈ㄣ接，再选择瀏覽→噐咑ぺ鐦；或椱ァ製整句话₳Wu4U1dZjvsf₳移步到?τáǒЬáǒ?', '转换成功【塔菲克USB蓝牙适配器4.0电脑台式机ps4笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】復ず■淛淘口令￥NVqN1f0iZYK￥移步到氵匋Bao\\r\\n 11', '2020-02-20 14:18:40', '2020-02-20 14:18:40');
INSERT INTO `wechat_log` VALUES ('25', '24', '转换成功【塔菲克USB蓝牙适配器4.0电脑台式机ps4笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】復ず■淛淘口令￥NVqN1f0iZYK￥移步到氵匋Bao\\r\\n 11', '转换成功【塔菲克USB蓝牙适配器4.0电脑台式机ps4笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】復ず■淛淘口令￥NVqN1f0iZYK￥移步到氵匋Bao<br>11', '2020-02-20 14:19:01', '2020-02-20 14:19:01');
INSERT INTO `wechat_log` VALUES ('26', '24', '转换成功【塔菲克USB蓝牙适配器4.0电脑台式机ps4笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】復ず■淛淘口令￥NVqN1f0iZYK￥移步到氵匋Bao<br>11', '转换成功【塔菲克USB蓝牙适配器4.0电脑台式机ps4笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】復ず■淛淘口令￥NVqN1f0iZYK￥移步到氵匋Bao\n11', '2020-02-20 14:19:53', '2020-02-20 14:19:53');
INSERT INTO `wechat_log` VALUES ('27', '24', '转换成功【塔菲克USB蓝牙适配器4.0电脑台式机ps4笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】復ず■淛淘口令￥NVqN1f0iZYK￥移步到氵匋Bao<br>11', '转换成功【塔菲克USB蓝牙适配器4.0电脑台式机ps4笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】\n淘口令:￥LrIG1f0QCOH￥\n链接https://uland.taobao.com/coupon/edetail?e=9QWQ82dVJ9kGQASttHIRqSogeKJKrIAdrYNGWCYNSWE%2FGmH%2FFpY%2FSmP%2FyvCp5vrahjxxDrGLikGfg7ExTCYnEOHEdA5QWn5OSEyvAL3v9LJ0qM9k%2FRdcGljhj%2BCmrjkaJ47rYvIjaE2UV%2BXZNWcI1cg9sCR4HGbQ%2BOBX2m%2BmAFXymNXcL2pzBOdXfVhGKt3ej%2BvAd8powOc%3D&traceId=0b0b2c1015822086156402957e&relationId=720732350&union_lens=lensId:0b582d96_0ce7_17062fb84f6_27d5&xId=u6WG7pYyxw95uNJb1vfhGlonTzwsAhef7Pv1j3ejQpVlDbyTKqwhlRwCTyQxnMIhek2Wb6F2FwN4BEH3CCYfZG', '2020-02-20 14:24:01', '2020-02-20 14:24:01');
INSERT INTO `wechat_log` VALUES ('28', '24', '￥LrIG1f0QCOH￥', '【塔菲克USB蓝牙适配器4.0电脑台式机ps4笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】\n淘口令:￥ZRfh1f0PkiU￥', '2020-02-20 14:25:31', '2020-02-20 14:25:31');
INSERT INTO `wechat_log` VALUES ('29', '24', '111', '口令转换失败,商品不属于淘客推广商品', '2020-02-20 14:25:58', '2020-02-20 14:25:58');
INSERT INTO `wechat_log` VALUES ('30', '24', '￥ZRfh1f0PkiU￥', '【塔菲克USB蓝牙适配器4.0电脑台式机ps4笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】\n折扣价:12.8\n淘口令:￥HxGN1f0mR8g￥', '2020-02-20 14:30:14', '2020-02-20 14:30:14');
INSERT INTO `wechat_log` VALUES ('31', '24', '￥ZRfh1f0PkiU￥', '【塔菲克USB蓝牙适配器4.0电脑台式机ps4笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】\n折扣价:15.8\n淘口令:￥5gxP1fj0c4R￥', '2020-02-22 06:23:47', '2020-02-22 06:23:47');
INSERT INTO `wechat_log` VALUES ('32', '24', '￥ZRfh1f0PkiU￥', '【塔菲克USB蓝牙适配器4.0电脑台式机ps4笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】\n折扣价:15.8\n淘口令:￥ZcaO1fjZxmw￥', '2020-02-22 06:23:48', '2020-02-22 06:23:48');
INSERT INTO `wechat_log` VALUES ('33', '24', '￥ZRfh1f0PkiU￥', '【塔菲克USB蓝牙适配器4.0电脑台式机ps4笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】\n折扣价:15.8\n淘口令:￥h67T1fjZFu3￥', '2020-02-22 06:24:42', '2020-02-22 06:24:42');
INSERT INTO `wechat_log` VALUES ('34', '24', '￥ZRfh1f0PkiU￥', '【塔菲克USB蓝牙适配器4.0电脑台式机ps4笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】\n折扣价:15.8\n淘口令:￥4RAJ1fjbeTQ￥', '2020-02-22 06:25:55', '2020-02-22 06:25:55');
INSERT INTO `wechat_log` VALUES ('35', '24', '￥ZRfh1f0PkiU￥', '【塔菲克USB蓝牙适配器4.0电脑台式机ps4笔记本pc主机音响耳机鼠标键盘打印机通用外置无线发射接收器5.0免驱动】\n折扣价:15.8\n淘口令:￥Scqq1fjYJlk￥', '2020-02-22 06:26:34', '2020-02-22 06:26:34');
INSERT INTO `wechat_log` VALUES ('36', '24', 'Supervisor', '口令转换失败,商品不属于淘客推广商品', '2020-02-22 06:29:56', '2020-02-22 06:29:56');
INSERT INTO `wechat_log` VALUES ('37', '24', 'Supervisor', '口令转换失败,商品不属于淘客推广商品', '2020-02-22 06:29:58', '2020-02-22 06:29:58');
INSERT INTO `wechat_log` VALUES ('38', '24', '复植这行话₴pm381fQNgOA₴转移至?淘宀┡ē?【小ck大容量水桶包包女2020新款潮网红百搭秋冬宽带斜挎托特包大包】；或https://m.tb.cn/h.VdBXXkv?sm=a3f108 點击链街，再选择瀏→覽→噐咑ぺkai', '口令转换失败,商品不属于淘客推广商品', '2020-02-22 08:05:36', '2020-02-22 08:05:36');
INSERT INTO `wechat_log` VALUES ('39', '24', '付製这行话€Q8b81fl3ZzN€转移至?淘宀┡ē?【高腰泫雅牛仔裤女宽松显瘦春装2020新款秋冬阔腿垂感老爹直筒裤子】；或https://m.tb.cn/h.VWaYDUx?sm=1696ca 掂击鏈→接，再选择瀏→覽→嘂..咑№亓', '【高腰泫雅牛仔裤女宽松显瘦春装2020新款秋冬阔腿垂感老爹直筒裤子】\n折扣价:69\n优惠券:满50元减3元\n淘口令:￥HjXs1fleiw7￥', '2020-02-22 12:10:17', '2020-02-22 12:10:17');
INSERT INTO `wechat_log` VALUES ('40', '25', '￥ZRfh1f0PkiU￥', '口令转换失败,商品不属于淘客推广商品', '2020-05-07 13:23:28', '2020-05-07 13:23:28');
INSERT INTO `wechat_log` VALUES ('41', '25', '11', '口令转换失败,商品不属于淘客推广商品', '2020-05-07 13:44:02', '2020-05-07 13:44:02');
INSERT INTO `wechat_log` VALUES ('42', '25', '111', '口令转换失败,商品不属于淘客推广商品', '2020-05-07 13:44:12', '2020-05-07 13:44:12');
INSERT INTO `wechat_log` VALUES ('43', '26', '{\"ToUserName\":\"gh_65310e6edf4d\",\"FromUserName\":\"o8N8n58Nu6KziLfzq2zXjciWy9u0\",\"CreateTime\":\"1588863562\",\"MsgType\":\"event\",\"Event\":\"subscribe\",\"EventKey\":null}', 'return', '2020-05-07 14:59:23', '2020-05-07 14:59:23');
INSERT INTO `wechat_log` VALUES ('44', '26', '{\"ToUserName\":\"gh_65310e6edf4d\",\"FromUserName\":\"o8N8n58Nu6KziLfzq2zXjciWy9u0\",\"CreateTime\":\"1588863562\",\"MsgType\":\"event\",\"Event\":\"subscribe\",\"EventKey\":null}', 'return', '2020-05-07 14:59:28', '2020-05-07 14:59:28');
INSERT INTO `wechat_log` VALUES ('45', '26', '{\"ToUserName\":\"gh_65310e6edf4d\",\"FromUserName\":\"o8N8n58Nu6KziLfzq2zXjciWy9u0\",\"CreateTime\":\"1588863562\",\"MsgType\":\"event\",\"Event\":\"subscribe\",\"EventKey\":null}', 'return', '2020-05-07 14:59:34', '2020-05-07 14:59:34');
INSERT INTO `wechat_log` VALUES ('46', '26', '{\"ToUserName\":\"gh_65310e6edf4d\",\"FromUserName\":\"o8N8n58Nu6KziLfzq2zXjciWy9u0\",\"CreateTime\":\"1588863670\",\"MsgType\":\"event\",\"Event\":\"unsubscribe\",\"EventKey\":null}', 'return', '2020-05-07 15:01:11', '2020-05-07 15:01:11');
INSERT INTO `wechat_log` VALUES ('47', '26', '{\"ToUserName\":\"gh_65310e6edf4d\",\"FromUserName\":\"o8N8n58Nu6KziLfzq2zXjciWy9u0\",\"CreateTime\":\"1588863871\",\"MsgType\":\"event\",\"Event\":\"subscribe\",\"EventKey\":\"qrscene_boXWGXAV\",\"Ticket\":\"gQH77zwAAAAAAAAAAS5odHRwOi8vd2VpeGluLnFxLmNvbS9xLzAyV284RllBTXZjREQxd3RjWWh1Y0gAAgQdI7ReAwQA6QcA\"}', 'return', '2020-05-07 15:04:32', '2020-05-07 15:04:32');
INSERT INTO `wechat_log` VALUES ('48', '26', '{\"ToUserName\":\"gh_65310e6edf4d\",\"FromUserName\":\"o8N8n58Nu6KziLfzq2zXjciWy9u0\",\"CreateTime\":\"1588863871\",\"MsgType\":\"event\",\"Event\":\"subscribe\",\"EventKey\":\"qrscene_boXWGXAV\",\"Ticket\":\"gQH77zwAAAAAAAAAAS5odHRwOi8vd2VpeGluLnFxLmNvbS9xLzAyV284RllBTXZjREQxd3RjWWh1Y0gAAgQdI7ReAwQA6QcA\"}', 'return', '2020-05-07 15:04:37', '2020-05-07 15:04:37');
INSERT INTO `wechat_log` VALUES ('49', '26', '{\"ToUserName\":\"gh_65310e6edf4d\",\"FromUserName\":\"o8N8n58Nu6KziLfzq2zXjciWy9u0\",\"CreateTime\":\"1588863871\",\"MsgType\":\"event\",\"Event\":\"subscribe\",\"EventKey\":\"qrscene_boXWGXAV\",\"Ticket\":\"gQH77zwAAAAAAAAAAS5odHRwOi8vd2VpeGluLnFxLmNvbS9xLzAyV284RllBTXZjREQxd3RjWWh1Y0gAAgQdI7ReAwQA6QcA\"}', 'return', '2020-05-07 15:04:42', '2020-05-07 15:04:42');
INSERT INTO `wechat_log` VALUES ('50', '25', '1231', '口令转换失败,商品不属于淘客推广商品', '2020-05-08 01:54:53', '2020-05-08 01:54:53');
INSERT INTO `wechat_log` VALUES ('51', '25', '312123', '口令转换失败,商品不属于淘客推广商品', '2020-05-08 01:56:03', '2020-05-08 01:56:03');
INSERT INTO `wechat_log` VALUES ('52', '35', '12', '口令转换失败,商品不属于淘客推广商品', '2020-05-08 07:41:48', '2020-05-08 07:41:48');
INSERT INTO `wechat_log` VALUES ('53', '35', '1', '口令转换失败,商品不属于淘客推广商品', '2020-05-08 07:45:49', '2020-05-08 07:45:49');
INSERT INTO `wechat_log` VALUES ('54', '35', '0', '菜单', '2020-05-08 07:45:52', '2020-05-08 07:45:52');
INSERT INTO `wechat_log` VALUES ('55', '35', '0', '菜单', '2020-05-08 07:45:58', '2020-05-08 07:45:58');
INSERT INTO `wechat_log` VALUES ('56', '35', '12', '口令转换失败,商品不属于淘客推广商品', '2020-05-08 07:46:21', '2020-05-08 07:46:21');
INSERT INTO `wechat_log` VALUES ('57', '35', '121212', '口令转换失败,商品不属于淘客推广商品', '2020-05-08 07:47:22', '2020-05-08 07:47:22');
INSERT INTO `wechat_log` VALUES ('58', '35', '12123', '口令转换失败,商品不属于淘客推广商品', '2020-05-08 07:47:42', '2020-05-08 07:47:42');
INSERT INTO `wechat_log` VALUES ('59', '35', '1', '口令转换失败,商品不属于淘客推广商品', '2020-05-08 07:48:25', '2020-05-08 07:48:25');
INSERT INTO `wechat_log` VALUES ('60', '35', '0', '菜单', '2020-05-08 07:48:35', '2020-05-08 07:48:35');
INSERT INTO `wechat_log` VALUES ('61', '35', '1', '口令转换失败,商品不属于淘客推广商品', '2020-05-08 07:49:14', '2020-05-08 07:49:14');
INSERT INTO `wechat_log` VALUES ('62', '35', '2', '口令转换失败,商品不属于淘客推广商品', '2020-05-08 07:49:20', '2020-05-08 07:49:20');
INSERT INTO `wechat_log` VALUES ('63', '1', '1', '口令转换失败,商品不属于淘客推广商品', '2020-05-08 07:49:39', '2020-05-08 07:49:39');
INSERT INTO `wechat_log` VALUES ('64', '1', '0', '菜单', '2020-05-08 07:49:43', '2020-05-08 07:49:43');
INSERT INTO `wechat_log` VALUES ('65', '1', '0', '菜单', '2020-05-08 14:09:17', '2020-05-08 14:09:17');
INSERT INTO `wechat_log` VALUES ('66', '1', '1', '口令转换失败,商品不属于淘客推广商品', '2020-05-08 14:09:20', '2020-05-08 14:09:20');
INSERT INTO `wechat_log` VALUES ('67', '2', '615527525103', '【水枪玩具儿童超大号喷水枪大容量大人高压抽拉式打水枪呲水抢男孩】\n折扣价:36\n优惠券:满3元减2元\n淘口令:￥LbnP1oCyBVR￥', '2020-05-10 08:18:42', '2020-05-10 08:18:42');
INSERT INTO `wechat_log` VALUES ('68', '2', '111', '口令转换失败,商品不属于淘客推广商品', '2020-05-10 08:19:16', '2020-05-10 08:19:16');
INSERT INTO `wechat_log` VALUES ('69', '2', '12335', '口令转换失败,商品不属于淘客推广商品', '2020-05-10 08:19:58', '2020-05-10 08:19:58');
INSERT INTO `wechat_log` VALUES ('70', '2', '615527525103', '【水枪玩具儿童超大号喷水枪大容量大人高压抽拉式打水枪呲水抢男孩】\n折扣价:36\n优惠券:满3元减2元\n淘口令:￥LbnP1oCyBVR￥', '2020-05-10 08:20:09', '2020-05-10 08:20:09');
INSERT INTO `wechat_log` VALUES ('71', '2', '602738507932', '【手机挂绳女挂绳挂脖潮款水晶女吊坠u盘vivo链条红绳oppo网红抖音男款可爱高档可拆卸两用个性创意时尚肖战绳】\n折扣价:4.8\n优惠券:满4元减3元\n淘口令:￥LB9s1oyRak9￥', '2020-05-10 08:43:28', '2020-05-10 08:43:28');
INSERT INTO `wechat_log` VALUES ('72', '2', '592463509050', '【小包装爆花玉米 蝶形爆裂玉米粒 自制爆米花原料 苞谷粒 100g】\n折扣价:2.9\n优惠券:满2元减1元\n淘口令:￥AR651oy8EZ8￥', '2020-05-10 08:45:32', '2020-05-10 08:45:32');
INSERT INTO `wechat_log` VALUES ('73', '2', '586736159815', '【粘毛器粘尘纸可撕式10cm滚筒衣物除尘替换卷纸滚刷衣服沾毛神器黏】\n折扣价:4.9\n优惠券:满4元减2元\n淘口令:￥f50b1oyN1Ix￥', '2020-05-10 08:53:31', '2020-05-10 08:53:31');
INSERT INTO `wechat_log` VALUES ('74', '2', '596998118731', '【304不锈钢冰块金属冰酒石速冻钢威士忌不化冰粒冰镇饮料抖音冰冻】\n折扣价:5.8\n优惠券:满5元减1元\n淘口令:￥LobA1oyK2sg￥', '2020-05-10 08:58:35', '2020-05-10 08:58:35');
INSERT INTO `wechat_log` VALUES ('75', '2', 'fu至这行话₳LJqB1oB3LYA₳打开?淘宝?或点几链街https://m.tb.cn/h.V9QABQw?sm=33db3a 至瀏lan嘂..【花花公子男士连帽短袖t恤套装夏季休闲潮牌潮流宽松渐变冰丝夏装】', '口令转换失败,商品不属于淘客推广商品', '2020-05-10 09:29:13', '2020-05-10 09:29:13');
INSERT INTO `wechat_log` VALUES ('76', '2', '复制这段话$YFMG1oBVnbW$打开?淘宝?或掂击鏈→接https://m.tb.cn/h.VQSNMqX?sm=ce63e5 至瀏..覽..噐【2020新款夏季休闲套装男士宽松潮流短袖帅气衣服潮牌t恤一套男装】', '口令转换失败,商品不属于淘客推广商品', '2020-05-10 09:31:07', '2020-05-10 09:31:07');
INSERT INTO `wechat_log` VALUES ('77', '2', '复制这行话¢G15k1oBUXIW¢打开?氵匋宝?或点几鏈→接https://m.tb.cn/h.VQw80wT?sm=bf277d 至瀏lan嘂..【南极人短袖t恤男士休闲套装夏季宽松潮牌半袖韩版潮流体恤男上衣】', '口令转换失败,商品不属于淘客推广商品', '2020-05-10 09:33:51', '2020-05-10 09:33:51');
INSERT INTO `wechat_log` VALUES ('78', '2', 'fu植这段话€xR9o1oBS2Hy€打開?淘宝?或點击链街https://m.tb.cn/h.VQSqiyH?sm=d4ad94 至瀏..覽..噐【冰丝短袖t恤男潮牌2020新款夏季体桖宽松韩版ins潮流休闲两件套装】', '口令转换失败,商品不属于淘客推广商品', '2020-05-10 09:39:43', '2020-05-10 09:39:43');
INSERT INTO `wechat_log` VALUES ('79', '2', '复制这行话€WVuj1oB7iSU€转移至?氵匋宝?或點击链街https://m.tb.cn/h.V9930Zg?sm=8a3bb2 至瀏..覽..噐【花花公子夏季男士短袖T恤潮牌休闲运动套装男一套衣服渐变两件套】', '口令转换失败,商品不属于淘客推广商品', '2020-05-10 09:41:10', '2020-05-10 09:41:10');
INSERT INTO `wechat_log` VALUES ('80', '2', 'fu至这行话¢IzFF1oBi3e7¢打开??宝?或點击鏈→接https://m.tb.cn/h.VQwOaQS?sm=08100f 至瀏..覽..噐【男孩套装15岁初中学生短袖t恤12大童运动衣服一套帅气休闲夏装潮】', '口令转换失败,商品不属于淘客推广商品', '2020-05-10 09:41:37', '2020-05-10 09:41:37');
INSERT INTO `wechat_log` VALUES ('81', '2', 'fu至这行话¢mMRW1oBidVQ¢转移至??宝?或點击链街https://m.tb.cn/h.Vjrbf2F?sm=7dc100 至瀏..覽..噐【夏季运动休闲套装男学生韩版潮流个性渐变色短袖t恤一套男装上衣】', '口令转换失败,商品不属于淘客推广商品', '2020-05-10 09:42:04', '2020-05-10 09:42:04');
INSERT INTO `wechat_log` VALUES ('82', '2', 'fu致这段话¢0jiu1oBRfVr¢转移至??宝?或点几鏈→接https://m.tb.cn/h.VQwlUc4?sm=f1c7be 至瀏..覽..噐【花花公子短袖T恤套装男潮牌学生夏季纯棉修身潮流帅气休闲两件套】', '口令转换失败,商品不属于淘客推广商品', '2020-05-10 09:42:25', '2020-05-10 09:42:25');
INSERT INTO `wechat_log` VALUES ('83', '2', '\n⭕【SSUR】自动扣真皮男士腰带\n❥原价9.80?\n❥跟我买【8.80】?\n————————\n(K8cG1ozqs5N)\n⚡復製本条消息打开手机?寳即可', '【男士真皮皮带腰带自动扣裤带牛皮正品中青年商务韩潮休闲时尚皮带】\n折扣价:9.8\n优惠券:满9元减1元\n淘口令:￥TOQb1ozJ8jW￥', '2020-05-10 11:06:38', '2020-05-10 11:06:38');
INSERT INTO `wechat_log` VALUES ('84', '2', '11', '口令转换失败,商品不属于淘客推广商品', '2020-05-10 11:13:30', '2020-05-10 11:13:30');
INSERT INTO `wechat_log` VALUES ('85', '2', '222', '口令转换失败,商品不属于淘客推广商品', '2020-05-10 11:13:56', '2020-05-10 11:13:56');
INSERT INTO `wechat_log` VALUES ('86', '2', '2694', '口令转换失败,商品不属于淘客推广商品', '2020-05-10 11:15:42', '2020-05-10 11:15:42');
INSERT INTO `wechat_log` VALUES ('87', '1', '【男士真皮皮带腰带自动扣裤带牛皮正品中青年商务韩潮休闲时尚皮带】\n折扣价:9.8\n优惠券:满9元减1元\n淘口令:￥TOQb1ozJ8jW￥', '【男士真皮皮带腰带自动扣裤带牛皮正品中青年商务韩潮休闲时尚皮带】\n折扣价:9.8\n优惠券:满9元减1元\n淘口令:￥Qrjc1oA2Zoz￥', '2020-05-10 11:33:35', '2020-05-10 11:33:35');
INSERT INTO `wechat_log` VALUES ('88', '2', 'fu置这行话¢tpCj1oApw4D¢转移至?氵匋宝?或掂击鏈→接https://m.tb.cn/h.VjIIuQx?sm=c54c39 至瀏lan嘂..【花花公子夏季男士短袖t恤休闲套装韩版潮流一套搭配帅气潮牌衣服】', '口令转换失败,商品不属于淘客推广商品', '2020-05-10 12:02:59', '2020-05-10 12:02:59');
INSERT INTO `wechat_log` VALUES ('89', '2', '集木优品本色纸巾抽纸整箱18包家用实惠装大包餐巾纸大号面巾纸柔 【包邮】\n【在售价】54.90元\n【券后价】39.90元\n【下单链接】https://m.tb.cn/h.VjIsNQI \n----------------- \n注意，请完整复制这条信息，$DYHU1oAqId8$，到【手机淘宝】即可查看', '【集木优品本色纸巾抽纸整箱18包家用实惠装大包餐巾纸大号面巾纸柔】\n折扣价:54.9\n优惠券:满49元减15元\n淘口令:￥F1lE1oAqk8a￥', '2020-05-10 12:04:12', '2020-05-10 12:04:12');
INSERT INTO `wechat_log` VALUES ('90', '1', '111', '口令转换失败,商品不属于淘客推广商品', '2020-05-19 13:02:24', '2020-05-19 13:02:24');
INSERT INTO `wechat_log` VALUES ('91', '1', '12', '口令转换失败,商品不属于淘客推广商品', '2020-05-19 13:02:42', '2020-05-19 13:02:42');
INSERT INTO `wechat_log` VALUES ('92', '1', '22', '口令转换失败,商品不属于淘客推广商品', '2020-05-19 13:04:29', '2020-05-19 13:04:29');
INSERT INTO `wechat_log` VALUES ('93', '1', '222', '口令转换失败,商品不属于淘客推广商品', '2020-06-04 19:13:19', '2020-06-04 19:13:19');
INSERT INTO `wechat_log` VALUES ('94', '1', '222', '口令转换失败,商品不属于淘客推广商品', '2020-06-04 19:15:07', '2020-06-04 19:15:07');
INSERT INTO `wechat_log` VALUES ('95', '1', '222', '口令转换失败,商品不属于淘客推广商品', '2020-06-04 19:17:45', '2020-06-04 19:17:45');
INSERT INTO `wechat_log` VALUES ('96', '2', '1', '口令转换失败,商品不属于淘客推广商品', '2020-06-04 19:25:45', '2020-06-04 19:25:45');
INSERT INTO `wechat_log` VALUES ('97', '2', 'yhtk.gp93.cn/home/index', '口令转换失败,商品不属于淘客推广商品', '2020-06-04 19:47:38', '2020-06-04 19:47:38');
INSERT INTO `wechat_log` VALUES ('98', '1', '1', '口令转换失败,商品不属于淘客推广商品', '2020-06-06 04:30:02', '2020-06-06 04:30:02');
INSERT INTO `wechat_log` VALUES ('99', '1', 'yhtk.gp93.cn', '口令转换失败,商品不属于淘客推广商品', '2020-06-07 01:14:28', '2020-06-07 01:14:28');
INSERT INTO `wechat_log` VALUES ('100', '1', 'yhtk.gp93.cn/home/index', '口令转换失败,商品不属于淘客推广商品', '2020-06-07 01:14:50', '2020-06-07 01:14:50');

-- ----------------------------
-- Table structure for wechat_msg
-- ----------------------------
DROP TABLE IF EXISTS `wechat_msg`;
CREATE TABLE `wechat_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of wechat_msg
-- ----------------------------
INSERT INTO `wechat_msg` VALUES ('1', '0', '菜单', null, null);

-- ----------------------------
-- Table structure for yhc_exception
-- ----------------------------
DROP TABLE IF EXISTS `yhc_exception`;
CREATE TABLE `yhc_exception` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of yhc_exception
-- ----------------------------
