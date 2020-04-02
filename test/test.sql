-- Adminer 4.7.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `category` (`id`, `name`) VALUES
(1,	'wordpress developer'),
(2,	'html css developer'),
(3,	'angular developer'),
(4,	'laravel developer'),
(5,	'web consultant'),
(6,	'project manager');

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `employee` (`ID`, `name`, `email`, `phone`) VALUES
(10,	'hentraid',	'hen@gmail.com',	'4353254243'),
(11,	'Cedric Kelly',	'cedrickelly@gmail.com',	'5344232453'),
(12,	'Ashton Cox',	'ashtoncox@gmail.com',	'9536481104'),
(13,	'Garrett Winters',	'garrettwinters@gmail.com',	'4510488296'),
(14,	'Tiger Nixon',	'tiger@nixon.com',	'9440261554'),
(15,	'Claire Xandra',	'claire@gmail.com',	'4339028442'),
(16,	'Glory hack',	'glory@gmail.com',	'4904552145'),
(17,	'Gcegjeh',	'Gcegjeh@gmail.com',	'453454545');

DROP TABLE IF EXISTS `employee_meta`;
CREATE TABLE `employee_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `addhar` varchar(50) NOT NULL,
  `pan` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `date_of_joining` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `employee_meta_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`ID`),
  CONSTRAINT `employee_meta_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`ID`),
  CONSTRAINT `employee_meta_ibfk_3` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `employee_meta` (`id`, `employee_id`, `cat_id`, `addhar`, `pan`, `gender`, `salary`, `date_of_joining`) VALUES
(1,	10,	2,	'sdfsdf453453',	'456dgf4de4Sr',	'male',	'434343',	'2019-11-19'),
(2,	11,	2,	'534243456890',	'f43GM5eS',	'male',	'9000',	'2019-10-18'),
(3,	12,	4,	'855504452286',	'hgD32S5G9kR',	'male',	'9500',	'2019-11-11'),
(4,	13,	5,	'4111094455342288',	'Gf345SRX3',	'male',	'8500',	'2019-10-04'),
(5,	14,	1,	'9440 3253 1163 4485',	'Hd5dsEgW',	'male',	'12500',	'2019-11-04'),
(6,	15,	6,	'4992 4445 9822 3399',	'nd42SW8GsR',	'female',	'30000',	'2018-02-05'),
(7,	16,	5,	'5440 2255 6388 1944',	'vsHJue43FW',	'female',	'6000',	'2019-08-19'),
(8,	17,	5,	'4444532342454342',	'gd5gdfgDsfg',	'female',	'343545',	'2019-11-12');

-- 2019-11-19 13:36:22
