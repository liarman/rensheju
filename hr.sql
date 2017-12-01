/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : hr

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-10-23 08:55:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `qfant_admin_nav`
-- ----------------------------
DROP TABLE IF EXISTS `qfant_admin_nav`;
CREATE TABLE `qfant_admin_nav` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '菜单表',
  `pid` int(11) unsigned DEFAULT '0' COMMENT '所属菜单',
  `name` varchar(15) DEFAULT '' COMMENT '菜单名称',
  `mca` varchar(255) DEFAULT '' COMMENT '模块、控制器、方法',
  `ico` varchar(20) DEFAULT '' COMMENT 'font-awesome图标',
  `description` varchar(100) DEFAULT NULL,
  `order_number` int(11) unsigned DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qfant_admin_nav
-- ----------------------------
INSERT INTO `qfant_admin_nav` VALUES ('1', '0', '系统设置', 'Admin/ShowNav/config', 'icon-gears', null, '5');
INSERT INTO `qfant_admin_nav` VALUES ('2', '1', '菜单管理', 'Admin/Nav/index', 'icon-gears', null, null);
INSERT INTO `qfant_admin_nav` VALUES ('7', '4', '权限管理', 'Admin/Rule/index', 'icon-gears', null, '1');
INSERT INTO `qfant_admin_nav` VALUES ('4', '0', '权限控制', 'Admin/ShowNav/rule', 'icon-gears', null, '4');
INSERT INTO `qfant_admin_nav` VALUES ('8', '4', '用户组管理', 'Admin/Rule/group', 'icon-gears', null, '2');
INSERT INTO `qfant_admin_nav` VALUES ('9', '4', '管理员列表', 'Admin/Rule/admin_user_list', 'icon-gears', null, '3');
INSERT INTO `qfant_admin_nav` VALUES ('89', '87', '党支部管理', 'Admin/Village/index', 'icon-gears', null, null);
INSERT INTO `qfant_admin_nav` VALUES ('44', '1', '轮播图', 'Admin/Link/index', 'icon-gears', null, null);
INSERT INTO `qfant_admin_nav` VALUES ('74', '1', '全局配置', 'Admin/Config/index', 'icon-gears', null, null);
INSERT INTO `qfant_admin_nav` VALUES ('87', '0', '党建管理', 'Admin/ShowNav/town', 'icon-gears', '', null);
INSERT INTO `qfant_admin_nav` VALUES ('88', '87', '乡镇管理', 'Admin/Town/index', 'icon-gears', null, null);
INSERT INTO `qfant_admin_nav` VALUES ('90', '0', '信息管理', 'Admin/ShowNav/news', 'icon-gears', null, null);
INSERT INTO `qfant_admin_nav` VALUES ('91', '90', '类目管理', 'Admin/News/cats', 'icon-gears', null, null);
INSERT INTO `qfant_admin_nav` VALUES ('92', '90', '新闻管理', 'Admin/News/index', 'icon-gears', null, null);
INSERT INTO `qfant_admin_nav` VALUES ('93', '90', '会议室管理', 'Admin/Meet/index', 'icon-gears', null, null);
INSERT INTO `qfant_admin_nav` VALUES ('94', '90', '会议室账号管理', 'Admin/Meet/account', 'icon-gears', null, null);
INSERT INTO `qfant_admin_nav` VALUES ('95', '87', '设备管理', 'Admin/Equipment/index', 'icon-gears', null, null);
INSERT INTO `qfant_admin_nav` VALUES ('96', '0', '微信管理', 'Admin/WeiXin/nav', 'icon-gears', null, null);
INSERT INTO `qfant_admin_nav` VALUES ('97', '96', '自定义菜单', 'Admin/CustomNav/index', 'icon-gears', null, null);
INSERT INTO `qfant_admin_nav` VALUES ('98', '96', '微信公众平台自定义菜单', 'Admin/AppWeixin/index', 'icon-gears', null, null);

-- ----------------------------
-- Table structure for `qfant_app_weixin`
-- ----------------------------
DROP TABLE IF EXISTS `qfant_app_weixin`;
CREATE TABLE `qfant_app_weixin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appid` varchar(255) DEFAULT NULL,
  `appsecert` varchar(255) DEFAULT NULL,
  `accesstoken` varchar(255) DEFAULT NULL,
  `col` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qfant_app_weixin
-- ----------------------------
INSERT INTO `qfant_app_weixin` VALUES ('1', '1', '2', null, null);

-- ----------------------------
-- Table structure for `qfant_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `qfant_auth_group`;
CREATE TABLE `qfant_auth_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` text COMMENT '规则id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='用户组表';

-- ----------------------------
-- Records of qfant_auth_group
-- ----------------------------
INSERT INTO `qfant_auth_group` VALUES ('1', '超级管理员', '1', '21,7,8,9,10,148,149,11,12,13,14,15,16,123,158,159,19,162,163,160,161,164,20,1,2,3,4,5,64,146,147,6,96,282,287,289,290,291,292,293,294,295,296,297,318,319,320,321,335,330,331,332,333,334,336,337,338,339,340,342,343,344,345,346,347,348,349,350,351,352');
INSERT INTO `qfant_auth_group` VALUES ('2', '产品管理员', '1', '7,8,9,10,148,149,11,12,13,14,15,16,123,158,159,1,2,3,4,5,64,146,147,105,107,108,144,145,175,177,176,178');
INSERT INTO `qfant_auth_group` VALUES ('4', '操作员', '1', '6,96,282,283,284,285,286');

-- ----------------------------
-- Table structure for `qfant_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `qfant_auth_group_access`;
CREATE TABLE `qfant_auth_group_access` (
  `uid` int(11) unsigned NOT NULL COMMENT '用户id',
  `group_id` int(11) unsigned NOT NULL COMMENT '用户组id',
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户组明细表';

-- ----------------------------
-- Records of qfant_auth_group_access
-- ----------------------------
INSERT INTO `qfant_auth_group_access` VALUES ('88', '1');
INSERT INTO `qfant_auth_group_access` VALUES ('89', '1');
INSERT INTO `qfant_auth_group_access` VALUES ('90', '4');

-- ----------------------------
-- Table structure for `qfant_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `qfant_auth_rule`;
CREATE TABLE `qfant_auth_rule` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：为1正常，为0禁用',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '' COMMENT '规则表达式，为空表示存在就验证，不为空表示按照条件验证',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=353 DEFAULT CHARSET=utf8 COMMENT='规则表';

-- ----------------------------
-- Records of qfant_auth_rule
-- ----------------------------
INSERT INTO `qfant_auth_rule` VALUES ('1', '20', 'Admin/ShowNav/nav', '菜单管理', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('2', '1', 'Admin/Nav/index', '菜单列表', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('3', '1', 'Admin/Nav/add', '添加菜单', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('4', '1', 'Admin/Nav/edit', '修改菜单', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('5', '1', 'Admin/Nav/delete', '删除菜单', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('21', '0', 'Admin/ShowNav/rule', '权限控制', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('7', '21', 'Admin/Rule/index', '权限管理', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('8', '7', 'Admin/Rule/add', '添加权限', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('9', '7', 'Admin/Rule/edit', '修改权限', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('10', '7', 'Admin/Rule/delete', '删除权限', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('11', '21', 'Admin/Rule/group', '用户组管理', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('12', '11', 'Admin/Rule/add_group', '添加用户组', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('13', '11', 'Admin/Rule/edit_group', '修改用户组', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('14', '11', 'Admin/Rule/delete_group', '删除用户组', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('15', '11', 'Admin/Rule/rule_group', '分配权限', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('16', '11', 'Admin/Rule/check_user', '添加成员', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('19', '21', 'Admin/Rule/admin_user_list', '管理员列表', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('20', '0', 'Admin/ShowNav/config', '系统设置', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('6', '0', 'Admin/Index/index', '后台首页', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('64', '1', 'Admin/Nav/order', '菜单排序', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('96', '6', 'Admin/Index/welcome', '欢迎界面', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('287', '282', 'Admin/Town/index', '乡镇管理', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('294', '282', 'Admin/Village/index', '党支部管理', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('289', '287', 'Admin/Town/ajaxTownAll', 'ajax所有乡镇', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('290', '287', 'Admin/Town/ajaxTownList', 'ajax乡镇列表', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('291', '287', 'Admin/Town/addTown', '添加乡镇', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('292', '287', 'Admin/Town/editTown', '编辑乡镇', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('293', '287', 'Admin/Town/deleteTown', '删除乡镇', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('167', '165', 'Admin/Link/edit', '轮播图修改', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('123', '11', 'Admin/Rule/add_user_to_group', '设置为管理员', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('162', '19', 'Admin/Rule/edit_admin', '编辑系统用户', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('163', '19', 'Admin/Rule/add_admin', '新增系统用户', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('168', '165', 'Admin/Link/delete', '轮播图删除', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('146', '1', 'Admin/Nav/Menus', 'ajax获取菜单', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('147', '1', 'Admin/Nav/menuLevel', '一级菜单', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('148', '7', 'Admin/Rule/ajaxRules', 'ajax权限列表', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('149', '7', 'Admin/Rule/get', 'ajax查询权限', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('158', '11', 'Admin/Rule/ajaxGroup', 'ajax用户组', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('159', '11', 'Admin/Rule/ajaxAuthTree', 'ajax权限树', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('160', '19', 'Admin/Rule/ajaxUserList', 'ajax管理员列表', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('161', '19', 'Admin/Rule/ajaxGroupAll', 'ajax管理员', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('164', '19', 'Admin/Rule/delete_users', '删除管理员', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('282', '0', 'Admin/ShowNav/town', '党建管理', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('295', '294', 'Admin/Village/ajaxVillageList', 'ajax党支部列表', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('296', '294', 'Admin/Village/addVillage', '添加党支部', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('297', '294', 'Admin/Village/editVillage', '编辑党支部', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('298', '0', 'Admin/ShowNav/news', '信息发布', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('299', '298', 'Admin/News/cats', '类目管理', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('300', '298', 'Admin/News/index', '信息管理', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('301', '299', 'Admin/News/addCat', '添加类目', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('302', '299', 'Admin/News/editCat', '编辑类目', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('303', '299', 'Admin/News/deleteCat', '删除类目', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('304', '299', 'Admin/News/ajaxCatsList', 'ajax类目列表', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('305', '300', 'Admin/News/addNews', '添加新闻', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('306', '300', 'Admin/News/editNews', '编辑新闻', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('307', '300', 'Admin/News/deleteNews', '删除新闻', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('308', '300', 'Admin/News/ajaxNewsList', 'ajax新闻列表', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('309', '299', 'Admin/News/ajaxCatsAll', 'ajax所有类目', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('310', '299', 'Admin/News/getCat', '获取分类详情', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('313', '298', 'Admin/Meet/index', '会议室管理', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('314', '313', 'Admin/Meet/ajaxMeetList', 'ajax会议室列表', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('315', '313', 'Admin/Meet/addMeet', '添加', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('316', '313', 'Admin/Meet/editMeet', '编辑', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('317', '313', 'Admin/Meet/deleteMeet', '删除', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('318', '294', 'Admin/Village/ajaxOpeninfos', 'ajax党员列表', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('319', '294', 'Admin/Village/addopeninfo', '添加党员', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('320', '294', 'Admin/Village/editopeninfo', '编辑党员', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('321', '294', 'Admin/Village/deleteopeninfo', '删除党员', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('322', '298', 'Admin/Meet/account', '会议室账号管理', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('323', '322', 'Admin/Meet/ajaxAccountList', 'ajax会议室账号', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('324', '322', 'Admin/Meet/addAccount', '添加', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('325', '322', 'Admin/Meet/editAccount', '编辑', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('326', '322', 'Admin/Meet/deleteAccount', '删除', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('327', '322', 'Admin/Meet/ajaxVillageAccountList', 'ajax乡镇账号', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('328', '313', 'Admin/Meet/saveUser', '保存会议室用户', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('330', '282', 'Admin/Equipment/index', '设备管理', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('331', '330', 'Admin/Equipment/addEquipment', '添加', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('332', '330', 'Admin/Equipment/ajaxEquipmentList', 'ajax信息列表', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('333', '330', 'Admin/Equipment/editEquipment', '编辑设备', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('334', '330', 'Admin/Equipment/deleteEquipment', '删除设备', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('335', '294', 'Admin/Village/impUser', '导入', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('336', '330', 'Admin/Equipment/cameras', '设备列表', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('337', '330', 'Admin/Equipment/camera', '设备播放', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('338', '0', 'Admin/WeiXin/nav', '微信管理', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('339', '338', 'Admin/CustomNav/nav', '自定义菜单', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('340', '339', 'Admin/CustomNav/index', '自定义菜单列表', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('342', '339', 'Admin/CustomNav/add', '添加菜单', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('343', '339', 'Admin/CustomNav/edit', '修改菜单', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('344', '339', 'Admin/CustomNav/delete', '删除菜单', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('345', '339', 'Admin/CustomNav/order', '菜单排序', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('346', '339', 'Admin/CustomNav/Menus', 'ajax获取菜单', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('347', '339', 'Admin/CustomNav/menuLevel', '一级菜单', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('348', '338', 'Admin/AppWeixin/index', '微信公众平台自定义菜单', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('349', '348', 'Admin/AppWeixin/ajaxAppList', '菜单列表', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('350', '348', 'Admin/AppWeixin/addAppNav', '添加菜单', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('351', '348', 'Admin/AppWeixin/editAppNav', '修改菜单', '1', '1', '');
INSERT INTO `qfant_auth_rule` VALUES ('352', '348', 'Admin/AppWeixin/deleteAppNav', '删除菜单', '1', '1', '');

-- ----------------------------
-- Table structure for `qfant_building`
-- ----------------------------
DROP TABLE IF EXISTS `qfant_building`;
CREATE TABLE `qfant_building` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `district_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_district_id` (`district_id`),
  CONSTRAINT `qfant_building_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `qfant_district` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qfant_building
-- ----------------------------
INSERT INTO `qfant_building` VALUES ('4', '1栋', '1');
INSERT INTO `qfant_building` VALUES ('6', '2栋', '1');
INSERT INTO `qfant_building` VALUES ('7', '1栋', '2');
INSERT INTO `qfant_building` VALUES ('8', '2栋', '2');
INSERT INTO `qfant_building` VALUES ('9', '1234', '3');
INSERT INTO `qfant_building` VALUES ('10', '20栋', '3');
INSERT INTO `qfant_building` VALUES ('11', '5栋', '3');
INSERT INTO `qfant_building` VALUES ('12', '11栋', '1');
INSERT INTO `qfant_building` VALUES ('13', '15栋', '2');
INSERT INTO `qfant_building` VALUES ('14', '21栋', '2');
INSERT INTO `qfant_building` VALUES ('15', '6栋', '2');
INSERT INTO `qfant_building` VALUES ('60', '3栋', '1');
INSERT INTO `qfant_building` VALUES ('61', '1栋', '3');

-- ----------------------------
-- Table structure for `qfant_customer`
-- ----------------------------
DROP TABLE IF EXISTS `qfant_customer`;
CREATE TABLE `qfant_customer` (
  `id` int(36) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `nickname` varchar(100) DEFAULT NULL COMMENT '昵称',
  `gender` varchar(2) DEFAULT NULL COMMENT '性别',
  `headimg` varchar(200) DEFAULT NULL COMMENT '头像',
  `level` varchar(2) DEFAULT NULL COMMENT '级别',
  `balance` float unsigned zerofill DEFAULT NULL COMMENT '余额',
  `expense` float DEFAULT '0',
  `isLock` int(4) DEFAULT '0' COMMENT '是否锁定',
  `isActive` int(4) DEFAULT '0' COMMENT '是否激活',
  `phone` varchar(20) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `regtime` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `signature` varchar(200) DEFAULT NULL,
  `birthday` varchar(20) DEFAULT NULL,
  `usertype` tinyint(4) DEFAULT '1' COMMENT '1 pc  2 微信',
  `lastlogin` int(11) DEFAULT NULL,
  `lastip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=212 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qfant_customer
-- ----------------------------
INSERT INTO `qfant_customer` VALUES ('206', '擦擦擦', '', '/2017/09/16/01/06/09/206.jpg', '0', '000000000000', '0', '0', '0', '13212345678', '12', '2', null, '2017-08-17 15:59:54', '1', null, null, '1', null, null);
INSERT INTO `qfant_customer` VALUES ('207', '黑马飞马', '', '/2017/09/18/09/42/53/207.jpg', '0', '000000000000', '0', '0', '0', '15369303080', '14', '3', null, '2017-09-04 10:23:35', '1', null, null, '1', null, null);
INSERT INTO `qfant_customer` VALUES ('208', 'UPPtdV', '', '', '0', '000000000000', '0', '0', '0', '18662496353', '10', '1', null, '2017-09-04 23:12:29', '1', null, null, '1', null, null);
INSERT INTO `qfant_customer` VALUES ('209', 'etmGyp的', '', '/2017/09/14/18/19/26/209.jpg', '0', '000000000000', '0', '0', '0', '15811508404', '13', '2', null, '2017-09-07 23:06:29', '1', null, null, '1', null, null);
INSERT INTO `qfant_customer` VALUES ('210', 'AeAiUr', '', '', '0', '000000000000', '0', '0', '0', '13093371193', '15', '4', null, '2017-09-13 15:17:05', '1', null, null, '1', null, null);
INSERT INTO `qfant_customer` VALUES ('211', 'qexQGi', '', '', '0', '000000000000', '0', '0', '0', '15151699853', '19', '1', null, '2017-09-16 23:45:21', '1', null, null, '1', null, null);

-- ----------------------------
-- Table structure for `qfant_custom_nav`
-- ----------------------------
DROP TABLE IF EXISTS `qfant_custom_nav`;
CREATE TABLE `qfant_custom_nav` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '菜单表',
  `pid` int(11) unsigned DEFAULT '0' COMMENT '所属菜单',
  `name` varchar(15) DEFAULT '' COMMENT '菜单名称',
  `mca` varchar(255) DEFAULT '' COMMENT '模块、控制器、方法',
  `ico` varchar(20) DEFAULT '' COMMENT 'font-awesome图标',
  `description` varchar(100) DEFAULT NULL,
  `order_number` int(11) unsigned DEFAULT NULL COMMENT '排序',
  `kind` varchar(11) DEFAULT NULL COMMENT '菜单类型',
  `kindcontent` varchar(255) DEFAULT NULL COMMENT '菜单值',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `upload` varchar(255) DEFAULT NULL COMMENT '上传图片',
  `linkurl` varchar(255) DEFAULT NULL COMMENT '链接地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qfant_custom_nav
-- ----------------------------
INSERT INTO `qfant_custom_nav` VALUES ('1', '0', '系统设置', 'Admin/ShowNav/config', 'icon-gears', null, '5', '1', null, null, null, null);
INSERT INTO `qfant_custom_nav` VALUES ('2', '1', '菜单管理', 'Admin/Nav/index', 'icon-gears', null, null, '2', null, null, null, null);
INSERT INTO `qfant_custom_nav` VALUES ('7', '4', '权限管理', 'Admin/Rule/index', 'icon-gears', null, '1', '3', null, null, null, null);
INSERT INTO `qfant_custom_nav` VALUES ('4', '0', '权限控制', 'Admin/ShowNav/rule', 'icon-gears', null, '4', null, null, null, null, null);
INSERT INTO `qfant_custom_nav` VALUES ('8', '4', '用户组管理', 'Admin/Rule/group', 'icon-gears', null, '2', null, null, null, null, null);
INSERT INTO `qfant_custom_nav` VALUES ('9', '4', '管理员列表', 'Admin/Rule/admin_user_list', 'icon-gears', null, '3', null, null, null, null, null);
INSERT INTO `qfant_custom_nav` VALUES ('44', '1', '轮播图', 'Admin/Link/index', 'icon-gears', null, null, null, null, null, null, null);
INSERT INTO `qfant_custom_nav` VALUES ('74', '1', '全局配置', 'Admin/Config/index', 'icon-gears', null, null, null, null, null, null, null);
INSERT INTO `qfant_custom_nav` VALUES ('87', '0', '党建管理', 'Admin/ShowNav/town', 'icon-gears', '', null, null, null, null, null, null);
INSERT INTO `qfant_custom_nav` VALUES ('88', '87', '乡镇管理', 'Admin/Town/index', 'icon-gears', null, null, null, null, null, null, null);
INSERT INTO `qfant_custom_nav` VALUES ('90', '0', '信息管理', 'Admin/ShowNav/news', 'icon-gears', null, null, null, null, null, null, null);
INSERT INTO `qfant_custom_nav` VALUES ('91', '90', '类目管理', 'Admin/News/cats', 'icon-gears', null, null, null, null, null, null, null);
INSERT INTO `qfant_custom_nav` VALUES ('92', '90', '新闻管理', 'Admin/News/index', 'icon-gears', null, null, null, null, null, null, null);
INSERT INTO `qfant_custom_nav` VALUES ('93', '90', '会议室管理', 'Admin/Meet/index', 'icon-gears', null, null, null, null, null, null, null);
INSERT INTO `qfant_custom_nav` VALUES ('94', '90', '会议室账号管理', 'Admin/Meet/account', 'icon-gears', null, null, null, null, null, null, null);
INSERT INTO `qfant_custom_nav` VALUES ('95', '87', '设备管理', 'Admin/Equipment/index', 'icon-gears', null, null, null, null, null, null, null);
INSERT INTO `qfant_custom_nav` VALUES ('96', '0', '微信管理', 'Admin/WeiXin/nav', 'icon-gears', null, null, null, null, null, null, null);
INSERT INTO `qfant_custom_nav` VALUES ('97', '96', '自定义菜单', 'Admin/CustomNav/index', 'icon-gears', null, null, null, null, null, null, null);
INSERT INTO `qfant_custom_nav` VALUES ('98', '96', '测试', '', '', '11', '50', '3', '', '11', null, '111');
INSERT INTO `qfant_custom_nav` VALUES ('99', '96', '测试你好', '', '', '1111543252345', '1', '3', '', '11652', null, '1122132141');
INSERT INTO `qfant_custom_nav` VALUES ('100', '96', '11自定义图文', '', '', '1111', '11', '1', '111', '111', null, '11111');
INSERT INTO `qfant_custom_nav` VALUES ('101', '1', '1', '', '', '1', '11', '3', '', '1', null, '1');

-- ----------------------------
-- Table structure for `qfant_district`
-- ----------------------------
DROP TABLE IF EXISTS `qfant_district`;
CREATE TABLE `qfant_district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qfant_district
-- ----------------------------
INSERT INTO `qfant_district` VALUES ('1', '紫金花园');
INSERT INTO `qfant_district` VALUES ('2', '世纪城');
INSERT INTO `qfant_district` VALUES ('3', '南湖春城');

-- ----------------------------
-- Table structure for `qfant_equipment`
-- ----------------------------
DROP TABLE IF EXISTS `qfant_equipment`;
CREATE TABLE `qfant_equipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shareid` varchar(200) NOT NULL,
  `name` varchar(128) NOT NULL,
  `uk` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qfant_equipment
-- ----------------------------
INSERT INTO `qfant_equipment` VALUES ('4', 'b6698fd428aa6038035c0212af7b78de', '蒙城县展宏水产养殖专业合作社', '270539');
INSERT INTO `qfant_equipment` VALUES ('5', '3158ca34e6188507899f71a095fc6fcf', '蒙城县丙雨家庭农场', '270539');
INSERT INTO `qfant_equipment` VALUES ('6', 'b68e7caac5abe3b07a8b148d7901c9da', '谯城区实翔服饰有限公司', '270539');
INSERT INTO `qfant_equipment` VALUES ('7', '2e7b7898778b6c4dbbd8b1995ee4032e', '亳州市富民工艺品有限公司', '270539');
INSERT INTO `qfant_equipment` VALUES ('8', 'f956235661cec12d1ce14b9a543080dd', '蒙城县李哲家庭农场', '270539');
INSERT INTO `qfant_equipment` VALUES ('9', 'cbb88b492349069a65be04394281985d', '涡阳县华彤服饰有限公司', '270539');
INSERT INTO `qfant_equipment` VALUES ('10', '892d09614c1ccdbb5cb4061f4ae21df7', '涡阳县辉山美君纱布工厂', '270539');
INSERT INTO `qfant_equipment` VALUES ('11', '0c457aafa396505cc9d2bea6145d24f7', '利辛县雅豪包装袋有限公司', '270539');
INSERT INTO `qfant_equipment` VALUES ('12', 'fad6cee9ac5439d2a99a955d1716af6c', '涡阳县秀琴养殖合作社', '270539');
INSERT INTO `qfant_equipment` VALUES ('13', 'bec4cf2d9eabfd1dbede46903917d96b', '利辛县美特好超市', '270539');
INSERT INTO `qfant_equipment` VALUES ('14', '6beb22e38a8bd7e56fe2b261dcc91306', '利辛县春禾粘胶制品有限公司', '270539');
INSERT INTO `qfant_equipment` VALUES ('15', '6a6263351e17d172eecaa2b22146a8cf', '涡阳县庆发面粉有限公司', '270539');
INSERT INTO `qfant_equipment` VALUES ('16', '01dc748b6371571fc6fde4a683ef760a', '利辛县祥祥塑料制品厂', '270539');
INSERT INTO `qfant_equipment` VALUES ('17', '4669cf03c1e1293d565320f613f43d64', '蒙城县双龙种植专业合作社', '270539');
INSERT INTO `qfant_equipment` VALUES ('18', '02bd5a7962c46e2b86dc3aabc2409c16', '利辛县踏乡鞋业有限公司', '270539');
INSERT INTO `qfant_equipment` VALUES ('19', 'aadee7f62a4b6e7bca1ab34f89cd9744', '蒙城县悠粮生态农业投资有限公司', '270539');
INSERT INTO `qfant_equipment` VALUES ('20', '3e1a524af1cec082a1615c1efc1bf26b', '大杨镇华扬服饰有限公司', '270539');
INSERT INTO `qfant_equipment` VALUES ('21', '6aa00b1ca87d8d28706dc92022ecea64', '古城镇讯安电子有限公司', '270539');
INSERT INTO `qfant_equipment` VALUES ('22', '3f20fca6e72e5caef26e65b9e6648a7d', '利辛县林创阁箱包制品有限公司', '270539');
INSERT INTO `qfant_equipment` VALUES ('23', 'fa182dae82dd8ced3aae0bf4438aa265', '古城镇万瑞箱包有限公司', '270539');
INSERT INTO `qfant_equipment` VALUES ('24', '02d38f033799a3cd1e3ebf23c014424b', '我的摄像机', '270539');
INSERT INTO `qfant_equipment` VALUES ('25', '6dd174a675550b9fc8218549fa806ce6', '利辛县维林新型建材科技有限公司', '270539');

-- ----------------------------
-- Table structure for `qfant_fav`
-- ----------------------------
DROP TABLE IF EXISTS `qfant_fav`;
CREATE TABLE `qfant_fav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `favtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qfant_fav
-- ----------------------------
INSERT INTO `qfant_fav` VALUES ('1', '12', '207', '2017-09-12 23:12:08');
INSERT INTO `qfant_fav` VALUES ('4', '9', '208', '2017-09-13 01:01:26');
INSERT INTO `qfant_fav` VALUES ('5', '19', '208', '2017-09-13 01:01:29');
INSERT INTO `qfant_fav` VALUES ('9', '9', '207', '2017-09-13 14:58:31');
INSERT INTO `qfant_fav` VALUES ('10', '9', '207', '2017-09-13 14:58:33');
INSERT INTO `qfant_fav` VALUES ('11', '18', '210', '2017-09-13 15:22:58');
INSERT INTO `qfant_fav` VALUES ('12', '4', '208', '2017-09-13 23:28:22');
INSERT INTO `qfant_fav` VALUES ('13', '5', '208', '2017-09-13 23:28:26');
INSERT INTO `qfant_fav` VALUES ('14', '5', '207', '2017-09-14 18:10:13');
INSERT INTO `qfant_fav` VALUES ('15', '18', '207', '2017-09-14 22:31:54');
INSERT INTO `qfant_fav` VALUES ('16', '18', '207', '2017-09-14 22:34:48');
INSERT INTO `qfant_fav` VALUES ('19', '8', '206', '2017-09-16 00:32:58');
INSERT INTO `qfant_fav` VALUES ('20', '1', '206', '2017-09-16 00:39:36');
INSERT INTO `qfant_fav` VALUES ('21', '2', '209', '2017-09-16 23:48:47');
INSERT INTO `qfant_fav` VALUES ('22', '8', '209', '2017-09-17 18:58:01');

-- ----------------------------
-- Table structure for `qfant_login_admin`
-- ----------------------------
DROP TABLE IF EXISTS `qfant_login_admin`;
CREATE TABLE `qfant_login_admin` (
  `id` int(36) NOT NULL AUTO_INCREMENT COMMENT 'UUID 32 位',
  `userid` int(36) DEFAULT NULL COMMENT '客户id',
  `loginTime` datetime DEFAULT NULL COMMENT '登录时间',
  `loginip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=753 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qfant_login_admin
-- ----------------------------
INSERT INTO `qfant_login_admin` VALUES ('448', '88', '2017-09-08 17:16:15', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('449', '88', '2017-09-08 17:16:46', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('450', '88', '2017-09-08 17:54:03', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('451', '88', '2017-09-09 12:23:25', '36.4.177.58');
INSERT INTO `qfant_login_admin` VALUES ('452', '88', '2017-09-09 12:38:45', '36.4.177.58');
INSERT INTO `qfant_login_admin` VALUES ('453', '88', '2017-09-09 12:45:51', '36.4.177.58');
INSERT INTO `qfant_login_admin` VALUES ('454', '88', '2017-09-12 15:52:37', '61.48.40.230');
INSERT INTO `qfant_login_admin` VALUES ('455', '88', '2017-09-12 15:55:09', '123.150.103.178');
INSERT INTO `qfant_login_admin` VALUES ('456', '88', '2017-09-12 16:56:34', '123.150.103.178');
INSERT INTO `qfant_login_admin` VALUES ('457', '88', '2017-09-12 18:23:58', '117.70.226.122');
INSERT INTO `qfant_login_admin` VALUES ('458', '88', '2017-09-12 18:44:33', '117.70.226.122');
INSERT INTO `qfant_login_admin` VALUES ('459', '88', '2017-09-12 18:56:28', '117.70.226.122');
INSERT INTO `qfant_login_admin` VALUES ('460', '88', '2017-09-12 19:11:54', '117.70.226.122');
INSERT INTO `qfant_login_admin` VALUES ('461', '88', '2017-09-12 19:27:37', '117.70.226.122');
INSERT INTO `qfant_login_admin` VALUES ('462', '88', '2017-09-13 09:12:31', '117.70.224.54');
INSERT INTO `qfant_login_admin` VALUES ('463', '88', '2017-09-13 10:16:57', '117.70.224.54');
INSERT INTO `qfant_login_admin` VALUES ('464', '88', '2017-09-13 10:47:14', '117.70.224.54');
INSERT INTO `qfant_login_admin` VALUES ('465', '88', '2017-09-13 11:18:59', '117.70.224.54');
INSERT INTO `qfant_login_admin` VALUES ('466', '88', '2017-09-13 11:48:46', '117.70.224.54');
INSERT INTO `qfant_login_admin` VALUES ('467', '88', '2017-09-13 15:13:21', '117.70.224.54');
INSERT INTO `qfant_login_admin` VALUES ('468', '88', '2017-09-13 15:29:14', '117.70.224.54');
INSERT INTO `qfant_login_admin` VALUES ('469', '88', '2017-09-13 16:02:16', '117.70.224.54');
INSERT INTO `qfant_login_admin` VALUES ('470', '88', '2017-09-13 16:41:52', '117.70.224.54');
INSERT INTO `qfant_login_admin` VALUES ('471', '88', '2017-09-15 23:50:10', '36.4.177.14');
INSERT INTO `qfant_login_admin` VALUES ('472', '88', '2017-09-16 22:32:02', '36.4.179.98');
INSERT INTO `qfant_login_admin` VALUES ('473', '88', '2017-09-16 23:17:16', '36.4.179.98');
INSERT INTO `qfant_login_admin` VALUES ('474', '88', '2017-09-16 23:39:34', '122.192.15.168');
INSERT INTO `qfant_login_admin` VALUES ('475', '88', '2017-09-17 21:06:27', '36.4.179.98');
INSERT INTO `qfant_login_admin` VALUES ('476', '88', '2017-09-18 10:09:48', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('477', '88', '2017-09-18 10:10:33', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('478', '88', '2017-09-18 10:40:03', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('479', '88', '2017-09-18 10:45:17', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('480', '88', '2017-09-18 11:10:21', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('481', '88', '2017-09-18 11:30:05', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('482', '88', '2017-09-18 11:40:29', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('483', '88', '2017-09-18 12:02:14', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('484', '88', '2017-09-18 14:40:48', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('485', '88', '2017-09-18 15:13:30', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('486', '88', '2017-09-19 09:30:54', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('487', '88', '2017-09-19 09:33:19', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('488', '88', '2017-09-19 10:27:02', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('489', '88', '2017-09-19 14:33:10', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('490', '88', '2017-09-19 17:08:11', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('491', '88', '2017-09-19 17:46:48', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('492', '88', '2017-09-19 17:55:23', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('493', '88', '2017-09-20 09:04:24', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('494', '88', '2017-09-20 09:25:18', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('495', '88', '2017-09-20 09:56:11', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('496', '88', '2017-09-20 09:55:05', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('497', '88', '2017-09-20 10:33:41', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('498', '88', '2017-09-20 10:34:35', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('499', '88', '2017-09-20 11:05:06', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('500', '88', '2017-09-20 11:31:34', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('501', '88', '2017-09-20 11:35:56', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('502', '88', '2017-09-20 11:37:11', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('503', '88', '2017-09-20 11:37:34', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('504', '88', '2017-09-20 12:06:18', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('505', '88', '2017-09-20 14:56:24', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('506', '88', '2017-09-20 17:01:44', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('507', '88', '2017-09-20 17:08:22', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('508', '88', '2017-09-21 08:54:33', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('509', '88', '2017-09-21 08:54:53', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('510', '88', '2017-09-21 09:14:53', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('511', '88', '2017-09-21 09:21:55', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('512', '88', '2017-09-21 09:28:53', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('513', '88', '2017-09-21 10:00:00', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('514', '88', '2017-09-21 10:31:30', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('515', '88', '2017-09-21 10:47:49', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('516', '88', '2017-09-21 11:08:11', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('517', '88', '2017-09-21 14:33:25', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('518', '88', '2017-09-21 15:30:55', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('519', '88', '2017-09-22 15:17:57', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('520', '88', '2017-09-22 16:15:39', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('521', '88', '2017-09-25 08:55:05', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('522', '88', '2017-09-25 09:23:52', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('523', '88', '2017-09-25 15:49:25', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('524', '88', '2017-09-25 16:25:07', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('525', '88', '2017-09-25 17:33:11', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('526', '88', '2017-09-27 15:56:58', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('527', '88', '2017-09-29 11:37:02', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('528', '88', '2017-09-30 11:07:34', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('529', '88', '2017-09-30 11:20:28', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('530', '90', '2017-09-30 11:29:49', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('531', '88', '2017-09-30 11:30:06', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('532', '90', '2017-09-30 11:31:12', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('533', '88', '2017-09-30 11:43:55', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('534', '90', '2017-09-30 11:49:13', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('535', '88', '2017-09-30 11:49:57', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('536', '88', '2017-09-30 11:50:32', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('537', '88', '2017-09-30 11:51:34', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('538', '90', '2017-09-30 11:51:53', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('539', '88', '2017-09-30 15:46:54', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('540', '88', '2017-09-30 15:58:49', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('541', '88', '2017-09-30 16:01:13', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('542', '88', '2017-09-30 16:19:08', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('543', '88', '2017-09-30 16:34:28', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('544', '88', '2017-09-30 17:57:07', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('545', '88', '2017-09-30 17:57:58', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('546', '88', '2017-09-30 18:05:09', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('547', '88', '2017-09-30 19:58:11', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('548', '88', '2017-09-30 20:30:18', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('549', '88', '2017-09-30 22:05:20', '36.4.179.39');
INSERT INTO `qfant_login_admin` VALUES ('550', '88', '2017-09-30 22:16:58', '36.4.179.39');
INSERT INTO `qfant_login_admin` VALUES ('551', '88', '2017-10-01 14:39:03', '36.4.213.175');
INSERT INTO `qfant_login_admin` VALUES ('552', '88', '2017-10-04 19:14:14', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('553', '88', '2017-10-04 19:15:28', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('554', '88', '2017-10-04 19:59:14', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('555', '88', '2017-10-04 20:55:54', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('556', '88', '2017-10-04 20:56:20', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('557', '88', '2017-10-04 21:05:29', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('558', '88', '2017-10-04 22:31:58', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('559', '88', '2017-10-04 22:33:23', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('560', '88', '2017-10-06 10:22:40', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('561', '88', '2017-10-08 10:01:56', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('562', '88', '2017-10-08 10:25:29', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('563', '88', '2017-10-08 11:45:55', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('564', '88', '2017-10-08 12:13:04', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('565', '88', '2017-10-08 21:03:31', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('566', '88', '2017-10-08 22:37:15', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('567', '88', '2017-10-08 23:09:50', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('568', '88', '2017-10-08 23:41:38', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('569', '88', '2017-10-09 00:17:23', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('570', '88', '2017-10-09 00:18:25', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('571', '88', '2017-10-09 10:05:20', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('572', '88', '2017-10-09 10:47:58', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('573', '88', '2017-10-09 11:51:07', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('574', '88', '2017-10-09 14:23:41', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('575', '88', '2017-10-09 14:24:21', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('576', '88', '2017-10-09 14:35:07', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('577', '88', '2017-10-09 14:55:24', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('578', '88', '2017-10-09 15:11:16', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('579', '88', '2017-10-09 15:49:23', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('580', '88', '2017-10-09 16:10:46', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('581', '88', '2017-10-09 16:21:58', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('582', '88', '2017-10-09 16:33:35', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('583', '88', '2017-10-09 16:52:21', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('584', '88', '2017-10-09 16:58:06', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('585', '88', '2017-10-09 16:59:18', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('586', '88', '2017-10-09 17:29:44', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('587', '88', '2017-10-09 17:36:39', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('588', '88', '2017-10-09 17:38:05', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('589', '88', '2017-10-09 17:48:51', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('590', '88', '2017-10-09 18:09:11', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('591', '88', '2017-10-09 21:12:46', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('592', '88', '2017-10-09 21:13:29', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('593', '88', '2017-10-09 21:55:38', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('594', '88', '2017-10-09 22:16:32', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('595', '88', '2017-10-09 22:35:17', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('596', '88', '2017-10-09 23:37:54', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('597', '88', '2017-10-09 23:38:36', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('598', '88', '2017-10-09 23:39:24', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('599', '88', '2017-10-10 00:02:01', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('600', '88', '2017-10-10 00:41:49', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('601', '88', '2017-10-10 01:12:33', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('602', '88', '2017-10-10 10:17:52', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('603', '88', '2017-10-10 11:35:53', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('604', '88', '2017-10-10 13:25:08', '117.70.228.205');
INSERT INTO `qfant_login_admin` VALUES ('605', '88', '2017-10-10 14:28:26', '117.70.228.205');
INSERT INTO `qfant_login_admin` VALUES ('606', '88', '2017-10-10 22:58:48', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('607', '88', '2017-10-10 23:53:57', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('608', '88', '2017-10-11 10:13:54', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('609', '88', '2017-10-11 10:26:17', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('610', '88', '2017-10-11 10:27:34', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('611', '88', '2017-10-11 10:37:34', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('612', '88', '2017-10-11 10:53:09', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('613', '88', '2017-10-11 11:03:12', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('614', '88', '2017-10-11 11:07:52', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('615', '88', '2017-10-11 11:35:11', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('616', '88', '2017-10-11 11:35:46', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('617', '88', '2017-10-11 11:38:07', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('618', '88', '2017-10-11 11:39:53', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('619', '88', '2017-10-11 11:43:03', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('620', '88', '2017-10-11 14:12:50', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('621', '88', '2017-10-11 14:16:42', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('622', '88', '2017-10-11 14:42:45', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('623', '88', '2017-10-11 15:01:18', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('624', '88', '2017-10-11 15:26:43', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('625', '88', '2017-10-11 15:34:46', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('626', '88', '2017-10-11 16:00:38', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('627', '88', '2017-10-11 16:32:31', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('628', '88', '2017-10-11 16:42:45', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('629', '88', '2017-10-11 17:08:44', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('630', '88', '2017-10-11 17:22:13', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('631', '88', '2017-10-12 08:33:54', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('632', '88', '2017-10-12 08:36:20', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('633', '88', '2017-10-12 09:03:20', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('634', '88', '2017-10-12 09:39:31', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('635', '88', '2017-10-12 09:39:50', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('636', '88', '2017-10-12 10:05:38', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('637', '88', '2017-10-12 10:15:13', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('638', '88', '2017-10-12 10:24:58', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('639', '88', '2017-10-12 10:27:15', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('640', '88', '2017-10-12 10:38:15', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('641', '88', '2017-10-12 10:45:27', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('642', '88', '2017-10-12 11:06:31', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('643', '88', '2017-10-12 11:08:58', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('644', '88', '2017-10-12 11:17:13', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('645', '88', '2017-10-12 11:19:32', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('646', '88', '2017-10-12 11:39:09', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('647', '88', '2017-10-12 11:52:10', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('648', '88', '2017-10-12 12:36:50', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('649', '88', '2017-10-12 13:32:24', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('650', '88', '2017-10-12 14:25:04', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('651', '88', '2017-10-12 14:38:16', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('652', '88', '2017-10-12 15:44:30', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('653', '88', '2017-10-12 16:04:41', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('654', '88', '2017-10-12 16:35:11', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('655', '88', '2017-10-12 17:16:18', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('656', '88', '2017-10-12 17:51:05', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('657', '88', '2017-10-12 18:00:32', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('658', '88', '2017-10-13 08:31:31', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('659', '88', '2017-10-13 08:54:06', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('660', '88', '2017-10-13 09:00:42', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('661', '88', '2017-10-13 09:08:19', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('662', '88', '2017-10-13 09:30:12', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('663', '88', '2017-10-13 09:31:01', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('664', '88', '2017-10-13 10:10:11', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('665', '88', '2017-10-13 10:19:09', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('666', '88', '2017-10-13 10:42:16', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('667', '88', '2017-10-13 10:53:33', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('668', '88', '2017-10-13 10:55:34', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('669', '88', '2017-10-13 10:55:45', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('670', '88', '2017-10-13 11:04:59', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('671', '88', '2017-10-13 11:40:22', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('672', '88', '2017-10-13 14:34:39', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('673', '88', '2017-10-13 14:55:56', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('674', '88', '2017-10-13 15:06:08', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('675', '88', '2017-10-13 15:18:13', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('676', '88', '2017-10-13 15:25:05', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('677', '88', '2017-10-13 15:27:15', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('678', '88', '2017-10-13 15:29:42', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('679', '88', '2017-10-13 16:18:24', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('680', '88', '2017-10-13 16:53:36', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('681', '88', '2017-10-13 17:31:16', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('682', '88', '2017-10-13 17:31:32', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('683', '88', '2017-10-13 17:34:15', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('684', '88', '2017-10-13 17:55:03', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('685', '88', '2017-10-13 18:02:38', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('686', '88', '2017-10-13 18:04:34', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('687', '88', '2017-10-13 18:05:25', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('688', '88', '2017-10-13 18:12:50', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('689', '88', '2017-10-16 09:30:58', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('690', '88', '2017-10-16 09:33:39', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('691', '88', '2017-10-16 09:33:52', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('692', '88', '2017-10-16 09:48:17', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('693', '88', '2017-10-16 10:39:22', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('694', '88', '2017-10-16 11:16:26', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('695', '88', '2017-10-16 15:25:49', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('696', '88', '2017-10-16 15:45:53', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('697', '88', '2017-10-16 16:33:07', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('698', '88', '2017-10-16 17:32:41', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('699', '88', '2017-10-16 17:35:46', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('700', '88', '2017-10-16 17:47:52', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('701', '88', '2017-10-17 08:34:27', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('702', '88', '2017-10-17 08:36:14', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('703', '88', '2017-10-17 08:42:13', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('704', '88', '2017-10-17 08:44:06', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('705', '88', '2017-10-17 08:49:03', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('706', '88', '2017-10-17 10:12:17', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('707', '88', '2017-10-17 17:30:53', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('708', '88', '2017-10-17 17:46:15', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('709', '88', '2017-10-18 14:23:11', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('710', '88', '2017-10-18 14:31:07', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('711', '88', '2017-10-18 16:13:24', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('712', '88', '2017-10-18 16:40:07', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('713', '88', '2017-10-18 16:55:56', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('714', '88', '2017-10-18 17:13:05', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('715', '88', '2017-10-18 17:44:28', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('716', '88', '2017-10-19 09:19:43', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('717', '88', '2017-10-19 09:20:48', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('718', '88', '2017-10-19 09:24:42', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('719', '88', '2017-10-19 09:31:55', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('720', '88', '2017-10-19 09:44:18', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('721', '88', '2017-10-19 09:44:31', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('722', '88', '2017-10-19 09:58:44', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('723', '88', '2017-10-19 10:30:02', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('724', '88', '2017-10-19 11:00:12', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('725', '88', '2017-10-19 11:20:18', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('726', '88', '2017-10-19 11:40:37', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('727', '88', '2017-10-19 11:56:06', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('728', '88', '2017-10-19 14:31:37', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('729', '88', '2017-10-19 14:35:46', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('730', '88', '2017-10-19 15:01:35', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('731', '88', '2017-10-19 15:06:26', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('732', '88', '2017-10-19 15:33:35', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('733', '88', '2017-10-19 15:36:55', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('734', '88', '2017-10-19 16:10:38', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('735', '88', '2017-10-19 16:44:55', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('736', '88', '2017-10-19 17:19:15', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('737', '88', '2017-10-19 17:25:21', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('738', '88', '2017-10-19 17:38:07', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('739', '88', '2017-10-19 17:57:41', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('740', '88', '2017-10-20 11:24:00', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('741', '88', '2017-10-20 11:25:16', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('742', '88', '2017-10-20 11:28:05', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('743', '88', '2017-10-20 14:39:03', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('744', '88', '2017-10-20 14:39:57', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('745', '88', '2017-10-20 14:45:01', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('746', '88', '2017-10-20 16:23:09', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('747', '88', '2017-10-20 16:23:36', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('748', '88', '2017-10-20 16:31:46', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('749', '88', '2017-10-20 16:38:58', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('750', '88', '2017-10-20 16:57:55', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('751', '88', '2017-10-20 17:55:03', '0.0.0.0');
INSERT INTO `qfant_login_admin` VALUES ('752', '88', '2017-10-23 08:32:37', '0.0.0.0');

-- ----------------------------
-- Table structure for `qfant_meet`
-- ----------------------------
DROP TABLE IF EXISTS `qfant_meet`;
CREATE TABLE `qfant_meet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `intro` text,
  `townid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qfant_meet
-- ----------------------------
INSERT INTO `qfant_meet` VALUES ('11', '程辉', '啊啊啊啊', '9');
INSERT INTO `qfant_meet` VALUES ('13', 'aa', 'aa', '9');
INSERT INTO `qfant_meet` VALUES ('16', 'bb', 'bb', '9');
INSERT INTO `qfant_meet` VALUES ('17', '张慧', '你好', '9');

-- ----------------------------
-- Table structure for `qfant_meet_account`
-- ----------------------------
DROP TABLE IF EXISTS `qfant_meet_account`;
CREATE TABLE `qfant_meet_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `truename` varchar(30) DEFAULT NULL,
  `intro` text,
  `townid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qfant_meet_account
-- ----------------------------
INSERT INTO `qfant_meet_account` VALUES ('13', 'chengh', 'e10adc3949ba59abbe56e057f20f883e', '123', null, '9');
INSERT INTO `qfant_meet_account` VALUES ('14', 'asdf', '202cb962ac59075b964b07152d234b70', '123', null, '11');
INSERT INTO `qfant_meet_account` VALUES ('15', '111', '698d51a19d8a121ce581499d7b701668', '111', null, '9');

-- ----------------------------
-- Table structure for `qfant_meet_content`
-- ----------------------------
DROP TABLE IF EXISTS `qfant_meet_content`;
CREATE TABLE `qfant_meet_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meet_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `content` text,
  `createtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qfant_meet_content
-- ----------------------------
INSERT INTO `qfant_meet_content` VALUES ('19', '11', '13', '测试发言', '1507652138');
INSERT INTO `qfant_meet_content` VALUES ('20', '11', '13', '啊啊啊啊', '1507652138');

-- ----------------------------
-- Table structure for `qfant_meet_user`
-- ----------------------------
DROP TABLE IF EXISTS `qfant_meet_user`;
CREATE TABLE `qfant_meet_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meet_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qfant_meet_user
-- ----------------------------
INSERT INTO `qfant_meet_user` VALUES ('17', '11', '13');
INSERT INTO `qfant_meet_user` VALUES ('18', '11', '15');

-- ----------------------------
-- Table structure for `qfant_news`
-- ----------------------------
DROP TABLE IF EXISTS `qfant_news`;
CREATE TABLE `qfant_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `content` text,
  `tags` varchar(100) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  `catid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qfant_news
-- ----------------------------
INSERT INTO `qfant_news` VALUES ('8', '1234', '/Upload/image/20171004/20171004131055_14611.png', '阿萨德发的啥', null, '1507128206', '20');
INSERT INTO `qfant_news` VALUES ('9', '测试新闻', 'http://localhost/Upload/image/20171016/20171016093411_78642.jpg', '&lt;p&gt;\r\n	156841你好&amp;nbsp;&amp;nbsp; 而案发\r\n&lt;/p&gt;', null, '1508117701', '50');

-- ----------------------------
-- Table structure for `qfant_newscat`
-- ----------------------------
DROP TABLE IF EXISTS `qfant_newscat`;
CREATE TABLE `qfant_newscat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  `pid` int(11) DEFAULT '0',
  `islink` tinyint(4) DEFAULT '0',
  `linkurl` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qfant_newscat
-- ----------------------------
INSERT INTO `qfant_newscat` VALUES ('20', '组织生活', '1', '70', '0', '');
INSERT INTO `qfant_newscat` VALUES ('22', '郭万村党总支', '12', '20', '0', '');
INSERT INTO `qfant_newscat` VALUES ('23', '工作动态', '1', '70', '0', null);
INSERT INTO `qfant_newscat` VALUES ('24', '动态', '1', '23', '0', null);
INSERT INTO `qfant_newscat` VALUES ('26', '标准化建设', '1', '70', '0', '');
INSERT INTO `qfant_newscat` VALUES ('27', '新闻1', '1', '23', '0', '');
INSERT INTO `qfant_newscat` VALUES ('28', '郭万党支部', '1', '20', '0', '');
INSERT INTO `qfant_newscat` VALUES ('29', '郭万新村党支部', '1', '20', '0', '');
INSERT INTO `qfant_newscat` VALUES ('30', '班子分工', '1', '22', '0', '');
INSERT INTO `qfant_newscat` VALUES ('31', '会议室', '1', '22', '0', '');
INSERT INTO `qfant_newscat` VALUES ('32', '民主生活会', '1', '22', '0', '');
INSERT INTO `qfant_newscat` VALUES ('33', '新闻1', '1', '26', '0', '');
INSERT INTO `qfant_newscat` VALUES ('34', '新闻2', '2', '26', '0', '');
INSERT INTO `qfant_newscat` VALUES ('35', '新闻3', '0', '26', '0', '');
INSERT INTO `qfant_newscat` VALUES ('37', '党小组会', '2', '31', '0', '');
INSERT INTO `qfant_newscat` VALUES ('39', '党课', '3', '31', '0', '');
INSERT INTO `qfant_newscat` VALUES ('41', '组织生活会', '1', '31', '0', '');
INSERT INTO `qfant_newscat` VALUES ('42', '班子分工', '1', '36', '0', '');
INSERT INTO `qfant_newscat` VALUES ('43', '会议室', '2', '36', '0', '');
INSERT INTO `qfant_newscat` VALUES ('44', '会议室', '2', '36', '0', '');
INSERT INTO `qfant_newscat` VALUES ('45', '支委会', '1', '31', '0', '');
INSERT INTO `qfant_newscat` VALUES ('46', '班子分工', '1', '45', '0', '');
INSERT INTO `qfant_newscat` VALUES ('47', '会议室', '2', '45', '0', '');
INSERT INTO `qfant_newscat` VALUES ('49', '第一党小组', '1', '37', '0', '');
INSERT INTO `qfant_newscat` VALUES ('50', '第二党小组', '1', '37', '0', '');
INSERT INTO `qfant_newscat` VALUES ('51', '党员名单', '1', '38', '0', '');
INSERT INTO `qfant_newscat` VALUES ('53', '会议室', '1', '38', '0', '');
INSERT INTO `qfant_newscat` VALUES ('54', '会议室', '1', '38', '0', '');
INSERT INTO `qfant_newscat` VALUES ('55', '党员大会', '1', '31', '0', '');
INSERT INTO `qfant_newscat` VALUES ('56', '党员名单', '1', '55', '0', '');
INSERT INTO `qfant_newscat` VALUES ('57', '会议室', '1', '55', '0', '');
INSERT INTO `qfant_newscat` VALUES ('58', '历史党课资料', '1', '39', '0', '');
INSERT INTO `qfant_newscat` VALUES ('59', '会议室', '1', '39', '0', '');
INSERT INTO `qfant_newscat` VALUES ('61', '党员自评登记表', '1', '40', '0', '');
INSERT INTO `qfant_newscat` VALUES ('62', '党员互评登记表', '2', '40', '0', '');
INSERT INTO `qfant_newscat` VALUES ('64', '党员评议结果', '3', '40', '0', '');
INSERT INTO `qfant_newscat` VALUES ('65', '党员评议结果', '3', '40', '0', '');
INSERT INTO `qfant_newscat` VALUES ('66', '民主评议党员', '0', '31', '0', '');
INSERT INTO `qfant_newscat` VALUES ('67', '党员自评登记表', '1', '66', '0', '');
INSERT INTO `qfant_newscat` VALUES ('68', '党员评议结果', '2', '66', '0', '');
INSERT INTO `qfant_newscat` VALUES ('69', '党员互评测试表', '3', '66', '0', '');
INSERT INTO `qfant_newscat` VALUES ('70', '大杨镇', '1', '0', '0', '');
INSERT INTO `qfant_newscat` VALUES ('71', '汤陵街道办事处', '0', '0', '0', '');
INSERT INTO `qfant_newscat` VALUES ('72', '组织生活', '0', '71', '0', '');
INSERT INTO `qfant_newscat` VALUES ('73', '工作动态', '0', '71', '0', '');
INSERT INTO `qfant_newscat` VALUES ('74', '标准化建设', '0', '71', '0', '');
INSERT INTO `qfant_newscat` VALUES ('75', '汤陵社区', '0', '72', '0', '');

-- ----------------------------
-- Table structure for `qfant_openinfo`
-- ----------------------------
DROP TABLE IF EXISTS `qfant_openinfo`;
CREATE TABLE `qfant_openinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `peiyan` varchar(100) DEFAULT NULL,
  `jieshao` varchar(100) DEFAULT NULL,
  `current` varchar(100) DEFAULT NULL,
  `intro` text,
  `villageid` int(11) DEFAULT NULL,
  `idcard` varchar(22) DEFAULT NULL COMMENT '身份证号码',
  `sex` varchar(10) DEFAULT NULL COMMENT '性别',
  `nation` varchar(100) DEFAULT NULL COMMENT '民族',
  `birthday` datetime DEFAULT NULL COMMENT '出生日期',
  `educational` varchar(100) DEFAULT NULL COMMENT '学历',
  `personalkind` varchar(100) DEFAULT NULL COMMENT '人员类别',
  `partybranch` varchar(100) DEFAULT NULL COMMENT '所在党支部',
  `jointime` datetime DEFAULT NULL COMMENT '加入党组织日期',
  `turntime` datetime DEFAULT NULL COMMENT '转为正式党员日期',
  `position` varchar(100) DEFAULT NULL COMMENT '工作岗位',
  `address` varchar(100) DEFAULT NULL COMMENT '家庭住址',
  `phone` varchar(50) DEFAULT NULL COMMENT '联系电话',
  `tel` varchar(50) DEFAULT NULL COMMENT '固定电话',
  `outwardflow` varchar(100) DEFAULT NULL COMMENT '外出流向',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qfant_openinfo
-- ----------------------------
INSERT INTO `qfant_openinfo` VALUES ('29', '冀松', null, null, null, null, '24', '341281199105124237', '男', '汉族', '1991-05-12 00:00:00', '中等专科', null, '正式党员', '0000-00-00 00:00:00', '2013-06-01 00:00:00', null, '2014-06-01', '自由职业人员', '安徽省亳州市谯城区大杨镇郭万行政村冀庄25号', null);
INSERT INTO `qfant_openinfo` VALUES ('54', '徐跃海', null, null, null, null, '24', '341281196205254254', '男', '汉族', '1962-05-25 00:00:00', '普通高中', null, '正式党员', '0000-00-00 00:00:00', '1983-10-15 00:00:00', null, '1984-10-15', '外出务工经商人员', '安徽省亳州市谯城区大杨镇郭万行政村万庄23', null);
INSERT INTO `qfant_openinfo` VALUES ('55', '黄忠', null, null, null, null, '24', '341281196402144230', '男', '汉族', '1964-02-14 00:00:00', '中等专科', null, '正式党员', '0000-00-00 00:00:00', '1991-03-15 00:00:00', null, '1992-03-15', '外出务工经商人员', '安徽省亳州市谯城区大杨镇郭万行政村黄桥2号', null);
INSERT INTO `qfant_openinfo` VALUES ('56', '李康', null, null, null, null, '24', '341281199004064319', '男', '汉族', '1990-04-06 00:00:00', '普通高中', null, '正式党员', '0000-00-00 00:00:00', '2010-11-07 00:00:00', null, '2011-11-07', '外出务工经商人员', '安徽省亳州市谯城区大杨镇郭万行政村郭庄16', null);
INSERT INTO `qfant_openinfo` VALUES ('57', '黄茹', null, null, null, null, '24', '341281199303074226', '女', '汉族', '1993-03-07 00:00:00', '大专', null, '正式党员', '0000-00-00 00:00:00', '2014-12-10 00:00:00', null, '2015-12-10', '自由职业人员', '安徽省亳州市谯城区大杨镇郭万行政村黄桥38号', null);
INSERT INTO `qfant_openinfo` VALUES ('58', '黄中伟', null, null, null, null, '24', '341281197607034216', '男', '汉族', '1976-07-03 00:00:00', '普通高中', null, '正式党员', '0000-00-00 00:00:00', '2000-07-15 00:00:00', null, '2001-07-15', '自由职业人员', '安徽省亳州市谯城区大杨镇郭万行政村黄桥23号', null);
INSERT INTO `qfant_openinfo` VALUES ('59', '李冬青', null, null, null, null, '24', '341281198201014279', '男', '汉族', '1982-01-01 00:00:00', '初中', null, '正式党员', '0000-00-00 00:00:00', '2007-08-06 00:00:00', null, '2008-08-06', '外出务工经商人员', '安徽省亳州市谯城区大杨镇郭万行政村郭庄54', null);
INSERT INTO `qfant_openinfo` VALUES ('60', '陈运发', null, null, null, null, '24', '341281195008084319', '男', '汉族', '1950-08-08 00:00:00', '小学', null, '正式党员', '0000-00-00 00:00:00', '1979-07-13 00:00:00', null, '1980-07-13', '外出务工经商人员', '安徽省亳州市谯城区大杨镇郭万行政村陈庄3号', null);
INSERT INTO `qfant_openinfo` VALUES ('61', '邢双燕', null, null, null, null, '24', '341281199402054220', '女', '汉族', '1994-02-05 00:00:00', '大学', null, '正式党员', '0000-00-00 00:00:00', '2015-05-06 00:00:00', null, '2016-05-06', '其他从业人员', '安徽省亳州市谯城区大杨镇郭万村黄桥36号', null);
INSERT INTO `qfant_openinfo` VALUES ('65', '张慧', null, null, null, null, '28', '341621199204232925', '', '', '1899-11-30 00:00:00', '', '', '', '1899-11-30 00:00:00', '1899-11-30 00:00:00', '', '', '18756035', '0558-55225', '');
INSERT INTO `qfant_openinfo` VALUES ('66', '1', null, null, null, null, '7', '', '', '', '0000-00-00 00:00:00', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '');
INSERT INTO `qfant_openinfo` VALUES ('67', '2', null, null, null, null, '7', '', '', '', '0000-00-00 00:00:00', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '');

-- ----------------------------
-- Table structure for `qfant_town`
-- ----------------------------
DROP TABLE IF EXISTS `qfant_town`;
CREATE TABLE `qfant_town` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `ditrictid` int(11) DEFAULT NULL,
  `baseinfo` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qfant_town
-- ----------------------------
INSERT INTO `qfant_town` VALUES ('9', '谯东镇', '33.854283', '115.882554', null, '&lt;p&gt;\r\n	&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n		谯城区谯东镇简介\r\n	&lt;/div&gt;\r\n	&lt;div class=&quot;tit_news&quot; style=&quot;text-align:center;&quot;&gt;\r\n		发布日期：2016-12-30&amp;nbsp;&amp;nbsp;字体：&lt;a&gt;大&lt;/a&gt;&amp;nbsp;&lt;a&gt;中&lt;/a&gt;&amp;nbsp;&lt;a&gt;小&lt;/a&gt;\r\n	&lt;/div&gt;\r\n	&lt;div id=&quot;BodyLabel&quot;&gt;\r\n		&lt;p&gt;\r\n			&amp;nbsp; \r\n安徽省亳州市谯城区谯东镇，位于亳州市谯城区东郊，距市区6公里，南接307省道和市开发区，北邻311国道，与五马镇接壤，东衔沙土、观堂两镇，西靠涡河，同市区一河之隔。济广高速公路（商阜段）纵贯镇境，境内设有辛集服务区。济广高速公路以西占镇区范围三分之一的地段，已纳入亳州市中心城区2010—2030年总体规划。泱泱涡河沿镇西、南郊绵延10余公里。亳州涡河水利枢纽大寺闸，既是亳州重要的水上交通枢纽，也是生态经济风景旅游区。\r\n		&lt;/p&gt;\r\n		&lt;p&gt;\r\n			&amp;nbsp; 谯东镇辖区面积88平方公里， \r\n7.4万亩耕地，7.3万人，辖10个村委会、177个自然村、3个集镇。全镇以中药材、蔬菜种植为主导产业。中药材种植面积达6万亩，主要品种有白芍、白术、白芷、牡丹、桔梗、亳菊、板蓝根、知母、丹参等，年亩均效益5000—20000元。安徽亳州中药材高科技有限公司建在镇中心的亳州中药材研发中心，及亳州中药材高科技示范园，是我省唯一的中药材栽培研究的科研机构，集科研、实验、示范、推广、旅游于一体，既是中药材种植示范园，也是中药材种苗培育和脱毒中心，又是全国农业生态旅游示范点和AA级旅游景点。韩国客商投资兴建的桔梗加工厂即亳州华全农副产品有限公司，成为安徽省最大的农产品出口创汇企业。谯东镇是全国整建制无公害蔬菜生产基地，蔬菜种植面积2.2万亩，四个无公害蔬菜品种“徽粹”牌黄瓜、辣椒、花菜、桔梗通过了国家农业部产品质量安全中心认证，种植人口近2万人，人均增加纯收入3200元，“铜关粉皮”先后通过了“绿色食品A级产品”和“QS”认证，并在中央电视台美食走四方栏目播放，响誉全国。\r\n		&lt;/p&gt;\r\n		&lt;p&gt;\r\n			&amp;nbsp; \r\n位于亳州市郊区的谯东镇，已建有规模工业企业18家，镇内主要企业有安徽东港集团、亳州中药材研发中心、亳州市云都投资开发有限责任公司、亳州华全农副产品有限公司、铜关粉皮厂、朝阳纸业有限公司等。落户到谯城区工业园区的规模工业企业3家，华宇药业、兴和药业、天顺药业。正在筹建的企业3家，分别是亳州市华盛道路工程有限公司和一个饮片厂、一个仓储企业。正在筹建的项目一个，大寺闸生态经济风景旅游区景点之一大寺庙，占地163亩，拆迁居民210户，总投资3亿元。\r\n		&lt;/p&gt;\r\n		&lt;p&gt;\r\n			&amp;nbsp; \r\n谯东镇是投资的热土，有志之士的发财宝地，诚邀国内外客商到这里投资发展。\r\n		&lt;/p&gt;\r\n		&lt;p&gt;\r\n			&amp;nbsp; \r\n江泽民总书记为亳州题词“华佗故里，药材之乡”，谯东镇正是药材之乡的源泉。正在实施中的亳州市“中华药都，养生亳州”的行动计划，为谯东镇的发展注入了新的活力。充满朝气具有开拓创新精神的谯东镇党政领导班子带领勤劳智慧的全镇人民，誓把谯东镇早日建成亳州市的“大药园、大菜园、大花园、养生园、生态园、旅游园、工业园”。\r\n		&lt;/p&gt;\r\n		&lt;p&gt;\r\n			&amp;nbsp;\r\n		&lt;/p&gt;\r\n	&lt;/div&gt;\r\n&lt;/p&gt;');
INSERT INTO `qfant_town` VALUES ('11', '大杨镇', '33.687383', '115.913694', null, '&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n	谯城区大杨镇简介\r\n&lt;/div&gt;\r\n&lt;div class=&quot;tit_news&quot; style=&quot;text-align:center;&quot;&gt;\r\n	发布日期：2016-12-31&amp;nbsp;&amp;nbsp;字体：&lt;a&gt;大&lt;/a&gt;&amp;nbsp;&lt;a&gt;中&lt;/a&gt;&amp;nbsp;&lt;a&gt;小&lt;/a&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;BodyLabel&quot;&gt;\r\n	&lt;p&gt;\r\n		&amp;nbsp; \r\n&amp;nbsp; \r\n大杨镇地处亳州市谯城区东南部，是全区六个中心建制镇、八个优先加快发展重点镇、两个工业功能区优先加快发展重点镇及两个美丽建设集镇之一，距市区约10公里。全镇辖14个行政村，206个自然村，国土面积126平方公里，人口7.3万，耕地12.5万亩。其中，集镇规划区13.5平方公里，建成区约4平方公里，镇区常住人口1.3万人。党组织设置72个，其中党委4个（镇党委1个、村党委2个、非公企业和社会组织联合党委1个）、党总支14个、支部54个，党员1486名。&amp;nbsp;&amp;nbsp;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:43px;font-family:&amp;quot;color:#3E3E3E;&quot;&gt;\r\n		&lt;span style=&quot;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;大杨镇土地肥沃，气候适宜，特产丰富，是传统的中药材种植交易和农副产品加工交易区。粮食作物以小麦、大豆为主，常年播种面积约15万亩；经济作物以中药材和小辣椒为主，已经形成中药材集散地和小辣椒交易市场；畜牧业目前有规模以上养殖场（户）约&lt;/span&gt;&lt;span style=&quot;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;110&lt;/span&gt;&lt;span style=&quot;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;家、畜禽存栏量约70万只（头）；工业主要以粮油食品加工、中药饮片、物流冷藏、服装加工为主，目前有工业企业30余家。其中，规模以上工业企业&lt;/span&gt;&lt;span style=&quot;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;6&lt;/span&gt;&lt;span style=&quot;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;家，省级农业产业化龙头企业4家，国家级龙头企业1家。&lt;/span&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:43px;font-family:&amp;quot;color:#3E3E3E;&quot;&gt;\r\n		&lt;span style=&quot;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;大杨镇域内水陆交通便捷，皖西北重要水系涡河、油河、赵王河、名河流经全境，农业用水充足，渔业和水产养殖业发展迅速。京九铁路、济广高速、307省道穿境而过，&lt;/span&gt;&lt;span style=&quot;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;通往商杭高铁亳州站、亳州飞机场十分便捷&lt;/span&gt;&lt;span style=&quot;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;。其中，307省道通过改建，已提升为国家一级公路，距济广高速亳州南站入口处仅8公里。随着亳州主城区的南向发展，大杨镇距城市经济中心的距离也逐渐拉近，&lt;/span&gt;&lt;span style=&quot;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;处在北上南下的中心位置，已经成为名副其实的中心枢纽，区位优势日益显著。&lt;/span&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:43px;font-family:&amp;quot;color:#3E3E3E;&quot;&gt;\r\n		&lt;span style=&quot;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;近年来，大杨镇先后获得“全国农产品加工示范基地”、 \r\n“安徽省粮油食品产业集群专业镇”、“全市文明乡镇”、“ 计划生育全市先进单位”等荣誉称号。&lt;/span&gt;&lt;span style=&quot;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;2015&lt;/span&gt;&lt;span style=&quot;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;年度，完成财政收入3700万元，农民人均可支配收入10793元。&lt;/span&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:43px;font-family:&amp;quot;color:#3E3E3E;&quot;&gt;\r\n		&lt;span style=&quot;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;大杨镇党委把2016年作为“基层组织建设提升年”，镇党委按照市委、区委的党建工作思路，紧紧围绕区委“八个坚定不移”的工作要求，按照“12345”的工作思路，即突出“一个核心”、 \r\n落实“两大工程、两个保障”、加快“三大发展”，做好“四项规划”，推进“五项创建”。发扬蚂蟥工作精神，恪守“严、细、深、实、快”工作要求，在主动适应中创新思路，在破解难题中抢抓机遇，在统筹协调中加快发展，确保大杨镇在建设“三个首善之区”的各项工作中，走前列、打头阵，作表率。&lt;/span&gt;\r\n	&lt;/p&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_town` VALUES ('12', '古井镇', '33.995854', '115.676312', null, '&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n	古井镇简介\r\n&lt;/div&gt;\r\n&lt;div class=&quot;tit_news&quot; style=&quot;text-align:center;&quot;&gt;\r\n	发布日期：2017-02-09&amp;nbsp;&amp;nbsp;字体：&lt;a&gt;大&lt;/a&gt;&amp;nbsp;&lt;a&gt;中&lt;/a&gt;&amp;nbsp;&lt;a&gt;小&lt;/a&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;BodyLabel&quot;&gt;\r\n	&lt;p style=&quot;text-indent:43px;vertical-align:baseline;&quot;&gt;\r\n		古井镇位于谯城区西北部，辖13个村，164个自然村，国土面积118平方公里，耕地9.2万亩，人口8.2万人，集镇规划区20平方公里，建成区12平方公里，镇区常住人口3.6万人。古井镇是省委组织部授予的“五个好乡镇党委标兵”，是“全国重点镇”、“全国环境优美镇”、“全国文明村镇”， \r\n是省人民政府命名的“徽酒名镇”、 \r\n“扩权强镇试点镇”、“优秀旅游乡镇”、“产业集群专业镇”。近年来，镇党委、政府紧紧围绕“做靓徽酒名镇，打造华夏酒都”的发展目标，大力发展以白酒为主导的工业经济，初步形成了酿造、彩印、饲料加工、新型劳动密集型四个主导产业。\r\n	&lt;/p&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_town` VALUES ('13', '双沟镇', '33.640389', '115.671714', null, '&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n	双沟镇简介\r\n&lt;/div&gt;\r\n&lt;div class=&quot;tit_news&quot; style=&quot;text-align:center;&quot;&gt;\r\n	发布日期：2017-02-07&amp;nbsp;&amp;nbsp;字体：&lt;a&gt;大&lt;/a&gt;&amp;nbsp;&lt;a&gt;中&lt;/a&gt;&amp;nbsp;&lt;a&gt;小&lt;/a&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;BodyLabel&quot;&gt;\r\n	&lt;p&gt;\r\n		&amp;nbsp;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-align:center;&quot;&gt;\r\n		&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;img style=&quot;width:437px;height:299px;&quot; title=&quot;大门.jpg&quot; alt=&quot;大门.jpg&quot; src=&quot;http://newwcwy.ahxf.gov.cn/UploadVillage/ueimage/20171006/6364290646710100108269559.jpg&quot; width=&quot;437&quot; height=&quot;299&quot; /&gt;\r\n	&lt;/p&gt;\r\n	&lt;p&gt;\r\n		&amp;nbsp;&amp;nbsp;&amp;nbsp; 安徽省&lt;a href=&quot;http://baike.baidu.com/view/5632.htm&quot; target=&quot;_blank&quot;&gt;亳州市&lt;/a&gt;谯城区双沟镇居亳州市南20公里处，面积180平方公里，耕地14万多亩，辖4个居委会、14个村。人口近9万人，集镇常住人口3万人。\r\n	&lt;/p&gt;\r\n	&lt;p&gt;\r\n		&amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;a href=&quot;http://baike.baidu.com/view/711441.htm&quot; target=&quot;_blank&quot;&gt;谯城区&lt;/a&gt;&lt;a href=&quot;http://baike.baidu.com/view/479717.htm&quot; target=&quot;_blank&quot;&gt;双沟&lt;/a&gt;镇地处&lt;a href=&quot;http://baike.baidu.com/view/3694.htm&quot; target=&quot;_blank&quot;&gt;亳州&lt;/a&gt;市南25公里，是由原双沟镇、&lt;a href=&quot;http://baike.baidu.com/view/1702960.htm&quot; target=&quot;_blank&quot;&gt;三官镇&lt;/a&gt;2006年3月合并新建的大镇（建制镇），全镇国土面积180平方公里，&lt;a href=&quot;http://baike.baidu.com/view/809103.htm&quot; target=&quot;_blank&quot;&gt;耕地面积&lt;/a&gt;13.015万亩，双沟城镇设施齐全：既是全国&lt;a href=&quot;http://baike.baidu.com/view/1036907.htm&quot; target=&quot;_blank&quot;&gt;小城镇建设&lt;/a&gt;试点镇，也是全省综合改革试点镇和全省中心建制镇之一，到2006年建城区面积达2.8平方公里，镇区&lt;a href=&quot;http://baike.baidu.com/view/68398.htm&quot; target=&quot;_blank&quot;&gt;常住人口&lt;/a&gt;1.5万人。六条主要大街已成“&lt;a href=&quot;http://baike.baidu.com/view/1392357.htm&quot; target=&quot;_blank&quot;&gt;双井&lt;/a&gt;”字结构，全部扩建成水泥路面，两侧配置&lt;a href=&quot;http://baike.baidu.com/view/53022.htm&quot; target=&quot;_blank&quot;&gt;下水道&lt;/a&gt;，配置街心花园和高档路灯，达到硬化率100%，供排水、有线&lt;a href=&quot;http://baike.baidu.com/view/8623.htm&quot; target=&quot;_blank&quot;&gt;电视&lt;/a&gt;、&lt;a href=&quot;http://baike.baidu.com/view/3923.htm&quot; target=&quot;_blank&quot;&gt;电信&lt;/a&gt;等基础设施基本完善，市场体系基本完善，辐射范围1000多平方公里。&lt;a href=&quot;http://baike.baidu.com/view/5221201.htm&quot; target=&quot;_blank&quot;&gt;北关工业园区&lt;/a&gt;是全国农产品加工示范基地&lt;sup&gt;[1]&lt;/sup&gt;&lt;a name=&quot;ref_[1]_5878223&quot;&gt;&lt;/a&gt;&amp;nbsp; 。\r\n	&lt;/p&gt;\r\n	&lt;p&gt;\r\n		&amp;nbsp;&amp;nbsp;&amp;nbsp; 双钩镇地处黄淮流域，属&lt;a href=&quot;http://baike.baidu.com/view/818023.htm&quot; target=&quot;_blank&quot;&gt;温带季风性气候&lt;/a&gt;。四季分明，光热资源充足，年最高气温40℃，最低温度为－15℃。多年平均降雨量约为840mm，年际变化幅度很大，大水之年降雨量最大为1568mm，干旱年仅有436.8mm，一年中降雨量主要集中在6－8月份，一般约占年降雨量的62%，春秋雨量约占降雨量的17%左右。本地光照条件在全国属于二类地区。无霜期一般在210天，全年无明显的主风向。\r\n	&lt;/p&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_town` VALUES ('14', '龙扬镇', '33.457205', '115.859729', null, '&lt;div style=&quot;background:#fff;&quot; class=&quot;w1002&quot;&gt;\r\n	&lt;div class=&quot;content&quot;&gt;\r\n		&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n			龙扬镇本地概况\r\n		&lt;/div&gt;\r\n		&lt;div class=&quot;tit_news&quot; style=&quot;text-align:center;&quot;&gt;\r\n			发布日期：2016-12-29&amp;nbsp;&amp;nbsp;字体：&lt;a&gt;大&lt;/a&gt;&amp;nbsp;&lt;a&gt;中&lt;/a&gt;&amp;nbsp;&lt;a&gt;小&lt;/a&gt;\r\n		&lt;/div&gt;\r\n		&lt;div id=&quot;BodyLabel&quot;&gt;\r\n			&lt;p&gt;\r\n				龙扬镇位于&lt;a class=&quot;ed_inner_link&quot; href=&quot;http://baike.sogou.com/lemma/ShowInnerLink.htm?lemmaId=826846&quot; target=&quot;_blank&quot;&gt;安徽省亳州市谯城区&lt;/a&gt;最南端50公里处，于&lt;a class=&quot;ed_inner_link&quot; href=&quot;http://baike.sogou.com/lemma/ShowInnerLink.htm?lemmaId=270868&quot; target=&quot;_blank&quot;&gt;涡阳县&lt;/a&gt;的&lt;a class=&quot;ed_inner_link&quot; href=&quot;http://baike.sogou.com/lemma/ShowInnerLink.htm?lemmaId=64437312&quot; target=&quot;_blank&quot;&gt;临湖镇&lt;/a&gt;、&lt;a class=&quot;ed_inner_link&quot; href=&quot;http://baike.sogou.com/lemma/ShowInnerLink.htm?lemmaId=10795170&quot; target=&quot;_blank&quot;&gt;高公镇&lt;/a&gt;，&lt;a class=&quot;ed_inner_link&quot; href=&quot;http://baike.sogou.com/lemma/ShowInnerLink.htm?lemmaId=67766142&quot; target=&quot;_blank&quot;&gt;太和县&lt;/a&gt;的&lt;a class=&quot;ed_inner_link&quot; href=&quot;http://baike.sogou.com/lemma/ShowInnerLink.htm?lemmaId=65465310&quot; target=&quot;_blank&quot;&gt;二郎乡&lt;/a&gt;、&lt;a class=&quot;ed_inner_link&quot; href=&quot;http://baike.sogou.com/lemma/ShowInnerLink.htm?lemmaId=10614500&quot; target=&quot;_blank&quot;&gt;坟台镇&lt;/a&gt;接壤，总面积94.2平方公里，辖11个村，163个自然村，5.8万人，耕地面积8.1万亩，年人均纯收入2400元，财政收入407万元。是亳州南部重要的粮食基地、&lt;a class=&quot;ed_inner_link&quot; href=&quot;http://baike.sogou.com/lemma/ShowInnerLink.htm?lemmaId=64881475&quot; target=&quot;_blank&quot;&gt;小辣椒&lt;/a&gt;生产基地和肉类生产基地。这里盛产小麦、玉米、黄豆、芝麻、小辣椒、西瓜等，牛肉、粉皮、麻油、麻花等土特产远近闻名。\r\n			&lt;/p&gt;\r\n		&lt;/div&gt;\r\n	&lt;/div&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_town` VALUES ('15', '淝河镇', '33.565865', '115.660857', null, '&lt;div style=&quot;background:#fff;&quot; class=&quot;w1002&quot;&gt;\r\n	&lt;div class=&quot;content&quot;&gt;\r\n		&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n			淝河镇简介\r\n		&lt;/div&gt;\r\n		&lt;div class=&quot;tit_news&quot; style=&quot;text-align:center;&quot;&gt;\r\n			发布日期：2017-02-05&amp;nbsp;&amp;nbsp;字体：&lt;a&gt;大&lt;/a&gt;&amp;nbsp;&lt;a&gt;中&lt;/a&gt;&amp;nbsp;&lt;a&gt;小&lt;/a&gt;\r\n		&lt;/div&gt;\r\n		&lt;div id=&quot;BodyLabel&quot;&gt;\r\n			&lt;p&gt;\r\n				&amp;nbsp; \r\n&amp;nbsp; &amp;nbsp; \r\n淝河镇位于亳州市谯城区南部39公里处，因是西淝河的源头而得名“肥河”，该镇紧靠105国道和涡阳至郸城的省道，南与太和县的桑营镇隔西淝河相邻，相距仅500米；西以宋汤河为界与河南省郸城县的白马镇接壤，相距400米；东与谯城区古城镇为邻；北以洺河为界与双沟镇隔河相望。淝河镇呈东西长方形，系亳州市谯城区的南大门，可谓是“一树照两省，鸡鸣听三县”。全镇区域面积88平方公里，耕地面积8.8万亩，人口5.2万，辖10个村民委员会，156个自然村，是谯城区的农业大镇。\r\n			&lt;/p&gt;\r\n		&lt;/div&gt;\r\n	&lt;/div&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_town` VALUES ('16', '芦庙镇', '34.009692', '115.785599', null, '&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n	芦庙镇概况\r\n&lt;/div&gt;\r\n&lt;div class=&quot;tit_news&quot; style=&quot;text-align:center;&quot;&gt;\r\n	发布日期：2016-12-29&amp;nbsp;&amp;nbsp;字体：&lt;a&gt;大&lt;/a&gt;&amp;nbsp;&lt;a&gt;中&lt;/a&gt;&amp;nbsp;&lt;a&gt;小&lt;/a&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;BodyLabel&quot;&gt;\r\n	&lt;p style=&quot;text-indent:2em;&quot;&gt;\r\n		&amp;nbsp;&amp;nbsp;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-align:center;text-indent:2em;&quot;&gt;\r\n		&lt;img title=&quot;6de4270c394d4b4481dc863fce51a0ea.jpg&quot; alt=&quot;6de4270c394d4b4481dc863fce51a0ea.jpg&quot; src=&quot;http://newwcwy.ahxf.gov.cn/UploadVillage/ueimage/20161229/6361862980226345742318824.jpg&quot; /&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:40px;&quot;&gt;\r\n		谯城区芦庙镇位于全国历史文化名城亳州市最北部，中华药都亳州市北部，与河南省商丘市睢阳区和虞城县接壤，素有“鸡鸣闻两省，犬吠惊三县”之说。自古就有“中原锁钥、南北通衢”的美誉，历来是兵家必争之地，是亳州著名的革命老区，彭雪枫将军在此开创皖北革命根据地。全镇国土总面积69平方公里，共辖芦庙、王楼、焦楼、袁庄、杨庄、前毛、雷庄、徐庙8个村民委员会，107个自然村，总人口4.2万人，耕地面积78435亩，是中原地区较为典型的农业乡镇。截止到2016年底，全镇共建立党的基层党组织39个。\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-align:center;text-indent:32px;&quot;&gt;\r\n		&lt;img title=&quot;500ca3c7708a46cda6cfe2be15628c72.jpg&quot; alt=&quot;500ca3c7708a46cda6cfe2be15628c72.jpg&quot; src=&quot;http://newwcwy.ahxf.gov.cn/UploadVillage/ueimage/20170524/6363125403104464798989347.jpg&quot; /&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:40px;&quot;&gt;\r\n		芦庙镇交通便捷，北距商丘机场50公里，南距阜阳机场120公里，距虞城县30公里，永城市、鹿邑县40公里，到太和、涡阳50公里。京九铁路、亳阜高速公路贯穿南北，亳虞公路、环区路交叉而过，距105国道、311国道、许泗高速不足5公里。亳州市唯一的农村火车货站座落境内，公路实现村村通。可以说我镇货运吞吐迅速，火车站零距离，上国道五分钟，到市区、入高速不足十分钟，连万户村村通。\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-align:center;text-indent:32px;&quot;&gt;\r\n		&lt;img title=&quot;微信图片_20170524200840.jpg&quot; alt=&quot;微信图片_20170524200840.jpg&quot; src=&quot;http://newwcwy.ahxf.gov.cn/UploadVillage/ueimage/20170524/6363125405514669034443650.jpg&quot; /&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:40px;&quot;&gt;\r\n		芦庙镇历史文化底蕴丰厚，芦庙集古称龙王庙集，因明末连年大旱，农民为求雨修龙王庙而得名，又因此处多水洼地，盛产芦苇，以芦苇远名于外，故演变为芦庙集，也有称芦家庙集的。这里还是我地闻名的革命老区之一，其中著名的芦家庙战斗就在我镇芦庙老街的曾家老店进行的，为纪念和缅怀这里牺牲的革命先烈们，张爱萍将军题词的芦家庙战斗纪念碑座落在芦家庙战斗纪念馆前，当年曾在此进行革命活动的原国家航空航天七机部部长姜延斌题词的纪念碑在芦庙小学院内。这些都成为当地学习革命历史，继承光荣传统的生动教材。&amp;nbsp;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-align:center;text-indent:32px;&quot;&gt;\r\n		&lt;img title=&quot;2.jpg&quot; alt=&quot;2.jpg&quot; src=&quot;http://newwcwy.ahxf.gov.cn/UploadVillage/ueimage/20170915/6364106500584986291819882.jpg&quot; /&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:40px;&quot;&gt;\r\n		芦庙镇自古以来民风淳朴，人居和谐，环境优美，社会状况良好，农产品待价而沽，特别是中药材留兰香是药都最大的种植基地。劳动力充足低价，工商业用地虚位以待，35KV王楼变电所上连110KV,可随时扩大。\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-align:center;text-indent:32px;&quot;&gt;\r\n		&lt;img title=&quot;微信图片_20170524200844.jpg&quot; alt=&quot;微信图片_20170524200844.jpg&quot; src=&quot;http://newwcwy.ahxf.gov.cn/UploadVillage/ueimage/20170524/6363125410274237397640937.jpg&quot; /&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:50px;&quot;&gt;\r\n		2016年实现财政收入757万元，其中：国税收入521万元，地税收入166万元，财政部门收入70万元。通过以商招商，主动招商等各种方式，2016年完成招商引资4.2亿元，完成固定资产投资1.2亿元。在粮食种植面积稳定在30000亩的基础上，引导农民进行产业结构优化调整，药材种植面积扩大到12000亩，商品蔬菜播种面积3000多亩，设施西瓜种植8000多亩，以葡萄、桃为主的干鲜果栽培面积发展到1000亩。一年来，土地流转3157.8亩，申报中小型家庭农场26户，申报农民种植合作社15个。完成森林增长面积1140亩，新建、补植、绿化林带23公里，四旁植树7.9万棵，完善农田林网建设2400亩。2016年，镇重点对省级美好乡村孙大庄进行了建设，实施了沟塘清淤、文化广场、道排工程、美化亮化、村部建设等工程。投资450万元，新建了3216平方米敬老院，现已投入使用。发挥镇村信访维稳工作站的作用，及时处置化解群众诉求。扩建了“乡村少年宫”，新征了小学操场用地，开展了国学经典演讲比赛，中心小学荣获“全区教育工作先进单位”、“全区学校安全管理综合治理工作先进单位”、“全区平安文明和谐校园”和教育系统“先进基层党组织”称号。中学被亳州市教育局评为“义务教育阶段学校标准化建设先进单位”，中考考入一中、二中人数逐年攀升。从财政中列入专项经费添置书籍、绘制文化墙等，目前已绘制400余平方米“书香文化墙”，书香氛围浓厚。\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-align:center;text-indent:40px;&quot;&gt;\r\n		&lt;img title=&quot;微信图片_20170524200848.jpg&quot; alt=&quot;微信图片_20170524200848.jpg&quot; src=&quot;http://newwcwy.ahxf.gov.cn/UploadVillage/ueimage/20170524/6363125412305360957465946.jpg&quot; /&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:50px;&quot;&gt;\r\n		芦庙镇镇村干部素质高，领导班子团结向上，为民服务全程代理，全镇广大干群正张开热情的双臂，广迎四海宾客。&amp;nbsp;\r\n	&lt;/p&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_town` VALUES ('17', '张店乡', '33.931244', '115.937344', null, '&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n	张店乡简介\r\n&lt;/div&gt;\r\n&lt;div class=&quot;tit_news&quot; style=&quot;text-align:center;&quot;&gt;\r\n	发布日期：2016-12-29&amp;nbsp;&amp;nbsp;字体：&lt;a&gt;大&lt;/a&gt;&amp;nbsp;&lt;a&gt;中&lt;/a&gt;&amp;nbsp;&lt;a&gt;小&lt;/a&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;BodyLabel&quot;&gt;\r\n	&lt;p&gt;\r\n		&amp;nbsp;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:43px;&quot;&gt;\r\n		张店乡位于谯城区东北部，豫皖两省交界处，距东巷高速公路5公里，京九铁路亳州站15公里；311国道、泗许高速公路穿境而过，交通便利，区位优势明显；国土面积96平方公里，耕地7万亩，辖10个行政村，总人口4.2万人；境内土地肥沃，资源丰富，河流众多，公路、电网、水利设施良好，物产丰饶，盛产蔬菜、瓜果、优质小麦、棉花、生猪、牛羊、肉鸡、蛋禽、桐木等多种农副产品。\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:43px;&quot;&gt;\r\n		张店乡是农业大乡，系国家级农科教结合示范乡，农业部批准的无公害蔬菜生产基地。蔬菜生产、板材加工和畜禽养殖是该乡的三大支柱产业。张店乡被誉为“瓜果、蔬菜之乡”，蔬菜种植面积6万多亩，年产值2.65亿元，农民纯收入58％来自蔬菜产业。多年来，张店乡通过打造“一村一品、多村一品、一村一特、多村一特”的蔬菜种植格局，逐步形成了泥店韭菜生产基地、后李楼大蒜生产基地、王楼冬瓜生产基地、葛大苔干生产基地、后窑黄瓜生产基地，并且出现了皱楼番茄生产专业村、黄庄芹菜生产专业村、土楼豆角生产专业村等。蔬菜种植模式日趋设施化、立体化，通过出台《种植蔬菜有奖制度》，加大发展蔬菜种植新模式资金扶持力度，激发了农民群众发展设施化种植蔬菜、立体化种植蔬菜的积极性，目前，全乡日光温室蔬菜、阳光棚蔬菜、小拱棚蔬菜种植面积3.8万亩，并且出现了“黄瓜+苦瓜”、“韭菜+花菜”、“土豆+甘蔗”等多种间作套种、立体种植模式。蔬菜生产科技含量不断加大，通过采取定期举办培训班，聘请专家、学者、技术员前来授课等措施，面对面地向农民群众传授无公害蔬菜生产技术、配方施肥、蔬菜嫁接技术等科技种菜知识，指导农民科学种菜，从而优化了蔬菜品种，提高了蔬菜品质。张店乡蔬菜市场较为红火，蔬菜产品销往北京、上海、合肥、武汉、西安等10多个大中城市。张店乡主要通过培养蔬菜经纪人、成立蔬菜产销协会并鼓励他们在田头、路边、村口建立简易蔬菜交易市场，扶持一批蔬菜加工龙头企业并支持他们与菜农签订订单生产合同等多种形式，不断加强蔬菜市场建设。目前，全乡田间地头、村口路边蔬菜批发点60多个，蔬菜经纪人300多名，已成立韭菜协会、黄瓜协会和无籽西瓜协会等6个蔬菜协会，并注册了“老菜农”、“传承”牌等一批优质蔬菜商标，同时扶持了葛大冬瓜加工厂、李吉楼蔬菜脱水厂、魏庄蔬菜冷冻厂等5家蔬菜加工龙头企业，逐步形成了“企业+基地+农户”或“经纪人＋基地＋农户”的产业化经营。\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:43px;&quot;&gt;\r\n		经过多年的发展，张店乡板材加工业已由单纯的板材加工业向圆木交易、出售树木下脚料及木制产品生产等方面发展，并且已初步形成规模，市场逐渐拓展，不断延伸产业链条，形成板材加工基地。张店乡板材加工业主要分布在张楼、刘营、蔡楼、后窑、季庄、高阁等20多个自然村，以高阁为中心。全乡有板材加工厂30多家，圆木交易点50多个，从业人员6000多人，技术人员200多人，年加工、出售木材50000多方，生产木制产品20000多件，年产值上亿元。板材加工厂主要生产粘合板、拼板、木条等产品，有个别企业生产桌子、板凳、橱柜等高档家具，销售方式多是订单生产，客户大多来自永城、北京、上海、合肥等大中城市和韩国、日本、朝鲜、东南亚等国家。这些产品样多质优，有的供其他企业深加工，有的是办公用品及家庭用具。圆木交易，就是几家集资、或多人合资在村口、路边设立圆木交易点，主要采取收购木材下脚料、树木原料，然后集中向中外木材加工企业出售的方式经营。由于从事圆材交易的农民群众诚实守信，加上木材量大质优，一年四季八方客商蜂拥而至，也就形成了红火的圆木交易市场。在板材加工业和圆木交易业的带动下，相关产业相继兴起，出现了一批运输户、装卸户、机车维修门市部等，同时浴室、餐饮业、旅店服务业也应运而生。据统计，目前，基地有装吊车30多辆，大卡车20多辆，机车维修门市部5家，浴室3家，餐饮、旅店服务点8家，逐步形成全方位、多层次的产业化经营。\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:43px;&quot;&gt;\r\n		张店乡畜牧养殖业发展迅速。通过典型带动、科技促进和资金扶持，加上定期培训畜禽疾病知识，定期组织畜禽防疫员注射传染病防治疫苗，激发了农民发展畜牧养殖的积极性，逐步形成了张各肉鸡生产基地、葛大沙雁养殖基地、乔楼生猪养殖基地及魏庄养鸡厂。畜牧养殖协会的成立，实行了统一进畜禽疫苗、统一购买饲料、药品、统一销售，增强农民抵抗市场风险能力，据统计，全乡年出售生猪30000头，肉鸡200多万只，其产值占全乡生产总产值的26％，畜禽养殖加快了张店乡新农村建设步伐。\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:43px;&quot;&gt;\r\n		张店乡党委、政府一班工作人员坚持为民、务实、清廉，夙夜在公，全心全意服务辖区群众；张店乡人民群众勤劳、朴实、热情。在乡党委、政府的正确领导下，全乡人民以十八大和十八届历次全会精神为指导，高举中国特色社会主义理论伟大旗帜，紧密团结在以习近平同志为核心的党中央周围，和党中央、国务院保持高度一致，坚持四个全面战略部署，全面贯彻落实创新、协调、绿色、开放、共享的发展理念，解放思想、实事求是、与时俱进、开拓创新，充分发挥各种优势，进一步把蔬菜经济、木材加工和畜牧养殖三大产业做大做强，按照新农村建设的总体要求，努力实现该乡政治、经济、文化、社会、生态五位一体健康、协调发展。\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:43px;&quot;&gt;\r\n		张店乡党委、政府带领全乡四万多群众，严格贯彻落实“讲看齐、见行动”、坚持精准扶贫、精准脱贫的方针，齐心协力做好减贫工作，带领全乡群众逐渐摆脱贫困，在迈向全面小康、实现伟大复兴的中国梦的道路上稳步前进！\r\n	&lt;/p&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_town` VALUES ('18', '牛集镇', '33.982881', '115.616492', null, '&lt;div style=&quot;background:#fff;&quot; class=&quot;w1002&quot;&gt;\r\n	&lt;div class=&quot;content&quot;&gt;\r\n		&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n			美好牛集\r\n		&lt;/div&gt;\r\n		&lt;div class=&quot;tit_news&quot; style=&quot;text-align:center;&quot;&gt;\r\n			发布日期：2017-01-02&amp;nbsp;&amp;nbsp;字体：&lt;a&gt;大&lt;/a&gt;&amp;nbsp;&lt;a&gt;中&lt;/a&gt;&amp;nbsp;&lt;a&gt;小&lt;/a&gt;\r\n		&lt;/div&gt;\r\n		&lt;div id=&quot;BodyLabel&quot;&gt;\r\n			&lt;p&gt;\r\n				牛集镇位于亳州市谯城区的西北部。东靠魏岗镇，北界古井镇，南临涡河，西与河南省鹿邑县的涡北镇和马铺镇接壤。国土面积约97平方公里，辖15个行政村，160个自然村，380个村民组，17900多户，人口约7.2万人，汉族人口占89%，余为回族、女真族。全镇耕地面积6770.10公顷。北部以栽植烟叶牛集镇位于亳州市谯城区的西北部。东靠魏岗镇，北界古井镇，南临涡河，西与河南省鹿邑县的涡北镇和马铺镇接壤。国土面积约97平方公里，辖15个行政村，160个自然村，380个村民组，17900多户，人口约7.2万人，汉族人口占89%，余为回族、女真族。全镇耕地面积6770.10公顷。北部以栽植烟叶、小辣椒等经济作物为主，南部以粮食生产和药材种植为主，是典型的农业大镇。、小辣椒等经济作物为主，南部以粮食生产和药材种植为主，是典型的农业大镇。\r\n			&lt;/p&gt;\r\n		&lt;/div&gt;\r\n	&lt;/div&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_town` VALUES ('19', '魏岗镇', '33.946639', '115.669707', null, '&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n	魏岗镇基本概况\r\n&lt;/div&gt;\r\n&lt;div class=&quot;tit_news&quot; style=&quot;text-align:center;&quot;&gt;\r\n	发布日期：2016-12-29&amp;nbsp;&amp;nbsp;字体：&lt;a&gt;大&lt;/a&gt;&amp;nbsp;&lt;a&gt;中&lt;/a&gt;&amp;nbsp;&lt;a&gt;小&lt;/a&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;BodyLabel&quot;&gt;\r\n	&lt;p style=&quot;text-indent:28px;background:#FFFFFF;&quot;&gt;\r\n		魏岗镇地处安徽省亳州市谯城区西北，东与花戏楼街道办事处接壤，西接牛集镇，南与&lt;a href=&quot;http://baike.baidu.com/subview/1751284/5879893.htm&quot;&gt;十八里镇&lt;/a&gt;接壤，北接&lt;a href=&quot;http://baike.baidu.com/subview/273134/5971213.htm&quot;&gt;古井镇&lt;/a&gt;，镇政府驻地，魏岗集东距市区9公里。全镇辖38个&lt;a href=&quot;http://baike.baidu.com/view/338465.htm&quot;&gt;村委会&lt;/a&gt;，总面积86平方公里，耕地5199公顷，人口53507人。镇区面积3.1平方公里，镇区人口1.2万人。1996年魏岗镇被阜阳市确定为综合改革试点镇，1999年又成为安徽省综合改革试点镇。\r\n	&lt;/p&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_town` VALUES ('22', '观堂镇', '0', '0', null, '&lt;div style=&quot;background:#fff;&quot; class=&quot;w1002&quot;&gt;\r\n	&lt;div class=&quot;content&quot;&gt;\r\n		&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n			观堂镇概况\r\n		&lt;/div&gt;\r\n		&lt;div class=&quot;tit_news&quot; style=&quot;text-align:center;&quot;&gt;\r\n			发布日期：2017-02-06&amp;nbsp;&amp;nbsp;字体：&lt;a&gt;大&lt;/a&gt;&amp;nbsp;&lt;a&gt;中&lt;/a&gt;&amp;nbsp;&lt;a&gt;小&lt;/a&gt;\r\n		&lt;/div&gt;\r\n		&lt;div id=&quot;BodyLabel&quot;&gt;\r\n			&lt;p&gt;\r\n				观堂镇位于安徽省&lt;a href=&quot;http://baike.baidu.com/view/3694.htm&quot; target=&quot;_blank&quot;&gt;亳州&lt;/a&gt;市，地处豫皖两省三县（市）结合部，东南距&lt;a href=&quot;http://baike.baidu.com/view/457753.htm&quot; target=&quot;_blank&quot;&gt;涡阳县&lt;/a&gt;40公里，东北距河南省&lt;a href=&quot;http://baike.baidu.com/view/83148.htm&quot; target=&quot;_blank&quot;&gt;永城市&lt;/a&gt;35公里。观堂镇自古有观音堂之称，辖区面积96平方公里，下辖16个行政村，223个自然村，人口6万，其中回族人口1.2万。\r\n			&lt;/p&gt;\r\n		&lt;/div&gt;\r\n	&lt;/div&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_town` VALUES ('23', '汤陵街道', '0', '0', null, '&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n	汤陵街道办事处简介\r\n&lt;/div&gt;\r\n&lt;div class=&quot;tit_news&quot; style=&quot;text-align:center;&quot;&gt;\r\n	发布日期：2017-02-10&amp;nbsp;&amp;nbsp;字体：&lt;a&gt;大&lt;/a&gt;&amp;nbsp;&lt;a&gt;中&lt;/a&gt;&amp;nbsp;&lt;a&gt;小&lt;/a&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;BodyLabel&quot;&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;font-family:宋体;font-size:14px;&quot;&gt;\r\n		&lt;span style=&quot;font-family:仿宋_GB2312;font-size:18px;&quot;&gt;&amp;nbsp; \r\n&amp;nbsp;汤陵街道办事处下辖7个社区、4个村委会。总户数17489户，总人口57488人，其中农业户9296户，农业人口32832人，农村劳动力20358个，土地面积1.8万亩，区域面积26平方公里。目前，以北二环、西外环为界有16平方公里的土地面积被划入亳州都市圈规划区之内，分别占总土地面积、总村委会、总户数、总人口的80%以上。&lt;/span&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;font-family:宋体;font-size:14px;&quot;&gt;\r\n		&lt;span style=&quot;font-family:仿宋_GB2312;font-size:18px;&quot;&gt;&amp;nbsp;&amp;nbsp; \r\n亳州市汤陵街道办事处位于涡河北岸，属城乡结合部，系平原地区，自古杰地。南靠薛阁、花戏楼街道，北依华佗镇，东接五马、谯东二镇，西与十八里、位岗相邻。处于谯城区的特殊位置，具有得天独厚的区位资源和基础优势。&lt;/span&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;font-family:宋体;font-size:14px;&quot;&gt;\r\n		&lt;span style=&quot;font-family:仿宋_GB2312;font-size:18px;&quot;&gt;&amp;nbsp;&amp;nbsp; \r\n汤陵历史峨峨，文化璀璨，光彩照人，系商成汤王建都于此而得名，至今陵墓古风犹存，已有3700多年的历史。自古以来，涡河北岸商贾云集，兴旺繁荣，号称商都，重商、乐商的传统源远流长，代代相传，富有悠久的商贸流通和历史人文底蕴。近百年的省属重点中学亳州一中座落其中，亳州第一所基督教堂解放前就设立与此。尤其改革开放以来的快速发展和建设，亳州剧场的迁入，区委党校的设立，五中、七中、皖江中专、风华中学的崛起，丰水源的开发等，更以崭新的姿态开启了汤陵史上的新纪元，已成为亳州谯城名副其实的文化教育中心，已成为城市建设的新亮点。&lt;/span&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;font-family:宋体;font-size:14px;&quot;&gt;\r\n		&lt;span style=&quot;font-family:仿宋_GB2312;font-size:18px;&quot;&gt;&amp;nbsp;&amp;nbsp; \r\n汤陵人杰地灵，水美田秀，物产独特，资源富集，地阔物博，产业齐全，尽显风华。亳州是“华佗故里、药材之乡”，是全国四大药都之一，汤陵是亳州著名的药乡和酒乡，素以种植中药材、蔬菜为主，经济作物占耕地面积的90%以上。兴办了一批农产品加工龙头企业，拓展了一批农产品、农资批发市场，建成了一条条产、加、销紧密结合的产业链。以民营企业为龙头的金不换白酒集团生产的“魏王酒”获安徽省优质白酒著名商标、誉满天下，精心酿造的“金不换”酒荣登国宴、扬名九洲；多年销售额保持在亿元以上，连年获得殊荣；北京同仁堂中药饮片公司、是我办中药材加工的龙头骨干企业，现二期毒麻药品车间扩建工程已全部竣工，新上技改项目、开发研制的礼品式小包装品牌，已成为出口创汇的一大亮点。天达集团是我办饲料加工、兽药生产的骨干企业，去年被评为省级以上农业产业化龙头企业。申亳集团引资引技并举，致力项目创新，已形成工业、办学、培训三位一体的多元发展模式。亳州中药饮片厂、神州饮片厂等一批骨干企业产品，纷纷亮相国内外市场，全办已形成药业、酒业、农产品加工业、蔬菜瓜果产销配送业“四大支撑”和中药材、酿酒、饲料、兽药、畜牧养殖、绿色种植、农产品批发、商贸流通、交通运输、区街经济“十大优势产业”，呈现出各具特色，结构互补，辐射带动，错位竞争的发展态势，工业化、城市化、产业化、市场化初具雏形。&lt;/span&gt;\r\n	&lt;/p&gt;\r\n&lt;/div&gt;');

-- ----------------------------
-- Table structure for `qfant_users`
-- ----------------------------
DROP TABLE IF EXISTS `qfant_users`;
CREATE TABLE `qfant_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(64) NOT NULL DEFAULT '' COMMENT '登录密码；mb_password加密',
  `avatar` varchar(255) DEFAULT '' COMMENT '用户头像，相对于upload/avatar目录',
  `email` varchar(100) DEFAULT '' COMMENT '登录邮箱',
  `email_code` varchar(60) DEFAULT NULL COMMENT '激活码',
  `phone` bigint(11) unsigned DEFAULT NULL COMMENT '手机号',
  `status` tinyint(1) DEFAULT '2' COMMENT '用户状态 0：禁用； 1：正常 ；2：未验证',
  `register_time` int(10) unsigned DEFAULT '0' COMMENT '注册时间',
  `last_login_ip` varchar(16) DEFAULT '' COMMENT '最后登录ip',
  `last_login_time` int(10) unsigned DEFAULT '0' COMMENT '最后登录时间',
  PRIMARY KEY (`id`),
  KEY `user_login_key` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qfant_users
-- ----------------------------
INSERT INTO `qfant_users` VALUES ('88', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '/Upload/avatar/user1.jpg', '', '', null, '1', '1449199996', '0.0.0.0', '1508718757');
INSERT INTO `qfant_users` VALUES ('89', 'admin23', 'e10adc3949ba59abbe56e057f20f883e', '/Upload/avatar/user2.jpg', '', '', null, '1', '1449199996', '0.0.0.0', '1506745221');
INSERT INTO `qfant_users` VALUES ('98', '123456', 'e10adc3949ba59abbe56e057f20f883e', '', '', null, null, '1', '1506746731', '', '0');

-- ----------------------------
-- Table structure for `qfant_village`
-- ----------------------------
DROP TABLE IF EXISTS `qfant_village`;
CREATE TABLE `qfant_village` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `intro` text,
  `tel` varchar(20) DEFAULT NULL,
  `contact` varchar(20) DEFAULT '0',
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `townid` int(11) DEFAULT NULL,
  `baseinfo` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of qfant_village
-- ----------------------------
INSERT INTO `qfant_village` VALUES ('7', '辛庄党支部', '辖23个自然村，村名：张庄、马庄、高庄、蔡大庄、黄庄、夭庄、辛庄、汪张、蔡老家、沈庄、毛庄、程井、蔡竹元、陈庄、赵庄、蔡庄、于庄、李桥、郭庄、孙桥、李河沟、黄石桥、罗元；', '13212345678', '张同兴', '33.88143', '115.85807', '9', '&lt;div class=&quot;contain&quot;&gt;\r\n	&lt;div class=&quot;content&quot;&gt;\r\n		&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n			&lt;br /&gt;\r\n		&lt;/div&gt;\r\n		&lt;div id=&quot;BodyLabel&quot;&gt;\r\n			&lt;p&gt;\r\n				辖23个自然村，村名：张庄、马庄、高庄、蔡大庄、黄庄、夭庄、辛庄、汪张、蔡老家、沈庄、毛庄、程井、蔡竹元、陈庄、赵庄、蔡庄、于庄、李桥、郭庄、孙桥、李河沟、黄石桥、罗元；\r\n			&lt;/p&gt;\r\n		&lt;/div&gt;\r\n	&lt;/div&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_village` VALUES ('8', '石桥铺', '石轿铺村位于谯东镇西部，村部坐落在李双楼自然村，下辖18个自然村，人口7511人，耕地面积5860亩，党员149人，党总支下辖蔬菜、粮食、药材三个专业支部，主要经济作物为药材和蔬菜。', '13212345678', '村书记', '33.873231', '115.853821', '9', '&lt;div class=&quot;contain&quot;&gt;\r\n	&lt;div class=&quot;content&quot;&gt;\r\n		&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n			&lt;img title=&quot;618608827369156422.jpg&quot; border=&quot;0&quot; alt=&quot;618608827369156422.jpg&quot; src=&quot;http://newwcwy.ahxf.gov.cn/UploadVillage/ueimage/20170908/6364048820419676441814298.jpg&quot; width=&quot;500&quot; height=&quot;400&quot; style=&quot;width:500px;height:400px;&quot; /&gt;\r\n		&lt;/div&gt;\r\n		&lt;div id=&quot;BodyLabel&quot;&gt;\r\n			&lt;p&gt;\r\n				&amp;nbsp; &amp;nbsp; \r\n石轿铺村位于谯东镇西部，村部坐落在李双楼自然村，下辖18个自然村，人口7511人，耕地面积5860亩，党员149人，党总支下辖蔬菜、粮食、药材三个专业支部，主要经济作物为药材和蔬菜。&lt;br /&gt;\r\n&amp;nbsp;&amp;nbsp;&amp;nbsp; \r\n石文松，男，汉族，现年38岁，中共党员，初中文化，现任石轿铺行政村党总支书记，2006年至2010年任石轿铺行政村党总支委员，2010年至2014年任石轿铺行政村村委会主任，2014年至今任石轿铺行政村党总支书记。目前，村委会主要以农业普查和精准扶贫为抓手，并抓好当前的网上办事大厅为民服务工作。\r\n			&lt;/p&gt;\r\n		&lt;/div&gt;\r\n	&lt;/div&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_village` VALUES ('9', '郭万村', '郭万村村部建成于2015年6月，占地面积300多平方米，活动场所使用面积600余平方米，设有多功能大会议室近200平方米、便民服务大厅80余平方米、图书阅览室近30平方米、家庭生活指导室、信访调解及扶贫综合办公室、监控及民兵室、村级小食堂等配套设施齐全。郭万村健全的配套设施，大大提高了为民便民服务的效率，也给村民们营造了一个温馨舒适的活动场所。', '13212345678', '村书记', '33.699209', '115.89776', '11', '&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n	&lt;img title=&quot;6363772109179624805553416.jpg&quot; alt=&quot;6363772109179624805553416.jpg&quot; src=&quot;http://newwcwy.ahxf.gov.cn/UploadVillage/ueimage/20170919/6364143854234394515984818.jpg&quot; /&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;BodyLabel&quot;&gt;\r\n	&lt;p style=&quot;text-indent:53px;&quot;&gt;\r\n		郭万村村部建成于2015年6月，占地面积300多平方米，活动场所使用面积600余平方米，设有多功能大会议室近200平方米、便民服务大厅80余平方米、图书阅览室近30平方米、家庭生活指导室、信访调解及扶贫综合办公室、监控及民兵室、村级小食堂等配套设施齐全。郭万村健全的配套设施，大大提高了为民便民服务的效率，也给村民们营造了一个温馨舒适的活动场所。\r\n	&lt;/p&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_village` VALUES ('10', '吕楼村', '古井镇位于谯城区西北部，辖13个村，164个自然村，国土面积118平方公里，耕地9.2万亩，人口8.2万人，集镇规划区20平方公里，建成区12平方公里，镇区常住人口3.6万人。古井镇是省委组织部授予的“五个好乡镇党委标兵”，是“全国重点镇”、“全国环境优美镇”、“全国文明村镇”， 是省人民政府命名的“徽酒名镇”、 “扩权强镇试点镇”、“优秀旅游乡镇”、“产业集群专业镇”。近年来，镇党委、政府紧紧围绕“做靓徽酒名镇，打造华夏酒都”的发展目标，大力发展以白酒为主导的工业经济，初步形成了酿造、彩印、饲料加工、新型劳动密集型四个主导产业。', '13212345678', '村书记', '33.984627', '115.730092', '12', '&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n	&lt;br /&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;BodyLabel&quot;&gt;\r\n	&lt;p style=&quot;text-indent:43px;vertical-align:baseline;&quot;&gt;\r\n		古井镇位于谯城区西北部，辖13个村，164个自然村，国土面积118平方公里，耕地9.2万亩，人口8.2万人，集镇规划区20平方公里，建成区12平方公里，镇区常住人口3.6万人。古井镇是省委组织部授予的“五个好乡镇党委标兵”，是“全国重点镇”、“全国环境优美镇”、“全国文明村镇”， \r\n是省人民政府命名的“徽酒名镇”、 \r\n“扩权强镇试点镇”、“优秀旅游乡镇”、“产业集群专业镇”。近年来，镇党委、政府紧紧围绕“做靓徽酒名镇，打造华夏酒都”的发展目标，大力发展以白酒为主导的工业经济，初步形成了酿造、彩印、饲料加工、新型劳动密集型四个主导产业。\r\n	&lt;/p&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_village` VALUES ('11', '丁固村', '丁固行政村位于亳州市谯城区大杨镇正北方，北邻涡河，南邻小李村，东靠刘匠村，西邻孟王村。下辖15个自然村，即丁一队、丁二队、丁三队、丁四队、丁五队、丁六队、丁七队、丁八队、沙李庄、后油坊、翟庄、韩新庄、程楼、张土楼、王庄，总人口约5720人，耕地面积约5620亩。', '13212345678', '村书记', '33.735362', '115.934794', '11', '&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n	&lt;img title=&quot;b5f0f3037b5f4dc29676792a94e4a3b8.jpg&quot; alt=&quot;b5f0f3037b5f4dc29676792a94e4a3b8.jpg&quot; src=&quot;http://newwcwy.ahxf.gov.cn/UploadVillage/ueimage/20170919/6364144001710813548657530.jpg&quot; /&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;BodyLabel&quot;&gt;\r\n	&lt;p&gt;\r\n		&lt;br /&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:43px;&quot;&gt;\r\n		&lt;span style=&quot;font-family:仿宋;font-size:21px;&quot;&gt;&lt;/span&gt; \r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:43px;&quot;&gt;\r\n		&lt;span style=&quot;font-family:仿宋;font-size:21px;&quot;&gt;丁固行政村位于亳州市谯城区大杨镇正北方，北邻涡河，南邻小李村，东靠刘匠村，西邻孟王村。下辖15个自然村，即丁一队、丁二队、丁三队、丁四队、丁五队、丁六队、丁七队、丁八队、沙李庄、后油坊、翟庄、韩新庄、程楼、张土楼、王庄，总人口约5720人，耕地面积约5620亩。&lt;/span&gt; \r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:43px;&quot;&gt;\r\n		&lt;span style=&quot;font-family:仿宋;font-size:21px;&quot;&gt;丁固行政村村党总支下辖2个党支部，共有党员59名，村两委干部8人。&lt;/span&gt; \r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:43px;&quot;&gt;\r\n		&lt;span style=&quot;font-family:仿宋;font-size:21px;&quot;&gt;丁固行政村自然资源丰富，人文底蕴深厚，自古以来人才辈出，乡贤文化浓郁。农业生产以种植药材为主，有专业合作社3家，大型养殖场3家，大型药材加工基地3家。距省道307线6公里，交通便利。&lt;/span&gt; \r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:43px;&quot;&gt;\r\n		&lt;span style=&quot;font-family:仿宋;font-size:21px;&quot;&gt;近年来，随着道路、电力、用水等基础设施的完善和村集体经济的发展，丁固行政村凭借其丰富的旅游资源被列入安徽省旅游帮扶村，旅游前景向好。&lt;/span&gt;&lt;span style=&quot;font-family:仿宋;font-size:21px;&quot;&gt;（编辑：车正一）&lt;/span&gt; \r\n	&lt;/p&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_village` VALUES ('12', '刘匠村', '位于大杨镇东北方向11公里处，沿涡河南岸东南西北分布，全村区域面积6973.9亩，耕地面积5100亩，辖10个自然村，10个村民组，村内居住974户，现总人口4358人。盛产中药材、苔干等。', '13212345678', '村书记', '33.72454', '115.944839', '11', '&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n	&lt;br /&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;BodyLabel&quot;&gt;\r\n	&lt;p style=&quot;text-align:center;&quot;&gt;\r\n		大杨镇刘匠村简介\r\n	&lt;/p&gt;\r\n	&lt;p&gt;\r\n		位于大杨镇东北方向11公里处，沿涡河南岸东南西北分布，全村区域面积6973.9亩，耕地面积5100亩，辖10个自然村，10个村民组，村内居住974户，现总人口4358人。盛产中药材、苔干等。\r\n	&lt;/p&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_village` VALUES ('13', '大王村', '大杨镇大王村位于镇西南部6.2公里，辖十一个自然村，总人口3795人。区域面积10467.8亩，耕地面积7384亩。', '13212345678', '村书记', '33.654172', '115.879268', '11', '&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n	&lt;br /&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;BodyLabel&quot;&gt;\r\n	&lt;p style=&quot;text-indent:40px;&quot;&gt;\r\n		大杨镇大王村位于镇西南部6.2公里，辖十一个自然村，总人口3795人。区域面积10467.8亩，耕地面积7384亩。\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:40px;&quot;&gt;\r\n		大杨镇大王村现有党员60名，现有村“两委”干部及专干共7名。近年来，大王村在镇党委政府的正确领导下，紧紧围绕富民强村这一目标，以产业结构调整为主线，以农村基础设施建设为抓手，不断强化农村基层组织建设。\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:40px;&quot;&gt;\r\n		今年迎来了三年一度的村两委换届，大王村在镇党委的领导下，顺利完成村干部的新老换届，实现了村干部队伍的年轻化、高学历化，为我村的长久发展奠定了坚实的队伍基础。\r\n	&lt;/p&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_village` VALUES ('14', '大葛村', '大葛村，辖12个自然村，27个村民组，人口4479，地亩9500亩，党员71名（其中女党员14名），村两委职数8名。', '13212345678', '村书记', '33.652188', '115.860381', '11', '&lt;div class=&quot;contain&quot;&gt;\r\n	&lt;div class=&quot;content&quot;&gt;\r\n		&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n			&lt;br /&gt;\r\n		&lt;/div&gt;\r\n		&lt;div id=&quot;BodyLabel&quot;&gt;\r\n			&lt;p&gt;\r\n				&lt;br /&gt;\r\n			&lt;/p&gt;\r\n			&lt;p&gt;\r\n				&lt;strong&gt;&lt;span style=&quot;font-family:仿宋_GB2312;&quot;&gt;大葛村，&lt;/span&gt;&lt;/strong&gt;辖12个自然村，27个村民组，人口4479，地亩9500亩，党员71名（其中女党员14名），村两委职数8名。\r\n			&lt;/p&gt;\r\n		&lt;/div&gt;\r\n	&lt;/div&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_village` VALUES ('15', '孟王村', '大杨镇孟王村位于大杨镇北部，北邻涡河，南邻小李村，东靠丁固村，西邻十九里镇马寨村。距省道307线5公里，交通便利。孟王行政村下辖17个自然庄，总人口数6400人，户数1193户，其中妇女总数3200人，儿童800人，低保户40户共70人，五保户19户共20人，残疾人152人，现有耕地面积9500多亩，村党总支下辖3个党支部，共有党员91名。村两委干部9人，选派干部1名，专业合作社3家，大型养殖场3家，大型药材加工基地3家，村内有防水涂料长和楼板厂，经济作物主要以种植药材为主。近年来，孟王行政村紧紧抓住机遇，积极争取项目资金，改善基础设施，发展集体经济，增加农民收入。', '13212345678', '村书记', '33.771951', '115.901568', '11', '&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n	&lt;br /&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;BodyLabel&quot;&gt;\r\n	&lt;p style=&quot;text-align:justify;text-indent:43px;&quot;&gt;\r\n		大杨镇孟王村位于大杨镇北部，北邻涡河，南邻小李村，东靠丁固村，西邻十九里镇马寨村。距省道307线5公里，交通便利。孟王行政村下辖17个自然庄，总人口数6400人，户数1193户，其中妇女总数3200人，儿童800人，低保户40户共70人，五保户19户共20人，残疾人152人，现有耕地面积9500多亩，村党总支下辖3个党支部，共有党员91名。村两委干部9人，选派干部1名，专业合作社3家，大型养殖场3家，大型药材加工基地3家，村内有防水涂料长和楼板厂，经济作物主要以种植药材为主。近年来，孟王行政村紧紧抓住机遇，积极争取项目资金，改善基础设施，发展集体经济，增加农民收入。\r\n	&lt;/p&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_village` VALUES ('16', '小李村', '亳州市谯城区大杨镇小李村位于亳州市大杨镇北部，紧邻307国道，距市区约15公里，王楼至丁固主干道穿村而过。全村共有16个自然村，人口4600余人，耕地八千多亩，现有党员82人，村两委班子6人。', '132123456789', '村书记', '33.696485', '115.957553', '11', '&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n	&lt;br /&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;BodyLabel&quot;&gt;\r\n	&lt;p style=&quot;text-indent:37px;&quot;&gt;\r\n		亳州市谯城区大杨镇小李村位于亳州市大杨镇北部，紧邻307国道，距市区约15公里，王楼至丁固主干道穿村而过。全村共有16个自然村，人口4600余人，耕地八千多亩，现有党员82人，村两委班子6人。\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:37px;&quot;&gt;\r\n		小李村以中药材种植为特色，大力推广亳菊、白芷、牡丹、白术等本土中药材优良品种，带领小李村村民走向共同富裕的道路。\r\n	&lt;/p&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_village` VALUES ('17', '师店村', '师店村位于谯城区大杨集西南侧9公里，我村现辖8个自然村，总人口3702人，全村共有党员65名，其中女党员11名，35周岁以下的党员7名。土地总面积7080亩，现已流转出2000余亩，村级集体，光伏发电，经济收入达17万元，村部总占地面积 1565平方米，文化建身广场面积 543平方米，村部使用面积 254平方米， 其中服务大厅48平方米，党员活动室面积112平方米，党建室和图书室32平方米，村部建设为一层房。', '13212345678', '村书记', '33.635383', '115.876538', '11', '&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n	&lt;img src=&quot;http://newoa.ahxf.gov.cn/UploadVillage/VillageImg/20170915/d2f6be1e1e72440ba973bd36053a0a17.jpg&quot; /&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;BodyLabel&quot;&gt;\r\n	&lt;p style=&quot;text-align:center;&quot;&gt;\r\n		师店村简介\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:43px;&quot;&gt;\r\n		师店村位于谯城区大杨集西南侧9公里，我村现辖8个自然村，总人口3702人，全村共有党员65名，其中女党员11名，35周岁以下的党员7名。土地总面积7080亩，现已流转出2000余亩，村级集体，光伏发电，经济收入达17万元，村部总占地面积 1565平方米，文化建身广场面积 543平方米，村部使用面积 254平方米， \r\n其中服务大厅48平方米，党员活动室面积112平方米，党建室和图书室32平方米，村部建设为一层房。\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:43px;&quot;&gt;\r\n		按照“一室多用”要求，设立了便民服务大厅、会议室、党员活动室、计生活动室、图书阅览室，建立了党务和村务公开栏。坚持“建设好、管理好、使用好”并重的原则，加强日常管理。建立村级值班制度，确保每天都有村干部值班，方便群众办事。真正使村级组织活动场所成为教育党员、服务群众、促进发展的党员活动中心、科技培训中心、致富信息中心、民事调解中心、文化娱乐中心。\r\n	&lt;/p&gt;\r\n	&lt;p&gt;\r\n		&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;大杨镇将“我为党旗添光彩”党员教育实践活动作为推进基层党建工作的有力抓手，按照工作制度化、阵地标准化、决策民主化、活动特色化工作思路，从严要求，从实发力，扎实推进基层党组织规范化建设。师店村规范党组织活动是提升党员教育管理质量的重要保障，重点规范“四个活动日”活动。一是党建例会日。每周二为全村例会日，点评前期工作，传达上级要求，分析当前形势，安排本周工作。二是党员活动日。每月10号为全村党员集中活动日，各党支部将活动日程序、内容报镇党委预审，经同意后，组织党员参加活动，三是党代表议事日。每季度开展一次，按照有关议事规则、程序和要求，驻村党代表参与村级民主决策、管理和监督，确保议事活动不走过场。四是流动党员活动日。在加强流动党支部管理的同时，积极运用“互联联网+”思维，充分利用“支部建在微信上”，定期发送学习内容，要求流动党员每个月通过微信群向支部汇报工作学习情况。\r\n	&lt;/p&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_village` VALUES ('18', '聂关村', '聂关村位于谯城区大杨镇南部，距镇政府7公里处。沿大立路两侧南北分布，南靠油河，东与城父镇相连，西与师店村相接，北临聂桥村，交通位置十分便利。', '13212345678', '村书记', '33.634358', '115.904478', '11', '&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n	&lt;br /&gt;\r\n&lt;/div&gt;\r\n&lt;div id=&quot;BodyLabel&quot;&gt;\r\n	&lt;p&gt;\r\n		&lt;img title=&quot;聂关村简介图片.jpg&quot; alt=&quot;聂关村简介图片.jpg&quot; src=&quot;http://newoa.ahxf.gov.cn/UploadVillage/ueimage/20170125/6362095209068594149857956.jpg&quot; /&gt; \r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-align:center;&quot;&gt;\r\n		大杨镇聂关村简介\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:43px;&quot;&gt;\r\n		聂关村位于谯城区大杨镇南部，距镇政府7公里处。沿大立路两侧南北分布，南靠油河，东与城父镇相连，西与师店村相接，北临聂桥村，交通位置十分便利。\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:43px;&quot;&gt;\r\n		聂关村下辖16个自然村，24个村民组，耕地面积6840亩。现有人口4563人。现有党员96名，其中女党员26人，流动党员16人。村两委干部9人，大学生村官1人，种植和养殖合作社9个。\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:43px;&quot;&gt;\r\n		聂关村坚持严字当头，创新形式，突出实用实效，营造从严规范的组织生活新常态。将组织生活会和“党员活动日”结合起来，让党员“点菜下单”，鼓励党员参与活动主题设计，开展开放互动式组织生活。严格党员参加组织生活的签到考勤，为每名党员建立了组织生活出勤档案。镇党委除委派党建辅导员现场参与外，还通过数字化阵地建设的“微信管控云平台”实时查看活动开展情况，不定时开展督查。区委组织部也适时通过云平台进行督查。如在5月份开展的“秸秆禁烧我先行”活动中，组织党员走出会议室，一些老党员佩戴党徽，臂带袖标组成禁烧义务监督队，深入到农家小院、田间地头发放宣传材料，现身说法倡导禁烧，在群众中起到很好的鼓舞示范作用。6月份开展的“迎七一，念党恩，话发展”活动中，组织党员开展农业产业结构调整培训，观摩300亩的无花果和600亩的绿化苗木种植基地。七一前夕，组织党员开展结对帮扶送温暖活动，共结对帮扶困难党员7人，困难群众23户，送去慰问金6200元。\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;text-indent:43px;&quot;&gt;\r\n		加强村党员干部的宗旨意识和服务能力的教育培训，带领村干部到兄弟乡镇学习先进典型经验。建立村干部指纹签到值，强化干部坐班制管理，让群众到村部办事见得到人，办得了事。积极争取“一事一议”工程项目，硬化村庄道路，到目前为止村与村之间的路面已经全部修通，方便了群众的出行。利用农业专项治理资金，修渠打井建桥梁，开展高效农田综合治理。引导村民调整产业结构，在种植药材、小辣椒的基础上，扩大绿化树、水果的种植面积。利用油河、洺河水面进行网箱养鱼，利用农业资源丰富的优势，开展畜牧养殖，从而促进了农业增效、农民增收，带动了全村经济的发展。\r\n	&lt;/p&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_village` VALUES ('19', '聂桥村', '聂桥村组建于2006年12月,位于大杨镇以南3公里处，沿大立路两侧东西分布，全村区域面积13761.8亩，耕地面积7999.5亩，辖19个自然村，20个村民组，村内居住1015户，总人口4125人。主产小麦、大豆、棉花、朝天椒等。', '13212345678', '村书记', '33.662163', '115.902173', '11', '&lt;div class=&quot;contain&quot;&gt;\r\n	&lt;div class=&quot;content&quot;&gt;\r\n		&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n			&lt;br /&gt;\r\n		&lt;/div&gt;\r\n		&lt;div id=&quot;BodyLabel&quot;&gt;\r\n			&lt;p&gt;\r\n				&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; \r\n聂桥村组建于2006年12月,位于大杨镇以南3公里处，沿大立路两侧东西分布，全村区域面积13761.8亩，耕地面积7999.5亩，辖19个自然村，20个村民组，村内居住1015户，总人口4125人。主产小麦、大豆、棉花、朝天椒等。 &lt;br /&gt;\r\n&amp;emsp; \r\n村两委坚持科学发展观，认真学习宣传贯彻党在农村的理论、路线、方针、政策。以经济发展为中心，推动各项事业，全面协调发展。\r\n			&lt;/p&gt;\r\n		&lt;/div&gt;\r\n	&lt;/div&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_village` VALUES ('20', '郝屯村', '郝屯行政村辖15个自然村，26个村民组，人口5020人，占地7232亩，党员43名（其中女党员5名），村两委职数6名。\r\n\r\n村级组织活动场所建于2016年6月，砖混一层结构，总面积510㎡，党员活动室面积160㎡。', '13212345678', '村书记', '33.706871', '115.9676', '11', '&lt;div class=&quot;contain&quot;&gt;\r\n	&lt;div class=&quot;content&quot;&gt;\r\n		&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n			&lt;img title=&quot;2.jpg&quot; alt=&quot;2.jpg&quot; src=&quot;http://newwcwy.ahxf.gov.cn/UploadVillage/ueimage/20170815/6363840015010015095547497.jpg&quot; /&gt;\r\n		&lt;/div&gt;\r\n		&lt;div id=&quot;BodyLabel&quot;&gt;\r\n			&lt;p style=&quot;text-align:center;&quot;&gt;\r\n				郝屯行政村辖15个自然村，26个村民组，人口5020人，占地7232亩，党员43名（其中女党员5名），村两委职数6名。\r\n			&lt;/p&gt;\r\n			&lt;p style=&quot;text-align:center;&quot;&gt;\r\n				村级组织活动场所建于2016年6月，砖混一层结构，总面积510㎡，党员活动室面积160㎡。\r\n			&lt;/p&gt;\r\n			&lt;p style=&quot;text-align:center;&quot;&gt;\r\n				村书记：刘家业，1963年11月出生，大专学历，1994年8月入党。\r\n			&lt;/p&gt;\r\n			&lt;p style=&quot;text-align:center;&quot;&gt;\r\n				村主任：李光亮，1963年9月出生，高中学历，2012年6月入党。\r\n			&lt;/p&gt;\r\n		&lt;/div&gt;\r\n	&lt;/div&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_village` VALUES ('21', '韩老家村', '大杨镇韩老家村，辖21个自然村，21个村民组，人口6108，地亩15000亩，党员87名（其中女党员13名），村两委职数7名。', '13212345678', '村书记', '33.717353', '115.893478', '11', '&lt;div class=&quot;contain&quot;&gt;\r\n	&lt;div class=&quot;content&quot;&gt;\r\n		&lt;div class=&quot;tit fb&quot; style=&quot;text-align:center;&quot;&gt;\r\n			大杨镇韩老家村，辖21个自然村，21个村民组，人口6108，地亩15000亩，党员87名（其中女党员13名），村两委职数7名。\r\n		&lt;/div&gt;\r\n		&lt;div id=&quot;BodyLabel&quot;&gt;\r\n			&lt;p&gt;\r\n				村书记，马召辉，1967年12月出生，高中学历，1984年12月入党。\r\n			&lt;/p&gt;\r\n			&lt;p&gt;\r\n				村主任，刘运银，1965年8月出生，初中学历，2011年6月入党。\r\n			&lt;/p&gt;\r\n			&lt;p&gt;\r\n				村级组织活动场所建于2015年7月，砖混二层结构，总面积240㎡，党员活动室面积70㎡。\r\n			&lt;/p&gt;\r\n			&lt;p&gt;\r\n				&lt;img title=&quot;20170923_132813.jpg&quot; alt=&quot;20170923_132813.jpg&quot; src=&quot;http://newwcwy.ahxf.gov.cn/UploadVillage/ueimage/20170923/6364177061419919854349129.jpg&quot; /&gt; \r\n			&lt;/p&gt;\r\n		&lt;/div&gt;\r\n	&lt;/div&gt;\r\n&lt;/div&gt;');
INSERT INTO `qfant_village` VALUES ('22', '双合村', '双合村是由原蒋油行政村和王桥行政村合并而成，人口2424人，土地面积4126亩，是一个典型的农业村，主要种植小麦、大豆、玉米、蔬菜，特别是近几年来，村党支部大力发展蔬菜温室大棚，取得了明显的经济效益。', '0551-5533221', '村书记', '0', '0', '22', '&lt;p style=&quot;text-align:center;background-color:#FFFFFF;font-family:宋体;font-size:14px;&quot;&gt;\r\n	&lt;span style=&quot;font-family:黑体;font-size:24px;&quot;&gt;双合村基本情况&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;background-color:#FFFFFF;font-family:宋体;font-size:14px;&quot;&gt;\r\n	&lt;span style=&quot;font-family:黑体;font-size:24px;&quot;&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;span style=&quot;font-family:仿宋_GB2312;font-size:18px;&quot;&gt;双合村是由原蒋油行政村和王桥行政村合并而成，人口2424人，土地面积4126亩，是一个典型的农业村，主要种植小麦、大豆、玉米、蔬菜，特别是近几年来，村党支部大力发展蔬菜温室大棚，取得了明显的经济效益。&lt;/span&gt;&lt;/span&gt;\r\n&lt;/p&gt;');
INSERT INTO `qfant_village` VALUES ('23', '康达村', '该村地处亳州市谯城区观堂镇的西北角，农产品很畅销，区位优势较为明显。该村现有人口2500多人，党员61人，村干部5人，11个村民组。', '0558-5522344', '村书记', '0', '0', '22', '&lt;p style=&quot;text-align:center;background-color:#FFFFFF;font-family:宋体;font-size:14px;&quot;&gt;\r\n	&lt;span style=&quot;font-family:黑体;font-size:24px;&quot;&gt; &lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;background-color:#FFFFFF;text-indent:2em;font-family:黑体;font-size:29.33px;&quot;&gt;\r\n	&lt;span style=&quot;line-height:45px;font-family:宋体;font-size:20px;&quot;&gt;该村地处亳州市谯城区观堂镇的西北角，农产品很畅销，区位优势较为明显。该村现有人口&lt;span style=&quot;font-size:24px;&quot;&gt;2500&lt;/span&gt;多人，党员&lt;span style=&quot;font-size:24px;&quot;&gt;61&lt;/span&gt;人，村干部&lt;span style=&quot;font-size:24px;&quot;&gt;5&lt;/span&gt;人，&lt;span style=&quot;font-size:24px;&quot;&gt;11&lt;/span&gt;个村民组。&lt;/span&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;background-color:#FFFFFF;text-indent:2em;font-family:黑体;font-size:29.33px;&quot;&gt;\r\n	&lt;span style=&quot;line-height:45px;font-family:宋体;font-size:20px;&quot;&gt;康达村的经济来源以第一产业为主，尤其以农业为重，其中大蒜种植业远近闻名，该村采用大蒜间套的新型种植模式，大大提高土地利用率，节约了成本，而且提高了种植效益，增加了农民的收入。传统的农业种植只能解决吃饭问题，怎样才能让村民增加收入，富裕起来，一直是我们村干部所思考的问题、所寻找的路子。其实康达村有多年种植大蒜的习惯，只是停留在零散经营、规模小上。&lt;/span&gt; \r\n&lt;/p&gt;\r\n&lt;p style=&quot;background-color:#FFFFFF;text-indent:2em;font-family:黑体;font-size:29.33px;&quot;&gt;\r\n	&lt;span style=&quot;line-height:45px;font-family:宋体;font-size:20px;&quot;&gt;近年来，在村两委和村大蒜协会的推动下，大蒜种植规模连年逐步扩大。每年一到大蒜采摘期，本地的经济人和外地的菜贩子们纷纷开着各种各样的运输车，进入村的田间地头，收购大蒜。处处都有他们忙碌的身影，他们收获着希望，点着钞票，脸上乐开了花，充满了欢歌笑语，好一幅新农村丰收美景。日前，康达村村民正在村两委的正确领导下齐头并进迈向小康大道。&lt;/span&gt; \r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;background-color:#FFFFFF;font-family:宋体;font-size:14px;&quot;&gt;\r\n	&lt;span style=&quot;font-family:黑体;font-size:24px;&quot;&gt;&lt;span style=&quot;font-family:仿宋_GB2312;font-size:18px;&quot;&gt;&lt;/span&gt;&lt;/span&gt; \r\n&lt;/p&gt;');
INSERT INTO `qfant_village` VALUES ('24', '孙庄村', '孙庄村，原先是一个落后瘫痪村，近年来，工作一直领先，是全镇学习的好榜样，是后来者居上榜样村。全村由15个自然村组成，共计1320户，人口4580人，土地面积6126亩。近年来，基层组织不断加强，农民生活水平不断提高。村党支部咸长付，工作积极能干部，是个典型的好书记。', '0558-5522544', '村书记', '0', '0', '22', '&lt;p style=&quot;text-align:center;background-color:#FFFFFF;font-family:宋体;font-size:14px;&quot;&gt;\r\n	&lt;span style=&quot;font-family:黑体;font-size:24px;&quot;&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:2em;font-family:黑体;font-size:29.33px;&quot;&gt;\r\n		&lt;span style=&quot;line-height:45px;font-family:宋体;font-size:20px;&quot;&gt;\r\n		&lt;p style=&quot;background-color:#FFFFFF;text-indent:2em;font-family:宋体;font-size:large;&quot;&gt;\r\n			&lt;span style=&quot;line-height:48px;font-size:21px;&quot;&gt;孙庄村，原先是一个落后瘫痪村，近年来，工作一直领先，是全镇学习的好榜样，是后来者居上榜样村。全村由&lt;span style=&quot;font-size:24px;&quot;&gt;15&lt;/span&gt;个自然村组成，共计&lt;span style=&quot;font-size:24px;&quot;&gt;1320&lt;/span&gt;户，人口&lt;span style=&quot;font-size:24px;&quot;&gt;4580&lt;/span&gt;人，土地面积&lt;span style=&quot;font-size:24px;&quot;&gt;6126&lt;/span&gt;亩。近年来，基层组织不断加强，农民生活水平不断提高。村党支部咸长付，工作积极能干部，是个典型的好书记。&lt;/span&gt;\r\n		&lt;/p&gt;\r\n		&lt;p style=&quot;background-color:#FFFFFF;text-indent:2em;font-family:宋体;font-size:large;&quot;&gt;\r\n			&lt;span style=&quot;line-height:48px;font-size:21px;&quot;&gt;组织凝聚力不断增强。该村设立的村党支部，通过&lt;span style=&quot;font-size:24px;&quot;&gt;“&lt;/span&gt;两推一选&lt;span style=&quot;font-size:24px;&quot;&gt;”&lt;/span&gt;选举出村&lt;span style=&quot;font-size:24px;&quot;&gt;“&lt;/span&gt;两委&lt;span style=&quot;font-size:24px;&quot;&gt;”&lt;/span&gt;，现有村干部&lt;span style=&quot;font-size:24px;&quot;&gt;5&lt;/span&gt;名。近年来，建设了占地&lt;span style=&quot;font-size:24px;&quot;&gt;1&lt;/span&gt;亩、建筑面积&lt;span style=&quot;font-size:24px;&quot;&gt;120&lt;/span&gt;多平方米的新村部，新确定双培双带基地两个，建立流动党员支部一个。村&lt;span style=&quot;font-size:24px;&quot;&gt;“&lt;/span&gt;两委&lt;span style=&quot;font-size:24px;&quot;&gt;”&lt;/span&gt;认真开展为民服务全程代理、双培双带、党务村务公开等载体活动，村级组织凝聚力、服务力不断增强。&lt;/span&gt;\r\n		&lt;/p&gt;\r\n		&lt;p style=&quot;background-color:#FFFFFF;text-indent:2em;font-family:宋体;font-size:large;&quot;&gt;\r\n			&lt;span style=&quot;line-height:48px;font-size:21px;&quot;&gt;农业产业结构不断优化。扩大药材和蔬菜种植面积，推广套种模式，充分利用种植的新技术，建成日光温室&lt;span style=&quot;font-size:24px;&quot;&gt;60&lt;/span&gt;亩、阳光棚&lt;span style=&quot;font-size:24px;&quot;&gt;100&lt;/span&gt;余亩，发展规模养鸡、养猪户&lt;span style=&quot;font-size:24px;&quot;&gt;6&lt;/span&gt;户，新修水泥路面&lt;span style=&quot;font-size:24px;&quot;&gt;2000&lt;/span&gt;多米。目前，已形成以大蒜、无籽西瓜、大豆等为主的无公害农产品生产基地&lt;span style=&quot;font-size:24px;&quot;&gt;2000&lt;/span&gt;余亩，人均收入逐年提高。&lt;/span&gt;\r\n		&lt;/p&gt;\r\n		&lt;p style=&quot;background-color:#FFFFFF;text-indent:2em;font-family:宋体;font-size:large;&quot;&gt;\r\n			&lt;span style=&quot;line-height:48px;font-size:21px;&quot;&gt;农民物质文化生活不断丰富。完成了新村规划及土地置换项目，新修建了&lt;span style=&quot;font-size:24px;&quot;&gt;2&lt;/span&gt;千米水泥主干道，初步拉起了观南社区框架。建设了村卫生服务站，农民参合率达到&lt;span style=&quot;font-size:24px;&quot;&gt;93%&lt;/span&gt;。建设了&lt;span style=&quot;font-size:24px;&quot;&gt;60&lt;/span&gt;多平方米的农民文化体活动健身中心，开通了农村党员远程教育，购置图书&lt;span style=&quot;font-size:24px;&quot;&gt;3200&lt;/span&gt;余册，农民物质文化生活持续改善。&lt;/span&gt;\r\n		&lt;/p&gt;\r\n		&lt;p style=&quot;background-color:#FFFFFF;text-indent:2em;font-family:宋体;font-size:large;&quot;&gt;\r\n			&lt;span style=&quot;line-height:48px;font-size:21px;&quot;&gt;2011&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-size:21px;&quot;&gt;年以来，观堂村党支部在各级党委的正确领导下，认真贯彻落实科学发展观，积极深入开展创先争优活动，切实落实中央和省十个关于建立保持共产党员先进性长效机制的文件精神，进一步增强了党支部的凝聚力好号召力，有力地促进了观堂村经济和社会的繁荣与发展。&lt;/span&gt;\r\n		&lt;/p&gt;\r\n&lt;/span&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:2em;font-family:黑体;font-size:29.33px;&quot;&gt;\r\n		&lt;span style=&quot;line-height:45px;font-family:宋体;font-size:20px;&quot;&gt;&lt;/span&gt;\r\n	&lt;/p&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;background-color:#FFFFFF;font-family:宋体;font-size:14px;&quot;&gt;\r\n	&lt;span style=&quot;font-family:黑体;font-size:24px;&quot;&gt;&lt;span style=&quot;font-family:仿宋_GB2312;font-size:18px;&quot;&gt;&lt;/span&gt;&lt;/span&gt;\r\n&lt;/p&gt;');
INSERT INTO `qfant_village` VALUES ('25', '郭庄村', '观堂镇郭庄村地处观堂镇西北方向，距观堂镇政府所在地10公里，交通方便，由村部向南直通谯观公路。郭庄村是由原大蒋行政村、丁村行政村、郭李行政村合并而成。郭庄行政村东谯陵寺村，南邻张庄村，西北与谯东镇辖区为邻。辖中吕庄、李八庄、庄吕庄、李架庄、王庄、李楼、权桥、黄庄、大蒋庄、杨庄、刘庄、于庄、贾庄、王庄、闫楼、瓜子坑、小刘庄、郭庄、李庄等19个自然村组。现有农户1086户，有乡村人口3718人，其中农业人口2338人，劳动力1380 人，其中从事第一产业人数921人。郭庄村以种植粮食、大豆、蔬菜等农作物为主，同时以大棚蔬菜种植为该村的特色经济。全村耕地面积2,129.40亩，人均耕地0.91亩。2010年全村农民人均纯收入4724.00元。', '0558-5522655', '村书记', '0', '0', '22', '&lt;p style=&quot;background-color:#FFFFFF;text-indent:2em;font-family:宋体;&quot;&gt;\r\n	&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;观堂镇郭庄村地处观堂镇西北方向，距观堂镇政府所在地&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;10&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;公里，交通方便，由村部向南直通谯观公路。郭庄村是由原大蒋行政村、丁村行政村、郭李行政村合并而成。郭庄行政村东谯陵寺村，南邻张庄村，西北与谯东镇辖区为邻。辖中吕庄、李八庄、庄吕庄、李架庄、王庄、李楼、权桥、黄庄、大蒋庄、杨庄、刘庄、于庄、贾庄、王庄、闫楼、瓜子坑、小刘庄、郭庄、李庄等&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;19&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;个自然村组。现有农户&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;1086&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;户，有乡村人口&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;3718&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;人，其中农业人口&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;2338&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;人，劳动力&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;1380&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;人，其中从事第一产业人数&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;921&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;人。&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;郭庄村以种植粮食、大豆、蔬菜等农作物为主，同时以大棚蔬菜种植为该村的特色经济。全村耕地面积&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;2,129.40&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;亩，人均耕地&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;0.91&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;亩。&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;2010&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;年全村农民人均纯收入&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;4724.00&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;元。郭庄村是观堂镇最早种植蔬菜的专业村之一，&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;2000&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;年起，村两委会结合本村实际和群众种植蔬菜经验丰富等优势，决定大力发展蔬菜产业。一是稳定面积，发展设施蔬菜。多年累计建成高效设施大棚&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;59&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;个，占地&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;170&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;亩，每年发展中小弓棚&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;160&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;亩，露地蔬菜面积&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;300&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;亩左右；二是加大科技投入。积极引进新优特新品种，实行温室大棚改土工程，加大有机肥投入，生产的西红柿、黄瓜个大，色艳，无病虫害，个个称得上是纯&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;“&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;绿色食品&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;”&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;。三是组建农民专业合作经济组织。&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;2001&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;年成立了&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;“&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;郭庄村蔬菜专业协会&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;&quot;&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;，多年来在技术指导、农民培训、市场信息上为菜农提供优质服务。四是开展温室大棚水果栽植。现有大棚水果&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;30&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;棚，栽植的大蒜、青椒、茄子等提早&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;45&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;天上市，受到广大消费者的青睐，广大菜农也因此走上致富路。&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;background-color:#FFFFFF;text-indent:2em;font-family:宋体;&quot;&gt;\r\n	&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;该村在&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;“&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;一村一品&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;”&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;主导产业发展上仅仅是个开端，与上级要求还有一定距离，该村两委表示郭庄村将以蔬菜产业化发展为契机，大力发展&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;“&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;一村一品&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;”&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;，引进新技术、新品种，拓宽市场，优化产品结构，创优质名牌，进一步提升主导产业发展水平，力争到&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;“&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;十二五&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;”&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;末全村农民人均纯收入达到&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;8000&lt;/span&gt;&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;元以上。&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;background-color:#FFFFFF;text-indent:2em;font-family:宋体;&quot;&gt;\r\n	&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;实践证明，郭庄村的大棚蔬菜种植，使农户普遍得到实惠，成功经验告诉我们典型引路、推广示范、树立典型、逐步普及、联运带动，发挥本地特色，敢于实践，成功就在脚下。郭庄村作为特色蔬菜村。当前，郭庄村村民在村两委的带领下，正鼓足劲开展新一轮扩展蔬菜面积提高大棚档次行动，切实提高农民的经济效益。&lt;/span&gt;\r\n&lt;/p&gt;');
INSERT INTO `qfant_village` VALUES ('26', '将瓦村', '亳州市谯城区观堂镇蒋瓦民族村，位于观堂集西2公里处，亳观公路横穿全村，交通十分便利。全村人口5010人，其中回族居民3793人，耕地6940亩，下辖16个自然村。近年来，蒋瓦民族村在上级党委政府的正确领导和大力支持下，始终重视民族事业的发展，采取积极有效的措施，大力发展少数民族经济和社会事业，谱写了观堂镇民族团结进步的新篇章。', '0551-5566577', '村书记', '0', '0', '22', '&lt;p style=&quot;background-color:#FFFFFF;text-indent:2em;font-family:宋体;&quot;&gt;\r\n	&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:43px;font-family:仿宋_GB2312;font-size:21.33px;&quot;&gt;\r\n		&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;亳州市谯城区观堂镇蒋瓦民族村，位于观堂集西&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;2&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;公里处，亳观公路横穿全村，交通十分便利。全村人口&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;5010&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;人，其中回族居民&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;3793&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;人，耕地&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;6940&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;亩，下辖&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;16&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;个自然村。近年来，蒋瓦民族村在上级党委政府的正确领导和大力支持下，始终重视民族事业的发展，采取积极有效的措施，大力发展少数民族经济和社会事业，谱写了观堂镇民族团结进步的新篇章。&lt;/span&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:43px;font-family:仿宋_GB2312;font-size:21.33px;&quot;&gt;\r\n		&lt;strong&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;一、民族团结树新风&lt;/span&gt;&lt;/strong&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:43px;font-family:仿宋_GB2312;font-size:21.33px;&quot;&gt;\r\n		&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;&lt;span style=&quot;font-family:Times New Roman;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;蒋瓦民族村回族同胞占近&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;70&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;％，是全镇回族最多的行政村。多年来，镇党委政府把着力选拔培养少数民族干部，尊重少数民族习俗，加强对回汉民族团结进步的教育，以及回族同胞的经济发展和民族团结工作摆上日常工作的重要议事日程。通过宣传党的民族宗教政策，引导、扶持回族同胞发展经济，增加收入，增强了民族团结，共同发展的意识，近年来，没有发生一起民族纠纷和矛盾，树立了良好的团结、进步新风尚，多次受到上级表彰。&lt;/span&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:43px;font-family:仿宋_GB2312;font-size:21.33px;&quot;&gt;\r\n		&lt;strong&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;&lt;span style=&quot;font-family:Times New Roman;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/span&gt;&lt;/strong&gt;&lt;strong&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;二&lt;/span&gt;&lt;/strong&gt;&lt;strong&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;.&lt;/span&gt;&lt;/strong&gt;&lt;strong&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;基础设施大改观&lt;/span&gt;&lt;/strong&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:43px;font-family:仿宋_GB2312;font-size:21.33px;&quot;&gt;\r\n		&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;&lt;span style=&quot;font-family:Times New Roman;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;2008&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;年以来，镇、村加大对该村基础设施的投入，&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;&amp;nbsp;2010&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;年，通过多方筹集资金，建成两条总长&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;4160&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;米的水泥路，为蒋瓦村的村民出行提供了方便。&lt;span style=&quot;font-size:24px;&quot;&gt;2011&lt;/span&gt;年争取省水利厅对口扶持专项资金&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;10&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;万元，修建蒋霍庄至周庄、周庄至村部&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;1500&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;米水泥路，更为该村的经济发展插上了腾飞的翅膀。蒋瓦清真寺的落成，成为蒋瓦村的一大亮点，为回族同胞朝靓及共庆开斋节、古尔邦节活动提供良好、宽松、舒适的场所。&lt;/span&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:43px;font-family:仿宋_GB2312;font-size:21.33px;&quot;&gt;\r\n		&lt;strong&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;&lt;span style=&quot;font-family:Times New Roman;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/span&gt;&lt;/strong&gt;&lt;strong&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;三&lt;/span&gt;&lt;/strong&gt;&lt;strong&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;.&lt;/span&gt;&lt;/strong&gt;&lt;strong&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;经济发展惠村民&lt;/span&gt;&lt;/strong&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:43px;font-family:仿宋_GB2312;font-size:21.33px;&quot;&gt;\r\n		&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;&lt;span style=&quot;font-family:Times New Roman;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;多年来，全村党员干部把强力推进蒋瓦民族村经济发展，作为增强民族团结、增加回族同胞收入的大事来抓，通过技术培训、政策倾斜、引导扶持、协调资金等，想方设法让回族同胞早日富裕起来。&lt;/span&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:43px;font-family:仿宋_GB2312;font-size:21.33px;&quot;&gt;\r\n		&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;&lt;span style=&quot;font-family:Times New Roman;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;1&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;、调高调优种植业&lt;/span&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:43px;font-family:仿宋_GB2312;font-size:21.33px;&quot;&gt;\r\n		&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;&lt;span style=&quot;font-family:Times New Roman;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;通过引导村民调整农业产业结构，增加投入，大力发展优质高效农业。该村蔬菜生产以苔干为主，在蒋瓦，西刘沟，郑庄，李庄等村苔干种植面积达&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;3000&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;亩。中药材生产以白术，白芍为主，全村中药材种植面积近&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;2000&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;亩，效益普遍较好。&lt;/span&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:43px;font-family:仿宋_GB2312;font-size:21.33px;&quot;&gt;\r\n		&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;&lt;span style=&quot;font-family:Times New Roman;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;2&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;．大力发展养殖业&lt;/span&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:43px;font-family:仿宋_GB2312;font-size:21.33px;&quot;&gt;\r\n		&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;&lt;span style=&quot;font-family:Times New Roman;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;蒋瓦民族村充分发挥回族同胞善于养鸡、养牛的优势，镇村干部通过引导、扶持，养殖业不断发展，效益逐年提高。以蒋楼自然村为主的养羊专业村，仅&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;15--50&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;只的养羊户，就发展到&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;22&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;户；以蒋霍庄魏进良为主的养鸡大户就发展到&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;l8&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;户，每户养鸡都在&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;2000&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;只以上，魏进良养鸡&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;20000&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;只，每年出栏肉鸡近&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;1 0&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;万只；蒋瓦自然村的马涛经过几年的不断发展，目前已发展蛋鸽&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;3000&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;多对，并收到较好的经济效益。&lt;/span&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:43px;font-family:仿宋_GB2312;font-size:21.33px;&quot;&gt;\r\n		&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;3&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;、引导发展第三产业&lt;/span&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:43px;font-family:仿宋_GB2312;font-size:21.33px;&quot;&gt;\r\n		&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;&lt;span style=&quot;font-family:Times New Roman;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;蒋瓦民族村两委班子分包到全村&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;16&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;个自然村，充分发挥本村回族同胞善经营、会屠宰、懂加工的优势，积极引导村民屠宰牛羊，农副产品加工，开饭店，跑运输，努力增加第三产业收入。据统计，全村经营第三产业的农户达&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;200&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;多户，其中牛羊屠宰户&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;15&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;户，农副产品加工户&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;50&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;多户，运输户&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;100&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;多户，仅拉土机、挖掘机达&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;80&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;多户。&lt;/span&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:43px;font-family:仿宋_GB2312;font-size:21.33px;&quot;&gt;\r\n		&lt;strong&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;&lt;span style=&quot;font-family:Times New Roman;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/span&gt;&lt;/strong&gt;&lt;strong&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;四、民生工程促繁荣&lt;/span&gt;&lt;/strong&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:43px;font-family:仿宋_GB2312;font-size:21.33px;&quot;&gt;\r\n		&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;&lt;span style=&quot;font-family:Times New Roman;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;去年以来，全村党员干部积极引导、科学规划，高标准建设陈庄、米庄、蒋霍庄等中心村。目前，已完成东刘沟、西刘沟、陈庄、米庄、蒋霍庄等村土地复垦&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;280&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;多亩，米庄陈庄新村&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;400&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;米水泥路已建成，&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;18&lt;/span&gt;&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;户村民建成高标准楼房。蒋瓦民族村多方筹资近百万元，先后建成蒋瓦民族小学、村活动室、卫生室、农家书屋等民生工程，为全村党员学习、活动及村民就医、子女入学提供了极大的便利。&lt;/span&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:43px;font-family:仿宋_GB2312;font-size:21.33px;&quot;&gt;\r\n		&lt;span style=&quot;font-size:21px;&quot;&gt;蒋瓦民族村在上级党委、政府的大力支持下，经济不断发展，村容村貌日新月异，文明程度和村民收入逐年提高，现全村人均纯收入&lt;/span&gt;&lt;span style=&quot;font-size:21px;&quot;&gt;6380&lt;/span&gt;&lt;span style=&quot;font-size:21px;&quot;&gt;元，超过全镇人均收入。&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/span&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:43px;font-family:仿宋_GB2312;font-size:21.33px;&quot;&gt;\r\n		&lt;span style=&quot;font-size:24px;&quot;&gt;2011&lt;/span&gt;&lt;span style=&quot;font-size:21px;&quot;&gt;年以来，在谯城区区委组织部的安排下第四批大学生“村官”王磊同志任职于我村，为我村的各项工作注入了活力。目前，全村在观堂镇委镇政府的坚强领导下正全面认真贯彻落实党的十八大精神，发挥党员的先进性保持党员的纯洁性，致力于打造“和谐蒋瓦、幸福蒋瓦”的社会主义新农村理念，以崭新的姿态促进蒋瓦美好乡村建设。&lt;/span&gt;\r\n	&lt;/p&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;background-color:#FFFFFF;text-indent:2em;font-family:宋体;&quot;&gt;\r\n	&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;&lt;/span&gt;\r\n&lt;/p&gt;');
INSERT INTO `qfant_village` VALUES ('27', '高杨村', '高杨村位于亳州市谯城区观堂镇东南3公里处，地理位置优越，环境优美，因距观堂集镇较近，极大地方便了群众出行和贸易。全村共有高杨庄、周庄、陈庄、高庄、康庄、陈老家、张刘庄、王双庙、徐楼、张小庄、王小楼、燕庄、王小庄、马古洞、王各、大吕庄、吕庄户、赵庄、前焦庄、后焦、张庄、李河等22民小组，户籍人口5050人，1563户。', '0558-5577899', '村书记', '0', '0', '22', '&lt;p style=&quot;background-color:#FFFFFF;text-indent:2em;font-family:宋体;&quot;&gt;\r\n	&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:43px;font-family:仿宋_GB2312;font-size:21.33px;&quot;&gt;\r\n		&lt;span style=&quot;line-height:42.66px;font-size:21px;&quot;&gt;\r\n		&lt;p style=&quot;background-color:#FFFFFF;text-indent:2em;font-family:宋体;&quot;&gt;\r\n			&lt;span style=&quot;line-height:48px;font-family:楷体_GB2312;font-size:21px;&quot;&gt;高杨村位于亳州市谯城区观堂镇东南&lt;span style=&quot;font-size:24px;&quot;&gt;3&lt;/span&gt;公里处，地理位置优越，环境优美，因距观堂集镇较近，极大地方便了群众出行和贸易。全村共有高杨庄、周庄、陈庄、高庄、康庄、陈老家、张刘庄、王双庙、徐楼、张小庄、王小楼、燕庄、王小庄、马古洞、王各、大吕庄、吕庄户、赵庄、前焦庄、后焦、张庄、李河等&lt;span style=&quot;font-size:24px;&quot;&gt;22&lt;/span&gt;民小组，户籍人口&lt;span style=&quot;font-size:24px;&quot;&gt;5050&lt;/span&gt;人，&lt;span style=&quot;font-size:24px;&quot;&gt;1563&lt;/span&gt;户。&lt;/span&gt;\r\n		&lt;/p&gt;\r\n		&lt;p style=&quot;background-color:#FFFFFF;text-indent:2em;font-family:宋体;&quot;&gt;\r\n			&lt;span style=&quot;line-height:48px;font-family:楷体_GB2312;font-size:21px;&quot;&gt;过去，高杨村以农业种植为主，主要农作物为小麦，玉米，大豆。经过十多年的发展，高杨村经济得到了有效转型。目前，高杨村虽主要以农业为主，但畜牧业和药材种植业有效地推动了高杨村的经济转型，实现了规模化种植和养殖，有力地促进了村民的经济增长，为高杨村的后续经济发展打下了基础。&lt;/span&gt;\r\n		&lt;/p&gt;\r\n		&lt;p style=&quot;background-color:#FFFFFF;text-indent:2em;font-family:宋体;&quot;&gt;\r\n			&lt;span style=&quot;line-height:48px;font-family:楷体_GB2312;font-size:21px;&quot;&gt;近年来，村两委致力于开展“双培双带”工程。一是加强党员干部能力的培养，发挥村干部的影响力。在开展“双培双带”活动中，村党支部十分重视党员队伍能力素质的提高，把提高引领群众致富能力作为自身能力建设的重点，将其作为引导党员发挥作用的有效保障。二是重视群众发展，引导群众共同致富。首先成立党员科技服务组，组织具有养殖经验的党员系统学习种养技术，提高他们的技术水平，为群众提供无偿的技术服务和技术保障。其次是组织营销队伍，解决养殖户的销售问题。第三是开展“五户联保”，解决资金资金问题。针对个别党员群众缺乏投资资金问题，村党支部积极与金融机构联系，发动党员以“五户联保”的方式，帮助群众解决资金问题。目前，高杨村的广大干部群众正在积极努力，力争在十二五开局之年创造出新的业绩。&lt;/span&gt;\r\n		&lt;/p&gt;\r\n		&lt;p style=&quot;background-color:#FFFFFF;text-indent:2em;font-family:宋体;&quot;&gt;\r\n			&lt;span style=&quot;line-height:48px;font-family:楷体_GB2312;font-size:21px;&quot;&gt;除此之外，高杨村坚持以人为本的工作理念，积极打造宜居环境，现今，高杨村两委积极努力，多方想办法，改善村内的公共设施齐全，依托农村农民体育运动工程，开辟了村内的体育运动场，为群众提供了一个休闲娱乐的好去处。也为发展高杨村体育文化事业奠定了基础。同时高杨村积极用足用活各项的社会保障政策，积极宣传新农保，新农合相关政策，引导农民参保、参合，进一步完善社会救助体系，对有困难的群众，落实好各项的帮扶，特别是认真落实好低保政策、医疗救助政策，真正用足用活政策去帮扶群众解决生产、生活方面的问题&lt;span style=&quot;font-size:24px;&quot;&gt;,&lt;/span&gt;使群众得到真正的实惠。&lt;/span&gt;\r\n		&lt;/p&gt;\r\n&lt;/span&gt;\r\n	&lt;/p&gt;\r\n	&lt;p style=&quot;background-color:#FFFFFF;text-indent:43px;font-family:仿宋_GB2312;font-size:21.33px;&quot;&gt;\r\n		&lt;span style=&quot;font-size:24px;&quot;&gt;&lt;/span&gt;&lt;span style=&quot;font-size:21px;&quot;&gt;&lt;/span&gt;\r\n	&lt;/p&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;background-color:#FFFFFF;text-indent:2em;font-family:宋体;&quot;&gt;\r\n	&lt;span style=&quot;line-height:48px;font-family:仿宋_GB2312;font-size:21px;&quot;&gt;&lt;/span&gt;\r\n&lt;/p&gt;');
INSERT INTO `qfant_village` VALUES ('28', '23', '2341132', '243234', '23423423', '32', '42', '11', null);
