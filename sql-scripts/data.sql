-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Gegenereerd op: 07 jan 2022 om 13:46
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

CREATE TABLE IF NOT EXISTS `items` (
  `itemId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `writer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`itemId`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `items`
--

INSERT INTO `items` (`itemId`, `title`, `writer`) VALUES
(1, 'Tenet', 'Christopher Nolan'),
(2, 'Dragon Ball Super: Broly', 'Tatsuya Nagamine'),
(3, 'The Last: Naruto The Movie', 'Masashi Kishimoto'),
(4, 'Spider-Man', 'Sam Raimi'),
(5, 'Spider-Man 2', 'Sam Raimi'),
(6, 'Inception', 'Christopher Nolan'),
(7, 'Continuum', 'Simon Barry'),
(8, 'Death Note', 'Toshiki Inoue'),
(9, 'Naruto Shippuden', 'Masashi Kishimoto'),
(10, 'Prison Break', 'Paul Scheuring'),
(11, 'Squid Game', 'Hwang Dong-hyuk'),
(12, 'The Walking Dead', 'Robert Kirkman'),
(13, 'Avatar', 'James Cameron'),
(14, 'The Persuit of Happyness', 'Gabrielle Muccino'),
(15, 'Sons of Anarchy', 'Kurt Sutter'),
(16, 'Mocro Maffia', 'Achmed Akkabi');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `itemId` int(11) NOT NULL,
  `durationInMinutes` int(11) DEFAULT NULL,
  PRIMARY KEY (`itemId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `movies`
--

INSERT INTO `movies` (`itemId`, `durationInMinutes`) VALUES
(1, 150),
(2, 100),
(3, 112),
(4, 121),
(5, 127),
(6, 148),
(13, 162),
(14, 117);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `shows`
--

CREATE TABLE IF NOT EXISTS `shows` (
  `itemId` int(11) NOT NULL,
  `numberOfEpisodes` int(11) DEFAULT NULL,
  PRIMARY KEY (`itemId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `shows`
--

INSERT INTO `shows` (`itemId`, `numberOfEpisodes`) VALUES
(7, 45),
(8, 37),
(9, 500),
(10, 90),
(11, 9),
(12, 161),
(15, 92),
(16, 22);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `email`) VALUES
(3, 'TestUser1', '5d7845ac6ee7cfffafc5fe5f35cf666d', 'testuser1@test.com'),
(4, 'TestUser2', '5d7845ac6ee7cfffafc5fe5f35cf666d', 'testuser2@test.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `watchlists`
--

CREATE TABLE IF NOT EXISTS `watchlists` (
  `watchlistId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `description` varchar(8000) DEFAULT NULL,
  PRIMARY KEY (`watchlistId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `watchlist_item_junction`
--

CREATE TABLE IF NOT EXISTS `watchlist_item_junction` (
  `watchlistId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  PRIMARY KEY (`watchlistId`,`itemId`),
  KEY `itemId` (`itemId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Beperkingen voor geëxporteerde tabellen
--

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
