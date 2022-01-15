<?php

require __DIR__ . '/controller.php';

class MyListsController extends Controller {
    public function index() {
        require __DIR__ . '/../views/mylists.php';
    }
}