-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 29 mrt 2023 om 09:51
-- Serverversie: 10.4.24-MariaDB
-- PHP-versie: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `retrotech`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Actie'),
(2, 'RPG'),
(3, 'Sport'),
(4, 'Puzzel'),
(5, 'strategy');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `release_year` int(4) NOT NULL,
  `price` float NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `cover_img` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `games`
--

INSERT INTO `games` (`id`, `category_id`, `title`, `release_year`, `price`, `publisher`, `cover_img`) VALUES
(1, 1, 'GTA 5', 2013, 29.99, 'Rockstar', 'gta5'),
(2, 1, 'Call of Duty Black Ops Cold War', 2020, 59.99, 'Activision', 'Call-of-Duty-Black-Ops-Cold-War'),
(3, 1, 'Call of Duty Modern Warfare', 2019, 49.99, 'Activision', 'modern-warfare'),
(4, 3, 'NBA 2K23', 2022, 29.99, '2k sports', 'nba-2k23'),
(5, 1, 'Zombie Army Trilogy', 2020, 22.95, 'Rebellion Developments', 'zombie-army-trilogy'),
(6, 2, 'Subnautica', 2014, 9.99, 'Gearbox Publishing', 'subnautica'),
(7, 2, 'ARK_survival_evolved', 2015, 20.66, 'WildCard', 'ARK-survival-evolved-ultimate-edition'),
(8, 4, 'portal 2', 2011, 8.99, 'valve', 'portal2'),
(9, 5, 'Command & Conquer Red Alert 3', 2008, 4.99, 'EA', 'Command-&-Conquer-Red-Alert-3'),
(10, 5, 'Hearts_of_Iron_IV', 2016, 5.49, 'Paradox Interactive', 'Hearts-of-Iron-IV'),
(11, 5, 'supreme commander Forged Alliance', 2007, 7.99, 'THQ', 'supreme-commander-Forged-Alliance'),
(12, 2, 'minecraft', 2011, 19.99, 'Mojang', 'minecraft'),
(13, 1, 'Far Cry 6', 2021, 29.99, 'Ubisoft', 'Far-Cry6'),
(14, 3, 'Rocket League', 2015, 21.99, 'Psyonix', 'Rocket-League'),
(15, 4, 'It Takes Two', 2021, 31.99, 'EA', 'It-Takes-Two');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(19, 'mike', '$2y$10$dDk/2xzHj1mPnKBd3x0.c.I5CNf2peD/i9rl/riYibllzW.hvH7di');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
