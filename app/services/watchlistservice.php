<?php
namespace services;

use repositories\WatchListRepository;

class WatchListService
{
    public function getListsByUserId($userId) {
        $repository = new WatchListRepository();
        return  $repository->getListsByUserId($userId);
    }

    public function getUserIdByWatchListId($watchListId) {
        $repository = new WatchListRepository();
        return $repository->getUserIdByWatchListId($watchListId);
    }

    //for testing TODO: remove
    public function getAll() {
        $repository = new WatchListRepository();
        return $repository->getAll();
    }

    public function insertWatchList($watchList) {
        $repository = new WatchListRepository();
        $repository->insertWatchList($watchList);
    }

    public function deleteById($watchListId) {
        $repository = new WatchListRepository();
        $repository->deleteById($watchListId);
    }

    public function addToList($itemId, $watchListId) {
        $repository = new WatchListRepository();
        $repository->addToList($itemId, $watchListId);
    }

    public function removeFromList($itemId, $watchListId) {
        echo $itemId . 'and' . $watchListId;
        $repository = new WatchListRepository();
        $repository->removeFromList($itemId, $watchListId);
    }
}