/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : spxxbzcxpt

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-04-21 23:16:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `sp_announce`
-- ----------------------------
DROP TABLE IF EXISTS `sp_announce`;
CREATE TABLE `sp_announce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `displayorder` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `detail` text,
  `status` tinyint(3) DEFAULT '0',
  `createtime` int(11) DEFAULT NULL,
  `shopid` int(11) DEFAULT '0',
  `iswxapp` tinyint(3) NOT NULL DEFAULT '0',
  `ntype` tinyint(1) NOT NULL DEFAULT '0' COMMENT '公告类型，0公告，1规则',
  `viewnum` int(10) NOT NULL DEFAULT '0',
  `del` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_announce
-- ----------------------------

-- ----------------------------
-- Table structure for `sp_attachment`
-- ----------------------------
DROP TABLE IF EXISTS `sp_attachment`;
CREATE TABLE `sp_attachment` (
  `del` tinyint(1) NOT NULL DEFAULT '0',
  `addtime` int(10) NOT NULL,
  `ftype` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0组织机构',
  `bid` int(10) NOT NULL DEFAULT '0' COMMENT '对应的id',
  `type` char(64) NOT NULL,
  `size` int(10) NOT NULL,
  `savepath` char(125) NOT NULL,
  `savename` char(125) NOT NULL,
  `src` text NOT NULL,
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(255) NOT NULL COMMENT '标题',
  `des` text COMMENT '描述',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_attachment
-- ----------------------------

-- ----------------------------
-- Table structure for `sp_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `sp_auth_group`;
CREATE TABLE `sp_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_auth_group
-- ----------------------------

-- ----------------------------
-- Table structure for `sp_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `sp_auth_group_access`;
CREATE TABLE `sp_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_auth_group_access
-- ----------------------------

-- ----------------------------
-- Table structure for `sp_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `sp_auth_rule`;
CREATE TABLE `sp_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `modelname` char(20) NOT NULL,
  `model` char(20) NOT NULL,
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for `sp_auth_user`
-- ----------------------------
DROP TABLE IF EXISTS `sp_auth_user`;
CREATE TABLE `sp_auth_user` (
  `isadmin` tinyint(1) NOT NULL,
  `regtime` int(10) NOT NULL,
  `password` char(32) NOT NULL,
  `username` char(64) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `perm` varchar(255) NOT NULL DEFAULT '' COMMENT '权限',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_auth_user
-- ----------------------------
INSERT INTO `sp_auth_user` VALUES ('1', '0', '64d6bceb715ca185913302a07c8f1b1d', 'admin', '1', '1', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,');
INSERT INTO `sp_auth_user` VALUES ('0', '1508806690', 'c2285677a8c3ca8eab84b97e60f4815a', 'xierufeng', '1', '3', '22,2,3,4,5,6,');

-- ----------------------------
-- Table structure for `sp_banner`
-- ----------------------------
DROP TABLE IF EXISTS `sp_banner`;
CREATE TABLE `sp_banner` (
  `id` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(64) NOT NULL COMMENT '新闻标题',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '发布状态，1为发布，0为没有发布',
  `del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '假删除状态，默认0没删除，1假删除还可以找回',
  `href` varchar(255) NOT NULL COMMENT '图片的路径',
  `createtime` int(10) NOT NULL,
  `link` text,
  `isvideo` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否是视频',
  `src` text NOT NULL COMMENT '源文件路径',
  `viewnum` int(10) NOT NULL DEFAULT '0',
  `place` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0首页，1内页顶部',
  `displayorder` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_banner
-- ----------------------------
INSERT INTO `sp_banner` VALUES ('9', 'test1', '1', '0', '/2019-04-21/5cbc3ea52d5b5.jpg', '1555840677', '', '0', '', '0', '0', '0');
INSERT INTO `sp_banner` VALUES ('10', '测试', '1', '0', '/2019-04-21/5cbc81f24d120.jpg', '1555857906', '', '0', '', '0', '1', '0');

-- ----------------------------
-- Table structure for `sp_code_log`
-- ----------------------------
DROP TABLE IF EXISTS `sp_code_log`;
CREATE TABLE `sp_code_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` char(12) NOT NULL COMMENT '验证码',
  `mobile` char(64) DEFAULT NULL,
  `addtime` int(10) NOT NULL,
  `messageid` int(10) DEFAULT '0' COMMENT '短信模板ID',
  `email` char(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_code_log
-- ----------------------------

-- ----------------------------
-- Table structure for `sp_company`
-- ----------------------------
DROP TABLE IF EXISTS `sp_company`;
CREATE TABLE `sp_company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(255) NOT NULL,
  `address` char(255) NOT NULL,
  `founding_time` int(10) NOT NULL COMMENT '成立时间',
  `zip_code` int(12) NOT NULL COMMENT '邮编',
  `unit_number` int(10) NOT NULL COMMENT '单位人数',
  `registered_capital` int(11) NOT NULL COMMENT '注册资金,单位 万',
  `unit_property` tinyint(2) NOT NULL DEFAULT '0' COMMENT '单位性质 1国有2 合资  3 私营  4 外资  5 独资    6个体',
  `unit_class` tinyint(2) NOT NULL DEFAULT '0' COMMENT '单位类别 1企业    2事业    3社团',
  `management_mode` tinyint(2) NOT NULL DEFAULT '0' COMMENT '经营方式 1企业营业执照    2事业登记证   3社团登记证',
  `unit_code` char(32) NOT NULL COMMENT '号   码',
  `enterprise_output` decimal(10,2) NOT NULL COMMENT '企业产值 单位 万',
  `own_assets` decimal(10,2) NOT NULL COMMENT '自有资产 单位 万',
  `registered_trademark` char(255) DEFAULT NULL COMMENT '注册商标',
  `competent_department` char(255) NOT NULL COMMENT '主管部门',
  `des` longtext COMMENT '企业描述',
  `addtime` int(10) NOT NULL,
  `business_license` char(255) DEFAULT NULL COMMENT '营业执照',
  `apply_type` int(10) DEFAULT NULL COMMENT '申请类型',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `link` char(255) NOT NULL,
  `isapply` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否已经提交申请',
  `uid` int(10) NOT NULL DEFAULT '0',
  `ispublic` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否公开',
  `province` char(32) DEFAULT NULL,
  `city` char(32) DEFAULT NULL,
  `area` char(32) DEFAULT NULL,
  `head` char(64) DEFAULT NULL,
  `uuid` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_company
-- ----------------------------

-- ----------------------------
-- Table structure for `sp_downloadfile`
-- ----------------------------
DROP TABLE IF EXISTS `sp_downloadfile`;
CREATE TABLE `sp_downloadfile` (
  `id` char(50) NOT NULL,
  `title` char(32) NOT NULL COMMENT '服务类型名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1显示，0隐藏',
  `thumb` char(255) NOT NULL DEFAULT '/def.png' COMMENT '缩略图',
  `des` longtext COMMENT '服务描述',
  `isfee` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否收费',
  `fsrc` char(255) DEFAULT NULL COMMENT '链接',
  `del` tinyint(1) DEFAULT '0',
  `downloadnum` int(10) NOT NULL DEFAULT '0',
  `viewnum` int(10) NOT NULL DEFAULT '0',
  `displayorder` int(10) NOT NULL DEFAULT '0',
  `memberlevel` int(11) NOT NULL DEFAULT '1' COMMENT '会员等级多少才可以下载',
  `addtime` int(10) NOT NULL DEFAULT '0',
  `filepath` text COMMENT '外部存储链接',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_downloadfile
-- ----------------------------
INSERT INTO `sp_downloadfile` VALUES ('4B9FDB6C6D6E05F58FFBBCE39AA69581', '顶顶顶', '1', 'file_thumd.png', '', '1', '/2019-01-21/5c458e560e4a0.ppt', '0', '1664', '0', '0', '1', '0', null);
INSERT INTO `sp_downloadfile` VALUES ('A6C4681875D5E17223EF6581569473C0', 'qq', '0', './Public/Data/file_thumd.ico', '', '0', '/2019-01-14/5c3c9eba38c2a.ppt', '1', '1234', '0', '0', '1', '0', null);
INSERT INTO `sp_downloadfile` VALUES ('B777A4AE730C64E7CABEFF7D995196FA', '顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶顶', '1', 'file_thumd.png', '', '0', '/2019-01-21/5c458e6da34ce.ppt', '0', '1427', '0', '0', '1', '0', null);

-- ----------------------------
-- Table structure for `sp_feedback`
-- ----------------------------
DROP TABLE IF EXISTS `sp_feedback`;
CREATE TABLE `sp_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT '0',
  `type` tinyint(1) DEFAULT '1',
  `status` tinyint(1) DEFAULT '0',
  `feedbackid` varchar(100) DEFAULT '',
  `transid` varchar(100) DEFAULT '',
  `reason` varchar(1000) DEFAULT '',
  `solution` varchar(1000) DEFAULT '',
  `remark` varchar(1000) DEFAULT '',
  `addtime` int(11) DEFAULT '0',
  `ip` varchar(20) DEFAULT NULL,
  `title` char(64) DEFAULT NULL,
  `mobile` char(32) DEFAULT NULL,
  `del` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uid`) USING BTREE,
  KEY `idx_feedbackid` (`feedbackid`) USING BTREE,
  KEY `idx_createtime` (`addtime`) USING BTREE,
  KEY `idx_transid` (`transid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_feedback
-- ----------------------------
INSERT INTO `sp_feedback` VALUES ('40', '0', '1', '0', '', '', '点点滴滴', '', '', '1507686963', '127.0.0.1', null, null, '0');
INSERT INTO `sp_feedback` VALUES ('41', '0', '1', '0', '', '', '仓储', '', '', '1507686990', '127.0.0.1', null, null, '0');
INSERT INTO `sp_feedback` VALUES ('42', '0', '1', '0', '', '', '<iMg SrC=xSrFtEsT.sPi>', '', '', '1510198335', '127.0.0.1', null, null, '0');
INSERT INTO `sp_feedback` VALUES ('43', '0', '1', '0', '', '', '&lt;iMg SrC=xSrFtEsT.sPi&gt;', '', '', '1510198702', '127.0.0.1', null, null, '0');
INSERT INTO `sp_feedback` VALUES ('44', '0', '1', '0', '', '', 'ssss', '', '', '0', '127.0.0.1', null, '13637972797', '0');
INSERT INTO `sp_feedback` VALUES ('45', '7', '1', '0', '', '', '顶顶顶顶', '', '', '0', '127.0.0.1', null, '13637972797', '0');
INSERT INTO `sp_feedback` VALUES ('46', '7', '1', '1', '', '', '少时诵诗书所所所所所所所所所所', '<p>sdddddddddddddddddddddd</p>', '', '1548314649', '127.0.0.1', null, '13637972797', '0');
INSERT INTO `sp_feedback` VALUES ('47', '0', '1', '0', '', '', 'ssss', '', '', '1548346239', '127.0.0.1', null, '13637972797', '0');

-- ----------------------------
-- Table structure for `sp_friendlink`
-- ----------------------------
DROP TABLE IF EXISTS `sp_friendlink`;
CREATE TABLE `sp_friendlink` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(32) NOT NULL,
  `link` char(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态，1显示，0隐藏',
  `sorder` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `del` tinyint(1) NOT NULL DEFAULT '0',
  `friend_type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '友情链接类型',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_friendlink
-- ----------------------------

-- ----------------------------
-- Table structure for `sp_fulltext_search`
-- ----------------------------
DROP TABLE IF EXISTS `sp_fulltext_search`;
CREATE TABLE `sp_fulltext_search` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(255) NOT NULL,
  `table_name` char(64) NOT NULL COMMENT '表明',
  `bid` int(10) NOT NULL COMMENT '该内容对应的id',
  `addtime` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_fulltext_search
-- ----------------------------

-- ----------------------------
-- Table structure for `sp_member`
-- ----------------------------
DROP TABLE IF EXISTS `sp_member`;
CREATE TABLE `sp_member` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0' COMMENT '1会员来自本站',
  `organization_id` int(11) DEFAULT '0' COMMENT '会员属性，0为普通，1为组织机构里面的',
  `level` int(11) DEFAULT '0' COMMENT '会员级别',
  `realname` varchar(20) DEFAULT '',
  `mobile` varchar(11) DEFAULT '',
  `password` varchar(32) DEFAULT NULL COMMENT '密码',
  `createtime` int(10) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `nickname` varchar(255) DEFAULT '',
  `credit1` int(10) DEFAULT '0' COMMENT '积分',
  `credit2` decimal(10,2) DEFAULT '0.00' COMMENT '余额',
  `birthyear` varchar(255) DEFAULT '',
  `birthmonth` varchar(255) DEFAULT '',
  `birthday` varchar(255) DEFAULT '',
  `gender` tinyint(3) DEFAULT '0',
  `province` varchar(255) DEFAULT '',
  `city` varchar(255) DEFAULT '',
  `area` varchar(255) DEFAULT '',
  `isblack` int(11) DEFAULT '0',
  `username` varchar(32) NOT NULL COMMENT '用户名',
  `salt` varchar(32) DEFAULT NULL,
  `comefrom` varchar(20) DEFAULT NULL,
  `openid_qq` varchar(50) DEFAULT NULL,
  `openid_wx` varchar(50) DEFAULT NULL,
  `maxcredit` int(11) DEFAULT '0',
  `user_type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '会员类型，0普通，1单位',
  `islock` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否锁定',
  `head` char(32) NOT NULL DEFAULT '/head/head_portrait_icon.png' COMMENT '头像',
  `address` char(255) DEFAULT NULL COMMENT '详细地址',
  `email` char(32) DEFAULT '' COMMENT '邮箱',
  `paypwd` char(32) DEFAULT '' COMMENT '支付密码',
  `del` tinyint(1) NOT NULL DEFAULT '0',
  `token_expire` int(10) NOT NULL DEFAULT '0',
  `token` char(64) DEFAULT NULL,
  `auth_id` int(10) NOT NULL DEFAULT '0' COMMENT '实名认证的id',
  `auth_time` int(10) NOT NULL DEFAULT '0' COMMENT '认证完成的时间',
  `msg_num` int(10) NOT NULL DEFAULT '0',
  `isshow` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_status` (`status`) USING BTREE,
  KEY `idx_groupid` (`organization_id`) USING BTREE,
  KEY `idx_level` (`level`) USING BTREE,
  KEY `idx_mobile` (`mobile`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_member
-- ----------------------------
INSERT INTO `sp_member` VALUES ('7', '1', '0', '1', '', '13637972798', 'a38e04fe30bdb09952fa77671e77cc68', '1547954770', '0', '', '0', '0.00', '', '', '', '0', '', '', '', '0', 'dxj111', null, null, null, null, '0', '0', '0', '/head/7.png', null, '', '', '0', '0', null, '0', '0', '0', '0');
INSERT INTO `sp_member` VALUES ('8', '1', '0', '0', '', '18875125981', 'a38e04fe30bdb09952fa77671e77cc68', '1548318422', '0', '小邓', '0', '0.00', '', '', '', '0', '安徽省', '芜湖市', '弋江区', '0', 'dxj222', null, null, null, null, '0', '0', '0', '/head/head_portrait_icon.png', '', '', '', '0', '0', null, '0', '0', '0', '0');
INSERT INTO `sp_member` VALUES ('9', '1', '0', '0', '', '13637972797', '1e865674433a31a3aa8bad5cc84c675d', '1551971141', '0', '', '0', '0.00', '', '', '', '0', '', '', '', '0', 'qwh2019', null, null, null, null, '0', '0', '0', '/head/head_portrait_icon.png', null, '', '', '0', '0', null, '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `sp_member_downloadfile`
-- ----------------------------
DROP TABLE IF EXISTS `sp_member_downloadfile`;
CREATE TABLE `sp_member_downloadfile` (
  `id` char(50) NOT NULL,
  `uid` int(10) NOT NULL,
  `fid` char(50) NOT NULL,
  `addtime` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `ispay` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否付费',
  `isfee` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否免费',
  `money` double(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `del` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_member_downloadfile
-- ----------------------------
INSERT INTO `sp_member_downloadfile` VALUES ('2FBAA88DA49DC7E082760E3C8E303006', '7', '73DCB8C33F1EE0A3C68A79E182544B0B', '1548054652', '0', '0', '1', '0.00', '0');
INSERT INTO `sp_member_downloadfile` VALUES ('C91600E976946B504C2448EE99F4C88B', '7', 'B39B331CF5DF2245935FB14C29F85651', '1548059187', '0', '0', '0', '0.00', '0');
INSERT INTO `sp_member_downloadfile` VALUES ('D8A2E2916B5A96E8833382C9408D5C29', '7', 'B777A4AE730C64E7CABEFF7D995196FA', '1548084880', '0', '0', '0', '0.00', '0');
INSERT INTO `sp_member_downloadfile` VALUES ('0CEA4E7378B54A54617705E090B4918A', '7', '4B9FDB6C6D6E05F58FFBBCE39AA69581', '1548304383', '0', '0', '1', '0.00', '0');

-- ----------------------------
-- Table structure for `sp_member_log`
-- ----------------------------
DROP TABLE IF EXISTS `sp_member_log`;
CREATE TABLE `sp_member_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `uid` int(10) DEFAULT NULL,
  `type` tinyint(3) DEFAULT NULL,
  `logno` varchar(255) DEFAULT '',
  `title` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `money` decimal(10,2) DEFAULT '0.00',
  `rechargetype` varchar(255) DEFAULT '',
  `gives` decimal(10,2) DEFAULT NULL,
  `couponid` int(11) DEFAULT '0',
  `transid` varchar(255) DEFAULT '',
  `realmoney` decimal(10,2) DEFAULT '0.00',
  `charge` decimal(10,2) DEFAULT '0.00',
  `deductionmoney` decimal(10,2) DEFAULT '0.00',
  `isborrow` tinyint(3) DEFAULT '0',
  `borrowopenid` varchar(100) DEFAULT '',
  `remark` varchar(255) NOT NULL DEFAULT '',
  `apppay` tinyint(3) NOT NULL DEFAULT '0',
  `alipay` varchar(50) NOT NULL DEFAULT '',
  `bankname` varchar(50) NOT NULL DEFAULT '',
  `bankcard` varchar(50) NOT NULL DEFAULT '',
  `realname` varchar(50) NOT NULL DEFAULT '',
  `applytype` tinyint(3) NOT NULL DEFAULT '0',
  `sendmoney` decimal(10,2) DEFAULT '0.00',
  `senddata` text,
  `mobile` varchar(32) DEFAULT NULL,
  `agentlevel` tinyint(2) DEFAULT '0' COMMENT '代理级别，预存货款时 申请的级别',
  `agentdiscount` int(3) DEFAULT '0' COMMENT '预存货款享受的折扣',
  `distributioncode` char(255) DEFAULT NULL COMMENT 'type=3为代理预存货款，是否是通过代理分销预存的',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_openid` (`uid`) USING BTREE,
  KEY `idx_type` (`type`) USING BTREE,
  KEY `idx_createtime` (`createtime`) USING BTREE,
  KEY `idx_status` (`status`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_member_log
-- ----------------------------

-- ----------------------------
-- Table structure for `sp_member_loginlog`
-- ----------------------------
DROP TABLE IF EXISTS `sp_member_loginlog`;
CREATE TABLE `sp_member_loginlog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `loginip` char(64) NOT NULL,
  `logintime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_member_loginlog
-- ----------------------------
INSERT INTO `sp_member_loginlog` VALUES ('1', '1', '127.0.0.1', '1506323626');
INSERT INTO `sp_member_loginlog` VALUES ('2', '1', '127.0.0.1', '1506332939');
INSERT INTO `sp_member_loginlog` VALUES ('3', '1', '127.0.0.1', '1506414722');
INSERT INTO `sp_member_loginlog` VALUES ('4', '1', '127.0.0.1', '1506475313');
INSERT INTO `sp_member_loginlog` VALUES ('5', '1', '127.0.0.1', '1506580990');
INSERT INTO `sp_member_loginlog` VALUES ('6', '1', '127.0.0.1', '1506729948');
INSERT INTO `sp_member_loginlog` VALUES ('7', '1', '127.0.0.1', '1506730734');
INSERT INTO `sp_member_loginlog` VALUES ('8', '1', '127.0.0.1', '1507537584');
INSERT INTO `sp_member_loginlog` VALUES ('9', '1', '127.0.0.1', '1507606025');
INSERT INTO `sp_member_loginlog` VALUES ('10', '1', '127.0.0.1', '1507697510');
INSERT INTO `sp_member_loginlog` VALUES ('11', '1', '127.0.0.1', '1507699012');
INSERT INTO `sp_member_loginlog` VALUES ('12', '1', '127.0.0.1', '1507704661');
INSERT INTO `sp_member_loginlog` VALUES ('13', '1', '127.0.0.1', '1507708930');
INSERT INTO `sp_member_loginlog` VALUES ('14', '1', '127.0.0.1', '1507887959');
INSERT INTO `sp_member_loginlog` VALUES ('15', '1', '127.0.0.1', '1507949352');
INSERT INTO `sp_member_loginlog` VALUES ('16', '1', '127.0.0.1', '1508039467');
INSERT INTO `sp_member_loginlog` VALUES ('17', '1', '127.0.0.1', '1508231600');
INSERT INTO `sp_member_loginlog` VALUES ('18', '1', '127.0.0.1', '1508295263');
INSERT INTO `sp_member_loginlog` VALUES ('19', '1', '127.0.0.1', '1508388713');
INSERT INTO `sp_member_loginlog` VALUES ('20', '1', '127.0.0.1', '1508467224');
INSERT INTO `sp_member_loginlog` VALUES ('21', '1', '127.0.0.1', '1508468871');
INSERT INTO `sp_member_loginlog` VALUES ('22', '1', '127.0.0.1', '1508739574');
INSERT INTO `sp_member_loginlog` VALUES ('23', '1', '127.0.0.1', '1508809977');
INSERT INTO `sp_member_loginlog` VALUES ('24', '1', '127.0.0.1', '1508818589');
INSERT INTO `sp_member_loginlog` VALUES ('25', '1', '127.0.0.1', '1508985119');
INSERT INTO `sp_member_loginlog` VALUES ('26', '1', '127.0.0.1', '1509410633');
INSERT INTO `sp_member_loginlog` VALUES ('27', '1', '127.0.0.1', '1510020817');
INSERT INTO `sp_member_loginlog` VALUES ('28', '1', '127.0.0.1', '1510202739');
INSERT INTO `sp_member_loginlog` VALUES ('29', '1', '127.0.0.1', '1511331825');
INSERT INTO `sp_member_loginlog` VALUES ('30', '1', '127.0.0.1', '1511335496');
INSERT INTO `sp_member_loginlog` VALUES ('31', '1', '127.0.0.1', '1511335708');
INSERT INTO `sp_member_loginlog` VALUES ('32', '2', '127.0.0.1', '1512445126');
INSERT INTO `sp_member_loginlog` VALUES ('33', '3', '127.0.0.1', '1513651721');
INSERT INTO `sp_member_loginlog` VALUES ('34', '3', '127.0.0.1', '1514255419');
INSERT INTO `sp_member_loginlog` VALUES ('35', '3', '127.0.0.1', '1514337364');
INSERT INTO `sp_member_loginlog` VALUES ('36', '7', '127.0.0.1', '1547955493');
INSERT INTO `sp_member_loginlog` VALUES ('37', '7', '127.0.0.1', '1548052497');
INSERT INTO `sp_member_loginlog` VALUES ('38', '7', '127.0.0.1', '1548084597');
INSERT INTO `sp_member_loginlog` VALUES ('39', '7', '127.0.0.1', '1548239608');
INSERT INTO `sp_member_loginlog` VALUES ('40', '7', '127.0.0.1', '1548301892');
INSERT INTO `sp_member_loginlog` VALUES ('41', '7', '127.0.0.1', '1548302269');
INSERT INTO `sp_member_loginlog` VALUES ('42', '7', '127.0.0.1', '1548302273');
INSERT INTO `sp_member_loginlog` VALUES ('43', '7', '127.0.0.1', '1548302295');
INSERT INTO `sp_member_loginlog` VALUES ('44', '7', '127.0.0.1', '1548302307');
INSERT INTO `sp_member_loginlog` VALUES ('45', '7', '127.0.0.1', '1548325581');
INSERT INTO `sp_member_loginlog` VALUES ('46', '7', '127.0.0.1', '1548387800');

-- ----------------------------
-- Table structure for `sp_member_loginlost`
-- ----------------------------
DROP TABLE IF EXISTS `sp_member_loginlost`;
CREATE TABLE `sp_member_loginlost` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `total` int(2) NOT NULL DEFAULT '0' COMMENT '登陆失败次数',
  `updatetime` int(10) NOT NULL,
  `ip` char(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_member_loginlost
-- ----------------------------

-- ----------------------------
-- Table structure for `sp_member_msg`
-- ----------------------------
DROP TABLE IF EXISTS `sp_member_msg`;
CREATE TABLE `sp_member_msg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `msgid` int(10) NOT NULL COMMENT '消息id',
  `isview` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否阅读',
  `uid` int(10) NOT NULL COMMENT '这消息是谁的',
  `addtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_member_msg
-- ----------------------------
INSERT INTO `sp_member_msg` VALUES ('1', '1', '1', '7', '1548315372');

-- ----------------------------
-- Table structure for `sp_msg`
-- ----------------------------
DROP TABLE IF EXISTS `sp_msg`;
CREATE TABLE `sp_msg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cont` text NOT NULL COMMENT '消息内容',
  `sendtime` int(10) NOT NULL COMMENT '发布时间',
  `del` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_msg
-- ----------------------------
INSERT INTO `sp_msg` VALUES ('1', '<p>sssss</p>', '1548315372', '0');

-- ----------------------------
-- Table structure for `sp_news`
-- ----------------------------
DROP TABLE IF EXISTS `sp_news`;
CREATE TABLE `sp_news` (
  `id` char(50) NOT NULL,
  `title` char(32) NOT NULL COMMENT '服务类型名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1显示，0隐藏',
  `thumb` char(255) NOT NULL DEFAULT '/def.png' COMMENT '缩略图',
  `des` longtext COMMENT '服务描述',
  `del` tinyint(1) DEFAULT '0',
  `viewnum` int(10) NOT NULL DEFAULT '0',
  `displayorder` int(10) NOT NULL DEFAULT '0',
  `ntype` int(2) DEFAULT '0' COMMENT '类型',
  `summary` char(255) DEFAULT NULL,
  `addtime` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_news
-- ----------------------------

-- ----------------------------
-- Table structure for `sp_notice`
-- ----------------------------
DROP TABLE IF EXISTS `sp_notice`;
CREATE TABLE `sp_notice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `des` longtext,
  `del` tinyint(1) NOT NULL DEFAULT '0',
  `displayorder` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `ntype` int(10) DEFAULT NULL COMMENT '类型',
  `src` text COMMENT '相关文件',
  `updatetime` int(10) NOT NULL,
  `is_receipt` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否接受会议回执',
  `viewnum` int(10) NOT NULL DEFAULT '0' COMMENT '浏览次数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_notice
-- ----------------------------

-- ----------------------------
-- Table structure for `sp_policies`
-- ----------------------------
DROP TABLE IF EXISTS `sp_policies`;
CREATE TABLE `sp_policies` (
  `id` char(50) NOT NULL,
  `title` char(32) NOT NULL COMMENT '服务类型名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1显示，0隐藏',
  `thumb` char(255) NOT NULL DEFAULT '/def.png' COMMENT '缩略图',
  `des` longtext COMMENT '服务描述',
  `del` tinyint(1) DEFAULT '0',
  `viewnum` int(10) NOT NULL DEFAULT '0',
  `displayorder` int(10) NOT NULL DEFAULT '0',
  `ntype` int(2) DEFAULT '0' COMMENT '类型',
  `summary` char(255) DEFAULT NULL,
  `addtime` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_policies
-- ----------------------------

-- ----------------------------
-- Table structure for `sp_sysset`
-- ----------------------------
DROP TABLE IF EXISTS `sp_sysset`;
CREATE TABLE `sp_sysset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `sets` longtext,
  `plugins` longtext,
  `sec` text,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_sysset
-- ----------------------------
