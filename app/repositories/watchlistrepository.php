<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/watchlist.php';

class WatchListRepository extends Repository
{
    public function getListsByUserId($userId) {
        try {
            $stmt = $this->connection->prepare("SELECT watchlistId, name, description
                                                FROM watchlists
                                                WHERE userId = :userId");

            $stmt->bindParam(':userId', $userId);
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'WatchList');
        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }

    public function deleteById($watchListId) {
        try {

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
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'WatchList');
        } catch (PDOException $pdeo) {
            echo $pdeo;
        }
    }
}