<?php
use app\controllers\Controller;

class LogoutController extends Controller
{
    public function index() {
        session_destroy();
        header('location: home');
    }
}