<?php
namespace repositories;

use app\Database;

class Repository
{
    protected $connection;

    function __construct()
    {
        require_once __DIR__ . '/../database.php';
        $this->connection = Database::getInstance();
    }
}