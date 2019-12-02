/*
Navicat MySQL Data Transfer

Source Server         : localmysql
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : 520makati

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-12-02 19:07:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `login_ip` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lastlogined_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'eyJpdiI6Ink0S0tEemtWN2RzTDhpXC9cLzNlRk5Idz09IiwidmFsdWUiOiJnU1RsK1BpMmtKemlXc2VsUzAyb2xBPT0iLCJtYWMiOiJjMTFiM2RjOTNmYmU3ZjQ4OWM5M2ZhZDgxOTVlNzkyOTNmMmRkNjk5MjMwNzU2NDE0YmRiZDRkYjNhYWI2ZjZlIn0=', '1', '127.0.0.1', '2018-07-09 13:41:55', '2019-12-02 11:06:23', '2019-12-02 11:06:23');

-- ----------------------------
-- Table structure for `attribute`
-- ----------------------------
DROP TABLE IF EXISTS `attribute`;
CREATE TABLE `attribute` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `key` varchar(30) DEFAULT NULL,
  `value` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of attribute
-- ----------------------------
INSERT INTO `attribute` VALUES ('1', '电报1', 'telegram', '123123123');
INSERT INTO `attribute` VALUES ('2', '电报2', 'telegram', '23sdfs32324');
INSERT INTO `attribute` VALUES ('3', '微信1', 'weixin', 'kljisdf45564');
INSERT INTO `attribute` VALUES ('4', '电话1', 'number', '6359865851');

-- ----------------------------
-- Table structure for `girlphotos`
-- ----------------------------
DROP TABLE IF EXISTS `girlphotos`;
CREATE TABLE `girlphotos` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `g_id` int(11) NOT NULL,
  `photo` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `g_id` (`g_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of girlphotos
-- ----------------------------
INSERT INTO `girlphotos` VALUES ('1', '1', '/public/uploads/20191201/1.jpeg');
INSERT INTO `girlphotos` VALUES ('2', '1', '/public/uploads/20191201/2.jpeg');
INSERT INTO `girlphotos` VALUES ('3', '1', '/public/uploads/20191201/3.jpeg');
INSERT INTO `girlphotos` VALUES ('4', '3', '/public/uploads/20191201/1.jpg');
INSERT INTO `girlphotos` VALUES ('5', '3', '/public/uploads/20191201/2.jpg');
INSERT INTO `girlphotos` VALUES ('6', '3', '/public/uploads/20191201/3.jpg');
INSERT INTO `girlphotos` VALUES ('7', '3', '/public/uploads/20191201/4.jpg');
INSERT INTO `girlphotos` VALUES ('8', '3', '/public/uploads/20191201/5.jpg');
INSERT INTO `girlphotos` VALUES ('9', '3', '/public/uploads/20191202/1575257155xs4ea.jpg');
INSERT INTO `girlphotos` VALUES ('10', '3', '/public/uploads/20191202/1575257197MNz7m.jpg');

-- ----------------------------
-- Table structure for `girls`
-- ----------------------------
DROP TABLE IF EXISTS `girls`;
CREATE TABLE `girls` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `nation_id` tinyint(2) NOT NULL,
  `cover` varchar(150) NOT NULL,
  `intro` text NOT NULL COMMENT '简介',
  `service` text COMMENT '服务内容',
  `videolist` text,
  `views` int(8) NOT NULL DEFAULT '0' COMMENT '浏览次数',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:有空 1:在上钟 2:休息中 3:下架 9:已删除',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of girls
-- ----------------------------
INSERT INTO `girls` VALUES ('1', 'Violet', '2', '/public/uploads/20191202/157528034042Ot8.jpg', 'intro', 'service', 'http://baidu.com\r\nhttp://google.com', '0', '0', '2019-12-02 17:52:21', '2019-12-02 17:52:21');
INSERT INTO `girls` VALUES ('2', 'Shine', '2', '/public/uploads/20191202/15752803285PzLz.jpg', 'intro', 'service', '', '0', '0', '2019-12-02 18:59:39', '2019-12-02 18:59:39');
INSERT INTO `girls` VALUES ('3', 'test1', '6', '/public/uploads/20191201/15752085059XgRo.jpg', '颜值系 19岁年轻妹妹 女朋友感觉 强烈推荐\r\nFrom 来自：Gui Zhou 贵州\r\nName 姓名：【3011号】Qing Ning Meng 青柠檬\r\nAge 年龄 : 19\r\nHeight 身高 : 163CM\r\nBoobs 胸围 : 34C\r\n房间是否允许吸烟 : YES/是\r\nRoom 包房\r\nArea 地区：CENTRAL/中部\r\nLocation 地点：Central Hotel 中部酒店\r\nType 类型：FULL SERVICE (全套服务)\r\nDamage 价格：$240/1shot/60mins', '洗澡/CatBath\r\n接吻/French\r\n舌吻/Frenching\r\n全身漫游/Full body catbath\r\n性感按摩/Sexy Massag\r\n深喉旋转口交/Deepthroat Twisting BJ\r\n抓根/Manhood Wellness\r\n无套口交/BBBJ\r\n有套口交/BJ\r\n六九\r\n口爆/Cum In Mouth\r\n有套做爱/FJ\r\n射胸/Cum On Breast\r\n波推\r\n舔妹妹/Painting\r\n舔乳头/Nipples', 'https://www.youtube.com/embed/8j41SmoXvY8\r\nhttps://www.youtube.com/embed/36h0-Z6KbL0', '0', '1', '2019-12-02 16:54:53', '2019-12-02 16:54:53');

-- ----------------------------
-- Table structure for `nation`
-- ----------------------------
DROP TABLE IF EXISTS `nation`;
CREATE TABLE `nation` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `nation` varchar(30) NOT NULL,
  `flag` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nation
-- ----------------------------
INSERT INTO `nation` VALUES ('1', '中国', '/public/uploads/20191202/1575274104EFFRO.png');
INSERT INTO `nation` VALUES ('2', '越南', '/public/uploads/20191202/1575274132SK9Yz.png');
INSERT INTO `nation` VALUES ('3', '泰国', '/public/uploads/20191202/1575274143Z7pqT.png');
INSERT INTO `nation` VALUES ('4', '菲律宾', '/public/uploads/20191202/1575274156HsCxF.png');
INSERT INTO `nation` VALUES ('5', '新加坡', '/public/uploads/20191202/1575274166QtElL.png');
INSERT INTO `nation` VALUES ('6', '日本', '/public/uploads/20191202/1575274175Qzmwn.png');
INSERT INTO `nation` VALUES ('7', '韩国', '/public/uploads/20191202/1575274187YrFQP.png');
INSERT INTO `nation` VALUES ('8', '俄罗斯', '/public/uploads/20191202/1575274197WzGKE.png');
