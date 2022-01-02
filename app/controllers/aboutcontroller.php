<?php
require __DIR__ . '/controller.php';

class AboutController extends Controller{
    public function index() {
        require __DIR__ . '/../views/about.php';
    }
}