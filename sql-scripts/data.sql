-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Gegenereerd op: 11 dec 2021 om 16:50
-- Serverversie: 10.6.5-MariaDB-1:10.6.5+maria~focal
-- PHP-versie: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `curtains`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `items`
--

CREATE TABLE `items` (
  `itemId` int(11) NOT NULL,
  `watchlistId` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `writer` varchar(255) DEFAULT NULL,
  `image` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `movies`
--

CREATE TABLE `movies` (
  `itemId` int(11) NOT NULL,
  `durationInMinutes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `shows`
--

CREATE TABLE `shows` (
  `itemId` int(11) NOT NULL,
  `number_of_episodes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `watchlists`
--

CREATE TABLE `watchlists` (
  `watchlistId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `description` varchar(8000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `watchlist_item_junction`
--

CREATE TABLE `watchlist_item_junction` (
  `watchlistId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemId`),
  ADD KEY `watchlistId` (`watchlistId`);

--
-- Indexen voor tabel `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexen voor tabel `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexen voor tabel `watchlists`
--
ALTER TABLE `watchlists`
  ADD PRIMARY KEY (`watchlistId`),
  ADD KEY `userId` (`userId`);

--
-- Indexen voor tabel `watchlist_item_junction`
--
ALTER TABLE `watchlist_item_junction`
  ADD PRIMARY KEY (`watchlistId`,`itemId`),
  ADD KEY `itemId` (`itemId`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `items`
--
ALTER TABLE `items`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `watchlists`
--
ALTER TABLE `watchlists`
  MODIFY `watchlistId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`watchlistId`) REFERENCES `watchlists` (`watchlistId`);

--
-- Beperkingen voor tabel `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`itemId`) REFERENCES `items` (`itemId`);

--
-- Beperkingen voor tabel `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `shows_ibfk_1` FOREIGN KEY (`itemId`) REFERENCES `items` (`itemId`);

--
-- Beperkingen voor tabel `watchlists`
--
ALTER TABLE `watchlists`
  ADD CONSTRAINT `watchlists_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Beperkingen voor tabel `watchlist_item_junction`
--
ALTER TABLE `watchlist_item_junction`
  ADD CONSTRAINT `watchlist_item_junction_ibfk_1` FOREIGN KEY (`watchlistId`) REFERENCES `watchlists` (`watchlistId`),
  ADD CONSTRAINT `watchlist_item_junction_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `items` (`itemId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
