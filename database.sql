-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 26 Cze 2019, 21:33
-- Wersja serwera: 5.7.24-27-log
-- Wersja PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `28582258_16e`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `de_event`
--

CREATE TABLE `de_event` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_polish_ci NOT NULL,
  `desciption` text COLLATE utf8_polish_ci NOT NULL,
  `date` date NOT NULL,
  `priority` varchar(1) COLLATE utf8_polish_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `isDeleted` tinyint(1) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `de_event`
--

INSERT INTO `de_event` (`id`, `title`, `desciption`, `date`, `priority`, `img`, `isDeleted`, `id_user`) VALUES
(1, 's', '3333', '0003-03-03', '1', '', 1, 1),
(4, 's', 'hbjgv', '2019-03-29', '1', '', 0, 1),
(5, 'sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '', '2019-03-31', '1', '', 0, 1),
(7, 'ss2232', '33', '2019-03-07', '1', '', 1, 1),
(8, 's', '33', '2019-03-07', '1', '', 1, 1),
(9, 'ssdasd', '33', '2019-03-07', '1', '', 1, 1),
(10, '321', '321', '2019-04-28', '1', '', 0, 1),
(11, '321', '321', '2019-04-28', '1', '', 0, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `de_users`
--

CREATE TABLE `de_users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `user_pass` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `de_users`
--

INSERT INTO `de_users` (`id`, `user_name`, `user_pass`, `isAdmin`, `isActive`) VALUES
(1, 'admin', 'admin', 1, 1),
(2, 'user1', 'user1', 1, 0),
(3, '123', '123', 0, 1),
(4, '1', '1', 1, 0),
(5, '2', '2', 0, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `de_event`
--
ALTER TABLE `de_event`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `de_users`
--
ALTER TABLE `de_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `de_event`
--
ALTER TABLE `de_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `de_users`
--
ALTER TABLE `de_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
