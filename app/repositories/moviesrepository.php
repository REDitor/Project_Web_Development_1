<?php

namespace repositories;

use PDO;
use PDOException;

class MoviesRepository extends Repository
{
    public function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT items.itemId, items.title, items.writer, movies.durationInMinutes
                                            FROM items
                                            INNER JOIN movies ON items.itemId = movies.itemId
                                            ORDER BY items.title;");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'models\Movie');

        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }

    public function getByWatchListId($watchListId) {
        try {
            $stmt = $this->connection->prepare("SELECT items.itemId, items.title, items.writer, movies.durationInMinutes
                                                FROM items
                                                INNER JOIN movies ON items.itemId = movies.itemId
                                                INNER JOIN watchlist_item_junction ON items.itemId = watchlist_item_junction.itemId
                                                WHERE watchlist_item_junction.watchListId = :watchListId");

            $stmt->bindParam(':watchListId', $watchListId);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS, 'models\Movie');
        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }
}