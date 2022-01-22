<?php
use app\controllers\Controller;

class ContactController extends Controller{
    public function index() {
        require __DIR__ . '/../views/contact.php';
    }
}