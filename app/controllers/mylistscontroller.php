<?php
use controllers\Controller;
include 'autoload.php';

class MyListsController extends Controller {
    public function index() {
        require __DIR__ . '/../views/mylists.php';
    }
}