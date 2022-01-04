<?php
require __DIR__ . '/controller.php';

class LoginController extends Controller {
    public function index() {
        require __DIR__ . '/../views/login.php';
    }
}