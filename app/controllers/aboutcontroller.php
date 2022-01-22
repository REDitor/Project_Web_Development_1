<?php
use controllers\Controller;

include 'autoload.php';

class AboutController extends Controller{
    public function index() {
        require __DIR__ . '/../views/about.php';
    }
}