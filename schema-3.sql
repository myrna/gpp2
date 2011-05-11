-- phpMyAdmin SQL Dump
-- version 3.2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 11, 2011 at 01:14 PM
-- Server version: 5.1.30
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `greatplantpicks`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(22) COLLATE utf8_bin NOT NULL COMMENT 'Primary, Landscape, Others TBD',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Image ID with Category or Categories' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories_images`
--

CREATE TABLE IF NOT EXISTS `categories_images` (
  `category_id` int(22) NOT NULL,
  `image_id` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Links image id with image category or categories';

-- --------------------------------------------------------

--
-- Table structure for table `ci_query`
--

CREATE TABLE IF NOT EXISTS `ci_query` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `query_string` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `ip_address` varchar(16) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `user_agent` varchar(50) CHARACTER SET utf8 NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orientation` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `season` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `view` varchar(22) COLLATE utf8_bin DEFAULT NULL COMMENT 'Primary, Landscape, Other-TBD',
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `copyright` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `photographer` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `filename` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `rank` int(2) DEFAULT NULL COMMENT 'In order of preference',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=61 ;

-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE IF NOT EXISTS `meta` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `company` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `plant_common`
--

CREATE TABLE IF NOT EXISTS `plant_common` (
  `id` int(11) NOT NULL COMMENT 'Plant ID FK',
  `common_name` varchar(500) CHARACTER SET utf8 DEFAULT NULL COMMENT 'plantid can have more than one common name',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Common name list';

-- --------------------------------------------------------

--
-- Table structure for table `plant_data`
--

CREATE TABLE IF NOT EXISTS `plant_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family` varchar(45) NOT NULL,
  `genus` varchar(500) NOT NULL,
  `cross_genus` varchar(45) DEFAULT NULL COMMENT 'Field only used for bigeneric plants, if filled out must format with X before Genus2',
  `species` varchar(45) DEFAULT NULL,
  `subspecies` varchar(45) DEFAULT NULL COMMENT 'If field is filled must be preceded with ssp. in formatting',
  `cross_species` varchar(45) DEFAULT NULL COMMENT 'If field is filled must be preceded with x in formatting',
  `variety` varchar(45) DEFAULT NULL COMMENT 'If field is filled must be preceded with var. in formatting',
  `cultivar` varchar(45) DEFAULT NULL COMMENT 'Always enclosed in single quotes in formatting, first letter capitalized, remainder lower case',
  `trade_name` varchar(45) DEFAULT NULL COMMENT 'Trademark name always upper case in formatting followed by TM symbol, use special font',
  `registered_name` varchar(45) DEFAULT NULL COMMENT 'Always followed with R symbol',
  `plant_patent_number` int(10) DEFAULT NULL COMMENT 'Plant Patent Number, if filled out triggers PP prefix',
  `plant_breeders_rights` varchar(45) DEFAULT NULL COMMENT 'Plant Breeders Rights-Canada',
  `plantname_group` varchar(200) DEFAULT NULL COMMENT 'eg Atropurpurea Group',
  `synonym` varchar(200) DEFAULT NULL,
  `plant_origin` varchar(150) DEFAULT NULL,
  `plant_type` set('Bulb','Conifer','Perennial','Shrub','Tree','Vine') NOT NULL,
  `foliage_type` set('Deciduous','Evergreen') NOT NULL,
  `growth_habit` set('Columnar','Compact','Mounding','Narrow','Pyramidal','Round','Spreading','Upright','Weeping','NA') DEFAULT NULL COMMENT 'Review with Rick: will this column always be filled out?',
  `foliage_color` set('Black','Blue','Bronze','Burgundy','Chartreuse','Dark Green','Gold','Green','Purple','Red','Silver','Variegated','White','Yellow') NOT NULL,
  `flower_color` set('None','Black','Blue','Brown','Cream','Green','Lavender','Orange','Pink','Purple','Red','Rose','Violet','White','Yellow') DEFAULT NULL COMMENT 'Null means no flowers, or insignificant',
  `flower_time` set('Winter','Spring','Summer','Fall','None') DEFAULT NULL COMMENT 'Null means no flowers, or insignificant',
  `fragrance` varchar(45) DEFAULT NULL,
  `seasonal_interest` varchar(200) DEFAULT NULL COMMENT 'Seasonal interest',
  `sun` set('Full Sun','Part Shade','Open Shade','Heavy Shade','Any') DEFAULT NULL,
  `soil` set('Clay','Fertile','Humus-Rich','Sandy','Any') NOT NULL,
  `water` set('Bog','Drought Tolerant','Moist','Well Drained','Winter Wet-Summer Dry','Any') DEFAULT NULL,
  `plant_width` int(11) DEFAULT NULL COMMENT 'Max width in feet',
  `plant_height` int(11) DEFAULT NULL COMMENT 'Max height in feet',
  `zone_low` int(2) DEFAULT NULL,
  `zone_high` int(2) DEFAULT NULL,
  `culture_notes` text NOT NULL COMMENT 'Culture Notes',
  `qualities` text COMMENT 'Plant Qualities',
  `design_use` text,
  `wildlife` text COMMENT 'Wildlife attracted by plant, potential wildlife problems',
  `nominator` varchar(100) DEFAULT NULL COMMENT 'Person who nominated plant for GPP status',
  `committee` set('trees\\conifers','shrubs\\vines','perennials\\bulbs') DEFAULT NULL,
  `advisory_group` text COMMENT 'List any advisory groups the plant is associated with',
  `eval_trial` text COMMENT 'List any evaluation or trial plant is associated with',
  `verify_name` text COMMENT 'Botanical name verified and reference used',
  `status` set('GPP','Eliminated','Removed','Not Yet Considered','Trial') NOT NULL,
  `gpp_history` text COMMENT 'GPP evaluation committee and history notes',
  `gpp_year` year(4) DEFAULT NULL,
  `theme` varchar(200) DEFAULT NULL,
  `geek_notes` text COMMENT 'Plant geek notes of detailed botanical interest',
  `publish` enum('Yes','No') NOT NULL DEFAULT 'No',
  `sort` varchar(150) DEFAULT NULL COMMENT 'Field for administrative use to create custom lists',
  PRIMARY KEY (`id`),
  UNIQUE KEY `PlantId_UNIQUE` (`id`),
  KEY `genus` (`genus`(255))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

-- --------------------------------------------------------

--
-- Table structure for table `plant_images`
--

CREATE TABLE IF NOT EXISTS `plant_images` (
  `plant_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  KEY `plant_id` (`plant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` mediumint(8) unsigned NOT NULL,
  `ip_address` char(16) CHARACTER SET utf8 NOT NULL,
  `username` varchar(15) CHARACTER SET utf8 NOT NULL,
  `password` varchar(40) CHARACTER SET utf8 NOT NULL,
  `salt` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `activation_code` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `forgotten_password_code` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `remember_code` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;
