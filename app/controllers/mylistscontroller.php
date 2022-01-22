<?php
use app\controllers\Controller;

class MyListsController extends Controller {
    public function index() {
        require __DIR__ . '/../views/mylists.php';
    }
}