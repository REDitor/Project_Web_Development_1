<?php
use app\controllers\Controller;

class HomeController extends Controller {
    public function index() {
        require __DIR__ . '/../views/index.php';
    }
}