<?php

class WatchList
{
    private int $id;
    private string $name;
    private string $description;
    private $movies;
    private $shows;

    /**
     * @param int $id
     * @param string $name
     * @param string $description
     */
    public function __construct(int $id, string $name, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }
}