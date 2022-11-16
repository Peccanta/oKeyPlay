-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 06 2021 г., 19:31
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `okeyplay`
--

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `genre_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`id_genre`, `genre_name`) VALUES
(1, 'Экшен'),
(2, 'Шутер'),
(3, 'Стратегия'),
(4, 'Выживание'),
(5, 'Гонки'),
(6, 'Спортивный симулятор'),
(7, 'Хоррор');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `ID_order` int(11) NOT NULL,
  `login` varchar(1000) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Price` varchar(100) NOT NULL,
  `All_art` varchar(10000) NOT NULL,
  `date_order` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`ID_order`, `login`, `Email`, `Phone`, `Price`, `All_art`, `date_order`) VALUES
(20, 'peccanta', 'darkreek@mail.ru', '+79777360332', '2298', 'Battlefield 1: 1, Overwatch: 1', '2021-03-01'),
(23, 'peccanta', 'darkreek@mail.ru', '+79777360332', '5495', 'DiRT 4: 3, Cyberpunk 2077: 2', '2021-03-11'),
(24, 'peccanta', 'darkreek@mail.ru', '+79777360332', '7395', 'Steep: 1, Call of Duty:  Cold War: 1, FIFA 20: 2, Grand Theft Auto V: 1', '2021-03-15'),
(26, 'peccanta', 'darkreek@mail.ru', '+79777360332', '11994', 'Grand Theft Auto V: 6', '2021-04-08'),
(27, 'peccanta', 'darkreek@mail.ru', '+79777360332', '3655', 'Battlefield 1: 1, The Forest: 1, Sid Meiers Civilization VI: 2, DiRT 4: 1', '2021-04-20'),
(29, 'peccanta', 'darkreek@mail.ru', '+79777360332', '3697', 'DiRT 4: 1, FIFA 20: 2', '2021-04-30'),
(31, 'peccanta', 'darkreek@mail.ru', '+79777360332', '6595', 'Steep: 2, Cyberpunk 2077: 3', '2021-05-01'),
(32, 'peccanta', 'darkreek@mail.ru', '+79777360332', '1956', 'The Forest: 1, DiRT 4: 3', '2021-05-03');

-- --------------------------------------------------------

--
-- Структура таблицы `platform`
--

CREATE TABLE `platform` (
  `id_platform` int(11) NOT NULL,
  `platform_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `platform`
--

INSERT INTO `platform` (`id_platform`, `platform_name`) VALUES
(1, 'Steam'),
(2, 'Origin'),
(3, 'Epic Games Store'),
(4, 'Uplay'),
(5, 'Battle.net');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `id_genre` int(11) NOT NULL,
  `id_platform` int(11) NOT NULL,
  `language` varchar(255) NOT NULL,
  `release_date` date NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `kolvo` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id_product`, `product_name`, `id_genre`, `id_platform`, `language`, `release_date`, `publisher`, `price`, `kolvo`, `picture`) VALUES
(1, 'Grand Theft Auto V', 1, 3, 'Английский', '2015-04-15', 'Rockstar Games', 1899, 71, '../models/1.jpg'),
(2, 'Far Cry 5', 2, 4, 'Русский', '2018-03-05', 'Ubisoft', 799, 46, '../models/2.png'),
(3, 'Overwatch', 2, 5, 'Русский', '2016-03-24', 'Blizzard Entertainment', 999, 32, '../models/3.jpg'),
(4, 'Battlefield 1', 2, 2, 'Английский', '2016-05-06', 'EA DICE', 1299, 65, '../models/4.jpg'),
(5, 'Sid Meiers Civilization VI', 3, 3, 'Русский', '2016-05-11', 'Firaxis Games', 699, 23, '../models/5.jpg'),
(6, 'DiRT 4', 5, 1, 'Английский', '2017-06-09', 'Codemasters', 499, 13, '../models/6.jpg'),
(7, 'Amnesia: Dark Descent', 7, 1, 'Русский', '2010-09-08', 'Frictional Games', 459, 54, '../models/7.jpg'),
(8, 'The Forest', 4, 1, 'Английский', '2014-05-30', 'Endnight Games', 459, 43, '../models/8.jpg'),
(9, 'Steep', 6, 4, 'Английский', '2016-12-02', 'Ubisoft Annecy', 299, 22, '../models/9.jpg'),
(10, 'FIFA 20', 6, 2, 'Английский', '2019-06-12', 'EA Canada', 1599, 56, '../models/10.jpg'),
(11, 'Cyberpunk 2077', 1, 1, 'Русский', '2020-12-10', 'CD Projekt RED', 1999, 243, '../models/11.jpg'),
(12, 'Call of Duty: Cold War', 2, 5, 'Русский', '2020-11-13', 'Activision', 1899, 210, '../models/12.jpeg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `image_prof` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `surname`, `name`, `middle_name`, `gender`, `date_of_birth`, `image_prof`) VALUES
(1, 'darkreek', 'perk', 'Засухин', 'Артём', 'Денисович', 'Мужской', '26.01.2001', '../uploads/1619280222user-icon.jpg'),
(2, 'warhammer', 'sergey2001', 'Жигало', 'Сергей', 'Сергеевич', 'Мужской', '23.04.2005', '../uploads/1619280222user-icon.jpg'),
(3, 'grach', 'samGra4', 'Самохин', 'Даниил', 'Владимирович', 'Мужской', '05.06.2000', '../uploads/1619280222user-icon.jpg'),
(4, 'oks874', 'Ksynya', 'Климанова', 'Оксана', 'Анатольевна', 'Женский', '27.12.1995', '../uploads/1619280222user-icon.jpg'),
(5, 'den19', 'kyncevo', 'Данилов', 'Денис', 'Вячеславович', 'Мужской', '01.08.1999', '../uploads/1619280222user-icon.jpg'),
(6, 'ddkappa', 'carstarLOL', 'Каплин', 'Даниил', 'Андреевич', 'Мужской', '19.11.2002', '../uploads/1619280222user-icon.jpg'),
(9, 'user', 'user', 'user', 'user', 'user', 'user', '00.00.0000', '../uploads/1619280222user-icon.jpg'),
(10, 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', '00.00.0000', '../uploads/1619280222user-icon.jpg'),
(48, 'peccanta', 'perk', 'Засухин', 'Артём', 'Денисович', 'Мужской', '26.01.2001', '../uploads/1619280222user-icon.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID_order`);

--
-- Индексы таблицы `platform`
--
ALTER TABLE `platform`
  ADD PRIMARY KEY (`id_platform`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_genre` (`id_genre`),
  ADD KEY `id_platform` (`id_platform`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `ID_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `platform`
--
ALTER TABLE `platform`
  MODIFY `id_platform` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_platform`) REFERENCES `platform` (`id_platform`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
