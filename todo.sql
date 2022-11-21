-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Pritësi (host): 127.0.0.1
-- Koha e gjenerimit: Nën 21, 2022 në 09:14 MD
-- Versioni i serverit: 10.4.25-MariaDB
-- PHP Versioni: 8.1.10

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
(1, 'ads', '', 0, '2022-11-21 21:06:31', '2022-11-21 21:14:33');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
