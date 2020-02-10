-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 30 jan 2020 om 21:13
-- Serverversie: 10.4.8-MariaDB
-- PHP-versie: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `werknemerloket`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(200) NOT NULL,
  `achternaam` varchar(200) NOT NULL,
  `emailadres` varchar(200) NOT NULL,
  `wachtwoord` varchar(200) NOT NULL DEFAULT '0000',
  `permission` varchar(200) NOT NULL,
  `telefoonnummer` varchar(200) NOT NULL,
  `woonplaats` varchar(200) NOT NULL,
  `geboortedatum` varchar(200) NOT NULL,
  `geslacht` varchar(200) NOT NULL,
  `baan` varchar(200) NOT NULL,
  `avatar` varchar(200) NOT NULL DEFAULT 'avatar/default.jpg',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `voornaam`, `achternaam`, `emailadres`, `wachtwoord`, `permission`, `telefoonnummer`, `woonplaats`, `geboortedatum`, `geslacht`, `baan`, `avatar`, `created_at`) VALUES
(1, 'Frederik', 'Coster', 'costerfrederik@gmail.com', '0000', 'Admin', '0622013928', 'Leiden', '2002-10-15', 'man', 'Bezorger', 'avatar/profile1.jpg', '2020-01-30 12:01:41'),
(2, 'Falco', 'Vuijk', 'falcovuijk@gmail.com', '0000', 'Admin', '', '', '', 'man', 'Vulploeg', 'avatar/profile2.jpg', '2020-01-30 12:02:53'),
(6, 'Emil', 'Ebrahimi', 'EmilEbrahimi@gmail.com', '0000', 'Gebruiker', '', '', '', '', '', 'avatar/default.jpg', '2020-01-30 19:49:38');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
