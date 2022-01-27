<?php
namespace services;

use repositories\WatchListRepository;

class WatchListService
{
    private WatchListRepository $watchList_repository;

    public function __construct()
    {
        $this->watchList_repository = new WatchListRepository();
    }

    public function getListsByUserId($userId) {
        return $this->watchList_repository->getListsByUserId($userId);
    }

    public function getUserIdByWatchListId($watchListId) {
        return $this->watchList_repository->getUserIdByWatchListId($watchListId);
    }

    public function getAll() {
        return $this->watchList_repository->getAll();
    }

    public function insertWatchList($watchList) {
        $this->watchList_repository->insertWatchList($watchList);
    }

    public function deleteById($watchListId) {
        $this->watchList_repository->deleteById($watchListId);
    }

    public function addToList($itemId, $watchListId) {
        $this->watchList_repository->addToList($itemId, $watchListId);
    }

    public function removeFromList($itemId, $watchListId) {
        $this->watchList_repository->removeFromList($itemId, $watchListId);
    }
}