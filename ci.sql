-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 31 2015 г., 16:36
-- Версия сервера: 5.5.41-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `gmans_faq`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `preview` mediumtext NOT NULL,
  `text` text NOT NULL,
  `alias` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `favorite` varchar(1) NOT NULL,
  `publish` varchar(1) NOT NULL,
  `seo_title` tinytext NOT NULL,
  `seo_description` tinytext NOT NULL,
  `seo_keywords` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Структура таблицы `categs`
--

CREATE TABLE IF NOT EXISTS `categs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `publish` int(1) NOT NULL,
  `favorite` int(1) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `component` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `public` tinyint(1) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Структура таблицы `gallery_images`
--

CREATE TABLE IF NOT EXISTS `gallery_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `album_id` int(11) NOT NULL,
  `position` int(10) unsigned NOT NULL DEFAULT '999',
  `component` varchar(255) DEFAULT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=271 ;

-- --------------------------------------------------------

--
-- Структура таблицы `meta`
--

CREATE TABLE IF NOT EXISTS `meta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `seo_title` text,
  `seo_keywords` text,
  `seo_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `text` mediumtext,
  `seo_title` text,
  `seo_description` text,
  `seo_keywords` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `value` varchar(1000) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `name`, `type`, `value`, `description`) VALUES
(10, 'site_name', 'input', 'CMS Сибирь', 'Название сайта'),
(11, 'site_jumbotron', 'editor', '<h1>Navbar example</h1>\r\n<p>This example is a quick exercise to illustrate how the default, static navbar and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>\r\n<p><a class="btn btn-lg btn-primary" href="#">View navbar docs &raquo;</a></p>', 'Описание сайта(jumbotron)'),
(12, 'articles_favorites_count', 'input', '4', 'Избранных статей на главной'),
(13, 'articles_items_per_pages', 'input', '5', 'Статей на странцу'),
(14, 'gallery_image_width', 'input', '800', 'Ширина изображения для галереи'),
(15, 'gallery_image_height', 'input', '600', 'Высота изображения для галереи'),
(16, 'gallery_cropper', 'input', 'FALSE', 'Включить кропер'),
(17, 'gallery_image_quality', 'input', '95%', 'Качество изображений'),
(18, 'gallery_preview_width', 'input', '320', 'Ширина превью для галереи'),
(19, 'gallery_preview_height', 'input', '200', 'Высота превью для галереи'),
(22, 'site_meta_title', 'input', 'Сайт на Middle CMS', 'Заголовок страницы по умолчанию'),
(23, 'site_meta_keywords', 'input', 'Сайт, великий сайт, всея Руси', 'Поисковые фразы по умолчанию'),
(24, 'site_meta_description', 'text', 'Прекраснейшая CMS для любого сайта!', 'Мета описание страниц по умолчанию');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
