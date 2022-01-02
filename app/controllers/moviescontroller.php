<?php
require __DIR__ . '/controller.php';

class MoviesController extends Controller {
    public function index() {
        require __DIR__ . '/../views/movies.php';
    }
}