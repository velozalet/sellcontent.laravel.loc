-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 02 2018 г., 18:13
-- Версия сервера: 5.7.21-0ubuntu0.16.04.1
-- Версия PHP: 7.0.28-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sellcontent_laravel_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `alias` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desctext` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyflag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `articles_category_id` int(10) UNSIGNED NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `alias`, `desctext`, `buyflag`, `images`, `created_at`, `updated_at`, `articles_category_id`, `file_path`, `price`) VALUES
(1, 'basics of PHP', '<p>Welcome to PHP Reference Book, the blog for the PHP book: PHP Reference: Beginner to Intermediate PHP-7.</p>\r\n<p>This is a great quick reference book that presents content and examples in a way that it serves both beginners and intermediate users alike. A must buy book! – Rak Shekhar, Founder, PHPCatalyst.com</p>\r\n<p>Here you will find corrections, tips, clarifications, and samples related to the PHP reference book. You are encouraged, if you find an error or something that needs clarification, to post a comment to the blog so it can be addressed in a post and fixed for later versions (that’s what I call wishful thinking).</p>', '0', 'service4-340x227.jpg', '2018-03-01 01:27:11', NULL, 1, 'file_name_1.docx', '110'),
(2, 'basics of PHP part 2', '<p>Welcome to PHP part 2 Reference Book, the blog for the PHP book: PHP Reference: Beginner to Intermediate PHP-7. ++</p>\r\n<p>This is a great quick reference book that presents content and examples in a way that it serves both beginners and intermediate users alike. A must buy book! – Rak Shekhar, Founder, PHPCatalyst.com</p>\r\n<p>Here you will find corrections, tips, clarifications, and samples related to the PHP reference book. You are encouraged, if you find an error or something that needs clarification, to post a comment to the blog so it can be addressed in a post and fixed for later versions (that’s what I call wishful thinking).</p>', '0', 'service4-340x227.jpg', '2018-01-11 17:07:30', NULL, 1, 'file_name_11.docx', '122'),
(5, 'basics of javaScript', '<p>I’m a big fan of JavaScript books. Being a long-time learner of JavaScript, I’ve had the pleasure of reading a great many of the popular JavaScript books on the market. These days I tend to skip the ones targeted to rank newbies, but I still read a lot of books intended for JavaScript developers with a little experience.</p>\r\n<p>This is a strange time for JavaScript books. Because we just got a major update to the JavaScript language in ES6, today’s JavaScript syntax and style looks quite different from the ES3-ES5 style JavaScript you’ll see discussed in most books, but because ES6 is really just a superset of ES5, most of the old books have nuggets of learning that still apply.</p>\r\n', '0', 'service1-340x227.jpg', '2018-03-05 05:09:25', NULL, 2, 'file_name_2.docx', '250'),
(6, 'CSS-3', '<p>CSS-3 is a special language used to style HTML content. CSS defines how HTML elements will be displayed — color, size, position, border, background, etc</p>\r\n<p>CSS is used to separate the HTML content from the representation rules to make it easier to maintain the content style in a centralized manner.</p>\r\n', '0', 'service3-340x227.jpg', '2018-02-16 03:09:29', NULL, 4, 'file_name_3.docx', '90'),
(7, 'advanced of javaScript', '<p>Some authors in the JavaScript community have written books intended to teach you ES6. I recommend reading them after you have a little familiarity with basic JavaScript. If you don’t know ES6 yet, read How to Learn ES6.</p>\r\n<p>Eventually, all new JS book authors will take ES6 for granted, and then the JS book world will return to normal. I’ll list my recommendations roughly in learning order.</p>\r\n', '0', 'service2-340x227.jpg', '2018-02-02 15:25:13', NULL, 2, 'file_name_4.docx', '470');

-- --------------------------------------------------------

--
-- Структура таблицы `articles_categories`
--

CREATE TABLE `articles_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles_categories`
--

INSERT INTO `articles_categories` (`id`, `title`, `alias`, `created_at`, `updated_at`) VALUES
(1, 'php', 'php', NULL, NULL),
(2, 'javascript', 'javascript', NULL, NULL),
(3, 'node.js', 'nodejs', NULL, NULL),
(4, 'css', 'css', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_29_100412_create_table_articles', 1),
(4, '2018_03_29_101947_create_table_articles_categories', 1),
(5, '2018_03_29_103527_create_table_roles', 1),
(6, '2018_03_29_103630_create_table_users_roles', 1),
(7, '2018_03_29_103736_create_table_permissions', 1),
(8, '2018_03_29_103800_create_table_permissions_roles', 1),
(9, '2018_03_29_110007_add_foreign_key_to_table_articles', 2),
(10, '2018_03_29_111434_add_foreign_key_to_table_users_roles', 3),
(11, '2018_03_29_112058_add_foreign_key_to_table_permissions_roles', 3),
(12, '2018_03_30_073932_add_filepath_to_table_articles', 4),
(13, '2018_03_30_094854_add_price_to_table_articles', 5),
(14, '2018_04_02_074335_create_users_articles_buy', 6),
(15, '2018_04_02_075127_add_foreign_key_to_table_users_articles_buy', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'VIEW_ADMIN_PANEL', NULL, NULL),
(2, 'ADD_MATERIAL', NULL, NULL),
(3, 'UPDATE_MATERIAL', NULL, NULL),
(4, 'DELETE_MATERIAL', NULL, NULL),
(5, 'ADD_USERS', NULL, NULL),
(6, 'UPDATE_USERS', NULL, NULL),
(7, 'DELETE_USERS', NULL, NULL),
(8, 'BUYER', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `permissions_roles`
--

CREATE TABLE `permissions_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL DEFAULT '8',
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permissions_roles`
--

INSERT INTO `permissions_roles` (`id`, `created_at`, `updated_at`, `permission_id`, `role_id`) VALUES
(1, NULL, NULL, 1, 1),
(2, NULL, NULL, 2, 1),
(3, NULL, NULL, 3, 1),
(4, NULL, NULL, 4, 1),
(5, NULL, NULL, 5, 1),
(6, NULL, NULL, 6, 1),
(7, NULL, NULL, 7, 1),
(8, NULL, NULL, 8, 1),
(9, NULL, NULL, 8, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'client', NULL, NULL),
(3, 'guest', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', '$2y$10$NQYp73qoZ1WcvQv6OfZrZeO.04NcTMltdGe0NJ7LNei7NMQDF4VlO', 'hvLHxZHYZFdvTSHG5HrN7aIkpszvqu1Q8nYoPSGJsW4akNDRDRlfp6ITuPU2', '2018-03-29 08:56:09', '2018-03-29 08:56:09'),
(2, 'littus', 'littus@i.ua', '$2y$10$GazA6ZbfGNnFDSEfjqTY7O7yidWRGgWB45sCWKGUiekcCVOMsFwsi', '0ZPnHnIaGBrLzHSAJNeCHjjbFi63Tih5VeoC8lOq1a9H4TATstym2vXqk4qL', '2018-03-29 08:57:07', '2018-03-29 08:57:07'),
(3, 'fatHomer', 'homer@mail.us', '$2y$10$vZuOCe29VyRva3FdgKFyu.9dX0fuocvvCQld/Wi9B8D7svyX2WUnK', 'w9YXnt8ps0ZDNng1ZNCweHBW5siU3Wo52k2GMxJbsAZkPgg8Km5qCRsV9A0v', '2018-03-29 08:57:54', '2018-03-29 08:57:54');

-- --------------------------------------------------------

--
-- Структура таблицы `users_articles_buy`
--

CREATE TABLE `users_articles_buy` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_articles_buy`
--

INSERT INTO `users_articles_buy` (`id`, `created_at`, `updated_at`, `user_id`, `article_id`) VALUES
(1, NULL, NULL, 1, 1),
(2, NULL, NULL, 1, 2),
(3, NULL, NULL, 1, 5),
(4, NULL, NULL, 1, 6),
(5, NULL, NULL, 1, 7),
(6, NULL, NULL, 2, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `users_roles`
--

CREATE TABLE `users_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_roles`
--

INSERT INTO `users_roles` (`id`, `created_at`, `updated_at`, `user_id`, `role_id`) VALUES
(1, NULL, NULL, 1, 1),
(2, NULL, NULL, 2, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_alias_unique` (`alias`),
  ADD UNIQUE KEY `articles_file_path_unique` (`file_path`),
  ADD KEY `articles_articles_category_id_foreign` (`articles_category_id`);

--
-- Индексы таблицы `articles_categories`
--
ALTER TABLE `articles_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_categories_alias_unique` (`alias`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `permissions_roles`
--
ALTER TABLE `permissions_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_roles_permission_id_foreign` (`permission_id`),
  ADD KEY `permissions_roles_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `users_articles_buy`
--
ALTER TABLE `users_articles_buy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_articles_buy_user_id_foreign` (`user_id`),
  ADD KEY `users_articles_buy_article_id_foreign` (`article_id`);

--
-- Индексы таблицы `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_roles_user_id_foreign` (`user_id`),
  ADD KEY `users_roles_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `articles_categories`
--
ALTER TABLE `articles_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `permissions_roles`
--
ALTER TABLE `permissions_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `users_articles_buy`
--
ALTER TABLE `users_articles_buy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_articles_category_id_foreign` FOREIGN KEY (`articles_category_id`) REFERENCES `articles_categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `permissions_roles`
--
ALTER TABLE `permissions_roles`
  ADD CONSTRAINT `permissions_roles_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `permissions_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Ограничения внешнего ключа таблицы `users_articles_buy`
--
ALTER TABLE `users_articles_buy`
  ADD CONSTRAINT `users_articles_buy_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `users_articles_buy_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
