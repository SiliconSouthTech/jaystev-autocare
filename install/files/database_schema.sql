-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2008 at 05:56 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.5

SET FOREIGN_KEY_CHECKS=0;

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `backendpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `be_acl_actions`
--

DROP TABLE IF EXISTS `be_acl_actions`;
CREATE TABLE IF NOT EXISTS `be_acl_actions` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(254) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `be_acl_actions`
--


-- --------------------------------------------------------

--
-- Table structure for table `be_acl_groups`
--

DROP TABLE IF EXISTS `be_acl_groups`;
CREATE TABLE IF NOT EXISTS `be_acl_groups` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `lft` int(10) unsigned NOT NULL default '0',
  `rgt` int(10) unsigned NOT NULL default '0',
  `name` varchar(254) NOT NULL,
  `link` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `lft` (`lft`),
  KEY `rgt` (`rgt`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `be_acl_groups`
--

INSERT INTO `be_acl_groups` (`id`, `lft`, `rgt`, `name`, `link`) VALUES
(1, 1, 4, 'Member', NULL),
(2, 2, 3, 'Administrator', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `be_acl_permissions`
--

DROP TABLE IF EXISTS `be_acl_permissions`;
CREATE TABLE IF NOT EXISTS `be_acl_permissions` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `aro_id` int(10) unsigned NOT NULL default '0',
  `aco_id` int(10) unsigned NOT NULL default '0',
  `allow` char(1) default NULL,
  PRIMARY KEY  (`id`),
  KEY `aro_id` (`aro_id`),
  KEY `aco_id` (`aco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `be_acl_permissions`
--

INSERT INTO `be_acl_permissions` (`id`, `aro_id`, `aco_id`, `allow`) VALUES
(1, 2, 1, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `be_acl_permission_actions`
--

DROP TABLE IF EXISTS `be_acl_permission_actions`;
CREATE TABLE IF NOT EXISTS `be_acl_permission_actions` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `access_id` int(10) unsigned NOT NULL default '0',
  `axo_id` int(10) unsigned NOT NULL default '0',
  `allow` char(1) default NULL,
  PRIMARY KEY  (`id`),
  KEY `access_id` (`access_id`),
  KEY `axo_id` (`axo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `be_acl_permission_actions`
--


-- --------------------------------------------------------

--
-- Table structure for table `be_acl_resources`
--

DROP TABLE IF EXISTS `be_acl_resources`;
CREATE TABLE IF NOT EXISTS `be_acl_resources` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `lft` int(10) unsigned NOT NULL default '0',
  `rgt` int(10) unsigned NOT NULL default '0',
  `name` varchar(254) NOT NULL,
  `link` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `lft` (`lft`),
  KEY `rgt` (`rgt`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `be_acl_resources`
--

INSERT INTO `be_acl_resources` (`id`, `lft`, `rgt`, `name`, `link`) VALUES
(1, 1, 46, 'Site', NULL),
(2, 26, 45, 'Control Panel', NULL),
(3, 27, 44, 'System', NULL),
(4, 38, 39, 'Members', NULL),
(5, 28, 37, 'Access Control', NULL),
(6, 40, 41, 'Settings', NULL),
(7, 42, 43, 'Utilities', NULL),
(8, 35, 36, 'Permissions', NULL),
(9, 33, 34, 'Groups', NULL),
(10, 31, 32, 'Resources', NULL),
(11, 29, 30, 'Actions', NULL),
(12, 2, 25, 'General', 0),
(13, 23, 24, 'Calendar', 0),
(14, 21, 22, 'Categories', 0),
(15, 19, 20, 'Customers', 0),
(16, 17, 18, 'Menus', 0),
(17, 15, 16, 'Messages', 0),
(18, 13, 14, 'Orders', 0),
(19, 11, 12, 'Pages', 0),
(20, 9, 10, 'Products', 0),
(21, 7, 8, 'Subscribers', 0),
(22, 5, 6, 'Admins', 0),
(23, 3, 4, 'Filemanager', 0);

-- --------------------------------------------------------

--
-- Table structure for table `be_groups`
--

DROP TABLE IF EXISTS `be_groups`;
CREATE TABLE IF NOT EXISTS `be_groups` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `locked` tinyint(1) unsigned NOT NULL default '0',
  `disabled` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `be_groups`
--

INSERT INTO `be_groups` (`id`, `locked`, `disabled`) VALUES
(1, 1, 0),
(2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `be_preferences`
--

DROP TABLE IF EXISTS `be_preferences`;
CREATE TABLE IF NOT EXISTS `be_preferences` (
  `name` varchar(254) character set latin1 NOT NULL,
  `value` text character set latin1 NOT NULL,
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `be_preferences`
--

INSERT INTO `be_preferences` (`name`, `value`) VALUES
('default_user_group', '1'),
('smtp_host', ''),
('keep_error_logs_for', '30'),
('email_protocol', 'mail'),
('use_registration_captcha', '0'),
('page_debug', '0'),
('automated_from_name', 'BackendPro'),
('allow_user_registration', '1'),
('use_login_captcha', '0'),
('site_name', 'Codeigniter Shopping Cart'),
('automated_from_email', 'noreply@backendpro.co.uk'),
('account_activation_time', '7'),
('allow_user_profiles', '1'),
('activation_method', 'email'),
('autologin_period', '30'),
('min_password_length', '4'),
('smtp_user', ''),
('smtp_pass', ''),
('email_mailpath', '/usr/sbin/sendmail'),
('smtp_port', '25'),
('smtp_timeout', '5'),
('email_wordwrap', '1'),
('email_wrapchars', '76'),
('email_mailtype', 'text'),
('email_charset', 'utf-8'),
('bcc_batch_mode', '0'),
('bcc_batch_size', '200'),
('login_field', 'email'),
('main_nav_parent_id', '107'),
('categories_parent_id', '1'),
('admin_email', 'admin@gmail.com'),
('webshop_slideshow', 'cu3er'),
('slideshow_two', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `be_resources`
--

DROP TABLE IF EXISTS `be_resources`;
CREATE TABLE IF NOT EXISTS `be_resources` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `locked` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `be_resources`
--

INSERT INTO `be_resources` (`id`, `locked`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(18, 0),
(19, 0),
(20, 0),
(21, 0),
(22, 0),
(23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `be_users`
--

DROP TABLE IF EXISTS `be_users`;
CREATE TABLE IF NOT EXISTS `be_users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(32) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(254) NOT NULL,
  `active` tinyint(1) unsigned NOT NULL default '0',
  `group` int(10) unsigned default NULL,
  `activation_key` varchar(32) default NULL,
  `last_visit` datetime default NULL,
  `created` datetime NOT NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `password` (`password`),
  KEY `group` (`group`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `be_users`
--
 
-- --------------------------------------------------------

--
-- Table structure for table `be_user_profiles`
--

DROP TABLE IF EXISTS `be_user_profiles`;
CREATE TABLE IF NOT EXISTS `be_user_profiles` (
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `be_user_profiles`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) character set latin1 NOT NULL default '0',
  `ip_address` varchar(16) character set latin1 NOT NULL default '0',
  `user_agent` varchar(50) character set latin1 NOT NULL,
  `user_data` text NOT NULL,
  `last_activity` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`

--
-- For Kaimono Kago
-- --------------------------------------------------------

--
-- Table structure for table `eventcal`
--

DROP TABLE IF EXISTS `eventcal`;
CREATE TABLE IF NOT EXISTS `eventcal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(25) NOT NULL DEFAULT 'anonimous',
  `user_id` int(25) NOT NULL,
  `eventDate` date DEFAULT NULL,
  `eventTitle` varchar(100) DEFAULT NULL,
  `eventContent` text,
  `privacy` enum('public','private') NOT NULL DEFAULT 'public',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;


-- --------------------------------------------------------

--
-- Table structure for table `omc_category`
--

DROP TABLE IF EXISTS `omc_category`;
CREATE TABLE IF NOT EXISTS `omc_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `shortdesc` varchar(255) NOT NULL,
  `longdesc` text NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `parentid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

INSERT INTO `omc_category` (`id`, `name`, `shortdesc`, `longdesc`, `status`, `parentid`) VALUES
(102, 'Digital Downloads', 'Short Description', 'Long Description', 'active', 1),
(101, 'Movies, Music & Games', 'Short Description', 'Long Description', 'active', 1),
(99, 'Books', 'Here you can write a short description of books category.', 'Here you can write a long description of books category.', 'active', 1),
(1, 'Webshop', '', '', 'active', 0),
(107, 'Quicksand_products', '', '', 'active', 105),
(105, 'Quicksand', '', '', 'active', 0),
(100, 'CD', 'Here you can write a short description of this category.', 'Here you can write a long description of this category.', 'active', 1),
(103, 'Computers & Office', 'Short Description', 'Long Description', 'active', 1),
(104, 'Electronics', 'Short Description', 'Long Description', 'active', 1);


-- --------------------------------------------------------

--
-- Table structure for table `omc_colors`
--

DROP TABLE IF EXISTS `omc_colors`;
CREATE TABLE IF NOT EXISTS `omc_colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;



-- --------------------------------------------------------

--
-- Table structure for table `omc_customer`
--

DROP TABLE IF EXISTS `omc_customer`;
CREATE TABLE IF NOT EXISTS `omc_customer` (
  `customer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(50) NOT NULL,
  `customer_first_name` varchar(50) NOT NULL,
  `customer_last_name` varchar(50) NOT NULL,
  `phone_number` int(10) unsigned NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `post_code` int(10) unsigned NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;


-- --------------------------------------------------------

--
-- Table structure for table `omc_menu`
--

DROP TABLE IF EXISTS `omc_menu`;
CREATE TABLE IF NOT EXISTS `omc_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `shortdesc` varchar(255) NOT NULL,
  `page_uri` varchar(60) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `parentid` int(10) NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_uri`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=131 ;

INSERT INTO `omc_menu` (`id`, `name`, `shortdesc`, `page_uri`, `status`, `parentid`, `order`) VALUES
(107, 'Webshop', '', '0', 'active', 0, 20),
(112, 'Webshop', '', 'webshop', 'active', 107, 10),
(113, 'About', '', 'about_us', 'active', 107, 20),
(114, 'Shopping guide', '', 'shopping_guide', 'active', 107, 30),
(115, 'Product information', '', 'productinformation', 'active', 114, 10),
(116, 'Gift card', '', 'gift_card', 'active', 114, 20),
(117, 'Shipping', '', 'shipping', 'active', 114, 30),
(118, 'Payment', '', '0', 'inactive', 114, 40),
(120, 'About copyright', '', '0', 'inactive', 114, 60),
(121, 'Products', '', '0', 'inactive', 107, 40),
(122, 'News', '', 'news', 'active', 107, 50),
(124, 'Contact us', '', 'contact_us', 'active', 107, 70),
(125, 'Go to checkout', 'shopping cart', 'checkout', 'active', 107, 80);

-- --------------------------------------------------------

--
-- Table structure for table `omc_messages`
--

DROP TABLE IF EXISTS `omc_messages`;
CREATE TABLE IF NOT EXISTS `omc_messages` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` text,
  PRIMARY KEY (`msg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;


-- --------------------------------------------------------

--
-- Table structure for table `omc_order`
--

DROP TABLE IF EXISTS `omc_order`;
CREATE TABLE IF NOT EXISTS `omc_order` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `payment_date` datetime NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;


-- --------------------------------------------------------

--
-- Table structure for table `omc_order_item`
--

DROP TABLE IF EXISTS `omc_order_item`;
CREATE TABLE IF NOT EXISTS `omc_order_item` (
  `order_item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`order_item_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;



-- --------------------------------------------------------

--
-- Table structure for table `omc_page`
--

DROP TABLE IF EXISTS `omc_page`;
CREATE TABLE IF NOT EXISTS `omc_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `path` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

INSERT INTO `omc_page` (`id`, `name`, `keywords`, `description`, `path`, `content`, `status`, `category_id`) VALUES
(25, 'Web shop', '', '', 'webshop', '<h1>Your heading here.</h1>\n<h2>Content from weshop page in the back-end</h2>', 'active', 0),
(26, 'About us', '', '', 'about_us', '<h2>About us</h2>\nPellentesque habitant morbi trist', 'active', 0),
(27, 'Product information', '', '', 'productinformation', '<h2>Product information</h2>\nThunder, thundeercats! Thundercats!', 'active', 0),
(28, 'Shopping guide', '', '', 'shopping_guide', '<h1>Shopping guide</h1>\nTop Cat! The most effectual.', 'active', 0),
(29, 'Gift card', '', '', 'gift_card', '<h2>Gift card</h2>\nLorem ipsum dolor.', 'active', 0),
(30, 'Shipping', '', '', 'shipping', '<h2>Shipping information</h2><Lorem ipsum dolor sit ameerat', 'active', 0),
(33, 'News', '', '', 'news', '<h2>News</h2>\nUlysses, Ulyssese.', 'active', 0),
(35, 'Contact us', '', '', 'contact_us', 'Pellentesque ha leo.', 'active', 0),
(38, 'Go to checkout', '', '', 'checkout', '', 'active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `omc_product`
--

DROP TABLE IF EXISTS `omc_product`;
CREATE TABLE IF NOT EXISTS `omc_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `shortdesc` varchar(255) NOT NULL,
  `longdesc` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_order` int(11) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `grouping` varchar(16) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL,
  `category_id` int(11) NOT NULL,
  `featured` enum('none','front','webshop') NOT NULL,
  `other_feature` enum('none','most sold','new product') NOT NULL,
  `price` float(7,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=137 ;

--
-- Dumping data for table `omc_product`
--

INSERT INTO `omc_product` (`id`, `name`, `shortdesc`, `longdesc`, `thumbnail`, `image`, `product_order`, `class`, `grouping`, `status`, `category_id`, `featured`, `other_feature`, `price`) VALUES
(71, 'Shortland', '', '', 'assets/images/digital_downloads/thumbnails/114x207_5.jpg', 'assets/images/digital_downloads/242x440_5.jpg', 0, '', '', 'active', 102, 'webshop', 'none', 268.00),
(72, 'D2301-01', '', '', 'assets/images/computers_&_office/thumbnails/114x207_8.jpg', 'assets/images/computers_&_office/242x440_8.jpg', 0, '', '', 'active', 102, 'webshop', 'new product', 268.00),
(73, 'Friendship', '', '', 'assets/images/movies,_music_&_games/thumbnails/114x207_8.jpg', 'assets/images/movies,_music_&_games/242x440_8.jpg', 0, '', '', 'active', 102, 'webshop', 'none', 198.00),
(74, 'Placerat', '', '', 'assets/images/movies,_music_&_games/thumbnails/114x207_9.jpg', 'assets/images/movies,_music_&_games/242x440_9.jpg', 0, '', '', 'active', 101, 'webshop', 'new product', 268.00),
(75, 'Elementum', '', '', 'assets/images/movies,_music_&_games/thumbnails/114x207_2.jpg', 'assets/images/movies,_music_&_games/242x440_2.jpg', 0, '', '', 'active', 101, 'webshop', 'most sold', 418.00),
(76, 'Porttitor', '', '', 'assets/images/movies,_music_&_games/thumbnails/114x207_10.jpg', 'assets/images/movies,_music_&_games/242x440_10.jpg', 0, '', '', 'active', 101, 'webshop', '', 268.00),
(77, 'Rerefe', '', '', 'assets/images/computers_&_office/thumbnails/114x207_17.jpg', 'assets/images/computers_&_office/242x440_17.jpg', 0, '', '', 'active', 103, 'webshop', 'most sold', 268.00),
(78, 'Rre resettr', '', '', 'assets/images/computers_&_office/thumbnails/114x207_11.jpg', 'assets/images/computers_&_office/242x440_11.jpg', 0, '', '', 'active', 103, 'webshop', 'most sold', 268.00),
(79, 'Pruyyuty', '', '', 'assets/images/computers_&_office/thumbnails/114x207_12.jpg', 'assets/images/computers_&_office/242x440_12.jpg', 0, '', '', 'active', 103, 'webshop', 'new product', 268.00),
(82, 'Gfwee', '', '', 'assets/images/books/thumbnails/114x207_14.jpg', 'assets/images/books/242x440_14.jpg', 0, '', '', 'active', 99, 'webshop', '', 268.00),
(84, 'Sjuer', '', '', 'assets/images/books/thumbnails/114x207_16.jpg', 'assets/images/books/242x440_16.jpg', 0, '', '', 'active', 99, 'webshop', '', 268.00),
(85, 'Isbjorn', '', '', 'assets/images/books/thumbnails/114x207_16.jpg', 'assets/images/books/242x440_16.jpg', 0, '', '', 'active', 99, 'webshop', 'most sold', 498.00),
(89, 'Medite eret', '', '', 'assets/images/books/thumbnails/114x207_17.jpg', 'assets/images/books/242x440_17.jpg', 0, '', '', 'active', 99, 'webshop', 'most sold', 268.00),
(97, 'Oyenter', '', '', 'assets/images/electronics/thumbnails/114x207_7.jpg', 'assets/images/electronics/242x440_7.jpg', 0, '', '', 'active', 104, 'webshop', 'most sold', 268.00),
(103, 'Ville hjempener', '', '', 'assets/images/movies,_music_&_games/thumbnails/114x207_10.jpg', 'assets/images/movies,_music_&_games/242x440_10.jpg', 0, '', '', 'active', 104, 'webshop', 'most sold', 418.00),
(104, 'Den here ire ierrr tere', '', '', 'assets/images/movies,_music_&_games/thumbnails/114x207_4.jpg', 'assets/images/movies,_music_&_games/242x440_4.jpg', 0, '', '', 'active', 104, 'webshop', 'new product', 418.00),
(105, 'Alvieun', '', '', 'assets/images/movies,_music_&_games/thumbnails/114x207_7.jpg', 'assets/images/movies,_music_&_games/242x440_7.jpg', 0, '', '', 'active', 100, 'webshop', 'new product', 418.00),
(106, 'Truatu', '', '', 'assets/images/movies,_music_&_games/thumbnails/114x207_2.jpg', 'assets/images/movies,_music_&_games/242x440_2.jpg', 0, '', '', 'active', 100, 'webshop', 'most sold', 268.00);

-- --------------------------------------------------------

--
-- Table structure for table `omc_product_colors`
--

DROP TABLE IF EXISTS `omc_product_colors`;
CREATE TABLE IF NOT EXISTS `omc_product_colors` (
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`color_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `omc_product_sizes`
--

DROP TABLE IF EXISTS `omc_product_sizes`;
CREATE TABLE IF NOT EXISTS `omc_product_sizes` (
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`size_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `omc_sizes`
--

DROP TABLE IF EXISTS `omc_sizes`;
CREATE TABLE IF NOT EXISTS `omc_sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;


-- --------------------------------------------------------

--
-- Table structure for table `omc_subscribers`
--

DROP TABLE IF EXISTS `omc_subscribers`;
CREATE TABLE IF NOT EXISTS `omc_subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;


-- --------------------------------------------------------

--
-- Table structure for table `shoutbox`
--

DROP TABLE IF EXISTS `shoutbox`;
CREATE TABLE IF NOT EXISTS `shoutbox` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(25) NOT NULL DEFAULT 'anonimous',
  `user_id` int(25) NOT NULL,
  `message` varchar(255) NOT NULL DEFAULT '',
  `status` enum('to do','completed') NOT NULL DEFAULT 'to do',
  `privacy` enum('public','private') NOT NULL DEFAULT 'public',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=132 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `be_acl_permissions`
--
ALTER TABLE `be_acl_permissions`
  ADD CONSTRAINT `be_acl_permissions_ibfk_1` FOREIGN KEY (`aro_id`) REFERENCES `be_acl_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `be_acl_permissions_ibfk_2` FOREIGN KEY (`aco_id`) REFERENCES `be_acl_resources` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `be_acl_permission_actions`
--
ALTER TABLE `be_acl_permission_actions`
  ADD CONSTRAINT `be_acl_permission_actions_ibfk_1` FOREIGN KEY (`access_id`) REFERENCES `be_acl_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `be_acl_permission_actions_ibfk_2` FOREIGN KEY (`axo_id`) REFERENCES `be_acl_actions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `be_groups`
--
ALTER TABLE `be_groups`
  ADD CONSTRAINT `be_groups_ibfk_1` FOREIGN KEY (`id`) REFERENCES `be_acl_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `be_resources`
--
ALTER TABLE `be_resources`
  ADD CONSTRAINT `be_resources_ibfk_1` FOREIGN KEY (`id`) REFERENCES `be_acl_resources` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `be_users`
--
ALTER TABLE `be_users`
  ADD CONSTRAINT `be_users_ibfk_1` FOREIGN KEY (`group`) REFERENCES `be_acl_groups` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `be_user_profiles`
--
ALTER TABLE `be_user_profiles`
  ADD CONSTRAINT `be_user_profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `be_users` (`id`) ON DELETE CASCADE;

SET FOREIGN_KEY_CHECKS=1;



