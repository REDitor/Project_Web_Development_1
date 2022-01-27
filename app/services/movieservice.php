<?php
namespace services;

use repositories\MoviesRepository;

class MovieService
{
    private MoviesRepository $movies_repository;

    public function __construct()
    {
        $this->movies_repository = new MoviesRepository();
    }

    public function getAll() {
        return $this->movies_repository->getAll();
    }

    public function getMoviesByWatchListId($watchListId) {
        return $this->movies_repository->getByWatchListId($watchListId);
    }
}