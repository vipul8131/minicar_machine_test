-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 12, 2018 at 02:22 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `minicar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manufacturer`
--

CREATE TABLE IF NOT EXISTS `tbl_manufacturer` (
  `MANUFACTURER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MANUFACTURER_NAME` varchar(40) NOT NULL,
  `ADDED_DATE` datetime NOT NULL,
  PRIMARY KEY (`MANUFACTURER_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_manufacturer`
--

INSERT INTO `tbl_manufacturer` (`MANUFACTURER_ID`, `MANUFACTURER_NAME`, `ADDED_DATE`) VALUES
(15, 'Mercedes', '2018-08-12 14:03:08'),
(14, 'Audi', '2018-08-12 14:03:08'),
(13, 'TATA', '2018-08-12 14:03:08'),
(12, 'Maruti', '2018-08-12 14:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_models`
--

CREATE TABLE IF NOT EXISTS `tbl_models` (
  `MODEL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MODEL_NAME` varchar(40) NOT NULL,
  `COLOR` varchar(20) NOT NULL,
  `MANUFACTURING_YEAR` year(4) NOT NULL,
  `REG_NUMBER` int(11) NOT NULL,
  `NOTE` text NOT NULL,
  `ADDED_DATE` datetime NOT NULL,
  `MANUFACTURER_ID` int(11) NOT NULL,
  PRIMARY KEY (`MODEL_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_models`
--

INSERT INTO `tbl_models` (`MODEL_ID`, `MODEL_NAME`, `COLOR`, `MANUFACTURING_YEAR`, `REG_NUMBER`, `NOTE`, `ADDED_DATE`, `MANUFACTURER_ID`) VALUES
(11, 'Alto 800', '#ff8000', 2010, 33444, 'sdf sdf sdfs  fsdf', '2018-08-12 14:03:08', 12),
(10, 'WagonR', '#0080ff', 1958, 56664, 'sdf sdf sdf dsfsdf sdf s', '2018-08-12 14:03:08', 12),
(12, 'Nano', '#8000ff', 2000, 98777, 'this is my new test', '2018-08-12 14:16:29', 13),
(13, 'Audi R8', '#ffff00', 1990, 78899, 'dfgd ssdg sdfs dfsf sdf sdf', '2018-08-12 14:16:29', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_model_images`
--

CREATE TABLE IF NOT EXISTS `tbl_model_images` (
  `IMAGE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MODEL_ID` int(11) NOT NULL,
  `IMAGE1` varchar(100) NOT NULL,
  `IMAGE2` varchar(100) NOT NULL,
  PRIMARY KEY (`IMAGE_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_model_images`
--

INSERT INTO `tbl_model_images` (`IMAGE_ID`, `MODEL_ID`, `IMAGE1`, `IMAGE2`) VALUES
(8, 13, 'audi-r8.jpg', 'Audi-R8-Right-Front-Three-Quarter-66713.jpg'),
(7, 12, 'tata-nano.jpg', 'tata-nano-car-500x500.jpg'),
(6, 11, 'marutisuzuki_alto800_600x300.jpg', 'maruti-suzuki-alto800-front.jpg'),
(5, 10, '284-500x500.jpg', '2007-maruti-wagon-r-lxi-500x500.png');
