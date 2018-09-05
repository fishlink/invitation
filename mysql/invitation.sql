/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : invitation

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-09-05 08:46:24
*/

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `invitation` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `invitation`;

-- ----------------------------
-- Table structure for user
-- ----------------------------
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `realname` varchar(255) NOT NULL COMMENT '用户真实姓名',
  `mobile` varchar(11) NOT NULL COMMENT '用户手机号',
  `delete` tinyint(1) NOT NULL DEFAULT '0',
  `update_time` datetime DEFAULT NULL,
  `add_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;
