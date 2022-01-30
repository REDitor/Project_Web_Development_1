<?php
use app\Database;

include 'autoload.php';

$database = Database::getInstance();

try {
    $database->query("CREATE TABLE IF NOT EXISTS `items` 
(
    `itemId` int(11) NOT NULL AUTO_INCREMENT,
    `title`  varchar(255) DEFAULT NULL,
    `writer` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`itemId`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 18
  DEFAULT CHARSET = utf8mb4;");
} catch (PDOException $pdoe) {
    echo "Query failed: " . $pdoe->getMessage();
}

try {
    $database->query("INSERT INTO `items` (`itemId`, `title`, `writer`)
VALUES (1, 'Tenet', 'Christopher Nolan'),
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
       (16, 'Mocro Maffia', 'Achmed Akkabi'),
       (17, 'Demon Slayer', 'Koyoharu Gotoge');");
} catch (PDOException $pdoe) {
    echo "Query failed: " . $pdoe->getMessage();
}

try {
    $database->query("CREATE TABLE IF NOT EXISTS `movies`
(
    `itemId`            int(11) NOT NULL,
    `durationInMinutes` int(11) DEFAULT NULL,
    PRIMARY KEY (`itemId`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;");
} catch (PDOException $pdoe) {
    echo "Query failed: " . $pdoe->getMessage();
}

try {
    $database->query("INSERT INTO `movies` (`itemId`, `durationInMinutes`)
VALUES (1, 150),
       (2, 100),
       (3, 112),
       (4, 121),
       (5, 127),
       (6, 148),
       (13, 162),
       (14, 117);");
} catch (PDOException $pdoe) {
    echo "Query failed: " . $pdoe->getMessage();
}

try {
    $database->query("CREATE TABLE IF NOT EXISTS `shows`
(
    `itemId`           int(11) NOT NULL,
    `numberOfEpisodes` int(11) DEFAULT NULL,
    PRIMARY KEY (`itemId`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;");
} catch (PDOException $pdoe) {
    echo "Query failed: " . $pdoe->getMessage();
}

try {
    $database->query("INSERT INTO `shows` (`itemId`, `numberOfEpisodes`)
VALUES (7, 45),
       (8, 37),
       (9, 500),
       (10, 90),
       (11, 9),
       (12, 161),
       (15, 92),
       (16, 22),
       (17, 26);");
} catch (PDOException $pdoe) {
    echo "Query failed: " . $pdoe->getMessage();
}

try {
    $database->query("CREATE TABLE IF NOT EXISTS `users`
(
    `userId`   int(11)      NOT NULL AUTO_INCREMENT,
    `username` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `email`    varchar(255) NOT NULL,
    PRIMARY KEY (`userId`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 21
  DEFAULT CHARSET = utf8mb4;");
} catch (PDOException $pdoe) {
    echo "Query failed: " . $pdoe->getMessage();
}

try {
    $database->query("INSERT INTO `users` (`userId`, `username`, `password`, `email`)
VALUES (20, 'TestUser', '5d7845ac6ee7cfffafc5fe5f35cf666d', 'testuser@test.com');");
} catch (PDOException $pdoe) {
    echo "Query failed: " . $pdoe->getMessage();
}

try {
    $database->query("CREATE TABLE IF NOT EXISTS `watchlists`
(
    `watchListId` int(11) NOT NULL AUTO_INCREMENT,
    `userId`      int(11)       DEFAULT NULL,
    `name`        varchar(500)  DEFAULT NULL,
    `description` varchar(8000) DEFAULT NULL,
    PRIMARY KEY (`watchListId`),
    KEY `userId` (`userId`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 140
  DEFAULT CHARSET = utf8mb4;");
} catch (PDOException $pdoe) {
    echo "Query failed: " . $pdoe->getMessage();
}

try {
    $database->query("INSERT INTO `watchlists` (`watchListId`, `userId`, `name`, `description`)
VALUES (136, 20, 'Friday Movie Night (Test 1)',
        'A test list made to test functionality like deleting items from the list and/or deleting the list as a whole'),
       (138, 20, 'Want to Watch (Test 2)', 'A spare test list (in case the other one is deleted)');");
} catch (PDOException $pdoe) {
    echo "Query failed: " . $pdoe->getMessage();
}

try {
    $database->query("CREATE TABLE IF NOT EXISTS `watchlist_item_junction`
(
    `watchListId` int(11) NOT NULL,
    `itemId`      int(11) NOT NULL,
    PRIMARY KEY (`watchListId`, `itemId`),
    KEY `itemId` (`itemId`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;");
} catch (PDOException $pdoe) {
    echo "Query failed: " . $pdoe->getMessage();
}

try {
    $database->query("INSERT INTO `watchlist_item_junction` (`watchListId`, `itemId`)
VALUES (136, 1),
       (136, 6),
       (136, 13),
       (138, 4),
       (138, 5),
       (138, 11),
       (138, 14);");
} catch (PDOException $pdoe) {
    echo "Query failed: " . $pdoe->getMessage();
}

try {
    $database->query("ALTER TABLE `movies`
    ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`itemId`) REFERENCES `items` (`itemId`);");
} catch (PDOException $pdoe) {
    echo "Query failed: " . $pdoe->getMessage();
}

try {
    $database->query("ALTER TABLE `shows`
    ADD CONSTRAINT `shows_ibfk_1` FOREIGN KEY (`itemId`) REFERENCES `items` (`itemId`);");
} catch (PDOException $pdoe) {
    echo "Query failed: " . $pdoe->getMessage();
}


try {
    $database->query("ALTER TABLE `watchlists`
    ADD CONSTRAINT `watchlists_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);");
} catch (PDOException $pdoe) {
    echo "Query failed: " . $pdoe->getMessage();
}

try {
    $database->query("ALTER TABLE `watchlist_item_junction`
    ADD CONSTRAINT `watchlist_item_junction_ibfk_1` FOREIGN KEY (`watchListId`) REFERENCES `watchlists` (`watchListId`),
    ADD CONSTRAINT `watchlist_item_junction_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `items` (`itemId`);
COMMIT;");
} catch (PDOException $pdoe) {
    echo "Query failed: " . $pdoe->getMessage();
}