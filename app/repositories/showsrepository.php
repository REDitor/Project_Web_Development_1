<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/show.php';

class ShowsRepository extends Repository
{
    public function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT items.itemId, items.title, items.writer, shows.numberOfEpisodes
                                            FROM items
                                            INNER JOIN shows ON items.itemId = shows.itemId
                                            ORDER BY items.title;");

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Show');
        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }
}