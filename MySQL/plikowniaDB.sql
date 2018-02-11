-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Lut 2018, 15:31
-- Wersja serwera: 10.1.29-MariaDB
-- Wersja PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `plikowniadb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `menus`
--

CREATE TABLE `menus` (
  `user` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `menus`
--

INSERT INTO `menus` (`user`, `id`, `label`, `link`, `parent`, `sort`) VALUES
('test', 1, 'test', '#', 0, 0),
('test', 2, 'Piki', '#', 1, NULL),
('test', 3, 'Inne', '#', 1, NULL),
('KrzysztofKita', 4, 'KrzysztofKita', '#', 0, NULL),
('KrzysztofKita', 5, 'Pliki', '#', 4, NULL),
('HimekoKuran', 7, 'HimekoKuran', '$', 0, NULL),
('HimekoKuran', 8, 'Pliki', '#', 7, NULL),
('HimekoKuran', 9, 'Wazne', '', 7, NULL),
('MariuszCiupinski', 10, 'MariuszCiupinski', '', 0, NULL),
('MariuszCiupinski', 11, 'Pliki', '#', 10, NULL),
('MariuszCiupinski', 12, 'Takie tam', '#', 10, NULL),
('AndrzejStrek', 13, 'AndrzejStrek', '', 0, NULL),
('AndrzejStrek', 14, 'Tutorials', '', 13, NULL),
('KrzysztofKita', 15, 'Projekt', '', 4, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `treeview_items`
--

CREATE TABLE `treeview_items` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `parent_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `treeview_items`
--

INSERT INTO `treeview_items` (`id`, `name`, `title`, `parent_id`) VALUES
(1, 'task1', 'task1title', '2'),
(2, 'task2', 'task2title', '0'),
(3, 'task3', 'task1title3', '0'),
(4, 'task4', 'task2title4', '3'),
(5, 'task4', 'task1title4', '3'),
(6, 'task5', 'task2title5', '5');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `user`, `pass`) VALUES
(1, 'KrzysztofKita', 'qwerty'),
(2, 'MariuszCiupinski', 'asdfg'),
(3, 'AndrzejStrek', 'zxcvb'),
(4, 'HimekoKuran', 'asdfg'),
(5, 'test', 'test');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treeview_items`
--
ALTER TABLE `treeview_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `treeview_items`
--
ALTER TABLE `treeview_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
