<?php
use app\controllers\Controller;

class ShowsController extends Controller{
    public function index() {
        require __DIR__ . '/../views/shows.php';
    }
}