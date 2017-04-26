/*
SQLyog Ultimate v9.20 
MySQL - 5.6.17 : Database - fanmi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`fanmi` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `fanmi`;

/*Table structure for table `fanmi_address` */

DROP TABLE IF EXISTS `fanmi_address`;

CREATE TABLE `fanmi_address` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `member_id` mediumint(8) unsigned NOT NULL COMMENT '会员的ID',
  `shr_name` varchar(30) NOT NULL COMMENT '收货人姓名',
  `shr_province` varchar(30) NOT NULL COMMENT '收货人省',
  `shr_city` varchar(30) NOT NULL COMMENT '收货人市',
  `shr_area` varchar(30) NOT NULL COMMENT '收货人地区',
  `shr_address` varchar(30) NOT NULL COMMENT '收货人详细地址',
  `shr_phone` varchar(30) NOT NULL COMMENT '收货人手机',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='收货人';

/*Data for the table `fanmi_address` */

/*Table structure for table `fanmi_admin` */

DROP TABLE IF EXISTS `fanmi_admin`;

CREATE TABLE `fanmi_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(30) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `role_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '角色的id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员';

/*Data for the table `fanmi_admin` */

insert  into `fanmi_admin`(`id`,`username`,`password`,`role_id`) values (1,'admin','e10adc3949ba59abbe56e057f20f883e',1);

/*Table structure for table `fanmi_attribute` */

DROP TABLE IF EXISTS `fanmi_attribute`;

CREATE TABLE `fanmi_attribute` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `attr_name` varchar(30) NOT NULL COMMENT '属性名称',
  `attr_type` enum('单选','唯一') NOT NULL DEFAULT '唯一' COMMENT '属性类型',
  `attr_option_value` varchar(300) NOT NULL DEFAULT '' COMMENT '属性可选值',
  `type_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '类型id',
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`),
  CONSTRAINT `fanmi_attribute_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `fanmi_type` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='属性表';

/*Data for the table `fanmi_attribute` */

/*Table structure for table `fanmi_brand` */

DROP TABLE IF EXISTS `fanmi_brand`;

CREATE TABLE `fanmi_brand` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `brand_name` varchar(30) NOT NULL COMMENT '品牌名称',
  `site_url` varchar(150) NOT NULL DEFAULT '' COMMENT '官方网站',
  `brand_logo` varchar(150) NOT NULL DEFAULT '' COMMENT '图片的LOGO',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品品牌';

/*Data for the table `fanmi_brand` */

/*Table structure for table `fanmi_cart` */

DROP TABLE IF EXISTS `fanmi_cart`;

CREATE TABLE `fanmi_cart` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `goods_id` mediumint(8) unsigned NOT NULL COMMENT '商品的id',
  `member_id` mediumint(8) unsigned NOT NULL COMMENT '会员的ID',
  `gaid` varchar(30) NOT NULL DEFAULT '' COMMENT '商品属性的id',
  `gastr` varchar(150) NOT NULL DEFAULT '' COMMENT '商品属性的字符串',
  `goods_number` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '商品的数量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='购物车';

/*Data for the table `fanmi_cart` */

/*Table structure for table `fanmi_category` */

DROP TABLE IF EXISTS `fanmi_category`;

CREATE TABLE `fanmi_category` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `cat_name` varchar(30) NOT NULL COMMENT '分类名称',
  `parent_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类的id',
  `price_section` tinyint(3) unsigned NOT NULL DEFAULT '5' COMMENT '价格区间',
  `cat_keywords` varchar(300) NOT NULL DEFAULT '' COMMENT '页面的关键字',
  `cat_description` varchar(300) NOT NULL DEFAULT '' COMMENT '页面的描述',
  `attr_id` varchar(150) NOT NULL DEFAULT '' COMMENT '筛选属性id,多个用，隔开',
  `rec_id` varchar(150) NOT NULL DEFAULT '' COMMENT '推荐位的ID，多个用，隔开',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品分类';

/*Data for the table `fanmi_category` */

/*Table structure for table `fanmi_goods` */

DROP TABLE IF EXISTS `fanmi_goods`;

CREATE TABLE `fanmi_goods` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `goods_name` varchar(30) NOT NULL COMMENT '商品名称',
  `sm_logo` varchar(150) NOT NULL DEFAULT '' COMMENT '小图',
  `mid_logo` varchar(150) NOT NULL DEFAULT '' COMMENT '中图',
  `big_logo` varchar(150) NOT NULL DEFAULT '' COMMENT '大图',
  `logo` varchar(150) NOT NULL DEFAULT '' COMMENT '原图',
  `cat_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '分类ID',
  `brand_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '品牌ID',
  `market_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '市场价',
  `shop_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '本店价',
  `is_on_sale` enum('是','否') NOT NULL DEFAULT '是' COMMENT '是否上架',
  `goods_desc` text COMMENT '商品描述',
  `type_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '商品类型id',
  `rec_id` varchar(150) NOT NULL DEFAULT '' COMMENT '推荐位的ID，多个用，隔开',
  PRIMARY KEY (`id`),
  KEY `shop_price` (`shop_price`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品表';

/*Data for the table `fanmi_goods` */

/*Table structure for table `fanmi_goods_attr` */

DROP TABLE IF EXISTS `fanmi_goods_attr`;

CREATE TABLE `fanmi_goods_attr` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '商品的id',
  `attr_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '属性id',
  `attr_value` varchar(150) NOT NULL DEFAULT '' COMMENT '属性值',
  `attr_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '属性的价格',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品属性';

/*Data for the table `fanmi_goods_attr` */

/*Table structure for table `fanmi_goods_number` */

DROP TABLE IF EXISTS `fanmi_goods_number`;

CREATE TABLE `fanmi_goods_number` (
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '商品的id',
  `goods_number` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品数量',
  `goodsattr_id` varchar(150) NOT NULL DEFAULT '' COMMENT '商品属性ID，如果有多个属性用,隔开'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品库存';

/*Data for the table `fanmi_goods_number` */

/*Table structure for table `fanmi_goods_pic` */

DROP TABLE IF EXISTS `fanmi_goods_pic`;

CREATE TABLE `fanmi_goods_pic` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `sm_logo` varchar(150) NOT NULL DEFAULT '' COMMENT '小图',
  `mid_logo` varchar(150) NOT NULL DEFAULT '' COMMENT '中图',
  `logo` varchar(150) NOT NULL DEFAULT '' COMMENT '原图',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '商品的id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品图片';

/*Data for the table `fanmi_goods_pic` */

/*Table structure for table `fanmi_history` */

DROP TABLE IF EXISTS `fanmi_history`;

CREATE TABLE `fanmi_history` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `member_id` mediumint(8) unsigned NOT NULL COMMENT '会员的id',
  `goods_id` mediumint(8) unsigned NOT NULL COMMENT '商品的id',
  `view_count` int(10) unsigned DEFAULT '0' COMMENT '浏览的次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='浏览历史';

/*Data for the table `fanmi_history` */

/*Table structure for table `fanmi_member` */

DROP TABLE IF EXISTS `fanmi_member`;

CREATE TABLE `fanmi_member` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(30) NOT NULL COMMENT '用户名',
  `email` varchar(150) NOT NULL COMMENT 'email',
  `password` char(32) NOT NULL COMMENT '密码',
  `email_code` char(13) NOT NULL COMMENT 'email验证码,如果这个字段为空，代表已经验证过了',
  `email_code_time` int(10) unsigned NOT NULL COMMENT '验证码生成的时间',
  `jifen` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员的积分',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员';

/*Data for the table `fanmi_member` */

/*Table structure for table `fanmi_member_level` */

DROP TABLE IF EXISTS `fanmi_member_level`;

CREATE TABLE `fanmi_member_level` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `level_name` varchar(30) NOT NULL COMMENT '级别名称',
  `top` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '积分上限',
  `bottom` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '积分下限',
  `rate` int(10) unsigned NOT NULL DEFAULT '100' COMMENT '折扣',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员级别';

/*Data for the table `fanmi_member_level` */

/*Table structure for table `fanmi_member_price` */

DROP TABLE IF EXISTS `fanmi_member_price`;

CREATE TABLE `fanmi_member_price` (
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `level_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '会员级别id',
  `goods_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '商品的id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员价格';

/*Data for the table `fanmi_member_price` */

/*Table structure for table `fanmi_order` */

DROP TABLE IF EXISTS `fanmi_order`;

CREATE TABLE `fanmi_order` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `member_id` mediumint(8) unsigned NOT NULL COMMENT '会员的ID',
  `addtime` datetime NOT NULL COMMENT '下单时间',
  `shr_name` varchar(30) NOT NULL COMMENT '收货人姓名',
  `shr_province` varchar(30) NOT NULL COMMENT '收货人省',
  `shr_city` varchar(30) NOT NULL COMMENT '收货人市',
  `shr_area` varchar(30) NOT NULL COMMENT '收货人地区',
  `shr_address` varchar(30) NOT NULL COMMENT '收货人详细地址',
  `shr_phone` varchar(30) NOT NULL COMMENT '收货人手机',
  `pay_status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '支付状态,0:未支付 1：已支付',
  `post_status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '发货状态， 0：未发货， 1：已发化 2：已收货',
  `order_status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '定单状态 0：未确认 1：已确认 2：已完成 3.申请退货 4.退货成功',
  `post_method` varchar(30) NOT NULL DEFAULT '' COMMENT '发货方式',
  `pay_method` varchar(30) NOT NULL DEFAULT '' COMMENT '支付方式',
  `total_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '定单总价',
  `return_status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '退货记录0:不退货,1:退货中,2:已经退货',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='定单基本信息';

/*Data for the table `fanmi_order` */

insert  into `fanmi_order`(`id`,`member_id`,`addtime`,`shr_name`,`shr_province`,`shr_city`,`shr_area`,`shr_address`,`shr_phone`,`pay_status`,`post_status`,`order_status`,`post_method`,`pay_method`,`total_price`,`return_status`) values (1,0,'0000-00-00 00:00:00','','','','','','',0,0,0,'','','0.00',1);

/*Table structure for table `fanmi_order_goods` */

DROP TABLE IF EXISTS `fanmi_order_goods`;

CREATE TABLE `fanmi_order_goods` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `member_id` mediumint(8) unsigned NOT NULL COMMENT '会员的ID',
  `order_id` mediumint(8) unsigned NOT NULL COMMENT '定单的ID',
  `goods_id` mediumint(8) unsigned NOT NULL COMMENT '商品的ID',
  `goodsattr_id` varchar(150) NOT NULL DEFAULT '' COMMENT '商品属性ID',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品价格',
  `goods_number` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '购买的数量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='定单商品';

/*Data for the table `fanmi_order_goods` */

/*Table structure for table `fanmi_privilege` */

DROP TABLE IF EXISTS `fanmi_privilege`;

CREATE TABLE `fanmi_privilege` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `pri_name` varchar(30) NOT NULL COMMENT '权限名称',
  `module_name` varchar(30) NOT NULL COMMENT '对应的模块名',
  `controller_name` varchar(30) NOT NULL COMMENT '对应的控制器名',
  `action_name` varchar(30) NOT NULL COMMENT '对应的方法名',
  `parent_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '上级权限的id',
  `pri_level` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '权限的级别。0：一级 1：二级',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='权限';

/*Data for the table `fanmi_privilege` */

insert  into `fanmi_privilege`(`id`,`pri_name`,`module_name`,`controller_name`,`action_name`,`parent_id`,`pri_level`) values (1,'','Goods','Goods','lst',0,0),(2,'','Home','Index','index',0,0);

/*Table structure for table `fanmi_recommend` */

DROP TABLE IF EXISTS `fanmi_recommend`;

CREATE TABLE `fanmi_recommend` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `rec_name` varchar(150) NOT NULL COMMENT '推荐位名称',
  `rec_type` enum('商品','分类') NOT NULL COMMENT '推荐位的类型',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='推荐位';

/*Data for the table `fanmi_recommend` */

/*Table structure for table `fanmi_remark` */

DROP TABLE IF EXISTS `fanmi_remark`;

CREATE TABLE `fanmi_remark` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `member_id` mediumint(8) unsigned NOT NULL COMMENT '会员的id',
  `goods_id` mediumint(8) unsigned NOT NULL COMMENT '商品的id',
  `content` varchar(300) NOT NULL COMMENT '评论的内容',
  `addtime` datetime NOT NULL COMMENT '评论的时间',
  `stars` tinyint(3) unsigned NOT NULL DEFAULT '5' COMMENT '打分',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论';

/*Data for the table `fanmi_remark` */

/*Table structure for table `fanmi_role` */

DROP TABLE IF EXISTS `fanmi_role`;

CREATE TABLE `fanmi_role` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `role_name` varchar(30) NOT NULL COMMENT '角色名称',
  `pri_id` varchar(150) NOT NULL DEFAULT '' COMMENT '权限的ID，如果有多个权限就用,隔开，如1,3,4',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='角色';

/*Data for the table `fanmi_role` */

insert  into `fanmi_role`(`id`,`role_name`,`pri_id`) values (1,'超级管理员','*'),(2,'一般管理员','2');

/*Table structure for table `fanmi_type` */

DROP TABLE IF EXISTS `fanmi_type`;

CREATE TABLE `fanmi_type` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `type_name` varchar(30) NOT NULL COMMENT '类型名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品类型';

/*Data for the table `fanmi_type` */

/*Table structure for table `fanmi_yinxiang` */

DROP TABLE IF EXISTS `fanmi_yinxiang`;

CREATE TABLE `fanmi_yinxiang` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `goods_id` mediumint(8) unsigned NOT NULL COMMENT '商品的id',
  `yx_name` varchar(30) NOT NULL COMMENT '印象',
  `yx_count` int(10) unsigned NOT NULL COMMENT '印象次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='印象';

/*Data for the table `fanmi_yinxiang` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
