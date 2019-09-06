-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Сен 06 2019 г., 14:24
-- Версия сервера: 8.0.16
-- Версия PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `session_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `goods_id`, `session_id`, `quantity`) VALUES
(28, 1, '7dvavgh9vma283cqfsjt6m8mvv', 1),
(31, 2, '21p9g973molncjk3dq2vrf3rl8', 1),
(32, 1, '21p9g973molncjk3dq2vrf3rl8', 1),
(37, 1, '7rdsfoa3fdhsb73vdgi3ld6sb5', 1),
(38, 2, '7rdsfoa3fdhsb73vdgi3ld6sb5', 1),
(39, 1, 'glhcqpcstsium2q6viquou26j0', 1),
(40, 3, 'glhcqpcstsium2q6viquou26j0', 1),
(41, 1, 'qt5107bj400qitnrga5ggaldn4', 1),
(42, 1, '59no39ggroqd9eh4geauo7lb0p', 1),
(43, 1, 'll61knc371n0udjarfjoq8elr9', 1),
(44, 1, 'tnk8rs9118a9c91jre2j590kiv', 1),
(45, 3, 'qrcojboevai0cod4h0hhn1sl3n', 1),
(46, 2, 'qrcojboevai0cod4h0hhn1sl3n', 1),
(47, 1, 'qrcojboevai0cod4h0hhn1sl3n', 1),
(48, 2, 'm5h8apud73if2e9grcp0e6jdfa', 1),
(49, 1, 'u4gbloqcbj9qnepo4nhecg1aia', 1),
(50, 1, 'lafanr1tuqiqb01e0l8o7d08t8', 1),
(51, 1, 'tkr7a0v1k6rso7kggcem46mqkd', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`) VALUES
(1, 'Админ!', 'Привет Всем!'),
(2, 'user', 'Как дела'),
(3, 'Вася', 'Привет'),
(5, 'Посетитель222', '111'),
(6, 'Посетитель', '444'),
(7, 'Олег', '111'),
(8, 'Вася', 'Сайт не работает'),
(12, 'Вася', 'Сайт не работает'),
(17, 'Олег3', 'Все хорошо3'),
(18, 'Вася2', 'Сайт не работает2'),
(19, 'Alex23', '1234'),
(20, 'Наталия778', '43458'),
(30, '677896', 'Тест1567');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` text NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `image`, `name`, `description`, `price`) VALUES
(1, 'metla.png', 'Метла', 'Отличная метла для любого хозяйственного дворника!', 22),
(2, 'matches.png', 'Спички', 'Спички особые, изготовленные из редких пород дерева.', 1),
(3, 'vedro-plastik.jpg', 'Ведро', 'Пластиковое ведро с крепчайшей ручкой для самых сильных хозяев.', 14);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `name` text NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `url`, `name`, `views`) VALUES
(1, '01.jpg', '01', 0),
(2, '02.jpg', '02', 1),
(3, '03.jpg', '03', 2),
(4, '04.jpg', '04', 4),
(5, '05.jpg', '05', 2),
(6, '06.jpg', '06', 0),
(7, '07.jpg', '07', 0),
(8, '08.jpg', '08', 0),
(9, '09.jpg', '09', 0),
(10, '10.jpg', '10', 0),
(11, '11.jpg', '11', 0),
(12, '12.jpg', '12', 0),
(13, '13.jpg', '13', 1),
(14, '14.jpg', '14', 3),
(15, '15.jpg', '15', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `prev` text NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `prev`, `text`) VALUES
(1, 'В мероприятии приняли участие министр иностранных дел России Сергей Лавров, директор Службы внешней разведки РФ Сергей Нарышкин и временный поверенный в делах Федеративной Республики Германия в Российской Федерации Беате Гжески.', 'В мероприятии приняли участие министр иностранных дел России Сергей Лавров, директор Службы внешней разведки РФ Сергей Нарышкин и временный поверенный в делах Федеративной Республики Германия в Российской Федерации Беате Гжески.\r\n\r\nГостям и организаторам выставки зачитали приветственную телеграмму от президента России Владимира Путина. В ней глава государства отметил, что в некоторых странах предпринимаются попытки пересмотреть причины и итоги Второй мировой войны в угоду корыстным политическим и экономическим интересам, искажаются исторические факты, навязываются откровенно лживые взгляды, выводы, построенные на домыслах и спекуляциях.\r\n\r\n«В этой связи особое значение приобретают подлинные свидетельства той эпохи – архивные материалы. Многие из таких уникальных документов представлены на нынешней выставке. Причем часть из них – впервые. Они служат напоминанием нам и будущим поколениям о том, насколько хрупок мир, предостерегают от политической недальновидности, эгоизма, разобщенности перед лицом глобальных угроз», – говорится в послании.'),
(2, 'ТБИЛИСИ, 20 авг — РИА Новости. Новый гендиректор грузинской телекомпании \"Рустави 2\" Паата Салия заявил об увольнении ряда журналистов, в том числе Георгия Габунии.', 'ТБИЛИСИ, 20 авг — РИА Новости. Новый гендиректор грузинской телекомпании \"Рустави 2\" Паата Салия заявил об увольнении ряда журналистов, в том числе Георгия Габунии.\r\n\"Директор информационной службы телекомпании Нодар Меладзе освобожден от должности из-за конфликта интересов. Вместе с ним уволены еще несколько журналистов, однако они на данном этапе находятся в отпусках\", — заявил Салия на брифинге.'),
(3, 'РИМ, 20 авг — РИА Новости, Александр Логунов. Премьер-министр Италии Джузеппе Конте, выступая в сенате, заявил, что подаст президенту республики прошение об отставке.', 'РИМ, 20 авг — РИА Новости, Александр Логунов. Премьер-министр Италии Джузеппе Конте, выступая в сенате, заявил, что подаст президенту республики прошение об отставке.\r\n\"Я выслушаю крайне внимательно все сегодняшние выступления, но я намерен завершить этот политический переход, заявив, что после заседания направлюсь к президенту республики и вручу ему прошение об отставке\".\r\nДжузеппе Конте\r\nВыступление премьера транслировали итальянские телеканалы.\r\nПо его словам, президент Маттарелла \"останется верховным гарантом, который поведет страну сквозь этот деликатный период\".');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `adres` text NOT NULL,
  `session_id` text NOT NULL,
  `status` text,
  `dt_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `adres`, `session_id`, `status`) VALUES
(6, 'Линар', '1234456', 'Москва', 'glhcqpcstsium2q6viquou26j0', 'complete'),
(12, 'Линар', '1234456', 'Москва', 'u4gbloqcbj9qnepo4nhecg1aia', 'active'),
(13, 'Линар2', '1234456', 'Москва', 'lafanr1tuqiqb01e0l8o7d08t8', 'canceled'),
(14, 'Линар', '1234456', 'Москва', 'tkr7a0v1k6rso7kggcem46mqkd', 'complete'),
(15, 'Линар', '1234456', 'Москва', 'tkr7a0v1k6rso7kggcem46mqkd', 'complete'),
(16, 'Линар2', '1234456', 'Москва', 'tkr7a0v1k6rso7kggcem46mqkd', 'canceled'),
(17, 'Линар', '1234456', 'Москва', 'tkr7a0v1k6rso7kggcem46mqkd', 'canceled'),
(18, 'Линар', '1234456', 'Москва', 'tkr7a0v1k6rso7kggcem46mqkd', 'canceled'),
(19, 'Линар', '1234456', 'Москва', 'tkr7a0v1k6rso7kggcem46mqkd', 'canceled');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `hash` text NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`, `admin`, `user_id`) VALUES
(1, 'admin', '$2y$10$GAh95KWqFf1Fw4YyH/BCnuODYbJ1Mln78vDuOIwj7WQvChhR8QcX.', '21255787435d641ba0296111.41509116', 1, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
