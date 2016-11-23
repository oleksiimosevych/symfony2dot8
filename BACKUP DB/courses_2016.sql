-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 22 2016 г., 13:25
-- Версия сервера: 10.1.16-MariaDB
-- Версия PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `courses_2016`
--

-- --------------------------------------------------------

--
-- Структура таблицы `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `autor_course`
--

CREATE TABLE `autor_course` (
  `id` int(11) NOT NULL,
  `autor_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `short_description`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Ruby', 'Ruby is most popular...', 'ruby', '2016-11-21 00:00:00', NULL),
(2, 'Java', 'Java is...', 'java', '2016-11-21 00:00:00', NULL),
(3, 'Learn Php Programming Lang', 'Php is a Programming lang...', 'learn-php-programming-lang', '2016-11-21 00:00:00', NULL),
(4, 'Learn C++', 'C++ is...', 'learn-c', '2016-11-21 00:00:00', NULL),
(5, 'C#', 'C# is...', 'c', '2016-11-21 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contents` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `course`
--

INSERT INTO `course` (`id`, `category_id`, `name`, `contents`, `price`, `created_at`, `updated_at`, `expires_at`) VALUES
(1, 2, 'Java for dummies', 'Java is a programming lang which....', 30, '2011-11-21 19:21:00', '2016-11-21 20:04:08', '2016-12-21 19:21:38'),
(2, 3, 'Php 22', 'Php for dummies is a course about programming lang which....', 50, '2016-11-21 19:21:00', '2016-11-21 20:18:16', '2016-12-21 19:21:38'),
(3, 4, 'C++ for dummies', 'C++ for dummies 2016 is a course about programming lang which....', 100, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(4, 4, 'C++ for professionals', 'C++ for profi 2016 is a course about programming lang which....', 300, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(5, 5, 'C# for dummies', 'In our course we will talk about programming lang which....', 200, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(6, 5, 'C# for dummies 2', 'We will talk about programming lang C# which....', 300, '2005-12-01 00:00:00', NULL, '2005-12-31 00:00:00'),
(7, 5, 'C# for dummies_100', 'We will talk about programming lang C# 3 which....has no_100', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(8, 5, 'C# for dummies_101', 'We will talk about programming lang C# 3 which....has no_101', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(9, 5, 'C# for dummies_102', 'We will talk about programming lang C# 3 which....has no_102', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(10, 5, 'C# for dummies_103', 'We will talk about programming lang C# 3 which....has no_103', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(11, 5, 'C# for dummies_104', 'We will talk about programming lang C# 3 which....has no_104', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(12, 5, 'C# for dummies_105', 'We will talk about programming lang C# 3 which....has no_105', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(13, 5, 'C# for dummies_106', 'We will talk about programming lang C# 3 which....has no_106', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(14, 5, 'C# for dummies_107', 'We will talk about programming lang C# 3 which....has no_107', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(15, 5, 'C# for dummies_108', 'We will talk about programming lang C# 3 which....has no_108', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(16, 5, 'C# for dummies_109', 'We will talk about programming lang C# 3 which....has no_109', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(17, 5, 'C# for dummies_110', 'We will talk about programming lang C# 3 which....has no_110', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(18, 5, 'C# for dummies_111', 'We will talk about programming lang C# 3 which....has no_111', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(19, 5, 'C# for dummies_112', 'We will talk about programming lang C# 3 which....has no_112', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(20, 5, 'C# for dummies_113', 'We will talk about programming lang C# 3 which....has no_113', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(21, 5, 'C# for dummies_114', 'We will talk about programming lang C# 3 which....has no_114', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(22, 5, 'C# for dummies_115', 'We will talk about programming lang C# 3 which....has no_115', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(23, 5, 'C# for dummies_116', 'We will talk about programming lang C# 3 which....has no_116', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(24, 5, 'C# for dummies_117', 'We will talk about programming lang C# 3 which....has no_117', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(25, 5, 'C# for dummies_118', 'We will talk about programming lang C# 3 which....has no_118', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(26, 5, 'C# for dummies_119', 'We will talk about programming lang C# 3 which....has no_119', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(27, 5, 'C# for dummies_120', 'We will talk about programming lang C# 3 which....has no_120', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(28, 5, 'C# for dummies_121', 'We will talk about programming lang C# 3 which....has no_121', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(29, 5, 'C# for dummies_122', 'We will talk about programming lang C# 3 which....has no_122', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(30, 5, 'C# for dummies_123', 'We will talk about programming lang C# 3 which....has no_123', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(31, 5, 'C# for dummies_124', 'We will talk about programming lang C# 3 which....has no_124', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(32, 5, 'C# for dummies_125', 'We will talk about programming lang C# 3 which....has no_125', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(33, 5, 'C# for dummies_126', 'We will talk about programming lang C# 3 which....has no_126', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(34, 5, 'C# for dummies_127', 'We will talk about programming lang C# 3 which....has no_127', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(35, 5, 'C# for dummies_128', 'We will talk about programming lang C# 3 which....has no_128', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(36, 5, 'C# for dummies_129', 'We will talk about programming lang C# 3 which....has no_129', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(37, 5, 'C# for dummies_130', 'We will talk about programming lang C# 3 which....has no_130', 500, '2016-11-21 19:21:38', NULL, '2016-12-21 19:21:38'),
(38, 1, 'Вивчаємо Ruby onRails 2016', 'Ruby популярна мова програмування', 500, '2011-01-01 00:00:00', '2011-01-01 00:00:00', '2011-01-31 00:00:00'),
(42, 1, 'Вивчаємо Ruby on Rails 2016 4', 'Ruby популярна мова програмування 2', 500, '2016-11-20 00:00:00', '2016-11-21 00:00:00', '2016-12-20 00:00:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_31075EBA5E237E06` (`name`),
  ADD UNIQUE KEY `UNIQ_31075EBA5126AC48` (`mail`),
  ADD UNIQUE KEY `UNIQ_31075EBA444F97DD` (`phone`);

--
-- Индексы таблицы `autor_course`
--
ALTER TABLE `autor_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A79BB28714D45BBE` (`autor_id`),
  ADD KEY `IDX_A79BB287591CC992` (`course_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_64C19C15E237E06` (`name`),
  ADD UNIQUE KEY `UNIQ_64C19C19BE5A5B1` (`short_description`),
  ADD UNIQUE KEY `UNIQ_64C19C1989D9B62` (`slug`);

--
-- Индексы таблицы `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_169E6FB95E237E06` (`name`),
  ADD UNIQUE KEY `UNIQ_169E6FB9B4FA1177` (`contents`),
  ADD KEY `IDX_169E6FB912469DE2` (`category_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `autor_course`
--
ALTER TABLE `autor_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `autor_course`
--
ALTER TABLE `autor_course`
  ADD CONSTRAINT `FK_A79BB28714D45BBE` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id`),
  ADD CONSTRAINT `FK_A79BB287591CC992` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Ограничения внешнего ключа таблицы `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `FK_169E6FB912469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
