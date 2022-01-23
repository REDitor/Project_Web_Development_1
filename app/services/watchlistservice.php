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
}