<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/movie.php';

class MoviesRepository extends Repository
{
    public function getAll() {
        try {


            $stmt = $this->connection->prepare("SELECT items.title, items.writer, movies.durationInMinutes
                                            FROM items
                                            INNER JOIN movies ON items.itemId = movies.itemId;");

            $result = $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Movie');
            return $stmt->fetchAll();
        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }
}