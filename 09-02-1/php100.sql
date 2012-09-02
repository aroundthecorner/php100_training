-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 09 月 02 日 15:40
-- 服务器版本: 5.5.24
-- PHP 版本: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `php100`
--

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `author` varchar(30) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `hits` int(11) DEFAULT '0',
  `description` varchar(255) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `uptime` int(11) DEFAULT NULL,
  `del` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `title`, `author`, `sort`, `type`, `hits`, `description`, `addtime`, `uptime`, `del`) VALUES
(1, '新闻1  update', 'xx1', 2, 2, 2010, '新闻1 agfadf', 1345879429, 1346562717, NULL),
(2, 'news-2', 'xx2', 3, 2, 1403, 'news-2', 1325347200, 1346556434, NULL),
(25, 'adfadfadf', 'ad', 12, 1, 0, 'adfadfadfadsf', 1346570630, NULL, NULL),
(24, 'adfadf', 'adf', 123, 2, 0, 'afadfadf', 1346570618, NULL, NULL),
(23, 'adfadf', 'adf', 111, 1, 0, 'adfadfadf', 1346570608, NULL, NULL),
(22, '123123', '123', 12, 1, 0, '1231231', 1346570593, NULL, NULL),
(10, '标题2', '23', 123123, 1, 1, '1', 1346517707, NULL, 1),
(11, 'hello', 'me', 123, 2, 2, 'baljbabj', 1346518901, 1346556440, NULL),
(12, '12312313', '1231', 1111, 1, 2, 'afdafadf', 1346518967, NULL, 1),
(13, '中文测试', 'hello', 123, 1, 1, '阿德开房间阿款到即发', 1346525690, NULL, 1),
(14, 'tagagag', 'adfadf', 123, 2, 1, 'adfadf', 1346562612, 1346562723, 1),
(15, 'qerqer', 'qerqer', 111, 1, 1, 'adadf', 1346562630, NULL, NULL),
(16, 'fadfadfadf', 'adf', 12, 1, 0, 'adfadf', 1346562648, NULL, NULL),
(17, 'adfadf', 'adf', 123123, 1, 0, 'adfadf', 1346562661, NULL, NULL),
(18, 'adfadf', 'adfadf', 123213, 1, 0, 'asfdadfdaf', 1346562679, NULL, NULL),
(19, 'adfadsf', 'adfadf', 1231, 1, 0, 'afdadf', 1346562712, NULL, NULL),
(20, 'adfadf', 'adfa', 123, 2, 0, 'adfadf', 1346562760, NULL, NULL),
(21, '123123', '123', 123, 2, 0, 'adfadf', 1346562775, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `news_content`
--

CREATE TABLE IF NOT EXISTS `news_content` (
  `nid` int(11) NOT NULL DEFAULT '0',
  `content` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `news_content`
--

INSERT INTO `news_content` (`nid`, `content`) VALUES
(1, 'this is the content of news1 阿德法地方'),
(2, 'this is the content of news3'),
(8, '测试'),
(9, '测试'),
(10, '1'),
(11, 'abjljb'),
(12, 'adfadfadsf'),
(13, '阿达到发达省份'),
(14, 'adfadfadf'),
(15, 'adfadf'),
(16, 'adfadf'),
(17, 'adfadf'),
(18, 'adfadf'),
(19, 'afadf'),
(20, 'adfadfasdf'),
(21, 'afadf'),
(22, '123123'),
(23, 'adfadf'),
(24, 'adfadfadf'),
(25, 'adfadfadsf');

-- --------------------------------------------------------

--
-- 表的结构 `news_type`
--

CREATE TABLE IF NOT EXISTS `news_type` (
  `ttid` int(11) NOT NULL AUTO_INCREMENT,
  `typename` varchar(50) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  PRIMARY KEY (`ttid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `news_type`
--

INSERT INTO `news_type` (`ttid`, `typename`, `tid`) VALUES
(1, '国内新闻', NULL),
(2, '国外新闻', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) NOT NULL DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`id`, `name`) VALUES
(1, 'P1'),
(2, 'P2'),
(3, 'P3'),
(8, 'P8');

-- --------------------------------------------------------

--
-- 表的结构 `p_users`
--

CREATE TABLE IF NOT EXISTS `p_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(33) NOT NULL,
  `sex` enum('male','female') DEFAULT NULL,
  `desc` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `sid` int(10) NOT NULL DEFAULT '0',
  `id` int(10) DEFAULT NULL,
  `customer` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sales`
--

INSERT INTO `sales` (`sid`, `id`, `customer`) VALUES
(1, 3, 'c1'),
(2, 3, 'c2'),
(3, 3, 'c1'),
(4, 1, 'c5'),
(5, 2, 'c5'),
(6, 10, 'c10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
