<?php

class Repository
{
    protected $connection;

    function __construct()
    {
        require __DIR__ . '/../database.php';
        $this->connection = Database::getInstance();
    }
}