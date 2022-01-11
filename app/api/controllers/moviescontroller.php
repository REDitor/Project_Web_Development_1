<?php
require __DIR__ . '/../../services/movieservice.php';

class MoviesController {
    private MovieService $movie_Service;

    public function __construct()
    {
        $this->movie_Service = new MovieService();
    }

    public function index() {
        echo json_encode($this->movie_Service->getAll());
    }
}