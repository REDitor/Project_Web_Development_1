<?php
use controllers\Controller;
include 'autoload.php';

class LogoutController extends Controller
{
    public function index() {
        session_destroy();
        header('location: home');
    }
}