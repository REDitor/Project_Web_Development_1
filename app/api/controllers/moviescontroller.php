<?php

use models\Item;
use services\MovieService;
use services\WatchListService;

include 'autoload.php';

class MoviesController {
    private MovieService $movie_Service;
    private WatchListService $watchList_service;

    public function __construct()
    {
        $this->movie_Service = new MovieService();
        $this->watchList_service = new WatchListService();
    }

    public function index() {
        echo json_encode($this->movie_Service->getAll());
    }

    public function addToList() {
        $json = file_get_contents('php://input');
        $object = json_decode($json);

        $itemId = $object->itemId;
        $watchListId = $object->watchListId;
        $this->watchList_service->addToList($itemId, $watchListId);
    }
}