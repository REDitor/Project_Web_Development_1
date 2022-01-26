<?php
namespace services;

use repositories\ShowsRepository;

class ShowsService
{
    public function getAll()
    {
        $repository = new ShowsRepository();
        return $repository->getAll();
    }

    public function getShowsByWatchListId($watchListId) {
        $repository = new ShowsRepository();
        return $repository->getByWatchListId($watchListId);
    }
}