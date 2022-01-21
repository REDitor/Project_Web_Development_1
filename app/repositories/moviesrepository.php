<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/movie.php';

class MoviesRepository extends Repository
{
    public function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT items.itemId, items.title, items.writer, movies.durationInMinutes
                                            FROM items
                                            INNER JOIN movies ON items.itemId = movies.itemId
                                            ORDER BY items.title;");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Movie');

        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }
}