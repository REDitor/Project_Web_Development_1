<?php

use services\MovieService;

include 'autoload.php';

class MoviesController {
    private MovieService $movie_Service;

    public function __construct()
    {
        $this->movie_Service = new MovieService();
    }

    public function index() {
        //TODO: change echo to return
        echo json_encode($this->movie_Service->getAll());
    }
}