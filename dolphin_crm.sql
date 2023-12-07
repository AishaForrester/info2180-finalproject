DROP DATABASE IF EXISTS dolphin_crm;
CREATE DATABASE dolphin_crm;
USE dolphin_crm;

DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users`(
    `id` int(10) NOT NULL auto_increment,
    `firstname` varchar(255) NOT NULL DEFAULT '',
    `lastname` varchar(255) NOT NULL DEFAULT '',
    `pssword` varchar(255) NOT NULL DEFAULT '',
    `email` varchar(255) NOT NULL DEFAULT '',
    `role` varchar(255) NOT NULL DEFAULT '',
    `created_at` DATETIME,
    PRIMARY KEY(id) 
) ENGINE=InnoDB AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `Contacts`;
CREATE TABLE `Contacts`(
    `id` int(10) NOT NULL auto_increment,
    `title` varchar(255) NOT NULL DEFAULT '',
    `firstname` varchar(255) NOT NULL DEFAULT '',
    `lastname` varchar(255) NOT NULL DEFAULT '',
    `email` varchar(255) NOT NULL DEFAULT '',
    `telephone` varchar(255) NOT NULL DEFAULT '',
    `company` varchar(255) NOT NULL DEFAULT '',
    `type` varchar(255) NOT NULL DEFAULT '',
    `assigned_to` int(10) NOT NULL DEFAULT '0',
    `created_by` int(10) NOT NULL DEFAULT '0',
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY(id) 
) ENGINE=InnoDB AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `Notes`;
CREATE TABLE `Notes`(
    `id` int(10) NOT NULL auto_increment,
    `contact_id` varchar(255) NOT NULL DEFAULT '',
    `comment` text,
    `created_by` int(10) NOT NULL DEFAULT '0',
    `created_at` DATETIME,
    PRIMARY KEY(id) 
) ENGINE=InnoDB AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;
