<?php
namespace repositories;

use PDO;
use PDOException;

class WatchListRepository extends Repository
{
    public function getListsByUserId($userId) {
        try {
            $stmt = $this->connection->prepare("SELECT watchlistId, userId, name, description
                                                FROM watchlists
                                                WHERE userId = :userId");

            $stmt->bindParam(':userId', $userId);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'models\WatchList');
        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }

    public function insertWatchList($watchList) {
        try {
            $stmt = $this->connection->prepare("INSERT INTO watchlists (userId, name, description)
                                                VALUES (?, ?, ?)");
            $stmt->execute([$_SESSION['userId'], $watchList->getName(), $watchList->getDescription()]);
        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }

    public function deleteById($watchListId) {
        try {
            $stmt = $this->connection->prepare("DELETE FROM watchlist_item_junction
                                                WHERE watchlistId = :watchListId;
                                                DELETE FROM watchlists
                                                WHERE watchlistId = :watchListId");
            $stmt->bindParam(':watchListId', $watchListId);
            $stmt->execute();
        } catch (PDOException $pdeo) {
            echo $pdeo;
        }
    }

    //only for testing TODO: remove
    public function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT watchlistId, name, description
                                            FROM watchlists");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'models\WatchList');
        } catch (PDOException $pdeo) {
            echo $pdeo;
        }
    }
}