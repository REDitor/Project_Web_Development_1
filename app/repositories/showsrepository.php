<?php
namespace repositories;

use PDO;
use PDOException;

class ShowsRepository extends Repository
{
    public function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT items.itemId, items.title, items.writer, shows.numberOfEpisodes
                                            FROM items
                                            INNER JOIN shows ON items.itemId = shows.itemId
                                            ORDER BY items.title;");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'models\Show');
        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }

    public function getByWatchListId($watchListId) {
        try {
            $stmt = $this->connection->prepare("SELECT items.title, items.writer, shows.numberOfEpisodes
                                                FROM items
                                                INNER JOIN shows ON items.itemId = shows.itemId
                                                INNER JOIN watchlist_item_junction ON items.itemId = watchlist_item_junction.itemId
                                                WHERE watchlist_item_junction.watchListId = :watchListId");

            $stmt->bindParam(':watchListId', $watchListId);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS, 'models\Show');
        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }
}