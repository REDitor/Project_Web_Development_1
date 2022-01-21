<?php
require __DIR__ . '/controller.php';

class LogoutController extends Controller
{
    public function index() {
        session_destroy();
        header('location: home');
    }
}