<?php
require __DIR__ . '/controller.php';

class ContactController extends Controller{
    public function index() {
        require __DIR__ . '/../views/contact.php';
    }
}