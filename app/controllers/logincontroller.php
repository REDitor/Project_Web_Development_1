<?php

use controllers\Controller;
use services\UserService;

include 'autoload.php';

class LoginController extends Controller
{
    public function index()
    {
        require __DIR__ . '/../views/login.php';
    }

    public function getEmail($email)
    {
        $user_service = new UserService();
        echo json_encode($user_service->getEmail($email));
    }
}