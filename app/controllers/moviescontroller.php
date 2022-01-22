<?php
use app\controllers\Controller;

class MoviesController extends Controller {
    public function index() {
        require __DIR__ . '/../views/movies.php';
    }
}