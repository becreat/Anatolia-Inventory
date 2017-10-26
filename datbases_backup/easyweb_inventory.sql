-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 17, 2016 at 05:30 AM
-- Server version: 5.5.48-37.8
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `easyweb_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` text,
  `admin_username` varchar(50) DEFAULT NULL,
  `admin_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_username`, `admin_password`) VALUES
(1, 'becreat@gmail.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `coustomer`
--

CREATE TABLE IF NOT EXISTS `coustomer` (
  `coustomer_id` int(11) NOT NULL,
  `coustomer_code` int(11) NOT NULL DEFAULT '0',
  `coustomer_user` varchar(50) NOT NULL,
  `coustomer_pass` varchar(50) NOT NULL,
  `coustomer_suppliers` text,
  `coustomer_name` varchar(50) DEFAULT NULL,
  `coustomer_company_name` varchar(50) DEFAULT NULL,
  `coustomer_email` varchar(50) DEFAULT NULL,
  `coustomer_web` varchar(50) DEFAULT NULL,
  `coustomer_phone` varchar(50) DEFAULT NULL,
  `coustomer_address` varchar(50) DEFAULT NULL,
  `coustomer_delivery_address` varchar(50) DEFAULT NULL,
  `customer_sales_account` int(11) DEFAULT NULL,
  `coustomer_company_details` varchar(50) DEFAULT NULL,
  `coustomer_tax_id` varchar(50) DEFAULT NULL,
  `coustomer_special_note` varchar(50) DEFAULT NULL,
  `coustomer_active` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coustomer`
--

INSERT INTO `coustomer` (`coustomer_id`, `coustomer_code`, `coustomer_user`, `coustomer_pass`, `coustomer_suppliers`, `coustomer_name`, `coustomer_company_name`, `coustomer_email`, `coustomer_web`, `coustomer_phone`, `coustomer_address`, `coustomer_delivery_address`, `customer_sales_account`, `coustomer_company_details`, `coustomer_tax_id`, `coustomer_special_note`, `coustomer_active`) VALUES
(1, 0, 'jhondoe', 'AAAccc111', 'a:2:{i:0;i:1;i:1;i:2;}', 'Anatolia Levin', 'Anatolia Levin Limited', 'jhon@ex.com', 'http://example.com', '+009231377', '', 'Somewhere in newzeland', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicin', NULL, 'Something Special About Him', 1),
(2, 0, 'bob', 'AAAccc111', NULL, 'Bob Lee', 'Bob And Bob Cafe', 'bob@ex.com', 'http://example.com', '+009231377', 'Somewhere in newzeland', 'Somewhere in newzeland', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicin', NULL, 'Something Special About Him', 1),
(3, 0, 'dori', 'AAAccc111', NULL, 'Dori Smith', 'Auchland  Sweets', 'dori@ex.com', 'http://example.com', '+009231377', 'Somewhere in newzeland', 'Somewhere in newzeland', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicin', NULL, 'Something Special About Him', 1),
(4, 0, 'dori2', 'AAAccc111', NULL, 'Dori Smith', 'Auchland  Sweets', 'dori@ex.com', 'http://example.com', '+009231377', 'Somewhere in newzeland', 'Somewhere in newzeland', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicin', NULL, 'Something Special About Him', 0),
(7, 0, 'becreat', 'aaaccc222', NULL, 'Fazly Rabbi', 'Becreate IT', 'becreat@gmail.com', NULL, '+8801670255268', '1744 Jonotabag ,Dhaka - 1236', NULL, NULL, 'Good cy', 'hhh', 'nothing', 1),
(8, 7, '', '', NULL, 'Test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `crws`
--

CREATE TABLE IF NOT EXISTS `crws` (
  `crws_id` int(11) NOT NULL,
  `coustomer_id` int(11) NOT NULL DEFAULT '0',
  `crws_supplier_id` int(11) NOT NULL DEFAULT '0',
  `ci` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crws`
--

INSERT INTO `crws` (`crws_id`, `coustomer_id`, `crws_supplier_id`, `ci`) VALUES
(1, 1, 1, 'codecode'),
(2, 1, 2, 'modemodess'),
(7, 1, 3, 'News'),
(9, 8, 2, '420'),
(12, 8, 3, '34344'),
(13, 8, 1, '0'),
(14, 1, 4, '656');

-- --------------------------------------------------------

--
-- Table structure for table `c_product`
--

CREATE TABLE IF NOT EXISTS `c_product` (
  `c_product_id` int(11) NOT NULL,
  `c_product_coustomer_id` int(11) NOT NULL DEFAULT '0',
  `c_product_product_id` int(11) NOT NULL DEFAULT '0',
  `c_product_product_min_qt` int(11) NOT NULL DEFAULT '0',
  `c_product_product_max_qt` int(11) NOT NULL DEFAULT '0',
  `c_product_unit_price` float NOT NULL DEFAULT '0',
  `c_product_unit_price_rate` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_product`
--

INSERT INTO `c_product` (`c_product_id`, `c_product_coustomer_id`, `c_product_product_id`, `c_product_product_min_qt`, `c_product_product_max_qt`, `c_product_unit_price`, `c_product_unit_price_rate`) VALUES
(8, 3, 1, 1, 100, 4.5, 50),
(12, 1, 2, 1, 100, 2.4, 20),
(13, 8, 1, 1, 100, 2.4, 20),
(14, 1, 3, 1, 100, 3.45, 15),
(15, 1, 5, 1, 100, 3.3, 0),
(16, 8, 21, 1, 9999, 50.76, 323),
(17, 1, 22, 1, 9999, 1.2, 20),
(18, 1, 22, 1, 9999, 1.15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL,
  `order_coustomer_id` int(11) DEFAULT NULL,
  `order_supplier_id` int(11) DEFAULT NULL,
  `order_status` varchar(50) DEFAULT NULL,
  `order_po` varchar(50) DEFAULT NULL,
  `order_eta` varchar(50) DEFAULT NULL,
  `order_tracking` text,
  `order_notes` text,
  `order_date` text,
  `order_required_delivery_date` text,
  `order_total_price` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=395 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_coustomer_id`, `order_supplier_id`, `order_status`, `order_po`, `order_eta`, `order_tracking`, `order_notes`, `order_date`, `order_required_delivery_date`, `order_total_price`) VALUES
(2, 1, 2, 'submitted', NULL, NULL, NULL, 'Hello World Bangladesh and World', '2014-12-19', '2014-12-30', 141.1),
(3, 1, 2, 'submitted', NULL, NULL, NULL, 'Hello World', '2014-12-19', '2014-12-21', 500),
(4, 1, 2, 'submitted', NULL, NULL, NULL, 'Hello World', '2014-12-19', '2014-12-21', 500),
(5, 1, 3, 'processed', NULL, NULL, NULL, 'Hello World', '2014-12-19', '2014-12-21', 500),
(6, 1, 2, 'delay', NULL, NULL, NULL, 'Hello World', '2014-12-19', '2014-12-21', 500),
(7, 1, 2, 'processed', NULL, NULL, NULL, 'Hello World', '2014-12-19', '2014-12-21', 500),
(8, 1, 2, 'draft', NULL, NULL, NULL, 'Hello World', '2014-12-19', '2014-12-21', 182.4),
(9, 1, 2, 'submitted', NULL, NULL, NULL, 'Hello World', '2014-12-19', '2014-12-21', 500),
(10, 1, 2, 'cancelled', NULL, NULL, NULL, 'Hello World', '2014-12-19', '2014-12-21', 500),
(11, 1, 2, 'accepted', NULL, NULL, NULL, 'Hello World', '2014-12-19', '2014-12-21', 500),
(12, 1, 2, 'accepted', NULL, NULL, NULL, 'Hello World', '2014-12-19', '2014-12-21', 500),
(13, 1, 2, 'processed', NULL, NULL, NULL, 'Hello World', '2014-12-19', '2014-12-21', 500),
(14, 1, 2, 'processed', NULL, NULL, NULL, 'Hello World', '2014-12-19', '2014-12-21', 500),
(40, 1, 1, 'processed', NULL, NULL, NULL, 'My First Note', '2014-12-26', '2014-12-31', 15),
(41, 1, 2, 'draft', NULL, NULL, NULL, NULL, '2014-12-26', '2014-12-31', 36),
(42, 1, 1, 'processed', NULL, NULL, NULL, NULL, '2014-12-26', '2014-12-31', 0),
(43, 1, 2, 'ondelivery', NULL, NULL, NULL, 'Hello World', '2014-12-19', '2014-12-21', 500),
(44, 1, 2, 'ondelivery', NULL, NULL, NULL, 'Hello World', '2014-12-19', '2014-12-21', 500),
(45, 1, 2, 'ondelivery', NULL, NULL, NULL, 'Hello World', '2014-12-19', '2014-12-21', 500),
(46, 1, 2, 'ondelivery', NULL, 'hh', 'dhl-159', 'Hello World', '2014-12-19', '2014-12-21', 500),
(47, 1, 2, 'draft', NULL, NULL, NULL, NULL, '2014-12-26', NULL, 0),
(48, 1, 1, 'draft', NULL, NULL, NULL, NULL, '2014-12-26', NULL, 0),
(49, 1, 1, 'draft', NULL, NULL, NULL, NULL, '2014-12-26', NULL, 0),
(50, 1, 2, 'draft', NULL, NULL, NULL, NULL, '2014-12-26', NULL, 0),
(51, 1, 1, 'draft', NULL, NULL, NULL, NULL, '2014-12-26', NULL, 0),
(52, 1, 2, 'draft', NULL, NULL, NULL, NULL, '2014-12-26', NULL, 0),
(53, 1, 2, 'draft', NULL, NULL, NULL, NULL, '2014-12-26', NULL, 0),
(54, 1, 1, 'draft', NULL, NULL, NULL, NULL, '2014-12-26', NULL, 0),
(55, 1, 2, 'draft', NULL, NULL, NULL, NULL, '2014-12-26', NULL, 0),
(56, 1, 2, 'draft', NULL, NULL, NULL, NULL, '2014-12-26', NULL, 0),
(57, 1, 2, 'draft', NULL, NULL, NULL, NULL, '2014-12-26', NULL, 0),
(59, 1, 2, 'accepted', NULL, '', '', 'dasdasdas', '2014-12-26', NULL, 72),
(60, 1, 2, 'draft', NULL, NULL, NULL, NULL, '2014-12-26', NULL, 0),
(61, 1, 2, 'draft', NULL, NULL, NULL, 'This is my spacial note', '2014-12-26', NULL, 27.6),
(62, 1, 2, 'draft', NULL, NULL, NULL, NULL, '2014-12-27', NULL, 0),
(63, 1, 2, 'draft', NULL, NULL, NULL, NULL, '2014-12-27', NULL, 82.8),
(64, 1, NULL, 'draft', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 1, NULL, 'draft', NULL, NULL, NULL, NULL, '2014-12-28', NULL, 0),
(66, 1, NULL, 'draft', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 1, NULL, 'draft', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 1, NULL, 'draft', NULL, NULL, NULL, NULL, '2014-12-28', NULL, 0),
(69, 1, NULL, 'draft', NULL, NULL, NULL, NULL, '2014-12-28', NULL, 0),
(70, 1, NULL, 'draft', NULL, NULL, NULL, NULL, '2014-12-28', NULL, 0),
(71, 1, NULL, 'draft', NULL, NULL, NULL, NULL, '2014-12-28', NULL, 0),
(72, 1, NULL, 'draft', NULL, NULL, NULL, NULL, '2014-12-28', NULL, 0),
(73, 1, NULL, 'draft', NULL, NULL, NULL, NULL, '2014-12-28', NULL, 0),
(74, 1, NULL, 'draft', NULL, NULL, NULL, NULL, '2014-12-28', NULL, 0),
(76, 1, 2, 'processed', NULL, NULL, NULL, NULL, '2014-12-28', NULL, 124.2),
(77, 1, 3, 'draft', NULL, NULL, NULL, NULL, '2014-12-28', NULL, 0),
(78, 1, 1, 'cancelled', 'rabbi', 'janina', '420', 'I want to dealy man', '2014-12-28', NULL, 0),
(370, 1, 3, 'ondelivery', NULL, NULL, NULL, NULL, '2015-01-15', NULL, 7.59),
(374, 1, 1, 'draft', NULL, NULL, NULL, NULL, '2015-01-15', NULL, 0),
(375, 1, 1, 'draft', NULL, NULL, NULL, NULL, '2015-01-15', NULL, 0),
(376, 1, 2, 'draft', NULL, NULL, NULL, NULL, '2015-01-15', NULL, 0),
(377, 1, 2, 'draft', NULL, NULL, NULL, NULL, '2015-02-12', NULL, 0),
(378, 1, 1, 'draft', NULL, NULL, NULL, NULL, '2015-02-12', NULL, 51.75),
(379, 1, 2, 'draft', NULL, NULL, NULL, NULL, '2015-02-16', NULL, 0),
(380, 1, 3, 'draft', NULL, NULL, NULL, '', '2015-02-16', NULL, 7.59),
(381, 1, 1, 'draft', NULL, NULL, NULL, NULL, '2015-03-18', NULL, 0),
(382, 1, 1, 'draft', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(383, 1, 2, 'draft', NULL, NULL, NULL, NULL, '2015-03-18', NULL, 0),
(384, 1, 1, 'draft', NULL, NULL, NULL, NULL, '2015-03-19', NULL, 0),
(385, 1, 1, 'draft', NULL, NULL, NULL, NULL, '2015-03-19', NULL, 15.87),
(386, 1, 1, 'draft', NULL, NULL, NULL, NULL, '2015-03-19', NULL, 0),
(387, 1, 1, 'draft', NULL, NULL, NULL, NULL, '2015-03-19', NULL, 5.06),
(388, 1, 2, 'submitted', NULL, NULL, NULL, NULL, '2015-03-19', NULL, 11.9025),
(389, 1, 3, 'submitted', NULL, NULL, NULL, NULL, '2015-03-19', NULL, 0),
(390, 1, 1, 'submitted', NULL, NULL, NULL, NULL, '2015-03-19', NULL, 11.04),
(391, 1, 1, 'submitted', NULL, NULL, NULL, NULL, '2015-03-19', NULL, 19.8),
(392, 1, 1, 'submitted', NULL, NULL, NULL, NULL, '2015-03-19', NULL, 2.76),
(393, 1, 1, 'processed', NULL, NULL, NULL, NULL, '2015-03-19', NULL, 12),
(394, 1, 1, 'draft', NULL, NULL, NULL, NULL, '2016-05-20', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderd_item`
--

CREATE TABLE IF NOT EXISTS `orderd_item` (
  `item_id` int(11) NOT NULL,
  `item_order_id` int(11) DEFAULT NULL,
  `item_product_id` int(11) DEFAULT NULL,
  `item_quantity` float DEFAULT NULL,
  `item_recived_quantity` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=245 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderd_item`
--

INSERT INTO `orderd_item` (`item_id`, `item_order_id`, `item_product_id`, `item_quantity`, `item_recived_quantity`) VALUES
(1, 1, 1, 3, 0),
(2, 1, 2, 2, 0),
(3, 8, 4, 4, 4),
(4, 2, 3, 1, 0),
(5, 2, 5, 3, 0),
(6, 3, 6, 1, 0),
(7, 8, 4, 4, 3),
(8, 8, 4, 4, 4),
(9, 15, 7, 4, NULL),
(10, 15, 3, 5, NULL),
(11, 16, 7, 3, NULL),
(12, 16, 3, 3, NULL),
(13, 17, 1, 1, NULL),
(14, 17, 2, 3, NULL),
(15, 17, 2, 5, NULL),
(16, 2, 7, 3, NULL),
(17, 26, 7, 1, NULL),
(18, 40, 2, 2, NULL),
(19, 1, 2, 5, NULL),
(20, 1, 2, 5, NULL),
(21, 1, 2, 5, NULL),
(22, 1, 2, 5, NULL),
(23, 1, 2, 5, NULL),
(28, 40, 1, 1, NULL),
(175, 58, 3, 1, NULL),
(179, 58, 4, 6, NULL),
(180, 58, 4, 3, NULL),
(182, 41, 7, 1, NULL),
(183, 41, 7, 1, NULL),
(184, 41, 7, 1, NULL),
(201, 59, 7, 2, 2),
(202, 59, 7, 4, 4),
(203, 61, 7, 2, NULL),
(204, 63, 7, 6, NULL),
(205, 76, 7, 3, NULL),
(206, 76, 7, 3, NULL),
(207, 76, 7, 3, NULL),
(208, 291, 1, 6, NULL),
(211, 370, 5, 2, NULL),
(212, 371, 1, 2, NULL),
(216, 378, 1, 12, NULL),
(217, 378, 1, 3, NULL),
(223, 380, 5, 2, NULL),
(224, 385, 1, 3, NULL),
(225, 385, 2, 3, NULL),
(226, 387, 2, 1, NULL),
(227, 387, 2, 1, NULL),
(228, 388, 3, 3, NULL),
(230, 390, 2, 4, NULL),
(231, 391, 2, 3, NULL),
(232, 391, 2, 3, NULL),
(233, 391, 2, 3, NULL),
(234, 392, 2, 1, NULL),
(244, 393, 2, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL,
  `product_code` int(11) NOT NULL DEFAULT '0',
  `supplier_product_code` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `product_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `product_category_id` int(11) NOT NULL DEFAULT '0',
  `product_supplier_id` int(11) NOT NULL DEFAULT '0',
  `product_raw_unit_price` float NOT NULL DEFAULT '0',
  `product_regular_unit_price` float NOT NULL DEFAULT '0',
  `product_regular_unit_price_rate` float NOT NULL DEFAULT '0',
  `product_gst` int(11) NOT NULL DEFAULT '0',
  `product_dimension` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `productDetails` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_unit_id` int(11) NOT NULL,
  `product_tax_id` int(11) NOT NULL,
  `product_min_qt` int(11) NOT NULL DEFAULT '1',
  `product_max_qt` int(11) NOT NULL DEFAULT '9999',
  `product_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_code`, `supplier_product_code`, `product_title`, `product_category_id`, `product_supplier_id`, `product_raw_unit_price`, `product_regular_unit_price`, `product_regular_unit_price_rate`, `product_gst`, `product_dimension`, `productDetails`, `product_unit_id`, `product_tax_id`, `product_min_qt`, `product_max_qt`, `product_status`) VALUES
(1, 11, '0', 'Coke', 6, 1, 2, 2.4, 20, 0, '', 'Lorem ipsum dolor sit amet, consectetur adipisicin', 2, 1, 1, 100, 1),
(3, 21, '0', 'Potato', 2, 2, 3, 3.45, 15, 0, '', 'Lorem ipsum dolor sit amet, consectetur adipisicin', 1, 2, 1, 100, 1),
(4, 22, '0', 'Onion', 2, 2, 5, 5.5, 10, 0, '', 'Lorem ipsum dolor sit amet, consectetur adipisicin', 1, 2, 1, 100, 1),
(5, 31, '0', 'CAKE BANANA', 3, 3, 3, 3.3, 0, 0, '', 'Lorem ipsum dolor sit amet, consectetur adipisicin', 5, 1, 1, 100, 1),
(6, 32, '0', 'RAMLY FISH BURGER ', 3, 3, 6, 8, 0, 0, '', 'Lorem ipsum dolor sit amet, consectetur adipisicin', 5, 1, 1, 100, 1),
(7, 41, '0', 'FRESHLY FISH FINGERS ', 5, 2, 10, 12, 0, 0, '', 'Lorem ipsum dolor sit amet, consectetur adipisicin', 1, 1, 1, 100, 1),
(8, 42, '0', 'Fresh Meats', 5, 3, 4, 5, 0, 0, '', 'Lorem ipsum dolor sit amet, consectetur adipisicin', 1, 1, 1, 100, 1),
(19, 991, '0', 'Test  Product', 3, 3, 10, 10.3, 3, 0, '', '', 2, 2, 1, 100, 1),
(22, 101, '444', 'Milk 2 ltr', 6, 4, 2, 2.3, 15, 0, '', '', 5, 1, 1, 9999, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `product_cat_id` int(11) NOT NULL,
  `product_cat_title` varchar(50) DEFAULT NULL,
  `product_cat_massure_unit` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_cat_id`, `product_cat_title`, `product_cat_massure_unit`) VALUES
(6, 'Drinks', 'liter'),
(7, 'Grocery', 'kg');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_title` varchar(50) DEFAULT NULL,
  `supplier_code` varchar(50) DEFAULT NULL,
  `supplier_name` varchar(50) DEFAULT NULL,
  `supplier_company_name` varchar(50) DEFAULT NULL,
  `supplier_email` varchar(50) DEFAULT NULL,
  `supplier_web` varchar(50) DEFAULT NULL,
  `supplier_phone` varchar(50) DEFAULT NULL,
  `supplier_address` varchar(50) DEFAULT NULL,
  `supplier_company_details` varchar(50) DEFAULT NULL,
  `supplier_tax_id` varchar(50) DEFAULT NULL,
  `supplier_special_note` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_title`, `supplier_code`, `supplier_name`, `supplier_company_name`, `supplier_email`, `supplier_web`, `supplier_phone`, `supplier_address`, `supplier_company_details`, `supplier_tax_id`, `supplier_special_note`) VALUES
(1, NULL, NULL, 'Danial Smith', 'ABC  Inc', 'dany@example.com', 'http://example.com', '+88301321535', 'Some Where in aucland', 'Lorem ipsum dolor sit amet, consectetur adipisicin', NULL, 'Somethin About Him And He is a gr8 supplier :)'),
(2, NULL, NULL, 'Larry Jon', 'Moneska Inc', 'larry@example.com', 'http://example.com', '+885345341321', 'Some Where in newzelan', 'Lorem ipsum dolor sit amet, consectetur adipisicin', NULL, 'Somethin About Him'),
(3, NULL, '007', 'Tom Lee', 'CBT Nuggest INC', 'tom@example.com', 'http://example.com', '+88335552321', 'Some Where in newzelan', 'Lorem ipsum dolor sit amet, consectetur adipisicin', NULL, 'Somethin About Him'),
(4, 'Distribution', '101', 'Distribution', 'Anatolia Distribution Limited', 'munn@cafeanatolia.co.nz', 'www.cafeanatolia.co.nz', '0211430570', 'Hastings New Zealand', NULL, '101-203-2348', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE IF NOT EXISTS `tax` (
  `tax_id` int(11) NOT NULL,
  `tax_name` varchar(50) DEFAULT NULL,
  `tax_calc` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`tax_id`, `tax_name`, `tax_calc`) VALUES
(1, 'Regular GST', 15),
(2, 'Without GST', 0);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`) VALUES
(1, 'kg'),
(2, 'liter'),
(5, 'pic'),
(13, 'box');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `coustomer`
--
ALTER TABLE `coustomer`
  ADD PRIMARY KEY (`coustomer_id`);

--
-- Indexes for table `crws`
--
ALTER TABLE `crws`
  ADD PRIMARY KEY (`crws_id`);

--
-- Indexes for table `c_product`
--
ALTER TABLE `c_product`
  ADD PRIMARY KEY (`c_product_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orderd_item`
--
ALTER TABLE `orderd_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_cat_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `coustomer`
--
ALTER TABLE `coustomer`
  MODIFY `coustomer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `crws`
--
ALTER TABLE `crws`
  MODIFY `crws_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `c_product`
--
ALTER TABLE `c_product`
  MODIFY `c_product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=395;
--
-- AUTO_INCREMENT for table `orderd_item`
--
ALTER TABLE `orderd_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=245;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `tax_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
