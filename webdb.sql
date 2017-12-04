/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : webdb

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-12-04 22:54:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_admin
-- ----------------------------
DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `pwd` varchar(32) DEFAULT NULL,
  `tname` varchar(50) DEFAULT NULL,
  `uname` varchar(50) DEFAULT NULL,
  `login_time` int(10) DEFAULT NULL COMMENT '最后登录时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_admin
-- ----------------------------
INSERT INTO `tb_admin` VALUES ('1', '1001', 'd28a3097fa7cf63ad01c4f328314e2f2', '袁茹兵', '南广轩主', null);

-- ----------------------------
-- Table structure for tb_article
-- ----------------------------
DROP TABLE IF EXISTS `tb_article`;
CREATE TABLE `tb_article` (
  `id` int(10) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `author` varchar(30) DEFAULT NULL COMMENT '文章作者',
  `summary` varchar(100) DEFAULT NULL,
  `content` text,
  `img_thumb` varchar(255) DEFAULT NULL COMMENT '封面略缩图',
  `channel_id` int(2) DEFAULT NULL COMMENT '频道id',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态，1为显示',
  `category` int(2) DEFAULT NULL COMMENT '频道下边的分类',
  `add_time` int(10) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_article
-- ----------------------------
INSERT INTO `tb_article` VALUES ('1', 'web文章一', 'admin', '摘要', '内容', '展示略缩图', '2', '1', '3', null);
INSERT INTO `tb_article` VALUES ('2', '新闻一', 'admin', '摘要', '内容', '略缩图', '1', '1', '1', null);

-- ----------------------------
-- Table structure for tb_category
-- ----------------------------
DROP TABLE IF EXISTS `tb_category`;
CREATE TABLE `tb_category` (
  `id` int(11) NOT NULL,
  `channel` int(2) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL COMMENT '分类的名字',
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_category
-- ----------------------------
INSERT INTO `tb_category` VALUES ('1', '1', '网站更新', 'New/1');
INSERT INTO `tb_category` VALUES ('2', '1', '心得随笔', 'New/2');
INSERT INTO `tb_category` VALUES ('3', '2', 'DIV/CSS', 'Web/3');
INSERT INTO `tb_category` VALUES ('4', '2', 'JS部分', 'Web/4');
INSERT INTO `tb_category` VALUES ('5', '2', '网站建设', 'Web/5');
INSERT INTO `tb_category` VALUES ('6', '3', 'PHP基础', 'Php/6');
INSERT INTO `tb_category` VALUES ('7', '3', 'PHP框架', 'Php/7');
INSERT INTO `tb_category` VALUES ('8', '3', '数据库', 'Php/8');

-- ----------------------------
-- Table structure for tb_channel
-- ----------------------------
DROP TABLE IF EXISTS `tb_channel`;
CREATE TABLE `tb_channel` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL COMMENT '频道名字',
  `url` varchar(100) DEFAULT NULL COMMENT '频道对应的方法',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_channel
-- ----------------------------
INSERT INTO `tb_channel` VALUES ('1', '新闻中心', 'New/news');
INSERT INTO `tb_channel` VALUES ('2', 'WEB前端', 'Web/web');
INSERT INTO `tb_channel` VALUES ('3', 'PHP学习', 'Php/php');
INSERT INTO `tb_channel` VALUES ('4', '留言板', null);
INSERT INTO `tb_channel` VALUES ('5', '图片区', 'Photo/photo');

-- ----------------------------
-- Table structure for tb_config
-- ----------------------------
DROP TABLE IF EXISTS `tb_config`;
CREATE TABLE `tb_config` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL COMMENT '网站名称',
  `beian` varchar(100) DEFAULT NULL COMMENT '备案信息',
  `keyword` varchar(100) DEFAULT NULL COMMENT '关键字',
  `description` varchar(300) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_config
-- ----------------------------
INSERT INTO `tb_config` VALUES ('1', '南广轩主的小站', '渝ICP备17011601号', '南广轩主，个人博客，网页开发，WEB前端，PHP学习', '分享个人网站搭建，WEB前端，PHP开发，博客建设等文章的小站');

-- ----------------------------
-- Table structure for tb_link
-- ----------------------------
DROP TABLE IF EXISTS `tb_link`;
CREATE TABLE `tb_link` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL COMMENT '友链名字',
  `author` varchar(30) DEFAULT NULL COMMENT '作者',
  `url` varchar(100) DEFAULT NULL COMMENT '地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_link
-- ----------------------------
INSERT INTO `tb_link` VALUES ('1', 'MEZW搜索', '蒋经理', 'http://so.mezw.com');
INSERT INTO `tb_link` VALUES ('2', '友链', '#', '#');
INSERT INTO `tb_link` VALUES ('3', '友链', '#', '#');

-- ----------------------------
-- Table structure for tb_menus
-- ----------------------------
DROP TABLE IF EXISTS `tb_menus`;
CREATE TABLE `tb_menus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL COMMENT '菜单名字',
  `level` tinyint(4) DEFAULT NULL COMMENT '级别',
  `url` varchar(255) DEFAULT NULL COMMENT '地址',
  `parentid` int(11) DEFAULT NULL COMMENT '父ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_menus
-- ----------------------------
INSERT INTO `tb_menus` VALUES ('1', '文章管理', '1', '#', '-1');
INSERT INTO `tb_menus` VALUES ('2', '新闻', '2', 'admin.php/Admin/searchArticle/channelid/1', '1');
INSERT INTO `tb_menus` VALUES ('3', 'WEB', '2', 'admin.php/Admin/searchArticle/channelid/2', '1');
INSERT INTO `tb_menus` VALUES ('4', 'PHP', '2', 'admin.php/Admin/searchArticle/channelid/3', '1');
INSERT INTO `tb_menus` VALUES ('5', '留言管理', '1', '#', '-1');
INSERT INTO `tb_menus` VALUES ('6', '留言', '2', 'admin.php/Admin/searchArticle/channelid/4', '5');
INSERT INTO `tb_menus` VALUES ('7', '常规管理', '1', '#', '-1');
INSERT INTO `tb_menus` VALUES ('8', '网站信息', '2', 'admin.php/Set/webSet/', '7');
INSERT INTO `tb_menus` VALUES ('9', '菜单管理', '2', 'admin.php/Set/menuSet/', '7');
INSERT INTO `tb_menus` VALUES ('10', '友链管理', '2', 'admin.php/Set/linkSet/', '7');
