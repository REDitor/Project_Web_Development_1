<?php

use controllers\Controller;
use services\UserService;

include 'autoload.php';

class ResetPasswordController extends Controller
{
    public function index()
    {
        require __DIR__ . '/../views/resetpassword.php';
    }

    public function updatePassword() {
        $json = file_get_contents('php://input');
        $object = json_decode($json);

        $password = $object->password;
        $email = $object->email;

        $user_service = new UserService();
        $user_service->updatePassword($password, $email);
    }
}