<?php
namespace services;

use repositories\WatchListRepository;

class WatchListService
{
    public function getListsByUserId($userId) {
        $repository = new WatchListRepository();
        return $repository->getListsByUserId($userId);
    }

    //for testing TODO: remove
    public function getAll() {
        $repository = new WatchListRepository();
        return $repository->getAll();
    }

    public function deleteById($watchListId) {
        $repository = new WatchListRepository();
        $repository->deleteById($watchListId);
    }
}