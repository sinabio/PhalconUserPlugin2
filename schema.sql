-- Host: localhost
-- Generation Time: Oct 25, 2013 at 09:53 AM
-- Server version: 5.5.32
-- PHP Version: 5.5.5-1+debphp.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(48) COLLATE utf8_bin NOT NULL,
  `password` varchar(128) COLLATE utf8_bin NOT NULL,
  `facebook_id` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `facebook_name` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `facebook_data` text COLLATE utf8_bin,
  `linkedin_id` int(11) DEFAULT NULL,
  `linkedin_name` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `linkedin_data` text COLLATE utf8_bin,
  `gplus_id` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `gplus_name` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `gplus_data` text COLLATE utf8_bin,
  `twitter_id` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `twitter_name` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `twitter_data` text COLLATE utf8_bin,
  `must_change_password` tinyint(1) DEFAULT NULL,
  `group_id` tinyint(3) unsigned NOT NULL,
  `banned` tinyint(1) NOT NULL,
  `suspended` tinyint(1) NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `facebook_id` (`facebook_id`,`facebook_name`),
  KEY `linkedin_id` (`linkedin_id`,`linkedin_name`),
  KEY `gplus_id` (`gplus_id`,`gplus_name`,`twitter_id`,`twitter_name`),
  KEY `name` (`name`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_email_confirmations`
--

DROP TABLE IF EXISTS `user_email_confirmations`;
CREATE TABLE IF NOT EXISTS `user_email_confirmations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `code` char(32) COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `confirmed` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_failed_logins`
--

DROP TABLE IF EXISTS `user_failed_logins`;
CREATE TABLE IF NOT EXISTS `user_failed_logins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` char(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `attempted` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usersId` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_bin NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `active` (`active`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `user_groups` (`id`, `name`, `active`) VALUES
(1, 'Administrators', 1),
(2, 'Users', 1),
(3, 'Read-Only', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_password_changes`
--

DROP TABLE IF EXISTS `user_password_changes`;
CREATE TABLE IF NOT EXISTS `user_password_changes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `ip_address` char(15) COLLATE utf8_bin NOT NULL,
  `user_agent` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

DROP TABLE IF EXISTS `user_permissions`;
CREATE TABLE IF NOT EXISTS `user_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` tinyint(3) unsigned NOT NULL,
  `resource` varchar(16) COLLATE utf8_bin NOT NULL,
  `action` varchar(16) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usersId` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=123 ;

--
-- Dumping data for table `permissions`
--

INSERT INTO `user_permissions` ( `group_id`, `resource`, `action`) VALUES
(3, 'users', 'index'),
(3, 'users', 'search'),
(3, 'user_groups', 'index'),
(3, 'user_groups', 'search'),
(1, 'users', 'index'),
(1, 'users', 'search'),
(1, 'users', 'edit'),
(1, 'users', 'create'),
(1, 'users', 'delete'),
(1, 'user_groups', 'index'),
(1, 'user_groups', 'search'),
(1, 'user_groups', 'edit'),
(1, 'user_groups', 'create'),
(1, 'user_groups', 'delete'),
(1, 'permissions', 'index'),
(2, 'users', 'index'),
(2, 'users', 'search'),
(2, 'users', 'edit'),
(2, 'users', 'create'),
(1, 'user_account', 'edit'),
(2, 'user_account', 'edit'),
(1, 'user_account', 'changePassword'),
(2, 'user_account', 'changePassword'),
(2, 'user_groups', 'index'),
(2, 'user_groups', 'search');

-- --------------------------------------------------------

--
-- Table structure for table `user_remember_tokens`
--

DROP TABLE IF EXISTS `user_remember_tokens`;
CREATE TABLE IF NOT EXISTS `user_remember_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `token` char(32) COLLATE utf8_bin NOT NULL,
  `user_agent` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `token` (`token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_reset_passwords`
--

DROP TABLE IF EXISTS `user_reset_passwords`;
CREATE TABLE IF NOT EXISTS `user_reset_passwords` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `code` varchar(48) COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `reset` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usersId` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_success_logins`
--

DROP TABLE IF EXISTS `user_success_logins`;
CREATE TABLE IF NOT EXISTS `user_success_logins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `ip_address` char(15) COLLATE utf8_bin NOT NULL,
  `user_agent` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usersId` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=238 ;

