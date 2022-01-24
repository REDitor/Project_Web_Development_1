<?php

use models\WatchList;
use services\MovieService;
use services\WatchListService;

include 'autoload.php';

class MyListsController
{
    private WatchListService $watchList_service;
    private MovieService $movie_service;

    public function __construct()
    {
        $this->watchList_service = new WatchListService();
        $this->movie_service = new MovieService();
    }

    public function index()
    {
        echo json_encode($this->watchList_service->getAll());  //TODO: params? change to getByUserId
    }

    public function getListsByUserId($userId)
    {
        echo json_encode($this->watchList_service->getListsByUserId($userId));
    }

    public function getUserId() {
        echo json_encode($_SESSION['userId']);
    }

    public function createWatchList()
    {
        $json = file_get_contents('php://input');
        $object = json_decode($json);

        $watchList = new WatchList();
        $watchList->setName($object->name);
        $watchList->setDescription($object->description);

        $this->watchList_service->insertWatchList($watchList);
    }

    public function deleteWatchList($watchListId)
    {
        $this->watchList_service->deleteById($watchListId);
    }

    public function getMoviesByWatchListId($watchListId) {
        echo json_encode($this->movie_service->getMoviesByWatchListId($watchListId));
    }
}