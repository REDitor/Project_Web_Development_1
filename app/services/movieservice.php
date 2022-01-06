<?php
require __DIR__ . '/../repositories/moviesrepository.php';

class MovieService
{
//    public function getById($id) {
//        $repository = new MoviesRepository();
//         return $repository->getById();
//    }

    public function getAll() {
        $repository = new MoviesRepository();
        return $repository->getAll();
    }
}