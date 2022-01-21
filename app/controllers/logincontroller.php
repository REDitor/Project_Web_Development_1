<?php
use controllers\Controller;
include 'autoload.php';

class LoginController extends Controller {
    public function index() {
        require __DIR__ . '/../views/login.php';
    }
}