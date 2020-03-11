-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 17, 2020 at 06:08 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internaldev`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

DROP TABLE IF EXISTS `auth`;
CREATE TABLE IF NOT EXISTS `auth` (
  `AuthID` bigint(20) NOT NULL AUTO_INCREMENT,
  `AuthUser` varchar(255) NOT NULL,
  `AuthPassword` varchar(255) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`AuthID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`AuthID`, `AuthUser`, `AuthPassword`, `Timestamp`) VALUES
(1, 'admin@internal', 'e10adc3949ba59abbe56e057f20f883e', '2020-01-02 03:59:28'),
(2, 'admin@portal', '0c9c538c4cb8218ce0292f0fe6d42790', '2020-01-17 07:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `imemo_images`
--

DROP TABLE IF EXISTS `imemo_images`;
CREATE TABLE IF NOT EXISTS `imemo_images` (
  `IMEMIMGID` bigint(20) NOT NULL AUTO_INCREMENT,
  `IMemoMID` bigint(20) NOT NULL,
  `MMImages` varchar(255) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IMEMIMGID`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imemo_images`
--

INSERT INTO `imemo_images` (`IMEMIMGID`, `IMemoMID`, `MMImages`, `Timestamp`) VALUES
(1, 1, '111579004828.png', '2020-01-14 12:27:08'),
(2, 1, '121579004843.png', '2020-01-14 12:27:23'),
(3, 2, '211579004913.png', '2020-01-14 12:28:33'),
(4, 2, '221579004913.png', '2020-01-14 12:28:33'),
(5, 3, '311579004955.png', '2020-01-14 12:29:15'),
(6, 3, '321579004955.png', '2020-01-14 12:29:15'),
(7, 4, '411579004994.png', '2020-01-14 12:29:54'),
(8, 4, '421579004994.png', '2020-01-14 12:29:54'),
(9, 5, '511579069449.jpg', '2020-01-15 06:24:09'),
(10, 6, '611579070075.jpg', '2020-01-15 06:34:35'),
(11, 7, '711579070625.jpg', '2020-01-15 06:43:45'),
(12, 7, '721579070625.jpg', '2020-01-15 06:43:45'),
(13, 8, '811579449354.png', '2020-01-19 15:55:54'),
(14, 8, '821579449354.jpg', '2020-01-19 15:55:54'),
(15, 8, '831579449354.jpg', '2020-01-19 15:55:54'),
(16, 9, '911579449381.png', '2020-01-19 15:56:21'),
(17, 9, '921579449381.jpg', '2020-01-19 15:56:21'),
(18, 9, '931579449381.jpg', '2020-01-19 15:56:21'),
(19, 10, '1011579449409.png', '2020-01-19 15:56:49'),
(20, 10, '1021579449409.jpg', '2020-01-19 15:56:49'),
(21, 10, '1031579449409.jpg', '2020-01-19 15:56:49'),
(22, 11, '1111579449452.png', '2020-01-19 15:57:32'),
(23, 11, '1121579449452.jpg', '2020-01-19 15:57:32'),
(24, 11, '1131579449452.jpg', '2020-01-19 15:57:32'),
(25, 12, '1211579449509.png', '2020-01-19 15:58:29'),
(26, 12, '1221579449509.jpeg', '2020-01-19 15:58:29'),
(27, 12, '1231579449509.jpeg', '2020-01-19 15:58:29'),
(28, 13, '1311579450113.png', '2020-01-19 16:08:33'),
(29, 13, '1321579450113.jpeg', '2020-01-19 16:08:33'),
(30, 13, '1331579450113.jpeg', '2020-01-19 16:08:33'),
(31, 13, '1341579450113.jpg', '2020-01-19 16:08:33'),
(32, 14, '1411579450151.png', '2020-01-19 16:09:11'),
(33, 14, '1421579450151.jpeg', '2020-01-19 16:09:11'),
(34, 14, '1431579450151.jpeg', '2020-01-19 16:09:11'),
(35, 14, '1441579450151.jpg', '2020-01-19 16:09:11'),
(36, 15, '1511579450197.png', '2020-01-19 16:09:57'),
(37, 15, '1521579450197.jpeg', '2020-01-19 16:09:57'),
(38, 15, '1531579450197.jpeg', '2020-01-19 16:09:57'),
(39, 15, '1541579450197.jpg', '2020-01-19 16:09:57'),
(40, 16, '1611579500571.jpg', '2020-01-20 06:09:31'),
(41, 16, '1621579500571.jpg', '2020-01-20 06:09:31'),
(42, 16, '1631579500571.png', '2020-01-20 06:09:31'),
(43, 17, '1711579500596.jpg', '2020-01-20 06:09:56'),
(44, 17, '1721579500596.png', '2020-01-20 06:09:56'),
(45, 18, '1811579500624.jpg', '2020-01-20 06:10:24'),
(46, 18, '1821579500624.jpg', '2020-01-20 06:10:24'),
(47, 19, '1911579500647.png', '2020-01-20 06:10:47'),
(48, 19, '1921579500647.jpg', '2020-01-20 06:10:47'),
(49, 20, '2011579501332.png', '2020-01-20 06:22:12'),
(50, 21, '2111579520416.jpg', '2020-01-20 11:40:16'),
(51, 21, '2121579520416.jpg', '2020-01-20 11:40:16'),
(52, 21, '2131579520416.png', '2020-01-20 11:40:16'),
(61, 22, '2211579521227.jpg', '2020-01-20 11:53:47'),
(62, 23, '2311579521352.jpg', '2020-01-20 11:55:52'),
(63, 24, '2411579521417.jpg', '2020-01-20 11:56:57'),
(65, 25, '2511579787293.jpg', '2020-01-23 13:48:13'),
(66, 26, '2611579787357.jpg', '2020-01-23 13:49:17'),
(67, 27, '2711579787478.jpg', '2020-01-23 13:51:18'),
(68, 28, '2811579787556.jpg', '2020-01-23 13:52:36'),
(69, 28, '2821579787556.jpg', '2020-01-23 13:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `i_about`
--

DROP TABLE IF EXISTS `i_about`;
CREATE TABLE IF NOT EXISTS `i_about` (
  `IAboutID` bigint(20) NOT NULL AUTO_INCREMENT,
  `IAHome` text NOT NULL,
  `IAAbout` text NOT NULL,
  `IFB` varchar(255) DEFAULT NULL,
  `IInsta` varchar(255) DEFAULT NULL,
  `ILinkedIn` varchar(255) DEFAULT NULL,
  `ITwitter` varchar(255) DEFAULT NULL,
  `IYoutube` varchar(255) DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IAboutID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i_about`
--

INSERT INTO `i_about` (`IAboutID`, `IAHome`, `IAAbout`, `IFB`, `IInsta`, `ILinkedIn`, `ITwitter`, `IYoutube`, `Timestamp`) VALUES
(1, 'Skybertech goes beyond managing networks and addressing your IT infrastructure issues. We help you as your business changes, to deliver support through our Executive Virtual CIO advisory services.', '<p></p><div><b><h1></h1><h2>Welcome</h2></b></div><div>Skybertech goes beyond managing networks and addressing your IT infrastructure issues. We help you as your business changes, to deliver support through our Executive Virtual CIO advisory services. Performance focused and visionary GLOBAL IT leader credited with 22 years (15 years top Management role) of experience in various industries like Gold &amp; Diamond Jewellery - Retail, Non-Banking Finance Company (NBFC), FMCG Retail (SAP IS Retail ), Micro finance, Power Electronics, Solar Power, Medical Transcription, Hospitality, Private IT Park, Automobile, Chits etc. in directing the entire IT operations. Key participant in Automation &amp; Optimization of Business Processes across departments and coordination with Statutory Auditors on periodical Audit findings..<br><br></div><h3>\r\n\r\n</h3><h2>Our Mission</h2><div>We bring success to our clients, continuously contribute toward enhancing their corporate value, care for people and deliver results through innovation&amp; implementation.<br></div><div><br></div><div><h2>Our Vision</h2>\r\n\r\n\r\n\r\n\r\n<style type=\"text/css\">\r\np.p1 {margin: 0.0px 0.0px 0.0px 0.0px; font: 12.0px \'Helvetica Neue\'; color: #454545}\r\n</style>\r\n\r\n\r\n<div>Once a partner and forever after, we shall be your Real Partner. Asian in origin but global in scope, we are not bound by any one stereotypical globalization strategy. Instead, we take the utmost advantage of the characteristics of the client and locate.</div></div><div><br></div><style type=\"text/css\">\r\np.p1 {margin: 0.0px 0.0px 0.0px 0.0px; font: 12.0px \'Helvetica Neue\'; color: #454545}\r\n</style>', 'https://www.facebook.com/skybertechit/', '#', 'https://www.linkedin.com/company/skybertechit/', 'https://twitter.com/skybertechit', 'https://www.youtube.com/channel/UCx2HQH3iZfIEXu9s_vkEnfA', '2020-01-13 14:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `i_banner`
--

DROP TABLE IF EXISTS `i_banner`;
CREATE TABLE IF NOT EXISTS `i_banner` (
  `IBannerID` bigint(20) NOT NULL AUTO_INCREMENT,
  `IBTitle` varchar(255) NOT NULL,
  `IBIMage` varchar(255) NOT NULL,
  `IBSortOrder` bigint(20) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`IBannerID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i_banner`
--

INSERT INTO `i_banner` (`IBannerID`, `IBTitle`, `IBIMage`, `IBSortOrder`, `timestamp`) VALUES
(2, 'Best IT Consultation 2018 ', '1578937203.jpg', 1, '2020-01-19 17:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `i_branches`
--

DROP TABLE IF EXISTS `i_branches`;
CREATE TABLE IF NOT EXISTS `i_branches` (
  `IBranchID` bigint(20) NOT NULL AUTO_INCREMENT,
  `IBName` varchar(255) NOT NULL,
  `IBAddress` text NOT NULL,
  `IBPhone` varchar(255) NOT NULL,
  `IBEmail` varchar(255) DEFAULT NULL,
  `IBRSortOrder` bigint(20) DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`IBranchID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i_business`
--

DROP TABLE IF EXISTS `i_business`;
CREATE TABLE IF NOT EXISTS `i_business` (
  `IBSID` bigint(20) NOT NULL AUTO_INCREMENT,
  `IBSName` varchar(255) NOT NULL,
  `IBSLogo` varchar(255) NOT NULL,
  `IBSUrl` varchar(255) NOT NULL,
  `IBSSortOrder` bigint(20) DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IBSID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i_category`
--

DROP TABLE IF EXISTS `i_category`;
CREATE TABLE IF NOT EXISTS `i_category` (
  `ICategoryID` bigint(20) NOT NULL AUTO_INCREMENT,
  `ICName` varchar(255) NOT NULL,
  `ICImage` varchar(255) DEFAULT NULL,
  `ICType` enum('Both','Photo','Video') NOT NULL,
  `ICSortOrder` bigint(20) DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ICategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i_category`
--

INSERT INTO `i_category` (`ICategoryID`, `ICName`, `ICImage`, `ICType`, `ICSortOrder`, `Timestamp`) VALUES
(1, 'Awards', '1579959897.jpg', 'Photo', 5, '2020-01-13 18:11:40'),
(14, 'Technology Videos', '1579786159.jpg', 'Video', 1, '2020-01-23 13:27:13');

-- --------------------------------------------------------

--
-- Table structure for table `i_clients`
--

DROP TABLE IF EXISTS `i_clients`;
CREATE TABLE IF NOT EXISTS `i_clients` (
  `IClientID` bigint(20) NOT NULL AUTO_INCREMENT,
  `ICLName` varchar(255) DEFAULT NULL,
  `ICLPhoto` varchar(255) NOT NULL,
  `ICLUrl` varchar(255) DEFAULT NULL,
  `ICLSortOrder` bigint(20) DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IClientID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i_department`
--

DROP TABLE IF EXISTS `i_department`;
CREATE TABLE IF NOT EXISTS `i_department` (
  `IDepartmentID` bigint(20) NOT NULL AUTO_INCREMENT,
  `IDName` varchar(255) NOT NULL,
  `IDDEp` varchar(255) DEFAULT NULL,
  `IDDesignation` varchar(255) NOT NULL,
  `IDPhone` varchar(255) NOT NULL,
  `IDEmail` varchar(255) DEFAULT NULL,
  `IDSortOrder` bigint(20) DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`IDepartmentID`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i_footerlogo`
--

DROP TABLE IF EXISTS `i_footerlogo`;
CREATE TABLE IF NOT EXISTS `i_footerlogo` (
  `IFTRLOGID` bigint(20) NOT NULL AUTO_INCREMENT,
  `IFImage` varchar(255) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IFTRLOGID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i_footerlogo`
--

INSERT INTO `i_footerlogo` (`IFTRLOGID`, `IFImage`, `Timestamp`) VALUES
(1, '1579158894.png', '2020-01-16 06:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `i_forms`
--

DROP TABLE IF EXISTS `i_forms`;
CREATE TABLE IF NOT EXISTS `i_forms` (
  `IFormID` bigint(20) NOT NULL AUTO_INCREMENT,
  `IFTitle` varchar(255) NOT NULL,
  `IFPDF` varchar(255) NOT NULL,
  `IFSortOrder` bigint(20) DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IFormID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i_general`
--

DROP TABLE IF EXISTS `i_general`;
CREATE TABLE IF NOT EXISTS `i_general` (
  `IGID` bigint(20) NOT NULL AUTO_INCREMENT,
  `IGColor` varchar(255) NOT NULL,
  `IGPhone` text NOT NULL,
  `IGEmail` varchar(255) NOT NULL,
  `IGAddress` text NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IGID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i_general`
--

INSERT INTO `i_general` (`IGID`, `IGColor`, `IGPhone`, `IGEmail`, `IGAddress`, `Timestamp`) VALUES
(1, '#00BFF3', '7592888111', 'mail@skybertech.com', 'Monlash Business Centre,\r\nCrescens Tower, 6th Floor, 602,\r\nMetro Pillar #327, Ernakulam,\r\nKerala - 682 033, India', '2020-01-13 09:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `i_holiday`
--

DROP TABLE IF EXISTS `i_holiday`;
CREATE TABLE IF NOT EXISTS `i_holiday` (
  `IHolidayID` bigint(20) NOT NULL AUTO_INCREMENT,
  `IHTitle` varchar(255) NOT NULL,
  `IHPDF` varchar(255) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IHolidayID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i_holiday`
--

INSERT INTO `i_holiday` (`IHolidayID`, `IHTitle`, `IHPDF`, `Timestamp`) VALUES
(1, 'Holiday Calendar 2020', '1579785370.pdf', '2020-01-15 08:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `i_keypercategory`
--

DROP TABLE IF EXISTS `i_keypercategory`;
CREATE TABLE IF NOT EXISTS `i_keypercategory` (
  `IKeyCatID` bigint(20) NOT NULL AUTO_INCREMENT,
  `IKeyCatName` varchar(255) NOT NULL,
  `IKeyStatus` enum('Active','Blocked') NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IKeyCatID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i_keyperson`
--

DROP TABLE IF EXISTS `i_keyperson`;
CREATE TABLE IF NOT EXISTS `i_keyperson` (
  `IKeyPersonID` bigint(20) NOT NULL AUTO_INCREMENT,
  `IKeyCategory` bigint(20) NOT NULL,
  `IkeyPName` varchar(255) NOT NULL,
  `IkeyDesignation` varchar(255) NOT NULL,
  `IKeyphoto` varchar(255) NOT NULL,
  `IKeyPhone` varchar(255) NOT NULL,
  `IkeyEmail` varchar(255) NOT NULL,
  `IKeyDescription` text,
  `IKeyListing` enum('False','True') NOT NULL,
  `IKeySortOrder` bigint(20) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IKeyPersonID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i_logo`
--

DROP TABLE IF EXISTS `i_logo`;
CREATE TABLE IF NOT EXISTS `i_logo` (
  `ILogoID` bigint(20) NOT NULL AUTO_INCREMENT,
  `ILImage` varchar(255) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ILogoID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i_logo`
--

INSERT INTO `i_logo` (`ILogoID`, `ILImage`, `Timestamp`) VALUES
(1, '1578977848.jpg', '2020-01-13 14:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `i_manual`
--

DROP TABLE IF EXISTS `i_manual`;
CREATE TABLE IF NOT EXISTS `i_manual` (
  `IManualID` bigint(20) NOT NULL AUTO_INCREMENT,
  `IMNLName` varchar(255) NOT NULL,
  `IMNLPDF` varchar(255) NOT NULL,
  `IMNLSortorder` bigint(20) DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IManualID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i_memo`
--

DROP TABLE IF EXISTS `i_memo`;
CREATE TABLE IF NOT EXISTS `i_memo` (
  `IMemoID` bigint(20) NOT NULL AUTO_INCREMENT,
  `IMTitle` varchar(255) NOT NULL,
  `IMType` enum('Circulars','Policies') NOT NULL,
  `IMDescription` text NOT NULL,
  `IMIMage` varchar(255) DEFAULT NULL,
  `IMSortOrder` bigint(20) DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`IMemoID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i_news`
--

DROP TABLE IF EXISTS `i_news`;
CREATE TABLE IF NOT EXISTS `i_news` (
  `INewsID` bigint(20) NOT NULL AUTO_INCREMENT,
  `INTitle` varchar(255) NOT NULL,
  `INDescription` text NOT NULL,
  `INImage` varchar(255) DEFAULT NULL,
  `INPDF` varchar(255) DEFAULT NULL,
  `INSortOrder` bigint(20) DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`INewsID`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i_news`
--

INSERT INTO `i_news` (`INewsID`, `INTitle`, `INDescription`, `INImage`, `INPDF`, `INSortOrder`, `Timestamp`) VALUES
(17, 'Scrolling News will come here', '<p>Scrolling News detailed content<br></p>', NULL, NULL, 1, '2020-02-17 05:38:47');

-- --------------------------------------------------------

--
-- Table structure for table `i_online`
--

DROP TABLE IF EXISTS `i_online`;
CREATE TABLE IF NOT EXISTS `i_online` (
  `OnlineID` bigint(20) NOT NULL AUTO_INCREMENT,
  `SessionID` text NOT NULL,
  `TimeLog` text NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`OnlineID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i_online`
--

INSERT INTO `i_online` (`OnlineID`, `SessionID`, `TimeLog`, `Timestamp`) VALUES
(2, 'qdn537e7evlcvgn5sfr4aq4l97', '1581917879', '2020-02-17 05:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `i_photogallery`
--

DROP TABLE IF EXISTS `i_photogallery`;
CREATE TABLE IF NOT EXISTS `i_photogallery` (
  `IPhotoID` bigint(20) NOT NULL AUTO_INCREMENT,
  `IPCat` bigint(20) NOT NULL,
  `IPTitle` varchar(255) NOT NULL,
  `IPImage` varchar(255) NOT NULL,
  `IPDescription` text,
  `IPSortOrder` bigint(20) DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IPhotoID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i_photogallery`
--

INSERT INTO `i_photogallery` (`IPhotoID`, `IPCat`, `IPTitle`, `IPImage`, `IPDescription`, `IPSortOrder`, `Timestamp`) VALUES
(11, 1, 'Best IT Consultation Company', '1579103049.png', '.', NULL, '2020-01-15 15:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `i_products`
--

DROP TABLE IF EXISTS `i_products`;
CREATE TABLE IF NOT EXISTS `i_products` (
  `IProductID` bigint(20) NOT NULL AUTO_INCREMENT,
  `IPName` varchar(255) NOT NULL,
  `IPDescription` text NOT NULL,
  `IPImage` varchar(255) NOT NULL,
  `IPPDF` varchar(255) DEFAULT NULL,
  `IPSortOrder` bigint(20) DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IProductID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i_service`
--

DROP TABLE IF EXISTS `i_service`;
CREATE TABLE IF NOT EXISTS `i_service` (
  `IServiceID` bigint(20) NOT NULL AUTO_INCREMENT,
  `ISName` varchar(255) NOT NULL,
  `ISDescription` text NOT NULL,
  `ISImage` varchar(255) NOT NULL,
  `ISSortorder` bigint(20) DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IServiceID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `i_software`
--

DROP TABLE IF EXISTS `i_software`;
CREATE TABLE IF NOT EXISTS `i_software` (
  `ISoftID` bigint(20) NOT NULL AUTO_INCREMENT,
  `ISoftTitle` varchar(255) NOT NULL,
  `ISoftImage` varchar(255) NOT NULL,
  `ISoftUrl` varchar(255) NOT NULL,
  `SortOrder` bigint(20) DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ISoftID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i_software`
--

INSERT INTO `i_software` (`ISoftID`, `ISoftTitle`, `ISoftImage`, `ISoftUrl`, `SortOrder`, `Timestamp`) VALUES
(1, 'LMS', '1579172263.jpg', 'http://172.24.162.41/moodle', 2, '2020-01-13 17:50:24'),
(2, 'ESSL', '1578937856.png', 'http://172.24.162.34:2762/iclock/', 5, '2020-01-13 17:50:56'),
(3, 'HRMS', '1578937914.png', 'https://skybertech.greythr.com/', 1, '2020-01-13 17:51:54'),
(4, 'Project Management', '1578937944.png', 'https://www.orangescrum.com/', 4, '2020-01-13 17:52:24'),
(5, 'DMS', '1578937970.png', 'http://172.24.162.40:8087/dms', 6, '2020-01-13 17:52:50'),
(6, 'Asset Management', '1579869693.png', 'http://172.24.162.42:8088', 3, '2020-01-13 17:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `i_videogallery`
--

DROP TABLE IF EXISTS `i_videogallery`;
CREATE TABLE IF NOT EXISTS `i_videogallery` (
  `IVideoID` bigint(20) NOT NULL AUTO_INCREMENT,
  `IVCat` bigint(20) NOT NULL,
  `IVTitle` varchar(255) NOT NULL,
  `IVUrl` varchar(255) NOT NULL,
  `IVSortOrder` bigint(20) DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IVideoID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `i_videogallery`
--

INSERT INTO `i_videogallery` (`IVideoID`, `IVCat`, `IVTitle`, `IVUrl`, `IVSortOrder`, `Timestamp`) VALUES
(8, 14, 'Purchase via Finger print', 'lLYNRH3i7tA', NULL, '2020-01-23 13:34:20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
