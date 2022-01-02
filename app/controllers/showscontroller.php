<?php
require __DIR__ . '/controller.php';

class ShowsController extends Controller{
    public function index() {
        require __DIR__ . '/../views/shows.php';
    }
}