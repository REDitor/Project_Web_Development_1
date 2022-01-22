<?php
use app\controllers\Controller;

class LoginController extends Controller {
    public function index() {
        require __DIR__ . '/../views/login.php';
    }
}