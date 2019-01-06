/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : shopping

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-01-06 19:25:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for addr
-- ----------------------------
DROP TABLE IF EXISTS `addr`;
CREATE TABLE `addr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `sname` varchar(30) DEFAULT NULL,
  `stel` varchar(11) DEFAULT NULL,
  `addr` varchar(20) DEFAULT NULL,
  `addrinfo` varchar(10) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of addr
-- ----------------------------
INSERT INTO `addr` VALUES ('1', '1', '张三', '15028343051', '张家口', '张家口康保县', '939923094@qq.com');
INSERT INTO `addr` VALUES ('2', '3', '李四', '119', '康宝', '张北', '110@qq.com');

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `lasttime` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', '阿里巴巴222', 'eyJpdiI6IldHeW5mdUM3RHQ0MTFRd0s3Zm93aGc9PSIsInZhbHVlIjoiWENROUIzMHp1UHI2S0c5TytUVmtVQT09IiwibWFjIjoiNjUxNDBlYzNjZGFiM2QxYTk2MzUyYzUyMzQ5MWFjMTUzODMwY2U1MWI1ZjgxYTg0ZmFmZDBiNWQ0NTFhYjE1OCJ9', '1544541308', null, null, '1');
INSERT INTO `admin` VALUES ('26', '阿里巴巴33', 'eyJpdiI6IkdIXC9lK2ozT3JCYU9GUWNUUmtjNjNnPT0iLCJ2YWx1ZSI6InU4ZlhVUHVXam40Wk1iQ1ZkNHdyN3c9PSIsIm1hYyI6IjVkMjI2NDYzZTVhZDAxNmEyNWRhYmYxZjY5ZmU4NDUwOWQ5ZmM4ZmY5ZTg2MmY1YjcxYTY5ZmI4ZDkwMDdiZDEifQ==', '1544583469', null, null, '1');
INSERT INTO `admin` VALUES ('28', '哈哈222222', 'eyJpdiI6IjlISUg1emlDaE9BQWtuWVdmWUxRZ2c9PSIsInZhbHVlIjoiSHh4SnBaVjhvWmVFN2tuMGlTdHNUdz09IiwibWFjIjoiMDlmM2M5YzMyZWYzYjQ4Y2M2NDI1MjcxYmRlNDVhOTI4YWEzMTU0ZmMzZTNlMjU5ZDJjODEzOGUwMzU4ZWMxNCJ9', '1544586638', null, null, '0');
INSERT INTO `admin` VALUES ('29', '安于大大222', 'eyJpdiI6IlwvU1hvRzQ2OEl4OWk2cGVSZTFUU3Z3PT0iLCJ2YWx1ZSI6InY1TnAzMWp3eGtxU29MaWZmSm13Qnc9PSIsIm1hYyI6Ijc2ZTYyZDk0YjhjOWYzNjhhYTY0OGE3N2NmMjFmNjY2OWQ3YmJlNjVkYjQyMjVjODZmNTBhNzkwZGE1MWQxNzEifQ==', '1544586655', null, null, '0');
INSERT INTO `admin` VALUES ('31', '阿里巴巴223', 'eyJpdiI6IkZ4bUZ4c1U4TXd0Rk9xa1JjKzlEbGc9PSIsInZhbHVlIjoiZXNvdU81UjlcL2tjTklPODNKVVl0WUE9PSIsIm1hYyI6IjYxN2Y4Mjk4NWNjNGViMjc2N2I3M2IwOTFjZGE2NzJjYmI3YjY1OTVlYTc3Y2NiMDNiODAzZWMxMzExMjg3YTkifQ==', '1544601590', null, null, '0');
INSERT INTO `admin` VALUES ('32', 'lqy9399', 'eyJpdiI6IlljelJIMHBWN2dLRThQaEpBSmtMRVE9PSIsInZhbHVlIjoiNXcxSjUzWmFoRDJrZFVcLzE3ZW5rR3c9PSIsIm1hYyI6IjJlODEzZTI5YzVlNWEwMGQzNzFkOTQzNDU5ZGQ1NDgzNWUxZDlkZThiNDdlMzcyNTdlMzExOGYyODE1NTNmMDkifQ==', '1545890329', '1546735364', '18', '0');

-- ----------------------------
-- Table structure for ads
-- ----------------------------
DROP TABLE IF EXISTS `ads`;
CREATE TABLE `ads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(40) DEFAULT NULL,
  `sort` int(100) DEFAULT NULL,
  `href` varchar(40) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ads
-- ----------------------------
INSERT INTO `ads` VALUES ('15', '15459957641019773285.png', '10', 'www.baidu.com', '开年福利篇');
INSERT INTO `ads` VALUES ('16', '15459958071298930235.png', '50', 'www.baidu.com', '让爱早回家');
INSERT INTO `ads` VALUES ('17', '1545995851521902622.png', '10', 'www.baidu.com', '甜甜蜜蜜');

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `text` varchar(100) DEFAULT NULL,
  `start` tinyint(5) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `statu` tinyint(255) DEFAULT NULL,
  `img` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '1', '19', '1111', '1', '2222222', '0', null);
INSERT INTO `comment` VALUES ('2', '2', '19', '2222', '4', '222', '1', null);
INSERT INTO `comment` VALUES ('3', '3', '19', '3333', '5', '333', '0', null);

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `img` varchar(40) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `config` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('19', '32', '雪之恋和风大福', '雪之恋和风大福', '1546694766737890916.jpg', '20', '20', '<p>1111111111111</p>', '<p>111111111111111111</p>');
INSERT INTO `goods` VALUES ('20', '35', '雪之恋和风大福', '雪之恋和风大福', '154669485298703891.jpg', '50', '10', '<p>2222222222</p>', '<p>2222222222222</p>');

-- ----------------------------
-- Table structure for goodsimg
-- ----------------------------
DROP TABLE IF EXISTS `goodsimg`;
CREATE TABLE `goodsimg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(11) DEFAULT NULL,
  `img` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goodsimg
-- ----------------------------
INSERT INTO `goodsimg` VALUES ('15', '19', '1546694789789326187.jpg');
INSERT INTO `goodsimg` VALUES ('16', '19', '15466947891892697019.jpg');
INSERT INTO `goodsimg` VALUES ('17', '19', '1546694789424176513.jpg');
INSERT INTO `goodsimg` VALUES ('18', '20', '15466948612072276153.jpg');
INSERT INTO `goodsimg` VALUES ('19', '20', '1546694861585949104.jpg');
INSERT INTO `goodsimg` VALUES ('20', '20', '15466948621041874981.jpg');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `uid` int(10) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `money` tinyint(4) DEFAULT NULL,
  `sid` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', '0001', '1', '1', '200', '2', '1', '2121212', '0', '6');
INSERT INTO `orders` VALUES ('2', '1100', '3', '2', '100', '1', '2', '1111', '1', '4');
INSERT INTO `orders` VALUES ('3', '1100', '3', '3', '20', '3', '2', '1111', '1', '4');

-- ----------------------------
-- Table structure for orderstatu
-- ----------------------------
DROP TABLE IF EXISTS `orderstatu`;
CREATE TABLE `orderstatu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orderstatu
-- ----------------------------
INSERT INTO `orderstatu` VALUES ('1', '未付款');
INSERT INTO `orderstatu` VALUES ('2', '已经发货');
INSERT INTO `orderstatu` VALUES ('3', '在途中');
INSERT INTO `orderstatu` VALUES ('4', '配送中');
INSERT INTO `orderstatu` VALUES ('5', '签收');
INSERT INTO `orderstatu` VALUES ('6', '交易完成');

-- ----------------------------
-- Table structure for slider
-- ----------------------------
DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(40) DEFAULT NULL,
  `orders` tinyint(4) DEFAULT NULL,
  `title` varchar(10) DEFAULT NULL,
  `href` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of slider
-- ----------------------------
INSERT INTO `slider` VALUES ('12', '15459962231161423733.jpg', '41', '轮播图1', 'www.baidu.com');
INSERT INTO `slider` VALUES ('13', '15459962451271823388.jpg', '15', '轮播图2', 'www.baidu.com');
INSERT INTO `slider` VALUES ('14', '15459962811889258939.jpg', '9', '轮播3', 'www.baidu.com');
INSERT INTO `slider` VALUES ('15', '15459963021888138937.jpg', '10', '轮播4', 'www.baidu.com');

-- ----------------------------
-- Table structure for sys-types
-- ----------------------------
DROP TABLE IF EXISTS `sys-types`;
CREATE TABLE `sys-types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) DEFAULT NULL,
  `img` varchar(40) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys-types
-- ----------------------------
INSERT INTO `sys-types` VALUES ('5', '30', '1546003413815946581.jpg', '0', '分类广告1');
INSERT INTO `sys-types` VALUES ('6', '30', '15460035001775574601.png', '0', '分类广告2');
INSERT INTO `sys-types` VALUES ('7', '30', '15460675981997564978.png', '0', '分类广告大图1');
INSERT INTO `sys-types` VALUES ('8', '33', '15460677011537455929.png', '1', '分类广告大图2');
INSERT INTO `sys-types` VALUES ('9', '30', '15460677571815305404.png', '1', '分类广告大图1');

-- ----------------------------
-- Table structure for types
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `sort` int(100) DEFAULT NULL,
  `is_lou` tinyint(4) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES ('30', '衣服', '0', '0,', '1', '1', '衣服', '衣服', '衣服');
INSERT INTO `types` VALUES ('31', '男装', '30', '0,30,', '50', '1', '男装', '男装', '男装');
INSERT INTO `types` VALUES ('32', '男皮夹克', '31', '0,30,31,', '20', '0', null, '30', '男皮夹克');
INSERT INTO `types` VALUES ('33', '电器', '0', '0,', '10', '1', '电器电器', '电器', '电器');
INSERT INTO `types` VALUES ('34', '家用电器', '33', '0,33,', '10', '0', '家用嗲你去', '家用电器', '家用电器');
INSERT INTO `types` VALUES ('35', '电饭锅', '34', '0,33,34,', '10', '1', '电饭锅', '电饭锅', '电饭锅');
INSERT INTO `types` VALUES ('36', '食品', '0', '0,', '10', '0', '食品', '食品', '食品');
INSERT INTO `types` VALUES ('37', '家具', '0', '0,', '10', '1', '家具', '家具', '家具');
INSERT INTO `types` VALUES ('38', '手机', '0', '0,', '50', '0', '手机', '手机', '手机');
INSERT INTO `types` VALUES ('39', '礼品', '0', '0,', '10', '0', '名 :  礼品', '名 :  礼品', '名 :  礼品');
INSERT INTO `types` VALUES ('40', '美妆', '0', '0,', '10', '0', '美妆', '美妆', '美妆');
INSERT INTO `types` VALUES ('41', '玩具', '0', '0,', '10', '0', '玩具', '玩具', '玩具');
INSERT INTO `types` VALUES ('42', '女装', '0', '0,', '10', '0', '女装', '女装', '女装');
INSERT INTO `types` VALUES ('43', '电脑', '0', '0,', '2', '0', '电脑', '电脑', '电脑');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(20) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `token` varchar(50) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '939923094@qq.com', '123123', '0', '1544586638', '2121212', '0', '12122', 'user1');
INSERT INTO `users` VALUES ('2', '562458484@qq.com', '5454', '1', '1544586638', '788778', '5', '8687', 'user2');
INSERT INTO `users` VALUES ('3', '1111111@qq.com', '5454', '2', '1544586638', '8787', '5', '8787', 'user3');
