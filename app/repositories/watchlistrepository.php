<?php
namespace repositories;

use PDO;
use PDOException;

class WatchListRepository extends Repository
{
    private string $getByUIdQuery = "SELECT watchListId, userId, name, description FROM watchlists WHERE userId = :userId";
    private string $getUIdByWatchListIdQuery = "SELECT userId FROM watchlists WHERE watchlistId = :watchListId";
    private string $insertQuery = "INSERT INTO watchlists (userId, name, description) VALUES (?, ?, ?)";
    private string $deleteByIdQuery = "DELETE FROM watchlist_item_junction WHERE watchListId = :watchListId;
                                        DELETE FROM watchlists WHERE watchListId = :watchListId";
    private string $addItemQuery = "INSERT INTO watchlist_item_junction (watchListId, itemId) VALUES (?, ?)";
    private string $removeItemQuery = "DELETE FROM watchlist_item_junction WHERE itemId = :itemId AND watchListId = :watchListId";

    public function getListsByUserId($userId) {
        try {
            $stmt = $this->connection->prepare($this->getByUIdQuery);

            $stmt->bindParam(':userId', $userId);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS, 'models\WatchList');
        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }

    public function getUserIdByWatchListId($watchlistId) {
        try {
            $stmt = $this->connection->prepare($this->getUIdByWatchListIdQuery);

            $stmt->bindParam(':watchListId', $watchlistId);
            $stmt->execute();

            return $stmt->fetchColumn();
        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }

    public function insertWatchList($watchList) {
        try {
            $stmt = $this->connection->prepare($this->insertQuery);
            $stmt->execute([$_SESSION['userId'], $watchList->getName(), $watchList->getDescription()]);
        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }

    public function deleteById($watchListId) {
        try {
            $stmt = $this->connection->prepare($this->deleteByIdQuery);
            $stmt->bindParam(':watchListId', $watchListId);
            $stmt->execute();
        } catch (PDOException $pdeo) {
            echo $pdeo;
        }
    }

    public function addToList($itemId, $watchListId) {
        try {
            $stmt = $this->connection->prepare($this->addItemQuery);

            $stmt->execute([$watchListId, $itemId]);
        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }

    public function removeFromList($itemId, $watchListId) {
        try {
            $stmt = $this->connection->prepare($this->removeItemQuery);

            $stmt->bindParam(':itemId', $itemId);
            $stmt->bindParam(':watchListId', $watchListId);
            $stmt->execute();
        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }
}