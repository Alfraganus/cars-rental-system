-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2019 at 01:26 PM
-- Server version: 5.7.20
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `airbag`
--

CREATE TABLE `airbag` (
  `id` int(20) NOT NULL,
  `name_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_ru` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_cz` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airbag`
--

INSERT INTO `airbag` (`id`, `name_en`, `name_ru`, `name_cz`) VALUES
(2, '2x Airbags', 'Ru airbas', 'airbagi'),
(3, '6x Airbags', '6x Airbags', '6x Airbags'),
(5, '4x Airbags', '4x подушки безопасности', '4x airbagy');

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Admin', '1', 1529243668),
('Admin', '2', 1529070236);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1526486775, 1526486775),
('/admin/*', 2, NULL, NULL, NULL, 1526486771, 1526486771),
('/admin/car/*', 2, NULL, NULL, NULL, 1526486771, 1526486771),
('/admin/car/create', 2, NULL, NULL, NULL, 1526486771, 1526486771),
('/admin/car/delete', 2, NULL, NULL, NULL, 1526486771, 1526486771),
('/admin/car/index', 2, NULL, NULL, NULL, 1526486771, 1526486771),
('/admin/car/update', 2, NULL, NULL, NULL, 1526486771, 1526486771),
('/admin/car/view', 2, NULL, NULL, NULL, 1526486771, 1526486771),
('/admin/default/*', 2, NULL, NULL, NULL, 1526486771, 1526486771),
('/admin/default/index', 2, NULL, NULL, NULL, 1526486771, 1526486771),
('/car/*', 2, NULL, NULL, NULL, 1526486774, 1526486774),
('/car/create', 2, NULL, NULL, NULL, 1526486774, 1526486774),
('/car/delete', 2, NULL, NULL, NULL, 1526486774, 1526486774),
('/car/index', 2, NULL, NULL, NULL, 1526486774, 1526486774),
('/car/update', 2, NULL, NULL, NULL, 1526486774, 1526486774),
('/car/view', 2, NULL, NULL, NULL, 1526486774, 1526486774),
('/debug/*', 2, NULL, NULL, NULL, 1526486774, 1526486774),
('/debug/default/*', 2, NULL, NULL, NULL, 1526486774, 1526486774),
('/debug/default/db-explain', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/debug/default/download-mail', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/debug/default/index', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/debug/default/toolbar', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/debug/default/view', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/gii/*', 2, NULL, NULL, NULL, 1526486774, 1526486774),
('/gii/default/*', 2, NULL, NULL, NULL, 1526486774, 1526486774),
('/gii/default/action', 2, NULL, NULL, NULL, 1526486774, 1526486774),
('/gii/default/diff', 2, NULL, NULL, NULL, 1526486774, 1526486774),
('/gii/default/index', 2, NULL, NULL, NULL, 1526486774, 1526486774),
('/gii/default/preview', 2, NULL, NULL, NULL, 1526486774, 1526486774),
('/gii/default/view', 2, NULL, NULL, NULL, 1526486774, 1526486774),
('/rbac/*', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/rbac/assignment/*', 2, NULL, NULL, NULL, 1526486771, 1526486771),
('/rbac/assignment/assign', 2, NULL, NULL, NULL, 1526486771, 1526486771),
('/rbac/assignment/index', 2, NULL, NULL, NULL, 1526486771, 1526486771),
('/rbac/assignment/revoke', 2, NULL, NULL, NULL, 1526486771, 1526486771),
('/rbac/assignment/view', 2, NULL, NULL, NULL, 1526486771, 1526486771),
('/rbac/default/*', 2, NULL, NULL, NULL, 1526486771, 1526486771),
('/rbac/default/index', 2, NULL, NULL, NULL, 1526486771, 1526486771),
('/rbac/menu/*', 2, NULL, NULL, NULL, 1526486772, 1526486772),
('/rbac/menu/create', 2, NULL, NULL, NULL, 1526486771, 1526486771),
('/rbac/menu/delete', 2, NULL, NULL, NULL, 1526486772, 1526486772),
('/rbac/menu/index', 2, NULL, NULL, NULL, 1526486771, 1526486771),
('/rbac/menu/update', 2, NULL, NULL, NULL, 1526486772, 1526486772),
('/rbac/menu/view', 2, NULL, NULL, NULL, 1526486771, 1526486771),
('/rbac/permission/*', 2, NULL, NULL, NULL, 1526486772, 1526486772),
('/rbac/permission/assign', 2, NULL, NULL, NULL, 1526486772, 1526486772),
('/rbac/permission/create', 2, NULL, NULL, NULL, 1526486772, 1526486772),
('/rbac/permission/delete', 2, NULL, NULL, NULL, 1526486772, 1526486772),
('/rbac/permission/index', 2, NULL, NULL, NULL, 1526486772, 1526486772),
('/rbac/permission/remove', 2, NULL, NULL, NULL, 1526486772, 1526486772),
('/rbac/permission/update', 2, NULL, NULL, NULL, 1526486772, 1526486772),
('/rbac/permission/view', 2, NULL, NULL, NULL, 1526486772, 1526486772),
('/rbac/role/*', 2, NULL, NULL, NULL, 1526486772, 1526486772),
('/rbac/role/assign', 2, NULL, NULL, NULL, 1526486772, 1526486772),
('/rbac/role/create', 2, NULL, NULL, NULL, 1526486772, 1526486772),
('/rbac/role/delete', 2, NULL, NULL, NULL, 1526486772, 1526486772),
('/rbac/role/index', 2, NULL, NULL, NULL, 1526486772, 1526486772),
('/rbac/role/remove', 2, NULL, NULL, NULL, 1526486772, 1526486772),
('/rbac/role/update', 2, NULL, NULL, NULL, 1526486772, 1526486772),
('/rbac/role/view', 2, NULL, NULL, NULL, 1526486772, 1526486772),
('/rbac/route/*', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/rbac/route/assign', 2, NULL, NULL, NULL, 1526486772, 1526486772),
('/rbac/route/create', 2, NULL, NULL, NULL, 1526486772, 1526486772),
('/rbac/route/index', 2, NULL, NULL, NULL, 1526486772, 1526486772),
('/rbac/route/refresh', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/rbac/route/remove', 2, NULL, NULL, NULL, 1526486772, 1526486772),
('/rbac/rule/*', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/rbac/rule/create', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/rbac/rule/delete', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/rbac/rule/index', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/rbac/rule/update', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/rbac/rule/view', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/rbac/user/*', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/rbac/user/activate', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/rbac/user/change-password', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/rbac/user/delete', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/rbac/user/index', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/rbac/user/login', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/rbac/user/logout', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/rbac/user/request-password-reset', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/rbac/user/reset-password', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/rbac/user/signup', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/rbac/user/view', 2, NULL, NULL, NULL, 1526486773, 1526486773),
('/site/*', 2, NULL, NULL, NULL, 1526486775, 1526486775),
('/site/about', 2, NULL, NULL, NULL, 1526486775, 1526486775),
('/site/booking', 2, NULL, NULL, NULL, 1526486775, 1526486775),
('/site/captcha', 2, NULL, NULL, NULL, 1526486774, 1526486774),
('/site/contact', 2, NULL, NULL, NULL, 1526486775, 1526486775),
('/site/error', 2, NULL, NULL, NULL, 1526486774, 1526486774),
('/site/index', 2, NULL, NULL, NULL, 1526486774, 1526486774),
('/site/login', 2, NULL, NULL, NULL, 1526486774, 1526486774),
('/site/logout', 2, NULL, NULL, NULL, 1526486775, 1526486775),
('Admin', 1, 'have all rights', NULL, NULL, 1526486725, 1526486725);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Admin', '/*'),
('Admin', '/admin/*'),
('Admin', '/admin/car/*'),
('Admin', '/admin/car/create'),
('Admin', '/admin/car/delete'),
('Admin', '/admin/car/index'),
('Admin', '/admin/car/update'),
('Admin', '/admin/car/view'),
('Admin', '/admin/default/*'),
('Admin', '/admin/default/index'),
('Admin', '/car/*'),
('Admin', '/car/create'),
('Admin', '/car/delete'),
('Admin', '/car/index'),
('Admin', '/car/update'),
('Admin', '/car/view'),
('Admin', '/debug/*'),
('Admin', '/debug/default/*'),
('Admin', '/debug/default/db-explain'),
('Admin', '/debug/default/download-mail'),
('Admin', '/debug/default/index'),
('Admin', '/debug/default/toolbar'),
('Admin', '/debug/default/view'),
('Admin', '/gii/*'),
('Admin', '/gii/default/*'),
('Admin', '/gii/default/action'),
('Admin', '/gii/default/diff'),
('Admin', '/gii/default/index'),
('Admin', '/gii/default/preview'),
('Admin', '/gii/default/view'),
('Admin', '/rbac/*'),
('Admin', '/rbac/assignment/*'),
('Admin', '/rbac/assignment/assign'),
('Admin', '/rbac/assignment/index'),
('Admin', '/rbac/assignment/revoke'),
('Admin', '/rbac/assignment/view'),
('Admin', '/rbac/default/*'),
('Admin', '/rbac/default/index'),
('Admin', '/rbac/menu/*'),
('Admin', '/rbac/menu/create'),
('Admin', '/rbac/menu/delete'),
('Admin', '/rbac/menu/index'),
('Admin', '/rbac/menu/update'),
('Admin', '/rbac/menu/view'),
('Admin', '/rbac/permission/*'),
('Admin', '/rbac/permission/assign'),
('Admin', '/rbac/permission/create'),
('Admin', '/rbac/permission/delete'),
('Admin', '/rbac/permission/index'),
('Admin', '/rbac/permission/remove'),
('Admin', '/rbac/permission/update'),
('Admin', '/rbac/permission/view'),
('Admin', '/rbac/role/*'),
('Admin', '/rbac/role/assign'),
('Admin', '/rbac/role/create'),
('Admin', '/rbac/role/delete'),
('Admin', '/rbac/role/index'),
('Admin', '/rbac/role/remove'),
('Admin', '/rbac/role/update'),
('Admin', '/rbac/role/view'),
('Admin', '/rbac/route/*'),
('Admin', '/rbac/route/assign'),
('Admin', '/rbac/route/create'),
('Admin', '/rbac/route/index'),
('Admin', '/rbac/route/refresh'),
('Admin', '/rbac/route/remove'),
('Admin', '/rbac/rule/*'),
('Admin', '/rbac/rule/create'),
('Admin', '/rbac/rule/delete'),
('Admin', '/rbac/rule/index'),
('Admin', '/rbac/rule/update'),
('Admin', '/rbac/rule/view'),
('Admin', '/rbac/user/*'),
('Admin', '/rbac/user/activate'),
('Admin', '/rbac/user/change-password'),
('Admin', '/rbac/user/delete'),
('Admin', '/rbac/user/index'),
('Admin', '/rbac/user/login'),
('Admin', '/rbac/user/logout'),
('Admin', '/rbac/user/request-password-reset'),
('Admin', '/rbac/user/reset-password'),
('Admin', '/rbac/user/signup'),
('Admin', '/rbac/user/view'),
('Admin', '/site/*'),
('Admin', '/site/about'),
('Admin', '/site/booking'),
('Admin', '/site/captcha'),
('Admin', '/site/contact'),
('Admin', '/site/error'),
('Admin', '/site/index'),
('Admin', '/site/login'),
('Admin', '/site/logout');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `available_times`
--

CREATE TABLE `available_times` (
  `id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `available_times`
--

INSERT INTO `available_times` (`id`, `time`) VALUES
(1, '09:00'),
(2, '18:00');

-- --------------------------------------------------------

--
-- Table structure for table `cargallary`
--

CREATE TABLE `cargallary` (
  `id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `car_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cargallary`
--

INSERT INTO `cargallary` (`id`, `image`, `car_id`) VALUES
(39, '1532107452 - photo_2018-07-20_14-19-58.jpg', 29),
(40, '1532107452 - photo_2018-07-20_14-20-17.jpg', 29),
(41, '1532107452 - photo_2018-07-20_14-20-59.jpg', 29),
(42, '1532107452 - photo_2018-07-20_14-21-20.jpg', 29),
(43, '1532107452 - photo_2018-07-20_14-22-00.jpg', 29),
(44, '1532107452 - photo_2018-07-20_14-25-39.jpg', 29),
(45, '1532107452 - photo_2018-07-20_14-25-59.jpg', 29),
(46, '1532107452 - photo_2018-07-20_14-27-57.jpg', 29),
(47, '1532191324 - volkswagen-golf-vi-2-0-tdi-comfortline-navi.jpg', 30),
(48, '1532191324 - volkswagen-golf-vi-2-0-tdi-comfortline-navi1.jpg', 30),
(49, '1532191324 - volkswagen-golf-vi-2-0-tdi-comfortline-navi3.jpg', 30),
(50, '1532191324 - volkswagen-golf-vi-2-0-tdi-comfortline-navi5.jpg', 30),
(51, '1532191324 - volkswagen-golf-vi-2-0-tdi-comfortline-navi6.jpg', 30),
(52, '1532191324 - volkswagen-golf-vi-2-0-tdi-comfortline-navia.jpg', 30),
(53, '1532191324 - volkswagen-golf-vi-2-0-tdi-comfortline-navib.jpg', 30),
(54, '1532191324 - volkswagen-golf-vi-2-0-tdi-comfortline-navie.jpg', 30),
(55, '1532191324 - volkswagen-golf-vi-2-0-tdi-comfortline-navif.jpg', 30),
(56, '1532191324 - volkswagen-golf-vi-2-0-tdi-comfortline-navix.jpg', 30),
(57, '1535210705 - skoda-octavia-1-6-fsi-ambiente-klima.jpg', 31),
(58, '1535212465 - hyundai-i40-1-7-crdi-cr-aut-klim.jpg', 32),
(59, '1535212465 - hyundai-i40-1-7-crdi-cr-aut-klima (1).jpg', 32),
(60, '1535212465 - hyundai-i40-1-7-crdi-cr-aut-klima (2).jpg', 32),
(61, '1535212465 - hyundai-i40-1-7-crdi-cr-aut-klima.jpg', 32),
(62, '1535212813 - hyundai-i40-1-7-crdi-cr-aut-klim.jpg', 33),
(63, '1535212813 - hyundai-i40-1-7-crdi-cr-aut-klima (1).jpg', 33),
(64, '1535212813 - hyundai-i40-1-7-crdi-cr-aut-klima (2).jpg', 33),
(65, '1535212813 - hyundai-i40-1-7-crdi-cr-aut-klima.jpg', 33),
(66, '1535213174 - ford-focus-trend-1-6tdci-95k-komb.jpg', 34),
(67, '1535213174 - ford-focus-trend-1-6tdci-95k-kombi (1).jpg', 34),
(68, '1535213174 - ford-focus-trend-1-6tdci-95k-kombi.jpg', 34),
(69, '1535213174 - hyundai-i40-1-7-crdi-cr-aut-klima.jpg', 34),
(70, '1535213455 - hyundai-i40-1-7-crdi-cr-aut-klima.jpg', 35),
(71, '1535213455 - skoda-fabia-combi-1-6tdi-ambit-cz-1-maj (1).jpg', 35),
(72, '1535213455 - skoda-fabia-combi-1-6tdi-ambit-cz-1-maj (2).jpg', 35),
(73, '1535213455 - skoda-fabia-combi-1-6tdi-ambit-cz-1-maj.jpg', 35);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(100) NOT NULL,
  `name_en` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_ru` varchar(150) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `name_cz` varchar(150) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `description_en` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description_ru` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description_cz` varchar(200) NOT NULL,
  `location` int(11) NOT NULL,
  `manual` int(11) DEFAULT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `airbag` int(10) DEFAULT NULL,
  `fuel` int(11) DEFAULT NULL,
  `condin` int(11) DEFAULT NULL,
  `radio` int(11) DEFAULT NULL,
  `rasxod` int(25) DEFAULT NULL,
  `km` int(50) DEFAULT NULL,
  `manufactureyear` int(11) DEFAULT NULL,
  `price_cz` int(11) DEFAULT NULL,
  `price_en` int(11) NOT NULL,
  `price_ru` int(11) NOT NULL,
  `isreserved` int(11) DEFAULT NULL,
  `dateto` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `status` smallint(6) DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `name_en`, `name_ru`, `name_cz`, `description_en`, `description_ru`, `description_cz`, `location`, `manual`, `image`, `airbag`, `fuel`, `condin`, `radio`, `rasxod`, `km`, `manufactureyear`, `price_cz`, `price_en`, `price_ru`, `isreserved`, `dateto`, `category`, `created_by`, `status`) VALUES
(29, 'Volkswagen Golf	 1.6 TDi Style,  sada kol', 'Volkswagen Golf	 1.6 TDi Style,  sada kol', 'Volkswagen Golf	 1.6 TDi Style,  sada kol', 'ABS, 6x airbags, ASR (anti-slip regulation), CD player, Central - Remote, windscreen wiper sensor, el. mirrors, aut. air conditioning, arm rest', 'ABS, 6x подушки безопасности, ASR (противоскользящее регулирование), CD-плеер, Центральный пульт ДУ, датчик стеклоочистителя, эл. зеркала, автомат. кондиционер, подлокотник', 'ABS, 6x airbag, protiprokluzový systém kol (ASR), CD p?ehráva?, centrál dálkový, senzor st?ra??, el. zrcátka, aut. klimatizace, loketní op?rka', 1, 1, NULL, 3, 3, 1, 1, 4, 110000, 2012, 1000, 50, 0, 0, NULL, 3, NULL, 10),
(30, 'Volkswagen Golf	 VI 1.6 TDi Comfortline', 'Volkswagen Golf	 VI 1.6 TDi Comfortline', 'Volkswagen Golf	 VI 1.6 TDi Comfortline', 'ABS, 6x airbags, remote control, wiper sensor, el. folding mirrors, el. side mirrors, bi-xenon headlights, stabilizace podvozku (ESP), aut. air conditioning, alloy wheels, arm rest', 'ABS, 6x подушки безопасности, дистанционное управление, датчик стеклоочистителя, эл. складывающиеся зеркала, Эл. боковые зеркала, биксеноновые фары, стабилизатор подвозку (ESP)', 'ABS, 6x airbag, centrál dálkový, senzor st?ra??, el. sklopná zrcátka, el. zrcátka, bixenonové sv?tlomety, stabilizace podvozku (ESP), aut. klimatizace, litá kola, loketní op?rka', 1, 2, NULL, 3, 3, 1, 1, 6, 180000, 2012, 1000, 50, 0, 0, NULL, 3, NULL, 10),
(31, 'Škoda Octavia	 1.6 FSI Ambiente, klima', 'Škoda Octavia	 1.6 FSI Ambiente, klima', 'Škoda Octavia	 1.6 FSI Ambiente, klima', 'Při použití financování na leasing nebo úvěr sleva 35 000 Kč. Otevřeno denně (včetně víkendů a svátků) 9.00​-22.00 hod. Kupujte vozy s garancí!', 'При использовании лизинга или кредитного финансирования скидка в размере 35 000 чешских крон. Открыт ежедневно (включая выходные и праздничные дни) 9.00 - 22.00. Покупайте автомобили с гарантией!', 'When using leasing or loan financing a discount of CZK 35,000. Open daily (including weekends and public holidays) 9.00 - 22.00 hrs. Buy cars with warranty!', 1, 2, NULL, 2, 1, 1, 1, 8, 2500, 2005, 1000, 50, 0, 0, NULL, 3, NULL, 5),
(32, 'Hyundai i40	 1.7 CRDi, ČR, Aut.klima', 'Hyundai i40	 1.7 CRDi, ČR, Aut.klima', 'Hyundai i40	 1.7 CRDi, ČR, Aut.klima', 'ABS, 6x airbag, protiprokluzový systém kol (ASR), centrál dálkový, el. sklopná zrcátka, el. zrcátka, aut. klimatizace, litá kola, přední světla LED, loketní opěrka, mlhovky.', 'ABS, 6x воздушная подушка, ASR (противоскользящее регулирование), дистанционное управление, эл. складывающиеся зеркала, Эл. зеркала, автомат. кондиционер, литые диски, светодиодные фары', 'ABS, 6x airbag, ASR (anti-slip regulation), remote control, el. folding mirrors, el. mirrors, aut. air conditioning, cast wheels, LED headlights, arm rest, fog lights.', 1, 2, NULL, 3, 2, 1, 1, 8, 2000, 2014, 1000, 50, 0, 0, NULL, 3, NULL, 5),
(33, 'Hyundai i40	 1.7 CRDi, ČR, Aut.klima', 'Hyundai i40	 1.7 CRDi, ČR, Aut.klima', 'Hyundai i40	 1.7 CRDi, ČR, Aut.klima', 'ABS, 6x airbag, ASR (anti-slip regulation), remote control, el. folding mirrors, el. mirrors, aut. electric windows, electric wing mirrors, front fog lights, heated mirrors, light-alloy wheels', 'ABS, 6x воздушная подушка, ASR (противоскользящее регулирование), дистанционное управление, эл. складывающиеся зеркала, Эл. зеркала, автомат. электрические стеклоподъемники', 'ABS, 6x airbag, ASR (protiprokluzový systém), centrál dálkový, el. sklopná zrcátka, el. zrcátka, aut. elektrické ovládání oken, el. zrcátka, p?ední mlhovky, vyh?ívaná zrcátka, kola z lehkých slitin', 1, 2, NULL, 3, 2, 1, 1, 8, 3500, 2013, 1200, 60, 0, 0, NULL, 3, NULL, 5),
(34, 'Ford Focus	 Trend 1.6TDCi 95k kombi', 'Ford Focus	 Trend 1.6TDCi 95k kombi', 'Ford Focus	 Trend 1.6TDCi 95k kombi', 'manual transmission, 6 gears, 6x airbags, ABS, brake assistant, stabilizace podvozku (ESP), power steering, air-conditioning, on-board computer, adjustable steering wheel,', 'механическая коробка передач, 6 передач, 6x подушки безопасности, ABS, усилитель тормозов, Электронная программа стабилизации (ЭСП), усилитель руля, кондиционер', 'manuální p?evodovka, 6 rychlostních stup??, 6x airbag, ABS, brzdový asistent, stabilizace podvozku (ESP), posilova? ?ízení, klimatizace, palubní po?íta?, nastavitelný volant,', 1, 1, NULL, 3, 2, 1, 1, 6, 4000, 2014, 1100, 55, 0, 0, NULL, 3, NULL, 5),
(35, 'Škoda Fabia	 Combi 1,6TDI Ambit .CZ, 1.ma', 'Škoda Fabia	 Combi 1,6TDI Ambit .CZ, 1.ma', 'Škoda Fabia	 Combi 1,6TDI Ambit .CZ, 1.ma', 'manual transmission, 4x airbags, ABS, electronic stability program (ESP), power steering, air-conditioning, handsfree, el. front', 'механическая коробка передач, 4x подушки безопасности, ABS, Электронная программа стабилизации (ЭСП), усилитель руля, кондиционер, громкая связь, эл. передний', 'manuální p?evodovka, 4x airbag, ABS, stabilizace podvozku (ESP), posilova? ?ízení, klimatizace, nastavitelný volant, hands free, el. p?ední', 1, 1, NULL, 5, 2, 1, 1, 7, 4200, 2014, 1000, 50, 0, 0, NULL, 3, NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `car_extras`
--

CREATE TABLE `car_extras` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) NOT NULL COMMENT 'Service name',
  `name_cz` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` float DEFAULT NULL COMMENT 'Service price',
  `is_price_by_day` smallint(6) NOT NULL DEFAULT '1' COMMENT 'If 1 calc by day or all'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_extras`
--

INSERT INTO `car_extras` (`id`, `name_en`, `name_cz`, `price`, `is_price_by_day`) VALUES
(1, 'Baby Seat', 'Dětské sedátko', 5, 1),
(2, 'Car Seat For Childres', 'Autosedačka pro děti', 3, 1),
(3, 'Navigation', 'Navigace', 9, 0),
(4, 'Excess Protection', 'Nadbytečná ochrana', 22, 1),
(6, 'Ful Rent a Car Insures', 'Úplné půjčení a pojištění automobilu', NULL, 0),
(7, 'Wheels and Glass Insures', 'Kola a pojištění skla', NULL, 0),
(8, 'Taking from Airport', 'Vzít z letiště', NULL, 0),
(9, 'Unlimited Kilometres for a day', 'Neomezené kilometry za den', NULL, 0),
(10, 'VAT', 'káď', NULL, 0),
(11, 'More then 300km / day', 'Více než 300 km / den', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(80) NOT NULL,
  `event_detail` varchar(255) NOT NULL,
  `event_start_date` datetime NOT NULL,
  `event_end_date` datetime NOT NULL,
  `event_type` int(11) NOT NULL,
  `event_url` varchar(255) DEFAULT NULL,
  `event_all_day` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_detail`, `event_start_date`, `event_end_date`, `event_type`, `event_url`, `event_all_day`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_status`) VALUES
(1, 'car', 'car', '2018-06-21 02:00:00', '2018-06-21 02:00:00', 2, NULL, 0, '2018-06-03 22:36:02', 1, NULL, NULL, 0),
(2, 'car', '2', '2018-06-12 02:00:00', '2018-06-15 06:25:00', 1, NULL, 0, '2018-06-04 00:42:59', 1, NULL, NULL, 0),
(3, 'qfwqf', '23f', '2018-06-16 02:00:00', '2018-06-16 02:00:00', 2, NULL, 0, '2018-06-07 14:06:40', 1, NULL, NULL, 0),
(4, 'hellc', 'yeah', '2018-06-03 02:00:00', '2018-06-03 02:00:00', 2, NULL, 0, '2018-06-07 14:08:43', 1, NULL, NULL, 2),
(5, 'qfwqf', '8949', '2018-06-22 02:00:00', '2018-06-22 02:00:00', 3, NULL, 0, '2018-06-07 20:50:14', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_ru` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_cz` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content_ru` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content_cz` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fuel_type`
--

CREATE TABLE `fuel_type` (
  `id` int(11) NOT NULL,
  `name_en` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_ru` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cz` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fuel_type`
--

INSERT INTO `fuel_type` (`id`, `name_en`, `name_ru`, `name_cz`) VALUES
(1, 'petrol', 'бензин', 'benzín'),
(2, 'Oil', 'Oil', 'nafta'),
(3, 'Diesel', 'дизель', 'Diesel');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cz` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `delivery_price` float DEFAULT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name_en`, `name_ru`, `name_cz`, `delivery_price`, `lat`, `lng`) VALUES
(1, 'Prague 3, Zizkov', 'Прага 3, Жижков', 'Praha 3, Zizkov', NULL, 14.2245, 50.0745),
(2, 'Hotel delivery', 'Доставка в гостиницу', 'Hotel delivery', 10, 14.3216, 50.0223);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu_text`
--

CREATE TABLE `menu_text` (
  `id` int(11) NOT NULL,
  `title_en` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_ru` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_cz` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content_en` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content_ru` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content_cz` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_text`
--

INSERT INTO `menu_text` (`id`, `title_en`, `title_ru`, `title_cz`, `content_en`, `content_ru`, `content_cz`) VALUES
(1, 'Rent A Car', 'Аренда автомобилей', 'Půjčit auto', 'Find the best rental prices on luxury, economy, and family rental cars, we offer more than 40 types of cars with luxurious services ', '\r\n132/5000\r\nНайдите лучшие цены на аренду автомобилей класса люкс, эконом и семьи, мы предлагаем более 40 видов автомобилей с роскошными услугами', 'Najděte nejlepší ceny za pronájem luxusních, ekonomických a rodinných automobilů, nabízíme více než 40 typů vozů s luxusními službami');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offer_category`
--

CREATE TABLE `offer_category` (
  `id` int(11) NOT NULL,
  `name_en` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_ru` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_cz` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer_category`
--

INSERT INTO `offer_category` (`id`, `name_en`, `name_ru`, `name_cz`) VALUES
(1, 'Economic', 'экономический', 'Hospodářský'),
(2, 'Premium', 'Премиум', 'Premium'),
(3, 'Best offers', 'Лучшие предложения', 'Nejlepší nabídky');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `sale` varchar(255) DEFAULT NULL,
  `pick_up_location` int(11) NOT NULL,
  `dropp_off_location` int(11) NOT NULL,
  `car_extras` varchar(255) DEFAULT NULL,
  `free_car_extras` varchar(255) DEFAULT NULL,
  `gender` smallint(6) NOT NULL DEFAULT '0',
  `name_and_surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `cell_phone_number` varchar(255) DEFAULT NULL,
  `payment_type` smallint(6) NOT NULL,
  `comment` text,
  `car_id` int(100) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `reserved_dates` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `amount`, `sale`, `pick_up_location`, `dropp_off_location`, `car_extras`, `free_car_extras`, `gender`, `name_and_surname`, `email`, `phone_number`, `cell_phone_number`, `payment_type`, `comment`, `car_id`, `status`, `created_at`, `updated_at`, `cancelled_at`, `reserved_dates`) VALUES
(37, 684.5, '7 % sale for ranting car more than 7 days', 1, 1, '[\"1\",\"2\",\"3\",\"4\",\"11\"]', '\"\"', 0, 'Nematov', 'some@gmail.com', '', '', 1, '', 29, 1, 1534312048, 1534312064, NULL, '[\"15.08\",\"16.08\",\"17.08\",\"23.08\",\"24.08\",\"25.08\",\"18.08\"]'),
(38, 581, '7 % sale for ranting car more than 7 days', 1, 1, '[\"1\",\"3\",\"11\"]', '[\"6\",\"8\",\"9\"]', 0, 'Soliyev', 'ggg@gmail.com', '', '', 1, '', 30, 1, 1534312604, NULL, NULL, '[\"01.08\",\"02.08\",\"03.08\",\"04.08\",\"05.08\",\"06.08\",\"07.08\",\"08.08\"]'),
(39, 166.5, '5 % sale for ranting car more than 3 days', 1, 1, '[\"1\",\"2\"]', '\"\"', 0, 'Murodjon Ganiyev', 'msganiyev@gmail.com', '+420773109205', '+420773109205', 1, '', 29, 1, 1535102929, 1535924061, NULL, '[\"17.09\",\"16.09\",\"18.09\"]'),
(40, 166.5, '5 % sale for ranting car more than 3 days', 1, 1, '[\"1\",\"2\"]', '\"\"', 0, 'test', 'test@mail.ru', '223', '2323', 1, 'test', 29, 1, 1535174476, 1536161301, NULL, '[\"02.10\",\"03.10\",\"04.10\"]'),
(42, 237.5, '5 % sale for ranting car more than 3 days', 1, 1, '\"\"', '\"\"', 0, 'test', 'tests@gsda.cz', '', '', 1, '', 30, 1, 1535447664, 1535924081, NULL, '[\"29.08\",\"30.08\",\"31.08\",\"01.09\",\"02.09\"]'),
(43, 142.5, '5 % sale for ranting car more than 3 days', 1, 1, '\"\"', '\"\"', 0, 'Gulomjon', 'Sulaymonov', '99899', '9989898', 1, 'TEST', 29, 1, 1536166308, NULL, NULL, '[\"29.09\",\"21.09\",\"14.09\"]'),
(44, 202.5, '5 % sale for ranting car more than 3 days', 1, 1, '[\"11\"]', '\"\"', 0, 'test', 'test@test.ru', 'test', '2323', 1, 'test', 29, 1, 1536166510, NULL, NULL, '[\"05.10\",\"13.10\",\"07.10\"]'),
(58, 50, NULL, 1, 1, '\"\"', '\"\"', 0, 'fwe', 'f@we.r', '', '', 2, '', 29, 1, 1540927680, NULL, NULL, '[\"31.10\"]'),
(59, 100, NULL, 1, 1, '\"\"', '\"\"', 0, '34', 'QQ@WE.E', 'WW', '5645', 2, '', 29, 1, 1542525647, NULL, NULL, '[\"19.11\",\"20.11\"]');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_id` varchar(50) DEFAULT NULL,
  `payer_id` varchar(50) DEFAULT NULL,
  `sale_id` varchar(50) DEFAULT NULL,
  `payment_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `radio`
--

CREATE TABLE `radio` (
  `id` int(11) NOT NULL,
  `name_en` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_ru` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_cz` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `radio`
--

INSERT INTO `radio` (`id`, `name_en`, `name_ru`, `name_cz`) VALUES
(1, 'Radio cd', 'Радио CD', 'Rádio cd');

-- --------------------------------------------------------

--
-- Table structure for table `reserved_dates`
--

CREATE TABLE `reserved_dates` (
  `id` int(100) NOT NULL,
  `starting_date` date NOT NULL,
  `finishing_Date` date NOT NULL,
  `car_id` int(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserved_dates`
--

INSERT INTO `reserved_dates` (`id`, `starting_date`, `finishing_Date`, `car_id`, `user_id`) VALUES
(1, '2018-06-06', '2018-06-09', 1, 1),
(2, '2018-06-13', '2018-06-13', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `day` int(11) NOT NULL COMMENT 'After daye',
  `sale` float NOT NULL COMMENT 'Sale'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `day`, `sale`) VALUES
(1, 3, 5),
(2, 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `occupation_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `occupation_ru` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `occupation_cz` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `image`, `name`, `surname`, `occupation_en`, `occupation_ru`, `occupation_cz`, `skype`, `mobile`, `email`) VALUES
(1, 'team-270x270x3.jpg', 'Alfina', 'Genesis', 'programmerYii2 programmer', 'Yii2 programmer', 'Programmator', 'uzandrew.', '8936303267', 'uzpsychologist@gmail.com'),
(2, 'team-270x270x4.jpg', 'Mark', 'Tusan', 'Driver', 'Programmista', 'Programmator', 'uzandrew.', '8999066112', 'uzpsychologist@gmail.com'),
(3, 'team-270x270x2.jpg', 'Jack', 'Hackinburg', 'Truck driver', 'Truck driver', 'Truck driver', 'hakin2.sky', '420554778965', 'haling@seznam.cz'),
(4, 'team-270x270x1.jpg', 'Janila', 'Genesis', 'Editor', 'Editor', 'Editor', 'Jania998', '420225665887', 'janila@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `content_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content_ru` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content_cz` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `content_en`, `content_ru`, `content_cz`, `name`, `image`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'Alfraganus', 'm_unsexy.jpg'),
(2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'Johna  Praguenchick', 'pexels-photo-355164.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `isAdmin` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `isAdmin`) VALUES
(1, 'Alfraganus', 'OwKI2O3eb67kF-cb9F2xvvwE1SBl1sbk', '$2y$13$zqTxiJHFEBczCQOUb5E61.fkSEX8MPVgXF/Tt18ruDPbF3moCDMYO', NULL, 'uzpsychologist@gmail.com', 10, 1528006024, 1528006024, 0),
(2, 'Rental', 'bVmVYm9bX6xuWLt4iC8x_2qo6kDWEQ2J', '$2y$13$/28KPfmcvAauIwcM/ecCJubJgBHVDXNcc9707K3hVW4lgBmRCeAGS', NULL, 'info@rental.com', 10, 1529069957, 1529069957, 1),
(3, 'webmaster', 'oj9dbeaGkE0JxDGKNNx1H52MN90RQRtx', '$2y$13$oe0wC2brt7SXgLGB8dwfQO3JUpvZ3I7vis5q29wh.6teAnIxz2kkC', NULL, 'webmaster@gmail.com', 10, 1529232622, 1529232622, 0),
(4, 'admincha', 'RnTgkGERxDqdOU1gUPbeE-PPuTfxIVoD', '$2y$13$d4TmHTc4wHHHQe4SJ96iM.FmGABfsmSHFGnctw7dARPVSqN9.oVti', NULL, 'msganiyev@gmail.com', 10, 1529268732, 1529268732, 0),
(5, 'Murodjon', 'BkQhRwDaRFhZfaP4Q91Pp48cTkcbRU9x', '$2y$13$oxqou0VoVzK4homrICV5/.uoVkzxaPA10IP/p9JMmlTWfXwsl9s9a', NULL, 'msganiyev2@gmail.com', 10, 1531850930, 1531850930, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airbag`
--
ALTER TABLE `airbag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `available_times`
--
ALTER TABLE `available_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cargallary`
--
ALTER TABLE `cargallary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `car_extras`
--
ALTER TABLE `car_extras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel_type`
--
ALTER TABLE `fuel_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `menu_text`
--
ALTER TABLE `menu_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `offer_category`
--
ALTER TABLE `offer_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pick_up_location` (`pick_up_location`),
  ADD KEY `dropp_off_location` (`dropp_off_location`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radio`
--
ALTER TABLE `radio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserved_dates`
--
ALTER TABLE `reserved_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airbag`
--
ALTER TABLE `airbag`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `available_times`
--
ALTER TABLE `available_times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cargallary`
--
ALTER TABLE `cargallary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `car_extras`
--
ALTER TABLE `car_extras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fuel_type`
--
ALTER TABLE `fuel_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_text`
--
ALTER TABLE `menu_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offer_category`
--
ALTER TABLE `offer_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `radio`
--
ALTER TABLE `radio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reserved_dates`
--
ALTER TABLE `reserved_dates`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cargallary`
--
ALTER TABLE `cargallary`
  ADD CONSTRAINT `cargallary_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`) ON DELETE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`pick_up_location`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`dropp_off_location`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
