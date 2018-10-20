-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- 服务器版本:                        5.5.53 - MySQL Community Server (GPL)
-- 服务器操作系统:                      Win32
-- HeidiSQL 版本:                  9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- 导出 fzyan 的数据库结构
CREATE DATABASE IF NOT EXISTS `fzyan` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `fzyan`;

-- 导出  表 fzyan.admin 结构
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '请求验证签名',
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '重置密码签名',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '邮箱',
  `status` smallint(6) NOT NULL DEFAULT '10' COMMENT '账号状态',
  `created_at` int(11) NOT NULL COMMENT '创建就时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  fzyan.admin 的数据：~1 rows (大约)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'KBdcyMwtYR_pwGQWUKEcBnIh5SLxqakY', 'UASB15ro5JWR.OUoYRdsD0fLPzeHuYyjyupTxrT1CvH8G', NULL, '1203669692@qq.com', 10, 0, 0);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- 导出  表 fzyan.device 结构
CREATE TABLE IF NOT EXISTS `device` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `name` varchar(50) NOT NULL COMMENT '唯一标识',
  `address` varchar(255) NOT NULL COMMENT '投放地址',
  `state` tinyint(4) NOT NULL DEFAULT '0' COMMENT '满溢状态',
  `price` int(11) DEFAULT NULL COMMENT '回收价格',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 正在导出表  fzyan.device 的数据：0 rows
/*!40000 ALTER TABLE `device` DISABLE KEYS */;
/*!40000 ALTER TABLE `device` ENABLE KEYS */;

-- 导出  表 fzyan.migration 结构
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 正在导出表  fzyan.migration 的数据：2 rows
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1536805785),
	('m130524_201442_init', 1536805791);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;

-- 导出  表 fzyan.reward_code 结构
CREATE TABLE IF NOT EXISTS `reward_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '序号id',
  `content` varchar(255) NOT NULL DEFAULT '0' COMMENT '激活码内容',
  `money` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '奖励金额',
  `trash_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回收装置序号',
  `user_id` int(10) unsigned zerofill DEFAULT '0000000000' COMMENT '用户id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 正在导出表  fzyan.reward_code 的数据：0 rows
/*!40000 ALTER TABLE `reward_code` DISABLE KEYS */;
/*!40000 ALTER TABLE `reward_code` ENABLE KEYS */;

-- 导出  表 fzyan.user 结构
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  fzyan.user 的数据：~1 rows (大约)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'meng', 'KBdcyMwtYR_pwGQWUKEcBnIh5SLxqakY', '$2y$13$fkkYc0ImUASB15ro5JWR.OUoYRdsD0fLPzeHuYyjyupTxrT1CvH8G', NULL, '1203669692@qq.com', 10, 1538276389, 1538276389);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
