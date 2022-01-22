<?php
use app\controllers\Controller;

class AboutController extends Controller{
    public function index() {
        require __DIR__ . '/../views/about.php';
    }
}