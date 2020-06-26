-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 26. Jun 2020 um 08:30
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `login`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `list`
--

CREATE TABLE `list` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `list`
--

INSERT INTO `list` (`id`, `title`) VALUES
(73, 'dfg'),
(74, 'sdfsdf'),
(75, 'liste1'),
(76, 'liste2'),
(77, 'liste1'),
(78, 'liste2'),
(79, 'liste3'),
(80, 'liste1'),
(81, 'liste1'),
(82, 'liste2'),
(83, 'liste3'),
(84, 'dfg'),
(85, 'liste1'),
(86, 'liste2'),
(89, 'test'),
(118, 'test'),
(120, 'you'),
(121, 'you'),
(122, 'ich bin gut'),
(123, 'you'),
(124, 'jetzt'),
(125, 'asdasd'),
(126, 'asdasd'),
(127, 'ichbinguteprogrammierer'),
(128, 'test'),
(129, 'liste'),
(130, 'Hey'),
(131, 'OK cool'),
(132, 'oaky');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `todo`
--

CREATE TABLE `todo` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listid` int(11) UNSIGNED DEFAULT NULL,
  `beschreibung` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prio` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `todo`
--

INSERT INTO `todo` (`id`, `title`, `listid`, `beschreibung`, `prio`, `status`, `datum`) VALUES
(1, 'TestToDO', 3, 'TestBeschreibung', '5', 1, '2022-05-22'),
(20, 'tdtest', 74, 'TEST', '1', 1, '2020-06-24');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(3, 'Julian', '$2y$10$UZtK0ltpl7ljYlmA6IbYwexjXCuo7GruCxAmH/arm/aG3JWu6iyDW'),
(5, 'Mike', '$2y$10$YTwzDFj.woON76G4zcS2fuqZGy/wXa9.yakJLRTf/ntni1SHgQOri'),
(6, 'mike2', '$2y$10$EySnZ58SL.XQOedLL1aPUeeJWpRXBLKnPTBCJgO2zVGxCoauyHYwC'),
(7, '1805', '$2y$10$1DyVMxIY7m7JuvXnvNvRhuexA.eygQ7wptu7snJH7aH1Lb3SjdsOS'),
(8, '18052', '$2y$10$Jg9KuNpPEsY6INRphwpdh.HqbBcFPQHB/uRl.1FDRuDQP0gbSvnYW'),
(9, 'jusa', '$2y$10$r/qCiko/zLVuUOFJn1x6s.Y.9b2YUG9SU9cmY1.usX14UH/b8oZJi'),
(10, 'test123', '$2y$10$jSH12CzMG5wqor/xgqUn9u3Ivk4erDGotjn7B2uAxXzhLx2Y5O8TG');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT für Tabelle `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
