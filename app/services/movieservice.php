<?php
namespace app\services;

use app\repositories\MoviesRepository;

class MovieService
{
    public function getAll() {
        $repository = new MoviesRepository();
        return $repository->getAll();
    }
}