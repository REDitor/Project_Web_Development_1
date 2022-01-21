<?php
require_once __DIR__ . '/../repositories/moviesrepository.php';

class MovieService
{
    public function getAll() {
        $repository = new MoviesRepository();
        return $repository->getAll();
    }
}