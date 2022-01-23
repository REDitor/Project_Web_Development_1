<?php
namespace services;

use repositories\MoviesRepository;

class MovieService
{
    public function getAll() {
        $repository = new MoviesRepository();
        return $repository->getAll();
    }
}