<?php

use controllers\Controller;

include 'autoload.php';

class ForgotPasswordController extends Controller
{
    public function index() {
        require __DIR__ . '/../views/forgotpassword.php';
    }
}