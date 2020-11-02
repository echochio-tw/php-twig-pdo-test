-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `amountinfo`;
CREATE TABLE `amountinfo` (
  `amountinfo_id` int(11) NOT NULL AUTO_INCREMENT,
  `cloudaccount_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`amountinfo_id`),
  KEY `cloudaccount_id` (`cloudaccount_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `amountinfo_ibfk_1` FOREIGN KEY (`cloudaccount_id`) REFERENCES `cloudaccount` (`cloudaccount_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `amountinfo_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `cloud`;
CREATE TABLE `cloud` (
  `cloud_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '索引',
  `cloud_info` varchar(30) NOT NULL COMMENT '雲平台',
  PRIMARY KEY (`cloud_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `cloudaccount`;
CREATE TABLE `cloudaccount` (
  `cloudaccount_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '索引',
  `cloud_account` varchar(30) NOT NULL COMMENT '雲帳號',
  `cloud_id` int(11) NOT NULL COMMENT '雲平台',
  PRIMARY KEY (`cloudaccount_id`),
  KEY `cloud_id` (`cloud_id`),
  CONSTRAINT `cloudaccount_ibfk_2` FOREIGN KEY (`cloud_id`) REFERENCES `cloud` (`cloud_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '索引',
  `customer_account` varchar(30) NOT NULL COMMENT '客戶名',
  `cloudaccount_id` int(11) NOT NULL COMMENT '雲平台資訊',
  `amountinfo_id` int(11) DEFAULT NULL,
  `alarm_amount` float NOT NULL,
  PRIMARY KEY (`customer_id`),
  KEY `amountinfo_id` (`amountinfo_id`),
  KEY `cloudaccount_id` (`cloudaccount_id`),
  CONSTRAINT `customer_ibfk_6` FOREIGN KEY (`amountinfo_id`) REFERENCES `amountinfo` (`amountinfo_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`cloudaccount_id`) REFERENCES `cloudaccount` (`cloudaccount_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 2020-11-02 02:24:13
