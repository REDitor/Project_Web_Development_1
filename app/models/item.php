<?php

class Item
{
    private int $id;
    private WatchList $movies;
    private string $title;
    private string $writer;

    /**
     * @param int $id
     * @param string $title
     */
    public function __construct(int $id, string $title)
    {
        $this->id = $id;
        $this->title = $title;
    }
}