-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 30 2014 г., 15:48
-- Версия сервера: 5.5.29
-- Версия PHP: 5.4.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `smarthouse`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_devices_catalog`
--

CREATE TABLE IF NOT EXISTS `tbl_devices_catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `address` varchar(100) NOT NULL,
  `type_id` int(11) NOT NULL,
  `cur_value` varchar(150) NOT NULL,
  `desc` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `tbl_devices_catalog`
--

INSERT INTO `tbl_devices_catalog` (`id`, `name`, `address`, `type_id`, `cur_value`, `desc`) VALUES
(14, 'Спальня', 'sad', 2, '25', 'Температура в сапльне'),
(15, 'master2', 'ew12', 1, '', 'Мастер'),
(16, 'Кухня', 'sdasd', 2, '-5', 'Температура в кухне'),
(17, 'Гостинная', 'sdasd', 3, '1', 'Свет в гостинной'),
(18, 'Кухня', 'sdasd', 3, '1', 'Свет в кухне');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_devices_type`
--

CREATE TABLE IF NOT EXISTS `tbl_devices_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `tbl_devices_type`
--

INSERT INTO `tbl_devices_type` (`id`, `name`) VALUES
(1, 'master'),
(2, 'temperature'),
(3, 'key_light');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_voice_actions`
--

CREATE TABLE IF NOT EXISTS `tbl_voice_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `tbl_voice_actions`
--

INSERT INTO `tbl_voice_actions` (`id`, `desc`, `type_id`) VALUES
(1, 'kitchen', 4),
(2, 'brain', 1),
(3, 'bedroom', 4),
(4, 'light', 3),
(5, 'power', 3),
(6, 'turnon', 2),
(7, 'turnoff', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_voice_synonyms`
--

CREATE TABLE IF NOT EXISTS `tbl_voice_synonyms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action_id` int(11) NOT NULL,
  `word` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `tbl_voice_synonyms`
--

INSERT INTO `tbl_voice_synonyms` (`id`, `action_id`, `word`) VALUES
(1, 2, 'чарльз'),
(2, 2, 'чарлз'),
(3, 1, 'кухне'),
(4, 1, 'кухни'),
(5, 1, 'кухня'),
(6, 3, 'спальни'),
(7, 3, 'спальне'),
(8, 4, 'свет'),
(9, 5, 'электричество'),
(10, 6, 'включи'),
(11, 6, 'включить'),
(12, 7, 'выключи'),
(13, 7, 'выруби'),
(14, 2, 'идиот'),
(15, 7, 'выключить');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_voice_types`
--

CREATE TABLE IF NOT EXISTS `tbl_voice_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `tbl_voice_types`
--

INSERT INTO `tbl_voice_types` (`id`, `type`) VALUES
(1, 'brain'),
(2, 'do'),
(3, 'what'),
(4, 'where');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
