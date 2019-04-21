-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 21 2019 г., 14:16
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
-- База данных: `shop`
--
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- Структура таблицы `avalibility`
--

CREATE TABLE `avalibility` (
  `id` int(11) NOT NULL,
  `size_id` int(11) DEFAULT NULL,
  `good_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `avalibility`
--

INSERT INTO `avalibility` (`id`, `size_id`, `good_id`, `amount`) VALUES
(1, 4, 1, 100),
(2, 1, 1, 70),
(3, 2, 1, 50),
(4, 3, 1, 150),
(5, 6, 3, 80),
(6, 3, 3, 90),
(7, 3, 6, 40),
(8, 7, 6, 45),
(9, 7, 7, 30),
(10, 1, 7, 60),
(11, 2, 8, 30),
(12, 5, 8, 20),
(13, 9, 8, 60);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Кроссовки'),
(2, 'Кеды'),
(3, 'Высокие'),
(4, 'Низкие'),
(5, 'Повседневные'),
(6, 'Спорт');

-- --------------------------------------------------------

--
-- Структура таблицы `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` char(255) NOT NULL,
  `l_name` char(255) NOT NULL,
  `adress` char(255) DEFAULT NULL,
  `phone` char(14) DEFAULT NULL,
  `email` char(255) NOT NULL,
  `pword` char(50) NOT NULL,
  `birhday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customer`
--

INSERT INTO `customer` (`id`, `name`, `l_name`, `adress`, `phone`, `email`, `pword`, `birhday`) VALUES
(1, 'Анастасия', 'Извекова', 'Секретный адрес', '746-50-42', 'adiala@mail.ru', '123123', '2000-05-19'),
(6, 'Алина', 'Климентьева', NULL, NULL, 'klimentjeva.a@mail.ru', '123123', NULL),
(10, 'Имя', '1ewfrwe', NULL, NULL, 'parminero@gmail.com', 'yyy', NULL),
(43, 'Алина', 'Климентьева', NULL, NULL, 'mambalina@gmail.com', '123123', NULL),
(100, 'Дмитрий', 'Бойко', NULL, NULL, 'Shishka1305@gmail.com', '123456', NULL),
(104, 'Олег', 'Луговой', NULL, NULL, 'olug@yandex.ua', 'qwe', NULL),
(115, 'Pinky', 'Shy', NULL, NULL, 'mambalina0501@gmail.com', 'qwe', NULL),
(116, 'Pinky', 'Drinky', NULL, NULL, 'pinky@gmail.com', 'pass', NULL),
(118, 'alina.sadgirl', 'ffsd', NULL, NULL, 'fish_on@mail.ru', '12', NULL),
(120, 'Winny', 'The-Pooh', NULL, NULL, 'thepoooh@gmail.com', 'asas', NULL),
(122, 'Lia', 'Kamper', NULL, NULL, 'liakamper@mail.ru', 'aas', NULL),
(123, 'Ирина', 'Романова', NULL, NULL, 'adiala@mail.', 'aas', NULL),
(124, 'Lia', 'Kamper', NULL, NULL, 'liakamperr@mail.ru', 'aas', NULL),
(125, 'Lia', 'Kamper', NULL, NULL, 'lia@mail.ru', 'qwe', NULL),
(127, 'Pinky', 'Shy', NULL, NULL, 'PinkyShy@mail.ru', '123123', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `good`
--

CREATE TABLE `good` (
  `id` int(11) NOT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `price` float NOT NULL,
  `preview` char(255) NOT NULL,
  `name` char(255) NOT NULL,
  `description` text DEFAULT NULL,
  `gender` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `good`
--

INSERT INTO `good` (`id`, `provider_id`, `price`, `preview`, `name`, `description`, `gender`) VALUES
(1, 1, 1230, 'her.jpg', 'Falcon DB2714', 'Удобны при ношении. Прорезиненный низ подошвы для лучшего сохранения', 'ж'),
(3, 1, 935, 'NewBalance501AthleticShoe4.jpg', 'Athletic Shoe', 'Внутри такой обуви стопы равномерно дышат, чему способствуют продуманные вставки для отвода тепла и влаги.', 'ж'),
(6, 3, 890, 'PUMAxBTSBasketPatentSneakers.jpg', 'Basket Patent', 'Отличный выбор для тех, кто любит качество и удобство', 'ж'),
(7, 1, 1130, 'SharksхNikanorYarmin2.jpg', 'Sharks Nikanor Yarmin', 'Выбор номер 1 среди молодёжи!', 'ж'),
(8, 5, 999, 'Vans_Classic_Old_Skool_Custom_Rose_2.jpg', 'Old Skool Custom Rose', 'Удобная и качественная кастомная модель кед.', 'ж');

-- --------------------------------------------------------

--
-- Структура таблицы `good_category`
--

CREATE TABLE `good_category` (
  `good_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `good_category`
--

INSERT INTO `good_category` (`good_id`, `category_id`) VALUES
(6, 2),
(8, 2),
(1, 1),
(3, 1),
(7, 1),
(6, 4),
(8, 4),
(7, 3),
(3, 4),
(1, 4),
(3, 6),
(1, 6),
(3, 5),
(6, 5),
(8, 5),
(NULL, 5),
(NULL, 1),
(NULL, 5),
(NULL, 6),
(NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `good_material`
--

CREATE TABLE `good_material` (
  `good_id` int(11) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `good_material`
--

INSERT INTO `good_material` (`good_id`, `material_id`) VALUES
(1, 1),
(1, 2),
(3, 4),
(3, 5),
(6, 2),
(6, 4),
(3, 2),
(8, 4),
(8, 2),
(NULL, 3),
(NULL, 1),
(NULL, 2),
(NULL, 4),
(NULL, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `name` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `material`
--

INSERT INTO `material` (`id`, `name`) VALUES
(1, 'Текстиль'),
(2, 'Синтетика'),
(3, 'Кожа'),
(4, 'Резина'),
(5, 'Кожзам');

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `good_id` int(11) DEFAULT NULL,
  `src` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `photo`
--

INSERT INTO `photo` (`id`, `good_id`, `src`) VALUES
(1, 1, 'img/OriginalsFalcon1.jpg'),
(2, 1, 'img/OriginalsFalcon2.jpg'),
(3, 1, 'img/OriginalsFalcon3.jpg'),
(4, 1, 'img/OriginalsFalcon4.jpg'),
(10, 3, 'img/NewBalance501AthleticShoe1.jpg'),
(11, 3, 'img/NewBalance501AthleticShoe2.jpg'),
(12, 3, 'img/NewBalance501AthleticShoe3.jpg'),
(13, 3, 'img/NewBalance501AthleticShoe4.jpg'),
(14, 6, 'img/PUMAxBTSBasketPatentSneakers1.jpg'),
(15, 6, 'img/PUMAxBTSBasketPatentSneakers2.jpg'),
(16, 6, 'img/PUMAxBTSBasketPatentSneakers4.jpg'),
(17, 6, 'img/PUMAxBTSBasketPatentSneakers3.jpg'),
(18, 7, 'img/SharksхNikanorYarmin1.jpg'),
(19, 7, 'img/SharksхNikanorYarmin2.jpg'),
(20, 7, 'img/SharksхNikanorYarmin3.jpg'),
(21, 7, 'img/SharksхNikanorYarmin3.jpg'),
(22, 8, 'img/Vans_Classic_Old_Skool_Custom_Rose_1.jpg'),
(23, 8, 'img/Vans_Classic_Old_Skool_Custom_Rose.jpg'),
(24, 8, 'img/Vans_Classic_Old_Skool_Custom_Rose_3.jpg'),
(25, 8, 'img/Vans_Classic_Old_Skool_Custom_Rose_4.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `provider`
--

CREATE TABLE `provider` (
  `id` int(11) NOT NULL,
  `name` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `provider`
--

INSERT INTO `provider` (`id`, `name`) VALUES
(1, 'Adidas'),
(2, 'New Balance'),
(3, 'Puma'),
(5, 'Vans');

-- --------------------------------------------------------

--
-- Структура таблицы `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `good_id` int(11) DEFAULT NULL,
  `order_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `purchase`
--

INSERT INTO `purchase` (`id`, `customer_id`, `good_id`, `order_date`, `quantity`, `status_id`) VALUES
(1, 1, 1, '2019-03-23', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `shoesize`
--

CREATE TABLE `shoesize` (
  `id` int(11) NOT NULL,
  `size_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shoesize`
--

INSERT INTO `shoesize` (`id`, `size_name`) VALUES
(1, 35),
(2, 36),
(3, 37),
(4, 38),
(5, 39),
(6, 40),
(7, 41),
(8, 42),
(9, 43);

-- --------------------------------------------------------

--
-- Структура таблицы `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `purchase_state` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `state`
--

INSERT INTO `state` (`id`, `purchase_state`) VALUES
(1, 'В корзине'),
(2, 'Сделан заказ'),
(3, 'Оплачено'),
(4, 'Закрыт');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `avalibility`
--
ALTER TABLE `avalibility`
  ADD PRIMARY KEY (`id`),
  ADD KEY `size_id` (`size_id`),
  ADD KEY `good_id` (`good_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `good`
--
ALTER TABLE `good`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provider_id` (`provider_id`);

--
-- Индексы таблицы `good_category`
--
ALTER TABLE `good_category`
  ADD KEY `good_id` (`good_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `good_material`
--
ALTER TABLE `good_material`
  ADD KEY `good_id` (`good_id`),
  ADD KEY `material_id` (`material_id`);

--
-- Индексы таблицы `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `good_id` (`good_id`);

--
-- Индексы таблицы `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `good_id` (`good_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Индексы таблицы `shoesize`
--
ALTER TABLE `shoesize`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `avalibility`
--
ALTER TABLE `avalibility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT для таблицы `good`
--
ALTER TABLE `good`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `provider`
--
ALTER TABLE `provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `shoesize`
--
ALTER TABLE `shoesize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `avalibility`
--
ALTER TABLE `avalibility`
  ADD CONSTRAINT `avalibility_ibfk_1` FOREIGN KEY (`size_id`) REFERENCES `shoesize` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `avalibility_ibfk_2` FOREIGN KEY (`good_id`) REFERENCES `good` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `good`
--
ALTER TABLE `good`
  ADD CONSTRAINT `good_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `good_category`
--
ALTER TABLE `good_category`
  ADD CONSTRAINT `good_category_ibfk_1` FOREIGN KEY (`good_id`) REFERENCES `good` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `good_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `good_material`
--
ALTER TABLE `good_material`
  ADD CONSTRAINT `good_material_ibfk_1` FOREIGN KEY (`good_id`) REFERENCES `good` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `good_material_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `material` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`good_id`) REFERENCES `good` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`good_id`) REFERENCES `avalibility` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `state` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
