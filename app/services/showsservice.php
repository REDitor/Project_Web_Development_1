<?php
namespace services;

use repositories\ShowsRepository;

class ShowsService
{
    private ShowsRepository $shows_repository;

    public function __construct()
    {
        $this->shows_repository = new ShowsRepository();
    }

    public function getAll()
    {
        return $this->shows_repository->getAll();
    }

    public function getShowsByWatchListId($watchListId) {
        return $this->shows_repository->getByWatchListId($watchListId);
    }
}