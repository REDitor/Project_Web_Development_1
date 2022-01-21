<?php
use controllers\Controller;

include 'autoload.php';

class ContactController extends Controller{
    public function index() {
        require __DIR__ . '/../views/contact.php';
    }
}