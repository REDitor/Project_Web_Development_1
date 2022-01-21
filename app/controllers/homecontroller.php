<?php
use controllers\Controller;
include 'autoload.php';

class HomeController extends Controller {
    public function index() {
        require __DIR__ . '/../views/index.php';
    }
}