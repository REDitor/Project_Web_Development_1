<?php
namespace app\repositories;

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
}