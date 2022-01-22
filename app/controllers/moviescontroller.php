<?php
use controllers\Controller;

include 'autoload.php';

class MoviesController extends Controller {
    public function index() {
        require __DIR__ . '/../views/movies.php';
    }
}