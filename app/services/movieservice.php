<?php
namespace services;

use repositories\MoviesRepository;

class MovieService
{
    public function getAll() {
        $repository = new MoviesRepository();
        return $repository->getAll();
    }

    public function getMoviesByWatchListId($watchListId) {
        $repository = new MoviesRepository();
        return $repository->getByWatchListId($watchListId);
    }
}