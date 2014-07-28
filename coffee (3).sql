-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 28 2014 г., 19:55
-- Версия сервера: 5.5.35-log
-- Версия PHP: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `coffee`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL DEFAULT '',
  `userid` varchar(64) NOT NULL DEFAULT '',
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', '1', NULL, 'N;'),
('Admin', '2', NULL, 'N;');

-- --------------------------------------------------------

--
-- Структура таблицы `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL DEFAULT '',
  `type` int(11) NOT NULL DEFAULT '0',
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Guest', 2, NULL, NULL, 'N;'),
('Authenticated', 2, NULL, NULL, 'N;'),
('Admin', 2, NULL, NULL, 'N;'),
('Users.Default.Login', 0, NULL, NULL, 'N;'),
('Mainpage.Default.*', 1, NULL, NULL, 'N;'),
('Pages.Default.*', 1, NULL, NULL, 'N;'),
('Shop.Default.*', 1, NULL, NULL, 'N;'),
('Users.Default.*', 1, NULL, NULL, 'N;'),
('Mainpage.Default.Index', 0, NULL, NULL, 'N;'),
('Mainpage.Default.Error', 0, NULL, NULL, 'N;'),
('Pages.Default.Category', 0, NULL, NULL, 'N;'),
('Pages.Default.AllNews', 0, NULL, NULL, 'N;'),
('Pages.Default.View', 0, NULL, NULL, 'N;'),
('Pages.Default.Rss', 0, NULL, NULL, 'N;'),
('Shop.Default.Index', 0, NULL, NULL, 'N;'),
('Shop.Default.Search', 0, NULL, NULL, 'N;'),
('Shop.Default.GetGroup', 0, NULL, NULL, 'N;'),
('Shop.Default.AddToCart', 0, NULL, NULL, 'N;'),
('Shop.Default.MyCart', 0, NULL, NULL, 'N;'),
('Shop.Default.RemoveFromCart', 0, NULL, NULL, 'N;'),
('Shop.Default.NewOrder', 0, NULL, NULL, 'N;'),
('Shop.Default.Pay', 0, NULL, NULL, 'N;'),
('Shop.Default.SuccessOrder', 0, NULL, NULL, 'N;'),
('Shop.Default.GetFile', 0, NULL, NULL, 'N;'),
('Users.Default.Profile', 0, NULL, NULL, 'N;'),
('Users.Default.Registration', 0, NULL, NULL, 'N;'),
('Users.Default.SuccessRegistration', 0, NULL, NULL, 'N;'),
('Users.Default.Logout', 0, NULL, NULL, 'N;'),
('Users.Default.ChangePassword', 0, NULL, NULL, 'N;'),
('Shop.Default.Fail', 0, NULL, NULL, 'N;'),
('Shop.Default.PostPay', 0, NULL, NULL, 'N;'),
('Shop.Default.BackPay', 0, NULL, NULL, 'N;'),
('Shop.Default.ErrPay', 0, NULL, NULL, 'N;'),
('Shop.Default.Success', 0, NULL, NULL, 'N;'),
('Shop.Default.Clear', 0, NULL, NULL, 'N;'),
('Feedback.Default.*', 1, NULL, NULL, 'N;'),
('Feedback.Default.Index', 0, NULL, NULL, 'N;'),
('Feedback.Default.SuccessSend', 0, NULL, NULL, 'N;'),
('Users.Default.EditProfile', 0, NULL, NULL, 'N;'),
('Shop.Default.Test', 0, NULL, NULL, 'N;'),
('Shop.Default.View', 0, NULL, NULL, 'N;'),
('Shop.Default.Invoice', 0, NULL, NULL, 'N;'),
('Users.default.captcha', 0, 'captcha', NULL, 'N;'),
('Search.Default.*', 1, NULL, NULL, 'N;'),
('Search.Default.Index', 0, NULL, NULL, 'N;'),
('Users.Default.MyOrders', 0, NULL, NULL, 'N;'),
('Feedback.default.captcha', 0, 'Users.default.captcha', NULL, 'N;'),
('Terminal.Default.Index', 0, 'Terminal.Default.Index', NULL, 'N;'),
('Forum.Default.*', 1, NULL, NULL, 'N;'),
('Forum.Default.Index', 0, NULL, NULL, 'N;'),
('Forum.Default.Forum', 0, NULL, NULL, 'N;'),
('Forum.Default.Topic', 0, NULL, NULL, 'N;'),
('Forum.Default.NewMessage', 0, NULL, NULL, 'N;'),
('Terminal.Default.Search', 0, 'Terminal.Default.Search', NULL, 'N;'),
('Terminal.Default.*', 1, 'Terminal.Default.*', NULL, 'N;'),
('Faq.Default.*', 1, NULL, NULL, 'N;'),
('Faq.Default.Index', 0, NULL, NULL, 'N;'),
('Forum.Default.Error', 0, NULL, NULL, 'N;'),
('Site.*', 1, NULL, NULL, 'N;'),
('Site.Index', 0, NULL, NULL, 'N;'),
('Site.Error', 0, NULL, NULL, 'N;'),
('Shop.Default.PDF', 0, NULL, NULL, 'N;'),
('Comments.*', 1, NULL, NULL, 'N;'),
('Comments.Default.*', 1, NULL, NULL, 'N;'),
('Programms.Default.*', 1, NULL, NULL, 'N;'),
('Video.Default.*', 1, NULL, NULL, 'N;'),
('Pages.Default.Telecompany', 0, NULL, NULL, 'N;'),
('Pages.Default.TelecompanyView', 0, NULL, NULL, 'N;'),
('Photo.Default.*', 1, NULL, NULL, 'N;'),
('Feedback.Default.Faq', 0, NULL, NULL, 'N;'),
('Pages.Default.Tours', 0, NULL, NULL, 'N;'),
('Pages.Default.Index', 0, NULL, NULL, 'N;'),
('Pages.Default.News', 0, NULL, NULL, 'N;'),
('Pages.Default.Lang', 0, NULL, NULL, 'N;'),
('Gallery.Default.*', 1, NULL, NULL, 'N;'),
('Gallery.Default.Index', 0, NULL, NULL, 'N;'),
('Gallery.Default.View', 0, NULL, NULL, 'N;'),
('Pages.Default.Announcement', 0, NULL, NULL, 'N;'),
('Users.Default.ConfirmRegistration', 0, NULL, NULL, 'N;'),
('Pages.Default.Procurement', 0, NULL, NULL, 'N;'),
('Barista', 2, 'Barista', NULL, 'N;');

-- --------------------------------------------------------

--
-- Структура таблицы `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL DEFAULT '',
  `child` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('Authenticated', 'Users.default.captcha'),
('Authenticated', 'Users.Default.ChangePassword'),
('Authenticated', 'Users.Default.EditProfile'),
('Authenticated', 'Users.Default.Logout'),
('Authenticated', 'Users.Default.MyOrders'),
('Authenticated', 'Users.Default.Profile'),
('Guest', 'Comments.Default.*'),
('Guest', 'Faq.Default.Index'),
('Guest', 'Feedback.default.captcha'),
('Guest', 'Feedback.Default.Faq'),
('Guest', 'Feedback.Default.Index'),
('Guest', 'Feedback.Default.SuccessSend'),
('Guest', 'Forum.Default.Forum'),
('Guest', 'Forum.Default.Index'),
('Guest', 'Forum.Default.Topic'),
('Guest', 'Gallery.Default.Index'),
('Guest', 'Gallery.Default.View'),
('Guest', 'Mainpage.Default.Error'),
('Guest', 'Mainpage.Default.Index'),
('Guest', 'Pages.Default.AllNews'),
('Guest', 'Pages.Default.Announcement'),
('Guest', 'Pages.Default.Category'),
('Guest', 'Pages.Default.Index'),
('Guest', 'Pages.Default.Lang'),
('Guest', 'Pages.Default.News'),
('Guest', 'Pages.Default.Procurement'),
('Guest', 'Pages.Default.Rss'),
('Guest', 'Pages.Default.Telecompany'),
('Guest', 'Pages.Default.TelecompanyView'),
('Guest', 'Pages.Default.Tours'),
('Guest', 'Pages.Default.View'),
('Guest', 'Photo.Default.*'),
('Guest', 'Programms.Default.*'),
('Guest', 'Search.Default.Index'),
('Guest', 'Shop.Default.AddToCart'),
('Guest', 'Shop.Default.BackPay'),
('Guest', 'Shop.Default.ErrPay'),
('Guest', 'Shop.Default.Fail'),
('Guest', 'Shop.Default.GetGroup'),
('Guest', 'Shop.Default.Index'),
('Guest', 'Shop.Default.MyCart'),
('Guest', 'Shop.Default.PostPay'),
('Guest', 'Shop.Default.RemoveFromCart'),
('Guest', 'Shop.Default.Search'),
('Guest', 'Shop.Default.View'),
('Guest', 'Site.Error'),
('Guest', 'Terminal.Default.Index'),
('Guest', 'Terminal.Default.Search'),
('Guest', 'Users.default.captcha'),
('Guest', 'Users.Default.ChangePassword'),
('Guest', 'Users.Default.ConfirmRegistration'),
('Guest', 'Users.Default.Login'),
('Guest', 'Users.Default.Logout'),
('Guest', 'Users.Default.Profile'),
('Guest', 'Users.Default.Registration'),
('Guest', 'Users.Default.SuccessRegistration'),
('Guest', 'Video.Default.*');

-- --------------------------------------------------------

--
-- Структура таблицы `lx_categories`
--

CREATE TABLE IF NOT EXISTS `lx_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_id` int(11) NOT NULL DEFAULT '0',
  `values` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `section_id` (`section_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `lx_categories`
--

INSERT INTO `lx_categories` (`id`, `section_id`, `values`) VALUES
(1, 1, 'a:2:{i:0;a:2:{s:13:"ingredient_id";i:1;s:5:"total";s:3:"145";}i:1;a:2:{s:13:"ingredient_id";i:2;s:5:"total";s:3:"120";}}'),
(2, 5, 'a:2:{i:0;a:2:{s:13:"ingredient_id";i:2;s:5:"total";s:3:"123";}i:1;a:2:{s:13:"ingredient_id";i:1;s:5:"total";s:3:"321";}}'),
(3, 6, 'a:2:{i:0;a:2:{s:13:"ingredient_id";s:1:"1";s:5:"total";s:3:"122";}i:1;a:2:{s:13:"ingredient_id";s:1:"2";s:5:"total";s:3:"221";}}'),
(4, 7, 'a:2:{i:0;a:2:{s:13:"ingredient_id";s:1:"1";s:5:"total";s:3:"122";}i:1;a:2:{s:13:"ingredient_id";s:1:"2";s:5:"total";s:3:"221";}}');

-- --------------------------------------------------------

--
-- Структура таблицы `lx_city`
--

CREATE TABLE IF NOT EXISTS `lx_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `lx_city`
--

INSERT INTO `lx_city` (`id`, `title`) VALUES
(1, 'Алматы');

-- --------------------------------------------------------

--
-- Структура таблицы `lx_ingredients`
--

CREATE TABLE IF NOT EXISTS `lx_ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `lx_ingredients`
--

INSERT INTO `lx_ingredients` (`id`, `label`) VALUES
(1, 'Кофе'),
(2, 'Молоко');

-- --------------------------------------------------------

--
-- Структура таблицы `lx_orders`
--

CREATE TABLE IF NOT EXISTS `lx_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `point_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `orders` text NOT NULL,
  `total` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `lx_orders`
--

INSERT INTO `lx_orders` (`id`, `point_id`, `user_id`, `name`, `orders`, `total`, `date`) VALUES
(1, 1, 2, '87071068885', 'a:1:{i:0;a:2:{s:10:"section_id";i:1;s:5:"count";s:1:"2";}}', 100, '2014-02-09 20:17:42'),
(2, 1, 2, '870758884556', 'a:2:{i:0;a:2:{s:10:"section_id";i:5;s:5:"count";s:1:"1";}i:1;a:2:{s:10:"section_id";i:6;s:5:"count";s:1:"2";}}', 221, '2014-02-09 20:22:42');

-- --------------------------------------------------------

--
-- Структура таблицы `lx_points`
--

CREATE TABLE IF NOT EXISTS `lx_points` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `lx_points`
--

INSERT INTO `lx_points` (`id`, `title`, `city_id`) VALUES
(1, 'Фурманова 777', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `lx_sections`
--

CREATE TABLE IF NOT EXISTS `lx_sections` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `lx_sections`
--

INSERT INTO `lx_sections` (`id`, `title`, `description`, `price`, `image`) VALUES
(1, 'Капучинно', 'sdfsdfsd', 50, 'default.jpg'),
(5, 'Латте', 'dsfsd', 65, 'default.jpg'),
(6, 'Эспрессо', 'эспрессо', 78, 'default.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `lx_users`
--

CREATE TABLE IF NOT EXISTS `lx_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `username2` varchar(255) NOT NULL,
  `password2` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `patronymic` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `lx_users`
--

INSERT INTO `lx_users` (`id`, `username`, `password`, `username2`, `password2`, `surname`, `realname`, `patronymic`, `email`, `last_login`, `active`) VALUES
(1, 'softdeco', 'babeb0a1e5fa4410b860d7f7896b7b90ef550288963574852d', 'softdeco', 'babeb0a1e5fa4410b860d7f7896b7b90ef550288963574852d', '', '', '', 'tdp.tft@gmail.com', '2014-02-01 10:16:28', 1),
(2, 'miracle', '04acd61e6de95184a5dfb310b31e943c99ec9113e62ec06c60', 'miracle', '04acd61e6de95184a5dfb310b31e943c99ec9113e62ec06c60', '', '', '', 'kj.mafiaboy@mail.ru', '2014-02-01 07:19:04', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL DEFAULT '0',
  `language` varchar(16) NOT NULL DEFAULT '',
  `translation` text,
  PRIMARY KEY (`id`,`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `language`, `translation`) VALUES
(1, 'en', 'Search'),
(1, 'kz', 'Табу'),
(2, 'en', 'Authorization'),
(2, 'kz', 'Кіру'),
(3, 'en', 'Registration'),
(3, 'kz', 'Тіркелу'),
(5, 'en', 'Profile'),
(5, 'kz', 'Көрініс'),
(6, 'en', 'Logout'),
(6, 'kz', 'Шығу'),
(7, 'en', 'Site of partners'),
(7, 'kz', 'Cеріктес сайты'),
(8, 'en', 'Login'),
(8, 'kz', 'Кіру'),
(9, 'en', 'My cabinet'),
(9, 'kz', 'Жеке кабинет'),
(10, 'en', 'Change e-mail'),
(10, 'kz', 'Электронды поштаны өзгерту'),
(11, 'en', 'Change password'),
(11, 'kz', 'Құпиясөз өзгерту'),
(12, 'en', 'Change e-mail'),
(12, 'kz', 'Электронды поштаны өзгерту'),
(13, 'en', 'Save'),
(13, 'kz', 'Сақтау'),
(14, 'en', 'Change password'),
(14, 'kz', 'Құпиясөзді өзгерту'),
(15, 'en', 'Current password'),
(15, 'kz', 'Қазіргі құпиясөзіңіз'),
(16, 'en', 'New password'),
(16, 'kz', 'Жаңа құпиясөз'),
(17, 'en', 'Repeat a new password'),
(17, 'kz', 'Жаңа құпиясөзіңізді қайталаңыз'),
(18, 'en', 'Change'),
(18, 'kz', 'Өзгерту'),
(19, 'en', 'Registration is completed'),
(19, 'kz', 'Тіркелу аяқталды'),
(20, 'en', 'Refistration successfully completed. Now you can enter to the sait.'),
(20, 'kz', 'Тіркелу сәтті аяқталды. Енді Сіз сайтқа кіре аласыз.'),
(21, 'en', 'New user regisration'),
(21, 'kz', 'Жақа қолданушыны тіркеу'),
(22, 'en', 'E-mail'),
(22, 'kz', 'Электронды пошта'),
(23, 'en', 'Login'),
(23, 'kz', 'Логин'),
(24, 'en', 'Password'),
(24, 'kz', 'Құпия сөз'),
(25, 'en', 'Confirm password'),
(25, 'kz', 'Құпия сөзді растаңыз'),
(26, 'en', 'Enter the code from picture'),
(26, 'kz', 'Суреттегі кодты теріңіз'),
(27, 'en', 'Remember'),
(27, 'kz', 'Есте сақтау'),
(28, 'en', 'User name'),
(28, 'kz', 'Пайдаланушы есімі'),
(54, 'en', 'Feedback'),
(54, 'kz', 'Кері байланыс'),
(55, 'en', 'Your name'),
(55, 'kz', 'Сіздің есіміңіз'),
(56, 'en', 'Mail'),
(56, 'kz', 'Пошта'),
(57, 'en', 'Theme of message'),
(57, 'kz', 'Хаттама тақырыбы'),
(58, 'en', 'Text of message'),
(58, 'kz', 'Хаттама мәтіні'),
(59, 'en', 'Security code'),
(59, 'kz', 'Қауіпсіздік коды'),
(60, 'en', 'Send'),
(60, 'kz', 'Жіберу'),
(67, 'en', 'Refresh code'),
(67, 'kz', 'Кодты жаңарту'),
(86, 'en', 'Enter to site'),
(86, 'kz', 'Сайтқа кіру'),
(87, 'en', 'Show all'),
(87, 'kz', 'Толығымен көрсету'),
(88, 'en', 'Create'),
(88, 'kz', 'Жасаған');

-- --------------------------------------------------------

--
-- Структура таблицы `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `itemname` varchar(64) NOT NULL DEFAULT '',
  `type` int(11) NOT NULL DEFAULT '0',
  `weight` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `sourcemessage`
--

CREATE TABLE IF NOT EXISTS `sourcemessage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(32) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

--
-- Дамп данных таблицы `sourcemessage`
--

INSERT INTO `sourcemessage` (`id`, `category`, `message`) VALUES
(1, 'translate', 'Поиск'),
(2, 'translate', 'Авторизация'),
(3, 'translate', 'Регистрация'),
(5, 'translate', 'Профиль'),
(6, 'translate', 'Выйти'),
(7, 'translate', 'Сайты-партнеры'),
(8, 'translate', 'Войти'),
(9, 'translate', 'Личный аккаунт'),
(10, 'translate', 'Изменить электронную почту'),
(11, 'translate', 'Изменить пароль'),
(12, 'translate', 'Изменение электронной почты'),
(13, 'translate', 'Сохранить'),
(14, 'translate', 'Изменение пароля'),
(15, 'translate', 'Текущий пароль'),
(16, 'translate', 'Новый пароль'),
(17, 'translate', 'Повторите новый пароль'),
(18, 'translate', 'Изменить'),
(19, 'translate', 'Регистрация завершена'),
(20, 'translate', 'Вы успешно зарегистрированы. Теперь вы можете войти на сайт'),
(21, 'translate', 'Регистрация нового пользователя'),
(22, 'translate', 'Электронная почта'),
(23, 'translate', 'Логин'),
(24, 'translate', 'Пароль'),
(25, 'translate', 'Подтвердите пароль'),
(26, 'translate', 'Введите код с картинки'),
(27, 'translate', 'Запомнить'),
(28, 'translate', 'Имя пользователя'),
(54, 'translate', 'Обратная связь'),
(55, 'translate', 'Ваше имя'),
(56, 'translate', 'Почта'),
(57, 'translate', 'Тема сообщения'),
(58, 'translate', 'Текст сообщения'),
(59, 'translate', 'Защитный код'),
(60, 'translate', 'Отправить'),
(67, 'translate', 'Обновить код'),
(86, 'translate', 'Вход на сайт'),
(87, 'translate', 'Показать все'),
(88, 'translate', 'Сделать в');

-- --------------------------------------------------------

--
-- Структура таблицы `yiisession`
--

CREATE TABLE IF NOT EXISTS `yiisession` (
  `id` varchar(32) NOT NULL DEFAULT '',
  `expire` int(11) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `yiisession`
--

INSERT INTO `yiisession` (`id`, `expire`, `data`) VALUES
('tphl8o0cu18nr9mfgbusseoek3', 1392061377, '2ecf9675e31f37f1c4941097df1627ca__returnUrl|s:1:"/";2ecf9675e31f37f1c4941097df1627causerId|s:1:"1";2ecf9675e31f37f1c4941097df1627capointId|s:1:"1";2ecf9675e31f37f1c4941097df1627ca__id|s:1:"1";2ecf9675e31f37f1c4941097df1627ca__name|s:8:"softdeco";2ecf9675e31f37f1c4941097df1627causername|s:8:"softdeco";2ecf9675e31f37f1c4941097df1627causername2|s:8:"softdeco";2ecf9675e31f37f1c4941097df1627ca__states|a:2:{s:8:"username";b:1;s:9:"username2";b:1;}2ecf9675e31f37f1c4941097df1627caRights_isSuperuser|b:1;');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_Message_SourceMessage` FOREIGN KEY (`id`) REFERENCES `sourcemessage` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
