<?php
use controllers\Controller;

include 'autoload.php';

class ListDetailsController extends Controller
{
    public function index() {
        require __DIR__ . '/../views/listdetails.php';
    }
}