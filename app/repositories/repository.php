<?php
namespace repositories;

use app\Database;

class Repository
{
    protected Database $connection;

    function __construct()
    {
        require_once __DIR__ . '/../database.php';
        $this->connection = Database::getInstance();
    }
}