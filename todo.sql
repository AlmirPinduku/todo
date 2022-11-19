-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Pritësi (host): 127.0.0.1
-- Koha e gjenerimit: Nën 19, 2022 në 11:56 PD
-- Versioni i serverit: 10.4.25-MariaDB
-- PHP Versioni: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databaza: `cit_crud`
--

-- --------------------------------------------------------

--
-- Struktura e tabelës për tabelën `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `todo` varchar(255) NOT NULL,
  `todo_time` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zbraz të dhënat për tabelën `todo`
--

INSERT INTO `todo` (`id`, `todo`, `todo_time`, `status`, `created_at`, `updated_at`) VALUES
(62, 'Create your Dashboard', '', 1, '2022-11-18 22:13:12', '2022-11-19 11:51:20'),
(63, 'Edit your buttons', '', 1, '2022-11-18 22:13:26', '2022-11-19 11:51:23'),
(64, 'On page 1 change your colors', '', 0, '2022-11-18 22:13:40', '2022-11-19 00:02:46'),
(65, 'Align your text in center', '', 0, '2022-11-18 22:13:51', '2022-11-18 22:13:51');

--
-- Indekset për tabelat e hedhura
--

--
-- Indekset për tabelë `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT për tabelat e hedhura
--

--
-- AUTO_INCREMENT për tabelë `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
