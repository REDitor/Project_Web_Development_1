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

    public function forgotPassword()
    {
        require __DIR__ . '/../views/forgotpassword.php';
    }

    public function sendResetLink($email)
    {
        $headers = 'From: s.harks@admin.curtains.nl';
        $subject = 'Forgot Password';
        $message = "<html lang='en'>
                    <body>
                        <p>Please click the following link to reset your password: <br>
                            <a href='localhost/login/loadResetPassword/$email'>Reset Password</a>
                        </p>
                    </body>
                    </html>";

        if (mail($email, $subject, $message, $headers))
            echo "Success";
        else
            echo "Problems";
    }

    public function loadResetPassword($email)
    {
        $user_service = new UserService();
        $_SESSION['email'] = $user_service->$email;
        require __DIR__ . '/../views/resetpassword.php';
    }

    public function getEmail($email)
    {
        $user_service = new UserService();
        echo json_encode($user_service->getEmail($email));
    }
}