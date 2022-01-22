<?php
use controllers\Controller;

include 'autoload.php';

class ShowsController extends Controller{
    public function index() {
        require __DIR__ . '/../views/shows.php';
    }
}