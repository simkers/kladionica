
-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2013 at 03:10 PM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a6209950_kladza`
--

-- --------------------------------------------------------

--
-- Table structure for table `admini`
--

CREATE TABLE `admini` (
  `admin_id` int(8) NOT NULL AUTO_INCREMENT,
  `korisničko_ime` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admini`
--

INSERT INTO `admini` VALUES(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `države`
--

CREATE TABLE `države` (
  `država_id` int(8) NOT NULL AUTO_INCREMENT,
  `ime_države` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`država_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `države`
--

INSERT INTO `države` VALUES(1, 'Engleska');
INSERT INTO `države` VALUES(2, 'Nemačka');
INSERT INTO `države` VALUES(3, 'Srbija');
INSERT INTO `države` VALUES(4, 'Italija');
INSERT INTO `države` VALUES(5, 'Španija');
INSERT INTO `države` VALUES(6, 'Francuska');
INSERT INTO `države` VALUES(7, 'Rusija');
INSERT INTO `države` VALUES(8, 'Vels');

-- --------------------------------------------------------

--
-- Table structure for table `ekipe`
--

CREATE TABLE `ekipe` (
  `ekipa_id` int(8) NOT NULL AUTO_INCREMENT,
  `ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `država_id` int(8) NOT NULL,
  PRIMARY KEY (`ekipa_id`),
  KEY `država_id` (`država_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=82 ;

--
-- Dumping data for table `ekipe`
--

INSERT INTO `ekipe` VALUES(1, 'Liverpul', 1);
INSERT INTO `ekipe` VALUES(2, 'Mančester Junajted', 1);
INSERT INTO `ekipe` VALUES(3, 'Arsenal', 1);
INSERT INTO `ekipe` VALUES(4, 'Čelzi', 1);
INSERT INTO `ekipe` VALUES(5, 'Mančester Siti', 1);
INSERT INTO `ekipe` VALUES(6, 'Totenhem', 1);
INSERT INTO `ekipe` VALUES(7, 'Njukasl', 1);
INSERT INTO `ekipe` VALUES(8, 'Vest Bromvič Albion', 1);
INSERT INTO `ekipe` VALUES(9, 'Kvins Park Rendžers', 1);
INSERT INTO `ekipe` VALUES(10, 'Fulam', 1);
INSERT INTO `ekipe` VALUES(11, 'Sanderlend', 1);
INSERT INTO `ekipe` VALUES(12, 'Aston Vila', 1);
INSERT INTO `ekipe` VALUES(13, 'Vest Hem', 1);
INSERT INTO `ekipe` VALUES(14, 'Everton', 1);
INSERT INTO `ekipe` VALUES(15, 'Norič', 1);
INSERT INTO `ekipe` VALUES(16, 'Svonsi', 8);
INSERT INTO `ekipe` VALUES(17, 'Reding', 1);
INSERT INTO `ekipe` VALUES(18, 'Sautempton', 1);
INSERT INTO `ekipe` VALUES(19, 'Stouk', 1);
INSERT INTO `ekipe` VALUES(20, 'Vigan', 1);
INSERT INTO `ekipe` VALUES(21, 'Kardif', 8);
INSERT INTO `ekipe` VALUES(22, 'Votford', 1);
INSERT INTO `ekipe` VALUES(23, 'Hal', 1);
INSERT INTO `ekipe` VALUES(24, 'Kristal Palas', 1);
INSERT INTO `ekipe` VALUES(25, 'Lester', 1);
INSERT INTO `ekipe` VALUES(26, 'Brajton', 1);
INSERT INTO `ekipe` VALUES(27, 'Midlsbro', 1);
INSERT INTO `ekipe` VALUES(28, 'Notingem Forest', 1);
INSERT INTO `ekipe` VALUES(29, 'Lids', 1);
INSERT INTO `ekipe` VALUES(30, 'Blekburn', 1);
INSERT INTO `ekipe` VALUES(31, 'Derbi', 1);
INSERT INTO `ekipe` VALUES(32, 'Barnli', 1);
INSERT INTO `ekipe` VALUES(33, 'Milvol', 1);
INSERT INTO `ekipe` VALUES(34, 'Čarlton', 1);
INSERT INTO `ekipe` VALUES(35, 'Bolton', 1);
INSERT INTO `ekipe` VALUES(36, 'Birmingem', 1);
INSERT INTO `ekipe` VALUES(37, 'Blekpul', 1);
INSERT INTO `ekipe` VALUES(38, 'Šefild Venzdej', 1);
INSERT INTO `ekipe` VALUES(39, 'Ipsvič', 1);
INSERT INTO `ekipe` VALUES(40, 'Hadersfild', 1);
INSERT INTO `ekipe` VALUES(41, 'Barnsli', 1);
INSERT INTO `ekipe` VALUES(42, 'Vulvs', 1);
INSERT INTO `ekipe` VALUES(43, 'Bristol', 1);
INSERT INTO `ekipe` VALUES(44, 'Piterboro', 1);
INSERT INTO `ekipe` VALUES(45, 'Partizan', 3);
INSERT INTO `ekipe` VALUES(46, 'Crvena Zvezda', 3);
INSERT INTO `ekipe` VALUES(47, 'Jagodina', 3);
INSERT INTO `ekipe` VALUES(48, 'Vojvodina', 3);
INSERT INTO `ekipe` VALUES(49, 'Rad', 3);
INSERT INTO `ekipe` VALUES(50, 'Javor', 3);
INSERT INTO `ekipe` VALUES(51, 'Sloboda', 3);
INSERT INTO `ekipe` VALUES(52, 'Spartak', 3);
INSERT INTO `ekipe` VALUES(53, 'OFK Beograd', 3);
INSERT INTO `ekipe` VALUES(54, 'Novi Pazar', 3);
INSERT INTO `ekipe` VALUES(55, 'Donji Srem', 3);
INSERT INTO `ekipe` VALUES(56, 'Radnički Niš', 3);
INSERT INTO `ekipe` VALUES(57, 'BSK', 3);
INSERT INTO `ekipe` VALUES(58, 'Hajduk Kula', 3);
INSERT INTO `ekipe` VALUES(59, 'Radnički 1923', 3);
INSERT INTO `ekipe` VALUES(60, 'Smederevo', 3);
INSERT INTO `ekipe` VALUES(62, 'Juventus', 4);
INSERT INTO `ekipe` VALUES(63, 'Napoli', 4);
INSERT INTO `ekipe` VALUES(64, 'Milan', 4);
INSERT INTO `ekipe` VALUES(65, 'Fjorentina', 4);
INSERT INTO `ekipe` VALUES(66, 'Udineze', 4);
INSERT INTO `ekipe` VALUES(67, 'Roma', 4);
INSERT INTO `ekipe` VALUES(68, 'Lacio', 4);
INSERT INTO `ekipe` VALUES(69, 'Katanija', 4);
INSERT INTO `ekipe` VALUES(70, 'Inter', 4);
INSERT INTO `ekipe` VALUES(71, 'Parma', 4);
INSERT INTO `ekipe` VALUES(72, 'Kaljari', 4);
INSERT INTO `ekipe` VALUES(73, 'Kijevo', 4);
INSERT INTO `ekipe` VALUES(74, 'Bolonja', 4);
INSERT INTO `ekipe` VALUES(75, 'Samdorija', 4);
INSERT INTO `ekipe` VALUES(76, 'Atalanta', 4);
INSERT INTO `ekipe` VALUES(77, 'Torino', 4);
INSERT INTO `ekipe` VALUES(78, 'Đenova', 4);
INSERT INTO `ekipe` VALUES(79, 'Palermo', 4);
INSERT INTO `ekipe` VALUES(80, 'Sijena', 4);
INSERT INTO `ekipe` VALUES(81, 'Peskara', 4);

-- --------------------------------------------------------

--
-- Table structure for table `igre`
--

CREATE TABLE `igre` (
  `igra_id` int(8) NOT NULL AUTO_INCREMENT,
  `utakmica_id` int(8) NOT NULL,
  `prošla` tinyint(1) DEFAULT NULL,
  `tip_id` int(8) NOT NULL,
  `kvota` double(5,2) NOT NULL,
  PRIMARY KEY (`igra_id`),
  KEY `utakmica_id` (`utakmica_id`),
  KEY `oznaka_tipa` (`tip_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=194 ;

--
-- Dumping data for table `igre`
--

INSERT INTO `igre` VALUES(29, 5, NULL, 1, 2.00);
INSERT INTO `igre` VALUES(30, 5, NULL, 2, 2.00);
INSERT INTO `igre` VALUES(31, 5, NULL, 3, 2.00);
INSERT INTO `igre` VALUES(32, 5, NULL, 4, 2.00);
INSERT INTO `igre` VALUES(33, 5, NULL, 5, 2.00);
INSERT INTO `igre` VALUES(34, 5, NULL, 6, 2.00);
INSERT INTO `igre` VALUES(35, 5, NULL, 7, 2.00);
INSERT INTO `igre` VALUES(36, 5, NULL, 8, 2.00);
INSERT INTO `igre` VALUES(37, 5, NULL, 9, 2.00);
INSERT INTO `igre` VALUES(38, 5, NULL, 10, 2.00);
INSERT INTO `igre` VALUES(39, 5, NULL, 11, 2.00);
INSERT INTO `igre` VALUES(40, 5, NULL, 12, 2.00);
INSERT INTO `igre` VALUES(41, 5, NULL, 13, 2.00);
INSERT INTO `igre` VALUES(42, 5, NULL, 14, 2.00);
INSERT INTO `igre` VALUES(43, 5, NULL, 15, 2.00);
INSERT INTO `igre` VALUES(44, 5, NULL, 16, 2.00);
INSERT INTO `igre` VALUES(45, 5, NULL, 17, 2.00);
INSERT INTO `igre` VALUES(46, 5, NULL, 18, 2.00);
INSERT INTO `igre` VALUES(47, 5, NULL, 19, 2.00);
INSERT INTO `igre` VALUES(48, 5, NULL, 20, 2.00);
INSERT INTO `igre` VALUES(49, 5, NULL, 21, 2.00);
INSERT INTO `igre` VALUES(50, 5, NULL, 22, 2.00);
INSERT INTO `igre` VALUES(51, 5, NULL, 23, 2.00);
INSERT INTO `igre` VALUES(52, 5, NULL, 24, 2.00);
INSERT INTO `igre` VALUES(53, 5, NULL, 25, 2.00);
INSERT INTO `igre` VALUES(54, 5, NULL, 26, 2.00);
INSERT INTO `igre` VALUES(55, 5, NULL, 27, 2.00);
INSERT INTO `igre` VALUES(56, 5, NULL, 28, 2.00);
INSERT INTO `igre` VALUES(57, 5, NULL, 29, 2.00);
INSERT INTO `igre` VALUES(58, 5, NULL, 30, 2.00);
INSERT INTO `igre` VALUES(59, 5, NULL, 31, 2.00);
INSERT INTO `igre` VALUES(60, 5, NULL, 32, 2.00);
INSERT INTO `igre` VALUES(61, 5, NULL, 33, 2.00);
INSERT INTO `igre` VALUES(62, 5, NULL, 34, 2.00);
INSERT INTO `igre` VALUES(63, 5, NULL, 35, 2.00);
INSERT INTO `igre` VALUES(64, 5, NULL, 36, 2.00);
INSERT INTO `igre` VALUES(65, 5, NULL, 37, 2.00);
INSERT INTO `igre` VALUES(66, 5, NULL, 38, 2.00);
INSERT INTO `igre` VALUES(67, 5, NULL, 39, 2.00);
INSERT INTO `igre` VALUES(68, 5, NULL, 40, 2.00);
INSERT INTO `igre` VALUES(69, 5, NULL, 41, 2.00);
INSERT INTO `igre` VALUES(70, 5, NULL, 42, 2.00);
INSERT INTO `igre` VALUES(71, 5, NULL, 43, 2.00);
INSERT INTO `igre` VALUES(72, 5, NULL, 44, 2.00);
INSERT INTO `igre` VALUES(73, 5, NULL, 45, 2.00);
INSERT INTO `igre` VALUES(74, 5, NULL, 46, 2.00);
INSERT INTO `igre` VALUES(75, 5, NULL, 47, 2.00);
INSERT INTO `igre` VALUES(76, 5, NULL, 48, 2.00);
INSERT INTO `igre` VALUES(77, 5, NULL, 49, 2.00);
INSERT INTO `igre` VALUES(78, 5, NULL, 50, 2.00);
INSERT INTO `igre` VALUES(79, 5, NULL, 51, 2.00);
INSERT INTO `igre` VALUES(80, 5, NULL, 52, 2.00);
INSERT INTO `igre` VALUES(81, 5, NULL, 53, 2.00);
INSERT INTO `igre` VALUES(82, 5, NULL, 54, 2.00);
INSERT INTO `igre` VALUES(83, 5, NULL, 55, 2.00);
INSERT INTO `igre` VALUES(84, 5, NULL, 56, 2.00);
INSERT INTO `igre` VALUES(85, 5, NULL, 57, 2.00);
INSERT INTO `igre` VALUES(86, 5, NULL, 58, 2.00);
INSERT INTO `igre` VALUES(87, 5, NULL, 59, 2.00);
INSERT INTO `igre` VALUES(88, 5, NULL, 60, 2.00);
INSERT INTO `igre` VALUES(89, 5, NULL, 61, 2.00);
INSERT INTO `igre` VALUES(90, 5, NULL, 62, 2.00);
INSERT INTO `igre` VALUES(91, 5, NULL, 63, 2.00);
INSERT INTO `igre` VALUES(92, 5, NULL, 64, 2.00);
INSERT INTO `igre` VALUES(93, 5, NULL, 65, 2.00);
INSERT INTO `igre` VALUES(94, 5, NULL, 66, 2.00);
INSERT INTO `igre` VALUES(95, 7, NULL, 1, 4.00);
INSERT INTO `igre` VALUES(96, 7, 1, 2, 2.00);
INSERT INTO `igre` VALUES(97, 7, NULL, 3, 4.00);
INSERT INTO `igre` VALUES(98, 7, NULL, 4, 2.00);
INSERT INTO `igre` VALUES(99, 7, 1, 5, 1.00);
INSERT INTO `igre` VALUES(100, 7, 1, 6, 4.00);
INSERT INTO `igre` VALUES(101, 7, NULL, 7, 2.00);
INSERT INTO `igre` VALUES(102, 7, NULL, 8, 1.00);
INSERT INTO `igre` VALUES(103, 7, NULL, 9, 4.00);
INSERT INTO `igre` VALUES(104, 7, NULL, 10, 2.00);
INSERT INTO `igre` VALUES(105, 7, 1, 11, 1.00);
INSERT INTO `igre` VALUES(106, 7, NULL, 12, 4.00);
INSERT INTO `igre` VALUES(107, 7, 1, 13, 1.00);
INSERT INTO `igre` VALUES(108, 7, 1, 14, 1.00);
INSERT INTO `igre` VALUES(109, 7, 1, 15, 5.00);
INSERT INTO `igre` VALUES(110, 7, NULL, 16, 8.00);
INSERT INTO `igre` VALUES(111, 7, 1, 17, 6.00);
INSERT INTO `igre` VALUES(112, 7, 1, 18, 5.00);
INSERT INTO `igre` VALUES(113, 7, NULL, 19, 4.00);
INSERT INTO `igre` VALUES(114, 7, NULL, 20, 2.00);
INSERT INTO `igre` VALUES(115, 7, NULL, 21, 5.00);
INSERT INTO `igre` VALUES(116, 7, NULL, 22, 4.00);
INSERT INTO `igre` VALUES(117, 7, NULL, 23, 1.00);
INSERT INTO `igre` VALUES(118, 7, NULL, 66, 1.00);
INSERT INTO `igre` VALUES(119, 8, NULL, 1, 1.50);
INSERT INTO `igre` VALUES(120, 8, NULL, 2, 1.60);
INSERT INTO `igre` VALUES(121, 8, NULL, 4, 1.75);
INSERT INTO `igre` VALUES(122, 9, NULL, 1, 1.50);
INSERT INTO `igre` VALUES(123, 9, NULL, 2, 3.50);
INSERT INTO `igre` VALUES(124, 9, NULL, 3, 2.00);
INSERT INTO `igre` VALUES(125, 9, NULL, 4, 1.90);
INSERT INTO `igre` VALUES(126, 9, NULL, 5, 4.80);
INSERT INTO `igre` VALUES(127, 9, NULL, 6, 2.50);
INSERT INTO `igre` VALUES(128, 9, NULL, 7, 1.70);
INSERT INTO `igre` VALUES(129, 9, NULL, 8, 4.40);
INSERT INTO `igre` VALUES(130, 9, NULL, 9, 1.80);
INSERT INTO `igre` VALUES(131, 9, NULL, 10, 2.80);
INSERT INTO `igre` VALUES(132, 9, NULL, 11, 1.60);
INSERT INTO `igre` VALUES(133, 9, NULL, 12, 2.40);
INSERT INTO `igre` VALUES(134, 9, NULL, 13, 2.60);
INSERT INTO `igre` VALUES(135, 9, NULL, 14, 4.00);
INSERT INTO `igre` VALUES(136, 9, NULL, 15, 2.60);
INSERT INTO `igre` VALUES(137, 9, NULL, 16, 4.00);
INSERT INTO `igre` VALUES(138, 9, NULL, 49, 3.50);
INSERT INTO `igre` VALUES(139, 9, NULL, 57, 6.00);
INSERT INTO `igre` VALUES(140, 9, NULL, 58, 3.00);
INSERT INTO `igre` VALUES(141, 9, NULL, 59, 2.20);
INSERT INTO `igre` VALUES(142, 9, NULL, 60, 1.80);
INSERT INTO `igre` VALUES(143, 9, NULL, 61, 1.80);
INSERT INTO `igre` VALUES(144, 9, NULL, 62, 2.60);
INSERT INTO `igre` VALUES(145, 9, NULL, 63, 2.80);
INSERT INTO `igre` VALUES(146, 9, NULL, 64, 3.50);
INSERT INTO `igre` VALUES(147, 9, NULL, 65, 5.00);
INSERT INTO `igre` VALUES(148, 9, NULL, 66, 3.00);
INSERT INTO `igre` VALUES(149, 10, NULL, 1, 1.50);
INSERT INTO `igre` VALUES(150, 10, NULL, 2, 3.50);
INSERT INTO `igre` VALUES(151, 10, NULL, 3, 2.00);
INSERT INTO `igre` VALUES(152, 10, NULL, 4, 1.75);
INSERT INTO `igre` VALUES(153, 10, NULL, 5, 4.80);
INSERT INTO `igre` VALUES(154, 10, NULL, 6, 2.50);
INSERT INTO `igre` VALUES(155, 10, NULL, 7, 1.70);
INSERT INTO `igre` VALUES(156, 10, NULL, 8, 4.40);
INSERT INTO `igre` VALUES(157, 10, NULL, 9, 1.80);
INSERT INTO `igre` VALUES(158, 10, NULL, 10, 2.80);
INSERT INTO `igre` VALUES(159, 10, NULL, 11, 1.60);
INSERT INTO `igre` VALUES(160, 10, NULL, 12, 2.40);
INSERT INTO `igre` VALUES(161, 10, NULL, 13, 2.60);
INSERT INTO `igre` VALUES(162, 10, NULL, 14, 4.00);
INSERT INTO `igre` VALUES(163, 10, NULL, 15, 2.60);
INSERT INTO `igre` VALUES(164, 10, NULL, 16, 4.00);
INSERT INTO `igre` VALUES(165, 10, NULL, 17, 1.40);
INSERT INTO `igre` VALUES(166, 10, NULL, 18, 2.10);
INSERT INTO `igre` VALUES(167, 10, NULL, 19, 4.00);
INSERT INTO `igre` VALUES(168, 10, NULL, 20, 1.40);
INSERT INTO `igre` VALUES(169, 10, NULL, 21, 2.10);
INSERT INTO `igre` VALUES(170, 10, NULL, 22, 4.00);
INSERT INTO `igre` VALUES(171, 10, NULL, 23, 3.50);
INSERT INTO `igre` VALUES(172, 10, NULL, 24, 17.00);
INSERT INTO `igre` VALUES(173, 10, NULL, 25, 1.40);
INSERT INTO `igre` VALUES(174, 10, NULL, 26, 1.50);
INSERT INTO `igre` VALUES(175, 10, NULL, 27, 1.80);
INSERT INTO `igre` VALUES(176, 10, NULL, 32, 2.20);
INSERT INTO `igre` VALUES(177, 10, NULL, 58, 2.60);
INSERT INTO `igre` VALUES(178, 10, NULL, 59, 1.80);
INSERT INTO `igre` VALUES(179, 10, NULL, 60, 1.75);
INSERT INTO `igre` VALUES(180, 10, NULL, 61, 2.10);
INSERT INTO `igre` VALUES(181, 10, NULL, 66, 3.00);
INSERT INTO `igre` VALUES(182, 11, NULL, 1, 3.20);
INSERT INTO `igre` VALUES(183, 11, NULL, 2, 1.60);
INSERT INTO `igre` VALUES(184, 11, NULL, 3, 3.00);
INSERT INTO `igre` VALUES(185, 11, NULL, 4, 1.90);
INSERT INTO `igre` VALUES(186, 11, NULL, 5, 2.50);
INSERT INTO `igre` VALUES(187, 11, NULL, 6, 2.50);
INSERT INTO `igre` VALUES(188, 11, NULL, 7, 2.00);
INSERT INTO `igre` VALUES(189, 11, NULL, 8, 2.50);
INSERT INTO `igre` VALUES(190, 11, NULL, 32, 2.20);
INSERT INTO `igre` VALUES(191, 11, NULL, 59, 1.80);
INSERT INTO `igre` VALUES(192, 11, NULL, 61, 2.10);
INSERT INTO `igre` VALUES(193, 11, NULL, 66, 3.00);

-- --------------------------------------------------------

--
-- Table structure for table `igre_na_tiketima`
--

CREATE TABLE `igre_na_tiketima` (
  `igra_na_tiketima_id` int(8) NOT NULL AUTO_INCREMENT,
  `tiket_id` int(8) NOT NULL,
  `igra_id` int(8) NOT NULL,
  PRIMARY KEY (`igra_na_tiketima_id`),
  KEY `kombinacija_id` (`tiket_id`,`igra_id`),
  KEY `igra_id` (`igra_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Dumping data for table `igre_na_tiketima`
--

INSERT INTO `igre_na_tiketima` VALUES(1, 1, 29);
INSERT INTO `igre_na_tiketima` VALUES(2, 1, 96);
INSERT INTO `igre_na_tiketima` VALUES(3, 1, 121);
INSERT INTO `igre_na_tiketima` VALUES(4, 2, 29);
INSERT INTO `igre_na_tiketima` VALUES(5, 2, 97);
INSERT INTO `igre_na_tiketima` VALUES(6, 2, 121);
INSERT INTO `igre_na_tiketima` VALUES(7, 3, 29);
INSERT INTO `igre_na_tiketima` VALUES(8, 3, 97);
INSERT INTO `igre_na_tiketima` VALUES(9, 3, 121);
INSERT INTO `igre_na_tiketima` VALUES(10, 4, 29);
INSERT INTO `igre_na_tiketima` VALUES(11, 4, 97);
INSERT INTO `igre_na_tiketima` VALUES(12, 4, 121);
INSERT INTO `igre_na_tiketima` VALUES(13, 5, 29);
INSERT INTO `igre_na_tiketima` VALUES(14, 5, 95);
INSERT INTO `igre_na_tiketima` VALUES(15, 5, 119);
INSERT INTO `igre_na_tiketima` VALUES(16, 6, 94);
INSERT INTO `igre_na_tiketima` VALUES(17, 6, 120);
INSERT INTO `igre_na_tiketima` VALUES(18, 6, 104);
INSERT INTO `igre_na_tiketima` VALUES(19, 7, 35);
INSERT INTO `igre_na_tiketima` VALUES(20, 7, 100);
INSERT INTO `igre_na_tiketima` VALUES(21, 7, 121);
INSERT INTO `igre_na_tiketima` VALUES(22, 8, 29);
INSERT INTO `igre_na_tiketima` VALUES(23, 8, 119);
INSERT INTO `igre_na_tiketima` VALUES(24, 9, 29);
INSERT INTO `igre_na_tiketima` VALUES(25, 9, 96);
INSERT INTO `igre_na_tiketima` VALUES(26, 9, 120);
INSERT INTO `igre_na_tiketima` VALUES(27, 10, 30);
INSERT INTO `igre_na_tiketima` VALUES(28, 10, 97);
INSERT INTO `igre_na_tiketima` VALUES(29, 10, 121);
INSERT INTO `igre_na_tiketima` VALUES(30, 11, 121);
INSERT INTO `igre_na_tiketima` VALUES(31, 11, 100);
INSERT INTO `igre_na_tiketima` VALUES(32, 12, 29);
INSERT INTO `igre_na_tiketima` VALUES(33, 12, 96);
INSERT INTO `igre_na_tiketima` VALUES(34, 12, 119);

-- --------------------------------------------------------

--
-- Table structure for table `kola`
--

CREATE TABLE `kola` (
  `kolo_id` int(8) NOT NULL AUTO_INCREMENT,
  `datum_početka` date NOT NULL,
  `datum_završetka` date NOT NULL,
  PRIMARY KEY (`kolo_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kola`
--

INSERT INTO `kola` VALUES(1, '2013-02-06', '2013-02-07');
INSERT INTO `kola` VALUES(2, '2013-05-25', '2013-05-29');
INSERT INTO `kola` VALUES(3, '2013-05-30', '2013-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `rubrike`
--

CREATE TABLE `rubrike` (
  `rubrika_id` int(8) NOT NULL AUTO_INCREMENT,
  `takmičenje_id` int(8) NOT NULL,
  `kolo_id` int(8) DEFAULT NULL,
  PRIMARY KEY (`rubrika_id`),
  KEY `takmičenje_id` (`takmičenje_id`,`kolo_id`),
  KEY `lista_id` (`kolo_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rubrike`
--

INSERT INTO `rubrike` VALUES(1, 1, 1);
INSERT INTO `rubrike` VALUES(2, 1, 2);
INSERT INTO `rubrike` VALUES(3, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sportovi`
--

CREATE TABLE `sportovi` (
  `sport_id` int(8) NOT NULL AUTO_INCREMENT,
  `ime_sporta` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sport_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sportovi`
--

INSERT INTO `sportovi` VALUES(1, 'Fudbal');
INSERT INTO `sportovi` VALUES(2, 'Košarka');

-- --------------------------------------------------------

--
-- Table structure for table `takmičenja`
--

CREATE TABLE `takmičenja` (
  `takmičenje_id` int(8) NOT NULL AUTO_INCREMENT,
  `ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sezona` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `tip_takmičenja` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `država_id` int(8) NOT NULL,
  `rang_takmičenja` int(2) DEFAULT NULL,
  `sport_id` int(8) NOT NULL,
  PRIMARY KEY (`takmičenje_id`),
  KEY `država_id` (`država_id`),
  KEY `sport_id` (`sport_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `takmičenja`
--

INSERT INTO `takmičenja` VALUES(1, 'Premijer Liga', '2012/13', 'Liga', 1, 1, 1);
INSERT INTO `takmičenja` VALUES(5, 'Čempionšip', '2012/13', 'Liga', 1, 2, 1);
INSERT INTO `takmičenja` VALUES(4, 'Super liga', '2012/13', 'Liga', 3, 1, 1);
INSERT INTO `takmičenja` VALUES(3, 'Serija A', '2012/13', 'Liga', 4, 1, 1);
INSERT INTO `takmičenja` VALUES(2, 'FA kup', '2012/13', 'Kup', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tiketi`
--

CREATE TABLE `tiketi` (
  `tiket_id` int(8) NOT NULL AUTO_INCREMENT,
  `uplata` int(8) NOT NULL,
  PRIMARY KEY (`tiket_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tiketi`
--

INSERT INTO `tiketi` VALUES(1, 50);
INSERT INTO `tiketi` VALUES(2, 50);
INSERT INTO `tiketi` VALUES(3, 50);
INSERT INTO `tiketi` VALUES(4, 50);
INSERT INTO `tiketi` VALUES(5, 1000);
INSERT INTO `tiketi` VALUES(6, 100);
INSERT INTO `tiketi` VALUES(7, 100);
INSERT INTO `tiketi` VALUES(8, 50);
INSERT INTO `tiketi` VALUES(9, 80);
INSERT INTO `tiketi` VALUES(10, 50);
INSERT INTO `tiketi` VALUES(11, 100);
INSERT INTO `tiketi` VALUES(12, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tipovi`
--

CREATE TABLE `tipovi` (
  `tip_id` int(8) NOT NULL AUTO_INCREMENT,
  `oznaka` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `oznaka_vrste_igre` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`tip_id`),
  KEY `vrsta_igre_id` (`oznaka_vrste_igre`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=67 ;

--
-- Dumping data for table `tipovi`
--

INSERT INTO `tipovi` VALUES(1, '1', 'KI', 'Pobediće domaćin');
INSERT INTO `tipovi` VALUES(2, '2', 'KI', 'Pobediće gost');
INSERT INTO `tipovi` VALUES(3, 'X', '1PP', 'U prvom poluvremenu će ishod biti nerešen');
INSERT INTO `tipovi` VALUES(4, '1', '1PP', 'U prvom poluvremenu će pobediti domaćin');
INSERT INTO `tipovi` VALUES(5, '2', '1PP', 'U prvom poluvremenu će pobediti gost');
INSERT INTO `tipovi` VALUES(6, 'X', '2DP', 'U drugom poluvremenu će ishod biti nerešen');
INSERT INTO `tipovi` VALUES(7, '1', '2DP', 'U drugom poluvremenu će pobediti domaćin');
INSERT INTO `tipovi` VALUES(8, '2', '2DP', 'U drugom poluvremenu će pobediti gost');
INSERT INTO `tipovi` VALUES(9, '1+', '1TM1', 'Domaćin će u prvom poluvremenu postići jedan ili više golova');
INSERT INTO `tipovi` VALUES(10, '2+', '1TM1', 'Domaćin će u prvom poluvremenu postići dva ili više golova');
INSERT INTO `tipovi` VALUES(11, '1+', '2TM1', 'Domaćin će u drugom poluvremenu postići jedan ili više golova');
INSERT INTO `tipovi` VALUES(12, '2+', '2TM1', 'Domaćin će u drugom poluvremenu postići dva ili više golova');
INSERT INTO `tipovi` VALUES(13, '1+', '1TM2', 'Gost će u prvom poluvremenu postići jedan ili više golova');
INSERT INTO `tipovi` VALUES(14, '2+', '1TM2', 'Gost će u prvom poluvremenu postići dva ili više golova');
INSERT INTO `tipovi` VALUES(15, '1+', '2TM2', 'Gost će u drugom poluvremenu postići jedan ili više golova');
INSERT INTO `tipovi` VALUES(16, '2+', '2TM2', 'Gost će u drugom poluvremenu postići dva ili više golova');
INSERT INTO `tipovi` VALUES(17, '1+', '1UG', 'U prvom poluvremenu će biti postignut jedan ili više golova');
INSERT INTO `tipovi` VALUES(18, '2+', '1UG', 'U prvom poluvremenu će biti postignuto dva  ili više golova');
INSERT INTO `tipovi` VALUES(19, '3+', '1UG', 'U prvom poluvremenu će biti postignuto tri ili više golova');
INSERT INTO `tipovi` VALUES(20, '1+ ', '2UG', 'U drugom poluvremenu će biti postignut jedan ili više golova');
INSERT INTO `tipovi` VALUES(21, ' 2+', '2UG', 'U drugom poluvremenu će biti postignuto dva ili više golova');
INSERT INTO `tipovi` VALUES(22, '3+', '2UG', 'U drugom poluvremenu će biti postignuto tri ili više golova');
INSERT INTO `tipovi` VALUES(23, '11', 'DP', 'Domaćin će pobediti u oba poluvremena (pojedinačno)');
INSERT INTO `tipovi` VALUES(24, '22', 'DP', 'Gost će pobediti u oba poluvremena (pojedinačno)');
INSERT INTO `tipovi` VALUES(25, '1X', 'DS', 'Na utakmici će pobediti domaćin ili će biti nerešeno');
INSERT INTO `tipovi` VALUES(26, '12', 'DS', ' Na utakmici će pobediti domaćin ili gost');
INSERT INTO `tipovi` VALUES(27, 'X2', 'DS', 'Na utakmici će pobediti gost ili će biti nerešeno');
INSERT INTO `tipovi` VALUES(28, '1', 'HP', 'Domaćin će pobediti sa barem dva gola razlike');
INSERT INTO `tipovi` VALUES(29, '2', 'HP', 'Gost će pobediti sa barem dva gola razlike');
INSERT INTO `tipovi` VALUES(30, '1', 'SP', 'Domaćin će pobediti bez primljenog gola');
INSERT INTO `tipovi` VALUES(31, '2', 'SP', 'Gost će pobediti bez primljenog gola');
INSERT INTO `tipovi` VALUES(32, 'GG', 'TGG', 'Oba tima će dati barem jedan gol na utakmici');
INSERT INTO `tipovi` VALUES(33, 'NG', 'TGG', 'Jedan od dva tima će postići barem jedan gol na utakmici, a drugi neće postići ni jedan');
INSERT INTO `tipovi` VALUES(34, 'GG3+', 'TGG', ' Oba tima će postići barem po jedan gol i ukupan broj golova će biti barem tri');
INSERT INTO `tipovi` VALUES(35, 'GG2+ ', 'TGG', ' Oba tima će postići barem po dva gola');
INSERT INTO `tipovi` VALUES(36, '1GG', 'TGG', 'Oba tima će postići barem jedan gol u prvom poluvremenu');
INSERT INTO `tipovi` VALUES(37, '2GG', 'TGG', 'Oba tima će postići barem jedan gol u drugom poluvremenu');
INSERT INTO `tipovi` VALUES(38, '1', 'VG', 'U prvom poluvremenu će biti postignut veći broj pogodaka');
INSERT INTO `tipovi` VALUES(39, '2', 'VG', 'U drugom poluvremenu će biti postignut veći broj pogodaka');
INSERT INTO `tipovi` VALUES(40, 'X', 'VG', 'U oba poluvremena će biti postignut isti broj pogodaka');
INSERT INTO `tipovi` VALUES(41, '1+', 'TM1', 'Domaćin će postići barem jedan pogodak na meču');
INSERT INTO `tipovi` VALUES(42, '2+', 'TM1', 'Domaćin će postići barem dva pogotka na meču');
INSERT INTO `tipovi` VALUES(43, '3+', 'TM1', 'Domaćin će postići barem tri pogotka na meču');
INSERT INTO `tipovi` VALUES(44, '12GG', 'TM1', 'Domaćin će postići barem po jedan gol u oba poluvremena');
INSERT INTO `tipovi` VALUES(45, '1+', 'TM2', 'Gost će postići barem jedan pogodak na meču');
INSERT INTO `tipovi` VALUES(46, '2+', 'TM2', 'Gost će postići barem dva pogotka na meču');
INSERT INTO `tipovi` VALUES(47, '3+', 'TM2', 'Gost će postići barem tri pogotka na meču');
INSERT INTO `tipovi` VALUES(48, '12GG', 'TM2', 'Gost će postići barem po jedan gol u oba poluvremena');
INSERT INTO `tipovi` VALUES(49, '1-1', 'PK', 'Domaćin će voditi na poluvremenu i pobediće');
INSERT INTO `tipovi` VALUES(50, '1-X', 'PK', 'Domaćin će voditi na poluvremenu, a konačni ishod će biti nerešen');
INSERT INTO `tipovi` VALUES(51, '1-2', 'PK', 'Domaćin će voditi na poluvremenu, a pobediće gost');
INSERT INTO `tipovi` VALUES(52, 'X-1', 'PK', 'Na poluvremenu će biti nerešeno, a pobediće domaćin');
INSERT INTO `tipovi` VALUES(53, 'X-X', 'PK', 'I na poluvremenu i na kraju utakmice će biti nerešeno');
INSERT INTO `tipovi` VALUES(54, 'X-2', 'PK', 'Na poluvremenu će biti nerešeno, a pobediće gost');
INSERT INTO `tipovi` VALUES(55, '2-1', 'PK', 'Gost će voditi na poluvremenu, a pobediće domaćin');
INSERT INTO `tipovi` VALUES(56, '2-X', 'PK', 'Gostće voditi na poluvremenu, a konačni ishod će biti nerešen');
INSERT INTO `tipovi` VALUES(57, '2-2', 'PK', 'Gost će voditi na poluvremenu i pobediće');
INSERT INTO `tipovi` VALUES(58, '0-1', 'UG', 'Na utakmici će biti postignut jedan ili nijedan gol');
INSERT INTO `tipovi` VALUES(59, '0-2', 'UG', 'Na utakmici će biti postignuto dva ili manje golova');
INSERT INTO `tipovi` VALUES(60, '2-3', 'UG', 'Na utakmici će biti postignuto dva ili tri gola');
INSERT INTO `tipovi` VALUES(61, '3+', 'UG', 'Na utakmici će biti postignuto tri ili više golova');
INSERT INTO `tipovi` VALUES(62, '4+', 'UG', 'Na utakmici će biti postignuto četiri ili više golova');
INSERT INTO `tipovi` VALUES(63, '4-6', 'UG', 'Na utakmici će biti postignuto od četiri do šest golova');
INSERT INTO `tipovi` VALUES(64, '5+', 'UG', 'Na utakmici će biti postignuto pet ili više');
INSERT INTO `tipovi` VALUES(65, '7+', 'UG', 'Na utakmici će biti postignuto sedam ili više golova');
INSERT INTO `tipovi` VALUES(66, 'X', 'KI', 'Konačan ishod će biti nerešen');

-- --------------------------------------------------------

--
-- Table structure for table `utakmice`
--

CREATE TABLE `utakmice` (
  `utakmica_id` int(8) NOT NULL AUTO_INCREMENT,
  `šifra_utakmice` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `datum_početka` date DEFAULT NULL,
  `vreme_početka` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `domaćin` int(8) NOT NULL,
  `gost` int(8) NOT NULL,
  `rezultat` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `završena` tinyint(1) NOT NULL DEFAULT '0',
  `rubrika_id` int(8) NOT NULL,
  PRIMARY KEY (`utakmica_id`),
  KEY `domaćin` (`domaćin`),
  KEY `gost` (`gost`),
  KEY `rubrika_id` (`rubrika_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `utakmice`
--

INSERT INTO `utakmice` VALUES(1, '1001', '2013-02-06', '20:20', 1, 2, NULL, 0, 1);
INSERT INTO `utakmice` VALUES(2, '1001', '2013-02-06', '20.20', 2, 1, NULL, 0, 1);
INSERT INTO `utakmice` VALUES(3, '1006', '2013-02-06', '20.20', 8, 12, NULL, 0, 1);
INSERT INTO `utakmice` VALUES(4, '1007', '2013-02-06', '20.20', 2, 9, NULL, 0, 1);
INSERT INTO `utakmice` VALUES(5, '1008', '2013-02-07', '20.20', 13, 16, NULL, 0, 1);
INSERT INTO `utakmice` VALUES(6, '1009', '2013-02-07', '20.20', 12, 17, NULL, 0, 1);
INSERT INTO `utakmice` VALUES(7, '2002', '2013-02-07', '20:20', 7, 8, '1 : 3 (0 : 2)', 1, 1);
INSERT INTO `utakmice` VALUES(8, '2003', '2013-02-07', '20:20', 4, 3, NULL, 0, 1);
INSERT INTO `utakmice` VALUES(9, '1001', '2013-05-25', '20:45', 1, 20, NULL, 0, 2);
INSERT INTO `utakmice` VALUES(10, '1002', '2013-05-25', '20:45', 2, 19, NULL, 0, 2);
INSERT INTO `utakmice` VALUES(11, '1003', '2013-05-25', '20:45', 14, 4, NULL, 0, 1);
INSERT INTO `utakmice` VALUES(12, '2001', '2013-05-25', '20:45', 24, 22, NULL, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `učesnici`
--

CREATE TABLE `učesnici` (
  `učesnik_id` int(8) NOT NULL AUTO_INCREMENT,
  `takmičenje_id` int(8) NOT NULL,
  `ekipa_id` int(8) NOT NULL,
  PRIMARY KEY (`učesnik_id`),
  KEY `takmičenje_id` (`takmičenje_id`),
  KEY `ekipa_id` (`ekipa_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=127 ;

--
-- Dumping data for table `učesnici`
--

INSERT INTO `učesnici` VALUES(1, 1, 1);
INSERT INTO `učesnici` VALUES(2, 1, 2);
INSERT INTO `učesnici` VALUES(3, 1, 3);
INSERT INTO `učesnici` VALUES(4, 1, 4);
INSERT INTO `učesnici` VALUES(5, 1, 5);
INSERT INTO `učesnici` VALUES(6, 1, 6);
INSERT INTO `učesnici` VALUES(7, 1, 7);
INSERT INTO `učesnici` VALUES(8, 1, 8);
INSERT INTO `učesnici` VALUES(9, 1, 9);
INSERT INTO `učesnici` VALUES(10, 1, 10);
INSERT INTO `učesnici` VALUES(11, 1, 11);
INSERT INTO `učesnici` VALUES(12, 1, 12);
INSERT INTO `učesnici` VALUES(13, 1, 13);
INSERT INTO `učesnici` VALUES(14, 1, 14);
INSERT INTO `učesnici` VALUES(15, 1, 15);
INSERT INTO `učesnici` VALUES(16, 1, 16);
INSERT INTO `učesnici` VALUES(17, 1, 17);
INSERT INTO `učesnici` VALUES(18, 1, 18);
INSERT INTO `učesnici` VALUES(19, 1, 19);
INSERT INTO `učesnici` VALUES(20, 1, 20);
INSERT INTO `učesnici` VALUES(24, 2, 1);
INSERT INTO `učesnici` VALUES(25, 2, 2);
INSERT INTO `učesnici` VALUES(26, 2, 3);
INSERT INTO `učesnici` VALUES(27, 2, 4);
INSERT INTO `učesnici` VALUES(28, 2, 5);
INSERT INTO `učesnici` VALUES(29, 2, 6);
INSERT INTO `učesnici` VALUES(30, 2, 7);
INSERT INTO `učesnici` VALUES(31, 2, 8);
INSERT INTO `učesnici` VALUES(32, 2, 9);
INSERT INTO `učesnici` VALUES(33, 2, 10);
INSERT INTO `učesnici` VALUES(34, 2, 11);
INSERT INTO `učesnici` VALUES(35, 2, 12);
INSERT INTO `učesnici` VALUES(36, 2, 13);
INSERT INTO `učesnici` VALUES(37, 2, 14);
INSERT INTO `učesnici` VALUES(38, 2, 15);
INSERT INTO `učesnici` VALUES(39, 2, 16);
INSERT INTO `učesnici` VALUES(40, 2, 17);
INSERT INTO `učesnici` VALUES(41, 2, 18);
INSERT INTO `učesnici` VALUES(42, 2, 19);
INSERT INTO `učesnici` VALUES(43, 2, 20);
INSERT INTO `učesnici` VALUES(44, 2, 21);
INSERT INTO `učesnici` VALUES(45, 2, 22);
INSERT INTO `učesnici` VALUES(46, 2, 23);
INSERT INTO `učesnici` VALUES(47, 2, 24);
INSERT INTO `učesnici` VALUES(48, 2, 25);
INSERT INTO `učesnici` VALUES(49, 2, 26);
INSERT INTO `učesnici` VALUES(50, 2, 27);
INSERT INTO `učesnici` VALUES(51, 2, 28);
INSERT INTO `učesnici` VALUES(52, 2, 29);
INSERT INTO `učesnici` VALUES(53, 2, 30);
INSERT INTO `učesnici` VALUES(54, 2, 31);
INSERT INTO `učesnici` VALUES(55, 2, 32);
INSERT INTO `učesnici` VALUES(56, 2, 33);
INSERT INTO `učesnici` VALUES(57, 2, 34);
INSERT INTO `učesnici` VALUES(58, 2, 35);
INSERT INTO `učesnici` VALUES(59, 2, 36);
INSERT INTO `učesnici` VALUES(60, 2, 37);
INSERT INTO `učesnici` VALUES(61, 2, 38);
INSERT INTO `učesnici` VALUES(62, 2, 39);
INSERT INTO `učesnici` VALUES(63, 2, 40);
INSERT INTO `učesnici` VALUES(64, 2, 41);
INSERT INTO `učesnici` VALUES(65, 2, 42);
INSERT INTO `učesnici` VALUES(66, 2, 43);
INSERT INTO `učesnici` VALUES(67, 2, 44);
INSERT INTO `učesnici` VALUES(68, 3, 62);
INSERT INTO `učesnici` VALUES(69, 3, 63);
INSERT INTO `učesnici` VALUES(70, 3, 64);
INSERT INTO `učesnici` VALUES(71, 3, 65);
INSERT INTO `učesnici` VALUES(72, 3, 66);
INSERT INTO `učesnici` VALUES(73, 3, 67);
INSERT INTO `učesnici` VALUES(74, 3, 68);
INSERT INTO `učesnici` VALUES(75, 3, 69);
INSERT INTO `učesnici` VALUES(76, 3, 70);
INSERT INTO `učesnici` VALUES(77, 3, 71);
INSERT INTO `učesnici` VALUES(78, 3, 72);
INSERT INTO `učesnici` VALUES(79, 3, 73);
INSERT INTO `učesnici` VALUES(80, 3, 74);
INSERT INTO `učesnici` VALUES(81, 3, 75);
INSERT INTO `učesnici` VALUES(82, 3, 76);
INSERT INTO `učesnici` VALUES(83, 3, 77);
INSERT INTO `učesnici` VALUES(84, 3, 78);
INSERT INTO `učesnici` VALUES(85, 3, 79);
INSERT INTO `učesnici` VALUES(86, 3, 80);
INSERT INTO `učesnici` VALUES(87, 3, 81);
INSERT INTO `učesnici` VALUES(88, 4, 46);
INSERT INTO `učesnici` VALUES(89, 4, 47);
INSERT INTO `učesnici` VALUES(90, 4, 48);
INSERT INTO `učesnici` VALUES(91, 4, 49);
INSERT INTO `učesnici` VALUES(92, 4, 50);
INSERT INTO `učesnici` VALUES(93, 4, 51);
INSERT INTO `učesnici` VALUES(94, 4, 52);
INSERT INTO `učesnici` VALUES(95, 4, 53);
INSERT INTO `učesnici` VALUES(96, 4, 54);
INSERT INTO `učesnici` VALUES(97, 4, 55);
INSERT INTO `učesnici` VALUES(98, 4, 56);
INSERT INTO `učesnici` VALUES(99, 4, 57);
INSERT INTO `učesnici` VALUES(100, 4, 58);
INSERT INTO `učesnici` VALUES(101, 4, 59);
INSERT INTO `učesnici` VALUES(102, 4, 60);
INSERT INTO `učesnici` VALUES(103, 5, 21);
INSERT INTO `učesnici` VALUES(104, 5, 22);
INSERT INTO `učesnici` VALUES(105, 5, 23);
INSERT INTO `učesnici` VALUES(106, 5, 24);
INSERT INTO `učesnici` VALUES(107, 5, 25);
INSERT INTO `učesnici` VALUES(108, 5, 26);
INSERT INTO `učesnici` VALUES(109, 5, 27);
INSERT INTO `učesnici` VALUES(110, 5, 28);
INSERT INTO `učesnici` VALUES(111, 5, 29);
INSERT INTO `učesnici` VALUES(112, 5, 30);
INSERT INTO `učesnici` VALUES(113, 5, 31);
INSERT INTO `učesnici` VALUES(114, 5, 32);
INSERT INTO `učesnici` VALUES(115, 5, 33);
INSERT INTO `učesnici` VALUES(116, 5, 34);
INSERT INTO `učesnici` VALUES(117, 5, 35);
INSERT INTO `učesnici` VALUES(118, 5, 36);
INSERT INTO `učesnici` VALUES(119, 5, 37);
INSERT INTO `učesnici` VALUES(120, 5, 38);
INSERT INTO `učesnici` VALUES(121, 5, 39);
INSERT INTO `učesnici` VALUES(122, 5, 40);
INSERT INTO `učesnici` VALUES(123, 5, 41);
INSERT INTO `učesnici` VALUES(124, 5, 42);
INSERT INTO `učesnici` VALUES(125, 5, 43);
INSERT INTO `učesnici` VALUES(126, 5, 44);

-- --------------------------------------------------------

--
-- Table structure for table `vrste_igara`
--

CREATE TABLE `vrste_igara` (
  `oznaka_vrste_igre` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `detaljan_opis` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`oznaka_vrste_igre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vrste_igara`
--

INSERT INTO `vrste_igara` VALUES('1PP', 'Ishod u prvom poluvremenu', NULL);
INSERT INTO `vrste_igara` VALUES('1TM1', 'Domaćin - prvo poluvreme', 'Broj golova koje će postići domaćin u prvom poluvremenu');
INSERT INTO `vrste_igara` VALUES('1TM2', 'Gost - prvo poluvreme', 'Broj golova koje će postići gost u prvom poluvremenu');
INSERT INTO `vrste_igara` VALUES('1UG', 'Ukupno golova - prvo poluvreme', 'Ukupan broj postignutih golova u prvom poluvremenu');
INSERT INTO `vrste_igara` VALUES('2DP', 'Ishod u drugom poluvremnu', NULL);
INSERT INTO `vrste_igara` VALUES('2TM1', 'Domaćin - drugo poluvreme', 'Broj golova koje će postići domaćin u drugom poluvremenu');
INSERT INTO `vrste_igara` VALUES('2TM2', 'Gost - drugo poluvreme', 'Broj golova koje će postići gost u drugom poluvremenu');
INSERT INTO `vrste_igara` VALUES('2UG', 'Ukupno golova-drugo poluvreme', 'Ukupan broj postignutih golova u drugom poluvremenu');
INSERT INTO `vrste_igara` VALUES('DP', 'Dupla pobeda', 'Pobeda i u prvom i u drugom poluvremenu (pojedinačno)');
INSERT INTO `vrste_igara` VALUES('DS', 'Dupla šansa', NULL);
INSERT INTO `vrste_igara` VALUES('HP', 'Hendikep pobeda', 'Pobeda sa berem 2 gola razlike');
INSERT INTO `vrste_igara` VALUES('KI', 'Konačan ishod', NULL);
INSERT INTO `vrste_igara` VALUES('PK', 'Poluvreme-kraj', NULL);
INSERT INTO `vrste_igara` VALUES('SP', 'Sigurna pobeda', 'Pobeda bez primljenog gola');
INSERT INTO `vrste_igara` VALUES('TGG', 'Oba tima daju gol', NULL);
INSERT INTO `vrste_igara` VALUES('TM1', 'Domaćin daje gol', NULL);
INSERT INTO `vrste_igara` VALUES('TM2', 'Gost daje gol', NULL);
INSERT INTO `vrste_igara` VALUES('UG', 'Ukupno golova', NULL);
INSERT INTO `vrste_igara` VALUES('VG', 'Više golova', 'Poluvreme u kojem će biti postignuto više golova');
